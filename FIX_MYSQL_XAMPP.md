# 🔧 Cara Memperbaiki MySQL XAMPP yang Crash

## ❌ Error: MySQL shutdown unexpectedly

---

## ✅ SOLUSI 1: Restore dari Backup (PALING AMAN) ⭐

### Langkah-langkah:

#### 1. Stop MySQL (Jika Masih Running)
- Buka XAMPP Control Panel
- Klik "Stop" di MySQL
- Tunggu sampai benar-benar stop

#### 2. Backup Folder Data MySQL
1. Buka folder XAMPP: `C:\xampp\mysql\data`
2. Copy folder `data` ke tempat aman (Desktop/Documents)
3. Rename jadi: `data_backup_[tanggal]`

#### 3. Hapus File ibdata1
1. Masuk ke folder: `C:\xampp\mysql\data`
2. Cari file: `ibdata1`
3. **HAPUS** file `ibdata1`
4. Cari file: `ib_logfile0` dan `ib_logfile1`
5. **HAPUS** kedua file tersebut

#### 4. Copy Database Anda
1. Di folder `C:\xampp\mysql\data`
2. Cari folder database Anda: `website_sekolah` atau `laravel`
3. **JANGAN HAPUS** folder ini!
4. Copy folder database ke tempat aman (backup)

#### 5. Restore dari Backup XAMPP
1. Buka folder: `C:\xampp\mysql\backup`
2. Jika ada folder `data`, copy isinya
3. Paste ke: `C:\xampp\mysql\data`
4. Replace jika diminta

#### 6. Start MySQL Lagi
1. Buka XAMPP Control Panel
2. Klik "Start" di MySQL
3. Jika berhasil, MySQL akan running

#### 7. Restore Database Anda
1. Buka phpMyAdmin: http://localhost/phpmyadmin
2. Import database dari backup
3. Atau copy folder database yang tadi di-backup

---

## ✅ SOLUSI 2: Ganti Port MySQL (Jika Port Conflict)

### Langkah-langkah:

#### 1. Edit my.ini
1. Buka XAMPP Control Panel
2. Klik "Config" di MySQL
3. Pilih "my.ini"
4. Cari baris: `port=3306`
5. Ganti jadi: `port=3307`
6. Save file

#### 2. Edit File .env Laravel
1. Buka file `.env` di project Laravel
2. Cari: `DB_PORT=3306`
3. Ganti jadi: `DB_PORT=3307`
4. Save file

#### 3. Restart MySQL
1. Stop MySQL di XAMPP
2. Start MySQL lagi
3. Cek apakah running

---

## ✅ SOLUSI 3: Reinstall MySQL Service

### Langkah-langkah:

#### 1. Uninstall Service
1. Buka Command Prompt as Administrator
2. Ketik:
```cmd
cd C:\xampp\mysql\bin
mysqld --remove
```

#### 2. Install Service Lagi
```cmd
mysqld --install
```

#### 3. Start Service
```cmd
net start mysql
```

Atau start dari XAMPP Control Panel

---

## ✅ SOLUSI 4: Cek Error Log MySQL

### Langkah-langkah:

#### 1. Buka Error Log
1. Buka XAMPP Control Panel
2. Klik "Logs" di MySQL
3. Pilih "MySQL Error Log"

#### 2. Cari Error Terakhir
- Scroll ke paling bawah
- Cari baris yang ada kata "ERROR" atau "FATAL"
- Catat error messagenya

#### 3. Common Errors:

**Error: "Can't start server: Bind on TCP/IP port: Address already in use"**
- Solusi: Ganti port (Solusi 2)

**Error: "Table './mysql/user' is marked as crashed"**
- Solusi: Repair table (Solusi 5)

**Error: "InnoDB: Unable to lock ./ibdata1"**
- Solusi: Hapus ibdata1 (Solusi 1)

---

## ✅ SOLUSI 5: Repair Database

