# RFCI-BE--Prayugo-Dwi-

Untuk Menjalankan Client server app

1. composer install
2. Buka crontab -e
3. lalu seting cron seperti berikut
    - */1 * * * * php /var/www/html/Client-Server-App/artisan schedule:run >> /tmp/server.log
4. untuk folder projek disesuaikan dengan cron agar bisa jalan
5. lalu save
6. jika sudah dijalnkan file server.log akan ter create di Client-Server-App/storage/logs/cron
