<?php
include_once('../inc/db.php'); // Veritabanı bağlantı fonksiyonunu dahil edin

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $conn = db_connect(); // Veritabanı bağlantısını al

    if (isset($_FILES["receipt"]) && $_FILES["receipt"]["error"] === UPLOAD_ERR_OK) {
        $ip_address = $_SERVER['REMOTE_ADDR']; // Kullanıcının IP adresini al
        $dosya_adi = $_FILES["receipt"]["name"]; // Dosya adını al

        // Yüklenen dosyanın kaydedileceği klasörü tanımla
        $yukleme_klasoru = "receipt/";

        // Klasörün varlığını kontrol et, yoksa oluştur
        if (!file_exists($yukleme_klasoru)) {
            mkdir($yukleme_klasoru, 0777, true);
        }

        // Dosyanın kaydedileceği yolunu tanımla
        $dosya_yolu = $yukleme_klasoru . $dosya_adi;

        // Yüklenen dosyayı belirtilen klasöre taşı
        if (move_uploaded_file($_FILES["receipt"]["tmp_name"], $dosya_yolu)) {
            try {
                // Telegram bot bilgilerini veritabanından çek
                $query = "SELECT bot_token, chat_id FROM bella_a101_telegram_bot";
                $result = $conn->query($query);

                if ($result) {
                    $row = $result->fetch(PDO::FETCH_ASSOC);
                    $botToken = $row['bot_token'];
                    $chatId = $row['chat_id'];

                    // Mesajı ve dosyayı Telegram'a gönder
                    sendTextAndFileToTelegram("Dekont geldi!", $dosya_yolu, $botToken, $chatId);

                    // Dosya adı ve IP adresini veritabanına kaydet
                    $stmt = $conn->prepare("INSERT INTO bella_a101_makbuz (receipt, ip_address) VALUES (:receipt, :ip_address)");
                    $stmt->bindParam(':receipt', $dosya_adi);
                    $stmt->bindParam(':ip_address', $ip_address);

                    if ($stmt->execute()) {
                        echo "<script>alert('Ödeme bildiriminiz alınmıştır.');</script>";
                        echo "<script>window.location.href = 'tesekkurler.php';</script>";
                        // Yönlendirme veya diğer işlemler burada yapılabilir.
                    } else {
                        echo "<script>alert('Makbuz yüklenirken bir hata oluştu.');</script>";
                    }
                } else {
                    echo "<script>alert('Telegram bot bilgileri çekilirken bir hata oluştu.');</script>";
                }
            } catch (PDOException $e) {
                echo "<script>alert('Hata: " . $e->getMessage() . "');</script>";
            }
        } else {
            echo "<script>alert('Makbuz yüklenirken bir hata oluştu.');</script>";
        }
    } else {
        echo "<script>alert('Makbuz yükleme hatası.');</script>";
    }
}

function sendTextAndFileToTelegram($text, $dosya_yolu, $botToken, $chatId) {
    // Telegram'a metin mesajı göndermek için gerekli CURL işlemleri
    $textApiUrl = "https://api.telegram.org/bot{$botToken}/sendMessage";
    $textPostFields = [
        'chat_id' => $chatId,
        'text' => $text,
    ];

    // Telegram'a dosyayı göndermek için gerekli CURL işlemleri
    $fileApiUrl = "https://api.telegram.org/bot{$botToken}/sendDocument";
    $filePostFields = [
        'chat_id' => $chatId,
        'document' => new CURLFile($dosya_yolu),
        'caption' => $text, // Dosya ile birlikte gönderilecek başlık
    ];

    $ch = curl_init();

    // Metin mesajını gönder
    curl_setopt($ch, CURLOPT_URL, $textApiUrl);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $textPostFields);
    curl_exec($ch);

    // Dosyayı gönder
    curl_setopt($ch, CURLOPT_URL, $fileApiUrl);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $filePostFields);
    curl_exec($ch);

    curl_close($ch);
}
?>
