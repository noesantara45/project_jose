<?= $this->extend('landing/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container py-5">

    <div class="cart-header animate-up">
        <h2 class="fw-bold">Tas Belanja <span class="text-muted fs-5 fw-normal">(<?= count($cart_items) ?> Item)</span>
        </h2>
    </div>

    <div class="row g-4">

        <div class="col-lg-8 animate-up delay-1">

            <?php if (empty($cart_items)): ?>
                <div class="cart-item-box empty-cart text-center py-5 border rounded bg-light">
                    <div>
                        <i class="fas fa-shopping-basket fa-3x text-muted mb-3"></i>
                        <h4>Tas Belanja Kosong</h4>
                        <p class="text-muted">Sepertinya kamu belum menambahkan apapun.</p>
                        <a href="<?= base_url('kategori') ?>" class="btn btn-dark rounded-pill px-4 mt-3">Mulai Belanja</a>
                    </div>
                </div>
            <?php else: ?>

                <?php
                $total_belanja = 0;
                ?>

                <?php foreach ($cart_items as $item):
                    $subtotal = $item['price'] * $item['qty'];
                    $total_belanja += $subtotal;

                    // LOGIKA GAMBAR (Dipindahkan ke dalam loop utama)
                    $imgSource = $item['img'];
                    if (strpos($imgSource, 'http') === 0) {
                        $finalImage = $imgSource;
                    } else {
                        $finalImage = base_url('uploads/products/' . $imgSource);
                    }
                ?>
                    <div class="cart-item-box border rounded p-3 mb-3 d-flex gap-3 align-items-center bg-white shadow-sm"
                        id="row-<?= $item['cart_id'] ?>">

                        <div class="cart-img-wrap" style="width: 100px; height: 100px; flex-shrink: 0;">
                            <img src="<?= $finalImage ?>" class="w-100 h-100 rounded" style="object-fit: cover;" alt="Produk"
                                onerror="this.src='https://via.placeholder.com/150?text=No+Image'">
                        </div>

                        <div class="cart-info flex-grow-1">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h5 class="mb-1 text-dark fw-bold"><?= esc($item['name']) ?></h5>
                                    <div class="text-muted small mb-2">
                                        Warna: <?= esc($item['color'] ?? '-') ?>,
                                        Ukuran: <?= esc($item['size'] ?? '-') ?>
                                    </div>
                                </div>
                                <a href="<?= base_url('cart/delete/' . $item['cart_id']) ?>"
                                    class="btn btn-sm btn-outline-danger border-0" onclick="return confirm('Hapus item ini?')">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </div>

                            <div class="d-flex justify-content-between align-items-end mt-2">
                                <div class="fw-bold text-dark">
                                    Rp <?= number_format($item['price'], 0, ',', '.') ?>
                                </div>

                                <div class="qty-control d-flex align-items-center border rounded">
                                    <button class="btn btn-sm btn-link text-dark text-decoration-none px-2"
                                        onclick="updateCart(<?= $item['cart_id'] ?>, -1)">-</button>

                                    <input type="text" class="form-control border-0 text-center p-0 qty-input"
                                        id="qty-<?= $item['cart_id'] ?>" value="<?= $item['qty'] ?>" style="width: 40px;"
                                        readonly>

                                    <button class="btn btn-sm btn-link text-dark text-decoration-none px-2"
                                        onclick="updateCart(<?= $item['cart_id'] ?>, 1)">+</button>
                                </div>
                            </div>
                        </div>

                    </div>
                <?php endforeach; ?>

            <?php endif; ?>

        </div>

        <div class="col-lg-4 animate-up delay-2">
            <div class="summary-card border rounded p-4 bg-white shadow-sm">
                <h5 class="fw-bold mb-4">Ringkasan Pesanan</h5>

                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Subtotal</span>
                    <span class="fw-bold" id="subtotal-val">Rp <?= number_format($total_belanja, 0, ',', '.') ?></span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Ongkos Kirim</span>
                    <span class="text-success fw-bold">Gratis</span>
                </div>
                <hr>
                <div class="d-flex justify-content-between mb-4">
                    <span class="fw-bold fs-5">Total</span>
                    <span class="fw-bold fs-5 text-primary" id="total-val">Rp
                        <?= number_format($total_belanja, 0, ',', '.') ?></span>
                </div>

                <a href="<?= base_url('co') ?>" class="btn btn-dark w-100 py-3 fw-bold rounded">
                    Lanjut ke Checkout
                </a>
            </div>
        </div>
    </div>

</div>

<script>
    // FUNGSI UPDATE QUANTITY (Hanya tampilan visual dulu untuk sekarang)
    // Nanti kita sambungkan ke AJAX Database di langkah selanjutnya
    function updateCart(cartId, change) {
        let input = document.getElementById('qty-' + cartId);
        let currentQty = parseInt(input.value);
        let newQty = currentQty + change;

        if (newQty >= 1) {
            input.value = newQty;
            // Tips: Di sini nanti kita tambahkan coding AJAX agar update ke database
            // Untuk sekarang hanya visual update total harga belum otomatis reload
        }
    }
</script>

<?= $this->endSection(); ?>