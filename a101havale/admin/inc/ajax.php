<?php
// Turn off all error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// If the request method is not POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('HTTP/1.1 405 Method Not Allowed');
    exit;
}

// Include the database connection
include_once('../../inc/db.php');

// Include the functions
include_once('functions.php');

if ($_POST && $_POST['action'] === 'new-product') {
    $name = htmlspecialchars(trim(strip_tags($_POST['name'])));
    $sef_url = SefURL($name);
    $price = htmlspecialchars(trim(strip_tags($_POST['price'])));
    $code = htmlspecialchars(trim(strip_tags($_POST['code'])));
    $brand = htmlspecialchars(trim(strip_tags($_POST['brand'])));
    $properties = $_POST['properties'];

    // Check if files are uploaded
    if (
        !empty($_POST['name']) &&
        !empty($_POST['price']) &&
        !empty($_POST['code']) &&
        !empty($_POST['brand']) &&
        !empty($_POST['properties']) &&
        isset($_FILES['ImageURL']['name']) &&
        isset($_FILES['Image2URL']['name']) &&
        isset($_FILES['Image3URL']['name']) &&
        isset($_FILES['Image4URL']['name'])
    ) {
        // Define the directory where images will be uploaded
        $uploadDirectory = '../../sadece-online-ozel/assets/img/products/';

        // Check if the directory exists, create it if not
        if (!file_exists($uploadDirectory)) {
            mkdir($uploadDirectory, 0777, true);
        }

        // Define file names for ImageURL, Image2URL, Image3URL, and Image4URL
        $imageURL = $_FILES['ImageURL']['name'];
        $image2URL = $_FILES['Image2URL']['name'];
        $image3URL = $_FILES['Image3URL']['name'];
        $image4URL = $_FILES['Image4URL']['name'];

        // Move uploaded files to the specified directory
        move_uploaded_file($_FILES['ImageURL']['tmp_name'], $uploadDirectory . $imageURL);
        move_uploaded_file($_FILES['Image2URL']['tmp_name'], $uploadDirectory . $image2URL);
        move_uploaded_file($_FILES['Image3URL']['tmp_name'], $uploadDirectory . $image3URL);
        move_uploaded_file($_FILES['Image4URL']['tmp_name'], $uploadDirectory . $image4URL);

        $db = db_connect();
        $stmt = $db->prepare('INSERT INTO bella_a101_products (ProductName, ImageURL, Image2URL, Image3URL, Image4URL, ProductSefURL, ProductPrice, ProductProperties, ProductBrand, ProductCode) VALUES (:name, :image, :image2, :image3, :image4, :sef_url, :price, :properties, :brand, :code)');
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':image', $imageURL);
        $stmt->bindParam(':image2', $image2URL);
        $stmt->bindParam(':image3', $image3URL);
        $stmt->bindParam(':image4', $image4URL);
        $stmt->bindParam(':sef_url', $sef_url);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':properties', $properties);
        $stmt->bindParam(':brand', $brand);
        $stmt->bindParam(':code', $code);

        try {
            $stmt->execute();
            $response = [
                'status' => true,
                'message' => 'Ürün başarıyla eklendi!'
            ];
            echo json_encode($response);
            exit;
        } catch (Exception $e) {
            $response = [
                'status' => false,
                'message' => 'Ürün eklenirken bir hata oluştu!'
            ];
            echo json_encode($response);
            exit;
        }
    } else {
        // Dosya yüklenmediği durumu işleyin
        $response = [
            'status' => false,
            'message' => 'Lütfen tüm alanları doldurun!'
        ];
        echo json_encode($response);
        exit;
    }
}
// ... (Diğer kodlar)
