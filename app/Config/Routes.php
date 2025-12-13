<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('kategori', 'Kategori::kategori');
$routes->get('detail', 'Detail::detail');
$routes->get('cart', 'Cart::cart');

//login
$routes->get('login', 'Auth::login');
$routes->get('register', 'Auth::register');

//pages
$routes->get('about', 'Pages::about');
$routes->get('contact', 'Pages::contact');
$routes->get('faq', 'Pages::faq');
$routes->get('privacy-policy', 'Pages::privacy');