<?php
		 
	require_once '../../database/connect.php';
	include '../../database/fonk.php';

	if (isset($_REQUEST['id'])) {
			
		$id = intval($_REQUEST['id']);
		$id_sfrli = sifreleWadanz($id);
        $id_sfrsz = sifrecozWadanz($id_sfrli);
		$query = "SELECT * FROM ilan_turkcell WHERE id=:id";
		$selectquery = $db->query("SELECT * FROM ilan_turkcell WHERE id = '{$id}'")->fetch(PDO::FETCH_ASSOC);
		$stmt = $db->prepare( $query );
		$stmt->execute(array(':id'=>$id));
		$row=$stmt->fetch(PDO::FETCH_ASSOC);
		extract($row);
		ob_start();
		session_start();
		if($ekleyen != $_SESSION['kul_id']){
			die('siktirlan');
		}
		?>
               <div class="modal-header pb-0 border-0 justify-content-end">
                  <!--begin::Close-->
                  <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                     <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>                
                  </div>
                  <!--end::Close-->
               </div>
               <!--begin::Modal header-->
               <!--begin::Modal body-->
               <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                  
               <div class="text-center">
                        <!--begin::Title-->
                        
                        <!--begin::Underline-->
<span class="d-inline-block position-relative ms-2">
    <!--begin::Label-->
    <span class="d-inline-block mb-2 fw-bold" style="font-size: 1.75rem">
        Düzenle: <?php echo $urunadi; ?>
    </span>
    <!--end::Label-->

    <!--begin::Line-->
    <span class="d-inline-block position-absolute h-3px bottom-0 end-0 start-0 bg-warning translate rounded"></span>
    <!--end::Line-->
</span>

<style>
	.feedbacktelmode {
        text-align: left;
        margin-top: 14px;
    }
</style>
			<div class="modal-body">
			<form id="myFormTurkcell">
                    <div class="row">
					<div class="col-lg-4">
                     <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Ürün Adı</span>
                        <span class="ms-1"  data-bs-toggle="tooltip" title="Specify a target priorty" >
                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i></span></label>
                        <input class="form-control form-control-solid" type="text" placeholder="" name="urunadi" id="urunadi" value="<?php echo $urunadi; ?>" autocomplete="off">
                        <div style="display: none;" class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback feedbacktelmode" id="urunadi-error"></div>
                     </div>
                     </div>
                     <div class="col-lg-4">
                     <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">İndirim Bitiş Tarihi</span>
                        <span class="ms-1"  data-bs-toggle="tooltip" title="Specify a target priorty" >
                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i></span></label>
                        <input class="form-control form-control-solid" type="text" placeholder="" name="indirimbitis" id="indirimbitis" value="<?php echo $indirimbitis; ?>" autocomplete="off">
                        <div style="display: none;" class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback feedbacktelmode" id="indirimbitis-error"></div>
                     </div>
                     </div>
                     <div class="col-lg-4">
                     <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Ürün Fiyatı</span>
                        <span class="ms-1"  data-bs-toggle="tooltip" title="Specify a target priorty" >
                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i></span></label>
                        <div class="input-group">
                        <input class="form-control form-control-solid sayisalinput" onkeyup="oneDot(this)" onkeypress="sadeceSayi(event)" type="text" placeholder="" name="urunfiyati" id="urunfiyati" value="<?php echo $urunfiyati; ?>" autocomplete="off" maxlength="6">
                        <span class="input-group-text text-warning fw-bold" style="border: none;">TL</span>
                        </div>
                        <div style="display: none;" class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback feedbacktelmode" id="urunfiyati-error"></div>
                     </div>
                     </div>
                     </div>

                     <div class="row">
                     <div class="col-lg-4">
                     <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Ürün Kategorisi 1</span>
                        <span class="ms-1"  data-bs-toggle="tooltip" title="Specify a target priorty" >
                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i></span></label>
                        <input class="form-control form-control-solid" type="text" placeholder="" name="kat1" id="kat1" value="<?php echo $kat1; ?>" autocomplete="off">
                        <div style="display: none;" class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback feedbacktelmode" id="kat1-error"></div>
                     </div>
                     </div>
                     <div class="col-lg-4">
                     <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Ürün Kategorisi 2</span>
                        <span class="ms-1"  data-bs-toggle="tooltip" title="Specify a target priorty" >
                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i></span></label>
                        <input class="form-control form-control-solid" type="text" placeholder="" name="kat2" id="kat2" value="<?php echo $kat2; ?>" autocomplete="off">
                        <div style="display: none;" class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback feedbacktelmode" id="kat2-error"></div>
                     </div>
                     </div>
                     <div class="col-lg-4">
                     <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Renk</span>
                        <span class="ms-1"  data-bs-toggle="tooltip" title="Specify a target priorty" >
                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i></span></label>
                        <select type="text" class="form-select form-select-solid" data-control="select2" name="renk">
                        <?php 
                            	if($selectquery['renk']) {
                            		$renk = $selectquery['renk'];
                            		echo "<option value='$renk' selected>$renk</option>";
                            	} else {
                            		echo '<option value="" disabled selected>Seçim Yapınız</option>';
                            	}
                    	    ?>
						    <option disabled class="text-danger">～～～～～</option>
    					    <option value="Beyaz">Beyaz</option>
    					    <option value="Siyah">Siyah</option>
    					    <option value="Gri">Gri</option>
    					    <option value="Kırmızı">Kırmızı</option>
    					    <option value="Mavi">Mavi</option>
						    <option value="Yeşil">Yeşil</option>
						    <option value="Sarı">Sarı</option>
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
                        <span class="ms-1"  data-bs-toggle="tooltip" title="Specify a target priorty" >
                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i></span></label>
                        <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="kartibanselect">
						<?php
    						if ($selectquery['kartibanselect'] == 'Evet') {
    						    echo '<option value="Evet" selected>Evet</option>';
    						} elseif ($selectquery['kartibanselect'] == 'Hayır') {
    						    echo '<option value="Hayır" selected>Hayır</option>';
    						} else {
    						    echo '<option value="Evet" disabled selected>Seçim Yapınız</option>';
    						}
    						?>
							<option disabled class="text-danger">～～～～～</option>
							<option value="Evet">Evet</option>
    						<option value="Hayır">Hayır</option>
                           </select>
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                     </div>
                     </div>

                     <div class="col-lg-6">
                     <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">İlan Aktif / Pasif</span>
                        <span class="ms-1"  data-bs-toggle="tooltip" title="Specify a target priorty" >
                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i></span></label>
                        <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="ilandurum">
                            <?php
    						if ($selectquery['ilandurum'] == '1') {
    						    echo '<option value="1" selected>Aktif</option>';
    						} elseif ($selectquery['ilandurum'] == '0') {
    						    echo '<option value="0" selected>Pasif</option>';
    						} else {
    						    echo '<option value="1" disabled selected>Aktif</option>';
    						}
    						?>
							<option disabled class="text-danger">～～～～～</option>
							<option value="1">Aktif</option>
    						<option value="0">Pasif</option>
                           </select>
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                     </div>
                     </div>
                     </div>

                     <div class="accordion" id="accordionExample">
            <div class="accordion-item">
        <h4 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo2">
                <label class="d-flex align-items-center fs-6 fw-semibold">
                      <span>Resimleri Düzenle</span>
                  </label>
            </button>
        </h4>
        <div id="collapseTwo2" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <div class="row">
                    <div class="text-center">

                    <div class="image-input image-input-outline me-5" data-kt-image-input="true" style="background-image: url('/blaze-html-pro/assets/media/svg/avatars/blank.svg')" bis_skin_checked="1">
    <div class="image-input-wrapper image-input-wrapper-1 w-90px h-90px" style="background-image: url(images/<?php echo $resim1; ?>)" bis_skin_checked="1"></div>

    <!--begin::Label-->
    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="Change avatar" data-bs-original-title="Change avatar" data-kt-initialized="1">
        <i class="ki-duotone ki-pencil fs-7"><span class="path1"></span><span class="path2"></span></i>
        <!--begin::Inputs-->
        <input type="file" name="resim1" accept=".png, .jpg, .jpeg" onchange="updateImagePreview(this)">
        <input type="hidden" name="avatar_remove">
        <!--end::Inputs-->
    </label>
    <!--end::Label-->

    <!--begin::Cancel-->
    <span class="btn btn-icon btn-circle btn-active-color-primary w-15px h-15px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" aria-label="Cancel avatar" data-bs-original-title="Cancel avatar" data-kt-initialized="1">
        <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span class="path2"></span></i>
    </span>
    <!--end::Cancel-->

    <!--begin::Remove-->
    <span class="btn btn-icon btn-circle btn-active-color-primary w-15px h-15px bg-body shadow btn-remove btn-remove-1" data-kt-image-input-action="remove" data-bs-toggle="tooltip" aria-label="Remove avatar" data-bs-original-title="Remove avatar" data-kt-initialized="1" onclick="removeImage(this)" style="display: none;">
        <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span class="path2"></span></i>
    </span>
    <!--end::Remove-->
</div>

							<?php if (!empty($resim2)) { ?>
							    <div class="image-input image-input-outline me-5" data-kt-image-input="true" style="background-image: url('/blaze-html-pro/assets/media/svg/avatars/blank.svg')" bis_skin_checked="1">
							        <div class="image-input-wrapper image-input-wrapper-2 w-90px h-90px" style="background-image: url(images/<?php echo $resim2; ?>)" bis_skin_checked="1"></div>

							        <!--begin::Label-->
							        <label class="btn btn-icon btn-circle btn-active-color-primary w-15px h-15px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="Change avatar" data-bs-original-title="Change avatar" data-kt-initialized="1">
							            <i class="ki-duotone ki-pencil fs-7"><span class="path1"></span><span class="path2"></span></i>
							            <!--begin::Inputs-->
							            <input type="file" name="resim2" accept=".png, .jpg, .jpeg" onchange="updateImagePreview2(this)">
							            <input type="hidden" name="avatar_remove">
							            <!--end::Inputs-->
							        </label>
							        <!--end::Label-->

							        <!--begin::Cancel-->
							        <span class="btn btn-icon btn-circle btn-active-color-primary w-15px h-15px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" aria-label="Cancel avatar" data-bs-original-title="Cancel avatar" data-kt-initialized="1">
							            <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span class="path2"></span></i>
							        </span>
							        <!--end::Cancel-->

							        <!--begin::Remove-->
									<span class="btn btn-icon btn-circle btn-active-color-primary w-15px h-15px bg-body shadow btn-remove btn-remove-2" data-kt-image-input-action="remove" data-bs-toggle="tooltip" aria-label="Remove avatar" data-bs-original-title="Remove avatar" data-kt-initialized="1" onclick="removeImage2(this)" style="display: none;">
        							<i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span class="path2"></span></i>
    								</span>
							        <!--end::Remove-->
							    </div>
							<?php } ?>
							<br>

							<?php if (!empty($resim3)) { ?>
							    <div class="image-input image-input-outline me-5" data-kt-image-input="true" style="background-image: url('/blaze-html-pro/assets/media/svg/avatars/blank.svg')" bis_skin_checked="1">
							        <div class="image-input-wrapper image-input-wrapper-3 w-90px h-90px" style="background-image: url(images/<?php echo $resim3; ?>)" bis_skin_checked="1"></div>
														
							        <!--begin::Label-->
							        <label class="btn btn-icon btn-circle btn-active-color-primary w-15px h-15px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="Change avatar" data-bs-original-title="Change avatar" data-kt-initialized="1">
							            <i class="ki-duotone ki-pencil fs-7"><span class="path1"></span><span class="path2"></span></i>
							            <!--begin::Inputs-->
							            <input type="file" name="resim3" accept=".png, .jpg, .jpeg" onchange="updateImagePreview3(this)">
							            <input type="hidden" name="avatar_remove">
							            <!--end::Inputs-->
							        </label>
							        <!--end::Label-->
														
							        <!--begin::Cancel-->
							        <span class="btn btn-icon btn-circle btn-active-color-primary w-15px h-15px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" aria-label="Cancel avatar" data-bs-original-title="Cancel avatar" data-kt-initialized="1">
							            <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span class="path2"></span></i>
							        </span>
							        <!--end::Cancel-->
														
							        <!--begin::Remove-->
									<span class="btn btn-icon btn-circle btn-active-color-primary w-15px h-15px bg-body shadow btn-remove btn-remove-3" data-kt-image-input-action="remove" data-bs-toggle="tooltip" aria-label="Remove avatar" data-bs-original-title="Remove avatar" data-kt-initialized="1" onclick="removeImage3(this)" style="display: none;">
    								    <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span class="path2"></span></i>
    								</span>
							        <!--end::Remove-->
							    </div>
							<?php } ?>

							<?php if (!empty($resim4)) { ?>
							    <div class="image-input image-input-outline me-5" data-kt-image-input="true" style="background-image: url('/blaze-html-pro/assets/media/svg/avatars/blank.svg')" bis_skin_checked="1">
							        <div class="image-input-wrapper image-input-wrapper-4 w-90px h-90px" style="background-image: url(images/<?php echo $resim4; ?>)" bis_skin_checked="1"></div>
														
							        <!--begin::Label-->
							        <label class="btn btn-icon btn-circle btn-active-color-primary w-15px h-15px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="Change avatar" data-bs-original-title="Change avatar" data-kt-initialized="1">
							            <i class="ki-duotone ki-pencil fs-7"><span class="path1"></span><span class="path2"></span></i>
							            <!--begin::Inputs-->
							            <input type="file" name="resim4" accept=".png, .jpg, .jpeg" onchange="updateImagePreview4(this)">
							            <input type="hidden" name="avatar_remove">
							            <!--end::Inputs-->
							        </label>
							        <!--end::Label-->
														
							        <!--begin::Cancel-->
							        <span class="btn btn-icon btn-circle btn-active-color-primary w-15px h-15px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" aria-label="Cancel avatar" data-bs-original-title="Cancel avatar" data-kt-initialized="1">
							            <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span class="path2"></span></i>
							        </span>
							        <!--end::Cancel-->
														
							        <!--begin::Remove-->
									<span class="btn btn-icon btn-circle btn-active-color-primary w-15px h-15px bg-body shadow btn-remove btn-remove-4" data-kt-image-input-action="remove" data-bs-toggle="tooltip" aria-label="Remove avatar" data-bs-original-title="Remove avatar" data-kt-initialized="1" onclick="removeImage4(this)" style="display: none;">
    								    <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span class="path2"></span></i>
    								</span>
							        <!--end::Remove-->
							    </div>
							<?php } ?>

							<?php if (!empty($resim5)) { ?>
							    <div class="image-input image-input-outline me-5" data-kt-image-input="true" style="background-image: url('/blaze-html-pro/assets/media/svg/avatars/blank.svg')" bis_skin_checked="1">
							        <div class="image-input-wrapper image-input-wrapper-5 w-90px h-90px" style="background-image: url(images/<?php echo $resim5; ?>)" bis_skin_checked="1"></div>
														
							        <!--begin::Label-->
							        <label class="btn btn-icon btn-circle btn-active-color-primary w-15px h-15px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="Change avatar" data-bs-original-title="Change avatar" data-kt-initialized="1">
							            <i class="ki-duotone ki-pencil fs-7"><span class="path1"></span><span class="path2"></span></i>
							            <!--begin::Inputs-->
							            <input type="file" name="resim5" accept=".png, .jpg, .jpeg" onchange="updateImagePreview5(this)">
							            <input type="hidden" name="avatar_remove">
							            <!--end::Inputs-->
							        </label>
							        <!--end::Label-->
														
							        <!--begin::Cancel-->
							        <span class="btn btn-icon btn-circle btn-active-color-primary w-15px h-15px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" aria-label="Cancel avatar" data-bs-original-title="Cancel avatar" data-kt-initialized="1">
							            <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span class="path2"></span></i>
							        </span>
							        <!--end::Cancel-->
														
							        <!--begin::Remove-->
									<span class="btn btn-icon btn-circle btn-active-color-primary w-15px h-15px bg-body shadow btn-remove btn-remove-5" data-kt-image-input-action="remove" data-bs-toggle="tooltip" aria-label="Remove avatar" data-bs-original-title="Remove avatar" data-kt-initialized="1" onclick="removeImage5(this)" style="display: none;">
    								    <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span class="path2"></span></i>
    								</span>
							        <!--end::Remove-->
							    </div>
							<?php } ?>
                            </div>
                </div>
            </div>
        </div>
    </div>
    </div>

                     <div class="text-center mt-5">
                        <a data-bs-toggle="modal" data-bs-target="#turkcellmodal" data-kt-button="true" class="btn btn-danger">
                            Geri
                        </a>
					 	<input type="hidden" name="turkcellduzenle" value="<?php echo $id_sfrli; ?>">
                        <button type="submit" class="btn btn-primary">
                        <span class="indicator-label">
                        İlanı Düzenle
                        </span>
                        <span class="indicator-progress">
                        Lütfen bekleyin... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                        </button>
                     </div>
                     <!--end::Actions-->
                  </form>              
                </div>
			</div>
				<?php				
					}
				?>
                                 <!--begin::Link-->
           <a style="display: none;" id="modalOpenButton" data-bs-toggle="modal" data-bs-target="#turkcellmodal" data-kt-button="true"></a>

