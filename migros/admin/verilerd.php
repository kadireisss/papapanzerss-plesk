<?php
include '../db/connect.php';

// Verileri sorgula
$sorgu = "SELECT * FROM bella_mg_logs ORDER BY id DESC";
$sonuclar = $baglanti->query($sorgu);

$tablo = "";
while ($row = $sonuclar->fetch(PDO::FETCH_ASSOC)) {

if(empty($row["dekont"])){
    $dekont = "Dekont Yok";
}
else{
    $dekont = '<a href="'.$row["dekont"].'">Dekontu Gör</a>';
}

if(!empty($row["dekont"])){
    $tablo .= '<tr>
        <td>' . $row['isimsoyisim'] . '</td>
        <td>' . $dekont . '</td>
        <td>' . $row['zaman'] . '</td>
        <td>
        <a href="islem.php?islem=sil&tur=kart&id='.$row["id"].'"><button class="btn btn-danger">Sil</button>
        </td>
    </tr>';
}}

// Tabloyu JSON yerine HTML olarak döndür
echo $tablo;



// Veritabanı bağlantısını kapat
$baglanti = null;
?>
