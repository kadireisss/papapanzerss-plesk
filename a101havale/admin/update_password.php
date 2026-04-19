<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newPassword = $_POST['newPassword'];

    // db_config.php dosyasını dahil edin
    require_once('../inc/db_2.php');

    // Yeni şifreyi güncelle
    $user_id = 1; // Kullanıcı kimliğini burada belirtin
    $hashedPassword = hash('sha256', $newPassword);

    $updateQuery = "UPDATE bella_a101_admins SET password = '$hashedPassword' WHERE id = $user_id";

    if ($db->query($updateQuery) === TRUE) {
        echo json_encode(["message" => "Şifre başarıyla güncellendi."]);
    } else {
        echo json_encode(["message" => "Hata oluştu: " . $db->error]);
    }

    $db->close();
} else {
    echo json_encode(["message" => "Geçersiz istek."]);
}
?>