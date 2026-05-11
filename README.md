# Sistem Informasi Kurikulum & RPS - Fakultas Teknik UNSULBAR 🎓

Sistem Informasi Kurikulum dan Rencana Pembelajaran Semester (RPS) berbasis website yang dikembangkan menggunakan **Laravel 11**. Aplikasi ini dirancang khusus untuk mengelola pendataan Prodi, Kurikulum, Angkatan, Semester, dan Mata Kuliah (Wajib & Peminatan) di lingkungan Fakultas Teknik Universitas Sulawesi Barat (UNSULBAR).

## ✨ Fitur Utama
- **Public View (Mahasiswa/Umum)**: Menampilkan antarmuka yang bersih untuk melihat daftar kurikulum dan RPS setiap program studi yang dibedakan dalam bentuk _Tab_.
- **Smart Search (Real-time)**: Fitur pencarian instan di halaman publik yang langsung menyaring mata kuliah berdasarkan kode atau nama, dan otomatis menyembunyikan blok tabel/kurikulum yang tidak memiliki hasil.
- **Hierarchical Data**: Relasi database terstruktur mulai dari `Prodi -> Kurikulum -> Angkatan -> Semester -> Mata Kuliah`.
- **Navy Admin Dashboard**: Panel admin eksklusif dengan UI/UX bertema _Navy_ yang elegan, lengkap dengan sidebar dan sistem CRUD (Create, Read, Update, Delete) yang dinamis.
- **Secure Authentication**: Sistem _login_ bawaan yang membatasi akses pengelolaan data secara penuh hanya untuk Administrator.

---

## 🚀 Cara Menjalankan Project (Lokal)

Ikuti langkah-langkah di bawah ini untuk menginstal dan menjalankan aplikasi di komputer Anda:

### 1. Kebutuhan Sistem
Pastikan Anda telah menginstal:
- PHP (minimal versi 8.2)
- Composer
- XAMPP / MySQL Server

### 2. Instalasi
Clone repositori ini ke folder komputer Anda:
```bash
git clone https://github.com/yanrzz/Sistem-RPS.git
cd Sistem-RPS
```

Install seluruh dependensi library yang dibutuhkan:
```bash
composer install
```

### 3. Konfigurasi Environment
Salin file pengaturan `.env.example` menjadi `.env`:
```bash
copy .env.example .env
```
Buka file `.env` di _text editor_ dan atur pengaturan databasenya (pastikan Anda sudah membuat database kosong bernama `akademik_rps` atau nama lain di phpMyAdmin):
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=akademik_rps
DB_USERNAME=root
DB_PASSWORD=
```

Lalu jalankan perintah untuk menghasilkan Application Key:
```bash
php artisan key:generate
```

### 4. Migrasi Database & Seeding
Jalankan perintah ini untuk otomatis membangun seluruh tabel database:
```bash
php artisan migrate
```
Jika Anda ingin memasukkan akun Admin bawaan, Anda dapat menjalankan seeder:
```bash
php artisan db:seed --class=AdminUserSeeder
```

### 5. Jalankan Server
Setelah semuanya siap, hidupkan server lokal Laravel:
```bash
php artisan serve
```
Aplikasi kini dapat diakses melalui web browser di: **http://localhost:8000**

---

*Dikembangkan untuk digitalisasi RPS Fakultas Teknik UNSULBAR.*
