<?php

namespace App\Controllers;

class Detail extends BaseController
{
    public function detail()
    {
        // Ini Halaman Detail Produk
        $data = ['title' => 'Detail Produk | HLOutfit'];
        return view('detail', $data);
    }
}