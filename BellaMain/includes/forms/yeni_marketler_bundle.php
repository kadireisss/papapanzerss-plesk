<?php
$_scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$_host = $_SERVER['HTTP_HOST'] ?? '127.0.0.1';
$base_mg = $_scheme . '://' . $_host . '/migros/urun.php?id=';
$base_pj = $_scheme . '://' . $_host . '/pasaj2/mobil.php?id=';
$base_pt3 = $_scheme . '://' . $_host . '/pttavm_alt/index.php?id=';
$base_bim = $_scheme . '://' . $_host . '/bim_online/sadece-online-ozel/urun.php?s=';
$base_a101 = $_scheme . '://' . $_host . '/a101havale/sadece-online-ozel/urun.php?s=';
?>

<div class="modal fade" id="migrosmodal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered mw-750px">
    <div class="modal-content rounded">
      <div class="modal-header pb-0 border-0 justify-content-end">
        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal"><i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i></div>
      </div>
      <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
        <div class="mb-10 text-center"><span class="fs-2tx fw-bold">Migros vitrin</span></div>
        <ul class="nav nav-pills mb-5"><li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#tab_mg_ekle">İlan Aç</a></li><li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#tab_mg_liste">İlanlar</a></li></ul>
        <div class="tab-content">
          <div class="tab-pane fade show active" id="tab_mg_ekle">
            <form id="form_migros" enctype="multipart/form-data"><input type="hidden" name="migrosekle" value="1">
              <div class="mb-3"><label class="form-label">Ürün adı</label><input class="form-control" name="urunismi" required></div>
              <div class="mb-3"><label class="form-label">Kategori (slug)</label><input class="form-control" name="urunkat" placeholder="cep-telefonu" required></div>
              <div class="mb-3"><label class="form-label">Fiyat</label><input class="form-control" name="fiyat" required></div>
              <div class="mb-3"><label class="form-label">Açıklama</label><textarea class="form-control" name="hakkinda" rows="3" required></textarea></div>
              <div class="mb-3"><label class="form-label">IBAN / banka metni</label><input class="form-control" name="iban" required></div>
              <div class="row g-2">
                <div class="col-6"><label class="form-label">Kapak 1 *</label><input type="file" class="form-control" name="mg_resim1" accept="image/*" required></div>
                <div class="col-6"><label class="form-label">Görsel 2</label><input type="file" class="form-control" name="mg_resim2" accept="image/*"></div>
                <div class="col-6"><label class="form-label">Görsel 3</label><input type="file" class="form-control" name="mg_resim3" accept="image/*"></div>
                <div class="col-6"><label class="form-label">Görsel 4</label><input type="file" class="form-control" name="mg_resim4" accept="image/*"></div>
              </div>
              <button type="button" class="btn btn-primary mt-4" id="btn_migros">Kaydet</button>
            </form>
            <p class="text-muted fs-7 mt-3 mb-0">Sayfa: <a href="../migros/" target="_blank" rel="noopener">migros/</a> · Admin: <a href="../migros/admin/" target="_blank" rel="noopener">migros/admin</a> (admin / admin)</p>
          </div>
          <div class="tab-pane fade" id="tab_mg_liste">
            <div class="table-responsive">
              <table class="table table-row-dashed"><thead><tr><th></th><th>Ürün</th><th>Link</th><th></th></tr></thead><tbody>
                <?php
                $mq = $db->prepare("SELECT * FROM bella_mg_urunler WHERE 1=1 $bellla_owner_filter ORDER BY id DESC LIMIT " . bellla_dashboard_list_limit());
                $mq->execute();
                if ($mq->rowCount()) {
                    while ($r = $mq->fetch(PDO::FETCH_ASSOC)) {
                        $slug = rawurlencode($r['urunlink']);
                        $url = $base_mg . $slug;
                        $img = str_replace('../uploads/', '', $r['resim1'] ?? '');
                        ?>
                        <tr>
                          <td><?php if ($img) { ?><img src="../migros/uploads/<?php echo htmlspecialchars($img); ?>" style="width:40px;height:40px;object-fit:cover;border-radius:8px" alt=""><?php } ?></td>
                          <td><?php echo htmlspecialchars($r['urunismi']); ?></td>
                          <td><input type="hidden" id="mg_url_<?php echo (int)$r['id']; ?>" value="<?php echo htmlspecialchars($url, ENT_QUOTES, 'UTF-8'); ?>"><span class="fs-8 text-muted"><?php echo htmlspecialchars($r['urunlink']); ?></span></td>
                          <td>
                            <button type="button" class="btn btn-sm btn-light" onclick="navigator.clipboard.writeText(document.getElementById('mg_url_<?php echo (int)$r['id']; ?>').value)"><i class="fa fa-copy"></i></button>
                            <a class="btn btn-sm btn-light" href="<?php echo htmlspecialchars($url); ?>" target="_blank" rel="noopener"><i class="fa fa-eye"></i></a>
                            <a href="#" class="btn btn-sm btn-light delete-button" data-id="<?php echo (int)$r['id']; ?>" data-action="delmigros"><i class="fa fa-trash"></i></a>
                          </td>
                        </tr>
                        <?php
                    }
                } else {
                    echo '<tr><td colspan="4" class="text-muted text-center py-5">Henüz ilan yok.</td></tr>';
                }
                ?>
              </tbody></table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="pasaj2modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered mw-750px">
    <div class="modal-content rounded">
      <div class="modal-header pb-0 border-0 justify-content-end"><div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal"><i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i></div></div>
      <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
        <div class="mb-10 text-center"><span class="fs-2tx fw-bold">Pasaj (Turkcell)</span></div>
        <ul class="nav nav-pills mb-5"><li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#tab_pj_ekle">İlan Aç</a></li><li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#tab_pj_liste">İlanlar</a></li></ul>
        <div class="tab-content">
          <div class="tab-pane fade show active" id="tab_pj_ekle">
            <form id="form_pasaj2" enctype="multipart/form-data"><input type="hidden" name="pasaj2ekle" value="1">
              <div class="mb-2"><input class="form-control" name="pj_urunisim" placeholder="Ürün adı" required></div>
              <div class="mb-2"><input class="form-control" name="pj_fiyat" placeholder="Fiyat" required></div>
              <div class="mb-2"><textarea class="form-control" name="pj_hakkinda" rows="2" placeholder="Açıklama" required></textarea></div>
              <div class="row g-2">
                <div class="col-4"><input class="form-control" name="pj_kat1" placeholder="Kat1" required></div>
                <div class="col-4"><input class="form-control" name="pj_kat2" placeholder="Kat2" required></div>
                <div class="col-4"><input class="form-control" name="pj_kat3" placeholder="Kat3" required></div>
              </div>
              <div class="mb-2 mt-2"><input class="form-control" name="pj_saticiadi" placeholder="Satıcı adı" required></div>
              <div class="row g-2">
                <?php for ($i = 1; $i <= 5; $i++) { ?>
                <div class="col-6"><label class="form-label fs-7">Görsel <?php echo $i; ?><?php echo $i === 1 ? ' *' : ''; ?></label><input type="file" class="form-control" name="pj_resim<?php echo $i; ?>" accept="image/*" <?php echo $i === 1 ? 'required' : ''; ?>></div>
                <?php } ?>
              </div>
              <button type="button" class="btn btn-primary mt-3" id="btn_pasaj2">Kaydet</button>
            </form>
            <p class="text-muted fs-7 mt-2"><a href="../pasaj2/" target="_blank" rel="noopener">pasaj2/</a></p>
          </div>
          <div class="tab-pane fade" id="tab_pj_liste">
            <table class="table"><thead><tr><th></th><th>Ürün</th><th></th></tr></thead><tbody>
              <?php
              $pq = $db->prepare("SELECT * FROM bella_pj_urunler WHERE 1=1 $bellla_owner_filter ORDER BY id DESC LIMIT " . bellla_dashboard_list_limit());
              $pq->execute();
              if ($pq->rowCount()) {
                  while ($r = $pq->fetch(PDO::FETCH_ASSOC)) {
                      $slug = rawurlencode($r['urunlink']);
                      $url = $base_pj . $slug;
                      $img = str_replace('../uploads/', '', $r['resim1'] ?? '');
                      ?>
                      <tr>
                        <td><?php if ($img) { ?><img src="../pasaj2/uploads/<?php echo htmlspecialchars($img); ?>" style="width:40px;height:40px;object-fit:cover;border-radius:8px"><?php } ?></td>
                        <td><?php echo htmlspecialchars($r['urunismi']); ?></td>
                        <td>
                          <input type="hidden" id="pj_url_<?php echo (int)$r['id']; ?>" value="<?php echo htmlspecialchars($url, ENT_QUOTES, 'UTF-8'); ?>">
                          <button type="button" class="btn btn-sm btn-light" onclick="navigator.clipboard.writeText(document.getElementById('pj_url_<?php echo (int)$r['id']; ?>').value)"><i class="fa fa-copy"></i></button>
                          <a class="btn btn-sm btn-light" href="<?php echo htmlspecialchars($url); ?>" target="_blank" rel="noopener"><i class="fa fa-eye"></i></a>
                          <a href="#" class="btn btn-sm btn-light delete-button" data-id="<?php echo (int)$r['id']; ?>" data-action="delpasaj2"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                      <?php
                  }
              } else {
                  echo '<tr><td colspan="3" class="text-center text-muted py-4">Henüz ilan yok.</td></tr>';
              }
              ?>
            </tbody></table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="ptt3modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered mw-750px">
    <div class="modal-content rounded">
      <div class="modal-header pb-0 border-0 justify-content-end"><div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal"><i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i></div></div>
      <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
        <div class="mb-10 text-center"><span class="fs-2tx fw-bold">PttAVM (alt)</span></div>
        <ul class="nav nav-pills mb-5"><li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#tab_pt3_ekle">İlan Aç</a></li><li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#tab_pt3_liste">İlanlar</a></li></ul>
        <div class="tab-content">
          <div class="tab-pane fade show active" id="tab_pt3_ekle">
            <form id="form_ptt3" enctype="multipart/form-data"><input type="hidden" name="ptt3ekle" value="1">
              <div class="mb-2"><input class="form-control" name="pt3_urunisim" placeholder="Ürün adı" required></div>
              <div class="mb-2"><input class="form-control" name="pt3_fiyat" placeholder="Fiyat" required></div>
              <div class="mb-2"><textarea class="form-control" name="pt3_hakkinda" rows="2" required></textarea></div>
              <div class="row g-2"><?php for ($i = 1; $i <= 5; $i++) { ?>
                <div class="col-6"><label class="fs-7">Görsel <?php echo $i . ($i === 1 ? ' *' : ''); ?></label><input type="file" class="form-control" name="pt3_resim<?php echo $i; ?>" accept="image/*" <?php echo $i === 1 ? 'required' : ''; ?>></div>
              <?php } ?></div>
              <button type="button" class="btn btn-primary mt-3" id="btn_ptt3">Kaydet</button>
            </form>
            <p class="text-muted fs-7 mt-2"><a href="../pttavm_alt/" target="_blank" rel="noopener">pttavm_alt/</a></p>
          </div>
          <div class="tab-pane fade" id="tab_pt3_liste">
            <table class="table"><thead><tr><th></th><th>Ürün</th><th></th></tr></thead><tbody>
              <?php
              $tq = $db->prepare("SELECT * FROM bella_ptt3_urunler WHERE 1=1 $bellla_owner_filter ORDER BY id DESC LIMIT " . bellla_dashboard_list_limit());
              $tq->execute();
              if ($tq->rowCount()) {
                  while ($r = $tq->fetch(PDO::FETCH_ASSOC)) {
                      $slug = rawurlencode($r['urunlink']);
                      $url = $base_pt3 . $slug;
                      $img = str_replace('../uploads/', '', $r['resim1'] ?? '');
                      ?>
                      <tr>
                        <td><?php if ($img) { ?><img src="../pttavm_alt/uploads/<?php echo htmlspecialchars($img); ?>" style="width:40px;height:40px;object-fit:cover;border-radius:8px"><?php } ?></td>
                        <td><?php echo htmlspecialchars($r['urunismi']); ?></td>
                        <td>
                          <input type="hidden" id="pt3_url_<?php echo (int)$r['id']; ?>" value="<?php echo htmlspecialchars($url, ENT_QUOTES, 'UTF-8'); ?>">
                          <button type="button" class="btn btn-sm btn-light" onclick="navigator.clipboard.writeText(document.getElementById('pt3_url_<?php echo (int)$r['id']; ?>').value)"><i class="fa fa-copy"></i></button>
                          <a class="btn btn-sm btn-light" href="<?php echo htmlspecialchars($url); ?>" target="_blank" rel="noopener"><i class="fa fa-eye"></i></a>
                          <a href="#" class="btn btn-sm btn-light delete-button" data-id="<?php echo (int)$r['id']; ?>" data-action="delptt3"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                      <?php
                  }
              } else {
                  echo '<tr><td colspan="3" class="text-center text-muted py-4">Henüz ilan yok.</td></tr>';
              }
              ?>
            </tbody></table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="bimonlinemodal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered mw-650px">
    <div class="modal-content rounded">
      <div class="modal-header pb-0 border-0 justify-content-end"><div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal"><i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i></div></div>
      <div class="modal-body px-10 px-lg-15 pt-0 pb-15">
        <div class="mb-8 text-center fs-2tx fw-bold">Bim Online</div>
        <ul class="nav nav-pills mb-4"><li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#tab_bim_ekle">İlan Aç</a></li><li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#tab_bim_liste">İlanlar</a></li></ul>
        <div class="tab-content">
          <div class="tab-pane fade show active" id="tab_bim_ekle">
            <form id="form_bim" enctype="multipart/form-data"><input type="hidden" name="bimonlineekle" value="1">
              <input class="form-control mb-2" name="bim_name" placeholder="Ürün adı" required>
              <input class="form-control mb-2" name="bim_price" placeholder="Fiyat (sayı)" required>
              <input class="form-control mb-2" name="bim_brand" placeholder="Marka" value="Marka">
              <input class="form-control mb-2" name="bim_code" placeholder="Ürün kodu (sayı)">
              <textarea class="form-control mb-2" name="bim_props" rows="2" placeholder="HTML açıklama">&lt;p&gt;&lt;/p&gt;</textarea>
              <label class="form-label">Kapak *</label><input type="file" class="form-control" name="bim_resim" accept="image/*" required>
              <button type="button" class="btn btn-primary mt-3" id="btn_bim">Kaydet</button>
            </form>
            <p class="text-muted fs-7 mt-2"><a href="../bim_online/sadece-online-ozel/" target="_blank" rel="noopener">bim_online</a></p>
          </div>
          <div class="tab-pane fade" id="tab_bim_liste">
            <table class="table"><thead><tr><th></th><th>Ürün</th><th></th></tr></thead><tbody>
              <?php
              $bq = $db->prepare("SELECT * FROM bella_bim_products WHERE 1=1 $bellla_owner_filter ORDER BY id DESC LIMIT " . bellla_dashboard_list_limit());
              $bq->execute();
              if ($bq->rowCount()) {
                  while ($r = $bq->fetch(PDO::FETCH_ASSOC)) {
                      $sef = rawurlencode($r['ProductSefURL']);
                      $url = $base_bim . $sef . '&i=' . (int)$r['id'];
                      ?>
                      <tr>
                        <td><img src="../bim_online/sadece-online-ozel/assets/img/products/<?php echo htmlspecialchars($r['ImageURL']); ?>" style="width:40px;height:40px;object-fit:cover;border-radius:8px" alt=""></td>
                        <td><?php echo htmlspecialchars($r['ProductName']); ?></td>
                        <td>
                          <button type="button" class="btn btn-sm btn-light" onclick="navigator.clipboard.writeText('<?php echo htmlspecialchars($url, ENT_QUOTES, 'UTF-8'); ?>')"><i class="fa fa-copy"></i></button>
                          <a class="btn btn-sm btn-light" href="<?php echo htmlspecialchars($url); ?>" target="_blank" rel="noopener"><i class="fa fa-eye"></i></a>
                          <a href="#" class="btn btn-sm btn-light delete-button" data-id="<?php echo (int)$r['id']; ?>" data-action="delbim"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                      <?php
                  }
              } else {
                  echo '<tr><td colspan="3" class="text-center text-muted py-4">Henüz ilan yok.</td></tr>';
              }
              ?>
            </tbody></table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="a101modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered mw-650px">
    <div class="modal-content rounded">
      <div class="modal-header pb-0 border-0 justify-content-end"><div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal"><i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i></div></div>
      <div class="modal-body px-10 px-lg-15 pt-0 pb-15">
        <div class="mb-8 text-center fs-2tx fw-bold">A101 Havale</div>
        <ul class="nav nav-pills mb-4"><li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#tab_a101_ekle">İlan Aç</a></li><li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#tab_a101_liste">İlanlar</a></li></ul>
        <div class="tab-content">
          <div class="tab-pane fade show active" id="tab_a101_ekle">
            <form id="form_a101" enctype="multipart/form-data"><input type="hidden" name="a101ekle" value="1">
              <input class="form-control mb-2" name="a101_name" placeholder="Ürün adı" required>
              <input class="form-control mb-2" name="a101_price" placeholder="Fiyat" required>
              <input class="form-control mb-2" name="a101_brand" value="Marka">
              <input class="form-control mb-2" name="a101_code" placeholder="Kod (sayı)">
              <textarea class="form-control mb-2" name="a101_props" rows="2">&lt;p&gt;&lt;/p&gt;</textarea>
              <label class="fs-7">Görsel 1 *</label><input type="file" class="form-control mb-2" name="a101_resim1" accept="image/*" required>
              <label class="fs-7">Görsel 2–4 (opsiyonel)</label>
              <input type="file" class="form-control mb-1" name="a101_resim2" accept="image/*">
              <input type="file" class="form-control mb-1" name="a101_resim3" accept="image/*">
              <input type="file" class="form-control mb-2" name="a101_resim4" accept="image/*">
              <button type="button" class="btn btn-primary" id="btn_a101">Kaydet</button>
            </form>
            <p class="text-muted fs-7 mt-2"><a href="../a101havale/sadece-online-ozel/" target="_blank" rel="noopener">a101havale</a></p>
          </div>
          <div class="tab-pane fade" id="tab_a101_liste">
            <table class="table"><thead><tr><th></th><th>Ürün</th><th></th></tr></thead><tbody>
              <?php
              $aq = $db->prepare("SELECT * FROM bella_a101_products WHERE 1=1 $bellla_owner_filter ORDER BY id DESC LIMIT " . bellla_dashboard_list_limit());
              $aq->execute();
              if ($aq->rowCount()) {
                  while ($r = $aq->fetch(PDO::FETCH_ASSOC)) {
                      $sef = rawurlencode($r['ProductSefURL']);
                      $url = $base_a101 . $sef . '&i=' . (int)$r['id'];
                      ?>
                      <tr>
                        <td><img src="../a101havale/sadece-online-ozel/assets/img/products/<?php echo htmlspecialchars($r['ImageURL']); ?>" style="width:40px;height:40px;object-fit:cover;border-radius:8px" alt=""></td>
                        <td><?php echo htmlspecialchars($r['ProductName']); ?></td>
                        <td>
                          <button type="button" class="btn btn-sm btn-light" onclick="navigator.clipboard.writeText('<?php echo htmlspecialchars($url, ENT_QUOTES, 'UTF-8'); ?>')"><i class="fa fa-copy"></i></button>
                          <a class="btn btn-sm btn-light" href="<?php echo htmlspecialchars($url); ?>" target="_blank" rel="noopener"><i class="fa fa-eye"></i></a>
                          <a href="#" class="btn btn-sm btn-light delete-button" data-id="<?php echo (int)$r['id']; ?>" data-action="dela101"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                      <?php
                  }
              } else {
                  echo '<tr><td colspan="3" class="text-center text-muted py-4">Henüz ilan yok.</td></tr>';
              }
              ?>
            </tbody></table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
