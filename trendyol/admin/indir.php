
<?php


include('baglan.php');





// Veriyi çek
$sql = "SELECT * FROM ty_adres";
$result = $conn->query($sql);

// Excel dosyasına veriyi ekle
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="veri.xlsx"');
header('Cache-Control: max-age=0');

// Excel dosyasının başlık satırını oluştur
echo "ID\tadsoyad\ttelefonno\n\ID\til\tilce\n\ID\ttamadres\n";

// Veriyi döngü ile ekleyin
while ($row = $result->fetch_assoc()) {
    echo $row['id'] . "\t" . $row['adsoyad'] . "\t" . $row['telefonno'] . "\t" . $row['il'] . "\t" . $row['ilce'] . "\t" . $row['tamadres'] . "\n";
}

// Bağlantıyı kapat
$conn->close();
?>