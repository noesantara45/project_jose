<?= $this->extend('landing/layout/template'); ?>

<?= $this->section('content'); ?>

<?php
// [JONO NOTE]: Data Kategori tetap Hardcoded dulu karena database belum punya kolom 'icon'
$kategoris = [
    ['nama' => 'Outerwear', 'icon' => 'fa-user-astronaut', 'count' => '12 Items'],
    ['nama' => 'Pants', 'icon' => 'fa-socks', 'count' => '8 Items'],
    ['nama' => 'Footwear', 'icon' => 'fa-shoe-prints', 'count' => '15 Items'],
    ['nama' => 'Accessories', 'icon' => 'fa-hat-cowboy', 'count' => '20 Items']
];

// [JONO NOTE]: Data $produks_terbaru dan $best_sellers SUDAH DIHAPUS dari sini.
// Sekarang view akan otomatis menggunakan data asli dari Database yang dikirim Controller.

// [JONO NOTE]: Data Flash Sale kita biarkan manual dulu (karena Controller belum kirim data ini)
// Saya ubah nama variabelnya jadi $flash_sale_data agar loop di bawah tidak error
$flash_sale_data = [
    ['name' => 'Air Jordan 1 Low', 'price' => 1250000, 'old' => 2500000, 'image' => 'https://images.unsplash.com/photo-1552346154-21d32810aba3?w=500', 'slug' => '#'],
    ['name' => 'Urban Bomber Jacket', 'price' => 350000, 'old' => 799000, 'image' => 'https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=500', 'slug' => '#'],
    ['name' => 'G-Shock Casio Black', 'price' => 999000, 'old' => 1800000, 'image' => 'https://images.unsplash.com/photo-1524592094714-0f0654e20314?w=500', 'slug' => '#'],
    ['name' => 'Rayban Wayfarer', 'price' => 1500000, 'old' => 2200000, 'image' => 'https://images.unsplash.com/photo-1572635196237-14b3f281503f?w=500', 'slug' => '#'],
];
?>

