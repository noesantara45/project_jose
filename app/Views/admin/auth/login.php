<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal - HL Outfit</title>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --bg-color: #f3f4f6;
            --primary-black: #111827;
            --text-gray: #6b7280;
            --border-color: #e5e7eb;
            --accent-blue: #2563eb;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            background-color: var(--bg-color);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .main-wrapper {
            background: #fff;
            width: 100%;
            max-width: 1000px;
            height: 600px;
            border-radius: 24px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            display: flex;
            margin: 20px;
        }

        /* BAGIAN KIRI: BRANDING IMAGE */
        .brand-section {
            flex: 1;
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.8)),
                url('https://images.unsplash.com/photo-1441986300917-64674bd600d8?q=80&w=1470');
            background-size: cover;
            background-position: center;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 40px;
            color: white;
            position: relative;
        }

        .brand-logo {
            font-size: 24px;
            font-weight: 800;
            letter-spacing: -0.5px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .brand-quote h2 {
            font-size: 32px;
            line-height: 1.2;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .brand-quote p {
            opacity: 0.8;
            font-size: 14px;
        }

        /* BAGIAN KANAN: LOGIN FORM */
        .form-section {
            flex: 1;
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background-color: white;
        }

        .header-text {
            margin-bottom: 40px;
        }

        .header-text h3 {
            font-size: 24px;
            font-weight: 800;
            color: var(--primary-black);
            margin-bottom: 8px;
        }

        .header-text p {
            color: var(--text-gray);
            font-size: 14px;
        }

        /* INPUT STYLES */
        .form-group {
            margin-bottom: 24px;
        }

        .form-label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: var(--primary-black);
            margin-bottom: 8px;
        }

        .input-wrapper {
            position: relative;
        }

        .form-input {
            width: 100%;
            padding: 14px 16px;
            padding-left: 45px;
            /* Space for icon */
            border: 2px solid var(--border-color);
            border-radius: 12px;
            font-size: 14px;
            font-weight: 500;
            color: var(--primary-black);
            transition: all 0.2s;
            background: #f9fafb;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary-black);
            background: #fff;
            box-shadow: 0 0 0 4px rgba(0, 0, 0, 0.05);
        }

        .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 16px;
        }

        .toggle-password {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: none;
            cursor: pointer;
            color: #9ca3af;
            font-size: 16px;
            transition: color 0.2s;
        }

        .toggle-password:hover {
            color: var(--primary-black);
        }

        /* BUTTON */
        .btn-submit {
            width: 100%;
            padding: 16px;
            background-color: var(--primary-black);
            color: white;
            border: none;
            border-radius: 12px;
            font-weight: 700;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 10px;
        }

        .btn-submit:hover {
            background-color: #333;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        /* ALERTS */
        .alert-box {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 24px;
            font-size: 13px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-danger {
            background-color: #fef2f2;
            color: #991b1b;
            border: 1px solid #fee2e2;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .main-wrapper {
                height: auto;
                flex-direction: column;
                max-width: 400px;
            }

            .brand-section {
                padding: 30px;
                min-height: 200px;
            }

            .brand-quote {
                display: none;
                /* Sembunyikan quote di HP */
            }

            .form-section {
                padding: 40px 30px;
            }
        }
    </style>
</head>

<body>

    <div class="main-wrapper">

        <div class="brand-section">
            <div class="brand-logo">
                <i class="fas fa-layer-group text-warning"></i>
                <span>HL Admin<span style="color:#fbbf24">.</span></span>
            </div>

            <div class="brand-quote">
                <h2>Manage your<br>empire seamlessly.</h2>
                <p>Control products, orders, and customers from one centralized dashboard.</p>
            </div>

            <div style="font-size: 12px; opacity: 0.5;">
                &copy; 2025 HLOutfit Inc.
            </div>
        </div>

        <div class="form-section">
            <div class="header-text">
                <h3>Welcome Back!</h3>
                <p>Please verify your credentials to access the dashboard.</p>
            </div>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert-box alert-danger">
                    <i class="fas fa-exclamation-circle"></i>
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('admin/auth/login') ?>" method="POST">

                <div class="form-group">
                    <label class="form-label">Username</label>
                    <div class="input-wrapper">
                        <i class="fas fa-user input-icon"></i>
                        <input type="text" name="username" class="form-input" placeholder="Enter admin username"
                            required autofocus autocomplete="off">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Password</label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" name="password" id="password" class="form-input" placeholder="••••••••"
                            required>
                        <button type="button" class="toggle-password" onclick="togglePass()">
                            <i class="far fa-eye" id="eyeIcon"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" class="btn-submit">
                    SIGN IN TO DASHBOARD <i class="fas fa-arrow-right" style="margin-left:8px"></i>
                </button>

            </form>
        </div>

    </div>

    <script>
        function togglePass() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>

</html>