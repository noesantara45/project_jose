<?php

namespace App\Controllers\Landing;

use App\Controllers\BaseController;


class Kategori extends BaseController
{
    public function kategori()
    {
        // Ini Halaman Kategori
        $data = ['title' => 'Katalog Produk | HLOutfit'];
        return view('landing/kategori', $data);
    }
}
