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

    public function __construct()
    {
        $this->orderModel = new OrderModel();
        $this->productModel = new ProductModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        // Get statistics
        $totalOrders = $this->orderModel->countAll();
        $totalProducts = $this->productModel->countAll();
        $totalUsers = $this->userModel->countAll();
        
        // Calculate total earning from paid orders
        $totalEarning = $this->orderModel
            ->where('payment_status', 'paid')
            ->selectSum('total_price')
            ->first();

        $data = [
            'title' => 'Dashboard',
            'page_title' => 'Dashboard',
            'active_menu' => 'dashboard',
            'total_orders' => $totalOrders,
            'total_products' => $totalProducts,
            'total_users' => $totalUsers,
            'total_earning' => $totalEarning['total_price'] ?? 0,
        ];

        return view('admin/dashboard', $data);
    }
}