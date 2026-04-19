<?php
session_start();
include 'database/baglan.php';

$checkout = $_SESSION['ty_checkout'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $requiredFields = ['adresbasligi', 'adsoyad', 'telefonno', 'tckimlik', 'il', 'ilce', 'tamadres', 'product_id'];
    foreach ($requiredFields as $field) {
        if (!isset($_POST[$field]) || trim((string) $_POST[$field]) === '') {
            header('Location: index.php');
            exit;
        }
    }

    $productId = (int) $_POST['product_id'];
    if ($productId < 1) {
        header('Location: index.php');
        exit;
    }

    $checkout = [
        'product_id' => $productId,
        'urunadi' => trim((string) ($_POST['urunadi'] ?? 'Urun')),
        'urunfiyat' => trim((string) ($_POST['urunfiyat'] ?? '0')),
        'adresbasligi' => trim((string) $_POST['adresbasligi']),
        'adsoyad' => trim((string) $_POST['adsoyad']),
        'telefonno' => trim((string) $_POST['telefonno']),
        'tckimlik' => trim((string) $_POST['tckimlik']),
        'il' => trim((string) $_POST['il']),
        'ilce' => trim((string) $_POST['ilce']),
        'tamadres' => trim((string) $_POST['tamadres']),
    ];

    $_SESSION['ty_checkout'] = $checkout;
}

if (!is_array($checkout)) {
    header('Location: index.php');
    exit;
}

$productId = (int) ($checkout['product_id'] ?? 0);

$productStmt = $conn->prepare('SELECT id, urunadi, urunfiyat FROM ty_ilan WHERE id = :id LIMIT 1');
$productStmt->execute(['id' => $productId]);
$product = $productStmt->fetch(PDO::FETCH_ASSOC);
if ($product) {
    $checkout['urunadi'] = (string) $product['urunadi'];
    $checkout['urunfiyat'] = (string) $product['urunfiyat'];
}

$bank = [
    'ibanad' => 'PAPARA',
    'banka' => 'PAPARA',
    'iban' => 'TR000000000000000000000000',
];

try {
    $panelStmt = $conn->query('SELECT ibanad, banka, iban FROM panel ORDER BY id ASC LIMIT 1');
    $panelData = $panelStmt ? $panelStmt->fetch(PDO::FETCH_ASSOC) : false;
    if ($panelData) {
        $bank['ibanad'] = trim((string) ($panelData['ibanad'] ?? $bank['ibanad'])) ?: $bank['ibanad'];
        $bank['banka'] = trim((string) ($panelData['banka'] ?? $bank['banka'])) ?: $bank['banka'];
        $bank['iban'] = trim((string) ($panelData['iban'] ?? $bank['iban'])) ?: $bank['iban'];
    }
} catch (Throwable $e) {
    // Keep default payment values.
}

?>
<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Havale ve Dekont Yukleme</title>
    <style>
        body {
            margin: 0;
            background: #f4f5f7;
            font-family: Arial, Helvetica, sans-serif;
            color: #1f1f1f;
        }
        .wrap {
            max-width: 520px;
            margin: 20px auto;
            padding: 0 14px 24px;
        }
        .card {
            background: #fff;
            border-radius: 14px;
            padding: 16px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
            margin-bottom: 14px;
        }
        .title {
            margin: 0 0 10px;
            font-size: 20px;
            font-weight: 700;
        }
        .row {
            display: flex;
            justify-content: space-between;
            gap: 8px;
            margin-bottom: 8px;
            font-size: 14px;
        }
        .label {
            color: #666;
            min-width: 110px;
        }
        .value {
            text-align: right;
            font-weight: 600;
            word-break: break-word;
        }
        .iban-box {
            margin-top: 10px;
            padding: 12px;
            background: #fff8f2;
            border: 1px dashed #ff7a27;
            border-radius: 10px;
            font-weight: 700;
            word-break: break-all;
            color: #222;
        }
        .hint {
            margin-top: 8px;
            font-size: 13px;
            color: #555;
            line-height: 1.4;
        }
        .upload {
            margin-top: 10px;
        }
        .upload input[type="file"] {
            width: 100%;
            display: block;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background: #fafafa;
        }
        .preview {
            display: none;
            margin-top: 10px;
            font-size: 13px;
            color: #0b7a3f;
        }
        .btn {
            width: 100%;
            border: 0;
            border-radius: 10px;
            background: #f27a1a;
            color: #fff;
            padding: 13px 14px;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
        }
        .warn {
            background: #fff2f0;
            color: #9b1c1c;
            border: 1px solid #ffd0ca;
            border-radius: 10px;
            padding: 10px;
            font-size: 13px;
            line-height: 1.4;
        }
    </style>
</head>
<body>
<div class="wrap">
    <div class="card">
        <h1 class="title">Siparis Oncesi Havale Adimi</h1>
        <div class="row"><span class="label">Urun</span><span class="value"><?php echo htmlspecialchars($checkout['urunadi'], ENT_QUOTES, 'UTF-8'); ?></span></div>
        <div class="row"><span class="label">Tutar</span><span class="value"><?php echo htmlspecialchars($checkout['urunfiyat'], ENT_QUOTES, 'UTF-8'); ?> TL</span></div>
        <div class="row"><span class="label">Alici</span><span class="value"><?php echo htmlspecialchars($bank['ibanad'], ENT_QUOTES, 'UTF-8'); ?></span></div>
        <div class="row"><span class="label">Banka</span><span class="value"><?php echo htmlspecialchars($bank['banka'], ENT_QUOTES, 'UTF-8'); ?></span></div>
        <div class="iban-box"><?php echo htmlspecialchars($bank['iban'], ENT_QUOTES, 'UTF-8'); ?></div>
        <div class="hint">Havale islemini tamamlayip dekontu yukledikten sonra siparis tamamlanacaktir.</div>
    </div>

    <div class="card">
        <form method="POST" action="tamamlandi.php" enctype="multipart/form-data">
            <input type="hidden" name="flow_step" value="havale">
            <?php if (isset($_GET['error'])): ?>
                <div class="warn" style="margin-bottom: 12px;">
                    Dekont yukleme basarisiz oldu. Lutfen gecerli bir dosya secip tekrar deneyin.
                </div>
            <?php endif; ?>
            <label class="upload" for="dekont">
                <strong>Dekont yukle (zorunlu)</strong>
                <input required type="file" id="dekont" name="dekont" accept=".jpg,.jpeg,.png,.pdf,.webp">
            </label>
            <div class="preview" id="previewText"></div>
            <div class="warn" style="margin: 12px 0;">
                Dekont yuklemeden siparis tamamlanmaz. Sadece gorsel veya PDF dosyasi yukleyin.
            </div>
            <button class="btn" type="submit">Dekontu Gonder ve Siparisi Tamamla</button>
        </form>
    </div>
</div>

<script>
    (function () {
        var fileInput = document.getElementById('dekont');
        var preview = document.getElementById('previewText');
        if (!fileInput || !preview) return;
        fileInput.addEventListener('change', function () {
            var file = fileInput.files && fileInput.files[0];
            if (!file) {
                preview.style.display = 'none';
                preview.textContent = '';
                return;
            }
            preview.textContent = 'Secilen dekont: ' + file.name;
            preview.style.display = 'block';
        });
    })();
</script>
</body>
</html>
