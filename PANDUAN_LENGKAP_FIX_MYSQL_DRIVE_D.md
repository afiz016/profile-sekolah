# 🔧 Panduan Lengkap Fix MySQL - XAMPP di Drive D

## ✅ XAMPP di Drive D Tidak Masalah!

XAMPP bisa berjalan dengan baik di drive D. Tidak perlu pindah ke C.

---

## 🎯 LANGKAH LENGKAP (Ikuti Urutan Ini):

### **STEP 1: Start MySQL di XAMPP**

#### 1.1 Buka XAMPP Control Panel
- Cari di Start Menu: "XAMPP Control Panel"
- Atau buka: `D:\xampp\xampp-control.exe`
- Klik kanan → Run as Administrator

#### 1.2 Start Apache dan MySQL
- Klik tombol **"Start"** di Apache
- Klik tombol **"Start"** di MySQL
- Tunggu sampai kedua service berwarna hijau

#### 1.3 Jika MySQL Tidak Bisa Start
**Cek Error Log:**
- Klik tombol **"Logs"** di MySQL
- Pilih **"MySQL Error Log"**
- Screenshot error terakhir

**Common Errors:**

**A. Port 3306 Already in Use**
```
Solusi:
1. Klik "Config" di MySQL
2. Pilih "my.ini"
3. Cari: port=3306
4. Ganti: port=3307
5. Save
6. Update .env: DB_PORT=3307
7. Start MySQL lagi
```

**B. InnoDB Error**
```
Solusi:
1. Stop MySQL
2. Hapus file di D:\xampp\mysql\data:
   - ibdata1
   - ib_logfile0
   - ib_logfile1
3. Start MySQL lagi
```

---

### **STEP 2: Fix Database**

#### 2.1 Buka phpMyAdmin
```
http://localhost/phpmyadmin
```

Jika tidak bisa dibuka:
- Pastikan Apache running
- Coba: http://127.0.0.1/phpmyadmin

#### 2.2 Drop Database Lama
1. Klik database **"profil_sekolah"** di sidebar kiri
2. Klik tab **"Operations"** di atas
3. Scroll ke bawah
4. Klik **"Drop the database (DROP)"** (warna merah)
5. Konfirmasi **"OK"**

**Jika Error "Permission Denied":**
1. Stop MySQL di XAMPP
2. Buka folder: `D:\xampp\mysql\data`
3. Hapus folder: `profil_sekolah`
4. Start MySQL lagi
5. Lanjut ke step 2.3

#### 2.3 Buat Database Baru
1. Klik **"New"** di sidebar kiri
2. Atau klik **"Databases"** di top menu
3. Isi form:
   - Database name: **profil_sekolah**
   - Collation: **utf8mb4_unicode_ci**
4. Klik **"Create"**

#### 2.4 Verifikasi Database Dibuat
- Refresh sidebar
- Database "profil_sekolah" harus muncul
- Klik database tersebut
- Harus kosong (no tables yet)

---

### **STEP 3: Migrate Laravel**

#### 3.1 Clear Cache Laravel
```bash
php artisan config:clear
php artisan cache:clear
```

#### 3.2 Test Koneksi Database
```bash
php artisan tinker --execute="DB::connection()->getPdo(); echo 'Database connected!';"
```

Jika berhasil, akan muncul: `Database connected!`

#### 3.3 Migrate Database
```bash
php artisan migrate --seed
```

Jika berhasil, akan muncul:
```
INFO  Running migrations.
✓ 2014_10_12_000000_create_users_table
✓ 2014_10_12_100000_create_password_reset_tokens_table
✓ 2019_08_19_000000_create_failed_jobs_table
✓ 2019_12_14_000001_create_personal_access_tokens_table
✓ ...
INFO  Seeding database.
```

---

### **STEP 4: Test Website**

#### 4.1 Start Laravel Server
```bash
php artisan serve
```

#### 4.2 Buka Browser
```
http://localhost:8000
```

#### 4.3 Test Login Admin
```
http://localhost:8000/login
Email: admin@example.com
Password: password
```

---

## 🔍 TROUBLESHOOTING

### Problem 1: MySQL Tidak Bisa Start

**Cek Port:**
```powershell
netstat -ano | findstr :3306
```

Jika ada output, port 3306 sudah digunakan.

**Solusi:**
1. Ganti port MySQL ke 3307
2. Update `.env`: `DB_PORT=3307`

