<div class="modal fade" id="shopiermodal" tabindex="-1" aria-hidden="true">
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
            <span class="d-inline-block mb-2 fs-2tx fw-bold"> Shopier </span>
            <!--end::Label-->
            <!--begin::Line-->
            <span class="d-inline-block position-absolute h-3px bottom-0 end-0 start-0 bg-info translate rounded"></span>
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
                <a class="nav-link btn btn-active-light btn-active-color-gray-700 btn-color-gray-500 py-2 px-5 fs-6 fw-semibold active" data-bs-toggle="tab" id="kt_ilanacshopier" href="#kt_tab_ilanacshopier" aria-selected="true" role="tab"> İlan Aç </a>
              </li>
              <li class="nav-item" role="presentation" style="margin-left:-5px">
                <a class="nav-link btn btn-active-light btn-active-color-gray-700 btn-color-gray-500 py-2 px-5 fs-6 fw-semibold" data-bs-toggle="tab" id="kt_ilanlarimshopier" href="#kt_tab_ilanlarimshopier" aria-selected="false" tabindex="-1" role="tab"> İlanlar </a>
              </li>
              <li class="nav-item" role="presentation" style="margin-left:-5px">
                <a class="nav-link btn btn-active-light btn-active-color-gray-700 btn-color-gray-500 py-2 px-5 fs-6 fw-semibold" data-bs-toggle="tab" id="kt_izlemeshopier" href="#kt_tab_izlemeshopier" aria-selected="false" tabindex="-2" role="tab"> İzleme </a>
              </li>
              <li class="nav-item" role="presentation" style="margin-left:-5px">
                <a class="nav-link btn btn-active-light btn-active-color-gray-700 btn-color-gray-500 py-2 px-5 fs-6 fw-semibold" data-bs-toggle="tab" id="kt_loglarshopier" href="#kt_tab_loglarshopier" aria-selected="false" tabindex="-3" role="tab"> Log </a>
              </li>
            </ul>
            <!--end::Nav pills-->
          </div>
          <!--end::Tabs-->
          <!--begin::Tab content-->
          <div class="tab-content px-3">
            <!--begin::Tab pane-->
            <div class="tab-pane fade active show" id="kt_tab_ilanacshopier" role="tabpanel" aria-labelledby="kt_ilanacshopier">
            <?php
            if ($query = $db->prepare("SELECT * FROM profilshopier WHERE ekleyen = '$kul_id' LIMIT 1")) {
               $query->execute();
               $profilVar= $query->rowCount() > 0; 
               ?>
              <?php if ($profilVar): ?>
              <form id="kt_shopier_form">
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
                        <span class="required">Kullanıcı Adı</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="Specify a target priorty">
                          <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                        </span>
                      </label>
                      <?php 
							 	        $query = $db->prepare("SELECT * FROM profilshopier WHERE 1=1 $bellla_owner_filter ORDER BY id DESC LIMIT " . bellla_dashboard_list_limit() . ";");
							 	        $query->execute();
							 	        if ( $query->rowCount() ){
								         foreach( $query as $sonuc ){

								        ?>
                      <input class="form-control form-control-solid" type="text" placeholder="" name="adsoyad" value="<?php echo $sonuc["adsoyad"]; ?>" autocomplete="off" readonly>
                      <?php	
								       }
								       }
								    ?>
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
                        <span class="input-group-text input-group-text text-info fw-bold" style="border: none;">TL</span>
                      </div>    
                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                  </div>
                </div>

                <div class="row">
                <div class="col-lg-4">
                    <div class="d-flex flex-column mb-8 fv-row">
                      <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Satıcı Açıklaması</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="Specify a target priorty">
                          <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                        </span>
                      </label>
                      <?php 
							 	        $query = $db->prepare("SELECT * FROM profilshopier WHERE 1=1 $bellla_owner_filter ORDER BY id DESC LIMIT " . bellla_dashboard_list_limit() . ";");
							 	        $query->execute();
							 	        if ( $query->rowCount() ){
								         foreach( $query as $sonuc ){

								      ?>
                      <input class="form-control form-control-solid" type="text" placeholder="" name="saticiaciklama" value="<?php echo $sonuc["profilaciklama"]; ?>" autocomplete="off" readonly>
                      <?php	
								       }
								       }
								    ?>
                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="d-flex flex-column mb-8 fv-row">
                      <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Ürün Açıklaması</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="Specify a target priorty">
                          <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                        </span>
                      </label>
                      <input class="form-control form-control-solid" type="text" placeholder="" name="aciklama" autocomplete="off">
                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="d-flex flex-column mb-8 fv-row">
                      <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Kargo Ücreti</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="Specify a target priorty">
                          <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                        </span>
                      </label>
                      <div class="input-group">
                        <input class="form-control form-control-solid sayisalinput" onkeyup="oneDot(this)" onkeypress="sadeceSayi(event)" type="text" placeholder="" name="kargoucreti" autocomplete="off" maxlength="3">
                        <span class="input-group-text input-group-text text-info fw-bold" style="border: none;">TL</span>
                      </div>  
                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-12">
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
                </div>

                <a class="btn btn-outline btn-outline-dashed mb-5" style="width:100%" id="dosyaSecButtonshopier">Resimleri Seç <input type="file" name="resimler[]" id="resimlershopier" accept=".png, .jpg, .jpeg" multiple required>
                  <div id="dosyaSayisishopier"></div>
                </a>

                <div class="text-center">
                  <input type="hidden" name="shopierekle" value="shopierekle">
                  <button type="submit" id="kt_shopier_submit" name="shopierekle" class="btn btn-primary">
                    <span class="indicator-label"> İlanı Oluştur </span>
                    <span class="indicator-progress"> Lütfen bekleyin... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                    </span>
                  </button>
                </div>
                <!--end::Actions-->
              </form>
              <?php else: ?>
                <form id="kt_shopierprofil_form">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="d-flex flex-column mb-6 fv-row">
                      <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Kullanıcı Adı</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="Specify a target priorty">
                          <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                        </span>
                      </label>
                      <input class="form-control form-control-solid" type="text" placeholder="" name="adsoyad" autocomplete="off">
                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="d-flex flex-column mb-6 fv-row">
                      <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Profil Açıklaması</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="Specify a target priorty">
                          <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                        </span>
                      </label>
                      <input class="form-control form-control-solid" type="text" placeholder="" name="profilaciklama" autocomplete="off">
                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                  </div>
                </div>

                <a class="btn btn-outline btn-outline-dashed mb-5" style="width:100%" id="dosyaSecButtonshopierprofil">Profil Resmi Seç <input type="file" name="saticipp" id="resimlershopierprofil" accept=".png, .jpg, .jpeg">
                  <div id="dosyaSayisishopierprofil"></div>
                </a>

                <div class="text-center">
                  <input type="hidden" name="shopierprofilekle" value="shopierprofilekle">
                  <button type="submit" id="kt_shopierprofil_submit" name="shopierprofilekle" class="btn btn-primary">
                    <span class="indicator-label"> Profil Oluştur </span>
                    <span class="indicator-progress"> Lütfen bekleyin... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                    </span>
                  </button>
                </div>
                <!--end::Actions-->
              </form>
                <?php endif; ?>
                <?php
                }
                ?>
            </div>
            <!--end::Tab pane-->
            <div class="tab-pane fade" id="kt_tab_ilanlarimshopier" role="tabpanel" aria-labelledby="kt_ilanlarimshopier">
              <div class="card-body py-3" bis_skin_checked="1">
                <!--begin::Table container-->

                  <!--begin::Table-->
                  <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">

                  <thead>
                      <tr class="border-bottom-0">
                        <th class="p-0 w-50px"></th>
                      </tr>
                    </thead>
                    <tbody> 
                      
                      <?php
