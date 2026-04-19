<?php
include("config.php");

$charset = 'utf8';
$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=$charset";
if (isset($dbPort) && (int) $dbPort !== 3306) {
    $dsn = "mysql:host=$dbHost;port=" . (int) $dbPort . ";dbname=$dbName;charset=$charset";
}
try {
    $db = new PDO($dsn, $dbUser, $dbPass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch(PDOException $e) {
    //show error
    die("Bağlantı kurulamadı: " . $e->getMessage());
}

error_reporting(0);