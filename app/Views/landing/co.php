<?= $this->extend('landing/layout/template'); ?>

<?= $this->section('content'); ?>

<?php
// --- DATA DUMMY KERANJANG (Ganti dengan data riil dari database/session nanti) ---
$cart_items = [
    [
        'name' => 'Urban Bomber Jacket',
        'variant' => 'Hitam, L',
        'price' => 350000,
        'qty' => 1,
        'img' => 'https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=150&q=80'
    ],
    [
        'name' => 'Basic Cotton Tee',
        'variant' => 'Putih, M',
        'price' => 85000,
        'qty' => 2,
        'img' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=150&q=80'
    ]
];

// Hitung total dummy
$subtotal = 0;
foreach ($cart_items as $item) {
    $subtotal += ($item['price'] * $item['qty']);
}
$shipping_cost = 20000; // Contoh ongkir
$tax = $subtotal * 0.01; // Contoh pajak 1%
$total = $subtotal + $shipping_cost + $tax;
?>

<section class="page-header-section animate-up">
    <div class="container">
        <h1 class="display-5 page-header-title">Checkout</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom justify-content-center">
                <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('cart') ?>">Keranjang</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </nav>
    </div>
</section>

<section class="section-gap pt-0 animate-up delay-1">
    <div class="container">
        <form action="<?= base_url('checkout/process') ?>" method="post">
            <div class="row g-5">

                <div class="col-lg-8">

                    <div class="mb-5">
                        <h4 class="fw-bold mb-4">Informasi Pengiriman</h4>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="firstName" placeholder="Nama Depan"
                                        required>
                                    <label for="firstName">Nama Depan</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="lastName" placeholder="Nama Belakang"
                                        required>
                                    <label for="lastName">Nama Belakang</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" placeholder="Alamat Email"
                                        required>
                                    <label for="email">Alamat Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="tel" class="form-control" id="phone" placeholder="Nomor Telepon"
                                        required>
                                    <label for="phone">Nomor Telepon (WhatsApp)</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Alamat Lengkap" id="address"
                                        style="height: 100px" required></textarea>
                                    <label for="address">Alamat Lengkap</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" id="city" required>
                                        <option selected disabled value="">Pilih Kota...</option>
                                        <option>Jakarta Selatan</option>
                                        <option>Bandung</option>
                                        <option>Surabaya</option>
                                    </select>
                                    <label for="city">Kota / Kabupaten</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="zip" placeholder="Kode Pos" required>
                                    <label for="zip">Kode Pos</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-5">
                        <h4 class="fw-bold mb-4">Metode Pengiriman</h4>
                        <div class="d-flex flex-column gap-3">
                            <label class="card card-custom p-3 cursor-pointer card-body-custom border-2"
                                style="cursor: pointer;">
                                <div class="d-flex align-items-center">
                                    <input class="form-check-input me-3 mt-0" type="radio" name="shippingMethod"
                                        id="shipStandard" checked>
                                    <div class="flex-grow-1">
                                        <h6 class="fw-bold mb-1">Reguler (JNE/SiCepat)</h6>
                                        <small class="text-muted">Estimasi 2-4 hari kerja</small>
                                    </div>
                                    <span class="fw-bold">Rp 20.000</span>
                                </div>
                            </label>
                            <label class="card card-custom p-3 cursor-pointer card-body-custom"
                                style="cursor: pointer;">
                                <div class="d-flex align-items-center">
                                    <input class="form-check-input me-3 mt-0" type="radio" name="shippingMethod"
                                        id="shipExpress">
                                    <div class="flex-grow-1">
                                        <h6 class="fw-bold mb-1">Next Day (JNE YES)</h6>
                                        <small class="text-muted">Estimasi 1 hari kerja</small>
                                    </div>
                                    <span class="fw-bold">Rp 45.000</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h4 class="fw-bold mb-4">Pembayaran</h4>
                        <div class="d-flex flex-column gap-2">
                            <label class="card card-custom p-3 card-body-custom" style="cursor: pointer;">
                                <div class="d-flex align-items-center">
                                    <input class="form-check-input me-3 mt-0" type="radio" name="paymentMethod"
                                        id="payTransfer" checked>
                                    <div class="flex-grow-1">
                                        <h6 class="fw-bold mb-0"><i
                                                class="fas fa-university me-2 text-primary"></i>Transfer Bank
                                            (BCA/Mandiri)</h6>
                                    </div>
                                </div>
                            </label>
                            <label class="card card-custom p-3 card-body-custom" style="cursor: pointer;">
                                <div class="d-flex align-items-center">
                                    <input class="form-check-input me-3 mt-0" type="radio" name="paymentMethod"
                                        id="payEwallet">
                                    <div class="flex-grow-1">
                                        <h6 class="fw-bold mb-0"><i class="fas fa-wallet me-2 text-success"></i>E-Wallet
                                            (Gopay/OVO/ShopeePay)</h6>
                                    </div>
                                </div>
                            </label>
                            <label class="card card-custom p-3 card-body-custom" style="cursor: pointer;">
                                <div class="d-flex align-items-center">
                                    <input class="form-check-input me-3 mt-0" type="radio" name="paymentMethod"
                                        id="payCod">
                                    <div class="flex-grow-1">
                                        <h6 class="fw-bold mb-0"><i
                                                class="fas fa-hand-holding-usd me-2 text-warning"></i>Cash On Delivery
                                            (COD)</h6>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>

                </div>

                <div class="col-lg-4">
                    <div class="card card-custom border-0 shadow-sm sticky-summary">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-4">Ringkasan Pesanan</h5>

                            <div class="checkout-items mb-4 overflow-auto" style="max-height: 300px;">
                                <?php foreach ($cart_items as $item): ?>
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="position-relative me-3">
                                            <img src="<?= $item['img'] ?>" alt="<?= $item['name'] ?>"
                                                class="checkout-item-img">
                                            <span class="checkout-qty-badge"><?= $item['qty'] ?></span>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="fw-bold mb-0" style="font-size: 14px;"><?= $item['name'] ?></h6>
                                            <small class="text-muted"
                                                style="font-size: 12px;"><?= $item['variant'] ?></small>
                                        </div>
                                        <div class="fw-bold" style="font-size: 14px;">
                                            Rp <?= number_format($item['price'] * $item['qty'], 0, ',', '.') ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <div class="input-group mb-4">
                                <input type="text" class="form-control" placeholder="Kode Voucher">
                                <button class="btn btn-dark" type="button">Gunakan</button>
                            </div>

                            <hr class="my-4">

                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Subtotal</span>
                                <span class="fw-bold">Rp <?= number_format($subtotal, 0, ',', '.') ?></span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Pengiriman</span>
                                <span class="fw-bold">Rp <?= number_format($shipping_cost, 0, ',', '.') ?></span>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span class="text-muted">Pajak (1%)</span>
                                <span>Rp <?= number_format($tax, 0, ',', '.') ?></span>
                            </div>

                            <hr class="my-4">

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h5 class="fw-bold mb-0">Total</h5>
                                <h4 class="fw-bold text-primary mb-0">Rp <?= number_format($total, 0, ',', '.') ?></h4>
                            </div>

                            <button type="submit" class="btn btn-dark w-100 py-3 fw-bold rounded-pill hover-scale">
                                BUAT PESANAN SEKARANG <i class="fas fa-arrow-right ms-2"></i>
                            </button>
                            <p class="text-center text-muted small mt-3 mb-0">
                                <i class="fas fa-lock me-1"></i> Semua transaksi aman dan terenkripsi.
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<?= $this->endSection(); ?>