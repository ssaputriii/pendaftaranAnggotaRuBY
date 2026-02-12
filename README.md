# Sistem Pendaftaran Anggota Rumah BUMN Yogyakarta

Implementasi landing page sistem pendaftaran anggota menggunakan struktur **Laravel 10+ (MVC + Blade Template)**.

## Struktur MVC yang digunakan

- **Model**: `app/Models/MembershipType.php`
- **Controller**: `app/Http/Controllers/HomeController.php`
- **Route**: `routes/web.php`
- **View Blade**:
  - `resources/views/layouts/app.blade.php`
  - `resources/views/partials/navbar.blade.php`
  - `resources/views/partials/footer.blade.php`
  - `resources/views/pages/home.blade.php`

## Menjalankan proyek

Karena lingkungan ini tidak memiliki akses ke Packagist, dependensi Laravel belum dapat diunduh otomatis.

Saat jaringan tersedia:

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan serve
```

Akses aplikasi di `http://127.0.0.1:8000`.
