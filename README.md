# e-prescription

# Tata cara Instalation di localhost (XAMPP)

    - Clone Repository dengan perintah "git clone git@github.com:febysuasaf/e-prescription.git" / download via Zip di repository
    - Import Database yang tersedia di folder db di project
    - Jalankan perintah composer install di dalam folder project
    - Copy file .env.example dan rubah nama file yang baru di copy menjadi .env
    - Masuk ke file .env dan masukan akses ke koneksi db local anda di baris ini :
        "   DB_CONNECTION=mysql
            DB_HOST=127.0.0.1
            DB_PORT=3306
            DB_DATABASE=(nama-table)
            DB_USERNAME=(username) // default root jika tidak di set di mysql nya
            DB_PASSWORD=(password) // default (kosongkan) jika tidak di set di mysql nya
        "
    - Jalankan aplikasi dengan perintah "php artisan serve" di dalam folder project dan akses url yang sudah ter generate dengan contoh sebagai berikut :
        " Starting Laravel development server: http://127.0.0.1:8000 "

    - Tatacara installasi tersebut untuk webservice Xampp base windows apabila menggunakan webservice lain seperti laragon dll bisa dilihat petunjuknya di internet
