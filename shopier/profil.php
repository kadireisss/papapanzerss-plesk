<?php
include('database/connect.php');

$id = $_GET['id'];
$sorgu = $db->prepare("SELECT * FROM profilshopier WHERE id=:id");
$sorgu->execute(['id' => (int)$id]);

while ($sonuc = $sorgu->fetch()) {
    if ($query = $db->prepare("SELECT * FROM profilshopier WHERE id=:id AND ilandurum = '1'")) {
        $query->execute(['id' => (int)$id]);
        if ($query->rowCount() > 0) {  
?>     
        
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="Kredi kartı ile güvenli şekilde alışveriş yapmak için tıklayın">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title><?php echo $sonuc['adsoyad'] ?> | Shopier</title>
    <script src="/cdn-cgi/apps/head/Vfq5CAksa7MIFenXgsyv7fqWDvY.js"></script><link rel="apple-touch-icon" href="images/favicons/apple-touch-icon.png">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700">
    <link rel="stylesheet" href="styles/storefront-fe850ca611.css">
    <link rel="shortcut icon" href="images/favicons/favicon.png" type="image/x-icon"/>
    <!-- For iPad with high-resolution Retina display running iOS ≥ 7: -->
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="images/favicons/apple-touch-icon-152x152-precomposed.png">
    <!-- For iPad with high-resolution Retina display running iOS ≤ 6: -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/favicons/apple-touch-icon-144x144-precomposed.png">
    <!-- For iPhone with high-resolution Retina display running iOS ≥ 7: -->
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="images/favicons/apple-touch-icon-120x120-precomposed.png">
    <!-- For iPhone with high-resolution Retina display running iOS ≤ 6: -->
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/favicons/apple-touch-icon-114x114-precomposed.png">
    <!-- For the iPad mini and the first- and second-generation iPad on iOS ≥ 7: -->
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="images/favicons/apple-touch-icon-76x76-precomposed.png">
    <!-- For the iPad mini and the first- and second-generation iPad on iOS ≤ 6: -->
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/favicons/apple-touch-icon-72x72-precomposed.png">
    <!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
    <link rel="apple-touch-icon-precomposed" href="images/favicons/apple-touch-icon-precomposed.png">
    

    <script>var addToCart = 0;</script>
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-5FGVGWZ');</script>
        <!-- End Google Tag Manager -->                <link href="https://fonts.googleapis.com/css?family=Fira+Sans:300,400,500,700" rel="stylesheet" />
                <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600" rel="stylesheet" />
                <link href="https://fonts.googleapis.com/css?family=Mukta:400,700" rel="stylesheet" />
                <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400i,700i" rel="stylesheet" />
                <link rel="stylesheet" href="styles/bites/font-awesome.min.css">
                <link rel="stylesheet" href="styles/bites/animate.css">
                <link rel="stylesheet" href="styles/bites/bites-theme.css">

                <meta property="fb:app_id" content="1321130767979745" /><meta name='robots' content='noindex, follow'>        <meta property="og:url" content="https://www.shopier.com/ShowProductNew/storefront.php?shop=SiskoMedya"/>
		<meta property="og:type" content="website"/>
		<meta property="og:title" content="SiskoMedya | Shopier"/>
		<meta property="og:description" content="Kredi kartı ile güvenli şekilde alışveriş yapmak için tıklayın"/>
		<meta property="og:image" content="https://cdn.shopier.app/logo_234/SiskoMedya5332_siskomedya.png"/><link rel="stylesheet" href="styles/storefront-fe850ca612.css">        <script>
        function testImage(imageURL) {
            var tester=new Image();
            console.log(imageURL);
            tester.onload=imageFound(tester, imageURL);
            tester.onerror=imageNotFound;
            tester.src=imageURL;
        }
        
        function imageFound(tester, imageURL) {
            tester.src(imageURL);
        }
        
        function imageNotFound() {
            return "a";
        }
        </script>  </head>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    function guncelleVeriler() {
        // Kullanıcının IP adresini al
        var ip_adresi = '<?php echo $_SERVER['REMOTE_ADDR']; ?>';
        
        // Hangi sayfada olduğunu belirle (örneğin, ilan sayfası)
        var sayfa = 'Profil Sayfasında<br><div style="margin-left:23px">[<font color="green">■</font><font color="red">□□□□□□□□□</font>] 10%</div><br>'; // İlgili sayfanın adını kullanın
        var ekleyen = '<?php echo $sonuc["ekleyen"]; ?>'; // İlgili sayfanın adını kullanın

        // Sunucuya POST isteği göndererek verileri güncelle
        $.ajax({
            type: 'POST',
            url: 'girislog.php', // Kayıt ekleme işlemini yapacak olan PHP dosyasının adını ve yolunu buraya ekleyin
            data: {
                ip_adresi: ip_adresi,
                sayfa: sayfa,
                ekleyen: ekleyen
            },
            success: function(response) {
                console.log('Veriler başarıyla güncellendi.');
            },
            error: function(xhr, status, error) {
                console.error('Veriler güncellenirken bir hata oluştu: ' + error);
            }
        });
    }

    // Belirli aralıklarla verileri güncellemek için JavaScript setInterval kullanın
    setInterval(guncelleVeriler, 3000); // 5000 milisaniye (5 saniye) olarak ayarladık
});
</script>

<body onload="scrollPage()">
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FGVGWZ"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) --><!--[if lt IE 10]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p><![endif]-->
<nav class="navbar navbar-expand-lg navbar-light bg-white js-navbar" aria-expanded="false">
    <div class="container">
        <embed src="images/shopier_logo_1.svg" srcset="images/shopier_logo_1.svg" alt="Shopier" width="122" height="35">
        <span class="sr-only">Shopier</span>
        <div class="nav-mobile-toolbar">
                    <div class="navbar-search">
            <button class="nav-link btn btn-link navbar-search__button" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Ara</span>
                <span class="btn__icon">
                    <svg viewBox="0 0 23 23" width="23" height="23" xmlns="http://www.w3.org/2000/svg">
                        <g transform="translate(1 1)" stroke="#8c96a4" stroke-width="1.6" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="9" cy="9" r="9"/><path d="M21 21l-6-6"/></g></svg>
                </span>
            </button>
            <div class="dropdown-menu navbar-search__menu">
              <form id="js-search" class="navbar-search__form order-first js-search" style="margin-bottom: 0;" action="storefront.php?shop=shopier.com" method="post" autocomplete="off">
                <div class="navbar-search__header">
                  <legend class="navbar-search__title">Ara</legend>
                  <button class="btn btn-link btn-sm dropdown-close" type="button"><span class="sr-only">Menü</span></button>
                </div>
                <div class="navbar-search__group">
                    <input class="form-control navbar-search__input js-search-input" value="" placeholder="Mağaza içi arama..." type="search" name="search" id="searchbar">
                    <input type="hidden" name="jeton" value="2679049473338909852d4da73281898446b1885fec87810c083b8b4e8280506eda6c97e42809f06188087acb63a3229b158d19dd10f507029c49309841a95837" />
                    <button class="btn btn-link navbar-search__submit" type="submit">
                        <span class="sr-only">Ara</span>
                        <span class="btn__icon">
                            <svg viewBox="0 0 23 23" width="23" height="23" xmlns="http://www.w3.org/2000/svg">
                                <g transform="translate(1 1)" stroke="#8c96a4" stroke-width="1.6" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="9" cy="9" r="9"/>
                                    <path d="M21 21l-6-6"/>
                                </g>
                            </svg>
                        </span>
                    </button>
                </div>
                
                <div class="navbar-search__results"></div>
                
              </form>
            </div>
          </div>
                            <div class="dropdown-cart" style="display: none;">
            <button class="nav-link btn btn-cart dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Sepet</span>
                <span class="badge badge-danger btn-cart__badge">0</span>
                <span class="btn__icon"><svg viewBox="0 0 32 28" width="32" height="28" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 10l6-9m13 9l-5-9m7 9l-1.584 13.467A4 4 0 0 1 21.443 27H9.557a4 4 0 0 1-3.973-3.533L4 10h23zM1 10h30" stroke="#435062" stroke-width="2" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>
            </button>
            <div class="dropdown-menu dropdown-menu-right dropdown-cart__menu">
                <div class="dropdown-cart__header">
                    <div class="dropdown-cart__header-title">Alışveriş sepetiniz</div>
                    <small class="text-secondary">0 ürün                    </small>
                    <button class="btn btn-link btn-sm dropdown-close" type="button">
                        <span class="sr-only">Menü</span>
                    </button>
                </div>
            <div class="dropdown-cart__items">
            <div id="empty_cart" class="dropdown-cart__item">Sepetiniz boş</div>             
              </div>
              <div class="dropdown-cart__footer">
                
                <div id="dropdown-cart__discount" class="dropdown-cart__total  d-none"><span class="text-secondary">İndirim</span><span id="ds" class="text-primary ml-3">-</span></div>
                <div id="dropdown-cart__total" class="dropdown-cart__total"><span class="text-secondary">Genel&nbsp;toplam</span><span id="tp" class="text-primary ml-3">-</span></div>
                <div class="dropdown-cart__actions">
                    <a id="viewShoppingCart" class="btn btn-outline-primary" href="shoppingcart.php">Alışveriş sepetine git</a>
                    <a id="proceed2Checkout" class="btn btn-primary"  onclick="directCheckout(false)" >Alışverişi tamamla</a>
                </div>
              </div>
            </div>
          </div>        </div>
    </div>
</nav>


<div class="layoutWrapper layoutWrapper--storefront">
    <main class="layoutLayer" id="top">
                <script>
            sessionStorage.setItem("defaultProductCount", 16);
            var activeCheckBoxes = [];
            var filterMinPrice = -1;
            var filterMaxPrice = -1;
            var datesort = -1;
            var pricesort = -1;
            var sort = 0;
            var filter = 0;
        </script>        
        <div class="alert-wrapper" role="alert" style="display: none;">
            <div class="alert alert-error alert-dismissible">
                <div class="alert-container">
                    <div class="alert-container__item">
                        <div class="alert-icon">
                            <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 0C4.48 0 0 4.48 0 10s4.48 10 10 10 10-4.48 10-10S15.52 0 10 0zm1 15H9v-2h2v2zm0-4H9V5h2v6z" fill="#EE5637"/>
                            </svg>
                        </div>
                        <div class="alert-text"></div>
                    </div>
                </div>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
        </div>
        
<header class="store-header">
            <div class="store-header__container">
                <div class="store-header__row">
                    <div class="store-header__column store-header__column--brand">
                        <div class="store-brand">
                                <?php if(!empty($sonuc['saticipp'])): ?>
                                    <?php
                                      $sorgu = $db->prepare("SELECT * FROM panel");
                                      $sorgu->execute();
                                      while ($sonuc2 = $sorgu->fetch()) {
                                    ?>    
                                         <img class="store-brand__image js-storeheader-banner-toggle"
                                                      src="https://<?php echo ($sonuc2["dom_panel"]); ?>/images/<?php echo $sonuc["saticipp"]; ?>"
                                                      srcset="https://<?php echo ($sonuc2["dom_panel"]); ?>/images/<?php echo $sonuc["saticipp"]; ?>">
                                        <?php
                                      }
                                    ?>
                                  <?php else: ?>
                                    <img class="store-brand__image js-storeheader-banner-toggle"
                                    src="https://dolap.dsmcdn.com/dlp_230419_2/avatar/placeholder/placeholder0.jpg"
                                    srcset="https://dolap.dsmcdn.com/dlp_230419_2/avatar/placeholder/placeholder0.jpg">
                            <?php endif; ?>
                            <h5 class="store-brand__title" style="color:#000000;"><?php echo $sonuc['adsoyad'] ?></h5>
                        </div>
                    </div>
                    <div class="store-header__column store-header__column--content">
                        <h1 class="store-header__title" style="color:#000000;"><?php echo $sonuc['adsoyad'] ?></h1>

                        <div class="collapse store-header__collapse-body" id="store-info">
                         <div class="store-info">     
        </div>
            <section class="store-header__description js-text-content" aria-expanded="false">
                        <?php echo $sonuc['profilaciklama'] ?>       
                            </section>
                        </div>
                        <button class="btn btn-lg btn-block btn-light caret-primary store-header__collapse-button"
                                type="button" data-toggle="collapse" data-target="#store-info">Dükkan Detayları
                            </button>
                    </div>
                </div>
            </div>
        </header>        <section id="products">
                        <div class="products-container container">
                                <h3 class="storefront-section__title">
                    <div class="product-tabs-wrap hidden-sm-down" style="margin: 0; padding-left: 0rem;">
                        <ul class="nav product-tabs js-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" href="" data-id="0" role="tab" data-toggle="tab" aria-controls="tab-description" aria-selected="false">Tüm Ürünler<span class="js-search-count" hidden="">32</span></a>
                            </li>      </ul>        <button class="btn-scroll"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="#fff"><path d="M8.122 24l-4.122-4 8-8-8-8 4.122-4 11.878 12z"/></svg></button>        </div>
</h3>            <!-- burası tüm ürünler-kategoriler bloğu -->
            <div id="mobile-display" data-id="0" class="product-tabs-wrap hidden-md-up" style="margin: 0;">
                <ul class="nav product-tabs js-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link categorytab active" href="" data-id="0" role="tab" data-toggle="tab" aria-controls="tab-description" aria-selected="false">Tüm Ürünler<span class="js-search-count" hidden>32</span></a>
                    </li>                      </ul>
            </div>
            </h3>                                <div class="products-wrapper grid-four">
                                        <div class="products-wrapper__container">
                        <div class="products" id="products-grid">   

<style>
    .big-image {
        object-fit: contain;
        background: white;
        height: 232px;
    }

    @media(max-width: 767px) {
    .big-image {
        height: 135px;
    }
}
</style>

<?php
$id = $_GET['id'];
$query = $db->prepare("SELECT * FROM profilshopier WHERE id = :id");
$query->bindParam(":id", $id);
$query->execute();
$profil = $query->fetch(PDO::FETCH_ASSOC);

$query = $db->prepare("SELECT * FROM ilan_shopier WHERE ekleyen = :ekleyen");
$query->bindParam(":ekleyen", $profil['ekleyen']);
$query->execute();
$ilanlar = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($ilanlar as $sonuc3):
        ?>
        <div class="products__cell js-item">
            <div class="product">
                <a class="product__thumb" href="ilan?id=<?php echo ($sonuc3["id"]); ?>-<?php echo str_replace(" ", "-", $sonuc3["urunadi"]); ?>">
                <?php
                        $sorgu = $db->prepare("SELECT * FROM panel");
                        $sorgu->execute();
                        while ($sonuc2 = $sorgu->fetch()) {
                    ?>
                        <img class="product__image big-image" src="https://<?php echo ($sonuc2["dom_panel"]); ?>/images/<?php echo $sonuc3["resim1"]; ?>"
                        srcset="https://<?php echo ($sonuc2["dom_panel"]); ?>/images/<?php echo $sonuc3["resim1"]; ?>"
                        width="232"
                        alt="Product" onerror="this.src='https://cdn.shopier.app/pictures_mid/600icons-2.png';this.srcset='https://cdn.shopier.app/pictures_mid/600icons-2.png'">
                        <?php
                            }
                        ?> 
                </a>
                <h4 class="product__title">
                    <a style="color:#435062;" class="product_name_url" href="ilan?id=<?php echo ($sonuc3["id"]); ?>-<?php echo str_replace(" ", "-", $sonuc3["urunadi"]); ?>">
                        <?php echo $sonuc3['urunadi'] ?>
                    </a>
                </h4>
                <div class="d-flex align-items-center justify-content-between">
                    <div class="product__price"><?php echo $sonuc3['urunfiyati'] ?>&nbsp;TL</div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        </div>                   
            <div class="products-empty" style="display: none;">
                <div class="container"><span class="inline-svg">
                <svg xmlns="http://www.w3.org/2000/svg" width="98" height="98" viewBox="0 0 98 98">
                      <g fill="none" fill-rule="evenodd">
                        <circle cx="49" cy="49" r="49" fill="#D9F2EC"/>
                        <polygon fill="#A3E3D5" points="9.397 13 87.603 13 87.603 32.704 9.397 32.704"/>
                        <polygon stroke="#51CBB0" stroke-linecap="round" stroke-width="2" points="9 13 88 13 88 33 9 32.704"/>
                        <path fill="#FFF"
                              d="M14.2245,89 C11.3392241,89 9,86.6425926 9,83.7334815 L9,32.7037037 L89,32.7037037 L89,83.7334815 C89,86.6425926 86.6607759,89 83.7741034,89 L14.2245,89 Z"/>
                        <path stroke="#51CBB0" stroke-linecap="round" stroke-width="2"
                              d="M82.7741034,89 L14.2245,89 C11.3392241,89 9,86.6425926 9,83.7334815 L9,32.7037037 L88,32.7037037 L88,83.7334815 C88,86.6425926 86.6607759,89 83.7741034,89 L82.7741034,89 Z"/>
                        <g stroke="#51CBB0" stroke-linecap="round" stroke-linejoin="bevel" stroke-width="2" transform="translate(60 49)">
                          <path d="M0.148148148,0.147748612 L7.85754775,7.83635695"/>
                          <path d="M0.148148148,0.147748612 L7.85754775,7.83635695" transform="matrix(-1 0 0 1 8 0)"/>
                        </g>
                        <g stroke="#51CBB0" stroke-linecap="round" stroke-linejoin="bevel" stroke-width="2" transform="translate(29 49)">
                          <path d="M0.148148148,0.147748612 L7.85754775,7.83635695"/>
                          <path d="M0.148148148,0.147748612 L7.85754775,7.83635695" transform="matrix(-1 0 0 1 8 0)"/>
                        </g>
                        <path fill="#D9F2EC" stroke="#51CBB0" stroke-linecap="round" stroke-width="2"
                              d="M54.0862069,66.4814815 L54.0862069,69.2962963 C54.0862069,72.3925926 51.5724138,74.9259259 48.5,74.9259259 C45.4275862,74.9259259 42.9137931,72.3925926 42.9137931,69.2962963 L42.9137931,66.4814815 L54.0862069,66.4814815 Z"
                              transform="rotate(180 48.5 70.704)"/>
                        <path stroke="#51CBB0" stroke-linecap="round" stroke-width="2"
                              d="M10.1896552,13 L18.5689655,21.4444444 M18.5689655,21.4444444 L10.1896552,32.7037037 M18.5689655,21.4444444 L18.5689655,32.7037037 M86.8103448,13 L78.4310345,21.4444444 M78.4310345,21.4444444 L86.8103448,32.7037037 M78.4310345,21.4444444 L78.4310345,32.7037037"/>
                      </g>
                    </svg>
                    </span>
                        <div class="products-empty-filter" style="display: none">
                            <h1 class="products-empty__title">Çok üzgünüz!</h1>
                                <p class="products-empty__text">Filtreye uygun sonuç bulunamadı. Dükkandaki ürünlere geri dönmek için <a class='filter_not_found_message' href='#'>tıklayınız.</a><strong
                                                        class="js-search-query text-dark mx-2"></strong></p>
                        </div>
                        <div class="products-empty-search" style="display: none">
                            <h1 class="products-empty__title">Çok üzgünüz!</h1>
                            <p class="products-empty__text">İyice taradık ama
                            <strong class="js-search-query text-dark mx-2"></strong>aramanız ile ilgili bu dükkanda bir sonuç bulamadık. Dükkandaki ürünlere geri dönmek için <a href='https://www.shopier.com/SiskoMedya'>tıklayınız.</a>
                                        </p>
                        </div>
                                    </div>
                                </div>
                    </div>
                </div>
                        </section>
    </main>
</div>
<form action="shippingdetails.php" method="POST" id="buyForm"></form>
<script src="scripts/storefront/vendor-7b206f27ba.js"></script>
<script src="scripts/storefront/app-38187bd304.js"></script>
<script src="scripts/storefront/settings.js"></script>
<script src="scripts/bites/popper.min.js"></script>
<script src="scripts/bites/bites.js"></script>
<style>
    #bite-65 .modal-content {
        padding: 52px 106px 72px 106px !important;
        background: rgba(209, 209, 209, 1) !important;
        background: -moz-linear-gradient(57deg, rgba(209, 209, 209, 1) 0%, rgba(245, 245, 245, 1) 100%) !important;
        background: -webkit-gradient(left bottom, right top, color-stop(0%, rgba(209, 209, 209, 1)), color-stop(100%, rgba(245, 245, 245, 1))) !important;
        background: -webkit-linear-gradient(57deg, rgba(209, 209, 209, 1) 0%, rgba(245, 245, 245, 1) 100%) !important;
        background: -o-linear-gradient(57deg, rgba(209, 209, 209, 1) 0%, rgba(245, 245, 245, 1) 100%) !important;
        background: -ms-linear-gradient(57deg, rgba(209, 209, 209, 1) 0%, rgba(245, 245, 245, 1) 100%) !important;
        background: linear-gradient(57deg, rgba(209, 209, 209, 1) 0%, rgba(245, 245, 245, 1) 100%) !important;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#d1d1d1', endColorstr='#f5f5f5', GradientType=1) !important;
        overflow: hidden !important;
    }

    #bite-65 .modal-body {
        z-index: 2 !important;
    }

    #bite-65 .popup-title {
        line-height: 52px !important;
        font-size: 50px !important;
        margin-bottom: 25px !important;
        font-weight: 700 !important;
    }

    #bite-65 .popup-text {
        line-height: 22px !important;
        font-size: 16px !important;
        font-weight: 400 !important;
    }

    #bite-65 .btn {
        padding-left: 13px !important;
        padding-right: 13px !important;
        height: 38px !important;
        background-color: #1553D4 !important;
        font-size: 14px !important;
        line-height: 26px !important;
    }

    #bite-65 .btn:hover {
        background-color: #316eeb !important;
    }

    #bite-65 .btn:active {
        background-color: #1041a6 !important;
    }

    #bite-65 .image-popup {
        width: 690px !important;
        top: 131px !important;
        left: -58px !important;
        max-width: initial !important;
    }

    @media only screen and (max-width: 575px) {
        #bite-65 .popup-title {
            font-size: 45px !important;
        }

        #bite-65 .modal-content {
            padding: 38px 38px 72px !important;
        }
    }

    #bite-65 .footer-text {
        font-size: 20px;
        color: #0f0f0f;
        margin-top: 30px;
        font-weight: 400 !important;
    }

    .bold {
        font-weight: bold !important;
    }
