<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Default route
$routes->get('/', 'Landing\\Home::index');
$routes->get('kategori', 'Landing\\Kategori::kategori');
$routes->get('detail/(:segment)', 'Landing\Detail::detail/$1');
$routes->get('co', 'Landing\\Home::checkout');

$routes->get('about', 'Landing\\Pages::about');
$routes->get('contact', 'Landing\\Pages::contact');
$routes->get('faq', 'Landing\\Pages::faq');
$routes->get('privacy', 'Landing\\Pages::privacy');

$routes->get('login', 'Landing\Auth::login');
$routes->post('auth/login', 'Landing\Auth::processLogin');
$routes->get('register', 'Landing\Auth::register');
$routes->post('auth/register', 'Landing\Auth::processRegister');
$routes->get('logout', 'Landing\Auth::logout');

// Tambahkan Route Search ini
$routes->get('search', 'Landing\Home::search');

// Hapus atau timpa route 'cart' yang lama dengan grup ini:
$routes->group('cart', ['filter' => 'authguard'], function ($routes) {
    $routes->get('/', 'Landing\Cart::index');
    $routes->post('add', 'Landing\Cart::add');
    $routes->post('update', 'Landing\Cart::update');
    $routes->get('delete/(:num)', 'Landing\Cart::delete/$1');
    $routes->get('product/(:segment)', 'Landing\Home::detail/$1');
});

// ============================================
// ADMIN ROUTES
// ============================================

// Admin Login & Logout
$routes->get('admin/login', 'Admin\AuthController::login');
$routes->post('admin/auth/login', 'Admin\AuthController::attemptLogin');
$routes->get('admin/logout', 'Admin\AuthController::logout');

// Admin Dashboard (Protected)
$routes->group('admin', ['filter' => 'adminauth'], function ($routes) {

    // Dashboard
    $routes->get('dashboard', 'Admin\DashboardController::index');

    // Orders Management
    $routes->get('orders', 'Admin\OrderController::index');
    $routes->get('orders/detail/(:num)', 'Admin\OrderController::detail/$1');
    $routes->post('orders/update-status/(:num)', 'Admin\OrderController::updateStatus/$1');

    // Products Management
    $routes->get('products', 'Admin\ProductController::index');
    $routes->get('products/add', 'Admin\ProductController::add');
    $routes->get('products/edit/(:num)', 'Admin\ProductController::edit/$1');
    $routes->post('products/save', 'Admin\ProductController::save');
    $routes->get('products/delete/(:num)', 'Admin\ProductController::delete/$1');

    // Categories Management
    $routes->get('categories', 'Admin\CategoryController::index');
    $routes->post('categories/save', 'Admin\CategoryController::save');
    $routes->get('categories/delete/(:num)', 'Admin\CategoryController::delete/$1');

    // Admins Management
    $routes->get('admins', 'Admin\AdminController::index');
    $routes->post('admins/save', 'Admin\AdminController::save');
    $routes->get('admins/delete/(:num)', 'Admin\AdminController::delete/$1');
});