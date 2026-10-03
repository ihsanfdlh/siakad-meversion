# 🎓 Sistem Akademik Laravel

Aplikasi web sederhana berbasis **Laravel** untuk mengelola data akademik seperti siswa dan mata pelajaran.

Project ini dibuat sebagai bagian dari pembelajaran **Framework Laravel** dan penerapan konsep **MVC, Routing, Controller, Model, Migration, dan Blade Template**.

---

## 📌 Tentang Project

Sistem Akademik merupakan aplikasi berbasis web yang digunakan untuk mengelola informasi akademik secara sederhana.

Aplikasi ini memiliki beberapa modul utama:

* 👨‍🎓 Data Siswa
* 📚 Data Mata Pelajaran
* 🔗 Navigasi menggunakan Named Route
* 🧩 Resource Controller
* 🗄️ Database menggunakan MySQL
* 🎨 Tampilan menggunakan Blade

---

## 🛠️ Teknologi yang Digunakan

| Teknologi | Keterangan                    |
| --------- | ----------------------------- |
| PHP       | Bahasa pemrograman utama      |
| Laravel   | Framework PHP                 |
| MySQL     | Database                      |
| Blade     | Template engine               |
| HTML      | Struktur halaman              |
| CSS       | Tampilan halaman              |
| Composer  | Dependency management         |
| XAMPP     | Local development environment |

---

## 📂 Struktur Project

text
project-laravel/
│
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── SiswaController.php
│   │       └── MatapelajaranController.php
│   │
│   └── Models/
│       ├── Siswa.php
│       └── Matapelajaran.php
│
├── database/
│   ├── migrations/
│   └── seeders/
│
├── resources/
│   └── views/
│       ├── siswa/
│       └── mapel/
│
├── routes/
│   └── web.php
│
├── public/
│
├── .env
├── artisan
├── composer.json
└── README.md


---

## 🚀 Instalasi

Clone atau salin project ke komputer.

### 1. Install dependency

bash
composer install


### 2. Buat file `.env`

bash
copy .env.example .env


Untuk Linux/macOS:

bash
cp .env.example .env


### 3. Generate application key

bash
php artisan key:generate


### 4. Konfigurasi database

Buka file:

text
.env


Kemudian sesuaikan konfigurasi database:

env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=akademik
DB_USERNAME=root
DB_PASSWORD=


### 5. Jalankan migration

bash
php artisan migrate


Jika terdapat seeder:

bash
php artisan db:seed


atau:

bash
php artisan migrate:fresh --seed


> ⚠️ Perintah `migrate:fresh --seed` akan menghapus tabel yang sudah ada dan membuatnya kembali.

---

## ▶️ Menjalankan Project

Jalankan server Laravel:

bash
php artisan serve


Kemudian buka:

text
http://127.0.0.1:8000


---

## 🧭 Routing

Project menggunakan **Named Route** untuk navigasi antar-modul.

Route utama menggunakan prefix:

php
Route::prefix('akademik')
    ->name('akademik.')
    ->group(function () {

        Route::resource('/siswa', SiswaController::class);

        Route::resource('/mapel', MatapelajaranController::class)
            ->only(['index', 'show', 'create', 'store']);

    });


### Siswa

| Method    | URL                            | Named Route              |
| --------- | ------------------------------ | ------------------------ |
| GET       | `/akademik/siswa`              | `akademik.siswa.index`   |
| GET       | `/akademik/siswa/create`       | `akademik.siswa.create`  |
| POST      | `/akademik/siswa`              | `akademik.siswa.store`   |
| GET       | `/akademik/siswa/{siswa}`      | `akademik.siswa.show`    |
| GET       | `/akademik/siswa/{siswa}/edit` | `akademik.siswa.edit`    |
| PUT/PATCH | `/akademik/siswa/{siswa}`      | `akademik.siswa.update`  |
| DELETE    | `/akademik/siswa/{siswa}`      | `akademik.siswa.destroy` |

### Mata Pelajaran

