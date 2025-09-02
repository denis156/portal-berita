<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authors = [
            [
                'name' => 'Prof. Dr. KH. Asrorun Ni\'am Sholeh',
                'username' => 'asrorun_niam',
                'avatar' => 'avatars/asrorun-niam.jpg',
                'bio' => 'Sekretaris Jenderal MUI Pusat dan pakar hukum Islam. Lulusan Al-Azhar University, Kairo. Aktif dalam penyusunan fatwa-fatwa MUI dan kajian hukum Islam kontemporer.',
            ],
            [
                'name' => 'Dr. KH. Ahmad Syafi\'i Mufid',
                'username' => 'ahmad_syafii',
                'bio' => 'Wakil Sekretaris Jenderal MUI dan ahli dalam bidang ekonomi syariah. Penulis berbagai buku tentang perbankan Islam dan halal lifestyle.',
            ],
            [
                'name' => 'Prof. Dr. Yunahar Ilyas',
                'username' => 'yunahar_ilyas',
                'bio' => 'Pakar tafsir Al-Qur\'an dan hadits. Guru besar di UIN Sunan Kalijaga Yogyakarta. Aktif dalam kajian Islam dan gender serta pendidikan Islam.',
            ],
            [
                'name' => 'KH. Cholil Nafis',
                'username' => 'cholil_nafis',
                'bio' => 'Ketua Komisi Dakwah MUI dan da\'i kondang. Lulusan Universitas Islam Madinah. Aktif dalam gerakan dakwah Islam di Indonesia dan dunia internasional.',
            ],
            [
                'name' => 'Dr. Adian Husaini',
                'username' => 'adian_husaini',
                'bio' => 'Pakar pendidikan Islam dan pemikiran Islam. Direktur Institute for Islamic Studies (INSISTS). Penulis puluhan buku tentang Islam dan peradaban.',
            ],
            [
                'name' => 'Prof. Dr. KH. Didin Hafidhuddin',
                'username' => 'didin_hafidhuddin',
                'bio' => 'Pakar ekonomi Islam dan mantan Rektor IPB. Ketua Dewan Syariah Nasional MUI. Ahli dalam bidang zakat, wakaf, dan keuangan syariah.',
            ],
            [
                'name' => 'Dr. KH. Ma\'ruf Amin',
                'username' => 'maruf_amin',
                'bio' => 'Ketua Umum MUI dan Wakil Presiden RI. Pakar hukum Islam dan ekonomi syariah. Berperan penting dalam pengembangan industri halal Indonesia.',
            ],
            [
                'name' => 'Prof. Dr. Nasaruddin Umar',
                'username' => 'nasaruddin_umar',
                'bio' => 'Imam Besar Masjid Istiqlal dan pakar kajian gender dalam Islam. Lulusan Al-Azhar University. Aktif dalam dialog antar agama dan kesetaraan gender.',
            ],
        ];

        foreach ($authors as $author) {
            Author::create($author);
        }
    }
}
