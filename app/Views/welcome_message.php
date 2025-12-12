<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<?php
$kategoris = [
    ['nama' => 'Outerwear', 'icon' => 'fa-user-astronaut', 'count' => '12 Items'],
    ['nama' => 'Pants', 'icon' => 'fa-socks', 'count' => '8 Items'],
    ['nama' => 'Footwear', 'icon' => 'fa-shoe-prints', 'count' => '15 Items'],
    ['nama' => 'Accessories', 'icon' => 'fa-hat-cowboy', 'count' => '20 Items']
];
$produks_terbaru = [
    ['nama' => 'Cargo Pants Tactical', 'cat' => 'Pants', 'harga' => 185000, 'img' => 'https://images.unsplash.com/photo-1517487881594-2787fef5ebf7?w=500'],
    ['nama' => 'Converse 70s High', 'cat' => 'Shoes', 'harga' => 699000, 'img' => 'https://images.unsplash.com/photo-1607522370275-f14206abe5d3?w=500'],
    ['nama' => 'Oversize Hoodie Lilac', 'cat' => 'Jacket', 'harga' => 245000, 'img' => 'https://images.unsplash.com/photo-1556905055-8f358a7a47b2?w=500'],
    ['nama' => 'Flannel Shirt Grunge', 'cat' => 'Shirt', 'harga' => 145000, 'img' => 'https://images.unsplash.com/photo-1596755094514-f87e34085b2c?w=500'],
    ['nama' => 'Bomber Jacket Army', 'cat' => 'Jacket', 'harga' => 320000, 'img' => 'https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=500'],
    ['nama' => 'Denim Ripped Jeans', 'cat' => 'Pants', 'harga' => 210000, 'img' => 'https://images.unsplash.com/photo-1541099649105-f69ad21f3246?w=500'],
];
$best_sellers = [
    ['nama' => 'Varsity Jacket Univ', 'cat' => 'Jacket', 'harga' => 350000, 'img' => 'https://images.unsplash.com/photo-1551028919-ac66e6a39d44?w=500'],
    ['nama' => 'Chino Pants Slim', 'cat' => 'Pants', 'harga' => 175000, 'img' => 'https://images.unsplash.com/photo-1473966968600-fa801b869a1a?w=500'],
    ['nama' => 'Basic Tee White', 'cat' => 'T-Shirt', 'harga' => 85000, 'img' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=500'],
    ['nama' => 'Wristwatch Classic', 'cat' => 'Acc', 'harga' => 175000, 'img' => 'https://images.unsplash.com/photo-1524592094714-0f0654e20314?w=500']
];
?>

<section class="hero-section">
    <div class="container text-center animate-up">
        <span class="badge bg-white text-dark py-2 px-4 rounded-pill mb-4 fw-bold shadow-sm">New Collection 2025</span>
        <h1 class="hero-title mb-4">WEAR YOUR<br>CONFIDENCE</h1>
        <p class="lead mb-5 w-75 mx-auto" style="opacity: 0.9; font-weight: 300;">
            Temukan gaya streetwear terbaikmu. Bahan premium, desain eksklusif,<br>dan harga yang pas untuk kantong
            mahasiswa.
        </p>
        <div class="d-flex justify-content-center gap-3">
            <a href="#new-arrival" class="btn btn-light btn-lg rounded-pill px-5 py-3 fw-bold shadow">Shop Now</a>
            <a href="#" class="btn btn-outline-light btn-lg rounded-pill px-5 py-3 fw-bold">Learn More</a>
        </div>
    </div>
</section>

<div class="section-gap" id="new-arrival">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-5 animate-up">
            <div>
                <h6 class="text-primary fw-bold text-uppercase ls-2 mb-2">Fresh From Oven</h6>
                <h2 class="fw-bold display-6">New Arrivals</h2>
            </div>
            <div class="d-none d-md-flex gap-2">
                <button class="btn btn-outline-dark rounded-circle" style="width: 45px; height: 45px;"
                    onclick="scrollProduk('left')"><i class="fas fa-arrow-left"></i></button>
                <button class="btn btn-outline-dark rounded-circle" style="width: 45px; height: 45px;"
                    onclick="scrollProduk('right')"><i class="fas fa-arrow-right"></i></button>
            </div>
        </div>
        <div class="scroll-container-wrapper animate-up">
            <button class="scroll-btn left d-none d-lg-flex" onclick="scrollProduk('left')"><i
                    class="fas fa-chevron-left"></i></button>
            <button class="scroll-btn right d-none d-lg-flex" onclick="scrollProduk('right')"><i
                    class="fas fa-chevron-right"></i></button>
            <div class="horizontal-scroll" id="produkScroll">
                <?php foreach($produks_terbaru as $p): ?>
                <div class="product-card-item">
                    <div class="card-custom h-100">
                        <div class="position-relative">
                            <span
                                class="position-absolute top-0 start-0 bg-dark text-white px-3 py-1 m-3 rounded-pill small fw-bold"
                                style="font-size: 12px;">New</span>
                            <img src="<?= $p['img'] ?>" class="product-img" alt="Produk">
                        </div>
                        <div class="card-body-custom">
                            <small class="text-muted text-uppercase fw-bold"
                                style="font-size: 11px;"><?= $p['cat'] ?></small>
                            <h5 class="card-title fw-bold text-truncate mt-2 mb-3"><?= $p['nama'] ?></h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-primary fs-5">Rp
                                    <?= number_format($p['harga'],0,',','.') ?></span>
                                <button class="btn btn-outline-dark rounded-circle btn-sm p-2"><i
                                        class="fas fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<div class="container section-gap bg-white rounded-5" id="kategori">
    <div class="d-flex justify-content-between align-items-center mb-5 animate-up">
        <h3 class="fw-bold display-6">Browse by Category</h3>
        <a href="#" class="btn btn-outline-dark rounded-pill px-4">View All</a>
    </div>
    <div class="row g-4">
        <?php foreach($kategoris as $k): ?>
        <div class="col-md-3 col-6">
            <div
                class="card-custom p-4 text-center animate-up h-100 d-flex flex-column justify-content-center align-items-center bg-light border border-light">
                <div class="bg-white rounded-circle shadow-sm d-flex align-items-center justify-content-center mb-4"
                    style="width: 90px; height: 90px;">
                    <i class="fas <?= $k['icon'] ?> fa-2x text-dark"></i>
                </div>
                <h5 class="fw-bold mb-2"><?= $k['nama'] ?></h5>
                <small class="text-muted"><?= $k['count'] ?></small>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="container animate-up">
    <div class="exclusive-section">
        <div class="row g-0 align-items-center">
            <div class="col-lg-6 order-lg-2">
                <img src="https://images.unsplash.com/photo-1542272454315-4c01d7abdf4a?q=80&w=1470"
                    class="w-100 exclusive-img" alt="Promo">
            </div>
            <div class="col-lg-6 exclusive-content order-lg-1">
                <span class="text-warning fw-bold text-uppercase ls-2">Limited Time Offer</span>
                <h2 class="display-4 fw-bold mt-3 mb-4">Couple Edition <br>Street Style</h2>
                <p class="text-white-50 mb-5 fs-5">Dapatkan diskon spesial 30% untuk pembelian paket couple edisi
                    Valentine. Stok terbatas!</p>
                <a href="#" class="btn btn-warning btn-lg rounded-pill px-5 py-3 fw-bold text-dark">Beli Paket Hemat</a>
            </div>
        </div>
    </div>
</div>

<div class="section-gap" id="produk">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-5 animate-up">
            <h3 class="fw-bold display-6">Best Sellers 🔥</h3>
            <a href="#" class="text-decoration-none text-dark fw-bold">Lihat Semua <i
                    class="fas fa-arrow-right ms-2"></i></a>
        </div>
        <div class="row g-4">
            <?php foreach($best_sellers as $b): ?>
            <div class="col-md-3 col-6 animate-up">
                <div class="card-custom h-100">
                    <div class="position-relative">
                        <span
                            class="position-absolute top-0 start-0 bg-danger text-white px-3 py-1 m-3 rounded-pill small fw-bold"
                            style="font-size: 12px;">Hot</span>
                        <img src="<?= $b['img'] ?>" class="product-img" alt="Produk">
                    </div>
                    <div class="card-body-custom">
                        <small class="text-muted text-uppercase fw-bold"><?= $b['cat'] ?></small>
                        <h5 class="card-title fw-bold text-truncate mt-2 mb-3"><?= $b['nama'] ?></h5>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-bold text-dark fs-5">Rp <?= number_format($b['harga'],0,',','.') ?></span>
                            <div class="text-warning small">
                                <i class="fas fa-star"></i> 5.0
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>