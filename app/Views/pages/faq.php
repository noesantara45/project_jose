<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<style>
/* 1. HEADER MINIMALIS & BERSIH */
.faq-header-section {
    background-color: #f8f9fa;
    /* Latar belakang abu terang bersih */
    padding: 120px 0 80px;
    /* Padding atas lebih besar untuk kompensasi navbar */
    text-align: center;
    border-bottom: 1px solid #eee;
}

.faq-title {
    font-size: 2.5rem;
    font-weight: 900;
    letter-spacing: -1px;
    color: #222;
    margin-bottom: 15px;
}

.faq-subtitle {
    font-size: 1.1rem;
    color: #666;
    max-width: 600px;
    margin: 0 auto 40px;
}

/* SEARCH INPUT YANG LEBIH CLEAN */
.faq-search-wrap {
    position: relative;
    max-width: 550px;
    margin: 0 auto;
}

.faq-search-input {
    padding: 18px 30px;
    padding-right: 55px;
    border-radius: 12px;
    /* Sudut tidak terlalu bulat */
    border: 2px solid #eee;
    /* Border halus */
    font-size: 1rem;
    background: #fff;
    transition: 0.3s;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.03);
}

.faq-search-input:focus {
    border-color: #222;
    /* Fokus jadi hitam */
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
}

.faq-search-btn-icon {
    position: absolute;
    right: 20px;
    top: 50%;
    transform: translateY(-50%);
    color: #999;
    font-size: 1.1rem;
    background: none;
    border: none;
}

/* 2. KATEGORI HEADER */
.faq-category-title {
    font-size: 1.5rem;
    font-weight: 800;
    color: #222;
    margin: 60px 0 30px;
    /* Jarak antar kategori */
    display: flex;
    align-items: center;
    padding-bottom: 15px;
    border-bottom: 2px solid #f0f0f0;
}

.faq-cat-icon {
    width: 40px;
    height: 40px;
    background: #fff4e6;
    color: #ffc107;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 15px;
    font-size: 1.2rem;
}

/* 3. ACCORDION MODERN & RAPI (Bagian Penting) */
.accordion-modern .accordion-item {
    border: none;
    /* Hapus border bawaan */
    background: #fff;
    border-radius: 12px;
    margin-bottom: 15px;
    /* Jarak antar pertanyaan */
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
    /* Bayangan sangat halus */
    overflow: hidden;
    /* Agar radius sudut rapi saat dibuka */
    border: 1px solid #f5f5f5;
}

.accordion-modern .accordion-button {
    font-weight: 700;
    font-size: 1.05rem;
    padding: 22px 25px;
    background: #fff;
    color: #333;
    box-shadow: none !important;
    /* Hapus outline biru saat klik */
    transition: 0.3s;
}

/* Style saat accordion TERBUKA */
.accordion-modern .accordion-button:not(.collapsed) {
    background-color: #fcfcfc;
    /* Warna background sedikit berbeda saat aktif */
    color: #000;
    box-shadow: inset 0 -2px 0 #ffc107 !important;
    /* Garis aksen kuning di bawah */
}

/* Kustomisasi Ikon Panah */
.accordion-modern .accordion-button::after {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23333'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
    /* Pakai ikon hitam */
    transition: transform 0.3s ease-in-out;
}

.accordion-modern .accordion-button:not(.collapsed)::after {
    transform: rotate(-180deg);
    /* Putar ikon saat aktif */
}

.accordion-modern .accordion-body {
    padding: 10px 25px 30px;
    /* Padding bawah lebih besar */
    color: #555;
    line-height: 1.8;
    /* Jarak antar baris lebih lega */
    background-color: #fcfcfc;
    /* Samakan dengan header aktif */
}

.accordion-body ul,
.accordion-body ol {
    padding-left: 20px;
    margin-top: 10px;
}

.accordion-body li {
    margin-bottom: 8px;
}

/* CTA BOX BOTTOM */
.cta-help-section {
    padding: 80px 0;
    background: #fff;
    text-align: center;
}

.cta-help-box {
    max-width: 700px;
    margin: 0 auto;
    background: #f8f9fa;
    border-radius: 20px;
    padding: 50px;
    border: 1px solid #eee;
}

