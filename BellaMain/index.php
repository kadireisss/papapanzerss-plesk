<?php
/**
 * PANZER · landing (v3, sifirdan, pzr-* dili)
 * Cloudflare IP kapisi: turuncu bulut / origin’de CF IP’si yoksa 403 olmamasi icin
 * Railway (RAILWAY_*), Plesk tipik docroot, BELLLA_SKIP_CF_GATE, .allow_direct_traffic ile atlanir.
 * Sayfa sade: ejder + PANZER PANEL + Panele Gir.
 */

$cloudflareIps = [
    '103.21.244.0/22','103.22.200.0/22','103.31.4.0/22','104.16.0.0/13',
    '104.24.0.0/14','108.162.192.0/18','131.0.72.0/22','141.101.64.0/18',
    '162.158.0.0/15','172.64.0.0/13','173.245.48.0/20','188.114.96.0/20',
    '190.93.240.0/20','197.234.240.0/22','198.41.128.0/17',
];

function ip_in_range($ip, $range) {
    if (strpos($range, '/') === false) { $range .= '/32'; }
    list($range, $netmask) = explode('/', $range, 2);
    $r = ip2long($range);
    $i = ip2long($ip);
    if ($r === false || $i === false) { return false; }
    $mask = ~(pow(2, (32 - $netmask)) - 1);
    return ($i & $mask) == ($r & $mask);
}

/**
 * Plesk (Linux/Windows): document root genelde .../vhosts/.../httpdocs veya httpsdocs.
 * Railway / cogu PaaS bu yolu kullanmaz.
 */
function bellla_skip_cloudflare_gate(): bool
{
    if (getenv('BELLLA_SKIP_CF_GATE') === '1') {
        return true;
    }
    if (is_file(__DIR__ . DIRECTORY_SEPARATOR . '.allow_direct_traffic')) {
        return true;
    }
    $doc = (string) ($_SERVER['DOCUMENT_ROOT'] ?? '');
    $norm = strtolower(str_replace('\\', '/', $doc));
    if (str_contains($norm, '/vhosts/')
        && (str_contains($norm, '/httpdocs') || str_contains($norm, '/httpsdocs'))) {
        return true;
    }
    if (@is_readable('/usr/local/psa/version')) {
        return true;
    }

    return false;
}

$clientIp = $_SERVER['REMOTE_ADDR'] ?? '';
$isLocal  = in_array($clientIp, ['127.0.0.1', '::1'], true);
$isRailway = (getenv('RAILWAY_ENVIRONMENT') !== false && getenv('RAILWAY_ENVIRONMENT') !== '')
    || (getenv('RAILWAY_PROJECT_ID') !== false && getenv('RAILWAY_PROJECT_ID') !== '');
$skipCfGate = bellla_skip_cloudflare_gate();
$isCf     = false;
if (!$isLocal && !$skipCfGate) {
    foreach ($cloudflareIps as $cf) {
        if (ip_in_range($clientIp, $cf)) { $isCf = true; break; }
    }
}
if (!$isLocal && !$isCf && !$isRailway && !$skipCfGate) {
    header('HTTP/1.1 403 Forbidden');
    exit();
}

