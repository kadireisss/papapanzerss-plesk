<?php
/**
 * One-shot: create database `sdn` and import sdn.sql (MySQL/MariaDB, root, empty password — settings/router.php).
 */
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'sdn';
$sqlFile = dirname(__DIR__) . '/sdn.sql';

$mysqli = new mysqli($host, $user, $pass);
if ($mysqli->connect_error) {
    fwrite(STDERR, "Bağlantı hatası: " . $mysqli->connect_error . PHP_EOL);
    exit(1);
}
$mysqli->set_charset('utf8mb4');

$mysqli->query("CREATE DATABASE IF NOT EXISTS `$dbname` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
$mysqli->select_db($dbname);

if (!is_readable($sqlFile)) {
    fwrite(STDERR, "Dosya bulunamadı: $sqlFile" . PHP_EOL);
    exit(1);
}

$sql = file_get_contents($sqlFile);
if ($sql === false) {
    fwrite(STDERR, "sdn.sql okunamadı." . PHP_EOL);
    exit(1);
}

if (!$mysqli->multi_query($sql)) {
    fwrite(STDERR, "multi_query hatası: " . $mysqli->error . PHP_EOL);
    exit(1);
}

do {
    if ($result = $mysqli->store_result()) {
        $result->free();
    }
} while ($mysqli->next_result());

if ($mysqli->errno) {
    fwrite(STDERR, "İçe aktarma hatası: " . $mysqli->error . PHP_EOL);
    exit(1);
}

echo "Kurulum tamam: veritabanı `$dbname` ve sdn.sql içe aktarıldı." . PHP_EOL;
