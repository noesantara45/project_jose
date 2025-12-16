<?= $this->extend('admin/layout/main') ?>

<?= $this->section('content') ?>

<div class="tab-navigation" style="margin-bottom: 20px;">
    <button class="tab-btn active" onclick="switchTab('products')">
        <i class="fas fa-box"></i> Manajemen Produk
    </button>
    <button class="tab-btn" onclick="switchTab('categories')">
        <i class="fas fa-tags"></i> Kelola Kategori
    </button>
</div>

<div id="tab-products" class="tab-content active">
    <div class="table-container">
        <div class="table-header">
            <h2>Daftar Produk</h2>
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

        <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"
            style="margin-bottom: 20px; padding: 10px; background: #f8d7da; color: #721c24; border-radius: 5px;">
            <?= session()->getFlashdata('error') ?>
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
                    <th>Warna</th>
                    <th>Ukuran</th>
                    <th>Status</th>
                    <th style="width: 150px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if(empty($products)): ?>
                <tr>
                    <td colspan="9" style="text-align: center; padding: 20px;">
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
                        <?php if(!empty($product['color'])): ?>
                        <div style="display: flex; align-items: center; gap: 8px;">
                            <span class="color-dot color-<?= strtolower($product['color']) ?>"></span>
                            <span style="font-size: 13px;"><?= esc($product['color']) ?></span>
                        </div>
                        <?php else: ?>
                        <span style="color: var(--text-light); font-size: 13px;">-</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if(!empty($product['size'])): ?>
                        <span style="font-size: 13px; color: var(--text-dark);">
                            <?= esc($product['size']) ?>
                        </span>
                        <?php else: ?>
                        <span style="color: var(--text-light); font-size: 13px;">-</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if($product['stock'] <= 0): ?>
                        <span class="badge badge-danger" style="background: #fee2e2; color: #991b1b;">Out of
                            Stock</span>
                        <?php elseif($product['is_active']): ?>
                        <span class="badge badge-success" style="background: #dcfce7; color: #166534;">Active</span>
                        <?php else: ?>
                        <span class="badge badge-secondary" style="background: #f3f4f6; color: #374151;">Inactive</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?= base_url('admin/products/edit/' . $product['id']) ?>"
                            class="btn btn-warning btn-sm">
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
                <?= $pager->links('products', 'default_full') ?>
            </div>
        </div>
    </div>
</div>

<div id="tab-categories" class="tab-content" style="display: none;">
    <div class="category-container">

        <div class="form-card">
            <div class="card-header">
                <h3 id="formTitle">Tambah Kategori Baru</h3>
            </div>
            <div class="card-body">
                <form id="categoryForm" action="<?= base_url('admin/categories/save') ?>" method="POST">

                    <input type="hidden" id="category_id" name="id">

                    <div class="form-group">
                        <label>Nama Kategori <span style="color: red;">*</span></label>
                        <input type="text" id="category_name" name="name" class="form-control"
                            placeholder="Contoh: Elektronik" required>
                    </div>

                    <div class="form-group">
                        <label>Slug</label>
                        <input type="text" id="category_slug" name="slug" class="form-control" placeholder="elektronik"
                            readonly style="background-color: #f9fafb;">
                        <small style="color: var(--text-light);">Slug akan otomatis dibuat dari nama kategori</small>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i> <span id="btnText">Simpan Kategori</span>
                        </button>
                        <button type="button" class="btn" id="btnCancel" style="display: none;" onclick="resetForm()">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="table-card">
            <div class="card-header">
                <h3>Daftar Kategori</h3>
            </div>
            <div class="card-body">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th style="width: 60px;">ID</th>
                            <th>Nama Kategori</th>
                            <th>Slug</th>
                            <th style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($categories)): ?>
                        <tr>
                            <td colspan="4" style="text-align: center; padding: 20px;">
                                Belum ada kategori.
                            </td>
                        </tr>
                        <?php else: ?>
                        <?php foreach($categories as $cat): ?>
                        <tr>
                            <td><strong><?= $cat['id'] ?></strong></td>
                            <td><?= esc($cat['name']) ?></td>
                            <td><code><?= esc($cat['slug']) ?></code></td>
                            <td>
                                <button class="btn btn-warning btn-sm"
                                    onclick="editCategory(<?= $cat['id'] ?>, '<?= esc($cat['name'], 'js') ?>', '<?= esc($cat['slug'], 'js') ?>')">
                                    <i class="fas fa-edit"></i>
                                </button>

                                <button class="btn btn-danger btn-sm" onclick="deleteCategory(<?= $cat['id'] ?>)">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
/* CSS UNTUK TABS DAN KOMPONEN LAINNYA */
.tab-navigation {
    display: flex;
    gap: 10px;
    border-bottom: 2px solid var(--border-color);
    padding-bottom: 0;
}

