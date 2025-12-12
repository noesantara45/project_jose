<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<style>
/* Gender Tabs */
.gender-tabs {
    border-bottom: 1px solid #eee;
    margin-bottom: 30px;
    text-align: center;
    padding-top: 10px;
}

.gender-link {
    font-size: 14px;
    font-weight: 600;
    color: #888;
    padding: 15px 25px;
    text-transform: uppercase;
    letter-spacing: 1px;
    border-bottom: 3px solid transparent;
    text-decoration: none;
    display: inline-block;
    transition: 0.3s;
}

.gender-link:hover {
    color: #000;
}

.gender-link.active {
    color: #000;
    border-bottom-color: #000;
}

/* Banner */
.cat-banner {
    background: url('https://images.unsplash.com/photo-1441984904996-e0b6ba687e04?w=1200&q=80') no-repeat center center;
    background-size: cover;
    height: 200px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    margin-bottom: 30px;
    position: relative;
}

.cat-banner::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.4);
    border-radius: 12px;
}

.cat-banner-content {
    position: relative;
    z-index: 2;
    text-align: center;
}

/* SIDEBAR FILTER (UPDATED) */
.filter-sidebar {
    background-color: #fff;
    padding-right: 20px;
}

.filter-section {
    margin-bottom: 20px;
    border-bottom: 1px solid #f0f0f0;
    padding-bottom: 15px;
}

.filter-head {
    font-weight: 700;
    font-size: 13px;
    text-transform: uppercase;
    margin-bottom: 12px;
    display: flex;
    justify-content: space-between;
    cursor: pointer;
    color: #111;
}

/* Checkbox & Text */
.custom-check {
    font-size: 13px;
    color: #555;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 6px;
    transition: 0.2s;
}

.custom-check:hover {
    color: #000;
}

.count-badge {
    font-size: 10px;
    color: #999;
    background: #f8f9fa;
    padding: 2px 6px;
    border-radius: 4px;
}

/* Color Swatches */
.color-wrap {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
}

.color-opt {
    width: 22px;
    height: 22px;
    border-radius: 50%;
    border: 1px solid #ddd;
    cursor: pointer;
    transition: 0.2s;
}

.color-opt:hover {
    transform: scale(1.2);
    border-color: #000;
}

/* Size Buttons */
.size-wrap {
    display: flex;
    flex-wrap: wrap;
    gap: 5px;
}

.size-btn {
    font-size: 11px;
    padding: 4px 10px;
    border: 1px solid #eee;
    border-radius: 4px;
    background: #fff;
    cursor: pointer;
}

.size-btn:hover {
    border-color: #000;
    background: #000;
    color: #fff;
}

/* Star Rating */
.star-active {
    color: #f1c40f;
}

.star-muted {
    color: #ddd;
}

/* Product Card */
.product-card {
    border: none;
    transition: 0.3s;
    position: relative;
    margin-bottom: 20px;
    background: #fff;
    border-radius: 8px;
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
}

.card-img-wrap {
    position: relative;
    overflow: hidden;
    border-radius: 8px;
    aspect-ratio: 3/4;
    background: #f9f9f9;
}

.card-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: 0.5s;
}

.product-card:hover .card-img {
    transform: scale(1.05);
}

.tag-badge {
    position: absolute;
    top: 10px;
    left: 10px;
    padding: 4px 10px;
    font-size: 10px;
    font-weight: 700;
    color: white;
    border-radius: 4px;
    text-transform: uppercase;
    z-index: 5;
}

.bg-sale {
    background: #e74c3c;
}

.bg-new {
    background: #2ecc71;
}

.bg-best {
    background: #f39c12;
}

.overlay-actions {
    position: absolute;
    bottom: 10px;
    left: 0;
    right: 0;
    display: flex;
    justify-content: center;
    gap: 10px;
    opacity: 0;
    transform: translateY(20px);
    transition: 0.3s;
}

.product-card:hover .overlay-actions {
    opacity: 1;
    transform: translateY(0);
}

.btn-action {
    width: 35px;
    height: 35px;
    background: white;
    border-radius: 50%;
    border: none;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    color: #333;
    transition: 0.2s;
    display: flex;
    align-items: center;
    justify-content: center;
}

.btn-action:hover {
    background: #000;
    color: white;
}

.color-dots {
    margin-top: 8px;
    display: flex;
    gap: 5px;
}

.dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    border: 1px solid #ddd;
}
</style>

<?php
$products = [
    ['nama' => 'Relaxed Fit Cargo Pants', 'cat' => 'Pants', 'harga' => 299000, 'old' => 0, 'img' => 'https://images.unsplash.com/photo-1517487881594-2787fef5ebf7?w=500', 'tag' => 'best', 'colors' => ['#000', '#556b2f']],
    ['nama' => 'Oversized Cotton T-Shirt', 'cat' => 'Tops', 'harga' => 129000, 'old' => 199000, 'img' => 'https://images.unsplash.com/photo-1583743814966-8936f5b7be1a?w=500', 'tag' => 'sale', 'colors' => ['#000', '#fff', '#800020']],
    ['nama' => 'Denim Trucker Jacket', 'cat' => 'Outerwear', 'harga' => 499000, 'old' => 0, 'img' => 'https://images.unsplash.com/photo-1576871337622-98d48d1cf531?w=500', 'tag' => 'new', 'colors' => ['#1e3799']],
    ['nama' => 'Chuck 70 High Top', 'cat' => 'Shoes', 'harga' => 999000, 'old' => 0, 'img' => 'https://images.unsplash.com/photo-1607522370275-f14206abe5d3?w=500', 'tag' => '', 'colors' => ['#000', '#fff']],
    ['nama' => 'Slim Fit Chino', 'cat' => 'Pants', 'harga' => 199000, 'old' => 250000, 'img' => 'https://images.unsplash.com/photo-1473966968600-fa801b869a1a?w=500', 'tag' => 'sale', 'colors' => ['#000080', '#8b4513']],
    ['nama' => 'Corduroy Cap', 'cat' => 'Accessories', 'harga' => 99000, 'old' => 0, 'img' => 'https://images.unsplash.com/photo-1588850561407-ed78c282e89b?w=500', 'tag' => 'best', 'colors' => ['#a52a2a', '#000']]
];
?>

