<?php

namespace App\Controllers\Landing;

use App\Controllers\BaseController;

class Orders extends BaseController
{
    public function index()
    {
        // 1. Cek Login
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $db = \Config\Database::connect();
        $userId = session()->get('id');

        // 2. Ambil Filter Status
        $status = $this->request->getGet('status');

        // 3. Query Builder
        $builder = $db->table('orders');
        $builder->where('user_id', $userId);

        if ($status && $status != 'all') {
            $builder->where('order_status', $status);
        }

        $orders = $builder->orderBy('created_at', 'DESC')->get()->getResultArray();

        // 4. Ambil Preview Item (1 Gambar Produk Utama)
        foreach ($orders as &$order) {
            $firstItem = $db->table('order_items')
                ->select('order_items.product_name, products.image')
                ->join('products', 'products.id = order_items.product_id', 'left')
                ->where('order_id', $order['id'])
                ->limit(1)
                ->get()
                ->getRowArray();
            
            $countItems = $db->table('order_items')->where('order_id', $order['id'])->countAllResults();

            $order['preview_item'] = $firstItem;
            $order['more_items_count'] = $countItems - 1; 
        }

        $data = [
            'title' => 'Pesanan Saya | HLOutfit',
            'orders' => $orders,
            'current_status' => $status ?? 'all'
        ];

        // RENDER VIEW DI FOLDER LANDING
        return view('landing/orders', $data);
    }

    // Fungsi Konfirmasi Pesanan Diterima
    public function confirm($id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $db = \Config\Database::connect();
        $builder = $db->table('orders');

        // Pastikan order milik user yang sedang login
        $order = $builder->where('id', $id)->where('user_id', session()->get('id'))->get()->getRow();

        if ($order && $order->order_status == 'shipped') {
            $builder->where('id', $id)->update(['order_status' => 'completed']);
            return redirect()->to('/orders')->with('success', 'Pesanan telah selesai. Terima kasih!');
        }

        return redirect()->to('/orders');
    }
} 