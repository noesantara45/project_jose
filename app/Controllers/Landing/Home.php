<?php

namespace App\Controllers\Landing;

use App\Controllers\BaseController;
use App\Models\ProductModel; // Pastikan model ini ada atau kita buat nanti

class Home extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('products');
        
        // 1. Ambil Produk Terbaru (Untuk Slider Atas)
        // (Kode lama bos tetap di sini)
        $terbaru = $db->table('products')
                      ->where('is_active', 1)
                      ->orderBy('created_at', 'DESC')
                      ->get(6)
                      ->getResultArray();

        // 2. Ambil Best Seller (Untuk Grid)
        // (Kode lama bos tetap di sini)
        $best = $db->table('products')
                   ->where('is_active', 1)
                   ->orderBy('total_sold', 'DESC')
                   ->get(4)
                   ->getResultArray();

        // 3. [BARU] Ambil 10 Produk Random untuk Katalog Bergerak
        $katalog_random = $db->table('products')
                             ->where('is_active', 1)
                             ->orderBy('rand()') // Order Random
                             ->limit(10)         // Ambil 10 biji
                             ->get()
                             ->getResultArray();

        $data = [
            'title'           => 'Home | HLOutfit',
            'produks_terbaru' => $terbaru,
            'best_sellers'    => $best,
            'katalog_random'  => $katalog_random, // <-- Kirim variabel baru ini
        ];

        return view('landing/home', $data); 
    }
    
    // Fungsi detail (sesuai routes bos)
    public function detail($slug = null)
    {
        // 1. Koneksi Database
        $db = \Config\Database::connect();

        // 2. Cari Produk Berdasarkan Slug (Join Kategori biar dapat nama kategori)
        $product = $db->table('products')
                      ->select('products.*, categories.name as category_name')
                      ->join('categories', 'categories.id = products.category_id')
                      ->where('products.slug', $slug)
                      ->get()->getRowArray();

        // 3. Kalau produk gak ketemu, tampilkan error 404
        if (!$product) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Produk $slug tidak ditemukan");
        }

        // 4. Cari Produk Related (Produk lain dengan kategori sama)
        $related = $db->table('products')
                      ->where('category_id', $product['category_id'])
                      ->where('id !=', $product['id']) // exclude produk ini sendiri
                      ->orderBy('rand()')
                      ->limit(4)
                      ->get()->getResultArray();

        // 5. Kirim data ke View
        $data = [
            'title'   => $product['name'] . ' | HLOutfit',
            'product' => $product,
            'related' => $related
        ];

        // Tampilkan View Detail yang tadi sudah kita perbaiki
        return view('landing/detail', $data);
    }

    // Fungsi checkout (sesuai routes bos)
    public function checkout()
    {
        // 1. Cek apakah user sudah login?
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('login')->with('error', 'Silakan login untuk melanjutkan checkout.');
        }

        // 2. Siapkan Data (Sementara judul dulu, nanti kita isi data cart asli)
        $data = [
            'title' => 'Checkout | HLOutfit'
        ];

        // 3. Tampilkan View 'co.php'
        // Pastikan file co.php bos simpan di folder app/Views/landing/
        return view('landing/co', $data); 
    }

    public function search()
    {
        $keyword = $this->request->getGet('keyword');
        
        $db = \Config\Database::connect();
        $builder = $db->table('products');

        if ($keyword) {
            $builder->groupStart()
                    ->like('name', $keyword)
                    ->orLike('description', $keyword) // Opsional: cari di deskripsi juga
                    ->groupEnd();
        }

        // Ambil data
        $produks = $builder->where('is_active', 1)
                           ->orderBy('created_at', 'DESC')
                           ->get()
                           ->getResultArray();

        // --- LOGIKA PINTAR JONO ---
        
        // SKENARIO 1: Kalau hasilnya cuma 1 biji, langsung lempar ke Detail!
        if (count($produks) === 1) {
            $slug = $produks[0]['slug'];
            return redirect()->to('detail/' . $slug);
        }

        // SKENARIO 2: Kalau hasilnya BANYAK atau KOSONG, tampilkan list seperti biasa
        $data = [
            'title' => 'Hasil Pencarian: ' . ($keyword ? $keyword : 'Semua Produk'),
            'produks_terbaru' => $produks,
            'keyword' => $keyword
        ];

        return view('landing/home', $data);
    }
}