<?php
require '../../database/connect.php';
require '../../database/fonk.php';
require_once __DIR__ . '/../admin_helper.php';

if (session_status() === PHP_SESSION_NONE) { session_start(); }
if (!isset($_SESSION['kul_id'])) { http_response_code(403); echo 'Yetki yok'; exit; }

$id = (int)($_POST['id'] ?? 0);
if ($id <= 0) { echo 'Gecersiz ID'; exit; }

$q = $db->prepare('SELECT * FROM bella_pttkargo WHERE id = :id LIMIT 1');
$q->execute([':id' => $id]);
$r = $q->fetch(PDO::FETCH_ASSOC);

if (!$r) { echo 'Kayit bulunamadi'; exit; }
if (!bellla_can_touch_record($db, $_SESSION['kul_id'] ?? null, $r['ekleyen'] ?? null)) {
    http_response_code(403);
    echo 'Yetki yok';
    exit;
}

$id_sfrli = sifreleWadanz((string)$id);

$bellla_durum_options = [
    1 => 'Kargo kabul edildi',
    2 => 'Cikis transfer merkezinde',
    3 => 'Yolda',
    4 => 'Dagitim subesinde',
    5 => 'Teslim edildi',
];
$h = static fn($v) => htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8');
?>

<div class="modal-header pb-0 border-0 justify-content-end">
  <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
  </div>
</div>
<div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
  <div class="mb-10 text-center">
    <span class="d-inline-block position-relative ms-2">
      <span class="d-inline-block mb-2 fs-2tx fw-bold">Kargo Duzenle</span>
      <span class="d-inline-block position-absolute h-3px bottom-0 end-0 start-0 bg-warning translate rounded"></span>
    </span>
  </div>

  <form id="kt_pttkargo_edit_form_<?php echo $id; ?>" autocomplete="off">
    <div class="row">
      <div class="col-lg-4">
        <div class="d-flex flex-column mb-6 fv-row">
          <label class="d-flex align-items-center fs-6 fw-semibold mb-2"><span class="required">Takip No</span></label>
          <input class="form-control form-control-solid" type="text" name="takipno" maxlength="32" value="<?php echo $h($r['takipno']); ?>">
        </div>
      </div>
      <div class="col-lg-4">
        <div class="d-flex flex-column mb-6 fv-row">
          <label class="d-flex align-items-center fs-6 fw-semibold mb-2"><span class="required">Gonderen</span></label>
          <input class="form-control form-control-solid" type="text" name="gonderen" maxlength="120" value="<?php echo $h($r['gonderen']); ?>">
        </div>
      </div>
      <div class="col-lg-4">
        <div class="d-flex flex-column mb-6 fv-row">
          <label class="d-flex align-items-center fs-6 fw-semibold mb-2"><span class="required">Teslim Alan</span></label>
          <input class="form-control form-control-solid" type="text" name="teslimalan" maxlength="120" value="<?php echo $h($r['teslimalan']); ?>">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4">
        <div class="d-flex flex-column mb-6 fv-row">
          <label class="fs-6 fw-semibold mb-2">Cikis Tarihi</label>
          <input class="form-control form-control-solid" type="text" name="cikistarih" value="<?php echo $h($r['cikistarih']); ?>">
        </div>
      </div>
      <div class="col-lg-4">
        <div class="d-flex flex-column mb-6 fv-row">
          <label class="fs-6 fw-semibold mb-2">Teslim Tarihi</label>
          <input class="form-control form-control-solid" type="text" name="teslimtarih" value="<?php echo $h($r['teslimtarih']); ?>">
        </div>
      </div>
      <div class="col-lg-4">
        <div class="d-flex flex-column mb-6 fv-row">
          <label class="fs-6 fw-semibold mb-2">Telefon</label>
          <input class="form-control form-control-solid" type="text" name="telefonno" maxlength="40" value="<?php echo $h($r['telefonno']); ?>">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="d-flex flex-column mb-6 fv-row">
          <label class="fs-6 fw-semibold mb-2">Cikis Il / Ilce</label>
          <input class="form-control form-control-solid" type="text" name="gonderil" maxlength="80" value="<?php echo $h($r['gonderil']); ?>">
        </div>
      </div>
      <div class="col-lg-6">
        <div class="d-flex flex-column mb-6 fv-row">
          <label class="fs-6 fw-semibold mb-2">Varis Il / Ilce</label>
          <input class="form-control form-control-solid" type="text" name="alanil" maxlength="80" value="<?php echo $h($r['alanil']); ?>">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="d-flex flex-column mb-6 fv-row">
          <label class="fs-6 fw-semibold mb-2">Cikis Adresi</label>
          <textarea class="form-control form-control-solid" name="cikisadres" rows="2"><?php echo $h($r['cikisadres']); ?></textarea>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="d-flex flex-column mb-6 fv-row">
          <label class="fs-6 fw-semibold mb-2">Teslim Adresi</label>
          <textarea class="form-control form-control-solid" name="teslimadres" rows="2"><?php echo $h($r['teslimadres']); ?></textarea>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-7">
        <div class="d-flex flex-column mb-6 fv-row">
          <label class="d-flex align-items-center fs-6 fw-semibold mb-2"><span class="required">Sonuc Metni</span></label>
          <input class="form-control form-control-solid" type="text" name="sonuc" maxlength="120" value="<?php echo $h($r['sonuc']); ?>">
        </div>
      </div>
      <div class="col-lg-5">
        <div class="d-flex flex-column mb-6 fv-row">
          <label class="fs-6 fw-semibold mb-2">Durum (gorsel 1-5)</label>
          <select class="form-select form-select-solid" name="durumu">
            <?php foreach ($bellla_durum_options as $k => $v): ?>
              <option value="<?php echo $k; ?>" <?php echo ((int)$r['durumu'] === $k ? 'selected' : ''); ?>><?php echo $k . ' — ' . $h($v); ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
    </div>
    <div class="text-center">
      <input type="hidden" name="pttkargoduzenle" value="<?php echo $h($id_sfrli); ?>">
      <button type="submit" class="btn btn-primary kt_pttkargo_edit_submit" data-form="kt_pttkargo_edit_form_<?php echo $id; ?>">
        <span class="indicator-label">Guncelle</span>
        <span class="indicator-progress">Kaydediliyor… <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
      </button>
    </div>
  </form>
