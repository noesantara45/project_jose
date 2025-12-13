<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<style>
/* HERO SECTION (Tinggi & Efek Parallax) */
.about-hero {
    height: 70vh;
    min-height: 500px;
    background: linear-gradient(to bottom, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.8)), url('https://images.unsplash.com/photo-1469334031218-e382a71b716b?q=80&w=1470');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    text-align: center;
    margin-top: -80px;
    /* Kompensasi navbar fixed */
    padding-top: 80px;
    position: relative;
}

.about-hero::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 150px;
    background: linear-gradient(to top, #fff, transparent);
}

.about-title {
    font-size: 4rem;
    font-weight: 900;
    letter-spacing: -2px;
    text-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
}

/* STORY IMG */
.story-img-tall {
    height: 600px;
    object-fit: cover;
    border-radius: 12px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
}

/* BRANDING SECTION (Nama & Logo) */
.brand-philosophy-box {
    padding: 50px;
    background: #f8f9fa;
    border-radius: 20px;
    height: 100%;
    border: 1px solid #eee;
}

.brand-logo-large {
    font-size: 5rem;
    font-weight: 900;
    letter-spacing: -3px;
    color: #222;
}

.logo-part-highlight {
    display: inline-block;
    padding: 5px 15px;
    background: #fff;
    border: 2px solid #ddd;
    border-radius: 8px;
    margin: 5px;
    font-family: monospace;
    font-weight: 600;
    color: #555;
}

/* LOGO BEDAH */
.logo-breakdown-icon {
    font-size: 6rem;
    color: #ffc107;
    margin-bottom: 20px;
    text-shadow: 0 5px 15px rgba(255, 193, 7, 0.3);
}

.breakdown-line {
    height: 2px;
    background: #eee;
    width: 100px;
    margin: 30px auto;
}

/* VALUES BOX */
.value-card {
    padding: 30px;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    text-align: center;
    height: 100%;
    border-bottom: 4px solid transparent;
    transition: 0.3s;
}

.value-card:hover {
    border-bottom-color: #222;
    transform: translateY(-5px);
}

.value-num {
    font-size: 3rem;
    font-weight: 900;
    color: #eee;
    line-height: 1;
    margin-bottom: 10px;
}

/* TEAM */
.team-card img {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    object-fit: cover;
    border: 6px solid #fff;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    margin-bottom: 25px;
}

/* Helper Spacing */
.section-gap {
    padding: 100px 0;
}

.section-gap-sm {
    padding: 60px 0;
}

.text-justify-custom {
    text-align: justify;
}
</style>


<section class="about-hero animate-up">
    <div class="container position-relative z-2">
        <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold mb-4 ls-2">ESTABLISHED 2020</span>
        <h1 style="color: white;" class="about-title mb-4">MORE THAN JUST <br class="d-none d-md-block">A FASHION BRAND.
        </h1>
        <p class="lead w-75 mx-auto text-white-50 fw-light" style="font-size: 1.2rem;">Sebuah manifesto gaya hidup untuk
            generasi yang berani mendefinisikan diri mereka sendiri.</p>
    </div>
</section>


