<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class AdminController extends BaseController
{
    protected $adminModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
    }

    /**
     * Display admins list
     */
    public function index()
    {
        $data = [
            'title' => 'Kelola Admin',
            'page_title' => 'Kelola Admin',
            'active_menu' => 'admins',
            // [JONO-FIX]: Ambil semua data admin, urutkan dari yang terbaru
            'admins' => $this->adminModel->orderBy('created_at', 'DESC')->findAll()
        ];

        return view('admin/admins/index', $data);
    }

    /**
     * Save admin (insert or update)
     */
    public function save()
    {
        $id = $this->request->getPost('id');
        
        // Validation rules
        $rules = [
            'username' => 'required|min_length[4]',
            'name' => 'required|min_length[3]',
        ];

        // Password validation only for new admin or if password is provided
        if (!$id || !empty($this->request->getPost('password'))) {
            $rules['password'] = 'required|min_length[6]';
            $rules['confirm_password'] = 'required|matches[password]';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'name' => $this->request->getPost('name'),
        ];

        // Hash password if provided
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password_hash'] = password_hash($password, PASSWORD_DEFAULT);
        }

        if ($id) {
            // Update
            $this->adminModel->update($id, $data);
            $message = 'Admin berhasil diupdate!';
        } else {
            // Insert
            $this->adminModel->insert($data);
            $message = 'Admin berhasil ditambahkan!';
        }

        return redirect()->to(base_url('admin/admins'))->with('success', $message);
    }

    /**
     * Delete admin
     */
    public function delete($id)
    {
        // Prevent deleting super admin (id = 1)
        if ($id == 1) {
            return redirect()->to(base_url('admin/admins'))->with('error', 'Tidak dapat menghapus Super Admin!');
        }

        $admin = $this->adminModel->find($id);

        if (!$admin) {
            return redirect()->to(base_url('admin/admins'))->with('error', 'Admin tidak ditemukan!');
        }

        $this->adminModel->delete($id);

        return redirect()->to(base_url('admin/admins'))->with('success', 'Admin berhasil dihapus!');
    }
}