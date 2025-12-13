<?= $this->extend('admin/layout/main') ?>

<?= $this->section('content') ?>

<div style="margin-bottom: 20px;">
    <a href="<?= base_url('admin/orders') ?>" class="btn btn-sm">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<div class="order-detail-container">
    <!-- Order Info -->
    <div class="detail-card">
        <div class="card-header">
            <h3>Informasi Order</h3>
            <span class="badge badge-success">Paid</span>
        </div>
        <div class="card-body">
            <div class="info-row">
                <span class="info-label">Invoice Number:</span>
                <span class="info-value"><strong>INV-2025001</strong></span>
            </div>
            <div class="info-row">
                <span class="info-label">Tanggal Order:</span>
                <span class="info-value">13 Desember 2025, 14:30 WIB</span>
            </div>
            <div class="info-row">
                <span class="info-label">Status Pembayaran:</span>
                <span class="info-value"><span class="badge badge-success">Paid</span></span>
            </div>
            <div class="info-row">
                <span class="info-label">Status Order:</span>
                <span class="info-value"><span class="badge badge-info">Processing</span></span>
            </div>
        </div>
    </div>

    <!-- Customer Info -->
    <div class="detail-card">
        <div class="card-header">
            <h3>Informasi Customer</h3>
        </div>
        <div class="card-body">
            <div class="info-row">
                <span class="info-label">Nama:</span>
                <span class="info-value">Budi Santoso</span>
            </div>
            <div class="info-row">
                <span class="info-label">Email:</span>
                <span class="info-value">budi@gmail.com</span>
            </div>
            <div class="info-row">
                <span class="info-label">No. Telepon:</span>
                <span class="info-value">08123456789</span>
            </div>
        </div>
    </div>

    <!-- Shipping Info -->
    <div class="detail-card">
        <div class="card-header">
            <h3>Informasi Pengiriman</h3>
        </div>
        <div class="card-body">
            <div class="info-row">
                <span class="info-label">Penerima:</span>
                <span class="info-value">Budi Santoso</span>
            </div>
            <div class="info-row">
                <span class="info-label">No. Telepon:</span>
                <span class="info-value">08123456789</span>
            </div>
            <div class="info-row">
                <span class="info-label">Alamat:</span>
                <span class="info-value">Jl. Sudirman No. 123, Jakarta Pusat, DKI Jakarta 10110</span>
            </div>
            <div class="info-row">
                <span class="info-label">Kurir:</span>
                <span class="info-value">JNE Regular</span>
            </div>
            <div class="info-row">
                <span class="info-label">No. Resi:</span>
                <span class="info-value"><strong>JNE1234567890</strong></span>
            </div>
        </div>
    </div>

    <!-- Order Items -->
    <div class="detail-card full-width">
        <div class="card-header">
            <h3>Item Pesanan</h3>
        </div>
        <div class="card-body">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Laptop Gaming Asus</td>
                        <td>Rp 15.000.000</td>
                        <td>1</td>
                        <td><strong>Rp 15.000.000</strong></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" style="text-align: right; font-weight: 600;">Total:</td>
                        <td><strong style="font-size: 18px; color: var(--primary-color);">Rp 15.000.000</strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- Update Status Form -->
    <div class="detail-card full-width">
        <div class="card-header">
            <h3>Update Status Order</h3>
        </div>
        <div class="card-body">
            <form>
                <div class="form-row">
                    <div class="form-group" style="flex: 1;">
                        <label>Status Order</label>
                        <select class="form-control">
                            <option value="pending">Pending</option>
                            <option value="processing" selected>Processing</option>
                            <option value="shipped">Shipped</option>
                            <option value="completed">Completed</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <label>No. Resi (Opsional)</label>
                        <input type="text" class="form-control" placeholder="Masukkan nomor resi">
                    </div>
                </div>
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Update Status
                </button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<style>
.order-detail-container {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
}

.detail-card {
    background: var(--bg-white);
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
    overflow: hidden;
}

.detail-card.full-width {
    grid-column: 1 / -1;
}

.card-header {
    padding: 20px 25px;
    border-bottom: 1px solid var(--border-color);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.card-header h3 {
    font-size: 18px;
    font-weight: 600;
    color: var(--text-dark);
}

.card-body {
    padding: 25px;
}

.info-row {
    display: flex;
    justify-content: space-between;
    padding: 12px 0;
    border-bottom: 1px solid var(--border-color);
}

.info-row:last-child {
    border-bottom: none;
}

.info-label {
    color: var(--text-light);
    font-weight: 500;
}

.info-value {
    color: var(--text-dark);
    text-align: right;
}

.form-row {
    display: flex;
    gap: 20px;
}

@media (max-width: 768px) {
    .order-detail-container {
        grid-template-columns: 1fr;
    }

    .form-row {
        flex-direction: column;
    }
}
</style>