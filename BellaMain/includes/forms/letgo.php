<div class="modal fade" id="letgomodal" tabindex="-1" aria-hidden="true">
  <!--begin::Modal dialog-->
  <div class="modal-dialog modal-dialog-centered mw-750px">
    <!--begin::Modal content-->
    <div class="modal-content rounded">
      <!--begin::Modal header-->
      <div class="modal-header pb-0 border-0 justify-content-end">
        <!--begin::Close-->
        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
          <i class="ki-duotone ki-cross fs-1">
            <span class="path1"></span>
            <span class="path2"></span>
          </i>
        </div>
        <!--end::Close-->
      </div>
      <!--begin::Modal header-->
      <!--begin::Modal body-->
      <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
        <div class="mb-13 text-center">
          <!--begin::Title-->
          <!--begin::Underline-->
          <span class="d-inline-block position-relative ms-2">
            <!--begin::Label-->
            <span class="d-inline-block mb-2 fs-2tx fw-bold"> Letgo </span>
            <!--end::Label-->
            <!--begin::Line-->
            <span class="d-inline-block position-absolute h-3px bottom-0 end-0 start-0 bg-danger translate rounded"></span>
            <!--end::Line-->
          </span>
          <!--end::Underline-->
          <!--end::Description-->
        </div>
        <div class="pt-2">
          <!--begin::Tabs-->
          <div class="d-flex align-items-center pb-6">
            <!--begin::Nav pills-->
            <ul class="nav nav-pills nav-line-pills border rounded p-1" style="margin:auto; margin-top: -30px; padding-left:50px" role="tablist">
              <li class="nav-item me-2" role="presentation">
                <a class="nav-link btn btn-active-light btn-active-color-gray-700 btn-color-gray-500 py-2 px-5 fs-6 fw-semibold active" data-bs-toggle="tab" id="kt_ilanacletgo" href="#kt_tab_ilanacletgo" aria-selected="true" role="tab"> İlan Aç </a>
              </li>
              <li class="nav-item" role="presentation" style="margin-left:-5px">
                <a class="nav-link btn btn-active-light btn-active-color-gray-700 btn-color-gray-500 py-2 px-5 fs-6 fw-semibold" data-bs-toggle="tab" id="kt_ilanlarimletgo" href="#kt_tab_ilanlarimletgo" aria-selected="false" tabindex="-1" role="tab"> İlanlar </a>
              </li>
              <li class="nav-item" role="presentation" style="margin-left:-5px">
                <a class="nav-link btn btn-active-light btn-active-color-gray-700 btn-color-gray-500 py-2 px-5 fs-6 fw-semibold" data-bs-toggle="tab" id="kt_izlemeletgo" href="#kt_tab_izlemeletgo" aria-selected="false" tabindex="-2" role="tab"> İzleme </a>
              </li>
              <li class="nav-item" role="presentation" style="margin-left:-5px">
                <a class="nav-link btn btn-active-light btn-active-color-gray-700 btn-color-gray-500 py-2 px-5 fs-6 fw-semibold" data-bs-toggle="tab" id="kt_loglarletgo" href="#kt_tab_loglarletgo" aria-selected="false" tabindex="-3" role="tab"> Log </a>
              </li>
            </ul>
            <!--end::Nav pills-->
          </div>
          <!--end::Tabs-->
          <!--begin::Tab content-->
          <div class="tab-content px-3">
            <!--begin::Tab pane-->
            <div class="tab-pane fade active show" id="kt_tab_ilanacletgo" role="tabpanel" aria-labelledby="kt_ilanacletgo">
              <form id="kt_letgo_form">
                <div class="row">
                  <div class="col-lg-4">
                    <div class="d-flex flex-column mb-8 fv-row">
                      <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Ürün Adı</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="Specify a target priorty">
                          <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                        </span>
                      </label>
                      <input class="form-control form-control-solid" type="text" placeholder="" name="urunadi" autocomplete="off">
                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="d-flex flex-column mb-8 fv-row">
                      <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Ad Soyad</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="Specify a target priorty">
                          <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                        </span>
                      </label>
                      <input class="form-control form-control-solid" type="text" placeholder="" name="adsoyad" autocomplete="off">
                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="d-flex flex-column mb-8 fv-row">
                      <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Açıklama</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="Specify a target priorty">
                          <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                        </span>
                      </label>
                      <input class="form-control form-control-solid" type="text" placeholder="" name="aciklama" autocomplete="off">
                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-4">
                    <div class="d-flex flex-column mb-8 fv-row">
                      <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">İl</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="Specify a target priorty">
                          <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                        </span>
                      </label>
                      <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="Iller3" name="il">
                        <option disabled selected>İl Seçiniz</option>
                      </select>
                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="d-flex flex-column mb-8 fv-row">
                      <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">İlçe</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="Specify a target priorty">
                          <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                        </span>
                      </label>
                      <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="Ilceler3" name="ilce">
                        <option disabled selected>İlçe Seçiniz</option>
                      </select>
                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="d-flex flex-column mb-8 fv-row">
                      <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Ürün Fiyatı</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="Specify a target priorty">
                          <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                        </span>
                      </label>
                      <div class="input-group">
                        <input class="form-control form-control-solid sayisalinput" onkeyup="oneDot(this)" onkeypress="sadeceSayi(event)" type="text" placeholder="" name="urunfiyati" autocomplete="off" maxlength="6">
                        <span class="input-group-text input-group-text text-danger fw-bold" style="border: none;">TL</span>
                      </div>
                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-6">
                    <div class="d-flex flex-column mb-8 fv-row">
                      <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">İlan Tarihi</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="Specify a target priorty">
                          <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                        </span>
                      </label>
                      <input class="form-control form-control-solid" type="text" placeholder="Örn: 25 May" name="ilantarihi" autocomplete="off">
                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="d-flex flex-column mb-8 fv-row">
                      <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">İlan Numarası</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="Specify a target priorty">
                          <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                        </span>
                      </label>
                      <div class="input-group">
                      <input class="form-control form-control-solid randomltg" type="text" placeholder="" name="ilanno" autocomplete="off">
                      <button type="button" style="border-radius:0px 0.8rem 0.8rem 0px" class="btn btn-danger btn-sm generateltg">Üret</button>
                        <script>
                        	function getRndInteger(min, max) {
                            	return Math.floor(Math.random() * (max - min + 1) ) + min;
                        	}
                        	document.querySelector('.generateltg').addEventListener('click', () => {
                            	document.querySelector('.randomltg').value = getRndInteger(1000000000,9999999999);
                            	document.querySelector('.randomltg').setAttribute('value', document.querySelector('.randomltg').value);
                        	})
                        	</script>
                        </div>
                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                  </div>
                </div>

                <div class="row">
                <div class="col-lg-6">
                    <div class="d-flex flex-column mb-8 fv-row">
                      <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Ürün Kategorisi 1</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="Specify a target priorty">
                          <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                        </span>
                      </label>
                      <input class="form-control form-control-solid" type="text" placeholder="Örn: Elektronik" name="kat1" autocomplete="off">
                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="d-flex flex-column mb-8 fv-row">
                      <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Ürün Kategorisi 2</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="Specify a target priorty">
                          <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                        </span>
                      </label>
                      <input class="form-control form-control-solid" type="text" placeholder="Örn: Bilgisayar" name="kat2" autocomplete="off">
                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-3">
                    <div class="d-flex flex-column mb-8 fv-row">
                      <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Marka</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="Specify a target priorty">
                          <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                        </span>
                      </label>
                      <input class="form-control form-control-solid" type="text" placeholder="Örn: Apple" name="kategori1" autocomplete="off">
                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="d-flex flex-column mb-8 fv-row">
                      <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Model</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="Specify a target priorty">
                          <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                        </span>
                      </label>
                      <input class="form-control form-control-solid" type="text" placeholder="Örn: iPhone 13" name="kategori2" autocomplete="off">
                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="d-flex flex-column mb-8 fv-row">
                      <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Renk</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="Specify a target priorty">
                          <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                        </span>
                      </label>
                      <input class="form-control form-control-solid" type="text" placeholder="" name="kategori3" autocomplete="off">
                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="d-flex flex-column mb-8 fv-row">
                      <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Durum</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="Specify a target priorty">
                          <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                        </span>
                      </label>
                      <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="kategori4">
                        <option disabled selected>Seçim Yapınız</option>
                              <option value="Yeni">Yeni</option>
                              <option value="Yeni Gibi">Yeni Gibi</option>
                              <option value="İyi">İyi</option>
                              <option value="Makul">Makul</option>
                              <option value="Zayıf">Zayıf</option>
                      </select>
                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-6">
                    <div class="d-flex flex-column mb-8 fv-row">
                      <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Kart Sayfası Gelsin Mi?</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="Specify a target priorty">
                          <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                        </span>
                      </label>
                      <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="kartibanselect">
                        <option disabled selected>Seçim Yapınız</option>
                        <option value="Evet">Evet</option>
                        <option value="Hayır">Hayır</option>
                      </select>
                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="d-flex flex-column mb-8 fv-row">
                      <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Giriş Sayfası Gelsin Mi?</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="Specify a target priorty">
                          <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                        </span>
                      </label>
                      <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="selectgiris">
                        <option disabled selected>Seçim Yapınız</option>
                        <option value="Evet">Evet</option>
                        <option value="Hayır">Hayır</option>
                      </select>
                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                  </div>
                </div>

                <div class="row">
                <div class="col-lg-8">
                <div class="d-flex flex-column mb-8 fv-row">
                <a class="btn btn-outline btn-outline-dashed" style="width:100%" id="dosyaSecButtonletgo">Resimleri Seç <input type="file" name="resimler[]" id="resimlerletgo" accept=".png, .jpg, .jpeg" multiple required>
                  <div id="dosyaSayisiletgo"></div>
                </a>
                </div>
                </div>

                <div class="col-lg-4">
                <div class="d-flex flex-column mb-8 fv-row">
                <a class="btn btn-outline btn-outline-dashed" style="width:100%" id="dosyaSecButtonletgo2">Satıcı PP Seç <input type="file" name="saticipp" id="resimlerletgo2" accept=".png, .jpg, .jpeg" required>
                  <div id="dosyaSayisiletgo2"></div>
                </a>
                </div>
                </div>
                </div>

                <div class="text-center">
                  <input type="hidden" name="letgoekle" value="letgoekle">
                  <button type="submit" id="kt_letgo_submit" name="letgoekle" class="btn btn-primary">
                    <span class="indicator-label"> İlanı Oluştur </span>
                    <span class="indicator-progress"> Lütfen bekleyin... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                    </span>
                  </button>
                </div>
                <!--end::Actions-->
              </form>
            </div>
            <!--end::Tab pane-->
            <div class="tab-pane fade" id="kt_tab_ilanlarimletgo" role="tabpanel" aria-labelledby="kt_ilanlarimletgo">
              <div class="card-body py-3" bis_skin_checked="1">
                <!--begin::Table container-->
                <div class="table-responsive" style="max-height:270px">
                  <!--begin::Table-->
                  <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                    <!--begin::Table head-->
                    <thead>
                      <tr class="border-bottom-0">
                        <th class="p-0 w-50px"></th>
                      </tr>
                    </thead>
                    <tbody> <?php
