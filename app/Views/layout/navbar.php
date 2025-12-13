<?php
$uri = service('uri');
$current = $uri->getSegment(1);
// Deteksi Home: Jika segment kosong ATAU 'home' ATAU 'index'
$isHome = ($current == '' || $current == 'home' || $current == 'index');
?>

<style>
/* --- CSS DASAR NAVBAR (BASE) --- */
.navbar {
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 1050;
    padding: 20px 0;
    transition: all 0.4s ease-in-out;
}

/* ============================================================
       SETTING FONT & ACTIVE STATE MENU LINK (BAGIAN PENTING)
    ============================================================ */
.navbar .nav-link {
    font-weight: 800 !important;
    /* Extra Bold */
    font-size: 15px;
    transition: color 0.3s ease;
    letter-spacing: 0.5px;
    position: relative;
    /* Penting untuk garis bawah */
    margin: 0 10px;
}

/* --- GARIS BAWAH MENU AKTIF --- */
/* Membuat garis pseudo-element sebelum link */
.navbar .nav-link::after {
    content: '';
    position: absolute;
    width: 0;
    /* Awalnya lebarnya 0 (tidak terlihat) */
    height: 3px;
    /* Ketebalan garis */
    bottom: -5px;
    /* Jarak dari teks */
    left: 0;
    background-color: currentColor;
    /* Warna mengikuti warna teksnya */
    transition: width 0.3s ease-in-out;
    /* Animasi melebar */
}

/* Saat Link Halaman AKTIF atau DI-HOVER: Lebarkan garisnya jadi 100% */
.navbar .nav-link.active::after,
.navbar .nav-link:hover::after {
    width: 100%;
}

/* ============================================================ */


/* =========================================
       STATE 1: MODE TRANSPARAN (Khusus Home di Atas)
    ========================================= */
.navbar-transparent {
    background-color: transparent !important;
    box-shadow: none;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

/* Teks & Icon PUTIH */
.navbar-transparent .navbar-brand,
.navbar-transparent .nav-link,
.navbar-transparent .btn-cart-icon i {
    color: #ffffff !important;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
}

/* Saat hover/aktif di transparan, warna teksnya jadi agak terang */
.navbar-transparent .nav-link:hover,
.navbar-transparent .nav-link.active {
    color: rgba(255, 255, 255, 0.9) !important;
}

/* Search Bar Gaya Transparan */
.navbar-transparent .nav-search-input {
    background: rgba(255, 255, 255, 0.2) !important;
    border: 1px solid rgba(255, 255, 255, 0.5) !important;
    color: #fff !important;
}

.navbar-transparent .nav-search-input::placeholder {
    color: rgba(255, 255, 255, 0.8);
}

.navbar-transparent .nav-search-btn {
    color: #fff !important;
}

.navbar-transparent .btn-account {
    background: #ffffff;
    color: #000000;
    border: none;
}


/* =========================================
       STATE 2: MODE SOLID (Saat Scroll / Halaman Lain)
    ========================================= */
.navbar-solid {
    background-color: #ffffff !important;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
}

/* Teks & Icon HITAM */
.navbar-solid .navbar-brand,
.navbar-solid .nav-link,
.navbar-solid .btn-cart-icon i {
    color: #222222 !important;
    text-shadow: none;
}

/* Link Aktif & Hover di mode solid, warna teks jadi hitam pekat */
.navbar-solid .nav-link:hover,
.navbar-solid .nav-link.active {
    color: #000000 !important;
}

/* Search Bar Gaya Solid */
.navbar-solid .nav-search-input {
    background: #f5f5f5 !important;
    border: 1px solid #eee !important;
    color: #333 !important;
}

.navbar-solid .nav-search-btn {
    color: #666 !important;
}

.navbar-solid .btn-account {
    background: #000000;
    color: #ffffff;
}


/* --- ELEMENT LAINNYA --- */
.search-wrapper-nav {
    position: relative;
}

.nav-search-input {
    border-radius: 50px;
    padding: 10px 20px;
    padding-right: 45px;
    width: 280px;
    transition: 0.3s;
    outline: none;
    font-size: 14px;
}

.nav-search-btn {
    position: absolute;
    right: 12px;
    top: 50%;
    transform: translateY(-50%);
    border: none;
    background: none;
}

.btn-cart-icon {
    position: relative;
    transition: 0.3s;
}

.cart-badge {
    position: absolute;
    top: -5px;
    right: -8px;
    background: #dc3545;
    color: white;
    font-size: 10px;
    font-weight: bold;
    padding: 3px 6px;
    border-radius: 50%;
    border: 2px solid transparent;
}

.navbar-solid .cart-badge {
    border-color: #fff;
}

/* Popup Search */
.search-popup {
    position: absolute;
    top: 130%;
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

<nav class="navbar navbar-expand-lg <?= $isHome ? 'navbar-transparent' : 'navbar-solid' ?>">
    <div class="container">

        <a class="navbar-brand fw-bold fs-3" href="<?= base_url('/') ?>" style="letter-spacing: -1px;">
            <i class="fas fa-bolt text-warning me-1"></i>HLOutfit.
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navContent">
            <i class="fas fa-bars" style="color: inherit;"></i>
        </button>

        <div class="collapse navbar-collapse" id="navContent">

            <ul class="navbar-nav ms-auto align-items-center me-4 mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link px-3 <?= ($current == '') ? 'active' : '' ?>"
                        href="<?= base_url('/') ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 <?= ($current == 'kategori') ? 'active' : '' ?>"
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

            <div class="d-flex align-items-center gap-3 mt-3 mt-lg-0">
                <a href="<?= base_url('cart') ?>" class="btn position-relative p-0 me-2 btn-cart-icon">
                    <i class="fas fa-shopping-bag fa-lg"></i>
                    <span class="cart-badge">2</span>
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
// LOGIKA SCROLL HOME
<?php if($isHome): ?>
window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 50) {
        navbar.classList.add('navbar-solid');
        navbar.classList.remove('navbar-transparent');
    } else {
        navbar.classList.add('navbar-transparent');
        navbar.classList.remove('navbar-solid');
    }
});
<?php endif; ?>

// SEARCH POPUP JS
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