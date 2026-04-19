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
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
	<!-- Icons CSS -->
	<link rel="stylesheet" href="assets/css/icons.css" />
	<!-- App CSS -->
	<link rel="stylesheet" href="assets/css/app.css" />
  


</head>

<body class="bg-theme bg-theme1">
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
                                     <img src="assets/user.png" class="user-img" alt="user avatar">
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
						<div class="col-12 col-lg-9 mx-auto">
							<div class="card radius-15">
								<div class="card-body">
									<div class="card-title">
										<h4 class="mb-0">Ürün Ekle</h4>
									</div>
									<hr/>
									<div class="form-body">
                                    <form id="new-product-form">
										<div class="form-group row">
											<label class="col-sm-2 col-form-label" for="product-name">Ürün Adı</label>
											<div class="col-sm-6">
												<input type="text" id="product-name" name="product-name" class="form-control" required>
											</div>
											
										</div>

                                        <div class="form-group row">
											<label class="col-sm-2 col-form-label" for="product-brand">Ürün Marka</label>
											<div class="col-sm-6">
												<input type="text" id="product-brand" name="product-brand" class="form-control" required>
											</div>
											
										</div>

                                        <div class="form-group row">
											<label class="col-sm-2 col-form-label" for="product_properties">Ürün Açıklaması</label>
											<div class="col-sm-6">
												<textarea class="form-control" rows="3" cols="3" id="product_properties" required></textarea>
											</div>
										</div>
                                        <div class="form-group row">
											<label class="col-sm-2 col-form-label" for="product-code">Ürün Kodu</label>
											<div class="col-sm-6">
												<input type="text" id="product-code" name="product-code" class="form-control" required>
											</div>
											
										</div>
                                        <div class="form-group row">
											<label class="col-sm-2 col-form-label" for="product-price">Ürün Fiyatı</label>
											<div class="col-sm-6">
												<input type="text" id="product-price" name="product-price" class="form-control"  type="number" min="0" required>
											</div>
											
										</div>
										
									    <div class="form-group row">
											<label class="col-sm-2 col-form-label" for="product-image"> Ürün Resmi</label>
											<div class="col-sm-6">
                                            <input class="form-control" id="product-image" name="product-image" type="file" accept="image/*" required>
											</div>
											
										</div>
										<div class="form-group row">
											<label class="col-sm-2 col-form-label"></label>
											<div class="col-sm-10">
												<button type="submit" class="btn btn-light px-4">Ürün Ekle</button>
											</div>
										</div>
                                    </form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--end row-->
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
      <!-- CKEditor -->
      <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<!--plugins-->
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	

    <script>
    $(document).ready(function () {
        CKEDITOR.config.entities_latin = false;
        CKEDITOR.replace('product_properties');
        // get ckeditor data
        const form = $('#new-product-form');
        const productName = $('#product-name');
        const productPrice = $('#product-price');
        const productImage = $('#product-image');
        const productBrand = $('#product-brand');
        const productCode = $('#product-code');
        const action = 'new-product';
        form.submit(function (event) {
            event.preventDefault();
            const formData = new FormData();
            formData.append('name', productName.val());
            formData.append('price', productPrice.val());
            formData.append('image', productImage[0].files[0]);
            formData.append('action', action);
            formData.append('properties', CKEDITOR.instances.product_properties.getData());
            formData.append('brand', productBrand.val());
            formData.append('code', productCode.val());
            $.ajax({
                url: 'inc/ajax.php',
                type: 'POST',
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    response = JSON.parse(response);
                    if (response.status) {
                        toastr.success(response.message);
                    
                        setTimeout(function () {
                            window.location.href = 'urunlistele.php';
                        }, 3000); 
                    } else {
                        toastr.error(response.message);
                    }
                }
            });
        });
    });
</script>

<script>
		new PerfectScrollbar('.dashboard-social-list');
		new PerfectScrollbar('.dashboard-top-countries');
	</script>
	<!-- App JS -->
	<script src="assets/js/app.js"></script>

</body>

</html>