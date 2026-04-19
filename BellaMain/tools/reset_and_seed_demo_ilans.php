<?php
/**
 * Tüm ilan / demo ürün tablolarını temizler ve seed_demo_products.php ile yeniden doldurur.
 * ÜRETİMDE DİKKAT: Geri alınamaz veri kaybı.
 *
 * Kullanım (proje kökünden veya BellaMain/tools içinden):
 *   php BellaMain/tools/reset_and_seed_demo_ilans.php --yes
 */
declare(strict_types=1);

if (PHP_SAPI !== 'cli') {
    fwrite(STDERR, "Sadece CLI.\n");
    exit(1);
}

$ok = false;
foreach ($argv as $a) {
    if ($a === '--yes') {
        $ok = true;
        break;
    }
}
if (!$ok) {
    fwrite(STDERR, "Tüm ilan kayıtları silinir ve BCSC_DEMO ile yeniden oluşturulur.\n");
    fwrite(STDERR, "Onaylamak için: php reset_and_seed_demo_ilans.php --yes\n");
    exit(1);
}

require dirname(__DIR__) . '/database/config.php';

$charset = 'utf8';
$dsn = "mysql:host={$dbHost};dbname={$dbName};charset={$charset}";
try {
    $db = new PDO($dsn, $dbUser, $dbPass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (Throwable $e) {
    fwrite(STDERR, 'DB: ' . $e->getMessage() . "\n");
    exit(1);
}

$tables = [
    'ilan_facebook',
    'ilan_sahibinden',
    'ilan_dolap',
    'ilan_letgo',
    'ilan_pttavm',
    'ilan_turkcell',
    'ilan_shopier',
    'ty_ilan',
    'hb_urun',
    'yurtici',
    'bella_mg_urunler',
    'bella_pj_urunler',
    'bella_ptt3_urunler',
    'bella_bim_products',
    'bella_a101_products',
];

foreach ($tables as $t) {
    try {
        $db->exec('DELETE FROM `' . str_replace('`', '', $t) . '`');
        echo "Silindi: {$t}\n";
    } catch (Throwable $e) {
        echo "Atlandi {$t}: " . $e->getMessage() . "\n";
    }
}

echo "--- seed calistiriliyor ---\n";
require __DIR__ . '/seed_demo_products.php';