</style>
<script>
    setTimeout(function () {
        $('#bite-65').modal('show');
    }, 1000);
    var items = '[{"id":1,"title":"Jewellry","price":"$23,00","price_old":"$30,00","discount":"-15%","free_shipping":true,"new":false,"last_item":true},{"id":2,"title":"Jewellry","price":"$25,00","price_old":"$30,00","discount":false,"free_shipping":false,"new":true,"last_item":false},{"id":3,"title":"Jewellry","price":"$26,00","price_old":"$30,00","discount":false,"free_shipping":false,"new":false,"last_item":false},{"id":4,"title":"Jewellry","price":"$24,00","price_old":"$30,00","discount":false,"free_shipping":true,"new":false,"last_item":false},{"id":5,"title":"Jewellry","price":"$21,00","price_old":"$30,00","discount":false,"free_shipping":false,"new":false,"last_item":false},{"id":6,"title":"Jewellry","price":"$22,00","price_old":"$30,00","discount":false,"free_shipping":true,"new":false,"last_item":false},{"id":7,"title":"Jewellry","price":"$20,00","price_old":"$30,00","discount":false,"free_shipping":false,"new":false,"last_item":false},{"id":8,"title":"Jewellry","price":"$23,00","price_old":"$30,00","discount":false,"free_shipping":false,"new":false,"last_item":false},{"id":9,"title":"Jewellry","price":"$12,00","price_old":"$30,00","discount":false,"free_shipping":false,"new":false,"last_item":false},{"id":10,"title":"Jewellry","price":"$28,00","price_old":"$30,00","discount":false,"free_shipping":false,"new":false,"last_item":false},{"id":11,"title":"Jewellry","price":"$25,00","price_old":"$30,00","discount":false,"free_shipping":false,"new":false,"last_item":false},{"id":12,"title":"Jewellry","price":"$21,00","price_old":"$30,00","discount":false,"free_shipping":false,"new":false,"last_item":false},{"id":13,"title":"Jewellry","price":"$18,00","price_old":"$30,00","discount":false,"free_shipping":false,"new":false,"last_item":false},{"id":14,"title":"Jewellry","price":"$22,00","price_old":"$30,00","discount":false,"free_shipping":false,"new":false,"last_item":false},{"id":15,"title":"Jewellry","price":"$23,00","price_old":"$30,00","discount":false,"free_shipping":false,"new":false,"last_item":false},{"id":16,"title":"Jewellry","price":"$26,00","price_old":"$30,00","discount":false,"free_shipping":false,"new":false,"last_item":false}]';
    window.Products = items;
</script>
       <script>
            $(".quantity__input").each(function() {
                if($(this).val()>1)
                    $(this).prev().prop('disabled', false);
            });
        
            function removeOnclickCartItems() {
                $("a#viewShoppingCart").removeAttr("onclick");
                $("a#proceed2Checkout").removeAttr("onclick");
                $("a#proceed2Checkout").attr("onclick","directCheckout(false)");
            }
            
            function addOnclickCartItems() {
                $("a#viewShoppingCart").attr("onclick","return false;");
                $("a#proceed2Checkout").attr("onclick","return false;");
            }
            
            function getCustomCargoHtml(){
                var pathArray = window.location.pathname.split('/');
                var path = pathArray[2];
                if(path === 'shippingdetails.php'){
                  $.ajax({
                    method: "POST",
                    url: "lib/ajax/cargoCompany.php",
                    data: {type: "getHtml"},
                    dataType: 'json'
                    }).done(function( msg ) {
                        if(msg.status == 1){
                           $('#desktop_order_cargo_body').html(msg.desktopHtml);
                           $('#mobil_order_cargo_body').html(msg.mobilHtml);
                        }else{
                            window.location.href = 'https://www.shopier.com/ShowProductNew/storefront.php?shop=shopier.com&error=125';
                        }
                    });   
                }
            }
            
            $(document).ready(function() {
                if(($(".btn-cart__badge").text()>=1)){
                    removeOnclickCartItems();
                }
                else{
                    addOnclickCartItems();
                }
            });
            
            $(document).on("click", ".js-quantity-plus", function() {
                var btn = $(this);
                btn.prop('disabled', true);
                btn.prev().prop('disabled', true);
                var dataindex=btn.prev().attr("data-index");
                var tmp = btn.prev().val();
                $.ajax({
                    method: "POST",
                    url: "lib/ajax/checkQuantity.php",
                    data: { chartItemIndex: dataindex, type:"jsQuantityPlus", pidforqty: btn.prev().data("productid"), currentQuantity: tmp },
                    dataType: 'json'
                }).done(function( msg ) {
                    if(msg.status==1 && (parseInt(btn.prev().val()) <= parseInt(msg.stock)) ){
                        if(msg.stock != btn.prev().val())
                            btn.prop('disabled', false);
                        btn.parent().parent().next().html(msg.wellFormattedTotalPrice);
                        if(msg.discount_value > 0){
                            $("#sd_discounttext").removeClass("d-none");
                            $("#sd_discountvalue").removeClass("d-none");
                            $("#sd_discountvalue").html(msg.discount_value_well_formatted);
                            $("#dropdown-cart__discount").removeClass("d-none");
                            $("#ds").html(msg.discount_value_well_formatted);
                        }else{
                            $("#sd_discounttext").addClass("d-none");
                            $("#sd_discountvalue").addClass("d-none");
                            $("#dropdown-cart__discount").addClass("d-none")
                        }
                        if(msg.shippingFee==0){
                            $("#dropdown-cart__total_shipping").remove();
                            $("#sd_shippingprice").addClass('d-lg-none');
                            $("#sd_shippingprice_text").addClass('d-lg-none');
                        }else{
                            $("#sd_shippingprice").removeClass('d-lg-none');
                            $("#sd_shippingprice_text").removeClass('d-lg-none');
                            if($("#dropdown-cart__total_shipping").length>0)
                                $("#sf").text(msg.shippingFeeWellFormatted.replace('&nbsp;', ' '));
                            else{
                                $(".dropdown-cart__footer").prepend('<div id="dropdown-cart__total_shipping" class="dropdown-cart__total">' +
                                 '<span class="text-secondary">Kargo&nbsp;ücreti</span>' +
                                  '<span id="sf" class="text-primary ml-3"></span></div>');
                                $("#sf").text(msg.shippingFeeWellFormatted.replace('&nbsp;', ' '));
                            }
                        }
                        $("#tp").html(msg.totalPriceWellFormatted);
                        btn.prev().val(msg.quantity);
                        if( btn.prev().val() > 1)
                            btn.prev().prev().prop('disabled', false);
                        
                        $(".btn-cart__badge").html(msg.totalProductCount);
                        $("#orderItemCount").html(msg.totalProductCount+' '+msg.tPC_lang);
                        $(".dropdown-cart__header-title").next().text(msg.totalProductCount+' '+msg.tPC_lang);
                        
                        $("input.order-block__input-qty[data-index="+btn.prev().data("index")+"]").val(msg.quantity);
                        $("div.sd_tp[data-index="+btn.prev().data("index")+"]").html(msg.wellFormattedTotalPrice);
                        $("#sd_subtotalprice").html(msg.subTotalWellFormatted);
                        $("#sd_shippingprice").html(msg.shippingFeeWellFormatted);
                        $("#sd_totalprice").html(msg.totalPriceWellFormatted);
                        
                        removeOnclickCartItems();
                        
                        if(msg.cargoPolicy == '4'){
                            getCustomCargoHtml();
                        }
                        
                    }else{
                        btn.prev().val( btn.prev().val()-1 );
                    }
                    //If product's stock=1 and input's value=1, input value set to 1
                    if(parseInt(msg.stock) == 1 && parseInt(btn.prev().val()) == 1){
                            btn.prev().prev().prop('disabled', true);
                            btn.prev().val("1");
                        }
                });
                
                
            });
            
            $(document).on("click", ".js-quantity-minus", function() {
                var btn = $(this);
                btn.prop('disabled', true);
                btn.next().prop('disabled', true);
                var dataindex = btn.next().attr("data-index");
                if(parseInt(btn.next().val())>=1){
                $.ajax({
                    method: "POST",
                    url: "lib/ajax/checkQuantity.php",
                    data: { chartItemIndex: dataindex, type:"jsQuantityMinus", pidforqty: btn.next().data("productid"), currentQuantity: btn.next().val() },
                    dataType: 'json'
                })
                .done(function( msg ) {
                    if(msg.status==1){
                        if(btn.next().val()>1)
                            btn.prop('disabled', false);
                        if(parseInt(btn.next().val()) < parseInt(msg.stock))
                            btn.next().next().prop('disabled', false);
                        
                        if(addToCart==1)
                            if(btn.next().val()==2)
                                btn.prop('disabled', true);
                        btn.parent().parent().next().html(msg.wellFormattedTotalPrice);
                        if(msg.shippingFee==0){
                            $("#dropdown-cart__total_shipping").remove();
                            $("#sd_shippingprice").addClass('d-lg-none');
                            $("#sd_shippingprice_text").addClass('d-lg-none');  
                        }else{
                            $("#sd_shippingprice").removeClass('d-lg-none');
                            $("#sd_shippingprice_text").removeClass('d-lg-none'); 
                            if($("#dropdown-cart__total_shipping").length>0)
                                $("#sf").text(msg.shippingFeeWellFormatted.replace('&nbsp;', ' '));
                            else{
                                $(".dropdown-cart__footer").prepend('<div id="dropdown-cart__total_shipping" class="dropdown-cart__total">' +
                                 '<span class="text-secondary">Kargo&nbsp;ücreti</span>' +
                                  '<span id="sf" class="text-primary ml-3"></span></div>');
                                $("#sf").text(msg.shippingFeeWellFormatted.replace('&nbsp;', ' '));
                            }

                        }
                        if(msg.discount_value <= 0){
                            $("#sd_discounttext").addClass("d-none");
                            $("#sd_discountvalue").addClass("d-none");
                            $("#dropdown-cart__discount").addClass("d-none")
                        }else{
                            $("#sd_discounttext").removeClass("d-none");
                            $("#sd_discountvalue").removeClass("d-none");
                            $("#ds").html(msg.discount_value_well_formatted);
                        }
                        //$("#sf").html(msg.shippingFeeWellFormatted.replace('&nbsp;', ' '));
                        $("#tp").html(msg.totalPriceWellFormatted);
                        btn.next().val(msg.quantity);
                        
                        $(".btn-cart__badge").html(msg.totalProductCount);
                        $("#orderItemCount").html(msg.totalProductCount+' '+msg.tPC_lang);
                        $(".dropdown-cart__header-title").next().text(msg.totalProductCount+' '+msg.tPC_lang);
                        
                        $("input.order-block__input-qty[data-index="+btn.next().data("index")+"]").val(msg.quantity);
                        $("div.sd_tp[data-index="+btn.next().data("index")+"]").html(msg.wellFormattedTotalPrice);
                        
                        $("#sd_subtotalprice").html(msg.subTotalWellFormatted);
                        $("#sd_shippingprice").html(msg.shippingFeeWellFormatted);
                        $("#sd_totalprice").html(msg.totalPriceWellFormatted);
                        if(parseInt(msg.stock) > parseInt(btn.next().val())){
                            btn.next().next().prop('disabled', false);
                        }
                        if(msg.cargoPolicy == '4'){
                            getCustomCargoHtml();
                        }
                    }
                });
                }else{
                    btn.next().val(1);
                    $("input[data-index="+btn.next().data("index")+"]").val(1);
                }
            });
            </script>
        <script>
            $(document).on("click", ".dropdown-cart__button", function() {
                var index = $(this).data("index");
                $.ajax({
                    method: "POST",
                    url: "lib/ajax/removeChartItem.php",
                    data: { chartItemIndex:index, type:"remove"},
                    dataType: 'json'
                }).done(function( msg ) {
                    if(msg.status==1){
                        chartItemIndex = "chartItem"+index;
                        
                        if(msg.shippingFee==0){
                            $("#dropdown-cart__total_shipping").remove(); 
                            $("#sd_shippingprice").addClass('d-lg-none');
                            $("#sd_shippingprice_text").addClass('d-lg-none');
                        }else{

                            if($("#dropdown-cart__total_shipping").length>0)
                                $("#sf").text(msg.shippingFeeWellFormatted.replace('&nbsp;', ' '));
                            else{
                                $(".dropdown-cart__footer").prepend('<div id="dropdown-cart__total_shipping" class="dropdown-cart__total">' +
                                 '<span class="text-secondary">Kargo&nbsp;ücreti</span>' +
                                  '<span id="sf" class="text-primary ml-3"></span></div>');
                                $("#sf").html(msg.shippingFeeWellFormatted.replace('&nbsp;', ' '));
                            }
                            $("#sd_shippingprice").html(msg.shippingFeeWellFormatted);
                            $("#sd_shippingprice").removeClass('d-lg-none');
                            $("#sd_shippingprice_text").removeClass('d-lg-none');
                        }
                        
                        if(msg.discount_value === null){
                            $("#dropdown-cart__discount").remove(); 
                            $("#sd_discountvalue").prev().remove();
                            $("#sd_discountvalue").remove();
                        }else{
                            if($("#dropdown-cart__discount").length>0)
                                $("#ds").text(msg.discount_value_well_formatted.replace('&nbsp;', ' '));
                            else{
                                $(".dropdown-cart__footer").prepend('<div id="dropdown-cart__discount" class="dropdown-cart__total">' +
                                 '<span class="text-secondary">İndirim</span>' +
                                  '<span id="ds" class="text-primary ml-3"></span></div>');
                                $("#ds").html(msg.discount_value_well_formatted);
                            }
                            $("#sd_discountvalue").html(msg.discount_value_well_formatted);
                        }
                        
                        var tp =(msg.itemCount==0 ? '-' :  msg.totalPriceWellFormatted.replace('&nbsp;', ' '));
                        $("#tp").text(tp);
                        $("#"+chartItemIndex).remove();
                        $("#"+"chartOrder"+index).remove();
                        $("#"+"shopCartItem"+index).remove();
                        $(".btn-cart__badge").html(msg.totalProductCount);
                        $("#orderItemCount").html(msg.totalProductCount+' '+msg.tPC_lang);
                        $(".dropdown-cart__header-title").next().text(msg.totalProductCount+' '+msg.tPC_lang);
                        
                        $("#sd_subtotalprice").html(msg.subTotalWellFormatted);
                        
                        $("#sd_totalprice").html(msg.totalPriceWellFormatted);
                        
                        if(msg.itemCount==0)
                            if("storefront"=='shippingdetails'   )
                                window.location.href = 'https://www.shopier.com/ShowProductNew/storefront.php?shop=shopier.com';
                            else{
                                $(".dropdown-cart__items").html('<div id="empty_cart" class="dropdown-cart__item">Sepetiniz boş</div>');
                                addOnclickCartItems();
                            }
                        
                        var i=0;
                        $(".dropdown-cart__item").each(function() {
                            $(this).attr('id', "chartItem"+i);
                            $(this).find("#quantity_input").attr('data-index', i);
                            $(this).find(".btn-sm").attr('data-index', i);
                            i++;
                        });
                        i=0;
                        $(".order-block__item").each(function() {
                            $(this).attr('id', "chartOrder"+i);
                            i++;
                        });
                        i=0;
                        $(".cart-product-block").each(function() {
                          $(this).attr('id', "shopCartItem"+i);
                            i++;
                        });
                        
                        if(msg.cargoPolicy == '4'){
                            getCustomCargoHtml();
                        }
                        
                        
                    }else if(msg.status == 0){
                        if(msg.shippingFee==0){
                            $("#dropdown-cart__total_shipping").remove(); 
                            $("#sd_shippingprice").addClass('d-lg-none');
                            $("#sd_shippingprice_text").addClass('d-lg-none');
                        }
                        var tp =(msg.itemCount==0 ? '-' :  msg.totalPriceWellFormatted.replace('&nbsp;', ' '));
                        $("#tp").text(tp);
                        $("#dropdown-cart__total_shipping").remove(); 
                        $('#sd_shippingprice').addClass('d-lg-none');
                        $('#sd_shippingprice_text').addClass('d-lg-none');
                        $("#sd_discountvalue").prev().remove();
                        $("#sd_discountvalue").remove();
                        $(".btn-cart__badge").html(msg.totalProductCount);
                        $("#orderItemCount").html(msg.totalProductCount);
                        $(".dropdown-cart__header-title").next().text(msg.totalProductCount);
                        $("#sd_subtotalprice").html(msg.subTotalWellFormatted);
                        $("#sd_totalprice").html(msg.totalPriceWellFormatted);
                        $(".order-block__item").remove();
                        if(msg.itemCount==0)
                            if("storefront"=='shippingdetails')
                                window.location.href = 'https://www.shopier.com/ShowProductNew/storefront.php?shop=shopier.com';
                            else{
                                $(".dropdown-cart__items").html('<div id="empty_cart" class="dropdown-cart__item">Sepetiniz boş</div>');
                            }
                    }
                    
                });
            });
        </script>        <script>
        
        $("#mobile-plus").on("click", function () {
        
            var btn = $(this);
            btn.prop("disabled", true);
            btn.prev().val(parseInt(btn.prev().val()) + 1);
            btn.prev().trigger("change");
            btn.prev().prop("readonly", true);
            var tmp = btn.prev().val();
            
            var tmpFirstSelectedQuantity=-1;
            var tmpSecondSelectedQuantity=-1;
            if($("#selectFirstVariationGroup").length){
                tmpFirstSelectedQuantity = $("#selectFirstVariationGroup").val();
            }
            if($("#selectSecondVariationGroup").length){
                tmpSecondSelectedQuantity = $("#selectSecondVariationGroup").val();
            }
            $.ajax({
                method: "POST",
                url: "lib/ajax/checkQuantity.php",
                data: { type:"mobile-plus", pidforqty: btn.prev().data("productid"), currentQuantity: tmp, firstSelectedQuantity: tmpFirstSelectedQuantity, secondSelectedQuantity: tmpSecondSelectedQuantity },
                dataType: 'json'
            }).done(function( msg ) {
                if(msg.status==1 && (parseInt(btn.prev().val()) <= parseInt(msg.stock)) ){
                    if(msg.stock != btn.prev().val())
                        btn.prop("disabled", false);

                    if( btn.prev().val() > 1)
                        btn.prev().prev().prop("disabled", false);

                }else{
                    btn.prev().val( btn.prev().val()-1 );
                }
                /*If product's stock=1 and input's value=1, input value set to 1*/
                if(parseInt(msg.stock) == 1 && parseInt(btn.prev().val()) == 1){
                        btn.prev().prev().prop("disabled", true);
                        btn.prev().val("1");
                    }
            });
            
        });
        
        $('#mobile-minus').on('click', function () {
            var btn = $(this);
            btn.prop('disabled', true);
            btn.next().val(parseInt(btn.next().val()) - 1);
            btn.next().trigger('change');
            btn.next().prop('disabled', true);
            var tmp = btn.next().val();
            
            var tmpFirstSelectedQuantity=-1;
            var tmpSecondSelectedQuantity=-1;
            if($("#selectFirstVariationGroup").length){
                tmpFirstSelectedQuantity = $("#selectFirstVariationGroup").val();
            }
            if($("#selectSecondVariationGroup").length){
                tmpSecondSelectedQuantity = $("#selectSecondVariationGroup").val();
            }
            if(parseInt(btn.next().val())>=1){
                $.ajax({
                    method: "POST",
                    url: "lib/ajax/checkQuantity.php",
                    data: { type:"mobile-minus", pidforqty: btn.next().data("productid"), currentQuantity: tmp, firstSelectedQuantity: tmpFirstSelectedQuantity, secondSelectedQuantity: tmpSecondSelectedQuantity  },
                    dataType: 'json'
                })
                .done(function( msg ) {
                    if(msg.status==1){
                        if(btn.next().val()>1)
                            btn.prop('disabled', false);
                        if(parseInt(btn.next().val()) < parseInt(msg.stock))
                            btn.next().next().prop('disabled', false);
                        
                        if(addToCart==1)
                            if(btn.next().val()==2)
                                btn.prop('disabled', true);
                        
                        
                    }
                });
                }else{
                    btn.next().val(1);
                    btn.next().next().prop('disabled', false);
                }
            
        });
        
        $('#mobil-input').on('change', function (e) {
             var input = $(this);
            if (input.val() < 2) {
                input.prev().attr('disabled', true);
            } else {
                input.prev().attr('disabled', false);
            }
        });
