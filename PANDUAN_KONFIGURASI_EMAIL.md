# 📧 Panduan Konfigurasi Email untuk Fitur Lupa Password

## ⚠️ PENTING: Ganti Nilai Berikut di File .env

Buka file `.env` dan ubah bagian MAIL dengan salah satu konfigurasi di bawah:

---

## 🟢 PILIHAN 1: Gmail (RECOMMENDED)

### Langkah-langkah:

#### 1. Setup Gmail App Password
1. Buka: https://myaccount.google.com/
2. Klik **"Security"** di sidebar kiri
3. Scroll ke **"2-Step Verification"** → Klik **"Get Started"**
4. Ikuti instruksi untuk verifikasi dengan nomor HP
5. Setelah aktif, kembali ke **"Security"**
6. Scroll ke **"App passwords"** → Klik
7. Pilih **"Mail"** dan **"Other (Custom name)"**
8. Ketik: **"Laravel Website"**
9. Klik **"Generate"**
10. **COPY password 16 digit** (contoh: `abcd efgh ijkl mnop`)

#### 2. Update File .env

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
- `emailsekolah@gmail.com` → Email Gmail sekolah yang sebenarnya
- `abcdefghijklmnop` → App Password 16 digit dari Gmail (tanpa spasi)

#### 3. Clear Cache & Test

```bash
php artisan config:clear
php artisan cache:clear
```

---

## 🔵 PILIHAN 2: Mailtrap (Untuk Testing/Development)

### Keuntungan:
- ✅ Gratis untuk testing
- ✅ Email tidak benar-benar terkirim
- ✅ Bisa lihat email di dashboard Mailtrap
- ✅ Cocok untuk development

### Langkah-langkah:

#### 1. Daftar Mailtrap
1. Buka: https://mailtrap.io/
2. Klik **"Sign Up"** (gratis)
3. Verifikasi email
4. Login ke dashboard

#### 2. Get Credentials
1. Di dashboard, klik **"Email Testing"**
2. Klik **"Inboxes"** → **"My Inbox"**
3. Klik tab **"SMTP Settings"**
4. Pilih **"Laravel 9+"**
5. Copy credentials yang ditampilkan

#### 3. Update File .env

```env
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your-mailtrap-username
MAIL_PASSWORD=your-mailtrap-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="noreply@mimaarifnu03tamansari.sch.id"
MAIL_FROM_NAME="MI Ma'arif NU 03 Tamansari"
```

**⚠️ GANTI:**
- `your-mailtrap-username` → Username dari Mailtrap
- `your-mailtrap-password` → Password dari Mailtrap

---

## 🟡 PILIHAN 3: Email Provider Lain

### A. Outlook/Hotmail

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp-mail.outlook.com
MAIL_PORT=587
MAIL_USERNAME=emailsekolah@outlook.com
MAIL_PASSWORD=your-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="emailsekolah@outlook.com"
MAIL_FROM_NAME="MI Ma'arif NU 03 Tamansari"
```

### B. Yahoo Mail

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mail.yahoo.com
MAIL_PORT=587
MAIL_USERNAME=emailsekolah@yahoo.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="emailsekolah@yahoo.com"
MAIL_FROM_NAME="MI Ma'arif NU 03 Tamansari"
```

### C. SendGrid (Professional)

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.sendgrid.net
MAIL_PORT=587
MAIL_USERNAME=apikey
MAIL_PASSWORD=your-sendgrid-api-key
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="noreply@mimaarifnu03tamansari.sch.id"
MAIL_FROM_NAME="MI Ma'arif NU 03 Tamansari"
```

---

## 🧪 Cara Testing Setelah Konfigurasi

### 1. Clear Cache
```bash
php artisan config:clear
php artisan cache:clear
```

### 2. Test Kirim Email
```bash
php artisan tinker
```

Kemudian ketik:
```php
Mail::raw('Test email', function($message) {
    $message->to('email-test@gmail.com')
            ->subject('Test Email dari Laravel');
});
```

Tekan Enter. Jika berhasil, akan muncul: `= true`

### 3. Test Fitur Lupa Password
1. Buka: http://localhost:8000/login
2. Klik **"Lupa password?"**
3. Masukkan email admin yang terdaftar
4. Klik **"Kirim Link Reset Password"**
5. Cek inbox email (atau Mailtrap jika pakai Mailtrap)

---

## ❌ Troubleshooting

### Problem 1: "Connection could not be established"
**Solusi:**
- Cek username dan password benar
- Pastikan internet aktif
- Cek firewall tidak block port 587
- Untuk Gmail, pastikan App Password sudah dibuat

### Problem 2: "Authentication failed"
**Solusi:**
- Untuk Gmail: Gunakan App Password, bukan password biasa
- Cek username adalah email lengkap (dengan @gmail.com)
- Pastikan 2-Step Verification aktif (untuk Gmail)

### Problem 3: Email masuk ke Spam
**Solusi:**
- Tambahkan email pengirim ke contact
- Gunakan domain email yang valid
- Untuk production, gunakan email provider professional

### Problem 4: "Could not instantiate mail function"
**Solusi:**
```bash
php artisan config:clear
php artisan cache:clear
composer dump-autoload
```

---

## 📝 Checklist Setelah Konfigurasi

- [ ] File .env sudah diupdate dengan credentials yang benar
- [ ] App Password Gmail sudah dibuat (jika pakai Gmail)
- [ ] Cache sudah di-clear
- [ ] Test kirim email berhasil
- [ ] Test fitur lupa password berhasil
- [ ] Email diterima di inbox (atau Mailtrap)

---

## 🎯 Rekomendasi

### Untuk Development/Testing:
✅ **Gunakan Mailtrap** - Gratis, aman, mudah

### Untuk Production:
✅ **Gunakan Gmail** - Gratis, reliable, mudah setup
✅ **Atau SendGrid** - Professional, high deliverability

---

## 📞 Butuh Bantuan?

Jika masih ada masalah, cek:
1. File log: `storage/logs/laravel.log`
2. Pastikan semua credentials benar
3. Test koneksi internet
4. Restart server setelah ubah .env

---

**Selamat mencoba! 🎉**