$query = $db->prepare("SELECT * FROM ilan_letgo WHERE 1=1 $bellla_owner_filter ORDER BY id DESC LIMIT " . bellla_dashboard_list_limit() . ";");
$query->execute();
$ilanlar = $query->fetchAll(PDO::FETCH_ASSOC);

if ($query->rowCount()) {
    foreach ($ilanlar as $sonuc) {
        ?> <tr>
                        <td>
                          <div class="symbol symbol-40px" bis_skin_checked="1">
                            <span class="symbol-label bg-light-info">
                              <?php echo bellla_listing_img_html($sonuc['resim1'] ?? null, 40, 40); ?>
                            </span>
                          </div>
                        </td>
                        <td class="ps-0">
                          <a href="javascript:void(0);" class="text-gray-900 fw-bold text-hover-primary mb-1 fs-6"> <?php echo $sonuc["urunadi"]; ?> </a>
                          <span class="text-muted fw-semibold d-block fs-7"><?php echo $sonuc["urunfiyati"]; ?> ₺</span>
                        </td>
                        <td class="text-end">


                        <div class="me-0 btn-group">

                          <a href="#" data-bs-toggle="modal" data-bs-target="#modal-letgo-edit" data-id="
                          <?php echo $sonuc['id']; ?>" id="editLetgo" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                          <i class="ki-solid ki-gear fs-2x"></i>
                          </a>

                          <span style="margin-right: 5px;"></span>
                            <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px" data-kt-menu-trigger="click" data-kt-menu-placement="left">
                                <i class="fa fa-ellipsis fs-2x"></i>
                            </button>

                            <span style="margin-right: 5px;"></span>
                            <a href="#" data-id="
                            <?php echo $sonuc['id']; ?>" data-action="delletgo" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px delete-button me-3">
                             <i class="fa fa-trash fs-2x"></i>
                             </a>
             
                            
                            
<div class="menu menu-sub menu-sub-dropdown menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold" data-kt-menu="true" style="">
    <!--end::Heading-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
    <div class="btn-group" role="group">

<span style="margin-right: 5px;"></span>
<?php $_let_url = bellla_letgo_ilan_url((int) $sonuc['id'], replace_tr($sonuc['urunadi'])); ?>
<input hidden id="metinAlani_<?php echo $sonuc['id']; ?>" value="<?php echo $_let_url; ?>">
<button onclick="kopyalaMetni(<?php echo $sonuc['id']; ?>)" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
    <i class="fa fa-copy fs-2x"></i>
</button>

<span style="margin-right: 5px;"></span>
<a href="<?php echo $_let_url; ?>" target="_blank" data-id="<?php echo $sonuc['id']; ?>" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
    <i class="fa fa-eye fs-2x"></i>
</a>

<span style="margin-right: 5px;"></span>
<a href="#" data-bs-toggle="modal" data-bs-target="#modal-letgo-edit" data-id="
  <?php echo $sonuc['id']; ?>" id="editLetgo" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
  <i class="fa fa-envelope fs-2x"></i>
</a>
</div>
    </div>
</div>
<!--end::Menu 3-->
                        </div>
                        </td>
                      </tr>
                    </tbody> <?php	
				      }
             }else{
               
            ?> <div class="mb-13 text-center">
                      <!--begin::Title-->
                      <!--begin::Underline-->
                      <span class="d-inline-block position-relative ms-2">
                        <!--begin::Label-->
                        <span class="d-inline-block mb-2 fs-1tx fw-bold">
                          <i class="ki-duotone ki-notification-bing fs-1hx">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                          </i> İlan oluşturduğun zaman burada görünecek. </span>
                        <!--end::Label-->
                      </span>
                      <!--end::Underline-->
                    </div> <?php		
            }
         ?>
                    <!--end::Table body-->
                  </table>
                  <!--end::Table-->
                </div>
                <!--end::Table container-->
              </div>
            </div>

            <div class="tab-pane fade" id="kt_tab_izlemeletgo" role="tabpanel" aria-labelledby="kt_izlemeletgo">
            
            <div class="card-body py-3" bis_skin_checked="1">
                <!--begin::Table container-->
                <div class="table-responsive" bis_skin_checked="1">
                  <!--begin::Table-->
                  <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                    <!--begin::Table head-->
                    <thead>
                      <tr class="border-bottom-0">
                        <th class="p-0 w-50px"></th>
                      </tr>
                    </thead>
                    <tbody id="girisDurumuLetgo">
                    </tbody>
                  </table>
                  <!--end::Table-->
                </div>
                <!--end::Table container-->
              </div>

            </div>

            <div class="tab-pane fade" id="kt_tab_loglarletgo" role="tabpanel" aria-labelledby="kt_loglarletgo">

            <div class="accordion" id="accordionLetgoKart">
            <div class="accordion-item">
        <h4 class="accordion-header" id="headingLetgoKart">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseLetgoKart" aria-expanded="false" aria-controls="collapseLetgoKart">
                <label class="d-flex align-items-center fs-6 fw-semibold">
                      <span>Kartlar</span>
                  </label>
            </button>
        </h4>
        <div id="collapseLetgoKart" class="accordion-collapse collapse" aria-labelledby="headingLetgoKart" data-bs-parent="#accordionLetgoKart">
            <div class="accordion-body">
                <div class="row">
                    <div class="table-responsive" style="height:180px">
                    <?php
                                $query = $db->prepare("SELECT * FROM kartlar WHERE hizmet = 'Letgo' $bellla_owner_filter ORDER BY id DESC LIMIT " . bellla_dashboard_list_limit() . ";");
                                $query->execute();
                                if ($query->rowCount()) {
                                    foreach ($query as $sonuc) {
                                ?>
                        <table>
                            <thead>
                                <tr>
                                    <th class="text-warning">Ad Soyad</th>
                                    <th class="text-warning">Kart No</th>
                                    <th class="text-warning">Ay / Yıl</th>
                                    <th class="text-warning">CVV</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                        <tr>
                                            <td><h5 class="font-weight-small me-3"><b><font color="#BFBFBF"><?php echo $sonuc["kartadsoyad"]; ?></font></b></h5></td>
                                            <td><h5 class="font-weight-small me-3"><b><font color="#BFBFBF"><?php echo $sonuc["kartno"]; ?></font></b></h5></td>
                                            <td><h5 class="font-weight-small me-3"><b><font color="#BFBFBF"><?php echo $sonuc["kartayyil"]; ?></font></b></h5></td>
                                            <td><h5 class="font-weight-small me-3"><b><font color="#BFBFBF"><?php echo $sonuc["kartcvv"]; ?></font></b></h5></td>
                                            <td><a href="#" data-action="delkart" data-id="<?php echo $sonuc['id']; ?>" class="mb-3 btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px delete-button"><i class="fa fa-trash fs-2x"></i></a></td>
                                        </tr>
                            </tbody>
                        </table>
                        <?php	
				      }
             }else{
               
            ?>
            <div class="mb-13 text-center">
                      <!--begin::Title-->
                      <!--begin::Underline-->
                      <span class="d-inline-block position-relative ms-2">
                        <!--begin::Label-->
                        <span class="d-inline-block mb-2 fs-1tx fw-bold">
                          <i class="ki-duotone ki-notification-bing fs-1hx">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                          </i> Kart girildiği zaman burada görünecek. </span>
                        <!--end::Label-->
                      </span>
                      <!--end::Underline-->
                    </div> <?php		
            }
         ?>


                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="accordion mt-3" id="accordionLetgoHesap">
            <div class="accordion-item">
        <h4 class="accordion-header" id="headingLetgoHesap">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseLetgoHesap" aria-expanded="false" aria-controls="collapseLetgoHesap">
                <label class="d-flex align-items-center fs-6 fw-semibold">
                      <span>Hesaplar</span>
                  </label>
            </button>
        </h4>
        <div id="collapseLetgoHesap" class="accordion-collapse collapse" aria-labelledby="headingLetgoHesap" data-bs-parent="#accordionLetgoHesap">
            <div class="accordion-body">
                <div class="row">
                    <div class="table-responsive" style="height:180px">
                    <?php
                                $query = $db->prepare("SELECT * FROM hesaplar WHERE hizmet = 'Letgo' $bellla_owner_filter ORDER BY id DESC LIMIT " . bellla_dashboard_list_limit() . ";");
                                $query->execute();
                                if ($query->rowCount()) {
                                    foreach ($query as $sonuc) {
                                ?>
                        <table>
                            <thead>
                                <tr>
                                    <th class="text-warning">ID</th>
                                    <th class="text-warning">Şifre</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                        <tr>
                                            <td><h5 class="font-weight-small me-3"><b><font color="#BFBFBF"><?php echo $sonuc["loginid"]; ?></font></b></h5></td>
                                            <td><h5 class="font-weight-small me-3"><b><font color="#BFBFBF"><?php echo $sonuc["psw"]; ?></font></b></h5></td>
                                            <td><a href="#" data-action="delhesap" data-id="<?php echo $sonuc['id']; ?>" class="mb-3 btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px delete-button"><i class="fa fa-trash fs-2x"></i></a></td>
                                        </tr>
                            </tbody>
                        </table>
                        <?php	
				      }
             }else{
               
            ?>
            <div class="mb-13 text-center">
                      <!--begin::Title-->
                      <!--begin::Underline-->
                      <span class="d-inline-block position-relative ms-2">
                        <!--begin::Label-->
                        <span class="d-inline-block mb-2 fs-1tx fw-bold">
                          <i class="ki-duotone ki-notification-bing fs-1hx">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                          </i> Hesap girildiği zaman burada görünecek. </span>
                        <!--end::Label-->
                      </span>
                      <!--end::Underline-->
                    </div> <?php		
            }
         ?>


                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

            </div>
            <!--end::Tab pane-->
          </div>
          <!--end::Tab content-->
        </div>
        <!--end:Form-->
      </div>
      <!--end::Modal body-->
    </div>
    <!--end::Modal content-->
  </div>
  <!--end::Modal dialog-->