/* Helper */
.animate-up {
    animation: fadeInUp 0.6s ease-out;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>


<section class="faq-header-section animate-up">
    <div class="container">
        <h1 class="faq-title">Pusat Bantuan</h1>
        <p class="faq-subtitle">Ketik pertanyaan Anda di bawah atau jelajahi kategori yang sering ditanyakan oleh
            pelanggan kami.</p>

        <div class="faq-search-wrap">
            <input type="text" class="form-control faq-search-input"
                placeholder="Cari di sini (contoh: 'lacak pesanan')...">
            <button class="faq-search-btn-icon"><i class="fas fa-search"></i></button>
        </div>
    </div>
</section>


<section class="bg-white py-5 animate-up">
    <div class="container py-4 animate-up delay-1">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="faq-category-title">
                    <div class="faq-cat-icon"><i class="fas fa-truck"></i></div>
                    <div>Pengiriman & Pelacakan</div>
                </div>

                <div class="accordion accordion-modern" id="accordionPengiriman">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#ship1" aria-expanded="true">
                                Berapa lama estimasi pengiriman barang sampai?
                            </button>
                        </h2>
                        <div id="ship1" class="accordion-collapse collapse show" data-bs-parent="#accordionPengiriman">
                            <div class="accordion-body">
                                Estimasi pengiriman standar kami adalah:
                                <ul>
                                    <li><strong>Jabodetabek:</strong> 1-2 hari kerja.</li>
                                    <li><strong>Pulau Jawa:</strong> 2-3 hari kerja.</li>
                                    <li><strong>Luar Pulau Jawa:</strong> 3-5 hari kerja.</li>
                                </ul>
                                Waktu dihitung setelah pesanan diproses. Pesanan yang masuk sebelum jam 14.00 WIB akan
                                diproses di hari yang sama.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#ship2">
                                Bagaimana cara melacak resi pesanan saya?
                            </button>
                        </h2>
                        <div id="ship2" class="accordion-collapse collapse" data-bs-parent="#accordionPengiriman">
                            <div class="accordion-body">
                                Setelah paket diserahkan ke kurir, kami akan mengirimkan email notifikasi berisi Nomor
                                Resi (AWB). Anda bisa mengecek statusnya langsung di website resmi kurir terkait
                                (JNE/J&T/SiCepat) atau melalui menu "Pesanan Saya" di akun Anda.
                            </div>
                        </div>
                    </div>
                </div>


                <div class="faq-category-title mt-5">
                    <div class="faq-cat-icon"><i class="fas fa-credit-card"></i></div>
                    <div>Metode Pembayaran</div>
                </div>
                <div class="accordion accordion-modern" id="accordionPembayaran">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#pay1">
                                Apa saja pilihan pembayaran yang tersedia?
                            </button>
                        </h2>
                        <div id="pay1" class="accordion-collapse collapse" data-bs-parent="#accordionPembayaran">
                            <div class="accordion-body">
                                Kami menyediakan berbagai metode pembayaran yang aman:
                                <ul>
                                    <li>Virtual Account Bank (BCA, Mandiri, BNI, BRI) - Konfirmasi otomatis.</li>
                                    <li>E-Wallet (GoPay, OVO, ShopeePay, Dana).</li>
                                    <li>Kartu Kredit / Debit (Visa & Mastercard).</li>
                                    <li>COD (Bayar di Tempat) - Khusus area tertentu.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="faq-category-title mt-5">
                    <div class="faq-cat-icon"><i class="fas fa-undo"></i></div>
                    <div>Retur & Pengembalian</div>
                </div>
                <div class="accordion accordion-modern" id="accordionRetur">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#ret1">
                                Bolehkah saya menukar ukuran jika tidak pas?
                            </button>
                        </h2>
                        <div id="ret1" class="accordion-collapse collapse" data-bs-parent="#accordionRetur">
                            <div class="accordion-body">
                                <strong>Ya, tentu saja!</strong> Jika ukuran yang Anda pesan tidak sesuai, Anda dapat
                                mengajukan penukaran ukuran dalam waktu maksimal 3x24 jam setelah barang diterima.
                                <br><br>
                                Syaratnya: Barang harus dalam kondisi baru, belum dicuci, dan tag/label masih terpasang.
                                Ongkos kirim penukaran ukuran ditanggung oleh pembeli, kecuali jika kesalahan ada di
                                pihak kami (salah kirim barang/cacat).
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#ret2">
                                Bagaimana prosedur mengajukan komplain barang cacat?
                            </button>
                        </h2>
                        <div id="ret2" class="accordion-collapse collapse" data-bs-parent="#accordionRetur">
                            <div class="accordion-body">
                                Mohon maaf atas ketidaknyamanannya. Jika Anda menerima barang cacat, harap segera
                                hubungi Customer Service kami via WhatsApp atau Email dengan menyertakan:
                                <ol>
                                    <li>Nomor Pesanan.</li>
                                    <li>Video unboxing saat membuka paket (Wajib).</li>
                                    <li>Foto detail bagian yang cacat.</li>
                                </ol>
                                Tim kami akan segera memproses penggantian barang baru tanpa biaya tambahan.
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>


<section class="cta-help-section animate-up">
    <div class="container">
        <div class="cta-help-box">
            <h3 class="fw-bold mb-3">Belum menemukan jawaban?</h3>
            <p class="text-muted mb-4">Jika pertanyaan Anda tidak tercantum di atas, tim support kami siap membantu Anda
                secara langsung.</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="<?= base_url('contact') ?>" class="btn btn-dark rounded-pill px-4 py-3 fw-bold shadow-sm">
                    <i class="fas fa-envelope me-2"></i> Kirim Pesan
                </a>
                <a href="#" class="btn btn-outline-dark rounded-pill px-4 py-3 fw-bold">
                    <i class="fab fa-whatsapp me-2"></i> Chat WhatsApp
                </a>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>