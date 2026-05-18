# Dokumentasi Sistem Informasi Kurikulum & RPS

## 1. Deskripsi Proyek
**Sistem Informasi Kurikulum dan Rencana Pembelajaran Semester (RPS)** adalah aplikasi berbasis web yang dikembangkan menggunakan framework PHP **Laravel 11**. Aplikasi ini dirancang secara khusus untuk memfasilitasi pendataan dan manajemen Kurikulum, Angkatan, Semester, serta Mata Kuliah di lingkungan Fakultas Teknik Universitas Sulawesi Barat (UNSULBAR).

Aplikasi ini memiliki dua antarmuka utama:
1. **Public View**: Halaman yang dapat diakses oleh mahasiswa atau publik untuk melihat daftar mata kuliah berdasarkan kurikulum dari masing-masing program studi (Prodi).
2. **Admin Dashboard**: Halaman panel kontrol yang diakses oleh administrator (membutuhkan login) untuk mengelola data (CRUD) secara menyeluruh.

---

## 2. Fitur Utama

- **Navigasi Berbasis Tab (Public)**: Data mata kuliah disajikan secara interaktif menggunakan tab untuk membedakan kurikulum (misal: Kurikulum 2019 vs 2023) sehingga tidak perlu memuat ulang halaman.
- **Smart Search (Real-time)**: Fitur pencarian pada halaman publik maupun admin yang dapat memfilter mata kuliah berdasarkan nama atau kode secara langsung, serta menyembunyikan tabel/tab yang tidak memiliki kecocokan data.
- **Manajemen Data Terpusat (Admin)**: Sistem CRUD terpadu untuk entitas Prodi, Kurikulum, Angkatan, Semester, dan Mata Kuliah dengan standar UI/UX yang konsisten (Warna Tombol Hijau, Kuning, Merah).
- **Sistem Autentikasi**: Pembatasan hak akses berbasis session untuk melindungi data sensitif; hanya pengguna yang sah yang bisa masuk ke area Admin.
- **Safety Delete Confirmation**: Setiap aksi penghapusan (Delete) di dashboard admin dilengkapi dengan pop-up konfirmasi untuk mencegah hilangnya data secara tidak sengaja.

---

## 3. Arsitektur Database & Relasi Model

Sistem ini memiliki relasi hierarki data yang jelas. Berikut adalah urutan relasi modelnya:

`Prodi` ➔ `Kurikulum` ➔ `Angkatan` ➔ `Semester` ➔ `Matakuliah`

- **User**: Menyimpan data autentikasi administrator.
- **Prodi (Program Studi)**: Entitas teratas (misal: Teknik Informatika, Teknik Sipil).
- **Kurikulum**: Setiap Prodi memiliki satu atau lebih Kurikulum (misal: Kurikulum 2023). Relasi: `BelongsTo` Prodi.
- **Angkatan**: Tahun angkatan (misal: 2023, 2024). Relasi: `BelongsTo` Kurikulum.
- **Semester**: Semester pelaksanaan (misal: Semester 1, Semester 2). Relasi: `BelongsTo` Angkatan.
- **Matakuliah**: Detail dari mata kuliah itu sendiri beserta tautan dokumen RPS-nya. Relasi: `BelongsTo` Semester.

---

## 4. Struktur Routing & Hak Akses

Routing pada aplikasi terbagi menjadi tiga segmen utama (dikonfigurasi dalam `routes/web.php`):

### A. Public (Guest/Mahasiswa)
| Method | Endpoint | Controller Action | Keterangan |
| :--- | :--- | :--- | :--- |
| GET | `/` | Redirect ke `/rps` | Akses awal domain |
| GET | `/rps` | `MatakuliahController@public`| Halaman utama RPS publik |

### B. Autentikasi
| Method | Endpoint | Controller Action | Keterangan |
| :--- | :--- | :--- | :--- |
| GET | `/login` | `AuthController@index` | Menampilkan form login |
| POST | `/login` | `AuthController@authenticate`| Memproses login credentials |
| POST | `/logout` | `AuthController@logout` | Mengakhiri sesi (Logout) |

### C. Admin Dashboard (Memerlukan Login)
Dikelompokkan di dalam middleware `auth`. Semua diimplementasikan menggunakan **Resource Controller**.
| Method | Endpoint Base | Controller | Keterangan |
| :--- | :--- | :--- | :--- |
| GET | `/dashboard` | Redirect ke `/prodi` | Entry point admin |
| ALL | `/prodi` | `ProdiController` | CRUD Program Studi |
| ALL | `/kurikulum` | `KurikulumController`| CRUD Kurikulum |
| ALL | `/angkatan` | `AngkatanController` | CRUD Angkatan |
| ALL | `/semester` | `SemesterController` | CRUD Semester |
| ALL | `/matakuliah` | `MatakuliahController`| CRUD Mata Kuliah |

---

## 5. UI/UX & Standar Desain

Selama proses pengembangan, terdapat penyesuaian untuk standardisasi tampilan antarmuka (UI):
- **Skema Warna Tombol Admin**:
  - `Hijau` (Success): Untuk aksi "Tambah", "Simpan", "Update".
  - `Kuning` (Warning): Untuk aksi "Edit".
  - `Merah` (Danger): Untuk aksi "Hapus/Delete".
- **Tema Dashboard**: Menggunakan nuansa "Navy" (Biru Dongker) pada Sidebar dan Header. Terdapat logo institusi pada bagian atas sidebar.
- **Pagination**: Menampilkan data sebanyak 20 item per halaman pada pengelolaan agar antarmuka tidak terlalu berat.

---

## 6. Panduan Instalasi Lokal

### Kebutuhan Server
- **PHP**: Versi 8.2 atau lebih baru.
- **Composer**: Untuk manajemen paket PHP.
- **MySQL / MariaDB**: Server database (bisa menggunakan XAMPP/Laragon).

### Langkah Instalasi

1. **Clone Repository**
   ```bash
   git clone https://github.com/yanrzz/Sistem-RPS.git
   cd Sistem-RPS
   ```

2. **Install Dependensi Laravel**
   ```bash
   composer install
   ```

3. **Konfigurasi Environment (.env)**
   - Copy file konfigurasi:
     ```bash
     copy .env.example .env
     ```
   - Sesuaikan konfigurasi koneksi database:
     ```env
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=akademik_rps
     DB_USERNAME=root
     DB_PASSWORD=
     ```
   - Generate application key:
     ```bash
     php artisan key:generate
     ```

4. **Migrasi Database & Seeding**
   - Buat struktur database:
     ```bash
     php artisan migrate
     ```
   - (Opsional) Masukkan data awal termasuk akun Admin default:
     ```bash
     php artisan db:seed --class=AdminUserSeeder
     ```

5. **Jalankan Aplikasi**
   ```bash
   php artisan serve
   ```
   Akses di browser melalui: `http://localhost:8000`