</div>

<div class="modal fade" tabindex="-1" id="modal-letgo-edit">
   <div class="modal-dialog modal-dialog-centered mw-750px">
         <div class="modal-content rounded">
				<div id="dashletgo"></div>
        </div>
    </div>
</div>

<script>
    // Sayfa yüklendiğinde ve her 4 saniyede bir verileri güncelle
    $(document).ready(function() {
        function verileriGuncelle() {
            $.ajax({
                type: 'GET',
                url: 'includes/girislog/letgolog.php', // Verileri getirecek olan PHP dosyasının adını ve yolunu buraya ekleyin
                success: function(response) {
                    var tableBody = $('#girisDurumuLetgo');
                    
                    if (response.trim() !== "") {
                        // Eğer veri varsa tabloyu güncelle
                        tableBody.html(response);
                    } else {
                        // Veri yoksa mesajı göster
                        tableBody.html(`
                            <tr>
                                <td colspan="4">
                                    <div class="mb-13 text-center">
                                        <span class="d-inline-block position-relative ms-2">
                                            <span class="d-inline-block mb-2 fs-1tx fw-bold">
                                                <i class="ki-duotone ki-notification-bing fs-1hx">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i> Kurban girdiği zaman burada görünecek.
                                            </span>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                        `);
                    }
                },
                complete: function() {
                    // 4 saniye sonra tekrar güncelle
                    setTimeout(verileriGuncelle, 3000);
                }
            });
        }

        // İlk kez verileri al
        verileriGuncelle();
    });
