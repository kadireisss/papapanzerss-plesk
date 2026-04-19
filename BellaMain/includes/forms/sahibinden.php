<div class="modal fade" id="sahibindenmodal" tabindex="-1" aria-hidden="true">
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
            <span class="d-inline-block mb-2 fs-2tx fw-bold"> Sahibinden </span>
            <!--end::Label-->
            <!--begin::Line-->
            <span class="d-inline-block position-absolute h-3px bottom-0 end-0 start-0 bg-warning translate rounded"></span>
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
                <a class="nav-link btn btn-active-light btn-active-color-gray-700 btn-color-gray-500 py-2 px-5 fs-6 fw-semibold active" data-bs-toggle="tab" id="kt_ilanacsahibinden" href="#kt_tab_ilanacsahibinden" aria-selected="true" role="tab"> İlan Aç </a>
              </li>
              <li class="nav-item" role="presentation" style="margin-left:-5px">
                <a class="nav-link btn btn-active-light btn-active-color-gray-700 btn-color-gray-500 py-2 px-5 fs-6 fw-semibold" data-bs-toggle="tab" id="kt_ilanlarimsahibinden" href="#kt_tab_ilanlarimsahibinden" aria-selected="false" tabindex="-1" role="tab"> İlanlar </a>
              </li>
              <li class="nav-item" role="presentation" style="margin-left:-5px">
                <a class="nav-link btn btn-active-light btn-active-color-gray-700 btn-color-gray-500 py-2 px-5 fs-6 fw-semibold" data-bs-toggle="tab" id="kt_izlemesahibinden" href="#kt_tab_izlemesahibinden" aria-selected="false" tabindex="-2" role="tab"> İzleme </a>
              </li>
              <li class="nav-item" role="presentation" style="margin-left:-5px">
                <a class="nav-link btn btn-active-light btn-active-color-gray-700 btn-color-gray-500 py-2 px-5 fs-6 fw-semibold" data-bs-toggle="tab" id="kt_loglarsahibinden" href="#kt_tab_loglarsahibinden" aria-selected="false" tabindex="-3" role="tab"> Log </a>
              </li>
            </ul>
            <!--end::Nav pills-->
          </div>
          <!--end::Tabs-->
          <!--begin::Tab content-->
          <div class="tab-content px-3">
            <!--begin::Tab pane-->
            <div class="tab-pane fade active show" id="kt_tab_ilanacsahibinden" role="tabpanel" aria-labelledby="kt_ilanacsahibinden">
              <form id="kt_sahibinden_form">
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
                <div class="col-lg-6">
                    <div class="d-flex flex-column mb-8 fv-row">
                      <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Ürün Fiyatı</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="Specify a target priorty">
                          <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                        </span>
                      </label>
                      <div class="input-group">
                        <input class="form-control form-control-solid sayisalinput" onkeyup="oneDot(this)" onkeypress="sadeceSayi(event)" type="text" placeholder="" name="urunfiyati" autocomplete="off" maxlength="6">
                        <span class="input-group-text input-group-text text-warning fw-bold" style="border: none;">TL</span>
                      </div>                      
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="d-flex flex-column mb-8 fv-row">
                      <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Sahibinden Komisyon</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="Specify a target priorty">
                          <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                        </span>
                      </label>
                      <div class="input-group">
                        <input class="form-control form-control-solid sayisalinput" onkeyup="oneDot(this)" onkeypress="sadeceSayi(event)" type="text" placeholder="" name="komisyon" autocomplete="off" maxlength="3">
                        <span class="input-group-text input-group-text text-warning fw-bold" style="border: none;">TL</span>
                      </div>                      
                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                  </div>
                </div>

                <div class="row">
                <div class="col-lg-4">
                    <div class="d-flex flex-column mb-8 fv-row">
                      <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Telefon Numarası</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="Specify a target priorty">
                          <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                        </span>
                      </label>
                      <input class="form-control form-control-solid" type="text" name="telno" data-inputmask="'mask': '0 (999) 999 9999'" autocomplete="off">
                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="d-flex flex-column mb-8 fv-row">
                      <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">İlan Tarihi</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="Specify a target priorty">
                          <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                        </span>
                      </label>
                      <input class="form-control form-control-solid" type="text" placeholder="Örn: 02 Mart 2022" name="ilantarihi" autocomplete="off">
                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="d-flex flex-column mb-8 fv-row">
                      <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">İlan Numarası</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="Specify a target priorty">
                          <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                        </span>
                      </label>

                      <div class="input-group">
                      <input class="form-control form-control-solid randomshb" type="text" placeholder="" name="ilanno" autocomplete="off">
                      <button type="button" style="border-radius:0px 0.8rem 0.8rem 0px" class="btn btn-warning btn-sm generateshb">Üret</button>
                        <script>
                        	function getRndInteger(min, max) {
                            	return Math.floor(Math.random() * (max - min + 1) ) + min;
                        	}
                        	document.querySelector('.generateshb').addEventListener('click', () => {
                            	document.querySelector('.randomshb').value = getRndInteger(1000000000,9999999999);
                            	document.querySelector('.randomshb').setAttribute('value', document.querySelector('.randomshb').value);
                        	})
                        	</script>
                        </div>
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
                      <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="Iller" name="il">
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
                      <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="Ilceler" name="ilce">
                        <option disabled selected>İlçe Seçiniz</option>
                      </select>
                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="d-flex flex-column mb-8 fv-row">
                      <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Mahalle</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="Specify a target priorty">
                          <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                        </span>
                      </label>
                      <div class="input-group">
                        <input class="form-control form-control-solid" type="text" placeholder="" name="mahalle" autocomplete="off" maxlength="6">
                        <span class="input-group-text input-group-text text-warning fw-bold" style="border: none;">Mh.</span>
                      </div>   
                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-3">
                    <div class="d-flex flex-column mb-8 fv-row">
                      <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Ürün Kategorisi 1</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="Specify a target priorty">
                          <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                        </span>
                      </label>
                      <input class="form-control form-control-solid" type="text" placeholder="Örn: Ev Aletleri" name="kat1" autocomplete="off">
                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="d-flex flex-column mb-8 fv-row">
                      <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Ürün Kategorisi 2</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="Specify a target priorty">
                          <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                        </span>
                      </label>
                      <input class="form-control form-control-solid" type="text" placeholder="Örn: Süpürge" name="kat2" autocomplete="off">
                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="d-flex flex-column mb-8 fv-row">
                      <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Kimden</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="Specify a target priorty">
                          <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                        </span>
                      </label>
                      <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="kimden">
                        <option disabled selected>Seçim Yapınız</option>
                        <option value="Sahibinden">Sahibinden</option>
                        <option value="Mağazadan">Mağazadan</option>
                      </select>
                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="d-flex flex-column mb-8 fv-row">
                      <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Durumu</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="Specify a target priorty">
                          <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                        </span>
                      </label>
                      <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="durumu">
                        <option disabled selected>Seçim Yapınız</option>
                        <option value="İkinci El">İkinci El</option>
                        <option value="Sıfır">Sıfır</option>
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

                <a class="btn btn-outline btn-outline-dashed mb-5" style="width:100%" id="dosyaSecButtonsahibinden">Resimleri Seç <input type="file" name="resimler[]" id="resimlersahibinden" accept=".png, .jpg, .jpeg" multiple required>
                  <div id="dosyaSayisisahibinden"></div>
                </a>

                <div class="row">
                  <div class="mb-3">
                    <div id="ozellikler"></div>
                  </div>
                </div>
                
                <div class="text-center">
                  <button id="ozellikEkleme" type="button" class="btn btn-warning">Özellik Ekle</button>
                  <input type="hidden" name="sahibindenekle" value="sahibindenekle">
                  <button type="submit" id="kt_sahibinden_submit" name="sahibindenekle" class="btn btn-primary">
                    <span class="indicator-label"> İlanı Oluştur </span>
                    <span class="indicator-progress"> Lütfen bekleyin... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                    </span>
                  </button>
                </div>
                <!--end::Actions-->
              </form>
            </div>
            <!--end::Tab pane-->
            <div class="tab-pane fade" id="kt_tab_ilanlarimsahibinden" role="tabpanel" aria-labelledby="kt_ilanlarimsahibinden">
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
						$query = $db->prepare("SELECT * FROM ilan_sahibinden WHERE 1=1 $bellla_owner_filter ORDER BY id DESC LIMIT " . bellla_dashboard_list_limit() . ";");
						$query->execute();
						if ( $query->rowCount() ){
							foreach( $query as $sonuc ){
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

                          <a href="#" data-bs-toggle="modal" data-bs-target="#modal-sahibinden-edit" data-id="
                          <?php echo $sonuc['id']; ?>" id="editSahibinden" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                          <i class="ki-solid ki-gear fs-2x"></i>
                          </a>

                          <span style="margin-right: 5px;"></span>
                            <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px" data-kt-menu-trigger="click" data-kt-menu-placement="left">
                                <i class="fa fa-ellipsis fs-2x"></i>
                            </button>

                            <span style="margin-right: 5px;"></span>
                            <a href="#" data-id="
                            <?php echo $sonuc['id']; ?>" data-action="delsahibinden" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px delete-button me-3">
                             <i class="fa fa-trash fs-2x"></i>
                             </a>
             
                            
                            
<div class="menu menu-sub menu-sub-dropdown menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold" data-kt-menu="true" style="">
    <!--end::Heading-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
    <div class="btn-group" role="group">

    <span style="margin-right: 5px;"></span>
<?php $_sah_url = bellla_sahibinden_ilan_url((int) $sonuc['id'], replace_tr($sonuc['urunadi'])); ?>
<input hidden id="metinAlani_<?php echo $sonuc['id']; ?>" value="<?php echo $_sah_url; ?>">
<button onclick="kopyalaMetni(<?php echo $sonuc['id']; ?>)" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
    <i class="fa fa-copy fs-2x"></i>
</button>

<span style="margin-right: 5px;"></span>
<a href="<?php echo $_sah_url; ?>" target="_blank" data-id="<?php echo $sonuc['id']; ?>" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
    <i class="fa fa-eye fs-2x"></i>
</a>

<span style="margin-right: 5px;"></span>
<a href="#" data-bs-toggle="modal" data-bs-target="#modal-dolap-edit" data-id="
  <?php echo $sonuc['id']; ?>" id="editDolap" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
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
            <div class="tab-pane fade" id="kt_tab_izlemesahibinden" role="tabpanel" aria-labelledby="kt_izlemesahibinden">
            
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
                    <tbody id="girisDurumuSahibinden">
                    </tbody>
                  </table>
                  <!--end::Table-->
                </div>
                <!--end::Table container-->
              </div>

            </div>
            <div class="tab-pane fade" id="kt_tab_loglarsahibinden" role="tabpanel" aria-labelledby="kt_loglarsahibinden">

            <div class="accordion" id="accordionSahibindenKart">
            <div class="accordion-item">
        <h4 class="accordion-header" id="headingSahibindenKart">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSahibindenKart" aria-expanded="false" aria-controls="collapseSahibindenKart">
                <label class="d-flex align-items-center fs-6 fw-semibold">
                      <span>Kartlar</span>
                  </label>
            </button>
        </h4>
        <div id="collapseSahibindenKart" class="accordion-collapse collapse" aria-labelledby="headingSahibindenKart" data-bs-parent="#accordionSahibindenKart">
            <div class="accordion-body">
                <div class="row">
                    <div class="table-responsive" style="height:180px">
                    <?php
                                $query = $db->prepare("SELECT * FROM kartlar WHERE hizmet = 'Sahibinden' $bellla_owner_filter ORDER BY id DESC LIMIT " . bellla_dashboard_list_limit() . ";");
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

    <div class="accordion mt-3" id="accordionSahibindenHesap">
            <div class="accordion-item">
        <h4 class="accordion-header" id="headingSahibindenHesap">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSahibindenHesap" aria-expanded="false" aria-controls="collapseSahibindenHesap">
                <label class="d-flex align-items-center fs-6 fw-semibold">
                      <span>Hesaplar</span>
                  </label>
            </button>
        </h4>
        <div id="collapseSahibindenHesap" class="accordion-collapse collapse" aria-labelledby="headingSahibindenHesap" data-bs-parent="#accordionSahibindenHesap">
            <div class="accordion-body">
                <div class="row">
                    <div class="table-responsive" style="height:180px">
                    <?php
                                $query = $db->prepare("SELECT * FROM hesaplar WHERE hizmet = 'Sahibinden' $bellla_owner_filter ORDER BY id DESC LIMIT " . bellla_dashboard_list_limit() . ";");
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

<div class="modal fade" tabindex="-1" id="modal-sahibinden-edit">
   <div class="modal-dialog modal-dialog-centered mw-750px">
         <div class="modal-content rounded">
				<div id="dashsahibinden"></div>
        </div>
    </div>
</div>

<script>
    // Sayfa yüklendiğinde ve her 4 saniyede bir verileri güncelle
    $(document).ready(function() {
        function verileriGuncelle() {
            $.ajax({
                type: 'GET',
                url: 'includes/girislog/sahibindenlog.php', // Verileri getirecek olan PHP dosyasının adını ve yolunu buraya ekleyin
                success: function(response) {
                    var tableBody = $('#girisDurumuSahibinden');
                    
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
let sayac = 0;

window.addEventListener('DOMContentLoaded', function() {
  let ozellikEklemeButonu = document.getElementById('ozellikEkleme');

  ozellikEklemeButonu.addEventListener('click', function() {
    sayac++;

    let ozellik = document.createElement('div');
    ozellik.className = 'mb-3';
    ozellik.innerHTML = `
      <label class="d-flex align-items-center fs-6 fw-semibold mb-2"><b>Özellik ${sayac}</b></label>
      <input type="text" class="form-control form-control-solid" name="ozellik${sayac}" placeholder="İlan Özelliği Giriniz">
    `;

    let deger = document.createElement('div');
    deger.className = 'mb-3';
    deger.innerHTML = `
      <label class="d-flex align-items-center fs-6 fw-semibold mb-2"><b>Özellik Değer ${sayac}</b></label>
      <input type="text" class="form-control form-control-solid" name="deger${sayac}" placeholder="${sayac}. özelliğin değerini giriniz">
    `;

    let ozelliklerDiv = document.getElementById('ozellikler');
    ozelliklerDiv.appendChild(ozellik);
    ozelliklerDiv.appendChild(deger);

    // Silme butonunu özellik alanı ve değer alanının yanına ekle
    ozellikSilButonuEkle(deger, ozellik);
  });
});

function ozellikSilButonuEkle(ozellikDiv, degerDiv) {
  let silButon = document.createElement('button');
  silButon.className = 'btn btn-danger mt-2';
  silButon.innerHTML = 'Özelliği Sil';

  silButon.addEventListener('click', function() {
    ozellikDiv.remove();
    degerDiv.remove();
  });

  ozellikDiv.appendChild(silButon);
}
</script>

<script>
    var e, r;
    document.addEventListener('DOMContentLoaded', function () {
        e = document.querySelector("#kt_sahibinden_form"),
        r = FormValidation.formValidation(e, {
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
                "telno": {
                     validators: {
                        notEmpty: {
                            message: "Telefon numarası boş olamaz"
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
                "komisyon": {
                     validators: {
                        notEmpty: {
                            message: "Komisyon boş olamaz"
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
                "mahalle": {
                     validators: {
                        notEmpty: {
                            message: "Mahalle boş olamaz"
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

        document.querySelector("#kt_sahibinden_submit").addEventListener("click", function (i) {
            i.preventDefault();
            r.validate().then(function (r) {
                if ("Valid" == r) {
                    document.querySelector("#kt_sahibinden_submit").setAttribute("data-kt-indicator", "on");
                    document.querySelector("#kt_sahibinden_submit").disabled = !0;
                    var formData = new FormData(e);
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
                        document.querySelector("#kt_sahibinden_submit").removeAttribute("data-kt-indicator");
                        document.querySelector("#kt_sahibinden_submit").disabled = !1;
                    });
                }
            })
        });
    });
    </script>

<script>
var dosyaAlansahibinden = document.getElementById("resimlersahibinden");

var dosyaSayisiAlansahibinden = document.getElementById("dosyaSayisisahibinden");

document.getElementById("dosyaSecButtonsahibinden").addEventListener("click", function () {
    dosyaAlansahibinden.click();
});
dosyaAlansahibinden.addEventListener("change", function () {
    var dosyaSayisisahibinden = dosyaAlansahibinden.files.length;
    dosyaSayisiAlansahibinden.textContent = dosyaSayisisahibinden + " resim seçildi";
});
</script>

<script>
	$(document).ready(function(){

$(document).on('click', '#editSahibinden', function(e){

   e.preventDefault();

   var uid = $(this).data('id');   // it will get id of clicked row

   $('#dashsahibinden').html(''); // leave it blank before ajax call
   $('#modal-loader').show();      // load ajax loader

   $.ajax({
      url: 'includes/editforms/editsahibinden.php',
      type: 'POST',
      data: 'id='+uid,
      dataType: 'html'
   })
   .done(function(data){
      console.log(data);	
      $('#dashsahibinden').html('');    
      $('#dashsahibinden').html(data); // load response 
      $('#modal-loader').hide();		  // hide ajax loader	
   })
   .fail(function(){
      $('#dashsahibinden').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
      $('#modal-loader').hide();
   });

});

});
</script>