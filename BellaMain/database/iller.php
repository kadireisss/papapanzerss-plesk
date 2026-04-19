<?php
/**
 * PANZER · Il/Ilce ortak endpoint
 * Tum scriptlerin sipariş formundaki il/ilçe select'leri buradan DB'den çeker.
 *
 * Kullanim:
 *   GET /BellaMain/database/iller.php?action=il
 *     -> ["Adana","Adiyaman",...]
 *   GET /BellaMain/database/iller.php?action=ilce&il=Adana
 *     -> ["Aladağ","Ceyhan",...]
 */

declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: public, max-age=86400'); // 1 gun cache (il/ilçe değişmez)
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');

require __DIR__ . '/connect.php';

$action = $_GET['action'] ?? 'il';

try {
    if ($action === 'ilce') {
        $il = trim((string)($_GET['il'] ?? ''));
        if ($il === '') {
            echo json_encode([]);
            exit;
        }
        $stmt = $db->prepare("SELECT DISTINCT ilce FROM ilceler WHERE il = :il ORDER BY ilce ASC");
        $stmt->execute([':il' => $il]);
        $list = [];
        foreach ($stmt as $row) { $list[] = $row['ilce']; }
        echo json_encode($list, JSON_UNESCAPED_UNICODE);
        exit;
    }

    // varsayilan: il listesi
    $stmt = $db->query("SELECT DISTINCT il FROM ilceler ORDER BY il ASC");
    $list = [];
    foreach ($stmt as $row) { $list[] = $row['il']; }
    echo json_encode($list, JSON_UNESCAPED_UNICODE);
} catch (\Throwable $e) {
    http_response_code(500);
    echo json_encode(['error' => 'iller_unavailable']);
}
