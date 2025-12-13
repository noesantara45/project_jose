<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class AuthController extends BaseController
{
    protected $adminModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
    }

    /**
     * Display login page
     */
    public function login()
    {
        // If already logged in, redirect to dashboard
        if (session()->get('admin_logged_in')) {
            return redirect()->to(base_url('admin/dashboard'));
        }

        return view('admin/auth/login');
    }

    /**
     * Process login
     */
    public function attemptLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Validation
        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->with('error', 'Username dan password harus diisi!');
        }

        // Check admin credentials
        $admin = $this->adminModel->where('username', $username)->first();

        if ($admin) {
            // Verify password
            if (password_verify($password, $admin['password_hash'])) {
                // Set session
                $sessionData = [
                    'admin_id' => $admin['id'],
                    'admin_username' => $admin['username'],
                    'admin_name' => $admin['name'],
                    'admin_logged_in' => true
                ];
                session()->set($sessionData);

                return redirect()->to(base_url('admin/dashboard'))->with('success', 'Login berhasil!');
            }
        }

        return redirect()->back()->with('error', 'Username atau password salah!');
    }

    /**
     * Logout
     */
    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('admin/login'))->with('success', 'Logout berhasil!');
    }
}