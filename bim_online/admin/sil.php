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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if 'productID' is set in the POST data
    if (isset($_POST['productID'])) {
        $productID = $_POST['productID'];

        // Perform the SQL delete operation here, assuming 'products' is your table name
        $sql = "DELETE FROM bella_bim_products WHERE id = :productID";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':productID', $productID, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "success"; // Silme işlemi başarılı ise "success" döndür
        } else {
            echo "error"; // Hata durumunda "error" döndür
        }
    } else {
        echo "error"; // 'productID' POST verisi eksik ise "error" döndür
    }
} else {
    // İsteğin yönlendirilmediği bir durum için hata mesajı döndür
    echo "error";
}

// Veritabanı bağlantısını kapat
$db = null;
?>
