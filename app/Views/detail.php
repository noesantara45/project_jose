<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<style>
/* 1. Gallery Layout */
.product-gallery {
    position: relative;
}

.main-image-wrap {
    border-radius: 12px;
    overflow: hidden;
    margin-bottom: 15px;
    cursor: zoom-in;
    /* Indikasi bisa di-zoom */
    background: #f9f9f9;
    aspect-ratio: 3/4;
    /* Portrait Fashion */
}

.main-img-display {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: 0.3s;
}

.thumbnail-list {
    display: flex;
    gap: 10px;
    overflow-x: auto;
}

.thumb-btn {
    width: 70px;
    height: 90px;
    border: 2px solid transparent;
    border-radius: 8px;
    cursor: pointer;
    overflow: hidden;
    opacity: 0.7;
    transition: 0.2s;
}

.thumb-btn.active,
.thumb-btn:hover {
    border-color: #000;
    opacity: 1;
}

.thumb-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* 2. Product Info (Sticky di Kanan) */
.product-info-sticky {
    position: sticky;
    top: 100px;
    /* Jarak dari navbar */
}

.p-brand {
    font-weight: 700;
    color: #999;
    text-transform: uppercase;
    font-size: 13px;
    letter-spacing: 1px;
}

.p-title {
    font-size: 24px;
    font-weight: 600;
    color: #222;
    margin-top: 5px;
    line-height: 1.3;
}

.price-wrap {
    margin: 15px 0;
    display: flex;
    align-items: center;
    gap: 10px;
}

.final-price {
    font-size: 24px;
    font-weight: 700;
    color: #111;
}

.origin-price {
    font-size: 16px;
    color: #aaa;
    text-decoration: line-through;
}

.disc-label {
    background: #ffebeb;
    color: #d32f2f;
    font-weight: 700;
    font-size: 12px;
    padding: 3px 8px;
    border-radius: 4px;
}

/* 3. Variants (Color & Size) */
.variant-label {
    font-size: 13px;
    font-weight: 700;
    color: #444;
    margin-bottom: 8px;
    display: block;
}

/* Radio Button Gaya Button */
.size-selector input {
    display: none;
}

.size-btn {
    display: inline-block;
    min-width: 45px;
    padding: 8px 12px;
    border: 1px solid #ddd;
    border-radius: 6px;
    text-align: center;
    font-size: 14px;
    cursor: pointer;
    margin-right: 5px;
    transition: 0.2s;
    background: #fff;
}

.size-selector input:checked+.size-btn {
    border-color: #000;
    background: #000;
    color: #fff;
}

.size-selector input:disabled+.size-btn {
    background: #f5f5f5;
    color: #ccc;
    cursor: not-allowed;
    border-color: #eee;
    text-decoration: line-through;
}

/* Color Selector */
.color-selector input {
    display: none;
}

.color-circle {
    display: inline-block;
    width: 35px;
    height: 35px;
    border-radius: 50%;
    border: 2px solid #fff;
    box-shadow: 0 0 0 1px #ddd;
    /* Border luar halus */
    margin-right: 8px;
    cursor: pointer;
    transition: 0.2s;
}

.color-selector input:checked+.color-circle {
    box-shadow: 0 0 0 2px #000;
    transform: scale(1.1);
}

/* 4. Action Buttons */
.qty-input {
    width: 50px;
    text-align: center;
    border: none;
    font-weight: 600;
}

.btn-qty {
    width: 35px;
    height: 35px;
    background: #f5f5f5;
    border: none;
    border-radius: 4px;
    font-weight: 700;
    cursor: pointer;
}

.btn-qty:hover {
    background: #e0e0e0;
}

.btn-buy {
    background: #000;
    color: #fff;
    border: none;
    padding: 12px;
    font-weight: 600;
    width: 100%;
    border-radius: 8px;
    transition: 0.3s;
}

.btn-buy:hover {
    background: #333;
    transform: translateY(-2px);
}

.btn-wishlist-outline {
    border: 1px solid #ddd;
    background: #fff;
    width: 50px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    transition: 0.2s;
    cursor: pointer;
}

.btn-wishlist-outline:hover {
    border-color: #000;
    color: #d32f2f;
}

/* 5. Accordion Details */
.accordion-button:not(.collapsed) {
    color: #000;
    background-color: #f9f9f9;
    box-shadow: none;
}

.accordion-button:focus {
    box-shadow: none;
    border-color: rgba(0, 0, 0, 0.1);
}

