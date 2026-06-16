<?php
$db = new PDO('sqlite:' . __DIR__ . '/../database/database.sqlite');
$stmt = $db->query('SELECT id, judul, gambar, created_at FROM galeri ORDER BY id DESC LIMIT 20');
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
if(!$rows) {
    echo "No rows in galeri table\n";
    exit;
}
foreach($rows as $r){
    echo sprintf("%s | %s | %s | %s\n", $r['id'], $r['judul'], $r['gambar'] ?? '(null)', $r['created_at'] ?? '');
}
