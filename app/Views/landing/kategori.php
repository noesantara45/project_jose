<?= $this->extend('landing/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container pb-5" style="margin-top: 100px;">

    <nav aria-label="breadcrumb" class="mb-4 mt-3">
        <ol class="breadcrumb small text-uppercase">
            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>" class="text-decoration-none text-muted">Home</a>
            </li>
            <li class="breadcrumb-item active text-dark" aria-current="page">
                Katalog Produk
            </li>
        </ol>
    </nav>

    <div class="row">

        <div class="col-lg-3 d-none d-lg-block filter-sidebar border-end pe-4">

            <form action="" method="get" id="filterForm">

                <input type="hidden" name="keyword" value="<?= esc($filter_keyword ?? '') ?>">

                <div class="filter-section mb-4">
                    <div class="fw-bold mb-3 border-bottom pb-2">Kategori</div>
                    <?php if(isset($categories)): ?>
                    <?php foreach($categories as $cat): ?>
                    <label class="custom-check d-block mb-2 pointer-cursor">
                        <input type="checkbox" name="kategori[]" value="<?= $cat['id'] ?>" class="me-2"
                            <?= (isset($filter_kategori) && is_array($filter_kategori) && in_array($cat['id'], $filter_kategori)) ? 'checked' : '' ?>>
                        <?= esc($cat['name']) ?>
                    </label>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <div class="filter-section mb-4">
                    <div class="fw-bold mb-3 border-bottom pb-2">Harga (Rp)</div>
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <input type="number" name="min" class="form-control form-control-sm" placeholder="Min"
                            value="<?= esc($filter_min ?? '') ?>">
                        <span>-</span>
                        <input type="number" name="max" class="form-control form-control-sm" placeholder="Max"
                            value="<?= esc($filter_max ?? '') ?>">
                    </div>
                </div>

                <div class="filter-section mb-4">
                    <div class="fw-bold mb-3 border-bottom pb-2">Rating</div>
                    <label class="custom-check d-block mb-2 pointer-cursor">
                        <input type="radio" name="rating" value="4" class="me-2"
                            <?= (isset($filter_rating) && $filter_rating == '4') ? 'checked' : '' ?>>
                        <span class="text-warning"><i class="fas fa-star"></i></span> 4 Keatas
                    </label>
                    <label class="custom-check d-block mb-2 pointer-cursor">
                        <input type="radio" name="rating" value="5" class="me-2"
                            <?= (isset($filter_rating) && $filter_rating == '5') ? 'checked' : '' ?>>
                        <span class="text-warning"><i class="fas fa-star"></i></span> 5 Sempurna
                    </label>
                </div>

                <div class="filter-section mb-4">
                    <div class="fw-bold mb-3 border-bottom pb-2">Warna</div>
                    <input type="hidden" name="color" id="inputColor" value="<?= esc($filter_color ?? '') ?>">

                    <div class="d-flex flex-wrap gap-2">
                        <?php 
                        $colors = [
                            'Hitam' => '#000000', 
                            'Putih' => '#ffffff', 
                            'Biru' => '#0d6efd', 
                            'Merah' => '#dc3545', 
                            'Kuning' => '#ffc107', 
                            'Hijau' => '#198754',
                            'Navy' => '#000080',
                            'Abu-abu' => '#808080'
                        ];
                        ?>
                        <?php foreach($colors as $name => $hex): ?>
                        <div class="color-option <?= (isset($filter_color) && $filter_color == $name) ? 'active' : '' ?>"
                            style="background-color: <?= $hex ?>;" title="<?= $name ?>"
                            onclick="setFilter('color', '<?= $name ?>')">
                            <?php if(isset($filter_color) && $filter_color == $name): ?>
                            <i class="fas fa-check text-white"
                                style="font-size: 12px; filter: drop-shadow(0 0 2px rgba(0,0,0,0.5));"></i>
                            <?php endif; ?>
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <?php if(isset($filter_color) && $filter_color): ?>
                    <div class="mt-2 text-danger small" style="cursor:pointer" onclick="setFilter('color', '')">
                        <i class="fas fa-times"></i> Hapus Filter Warna
                    </div>
                    <?php endif; ?>
                </div>

                <div class="filter-section mb-4">
                    <div class="fw-bold mb-3 border-bottom pb-2">Ukuran</div>
                    <input type="hidden" name="size" id="inputSize" value="<?= esc($filter_size ?? '') ?>">

                    <div class="d-flex flex-wrap gap-2">
                        <?php $sizes = ['S','M','L','XL','XXL','All Size']; ?>
                        <?php foreach($sizes as $s): ?>
                        <div class="size-option <?= (isset($filter_size) && $filter_size == $s) ? 'active' : '' ?>"
                            onclick="setFilter('size', '<?= $s ?>')">
                            <?= $s ?>
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <?php if(isset($filter_size) && $filter_size): ?>
                    <div class="mt-2 text-danger small" style="cursor:pointer" onclick="setFilter('size', '')">
                        <i class="fas fa-times"></i> Hapus Filter Ukuran
                    </div>
                    <?php endif; ?>
                </div>

                <button type="submit" class="btn btn-dark w-100 mt-4 py-2 fw-bold text-uppercase"
                    style="letter-spacing: 1px;">
                    Terapkan Filter
                </button>
                <a href="<?= base_url('kategori') ?>" class="btn btn-outline-secondary w-100 mt-2 btn-sm">Reset
                    Semua</a>

            </form>
        </div>

        <div class="col-lg-9">

            <div class="cat-banner mb-4 p-4 bg-dark text-white rounded">
                <div class="cat-banner-content animate-up">
                    <h2 class="fw-bold mb-0 text-uppercase">ALL COLLECTION</h2>
                    <p class="mb-0 text-white-50">Koleksi terbaru untuk gaya terbaikmu.</p>
                </div>
            </div>

            <div class="row row-cols-2 row-cols-md-3 g-4">

                <?php if(empty($products)): ?>
                <div class="col-12 text-center py-5">
                    <i class="fas fa-box-open fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">Produk tidak ditemukan.</h5>
                    <p>Coba kurangi filter pencarian Anda.</p>
                </div>
                <?php else: ?>

                <?php foreach ($products as $p): ?>
                <div class="col">
                    <div class="product-card h-100 border-0 shadow-sm rounded overflow-hidden">

                        <a href="<?= base_url('detail/' . $p['slug']) ?>"
                            class="product-link text-decoration-none text-dark">

                            <div class="card-img-wrap position-relative">
                                <?php if(strtotime($p['created_at']) > strtotime('-7 days')): ?>
                                <span class="position-absolute top-0 start-0 m-2 badge bg-success">NEW</span>
                                <?php elseif($p['total_sold'] > 50): ?>
                                <span class="position-absolute top-0 start-0 m-2 badge bg-warning text-dark">HOT</span>
                                <?php endif; ?>

                                <img src="<?= base_url('uploads/products/' . ($p['image'] ? $p['image'] : 'default.jpg')) ?>"
                                    class="w-100" style="height: 250px; object-fit: cover;" alt="<?= esc($p['name']) ?>"
                                    onerror="this.src='https://via.placeholder.com/500x500?text=No+Image'">
                            </div>

                            <div class="p-3">
                                <small class="text-muted text-uppercase fw-bold" style="font-size: 11px;">
                                    <?= esc($p['category_name'] ?? 'Outfit') ?>
                                </small>
                                <h6 class="fw-bold mb-1 text-truncate"><?= esc($p['name']) ?></h6>

                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="fw-bold fs-6">Rp <?= number_format($p['price'], 0, ',', '.') ?></span>
                                    <?php if(isset($p['rating']) && $p['rating'] > 0): ?>
                                    <small class="text-warning"><i class="fas fa-star"></i> <?= $p['rating'] ?></small>
                                    <?php endif; ?>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mt-2">
                                    <?php if(!empty($p['color'])): ?>
                                    <small class="text-muted" style="font-size: 11px;">
                                        <i class="fas fa-palette"></i> <?= esc($p['color']) ?>
                                    </small>
                                    <?php endif; ?>
                                    <?php if(!empty($p['size'])): ?>
                                    <span class="badge bg-light text-dark border"><?= esc($p['size']) ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>

                        </a>

                    </div>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>

            </div>

            <div class="mt-5 d-flex justify-content-center">
                <?php if(isset($pager)): ?>
                <?= $pager->links('katalog', 'default_full') ?>
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>

<script>
function setFilter(type, value) {
    if (type === 'color') {
        const current = document.getElementById('inputColor').value;
        document.getElementById('inputColor').value = (current === value) ? '' : value;
    } else if (type === 'size') {
        const current = document.getElementById('inputSize').value;
        document.getElementById('inputSize').value = (current === value) ? '' : value;
    }
    // Langsung submit form biar user nggak usah pencet tombol 'Terapkan' lagi
    document.getElementById('filterForm').submit();
}
</script>

<style>
/* Style Checkbox Label */
.pointer-cursor {
    cursor: pointer;
    transition: all 0.2s;
}

.pointer-cursor:hover {
    color: #007bff;
}

/* Style Tombol Warna 'Gemoy' */
.color-option {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    cursor: pointer;
    border: 2px solid #ddd;
    /* Border default abu-abu */
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    /* Efek membal */
}

.color-option:hover {
    transform: scale(1.15);
    /* Membesar saat hover */
    border-color: #999;
}

.color-option.active {
    border: 2px solid #333;
    /* Border gelap saat aktif */
    box-shadow: 0 0 0 3px #fff, 0 0 0 5px #007bff;
    /* Efek Ring Ganda Biru */
    transform: scale(1.1);
}

/* Style Tombol Ukuran 'Gemoy' */
.size-option {
    min-width: 45px;
    height: 35px;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #fff;
    border: 1px solid #ced4da;
    border-radius: 6px;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    padding: 0 8px;
    transition: all 0.2s ease;
}

.size-option:hover {
    border-color: #333;
    background-color: #f8f9fa;
}

.size-option.active {
    background-color: #212529;
    /* Hitam Gelap */
    color: #fff;
    border-color: #212529;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.15);
}
</style>

<?= $this->endSection(); ?>