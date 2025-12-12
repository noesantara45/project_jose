<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function login()
    {
        $data = [
            'title' => 'Masuk Akun | HLOutfit'
        ];
        return view('login', $data);
    }

    public function register()
    {
        $data = [
            'title' => 'Daftar Akun | HLOutfit'
        ];
        return view('register', $data);
    }
}