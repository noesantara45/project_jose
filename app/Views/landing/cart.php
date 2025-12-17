<?= $this->extend('landing/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container min-vh-100" style="padding-top: 120px; padding-bottom: 50px;">

    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
        <h2 class="fw-bold text-uppercase ls-1">Shopping Bag</h2>
        <span class="text-muted small"><?= count($cart_items) ?> Items</span>
    </div>

    <?php if (empty($cart_items)): ?>

        <div class="row justify-content-center py-5">
            <div class="col-md-6 text-center">
                <div class="mb-4">
                    <i class="fas fa-shopping-bag fa-5x text-muted opacity-25"></i>
                </div>
                <h3 class="fw-bold mb-2">Your Bag is Empty</h3>
                <p class="text-muted mb-4">Sepertinya kamu belum menemukan outfit yang cocok.</p>

                <a href="<?= base_url('kategori') ?>" class="btn btn-dark px-5 py-3 rounded-0 fw-bold text-uppercase ls-1">
                    Start Shopping
                </a>
            </div>
        </div>

    <?php else: ?>

        <?php $total_belanja = 0; // Inisialisasi variabel supaya tidak error 
        ?>

        <div class="row g-5">
            <div class="col-lg-8">
                <?php foreach ($cart_items as $item):
                    $subtotal = $item['price'] * $item['qty'];
                    $total_belanja += $subtotal;

                    // Handle Gambar
                    $imgSource = $item['img'];
                    $finalImage = (strpos($imgSource, 'http') === 0) ? $imgSource : base_url('uploads/products/' . $imgSource);
                ?>
                    <div class="d-flex gap-4 mb-4 pb-4 border-bottom align-items-start animate-up">
                        <div class="bg-light flex-shrink-0 position-relative" style="width: 120px; height: 150px;">
                            <img src="<?= $finalImage ?>" class="w-100 h-100" style="object-fit: cover;"
                                alt="<?= esc($item['name']) ?>"
                                onerror="this.src='https://via.placeholder.com/150?text=No+Image'">
                        </div>

                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5 class="fw-bold text-uppercase mb-1"><?= esc($item['name']) ?></h5>
                                    <p class="text-muted small mb-2">
                                        <?= esc($item['color'] ?? 'Black') ?> / <?= esc($item['size'] ?? 'All Size') ?>
                                    </p>
                                    <div class="fw-bold mt-2">Rp <?= number_format($item['price'], 0, ',', '.') ?></div>
                                </div>

                                <a href="<?= base_url('cart/delete/' . $item['cart_id']) ?>" class="text-muted hover-danger"
                                    onclick="return confirm('Hapus item ini?')">
                                    <i class="fas fa-times"></i>
                                </a>
                            </div>

                            <div class="mt-3 d-flex align-items-center">
                                <div class="input-group input-group-sm" style="width: 100px;">
                                    <button class="btn btn-outline-secondary rounded-0 border-end-0"
                                        onclick="updateCart(<?= $item['cart_id'] ?>, -1)">-</button>
                                    <input type="text"
                                        class="form-control text-center border-secondary border-start-0 border-end-0 bg-white"
                                        id="qty-<?= $item['cart_id'] ?>" value="<?= $item['qty'] ?>" readonly>
                                    <button class="btn btn-outline-secondary rounded-0 border-start-0"
                                        onclick="updateCart(<?= $item['cart_id'] ?>, 1)">+</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="col-lg-4">
                <div class="card border-0 bg-light p-4 sticky-top" style="top: 100px; z-index: 1;">
                    <h5 class="fw-bold mb-4">ORDER SUMMARY</h5>

                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Subtotal</span>
                        <span class="fw-bold">Rp <span
                                id="subtotal-display"><?= number_format($total_belanja, 0, ',', '.') ?></span></span>
                    </div>

                    <div class="d-flex justify-content-between mb-4">
                        <span class="text-muted">Shipping</span>
                        <span class="text-success fw-bold text-uppercase">Free</span>
                    </div>

                    <div class="border-top border-dark my-3"></div>

                    <div class="d-flex justify-content-between mb-4 align-items-center">
                        <span class="fw-bold fs-5">TOTAL</span>
                        <span class="fw-bold fs-4">Rp <?= number_format($total_belanja, 0, ',', '.') ?></span>
                    </div>

                    <a href="<?= base_url('co') ?>"
                        class="btn btn-dark w-100 py-3 fw-bold text-uppercase rounded-0 shadow-sm">
                        Checkout Now
                    </a>

                    <div class="text-center mt-3">
                        <small class="text-muted"><i class="fas fa-lock me-1"></i> Secure Checkout</small>
                    </div>
                </div>
            </div>
        </div>

    <?php endif; ?>
</div>

<script>
    function updateCart(cartId, change) {
        let input = document.getElementById('qty-' + cartId);
        let currentQty = parseInt(input.value);
        let newQty = currentQty + change;

        if (newQty >= 1) {
            input.value = newQty;
            // TODO: Tambahkan AJAX request di sini untuk update database secara realtime
            // agar saat di-refresh qty tidak kembali seperti semula.
        }
    }
</script>

<?= $this->endSection(); ?>