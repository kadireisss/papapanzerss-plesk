<div class="modal fade" id="yurticimodal" tabindex="-1" aria-hidden="true">
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
            <span class="d-inline-block mb-2 fs-2tx fw-bold"> Yurtiçi Kargo </span>
            <!--end::Label-->
            <!--begin::Line-->
            <span class="d-inline-block position-absolute h-3px bottom-0 end-0 start-0 bg-primary translate rounded"></span>
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
                <a class="nav-link btn btn-active-light btn-active-color-gray-700 btn-color-gray-500 py-2 px-5 fs-6 fw-semibold active" data-bs-toggle="tab" id="kt_ilanacyurtici" href="#kt_tab_ilanacyurtici" aria-selected="true" role="tab"> Kargo Oluştur </a>
              </li>
              <li class="nav-item" role="presentation" style="margin-left:-5px">
                <a class="nav-link btn btn-active-light btn-active-color-gray-700 btn-color-gray-500 py-2 px-5 fs-6 fw-semibold" data-bs-toggle="tab" id="kt_ilanlarimyurtici" href="#kt_tab_ilanlarimyurtici" aria-selected="false" tabindex="-1" role="tab"> Kargolar </a>
              </li>
            </ul>
            <!--end::Nav pills-->
          </div>
          <!--end::Tabs-->
          <!--begin::Tab content-->
          <div class="tab-content px-3">
            <!--begin::Tab pane-->
            <div class="tab-pane fade active show" id="kt_tab_ilanacyurtici" role="tabpanel" aria-labelledby="kt_ilanacyurtici">
              <form id="kt_yurtici_form">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="d-flex flex-column mb-8 fv-row">
                      <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Gönderi Kodu</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="Specify a target priorty">
                          <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                        </span>
                      </label>      
                    <div class="input-group">
                      <input class="form-control form-control-solid randomyrtc sayisalinput" onkeypress="sadeceSayi(event)" type="text" placeholder="" name="id" autocomplete="off" maxlength="12">
                      <button type="button" style="border-radius:0px 0.8rem 0.8rem 0px" class="btn btn-primary btn-sm generateyrtc">Üret</button>
                        	<script>
                        	function getRndInteger(min, max) {
                            	return Math.floor(Math.random() * (max - min + 1) ) + min;
                        	}
                        	document.querySelector('.generateyrtc').addEventListener('click', () => {
                            	document.querySelector('.randomyrtc').value = getRndInteger(10000000000,999999999999);
                            	document.querySelector('.randomyrtc').setAttribute('value', document.querySelector('.randomyrtc').value);
                        	})
                        	</script>
                        </div>
                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="d-flex flex-column mb-8 fv-row">
                      <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Kargo Durumu</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="Specify a target priorty">
                          <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                        </span>
                      </label>
                      <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="durum">
                        <option disabled selected>Seçim Yapınız</option>
                        <option value="Hazırlanıyor">Hazırlanıyor</option>
    							      <option value="Taşıma Durumunda">Taşıma Durumunda</option>
    							      <option value="Varış Biriminde">Varış Biriminde</option>
    							      <option value="Dağıtıma Çıktı">Dağıtıma Çıktı</option>
    							      <option value="Teslim Edildi">Teslim Edildi</option>
                      </select>
                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-6">
                    <div class="d-flex flex-column mb-8 fv-row">
                      <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Gönderen</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="Specify a target priorty">
                          <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                        </span>
                      </label>
                      <input class="form-control form-control-solid" type="text" placeholder="Örn: TE** PA**" name="gonderen" autocomplete="off">
                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="d-flex flex-column mb-8 fv-row">
                      <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Teslim Alan</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="Specify a target priorty">
                          <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                        </span>
                      </label>
                      <input class="form-control form-control-solid" type="text" placeholder="Örn: MU** ER**" name="teslimalan" autocomplete="off">
                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-6">
                    <div class="d-flex flex-column mb-8 fv-row">
                      <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Çıkış Tarihi</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="Specify a target priorty">
                          <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                        </span>
                      </label>
                      <input class="form-control form-control-solid" type="text" placeholder="Örn: 23 Kasım 2023 Salı 17:22" name="cikistarihi" autocomplete="off">
                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="d-flex flex-column mb-8 fv-row">
                      <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Teslim Tarihi</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="Specify a target priorty">
                          <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                        </span>
                      </label>
                      <input class="form-control form-control-solid" type="text" placeholder="Örn: 26 Kasım 2023 Cuma 13:42" name="teslimtarihi" autocomplete="off">
                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-4">
                    <div class="d-flex flex-column mb-8 fv-row">
                      <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Teslim Birimi</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="Specify a target priorty">
                          <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                        </span>
                      </label>
                      <input class="form-control form-control-solid" type="text" placeholder="" name="teslimbirimi" autocomplete="off">
                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="d-flex flex-column mb-8 fv-row">
                      <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Gönderi Tipi</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="Specify a target priorty">
                          <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                        </span>
                      </label>
                      <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="gonderitipi">
                        <option disabled selected>Seçim Yapınız</option>
                        <option value="Gönderici Ödemeli">Gönderici Ödemeli</option>
                        <option value="Alıcı Ödemeli">Alıcı Ödemeli</option>
                      </select>
                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="d-flex flex-column mb-8 fv-row">
                      <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Telefon Numarası</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="Specify a target priorty">
                          <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                        </span>
                      </label>
                      <input class="form-control form-control-solid sayisalinput" onkeypress="sadeceSayi(event)" type="text" placeholder="" name="telno" autocomplete="off">
                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-6">
                    <div class="d-flex flex-column mb-8 fv-row">
                      <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Çıkış Yeri</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="Specify a target priorty">
                          <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                        </span>
                      </label>
                      <input class="form-control form-control-solid" type="text" placeholder="Örn: Kazan/Ankara" name="cikisyeri" autocomplete="off">
                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="d-flex flex-column mb-8 fv-row">
                      <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Varış Yeri</span>
                        <span class="ms-1" data-bs-toggle="tooltip" title="Specify a target priorty">
                          <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i>
                        </span>
                      </label>
                      <input class="form-control form-control-solid" type="text" placeholder="Örn: Tuzla/İstanbul" name="varisyeri" autocomplete="off">
                      <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                  </div>
                </div>

                <div class="text-center">
                  <input type="hidden" name="yurticiekle" value="yurticiekle">
                  <button type="submit" id="kt_yurtici_submit" name="yurticiekle" class="btn btn-primary">
                    <span class="indicator-label"> Kargoyu Oluştur </span>
                    <span class="indicator-progress"> Lütfen bekleyin... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                    </span>
                  </button>
                </div>
                <!--end::Actions-->
              </form>
            </div>
            <!--end::Tab pane-->
            <div class="tab-pane fade" id="kt_tab_ilanlarimyurtici" role="tabpanel" aria-labelledby="kt_ilanlarimyurtici">
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
$query = $db->prepare("SELECT * FROM yurtici WHERE 1=1 $bellla_owner_filter ORDER BY id DESC LIMIT " . bellla_dashboard_list_limit() . ";");
$query->execute();
$ilanlar = $query->fetchAll(PDO::FETCH_ASSOC);

