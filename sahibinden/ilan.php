<?php
declare(strict_types=1);

/**
 * PANZER compatibility bridge:
 * BellaMain panel still stores Sahibinden listings in `ilan_sahibinden`,
 * while v3 pages read `ilan_telefon` / `ilan_playstation` by `ilanurl`.
 *
 * This file restores old public links:
 *   /sahibinden/ilan.php?id=123-some-slug
 * by syncing the listing into v3 tables and redirecting to:
 *   /sahibinden/index.php?type=phone|console&q=<slug>
 */

require __DIR__ . '/settings/router.php';

try {
    $conn = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
    $conn->exec("SET NAMES 'utf8'; SET CHARSET 'utf8'");
} catch (Throwable $e) {
    http_response_code(500);
    exit('Veritabani baglanti hatasi.');
}

function pzr_slugify(string $value): string
{
    $v = trim($value);
    if ($v === '') {
        return '';
    }
    $map = [
        'ç' => 'c', 'Ç' => 'c',
        'ğ' => 'g', 'Ğ' => 'g',
        'ı' => 'i', 'İ' => 'i',
        'ö' => 'o', 'Ö' => 'o',
        'ş' => 's', 'Ş' => 's',
        'ü' => 'u', 'Ü' => 'u',
    ];
    $v = strtr($v, $map);
    $v = strtolower($v);
    $v = preg_replace('/[^a-z0-9_-]+/', '-', $v) ?? '';
    $v = trim($v, '-_');
    return $v;
}

function pzr_money(string $value): string
{
    $v = trim($value);
    if ($v === '') {
        return '0,00 TL';
    }
    if (stripos($v, 'tl') === false) {
        if (strpos($v, ',') === false) {
            $v .= ',00';
        }
        $v .= ' TL';
    }
    return $v;
}

$rawId = trim((string)($_GET['id'] ?? ''));
if ($rawId === '') {
    http_response_code(404);
    exit('Not Found');
}

if (!preg_match('/^(\d+)/', $rawId, $m)) {
    http_response_code(404);
    exit('Not Found');
}

$listingId = (int)$m[1];
if ($listingId <= 0) {
    http_response_code(404);
    exit('Not Found');
}

$q = $conn->prepare('SELECT * FROM ilan_sahibinden WHERE id = :id LIMIT 1');
$q->execute([':id' => $listingId]);
$row = $q->fetch();
if (!$row) {
    http_response_code(404);
    exit('Not Found');
}

$qPanel = $conn->query('SELECT ibanad, iban FROM panel WHERE id = 1 LIMIT 1');
$panel = $qPanel ? ($qPanel->fetch() ?: []) : [];

$slugFromUrl = '';
$prefixLen = strlen((string)$listingId);
if (isset($rawId[$prefixLen]) && $rawId[$prefixLen] === '-') {
    $slugFromUrl = substr($rawId, $prefixLen + 1);
}
$slug = pzr_slugify($slugFromUrl !== '' ? $slugFromUrl : ((string)($row['urunadi'] ?? '')));
if ($slug === '') {
    $slug = 'ilan-' . $listingId;
}

$isConsole = false;
$kat2 = strtolower((string)($row['kat2'] ?? ''));
$urunadi = strtolower((string)($row['urunadi'] ?? ''));
if (strpos($kat2, 'playstation') !== false || strpos($kat2, 'konsol') !== false || strpos($urunadi, 'playstation') !== false || strpos($urunadi, 'ps5') !== false) {
    $isConsole = true;
}

$table = $isConsole ? 'ilan_playstation' : 'ilan_telefon';
$type = $isConsole ? 'console' : 'phone';

$images = [];
foreach (['resim1', 'resim2', 'resim3', 'resim4', 'resim5'] as $rk) {
    $img = trim((string)($row[$rk] ?? ''));
    if ($img !== '') {
        $images[] = '"' . str_replace('"', '', $img) . '"';
    }
}
$ilanResim = $images ? implode(',', $images) : '"placeholder.png"';

