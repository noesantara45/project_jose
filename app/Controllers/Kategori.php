<?php

namespace App\Controllers;

class Kategori extends BaseController
{
    public function kategori()
    {
        // Ini Halaman Kategori
        $data = ['title' => 'Katalog Produk | HLOutfit'];
        return view('kategori', $data);
    }
}