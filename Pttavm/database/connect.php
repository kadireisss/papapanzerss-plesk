<?php
require dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'BellaMain' . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR . 'config.php';

$db_host = $dbHost;
$db_name = $dbName;
$db_user = $dbUser;
$db_pass = $dbPass;

$charset = 'utf8';
$dsn = "mysql:host=$db_host;dbname=$db_name;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_PERSISTENT => false,
    PDO::ATTR_EMULATE_PREPARES => false,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];
try {
    $db = new PDO($dsn, $db_user, $db_pass, $options);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn = $db;
} catch (PDOException $e) {
    echo 'Bağlantı hatası: ' . $e->getMessage();
    exit;
}

error_reporting(0);
