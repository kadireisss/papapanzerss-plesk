<?php
require_once __DIR__ . '/database/connect.php';
require_once __DIR__ . '/includes/panzer_brand.php';

if (isset($_COOKIE['2tUgyO@H9E!4CuQ'])) {
    header('Location: dashboard.php');
    exit();
}

// Kimlik bilgisi URL'de kalmasin (GET ile giris yok).
if (array_key_exists('kul_id', $_GET)
    || array_key_exists('kul_sifre', $_GET)
    || array_key_exists('oturumacgiris', $_GET)
    || array_key_exists('oturum_acgiris', $_GET)) {
    header('Location: signin.php', true, 303);
    exit();
}

$pzrEsc = static fn($v) => htmlspecialchars((string)($v ?? ''), ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="tr" data-bs-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>PANZER · Giriş</title>
  <script>
    document.addEventListener("visibilitychange", function () {
      document.title = document.visibilityState === 'hidden' ? 'Bizi unutma :)' : 'PANZER · Giriş';
    });
  </script>
  <?php panzer_brand_favicon_link(); ?>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link href="<?php echo $pzrEsc(panzer_brand_public_path('assets/css/plugins.bundle.css')); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo $pzrEsc(panzer_brand_public_path('assets/css/style.bundle.css')); ?>" rel="stylesheet" type="text/css">
  <?php panzer_brand_head_link(); ?>
  <link href="<?php echo $pzrEsc(panzer_brand_public_path('assets/css/pzr-auth.css')); ?>" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js" crossorigin="anonymous"></script>
  <script>window.jQuery||document.write('<script src="https://code.jquery.com/jquery-3.6.4.min.js"><\/script>');</script>
</head>
<body id="kt_body" class="pzr-auth panzer-branded-page">

  <div class="pzr-auth__root">

    <!-- ============== LEFT BRAND PANEL ============== -->
    <aside class="pzr-auth__brand">
      <div class="pzr-auth__top">
        <div class="pzr-auth__logo">
          <img src="<?php echo $pzrEsc(panzer_brand_dragon_url()); ?>" alt="PANZER">
        </div>
        <div class="pzr-auth__brand-text">
          <div class="pzr-auth__brand-name">PANZER</div>
          <div class="pzr-auth__brand-sig">the <em>designedbybossxxlife</em></div>
        </div>
      </div>

      <div class="pzr-auth__hero">
        <h1>Komuta panelin <em>seni bekliyor.</em></h1>
        <p>Tek noktadan tüm pazaryerlerin, IBAN ayarların, çekim talepleri ve botların. PANZER ile sahaya çık.</p>
        <div class="pzr-auth__features">
          <span class="pzr-auth__feat"><i class="fa fa-shield"></i> Şifrelenmiş kanal</span>
          <span class="pzr-auth__feat"><i class="fa fa-bolt"></i> Anlık güncelleme</span>
          <span class="pzr-auth__feat"><i class="fa fa-paper-plane"></i> Telegram bot entegrasyonu</span>
        </div>
      </div>

      <div class="pzr-auth__brand-footer">
        <img src="<?php echo $pzrEsc(panzer_brand_dragon_url()); ?>" alt="">
        <span>PANZER · the designedbybossxxlife</span>
      </div>
    </aside>

    <!-- ============== RIGHT FORM PANEL ============== -->
    <main class="pzr-auth__pane">
      <div class="pzr-auth__card">
        <div class="pzr-auth__card-head">
          <h1 class="pzr-auth__card-title"><span class="pzr-bar"></span>Giriş Yap</h1>
          <p class="pzr-auth__card-sub">Hesabın yok mu? <a href="signup">Kayıt ol</a></p>
        </div>

        <form id="kt_sign_in_form" method="post" action="signin.php" autocomplete="username">
          <div class="pzr-auth__field fv-row">
            <label class="pzr-auth__field-label">Kullanıcı Adı</label>
            <div class="pzr-auth__input-wrap">
              <input class="form-control" type="text" name="kul_id" autocomplete="username" placeholder="kullanici_adi">
            </div>
          </div>

          <div class="pzr-auth__field fv-row">
            <div class="pzr-auth__field-row">
              <label class="pzr-auth__field-label">Şifre</label>
              <a class="pzr-auth__field-link" href="https://t.me/illegaljosex" target="_blank" rel="noopener">Şifreni mi unuttun?</a>
            </div>
            <div class="pzr-auth__input-wrap">
              <input class="form-control" type="password" name="kul_sifre" id="sifre" autocomplete="current-password" placeholder="••••••••" style="padding-right:50px;">
              <button type="button" id="showPassword" class="pzr-auth__input-icon" title="Göster/gizle">
                <i class="fa fa-eye"></i>
              </button>
            </div>
          </div>

          <input type="hidden" name="oturumacgiris" value="oturumacgiris">
          <button type="submit" id="kt_sign_in_submit" class="pzr-auth__cta">
            <span class="indicator-label"><i class="fa fa-sign-in"></i><span>Giriş Yap</span></span>
            <span class="indicator-progress"><span class="spinner-border spinner-border-sm"></span><span>Lütfen bekleyin…</span></span>
          </button>
        </form>

        <div class="pzr-auth__alt">
          PANZER · the designedbybossxxlife · <em style="color: var(--pzr-mute);">v3</em>
        </div>
      </div>
    </main>

  </div>

  <script>var hostUrl = "<?php echo $pzrEsc(panzer_brand_public_path('assets/')); ?>";</script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@form-validation/cjs/popular@2.4.0/index.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@form-validation/cjs/plugin-bootstrap5@2.4.0/index.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@form-validation/cjs/plugin-trigger@2.4.0/index.min.js"></script>
  <script src="<?php echo $pzrEsc(panzer_brand_public_path('assets/js/scripts.bundle.js')); ?>"></script>
  <script>
    (function () {
      var pwd = document.getElementById('sifre');
      var btn = document.getElementById('showPassword');
      if (!pwd || !btn) return;
      btn.addEventListener('click', function () {
        pwd.type = pwd.type === 'password' ? 'text' : 'password';
        var icon = btn.querySelector('i');
        if (icon) icon.className = pwd.type === 'password' ? 'fa fa-eye' : 'fa fa-eye-slash';
      });
    })();
  </script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var form = document.querySelector('#kt_sign_in_form');
      var btn = document.querySelector('#kt_sign_in_submit');
      if (!form || !btn) return;

      function showErr(msg) {
        if (window.Swal) {
          Swal.fire({ text: msg, icon: 'warning', buttonsStyling: false, confirmButtonText: 'Tamam', customClass: { confirmButton: 'btn btn-primary' } });
        } else {
          alert(msg);
        }
      }

      function doLogin() {
        btn.setAttribute('data-kt-indicator', 'on');
        btn.disabled = true;
        var fd = new FormData(form);
        fetch('database/post.php', { method: 'POST', body: fd, credentials: 'same-origin', headers: { 'X-Requested-With': 'XMLHttpRequest' } })
          .then(function (r) { return r.text(); })
          .then(function (text) {
            var data;
            try { data = JSON.parse(text); } catch (e) { throw new Error('invalid-json'); }
            if (!window.Swal) {
              if (data && data.sonuc === 'tamam') location.href = 'dashboard.php';
              return;
            }
            if (data.sonuc === 'tamam') {
              Swal.fire({ text: 'Giriş başarılı.', icon: 'success', buttonsStyling: false, timer: 1500, showConfirmButton: false })
                .then(function () { location.href = 'dashboard.php'; });
            } else if (data.sonuc === 'yanlis') {
              Swal.fire({ text: 'Kullanıcı adı veya şifre yanlış.', icon: 'error', buttonsStyling: false, confirmButtonText: 'Anladım', customClass: { confirmButton: 'btn btn-primary' } });
            } else if (data.sonuc === 'bos') {
              Swal.fire({ text: 'Kullanıcı adı veya şifre boş olamaz.', icon: 'warning', buttonsStyling: false, confirmButtonText: 'Tamam', customClass: { confirmButton: 'btn btn-primary' } });
            } else {
              Swal.fire({ text: 'Bir aksaklık oluştu, tekrar dene.', icon: 'error', buttonsStyling: false, confirmButtonText: 'Tamam', customClass: { confirmButton: 'btn btn-primary' } });
            }
          })
          .catch(function () {
            if (window.Swal) Swal.fire({ text: 'Sunucuya ulaşılamadı veya beklenmeyen yanıt.', icon: 'error', buttonsStyling: false, confirmButtonText: 'Tamam', customClass: { confirmButton: 'btn btn-primary' } });
          })
          .finally(function () {
            btn.removeAttribute('data-kt-indicator');
            btn.disabled = false;
          });
      }

      form.addEventListener('submit', function (e) {
        e.preventDefault();
        var uid = (form.querySelector('[name=kul_id]') || {}).value || '';
        var pw = (form.querySelector('[name=kul_sifre]') || {}).value || '';
        if (!uid.trim() || !pw) {
          showErr('Kullanıcı adı ve şifre gerekli.');
          return;
        }
        if (window.FormValidation && FormValidation.formValidation) {
          var validator = FormValidation.formValidation(form, {
            fields: {
              kul_id: { validators: { notEmpty: { message: 'Kullanıcı adı boş olamaz' } } },
              kul_sifre: { validators: { notEmpty: { message: 'Şifre boş olamaz' } } }
            },
            plugins: {
              trigger: new FormValidation.plugins.Trigger(),
              bootstrap: new FormValidation.plugins.Bootstrap5({ rowSelector: '.fv-row, .pzr-auth__field', eleInvalidClass: '', eleValidClass: '' })
            }
          });
          validator.validate().then(function (status) {
            if (status === 'Valid') doLogin();
          });
        } else {
          doLogin();
        }
      });
    });
  </script>
</body>
</html>
