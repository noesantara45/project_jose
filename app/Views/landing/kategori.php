<?= $this->extend('landing/layout/template'); ?>

<?= $this->section('content'); ?>

<?php
// 1. LOGIKA FILTER PHP (Sederhana)
$request = \Config\Services::request();
$filter = $request->getGet('filter') ?? 'pria'; // Default ke 'pria' biar langsung tampil banyak

// 2. DATA PRODUK (DIPERBANYAK JADI 12 ITEM)
$products = [
    // --- PRIA ---
    ['nama' => 'Relaxed Fit Cargo Pants', 'cat' => 'Pants', 'harga' => 299000, 'old' => 0, 'img' => 'https://images.unsplash.com/photo-1517487881594-2787fef5ebf7?w=500', 'tag' => 'best', 'colors' => ['#000', '#556b2f'], 'gender' => 'pria'],
    ['nama' => 'Oversized Cotton T-Shirt', 'cat' => 'Tops', 'harga' => 129000, 'old' => 199000, 'img' => 'https://images.unsplash.com/photo-1583743814966-8936f5b7be1a?w=500', 'tag' => 'sale', 'colors' => ['#000', '#fff', '#800020'], 'gender' => 'pria'],
    ['nama' => 'Denim Trucker Jacket', 'cat' => 'Outerwear', 'harga' => 499000, 'old' => 0, 'img' => 'https://images.unsplash.com/photo-1576871337622-98d48d1cf531?w=500', 'tag' => 'new', 'colors' => ['#1e3799'], 'gender' => 'pria'],
    ['nama' => 'Slim Fit Chino', 'cat' => 'Pants', 'harga' => 199000, 'old' => 250000, 'img' => 'https://images.unsplash.com/photo-1473966968600-fa801b869a1a?w=500', 'tag' => 'sale', 'colors' => ['#000080', '#8b4513'], 'gender' => 'pria'],
    ['nama' => 'Chuck 70 High Top', 'cat' => 'Shoes', 'harga' => 999000, 'old' => 0, 'img' => 'https://images.unsplash.com/photo-1607522370275-f14206abe5d3?w=500', 'tag' => '', 'colors' => ['#000', '#fff'], 'gender' => 'pria'],
    ['nama' => 'Flannel Shirt Grunge', 'cat' => 'Tops', 'harga' => 249000, 'old' => 0, 'img' => 'https://images.unsplash.com/photo-1596755094514-f87e34085b2c?w=500', 'tag' => 'best', 'colors' => ['#a52a2a'], 'gender' => 'pria'],

    // --- WANITA ---
    ['nama' => 'Floral Summer Dress', 'cat' => 'Dress', 'harga' => 350000, 'old' => 0, 'img' => 'https://images.unsplash.com/photo-1572804013309-59a88b7e92f1?w=500', 'tag' => 'new', 'colors' => ['#ffb7b2'], 'gender' => 'wanita'],
    ['nama' => 'Women Blouse Elegant', 'cat' => 'Tops', 'harga' => 150000, 'old' => 200000, 'img' => 'https://images.unsplash.com/photo-1564257631407-4deb1f99d992?w=500', 'tag' => 'sale', 'colors' => ['#fff'], 'gender' => 'wanita'],
    ['nama' => 'High Waist Jeans', 'cat' => 'Pants', 'harga' => 299000, 'old' => 0, 'img' => 'https://images.unsplash.com/photo-1541099649105-f69ad21f3246?w=500', 'tag' => 'best', 'colors' => ['#87ceeb'], 'gender' => 'wanita'],
    ['nama' => 'Knitted Cardigan', 'cat' => 'Outerwear', 'harga' => 199000, 'old' => 0, 'img' => 'https://images.unsplash.com/photo-1434389677669-e08b4cac3105?w=500', 'tag' => '', 'colors' => ['#f5f5dc'], 'gender' => 'wanita'],

    // --- ANAK ---
    ['nama' => 'Kids Dinosaur Tee', 'cat' => 'Tops', 'harga' => 85000, 'old' => 0, 'img' => 'https://images.unsplash.com/photo-1519238263496-6361937a27a7?w=500', 'tag' => '', 'colors' => ['#a8e6cf'], 'gender' => 'anak'],
    ['nama' => 'Junior Denim Overall', 'cat' => 'Pants', 'harga' => 175000, 'old' => 250000, 'img' => 'https://images.unsplash.com/photo-1519457431-44ccd64a579b?w=500', 'tag' => 'sale', 'colors' => ['#000080'], 'gender' => 'anak'],
];
?>


