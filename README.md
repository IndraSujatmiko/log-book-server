
# 📝 Sistem Informasi Log Book - Pintu Masuk Ruang Server

Sebuah aplikasi web berbasis Laravel + Livewire Volt untuk mencatat, mengelola, dan memverifikasi kunjungan masuk ke ruang server. Sistem ini mendukung autentikasi berbasis role (`admin`, `petugas`, `verifikator`) serta mencakup fitur rekap kunjungan dan manajemen pengguna.

## 🚀 Fitur Utama

- Login dan registrasi berbasis role
- Dashboard khusus untuk masing-masing role
- Rekap kunjungan harian/mingguan/bulanan
- Manajemen perangkat (opsional)
- Sistem verifikasi kunjungan
- UI modern berbasis TailwindCSS + Livewire Volt

## 🛠️ Teknologi yang Digunakan

- Laravel 12
- Laravel Volt (Livewire)
- Tailwind CSS
- Alpine.js
- PestPHP (Testing)
- Git + GitHub

## 📦 Instalasi

```bash
git clone https://github.com/username/log-book-server.git
cd log-book-server
composer install
npm install && npm run build
cp .env.example .env
php artisan key:generate
```

Konfigurasi `.env` untuk koneksi database dan lainnya sesuai kebutuhan.

## 🧪 Testing

```bash
php artisan test
```

Atau jika menggunakan PestPHP:

```bash
./vendor/bin/pest
```

## 👤 Role Default

| Role        | Akses Utama               |
|-------------|---------------------------|
| `admin`     | Dashboard, Rekap, Admin   |
| `petugas`   | Input kunjungan harian    |
| `verifikator` | Verifikasi data kunjungan |

## 📄 Lisensi

Proyek ini berada di bawah lisensi MIT. Silakan gunakan dan modifikasi sesuai kebutuhan.

---

### ✨ Kontribusi

Proyek ini merupakan bagian dari pengembangan sistem internal dan dapat dikembangkan lebih lanjut untuk keperluan institusi lainnya. Jika Anda ingin ikut berkontribusi, silakan fork dan kirimkan pull request!
