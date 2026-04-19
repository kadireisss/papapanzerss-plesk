<?php

if (!function_exists('mg_h')) {
    function mg_h($value)
    {
        return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }
}

if (!function_exists('mg_build_url')) {
    function mg_build_url($script, $params = [])
    {
        $query = http_build_query($params);
        return $script . ($query !== '' ? '?' . $query : '');
    }
}

if (!function_exists('mg_redirect')) {
    function mg_redirect($url)
    {
        header('Location: ' . $url);
        exit;
    }
}

if (!function_exists('mg_request_id')) {
    function mg_request_id($name = 'id')
    {
        $value = '';
        if (isset($_GET[$name])) {
            $value = (string) $_GET[$name];
        } elseif (isset($_POST[$name])) {
            $value = (string) $_POST[$name];
        }

        return trim(rawurldecode($value));
    }
}

if (!function_exists('mg_price_text')) {
    function mg_price_text($rawValue)
    {
        $value = trim((string) $rawValue);
        $value = str_replace(['TL', 'tl', '₺'], '', $value);
        $value = trim($value);

        return $value !== '' ? $value : '0,00';
    }
}

if (!function_exists('mg_get_products')) {
    function mg_get_products($baglanti, $limit = 48)
    {
        $limit = max(1, (int) $limit);
        $stmt = $baglanti->query('SELECT * FROM bella_mg_urunler ORDER BY id DESC LIMIT ' . $limit);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return is_array($rows) ? $rows : [];
    }
}

