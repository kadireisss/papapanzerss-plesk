<?php
include("config.php");

$charset = 'utf8';
$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=$charset";
if (isset($dbPort) && (int) $dbPort !== 3306) {
    $dsn = "mysql:host=$dbHost;port=" . (int) $dbPort . ";dbname=$dbName;charset=$charset";
}
$pdoOpts = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
if (!empty($dbSslMode)) {
    $pdoOpts[PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT] = false;
}
try {
	$db = new PDO($dsn, $dbUser, $dbPass, $pdoOpts);
} catch(PDOException $e) {
	//show error
	die("Bağlantı kurulamadı: " . $e->getMessage());
}

require_once __DIR__ . '/schema_patch_panel.php';
try {
	bellla_ensure_panel_domain_columns($db);
} catch (Throwable $e) {
	// İlk kurulumda tablo yoksa veya yetki yoksa panel çalışmaya devam edebilir
}

error_reporting(0);