<?= $this->extend('admin/layout/main') ?>

<?= $this->section('content') ?>

<div class="table-container">
    <div class="table-header">
        <h2>Kelola Admin</h2>
        <button class="btn btn-success" onclick="openModal('add')">
            <i class="fas fa-plus"></i> Tambah Admin
        </button>
    </div>

    <?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success"
        style="padding: 10px; background: #d4edda; color: #155724; margin-bottom: 15px; border-radius: 5px;">
        <?= session()->getFlashdata('success') ?>
    </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger"
        style="padding: 10px; background: #f8d7da; color: #721c24; margin-bottom: 15px; border-radius: 5px;">
        <?= session()->getFlashdata('error') ?>
    </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('errors')) : ?>
    <div class="alert alert-danger"
        style="padding: 10px; background: #f8d7da; color: #721c24; margin-bottom: 15px; border-radius: 5px;">
        <ul>
            <?php foreach (session()->getFlashdata('errors') as $error) : ?>
            <li><?= esc($error) ?></li>
            <?php endforeach ?>
        </ul>
    </div>
    <?php endif; ?>

    <table class="data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Nama Lengkap</th>
                <th>Tanggal Dibuat</th>
                <th style="width: 150px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($admins)): ?>
            <?php foreach($admins as $i => $admin): ?>
            <tr>
                <td><strong><?= $i + 1 ?></strong></td>
                <td><?= esc($admin['username']) ?></td>
                <td><?= esc($admin['name']) ?></td>
                <td><?= date('d M Y, H:i', strtotime($admin['created_at'])) ?></td>
                <td>
                    <button class="btn btn-warning btn-sm" onclick="editAdmin(
                                '<?= $admin['id'] ?>', 
                                '<?= esc($admin['username']) ?>', 
                                '<?= esc($admin['name']) ?>'
                            )">
                        <i class="fas fa-edit"></i>
                    </button>

                    <?php if($admin['id'] != 1): ?>
                    <button class="btn btn-danger btn-sm" onclick="deleteAdmin(<?= $admin['id'] ?>)">
                        <i class="fas fa-trash"></i>
                    </button>
                    <?php else: ?>
                    <button class="btn btn-secondary btn-sm" disabled title="Super Admin tidak bisa dihapus">
                        <i class="fas fa-lock"></i>
                    </button>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php else: ?>
            <tr>
                <td colspan="5" style="text-align:center;">Belum ada data admin.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<div class="modal" id="adminModal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 id="modalTitle">Tambah Admin Baru</h3>
            <button class="modal-close" onclick="closeModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <form id="adminForm" action="<?= base_url('admin/admins/save') ?>" method="post">
                <?= csrf_field() ?>
                <input type="hidden" id="admin_id" name="id">

                <div class="form-group">
                    <label>Username <span style="color: red;">*</span></label>
                    <input type="text" id="admin_username" name="username" class="form-control" placeholder="username"
                        required>
                </div>

                <div class="form-group">
                    <label>Nama Lengkap <span style="color: red;">*</span></label>
                    <input type="text" id="admin_name" name="name" class="form-control" placeholder="Nama Admin"
                        required>
                </div>

                <div class="form-group" id="passwordGroup">
                    <label>Password <span id="starPassword" style="color: red;">*</span></label>
                    <input type="password" id="admin_password" name="password" class="form-control"
                        placeholder="Minimal 6 karakter">
                    <small id="passHelp" style="color: var(--text-light); display:none;">Kosongkan jika tidak ingin
                        mengubah password</small>
                </div>

                <div class="form-group">
                    <label>Konfirmasi Password <span id="starConfirm" style="color: red;">*</span></label>
                    <input type="password" id="admin_confirm_password" name="confirm_password" class="form-control"
                        placeholder="Ulangi password">
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> <span id="btnSubmit">Simpan Admin</span>
                    </button>
                    <button type="button" class="btn" onclick="closeModal()">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 9999;
    align-items: center;
    justify-content: center;
}

.modal.active {
    display: flex;
}

.modal-content {
    background: #fff;
    border-radius: 12px;
    width: 90%;
    max-width: 500px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
    animation: slideDown 0.3s ease;
}

@keyframes slideDown {
    from {
        transform: translateY(-50px);
        opacity: 0;
    }

    to {
        transform: translateY(0);
        opacity: 1;
    }
}

.modal-header {
    padding: 20px 25px;
    border-bottom: 1px solid #eee;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.modal-header h3 {
    font-size: 18px;
    font-weight: 600;
    color: #333;
    margin: 0;
}

.modal-close {
    background: none;
    border: none;
    font-size: 20px;
    color: #999;
    cursor: pointer;
}

.modal-body {
    padding: 25px;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: 500;
}

.form-control {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-sizing: border-box;
}

.form-actions {
    display: flex;
    gap: 10px;
    justify-content: flex-end;
    margin-top: 20px;
}
</style>

<script>
// Pastikan script jalan setelah DOM loaded
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('adminModal');
    const modalTitle = document.getElementById('modalTitle');
    const adminForm = document.getElementById('adminForm');
    const passHelp = document.getElementById('passHelp');
    const btnSubmit = document.getElementById('btnSubmit');

    // Inputs
    const inputId = document.getElementById('admin_id');
    const inputUser = document.getElementById('admin_username');
    const inputName = document.getElementById('admin_name');
    const inputPass = document.getElementById('admin_password');
    const inputConfirm = document.getElementById('admin_confirm_password');
    const starPass = document.getElementById('starPassword');
    const starConfirm = document.getElementById('starConfirm');

    // Kita attach function ke window supaya bisa dipanggil onclick dari HTML
    window.openModal = function(mode) {
        resetForm();
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';

        if (mode === 'add') {
            modalTitle.textContent = 'Tambah Admin Baru';
            btnSubmit.textContent = 'Simpan Admin';

            // Password Wajib saat Add
            inputPass.required = true;
            inputConfirm.required = true;
            starPass.style.display = 'inline';
            starConfirm.style.display = 'inline';
            passHelp.style.display = 'none';
        }
    };

    window.closeModal = function() {
        modal.classList.remove('active');
        document.body.style.overflow = 'auto';
    };

    window.resetForm = function() {
        adminForm.reset();
        inputId.value = '';
    };

    window.editAdmin = function(id, username, name) {
        resetForm(); // Bersihkan dulu

        // Isi data ke form
        inputId.value = id;
        inputUser.value = username;
        inputName.value = name;

        // UI Adjustments
        modalTitle.textContent = 'Edit Admin';
        btnSubmit.textContent = 'Update Admin';

        // Password Opsional saat Edit
        inputPass.required = false;
        inputConfirm.required = false;
        starPass.style.display = 'none';
        starConfirm.style.display = 'none';
        passHelp.style.display = 'block';

        modal.classList.add('active');
    };

    window.deleteAdmin = function(id) {
        if (confirm('Apakah Anda yakin ingin menghapus admin ini? Data tidak bisa dikembalikan.')) {
            window.location.href = '<?= base_url('admin/admins/delete/') ?>' + id;
        }
    };

    // Form Validation
    adminForm.addEventListener('submit', function(e) {
        const password = inputPass.value;
        const confirmPassword = inputConfirm.value;

        if (password && password !== confirmPassword) {
            e.preventDefault();
            alert('Password dan konfirmasi password tidak cocok!');
            return false;
        }
    });

    // Close modal on outside click
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            closeModal();
        }
    });
});
</script>

<?= $this->endSection() ?>