<div class="container pb-5">

    <div class="gender-tabs">
        <a href="<?= base_url('kategori') ?>"
            class="gender-link <?= ($filter == 'all' || $filter == 'pria') ? 'active' : '' ?>">Pria</a>
        <a href="<?= base_url('kategori?filter=wanita') ?>"
            class="gender-link <?= ($filter == 'wanita') ? 'active' : '' ?>">Wanita</a>
        <a href="<?= base_url('kategori?filter=anak') ?>"
            class="gender-link <?= ($filter == 'anak') ? 'active' : '' ?>">Anak-anak</a>
        <a href="<?= base_url('kategori?filter=sale') ?>"
            class="gender-link text-danger <?= ($filter == 'sale') ? 'active' : '' ?>">Sale</a>
    </div>

    <nav aria-label="breadcrumb" class="mb-4 mt-3">
        <ol class="breadcrumb small text-uppercase">
            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>" class="text-decoration-none text-muted">Home</a>
            </li>
            <li class="breadcrumb-item active text-dark" aria-current="page">
                Katalog <?= ucfirst($filter == 'all' ? 'Pria' : $filter) ?>
            </li>
        </ol>
    </nav>

    <div class="row">

        <div class="col-lg-3 d-none d-lg-block filter-sidebar border-end">

            <div class="filter-section">
                <div class="filter-head">Kategori <i class="fas fa-minus small text-muted"></i></div>
                <label class="custom-check"><span><input type="checkbox" checked> Atasan</span> <span
                        class="count-badge">120</span></label>
                <label class="custom-check"><span><input type="checkbox"> Bawahan</span> <span
                        class="count-badge">85</span></label>
                <label class="custom-check"><span><input type="checkbox"> Outerwear</span> <span
                        class="count-badge">42</span></label>
                <label class="custom-check"><span><input type="checkbox"> Sepatu</span> <span
                        class="count-badge">30</span></label>
                <label class="custom-check"><span><input type="checkbox"> Aksesoris</span> <span
                        class="count-badge">55</span></label>
            </div>

            <div class="filter-section">
                <div class="filter-head">Harga <i class="fas fa-minus small text-muted"></i></div>
                <div class="d-flex align-items-center gap-2 mb-2">
                    <input type="text" class="form-control form-control-sm" placeholder="Min">
                    <span>-</span>
                    <input type="text" class="form-control form-control-sm" placeholder="Max">
                </div>
            </div>

            <div class="filter-section">
                <div class="filter-head">Layanan & Promo <i class="fas fa-minus small text-muted"></i></div>
                <label class="custom-check"><span><input type="checkbox"> <i class="fas fa-truck text-primary"></i>
                        Gratis Ongkir</span></label>
                <label class="custom-check"><span><input type="checkbox"> <i
                            class="fas fa-hand-holding-usd text-success"></i> COD</span></label>
                <label class="custom-check"><span><input type="checkbox"> <i class="fas fa-tags text-danger"></i> Diskon
                        > 50%</span></label>
            </div>

            <div class="filter-section">
                <div class="filter-head">Rating <i class="fas fa-minus small text-muted"></i></div>
                <label class="custom-check"><span><input type="checkbox"> <i class="fas fa-star star-active"></i> 4
                        Keatas</span></label>
                <label class="custom-check"><span><input type="checkbox"> <i class="fas fa-star star-active"></i>
                        Semua</span></label>
            </div>

            <div class="filter-section">
                <div class="filter-head">Tipe Pas (Fit) <i class="fas fa-minus small text-muted"></i></div>
                <label class="custom-check"><span><input type="checkbox"> Oversized</span> <span
                        class="count-badge">10</span></label>
                <label class="custom-check"><span><input type="checkbox"> Slim Fit</span> <span
                        class="count-badge">8</span></label>
                <label class="custom-check"><span><input type="checkbox"> Regular Fit</span> <span
                        class="count-badge">20</span></label>
            </div>

            <div class="filter-section">
                <div class="filter-head">Bahan <i class="fas fa-minus small text-muted"></i></div>
                <label class="custom-check"><span><input type="checkbox"> Cotton</span></label>
                <label class="custom-check"><span><input type="checkbox"> Denim</span></label>
                <label class="custom-check"><span><input type="checkbox"> Linen</span></label>
            </div>

            <div class="filter-section">
                <div class="filter-head">Warna <i class="fas fa-minus small text-muted"></i></div>
                <div class="color-wrap">
                    <span class="color-opt bg-dark" title="Hitam"></span>
                    <span class="color-opt bg-white" title="Putih"></span>
                    <span class="color-opt bg-primary" title="Biru"></span>
                    <span class="color-opt bg-danger" title="Merah"></span>
                    <span class="color-opt bg-warning" title="Kuning"></span>
                    <span class="color-opt bg-success" title="Hijau"></span>
                    <span class="color-opt" style="background-color: #800000;" title="Maroon"></span>
                    <span class="color-opt" style="background-color: #f5f5dc;" title="Cream"></span>
                </div>
            </div>

            <div class="filter-section border-0">
                <div class="filter-head">Ukuran <i class="fas fa-minus small text-muted"></i></div>
                <div class="size-wrap">
                    <span class="size-btn">S</span>
                    <span class="size-btn">M</span>
                    <span class="size-btn">L</span>
                    <span class="size-btn">XL</span>
                    <span class="size-btn">XXL</span>
                    <span class="size-btn">All Size</span>
                </div>
            </div>

            <button class="btn btn-dark w-100 mt-3 rounded-0 fw-bold">TERAPKAN FILTER</button>

        </div>

        <div class="col-lg-9">

            <div class="cat-banner">
                <div class="cat-banner-content animate-up">
                    <h2 style="color: white;" class="fw-bold mb-0 text-uppercase">
                        <?= $filter == 'all' ? "MEN'S" : $filter ?> COLLECTION</h2>
                    <p class="mb-0">Koleksi terbaru untuk gaya terbaikmu.</p>
                </div>
            </div>

            <div class="row row-cols-2 row-cols-md-3 g-4">

                <?php
                $count = 0;
                foreach ($products as $p):
                    // FILTER LOGIC
                    $show = false;
                    if ($filter == 'sale') {
                        if ($p['old'] > 0) $show = true;
                    } elseif ($filter == 'all' || $filter == 'pria') {
                        if ($p['gender'] == 'pria') $show = true;
                    } else {
                        if ($p['gender'] == $filter) $show = true;
                    }

                    if ($show):
                        $count++;
                ?>
                        <div class="col">
                            <div class="product-card">

                                <a href="<?= base_url('detail') ?>" class="product-link">

                                    <div class="card-img-wrap">
                                        <?php if ($p['tag'] == 'new'): ?>
                                            <span class="tag-badge bg-new">NEW</span>
                                        <?php elseif ($p['tag'] == 'sale'): ?>
                                            <span class="tag-badge bg-sale">SALE</span>
                                        <?php elseif ($p['tag'] == 'best'): ?>
                                            <span class="tag-badge bg-best">HOT</span>
                                        <?php endif; ?>

                                        <img src="<?= $p['img'] ?>" class="card-img" alt="<?= $p['nama'] ?>">

                                        <div class="overlay-actions">
                                            <button class="btn-action" title="Wishlist"><i class="far fa-heart"></i></button>
                                            <button class="btn-action" title="Lihat"><i class="far fa-eye"></i></button>
                                            <button class="btn-action" title="Beli"><i class="fas fa-shopping-bag"></i></button>
                                        </div>
                                    </div>

                                    <div class="mt-3 px-2 pb-3">
                                        <small class="text-muted text-uppercase fw-bold"
                                            style="font-size: 10px;"><?= $p['cat'] ?></small>
                                        <h6 class="text-dark fw-bold mb-1 text-truncate" style="font-size: 14px;">
                                            <?= $p['nama'] ?></h6>

                                        <div class="d-flex align-items-center mb-2">
                                            <span class="fw-bold text-dark" style="font-size: 14px;">Rp
                                                <?= number_format($p['harga'], 0, ',', '.') ?></span>
                                            <?php if ($p['old'] > 0): ?>
                                                <small class="text-muted text-decoration-line-through ms-2"
                                                    style="font-size: 11px;">
                                                    Rp <?= number_format($p['old'], 0, ',', '.') ?>
                                                </small>
                                            <?php endif; ?>
                                        </div>

                                        <div class="color-dots">
                                            <?php foreach ($p['colors'] as $c): ?>
                                                <div class="dot" style="background-color: <?= $c ?>;"></div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>

                                </a>

                            </div>
                        </div>
                <?php endif;
                endforeach; ?>

            </div>

            <?php if ($count == 0): ?>
                <div class="text-center py-5">
                    <i class="fas fa-box-open fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">Produk tidak ditemukan untuk kategori ini.</h5>
                </div>
            <?php endif; ?>

            <div class="mt-5 text-center">
                <button class="btn btn-outline-dark px-5 rounded-0">LOAD MORE</button>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>