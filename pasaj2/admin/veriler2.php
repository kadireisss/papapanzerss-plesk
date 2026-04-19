<?php
include '../db/connect.php';

$sorgu = "SELECT * FROM bella_pj_urunler ORDER BY id DESC";
$sonuclar = $baglanti->query($sorgu);

$tablo = "";
while ($row = $sonuclar->fetch(PDO::FETCH_ASSOC)) {
    $tablo .= '<tr>
        <td><img width="200" src="' . $row['resim1'] . '"></td>
        <td>' . $row['urunismi'] . '</td>
        <td><a href="../index.php?id=' . $row['urunlink'] . '">Link</a></td>
        <td>' . $row['fiyat'] . '</td>
        <td>
        <a href="duzenle.php?id='.$row["id"].'"><button class="btn btn-success">Düzenle</button></a>
        <a href="islem.php?islem=sil&tur=urun&id='.$row["id"].'"><button class="btn btn-danger">Sil</button>
        </td>
    </tr>';
}
echo $tablo;
$baglanti = null;
?>
