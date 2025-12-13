<?= $this->extend('admin/layout/main') ?>

<?= $this->section('content') ?>

<div class="table-container">
    <div class="table-header">
        <h2>Manajemen Produk</h2>
        <div class="table-actions">
            <input type="text" class="form-control search-input" placeholder="Cari produk..." style="width: 250px;">
            <select class="form-control" style="width: 150px;">
                <option value="">Semua Kategori</option>
                <option value="1">Elektronik</option>
                <option value="2">Fashion Pria</option>
            </select>
            <a href="<?= base_url('admin/products/add') ?>" class="btn btn-success">
                <i class="fas fa-plus"></i> Tambah Produk
            </a>
        </div>
    </div>

    <table class="data-table">
        <thead>
            <tr>
                <th style="width: 80px;">Image</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Status</th>
                <th style="width: 150px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <div class="product-img">
                        <i class="fas fa-laptop" style="font-size: 32px; color: var(--text-light);"></i>
                    </div>
                </td>
                <td>
                    <div><strong>Laptop Gaming Asus</strong></div>
                    <small style="color: #6b7280;">Laptop spek dewa rata kanan</small>
                </td>
                <td>Elektronik</td>
                <td><strong>Rp 15.000.000</strong></td>
                <td>5</td>
                <td><span class="badge badge-success">Active</span></td>
                <td>
                    <a href="<?= base_url('admin/products/edit/1') ?>" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>
                    <button class="btn btn-danger btn-sm" onclick="confirmDelete(1)">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="product-img">
                        <i class="fas fa-tshirt" style="font-size: 32px; color: var(--text-light);"></i>
                    </div>
                </td>
                <td>
                    <div><strong>Kemeja Flannel</strong></div>
                    <small style="color: #6b7280;">Bahan adem dan nyaman</small>
                </td>
                <td>Fashion Pria</td>
                <td><strong>Rp 150.000</strong></td>
                <td>20</td>
                <td><span class="badge badge-success">Active</span></td>
                <td>
                    <a href="<?= base_url('admin/products/edit/2') ?>" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>
                    <button class="btn btn-danger btn-sm" onclick="confirmDelete(2)">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="product-img">
                        <i class="fas fa-running" style="font-size: 32px; color: var(--text-light);"></i>
                    </div>
                </td>
                <td>
                    <div><strong>Sepatu Sneakers</strong></div>
                    <small style="color: #6b7280;">Nyaman untuk aktivitas sehari-hari</small>
                </td>
                <td>Fashion Pria</td>
                <td><strong>Rp 350.000</strong></td>
                <td>15</td>
                <td><span class="badge badge-success">Active</span></td>
                <td>
                    <a href="<?= base_url('admin/products/edit/3') ?>" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>
                    <button class="btn btn-danger btn-sm" onclick="confirmDelete(3)">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="product-img">
                        <i class="fas fa-mobile-alt" style="font-size: 32px; color: var(--text-light);"></i>
                    </div>
                </td>
                <td>
                    <div><strong>Smartphone Samsung Galaxy</strong></div>
                    <small style="color: #6b7280;">Kamera canggih, performa maksimal</small>
                </td>
                <td>Elektronik</td>
                <td><strong>Rp 8.500.000</strong></td>
                <td>0</td>
                <td><span class="badge badge-danger">Out of Stock</span></td>
                <td>
                    <a href="<?= base_url('admin/products/edit/4') ?>" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>
                    <button class="btn btn-danger btn-sm" onclick="confirmDelete(4)">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="pagination-container">
        <div class="pagination-info">
            Menampilkan 1 - 4 dari 45 produk
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
.product-img {
    width: 60px;
    height: 60px;
    background: var(--bg-light);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>

<script>
function confirmDelete(id) {
    if (confirm('Apakah Anda yakin ingin menghapus produk ini?')) {
        // Ajax delete atau redirect
        window.location.href = '<?= base_url('admin/products/delete/') ?>' + id;
    }
}
</script>