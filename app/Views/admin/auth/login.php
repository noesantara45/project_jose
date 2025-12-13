<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - HL Outfit</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    :root {
        --primary-color: #1e3a5f;
        --secondary-color: #2c5282;
        --accent-color: #f59e0b;
        --text-dark: #1f2937;
        --text-light: #6b7280;
        --bg-light: #f9fafb;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .login-container {
        background: white;
        border-radius: 16px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        overflow: hidden;
        width: 100%;
        max-width: 420px;
        animation: slideUp 0.5s ease;
    }

    @keyframes slideUp {
        from {
            transform: translateY(30px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .login-header {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        padding: 40px 30px;
        text-align: center;
        color: white;
    }

    .logo {
        width: 70px;
        height: 70px;
        background: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .logo i {
        font-size: 36px;
        color: var(--primary-color);
    }

    .login-header h1 {
        font-size: 24px;
        margin-bottom: 5px;
        font-weight: 700;
    }

    .login-header p {
        font-size: 14px;
        opacity: 0.9;
    }

    .login-form {
        padding: 40px 30px;
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: var(--text-dark);
        font-weight: 500;
        font-size: 14px;
    }

    .input-group {
        position: relative;
    }

    .input-group i {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--text-light);
        font-size: 16px;
    }

    .form-control {
        width: 100%;
        padding: 14px 15px 14px 45px;
        border: 2px solid #e5e7eb;
        border-radius: 10px;
        font-size: 14px;
        transition: all 0.3s ease;
        background-color: var(--bg-light);
    }

    .form-control:focus {
        outline: none;
        border-color: var(--primary-color);
        background-color: white;
    }

    .password-toggle {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: var(--text-light);
        cursor: pointer;
        font-size: 16px;
    }

    .password-toggle:hover {
        color: var(--primary-color);
    }

    .btn-login {
        width: 100%;
        padding: 14px;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 10px;
    }

    .btn-login:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(30, 58, 95, 0.4);
    }

    .btn-login:active {
        transform: translateY(0);
    }

    .alert {
        padding: 12px 15px;
        border-radius: 8px;
        margin-bottom: 20px;
        font-size: 14px;
        display: none;
    }

    .alert.show {
        display: block;
    }

    .alert-danger {
        background-color: #fee2e2;
        color: #991b1b;
        border: 1px solid #fecaca;
    }

    .alert-success {
        background-color: #d1fae5;
        color: #065f46;
        border: 1px solid #a7f3d0;
    }

    .login-footer {
        text-align: center;
        padding: 20px;
        border-top: 1px solid #e5e7eb;
        font-size: 13px;
        color: var(--text-light);
    }

    @media (max-width: 480px) {
        .login-container {
            margin: 0 10px;
        }

        .login-form {
            padding: 30px 20px;
        }
    }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-header">
            <div class="logo">
                <i class="fas fa-shopping-bag"></i>
            </div>
            <h1>HL Outfit Admin</h1>
            <p>Silakan login untuk melanjutkan</p>
        </div>

        <form class="login-form" action="<?= base_url('admin/auth/login') ?>" method="POST">
            <div id="alertBox" class="alert"></div>

            <div class="form-group">
                <label>Username</label>
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" name="username" class="form-control" placeholder="Masukkan username" required
                        autofocus>
                </div>
            </div>

            <div class="form-group">
                <label>Password</label>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="password" name="password" class="form-control"
                        placeholder="Masukkan password" required>
                    <button type="button" class="password-toggle" id="togglePassword">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>

            <button type="submit" class="btn-login">
                <i class="fas fa-sign-in-alt"></i> Login
            </button>
        </form>

        <div class="login-footer">
            <p>&copy; 2025 HL Outfit. All rights reserved.</p>
        </div>
    </div>

    <script>
    // Toggle password visibility
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');

    togglePassword.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        const icon = this.querySelector('i');
        icon.classList.toggle('fa-eye');
        icon.classList.toggle('fa-eye-slash');
    });

    // Show alert example (you can trigger this from backend)
    function showAlert(message, type = 'danger') {
        const alertBox = document.getElementById('alertBox');
        alertBox.textContent = message;
        alertBox.className = 'alert alert-' + type + ' show';

        setTimeout(() => {
            alertBox.classList.remove('show');
        }, 5000);
    }

    // Example: showAlert('Username atau password salah!', 'danger');
    </script>
</body>

</html>