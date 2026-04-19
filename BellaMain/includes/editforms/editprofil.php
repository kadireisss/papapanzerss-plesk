<?php
/**
 * PANZER · Profil Duzenle (v3, sifirdan, pzr-* dili)
 * Bu dosya AJAX ile #dashprofil icine basilir (profil.php tanimlar).
 * Modal'in dis kabugu profil.php'de #modal-profil-edit + .pzr-modal class'i ile.
 *
 * Backend uyumu icin DOKUNULMAYAN seyler:
 *   - form id: #myFormProfil
 *   - field name'leri: kullaniciadi, trxadresi, tgadresi, userimage (file), avatar_remove (hidden)
 *   - hidden: profilduzenle (id_sfrli)
 *   - POST: database/post.php · cevap kodlari: tamam, yanlis, gecersiz_uzanti, bos
 */

require_once __DIR__ . '/../../database/connect.php';
require_once __DIR__ . '/../../database/fonk.php';
require_once __DIR__ . '/../panzer_brand.php';
require_once __DIR__ . '/../avatar_helper.php';

if (session_status() === PHP_SESSION_NONE) { session_start(); }

if (!isset($_REQUEST['id']) || !isset($_SESSION['kul_id'])) {
    http_response_code(403);
    echo '<div class="p-5 text-danger">Yetki yok.</div>';
    exit;
}

$pzrId       = (int)$_REQUEST['id'];
$pzrIdSfrli  = sifreleWadanz($pzrId);
$pzrSessName = (string)$_SESSION['kul_id'];

$pzrUserQ = $db->prepare("SELECT * FROM kullanicilar WHERE kullaniciadi = :u LIMIT 1");
$pzrUserQ->execute([':u' => $pzrSessName]);
$pzrUser = $pzrUserQ->fetch(PDO::FETCH_ASSOC);

if (!$pzrUser) {
    http_response_code(404);
    echo '<div class="p-5 text-danger">Kullanici bulunamadi.</div>';
    exit;
}

$pzrEsc = static fn($v) => htmlspecialchars((string)($v ?? ''), ENT_QUOTES, 'UTF-8');

$pzrUserName  = $pzrEsc($pzrUser['kullaniciadi']);
$pzrTrxAdresi = $pzrEsc($pzrUser['trxadresi'] ?? '');
$pzrTgAdresi  = $pzrEsc($pzrUser['tgadresi'] ?? '');
$pzrUserImage = $pzrUser['userimage'] ?? '';
$pzrAvatarSrc = bellla_avatar_url($pzrUserImage);
?>

<header class="pzr-header">
  <div class="pzr-brand">
    <div class="pzr-brand__dragon">
      <img src="<?php echo $pzrEsc(panzer_brand_dragon_url()); ?>" alt="PANZER">
    </div>
    <div class="pzr-brand__text">
      <div class="pzr-brand__title">
        <span class="pzr-brand__panzer">PANZER</span>
        <span class="pzr-brand__sep">·</span>
        <span class="pzr-brand__sub">Profil Ayarlari</span>
      </div>
      <div class="pzr-brand__signature">the <em>designedbybossxxlife</em></div>
    </div>
  </div>
  <button type="button" class="pzr-close-btn" data-bs-dismiss="modal" aria-label="Kapat">
    <i class="fa fa-times fs-4"></i>
  </button>
</header>

