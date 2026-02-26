<?php
require 'vendor/autoload.php';
$db = new PDO('sqlite:database/chama.sqlite');
$stmt = $db->query('SELECT COUNT(*) as cnt FROM members');
$row = $stmt->fetch(PDO::FETCH_ASSOC);
echo "Total members: " . $row['cnt'] . "\n";

$stmt = $db->query('SELECT id, name, id_number FROM members ORDER BY id DESC LIMIT 3');
echo "\nLatest members:\n";
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "ID: {$row['id']}, Name: {$row['name']}, ID#: {$row['id_number']}\n";
}
?>
