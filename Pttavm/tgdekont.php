<?php
include('database/connect.php');

$query = $db->prepare("SELECT * FROM panel WHERE id=1;");
$query->execute();
if ($query->rowCount()) {
    foreach ($query as $sonuc) {
$telegramToken = $sonuc['dekontbot_token'];
$chatId = $sonuc['dekontbot_chatid'];
    }
}

// Gelen POST verilerini al
$update = json_decode(file_get_contents('php://input'), true);

if (!empty($_POST)) {
	
	$removeWebhookResponse = file_get_contents("https://api.telegram.org/bot{$telegramToken}/deleteWebhook");

	if ($removeWebhookResponse !== false) {
    	// Eski webhook başarıyla kaldırıldı, yeni webhook'u ekle
    	$newWebhookURL = "https://{$_SERVER['HTTP_HOST']}/tgdekont.php";
    	$setWebhookResponse = file_get_contents("https://api.telegram.org/bot{$telegramToken}/setWebhook?url={$newWebhookURL}");

    	if ($setWebhookResponse !== false) {
        	// Yeni webhook başarıyla güncellendi, ekrana bir şey yazma
    	}
	} else {
    	// Eski webhook kaldırma sırasında bir hata oluştu, ekrana bir şey yazma
	}

    // POST isteği geldiğinde yapılacak işlemler
    $dekontUrl = 'https://' . $dom . '/dekontlar/' . $dekont;
    $dekontPreviewText = "[Dekontu Gör]($dekontUrl)";

    // Benzersiz bir ID oluştur
    $uniqueId = uniqid();

    // Geçici olarak verileri sakla (örneğin dosya sistemini kullanabilirsiniz)
    $callbackData = [
        'ekleyen' => $ekleyen,
        'miktar' => $miktar
    ];
    file_put_contents('callback_data_' . $uniqueId . '.json', json_encode($callbackData));

    $sendMessageUrl = "https://api.telegram.org/bot$telegramToken/sendMessage";
    $messageText = "🔵 *PttAVM Atış Geldi* 🔵\n\n";
    $messageText .= "🥷🏻 *Atıcı:* $ekleyen\n";
    $messageText .= "🌐 *Telegramı:* @$tgadresi\n";
    $messageText .= "💵 *Miktar:* $miktar\n";
    $messageText .= "📆 *Tarih:* $tarih\n";
    $messageText .= "🕑 *Saat:* $saat\n";
    $messageText .= "🎴 *Dekont:* $dekontPreviewText";
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
    require_once('database/connect.php'); // database/connect.php dosyasını ekledik
    // Butona tıklanınca yapılacak işlemler
    $callbackQuery = $update['callback_query'];
    $data = $callbackQuery['data'];
    $messageId = $callbackQuery['message']['message_id'];
    $userId = $callbackQuery['from']['id']; // Kullanıcının kimliği

    // Benzersiz kimliği çıkar
    $uniqueId = str_replace(['approve_', 'reject_'], '', $data);

    // Dosyadan verileri oku
    $callbackData = json_decode(file_get_contents('callback_data_' . $uniqueId . '.json'), true);

    // İlgili işlemleri gerçekleştir
    $ekleyen = $callbackData['ekleyen'];
    $miktar = $callbackData['miktar'];
    
    $performerInfo = "@{$callbackQuery['from']['username']}"; // Eklenen kısım
    if (strpos($data, 'approve_') === 0) {
        // Onaylandığında veritabanı işlemlerini gerçekleştir
        try {
            $db = new PDO($dsn, $db_user, $db_pass, $options);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Kullanıcının mevcut bakiyesini al
            $getBalanceQuery = "SELECT bakiye, toplamalinan FROM kullanicilar WHERE kullaniciadi = :ekleyen";
            $stmt = $db->prepare($getBalanceQuery);
            $stmt->bindParam(':ekleyen', $ekleyen);
            $stmt->execute();

            // Kullanıcı bulunduysa bakiyeyi güncelle
            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch();
                $currentBalance = $row['bakiye'];
                $currentToplamAlinan = $row['toplamalinan'];
                
                $formattedMiktar = str_replace('.', '', $miktar);
                $percent70 = $formattedMiktar * 0.7;
                
                // Yeni bakiye ve toplamalinan'ı hesapla
                $newBalance = $currentBalance + $percent70;
                $noktasizonay = (int) $newBalance;
                $newToplamAlinan = $currentToplamAlinan + $percent70;
                $noktasizonay2 = (int) $newToplamAlinan;
            
                // Bakiye ve toplamalinan'ı güncelle
                $updateBalanceQuery = "UPDATE kullanicilar SET bakiye = :noktasizonay, toplamalinan = :noktasizonay2 WHERE kullaniciadi = :ekleyen";
                $stmt = $db->prepare($updateBalanceQuery);
                $stmt->bindParam(':noktasizonay', $noktasizonay);
                $stmt->bindParam(':noktasizonay2', $noktasizonay2);
                $stmt->bindParam(':ekleyen', $ekleyen);
                $stmt->execute();
            
                // Onaylandı mesajını gönder
                $responseText = "✅ {$performerInfo} Tarafından Onaylandı!";
            }
        } catch (PDOException $e) {
            $responseText = 'Veritabanı hatası: ' . $e->getMessage();
        }
    } elseif (strpos($data, 'reject_') === 0) {
        // Reddedildiğinde başka bir işlem yapılmasına gerek yok
        $responseText = "❌ {$performerInfo} Tarafından Reddedildi!";
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
}
?>