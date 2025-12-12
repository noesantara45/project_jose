<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<style>
/* Layout */
.auth-wrapper {
    background-color: #f8f9fa;
    min-height: 85vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
}

.auth-card {
    background: #fff;
    width: 100%;
    max-width: 450px;
    /* Fokus di tengah, ramping */
    border-radius: 16px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    padding: 40px;
    border: 1px solid #eee;
}

/* Form Styles */
.form-control {
    padding: 12px;
    border-radius: 8px;
    background-color: #fbfbfb;
    border: 1px solid #eee;
    font-size: 14px;
}

.form-control:focus {
    background-color: #fff;
    border-color: #000;
    box-shadow: none;
}

/* Tombol Utama */
.btn-login {
    background: #000;
    color: #fff;
    width: 100%;
    padding: 12px;
    border-radius: 8px;
    font-weight: 700;
    border: none;
    margin-top: 10px;
    transition: 0.3s;
}

.btn-login:hover {
    background: #333;
    transform: translateY(-2px);
}

/* --- TOMBOL SOSIAL FLAT (PERBAIKAN) --- */
.social-btn {
    width: 100%;
    padding: 10px;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 600;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    text-decoration: none;
    transition: 0.2s;
    border: 1px solid #eee;
    background: #fff;
    color: #555;
}

.social-btn:hover {
    background-color: #f9f9f9;
    border-color: #ccc;
    color: #000;
}

/* Warna Ikon Flat */
.icon-google {
    color: #DB4437;
}

/* Merah Google */
.icon-fb {
    color: #4267B2;
}

/* Biru FB */
</style>

<div class="auth-wrapper">
    <div class="auth-card animate-up">

        <div class="text-center mb-4">
            <h2 class="fw-bold">Login</h2>
            <p class="text-muted small">Selamat datang kembali di HLOutfit.</p>
        </div>

        <form action="<?= base_url('auth/attemptLogin') ?>" method="post">

            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email Address" required>
            </div>

            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember">
                    <label class="form-check-label small text-muted" for="remember">Ingat Saya</label>
                </div>
                <a href="#" class="small text-decoration-none fw-bold text-dark">Lupa?</a>
            </div>

            <button type="submit" class="btn-login">MASUK</button>

            <div class="text-center my-4 position-relative">
                <hr class="text-muted opacity-25">
                <span
                    class="position-absolute top-50 start-50 translate-middle bg-white px-2 small text-muted">atau</span>
            </div>

            <div class="row g-2">
                <div class="col-6">
                    <a href="#" class="social-btn">
                        <i class="fab fa-google icon-google fa-lg"></i> Google
                    </a>
                </div>
                <div class="col-6">
                    <a href="#" class="social-btn">
                        <i class="fab fa-facebook-f icon-fb fa-lg"></i> Facebook
                    </a>
                </div>
            </div>

            <div class="text-center mt-4">
                <p class="small text-muted mb-0">
                    Belum punya akun? <a href="<?= base_url('register') ?>" class="text-dark fw-bold">Daftar Disini</a>
                </p>
            </div>

        </form>

    </div>
</div>

<?= $this->endSection(); ?>