<?php
require_once('../inc/db_2.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kullanıcının girdiği değerleri alın
    $bankName = $_POST["bank_name"];
    $iban = $_POST["iban"];
    $nameSurname = $_POST["name_surname"];

// Dosya yükleme işlemi
$targetDirectory = "uploads/"; // Dosyaların yükleneceği klasör
$originalFileName = $_FILES["bank_logo"]["name"]; // Orijinal dosya adını al

// Rasgele 8 haneli bir dize oluştur
$randomString = substr(str_shuffle("0123456789"), 0, 8);

// Dosya uzantısını al
$fileExtension = strtolower(pathinfo($originalFileName, PATHINFO_EXTENSION));

// Yeni dosya adını oluştur
$newFileName = $randomString . '.' . $fileExtension;

// Dosyayı hedef klasöre taşı
$targetFile = $targetDirectory . $newFileName;

// Dosyayı klasöre yükle
if (move_uploaded_file($_FILES["bank_logo"]["tmp_name"], $targetFile)) {
    // MySQL veritabanında güncelleme yapma sorgusu (id'si 1 olan kaydı güncelle)
    $updateQuery = "UPDATE bella_a101_banks SET bank_logo = ?, bank_name = ?, iban = ?, name_surname = ? WHERE id = 1";

    // Sorguyu hazırla ve bağlantıyı kullanarak çalıştır
    if ($stmt = $db->prepare($updateQuery)) {
        // Veri türlerini ve değerlerini bağla
        $stmt->bind_param("ssss", $newFileName, $bankName, $iban, $nameSurname);

        // Sorguyu çalıştır
        if ($stmt->execute()) {
            $response = array(
                "success" => true,
                "message" => "Banka bilgileri ve logo başarıyla güncellendi."
            );
        } else {
            $response = array(
                "success" => false,
                "message" => "Güncelleme hatası: " . $stmt->error
            );
        }

        // İşlem sonrası bağlantıyı kapat
        $stmt->close();
    } else {
        $response = array(
            "success" => false,
            "message" => "Sorgu hazırlama hatası: " . $db->error
        );
    }
} else {
    $response = array(
        "success" => false,
        "message" => "Dosya yükleme hatası."
    );
}

// Sonuç mesajını JSON formatında döndür
echo json_encode($response);
}
?>