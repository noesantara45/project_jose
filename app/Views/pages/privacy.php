<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<style>
/* Header yang simpel dan bersih */
.legal-header {
    background-color: #f8f9fa;
    padding: 140px 0 40px;
    /* Kompensasi navbar fixed */
    text-align: center;
    border-bottom: 1px solid #eee;
}

.legal-title {
    font-weight: 900;
    color: #222;
    letter-spacing: -0.5px;
    margin-bottom: 10px;
}

.legal-date {
    color: #666;
    font-size: 0.9rem;
    font-style: italic;
}

/* Kontainer Teks Utama */
.legal-content-section {
    padding: 60px 0;
    background: #fff;
}

.legal-container {
    /* Membatasi lebar teks agar nyaman dibaca di layar besar */
    max-width: 800px;
    margin: 0 auto;
    /* Tengah */
    padding: 0 20px;
}

/* Tipografi Teks Legal */
.legal-text {
    color: #444;
    /* Tidak hitam pekat, agar tidak cepat lelah di mata */
    line-height: 1.8;
    /* Jarak antar baris lega */
    font-size: 1rem;
}

.legal-text h2 {
    font-weight: 800;
    color: #222;
    margin-top: 40px;
    margin-bottom: 20px;
    font-size: 1.5rem;
    padding-bottom: 10px;
    border-bottom: 2px solid #f0f0f0;
}

.legal-text h3 {
    font-weight: 700;
    color: #333;
    margin-top: 25px;
    margin-bottom: 15px;
    font-size: 1.2rem;
}

.legal-text p,
.legal-text ul {
    margin-bottom: 20px;
}

.legal-text ul,
.legal-text ol {
    padding-left: 25px;
}

.legal-text li {
    margin-bottom: 10px;
}

.legal-text a {
    color: #000;
    text-decoration: underline;
    font-weight: 600;
}

.legal-text a:hover {
    color: #ffc107;
}
</style>

<section class="legal-header">
    <div class="container">
        <h1 class="display-5 legal-title">Kebijakan Privasi</h1>
        <p class="legal-date">Terakhir diperbarui: 1 Januari 2024</p>
    </div>
</section>

