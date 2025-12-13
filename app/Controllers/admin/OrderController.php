<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\OrderModel;
use App\Models\OrderItemModel;

class OrderController extends BaseController
{
    protected $orderModel;
    protected $orderItemModel;

    public function __construct()
    {
        $this->orderModel = new OrderModel();
        $this->orderItemModel = new OrderItemModel();
    }

    /**
     * Display orders list
     */
    public function index()
    {
        $data = [
            'title' => 'Kelola Order',
            'page_title' => 'Kelola Order',
            'active_menu' => 'orders',
        ];

        return view('admin/orders/index', $data);
    }

    /**
     * Display order detail
     */
    public function detail($id)
    {
        $order = $this->orderModel
            ->select('orders.*, users.fullname, users.email')
            ->join('users', 'users.id = orders.user_id')
            ->find($id);

        if (!$order) {
            return redirect()->to(base_url('admin/orders'))->with('error', 'Order tidak ditemukan!');
        }

        // Get order items
        $orderItems = $this->orderItemModel
            ->where('order_id', $id)
            ->findAll();

        $data = [
            'title' => 'Detail Order',
            'page_title' => 'Detail Order #' . $order['invoice_number'],
            'active_menu' => 'orders',
            'order' => $order,
            'order_items' => $orderItems,
        ];

        return view('admin/orders/detail', $data);
    }

    /**
     * Update order status
     */
    public function updateStatus($id)
    {
        $orderStatus = $this->request->getPost('order_status');
        $trackingNumber = $this->request->getPost('tracking_number');

        $updateData = [
            'order_status' => $orderStatus
        ];

        if (!empty($trackingNumber)) {
            $updateData['tracking_number'] = $trackingNumber;
        }

        $this->orderModel->update($id, $updateData);

        return redirect()->to(base_url('admin/orders/detail/' . $id))->with('success', 'Status order berhasil diupdate!');
    }
}