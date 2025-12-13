<?php
$uri = service('uri');
$current = $uri->getSegment(1);
// Deteksi Home: Jika segment kosong ATAU 'home' ATAU 'index'
$isHome = ($current == '' || $current == 'home' || $current == 'index');
?>

<style>
/* CSS TRANSISI NAVBAR */
.navbar {
    padding: 15px 0;
    transition: all 0.4s ease;
    z-index: 1050;
}

/* --- 1. KHUSUS HALAMAN HOME (POSISI AWAL) --- */
.navbar-home {
    background-color: transparent !important;
    /* BENING TOTAL */
    position: fixed;
    /* Mengambang */
    top: 0;
    width: 100%;
    border-bottom: none;
}

/* Teks Putih di Awal */
.navbar-home .nav-link,
.navbar-home .navbar-brand,
.navbar-home .btn-cart-icon {
    color: #fff !important;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
}

/* Search Bar Transparan */
.navbar-home .nav-search-input {
    background: rgba(255, 255, 255, 0.2) !important;
    border: 1px solid rgba(255, 255, 255, 0.5) !important;
    color: #fff !important;
}

.navbar-home .nav-search-input::placeholder {
    color: rgba(255, 255, 255, 0.8);
}

.navbar-home .nav-search-btn {
    color: #fff !important;
}

.navbar-home .btn-account {
    background: #fff;
    color: #000;
    border: none;
}


/* --- 2. SAAT SCROLL (ATAU HALAMAN LAIN) --- */
.navbar-scrolled,
.navbar-default {
    background-color: #ffffff !important;
    /* Putih Solid */
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
    padding: 12px 0;
    position: sticky;
    top: 0;
}

/* Teks Hitam */
.navbar-scrolled .nav-link,
.navbar-default .nav-link,
.navbar-scrolled .navbar-brand,
.navbar-default .navbar-brand,
.navbar-scrolled .btn-cart-icon,
.navbar-default .btn-cart-icon {
    color: #333 !important;
    text-shadow: none;
}

.navbar-scrolled .nav-link.active,
.navbar-default .nav-link.active {
    color: #000 !important;
    font-weight: 800;
}

/* Search Bar Normal */
.navbar-scrolled .nav-search-input,
.navbar-default .nav-search-input {
    background: #f1f1f1 !important;
    border: 1px solid #ddd !important;
    color: #333 !important;
}

.navbar-scrolled .nav-search-btn,
.navbar-default .nav-search-btn {
    color: #555 !important;
}

.navbar-scrolled .btn-account,
.navbar-default .btn-account {
    background: #000;
    color: #fff;
}


/* --- ELEMENT LAIN --- */
.search-wrapper-nav {
    position: relative;
}

.nav-search-input {
    border-radius: 50px;
    padding: 8px 20px;
    padding-right: 40px;
    width: 280px;
    transition: 0.3s;
    outline: none;
}

.nav-search-btn {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    border: none;
    background: none;
}

/* Popup Search */
.search-popup {
    position: absolute;
    top: 120%;
    right: 0;
    width: 350px;
    background: #fff;
    border: 1px solid #eee;
    border-radius: 12px;
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
    padding: 20px;
    display: none;
    opacity: 0;
    transform: translateY(-10px);
    transition: all 0.2s;
}

.search-popup.active {
    display: block;
    opacity: 1;
    transform: translateY(0);
}

.popular-tag {
    display: inline-block;
    background: #fff;
    color: #555;
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 12px;
    margin-right: 5px;
    margin-bottom: 8px;
    border: 1px solid #e0e0e0;
    transition: 0.2s;
    text-decoration: none;
}

.popular-tag:hover {
    background: #000;
    color: #fff;
    border-color: #000;
}

.history-item {
    display: flex;
    align-items: center;
    padding: 10px 0;
    color: #444;
    text-decoration: none;
    font-size: 14px;
    border-bottom: 1px dashed #eee;
}
</style>

<nav class="navbar navbar-expand-lg <?= $isHome ? 'navbar-home' : 'navbar-default' ?>">
    <div class="container">

        <a class="navbar-brand fw-bold fs-3" href="<?= base_url('/') ?>" style="letter-spacing: -1px;">
            <i class="fas fa-bolt text-warning me-1"></i>tara.
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navContent">
            <i class="fas fa-bars text-secondary"></i>
        </button>

        <div class="collapse navbar-collapse" id="navContent">

            <ul class="navbar-nav ms-auto align-items-center me-4">
                <li class="nav-item">
                    <a class="nav-link fw-bold <?= ($current == '') ? 'active' : '' ?>"
                        href="<?= base_url('/') ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold <?= ($current == 'kategori') ? 'active' : '' ?>"
                        href="<?= base_url('kategori') ?>">Kategori</a>
                </li>
            </ul>

            <div class="search-wrapper-nav d-none d-lg-block me-3">
                <form action="" class="nav-search-form position-relative">
                    <input type="text" id="searchInput" class="nav-search-input" placeholder="Cari Cargo, Hoodie..."
                        autocomplete="off">
                    <button class="nav-search-btn"><i class="fas fa-search"></i></button>
                </form>

                <div class="search-popup text-start" id="searchPopup">
                    <div class="mb-3">
                        <h6 class="fw-bold small text-uppercase text-dark mb-2"
                            style="font-size: 11px; letter-spacing: 1px;">🔥 Pencarian Populer</h6>
                        <div>
                            <a href="#" class="popular-tag">Cargo Pants</a>
                            <a href="#" class="popular-tag">Oversize Tee</a>
                            <a href="#" class="popular-tag">Jaket Denim</a>
                        </div>
                    </div>
                    <div>
                        <h6 class="fw-bold small text-uppercase text-dark mb-2"
                            style="font-size: 11px; letter-spacing: 1px;">🕒 Terakhir Dilihat</h6>
                        <a href="#" class="history-item"><i class="fas fa-history me-2 text-muted"></i> Kemeja Hitam
                            Polos</a>
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center gap-3">
                <a href="<?= base_url('cart') ?>" class="btn position-relative p-0 me-2 btn-cart-icon">
                    <i class="fas fa-shopping-bag fa-lg"></i>
                    <span
                        class="position-absolute top-0 start-100 translate-middle badge rounded-circle bg-danger border border-light p-1"
                        style="font-size: 10px;">2</span>
                </a>

                <a href="<?= base_url('login') ?>" class="btn btn-account rounded-pill px-4 py-2 shadow-sm fw-bold"
                    style="font-size: 14px;">
                    Akun
                </a>
            </div>
        </div>
    </div>
</nav>

<script>
// 1. LOGIKA SCROLL (KHUSUS HOME)
<?php if($isHome): ?>
window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 50) {
        // Scroll Turun: Jadi Putih
        navbar.classList.add('navbar-scrolled');
        navbar.classList.remove('navbar-home');
    } else {
        // Posisi Atas: Jadi Transparan
        navbar.classList.add('navbar-home');
        navbar.classList.remove('navbar-scrolled');
    }
});
<?php endif; ?>

// 2. SEARCH POPUP
document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById('searchInput');
    const searchPopup = document.getElementById('searchPopup');

    if (searchInput && searchPopup) {
        searchInput.addEventListener('focus', () => searchPopup.classList.add('active'));
        document.addEventListener('click', (e) => {
            if (!searchInput.contains(e.target) && !searchPopup.contains(e.target)) {
                searchPopup.classList.remove('active');
            }
        });
    }
});
</script>