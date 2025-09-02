<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\Author;
use App\Models\NewsCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authors = Author::all();
        $categories = NewsCategory::all();

        $newsData = [
            [
                'tittle' => 'MUI Keluarkan Fatwa Tentang Penggunaan AI dalam Ibadah',
                'content' => '<h2>Fatwa MUI tentang Artificial Intelligence dalam Konteks Keislaman</h2><p>Majelis Ulama Indonesia (MUI) resmi mengeluarkan fatwa mengenai penggunaan teknologi kecerdasan buatan (AI) dalam praktik keagamaan dan kehidupan sehari-hari umat Islam.</p><p>Fatwa ini menjadi panduan penting bagi umat Islam Indonesia dalam menghadapi perkembangan teknologi yang semakin pesat, khususnya dalam hal aplikasi AI untuk keperluan ibadah dan pembelajaran agama.</p><h3>Poin-Poin Utama Fatwa</h3><ul><li>AI boleh digunakan sebagai alat bantu pembelajaran Al-Quran dan hadits</li><li>Tidak boleh menggantikan peran manusia dalam ijtihad dan pengambilan keputusan hukum</li><li>Harus tetap berpegang pada sumber utama: Al-Quran dan As-Sunnah</li><li>Penggunaan harus sesuai dengan prinsip maslahah (kemaslahatan)</li></ul><blockquote>"Teknologi adalah amanah yang harus digunakan dengan bijak sesuai tuntunan syariat Islam" - Prof. Dr. KH. Asrorun Ni\'am Sholeh</blockquote>',
                'category_name' => 'Fatwa',
            ],
            [
                'tittle' => 'Rakernas MUI 2024: Strategi Dakwah Digital Era 5.0',
                'content' => '<h2>Transformasi Dakwah di Era Digital</h2><p>Rapat Kerja Nasional (Rakernas) MUI 2024 menghasilkan sejumlah keputusan penting terkait strategi dakwah Islam di era digital. Para ulama se-Indonesia berkumpul untuk membahas tantangan dan peluang dakwah modern.</p><p>Era Society 5.0 menuntut umat Islam untuk beradaptasi dengan perkembangan teknologi tanpa meninggalkan nilai-nilai dasar ajaran Islam. MUI berkomitmen menjadi garda depan dalam transformasi ini.</p><h3>Program Prioritas 2024-2025</h3><ol><li>Pelatihan dai digital untuk 1000 ustadz seluruh Indonesia</li><li>Pengembangan platform dakwah online terintegrasi</li><li>Sertifikasi konten dakwah digital</li><li>Kemitraan dengan platform media sosial mainstream</li></ol><h3>Target Capaian</h3><ul><li>Menjangkau 50 juta umat Muslim melalui platform digital</li><li>Mencetak 500 dai milenial yang melek teknologi</li><li>Meluncurkan 100 konten dakwah berkualitas setiap bulan</li></ul>',
                'category_name' => 'Kegiatan MUI',
            ],
            [
                'tittle' => 'Launching Aplikasi Halal Check untuk Kemudahan Konsumen Muslim',
                'content' => '<h2>Inovasi Teknologi untuk Lifestyle Halal</h2><p>MUI bersama dengan Kementerian Agama dan BPJPH meluncurkan aplikasi "Halal Check" yang memudahkan konsumen Muslim dalam memverifikasi status halal suatu produk secara real-time.</p><p>Aplikasi ini dikembangkan sebagai respons atas kebutuhan masyarakat akan kepastian halal produk di era digital. Dengan fitur scan barcode dan database terintegrasi, konsumen dapat mengecek status halal produk kapan saja.</p><h3>Fitur Unggulan Aplikasi</h3><ul><li><strong>Scan & Check:</strong> Scan barcode produk untuk cek status halal</li><li><strong>Halal Directory:</strong> Database lengkap produk bersertifikat halal</li><li><strong>Restaurant Finder:</strong> Pencarian restoran dan warung halal terdekat</li><li><strong>Halal News:</strong> Update terkini seputar sertifikasi halal</li><li><strong>Report Feature:</strong> Laporkan produk yang mencurigakan</li></ul><blockquote>"Aplikasi ini adalah wujud komitmen MUI dalam memudahkan umat menjalankan gaya hidup halal di era digital" - Dr. KH. Ahmad Syafi\'i Mufid</blockquote><p>Aplikasi Halal Check telah diunduh lebih dari 500.000 pengguna dalam minggu pertama peluncuran dan mendapat rating 4.8 di Play Store.</p>',
                'category_name' => 'Publikasi',
            ],
            [
                'tittle' => 'Perkembangan Ekonomi Syariah Indonesia Mencapai Rekor Tertinggi',
                'content' => '<h2>Momentum Kebangkitan Ekonomi Syariah Nasional</h2><p>Berdasarkan laporan terbaru dari Otoritas Jasa Keuangan (OJK), industri keuangan syariah Indonesia mencatat pertumbuhan yang sangat menggembirakan di tahun 2024 dengan total aset mencapai Rp 2.500 triliun.</p><p>Pertumbuhan ini didukung oleh semakin meningkatnya literasi ekonomi syariah di masyarakat serta dukungan penuh pemerintah melalui berbagai regulasi yang mendukung.</p><h3>Kontribusi Sektor Ekonomi Syariah</h3><table><tr><th>Sektor</th><th>Aset (Triliun Rp)</th><th>Pertumbuhan YoY</th></tr><tr><td>Perbankan Syariah</td><td>1.800</td><td>18.5%</td></tr><tr><td>Sukuk</td><td>400</td><td>25.2%</td></tr><tr><td>Asuransi Syariah</td><td>200</td><td>15.8%</td></tr><tr><td>Fintech Syariah</td><td>100</td><td>45.3%</td></tr></table><h3>Proyeksi 2025</h3><p>Para ekonom memproyeksikan pertumbuhan ekonomi syariah akan terus mengalami tren positif dengan target:</p><ol><li>Aset total mencapai Rp 3.000 triliun</li><li>Market share perbankan syariah 15% dari total perbankan nasional</li><li>Penetrasi asuransi syariah mencapai 8% populasi Muslim</li></ol>',
                'category_name' => 'Ekonomi Syariah',
            ],
            [
                'tittle' => 'Program Beasiswa Tahfidz Quran untuk 10.000 Santri Indonesia',
                'content' => '<h2>Investasi Pendidikan Islam Berkelanjutan</h2><p>MUI bekerja sama dengan Kementerian Pendidikan dan berbagai yayasan Islam meluncurkan program beasiswa tahfidz Al-Quran terbesar dalam sejarah Indonesia yang akan menjangkau 10.000 santri dari seluruh pelosok nusantara.</p><p>Program ini bertujuan mencetak generasi Qurani yang tidak hanya hafal Al-Quran tetapi juga memahami dan mengamalkan nilai-nilai yang terkandung di dalamnya dalam kehidupan sehari-hari.</p><h3>Komponen Program Beasiswa</h3><ul><li>Biaya pendidikan penuh selama 4 tahun</li><li>Asrama dan konsumsi</li><li>Bimbingan tahfidz dari ustadz berpengalaman</li><li>Pelatihan kepemimpinan dan kewirausahaan</li><li>Program magang di lembaga-lembaga Islam</li><li>Beasiswa lanjutan untuk pendidikan tinggi</li></ul><h3>Kriteria Penerima Beasiswa</h3><ol><li>Usia 12-17 tahun</li><li>Telah menghafal minimal 5 juz Al-Quran</li><li>Berasal dari keluarga tidak mampu</li><li>Memiliki prestasi akademik yang baik</li><li>Sehat jasmani dan rohani</li></ol><blockquote>"Investasi terbaik adalah investasi untuk generasi penghafal Al-Quran yang berakhlak mulia" - Prof. Dr. Yunahar Ilyas</blockquote>',
                'category_name' => 'Pendidikan Islam',
            ],
            [
                'tittle' => 'Panduan Lengkap Halal Lifestyle untuk Keluarga Muslim Modern',
                'content' => '<h2>Menjalani Gaya Hidup Halal di Era Modern</h2><p>MUI menerbitkan buku panduan komprehensif tentang halal lifestyle yang disesuaikan dengan kebutuhan keluarga Muslim modern. Panduan ini mencakup berbagai aspek kehidupan dari makanan, fashion, keuangan, hingga entertainment.</p><p>Buku setebal 350 halaman ini disusun oleh tim ahli yang terdiri dari ulama, praktisi industri halal, dan konsultan lifestyle yang berpengalaman dalam industri halal global.</p><h3>Konten Panduan Halal Lifestyle</h3><ul><li><strong>Halal Food:</strong> Panduan lengkap makanan dan minuman halal</li><li><strong>Halal Fashion:</strong> Tren busana Muslim kontemporer</li><li><strong>Halal Travel:</strong> Tips wisata halal dalam dan luar negeri</li><li><strong>Halal Finance:</strong> Pengelolaan keuangan sesuai syariah</li><li><strong>Halal Parenting:</strong> Mendidik anak dengan nilai-nilai Islam</li><li><strong>Halal Business:</strong> Membangun bisnis berbasis prinsip syariah</li></ul><h3>Fitur Khusus</h3><ol><li>QR Code untuk akses konten digital tambahan</li><li>Aplikasi mobile companion</li><li>Update berkala melalui website resmi</li><li>Konsultasi online dengan tim ahli</li></ol><blockquote>"Halal bukan hanya tentang makanan, tapi cara hidup yang komprehensif sesuai ajaran Islam" - KH. Cholil Nafis</blockquote>',
                'category_name' => 'Halal Lifestyle',
            ],
        ];

        foreach ($newsData as $data) {
            $category = $categories->where('tittle', $data['category_name'])->first();
            $author = $authors->random();

            if ($category) {
                News::create([
                    'author_id' => $author->id,
                    'news_category_id' => $category->id,
                    'tittle' => $data['tittle'],
                    'slug' => Str::slug($data['tittle']),
                    'content' => $data['content'],
                    'status' => 'publish',
                    'is_feature' => rand(0, 1) ? true : false,
                ]);
            }
        }
    }
}
