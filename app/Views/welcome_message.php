<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php
// DATA DUMMY LENGKAP
$kategoris = [['nama'=>'Outerwear','icon'=>'fa-user-astronaut','count'=>'12 Items'],['nama'=>'Pants','icon'=>'fa-socks','count'=>'8 Items'],['nama'=>'Footwear','icon'=>'fa-shoe-prints','count'=>'15 Items'],['nama'=>'Accessories','icon'=>'fa-hat-cowboy','count'=>'20 Items']];
$produks_terbaru = [['nama'=>'Cargo Pants Tactical','cat'=>'Pants','harga'=>185000,'img'=>'https://images.unsplash.com/photo-1517487881594-2787fef5ebf7?w=500'],['nama'=>'Converse 70s High','cat'=>'Shoes','harga'=>699000,'img'=>'https://images.unsplash.com/photo-1607522370275-f14206abe5d3?w=500'],['nama'=>'Oversize Hoodie Lilac','cat'=>'Jacket','harga'=>245000,'img'=>'https://images.unsplash.com/photo-1556905055-8f358a7a47b2?w=500'],['nama'=>'Flannel Shirt Grunge','cat'=>'Shirt','harga'=>145000,'img'=>'https://images.unsplash.com/photo-1596755094514-f87e34085b2c?w=500'],['nama'=>'Bomber Jacket Army','cat'=>'Jacket','harga'=>320000,'img'=>'https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=500'],['nama'=>'Denim Ripped Jeans','cat'=>'Pants','harga'=>210000,'img'=>'https://images.unsplash.com/photo-1541099649105-f69ad21f3246?w=500']];
$best_sellers = [['nama'=>'Varsity Jacket Univ','cat'=>'Jacket','harga'=>350000,'img'=>'https://images.unsplash.com/photo-1551028919-ac66e6a39d44?w=500'],['nama'=>'Chino Pants Slim','cat'=>'Pants','harga'=>175000,'img'=>'https://images.unsplash.com/photo-1473966968600-fa801b869a1a?w=500'],['nama'=>'Basic Tee White','cat'=>'T-Shirt','harga'=>85000,'img'=>'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=500'],['nama'=>'Wristwatch Classic','cat'=>'Acc','harga'=>175000,'img'=>'https://images.unsplash.com/photo-1524592094714-0f0654e20314?w=500']];
$flash_sale = [['nama'=>'Air Jordan 1 Low','harga'=>1250000,'old'=>2500000,'img'=>'https://images.unsplash.com/photo-1552346154-21d32810aba3?w=500','stock'=>15],['nama'=>'Urban Bomber Jacket','harga'=>350000,'old'=>799000,'img'=>'https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=500','stock'=>85],['nama'=>'G-Shock Casio Black','harga'=>999000,'old'=>1800000,'img'=>'https://images.unsplash.com/photo-1524592094714-0f0654e20314?w=500','stock'=>5],['nama'=>'Rayban Wayfarer','harga'=>1500000,'old'=>2200000,'img'=>'https://images.unsplash.com/photo-1572635196237-14b3f281503f?w=500','stock'=>40]];
$lookbook = ['https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?w=500&q=80','https://images.unsplash.com/photo-1529139574466-a303027c1d8b?w=500&q=80','https://images.unsplash.com/photo-1503342394128-c104d54dba01?w=500&q=80','https://images.unsplash.com/photo-1539109136881-3be0616acf4b?w=500&q=80'];
?>

<section class="hero-section">
    <div class="hero-video-wrapper animate-up">
        <video class="hero-bg-video" autoplay muted loop playsinline
            poster="https://images.unsplash.com/photo-1552374196-1ab2a1c593e8?q=80&w=1470">
            <source
                src="https://player.vimeo.com/external/494239988.sd.mp4?s=2a50533203850312703730407766510208757105&profile_id=165&oauth2_token_id=57447761"
                type="video/mp4">
        </video>
    </div>
    <div class="container text-center animate-up delay-1 position-relative z-2">
        <span class="badge bg-white text-dark py-2 px-4 rounded-pill mb-4 fw-bold shadow-sm ls-2">New Season '25</span>
        <h1 class="hero-title mb-4 fw-900">OWN THE STREETS.</h1>
        <p class="lead mb-5 w-75 mx-auto text-white-50 fw-light">Koleksi streetwear premium yang mendefinisikan ulang
            percaya dirimu.</p>
        <div class="d-flex justify-content-center gap-3"><a href="#new-arrival"
                class="btn btn-light btn-lg rounded-pill px-5 py-3 fw-bold shadow hover-scale">Shop Now</a></div>
    </div>
</section>

