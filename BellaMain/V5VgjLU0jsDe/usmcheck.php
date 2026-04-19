<?php
include("../database/connect.php");

$query = $db->prepare("SELECT * FROM panel WHERE id=1;");
$query->execute();
if ($query->rowCount()) {
    foreach ($query as $sonuc) {
$telegramBotToken = $sonuc['adminbot_token'];
    }
}

$telegramChatId = '-1001817323952';

$query = $db->prepare("SELECT * FROM panel WHERE id=1;");
$query->execute();

if ($query->rowCount()) {
    $sonuc = $query->fetch(PDO::FETCH_ASSOC);

    $url = "https://www.usom.gov.tr/url-list.txt";
    $targetDomains = [
        $sonuc['dom_panel'],
        $sonuc['dom_sahibinden'],
        $sonuc['dom_dolap'],
        $sonuc['dom_letgo'],
        $sonuc['dom_pttavm'],
        $sonuc['dom_turkcell'],
        $sonuc['dom_shopier'],
        $sonuc['dom_yurtici']
    ];

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $fileContent = curl_exec($ch);
    curl_close($ch);

    foreach ($targetDomains as $targetDomain) {
        if (strpos($fileContent, $targetDomain) !== false) {
            sendTelegramMessage("*Usom Yedik Atış Stop*\n$targetDomain");
        } else {
            echo "$targetDomain temiz.<br>";
        }
    }
}

function sendTelegramMessage($message) {
    global $telegramBotToken, $telegramChatId;

    $url = "https://api.telegram.org/bot$telegramBotToken/sendMessage";
    $params = [
        'chat_id' => $telegramChatId,
        'text' => $message,
        'reply_markup' => $replyMarkup,
        'parse_mode' => 'Markdown',
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    curl_close($ch);
}

?>