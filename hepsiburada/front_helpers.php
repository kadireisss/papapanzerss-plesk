<?php

if (!function_exists('hb_h')) {
    function hb_h($value)
    {
        return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }
}

if (!function_exists('hb_urunlink_from_request')) {
    function hb_urunlink_from_request()
    {
        $value = '';

        if (isset($_GET['urunlink'])) {
            $value = (string) $_GET['urunlink'];
        } elseif (isset($_POST['urunlink'])) {
            $value = (string) $_POST['urunlink'];
        }

        return rawurldecode(trim($value));
    }
}

if (!function_exists('hb_get_product')) {
    function hb_get_product($conn, $urunlink)
    {
        if ($urunlink === '') {
            return null;
        }

        $stmt = $conn->prepare('SELECT * FROM hb_urun WHERE urunlink = :urunlink LIMIT 1');
        $stmt->execute(['urunlink' => $urunlink]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        return $product ?: null;
    }
}

if (!function_exists('hb_build_url')) {
    function hb_build_url($script, $params = [])
    {
        $query = http_build_query($params);
        return $script . ($query !== '' ? '?' . $query : '');
    }
}

if (!function_exists('hb_price_text')) {
    function hb_price_text($rawPrice)
    {
        $price = trim((string) $rawPrice);
        $price = str_replace(['TL', 'tl', '₺'], '', $price);
        $price = trim($price);

        return $price !== '' ? $price : '0,00';
    }
}

if (!function_exists('hb_product_image_url')) {
    function hb_product_image_url($product)
    {
        $imageName = trim((string) ($product['urunresim'] ?? ''));
        if ($imageName !== '') {
            $imagePath = __DIR__ . '/admin/resimler/' . $imageName;
            if (is_file($imagePath)) {
                return 'admin/resimler/' . rawurlencode($imageName);
            }
        }

        $title = hb_h($product['urunadi'] ?? 'Urun');
        $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="640" height="640" viewBox="0 0 640 640">'
            . '<rect width="640" height="640" rx="48" fill="#fff7ed"/>'
            . '<rect x="120" y="150" width="400" height="260" rx="28" fill="#ffedd5"/>'
            . '<circle cx="238" cy="242" r="42" fill="#ff6000" fill-opacity=".18"/>'
            . '<path d="M168 366l96-104 78 82 58-66 72 88H168z" fill="#fdba74"/>'
            . '<text x="320" y="470" text-anchor="middle" font-family="Arial, sans-serif" font-size="38" font-weight="700" fill="#c2410c">PANZER HB</text>'
            . '<text x="320" y="520" text-anchor="middle" font-family="Arial, sans-serif" font-size="22" fill="#9a3412">' . $title . '</text>'
            . '</svg>';

        return 'data:image/svg+xml;charset=UTF-8,' . rawurlencode($svg);
    }
}

if (!function_exists('hb_product_description')) {
    function hb_product_description($product)
    {
        $title = trim((string) ($product['urunadi'] ?? ''));
        $category = trim((string) ($product['urunkategori'] ?? ''));

        if ($title === '' && $category === '') {
            return 'Siparisinizi yerel ve guvenli akistan tamamlayabilirsiniz.';
        }

        $parts = [];
        if ($title !== '') {
            $parts[] = $title . ', guncel urun akisi ile satin almaya hazir durumda.';
        }

        if ($category !== '') {
            $parts[] = $category . ' kategorisinde hizli siparis ve temiz arayuz ile sunuluyor.';
        }

        $parts[] = 'Urunu sepetinize ekleyip adres formunu doldurarak islemi sorunsuz tamamlayabilirsiniz.';

        return implode(' ', $parts);
    }
}

if (!function_exists('hb_notice')) {
    function hb_notice($message, $type = 'info')
    {
        if ($message === '' || $message === null) {
            return '';
        }

        $class = 'hb-alert-info';
        if ($type === 'error') {
            $class = 'hb-alert-error';
        } elseif ($type === 'success') {
            $class = 'hb-alert-success';
        }

        return '<div class="hb-alert ' . $class . '">' . hb_h($message) . '</div>';
    }
}

if (!function_exists('hb_pull_flash')) {
    function hb_pull_flash($key, $default = null)
    {
        if (!array_key_exists($key, $_SESSION)) {
            return $default;
        }

        $value = $_SESSION[$key];
        unset($_SESSION[$key]);

        return $value;
    }
}

if (!function_exists('hb_redirect')) {
    function hb_redirect($url)
    {
        header('Location: ' . $url);
        exit;
    }
}

if (!function_exists('hb_steps_html')) {
    function hb_steps_html($activeStep)
    {
        $steps = [
            1 => 'Urun',
            2 => 'Sepet',
            3 => 'Adres',
            4 => 'Onay',
        ];

        $html = '<div class="hb-steps">';
        foreach ($steps as $number => $label) {
            $classes = 'hb-step';
            if ((int) $activeStep === $number) {
                $classes .= ' is-active';
            } elseif ((int) $activeStep > $number) {
                $classes .= ' is-done';
            }

            $html .= '<div class="' . $classes . '"><span>' . $number . '</span><strong>' . hb_h($label) . '</strong></div>';
        }
        $html .= '</div>';

        return $html;
    }
}

if (!function_exists('hb_render_shell')) {
    function hb_render_shell($pageTitle, $product, $contentHtml, $options = [])
    {
        $productTitle = hb_h($product['urunadi'] ?? 'Urun');
        $category = hb_h($product['urunkategori'] ?? 'Kategori');
        $price = hb_h(hb_price_text($product['urunfiyat'] ?? '0,00'));
        $imageUrl = hb_h(hb_product_image_url($product));
        $description = hb_h(hb_product_description($product));
        $slug = (string) ($product['urunlink'] ?? '');
        $productUrl = hb_build_url('hb_goster.php', ['urunlink' => $slug]);
        $backHref = $options['back_href'] ?? $productUrl;
        $backLabel = $options['back_label'] ?? 'Urun sayfasina don';
        $summaryTitle = $options['summary_title'] ?? 'Siparis Ozeti';
        $summaryHtml = $options['summary_html'] ?? '';
        $mobileBarHtml = $options['mobile_bar_html'] ?? '';
        $footerHtml = $options['footer_html'] ?? '';
        $activeStep = isset($options['active_step']) ? (int) $options['active_step'] : 1;

        header('Content-Type: text/html; charset=UTF-8');

        echo '<!DOCTYPE html>';
        echo '<html lang="tr"><head><meta charset="utf-8">';
        echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
        echo '<meta name="referrer" content="no-referrer">';
        echo '<title>' . hb_h($pageTitle) . '</title>';
        echo '<style>
            :root{
              --hb-orange:#ff6000;
              --hb-orange-dark:#e75600;
              --hb-text:#121826;
              --hb-muted:#6b7280;
              --hb-bg:#f5f7fb;
              --hb-card:#ffffff;
              --hb-border:#e5e7eb;
              --hb-shadow:0 18px 45px rgba(15,23,42,.08);
              --hb-success:#047857;
              --hb-success-bg:#ecfdf5;
              --hb-error:#be123c;
              --hb-error-bg:#fff1f2;
            }
            *{box-sizing:border-box}
            html,body{margin:0;padding:0;background:var(--hb-bg);color:var(--hb-text);font-family:Inter,Segoe UI,Arial,sans-serif}
            body{padding-bottom:96px}
            a{text-decoration:none;color:inherit}
            img{max-width:100%;display:block}
            button,input,select,textarea{font:inherit}
            .hb-topbar{position:sticky;top:0;z-index:50;background:rgba(255,255,255,.92);backdrop-filter:blur(18px);border-bottom:1px solid rgba(229,231,235,.9)}
            .hb-topbar-inner{max-width:1180px;margin:0 auto;padding:14px 16px;display:flex;align-items:center;justify-content:space-between;gap:16px}
            .hb-brand{display:flex;align-items:center;gap:12px;font-weight:800;color:#1f2937}
            .hb-brand-mark{width:42px;height:42px;border-radius:14px;background:linear-gradient(135deg,#ff6000,#ff8d3a);display:flex;align-items:center;justify-content:center;color:#fff;font-size:18px;box-shadow:0 12px 24px rgba(255,96,0,.28)}
            .hb-brand-text small{display:block;font-size:11px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;color:var(--hb-muted)}
            .hb-brand-text strong{display:block;font-size:17px;line-height:1.1}
            .hb-back{padding:10px 14px;border-radius:14px;border:1px solid var(--hb-border);background:#fff;color:#374151;font-weight:600}
            .hb-page{max-width:1180px;margin:0 auto;padding:18px 16px}
            .hb-steps{display:flex;gap:10px;flex-wrap:wrap;margin:0 0 18px}
            .hb-step{display:flex;align-items:center;gap:8px;padding:10px 12px;border-radius:999px;background:#fff;border:1px solid var(--hb-border);color:var(--hb-muted);font-size:13px;font-weight:700}
            .hb-step span{width:24px;height:24px;border-radius:999px;background:#eef2f7;display:inline-flex;align-items:center;justify-content:center}
            .hb-step.is-active{border-color:#ffd0b0;background:#fff3eb;color:#c2410c}
            .hb-step.is-active span{background:var(--hb-orange);color:#fff}
            .hb-step.is-done{border-color:#c7f9d7;background:#f0fdf4;color:#166534}
            .hb-step.is-done span{background:#22c55e;color:#fff}
            .hb-layout{display:grid;grid-template-columns:minmax(0,1.7fr) minmax(300px,.85fr);gap:18px;align-items:start}
            .hb-card{background:var(--hb-card);border:1px solid var(--hb-border);border-radius:24px;box-shadow:var(--hb-shadow)}
            .hb-hero{padding:22px;display:grid;grid-template-columns:minmax(240px,360px) minmax(0,1fr);gap:24px;align-items:center}
            .hb-media{background:linear-gradient(180deg,#fff,#fff7ed);border:1px solid #ffedd5;border-radius:22px;padding:22px;min-height:320px;display:flex;align-items:center;justify-content:center}
            .hb-media img{width:100%;max-height:320px;object-fit:contain}
            .hb-badge{display:inline-flex;align-items:center;gap:8px;padding:8px 12px;border-radius:999px;background:#fff3eb;color:#c2410c;font-size:12px;font-weight:800;letter-spacing:.03em;text-transform:uppercase}
            .hb-title{margin:14px 0 10px;font-size:32px;line-height:1.08;font-weight:800}
            .hb-subtitle{margin:0;color:var(--hb-muted);line-height:1.65;font-size:15px}
            .hb-meta{display:flex;flex-wrap:wrap;gap:10px;margin-top:16px}
            .hb-chip{padding:10px 12px;border-radius:14px;background:#f8fafc;border:1px solid var(--hb-border);font-size:13px;color:#374151}
            .hb-main-stack{display:grid;gap:18px}
            .hb-section{padding:22px}
            .hb-section h2{margin:0 0 8px;font-size:20px;line-height:1.2}
            .hb-section p{margin:0;color:var(--hb-muted);line-height:1.6}
            .hb-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:14px;margin-top:16px}
            .hb-info{padding:16px;border-radius:18px;border:1px solid var(--hb-border);background:#fcfcfd}
            .hb-info strong{display:block;font-size:14px;margin-bottom:6px}
            .hb-info span{display:block;color:var(--hb-muted);font-size:13px;line-height:1.55}
            .hb-actions{display:flex;flex-wrap:wrap;gap:12px;margin-top:18px}
            .hb-btn,.hb-btn-secondary,.hb-icon-btn{border:0;border-radius:16px;display:inline-flex;align-items:center;justify-content:center;gap:10px;font-weight:700;cursor:pointer;transition:transform .16s ease,box-shadow .16s ease,background .16s ease}
            .hb-btn{height:50px;padding:0 22px;background:linear-gradient(135deg,var(--hb-orange),#ff8b2b);color:#fff;box-shadow:0 16px 30px rgba(255,96,0,.22)}
            .hb-btn:hover,.hb-btn:focus{transform:translateY(-1px);background:linear-gradient(135deg,var(--hb-orange-dark),#ff7b1f)}
            .hb-btn-secondary{height:50px;padding:0 22px;background:#fff;border:1px solid var(--hb-border);color:#1f2937}
            .hb-icon-btn{width:50px;height:50px;background:#fff;border:1px solid var(--hb-border);color:#4b5563;font-size:20px;flex:0 0 50px}
            .hb-aside-card{padding:22px;position:sticky;top:84px}
            .hb-summary-eyebrow{font-size:12px;font-weight:800;letter-spacing:.08em;text-transform:uppercase;color:var(--hb-muted)}
            .hb-summary-price{margin:8px 0 18px;font-size:34px;font-weight:800;color:#111827}
            .hb-summary-price small{font-size:16px;font-weight:700;color:var(--hb-muted)}
            .hb-summary-lines{display:grid;gap:12px}
            .hb-summary-line{display:flex;align-items:flex-start;justify-content:space-between;gap:12px;padding:12px 0;border-top:1px solid var(--hb-border)}
            .hb-summary-line:first-child{border-top:0;padding-top:0}
            .hb-summary-line span{color:var(--hb-muted);font-size:13px}
            .hb-summary-line strong{color:#111827;font-size:14px;text-align:right}
            .hb-form{display:grid;gap:16px;margin-top:18px}
            .hb-form-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:14px}
            .hb-field label{display:block;margin-bottom:8px;font-size:13px;font-weight:700;color:#374151}
            .hb-field input,.hb-field select,.hb-field textarea{width:100%;padding:14px 15px;border-radius:16px;border:1px solid #d6dae1;background:#fff;color:#111827;outline:none;transition:border-color .16s ease,box-shadow .16s ease}
            .hb-field textarea{min-height:118px;resize:vertical}
            .hb-field input:focus,.hb-field select:focus,.hb-field textarea:focus{border-color:#ffb17d;box-shadow:0 0 0 4px rgba(255,96,0,.12)}
            .hb-help{margin-top:6px;font-size:12px;color:var(--hb-muted)}
            .hb-alert{padding:14px 16px;border-radius:18px;font-size:14px;font-weight:600;line-height:1.55}
            .hb-alert-info{background:#eff6ff;border:1px solid #bfdbfe;color:#1d4ed8}
            .hb-alert-error{background:var(--hb-error-bg);border:1px solid #fecdd3;color:var(--hb-error)}
            .hb-alert-success{background:var(--hb-success-bg);border:1px solid #a7f3d0;color:var(--hb-success)}
            .hb-list{display:grid;gap:12px;margin-top:18px}
            .hb-list-item{padding:16px;border:1px solid var(--hb-border);border-radius:18px;background:#fcfcfd}
            .hb-list-item strong{display:block;margin-bottom:6px;font-size:14px}
            .hb-list-item span{display:block;color:var(--hb-muted);font-size:13px;line-height:1.55}
            .hb-review{display:grid;gap:12px}
            .hb-review-row{display:flex;justify-content:space-between;gap:12px;padding:14px 0;border-top:1px solid var(--hb-border)}
            .hb-review-row:first-child{border-top:0;padding-top:0}
            .hb-review-row span{color:var(--hb-muted);font-size:14px}
            .hb-review-row strong{color:#111827;font-size:14px;text-align:right;max-width:66%}
            .hb-mobile-bar{position:fixed;left:0;right:0;bottom:0;z-index:60;background:rgba(255,255,255,.96);backdrop-filter:blur(18px);border-top:1px solid rgba(229,231,235,.9)}
            .hb-mobile-bar-inner{max-width:1180px;margin:0 auto;padding:10px 16px calc(10px + env(safe-area-inset-bottom));display:flex;align-items:center;gap:12px}
            .hb-mobile-price{min-width:0}
            .hb-mobile-price strong{display:block;font-size:18px}
            .hb-mobile-price span{display:block;color:var(--hb-muted);font-size:12px}
            .hb-mobile-grow{flex:1;min-width:0}
            @media (max-width:960px){
              .hb-layout{grid-template-columns:1fr}
              .hb-aside-card{position:relative;top:auto}
            }
            @media (max-width:768px){
              .hb-topbar-inner{padding:12px 14px}
              .hb-page{padding:14px}
              .hb-hero{grid-template-columns:1fr;padding:18px}
              .hb-title{font-size:27px}
              .hb-grid,.hb-form-grid{grid-template-columns:1fr}
            }
        </style>';
        echo '</head><body>';
        echo '<header class="hb-topbar"><div class="hb-topbar-inner">';
        echo '<a class="hb-brand" href="' . hb_h($productUrl) . '"><span class="hb-brand-mark">HB</span><span class="hb-brand-text"><small>PANZER Marketplace</small><strong>Hepsiburada Akisi</strong></span></a>';
        echo '<a class="hb-back" href="' . hb_h($backHref) . '">' . hb_h($backLabel) . '</a>';
        echo '</div></header>';
        echo '<div class="hb-page">';
        echo hb_steps_html($activeStep);
        echo '<div class="hb-layout">';
        echo '<main class="hb-main-stack">';
        echo '<section class="hb-card hb-hero">';
        echo '<div class="hb-media"><img src="' . $imageUrl . '" alt="' . $productTitle . '"></div>';
        echo '<div>';
        echo '<span class="hb-badge">' . $category . '</span>';
        echo '<h1 class="hb-title">' . $productTitle . '</h1>';
        echo '<p class="hb-subtitle">' . $description . '</p>';
        echo '<div class="hb-meta">';
        echo '<span class="hb-chip">Guvenli akistan tamamla</span>';
        echo '<span class="hb-chip">Dis siteye cikmaz</span>';
        echo '<span class="hb-chip">Hizli siparis formu</span>';
        echo '</div>';
        echo '</div>';
        echo '</section>';
        echo $contentHtml;
        echo '</main>';
        echo '<aside>';
        echo '<section class="hb-card hb-aside-card">';
        echo '<div class="hb-summary-eyebrow">' . hb_h($summaryTitle) . '</div>';
        echo '<div class="hb-summary-price">' . $price . ' <small>TL</small></div>';
        echo $summaryHtml;
        echo '</section>';
        echo '</aside>';
        echo '</div>';
        echo '</div>';
        echo $mobileBarHtml;
        echo $footerHtml;
        echo '</body></html>';
        exit;
    }
}

if (!function_exists('hb_render_missing_product')) {
    function hb_render_missing_product($message = 'Urun bulunamadi.')
    {
        header('Content-Type: text/html; charset=UTF-8');
        echo '<!DOCTYPE html><html lang="tr"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Urun bulunamadi</title><style>body{margin:0;display:grid;place-items:center;min-height:100vh;background:#f5f7fb;font-family:Inter,Segoe UI,Arial,sans-serif;color:#111827}.box{max-width:460px;padding:28px;border-radius:24px;background:#fff;border:1px solid #e5e7eb;box-shadow:0 18px 45px rgba(15,23,42,.08)}h1{margin:0 0 8px;font-size:28px}p{margin:0 0 18px;color:#6b7280;line-height:1.6}.btn{display:inline-flex;align-items:center;justify-content:center;height:46px;padding:0 18px;border-radius:14px;background:#ff6000;color:#fff;text-decoration:none;font-weight:700}</style></head><body><div class="box"><h1>Urun bulunamadi</h1><p>' . hb_h($message) . '</p><a class="btn" href="index.php">Ana sayfaya don</a></div></body></html>';
        exit;
    }
}
