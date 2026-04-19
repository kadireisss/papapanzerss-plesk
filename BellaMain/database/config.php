<?php
/**
 * Veritabanı ayarları — Plesk / cPanel / shared hosting sürümü.
 * config.local.php dosyası ile çalışır (.gitignore ile korunur).
 */

$local = __DIR__ . DIRECTORY_SEPARATOR . 'config.local.php';

if (is_file($local)) {
    require $local;
} else {
    $dbHost = getenv('DB_HOST') ?: 'localhost';
    $dbName = getenv('DB_NAME') ?: '';
    $dbUser = getenv('DB_USER') ?: 'root';
    $dbPass = getenv('DB_PASS') ?: '';
}

if (!isset($dbPort)) {
    $dbPort = 3306;
}
if (!isset($dbSslMode)) {
    $dbSslMode = false;
}
