<?= $this->extend('admin/layout/main') ?>

<?= $this->section('content') ?>

<div class="header-actions"
    style="margin-bottom: 20px; display:flex; justify-content:space-between; align-items:center;">
    <a href="<?= base_url('admin/orders') ?>" class="btn btn-secondary btn-sm">
        <i class="fas fa-arrow-left"></i> Kembali ke List
    </a>

    <div class="action-buttons">

        <?php if($order['order_status'] == 'pending'): ?>
        <form action="<?= base_url('admin/orders/update-status/' . $order['id']) ?>" method="post"
            style="display:inline;"
            onsubmit="return confirm('Proses pesanan ini sekarang? Pastikan pembayaran sudah valid.')">
            <?= csrf_field() ?>
            <input type="hidden" name="order_status" value="processing">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-box-open"></i> Proses Pesanan (Packing)
            </button>
        </form>
        <button class="btn btn-danger" onclick="openCancelModal()">
            <i class="fas fa-times"></i> Batalkan
        </button>

        <?php elseif($order['order_status'] == 'processing'): ?>
        <button class="btn btn-info" onclick="printLabel()">
            <i class="fas fa-print"></i> Cetak Label
        </button>
        <button class="btn btn-success" onclick="openResiModal()">
            <i class="fas fa-truck"></i> Kirim & Input Resi
        </button>

        <?php elseif($order['order_status'] == 'shipped'): ?>
        <form action="<?= base_url('admin/orders/update-status/' . $order['id']) ?>" method="post"
            style="display:inline;"
            onsubmit="return confirm('Selesaikan pesanan ini? Pastikan barang sudah diterima customer.')">
            <?= csrf_field() ?>
            <input type="hidden" name="order_status" value="completed">
            <button type="submit" class="btn btn-success">
                <i class="fas fa-check-circle"></i> Selesaikan Order
            </button>
        </form>

        <?php endif; ?>
    </div>
</div>

<?php if (session()->getFlashdata('success')) : ?>
<div class="alert alert-success"
    style="padding: 10px; background: #d4edda; color: #155724; margin-bottom: 15px; border-radius: 5px;">
    <?= session()->getFlashdata('success') ?>
</div>
<?php endif; ?>

<div class="order-detail-container">
    <div class="detail-card">
        <div class="card-header">
            <h3>Informasi Order</h3>
            <?php 
                $payStatus = $order['payment_status'];
                $payBadge = ($payStatus == 'paid') ? 'success' : (($payStatus == 'pending') ? 'warning' : 'danger');
            ?>
            <span class="badge badge-<?= $payBadge ?>"><?= strtoupper($payStatus) ?></span>
        </div>
        <div class="card-body">
            <div class="info-row">
                <span class="info-label">Invoice:</span>
                <span class="info-value"><strong><?= esc($order['invoice_number']) ?></strong></span>
            </div>
            <div class="info-row">
                <span class="info-label">Tanggal Order:</span>
                <span class="info-value"><?= date('d M Y, H:i', strtotime($order['created_at'])) ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">Status Order:</span>
                <span class="info-value">
                    <span class="badge badge-info"><?= strtoupper($order['order_status']) ?></span>
                </span>
            </div>
            <?php if(!empty($order['tracking_number'])): ?>
            <div class="info-row" style="background: #f0f9ff; padding: 5px; border-radius: 4px;">
                <span class="info-label">No. Resi:</span>
                <span class="info-value"><strong
                        style="color: #0056b3; font-size:16px;"><?= esc($order['tracking_number']) ?></strong></span>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="detail-card">
        <div class="card-header">
            <h3>Informasi Customer</h3>
            <a href="https://wa.me/<?= preg_replace('/^0/', '62', $order['recipient_phone']) ?>" target="_blank"
                class="btn btn-success btn-sm" style="background:#25D366; border:none;">
                <i class="fab fa-whatsapp"></i> Chat
            </a>
        </div>
        <div class="card-body">
            <div class="info-row">
                <span class="info-label">Nama Akun:</span>
                <span class="info-value"><?= esc($order['user_fullname']) ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">Email:</span>
                <span class="info-value"><?= esc($order['user_email']) ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">Penerima:</span>
                <span class="info-value"><strong><?= esc($order['recipient_name']) ?></strong></span>
            </div>
            <div class="info-row">
                <span class="info-label">No. HP:</span>
                <span class="info-value"><?= esc($order['recipient_phone']) ?></span>
            </div>
        </div>
    </div>

    <div class="detail-card">
        <div class="card-header">
            <h3>Alamat Pengiriman</h3>
        </div>
        <div class="card-body">
            <div class="info-row">
                <span class="info-label">Kurir:</span>
                <span class="info-value"><?= strtoupper(esc($order['courier'] ?? '-')) ?></span>
            </div>
            <div style="margin-top: 10px; color: var(--text-dark); line-height: 1.5;">
                <?= nl2br(esc($order['shipping_address'])) ?>
            </div>
        </div>
    </div>

    <div class="detail-card full-width">
        <div class="card-header">
            <h3>Item Pesanan</h3>
        </div>
        <div class="card-body">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Harga Satuan</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($order_items as $item): ?>
                    <tr>
                        <td>
                            <strong><?= esc($item['product_name']) ?></strong>
                        </td>
                        <td>Rp <?= number_format($item['price'], 0, ',', '.') ?></td>
                        <td><?= $item['qty'] ?></td>
                        <td><strong>Rp <?= number_format($item['subtotal'], 0, ',', '.') ?></strong></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" style="text-align: right; font-weight: 600;">Total Bayar:</td>
                        <td><strong style="font-size: 18px; color: var(--primary-color);">Rp
                                <?= number_format($order['total_price'], 0, ',', '.') ?></strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<div class="modal" id="resiModal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Update Pengiriman</h3>
            <button class="modal-close" onclick="closeResiModal()">&times;</button>
        </div>
        <div class="modal-body">
            <form action="<?= base_url('admin/orders/update-status/' . $order['id']) ?>" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="order_status" value="shipped">

                <div class="form-group">
                    <label>Kurir</label>
                    <input type="text" class="form-control" value="<?= esc($order['courier']) ?>" disabled
                        style="background:#f5f5f5;">
                </div>

                <div class="form-group">
                    <label>Nomor Resi <span style="color:red">*</span></label>
                    <input type="text" name="tracking_number" class="form-control" placeholder="Contoh: JNE123456789"
                        required>
                    <small>Pastikan nomor resi benar. Status akan berubah menjadi <b>Shipped</b>.</small>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Simpan & Kirim Notifikasi</button>
                    <button type="button" class="btn btn-secondary" onclick="closeResiModal()">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal" id="cancelModal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 style="color: #dc3545;">Batalkan Pesanan</h3>
            <button class="modal-close" onclick="closeCancelModal()">&times;</button>
        </div>
        <div class="modal-body">
            <form action="<?= base_url('admin/orders/update-status/' . $order['id']) ?>" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="order_status" value="cancelled">

                <p>Apakah Anda yakin ingin membatalkan pesanan ini? Stok tidak otomatis kembali (manual adjustment).</p>

                <div class="form-actions">
                    <button type="submit" class="btn btn-danger">Ya, Batalkan</button>
                    <button type="button" class="btn btn-secondary" onclick="closeCancelModal()">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="printArea" style="display:none;">
    <div style="width: 100mm; padding: 10px; border: 2px dashed #000; font-family: sans-serif;">
        <h2 style="margin:0; text-align:center;">PENGIRIMAN</h2>
        <hr>
        <p><strong>Penerima:</strong><br>
            <?= esc($order['recipient_name']) ?> (<?= esc($order['recipient_phone']) ?>)<br>
            <?= nl2br(esc($order['shipping_address'])) ?>
        </p>
        <hr>
        <p><strong>Pengirim:</strong><br>
            HL OUTFIT STORE<br>
            0812-9999-8888</p>
        <hr>
        <p><strong>Order:</strong> <?= esc($order['invoice_number']) ?><br>
            <strong>Kurir:</strong> <?= esc($order['courier']) ?>
        </p>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('content') ?>
