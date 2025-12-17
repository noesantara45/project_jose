<?= $this->extend('landing/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container py-5 mt-4">

    <nav aria-label="breadcrumb" class="mb-4 animate-up">
        <ol class="breadcrumb breadcrumb-custom">
            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('kategori') ?>">Katalog</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= esc($product['name']) ?></li>
        </ol>
    </nav>

    <div class="row g-5">
        <div class="col-lg-7 animate-up">
            <div class="gallery-wrapper">
                <div class="main-img-box mb-3">
                    <img src="<?= base_url('uploads/products/' . ($product['image'] ? $product['image'] : 'default.jpg')) ?>"
                        id="mainImage" class="main-img" alt="<?= esc($product['name']) ?>"
                        onerror="this.src='https://via.placeholder.com/600x800?text=No+Image'">

                    <?php if ($product['stock'] < 5): ?>
                    <div class="stock-badge">Sisa <?= $product['stock'] ?>!</div>
                    <?php endif; ?>
                </div>

                <div class="thumb-list">
                    <div class="thumb-item active">
                        <img src="<?= base_url('uploads/products/' . ($product['image'] ? $product['image'] : 'default.jpg')) ?>"
                            class="thumb-img">
                    </div>
                    <div class="thumb-item"><img
                            src="<?= base_url('uploads/products/' . ($product['image'] ? $product['image'] : 'default.jpg')) ?>"
                            class="thumb-img" style="filter: hue-rotate(90deg);"></div>
                    <div class="thumb-item"><img
                            src="<?= base_url('uploads/products/' . ($product['image'] ? $product['image'] : 'default.jpg')) ?>"
                            class="thumb-img" style="filter: sepia(1);"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="product-info-sticky animate-up delay-1">

                <div class="brand-tag">HLOutfit Originals</div>
                <h1 class="product-title"><?= esc($product['name']) ?></h1>

                <div class="d-flex align-items-center gap-3 mb-4">
                    <div class="rating-stars">
                        <?php
                        $rating = $product['rating'] ?? 5.0;
                        for ($i = 1; $i <= 5; $i++) {
                            echo ($i <= $rating) ? '<i class="fas fa-star"></i>' : '<i class="far fa-star"></i>';
                        }
                        ?>
                        <span class="ms-1 text-dark fw-bold"><?= $rating ?></span>
                    </div>
                    <div class="vr opacity-25"></div>
                    <span class="text-muted small"><?= $product['total_sold'] ?> Terjual</span>
                    <span class="badge bg-light text-dark border"><?= esc($product['category_name']) ?></span>
                </div>

                <div class="price-wrapper mb-4">
                    <span class="price-final">Rp <?= number_format($product['price'], 0, ',', '.') ?></span>
                </div>

                <hr class="divider-soft">

                <form action="<?= base_url('cart/add') ?>" method="post" class="product-form">
                    <?= csrf_field() ?>
                    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">

                    <?php if (!empty($product['color'])): ?>
                    <div class="mb-4">
                        <label class="option-label">Warna: <span
                                class="fw-normal"><?= esc($product['color']) ?></span></label>
                        <div class="d-flex gap-2">
                            <?php
                                $colorName = $product['color'];
                                $colorMap = ['Hitam' => '#000', 'Putih' => '#fff', 'Merah' => '#dc3545', 'Biru' => '#0d6efd', 'Navy' => '#000080', 'Hijau' => '#198754', 'Kuning' => '#ffc107', 'Abu-abu' => '#808080', 'Coklat' => '#8b4513'];
                                $hex = $colorMap[$colorName] ?? '#ccc';
                            ?>
                            <label class="color-radio">
                                <input type="radio" name="warna" value="<?= $colorName ?>" checked>
                                <span class="swatch" style="background-color: <?= $hex ?>;"></span>
                            </label>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if (!empty($product['size'])): ?>
                    <div class="mb-4">
                        <div class="d-flex justify-content-between mb-2">
                            <label class="option-label">Ukuran</label>
                            <a href="#" class="guide-link" data-bs-toggle="modal"
                                data-bs-target="#sizeChartModal">Panduan Ukuran</a>
                        </div>
                        <div class="size-options">
                            <?php
                                $sizes = explode(',', $product['size']);
                                foreach ($sizes as $idx => $size):
                                    $size = trim($size);
                            ?>
                            <label>
                                <input type="radio" name="size" value="<?= $size ?>" <?= $idx == 0 ? 'checked' : '' ?>
                                    class="size-input">
                                <span class="size-box"><?= $size ?></span>
                            </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="action-buttons mt-5">
                        <div class="qty-control">
                            <button type="button" onclick="updateQty(-1)">-</button>
                            <input type="text" name="qty" id="qtyVal" value="1" readonly>
                            <button type="button" onclick="updateQty(1)">+</button>
                        </div>

                        <button type="submit" name="btn_action" value="checkout" class="btn btn-buy flex-grow-1">
                            BELI SEKARANG
                        </button>

                        <button type="submit" name="btn_action" value="add_to_cart" class="btn btn-cart-icon">
                            <i class="fas fa-shopping-bag"></i>
                        </button>
                    </div>
                </form>

                <div class="accordion mt-4 accordion-flush" id="infoAccordion">
                    <div class="accordion-item bg-transparent">
                        <h2 class="accordion-header">
                            <button class="accordion-button fw-bold bg-transparent shadow-none ps-0" type="button"
                                data-bs-toggle="collapse" data-bs-target="#desc">
                                Deskripsi & Detail Produk
                            </button>
                        </h2>
                        <div id="desc" class="accordion-collapse collapse show" data-bs-parent="#infoAccordion">
                            <div class="accordion-body ps-0 text-muted small">
                                <?= nl2br(esc($product['description'])) ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="related-section mt-5 pt-5 border-top">
        <h3 class="fw-bold mb-4">Lengkapi Gaya Kamu</h3>
        <div class="row row-cols-2 row-cols-md-4 g-4">
            <?php foreach ($related as $rel): ?>
            <div class="col">
                <a href="<?= base_url('detail/' . $rel['slug']) ?>" class="card-related h-100">
                    <div class="img-wrap">
                        <img src="<?= base_url('uploads/products/' . ($rel['image'] ? $rel['image'] : 'default.jpg')) ?>"
                            alt="<?= esc($rel['name']) ?>">
                    </div>
                    <div class="p-3 text-center">
                        <h6 class="fw-bold text-dark text-truncate mb-1"><?= esc($rel['name']) ?></h6>
                        <span class="text-muted small">Rp <?= number_format($rel['price'], 0, ',', '.') ?></span>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div class="modal fade" id="sizeChartModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold ms-2">Size Guide</h5>
                <button type="button" class="btn-close me-2" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center p-4">
                <img src="https://i.pinimg.com/originals/e8/63/0f/e8630f9a2d82998782d820577573860a.jpg"
                    class="img-fluid rounded mb-3" alt="Size Chart">
                <p class="text-muted small">Satuan dalam CM. Toleransi 1-2 cm.</p>
            </div>
        </div>
    </div>
</div>

<script>
function updateQty(change) {
    let input = document.getElementById('qtyVal');
    let current = parseInt(input.value);
    let max = <?= $product['stock'] ?>;
    let next = current + change;
    if (next >= 1 && next <= max) input.value = next;
}
</script>

<?= $this->endSection(); ?>