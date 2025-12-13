<?= $this->extend('admin/layout/main') ?>

<?= $this->section('content') ?>

<!-- Stats Cards -->
<div class="stats-grid">
    <div class="stat-card earning">
        <div class="stat-info">
            <h3>Total Pendapatan</h3>
            <div class="stat-value">Rp <?= number_format($total_earning ?? 15000000, 0, ',', '.') ?></div>
        </div>
        <div class="stat-icon">
            <i class="fas fa-dollar-sign"></i>
        </div>
    </div>

    <div class="stat-card orders">
        <div class="stat-info">
            <h3>Total Order</h3>
            <div class="stat-value"><?= $total_orders ?? 128 ?></div>
        </div>
        <div class="stat-icon">
            <i class="fas fa-shopping-cart"></i>
        </div>
    </div>

    <div class="stat-card products">
        <div class="stat-info">
            <h3>Total Produk</h3>
            <div class="stat-value"><?= $total_products ?? 45 ?></div>
        </div>
        <div class="stat-icon">
            <i class="fas fa-box"></i>
        </div>
    </div>

    <div class="stat-card users">
        <div class="stat-info">
            <h3>Total User</h3>
            <div class="stat-value"><?= $total_users ?? 234 ?></div>
        </div>
        <div class="stat-icon">
            <i class="fas fa-users"></i>
        </div>
    </div>
</div>

<!-- Recent Orders -->
<div class="table-container">
    <div class="table-header">
        <h2>Order Terbaru</h2>
        <a href="<?= base_url('admin/orders') ?>" class="btn btn-primary btn-sm">
            <i class="fas fa-eye"></i> Lihat Semua
        </a>
    </div>

    <table class="data-table">
        <thead>
            <tr>
                <th>Invoice</th>
                <th>Customer</th>
                <th>Total</th>
                <th>Status Pembayaran</th>
                <th>Status Order</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>INV-2025001</strong></td>
                <td>Budi Santoso</td>
                <td>Rp 15.000.000</td>
                <td><span class="badge badge-success">Paid</span></td>
                <td><span class="badge badge-info">Processing</span></td>
                <td>13 Des 2025</td>
            </tr>
            <tr>
                <td><strong>INV-2025002</strong></td>
                <td>Siti Nurhaliza</td>
                <td>Rp 150.000</td>
                <td><span class="badge badge-warning">Pending</span></td>
                <td><span class="badge badge-warning">Pending</span></td>
                <td>13 Des 2025</td>
            </tr>
            <tr>
                <td><strong>INV-2025003</strong></td>
                <td>Ahmad Dahlan</td>
                <td>Rp 300.000</td>
                <td><span class="badge badge-success">Paid</span></td>
                <td><span class="badge badge-success">Completed</span></td>
                <td>12 Des 2025</td>
            </tr>
            <tr>
                <td><strong>INV-2025004</strong></td>
                <td>Dewi Lestari</td>
                <td>Rp 450.000</td>
                <td><span class="badge badge-danger">Failed</span></td>
                <td><span class="badge badge-danger">Cancelled</span></td>
                <td>12 Des 2025</td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Top Products -->
<div class="table-container">
    <div class="table-header">
        <h2>Produk Terlaris</h2>
        <a href="<?= base_url('admin/products') ?>" class="btn btn-primary btn-sm">
            <i class="fas fa-eye"></i> Lihat Semua
        </a>
    </div>

    <table class="data-table">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Terjual</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>Laptop Gaming Asus</strong></td>
                <td>Elektronik</td>
                <td>Rp 15.000.000</td>
                <td>5</td>
                <td>23</td>
            </tr>
            <tr>
                <td><strong>Kemeja Flannel</strong></td>
                <td>Fashion Pria</td>
                <td>Rp 150.000</td>
                <td>20</td>
                <td>45</td>
            </tr>
            <tr>
                <td><strong>Sepatu Sneakers</strong></td>
                <td>Fashion Pria</td>
                <td>Rp 350.000</td>
                <td>15</td>
                <td>38</td>
            </tr>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>