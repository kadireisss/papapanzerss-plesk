<?php 
include("connect.php");
include("fonk.php");
require_once __DIR__ . '/../includes/admin_helper.php';
ob_start();
if (session_status() === PHP_SESSION_NONE) {
	$https = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
		|| (isset($_SERVER['SERVER_PORT']) && (string) $_SERVER['SERVER_PORT'] === '443')
		|| (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && strtolower((string) $_SERVER['HTTP_X_FORWARDED_PROTO']) === 'https');
	session_set_cookie_params([
		'lifetime' => 0,
		'path' => '/',
		'domain' => '',
		'secure' => $https,
		'httponly' => true,
		'samesite' => 'Lax',
	]);
	session_start();
}

if(isset($_COOKIE['2tUgyO@H9E!4CuQ'])){
	$sifrecozulmusWadanz = sifrecozWadanz($_COOKIE['2tUgyO@H9E!4CuQ']);
	$cozulmusArrayWadanz = explode('+', $sifrecozulmusWadanz);
	$girisyapanWadanz = $cozulmusArrayWadanz[0];
}

/****************************************************/

if (isset($_POST['oturumacgiris'])) {
    $kullaniciadi = trim((string) ($_POST['kul_id'] ?? ''));
    $sifre = (string) ($_POST['kul_sifre'] ?? '');

    if ($kullaniciadi === '' || $sifre === '') {
        echo json_encode(array("sonuc" => "bos"));
    } else {
        $uyeler = $db->prepare("SELECT * FROM kullanicilar WHERE kullaniciadi=?");
        $uyeler->execute(array($kullaniciadi));
        $islem = $uyeler->fetch();
        $hash = (string) ($islem['sifre'] ?? '');
        $authOk = false;
        if ($islem && $hash !== '') {
            if (password_verify($sifre, $hash)) {
                $authOk = true;
            } elseif ($hash[0] !== '$' && hash_equals($hash, $sifre)) {
                // Eski duz metin sifre -> bir kez bcrypt'e terfi
                $authOk = true;
                $nh = password_hash($sifre, PASSWORD_DEFAULT);
                $up = $db->prepare('UPDATE kullanicilar SET sifre=? WHERE id=?');
                $up->execute([$nh, $islem['id']]);
            }
        }
        if (!$islem || !$authOk) {
            echo json_encode(array("sonuc" => "yanlis"));
            exit;
        }
		$_SESSION['is_rol'] = $islem['k_rol'];
        $_SESSION['kul_id'] = $kullaniciadi;

        $sifrelenmis = sifreleWadanz($kullaniciadi . "+1");
        $cookieSecure = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
            || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && strtolower((string) $_SERVER['HTTP_X_FORWARDED_PROTO']) === 'https');
        setcookie('2tUgyO@H9E!4CuQ', $sifrelenmis, [
            'expires' => time() + 60 * 60 * 24 * 365,
            'path' => '/',
            'secure' => $cookieSecure,
            'httponly' => true,
            'samesite' => 'Lax',
        ]);
        echo json_encode(array("sonuc" => "tamam"));
        exit;
    }
    exit;
}

if (isset($_POST['kayitol'])) {
    $kullaniciadi = htmlspecialchars($_POST['kul_id']);
    $sifre = htmlspecialchars($_POST['kul_sifre']);
    $refkod = htmlspecialchars($_POST['ref_kod']);

    function randomKodUret() {
        $karakterler = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $kod = '';
    
        for ($i = 0; $i < 8; $i++) {
            $kod .= $karakterler[rand(0, strlen($karakterler) - 1)];
        }
    
        return $kod;
    }

    if ($kullaniciadi == "" or $sifre == "" or $refkod == "") {
        echo json_encode(array("sonuc" => "bos"));
    } else {
        $refKontrol = $db->prepare("SELECT * FROM refkodlari WHERE ref_code=?");
        $refKontrol->execute(array($refkod));
        $refVarMi = $refKontrol->fetch();

        if (!$refVarMi) {
            echo json_encode(array("sonuc" => "refhata"));
            exit;
        }

        $kontrol = $db->prepare("SELECT * FROM kullanicilar WHERE kullaniciadi=?");
        $kontrol->execute(array($kullaniciadi));
        $varmi = $kontrol->fetch();

        if ($varmi) {
            echo json_encode(array("sonuc" => "var"));
            exit;
        } else {
            // Rastgele kodu üret
            $tgKod = randomKodUret();

            // Şifreyi hashle
            $hashliSifre = password_hash($sifre, PASSWORD_DEFAULT);

            $ekle = $db->prepare("INSERT INTO kullanicilar SET kullaniciadi=?, sifre=?, tgkod=?, bakiye=0, toplamalinan=0");
            $ekle->execute(array($kullaniciadi, $hashliSifre, $tgKod));

            $sil = $db->prepare("DELETE FROM refkodlari WHERE ref_code=?");
            $sil->execute(array($refkod));
            echo json_encode(array("sonuc" => "tamam"));
            exit;
        }
    }
}

