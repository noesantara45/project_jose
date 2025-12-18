<?php

namespace App\Controllers\Landing;

use App\Controllers\BaseController;
use Midtrans\Config;
use Midtrans\Snap;

class Checkout extends BaseController
{
    protected $db;
    protected $userId;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->userId = session()->get('id'); // Pastikan session id diset saat login
        
        // Konfigurasi Midtrans (Sesuaikan dengan .env)
        Config::$serverKey = getenv('MIDTRANS_SERVER_KEY');
        Config::$isProduction = (getenv('MIDTRANS_IS_PRODUCTION') === 'true');
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function index()
    {
        // 1. Ambil Data Cart Real dari Database
        $query = $this->db->table('carts')
            ->select('carts.*, products.name, products.price, products.image, products.slug')
            ->join('products', 'products.id = carts.product_id')
            ->where('carts.user_id', $this->userId)
            ->get();
        
        $cartItems = $query->getResultArray();

        // Cek jika keranjang kosong
        if (empty($cartItems)) {
            return redirect()->to(base_url('cart'))->with('error', 'Keranjang Anda kosong.');
        }

        // 2. Hitung Total
        $subtotal = 0;
        foreach ($cartItems as $item) {
            $subtotal += ($item['price'] * $item['qty']);
        }

        // Contoh logika ongkir sederhana (bisa dikembangkan nanti)
        $shippingCost = 20000; 
        $tax = $subtotal * 0.01; // 1%
        $total = $subtotal + $shippingCost + $tax;

        $data = [
            'title' => 'Checkout - HLOutfit',
            'cart_items' => $cartItems,
            'subtotal' => $subtotal,
            'shipping_cost' => $shippingCost,
            'tax' => $tax,
            'total' => $total,
            // Jika ada flashdata snapToken (dari method process), kirim ke view
            'snapToken' => session()->getFlashdata('snapToken') 
        ];

        return view('landing/co', $data); // Pastikan nama file view sesuai lokasi Anda
    }

    public function process()
    {
        // 1. Validasi Input Form
        if (!$this->validate([
            'firstName' => 'required',
            'lastName'  => 'required',
            'phone'     => 'required',
            'address'   => 'required',
            'city'      => 'required',
            'zip'       => 'required',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // 2. Ambil Data Cart Lagi (Untuk memastikan harga update & stok)
        $cartItems = $this->db->table('carts')
            ->select('carts.*, products.name, products.price')
            ->join('products', 'products.id = carts.product_id')
            ->where('carts.user_id', $this->userId)
            ->get()->getResultArray();

        if (empty($cartItems)) return redirect()->to('cart');

        // Hitung ulang total untuk keamanan backend
        $grossAmount = 0;
        $itemDetails = [];
        foreach ($cartItems as $item) {
            $grossAmount += ($item['price'] * $item['qty']);
            $itemDetails[] = [
                'id'       => $item['product_id'],
                'price'    => $item['price'],
                'quantity' => $item['qty'],
                'name'     => substr($item['name'], 0, 50) // Midtrans limit nama 50 char
            ];
        }
        
        // Tambahkan biaya lain ke item details agar total match
        $shippingCost = 20000; 
        $tax = $grossAmount * 0.01;
        $finalTotal = $grossAmount + $shippingCost + $tax;

        // Item khusus Ongkir & Pajak (Cara Midtrans agar total pas)
        $itemDetails[] = ['id' => 'SHIPPING', 'price' => $shippingCost, 'quantity' => 1, 'name' => 'Biaya Pengiriman'];
        $itemDetails[] = ['id' => 'TAX', 'price' => $tax, 'quantity' => 1, 'name' => 'Pajak & Layanan'];

        // 3. Simpan ke Database (Tabel Orders)
        $invoiceNumber = 'INV/' . date('Ymd') . '/' . strtoupper(uniqid());
        $recipientName = $this->request->getPost('firstName') . ' ' . $this->request->getPost('lastName');
        
        $orderData = [
            'user_id'          => $this->userId,
            'invoice_number'   => $invoiceNumber,
            'total_price'      => $finalTotal,
            'payment_status'   => 'pending',
            'order_status'     => 'pending',
            'recipient_name'   => $recipientName,
            'recipient_phone'  => $this->request->getPost('phone'),
            'shipping_address' => $this->request->getPost('address') . ', ' . $this->request->getPost('city') . ' ' . $this->request->getPost('zip'),
            'created_at'       => date('Y-m-d H:i:s')
        ];

        $this->db->transStart();
        $this->db->table('orders')->insert($orderData);
        $orderId = $this->db->insertID();

        // Simpan Order Items
        foreach ($cartItems as $item) {
            $this->db->table('order_items')->insert([
                'order_id'     => $orderId,
                'product_id'   => $item['product_id'],
                'product_name' => $item['name'],
                'qty'          => $item['qty'],
                'price'        => $item['price'],
                'subtotal'     => $item['price'] * $item['qty']
            ]);
        }
        
        // Hapus Keranjang setelah order dibuat
        $this->db->table('carts')->where('user_id', $this->userId)->delete();
        $this->db->transComplete();

        // 4. Minta Snap Token ke Midtrans
        $params = [
            'transaction_details' => [
                'order_id'     => $invoiceNumber,
                'gross_amount' => $finalTotal,
            ],
            'customer_details' => [
                'first_name' => $this->request->getPost('firstName'),
                'last_name'  => $this->request->getPost('lastName'),
                'email'      => session()->get('email') ?? 'customer@example.com', // Ambil email dari session
                'phone'      => $this->request->getPost('phone'),
            ],
            'item_details' => $itemDetails,
        ];

        try {
            $snapToken = Snap::getSnapToken($params);
            
            // Update token ke database
            $this->db->table('orders')->where('id', $orderId)->update(['snap_token' => $snapToken]);

            // Kembalikan user ke halaman checkout tapi bawa Snap Token untuk membuka popup
            // Kita juga bisa redirect ke halaman "Success/Payment" khusus, tapi popup lebih mulus.
            return redirect()->to(base_url('checkout'))->with('snapToken', $snapToken);

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memproses pembayaran: ' . $e->getMessage());
        }
    }
}