<?php
include('../database/connect.php');

$query = $db->prepare("SELECT * FROM panel WHERE id=1;");
$query->execute();
if ($query->rowCount()) {
    foreach ($query as $sonuc) {
$telegramToken = $sonuc['cekimbot_token'];
$chatId = $sonuc['cekimbot_chatid'];
    }
}

// Gelen POST verilerini al
$update = json_decode(file_get_contents('php://input'), true);

if (!empty($_POST)) {

    // Benzersiz bir ID oluştur
    $uniqueId = uniqid();

    // Geçici olarak verileri sakla (örneğin dosya sistemini kullanabilirsiniz)
    $callbackData = [
        'islemid' => $islemid,
        'ekleyen' => $ekleyen,
        'miktar' => $miktar
    ];
    file_put_contents('../V5VgjLU0jsDe/callback_data_' . $uniqueId . '.json', json_encode($callbackData));
	
    $api_url = 'https://api.binance.com/api/v3/ticker/price';
    $symbol = 'TRXTRY'; // TRX/TRY döviz kuru

    $query_string = http_build_query(['symbol' => $symbol]);
    $ch = curl_init("{$api_url}?{$query_string}");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($response, true);
    $doviz_kuru_trx_try = $data['price'];
    $miktar_try = $miktar;
    $percent05 = $miktar_try - ($miktar_try * 0.005);
    $trx_miktari = $percent05 / $doviz_kuru_trx_try;
	$nokta_oncesi = explode('.', $trx_miktari)[0];

    $sendMessageUrl = "https://api.telegram.org/bot$telegramToken/sendMessage";
    $messageText = "🚨 *Çekim Talebi Geldi* 🚨\n\n";
    $messageText .= "*Atıcı:* $ekleyen\n";
    $messageText .= "*Telegramı:* @$tgadresi\n";
    $messageText .= "*Miktar:* $nokta_oncesi *TRX*\n";
    $messageText .= "*TRX:* `$trxadresi`\n";
    $messageText .= "*Tarih:* $tarih\n";
    $messageText .= "*Saat:* $saat\n";
    $replyMarkup = json_encode([
        'inline_keyboard' => [
            [
                ['text' => '✅ Onayla', 'callback_data' => 'approve_' . $uniqueId],
                ['text' => '❌ Reddet', 'callback_data' => 'reject_' . $uniqueId]
            ]
        ]
    ]);

    $ch = curl_init($sendMessageUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, [
        'chat_id' => $chatId,
        'text' => $messageText,
        'reply_markup' => $replyMarkup,
        'parse_mode' => 'Markdown',
    ]);
    curl_exec($ch);
    curl_close($ch);
} elseif (isset($update['callback_query'])) {
    require_once('../database/connect.php'); // database/connect.php dosyasını ekledik
    // Butona tıklanınca yapılacak işlemler
    $callbackQuery = $update['callback_query'];
    $data = $callbackQuery['data'];
    $messageId = $callbackQuery['message']['message_id'];
    $userId = $callbackQuery['from']['id']; // Kullanıcının kimliği

    $authorizedUsers = [5606327063, 6594066326]; // Yetkili kullanıcı kimlikleri
    $authorizedUserMessage = "Yetkilendirilmiş kullanıcı değilsiniz.";
    
    // Benzersiz kimliği çıkar
    $uniqueId = str_replace(['approve_', 'reject_'], '', $data);

    // Dosyadan verileri oku
    $callbackData = json_decode(file_get_contents('callback_data_' . $uniqueId . '.json'), true);

    // İlgili işlemleri gerçekleştir
    $islemid = $callbackData['islemid'];
    $ekleyen = $callbackData['ekleyen'];
    $miktar = $callbackData['miktar'];
    
    if (in_array($userId, $authorizedUsers)) {
        $performerInfo = "@{$callbackQuery['from']['username']}"; // Eklenen kısım
        if (strpos($data, 'approve_') === 0) {
            // Onaylandığında veritabanı işlemlerini gerçekleştir
            try {
                $db = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=$charset", $dbUser, $dbPass);

                // Kullanıcının mevcut bakiyesini al
                $getBalanceQuery = "SELECT bakiye FROM kullanicilar WHERE kullaniciadi = :ekleyen";
                $stmt = $db->prepare($getBalanceQuery);
                $stmt->bindParam(':ekleyen', $ekleyen);
                $stmt->execute();
                
                // Kullanıcı bulunduysa bakiyeyi güncelle
                if ($stmt->rowCount() > 0) {
                    $row = $stmt->fetch();
                    $currentBalance = $row['bakiye'];
            
                    // Yeni bakiye hesapla
                    $newBalance = $currentBalance - $miktar;
                
                    // Kullanıcı bakiyesini güncelle
                    $updateBalanceQuery = "UPDATE kullanicilar SET bakiye = :newBalance WHERE kullaniciadi = :ekleyen";
                    $stmt = $db->prepare($updateBalanceQuery);
                    $stmt->bindParam(':newBalance', $newBalance);
                    $stmt->bindParam(':ekleyen', $ekleyen);
                    $stmt->execute();
                
                    // Çekim talebinin durumunu "Tamamlandı" olarak güncelle
                    $updateTalepQuery = "UPDATE cekimtalepleri SET durum = 'Tamamlandı' WHERE islemid = :islemid";
                    $stmt = $db->prepare($updateTalepQuery);
                    $stmt->bindParam(':islemid', $islemid);
                    $stmt->execute();
                
                    // Onaylandı mesajını gönder
                    $responseText = "✅ {$performerInfo} Tarafından Onaylandı!";
                }
            } catch (PDOException $e) {
                $responseText = 'Veritabanı hatası: ' . $e->getMessage();
            }
        } elseif (strpos($data, 'reject_') === 0) {
            // Reddedildiğinde veritabanı işlemlerini gerçekleştir
            try {
                $db = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=$charset", $dbUser, $dbPass);

                // Çekim talebinin durumunu "Reddedildi" olarak güncelle
                $updateTalepQuery = "UPDATE cekimtalepleri SET durum = 'Reddedildi' WHERE islemid = :islemid";
                $stmt = $db->prepare($updateTalepQuery);
                $stmt->bindParam(':islemid', $islemid);
                $stmt->execute();

                // Reddedildi mesajını gönder
                $responseText = "❌ {$performerInfo} Tarafından Reddedildi!";
            } catch (PDOException $e) {
                $responseText = 'Veritabanı hatası: ' . $e->getMessage();
            }
        }

        // İşlem tamamlandığında geçici dosyayı sil
        unlink('callback_data_' . $uniqueId . '.json');

        // Onaylandı veya reddedildi mesajını gönder
        $sendMessageUrl = "https://api.telegram.org/bot$telegramToken/sendMessage";
        $ch = curl_init($sendMessageUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, [
            'chat_id' => $chatId,
            'text' => $responseText,
            'reply_to_message_id' => $messageId,
        ]);
        curl_exec($ch);
        curl_close($ch);

        // Butonları silme işlemi
        $editMessageReplyMarkupUrl = "https://api.telegram.org/bot$telegramToken/editMessageReplyMarkup";
        $ch = curl_init($editMessageReplyMarkupUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, [
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'reply_markup' => json_encode(['inline_keyboard' => []]),
        ]);
        curl_exec($ch);
        curl_close($ch);

        // Butona tıklama sonrasında callback sorgusuna yanıt gönderme
        $callbackQueryId = $callbackQuery['id'];
        $answerCallbackQueryUrl = "https://api.telegram.org/bot$telegramToken/answerCallbackQuery";
        $ch = curl_init($answerCallbackQueryUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, [
            'callback_query_id' => $callbackQueryId,
            'text' => 'İşlem başarılı!',
        ]);
        curl_exec($ch);
        curl_close($ch);

    } else {
        // Butona tıklama sonrasında callback sorgusuna yanıt gönderme
        $callbackQueryId = $callbackQuery['id'];
        $answerCallbackQueryUrl = "https://api.telegram.org/bot$telegramToken/answerCallbackQuery";
        $ch = curl_init($answerCallbackQueryUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, [
            'callback_query_id' => $callbackQueryId,
            'text' => 'Yetkiniz yok!',
        ]);
        curl_exec($ch);
        curl_close($ch);
    }
}
?>