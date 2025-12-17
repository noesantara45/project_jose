<?= $this->extend('admin/layout/main') ?>

<?= $this->section('content') ?>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon" style="background: rgba(52, 152, 219, 0.1); color: #3498db;">
            <i class="fas fa-shopping-cart"></i>
        </div>
        <div class="stat-info">
            <h3><?= number_format($total_orders) ?></h3>
            <p>Total Pesanan</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon" style="background: rgba(46, 204, 113, 0.1); color: #2ecc71;">
            <i class="fas fa-box"></i>
        </div>
        <div class="stat-info">
            <h3><?= number_format($total_products) ?></h3>
            <p>Total Produk</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon" style="background: rgba(155, 89, 182, 0.1); color: #9b59b6;">
            <i class="fas fa-users"></i>
        </div>
        <div class="stat-info">
            <h3><?= number_format($total_users) ?></h3>
            <p>Pelanggan</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon" style="background: rgba(241, 196, 15, 0.1); color: #f1c40f;">
            <i class="fas fa-wallet"></i>
        </div>
        <div class="stat-info">
            <h3>Rp <?= number_format($total_earning, 0, ',', '.') ?></h3>
            <p>Pendapatan Bersih</p>
        </div>
    </div>
</div>

<div class="dashboard-grid-2">

    <div class="content-card">
        <div class="card-header">
            <h3><i class="fas fa-clock me-2"></i> Pesanan Terbaru</h3>
            <a href="<?= base_url('admin/orders') ?>" class="btn-sm btn-link">Lihat Semua</a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Invoice</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($recent_orders)): ?>
                    <tr>
                        <td colspan="5" class="text-center text-muted">Belum ada pesanan masuk.</td>
                    </tr>
                    <?php else: ?>
                    <?php foreach($recent_orders as $order): ?>
                    <tr>
                        <td class="fw-bold text-primary">#<?= $order['invoice_number'] ?></td>
                        <td><?= date('d M Y', strtotime($order['created_at'])) ?></td>
                        <td class="fw-bold">Rp <?= number_format($order['total_price'], 0, ',', '.') ?></td>
                        <td>
                            <?php 
                                    $statusColor = 'secondary';
                                    if($order['order_status'] == 'pending') $statusColor = 'warning';
                                    elseif($order['order_status'] == 'processing') $statusColor = 'info';
                                    elseif($order['order_status'] == 'shipped') $statusColor = 'primary';
                                    elseif($order['order_status'] == 'completed') $statusColor = 'success';
                                    elseif($order['order_status'] == 'cancelled') $statusColor = 'danger';
                                ?>
                            <span class="badge bg-<?= $statusColor ?>"><?= strtoupper($order['order_status']) ?></span>
                        </td>
                        <td>
                            <a href="<?= base_url('admin/orders/detail/' . $order['id']) ?>" class="btn-action"
                                title="Lihat Detail">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="content-card">
        <div class="card-header">
            <h3><i class="fas fa-fire me-2 text-danger"></i> Produk Terlaris</h3>
        </div>
        <div class="top-products-list">
            <?php if(empty($top_products)): ?>
            <div class="text-center text-muted py-4">Belum ada data penjualan.</div>
            <?php else: ?>
            <?php foreach($top_products as $index => $prod): ?>
            <div class="top-product-item">
                <div class="rank-badge"><?= $index + 1 ?></div>
                <div class="prod-details">
                    <h4 class="text-truncate" style="max-width: 200px;"><?= esc($prod['product_name']) ?></h4>
                    <small class="text-muted"><?= esc($prod['category_name']) ?> | Stok: <?= $prod['stock'] ?></small>
                </div>
                <div class="prod-stats text-end">
                    <span class="d-block fw-bold text-success"><?= $prod['total_sold'] ?> Terjual</span>
                    <small class="text-muted">Rp <?= number_format($prod['price'], 0, ',', '.') ?></small>
                </div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

</div>

<style>
/* Layout Grid Utama */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
}

/* Kartu Statistik */
.stat-card {
    background: white;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    display: flex;
    align-items: center;
    gap: 20px;
    transition: transform 0.2s;
}

.stat-card:hover {
    transform: translateY(-5px);
}

.stat-icon {
    width: 60px;
    height: 60px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
}

.stat-info h3 {
    margin: 0;
    font-size: 24px;
    font-weight: 700;
    color: #2c3e50;
}

.stat-info p {
    margin: 5px 0 0;
    color: #7f8c8d;
    font-size: 14px;
}

/* Layout Grid Sekunder (Tabel & Top Product) */
.dashboard-grid-2 {
    display: grid;
    grid-template-columns: 2fr 1fr;
    /* Kiri lebih lebar */
    gap: 20px;
}

@media (max-width: 991px) {
    .dashboard-grid-2 {
        grid-template-columns: 1fr;
    }
}

/* Content Card Generic */
.content-card {
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    padding: 20px;
    height: 100%;
}

.card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    border-bottom: 1px solid #f0f0f0;
    padding-bottom: 15px;
}

.card-header h3 {
    margin: 0;
    font-size: 18px;
    font-weight: 600;
}

/* Table Styles */
.table {
    width: 100%;
    border-collapse: collapse;
}

.table th {
    text-align: left;
    padding: 12px;
    font-size: 13px;
    color: #7f8c8d;
    font-weight: 600;
    background: #f8f9fa;
}

.table td {
    padding: 12px;
    border-bottom: 1px solid #f0f0f0;
    font-size: 14px;
    vertical-align: middle;
}

.badge {
    padding: 5px 10px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
    color: white;
}

.bg-warning {
    background-color: #f39c12;
}

.bg-info {
    background-color: #3498db;
}

.bg-primary {
    background-color: #2980b9;
}

.bg-success {
    background-color: #2ecc71;
}

.bg-danger {
    background-color: #e74c3c;
}

.bg-secondary {
    background-color: #95a5a6;
}

.btn-action {
    color: #3498db;
    background: rgba(52, 152, 219, 0.1);
    width: 30px;
    height: 30px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 6px;
    text-decoration: none;
    transition: all 0.2s;
}

.btn-action:hover {
    background: #3498db;
    color: white;
}

/* Top Product List */
.top-product-item {
    display: flex;
    align-items: center;
    padding: 15px 0;
    border-bottom: 1px solid #f0f0f0;
}

.top-product-item:last-child {
    border-bottom: none;
}

.rank-badge {
    width: 30px;
    height: 30px;
    background: #f8f9fa;
    color: #2c3e50;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    margin-right: 15px;
    font-size: 14px;
}

.top-product-item:nth-child(1) .rank-badge {
    background: #ffd700;
    color: #b48902;
}

/* Emas */
.top-product-item:nth-child(2) .rank-badge {
    background: #c0c0c0;
    color: #555;
}

/* Perak */
.top-product-item:nth-child(3) .rank-badge {
    background: #cd7f32;
    color: #7a4618;
}

/* Perunggu */

.prod-details {
    flex-grow: 1;
}

.prod-details h4 {
    margin: 0 0 5px;
    font-size: 14px;
    color: #2c3e50;
}

.prod-details small {
    font-size: 12px;
}
</style>

<?= $this->endSection() ?>