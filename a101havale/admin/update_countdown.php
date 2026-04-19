<?php
require_once("../inc/db.php");

try {
    $conn = db_connect();

    $newCountdownDate = isset($_POST["newCountdownDate"]) ? $_POST["newCountdownDate"] : null;

    if (!$newCountdownDate) {
        $errorMessage = "Yeni geri sayım tarihi belirtilmedi";
        error_log("update_countdown.php Hatası: $errorMessage");
        echo json_encode(["error" => $errorMessage]);
        exit;
    }

    $query = "UPDATE bella_a101_countdown SET countdown_date = :newCountdownDate WHERE id = 1";

    $stmt = $conn->prepare($query);
    $stmt->bindParam(':newCountdownDate', $newCountdownDate, PDO::PARAM_STR);

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        $errorMessage = $stmt->errorInfo();
        error_log("update_countdown.php Hatası: $errorMessage");
        echo json_encode(["success" => false, "error" => $errorMessage]);
    }
} catch (PDOException $e) {
    $errorMessage = $e->getMessage();
    error_log("update_countdown.php Hatası: $errorMessage");
    echo json_encode(["success" => false, "error" => $errorMessage]);
} finally {
    $conn = null;
}
?>
