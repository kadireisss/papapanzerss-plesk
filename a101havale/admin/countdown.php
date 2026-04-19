<?php
include('../inc/db.php');

try {
    $conn = db_connect();

    $query = "SELECT countdown_date FROM bella_a101_countdown";
    
    $result = $conn->query($query);

    if ($result !== false) {
        if ($result->rowCount() > 0) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            $countdownDate = $row["countdown_date"];
        } else {
            $countdownDate = null;
        }

        echo json_encode(["countdownDate" => $countdownDate]);
    } else {
        $errorMessage = "Veritabanı sorgusu başarısız oldu";
        error_log("countdown.php Hatası: $errorMessage");
        echo json_encode(["error" => $errorMessage]);
    }
} catch (PDOException $e) {
    $errorMessage = $e->getMessage();
    error_log("countdown.php Hatası: $errorMessage");
    echo json_encode(["error" => $errorMessage]);
} finally {
    $conn = null;
}
?>
