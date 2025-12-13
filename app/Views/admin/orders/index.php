<?= $this->extend('admin/layout/main') ?>

<?= $this->section('content') ?>

<div class="table-container">
    <div class="table-header">
        <h2>Kelola Order</h2>
        <div class="table-actions">
            <input type="text" class="form-control search-input" placeholder="Cari invoice atau customer..."
                style="width: 300px;">
            <select class="form-control" style="width: 150px;">
                <option value="">Semua Status</option>
                <option value="pending">Pending</option>
                <option value="paid">Paid</option>
                <option value="failed">Failed</option>
            </select>
        </div>
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
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>INV-2025001</strong></td>
                <td>
                    <div>Budi Santoso</div>
                    <small style="color: #6b7280;">budi@gmail.com</small>
                </td>
                <td><strong>Rp 15.000.000</strong></td>
                <td><span class="badge badge-success">Paid</span></td>
                <td><span class="badge badge-info">Processing</span></td>
                <td>13 Des 2025, 14:30</td>
                <td>
                    <a href="<?= base_url('admin/orders/detail/1') ?>" class="btn btn-primary btn-sm">
                        <i class="fas fa-eye"></i>
                    </a>
                    <button class="btn btn-success btn-sm" title="Update Status">
                        <i class="fas fa-edit"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <td><strong>INV-2025002</strong></td>
                <td>
                    <div>Siti Nurhaliza</div>
                    <small style="color: #6b7280;">siti@gmail.com</small>
                </td>
                <td><strong>Rp 150.000</strong></td>
                <td><span class="badge badge-warning">Pending</span></td>
                <td><span class="badge badge-warning">Pending</span></td>
                <td>13 Des 2025, 13:15</td>
                <td>
                    <a href="<?= base_url('admin/orders/detail/2') ?>" class="btn btn-primary btn-sm">
                        <i class="fas fa-eye"></i>
                    </a>
                    <button class="btn btn-success btn-sm" title="Update Status">
                        <i class="fas fa-edit"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <td><strong>INV-2025003</strong></td>
                <td>
                    <div>Ahmad Dahlan</div>
                    <small style="color: #6b7280;">ahmad@gmail.com</small>
                </td>
                <td><strong>Rp 300.000</strong></td>
                <td><span class="badge badge-success">Paid</span></td>
                <td><span class="badge badge-success">Completed</span></td>
                <td>12 Des 2025, 10:20</td>
                <td>
                    <a href="<?= base_url('admin/orders/detail/3') ?>" class="btn btn-primary btn-sm">
                        <i class="fas fa-eye"></i>
                    </a>
                    <button class="btn btn-success btn-sm" title="Update Status">
                        <i class="fas fa-edit"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <td><strong>INV-2025004</strong></td>
                <td>
                    <div>Dewi Lestari</div>
                    <small style="color: #6b7280;">dewi@gmail.com</small>
                </td>
                <td><strong>Rp 450.000</strong></td>
                <td><span class="badge badge-danger">Failed</span></td>
                <td><span class="badge badge-danger">Cancelled</span></td>
                <td>12 Des 2025, 09:45</td>
                <td>
                    <a href="<?= base_url('admin/orders/detail/4') ?>" class="btn btn-primary btn-sm">
                        <i class="fas fa-eye"></i>
                    </a>
                    <button class="btn btn-success btn-sm" title="Update Status">
                        <i class="fas fa-edit"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <td><strong>INV-2025005</strong></td>
                <td>
                    <div>Rina Wati</div>
                    <small style="color: #6b7280;">rina@gmail.com</small>
                </td>
                <td><strong>Rp 750.000</strong></td>
                <td><span class="badge badge-success">Paid</span></td>
                <td><span class="badge badge-info">Shipped</span></td>
                <td>11 Des 2025, 16:00</td>
                <td>
                    <a href="<?= base_url('admin/orders/detail/5') ?>" class="btn btn-primary btn-sm">
                        <i class="fas fa-eye"></i>
                    </a>
                    <button class="btn btn-success btn-sm" title="Update Status">
                        <i class="fas fa-edit"></i>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="pagination-container">
        <div class="pagination-info">
            Menampilkan 1 - 5 dari 50 order
        </div>
        <div class="pagination">
            <button class="btn btn-sm" disabled>
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="btn btn-sm btn-primary">1</button>
            <button class="btn btn-sm">2</button>
            <button class="btn btn-sm">3</button>
            <button class="btn btn-sm">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<style>
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

.pagination {
    display: flex;
    gap: 5px;
}
</style>