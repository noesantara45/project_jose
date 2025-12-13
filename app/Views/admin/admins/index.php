<?= $this->extend('admin/layout/main') ?>

<?= $this->section('content') ?>

<div class="table-container">
    <div class="table-header">
        <h2>Kelola Admin</h2>
        <button class="btn btn-success" onclick="openModal()">
            <i class="fas fa-plus"></i> Tambah Admin
        </button>
    </div>

    <table class="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Nama Lengkap</th>
                <th>Tanggal Dibuat</th>
                <th style="width: 150px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>1</strong></td>
                <td>admin</td>
                <td>Super Admin</td>
                <td>13 Des 2025, 16:36</td>
                <td>
                    <button class="btn btn-warning btn-sm" onclick="editAdmin(1, 'admin', 'Super Admin')">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="btn btn-danger btn-sm" onclick="deleteAdmin(1)" disabled
                        title="Tidak bisa hapus super admin">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <td><strong>2</strong></td>
                <td>manager</td>
                <td>Manager Toko</td>
                <td>13 Des 2025, 17:00</td>
                <td>
                    <button class="btn btn-warning btn-sm" onclick="editAdmin(2, 'manager', 'Manager Toko')">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="btn btn-danger btn-sm" onclick="deleteAdmin(2)">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <td><strong>3</strong></td>
                <td>staff</td>
                <td>Staff Admin</td>
                <td>13 Des 2025, 18:15</td>
                <td>
                    <button class="btn btn-warning btn-sm" onclick="editAdmin(3, 'staff', 'Staff Admin')">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="btn btn-danger btn-sm" onclick="deleteAdmin(3)">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Modal Form -->
<div class="modal" id="adminModal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 id="modalTitle">Tambah Admin Baru</h3>
            <button class="modal-close" onclick="closeModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <form id="adminForm">
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
                    <label>Password <span style="color: red;">*</span></label>
                    <input type="password" id="admin_password" name="password" class="form-control"
                        placeholder="Minimal 6 karakter" required>
                    <small style="color: var(--text-light);">Kosongkan jika tidak ingin mengubah password</small>
                </div>

                <div class="form-group">
                    <label>Konfirmasi Password <span style="color: red;">*</span></label>
                    <input type="password" id="admin_confirm_password" name="confirm_password" class="form-control"
                        placeholder="Ulangi password" required>
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

<?= $this->endSection() ?>

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
    background: var(--bg-white);
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
    border-bottom: 1px solid var(--border-color);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.modal-header h3 {
    font-size: 18px;
    font-weight: 600;
    color: var(--text-dark);
}

.modal-close {
    background: none;
    border: none;
    font-size: 20px;
    color: var(--text-light);
    cursor: pointer;
    padding: 5px;
}

.modal-close:hover {
    color: var(--danger-color);
}

.modal-body {
    padding: 25px;
}
</style>

<script>
const modal = document.getElementById('adminModal');
const modalTitle = document.getElementById('modalTitle');
const adminForm = document.getElementById('adminForm');
const passwordGroup = document.getElementById('passwordGroup');
const btnSubmit = document.getElementById('btnSubmit');

// Open modal
function openModal() {
    modal.classList.add('active');
    document.body.style.overflow = 'hidden';
}

// Close modal
function closeModal() {
    modal.classList.remove('active');
    document.body.style.overflow = 'auto';
    resetForm();
}

// Reset form
function resetForm() {
    adminForm.reset();
    document.getElementById('admin_id').value = '';
    modalTitle.textContent = 'Tambah Admin Baru';
    btnSubmit.textContent = 'Simpan Admin';
    document.getElementById('admin_password').required = true;
    document.getElementById('admin_confirm_password').required = true;
    passwordGroup.querySelector('small').style.display = 'none';
}

// Edit admin
function editAdmin(id, username, name) {
    document.getElementById('admin_id').value = id;
    document.getElementById('admin_username').value = username;
    document.getElementById('admin_name').value = name;
    document.getElementById('admin_password').value = '';
    document.getElementById('admin_confirm_password').value = '';

    modalTitle.textContent = 'Edit Admin';
    btnSubmit.textContent = 'Update Admin';
    document.getElementById('admin_password').required = false;
    document.getElementById('admin_confirm_password').required = false;
    passwordGroup.querySelector('small').style.display = 'block';

    openModal();
}

// Delete admin
function deleteAdmin(id) {
    if (confirm('Apakah Anda yakin ingin menghapus admin ini?')) {
        // Ajax delete atau redirect
        window.location.href = '<?= base_url('admin/admins/delete/') ?>' + id;
    }
}

// Form validation
adminForm.addEventListener('submit', function(e) {
    e.preventDefault();

    const password = document.getElementById('admin_password').value;
    const confirmPassword = document.getElementById('admin_confirm_password').value;

    if (password && password !== confirmPassword) {
        alert('Password dan konfirmasi password tidak cocok!');
        return false;
    }

    if (password && password.length < 6) {
        alert('Password minimal 6 karakter!');
        return false;
    }

    // Ajax submit atau normal submit
    alert('Admin berhasil disimpan!');
    closeModal();
});

// Close modal on outside click
modal.addEventListener('click', function(e) {
    if (e.target === modal) {
        closeModal();
    }
});
</script>