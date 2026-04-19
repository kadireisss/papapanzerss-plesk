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

if (isset($_POST['isActive'])) {
    $isActive = $_POST['isActive'];
    
    try {
        $updateQuery = $db->prepare("UPDATE bella_bim_settings SET isActive = :isActive");
        $updateQuery->bindParam(':isActive', $isActive, PDO::PARAM_INT);
        $updateQuery->execute();
        
        if ($updateQuery->rowCount() > 0) {
            echo "Veritabanı güncellendi!";
        } else {
            echo "Veritabanı güncellenemedi!";
        }
    } catch (PDOException $e) {
        echo "Veritabanı güncellemesi başarısız: " . $e->getMessage();
    }
} else {
    echo "Geçersiz istek!";
}
?>

