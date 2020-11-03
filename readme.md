How To Install this Project
1. Persiapan
	- Memiliki CLI/Command Line Interface berupa Command Prompt (CMD) atau Power Shell atau Git Bash (selanjutnya kita sebut terminal).
	- Memiliki Web Server (misal XAMPP) dengan PHP Minimal 7.0 PHP maximal versi 7.2.24 Karena project ini menggunakan framework laravel versi 5.8
	- Composer telah ter-install, cek dengan perintah composer -V melalui terminal.
	- Memiliki koneksi internet (untuk proses installasi).

2. Langkah-Langkah
	- git clone https://github.com/mohrahmatullah/cms-indocyber-test.git Melalui terminal,
	- Masuk ke direktori cms-indocyber-test melalui terminal dengan perintah cd cms-indocyber-test.
	- (Sesuai petunjuk installasi) Pada terminal, berikan perintah composer install. Ini perlu koneksi internet.
	- Composer akan menginstall dependency paket dari source code tersebut hingga selesai.
	- Jalankan perintah php artisan, untuk menguji apakah perintah artisan Laravel bekerja.
	- Buat database baru (kosong) pada mysql (via phpmyadmin) dengan nama cms-indocyber-test.
	- Duplikat file .env.example, lalu rename menjadi .env.
	- Kembali ke terminal, php artisan key:generate.
	- Setting koneksi database di file .env (DB_DATABASE, DB_USERNAME, DB_PASSWORD) dan tambah kan (URL_MEDIA) ini untuk url image 

		URL_MEDIA=http://127.0.0.1:8000

		DB_CONNECTION=mysql

		DB_HOST=localhost

		DB_PORT=3306

		DB_DATABASE=cms-indocyber-test

		DB_USERNAME=root

		DB_PASSWORD=

	- Run migrations (tables and Seeders) php artisan migrate --seed. Cek di phpmyadmin, seharusnya tabel dan isi nya sudah muncul.
	- Setelah selesai, Jalankan perintah php artisan serve maka dapat diakses dengan http://127.0.0.1:8000/
 

Silahkan Ujicoba test dengan mengakses link http://127.0.0.1:8000/

Ketentuan:

Ini dengan akses 0 akan berhasil login

			email : admin@email.com
			password : 12345

ini dengan akses 1 tidak akan berhasil karena ketentuan dari soal

			email : users@email.com
			password : 12345


Terimakasih atas kesempatannya untuk mengikuti test skill pada indocyber