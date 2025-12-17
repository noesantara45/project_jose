<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false; // Set true jika ingin fitur 'Trash' (hapus tapi masih bisa restore)

    // --- KOLOM YANG BOLEH DIISI (Mass Assignment) ---
    // Pastikan semua kolom yang mau diinput via form ada di sini
    protected $allowedFields    = [
        'email', 
        'password_hash', 
        'fullname', 
        'phone_number', 
        'address_main'
    ];

    // --- PENGATURAN WAKTU OTOMATIS ---
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
    protected $deletedField     = 'deleted_at';

    // --- VALIDASI OTOMATIS (DATA SECURITY) ---
    // CodeIgniter akan otomatis menolak jika data tidak sesuai aturan ini
    protected $validationRules = [
        'email'        => 'required|valid_email|is_unique[users.email,id,{id}]',
        'fullname'     => 'required|min_length[3]|max_length[100]',
        'phone_number' => 'permit_empty|numeric|min_length[10]|max_length[15]',
        'address_main' => 'permit_empty|min_length[10]'
    ];

    // --- PESAN ERROR KUSTOM (BAHASA INDONESIA) ---
    protected $validationMessages = [
        'email' => [
            'required'    => 'Email wajib diisi.',
            'valid_email' => 'Format email tidak valid.',
            'is_unique'   => 'Email ini sudah terdaftar, gunakan email lain.'
        ],
        'fullname' => [
            'required'    => 'Nama lengkap wajib diisi.',
            'min_length'  => 'Nama terlalu pendek, minimal 3 karakter.'
        ],
        'phone_number' => [
            'numeric'     => 'Nomor telepon harus berupa angka.',
            'min_length'  => 'Nomor telepon minimal 10 digit.'
        ],
        'address_main' => [
            'min_length'  => 'Alamat terlalu pendek, mohon tulis alamat lengkap.'
        ]
    ];
    
    // Jangan lompati validasi
    protected $skipValidation = false; 

    // --- CUSTOM METHOD (Fungsi Tambahan) ---
    
    /**
     * Ambil data user berdasarkan email (berguna untuk Login)
     */
    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }
}