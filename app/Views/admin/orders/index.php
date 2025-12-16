<?= $this->extend('admin/layout/main') ?>

<?= $this->section('content') ?>

<div class="table-container">
    <div class="table-header">
        <h2>Kelola Order</h2>
        <form action="" method="get" class="table-actions">
            <input type="text" name="keyword" class="form-control search-input" placeholder="Cari invoice atau nama..."
                value="<?= esc($keyword) ?>" style="width: 250px;">

            <select name="status" class="form-control" style="width: 150px;" onchange="this.form.submit()">
                <option value="">Semua Status</option>
                <option value="pending" <?= $filter_status == 'pending' ? 'selected' : '' ?>>Pending</option>
                <option value="paid" <?= $filter_status == 'paid' ? 'selected' : '' ?>>Paid</option>
                <option value="failed" <?= $filter_status == 'failed' ? 'selected' : '' ?>>Failed</option>
                <option value="expired" <?= $filter_status == 'expired' ? 'selected' : '' ?>>Expired</option>
            </select>

            <button type="submit" class="btn btn-primary btn-sm">
                <i class="fas fa-search"></i> Cari
            </button>
        </form>
    </div>

    <?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success"
        style="padding: 10px; background: #d4edda; color: #155724; margin-bottom: 15px; border-radius: 5px;">
        <?= session()->getFlashdata('success') ?>
    </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger"
        style="padding: 10px; background: #f8d7da; color: #721c24; margin-bottom: 15px; border-radius: 5px;">
        <?= session()->getFlashdata('error') ?>
    </div>
    <?php endif; ?>

    <table class="data-table">
        <thead>
            <tr>
                <th>Invoice</th>
                <th>Customer</th>
                <th>Total</th>
                <th>Status Pembayaran</th>
                <th>Status Order</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($orders)): ?>
            <?php foreach($orders as $order): ?>
            <tr>
                <td><strong><?= esc($order['invoice_number']) ?></strong></td>
                <td>
                    <div><?= esc($order['recipient_name'] ?: $order['user_fullname']) ?></div>
                    <small style="color: #6b7280;"><?= esc($order['user_email']) ?></small>
                </td>
                <td><strong>Rp <?= number_format($order['total_price'], 0, ',', '.') ?></strong></td>

                <td>
                    <?php 
                            $payStatus = $order['payment_status'];
                            $payBadge = 'secondary';
                            if($payStatus == 'paid') $payBadge = 'success';
                            elseif($payStatus == 'pending') $payBadge = 'warning';
                            elseif($payStatus == 'failed' || $payStatus == 'expired') $payBadge = 'danger';
                        ?>
                    <span class="badge badge-<?= $payBadge ?>">
                        <?= ucfirst($payStatus) ?>
                    </span>
                </td>

                <td>
                    <?php 
                            $ordStatus = $order['order_status'];
                            $ordBadge = 'secondary';
                            if($ordStatus == 'completed') $ordBadge = 'success';
                            elseif($ordStatus == 'processing') $ordBadge = 'info';
                            elseif($ordStatus == 'shipped') $ordBadge = 'primary'; // Biru tua/ungu
                            elseif($ordStatus == 'cancelled') $ordBadge = 'danger';
                        ?>
                    <span class="badge badge-<?= $ordBadge ?>">
                        <?= ucfirst($ordStatus) ?>
                    </span>
                </td>

                <td><?= date('d M Y, H:i', strtotime($order['created_at'])) ?></td>
                <td>
                    <a href="<?= base_url('admin/orders/detail/' . $order['id']) ?>" class="btn btn-primary btn-sm"
                        title="Lihat Detail">
                        <i class="fas fa-eye"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php else: ?>
            <tr>
                <td colspan="7" style="text-align: center; padding: 20px;">
                    Data order tidak ditemukan.
                </td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <div class="pagination-container">
        <div class="pagination-info">
            Menampilkan halaman <?= $pager->getCurrentPage('orders') ?> dari <?= $pager->getPageCount('orders') ?>
        </div>
        <div class="pagination-links">
            <?= $pager->links('orders', 'default_full') ?>
        </div>
    </div>
</div>



<style>
.table-actions {
    display: flex;
    gap: 10px;
    align-items: center;
}

.search-input {
    display: inline-block;
}

.pagination-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 20px;
    padding-top: 20px;
    border-top: 1px solid var(--border-color);
}

.pagination-info {
    color: var(--text-light);
    font-size: 14px;
}

/* Styling Pagination Bawaan CodeIgniter agar sesuai tema */
.pagination-links ul {
    display: flex;
    list-style: none;
    padding: 0;
    gap: 5px;
}

.pagination-links li a,
.pagination-links li span {
    padding: 5px 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    color: var(--text-dark);
    text-decoration: none;
    font-size: 14px;
}

.pagination-links li.active a,
.pagination-links li.active span {
    background-color: var(--primary-color);
    /* Sesuaikan warna primary boss */
    color: white;
    border-color: var(--primary-color);
}
</style>
<?= $this->endSection() ?>