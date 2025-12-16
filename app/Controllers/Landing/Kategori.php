<?php

namespace App\Controllers\Landing;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\CategoryModel;

class Kategori extends BaseController
{
    protected $productModel;
    protected $categoryModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
        helper(['number', 'form']);
    }

    public function kategori()
    {
        // 1. Tangkap Input Filter dari URL
        $keyword   = $this->request->getGet('keyword');
        $cat_ids   = $this->request->getGet('kategori'); // Array Checkbox
        $min_price = $this->request->getGet('min');
        $max_price = $this->request->getGet('max');
        $rating    = $this->request->getGet('rating');   // Value 4 atau 5
        $color     = $this->request->getGet('color');    // String 'Hitam', 'Putih', dll
        $size      = $this->request->getGet('size');     // String 'S', 'M', dll

        // 2. Query Builder
        $this->productModel->select('products.*, categories.name as category_name')
                           ->join('categories', 'categories.id = products.category_id')
                           ->where('products.is_active', 1);

        // --- LOGIKA FILTER ---
        
        // A. Filter Pencarian
        if ($keyword) {
            $this->productModel->like('products.name', $keyword);
        }

        // B. Filter Kategori (Array)
        if (!empty($cat_ids)) {
            $this->productModel->whereIn('products.category_id', $cat_ids);
        }

        // C. Filter Harga
        if ($min_price) {
            $this->productModel->where('products.price >=', $min_price);
        }
        if ($max_price) {
            $this->productModel->where('products.price <=', $max_price);
        }

        // D. Filter Rating (4 Keatas atau 5 Sempurna)
        if ($rating) {
            $this->productModel->where('products.rating >=', $rating);
        }

        // E. Filter Warna (Pencarian String)
        if ($color) {
            $this->productModel->like('products.color', $color);
        }

        // F. Filter Ukuran (Pencarian String)
        if ($size) {
            $this->productModel->like('products.size', $size);
        }

        // 3. Eksekusi Data
        $data = [
            'title'      => 'Katalog Produk | HLOutfit',
            'products'   => $this->productModel->orderBy('created_at', 'DESC')->paginate(9, 'katalog'), // 9 Produk per halaman
            'pager'      => $this->productModel->pager,
            'categories' => $this->categoryModel->findAll(), // Untuk Sidebar
            
            // Kirim Balik Data Filter untuk UI
            'filter_keyword' => $keyword,
            'filter_kategori'=> $cat_ids ?? [],
            'filter_min'     => $min_price,
            'filter_max'     => $max_price,
            'filter_rating'  => $rating,
            'filter_color'   => $color,
            'filter_size'    => $size,
        ];

        return view('landing/kategori', $data);
    }
}