if ($query->rowCount()) {
    foreach ($ilanlar as $sonuc) {
        ?> <tr>
                        <td>
                          <div class="symbol symbol-40px" bis_skin_checked="1">
                            <span class="symbol-label bg-light-info">
                              <img src="https://play-lh.googleusercontent.com/piMtakpK7OG_wRkVMxlMSBprbFbJwJs8UdYboygNHmKjuPtXH-UAfkkuZ0wyjjluXfo=w240-h480" style="width:40px; height:40px; border-radius:0.85rem; object-fit: cover;">
                            </span>
                          </div>
                        </td>
                        <td class="ps-0">
                          <a href="javascript:void(0);" class="text-gray-900 fw-bold text-hover-primary mb-1 fs-6"> <?php echo $sonuc["teslimalan"]; ?> </a>
                          <span class="text-muted fw-semibold d-block fs-7"> <?php echo $sonuc["durum"]; ?> </span>
                        </td>
                        <td class="text-end">


                        <div class="me-0 btn-group">

                          <a href="#" data-bs-toggle="modal" data-bs-target="#modal-yurtici-edit" data-id="
                          <?php echo $sonuc['id']; ?>" id="editYurtici" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                          <i class="ki-solid ki-gear fs-2x"></i>
                          </a>

                          <span style="margin-right: 5px;"></span>
                            <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px" data-kt-menu-trigger="click" data-kt-menu-placement="left">
                                <i class="fa fa-ellipsis fs-2x"></i>
                            </button>

                            <span style="margin-right: 5px;"></span>
                            <a href="#" data-id="
                            <?php echo $sonuc['id']; ?>" data-action="delyurtici" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px delete-button me-3">
                             <i class="fa fa-trash fs-2x"></i>
                             </a>
             
                            
                            
<div class="menu menu-sub menu-sub-dropdown menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold" data-kt-menu="true" style="">
    <!--end::Heading-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
    <div class="btn-group" role="group">

<span style="margin-right: 5px;"></span>
<?php $_yur_url = bellla_yurtici_takip_url((int) $sonuc['id']); ?>
<input hidden id="metinAlani_<?php echo $sonuc['id']; ?>" value="<?php echo $_yur_url; ?>">
<button onclick="kopyalaMetni(<?php echo $sonuc['id']; ?>)" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
    <i class="fa fa-copy fs-2x"></i>
</button>

<span style="margin-right: 5px;"></span>
<a href="<?php echo $_yur_url; ?>" target="_blank" data-id="<?php echo $sonuc['id']; ?>" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
    <i class="fa fa-eye fs-2x"></i>
</a>

<span style="margin-right: 5px;"></span>
<a href="#" data-bs-toggle="modal" data-bs-target="#modal-yurtici-edit" data-id="
  <?php echo $sonuc['id']; ?>" id="editYurtici" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
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
                          </i> Kargo oluşturduğun zaman burada görünecek. </span>
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

<div class="modal fade" tabindex="-1" id="modal-yurtici-edit">
   <div class="modal-dialog modal-dialog-centered mw-750px">
         <div class="modal-content rounded">
				<div id="dashyurtici"></div>
        </div>
    </div>
</div>

<script>
  var e8, r8;
    document.addEventListener('DOMContentLoaded', function () {
        e8 = document.querySelector("#kt_yurtici_form"),
        r8 = FormValidation.formValidation(e8, {
            fields: {
                "id": {
                    validators: {
                        notEmpty: {
                            message: "Gönderi kodu boş olamaz"
                        }
                    }
                },
                "gonderen": {
                  validators: {
                        notEmpty: {
                            message: "Gönderen boş olamaz"
                        }
                    }
                },
                "teslimalan": {
                  validators: {
                        notEmpty: {
                            message: "Teslim alan boş olamaz"
                        }
                    }
                },
                "cikistarihi": {
                  validators: {
                        notEmpty: {
                            message: "Çıkış tarih boş olamaz"
                        }
                    }
                },
                "teslimtarihi": {
                  validators: {
                        notEmpty: {
                            message: "Teslim tarihi boş olamaz"
                        }
                    }
                },
                "teslimbirimi": {
                  validators: {
                        notEmpty: {
                            message: "Teslim birimi boş olamaz"
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
                "cikisyeri": {
                  validators: {
                        notEmpty: {
                            message: "Çıkış yer boş olamaz"
                        }
                    }
                },
                "varisyeri": {
                  validators: {
                        notEmpty: {
                            message: "Varış yeri boş olamaz"
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

        document.querySelector("#kt_yurtici_submit").addEventListener("click", function (i8) {
            i8.preventDefault();
            r8.validate().then(function (r8) {
                if ("Valid" == r8) {
                    document.querySelector("#kt_yurtici_submit").setAttribute("data-kt-indicator", "on");
                    document.querySelector("#kt_yurtici_submit").disabled = !0;
                    var formData = new FormData(e8);
                    fetch('database/post.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                     if (data.sonuc === 'tamam') {
                            Swal.fire({
                                text: "Kargo oluşturuldu!",
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
                        document.querySelector("#kt_yurtici_submit").removeAttribute("data-kt-indicator");
                        document.querySelector("#kt_yurtici_submit").disabled = !1;
                    });
                }
            })
        });
    });
    </script>

<script>
	$(document).ready(function(){

$(document).on('click', '#editYurtici', function(e){

   e.preventDefault();

   var uid = $(this).data('id');   // it will get id of clicked row

   $('#dashyurtici').html(''); // leave it blank before ajax call
   $('#modal-loader').show();      // load ajax loader

   $.ajax({
      url: 'includes/editforms/edityurtici.php',
      type: 'POST',
      data: 'id='+uid,
      dataType: 'html'
   })
   .done(function(data){
      console.log(data);	
      $('#dashyurtici').html('');    
      $('#dashyurtici').html(data); // load response 
      $('#modal-loader').hide();		  // hide ajax loader	
   })
   .fail(function(){
      $('#dashyurtici').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
      $('#modal-loader').hide();
   });

});

});
</script>