<div class="pzr-body">

  <div class="pzr-pane__head">
    <h3 class="pzr-pane__title"><span class="pzr-bar"></span>Profili Duzenle</h3>
    <div class="pzr-pane__sub">TRX adresi cekim akiseni saglar; profil fotosu rank listesinde gorunur.</div>
  </div>

  <form id="myFormProfil" autocomplete="off" enctype="multipart/form-data">
    <input type="hidden" name="kullaniciadi" id="kullaniciadi" value="<?php echo $pzrUserName; ?>">

    <!-- AVATAR -->
    <div class="pzr-card">
      <div class="pzr-card__head">
        <div>
          <div class="pzr-card__title"><span class="pzr-dot"></span>Profil fotografi</div>
          <div class="pzr-card__sub">jpg, jpeg veya png · onerilen: kare, en az 200x200</div>
        </div>
      </div>
      <div class="pzr-avatar-edit">
        <div class="pzr-avatar-edit__preview">
          <div class="pzr-avatar-canvas" id="pzrAvatarCanvas" style="background-image: url('<?php echo $pzrEsc($pzrAvatarSrc); ?>');"></div>
        </div>
        <div class="pzr-avatar-edit__actions">
          <label class="pzr-btn">
            <i class="fa fa-camera"></i><span>Foto sec / degistir</span>
            <input type="file" name="userimage" id="pzrAvatarFile" accept=".png,.jpg,.jpeg" onchange="pzrAvatarPreview(this)" style="display:none;">
          </label>
          <button type="button" class="pzr-btn pzr-btn--danger" id="pzrAvatarRemove" onclick="pzrAvatarReset()" style="display:none;">
            <i class="fa fa-undo"></i><span>Geri al</span>
          </button>
          <input type="hidden" name="avatar_remove" id="pzrAvatarRemoveFlag">
          <div class="pzr-avatar-edit__hint">Foto secince burada anlik onizleme gorursun. "Profili Kaydet" ile gercekleseir.</div>
        </div>
      </div>
    </div>

    <!-- TRX + TG -->
    <div class="pzr-card">
      <div class="pzr-card__head">
        <div>
          <div class="pzr-card__title"><span class="pzr-dot"></span>Cekim &amp; Iletisim</div>
          <div class="pzr-card__sub">TRX adresi (TRC20) ve telegram bilgilerin</div>
        </div>
      </div>

      <div class="row g-3">
        <div class="col-lg-12">
          <div class="pzr-field" style="margin-bottom: 0.5rem;">
            <label class="pzr-field__label">TRX Adresi</label>
            <div class="pzr-input-wrap">
              <input id="hedefInput" class="form-control" type="text" name="trxadresi" value="<?php echo $pzrTrxAdresi; ?>" placeholder="TXXxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" autocomplete="off" style="padding-right:130px; font-family: ui-monospace, monospace; font-size: 0.85rem;">
              <a href="javascript:void(0)" class="pzr-input-chip" onclick="pzrYapistir()" title="Panodan yapistir">
                <i class="fa fa-paste"></i><span>Yapistir</span>
              </a>
            </div>
            <div class="pzr-field__hint">TRC20 USDT/TRX gecerlidir. ERC20 ile karistirma.</div>
          </div>
        </div>

        <div class="col-lg-12">
          <div class="pzr-field" style="margin-bottom: 0;">
            <label class="pzr-field__label">Telegram Adresi</label>
            <div class="pzr-input-wrap">
              <input class="form-control" type="text" name="tgadresi" value="<?php echo $pzrTgAdresi; ?>" autocomplete="off" placeholder="@kullanici_adi" readonly>
            </div>
            <div class="pzr-field__hint">Salt-okunur — onayli telegram hesabin.</div>
          </div>
        </div>
      </div>
    </div>

    <input type="hidden" name="profilduzenle" value="<?php echo $pzrEsc($pzrIdSfrli); ?>">

    <div style="display:flex; align-items:center; justify-content:space-between; gap: 0.85rem; margin-top: 0.5rem;">
      <div style="font-size: 0.78rem; color: var(--pzr-text-2); display:flex; align-items:center; gap:0.4rem;">
        <i class="fa fa-shield" style="color: var(--pzr-red-hot);"></i>
        <span>Tum degisiklikler sifrelenmis kanal uzerinden</span>
      </div>
      <button type="submit" class="pzr-cta" id="pzrProfilSubmit">
        <span class="indicator-label"><i class="fa fa-save"></i><span style="margin-left:0.5rem;">Profili Kaydet</span></span>
        <span class="indicator-progress">Kaydediliyor… <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
      </button>
    </div>
  </form>
