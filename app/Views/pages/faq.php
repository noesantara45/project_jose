<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<style>
/* 1. Header Section yang Bersih */
.faq-header {
    background-color: #f8f9fa;
    padding: 100px 0 60px;
    /* Padding atas besar untuk kompensasi navbar */
    text-align: center;
    border-bottom: 1px solid #e9ecef;
}

.faq-title {
    font-weight: 900;
    color: #222;
    letter-spacing: -1px;
}

/* Search Input Visual */
.faq-search-box {
    max-width: 600px;
    margin: 30px auto 0;
    position: relative;
}

.faq-input {
    border-radius: 50px;
    padding: 15px 30px;
    padding-right: 60px;
    border: 2px solid #eee;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.03);
    font-size: 1rem;
    transition: 0.3s;
}

.faq-input:focus {
    border-color: #333;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
}

.faq-search-icon {
    position: absolute;
    right: 25px;
    top: 50%;
    transform: translateY(-50%);
    color: #999;
}

/* 2. Kategori Judul */
.faq-cat-title {
    font-weight: 800;
    font-size: 1.3rem;
    margin-top: 50px;
    margin-bottom: 25px;
    display: flex;
    align-items: center;
    color: #333;
}

.faq-cat-icon {
    margin-right: 15px;
    color: #ffc107;
    /* Kuning */
}

/* 3. Styling Accordion (Tanya Jawab) */
/* Menghilangkan border default bootstrap biar lebih bersih */
.accordion-item {
    border: 1px solid #f0f0f0;
    margin-bottom: 15px;
    border-radius: 12px !important;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.02);
}

.accordion-button {
    font-weight: 700;
    /* Pertanyaan ditebalkan */
    font-size: 1.05rem;
    padding: 20px 25px;
    color: #444;
    background: #fff;
    box-shadow: none !important;
    /* Hapus garis biru saat diklik */
}

/* Saat accordion terbuka */
.accordion-button:not(.collapsed) {
    color: #000;
    background-color: #fcfcfc;
    border-bottom: 2px solid #ffc107;
    /* Aksen garis kuning di bawahnya */
}

/* Isi Jawaban */
.accordion-body {
    padding: 25px;
    line-height: 1.7;
    color: #666;
    background-color: #fff;
}

.accordion-body ul,
.accordion-body ol {
    padding-left: 20px;
    margin-top: 10px;
}

.accordion-body li {
    margin-bottom: 8px;
}

/* 4. CTA Footer Box */
.faq-cta-box {
    background: #f8f9fa;
    border-radius: 20px;
    padding: 50px;
    text-align: center;
    border: 1px solid #eee;
    margin-top: 60px;
}
</style>

<section class="faq-header">
    <div class="container">
        <h1 class="display-5 faq-title mb-3">Pusat Bantuan</h1>
        <p class="lead text-muted mb-4 w-75 mx-auto">Temukan jawaban cepat mengenai pengiriman, pembayaran, dan layanan
            HLOutfit lainnya di sini.</p>

        <div class="faq-search-box">
            <input type="text" class="form-control faq-input" placeholder="Cari pertanyaan (contoh: 'retur barang')...">
            <i class="fas fa-search faq-search-icon"></i>
        </div>
    </div>
</section>


<section class="py-5 bg-white">
    <div class="container pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="faq-cat-title border-bottom pb-3">
                    <i class="fas fa-truck faq-cat-icon fa-lg"></i> Pengiriman & Pesanan
                </div>

                <div class="accordion" id="accordionPengiriman">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Berapa lama estimasi pengiriman barang?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionPengiriman">
                            <div class="accordion-body">
                                Estimasi pengiriman reguler kami adalah:
                                <ul>
                                    <li><strong>Jabodetabek:</strong> 1-2 hari kerja.</li>
                                    <li><strong>Pulau Jawa:</strong> 2-3 hari kerja.</li>
                                    <li><strong>Luar Pulau Jawa:</strong> 3-5 hari kerja.</li>
                                </ul>
                                Pesanan yang masuk dan terkonfirmasi sebelum pukul 14.00 WIB akan diproses dan
                                diserahkan ke ekspedisi pada hari yang sama.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Bagaimana cara melacak resi pesanan saya?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionPengiriman">
                            <div class="accordion-body">
                                Setelah pesanan dikirim, kami akan mengirimkan nomor resi melalui email. Anda dapat
                                menggunakan nomor resi tersebut untuk melacak status paket di website resmi jasa
                                ekspedisi terkait (JNE, J&T, atau SiCepat).
                            </div>
                        </div>
                    </div>
                </div>


                <div class="faq-cat-title border-bottom pb-3">
                    <i class="fas fa-credit-card faq-cat-icon fa-lg"></i> Metode Pembayaran
                </div>
                <div class="accordion" id="accordionPembayaran">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Apakah tersedia metode bayar di tempat (COD)?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionPembayaran">
                            <div class="accordion-body">
                                Ya, kami menyediakan layanan Cash On Delivery (COD) untuk area-area tertentu yang
                                terjangkau oleh mitra logistik kami. Opsi COD akan muncul saat checkout jika alamat Anda
                                mendukung layanan ini. Mohon pastikan ada penerima di alamat yang dituju saat kurir
                                datang.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Apakah pembayaran online di website ini aman?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                            data-bs-parent="#accordionPembayaran">
                            <div class="accordion-body">
                                Sangat aman. Website kami menggunakan enkripsi SSL untuk melindungi data Anda. Semua
                                transaksi pembayaran online (Transfer Bank, E-Wallet, Kartu Kredit) diproses melalui
                                Payment Gateway resmi yang diawasi oleh Bank Indonesia. Kami tidak menyimpan data kartu
                                kredit Anda.
                            </div>
                        </div>
                    </div>
                </div>


                <div class="faq-cat-title border-bottom pb-3">
                    <i class="fas fa-undo faq-cat-icon fa-lg"></i> Retur & Penukaran
                </div>
                <div class="accordion" id="accordionRetur">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                Bolehkah saya menukar ukuran jika tidak pas?
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                            data-bs-parent="#accordionRetur">
                            <div class="accordion-body">
                                Tentu saja! Kami ingin Anda mendapatkan fit yang sempurna. Anda bisa mengajukan
                                penukaran ukuran maksimal 3 hari setelah barang diterima. Syaratnya barang harus dalam
                                kondisi baru, belum dicuci, dan tag/label masih terpasang. Ongkos kirim penukaran
                                ditanggung pembeli.
                            </div>
                        </div>
                    </div>
                </div>


                <div class="faq-cta-box">
                    <h3 class="fw-bold mb-3">Masih butuh bantuan?</h3>
                    <p class="text-muted mb-4">Jika pertanyaan Anda tidak terjawab di atas, jangan ragu untuk
                        menghubungi tim support kami.</p>
                    <a href="<?= base_url('contact') ?>"
                        class="btn btn-dark btn-lg rounded-pill px-5 fw-bold shadow-sm">
                        <i class="fas fa-envelope me-2"></i> Hubungi Kami
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>