$banks = ((string)($row['kartibanselect'] ?? '') === 'Evet') ? 'creditcard' : 'havale';
$sellerName = (string)($row['adsoyad'] ?? '-');
$sellerPhone = (string)($row['telno'] ?? '-');
$ilanAd = (string)($row['urunadi'] ?? '-');
$ilanFiyat = pzr_money((string)($row['urunfiyati'] ?? '0'));
$il = (string)($row['il'] ?? '-');
$ilce = (string)($row['ilce'] ?? '-');
$mahalle = (string)($row['mahalle'] ?? '-');
$ilanNo = substr((string)($row['ilanno'] ?? '-'), 0, 10);
$ilanDate = substr((string)($row['ilantarihi'] ?? '-'), 0, 50);
$status = (string)($row['durumu'] ?? 'Ikinci El');
$description = (string)($row['aciklama'] ?? '-');
$hizmetBedeli = pzr_money((string)($row['komisyon'] ?? '0'));
$hesapSahibi = (string)($panel['ibanad'] ?? '-');
$iban = (string)($panel['iban'] ?? '-');
$hesapNo = '-';
$subeKodu = '-';
$fromWho = (string)($row['kimden'] ?? 'Sahibinden');
$swap = 'Hayir';

$exists = $conn->prepare("SELECT id FROM {$table} WHERE ilanurl = :u LIMIT 1");
$exists->execute([':u' => $slug]);
$hasRow = (bool)$exists->fetch();

