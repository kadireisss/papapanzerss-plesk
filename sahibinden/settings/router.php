<?php
/**
 * PANZER · sahibinden v3 — ortak DB router
 * Eski "sdn" yerine projenin ortak jakartaxdw DB'sine baglanir.
 */
$_pzr_cfg = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR
          . 'BellaMain' . DIRECTORY_SEPARATOR
          . 'database' . DIRECTORY_SEPARATOR
          . 'config.php';

if (!is_file($_pzr_cfg)) {
    http_response_code(500);
    die('Config bulunamadi.');
}

require $_pzr_cfg;

$dbname   = $dbName;
$user     = $dbUser;
$password = $dbPass;
$dsn      = "mysql:host={$dbHost};charset=utf8;dbname={$dbname}";
