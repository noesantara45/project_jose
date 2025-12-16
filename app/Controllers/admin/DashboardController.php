<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\OrderModel;
use App\Models\ProductModel;
use App\Models\UserModel;

class DashboardController extends BaseController
{
    protected $orderModel;
    protected $productModel;
    protected $userModel;
    protected $db;

    public function __construct()
    {
        $this->orderModel = new OrderModel();
        $this->productModel = new ProductModel();
        $this->userModel = new UserModel();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        // 1. DATA STATISTIK UTAMA
        $totalOrders = $this->orderModel->countAll();
        $totalProducts = $this->productModel->countAll();
        $totalUsers = $this->userModel->countAll();
        
        // Hitung total pendapatan (Hanya yang statusnya 'paid')
        $earningData = $this->orderModel
            ->where('payment_status', 'paid')
            ->selectSum('total_price')
            ->first();
        $totalEarning = $earningData['total_price'] ?? 0;

        // 2. DATA ORDER TERBARU (Ambil 5 terakhir)
        $recentOrders = $this->orderModel
            ->orderBy('created_at', 'DESC')
            ->limit(5)
            ->findAll();

        // 3. DATA PRODUK TERLARIS (Top Selling)
        // Kita perlu join tabel order_items, products, dan categories
        $builder = $this->db->table('order_items');
        $builder->select('products.name as product_name, products.price, products.stock, categories.name as category_name, SUM(order_items.qty) as total_sold');
        $builder->join('products', 'products.id = order_items.product_id');
        $builder->join('categories', 'categories.id = products.category_id', 'left');
        $builder->groupBy('order_items.product_id');
        $builder->orderBy('total_sold', 'DESC');
        $builder->limit(5); // Ambil top 5
        $topProducts = $builder->get()->getResultArray();

        $data = [
            'title'          => 'Dashboard',
            'page_title'     => 'Dashboard',
            'active_menu'    => 'dashboard',
            'total_orders'   => $totalOrders,
            'total_products' => $totalProducts,
            'total_users'    => $totalUsers,
            'total_earning'  => $totalEarning,
            'recent_orders'  => $recentOrders,
            'top_products'   => $topProducts
        ];

        return view('admin/dashboard', $data);
    }
}