<section class="section-gap bg-white">
    <div class="container">
        <div class="row align-items-center g-5 animate-up">
            <div class="col-lg-5">
                <img src="https://images.unsplash.com/photo-1556905055-8f358a7a47b2?q=80&w=1470"
                    class="story-img-tall w-100" alt="Our Story Founder">
            </div>
            <div class="col-lg-7 ps-lg-5">
                <h6 class="text-primary fw-bold text-uppercase ls-2 mb-3">The Untold Story</h6>
                <h2 class="display-4 fw-bold mb-4">Berawal dari Kegelisahan di Kamar Kos Sempit.</h2>

                <div class="text-muted" style="line-height: 1.9; font-size: 1.05rem;">
                    <p class="mb-4 text-justify-custom">
                        HLOutfit tidak lahir di ruang rapat mewah di gedung pencakar langit. Cerita kami dimulai pada
                        tahun 2020, di tengah ketidakpastian global, di sebuah kamar kos berukuran 3x4 meter di
                        pinggiran Jakarta. Saat itu, pendiri kami merasa frustrasi dengan industri fashion: mengapa
                        pakaian dengan desain keren dan bahan berkualitas selalu memiliki label harga yang tidak masuk
                        akal bagi mahasiswa dan anak muda?
                    </p>
                    <p class="mb-4 text-justify-custom">
                        Dengan modal pas-pasan dari tabungan hasil kerja paruh waktu dan satu laptop tua, ide gila itu
                        muncul: <strong>menciptakan brand streetwear yang menjembatani kesenjangan antara 'Gaya' dan
                            'Harga'</strong>. Tanpa investor, tanpa koneksi pabrik besar, hanya bermodalkan riset
                        internet dan tekad nekad untuk mencari vendor konveksi lokal yang mau menerima pesanan dalam
                        jumlah kecil.
                    </p>
                    <p class="mb-0 fw-bold text-dark">
                        Lusinan sampel gagal, ratusan DM Instagram yang diabaikan, dan malam-malam tanpa tidur menjadi
                        saksi bisu lahirnya HLOutfit. Dari batch pertama yang hanya berisi 50 kaos, kini kami telah
                        mengirimkan ribuan paket ke seluruh pelosok negeri, membuktikan bahwa kualitas premium tidak
                        harus selalu mahal.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="section-gap bg-light">
    <div class="container animate-up">
        <div class="text-center mb-5 w-75 mx-auto">
            <h6 class="text-primary fw-bold text-uppercase ls-2 mb-3">The Identity</h6>
            <h2 class="fw-bold display-5">The Philosophy Behind The Brand</h2>
        </div>

        <div class="row g-4 align-items-stretch">
            <div class="col-lg-6">
                <div class="brand-philosophy-box">
                    <h3 class="fw-bold mb-4"><i class="fas fa-quote-left text-warning me-2"></i>What's in a Name?</h3>
                    <p class="text-muted mb-5">Nama "HLOutfit" bukanlah sekadar singkatan acak. Ini adalah cerminan dari
                        dua elemen inti yang ingin kami gabungkan dalam setiap produk kami.</p>

                    <div class="mb-4">
                        <h5 class="fw-bold"><span class="text-warning">HL</span> = High Life / Hype Life</h5>
                        <p class="text-muted small">
                            Merepresentasikan aspirasi untuk gaya hidup yang dinamis, penuh semangat, percaya diri, dan
                            selalu mengikuti perkembangan zaman (*hype*). Ini adalah jiwa dari budaya streetwear.
                        </p>
                    </div>
                    <div class="breakdown-line"></div>
                    <div>
                        <h5 class="fw-bold"><span class="text-dark">Outfit</span> = Pakaian / Perlengkapan</h5>
                        <p class="text-muted small">
                            Menunjukkan fokus kami yang jelas pada produk fashion sebagai alat (perlengkapan) untuk
                            mengekspresikan identitas diri sehari-hari.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="brand-philosophy-box bg-white border-0 shadow-sm text-center">
                    <div class="mb-5">
                        <i class="fas fa-bolt logo-breakdown-icon"></i>
                        <div class="brand-logo-large">HLOutfit.</div>
                    </div>

                    <div class="row g-4 text-start">
                        <div class="col-md-6">
                            <h6 class="fw-bold mb-2"><i class="fas fa-bolt text-warning me-1"></i>The Lightning Bolt
                                Symbol</h6>
                            <p class="text-muted small" style="line-height: 1.6;">
                                Simbol petir berwarna kuning emas melambangkan <strong>energi, kecepatan, dan dampak
                                    instan</strong>. Seperti petir yang menyambar tiba-tiba dan menarik perhatian, kami
                                ingin setiap pemakai HLOutfit merasakan lonjakan kepercayaan diri seketika saat
                                mengenakan produk kami. Warna kuningnya juga berarti optimisme dan kreativitas anak
                                muda.
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="fw-bold mb-2"><i class="fas fa-font text-dark me-1"></i>The Bold Typography</h6>
                            <p class="text-muted small" style="line-height: 1.6;">
                                Penggunaan jenis huruf *sans-serif* yang tebal, tegas, dan modern mencerminkan karakter
                                yang <strong>kuat, lugas, dan tanpa kompromi</strong>. Huruf kapital di awal dan titik
                                di akhir (.) menegaskan pernyataan sikap bahwa gaya kami adalah final dan percaya diri.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="section-gap bg-white">
    <div class="container animate-up">
        <div class="text-center mb-5 w-75 mx-auto">
            <h6 class="text-primary fw-bold text-uppercase ls-2 mb-3">What Drives Us</h6>
            <h2 class="fw-bold display-6">Prinsip yang Kami Pegang Teguh</h2>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-md-4 col-lg-3">
                <div class="value-card">
                    <div class="value-num">01</div>
                    <h5 class="fw-bold mb-3">Quality Over Quantity</h5>
                    <p class="text-muted small mb-0">Lebih baik merilis sedikit koleksi tapi sempurna, daripada banyak
                        tapi asal-asalan.</p>
                </div>
            </div>
            <div class="col-md-4 col-lg-3">
                <div class="value-card">
                    <div class="value-num">02</div>
                    <h5 class="fw-bold mb-3">Accessible Price</h5>
                    <p class="text-muted small mb-0">Gaya keren adalah hak segala bangsa, bukan cuma mereka yang
                        berkantong tebal.</p>
                </div>
            </div>
            <div class="col-md-4 col-lg-3">
                <div class="value-card">
                    <div class="value-num">03</div>
                    <h5 class="fw-bold mb-3">Authentic Design</h5>
                    <p class="text-muted small mb-0">Anti plagiat. Semua desain lahir dari proses kreatif tim internal
                        kami sendiri.</p>
                </div>
            </div>
            <div class="col-md-4 col-lg-3">
                <div class="value-card">
                    <div class="value-num">04</div>
                    <h5 class="fw-bold mb-3">Customer Obsessed</h5>
                    <p class="text-muted small mb-0">Kepuasan Anda adalah KPI (Key Performance Indicator) utama kami.
                        Titik.</p>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="cta-section section-gap bg-dark text-white text-center animate-up">
    <div class="container">
        <h2 style="color: white;" class="display-5 fw-bold mb-4">Jadilah Bagian dari Cerita Kami.</h2>
        <p class="lead text-white-50 mb-5 w-75 mx-auto fw-light">Setiap pembelian Anda bukan sekadar transaksi, tapi
            dukungan nyata bagi mimpi anak muda Indonesia untuk terus berkarya.</p>
        <a href="<?= base_url('kategori') ?>"
            class="btn btn-warning btn-lg rounded-pill px-5 py-3 fw-bold text-dark shadow-lg">Explore The Collection <i
                class="fas fa-arrow-right ms-2"></i></a>
    </div>
</section>

<?= $this->endSection(); ?>