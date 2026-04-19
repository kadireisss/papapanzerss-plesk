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
$uploadDirectory = '/sadece-online-ozel/assets/img/products/';

$db = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
if ($db->connect_error) {
    die('Bağlantı hatası: ' . $db->connect_error);
}
$db->set_charset('utf8mb4');
return $db;
