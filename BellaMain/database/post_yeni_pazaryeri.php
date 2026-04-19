<?php
/**
 * Panelden Migros / Pasaj2 / PttAVM alt / Bim online / A101 havale ilan ekleme.
 * post.php içinden $db ve session hazırken dahil edilir.
 */
$root = dirname(__DIR__, 2);

if (isset($_POST['migrosekle'])) {
    if (!isset($_SESSION['kul_id'])) {
        echo json_encode(array('sonuc' => 'oturum'));
        exit;
    }
    $urunismi = htmlspecialchars($_POST['urunismi'] ?? '');
    $urunkat = htmlspecialchars($_POST['urunkat'] ?? '');
    $fiyat = htmlspecialchars($_POST['fiyat'] ?? '');
    $hakkinda = htmlspecialchars($_POST['hakkinda'] ?? '');
    $iban = htmlspecialchars($_POST['iban'] ?? '');
    if ($urunismi === '' || $urunkat === '' || $fiyat === '' || $hakkinda === '' || $iban === '') {
        echo json_encode(array('sonuc' => 'bos'));
        exit;
    }
    if (!isset($_FILES['mg_resim1']) || $_FILES['mg_resim1']['error'] !== UPLOAD_ERR_OK) {
        echo json_encode(array('sonuc' => 'resim_secilmedi'));
        exit;
    }
    $dir = $root . DIRECTORY_SEPARATOR . 'migros' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR;
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }
    $res = array(1 => '', 2 => '', 3 => '', 4 => '');
    for ($i = 1; $i <= 4; $i++) {
        if (!isset($_FILES['mg_resim' . $i]) || $_FILES['mg_resim' . $i]['error'] !== UPLOAD_ERR_OK) {
            continue;
        }
        $ext = strtolower(pathinfo($_FILES['mg_resim' . $i]['name'], PATHINFO_EXTENSION));
        if (!in_array($ext, array('jpg', 'jpeg', 'png', 'webp', 'gif'), true)) {
            echo json_encode(array('sonuc' => 'gecersiz_uzanti'));
            exit;
        }
        $newName = uniqid('mg_', true) . '.' . $ext;
        if (!move_uploaded_file($_FILES['mg_resim' . $i]['tmp_name'], $dir . $newName)) {
            echo json_encode(array('sonuc' => 'yanlis'));
            exit;
        }
        $res[$i] = '../uploads/' . $newName;
    }
    if ($res[1] === '') {
        echo json_encode(array('sonuc' => 'resim_secilmedi'));
        exit;
    }
    $link = seo($urunismi);
    if ($link === '') {
        $link = 'urun-' . uniqid();
    }
    $ek = $_SESSION['kul_id'];
    $q = $db->prepare('INSERT INTO bella_mg_urunler (urunismi,urunlink,urunkat,resim1,resim2,resim3,resim4,resim5,fiyat,urunkodu,hakkinda,ozellik,iban,ekleyen) VALUES (:a,:u,:k,:r1,:r2,:r3,:r4,:r5,:f,\'\',:h,:o,:i,:e)');
    $ins = $q->execute(array(
        ':a' => $urunismi,
        ':u' => $link,
        ':k' => $urunkat,
        ':r1' => $res[1],
        ':r2' => $res[2] !== '' ? $res[2] : null,
        ':r3' => $res[3] !== '' ? $res[3] : null,
        ':r4' => $res[4] !== '' ? $res[4] : null,
        ':r5' => '',
        ':f' => $fiyat,
        ':h' => $hakkinda,
        ':o' => '{}',
        ':i' => $iban,
        ':e' => $ek,
    ));
    if ($ins) {
        echo json_encode(array('sonuc' => 'tamam'));
        exit;
    }
    echo json_encode(array('sonuc' => 'yanlis'));
    exit;
}