</div>

<script>
/* PANZER · profil-edit JS (scoped) */
(function () {
  var canvas = document.getElementById('pzrAvatarCanvas');
  var fileIn = document.getElementById('pzrAvatarFile');
  var rmBtn  = document.getElementById('pzrAvatarRemove');
  var origBg = canvas ? canvas.style.backgroundImage : '';

  window.pzrAvatarPreview = function (input) {
    if (!input.files || !input.files[0] || !canvas) return;
    var url = URL.createObjectURL(input.files[0]);
    canvas.style.backgroundImage = "url('" + url + "')";
    if (rmBtn) rmBtn.style.display = 'inline-flex';
  };

  window.pzrAvatarReset = function () {
    if (canvas) canvas.style.backgroundImage = origBg;
    if (fileIn) {
      var clone = fileIn.cloneNode(true);
      fileIn.parentNode.replaceChild(clone, fileIn);
      fileIn.value = '';
    }
    if (rmBtn) rmBtn.style.display = 'none';
  };

  window.pzrYapistir = function () {
    if (!navigator.clipboard || !navigator.clipboard.readText) return;
    navigator.clipboard.readText().then(function (txt) {
      var inp = document.getElementById('hedefInput');
      if (inp) inp.value = (txt || '').trim();
    }).catch(function () {});
  };
})();

/* form submit */
document.addEventListener('DOMContentLoaded', function () {
  var form = document.getElementById('myFormProfil');
  var btn  = document.getElementById('pzrProfilSubmit');
  if (!form || !btn) return;

  form.addEventListener('submit', function (e) {
    e.preventDefault();
    btn.setAttribute('data-kt-indicator', 'on');
    btn.disabled = true;
    var fd = new FormData(form);
    fetch('database/post.php', { method: 'POST', body: fd })
      .then(function (r) { return r.json(); })
      .then(function (data) {
        if (!window.Swal) { if (data && data.sonuc === 'tamam') location.href = 'dashboard'; return; }
        if (data.sonuc === 'tamam') {
          Swal.fire({ text: "Profil guncellendi.", icon: "success", buttonsStyling: false, timer: 1500, showConfirmButton: false })
            .then(function () { location.href = 'dashboard'; });
        } else if (data.sonuc === 'gecersiz_uzanti' || data.sonuc === 'yanlis_uzanti') {
          Swal.fire({ text: "Gecersiz fotograf uzantisi (jpg/jpeg/png).", icon: "error", buttonsStyling: false, confirmButtonText: "Anladim", customClass: { confirmButton: "btn btn-primary" } });
        } else if (data.sonuc === 'bos') {
          Swal.fire({ text: "Lutfen alanlari doldur.", icon: "warning", buttonsStyling: false, confirmButtonText: "Tamam", customClass: { confirmButton: "btn btn-primary" } });
        } else if (data.sonuc === 'yanlis_kullaniciadi' || data.sonuc === 'kullanici_bulunamadi') {
          Swal.fire({ text: "Oturum bilgisi gecersiz.", icon: "error", buttonsStyling: false, confirmButtonText: "Tamam", customClass: { confirmButton: "btn btn-primary" } });
        } else {
          Swal.fire({ text: "Bir yerde bir aksaklik var.", icon: "error", buttonsStyling: false, confirmButtonText: "Anladim", customClass: { confirmButton: "btn btn-primary" } });
        }
      })
      .catch(function () {
        if (window.Swal) Swal.fire({ text: "Sunucuya ulasilamadi.", icon: "error", buttonsStyling: false, confirmButtonText: "Tamam", customClass: { confirmButton: "btn btn-primary" } });
      })
      .finally(function () {
        btn.removeAttribute('data-kt-indicator');
        btn.disabled = false;
      });
  });
});
</script>