<style>
/* Style tambahan jika diperlukan */
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
            <a href="<?= base_url('kategori') ?>"
                class="btn btn-light btn-lg rounded-pill px-5 py-3 fw-bold shadow">Shop Now</a>
            <a href="<?= base_url('about') ?>" class="btn btn-outline-light btn-lg rounded-pill px-5 py-3 fw-bold">Learn
                More</a>
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
                <h2 class="fw-bold mb-0 text-danger"><i class="fas fa-fire"></i> FLASH SALE</h2>
                <div class="countdown-box bg-danger text-white px-3 py-1 rounded fw-bold" id="countdown">
                    00 : 15 : <span id="seconds">00</span>
                </div>
            </div>
            <a href="<?= base_url('kategori') ?>" class="text-danger fw-bold text-decoration-none">Lihat Semua <i
                    class="fas fa-arrow-right"></i></a>
        </div>

        <div class="row g-3">
            <?php if(empty($flash_sale_data)): ?>
            <div class="col-12 text-center text-muted py-5">Belum ada promo aktif.</div>
            <?php else: ?>
            <?php foreach ($flash_sale_data as $fs): ?>
            <div class="col-6 col-md-3">
                <div class="flash-card h-100">
                    <div class="flash-badge bg-warning text-dark">HOT</div>

                    <img src="<?= $fs['image'] ?>" class="w-100" style="height: 250px; object-fit: cover;"
                        alt="<?= esc($fs['name']) ?>"
                        onerror="this.src='https://via.placeholder.com/250x250?text=No+Image'">

                    <div class="p-3">
                        <h6 class="fw-bold text-truncate"><?= esc($fs['name']) ?></h6>
                        <div class="text-danger fw-bold fs-5">Rp <?= number_format($fs['price'], 0, ',', '.') ?></div>
                        <small class="text-muted text-decoration-line-through">Rp
                            <?= number_format($fs['old'], 0, ',', '.') ?></small>

                        <div class="progress mt-2" style="height: 6px;">
                            <div class="progress-bar bg-danger" style="width: 85%"></div>
                        </div>
                        <small class="text-danger" style="font-size: 10px;">Terjual Cepat!</small>

                        <a href="<?= base_url('detail/' . $fs['slug']) ?>" class="stretched-link"></a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
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
                <?php if(empty($produks_terbaru)): ?>
                <div class="p-4 text-muted">Belum ada produk terbaru.</div>
                <?php else: ?>
                <?php foreach ($produks_terbaru as $p): ?>
                <div class="product-card-item">
                    <div class="card-custom h-100">
                        <div class="position-relative">
                            <span
                                class="position-absolute top-0 start-0 bg-dark text-white px-3 py-1 m-3 rounded-pill small fw-bold"
                                style="font-size: 12px;">New</span>

                            <img src="<?= base_url('uploads/products/' . ($p['image'] ?? 'default.jpg')) ?>"
                                class="product-img" alt="<?= esc($p['name']) ?>"
                                onerror="this.src='https://via.placeholder.com/500x500?text=No+Image'">
                        </div>
                        <div class="card-body-custom">
                            <small class="text-muted text-uppercase fw-bold" style="font-size: 11px;">Latest
                                Drop</small>

                            <h5 class="card-title fw-bold text-truncate mt-2 mb-3"><?= esc($p['name']) ?></h5>

                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-primary fs-5">Rp
                                    <?= number_format($p['price'], 0, ',', '.') ?></span>

                                <button class="btn btn-outline-dark rounded-circle btn-sm p-2"><i
                                        class="fas fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
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
        <?php foreach ($kategoris as $k): ?>
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
                <h2 style="color: white;" class="display-4 fw-bold mt-3 mb-4">Couple Edition <br>Street Style</h2>
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
            <?php if(empty($best_sellers)): ?>
            <div class="col-12 text-center text-muted">Belum ada data Best Sellers.</div>
            <?php else: ?>
            <?php foreach ($best_sellers as $b): ?>
            <div class="col-md-3 col-6 animate-up">
                <div class="card-custom h-100">
                    <div class="position-relative">
                        <span
                            class="position-absolute top-0 start-0 bg-danger text-white px-3 py-1 m-3 rounded-pill small fw-bold"
                            style="font-size: 12px;">Hot</span>

                        <img src="<?= base_url('uploads/products/' . ($b['image'] ?? 'default.jpg')) ?>"
                            class="product-img" alt="<?= esc($b['name']) ?>"
                            onerror="this.src='https://via.placeholder.com/500x500?text=No+Image'">
                    </div>
                    <div class="card-body-custom">
                        <small class="text-muted text-uppercase fw-bold">Premium</small>
                        <h5 class="card-title fw-bold text-truncate mt-2 mb-3"><?= esc($b['name']) ?></h5>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-bold text-dark fs-5">Rp
                                <?= number_format($b['price'], 0, ',', '.') ?></span>
                            <div class="text-warning small">
                                <i class="fas fa-star"></i> 5.0
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
// 1. LOGIKA COUNTDOWN FLASH SALE
setInterval(function() {
    const d = new Date();
    const seconds = 60 - d.getSeconds();
    const displaySec = seconds < 10 ? '0' + seconds : seconds;
    const secElement = document.getElementById('seconds');
    if (secElement) secElement.innerText = displaySec;
}, 1000);

// 2. LOGIKA AUTO SCROLL NEW ARRIVALS
const container = document.getElementById('produkScroll');
let scrollAmount = 0;
const speed = 1;

function autoScroll() {
    if (container && !container.matches(':hover')) {
        container.scrollLeft += speed;
        if (container.scrollLeft + container.clientWidth >= container.scrollWidth - 1) {
            container.scrollLeft = 0;
        }
    }
}

if (container) {
    setInterval(autoScroll, 20);
}

// 3. FUNGSI TOMBOL MANUAL
function scrollProduk(direction) {
    if (container) {
        const scrollValue = 300;
        if (direction === 'left') {
            container.scrollLeft -= scrollValue;
        } else {
            container.scrollLeft += scrollValue;
        }
    }
}
</script>

<?= $this->endSection(); ?>