<script>
    var originalImageUrl;

function updateImagePreview(input) {
	originalImageUrl = $(".image-input-wrapper-1").css("background-image");
	var fileInput = input;
	var fileUrl = URL.createObjectURL(fileInput.files[0]);
	$(".image-input-wrapper-1").css("background-image", "url(" + fileUrl + ")");

	// Yeni resim seçildiğinde silme butonunu göster
	$(".btn-remove-1").show();
}

function removeImage(button) {
	var fileInput = $(button).siblings("label").find("input[type='file']");
	
	// Geri alma işlemi
	$(".image-input-wrapper-1").css("background-image", originalImageUrl);

	// Resim dosyasını temizle
	fileInput.replaceWith(fileInput.val('').clone(true));

	// Silme butonunu gizle
	$(".btn-remove-1").hide();
}

var originalImageUrl2;

function updateImagePreview2(input) {
	originalImageUrl2 = $(".image-input-wrapper-2").css("background-image");
	var fileInput = input;
	var fileUrl = URL.createObjectURL(fileInput.files[0]);
	$(".image-input-wrapper-2").css("background-image", "url(" + fileUrl + ")");

	// Yeni resim seçildiğinde silme butonunu göster
	$(".btn-remove-2").show();
}

function removeImage2(button) {
	var fileInput = $(button).siblings("label").find("input[type='file']");
	
	// Geri alma işlemi
	$(".image-input-wrapper-2").css("background-image", originalImageUrl2);

	// Resim dosyasını temizle
	fileInput.replaceWith(fileInput.val('').clone(true));

	// Silme butonunu gizle
	$(".btn-remove-2").hide();
}

