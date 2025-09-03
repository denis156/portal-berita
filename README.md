# 📰 Portal Berita

<div align="center">

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Livewire](https://img.shields.io/badge/Livewire-4E56A6?style=for-the-badge&logo=livewire&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)

[![Made with ❤️ by Denis Djodian Ardika](https://img.shields.io/badge/Made%20with%20❤️%20by-Denis%20Djodian%20Ardika-red?style=for-the-badge)](https://github.com/denis156)
[![Open Source Love](https://img.shields.io/badge/Open%20Source-❤️-green?style=for-the-badge)](https://opensource.org/)
[![GitHub stars](https://img.shields.io/github/stars/denis156/portal-berita?style=for-the-badge)](https://github.com/denis156/portal-berita/stargazers)
[![GitHub forks](https://img.shields.io/github/forks/denis156/portal-berita?style=for-the-badge)](https://github.com/denis156/portal-berita/network)
[![GitHub issues](https://img.shields.io/github/issues/denis156/portal-berita?style=for-the-badge)](https://github.com/denis156/portal-berita/issues)

</div>

---

**Portal Berita** adalah aplikasi portal berita modern yang dibangun dengan teknologi terkini untuk memberikan pengalaman pengguna yang luar biasa. Dikembangkan khusus untuk **MUI Kendari** namun dibuat sebagai **open source** sehingga dapat digunakan oleh siapa saja.

✨ **Dibangun dengan cinta menggunakan Laravel 12, Filament, Mary UI, DaisyUI, dan Tailwind CSS**

## Fitur Utama

- 📰 Manajemen berita dengan kategori
- 👥 Sistem penulis/author
- 🖼️ Manajemen banner
- 🔧 Panel admin menggunakan Filament
- ⚡ Komponen Livewire untuk pengalaman pengguna yang responsif
- 🎨 UI components dengan Mary UI dan Phosphor Icons

## 🛠️ Tech Stack

<table>
<tr>
<td>

**Backend**
- **Framework:** Laravel 12
- **PHP:** ^8.2
- **Database:** MySQL/PostgreSQL/SQLite
- **Queue:** Laravel Queue
- **Testing:** Pest PHP 4.0

</td>
<td>

**Frontend**
- **Interactive:** Livewire 3.6
- **Styling:** Tailwind CSS
- **UI Framework:** DaisyUI
- **Components:** Mary UI 2.4
- **Icons:** Blade Phosphor Icons

</td>
</tr>
<tr>
<td>

**Admin Panel**
- **Framework:** Filament 4.0
- **Authentication:** Laravel Sanctum
- **Authorization:** Laravel Policies

</td>
<td>

**Development**
- **Build Tool:** Vite
- **Code Style:** Laravel Pint
- **Log Viewer:** Laravel Pail
- **Package Manager:** Composer & NPM

</td>
</tr>
</table>

## Instalasi

### Requirements

- PHP 8.2 atau lebih tinggi
- Composer
- Node.js & NPM
- Database (MySQL/PostgreSQL/SQLite)

### Langkah Instalasi

1. **Clone repository**
   ```bash
   git clone https://github.com/denis156/portal-berita.git
   cd portal-berita
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Setup environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Konfigurasi database**
   
   Edit file `.env` dan sesuaikan konfigurasi database:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=portal_berita
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Jalankan migrasi**
   ```bash
   php artisan migrate
   ```

6. **Seed data (opsional)**
   ```bash
   php artisan db:seed
   ```

## Menjalankan Aplikasi

### Development Mode

Untuk menjalankan semua service dalam development mode:

```bash
composer run dev
```

Command ini akan menjalankan:
- Laravel development server
- Queue worker
- Laravel Pail (log viewer)
- Vite development server

### Manual

Atau jalankan secara manual:

```bash
# Server
php artisan serve

# Frontend development
npm run dev

# Queue worker (jika diperlukan)
php artisan queue:work
```

## Testing

```bash
# Jalankan tests
composer run test

# Atau langsung dengan artisan
php artisan test
```

## Struktur Project

```
app/
├── Models/
│   ├── News.php           # Model berita
│   ├── NewsCategory.php   # Model kategori berita
│   ├── Author.php         # Model penulis
│   └── Banner.php         # Model banner
├── Livewire/
│   └── News/              # Komponen Livewire untuk berita
└── Providers/
    └── Filament/          # Konfigurasi Filament admin
```

## Panel Admin

Akses panel admin melalui:
```
http://localhost:8000/admin
```

Panel admin menggunakan Filament dan menyediakan interface untuk:
- Manajemen berita
- Manajemen kategori
- Manajemen penulis
- Manajemen banner
- Manajemen pengguna

## 🤝 Contributing

Kontribusi sangat diterima! Ikuti langkah berikut:

1. **Fork** repository ini
2. Buat **feature branch** (`git checkout -b feature/amazing-feature`)
3. **Commit** perubahan Anda (`git commit -m 'Add amazing feature'`)
4. **Push** ke branch (`git push origin feature/amazing-feature`)
5. Buat **Pull Request**

## 🎯 Roadmap

- [ ] 🌐 Multi-language support
- [ ] 🔍 Advanced search functionality
- [ ] 📊 Analytics dashboard
- [ ] 📱 Mobile app (React Native)
- [ ] 🔔 Push notifications
- [ ] 📈 SEO optimization
- [ ] 🎨 Theme customization

## 👤 Author

**Denis Djodian Ardika**
- GitHub: [@denis156](https://github.com/denis156)
- Instagram: [@artelia_development](https://www.instagram.com/artelia_development/)

## 🏢 About MUI Kendari

Project ini dibuat khusus untuk **Mahasiswa Universitas Indonesia Kendari** sebagai platform portal berita kampus yang modern dan user-friendly.

## 🌟 Show Your Support

Jika project ini bermanfaat untuk Anda, berikan ⭐ pada repository ini!

## 📝 License

Project ini menggunakan [MIT License](https://opensource.org/licenses/MIT) - lihat file [LICENSE](LICENSE) untuk detail.

---

<div align="center">
Made with ❤️ by <a href="https://github.com/denis156">Denis Djodian Ardika</a>
</div>
