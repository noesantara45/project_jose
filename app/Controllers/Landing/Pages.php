<?php

namespace App\Controllers\Landing;

use App\Controllers\BaseController;


class Pages extends BaseController
{
    // Method untuk halaman About
    public function about()
    {
        $data = ['title' => 'About Us | HLOutfit'];
        // Ini memerintahkan untuk membuka file di folder 'app/Views/pages/about.php'
        return view('landing/pages/about', $data);
    }

    // Method untuk halaman Contact
    public function contact()
    {
        $data = ['title' => 'Hubungi Kami | HLOutfit'];
        // Ini memerintahkan untuk membuka file di folder 'app/Views/pages/contact.php'
        return view('landing/pages/contact', $data);
    }

    // Method untuk halaman FAQ
    public function faq()
    {
        $data = ['title' => 'FAQ & Bantuan | HLOutfit'];
        // Ini memerintahkan untuk membuka file di folder 'app/Views/pages/faq.php'
        return view('landing/pages/faq', $data);
    }

    public function privacy()
    {
        $data = ['title' => 'Privacy Policy | HLOutfit'];
        // Ini memerintahkan untuk membuka file di folder 'app/Views/pages/faq.php'
        return view('landing/pages/privacy', $data);
    }
}
