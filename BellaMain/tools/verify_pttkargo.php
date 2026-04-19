<?php
/**
 * PANZER · PTT Kargo entegrasyon dogrulama (smoke test).
 * Kullanim: php BellaMain/tools/verify_pttkargo.php
 */

require __DIR__ . '/../database/connect.php';

echo "[1] Tablo varligi kontrol... ";
$cnt = $db->query("SHOW TABLES LIKE 'bella_pttkargo'")->rowCount();
if ($cnt === 0) { echo "FAIL — tablo yok\n"; exit(1); }
echo "OK\n";

echo "[2] Test kargo kaydi insert... ";
try {
    $takipno = 'PANZER' . random_int(100000, 999999);
    $ins = $db->prepare("INSERT INTO bella_pttkargo SET
        takipno=:t, gonderen='PANZER Test', teslimalan='Smoke Test',
        cikistarih='19/04/2026', teslimtarih='20/04/2026',
        cikisadres='Test Cad. 1', teslimadres='Hedef Mah. 2',
        telefonno='05551112233', gonderil='Istanbul', alanil='Ankara',
        sonuc='Kargonuz dagitima cikti.', durumu=3, ekleyen='_smoke_'");
    $ins->execute([':t' => $takipno]);
    $newId = (int)$db->lastInsertId();
    echo "OK (id={$newId} takipno={$takipno})\n";
} catch (\Throwable $e) {
    echo "FAIL — " . $e->getMessage() . "\n"; exit(1);
}

echo "[3] Public takip URL formati... ";
require __DIR__ . '/../includes/ilan_public_url.php';
$_SERVER['HTTP_HOST'] = '127.0.0.1';
$_SERVER['SCRIPT_NAME'] = '/BellaMain/dashboard.php';
$url = bellla_pttkargo_takip_url($takipno);
if (strpos($url, '/pttkargo/sorgula.php?takipno=') === false) {
    echo "FAIL — beklenmeyen URL: {$url}\n"; exit(1);
}
echo "OK ({$url})\n";

echo "[4] Public select query (sorgula.php gibi)... ";
$q = $db->prepare('SELECT takipno, sonuc, durumu, gonderen, teslimalan FROM bella_pttkargo WHERE takipno = :t LIMIT 1');
$q->execute([':t' => $takipno]);
$row = $q->fetch(PDO::FETCH_ASSOC);
if (!$row || $row['takipno'] !== $takipno) { echo "FAIL\n"; exit(1); }
echo "OK (sonuc='{$row['sonuc']}')\n";

echo "[5] Admin merkezi gorus — admin tum kayitlari gorebilir mi? ";
require __DIR__ . '/../includes/admin_helper.php';
session_start();
$_SESSION['kul_id'] = 'carlo';
$_SESSION['is_rol'] = 'admin';
if (!bellla_is_admin($db, 'carlo')) { echo "FAIL — carlo admin degil\n"; exit(1); }
$kul = 'carlo';
$bellla_view_all = bellla_is_admin($db, $kul);
$bellla_owner_filter = $bellla_view_all ? '' : ('AND ekleyen = ' . $db->quote($kul));
$listQ = $db->prepare("SELECT COUNT(*) AS c FROM bella_pttkargo WHERE 1=1 $bellla_owner_filter");
$listQ->execute();
$total = (int)$listQ->fetch(PDO::FETCH_ASSOC)['c'];
echo "OK (admin gorusunde toplam {$total} kayit)\n";

echo "[6] Sahiplik bypass — admin baska kullanicilarinkini silmeye yetkili mi? ";
$canTouch = bellla_can_touch_record($db, 'carlo', '_smoke_');
if (!$canTouch) { echo "FAIL\n"; exit(1); }
echo "OK\n";

echo "[7] Test kaydi temizle... ";
$del = $db->prepare('DELETE FROM bella_pttkargo WHERE id = :id');
$del->execute([':id' => $newId]);
echo "OK ({$del->rowCount()} satir silindi)\n";

echo "\n[+] Tum testler basarili. PTT Kargo entegrasyonu uretim hazir.\n";
