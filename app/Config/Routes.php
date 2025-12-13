<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Default route
$routes->get('/', 'Home::index');

// ============================================
// ADMIN ROUTES
// ============================================

// Admin Login & Logout
$routes->get('admin/login', 'Admin\AuthController::login');
$routes->post('admin/auth/login', 'Admin\AuthController::attemptLogin');
$routes->get('admin/logout', 'Admin\AuthController::logout');

// Admin Dashboard (Protected)
$routes->group('admin', ['filter' => 'adminauth'], function($routes) {
    
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

$routes->get('kategori', 'Kategori::kategori');
$routes->get('detail', 'Detail::detail');
$routes->get('cart', 'Cart::cart');

$routes->get('about', 'Pages::about');
$routes->get('contact', 'Pages::contact');
$routes->get('faq', 'Pages::faq');
$routes->get('privacy', 'Pages::privacy');