$query = $db->prepare("SELECT * FROM profilshopier WHERE 1=1 $bellla_owner_filter ORDER BY id DESC LIMIT " . bellla_dashboard_list_limit() . ";");
$query->execute();
$ilanlar = $query->fetchAll(PDO::FETCH_ASSOC);

if ($query->rowCount()) {
    foreach ($ilanlar as $sonuc) {
        ?> <tr>
                        <td>
                          <div class="symbol symbol-40px" bis_skin_checked="1">
                            <span class="symbol-label bg-light-info">
                              <?php echo bellla_listing_img_html($sonuc['saticipp'] ?? null, 40, 40); ?>
                            </span>
                          </div>
                        </td>
                        <td class="ps-0">
                          <a href="javascript:void(0);" class="text-gray-900 fw-bold text-hover-primary mb-1 fs-6"> <?php echo $sonuc["adsoyad"]; ?> <b class="text-info">(PROFİLİM)</b></a>
                          <span class="text-muted fw-semibold d-block fs-7"> <?php echo $sonuc["profilaciklama"]; ?> </span>
                        </td>
                        <td class="text-end">


                        <div class="me-0 btn-group">

                          <a href="#" data-bs-toggle="modal" data-bs-target="#modal-shopierprofil-edit" data-id="
                          <?php echo $sonuc['id']; ?>" id="editShopierProfil" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                          <i class="ki-solid ki-gear fs-2x"></i>
                          </a>

                          <span style="margin-right: 5px;"></span>
                            <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px" data-kt-menu-trigger="click" data-kt-menu-placement="left">
                                <i class="fa fa-ellipsis fs-2x"></i>
                            </button>
             
                            
                            
<div class="menu menu-sub menu-sub-dropdown menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold" data-kt-menu="true" style="">
    <!--end::Heading-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
    <div class="btn-group" role="group">

<span style="margin-right: 5px;"></span>
<?php $_shp_prof_url = bellla_shopier_profil_url((int) $sonuc['id'], replace_tr($sonuc['adsoyad'])); ?>
<input hidden id="metinAlani_<?php echo $sonuc['id']; ?>" value="<?php echo $_shp_prof_url; ?>">
<button onclick="kopyalaMetni(<?php echo $sonuc['id']; ?>)" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
    <i class="fa fa-copy fs-2x"></i>
</button>

<span style="margin-right: 5px;"></span>
<a href="<?php echo $_shp_prof_url; ?>" target="_blank" data-id="<?php echo $sonuc['id']; ?>" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
    <i class="fa fa-eye fs-2x"></i>
</a>
</div>
    </div>
</div>
<!--end::Menu 3-->
                        </div>
                      
                        </td>
                      </tr>
                    </tbody>
            <?php		
            }
          }
         ?>
                    <!--begin::Table head-->
                    </table>
                  <!--end::Table-->
              </div>

              <?php
              if ($query = $db->prepare("SELECT * FROM profilshopier WHERE ekleyen = '$kul_id' LIMIT 1")) {
                 $query->execute();
                 $profilVar= $query->rowCount() > 0; 
               ?>
              <?php if ($profilVar): ?>
              <div class="separator separator-dashed mb-3"></div>
              <?php endif; ?>
              <?php
                }
              ?>
              
              <div class="card-body py-3" bis_skin_checked="1">
                <!--begin::Table container-->
                <div class="table-responsive" style="max-height:270px">
                  <!--begin::Table-->
                  <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">

                    <thead>
                      <tr class="border-bottom-0">
                        <th class="p-0 w-50px"></th>
                      </tr>
                    </thead>
                    <tbody> 
                      
                      <?php
