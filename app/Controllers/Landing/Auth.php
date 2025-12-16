<?php

namespace App\Controllers\Landing;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    // --- FITUR REGISTER ---

    public function register()
    {
        // Jika sudah login, lempar ke home
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }

        $data = ['title' => 'Daftar Akun | HLOutfit'];
        return view('landing/auth/register', $data);
    }

    public function processRegister()
    {
        // 1. Validasi Input
        $rules = [
            // GANTI TANDA KURUNG () MENJADI KURUNG SIKU []
            'fullname' => 'required|min_length[3]|max_length[100]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'confpassword' => 'matches[password]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // 2. Simpan Data
        $data = [
            'fullname'      => $this->request->getPost('fullname'),
            'email'         => $this->request->getPost('email'),
            // Password di-hash (dienkripsi) sebelum masuk database
            'password_hash' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];

        $this->userModel->insert($data);

        return redirect()->to('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // --- FITUR LOGIN ---

    public function login()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }

        $data = ['title' => 'Login | HLOutfit'];
        return view('landing/auth/login', $data);
    }

    public function processLogin()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Cari user berdasarkan email
        $user = $this->userModel->where('email', $email)->first();

        if ($user) {
            // Verifikasi Password Hash
            if (password_verify($password, $user['password_hash'])) {

                // Set Session
                $sessionData = [
                    'id'         => $user['id'],
                    'fullname'   => $user['fullname'],
                    'email'      => $user['email'],
                    'isLoggedIn' => true
                ];
                session()->set($sessionData);

                return redirect()->to('/')->with('success', 'Selamat datang, ' . $user['fullname']);
            } else {
                return redirect()->back()->withInput()->with('error', 'Password salah.');
            }
        } else {
            return redirect()->back()->withInput()->with('error', 'Email tidak ditemukan.');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Anda berhasil logout.');
    }
}