<style>
.order-detail-container {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    /* 3 Kolom biar rapi */
    gap: 20px;
}

.detail-card {
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    overflow: hidden;
    border: 1px solid #eee;
}

.detail-card.full-width {
    grid-column: 1 / -1;
}

.card-header {
    padding: 15px 20px;
    border-bottom: 1px solid #eee;
    background: #fafafa;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.card-header h3 {
    margin: 0;
    font-size: 16px;
    font-weight: 600;
}

.card-body {
    padding: 20px;
}

.info-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 12px;
    border-bottom: 1px dashed #eee;
    padding-bottom: 8px;
}

.info-row:last-child {
    border-bottom: none;
}

.info-label {
    color: #666;
    font-size: 14px;
}

.info-value {
    font-weight: 500;
    color: #333;
    text-align: right;
    max-width: 60%;
}

/* Modal Styles (Sama dengan admin index) */
.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 999;
    justify-content: center;
    align-items: center;
}

.modal.active {
    display: flex;
}

.modal-content {
    background: #fff;
    padding: 0;
    width: 400px;
    border-radius: 8px;
    overflow: hidden;
    animation: slideDown 0.2s;
}

.modal-header {
    padding: 15px 20px;
    background: #f8f9fa;
    border-bottom: 1px solid #eee;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.modal-body {
    padding: 20px;
}

.modal-close {
    background: none;
    border: none;
    font-size: 24px;
    cursor: pointer;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: 500;
}

.form-control {
    width: 100%;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
}

.form-actions {
    display: flex;
    gap: 10px;
    justify-content: flex-end;
    margin-top: 15px;
}

@media print {
    body * {
        visibility: hidden;
    }

    #printArea,
    #printArea * {
        visibility: visible;
    }

    #printArea {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
    }
}
</style>

<script>
// Modal Resi Logic
function openResiModal() {
    document.getElementById('resiModal').classList.add('active');
}

function closeResiModal() {
    document.getElementById('resiModal').classList.remove('active');
}

// Modal Cancel Logic
function openCancelModal() {
    document.getElementById('cancelModal').classList.add('active');
}

function closeCancelModal() {
    document.getElementById('cancelModal').classList.remove('active');
}

// Fitur Print Label Sederhana
function printLabel() {
    var printContents = document.getElementById('printArea').innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
    location.reload(); // Reload agar event listener balik lagi
}
</script>
<?= $this->endSection() ?>