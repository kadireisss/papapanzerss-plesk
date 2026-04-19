<?php

function db_connect(): PDO
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

    $db = new PDO(
        'mysql:host=' . $dbHost . ';dbname=' . $dbName . ';charset=utf8mb4',
        $dbUser,
        $dbPass,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    $db->exec('SET NAMES utf8mb4');
    return $db;
}
