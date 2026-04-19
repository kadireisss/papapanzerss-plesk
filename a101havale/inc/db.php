<?php
function db_connect()
{
    $cfg = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'BellaMain' . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR . 'config.php';
    if (is_file($cfg)) {
        require $cfg;
    } else {
        $dbHost = 'localhost';
        $dbName = 'jakartaxdw';
        $dbUser = 'root';
        $dbPass = '';
    }

    $dsn = 'mysql:host=' . $dbHost . ';dbname=' . $dbName . ';charset=utf8mb4';
    try {
        $db = new PDO($dsn, $dbUser, $dbPass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e) {
        die('Veritabanı bağlantısı başarısız: ' . $e->getMessage());
    }
}