<div class="container pb-5">

    <div class="gender-tabs">
        <a href="#" class="gender-link active">Pria</a>
        <a href="#" class="gender-link">Wanita</a>
        <a href="#" class="gender-link">Anak-anak</a>
        <a href="#" class="gender-link text-danger">Sale</a>
    </div>

    <nav aria-label="breadcrumb" class="mb-4 mt-3">
        <ol class="breadcrumb small text-uppercase">
            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>" class="text-decoration-none text-muted">Home</a>
            </li>
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-muted">Pria</a></li>
            <li class="breadcrumb-item active text-dark" aria-current="page">Katalog</li>
        </ol>
    </nav>

    <div class="row">

        <div class="col-lg-3 d-none d-lg-block filter-sidebar border-end">

            <div class="filter-section">
                <div class="filter-head">Kategori <i class="fas fa-minus small text-muted"></i></div>
                <label class="custom-check"><span><input type="checkbox" checked> Atasan</span> <span
                        class="count-badge">45</span></label>
                <label class="custom-check"><span><input type="checkbox"> Bawahan</span> <span
                        class="count-badge">32</span></label>
                <label class="custom-check"><span><input type="checkbox"> Outerwear</span> <span
                        class="count-badge">18</span></label>
                <label class="custom-check"><span><input type="checkbox"> Sepatu</span> <span
                        class="count-badge">12</span></label>
                <label class="custom-check"><span><input type="checkbox"> Aksesoris</span> <span
                        class="count-badge">24</span></label>
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
                            class="fas fa-hand-holding-usd text-success"></i> COD (Bayar ditempat)</span></label>
                <label class="custom-check"><span><input type="checkbox"> <i class="fas fa-tags text-danger"></i> Diskon
                        > 50%</span></label>
            </div>

            <div class="filter-section">
                <div class="filter-head">Rating <i class="fas fa-minus small text-muted"></i></div>
                <label class="custom-check">
                    <span><input type="checkbox"> <i class="fas fa-star star-active"></i> 4 Keatas</span>
                </label>
                <label class="custom-check">
                    <span><input type="checkbox"> <i class="fas fa-star star-active"></i> Semua Bintang</span>
                </label>
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
                <label class="custom-check"><span><input type="checkbox"> Cotton Combed</span></label>
                <label class="custom-check"><span><input type="checkbox"> Denim</span></label>
                <label class="custom-check"><span><input type="checkbox"> Canvas</span></label>
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
                    <h2 class="fw-bold mb-0">MEN'S COLLECTION</h2>
                    <p class="mb-0">Upgrade gayamu dengan koleksi terbaru musim ini.</p>
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
                <span class="text-muted small">Menampilkan <strong>6</strong> Produk</span>
                <div class="d-flex gap-2 align-items-center">
                    <span class="small text-muted">Urutkan:</span>
                    <select class="form-select form-select-sm border-0 bg-light" style="width: 150px;">
                        <option>Paling Relevan</option>
                        <option>Terbaru</option>
                        <option>Harga Terendah</option>
                    </select>
                </div>
            </div>

            <div class="row row-cols-2 row-cols-md-3 g-4">
                <?php foreach($products as $p): ?>
                <div class="col">
                    <div class="product-card">
                        <div class="card-img-wrap">
                            <?php if($p['tag'] == 'new'): ?>
                            <span class="tag-badge bg-new">NEW</span>
                            <?php elseif($p['tag'] == 'sale'): ?>
                            <span class="tag-badge bg-sale">SALE</span>
                            <?php elseif($p['tag'] == 'best'): ?>
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
                            <h6 class="text-dark fw-bold mb-1 text-truncate" style="font-size: 14px;"><?= $p['nama'] ?>
                            </h6>

                            <div class="d-flex align-items-center mb-2">
                                <span class="fw-bold text-dark" style="font-size: 14px;">Rp
                                    <?= number_format($p['harga'],0,',','.') ?></span>
                                <?php if($p['old'] > 0): ?>
                                <small class="text-muted text-decoration-line-through ms-2" style="font-size: 11px;">
                                    Rp <?= number_format($p['old'],0,',','.') ?>
                                </small>
                                <?php endif; ?>
                            </div>

                            <div class="color-dots">
                                <?php foreach($p['colors'] as $c): ?>
                                <div class="dot" style="background-color: <?= $c ?>;"></div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="mt-5 text-center">
                <button class="btn btn-outline-dark px-5 rounded-0">LOAD MORE</button>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>