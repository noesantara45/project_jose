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
?>

<style>
/* Style tambahan agar scroll mulus */
.horizontal-scroll {
    display: flex;
    overflow-x: auto;
    scroll-behavior: smooth;
    gap: 1rem;
    padding-bottom: 1rem;
    -ms-overflow-style: none;
    /* IE and Edge */
    scrollbar-width: none;
    /* Firefox */
}

.horizontal-scroll::-webkit-scrollbar {
    display: none;
    /* Chrome, Safari and Opera */
}

.product-card-item {
    flex: 0 0 auto;
    width: 260px;
    /* Lebar tetap agar tidak penyok */
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

<div class="section-gap" id="produk">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-5 animate-up">
            <h3 class="fw-bold display-6">Best Sellers 🔥</h3>
            <a href="<?= base_url('kategori') ?>" class="text-decoration-none text-dark fw-bold">Lihat Semua <i
                    class="fas fa-arrow-right ms-2"></i></a>
        </div>
        <div class="row g-4">
            <?php if (empty($best_sellers)): ?>
            <div class="col-12 text-center text-muted">Belum ada data Best Sellers.</div>
            <?php else: ?>
            <?php foreach ($best_sellers as $b): ?>
            <div class="col-md-3 col-6 animate-up">
                <div class="card-custom h-100">
                    <div class="position-relative">
                        <span
                            class="position-absolute top-0 start-0 bg-danger text-white px-3 py-1 m-3 rounded-pill small fw-bold"
                            style="font-size: 12px;">Hot</span>

                        <a href="<?= base_url('detail/' . $b['slug']) ?>">
                            <img src="<?= base_url('uploads/products/' . ($b['image'] ?? 'default.jpg')) ?>"
                                class="product-img" alt="<?= esc($b['name']) ?>"
                                onerror="this.src='https://via.placeholder.com/500x500?text=No+Image'">
                        </a>
                    </div>
                    <div class="card-body-custom">
                        <small class="text-muted text-uppercase fw-bold">Premium</small>
                        <h5 class="card-title fw-bold text-truncate mt-2 mb-3">
                            <a href="<?= base_url('detail/' . $b['slug']) ?>" class="text-dark text-decoration-none">
                                <?= esc($b['name']) ?>
                            </a>
                        </h5>
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
                <?php if (empty($produks_terbaru)): ?>
                <div class="p-4 text-muted">Belum ada produk terbaru.</div>
                <?php else: ?>
                <?php foreach ($produks_terbaru as $p): ?>
                <div class="product-card-item">
                    <div class="card-custom h-100">
                        <div class="position-relative">
                            <span
                                class="position-absolute top-0 start-0 bg-dark text-white px-3 py-1 m-3 rounded-pill small fw-bold"
                                style="font-size: 12px;">New</span>

                            <a href="<?= base_url('detail/' . $p['slug']) ?>">
                                <img src="<?= base_url('uploads/products/' . ($p['image'] ?? 'default.jpg')) ?>"
                                    class="product-img" alt="<?= esc($p['name']) ?>"
                                    onerror="this.src='https://via.placeholder.com/500x500?text=No+Image'">
                            </a>
                        </div>
                        <div class="card-body-custom">
                            <small class="text-muted text-uppercase fw-bold" style="font-size: 11px;">Latest
                                Drop</small>

                            <h5 class="card-title fw-bold text-truncate mt-2 mb-3">
                                <a href="<?= base_url('detail/' . $p['slug']) ?>"
                                    class="text-dark text-decoration-none">
                                    <?= esc($p['name']) ?>
                                </a>
                            </h5>

                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-primary fs-5">Rp
                                    <?= number_format($p['price'], 0, ',', '.') ?></span>

                                <a href="<?= base_url('detail/' . $p['slug']) ?>"
                                    class="btn btn-outline-dark rounded-circle btn-sm p-2">
                                    <i class="fas fa-arrow-right"></i>
                                </a>
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
                <img src="images/photo-1542272454315-4c01d7abdf4a.jpeg" class="w-100 exclusive-img" alt="Promo">
            </div>
            <div class="col-lg-6 exclusive-content order-lg-1">
                <span class="text-warning fw-bold text-uppercase ls-2">Limited Time Offer</span>
                <h2 style="color: white;" class="display-4 fw-bold mt-3 mb-4">Couple Edition <br>Street Style</h2>
                <p class="text-white-50 mb-5 fs-5">Dapatkan diskon spesial 30% untuk pembelian paket couple edisi
                    Valentine. Stok terbatas!</p>
                <a href="#" class="btn btn-warning btn-lg rounded-pill px-5 py-3 fw-bold text-dark">Beli Sekarang</a>
            </div>
        </div>
    </div>
</div>

<div class="flash-section pb-5">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
            <div class="d-flex align-items-center gap-3">
                <h2 class="fw-bold mb-0 text-danger"><i class="fas fa-fire"></i> KATALOG HOT</h2>
            </div>

            <div class="d-flex align-items-center gap-3">
                <div class="d-none d-md-flex gap-2">
                    <button class="btn btn-sm btn-outline-danger rounded-circle" onclick="scrollKatalog('left')">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="btn btn-sm btn-outline-danger rounded-circle" onclick="scrollKatalog('right')">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
                <a href="<?= base_url('kategori') ?>" class="text-danger fw-bold text-decoration-none">Lihat Semua <i
                        class="fas fa-arrow-right"></i></a>
            </div>
        </div>

        <div class="scroll-container-wrapper">
            <div class="horizontal-scroll" id="katalogScroll">

                <?php if (empty($katalog_random)): ?>
                <div class="p-4 text-muted text-center w-100">Belum ada data promo aktif.</div>
                <?php else: ?>
                <?php foreach ($katalog_random as $fs): ?>

                <div class="product-card-item">
                    <div class="flash-card h-100 border shadow-sm">

                        <div class="flash-badge bg-warning text-dark fw-bold">POPULER</div>

                        <a href="<?= base_url('detail/' . $fs['slug']) ?>">
                            <img src="<?= base_url('uploads/products/' . ($fs['image'] ?? 'default.jpg')) ?>"
                                class="w-100" style="height: 250px; object-fit: cover;" alt="<?= esc($fs['name']) ?>"
                                onerror="this.src='https://via.placeholder.com/250x250?text=No+Image'">
                        </a>

                        <div class="p-3">
                            <h6 class="fw-bold text-truncate mb-1">
                                <a href="<?= base_url('detail/' . $fs['slug']) ?>"
                                    class="text-dark text-decoration-none">
                                    <?= esc($fs['name']) ?>
                                </a>
                            </h6>

                            <div class="text-danger fw-bold fs-5">
                                Rp <?= number_format($fs['price'], 0, ',', '.') ?>
                            </div>

                            <small class="text-muted text-decoration-line-through">
                                Rp <?= number_format($fs['price'] * 1.2, 0, ',', '.') ?>
                            </small>

                            <div class="progress mt-2" style="height: 6px;">
                                <div class="progress-bar bg-danger" style="width: <?= rand(50, 95) ?>%"></div>
                            </div>
                            <small class="text-danger fw-bold" style="font-size: 10px;">Segera Habis!</small>

                            <a href="<?= base_url('detail/' . $fs['slug']) ?>" class="stretched-link"></a>
                        </div>
                    </div>
                </div>

                <?php endforeach; ?>
                <?php endif; ?>

            </div>
        </div>

    </div>
</div>

<script>
// --- 1. SCRIPT UNTUK NEW ARRIVAL (Produk Terbaru) ---
const container = document.getElementById('produkScroll');
const speed = 1;

function autoScroll() {
    if (container && !container.matches(':hover')) {
        container.scrollLeft += speed;
        if (container.scrollLeft + container.clientWidth >= container.scrollWidth - 1) {
            container.scrollLeft = 0;
        }
    }
}
if (container) setInterval(autoScroll, 20);

function scrollProduk(direction) {
    if (container) {
        container.scrollLeft += (direction === 'left' ? -300 : 300);
    }
}

// --- 2. SCRIPT UNTUK KATALOG / FLASH SALE (Yang Baru) ---
const katalogContainer = document.getElementById('katalogScroll');

function autoScrollKatalog() {
    if (katalogContainer && !katalogContainer.matches(':hover')) {
        katalogContainer.scrollLeft += speed;
        if (katalogContainer.scrollLeft + katalogContainer.clientWidth >= katalogContainer.scrollWidth - 1) {
            katalogContainer.scrollLeft = 0;
        }
    }
}
// Jalankan interval terpisah
if (katalogContainer) setInterval(autoScrollKatalog, 25);

function scrollKatalog(direction) {
    if (katalogContainer) {
        katalogContainer.scrollLeft += (direction === 'left' ? -300 : 300);
    }
}
</script>

<?= $this->endSection(); ?>