| Method | URL                       | Named Route             |
| ------ | ------------------------- | ----------------------- |
| GET    | `/akademik/mapel`         | `akademik.mapel.index`  |
| GET    | `/akademik/mapel/{mapel}` | `akademik.mapel.show`   |
| GET    | `/akademik/mapel/create`  | `akademik.mapel.create` |
| POST   | `/akademik/mapel`         | `akademik.mapel.store`  |

---

## 🔗 Contoh Named Route

Navigasi ke halaman siswa:

blade
<a href="{{ route('akademik.siswa.index') }}">
    Daftar Siswa
</a>


Navigasi ke halaman tambah siswa:

blade
<a href="{{ route('akademik.siswa.create') }}">
    Tambah Siswa
</a>


Navigasi ke detail siswa:

blade
<a href="{{ route('akademik.siswa.show', $data->id) }}">
    Lihat Detail
</a>


Dengan menggunakan named route, URL tidak perlu ditulis secara manual di dalam Blade.

---

## 👨‍🎓 Modul Siswa

Modul siswa digunakan untuk menampilkan dan mengelola data siswa.

Informasi yang tersedia antara lain:

* NIM
* Nama
* Program Studi
* Semester

Contoh data:

| NIM    | Nama            | Prodi                 | Semester |
| ------ | --------------- | --------------------- | -------: |
| 230001 | Ihsan Fadhilah  | D3 Teknik Informatika |        3 |
| 230002 | Muhammad Raihan | D3 Teknik Informatika |        3 |

---

## 📚 Modul Mata Pelajaran

Modul mata pelajaran digunakan untuk mengelola data mata pelajaran yang tersedia dalam sistem akademik.

Data yang dapat dikelola meliputi:

* Kode mata pelajaran
* Nama mata pelajaran
* SKS
* Deskripsi

---

## 🧩 Konsep Laravel yang Digunakan

Project ini menerapkan beberapa konsep dasar Laravel:

### MVC

text
Model
  ↓
Controller
  ↓
View


**Model** digunakan untuk berinteraksi dengan database.

**Controller** digunakan untuk mengatur proses dan alur aplikasi.

**View** digunakan untuk menampilkan halaman kepada pengguna.

---

### Resource Controller

Project menggunakan resource controller untuk mempermudah pengelolaan operasi CRUD.

Contoh:

bash
php artisan make:controller SiswaController --resource


Resource controller menyediakan method:

text
index()
create()
store()
show()
edit()
update()
destroy()


---

## 🗄️ Database

Database yang digunakan adalah **MySQL**.

Struktur database dapat dikembangkan sesuai kebutuhan sistem akademik.

Contoh tabel:

text
siswas
├── id
├── nim
├── nama
├── prodi
└── semester

matapelajarans
├── id
├── kode
├── nama
├── sks
└── deskripsi


---

## 🧪 Perintah Laravel yang Sering Digunakan

Melihat daftar route:

bash
php artisan route:list


Membersihkan cache:

bash
php artisan optimize:clear


Membuat controller:

bash
php artisan make:controller SiswaController --resource


Membuat model:

bash
php artisan make:model Siswa -m


Menjalankan migration:

bash
php artisan migrate


Rollback migration:

bash
php artisan migrate:rollback


Menjalankan server:

bash
php artisan serve


---

## 🎯 Tujuan Project

Project ini bertujuan untuk memahami penerapan framework Laravel dalam pembuatan aplikasi berbasis web, khususnya:

1. Memahami konsep MVC.
2. Memahami penggunaan routing.
3. Memahami Named Route.
4. Memahami Resource Controller.
5. Menghubungkan Laravel dengan database MySQL.
6. Menggunakan migration dan model.
7. Membuat tampilan menggunakan Blade.
8. Mengimplementasikan operasi CRUD.

---

## 👨‍💻 Developer

**Ihsan Fadhilah**

D3 Teknik Informatika
Politeknik Negeri Banjarmasin

> Built with Laravel, PHP, MySQL, and a lot of ☕.

---

## 📄 License

Project ini dibuat untuk keperluan pembelajaran dan pengembangan akademik.

---

⭐ Jika project ini membantu pembelajaran Laravel, jangan lupa untuk memberikan **star** pada repository.
