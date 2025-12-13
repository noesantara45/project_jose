<?php

namespace App\Controllers\Landing;

use App\Controllers\BaseController;


class Cart extends BaseController
{
    public function cart()
    {
        // Mockup Data Keranjang (Diperbanyak jadi 6 Item)
        $data = [
            'title' => 'Tas Belanja | HLOutfit',
            'cart_items' => [
                [
                    'id' => 1,
                    'name' => 'Oversized Heavyweight T-Shirt',
                    'color' => 'Hitam',
                    'size' => 'L',
                    'price' => 149000,
                    'qty' => 1,
                    'img' => 'https://images.unsplash.com/photo-1583743814966-8936f5b7be1a?w=200'
                ],
                [
                    'id' => 2,
                    'name' => 'Tactical Cargo Pants',
                    'color' => 'Army Green',
                    'size' => '32',
                    'price' => 185000,
                    'qty' => 2,
                    'img' => 'https://images.unsplash.com/photo-1517487881594-2787fef5ebf7?w=200'
                ],
                [
                    'id' => 3,
                    'name' => 'Converse Chuck 70s High Top',
                    'color' => 'Black/White',
                    'size' => '42',
                    'price' => 699000,
                    'qty' => 1,
                    'img' => 'https://images.unsplash.com/photo-1607522370275-f14206abe5d3?w=200'
                ],
                [
                    'id' => 4,
                    'name' => 'Premium Flannel Shirt',
                    'color' => 'Red Plaid',
                    'size' => 'XL',
                    'price' => 249000,
                    'qty' => 1,
                    'img' => 'https://images.unsplash.com/photo-1596755094514-f87e34085b2c?w=200'
                ],
                [
                    'id' => 5,
                    'name' => 'Snapback Cap Originals',
                    'color' => 'Navy',
                    'size' => 'All Size',
                    'price' => 89000,
                    'qty' => 1,
                    'img' => 'https://images.unsplash.com/photo-1588850561407-ed78c282e89b?w=200'
                ],
                [
                    'id' => 6,
                    'name' => 'Denim Trucker Jacket',
                    'color' => 'Light Blue',
                    'size' => 'L',
                    'price' => 350000,
                    'qty' => 1,
                    'img' => 'https://images.unsplash.com/photo-1576871337622-98d48d1cf531?w=200'
                ]
            ]
        ];

        return view('landing/cart', $data);
    }
}