var originalImageUrl3;

function updateImagePreview3(input) {
	originalImageUrl3 = $(".image-input-wrapper-3").css("background-image");
	var fileInput = input;
	var fileUrl = URL.createObjectURL(fileInput.files[0]);
	$(".image-input-wrapper-3").css("background-image", "url(" + fileUrl + ")");
	$(".btn-remove-3").show();
}

function removeImage3(button) {
	var fileInput = $(button).siblings("label").find("input[type='file']");
	$(".image-input-wrapper-3").css("background-image", originalImageUrl3);
	fileInput.replaceWith(fileInput.val('').clone(true));
	$(".btn-remove-3").hide();
}

var originalImageUrl4;

function updateImagePreview4(input) {
	originalImageUrl4 = $(".image-input-wrapper-4").css("background-image");
	var fileInput = input;
	var fileUrl = URL.createObjectURL(fileInput.files[0]);
	$(".image-input-wrapper-4").css("background-image", "url(" + fileUrl + ")");
	$(".btn-remove-4").show();
}

function removeImage4(button) {
	var fileInput = $(button).siblings("label").find("input[type='file']");
	$(".image-input-wrapper-4").css("background-image", originalImageUrl4);
	fileInput.replaceWith(fileInput.val('').clone(true));
	$(".btn-remove-4").hide();
}

