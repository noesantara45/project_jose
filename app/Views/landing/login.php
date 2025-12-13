<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'HLOutfit' ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('assets/css/landing/main.css') ?>">

</head>

<body>

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
                        Belum punya akun? <a href="<?= base_url('register') ?>" class="text-dark fw-bold">Daftar
                            Disini</a>
                    </p>
                </div>

            </form>

        </div>
    </div>

</body>

</html>