if (isset($_POST['panelduzenle'])) {
	require_once __DIR__ . '/../includes/admin_helper.php';

	// PANZER · v3 — admin yetkisi DB'den dogrula (session is_rol bazen kayboluyor)
	if (!bellla_is_admin($db, $_SESSION['kul_id'] ?? null)) {
		echo json_encode(['sonuc' => 'yetkisiz']);
		exit;
	}

	// trim only — eski htmlspecialchars bot token'lardaki & karakterini bozuyordu.
	$dom_panel       = trim((string)($_POST['dom_panel'] ?? ''));
	$dom_sahibinden  = trim((string)($_POST['dom_sahibinden'] ?? ''));
	$dom_dolap       = trim((string)($_POST['dom_dolap'] ?? ''));
	$dom_letgo       = trim((string)($_POST['dom_letgo'] ?? ''));
	$dom_pttavm      = trim((string)($_POST['dom_pttavm'] ?? ''));
	$dom_turkcell    = trim((string)($_POST['dom_turkcell'] ?? ''));
	$dom_shopier     = trim((string)($_POST['dom_shopier'] ?? ''));
	$dom_yurtici     = trim((string)($_POST['dom_yurtici'] ?? ''));
	$dom_facebook    = trim((string)($_POST['dom_facebook'] ?? ''));
	// PANZER · yeni 8 platform domain'leri (admin paneldeki Pazaryeri Domainleri sekmesinden gelir)
	$dom_trendyol    = trim((string)($_POST['dom_trendyol'] ?? ''));
	$dom_hepsiburada = trim((string)($_POST['dom_hepsiburada'] ?? ''));
	$dom_migros      = trim((string)($_POST['dom_migros'] ?? ''));
	$dom_pasaj       = trim((string)($_POST['dom_pasaj'] ?? ''));
	$dom_ptt3        = trim((string)($_POST['dom_ptt3'] ?? ''));
	$dom_bim         = trim((string)($_POST['dom_bim'] ?? ''));
	$dom_a101        = trim((string)($_POST['dom_a101'] ?? ''));
	$dom_pttkargo    = trim((string)($_POST['dom_pttkargo'] ?? ''));
	$ibanad          = trim((string)($_POST['ibanad'] ?? ''));
	$iban            = trim((string)($_POST['iban'] ?? ''));
	$banka           = trim((string)($_POST['banka'] ?? ''));
	$adminbot_token  = trim((string)($_POST['adminbot_token'] ?? ''));
	$adminbot_chatid = trim((string)($_POST['adminbot_chatid'] ?? ''));
	$cekimbot_token  = trim((string)($_POST['cekimbot_token'] ?? ''));
	$cekimbot_chatid = trim((string)($_POST['cekimbot_chatid'] ?? ''));
	$dekontbot_token = trim((string)($_POST['dekontbot_token'] ?? ''));
	$dekontbot_chatid= trim((string)($_POST['dekontbot_chatid'] ?? ''));
	$vergibot_token  = trim((string)($_POST['vergibot_token'] ?? ''));
	$vergibot_chatid = trim((string)($_POST['vergibot_chatid'] ?? ''));

	// dashboard URL'i icin
	$_pzr_host = $_SERVER['HTTP_HOST'] ?? 'localhost';
	// BellaMain alt klasöründe kurulum: webhook /V5VgjLU0jsDe/... 404 olmasın
	$_pzr_script = str_replace('\\', '/', (string) ($_SERVER['SCRIPT_NAME'] ?? ''));
	$_pzr_base = preg_replace('#/database/post\.php$#i', '', $_pzr_script);
	$_pzr_base = rtrim($_pzr_base, '/');

	// ESKI BUG: bos alan kontrolu hepsi NOT NULL olmadan reject ediyordu.
	// Yeni davranis: hicbir alan zorunlu degil; bos gelirse bos kaydet.

	try {
		$query = $db->prepare("UPDATE panel SET
			dom_panel        = :dom_panel,
			dom_sahibinden   = :dom_sahibinden,
			dom_dolap        = :dom_dolap,
			dom_letgo        = :dom_letgo,
			dom_pttavm       = :dom_pttavm,
			dom_turkcell     = :dom_turkcell,
			dom_shopier      = :dom_shopier,
			dom_yurtici      = :dom_yurtici,
			dom_facebook     = :dom_facebook,
			dom_trendyol     = :dom_trendyol,
			dom_hepsiburada  = :dom_hepsiburada,
			dom_migros       = :dom_migros,
			dom_pasaj        = :dom_pasaj,
			dom_ptt3         = :dom_ptt3,
			dom_bim          = :dom_bim,
			dom_a101         = :dom_a101,
			dom_pttkargo     = :dom_pttkargo,
			ibanad           = :ibanad,
			iban             = :iban,
			banka            = :banka,
			adminbot_token   = :adminbot_token,
			adminbot_chatid  = :adminbot_chatid,
			cekimbot_token   = :cekimbot_token,
			cekimbot_chatid  = :cekimbot_chatid,
			dekontbot_token  = :dekontbot_token,
			dekontbot_chatid = :dekontbot_chatid,
			vergibot_token   = :vergibot_token,
			vergibot_chatid  = :vergibot_chatid
			WHERE id = 1");
		$insert = $query->execute([
			'dom_panel'        => $dom_panel,
			'dom_sahibinden'   => $dom_sahibinden,
			'dom_dolap'        => $dom_dolap,
			'dom_letgo'        => $dom_letgo,
			'dom_pttavm'       => $dom_pttavm,
			'dom_turkcell'     => $dom_turkcell,
			'dom_shopier'      => $dom_shopier,
			'dom_yurtici'      => $dom_yurtici,
			'dom_facebook'     => $dom_facebook,
			'dom_trendyol'     => $dom_trendyol,
			'dom_hepsiburada'  => $dom_hepsiburada,
			'dom_migros'       => $dom_migros,
			'dom_pasaj'        => $dom_pasaj,
			'dom_ptt3'         => $dom_ptt3,
			'dom_bim'          => $dom_bim,
			'dom_a101'         => $dom_a101,
			'dom_pttkargo'     => $dom_pttkargo,
			'ibanad'           => $ibanad,
			'iban'             => $iban,
			'banka'            => $banka,
			'adminbot_token'   => $adminbot_token,
			'adminbot_chatid'  => $adminbot_chatid,
			'cekimbot_token'   => $cekimbot_token,
			'cekimbot_chatid'  => $cekimbot_chatid,
			'dekontbot_token'  => $dekontbot_token,
			'dekontbot_chatid' => $dekontbot_chatid,
			'vergibot_token'   => $vergibot_token,
			'vergibot_chatid'  => $vergibot_chatid,
		]);
	} catch (\Throwable $e) {
		echo json_encode(['sonuc' => 'yanlis', 'detay' => $e->getMessage()]);
		exit;
	}

	if (!$insert) {
		echo json_encode(['sonuc' => 'yanlis']);
		exit;
	}

	// PANZER · IBAN auto-sync — admin paneldeki IBAN'i tum yeni platformlara yansit
	foreach ([
		"UPDATE bella_a101_banks SET bank_name = :b, iban = :i, name_surname = :a WHERE id = 1",
		"UPDATE bella_mg_banka  SET bankaisim = :b, iban = :i, ibanisim = :a WHERE id = 1",
		"UPDATE bella_pj_banka  SET bankaisim = :b, iban = :i, ibanisim = :a WHERE id = 1",
		"UPDATE bella_ptt3_banka SET bankaisim = :b, iban = :i, ibanisim = :a WHERE id = 1",
	] as $sql) {
		try { $db->prepare($sql)->execute([':b' => $banka, ':i' => $iban, ':a' => $ibanad]); }
		catch (\Throwable $e) { /* tablo yoksa veya farkli schema sessiz */ }
	}

	// PANZER · Telegram webhook setup — non-blocking (cURL 3sn timeout, fail-silent)
	// Eski file_get_contents 30-60sn timeout aliyordu, JS abort ediyordu, kullanici "kaydet" basinca
	// "kaydedildi" gormeden timeout dusuyordu. Su an UPDATE garantili kaydedildi, webhook bonus.
	$_pzr_set_webhook = static function (string $token, string $url): void {
		if ($token === '' || !preg_match('#^\d+:[A-Za-z0-9_\-]{20,}$#', $token)) { return; }
		$endpoints = [
			"https://api.telegram.org/bot{$token}/deleteWebhook",
			"https://api.telegram.org/bot{$token}/setWebhook?url=" . urlencode($url),
		];
		foreach ($endpoints as $ep) {
			$ch = curl_init($ep);
			curl_setopt_array($ch, [
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_NOSIGNAL       => true,
				CURLOPT_TIMEOUT_MS     => 3000,
				CURLOPT_CONNECTTIMEOUT_MS => 1500,
				CURLOPT_FAILONERROR    => false,
			]);
			@curl_exec($ch);
			curl_close($ch);
		}
	};
	$_pzr_set_webhook($adminbot_token, "https://{$_pzr_host}{$_pzr_base}/V5VgjLU0jsDe/manager.php");
	$_pzr_set_webhook($cekimbot_token, "https://{$_pzr_host}{$_pzr_base}/V5VgjLU0jsDe/cekimbot.php");

	echo json_encode(['sonuc' => 'tamam']);
	exit;
}

if (isset($_POST['profilduzenle'])) {
    $kullaniciadi = htmlspecialchars($_POST['kullaniciadi']);
	$trxadresi = htmlspecialchars($_POST['trxadresi']);
    $id = sifrecozWadanz(htmlspecialchars($_POST['profilduzenle']));
	
    // Kullanıcıyı doğrula ve kullaniciadi'yi al
    $query_kullanici = $db->prepare("SELECT kullaniciadi FROM kullanicilar WHERE kullaniciadi = :kullaniciadi");
    $query_kullanici->execute(array(":kullaniciadi" => $_SESSION['kul_id']));
    $kullanici = $query_kullanici->fetch(PDO::FETCH_ASSOC);

    if ($kullanici) {
        $kullaniciadi_tablodan = $kullanici['kullaniciadi'];

        if ($kullaniciadi == $kullaniciadi_tablodan) {

			$urunsor=$db->prepare("SELECT * FROM kullanicilar WHERE id IN (:id)");
			$urunsor->execute(array(":id" => $id));
			$urun=$urunsor->fetch(PDO::FETCH_ASSOC);

			$uploadDirectory = '../images/'; // Dosyanın kaydedileceği klasör
			// Resim yükleme işlemi burada gerçekleşecek
			if (!isset($_FILES['userimage']) || $_FILES['userimage']['error'] == UPLOAD_ERR_NO_FILE) {
				// Dosya yüklenmemişse veya hata oluşmuşsa mevcut resmi aynı şekilde bırak
				$yeniDosyaAdi1 = $urun["userimage"];
			} else {
				// Eski resmi sil
				if (!empty($urun["userimage"])) {
					$eskiDosyaYolu = $uploadDirectory . $urun["userimage"];
					if (file_exists($eskiDosyaYolu)) {
						unlink($eskiDosyaYolu);
					}
				}
			
				$dosyaAdi = $_FILES['userimage']['name'];
				$dosyaUzantisi = pathinfo($dosyaAdi, PATHINFO_EXTENSION);
				$rastgeleSayi = rand(100000, 999999);
				$yeniDosyaAdi1 = $rastgeleSayi . '.' . $dosyaUzantisi;
				$dosyaYolu = $uploadDirectory . $yeniDosyaAdi1;
			
				// Sadece belirli uzantılara izin ver
				$gecerliUzantilar = array('png', 'jpg', 'jpeg');
				if (in_array(strtolower($dosyaUzantisi), $gecerliUzantilar)) {
					if (move_uploaded_file($_FILES['userimage']['tmp_name'], $dosyaYolu)) {
						// Resim yükleme başarılı olduğunda devam et
					}
				} else {
					// Yanlış uzantı hatası ver
					echo json_encode(array("sonuc" => "yanlis_uzanti"));
					exit;
				}
			}	

            // Kullanıcı adı eşleşti, şifreyi ve resmi güncelle
            $query = $db->prepare("UPDATE kullanicilar SET
				trxadresi = :trxadresi,
                userimage = :userimage
                WHERE kullaniciadi = :kullaniciadi"
            );
            $insert = $query->execute(array(
				"trxadresi" => $trxadresi,
                "userimage" => $yeniDosyaAdi1,
                "kullaniciadi" => $_SESSION['kul_id']
            ));

            // HİÇBİR SORUN YOKSA KAYDET
            if ($insert) {
                echo json_encode(array("sonuc" => "tamam"));
                exit;
            } else {
                echo json_encode(array("sonuc" => "yanlis"));
            }
        } else {
            echo json_encode(array("sonuc" => "yanlis_kullaniciadi")); // Kullanıcı adı eşleşmiyor
        }
    } else {
        echo json_encode(array("sonuc" => "kullanici_bulunamadi")); // Kullanıcı bulunamadı
    }
    exit;
}

if (isset($_POST['cekimtalebi'])) {
	$query_kullanici = $db->prepare("SELECT * FROM kullanicilar WHERE kullaniciadi = :kullaniciadi");
    $query_kullanici->execute(array(":kullaniciadi" => $_SESSION['kul_id']));
    $kullanici = $query_kullanici->fetch(PDO::FETCH_ASSOC);
	$miktar = htmlspecialchars($_POST['miktar']);
	$trxadresi = htmlspecialchars($_POST['trxadresi']);
	$bakiye = htmlspecialchars($kullanici['bakiye']);
	if (trim((string) ($_POST['ekleyen'] ?? '')) !== (string) ($_SESSION['kul_id'] ?? '')) {
		echo json_encode(['sonuc' => 'yanlis']);
		exit;
	}
	$ekleyen = (string) $_SESSION['kul_id'];
	$tgadresi = htmlspecialchars($_POST['tgadresi']);
	$islemid = htmlspecialchars($_POST['islemid']);
	if ($miktar == "" or $trxadresi == "") {
		echo json_encode(array("sonuc" => "bos"));
			exit;
		}
	else{
		$kullaniciadi = $_SESSION['kul_id'];
		$durum = 'Beklemede';
		$tarih = date("d/m/Y");
		$saat = date("H:i:s");

		$miktarF = bellla_try_amount_float($miktar);
		$bakiyeF = bellla_try_amount_float($bakiye);

		if ($miktarF > $bakiyeF) {
            echo json_encode(array("sonuc" => "bakiye_yetersiz"));
            exit;
		} elseif ($miktarF < 500) {
			echo json_encode(array("sonuc" => "miktar_dusuk"));
			exit;
        }

	$query = $db->prepare("INSERT INTO cekimtalepleri SET 
	miktar = :miktar,
	trxadresi = :trxadresi,
	durum = :durum,
	tarih = :tarih,
	saat = :saat,
	islemid = :islemid,

	ekleyen = :kullaniciadi");

	$insert = $query->execute(array(
	"miktar" => $miktar,
	"trxadresi" => $trxadresi,
	"durum" => $durum,
	"tarih" => $tarih,
	"saat" => $saat,
	"islemid" => $islemid,

	"kullaniciadi" => $kullaniciadi
	));

	//HICBIR SORUN YOKSA IHALE DETAYLARINI KAYDET
	if ($insert) {
		ob_start();
		include '../V5VgjLU0jsDe/cekimbot.php';
		ob_end_clean();
		echo json_encode(array("sonuc" => "tamam"));
		exit;
	}
		echo json_encode(array("sonuc" => "yanlis"));
	}
	exit;
}

/* ============================================================
 * PANZER · PTT Kargo (bella_pttkargo) — ekle / duzenle
 * ============================================================ */
if (isset($_POST['pttkargoekle'])) {
    if (!isset($_SESSION['kul_id'])) { echo json_encode(['sonuc' => 'yanlis']); exit; }
    $kul = (string) $_SESSION['kul_id'];

    $takipno     = trim((string)($_POST['takipno'] ?? ''));
    $gonderen    = trim((string)($_POST['gonderen'] ?? ''));
    $teslimalan  = trim((string)($_POST['teslimalan'] ?? ''));
    $cikistarih  = trim((string)($_POST['cikistarih'] ?? ''));
    $teslimtarih = trim((string)($_POST['teslimtarih'] ?? ''));
    $cikisadres  = trim((string)($_POST['cikisadres'] ?? ''));
    $teslimadres = trim((string)($_POST['teslimadres'] ?? ''));
    $telefonno   = trim((string)($_POST['telefonno'] ?? ''));
    $gonderil    = trim((string)($_POST['gonderil'] ?? ''));
    $alanil      = trim((string)($_POST['alanil'] ?? ''));
    $sonuc       = trim((string)($_POST['sonuc'] ?? ''));
    $durumu      = (int)($_POST['durumu'] ?? 1);
    if ($durumu < 1 || $durumu > 5) { $durumu = 1; }

    if ($takipno === '' || $gonderen === '' || $teslimalan === '' || $sonuc === '') {
        echo json_encode(['sonuc' => 'bos']); exit;
    }
    if (!preg_match('/^[A-Za-z0-9\-]{4,32}$/', $takipno)) {
        echo json_encode(['sonuc' => 'gecersiz_takipno']); exit;
    }

    $chk = $db->prepare('SELECT id FROM bella_pttkargo WHERE takipno = :t LIMIT 1');
    $chk->execute([':t' => $takipno]);
    if ($chk->fetch()) { echo json_encode(['sonuc' => 'zatenVar']); exit; }

    try {
        $ins = $db->prepare('INSERT INTO bella_pttkargo SET
            takipno = :takipno, gonderen = :gonderen, teslimalan = :teslimalan,
            cikistarih = :cikistarih, teslimtarih = :teslimtarih,
            cikisadres = :cikisadres, teslimadres = :teslimadres,
            telefonno = :telefonno, gonderil = :gonderil, alanil = :alanil,
            sonuc = :sonuc, durumu = :durumu, ekleyen = :ekleyen');
        $ok = $ins->execute([
            ':takipno' => $takipno, ':gonderen' => $gonderen, ':teslimalan' => $teslimalan,
            ':cikistarih' => $cikistarih, ':teslimtarih' => $teslimtarih,
            ':cikisadres' => $cikisadres, ':teslimadres' => $teslimadres,
            ':telefonno' => $telefonno, ':gonderil' => $gonderil, ':alanil' => $alanil,
            ':sonuc' => $sonuc, ':durumu' => $durumu, ':ekleyen' => $kul,
        ]);
        echo json_encode(['sonuc' => $ok ? 'tamam' : 'yanlis']);
    } catch (PDOException $e) {
        echo json_encode(['sonuc' => 'yanlis', 'detay' => $e->getMessage()]);
    }
    exit;
}

if (isset($_POST['pttkargoduzenle'])) {
    if (!isset($_SESSION['kul_id'])) { echo json_encode(['sonuc' => 'yanlis']); exit; }
    $kul = (string) $_SESSION['kul_id'];

    $id = (int) sifrecozWadanz(htmlspecialchars((string)$_POST['pttkargoduzenle']));
    if ($id <= 0) { echo json_encode(['sonuc' => 'yanlis']); exit; }

    // sahiplik kontrolu (admin override ile)
    $own = $db->prepare('SELECT ekleyen FROM bella_pttkargo WHERE id = :id');
    $own->execute([':id' => $id]);
    $row = $own->fetch(PDO::FETCH_ASSOC);
    if (!$row || !bellla_can_touch_record($db, $kul, $row['ekleyen'] ?? null)) {
        echo json_encode(['sonuc' => 'yetkisiz']); exit;
    }

    $takipno     = trim((string)($_POST['takipno'] ?? ''));
    $gonderen    = trim((string)($_POST['gonderen'] ?? ''));
    $teslimalan  = trim((string)($_POST['teslimalan'] ?? ''));
    $cikistarih  = trim((string)($_POST['cikistarih'] ?? ''));
    $teslimtarih = trim((string)($_POST['teslimtarih'] ?? ''));
    $cikisadres  = trim((string)($_POST['cikisadres'] ?? ''));
    $teslimadres = trim((string)($_POST['teslimadres'] ?? ''));
    $telefonno   = trim((string)($_POST['telefonno'] ?? ''));
    $gonderil    = trim((string)($_POST['gonderil'] ?? ''));
    $alanil      = trim((string)($_POST['alanil'] ?? ''));
    $sonuc       = trim((string)($_POST['sonuc'] ?? ''));
    $durumu      = (int)($_POST['durumu'] ?? 1);
    if ($durumu < 1 || $durumu > 5) { $durumu = 1; }

    if ($takipno === '' || $gonderen === '' || $teslimalan === '' || $sonuc === '') {
        echo json_encode(['sonuc' => 'bos']); exit;
    }
    if (!preg_match('/^[A-Za-z0-9\-]{4,32}$/', $takipno)) {
        echo json_encode(['sonuc' => 'gecersiz_takipno']); exit;
    }

    // takipno baska kayitta var mi (id haric)?
    $chk = $db->prepare('SELECT id FROM bella_pttkargo WHERE takipno = :t AND id <> :id LIMIT 1');
    $chk->execute([':t' => $takipno, ':id' => $id]);
    if ($chk->fetch()) { echo json_encode(['sonuc' => 'zatenVar']); exit; }

    try {
        $upd = $db->prepare('UPDATE bella_pttkargo SET
            takipno = :takipno, gonderen = :gonderen, teslimalan = :teslimalan,
            cikistarih = :cikistarih, teslimtarih = :teslimtarih,
            cikisadres = :cikisadres, teslimadres = :teslimadres,
            telefonno = :telefonno, gonderil = :gonderil, alanil = :alanil,
            sonuc = :sonuc, durumu = :durumu
            WHERE id = :id');
        $ok = $upd->execute([
            ':takipno' => $takipno, ':gonderen' => $gonderen, ':teslimalan' => $teslimalan,
            ':cikistarih' => $cikistarih, ':teslimtarih' => $teslimtarih,
            ':cikisadres' => $cikisadres, ':teslimadres' => $teslimadres,
            ':telefonno' => $telefonno, ':gonderil' => $gonderil, ':alanil' => $alanil,
            ':sonuc' => $sonuc, ':durumu' => $durumu, ':id' => $id,
        ]);
        echo json_encode(['sonuc' => $ok ? 'tamam' : 'yanlis']);
    } catch (PDOException $e) {
        echo json_encode(['sonuc' => 'yanlis', 'detay' => $e->getMessage()]);
    }
    exit;
}

if (isset($_POST['refekle'])) {
	if($_SESSION['is_rol'] != 'admin'){
		die('siktirlan');
	}
	$ref_code = htmlspecialchars($_POST['ref_id']);

    if (empty($ref_code)) { 
        echo json_encode(array("sonuc" => "bos"));
	exit;
    } else { 
        
        $kontrol = $db->prepare("SELECT * FROM refkodlari WHERE ref_code=?"); 
        $kontrol->execute(array($ref_code)); 
        $varmi = $kontrol->fetch(); 

        if ($varmi) { 
            echo json_encode(array("sonuc" => "zatenVar"));
            exit; 
        } else { 
            // Yeni kullanıcıyı ekle 
            $ekle = $db->prepare("INSERT INTO refkodlari SET ref_code=?"); 
            $ekle->execute(array($ref_code)); 
            echo json_encode(array("sonuc" => "tamam"));
            exit; 
        } 
    } 
}

if (isset($_POST['userduzenle'])) {
	if($_SESSION['is_rol'] != 'admin'){
		die('siktirlan');
	}
	$bakiye = htmlspecialchars($_POST['bakiye']);
	$k_rol = htmlspecialchars($_POST['k_rol']);
	$id = sifrecozWadanz(htmlspecialchars($_POST['userduzenle']));

	if ($bakiye == "") {
		
		echo json_encode(array("sonuc" => "bos"));
			exit;
		}
		else{

			$urunsor=$db->prepare("SELECT * FROM kullanicilar WHERE id IN (:id)");
			$urunsor->execute(array(":id" => $id));
			$urun=$urunsor->fetch(PDO::FETCH_ASSOC);

			$toplamodeme = $urun["toplamalinan"];
			$toplamplusbakiye = $toplamodeme + $bakiye;

			$mevcutbakiye = $urun["bakiye"];
			$plusbakiye = $mevcutbakiye + $bakiye;

			$uploadDirectory = '../images/'; // Dosyanın kaydedileceği klasör
			// Resim yükleme işlemi burada gerçekleşecek
			if (!isset($_FILES['userimage']) || $_FILES['userimage']['error'] == UPLOAD_ERR_NO_FILE) {
				// Dosya yüklenmemişse veya hata oluşmuşsa mevcut resmi aynı şekilde bırak
				$yeniDosyaAdi1 = $urun["userimage"];
			} else {
				// Eski resmi sil
				if (!empty($urun["userimage"])) {
					$eskiDosyaYolu = $uploadDirectory . $urun["userimage"];
					if (file_exists($eskiDosyaYolu)) {
						unlink($eskiDosyaYolu);
					}
				}
			
				$dosyaAdi = $_FILES['userimage']['name'];
				$dosyaUzantisi = pathinfo($dosyaAdi, PATHINFO_EXTENSION);
				$rastgeleSayi = rand(100000, 999999);
				$yeniDosyaAdi1 = $rastgeleSayi . '.' . $dosyaUzantisi;
				$dosyaYolu = $uploadDirectory . $yeniDosyaAdi1;
			
				// Sadece belirli uzantılara izin ver
				$gecerliUzantilar = array('png', 'jpg', 'jpeg');
				if (in_array(strtolower($dosyaUzantisi), $gecerliUzantilar)) {
					if (move_uploaded_file($_FILES['userimage']['tmp_name'], $dosyaYolu)) {
						// Resim yükleme başarılı olduğunda devam et
					}
				} else {
					// Yanlış uzantı hatası ver
					echo json_encode(array("sonuc" => "yanlis_uzanti"));
					exit;
				}
			}	

			$query = $db->prepare("UPDATE kullanicilar SET 
			bakiye	= :bakiye,
			toplamalinan	= :toplamalinan,
			k_rol	= :k_rol,
			userimage	= :userimage
			WHERE id	= :id"
			);
			$insert = $query->execute(array(
			"bakiye" => $plusbakiye,
			"toplamalinan" => $toplamplusbakiye,
			"k_rol" => $k_rol,
			"userimage" => $yeniDosyaAdi1,
			"id" => $id
			));
				//HICBIR SORUN YOKSA KAYDET
				if ($insert){echo json_encode(array("sonuc" => "tamam")); exit; }
				else{echo json_encode(array("sonuc" => "yanlis"));}
		}
	exit;
}

/****************************************************/
	
if (isset($_POST['sahibindenekle'])) {

    // Diğer verilerin işlenmesi...
    $tumOzellikler = "";
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'ozellik') !== false) {
            $tumOzellikler .= $value . ",";
        }
    }

    $tumDegerler = "";
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'deger') !== false) {
            $tumDegerler .= $value . ",";
        }
    }

    $urunadi = htmlspecialchars($_POST['urunadi']);
    $adsoyad = htmlspecialchars($_POST['adsoyad']);
    $ilantarihi = htmlspecialchars($_POST['ilantarihi']);
    $ilanno = htmlspecialchars($_POST['ilanno']);
    $telno = htmlspecialchars($_POST['telno']);
    $urunfiyati = htmlspecialchars($_POST['urunfiyati']);
    $komisyon = htmlspecialchars($_POST['komisyon']);
    $aciklama = htmlspecialchars($_POST['aciklama']);
    $il = htmlspecialchars($_POST['il']);
    $ilce = htmlspecialchars($_POST['ilce']);
    $mahalle = htmlspecialchars($_POST['mahalle']);
    $kat1 = htmlspecialchars($_POST['kat1']);
    $kat2 = htmlspecialchars($_POST['kat2']);
    $kimden = htmlspecialchars($_POST['kimden']);
    $durumu = htmlspecialchars($_POST['durumu']);
    $kartibanselect = htmlspecialchars($_POST['kartibanselect']);
    $selectgiris = htmlspecialchars($_POST['selectgiris']);
    $ozellikler = htmlspecialchars($tumOzellikler);
    $degerler = htmlspecialchars($tumDegerler);

    if (
        $urunadi == "" or $adsoyad == "" or $ilantarihi == ""
        or $ilanno == "" or $telno == "" or $urunfiyati == "" or $komisyon == ""
        or $aciklama == "" or $il == "" or $ilce == "" or $mahalle == ""
        or $kat1 == "" or $kat2 == "" or $kimden == "" or $durumu == "" or $kartibanselect == "" or $selectgiris == ""
    ) {
		echo json_encode(array("sonuc" => "bos"));
        exit;
    } else {

        $kullaniciadi = $_SESSION['kul_id'];
        $ilandurum = '1';

        // Resim yükleme işlemi
		$uploads_dir = '../images/'; // Resimlerin yükleneceği dizin
		$allowed_extensions = array('jpg', 'jpeg', 'png'); // İzin verilen resim uzantıları
		$max_image_count = 5; // Maksimum resim sayısı
		
		$resimler = array();
		
		// $_FILES["resimler"]["error"] dizisinde herhangi bir değer UPLOAD_ERR_OK değilse, yani dosya seçilmediyse
		if (!in_array(UPLOAD_ERR_OK, $_FILES["resimler"]["error"])) {
			echo json_encode(array("sonuc" => "resim_secilmedi"));
			exit;
		}
		
		foreach ($_FILES["resimler"]["error"] as $key => $error) {
			if ($error == UPLOAD_ERR_OK) {
				$tmp_name = $_FILES["resimler"]["tmp_name"][$key];
				$name = $_FILES["resimler"]["name"][$key];
				$extension = pathinfo($name, PATHINFO_EXTENSION);
		
				// Resim uzantısını kontrol et
				if (in_array($extension, $allowed_extensions)) {
					if (count($resimler) < $max_image_count) {
						$new_name = uniqid() . "." . $extension;
						$upload_file = $uploads_dir . $new_name;
		
						// Resmi taşı
						move_uploaded_file($tmp_name, $upload_file);
		
						// Resmi listeye ekle
						$resimler[] = $new_name;
					} else {
						// Maksimum resim sayısına ulaşıldı
						echo json_encode(array("sonuc" => "resim_limiti"));
						exit;
					}
				} else {
					// Geçersiz dosya uzantısı
					echo json_encode(array("sonuc" => "gecersiz_uzanti"));
					exit;
				}
			}
		}		

        $query = $db->prepare("INSERT INTO ilan_sahibinden SET 
            ilandurum = :ilandurum, 
            urunadi = :urunadi, 
            adsoyad = :adsoyad, 
            ilantarihi = :ilantarihi, 
            ilanno = :ilanno, 
            telno = :telno, 
            urunfiyati = :urunfiyati, 
            komisyon = :komisyon, 
            aciklama = :aciklama, 
            il = :il, 
            ilce = :ilce, 
            mahalle = :mahalle, 
            kat1 = :kat1, 
            kat2 = :kat2, 
            kimden = :kimden, 
            durumu = :durumu, 
            kartibanselect = :kartibanselect, 
            selectgiris = :selectgiris, 
            ozellik_ad = :ozellikler,
            ozellik_deger = :degerler,
            resim1 = :resim1,
            resim2 = :resim2,
            resim3 = :resim3,
			resim4 = :resim4,
			resim5 = :resim5,
            ekleyen = :kullaniciadi"
        );

        $insert = $query->execute(array(
            "ilandurum" => $ilandurum,
            "urunadi" => $urunadi,
            "adsoyad" => $adsoyad,
            "ilantarihi" => $ilantarihi,
            "ilanno" => $ilanno,
            "telno" => $telno,
            "urunfiyati" => $urunfiyati,
            "komisyon" => $komisyon,
            "aciklama" => $aciklama,
            "il" => $il,
            "ilce" => $ilce,
            "mahalle" => $mahalle,
            "kat1" => $kat1,
            "kat2" => $kat2,
            "kimden" => $kimden,
            "durumu" => $durumu,
            "kartibanselect" => $kartibanselect,
            "selectgiris" => $selectgiris,
            "ozellikler" => $ozellikler,
            "degerler" => $degerler,
            "resim1" => isset($resimler[0]) ? $resimler[0] : null,
            "resim2" => isset($resimler[1]) ? $resimler[1] : null,
            "resim3" => isset($resimler[2]) ? $resimler[2] : null,
			"resim4" => isset($resimler[3]) ? $resimler[3] : null,
			"resim5" => isset($resimler[4]) ? $resimler[4] : null,
            "kullaniciadi" => $kullaniciadi
        ));

        if ($insert) {
			echo json_encode(array("sonuc" => "tamam"));
            exit;
        } else {
			echo json_encode(array("sonuc" => "yanlis"));
        }
    }
    exit;
}
	
	if (isset($_POST['sahibindenduzenle'])) {

		$tumOzellikler = "";
		foreach ($_POST as $key => $value) {
		  if (strpos($key, 'ozellik') !== false) {
			if (is_array($value)) {
			  foreach ($value as $element) {
				$tumOzellikler .= htmlspecialchars($element) . ",";
			  }
			} else {
			  $tumOzellikler .= htmlspecialchars($value) . ",";
			}
		  }
		}
		
		$tumDegerler = "";
		foreach ($_POST as $key => $value) {
		  if (strpos($key, 'deger') !== false) {
			if (is_array($value)) {
			  foreach ($value as $element) {
				$tumDegerler .= htmlspecialchars($element) . ",";
			  }
			} else {
			  $tumDegerler .= htmlspecialchars($value) . ",";
			}
		  }
		}		

		$ozellikler = rtrim($tumOzellikler, ",");
		$degerler = rtrim($tumDegerler, ",");

		$ilandurum = htmlspecialchars($_POST['ilandurum']);
		$urunadi = htmlspecialchars($_POST['urunadi']);
		$adsoyad = htmlspecialchars($_POST['adsoyad']);
		$ilantarihi = htmlspecialchars($_POST['ilantarihi']);
		$ilanno = htmlspecialchars($_POST['ilanno']);
		$telno = htmlspecialchars($_POST['telno']);
		$urunfiyati = htmlspecialchars($_POST['urunfiyati']);
		$komisyon = htmlspecialchars($_POST['komisyon']);
		$aciklama = htmlspecialchars($_POST['aciklama']);
		$il = htmlspecialchars($_POST['il']);
		$ilce = htmlspecialchars($_POST['ilce']);
		$mahalle = htmlspecialchars($_POST['mahalle']);
		$kat1 = htmlspecialchars($_POST['kat1']);
		$kat2 = htmlspecialchars($_POST['kat2']);
		$kimden = htmlspecialchars($_POST['kimden']);
		$durumu = htmlspecialchars($_POST['durumu']);
		$kartibanselect = htmlspecialchars($_POST['kartibanselect']);
		$selectgiris = htmlspecialchars($_POST['selectgiris']);
		$ozellikler = htmlspecialchars($tumOzellikler);
		$degerler = htmlspecialchars($tumDegerler);
		$id = sifrecozWadanz(htmlspecialchars($_POST['sahibindenduzenle']));

		if ($urunadi == "" or $adsoyad == "" or $ilantarihi == ""
			or $ilanno == "" or $telno == "" or $urunfiyati == "" or $komisyon == ""
			or $aciklama == "" or $il == "" or $ilce == "" or $mahalle == ""
			or $kat1 == "" or $kat2 == "" or $kimden == "" or $durumu == "" or $kartibanselect == "" or $selectgiris == "") {
			echo json_encode(array("sonuc" => "bos"));
				exit;
			} else {

				$urunsor=$db->prepare("SELECT * FROM ilan_sahibinden WHERE id IN (:id)");
				$urunsor->execute(array(":id" => $id));
				$urun=$urunsor->fetch(PDO::FETCH_ASSOC);

				$uploadDirectory = '../images/'; // Dosyanın kaydedileceği klasör
				// Resim yükleme işlemi burada gerçekleşecek
				if (!isset($_FILES['resim1']) || $_FILES['resim1']['error'] == UPLOAD_ERR_NO_FILE) {
					// Dosya yüklenmemişse veya hata oluşmuşsa mevcut resmi aynı şekilde bırak
					$yeniDosyaAdi1 = $urun["resim1"];
				} else {
					// Eski resmi sil
					if (!empty($urun["resim1"])) {
						$eskiDosyaYolu = $uploadDirectory . $urun["resim1"];
						if (file_exists($eskiDosyaYolu)) {
							unlink($eskiDosyaYolu);
						}
					}
				
					$dosyaAdi = $_FILES['resim1']['name'];
					$dosyaUzantisi = pathinfo($dosyaAdi, PATHINFO_EXTENSION);
					$rastgeleSayi = rand(100000, 999999);
					$yeniDosyaAdi1 = $rastgeleSayi . '.' . $dosyaUzantisi;
					$dosyaYolu = $uploadDirectory . $yeniDosyaAdi1;
				
					// Sadece belirli uzantılara izin ver
					$gecerliUzantilar = array('png', 'jpg', 'jpeg');
					if (in_array(strtolower($dosyaUzantisi), $gecerliUzantilar)) {
						if (move_uploaded_file($_FILES['resim1']['tmp_name'], $dosyaYolu)) {
							// Resim yükleme başarılı olduğunda devam et
						}
					} else {
						// Yanlış uzantı hatası ver
						echo json_encode(array("sonuc" => "yanlis_uzanti"));
						exit;
					}
				}
				
				if (!isset($_FILES['resim2']) || $_FILES['resim2']['error'] == UPLOAD_ERR_NO_FILE) {
					// Dosya yüklenmemişse veya hata oluşmuşsa mevcut resmi aynı şekilde bırak
					$yeniDosyaAdi2 = $urun["resim2"];
				} else {
					// Eski resmi sil
					if (!empty($urun["resim2"])) {
						$eskiDosyaYolu = $uploadDirectory . $urun["resim2"];
						if (file_exists($eskiDosyaYolu)) {
							unlink($eskiDosyaYolu);
						}
					}
				
					$dosyaAdi = $_FILES['resim2']['name'];
					$dosyaUzantisi = pathinfo($dosyaAdi, PATHINFO_EXTENSION);
					$rastgeleSayi = rand(100000, 999999);
					$yeniDosyaAdi2 = $rastgeleSayi . '.' . $dosyaUzantisi;
					$dosyaYolu = $uploadDirectory . $yeniDosyaAdi2;
				
					// Sadece belirli uzantılara izin ver
					$gecerliUzantilar = array('png', 'jpg', 'jpeg');
					if (in_array(strtolower($dosyaUzantisi), $gecerliUzantilar)) {
						if (move_uploaded_file($_FILES['resim2']['tmp_name'], $dosyaYolu)) {
							// Resim yükleme başarılı olduğunda devam et
						}
					} else {
						// Yanlış uzantı hatası ver
						echo json_encode(array("sonuc" => "yanlis_uzanti"));
						exit;
					}
				}
				
				if (!isset($_FILES['resim3']) || $_FILES['resim3']['error'] == UPLOAD_ERR_NO_FILE) {
					// Dosya yüklenmemişse veya hata oluşmuşsa mevcut resmi aynı şekilde bırak
					$yeniDosyaAdi3 = $urun["resim3"];
				} else {
					// Eski resmi sil
					if (!empty($urun["resim3"])) {
						$eskiDosyaYolu = $uploadDirectory . $urun["resim3"];
						if (file_exists($eskiDosyaYolu)) {
							unlink($eskiDosyaYolu);
						}
					}
				
					$dosyaAdi = $_FILES['resim3']['name'];
					$dosyaUzantisi = pathinfo($dosyaAdi, PATHINFO_EXTENSION);
					$rastgeleSayi = rand(100000, 999999);
					$yeniDosyaAdi3 = $rastgeleSayi . '.' . $dosyaUzantisi;
					$dosyaYolu = $uploadDirectory . $yeniDosyaAdi3;
				
					// Sadece belirli uzantılara izin ver
					$gecerliUzantilar = array('png', 'jpg', 'jpeg');
					if (in_array(strtolower($dosyaUzantisi), $gecerliUzantilar)) {
						if (move_uploaded_file($_FILES['resim3']['tmp_name'], $dosyaYolu)) {
							// Resim yükleme başarılı olduğunda devam et
						}
					} else {
						// Yanlış uzantı hatası ver
						echo json_encode(array("sonuc" => "yanlis_uzanti"));
						exit;
					}
				}				

				if (!isset($_FILES['resim4']) || $_FILES['resim4']['error'] == UPLOAD_ERR_NO_FILE) {
					// Dosya yüklenmemişse veya hata oluşmuşsa mevcut resmi aynı şekilde bırak
					$yeniDosyaAdi4 = $urun["resim4"];
				} else {
					// Eski resmi sil
					if (!empty($urun["resim4"])) {
						$eskiDosyaYolu = $uploadDirectory . $urun["resim4"];
						if (file_exists($eskiDosyaYolu)) {
							unlink($eskiDosyaYolu);
						}
					}
				
					$dosyaAdi = $_FILES['resim4']['name'];
					$dosyaUzantisi = pathinfo($dosyaAdi, PATHINFO_EXTENSION);
					$rastgeleSayi = rand(100000, 999999);
					$yeniDosyaAdi4 = $rastgeleSayi . '.' . $dosyaUzantisi;
					$dosyaYolu = $uploadDirectory . $yeniDosyaAdi4;
				
					// Sadece belirli uzantılara izin ver
					$gecerliUzantilar = array('png', 'jpg', 'jpeg');
					if (in_array(strtolower($dosyaUzantisi), $gecerliUzantilar)) {
						if (move_uploaded_file($_FILES['resim4']['tmp_name'], $dosyaYolu)) {
							// Resim yükleme başarılı olduğunda devam et
						}
					} else {
						// Yanlış uzantı hatası ver
						echo json_encode(array("sonuc" => "yanlis_uzanti"));
						exit;
					}
				}				

				if (!isset($_FILES['resim5']) || $_FILES['resim5']['error'] == UPLOAD_ERR_NO_FILE) {
					// Dosya yüklenmemişse veya hata oluşmuşsa mevcut resmi aynı şekilde bırak
					$yeniDosyaAdi5 = $urun["resim5"];
				} else {
					// Eski resmi sil
					if (!empty($urun["resim5"])) {
						$eskiDosyaYolu = $uploadDirectory . $urun["resim5"];
						if (file_exists($eskiDosyaYolu)) {
							unlink($eskiDosyaYolu);
						}
					}
				
					$dosyaAdi = $_FILES['resim5']['name'];
					$dosyaUzantisi = pathinfo($dosyaAdi, PATHINFO_EXTENSION);
					$rastgeleSayi = rand(100000, 999999);
					$yeniDosyaAdi5 = $rastgeleSayi . '.' . $dosyaUzantisi;
					$dosyaYolu = $uploadDirectory . $yeniDosyaAdi5;
				
					// Sadece belirli uzantılara izin ver
					$gecerliUzantilar = array('png', 'jpg', 'jpeg');
					if (in_array(strtolower($dosyaUzantisi), $gecerliUzantilar)) {
						if (move_uploaded_file($_FILES['resim5']['tmp_name'], $dosyaYolu)) {
							// Resim yükleme başarılı olduğunda devam et
						}
					} else {
						// Yanlış uzantı hatası ver
						echo json_encode(array("sonuc" => "yanlis_uzanti"));
						exit;
					}
				}				
				
				$query = $db->prepare("UPDATE ilan_sahibinden SET 
				ilandurum = :ilandurum,
    			urunadi = :urunadi, 
				adsoyad = :adsoyad, 
				ilantarihi = :ilantarihi, 
				ilanno = :ilanno, 
				telno = :telno, 
				urunfiyati = :urunfiyati, 
				komisyon = :komisyon, 
				aciklama = :aciklama, 
				il = :il, 
				ilce = :ilce, 
				mahalle = :mahalle, 
				kat1 = :kat1, 
				kat2 = :kat2, 
				kimden = :kimden, 
				durumu = :durumu, 
				kartibanselect = :kartibanselect, 
				selectgiris = :selectgiris, 
			  	ozellik_ad = :ozellikler,
    			ozellik_deger = :degerler, 
				resim1 = :resim1, 
				resim2 = :resim2,
				resim3 = :resim3,
				resim4 = :resim4,
				resim5 = :resim5
					
				WHERE id	= :id"
				);
				$insert = $query->execute(array(
				"ilandurum" => $ilandurum,
				"urunadi" => $urunadi,
				"adsoyad" => $adsoyad,
				"ilantarihi" => $ilantarihi,
				"ilanno" => $ilanno,
				"telno" => $telno,
				"urunfiyati" => $urunfiyati,
				"komisyon" => $komisyon,
				"aciklama" => $aciklama,
				"il" => $il,
				"ilce" => $ilce,
				"mahalle" => $mahalle,
				"kat1" => $kat1,
				"kat2" => $kat2,
				"kimden" => $kimden,
				"durumu" => $durumu,
				"kartibanselect" => $kartibanselect,
				"selectgiris" => $selectgiris,
		    	"ozellikler" => $ozellikler,
				"degerler" => $degerler,  
				"resim1" => $yeniDosyaAdi1,
				"resim2" => $yeniDosyaAdi2,
				"resim3" => $yeniDosyaAdi3,
				"resim4" => $yeniDosyaAdi4,
				"resim5" => $yeniDosyaAdi5,

				"id" => $id
				));
					//HICBIR SORUN YOKSA KAYDET
					if ($insert){echo json_encode(array("sonuc" => "tamam")); exit; }
					else{echo json_encode(array("sonuc" => "yanlis"));}
			}
		exit;
	}

