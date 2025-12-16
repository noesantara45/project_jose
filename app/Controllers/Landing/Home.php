<?php

namespace App\Controllers\Landing;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\CategoryModel;

class Home extends BaseController
{
    protected $productModel;
    protected $categoryModel;

    public function __construct()
    {
        // Memuat Model
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
    }

    public function index()
    {
        // 1. Ambil Kategori (Tetap)
        $kategoris = $this->categoryModel->findAll(4);

        // 2. LOGIKA BEST SELLER (Otomatis)
        // Aturan: Urutkan berdasarkan 'total_sold' terbanyak, ambil 4 produk.
        $best_sellers = $this->productModel
            ->select('*')
            ->where('is_active', 1)
            ->orderBy('total_sold', 'DESC') // <--- Kunci Logika Best Seller
            ->findAll(4); // <--- Batas 4 Produk

        // 3. LOGIKA NEW ARRIVAL (Otomatis)
        // Aturan: Urutkan berdasarkan waktu dibuat 'created_at' terbaru, ambil 6 produk.
        $new_arrivals = $this->productModel
            ->select('*')
            ->where('is_active', 1)
            ->orderBy('created_at', 'DESC') // <--- Kunci Logika New Arrival
            ->findAll(6); // <--- Batas 6 Produk (Sesuai Request Tuan)

        $data = [
            'title' => 'Home - HLOutfit',
            'kategoris' => $kategoris,
            'best_sellers' => $best_sellers,
            'produks_terbaru' => $new_arrivals
        ];

        return view('landing/home', $data);
    }
    public function checkout()
    {
        $data = [
            'title' => 'Checkout - HLOutfit'
        ];
        return view('landing/co', $data);
    }
}
