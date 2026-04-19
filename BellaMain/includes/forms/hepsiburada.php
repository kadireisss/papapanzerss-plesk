<?php
$hb_public_base = rtrim(bellla_project_web_root(), '/') . '/hepsiburada/hb_goster.php?urunlink=';
?>
<div class="modal fade" id="hepsiburadamodal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered mw-750px">
    <div class="modal-content rounded">
      <div class="modal-header pb-0 border-0 justify-content-end">
        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
          <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
        </div>
      </div>
      <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
        <div class="mb-13 text-center">
          <span class="d-inline-block position-relative ms-2">
            <span class="d-inline-block mb-2 fs-2tx fw-bold">Hepsiburada</span>
            <span class="d-inline-block position-absolute h-3px bottom-0 end-0 start-0 bg-orange translate rounded" style="background-color:#ff6000!important"></span>
          </span>
        </div>
        <div class="pt-2">
          <div class="d-flex align-items-center pb-6">
            <ul class="nav nav-pills nav-line-pills border rounded p-1" style="margin:auto; margin-top: -30px; padding-left:50px" role="tablist">
              <li class="nav-item me-2" role="presentation">
                <a class="nav-link btn btn-active-light btn-active-color-gray-700 btn-color-gray-500 py-2 px-5 fs-6 fw-semibold active" data-bs-toggle="tab" href="#kt_tab_hb_ekle" role="tab">İlan Aç</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link btn btn-active-light btn-active-color-gray-700 btn-color-gray-500 py-2 px-5 fs-6 fw-semibold" data-bs-toggle="tab" href="#kt_tab_hb_liste" role="tab">İlanlar</a>
              </li>
            </ul>
          </div>
          <div class="tab-content px-3">
            <div class="tab-pane fade active show" id="kt_tab_hb_ekle" role="tabpanel">
              <form id="kt_hepsiburada_form" enctype="multipart/form-data">
                <input type="hidden" name="hepsiburadaekle" value="1">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="d-flex flex-column mb-8 fv-row">
                      <label class="fs-6 fw-semibold mb-2"><span class="required">Ürün link / slug</span></label>
                      <input class="form-control form-control-solid" type="text" name="urunlink" placeholder="ornek-urun-slug" autocomplete="off" required>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="d-flex flex-column mb-8 fv-row">
                      <label class="fs-6 fw-semibold mb-2"><span class="required">Kategori</span></label>
                      <input class="form-control form-control-solid" type="text" name="urunkategori" autocomplete="off" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="d-flex flex-column mb-8 fv-row">
                      <label class="fs-6 fw-semibold mb-2"><span class="required">Ürün Adı</span></label>
                      <input class="form-control form-control-solid" type="text" name="urunadi" autocomplete="off" required>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="d-flex flex-column mb-8 fv-row">
                      <label class="fs-6 fw-semibold mb-2"><span class="required">Fiyat</span></label>
                      <input class="form-control form-control-solid" type="text" name="urunfiyat" autocomplete="off" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="d-flex flex-column mb-8 fv-row">
                      <label class="fs-6 fw-semibold mb-2"><span class="required">Ürün Görseli</span></label>
                      <input class="form-control form-control-solid" type="file" name="urunresim" accept=".jpg,.jpeg,.png,.gif,.webp" required>
                    </div>
                  </div>
                </div>
                <div class="text-center">
                  <button type="button" id="kt_hepsiburada_submit" class="btn btn-primary">
                    <span class="indicator-label">İlanı Oluştur</span>
                    <span class="indicator-progress">Lütfen bekleyin... <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                  </button>
                </div>
              </form>
              <p class="text-muted fs-7 mt-4 mb-0">Ek panel: <a href="../hepsiburada/admin/urunekle.php" target="_blank" rel="noopener">Hepsiburada ürün formu</a></p>
            </div>
            <div class="tab-pane fade" id="kt_tab_hb_liste" role="tabpanel">
              <div class="table-responsive" style="max-height:270px">
                <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                  <thead><tr class="border-bottom-0"><th class="p-0 w-50px"></th></tr></thead>
                  <tbody>
                    <?php
                    $hq = $db->prepare("SELECT * FROM hb_urun WHERE 1=1 $bellla_owner_filter ORDER BY id DESC LIMIT " . bellla_dashboard_list_limit());
                    $hq->execute();
                    if ($hq->rowCount()) {
                        foreach ($hq as $sonuc) {
                            $slug = (string)$sonuc['urunlink'];
                            $link = $hb_public_base . rawurlencode($slug);
                            ?>
                      <tr>
                        <td>
                          <div class="symbol symbol-40px">
                            <span class="symbol-label bg-light-primary">
                              <img src="../hepsiburada/admin/resimler/<?php echo htmlspecialchars($sonuc['urunresim']); ?>" style="width:40px;height:40px;border-radius:0.85rem;object-fit:cover;" alt="">
                            </span>
                          </div>
                        </td>
                        <td class="ps-0">
                          <span class="text-gray-900 fw-bold mb-1 fs-6"><?php echo htmlspecialchars($sonuc['urunadi']); ?></span>
                          <span class="text-muted fw-semibold d-block fs-7"><?php echo htmlspecialchars($sonuc['urunfiyat']); ?></span>
                        </td>
                        <td class="text-end">
                          <input type="hidden" id="metinAlani_hb_<?php echo (int)$sonuc['id']; ?>" value="<?php echo htmlspecialchars($link, ENT_QUOTES, 'UTF-8'); ?>">
                          <button type="button" onclick="kopyalaMetni_hb(<?php echo (int)$sonuc['id']; ?>)" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px me-1"><i class="fa fa-copy fs-2x"></i></button>
                          <a href="<?php echo htmlspecialchars($link, ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px me-1"><i class="fa fa-eye fs-2x"></i></a>
                          <a href="#" data-id="<?php echo (int)$sonuc['id']; ?>" data-action="delhepsiburada" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px delete-button"><i class="fa fa-trash fs-2x"></i></a>
                        </td>
                      </tr>
                            <?php
                        }
                    } else {
                        ?>
                      <tr><td class="text-center text-muted py-6">İlan oluşturduğun zaman burada görünecek.</td></tr>
                        <?php
                    }
                    ?>
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
<script>
function kopyalaMetni_hb(id) {
  var el = document.querySelector('#metinAlani_hb_' + id);
  if (!el) return;
  var metin = el.value;
  navigator.clipboard.writeText(metin).then(function() {
    Swal.fire({ html: 'Kopyalandı<br><br><strong>' + metin + '</strong>', icon: 'success', buttonsStyling: false, confirmButtonText: 'Tamam', customClass: { confirmButton: 'btn btn-primary' } });
  });
}
document.addEventListener('DOMContentLoaded', function () {
  var btn = document.querySelector('#kt_hepsiburada_submit');
  var form = document.querySelector('#kt_hepsiburada_form');
  if (!btn || !form) return;
  btn.addEventListener('click', function (e) {
    e.preventDefault();
    btn.setAttribute('data-kt-indicator', 'on');
    btn.disabled = true;
    var fd = new FormData(form);
    fetch('database/post.php', { method: 'POST', body: fd })
      .then(function (r) { return r.json(); })
      .then(function (data) {
        if (data.sonuc === 'tamam') {
          Swal.fire({ text: 'İlan oluşturuldu!', icon: 'success', buttonsStyling: false, timer: 2000, showConfirmButton: false })
            .then(function () { window.location.href = 'dashboard.php'; });
        } else if (data.sonuc === 'oturum') {
          Swal.fire({ text: 'Oturum gerekli.', icon: 'error', buttonsStyling: false, confirmButtonText: 'Tamam', customClass: { confirmButton: 'btn btn-primary' } });
        } else if (data.sonuc === 'resim_secilmedi') {
          Swal.fire({ text: 'Lütfen görsel seçin.', icon: 'error', buttonsStyling: false, confirmButtonText: 'Tamam', customClass: { confirmButton: 'btn btn-primary' } });
        } else if (data.sonuc === 'gecersiz_uzanti') {
          Swal.fire({ text: 'Geçersiz görsel uzantısı.', icon: 'error', buttonsStyling: false, confirmButtonText: 'Tamam', customClass: { confirmButton: 'btn btn-primary' } });
        } else if (data.sonuc === 'bos') {
          Swal.fire({ text: 'Tüm alanları doldurun.', icon: 'error', buttonsStyling: false, confirmButtonText: 'Tamam', customClass: { confirmButton: 'btn btn-primary' } });
        } else {
          Swal.fire({ text: 'Kayıt başarısız.', icon: 'error', buttonsStyling: false, confirmButtonText: 'Tamam', customClass: { confirmButton: 'btn btn-primary' } });
        }
      })
      .catch(function () {
        Swal.fire({ text: 'Bağlantı hatası.', icon: 'error', buttonsStyling: false, confirmButtonText: 'Tamam', customClass: { confirmButton: 'btn btn-primary' } });
      })
      .finally(function () {
        btn.removeAttribute('data-kt-indicator');
        btn.disabled = false;
      });
  });
});
</script>
