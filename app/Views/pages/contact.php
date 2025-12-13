<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<style>
/* HERO SECTION */
.contact-hero {
    height: 50vh;
    min-height: 400px;
    /* Gambar background bertema komunikasi/urban studio */
    background: linear-gradient(to right, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.4)), url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=1470');
    background-size: cover;
    background-position: center;
    display: flex;
    align-items: center;
    color: white;
    margin-top: 50px;
    /* Kompensasi navbar fixed */
    padding-top: 80px;
}

.contact-title {
    font-size: 3.5rem;
    font-weight: 900;
    letter-spacing: -1px;
}

/* CONTACT INFO BOXES (Kiri) */
.contact-info-box {
    padding: 30px;
    background: #fff;
    border-radius: 12px;
    border: 1px solid #eee;
    margin-bottom: 20px;
    transition: 0.3s;
    display: flex;
    align-items: flex-start;
}

.contact-info-box:hover {
    border-color: #222;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
}

.contact-icon-wrap {
    flex-shrink: 0;
    width: 50px;
    height: 50px;
    background: #f8f9fa;
    color: #222;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    margin-right: 20px;
}

.contact-label {
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-size: 0.9rem;
    margin-bottom: 8px;
    display: block;
    color: #888;
}

.contact-text {
    font-size: 1.1rem;
    font-weight: 600;
    color: #222;
    margin-bottom: 0;
    line-height: 1.4;
}

.contact-text a {
    text-decoration: none;
    color: inherit;
}

.contact-text a:hover {
    color: #0d6efd;
    text-decoration: underline;
}

/* MAP CONTAINER */
.map-container iframe {
    width: 100%;
    height: 300px;
    border-radius: 12px;
    border: 1px solid #eee;
    filter: grayscale(100%) contrast(1.2);
    /* Efek peta hitam putih biar estetik */
    transition: 0.3s;
}

.map-container iframe:hover {
    filter: grayscale(0%);
}

/* CONTACT FORM (Kanan) */
.form-wrapper {
    padding: 40px;
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
}

.custom-form-control {
    border: 2px solid #eee;
    border-radius: 8px;
    padding: 12px 20px;
    font-weight: 500;
    transition: 0.3s;
}

.custom-form-control:focus {
    border-color: #222;
    box-shadow: none;
    background: #fbfbfb;
}

.form-label-bold {
    font-weight: 700;
    font-size: 0.9rem;
    margin-bottom: 8px;
}

/* FAQ TEASER */
.faq-teaser-section {
    background: #f8f9fa;
    padding: 60px 0;
    text-align: center;
}

.section-gap {
    padding: 80px 0;
}
</style>


<section class="contact-hero animate-up">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold mb-4 ls-2">CUSTOMER
                    SUPPORT</span>
                <h1 style="color: white;" class="contact-title mb-3">GET IN TOUCH <br> WITH US.</h1>
                <p class="lead text-white-50 fw-light">Punya pertanyaan tentang pesanan, kolaborasi, atau sekadar ingin
                    menyapa? Kami siap mendengarkan.</p>
            </div>
        </div>
    </div>
</section>


<section class="section-gap bg-white">
    <div class="container">
        <div class="row g-5 animate-up">

            <div class="col-lg-5 pe-lg-5">
                <div class="mb-5">
                    <h3 class="fw-bold mb-4">Contact Information</h3>
                    <p class="text-muted">Tim support kami tersedia Senin sampai Jumat untuk membantu segala kebutuhan
                        fashion Anda.</p>
                </div>

                <div class="contact-info-box">
                    <div class="contact-icon-wrap"><i class="fas fa-map-marker-alt"></i></div>
                    <div>
                        <span class="contact-label">Headquarters</span>
                        <p class="contact-text">
                            Jl. Gaya Selatan No. 88,<br>
                            Kemang, Jakarta Selatan,<br>
                            Indonesia 12730
                        </p>
                    </div>
                </div>

                <div class="contact-info-box">
                    <div class="contact-icon-wrap"><i class="fas fa-headset"></i></div>
                    <div>
                        <span class="contact-label">Support Channels</span>
                        <p class="contact-text mb-2">
                            <a href="mailto:support@hloutfit.com">support@hloutfit.com</a>
                        </p>
                        <p class="contact-text">
                            <a href="tel:+6281234567890">+62 812-3456-7890</a> (WhatsApp Only)
                        </p>
                    </div>
                </div>

                <div class="contact-info-box mb-4">
                    <div class="contact-icon-wrap"><i class="far fa-clock"></i></div>
                    <div>
                        <span class="contact-label">Operating Hours</span>
                        <p class="contact-text mb-1">Senin - Jumat: 09:00 - 17:00 WIB</p>
                        <p class="contact-text text-muted small fw-normal">Sabtu - Minggu: Tutup (Slow Response)</p>
                    </div>
                </div>

                <div class="map-container mt-5">
                    <h5 class="fw-bold mb-3">Find Us on Map</h5>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.666467480555!2d106.82496467499012!3d-6.175387093811512!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5d2e764b12d%3A0x3d2ad6e1e0e9bcc8!2sMonas%20(Monumen%20Nasional)!5e0!3m2!1sid!2sid!4v1708673920568!5m2!1sid!2sid"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>


            <div class="col-lg-7">
                <div class="form-wrapper sticky-top" style="top: 100px; z-index: 1;">
                    <h3 class="fw-bold mb-4">Send Us a Message</h3>
                    <p class="text-muted mb-5">Silakan isi formulir di bawah ini. Tim kami biasanya membalas dalam waktu
                        1x24 jam kerja.</p>

                    <form action="" method="post">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label for="name" class="form-label form-label-bold">Full Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control custom-form-control" id="name"
                                    placeholder="John Doe" required>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label form-label-bold">Email Address <span
                                        class="text-danger">*</span></label>
                                <input type="email" class="form-control custom-form-control" id="email"
                                    placeholder="john@example.com" required>
                            </div>
                            <div class="col-12">
                                <label for="subject" class="form-label form-label-bold">Subject <span
                                        class="text-danger">*</span></label>
                                <select class="form-select custom-form-control" id="subject" required>
                                    <option value="" selected disabled>Pilih topik pesan...</option>
                                    <option value="order">Pertanyaan Pesanan & Pengiriman</option>
                                    <option value="product">Info Ukuran & Produk</option>
                                    <option value="return">Retur & Garansi</option>
                                    <option value="collab">Kolaborasi & Bisnis</option>
                                    <option value="other">Lainnya</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="message" class="form-label form-label-bold">Message <span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control custom-form-control" id="message" rows="6"
                                    placeholder="Tulis pesan Anda di sini secara detail..." required></textarea>
                            </div>
                            <div class="col-12 mt-5">
                                <button type="submit"
                                    class="btn btn-dark btn-lg w-100 rounded-pill fw-bold py-3 shadow-sm hover-scale">
                                    <i class="fas fa-paper-plane me-2"></i> KIRIM PESAN
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>


<section class="faq-teaser-section animate-up">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <i class="far fa-question-circle fa-3x text-primary mb-4"></i>
                <h3 class="fw-bold mb-3">Punya Pertanyaan Umum?</h3>
                <p class="text-muted mb-4 w-75 mx-auto">Sebelum mengirim pesan, mungkin jawaban yang Anda cari sudah
                    tersedia di halaman Frequently Asked Questions (FAQ) kami. Cek seputar pengiriman, pembayaran, dan
                    cara retur.</p>
                <a href="<?= base_url('faq') ?>" class="btn btn-outline-dark rounded-pill px-5 py-2 fw-bold">LIHAT FAQ &
                    BANTUAN</a>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>