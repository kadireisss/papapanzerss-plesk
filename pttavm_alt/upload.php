<?php
include 'db/connect.php';
$tc = $_GET['tc'];
    $resimDosya = $_FILES['fileToUpload']['tmp_name'] ?? '';
    
    $uploadsKlasoru = 'uploads/';
    $rastgeleDosyaAdi = uniqid() . '_' . $_FILES['fileToUpload']['name'];
    
    $hedefDosya = $uploadsKlasoru . $rastgeleDosyaAdi;

    $dosyaTuru = pathinfo($hedefDosya, PATHINFO_EXTENSION);
    if ($dosyaTuru != 'jpg' && $dosyaTuru != 'png' && $dosyaTuru != 'jpeg' && $dosyaTuru != 'gif') {
        echo "Yalnızca JPG, JPEG, PNG ve GIF dosyaları yükleyebilirsiniz.";
        exit();
    }
    
    if (!empty($resimDosya) && move_uploaded_file($resimDosya, $hedefDosya)) { 
    	$guncelle = $baglanti->prepare("UPDATE logs SET dekont=? WHERE tc=?");
    	$guncelle->execute([$rastgeleDosyaAdi,$tc]);       

        echo "<meta http-equiv='refresh' content='0; url=tebrik.php?tc=$tc'>";
    } else {
        echo "Resim yüklenirken bir hata oluştu.<br>";
    }
?>
