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

    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="<?= getenv('MIDTRANS_CLIENT_KEY') ?>"></script>

    <style>
    /* ... (STYLE CSS ANDA TETAP SAMA SEPERTI FILE ASLI) ... */
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

    .card-custom {
        background: white;
        border: 1px solid var(--border-color);
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.02);
        transition: transform 0.2s ease;
    }

    .form-floating>.form-control {
        border-radius: 12px;
        border: 1px solid var(--border-color);
    }

    .form-floating>.form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 4px rgba(0, 0, 0, 0.05);
    }

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

    <header class="checkout-header">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="<?= base_url('/') ?>" class="brand-logo">HLOutfit<span class="text-primary">.</span></a>
            <div class="d-flex align-items-center text-muted small">
                <i class="fas fa-lock me-2 text-success"></i> Pembayaran Aman
            </div>
        </div>
    </header>

    <div class="container pb-5">

        <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('cart') ?>"
                        class="text-decoration-none text-muted">Keranjang</a></li>
                <li class="breadcrumb-item active fw-bold text-dark" aria-current="page">Pengiriman & Pembayaran</li>
            </ol>
        </nav>

        <form action="<?= base_url('checkout/process') ?>" method="post" id="checkout-form">
            <?= csrf_field() ?>
            <div class="row g-5">

                <div class="col-lg-7">
                    <div class="mb-5">
                        <h5 class="fw-bold mb-3">Alamat Pengiriman</h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="firstName" id="firstName"
                                        placeholder="Nama Depan" required value="<?= old('firstName') ?>">
                                    <label for="firstName">Nama Depan</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="lastName" id="lastName"
                                        placeholder="Nama Belakang" required value="<?= old('lastName') ?>">
                                    <label for="lastName">Nama Belakang</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="tel" class="form-control" name="phone" id="phone"
                                        placeholder="No. WhatsApp" required value="<?= old('phone') ?>">
                                    <label for="phone">Nomor WhatsApp</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="address" id="address"
                                        placeholder="Alamat Lengkap" required value="<?= old('address') ?>">
                                    <label for="address">Alamat Lengkap (Jalan, No. Rumah)</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" name="city" id="city" required>
                                        <option selected disabled value="">Pilih Kota...</option>
                                        <option value="Jakarta Selatan">Jakarta Selatan</option>
                                        <option value="Bandung">Bandung</option>
                                        <option value="Surabaya">Surabaya</option>
                                        <option value="Denpasar">Denpasar</option>
                                    </select>
                                    <label for="city">Kota / Kabupaten</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="zip" id="zip" placeholder="Kode Pos"
                                        required value="<?= old('zip') ?>">
                                    <label for="zip">Kode Pos</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-5">
                        <h5 class="fw-bold mb-3">Metode Pengiriman</h5>
                        <div class="d-flex flex-column gap-3">
                            <label class="selection-card">
                                <input type="radio" name="shippingMethod" value="reguler" checked>
                                <div class="selection-content">
                                    <div class="check-circle"></div>
                                    <div class="flex-grow-1">
                                        <h6 class="fw-bold mb-0">Reguler (JNE/SiCepat)</h6>
                                        <small class="text-muted">Estimasi 2-4 hari kerja</small>
                                    </div>
                                    <span class="fw-bold">Rp <?= number_format($shipping_cost, 0, ',', '.') ?></span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h5 class="fw-bold mb-3">Pembayaran</h5>
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i> Anda akan diarahkan ke pop-up pembayaran aman
                            (Midtrans) setelah klik tombol bayar. Bisa via QRIS, VA Bank, atau E-Wallet.
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="card card-custom border-0 p-4 sticky-summary">
                        <h5 class="fw-bold mb-4">Ringkasan Pesanan</h5>

                        <div class="checkout-items mb-4">
                            <?php if(!empty($cart_items)): ?>
                            <?php foreach ($cart_items as $item): ?>
                            <div class="d-flex align-items-center mb-3">
                                <div class="position-relative me-3">
                                    <img src="<?= base_url('uploads/products/' . ($item['image'] ?? 'default.jpg')) ?>"
                                        alt="<?= $item['name'] ?>" class="checkout-item-img">
                                    <span class="checkout-qty-badge"><?= $item['qty'] ?></span>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="fw-bold mb-0" style="font-size: 14px;"><?= $item['name'] ?></h6>
                                    <small class="text-muted" style="font-size: 12px;">Size:
                                        <?= $item['selected_size'] ?? '-' ?></small>
                                </div>
                                <div class="fw-bold" style="font-size: 14px;">
                                    Rp <?= number_format($item['price'] * $item['qty'], 0, ',', '.') ?>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <?php endif; ?>
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

                        <button type="submit" class="btn btn-checkout w-100 shadow-sm" id="pay-button">
                            BAYAR SEKARANG <i class="fas fa-arrow-right ms-2"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <?php if(isset($snapToken) && !empty($snapToken)): ?>
    <script type="text/javascript">
    // Jika ada token dari Controller, langsung buka popup
    window.snap.pay('<?= $snapToken ?>', {
        onSuccess: function(result) {
            alert("Pembayaran Berhasil!");
            window.location.href = "<?= base_url('profile') ?>"; // Redirect ke halaman history/profile
        },
        onPending: function(result) {
            alert("Menunggu pembayaran! Silakan selesaikan pembayaran Anda.");
            window.location.href = "<?= base_url('profile') ?>";
        },
        onError: function(result) {
            alert("Pembayaran gagal!");
        },
        onClose: function() {
            alert('Anda menutup popup tanpa menyelesaikan pembayaran');
        }
    });
    </script>
    <?php endif; ?>

</body>

</html>