</div>

<script>
(function(){
  var btn = document.querySelector('.kt_pttkargo_edit_submit[data-form="kt_pttkargo_edit_form_<?php echo $id; ?>"]');
  var form = document.getElementById('kt_pttkargo_edit_form_<?php echo $id; ?>');
  if (!btn || !form) return;
  btn.addEventListener('click', function(e){
    e.preventDefault();
    btn.setAttribute('data-kt-indicator', 'on');
    btn.disabled = true;
    var fd = new FormData(form);
    fetch('database/post.php', { method: 'POST', body: fd })
      .then(function(r){ return r.json(); })
      .then(function(data){
        if (!window.Swal) { if (data && data.sonuc === 'tamam') location.href='dashboard'; return; }
        if (data.sonuc === 'tamam') {
          Swal.fire({ text:'Guncellendi.', icon:'success', buttonsStyling:false, timer:1300, showConfirmButton:false }).then(function(){ location.href='dashboard'; });
        } else if (data.sonuc === 'zatenVar') {
          Swal.fire({ text:'Bu takip no baska kayitta var.', icon:'warning', buttonsStyling:false, confirmButtonText:'Tamam', customClass:{confirmButton:'btn btn-primary'} });
        } else if (data.sonuc === 'yetkisiz') {
          Swal.fire({ text:'Bu kayda yetkin yok.', icon:'error', buttonsStyling:false, confirmButtonText:'Tamam', customClass:{confirmButton:'btn btn-primary'} });
        } else if (data.sonuc === 'bos' || data.sonuc === 'gecersiz_takipno') {
          Swal.fire({ text:'Alanlari kontrol et.', icon:'warning', buttonsStyling:false, confirmButtonText:'Tamam', customClass:{confirmButton:'btn btn-primary'} });
        } else {
          Swal.fire({ text:'Bir yerde bir aksaklik var.', icon:'error', buttonsStyling:false, confirmButtonText:'Anladim', customClass:{confirmButton:'btn btn-primary'} });
        }
      })
      .catch(function(){
        if (window.Swal) Swal.fire({ text:'Sunucuya ulasilamadi.', icon:'error', buttonsStyling:false, confirmButtonText:'Tamam', customClass:{confirmButton:'btn btn-primary'} });
      })
      .finally(function(){
        btn.removeAttribute('data-kt-indicator');
        btn.disabled = false;
      });
  });
})();
</script>
