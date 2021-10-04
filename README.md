# Aplikasi Pegawai Sederhana
Aplikasi Database Pegawai Sederhana ini dibuat untuk mempelajari konsep dasar html form, post, penyimpanan ke database, dan *SQL Injection*.

Dikarenakan kita sedang mempelajari konsep dasar, maka aplikasi hanya memasukkan komponen standar HTML Form saja, tanpa CSS stylesheet. Tujuannya adalah untuk memudahkan pemahaman pemrosesan HTML Form menggunakan PHP.

## Instalasi
- Download atau clone repo ini, dan masukkan ke webroot
- Create database `pegawai` menggunakan phpMyAdmin (atau tools lain seperti HeidiSQL, Navicat, dll)
- Import file `tables.sql` yang ada di folder scripts ke database tersebut
- Akses melalui web browser

&nbsp;
# Pemrosesan Data
## Logika
Aplikasi ini memanfaatkan query string untuk menentukan file php mana yang akan dimuat untuk eksekusi
- `?f=pegawai-list` untuk memuat file `pegawai-list.php` dan menampilkan daftar pegawai 
- `?f=pegawai-view` untuk memuat file `pegawai-view.php` dan menampilkan detail pegawai bersangkutan 
- `?f=pegawai-form` untuk memuat file `pegawai-form.php` dan menampilkan form add/edit data pegawai 

Aplikasi ini juga memnfaatkan query string untuk menentukan jenis aksi yang akan dilakukan, aksi yang bisa dilakukan meliputi 
- `?action=create`, untuk menambahkan data pegawai baru.
- `?action=edit`, untuk mengubah data pegawai yang sudah ada.
- `?action=delete`, untuk menghapus data pegawai yang sudah ada.

Pemrosesan data kemudian dilakukan di file `pegawai-proses.php` berdasarkan dari `action` yang tersedia di query string.

## Menghindari *SQL Injection*
Untuk menghidari serangan *SQL Injection* maka kita harus mengubah pola pembuatan perintah sql menggunakan *string concatenation* seperti berikut ini, 

```
$sql = 'select * from pegawai where id=' . $id;
$rs = mysqli_query($db_conn, $sql);
$row = mysqli_fetch_assoc($rs);
```

menjadi menggunakan *parameter binding* seperti berikut ini, 

```
// prepare sql statement
$sql = "select id, nip, nama from pegawai where id = ?";
$stmt = mysqli_prepare($db_conn, $sql);
// bind parameter to prevent SQL Injection
mysqli_stmt_bind_param($stmt, 'd', $id);
// execute sql statement
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $id, $nip, $nama);
// fetch data pegawai
mysqli_stmt_fetch($stmt);
```
Dengan menggunaan *parameter binding*, maka otomatis *driver* mysqli akan melakukan sanitasi (pembersihan) terhadap karakter-karakter yang memungkinkan terjadinya *SQL Injection*.

&nbsp;
# Screenshots

## Penampakan List Data
![Tampilan List Data](images/screenshot-list.png?raw=true "Tampilan List Data")

## Penampakan Form Create Data
![Tampilan Edit Data](images/screenshot-create.png?raw=true "Tampilan Edit Data")

## Penampakan View Data
![Tampilan View Data](images/screenshot-view.png?raw=true "Tampilan View Data")

## Penampakan Edit Data
![Tampilan Edit Data](images/screenshot-edit.png?raw=true "Tampilan Edit Data")

# Pengembangan
Silakan clone dan buat PR (***pull request***)

&nbsp;
# Akhirul Kalam
Semoga berguna!

Salam,<br/>
**Nur Hidayat**
