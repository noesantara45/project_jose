<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<?php
// Data Asli
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

// Data Baru (Flash Sale)
$flash_sale = [
    ['nama' => 'Air Jordan 1 Low', 'harga' => 1250000, 'old' => 2500000, 'img' => 'https://images.unsplash.com/photo-1552346154-21d32810aba3?w=500'],
    ['nama' => 'Urban Bomber Jacket', 'harga' => 350000, 'old' => 799000, 'img' => 'https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=500'],
    ['nama' => 'G-Shock Casio Black', 'harga' => 999000, 'old' => 1800000, 'img' => 'https://images.unsplash.com/photo-1524592094714-0f0654e20314?w=500'],
    ['nama' => 'Rayban Wayfarer', 'harga' => 1500000, 'old' => 2200000, 'img' => 'https://images.unsplash.com/photo-1572635196237-14b3f281503f?w=500'],
];
?>

<style>
/* HERO SECTION (LURUS/KOTAK) */
.hero-section {
    height: 100vh;
    background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1552374196-1ab2a1c593e8?q=80&w=1470');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    display: flex;
    align-items: center;
    color: white;
    border-radius: 0;
    margin-bottom: 0;
    padding-top: 80px;
}

.hero-title {
    font-size: 4rem;
    font-weight: 800;
    line-height: 1.1;
    letter-spacing: -1px;
    margin-bottom: 25px;
}

/* --- FITUR BARU 1: BRAND MARQUEE --- */
.brand-marquee {
    background: #000;
    padding: 20px 0;
    overflow: hidden;
    white-space: nowrap;
}

.marquee-content {
    display: inline-block;
    animation: marquee 20s linear infinite;
}

.brand-logo {
    color: #555;
    font-size: 24px;
    font-weight: 800;
    margin: 0 40px;
    text-transform: uppercase;
    letter-spacing: 2px;
}

.brand-logo:hover {
    color: #fff;
}

@keyframes marquee {
    0% {
        transform: translateX(0);
    }

    100% {
        transform: translateX(-50%);
    }
}

/* --- FITUR BARU 2: FLASH SALE --- */
.flash-section {
    background: #f8f9fa;
    padding: 60px 0;
    border-bottom: 1px solid #eee;
}

.timer-box {
    display: inline-block;
    background: #d32f2f;
    color: #fff;
    padding: 5px 10px;
    border-radius: 5px;
    font-weight: 700;
    margin: 0 3px;
    font-size: 18px;
}

.flash-card {
    border: 1px solid #eee;
    transition: 0.3s;
    background: #fff;
    position: relative;
    overflow: hidden;
    border-radius: 12px;
}

.flash-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
}

.flash-badge {
    position: absolute;
    top: 10px;
    left: 10px;
    background: #d32f2f;
    color: #fff;
    font-weight: 700;
    font-size: 12px;
    padding: 3px 8px;
    border-radius: 3px;
    z-index: 2;
}

/* Service Box */
.service-box {
    background: white;
    padding: 40px 25px;
    border-radius: 12px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
    text-align: center;
    transition: 0.3s;
    height: 100%;
    border: 1px solid #eee;
}

.service-box:hover {
    transform: translateY(-5px);
    border-color: #000;
}

.service-icon {
    font-size: 2.5rem;
    margin-bottom: 25px;
    color: #333;
}

/* Scroll Product */
.scroll-container-wrapper {
    position: relative;
}

.horizontal-scroll {
    display: flex;
    overflow-x: auto;
    gap: 30px;
    padding: 20px 5px 50px 5px;
    scroll-behavior: smooth;
    -ms-overflow-style: none;
    scrollbar-width: none;
}

.horizontal-scroll::-webkit-scrollbar {
    display: none;
}

.product-card-item {
    min-width: 290px;
    max-width: 290px;
    flex-shrink: 0;
}

/* Scroll Buttons */
.scroll-btn {
    position: absolute;
    top: 45%;
    transform: translateY(-50%);
    width: 55px;
    height: 55px;
    background: #fff;
    border-radius: 50%;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
    border: none;
    z-index: 10;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: 0.3s;
}

.scroll-btn:hover {
    background: #111;
    color: #fff;
}

.scroll-btn.left {
    left: -25px;
}

.scroll-btn.right {
    right: -25px;
}

/* Card Styling */
.card-custom {
    border: 1px solid #f0f0f0;
    border-radius: 12px;
    overflow: hidden;
    background: #fff;
    transition: 0.4s;
    height: 100%;
}

.card-custom:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.08);
    border-color: transparent;
}

.product-img {
    height: 320px;
    object-fit: cover;
    width: 100%;
}

.card-body-custom {
    padding: 20px;
}

/* Exclusive Section */
.exclusive-section {
    background-color: #111;
    color: white;
    border-radius: 0;
    overflow: hidden;
    margin: 80px 0;
}

.exclusive-img {
    height: 100%;
    min-height: 450px;
    object-fit: cover;
}

.exclusive-content {
    padding: 60px;
}

/* Helper */
.section-gap {
    padding-top: 50px;
    padding-bottom: 50px;
}
</style>

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

