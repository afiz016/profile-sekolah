<?php
// Show users from the project's SQLite database (database/database.sqlite)
$path = __DIR__ . '/../database/database.sqlite';
if (!file_exists($path)) {
    echo "database file not found: $path\n";
    exit(1);
}

try {
    $db = new PDO('sqlite:' . $path);
    $stmt = $db->query("SELECT id, name, email FROM users ORDER BY id DESC");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (!$rows) {
        echo "No users found\n";
        exit(0);
    }
    foreach ($rows as $r) {
        echo sprintf("%d | %s | %s\n", $r['id'], $r['name'] ?? '(no name)', $r['email']);
    }
} catch (Exception $e) {
    echo 'ERROR: ' . $e->getMessage() . PHP_EOL;
    exit(1);
}

return 0;
