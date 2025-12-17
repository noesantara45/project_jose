<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - HLOutfit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/landing/main.css') ?>">
</head>

<body>

    <div class="container-fluid p-0 overflow-hidden">
        <div class="row g-0 min-vh-100">

            <div class="col-md-6 col-lg-7 d-none d-md-block position-relative">
                <div class="bg-login-image"></div>
                <div class="login-img-overlay">
                    <h2 class="text-white fw-900 display-4">JOIN THE<br>MOVEMENT.</h2>
                    <p class="text-white-50 ls-1">Start your journey with HLOutfit today.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-5 d-flex align-items-center justify-content-center bg-white">
                <div class="login-form-wrapper">
                    <div class="mb-4">
                        <h1 class="fw-900 mb-1" style="font-size: 2.5rem;">Sign Up.</h1>
                        <p class="text-muted">Create your new account.</p>
                    </div>

                    <?php if (session()->getFlashdata('errors')) : ?>
                        <div class="alert alert-danger py-2 border-0 rounded-3 small mb-4">
                            <ul class="mb-0 ps-3">
                                <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                                    <li><?= $error ?></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('auth/register') ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="mb-3">
                            <label class="form-label small fw-bold text-uppercase text-muted ls-1">Full Name</label>
                            <input type="text" name="fullname" class="form-control modern-input"
                                value="<?= old('fullname') ?>" placeholder="Enter your full name" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold text-uppercase text-muted ls-1">Email</label>
                            <input type="email" name="email" class="form-control modern-input"
                                value="<?= old('email') ?>" placeholder="name@example.com" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold text-uppercase text-muted ls-1">Password</label>
                            <div class="position-relative">
                                <input type="password" name="password" id="passwordInput"
                                    class="form-control modern-input pe-5" placeholder="Create password" required>
                                <i class="far fa-eye text-muted position-absolute top-50 end-0 translate-middle-y me-3"
                                    id="toggleIcon" onclick="togglePassword('passwordInput', 'toggleIcon')"
                                    style="cursor: pointer;"></i>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label small fw-bold text-uppercase text-muted ls-1">Confirm
                                Password</label>
                            <div class="position-relative">
                                <input type="password" name="confpassword" id="confPasswordInput"
                                    class="form-control modern-input pe-5" placeholder="Repeat password" required>
                                <i class="far fa-eye text-muted position-absolute top-50 end-0 translate-middle-y me-3"
                                    id="toggleConfIcon" onclick="togglePassword('confPasswordInput', 'toggleConfIcon')"
                                    style="cursor: pointer;"></i>
                            </div>
                        </div>

                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn-login">DAFTAR SEKARANG</button>
                        </div>
                    </form>

                    <div class="text-center mt-4 pt-3 border-top">
                        <small class="text-muted">Sudah punya akun?
                            <a href="<?= base_url('login') ?>" class="text-dark fw-bold text-decoration-underline">Login
                                disini</a>
                        </small>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(inputId, iconId) {
            var x = document.getElementById(inputId);
            var icon = document.getElementById(iconId);
            if (x.type === "password") {
                x.type = "text";
                icon.classList.replace("fa-eye", "fa-eye-slash");
            } else {
                x.type = "password";
                icon.classList.replace("fa-eye-slash", "fa-eye");
            }
        }
    </script>
</body>

</html>