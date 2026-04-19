<?php
/**
 * PANZER · Cekim Talebi (v3, sifirdan, pzr-* dili)
 *
 * Backend uyumu icin DOKUNULMAYAN seyler:
 *   - modal id:    #cekimmodal
 *   - form id:     #kt_cekim_form
 *   - submit id:   #kt_cekim_submit
 *   - field name'leri: islemid, tgadresi, ekleyen, trxadresi, miktar, bakiye (hidden), cekimtalebi (hidden)
 *   - profil duzenle tetikleyicisi: #editProfil + data-bs-target="#modal-profil-edit"
 *   - sayisalinput / sadeceSayi() / oneDot() — dashboard.php global helper'lari
 */

require_once __DIR__ . '/../panzer_brand.php';
require_once __DIR__ . '/../avatar_helper.php';

$pzrEsc = static fn($v) => htmlspecialchars((string)($v ?? ''), ENT_QUOTES, 'UTF-8');

// kullanici verisi
$pzrCekUserQ = $db->prepare("SELECT * FROM kullanicilar WHERE kullaniciadi = :u LIMIT 1");
$pzrCekUserQ->execute([':u' => $kul_id]);
$pzrCekUser = $pzrCekUserQ->fetch(PDO::FETCH_ASSOC) ?: [];

$pzrBakiye   = $pzrCekUser['bakiye'] ?? '0';
$pzrTgAdresi = $pzrCekUser['tgadresi'] ?? '';
$pzrTrxKayit = $pzrCekUser['trxadresi'] ?? '';
$pzrUserId   = (int)($pzrCekUser['id'] ?? 0);

// son 5 cekim talebi (varsa)
$pzrSonCekim = [];
try {
    $pzrCekListQ = $db->prepare("SELECT miktar, durum, tarih, saat FROM cekimtalepleri WHERE ekleyen = :u ORDER BY id DESC LIMIT 5");
    $pzrCekListQ->execute([':u' => $kul_id]);
    $pzrSonCekim = $pzrCekListQ->fetchAll(PDO::FETCH_ASSOC);
} catch (\Throwable $e) { /* tablo yoksa sessiz */ }
?>

