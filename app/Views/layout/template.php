<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'HLOutfit - Streetwear' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/landing/main.css') ?>">
</head>

<body>
    <?php $uri = service('uri'); $current = $uri->getSegment(1); $isHome = ($current == '' || $current == 'home' || $current == 'index'); ?>
    <nav class="navbar navbar-expand-lg <?= $isHome ? 'navbar-transparent' : 'navbar-solid' ?>">
        <div class="container">
            <a class="navbar-brand fw-bold fs-3 ls-1" href="<?= base_url('/') ?>"><i
                    class="fas fa-bolt text-warning me-1"></i>HLOutfit.</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navContent"><i class="fas fa-bars" style="color: inherit;"></i></button>
            <div class="collapse navbar-collapse" id="navContent">
                <ul class="navbar-nav ms-auto align-items-center me-3 mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link px-3 <?= ($current == '') ? 'active' : '' ?>"
                            href="<?= base_url('/') ?>">Home</a></li>
                    <li class="nav-item"><a class="nav-link px-3 <?= ($current == 'kategori') ? 'active' : '' ?>"
                            href="<?= base_url('kategori') ?>">Kategori</a></li>
                </ul>
                <div class="search-wrapper-nav d-none d-lg-block me-3">
                    <form action="" class="nav-search-form position-relative">
                        <input type="text" class="nav-search-input" placeholder="Cari produk..." autocomplete="off">
                        <button class="nav-search-btn"><i class="fas fa-search"></i></button>
                    </form>
                </div>
                <div class="d-flex align-items-center gap-3 mt-3 mt-lg-0">
                    <a href="<?= base_url('cart') ?>" class="btn position-relative p-0 me-2 btn-cart-icon"><i
                            class="fas fa-shopping-bag fa-lg"></i><span class="cart-badge">2</span></a>
                    <a href="<?= base_url('login') ?>" class="btn btn-account rounded-pill px-4 py-2 shadow-sm fw-bold"
                        style="font-size: 13px; letter-spacing: 0.5px;">AKUN</a>
                </div>
            </div>
        </div>
    </nav>

    <main><?= $this->renderSection('content'); ?></main>

    <footer class="main-footer text-center">
        <div class="container">
            <div class="row justify-content-center mb-4">
                <div class="col-md-8">
                    <h4 class="fw-bold text-warning mb-3"><i class="fas fa-bolt me-1"></i>HLOutfit.</h4>
                    <p class="text-white-50 mb-4 px-md-5">Definisi baru dari gaya streetwear yang berani, otentik, dan
                        terjangkau untuk semua.</p>
                </div>
            </div>
            <div class="footer-links mb-4 d-flex justify-content-center flex-wrap gap-3">
                <a href="<?= base_url('/') ?>">Home</a><a href="<?= base_url('about') ?>">About Us</a><a
                    href="<?= base_url('contact') ?>">Contact</a><a href="<?= base_url('faq') ?>">FAQ</a><a
                    href="<?= base_url('privacy-policy') ?>">Privacy Policy</a>
            </div>
            <div class="footer-copyright">&copy; <?= date('Y'); ?> HLOutfit. Dibuat di Jakarta.</div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
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
    </script>
    <?= $this->renderSection('scripts'); ?>
</body>

</html>