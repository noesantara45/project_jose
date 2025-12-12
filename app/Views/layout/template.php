<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HLOutfit - Streetwear & Modern Fashion</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');

    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fa;
        color: #444;
        overflow-x: hidden;
        line-height: 1.7;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        color: #111;
        margin-bottom: 0.8rem;
    }

    .section-gap {
        padding-top: 80px;
        padding-bottom: 80px;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(40px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-up {
        animation: fadeInUp 0.8s cubic-bezier(0.2, 0.8, 0.2, 1) forwards;
        opacity: 0;
    }

    /* Navbar Style */
    .navbar {
        background-color: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        padding: 20px 0;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.03);
        transition: 0.3s;
    }

    .navbar-brand {
        font-weight: 800;
        font-size: 26px;
        letter-spacing: -1px;
        margin-right: 30px;
    }

    .nav-link {
        font-weight: 500;
        color: #555 !important;
        margin: 0 15px;
        font-size: 15px;
    }

    .nav-link.active {
        color: #000 !important;
        font-weight: 700;
    }

    .nav-search-form {
        position: relative;
        margin-right: 20px;
    }

    .nav-search-input {
        border-radius: 50px;
        padding: 10px 25px;
        padding-right: 45px;
        border: 1px solid #eee;
        background-color: #f9f9f9;
        width: 250px;
        transition: 0.3s;
        font-size: 14px;
    }

    .nav-search-input:focus {
        background-color: #fff;
        width: 320px;
        outline: none;
        border-color: #333;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }

    .nav-search-btn {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        border: none;
        background: none;
        color: #888;
    }

    /* Card & Content Style */
    .hero-section {
        height: 100vh;
        background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1552374196-1ab2a1c593e8?q=80&w=1470');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        display: flex;
        align-items: center;
        color: white;
        margin-bottom: 80px;
    }

    .hero-title {
        font-size: 4rem;
        font-weight: 800;
        line-height: 1.1;
        letter-spacing: -1px;
        margin-bottom: 25px;
        color: white;
    }

    .service-box {
        background: white;
        padding: 40px 25px;
        border-radius: 20px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.04);
        text-align: center;
        transition: 0.3s;
        height: 100%;
        border: 1px solid #f9f9f9;
    }

    .service-box:hover {
        transform: translateY(-10px);
        border-color: transparent;
    }

    .service-icon {
        font-size: 2.5rem;
        margin-bottom: 25px;
        color: #333;
    }

    .scroll-container-wrapper {
        position: relative;
    }

    .horizontal-scroll {
        display: flex;
        overflow-x: auto;
        gap: 30px;
        padding: 20px 10px 50px 10px;
        scroll-behavior: smooth;
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    .horizontal-scroll::-webkit-scrollbar {
        display: none;
    }

    .product-card-item {
        min-width: 290px;
        max-width: 290px;
        flex-shrink: 0;
    }

    .scroll-btn {
        position: absolute;
        top: 45%;
        transform: translateY(-50%);
        width: 55px;
        height: 55px;
        background: #fff;
        border-radius: 50%;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
        border: none;
        z-index: 10;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: 0.3s;
    }

    .scroll-btn:hover {
        background: #111;
        color: #fff;
        transform: translateY(-50%) scale(1.1);
    }

    .scroll-btn.left {
        left: -25px;
    }

    .scroll-btn.right {
        right: -25px;
    }

    .card-custom {
        border: none;
        border-radius: 20px;
        overflow: hidden;
        background: #fff;
        transition: 0.4s;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.03);
        height: 100%;
    }

    .card-custom:hover {
        transform: translateY(-10px);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.1);
    }

    .product-img {
        height: 300px;
        object-fit: cover;
        width: 100%;
    }

    .card-body-custom {
        padding: 20px;
    }

    .exclusive-section {
        background-color: #111;
        color: white;
        border-radius: 40px;
        overflow: hidden;
        margin: 80px 0;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    }

    .exclusive-img {
        height: 100%;
        min-height: 450px;
        object-fit: cover;
    }

    .exclusive-content {
        padding: 60px;
    }

    /* Footer Style */
    footer {
        background: #111;
        color: #999;
        padding-bottom: 40px;
        margin-top: 100px;
    }

    .footer-title {
        color: #fff;
        margin-bottom: 25px;
        font-weight: 700;
        letter-spacing: 0.5px;
    }

    .footer-link {
        margin-bottom: 15px;
        display: block;
        color: #999;
        text-decoration: none;
        transition: 0.3s;
    }

    .footer-link:hover {
        color: #fff;
        transform: translateX(5px);
    }
    </style>
</head>

<body>

    <?= $this->include('layout/navbar'); ?>

    <?= $this->renderSection('content'); ?>

    <?= $this->include('layout/footer'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    function scrollProduk(direction) {
        const container = document.getElementById('produkScroll');
        const scrollAmount = 320;
        if (direction === 'left') {
            container.scrollBy({
                left: -scrollAmount,
                behavior: 'smooth'
            });
        } else {
            container.scrollBy({
                left: scrollAmount,
                behavior: 'smooth'
            });
        }
    }
    </script>
</body>

</html>