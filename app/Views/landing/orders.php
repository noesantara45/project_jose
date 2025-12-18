<?= $this->extend('landing/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="page-header-section">
    <div class="container">
        <h1 class="page-header-title">Pesanan Saya</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom justify-content-center">
                <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">History Pesanan</li>
            </ol>
        </nav>
        <div class="title-underline"></div>
    </div>
</div>

<div class="section-gap bg-light">
    <div class="container" style="max-width: 900px;">

        <div class="nav nav-pills nav-pills-custom justify-content-start justify-content-md-center">
            <a class="nav-link <?= $current_status == 'all' ? 'active' : '' ?>"
                href="<?= base_url('orders') ?>">Semua</a>
            <a class="nav-link <?= $current_status == 'pending' ? 'active' : '' ?>"
                href="<?= base_url('orders?status=pending') ?>">Belum Bayar</a>
            <a class="nav-link <?= $current_status == 'processing' ? 'active' : '' ?>"
                href="<?= base_url('orders?status=processing') ?>">Dikemas</a>
            <a class="nav-link <?= $current_status == 'shipped' ? 'active' : '' ?>"
                href="<?= base_url('orders?status=shipped') ?>">Dikirim</a>
            <a class="nav-link <?= $current_status == 'completed' ? 'active' : '' ?>"
                href="<?= base_url('orders?status=completed') ?>">Selesai</a>
        </div>

        <?php if (empty($orders)) : ?>
        <div class="text-center py-5">
            <i class="fas fa-shopping-bag fa-3x text-muted mb-3 opacity-50"></i>
            <h5>Belum ada pesanan</h5>
            <p class="text-muted">Yuk mulai belanja koleksi outfit terbaik kami.</p>
            <a href="<?= base_url('kategori') ?>" class="btn btn-dark mt-2">Belanja Sekarang</a>
        </div>
        <?php else : ?>

        <?php foreach ($orders as $o) : ?>
        <div class="order-card">
            <div class="order-header">
                <div class="d-flex align-items-center">
                    <i class="fas fa-receipt text-warning me-2"></i>
                    <span class="order-date"><?= date('d M Y', strtotime($o['created_at'])) ?></span>
                    <span class="text-muted mx-2 d-none d-sm-inline">|</span>
                    <span class="order-invoice d-none d-sm-inline"><?= $o['invoice_number'] ?></span>
                </div>

                <?php 
                            $badgeClass = 'status-pending';
                            $label = $o['order_status'];

                            switch($o['order_status']) {
                                case 'pending': $badgeClass = 'status-pending'; $label = 'Menunggu Pembayaran'; break;
                                case 'processing': $badgeClass = 'status-paid'; $label = 'Sedang Dikemas'; break;
                                case 'shipped': $badgeClass = 'status-shipped'; $label = 'Dalam Pengiriman'; break;
                                case 'completed': $badgeClass = 'status-completed'; $label = 'Selesai'; break;
                                case 'cancelled': $badgeClass = 'status-cancelled'; $label = 'Dibatalkan'; break;
                            }
                        ?>
                <span class="status-badge <?= $badgeClass ?>"><?= $label ?></span>
            </div>

            <div class="order-body">
                <div class="order-product-preview">
                    <?php 
                                $img = $o['preview_item']['image'] ?? 'default.jpg';
                                // Cek URL gambar (eksternal atau lokal)
                                $imgSrc = (strpos($img, 'http') === 0) ? $img : base_url('uploads/products/' . $img);
                            ?>
                    <img src="<?= $imgSrc ?>" alt="Product" class="order-thumb">

                    <div class="order-meta">
                        <h5><?= esc($o['preview_item']['product_name'] ?? 'Item Terhapus') ?></h5>
                        <?php if($o['more_items_count'] > 0): ?>
                        <p class="text-muted small">+ <?= $o['more_items_count'] ?> produk lainnya</p>
                        <?php else: ?>
                        <p class="text-muted small">x1 pcs</p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="order-total-section">
                    <span class="label-total">Total Belanja</span>
                    <span class="price-total">Rp <?= number_format($o['total_price'], 0, ',', '.') ?></span>
                </div>
            </div>

            <div class="order-footer">
                <?php if ($o['order_status'] == 'pending') : ?>
                <a href="<?= base_url('payment/' . $o['id']) ?>" class="btn-action-small btn-dark-custom">Bayar
                    Sekarang</a>

                <?php elseif ($o['order_status'] == 'shipped') : ?>
                <a href="<?= base_url('orders/confirm/' . $o['id']) ?>" class="btn-action-small btn-dark-custom"
                    onclick="return confirm('Yakin pesanan sudah diterima?')">Pesanan Diterima</a>

                <?php elseif ($o['order_status'] == 'completed') : ?>
                <a href="<?= base_url('kategori') ?>" class="btn-action-small btn-outline-custom">Beli Lagi</a>

                <?php endif; ?>

                <a href="<?= base_url('orders/detail/' . $o['id']) ?>"
                    class="btn-action-small btn-outline-custom ms-2">Detail</a>
            </div>
        </div>
        <?php endforeach; ?>

        <?php endif; ?>
    </div>
</div>

<?= $this->endSection(); ?>