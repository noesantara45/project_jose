<?php

namespace App\Controllers\Landing;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class Detail extends BaseController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        helper(['number', 'text']);
    }

    public function detail($slug = null)
    {
        // 1. Cari Produk Berdasarkan Slug
        $product = $this->productModel->select('products.*, categories.name as category_name')
                                      ->join('categories', 'categories.id = products.category_id')
                                      ->where('products.slug', $slug)
                                      ->first();

        // Jika produk tidak ditemukan, tampilkan 404
        if (!$product) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Produk tidak ditemukan: $slug");
        }

        // 2. Cari Produk Serupa (Related Products)
        // Logika: Kategori sama, tapi bukan produk yang sedang dibuka
        $related = $this->productModel->where('category_id', $product['category_id'])
                                      ->where('id !=', $product['id'])
                                      ->orderBy('rand()') // Acak biar variatif
                                      ->limit(4)
                                      ->find();

        $data = [
            'title'   => $product['name'] . ' | HLOutfit',
            'product' => $product, // Kirim data produk asli
            'related' => $related  // Kirim data produk serupa
        ];

        return view('landing/detail', $data);
    }
}