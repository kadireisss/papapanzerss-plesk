<?php
declare(strict_types=1);

/**
 * Tek seferlik yardımcı: verilen kullanıcı adına `k_rol = 'admin'` ata.
 * Çalıştır:
 *   php BellaMain/tools/make_super_admin.php carlo
 *   php BellaMain/tools/make_super_admin.php carlo --dry-run
 */

require __DIR__ . '/../database/connect.php';

$argv = $_SERVER['argv'] ?? [];
$target = $argv[1] ?? 'carlo';
$dryRun = in_array('--dry-run', $argv, true);

echo "[i] hedef kullanici: {$target}" . PHP_EOL;
echo "[i] mod: " . ($dryRun ? 'KURU CALISMA (yazma yok)' : 'GERCEK GUNCELLEME') . PHP_EOL;

$find = $db->prepare("SELECT id, kullaniciadi, k_rol, bakiye FROM kullanicilar WHERE kullaniciadi = :u LIMIT 1");
$find->execute([':u' => $target]);
$user = $find->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    echo "[x] kullanici bulunamadi. Benzer eslesmeler:" . PHP_EOL;
    $like = $db->prepare("SELECT id, kullaniciadi, k_rol FROM kullanicilar WHERE LOWER(kullaniciadi) LIKE LOWER(:p) LIMIT 20");
    $like->execute([':p' => '%' . $target . '%']);
    foreach ($like as $row) {
        echo sprintf("    id=%d user=%s rol=%s" . PHP_EOL, (int)$row['id'], $row['kullaniciadi'], $row['k_rol'] ?? '(bos)');
    }
    exit(1);
}

echo sprintf(
    "[i] mevcut: id=%d user=%s rol=%s bakiye=%s" . PHP_EOL,
    (int)$user['id'],
    $user['kullaniciadi'],
    $user['k_rol'] ?? '(bos)',
    $user['bakiye']
);

if (($user['k_rol'] ?? '') === 'admin') {
    echo "[=] zaten admin. yapacak bir sey yok." . PHP_EOL;
    exit(0);
}

if ($dryRun) {
    echo "[~] dry-run: UPDATE kullanicilar SET k_rol='admin' WHERE id={$user['id']}" . PHP_EOL;
    exit(0);
}

$upd = $db->prepare("UPDATE kullanicilar SET k_rol = 'admin' WHERE id = :id");
$ok = $upd->execute([':id' => $user['id']]);

if (!$ok) {
    echo "[x] guncelleme basarisiz." . PHP_EOL;
    exit(2);
}

$check = $db->prepare("SELECT k_rol FROM kullanicilar WHERE id = :id");
$check->execute([':id' => $user['id']]);
$now = $check->fetch(PDO::FETCH_ASSOC);

echo sprintf("[+] tamam. yeni rol: %s (kullanici: %s)" . PHP_EOL, $now['k_rol'], $user['kullaniciadi']);
echo "[i] not: bu kullanici dashboard'a yeniden giris yaparsa session is_rol guncellenir." . PHP_EOL;
