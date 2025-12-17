<?php

namespace App\Controllers\Landing;

use App\Controllers\BaseController;
use App\Models\CartModel;
use App\Models\ProductModel; // Pastikan kamu punya ProductModel, atau gunakan db connect biasa

class Cart extends BaseController
{
    protected $cartModel;
    protected $db;

    public function __construct()
    {
        $this->cartModel = new CartModel();
        $this->db = \Config\Database::connect();
    }

    // 1. Menampilkan Keranjang
    public function index()
    {
        // PENTING: Ganti 'id' sesuai key session saat user login di sistemmu
        $userId = session()->get('id');

        if (!$userId) {
            // Jika belum login, tendang ke halaman login
            return redirect()->to('login')->with('error', 'Silakan login untuk melihat keranjang.');
        }

        // Query JOIN: Mengambil data keranjang + detail produknya (gambar, nama, harga)
        // Kita gunakan Query Builder agar lebih fleksibel join-nya
        $builder = $this->db->table('carts');
        $builder->select('carts.id as cart_id, carts.qty, products.id as product_id, products.name, products.image as img, products.price, products.color, products.size, products.slug');
        $builder->join('products', 'products.id = carts.product_id');
        $builder->where('carts.user_id', $userId);
        $query = $builder->get();

        $cartItems = $query->getResultArray();

        $data = [
            'title' => 'Tas Belanja | HLOutfit',
            'cart_items' => $cartItems // Data ini sekarang diambil dari Database
        ];

        return view('landing/cart', $data);
    }

    // 2. Logika Tambah ke Keranjang (Add to Cart)
    public function add()
    {
        $userId = session()->get('id');

        // Cek Login
        if (!$userId) {
            return redirect()->to('login')->with('error', 'Silakan login dulu bos untuk belanja.');
        }

        // 1. Ambil Data Inputan
        $productId = $this->request->getPost('product_id');
        $qty       = $this->request->getPost('qty') ? (int)$this->request->getPost('qty') : 1;
        $color     = $this->request->getPost('warna'); // Pastikan name di view adalah 'warna'
        $size      = $this->request->getPost('size');  // Pastikan name di view adalah 'size'
        $action    = $this->request->getPost('btn_action'); // Tombol yang ditekan

        // 2. Cek apakah produk dengan VARIAN SAMA (Warna & Size) sudah ada?
        $existingItem = $this->cartModel->where([
            'user_id' => $userId, 
            'product_id' => $productId,
            'selected_color' => $color,
            'selected_size' => $size
        ])->first();

        if ($existingItem) {
            // Kalau ada, update Qty
            $newQty = $existingItem['qty'] + $qty;
            $this->cartModel->save([
                'id'  => $existingItem['id'],
                'qty' => $newQty
            ]);
        } else {
            // Kalau belum, Insert Baru
            $this->cartModel->insert([
                'user_id'        => $userId,
                'product_id'     => $productId,
                'qty'            => $qty,
                'selected_color' => $color,
                'selected_size'  => $size
            ]);
        }

        // 3. LOGIKA REDIRECT (Sesuai Permintaan Bos)
        if ($action === 'checkout') {
            // Jika tekan CHECKOUT -> ke halaman CO
            return redirect()->to('co');
        } else {
            // Jika tekan ICON KERANJANG -> ke halaman Kategori
            return redirect()->to('kategori')->with('success', 'Produk berhasil masuk keranjang!');
        }
    }

    // 3. Update Quantity (Untuk AJAX di masa depan)
    public function update()
    {
        // Kita akan kerjakan ini setelah fungsi Add & Index lancar
        // Logikanya nanti menerima request JSON dari Javascript di cart.php
    }

    // 4. Hapus Item
    public function delete($id)
    {
        $this->cartModel->delete($id);
        return redirect()->to('cart')->with('success', 'Item dihapus dari keranjang.');
    }
}