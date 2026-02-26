<?php
require 'vendor/autoload.php';

$dbPath = __DIR__ . '/database/chama.sqlite';

try {
    $pdo = new PDO('sqlite:' . $dbPath);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Insert default user
    $hashedPassword = password_hash('password', PASSWORD_BCRYPT);
    $pdo->prepare("INSERT OR IGNORE INTO users (id, name, email, password, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?)")
        ->execute([1, 'Default Admin', 'admin@chama.local', $hashedPassword, date('Y-m-d H:i:s'), date('Y-m-d H:i:s')]);

    echo "✓ Default user created successfully!\n";
} catch (Exception $e) {
    echo "✗ Error: " . $e->getMessage() . "\n";
    exit(1);
}