/*
        $(document).on("shown.bs.dropdown", ".dropdown-cart", function() {
            if($(".dropdown-cart").hasClass("show") && $( window ).width()<=991){
                $(".layoutWrapper").css("filter","blur(5px)");
            }
        });
        
        $(document).on("hidden.bs.dropdown", ".dropdown-cart", function() {
            if(!($(".dropdown-cart").hasClass("show")) && $( window ).width()<=991){
                $(".layoutWrapper").css("filter","blur(0px)");
            }
        });
        */
        </script>
    <script type="text/javascript">  
    
    function submitFormToShippingDetails(toBeAdded) {
        if(toBeAdded===false){
            $("#buyForm").append('<input type="hidden" name="donotadd" value="1" />');
            document.getElementById("buyForm").submit();
            return;
        }else{
            if ($("#selectFirstVariationGroup option:selected").val()==-1) {
                $('#selectFirstVariationGroup').focus();
            }else if ($("#selectSecondVariationGroup option:selected").val()==-1) {
                $('#selectSecondVariationGroup').focus();
            }
            else if($('#select-quantity option:selected').is(':selected') || parseInt($('#mobil-input').val()) > 0){
                document.getElementById("buyForm").submit();
            }   
        }
    }
    
    function directCheckout(toBeAdded)
    {
        
         $.ajax({
            method: "POST",
            url: "lib/ajax/checkPaymentProgress.php",
            dataType : "json",
            statusCode: {
                500: function() {
                     submitFormToShippingDetails(toBeAdded);
                }
            }
            
        }).done(function( msg ) {
            if(msg.status === "isPaymentContinue"){
                $('#total_price').text(msg.totalPrice);
                $('#paymentContinueInfo').modal('show');
            }else{
                submitFormToShippingDetails(toBeAdded);
            }
        });
    }
    
    function cancelOngoingPayment() {
        $('#paymentContinueInfo').modal('hide');
        $.ajax({
            method: "POST",
            url: "lib/ajax/addChartItem.php",
            data: { formData : $("#buyForm").serialize(), recreate : "yes" },
            dataType: 'json'
        }).done(function( msg ) {
            if(parseInt(msg.status)===1){
                addToChartItem(msg)
            }else{
                //Settings.toggleAlert();
                if(msg.statusMessage==='overStock'){
                    overStock();
                }
                if(msg.statusMessage==='notEqualCurrency'){
                   notEqualCurrency();
                }
            }
        });
    }

    </script>        <script>
        let searchProcessStarted = false;
        
        $(document).ready(function() {
          
          if(''!='')
          {
              $('.navbar-search__submit').trigger("click");
          }
          
          if($('.js-search-input').val()!='' && '')
              {
                  response = $('.js-search-input').val();
                  $('.js-search-input').val(decodeURIComponent($('.js-search-input').val()));
                  $('.navbar-search__submit').trigger("click");
                  currentUrl = window.location+"";
                  newUrl = currentUrl.replace("&search="+response+"","");
                  history.pushState({}, "", newUrl);
              }
        });
        
        function searchprocess(start = sessionStorage.getItem("defaultProductCount")) {
            $('#products-grid').empty();
            $('.js-load-more').hide();
            $('#products-grid').append(getPlaceHolderProducts);
            if(searchProcessStarted){
                return;
            }
            
            if (typeof clearFilter === 'function') {
			  clearFilter();
			}
            if (typeof clearSorting === 'function') {
			  clearSorting();
			}
            
            $('body').click();
            
            sessionStorage.setItem("currentPictureCount", 0);

            if( 'storefront' !='storefront'){
                    document.getElementById("js-search").submit();
                }
                else{
                var q;
                    q=$('.js-search-input').val();
                
                if(q === "" && searchWord2 !== "" && searchWord2 !== null)
                    q = searchWord2;
                var searchWord = q;
                var jeton = $('input[name="jeton"]').val();
                datesort = -1;
                pricesort = -1;
                filterMinPrice = -1;
                filterMaxPrice = -1;
                activeCheckBoxes.length = 0;
                $(".widget-box__checkbox").parent().removeClass("active");
                $(".widget-box__price-input");
                //sessionStorage.setItem("searchParam", q);
                searchProcessStarted = !searchProcessStarted;
                
                $.ajax({
                    method: "POST",
                    url: "lib/ajax/searchProduct.php",
                    data: { shop : "SiskoMedya", value : q, jtn : jeton, start: start, offset: sessionStorage.getItem("currentPictureCount")  },
                    dataType: 'json'
                }).done(function(data) {
                    $('#products-grid').empty();
                    var productTemplate='';

                    if(data.status===0){
                        $('.js-search-count').text(0);
                        $('.js-search-query').text(data.query);
                        $('.products-empty').css("display", "block");
                        $('.products-empty-search').css('display', 'block');
                        $('.products-empty-filter').css('display', 'none');
                        $('.js-load-more').css("display", "none");
                    }
                    else{
                        $('.products-empty').hide();
                        $(".active").removeClass("active");
                        $(".categorytab[data-id=0]").addClass("active");
                        
                        var overlay = '';
                        var grayScaleCss = '';
                        var originalPriceWellFormatted = '';
                        var searchPage = 0;
                        var searchProductCount = 0;
                        currentPictureCountForCategory = parseInt(currentPictureCountForCategory) + parseInt(sessionStorage.getItem("defaultProductCount"));
                        currentPictureCount = parseInt(currentPictureCount) + parseInt(sessionStorage.getItem("defaultProductCount"));
                        sessionStorage.setItem("currentPictureCount", currentPictureCount);
                        $.each(data.products, function(key, msg) {
                            
                        $('.js-search-count').text(data.products.length);
                        $('input[name="jeton"]').val(msg.jeton);
                        overlay = '';
                        grayScaleCss = '';
                        originalPriceWellFormatted = '';
                        if(msg.show_new_product_label == 1)
                            if(msg.new == 1)
                                overlay ='<div class="product__badge product__badge--new">Yeni</div>';
                        if(msg.show_last_product_label == 1)
                            if(msg.stock == 1)
                                overlay = '<div class="product__badge product__badge--last">Son ürün</div>';
                        if(msg.isDigital == 1)
                            overlay = '<div class="product__badge product__badge--last">Dijital ürün</div>';
                        if(msg.stock <= 0){
                            overlay = '<div class="product__badge product__badge--last">Tükendi</div>';
                             grayScaleCss = 'style="-webkit-filter: grayscale(100%) contrast(40%);filter: grayscale(100%) filter: contrast(40%);"';
                        }
                        if(parseInt(msg.shop_vacation) === 1){
                            grayScaleCss = 'style="-webkit-filter: grayscale(100%) contrast(40%);filter: grayscale(100%) filter: contrast(40%);"';
                        }
                        if (msg.is_discounted === true)
                            overlay+='<div ' + grayScaleCss + ' class="product__discount_selected_product"><span><img src="styles/images/discount_mini.png" srcset="styles/images/discount_mini.png 2x" width="28" height="21" alt=""></span></div>';
                        else{
                            if(msg.discount>0)
                                overlay+='<div '+grayScaleCss+' class="product__discount"><span>'+msg.discount+'%</span></div>';
                        }
                        
                        if(parseInt(msg.originalPrice)!==0)
                            originalPriceWellFormatted = '<del class="product__price--old">'+msg.originalPriceWellFormatted+'</del>';
                        else 
                            originalPriceWellFormatted = '';
                        
                        var sid = encodeHashCode(searchPage, searchProductCount, "", encodeURIComponent(unescape(searchWord)));
                        var onclick = "editUrl('" + sid + "')";
                        
                        const imageTemplate = '<img '+grayScaleCss+' class="product__image" src="https://cdn.shopier.app/pictures_large/'+msg.picturefilename +'"'+
                            'srcset="https://cdn.shopier.app/pictures_large/'+msg.picturefilename +' 2x" ' +
                             'width="232" alt="Product" ' +
                             'onerror="this.src=\'https://cdn.shopier.app/pictures_small/600icons-2.png\';this.srcset=\'https://cdn.shopier.app/pictures_small/600icons-2.png\'">';
                            
                        productTemplate=
                            '<div class="products__cell js-item" data-product="'+msg.productId+'">'+
                                '<div class="product">'+
                                    '<a class="product__thumb placeholder-glow" onclick="' + onclick + '" href="products.php?id='+ msg.productId  +'">'+
                                        '<div class="product__overlay placeholder">'+overlay+'</div>'+
                                    '</a>'+
                                    '<h4 class="product__title">'+  
                                        '<a style="color:#435062;" class="product_name_url" href="products.php?id='+msg.productId+'&sid='+sid+'">' + msg.title + "</a>" +
                                    '</h4>'+
                                    '<div class="d-flex align-items-center justify-content-between">'+
                                    '<div class="product__price">'+msg.price+' '+originalPriceWellFormatted+'</div></div></div></div>';
                        
                        $('#products-grid').append(productTemplate);
                        
                        const imageSrc = "https://cdn.shopier.app/pictures_large/"+msg.picturefilename;
                        const image = new Image();
                        image.onload = function (){
                            const productId = msg.productId;
                            const productSelector = '.js-item[data-product="'+productId+'"]';
                            const productEl = document.querySelector(productSelector);
                            const thumbEl = productEl.querySelector('.product__thumb');
                            thumbEl.classList.remove('placeholder-glow')
                            productEl.querySelector('.product__overlay').classList.remove('placeholder')
                            thumbEl.innerHTML += imageTemplate;
                        }
                        image.src = imageSrc;
                        if(data.products.length<sessionStorage.getItem("defaultProductCount"))
                            $(".js-load-more").hide();
                        else
                            $('.js-load-more').removeClass('invisible').show();

                        
                        searchProductCount++;
                        if(searchProductCount == sessionStorage.getItem("defaultProductCount"))
                        {
                            searchProductCount = 0;
                            searchPage++;
                        }
                        } ); 
                        
                    }
                    $('.widget-box').addClass("active");
                    document.getElementsByClassName("navbar-search__menu")[0].classList.remove("show");
                    document.getElementsByClassName("navbar-search__results")[0].classList.remove("show");
                    searchProcessStarted = !searchProcessStarted;
                });
                
                }//else  
            }
            
            $('.js-search-input').keypress(function(e) {
            if(e.which == 13  && !searchProcessStarted) {
                if('') {
                        window.location.href="storefront.php?shop=SiskoMedya&search="+encodeURIComponent($('.js-search-input').val());
                }
                else {
                searchprocess();
                }
              }
            });
        
             $('button.navbar-search__submit').click(function() {
                if('') {
                        window.location.href="storefront.php?shop=SiskoMedya&search="+encodeURIComponent($('.js-search-input').val());
                }
                else {
                searchprocess();
                }
             });
             
        function getPlaceHolderProducts(){
            const placeHolderTemplate = `
            <div class="products__cell" data-product="">
                <div class="product">
                    <a class="product__thumb placeholder-glow">
                        <div class="product__overlay placeholder">
                        </div>
                    </a>
                    <div class="placeholder-glow">
                        <h4 class="placeholder placeholder--title col-8"></h4>
                    </div>
                    <div class="placeholder-glow">
                        <p class="placeholder placeholder--price col-4"></p>
                    </div>
                </div>
            </div>
            `;
            const tempArr = new Array(4).fill(0);
            return tempArr.map(item=>placeHolderTemplate).join('');
        }

        
        </script>

        <script>
        var currentPictureCountForCategory = 0;
        var tmpProductCategoryID = -1;
        var prodCount;
        $('.categorytab').on('click', function () {
            $('#products-grid').empty();
            $('.js-load-more').hide();
            $('#products-grid').append(getPlaceHolderProducts);

            $('.products-empty').css('display', 'none');
            if(sort != "0") {
                clearSorting();
            }
            if(filter != "0") {
                clearFilter();
            }
            
            $(".widget-box__checkbox").parent().removeClass("active");
            $(".widget-box__price-input");
                    
            datesort = -1;
            pricesort = -1;
            filterMinPrice = -1;
            filterMaxPrice = -1;
            activeCheckBoxes.length = 0;
            $('.js-search-input').val("");
            prodCount = 0;
            currentPictureCount=sessionStorage.getItem("defaultProductCount");
            var tempCategoryId = $(this).data('id');
            $('#mobile-display').data('id', tempCategoryId);
            var productCategoryID = tempCategoryId;
            if(tmpProductCategoryID !== productCategoryID){
                currentPictureCountForCategory=0;
                tmpProductCategoryID = $(this).data('id');
            }
            sessionStorage.setItem("selectedCategory", tmpProductCategoryID);
            currentPictureCountForCategory=0;
            if(currentPictureCount !== 0 && categoryClickCount !== 0)
            {
                if($(this).data('text') !== "" && $(this).data('text') !== null)
                    hash = encodeHashCode(0,-1,encodeURIComponent(unescape($(this).data('text'))));
                else 
                    hash = encodeHashCode(0,-1);
                newUrl = currentUrl.replace("sid=" + realHash,"sid="+hash);
                realHash = hash;
                currentUrl = newUrl;
                history.pushState({}, "", newUrl);
                fakeClick = 0;
                pageCount = 0;
            }
        //$('#products-grid').addClass('is-loading');
        var jeton = $('input[name="jeton"]').val();
        $.ajax({
            method: "POST",
            url: "lib/ajax/searchProduct.php",
            data: { shop : "SiskoMedya", categoryId : productCategoryID, jtn : jeton, filter: 0, sort: 0, start: sessionStorage.getItem("defaultProductCount") * (pageCount + 1), offset: currentPictureCountForCategory },
            dataType: 'json'
        }).done(function(data) {
            var productTemplate='';
            $('#products-grid').empty();
            
                if(data.status===0){
                    $('.js-search-count').text(0);
                    $('.js-search-query').text(data.query);
                }
                else{
                    var tablist = document.getElementsByClassName('categorytab');
                    var hastag = '';
                    for (var count = 0; count < tablist.length; count++)
                        if(tablist[count].getAttribute('data-id')+"" === tempCategoryId+"")
                            hastag = tablist[count].getAttribute('data-text');
                    if(hastag !== null)
                    {
                        hastag = encodeURIComponent(unescape(hastag));
                        history.pushState(null, null, '#'+hastag);
                    }
                    else
                        history.pushState(null, null, ' ');
                    if(currentPictureCount !== 0 && categoryClickCount !== 0)
                    {
                        currentPictureCount = parseInt(currentPictureCountForCategory) + parseInt(sessionStorage.getItem("defaultProductCount"));
                        currentPictureCountForCategory = parseInt(currentPictureCountForCategory) + parseInt(sessionStorage.getItem("defaultProductCount"));
                        sessionStorage.setItem("currentPictureCount", currentPictureCount);
                    }
                        
                    $('.js-search-count').text(data.products.length);
                    var overlay = '';
                    var grayScaleCss = '';
                    var originalPriceWellFormatted = '';
                    $.each(data.products, function(key, msg) {
                        $('input[name="jeton"]').val(msg.jeton);
                    overlay = '';
                    grayScaleCss = '';
                    originalPriceWellFormatted = '';
                    
                    if(msg.show_new_product_label == 1)
                       if(msg.new == 1)
                           overlay ='<div class="product__badge product__badge--new">Yeni</div>';
                    if(msg.show_last_product_label == 1)
                        if(msg.stock == 1)
                            overlay = '<div class="product__badge product__badge--last">Son ürün</div>';
                    if(msg.isdigital === true)
                        overlay = '<div class="product__badge product__badge--last">Dijital ürün</div>';
                    if(msg.stock <= 0){
                        overlay = '<div class="product__badge product__badge--last">Tükendi</div>';
                        grayScaleCss = 'style="-webkit-filter: grayscale(100%) contrast(40%);filter: grayscale(100%) filter: contrast(40%);"';
                    }
                    if (msg.is_discounted === true)
                        overlay+='<div ' + grayScaleCss + ' class="product__discount_selected_product"><span><img src="styles/images/discount_mini.png" srcset="styles/images/discount_mini.png 2x" width="28" height="21" alt=""></span></div>';
                    else{
                        if(msg.discount>0)
                            overlay+='<div '+grayScaleCss+' class="product__discount"><span>'+msg.discount+'%</span></div>';
                    }
                    if(parseInt(msg.shop_vacation) === 1){
                        grayScaleCss = 'style="-webkit-filter: grayscale(100%) contrast(40%);filter: grayscale(100%) filter: contrast(40%);"';
                    }
                    
                    if(parseInt(msg.originalPrice)!==0)
                        originalPriceWellFormatted = '<del class="product__price--old">'+msg.originalPriceWellFormatted+'</del>';
                    else 
                        originalPriceWellFormatted = '';
                        var category = (window.location+'').split('#')[1];
                        if(category === undefined)
                            category = "";
                        hash = encodeHashCode(Math.floor(prodCount/16),(prodCount % 16),category);
                        
                    
                    const imageTemplate = '<img '+grayScaleCss+' class="product__image" src="https://cdn.shopier.app/pictures_large/'+msg.picturefilename +'"'+
                        'srcset="https://cdn.shopier.app/pictures_large/'+msg.picturefilename +' 2x" ' +
                        'width="232" alt="Product" ' +
                        'onerror="this.src=\'https://cdn.shopier.app/pictures_small/600icons-2.png\';this.srcset=\'https://cdn.shopier.app/pictures_small/600icons-2.png\'">';
                    productTemplate = 
                        '<div class="products__cell js-item" data-product="'+msg.productId+'">'+
                        '<div class="product">'+
                        '<a class="product__thumb placeholder-glow" onclick="editUrl(\''+hash+'\')" href="products.php?id='+ msg.productId +'&sid=' + hash + '">'+
                        '<div class="product__overlay placeholder">'+overlay+'</div>'+
                        '</a>'+
                        '<h4 class="product__title">'+ 
                            '<a style="color:#435062;" class="product_name_url" href="products.php?id='+msg.productId+'&sid='+hash+'">' + msg.title + "</a>" + 
                        '</h4>'+
                        '<div class="d-flex align-items-center justify-content-between">'+
                        '<div class="product__price">'+msg.price+' '+originalPriceWellFormatted+'</div></div></div></div>';
                    category = "";
                    prodCount++;

                    $('#products-grid').append(productTemplate);
                    const imageSrc = "https://cdn.shopier.app/pictures_large/"+msg.picturefilename;
                    const image = new Image();
                    image.onload = function (){
                        const productId = msg.productId;
                        const productSelector = '.js-item[data-product="'+productId+'"]';
                        const productEl = document.querySelector(productSelector);
                        const thumbEl = productEl.querySelector('.product__thumb');
                        thumbEl.classList.remove('placeholder-glow')
                        productEl.querySelector('.product__overlay').classList.remove('placeholder')
                        thumbEl.innerHTML += imageTemplate;
                    }
                    image.src = imageSrc;
                    
                    if(data.products.length<sessionStorage.getItem("defaultProductCount"))
                        $(".js-load-more").hide();
                    else
                        $('.js-load-more').removeClass('invisible').show();
                });       
            }
            categoryClickCount += 1;
            setTimeout(function () {
                //$('#products-grid').removeClass('is-loading');
            }, 500);
            sessionStorage.setItem("selectedCategory", tempCategoryId);
        });


    });
    function getPlaceHolderProducts(){
        const placeHolderTemplate = `
        <div class="products__cell" data-product="">
            <div class="product">
                <a class="product__thumb placeholder-glow">
                    <div class="product__overlay placeholder">
                    </div>
                </a>
                <div class="placeholder-glow">
                    <h4 class="placeholder placeholder--title col-8"></h4>
                </div>
                <div class="placeholder-glow">
                    <p class="placeholder placeholder--price col-4"></p>
                </div>
            </div>
        </div>
        `;
        const tempArr = new Array(4).fill(0);
        return tempArr.map(item=>placeHolderTemplate).join('');
    }