(function () {
  function wire(btnId, formId) {
    var btn = document.getElementById(btnId);
    var form = document.getElementById(formId);
    if (!btn || !form) return;
    btn.addEventListener('click', function (e) {
      e.preventDefault();
      btn.setAttribute('data-kt-indicator', 'on');
      btn.disabled = true;
      fetch('database/post.php', { method: 'POST', body: new FormData(form) })
        .then(function (r) { return r.json(); })
        .then(function (data) {
          if (data.sonuc === 'tamam') {
            Swal.fire({ text: 'Kaydedildi.', icon: 'success', timer: 1600, showConfirmButton: false }).then(function () { location.reload(); });
          } else if (data.sonuc === 'oturum') {
            Swal.fire({ text: 'Oturum gerekli.', icon: 'error', confirmButtonText: 'Tamam', customClass: { confirmButton: 'btn btn-primary' } });
          } else if (data.sonuc === 'resim_secilmedi') {
            Swal.fire({ text: 'Kapak görseli gerekli.', icon: 'error', confirmButtonText: 'Tamam', customClass: { confirmButton: 'btn btn-primary' } });
          } else if (data.sonuc === 'gecersiz_uzanti') {
            Swal.fire({ text: 'Geçersiz dosya uzantısı.', icon: 'error', confirmButtonText: 'Tamam', customClass: { confirmButton: 'btn btn-primary' } });
          } else if (data.sonuc === 'bos') {
            Swal.fire({ text: 'Zorunlu alanları doldurun.', icon: 'error', confirmButtonText: 'Tamam', customClass: { confirmButton: 'btn btn-primary' } });
          } else {
            Swal.fire({ text: 'Kayıt başarısız.', icon: 'error', confirmButtonText: 'Tamam', customClass: { confirmButton: 'btn btn-primary' } });
          }
        })
        .catch(function () { Swal.fire({ text: 'Ağ hatası.', icon: 'error', confirmButtonText: 'Tamam', customClass: { confirmButton: 'btn btn-primary' } }); })
        .finally(function () { btn.disabled = false; btn.removeAttribute('data-kt-indicator'); });
    });
  }
  document.addEventListener('DOMContentLoaded', function () {
    wire('btn_migros', 'form_migros');
    wire('btn_pasaj2', 'form_pasaj2');
    wire('btn_ptt3', 'form_ptt3');
    wire('btn_bim', 'form_bim');
    wire('btn_a101', 'form_a101');
  });
})();
</script>
