<?= $this->extend('admin/layout/main') ?>

<?= $this->section('content') ?>

<div class="stats-grid">
    <div class="stat-card earning">
        <div class="stat-info">
            <h3>Total Pendapatan</h3>
            <div class="stat-value">Rp <?= number_format($total_earning, 0, ',', '.') ?></div>
        </div>
        <div class="stat-icon">
            <i class="fas fa-dollar-sign"></i>
        </div>
    </div>

    <div class="stat-card orders">
        <div class="stat-info">
            <h3>Total Order</h3>
            <div class="stat-value"><?= number_format($total_orders) ?></div>
        </div>
        <div class="stat-icon">
            <i class="fas fa-shopping-cart"></i>
        </div>
    </div>

    <div class="stat-card products">
        <div class="stat-info">
            <h3>Total Produk</h3>
            <div class="stat-value"><?= number_format($total_products) ?></div>
        </div>
        <div class="stat-icon">
            <i class="fas fa-box"></i>
        </div>
    </div>

    <div class="stat-card users">
        <div class="stat-info">
            <h3>Total User</h3>
            <div class="stat-value"><?= number_format($total_users) ?></div>
        </div>
        <div class="stat-icon">
            <i class="fas fa-users"></i>
        </div>
    </div>
</div>

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
            <?php if(!empty($recent_orders)): ?>
            <?php foreach($recent_orders as $order): ?>
            <tr>
                <td><strong><?= esc($order['invoice_number']) ?></strong></td>
                <td>
                    <?= esc($order['recipient_name']) ?>
                    <div style="font-size: 11px; color: #888;"><?= esc($order['recipient_phone']) ?></div>
                </td>
                <td>Rp <?= number_format($order['total_price'], 0, ',', '.') ?></td>

                <td>
                    <?php 
                            $payBadge = 'secondary';
                            if($order['payment_status'] == 'paid') $payBadge = 'success';
                            elseif($order['payment_status'] == 'pending') $payBadge = 'warning';
                            elseif($order['payment_status'] == 'failed') $payBadge = 'danger';
                        ?>
                    <span class="badge badge-<?= $payBadge ?>">
                        <?= ucfirst($order['payment_status']) ?>
                    </span>
                </td>

                <td>
                    <?php 
                            $ordBadge = 'secondary';
                            if($order['order_status'] == 'completed') $ordBadge = 'success';
                            elseif($order['order_status'] == 'processing') $ordBadge = 'info';
                            elseif($order['order_status'] == 'shipped') $ordBadge = 'primary';
                            elseif($order['order_status'] == 'cancelled') $ordBadge = 'danger';
                        ?>
                    <span class="badge badge-<?= $ordBadge ?>">
                        <?= ucfirst($order['order_status']) ?>
                    </span>
                </td>

                <td><?= date('d M Y', strtotime($order['created_at'])) ?></td>
            </tr>
            <?php endforeach; ?>
            <?php else: ?>
            <tr>
                <td colspan="6" style="text-align: center; padding: 20px;">Belum ada transaksi terbaru.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

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
            <?php if(!empty($top_products)): ?>
            <?php foreach($top_products as $product): ?>
            <tr>
                <td><strong><?= esc($product['product_name']) ?></strong></td>
                <td>
                    <span style="background: #f0f0f0; padding: 2px 8px; border-radius: 10px; font-size: 12px;">
                        <?= esc($product['category_name'] ?? 'Uncategorized') ?>
                    </span>
                </td>
                <td>Rp <?= number_format($product['price'], 0, ',', '.') ?></td>
                <td><?= number_format($product['stock']) ?> unit</td>
                <td>
                    <strong style="color: var(--primary-color);">
                        <?= number_format($product['total_sold']) ?> Sold
                    </strong>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php else: ?>
            <tr>
                <td colspan="5" style="text-align: center; padding: 20px;">Belum ada data penjualan.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>