</script>
        <script  type="text/javascript">
            var categories = [{"name":"Dolap Hizmetleri","id":"1094234"},{"name":"Gardrops Hizmetleri","id":"1094235"}];

            
            if(category !== "" && category !== null && category !== undefined) {
                newtext = category;
            } else {
                newtext = newtext[newtext.length-1];
            }

            newtext = turkishCharReplacer(newtext);
            for (var i = 0; i < categories.length ; i++)
            {
                if(categories[i]['name'] === newtext)
                {
                     var list = document.getElementsByClassName('categorytab');
                     for (var j=0; j<list.length;j++)
                     {
                         if(list[j].getAttribute('data-id') === categories[i]['id'])
                         {
                             list[j].click();
                             break;
                         }
                     }
                }
            }
        </script>           <script> 
            function sendFilterInfo(reload = "0")
            {
                $('#products-grid').empty();
                $('.js-load-more').hide();
                $('#products-grid').append(getPlaceHolderProducts);

                $('.products-empty').css('display', 'none');
                var newtext = (currentUrl+"").split("#");
                var currentPictureCountForCategory = 0;
                var prodCount;
                prodCount = 0;
                currentPictureCount=0;
                fakeClick = 0;
                pageCount = 0;
            
                //  $('#products-grid').addClass('is-loading');
                var jeton = $('input[name="jeton"]').val();
                
                if((datesort != "-1" && datesort != "null") || (pricesort != "-1" && pricesort != "null"))
                    sort = 1;
                else
                    sort = 0;
                if((filterMinPrice != "-1" && filterMinPrice != "null") ||
                (filterMaxPrice != "-1" && filterMaxPrice != "null") ||
                activeCheckBoxes.length > 0 )
                    filter = 1;
                else
                    filter = 0;
                
                if(tmpProductCategoryID != "-1" && tmpProductCategoryID != "0" && activeCheckBoxes.indexOf("cat_" + tmpProductCategoryID) === -1)
                    activeCheckBoxes.push("cat_" + tmpProductCategoryID);
                var limit;
                if(reload == "1")
                    limit = sessionStorage.getItem("currentPictureCount");
                else
                    limit = sessionStorage.getItem("defaultProductCount") * (pageCount + 1);
                $.ajax({
                    method: "POST",
                    url: "lib/ajax/searchProduct.php",
                    data: { shop : "SiskoMedya",
                        jtn : jeton,
                        start: limit,
                        offset: currentPictureCountForCategory,
                        filter: filter,
                        sort: sort,
                        filterMinPrice: filterMinPrice,
                        filterMaxPrice: filterMaxPrice,
                        datesort: datesort,
                        pricesort: pricesort,
                        //value: $('.js-search-input').val(), //remove comment to enable filters with the search query
                        activeCheckBoxes: activeCheckBoxes},
                    dataType: 'json'
                }).done(function(data) {
                    currentPictureCountForCategory = parseInt(currentPictureCountForCategory) + parseInt(sessionStorage.getItem("defaultProductCount"));
                    currentPictureCount = parseInt(currentPictureCount) + parseInt(sessionStorage.getItem("defaultProductCount"));
                    sessionStorage.setItem("currentPictureCount", currentPictureCount);
                    sessionStorage.setItem("filter", filter);
                    sessionStorage.setItem("sort", sort);
                    sessionStorage.setItem("filterMinPrice", filterMinPrice);
                    sessionStorage.setItem("filterMaxPrice", filterMaxPrice);
                    sessionStorage.setItem("datesort", datesort);
                    sessionStorage.setItem("pricesort", pricesort);
                    sessionStorage.setItem("activeCheckBoxes", JSON.stringify(activeCheckBoxes));
                    sessionStorage.setItem("jeton", jeton);
                    sessionStorage.setItem("userid", 596867); 
                    var productTemplate='';
                    $('#products-grid').empty();
                    
                    if(data.status == "0")
                    {
                        //$('.js-search-count').text(0);
                        $('.js-search-query').text(data.query);
                        
                        $('.products-empty').css("display", "block");
                        $('.products-empty-filter').css('display', 'block');
                        $('.products-empty-search').css('display', 'none');
                        $('.js-load-more').css("display", "none");
                    }
                    else
                    {
                        $('.products-empty').css('display', 'none');
                        /*var tablist = document.getElementsByClassName('categorytab');
                        var hastag = '';
                        for (var count = 0; count < tablist.length; count++)
                            if(tablist[count].getAttribute('data-id')+"" === tempCategoryId+"")
                                hastag = tablist[count].getAttribute('data-text');
                        if(hastag !== null)
                            history.pushState(null, null, '#'+hastag);
                        else
                            history.pushState(null, null, ' ');*/
                        
                        //$('.js-search-count').text(data.products.length);
                        var overlay = '';
                        var grayScaleCss = '';
                        var originalPriceWellFormatted = '';
                        $.each(data.products, function(key, msg) {
                        $('input[name="jeton"]').val(msg.jeton);
                        overlay = '';
                        grayScaleCss = '';
                        originalPriceWellFormatted = '';
                        if(msg.show_new_product_label == 1)
                            if(msg.new == 1)
                                overlay ='<div class="product__badge product__badge--new">Yeni</div>';
                        if(msg.show_last_product_label == 1)
                            if(msg.stock == 1)
                                overlay = '<div class="product__badge product__badge--last">Son ürün</div>';
                        if(msg.isDigital == 1)
                            overlay = '<div class="product__badge product__badge--last">Dijital ürün</div>';
                        if(msg.stock <= 0){
                            overlay = '<div class="product__badge product__badge--last">Tükendi</div>';
                            grayScaleCss = 'style="-webkit-filter: grayscale(100%) contrast(40%);filter: grayscale(100%) filter: contrast(40%);"';
                        }
                        if (msg.is_discounted === true)
                            overlay+='<div ' + grayScaleCss + ' class="product__discount_selected_product"><span><img src="styles/images/discount_mini.png" srcset="styles/images/discount_mini.png 2x" width="28" height="21" alt=""></span></div>';
                        else{
                            if(msg.discount>0)
                                overlay+='<div '+grayScaleCss+' class="product__discount"><span>'+msg.discount+'%</span></div>';
                        }
                        if(parseInt(msg.shop_vacation) === 1){
                            grayScaleCss = 'style="-webkit-filter: grayscale(100%) contrast(40%);filter: grayscale(100%) filter: contrast(40%);"';
                        }
                        
                        if(parseInt(msg.originalPrice)!==0)
                            originalPriceWellFormatted = '<del class="product__price--old">'+msg.originalPriceWellFormatted+'</del>';
                        else 
                            originalPriceWellFormatted = '';
                        var category = (window.location+'').split('#')[1];
                            if(category === undefined)
                                category = "";
                            if (category !== "")
                                hash = encodeHashCode(msg.page, msg.productOffset, category);
                            else
                                hash = encodeHashCode(msg.page, msg.productOffset);
                        const imageTemplate = '<img '+grayScaleCss+' class="product__image" src="https://cdn.shopier.app/pictures_large/'+msg.picturefilename +'"'+
                            'srcset="https://cdn.shopier.app/pictures_large/'+msg.picturefilename +' 2x" ' +
                            'width="232" alt="Product" ' +
                            'onerror="this.src=\'https://cdn.shopier.app/pictures_small/600icons-2.png\';this.srcset=\'https://cdn.shopier.app/pictures_small/600icons-2.png\'">';
                        productTemplate = 
                            '<div class="products__cell js-item" data-product="'+msg.productId+'">'+
                            '<div class="product">'+
                            '<a class="product__thumb placeholder-glow" onclick="editUrl(\''+hash+'\')" href="products.php?id='+ msg.productId +'&sid=' + hash + '">'+
                            '<div class="product__overlay placeholder">'+overlay+'</div>'+
                            '</a>'+
                            '<h4 class="product__title">'+ 
                                '<a style="color:#435062;" class="product_name_url" href="products.php?id='+msg.productId+'&sid='+hash+'">' + msg.title + "</a>" + 
                            '</h4>'+
                            '<div class="d-flex align-items-center justify-content-between">'+
                            '<div class="product__price">'+msg.price+' '+originalPriceWellFormatted+'</div></div></div></div>';
                        category = "";
                        prodCount++;
    
                        $('#products-grid').append(productTemplate);

                        const imageSrc = "https://cdn.shopier.app/pictures_large/"+msg.picturefilename;
                        const image = new Image();
                        image.onload = function (){
                            const productId = msg.productId;
                            const productSelector = '.js-item[data-product="'+productId+'"]';
                            const productEl = document.querySelector(productSelector);
                            const thumbEl = productEl.querySelector('.product__thumb');
                            thumbEl.classList.remove('placeholder-glow')
                            productEl.querySelector('.product__overlay').classList.remove('placeholder')
                            thumbEl.innerHTML += imageTemplate;
                        }
                        image.src = imageSrc;

                        if(data.products.length<sessionStorage.getItem("defaultProductCount"))
                            $(".js-load-more").hide();
                        else
                            $('.js-load-more').removeClass('invisible').show();
                    }); 
                    }
                });
            setTimeout(function () {
                // $('#products-grid').removeClass('is-loading');
            }, 500);
            }
            </script>        <script>
        var desktopFilter = 0
        var mobileFilter = 0
        $('.filter_not_found_message').on('click', function() {
          clearFilter();
          clearSorting();
          window.location = "https://www.shopier.com/SiskoMedya";
        });
            $(document).ready(function() {
            if(tmpProductCategoryID != "-1" && tmpProductCategoryID != "0" && activeCheckBoxes.indexOf("cat_" + tmpProductCategoryID) === -1 && activeCheckBoxes.length === 0)
            {
                activeCheckBoxes.push("cat_" + tmpProductCategoryID);
            }
            tmpProductCategoryID = "-1";
            
                sessionStorage.setItem("selectedCategory", "0");
                if(sessionStorage.getItem("userid") != 596867
                && sessionStorage.getItem("userid") != ""
                && sessionStorage.getItem("userid") != null
                && sessionStorage.getItem("userid") != undefined)
                {
                    clearFilter();
                    clearSorting();
                }
                if((sessionStorage.getItem("filter") !== "0" && sessionStorage.getItem("filter") !== null) ||
                    (sessionStorage.getItem("sort") !== "0" && sessionStorage.getItem("sort") !== null)){
                    
                    if(sessionStorage.getItem("filter") !== "0" && sessionStorage.getItem("filter") !== null)
                        $("#clearFilter, #clearFilterMbl").addClass("active");
                    if(sessionStorage.getItem("sort") !== "0" && sessionStorage.getItem("sort") !== null)
                        $("#clearSorting, #clearSortingMbl").addClass("active");
                    
                    filter = sessionStorage.getItem("filter");
                    sort = sessionStorage.getItem("sort");
                    
                    filterMinPrice = sessionStorage.getItem("filterMinPrice");
                    if(filterMinPrice !== "-1" && filterMinPrice !== "")
                    {
                        $('#min-price').val(filterMinPrice);
                        $('#mb-min-price').val(filterMinPrice);
                    }
                    
                    filterMaxPrice = sessionStorage.getItem("filterMaxPrice");
                    if(filterMaxPrice !== "-1" && filterMaxPrice !== "")
                    {
                        $('#max-price').val(filterMaxPrice);
                        $('#mb-max-price').val(filterMaxPrice);
                    }
                    if((filterMinPrice !== -1 && filterMinPrice !== "") || (filterMaxPrice !== -1 && filterMaxPrice !== ""))
                    {
                         $(".widget-box__price-btn").addClass("active");
                    }

                    
                    datesort = sessionStorage.getItem("datesort");
                    pricesort = sessionStorage.getItem("pricesort");
                    if(sessionStorage.getItem("activeCheckBoxes") !== null)
                    {
                        activeCheckBoxesTemp = JSON.parse(sessionStorage.getItem("activeCheckBoxes"));
                        if(activeCheckBoxesTemp[0] !== "undefined")
                        {
                            for(var i = 0; i < activeCheckBoxesTemp.length; i++)
                            {
                                if(activeCheckBoxesTemp[i] == "undefined")
                                    continue;
                                if(activeCheckBoxesTemp[i] === "stock")
                                {
                                    if(desktopFilter == 1)
                                    {
                                        $('#stc').parent().addClass("active");
                                        document.getElementById('stc').checked = true;
                                    }
                                    if(mobileFilter == 1)
                                    {
                                        $('#mb_stc').parent().addClass("active");
                                        document.getElementById('mb_stc').checked = true;
                                    }
                                }
                                else if(activeCheckBoxesTemp[i] === "discount")
                                {
                                    if(desktopFilter == 1)
                                    {
                                        $('#discount').parent().addClass("active");
                                        document.getElementById('discount').checked = true;
                                    }
                                    if(mobileFilter == 1)
                                    {
                                        $('#mb_discount').parent().addClass("active");
                                        document.getElementById('mb_discount').checked = true;
                                    }
                                    
                                }
                                else if(activeCheckBoxesTemp[i] === "bestProducts")
                                {
                                    if(desktopFilter == 1)
                                    {
                                        $('#adv-bestseller').parent().addClass("active");
                                        document.getElementById('adv-bestseller').checked = true;
                                    }
                                    if(mobileFilter == 1)
                                    {
                                        $('#mb_adv-bestseller').parent().addClass("active");
                                        document.getElementById('mb_adv-bestseller').checked = true;
                                    }
                                }
                                else if(activeCheckBoxesTemp[i] === "otoDiscount")
                                {
                                    if(desktopFilter == 1)
                                    {
                                        $('#adv-campaign').parent().addClass("active");
                                        document.getElementById('adv-campaign').checked = true;
                                    }
                                    if(mobileFilter == 1)
                                    {
                                        $('#mb_adv-campaign').parent().addClass("active");
                                        document.getElementById('mb_adv-campaign').checked = true;
                                    }
                                }
                                else if(activeCheckBoxesTemp[i].substr(0,4) === "cat_")
                                {
                                    $('#' + activeCheckBoxesTemp[i]).parent().addClass("active");
                                    document.getElementById(activeCheckBoxesTemp[i]).checked = true;
                                }
                                else
                                {
                                    if(desktopFilter == 1)
                                    {
                                        $('#var_' + activeCheckBoxesTemp[i]).parent().addClass("active");
                                        document.getElementById('var_' + activeCheckBoxesTemp[i]).checked = true;
                                    }
                                    if(mobileFilter == 1)
                                    {
                                        $('#mb_var_' + activeCheckBoxesTemp[i]).parent().addClass("active");
                                        document.getElementById('mb_var_' + activeCheckBoxesTemp[i]).checked = true;
                                    }
                                }
                                activeCheckBoxes.push(activeCheckBoxesTemp[i]);
                                
                            }
                        }
                        
                    }
                    //setTimeout("sendFilterInfo(1)", 100);
                    variationChecker();
                    
                    if(sort !== "0")
                    {
                        if(datesort !== "-1")
                        {
                            if(datesort === "1")
                            {
                                document.getElementById("date-newer").checked = true;
                                document.getElementById("mb_date-newer").checked = true;
                                $('#date-newer').parent().addClass("active");
                                $('#mb_date-newer').parent().addClass("active");
                            }
                            else
                            {
                                document.getElementById("date-older").checked = true;
                                document.getElementById("mb_date-older").checked = true;
                                $('#date-older').parent().addClass("active");
                                $('#mb_date-older').parent().addClass("active");
                            }
                        }
                        if(pricesort !== "-1")
                        {
                            if(pricesort === "1")
                            {
                                document.getElementById("price-low").checked = true;
                                document.getElementById("mb_price-low").checked = true;
                                $('#price-low').parent().addClass("active");
                                $('#mb_price-low').parent().addClass("active");
                            }
                            else
                            {
                                document.getElementById("price-high").checked = true;
                                document.getElementById("mb_price-high").checked = true;
                                $('#price-high').parent().addClass("active");
                                $('#mb_price-high').parent().addClass("active");
                            }
                        }   
                    }
                    if(activeCheckBoxes.length > 0)
                    {
                        $('.widget-box').addClass('active');
                    }
                }
                $(".headbar__btn").on('click', function(){
                   const modal = $(this).data("filter");
                   $(modal).addClass("show");
                   $("body").addClass("fixed-options");
                });
                $(".options-modal__close").on('click', function(){
                   $(this).parent().parent().removeClass("show");
                    $("body").removeClass("fixed-options");
                });
                if($(".headbar").length){
                    const fixedItem = $(".headbar").offset().top;             
                    $(window).scroll(function(){
                        var currentScroll = $(window).scrollTop();
                        if (currentScroll >= fixedItem) {
                            $('.headbar').addClass("fixed")
                        } else {
                            $('.headbar').removeClass("fixed");
                        }
                    });
                }
                });
                </script>
                
<script>
                function clearSorting()
                {
                    $(".widget-box__radio").parent().removeClass("active");
                    $("#clearSorting").removeClass("active");
                    $("#clearSortingMbl").removeClass("active");
                    
                    datesort = -1;
                    pricesort = -1;
                    sort = 0;
                    currentPictureCount = 0;
                    sessionStorage.setItem("currentPictureCount", "0");
                    sessionStorage.setItem("sort", "0");
                    sessionStorage.setItem("datesort", "-1");
                    sessionStorage.setItem("pricesort", "-1");
                }
                
                function clearFilter()
                {
                    $(".widget-box__checkbox").parent().removeClass("active");
                    $(".widget-box__price-input");
                    $("#clearFilter").removeClass("active");
                    $("#clearFilterMbl").removeClass("active");
                    $(".widget-box__price-btn").removeClass("active");
                    
                    $('#min-price').val("");
                    $('#mb-min-price').val("");
                    $('#max-price').val("");
                    $('#mb-max-price').val("");
                    
                    filter = 0;
                    filterMinPrice = -1;
                    filterMaxPrice = -1;
                    activeCheckBoxes.length = 0;
                    currentPictureCount = 0;
                    sessionStorage.setItem("currentPictureCount", "0");
                    sessionStorage.setItem("filter", "0");
                    sessionStorage.setItem("filterMinPrice", "-1");
                    sessionStorage.setItem("filterMaxPrice", "-1");
                    sessionStorage.setItem("activeCheckBoxes", null);
                    sessionStorage.setItem("selectedCategory", "0");
                    variationChecker();
                }
                </script>                <script>
                
                function filterChecker(data)
                {
                    
                        variationMatrix = data;
                        var twoDifferentCheckboxChecked = 0;
                        var mainvariation = 0;
                        var unDisabledCheckBoxes = [];
                        var splitedItem = [];
                        var checkVariation = 0;
                        activeCheckBoxes.forEach(function myFunction(item, index) {
                            if(!(item.substr(0,4) === "cat_"))
                            {
                                if(item.substr(0,3) === "mb_")
                                {
                                    item = item.substr(3);
                                }
                                splitedItem = item.split("_");
                                unDisabledCheckBoxes.push(item);
                                if(item === "bestProducts" || item === "otoDiscount" || item === "discount" || item === "stock")
                                {
                                    $.each(variationMatrix[item], function myFunction2(item2, index2) {
                                        if(unDisabledCheckBoxes.indexOf(index2) === -1)
                                        {
                                              unDisabledCheckBoxes.push(index2);
                                              twoDifferentCheckboxChecked = 1;
                                        }
                                    });
                                }
                                else
                                {
                                    
                                    $.each(variationMatrix[splitedItem[0]], function myFunction2(item2, index2) {
                                        
                                        checkVariation = 1;
                                        if(splitedItem[1] === item2)
                                        {
                                            $.each(index2, function myFunction3(item3, index3) {
                                                ///burada o key mi kontrolü yapılmıyo hata bundan dolayı
                                               
                                               if(unDisabledCheckBoxes.indexOf(index3) === -1)
                                                {
                                                    if(mainvariation === 0)
                                                    {
                                                        mainvariation = splitedItem[0];
                                                    }
                                                    else
                                                    {
                                                        if(mainvariation !== splitedItem[0])
                                                        {
                                                            twoDifferentCheckboxChecked = 1;
                                                        }
                                                    }
                                                    unDisabledCheckBoxes.push(index3);  
                                                }
                                            });
                                        }
                                    });
                                    if(mainvariation === 0 && twoDifferentCheckboxChecked === 0)
                                        mainvariation = splitedItem[0];
                                }
                            }
                        });
                        if(mainvariation !== 0 || twoDifferentCheckboxChecked !== 0 || unDisabledCheckBoxes.length !== 0 || checkVariation === 1)
                            variationDisabledProcess(mainvariation, twoDifferentCheckboxChecked, unDisabledCheckBoxes);
                        else 
                            variationUnDisabledProcess();
                }
                var variationMatrix = [];
                function variationChecker(clickType = "var")
                {
                    if(!(clickType.substr(0,4) === "cat_"))
                    {
                        $.ajax({
                            method: "POST",
                            url: "lib/ajax/GetFilterMatrix.php",
                            data: { 
                                shopname : "SiskoMedya",
                                activeCheckBoxes: activeCheckBoxes
                            },
                            dataType: 'json'
                        }).done(function(data) {
                            filterChecker(data);
                        });
                    }
                }
                </script>                <script>
                function variationDisabledProcess(mainvariation, twoDifferentCheckboxChecked, unDisabledCheckBoxes)
                {
                    var dataid;
                    var splitedItem;
                    var checkboxlist = $('.widget-box__label');
                    for (var i = 0; i < checkboxlist.length; i++)
                    {
                        dataid = $(checkboxlist[i]).data('id') + "";
                        if(dataid.substr(0,3) === "mb_")
                        {
                            dataid = dataid.substr(3);
                        }
                        splitedItem = dataid.split("_");
                        
                        if(!(dataid.substr(0,4) === "cat_") && dataid !== "" && dataid !== null && dataid !== "null" && dataid !== "undefined")
                        {   
                            if(mainvariation + "" === splitedItem[0] + "" && twoDifferentCheckboxChecked === 0)
                            {
                                $(checkboxlist[i]).removeClass("disabled");
                                $(checkboxlist[i]).parent().attr("style","display: block");    
                                continue;
                            }
                            
                            if(splitedItem.length !== 2 && dataid !== "discount" && dataid !== "otoDiscount"
                            && dataid !== "bestProducts" && dataid !== "stock")
                                continue;
                            
                            if(splitedItem.length === 2)
                                dataid = splitedItem[1];
                            
                            if(unDisabledCheckBoxes.indexOf(dataid) === -1)
                            {
                                if(!$(checkboxlist[i]).parent().hasClass("active"))
                                {
                                    $(checkboxlist[i]).addClass("disabled");
                                    $(checkboxlist[i]).parent().attr("style","display: none");
                                }
                            }
                            else
                            {
                                $(checkboxlist[i]).removeClass("disabled");
                                $(checkboxlist[i]).parent().attr("style","display: block");
                            }
                        }
                    } 
                }
                
                function variationUnDisabledProcess()
                {
                    var dataid;
                    var splitedItem;
                    var checkboxlist = $('.widget-box__label');
                    for (var i = 0; i < checkboxlist.length; i++)
                    {
                        dataid = $(checkboxlist[i]).data('id') + "";
                        if(dataid.substr(0,3) === "mb_")
                        {
                            dataid = dataid.substr(3);
                        }
                        splitedItem = dataid.split("_");
                        if( (splitedItem.length == 2 && isNaN(splitedItem[0]) == false)
                        || dataid === "discount" || dataid === "otoDiscount"
                        || dataid === "bestProducts" || dataid === "stock")
                        {
                                $(checkboxlist[i]).removeClass("disabled");
                                $(checkboxlist[i]).parent().attr("style","display: block");
                        }
                        
                    }
                }
