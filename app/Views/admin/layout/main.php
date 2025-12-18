<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Admin Dashboard' ?> - HL Outfit</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/admin.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <div class="logo">
                <i class="fas fa-shopping-bag"></i>
                <span>HL Outfit</span>
            </div>
        </div>

        <nav class="sidebar-nav">
            <a href="<?= base_url('admin/dashboard') ?>"
                class="nav-item <?= $active_menu == 'dashboard' ? 'active' : '' ?>">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>

            <a href="<?= base_url('admin/orders') ?>" class="nav-item <?= $active_menu == 'orders' ? 'active' : '' ?>">
                <i class="fas fa-shopping-cart"></i>
                <span>Kelola Order</span>
            </a>

            <a href="<?= base_url('admin/products') ?>"
                class="nav-item <?= $active_menu == 'products' ? 'active' : '' ?>">
                <i class="fas fa-box"></i>
                <span>Manajemen Produk</span>
            </a>

            <a href="<?= base_url('admin/admins') ?>" class="nav-item <?= $active_menu == 'admins' ? 'active' : '' ?>">
                <i class="fas fa-user-shield"></i>
                <span>Kelola Admin</span>
            </a>
        </nav>

        <div class="sidebar-footer">
            <a href="<?= base_url('admin/logout') ?>" class="nav-item logout">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="main-wrapper">
        <!-- Navbar -->
        <header class="navbar">
            <div class="navbar-left">
                <button class="menu-toggle" id="menuToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <h1 class="page-title"><?= $page_title ?? 'Dashboard' ?></h1>
            </div>

            <div class="navbar-right">
                <div class="notification">
                    <i class="fas fa-bell"></i>
                    <span class="badge">3</span>
                </div>

                <div class="admin-profile">
                    <div class="profile-info">
                        <span class="admin-name"><?= session()->get('admin_name') ?? 'Super Admin' ?></span>
                        <span class="admin-role">Administrator</span>
                    </div>
                    <div class="profile-avatar">
                        <i class="fas fa-user-circle"></i>
                    </div>
                </div>
            </div>
        </header>

        <!-- Content Area -->
        <main class="content">
            <?= $this->renderSection('content') ?>
        </main>
    </div>

    <script>
        // Simple toggle sidebar for mobile
        const menuToggle = document.getElementById('menuToggle');
        const sidebar = document.querySelector('.sidebar');

        menuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('active');
        });
    </script>
</body>

</html>