<section class="legal-content-section">
    <div class="legal-container legal-text">

        <p class="lead fw-bold text-dark">Di HLOutfit, privasi Anda adalah prioritas kami.</p>
        <p>Kebijakan Privasi ini menjelaskan bagaimana kami ("HLOutfit", "kami", atau "milik kami") mengumpulkan,
            menggunakan, mengungkapkan, dan melindungi informasi pribadi Anda saat Anda mengunjungi atau melakukan
            pembelian di website kami.</p>
        <p>Dengan mengakses atau menggunakan layanan kami, Anda menyetujui pengumpulan dan penggunaan informasi sesuai
            dengan kebijakan ini.</p>


        <h2>1. Informasi yang Kami Kumpulkan</h2>
        <p>Kami mengumpulkan beberapa jenis informasi untuk berbagai tujuan guna menyediakan dan meningkatkan layanan
            kami kepada Anda.</p>

        <h3>A. Informasi Pribadi (Personal Data)</h3>
        <p>Saat Anda melakukan pembelian, mendaftar akun, atau menghubungi kami, kami dapat meminta Anda untuk
            memberikan informasi pengenal pribadi tertentu, termasuk namun tidak terbatas pada:</p>
        <ul>
            <li>Nama lengkap.</li>
            <li>Alamat email.</li>
            <li>Nomor telepon (untuk konfirmasi pesanan dan pengiriman).</li>
            <li>Alamat lengkap pengiriman dan penagihan.</li>
            <li>Informasi pembayaran (Data kartu kredit Anda diproses secara aman oleh pihak ketiga/Payment Gateway dan
                tidak disimpan di server kami).</li>
        </ul>

        <h3>B. Data Penggunaan (Usage Data)</h3>
        <p>Kami juga dapat mengumpulkan informasi tentang bagaimana Layanan diakses dan digunakan. Data Penggunaan ini
            dapat mencakup informasi seperti alamat Protokol Internet (IP) komputer Anda, jenis browser, versi browser,
            halaman Layanan kami yang Anda kunjungi, waktu dan tanggal kunjungan Anda, waktu yang dihabiskan di
            halaman-halaman tersebut, dan data diagnostik lainnya.</p>


        <h2>2. Penggunaan Cookies</h2>
        <p>Kami menggunakan cookie dan teknologi pelacakan serupa untuk melacak aktivitas di Layanan kami dan menyimpan
            informasi tertentu.</p>
        <p>Cookie adalah file dengan sedikit data yang mungkin menyertakan pengenal unik anonim. Cookie dikirim ke
            browser Anda dari situs web dan disimpan di perangkat Anda. Anda dapat menginstruksikan browser Anda untuk
            menolak semua cookie atau menunjukkan kapan cookie dikirim. Namun, jika Anda tidak menerima cookie, Anda
            mungkin tidak dapat menggunakan sebagian dari Layanan kami (seperti fitur keranjang belanja).</p>


        <h2>3. Bagaimana Kami Menggunakan Informasi Anda</h2>
        <p>HLOutfit menggunakan data yang dikumpulkan untuk berbagai tujuan:</p>
        <ul>
            <li>Untuk memproses dan mengirimkan pesanan Anda.</li>
            <li>Untuk menyediakan dan memelihara Layanan kami.</li>
            <li>Untuk memberi tahu Anda tentang perubahan pada Layanan kami.</li>
            <li>Untuk memberikan dukungan pelanggan (Customer Service).</li>
            <li>Untuk mengirimkan email pemasaran, buletin, dan penawaran promosi (hanya jika Anda telah memilih untuk
                menerimanya/subscribe).</li>
            <li>Untuk mendeteksi, mencegah, dan mengatasi masalah teknis atau penipuan.</li>
        </ul>


        <h2>4. Pengungkapan Data kepada Pihak Ketiga</h2>
        <p>Kami <strong>tidak menjual</strong> data pribadi Anda kepada pihak ketiga manapun. Namun, kami dapat
            membagikan informasi Anda dengan penyedia layanan pihak ketiga yang membantu kami dalam mengoperasikan
            bisnis kami, seperti:</p>
        <ul>
            <li><strong>Jasa Logistik/Ekspedisi:</strong> Untuk mengirimkan pesanan ke alamat Anda (misalnya: JNE, J&T).
            </li>
            <li><strong>Payment Gateway:</strong> Untuk memproses pembayaran transaksi secara aman.</li>
            <li><strong>Penyedia Layanan IT:</strong> Untuk hosting website dan pemeliharaan sistem.</li>
        </ul>
        <p>Pihak ketiga ini hanya memiliki akses ke data pribadi Anda untuk melakukan tugas-tugas ini atas nama kami dan
            berkewajiban untuk tidak mengungkapkannya atau menggunakannya untuk tujuan lain apa pun.</p>


        <h2>5. Keamanan Data</h2>
        <p>Keamanan data Anda penting bagi kami. Kami menggunakan standar industri, termasuk enkripsi SSL (Secure Socket
            Layer), untuk melindungi transmisi informasi sensitif (seperti data pribadi dan informasi pembayaran) saat
            melintasi internet.</p>
        <p>Namun, harap diingat bahwa tidak ada metode transmisi melalui internet atau metode penyimpanan elektronik
            yang 100% aman. Meskipun kami berusaha menggunakan sarana yang dapat diterima secara komersial untuk
            melindungi Data Pribadi Anda, kami tidak dapat menjamin keamanannya secara mutlak.</p>


        <h2>6. Perubahan pada Kebijakan Privasi Ini</h2>
        <p>Kami dapat memperbarui Kebijakan Privasi kami dari waktu ke waktu. Kami akan memberi tahu Anda tentang
            perubahan apa pun dengan memposting Kebijakan Privasi baru di halaman ini dan memperbarui tanggal "Terakhir
            diperbarui" di bagian atas.</p>


        <h2>7. Hubungi Kami</h2>
        <p>Jika Anda memiliki pertanyaan tentang Kebijakan Privasi ini, silakan hubungi kami:</p>
        <ul>
            <li>Email: <a href="mailto:legal@hloutfit.com">legal@hloutfit.com</a></li>
            <li>Melalui halaman <a href="<?= base_url('contact') ?>">Kontak Kami</a> di website ini.</li>
        </ul>

        <p class="mt-5 text-muted small">Dokumen ini dibuat untuk tujuan ilustrasi website HLOutfit.</p>
    </div>
</section>

<?= $this->endSection(); ?>