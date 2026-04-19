<?php
include("../../database/connect.php");
session_start();

$kul_id = $_SESSION['kul_id'];

// Kullanıcıların son etkinlik zamanını kontrol etmek için kullanılan saniye cinsinden limit
$etkinlik_limiti_saniye = 3; //

$silme_limiti_saniye = 60;

// Giriş yapanlar tablosundan verileri al
$sql = "SELECT * FROM girisyapanlar WHERE ekleyen = '$kul_id' AND hizmet = 'Letgo' ORDER BY son_etkinlik_zamani DESC;";
$query = $db->query($sql);

if ($query) {
    // Şu anki zamanı al
    $simdi = time();

    // Sonuçları alma ve satır sayısını kontrol etme
    $row_count = $query->rowCount();
    if ($row_count > 0) {
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $ip_adresi = $row['ip_adresi'];
            $sayfa = $row['sayfa'];
            $urunadi = $row['urunadi'];
            $son_etkinlik_zamani = $row['son_etkinlik_zamani'];

            // Son etkinlik zamanına göre kullanıcının aktif olup olmadığını kontrol et
            if (($simdi - $son_etkinlik_zamani) <= $etkinlik_limiti_saniye) {
                $durum = "🟢"; // Aktif durumu
            } else {
                $durum = "🔴"; // Pasif durumu

                if (($simdi - $son_etkinlik_zamani) > $silme_limiti_saniye) {
                    $deleteSql = "DELETE FROM girisyapanlar WHERE id = :id";
                    $deleteQuery = $db->prepare($deleteSql);
                    $deleteQuery->bindParam(":id", $row['id'], PDO::PARAM_INT);
                    $deleteQuery->execute();
                    continue; // Silme işlemi gerçekleştiği için diğer işlemleri atla
                }
            }
            ?>
                <tr>
                    <td><h5 class="font-weight-small me-2"><b><div style="margin-left:23px; margin-bottom:6px"><font color="#25d6a2"><?php echo $urunadi;?></div></font><font color="#BFBFBF"><?php echo $durum . ' ' . $ip_adresi . ' - ' . $sayfa; ?></font></b></h5></td>
                </tr>
            <?php
        }
    }
}
?>