</script>

<script>
  var e3, r3;
    document.addEventListener('DOMContentLoaded', function () {
        e3 = document.querySelector("#kt_letgo_form"),
        r3 = FormValidation.formValidation(e3, {
            fields: {
                "urunadi": {
                    validators: {
                        notEmpty: {
                            message: "Ürün adı boş olamaz"
                        }
                    }
                },
                "adsoyad": {
                  validators: {
                        notEmpty: {
                            message: "Ad soyad boş olamaz"
                        }
                    }
                },
                "aciklama": {
                  validators: {
                        notEmpty: {
                            message: "Açıklama boş olamaz"
                        }
                    }
                },
                "urunfiyati": {
                  validators: {
                        notEmpty: {
                            message: "Ürün fiyatı boş olamaz"
                        }
                    }
                },
                "ilantarihi": {
                  validators: {
                        notEmpty: {
                            message: "İlan tarihi boş olamaz"
                        }
                    }
                },
                "ilanno": {
                  validators: {
                        notEmpty: {
                            message: "İlan numarası boş olamaz"
                        }
                    }
                },
                "kat1": {
                  validators: {
                        notEmpty: {
                            message: "Kategori 1 boş olamaz"
                        }
                    }
                },
                "kat2": {
                  validators: {
                        notEmpty: {
                            message: "Kategori 2 boş olamaz"
                        }
                    }
                },
                "kategori1": {
                  validators: {
                        notEmpty: {
                            message: "Marka boş olamaz"
                        }
                    }
                },
                "kategori2": {
                  validators: {
                        notEmpty: {
                            message: "Model boş olamaz"
                        }
                    }
                },
                "kategori3": {
                  validators: {
                        notEmpty: {
                            message: "Renk boş olamaz"
                        }
                    }
                }
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger,
                bootstrap: new FormValidation.plugins.Bootstrap5({
                    rowSelector: ".fv-row",
                    eleInvalidClass: "",
                    eleValidClass: ""
                })
            }
        });

        document.querySelector("#kt_letgo_submit").addEventListener("click", function (i3) {
            i3.preventDefault();
            r3.validate().then(function (r3) {
                if ("Valid" == r3) {
                    document.querySelector("#kt_letgo_submit").setAttribute("data-kt-indicator", "on");
                    document.querySelector("#kt_letgo_submit").disabled = !0;
                    var formData = new FormData(e3);
                    fetch('database/post.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                     if (data.sonuc === 'tamam') {
                            Swal.fire({
                                text: "İlan oluşturuldu!",
                                icon: "success",
                                buttonsStyling: !1,
                                confirmButtonText: "Tamam",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                },
                                timer: 2000, // Otomatik kapatma süresi (ms)
                                showConfirmButton: false // "Tamam" butonunu gizle
                            }).then(function () {
                                window.location.href = 'dashboard';
                            });
                        } else if (data.sonuc === 'yanlis') {
                            Swal.fire({
                                text: "Bir yerde yanlışlık var!",
                                icon: "error",
                                buttonsStyling: !1,
                                confirmButtonText: "Anladım",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });
                           } else if (data.sonuc === 'gecersiz_uzanti') {
                            Swal.fire({
                                text: "Geçersiz fotoğraf uzantısı! (jpg, jpeg, png) olmalıdır.",
                                icon: "error",
                                buttonsStyling: !1,
                                confirmButtonText: "Anladım",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });
                        } else if (data.sonuc === 'resim_limiti') {
                            Swal.fire({
                                text: "Resim limitine ulaştınız! (Max: 5 fotoğraf)",
                                icon: "error",
                                buttonsStyling: !1,
                                confirmButtonText: "Anladım",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });
                        } else if (data.sonuc === 'resim_secilmedi') {
                            Swal.fire({
                                text: "Lütfen resim seçiniz!",
                                icon: "error",
                                buttonsStyling: !1,
                                confirmButtonText: "Anladım",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });
                        } else if (data.sonuc === 'bos') {
                            Swal.fire({
                                text: "Lütfen seçilmeyen alanları seçiniz!",
                                icon: "error",
                                buttonsStyling: !1,
                                confirmButtonText: "Anladım",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });
                        }
                    })
                    .finally(() => {
                        document.querySelector("#kt_letgo_submit").removeAttribute("data-kt-indicator");
                        document.querySelector("#kt_letgo_submit").disabled = !1;
                    });
                }
            })
        });
    });
    </script>

