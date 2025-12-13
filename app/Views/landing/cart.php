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
                <div class="cart-item-box empty-cart">
                    <div>
                        <i class="fas fa-shopping-basket empty-icon"></i>
                        <h4>Tas Belanja Kosong</h4>
                        <p class="text-muted">Sepertinya kamu belum menambahkan apapun.</p>
                        <a href="<?= base_url('produk') ?>" class="btn btn-dark rounded-pill px-4 mt-3">Mulai Belanja</a>
                    </div>
                </div>
            <?php else: ?>

                <?php $total_belanja = 0; ?>
                <?php foreach ($cart_items as $item):
                    $subtotal = $item['price'] * $item['qty'];
                    $total_belanja += $subtotal;
                ?>
                    <div class="cart-item-box" id="row-<?= $item['id'] ?>">

                        <div class="cart-img-wrap">
                            <img src="<?= $item['img'] ?>" class="cart-img" alt="Produk">
                        </div>

                        <div class="cart-info">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <a href="#" class="cart-prod-name"><?= $item['name'] ?></a>
                                    <div class="cart-prod-variant">Warna: <?= $item['color'] ?>, Ukuran: <?= $item['size'] ?>
                                    </div>
                                </div>
                            </div>

                            <div class="cart-prod-price" data-price="<?= $item['price'] ?>">
                                Rp <?= number_format($item['price'], 0, ',', '.') ?>
                            </div>

                            <div class="qty-control">
                                <button class="qty-btn" onclick="updateCart(<?= $item['id'] ?>, -1)">-</button>
                                <input type="text" class="qty-input" id="qty-<?= $item['id'] ?>" value="<?= $item['qty'] ?>"
                                    readonly>
                                <button class="qty-btn" onclick="updateCart(<?= $item['id'] ?>, 1)">+</button>
                            </div>
                        </div>

                        <button class="btn-remove" onclick="removeItem(<?= $item['id'] ?>)" title="Hapus Item">
                            <i class="far fa-trash-alt fa-lg"></i>
                        </button>
                    </div>
                <?php endforeach; ?>

            <?php endif; ?>

            <div class="alert alert-light border mt-3 d-flex align-items-center gap-3">
                <i class="fas fa-truck text-primary fs-4"></i>
                <div class="small text-muted">
                    <strong>Gratis Ongkir</strong> untuk pesanan di atas Rp 300.000. Tambah sedikit lagi!
                </div>
            </div>

        </div>

        <div class="col-lg-4 animate-up delay-2">
            <div class="summary-card">
                <h5 class="fw-bold mb-4">Ringkasan Pesanan</h5>

                <div class="summary-row">
                    <span>Subtotal Barang</span>
                    <span id="subtotal-val">Rp <?= number_format($total_belanja, 0, ',', '.') ?></span>
                </div>
                <div class="summary-row">
                    <span>Ongkos Kirim</span>
                    <span class="text-success">Gratis</span>
                </div>
                <div class="summary-row">
                    <span>Pajak (11%)</span>
                    <span>Termasuk</span>
                </div>

                <div class="input-group mt-4 mb-3">
                    <input type="text" class="form-control form-control-sm" placeholder="Kode Voucher">
                    <button class="btn btn-outline-dark btn-sm">Gunakan</button>
                </div>

                <div class="summary-total">
                    <span>Total Belanja</span>
                    <span id="total-val" class="text-primary">Rp
                        <?= number_format($total_belanja, 0, ',', '.') ?></span>
                </div>

                <a href="login" class="btn-checkout d-block text-center text-decoration-none">
                    Lanjut ke Checkout
                </a>

                <div class="text-center mt-3">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Visa_Inc._logo.svg/2560px-Visa_Inc._logo.svg.png"
                        height="20" class="mx-1 opacity-50">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b7/MasterCard_Logo.svg/1200px-MasterCard_Logo.svg.png"
                        height="20" class="mx-1 opacity-50">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/8/86/Gopay_logo.svg" height="20"
                        class="mx-1 opacity-50">
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    function updateCart(id, change) {
        let input = document.getElementById('qty-' + id);
        let currentQty = parseInt(input.value);
        let newQty = currentQty + change;

        if (newQty >= 1) {
            input.value = newQty;
            recalculateTotal();
        }
    }

    function removeItem(id) {
        if (confirm('Yakin ingin menghapus item ini dari keranjang?')) {
            document.getElementById('row-' + id).remove();
            recalculateTotal();
            // Di sistem asli, disini Anda akan memanggil AJAX ke Controller untuk hapus data di session/db
        }
    }

    function recalculateTotal() {
        let total = 0;
        let items = document.querySelectorAll('.cart-item-box');

        items.forEach(item => {
            let priceText = item.querySelector('.cart-prod-price').dataset.price;
            let qty = item.querySelector('.qty-input').value;
            total += parseInt(priceText) * parseInt(qty);
        });

        // Format Rupiah JS
        let formatted = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(total);

        // Update Tampilan
        document.getElementById('subtotal-val').innerText = formatted;
        document.getElementById('total-val').innerText = formatted;

        // Jika kosong
        if (items.length === 0) {
            location.reload(); // Refresh halaman agar masuk ke state "Kosong" (karena PHP handle view kosong)
        }
    }
</script>

<?= $this->endSection(); ?>