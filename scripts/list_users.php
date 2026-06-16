<?php
$db=new PDO('sqlite:' . __DIR__ . '/../database/database.sqlite');
$tables = $db->query("SELECT name FROM sqlite_master WHERE type='table' AND name='users'")->fetchAll();
if(empty($tables)) { echo "No users table found\n"; exit; }
$count = $db->query('SELECT COUNT(*) as c FROM users')->fetch(PDO::FETCH_ASSOC);
echo 'Users count: ' . ($count['c'] ?? 0) . PHP_EOL;
$stmt=$db->query('SELECT id,email FROM users LIMIT 10');
foreach($stmt as $row) { echo $row['id'].' '.$row['email'].PHP_EOL; }
