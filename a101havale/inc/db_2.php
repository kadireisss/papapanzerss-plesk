<?php
mb_internal_encoding('UTF-8');

$cfg = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'BellaMain' . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR . 'config.php';
if (is_file($cfg)) {
    require $cfg;
} else {
    $dbHost = 'localhost';
    $dbName = 'jakartaxdw';
    $dbUser = 'root';
    $dbPass = '';
}

$db = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
$db->set_charset('utf8mb4');
if ($db->connect_error) {
    die('Bağlantı hatası: ' . $db->connect_error);
}
