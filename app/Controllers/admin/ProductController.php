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
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
    }

    /**
     * Display products list
     */
    public function index()
    {
        $data = [
            'title' => 'Manajemen Produk',
            'page_title' => 'Manajemen Produk',
            'active_menu' => 'products',
        ];

        return view('admin/products/index', $data);
    }

    /**
     * Display add product form
     */
    public function add()
    {
        $data = [
            'title' => 'Tambah Produk',
            'page_title' => 'Tambah Produk Baru',
            'active_menu' => 'products',
        ];

        return view('admin/products/form', $data);
    }

    /**
     * Display edit product form
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
        ];

        return view('admin/products/form', $data);
    }

    /**
     * Save product (insert or update)
     */
    public function save()
    {
        $id = $this->request->getPost('id');
        
        // Validation rules
        $rules = [
            'name' => 'required|min_length[3]',
            'category_id' => 'required|numeric',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Generate slug
        $slug = url_title($this->request->getPost('name'), '-', true);

        $data = [
            'category_id' => $this->request->getPost('category_id'),
            'name' => $this->request->getPost('name'),
            'slug' => $slug,
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'stock' => $this->request->getPost('stock'),
            'is_active' => $this->request->getPost('is_active'),
        ];

        // Handle image upload
        $image = $this->request->getFile('image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/uploads/products', $newName);
            $data['image'] = $newName;
        }

        if ($id) {
            // Update
            $this->productModel->update($id, $data);
            $message = 'Produk berhasil diupdate!';
        } else {
            // Insert
            $this->productModel->insert($data);
            $message = 'Produk berhasil ditambahkan!';
        }

        return redirect()->to(base_url('admin/products'))->with('success', $message);
    }

    /**
     * Delete product
     */
    public function delete($id)
    {
        $product = $this->productModel->find($id);

        if (!$product) {
            return redirect()->to(base_url('admin/products'))->with('error', 'Produk tidak ditemukan!');
        }

        // Delete image file if exists
        if ($product['image'] != 'default.jpg' && file_exists(ROOTPATH . 'public/uploads/products/' . $product['image'])) {
            unlink(ROOTPATH . 'public/uploads/products/' . $product['image']);
        }

        $this->productModel->delete($id);

        return redirect()->to(base_url('admin/products'))->with('success', 'Produk berhasil dihapus!');
    }
}