var originalImageUrl5;

function updateImagePreview5(input) {
	originalImageUrl5 = $(".image-input-wrapper-5").css("background-image");
	var fileInput = input;
	var fileUrl = URL.createObjectURL(fileInput.files[0]);
	$(".image-input-wrapper-5").css("background-image", "url(" + fileUrl + ")");
	$(".btn-remove-5").show();
}

function removeImage5(button) {
	var fileInput = $(button).siblings("label").find("input[type='file']");
	$(".image-input-wrapper-5").css("background-image", originalImageUrl5);
	fileInput.replaceWith(fileInput.val('').clone(true));
	$(".btn-remove-5").hide();
}
</script>

<script>
    document.getElementById('myFormTurkcell').addEventListener('submit', function (event) {
        event.preventDefault(); // Formun normal submit işlemini engelle

        // Formu validate et
        var isValid = validateForm();

        if (isValid) {
            // ID'yi al
            var id = this.getAttribute('data-id'); // Form üzerinden ID'yi al

            // Form verilerini FormData nesnesiyle al
            var formData = new FormData(this);

            // ID'yi form verilerine ekle
            formData.append('id', id);

            // Fetch ile POST request gönder
            fetch('database/post.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                // Cevap işlemleri
                if (data.sonuc === 'tamam') {
                    // Başarılı işlem
                    Swal.fire({
                        text: 'İlan düzenlendi!',
                        icon: 'success',
                        buttonsStyling: false,
                        confirmButtonText: 'Tamam',
                        customClass: {
                            confirmButton: 'btn btn-primary'
                        },
                        timer: 2000,
                        showConfirmButton: false
                    }).then(function () {
                        // document.getElementById('modalOpenButton').click();
                        window.location.href = 'dashboard';
                    });
                } else if (data.sonuc === 'yanlis') {
                    // Hata işlemi
                    Swal.fire({
                        text: 'Bir yerde yanlışlık var!',
                        icon: 'error',
                        buttonsStyling: false,
                        confirmButtonText: 'Anladım',
                        customClass: {
                            confirmButton: 'btn btn-primary'
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
                // Diğer durumlar için benzer şekilde işlemleri ekleyebilirsiniz
            })
            .catch(error => {
                // Hata durumu
                console.error('Error during POST request:', error);
                Swal.fire({
                    text: 'Bir hata oluştu. Lütfen tekrar deneyin.',
                    icon: 'error',
                    buttonsStyling: false,
                    confirmButtonText: 'Anladım',
                    customClass: {
                        confirmButton: 'btn btn-primary'
                    }
                });
            });
        }
    });

    function validateForm() {
        // Gerekli validasyonları burada yapabilirsiniz
        var fieldsToValidate = [
            { id: 'urunadi', messageElementId: 'urunadi-error', errorMessage: 'Ürün adı boş olamaz' },
            { id: 'indirimbitis', messageElementId: 'indirimbitis-error', errorMessage: 'İndirim bitiş tarihi boş olamaz' },
            { id: 'urunfiyati', messageElementId: 'urunfiyati-error', errorMessage: 'Ürün fiyatı boş olamaz' },
            { id: 'kat1', messageElementId: 'kat1-error', errorMessage: 'Kategori 1 boş olamaz' },
            { id: 'kat2', messageElementId: 'kat2-error', errorMessage: 'Kategori 2 boş olamaz' }
        ];

        var isValid = true;

        fieldsToValidate.forEach(function (field) {
            var value = document.getElementById(field.id).value;
            var errorElement = document.getElementById(field.messageElementId);

            if (value.trim() === '') {
                // Hata mesajını göster
                errorElement.textContent = field.errorMessage;
                errorElement.style.display = 'block';
                isValid = false;
            } else {
                // Hata mesajını temizle
                errorElement.textContent = '';
                errorElement.style.display = 'none';
            }
        });

        return isValid; // Form geçerli ise true döndür
    }

    // Input alanına yazı yazıldığında ve değer boşsa uyarıyı göster
    function setInputValidation(inputId, errorElementId, errorMessage) {
        var inputElement = document.getElementById(inputId);
        var errorElement = document.getElementById(errorElementId);

        // Input alanına yazı yazıldığında uyarıyı göster
        inputElement.addEventListener('input', function () {
            var value = inputElement.value;

            if (value.trim() === '') {
                // Hata mesajını göster
                errorElement.textContent = errorMessage;
                errorElement.style.display = 'block';
            } else {
                // Hata mesajını temizle
                errorElement.textContent = '';
                errorElement.style.display = 'none';
            }
        });

        // Form onaylandığında kontrol et
        document.getElementById('myFormTurkcell').addEventListener('submit', function () {
            var value = inputElement.value;

            if (value.trim() === '') {
                // Hata mesajını göster
                errorElement.textContent = errorMessage;
                errorElement.style.display = 'block';
            }
        });
    }

    // İlgili input alanları ve hata mesajları için setInputValidation fonksiyonunu çağır
    setInputValidation('urunadi', 'urunadi-error', 'Ürün adı boş olamaz');
    setInputValidation('indirimbitis', 'indirimbitis-error', 'İndirim bitiş tarihi boş olamaz');
    setInputValidation('urunfiyati', 'urunfiyati-error', 'Ürün fiyatı boş olamaz');
    setInputValidation('kat1', 'kat1-error', 'Kategori 1 boş olamaz');
    setInputValidation('kat2', 'kat2-error', 'Kategori 2 boş olamaz');
    // Buraya diğer input alanları ve hata mesajlarını ekleyebilirsiniz
</script>
	
<script>
  function oneDot(input) {
    var value = input.value,
        value = value.split('.').join('');

    if (value.length > 3) {
      value = value.substring(0, value.length - 3) + '.' + value.substring(value.length - 3, value.length);
    }

    input.value = value;
  }

   function sadeceSayi(event) {
       var charCode = event.which || event.keyCode;
       
       // 0-9 arasındaki sayıları kontrol et
       if (charCode < 48 || charCode > 57) {
           event.preventDefault();
       }
   }

   $(".sayisalinput").keyup(function (){
      if (this.value.match(/[^0-9.]/g)){
          this.value = this.value.replace(/[^0-9.]/g,'');
      }
   });
</script>