<?php
/**
 * PANZER · PTT Kargo (bella_pttkargo)
 *
 * KORUNAN seyler (DOKUNMA):
 *   - modal id: #pttkargomodal
 *   - form id: #kt_pttkargo_form  (ekleme)
 *   - submit id: #kt_pttkargo_submit
 *   - field name'leri: takipno, gonderen, teslimalan, cikistarih, teslimtarih,
 *     cikisadres, teslimadres, telefonno, gonderil, alanil, sonuc, durumu
 *   - hidden: pttkargoekle (ekleme), pttkargoduzenle (duzenleme — id_sfrli ile)
 *   - delete: data-action="delpttkargo" + .delete-button (dashboard.php global handler)
 */

require_once __DIR__ . '/../ilan_public_url.php';
require_once __DIR__ . '/../admin_helper.php';

$bellla_pttkargo_admin = bellla_is_admin($db, $kul_id);

if ($bellla_pttkargo_admin) {
    $bellla_pttkargo_q = $db->prepare('SELECT * FROM bella_pttkargo ORDER BY id DESC LIMIT ' . bellla_dashboard_list_limit());
    $bellla_pttkargo_q->execute();
} else {
    $bellla_pttkargo_q = $db->prepare('SELECT * FROM bella_pttkargo WHERE ekleyen = :u ORDER BY id DESC LIMIT ' . bellla_dashboard_list_limit());
    $bellla_pttkargo_q->execute([':u' => $kul_id]);
}
$bellla_pttkargo_list = $bellla_pttkargo_q->fetchAll(PDO::FETCH_ASSOC);

$bellla_durum_options = [
    1 => 'Kargo kabul edildi',
    2 => 'Cikis transfer merkezinde',
    3 => 'Yolda',
    4 => 'Dagitim subesinde',
    5 => 'Teslim edildi',
];
?>

