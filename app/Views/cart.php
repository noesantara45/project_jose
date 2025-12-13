<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<style>
/* Styling Khusus Cart ala Zalora */
body {
    background-color: #f5f5f5;
}

/* Background abu muda agar konten pop-up */

.cart-header {
    margin-bottom: 20px;
    padding-top: 50px;
}

/* Box Item Keranjang */
.cart-item-box {
    background: #fff;
    border-radius: 8px;
    padding: 20px;
    margin-bottom: 15px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.03);
    display: flex;
    gap: 20px;
    align-items: flex-start;
    position: relative;
}

/* Gambar Produk */
.cart-img-wrap {
    width: 100px;
    flex-shrink: 0;
    border-radius: 6px;
    overflow: hidden;
    background: #f9f9f9;
    aspect-ratio: 3/4;
}

.cart-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Info Produk */
.cart-info {
    flex-grow: 1;
}

.cart-prod-name {
    font-weight: 600;
    color: #333;
    font-size: 15px;
    margin-bottom: 5px;
    text-decoration: none;
    display: block;
}

.cart-prod-variant {
    color: #888;
    font-size: 13px;
    margin-bottom: 10px;
}

.cart-prod-price {
    font-weight: 700;
    color: #000;
    font-size: 16px;
}

/* Kontrol Kuantitas (+ -) */
.qty-control {
    display: flex;
    align-items: center;
    border: 1px solid #ddd;
    border-radius: 4px;
    width: fit-content;
    margin-top: 10px;
}

.qty-btn {
    background: #fff;
    border: none;
    width: 30px;
    height: 30px;
    font-weight: 700;
    cursor: pointer;
    color: #555;
}

.qty-btn:hover {
    background: #f0f0f0;
}

.qty-input {
    width: 40px;
    text-align: center;
    border: none;
    border-left: 1px solid #ddd;
    border-right: 1px solid #ddd;
    font-size: 13px;
    font-weight: 600;
}

/* Tombol Hapus (Sampah) */
.btn-remove {
    position: absolute;
    top: 20px;
    right: 20px;
    color: #aaa;
    background: none;
    border: none;
    cursor: pointer;
    transition: 0.2s;
}

.btn-remove:hover {
    color: #d32f2f;
}

/* Ringkasan Pesanan (Sticky Kanan) */
.summary-card {
    background: #fff;
    padding: 25px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    position: sticky;
    top: 100px;
}

.summary-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 15px;
    font-size: 14px;
    color: #555;
}

.summary-total {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
    padding-top: 20px;
    border-top: 1px dashed #ddd;
    font-weight: 700;
    font-size: 18px;
    color: #000;
}

.btn-checkout {
    background: #000;
    color: #fff;
    width: 100%;
    padding: 15px;
    font-weight: 700;
    border: none;
    border-radius: 8px;
    margin-top: 25px;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: 0.3s;
}

.btn-checkout:hover {
    background: #333;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

/* Empty Cart State */
.empty-cart {
    text-align: center;
    padding: 60px 0;
}

.empty-icon {
    font-size: 60px;
    color: #ddd;
    margin-bottom: 20px;
}
</style>

<div class="container py-5">

    <div class="cart-header animate-up">
        <h2 class="fw-bold">Tas Belanja <span class="text-muted fs-5 fw-normal">(<?= count($cart_items) ?> Item)</span>
        </h2>
    </div>

    <div class="row g-4">

        <div class="col-lg-8 animate-up delay-1">

            <?php if(empty($cart_items)): ?>
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
            <?php foreach($cart_items as $item): 
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