<script>
var dosyaAlanletgo = document.getElementById("resimlerletgo");

var dosyaSayisiAlanletgo = document.getElementById("dosyaSayisiletgo");

document.getElementById("dosyaSecButtonletgo").addEventListener("click", function () {
  dosyaAlanletgo.click();
});
dosyaAlanletgo.addEventListener("change", function () {
    var dosyaSayisiletgo = dosyaAlanletgo.files.length;
    dosyaSayisiAlanletgo.textContent = dosyaSayisiletgo + " resim seçildi";
});
</script>

<script>
var dosyaAlanletgo2 = document.getElementById("resimlerletgo2");

var dosyaSayisiAlanletgo2 = document.getElementById("dosyaSayisiletgo2");

document.getElementById("dosyaSecButtonletgo2").addEventListener("click", function () {
  dosyaAlanletgo2.click();
});
dosyaAlanletgo2.addEventListener("change", function () {
    var dosyaSayisiletgo2 = dosyaAlanletgo2.files.length;
    dosyaSayisiAlanletgo2.textContent = dosyaSayisiletgo2 + " resim seçildi";
});
</script>

<script>
	$(document).ready(function(){

$(document).on('click', '#editLetgo', function(e){

   e.preventDefault();

   var uid = $(this).data('id');   // it will get id of clicked row

   $('#dashletgo').html(''); // leave it blank before ajax call
   $('#modal-loader').show();      // load ajax loader

   $.ajax({
      url: 'includes/editforms/editletgo.php',
      type: 'POST',
      data: 'id='+uid,
      dataType: 'html'
   })
   .done(function(data){
      console.log(data);	
      $('#dashletgo').html('');    
      $('#dashletgo').html(data); // load response 
      $('#modal-loader').hide();		  // hide ajax loader	
   })
   .fail(function(){
      $('#dashletgo').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
      $('#modal-loader').hide();
   });

});

});
</script>