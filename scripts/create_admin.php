<?php
require __DIR__ . '/../vendor/autoload.php';

// Simple script to create an admin user in the SQLite DB if none exists
$dbPath = __DIR__ . '/../database/database.sqlite';
if (!file_exists($dbPath)) {
    echo "SQLite DB not found: $dbPath\n";
    exit(1);
}

$db = new PDO('sqlite:' . $dbPath);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$count = $db->query('SELECT COUNT(*) as c FROM users')->fetch(PDO::FETCH_ASSOC);
if (($count['c'] ?? 0) > 0) {
    echo "Users table already has {$count['c']} user(s). No admin created.\n";
    exit(0);
}

$email = 'admin@namasekolah.sch.id';
$name = 'Admin';
$passwordPlain = 'Admin123!';
$hashed = password_hash($passwordPlain, PASSWORD_BCRYPT);
$now = date('Y-m-d H:i:s');

$stmt = $db->prepare('INSERT INTO users (name, email, email_verified_at, password, remember_token, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?)');
$remember = bin2hex(random_bytes(10));
$stmt->execute([$name, $email, $now, $hashed, $remember, $now, $now]);

echo "Admin user created:\n";
echo "  email: $email\n";
echo "  password: $passwordPlain\n";
echo "Please change the password after first login.\n";
