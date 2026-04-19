<?php
/**
 * Yerel test için `ilan_telefon` tablosuna örnek kayıtlar (test, panel-demo-2026).
 */
include dirname(__DIR__) . '/settings/router.php';

$mysqli = new mysqli('localhost', $user, $password, $dbname);
if ($mysqli->connect_error) {
    fwrite(STDERR, $mysqli->connect_error . PHP_EOL);
    exit(1);
}
$mysqli->set_charset('utf8mb4');

$mysqli->query("DELETE FROM ilan_telefon WHERE ilanurl IN ('test','panel-demo-2026')");

$stmt = $mysqli->prepare(
    'INSERT INTO ilan_telefon (seller_name, seller_phone, ilanurl, ilanad, ilanfiyat, ilan_resim, il, ilce, mahalle, ilan_no, ilan_date, marka, model, os, storage, inches, ram, backcamera, frontcamera, color, garanti, fromwho, swap, status, description, hizmetbedeli, banks, hesapsahibi, iban, hesapno, subekodu)
     VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)'
);

if (!$stmt) {
    fwrite(STDERR, $mysqli->error . PHP_EOL);
    exit(1);
}

$ilanurl = 'test';
$ilan_resim = '"test.webp"';
$seller_name = 'Demo Satıcı';
$seller_phone = '5551234567';
$ilanad = 'Demo Telefon İlanı';
$ilanfiyat = '1.000,00 TL';
$il = 'İSTANBUL';
$ilce = 'KADIKÖY';
$mahalle = 'Merkez';
$ilan_no = '12345678';
$ilan_date = '01.01.2022';
$marka = 'Apple';
$model = 'iPhone';
$os = 'iOS';
$storage = '128 GB';
$inches = '6.1';
$ram = '6';
$backcamera = '12';
$frontcamera = '12';
$color = 'Siyah';
$garanti = 'Evet';
$fromwho = 'Sahibinden';
$swap = 'Hayır';
$status = 'İkinci El';
$description = 'Yerel kurulum testi.';
$hizmetbedeli = '-';
$banks = '-';
$hesapsahibi = '-';
$iban = '-';
$hesapno = '-';
$subekodu = '-';

$stmt->bind_param(
    'sssssssssssssssssssssssssssssss',
    $seller_name,
    $seller_phone,
    $ilanurl,
    $ilanad,
    $ilanfiyat,
    $ilan_resim,
    $il,
    $ilce,
    $mahalle,
    $ilan_no,
    $ilan_date,
    $marka,
    $model,
    $os,
    $storage,
    $inches,
    $ram,
    $backcamera,
    $frontcamera,
    $color,
    $garanti,
    $fromwho,
    $swap,
    $status,
    $description,
    $hizmetbedeli,
    $banks,
    $hesapsahibi,
    $iban,
    $hesapno,
    $subekodu
);

if (!$stmt->execute()) {
    fwrite(STDERR, $stmt->error . PHP_EOL);
    exit(1);
}

$ilanurl = 'panel-demo-2026';
$ilan_resim = '"demo1.png"';
$ilanad = 'Panel Demo Ürün';
$ilan_no = '87654321';
$description = 'Panel listesi ve ilan sayfası testi.';
$stmt->bind_param(
    'sssssssssssssssssssssssssssssss',
    $seller_name,
    $seller_phone,
    $ilanurl,
    $ilanad,
    $ilanfiyat,
    $ilan_resim,
    $il,
    $ilce,
    $mahalle,
    $ilan_no,
    $ilan_date,
    $marka,
    $model,
    $os,
    $storage,
    $inches,
    $ram,
    $backcamera,
    $frontcamera,
    $color,
    $garanti,
    $fromwho,
    $swap,
    $status,
    $description,
    $hizmetbedeli,
    $banks,
    $hesapsahibi,
    $iban,
    $hesapno,
    $subekodu
);
if (!$stmt->execute()) {
    fwrite(STDERR, $stmt->error . PHP_EOL);
    exit(1);
}

echo "Demo ilanlar:\n  index.php?type=phone&q=test\n  index.php?type=phone&q=panel-demo-2026\n" . PHP_EOL;
