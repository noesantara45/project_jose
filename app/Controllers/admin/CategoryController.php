<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CategoryModel;

class CategoryController extends BaseController
{
    protected $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }

    public function index()
    {
        // Jika ada yang akses langsung url ini, lempar ke halaman produk
        return redirect()->to('admin/products?tab=categories');
    }

    public function save()
    {
        // 1. Ambil Data
        $id = $this->request->getPost('id');
        $name = $this->request->getPost('name');
        
        // Buat slug otomatis
        $slug = url_title($name, '-', true);

        // 2. Siapkan Array Data
        $data = [
            'name' => $name,
            'slug' => $slug
        ];

        // Jika ID tidak kosong, berarti UPDATE. Masukkan ID ke array.
        if (!empty($id)) {
            $data['id'] = $id;
        }

        // 3. Simpan ke Database
        $this->categoryModel->save($data);

        // 4. Redirect PINTAR (Kembali ke Tab Kategori)
        return redirect()->to(base_url('admin/products?tab=categories'))
                         ->with('success', 'Kategori berhasil disimpan.');
    }

    public function delete($id)
    {
        // Hapus Data
        $this->categoryModel->delete($id);

        // Redirect PINTAR (Kembali ke Tab Kategori)
        return redirect()->to(base_url('admin/products?tab=categories'))
                         ->with('success', 'Kategori berhasil dihapus.');
    }
}