<div class="modal fade" id="pttkargomodal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered mw-900px">
    <div class="modal-content rounded">
      <div class="modal-header pb-0 border-0 justify-content-end">
        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
          <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
        </div>
      </div>
      <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
        <div class="mb-10 text-center">
          <span class="d-inline-block position-relative ms-2">
            <span class="d-inline-block mb-2 fs-2tx fw-bold">PTT Kargo</span>
            <span class="d-inline-block position-absolute h-3px bottom-0 end-0 start-0 bg-warning translate rounded"></span>
          </span>
          <div class="text-muted fs-7 mt-2">Kargo takip sayfasina (pttkargo/) yansir</div>
        </div>

        <div class="d-flex align-items-center pb-6">
          <ul class="nav nav-pills nav-line-pills border rounded p-1" style="margin:auto;margin-top:-30px;padding-left:50px" role="tablist">
            <li class="nav-item me-2" role="presentation">
              <a class="nav-link btn btn-active-light btn-active-color-gray-700 btn-color-gray-500 py-2 px-5 fs-6 fw-semibold active" data-bs-toggle="tab" id="kt_pttkargo_create" href="#kt_tab_pttkargo_create" role="tab">Kargo Ekle</a>
            </li>
            <li class="nav-item" role="presentation" style="margin-left:-5px">
              <a class="nav-link btn btn-active-light btn-active-color-gray-700 btn-color-gray-500 py-2 px-5 fs-6 fw-semibold" data-bs-toggle="tab" id="kt_pttkargo_list" href="#kt_tab_pttkargo_list" role="tab">Kargolar <?php if ($bellla_pttkargo_admin): ?><span class="badge badge-light-danger ms-1">ADMIN</span><?php endif; ?></a>
            </li>
          </ul>
        </div>

        <div class="tab-content px-3">
          <!-- ============ EKLE ============ -->
          <div class="tab-pane fade active show" id="kt_tab_pttkargo_create" role="tabpanel">
            <form id="kt_pttkargo_form" autocomplete="off">
              <div class="row">
                <div class="col-lg-4">
                  <div class="d-flex flex-column mb-6 fv-row">
                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2"><span class="required">Takip No</span></label>
                    <div class="input-group">
                      <input class="form-control form-control-solid" type="text" name="takipno" id="ptt_takipno" maxlength="32" placeholder="Orn: KP04752154295">
                      <button type="button" class="btn btn-light-primary" id="ptt_takipno_uret">Uret</button>
                    </div>
                    <div class="form-text">Yalnizca harf/rakam/tire (4-32).</div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="d-flex flex-column mb-6 fv-row">
                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2"><span class="required">Gonderen</span></label>
                    <input class="form-control form-control-solid" type="text" name="gonderen" maxlength="120" placeholder="Ad Soyad / Sirket">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="d-flex flex-column mb-6 fv-row">
                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2"><span class="required">Teslim Alan</span></label>
                    <input class="form-control form-control-solid" type="text" name="teslimalan" maxlength="120" placeholder="Ad Soyad">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-4">
                  <div class="d-flex flex-column mb-6 fv-row">
                    <label class="fs-6 fw-semibold mb-2">Cikis Tarihi</label>
                    <input class="form-control form-control-solid" type="text" name="cikistarih" placeholder="GG/AA/YYYY">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="d-flex flex-column mb-6 fv-row">
                    <label class="fs-6 fw-semibold mb-2">Teslim Tarihi</label>
                    <input class="form-control form-control-solid" type="text" name="teslimtarih" placeholder="GG/AA/YYYY">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="d-flex flex-column mb-6 fv-row">
                    <label class="fs-6 fw-semibold mb-2">Telefon</label>
                    <input class="form-control form-control-solid" type="text" name="telefonno" maxlength="40" placeholder="0555...">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-6">
                  <div class="d-flex flex-column mb-6 fv-row">
                    <label class="fs-6 fw-semibold mb-2">Cikis Il / Ilce</label>
                    <input class="form-control form-control-solid" type="text" name="gonderil" maxlength="80" placeholder="Orn: Istanbul / Kadikoy">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="d-flex flex-column mb-6 fv-row">
                    <label class="fs-6 fw-semibold mb-2">Varis Il / Ilce</label>
                    <input class="form-control form-control-solid" type="text" name="alanil" maxlength="80" placeholder="Orn: Ankara / Cankaya">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-6">
                  <div class="d-flex flex-column mb-6 fv-row">
                    <label class="fs-6 fw-semibold mb-2">Cikis Adresi</label>
                    <textarea class="form-control form-control-solid" name="cikisadres" rows="2"></textarea>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="d-flex flex-column mb-6 fv-row">
                    <label class="fs-6 fw-semibold mb-2">Teslim Adresi</label>
                    <textarea class="form-control form-control-solid" name="teslimadres" rows="2"></textarea>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-7">
                  <div class="d-flex flex-column mb-6 fv-row">
                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2"><span class="required">Sonuc Metni</span></label>
                    <input class="form-control form-control-solid" type="text" name="sonuc" maxlength="120" value="Kargonuz dagitima cikti." placeholder="Ana baslik">
                  </div>
                </div>
                <div class="col-lg-5">
                  <div class="d-flex flex-column mb-6 fv-row">
                    <label class="fs-6 fw-semibold mb-2">Durum (gorsel 1-5)</label>
                    <select class="form-select form-select-solid" name="durumu" data-control="select2" data-hide-search="true" data-dropdown-parent="#pttkargomodal">
                      <?php foreach ($bellla_durum_options as $k => $v): ?>
                        <option value="<?php echo $k; ?>"><?php echo $k . ' — ' . htmlspecialchars($v, ENT_QUOTES, 'UTF-8'); ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="text-center">
                <input type="hidden" name="pttkargoekle" value="pttkargoekle">
                <button type="submit" id="kt_pttkargo_submit" class="btn btn-primary">
                  <span class="indicator-label">Kargo Olustur</span>
                  <span class="indicator-progress">Kaydediliyor… <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
              </div>
            </form>
          </div>

          <!-- ============ LISTE ============ -->
          <div class="tab-pane fade" id="kt_tab_pttkargo_list" role="tabpanel">
            <div class="card-body py-3">
              <div class="table-responsive" style="max-height:330px">
                <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                  <tbody>
                  <?php if (count($bellla_pttkargo_list) === 0): ?>
                    <tr><td>
                      <div class="mb-13 text-center">
                        <span class="d-inline-block position-relative ms-2">
                          <span class="d-inline-block mb-2 fs-1tx fw-bold">
                            <i class="ki-duotone ki-notification-bing fs-1hx"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                            Kargo olusturdugunda burada gorunecek.
                          </span>
                        </span>
                      </div>
                    </td></tr>
                  <?php else: foreach ($bellla_pttkargo_list as $r):
                    $publicUrl = bellla_pttkargo_takip_url((string)$r['takipno']);
                    $isOwn = ((string)($r['ekleyen'] ?? '') === (string)$kul_id);
                  ?>
                    <tr>
                      <td class="ps-0" style="min-width:220px;">
                        <a href="javascript:void(0)" class="text-gray-900 fw-bold text-hover-primary mb-1 fs-6"><?php echo htmlspecialchars($r['takipno'], ENT_QUOTES, 'UTF-8'); ?></a>
                        <span class="text-muted fw-semibold d-block fs-7">
                          <?php echo htmlspecialchars($r['gonderen'] ?? '', ENT_QUOTES, 'UTF-8'); ?> → <?php echo htmlspecialchars($r['teslimalan'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
                        </span>
                        <?php if ($bellla_pttkargo_admin && !$isOwn): ?>
                          <span class="badge badge-light-warning fs-9 mt-1">ekleyen: <?php echo htmlspecialchars((string)($r['ekleyen'] ?? '—'), ENT_QUOTES, 'UTF-8'); ?></span>
                        <?php endif; ?>
                      </td>
                      <td>
                        <span class="badge badge-light-info fs-8"><?php echo (int)($r['durumu'] ?? 1); ?>/5</span>
                        <span class="text-muted fs-8 d-block"><?php echo htmlspecialchars($r['sonuc'] ?? '', ENT_QUOTES, 'UTF-8'); ?></span>
                      </td>
                      <td class="text-end">
                        <div class="me-0 btn-group">
                          <a href="#" data-bs-toggle="modal" data-bs-target="#modal-pttkargo-edit" data-id="<?php echo (int)$r['id']; ?>" class="editPttKargo btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px" title="Duzenle">
                            <i class="ki-solid ki-gear fs-3"></i>
                          </a>
                          <span style="margin-right:4px;"></span>
                          <input hidden id="ptt_kargo_url_<?php echo (int)$r['id']; ?>" value="<?php echo $publicUrl; ?>">
                          <button type="button" onclick="(function(id){var i=document.getElementById('ptt_kargo_url_'+id);if(!i)return;navigator.clipboard&&navigator.clipboard.writeText(i.value);})(<?php echo (int)$r['id']; ?>)" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px" title="URL Kopyala">
                            <i class="fa fa-copy"></i>
                          </button>
                          <span style="margin-right:4px;"></span>
                          <a href="<?php echo $publicUrl; ?>" target="_blank" rel="noopener" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px" title="Onizle">
                            <i class="fa fa-eye"></i>
                          </a>
                          <span style="margin-right:4px;"></span>
                          <a href="#" data-id="<?php echo (int)$r['id']; ?>" data-action="delpttkargo" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px delete-button" title="Sil">
                            <i class="fa fa-trash"></i>
                          </a>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach; endif; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" id="modal-pttkargo-edit">
  <div class="modal-dialog modal-dialog-centered mw-900px">
    <div class="modal-content rounded">
      <div id="dashpttkargo"></div>
    </div>
  </div>
</div>

<script>
(function(){
  var btnUret = document.getElementById('ptt_takipno_uret');
  var inp = document.getElementById('ptt_takipno');
  if (btnUret && inp) {
    btnUret.addEventListener('click', function(){
      var prefix = ['KP','BG','PT'][Math.floor(Math.random()*3)];
      var rnd = '';
      for (var i = 0; i < 11; i++) rnd += Math.floor(Math.random()*10);
      inp.value = prefix + rnd;
    });
  }
})();
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
  if (!window.FormValidation) return;
  var formEl = document.querySelector('#kt_pttkargo_form');
  var submitBtn = document.querySelector('#kt_pttkargo_submit');
  if (!formEl || !submitBtn) return;

  var validator = FormValidation.formValidation(formEl, {
    fields: {
      takipno:    { validators: { notEmpty: { message: 'Takip no bos olamaz' }, regexp: { regexp: /^[A-Za-z0-9\-]{4,32}$/, message: 'Sadece harf/rakam/tire (4-32)' } } },
      gonderen:   { validators: { notEmpty: { message: 'Gonderen bos olamaz' } } },
      teslimalan: { validators: { notEmpty: { message: 'Teslim alan bos olamaz' } } },
      sonuc:      { validators: { notEmpty: { message: 'Sonuc metni bos olamaz' } } }
    },
    plugins: {
      trigger: new FormValidation.plugins.Trigger(),
      bootstrap: new FormValidation.plugins.Bootstrap5({ rowSelector: '.fv-row', eleInvalidClass: '', eleValidClass: '' })
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
        .then(function(r){ return r.json(); })
        .then(function(data){
          if (!window.Swal) { if (data && data.sonuc === 'tamam') location.href='dashboard'; return; }
          if (data.sonuc === 'tamam') {
            Swal.fire({ text:'Kargo olusturuldu.', icon:'success', buttonsStyling:false, timer:1500, showConfirmButton:false })
              .then(function(){ location.href='dashboard'; });
          } else if (data.sonuc === 'zatenVar') {
            Swal.fire({ text:'Bu takip no zaten kayitli.', icon:'warning', buttonsStyling:false, confirmButtonText:'Tamam', customClass:{confirmButton:'btn btn-primary'} });
          } else if (data.sonuc === 'gecersiz_takipno') {
            Swal.fire({ text:'Takip no formati gecersiz.', icon:'error', buttonsStyling:false, confirmButtonText:'Tamam', customClass:{confirmButton:'btn btn-primary'} });
          } else if (data.sonuc === 'bos') {
            Swal.fire({ text:'Lutfen zorunlu alanlari doldur.', icon:'warning', buttonsStyling:false, confirmButtonText:'Tamam', customClass:{confirmButton:'btn btn-primary'} });
          } else {
            Swal.fire({ text:'Bir yerde bir aksaklik var.', icon:'error', buttonsStyling:false, confirmButtonText:'Anladim', customClass:{confirmButton:'btn btn-primary'} });
          }
        })
        .catch(function(){
          if (window.Swal) Swal.fire({ text:'Sunucuya ulasilamadi.', icon:'error', buttonsStyling:false, confirmButtonText:'Tamam', customClass:{confirmButton:'btn btn-primary'} });
        })
        .finally(function(){
          submitBtn.removeAttribute('data-kt-indicator');
          submitBtn.disabled = false;
        });
    });
  });
});

/* edit modal AJAX */
if (window.jQuery) {
  jQuery(document).on('click', '.editPttKargo', function (e) {
    e.preventDefault();
    var uid = jQuery(this).data('id');
    var $box = jQuery('#dashpttkargo');
    $box.html('');
    jQuery.ajax({ url: 'includes/editforms/editpttkargo.php', type: 'POST', data: 'id=' + uid, dataType: 'html' })
      .done(function (data) { $box.html(data); })
      .fail(function () { $box.html('<div class="p-5 text-danger">Yuklenemedi.</div>'); });
  });
}
</script>
