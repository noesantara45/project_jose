<?= $this->extend('admin/layout/main') ?>

<?= $this->section('content') ?>

<div class="category-container">
    <!-- Form Tambah Kategori -->
    <div class="form-card">
        <div class="card-header">
            <h3 id="formTitle">Tambah Kategori Baru</h3>
        </div>
        <div class="card-body">
            <form id="categoryForm">
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

    <!-- List Kategori -->
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
                    <tr>
                        <td><strong>1</strong></td>
                        <td>Elektronik</td>
                        <td><code>elektronik</code></td>
                        <td>
                            <button class="btn btn-warning btn-sm"
                                onclick="editCategory(1, 'Elektronik', 'elektronik')">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-danger btn-sm" onclick="deleteCategory(1)">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>2</strong></td>
                        <td>Fashion Pria</td>
                        <td><code>fashion-pria</code></td>
                        <td>
                            <button class="btn btn-warning btn-sm"
                                onclick="editCategory(2, 'Fashion Pria', 'fashion-pria')">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-danger btn-sm" onclick="deleteCategory(2)">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>3</strong></td>
                        <td>Fashion Wanita</td>
                        <td><code>fashion-wanita</code></td>
                        <td>
                            <button class="btn btn-warning btn-sm"
                                onclick="editCategory(3, 'Fashion Wanita', 'fashion-wanita')">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-danger btn-sm" onclick="deleteCategory(3)">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>4</strong></td>
                        <td>Aksesoris</td>
                        <td><code>aksesoris</code></td>
                        <td>
                            <button class="btn btn-warning btn-sm" onclick="editCategory(4, 'Aksesoris', 'aksesoris')">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-danger btn-sm" onclick="deleteCategory(4)">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<style>
.category-container {
    display: grid;
    grid-template-columns: 400px 1fr;
    gap: 20px;
}

.form-card,
.table-card {
    background: var(--bg-white);
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
    overflow: hidden;
}

code {
    background-color: var(--bg-light);
    padding: 4px 8px;
    border-radius: 4px;
    font-family: monospace;
    color: var(--text-dark);
}

@media (max-width: 768px) {
    .category-container {
        grid-template-columns: 1fr;
    }
}
</style>

<script>
// Auto generate slug
const categoryName = document.getElementById('category_name');
const categorySlug = document.getElementById('category_slug');

categoryName.addEventListener('input', function() {
    const slug = this.value
        .toLowerCase()
        .replace(/[^a-z0-9]+/g, '-')
        .replace(/^-+|-+$/g, '');
    categorySlug.value = slug;
});

// Edit category
function editCategory(id, name, slug) {
    document.getElementById('category_id').value = id;
    document.getElementById('category_name').value = name;
    document.getElementById('category_slug').value = slug;
    document.getElementById('formTitle').textContent = 'Edit Kategori';
    document.getElementById('btnText').textContent = 'Update Kategori';
    document.getElementById('btnCancel').style.display = 'inline-flex';

    // Scroll to form
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

// Reset form
function resetForm() {
    document.getElementById('categoryForm').reset();
    document.getElementById('category_id').value = '';
    document.getElementById('formTitle').textContent = 'Tambah Kategori Baru';
    document.getElementById('btnText').textContent = 'Simpan Kategori';
    document.getElementById('btnCancel').style.display = 'none';
}

// Delete category
function deleteCategory(id) {
    if (confirm('Apakah Anda yakin ingin menghapus kategori ini?')) {
        // Ajax delete atau redirect
        window.location.href = '<?= base_url('admin/categories/delete/') ?>' + id;
    }
}

// Form submit
document.getElementById('categoryForm').addEventListener('submit', function(e) {
    e.preventDefault();
    // Ajax submit atau normal submit
    alert('Kategori berhasil disimpan!');
    resetForm();
});
</script>