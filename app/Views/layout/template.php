<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'HLOutfit' ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('assets/landing/main.css') ?>">

    <style>
    /* Override Font Default Bootstrap dengan Poppins */
    body {
        font-family: 'Poppins', sans-serif;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    main {
        flex: 1;
    }

    /* Agar footer selalu di bawah jika konten sedikit */

    /* Style Footer Sederhana */
    .main-footer {
        background: #111;
        color: #fff;
        padding: 30px 0;
        text-align: center;
        margin-top: auto;
    }

    .footer-links a {
        color: #999;
        text-decoration: none;
        margin: 0 10px;
        font-size: 0.9rem;
    }

    .footer-links a:hover {
        color: #fff;
    }
    </style>

</head>

<body>

    <?php
    // Logika PHP untuk mendeteksi halaman aktif
    $uri = service('uri');
    $current = $uri->getSegment(1);
    // Deteksi Home: Jika segment kosong ATAU 'home' ATAU 'index'
    $isHome = ($current == '' || $current == 'home' || $current == 'index');
    ?>

    <nav class="navbar navbar-expand-lg <?= $isHome ? 'navbar-transparent' : 'navbar-solid' ?>">
        <div class="container">

            <a class="navbar-brand fw-bold fs-3" href="<?= base_url('/') ?>" style="letter-spacing: -1px;">
                <i class="fas fa-bolt text-warning me-1"></i>HLOutfit.
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navContent">
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
                    <li class="nav-item">
                        <a class="nav-link px-3 <?= ($current == 'about') ? 'active' : '' ?>"
                            href="<?= base_url('about') ?>">About</a>
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
                            </div>
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


    <main>
        <?= $this->renderSection('content'); ?>
    </main>


    <footer class="main-footer animate-up">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <h5 class="fw-bold text-warning mb-1"><i class="fas fa-bolt me-1"></i>HLOutfit.</h5>
                    <small class="text-white-50">&copy; <?= date('Y'); ?> All rights reserved.</small>
                </div>
                <div class="col-md-6 text-center text-md-end footer-links">
                    <a href="<?= base_url('about') ?>">About Us</a>
                    <a href="<?= base_url('contact') ?>">Contact</a>
                    <a href="<?= base_url('faq') ?>">FAQ</a>
                    <a href="<?= base_url('privacy-policy') ?>">Privacy Policy</a>
                </div>
            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    // --- SCRIPT NAVBAR (Pindahkan ke sini) ---

    // 1. LOGIKA SCROLL HOME (Ubah warna navbar saat di-scroll)
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

    // 2. SEARCH POPUP JS
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

    <?= $this->renderSection('scripts'); ?>

</body>

</html>