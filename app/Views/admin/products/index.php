<?= $this->extend('admin/layout/main') ?>

<?= $this->section('content') ?>

<div class="table-container">
    <div class="table-header">
        <h2>Manajemen Produk</h2>
        <form action="" method="get" class="table-actions">
            <input type="text" name="keyword" class="form-control search-input" placeholder="Cari produk..."
                style="width: 250px;" value="<?= esc($keyword) ?>">

            <select name="category_id" class="form-control" style="width: 150px;" onchange="this.form.submit()">
                <option value="">Semua Kategori</option>
                <?php foreach($categories as $cat): ?>
                <option value="<?= $cat['id'] ?>" <?= ($selectedCat == $cat['id']) ? 'selected' : '' ?>>
                    <?= esc($cat['name']) ?>
                </option>
                <?php endforeach; ?>
            </select>

            <button type="submit" style="display:none"></button>

            <a href="<?= base_url('admin/products/add') ?>" class="btn btn-success">
                <i class="fas fa-plus"></i> Tambah Produk
            </a>
        </form>
    </div>

    <?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success"
        style="margin-bottom: 20px; padding: 10px; background: #d4edda; color: #155724; border-radius: 5px;">
        <?= session()->getFlashdata('success') ?>
    </div>
    <?php endif; ?>

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
            <?php if(empty($products)): ?>
            <tr>
                <td colspan="7" style="text-align: center; padding: 20px;">
                    Data produk tidak ditemukan.
                </td>
            </tr>
            <?php else: ?>
            <?php foreach($products as $product): ?>
            <tr>
                <td>
                    <div class="product-img">
                        <?php if($product['image'] && $product['image'] != 'default.jpg'): ?>
                        <img src="<?= base_url('uploads/products/' . $product['image']) ?>" alt="Img"
                            style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;">
                        <?php else: ?>
                        <i class="fas fa-box" style="font-size: 24px; color: var(--text-light);"></i>
                        <?php endif; ?>
                    </div>
                </td>
                <td>
                    <div><strong><?= esc($product['name']) ?></strong></div>
                    <small style="color: #6b7280;">
                        <?= character_limiter(strip_tags($product['description']), 40) ?>
                    </small>
                </td>
                <td>
                    <span class="badge badge-info" style="background: #e0f2fe; color: #0369a1;">
                        <?= esc($product['category_name']) ?>
                    </span>
                </td>
                <td>
                    <strong>Rp <?= number_format($product['price'], 0, ',', '.') ?></strong>
                </td>
                <td><?= $product['stock'] ?></td>
                <td>
                    <?php if($product['stock'] <= 0): ?>
                    <span class="badge badge-danger" style="background: #fee2e2; color: #991b1b;">Out of Stock</span>
                    <?php elseif($product['is_active']): ?>
                    <span class="badge badge-success" style="background: #dcfce7; color: #166534;">Active</span>
                    <?php else: ?>
                    <span class="badge badge-secondary" style="background: #f3f4f6; color: #374151;">Inactive</span>
                    <?php endif; ?>
                </td>
                <td>
                    <a href="<?= base_url('admin/products/edit/' . $product['id']) ?>" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>
                    <button class="btn btn-danger btn-sm" onclick="confirmDelete(<?= $product['id'] ?>)">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

    <div class="pagination-container">
        <div class="pagination-info">
            Menampilkan <?= count($products) ?> data
        </div>
        <div class="pagination-links">
            <?= $pager->links('products', 'default_full') // Pastikan view pager dikonfigurasi atau gunakan default ?>
        </div>
    </div>
</div>



<style>
.product-img {
    width: 60px;
    height: 60px;
    background: var(--bg-light);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

/* Styling tambahan untuk pagination bawaan CI4 agar sesuai tema */
.pagination-links ul {
    display: flex;
    list-style: none;
    gap: 5px;
    padding: 0;
}

.pagination-links li a,
.pagination-links li span {
    padding: 5px 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    color: #333;
    text-decoration: none;
}

.pagination-links li.active span {
    background-color: var(--primary-color, #007bff);
    color: white;
    border-color: var(--primary-color, #007bff);
}
</style>

<script>
function confirmDelete(id) {
    if (confirm('Apakah Anda yakin ingin menghapus produk ini?')) {
        window.location.href = '<?= base_url('admin/products/delete/') ?>' + id;
    }
}
</script>
<?= $this->endSection() ?>