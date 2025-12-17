<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Checkout - HLOutfit' ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --primary-color: #111;
            --accent-color: #3b82f6;
            --bg-color: #f8f9fa;
            --border-color: #e5e7eb;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-color);
            color: #333;
        }

        /* Distraction-Free Header */
        .checkout-header {
            background: white;
            padding: 20px 0;
            border-bottom: 1px solid var(--border-color);
            margin-bottom: 40px;
        }

        .brand-logo {
            font-size: 24px;
            font-weight: 800;
            letter-spacing: -0.5px;
            color: var(--primary-color);
            text-decoration: none;
        }

        /* Cards */
        .card-custom {
            background: white;
            border: 1px solid var(--border-color);
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.02);
            transition: transform 0.2s ease;
        }

        /* Form Inputs */
        .form-floating>.form-control {
            border-radius: 12px;
            border: 1px solid var(--border-color);
        }

        .form-floating>.form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(0, 0, 0, 0.05);
        }

        /* Selection Cards (Shipping & Payment) */
        .selection-card {
            position: relative;
            cursor: pointer;
        }

        .selection-card input[type="radio"] {
            position: absolute;
            opacity: 0;
        }

        .selection-content {
            display: flex;
            align-items: center;
            padding: 16px;
            border: 2px solid var(--border-color);
            border-radius: 12px;
            background: white;
            transition: all 0.2s ease;
        }

        /* State ketika radio button dipilih */
        .selection-card input[type="radio"]:checked+.selection-content {
            border-color: var(--primary-color);
            background-color: #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .check-circle {
            width: 20px;
            height: 20px;
            border: 2px solid #ddd;
            border-radius: 50%;
            margin-right: 15px;
            position: relative;
            flex-shrink: 0;
        }

        .selection-card input[type="radio"]:checked+.selection-content .check-circle {
            border-color: var(--primary-color);
            background: var(--primary-color);
        }

        .selection-card input[type="radio"]:checked+.selection-content .check-circle::after {
            content: '\f00c';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            color: white;
            font-size: 10px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        /* Sticky Summary */
        .sticky-summary {
            position: sticky;
            top: 30px;
        }

        .checkout-item-img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 10px;
            border: 1px solid #eee;
        }

        .checkout-qty-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background: var(--primary-color);
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-checkout {
            background-color: var(--primary-color);
            color: white;
            padding: 16px;
            border-radius: 12px;
            font-weight: 700;
            transition: all 0.3s;
        }

        .btn-checkout:hover {
            background-color: #333;
            transform: translateY(-2px);
            color: white;
        }
    </style>
</head>

