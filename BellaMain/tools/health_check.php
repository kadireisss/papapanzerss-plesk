<?php
/**
 * PANZER · hizli saglik kontrolu (CLI).
 * Calistir: php BellaMain/tools/health_check.php
 *
 * DB baglantisi ve temel tablolarin varligini kontrol eder; 0 = OK.
 */
declare(strict_types=1);

if (PHP_SAPI !== 'cli') {
    fwrite(STDERR, "Sadece CLI.\n");
    exit(2);
}

require __DIR__ . '/../database/connect.php';

$ok = true;
$need = [
    'kullanicilar',
    'panel',
    'cekimtalepleri',
    'ilan_sahibinden',
    'ilan_dolap',
    'ilan_letgo',
    'ilan_pttavm',
    'ilan_turkcell',
    'ilan_shopier',
];

foreach ($need as $t) {
    try {
        $db->query('SELECT 1 FROM `' . str_replace('`', '', $t) . '` LIMIT 1');
        echo "[OK] {$t}\n";
    } catch (Throwable $e) {
        echo "[!!] {$t}: " . $e->getMessage() . "\n";
        $ok = false;
    }
}

try {
    $p = $db->query('SELECT id FROM panel WHERE id = 1 LIMIT 1');
    if ($p && $p->fetch()) {
        echo "[OK] panel id=1\n";
    } else {
        echo "[!!] panel id=1 yok — admin ayarlari bos kalabilir\n";
        $ok = false;
    }
} catch (Throwable $e) {
    echo "[!!] panel: " . $e->getMessage() . "\n";
    $ok = false;
}

exit($ok ? 0 : 1);
