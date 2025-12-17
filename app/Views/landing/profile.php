<?= $this->extend('landing/layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container py-5 mt-5">

    <div class="mb-5 animate-up">
        <h2 class="fw-bold display-6">Akun Saya</h2>
        <p class="text-muted">Kelola informasi profil dan alamat pengiriman Anda.</p>
    </div>

    <div class="row g-5">

        <div class="col-lg-4 animate-up delay-1">
            <div class="card border-0 shadow-sm rounded-4 h-100 bg-light position-relative overflow-hidden">
                <div class="card-body p-4 text-center">

                    <div class="mb-4 position-relative d-inline-block">
                        <img src="https://ui-avatars.com/api/?name=<?= urlencode($user['fullname']) ?>&background=000&color=fff&size=128"
                            class="rounded-circle shadow" width="100" height="100" alt="Profile">
                    </div>

                    <h5 class="fw-bold mb-1"><?= esc($user['fullname']) ?></h5>
                    <p class="text-muted small mb-4"><?= esc($user['email']) ?></p>

                    <hr class="opacity-25 my-4">

                    <div class="d-flex justify-content-between text-start mb-3 px-3">
                        <span class="text-muted small">Bergabung Sejak</span>
                        <span class="fw-bold small"><?= date('d M Y', strtotime($user['created_at'])) ?></span>
                    </div>

                    <div class="d-grid gap-2 mt-5">
                        <a href="<?= base_url('logout') ?>" class="btn btn-outline-danger rounded-pill fw-bold">
                            <i class="fas fa-sign-out-alt me-2"></i> Keluar
                        </a>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-lg-8 animate-up delay-2">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4 p-lg-5">

                    <h4 class="fw-bold mb-4">Edit Profil</h4>

                    <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success border-0 rounded-3 mb-4 small">
                        <i class="fas fa-check-circle me-2"></i> <?= session()->getFlashdata('success') ?>
                    </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('error')) : ?>
                    <div class="alert alert-danger border-0 rounded-3 mb-4 small">
                        <i class="fas fa-exclamation-circle me-2"></i> <?= session()->getFlashdata('error') ?>
                    </div>
                    <?php endif; ?>

                    <form action="<?= base_url('profile/update') ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label small text-muted fw-bold text-uppercase ls-1">Nama
                                    Lengkap</label>
                                <input type="text" name="fullname"
                                    class="form-control form-control-lg fs-6 bg-light border-0"
                                    value="<?= esc($user['fullname']) ?>" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label small text-muted fw-bold text-uppercase ls-1">Alamat
                                    Email</label>
                                <input type="email"
                                    class="form-control form-control-lg fs-6 bg-light border-0 text-muted"
                                    value="<?= esc($user['email']) ?>" readonly disabled
                                    title="Email tidak dapat diubah">
                            </div>

                            <div class="col-md-12">
                                <label class="form-label small text-muted fw-bold text-uppercase ls-1">Nomor WhatsApp /
                                    HP</label>
                                <div class="input-group">
                                    <span class="input-group-text border-0 bg-light text-muted">+62</span>
                                    <input type="number" name="phone_number"
                                        class="form-control form-control-lg fs-6 bg-light border-0"
                                        value="<?= esc($user['phone_number']) ?>" placeholder="8123456789" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label small text-muted fw-bold text-uppercase ls-1">Alamat Pengiriman
                                    Utama</label>
                                <textarea name="address_main" class="form-control bg-light border-0" rows="4"
                                    placeholder="Jl. Contoh No. 123, Kecamatan, Kota..."
                                    required><?= esc($user['address_main']) ?></textarea>
                            </div>

                            <div class="col-12 my-3">
                                <hr class="opacity-10">
                            </div>

                            <div class="col-md-12">
                                <label class="form-label small text-muted fw-bold text-uppercase ls-1">Password Baru
                                    <span class="text-danger small text-transform-none">(Kosongkan jika tidak ingin
                                        mengganti)</span></label>
                                <input type="password" name="password"
                                    class="form-control form-control-lg fs-6 bg-light border-0"
                                    placeholder="Minimal 6 karakter">
                            </div>

                            <div class="col-12 mt-4 text-end">
                                <button type="submit"
                                    class="btn btn-dark rounded-pill px-5 py-3 fw-bold shadow-lg hover-scale">
                                    SIMPAN PERUBAHAN
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>

<style>
/* CSS Tambahan Khusus Halaman Profil */
.form-control:focus {
    box-shadow: none;
    background-color: #fff !important;
    border: 1px solid #000 !important;
}

.hover-scale {
    transition: transform 0.2s;
}

.hover-scale:hover {
    transform: scale(1.02);
}
</style>

<?= $this->endSection(); ?>