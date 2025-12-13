<?php

namespace App\Controllers\Landing;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function login()
    {
        $data = [
            'title' => 'Masuk Akun | HLOutfit'
        ];
        return view('landing/login', $data);
    }

    public function register()
    {
        $data = [
            'title' => 'Daftar Akun | HLOutfit'
        ];
        return view('landing/register', $data);
    }
}
