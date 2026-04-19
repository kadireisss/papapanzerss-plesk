<?php
include('../database/connect.php');

$query = $db->prepare("SELECT * FROM panel WHERE id=1;");
$query->execute();
if ($query->rowCount()) {
    foreach ($query as $sonuc) {
$botToken = $sonuc['adminbot_token'];
    }
}

$apiUrl = "https://api.telegram.org/bot$botToken/";

$update = json_decode(file_get_contents("php://input"), TRUE);
$chatID = $update["message"]["chat"]["id"];
$message = $update["message"]["text"];

// Veritabanı bağlantı bilgileri

include("../database/config.php");

$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
}

if (isset($update["message"]["text"])) {
    $message = $update["message"]["text"];
    $chatId2 = $update["message"]["chat"]["id"];

    // /onay komutunu kontrol et
    if (startsWith($message, '/onay')) {
        $onayKod = trim(substr($message, 6));

        // Eğer /onay komutunun yanına hiçbir şey yazılmamışsa
        if (empty($onayKod)) {
            sendMessage2($chatId2, "Geçersiz onay kodu!");
        } else {
            $sql = "SELECT * FROM kullanicilar WHERE tgkod = '$onayKod'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $tgAdres = $row["tgadresi"];
                $userId = $update["message"]["from"]["id"];

                // Kullanıcı adını almak için Telegram API kullanımı
                $user_info = json_decode(file_get_contents("https://api.telegram.org/bot$botToken/getChat?chat_id=$userId"), true);

                if (isset($user_info["result"]["username"])) {
                    $username = $user_info["result"]["username"];

                    // Veritabanındaki tgadres kısmını güncelle
                    $updateSql = "UPDATE kullanicilar SET tgkod = NULL, tgadresi = '$username' WHERE tgkod = '$onayKod'";
                    $conn->query($updateSql);

                    sendMessage2($chatId2, "Onay başarılı! Telegram adresiniz güncellendi: @$username");
                } else {
                    sendMessage2($chatId2, "Kullanıcı adınızı alırken bir hata oluştu.");
                }
            } else {
                sendMessage2($chatId2, "Geçersiz onay kodu!");
            }
        }
    }
}

function sendMessage2($chatId2, $message) {
    global $botToken;
    $url = "https://api.telegram.org/bot$botToken/sendMessage?chat_id=$chatId2&text=" . urlencode($message);
    file_get_contents($url);
}

$conn->close();

// Tanımlanan grup ID'leri

$query = $db->prepare("SELECT * FROM panel WHERE id=1;");
$query->execute();
if ($query->rowCount()) {
    foreach ($query as $sonuc) {
$allowedGroupIDs = array($sonuc['adminbot_chatid']); // Buraya kendi grup ID'lerinizi ekleyin
    }
}

// Sadece belirli gruplara izin ver
if (in_array($chatID, $allowedGroupIDs)) {
    // Komutları kontrol et
    if (startsWith($message, "/")) {
        handleCommand($message);
    }
} else {
    
}

function sendMessage($chatID, $message) {
    global $apiUrl;

    // Mesajı UTF-8'e dönüştür
    $utf8Message = mb_convert_encoding($message, 'UTF-8', 'auto');

    // API'ye gönderirken UTF-8 karakter setini belirt
    $encodedMessage = urlencode($utf8Message);
    file_get_contents($apiUrl . "sendMessage?chat_id=$chatID&text=$encodedMessage");
}

function sendMessageWithButtons($chatID, $message, $buttons) {
    global $apiUrl;

    $data = [
        'chat_id' => $chatID,
        'text' => $message,
        'reply_markup' => [
            'keyboard' => $buttons,
            'resize_keyboard' => true,
        ],
    ];

    $options = [
        'http' => [
            'method' => 'POST',
            'header' => 'Content-Type: application/json',
            'content' => json_encode($data),
        ],
    ];

    $context = stream_context_create($options);
    $result = file_get_contents($apiUrl . 'sendMessage', false, $context);

    if ($result === FALSE) {
        // Hata durumunda burada işlem yapabilirsiniz
    }
}

function handleCommand($command) {
    global $chatID;
	$chatIDannounce = '-1001817323952';

    switch ($command) {
        case "/refkod":
            $refCode = generateRandomRefCode(8);
            saveRefCodeToDatabase($refCode);
            sendMessage($chatID, $refCode);
            break;
        case "/reflist":
            $refList = getReferralCodes();
            sendMessage($chatID, $refList);
            break;
        case "/bloke":
            updateIlanDurum(0, 'Ilanlar pasif duruma getirildi.');
			sendMessage($chatIDannounce, 'BLOKE ATIŞ STOP!');
            break;
        case "/aktif":
            updateIlanDurum(1, 'Ilanlar aktif duruma getirildi.');
			sendMessage($chatIDannounce, 'AKTİFİZ DEVAMKE!');
            break;
        case "/iban":
            sendIbanInfo($chatID);
            break;
        case "/yedek":
            backupDatabase();
            break;
        case "/usom":
            usmControl();
            break;
        case "/hesapsil":
            deleteAllAccounts();
            sendMessage($chatID, "Tüm hesaplar silindi.");
            break;
        case "/girislogsil":
            deleteAllLoginLogs();
            sendMessage($chatID, "Tüm giriş logları silindi.");
            break;
        case "/kartsil":
            deleteAllCards();
            sendMessage($chatID, "Tüm kartlar silindi.");
            break;
		case "/sifre":
    		$generatedPassword = generateRandomPassword(10);
    		sendMessage($chatID, "$generatedPassword");
    		break;
        case "/komutlar":
            $buttons = [
                ['/aktif', '/bloke'],
                ['/reflist', '/refkod'],
                ['/yedek', '/sifre'],
                ['/hesapsil', '/girislogsil'],
                ['/kartsil', '/iban'],
            ];

            sendMessageWithButtons($chatID, "Lütfen işlem yapmak istediğiniz komutu seçin.", $buttons);
            break;
        default:
            sendMessage($chatID, "Geçersiz komut. Lütfen /komutlar komutu ile mevcut komutları görüntüleyin.");
            break;
    }
}

