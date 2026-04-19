<?php
require_once __DIR__ . '/includes/panzer_brand.php';
$pzrEsc = static fn($v) => htmlspecialchars((string)($v ?? ''), ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="tr" data-bs-theme="dark">
<head>
  <base href="<?php echo $pzrEsc(panzer_brand_asset_base() === '' ? '/' : panzer_brand_asset_base()); ?>">
  <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PANZER · 404</title>
  <script>
    document.addEventListener("visibilitychange", function () {
      document.title = document.visibilityState === 'hidden' ? 'Bizi unutma :)' : 'PANZER · 404';
    });
  </script>
  <?php panzer_brand_favicon_link(); ?>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
  <?php panzer_brand_head_link(); ?>
  <link href="<?php echo $pzrEsc(panzer_brand_public_path('assets/css/pzr-auth.css')); ?>" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="pzr-auth panzer-branded-page">
  <div class="pzr-404">
    <div class="pzr-404__inner">
      <div class="pzr-404__dragon">
        <img src="<?php echo $pzrEsc(panzer_brand_dragon_url()); ?>" alt="PANZER">
      </div>
      <div class="pzr-404__code">404</div>
      <div class="pzr-404__title">Burada öyle bir sayfa yok.</div>
      <p class="pzr-404__sub">Aradığın yer ya silindi, ya hiç olmadı, ya da yanlış adres yazdın. Üst üste deneyince de bulamayacaksın.</p>
      <a href="dashboard" class="pzr-404__cta"><i class="fa fa-home"></i><span>Ana Sayfa</span></a>
    </div>
  </div>
</body>
</html>