<div class="modal fade pzr-modal" id="cekimmodal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- ============== HEADER ============== -->
      <header class="pzr-header">
        <div class="pzr-brand">
          <div class="pzr-brand__dragon">
            <img src="<?php echo $pzrEsc(panzer_brand_dragon_url()); ?>" alt="PANZER">
          </div>
          <div class="pzr-brand__text">
            <div class="pzr-brand__title">
              <span class="pzr-brand__panzer">PANZER</span>
              <span class="pzr-brand__sep">·</span>
              <span class="pzr-brand__sub">Cekim Talebi</span>
            </div>
            <div class="pzr-brand__signature">the <em>designedbybossxxlife</em></div>
          </div>
        </div>
        <button type="button" class="pzr-close-btn" data-bs-dismiss="modal" aria-label="Kapat">
          <i class="fa fa-times fs-4"></i>
        </button>
      </header>

      <!-- ============== BODY ============== -->
      <div class="pzr-body">

        <div class="pzr-pane__head">
          <h3 class="pzr-pane__title"><span class="pzr-bar"></span>Cekim Talebi Ver</h3>
          <div class="pzr-pane__sub">TRX adresinizi son kez kontrol edin — yanlis adrese yapilan transferler geri alinamaz.</div>
        </div>

        <!-- bakiye karti -->
        <div class="pzr-bakiye-card">
          <div style="position: relative; z-index: 1;">
            <div class="pzr-bakiye-card__label">Mevcut bakiyeniz</div>
            <div class="pzr-bakiye-card__value">&#8378;<?php echo $pzrEsc($pzrBakiye); ?></div>
          </div>
          <div class="pzr-bakiye-card__icon"><i class="fa fa-wallet"></i></div>
        </div>

        <!-- guvenlik uyarisi -->
        <div class="pzr-alert">
          <span class="pzr-alert__icon"><i class="fa fa-shield"></i></span>
          <div>
            <div class="pzr-alert__title">Dikkat</div>
            <div class="pzr-alert__body">
              Lutfen cekim talebi vermeden once TRX adresinizi son kez kontrol ediniz.
              Yanlis adrese gonderilen odemelerde <strong>PANZER</strong> ekibi sorumlu degildir.
            </div>
          </div>
        </div>

        <!-- form -->
        <form id="kt_cekim_form" autocomplete="off">
          <input type="hidden" name="islemid" id="islemid" value="">
          <input type="hidden" name="tgadresi" value="<?php echo $pzrEsc($pzrTgAdresi); ?>">
          <input type="hidden" name="ekleyen" value="<?php echo $pzrEsc($pzrCekUser['kullaniciadi'] ?? ''); ?>">
          <input type="hidden" name="bakiye" id="gizliInput2" value="<?php echo $pzrEsc($pzrBakiye); ?>">

          <div class="row g-3">
            <div class="col-lg-7">
              <div class="pzr-field fv-row">
                <label class="pzr-field__label">TRX Adresi</label>
                <div class="pzr-input-wrap">
                  <input id="hedefInput" class="form-control" type="text" name="trxadresi" autocomplete="off" placeholder="TXXxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" style="padding-right:160px; font-family: ui-monospace, monospace; font-size: 0.85rem;">
                  <?php if ($pzrTrxKayit !== ''): ?>
                    <input type="hidden" id="gizliInput" value="<?php echo $pzrEsc($pzrTrxKayit); ?>">
                    <a href="javascript:void(0)" class="pzr-input-chip" onclick="yapistir()" title="Profil TRX'inizi yapistir">
                      <i class="fa fa-paste"></i><span>Kayitli TRX</span>
                    </a>
                  <?php else: ?>
                    <a href="javascript:void(0)" id="editProfil" data-id="<?php echo $pzrUserId; ?>" data-bs-toggle="modal" data-bs-target="#modal-profil-edit" class="pzr-input-chip pzr-input-chip--red" title="Profilden TRX tanimla">
                      <i class="fa fa-plus"></i><span>TRX Tanimla</span>
                    </a>
                  <?php endif; ?>
                </div>
                <div class="pzr-field__hint">TRC20 (Tron) USDT/TRX adresi.</div>
              </div>
            </div>

            <div class="col-lg-5">
              <div class="pzr-field fv-row">
                <label class="pzr-field__label">Cekim Miktari</label>
                <div class="pzr-input-wrap">
                  <input id="hedefInput2" class="form-control sayisalinput" onkeypress="sadeceSayi(event)" type="text" name="miktar" autocomplete="off" placeholder="500" style="padding-right:130px; font-weight: 700;">
                  <a href="javascript:void(0)" class="pzr-input-chip" onclick="yapistir2()" title="Tum bakiyeyi cek">
                    <i class="fa fa-arrow-down"></i><span>Tum Bakiye</span>
                  </a>
                </div>
                <div class="pzr-field__hint">Minimum 500 &#8378;</div>
              </div>
            </div>
          </div>

          <input type="hidden" name="cekimtalebi" value="cekimtalebi">
        </form>

        <?php if (!empty($pzrSonCekim)): ?>
          <div class="pzr-card" style="margin-top: 0.5rem;">
            <div class="pzr-card__head">
              <div>
                <div class="pzr-card__title"><span class="pzr-dot"></span>Son cekim talepleri</div>
                <div class="pzr-card__sub">en fazla 5 kayit goruluyor</div>
              </div>
            </div>
            <div style="display: flex; flex-direction: column; gap: 0.4rem;">
              <?php
              $pzrCekStyle = static function (string $d): string {
                  if ($d === 'Reddedildi') {
                      return 'background: rgba(196,30,58,0.18); color: #ff4d6d; border: 1px solid rgba(196,30,58,0.35);';
                  }
                  if ($d === 'Beklemede') {
                      return 'background: rgba(255,184,0,0.18); color: #ffb020; border: 1px solid rgba(255,184,0,0.35);';
                  }
                  return 'background: rgba(24,191,122,0.16); color: #18bf7a; border: 1px solid rgba(24,191,122,0.35);';
              };
              foreach ($pzrSonCekim as $cek):
                  $durum = (string)($cek['durum'] ?? '');
                  $rowStyle = 'padding: 0.2rem 0.6rem; font-size: 0.66rem; border-radius: 999px; font-weight: 800; letter-spacing: 0.08em; text-transform: uppercase; ' . $pzrCekStyle($durum);
              ?>
                <div style="display:flex; align-items:center; justify-content:space-between; padding: 0.5rem 0.85rem; border:1px solid var(--pzr-line); border-radius: 10px; background: rgba(0,0,0,0.2);">
                  <div>
                    <span style="font-weight:700; color:#fff;">&#8378;<?php echo $pzrEsc($cek['miktar']); ?></span>
                    <span style="color: var(--pzr-mute); font-size: 0.78rem; margin-left: 0.6rem;">
                      <?php echo $pzrEsc($cek['tarih']); ?> · <?php echo $pzrEsc($cek['saat']); ?>
                    </span>
                  </div>
                  <span style="<?php echo $pzrEsc($rowStyle); ?>"><?php echo $pzrEsc($durum); ?></span>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endif; ?>
      </div>

      <!-- ============== FOOTER ============== -->
      <footer class="pzr-footer">
        <div class="pzr-footer__hint">
          <i class="fa fa-shield"></i>
          <span>PANZER · the designedbybossxxlife</span>
        </div>
        <button type="submit" form="kt_cekim_form" id="kt_cekim_submit" class="pzr-cta pzr-cta--success">
          <span class="indicator-label"><i class="fa fa-paper-plane"></i><span style="margin-left:0.5rem;">Cekim Talebi Ver</span></span>
          <span class="indicator-progress">Gonderiliyor… <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
        </button>
      </footer>

    </div>
  </div>