<div class="brand-marquee">
    <div class="marquee-content">
        <span class="brand-logo">NIKE</span>
        <span class="brand-logo">ADIDAS</span>
        <span class="brand-logo">UNIQLO</span>
        <span class="brand-logo">H&M</span>
        <span class="brand-logo">ZARA</span>
        <span class="brand-logo">CONVERSE</span>
        <span class="brand-logo">VANS</span>
        <span class="brand-logo">PULL&BEAR</span>
        <span class="brand-logo">NIKE</span>
        <span class="brand-logo">ADIDAS</span>
        <span class="brand-logo">UNIQLO</span>
        <span class="brand-logo">H&M</span>
    </div>
</div>

<div class="flash-section">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
            <div class="d-flex align-items-center gap-3">
                <h2 class="fw-bold mb-0 text-danger"><i class="fas fa-bolt"></i> FLASH SALE</h2>
                <div id="countdown" class="d-flex">
                    <div class="timer-box">02</div> : <div class="timer-box">45</div> : <div class="timer-box"
                        id="seconds">00</div>
                </div>
            </div>
            <a href="#" class="text-danger fw-bold text-decoration-none">Lihat Semua <i
                    class="fas fa-arrow-right"></i></a>
        </div>

        <div class="row g-3">
            <?php foreach($flash_sale as $fs): ?>
            <div class="col-6 col-md-3">
                <div class="flash-card h-100">
                    <div class="flash-badge">HEMAT <?= round((($fs['old'] - $fs['harga'])/$fs['old'])*100) ?>%</div>
                    <img src="<?= $fs['img'] ?>" class="w-100" style="height: 250px; object-fit: cover;">
                    <div class="p-3">
                        <h6 class="fw-bold text-truncate"><?= $fs['nama'] ?></h6>
                        <div class="text-danger fw-bold fs-5">Rp <?= number_format($fs['harga'],0,',','.') ?></div>
                        <div class="text-muted text-decoration-line-through small">Rp
                            <?= number_format($fs['old'],0,',','.') ?></div>
                        <div class="progress mt-2" style="height: 6px;">
                            <div class="progress-bar bg-danger" style="width: 85%"></div>
                        </div>
                        <small class="text-danger" style="font-size: 10px;">Segera Habis!</small>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div class="container section-gap">
    <div class="row g-4">
        <div class="col-md-3 col-6">
            <div class="service-box animate-up delay-1"><i class="fas fa-shipping-fast service-icon text-primary"></i>
                <h5 class="fw-bold mb-2">Pengiriman Cepat</h5>
                <p class="text-muted small mb-0">Estimasi 2-3 hari sampai</p>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="service-box animate-up delay-2"><i class="fas fa-shield-alt service-icon text-success"></i>
                <h5 class="fw-bold mb-2">Pembayaran Aman</h5>
                <p class="text-muted small mb-0">Transaksi terenkripsi 100%</p>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="service-box animate-up delay-3"><i class="fas fa-undo service-icon text-warning"></i>
                <h5 class="fw-bold mb-2">Garansi Retur</h5>
                <p class="text-muted small mb-0">Jaminan uang kembali</p>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="service-box animate-up delay-4"><i class="fas fa-headset service-icon text-danger"></i>
                <h5 class="fw-bold mb-2">24/7 Support</h5>
                <p class="text-muted small mb-0">Siap membantu kapan saja</p>
            </div>
        </div>
    </div>
</div>

<div class="section-gap bg-light" id="new-arrival">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-5 animate-up">
            <div>
                <h6 class="text-primary fw-bold text-uppercase ls-2 mb-2">Fresh From Oven</h6>
                <h2 class="fw-bold display-6">New Arrivals</h2>
            </div>
            <div class="d-none d-md-flex gap-2">
                <button class="btn btn-outline-dark rounded-circle bg-white shadow-sm"
                    style="width: 45px; height: 45px;" onclick="scrollProduk('left')"><i
                        class="fas fa-arrow-left"></i></button>
                <button class="btn btn-outline-dark rounded-circle bg-white shadow-sm"
                    style="width: 45px; height: 45px;" onclick="scrollProduk('right')"><i
                        class="fas fa-arrow-right"></i></button>
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

<div class="container section-gap" id="kategori">
    <div class="d-flex justify-content-between align-items-center mb-5 animate-up">
        <h3 class="fw-bold display-6">Browse by Category</h3>
        <a href="<?= base_url('kategori') ?>" class="btn btn-outline-dark rounded-pill px-4">View All</a>
    </div>
    <div class="row g-4">
        <?php foreach($kategoris as $k): ?>
        <div class="col-md-3 col-6">
            <div
                class="card-custom p-4 text-center animate-up h-100 d-flex flex-column justify-content-center align-items-center border">
                <div class="bg-light rounded-circle d-flex align-items-center justify-content-center mb-4"
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

<div class="exclusive-section">
    <div class="container">
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

<script>
setInterval(function() {
    const d = new Date();
    const seconds = 60 - d.getSeconds();
    const displaySec = seconds < 10 ? '0' + seconds : seconds;
    document.getElementById('seconds').innerText = displaySec;
}, 1000);
</script>

<?= $this->endSection(); ?>