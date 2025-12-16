<?= $this->extend('landing/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container py-5">

    <nav aria-label="breadcrumb" class="mb-4 animate-up">
        <ol class="breadcrumb small">
            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>" class="text-muted text-decoration-none">Home</a>
            </li>
            <li class="breadcrumb-item"><a href="<?= base_url('kategori') ?>"
                    class="text-muted text-decoration-none">Katalog</a></li>
            <li class="breadcrumb-item active text-dark" aria-current="page"><?= esc($product['name']) ?></li>
        </ol>
    </nav>

    <div class="row g-5">

        <div class="col-lg-6 animate-up">
            <div class="product-gallery">
                <div class="main-image-wrap border rounded overflow-hidden mb-3">
                    <img src="<?= base_url('uploads/products/' . ($product['image'] ? $product['image'] : 'default.jpg')) ?>"
                        id="mainImage" class="w-100" style="height: 500px; object-fit: cover;"
                        alt="<?= esc($product['name']) ?>"
                        onerror="this.src='https://via.placeholder.com/500x500?text=No+Image'">
                </div>

                <div class="thumbnail-list d-flex gap-2">
                    <div class="thumb-btn active border rounded p-1"
                        style="cursor: pointer; width: 80px; height: 80px;">
                        <img src="<?= base_url('uploads/products/' . ($product['image'] ? $product['image'] : 'default.jpg')) ?>"
                            class="w-100 h-100" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="product-info-sticky animate-up delay-1">

                <div class="p-brand text-uppercase text-muted small fw-bold mb-1">HLOutfit Originals</div>
                <h1 class="p-title fw-bold display-6 mb-2"><?= esc($product['name']) ?></h1>

                <div class="d-flex align-items-center gap-2 mt-2 mb-3">
                    <div class="text-warning small">
                        <?php
                        $rating = $product['rating'] ?? 5.0;
                        for ($i = 1; $i <= 5; $i++) {
                            if ($i <= $rating) echo '<i class="fas fa-star"></i>';
                            elseif ($i - 0.5 <= $rating) echo '<i class="fas fa-star-half-alt"></i>';
                            else echo '<i class="far fa-star"></i>';
                        }
                        ?>
                    </div>
                    <span class="text-muted small border-start ps-2"><?= $rating ?> (Ulasan)</span>
                    <span class="text-muted small border-start ps-2"><?= $product['total_sold'] ?> Terjual</span>
                    <span class="badge bg-success ms-2"><?= esc($product['category_name']) ?></span>
                </div>

                <div class="price-wrap mb-4">
                    <span class="final-price fw-bold text-dark fs-2">Rp
                        <?= number_format($product['price'], 0, ',', '.') ?></span>
                    <?php if ($product['stock'] < 5): ?>
                        <span class="badge bg-danger ms-2">Stok Menipis: Sisa <?= $product['stock'] ?>!</span>
                    <?php endif; ?>
                </div>

                <hr class="my-4 text-muted opacity-25">

                <?php if (!empty($product['color'])): ?>
                    <div class="mb-4">
                        <span class="variant-label fw-bold d-block mb-2">Warna: <span id="colorName"
                                class="fw-normal"><?= esc($product['color']) ?></span></span>
                        <div class="color-selector d-flex gap-2">
                            <?php
                            $colorName = $product['color'];
                            $colorMap = ['Hitam' => '#000', 'Putih' => '#fff', 'Merah' => '#dc3545', 'Biru' => '#0d6efd', 'Navy' => '#000080', 'Hijau' => '#198754', 'Kuning' => '#ffc107', 'Abu-abu' => '#808080', 'Coklat' => '#8b4513'];
                            $hex = $colorMap[$colorName] ?? '#ccc';
                            ?>
                            <label style="cursor: pointer;">
                                <input type="radio" name="warna" value="<?= $colorName ?>" checked class="d-none">
                                <span class="color-circle border d-block rounded-circle"
                                    style="width: 30px; height: 30px; background: <?= $hex ?>; box-shadow: 0 0 0 2px #ddd;"
                                    title="<?= $colorName ?>"></span>
                            </label>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (!empty($product['size'])): ?>
                    <div class="mb-4">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="variant-label fw-bold">Ukuran</span>
                            <a href="#" class="text-decoration-none small text-muted text-decoration-underline"
                                data-bs-toggle="modal" data-bs-target="#sizeChartModal">Lihat Panduan</a>
                        </div>
                        <div class="size-selector d-flex flex-wrap gap-2">
                            <?php
                            $sizes = explode(',', $product['size']); // Pisahkan string "S, M, L" jadi array
                            foreach ($sizes as $idx => $size):
                                $size = trim($size); // Hapus spasi
                            ?>
                                <label>
                                    <input type="radio" name="size" value="<?= $size ?>" <?= $idx == 0 ? 'checked' : '' ?>
                                        class="btn-check">
                                    <span class="btn btn-outline-dark btn-sm rounded-0 px-3"><?= $size ?></span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('cart/add') ?>" method="post" class="w-100">
                    <?= csrf_field() ?>
                    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">

                    <div class="d-flex align-items-center gap-3 mb-4">

                        <div class="d-flex align-items-center border rounded px-2" style="height: 48px;">
                            <button type="button" class="btn btn-link text-dark text-decoration-none"
                                onclick="updateQty(-1)">-</button>

                            <input type="text" name="qty" id="qtyVal" value="1"
                                class="form-control border-0 text-center p-0" style="width: 40px;" readonly>

                            <button type="button" class="btn btn-link text-dark text-decoration-none"
                                onclick="updateQty(1)">+</button>
                        </div>

                        <button type="submit" class="btn btn-dark flex-grow-1" style="height: 48px;">
                            <i class="fas fa-shopping-bag me-2"></i> Tambah Keranjang
                        </button>

                        <a href="#" class="btn btn-outline-secondary d-flex align-items-center justify-content-center"
                            style="height: 48px; width: 48px;">
                            <i class="far fa-heart"></i>
                        </a>
                    </div>
                </form>

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
                                <p><?= nl2br(esc($product['description'])) ?></p>
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
            <?php foreach ($related as $rel): ?>
                <div class="col">
                    <div class="card border-0 shadow-sm h-100 product-card">
                        <a href="<?= base_url('detail/' . $rel['slug']) ?>" class="text-decoration-none text-dark">
                            <img src="<?= base_url('uploads/products/' . ($rel['image'] ? $rel['image'] : 'default.jpg')) ?>"
                                class="card-img-top" style="height: 250px; object-fit: cover;"
                                alt="<?= esc($rel['name']) ?>">
                            <div class="card-body p-3">
                                <h6 class="card-title text-truncate fw-bold mb-1"><?= esc($rel['name']) ?></h6>
                                <span class="fw-bold text-dark">Rp <?= number_format($rel['price'], 0, ',', '.') ?></span>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
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
    // Fungsi Plus Minus Quantity
    function updateQty(change) {
        let input = document.getElementById('qtyVal');
        let current = parseInt(input.value);
        let maxStock = <?= $product['stock'] ?>;
        let newVal = current + change;

        if (newVal >= 1 && newVal <= maxStock) {
            input.value = newVal;
        }
    }
</script>

<?= $this->endSection(); ?>