</div>

<script>
/* islem ID otomatik uretici */
(function () {
  function genCode(len) {
    var c = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var s = '';
    for (var i = 0; i < len; i++) s += c.charAt(Math.floor(Math.random() * c.length));
    return s;
  }
  document.addEventListener('DOMContentLoaded', function () {
    var i = document.getElementById('islemid');
    if (i) i.value = genCode(8);
  });
})();

/* yapistir helper'lari */
function yapistir() {
  var src = document.getElementById('gizliInput');
  var dst = document.getElementById('hedefInput');
  if (src && dst) dst.value = src.value;
}
function yapistir2() {
  var src = document.getElementById('gizliInput2');
  var dst = document.getElementById('hedefInput2');
  if (src && dst) dst.value = src.value;
}
</script>

<script>
/* form validation + submit */
document.addEventListener('DOMContentLoaded', function () {
  if (!window.FormValidation) return;
  var formEl = document.querySelector('#kt_cekim_form');
  var submitBtn = document.querySelector('#kt_cekim_submit');
  if (!formEl || !submitBtn) return;

  var validator = FormValidation.formValidation(formEl, {
    fields: {
      "trxadresi": { validators: { notEmpty: { message: "TRX adresi bos olamaz" }, stringLength: { min: 10, message: "Gecerli bir TRX adresi girin" } } },
      "miktar":    { validators: { notEmpty: { message: "Miktar bos olamaz" } } }
    },
    plugins: {
      trigger: new FormValidation.plugins.Trigger(),
      bootstrap: new FormValidation.plugins.Bootstrap5({ rowSelector: ".pzr-field, .fv-row", eleInvalidClass: "", eleValidClass: "" })
    }
  });

  submitBtn.addEventListener('click', function (e) {
    e.preventDefault();
    validator.validate().then(function (status) {
      if (status !== 'Valid') return;
      submitBtn.setAttribute('data-kt-indicator', 'on');
      submitBtn.disabled = true;
      var fd = new FormData(formEl);
      fetch('database/post.php', { method: 'POST', body: fd })
        .then(function (r) { return r.json(); })
        .then(function (data) {
          if (!window.Swal) { if (data && data.sonuc === 'tamam') location.href = 'dashboard'; return; }
          if (data.sonuc === 'tamam') {
            Swal.fire({ text: "Cekim talebi olusturuldu.", icon: "success", buttonsStyling: false, timer: 1700, showConfirmButton: false })
              .then(function () { location.href = 'dashboard'; });
          } else if (data.sonuc === 'bakiye_yetersiz') {
            Swal.fire({ text: "Bakiyeniz yeterli degil.", icon: "warning", buttonsStyling: false, confirmButtonText: "Tamam", customClass: { confirmButton: "btn btn-primary" } });
          } else if (data.sonuc === 'miktar_dusuk') {
            Swal.fire({ text: "En az 500 \u20BA cekebilirsiniz.", icon: "warning", buttonsStyling: false, confirmButtonText: "Tamam", customClass: { confirmButton: "btn btn-primary" } });
          } else if (data.sonuc === 'bos') {
            Swal.fire({ text: "Lutfen tum alanlari doldurun.", icon: "warning", buttonsStyling: false, confirmButtonText: "Tamam", customClass: { confirmButton: "btn btn-primary" } });
          } else {
            Swal.fire({ text: "Bir yerde bir aksaklik var.", icon: "error", buttonsStyling: false, confirmButtonText: "Anladim", customClass: { confirmButton: "btn btn-primary" } });
          }
        })
        .catch(function () {
          if (window.Swal) Swal.fire({ text: "Sunucuya ulasilamadi.", icon: "error", buttonsStyling: false, confirmButtonText: "Tamam", customClass: { confirmButton: "btn btn-primary" } });
        })
        .finally(function () {
          submitBtn.removeAttribute('data-kt-indicator');
          submitBtn.disabled = false;
        });
    });
  });
});
</script>
