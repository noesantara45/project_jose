<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\CategoryModel;

class ProductController extends BaseController
{
    protected $productModel;
    protected $categoryModel;

    public function __construct()
    {
        // Load Model
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
        
        // LOAD HELPER DI SINI (PENTING!)
        // Ini akan memperbaiki error "undefined function character_limiter"
        helper(['form', 'text', 'number']); 
    }

    /**
     * Menampilkan daftar produk (Index)
     */
    public function index()
    {
        // 1. Ambil parameter pencarian dan filter dari URL
        $keyword = $this->request->getGet('keyword');
        $categoryId = $this->request->getGet('category_id');

        // 2. Siapkan Query Builder untuk join tabel
        // Kita butuh nama kategori, bukan cuma ID-nya
        $this->productModel->select('products.*, categories.name as category_name')
                           ->join('categories', 'categories.id = products.category_id');

        // 3. Terapkan Filter jika ada
        if ($keyword) {
            $this->productModel->groupStart()
                ->like('products.name', $keyword)
                ->orLike('products.description', $keyword)
            ->groupEnd();
        }

        if ($categoryId) {
            $this->productModel->where('products.category_id', $categoryId);
        }

        // 4. Ambil data dengan paginasi (10 per halaman)
        $data = [
            'title'       => 'Manajemen Produk',
            'page_title'  => 'Manajemen Produk',
            'active_menu' => 'products',
            'products'    => $this->productModel->paginate(10, 'products'),
            'pager'       => $this->productModel->pager,
            'categories'  => $this->categoryModel->findAll(), // Untuk dropdown filter
            'keyword'     => $keyword,
            'selectedCat' => $categoryId
        ];

        return view('admin/products/index', $data);
    }

    /**
     * Menampilkan Form Tambah
     */
    public function add()
    {
        $data = [
            'title' => 'Tambah Produk',
            'page_title' => 'Tambah Produk Baru',
            'active_menu' => 'products',
            'categories' => $this->categoryModel->findAll() // Kirim data kategori
        ];

        return view('admin/products/form', $data);
    }

    /**
     * Menampilkan Form Edit
     */
    public function edit($id)
    {
        $product = $this->productModel->find($id);

        if (!$product) {
            return redirect()->to(base_url('admin/products'))->with('error', 'Produk tidak ditemukan!');
        }

        $data = [
            'title' => 'Edit Produk',
            'page_title' => 'Edit Produk',
            'active_menu' => 'products',
            'product' => $product,
            'categories' => $this->categoryModel->findAll() // Kirim data kategori
        ];

        return view('admin/products/form', $data);
    }

    /**
     * Proses Simpan Data (Insert & Update)
     */
    public function save()
    {
        // 1. Validasi Input
        if (!$this->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            // [FIX JONO]: Tambahkan 'permit_empty' agar tidak error saat edit tanpa ganti gambar
            'image' => [
                'rules' => 'permit_empty|max_size[image,2048]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar (Maksimal 2MB)',
                    'is_image' => 'File yang Anda pilih bukan gambar',
                    'mime_in' => 'File harus berupa JPG, JPEG, atau PNG'
                ]
            ]
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // 2. Handle Upload Gambar
        $fileImage = $this->request->getFile('image');
        $imageName = $this->request->getPost('old_image'); // Default pakai gambar lama

        // Cek apakah ada gambar baru yang diupload
        if ($fileImage->getError() == 4) {
            // Jika tidak ada upload, gunakan nama file lama
            if(empty($imageName)) {
                $imageName = 'default.jpg';
            }
        } else {
            // Jika ada upload, generate nama baru dan pindahkan file
            $imageName = $fileImage->getRandomName();
            $fileImage->move('uploads/products', $imageName);
            
            // (Opsional) Hapus file lama jika bukan default.jpg
            // if ($this->request->getPost('old_image') != 'default.jpg') {
            //     unlink('uploads/products/' . $this->request->getPost('old_image'));
            // }
        }

        // 3. Simpan ke Database
        // slug dibuat otomatis dari nama produk
        $slug = url_title($this->request->getPost('name'), '-', true);

        $this->productModel->save([
            'id' => $this->request->getPost('id'), // Kalau ada ID berarti update, kalau null berarti insert
            'category_id' => $this->request->getPost('category_id'),
            'name' => $this->request->getPost('name'),
            'slug' => $slug,
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'stock' => $this->request->getPost('stock'),
            'image' => $imageName,
            'is_active' => $this->request->getPost('is_active')
        ]);

        return redirect()->to(base_url('admin/products'))->with('success', 'Data produk berhasil disimpan.');
    }

    /**
     * Proses Hapus Data
     */
   public function delete($id)
    {
        // 1. Cari data produk berdasarkan ID
        $product = $this->productModel->find($id);

        // Jika produk tidak ditemukan, kembalikan error
        if (!$product) {
            return redirect()->to(base_url('admin/products'))->with('error', 'Data tidak ditemukan.');
        }

        // 2. Hapus File Gambar (Bersih-bersih server)
        // Cek apakah gambarnya bukan 'default.jpg' dan filenya benar-benar ada
        if ($product['image'] != 'default.jpg' && file_exists('uploads/products/' . $product['image'])) {
            unlink('uploads/products/' . $product['image']);
        }

        // 3. Hapus Data dari Database
        $this->productModel->delete($id);

        // 4. Redirect kembali dengan pesan sukses
        return redirect()->to(base_url('admin/products'))->with('success', 'Produk berhasil dihapus.');
    }
}