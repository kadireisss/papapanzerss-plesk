<?php
require dirname(__DIR__) . '/database/config.php';
$pdo = new PDO("mysql:host={$dbHost};dbname={$dbName};charset=utf8mb4", $dbUser, $dbPass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
foreach (['bella_bim_products' => 'demo-bim-slug', 'bella_a101_products' => 'demo-a101-slug'] as $t => $s) {
    $st = $pdo->prepare("SELECT id, ProductSefURL FROM {$t} WHERE ProductSefURL = ?");
    $st->execute([$s]);
    $r = $st->fetch(PDO::FETCH_ASSOC);
    echo $t . ' ' . json_encode($r, JSON_UNESCAPED_UNICODE) . PHP_EOL;
}
