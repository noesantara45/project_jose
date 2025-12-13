<?php

namespace App\Controllers\Landing;

use App\Controllers\BaseController;

class Detail extends BaseController
{
    public function detail()
    {
        // Ini Halaman Detail Produk
        $data = ['title' => 'Detail Produk | HLOutfit'];
        return view('landing/detail', $data);
    }
}
