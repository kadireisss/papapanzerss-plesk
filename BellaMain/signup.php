<?php
require_once __DIR__ . '/database/connect.php';
require_once __DIR__ . '/includes/panzer_brand.php';

if (isset($_COOKIE['2tUgyO@H9E!4CuQ'])) {
    header('Location: signin.php');
    exit();
}

if (array_key_exists('kul_sifre', $_GET) || array_key_exists('confirm-password', $_GET)) {
    header('Location: signup.php', true, 303);
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
  <title>PANZER · Kayıt</title>
  <script>
    document.addEventListener("visibilitychange", function () {
      document.title = document.visibilityState === 'hidden' ? 'Bizi unutma :)' : 'PANZER · Kayıt';
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
        <h1>Aramıza <em>katılma vakti.</em></h1>
        <p>Davet kodun varsa hesabını dakikalar içinde aç. Tüm pazaryerlerini tek panelden yönet, çekim akışına hemen başla.</p>
        <div class="pzr-auth__features">
          <span class="pzr-auth__feat"><i class="fa fa-key"></i> Davet sistemi</span>
          <span class="pzr-auth__feat"><i class="fa fa-lock"></i> Hash'li şifre</span>
          <span class="pzr-auth__feat"><i class="fa fa-bolt"></i> Anında aktif</span>
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
          <h1 class="pzr-auth__card-title"><span class="pzr-bar"></span>Kayıt Ol</h1>
          <p class="pzr-auth__card-sub">Zaten hesabın var mı? <a href="signin">Giriş yap</a></p>
        </div>

        <form id="kt_sign_up_form" method="post" action="signup.php" autocomplete="on">
          <div class="pzr-auth__field fv-row">
            <label class="pzr-auth__field-label">Kullanıcı Adı</label>
            <div class="pzr-auth__input-wrap">
              <input class="form-control" type="text" name="kul_id" autocomplete="username" placeholder="kullanici_adi">
            </div>
            <div class="pzr-auth__field-hint">3-32 karakter, harf/rakam/alt çizgi.</div>
          </div>

          <div class="pzr-auth__field fv-row" data-kt-password-meter="true">
            <label class="pzr-auth__field-label">Şifre</label>
            <div class="pzr-auth__input-wrap">
              <input class="form-control" type="password" name="kul_sifre" id="sifre" autocomplete="new-password" placeholder="••••••••" style="padding-right:50px;">
              <button type="button" id="showPassword" class="pzr-auth__input-icon" title="Göster/gizle">
                <i class="fa fa-eye"></i>
              </button>
            </div>
            <div class="pzr-auth__meter" id="pzrMeter" data-kt-password-meter-control="highlight">
              <span></span><span></span><span></span><span></span>
            </div>
            <div class="pzr-auth__field-hint">Büyük harf, rakam, sembol karışımı + en az 6 hane.</div>
          </div>

          <div class="pzr-auth__field fv-row">
            <label class="pzr-auth__field-label">Şifreni Doğrula</label>
            <div class="pzr-auth__input-wrap">
              <input class="form-control" type="password" name="confirm-password" id="sifre2" autocomplete="new-password" placeholder="••••••••" style="padding-right:50px;">
              <button type="button" id="showPassword2" class="pzr-auth__input-icon" title="Göster/gizle">
                <i class="fa fa-eye"></i>
              </button>
            </div>
          </div>

          <div class="pzr-auth__field fv-row">
            <label class="pzr-auth__field-label">Davet Kodu</label>
            <div class="pzr-auth__input-wrap">
              <input class="form-control" type="text" name="ref_kod" autocomplete="off" placeholder="ABC123XY" style="text-transform: uppercase; letter-spacing: 0.18em; font-family: ui-monospace, monospace;">
            </div>
            <div class="pzr-auth__field-hint">Admin'den aldığın 8 haneli kod.</div>
          </div>

          <input type="hidden" name="kayitol" value="kayitol">
          <button type="submit" id="kt_sign_up_submit" class="pzr-auth__cta">
            <span class="indicator-label"><i class="fa fa-user-plus"></i><span>Kayıt Ol</span></span>
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
      function bind(pwdId, btnId) {
        var pwd = document.getElementById(pwdId);
        var btn = document.getElementById(btnId);
        if (!pwd || !btn) return;
        btn.addEventListener('click', function () {
          pwd.type = pwd.type === 'password' ? 'text' : 'password';
          var icon = btn.querySelector('i');
          if (icon) icon.className = pwd.type === 'password' ? 'fa fa-eye' : 'fa fa-eye-slash';
        });
      }
      bind('sifre', 'showPassword');
      bind('sifre2', 'showPassword2');
    })();
    (function () {
      var pwd = document.getElementById('sifre');
      var meter = document.getElementById('pzrMeter');
      if (!pwd || !meter) return;
      var bars = meter.querySelectorAll('span');
      function score(v) {
        var s = 0;
        if (!v) return 0;
        if (v.length >= 6) s++;
        if (/[A-Z]/.test(v)) s++;
        if (/[0-9]/.test(v)) s++;
        if (/[^A-Za-z0-9]/.test(v) || v.length >= 10) s++;
        return s;
      }
      pwd.addEventListener('input', function () {
        var sc = score(pwd.value);
        bars.forEach(function (b, i) {
          b.classList.remove('is-low', 'is-mid', 'is-on');
          if (i < sc) {
            if (sc <= 1) b.classList.add('is-low');
            else if (sc <= 2) b.classList.add('is-mid');
            else b.classList.add('is-on');
          }
        });
      });
    })();
  </script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var form = document.querySelector('#kt_sign_up_form');
      var btn = document.querySelector('#kt_sign_up_submit');
      if (!form || !btn) return;

      function warn(msg) {
        if (window.Swal) Swal.fire({ text: msg, icon: 'warning', buttonsStyling: false, confirmButtonText: 'Tamam', customClass: { confirmButton: 'btn btn-primary' } });
        else alert(msg);
      }

      function doSignup() {
        btn.setAttribute('data-kt-indicator', 'on');
        btn.disabled = true;
        var fd = new FormData(form);
        fetch('database/post.php', { method: 'POST', body: fd, credentials: 'same-origin', headers: { 'X-Requested-With': 'XMLHttpRequest' } })
          .then(function (r) { return r.text(); })
          .then(function (text) {
            var data;
            try { data = JSON.parse(text); } catch (e) { throw new Error('invalid-json'); }
            if (!window.Swal) {
              if (data && data.sonuc === 'tamam') location.href = 'signin.php';
              return;
            }
            if (data.sonuc === 'tamam') {
              Swal.fire({ text: 'Kayıt başarılı! Giriş yapabilirsin.', icon: 'success', buttonsStyling: false, timer: 1800, showConfirmButton: false })
                .then(function () { location.href = 'signin.php'; });
            } else if (data.sonuc === 'var') {
              Swal.fire({ text: 'Bu kullanıcı adı zaten alınmış.', icon: 'warning', buttonsStyling: false, confirmButtonText: 'Tamam', customClass: { confirmButton: 'btn btn-primary' } });
            } else if (data.sonuc === 'refhata') {
              Swal.fire({ text: 'Davet kodu geçersiz.', icon: 'error', buttonsStyling: false, confirmButtonText: 'Tamam', customClass: { confirmButton: 'btn btn-primary' } });
            } else if (data.sonuc === 'bos') {
              Swal.fire({ text: 'Lütfen tüm alanları doldur.', icon: 'warning', buttonsStyling: false, confirmButtonText: 'Tamam', customClass: { confirmButton: 'btn btn-primary' } });
            } else {
              Swal.fire({ text: 'Bir aksaklık oluştu.', icon: 'error', buttonsStyling: false, confirmButtonText: 'Tamam', customClass: { confirmButton: 'btn btn-primary' } });
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
        var uid = (form.querySelector('[name=kul_id]') || {}).value.trim();
        var pw = (form.querySelector('[name=kul_sifre]') || {}).value;
        var pw2 = (form.querySelector('[name=confirm-password]') || {}).value;
        var ref = (form.querySelector('[name=ref_kod]') || {}).value.trim();
        if (!uid || !pw || !pw2 || !ref) {
          warn('Tüm alanları doldur.');
          return;
        }
        if (pw.length < 6) {
          warn('Şifre en az 6 karakter olmalı.');
          return;
        }
        if (pw !== pw2) {
          warn('Şifreler eşleşmiyor.');
          return;
        }
        if (window.FormValidation && FormValidation.formValidation) {
          var validator = FormValidation.formValidation(form, {
            fields: {
              kul_id: { validators: { notEmpty: { message: 'Kullanıcı adı boş olamaz' } } },
              kul_sifre: { validators: { notEmpty: { message: 'Şifre boş olamaz' }, stringLength: { min: 6, message: 'En az 6 karakter olmalı' } } },
              'confirm-password': { validators: {
                notEmpty: { message: 'Şifre doğrulama boş olamaz' },
                identical: { compare: function () { return form.querySelector('[name=kul_sifre]').value; }, message: 'Şifreler eşleşmiyor' }
              } },
              ref_kod: { validators: { notEmpty: { message: 'Davet kodu boş olamaz' } } }
            },
            plugins: {
              trigger: new FormValidation.plugins.Trigger(),
              bootstrap: new FormValidation.plugins.Bootstrap5({ rowSelector: '.fv-row, .pzr-auth__field', eleInvalidClass: '', eleValidClass: '' })
            }
          });
          validator.validate().then(function (status) {
            if (status === 'Valid') doSignup();
          });
        } else {
          doSignup();
        }
      });
    });
  </script>
</body>
</html>