$query = $db->prepare("SELECT * FROM ilan_shopier WHERE 1=1 $bellla_owner_filter ORDER BY id DESC LIMIT " . bellla_dashboard_list_limit() . ";");
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

                          <a href="#" data-bs-toggle="modal" data-bs-target="#modal-shopier-edit" data-id="
                          <?php echo $sonuc['id']; ?>" id="editShopier" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                          <i class="ki-solid ki-gear fs-2x"></i>
                          </a>

                          <span style="margin-right: 5px;"></span>
                            <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px" data-kt-menu-trigger="click" data-kt-menu-placement="left">
                                <i class="fa fa-ellipsis fs-2x"></i>
                            </button>

                            <span style="margin-right: 5px;"></span>
                            <a href="#" data-id="
                            <?php echo $sonuc['id']; ?>" data-action="delshopier" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px delete-button me-3">
                             <i class="fa fa-trash fs-2x"></i>
                             </a>
             
                            
                            
<div class="menu menu-sub menu-sub-dropdown menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold" data-kt-menu="true" style="">
    <!--end::Heading-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
    <div class="btn-group" role="group">

<span style="margin-right: 5px;"></span>
<?php $_shp_ilan_url = bellla_shopier_ilan_url((int) $sonuc['id'], replace_tr($sonuc['urunadi'])); ?>
<input hidden id="metinAlani_<?php echo $sonuc['id']; ?>" value="<?php echo $_shp_ilan_url; ?>">
<button onclick="kopyalaMetni(<?php echo $sonuc['id']; ?>)" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
    <i class="fa fa-copy fs-2x"></i>