if (isset($_POST['pasaj2ekle'])) {
    if (!isset($_SESSION['kul_id'])) {
        echo json_encode(array('sonuc' => 'oturum'));
        exit;
    }
    $urunisim = htmlspecialchars($_POST['pj_urunisim'] ?? '');
    $urunfiyat = htmlspecialchars($_POST['pj_fiyat'] ?? '');
    $hakkinda = htmlspecialchars($_POST['pj_hakkinda'] ?? '');
    $kat1 = htmlspecialchars($_POST['pj_kat1'] ?? '');
    $kat2 = htmlspecialchars($_POST['pj_kat2'] ?? '');
    $kat3 = htmlspecialchars($_POST['pj_kat3'] ?? '');
    $saticiadi = htmlspecialchars($_POST['pj_saticiadi'] ?? '');
    if ($urunisim === '' || $urunfiyat === '' || $hakkinda === '' || $kat1 === '' || $kat2 === '' || $kat3 === '' || $saticiadi === '') {
        echo json_encode(array('sonuc' => 'bos'));
        exit;
    }
    if (!isset($_FILES['pj_resim1']) || $_FILES['pj_resim1']['error'] !== UPLOAD_ERR_OK) {
        echo json_encode(array('sonuc' => 'resim_secilmedi'));
        exit;
    }
    $dir = $root . DIRECTORY_SEPARATOR . 'pasaj2' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR;
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }
    $paths = array('', '', '', '', '');
    for ($i = 1; $i <= 5; $i++) {
        if (!isset($_FILES['pj_resim' . $i]) || $_FILES['pj_resim' . $i]['error'] !== UPLOAD_ERR_OK) {
            continue;
        }
        $ext = strtolower(pathinfo($_FILES['pj_resim' . $i]['name'], PATHINFO_EXTENSION));
        if (!in_array($ext, array('jpg', 'jpeg', 'png', 'webp', 'gif'), true)) {
            echo json_encode(array('sonuc' => 'gecersiz_uzanti'));
            exit;
        }
        $newName = uniqid('pj_', true) . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', basename($_FILES['pj_resim' . $i]['name']));
        if (!move_uploaded_file($_FILES['pj_resim' . $i]['tmp_name'], $dir . $newName)) {
            echo json_encode(array('sonuc' => 'yanlis'));
            exit;
        }
        $paths[$i - 1] = '../uploads/' . $newName;
    }
    $link = seo($urunisim);
    if ($link === '') {
        $link = 'urun-' . uniqid();
    }
    $ek = $_SESSION['kul_id'];
    $q = $db->prepare('INSERT INTO bella_pj_urunler (urunismi,urunlink,fiyat,hakkinda,resim1,resim2,resim3,resim4,resim5,kat1,kat2,kat3,saticiadi,urunkodu,urunkat,ozellik,iban,ekleyen) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,\'\',NULL,\'[]\',NULL,?)');
    $ins = $q->execute(array(
        $urunisim,
        $link,
        $urunfiyat,
        $hakkinda,
        $paths[0] ?: null,
        $paths[1] ?: null,
        $paths[2] ?: null,
        $paths[3] ?: null,
        $paths[4] ?: null,
        $kat1,
        $kat2,
        $kat3,
        $saticiadi,
        $ek,
    ));
    if ($ins) {
        echo json_encode(array('sonuc' => 'tamam'));
        exit;
    }
    echo json_encode(array('sonuc' => 'yanlis'));
    exit;
}