if ($isConsole) {
    $baseData = [
        ':seller_name' => $sellerName,
        ':seller_phone' => $sellerPhone,
        ':ilanurl' => $slug,
        ':ilanad' => $ilanAd,
        ':ilanfiyat' => $ilanFiyat,
        ':ilan_resim' => $ilanResim,
        ':il' => $il,
        ':ilce' => $ilce,
        ':mahalle' => $mahalle,
        ':ilan_no' => $ilanNo,
        ':ilan_date' => $ilanDate,
        ':marka' => (string)($row['kat1'] ?? '-'),
        ':case_type' => (string)($row['kat2'] ?? '-'),
        ':storage' => '825 GB',
        ':os' => 'Orbis OS',
        ':ps5_model' => 'PS5',
        ':renk' => '-',
        ':garanti' => '-',
        ':fromwho' => $fromWho,
        ':swap' => $swap,
        ':status' => $status,
        ':description' => $description,
        ':hizmetbedeli' => $hizmetBedeli,
        ':banks' => $banks,
        ':hesapsahibi' => $hesapSahibi,
        ':iban' => $iban,
        ':hesapno' => $hesapNo,
        ':subekodu' => $subeKodu,
    ];

    if ($hasRow) {
        $sql = "UPDATE ilan_playstation SET
            seller_name=:seller_name, seller_phone=:seller_phone, ilanad=:ilanad, ilanfiyat=:ilanfiyat,
            ilan_resim=:ilan_resim, il=:il, ilce=:ilce, mahalle=:mahalle, ilan_no=:ilan_no, ilan_date=:ilan_date,
            marka=:marka, case_type=:case_type, storage=:storage, os=:os, ps5_model=:ps5_model,
            renk=:renk, garanti=:garanti, fromwho=:fromwho, swap=:swap, status=:status,
            description=:description, hizmetbedeli=:hizmetbedeli, banks=:banks, hesapsahibi=:hesapsahibi,
            iban=:iban, hesapno=:hesapno, subekodu=:subekodu
            WHERE ilanurl=:ilanurl";
        $conn->prepare($sql)->execute($baseData);
    } else {
        $sql = "INSERT INTO ilan_playstation (
            seller_name, seller_phone, ilanurl, ilanad, ilanfiyat, ilan_resim, il, ilce, mahalle,
            ilan_no, ilan_date, marka, case_type, storage, os, ps5_model, renk, garanti,
            fromwho, swap, status, description, hizmetbedeli, banks, hesapsahibi, iban, hesapno, subekodu
        ) VALUES (
            :seller_name, :seller_phone, :ilanurl, :ilanad, :ilanfiyat, :ilan_resim, :il, :ilce, :mahalle,
            :ilan_no, :ilan_date, :marka, :case_type, :storage, :os, :ps5_model, :renk, :garanti,
            :fromwho, :swap, :status, :description, :hizmetbedeli, :banks, :hesapsahibi, :iban, :hesapno, :subekodu
        )";
        $conn->prepare($sql)->execute($baseData);
    }
} else {
    $baseData = [
        ':seller_name' => $sellerName,
        ':seller_phone' => $sellerPhone,
        ':ilanurl' => $slug,
        ':ilanad' => $ilanAd,
        ':ilanfiyat' => $ilanFiyat,
        ':ilan_resim' => $ilanResim,
        ':il' => $il,
        ':ilce' => $ilce,
        ':mahalle' => $mahalle,
        ':ilan_no' => $ilanNo,
        ':ilan_date' => $ilanDate,
        ':marka' => (string)($row['kat1'] ?? '-'),
        ':model' => (string)($row['kat2'] ?? '-'),
        ':os' => 'iOS',
        ':storage' => '128 GB',
        ':inches' => '6.1',
        ':ram' => '6',
        ':backcamera' => '12',
        ':frontcamera' => '12',
        ':color' => '-',
        ':garanti' => '-',
        ':fromwho' => $fromWho,
        ':swap' => $swap,
        ':status' => $status,
        ':description' => $description,
        ':hizmetbedeli' => $hizmetBedeli,
        ':banks' => $banks,
        ':hesapsahibi' => $hesapSahibi,
        ':iban' => $iban,
        ':hesapno' => $hesapNo,
        ':subekodu' => $subeKodu,
    ];

    if ($hasRow) {
        $sql = "UPDATE ilan_telefon SET
            seller_name=:seller_name, seller_phone=:seller_phone, ilanad=:ilanad, ilanfiyat=:ilanfiyat,
            ilan_resim=:ilan_resim, il=:il, ilce=:ilce, mahalle=:mahalle, ilan_no=:ilan_no, ilan_date=:ilan_date,
            marka=:marka, model=:model, os=:os, storage=:storage, inches=:inches, ram=:ram,
            backcamera=:backcamera, frontcamera=:frontcamera, color=:color, garanti=:garanti,
            fromwho=:fromwho, swap=:swap, status=:status, description=:description, hizmetbedeli=:hizmetbedeli,
            banks=:banks, hesapsahibi=:hesapsahibi, iban=:iban, hesapno=:hesapno, subekodu=:subekodu
            WHERE ilanurl=:ilanurl";
        $conn->prepare($sql)->execute($baseData);
    } else {
        $sql = "INSERT INTO ilan_telefon (
            seller_name, seller_phone, ilanurl, ilanad, ilanfiyat, ilan_resim, il, ilce, mahalle,
            ilan_no, ilan_date, marka, model, os, storage, inches, ram, backcamera, frontcamera,
            color, garanti, fromwho, swap, status, description, hizmetbedeli, banks, hesapsahibi, iban, hesapno, subekodu
        ) VALUES (
            :seller_name, :seller_phone, :ilanurl, :ilanad, :ilanfiyat, :ilan_resim, :il, :ilce, :mahalle,
            :ilan_no, :ilan_date, :marka, :model, :os, :storage, :inches, :ram, :backcamera, :frontcamera,
            :color, :garanti, :fromwho, :swap, :status, :description, :hizmetbedeli, :banks, :hesapsahibi, :iban, :hesapno, :subekodu
        )";
        $conn->prepare($sql)->execute($baseData);
    }
}

header('Location: index.php?type=' . $type . '&q=' . rawurlencode($slug), true, 302);
exit;