<div class="brand-marquee">
    <div class="marquee-content"><span class="brand-logo">STUSSY</span><span class="brand-logo">SUPREME</span><span
            class="brand-logo">OFF-WHITE</span><span class="brand-logo">FEAR OF GOD</span><span
            class="brand-logo">PALACE</span><span class="brand-logo">KITH</span><span class="brand-logo">A BATHING
            APE</span><span class="brand-logo">STUSSY</span><span class="brand-logo">SUPREME</span><span
            class="brand-logo">OFF-WHITE</span></div>
</div>

<div class="flash-section">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3 animate-up">
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
            <div class="col-6 col-md-3 animate-up">
                <div class="flash-card h-100">
                    <div class="flash-badge">HEMAT <?= round((($fs['old'] - $fs['harga'])/$fs['old'])*100) ?>%</div>
                    <img src="<?= $fs['img'] ?>" class="w-100" style="height: 250px; object-fit: cover;">
                    <div class="p-3">
                        <h6 class="fw-bold text-truncate mb-1"><?= $fs['nama'] ?></h6>
                        <div class="d-flex justify-content-between small mb-1"><span
                                class="text-muted">Stok:</span><span
                                class="text-danger fw-bold"><?= $fs['stock'] < 20 ? 'Segera Habis!' : 'Tersedia' ?></span>
                        </div>
                        <div class="stock-bar-wrapper">
                            <div class="stock-bar-fill" style="width: <?= $fs['stock'] ?>%"></div>
                        </div>
                        <div class="text-danger fw-bold fs-5 mt-2">Rp <?= number_format($fs['harga'],0,',','.') ?></div>
                        <div class="text-muted text-decoration-line-through small">Rp
                            <?= number_format($fs['old'],0,',','.') ?></div>
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
                <h5 class="fw-bold mb-2">Fast Delivery</h5>
                <p class="text-muted small mb-0">Pengiriman kilat ke seluruh Indonesia</p>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="service-box animate-up delay-2"><i class="fas fa-shield-alt service-icon text-success"></i>
                <h5 class="fw-bold mb-2">Secure Payment</h5>
                <p class="text-muted small mb-0">Transaksi aman dan terpercaya</p>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="service-box animate-up delay-3"><i class="fas fa-undo service-icon text-warning"></i>
                <h5 class="fw-bold mb-2">Easy Return</h5>
                <p class="text-muted small mb-0">Garansi penukaran 7 hari</p>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="service-box animate-up delay-4"><i class="fas fa-headset service-icon text-danger"></i>
                <h5 class="fw-bold mb-2">24/7 Support</h5>
                <p class="text-muted small mb-0">Layanan pelanggan setiap saat</p>
            </div>
        </div>
    </div>
</div>

<div class="section-gap bg-light" id="new-arrival">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-5 animate-up">
            <div>
                <h6 class="text-primary fw-bold text-uppercase ls-2 mb-2">Fresh Drop</h6>
                <h2 class="fw-bold display-6">New Arrivals</h2>
            </div>
            <div class="d-none d-md-flex gap-2"><button class="btn btn-outline-dark rounded-circle bg-white shadow-sm"
                    style="width: 45px; height: 45px;" onclick="scrollProduk('left')"><i
                        class="fas fa-arrow-left"></i></button><button
                    class="btn btn-outline-dark rounded-circle bg-white shadow-sm" style="width: 45px; height: 45px;"
                    onclick="scrollProduk('right')"><i class="fas fa-arrow-right"></i></button></div>
        </div>
        <div class="scroll-container-wrapper animate-up">
            <button class="scroll-btn left d-none d-lg-flex" onclick="scrollProduk('left')"><i
                    class="fas fa-chevron-left"></i></button><button class="scroll-btn right d-none d-lg-flex"
                onclick="scrollProduk('right')"><i class="fas fa-chevron-right"></i></button>
            <div class="horizontal-scroll" id="produkScroll">
                <?php foreach($produks_terbaru as $p): ?>
                <div class="product-card-item">
                    <div class="card-custom h-100">
                        <div class="position-relative"><span
                                class="position-absolute top-0 start-0 bg-dark text-white px-3 py-1 m-3 rounded-pill small fw-bold"
                                style="font-size: 12px;">New</span><img src="<?= $p['img'] ?>" class="product-img"
                                alt="Produk"></div>
                        <div class="card-body-custom"><small class="text-muted text-uppercase fw-bold"
                                style="font-size: 11px;"><?= $p['cat'] ?></small>
                            <h5 class="card-title fw-bold text-truncate mt-2 mb-3"><?= $p['nama'] ?></h5>
                            <div class="d-flex justify-content-between align-items-center"><span
                                    class="fw-bold text-primary fs-5">Rp
                                    <?= number_format($p['harga'],0,',','.') ?></span><button
                                    class="btn btn-outline-dark rounded-circle btn-sm p-2 hover-scale"><i
                                        class="fas fa-plus"></i></button></div>
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
        <h3 class="fw-bold display-6">Browse by Category</h3><a href="<?= base_url('kategori') ?>"
            class="btn btn-outline-dark rounded-pill px-4 fw-bold">View All</a>
    </div>
    <div class="row g-4"><?php foreach($kategoris as $k): ?><div class="col-md-3 col-6">
            <div
                class="card-custom p-4 text-center animate-up h-100 d-flex flex-column justify-content-center align-items-center border hover-scale">
                <div class="bg-light rounded-circle d-flex align-items-center justify-content-center mb-4"
                    style="width: 90px; height: 90px;"><i class="fas <?= $k['icon'] ?> fa-2x text-dark"></i></div>
                <h5 class="fw-bold mb-2"><?= $k['nama'] ?></h5><small class="text-muted"><?= $k['count'] ?></small>
            </div>
        </div><?php endforeach; ?></div>
