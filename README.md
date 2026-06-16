# Website Profil Sekolah

Website profil sekolah modern yang dibangun dengan Laravel 11, menampilkan informasi sekolah, berita, galeri, dan panel admin yang lengkap.

## Fitur Utama

### Frontend
- **Halaman Utama**: Hero section dengan statistik sekolah
- **Profil Sekolah**: Visi, misi, dan nilai-nilai sekolah
- **Informasi/Berita**: Sistem berita dengan pagination
- **Galeri**: Galeri foto dengan kategori
- **Responsive Design**: Tampilan optimal di semua perangkat

### Admin Panel
- **Dashboard**: Statistik dan aktivitas terbaru
- **Manajemen Informasi**: CRUD berita dengan upload gambar
- **Manajemen Galeri**: CRUD galeri foto dengan kategori
- **Pengaturan**: Konfigurasi website dan profil sekolah

## Teknologi

- **Laravel 11** - PHP Framework
- **Bootstrap 5** - CSS Framework  
- **SQLite** - Database
- **Font Awesome** - Icons
- **Google Fonts** - Typography

## Instalasi

1. **Clone Repository**
   ```bash
   git clone <repository-url>
   cd website-profile-sekolah
   ```

2. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Setup Environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Setup Database**
   ```bash
   touch database/database.sqlite
   php artisan migrate --seed
   ```

5. **Storage Link**
   ```bash
   php artisan storage:link
   ```

6. **Run Server**
   ```bash
   php artisan serve
   ```

## Login Admin

- **URL**: `/login`
- **Email**: `admin@namasekolah.sch.id`
- **Password**: `password`

## Struktur Database

### Tabel Informasi
- `id` - Primary key
- `judul` - Judul berita
- `konten` - Isi berita
- `gambar` - Path gambar (opsional)
- `is_published` - Status publikasi
- `created_at`, `updated_at` - Timestamp

### Tabel Galeri
- `id` - Primary key
- `judul` - Judul foto
- `deskripsi` - Deskripsi foto
- `gambar` - Path gambar
- `kategori` - Kategori foto
- `is_published` - Status publikasi
- `created_at`, `updated_at` - Timestamp

### Tabel Pengaturan
- `id` - Primary key
- `key` - Kunci pengaturan
- `value` - Nilai pengaturan
- `type` - Tipe data (text, textarea, image, boolean)
- `group` - Grup pengaturan
- `created_at`, `updated_at` - Timestamp

## Kustomisasi

### Mengubah Warna Tema
Edit variabel CSS di `resources/views/layouts/frontend.blade.php`:
```css
:root {
    --primary-color: #3b82f6;
    --secondary-color: #1e40af;
    --success-color: #10b981;
    --warning-color: #f59e0b;
}
```

### Menambah Menu Navigasi
Edit file `resources/views/layouts/frontend.blade.php` pada bagian navbar.

### Mengubah Logo
Ganti icon di navbar atau upload logo melalui pengaturan admin.

## Responsive Breakpoints

- **Mobile**: < 768px
- **Tablet**: 768px - 1024px
- **Desktop**: > 1024px

## Maintenance

### Clear Cache
```bash
php artisan config:clear
php artisan cache:clear
php artisan view:clear
```

### Backup Database
```bash
cp database/database.sqlite database/backup-$(date +%Y%m%d).sqlite
```

## License

Open source software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Support

Untuk bantuan dan support, silakan hubungi developer atau buat issue di repository ini.
