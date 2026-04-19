<?php
include __DIR__ . '/database/baglan.php';
$row = $conn->query('SELECT id FROM ty_ilan ORDER BY id ASC LIMIT 1')->fetch(PDO::FETCH_ASSOC);
if ($row && !empty($row['id'])) {
    header('Location: ty_goster.php?id=' . (int) $row['id']);
} else {
    header('Location: ty_goster.php?id=0');
}
exit;