if (isset($_POST['ptt3ekle'])) {
    if (!isset($_SESSION['kul_id'])) {
        echo json_encode(array('sonuc' => 'oturum'));
        exit;
    }
    $urunisim = htmlspecialchars($_POST['pt3_urunisim'] ?? '');
    $urunfiyat = htmlspecialchars($_POST['pt3_fiyat'] ?? '');
    $hakkinda = htmlspecialchars($_POST['pt3_hakkinda'] ?? '');
    if ($urunisim === '' || $urunfiyat === '' || $hakkinda === '') {
        echo json_encode(array('sonuc' => 'bos'));
        exit;
    }
    if (!isset($_FILES['pt3_resim1']) || $_FILES['pt3_resim1']['error'] !== UPLOAD_ERR_OK) {
        echo json_encode(array('sonuc' => 'resim_secilmedi'));
        exit;
    }
    $dir = $root . DIRECTORY_SEPARATOR . 'pttavm_alt' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR;
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }
    $paths = array('', '', '', '', '');
    for ($i = 1; $i <= 5; $i++) {
        if (!isset($_FILES['pt3_resim' . $i]) || $_FILES['pt3_resim' . $i]['error'] !== UPLOAD_ERR_OK) {
            continue;
        }
        $ext = strtolower(pathinfo($_FILES['pt3_resim' . $i]['name'], PATHINFO_EXTENSION));
        if (!in_array($ext, array('jpg', 'jpeg', 'png', 'webp', 'gif'), true)) {
            echo json_encode(array('sonuc' => 'gecersiz_uzanti'));
            exit;
        }
        $newName = uniqid('pt3_', true) . '.' . $ext;
        if (!move_uploaded_file($_FILES['pt3_resim' . $i]['tmp_name'], $dir . $newName)) {
            echo json_encode(array('sonuc' => 'yanlis'));
            exit;
        }
        $paths[$i - 1] = '../uploads/' . $newName;
    }
    $link = seo($urunisim);
    if ($link === '') {
        $link = 'urun-' . uniqid();
    }
    $ek = $_SESSION['kul_id'];
    $q = $db->prepare('INSERT INTO bella_ptt3_urunler (urunismi,urunlink,fiyat,hakkinda,resim1,resim2,resim3,resim4,resim5,urunkat,urunkodu,ozellik,iban,ekleyen) VALUES (?,?,?,?,?,?,?,?,?,\'\',\'\',\'[]\',NULL,?)');
    $ins = $q->execute(array(
        $urunisim,
        $link,
        $urunfiyat,
        $hakkinda,
        $paths[0] ?: null,
        $paths[1] ?: null,
        $paths[2] ?: null,
        $paths[3] ?: null,
        $paths[4] ?: null,
        $ek,
    ));
    if ($ins) {
        echo json_encode(array('sonuc' => 'tamam'));
        exit;
    }
    echo json_encode(array('sonuc' => 'yanlis'));
    exit;
}

if (isset($_POST['bimonlineekle'])) {
    if (!isset($_SESSION['kul_id'])) {
        echo json_encode(array('sonuc' => 'oturum'));
        exit;
    }
    $name = htmlspecialchars($_POST['bim_name'] ?? '');
    $price = (int) preg_replace('/\D/', '', $_POST['bim_price'] ?? '0');
    $brand = htmlspecialchars($_POST['bim_brand'] ?? 'Marka');
    $code = (int) preg_replace('/\D/', '', $_POST['bim_code'] ?? (string) time());
    $props = $_POST['bim_props'] ?? '<p></p>';
    if ($name === '' || $price <= 0) {
        echo json_encode(array('sonuc' => 'bos'));
        exit;
    }
    if (!isset($_FILES['bim_resim']) || $_FILES['bim_resim']['error'] !== UPLOAD_ERR_OK) {
        echo json_encode(array('sonuc' => 'resim_secilmedi'));
        exit;
    }
    $imgDir = $root . DIRECTORY_SEPARATOR . 'bim_online' . DIRECTORY_SEPARATOR . 'sadece-online-ozel' . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'products' . DIRECTORY_SEPARATOR;
    if (!is_dir($imgDir)) {
        @mkdir($imgDir, 0755, true);
    }
    $ext = strtolower(pathinfo($_FILES['bim_resim']['name'], PATHINFO_EXTENSION));
    if (!in_array($ext, array('jpg', 'jpeg', 'png', 'webp', 'gif'), true)) {
        echo json_encode(array('sonuc' => 'gecersiz_uzanti'));
        exit;
    }
    $imgName = sha1($_FILES['bim_resim']['name'] . uniqid('', true)) . '.' . $ext;
    if (!move_uploaded_file($_FILES['bim_resim']['tmp_name'], $imgDir . $imgName)) {
        echo json_encode(array('sonuc' => 'yanlis'));
        exit;
    }
    $sef = seo($name);
    if ($sef === '') {
        $sef = 'urun-' . uniqid();
    }
    $ek = $_SESSION['kul_id'];
    $q = $db->prepare('INSERT INTO bella_bim_products (ProductName, ImageURL, ProductSefURL, ProductPrice, ProductProperties, ProductBrand, ProductCode, ekleyen) VALUES (?,?,?,?,?,?,?,?)');
    $ins = $q->execute(array($name, $imgName, $sef, $price, $props, $brand, $code, $ek));
    if ($ins) {
        echo json_encode(array('sonuc' => 'tamam'));
        exit;
    }
    echo json_encode(array('sonuc' => 'yanlis'));
    exit;
}

