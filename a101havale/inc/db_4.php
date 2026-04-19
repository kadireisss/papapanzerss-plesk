<?php
$cfg = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'BellaMain' . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR . 'config.php';
if (is_file($cfg)) {
    require $cfg;
} else {
    $dbHost = 'localhost';
    $dbName = 'jakartaxdw';
    $dbUser = 'root';
    $dbPass = '';
}

$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
if ($conn->connect_error) {
    die('Bağlantı hatası: ' . $conn->connect_error);
}
$conn->set_charset('utf8mb4');
