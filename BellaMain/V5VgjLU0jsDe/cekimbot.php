<?php
/**
 * Çekim talebi Telegram bildirimi + webhook callback (onay/red).
 * Hem doğrudan URL'den hem post.php include ile çalışır.
 */
declare(strict_types=1);

require_once __DIR__ . '/../database/connect.php';
require_once __DIR__ . '/../includes/admin_helper.php';

$telegramToken = '';
$chatId = '';
try {
    $query = $db->prepare('SELECT cekimbot_token, cekimbot_chatid FROM panel WHERE id = 1 LIMIT 1');
    $query->execute();
    $row = $query->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        $telegramToken = trim((string) ($row['cekimbot_token'] ?? ''));
        $chatId = trim((string) ($row['cekimbot_chatid'] ?? ''));
    }
} catch (Throwable $e) {
    // sessiz
}

$rawInput = (string) file_get_contents('php://input');
$update = json_decode($rawInput, true);
if (!is_array($update)) {
    $update = [];
}

$callbackDir = __DIR__;
$callbackFile = static function (string $uniqueId) use ($callbackDir): string {
    return $callbackDir . '/callback_data_' . $uniqueId . '.json';
};

if (!empty($_POST) && isset($_POST['cekimtalebi'])) {
    $islemid = isset($islemid) ? (string) $islemid : (string) ($_POST['islemid'] ?? '');
    $ekleyen = isset($ekleyen) ? (string) $ekleyen : (string) ($_POST['ekleyen'] ?? '');
    $miktar = isset($miktar) ? (string) $miktar : (string) ($_POST['miktar'] ?? '');
    $trxadresi = isset($trxadresi) ? (string) $trxadresi : (string) ($_POST['trxadresi'] ?? '');
    $tgadresi = isset($tgadresi) ? (string) $tgadresi : (string) ($_POST['tgadresi'] ?? '');
    $tarih = isset($tarih) ? (string) $tarih : (string) (date('d/m/Y'));
    $saat = isset($saat) ? (string) $saat : (string) (date('H:i:s'));

    if ($telegramToken === '' || $chatId === '') {
        return;
    }

    // Telegram callback_data max 64 byte — kisa token
    $uniqueId = bin2hex(random_bytes(9));
    $callbackPayload = [
        'islemid' => $islemid,
        'ekleyen' => $ekleyen,
        'miktar' => $miktar,
    ];
    @file_put_contents($callbackFile($uniqueId), json_encode($callbackPayload, JSON_UNESCAPED_UNICODE));

    $api_url = 'https://api.binance.com/api/v3/ticker/price';
    $symbol = 'TRXTRY';
    $ch = curl_init("{$api_url}?" . http_build_query(['symbol' => $symbol]));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 8);
    $response = curl_exec($ch);
    curl_close($ch);

    $data = json_decode((string) $response, true);
    $doviz_kuru_trx_try = isset($data['price']) ? (float) $data['price'] : 0.0;
    if ($doviz_kuru_trx_try <= 0) {
        $doviz_kuru_trx_try = 4.2;
    }

    $miktar_try = function_exists('bellla_try_amount_float') ? bellla_try_amount_float($miktar) : (float) preg_replace('/[^\d.]/', '', (string) $miktar);
    $percent05 = $miktar_try - ($miktar_try * 0.005);
    $trx_miktari = $percent05 / $doviz_kuru_trx_try;
    $parts = explode('.', (string) $trx_miktari);
    $nokta_oncesi = $parts[0] !== '' ? $parts[0] : '0';

    $trxEsc = str_replace(['`', '_'], ["'", ''], $trxadresi);
    $messageText = "🚨 *Çekim Talebi Geldi* 🚨\n\n";
    $messageText .= '*Atıcı:* ' . $ekleyen . "\n";
    $messageText .= '*Telegramı:* @' . ltrim((string) $tgadresi, '@') . "\n";
    $messageText .= '*Miktar:* ' . $nokta_oncesi . " *TRX*\n";
    $messageText .= '*TRX:* `' . $trxEsc . "`\n";
    $messageText .= '*Tarih:* ' . $tarih . "\n";
    $messageText .= '*Saat:* ' . $saat . "\n";

    $replyMarkup = json_encode([
        'inline_keyboard' => [
            [
                ['text' => '✅ Onayla', 'callback_data' => 'approve_' . $uniqueId],
                ['text' => '❌ Reddet', 'callback_data' => 'reject_' . $uniqueId],
            ],
        ],
    ], JSON_UNESCAPED_UNICODE);

    $sendMessageUrl = 'https://api.telegram.org/bot' . $telegramToken . '/sendMessage';
    $ch = curl_init($sendMessageUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, [
        'chat_id' => $chatId,
        'text' => $messageText,
        'reply_markup' => $replyMarkup,
        'parse_mode' => 'Markdown',
    ]);
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    curl_exec($ch);
    curl_close($ch);
} elseif (isset($update['callback_query'])) {
    $callbackQuery = $update['callback_query'];
    $data = (string) ($callbackQuery['data'] ?? '');
    $messageId = (int) ($callbackQuery['message']['message_id'] ?? 0);
    $userId = (int) ($callbackQuery['from']['id'] ?? 0);

    $authorizedUsers = [5606327063, 6594066326];
    $uniqueId = preg_replace('/^(approve_|reject_)/', '', $data);
    $path = $callbackFile($uniqueId);
    $raw = @file_get_contents($path);
    $callbackData = json_decode((string) $raw, true);
    if (!is_array($callbackData)) {
        $cqid = (string) ($callbackQuery['id'] ?? '');
        if ($cqid !== '' && $telegramToken !== '') {
            $answerUrl = 'https://api.telegram.org/bot' . $telegramToken . '/answerCallbackQuery';
            $ch = curl_init($answerUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, [
                'callback_query_id' => $cqid,
                'text' => 'Oturum verisi bulunamadı (sunucu yolu veya süre).',
                'show_alert' => true,
            ]);
            curl_exec($ch);
            curl_close($ch);
        }
        return;
    }

    $islemid = (string) ($callbackData['islemid'] ?? '');
    $ekleyen = (string) ($callbackData['ekleyen'] ?? '');
    $miktarRaw = (string) ($callbackData['miktar'] ?? '0');
    $miktarNum = function_exists('bellla_try_amount_float') ? bellla_try_amount_float($miktarRaw) : (float) $miktarRaw;

    $performerInfo = '@' . (string) ($callbackQuery['from']['username'] ?? 'user');
    $responseText = 'İşlem tamamlanamadı.';

    if (!in_array($userId, $authorizedUsers, true)) {
        $callbackQueryId = (string) ($callbackQuery['id'] ?? '');
        if ($callbackQueryId !== '' && $telegramToken !== '') {
            $answerCallbackQueryUrl = 'https://api.telegram.org/bot' . $telegramToken . '/answerCallbackQuery';
            $ch = curl_init($answerCallbackQueryUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, [
                'callback_query_id' => $callbackQueryId,
                'text' => 'Yetkiniz yok!',
            ]);
            curl_exec($ch);
            curl_close($ch);
        }
        return;
    }

    if (strpos($data, 'approve_') === 0) {
        try {
            $stmt = $db->prepare('SELECT bakiye FROM kullanicilar WHERE kullaniciadi = :ekleyen LIMIT 1');
            $stmt->execute([':ekleyen' => $ekleyen]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                $currentBalance = function_exists('bellla_try_amount_float')
                    ? bellla_try_amount_float($row['bakiye'] ?? '0')
                    : (float) ($row['bakiye'] ?? 0);
                $newBalance = $currentBalance - $miktarNum;
                $upd = $db->prepare('UPDATE kullanicilar SET bakiye = :nb WHERE kullaniciadi = :ekleyen');
                $upd->execute([':nb' => (string) $newBalance, ':ekleyen' => $ekleyen]);

                $upd2 = $db->prepare("UPDATE cekimtalepleri SET durum = 'Tamamlandı' WHERE islemid = :islemid");
                $upd2->execute([':islemid' => $islemid]);
                $responseText = '✅ ' . $performerInfo . ' Tarafından Onaylandı!';
            } else {
                $responseText = 'Kullanıcı bulunamadı.';
            }
        } catch (Throwable $e) {
            $responseText = 'Veritabanı hatası: ' . $e->getMessage();
        }
    } elseif (strpos($data, 'reject_') === 0) {
        try {
            $upd2 = $db->prepare("UPDATE cekimtalepleri SET durum = 'Reddedildi' WHERE islemid = :islemid");
            $upd2->execute([':islemid' => $islemid]);
            $responseText = '❌ ' . $performerInfo . ' Tarafından Reddedildi!';
        } catch (Throwable $e) {
            $responseText = 'Veritabanı hatası: ' . $e->getMessage();
        }
    }

    if (is_file($path)) {
        @unlink($path);
    }

    if ($telegramToken !== '' && $chatId !== '') {
        $sendMessageUrl = 'https://api.telegram.org/bot' . $telegramToken . '/sendMessage';
        $ch = curl_init($sendMessageUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, [
            'chat_id' => $chatId,
            'text' => $responseText,
            'reply_to_message_id' => $messageId,
        ]);
        curl_exec($ch);
        curl_close($ch);

        $editMessageReplyMarkupUrl = 'https://api.telegram.org/bot' . $telegramToken . '/editMessageReplyMarkup';
        $ch = curl_init($editMessageReplyMarkupUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, [
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'reply_markup' => json_encode(['inline_keyboard' => []]),
        ]);
        curl_exec($ch);
        curl_close($ch);

        $callbackQueryId = (string) ($callbackQuery['id'] ?? '');
        if ($callbackQueryId !== '') {
            $answerCallbackQueryUrl = 'https://api.telegram.org/bot' . $telegramToken . '/answerCallbackQuery';
            $ch = curl_init($answerCallbackQueryUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, [
                'callback_query_id' => $callbackQueryId,
                'text' => 'İşlem başarılı!',
            ]);
            curl_exec($ch);
            curl_close($ch);
        }
    }
}