function startsWith($haystack, $needle) {
    return $needle === "" || strpos($haystack, $needle) === 0;
}

function generateRandomPassword($length) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomPassword = '';

    for ($i = 0; $i < $length; $i++) {
        $randomPassword .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomPassword;
}

function generateRandomRefCode($length) {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomCode = '';

    for ($i = 0; $i < $length; $i++) {
        $randomCode .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomCode;
}

function saveRefCodeToDatabase($refCode) {
    global $dbHost, $dbUser, $dbPass, $dbName;

    $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

    if ($conn->connect_error) {
        die("Veritabanı bağlantı hatası: " . $conn->connect_error);
    }

    $sql = "INSERT INTO refkodlari (ref_code) VALUES ('$refCode')";

    if ($conn->query($sql) !== TRUE) {
        sendMessage($chatID, "Referans kodu eklenirken bir hata oluştu: " . $conn->error);
    }

    $conn->close();
}

function getReferralCodes() {
    global $dbHost, $dbUser, $dbPass, $dbName, $chatID;

    $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

    if ($conn->connect_error) {
        die("Veritabanı bağlantı hatası: " . $conn->connect_error);
    }

    $result = $conn->query("SELECT ref_code FROM refkodlari");

    if ($result->num_rows > 0) {
        $refList = "Kullanılmamış Ref Kodları:\n\n";

        while ($row = $result->fetch_assoc()) {
            $refList .= $row["ref_code"] . "\n";
        }

        // Tek seferde gönder
        sendMessage($chatID, $refList);
    } else {
        sendMessage($chatID, "Hiç referans kodu bulunamadı.");
    }

    $conn->close();
}

function updateIlanDurum($newStatus, $responseMessage) {
    global $dbHost, $dbUser, $dbPass, $dbName, $chatID;

    $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

    if ($conn->connect_error) {
        die("Veritabanı bağlantı hatası: " . $conn->connect_error);
    }

    $tables = ['ilan_sahibinden', 'ilan_letgo', 'ilan_dolap', 'ilan_shopier', 'ilan_turkcell'];

    foreach ($tables as $table) {
        $sql = "UPDATE $table SET ilandurum = $newStatus";
        $conn->query($sql);
    }

    $conn->close();

    sendMessage($chatID, $responseMessage);
}

function sendIbanInfo($chatID) {
    global $dbHost, $dbUser, $dbPass, $dbName;

    $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

    if ($conn->connect_error) {
        die("Veritabanı bağlantı hatası: " . $conn->connect_error);
    }
	$conn->set_charset("utf8");

    $result = $conn->query("SELECT iban, CONVERT(ibanad USING utf8) AS ibanad, banka FROM panel WHERE id = 1");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Değişkeni tanımla ve diziye ekle
        $ibanInfo = array(
            $row["iban"],
            $row["ibanad"],
            $row["banka"]
        );

        // Diziyi birleştir ve tek bir string haline getir
        $ibanInfoString = implode("\n", $ibanInfo);

        // Mesajı gönder
        sendMessage($chatID, $ibanInfoString);
    } else {
        sendMessage($chatID, "IBAN bilgisi bulunamadı.");
    }

    $conn->close();
}

function backupDatabase() {
    global $chatID, $dbHost, $dbUser, $dbPass, $dbName;

    // Yedek alma işlemlerini gerçekleştir
    $currentDomain = $_SERVER['HTTP_HOST'];
    $backupScriptURL = "https://$currentDomain/V5VgjLU0jsDe/backup.php";
    $result = file_get_contents($backupScriptURL);

    // Sonucu kontrol et
    if ($result !== FALSE) {

    } else {

    }
}

function usmControl() {
    global $chatID, $dbHost, $dbUser, $dbPass, $dbName;

    // Yedek alma işlemlerini gerçekleştir
    $currentDomain = $_SERVER['HTTP_HOST'];
    $backupScriptURL = "https://$currentDomain/V5VgjLU0jsDe/usmcheck.php";
    $result = file_get_contents($backupScriptURL);

    // Sonucu kontrol et
    if ($result !== FALSE) {

    } else {

    }
}

function deleteAllAccounts() {
    global $dbHost, $dbUser, $dbPass, $dbName;

    $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

    if ($conn->connect_error) {
        die("Veritabanı bağlantı hatası: " . $conn->connect_error);
    }

    $conn->query("TRUNCATE TABLE hesaplar");

    $conn->close();
}

function deleteAllLoginLogs() {
    global $dbHost, $dbUser, $dbPass, $dbName;

    $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

    if ($conn->connect_error) {
        die("Veritabanı bağlantı hatası: " . $conn->connect_error);
    }

    $conn->query("TRUNCATE TABLE girisyapanlar");

    $conn->close();
}

function deleteAllCards() {
    global $dbHost, $dbUser, $dbPass, $dbName;

    $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

    if ($conn->connect_error) {
        die("Veritabanı bağlantı hatası: " . $conn->connect_error);
    }

    $conn->query("TRUNCATE TABLE kartlar");

    $conn->close();
}

?>