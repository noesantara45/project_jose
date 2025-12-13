<?= $this->extend('admin/layout/main') ?>

<?= $this->section('content') ?>

<div style="margin-bottom: 20px;">
    <a href="<?= base_url('admin/products') ?>" class="btn btn-sm">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<div class="form-container">

    <?php if (session()->has('errors')) : ?>
    <div class="alert alert-danger"
        style="background: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
        <ul style="margin: 0; padding-left: 20px;">
            <?php foreach (session('errors') as $error) : ?>
            <li><?= $error ?></li>
            <?php endforeach ?>
        </ul>
    </div>
    <?php endif ?>

    <div class="form-card">
        <div class="card-header">
            <h3><?= isset($product) ? 'Edit Produk' : 'Tambah Produk Baru' ?></h3>
        </div>
        <div class="card-body">
            <form action="<?= base_url('admin/products/save') ?>" method="POST" enctype="multipart/form-data">

                <?php if(isset($product)): ?>
                <input type="hidden" name="id" value="<?= $product['id'] ?>">
                <input type="hidden" name="old_image" value="<?= $product['image'] ?>">
                <?php endif; ?>

                <div class="form-row">
                    <div class="form-group" style="flex: 2;">
                        <label>Nama Produk <span style="color: red;">*</span></label>
                        <input type="text" name="name" class="form-control" placeholder="Contoh: Laptop Gaming Asus ROG"
                            value="<?= old('name', $product['name'] ?? '') ?>" required>
                    </div>

                    <div class="form-group" style="flex: 1;">
                        <label>Kategori <span style="color: red;">*</span></label>
                        <select name="category_id" class="form-control" required>
                            <option value="">Pilih Kategori</option>
                            <?php if(isset($categories)): ?>
                            <?php foreach($categories as $cat): ?>
                            <option value="<?= $cat['id'] ?>"
                                <?= (old('category_id', $product['category_id'] ?? '') == $cat['id']) ? 'selected' : '' ?>>
                                <?= esc($cat['name']) ?>
                            </option>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="description" class="form-control" rows="4"
                        placeholder="Deskripsi produk..."><?= old('description', $product['description'] ?? '') ?></textarea>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Harga <span style="color: red;">*</span></label>
                        <input type="number" name="price" class="form-control" placeholder="15000000"
                            value="<?= old('price', $product['price'] ?? '') ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Stok <span style="color: red;">*</span></label>
                        <input type="number" name="stock" class="form-control" placeholder="10"
                            value="<?= old('stock', $product['stock'] ?? '') ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="is_active" class="form-control">
                            <option value="1"
                                <?= (old('is_active', $product['is_active'] ?? '') == 1) ? 'selected' : '' ?>>Active
                            </option>
                            <option value="0"
                                <?= (old('is_active', $product['is_active'] ?? '1') == 0) ? 'selected' : '' ?>>Inactive
                            </option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label>Gambar Produk</label>
                    <div class="upload-area" id="uploadArea">
                        <input type="file" name="image" id="imageInput" accept="image/*" style="display: none;">
                        <div class="upload-content">
                            <i class="fas fa-cloud-upload-alt" style="font-size: 48px; color: var(--text-light);"></i>
                            <p>Klik untuk upload atau drag & drop</p>
                            <small style="color: var(--text-light);">PNG, JPG, JPEG (Max. 2MB)</small>
                        </div>

                        <div id="imagePreview"
                            style="<?= (isset($product) && $product['image'] != 'default.jpg') ? 'display: block;' : 'display: none;' ?>">
                            <img id="previewImg"
                                src="<?= (isset($product) && $product['image'] != 'default.jpg') ? base_url('uploads/products/'.$product['image']) : '' ?>"
                                alt="Preview" style="max-width: 200px; border-radius: 8px;">

                            <button type="button" class="btn btn-sm btn-danger" id="removeImage"
                                style="margin-top: 10px;">
                                <i class="fas fa-times"></i> Ganti Gambar
                            </button>
                        </div>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Simpan Produk
                    </button>
                    <a href="<?= base_url('admin/products') ?>" class="btn">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<style>
/* ... copy style dari file asli Anda ... */
.form-container {
    max-width: 900px;
}

.form-card {
    background: var(--bg-white);
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
    overflow: hidden;
}

.upload-area {
    border: 2px dashed var(--border-color);
    border-radius: 8px;
    padding: 30px;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s ease;
}

.upload-area:hover {
    border-color: var(--primary-color);
    background-color: var(--bg-light);
}

.upload-content p {
    margin: 10px 0 5px;
    color: var(--text-dark);
    font-weight: 500;
}

.form-actions {
    display: flex;
    gap: 10px;
    margin-top: 30px;
    padding-top: 20px;
    border-top: 1px solid var(--border-color);
}
</style>

<script>
const uploadArea = document.getElementById('uploadArea');
const imageInput = document.getElementById('imageInput');
const imagePreview = document.getElementById('imagePreview');
const previewImg = document.getElementById('previewImg');
const removeImage = document.getElementById('removeImage');
const uploadContent = document.querySelector('.upload-content');

// Jika saat load halaman sudah ada gambar (mode edit), sembunyikan text upload
if (previewImg.src && previewImg.src !== window.location.href) {
    uploadContent.style.display = 'none';
}

uploadArea.addEventListener('click', () => {
    imageInput.click();
});

imageInput.addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            uploadContent.style.display = 'none';
            imagePreview.style.display = 'block';
        }
        reader.readAsDataURL(file);
    }
});

removeImage.addEventListener('click', function(e) {
    e.stopPropagation(); // Mencegah trigger click uploadArea
    imageInput.value = ''; // Reset input file
    imageInput.click(); // Langsung buka file explorer lagi
});
</script>