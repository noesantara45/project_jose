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

    /**
     * Display categories list
     */
    public function index()
    {
        $data = [
            'title' => 'Kelola Kategori',
            'page_title' => 'Kelola Kategori',
            'active_menu' => 'categories',
        ];

        return view('admin/categories/index', $data);
    }

    /**
     * Save category (insert or update)
     */
    public function save()
    {
        $id = $this->request->getPost('id');
        
        // Validation rules
        $rules = [
            'name' => 'required|min_length[3]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Generate slug
        $slug = url_title($this->request->getPost('name'), '-', true);

        $data = [
            'name' => $this->request->getPost('name'),
            'slug' => $slug,
        ];

        if ($id) {
            // Update
            $this->categoryModel->update($id, $data);
            $message = 'Kategori berhasil diupdate!';
        } else {
            // Insert
            $this->categoryModel->insert($data);
            $message = 'Kategori berhasil ditambahkan!';
        }

        return redirect()->to(base_url('admin/categories'))->with('success', $message);
    }

    /**
     * Delete category
     */
    public function delete($id)
    {
        $category = $this->categoryModel->find($id);

        if (!$category) {
            return redirect()->to(base_url('admin/categories'))->with('error', 'Kategori tidak ditemukan!');
        }

        $this->categoryModel->delete($id);

        return redirect()->to(base_url('admin/categories'))->with('success', 'Kategori berhasil dihapus!');
    }
}