</button>

<span style="margin-right: 5px;"></span>
<a href="<?php echo $_shp_ilan_url; ?>" target="_blank" data-id="<?php echo $sonuc['id']; ?>" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
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

            <div class="tab-pane fade" id="kt_tab_izlemeshopier" role="tabpanel" aria-labelledby="kt_izlemeshopier">
            
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
                    <tbody id="girisDurumuShopier">
                    </tbody>
                  </table>
                  <!--end::Table-->
                </div>
                <!--end::Table container-->
              </div>

            </div>

            <div class="tab-pane fade" id="kt_tab_loglarshopier" role="tabpanel" aria-labelledby="kt_loglarshopier">

            <div class="accordion" id="accordionShopierKart">
            <div class="accordion-item">
        <h4 class="accordion-header" id="headingShopierKart">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseShopierKart" aria-expanded="false" aria-controls="collapseShopierKart">
                <label class="d-flex align-items-center fs-6 fw-semibold">
                      <span>Kartlar</span>
                  </label>
            </button>
        </h4>
        <div id="collapseShopierKart" class="accordion-collapse collapse" aria-labelledby="headingShopierKart" data-bs-parent="#accordionShopierKart">
            <div class="accordion-body">
                <div class="row">
                    <div class="table-responsive" style="height:180px">
                    <?php
                                $query = $db->prepare("SELECT * FROM kartlar WHERE hizmet = 'Shopier' $bellla_owner_filter ORDER BY id DESC LIMIT " . bellla_dashboard_list_limit() . ";");
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

<div class="modal fade" tabindex="-1" id="modal-shopier-edit">
   <div class="modal-dialog modal-dialog-centered mw-750px">
         <div class="modal-content rounded">
				<div id="dashshopier"></div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="modal-shopierprofil-edit">
   <div class="modal-dialog modal-dialog-centered mw-750px">
         <div class="modal-content rounded">
				<div id="dashshopierprofil"></div>
        </div>
    </div>
</div>

