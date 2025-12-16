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

                <!-- Color & Size Section -->
                <div class="form-row">
                    <div class="form-group">
                        <label>Warna Produk</label>
                        <select name="color" class="form-control" id="colorSelect">
                            <option value="">Pilih Warna</option>
                            <option value="Hitam"
                                <?= (old('color', $product['color'] ?? '') == 'Hitam') ? 'selected' : '' ?>>⚫ Hitam
                            </option>
                            <option value="Putih"
                                <?= (old('color', $product['color'] ?? '') == 'Putih') ? 'selected' : '' ?>>⚪ Putih
                            </option>
                            <option value="Merah"
                                <?= (old('color', $product['color'] ?? '') == 'Merah') ? 'selected' : '' ?>>🔴 Merah
                            </option>
                            <option value="Biru"
                                <?= (old('color', $product['color'] ?? '') == 'Biru') ? 'selected' : '' ?>>🔵 Biru
                            </option>
                            <option value="Navy"
                                <?= (old('color', $product['color'] ?? '') == 'Navy') ? 'selected' : '' ?>>🔵 Navy
                            </option>
                            <option value="Hijau"
                                <?= (old('color', $product['color'] ?? '') == 'Hijau') ? 'selected' : '' ?>>🟢 Hijau
                            </option>
                            <option value="Kuning"
                                <?= (old('color', $product['color'] ?? '') == 'Kuning') ? 'selected' : '' ?>>🟡 Kuning
                            </option>
                            <option value="Abu-abu"
                                <?= (old('color', $product['color'] ?? '') == 'Abu-abu') ? 'selected' : '' ?>>⚪ Abu-abu
                            </option>
                            <option value="Coklat"
                                <?= (old('color', $product['color'] ?? '') == 'Coklat') ? 'selected' : '' ?>>🟤 Coklat
                            </option>
                            <option value="Pink"
                                <?= (old('color', $product['color'] ?? '') == 'Pink') ? 'selected' : '' ?>>🩷 Pink
                            </option>
                        </select>
                        <div id="colorPreview" style="margin-top: 10px; display: none;">
                            <span style="font-size: 13px; color: var(--text-light);">Preview: </span>
                            <span class="color-dot" id="colorDot" style="display: inline-block;"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Ukuran Tersedia</label>
                        <div style="display: flex; gap: 15px; margin-top: 10px;">
                            <!-- Fashion Sizes -->
                            <div style="flex: 1;">
                                <small
                                    style="color: var(--text-light); display: block; margin-bottom: 8px;">Fashion:</small>
                                <div class="size-checkboxes">
                                    <?php 
                                    $fashionSizes = ['S', 'M', 'L', 'XL', 'XXL', 'XXXL'];
                                    $selectedSizes = old('size', $product['size'] ?? '');
                                    $selectedArray = !empty($selectedSizes) ? explode(', ', $selectedSizes) : [];
                                    ?>
                                    <?php foreach($fashionSizes as $size): ?>
                                    <label class="checkbox-label">
                                        <input type="checkbox" name="sizes[]" value="<?= $size ?>"
                                            <?= in_array($size, $selectedArray) ? 'checked' : '' ?>>
                                        <span><?= $size ?></span>
                                    </label>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <!-- Shoe Sizes -->
                            <div style="flex: 1;">
                                <small
                                    style="color: var(--text-light); display: block; margin-bottom: 8px;">Sepatu:</small>
                                <div class="size-checkboxes">
                                    <?php 
                                    $shoeSizes = ['38', '39', '40', '41', '42', '43', '44'];
                                    ?>
                                    <?php foreach($shoeSizes as $size): ?>
                                    <label class="checkbox-label">
                                        <input type="checkbox" name="sizes[]" value="<?= $size ?>"
                                            <?= in_array($size, $selectedArray) ? 'checked' : '' ?>>
                                        <span><?= $size ?></span>
                                    </label>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="size" id="sizeInput"
                            value="<?= old('size', $product['size'] ?? '') ?>">
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
                                alt="Preview" style="max-width: 200px; border-radius: 8px; margin-bottom: 10px;">
                            <br>
                            <button type="button" class="btn btn-sm btn-danger" id="removeImage">
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

<style>
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
    border: 2px dashed #ccc;
    border-radius: 8px;
    padding: 30px;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
}

.upload-area:hover {
    border-color: #007bff;
    background-color: #f8f9fa;
}

.upload-content p {
    margin: 10px 0 5px;
    color: #333;
    font-weight: 500;
}

.form-actions {
    display: flex;
    gap: 10px;
    margin-top: 30px;
    padding-top: 20px;
    border-top: 1px solid #eee;
}

/* Color Preview Dot */
.color-dot {
    width: 24px;
    height: 24px;
    border-radius: 50%;
    border: 2px solid #e5e7eb;
    vertical-align: middle;
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

/* Size Checkboxes */
.size-checkboxes {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.checkbox-label {
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 8px 12px;
    border: 1px solid var(--border-color);
    border-radius: 6px;
    cursor: pointer;
    transition: all 0.2s ease;
    font-size: 14px;
    background-color: var(--bg-white);
}

.checkbox-label:hover {
    border-color: var(--primary-color);
    background-color: var(--bg-light);
}

.checkbox-label input[type="checkbox"] {
    cursor: pointer;
}

.checkbox-label input[type="checkbox"]:checked+span {
    font-weight: 600;
    color: var(--primary-color);
}

.checkbox-label:has(input[type="checkbox"]:checked) {
    background-color: rgba(30, 58, 95, 0.1);
    border-color: var(--primary-color);
}
</style>

<script>
// Image Upload Handler
document.addEventListener('DOMContentLoaded', function() {
    const uploadArea = document.getElementById('uploadArea');
    const imageInput = document.getElementById('imageInput');
    const imagePreview = document.getElementById('imagePreview');
    const previewImg = document.getElementById('previewImg');
    const removeImage = document.getElementById('removeImage');
    const uploadContent = document.querySelector('.upload-content');

    if (previewImg.getAttribute('src') && previewImg.getAttribute('src') !== '') {
        uploadContent.style.display = 'none';
        imagePreview.style.display = 'block';
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
        e.stopPropagation();
        imageInput.value = '';
        imageInput.click();
    });
});

// Color Preview
const colorSelect = document.getElementById('colorSelect');
const colorPreview = document.getElementById('colorPreview');
const colorDot = document.getElementById('colorDot');

colorSelect.addEventListener('change', function() {
    const selectedColor = this.value;
    if (selectedColor) {
        colorPreview.style.display = 'block';
        colorDot.className = 'color-dot color-' + selectedColor.toLowerCase();
    } else {
        colorPreview.style.display = 'none';
    }
});

// Trigger on page load if color already selected
if (colorSelect.value) {
    colorPreview.style.display = 'block';
    colorDot.className = 'color-dot color-' + colorSelect.value.toLowerCase();
}

// Size Checkboxes Handler
const sizeCheckboxes = document.querySelectorAll('input[name="sizes[]"]');
const sizeInput = document.getElementById('sizeInput');

function updateSizeInput() {
    const checkedSizes = [];
    sizeCheckboxes.forEach(checkbox => {
        if (checkbox.checked) {
            checkedSizes.push(checkbox.value);
        }
    });
    sizeInput.value = checkedSizes.join(', ');
}

sizeCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('change', updateSizeInput);
});

// Initialize size input on page load
updateSizeInput();
</script>

<?= $this->endSection() ?>