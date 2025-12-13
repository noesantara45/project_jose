<?php

// ============================================
// File: app/Filters/AdminAuthFilter.php
// ============================================

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AdminAuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Check if admin is logged in
        if (!session()->get('admin_logged_in')) {
            return redirect()->to(base_url('admin/login'))->with('error', 'Silakan login terlebih dahulu!');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing
    }
}