.tab-btn {
    background: none;
    border: none;
    padding: 12px 24px;
    font-size: 15px;
    font-weight: 500;
    color: var(--text-light);
    cursor: pointer;
    border-bottom: 3px solid transparent;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: -2px;
}

.tab-btn:hover {
    color: var(--primary-color);
    background-color: var(--bg-light);
}

.tab-btn.active {
    color: var(--primary-color);
    border-bottom-color: var(--primary-color);
    font-weight: 600;
}

.tab-content {
    animation: fadeIn 0.3s ease;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Color Dots */
.color-dot {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    display: inline-block;
    border: 2px solid #e5e7eb;
}

.color-hitam {
    background-color: #000000;
}

.color-putih {
    background-color: #FFFFFF;
    border-color: #d1d5db;
}

.color-merah {
    background-color: #EF4444;
}

.color-biru {
    background-color: #3B82F6;
}

.color-navy {
    background-color: #1E3A8A;
}

.color-hijau {
    background-color: #10B981;
}

.color-kuning {
    background-color: #F59E0B;
}

.color-abu-abu {
    background-color: #6B7280;
}

.color-coklat {
    background-color: #92400E;
}

.color-pink {
    background-color: #EC4899;
}

/* Product Image */
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

/* Category Container */
.category-container {
    display: grid;
    grid-template-columns: 400px 1fr;
    gap: 20px;
}

code {
    background-color: var(--bg-light);
    padding: 4px 8px;
    border-radius: 4px;
    font-family: monospace;
    color: var(--text-dark);
}

@media (max-width: 1024px) {
    .category-container {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .tab-navigation {
        overflow-x: auto;
    }

    .tab-btn {
        white-space: nowrap;
        padding: 10px 16px;
        font-size: 14px;
    }
}
</style>

<script>
// ==========================================
// 1. LOGIKA PINDAH TAB & AUTO DETECT
// ==========================================
function switchTab(tabName) {
    // Sembunyikan semua tab
    document.querySelectorAll('.tab-content').forEach(tab => tab.style.display = 'none');

    // Matikan status active di tombol
    document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));

    // Munculkan tab yang dipilih
    const selectedTab = document.getElementById('tab-' + tabName);
    if (selectedTab) selectedTab.style.display = 'block';

    // Aktifkan tombol yang diklik
    const activeBtn = document.querySelector(`button[onclick="switchTab('${tabName}')"]`);
    if (activeBtn) activeBtn.classList.add('active');
}

// Auto Detect dari URL (?tab=categories)
document.addEventListener("DOMContentLoaded", function() {
    const urlParams = new URLSearchParams(window.location.search);
    const tab = urlParams.get('tab');
    if (tab === 'categories') {
        switchTab('categories');
    }
});

// ==========================================
// 2. LOGIKA PRODUK
// ==========================================
function confirmDelete(id) {
    if (confirm('Apakah Anda yakin ingin menghapus produk ini?')) {
        window.location.href = '<?= base_url('admin/products/delete/') ?>' + id;
    }
}

// ==========================================
// 3. LOGIKA KATEGORI (EDIT & DELETE)
// ==========================================

// Auto Slug Generator
const categoryName = document.getElementById('category_name');
const categorySlug = document.getElementById('category_slug');

if (categoryName && categorySlug) {
    categoryName.addEventListener('input', function() {
        const slug = this.value
            .toLowerCase()
            .replace(/[^a-z0-9]+/g, '-')
            .replace(/^-+|-+$/g, '');
        categorySlug.value = slug;
    });
}

// Fungsi Isi Form untuk Edit
function editCategory(id, name, slug) {
    document.getElementById('category_id').value = id;
    document.getElementById('category_name').value = name;
    document.getElementById('category_slug').value = slug;
    document.getElementById('formTitle').textContent = 'Edit Kategori';
    document.getElementById('btnText').textContent = 'Update Kategori';
    document.getElementById('btnCancel').style.display = 'inline-flex';

    // Scroll ke form
    document.querySelector('.category-container').scrollIntoView({
        behavior: 'smooth'
    });
}

// Fungsi Reset Form
function resetForm() {
    document.getElementById('categoryForm').reset();
    document.getElementById('category_id').value = '';
    document.getElementById('formTitle').textContent = 'Tambah Kategori Baru';
    document.getElementById('btnText').textContent = 'Simpan Kategori';
    document.getElementById('btnCancel').style.display = 'none';
}

// Fungsi Hapus Kategori
function deleteCategory(id) {
    if (confirm('Apakah Anda yakin ingin menghapus kategori ini?')) {
        window.location.href = '<?= base_url('admin/categories/delete/') ?>' + id;
    }
}
</script>

<?= $this->endSection() ?>