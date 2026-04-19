<?php
// Start the session
session_start();
ob_start();

// If the user is not logged in
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

// Include the database connection
include_once('../inc/db.php');
$db = db_connect();

// Örneğin, veritabanındaki güncellemeleri kontrol edin
$count = $db->query('SELECT COUNT(*) FROM bella_bim_logs')->fetchColumn();

// Önceki sayfa yükleme sırasında saklanan son sayımı alın
$last_count = $_COOKIE['last_count'] ?? 0;

// Eğer güncelleme varsa, JSON yanıtında "updatesAvailable" anahtarını true olarak ayarlayın
$response = array('updatesAvailable' => ($count > $last_count));

// Son sayımı güncelleyin
setcookie('last_count', $count, time() + 60 * 60 * 24 * 30); // 30 gün

// JSON yanıtını döndürün
header('Content-Type: application/json');
echo json_encode($response);
?>
