<?= $this->extend('landing/layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h3 class="fw-bold text-center mb-4">Daftar Akun Baru</h3>

                    <?php if (session()->getFlashdata('errors')) : ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                            <li><?= $error ?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                    <?php endif; ?>

                    <form action="<?= base_url('auth/register') ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="fullname" class="form-control" value="<?= old('fullname') ?>"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control" value="<?= old('email') ?>" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Konfirmasi Password</label>
                                <input type="password" name="confpassword" class="form-control" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-dark w-100 py-2">Daftar Sekarang</button>
                    </form>

                    <div class="text-center mt-3">
                        <small>Sudah punya akun? <a href="<?= base_url('login') ?>"
                                class="text-decoration-none fw-bold">Login disini</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>