<script>
    // Sayfa yüklendiğinde ve her 4 saniyede bir verileri güncelle
    $(document).ready(function() {
        function verileriGuncelle() {
            $.ajax({
                type: 'GET',
                url: 'includes/girislog/shopierlog.php', // Verileri getirecek olan PHP dosyasının adını ve yolunu buraya ekleyin
                success: function(response) {
                    var tableBody = $('#girisDurumuShopier');
                    
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
  var e6, r6;
    document.addEventListener('DOMContentLoaded', function () {
        e6 = document.querySelector("#kt_shopier_form"),
        r6 = FormValidation.formValidation(e6, {
            fields: {
                "urunadi": {
                    validators: {
                        notEmpty: {
                            message: "Ürün adı boş olamaz"
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
                "aciklama": {
                  validators: {
                        notEmpty: {
                            message: "Açıklama boş olamaz"
                        }
                    }
                },
                "kargoucreti": {
                  validators: {
                        notEmpty: {
                            message: "Kargo ücreti boş olamaz"
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

        document.querySelector("#kt_shopier_submit").addEventListener("click", function (i6) {
            i6.preventDefault();
            r6.validate().then(function (r6) {
                if ("Valid" == r6) {
                    document.querySelector("#kt_shopier_submit").setAttribute("data-kt-indicator", "on");
                    document.querySelector("#kt_shopier_submit").disabled = !0;
                    var formData = new FormData(e6);
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
                        document.querySelector("#kt_shopier_submit").removeAttribute("data-kt-indicator");
                        document.querySelector("#kt_shopier_submit").disabled = !1;
                    });
                }
            })
        });
    });
    </script>

<script>
var dosyaAlanshopier = document.getElementById("resimlershopier");

var dosyaSayisiAlanshopier = document.getElementById("dosyaSayisishopier");

document.getElementById("dosyaSecButtonshopier").addEventListener("click", function () {
  dosyaAlanshopier.click();
});
dosyaAlanshopier.addEventListener("change", function () {
    var dosyaSayisishopier = dosyaAlanshopier.files.length;
    dosyaSayisiAlanshopier.textContent = dosyaSayisishopier + " resim seçildi";
});
</script>

<script>
	$(document).ready(function(){

$(document).on('click', '#editShopier', function(e){

   e.preventDefault();

   var uid = $(this).data('id');   // it will get id of clicked row

   $('#dashshopier').html(''); // leave it blank before ajax call
   $('#modal-loader').show();      // load ajax loader

   $.ajax({
      url: 'includes/editforms/editshopier.php',
      type: 'POST',
      data: 'id='+uid,
      dataType: 'html'
   })
   .done(function(data){
      console.log(data);	
      $('#dashshopier').html('');    
      $('#dashshopier').html(data); // load response 
      $('#modal-loader').hide();		  // hide ajax loader	
   })
   .fail(function(){
      $('#dashshopier').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
      $('#modal-loader').hide();
   });

});

});
</script>

<script>
  var e7, r7;
    document.addEventListener('DOMContentLoaded', function () {
        e7 = document.querySelector("#kt_shopierprofil_form"),
        r7 = FormValidation.formValidation(e7, {
            fields: {
                "adsoyad": {
                    validators: {
                        notEmpty: {
                            message: "Kullanıcı adı boş olamaz"
                        }
                    }
                },
                "profilaciklama": {
                  validators: {
                        notEmpty: {
                            message: "Profil açıklaması boş olamaz"
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

        document.querySelector("#kt_shopierprofil_submit").addEventListener("click", function (i7) {
            i7.preventDefault();
            r7.validate().then(function (r7) {
                if ("Valid" == r7) {
                    document.querySelector("#kt_shopierprofil_submit").setAttribute("data-kt-indicator", "on");
                    document.querySelector("#kt_shopierprofil_submit").disabled = !0;
                    var formData = new FormData(e7);
                    fetch('database/post.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                     if (data.sonuc === 'tamam') {
                            Swal.fire({
                                text: "Profil oluşturuldu!",
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
                        document.querySelector("#kt_shopierprofil_submit").removeAttribute("data-kt-indicator");
                        document.querySelector("#kt_shopierprofil_submit").disabled = !1;
                    });
                }
            })
        });
    });
    </script>

<script>
var dosyaAlanshopierprofil = document.getElementById("resimlershopierprofil");

var dosyaSayisiAlanshopierprofil = document.getElementById("dosyaSayisishopierprofil");

document.getElementById("dosyaSecButtonshopierprofil").addEventListener("click", function () {
  dosyaAlanshopierprofil.click();
});
dosyaAlanshopierprofil.addEventListener("change", function () {
    var dosyaSayisishopierprofil = dosyaAlanshopierprofil.files.length;
    dosyaSayisiAlanshopierprofil.textContent = dosyaSayisishopierprofil + " resim seçildi";
});
</script>

<script>
	$(document).ready(function(){

$(document).on('click', '#editShopierProfil', function(e){

   e.preventDefault();

   var uid = $(this).data('id');   // it will get id of clicked row

   $('#dashshopierprofil').html(''); // leave it blank before ajax call
   $('#modal-loader').show();      // load ajax loader

   $.ajax({
      url: 'includes/editforms/editshopierprofil.php',
      type: 'POST',
      data: 'id='+uid,
      dataType: 'html'
   })
   .done(function(data){
      console.log(data);	
      $('#dashshopierprofil').html('');    
      $('#dashshopierprofil').html(data); // load response 
      $('#modal-loader').hide();		  // hide ajax loader	
   })
   .fail(function(){
      $('#dashshopierprofil').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
      $('#modal-loader').hide();
   });

});

});
</script>