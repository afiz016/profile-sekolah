# 🚀 Cara Setup Email - Pilih Salah Satu

## ⚠️ PENTING: Pilih salah satu metode di bawah

---

## 🟢 METODE 1: LOG (Untuk Testing - PALING MUDAH) ⭐ RECOMMENDED

### Keuntungan:
- ✅ Tidak perlu setup apapun
- ✅ Langsung bisa test fitur lupa password
- ✅ Email tersimpan di file log

### Konfigurasi:

File `.env` sudah diset ke mode ini. Tidak perlu ubah apapun!

```env
MAIL_MAILER=log
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
```

### Cara Test:

1. **Clear cache:**
```bash
php artisan config:clear
```

2. **Test lupa password:**
   - Buka: http://localhost:8000/login
   - Klik "Lupa password?"
   - Masukkan email: `muhammadnurafiz2@gmail.com`
   - Klik "Kirim Link Reset Password"

3. **Lihat email di log:**
```bash
php artisan tinker --execute="echo file_get_contents(storage_path('logs/laravel.log'));"
```

Atau buka file: `storage/logs/laravel.log` dengan text editor

4. **Copy link reset password dari log:**
   - Cari baris yang ada `http://localhost:8000/reset-password/...`
   - Copy link tersebut
   - Paste di browser
   - Reset password

### ✅ Selesai! Tidak perlu setup Gmail/Mailtrap

---

## 🔵 METODE 2: MAILTRAP (Untuk Testing - Lebih Professional)

### Keuntungan:
- ✅ Email tampil di dashboard web (seperti inbox real)
- ✅ Gratis untuk testing
- ✅ Tidak kirim email real
- ✅ Setup cepat (5 menit)

### Langkah Setup:

#### 1. Daftar Mailtrap (Gratis)
- Buka: https://mailtrap.io/
- Klik **"Sign Up"** (bisa pakai Google/GitHub)
- Verifikasi email
- Login

#### 2. Get Credentials
- Di dashboard, klik **"Email Testing"**
- Klik **"Inboxes"** → **"My Inbox"**
- Klik tab **"SMTP Settings"**
- Pilih **"Laravel 9+"**
- Akan muncul credentials seperti ini:

```
Host: sandbox.smtp.mailtrap.io
Port: 2525
Username: 1a2b3c4d5e6f7g
Password: 1a2b3c4d5e6f7g
```

#### 3. Update File .env

Buka file `.env` dan ubah:

```env
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=1a2b3c4d5e6f7g
MAIL_PASSWORD=1a2b3c4d5e6f7g
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="noreply@mimaarifnu03tamansari.sch.id"
MAIL_FROM_NAME="MI Ma'arif NU 03 Tamansari"
```

**⚠️ GANTI:**
- `1a2b3c4d5e6f7g` dengan username dari Mailtrap
- `1a2b3c4d5e6f7g` dengan password dari Mailtrap

#### 4. Clear Cache & Test

```bash
php artisan config:clear
php test-email.php test@example.com
```

#### 5. Cek Email di Mailtrap
- Buka dashboard Mailtrap
- Klik inbox
- Email akan muncul di sana!

---

## 🟡 METODE 3: GMAIL (Untuk Production - Paling Ribet)

### ⚠️ HANYA UNTUK PRODUCTION! Untuk testing pakai Metode 1 atau 2

### Langkah Setup (Detail):

#### 1. Aktifkan 2-Step Verification

1. Buka: https://myaccount.google.com/
2. Login dengan Gmail sekolah
3. Klik **"Security"** di sidebar kiri
4. Scroll ke **"2-Step Verification"**
5. Klik **"Get Started"**
6. Ikuti instruksi:
   - Masukkan nomor HP
   - Verifikasi dengan kode SMS
   - Klik "Turn On"

#### 2. Buat App Password

1. Masih di halaman Security
2. Scroll ke **"App passwords"** (muncul setelah 2-Step aktif)
3. Klik **"App passwords"**
4. Pilih:
   - App: **"Mail"**
   - Device: **"Other (Custom name)"**
5. Ketik nama: **"Laravel Website"**
6. Klik **"Generate"**
7. Akan muncul password 16 digit: `abcd efgh ijkl mnop`
8. **COPY password ini** (tanpa spasi!)

#### 3. Update File .env

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=emailsekolah@gmail.com
MAIL_PASSWORD=abcdefghijklmnop
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="emailsekolah@gmail.com"
MAIL_FROM_NAME="MI Ma'arif NU 03 Tamansari"
```

**⚠️ GANTI:**
- `emailsekolah@gmail.com` → Email Gmail sekolah yang REAL
- `abcdefghijklmnop` → App Password 16 digit (TANPA SPASI!)

#### 4. Clear Cache & Test

```bash
php artisan config:clear
php test-email.php emailsekolah@gmail.com
```

---

## 🎯 Rekomendasi Berdasarkan Kebutuhan

### Untuk Testing/Development:
✅ **Gunakan METODE 1 (LOG)** - Paling mudah, tidak perlu setup

### Untuk Testing dengan UI:
✅ **Gunakan METODE 2 (MAILTRAP)** - Gratis, mudah, professional

### Untuk Production (Website Live):
✅ **Gunakan METODE 3 (GMAIL)** - Email real terkirim

---

## ❓ FAQ

### Q: Saya dapat error "Authentication failed"
**A:** Anda belum setup dengan benar. Untuk testing, gunakan **METODE 1 (LOG)** yang sudah saya set.

### Q: Bagaimana cara lihat email di mode LOG?
**A:** Buka file `storage/logs/laravel.log` atau jalankan:
```bash
php artisan tinker --execute="echo file_get_contents(storage_path('logs/laravel.log'));"
```

### Q: Apakah harus pakai Gmail?
**A:** TIDAK! Untuk testing pakai LOG atau Mailtrap. Gmail hanya untuk production.

### Q: Mode LOG aman tidak?
**A:** Aman untuk development/testing. Tapi untuk production harus pakai email real.

---

## 📝 Checklist

**Untuk Testing (Sekarang):**
- [x] File .env sudah diset ke mode LOG
- [ ] Jalankan: `php artisan config:clear`
- [ ] Test fitur lupa password
- [ ] Lihat email di `storage/logs/laravel.log`

**Untuk Production (Nanti):**
- [ ] Pilih email provider (Gmail/Mailtrap/lainnya)
- [ ] Setup credentials
- [ ] Update file .env
- [ ] Test kirim email real

---

## 🚀 Quick Start (Sekarang Juga!)

Karena file .env sudah saya set ke mode LOG, Anda bisa langsung:

1. **Clear cache:**
```bash
php artisan config:clear
```

2. **Test lupa password:**
   - Buka: http://localhost:8000/login
   - Klik "Lupa password?"
   - Masukkan email admin
   - Klik kirim

3. **Lihat email:**
   - Buka: `storage/logs/laravel.log`
   - Cari link reset password
   - Copy dan paste di browser

**Selesai! Tidak perlu setup Gmail yang ribet!** 🎉
