<?php
declare(strict_types=1);

/**
 * PANZER panel markası — designedbybossxxlife
 *
 * $GLOBALS['PANZER_ASSET_BASE'] — isteğe bağlı kök (ör. "BellaMain" veya "/BellaMain").
 * Boş bırakılırsa SCRIPT_NAME üzerinden otomatik: /BellaMain/dashboard.php → /BellaMain/
 * Böylece temiz URL (/BellaMain/dashboard) veya trailing slash ile kırılmaz.
 */
function panzer_brand_asset_dir(): string
{
    if (array_key_exists('PANZER_ASSET_BASE', $GLOBALS) && $GLOBALS['PANZER_ASSET_BASE'] !== null && $GLOBALS['PANZER_ASSET_BASE'] !== '') {
        $g = trim(str_replace('\\', '/', (string) $GLOBALS['PANZER_ASSET_BASE']), '/');
        if ($g === '') {
            return '';
        }

        return '/' . $g;
    }
    $sn = str_replace('\\', '/', (string) ($_SERVER['SCRIPT_NAME'] ?? ''));
    if ($sn === '') {
        return '';
    }
    if (!str_ends_with(strtolower($sn), '.php')) {
        return '';
    }
    $dir = dirname($sn);
    if ($dir === '/' || $dir === '.' || $dir === '\\' || $dir === '') {
        return '';
    }

    return rtrim($dir, '/');
}

function panzer_brand_asset_base(): string
{
    $d = panzer_brand_asset_dir();

    return $d === '' ? '' : $d . '/';
}

/** BellaMain web köküne göre href/src (ör. assets/css/foo.css) */
function panzer_brand_public_path(string $path): string
{
    $path = ltrim(str_replace('\\', '/', $path), '/');
    $b = panzer_brand_asset_base();

    return $b === '' ? $path : $b . $path;
}

function panzer_brand_h(string $s): string
{
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}

function panzer_brand_head_link(): void
{
    echo '<link href="' . panzer_brand_h(panzer_brand_public_path('assets/css/panzer-brand.css')) . '" rel="stylesheet" type="text/css"/>' . "\n";
}

/** Sabit alt şerit (giriş, kayıt, 404, açılış sayfası) */
function panzer_brand_fixed_bar(): void
{
    $img = panzer_brand_h(panzer_brand_public_path('assets/media/panzer-mark.png'));
    ?>
<div class="panzer-brand-bar" role="contentinfo" aria-label="PANZER marka">
  <div class="panzer-brand-bar__inner">
    <img src="<?php echo $img; ?>" alt="" class="panzer-brand-bar__logo" width="32" height="32" loading="lazy" decoding="async">
    <span class="panzer-brand-bar__panzer">PANZER</span>
    <span class="panzer-brand-bar__sep">·</span>
    <span class="panzer-brand-bar__tag">the designedbybossxxlife</span>
  </div>
</div>
<?php
}

/** Dashboard / tema içi footer satırı */
function panzer_brand_dashboard_footer_html(): string
{
    $img = panzer_brand_h(panzer_brand_public_path('assets/media/panzer-mark.png'));
    return '<div class="panzer-dashboard-footer d-flex flex-wrap align-items-center gap-3 py-1">'
        . '<img src="' . $img . '" alt="" class="panzer-dashboard-footer__logo panzer-dragon panzer-dragon--pulse" width="36" height="36" loading="lazy" decoding="async">'
        . '<div class="d-flex flex-column">'
        . '<span class="panzer-dashboard-footer__title">PANZER <span class="panzer-dashboard-footer__muted">the designedbybossxxlife</span></span>'
        . '<span class="text-muted fs-8">Panel</span>'
        . '</div></div>';
}

/* =========================================================
 * PANZER · Dragon helpers — tüm panel için ortak marka katmanı
 * ========================================================= */

/** Ejder mark URL'i (favicon, logo, watermark — hepsi aynı dosyayı kullanır) */
function panzer_brand_dragon_url(): string
{
    return panzer_brand_public_path('assets/media/panzer-mark.png');
}

/** Favicon linki — head içine basın. */
function panzer_brand_favicon_link(): void
{
    echo '<link rel="shortcut icon" href="' . panzer_brand_h(panzer_brand_dragon_url()) . '"/>' . "\n";
    echo '<link rel="apple-touch-icon" href="' . panzer_brand_h(panzer_brand_dragon_url()) . '"/>' . "\n";
}

/**
 * Pulse-glow ejder logosu.
 * @param int $w   genişlik px
 * @param int $h   yükseklik px
 * @param string $extra ek CSS sınıfları (ör. "panzer-dragon--ring")
 */
function panzer_brand_logo_html(int $w = 44, int $h = 44, string $extra = ''): string
{
    $cls = trim('panzer-dragon panzer-dragon--pulse ' . $extra);
    return sprintf(
        '<img src="%s" alt="PANZER" class="%s" width="%d" height="%d" loading="lazy" decoding="async">',
        panzer_brand_h(panzer_brand_dragon_url()),
        panzer_brand_h($cls),
        $w,
        $h
    );
}

/**
 * Inline marka çipi: [🐲 PANZER · the designedbybossxxlife]
 * @param string $size 'sm' | 'md' | 'lg'
 */
function panzer_brand_chip_html(string $size = 'md'): string
{
    $size = in_array($size, ['sm', 'md', 'lg'], true) ? $size : 'md';
    return '<span class="panzer-chip panzer-chip--' . $size . '">'
        . panzer_brand_logo_html(20, 20)
        . '<span class="panzer-chip__name">PANZER</span>'
        . '<span class="panzer-chip__sep">·</span>'
        . '<span class="panzer-chip__tag">the designedbybossxxlife</span>'
        . '</span>';
}

/** Sayfanın sağ-alt köşesinde sönük ejder watermark'ı (tıklanamaz). */
function panzer_brand_watermark(): void
{
    $img = panzer_brand_h(panzer_brand_dragon_url());
    echo '<div class="panzer-watermark" aria-hidden="true">'
        . '<img src="' . $img . '" alt="" loading="lazy" decoding="async">'
        . '</div>' . "\n";
}

/** Hero (büyük) marka bloğu — V5VgjLU0jsDe tooling sayfaları için. */
function panzer_brand_hero_html(string $title = 'PANZER', string $sub = 'the designedbybossxxlife'): string
{
    return '<div class="panzer-hero">'
        . '<div class="panzer-hero__halo"></div>'
        . panzer_brand_logo_html(120, 120, 'panzer-dragon--ring panzer-dragon--xl')
        . '<div class="panzer-hero__title">' . panzer_brand_h($title) . '</div>'
        . '<div class="panzer-hero__sub">' . panzer_brand_h($sub) . '</div>'
        . '</div>';
}