### Langkah-langkah:

#### 1. Start MySQL dalam Safe Mode
1. Buka Command Prompt as Administrator
2. Ketik:
```cmd
cd C:\xampp\mysql\bin
mysqld --console --skip-grant-tables --skip-networking
```

#### 2. Buka Command Prompt Baru
```cmd
cd C:\xampp\mysql\bin
mysql -u root
```

#### 3. Repair Database
```sql
USE mysql;
REPAIR TABLE user;
FLUSH PRIVILEGES;
EXIT;
```

#### 4. Stop MySQL Safe Mode
- Tekan Ctrl+C di Command Prompt pertama
- Start MySQL normal dari XAMPP

---

## ✅ SOLUSI 6: Fresh Install MySQL (LAST RESORT)

### ⚠️ HANYA JIKA SOLUSI LAIN GAGAL!

#### 1. Backup Database
1. Copy folder: `C:\xampp\mysql\data\[nama_database]`
2. Simpan di tempat aman

#### 2. Uninstall XAMPP
1. Stop semua service
2. Uninstall XAMPP dari Control Panel
3. Hapus folder: `C:\xampp`

#### 3. Install XAMPP Baru
1. Download XAMPP terbaru
2. Install seperti biasa
3. Start Apache dan MySQL

#### 4. Restore Database
1. Copy folder database yang di-backup
2. Paste ke: `C:\xampp\mysql\data\`
3. Restart MySQL

---

## 🎯 REKOMENDASI URUTAN SOLUSI:

1. ✅ **Coba Solusi 1** (Restore dari backup) - Paling aman
2. ✅ **Coba Solusi 4** (Cek error log) - Untuk tahu penyebab
3. ✅ **Coba Solusi 2** (Ganti port) - Jika port conflict
4. ✅ **Coba Solusi 5** (Repair database) - Jika database corrupt
5. ✅ **Coba Solusi 3** (Reinstall service) - Jika service bermasalah
6. ⚠️ **Solusi 6** (Fresh install) - LAST RESORT!

---

## 📝 CHECKLIST SEBELUM MULAI:

- [ ] Backup folder: `C:\xampp\mysql\data`
- [ ] Backup database Laravel (export SQL)
- [ ] Catat nama database yang digunakan
- [ ] Tutup semua aplikasi yang mungkin pakai MySQL
- [ ] Restart komputer (kadang ini sudah cukup!)

---

## 💡 TIPS MENCEGAH CRASH LAGI:

### 1. Selalu Shutdown MySQL dengan Benar
- Jangan langsung matikan komputer
- Stop MySQL dari XAMPP dulu

### 2. Backup Database Rutin
- Export database seminggu sekali
- Simpan file .sql di tempat aman

### 3. Jangan Matikan Komputer Saat MySQL Running
- Stop MySQL dulu
- Baru shutdown komputer

### 4. Update XAMPP Secara Berkala
- Download versi terbaru
- Backup dulu sebelum update

---

## 🆘 JIKA MASIH GAGAL:

### Cek Error Log dan Kirim Info Ini:

1. **Error Message dari Log:**
   - Buka: XAMPP Control Panel → Logs → MySQL Error Log
   - Copy 20 baris terakhir

2. **Versi XAMPP:**
   - Buka: XAMPP Control Panel
   - Lihat di title bar

3. **Versi MySQL:**
   - Buka Command Prompt
   - Ketik: `mysql --version`

4. **Port yang Digunakan:**
   - Buka Command Prompt
   - Ketik: `netstat -ano | findstr :3306`

---

## 🎉 SETELAH BERHASIL:

1. ✅ Test koneksi database
2. ✅ Buka phpMyAdmin: http://localhost/phpmyadmin
3. ✅ Cek database Laravel masih ada
4. ✅ Test website Laravel: http://localhost:8000
5. ✅ Backup database segera!

---

**Good luck! 🍀**