</div>

<div class="exclusive-section animate-up">
    <div class="container">
        <div class="row g-0 align-items-center">
            <div class="col-lg-6 order-lg-2"><img
                    src="https://images.unsplash.com/photo-1523398002811-999ca8dec234?q=80&w=1470"
                    class="w-100 exclusive-img" alt="Promo"></div>
            <div class="col-lg-6 exclusive-content order-lg-1"><span
                    class="text-warning fw-bold text-uppercase ls-2">Limited Time Offer</span>
                <h2 style="color: white;" class="display-4 fw-bold mt-3 mb-4">Monochrome <br>Collection Drops</h2>
                <p class="text-white-50 mb-5 fs-5">Tampil beda dengan koleksi monokrom terbaru. Diskon 30% untuk 100
                    pembeli pertama hari ini.</p><a href="#"
                    class="btn btn-warning btn-lg rounded-pill px-5 py-3 fw-bold text-dark hover-scale">Shop The
                    Look</a>
            </div>
        </div>
    </div>
</div>

<div class="section-gap">
    <div class="container">
        <div class="text-center mb-5 animate-up">
            <h6 class="text-primary fw-bold text-uppercase ls-1 mb-2">#HLOutfitStyle</h6>
            <h3 class="fw-bold display-6">Styled by The Fam</h3>
            <p class="text-muted w-75 mx-auto">Tag kami di Instagram untuk kesempatan fitur di sini.</p>
        </div>
        <div class="lookbook-grid animate-up"><?php foreach($lookbook as $lb_img): ?><div class="lookbook-item"><img
                    src="<?= $lb_img ?>" class="lookbook-img" alt="Street Style">
                <div class="lookbook-overlay"><i class="fab fa-instagram"></i></div>
            </div><?php endforeach; ?></div>
    </div>
</div>

<div class="section-gap bg-light" id="produk">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-5 animate-up">
            <h3 class="fw-bold display-6">All-Time Favorites 🔥</h3><a href="#"
                class="text-decoration-none text-dark fw-bold">Lihat Semua <i class="fas fa-arrow-right ms-2"></i></a>
        </div>
        <div class="row g-4"><?php foreach($best_sellers as $b): ?><div class="col-md-3 col-6 animate-up">
                <div class="card-custom h-100">
                    <div class="position-relative"><span
                            class="position-absolute top-0 start-0 bg-dark text-white px-3 py-1 m-3 rounded-pill small fw-bold"
                            style="font-size: 12px;">Best</span><img src="<?= $b['img'] ?>" class="product-img"
                            alt="Produk"></div>
                    <div class="card-body-custom"><small
                            class="text-muted text-uppercase fw-bold"><?= $b['cat'] ?></small>
                        <h5 class="card-title fw-bold text-truncate mt-2 mb-3"><?= $b['nama'] ?></h5>
                        <div class="d-flex justify-content-between align-items-center"><span
                                class="fw-bold text-dark fs-5">Rp <?= number_format($b['harga'],0,',','.') ?></span>
                            <div class="text-warning small"><i class="fas fa-star"></i> 4.9</div>
                        </div>
                    </div>
                </div>
            </div><?php endforeach; ?></div>
    </div>
</div>

<div class="newsletter-section animate-up">
    <div class="container">
        <h2 class="fw-bold display-5 mb-3">JOIN THE CLUB</h2>
        <p class="lead text-white-50 mb-0 w-75 mx-auto">Dapatkan info rilis eksklusif, diskon member, dan konten
            terbaru.</p>
        <div class="newsletter-input-group"><input type="email" class="newsletter-input"
                placeholder="Masukkan alamat email..."><button class="newsletter-btn">SUBSCRIBE</button></div>
    </div>
</div>

<script>
setInterval(function() {
    const d = new Date();
    const s = 60 - d.getSeconds();
    document.getElementById('seconds').innerText = s < 10 ? '0' + s : s;
}, 1000);

function scrollProduk(d) {
    const c = document.getElementById('produkScroll');
    c.scrollBy({
        left: d === 'left' ? -320 : 320,
        behavior: 'smooth'
    });
}
</script>
<?= $this->endSection(); ?>