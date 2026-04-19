<?php
/**
 * PANZER · pttkargo public — ortak (jakartaxdw) DB'ye baglanir.
 * Tum kargo kayitlari `bella_pttkargo` tablosunda tutulur.
 */
declare(strict_types=1);

$bellla_cfg = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR
            . 'BellaMain' . DIRECTORY_SEPARATOR
            . 'database' . DIRECTORY_SEPARATOR
            . 'config.php';

if (!is_file($bellla_cfg)) {
    http_response_code(500);
    die('Config bulunamadi.');
}

require $bellla_cfg;

try {
    $conn = new PDO(
        "mysql:host={$dbHost};dbname={$dbName};charset=utf8mb4",
        $dbUser,
        $dbPass,
        [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ]
    );
} catch (PDOException $e) {
    http_response_code(500);
    die('Baglanti hatasi.');
}
