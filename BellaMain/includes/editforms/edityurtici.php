<?php
		 
	require_once '../../database/connect.php';
	include '../../database/fonk.php';

	if (isset($_REQUEST['id'])) {
			
		$id = intval($_REQUEST['id']);
		$id_sfrli = sifreleWadanz($id);
        $id_sfrsz = sifrecozWadanz($id_sfrli);
		$query = "SELECT * FROM yurtici WHERE id=:id";
		$selectquery = $db->query("SELECT * FROM yurtici WHERE id = '{$id}'")->fetch(PDO::FETCH_ASSOC);
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
        Düzenle: <?php echo $teslimalan; ?>
    </span>
    <!--end::Label-->

    <!--begin::Line-->
    <span class="d-inline-block position-absolute h-3px bottom-0 end-0 start-0 bg-primary translate rounded"></span>
    <!--end::Line-->
</span>

<style>
	.feedbacktelmode {
        text-align: left;
        margin-top: 14px;
    }
</style>
			<div class="modal-body">
			<form id="myFormYurtici">
                     <div class="row">
					<div class="col-lg-6">
                     <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span>Gönderi Kodu</span>&nbsp;<span class="text-danger">(Değiştirilemez!)</span>
                        <span class="ms-1"  data-bs-toggle="tooltip" title="Specify a target priorty" >
                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i></span></label>
                        <input class="form-control form-control-solid" type="text" placeholder="" name="id" id="id" value="<?php echo $id; ?>" autocomplete="off" readonly>
                        <div style="display: none;" class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback feedbacktelmode" id="id-error"></div>
                     </div>
                     </div>
                     <div class="col-lg-6">
                     <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Gönderi Durumu</span>
                        <span class="ms-1"  data-bs-toggle="tooltip" title="Specify a target priorty" >
                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i></span></label>
                        <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="durum">
                        <?php 
                		    if($selectquery['durum']) {
                			    $durum = $selectquery['durum'];
                		    	echo "<option value='$durum' selected>$durum</option>";
                		    } else {
                		    	echo '<option value="" disabled selected>Seçim Yapınız</option>';
                		    }
                	    ?>
						  <option disabled class="text-danger">～～～～～</option>
                          <option value="Hazırlanıyor">Hazırlanıyor</option>
                          <option value="Taşıma Durumunda">Taşıma Durumunda</option>
                          <option value="Varış Biriminde">Varış Biriminde</option>
                          <option value="Dağıtıma Çıktı">Dağıtıma Çıktı</option>
                          <option value="Teslim Edildi">Teslim Edildi</option>
                        </select>
                        <div style="display: none;" class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback feedbacktelmode" id="durum-error"></div>
                     </div>
                     </div>
                     </div>

                     <div class="row">
                     <div class="col-lg-6">
                     <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Gönderen</span>
                        <span class="ms-1"  data-bs-toggle="tooltip" title="Specify a target priorty" >
                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i></span></label>
                        <input class="form-control form-control-solid" type="text" placeholder="" name="gonderen" id="gonderen" value="<?php echo $gonderen; ?>" autocomplete="off">
                        <div style="display: none;" class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback feedbacktelmode" id="gonderen-error"></div>
                     </div>
                     </div>
                     <div class="col-lg-6">
                     <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Teslim Alan</span>
                        <span class="ms-1"  data-bs-toggle="tooltip" title="Specify a target priorty" >
                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i></span></label>
                        <input class="form-control form-control-solid" type="text" placeholder="" name="teslimalan" id="teslimalan" value="<?php echo $teslimalan; ?>" autocomplete="off">
                        <div style="display: none;" class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback feedbacktelmode" id="teslimalan-error"></div>
                     </div>
                     </div>
                     </div>

                     <div class="row">
                     <div class="col-lg-6">
                     <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Çıkış Tarihi</span>
                        <span class="ms-1"  data-bs-toggle="tooltip" title="Specify a target priorty" >
                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i></span></label>
                        <input class="form-control form-control-solid" type="text" placeholder="" name="cikistarihi" id="cikistarihi" value="<?php echo $cikistarihi; ?>" autocomplete="off">
                        <div style="display: none;" class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback feedbacktelmode" id="cikistarihi-error"></div>
                     </div>
                     </div>
                     <div class="col-lg-6">
                     <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Teslim Tarihi</span>
                        <span class="ms-1"  data-bs-toggle="tooltip" title="Specify a target priorty" >
                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i></span></label>
                        <input class="form-control form-control-solid" type="text" placeholder="" name="teslimtarihi" id="teslimtarihi" value="<?php echo $teslimtarihi; ?>" autocomplete="off">
                        <div style="display: none;" class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback feedbacktelmode" id="teslimtarihi-error"></div>
                     </div>
                     </div>
                     </div>

                     <div class="row">
                     <div class="col-lg-4">
                     <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Teslim Birimi</span>
                        <span class="ms-1"  data-bs-toggle="tooltip" title="Specify a target priorty" >
                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i></span></label>
                        <input class="form-control form-control-solid" type="text" placeholder="" name="teslimbirimi" id="teslimbirimi" value="<?php echo $teslimbirimi; ?>" autocomplete="off">
                        <div style="display: none;" class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback feedbacktelmode" id="teslimbirimi-error"></div>
                     </div>
                     </div>
                     <div class="col-lg-4">
                     <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Gönderi Tipi</span>
                        <span class="ms-1"  data-bs-toggle="tooltip" title="Specify a target priorty" >
                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i></span></label>
                        <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="gonderitipi">
                        <?php 
                		    if($selectquery['gonderitipi']) {
                			    $gonderitipi = $selectquery['gonderitipi'];
                		    	echo "<option value='$gonderitipi' selected>$gonderitipi</option>";
                		    } else {
                		    	echo '<option value="" disabled selected>Seçim Yapınız</option>';
                		    }
                	    ?>
						  <option disabled class="text-danger">～～～～～</option>
                          <option value="Gönderici Ödemeli">Gönderici Ödemeli</option>
                          <option value="Alıcı Ödemeli">Alıcı Ödemeli</option>
                        </select>
                        <div style="display: none;" class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback feedbacktelmode" id="gonderitipi-error"></div>
                     </div>
                     </div>
                     <div class="col-lg-4">
                     <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Telefon Numarası</span>
                        <span class="ms-1"  data-bs-toggle="tooltip" title="Specify a target priorty" >
                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i></span></label>
                        <input class="form-control form-control-solid sayisalinput" onkeypress="sadeceSayi(event)" type="text" placeholder="" name="telno" id="telno" value="<?php echo $telno; ?>" autocomplete="off">
                        <div style="display: none;" class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback feedbacktelmode" id="telno-error"></div>
                     </div>
                     </div>
                     </div>

                     <div class="row">
                     <div class="col-lg-6">
                     <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Çıkış Yeri</span>
                        <span class="ms-1"  data-bs-toggle="tooltip" title="Specify a target priorty" >
                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i></span></label>
                        <input class="form-control form-control-solid" type="text" placeholder="" name="cikisyeri" id="cikisyeri" value="<?php echo $cikisyeri; ?>" autocomplete="off">
                        <div style="display: none;" class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback feedbacktelmode" id="cikisyeri-error"></div>
                     </div>
                     </div>
                     <div class="col-lg-6">
                     <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Varış Yeri</span>
                        <span class="ms-1"  data-bs-toggle="tooltip" title="Specify a target priorty" >
                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6"></i></span></label>
                        <input class="form-control form-control-solid" type="text" placeholder="" name="varisyeri" id="varisyeri" value="<?php echo $varisyeri; ?>" autocomplete="off">
                        <div style="display: none;" class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback feedbacktelmode" id="varisyeri-error"></div>
                     </div>
                     </div>
                     </div>

					 <div class="row">
                     <div class="col-lg-12">
                     <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Kargo Aktif / Pasif</span>
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

                     <div class="text-center mt-5">
                        <a data-bs-toggle="modal" data-bs-target="#yurticimodal" data-kt-button="true" class="btn btn-danger">
                            Geri
                        </a>
					 	<input type="hidden" name="yurticiduzenle" value="<?php echo $id_sfrli; ?>">
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
           <a style="display: none;" id="modalOpenButton" data-bs-toggle="modal" data-bs-target="#yurticimodal" data-kt-button="true"></a>

<script>
    document.getElementById('myFormYurtici').addEventListener('submit', function (event) {
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
                        text: 'Kargo düzenlendi!',
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
            { id: 'id', messageElementId: 'id-error', errorMessage: 'Gönderi kodu boş olamaz' },
            { id: 'gonderen', messageElementId: 'gonderen-error', errorMessage: 'Gönderen boş olamaz' },
            { id: 'teslimalan', messageElementId: 'teslimalan-error', errorMessage: 'Teslim alan boş olamaz' },
            { id: 'cikistarihi', messageElementId: 'cikistarihi-error', errorMessage: 'Çıkış tarihi boş olamaz' },
            { id: 'teslimtarihi', messageElementId: 'teslimtarihi-error', errorMessage: 'Teslim tarihi boş olamaz' },
            { id: 'teslimbirimi', messageElementId: 'teslimbirimi-error', errorMessage: 'Teslim birimi boş olamaz' },
            { id: 'telno', messageElementId: 'telno-error', errorMessage: 'Telefon numarası boş olamaz' },
            { id: 'cikisyeri', messageElementId: 'cikisyeri-error', errorMessage: 'Çıkış yeri boş olamaz' },
            { id: 'varisyeri', messageElementId: 'varisyeri-error', errorMessage: 'Varış yeri boş olamaz' }
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
        document.getElementById('myFormYurtici').addEventListener('submit', function () {
            var value = inputElement.value;

            if (value.trim() === '') {
                // Hata mesajını göster
                errorElement.textContent = errorMessage;
                errorElement.style.display = 'block';
            }
        });
    }

    // İlgili input alanları ve hata mesajları için setInputValidation fonksiyonunu çağır
    setInputValidation('id', 'id-error', 'Ürün adı boş olamaz');
    setInputValidation('gonderen', 'gonderen-error', 'Gönderen boş olamaz');
    setInputValidation('teslimalan', 'teslimalan-error', 'Teslim alan boş olamaz');
    setInputValidation('cikistarihi', 'cikistarihi-error', 'Çıkış tarihi boş olamaz');
    setInputValidation('teslimtarihi', 'teslimtarihi-error', 'Teslim tarihi boş olamaz');
    setInputValidation('teslimbirimi', 'teslimbirimi-error', 'Teslim birimi boş olamaz');
    setInputValidation('telno', 'telno-error', 'Telefon numarası boş olamaz');
    setInputValidation('cikisyeri', 'cikisyeri-error', 'Çıkış yeri boş olamaz');
    setInputValidation('varisyeri', 'varisyeri-error', 'Varış yeri boş olamaz');
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