</script><script>
            $(document).ready(function() {
                var control1 = false;
                var control2 = false;
                $(".widget-box__price-btn").on('click', function() {
                    var minprice = $('#min-price').val();
                    var maxprice = $('#max-price').val();
                    filterMinPrice = minprice;
                    filterMaxPrice = maxprice;
                    if((filterMinPrice === -1 || filterMinPrice === "") && (filterMaxPrice === -1 || filterMaxPrice === ""))
                    {
                         $(".widget-box__price-btn").removeClass("active");
                    }
                    setTimeout("sendFilterInfo()", 100);
                });
                
                $('#showProductsBtn2, #showProductsBtn').on('click', function() {
                    if(this.id === "showProductsBtn2")
                    {
                        var minprice = $('#mb-min-price').val();
                        var maxprice = $('#mb-max-price').val();
                        filterMinPrice = minprice;
                        filterMaxPrice = maxprice;
                        history.pushState({}, "", (window.location+'').split('#')[0]);
                        hash = encodeHashCode(0,-1);
                        editUrl(hash);
                    }
                    $(this).parent().parent().removeClass("show");
                    $("body").removeClass("fixed-options");
                    setTimeout("sendFilterInfo()", 100);
                });
                
                $('.widget-radio').on('click', function() {
                    datesort = -1;
                    pricesort = -1;
                    if(this.id === "date-newer" || this.id === "mb_date-newer")
                        datesort = 1;
                    if(this.id === "date-older" || this.id === "mb_date-older")
                        datesort = 2;
                    if(this.id === "price-low" || this.id === "mb_price-low")
                        pricesort = 1;
                    if(this.id === "price-high" || this.id === "mb_price-high")
                        pricesort = 2;
                    
                    if(this.id.substr(0,3) !== "mb_")
                        setTimeout("sendFilterInfo()", 100);
                });
                
                $('.widget-box__label').on('click', function() {
                  var elem = $(this);
                    var dataid = elem.data("id") + "";
                    var isMobile = 0;
                    if(dataid == "undefined" || dataid == "" || dataid == "null")
                        return;
                    if(dataid.substr(0,3) === "mb_")
                    {
                        isMobile = 1;
                        dataid = dataid.substr(3);
                    }
                    var splitted_data = dataid.split("_");
                    if(activeCheckBoxes.indexOf(dataid) === -1)
                    {
                        activeCheckBoxes.push(dataid);
                        variationChecker(dataid);
                    }
                    else if(activeCheckBoxes.indexOf(dataid) !== -1)
                    {
                        var index = activeCheckBoxes.indexOf(dataid);
                        if (index !== -1)
                        {
                            activeCheckBoxes.splice(index, 1);
                            variationChecker(dataid);
                        }    
                    }
                    if(isMobile === 0)
                        setTimeout("sendFilterInfo()", 100);
                });
                            
                $(".widget-box__label").each(function(){
                    var thisBtn = $(this);
                    if(thisBtn.hasClass("widget-box__checkbox")){
                        checkboxController(thisBtn);
                    }
                    if(thisBtn.hasClass("widget-box__radio")){
                        radioController(thisBtn);
                    }                                        
                });
                
            $(".widget-box__price-input").each(function(){
                
                if((this.id === "min-price" || this.id === "mb-min-price") && this.value !== ""){
                    control1 = true;
                    $(".widget-box__price-btn").addClass("active");
                    $("#clearFilter").addClass("active");
                    $("#clearFilterMbl").addClass("active");
                }else if((this.id === "max-price" || this.id === "mb-max-price") && this.value !== ""){
                    control2 = true;
                    $(".widget-box__price-btn").addClass("active");
                    $("#clearFilter").addClass("active");
                    $("#clearFilterMbl").addClass("active");
                }

                $(this).keypress(function(e){
                    var keyCode = e.which ? e.which : e.keyCode
    
                    if ((keyCode >= 48 && keyCode <= 57)) {
                        if(this.id === "min-price" || this.id === "mb-min-price"){
                            control1 = true;
                        }else if(this.id === "max-price" || this.id === "mb-max-price"){
                            control2 = true;
                        }
                    }
                });
    
                $(this).keyup(function(){
                    if($(this).val() !== ""){
                        if(this.id === "min-price" || this.id === "mb-min-price"){
                            control1 = true;
                        }else if(this.id === "max-price" || this.id === "mb-max-price"){
                            control2 = true;
                        }
                        $(".widget-box__price-btn").addClass("active");
                    }else{
                        if((this.id === "min-price" || this.id === "mb-min-price") && (filterMinPrice === -1 || filterMinPrice === "")){
                            control1 = false;
                        }else if((this.id === "max-price" || this.id === "mb-max-price") && (filterMaxPrice === -1  || filterMaxPrice === "")){
                            control2 = false;
                        }
                    }
                    if(control1 === true || control2 === true){
                        $(".widget-box__price-btn").addClass("active");
                        $("#clearFilter").addClass("active");
                        $("#clearFilterMbl").addClass("active");
                    }else{
                        $(".widget-box__price-btn").removeClass("active");
                    }
                });
            });

        
                $(".widget-box__price-input").bind("keypress", function (e) {
                    
                    var keyCode = e.which ? e.which : e.keyCode;
                    
                    if(keyCode == 13){
                        
                        var minprice = $('#min-price').val();
                        var maxprice = $('#max-price').val();
                        filterMinPrice = minprice;
                        filterMaxPrice = maxprice;
                        if((filterMinPrice === -1 || filterMinPrice === "") && (filterMaxPrice === -1 || filterMaxPrice === ""))
                        {
                             $(".widget-box__price-btn").removeClass("active");
                        }
                        setTimeout("sendFilterInfo()", 100);
                    }
                });
                
                $("#clearFilter, #clearFilterMbl").on('click', function(){
                    clearFilter();
                    if(this.id !== "clearFilterMbl")
                        setTimeout("sendFilterInfo()", 100);
                    if(this.id === "clearFilterMbl")
                    {
                        history.pushState({}, "", (window.location+'').split('#')[0]);
                        hash = encodeHashCode(0,-1);
                        editUrl(hash);
                        tmpProductCategoryID = "0";
                    }
                });
        
                $("#clearSorting, #clearSortingMbl").on('click', function(){
                    clearSorting();
                    
                    if(this.id !== "clearSortingMbl")
                        setTimeout("sendFilterInfo()", 100);
                });
                
                
                
                $(".widget-box__heading").on('click', function(){
                    $(this).parent().toggleClass("active");
                });
            });

            function checkboxController(element){
                return $(element).on("click", function(){
                    $(this).parent().toggleClass("active");
                    $("#clearFilter").addClass("active");
                    if($(this).parent().parent().parent().parent().hasClass("options-modal__content")){
                        $("#clearFilterMbl").addClass("active");
                    }
                });
            }
        
            function radioController(element){
                return $(element).on("click", function(){
                    $(".widget-box__radio").parent().removeClass("active");
                    $(this).parent().addClass("active");
                    $("#clearSorting").addClass("active");
                    if($(this).parent().parent().parent().parent().hasClass("options-modal__content")){
                        $("#clearSortingMbl").addClass("active");
                    }
                });
            }
        </script>    <script>
        var contentWidth = $(".product-tabs").width();
        var allWidths = 0;

        $(".nav-item").each(function(){
            allWidths += $(this).width();
            if(allWidths >= contentWidth){
                $(".product-tabs-wrap").addClass("scrollable");
            }else{
                $(".product-tabs-wrap").removeClass("scrollable");
            }
        });
        $(".btn-scroll").on('click', function(){
            var left = $('.nav-item:last-child').position().left;
            var w = (left + 150) - contentWidth;
            if(!$(this).hasClass("scroll-reverse")){
                $('.product-tabs').animate({
                    scrollLeft: '+=' + 150
                }, function(){
                    if(w < 150){
                        $(".btn-scroll").addClass("scroll-reverse");
                    }
                });
            }else{
                $('.product-tabs').animate({
                    scrollLeft: 0
                }, function(){
                    setTimeout(function(){
                        $(".btn-scroll").removeClass("scroll-reverse");
                    }, 100);
                });
            }
        });

        $(".nav-item").on('click', function(){
            $(".nav-item").find(".nav-link").removeClass("active");
            $(this).find(".nav-link").addClass("active");
            var myScrollPos = $(this).find(".nav-link").offset().left + $(this).find(".nav-link").outerWidth(true)/2 + $('.product-tabs').scrollLeft() - $('.product-tabs').width()/2;
            $('.product-tabs').animate({
                scrollLeft: '' + myScrollPos + 'px'
            }, function(){
                var contentWidth = $(".product-tabs").width();                
                var left = $('.nav-item:last-child').position().left;
                var itemWdth = $('.nav-item:last-child').width();                
                if(((left + itemWdth) - 1) > contentWidth){
                    $(".btn-scroll").removeClass("scroll-reverse");
                }else{
                    $(".btn-scroll").addClass("scroll-reverse");
                }
            });            
        });
        
    </script>        <footer class="store-footer">
            <div class="store-footer__wrapper store-footer__wrapper-upper">
                <div class="container">
                    <div class="row store-footer__widgets">
                        <div class="col-12 col-md-10 col-lg-5 store-footer__widget">
                            <h3 class="store-footer__widget-heading"><?php echo $sonuc['adsoyad'] ?></h3>
                            <div class="store-footer__widget-detail">
                                <p class="store-footer__info-text"><?php echo $sonuc['profilaciklama'] ?></p>
                            </div>
                        </div>
                        <div class="col-12 col-md-10 col-lg-7">
                            <div class="row">
                                <div class="col-12 col-lg-6 store-footer__widget">
                                    <h3 class="store-footer__widget-heading">Koşullar</h3>
                                    <div class="store-footer__widget-detail">
                                        <ul class="store-footer__menu">
                                            <li class="store-footer__menu-item">
                                                <a href="javascript:void(0)" class="store-footer__menu-link" data-id="shipping_secure">Alışveriş Güvenliği</a>
                                            </li>
                                            <li class="store-footer__menu-item">
                                                <a href="javascript:void(0)" class="store-footer__menu-link" data-id="preliminary_information_form">Ön Bilgilendirme Formu</a>
                                            </li>
                                            <li class="store-footer__menu-item">
                                                <a href="javascript:void(0)" class="store-footer__menu-link" data-id="distance_selling_contract">Mesafeli Satış Sözleşmesi</a>
                                            </li>
                                            <li class="store-footer__menu-item">
                                                <a href="javascript:void(0)" class="store-footer__menu-link" data-id="protection_of_personal_data">Kişisel Verilerin Korunması</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 store-footer__widget">
                                    <h3 class="store-footer__widget-heading">Sipariş Takibi</h3>
                                    <div class="store-footer__widget-detail">
                                        <p class="store-footer__info-text">Siparişinizin güncel durumunu kontrol etmek için sipariş numarası giriniz.</p>
                                        <div class="store-footer__order-form">
                                            <div class="form-group">
                                                <label class="sr-only" for="sd-inputOrderCode">Sipariş No</label>
                                                <!--<input class="form-control form-control-lg form-group__input d-none d-lg-block" type="text" name="OrderCode" placeholder="Sipariş No" id="sd-inputOrderCode" required="true" onkeypress="validate(event)">-->
                                                <input class="form-control form-control-lg form-group__input" type="number" name="OrderCode" placeholder="Sipariş No" id="sd-inputOrderCode" required="true"  pattern="[0-9]*">
                                                <!--<input class="form-control form-control-lg form-group__input d-block d-lg-none" type="number" name="OrderCode" placeholder="Sipariş No" id="sd-inputOrderCodeMbl" required="true">-->
                                                <a  class="form-group__search-btn" id="btnOrderCode" data-target="#orderTracking" style="cursor: pointer">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M23.809 21.646l-6.205-6.205c1.167-1.605 1.857-3.579 1.857-5.711 0-5.365-4.365-9.73-9.731-9.73-5.365 0-9.73 4.365-9.73 9.73 0 5.366 4.365 9.73 9.73 9.73 2.034 0 3.923-.627 5.487-1.698l6.238 6.238 2.354-2.354zm-20.955-11.916c0-3.792 3.085-6.877 6.877-6.877s6.877 3.085 6.877 6.877-3.085 6.877-6.877 6.877c-3.793 0-6.877-3.085-6.877-6.877z"></path></svg>
                                                </a>
                                                <a class="form-group__search-btn ml-2" id="btnOrderCode2" data-target="#orderTracking" style="cursor: pointer">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M23.809 21.646l-6.205-6.205c1.167-1.605 1.857-3.579 1.857-5.711 0-5.365-4.365-9.73-9.731-9.73-5.365 0-9.73 4.365-9.73 9.73 0 5.366 4.365 9.73 9.73 9.73 2.034 0 3.923-.627 5.487-1.698l6.238 6.238 2.354-2.354zm-20.955-11.916c0-3.792 3.085-6.877 6.877-6.877s6.877 3.085 6.877 6.877-3.085 6.877-6.877 6.877c-3.793 0-6.877-3.085-6.877-6.877z"></path></svg>
                                                </a>
                                                <p class="text-danger mt-2 mb-0" style="display: none;" id="footer_order_not_found"><span id='not_found_orderid'></span> numaralı sipariş bulunamadı, lütfen kontrol ediniz.</p>
                                                <p class="text-danger mt-2 mb-0" style="display: none;" id="footer_order_empty">Lütfen geçerli bir sipariş numarası giriniz.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="store-footer__wrapper store-footer__wrapper-end">
                <div class="container">
                    <div class="row store-footer__end">
                        <div class="col-12 col-md-6 col-lg-6">
                            <p class="store-footer__copyright">© Shopier | Tüm hakları saklıdır.</p>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="store-footer__payments">                               
                                <div class="icon-payment">
                                    <svg id="Payment_Icons" data-name="Payment Icons" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 38 38"><title>visa-outline</title><path d="M33,8a4,4,0,0,1,4,4V26a4,4,0,0,1-4,4H5a4,4,0,0,1-4-4V12A4,4,0,0,1,5,8H33m0-1H5a5,5,0,0,0-5,5V26a5,5,0,0,0,5,5H33a5,5,0,0,0,5-5V12a5,5,0,0,0-5-5Z"/><path d="M15.76,15.56l-2.87,6.89H11L9.61,17a.75.75,0,0,0-.42-.61,7.69,7.69,0,0,0-1.74-.59l0-.2h3a.84.84,0,0,1,.82.71l.74,4,1.84-4.69Zm7.33,4.64c0-1.81-2.5-1.91-2.48-2.73,0-.24.24-.51.75-.57a3.32,3.32,0,0,1,1.75.3l.31-1.46a4.93,4.93,0,0,0-1.66-.3c-1.75,0-3,.93-3,2.28,0,1,.88,1.54,1.55,1.87s.92.56.92.86c0,.46-.55.66-1.06.67a3.66,3.66,0,0,1-1.82-.43L18,22.2a5.41,5.41,0,0,0,2,.36c1.86,0,3.07-.92,3.08-2.36m4.62,2.25h1.63l-1.42-6.89H26.41a.82.82,0,0,0-.76.51L23,22.45h1.86l.36-1h2.27Zm-2-2.44.94-2.58L27.2,20Zm-7.44-4.45-1.46,6.89H15.06l1.46-6.89Z"/></svg>
                                </div>
                                <div class="icon-payment">
                                    <svg id="Payment_Icons" data-name="Payment Icons" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 38 38"><title>mastercard-outline</title><path d="M33,8a4,4,0,0,1,4,4V26a4,4,0,0,1-4,4H5a4,4,0,0,1-4-4V12A4,4,0,0,1,5,8H33m0-1H5a5,5,0,0,0-5,5V26a5,5,0,0,0,5,5H33a5,5,0,0,0,5-5V12a5,5,0,0,0-5-5Z"/><path d="M18.11,15.08a4.75,4.75,0,1,0,0,7.84,5.93,5.93,0,0,1,0-7.84Z"/><circle cx="22.56" cy="19" r="4.75"/></svg>
                                </div>
                                <div class="icon-payment">
                                    <svg id="Payment_Icons" data-name="Payment Icons" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 38 38"><title>amex-outline</title><path d="M33,8a4,4,0,0,1,4,4V26a4,4,0,0,1-4,4H5a4,4,0,0,1-4-4V12A4,4,0,0,1,5,8H33m0-1H5a5,5,0,0,0-5,5V26a5,5,0,0,0,5,5H33a5,5,0,0,0,5-5V12a5,5,0,0,0-5-5Z"/><path d="M18.66,16.5H18l-1.49,3.19L15,16.5H13v4.23L11.08,16.5H9.18L7,21.5H8.49l.45-1.11h2.34l.48,1.11h2.49V17.89l1.67,3.61h1.21l1.53-3.31V21.5H20v-5H18.66ZM9.41,19.25l.67-1.66.71,1.66Z"/><path d="M31,16.5H29.24L27.82,18,26.43,16.5H20.92v5h5.4l1.48-1.58,1.44,1.58H31L28.69,19ZM25,21v-.65H22.21v-.79H25V18.43H22.21v-.79H25v-.75L26.93,19Z"/></svg>    
                                </div>
                                <div class="icon-payment">
                                    <svg id="Payment_Icons" data-name="Payment Icons" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 38 38"><title>discover-outline</title><path d="M33,8a4,4,0,0,1,4,4V26a4,4,0,0,1-4,4H5a4,4,0,0,1-4-4V12A4,4,0,0,1,5,8H33m0-1H5a5,5,0,0,0-5,5V26a5,5,0,0,0,5,5H33a5,5,0,0,0,5-5V12a5,5,0,0,0-5-5Z"/><path d="M20.19,16.76A2.24,2.24,0,1,0,22.49,19,2.28,2.28,0,0,0,20.19,16.76ZM8.42,21.12H9.2V16.87H8.42ZM7,17.39A2.23,2.23,0,0,0,6.31,17a3,3,0,0,0-.84-.13H3.75v4.25H5.38A2.89,2.89,0,0,0,6.19,21a2.5,2.5,0,0,0,.74-.39,2,2,0,0,0,.55-.67A1.87,1.87,0,0,0,7.7,19a2.25,2.25,0,0,0-.19-.94A2,2,0,0,0,7,17.39Zm-.28,2.27a1.27,1.27,0,0,1-.38.45,1.91,1.91,0,0,1-.56.25,3.1,3.1,0,0,1-.69.08H4.53V17.56h.71a2.3,2.3,0,0,1,.66.08,1.48,1.48,0,0,1,.52.25,1.12,1.12,0,0,1,.34.45,1.62,1.62,0,0,1,.12.66A1.34,1.34,0,0,1,6.74,19.66Zm5.61-.76a2,2,0,0,0-.5-.21l-.5-.17a1.5,1.5,0,0,1-.38-.19.38.38,0,0,1-.16-.33.41.41,0,0,1,.07-.25.44.44,0,0,1,.16-.17.6.6,0,0,1,.23-.1,1.09,1.09,0,0,1,.26,0,1.22,1.22,0,0,1,.43.08.66.66,0,0,1,.33.26l.57-.59a1.46,1.46,0,0,0-.58-.33,2.19,2.19,0,0,0-.67-.11,2.33,2.33,0,0,0-.59.08,1.46,1.46,0,0,0-.52.24,1.25,1.25,0,0,0-.36.4,1,1,0,0,0-.14.57,1.07,1.07,0,0,0,.15.6,1.22,1.22,0,0,0,.39.36,2.29,2.29,0,0,0,.5.22l.5.16a1.27,1.27,0,0,1,.38.22.5.5,0,0,1,.08.61.49.49,0,0,1-.17.18.8.8,0,0,1-.25.11.84.84,0,0,1-.27,0,1.07,1.07,0,0,1-.87-.45l-.58.56a1.57,1.57,0,0,0,.64.44,2.38,2.38,0,0,0,.79.13,2.43,2.43,0,0,0,.61-.08,1.73,1.73,0,0,0,.51-.25,1.47,1.47,0,0,0,.35-.43,1.38,1.38,0,0,0,.13-.59,1,1,0,0,0-.16-.61A1.22,1.22,0,0,0,12.35,18.9ZM28,19.29h2V18.6H28v-1h2.12v-.69h-2.9v4.25h3v-.68H28Zm5.13-.05a1.17,1.17,0,0,0,.75-.37,1.2,1.2,0,0,0,.26-.78A1.14,1.14,0,0,0,34,17.5a1.09,1.09,0,0,0-.36-.38,1.69,1.69,0,0,0-.52-.19,3.08,3.08,0,0,0-.61-.06H31v4.25h.78v-1.8h.57l1,1.8h.94Zm-.42-.58h-.94V17.52h.67l.31,0a1.15,1.15,0,0,1,.28.07.46.46,0,0,1,.21.18.45.45,0,0,1,.08.3.51.51,0,0,1-.08.32.52.52,0,0,1-.23.18A.94.94,0,0,1,32.67,18.66ZM16.29,20.42a1.07,1.07,0,0,1-.51.13,1.52,1.52,0,0,1-.62-.12,1.43,1.43,0,0,1-.47-.33,1.69,1.69,0,0,1-.31-.5,1.81,1.81,0,0,1-.1-.63,1.45,1.45,0,0,1,.41-1.08,1.27,1.27,0,0,1,.47-.32,1.52,1.52,0,0,1,.62-.12,1.42,1.42,0,0,1,.45.08,1.33,1.33,0,0,1,.46.34l.61-.43a1.81,1.81,0,0,0-.71-.52,2.18,2.18,0,0,0-.82-.16,2.75,2.75,0,0,0-.93.16,2.21,2.21,0,0,0-.73.46,2.12,2.12,0,0,0-.48.71,2.52,2.52,0,0,0-.17.93,2.37,2.37,0,0,0,.17.9,2.08,2.08,0,0,0,.48.7,2,2,0,0,0,.73.45,2.52,2.52,0,0,0,.93.16,2.34,2.34,0,0,0,.91-.18,1.79,1.79,0,0,0,.72-.57L16.76,20A1.4,1.4,0,0,1,16.29,20.42Zm8.35-.33-1.19-3.22h-.89l1.71,4.25H25l1.76-4.25h-.84Z"/></svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>        
        <script>
              
        function searchOrder()
        {
            if($('#orderTracking .modal-dialog').hasClass('animated')){
                $('#orderTracking .modal-dialog').removeClass('bounceOut');
                $('#orderTracking .modal-dialog').removeClass('bounceIn');
                $('#orderTracking .modal-dialog').removeClass('animated');
            }
            
            const bodyDefault = document.querySelector('#modalDefault'),
            bodyAction = document.querySelector('#modalAction'),
            bodyAlertSuccess = document.getElementById('bodyAlertSuccess');
    
            bodyDefault.style.display = 'block';
            bodyAction.style.display = 'none';
                                 
            var orderid;
            orderid = $('#sd-inputOrderCode').val();
                
                if(orderid === "" || orderid.length < 2)
                {
                    $('#footer_order_not_found').css('display', 'none');
                    $('#footer_order_empty').css('display', 'block');
                    return;
                }
                $.ajax({
                    method: "POST",
                    url: "lib/ajax/SearchOrderForBuyer.php",
                    data: {
                            shop : "SiskoMedya",
                            orderid : orderid,
                        },
                    dataType: 'json'
                }).done(function(data) {
                    $('#footer_order_not_found').css('display', 'none');
                    $('#footer_order_empty').css('display', 'none');
                    $('#footer_order_id').text(orderid);
                    
                    if(data.order_status == "2" && data.is_digital == "0")
                    {
                        $('#footer_cargo_message').css('display','block');
                        $('#footer_order_result_message_order_complete').css({
                            display: 'block',
                            width: '100%'
                        });
                        $('#footer_order_model_footer_order_complete').css({
                            display: 'block',
                            width: '100%'
                        });
                        
                        $('#footer_cargo_message_digital').css('display','none');
                        $('#footer_order_model_footer_order_cargo').css('display', 'none');
                        $('#footer_order_model_footer_order_refund').css('display', 'none');
                        $('#footer_order_result_message_order_cargo').css('display', 'none');
                        $('#footer_order_result_message_order_cancel').css('display', 'none');
                        $('#footer_order_result_message_order_refund').css('display', 'none');
                        $('#btnTrackingAction').css('display', 'none');
                        $('#footer_order_result_message_order_delivered').css('display', 'none');
                        $('#footer_order_model_footer_order_delivered').css('display', 'none');
                        $('#footer_cargo_message_delivered').css('display', 'none');
                    }
                    else if(data.order_status == "2" && data.is_digital == "1")
                    {
                        $('#footer_cargo_message_digital').css({
                            display: 'block',
                            width: '100%'
                        });
                        $('#footer_order_result_message_order_complete').css({
                            display: 'block',
                            width: '100%'
                        });
                        $('#footer_order_model_footer_order_complete').css({
                            display: 'block',
                            width: '100%'
                        });
                        
                        $('#footer_cargo_message').css('display','none');
                        $('#footer_order_model_footer_order_cargo').css('display', 'none');
                        $('#footer_order_model_footer_order_refund').css('display', 'none');
                        $('#footer_order_result_message_order_cargo').css('display', 'none');
                        $('#footer_order_result_message_order_cancel').css('display', 'none');
                        $('#footer_order_result_message_order_refund').css('display', 'none');
                        $('#btnTrackingAction').css('display', 'none');
                        $('#footer_order_result_message_order_delivered').css('display', 'none');
                        $('#footer_order_model_footer_order_delivered').css('display', 'none');
                        $('#footer_cargo_message_delivered').css('display', 'none');
                    }
                    else if(data.order_status == "5" && data.is_digital == "0")
                    {
                        $('#footer_order_result_message_order_cargo').css({
                            display: 'block',
                            width: '100%'
                        });
                        $('#footer_order_model_footer_order_cargo').css({
                            display: 'block',
                            width: '100%'
                        });
                        $('#btnTrackingAction').css({
                            display: 'block',
                            width: '100%'
                        });
                        
                        $('#footer_cargo_message').css('display','none');
                        $('#footer_order_result_message_order_complete').css('display', 'none');
                        $('#footer_order_model_footer_order_complete').css('display', 'none');
                        $('#footer_order_result_message_order_cancel').css('display', 'none');
                        $('#footer_order_model_footer_order_refund').css('display', 'none');
                        $('#footer_order_result_message_order_delivered').css('display', 'none');
                        $('#footer_order_model_footer_order_delivered').css('display', 'none');
                        $('#footer_cargo_message_delivered').css('display', 'none');
                        $('#footer_order_result_message_order_refund').css('display', 'none'); 
                        $('#footer_cargo_message_digital').css('display','none');
                    }
                    else if(data.order_status == "5" && data.is_digital == "1")
                    {
                        $('#footer_cargo_message_delivered').css({
                            display: 'block',
                            width: '100%'
                        });
                        $('#footer_order_result_message_order_delivered').css({
                            display: 'block',
                            width: '100%'
                        });
                        $('#footer_order_model_footer_order_delivered').css({
                            display: 'block',
                            width: '100%'
                        });
                        
                        $('#footer_order_result_message_order_cargo').css('display', 'none');
                        $('#footer_order_model_footer_order_cargo').css('display', 'none');
                        $('#footer_order_model_footer_order_complete').css('display', 'none');
                        $('#footer_order_result_message_order_cancel').css('display', 'none');
                        $('#footer_order_model_footer_order_refund').css('display', 'none');
                        $('#btnTrackingAction').css('display', 'none');
                        $('#footer_order_result_message_order_refund').css('display', 'none');
                        $('#footer_cargo_message').css('display','none'); 
                        $('#footer_order_result_message_order_complete').css('display', 'none');
                        $('#footer_cargo_message_digital').css('display','none');
                    }
                    else if(data.order_status == "7" || data.order_status == "8" )
                    {
                        if(data.order_status == "7")
                        {
                            $('#footer_order_result_message_order_cancel').css({
                            display: 'block',
                            width: '100%'
                        }); 
                            $('#footer_order_result_message_order_refund').css('display', 'none'); 
                        }else
                        {
                            $('#footer_order_result_message_order_refund').css({
                            display: 'block',
                            width: '100%'
                        }); 
                            $('#footer_order_result_message_order_cancel').css('display', 'none'); 
                        }
                        $('#footer_order_model_footer_order_refund').css({
                            display: 'block',
                            width: '100%'
                        });
                        
                        $('#footer_cargo_message_digital').css('display','none');
                        $('#footer_order_result_message_order_cargo').css('display', 'none');
                        $('#footer_order_model_footer_order_cargo').css('display', 'none');
                        $('#footer_cargo_message').css('display','none');
                        $('#footer_order_result_message_order_complete').css('display', 'none');
                        $('#footer_order_model_footer_order_complete').css('display', 'none');
                        $('#btnTrackingAction').css('display', 'none');
                        $('#footer_order_result_message_order_delivered').css('display', 'none');
                        $('#footer_order_model_footer_order_delivered').css('display', 'none');
                        $('#footer_cargo_message_delivered').css('display', 'none');
                    }
                    
                    if(data.order_status != "-1")
                    {
                        $('#orderTracking').modal('show');
                        $('#footer_order_not_found').css('display', 'none');
                    }
                    else
                    {
                        $('#not_found_orderid').text(orderid);
                        $('#footer_order_not_found').css({
                            display: 'block',
                            width: '100%'
                        });
                        
                    }
                    
                });
        }
        $(document).ready(function (){
                                         
            var input = document.getElementById("sd-inputOrderCode");
            input.addEventListener("keyup", function(e) {
              if (e.keyCode === 13) {
                searchOrder();
              }
            });
            
            $('#btnOrderCode, #btnOrderCode2').on('click', function (e){
                e.preventDefault();
                searchOrder();
            });
            
            const btn = document.getElementById('btnTrackingAction');
            btn.addEventListener('click', orderTrackingAction);
            
            function orderTrackingAction(){
                const bodyDefault = document.querySelector('#modalDefault'),
                bodyAction = document.querySelector('#modalAction'),
                bodyLoader = document.getElementById('bodyLoader'),
                bodyAlertSuccess = document.getElementById('bodyAlertSuccess');
    
                bodyDefault.style.display = 'none';
                bodyAction.style.display = 'block';
        
            }
            
            $('#btnTrackingAction').on('click', function() {
                var message_type = 0;
                var smsradio = document.getElementById("tracking_sms_select").checked;
                if(smsradio == true)
                    message_type = 1;
                if(message_type == 0)
                {
                    $('#footer_tracking_email_result').css({
                            display: 'block',
                            width: '100%'
                        });
                    $('#footer_cargo_tracking_email_sending').css({
                            display: 'block',
                            width: '100%'
                        });
                    
                    $('#footer_tracking_sms_result').css('display', 'none');
                    $('#footer_cargo_tracking_sms_sending').css('display', 'none');
                }
                else 
                {
                    $('#footer_tracking_sms_result').css({
                            display: 'block',
                            width: '100%'
                        });
                    $('#footer_cargo_tracking_sms_sending').css({
                            display: 'block',
                            width: '100%'
                        });
                    
                    $('#footer_tracking_email_result').css('display', 'none');
                    $('#footer_cargo_tracking_email_sending').css('display', 'none');
                }
                setTimeout(function(){
                    bodyLoader.classList.remove('show');
                    bodyAlertSuccess.classList.add('show');
                }, 3000);
        
                setTimeout(function(){
                    bodyDefault.style.display = 'block';
                    bodyAction.style.display = 'none';
                    bodyLoader.classList.add('show');
                    bodyAlertSuccess.classList.remove('show');
                }, 6000);
                
            
                var orderid;
            orderid = $('#sd-inputOrderCode').val();
                
                $.ajax({
                    method: "POST",
                    url: "lib/ajax/SendOrderInfo.php",
                    data: {
                            orderid : orderid,
                            message_type : message_type 
                        },
                    dataType: 'json'
                }).done(function(data) {
                    
                });
            });
            
            
            
        });
        </script>        <script>
        $('.store-footer__menu-link').on('click', function (myitem){
            if($('#conditionsmodal .modal-dialog').hasClass('animated')){                
                $('#conditionsmodal .modal-dialog').removeClass('bounceOut');                
                $('#conditionsmodal .modal-dialog').removeClass('bounceIn');                
                $('#conditionsmodal .modal-dialog').removeClass('animated');
            }
            var dataid = $(this).data('id'); 
            var footermenu_link_modal_list = ['shipping_secure',
                'preliminary_information_form',
                'distance_selling_contract',
                'protection_of_personal_data'];
            for(var i = 0; i < footermenu_link_modal_list.length; i++)
            {
                if(footermenu_link_modal_list[i] == dataid)
                {
                    $('#' + footermenu_link_modal_list[i]).css('display', 'block');
                    $('#' + footermenu_link_modal_list[i] + "_head").css('display', 'block');
                }
                else
                {
                    $('#' + footermenu_link_modal_list[i]).css('display', 'none');
                    $('#' + footermenu_link_modal_list[i] + "_head").css('display', 'none');
                }
            }
            $('#conditionsmodal').modal('show');
        });
        
        $(document).ready(function() {
            var currentUrl = window.location+"";
            var url = new URL(currentUrl);
            var searchOrderId;
            if(currentUrl.search("ordertotrack") !== -1)
            {
                setTimeout(function () {
                    searchOrderId = url.searchParams.get("ordertotrack");
                    window.scrollTo(0,document.body.scrollHeight);
                    $('#sd-inputOrderCode').val(searchOrderId);
                    searchOrder();
                }, 500);
            }
            
            
        });
            
            </script>        <div class="modal fade" id="conditionsmodal" tabindex="-1" role="dialog" aria-labelledby="privacy" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="shipping_secure_head">Alışveriş Güvenliği</h5>
                        <h5 class="modal-title" id="preliminary_information_form_head">Ön Bilgilendirme Formu</h5>
                        <h5 class="modal-title" id="distance_selling_contract_head">Mesafeli Satış Sözleşmesi</h5>
                        <h5 class="modal-title" id="protection_of_personal_data_head">Kişisel Verilerin Korunması ve İşlenmesine İlişkin Aydınlatma Metni ve Gizlilik Politikası</h5>
                        <button class="btn btn-link btn-sm dropdown-close" type="button" data-dismiss="modal" aria-label="Close"><span class="sr-only">Menü</span></button>
                    </div>
                    
                        <div class="modal-body">
                            <div id="shipping_secure"><ul type="disc"><li>
			   <b>Kredi Kartı Güvenliği:</b>
			</li><li>
			
			   Değer Teknoloji A.Ş. (“Şirket” veya “Shopier”), Satıcılarla Alıcıları bir araya getiren bir platformdur ve Alıcılara yönelik herhangi bir ürün veya hizmet satışı yapmamaktadır. Tarafınızca satın alınan ürünler, Şirket tarafından değil, Satıcılar tarafından satışa
			    sunulmaktadır ve satın almanız halinde tarafınıza Satıcılar tarafından gönderilmektedir.
			</li><li>
			    Shopier üzerinden yapacağınız tüm alışverişlerde her bankanın tüm kredi kartları ile ödeme yapabilirsiniz.
			</li><li>
			    Shopier üzerinden kredi kartıyla yapacağınız alışverişlerde, Şirket güvenliğiniz için her zaman için en son teknolojileri kullanmakta ve en iyi hizmet
			    sağlayıcılarla çalışmaktadır.
			</li><li>
			    Kişisel bilgi girilen her sayfada internet tarayıcınızda göreceğiniz anahtar simgesi, tarayıcınızla gönderdiğiniz hiçbir bilginin üçüncü kişilerce görüntülenmemesi için gerekli önlemlerin alındığının taahhüdüdür.
			</li><li>
			    Güvenlik amacıyla Shopier üzerinden vereceğiniz her siparişi oluşturma aşamasında kart bilgilerini yeniden girmeniz gerekmektedir. Şirket, kişisel
			    bilgilerinizi, kredi kart numaranızı ya da kredi kartı şifrelerinizi kayıt altına almaz ya da saklamaz.
			</li><li>
			    Şirket’in, Satıcı ve/veya Ödeme Hizmet Sağlayıcıların sakladığı/saklayacağı bilgiler konusunda herhangi bir sorumluluğu bulunmamaktadır.
			</span><br>
			<br>
			</ul>
			<ul type="disc"><li>
			    <b>3 Boyutlu Güvenlik / 3D Secure:</b>
			</li><li>
			
			    3 Boyutlu Güvenlik (3D Secure), çevrimiçi alışverişlerin güvenliğini sağlamak amacıyla kredi kartı şirketleri tarafından geliştirilmiş bir kimlik doğrulama
			    sistemine verilen isimdir. Bu yöntemle gerçekleştirilen alışverişlerin geçerli sayılabilmesi için; kart sahibinin yapılan işlemi, kendine verilen özel bir
			    şifreyle doğrulayıp onay sürecini tamamlaması gerekmektedir.
			</li><li>
			    Shopier üzerinden yapacağınız alışverişlerde, bankanızın bu güvenlik sistemini desteklemesi halinde ödemenizi 3 Boyutlu güvenlik şifrenizi kullanarak gerçekleştirmenizi sağlayabilir.
			    <br><br>
			    İşbu Sözleşme, 16/08/2023 tarihinde yürürlüğe girecek ve bu tarih itibarı ile tüm kullanıcılar bakımından geçerli olacaktır.</ul>                            </div>
                            <div id="preliminary_information_form"><p><strong> </strong>
			    <strong>1. TARAFLAR:</strong>
			</span><br><br>
			<span class="modal-text">
			    <strong><u>SATICI:</u></strong>
			</p><p>
			    <strong>Adı – Soyadı / Unvanı : </strong>
			</p><p>
			    <strong>VKN veya TCKN : </strong>
			</p><p>
			    <strong>Adresi :  / </strong>
			</p><p>
			    <strong>Telefon : </strong>
			    <strong></strong>
			</p><p>
			    <strong>E-posta : </strong>
			</span><br><br>
			<span class="modal-text">
			    <strong><u>ARACI HİZMET SAĞLAYICI:</u></strong>
			</p><p>
			    <strong>Unvan : Değer Teknoloji A.Ş.</strong>
			</p><p>
			    <strong>MERSİS no : 0272045884800019</strong>
			</p><p>
			    <strong>Adresi : İçerenköy Mah. Umut Sok. Quick Tower No:10-12/70 Ataşehir, İstanbul</strong>
			</p><p>
			    <strong>Telefon : 08508401510</strong>
			</p><p>
			    <strong>E-posta : hello@shopier.com</strong>
			</span><br><br>
			<span class="modal-text">
			    <strong><u>ALICI (TÜKETİCİ):</u></strong>
			</p><p>
			    <strong>Adı – Soyadı :  </strong>
			</p><p>
			    <strong>Adresi :    </strong>
			</p><p>
			    <strong>Telefon : </strong>
			</p><p>
			    <strong>E-posta : </strong>
			</span><br><br>
			<span class="modal-text">
			    <strong><u>SATIN ALINAN ÜRÜN:</u></strong>
			</p><p>
			    <strong>Ürünün Adı : </strong>
			</p><p>
			    <strong>Adedi : </strong>
			</p><p>
			    <strong>Teslimat Adresi :    </strong>
			</p><p>
			    <strong>Teslim Edilecek Kişi :  </strong>
			</p><p>
			    <strong>Fatura Adresi :    </strong>
			</p><p>
			    <strong>Kargo Ücreti : Nakliyeye ilişkin kargo ve gönderim masrafları Alıcı’ya aittir. Bu bedel önceden net olarak hesaplanmamaktadır.</strong>
			</p><p>
			    <strong>Toplam Sipariş Tutarı (KDV Dahil) : </strong>
			</p><p>
			    <strong>Ödeme Şekli : Kredi kartı</strong>
			</span><br><br>
			<span class="modal-text">
			<span style="font-weight: normal"><span style="font-weight: normal">
			    <strong> </strong>
			    <strong>2. SÖZLEŞMENİN KONUSU</strong>
			</p><p>
			    <strong>2.1. </strong>
			    İşbu Sözleşme, 07.11.2013 tarihli ve 6502 sayılı Tüketicinin Korunması Hakkında Kanun’un 48. ve 84. maddeleri uyarınca hazırlanmış olan 27.11.2014 tarihli ve 29188 sayılı Resmi Gazete’de yayınlanarak 27.02.2015 tarihinde yürürlüğe giren Mesafeli Sözleşmeler Yönetmeliği hükümlerine uygun olarak düzenlenmiştir.
			</p><p>
			    <strong>2.2. </strong>
			    İşbu Sözleşmenin tarafları olan Satıcı ve Alıcı, işbu Sözleşmeyle birlikte Tüketicinin Korunması Hakkında Kanun ve Mesafeli Sözleşmeler Yönetmeliği’nden kaynaklanan yükümlülük ve sorumluluklarını bildiklerini ve anladıklarını kabul ve beyan ederler. 
			</p><p>
			    <strong>2.3. </strong>
			    İşbu Ön Bilgilendirme Formu, Mesafeli Satış Sözleşmesi’nin eki ve ayrılmaz bir parçasıdır.
			</span><br><br>
			<span class="modal-text" style="font-weight: bold;">
			    <strong> </strong>
			    <strong>3. GEÇERLİLİK VE SÜRESİ</strong>
			</p><p>
			    <strong>3.1. </strong>
			    İşbu formda yer alan ürün ya da hizmete ilişkin olarak Alıcı’ya sunulan tüm bilgiler ve vaatler Alıcı tarafından satın alınan ürünlerin teslimine kadar geçerli olup bu hizmetten sonra Satıcı tarafından işbu formda verilen bilgi ve vaatlerle bağlı kalınmadığı ihtar olunur.
			</p><p>
			    <strong>3.2. </strong>
			     İşbu ön bilgilendirme formu, elektronik ortamda Alıcı tarafından okunarak kabul edildikten sonra mesafeli satış sözleşmesi kurulması aşamasına geçilecektir. 
			</span><br><br>
			<span class="modal-text" style="font-weight: bold;">
			    <strong> </strong>
			    <strong>4. CAYMA HAKKI</strong>
			</p><p>
			    <strong>4.1. </strong>
			        Alıcı; malı teslim aldığı tarihten itibaren on dört gün içinde yürürlükteki mevzuatın izin verdiği ölçüde hiçbir hukuki ve cezai sorumluluk üstlenmeksizin ve hiçbir gerekçe göstermeksizin malı reddederek Sözleşme’den cayma hakkına sahiptir. Tüketicinin cayma bildiriminin Satıcı’ya ulaştığı tarihten itibaren 10 (on) gün içinde ürün bedeli Alıcı’ya iade edilir. Cayma hakkının kullanımından kaynaklanan masraflar Satıcı’nın Shopier Anlaşmalı Kargo hizmeti ile sağlayacağı iade kargo kodu kullanılması durumunda Satıcı’ya ait olup öngörülen dışında bir taşıyıcıyla iadesi halinde ise Alıcı’ya aittir.
			</p><p>
			    <strong>4.2. </strong>
			        Cayma bildirimi, Shopier’de yer alan "Talep / Şikayet Kaydı Oluşturma" formu üzerinden açılacak kayıt ile bildirilecektir.
			</p><p>
			    <strong>4.3. </strong>
			        Satıcı, tüketicinin hiçbir hukuki ve cezai sorumluluk üstlenmeksizin ve hiçbir gerekçe göstermeksizin malı teslim aldığı veya Sözleşmenin imzalandığı tarihten itibaren on dört gün içerisinde malı veya hizmeti reddederek Sözleşmeden cayma hakkının var olduğunu ve cayma bildiriminin Satıcı’ya ulaşması tarihinden itibaren ürünü geri almayı ve ürün bedelini Alıcı’ya ya da Değer Teknoloji A.Ş.’ye iade etmeyi taahhüt etmektedir. 
			</p><p>
			    <strong>4.4. </strong>
			    Taraflar, Mesafeli Sözleşmeler Yönetmeliği m. 15/1 uyarınca cayma hakkının aşağıdaki hallerde kullanamayacağını kabul etmiştir:
			</p><p>
			    <strong>4.4.1. </strong>
			    Fiyatı finansal piyasalardaki dalgalanmalara bağlı olarak değişen ve satıcı kontrolünde olmayan mal veya hizmetler,
			</p><p>
			    <strong>4.4.2. </strong>
			    Tüketicinin istekleri, talepleri veya kişisel ihtiyaçları doğrultusunda hazırlanan mallar,
			</p><p>
			    <strong>4.4.3. </strong>
			    Çabuk bozulabilen veya son kullanma tarihi geçebilecek mallar,
			</p><p>
			    <strong>4.4.4. </strong>
			    Tesliminden sonra ambalaj, bant, mühür, paket gibi koruyucu unsurları açılmış olan mallardan iadesi sağlık ve hijyen açısından uygun olmayanlar,
			</p><p>
			    <strong>4.4.5. </strong>
			    Tesliminden sonra başka ürünlerle karışan ve doğası gereği ayrıştırılması mümkün olmayan mallar,
			</p><p>
			    <strong>4.4.6. </strong>
			    Malın tesliminden sonra ambalaj, bant, mühür, paket gibi koruyucu unsurları açılmış olması halinde maddi ortamda sunulan kitap, dijital içerik ve
			    bilgisayar sarf malzemeleri,
			</p><p>
			    <strong>4.4.7. </strong>
			    Abonelik sözleşmesi kapsamında sağlananlar dışında, gazete ve dergi gibi süreli yayınlar,
			</p><p>
			    <strong>4.4.8. </strong>
			    Belirli bir tarihte veya dönemde yapılması gereken, konaklama, eşya taşıma, araba kiralama, yiyecek-içecek tedariki ve eğlence veya dinlenme amacıyla
			    yapılan boş zamanın değerlendirilmesine ilişkin hizmetler,
			</p><p>
			    <strong>4.4.9. </strong>
			    Elektronik ortamda anında ifa edilen hizmetler veya tüketiciye anında teslim edilen gayri maddi mallar,
			</p><p>
			    <strong>4.4.10. </strong>
			    Cayma hakkı süresi sona ermeden önce, tüketicinin onayı ile ifasına başlanan hizmetler,
			</p><p>
			    <strong>4.4.11. </strong>
			    13.10.1983 tarihli ve 2918 sayılı Karayolları Trafik Kanunu’na göre tescili zorunlu olan taşınırlar ile kayıt veya tescil zorunluluğu bulunan insansız hava araçlarına ilişkin mallar,
			</p><p>
			    <strong>4.4.12. </strong>
			    Tüketiciye teslimi yapılmış olan cep telefonu, akıllı saat, tablet ve bilgisayarlara ilişkin mallar,
			</p><p>
			    <strong>4.4.13. </strong>
			    Canlı müzayede şeklinde açık artırma yoluyla akdedilen ve
			</p><p>
			    <strong>4.4.14. </strong>
			    Tanıtma ve kullanma kılavuzunda satıcı veya yetkili servis tarafından kurulum veya montajının yapılacağı belirtilen mallardan kurulum ya da montajı yapılanlara ilişkin sözleşmeler.
			</span><br><br>
			<span class="modal-text" style="font-weight: bold;">
			    <strong> </strong>
			    <strong>5. MÜCBİR HALLER</strong>
			</p><p>
			    <strong>5.1. </strong>
			    Sözleşmenin akdedildiği tarihte var olmayan ve ön görülmeyen, tarafların kontrolleri dışında gelişen, ortaya çıkmasıyla taraflardan birinin ya da her ikisinin de sözleşme ile yüklendikleri borç ve sorumluluklarını kısmen ya da tamamen yerine getirmelerini ya da bunları zamanında yerine getirmelerini imkansızlaştıran haller, mücbir sebep (doğal afet, savaş, terör, ayaklanma, mevzuat hükümleri, el koyma veya grev, lokavt, üretim ve iletişim tesislerinde önemli mahiyette arıza vb.) olarak kabul edilecektir.
			</span><br><br>
			<span class="modal-text" style="font-weight: bold;">
			    <strong> </strong>
			    <strong>6. YETKİLİ MAHKEME</strong>
			</p><p>
			    <strong>6.1. </strong>
			    İşbu Sözleşmenin uygulanmasında ve çıkabilecek ihtilaflarda; her yıl Gümrük ve Ticaret Bakanlığı tarafından ilan edilen değere kadar Alıcı veya Satıcı’nın yerleşim yerindeki Tüketici Hakem Heyetleri, söz konusu değerin üzerindeki ihtilaflarda ise Tüketici Mahkemeleri yetkilidir.
			</p><p>
			    <strong>6.2. </strong>
			    İşbu Sözleşme elektronik ortamda taraflarca okunmuş, kabul edilmiş ve teyit edilmiştir. İşbu Sözleşmede düzenlenmemiş hususlarda 6502 sayılı Tüketicinin Korunması Hakkında Kanun ve sair ilgili mevzuat hükümleri uygulanır.
			</span><br><br>
			<span class="modal-text" style="font-weight: bold;">
			    <strong> </strong>
			    <strong>7. YÜRÜRLÜK</strong>
			</p><p>
			    <strong>7.1. </strong>
			    İşbu Sözleşme Alıcı’nın elektronik onayı tarihinde düzenlenmiş ve elektronik olarak Alıcı tarafından onaylandığı tarihte yürürlüğe girmiştir.
			</span></span><br>                            </div>
                            <div id="distance_selling_contract"><p><strong> </strong>
			    <strong>1. TARAFLAR:</strong>
			</span><br><br>
			<span class="modal-text" style="font-weight: bold;">
			    <strong><u>SATICI:</u></strong>
			</p><p>
			    <strong>Adı – Soyadı / Unvanı : </strong>
			</p><p>
			    <strong>VKN veya TCKN : </strong>
			</p><p>
			    <strong>Adresi :  / </strong>
			</p><p>
			    <strong>Telefon : </strong>
			</p><p>
			    <strong>E-posta : </strong>
			</span><br><br>
			<span class="modal-text" style="font-weight: bold;">
			    <strong><u>ARACI HİZMET SAĞLAYICI:</u></strong>
			</p><p>
			    <strong>Unvan : Değer Teknoloji A.Ş.</strong>
			</p><p>
			    <strong>MERSİS no : 0272045884800019</strong>
			</p><p>
			    <strong>Adresi : İçerenköy Mah. Umut Sok. Quick Tower No:10-12/70 Ataşehir, İstanbul</strong>
			</p><p>
			    <strong>Telefon : 08508401510</strong>
			</p><p>
			    <strong>E-posta : hello@shopier.com</strong>
			</span><br><br>
			<span class="modal-text" style="font-weight: bold;">
			    <strong><u>ALICI (TÜKETİCİ):</u></strong>
			</p><p>
			    <strong>Adı – Soyadı :  </strong>
			</p><p>
			    <strong>Adresi :    </strong>
			</p><p>
			    <strong>Telefon : </strong>
			</p><p>
			    <strong>E-posta : </strong>
			</span><br><br>
			<span class="modal-text" style="font-weight: bold;">
			    <strong><u>SATIN ALINAN ÜRÜN:</u></strong>
			</p><p>
			    <strong>Ürünün Adı : </strong>
			</p><p>
			    <strong>Adedi : </strong>
			</p><p>
			    <strong>Teslimat Adresi :    </strong>
			</p><p>
			    <strong>Teslim Edilecek Kişi :  </strong>
			</p><p>
			    <strong>Fatura Adresi :    </strong>
			</p><p>
			    <strong>Teslim Süresi  : - </strong>
			</p><p>
			    <strong>Kargo Ücreti : Nakliyeye ilişkin kargo ve gönderim masrafları Alıcı’ya aittir. Bu bedel önceden net olarak hesaplanmamaktadır.</strong>
			</p><p>
			    <strong>Toplam Sipariş Tutarı (KDV Dahil) : </strong>
			</p><p>
			    <strong>Ödeme Şekli : Kredi kartı</strong>
			</span><br><br>
			<span class="modal-text">
			<span style="font-weight: normal"><span style="font-weight: normal">
			    <strong> </strong>
			    <strong>2. SÖZLEŞMENİN KONUSU</strong>
			</p><p>
			    <strong>2.1. </strong>
			    İşbu Sözleşme, 07.11.2013 tarihli ve 6502 sayılı Tüketicinin Korunması Hakkında Kanun’un 48. ve 84. maddeleri uyarınca hazırlanmış olan 27.11.2014 tarihli
			    ve 29188 sayılı Resmi Gazete’de yayınlanarak 27.02.2015 tarihinde yürürlüğe giren Mesafeli Sözleşmeler Yönetmeliği hükümlerine uygun olarak düzenlenmiştir.
			</p><p>
			    <strong>2.2. </strong>
			    İşbu Sözleşmenin tarafları olan Satıcı ve Alıcı, işbu Sözleşmeyle birlikte Tüketicinin Korunması Hakkında Kanun ve Mesafeli Sözleşmeler Yönetmeliği’nden
			    kaynaklanan yükümlülük ve sorumluluklarını bildiklerini ve anladıklarını kabul ve beyan ederler.
			</span><br><br>
			<span class="modal-text" style="font-weight: bold;">
			    <strong> </strong>
			    <strong>3. GENEL HÜKÜMLER</strong>
			</p><p>
			    <strong>3.1. </strong>
			    İşbu Sözleşme kapsamında Değer Teknoloji A.Ş. (“Şirket” veya “Shopier”) yalnızca ve sadece Mesafeli Sözleşmeler Yönetmeliği kapsamında sağlayıcı sıfatını haiz olup Alıcı, Değer Teknoloji A.Ş.’nin ürüne ve ürünün gönderilmesine ilişkin herhangi bir sorumluluğunun bulunmadığını kabul eder. Satın alınan ürünün bedeli Shopier tarafından Alıcı’dan tahsil edilecek olup Alıcı ürünün bedelini Shopier’e ödemekle, ürün bedelini Satıcı’ya ödemiş sayılacaktır. Alıcı’nın ilgili mevzuat kapsamında iade hakları saklıdır.
			</p><p>
			    <strong>3.2. </strong>
			    İşbu Sözleşme tarafları Alıcı ile Satıcıdır. İşbu Sözleşmenin yerine getirilmesi ile ilgili tüm yükümlülük ve sorumluluklar Sözleşmenin taraflarına aittir. İşbu sözleşme Alıcı tarafından elektronik olarak onaylandığı tarihte yürürlüğe girer.
			</p><p>
			    <strong>3.3. </strong>
			     Alıcı, 1. maddede belirtilen Sözleşme konusu ürünün özellikleri ve satışa ilişkin koşulları ile ilgili tüm bilgileri okuyup anladığını bu ürünün satın alınması için elektronik ortamda satın almaya ilişkin gerekli onayı verdiğini kabul ve beyan eder. 
			</p><p>
			    <strong>3.4. </strong>
			    Satıcı, Sözleşme konusu ürünün sağlam, eksiksiz, listelendiği şekle niteliklere uygun ve varsa garanti belgeleri ve kullanım kılavuzları ile birlikte teslim edilmesinden sorumludur. Bu kapsamda Alıcı, Shopier’in ürüne ve ürünün gönderilmesine ilişkin herhangi bir sorumluluğunun bulunmadığını, bu durumun ürünün Satıcı tarafından anlaşmalı kargo şirketleri vasıtası ile gönderilmesi durumunda da değişmeyeceğini kabul eder.
			</p><p>
			    <strong>3.5. </strong>
			    Shopier’in herhangi bir nedenle ürün bedelini Alıcı’ya ait kredi kartından çekememesi veya ürünün kullanıma başlanmasından sonra Alıcı’ya ait kredi kartının Alıcı’nın kusurundan kaynaklanmayan bir şekilde yetkisiz kişilerce haksız veya hukuka aykırı olarak kullanılması nedeni ile ilgili banka veya finans kuruluşunun ürün bedelini Shopier’e ödememesi halinde Shopier ürünün kullanımını durdurma hakkına sahiptir. 
			</p><p>
			    <strong>3.6. </strong>
			    Alıcı, yürürlükte bulunan mevzuat hükümleri gereğince masraf, ücret, faiz ve temerrüt faizi ile ilgili hükümlerin banka ve Alıcı arasındaki kredi kartı sözleşmesi kapsamında uygulanacağını, Shopier’in bu konuda herhangi bir yükümlülüğü bulunmadığını kabul, beyan ve taahhüt eder.
			</p><p>
			    <strong>3.7. </strong>
			    Siparişe konu olan ürünün çeşitli sebeplerle kullanılamaması halinde kredi kartına iade prosedürü aşağıdaki gibi olacaktır: 
			</p><p>
			    <strong>3.7.1. </strong>
			    Ürünlerin fiyatları, katma değer vergisi ilave edilmiş Türk Lirası cinsinden sitede yer almaktadır. Alıcı kredi kartı ile alışveriş yapabilir. Kredi kartı ile verilen siparişler, kredi kartından işbu Sözleşme uyarınca Alıcı tarafından ödenmesi gerekli tutarın blokesinin yapıldığı an işleme alınacaktır. 
			</p><p>
			    <strong>3.7.2. </strong>
			    Kredi kartı ile alınmış ürünlerin iadesi durumunda Shopier, Alıcı’ya nakit para ile ödeme yapmaz, bankaya bedeli tek seferde ödemesinden sonra banka tarafından karta iade gerçekleştirilecektir. 
			</p><p>
			    <strong>3.8. </strong>
			    Alıcı ve Satıcı, işbu Sözleşme’de belirtilen kendilerine ait bilgilerin internet sitesine/uygulamaya girdikleri bilgiler olduğunu, bu bilgileri herhangi bir sebeple yanlış veya eksik girmeleri halinde dahi bu Sözleşme’nin kendileri tarafından sağlanan bilgilerle geçerli olacağını, internet sitesinin/uygulamanın Alıcı ve Satıcı tarafından verilen bilgilerin doğruluğunu ve geçerliliğini kontrol etme yükümlülüğü bulunmadığını ve ayrıca, Alıcı’nın ve Satıcı’nın işbu Sözleşme’nin ifa edilebilmesi için birbirlerine ve/veya Shopier’e aktardıkları kişisel verileri ile sair bilgilerinin, Sözleşme’nin ifası kapsamıyla sınırlı olmak üzere ve Sözleşme konusu ürünün gönderilebilmesi için posta hizmet sağlayıcılara aktarılacağını kabul, beyan ve taahhüt ederler.
			</p><p>
			    <strong>3.9. </strong>
			    Alıcı, vadeli satışların sadece bankalara ait kredi kartları ile yapılması nedeniyle; ilgili faiz oranlarını ve temerrüt faizi ile ilgili bilgileri bankasından ayrıca teyit etmesi gerektiğini bildiğini kabul eder.
			</span><br><br>
			<span class="modal-text" style="font-weight: bold;">
			    <strong> </strong>
			    <strong>4. CAYMA HAKKI</strong>
			</p><p>
			    <strong>4.1. </strong>
			        Alıcı; malı teslim aldığı tarihten itibaren on dört gün içerisinde hiçbir hukuki ve cezai sorumluluk üstlenmeksizin ve hiçbir gerekçe göstermeksizin malı reddederek Sözleşmeden cayma hakkına sahiptir. Tüketicinin cayma bildiriminin Satıcı’ya ulaştığı tarihten itibaren 10 (on) gün içinde ürün bedeli Alıcı’ya iade edilir. Cayma hakkının kullanımından kaynaklanan masraflar Satıcı’nın Anlaşmalı Kargo hizmeti ile sağlayacağı iade kargo kodu kullanılması durumunda Satıcı’ya ait olup öngörülen dışında bir taşıyıcıyla iadesi halinde ise Alıcı’ya aittir.
			</p><p>
			    <strong>4.2. </strong>
			        Cayma bildirimi, Shopier’de yer alan "Talep / Şikayet Kaydı Oluşturma" formu üzerinden açılacak kayıt ile bildirilecektir.
			</p><p>
			    <strong>4.3. </strong>
			        Satıcı, tüketicinin hiçbir hukuki ve cezai sorumluluk üstlenmeksizin ve hiçbir gerekçe göstermeksizin malı teslim aldığı veya Sözleşmenin imzalandığı
			        tarihten itibaren on dört gün içerisinde malı veya hizmeti reddederek Sözleşmeden cayma hakkının var olduğunu ve cayma bildiriminin Satıcı’ya ulaşması
			        tarihinden itibaren ürünü geri almayı ve ürün bedelini Alıcı’ya ya da Shopier’e iade etmeyi taahhüt etmektedir.
			</p><p>
			    <strong>4.4. </strong>
			    Taraflar, Mesafeli Sözleşmeler Yönetmeliği m. 15/1 uyarınca cayma hakkının aşağıdaki hallerde kullanamayacağını kabul etmiştir:
			</p><p>
			    <strong>4.4.1. </strong>
			    Fiyatı finansal piyasalardaki dalgalanmalara bağlı olarak değişen ve satıcı kontrolünde olmayan mal veya hizmetler,
			</p><p>
			    <strong>4.4.2. </strong>
			    Tüketicinin istekleri, talepleri veya kişisel ihtiyaçları doğrultusunda hazırlanan mallar,
			</p><p>
			    <strong>4.4.3. </strong>
			    Çabuk bozulabilen veya son kullanma tarihi geçebilecek mallar,
			</p><p>
			    <strong>4.4.4. </strong>
			    Tesliminden sonra ambalaj, bant, mühür, paket gibi koruyucu unsurları açılmış olan mallardan iadesi sağlık ve hijyen açısından uygun olmayanlar,
			</p><p>
			    <strong>4.4.5. </strong>
			    Tesliminden sonra başka ürünlerle karışan ve doğası gereği ayrıştırılması mümkün olmayan mallar,
			</p><p>
			    <strong>4.4.6. </strong>
			    Malın tesliminden sonra ambalaj, bant, mühür, paket gibi koruyucu unsurları açılmış olması halinde maddi ortamda sunulan kitap, dijital içerik ve
			    bilgisayar sarf malzemeleri,
			</p><p>
			    <strong>4.4.7. </strong>
			    Abonelik sözleşmesi kapsamında sağlananlar dışında, gazete ve dergi gibi süreli yayınlar,
			</p><p>
			    <strong>4.4.8. </strong>
			    Belirli bir tarihte veya dönemde yapılması gereken, konaklama, eşya taşıma, araba kiralama, yiyecek-içecek tedariki ve eğlence veya dinlenme amacıyla
			    yapılan boş zamanın değerlendirilmesine ilişkin hizmetler,
			</p><p>
			    <strong>4.4.9. </strong>
			    Elektronik ortamda anında ifa edilen hizmetler veya tüketiciye anında teslim edilen gayri maddi mallar,
			</p><p>
			    <strong>4.4.10. </strong>
			    Cayma hakkı süresi sona ermeden önce, tüketicinin onayı ile ifasına başlanan hizmetler.
			</p><p>
			    <strong>4.4.11. </strong>
			    13.10.1983 tarihli ve 2918 sayılı Karayolları Trafik Kanunu’na göre tescili zorunlu olan taşınırlar ile kayıt veya tescil zorunluluğu bulunan insansız hava araçlarına ilişkin mallar,
			</p><p>
			    <strong>4.4.12. </strong>
			    Tüketiciye teslimi yapılmış olan cep telefonu, akıllı saat, tablet ve bilgisayarlara ilişkin mallar,
			</p><p>
			    <strong>4.4.13. </strong>
			    Canlı müzayede şeklinde açık artırma yoluyla akdedilen ve
			</p><p>
			    <strong>4.4.14. </strong>
			    Tanıtma ve kullanma kılavuzunda satıcı veya yetkili servis tarafından kurulum veya montajının yapılacağı belirtilen mallardan kurulum ya da montajı yapılanlara ilişkin sözleşmeler.    
			</span><br><br>
			<span class="modal-text" style="font-weight: bold;">
			    <strong> </strong>
			    <strong>5. MÜCBİR HALLER</strong>
			</p><p>
			    <strong>5.1. </strong>
			    Sözleşmenin imzalandığı tarihte var olmayan ve ön görülmeyen, tarafların kontrolleri dışında gelişen, ortaya çıkmasıyla taraflardan birinin ya da her
			    ikisinin de sözleşme ile yüklendikleri borç ve sorumluluklarını kısmen ya da tamamen yerine getirmelerini ya da bunları zamanında yerine getirmelerini
			    imkansızlaştıran haller, mücbir sebep (doğal afet, savaş, terör, ayaklanma, mevzuat hükümleri, el koyma veya grev, lokavt, üretim ve iletişim tesislerinde
			    önemli mahiyette arıza vb.) olarak kabul edilecektir.
			</span><br><br>
			<span class="modal-text" style="font-weight: bold;">
			    <strong> </strong>
			    <strong>6. YETKİLİ MAHKEME</strong>
			</p><p>
			    <strong>6.1. </strong>
			    İşbu Sözleşmenin uygulanmasında ve çıkabilecek ihtilaflarda; her yıl Gümrük ve Ticaret Bakanlığı tarafından ilan edilen değere kadar Alıcı veya Satıcı’nın
			    yerleşim yerindeki Tüketici Hakem Heyetleri, söz konusu değerin üzerindeki ihtilaflarda ise Tüketici Mahkemeleri yetkilidir.
			</p><p>
			    <strong>6.2. </strong>
			    İşbu Sözleşme elektronik ortamda taraflarca okunmuş, kabul edilmiş ve teyit edilmiştir. İşbu Sözleşmede düzenlenmemiş hususlarda 6502 sayılı Tüketicinin
			    Korunması Hakkında Kanun ve sair ilgili mevzuat hükümleri uygulanır.
			</span><br><br>
			<span class="modal-text" style="font-weight: bold;">
			    <strong> </strong>
			    <strong>7. YÜRÜRLÜK</strong>
			</p><p>
			    <strong>7.1. </strong>
			    İşbu Sözleşme Alıcı’nın elektronik onayı tarihinde düzenlenmiştir. İşbu Sözleşme, Alıcı’nın elektronik onayı tarihinde yürürlüğe girecektir.</span></span><br>                            </div>
                            <div id="protection_of_personal_data"><p>
			</span>
			<span class="modal-text">
			<span style="font-weight: normal"><span style="font-weight: normal">
			    <strong>1. </strong>
			    Değer Teknoloji A.Ş. (“Shopier” veya “Şirket”), Satıcılara kendi internet sitelerinden, sosyal medya hesapları ve blogları üzerinden satışa sundukları ürünlerin alıcılar tarafından satın alınmasına platform sağlayan bir elektronik ticaret çözümü olarak hizmet vermektedir. 
			</p><p>
			    <strong>2. </strong>
			   Shopier, Kullanıcıların (“Satıcılar ve Alıcılar”) gizliliği korumak ve kullanılmakta bulunan teknolojik altyapıdan en üst seviyede yararlanmalarını sağlayabilmek amacıyla kişisel bilgi ve veri güvenliği hususunda gizlilik ilkeleri benimsemiştir. Bu gizlilik ilkeleri, www.shopier.com alan adlı internet sitesi (“İnternet Sitesi”) vasıtası ile kişisel verilerle sınırlı olmamak üzere veri toplanması ve/veya verilerin kullanımı konusunda uygulanmak üzere belirlenmiştir. Hizmetlerimizin hızlı, kolay ve güvenilir şekilde sunulması maksadıyla Shopier’e Kullanıcılar tarafından sağlanan kişisel verilerin işlenmesi ve üçüncü kişilere aktarılması gereklidir. Bu kapsamda, Shopier ile paylaşılan kişisel veriler, Türkiye Cumhuriyeti Anayasası başta olmak üzere, 6698 sayılı Kişisel Verilerin Korunması Kanunu (“KVKK”), 6563 sayılı Elektronik Ticaretin Düzenlenmesi Hakkında Kanun, Türk Ceza Kanunu ve ilgili mevzuatta yer alan hükümlere uygun şekilde işlenmektedir. 
			</p><p>
			    <strong>3. </strong>
			   İşbu politika, Shopier’in veri sorumlusu olarak kişisel verilerini işlediği gerçek kişilerin KVKK’nın 10. maddesi ile Aydınlatma Yükümlülüğünün Yerine Getirilmesinde Uyulacak Usul ve Esaslar Hakkında Tebliğ çerçevesinde aydınlatılması amacıyla hazırlanmıştır. Bu çerçevede, işbu politikayı mevzuattan kaynaklanan yükümlülüklerimizi yerine getirmenin yanında, kullanıcılarımıza iyi bir müşteri deneyimi yaşatabilmek adına hazırladık. Bu kapsamda, işbu politikada; veri sorumlusunun ve varsa temsilcisinin kimliği, kişisel verilerin hangi amaçla işleneceği, kişisel verilerin kimlere ve hangi amaçla aktarılabileceği, kişisel veri toplamanın yöntemi ve hukuki sebebi ve ilgili kişinin KVKK’nın 11. maddesinde sayılan diğer haklarına ilişkin bilgiler yer almaktadır.
			</p><p>
			    <strong>4. </strong>
			   Shopier, işbu politikayı yürürlükteki mevzuatta yapılabilecek değişiklikler, Kişisel Verileri Koruma Kurulu kararları, yargı kararları, kişisel veri işleme ve/veya aktarma yöntemlerinin, amaçlarının, sebeplerinin değişmesi veya benzer gelişmeler olması durumunda güncelleyebilir. İşbu politikanın güncellenmesi halinde, güncel metin İnternet Sitesi üzerinden yayınlanacaktır. Shopier, kişisel verilerin işlenmesine ve/veya aktarılmasına ilişkin faaliyetleri çerçevesinde İnternet Sitesi üzerinden başkaca aydınlatma metinleri, kurallar, koşullar veya sair açıklamalar yayınlayabilir.
			</p><p>
			    <strong>5. </strong>
			    Shopier’in sunduğu Hizmetler kapsamında kişisel veriler Anayasa’nın 20. maddesine ve KVKK’nın 4. maddesine uygun olarak;<br>
			    <br>- Hukuka ve dürüstlük kurallarına uygun,
			    <br>- Doğru ve güncel olarak,
			    <br>- Belirli, açık ve meşru amaçlar güderek,
			    <br>- İşleme amaçlarıyla bağlantılı,
			    <br>- Sınırlı ve ölçülü bir biçimde,
			  <br><br>kanunlarda öngörülen veya kişisel veri işleme amacının gerektirdiği süre kadar muhafaza etmek suretiyle, KVKK’nın 5. ve 6. maddesinde belirtilen şartlardan bir veya birkaçına dayanarak işlenmekte ve aktarılmaktadır.
			</p><p>
			    <strong>6. </strong>
			   Kişisel veriler, Shopier tarafından verilen hizmetlerin amaçlarıyla orantılı olarak, Shopier’in faaliyetlerini sürdürmesi, daha iyi hizmet vermesini sağlamak, verdiği hizmetin kalitesini ölçmek ve geliştirmek, müşterilerimizin ve çalışanlarımızın tercih ve ihtiyaçlarını tespit etmek, iş başvurularını işleme almak ve değerlendirmek, Şirketimiz ile iş ilişkisi kurmuş kişilerle iletişimi sağlamak, yürürlükteki mevzuata uygun davranmak, elektronik posta ile bülten göndermek ve bildirimlerde bulunmak, iletişim için adres ve iletişim bilgilerini kaydetmek, sözleşme kurulması ve ifasına ilişkin işlemlerin yürütmek, elektronik veya kâğıt ortamında işleme dayanak olacak tüm kayıt ve belgeleri düzenlemek, Kullanıcılar’ın şikâyet ve önerilerini değerlendirebilmek ve bilgi güvenliğini sağlamak amaçlarıyla yürürlükteki mevzuata uygun şekilde açık rıza alınmak koşulu ile veya yürürlükteki mevzuat kapsamında açık rıza alınması gerekmemesi halinde açık rıza alınmaksızın işlenmektedir. Bu kapsamda Shopier, mevzuatın izin verdiği durumlarda ve ölçüde Kullanıcılara ilişkin kişisel bilgileri kaydedebilecek, saklayabilecek, güncelleyebilecek, üçüncü kişilere açıklayabilecek, devredebilecek, sınıflandırabilecek ve işleyebilecektir.
			</p><p>
			    <strong>7. </strong>
			 Kullanıcılar, Shopier’e üye olurken ad, soyadı, açık adres, telefon numarası, elektronik posta adresi vbilgileri ile tercihleri doğrultusunda verdikleri banka ve ödeme bilgileri Şirket ile paylaşmaktadır. Şirket, Kullanıcılar tarafından verilen bu bilgileri sözleşme ilişkisi boyunca başkaca bir onaya gerek olmaksızın ve hesabın kapatılmasını takiben 10 (on) yıldan uzun süreli olmamak üzere Shopier’i kullanma amaçlarınıza uygun olarak işleyebilir ve/veya kullanabilmektedir. Kullanıcılar tarafından verilen kişisel bilgiler kural olarak gizli bilgidir ve 6698 sayılı Kişisel Verilerin Korunması Kanunu uyarınca kişisel veri olarak kabul edilmektedir. Bu bilgiler Şirket tarafından gizli tutulur ve aksi ayrıca ve açıkça belirtilmedikçe Şirket tarafından üçüncü kişilere açıklanmaz ve üçüncü kişilerle paylaşılmaz. 
			</p><p>
			    <strong>8. </strong>
			    Satıcılar ve Alıcılar kendileriyle ilgili bazı kişisel bilgileri (ad, soyadı, kurum bilgileri, telefon, posta adresi ve/veya e-posta adresi ve benzeri) Shopier üzerindeki çeşitli alanların doldurulması suretiyle Şirket’e iletirler. Şirket, Kullanım Koşulları ve Üyelik Sözleşmesi ile belirlenen amaçlar ve kapsam dışında da talep edilen bu bilgileri Şirket veya işbirliği içinde olduğu kişiler tarafından kişisel bilgiler anonim tutulmak suretiyle kullanabilir. Bu kapsamda Şirket, Kullanıcılar tarafından sağlanan her türlü bilgi ve veriyi KVKK’ya ve yürürlükteki ikincil mevzuata uygun olarak anonim hale getirmek sureti ile Kullanıcılar’ın kişisel bilgilerini, başkaca verilerle eşleştirilerek dahi hiçbir şekil ve surette kimliği belirlenebilir bir gerçek kişi ile ilişkilendirilemeyecek şekilde muhafaza edebilir ve bu kapsamda anonimleştirilmiş verileri istatistiki değerlendirmeler, pazar araştırmaları ve benzeri amaçlarla dilediği şekilde kullanabilir. 
			</p><p>
			    <strong>9. </strong>
			    KVKK’nın 4. maddesi uyarınca Shopier’in ilgili kişilerin kişisel verilerini doğru ve güncel olarak tutma yükümlülüğü bulunduğundan, bu yükümlülüklerini yerine getirebilmesi için kullanıcılarımızın Shopier ile doğru ve güncel verilerini paylaşması gerekmektedir. Kişisel verilerinizin herhangi bir surette değişikliğe uğraması halinde Shopier hesabınızda "Hesap Yönetimi > Hesap Bilgileri" bölümünü ziyaret ederek verilerinizi güncellemeniz gerektiğini belirtmek isteriz. 
			</p><p>
			    <strong>10. </strong>
			    Kullanıcılar tarafından sağlanan kişisel bilgiler, Satıcılar ve Alıcılar’la herhangi bir sebeple iletişime geçmek amacıyla da kullanılabilir. Bu kapsamda, Satıcılar ve Alıcılar Şirket’in talep ettiği bilgileri vererek Şirket’in bu bilgileri kendileri ile iletişime geçmek amacıyla kullanabileceğini kabul ve beyan ederler. 
			</p><p>
			    <strong>11. </strong>
			    Satıcılar ve Alıcılar tarafından sağlanan bilgiler veya Shopier üzerinden yapılan işlemlerle ilgili bilgiler; Şirket ve iş birliği içinde olduğu kurum ya da kişiler tarafından, Kullanım Koşulları ve Üyelik Sözleşmesi ile belirlenen amaçlar ve kapsam dışında da anonimleştirilmek sureti ile çeşitli istatistiki değerlendirmeler, pazar araştırmaları ve benzeri amaçlarla kullanılabilir.
			</p><p>
			    <strong>12. </strong>
			    Shopier, veri sorumlusu sıfatıyla, çağrı merkezi ile yapılan telefon görüşmeleri kapsamında bazı kişisel verilerinizi hizmet kalitesinin artırılması, memnuniyet ve performans ölçümü, şikayet yönetiminin etkili şekilde yapılması, aramanın istatistiksel amaçlarla tespiti, ileride doğabilecek uyuşmazlıklarda delil olarak kullanılması amaçlarıyla işlemektedir. Bu kapsamda, yapılan telefon görüşmeleri ile adınız, soyadınız, telefon numaranız, alınacak ses kaydınız ve görüşme bilgileriniz işlenmektedir. Ek olarak, yapılan telefon görüşmeleri kapsamında işlenen kişisel verileriniz, telefon görüşmesine ilişkin olarak hizmet aldığımız çağrı merkezi hizmeti ve pazarlama fiillerinin yürütülmesi kapsamında hizmet aldığımız şirketler ile de paylaşılacaktır.
			</p><p>
			    <strong>13. </strong>
			    Kullanıcılar’ın kişisel verileri, KVKK’da belirtilen kurallar ve işbu politikada belirtilen amaçlar dahilinde, kural olarak, ilgili kişilerin açık rızası bulunmaksızın üçüncü kişilere aktarılmamaktadır. Bununla birlikte, kişisel veri işleme amaçları doğrultusunda gerekli güvenlik önlemlerini de almak sureti ile kişisel veriler yurt içindeki ve yurt dışındaki üçüncü kişilere, iş ortaklarımıza, ifa yardımcılarımıza ve sunduğumuz hizmet ve faaliyet amacımız doğrultusunda ya da ilgili mevzuatın öngördüğü durumlarda düzenleyici denetleyici kurumlara ve de resmi mercilere aktarılabilecektir. Shopier’in kullanımı kapsamında Kullanıcılar tarafından sağlanacak bilgiler KVKK’ya uygun olarak Şirket tarafından işlenecektir. Bu kapsamda Şirket, Kullanıcılar tarafından sağlanacak kişisel bilgileri, sözleşme ilişkisi içinde olduğu üçüncü kişiler dışında, kredi kartı hizmet sağlayıcı, ödeme hizmet sağlayıcı, internet servis sağlayıcı, mobil uygulama ve internet sitesi yazılım bakım ve destek hizmetleri sağlayan gerçek ve tüzel kişilerle paylaşabilir.
			</p><p>
			    <strong>14. </strong>
			    Shopier, çevrimiçi servisleri, interaktif uygulamaları, e-posta mesajları ve reklamları, çerezleri ve diğer teknolojileri kullanabilir. Bu teknolojiler ile, Kullanıcılar tarafından Shopier ile paylaşılan bilgiler ile kamuya açık bilgileri karşılaştırabilir; cihazın işletim sistemi, işletim sistemi dili, işlemci tipi, tarayıcı sürümü, cihazın lokasyonu, saat dilimi, IP adresi ve benzeri bilgileri tespit edebilir. Ayrıca, Şirket veya yetkilendireceği üçüncü kişiler, Satıcılar’ın ve Alıcılar’ın Internet Protokol (IP) adresini, sistemle ilgili sorunların tanımlanması ve çıkabilecek teknik sorunların çözülebilmesi için gerekli olması halinde tespit edebilir ve bunları kullanabilir.
			</p><p>
			    <strong>15. </strong>
			    Shopier alışveriş deneyimini iyileştirmek için, satın alma işlemi tamamlanmayan ürünlere ilişkin bilgileri işleyebilir ve ürünlerin satın alınmasına ilişkin Alıcılar’a bildirimler gönderebilir.
			</p><p>
			    <strong>16. </strong>
			    Şirket, Satıcılar’ın ve Alıcılar’ın Shopier’i kullanımı hakkındaki bilgileri teknik bir iletişim dosyacığı (çerez) kullanarak elde edebilir. Çerez adı verilen dosyacıklar, ana bellekte saklanmak üzere bir internet sitesinin kullanıcının tarayıcısına (browser) gönderdiği küçük metin dosyalarıdır. Çerez bir internet sitesi hakkında durum ve tercihleri saklayarak kullanımı kolaylaştırır. Çerezler, site ziyaretleri konusunda istatistiki bilgi elde etmeye ve Satıcılar ve Alıcılar için özel tasarlanmış reklam ve sair dinamik içerik üretilmesinde yardımcı olur. Kullanıcılar, istedikleri zaman tarayıcılarından bu çerezleri kaldırabilir ve reddedebilirler. Çerezlere ilişkin ayrıntılı bilgilere Çerez Politikası’ndan ulaşabilirsiniz.
			</p><p>
			    <strong>17. </strong>
			    Shopier, hizmetlerini işletmek ve geliştirmek için Kullanıcılar’ın kişisel bilgilerini toplar ve kullanır. Bu kullanımlar Kullanıcılar’a daha etkin Müşteri hizmeti sunma, aynı bilgileri tekrar tekrar girme gerekliliğini ortadan kaldırarak uygulama ve hizmetlerin kullanımını kolaylaştırma, uygulamamızı ve hizmetlerimizi geliştirme amacına yönelik araştırma ve çözümleme gerçekleştirme ve Kullanıcılar’ın ilgi ve tercihlerine uygun olarak özelleştirilmiş içerik görüntülemeyi içerebilir. Özel nitelikli kişisel veriler (din, mezhep, etnik köken, ırk vs.) Shopier tarafından Kullanıcılar’ın açık rızaları bulunmaksızın talep edilmeyecek ve işlenmeyecektir. 
			</p><p>
			    <strong>18. </strong>
			   Satıcı hesaplarına ilişkin şifreler, üçüncü kişilerle paylaşılmamalı ve üçüncü kişilerce tahmin edilemeyecek şekilde formüle edilmelidir. Satıcılar’ın şifre ve hesaplarına ilişkin diğer bilgileri üçüncü kişilerle paylaşması halinde hesap adına yapılan tüm işlemlerden Satıcı sorumlu olacaktır. Hesabın ve/veya şifrenin güvenliğine ilişkin herhangi bir güvenlik açığı teşkil eden durumun söz konusu olması halinde Satıcılar derhal Şirket ile bağlantıya geçmekle yükümlüdür. 
			</p><p>
			    <strong>19. </strong>
			    Kullanıcılar’ın kişisel verileri yalnızca Shopier’in faaliyet konusu kapsamında ve toplama amaçları doğrultusunda toplanacak, işlenme amaçlarının gerektirdiği süreler ve/veya yürürlükteki mevzuatta öngörülen süre boyunca saklanabilecek, KVKK’da belirtilen kuralları aşar şekilde işlenmeyecek ve işlenmesini gerektiren sebeplerin ortadan kalkması halinde, yürürlükteki diğer mevzuattan doğan saklama mecburiyeti bulunan haller saklı olmak üzere, resen veya ilgili kişi sıfatıyla Kullanıcılar’ın talebi üzerine silinecek, yok edilecek veya anonim hale getirilecektir. 
			</p><p>
			    <strong>20. </strong>
			    Belirli durumlarda Şirket, işbu Aydınlatma Metni ve Gizlilik Politikası’nda açıkça belirtilen durumların ve/veya kişilerin dışında Satıcılar’a ve/veya Alıcılar’a ilişkin bilgileri üçüncü kişilere açıklayabilir. Bu durumlar bu sayılanlarla sınırlı sayıda olmamak üzere; yürürlükteki mevzuat ile getirilen sorumluluklara uymak, Kullanım Koşulları ve Üyelik Sözleşmesi ile eklerinin gereklerini yerine getirmek ve yetkili otorite tarafından ilgili mevzuata göre yürütülen bir araştırma amacıyla kullanıcılarla ilgili bilgi talep edilmesi için bilgi vermenin gerekli olduğu haller ile KVKK’da sayılan diğer istisnai durumlardır. 
			</p><p>
			    <strong>21. </strong>
			    Kullanıcılar, Shopier’e Üye olmaları sebebiyle; kişisel verilerinin işlenip işlenmediğini sorgulama, işlenmişse bu konuda bilgi talep etme, kişisel verilerini işlenme amacını ve amacına uygun kullanılıp kullanılmadığını, yurt içi veya yurtdışına aktarılıp aktarılmadığını sorgulama, kişisel verilerine ilişkin herhangi bir eksiklik veya yanlışlık bulunması halinde bu yanlışlığın giderilmesini isteme; kişisel verilerin silinmesini veya yok edilmesini isteme ve bu durumun kişisel verilerin aktarıldığı üçüncü kişilere de bildirilmesini talep etme haklarını haizdir.
			</p><p>
			    <strong>22. </strong>
			    Yürürlükteki mevzuattan doğan bu hakları kullanmak için, Kullanıcılar, bu yöndeki talebini KVKK’nın 13. maddesi doğrultusunda, Shopier’in aşağıda belirtilen adresine; adı ve soyadı ve de imzası ile, Türkiye Cumhuriyeti vatandaşı ise T.C. kimlik numarası, Türkiye Cumhuriyeti vatandaşı değil ise uyruğu, pasaport numarası veya varsa kimlik numarası, tebligata esas yerleşim yeri veya iş yeri adresi, bildirime esas elektronik posta adresi ve telefon numarası ve de talep konusunu ve kimliğinizi tespite yarayan gerekli bilgi ve belgeleri eklemek sureti ile yazılı olarak başvuruda bulunabilirler. Başvurular Shopier tarafından değerlendirilecek ve otuz gün içinde ücretsiz olarak sonuçlandırılacaktır.<br>
			   <br>KVKK’nın 11. maddesi kapsamındaki başvurular için:  
			   <br>- Veri Sorumlusu: Değer Teknoloji A.Ş.
			   <br>- Adres: İçerenköy Mah. Umut Sok. Quick Tower No:10-12/70 Ataşehir / İstanbul
			</p><p>
			    <strong>23. </strong>
			    İşbu Aydınlatma Metni ve Gizlilik Politikası, 16/08/2023 tarihinde yürürlüğe girecek ve belirtilen tarih itibariyle tüm Kullanıcılar bakımından geçerli olacaktır. </span></span>                            </div>
                        </div>
                    <div class="modal-footer">
                        <button class="btn btn-light" type="button" data-dismiss="modal" aria-label="close">Kapat</button>
                    </div>
                </div>
            </div>
        </div>            
        <div class="modal fade" id="orderTracking" tabindex="-1" role="dialog" aria-labelledby="refundTerms" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Sipariş Takibi</h5>
                        <button class="btn btn-link btn-sm dropdown-close" type="button" data-dismiss="modal" aria-label="Close"><span class="sr-only">Menü</span></button>
                    </div>
                    <div class="modal-body" id="modalDefault">
                        <div class="order-tracking">
                            <div class="row">
                                <div class="col-12">
                                    <p><strong>Satıcı</strong><br><span>Sosyal medya hesaplarınızı ŞişkoMedya ile hemen geliştirin!</span></p>
                                    <p><strong>Sipariş No</strong><br><span id="footer_order_id"></span></p>
                                    <p style="display: none;" id="footer_order_result_message_order_complete"><strong>Sipariş Durumu</strong><br><span>Sipariş alındı</span></p>
                                    <p style="display: none;" id="footer_order_result_message_order_cargo"><strong>Sipariş Durumu</strong><br><span>Kargoya verildi</span></p>
                                    <p style="display: none;" id="footer_order_result_message_order_delivered"><strong>Sipariş Durumu</strong><br><span>Teslim edildi</span></p>
                                    <p style="display: none;" id="footer_order_result_message_order_cancel"><strong>Sipariş Durumu</strong><br><span>İptal edildi</span></p>
                                    <p style="display: none;" id="footer_order_result_message_order_refund"><strong>Sipariş Durumu</strong><br><span>İade edildi</span></p>
                                </div>
                                <div id="footer_order_model_footer_order_complete" style="display: none">
                                    <div class="col-12 mt-3" style="display: none;" id="footer_cargo_message">
                                        <p>Siparişiniz satıcı tarafından kargoya verildiğinde, kargo takip bilgileri siparişte kayıtlı e-posta adresinize gönderilecektir.</p>
                                    </div>
                                    <div class="col-12 mt-3" style="display: none;" id="footer_cargo_message_digital">
                                        <p>Siparişiniz satıcı tarafından dijital olarak teslim edilecektir.</p>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <button class="btn btn-primary w-100" type="button" data-dismiss="modal" aria-label="Close">KAPAT</button>
                                    </div>
                                </div>
                                <div id="footer_order_model_footer_order_cargo" style="display: none">
                                    <div class="col-12 mt-3">
                                        <p><strong>Kargo takip bilgilerini kayıtlı e-posta adresinize veya telefon numaranıza göndermemizi ister misiniz?</strong></p>
                                        <div class="tracking-info">
                                            <div class="row mb-3">
                                                <div class="col-12">
                                                    <div class="tracking-info__content">
                                                        <input type="radio" id="tracking_email_select" name="tracking" value="email" checked>
                                                        <label for="tracking_email_select" class="mb-0">E-posta olarak gönder</label>
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-2">
                                                    <div class="tracking-info__content">
                                                        <input type="radio" id="tracking_sms_select" name="tracking" value="sms">
                                                        <label for="tracking_sms_select" class="mb-0">SMS olarak gönder</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div id="footer_order_model_footer_order_delivered" style="display: none">
                                    <div class="col-12 mt-3" style="display: none;" id="footer_cargo_message_delivered">
                                        <p>Siparişiniz teslim edilmiştir. Satın aldığınız ürün veya hizmetle ilgili sorularınız için lütfen satıcıyla iletişime geçiniz.</p>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <button class="btn btn-primary w-100" type="button" data-dismiss="modal" aria-label="Close">KAPAT</button>
                                    </div>
                                </div>
                                
                                <div id="footer_order_model_footer_order_refund" style="display: none">
                                    <div class="col-12 mt-3" style="display: none;" id="footer_cargo_message_delivered">
                                        <p>Siparişiniz teslim edilmiştir. Satın aldığınız ürün veya hizmetle ilgili sorularınız için lütfen satıcıyla iletişime geçiniz.</p>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <button class="btn btn-primary w-100" type="button" data-dismiss="modal" aria-label="Close">KAPAT</button>
                                    </div>
                                </div>
                                <div class="col-12 mt-2">
                                    <button class="btn btn-primary w-100" style="display:none;" type="button" id="btnTrackingAction">GÖNDER</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body" id="modalAction">
                        <div class="body-action body-loader show" id="bodyLoader">
                            <div class="custom-loader">
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                     width="98px" height="100px" viewBox="0 0 24 30" style="enable-background:new 0 0 50 50;" xml:space="preserve">
                                            <rect x="0" y="13" width="4" height="5" fill="#333">
                                              <animate attributeName="height" attributeType="XML"
                                                       values="5;21;5"
                                                       begin="0s" dur="0.6s" repeatCount="indefinite" />
                                                <animate attributeName="y" attributeType="XML"
                                                         values="13; 5; 13"
                                                         begin="0s" dur="0.6s" repeatCount="indefinite" />
                                            </rect>
                                    <rect x="10" y="13" width="4" height="5" fill="#333">
                                              <animate attributeName="height" attributeType="XML"
                                                       values="5;21;5"
                                                       begin="0.15s" dur="0.6s" repeatCount="indefinite" />
                                        <animate attributeName="y" attributeType="XML"
                                                 values="13; 5; 13"
                                                 begin="0.15s" dur="0.6s" repeatCount="indefinite" />
                                            </rect>
                                    <rect x="20" y="13" width="4" height="5" fill="#333">
                                              <animate attributeName="height" attributeType="XML"
                                                       values="5;21;5"
                                                       begin="0.3s" dur="0.6s" repeatCount="indefinite" />
                                        <animate attributeName="y" attributeType="XML"
                                                 values="13; 5; 13"
                                                 begin="0.3s" dur="0.6s" repeatCount="indefinite" />
                                            </rect>
                                          </svg>
                            </div>
                            <p class="text-center" id="footer_cargo_tracking_sms_sending" style="display: none"><strong>Mesaj gönderiliyor...</strong></p>
                            <p class="text-center" id="footer_cargo_tracking_email_sending" style="display: none"><strong>E-posta gönderiliyor...</strong></p>
                        </div>
                        <div class="body-action body-alert body-success" id="bodyAlertSuccess">
                            <img src="https://www.shopier.com/ShowProductNew/images/success-check-icon-512x512.png" class="img-fluid mb-4 body-alert__icon" />
                            <p class="text-center" id="footer_tracking_sms_result" style="display:none"><strong>Kargo takip bilgileri siparişte kayıtlı telefon numaranıza SMS olarak gönderilmiştir.</strong></p>
                            <p class="text-center" id="footer_tracking_email_result" style="display:none"><strong>Kargo takip bilgileri siparişte kayıtlı mail adresinize gönderilmiştir.</strong></p>
                            <button class="btn btn-primary w-100 mt-2" data-dismiss="modal" aria-label="Close" type="button">KAPAT</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <script>
            const endpoint = "./lib/ajax/elasticsearch.php";
            const bar = document.getElementsByClassName("js-search-input")[0];
            const results = document.getElementsByClassName("navbar-search__results")[0];
            const search_form = document.getElementsByClassName("navbar-search__input")[0];
            let last_results, last_query;
            let searchShopName = "SiskoMedya";
            
            $('.js-search-input').keyup(function(e) {
                if(last_query === $(this).val()) return;
                getSearchResults(e.target.value);
            });
            
            $('.js-search-input').click(function(e) {
                if(e.target.value == last_query){
                    createList(last_results);
                }else{
                    getSearchResults(e.target.value);
                }
            });
            
            function getSearchResults(query) {
                const search_value = query;
                if(search_value.length >= 3){
                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', endpoint, true);
                    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                    xhr.onreadystatechange = function () {
                        if (parseInt(xhr.readyState) === 4 && parseInt(xhr.status) === 200) {
                            let json = JSON.parse(xhr.responseText);
                            createList(json);
                            last_query = search_value;
                        }
                    };
                    xhr.send('search_query=' + search_value + '&username=' + searchShopName + '&search_as_you_type=true');
                }else{
                    bar.classList.remove("showing_results");
                    results.classList.remove("show");
                    
                }
            }
            
            function createList(json){
                if(typeof(json) === 'string' && json){
                    json = JSON.parse(json);
                }
                
                if(!json){
                    return;
                }
                
                if(json.status === false || typeof(json) !== 'object'){
                    return;
                }
                
                last_results = json;
                const shingles = json.suggestions.shingles;
                const categories = json.suggestions.categories;
                const products = json.hits;

                if(json.nHits === 0 && shingles.length === 0 && categories.length === 0 && products.length === 0){
                    bar.classList.remove("showing_results");
                    results.classList.remove("show");
                    return;
                }
        
                results.innerHTML = "";
                
                const results_ul = document.createElement("ul");
                results_ul.classList.add("navbar-search__results-list");
        
                const suggestionClicked = false;
                if(suggestionClicked === false){
                    shingles.forEach(function (shingle) {
                        const shingle_li = document.createElement("li");
                        shingle_li.classList.add("navbar-search__results-item");
                        shingle_li.classList.add("d-flex");
                        shingle_li.classList.add("align-items-center");
                        shingle_li.classList.add("justify-content-between");
                        
                        shingle_li.addEventListener("click", function(){
                            bar.value= shingle.replace(/<\/?[^>]+(>|$)/g, "");
                            const ev = document.createEvent('Event');
                            ev.initEvent('keypress');
                            ev.which = ev.keyCode = 13;
                            bar.dispatchEvent(ev);
                            
                            bar.classList.remove("showing_results");
                            results.classList.remove("show");
                        });
                        
                        const shingle_div = document.createElement("div");
                        shingle_div.innerHTML = shingle;
                        
                        shingle_li.appendChild(shingle_div);
                        results_ul.appendChild(shingle_li);
                    });
        
                    categories.forEach(function (category) {
                        let category_name = category.suggestion;
                        let category_id = category.category_id;
                        let clean_category_name = category.clean_name;
                      
                        const category_li = document.createElement("li");
                        category_li.classList.add("navbar-search__results-item");
                        category_li.classList.add("d-flex");
                        category_li.classList.add("align-items-center");
                        category_li.classList.add("justify-content-between");
                        
                        const text_holder = document.createElement("div");
                        text_holder.innerHTML = category_name;
                        category_li.appendChild(text_holder);
                        
                        category_li.addEventListener("click", function(){                            
                            let path = window.location.pathname;
                            let page = path.split("/").pop();
                            if(page === 'storefront.php'){
                                document.querySelector('[data-id="'+category_id+'"]').click();
                                document.querySelector('label[data-id="mb_cat_'+category_id+'"]').click();
                            }else{
                                window.location.href = "https://"+window.location.hostname+"/ShowProductNew/storefront.php?shop="+searchShopName+"#"+encodeURIComponent(clean_category_name);
                            }

                            bar.classList.remove("showing_results");
                            results.classList.remove("show");
                        });
                        
                        const suggestion_type_span = document.createElement("span");
                        suggestion_type_span.classList.add("float-right");
                        suggestion_type_span.innerHTML = "Kategori";
                        category_li.appendChild(suggestion_type_span);
                        
                        results_ul.appendChild(category_li);
                    });
        
                }
        
                products.forEach(function (product) {
                    if(product.subject.length > 0){
                        const product_li = document.createElement('li');
                        product_li.classList.add("navbar-search__results-item");
                        product_li.classList.add("d-flex");
                        product_li.classList.add("align-items-center");
                        product_li.classList.add("justify-content-between");
                        
                        product_li.addEventListener("click", function(){
                            const search_query = searchbar.value;
                            let xhr = new XMLHttpRequest();
                            xhr.open('POST', endpoint, false);
                            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                            xhr.send('click=1&username=' + searchShopName + '&search_query=' + search_query + '&product_id=' + product.product_id);
                            window.location.href = "./products.php?id="+product.product_id;
                        });
                        
                        const a = document.createElement('a');
                        a.innerHTML = product.subject;
                        a.classList.add('bg-transparent');
                        product_li.appendChild(a);
                       
                        const suggestion_type_span = document.createElement("span");
                        suggestion_type_span.classList.add("float-right");
                        suggestion_type_span.innerHTML = "Ürün";
                        product_li.appendChild(suggestion_type_span);
        
                        results_ul.appendChild(product_li);
                    }
                });
                
                    bar.classList.add("showing_results");
                    results.classList.add("show");
                    results.appendChild(results_ul);
                    
            }
            
            $(document).click(function(e) {
                let container = $(".navbar-search__results");
                let bar = $(".js-search-input");
                // if the target of the click isn't the container nor a descendant of the container
                if (!container.is(e.target) && container.has(e.target).length === 0)
                {
                    container.removeClass("show");
                    bar.removeClass("showing_results");
                }
            });
        </script>
        <?php
      } else {
        header("Location: index.php");
        exit;   
    }
}
}
?> 
</body>
</html>