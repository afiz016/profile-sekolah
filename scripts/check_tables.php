<?php
// Lists tables in the project's SQLite database (database/database.sqlite)
$path = __DIR__ . '/../database/database.sqlite';
if (!file_exists($path)) {
    echo "database file not found: $path\n";
    exit(1);
}

try {
    $db = new PDO('sqlite:' . $path);
    $rows = $db->query("SELECT name FROM sqlite_master WHERE type='table' ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $r) {
        echo $r['name'] . PHP_EOL;
    }
} catch (Exception $e) {
    echo 'ERROR: ' . $e->getMessage() . PHP_EOL;
    exit(1);
}

return 0;
