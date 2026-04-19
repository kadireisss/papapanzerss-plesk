<?php
// MySQL bağlantı bilgileri
require_once('../database/connect.php');

// Yedek dosyasının adı ve yolu
$backupFolder = 'backups'; // Yedek dosyalarının kaydedileceği klasör
if (!is_dir($backupFolder)) {
    mkdir($backupFolder, 0777, true); // Klasör yoksa oluştur
}

$backupFile = $backupFolder . '/yedek_' . date('Y-m-d_H-i-s') . '.sql'; // Tarih ve saat bilgisi eklenmiş dosya adı

// MySQL yedeği alma
exec("mysqldump -u$dbUser -p$dbPass --host=$dbHost $dbName > $backupFile");

// Telegram API'ye bildirim gönderme
$query = $db->prepare("SELECT * FROM panel WHERE id=1;");
$query->execute();
if ($query->rowCount()) {
    foreach ($query as $sonuc) {
$telegramBotToken = $sonuc['adminbot_token'];
$telegramChatID = $sonuc['adminbot_chatid'];
    }
}


$document = new CURLFile(realpath($backupFile));

// Dosyayı Telegram'a gönderme
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot$telegramBotToken/sendDocument");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, [
    'chat_id' => $telegramChatID,
    'document' => $document,
    'caption' => 'MySQL Yedeği', // İsteğe bağlı: Dosya için bir başlık
]);
curl_exec($ch);
curl_close($ch);

// Dosyayı sildikten sonra
unlink($backupFile);
?>
