<?php
include __DIR__ . '/database/baglan.php';
$slug = $conn->query('SELECT urunlink FROM hb_urun ORDER BY id ASC LIMIT 1')->fetchColumn();
if ($slug !== false && $slug !== null && $slug !== '') {
    header('Location: hb_goster.php?urunlink=' . rawurlencode((string) $slug));
} else {
    header('Location: hb_goster.php?urunlink=');
}
exit;