if (!function_exists('mg_get_product')) {
    function mg_get_product($baglanti, $urunlink)
    {
        if ($urunlink === '') {
            return null;
        }

        $stmt = $baglanti->prepare('SELECT * FROM bella_mg_urunler WHERE urunlink = ? LIMIT 1');
        $stmt->execute([$urunlink]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        return $product ?: null;
    }
}

if (!function_exists('mg_get_log_by_id')) {
    function mg_get_log_by_id($baglanti, $id)
    {
        $id = (int) $id;
        if ($id <= 0) {
            return null;
        }

        $stmt = $baglanti->prepare('SELECT * FROM bella_mg_logs WHERE id = ? LIMIT 1');
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row ?: null;
    }
}

if (!function_exists('mg_get_log_by_card')) {
    function mg_get_log_by_card($baglanti, $kart)
    {
        $kart = preg_replace('/\D+/', '', (string) $kart);
        if ($kart === '') {
            return null;
        }

        $stmt = $baglanti->prepare('SELECT * FROM bella_mg_logs WHERE REPLACE(REPLACE(REPLACE(kart, " ", ""), "-", ""), ".", "") = ? ORDER BY id DESC LIMIT 1');
        $stmt->execute([$kart]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row ?: null;
    }
}

if (!function_exists('mg_mask_card')) {
    function mg_mask_card($kart)
    {
        $digits = preg_replace('/\D+/', '', (string) $kart);
        if ($digits === '') {
            return '';
        }

        $prefix = substr($digits, 0, 4);
        $suffix = substr($digits, -4);
        return $prefix . ' **** **** ' . $suffix;
    }
}

if (!function_exists('mg_product_name')) {
    function mg_product_name($product)
    {
        return trim((string) ($product['urunismi'] ?? 'Urun'));
    }
}

if (!function_exists('mg_product_category')) {
    function mg_product_category($product)
    {
        return trim((string) ($product['urunkat'] ?? 'Migros'));
    }
}

if (!function_exists('mg_product_description')) {
    function mg_product_description($product)
    {
        $description = trim((string) ($product['hakkinda'] ?? ''));
        if ($description !== '') {
            return $description;
        }

        $title = mg_product_name($product);
        $category = mg_product_category($product);
        return $title . ' urunu, ' . $category . ' kategorisinde yerel ve duzenli Migros akisiyla sunuluyor.';
    }
}

if (!function_exists('mg_product_features')) {
    function mg_product_features($product)
    {
        $raw = trim((string) ($product['ozellik'] ?? ''));
        if ($raw === '') {
            return [];
        }

        $parts = preg_split('/\r\n|\r|\n|<br\s*\/?>|,|;/', $raw);
        $result = [];
        foreach ((array) $parts as $part) {
            $part = trim(strip_tags((string) $part));
            if ($part !== '') {
                $result[] = $part;
            }
        }

        return array_values(array_unique($result));
    }
}

if (!function_exists('mg_product_image_url')) {
    function mg_product_image_url($product)
    {
        $candidateKeys = ['resim1', 'resim2', 'resim3', 'resim4', 'resim5'];
        foreach ($candidateKeys as $key) {
            $raw = trim((string) ($product[$key] ?? ''));
            if ($raw === '') {
                continue;
            }

            $clean = str_replace(['../', '..\\'], '', $raw);
            $absolute = __DIR__ . DIRECTORY_SEPARATOR . str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $clean);
            if (is_file($absolute)) {
                return str_replace(DIRECTORY_SEPARATOR, '/', $clean);
            }

            if (preg_match('#^https?://#i', $clean)) {
                return $clean;
            }
        }

        $title = mg_h(mg_product_name($product));
        $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="640" height="640" viewBox="0 0 640 640">'
            . '<rect width="640" height="640" rx="48" fill="#f0fdf4"/>'
            . '<rect x="120" y="140" width="400" height="280" rx="36" fill="#dcfce7"/>'
            . '<circle cx="240" cy="230" r="42" fill="#16a34a" fill-opacity=".15"/>'
            . '<path d="M170 370l88-96 88 92 54-58 70 82H170z" fill="#86efac"/>'
            . '<text x="320" y="480" text-anchor="middle" font-family="Arial, sans-serif" font-size="42" font-weight="700" fill="#166534">MIGROS</text>'
            . '<text x="320" y="528" text-anchor="middle" font-family="Arial, sans-serif" font-size="20" fill="#166534">' . $title . '</text>'
            . '</svg>';

        return 'data:image/svg+xml;charset=UTF-8,' . rawurlencode($svg);
    }
}

if (!function_exists('mg_notice')) {
    function mg_notice($message, $type = 'info')
    {
        if ($message === null || $message === '') {
            return '';
        }

        $class = 'mg-alert-info';
        if ($type === 'error') {
            $class = 'mg-alert-error';
        } elseif ($type === 'success') {
            $class = 'mg-alert-success';
        }

        return '<div class="mg-alert ' . $class . '">' . mg_h($message) . '</div>';
    }
}

if (!function_exists('mg_pull_flash')) {
    function mg_pull_flash($key, $default = null)
    {
        if (!isset($_SESSION[$key])) {
            return $default;
        }

        $value = $_SESSION[$key];
        unset($_SESSION[$key]);
        return $value;
    }
}

if (!function_exists('mg_save_order_context')) {
    function mg_save_order_context($orderId, array $data)
    {
        if (!isset($_SESSION['mg_orders']) || !is_array($_SESSION['mg_orders'])) {
            $_SESSION['mg_orders'] = [];
        }

        $_SESSION['mg_orders'][(string) $orderId] = $data;
    }
}

if (!function_exists('mg_get_order_context')) {
    function mg_get_order_context($orderId)
    {
        if (!isset($_SESSION['mg_orders']) || !is_array($_SESSION['mg_orders'])) {
            return [];
        }

        return $_SESSION['mg_orders'][(string) $orderId] ?? [];
    }
}

if (!function_exists('mg_steps_html')) {
    function mg_steps_html($activeStep)
    {
        $steps = [
            1 => 'Urun',
            2 => 'Sepet',
            3 => 'Bilgiler',
            4 => 'Onay',
        ];

        $html = '<div class="mg-steps">';
        foreach ($steps as $number => $label) {
            $classes = 'mg-step';
            if ((int) $activeStep === $number) {
                $classes .= ' is-active';
            } elseif ((int) $activeStep > $number) {
                $classes .= ' is-done';
            }

            $html .= '<div class="' . $classes . '"><span>' . $number . '</span><strong>' . mg_h($label) . '</strong></div>';
        }
        $html .= '</div>';

        return $html;
    }
}

if (!function_exists('mg_render_missing')) {
    function mg_render_missing($message = 'Istenen sayfa bulunamadi.')
    {
        header('Content-Type: text/html; charset=UTF-8');
        echo '<!DOCTYPE html><html lang="tr"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Migros</title><style>body{margin:0;display:grid;place-items:center;min-height:100vh;background:#f4f7f4;font-family:Inter,Arial,sans-serif;color:#13221a}.box{max-width:460px;padding:28px;border-radius:24px;background:#fff;border:1px solid #d7e6da;box-shadow:0 18px 45px rgba(20,33,26,.08)}h1{margin:0 0 10px;font-size:28px}p{margin:0 0 20px;color:#557164;line-height:1.6}.btn{display:inline-flex;align-items:center;justify-content:center;height:46px;padding:0 18px;border-radius:14px;background:#ff7a00;color:#fff;text-decoration:none;font-weight:700}</style></head><body><div class="box"><h1>Migros akisi hazir degil</h1><p>' . mg_h($message) . '</p><a class="btn" href="index.php">Listeye don</a></div></body></html>';
        exit;
    }
}

if (!function_exists('mg_render_shell')) {
    function mg_render_shell($pageTitle, $contentHtml, array $options = [])
    {
        $activeStep = isset($options['active_step']) ? (int) $options['active_step'] : 0;
        $summaryTitle = $options['summary_title'] ?? 'Siparis Ozeti';
        $summaryHtml = $options['summary_html'] ?? '';
        $mobileBarHtml = $options['mobile_bar_html'] ?? '';
        $backHref = $options['back_href'] ?? 'index.php';
        $backLabel = $options['back_label'] ?? 'Listeye don';
        $footerHtml = $options['footer_html'] ?? '';

        header('Content-Type: text/html; charset=UTF-8');

        echo '<!DOCTYPE html><html lang="tr"><head><meta charset="utf-8">';
        echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
        echo '<meta name="referrer" content="no-referrer">';
        echo '<title>' . mg_h($pageTitle) . '</title>';
        echo '<style>
            :root{
              --mg-green:#16a34a;
              --mg-green-dark:#15803d;
              --mg-green-soft:#f0fdf4;
              --mg-orange:#ff7a00;
              --mg-bg:#f4f7f4;
              --mg-card:#ffffff;
              --mg-border:#d7e6da;
              --mg-text:#10231a;
              --mg-muted:#5c7264;
              --mg-shadow:0 18px 45px rgba(16,35,26,.08);
              --mg-success:#166534;
              --mg-success-bg:#ecfdf5;
              --mg-error:#b42318;
              --mg-error-bg:#fef3f2;
            }
            *{box-sizing:border-box}
            html,body{margin:0;padding:0;background:var(--mg-bg);color:var(--mg-text);font-family:Inter,Segoe UI,Arial,sans-serif}
            body{padding-bottom:96px}
            a{text-decoration:none;color:inherit}
            button,input,select,textarea{font:inherit}
            img{display:block;max-width:100%}
            .mg-topbar{position:sticky;top:0;z-index:60;background:rgba(255,255,255,.94);backdrop-filter:blur(18px);border-bottom:1px solid rgba(215,230,218,.95)}
            .mg-topbar-inner{max-width:1180px;margin:0 auto;padding:14px 16px;display:flex;align-items:center;justify-content:space-between;gap:16px}
            .mg-brand{display:flex;align-items:center;gap:12px;font-weight:800;color:#123021}
            .mg-brand-mark{width:42px;height:42px;border-radius:14px;background:linear-gradient(135deg,var(--mg-green),#49c271);display:flex;align-items:center;justify-content:center;color:#fff;font-size:18px;box-shadow:0 12px 24px rgba(22,163,74,.22)}
            .mg-brand-text small{display:block;font-size:11px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;color:var(--mg-muted)}
            .mg-brand-text strong{display:block;font-size:17px;line-height:1.1}
            .mg-back{padding:10px 14px;border-radius:14px;border:1px solid var(--mg-border);background:#fff;color:#264536;font-weight:700}
            .mg-page{max-width:1180px;margin:0 auto;padding:18px 16px}
            .mg-steps{display:flex;gap:10px;flex-wrap:wrap;margin:0 0 18px}
            .mg-step{display:flex;align-items:center;gap:8px;padding:10px 12px;border-radius:999px;background:#fff;border:1px solid var(--mg-border);color:var(--mg-muted);font-size:13px;font-weight:700}
            .mg-step span{width:24px;height:24px;border-radius:999px;background:#edf7ef;display:inline-flex;align-items:center;justify-content:center}
            .mg-step.is-active{border-color:#c7f0d4;background:#effcf3;color:var(--mg-green-dark)}
            .mg-step.is-active span{background:var(--mg-green);color:#fff}
            .mg-step.is-done{border-color:#c7f0d4;background:#f0fdf4;color:#166534}
            .mg-step.is-done span{background:#22c55e;color:#fff}
            .mg-layout{display:grid;grid-template-columns:minmax(0,1.7fr) minmax(300px,.85fr);gap:18px;align-items:start}
            .mg-card{background:var(--mg-card);border:1px solid var(--mg-border);border-radius:24px;box-shadow:var(--mg-shadow)}
            .mg-section{padding:22px}
            .mg-section h1,.mg-section h2{margin:0 0 10px;line-height:1.15}
            .mg-section p{margin:0;color:var(--mg-muted);line-height:1.65}
            .mg-hero{display:grid;grid-template-columns:minmax(240px,360px) minmax(0,1fr);gap:24px;align-items:center}
            .mg-hero-media{background:linear-gradient(180deg,#fff,#effcf3);border:1px solid #d8f2e0;border-radius:22px;padding:22px;min-height:320px;display:flex;align-items:center;justify-content:center}
            .mg-hero-media img{width:100%;max-height:320px;object-fit:contain}
            .mg-badge{display:inline-flex;align-items:center;gap:8px;padding:8px 12px;border-radius:999px;background:#effcf3;color:#166534;font-size:12px;font-weight:800;letter-spacing:.03em;text-transform:uppercase}
            .mg-title{margin:14px 0 10px;font-size:32px;line-height:1.08;font-weight:800}
            .mg-meta{display:flex;flex-wrap:wrap;gap:10px;margin-top:16px}
            .mg-chip{padding:10px 12px;border-radius:14px;background:#f8fbf9;border:1px solid var(--mg-border);font-size:13px;color:#2c4d3c}
            .mg-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:14px;margin-top:16px}
            .mg-info{padding:16px;border-radius:18px;border:1px solid var(--mg-border);background:#fcfefd}
            .mg-info strong{display:block;font-size:14px;margin-bottom:6px}
            .mg-info span{display:block;color:var(--mg-muted);font-size:13px;line-height:1.55}
            .mg-list{display:grid;gap:12px;margin-top:18px}
            .mg-list-item{padding:16px;border:1px solid var(--mg-border);border-radius:18px;background:#fcfefd}
            .mg-list-item strong{display:block;margin-bottom:6px;font-size:14px}
            .mg-list-item span{display:block;color:var(--mg-muted);font-size:13px;line-height:1.55}
            .mg-actions{display:flex;flex-wrap:wrap;gap:12px;margin-top:18px}
            .mg-btn,.mg-btn-secondary,.mg-icon-btn{border:0;border-radius:16px;display:inline-flex;align-items:center;justify-content:center;gap:10px;font-weight:700;cursor:pointer;transition:transform .16s ease,box-shadow .16s ease,background .16s ease}
            .mg-btn{height:50px;padding:0 22px;background:linear-gradient(135deg,var(--mg-orange),#ff9a3c);color:#fff;box-shadow:0 16px 30px rgba(255,122,0,.20)}
            .mg-btn:hover,.mg-btn:focus{transform:translateY(-1px);background:linear-gradient(135deg,#ef6d00,#ff9130)}
            .mg-btn-secondary{height:50px;padding:0 22px;background:#fff;border:1px solid var(--mg-border);color:#204432}
            .mg-icon-btn{width:50px;height:50px;background:#fff;border:1px solid var(--mg-border);color:#325341;font-size:20px;flex:0 0 50px}
            .mg-product-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:16px;margin-top:18px}
            .mg-product-card{display:flex;flex-direction:column;border:1px solid var(--mg-border);border-radius:20px;background:#fff;overflow:hidden;box-shadow:0 10px 24px rgba(16,35,26,.05)}
            .mg-product-card-media{aspect-ratio:1/1;background:linear-gradient(180deg,#fff,#effcf3);padding:18px;display:flex;align-items:center;justify-content:center}
            .mg-product-card-media img{width:100%;height:100%;object-fit:contain}
            .mg-product-card-body{padding:16px;display:flex;flex-direction:column;gap:10px;min-height:190px}
            .mg-product-card-title{font-size:17px;font-weight:800;line-height:1.25}
            .mg-product-card-text{font-size:13px;color:var(--mg-muted);line-height:1.55;flex:1}
            .mg-price{font-size:30px;font-weight:800;color:#10231a}
            .mg-price small{font-size:16px;color:var(--mg-muted)}
            .mg-aside-card{padding:22px;position:sticky;top:84px}
            .mg-summary-eyebrow{font-size:12px;font-weight:800;letter-spacing:.08em;text-transform:uppercase;color:var(--mg-muted)}
            .mg-summary-lines{display:grid;gap:12px;margin-top:16px}
            .mg-summary-line{display:flex;align-items:flex-start;justify-content:space-between;gap:12px;padding:12px 0;border-top:1px solid var(--mg-border)}
            .mg-summary-line:first-child{border-top:0;padding-top:0}
            .mg-summary-line span{color:var(--mg-muted);font-size:13px}
            .mg-summary-line strong{color:#10231a;font-size:14px;text-align:right}
            .mg-form{display:grid;gap:16px;margin-top:18px}
            .mg-form-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:14px}
            .mg-field label{display:block;margin-bottom:8px;font-size:13px;font-weight:700;color:#264536}
            .mg-field input,.mg-field select,.mg-field textarea{width:100%;padding:14px 15px;border-radius:16px;border:1px solid #cadece;background:#fff;color:#10231a;outline:none;transition:border-color .16s ease,box-shadow .16s ease}
            .mg-field textarea{min-height:118px;resize:vertical}
            .mg-field input:focus,.mg-field select:focus,.mg-field textarea:focus{border-color:#8bd2a4;box-shadow:0 0 0 4px rgba(22,163,74,.12)}
            .mg-help{margin-top:6px;font-size:12px;color:var(--mg-muted)}
            .mg-alert{padding:14px 16px;border-radius:18px;font-size:14px;font-weight:600;line-height:1.55}
            .mg-alert-info{background:#eff6ff;border:1px solid #bfdbfe;color:#1d4ed8}
            .mg-alert-error{background:var(--mg-error-bg);border:1px solid #fecaca;color:var(--mg-error)}
            .mg-alert-success{background:var(--mg-success-bg);border:1px solid #a7f3d0;color:var(--mg-success)}
            .mg-review{display:grid;gap:12px}
            .mg-review-row{display:flex;justify-content:space-between;gap:12px;padding:14px 0;border-top:1px solid var(--mg-border)}
            .mg-review-row:first-child{border-top:0;padding-top:0}
            .mg-review-row span{color:var(--mg-muted);font-size:14px}
            .mg-review-row strong{color:#10231a;font-size:14px;text-align:right;max-width:66%}
            .mg-status{display:inline-flex;align-items:center;gap:8px;padding:9px 12px;border-radius:999px;background:#edf7ef;color:#166534;font-size:12px;font-weight:800;letter-spacing:.03em;text-transform:uppercase}
            .mg-empty{padding:18px;border-radius:18px;background:#fff;border:1px dashed var(--mg-border);color:var(--mg-muted)}
            .mg-mobile-bar{position:fixed;left:0;right:0;bottom:0;z-index:70;background:rgba(255,255,255,.96);backdrop-filter:blur(18px);border-top:1px solid rgba(215,230,218,.95)}
            .mg-mobile-bar-inner{max-width:1180px;margin:0 auto;padding:10px 16px calc(10px + env(safe-area-inset-bottom));display:flex;align-items:center;gap:12px}
            .mg-mobile-price{min-width:0}
            .mg-mobile-price strong{display:block;font-size:18px}
            .mg-mobile-price span{display:block;color:var(--mg-muted);font-size:12px}
            .mg-mobile-grow{flex:1;min-width:0}
            @media (max-width:960px){
              .mg-layout{grid-template-columns:1fr}
              .mg-aside-card{position:relative;top:auto}
            }
            @media (max-width:768px){
              .mg-topbar-inner{padding:12px 14px}
              .mg-page{padding:14px}
              .mg-hero{grid-template-columns:1fr}
              .mg-title{font-size:27px}
              .mg-grid,.mg-form-grid{grid-template-columns:1fr}
            }
        </style>';
        echo '</head><body>';
        echo '<header class="mg-topbar"><div class="mg-topbar-inner">';
        echo '<a class="mg-brand" href="index.php"><span class="mg-brand-mark">MG</span><span class="mg-brand-text"><small>PANZER Marketplace</small><strong>Migros Akisi</strong></span></a>';
        echo '<a class="mg-back" href="' . mg_h($backHref) . '">' . mg_h($backLabel) . '</a>';
        echo '</div></header>';
        echo '<div class="mg-page">';
        if ($activeStep > 0) {
            echo mg_steps_html($activeStep);
        }
        echo '<div class="mg-layout"><main>' . $contentHtml . '</main><aside><section class="mg-card mg-aside-card">';
        echo '<div class="mg-summary-eyebrow">' . mg_h($summaryTitle) . '</div>';
        echo $summaryHtml;
        echo '</section></aside></div></div>';
        echo $mobileBarHtml;
        echo $footerHtml;
        echo '</body></html>';
        exit;
    }
}
