<h1 align="center">Bluespace</h1>

## Tentang
<p>Bluespace merupakan sebuah website kecil yang dibuat untuk menyimpan gambar layaknya sebuah gallery.</p>

## Tools yang digunakan

- [VScode](https://code.visualstudio.com/download).
- [XAMPP](https://www.apachefriends.org/download.html).
- [composer](https://getcomposer.org/download/)
- Laravel versi 10.0 dan Bootstrap Framework
- Git
- Github
- PHP versi 8.2

## Menggunakan aplikasi/website Bluespace
Untuk bisa mengakses website ini, anda tinggal membuat akun pada halaman sign up lalu sign in.

## Entity Relationship Diagram, Unified Modeling Language, dan Relasi

<h2 align="center">Entity Relationship Diagram</h2>

![erd](https://github.com/intanrnay/tatagallery/assets/140694462/3f40fd50-9cc4-4bb2-a123-85980c5af55e)
<h2 align="center">Unified Modeling Language</h2>

![uml 2](https://github.com/intanrnay/tatagallery/assets/140694462/5431e8a2-1c71-42f9-a51a-af09be7891e4)
<h2 align="center">Relasi</h2>

![Screenshot (23)](https://github.com/intanrnay/tatagallery/assets/140694462/0ebd92ac-c85d-42a1-b012-092324aa6cac)


## Tampilan Website
<h3 align="center">Homepage</h3>

![Screenshot (13)](https://github.com/intanrnay/tatagallery/assets/140694462/d37e053e-a75c-492e-8005-695bf566e2b1)
<h3 align="center">Studio</h3>

![Screenshot (17)](https://github.com/intanrnay/tatagallery/assets/140694462/10f6c16c-d2fb-4149-a9f2-4dd08bd32205)

<h3 align="center">Sign Up</h3>

![Screenshot (8)](https://github.com/intanrnay/tatagallery/assets/140694462/34ec73ab-6c0a-4018-bc3b-e6a9ba40ee63)
<h3 align="center">Sign In</h3>

![Screenshot (7)](https://github.com/intanrnay/tatagallery/assets/140694462/bdde40e3-73f4-47d3-8c81-1914bfbe7896)
<h3 align="center">Create</h3>

![Screenshot (26)](https://github.com/intanrnay/tatagallery/assets/140694462/657f2637-87e0-4156-9d89-c4042aab437b)
<h3 align="center">Create Foto</h3>

![Screenshot (27)](https://github.com/intanrnay/tatagallery/assets/140694462/bdc7ad35-714f-4c60-ac71-19b8b7c17bfc)
<h3 align="center">Create Album</h3>

![Screenshot (11)](https://github.com/intanrnay/tatagallery/assets/140694462/657310af-b619-4d64-a545-856e0ea5ce8b)
<h3 align="center">Post Photo</h3>

![Screenshot (9)](https://github.com/intanrnay/tatagallery/assets/140694462/3dfb2e74-a3b8-42c8-a186-a5e61838c63f)
<h3 align="center">Comment</h3>

![Screenshot (21)](https://github.com/intanrnay/tatagallery/assets/140694462/76f5ddee-01d7-424a-ad22-1d4a124303c8)
<h3 align="center">Like</h3>

![Screenshot (20)](https://github.com/intanrnay/tatagallery/assets/140694462/f1e13ef2-0fec-4475-85e6-0b68b918252c)
<h3 align="center">Post Foto ke dalam Album</h3>

![Screenshot (15)](https://github.com/intanrnay/tatagallery/assets/140694462/d0be27b3-1db3-4a91-b023-1aa0b70aa202)
<h3 align="center">Album</h3>

![Screenshot (18)](https://github.com/intanrnay/tatagallery/assets/140694462/d1a89add-c664-44ff-973b-ec01a455315d)

## Fitur
Beberapa fitur di bawah ini yang sudah berjalan dengan baik, diantaranya :
1. Website sudah bisa berjalan dengan multiuser
2. Sign Up
3. Sign In
4. Logout
5. Post Foto
6. Post Album
7. Menambah Komentar
8. Like Foto
9. Unlike Foto
10. View Foto
11. View Album


## Note
Website masih dalam proses pengembangan sehingga masih ada beberapa fitur yang belum bisa digunakan seperti delete post, delete komentar, dan delete album. untuk itu, disarankan untuk menggunakan fitur yang sudah berjalan seperti posting foto, like, comment atau membuat album. Terima Kasih <3

## Terakhir, Instalasi
1. Clone Repository
```
https://github.com/intanrnay/tatagallery
```

2. Install Composer
```
composer install
```
atau
```
composer update
```

3. Copy .Env
```
copy .env.example .env
```

4. Setting database di .env
```
DB_PORT=3306
DB_DATABASE=galleryphoto
DB_USERNAME=root
DB_PASSWORD=
```

5. Generate key
```
php artisan key:generate
```

6. Jalankan migrate dan seeder
```
php artisan migrate
```

7. Jalankan Serve
```
php artisan serve
```
