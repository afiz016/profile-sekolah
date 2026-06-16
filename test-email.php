<?php

/**
 * Script untuk test konfigurasi email
 * 
 * Cara pakai:
 * php test-email.php email-tujuan@gmail.com
 */

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

// Get email from command line argument
$toEmail = $argv[1] ?? null;

if (!$toEmail) {
    echo "❌ Error: Email tujuan tidak diberikan\n";
    echo "Cara pakai: php test-email.php email-tujuan@gmail.com\n";
    exit(1);
}

echo "📧 Testing Email Configuration...\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n\n";

// Show current configuration
echo "📋 Konfigurasi Email Saat Ini:\n";
echo "   MAIL_MAILER: " . config('mail.default') . "\n";
echo "   MAIL_HOST: " . config('mail.mailers.smtp.host') . "\n";
echo "   MAIL_PORT: " . config('mail.mailers.smtp.port') . "\n";
echo "   MAIL_USERNAME: " . config('mail.mailers.smtp.username') . "\n";
echo "   MAIL_FROM: " . config('mail.from.address') . "\n";
echo "\n";

// Try to send test email
echo "📤 Mengirim email test ke: {$toEmail}\n";
echo "⏳ Mohon tunggu...\n\n";

try {
    \Illuminate\Support\Facades\Mail::raw(
        "Ini adalah email test dari sistem MI Ma'arif NU 03 Tamansari.\n\n" .
        "Jika Anda menerima email ini, berarti konfigurasi email sudah benar!\n\n" .
        "Waktu: " . now()->format('d F Y H:i:s') . "\n\n" .
        "Terima kasih.",
        function($message) use ($toEmail) {
            $message->to($toEmail)
                    ->subject('✅ Test Email - MI Ma\'arif NU 03 Tamansari');
        }
    );
    
    echo "✅ Email berhasil dikirim!\n";
    echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
    echo "📬 Silakan cek inbox email: {$toEmail}\n";
    echo "💡 Jika tidak ada, cek folder Spam/Junk\n";
    echo "\n";
    echo "🎉 Konfigurasi email BERHASIL!\n";
    
} catch (\Exception $e) {
    echo "❌ Error: Gagal mengirim email\n";
    echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
    echo "📝 Detail Error:\n";
    echo $e->getMessage() . "\n\n";
    
    echo "💡 Solusi:\n";
    echo "1. Cek file .env, pastikan MAIL_USERNAME dan MAIL_PASSWORD benar\n";
    echo "2. Untuk Gmail, gunakan App Password (bukan password biasa)\n";
    echo "3. Pastikan internet aktif\n";
    echo "4. Jalankan: php artisan config:clear\n";
    echo "\n";
    echo "📖 Baca PANDUAN_KONFIGURASI_EMAIL.md untuk detail lengkap\n";
    
    exit(1);
}
