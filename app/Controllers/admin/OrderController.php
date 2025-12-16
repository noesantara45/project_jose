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
     * Display orders list with Search & Filter
     */
    public function index()
    {
        // 1. Ambil input dari pencarian dan filter
        $keyword = $this->request->getGet('keyword');
        $status = $this->request->getGet('status');

        // 2. Mulai Query
        $model = $this->orderModel;
        
        // Select data yang dibutuhkan, join ke users untuk ambil email (jika perlu)
        // Kita gunakan 'orders.*' dan 'users.email' 
        $model->select('orders.*, users.email as user_email, users.fullname as user_fullname')
              ->join('users', 'users.id = orders.user_id', 'left');

        // 3. Logic Pencarian (Invoice atau Nama Penerima)
        if ($keyword) {
            $model->groupStart()
                  ->like('orders.invoice_number', $keyword)
                  ->orLike('orders.recipient_name', $keyword)
                  ->groupEnd();
        }

        // 4. Logic Filter Status Pembayaran
        if ($status) {
            $model->where('orders.payment_status', $status);
        }

        // 5. Urutkan dari yang terbaru
        $model->orderBy('orders.created_at', 'DESC');

        // 6. Siapkan data untuk View
        $data = [
            'title'       => 'Kelola Order',
            'page_title'  => 'Kelola Order',
            'active_menu' => 'orders',
            // Paginate otomatis menghitung limit & offset
            'orders'      => $model->paginate(10, 'orders'), 
            'pager'       => $model->pager,
            // Kirim balik inputan user supaya form tidak reset
            'keyword'     => $keyword,
            'filter_status' => $status
        ];

        return view('admin/orders/index', $data);
    }

    /**
     * Display order detail
     */
    public function detail($id)
    {
        $order = $this->orderModel
            ->select('orders.*, users.fullname as user_fullname, users.email as user_email')
            ->join('users', 'users.id = orders.user_id', 'left')
            ->find($id);

        if (!$order) {
            return redirect()->to(base_url('admin/orders'))->with('error', 'Order tidak ditemukan!');
        }

        // Get order items
        $orderItems = $this->orderItemModel
            ->where('order_id', $id)
            ->findAll();

        $data = [
            'title'       => 'Detail Order',
            'page_title'  => 'Detail Order #' . $order['invoice_number'],
            'active_menu' => 'orders',
            'order'       => $order,
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

        // Jika status SHIPPED, wajib update resi jika diisi
        if (!empty($trackingNumber)) {
            $updateData['tracking_number'] = $trackingNumber;
        }

        $this->orderModel->update($id, $updateData);

        return redirect()->to(base_url('admin/orders/detail/' . $id))->with('success', 'Status order berhasil diupdate!');
    }
}