.feature-list li {
    margin-bottom: 5px;
    font-size: 14px;
    color: #555;
}
</style>

<?php
$produk = [
    'nama' => 'Oversized Heavyweight T-Shirt',
    'harga' => 149000,
    'old' => 199000,
    'desc' => 'Kaos polos dengan potongan oversized yang trendy. Terbuat dari bahan Cotton Combed 20s (Heavyweight) yang tebal namun tetap adem dan menyerap keringat. Cocok untuk gaya streetwear sehari-hari.',
    'stok' => 50,
    'rating' => 4.8,
    'terjual' => 240,
    'img_main' => 'https://images.unsplash.com/photo-1583743814966-8936f5b7be1a?w=800',
    'gallery' => [
        'https://images.unsplash.com/photo-1583743814966-8936f5b7be1a?w=200',
        'https://images.unsplash.com/photo-1576566588028-4147f3842f27?w=200', // Mockup belakang
        'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=200', // Detail kain
    ]
];
?>

<div class="container py-5">

    <nav aria-label="breadcrumb" class="mb-4 animate-up">
        <ol class="breadcrumb small">
            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>" class="text-muted text-decoration-none">Home</a>
            </li>
            <li class="breadcrumb-item"><a href="<?= base_url('kategori') ?>"
                    class="text-muted text-decoration-none">Pria</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('kategori') ?>"
                    class="text-muted text-decoration-none">Atasan</a></li>
            <li class="breadcrumb-item active text-dark" aria-current="page"><?= $produk['nama'] ?></li>
        </ol>
    </nav>

    <div class="row g-5">

        <div class="col-lg-6 animate-up">
            <div class="product-gallery">
                <div class="main-image-wrap">
                    <img src="<?= $produk['img_main'] ?>" id="mainImage" class="main-img-display" alt="Produk Utama">
                </div>
                <div class="thumbnail-list">
                    <?php foreach($produk['gallery'] as $idx => $img): ?>
                    <div class="thumb-btn <?= $idx==0 ? 'active' : '' ?>"
                        onclick="changeImage(this, '<?= str_replace('w=200','w=800',$img) ?>')">
                        <img src="<?= $img ?>" class="thumb-img">
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="product-info-sticky animate-up delay-1">

                <div class="p-brand">HLOUTFIT ORIGINALS</div>
                <h1 class="p-title"><?= $produk['nama'] ?></h1>

                <div class="d-flex align-items-center gap-2 mt-2 mb-3">
                    <div class="text-warning small">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                            class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                    </div>
                    <span class="text-muted small border-start ps-2"><?= $produk['rating'] ?> (50 Ulasan)</span>
                    <span class="text-muted small border-start ps-2"><?= $produk['terjual'] ?> Terjual</span>
                </div>

                <div class="price-wrap">
                    <span class="final-price">Rp <?= number_format($produk['harga'],0,',','.') ?></span>
                    <?php if($produk['old'] > 0): ?>
                    <span class="origin-price">Rp <?= number_format($produk['old'],0,',','.') ?></span>
                    <span
                        class="disc-label">-<?= round((($produk['old'] - $produk['harga']) / $produk['old']) * 100) ?>%</span>
                    <?php endif; ?>
                </div>

                <hr class="my-4 text-muted opacity-25">

                <div class="mb-4">
                    <span class="variant-label">Warna: <span id="colorName" class="fw-normal">Hitam</span></span>
                    <div class="color-selector">
                        <label>
                            <input type="radio" name="warna" value="Hitam" checked onchange="updateColor('Hitam')">
                            <span class="color-circle bg-dark" title="Hitam"></span>
                        </label>
                        <label>
                            <input type="radio" name="warna" value="Putih" onchange="updateColor('Putih')">
                            <span class="color-circle bg-white border" title="Putih"></span>
                        </label>
                        <label>
                            <input type="radio" name="warna" value="Navy" onchange="updateColor('Navy')">
                            <span class="color-circle" style="background: #000080;" title="Navy"></span>
                        </label>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="d-flex justify-content-between">
                        <span class="variant-label">Ukuran</span>
                        <a href="#" class="text-decoration-none small text-muted text-decoration-underline"
                            data-bs-toggle="modal" data-bs-target="#sizeChartModal">Lihat Panduan Ukuran</a>
                    </div>
                    <div class="size-selector">
                        <label><input type="radio" name="size" value="S"><span class="size-btn">S</span></label>
                        <label><input type="radio" name="size" value="M" checked><span class="size-btn">M</span></label>
                        <label><input type="radio" name="size" value="L"><span class="size-btn">L</span></label>
                        <label><input type="radio" name="size" value="XL"><span class="size-btn">XL</span></label>
                        <label><input type="radio" name="size" value="XXL" disabled><span class="size-btn"
                                title="Stok Habis">XXL</span></label>
                    </div>
                </div>

                <div class="d-flex align-items-center gap-3 mb-4">
                    <div class="d-flex align-items-center border rounded px-2" style="height: 48px;">
                        <button class="btn-qty" onclick="updateQty(-1)">-</button>
                        <input type="text" id="qtyVal" value="1" class="qty-input" readonly>
                        <button class="btn-qty" onclick="updateQty(1)">+</button>
                    </div>
                    <button class="btn-buy" style="height: 48px;">
                        <i class="fas fa-shopping-bag me-2"></i> Tambah Keranjang yaa
                    </button>
                    <button class="btn-wishlist-outline" style="height: 48px;">
                        <i class="far fa-heart"></i>
                    </button>
                </div>

                <div class="accordion accordion-flush border rounded" id="productAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#descCollapse" aria-expanded="true">
                                Deskripsi Produk
                            </button>
                        </h2>
                        <div id="descCollapse" class="accordion-collapse collapse show"
                            data-bs-parent="#productAccordion">
                            <div class="accordion-body text-muted small">
                                <p><?= $produk['desc'] ?></p>
                                <ul class="feature-list ps-3">
                                    <li>Bahan: Heavyweight Cotton 20s</li>
                                    <li>Fitting: Oversized Boxy Cut</li>
                                    <li>Kerah: Ribbed Crewneck tahan melar</li>
                                    <li>Model pakai size L (Tinggi 178cm, Berat 70kg)</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                                data-bs-target="#shipCollapse">
                                Pengiriman & Retur
                            </button>
                        </h2>
                        <div id="shipCollapse" class="accordion-collapse collapse" data-bs-parent="#productAccordion">
                            <div class="accordion-body text-muted small">
                                <p class="mb-1"><i class="fas fa-truck me-2"></i> Dikirim dari Denpasar, Bali.</p>
                                <p class="mb-1"><i class="fas fa-clock me-2"></i> Pesanan sebelum 15:00 dikirim hari
                                    yang sama.</p>
                                <p class="mb-0"><i class="fas fa-undo me-2"></i> Garansi retur 7 hari jika salah ukuran
                                    (S&K Berlaku).</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <div class="mt-5 pt-5 border-top">
        <h4 class="fw-bold mb-4">Mungkin Kamu Suka</h4>
        <div class="row row-cols-2 row-cols-md-4 g-4">
            <?php for($i=1; $i<=4; $i++): ?>
            <div class="col">
                <div class="card border-0 shadow-sm h-100">
                    <img src="https://images.unsplash.com/photo-1576566588028-4147f3842f27?w=400" class="card-img-top"
                        style="height: 250px; object-fit: cover;">
                    <div class="card-body p-3">
                        <h6 class="card-title text-truncate fw-bold mb-1">Basic Oversize Tee White</h6>
                        <span class="fw-bold text-dark">Rp 149.000</span>
                    </div>
                </div>
            </div>
            <?php endfor; ?>
        </div>
    </div>
</div>

<div class="modal fade" id="sizeChartModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold">Panduan Ukuran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <img src="https://i.pinimg.com/originals/e8/63/0f/e8630f9a2d82998782d820577573860a.jpg"
                    class="img-fluid rounded" alt="Size Chart">
                <p class="text-muted small mt-3">Satuan dalam CM. Toleransi selisih 1-2 cm.</p>
            </div>
        </div>
    </div>
</div>

<script>
// Ganti Gambar Utama saat Thumbnail diklik
function changeImage(element, src) {
    document.getElementById('mainImage').src = src;
    // Reset active class
    document.querySelectorAll('.thumb-btn').forEach(el => el.classList.remove('active'));
    element.classList.add('active');
}

// Update Nama Warna saat diklik
function updateColor(colorName) {
    document.getElementById('colorName').innerText = colorName;
}

// Fungsi Plus Minus Quantity
function updateQty(change) {
    let input = document.getElementById('qtyVal');
    let current = parseInt(input.value);
    let newVal = current + change;
    if (newVal >= 1 && newVal <= <?= $produk['stok'] ?>) {
        input.value = newVal;
    }
}
</script>

<?= $this->endSection(); ?>