require_once __DIR__ . '/includes/panzer_brand.php';
$pzrEsc = static fn($v) => htmlspecialchars((string)($v ?? ''), ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="tr" data-bs-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>PANZER · Panel</title>
  <script>
    document.addEventListener("visibilitychange", function () {
      document.title = document.visibilityState === 'hidden' ? 'Bizi unutma :)' : 'PANZER · Panel';
    });
  </script>
  <?php panzer_brand_favicon_link(); ?>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
  <?php panzer_brand_head_link(); ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    :root {
      --pzr-red:     #c41e3a;
      --pzr-red-hot: #ff4d6d;
      --pzr-red-deep:#6b0a1a;
      --pzr-text:    #e9ecf4;
      --pzr-mute:    #6b7388;
      --pzr-line:    rgba(255,255,255,0.08);
      --pzr-ease:    cubic-bezier(0.22, 1, 0.36, 1);
    }

    *, *::before, *::after { box-sizing: border-box; }

    html, body {
      margin: 0;
      padding: 0;
      min-height: 100vh;
      font-family: 'Inter', system-ui, -apple-system, sans-serif;
      color: var(--pzr-text);
      overflow-x: hidden;
    }

    body {
      background:
        radial-gradient(1200px 700px at 50% 38%, rgba(196,30,58,0.32), transparent 60%),
        radial-gradient(900px 500px at 0% 110%, rgba(80,120,255,0.10), transparent 55%),
        radial-gradient(900px 500px at 100% 0%, rgba(196,30,58,0.16), transparent 55%),
        linear-gradient(160deg, #14171f 0%, #0a0c12 50%, #07080d 100%);
      background-attachment: fixed;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 4rem 1.5rem 6rem;
      position: relative;
    }

    /* noise overlay */
    body::before {
      content: "";
      position: fixed;
      inset: 0;
      background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='200' height='200'><filter id='n'><feTurbulence baseFrequency='0.85'/></filter><rect width='200' height='200' filter='url(%23n)' opacity='0.55'/></svg>");
      opacity: 0.06;
      pointer-events: none;
      mix-blend-mode: overlay;
      z-index: 0;
    }

    /* drift ambient orbs */
    body::after {
      content: "";
      position: fixed;
      inset: 0;
      background:
        radial-gradient(280px 280px at 18% 78%, rgba(196,30,58,0.18), transparent 70%),
        radial-gradient(220px 220px at 85% 22%, rgba(255,80,110,0.14), transparent 70%);
      pointer-events: none;
      z-index: 0;
      animation: pzrDrift 22s ease-in-out infinite alternate;
    }
    @keyframes pzrDrift {
      from { transform: translate3d(0, 0, 0); }
      to   { transform: translate3d(-22px, 18px, 0); }
    }

    /* corner version chip */
    .pzr-version {
      position: fixed;
      top: 18px;
      right: 22px;
      z-index: 5;
      font-size: 0.68rem;
      letter-spacing: 0.2em;
      text-transform: uppercase;
      font-weight: 700;
      color: var(--pzr-mute);
      padding: 0.35rem 0.75rem;
      border-radius: 999px;
      background: rgba(255,255,255,0.04);
      border: 1px solid var(--pzr-line);
    }

    .pzr-version em {
      color: var(--pzr-red-hot);
      font-style: normal;
      font-weight: 800;
    }

    /* main content card */
    .pzr-landing {
      position: relative;
      z-index: 2;
      text-align: center;
      max-width: 720px;
      width: 100%;
      animation: pzrIn 0.65s var(--pzr-ease) both;
    }

    @keyframes pzrIn {
      from { opacity: 0; transform: translateY(18px); }
      to   { opacity: 1; transform: none; }
    }

    /* dragon */
    .pzr-dragon {
      position: relative;
      width: 220px;
      height: 220px;
      margin: 0 auto 1.6rem;
      border-radius: 50%;
      padding: 5px;
      background: conic-gradient(from 220deg, var(--pzr-red), var(--pzr-red-hot), var(--pzr-red-deep), var(--pzr-red));
      animation: pzrSpin 14s linear infinite;
      box-shadow:
        0 0 60px rgba(196,30,58,0.55),
        0 0 140px rgba(196,30,58,0.32),
        0 0 220px rgba(255,80,110,0.18);
    }

    .pzr-dragon::before {
      content: "";
      position: absolute;
      inset: -28px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(255,80,110,0.45) 0%, transparent 65%);
      filter: blur(18px);
      z-index: -1;
      animation: pzrPulse 2.6s ease-in-out infinite;
    }

    .pzr-dragon::after {
      content: "";
      position: absolute;
      inset: -8px;
      border-radius: 50%;
      border: 1px solid rgba(255,80,110,0.25);
      z-index: -1;
    }

    .pzr-dragon img {
      width: 100%;
      height: 100%;
      border-radius: 50%;
      object-fit: cover;
      display: block;
      background: #1a0606;
    }

    @keyframes pzrSpin { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
    @keyframes pzrPulse {
      0%,100% { opacity: 0.55; transform: scale(1); }
      50%     { opacity: 1;    transform: scale(1.10); }
    }

    /* title */
    .pzr-title {
      font-family: 'Inter', sans-serif;
      font-weight: 900;
      font-size: clamp(2.4rem, 8vw, 4.5rem);
      letter-spacing: 0.18em;
      line-height: 1;
      margin: 0 0 0.8rem;
      background: linear-gradient(180deg, #fff 0%, #ffd1d8 55%, #ff8197 100%);
      -webkit-background-clip: text;
      background-clip: text;
      color: transparent;
      text-shadow: 0 0 32px rgba(196,30,58,0.55);
    }

    .pzr-sub {
      font-size: 0.82rem;
      letter-spacing: 0.32em;
      text-transform: uppercase;
      color: var(--pzr-mute);
      font-weight: 700;
      margin-bottom: 2.4rem;
    }

    .pzr-sub em {
      color: var(--pzr-red-hot);
      font-style: normal;
      font-weight: 800;
      letter-spacing: 0.18em;
    }

    /* CTA */
    .pzr-cta {
      display: inline-flex;
      align-items: center;
      gap: 0.7rem;
      padding: 1rem 2.2rem;
      border-radius: 14px;
      border: 0;
      font-weight: 800;
      letter-spacing: 0.18em;
      font-size: 0.95rem;
      text-transform: uppercase;
      color: #fff;
      background: linear-gradient(135deg, var(--pzr-red) 0%, var(--pzr-red-hot) 50%, var(--pzr-red) 100%);
      background-size: 200% 200%;
      box-shadow:
        0 18px 40px rgba(196,30,58,0.55),
        inset 0 1px 0 rgba(255,255,255,0.22);
      text-decoration: none;
      transition: all 0.32s var(--pzr-ease);
      cursor: pointer;
      position: relative;
      overflow: hidden;
      animation: pzrShimmer 4s ease-in-out infinite;
    }

    @keyframes pzrShimmer {
      0%   { background-position: 0% 50%; }
      50%  { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .pzr-cta:hover {
      transform: translateY(-3px) scale(1.02);
      box-shadow:
        0 26px 52px rgba(196,30,58,0.7),
        inset 0 1px 0 rgba(255,255,255,0.28);
      color: #fff;
    }

    .pzr-cta:active {
      transform: translateY(-1px) scale(1.0);
    }

    .pzr-cta i {
      transition: transform 0.32s var(--pzr-ease);
    }

    .pzr-cta:hover i {
      transform: translateX(3px);
    }

    /* small features bar */
    .pzr-feats {
      margin-top: 3rem;
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 0.55rem;
    }

    .pzr-feats span {
      display: inline-flex;
      align-items: center;
      gap: 0.4rem;
      padding: 0.4rem 0.85rem;
      border-radius: 999px;
      background: rgba(255,255,255,0.03);
      border: 1px solid var(--pzr-line);
      color: var(--pzr-mute);
      font-size: 0.72rem;
      font-weight: 600;
      letter-spacing: 0.04em;
    }

    .pzr-feats span i { color: var(--pzr-red-hot); font-size: 0.78rem; }

    /* fixed bottom signature */
    .pzr-bottom {
      position: fixed;
      left: 0;
      right: 0;
      bottom: 0;
      z-index: 5;
      padding: 0.95rem 1.4rem;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.6rem;
      background:
        linear-gradient(180deg, rgba(0,0,0,0) 0%, rgba(0,0,0,0.6) 100%);
      font-size: 0.75rem;
      letter-spacing: 0.16em;
      text-transform: uppercase;
      color: var(--pzr-mute);
      font-weight: 600;
      pointer-events: none;
    }

    .pzr-bottom img {
      width: 22px;
      height: 22px;
      border-radius: 50%;
      box-shadow: 0 0 0 1px var(--pzr-line), 0 0 12px rgba(196,30,58,0.4);
    }

    .pzr-bottom strong {
      color: #fff;
      font-weight: 900;
      letter-spacing: 0.22em;
    }

    .pzr-bottom em {
      color: var(--pzr-red-hot);
      font-style: normal;
      font-weight: 800;
    }

    @media (max-width: 540px) {
      body { padding: 3rem 1rem 5rem; }
      .pzr-dragon { width: 170px; height: 170px; }
      .pzr-cta { padding: 0.85rem 1.6rem; font-size: 0.82rem; letter-spacing: 0.14em; }
      .pzr-version { font-size: 0.62rem; padding: 0.3rem 0.6rem; }
      .pzr-bottom { font-size: 0.65rem; padding: 0.7rem 1rem; }
    }
  </style>
</head>
<body>

  <span class="pzr-version">PANEL · <em>v3</em></span>

  <main class="pzr-landing">
    <div class="pzr-dragon">
      <img src="<?php echo $pzrEsc(panzer_brand_dragon_url()); ?>" alt="PANZER">
    </div>

    <h1 class="pzr-title">PANZER PANEL</h1>
    <div class="pzr-sub">the <em>designedbybossxxlife</em> · komuta merkezi</div>

    <a href="signin.php" class="pzr-cta">
      <i class="fa fa-sign-in"></i>
      <span>Panele Gir</span>
      <i class="fa fa-angle-right" style="font-size: 1.1rem;"></i>
    </a>

    <div class="pzr-feats">
      <span><i class="fa fa-shield"></i> Şifrelenmiş kanal</span>
      <span><i class="fa fa-bolt"></i> Anlık güncelleme</span>
      <span><i class="fa fa-paper-plane"></i> Telegram entegrasyonu</span>
    </div>
  </main>

  <div class="pzr-bottom">
    <img src="<?php echo $pzrEsc(panzer_brand_dragon_url()); ?>" alt="">
    <span><strong>PANZER</strong> · the <em>designedbybossxxlife</em></span>
  </div>

</body>
</html>