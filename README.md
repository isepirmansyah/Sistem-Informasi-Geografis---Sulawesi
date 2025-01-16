# Langkah Instalasi untuk Proyek Laravel

Ikuti langkah-langkah berikut untuk mengatur proyek Laravel Anda:

1. **Kloning Repository**

    ```bash
    git clone https://github.com/isepirmansyah/Sistem-Informasi-Geografis---Sulawesi.git
    cd Sistem-Informasi-Geografis---Sulawesi
    ```

2. **Instal Dependensi Composer**

    ```bash
    composer install
    ```

3. **Salin File .env**

    ```bash
    cp .env.example .env
    ```

4. **Generate Kunci Aplikasi**

    ```bash
    php artisan key:generate
    ```

5. **Konfigurasi Variabel Lingkungan**

    Buka file `.env` dan perbarui variabel lingkungan yang diperlukan, seperti kredensial database.

6. **Jalankan Migrasi**

    ```bash
    php artisan migrate
    ```

7. **Jalankan Aplikasi**

    ```bash
    php artisan serve
    ```

Proyek Laravel Anda sekarang seharusnya sudah berjalan. Buka browser Anda dan navigasikan ke `http://localhost:8000` untuk melihat aplikasi.
