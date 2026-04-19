

<?php
include('baglan.php');

ob_start();
session_start();
if(empty($_SESSION['username']))
{
  header("location:giris.php");
}


if($_POST){

move_uploaded_file($_FILES["urunresmi"]["tmp_name"],"dosyalar/ilan/" . $_FILES["urunresmi"]["name"]);

$urunresmi=$_FILES["urunresmi"]["name"];

$urunadi=$_POST['urunadi'];
$saticiadi=$_POST['saticiadi'];
$urunaciklama=$_POST['urunaciklama'];
$urunfiyat=$_POST['urunfiyat'];
$urunkategori=$_POST['urunkategori'];


$ekle=$conn->prepare("insert into ty_ilan set urunadi=?,saticiadi=?,urunaciklama=?,urunfiyat=?,urunkategori=?,urunresmi=?");
$ekle->execute(array($urunadi,$saticiadi,$urunaciklama,$urunfiyat,$urunkategori,$urunresmi));
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

<?php
include("inc/title.php");
?>

</head>

<body class="">
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<!-- [ Pre-loader ] End -->
	<!-- [ Mobile header ] start -->
	<div class="pc-mob-header pc-header">
		<div class="pcm-logo">
			<img src="resim/logo.png" alt="" class="logo logo-lg">
		</div>
		<div class="pcm-toolbar">
			<a href="#!" class="pc-head-link" id="mobile-collapse">
				<div class="hamburger hamburger--arrowturn">
					<div class="hamburger-box">
						<div class="hamburger-inner"></div>
					</div>
				</div>
			</a>
			<a href="#!" class="pc-head-link" id="headerdrp-collapse">
			
			</a>
			<a href="#!" class="pc-head-link" id="header-collapse">
			
			</a>
		</div>
	</div>
<?php
include("inc/menu.php");
?>
	
	
<div class="pc-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="page-header-title">
                            <h5 class="m-b-10"> V İ K T O R P İ A </h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Telegram</a></li>
                            <li class="breadcrumb-item"> @viktorpia</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- support-section start -->
            <div class="col-xl-6 col-md-12">
                <div class="card flat-card">
                <div class="card-body">
                        <h5> Ürün Ekle</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                            <form method="post"  enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputEmail1"> Ürün Adı</label>
                                        <input type="text" name="urunadi" class="form-control" required  placeholder="Ürün Adı">
                                      
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputPassword1">Satıcı Adı </label>
                                        <input type="text" name="saticiadi" class="form-control" required placeholder="Ürün Marka">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputPassword1">Ürün Açıklaması</label>
                                        <input type="text" name="urunaciklama" class="form-control" required  placeholder="Ürün Açıklaması">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputPassword1">Ürün Fiyatı</label>
                                        <input type="text" name="urunfiyat" class="form-control"  required placeholder="Ürün Fiyatı">
                                    </div>


                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputPassword1">Kategori : Örn : Telefon </label>
                                        <input type="text" name="urunkategori" class="form-control" required placeholder="Ürün Kodu">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputPassword1">Ürün Resmi </label>
                                        <input type="file" name="urunresmi" class="form-control" accept=".jpg, .jpeg, .pdf" required  placeholder="Ürün Resmi">
                                    </div>
                                  
                                    <button  type="submit" name="submit"  class="btn  btn-primary">Oluştur</button>
                                </form>
                            </div>
                         
                        </div>
                       
               
                
                
                         
                        
                  
                  
                </div>
           
            </div>
          
       
      
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->
    <!-- Warning Section start -->
    <!-- Older IE warning message -->
    <!--[if lt IE 11]>
        <div class="ie-warning">
            <h1>Warning!!</h1>
            <p>You are using an outdated version of Internet Explorer, please upgrade
               <br/>to any of the following web browsers to access this website.
            </p>
            <div class="iew-container">
                <ul class="iew-download">
                    <li>
                        <a href="http://www.google.com/chrome/">
                            <img src="assets/images/browser/chrome.png" alt="Chrome">
                            <div>Chrome</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.mozilla.org/en-US/firefox/new/">
                            <img src="assets/images/browser/firefox.png" alt="Firefox">
                            <div>Firefox</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.opera.com">
                            <img src="assets/images/browser/opera.png" alt="Opera">
                            <div>Opera</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.apple.com/safari/">
                            <img src="assets/images/browser/safari.png" alt="Safari">
                            <div>Safari</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                            <img src="assets/images/browser/ie.png" alt="">
                            <div>IE (11 & above)</div>
                        </a>
                    </li>
                </ul>
            </div>
            <p>Sorry for the inconvenience!</p>
        </div>
    <![endif]-->
    <!-- Warning Section Ends -->
    <!-- Required Js -->
    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/plugins/feather.min.js"></script>
    <script src="assets/js/pcoded.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script> -->
    <!-- <script src="assets/js/plugins/clipboard.min.js"></script> -->
    <!-- <script src="assets/js/uikit.min.js"></script> -->

<!-- Apex Chart -->
<script src="assets/js/plugins/apexcharts.min.js"></script>


<!-- custom-chart js -->
<script src="assets/js/pages/dashboard-sale.js"></script>
</body>

</html>