<body>

    <?php
    // --- DATA DUMMY (Tidak Berubah) ---
    $cart_items = [
        ['name' => 'Urban Bomber Jacket', 'variant' => 'Hitam, L', 'price' => 350000, 'qty' => 1, 'img' => 'https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=150&q=80'],
        ['name' => 'Basic Cotton Tee', 'variant' => 'Putih, M', 'price' => 85000, 'qty' => 2, 'img' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=150&q=80']
    ];
    $subtotal = 0;
    foreach ($cart_items as $item) $subtotal += ($item['price'] * $item['qty']);
    $shipping_cost = 20000;
    $tax = $subtotal * 0.01;
    $total = $subtotal + $shipping_cost + $tax;
    ?>

    <header class="checkout-header">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="<?= base_url('/') ?>" class="brand-logo">HLOutfit<span class="text-primary">.</span></a>
            <div class="d-flex align-items-center text-muted small">
                <i class="fas fa-lock me-2 text-success"></i> Pembayaran Aman
            </div>
        </div>
    </header>

    <div class="container pb-5">

        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('cart') ?>"
                        class="text-decoration-none text-muted">Keranjang</a></li>
                <li class="breadcrumb-item active fw-bold text-dark" aria-current="page">Pengiriman & Pembayaran</li>
            </ol>
        </nav>

        <form action="<?= base_url('checkout/process') ?>" method="post">
            <div class="row g-5">

                <div class="col-lg-7">

                    <div class="mb-5">
                        <h5 class="fw-bold mb-3">Alamat Pengiriman</h5>
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
                                    <input type="tel" class="form-control" id="phone" placeholder="No. WhatsApp"
                                        required>
                                    <label for="phone">Nomor WhatsApp</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="address" placeholder="Alamat Lengkap"
                                        required>
                                    <label for="address">Alamat Lengkap (Jalan, No. Rumah)</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" id="city" required>
                                        <option selected disabled value="">Pilih Kota...</option>
                                        <option>Jakarta Selatan</option>
                                        <option>Bandung</option>
                                        <option>Surabaya</option>
                                        <option>Denpasar</option>
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
                        <h5 class="fw-bold mb-3">Metode Pengiriman</h5>
                        <div class="d-flex flex-column gap-3">
                            <label class="selection-card">
                                <input type="radio" name="shippingMethod" checked>
                                <div class="selection-content">
                                    <div class="check-circle"></div>
                                    <div class="flex-grow-1">
                                        <h6 class="fw-bold mb-0">Reguler (JNE/SiCepat)</h6>
                                        <small class="text-muted">Estimasi 2-4 hari kerja</small>
                                    </div>
                                    <span class="fw-bold">Rp 20.000</span>
                                </div>
                            </label>

                            <label class="selection-card">
                                <input type="radio" name="shippingMethod">
                                <div class="selection-content">
                                    <div class="check-circle"></div>
                                    <div class="flex-grow-1">
                                        <h6 class="fw-bold mb-0">Next Day (JNE YES)</h6>
                                        <small class="text-muted">Estimasi 1 hari kerja</small>
                                    </div>
                                    <span class="fw-bold">Rp 45.000</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h5 class="fw-bold mb-3">Metode Pembayaran</h5>
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="selection-card">
                                    <input type="radio" name="paymentMethod" checked>
                                    <div class="selection-content">
                                        <div class="check-circle"></div>
                                        <div class="d-flex align-items-center flex-grow-1">
                                            <i class="fas fa-university fa-lg me-3 text-primary" style="width:25px"></i>
                                            <div>
                                                <h6 class="fw-bold mb-0">Transfer Bank</h6>
                                                <small class="text-muted">BCA, Mandiri, BRI (Cek Otomatis)</small>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="col-12">
                                <label class="selection-card">
                                    <input type="radio" name="paymentMethod">
                                    <div class="selection-content">
                                        <div class="check-circle"></div>
                                        <div class="d-flex align-items-center flex-grow-1">
                                            <i class="fas fa-qrcode fa-lg me-3 text-success" style="width:25px"></i>
                                            <div>
                                                <h6 class="fw-bold mb-0">QRIS / E-Wallet</h6>
                                                <small class="text-muted">Gopay, OVO, ShopeePay</small>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="col-12">
                                <label class="selection-card">
                                    <input type="radio" name="paymentMethod">
                                    <div class="selection-content">
                                        <div class="check-circle"></div>
                                        <div class="d-flex align-items-center flex-grow-1">
                                            <i class="fas fa-hand-holding-dollar fa-lg me-3 text-warning"
                                                style="width:25px"></i>
                                            <div>
                                                <h6 class="fw-bold mb-0">COD (Bayar di Tempat)</h6>
                                                <small class="text-muted">Bayar tunai saat kurir datang</small>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="card card-custom border-0 p-4 sticky-summary">
                        <h5 class="fw-bold mb-4">Ringkasan Pesanan</h5>

                        <div class="checkout-items mb-4">
                            <?php foreach ($cart_items as $item): ?>
                                <div class="d-flex align-items-center mb-3">
                                    <div class="position-relative me-3">
                                        <img src="<?= $item['img'] ?>" alt="<?= $item['name'] ?>" class="checkout-item-img">
                                        <span class="checkout-qty-badge"><?= $item['qty'] ?></span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="fw-bold mb-0" style="font-size: 14px;"><?= $item['name'] ?></h6>
                                        <small class="text-muted" style="font-size: 12px;"><?= $item['variant'] ?></small>
                                    </div>
                                    <div class="fw-bold" style="font-size: 14px;">
                                        Rp <?= number_format($item['price'] * $item['qty'], 0, ',', '.') ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <hr class="my-4 border-secondary opacity-25">

                        <div class="d-flex justify-content-between mb-2 small">
                            <span class="text-muted">Subtotal Produk</span>
                            <span class="fw-bold">Rp <?= number_format($subtotal, 0, ',', '.') ?></span>
                        </div>
                        <div class="d-flex justify-content-between mb-2 small">
                            <span class="text-muted">Biaya Pengiriman</span>
                            <span class="fw-bold">Rp <?= number_format($shipping_cost, 0, ',', '.') ?></span>
                        </div>
                        <div class="d-flex justify-content-between mb-3 small">
                            <span class="text-muted">Pajak & Biaya Layanan</span>
                            <span>Rp <?= number_format($tax, 0, ',', '.') ?></span>
                        </div>

                        <hr class="my-4 border-secondary opacity-25">

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h6 class="fw-bold mb-0">Total Tagihan</h6>
                            <h4 class="fw-bold text-primary mb-0">Rp <?= number_format($total, 0, ',', '.') ?></h4>
                        </div>

                        <button type="submit" class="btn btn-checkout w-100 shadow-sm">
                            BAYAR SEKARANG <i class="fas fa-arrow-right ms-2"></i>
                        </button>

                        <div class="text-center mt-3">
                            <small class="text-muted" style="font-size: 11px;">
                                Dengan mengklik tombol di atas, Anda menyetujui <a href="#" class="text-dark">Syarat &
                                    Ketentuan</a> kami.
                            </small>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>

</body>

</html>