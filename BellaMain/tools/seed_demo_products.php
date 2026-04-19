<?php
/**
 * Demo ürünler: tüm ilan tabloları + ty_ilan + hb_urun + yurtici (carlo veya ilk kullanıcı).
 * Çalıştır: php BellaMain/tools/seed_demo_products.php
 */
declare(strict_types=1);

$root = dirname(__DIR__, 2);
require dirname(__DIR__) . '/database/config.php';

$charset = 'utf8';
$dsn = "mysql:host={$dbHost};dbname={$dbName};charset={$charset}";
try {
    $db = new PDO($dsn, $dbUser, $dbPass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (Throwable $e) {
    fwrite(STDERR, "DB bağlantısı yok: " . $e->getMessage() . "\n");
    exit(1);
}

$tyHbSql = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR . 'ty_hb_tablolar.sql';
if (is_file($tyHbSql)) {
    $buffer = '';
    foreach (file($tyHbSql) ?: [] as $line) {
        if (preg_match('/^\s*--/', $line)) {
            continue;
        }
        $buffer .= $line;
        if (preg_match('/;\s*$/', rtrim($line))) {
            $stmt = trim($buffer);
            $buffer = '';
            if ($stmt === '') {
                continue;
            }
            try {
                $db->exec($stmt);
            } catch (Throwable $e) {
                fwrite(STDERR, "SQL uyarı: " . $e->getMessage() . "\n");
            }
        }
    }
    echo "ty/hb tabloları kontrol edildi.\n";
}

$imgDir = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'images';
if (!is_dir($imgDir)) {
    mkdir($imgDir, 0755, true);
}
$demoImg = $imgDir . DIRECTORY_SEPARATOR . 'demo_bella.jpg';
if (!is_file($demoImg) && function_exists('imagecreatetruecolor')) {
    $im = imagecreatetruecolor(120, 120);
    $bg = imagecolorallocate($im, 220, 60, 60);
    $fg = imagecolorallocate($im, 255, 255, 255);
    imagefill($im, 0, 0, $bg);
    imagestring($im, 5, 10, 50, 'DEMO', $fg);
    imagejpeg($im, $demoImg, 90);
    imagedestroy($im);
}
if (!is_file($demoImg)) {
    fwrite(STDERR, "GD ile demo_bella.jpg oluşturulamadı; php.ini içinde extension=gd aktif olmalı.\n");
    exit(1);
}
/** @var list<string> En az 4 dosya — panelde 3+ resim kurali */
$demoFiles = ['demo_bella.jpg'];
if (function_exists('imagecreatetruecolor')) {
    $palette = [
        [40, 120, 200],
        [80, 180, 90],
        [200, 140, 40],
        [160, 80, 200],
    ];
    foreach ($palette as $i => $rgb) {
        $name = 'demo_bella_' . ($i + 2) . '.jpg';
        $path = $imgDir . DIRECTORY_SEPARATOR . $name;
        if (!is_file($path)) {
            $im = imagecreatetruecolor(320, 320);
            $bg = imagecolorallocate($im, $rgb[0], $rgb[1], $rgb[2]);
            $fg = imagecolorallocate($im, 255, 255, 255);
            imagefill($im, 0, 0, $bg);
            imagestring($im, 5, 20, 140, 'PANZER ' . ($i + 1), $fg);
            imagejpeg($im, $path, 88);
            imagedestroy($im);
        }
        $demoFiles[] = $name;
    }
} else {
    for ($i = 2; $i <= 4; $i++) {
        $name = "demo_bella_{$i}.jpg";
        $path = $imgDir . DIRECTORY_SEPARATOR . $name;
        if (!is_file($path)) {
            copy($demoImg, $path);
        }
        $demoFiles[] = $name;
    }
}
$f1 = $demoFiles[0];
$f2 = $demoFiles[1];
$f3 = $demoFiles[2];
$f4 = $demoFiles[3];

$tyDir = $root . DIRECTORY_SEPARATOR . 'trendyol' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'dosyalar' . DIRECTORY_SEPARATOR . 'ilan';
$hbDir = $root . DIRECTORY_SEPARATOR . 'hepsiburada' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'resimler';
foreach ([$tyDir, $hbDir] as $d) {
    if (!is_dir($d)) {
        mkdir($d, 0755, true);
    }
    @copy($imgDir . DIRECTORY_SEPARATOR . $f1, $d . DIRECTORY_SEPARATOR . $f1);
}

$u = $db->query("SELECT kullaniciadi FROM kullanicilar ORDER BY id ASC LIMIT 1")->fetchColumn();
$ek = is_string($u) && $u !== '' ? $u : 'carlo';
echo "Demo ekleyen: {$ek}\n";

$mark = 'BCSC_DEMO';

function hasDemo(PDO $db, string $sql): bool
{
    $st = $db->query($sql);
    return $st && (int) $st->fetchColumn() > 0;
}

// --- ty_ilan ---
if (!hasDemo($db, "SELECT COUNT(*) FROM ty_ilan WHERE urunadi LIKE '%{$mark}%'")) {
    $db->prepare("INSERT INTO ty_ilan (urunadi,saticiadi,urunaciklama,urunfiyat,urunkategori,urunresmi,ekleyen,ilandurum) VALUES (?,?,?,?,?,?,?,'1')")
        ->execute(["{$mark} Trendyol Ürün", 'Demo Satıcı', 'Panel demo açıklama.', '1.299', 'Elektronik', $f1, $ek]);
    echo "ty_ilan eklendi.\n";
} else {
    echo "ty_ilan demo zaten var.\n";
}

// --- hb_urun ---
if (!hasDemo($db, "SELECT COUNT(*) FROM hb_urun WHERE urunlink = 'demo-hepsiburada-slug'")) {
    $db->prepare("INSERT INTO hb_urun (urunlink,urunkategori,urunadi,urunfiyat,urunresim,ekleyen) VALUES (?,?,?,?,?,?)")
        ->execute(['demo-hepsiburada-slug', 'Laptop', "{$mark} Hepsiburada Ürün", '24.999,00', $f1, $ek]);
    echo "hb_urun eklendi.\n";
} else {
    echo "hb_urun demo zaten var.\n";
}

// --- ilan_dolap ---
if (!hasDemo($db, "SELECT COUNT(*) FROM ilan_dolap WHERE urunadi LIKE '%{$mark}%'")) {
    $db->prepare("INSERT INTO ilan_dolap (ekleyen,ilandurum,kartibanselect,selectgiris,urunadi,adsoyad,aciklama,urunfiyati,kat1,kat2,kat3,indirim,begeni,puan,yorum,alicisatici,kullanim,resim1,resim2,resim3,resim4,resim5,resim6,saticipp,dekont) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)")
        ->execute([$ek, '1', 'Hayır', 'Hayır', "{$mark} Dolap", 'Demo User', 'Demo açıklama', '3.500', 'Elektronik', 'Telefon', 'Akıllı', '4.000', '12', '5', '8', 'Satıcı', 'İyi', $f1, $f2, $f3, $f4, $f1, '', '']);
    echo "ilan_dolap eklendi.\n";
} else {
    echo "ilan_dolap demo zaten var.\n";
}

// --- ilan_sahibinden ---
if (!hasDemo($db, "SELECT COUNT(*) FROM ilan_sahibinden WHERE urunadi LIKE '%{$mark}%'")) {
    $db->prepare("INSERT INTO ilan_sahibinden (ekleyen,ilandurum,kartibanselect,selectgiris,urunadi,adsoyad,aciklama,ilantarihi,ilanno,telno,kimden,durumu,urunfiyati,komisyon,il,ilce,mahalle,kat1,kat2,ozellik_ad,ozellik_deger,resim1,resim2,resim3,resim4,resim5,dekont) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)")
        ->execute([$ek, '1', 'Hayır', 'Hayır', "{$mark} Sahibinden", 'Demo', 'Demo ilan', '19.04.2026', '10000001', '05000000000', 'Sahibinden', 'İkinci El', '8.900', '0', 'İstanbul', 'Kadıköy', 'Merkez', 'Elektronik', 'Telefon', '', '', $f1, $f2, $f3, $f4, $f1, '']);
    echo "ilan_sahibinden eklendi.\n";
} else {
    echo "ilan_sahibinden demo zaten var.\n";
}

// --- ilan_letgo ---
if (!hasDemo($db, "SELECT COUNT(*) FROM ilan_letgo WHERE urunadi LIKE '%{$mark}%'")) {
    $db->prepare("INSERT INTO ilan_letgo (ekleyen,ilandurum,kartibanselect,selectgiris,urunadi,adsoyad,urunfiyati,ilantarihi,ilanno,aciklama,il,ilce,kat1,kat2,kategori1,kategori2,kategori3,kategori4,resim1,resim2,resim3,resim4,resim5,resim6,saticipp,dekont) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)")
        ->execute([$ek, '1', 'Hayır', 'Hayır', "{$mark} Letgo", 'Demo', '4.200', '19 Nis', '5000000001', 'Demo', 'Ankara', 'Çankaya', 'Elektronik', 'Tablet', 'Apple', 'iPad', '10', 'Gri', $f1, $f2, $f3, $f4, $f1, '', '']);
    echo "ilan_letgo eklendi.\n";
} else {
    echo "ilan_letgo demo zaten var.\n";
}

// --- ilan_pttavm ---
if (!hasDemo($db, "SELECT COUNT(*) FROM ilan_pttavm WHERE urunadi LIKE '%{$mark}%'")) {
    $db->prepare("INSERT INTO ilan_pttavm (ekleyen,ilandurum,kartibanselect,selectgiris,urunadi,urunfiyati,aciklama,kat1,kat2,kat3,resim1,resim2,resim3,resim4,resim5,dekont) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)")
        ->execute([$ek, '1', 'Hayır', 'Hayır', "{$mark} PttAVM", '2.100', 'Demo', 'Elektronik', 'Aksesuar', 'Kılıf', $f1, $f2, $f3, $f4, $f1, '']);
    echo "ilan_pttavm eklendi.\n";
} else {
    echo "ilan_pttavm demo zaten var.\n";
}

// --- ilan_shopier ---
if (!hasDemo($db, "SELECT COUNT(*) FROM ilan_shopier WHERE urunadi LIKE '%{$mark}%'")) {
    $db->prepare("INSERT INTO ilan_shopier (ekleyen,ilandurum,kartibanselect,urunadi,adsoyad,urunfiyati,saticiaciklama,aciklama,kargoucreti,resim1,resim2,resim3,resim4,resim5,dekont) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)")
        ->execute([$ek, '1', 'Hayır', "{$mark} Shopier", 'Demo Mağaza', '1.111', 'Hızlı kargo', 'Demo ürün', '0', $f1, $f2, $f3, $f4, $f1, '']);
    echo "ilan_shopier eklendi.\n";
} else {
    echo "ilan_shopier demo zaten var.\n";
}

// --- ilan_turkcell ---
if (!hasDemo($db, "SELECT COUNT(*) FROM ilan_turkcell WHERE urunadi LIKE '%{$mark}%'")) {
    $db->prepare("INSERT INTO ilan_turkcell (ekleyen,ilandurum,kartibanselect,urunadi,urunfiyati,renk,renkpaleti,indirimbitis,kat1,kat2,resim1,resim2,resim3,resim4,resim5,dekont) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)")
        ->execute([$ek, '1', 'Hayır', "{$mark} Turkcell", '9.999', 'Siyah', '000000', '31.12.2026', 'Elektronik', 'Telefon', $f1, $f2, $f3, $f4, $f1, '']);
    echo "ilan_turkcell eklendi.\n";
} else {
    echo "ilan_turkcell demo zaten var.\n";
}

// --- yurtici (varchar id) ---
$demoYid = 'BCSCDEMO0001';
$chk = $db->prepare('SELECT COUNT(*) FROM yurtici WHERE id = ?');
$chk->execute([$demoYid]);
if ((int) $chk->fetchColumn() === 0) {
    $db->prepare("INSERT INTO yurtici (id,ekleyen,ilandurum,durum,gonderen,teslimalan,cikistarihi,teslimtarihi,teslimbirimi,gonderitipi,telno,cikisyeri,varisyeri,step1,step2,step3,step4,rotate) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)")
        ->execute([$demoYid, $ek, '1', 'Hazırlanıyor', 'Demo Gönderen', 'Demo Alıcı', '19.04.2026', '22.04.2026', 'Demo Şube', 'Gönderici Ödemeli', '05001112233', 'İstanbul', 'Ankara', '', '', '', '', '-73']);
    echo "yurtici demo eklendi.\n";
} else {
    echo "yurtici demo zaten var.\n";
}

$yeniSql = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR . 'bella_yeni_pazaryeri_tablolar.sql';
if (is_file($yeniSql)) {
    $buffer = '';
    foreach (file($yeniSql) ?: [] as $line) {
        if (preg_match('/^\s*--/', $line)) {
            continue;
        }
        $buffer .= $line;
        if (preg_match('/;\s*$/', rtrim($line))) {
            $stmt = trim($buffer);
            $buffer = '';
            if ($stmt === '') {
                continue;
            }
            try {
                $db->exec($stmt);
            } catch (Throwable $e) {
                fwrite(STDERR, 'yeni_pazaryeri SQL: ' . $e->getMessage() . "\n");
            }
        }
    }
    echo "Yeni pazaryeri tabloları kontrol edildi.\n";
}

$mgUp = $root . DIRECTORY_SEPARATOR . 'migros' . DIRECTORY_SEPARATOR . 'uploads';
$pjUp = $root . DIRECTORY_SEPARATOR . 'pasaj2' . DIRECTORY_SEPARATOR . 'uploads';
$ptUp = $root . DIRECTORY_SEPARATOR . 'pttavm_alt' . DIRECTORY_SEPARATOR . 'uploads';
$bimUp = $root . DIRECTORY_SEPARATOR . 'bim_online' . DIRECTORY_SEPARATOR . 'sadece-online-ozel' . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'products';
$a101Up = $root . DIRECTORY_SEPARATOR . 'a101havale' . DIRECTORY_SEPARATOR . 'sadece-online-ozel' . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'products';
foreach ([$mgUp, $pjUp, $ptUp, $bimUp, $a101Up] as $d) {
    if (!is_dir($d)) {
        @mkdir($d, 0755, true);
    }
    foreach ([$f1, $f2, $f3, $f4] as $df) {
        @copy($imgDir . DIRECTORY_SEPARATOR . $df, $d . DIRECTORY_SEPARATOR . $df);
    }
}

try {
    if (!hasDemo($db, "SELECT COUNT(*) FROM bella_mg_urunler WHERE urunlink = 'demo-migros-slug'")) {
        $db->prepare('INSERT INTO bella_mg_urunler (urunismi,urunlink,urunkat,resim1,resim2,resim3,resim4,resim5,fiyat,urunkodu,hakkinda,ozellik,iban,ekleyen) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)')
            ->execute(array("{$mark} Migros", 'demo-migros-slug', 'elektronik', '../uploads/' . $f1, '../uploads/' . $f2, '../uploads/' . $f3, '../uploads/' . $f4, '', '999', '', 'Demo', '{}', 'TR00', $ek));
        echo "bella_mg_urunler demo eklendi.\n";
    } else {
        echo "bella_mg_urunler demo zaten var.\n";
    }
} catch (Throwable $e) {
    fwrite(STDERR, 'mg demo: ' . $e->getMessage() . "\n");
}

try {
    if (!hasDemo($db, "SELECT COUNT(*) FROM bella_pj_urunler WHERE urunlink = 'demo-pasaj2-slug'")) {
        $db->prepare('INSERT INTO bella_pj_urunler (urunismi,urunlink,fiyat,hakkinda,resim1,resim2,resim3,resim4,resim5,kat1,kat2,kat3,saticiadi,urunkodu,urunkat,ozellik,iban,ekleyen) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,\'\',NULL,\'[]\',NULL,?)')
            ->execute(array("{$mark} Pasaj", 'demo-pasaj2-slug', '1499', 'Demo', '../uploads/' . $f1, '../uploads/' . $f2, '../uploads/' . $f3, '../uploads/' . $f4, null, 'Kategori1', 'Kategori2', 'Kategori3', 'Demo Satıcı', $ek));
        echo "bella_pj_urunler demo eklendi.\n";
    } else {
        echo "bella_pj_urunler demo zaten var.\n";
    }
} catch (Throwable $e) {
    fwrite(STDERR, 'pj demo: ' . $e->getMessage() . "\n");
}

try {
    if (!hasDemo($db, "SELECT COUNT(*) FROM bella_ptt3_urunler WHERE urunlink = 'demo-ptt3-slug'")) {
        $db->prepare('INSERT INTO bella_ptt3_urunler (urunismi,urunlink,fiyat,hakkinda,resim1,resim2,resim3,resim4,resim5,urunkat,urunkodu,ozellik,iban,ekleyen) VALUES (?,?,?,?,?,?,?,?,?,\'\',\'\',\'[]\',NULL,?)')
            ->execute(array("{$mark} PttAVM", 'demo-ptt3-slug', '2299', 'Demo', '../uploads/' . $f1, '../uploads/' . $f2, '../uploads/' . $f3, '../uploads/' . $f4, null, $ek));
        echo "bella_ptt3_urunler demo eklendi.\n";
    } else {
        echo "bella_ptt3_urunler demo zaten var.\n";
    }
} catch (Throwable $e) {
    fwrite(STDERR, 'ptt3 demo: ' . $e->getMessage() . "\n");
}

try {
    if (!hasDemo($db, "SELECT COUNT(*) FROM bella_bim_products WHERE ProductSefURL = 'demo-bim-slug'")) {
        $db->prepare('INSERT INTO bella_bim_products (ProductName,ImageURL,ProductSefURL,ProductPrice,ProductProperties,ProductBrand,ProductCode,ekleyen) VALUES (?,?,?,?,?,?,?,?)')
            ->execute(array("{$mark} Bim", $f1, 'demo-bim-slug', 1999, '<p>Demo</p>', 'DemoMarka', 10001, $ek));
        echo "bella_bim_products demo eklendi.\n";
    } else {
        echo "bella_bim_products demo zaten var.\n";
    }
} catch (Throwable $e) {
    fwrite(STDERR, 'bim demo: ' . $e->getMessage() . "\n");
}

try {
    if (!hasDemo($db, "SELECT COUNT(*) FROM bella_a101_products WHERE ProductSefURL = 'demo-a101-slug'")) {
        $db->prepare('INSERT INTO bella_a101_products (ProductName,ImageURL,Image2URL,Image3URL,Image4URL,ProductSefURL,ProductPrice,ProductProperties,ProductBrand,ProductCode,ekleyen) VALUES (?,?,?,?,?,?,?,?,?,?,?)')
            ->execute(array("{$mark} A101", $f1, $f2, $f3, $f4, 'demo-a101-slug', 1599, '<p>Demo</p>', 'DemoMarka', 10002, $ek));
        echo "bella_a101_products demo eklendi.\n";
    } else {
        echo "bella_a101_products demo zaten var.\n";
    }
} catch (Throwable $e) {
    fwrite(STDERR, 'a101 demo: ' . $e->getMessage() . "\n");
}

try {
    $db->exec('UPDATE bella_bim_settings SET isActive = 0 WHERE id = 1');
    $db->exec('UPDATE bella_a101_settings SET isActive = 0 WHERE id = 1');
    echo "bim/a101 isActive=0 (vitrin erişilebilir).\n";
} catch (Throwable $e) {
    fwrite(STDERR, 'bim/a101 ayar: ' . $e->getMessage() . "\n");
}

echo "Tamam.\n";
