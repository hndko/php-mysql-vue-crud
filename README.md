# CRUD Mahasiswa

CRUD Mahasiswa adalah aplikasi sederhana untuk mengelola data mahasiswa menggunakan PHP 7, MySQL, Bootstrap 5, dan Vue 3. Aplikasi ini memungkinkan pengguna untuk melakukan operasi Create, Read, Update, dan Delete (CRUD) pada data mahasiswa.

## Fitur

- Menampilkan daftar mahasiswa.
- Menambahkan data mahasiswa baru.
- Mengedit data mahasiswa yang ada.
- Menghapus data mahasiswa.

## Teknologi yang Digunakan

- PHP 7
- MySQL
- Bootstrap 5
- Vue 3
- Axios

## Struktur Proyek

```
project/
│
├── config/
│   └── db.php
│
├── create.php
├── delete.php
├── edit.php
├── index.php
└── mahasiswa.sql
```

## Persyaratan

- PHP 7.x
- MySQL
- Web server (seperti Apache atau Nginx)

## Instalasi

1. Clone repositori ini ke direktori lokal Anda:
   ```sh
   git clone https://github.com/username/crud-mahasiswa.git
   ```
2. Import database:

   - Buka phpMyAdmin atau tool database lainnya.
   - Buat database baru dengan nama `pendidikan`.
   - Import file `mahasiswa.sql` ke dalam database `pendidikan`.

3. Konfigurasi koneksi database:

   - Buka `config/db.php` dan sesuaikan konfigurasi koneksi database dengan pengaturan Anda.

     ```php
     <?php
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "pendidikan";

     // Create connection
     $conn = new mysqli($servername, $username, $password, $dbname);

     // Check connection
     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
     }
     ?>
     ```

4. Jalankan aplikasi:
   - Pastikan server web Anda aktif.
   - Buka browser dan akses `index.php` dari direktori proyek.

## Penggunaan

- **Menampilkan Data Mahasiswa:** Akses halaman utama (`index.php`) untuk melihat daftar mahasiswa.
- **Menambahkan Data Mahasiswa:** Klik tombol "Tambah Mahasiswa" dan isi form yang muncul di modal.
- **Mengedit Data Mahasiswa:** Klik tombol "Edit" pada baris data mahasiswa yang ingin diubah, lalu ubah data di form yang muncul di modal.
- **Menghapus Data Mahasiswa:** Klik tombol "Delete" pada baris data mahasiswa yang ingin dihapus.

## Kontribusi

1. Fork repositori ini.
2. Buat branch baru: `git checkout -b fitur-baru`.
3. Commit perubahan Anda: `git commit -m 'Menambahkan fitur baru'`.
4. Push ke branch: `git push origin fitur-baru`.
5. Buat Pull Request.

## Lisensi

Proyek ini dilisensikan di bawah lisensi MIT. Lihat file [LICENSE](LICENSE) untuk informasi lebih lanjut.
