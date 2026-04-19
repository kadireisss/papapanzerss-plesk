<?php
/**
 * Oturum cerezi + session senkronu (sadece cerez var session bos kalmasin).
 */
require_once __DIR__ . '/connect.php';
require_once __DIR__ . '/fonk.php';

if (isset($_COOKIE['2tUgyO@H9E!4CuQ'])) {
    $sifrecozulmusWadanz = sifrecozWadanz($_COOKIE['2tUgyO@H9E!4CuQ']);
    $cozulmusArrayWadanz = explode('+', $sifrecozulmusWadanz);
    $girisyapanWadanz = $cozulmusArrayWadanz[0] ?? '';
    $rutbeWadanz = $cozulmusArrayWadanz[1] ?? '';
    if ($girisyapanWadanz !== ''
        && session_status() === PHP_SESSION_ACTIVE
        && empty($_SESSION['kul_id'])) {
        $_SESSION['kul_id'] = $girisyapanWadanz;
    }
} else {
    header('Location: signin.php');
    exit();
}

error_reporting(0);
