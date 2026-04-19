<?php

// Veritabanı bağlantısı
include_once('../inc/db_4.php');

// PUT veya PATCH metoduna izin vermek için kontrol
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // POST işlemleri buraya eklenir
} else {
    header('HTTP/1.1 405 Method Not Allowed');
    exit;
}

// PUT veya PATCH verilerini al
parse_str(file_get_contents('php://input'), $putData);
$botToken = $putData['botToken'];
$chatId = $putData['chatId'];

// Veritabanında güncelleme işlemi
$sql = "UPDATE bella_a101_telegram_bot SET bot_token='$botToken', chat_id='$chatId' WHERE id=1";

if ($conn->query($sql) === TRUE) {
    $response = array("success" => true);
} else {
    $response = array("success" => false, "message" => "Veritabanı güncelleme hatası: " . $conn->error);
}

$conn->close();

// JSON formatında yanıtı geri gönder
header('Content-Type: application/json');
echo json_encode($response);
?>