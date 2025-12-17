<?= $this->extend('landing/layout/template'); ?>

<?= $this->section('content'); ?>

<link rel="stylesheet" href="<?= base_url('assets/css/landing/profile.css') ?>">

<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
    rel="stylesheet">

<div class="container py-5 mt-4" style="font-family: 'Plus Jakarta Sans', sans-serif;">

    <div class="d-flex justify-content-between align-items-center mb-5 animate-up">
        <div>
            <h2 class="fw-bold display-6 mb-1">Pengaturan Akun</h2>
            <p class="text-muted mb-0">Atur informasi profil dan keamanan akun Anda.</p>
        </div>
        <div class="d-none d-md-block">
            <span class="badge bg-dark rounded-pill px-3 py-2">HLOutfit Member</span>
        </div>
    </div>

    <div class="row g-4">

        <div class="col-lg-4 animate-up delay-1">
            <div class="card card-profile h-100">
                <div class="profile-cover">
                    <div class="position-absolute top-0 end-0 p-3">
                        <span class="badge bg-white text-dark shadow-sm"><i class="fas fa-star text-warning me-1"></i>
                            Basic Tier</span>
                    </div>
                </div>

                <div class="card-body text-center pt-0 pb-4 px-4">
                    <div class="profile-avatar-wrapper mb-3">
                        <img src="https://ui-avatars.com/api/?name=<?= urlencode($user['fullname']) ?>&background=111&color=fff&size=256&bold=true"
                            class="rounded-circle profile-avatar" alt="Profile">
                    </div>

                    <h4 class="fw-bold mb-1"><?= esc($user['fullname']) ?></h4>
                    <p class="text-muted small mb-3"><?= esc($user['email']) ?></p>

                    <div class="d-flex justify-content-center gap-2 mb-4">
                        <div class="badge-member">
                            <i class="fas fa-calendar-alt"></i> Join: <?= date('M Y', strtotime($user['created_at'])) ?>
                        </div>
                    </div>

                    <hr class="opacity-10 my-4">

                    <div class="text-start">
                        <h6 class="fw-bold text-uppercase small text-muted mb-3 ls-1">Menu Pintas</h6>
                        <div class="list-group list-group-flush">
                            <a href="#"
                                class="list-group-item list-group-item-action border-0 px-0 d-flex justify-content-between align-items-center active fw-bold bg-transparent text-dark">
                                <span><i class="fas fa-user-circle me-3 text-muted"></i> Edit Profil</span>
                                <i class="fas fa-chevron-right small text-muted"></i>
                            </a>
                            <a href="<?= base_url('cart') ?>"
                                class="list-group-item list-group-item-action border-0 px-0 d-flex justify-content-between align-items-center">
                                <span><i class="fas fa-shopping-bag me-3 text-muted"></i> Keranjang Saya</span>
                                <i class="fas fa-chevron-right small text-muted"></i>
                            </a>
                        </div>
                    </div>

                    <div class="d-grid mt-5">
                        <a href="<?= base_url('logout') ?>" class="btn btn-outline-danger py-2 rounded-pill fw-bold"
                            style="border-width: 2px;">
                            <i class="fas fa-sign-out-alt me-2"></i> Log Out
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8 animate-up delay-2">
            <div class="card card-profile">
                <div class="card-body p-4 p-lg-5">

                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-dark text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="width: 40px; height: 40px;">
                            <i class="fas fa-pen"></i>
                        </div>
                        <h5 class="fw-bold mb-0">Edit Informasi Pribadi</h5>
                    </div>

                    <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success border-0 rounded-3 mb-4 d-flex align-items-center shadow-sm">
                            <i class="fas fa-check-circle fs-4 me-3"></i>
                            <div><?= session()->getFlashdata('success') ?></div>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('error')) : ?>
                        <div class="alert alert-danger border-0 rounded-3 mb-4 d-flex align-items-center shadow-sm">
                            <i class="fas fa-exclamation-triangle fs-4 me-3"></i>
                            <div><?= session()->getFlashdata('error') ?></div>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('profile/update') ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label-custom">Nama Lengkap</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input type="text" name="fullname" class="form-control form-control-custom"
                                        value="<?= esc($user['fullname']) ?>" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label-custom">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="email" class="form-control form-control-custom text-muted"
                                        value="<?= esc($user['email']) ?>" readonly style="background-color: #f8f9fa;">
                                    <span class="input-group-text bg-light border-start-0"><i
                                            class="fas fa-lock text-muted small"></i></span>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label-custom">Nomor WhatsApp</label>
                                <div class="input-group">
                                    <span class="input-group-text">🇮🇩 +62</span>
                                    <input type="number" name="phone_number" class="form-control form-control-custom"
                                        value="<?= esc($user['phone_number']) ?>" placeholder="8123xxxx" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label-custom">Alamat Utama</label>
                                <div class="input-group">
                                    <span class="input-group-text align-items-start pt-3"><i
                                            class="fas fa-map-marker-alt"></i></span>
                                    <textarea name="address_main" class="form-control form-control-custom form-textarea"
                                        rows="3" placeholder="Nama Jalan, RT/RW, Kelurahan, Kecamatan..."
                                        required><?= esc($user['address_main']) ?></textarea>
                                </div>
                                <div class="form-text small text-end mt-1 text-muted">Akan digunakan sebagai alamat
                                    pengiriman default.</div>
                            </div>

                            <div class="col-12 my-2">
                                <hr class="opacity-10">
                            </div>

                            <div class="col-md-12">
                                <div class="d-flex align-items-center mb-3">
                                    <h6 class="fw-bold mb-0 me-2">Ganti Password</h6>
                                    <span class="badge bg-light text-muted border">Opsional</span>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    <input type="password" name="password" class="form-control form-control-custom"
                                        placeholder="Ketik password baru jika ingin mengubahnya...">
                                </div>
                            </div>

                            <div class="col-12 mt-4 text-end">
                                <button type="submit"
                                    class="btn btn-dark rounded-pill px-5 py-3 fw-bold shadow hover-scale">
                                    <i class="fas fa-save me-2"></i> SIMPAN PERUBAHAN
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection(); ?>