if (isset($_POST['a101ekle'])) {
    if (!isset($_SESSION['kul_id'])) {
        echo json_encode(array('sonuc' => 'oturum'));
        exit;
    }
    $name = htmlspecialchars($_POST['a101_name'] ?? '');
    $price = (int) preg_replace('/\D/', '', $_POST['a101_price'] ?? '0');
    $brand = htmlspecialchars($_POST['a101_brand'] ?? 'Marka');
    $code = (int) preg_replace('/\D/', '', $_POST['a101_code'] ?? (string) time());
    $props = $_POST['a101_props'] ?? '<p></p>';
    if ($name === '' || $price <= 0) {
        echo json_encode(array('sonuc' => 'bos'));
        exit;
    }
    if (!isset($_FILES['a101_resim1']) || $_FILES['a101_resim1']['error'] !== UPLOAD_ERR_OK) {
        echo json_encode(array('sonuc' => 'resim_secilmedi'));
        exit;
    }
    $imgDir = $root . DIRECTORY_SEPARATOR . 'a101havale' . DIRECTORY_SEPARATOR . 'sadece-online-ozel' . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'products' . DIRECTORY_SEPARATOR;
    if (!is_dir($imgDir)) {
        @mkdir($imgDir, 0755, true);
    }
    $saveOne = function ($fileKey) use ($imgDir) {
        if (!isset($_FILES[$fileKey]) || $_FILES[$fileKey]['error'] !== UPLOAD_ERR_OK) {
            return null;
        }
        $ext = strtolower(pathinfo($_FILES[$fileKey]['name'], PATHINFO_EXTENSION));
        if (!in_array($ext, array('jpg', 'jpeg', 'png', 'webp', 'gif'), true)) {
            return false;
        }
        $imgName = sha1($_FILES[$fileKey]['name'] . uniqid('', true)) . '.' . $ext;
        if (!move_uploaded_file($_FILES[$fileKey]['tmp_name'], $imgDir . $imgName)) {
            return false;
        }
        return $imgName;
    };
    $i1 = $saveOne('a101_resim1');
    if ($i1 === false) {
        echo json_encode(array('sonuc' => 'yanlis'));
        exit;
    }
    $i2 = $saveOne('a101_resim2');
    if ($i2 === false) {
        echo json_encode(array('sonuc' => 'gecersiz_uzanti'));
        exit;
    }
    $i3 = $saveOne('a101_resim3');
    if ($i3 === false) {
        echo json_encode(array('sonuc' => 'gecersiz_uzanti'));
        exit;
    }
    $i4 = $saveOne('a101_resim4');
    if ($i4 === false) {
        echo json_encode(array('sonuc' => 'gecersiz_uzanti'));
        exit;
    }
    $sef = seo($name);
    if ($sef === '') {
        $sef = 'urun-' . uniqid();
    }
    $ek = $_SESSION['kul_id'];
    $q = $db->prepare('INSERT INTO bella_a101_products (ProductName, ImageURL, Image2URL, Image3URL, Image4URL, ProductSefURL, ProductPrice, ProductProperties, ProductBrand, ProductCode, ekleyen) VALUES (?,?,?,?,?,?,?,?,?,?,?)');
    $ins = $q->execute(array($name, $i1, $i2 ?: $i1, $i3 ?: $i1, $i4 ?: $i1, $sef, $price, $props, $brand, $code, $ek));
    if ($ins) {
        echo json_encode(array('sonuc' => 'tamam'));
        exit;
    }
    echo json_encode(array('sonuc' => 'yanlis'));
    exit;
}