---

### Problem 2: "Access Denied for User 'root'"

**Cek File .env:**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=profil_sekolah
DB_USERNAME=root
DB_PASSWORD=
```

**Pastikan:**
- `DB_PASSWORD` kosong (tidak ada password)
- `DB_HOST` adalah `127.0.0.1` atau `localhost`
- `DB_PORT` adalah `3306` (atau 3307 jika diganti)

**Clear cache:**
```bash
php artisan config:clear
```

---

### Problem 3: "SQLSTATE[HY000] [2002] No connection"

**Penyebab:**
- MySQL belum running
- Port salah
- Firewall block

**Solusi:**
1. Pastikan MySQL running di XAMPP (hijau)
2. Test ping: `ping 127.0.0.1`
3. Cek firewall Windows

---

### Problem 4: Database Corrupt Lagi

**Solusi Permanent:**

#### A. Ganti InnoDB ke MyISAM (Lebih Stabil)
Edit: `D:\xampp\mysql\bin\my.ini`
```ini
default-storage-engine=MyISAM
```

#### B. Disable InnoDB
Edit: `D:\xampp\mysql\bin\my.ini`
```ini
skip-innodb
```

Restart MySQL setelah edit.

---

## 📝 CHECKLIST

### Sebelum Mulai:
- [ ] XAMPP di drive D sudah terinstall
- [ ] Bisa akses XAMPP Control Panel
- [ ] Backup data penting (jika ada)

### Saat Fix:
- [ ] MySQL berhasil running (hijau di XAMPP)
- [ ] phpMyAdmin bisa dibuka
- [ ] Database profil_sekolah dibuat baru
- [ ] Migrate berhasil tanpa error

### Setelah Fix:
- [ ] Website bisa dibuka
- [ ] Login admin berhasil
- [ ] Ganti password admin
- [ ] Update pengaturan kontak
- [ ] Backup database baru

---

## 🎯 QUICK FIX (Ringkasan)

**Jika MySQL tidak bisa start:**
1. Buka XAMPP Control Panel as Administrator
2. Stop MySQL (jika running)
3. Hapus file di `D:\xampp\mysql\data`:
   - ibdata1
   - ib_logfile0
   - ib_logfile1
4. Start MySQL lagi

**Jika MySQL sudah running tapi database error:**
1. Buka: http://localhost/phpmyadmin
2. Drop database "profil_sekolah"
3. Buat database baru "profil_sekolah"
4. Jalankan: `php artisan migrate --seed`

---

## 💡 TIPS PENTING

### Untuk XAMPP di Drive D:

✅ **Tidak perlu pindah ke C!**
✅ **Path command harus pakai D:\xampp**
✅ **Konfigurasi Laravel tidak perlu diubah**
✅ **phpMyAdmin tetap: http://localhost/phpmyadmin**

### Mencegah Crash Lagi:

1. **Selalu Stop MySQL Sebelum Shutdown:**
   - Buka XAMPP Control Panel
   - Klik "Stop" di MySQL
   - Tunggu sampai stop
   - Baru shutdown komputer

2. **Backup Database Rutin:**
   - Export dari phpMyAdmin
   - Simpan file .sql
   - Backup seminggu sekali

3. **Jangan Force Close XAMPP:**
   - Jangan close dari Task Manager
   - Gunakan tombol Stop di XAMPP

4. **Update XAMPP:**
   - Download versi terbaru
   - Backup dulu sebelum update

---

## 🆘 JIKA MASIH GAGAL

### Coba Langkah Ini:

1. **Restart Komputer**
   - Kadang ini sudah cukup!

2. **Run XAMPP as Administrator**
   - Klik kanan xampp-control.exe
   - Run as Administrator

3. **Disable Antivirus Sementara**
   - Kadang antivirus block MySQL

4. **Cek Windows Event Viewer**
   - Start → Event Viewer
   - Windows Logs → Application
   - Cari error MySQL

---

## 📞 Butuh Bantuan Lebih?

Jika masih error, kirim info ini:
1. Screenshot XAMPP Control Panel
2. Screenshot error log MySQL
3. Isi file: `D:\xampp\mysql\data\mysql_error.log`
4. Versi XAMPP yang digunakan

---

**XAMPP di drive D tidak masalah! Ikuti langkah di atas untuk fix database.** 🎉
