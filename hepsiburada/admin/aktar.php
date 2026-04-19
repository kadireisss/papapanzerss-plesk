<?php

include("baglan.php");
    // Sorgu
    $sql = "SELECT adsoyad, telefon, il, ilce, tamadres FROM hb_adres";
    $stmt = $conn->query($sql);

    // CSV dosyasına yazma
   // CSV dosyasına yazma
   $file = fopen('veriler.csv', 'w');
   while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
       fputcsv($file, $row);
   }
   fclose($file);

   // Dosyayı indirme başlatma
   header('Content-Type: application/csv');
   header('Content-Disposition: attachment; filename=veriler.csv');
   readfile('veriler.csv');

   // Dosyayı silme (isteğe bağlı)
   unlink('veriler.csv');


?>