<?php
/**
 * PANZER · USER RESET
 * - Mevcut tum kullaniciya bagli verileri siler (kullanicilar + bagimli tablolar)
 * - boss kullanicisini admin olarak olusturur (sifre: 656634)
 * Calistir: php BellaMain/tools/reset_users_and_make_boss.php
 *           php BellaMain/tools/reset_users_and_make_boss.php --dry-run
 */

declare(strict_types=1);
require __DIR__ . '/../database/connect.php';

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$argv = $_SERVER['argv'] ?? [];
$dry = in_array('--dry-run', $argv, true);

$NEW_USER  = 'boss';
$NEW_PASS  = '656634';
$NEW_ROL   = 'admin';

echo "[PANZER] kullanici reset" . PHP_EOL;
echo "[i] mod: " . ($dry ? 'KURU CALISMA' : 'GERCEK SIFIRLAMA') . PHP_EOL . PHP_EOL;

// Mevcut user kayit sayisi
$cnt = (int) $db->query("SELECT COUNT(*) FROM kullanicilar")->fetchColumn();
echo "[i] Mevcut kullanici sayisi: {$cnt}" . PHP_EOL;

// Bagimli tablolar (kullaniciya ait verileri siler)
$tables_with_ekleyen = [
    'cekimtalepleri', 'hesaplar', 'kartlar', 'profilshopier',
    'ilan_dolap', 'ilan_facebook', 'ilan_letgo', 'ilan_pttavm',
    'ilan_sahibinden', 'ilan_shopier', 'ilan_turkcell',
    'ty_ilan', 'hb_urun',
    'bella_mg_urunler', 'bella_pj_urunler', 'bella_ptt3_urunler',
    'bella_bim_products', 'bella_a101_products',
    'yurtici', 'bella_pttkargo',
    'girisyapanlar',
    'refkodlari',
];

if ($dry) {
    foreach ($tables_with_ekleyen as $t) {
        try {
            $c = (int) $db->query("SELECT COUNT(*) FROM `{$t}`")->fetchColumn();
            echo "  [~] {$t}: {$c} satir silinecek" . PHP_EOL;
        } catch (\Throwable $e) {
            echo "  [-] {$t}: tablo yok (atlanacak)" . PHP_EOL;
        }
    }
    echo "  [~] kullanicilar: {$cnt} satir silinecek" . PHP_EOL;
    echo "  [~] sonra: INSERT boss/656634/admin" . PHP_EOL;
    exit(0);
}

$db->beginTransaction();
try {
    foreach ($tables_with_ekleyen as $t) {
        try {
            $n = (int) $db->exec("DELETE FROM `{$t}`");
            echo "  [+] {$t}: {$n} silindi" . PHP_EOL;
        } catch (\Throwable $e) {
            echo "  [-] {$t}: " . $e->getMessage() . PHP_EOL;
        }
    }
    $n = (int) $db->exec("DELETE FROM kullanicilar");
    echo "  [+] kullanicilar: {$n} silindi" . PHP_EOL;

    // Auto-increment reset (MySQL)
    foreach (array_merge($tables_with_ekleyen, ['kullanicilar']) as $t) {
        try { $db->exec("ALTER TABLE `{$t}` AUTO_INCREMENT = 1"); } catch (\Throwable $e) { /* sessiz */ }
    }
    echo "  [+] auto_increment reset" . PHP_EOL;

    // boss user
    $hash = password_hash($NEW_PASS, PASSWORD_DEFAULT);
    $tgKod = strtoupper(bin2hex(random_bytes(4)));
    $ins = $db->prepare("INSERT INTO kullanicilar SET
        kullaniciadi = :u,
        sifre        = :s,
        k_rol        = :r,
        bakiye       = 0,
        toplamalinan = 0,
        tgkod        = :t,
        tgadresi     = :tg
    ");
    $ins->execute([
        ':u' => $NEW_USER, ':s' => $hash, ':r' => $NEW_ROL,
        ':t' => $tgKod, ':tg' => 'panzer_admin',
    ]);
    $newId = (int) $db->lastInsertId();
    echo PHP_EOL . "  [+] yeni kullanici olusturuldu:" . PHP_EOL;
    echo "      id           = {$newId}" . PHP_EOL;
    echo "      kullaniciadi = {$NEW_USER}" . PHP_EOL;
    echo "      sifre        = {$NEW_PASS}" . PHP_EOL;
    echo "      k_rol        = {$NEW_ROL}" . PHP_EOL;

    $db->commit();
    echo PHP_EOL . "[+] Tamam. Tum eski veriler silindi, boss/admin hazir." . PHP_EOL;
} catch (\Throwable $e) {
    $db->rollBack();
    echo "[!] HATA: " . $e->getMessage() . PHP_EOL;
    exit(1);
}
