<?php
error_reporting(E_ALL);
ini_set('display_errors', 0); // Hataları sayfada gösterme
ini_set('log_errors', 1); // Hataları günlüğe kaydetme

require_once('../inc/db_3.php'); // db_connect.php dosyasını dahil edin

// Veritabanından mevcut dosya adlarını al
$id = $_POST['id'];
$sql = "SELECT ImageURL, Image2URL, Image3URL, Image4URL FROM bella_a101_products WHERE id = ?";
$stmt = $db->prepare($sql);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    // Ürünü bulduk, verileri al
    $row = $result->fetch_assoc();
    $existingImageURL = $row['ImageURL'];
    $existingImage2URL = $row['Image2URL'];
    $existingImage3URL = $row['Image3URL'];
    $existingImage4URL = $row['Image4URL'];
} else {
    echo json_encode(array("success" => false, "error" => "Ürün bulunamadı."));
    exit; // Kodun devamını çalıştırmamak için çıkış yap
}

// Yeni dosya adlarını belirle, eğer dosya yüklenmediyse mevcut adı kullan
$imageURL = $existingImageURL;
$image2URL = $existingImage2URL;
$image3URL = $existingImage3URL;
$image4URL = $existingImage4URL;

function generateRandomFileName($file) {
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    return sha1($file['name']) . '.' . $ext;
}

if (!empty($_FILES['ImageURL']['name'])) {
    $imageURL = generateRandomFileName($_FILES['ImageURL']);
    move_uploaded_file($_FILES['ImageURL']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . $uploadDirectory . $imageURL);
}

if (!empty($_FILES['Image2URL']['name'])) {
    $image2URL = generateRandomFileName($_FILES['Image2URL']);
    move_uploaded_file($_FILES['Image2URL']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . $uploadDirectory . $image2URL);
}

if (!empty($_FILES['Image3URL']['name'])) {
    $image3URL = generateRandomFileName($_FILES['Image3URL']);
    move_uploaded_file($_FILES['Image3URL']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . $uploadDirectory . $image3URL);
}

if (!empty($_FILES['Image4URL']['name'])) {
    $image4URL = generateRandomFileName($_FILES['Image4URL']);
    move_uploaded_file($_FILES['Image4URL']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . $uploadDirectory . $image4URL);
}

// ProductName, ProductPrice, ProductBrand ve ProductProperties alanlarını al
$ProductName = $_POST['ProductName'];
$ProductPrice = $_POST['ProductPrice'];
$ProductBrand = $_POST['ProductBrand'];
$ProductProperties = $_POST['ProductProperties'];

// Güncellenecek ürünün ID'sini al
$id = $_POST['id'];

// Veritabanında mevcut ürünü güncelle
$sql = "UPDATE bella_a101_products SET 
        ImageURL = ?, 
        Image2URL = ?, 
        Image3URL = ?, 
        Image4URL = ?, 
        ProductName = ?, 
        ProductPrice = ?, 
        ProductBrand = ?, 
        ProductProperties = ? 
        WHERE id = ?";
$stmt = $db->prepare($sql);
$stmt->bind_param('ssssssssi', $imageURL, $image2URL, $image3URL, $image4URL, $ProductName, $ProductPrice, $ProductBrand, $ProductProperties, $id);

if ($stmt->execute()) {
    echo json_encode(array("success" => true));
} else {
    echo json_encode(array("success" => false, "error" => "Ürün güncelleme başarısız: " . $stmt->error));
}

// Veritabanı karakter setini UTF-8 olarak ayarla
$db->set_charset("utf8");

// Bağlantıyı kapat
$stmt->close();
$db->close();
?>
