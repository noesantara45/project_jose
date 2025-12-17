<?php

namespace App\Controllers\Landing;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Profile extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $userId = session()->get('id');

        // Ambil data user terbaru dari database
        $user = $this->userModel->find($userId);

        $data = [
            'title' => 'Akun Saya | HLOutfit',
            'user'  => $user
        ];

        return view('landing/profile', $data);
    }

    public function update()
    {
        $userId = session()->get('id');

        // 1. Validasi Input
        if (!$this->validate([
            'fullname' => 'required|min_length[3]',
            'phone_number' => 'required|numeric|min_length[10]',
            'address_main' => 'required|min_length[10]',
        ])) {
            return redirect()->back()->withInput()->with('error', 'Pastikan semua data terisi dengan benar.');
        }

        // 2. Siapkan Data Update
        $data = [
            'id'           => $userId,
            'fullname'     => $this->request->getPost('fullname'),
            'phone_number' => $this->request->getPost('phone_number'),
            'address_main' => $this->request->getPost('address_main'),
        ];

        // 3. Update Password (Opsional: Hanya jika diisi)
        $newPassword = $this->request->getPost('password');
        if (!empty($newPassword)) {
            $data['password_hash'] = password_hash($newPassword, PASSWORD_DEFAULT);
        }

        // 4. Simpan ke Database
        $this->userModel->save($data);

        // 5. Update Session (Penting! Agar nama di navbar berubah realtime)
        session()->set('fullname', $data['fullname']);

        return redirect()->to('profile')->with('success', 'Profil berhasil diperbarui!');
    }
}