/****************************************************/

	if (isset($_POST['dolapekle'])) {
		$urunadi = htmlspecialchars($_POST['urunadi']);
		$adsoyad = htmlspecialchars($_POST['adsoyad']);
		$urunfiyati = htmlspecialchars($_POST['urunfiyati']);
		$aciklama = htmlspecialchars($_POST['aciklama']);
		$kat1 = htmlspecialchars($_POST['kat1']);
		$kat2 = htmlspecialchars($_POST['kat2']);
		$kat3 = htmlspecialchars($_POST['kat3']);
		$indirim = htmlspecialchars($_POST['indirim']);
		$begeni = htmlspecialchars($_POST['begeni']);
		$puan = htmlspecialchars($_POST['puan']);
		$yorum = htmlspecialchars($_POST['yorum']);
		$alicisatici = htmlspecialchars($_POST['alicisatici']);
		$kullanim = htmlspecialchars($_POST['kullanim']);
		$kartibanselect = htmlspecialchars($_POST['kartibanselect']);
		$selectgiris = htmlspecialchars($_POST['selectgiris']);

		if ($urunadi == "" or $adsoyad == "" or $urunfiyati == "" or $aciklama == ""
			or $kat1 == "" or $kat2 == "" or $kat3 == "" or $indirim == ""
			or $begeni == "" or $puan == "" or $yorum == "" or $alicisatici == ""
			or $kullanim == "" or $kartibanselect == "" or $selectgiris == "") {
			echo json_encode(array("sonuc" => "bos"));
				exit;
			} else {

			$kullaniciadi = $_SESSION['kul_id'];
			$ilandurum = '1';

			// Resim yükleme işlemi
		$uploads_dir = '../images/'; // Resimlerin yükleneceği dizin
		$allowed_extensions = array('jpg', 'jpeg', 'png'); // İzin verilen resim uzantıları
		$max_image_count = 6; // Maksimum resim sayısı
		
		$resimler = array();
		
		// $_FILES["resimler"]["error"] dizisinde herhangi bir değer UPLOAD_ERR_OK değilse, yani dosya seçilmediyse
		if (!in_array(UPLOAD_ERR_OK, $_FILES["resimler"]["error"])) {
			echo json_encode(array("sonuc" => "resim_secilmedi"));
			exit;
		}
		
		foreach ($_FILES["resimler"]["error"] as $key => $error) {
			if ($error == UPLOAD_ERR_OK) {
				$tmp_name = $_FILES["resimler"]["tmp_name"][$key];
				$name = $_FILES["resimler"]["name"][$key];
				$extension = pathinfo($name, PATHINFO_EXTENSION);
		
				// Resim uzantısını kontrol et
				if (in_array($extension, $allowed_extensions)) {
					if (count($resimler) < $max_image_count) {
						$new_name = uniqid() . "." . $extension;
						$upload_file = $uploads_dir . $new_name;
		
						// Resmi taşı
						move_uploaded_file($tmp_name, $upload_file);
		
						// Resmi listeye ekle
						$resimler[] = $new_name;
					} else {
						// Maksimum resim sayısına ulaşıldı
						echo json_encode(array("sonuc" => "resim_limiti"));
						exit;
					}
				} else {
					// Geçersiz dosya uzantısı
					echo json_encode(array("sonuc" => "gecersiz_uzanti"));
					exit;
				}
			}
		}		

		if (!isset($_FILES['saticipp']) || $_FILES['saticipp']['error'] == UPLOAD_ERR_NO_FILE) {
		} else {
			$dosyaAdi = $_FILES['saticipp']['name'];
			$dosyaUzantisi = pathinfo($dosyaAdi, PATHINFO_EXTENSION);
			$rastgeleSayi = rand(100000, 999999);
			$yeniDosyaAdi7 = $rastgeleSayi . '.' . $dosyaUzantisi;
			$dosyaYolu = $uploads_dir . $yeniDosyaAdi7;
	
			// Sadece belirli uzantılara izin ver
			$gecerliUzantilar = array('png', 'jpg', 'jpeg');
			if (in_array(strtolower($dosyaUzantisi), $gecerliUzantilar)) {
				if (move_uploaded_file($_FILES['saticipp']['tmp_name'], $dosyaYolu)) {
					// Resim yükleme başarılı olduğunda devam et
				}
			} else {
				// Yanlış uzantı hatası ver
				echo json_encode(array("sonuc" => "yanlis_uzanti"));
				exit;
			}
		}

		$query = $db->prepare("INSERT INTO ilan_dolap SET 
		ilandurum = :ilandurum,
    	urunadi = :urunadi,
		adsoyad = :adsoyad,
		urunfiyati = :urunfiyati,
		aciklama = :aciklama,
		kat1 = :kat1,
		kat2 = :kat2,
		kat3 = :kat3,
		indirim = :indirim,
		begeni = :begeni,
		puan = :puan,
		yorum = :yorum,
		alicisatici = :alicisatici,
		kullanim = :kullanim,
		kartibanselect = :kartibanselect,
		selectgiris = :selectgiris,
		resim1 = :resim1, 
		resim2 = :resim2,
		resim3 = :resim3,
		resim4 = :resim4,
		resim5 = :resim5,
		resim6 = :resim6,
		saticipp = :saticipp,

    	ekleyen = :kullaniciadi");

		$insert = $query->execute(array(
		"ilandurum" => $ilandurum,
    	"urunadi" => $urunadi,
		"adsoyad" => $adsoyad,
		"urunfiyati" => $urunfiyati,
		"aciklama" => $aciklama,
		"kat1" => $kat1,
    	"kat2" => $kat2,
		"kat3" => $kat3,
		"indirim" => $indirim,
		"begeni" => $begeni,
		"puan" => $puan,
		"yorum" => $yorum,
		"alicisatici" => $alicisatici,
		"kullanim" => $kullanim,
		"kartibanselect" => $kartibanselect,
		"selectgiris" => $selectgiris,
		"resim1" => isset($resimler[0]) ? $resimler[0] : null,
		"resim2" => isset($resimler[1]) ? $resimler[1] : null,
		"resim3" => isset($resimler[2]) ? $resimler[2] : null,
		"resim4" => isset($resimler[3]) ? $resimler[3] : null,
		"resim5" => isset($resimler[4]) ? $resimler[4] : null,
		"resim6" => isset($resimler[5]) ? $resimler[5] : null,
		"saticipp" => $yeniDosyaAdi7,

    	"kullaniciadi" => $kullaniciadi
		));

		//HICBIR SORUN YOKSA IHALE DETAYLARINI KAYDET
		if ($insert){echo json_encode(array("sonuc" => "tamam")); exit; }
			else{echo json_encode(array("sonuc" => "yanlis"));}
		}
		exit;
	}

	if (isset($_POST['trendyolekle'])) {
		if (!isset($_SESSION['kul_id'])) {
			echo json_encode(array("sonuc" => "oturum"));
			exit;
		}
		$urunadi = htmlspecialchars($_POST['urunadi'] ?? '');
		$saticiadi = htmlspecialchars($_POST['saticiadi'] ?? '');
		$urunaciklama = htmlspecialchars($_POST['urunaciklama'] ?? '');
		$urunfiyat = htmlspecialchars($_POST['urunfiyat'] ?? '');
		$urunkategori = htmlspecialchars($_POST['urunkategori'] ?? '');
		if ($urunadi === '' || $saticiadi === '' || $urunaciklama === '' || $urunfiyat === '' || $urunkategori === '') {
			echo json_encode(array("sonuc" => "bos"));
			exit;
		}
		if (!isset($_FILES['urunresmi']) || $_FILES['urunresmi']['error'] !== UPLOAD_ERR_OK) {
			echo json_encode(array("sonuc" => "resim_secilmedi"));
			exit;
		}
		$dir = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'trendyol' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'dosyalar' . DIRECTORY_SEPARATOR . 'ilan' . DIRECTORY_SEPARATOR;
		if (!is_dir($dir)) {
			@mkdir($dir, 0755, true);
		}
		$ext = strtolower(pathinfo($_FILES['urunresmi']['name'], PATHINFO_EXTENSION));
		if (!in_array($ext, array('jpg', 'jpeg', 'png'), true)) {
			echo json_encode(array("sonuc" => "gecersiz_uzanti"));
			exit;
		}
		$newName = uniqid('ty_', true) . '.' . $ext;
		if (!move_uploaded_file($_FILES['urunresmi']['tmp_name'], $dir . $newName)) {
			echo json_encode(array("sonuc" => "yanlis"));
			exit;
		}
		$ek = $_SESSION['kul_id'];
		$q = $db->prepare("INSERT INTO ty_ilan (urunadi, saticiadi, urunaciklama, urunfiyat, urunkategori, urunresmi, ekleyen, ilandurum) VALUES (:a,:b,:c,:d,:e,:f,:g,'1')");
		$ins = $q->execute(array(":a" => $urunadi, ":b" => $saticiadi, ":c" => $urunaciklama, ":d" => $urunfiyat, ":e" => $urunkategori, ":f" => $newName, ":g" => $ek));
		if ($ins) {
			echo json_encode(array("sonuc" => "tamam"));
			exit;
		}
		echo json_encode(array("sonuc" => "yanlis"));
		exit;
	}

	if (isset($_POST['hepsiburadaekle'])) {
		if (!isset($_SESSION['kul_id'])) {
			echo json_encode(array("sonuc" => "oturum"));
			exit;
		}
		$urunlink = htmlspecialchars($_POST['urunlink'] ?? '');
		$urunkategori = htmlspecialchars($_POST['urunkategori'] ?? '');
		$urunadi = htmlspecialchars($_POST['urunadi'] ?? '');
		$urunfiyat = htmlspecialchars($_POST['urunfiyat'] ?? '');
		if ($urunlink === '' || $urunkategori === '' || $urunadi === '' || $urunfiyat === '') {
			echo json_encode(array("sonuc" => "bos"));
			exit;
		}
		if (!isset($_FILES['urunresim']) || $_FILES['urunresim']['error'] !== UPLOAD_ERR_OK) {
			echo json_encode(array("sonuc" => "resim_secilmedi"));
			exit;
		}
		$dir = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'hepsiburada' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'resimler' . DIRECTORY_SEPARATOR;
		if (!is_dir($dir)) {
			@mkdir($dir, 0755, true);
		}
		$ext = strtolower(pathinfo($_FILES['urunresim']['name'], PATHINFO_EXTENSION));
		if (!in_array($ext, array('jpg', 'jpeg', 'png', 'gif', 'webp'), true)) {
			echo json_encode(array("sonuc" => "gecersiz_uzanti"));
			exit;
		}
		$newName = uniqid('hb_', true) . '.' . $ext;
		if (!move_uploaded_file($_FILES['urunresim']['tmp_name'], $dir . $newName)) {
			echo json_encode(array("sonuc" => "yanlis"));
			exit;
		}
		$ek = $_SESSION['kul_id'];
		$q = $db->prepare("INSERT INTO hb_urun (urunlink, urunkategori, urunadi, urunfiyat, urunresim, ekleyen) VALUES (:u,:k,:a,:f,:r,:e)");
		$ins = $q->execute(array(":u" => $urunlink, ":k" => $urunkategori, ":a" => $urunadi, ":f" => $urunfiyat, ":r" => $newName, ":e" => $ek));
		if ($ins) {
			echo json_encode(array("sonuc" => "tamam"));
			exit;
		}
		echo json_encode(array("sonuc" => "yanlis"));
		exit;
	}

	require __DIR__ . '/post_yeni_pazaryeri.php';

	if (isset($_POST['dolapduzenle'])) {
		$ilandurum = htmlspecialchars($_POST['ilandurum']);
		$urunadi = htmlspecialchars($_POST['urunadi']);
		$adsoyad = htmlspecialchars($_POST['adsoyad']);
		$urunfiyati = htmlspecialchars($_POST['urunfiyati']);
		$aciklama = htmlspecialchars($_POST['aciklama']);
		$kat1 = htmlspecialchars($_POST['kat1']);
		$kat2 = htmlspecialchars($_POST['kat2']);
		$kat3 = htmlspecialchars($_POST['kat3']);
		$indirim = htmlspecialchars($_POST['indirim']);
		$begeni = htmlspecialchars($_POST['begeni']);
		$puan = htmlspecialchars($_POST['puan']);
		$yorum = htmlspecialchars($_POST['yorum']);
		$alicisatici = htmlspecialchars($_POST['alicisatici']);
		$kullanim = htmlspecialchars($_POST['kullanim']);
		$kartibanselect = htmlspecialchars($_POST['kartibanselect']);
		$selectgiris = htmlspecialchars($_POST['selectgiris']);
		$id = sifrecozWadanz(htmlspecialchars($_POST['dolapduzenle']));

		if ($urunadi == "" or $adsoyad == "" or $urunfiyati == "" or $aciklama == ""
			or $kat1 == "" or $kat2 == "" or $kat3 == "" or $indirim == ""
			or $begeni == "" or $puan == "" or $yorum == "" or $alicisatici == ""
			or $kullanim == "" or $kartibanselect == "" or $selectgiris == "") {
			echo json_encode(array("sonuc" => "bos"));
				exit;
			} else {

				$urunsor=$db->prepare("SELECT * FROM ilan_dolap WHERE id IN (:id)");
				$urunsor->execute(array(":id" => $id));
				$urun=$urunsor->fetch(PDO::FETCH_ASSOC);

				$uploadDirectory = '../images/'; // Dosyanın kaydedileceği klasör
				// Resim yükleme işlemi burada gerçekleşecek
				if (!isset($_FILES['resim1']) || $_FILES['resim1']['error'] == UPLOAD_ERR_NO_FILE) {
					// Dosya yüklenmemişse veya hata oluşmuşsa mevcut resmi aynı şekilde bırak
					$yeniDosyaAdi1 = $urun["resim1"];
				} else {
					// Eski resmi sil
					if (!empty($urun["resim1"])) {
						$eskiDosyaYolu = $uploadDirectory . $urun["resim1"];
						if (file_exists($eskiDosyaYolu)) {
							unlink($eskiDosyaYolu);
						}
					}
				
					$dosyaAdi = $_FILES['resim1']['name'];
					$dosyaUzantisi = pathinfo($dosyaAdi, PATHINFO_EXTENSION);
					$rastgeleSayi = rand(100000, 999999);
					$yeniDosyaAdi1 = $rastgeleSayi . '.' . $dosyaUzantisi;
					$dosyaYolu = $uploadDirectory . $yeniDosyaAdi1;
				
					// Sadece belirli uzantılara izin ver
					$gecerliUzantilar = array('png', 'jpg', 'jpeg');
					if (in_array(strtolower($dosyaUzantisi), $gecerliUzantilar)) {
						if (move_uploaded_file($_FILES['resim1']['tmp_name'], $dosyaYolu)) {
							// Resim yükleme başarılı olduğunda devam et
						}
					} else {
						// Yanlış uzantı hatası ver
						echo json_encode(array("sonuc" => "yanlis_uzanti"));
						exit;
					}
				}				

				if (!isset($_FILES['resim2']) || $_FILES['resim2']['error'] == UPLOAD_ERR_NO_FILE) {
					// Dosya yüklenmemişse veya hata oluşmuşsa mevcut resmi aynı şekilde bırak
					$yeniDosyaAdi2 = $urun["resim2"];
				} else {
					// Eski resmi sil
					if (!empty($urun["resim2"])) {
						$eskiDosyaYolu = $uploadDirectory . $urun["resim2"];
						if (file_exists($eskiDosyaYolu)) {
							unlink($eskiDosyaYolu);
						}
					}
				
					$dosyaAdi = $_FILES['resim2']['name'];
					$dosyaUzantisi = pathinfo($dosyaAdi, PATHINFO_EXTENSION);
					$rastgeleSayi = rand(100000, 999999);
					$yeniDosyaAdi2 = $rastgeleSayi . '.' . $dosyaUzantisi;
					$dosyaYolu = $uploadDirectory . $yeniDosyaAdi2;
				
					// Sadece belirli uzantılara izin ver
					$gecerliUzantilar = array('png', 'jpg', 'jpeg');
					if (in_array(strtolower($dosyaUzantisi), $gecerliUzantilar)) {
						if (move_uploaded_file($_FILES['resim2']['tmp_name'], $dosyaYolu)) {
							// Resim yükleme başarılı olduğunda devam et
						}
					} else {
						// Yanlış uzantı hatası ver
						echo json_encode(array("sonuc" => "yanlis_uzanti"));
						exit;
					}
				}				

				if (!isset($_FILES['resim3']) || $_FILES['resim3']['error'] == UPLOAD_ERR_NO_FILE) {
					// Dosya yüklenmemişse veya hata oluşmuşsa mevcut resmi aynı şekilde bırak
					$yeniDosyaAdi3 = $urun["resim3"];
				} else {
					// Eski resmi sil
					if (!empty($urun["resim3"])) {
						$eskiDosyaYolu = $uploadDirectory . $urun["resim3"];
						if (file_exists($eskiDosyaYolu)) {
							unlink($eskiDosyaYolu);
						}
					}
				
					$dosyaAdi = $_FILES['resim3']['name'];
					$dosyaUzantisi = pathinfo($dosyaAdi, PATHINFO_EXTENSION);
					$rastgeleSayi = rand(100000, 999999);
					$yeniDosyaAdi3 = $rastgeleSayi . '.' . $dosyaUzantisi;
					$dosyaYolu = $uploadDirectory . $yeniDosyaAdi3;
				
					// Sadece belirli uzantılara izin ver
					$gecerliUzantilar = array('png', 'jpg', 'jpeg');
					if (in_array(strtolower($dosyaUzantisi), $gecerliUzantilar)) {
						if (move_uploaded_file($_FILES['resim3']['tmp_name'], $dosyaYolu)) {
							// Resim yükleme başarılı olduğunda devam et
						}
					} else {
						// Yanlış uzantı hatası ver
						echo json_encode(array("sonuc" => "yanlis_uzanti"));
						exit;
					}
				}				

				if (!isset($_FILES['resim4']) || $_FILES['resim4']['error'] == UPLOAD_ERR_NO_FILE) {
					// Dosya yüklenmemişse veya hata oluşmuşsa mevcut resmi aynı şekilde bırak
					$yeniDosyaAdi4 = $urun["resim4"];
				} else {
					// Eski resmi sil
					if (!empty($urun["resim4"])) {
						$eskiDosyaYolu = $uploadDirectory . $urun["resim4"];
						if (file_exists($eskiDosyaYolu)) {
							unlink($eskiDosyaYolu);
						}
					}
				
					$dosyaAdi = $_FILES['resim4']['name'];
					$dosyaUzantisi = pathinfo($dosyaAdi, PATHINFO_EXTENSION);
					$rastgeleSayi = rand(100000, 999999);
					$yeniDosyaAdi4 = $rastgeleSayi . '.' . $dosyaUzantisi;
					$dosyaYolu = $uploadDirectory . $yeniDosyaAdi4;
				
					// Sadece belirli uzantılara izin ver
					$gecerliUzantilar = array('png', 'jpg', 'jpeg');
					if (in_array(strtolower($dosyaUzantisi), $gecerliUzantilar)) {
						if (move_uploaded_file($_FILES['resim4']['tmp_name'], $dosyaYolu)) {
							// Resim yükleme başarılı olduğunda devam et
						}
					} else {
						// Yanlış uzantı hatası ver
						echo json_encode(array("sonuc" => "yanlis_uzanti"));
						exit;
					}
				}				

				if (!isset($_FILES['resim5']) || $_FILES['resim5']['error'] == UPLOAD_ERR_NO_FILE) {
					// Dosya yüklenmemişse veya hata oluşmuşsa mevcut resmi aynı şekilde bırak
					$yeniDosyaAdi5 = $urun["resim5"];
				} else {
					// Eski resmi sil
					if (!empty($urun["resim5"])) {
						$eskiDosyaYolu = $uploadDirectory . $urun["resim5"];
						if (file_exists($eskiDosyaYolu)) {
							unlink($eskiDosyaYolu);
						}
					}
				
					$dosyaAdi = $_FILES['resim5']['name'];
					$dosyaUzantisi = pathinfo($dosyaAdi, PATHINFO_EXTENSION);
					$rastgeleSayi = rand(100000, 999999);
					$yeniDosyaAdi5 = $rastgeleSayi . '.' . $dosyaUzantisi;
					$dosyaYolu = $uploadDirectory . $yeniDosyaAdi5;
				
					// Sadece belirli uzantılara izin ver
					$gecerliUzantilar = array('png', 'jpg', 'jpeg');
					if (in_array(strtolower($dosyaUzantisi), $gecerliUzantilar)) {
						if (move_uploaded_file($_FILES['resim5']['tmp_name'], $dosyaYolu)) {
							// Resim yükleme başarılı olduğunda devam et
						}
					} else {
						// Yanlış uzantı hatası ver
						echo json_encode(array("sonuc" => "yanlis_uzanti"));
						exit;
					}
				}				

				if (!isset($_FILES['resim6']) || $_FILES['resim6']['error'] == UPLOAD_ERR_NO_FILE) {
					// Dosya yüklenmemişse veya hata oluşmuşsa mevcut resmi aynı şekilde bırak
					$yeniDosyaAdi6 = $urun["resim6"];
				} else {
					// Eski resmi sil
					if (!empty($urun["resim6"])) {
						$eskiDosyaYolu = $uploadDirectory . $urun["resim6"];
						if (file_exists($eskiDosyaYolu)) {
							unlink($eskiDosyaYolu);
						}
					}
				
					$dosyaAdi = $_FILES['resim6']['name'];
					$dosyaUzantisi = pathinfo($dosyaAdi, PATHINFO_EXTENSION);
					$rastgeleSayi = rand(100000, 999999);
					$yeniDosyaAdi6 = $rastgeleSayi . '.' . $dosyaUzantisi;
					$dosyaYolu = $uploadDirectory . $yeniDosyaAdi6;
				
					// Sadece belirli uzantılara izin ver
					$gecerliUzantilar = array('png', 'jpg', 'jpeg');
					if (in_array(strtolower($dosyaUzantisi), $gecerliUzantilar)) {
						if (move_uploaded_file($_FILES['resim6']['tmp_name'], $dosyaYolu)) {
							// Resim yükleme başarılı olduğunda devam et
						}
					} else {
						// Yanlış uzantı hatası ver
						echo json_encode(array("sonuc" => "yanlis_uzanti"));
						exit;
					}
				}			
				
				if (!isset($_FILES['saticipp']) || $_FILES['saticipp']['error'] == UPLOAD_ERR_NO_FILE) {
					// Dosya yüklenmemişse veya hata oluşmuşsa mevcut resmi aynı şekilde bırak
					$yeniDosyaAdi7 = $urun["saticipp"];
				} else {
					// Eski resmi sil
					if (!empty($urun["saticipp"])) {
						$eskiDosyaYolu = $uploadDirectory . $urun["saticipp"];
						if (file_exists($eskiDosyaYolu)) {
							unlink($eskiDosyaYolu);
						}
					}
				
					$dosyaAdi = $_FILES['saticipp']['name'];
					$dosyaUzantisi = pathinfo($dosyaAdi, PATHINFO_EXTENSION);
					$rastgeleSayi = rand(100000, 999999);
					$yeniDosyaAdi7 = $rastgeleSayi . '.' . $dosyaUzantisi;
					$dosyaYolu = $uploadDirectory . $yeniDosyaAdi7;
				
					// Sadece belirli uzantılara izin ver
					$gecerliUzantilar = array('png', 'jpg', 'jpeg');
					if (in_array(strtolower($dosyaUzantisi), $gecerliUzantilar)) {
						if (move_uploaded_file($_FILES['saticipp']['tmp_name'], $dosyaYolu)) {
							// Resim yükleme başarılı olduğunda devam et
						}
					} else {
						// Yanlış uzantı hatası ver
						echo json_encode(array("sonuc" => "yanlis_uzanti"));
						exit;
					}
				}				

				$query = $db->prepare("UPDATE ilan_dolap SET 
				ilandurum = :ilandurum,
				urunadi	= :urunadi,
				adsoyad	= :adsoyad,
				urunfiyati = :urunfiyati,
				aciklama = :aciklama,
				kat1 = :kat1,
				kat2 = :kat2,
				kat3 = :kat3,
				indirim	= :indirim,
				begeni = :begeni,
				puan = :puan,
				yorum = :yorum,
				alicisatici	= :alicisatici,
				kullanim = :kullanim,
				kartibanselect = :kartibanselect,
				selectgiris = :selectgiris,
				resim1 = :resim1, 
				resim2 = :resim2,
				resim3 = :resim3,
				resim4 = :resim4,
				resim5 = :resim5,
				resim6 = :resim6,
				saticipp = :saticipp
					
				WHERE id	= :id"
				);
				$insert = $query->execute(array(
				"ilandurum" => $ilandurum,
				"urunadi" => $urunadi,
				"adsoyad" => $adsoyad,
				"urunfiyati" => $urunfiyati,
				"aciklama" => $aciklama,
				"kat1" => $kat1,
				"kat2" => $kat2,
				"kat3" => $kat3,
				"indirim" => $indirim,
				"begeni" => $begeni,
				"puan" => $puan,
				"yorum" => $yorum,
				"alicisatici" => $alicisatici,
				"kullanim" => $kullanim,
				"kartibanselect" => $kartibanselect,
				"selectgiris" => $selectgiris,
				"resim1" => $yeniDosyaAdi1,
				"resim2" => $yeniDosyaAdi2,
				"resim3" => $yeniDosyaAdi3,
				"resim4" => $yeniDosyaAdi4,
				"resim5" => $yeniDosyaAdi5,
				"resim6" => $yeniDosyaAdi6,
				"saticipp" => $yeniDosyaAdi7,

				"id" => $id
				));
					//HICBIR SORUN YOKSA KAYDET
					if ($insert){echo json_encode(array("sonuc" => "tamam")); exit; }
					else{echo json_encode(array("sonuc" => "yanlis"));}
			}
		exit;
	}

/****************************************************/

if (isset($_POST['letgoekle'])) {
	$urunadi = htmlspecialchars($_POST['urunadi']);
	$adsoyad = htmlspecialchars($_POST['adsoyad']);
	$urunfiyati = htmlspecialchars($_POST['urunfiyati']);
	$ilantarihi = htmlspecialchars($_POST['ilantarihi']);
	$ilanno = htmlspecialchars($_POST['ilanno']);
	$aciklama = htmlspecialchars($_POST['aciklama']);
	$il = htmlspecialchars($_POST['il']);
	$ilce = htmlspecialchars($_POST['ilce']);
	$kat1 = htmlspecialchars($_POST['kat1']);
	$kat2 = htmlspecialchars($_POST['kat2']);
	$kategori1 = htmlspecialchars($_POST['kategori1']);
	$kategori2 = htmlspecialchars($_POST['kategori2']);
	$kategori3 = htmlspecialchars($_POST['kategori3']);
	$kategori4 = htmlspecialchars($_POST['kategori4']);
	$kartibanselect = htmlspecialchars($_POST['kartibanselect']);
	$selectgiris = htmlspecialchars($_POST['selectgiris']);

	if ($urunadi == "" or $adsoyad == "" or $urunfiyati == "" or $ilantarihi == ""
		or $ilanno == "" or $aciklama == "" or $il == "" or $ilce == "" 
		or $kat1 == "" or $kat2 == "" or $kategori1 == "" or $kategori2 == "" 
		or $kategori3 == "" or $kategori4 == "" or $kartibanselect == "" or $selectgiris == "") {
		echo json_encode(array("sonuc" => "bos"));
			exit;
		} else {

		$kullaniciadi = $_SESSION['kul_id'];
		$ilandurum = '1';

		$uploads_dir = '../images/'; // Resimlerin yükleneceği dizin
		$allowed_extensions = array('jpg', 'jpeg', 'png'); // İzin verilen resim uzantıları
		$max_image_count = 6; // Maksimum resim sayısı
		
		$resimler = array();
		
		// $_FILES["resimler"]["error"] dizisinde herhangi bir değer UPLOAD_ERR_OK değilse, yani dosya seçilmediyse
		if (!in_array(UPLOAD_ERR_OK, $_FILES["resimler"]["error"])) {
			echo json_encode(array("sonuc" => "resim_secilmedi"));
			exit;
		}
		
		foreach ($_FILES["resimler"]["error"] as $key => $error) {
			if ($error == UPLOAD_ERR_OK) {
				$tmp_name = $_FILES["resimler"]["tmp_name"][$key];
				$name = $_FILES["resimler"]["name"][$key];
				$extension = pathinfo($name, PATHINFO_EXTENSION);
		
				// Resim uzantısını kontrol et
				if (in_array($extension, $allowed_extensions)) {
					if (count($resimler) < $max_image_count) {
						$new_name = uniqid() . "." . $extension;
						$upload_file = $uploads_dir . $new_name;
		
						// Resmi taşı
						move_uploaded_file($tmp_name, $upload_file);
		
						// Resmi listeye ekle
						$resimler[] = $new_name;
					} else {
						// Maksimum resim sayısına ulaşıldı
						echo json_encode(array("sonuc" => "resim_limiti"));
						exit;
					}
				} else {
					// Geçersiz dosya uzantısı
					echo json_encode(array("sonuc" => "gecersiz_uzanti"));
					exit;
				}
			}
		}		

		if (!isset($_FILES['saticipp']) || $_FILES['saticipp']['error'] == UPLOAD_ERR_NO_FILE) {
		} else {
			$dosyaAdi = $_FILES['saticipp']['name'];
			$dosyaUzantisi = pathinfo($dosyaAdi, PATHINFO_EXTENSION);
			$rastgeleSayi = rand(100000, 999999);
			$yeniDosyaAdi7 = $rastgeleSayi . '.' . $dosyaUzantisi;
			$dosyaYolu = $uploads_dir . $yeniDosyaAdi7;
	
			// Sadece belirli uzantılara izin ver
			$gecerliUzantilar = array('png', 'jpg', 'jpeg');
			if (in_array(strtolower($dosyaUzantisi), $gecerliUzantilar)) {
				if (move_uploaded_file($_FILES['saticipp']['tmp_name'], $dosyaYolu)) {
					// Resim yükleme başarılı olduğunda devam et
				}
			} else {
				// Yanlış uzantı hatası ver
				echo json_encode(array("sonuc" => "yanlis_uzanti"));
				exit;
			}
		}

	$query = $db->prepare("INSERT INTO ilan_letgo SET 
	ilandurum = :ilandurum,
	urunadi = :urunadi,
	adsoyad = :adsoyad,
	urunfiyati = :urunfiyati,
	ilantarihi = :ilantarihi,
	ilanno = :ilanno,
	aciklama = :aciklama,
	il = :il,
	ilce = :ilce,
	kat1 = :kat1,
	kat2 = :kat2,
	kategori1 = :kategori1,
	kategori2 = :kategori2,
	kategori3 = :kategori3,
	kategori4 = :kategori4,
	kartibanselect = :kartibanselect,
	selectgiris = :selectgiris,
	resim1 = :resim1, 
	resim2 = :resim2,
	resim3 = :resim3,
	resim4 = :resim4,
	resim5 = :resim5,
	resim6 = :resim6,
	saticipp = :saticipp,

	ekleyen = :kullaniciadi");

	$insert = $query->execute(array(
	"ilandurum" => $ilandurum,
	"urunadi" => $urunadi,
	"adsoyad" => $adsoyad,
	"urunfiyati" => $urunfiyati,
	"ilantarihi" => $ilantarihi,
	"ilanno" => $ilanno,
	"aciklama" => $aciklama,
	"il" => $il,
	"ilce" => $ilce,
	"kat1" => $kat1,
	"kat2" => $kat2,
	"kategori1" => $kategori1,
	"kategori2" => $kategori2,
	"kategori3" => $kategori3,
	"kategori4" => $kategori4,
	"kartibanselect" => $kartibanselect,
	"selectgiris" => $selectgiris,
	"resim1" => isset($resimler[0]) ? $resimler[0] : null,
	"resim2" => isset($resimler[1]) ? $resimler[1] : null,
	"resim3" => isset($resimler[2]) ? $resimler[2] : null,
	"resim4" => isset($resimler[3]) ? $resimler[3] : null,
	"resim5" => isset($resimler[4]) ? $resimler[4] : null,
	"resim6" => isset($resimler[5]) ? $resimler[5] : null,
	"saticipp" => $yeniDosyaAdi7,

	"kullaniciadi" => $kullaniciadi
	));

	//HICBIR SORUN YOKSA IHALE DETAYLARINI KAYDET
	if ($insert){echo json_encode(array("sonuc" => "tamam")); exit; }
		else{echo json_encode(array("sonuc" => "yanlis"));}
	}
	exit;
}

if (isset($_POST['letgoduzenle'])) {
	$ilandurum = htmlspecialchars($_POST['ilandurum']);
	$urunadi = htmlspecialchars($_POST['urunadi']);
	$adsoyad = htmlspecialchars($_POST['adsoyad']);
	$urunfiyati = htmlspecialchars($_POST['urunfiyati']);
	$ilantarihi = htmlspecialchars($_POST['ilantarihi']);
	$ilanno = htmlspecialchars($_POST['ilanno']);
	$aciklama = htmlspecialchars($_POST['aciklama']);
	$il = htmlspecialchars($_POST['il']);
	$ilce = htmlspecialchars($_POST['ilce']);
	$kat1 = htmlspecialchars($_POST['kat1']);
	$kat2 = htmlspecialchars($_POST['kat2']);
	$kategori1 = htmlspecialchars($_POST['kategori1']);
	$kategori2 = htmlspecialchars($_POST['kategori2']);
	$kategori3 = htmlspecialchars($_POST['kategori3']);
	$kategori4 = htmlspecialchars($_POST['kategori4']);
	$kartibanselect = htmlspecialchars($_POST['kartibanselect']);
	$selectgiris = htmlspecialchars($_POST['selectgiris']);
	$id = sifrecozWadanz(htmlspecialchars($_POST['letgoduzenle']));

	if ($urunadi == "" or $adsoyad == "" or $urunfiyati == "" or $ilantarihi == ""
		or $ilanno == "" or $aciklama == "" or $il == ""
		or $ilce == "" or $kat1 == "" or $kat2 == "" or $kategori1 == ""
		or $kategori2 == "" or $kategori3 == "" or $kategori4 == "" or $kartibanselect == "" or $selectgiris == "") {
		echo json_encode(array("sonuc" => "bos"));
			exit;
		} else {

			$urunsor=$db->prepare("SELECT * FROM ilan_letgo WHERE id IN (:id)");
			$urunsor->execute(array(":id" => $id));
			$urun=$urunsor->fetch(PDO::FETCH_ASSOC);

			$uploadDirectory = '../images/'; // Dosyanın kaydedileceği klasör
			// Resim yükleme işlemi burada gerçekleşecek
			if (!isset($_FILES['resim1']) || $_FILES['resim1']['error'] == UPLOAD_ERR_NO_FILE) {
				// Dosya yüklenmemişse veya hata oluşmuşsa mevcut resmi aynı şekilde bırak
				$yeniDosyaAdi1 = $urun["resim1"];
			} else {
				// Eski resmi sil
				if (!empty($urun["resim1"])) {
					$eskiDosyaYolu = $uploadDirectory . $urun["resim1"];
					if (file_exists($eskiDosyaYolu)) {
						unlink($eskiDosyaYolu);
					}
				}
			
				$dosyaAdi = $_FILES['resim1']['name'];
				$dosyaUzantisi = pathinfo($dosyaAdi, PATHINFO_EXTENSION);
				$rastgeleSayi = rand(100000, 999999);
				$yeniDosyaAdi1 = $rastgeleSayi . '.' . $dosyaUzantisi;
				$dosyaYolu = $uploadDirectory . $yeniDosyaAdi1;
			
				// Sadece belirli uzantılara izin ver
				$gecerliUzantilar = array('png', 'jpg', 'jpeg');
				if (in_array(strtolower($dosyaUzantisi), $gecerliUzantilar)) {
					if (move_uploaded_file($_FILES['resim1']['tmp_name'], $dosyaYolu)) {
						// Resim yükleme başarılı olduğunda devam et
					}
				} else {
					// Yanlış uzantı hatası ver
					echo json_encode(array("sonuc" => "yanlis_uzanti"));
					exit;
				}
			}			

			if (!isset($_FILES['resim2']) || $_FILES['resim2']['error'] == UPLOAD_ERR_NO_FILE) {
				// Dosya yüklenmemişse veya hata oluşmuşsa mevcut resmi aynı şekilde bırak
				$yeniDosyaAdi2 = $urun["resim2"];
			} else {
				// Eski resmi sil
				if (!empty($urun["resim2"])) {
					$eskiDosyaYolu = $uploadDirectory . $urun["resim2"];
					if (file_exists($eskiDosyaYolu)) {
						unlink($eskiDosyaYolu);
					}
				}
			
				$dosyaAdi = $_FILES['resim2']['name'];
				$dosyaUzantisi = pathinfo($dosyaAdi, PATHINFO_EXTENSION);
				$rastgeleSayi = rand(100000, 999999);
				$yeniDosyaAdi2 = $rastgeleSayi . '.' . $dosyaUzantisi;
				$dosyaYolu = $uploadDirectory . $yeniDosyaAdi2;
			
				// Sadece belirli uzantılara izin ver
				$gecerliUzantilar = array('png', 'jpg', 'jpeg');
				if (in_array(strtolower($dosyaUzantisi), $gecerliUzantilar)) {
					if (move_uploaded_file($_FILES['resim2']['tmp_name'], $dosyaYolu)) {
						// Resim yükleme başarılı olduğunda devam et
					}
				} else {
					// Yanlış uzantı hatası ver
					echo json_encode(array("sonuc" => "yanlis_uzanti"));
					exit;
				}
			}			

			if (!isset($_FILES['resim3']) || $_FILES['resim3']['error'] == UPLOAD_ERR_NO_FILE) {
				// Dosya yüklenmemişse veya hata oluşmuşsa mevcut resmi aynı şekilde bırak
				$yeniDosyaAdi3 = $urun["resim3"];
			} else {
				// Eski resmi sil
				if (!empty($urun["resim3"])) {
					$eskiDosyaYolu = $uploadDirectory . $urun["resim3"];
					if (file_exists($eskiDosyaYolu)) {
						unlink($eskiDosyaYolu);
					}
				}
			
				$dosyaAdi = $_FILES['resim3']['name'];
				$dosyaUzantisi = pathinfo($dosyaAdi, PATHINFO_EXTENSION);
				$rastgeleSayi = rand(100000, 999999);
				$yeniDosyaAdi3 = $rastgeleSayi . '.' . $dosyaUzantisi;
				$dosyaYolu = $uploadDirectory . $yeniDosyaAdi3;
			
				// Sadece belirli uzantılara izin ver
				$gecerliUzantilar = array('png', 'jpg', 'jpeg');
				if (in_array(strtolower($dosyaUzantisi), $gecerliUzantilar)) {
					if (move_uploaded_file($_FILES['resim3']['tmp_name'], $dosyaYolu)) {
						// Resim yükleme başarılı olduğunda devam et
					}
				} else {
					// Yanlış uzantı hatası ver
					echo json_encode(array("sonuc" => "yanlis_uzanti"));
					exit;
				}
			}			

			if (!isset($_FILES['resim4']) || $_FILES['resim4']['error'] == UPLOAD_ERR_NO_FILE) {
				// Dosya yüklenmemişse veya hata oluşmuşsa mevcut resmi aynı şekilde bırak
				$yeniDosyaAdi4 = $urun["resim4"];
			} else {
				// Eski resmi sil
				if (!empty($urun["resim4"])) {
					$eskiDosyaYolu = $uploadDirectory . $urun["resim4"];
					if (file_exists($eskiDosyaYolu)) {
						unlink($eskiDosyaYolu);
					}
				}
			
				$dosyaAdi = $_FILES['resim4']['name'];
				$dosyaUzantisi = pathinfo($dosyaAdi, PATHINFO_EXTENSION);
				$rastgeleSayi = rand(100000, 999999);
				$yeniDosyaAdi4 = $rastgeleSayi . '.' . $dosyaUzantisi;
				$dosyaYolu = $uploadDirectory . $yeniDosyaAdi4;
			
				// Sadece belirli uzantılara izin ver
				$gecerliUzantilar = array('png', 'jpg', 'jpeg');
				if (in_array(strtolower($dosyaUzantisi), $gecerliUzantilar)) {
					if (move_uploaded_file($_FILES['resim4']['tmp_name'], $dosyaYolu)) {
						// Resim yükleme başarılı olduğunda devam et
					}
				} else {
					// Yanlış uzantı hatası ver
					echo json_encode(array("sonuc" => "yanlis_uzanti"));
					exit;
				}
			}			

			if (!isset($_FILES['resim5']) || $_FILES['resim5']['error'] == UPLOAD_ERR_NO_FILE) {
				// Dosya yüklenmemişse veya hata oluşmuşsa mevcut resmi aynı şekilde bırak
				$yeniDosyaAdi5 = $urun["resim5"];
			} else {
				// Eski resmi sil
				if (!empty($urun["resim5"])) {
					$eskiDosyaYolu = $uploadDirectory . $urun["resim5"];
					if (file_exists($eskiDosyaYolu)) {
						unlink($eskiDosyaYolu);
					}
				}
			
				$dosyaAdi = $_FILES['resim5']['name'];
				$dosyaUzantisi = pathinfo($dosyaAdi, PATHINFO_EXTENSION);
				$rastgeleSayi = rand(100000, 999999);
				$yeniDosyaAdi5 = $rastgeleSayi . '.' . $dosyaUzantisi;
				$dosyaYolu = $uploadDirectory . $yeniDosyaAdi5;
			
				// Sadece belirli uzantılara izin ver
				$gecerliUzantilar = array('png', 'jpg', 'jpeg');
				if (in_array(strtolower($dosyaUzantisi), $gecerliUzantilar)) {
					if (move_uploaded_file($_FILES['resim5']['tmp_name'], $dosyaYolu)) {
						// Resim yükleme başarılı olduğunda devam et
					}
				} else {
					// Yanlış uzantı hatası ver
					echo json_encode(array("sonuc" => "yanlis_uzanti"));
					exit;
				}
			}			

			if (!isset($_FILES['resim6']) || $_FILES['resim6']['error'] == UPLOAD_ERR_NO_FILE) {
				// Dosya yüklenmemişse veya hata oluşmuşsa mevcut resmi aynı şekilde bırak
				$yeniDosyaAdi6 = $urun["resim6"];
			} else {
				// Eski resmi sil
				if (!empty($urun["resim6"])) {
					$eskiDosyaYolu = $uploadDirectory . $urun["resim6"];
					if (file_exists($eskiDosyaYolu)) {
						unlink($eskiDosyaYolu);
					}
				}
			
				$dosyaAdi = $_FILES['resim6']['name'];
				$dosyaUzantisi = pathinfo($dosyaAdi, PATHINFO_EXTENSION);
				$rastgeleSayi = rand(100000, 999999);
				$yeniDosyaAdi6 = $rastgeleSayi . '.' . $dosyaUzantisi;
				$dosyaYolu = $uploadDirectory . $yeniDosyaAdi6;
			
				// Sadece belirli uzantılara izin ver
				$gecerliUzantilar = array('png', 'jpg', 'jpeg');
				if (in_array(strtolower($dosyaUzantisi), $gecerliUzantilar)) {
					if (move_uploaded_file($_FILES['resim6']['tmp_name'], $dosyaYolu)) {
						// Resim yükleme başarılı olduğunda devam et
					}
				} else {
					// Yanlış uzantı hatası ver
					echo json_encode(array("sonuc" => "yanlis_uzanti"));
					exit;
				}
			}			

			if (!isset($_FILES['saticipp']) || $_FILES['saticipp']['error'] == UPLOAD_ERR_NO_FILE) {
				
				$yeniDosyaAdi7 = $urun["saticipp"];
			} else {
				// Eski resmi sil
				if (!empty($urun["saticipp"])) {
					$eskiDosyaYolu = $uploadDirectory . $urun["saticipp"];
					if (file_exists($eskiDosyaYolu)) {
						unlink($eskiDosyaYolu);
					}
				}
			
				$dosyaAdi = $_FILES['saticipp']['name'];
				$dosyaUzantisi = pathinfo($dosyaAdi, PATHINFO_EXTENSION);
				$rastgeleSayi = rand(100000, 999999);
				$yeniDosyaAdi7 = $rastgeleSayi . '.' . $dosyaUzantisi;
				$dosyaYolu = $uploadDirectory . $yeniDosyaAdi7;
			
				// Sadece belirli uzantılara izin ver
				$gecerliUzantilar = array('png', 'jpg', 'jpeg');
				if (in_array(strtolower($dosyaUzantisi), $gecerliUzantilar)) {
					if (move_uploaded_file($_FILES['saticipp']['tmp_name'], $dosyaYolu)) {
						// Resim yükleme başarılı olduğunda devam et
					}
				} else {
					// Yanlış uzantı hatası ver
					echo json_encode(array("sonuc" => "yanlis_uzanti"));
					exit;
				}
			}			

			$query = $db->prepare("UPDATE ilan_letgo SET 
			ilandurum = :ilandurum,
			urunadi = :urunadi,
			adsoyad = :adsoyad,
			urunfiyati = :urunfiyati,
			ilantarihi = :ilantarihi,
			ilanno = :ilanno,
			aciklama = :aciklama,
			il = :il,
			ilce = :ilce,
			kat1 = :kat1,
			kat2 = :kat2,
			kategori1 = :kategori1,
			kategori2 = :kategori2,
			kategori3 = :kategori3,
			kategori4 = :kategori4,
			kartibanselect = :kartibanselect,
			selectgiris = :selectgiris,
			resim1 = :resim1, 
			resim2 = :resim2,
			resim3 = :resim3,
			resim4 = :resim4,
			resim5 = :resim5,
			resim6 = :resim6,
			saticipp = :saticipp
				
			WHERE id	= :id"
			);
			$insert = $query->execute(array(
			"ilandurum" => $ilandurum,	
			"urunadi" => $urunadi,
			"adsoyad" => $adsoyad,
			"urunfiyati" => $urunfiyati,
			"ilantarihi" => $ilantarihi,
			"ilanno" => $ilanno,
			"aciklama" => $aciklama,
			"il" => $il,
			"ilce" => $ilce,
			"kat1" => $kat1,
			"kat2" => $kat2,
			"kategori1" => $kategori1,
			"kategori2" => $kategori2,
			"kategori3" => $kategori3,
			"kategori4" => $kategori4,
			"kartibanselect" => $kartibanselect,
			"selectgiris" => $selectgiris,
			"resim1" => $yeniDosyaAdi1,
			"resim2" => $yeniDosyaAdi2,
			"resim3" => $yeniDosyaAdi3,
			"resim4" => $yeniDosyaAdi4,
			"resim5" => $yeniDosyaAdi5,
			"resim6" => $yeniDosyaAdi6,
			"saticipp" => $yeniDosyaAdi7,

			"id" => $id
			));
				
				if ($insert){echo json_encode(array("sonuc" => "tamam")); exit; }
				else{echo json_encode(array("sonuc" => "yanlis"));}
		}
	exit;
}



if (isset($_POST['pttekle'])) {
	$urunadi = htmlspecialchars($_POST['urunadi']);
	$urunfiyati = htmlspecialchars($_POST['urunfiyati']);
	$aciklama = htmlspecialchars($_POST['aciklama']);
	$kat1 = htmlspecialchars($_POST['kat1']);
	$kat2 = htmlspecialchars($_POST['kat2']);
	$kat3 = htmlspecialchars($_POST['kat3']);
	$kartibanselect = htmlspecialchars($_POST['kartibanselect']);
	$selectgiris = htmlspecialchars($_POST['selectgiris']);

	if ($urunadi == "" or $urunfiyati == "" or $aciklama == ""
		or $kat1 == "" or $kat2 == "" or $kat3 == "" 
		or $kartibanselect == "" or $selectgiris == "") {
		echo json_encode(array("sonuc" => "bos"));
			exit;
		} else {
		
		$kullaniciadi = $_SESSION['kul_id'];
		$ilandurum = '1';

		$uploads_dir = '../images/'; 
		$allowed_extensions = array('jpg', 'jpeg', 'png'); 
		$max_image_count = 5; 
		
		$resimler = array();
		
		
		if (!in_array(UPLOAD_ERR_OK, $_FILES["resimler"]["error"])) {
			echo json_encode(array("sonuc" => "resim_secilmedi"));
			exit;
		}
		
		foreach ($_FILES["resimler"]["error"] as $key => $error) {
			if ($error == UPLOAD_ERR_OK) {
				$tmp_name = $_FILES["resimler"]["tmp_name"][$key];
				$name = $_FILES["resimler"]["name"][$key];
				$extension = pathinfo($name, PATHINFO_EXTENSION);
		
				// Resim uzantısını kontrol et
				if (in_array($extension, $allowed_extensions)) {
					if (count($resimler) < $max_image_count) {
						$new_name = uniqid() . "." . $extension;
						$upload_file = $uploads_dir . $new_name;
		
						// Resmi taşı
						move_uploaded_file($tmp_name, $upload_file);
		
						// Resmi listeye ekle
						$resimler[] = $new_name;
					} else {
						// Maksimum resim sayısına ulaşıldı
						echo json_encode(array("sonuc" => "resim_limiti"));
						exit;
					}
				} else {
					// Geçersiz dosya uzantısı
					echo json_encode(array("sonuc" => "gecersiz_uzanti"));
					exit;
				}
			}
		}

	$query = $db->prepare("INSERT INTO ilan_pttavm SET 
	ilandurum = :ilandurum,
	urunadi = :urunadi,
	urunfiyati = :urunfiyati,
	aciklama = :aciklama,
	kat1 = :kat1,
	kat2 = :kat2,
	kat3 = :kat3,
	kartibanselect = :kartibanselect,
	selectgiris = :selectgiris,
	resim1 = :resim1, 
	resim2 = :resim2,
	resim3 = :resim3,
	resim4 = :resim4,
	resim5 = :resim5,

	ekleyen = :kullaniciadi");

	$insert = $query->execute(array(
	"ilandurum" => $ilandurum,
	"urunadi" => $urunadi,
	"urunfiyati" => $urunfiyati,
	"aciklama" => $aciklama,
	"kat1" => $kat1,
	"kat2" => $kat2,
	"kat3" => $kat3,
	"kartibanselect" => $kartibanselect,
	"selectgiris" => $selectgiris,
	"resim1" => isset($resimler[0]) ? $resimler[0] : null,
	"resim2" => isset($resimler[1]) ? $resimler[1] : null,
	"resim3" => isset($resimler[2]) ? $resimler[2] : null,
	"resim4" => isset($resimler[3]) ? $resimler[3] : null,
	"resim5" => isset($resimler[4]) ? $resimler[4] : null,

	"kullaniciadi" => $kullaniciadi
	));

	
	if ($insert){echo json_encode(array("sonuc" => "tamam")); exit; }
	else{echo json_encode(array("sonuc" => "yanlis"));}
	}
	exit;
}

if (isset($_POST['pttduzenle'])) {
	$ilandurum = htmlspecialchars($_POST['ilandurum']);
	$urunadi = htmlspecialchars($_POST['urunadi']);
	$urunfiyati = htmlspecialchars($_POST['urunfiyati']);
	$aciklama = htmlspecialchars($_POST['aciklama']);
	$kat1 = htmlspecialchars($_POST['kat1']);
	$kat2 = htmlspecialchars($_POST['kat2']);
	$kat3 = htmlspecialchars($_POST['kat3']);
	$kartibanselect = htmlspecialchars($_POST['kartibanselect']);
	$selectgiris = htmlspecialchars($_POST['selectgiris']);
	$id = sifrecozWadanz(htmlspecialchars($_POST['pttduzenle']));

	if ($urunadi == "" or $urunfiyati == "" or $aciklama == ""
		or $kat1 == "" or $kat2 == "" or $kat3 == "" or
		$kartibanselect == "" or $selectgiris == "") {
		echo json_encode(array("sonuc" => "bos"));
			exit;
		} else {

				$urunsor=$db->prepare("SELECT * FROM ilan_pttavm WHERE id IN (:id)");
				$urunsor->execute(array(":id" => $id));
				$urun=$urunsor->fetch(PDO::FETCH_ASSOC);

				$uploadDirectory = '../images/'; 
				
				if (!isset($_FILES['resim1']) || $_FILES['resim1']['error'] == UPLOAD_ERR_NO_FILE) {
					
					$yeniDosyaAdi1 = $urun["resim1"];
				} else {
					
					if (!empty($urun["resim1"])) {
						$eskiDosyaYolu = $uploadDirectory . $urun["resim1"];
						if (file_exists($eskiDosyaYolu)) {
							unlink($eskiDosyaYolu);
						}
					}
				
					$dosyaAdi = $_FILES['resim1']['name'];
					$dosyaUzantisi = pathinfo($dosyaAdi, PATHINFO_EXTENSION);
					$rastgeleSayi = rand(100000, 999999);
					$yeniDosyaAdi1 = $rastgeleSayi . '.' . $dosyaUzantisi;
					$dosyaYolu = $uploadDirectory . $yeniDosyaAdi1;
				
					
					$gecerliUzantilar = array('png', 'jpg', 'jpeg');
					if (in_array(strtolower($dosyaUzantisi), $gecerliUzantilar)) {
						if (move_uploaded_file($_FILES['resim1']['tmp_name'], $dosyaYolu)) {
							// Resim yükleme başarılı olduğunda devam et
						}
					} else {
						
						echo json_encode(array("sonuc" => "yanlis_uzanti"));
						exit;
					}
				}				

				if (!isset($_FILES['resim2']) || $_FILES['resim2']['error'] == UPLOAD_ERR_NO_FILE) {
					
					$yeniDosyaAdi2 = $urun["resim2"];
				} else {
					
					if (!empty($urun["resim2"])) {
						$eskiDosyaYolu = $uploadDirectory . $urun["resim2"];
						if (file_exists($eskiDosyaYolu)) {
							unlink($eskiDosyaYolu);
						}
					}
				
					$dosyaAdi = $_FILES['resim2']['name'];
					$dosyaUzantisi = pathinfo($dosyaAdi, PATHINFO_EXTENSION);
					$rastgeleSayi = rand(100000, 999999);
					$yeniDosyaAdi2 = $rastgeleSayi . '.' . $dosyaUzantisi;
					$dosyaYolu = $uploadDirectory . $yeniDosyaAdi2;
				
					
					$gecerliUzantilar = array('png', 'jpg', 'jpeg');
					if (in_array(strtolower($dosyaUzantisi), $gecerliUzantilar)) {
						if (move_uploaded_file($_FILES['resim2']['tmp_name'], $dosyaYolu)) {
							
						}
					} else {
						
						echo json_encode(array("sonuc" => "yanlis_uzanti"));
						exit;
					}
				}				

				if (!isset($_FILES['resim3']) || $_FILES['resim3']['error'] == UPLOAD_ERR_NO_FILE) {
					// Dosya yüklenmemişse veya hata oluşmuşsa mevcut resmi aynı şekilde bırak
					$yeniDosyaAdi3 = $urun["resim3"];
				} else {
					// Eski resmi sil
					if (!empty($urun["resim3"])) {
						$eskiDosyaYolu = $uploadDirectory . $urun["resim3"];
						if (file_exists($eskiDosyaYolu)) {
							unlink($eskiDosyaYolu);
						}
					}
				
					$dosyaAdi = $_FILES['resim3']['name'];
					$dosyaUzantisi = pathinfo($dosyaAdi, PATHINFO_EXTENSION);
					$rastgeleSayi = rand(100000, 999999);
					$yeniDosyaAdi3 = $rastgeleSayi . '.' . $dosyaUzantisi;
					$dosyaYolu = $uploadDirectory . $yeniDosyaAdi3;
				
					// Sadece belirli uzantılara izin ver
					$gecerliUzantilar = array('png', 'jpg', 'jpeg');
					if (in_array(strtolower($dosyaUzantisi), $gecerliUzantilar)) {
						if (move_uploaded_file($_FILES['resim3']['tmp_name'], $dosyaYolu)) {
							// Resim yükleme başarılı olduğunda devam et
						}
					} else {
						// Yanlış uzantı hatası ver
						echo json_encode(array("sonuc" => "yanlis_uzanti"));
						exit;
					}
				}				

				if (!isset($_FILES['resim4']) || $_FILES['resim4']['error'] == UPLOAD_ERR_NO_FILE) {
					// Dosya yüklenmemişse veya hata oluşmuşsa mevcut resmi aynı şekilde bırak
					$yeniDosyaAdi4 = $urun["resim4"];
				} else {
					// Eski resmi sil
					if (!empty($urun["resim4"])) {
						$eskiDosyaYolu = $uploadDirectory . $urun["resim4"];
						if (file_exists($eskiDosyaYolu)) {
							unlink($eskiDosyaYolu);
						}
					}
				
					$dosyaAdi = $_FILES['resim4']['name'];
					$dosyaUzantisi = pathinfo($dosyaAdi, PATHINFO_EXTENSION);
					$rastgeleSayi = rand(100000, 999999);
					$yeniDosyaAdi4 = $rastgeleSayi . '.' . $dosyaUzantisi;
					$dosyaYolu = $uploadDirectory . $yeniDosyaAdi4;
				
					// Sadece belirli uzantılara izin ver
					$gecerliUzantilar = array('png', 'jpg', 'jpeg');
					if (in_array(strtolower($dosyaUzantisi), $gecerliUzantilar)) {
						if (move_uploaded_file($_FILES['resim4']['tmp_name'], $dosyaYolu)) {
							// Resim yükleme başarılı olduğunda devam et
						}
					} else {
						// Yanlış uzantı hatası ver
						echo json_encode(array("sonuc" => "yanlis_uzanti"));
						exit;
					}
				}				

				if (!isset($_FILES['resim5']) || $_FILES['resim5']['error'] == UPLOAD_ERR_NO_FILE) {
					// Dosya yüklenmemişse veya hata oluşmuşsa mevcut resmi aynı şekilde bırak
					$yeniDosyaAdi5 = $urun["resim5"];
				} else {
					// Eski resmi sil
					if (!empty($urun["resim5"])) {
						$eskiDosyaYolu = $uploadDirectory . $urun["resim5"];
						if (file_exists($eskiDosyaYolu)) {
							unlink($eskiDosyaYolu);
						}
					}
				
					$dosyaAdi = $_FILES['resim5']['name'];
					$dosyaUzantisi = pathinfo($dosyaAdi, PATHINFO_EXTENSION);
					$rastgeleSayi = rand(100000, 999999);
					$yeniDosyaAdi5 = $rastgeleSayi . '.' . $dosyaUzantisi;
					$dosyaYolu = $uploadDirectory . $yeniDosyaAdi5;
				
					// Sadece belirli uzantılara izin ver
					$gecerliUzantilar = array('png', 'jpg', 'jpeg');
					if (in_array(strtolower($dosyaUzantisi), $gecerliUzantilar)) {
						if (move_uploaded_file($_FILES['resim5']['tmp_name'], $dosyaYolu)) {
							// Resim yükleme başarılı olduğunda devam et
						}
					} else {
						// Yanlış uzantı hatası ver
						echo json_encode(array("sonuc" => "yanlis_uzanti"));
						exit;
					}
				}				

			$query = $db->prepare("UPDATE ilan_pttavm SET 
			ilandurum = :ilandurum,
			urunadi	= :urunadi,
			urunfiyati = :urunfiyati,
			aciklama = :aciklama,
			kat1 = :kat1,
			kat2 = :kat2,
			kat3 = :kat3,
			kartibanselect = :kartibanselect,
			selectgiris = :selectgiris,
			resim1 = :resim1, 
			resim2 = :resim2,
			resim3 = :resim3,
			resim4 = :resim4,
			resim5 = :resim5
				
			WHERE id	= :id"
			);
			$insert = $query->execute(array(
			"ilandurum" => $ilandurum,
			"urunadi" => $urunadi,
			"urunfiyati" => $urunfiyati,
			"aciklama" => $aciklama,
			"kat1" => $kat1,
			"kat2" => $kat2,
			"kat3" => $kat3,
			"kartibanselect" => $kartibanselect,
			"selectgiris" => $selectgiris,
			"resim1" => $yeniDosyaAdi1,
			"resim2" => $yeniDosyaAdi2,
			"resim3" => $yeniDosyaAdi3,
			"resim4" => $yeniDosyaAdi4,
			"resim5" => $yeniDosyaAdi5,

			"id" => $id
			));
				//HICBIR SORUN YOKSA KAYDET
				if ($insert){echo json_encode(array("sonuc" => "tamam")); exit; }
				else{echo json_encode(array("sonuc" => "yanlis"));}
		}
	exit;
}

/****************************************************/

if (isset($_POST['turkcellekle'])) {
    $urunadi = htmlspecialchars($_POST['urunadi']);
    $urunfiyati = htmlspecialchars($_POST['urunfiyati']);
    $renk = htmlspecialchars($_POST['renk']);
    $indirimbitis = htmlspecialchars($_POST['indirimbitis']);
    $kat1 = htmlspecialchars($_POST['kat1']);
    $kat2 = htmlspecialchars($_POST['kat2']);
    $kartibanselect = htmlspecialchars($_POST['kartibanselect']);

    if ($urunadi == "" or $urunfiyati == "" or $indirimbitis == "" or $kat1 == "" or $kat2 == "" or $kartibanselect == "") {
        echo json_encode(array("sonuc" => "bos"));
        exit;
    } else {
        $kullaniciadi = $_SESSION['kul_id'];
        $ilandurum = '1';

        $uploads_dir = '../images/';
        $allowed_extensions = array('jpg', 'jpeg', 'png');
        $max_image_count = 5;

        $resimler = array();

        if (!in_array(UPLOAD_ERR_OK, $_FILES["resimler"]["error"])) {
            echo json_encode(array("sonuc" => "resim_secilmedi"));
            exit;
        }

        foreach ($_FILES["resimler"]["error"] as $key => $error) {
            if ($error == UPLOAD_ERR_OK) {
                $tmp_name = $_FILES["resimler"]["tmp_name"][$key];
                $name = $_FILES["resimler"]["name"][$key];
                $extension = pathinfo($name, PATHINFO_EXTENSION);

                if (in_array($extension, $allowed_extensions)) {
                    if (count($resimler) < $max_image_count) {
                        $new_name = uniqid() . "." . $extension;
                        $upload_file = $uploads_dir . $new_name;

                        move_uploaded_file($tmp_name, $upload_file);

                        $resimler[] = $new_name;
                    } else {
                        echo json_encode(array("sonuc" => "resim_limiti"));
                        exit;
                    }
                } else {
                    echo json_encode(array("sonuc" => "gecersiz_uzanti"));
                    exit;
                }
            }
        }

        // Renk seçimine göre renk paletini ayarla
        switch ($renk) {
            case 'Beyaz':
                $renkpaleti = 'fff';
                break;
            case 'Siyah':
                $renkpaleti = '000';
                break;
            case 'Gri':
                $renkpaleti = '666666';
                break;
            case 'Kırmızı':
                $renkpaleti = 'ff0000';
                break;
            case 'Mavi':
                $renkpaleti = '1c86ee';
                break;
            case 'Yeşil':
                $renkpaleti = '00cd00';
                break;
            case 'Sarı':
                $renkpaleti = 'eeb422';
                break;
        }

        $query = $db->prepare("INSERT INTO ilan_turkcell SET 
        ilandurum = :ilandurum,
        urunadi = :urunadi,
        urunfiyati = :urunfiyati,
        renk = :renk,
        renkpaleti = :renkpaleti,
        indirimbitis = :indirimbitis,
        kat1 = :kat1,
        kat2 = :kat2,
        kartibanselect = :kartibanselect,
        resim1 = :resim1, 
        resim2 = :resim2,
        resim3 = :resim3,
        resim4 = :resim4,
        resim5 = :resim5,
        ekleyen = :kullaniciadi");

        $insert = $query->execute(array(
            "ilandurum" => $ilandurum,
            "urunadi" => $urunadi,
            "urunfiyati" => $urunfiyati,
            "renk" => $renk,
            "renkpaleti" => $renkpaleti,
            "indirimbitis" => $indirimbitis,
            "kat1" => $kat1,
            "kat2" => $kat2,
            "kartibanselect" => $kartibanselect,
            "resim1" => isset($resimler[0]) ? $resimler[0] : null,
            "resim2" => isset($resimler[1]) ? $resimler[1] : null,
            "resim3" => isset($resimler[2]) ? $resimler[2] : null,
            "resim4" => isset($resimler[3]) ? $resimler[3] : null,
            "resim5" => isset($resimler[4]) ? $resimler[4] : null,
            "kullaniciadi" => $kullaniciadi
        ));

        if ($insert) {
            echo json_encode(array("sonuc" => "tamam"));
            exit;
        } else {
            echo json_encode(array("sonuc" => "yanlis"));
        }
    }
    exit;
}

if (isset($_POST['turkcellduzenle'])) {
	$ilandurum = htmlspecialchars($_POST['ilandurum']);
	$urunadi = htmlspecialchars($_POST['urunadi']);
	$urunfiyati = htmlspecialchars($_POST['urunfiyati']);
	$renk = htmlspecialchars($_POST['renk']);
	$renkpaleti = htmlspecialchars($_POST['renkpaleti']);
	$indirimbitis = htmlspecialchars($_POST['indirimbitis']);
	$kat1 = htmlspecialchars($_POST['kat1']);
	$kat2 = htmlspecialchars($_POST['kat2']);
	$kartibanselect = htmlspecialchars($_POST['kartibanselect']);
	$id = sifrecozWadanz(htmlspecialchars($_POST['turkcellduzenle']));

	if ($urunadi == "" or $urunfiyati == "" or $indirimbitis == "" or $kat1 == ""
		or $kat2 == "" or $kartibanselect == "") {
		echo json_encode(array("sonuc" => "bos"));
			exit;
		} else {

				$urunsor=$db->prepare("SELECT * FROM ilan_turkcell WHERE id IN (:id)");
				$urunsor->execute(array(":id" => $id));
				$urun=$urunsor->fetch(PDO::FETCH_ASSOC);

				$uploadDirectory = '../images/'; // Dosyanın kaydedileceği klasör
				// Resim yükleme işlemi burada gerçekleşecek
				if (!isset($_FILES['resim1']) || $_FILES['resim1']['error'] == UPLOAD_ERR_NO_FILE) {
					// Dosya yüklenmemişse veya hata oluşmuşsa mevcut resmi aynı şekilde bırak
					$yeniDosyaAdi1 = $urun["resim1"];
				} else {
					// Eski resmi sil
					if (!empty($urun["resim1"])) {
						$eskiDosyaYolu = $uploadDirectory . $urun["resim1"];
						if (file_exists($eskiDosyaYolu)) {
							unlink($eskiDosyaYolu);
						}
					}
				
					$dosyaAdi = $_FILES['resim1']['name'];
					$dosyaUzantisi = pathinfo($dosyaAdi, PATHINFO_EXTENSION);
					$rastgeleSayi = rand(100000, 999999);
					$yeniDosyaAdi1 = $rastgeleSayi . '.' . $dosyaUzantisi;
					$dosyaYolu = $uploadDirectory . $yeniDosyaAdi1;
				
					// Sadece belirli uzantılara izin ver
					$gecerliUzantilar = array('png', 'jpg', 'jpeg');
					if (in_array(strtolower($dosyaUzantisi), $gecerliUzantilar)) {
						if (move_uploaded_file($_FILES['resim1']['tmp_name'], $dosyaYolu)) {
							// Resim yükleme başarılı olduğunda devam et
						}
					} else {
						// Yanlış uzantı hatası ver
						echo json_encode(array("sonuc" => "yanlis_uzanti"));
						exit;
					}
				}				

				if (!isset($_FILES['resim2']) || $_FILES['resim2']['error'] == UPLOAD_ERR_NO_FILE) {
					// Dosya yüklenmemişse veya hata oluşmuşsa mevcut resmi aynı şekilde bırak
					$yeniDosyaAdi2 = $urun["resim2"];
				} else {
					// Eski resmi sil
					if (!empty($urun["resim2"])) {
						$eskiDosyaYolu = $uploadDirectory . $urun["resim2"];
						if (file_exists($eskiDosyaYolu)) {
							unlink($eskiDosyaYolu);
						}
					}
				
					$dosyaAdi = $_FILES['resim2']['name'];
					$dosyaUzantisi = pathinfo($dosyaAdi, PATHINFO_EXTENSION);
					$rastgeleSayi = rand(100000, 999999);
					$yeniDosyaAdi2 = $rastgeleSayi . '.' . $dosyaUzantisi;
					$dosyaYolu = $uploadDirectory . $yeniDosyaAdi2;
				
					// Sadece belirli uzantılara izin ver
					$gecerliUzantilar = array('png', 'jpg', 'jpeg');
					if (in_array(strtolower($dosyaUzantisi), $gecerliUzantilar)) {
						if (move_uploaded_file($_FILES['resim2']['tmp_name'], $dosyaYolu)) {
							// Resim yükleme başarılı olduğunda devam et
						}
					} else {
						// Yanlış uzantı hatası ver
						echo json_encode(array("sonuc" => "yanlis_uzanti"));
						exit;
					}
				}				

				if (!isset($_FILES['resim3']) || $_FILES['resim3']['error'] == UPLOAD_ERR_NO_FILE) {
					// Dosya yüklenmemişse veya hata oluşmuşsa mevcut resmi aynı şekilde bırak
					$yeniDosyaAdi3 = $urun["resim3"];
				} else {
					// Eski resmi sil
					if (!empty($urun["resim3"])) {
						$eskiDosyaYolu = $uploadDirectory . $urun["resim3"];
						if (file_exists($eskiDosyaYolu)) {
							unlink($eskiDosyaYolu);
						}
					}
				
					$dosyaAdi = $_FILES['resim3']['name'];
					$dosyaUzantisi = pathinfo($dosyaAdi, PATHINFO_EXTENSION);
					$rastgeleSayi = rand(100000, 999999);
					$yeniDosyaAdi3 = $rastgeleSayi . '.' . $dosyaUzantisi;
					$dosyaYolu = $uploadDirectory . $yeniDosyaAdi3;
				
					// Sadece belirli uzantılara izin ver
					$gecerliUzantilar = array('png', 'jpg', 'jpeg');
					if (in_array(strtolower($dosyaUzantisi), $gecerliUzantilar)) {
						if (move_uploaded_file($_FILES['resim3']['tmp_name'], $dosyaYolu)) {
							// Resim yükleme başarılı olduğunda devam et
						}
					} else {
						// Yanlış uzantı hatası ver
						echo json_encode(array("sonuc" => "yanlis_uzanti"));
						exit;
					}
				}				

				if (!isset($_FILES['resim4']) || $_FILES['resim4']['error'] == UPLOAD_ERR_NO_FILE) {
					// Dosya yüklenmemişse veya hata oluşmuşsa mevcut resmi aynı şekilde bırak
					$yeniDosyaAdi4 = $urun["resim4"];
				} else {
					// Eski resmi sil
					if (!empty($urun["resim4"])) {
						$eskiDosyaYolu = $uploadDirectory . $urun["resim4"];
						if (file_exists($eskiDosyaYolu)) {
							unlink($eskiDosyaYolu);
						}
					}
				
					$dosyaAdi = $_FILES['resim4']['name'];
					$dosyaUzantisi = pathinfo($dosyaAdi, PATHINFO_EXTENSION);
					$rastgeleSayi = rand(100000, 999999);
					$yeniDosyaAdi4 = $rastgeleSayi . '.' . $dosyaUzantisi;
					$dosyaYolu = $uploadDirectory . $yeniDosyaAdi4;
				
					// Sadece belirli uzantılara izin ver
					$gecerliUzantilar = array('png', 'jpg', 'jpeg');
					if (in_array(strtolower($dosyaUzantisi), $gecerliUzantilar)) {
						if (move_uploaded_file($_FILES['resim4']['tmp_name'], $dosyaYolu)) {
							// Resim yükleme başarılı olduğunda devam et
						}
					} else {
						// Yanlış uzantı hatası ver
						echo json_encode(array("sonuc" => "yanlis_uzanti"));
						exit;
					}
				}				

				if (!isset($_FILES['resim5']) || $_FILES['resim5']['error'] == UPLOAD_ERR_NO_FILE) {
					// Dosya yüklenmemişse veya hata oluşmuşsa mevcut resmi aynı şekilde bırak
					$yeniDosyaAdi5 = $urun["resim5"];
				} else {
					// Eski resmi sil
					if (!empty($urun["resim5"])) {
						$eskiDosyaYolu = $uploadDirectory . $urun["resim5"];
						if (file_exists($eskiDosyaYolu)) {
							unlink($eskiDosyaYolu);
						}
					}
				
					$dosyaAdi = $_FILES['resim5']['name'];
					$dosyaUzantisi = pathinfo($dosyaAdi, PATHINFO_EXTENSION);
					$rastgeleSayi = rand(100000, 999999);
					$yeniDosyaAdi5 = $rastgeleSayi . '.' . $dosyaUzantisi;
					$dosyaYolu = $uploadDirectory . $yeniDosyaAdi5;
				
					// Sadece belirli uzantılara izin ver
					$gecerliUzantilar = array('png', 'jpg', 'jpeg');
					if (in_array(strtolower($dosyaUzantisi), $gecerliUzantilar)) {
						if (move_uploaded_file($_FILES['resim5']['tmp_name'], $dosyaYolu)) {
							// Resim yükleme başarılı olduğunda devam et
						}
					} else {
						// Yanlış uzantı hatası ver
						echo json_encode(array("sonuc" => "yanlis_uzanti"));
						exit;
					}
				}				

				function getRenkPaleti($renk)
				{
				    switch ($renk) {
				        case 'Beyaz':
				            return 'fff';
				        case 'Siyah':
				            return '000';
				        case 'Gri':
				            return '666666';
				        case 'Kırmızı':
				            return 'ff0000';
				        case 'Mavi':
				            return '1c86ee';
				        case 'Yeşil':
				            return '00cd00';
				        case 'Sarı':
				            return 'eeb422';
				    }
				}

			$renkpaleti = ($renk == $urun["renk"]) ? $urun["renkpaleti"] : getRenkPaleti($renk);

			$query = $db->prepare("UPDATE ilan_turkcell SET 
			ilandurum = :ilandurum,
			urunadi = :urunadi,
			urunfiyati = :urunfiyati,
			renk = :renk,
			renkpaleti = :renkpaleti,
			indirimbitis = :indirimbitis,
			kat1 = :kat1,
			kat2 = :kat2,
			kartibanselect = :kartibanselect,
			resim1 = :resim1, 
			resim2 = :resim2,
			resim3 = :resim3,
			resim4 = :resim4,
			resim5 = :resim5
				
			WHERE id	= :id"
			);
			$insert = $query->execute(array(
			"ilandurum" => $ilandurum,	
			"urunadi" => $urunadi,
			"urunfiyati" => $urunfiyati,
			"renk" => $renk,
			"renkpaleti" => $renkpaleti,
			"indirimbitis" => $indirimbitis,
			"kat1" => $kat1,
			"kat2" => $kat2,
			"kartibanselect" => $kartibanselect,
			"resim1" => $yeniDosyaAdi1,
			"resim2" => $yeniDosyaAdi2,
			"resim3" => $yeniDosyaAdi3,
			"resim4" => $yeniDosyaAdi4,
			"resim5" => $yeniDosyaAdi5,

			"id" => $id
			));
				//HICBIR SORUN YOKSA KAYDET
				if ($insert){echo json_encode(array("sonuc" => "tamam")); exit; }
				else{echo json_encode(array("sonuc" => "yanlis"));}
		}
	exit;
}

/****************************************************/

if (isset($_POST['shopierekle'])) {
	$urunadi = htmlspecialchars($_POST['urunadi']);
	$adsoyad = htmlspecialchars($_POST['adsoyad']);
	$urunfiyati = htmlspecialchars($_POST['urunfiyati']);
	$saticiaciklama = htmlspecialchars($_POST['saticiaciklama']);
	$aciklama = htmlspecialchars($_POST['aciklama']);
	$kargoucreti = htmlspecialchars($_POST['kargoucreti']);
	$kartibanselect = htmlspecialchars($_POST['kartibanselect']);

	if ($urunadi == "" or $adsoyad == "" or $urunfiyati == "" or $saticiaciklama == ""
		or $aciklama == "" or $kargoucreti == "" or $kartibanselect == "") {
		echo json_encode(array("sonuc" => "bos"));
			exit;
		} else {

		$kullaniciadi = $_SESSION['kul_id'];
		$ilandurum = '1';

		$uploads_dir = '../images/'; // Resimlerin yükleneceği dizin
		$allowed_extensions = array('jpg', 'jpeg', 'png'); // İzin verilen resim uzantıları
		$max_image_count = 5; // Maksimum resim sayısı
		
		$resimler = array();
		
		// $_FILES["resimler"]["error"] dizisinde herhangi bir değer UPLOAD_ERR_OK değilse, yani dosya seçilmediyse
		if (!in_array(UPLOAD_ERR_OK, $_FILES["resimler"]["error"])) {
			echo json_encode(array("sonuc" => "resim_secilmedi"));
			exit;
		}
		
		foreach ($_FILES["resimler"]["error"] as $key => $error) {
			if ($error == UPLOAD_ERR_OK) {
				$tmp_name = $_FILES["resimler"]["tmp_name"][$key];
				$name = $_FILES["resimler"]["name"][$key];
				$extension = pathinfo($name, PATHINFO_EXTENSION);
		
				// Resim uzantısını kontrol et
				if (in_array($extension, $allowed_extensions)) {
					if (count($resimler) < $max_image_count) {
						$new_name = uniqid() . "." . $extension;
						$upload_file = $uploads_dir . $new_name;
		
						// Resmi taşı
						move_uploaded_file($tmp_name, $upload_file);
		
						// Resmi listeye ekle
						$resimler[] = $new_name;
					} else {
						// Maksimum resim sayısına ulaşıldı
						echo json_encode(array("sonuc" => "resim_limiti"));
						exit;
					}
				} else {
					// Geçersiz dosya uzantısı
					echo json_encode(array("sonuc" => "gecersiz_uzanti"));
					exit;
				}
			}
		}

	$query = $db->prepare("INSERT INTO ilan_shopier SET 
	ilandurum = :ilandurum,
	urunadi = :urunadi,
	adsoyad = :adsoyad,
	urunfiyati = :urunfiyati,
	saticiaciklama = :saticiaciklama,
	aciklama = :aciklama,
	kargoucreti = :kargoucreti,
	kartibanselect = :kartibanselect,
	resim1 = :resim1, 
	resim2 = :resim2,
	resim3 = :resim3,
	resim4 = :resim4,
	resim5 = :resim5,

	ekleyen = :kullaniciadi");

	$insert = $query->execute(array(
	"ilandurum" => $ilandurum,
	"urunadi" => $urunadi,
	"adsoyad" => $adsoyad,
	"urunfiyati" => $urunfiyati,
	"saticiaciklama" => $saticiaciklama,
	"aciklama" => $aciklama,
	"kargoucreti" => $kargoucreti,
	"kartibanselect" => $kartibanselect,
	"resim1" => isset($resimler[0]) ? $resimler[0] : null,
	"resim2" => isset($resimler[1]) ? $resimler[1] : null,
	"resim3" => isset($resimler[2]) ? $resimler[2] : null,
	"resim4" => isset($resimler[3]) ? $resimler[3] : null,
	"resim5" => isset($resimler[4]) ? $resimler[4] : null,

	"kullaniciadi" => $kullaniciadi
	));

	//HICBIR SORUN YOKSA IHALE DETAYLARINI KAYDET
	if ($insert){echo json_encode(array("sonuc" => "tamam")); exit; }
		else{echo json_encode(array("sonuc" => "yanlis"));}
	}
	exit;
}

if (isset($_POST['shopierduzenle'])) {
	$ilandurum = htmlspecialchars($_POST['ilandurum']);
	$urunadi = htmlspecialchars($_POST['urunadi']);
	$adsoyad = htmlspecialchars($_POST['adsoyad']);
	$urunfiyati = htmlspecialchars($_POST['urunfiyati']);
	$saticiaciklama = htmlspecialchars($_POST['saticiaciklama']);
	$aciklama = htmlspecialchars($_POST['aciklama']);
	$kargoucreti = htmlspecialchars($_POST['kargoucreti']);
	$kartibanselect = htmlspecialchars($_POST['kartibanselect']);
	$id = sifrecozWadanz(htmlspecialchars($_POST['shopierduzenle']));

	if ($urunadi == "" or $adsoyad == "" or $urunfiyati == "" or $saticiaciklama == ""
		or $aciklama == "" or $kargoucreti == "" or $kartibanselect == "") {
		echo json_encode(array("sonuc" => "bos"));
			exit;
		} else {

				$urunsor=$db->prepare("SELECT * FROM ilan_shopier WHERE id IN (:id)");
				$urunsor->execute(array(":id" => $id));
				$urun=$urunsor->fetch(PDO::FETCH_ASSOC);

				$uploadDirectory = '../images/'; // Dosyanın kaydedileceği klasör
				// Resim yükleme işlemi burada gerçekleşecek
				if (!isset($_FILES['resim1']) || $_FILES['resim1']['error'] == UPLOAD_ERR_NO_FILE) {
					// Dosya yüklenmemişse veya hata oluşmuşsa mevcut resmi aynı şekilde bırak
					$yeniDosyaAdi1 = $urun["resim1"];
				} else {
					// Eski resmi sil
					if (!empty($urun["resim1"])) {
						$eskiDosyaYolu = $uploadDirectory . $urun["resim1"];
						if (file_exists($eskiDosyaYolu)) {
							unlink($eskiDosyaYolu);
						}
					}
				
					$dosyaAdi = $_FILES['resim1']['name'];
					$dosyaUzantisi = pathinfo($dosyaAdi, PATHINFO_EXTENSION);
					$rastgeleSayi = rand(100000, 999999);
					$yeniDosyaAdi1 = $rastgeleSayi . '.' . $dosyaUzantisi;
					$dosyaYolu = $uploadDirectory . $yeniDosyaAdi1;
				
					// Sadece belirli uzantılara izin ver
					$gecerliUzantilar = array('png', 'jpg', 'jpeg');
					if (in_array(strtolower($dosyaUzantisi), $gecerliUzantilar)) {
						if (move_uploaded_file($_FILES['resim1']['tmp_name'], $dosyaYolu)) {
							// Resim yükleme başarılı olduğunda devam et
						}
					} else {
						// Yanlış uzantı hatası ver
						echo json_encode(array("sonuc" => "yanlis_uzanti"));
						exit;
					}
				}				

				if (!isset($_FILES['resim2']) || $_FILES['resim2']['error'] == UPLOAD_ERR_NO_FILE) {
					// Dosya yüklenmemişse veya hata oluşmuşsa mevcut resmi aynı şekilde bırak
					$yeniDosyaAdi2 = $urun["resim2"];
				} else {
					// Eski resmi sil
					if (!empty($urun["resim2"])) {
						$eskiDosyaYolu = $uploadDirectory . $urun["resim2"];
						if (file_exists($eskiDosyaYolu)) {
							unlink($eskiDosyaYolu);
						}
					}
				
					$dosyaAdi = $_FILES['resim2']['name'];
					$dosyaUzantisi = pathinfo($dosyaAdi, PATHINFO_EXTENSION);
					$rastgeleSayi = rand(100000, 999999);
					$yeniDosyaAdi2 = $rastgeleSayi . '.' . $dosyaUzantisi;
					$dosyaYolu = $uploadDirectory . $yeniDosyaAdi2;
				
					// Sadece belirli uzantılara izin ver
					$gecerliUzantilar = array('png', 'jpg', 'jpeg');
					if (in_array(strtolower($dosyaUzantisi), $gecerliUzantilar)) {
						if (move_uploaded_file($_FILES['resim2']['tmp_name'], $dosyaYolu)) {
							// Resim yükleme başarılı olduğunda devam et
						}
					} else {
						// Yanlış uzantı hatası ver
						echo json_encode(array("sonuc" => "yanlis_uzanti"));
						exit;
					}
				}				

				if (!isset($_FILES['resim3']) || $_FILES['resim3']['error'] == UPLOAD_ERR_NO_FILE) {
					// Dosya yüklenmemişse veya hata oluşmuşsa mevcut resmi aynı şekilde bırak
					$yeniDosyaAdi3 = $urun["resim3"];
				} else {
					// Eski resmi sil
					if (!empty($urun["resim3"])) {
						$eskiDosyaYolu = $uploadDirectory . $urun["resim3"];
						if (file_exists($eskiDosyaYolu)) {
							unlink($eskiDosyaYolu);
						}
					}
				
					$dosyaAdi = $_FILES['resim3']['name'];
					$dosyaUzantisi = pathinfo($dosyaAdi, PATHINFO_EXTENSION);
					$rastgeleSayi = rand(100000, 999999);
					$yeniDosyaAdi3 = $rastgeleSayi . '.' . $dosyaUzantisi;
					$dosyaYolu = $uploadDirectory . $yeniDosyaAdi3;
				
					// Sadece belirli uzantılara izin ver
					$gecerliUzantilar = array('png', 'jpg', 'jpeg');
					if (in_array(strtolower($dosyaUzantisi), $gecerliUzantilar)) {
						if (move_uploaded_file($_FILES['resim3']['tmp_name'], $dosyaYolu)) {
							// Resim yükleme başarılı olduğunda devam et
						}
					} else {
						// Yanlış uzantı hatası ver
						echo json_encode(array("sonuc" => "yanlis_uzanti"));
						exit;
					}
				}				

				if (!isset($_FILES['resim4']) || $_FILES['resim4']['error'] == UPLOAD_ERR_NO_FILE) {
					// Dosya yüklenmemişse veya hata oluşmuşsa mevcut resmi aynı şekilde bırak
					$yeniDosyaAdi4 = $urun["resim4"];
				} else {
					// Eski resmi sil
					if (!empty($urun["resim4"])) {
						$eskiDosyaYolu = $uploadDirectory . $urun["resim4"];
						if (file_exists($eskiDosyaYolu)) {
							unlink($eskiDosyaYolu);
						}
					}
				
					$dosyaAdi = $_FILES['resim4']['name'];
					$dosyaUzantisi = pathinfo($dosyaAdi, PATHINFO_EXTENSION);
					$rastgeleSayi = rand(100000, 999999);
					$yeniDosyaAdi4 = $rastgeleSayi . '.' . $dosyaUzantisi;
					$dosyaYolu = $uploadDirectory . $yeniDosyaAdi4;
				
					// Sadece belirli uzantılara izin ver
					$gecerliUzantilar = array('png', 'jpg', 'jpeg');
					if (in_array(strtolower($dosyaUzantisi), $gecerliUzantilar)) {
						if (move_uploaded_file($_FILES['resim4']['tmp_name'], $dosyaYolu)) {
							// Resim yükleme başarılı olduğunda devam et
						}
					} else {
						// Yanlış uzantı hatası ver
						echo json_encode(array("sonuc" => "yanlis_uzanti"));
						exit;
					}
				}				

				if (!isset($_FILES['resim5']) || $_FILES['resim5']['error'] == UPLOAD_ERR_NO_FILE) {
					// Dosya yüklenmemişse veya hata oluşmuşsa mevcut resmi aynı şekilde bırak
					$yeniDosyaAdi5 = $urun["resim5"];
				} else {
					// Eski resmi sil
					if (!empty($urun["resim5"])) {
						$eskiDosyaYolu = $uploadDirectory . $urun["resim5"];
						if (file_exists($eskiDosyaYolu)) {
							unlink($eskiDosyaYolu);
						}
					}
				
					$dosyaAdi = $_FILES['resim5']['name'];
					$dosyaUzantisi = pathinfo($dosyaAdi, PATHINFO_EXTENSION);
					$rastgeleSayi = rand(100000, 999999);
					$yeniDosyaAdi5 = $rastgeleSayi . '.' . $dosyaUzantisi;
					$dosyaYolu = $uploadDirectory . $yeniDosyaAdi5;
				
					// Sadece belirli uzantılara izin ver
					$gecerliUzantilar = array('png', 'jpg', 'jpeg');
					if (in_array(strtolower($dosyaUzantisi), $gecerliUzantilar)) {
						if (move_uploaded_file($_FILES['resim5']['tmp_name'], $dosyaYolu)) {
							// Resim yükleme başarılı olduğunda devam et
						}
					} else {
						// Yanlış uzantı hatası ver
						echo json_encode(array("sonuc" => "yanlis_uzanti"));
						exit;
					}
				}				

			$query = $db->prepare("UPDATE ilan_shopier SET 
			ilandurum = :ilandurum,
			urunadi = :urunadi,
			adsoyad = :adsoyad,
			urunfiyati = :urunfiyati,
			saticiaciklama = :saticiaciklama,
			aciklama = :aciklama,
			kargoucreti = :kargoucreti,
			kartibanselect = :kartibanselect,
			resim1 = :resim1, 
			resim2 = :resim2,
			resim3 = :resim3,
			resim4 = :resim4,
			resim5 = :resim5
				
			WHERE id	= :id"
			);
			$insert = $query->execute(array(
			"ilandurum" => $ilandurum,	
			"urunadi" => $urunadi,
			"adsoyad" => $adsoyad,
			"urunfiyati" => $urunfiyati,
			"saticiaciklama" => $saticiaciklama,
			"aciklama" => $aciklama,
			"kargoucreti" => $kargoucreti,
			"kartibanselect" => $kartibanselect,
			"resim1" => $yeniDosyaAdi1,
			"resim2" => $yeniDosyaAdi2,
			"resim3" => $yeniDosyaAdi3,
			"resim4" => $yeniDosyaAdi4,
			"resim5" => $yeniDosyaAdi5,

			"id" => $id
			));
				//HICBIR SORUN YOKSA KAYDET
				if ($insert){echo json_encode(array("sonuc" => "tamam")); exit; }
				else{echo json_encode(array("sonuc" => "yanlis"));}
		}
	exit;
}

if (isset($_POST['facebookekle'])) {
	if ("") {
		echo '{"sonuc":"bos"}';
			exit;
		} else {

		$kullaniciadi = $_SESSION['kul_id'];
		$ilandurum = '1';

	$query = $db->prepare("INSERT INTO ilan_facebook SET 
	ilandurum = :ilandurum,
	ekleyen = :kullaniciadi");

	$insert = $query->execute(array(
	"ilandurum" => $ilandurum,
	"kullaniciadi" => $kullaniciadi
	));

	//HICBIR SORUN YOKSA IHALE DETAYLARINI KAYDET
	if ($insert){echo '{"sonuc":"tamam"}'; exit; }
		else{echo '{"sonuc":"yanlis"}';}
	}
	exit;
}

if (isset($_POST['shopierprofilekle'])) {
	$adsoyad = htmlspecialchars($_POST['adsoyad']);
	$profilaciklama = htmlspecialchars($_POST['profilaciklama']);

	if ($adsoyad == "" or $profilaciklama == "") {
		echo json_encode(array("sonuc" => "bos"));
			exit;
		} else {

		$kullaniciadi = $_SESSION['kul_id'];
		$ilandurum = '1';

		$uploads_dir = '../images/'; // Resimlerin yükleneceği dizin

		if (!isset($_FILES['saticipp']) || $_FILES['saticipp']['error'] == UPLOAD_ERR_NO_FILE) {
		} else {
			$dosyaAdi = $_FILES['saticipp']['name'];
			$dosyaUzantisi = pathinfo($dosyaAdi, PATHINFO_EXTENSION);
			$rastgeleSayi = rand(100000, 999999);
			$yeniDosyaAdi1 = $rastgeleSayi . '.' . $dosyaUzantisi;
			$dosyaYolu = $uploads_dir . $yeniDosyaAdi1;
	
			// Sadece belirli uzantılara izin ver
			$gecerliUzantilar = array('png', 'jpg', 'jpeg');
			if (in_array(strtolower($dosyaUzantisi), $gecerliUzantilar)) {
				if (move_uploaded_file($_FILES['saticipp']['tmp_name'], $dosyaYolu)) {
					// Resim yükleme başarılı olduğunda devam et
				}
			} else {
				// Yanlış uzantı hatası ver
				echo json_encode(array("sonuc" => "yanlis_uzanti"));
				exit;
			}
		}

	$query = $db->prepare("INSERT INTO profilshopier SET 
	ilandurum = :ilandurum,
	adsoyad = :adsoyad,
	profilaciklama = :profilaciklama,
	saticipp = :saticipp,

	ekleyen = :kullaniciadi");

	$insert = $query->execute(array(
	"ilandurum" => $ilandurum,
	"adsoyad" => $adsoyad,
	"profilaciklama" => $profilaciklama,
	"saticipp" => $yeniDosyaAdi1,

	"kullaniciadi" => $kullaniciadi
	));

	//HICBIR SORUN YOKSA IHALE DETAYLARINI KAYDET
	if ($insert){echo json_encode(array("sonuc" => "tamam")); exit; }
		else{echo json_encode(array("sonuc" => "yanlis"));}
	}
	exit;
}

if (isset($_POST['shopierprofilduzenle'])) {
	$ilandurum = htmlspecialchars($_POST['ilandurum']);
	$adsoyad = htmlspecialchars($_POST['adsoyad']);
	$profilaciklama = htmlspecialchars($_POST['profilaciklama']);
	$id = sifrecozWadanz(htmlspecialchars($_POST['shopierprofilduzenle']));

	if ($adsoyad == "" or $profilaciklama == "") {
		echo json_encode(array("sonuc" => "bos"));
			exit;
		} else {

			$urunsor=$db->prepare("SELECT * FROM profilshopier WHERE id IN (:id)");
			$urunsor->execute(array(":id" => $id));
			$urun=$urunsor->fetch(PDO::FETCH_ASSOC);

			$uploadDirectory = '../images/'; // Dosyanın kaydedileceği klasör
			// Resim yükleme işlemi burada gerçekleşecek
			if (!isset($_FILES['saticipp']) || $_FILES['saticipp']['error'] == UPLOAD_ERR_NO_FILE) {
				// Dosya yüklenmemişse veya hata oluşmuşsa mevcut resmi aynı şekilde bırak
				$yeniDosyaAdi1 = $urun["saticipp"];
			} else {
				// Eski resmi sil
				if (!empty($urun["saticipp"])) {
					$eskiDosyaYolu = $uploadDirectory . $urun["saticipp"];
					if (file_exists($eskiDosyaYolu)) {
						unlink($eskiDosyaYolu);
					}
				}
			
				$dosyaAdi = $_FILES['saticipp']['name'];
				$dosyaUzantisi = pathinfo($dosyaAdi, PATHINFO_EXTENSION);
				$rastgeleSayi = rand(100000, 999999);
				$yeniDosyaAdi1 = $rastgeleSayi . '.' . $dosyaUzantisi;
				$dosyaYolu = $uploadDirectory . $yeniDosyaAdi1;
			
				// Sadece belirli uzantılara izin ver
				$gecerliUzantilar = array('png', 'jpg', 'jpeg');
				if (in_array(strtolower($dosyaUzantisi), $gecerliUzantilar)) {
					if (move_uploaded_file($_FILES['saticipp']['tmp_name'], $dosyaYolu)) {
						// Resim yükleme başarılı olduğunda devam et
					}
				} else {
					// Yanlış uzantı hatası ver
					echo json_encode(array("sonuc" => "yanlis_uzanti"));
					exit;
				}
			}		

			$query = $db->prepare("UPDATE profilshopier SET 
			ilandurum = :ilandurum,
			adsoyad = :adsoyad,
			profilaciklama = :profilaciklama,
			saticipp = :saticipp
				
			WHERE id	= :id"
			);
			$insert = $query->execute(array(
			"ilandurum" => $ilandurum,	
			"adsoyad" => $adsoyad,
			"profilaciklama" => $profilaciklama,
			"saticipp" => $yeniDosyaAdi1,

			"id" => $id
			));
				//HICBIR SORUN YOKSA KAYDET
				if ($insert){echo json_encode(array("sonuc" => "tamam")); exit; }
				else{echo json_encode(array("sonuc" => "yanlis"));}
		}
	exit;
}

/****************************************************/

	if (isset($_POST['yurticiekle'])) {
		$id = htmlspecialchars($_POST['id']);
		$durum = htmlspecialchars($_POST['durum']);
		$gonderen = htmlspecialchars($_POST['gonderen']);
		$cikistarihi = htmlspecialchars($_POST['cikistarihi']);
		$gonderitipi = htmlspecialchars($_POST['gonderitipi']);
		$teslimalan = htmlspecialchars($_POST['teslimalan']);
		$teslimtarihi = htmlspecialchars($_POST['teslimtarihi']);
		$teslimbirimi = htmlspecialchars($_POST['teslimbirimi']);
		$telno = htmlspecialchars($_POST['telno']);
		$cikisyeri = htmlspecialchars($_POST['cikisyeri']);
		$varisyeri = htmlspecialchars($_POST['varisyeri']);
		$step1 = htmlspecialchars($_POST['step1']);
		$step2 = htmlspecialchars($_POST['step2']);
		$step3 = htmlspecialchars($_POST['step3']);
		$step4 = htmlspecialchars($_POST['step4']);
		$rotate = htmlspecialchars($_POST['rotate']);
		
		if ($id == "" or $durum == "" or $gonderen == "" or $cikistarihi == "" or $gonderitipi == ""
			or $teslimalan == "" or $teslimtarihi == "" or $teslimbirimi == "" or $telno == ""
			or $cikisyeri == "" or $varisyeri == "") {
			echo json_encode(array("sonuc" => "bos"));
				exit;
			}
			else{
				$kullaniciadi = $_SESSION['kul_id'];
				$ilandurum = '1';

				switch ($durum) {
					case 'Hazırlanıyor':
						$rotate = '-73';
						break;
					case 'Taşıma Durumunda':
						$rotate = '-35';
						$step1 = 'step-5';
						break;
					case 'Varış Biriminde':
						$rotate = '0';
						$step2 = 'step-5';
						break;
					case 'Dağıtıma Çıktı':
						$rotate = '35';
						$step3 = 'step-5';
						break;
					case 'Teslim Edildi':
						$rotate = '73';
						$step4 = 'step-5';
						break;
				}

		$query = $db->prepare("INSERT INTO yurtici SET 
		id = :id,
		ilandurum = :ilandurum,
    	durum = :durum,
		gonderen = :gonderen,
		cikistarihi = :cikistarihi,
		gonderitipi = :gonderitipi,
		teslimalan = :teslimalan,
		teslimtarihi = :teslimtarihi,
		teslimbirimi = :teslimbirimi,
		telno = :telno,
		cikisyeri = :cikisyeri,
		varisyeri = :varisyeri,
		step1 = :step1,
		step2 = :step2,
		step3 = :step3,
		step4 = :step4,
		rotate = :rotate,

    	ekleyen = :kullaniciadi");

		$insert = $query->execute(array(
		"id" => $id,
		"ilandurum" => $ilandurum,
    	"durum" => $durum,
		"gonderen" => $gonderen,
		"cikistarihi" => $cikistarihi,
		"gonderitipi" => $gonderitipi,
		"teslimalan" => $teslimalan,
    	"teslimtarihi" => $teslimtarihi,
		"teslimbirimi" => $teslimbirimi,
		"telno" => $telno,
		"cikisyeri" => $cikisyeri,
		"varisyeri" => $varisyeri,
		"step1" => $step1,
		"step2" => $step2,
		"step3" => $step3,
		"step4" => $step4,
		"rotate" => $rotate,

    	"kullaniciadi" => $kullaniciadi
		));

		//HICBIR SORUN YOKSA IHALE DETAYLARINI KAYDET
		if ($insert){echo json_encode(array("sonuc" => "tamam")); exit; }
			else{echo json_encode(array("sonuc" => "yanlis"));}
		}
		exit;
	}

	if (isset($_POST['yurticiduzenle'])) {
		$ilandurum = htmlspecialchars($_POST['ilandurum']);
		$durum = htmlspecialchars($_POST['durum']);
		$gonderen = htmlspecialchars($_POST['gonderen']);
		$cikistarihi = htmlspecialchars($_POST['cikistarihi']);
		$gonderitipi = htmlspecialchars($_POST['gonderitipi']);
		$teslimalan = htmlspecialchars($_POST['teslimalan']);
		$teslimtarihi = htmlspecialchars($_POST['teslimtarihi']);
		$teslimbirimi = htmlspecialchars($_POST['teslimbirimi']);
		$telno = htmlspecialchars($_POST['telno']);
		$cikisyeri = htmlspecialchars($_POST['cikisyeri']);
		$varisyeri = htmlspecialchars($_POST['varisyeri']);
		$step1 = htmlspecialchars($_POST['step1']);
		$step2 = htmlspecialchars($_POST['step2']);
		$step3 = htmlspecialchars($_POST['step3']);
		$step4 = htmlspecialchars($_POST['step4']);
		$rotate = htmlspecialchars($_POST['rotate']);
		$id = sifrecozWadanz(htmlspecialchars($_POST['yurticiduzenle']));

		if ($id == "" or $durum == "" or $gonderen == "" or $cikistarihi == "" or $gonderitipi == ""
		or $teslimalan == "" or $teslimtarihi == "" or $teslimbirimi == "" or $telno == ""
		or $cikisyeri == "" or $varisyeri == "") {
			echo json_encode(array("sonuc" => "bos"));
				exit;
			}
			else{

				$urunsor=$db->prepare("SELECT * FROM yurtici WHERE id IN (:id)");
				$urunsor->execute(array(":id" => $id));
				$urun=$urunsor->fetch(PDO::FETCH_ASSOC);

				function getStepValues($durum)
				{
					switch ($durum) {
						case 'Hazırlanıyor':
							return ['rotate' => '-73', 'step1' => 'step-0', 'step2' => 'step-0', 'step3' => 'step-0', 'step4' => 'step-0'];
						case 'Taşıma Durumunda':
							return ['rotate' => '-35', 'step1' => 'step-5', 'step2' => 'step-0', 'step3' => 'step-0', 'step4' => 'step-0'];
						case 'Varış Biriminde':
							return ['rotate' => '0', 'step1' => 'step-5', 'step2' => 'step-5', 'step3' => 'step-0', 'step4' => 'step-0'];
						case 'Dağıtıma Çıktı':
							return ['rotate' => '35', 'step1' => 'step-5', 'step2' => 'step-5', 'step3' => 'step-5', 'step4' => 'step-0'];
						case 'Teslim Edildi':
							return ['rotate' => '73', 'step1' => 'step-5', 'step2' => 'step-5', 'step3' => 'step-5', 'step4' => 'step-5'];
					}
				}				

				$stepValues = ($durum == $urun["durum"]) ? $urun : getStepValues($durum);
				$rotate = $stepValues['rotate'];
				$step1 = $stepValues['step1'];
				$step2 = $stepValues['step2'];
				$step3 = $stepValues['step3'];
				$step4 = $stepValues['step4'];				

				$query = $db->prepare("UPDATE yurtici SET 
				ilandurum = :ilandurum,
    			durum = :durum,
				gonderen = :gonderen,
				cikistarihi = :cikistarihi,
				gonderitipi = :gonderitipi,
				teslimalan = :teslimalan,
				teslimtarihi = :teslimtarihi,
				teslimbirimi = :teslimbirimi,
				telno = :telno,
				cikisyeri = :cikisyeri,
				varisyeri = :varisyeri,
				step1 = :step1,
				step2 = :step2,
				step3 = :step3,
				step4 = :step4,
				rotate = :rotate
					
				WHERE id = :id"
				);
				$insert = $query->execute(array(
				"ilandurum" => $ilandurum,
				"durum" => $durum,
				"gonderen" => $gonderen,
				"cikistarihi" => $cikistarihi,
				"gonderitipi" => $gonderitipi,
				"teslimalan" => $teslimalan,
				"teslimtarihi" => $teslimtarihi,
				"teslimbirimi" => $teslimbirimi,
				"telno" => $telno,
				"cikisyeri" => $cikisyeri,
				"varisyeri" => $varisyeri,
				"step1" => $step1,
				"step2" => $step2,
				"step3" => $step3,
				"step4" => $step4,
				"rotate" => $rotate,

				"id" => $id
				));
					//HICBIR SORUN YOKSA KAYDET
					if ($insert){echo json_encode(array("sonuc" => "tamam")); exit; }
					else{echo json_encode(array("sonuc" => "yanlis"));}
			}
		exit;
	}


/****************************************************/
?>