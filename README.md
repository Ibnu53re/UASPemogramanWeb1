# UASPemogramanWeb1

# Nama: Ibnu Nazhif Alamsyah
# NIM:  312410094

# Project UAS Pemrograman Web

## Deskripsi
Project ini merupakan aplikasi yang digunakan untuk mengelola data produk dengan sistem login
dan pembagian hak akses.

## Fitur
- Login dan Logout
- Hak akses Admin dan User
- Dashboard
- CRUD Produk (Create, Read, Update, Delete)
- Pencarian produk (Search)
- Pagination data produk
- Tampilan responsif menggunakan Bootstrap

## Teknologi yang Digunakan
- PHP Native
- MySQL
- Apache (XAMPP)
- Bootstrap 5


## Akun Demo
**Admin**
- Username: admin
- Password: admin123

## Cara Menjalankan Aplikasi
1. Install XAMPP
2. Pindahkan folder `project_uas` ke dalam folder `htdocs`
3. Jalankan Apache dan MySQL
4. Import database `project_uas` melalui phpMyAdmin
5. Akses aplikasi melalui browser:

# .htaccess
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php?url=$1 [QSA,L]

