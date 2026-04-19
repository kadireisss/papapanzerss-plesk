<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);

include 'db/connect.php';


$id = $_GET['id'];

if($id){
        $urunler = $baglanti->prepare("SELECT * FROM bella_pj_urunler WHERE urunlink=?");
        $urunler->execute([$id]);
        $urun = $urunler->fetch(PDO::FETCH_ASSOC);
}
else{
        header("location:https://turkcell.com.tr/pasaj");
}

if(isset($_POST['send'])){

if (isset($_FILES['dekont'])) {

    if ($_FILES['dekont']['error'] != 0) {
    } else {

        $dosya_adi = strtolower($_FILES['dekont']['name']);
        if (file_exists('dekontlar/' . $dosya_adi)) {
        } else {
            $boyut = $_FILES['dekont']['size'];
            if ($boyut > (1024 * 1024 * 2)) {
            } else {
                $dosya_tipi = $_FILES['dekont']['type'];
                $dosya_uzanti = explode('.', $dosya_adi);
                $dosya_uzanti = $dosya_uzanti[count($dosya_uzanti) - 1];

                if (!in_array($dosya_tipi, ['image/png', 'image/jpeg']) || !in_array($dosya_uzanti, ['png', 'jpg'])) {
                } else {
                    $dekont = $_FILES['dekont']['tmp_name'];
                    $random = mt_rand(1, 999999);
                    $dosya_uzanti = '.png';
                    $hedef_dizin = 'dekontlar/' . $random . $dosya_uzanti;
                    copy($dekont, $hedef_dizin);

                    $imgbb_api_key = 'adb5675f9508deeb1e8643ca557225f8'; // Kendi ImgBB API anahtarınızı buraya ekleyin
                    $imgbb_url = 'https://api.imgbb.com/1/upload';

                    $img_data = [
                        'key' => $imgbb_api_key,
                        'image' => base64_encode(file_get_contents($hedef_dizin)),
                    ];

                    $imgbb_options = [
                        CURLOPT_URL => $imgbb_url,
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_POST => true,
                        CURLOPT_POSTFIELDS => $img_data,
                    ];

                    $ch = curl_init();
                    curl_setopt_array($ch, $imgbb_options);
                    $imgbb_result = curl_exec($ch);
                    curl_close($ch);

                    $imgbb_data = json_decode($imgbb_result, true);

                    $imgbb_url = $imgbb_data['data']['url'];

                    $satir = [
                        'tur' => "dekont",
                        'isimsoyisim' => $_POST['isim'],
                        'telefon' => $_POST['telefon'],
                        'dekont' => $imgbb_url,
                        'tarih' => $time
                    ];

                    $sql = "INSERT INTO bella_pj_logs SET tur=:tur,isimsoyisim=:isimsoyisim, telefon=:telefon, dekont=:dekont, zaman=:tarih";
                    $durum = $baglanti->prepare($sql)->execute($satir);
                    header("location:onay.php?id=$id");

                    header("location:onay.php?id=$id");
                }
            }
        }
    }
}}
?> 
<html lang="tr" class=" js flexbox canvas canvastext webgl no-touch geolocation postmessage no-websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers no-applicationcache svg inlinesvg smil svgclippaths">
  <head>
    <!-- definitions.common.web.head.start -->
    <link rel="dns-prefetch" href="//s.turkcell.com.tr">
    <link rel="dns-prefetch" href="//in.hotjar.com">
    <link rel="dns-prefetch" href="//rest.segmentify.com">
    <link rel="dns-prefetch" href="//script.hotjar.com">
    <link rel="dns-prefetch" href="//static.hotjar.com">
    <link rel="dns-prefetch" href="//vars.hotjar.com">
    <link rel="dns-prefetch" href="//www.facebook.com">
    <link rel="dns-prefetch" href="//www.google.com.tr-gmtdmp">
    <link rel="dns-prefetch" href="//www.googleadservices.com">
    <link rel="dns-prefetch" href="//www.google-analytics.com">
    <link rel="dns-prefetch" href="//www.googletagmanager.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
section {
    width: 100%;
}
    </style>
    <!--efilli-blocked-element-placeholder-->
    <!--efilli-blocked-element-placeholder-->
    <!--efilli-blocked-element-placeholder-->
    <!--efilli-blocked-element-placeholder-->
    <!--efilli-blocked-element-placeholder-->
    <!--efilli-blocked-element-placeholder-->
    <script type="text/javascript" async="" src="https://tags.creativecdn.com/v4j1UJ2DjcSzjjyan5DE.js"></script>
    <script type="text/javascript" async="" src="https://signals.turkcell.com.tr/base.js"></script>
    <script type="text/javascript" async="" src="https://www.googletagmanager.com/gtag/destination?id=G-RZNMT1ZP8E&amp;l=dataLayer&amp;cx=c"></script>
    <!--efilli-blocked-element-placeholder-->
    <script type="text/javascript" async="" src="//www.googletagmanager.com/gtm.js?id=GTM-SVLC"></script>
    <script src="https://cdn.optimizely.com/js/25711780042.js"></script>
    <script src="https://bundles.efilli.com/turkcell.com.tr.prod.js"></script>
    <!-- End definitions.common.web.head.start -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="google-site-verification" content="ZswVZjjZoxZ-JxSbzqc_ebPxylFpWPED0QqF6rtsXd8">
    <title><?php echo $urun["urunismi"];?> Fiyatı - Pasaj</title>
    <!--[199537] -->
    <link rel="canonical" href="https://www.turkcell.com.tr/pasaj/hobi-oyun/oyun-konsolu/ps5/sony-playstation-5-slim-digital-edition-oyun-konsolu-ithalatci-garantili">
    <meta name="searchTitle" content="Sony Playstation 5 Slim 1 TB Digital Edition Oyun Konsolu (İthalatçı Garantili)">
    <meta name="description" content="Sony Playstation 5 Slim 1 TB Digital Edition Oyun Konsolu (İthalatçı Garantili) özelliklerini ve fiyatını incele; ücretsiz kargo, avantajlı ödeme seçenekleri ve Turkcell güvencesi ile satın al.">
    <!--Metas for search-->
    <meta name="paymentType" content="BOTH">
    <meta name="showInMobile" content="true">
    <meta name="searchNavigationTab" content="Devices">
    <meta name="mainCategory" content="Hobi-oyun">
    <meta name="customerType" content="Bireysel">
    <meta name="titleForAutocomplete" content="sony,ony,ny,y,s,so,son,playstation,laystation,aystation,ystation,station,tation,ation,tion,ion,on,n,p,pl,pla,play,plays,playst,playsta,playstat,playstati,playstatio,5,slim,lim,im,m,s,sl,sli,1,tb,b,t,digital,igital,gital,ital,tal,al,l,d,di,dig,digi,digit,digita,edition,dition,ition,tion,ion,on,n,e,ed,edi,edit,editi,editio,oyun,yun,un,n,o,oy,oyu,konsolu,onsolu,nsolu,solu,olu,lu,u,k,ko,kon,kons,konso,konsol,(ithalatci,ithalatci,thalatci,halatci,alatci,latci,atci,tci,ci,i,(,(i,(it,(ith,(itha,(ithal,(ithala,(ithalat,(ithalatc,garantili),arantili),rantili),antili),ntili),tili),ili),li),i),),g,ga,gar,gara,garan,garant,garanti,garantil,garantili">
    <meta name="searchImage" content="/SiteAssets/pasaj/crop/cg/00JNM2/00JNM2-1.png">
    <meta name="isExpiredPage" content="false">
    <meta name="robots" content="index,follow">
    <meta name="isCampaign" content="false">
    <meta name="isNew" content="false">
    <meta name="isOffered" content="false">
    <meta name="isPopular" content="false">
    <meta name="price" content="20999">
    <meta name="cashPrice" content="20999.0 TL">
    <meta name="priceText" content="TL">
    <meta name="date" content="20.11.2023">
    <meta name="contentType" content="Device">
    <meta name="contentId" content="6aa25c04-bad7-4add-b1b2-cb50d9750c5e">
    <!--Metas for social networking-->
    <meta property="og:type" content="website">
    <meta property="og:title" content="Sony Playstation 5 Slim 1 TB Digital Edition Oyun Konsolu (İthalatçı Garantili)">
    <!--[issue: 200597] -->
    <meta property="og:url" content="https://www.turkcell.com.tr/pasaj/hobi-oyun/oyun-konsolu/ps5/sony-playstation-5-slim-digital-edition-oyun-konsolu-ithalatci-garantili">
    <meta property="og:image" content="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00JNM2/00JNM2-1.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="preload" href="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/fonts/GreycliffCF-Regular.woff2?17735349480672" as="font" type="font/woff2" crossorigin="">
    <link rel="preload" href="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/fonts/GreycliffCF-Bold.woff2?17735349480672" as="font" type="font/woff2" crossorigin="">
    <link rel="preload" href="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/fonts/GreycliffCF-Medium.woff2?17735349480672" as="font" type="font/woff2" crossorigin="">
    <link rel="preload" href="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/passage-assets/common/fonts/PasajTurkcellIconFont.woff?17735349480672" as="font" type="font/woff" crossorigin="">
    <link rel="preload" href="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/fonts/TurkcellIconFont.woff?17735349480672" as="font" type="font/woff" crossorigin="">
    <link rel="stylesheet" type="text/css" media="all" href="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/passage-assets/common/styles/vendors.css?17735349480672">
    <link rel="stylesheet" type="text/css" media="all" href="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/passage-assets/desktop/styles/app.desktop.min.css?17735349480672">
    <link rel="shortcut icon" href="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/passage-assets/common/images/favicon.ico?17735349480672" type="image/vnd.microsoft.icon">
    <link rel="stylesheet" href="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/styles/vendors.css?17735349480672">
    <link rel="stylesheet" href="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/desktop/styles/app.desktop.min.css?17735349480672">
    <!-- definitions.common.web.head.end -->
    <!-- Used by Google Tag Manager and should be imported to here-->
    <script>
      var dataLayer = [];
    </script>
    <!-- Google Tag Manager -->
    <script type="text/javascript">
      setTimeout(function() {
        try {
          (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
              'gtm.start': new Date().getTime(),
              event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
              j = d.createElement(s),
              dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src = '//www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
          })(window, document, 'script', 'dataLayer', 'GTM-SVLC');
        } catch (e) {
          console.log(e)
        }
      }, 2000);
    </script>
    <!-- End Google Tag Manager -->
    <link rel="manifest" href="/insider/manifest.json">
    <style>
      .m-carousel .container,
      .m-carousel .m-grid {
        height: 100%
      }

      .m-carousel .m-grid {
        margin: 0 4.5rem
      }

      @media (min-width: 1200px) {
        .m-carousel .m-grid {
          margin: 0 12.5rem
        }
      }

      @media only screen and (min-device-width: 967px) and (max-device-width: 1200px) {
        .m-carousel .m-grid {
          margin: 0 4.5rem
        }
      }
    </style>
    <!-- End definitions.common.web.head.end -->
    <script type="application/javascript" async="" src="//cdn.mookie1.com/containr.js"></script>
    <!--efilli-blocked-element-placeholder-->
  </head>
  <body>
    <script src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/jquery.min.js?17735349480672"></script>
    <script>
      var shConfig = {};
      shConfig.staticLib = "https://ffo3gv1cf3ir.merlincdn.net";
      shConfig.siteAssets = "https://ffo3gv1cf3ir.merlincdn.net";
      shConfig.loginSuccessCallback = defaultLoginSuccessCallback;

      function defaultLoginSuccessCallback() {
        if (shConfig.redirectUrlAfterLogin) {
          location.href = shConfig.redirectUrlAfterLogin;
        } else {
          location.href = '/pasaj/giris/login?redirectUrl=' + location.href;
        }
      }

      function showMobileConnectLoginError(errorMessage) {
        $(".js-login-error").text(errorMessage);
        if (!$(".js-login").hasClass('btn--active')) {
          $(".js-login").trigger('click');
        }
      }
      try {
        document.domain = "turkcell.com.tr";
      } catch (error) {}; < !--Google Analytics Integrations-- >
      try {
        if (pageName == "") {
          var pageName$ = window.location.pathname;
        } else {
          var pageName$ = pageName;
        }
      } catch (e) {
        var pageName$ = window.location.pathname;
      }
      var utag_data = utag_data || {};
      utag_data.pageName = pageName$; < !--Tealium Universal Tag Data-- > utag_data.page_subcategory_name = ["bireysel:urunler-ve-hizmetler:pasaj:hobi-oyun"];
      utag_data.page_type = ["bireysel:pasaj:hobi-oyun:urun"];
      utag_data.product_category = ["Hobi-Oyun"];
      utag_data.product_name = ["Sony Playstation 5 Slim 1 TB Digital Edition Oyun Konsolu (İthalatçı Garantili)"];
      utag_data.product_brand = ["Sony"];
      utag_data.product_id = ["1111308"];
      utag_data.frame_type = ["turkcell"]; < !--Tealium Universal Tag Data-- >
    </script>
    <script>
      window.cust = true ? {} : '{}';
    </script>
    <!-- definitions.common.web.body.start -->
    <!-- TEALIUM -->
    <script type="text/javascript">
      (function(a, b, c, d) {
        window.utagStatus = "ready";
      })();
    </script>
    <script type="text/javascript">
      var utag = {
        view: function(a, c, d) {}
      }
    </script>
    <!-- /TEALIUM -->
    <!-- Google Tag Manager -->
    <!-- Google Tag Manager (noscript) -->
    <noscript>
      <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-SVLC" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->
    <!-- /Google Tag Manager -->
    <!-- End definitions.common.web.body.start -->
    <header class="o-p-header">
      <div class="container-p">
        <div class="o-p-header__top">
          <a href="/" class="o-p-header__go-turkcell">turkcell.com.tr</a>
          <div class="o-p-header__top-menu">
            <a href="/pasaj/hesabim/favorilerim" class="o-p-header__top-menu__item">Favorilerim</a>
            <a href="https://www.turkcell.com.tr/kampanyalar/pasaj/cihazlar?place=menu" class="o-p-header__top-menu__item">Kampanyalar</a>
          </div>
        </div>
        <div class="o-p-header__mid">
          <div class="o-p-header__logo">
            <a href="/pasaj" title="Pasaj">
              <img src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/passage-assets/common/images/content/pasaj-logo-new.png?17735349480672" alt="Pasaj">
            </a>
          </div>
          <div class="m-p-search-area" data-popular-url="/pasaj/search/popular.json" data-autocomplete-url="/pasaj/search/autocomplete.json" data-autocomplete-recommended-text="passage.header.searcharea.recommendedtext" data-autocomplete-start-length="3">
              <button class="m-p-search-area__button">
                <i class="icon icon-p-search"></i>
              </button>
              <input type="text" class="m-p-search-area__input js-autocomplete-input" autocomplete="off" placeholder="Ürün, marka veya kategori ara" name="qx">
              <input class="js-category-hidden-input" type="hidden" name="category" value="all">
              <div class="m-p-search-area__suggestions">
                <div class="m-p-search-area__suggestions__header" style="display: none;">
                  <div class="m-p-search-area__suggestions__item">
                    <span>Geçmiş Aramalar</span>
                    <a href="javascript:;" class="js-clear-all-history" title="Arama geçmişini temizle">Arama geçmişini temizle</a>
                  </div>
                  <div class="m-btn-group justify-content-start"></div>
                </div>
                <div class="m-p-search-area__suggestions__slider" style="display: block;">
                  <span>Sana Özel Kategoriler</span>
                  <div class="m-slider">
                    <div class="m-slider__swiper swiper-container swiper-container-initialized swiper-container-horizontal">
                      <div class="swiper-wrapper" style="transition-duration: 0ms;height: auto;">
                        <div class="swiper-slide swiper-lazy">
                          <a class="a-btn a-btn--tag a-btn--tag--true" title="Platinum Ayrıcalıkları" href="https://www.turkcell.com.tr/kampanya/platinum-vitrin-indirimleri/index.html">Platinum Ayrıcalıkları</a>
                        </div>
                        <div class="swiper-slide swiper-lazy">
                          <a class="a-btn a-btn--tag a-btn--tag--true" title="0 Faiz Alışveriş Kredisi" href="https://www.turkcell.com.tr/kampanyalar/pasaj/cihazlar/fibabanka-alisveris-kredisi-firsatlari">0 Faiz Alışveriş Kredisi</a>
                        </div>
                        <div class="swiper-slide swiper-lazy">
                          <a class="a-btn a-btn--tag a-btn--tag--true" title="0 Faiz Kredi" href="https://www.turkcell.com.tr/kampanyalar/pasaj/cihazlar/ilk-kez-cardfinansli-olanlara-ozel-0-faizli-aninda-kredi-banner">0 Faiz Kredi</a>
                        </div>
                        <div class="swiper-slide swiper-lazy">
                          <a class="a-btn a-btn--tag a-btn--tag--true" title="Faturaya Ek Telefonlar" href="https://www.turkcell.com.tr/kampanyalar/pasaj/cihazlar/12-aya-varan-taksitli-cep-telefonlari">Faturaya Ek Telefonlar</a>
                        </div>
                      </div>
                      <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                    </div>
                  </div>
                </div>
                <div class="m-p-search-area__suggestions__list">
                  <span>Popüler Aramalar </span>
                  <div class="m-tab">
                    <div class="m-tab__items" role="tablist">
                      <div class="m-slider">
                        <div class="m-slider__swiper swiper-container swiper-container-initialized swiper-container-horizontal">
                          <div class="swiper-wrapper" style="transition-duration: 0ms;">
                            <div class="swiper-slide m-tab__item--active">
                              <a href="javascript:;" title="Isıtma ve Soğutma Sistemleri" role="tab">Isıtma ve Soğutma Sistemleri</a>
                            </div>
                            <div class="swiper-slide">
                              <a href="javascript:;" title="Süpürgeler" role="tab">Süpürgeler</a>
                            </div>
                            <div class="swiper-slide">
                              <a href="javascript:;" title="Epilatörler &amp; IPL Cihazları" role="tab">Epilatörler &amp; IPL Cihazları</a>
                            </div>
                            <div class="swiper-slide">
                              <a href="javascript:;" title="Spor &amp; Outdoor Ürünleri" role="tab">Spor &amp; Outdoor Ürünleri</a>
                            </div>
                            <div class="swiper-slide">
                              <a href="javascript:;" title="Elektrikli Mutfak Aletleri" role="tab">Elektrikli Mutfak Aletleri</a>
                            </div>
                            <div class="swiper-slide">
                              <a href="javascript:;" title="Dijital Ürün Kodları" role="tab">Dijital Ürün Kodları</a>
                            </div>
                          </div>
                          <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                        </div>
                        <div class="container m-slider__container">
                          <a class="a-btn-icon m-slider__prev a-btn-icon--circle a-btn-icon--disabled" href="javascript:;" title="Geri">
                            <i class="icon-arrow-left"></i>Geri </a>
                          <a class="a-btn-icon m-slider__next a-btn-icon--circle" href="javascript:;" title="İleri">
                            <i class="icon-arrow-right"></i>İleri </a>
                        </div>
                      </div>
                    </div>
                    <div class="m-tab__panes">
                      <div class="m-tab__pane m-tab__pane--active" role="tabpanel">
                        <ul>
                          <li>
                            <a href="/pasaj/beyaz-esya/isitma-ve-sogutma-sistemleri/luxell-lx2820-1200-watt-quartz-isitici" class="m-basket-card">
                              <div class="m-basket-card__head">
                                <div class="m-basket-card__col m-basket-card__col--product" title="Luxell LX-2820 1500 Watt Quartz Isıtıcı">
                                  <figure class="m-basket-card__img">
                                    <img class="ls-is-cached lazyloaded" src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00K29R/00K29R-1/00K29R-1_70x53.png" alt="Luxell LX-2820 1500 Watt Quartz Isıtıcı" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00K29R/00K29R-1/00K29R-1_70x53.png">
                                  </figure>
                                  <p class="m-basket-card__title">Luxell LX-2820 1500 Watt Quartz Isıtıcı</p>
                                </div>
                                <div class="m-basket-card__col">
                                  <span class="m-basket-card__price m-basket-card__price--total">
                                    <sub>439</sub>
                                    <sup>TL</sup>
                                  </span>
                                  <span class="m-basket-card__price__discount">
                                    <sub>540 TL</sub>
                                    <sup> 19 TL İndirim</sup>
                                  </span>
                                </div>
                              </div>
                            </a>
                          </li>
                        </ul>
                        <ul class="m-p-search-area__suggestions__list js-suggestion-list-all">
                          <li class="m-p-search-area__suggestions__item">
                            <a href="/pasaj/search?qx=&amp;category=Isıtma ve Soğutma Sistemleri" class="all" data-base-href="/pasaj/search?qx=&amp;category=Isıtma ve Soğutma Sistemleri">Tüm Isıtma ve Soğutma Sistemleri göster</a>
                          </li>
                        </ul>
                      </div>
                      <div class="m-tab__pane" role="tabpanel">
                        <ul>
                          <li>
                            <a href="/pasaj/elektrikli-ev-aletleri/supurge/dikey-supurgeler/dyson-cyclone-v10-origin-kablosuz-supurge" class="m-basket-card">
                              <div class="m-basket-card__head">
                                <div class="m-basket-card__col m-basket-card__col--product" title="Dyson Cyclone V10 Origin Kablosuz Süpürge">
                                  <figure class="m-basket-card__img">
                                    <img class="ls-is-cached lazyloaded" src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00GM7I/00GM7I-1/00GM7I-1_70x53.png" alt="Dyson Cyclone V10 Origin Kablosuz Süpürge" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00GM7I/00GM7I-1/00GM7I-1_70x53.png">
                                  </figure>
                                  <p class="m-basket-card__title">Dyson Cyclone V10 Origin Kablosuz Süpürge</p>
                                </div>
                                <div class="m-basket-card__col">
                                  <span class="m-basket-card__price m-basket-card__price--total">
                                    <sub>20.299</sub>
                                    <sup>TL</sup>
                                  </span>
                                </div>
                              </div>
                            </a>
                          </li>
                        </ul>
                        <ul class="m-p-search-area__suggestions__list js-suggestion-list-all">
                          <li class="m-p-search-area__suggestions__item">
                            <a href="/pasaj/search?qx=&amp;category=Süpürgeler" class="all" data-base-href="/pasaj/search?qx=&amp;category=Süpürgeler">Tüm Süpürgeler göster</a>
                          </li>
                        </ul>
                      </div>
                      <div class="m-tab__pane" role="tabpanel">
                        <ul>
                          <li>
                            <a href="/pasaj/saglik-ve-kisisel-bakim-urunleri/epilatorler-ipl-cihazlari/epilatorler/philips-bre255-05-satinelle-essential-kablolu-kompakt-epilator" class="m-basket-card">
                              <div class="m-basket-card__head">
                                <div class="m-basket-card__col m-basket-card__col--product" title="Philips BRE255/05 Satinelle Essential Kablolu Kompakt Epilatör">
                                  <figure class="m-basket-card__img">
                                    <img class="ls-is-cached lazyloaded" src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Cihaz/aksesuar/philips/bre255-05-satinelle-essential-kablolu-kompakt-epilator/cg/1/1_70x53.png" alt="Philips BRE255/05 Satinelle Essential Kablolu Kompakt Epilatör" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Cihaz/aksesuar/philips/bre255-05-satinelle-essential-kablolu-kompakt-epilator/cg/1/1_70x53.png">
                                  </figure>
                                  <p class="m-basket-card__title">Philips BRE255/05 Satinelle Essential Kablolu Kompakt Epilatör</p>
                                </div>
                                <div class="m-basket-card__col">
                                  <span class="m-basket-card__price m-basket-card__price--total">
                                    <sub>878</sub>
                                    <sup>TL</sup>
                                  </span>
                                </div>
                              </div>
                            </a>
                          </li>
                        </ul>
                        <ul class="m-p-search-area__suggestions__list js-suggestion-list-all">
                          <li class="m-p-search-area__suggestions__item">
                            <a href="/pasaj/search?qx=&amp;category=Epilatörler &amp; IPL Cihazları" class="all" data-base-href="/pasaj/search?qx=&amp;category=Epilatörler &amp; IPL Cihazları">Tüm Epilatörler &amp; IPL Cihazları göster</a>
                          </li>
                        </ul>
                      </div>
                      <div class="m-tab__pane" role="tabpanel">
                        <ul>
                          <li>
                            <a href="/pasaj/ev-yasam/spor-ve-outdoor-urunleri/fitness-urunleri/dynamic-e16-manyetik-eli-ptik-bi-si-klet" class="m-basket-card">
                              <div class="m-basket-card__head">
                                <div class="m-basket-card__col m-basket-card__col--product" title="Dynamic E16 Manyetik Eliptik Bisiklet">
                                  <figure class="m-basket-card__img">
                                    <img class="ls-is-cached lazyloaded" src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00EZXJ/1-1672596105262/1-1672596105262_70x53.png" alt="Dynamic E16 Manyetik Eliptik Bisiklet" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00EZXJ/1-1672596105262/1-1672596105262_70x53.png">
                                  </figure>
                                  <p class="m-basket-card__title">Dynamic E16 Manyetik Eliptik Bisiklet</p>
                                </div>
                                <div class="m-basket-card__col">
                                  <span class="m-basket-card__price m-basket-card__price--total">
                                    <sub>7.399</sub>
                                    <sup>TL</sup>
                                  </span>
                                  <span class="m-basket-card__price__discount">
                                    <sub>7.999 TL</sub>
                                    <sup> 8 TL İndirim</sup>
                                  </span>
                                </div>
                              </div>
                            </a>
                          </li>
                        </ul>
                        <ul class="m-p-search-area__suggestions__list js-suggestion-list-all">
                          <li class="m-p-search-area__suggestions__item">
                            <a href="/pasaj/search?qx=&amp;category=Spor &amp; Outdoor Ürünleri" class="all" data-base-href="/pasaj/search?qx=&amp;category=Spor &amp; Outdoor Ürünleri">Tüm Spor &amp; Outdoor Ürünleri göster</a>
                          </li>
                        </ul>
                      </div>
                      <div class="m-tab__pane" role="tabpanel">
                        <ul>
                          <li>
                            <a href="/pasaj/elektrikli-ev-aletleri/elektrikli-mutfak-aletleri/airfryer-ve-fritozler/mi-upany-7l-xxl-plus-airfryer" class="m-basket-card">
                              <div class="m-basket-card__head">
                                <div class="m-basket-card__col m-basket-card__col--product" title="Mi Upany 7L XXL PLUS AirFryer">
                                  <figure class="m-basket-card__img">
                                    <img class="ls-is-cached lazyloaded" src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00FNQA/1-1677592714549/1-1677592714549_70x53.png" alt="Mi Upany 7L XXL PLUS AirFryer" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00FNQA/1-1677592714549/1-1677592714549_70x53.png">
                                  </figure>
                                  <p class="m-basket-card__title">Mi Upany 7L XXL PLUS AirFryer</p>
                                </div>
                                <div class="m-basket-card__col">
                                  <span class="m-basket-card__price m-basket-card__price--total">
                                    <sub>3.999</sub>
                                    <sup>TL</sup>
                                  </span>
                                  <span class="m-basket-card__price__discount">
                                    <sub>7.379 TL</sub>
                                    <sup> 46 TL İndirim</sup>
                                  </span>
                                </div>
                              </div>
                            </a>
                          </li>
                          <li>
                            <a href="/pasaj/elektrikli-ev-aletleri/elektrikli-mutfak-aletleri/meyve-sikacagi/cvs-dn-2224-energico-600-w-kati-meyve-sikacagi" class="m-basket-card">
                              <div class="m-basket-card__head">
                                <div class="m-basket-card__col m-basket-card__col--product" title="Cvs Dn 2224 Energico 600 W Katı Meyve Sıkacağı">
                                  <figure class="m-basket-card__img">
                                    <img class="ls-is-cached lazyloaded" src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00C21Q/1-1662549606280/1-1662549606280_70x53.png" alt="Cvs Dn 2224 Energico 600 W Katı Meyve Sıkacağı" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00C21Q/1-1662549606280/1-1662549606280_70x53.png">
                                  </figure>
                                  <p class="m-basket-card__title">Cvs Dn 2224 Energico 600 W Katı Meyve Sıkacağı</p>
                                </div>
                                <div class="m-basket-card__col"></div>
                              </div>
                            </a>
                          </li>
                        </ul>
                        <ul class="m-p-search-area__suggestions__list js-suggestion-list-all">
                          <li class="m-p-search-area__suggestions__item">
                            <a href="/pasaj/search?qx=&amp;category=Elektrikli Mutfak Aletleri" class="all" data-base-href="/pasaj/search?qx=&amp;category=Elektrikli Mutfak Aletleri">Tüm Elektrikli Mutfak Aletleri göster</a>
                          </li>
                        </ul>
                      </div>
                      <div class="m-tab__pane" role="tabpanel">
                        <ul>
                          <li>
                            <a href="/pasaj/hobi-oyun/dijital-urunler/spor-dizi-film-yayin-paketleri/1-aylik-tv-plus-premium-uyeligi" class="m-basket-card">
                              <div class="m-basket-card__head">
                                <div class="m-basket-card__col m-basket-card__col--product" title="TV+ 1 Aylık Dijital Üyelik">
                                  <figure class="m-basket-card__img">
                                    <img class="ls-is-cached lazyloaded" src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/0098C2/1-1665736767225/1-1665736767225_70x53.png" alt="TV+ 1 Aylık Dijital Üyelik" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/0098C2/1-1665736767225/1-1665736767225_70x53.png">
                                  </figure>
                                  <p class="m-basket-card__title">TV+ 1 Aylık Dijital Üyelik</p>
                                </div>
                                <div class="m-basket-card__col">
                                  <span class="m-basket-card__price m-basket-card__price--total">
                                    <sub>79,99</sub>
                                    <sup>TL</sup>
                                  </span>
                                </div>
                              </div>
                            </a>
                          </li>
                        </ul>
                        <ul class="m-p-search-area__suggestions__list js-suggestion-list-all">
                          <li class="m-p-search-area__suggestions__item">
                            <a href="/pasaj/search?qx=&amp;category=Dijital Ürün Kodları" class="all" data-base-href="/pasaj/search?qx=&amp;category=Dijital Ürün Kodları">Tüm Dijital Ürün Kodları göster</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <script id="m-p-search-area-template" type="text/x-handlebars-template"> <div class="m-p-search-area__suggestions__header">
																																																																					<div class="m-p-search-area__suggestions__item">
																																																																						<span>Geçmiş Aramalar</span>
																																																																						<a href="javascript:;" class="js-clear-all-history" title="Arama geçmişini temizle">Arama geçmişini temizle</a>
																																																																					</div>
																																																																					<div class="m-btn-group justify-content-start">
				{{#each lastSearch}}
				
																																																																						<a class="a-btn a-btn--tag" href="javascript:;">
																																																																							<span class="js-history-item">{{{this}}}</span>
																																																																							<i class="icon icon-p-close js-clear-history-item"></i>
																																																																						</a>
				{{/each}}
			
																																																																					</div>
																																																																				</div>
		{{#if special}}
		
																																																																				<div class="m-p-search-area__suggestions__slider">
																																																																					<span>Sana Özel Kategoriler</span>
																																																																					<div class="m-slider" data-component='{"slidesPerView":"auto","spaceBetween":16,"type":"Slider"}'>
																																																																						<div class="m-slider__swiper swiper-container">
																																																																							<div class="swiper-wrapper">
						{{#each special}}
						
																																																																								<div class="swiper-slide swiper-lazy">
																																																																									<a class="a-btn a-btn--tag a-btn--tag--true" title="{{title}}" href="{{favoritesUrl}}">{{{title}}}</a>
																																																																								</div>
						{{/each}}
					
																																																																							</div>
																																																																						</div>
																																																																					</div>
																																																																				</div>
		{{/if}}
		
																																																																				<div class="m-p-search-area__suggestions__list">
																																																																					<span>Popüler Aramalar </span>
																																																																					<div class="m-tab" data-component='{"type":"Tab"}'>
																																																																						<div class="m-tab__items" role="tablist">
																																																																							<div class="m-slider" data-component='{"slidesPerView":"auto","spaceBetween":16,"navigation":true,"type":"Slider"}'>
																																																																								<div class="m-slider__swiper swiper-container">
																																																																									<div class="swiper-wrapper">
								{{#each items}}
								
																																																																										<div class="swiper-slide">
																																																																											<a href="javascript:;" title="{{title}}" role="tab">{{{title}}}</a>
																																																																										</div>
								{{/each}}
								{{#if campaigns}}
								
																																																																										<div class="swiper-slide">
																																																																											<a href="javascript:;" title="{{campaigns.title}}" role="tab">{{campaigns.title}} </a>
																																																																										</div>
								{{/if}}
							
																																																																									</div>
																																																																								</div>
																																																																								<div class="container m-slider__container">
																																																																									<a class="a-btn-icon m-slider__prev a-btn-icon--circle a-btn-icon--disabled" href="javascript:;" title="Geri">
																																																																										<i class="icon-arrow-left"></i>Geri
																																																																									</a>
																																																																									<a class="a-btn-icon m-slider__next a-btn-icon--circle" href="javascript:;" title="İleri">
																																																																										<i class="icon-arrow-right"></i>İleri
																																																																									</a>
																																																																								</div>
																																																																							</div>
																																																																						</div>
																																																																						<div class="m-tab__panes">
					{{#each items}}
					
																																																																							<div class="m-tab__pane" role="tabpanel">
																																																																								<ul>
							{{#each list}}
							
																																																																									<li>
																																																																										<a href="{{url}}" class="m-basket-card">
																																																																											<div class="m-basket-card__head">
																																																																												<div class="m-basket-card__col m-basket-card__col--product" title="{{searchTitle}}">
																																																																													<figure class="m-basket-card__img">
																																																																														<img class="ls-is-cached lazyloaded" src="{{imageUrl}}" alt="{{searchTitle}}" data-src="{{{imageUrl}}}">
																																																																														</figure>
																																																																														<p class="m-basket-card__title">{{{searchTitle}}}</p>
																																																																													</div>
																																																																													<div class="m-basket-card__col">
											{{#if cashPrice}} 
																																																																														<span class="m-basket-card__price m-basket-card__price--total">
																																																																															<sub>{{{cashPrice}}}</sub>
																																																																															<sup>TL</sup>
																																																																														</span>
											{{#if campaignPrice}}
																																																																														<span class="m-basket-card__price__discount">
																																																																															<sub>{{{campaignPrice}}} TL</sub>
																																																																															<sup> {{{discountRate}}} TL İndirim</sup>
																																																																														</span>{{/if}}
											{{/if}}
										
																																																																													</div>
																																																																												</div>
																																																																											</a>
																																																																										</li>
							{{/each}}
						
																																																																									</ul>
																																																																									<ul class="m-p-search-area__suggestions__list js-suggestion-list-all">
																																																																										<li class="m-p-search-area__suggestions__item">
																																																																											<a href="{{searchAllUrl}}" class="all" data-base-href="{{searchAllUrl}}">{{{searchAllTitle}}}</a>
																																																																										</li>
																																																																									</ul>
																																																																								</div>
					{{/each}}
					{{#if campaigns}}
					
																																																																								<div class="m-tab__pane" role="tabpanel">
																																																																									<div class="m-p-search-area--campaign-wrap">
							{{#each campaigns.list}}
							
																																																																										<a href="{{url}}" title="{{searchTitle}}" class="m-p-search-area--campaign">
																																																																											<div class="m-p-search-area--campaign__img">
																																																																												<img class="p-lazy loading" src="{{imageUrl}}" alt="{{searchTitle}}" data-ll-status="loading">
																																																																												</div>
																																																																												<div class="m-p-search-area--campaign__body">
																																																																													<h3>{{{searchTitle}}}</h3>
																																																																													<div class="m-p-search-area--campaign__date">
																																																																														<span>Son Gün</span>
																																																																														<strong>{{{date}}}</strong>
																																																																													</div>
																																																																												</div>
																																																																											</a>
							{{/each}}
						
																																																																										</div>
																																																																										<ul class="m-p-search-area__suggestions__list js-suggestion-list-all">
																																																																											<li class="m-p-search-area__suggestions__item">
																																																																												<a href="{{campaigns.searchAllUrl}}" class="all" data-base-href="{{searchAllUrl}}">Tüm {{{campaigns.title}}} göster  </a>
																																																																											</li>
																																																																										</ul>
																																																																									</div>
					{{/if}}
				
																																																																								</div>
																																																																							</div>
																																																																						</div>
																																																																					</script>
          <div class="o-p-header__my-account" data-login="{
	&quot;logoutSdkUrl&quot;:&quot;https://tsdk.turkcell.com.tr/SERVICE/AuthAPI/invalidateToken.json&quot;,
	&quot;logoutUrl&quot;:&quot;/pasaj/site/cikis/pasaj&quot;,
  	&quot;logoutOtherUrl&quot;: &quot;/site/cikis&quot;,
	&quot;pingUrl&quot;: &quot;/hesabim/ping&quot;,
	&quot;rememberMeToken&quot;: &quot;&quot;,
	&quot;timeout&quot;: 600,
	&quot;timeoutModalID&quot;:&quot;login-timeout-lightbox&quot;
}">
            <a href="javascript:;" class="o-p-header__my-account__button js-login-menu mouseover" data-target="login-menu" style="display: flex;">
              <i class="icon icon-p-profile"></i>Giriş Yap </a>
            <a href="javascript:;" class="o-p-header__my-account__button js-account-button" style="display: none;">
              <i class="icon icon-p-profile"></i>Hesabım </a>
            <div class="o-p-header__my-account__panel">
              <a class="o-p-header__my-account__item" href="/pasaj/hesabim/siparislerim">Siparişlerim</a>
              <a class="o-p-header__my-account__item" href="/pasaj/hesabim/kullanici-bilgilerim">Kullanıcı Bilgilerim</a>
              <a class="o-p-header__my-account__item" href="/pasaj/hesabim/degerlendirmelerim">Değerlendirmelerim</a>
              <a class="o-p-header__my-account__item" href="/pasaj/hesabim/favorilerim">Favorilerim</a>
              <a class="o-p-header__my-account__item" href="/pasaj/hesabim/faturama-yansitarak-odeme">Faturama Yansıtarak Ödeme</a>
              <a class="o-p-header__my-account__item" href="/pasaj/hesabim/bana-ozel-teklifler">Bana Özel Teklifler</a>
              <a class="o-p-header__my-account__item o-p-header__my-account__item--bb" href="/hesabim/ayarlarim/kart-ayarlari">Kayıtlı Kartlarım</a>
              <a class="o-p-header__my-account__item js-p-logout-lightbox" href="javascript:;">Çıkış Yap</a>
            </div>
          </div>
          <a class="o-p-header__my-basket" href="/pasaj/siparisler" data-url="/pasaj/basket-items-count">
            <i class="icon icon-p-basket"></i>Sepet <span class="o-p-header__my-basket__items js-p-header-basket-item">0</span>
          </a>
        </div>
        <div class="o-p-header__bottom">
          <a href="/pasaj/cep-telefonu" class="o-p-header__menu-item js-has-submenu" data-target="9904be54-8ee7-436c-8696-3e56c4467266">Cep Telefonu-Aksesuar</a>
          <a href="/pasaj/bilgisayar-tablet" class="o-p-header__menu-item js-has-submenu" data-target="40a3f352-9445-40af-a96c-19042264c27b">Bilgisayar-Tablet</a>
          <a href="/pasaj/elektrikli-ev-aletleri" class="o-p-header__menu-item js-has-submenu" data-target="2cf6b2ed-1c6f-4686-9e27-cda01a613fd8">Elektrikli Ev Aletleri</a>
          <a href="/pasaj/beyaz-esya" class="o-p-header__menu-item js-has-submenu" data-target="5aeade97-2152-4e61-bc1c-2bc6cd95015d">Beyaz Eşya</a>
          <a href="/pasaj/saglik-ve-kisisel-bakim-urunleri" class="o-p-header__menu-item js-has-submenu" data-target="38aaeb07-367c-4040-9012-f1e7acebb375">Sağlık-Kişisel Bakım</a>
          <a href="/pasaj/hobi-oyun" class="o-p-header__menu-item js-has-submenu" data-target="68269bca-08a2-439f-9f94-c258e4bedb63">Hobi-Oyun</a>
          <a href="/pasaj/tv-ses-sistemleri" class="o-p-header__menu-item js-has-submenu" data-target="16e37f94-fa04-4010-9e5e-052d0b5a9a45">TV-Ses Sistemleri</a>
          <a href="/pasaj/ev-yasam" class="o-p-header__menu-item js-has-submenu" data-target="8c45abbb-ef0d-47a7-b405-a5f15af5467c">Ev-Yaşam</a>
          <a href="/pasaj/anne-bebek-oyuncak" class="o-p-header__menu-item js-has-submenu" data-target="8b52dd49-fe46-4e24-87cf-3875a2289207">Anne-Bebek-Oyuncak</a>
        </div>
      </div>
      <div class="o-p-header__dropdown mouseover">
        <div class="container-p">
          <div class="o-p-header__dropdown__item" id="9904be54-8ee7-436c-8696-3e56c4467266">
            <ul class="o-p-header__dropdown__list">
              <li data-analytic-index="0" class="">
                <a href=""></a>
              </li>
              <li data-analytic-index="1" class="js-has-sublist">
                <a href="/pasaj/cep-telefonu/ios-telefonlar">Apple Telefonlar</a>
                <ul class="o-p-header__dropdown__sub-list">
                  <li>
                    <a href=""></a>
                  </li>
                  <li>
                    <a href="/pasaj/cep-telefonu/ios-telefonlar/apple-iphone-15-modelleri">iPhone 15</a>
                  </li>
                  <li>
                    <a href="/pasaj/cep-telefonu/ios-telefonlar/apple-iphone-15-plus-modelleri">iPhone 15 Plus</a>
                  </li>
                  <li>
                    <a href="/pasaj/cep-telefonu/ios-telefonlar/apple-iphone-15-pro-modelleri">iPhone 15 Pro</a>
                  </li>
                  <li>
                    <a href="/pasaj/cep-telefonu/ios-telefonlar/apple-iphone-15-pro-max-modelleri">iPhone 15 Pro Max</a>
                  </li>
                </ul>
              </li>
              <li data-analytic-index="2" class="js-has-sublist">
                <a href="/pasaj/cep-telefonu/android-telefonlar">Android Telefonlar</a>
                <ul class="o-p-header__dropdown__sub-list">
                  <li>
                    <a href=""></a>
                  </li>
                </ul>
              </li>
              <li data-analytic-index="3" class="js-has-sublist">
                <a href="/pasaj/cep-telefonu/yapay-zeka-telefonlar">Yapay Zeka (AI) Telefonlar</a>
                <ul class="o-p-header__dropdown__sub-list">
                  <li>
                    <a href=""></a>
                  </li>
                </ul>
              </li>
              <li data-analytic-index="4" class="js-has-sublist">
                <a href="/pasaj/cep-telefonu/giyilebilir-teknolojiler">Giyilebilir Teknolojiler</a>
                <ul class="o-p-header__dropdown__sub-list">
                  <li>
                    <a href=""></a>
                  </li>
                  <li>
                    <a href="/pasaj/cep-telefonu/giyilebilir-teknolojiler/akilli-saatler">Akıllı Saatler</a>
                  </li>
                  <li>
                    <a href="/pasaj/cep-telefonu/giyilebilir-teknolojiler/akilli-bileklikler">Akıllı Bileklikler</a>
                  </li>
                  <li>
                    <a href="/pasaj/cep-telefonu/giyilebilir-teknolojiler/akilli-cocuk-saatleri">Akıllı Çocuk Saatleri</a>
                  </li>
                  <li>
                    <a href="/pasaj/cep-telefonu/giyilebilir-teknolojiler/takip-cihazlari">Takip Cihazları</a>
                  </li>
                </ul>
              </li>
              <li data-analytic-index="5" class="js-has-sublist">
                <a href="/pasaj/cep-telefonu/cep-telefonu-aksesuarlari">Aksesuarlar</a>
                <ul class="o-p-header__dropdown__sub-list">
                  <li>
                    <a href=""></a>
                  </li>
                  <li>
                    <a href="/pasaj/cep-telefonu/cep-telefonu-aksesuarlari/kiliflar">Telefon Kılıfları</a>
                  </li>
                  <li>
                    <a href="/pasaj/cep-telefonu/cep-telefonu-aksesuarlari/airpods">AirPods</a>
                  </li>
                  <li>
                    <a href="/pasaj/cep-telefonu/cep-telefonu-aksesuarlari/kulakliklar">Kulaklıklar</a>
                  </li>
                  <li>
                    <a href="/pasaj/cep-telefonu/cep-telefonu-aksesuarlari/kablo-duzenleyici-urunler">Kablo Düzenleyiciler</a>
                  </li>
                  <li>
                    <a href="/pasaj/cep-telefonu/cep-telefonu-aksesuarlari/akilli-saat-aksesuarlari">Akıllı Saat Aksesuarları</a>
                  </li>
                  <li>
                    <a href="/pasaj/cep-telefonu/cep-telefonu-aksesuarlari/airpods-aksesuarlari">AirPods Aksesuarları</a>
                  </li>
                  <li>
                    <a href="/pasaj/cep-telefonu/cep-telefonu-aksesuarlari/ekran-koruyucular">Ekran Koruyucular</a>
                  </li>
                  <li>
                    <a href="/pasaj/cep-telefonu/cep-telefonu-aksesuarlari/sarj-cihazlari">Şarj Cihazları</a>
                  </li>
                  <li>
                    <a href="/pasaj/cep-telefonu/cep-telefonu-aksesuarlari/telefon-askisi">Telefon Askısı</a>
                  </li>
                  <li>
                    <a href="/pasaj/cep-telefonu/cep-telefonu-aksesuarlari/cep-telefonu-tutuculari">Telefon Tutucular</a>
                  </li>
                  <li>
                    <a href="/pasaj/cep-telefonu/cep-telefonu-aksesuarlari/donusturuculer">Dönüştürücüler</a>
                  </li>
                  <li>
                    <a href="/pasaj/cep-telefonu/cep-telefonu-aksesuarlari/hafiza-depolama-urunleri">Hafıza &amp; Depolama Ürünleri</a>
                  </li>
                  <li>
                    <a href="/pasaj/cep-telefonu/cep-telefonu-aksesuarlari/selfie-cubugu">Selfie Çubukları</a>
                  </li>
                </ul>
              </li>
              <li data-analytic-index="6" class="js-has-sublist">
                <a href="/pasaj/cep-telefonu/yenilenmis-telefonlar">Yenilenmiş Telefonlar</a>
                <ul class="o-p-header__dropdown__sub-list">
                  <li>
                    <a href=""></a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="/pasaj/cep-telefonu" class="all">Tüm Cep Telefonu-Aksesuar <i class="icon-p-arrow-down"></i>
                </a>
              </li>
            </ul>
            <div class="o-p-header__dropdown__cards">
              <div data-analytic-index="0" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item active">
                <div>
                  <a href="/pasaj/cep-telefonu/ios-telefonlar/iphone-15-pro-max-256-gb" class="google-analytics-device device-detail-btn m-p-pc-new" style="" data-product-id="iphone-15-pro-max-256-gb" data-campaign="campaign,discount," data-href="/pasaj/cep-telefonu/ios-telefonlar/iphone-15-pro-max-256-gb" data-image-url="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/1698310630203/1698310637001.png">
                    <div class="a-p-card-ribbon a-p-card-ribbon--a a-p-card-ribbon--short " style="background: #FFA12C"> Çok Satan </div>
                    <div class="a-fav-button" data-url="/pasaj/user-favorite-operation" data-device-path="/pasaj/cep-telefonu/ios-telefonlar/iphone-15-pro-max-256-gb" data-device-id="1105945" data-pm-name="iPhone 15 Pro Max 256 GB">
                      <span class="tooltip tooltipstered" data-alternative="Favoriden Çıkar">
                        <svg class="heart" xmlns="http://www.w3.org/2000/svg" width="36" height="32" viewBox="0 0 36 32">
                          <path fill="#FFC900" fill-rule="nonzero" stroke="#FFC900" class="heart-line" d="M3.058 2.738l-.104.104C-.983 6.779-.985 13.165 2.95 17.1l12.678 12.678c.847.847 2.213.849 3.062 0L31.368 17.1c3.938-3.938 3.938-10.317-.004-14.258l-.104-.104c-3.654-3.654-9.578-3.65-13.237.009l-.614.614c-.137.137-.363.137-.5 0l-.614-.614C12.638-.91 6.709-.913 3.058 2.738zM15.89 4.38c.7.7 1.836.7 2.536 0l.614-.614c3.097-3.097 8.11-3.1 11.201-.009l.104.104c3.379 3.38 3.38 8.846.004 12.221L17.671 28.76c-.285.285-.74.285-1.024 0L3.968 16.08C.596 12.71.598 7.235 3.972 3.86l.104-.104c3.088-3.088 8.106-3.085 11.2.009l.615.614z" transform="translate(-1254 -352) translate(1255 353)"></path>
                          <path fill="#ffc900" class="heart-fill" d="M15.994 3.47C12.784.213 7.577.215 4.368 3.47l-.258.262C.48 7.412.48 13.379 4.107 17.056l12.445 12.619c.556.563 1.462.558 2.013 0L31.01 17.056c3.628-3.679 3.629-9.642-.002-13.324l-.26-.263c-3.21-3.255-8.413-3.256-11.625 0l-1.057 1.073c-.28.284-.736.282-1.014 0l-1.058-1.073z" transform="translate(-1254 -352) translate(1239 328) translate(16 25)"></path>
                        </svg>
                      </span>
                    </div>
                    <div class="m-p-pc-new__body">
                      <div class="m-p-pc-new__carousel">
                        <div class="swiper-container swiper-container-initialized swiper-container-horizontal">
                          <div class="swiper-wrapper" style="transition-duration: 0ms;">
                            <div class="swiper-slide">
                              <figure class="m-p-pc-new__img">
                                <img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/1698310630203/1698310637001/1698310637001_250x188.png?17735349480672" alt="iPhone 15 Pro Max 256 GB" class="swiper-lazy">
                              </figure>
                            </div>
                            <div class="swiper-slide">
                              <figure class="m-p-pc-new__img">
                                <img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/1698310687269/1698310693256/1698310693256_250x188.png?17735349480672" alt="iPhone 15 Pro Max 256 GB" class="swiper-lazy">
                              </figure>
                            </div>
                            <div class="swiper-slide">
                              <figure class="m-p-pc-new__img">
                                <img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/1698310727738/1698310732344/1698310732344_250x188.png?17735349480672" alt="iPhone 15 Pro Max 256 GB" class="swiper-lazy">
                              </figure>
                            </div>
                            <div class="swiper-slide">
                              <figure class="m-p-pc-new__img">
                                <img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/1698311978023/1698311986258/1698311986258_250x188.png?17735349480672" alt="iPhone 15 Pro Max 256 GB" class="swiper-lazy">
                              </figure>
                            </div>
                            <div class="swiper-slide">
                              <figure class="m-p-pc-new__img">
                                <img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/1698312053473/1698312059013/1698312059013_250x188.png?17735349480672" alt="iPhone 15 Pro Max 256 GB" class="swiper-lazy">
                              </figure>
                            </div>
                          </div>
                          <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                        </div>
                        <div class="m-p-pc-new__carousel__pagination swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"></div>
                        <div class="m-p-pc-new__colors">
                          <span class="m-p-pc-new__colors__color" style="background: #4D4E50"></span>
                          <span class="m-p-pc-new__colors__color" style="background: #f3f2ed"></span>
                          <span class="m-p-pc-new__colors__total">+2</span>
                        </div>
                      </div>
                      <span class="m-p-pc-new__title">iPhone 15 Pro Max 256 GB</span>
                      <div class="a-rate">
                        <div class="a-rate__star" data-point="4.9">
                          <span class="icon-star-filled"></span>
                          <span class="icon-star-filled"></span>
                          <span class="icon-star-filled"></span>
                          <span class="icon-star-filled"></span>
                          <span class="icon-star-half"></span>
                        </div>
                        <div class="a-rate__point">4,9 </div>
                      </div>
                      <div class="m-p-pc-new__badges">
                        <div class="m-p-pc-new__badge" style="background: #00e90a1a">Alışveriş <br>Kredisi </div>
                        <div class="m-p-pc-new__badge" style="background: #FDF7E7">Ücretsiz <br>Kargo </div>
                        <div class="m-p-pc-new__badge" style="background: #FDF7E7">Hızlı <br>Teslimat </div>
                      </div>
                    </div>
                    <div class="m-p-pc-new__foot">
                      <div class="m-p-pc-new__price m-p-pc-new__price--secondary">
                        <div class="m-p-pc-new__price">77.499 <span class="m-p-pc-new__price__cur">TL</span>
                        </div>
                        <div class="m-p-pc-new__price m-p-pc-new__price--box">
                          <div class="m-p-pc-new__price--old">82.999 <span class="m-p-pc-new__price__cur">TL <span class="m-p-pc-new__price__cur__discount">5.500 TL İndirim</span>
                            </span>
                          </div>
                        </div>
                        <div class="m-p-pc-new__lowest-price">Son 30 günün en düşük fiyatı</div>
                      </div>
                    </div>
                    <!-- google-analytics -->
                    <div id="google-analytics-device-informations" style="display: none;" data-section-title="Cep Telefonu-Aksesuar - " data-product-id="1105945" data-product-name="iPhone 15 Pro Max 256 GB" data-product-price="77499.0" data-product-brand="Apple" data-position="1" data-dimension21="TRY" data-dimension22="true" data-dimension25="Kontratli" data-dimension27="true" data-dimension30="Non-Turkcell" data-dimension156="true" data-dimension157="6.6" data-dimension167="671" data-dimension168="17" data-dimension169="13" data-dimension170="4.92" data-ribbon_ozel="false" data-ribbon-tlkupon="false" data-ribbon-tukeniyor="false" data-ribbon-firsaturunu="false" data-ribbon-coksatan="1" data-ribbon-gununfirsati="0" data-badge-faturayaektaksitli="1" data-badge-pesinfiyatinataksit="false" data-badge-alisveriskredisi="false" data-badge-faturanlaode="false" data-badge-ucretsizkargo="1" data-badge-hizliteslimat="1" data-badge-magazadanteslim="false" data-badge-anindateslim="false" data-dahili-hafiza="" data-countdown="2024/02/29,20:59:00" data-indirim-tutari="5500" data-indirim-orani="6.6" data-unit-sale-price="77499.0" data-product-category="Cep Telefonu-Aksesuar" data-dimension173="Apple Telefonlar"></div>
                    <!-- google-analytics -->
                  </a>
                </div>
                <div>
                  <a href="/pasaj/cep-telefonu/ios-telefonlar/iphone-13-128-gb" class="google-analytics-device device-detail-btn m-p-pc-new" style="" data-product-id="iphone-13-128-gb" data-campaign="campaign," data-href="/pasaj/cep-telefonu/ios-telefonlar/iphone-13-128-gb" data-image-url="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00960Y/00960Y-1.png">
                    <div class="a-p-card-ribbon a-p-card-ribbon--a a-p-card-ribbon--short " style="background: #FFA12C"> Çok Satan </div>
                    <div class="a-fav-button" data-url="/pasaj/user-favorite-operation" data-device-path="/pasaj/cep-telefonu/ios-telefonlar/iphone-13-128-gb" data-device-id="1038759" data-pm-name="iPhone 13 128 GB">
                      <span class="tooltip tooltipstered" data-alternative="Favoriden Çıkar">
                        <svg class="heart" xmlns="http://www.w3.org/2000/svg" width="36" height="32" viewBox="0 0 36 32">
                          <path fill="#FFC900" fill-rule="nonzero" stroke="#FFC900" class="heart-line" d="M3.058 2.738l-.104.104C-.983 6.779-.985 13.165 2.95 17.1l12.678 12.678c.847.847 2.213.849 3.062 0L31.368 17.1c3.938-3.938 3.938-10.317-.004-14.258l-.104-.104c-3.654-3.654-9.578-3.65-13.237.009l-.614.614c-.137.137-.363.137-.5 0l-.614-.614C12.638-.91 6.709-.913 3.058 2.738zM15.89 4.38c.7.7 1.836.7 2.536 0l.614-.614c3.097-3.097 8.11-3.1 11.201-.009l.104.104c3.379 3.38 3.38 8.846.004 12.221L17.671 28.76c-.285.285-.74.285-1.024 0L3.968 16.08C.596 12.71.598 7.235 3.972 3.86l.104-.104c3.088-3.088 8.106-3.085 11.2.009l.615.614z" transform="translate(-1254 -352) translate(1255 353)"></path>
                          <path fill="#ffc900" class="heart-fill" d="M15.994 3.47C12.784.213 7.577.215 4.368 3.47l-.258.262C.48 7.412.48 13.379 4.107 17.056l12.445 12.619c.556.563 1.462.558 2.013 0L31.01 17.056c3.628-3.679 3.629-9.642-.002-13.324l-.26-.263c-3.21-3.255-8.413-3.256-11.625 0l-1.057 1.073c-.28.284-.736.282-1.014 0l-1.058-1.073z" transform="translate(-1254 -352) translate(1239 328) translate(16 25)"></path>
                        </svg>
                      </span>
                    </div>
                    <div class="m-p-pc-new__body">
                      <div class="m-p-pc-new__carousel">
                        <div class="swiper-container swiper-container-initialized swiper-container-horizontal">
                          <div class="swiper-wrapper" style="transition-duration: 0ms;">
                            <div class="swiper-slide">
                              <figure class="m-p-pc-new__img">
                                <img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00960Y/00960Y-1/00960Y-1_250x188.png?17735349480672" alt="iPhone 13 128 GB" class="swiper-lazy">
                              </figure>
                            </div>
                            <div class="swiper-slide">
                              <figure class="m-p-pc-new__img">
                                <img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00960Y/00960Y-2/00960Y-2_250x188.png?17735349480672" alt="iPhone 13 128 GB" class="swiper-lazy">
                              </figure>
                            </div>
                            <div class="swiper-slide">
                              <figure class="m-p-pc-new__img">
                                <img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00960Y/00960Y-3/00960Y-3_250x188.png?17735349480672" alt="iPhone 13 128 GB" class="swiper-lazy">
                              </figure>
                            </div>
                            <div class="swiper-slide">
                              <figure class="m-p-pc-new__img">
                                <img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00960Y/00960Y-4/00960Y-4_250x188.png?17735349480672" alt="iPhone 13 128 GB" class="swiper-lazy">
                              </figure>
                            </div>
                            <div class="swiper-slide">
                              <figure class="m-p-pc-new__img">
                                <img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00960Y/00960Y-5/00960Y-5_250x188.png?17735349480672" alt="iPhone 13 128 GB" class="swiper-lazy">
                              </figure>
                            </div>
                          </div>
                          <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                        </div>
                        <div class="m-p-pc-new__carousel__pagination swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"></div>
                        <div class="m-p-pc-new__colors">
                          <span class="m-p-pc-new__colors__color" style="background: #ff69b4"></span>
                          <span class="m-p-pc-new__colors__color" style="background: #00CD00"></span>
                          <span class="m-p-pc-new__colors__total">+4</span>
                        </div>
                      </div>
                      <span class="m-p-pc-new__title">iPhone 13 128 GB</span>
                      <div class="a-rate">
                        <div class="a-rate__star" data-point="4.8">
                          <span class="icon-star-filled"></span>
                          <span class="icon-star-filled"></span>
                          <span class="icon-star-filled"></span>
                          <span class="icon-star-filled"></span>
                          <span class="icon-star-half"></span>
                        </div>
                        <div class="a-rate__point">4,8 </div>
                      </div>
                      <div class="m-p-pc-new__badges">
                        <div class="m-p-pc-new__badge" style="background: #00e90a1a">Alışveriş <br>Kredisi </div>
                        <div class="m-p-pc-new__badge" style="background: #FDF7E7">Ücretsiz <br>Kargo </div>
                        <div class="m-p-pc-new__badge" style="background: #FDF7E7">Hızlı <br>Teslimat </div>
                      </div>
                    </div>
                    <div class="m-p-pc-new__foot">
                      <div class="m-p-pc-new__price m-p-pc-new__price--secondary"> 35.699 <span class="m-p-pc-new__price__cur">TL </span>
                      </div>
                    </div>
                    <!-- google-analytics -->
                    <div id="google-analytics-device-informations" style="display: none;" data-section-title="Cep Telefonu-Aksesuar - " data-product-id="1038759" data-product-name="iPhone 13 128 GB" data-product-price="35699.0" data-product-brand="Apple" data-position="1" data-dimension21="TRY" data-dimension22="false" data-dimension25="Kontratli" data-dimension27="true" data-dimension30="Non-Turkcell" data-dimension156="true" data-dimension157="10.8" data-dimension167="602" data-dimension168="21" data-dimension169="560" data-dimension170="4.82" data-ribbon_ozel="false" data-ribbon-tlkupon="false" data-ribbon-tukeniyor="false" data-ribbon-firsaturunu="false" data-ribbon-coksatan="1" data-ribbon-gununfirsati="0" data-badge-faturayaektaksitli="1" data-badge-pesinfiyatinataksit="false" data-badge-alisveriskredisi="false" data-badge-faturanlaode="false" data-badge-ucretsizkargo="1" data-badge-hizliteslimat="1" data-badge-magazadanteslim="false" data-badge-anindateslim="false" data-dahili-hafiza="128 GB" data-countdown="2024/02/29,20:59:00" data-indirim-tutari="4300" data-indirim-orani="10.8" data-unit-sale-price="35699.0" data-product-category="Cep Telefonu-Aksesuar" data-dimension173="Apple Telefonlar"></div>
                    <!-- google-analytics -->
                  </a>
                </div>
              </div>
              <div data-analytic-index="1" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item ">
                <div>
                  <a href="/pasaj/cep-telefonu/ios-telefonlar/iphone-11-64-gb" class="google-analytics-device device-detail-btn m-p-pc-new" style="" data-product-id="iphone-11-64-gb" data-campaign="campaign," data-href="/pasaj/cep-telefonu/ios-telefonlar/iphone-11-64-gb" data-image-url="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/0048EV/0048EV-1.png">
                    <div class="a-fav-button" data-url="/pasaj/user-favorite-operation" data-device-path="/pasaj/cep-telefonu/ios-telefonlar/iphone-11-64-gb" data-device-id="1025679" data-pm-name="iPhone 11 64 GB">
                      <span class="tooltip tooltipstered" data-alternative="Favoriden Çıkar">
                        <svg class="heart" xmlns="http://www.w3.org/2000/svg" width="36" height="32" viewBox="0 0 36 32">
                          <path fill="#FFC900" fill-rule="nonzero" stroke="#FFC900" class="heart-line" d="M3.058 2.738l-.104.104C-.983 6.779-.985 13.165 2.95 17.1l12.678 12.678c.847.847 2.213.849 3.062 0L31.368 17.1c3.938-3.938 3.938-10.317-.004-14.258l-.104-.104c-3.654-3.654-9.578-3.65-13.237.009l-.614.614c-.137.137-.363.137-.5 0l-.614-.614C12.638-.91 6.709-.913 3.058 2.738zM15.89 4.38c.7.7 1.836.7 2.536 0l.614-.614c3.097-3.097 8.11-3.1 11.201-.009l.104.104c3.379 3.38 3.38 8.846.004 12.221L17.671 28.76c-.285.285-.74.285-1.024 0L3.968 16.08C.596 12.71.598 7.235 3.972 3.86l.104-.104c3.088-3.088 8.106-3.085 11.2.009l.615.614z" transform="translate(-1254 -352) translate(1255 353)"></path>
                          <path fill="#ffc900" class="heart-fill" d="M15.994 3.47C12.784.213 7.577.215 4.368 3.47l-.258.262C.48 7.412.48 13.379 4.107 17.056l12.445 12.619c.556.563 1.462.558 2.013 0L31.01 17.056c3.628-3.679 3.629-9.642-.002-13.324l-.26-.263c-3.21-3.255-8.413-3.256-11.625 0l-1.057 1.073c-.28.284-.736.282-1.014 0l-1.058-1.073z" transform="translate(-1254 -352) translate(1239 328) translate(16 25)"></path>
                        </svg>
                      </span>
                    </div>
                    <div class="m-p-pc-new__body">
                      <div class="m-p-pc-new__carousel">
                        <div class="swiper-container swiper-container-initialized swiper-container-horizontal">
                          <div class="swiper-wrapper" style="transition-duration: 0ms;">
                            <div class="swiper-slide">
                              <figure class="m-p-pc-new__img">
                                <img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/0048EV/0048EV-1/0048EV-1_250x188.png?17735349480672" alt="iPhone 11 64 GB" class="swiper-lazy">
                              </figure>
                            </div>
                            <div class="swiper-slide">
                              <figure class="m-p-pc-new__img">
                                <img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/0048EV/0048EV-2/0048EV-2_250x188.png?17735349480672" alt="iPhone 11 64 GB" class="swiper-lazy">
                              </figure>
                            </div>
                            <div class="swiper-slide">
                              <figure class="m-p-pc-new__img">
                                <img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/0048EV/0048EV-3/0048EV-3_250x188.png?17735349480672" alt="iPhone 11 64 GB" class="swiper-lazy">
                              </figure>
                            </div>
                            <div class="swiper-slide">
                              <figure class="m-p-pc-new__img">
                                <img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/0048EV/0048EV-4/0048EV-4_250x188.png?17735349480672" alt="iPhone 11 64 GB" class="swiper-lazy">
                              </figure>
                            </div>
                            <div class="swiper-slide">
                              <figure class="m-p-pc-new__img">
                                <img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/0048EV/0048EV-5/0048EV-5_250x188.png?17735349480672" alt="iPhone 11 64 GB" class="swiper-lazy">
                              </figure>
                            </div>
                          </div>
                          <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                        </div>
                        <div class="m-p-pc-new__carousel__pagination swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"></div>
                        <div class="m-p-pc-new__colors">
                          <span class="m-p-pc-new__colors__color" style="background: #FFFFFF; border:1px solid #edf0f2"></span>
                          <span class="m-p-pc-new__colors__color" style="background: #00CD00"></span>
                          <span class="m-p-pc-new__colors__total">+4</span>
                        </div>
                      </div>
                      <span class="m-p-pc-new__title">iPhone 11 64 GB</span>
                      <div class="a-rate">
                        <div class="a-rate__star" data-point="4.8">
                          <span class="icon-star-filled"></span>
                          <span class="icon-star-filled"></span>
                          <span class="icon-star-filled"></span>
                          <span class="icon-star-filled"></span>
                          <span class="icon-star-half"></span>
                        </div>
                        <div class="a-rate__point">4,8 </div>
                      </div>
                      <div class="m-p-pc-new__badges">
                        <div class="m-p-pc-new__badge" style="background: #FDF7E7">Ücretsiz <br>Kargo </div>
                        <div class="m-p-pc-new__badge" style="background: #FDF7E7">Hızlı <br>Teslimat </div>
                      </div>
                    </div>
                    <div class="m-p-pc-new__foot">
                      <div class="m-p-pc-new__price m-p-pc-new__price--secondary"> 23.497 <span class="m-p-pc-new__price__cur">TL </span>
                      </div>
                    </div>
                    <!-- google-analytics -->
                    <div id="google-analytics-device-informations" style="display: none;" data-section-title="Cep Telefonu-Aksesuar - Apple Telefonlar" data-product-id="1025679" data-product-name="iPhone 11 64 GB" data-product-price="23497.0" data-product-brand="Apple" data-position="1" data-dimension21="TRY" data-dimension22="false" data-dimension25="Kontratli" data-dimension27="true" data-dimension30="Non-Turkcell" data-dimension156="true" data-dimension157="9.6" data-dimension167="141" data-dimension168="8" data-dimension169="514" data-dimension170="4.82" data-ribbon_ozel="false" data-ribbon-tlkupon="false" data-ribbon-tukeniyor="false" data-ribbon-firsaturunu="false" data-ribbon-coksatan="false" data-ribbon-gununfirsati="false" data-badge-faturayaektaksitli="false" data-badge-pesinfiyatinataksit="false" data-badge-alisveriskredisi="false" data-badge-faturanlaode="false" data-badge-ucretsizkargo="1" data-badge-hizliteslimat="1" data-badge-magazadanteslim="false" data-badge-anindateslim="false" data-dahili-hafiza="64 GB" data-countdown="29.03.2024" data-indirim-tutari="2502" data-indirim-orani="9.6" data-unit-sale-price="23497.0" data-product-category="Cep Telefonu-Aksesuar" data-dimension173="Apple Telefonlar"></div>
                    <!-- google-analytics -->
                  </a>
                </div>
                <div>
                  <a href="/pasaj/cep-telefonu/ios-telefonlar/iphone-12-128-gb" class="google-analytics-device device-detail-btn m-p-pc-new" style="" data-product-id="iphone-12-128-gb" data-campaign="campaign,discount," data-href="/pasaj/cep-telefonu/ios-telefonlar/iphone-12-128-gb" data-image-url="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/006QC9/006QC9-1.png">
                    <div class="a-p-card-ribbon a-p-card-ribbon--a a-p-card-ribbon--short " style="background: #FFA12C"> Çok Satan </div>
                    <div class="a-fav-button" data-url="/pasaj/user-favorite-operation" data-device-path="/pasaj/cep-telefonu/ios-telefonlar/iphone-12-128-gb" data-device-id="1030990" data-pm-name="iPhone 12 128 GB">
                      <span class="tooltip tooltipstered" data-alternative="Favoriden Çıkar">
                        <svg class="heart" xmlns="http://www.w3.org/2000/svg" width="36" height="32" viewBox="0 0 36 32">
                          <path fill="#FFC900" fill-rule="nonzero" stroke="#FFC900" class="heart-line" d="M3.058 2.738l-.104.104C-.983 6.779-.985 13.165 2.95 17.1l12.678 12.678c.847.847 2.213.849 3.062 0L31.368 17.1c3.938-3.938 3.938-10.317-.004-14.258l-.104-.104c-3.654-3.654-9.578-3.65-13.237.009l-.614.614c-.137.137-.363.137-.5 0l-.614-.614C12.638-.91 6.709-.913 3.058 2.738zM15.89 4.38c.7.7 1.836.7 2.536 0l.614-.614c3.097-3.097 8.11-3.1 11.201-.009l.104.104c3.379 3.38 3.38 8.846.004 12.221L17.671 28.76c-.285.285-.74.285-1.024 0L3.968 16.08C.596 12.71.598 7.235 3.972 3.86l.104-.104c3.088-3.088 8.106-3.085 11.2.009l.615.614z" transform="translate(-1254 -352) translate(1255 353)"></path>
                          <path fill="#ffc900" class="heart-fill" d="M15.994 3.47C12.784.213 7.577.215 4.368 3.47l-.258.262C.48 7.412.48 13.379 4.107 17.056l12.445 12.619c.556.563 1.462.558 2.013 0L31.01 17.056c3.628-3.679 3.629-9.642-.002-13.324l-.26-.263c-3.21-3.255-8.413-3.256-11.625 0l-1.057 1.073c-.28.284-.736.282-1.014 0l-1.058-1.073z" transform="translate(-1254 -352) translate(1239 328) translate(16 25)"></path>
                        </svg>
                      </span>
                    </div>
                    <div class="m-p-pc-new__body">
                      <div class="m-p-pc-new__carousel">
                        <div class="swiper-container swiper-container-initialized swiper-container-horizontal">
                          <div class="swiper-wrapper" style="transition-duration: 0ms;"><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/006QC9/006QC9-1/006QC9-1_250x188.png?17735349480672" alt="iPhone 12 128 GB" class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/006QC9/006QC9-2/006QC9-2_250x188.png?17735349480672" alt="iPhone 12 128 GB" class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/006QC9/006QC9-3/006QC9-3_250x188.png?17735349480672" alt="iPhone 12 128 GB" class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/006QC9/006QC9-4/006QC9-4_250x188.png?17735349480672" alt="iPhone 12 128 GB" class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/006QC9/006QC9-5/006QC9-5_250x188.png?17735349480672" alt="iPhone 12 128 GB" class="swiper-lazy"></figure></div></div><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                        </div><div class="m-p-pc-new__carousel__pagination swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"></div><div class="m-p-pc-new__colors"><span class="m-p-pc-new__colors__color" style="background: #FFFFFF; border:1px solid #edf0f2"></span><span class="m-p-pc-new__colors__color" style="background: #00CD00"></span><span class="m-p-pc-new__colors__total">+4</span></div>
                      </div><span class="m-p-pc-new__title">iPhone 12 128 GB</span><div class="a-rate"><div class="a-rate__star" data-point="4.7"><span class="icon-star-filled"></span><span class="icon-star-filled"></span><span class="icon-star-filled"></span><span class="icon-star-filled"></span><span class="icon-star-half"></span></div><div class="a-rate__point">4,7 </div></div><div class="m-p-pc-new__badges"><div class="m-p-pc-new__badge" style="background: #00e90a1a">Alışveriş<br>Kredisi</div><div class="m-p-pc-new__badge" style="background: #FDF7E7">Ücretsiz<br>Kargo</div><div class="m-p-pc-new__badge" style="background: #FDF7E7">Hızlı<br>Teslimat</div></div>
                    </div><div class="m-p-pc-new__foot"><div class="m-p-pc-new__price m-p-pc-new__price--secondary"> 27.588 <span class="m-p-pc-new__price__cur">TL </span></div></div>
                    <!-- google-analytics --><div id="google-analytics-device-informations" style="display: none;" data-section-title="Cep Telefonu-Aksesuar - Apple Telefonlar" data-product-id="1030990" data-product-name="iPhone 12 128 GB" data-product-price="27588.0" data-product-brand="Apple" data-position="1" data-dimension21="TRY" data-dimension22="true" data-dimension25="Kontratli" data-dimension27="true" data-dimension30="Non-Turkcell" data-dimension156="true" data-dimension157="8" data-dimension167="1135" data-dimension168="15" data-dimension169="90" data-dimension170="4.73" data-ribbon_ozel="false" data-ribbon-tlkupon="false" data-ribbon-tukeniyor="false" data-ribbon-firsaturunu="false" data-ribbon-coksatan="1" data-ribbon-gununfirsati="0" data-badge-faturayaektaksitli="1" data-badge-pesinfiyatinataksit="false" data-badge-alisveriskredisi="false" data-badge-faturanlaode="false" data-badge-ucretsizkargo="1" data-badge-hizliteslimat="1" data-badge-magazadanteslim="false" data-badge-anindateslim="false" data-dahili-hafiza="128 GB" data-countdown="31.03.2024" data-indirim-tutari="2411" data-indirim-orani="8" data-unit-sale-price="27588.0" data-product-category="Cep Telefonu-Aksesuar" data-dimension173="Apple Telefonlar"></div>
                    <!-- google-analytics -->
                  </a>
                </div>
              </div><div data-analytic-index="2" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "><div><a href="/pasaj/cep-telefonu/android-telefonlar/samsung-galaxy-a04-4-gb-64-gb" class="google-analytics-device device-detail-btn m-p-pc-new" style="" data-product-id="samsung-galaxy-a04-4-gb-64-gb" data-campaign="campaign,discount," data-href="/pasaj/cep-telefonu/android-telefonlar/samsung-galaxy-a04-4-gb-64-gb" data-image-url="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00CGKN/1-1666001042028.png"><div class="a-fav-button" data-url="/pasaj/user-favorite-operation" data-device-path="/pasaj/cep-telefonu/android-telefonlar/samsung-galaxy-a04-4-gb-64-gb" data-device-id="1078100" data-pm-name="Samsung Galaxy A04 4 GB 64 GB"><span class="tooltip tooltipstered" data-alternative="Favoriden Çıkar"><svg class="heart" xmlns="http://www.w3.org/2000/svg" width="36" height="32" viewBox="0 0 36 32"><path fill="#FFC900" fill-rule="nonzero" stroke="#FFC900" class="heart-line" d="M3.058 2.738l-.104.104C-.983 6.779-.985 13.165 2.95 17.1l12.678 12.678c.847.847 2.213.849 3.062 0L31.368 17.1c3.938-3.938 3.938-10.317-.004-14.258l-.104-.104c-3.654-3.654-9.578-3.65-13.237.009l-.614.614c-.137.137-.363.137-.5 0l-.614-.614C12.638-.91 6.709-.913 3.058 2.738zM15.89 4.38c.7.7 1.836.7 2.536 0l.614-.614c3.097-3.097 8.11-3.1 11.201-.009l.104.104c3.379 3.38 3.38 8.846.004 12.221L17.671 28.76c-.285.285-.74.285-1.024 0L3.968 16.08C.596 12.71.598 7.235 3.972 3.86l.104-.104c3.088-3.088 8.106-3.085 11.2.009l.615.614z" transform="translate(-1254 -352) translate(1255 353)"></path><path fill="#ffc900" class="heart-fill" d="M15.994 3.47C12.784.213 7.577.215 4.368 3.47l-.258.262C.48 7.412.48 13.379 4.107 17.056l12.445 12.619c.556.563 1.462.558 2.013 0L31.01 17.056c3.628-3.679 3.629-9.642-.002-13.324l-.26-.263c-3.21-3.255-8.413-3.256-11.625 0l-1.057 1.073c-.28.284-.736.282-1.014 0l-1.058-1.073z" transform="translate(-1254 -352) translate(1239 328) translate(16 25)"></path></svg></span></div><div class="m-p-pc-new__body"><div class="m-p-pc-new__carousel"><div class="swiper-container swiper-container-initialized swiper-container-horizontal"><div class="swiper-wrapper" style="transition-duration: 0ms;"><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00CGKN/1-1666001042028/1-1666001042028_250x188.png?17735349480672" alt="Samsung Galaxy A04 4 GB 64 GB" class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00CGKN/2-1666001749710/2-1666001749710_250x188.png?17735349480672" alt="Samsung Galaxy A04 4 GB 64 GB" class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00CGKN/3-1666001825966/3-1666001825966_250x188.png?17735349480672" alt="Samsung Galaxy A04 4 GB 64 GB" class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00CGKN/4-1666001877053/4-1666001877053_250x188.png?17735349480672" alt="Samsung Galaxy A04 4 GB 64 GB" class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00CGKN/5-1666001847277/5-1666001847277_250x188.png?17735349480672" alt="Samsung Galaxy A04 4 GB 64 GB" class="swiper-lazy"></figure></div></div><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div><div class="m-p-pc-new__carousel__pagination swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"></div><div class="m-p-pc-new__colors"><span class="m-p-pc-new__colors__color" style="background: #FFFFFF; border:1px solid #edf0f2"></span><span class="m-p-pc-new__colors__color" style="background: #000000"></span></div></div><span class="m-p-pc-new__title">Samsung Galaxy A04 4 GB 64 GB</span><div class="a-rate"><div class="a-rate__star" data-point="4.7"><span class="icon-star-filled"></span><span class="icon-star-filled"></span><span class="icon-star-filled"></span><span class="icon-star-filled"></span><span class="icon-star-half"></span></div><div class="a-rate__point">4,7 </div></div><div class="m-p-pc-new__badges"><div class="m-p-pc-new__badge" style="background: #00e90a1a">Faturana Ek 12 Taksit</div><div class="m-p-pc-new__badge" style="background: #FDF7E7">Ücretsiz<br>Kargo</div><div class="m-p-pc-new__badge" style="background: #FDF7E7">Hızlı<br>Teslimat</div></div></div><div class="m-p-pc-new__foot"><div class="m-p-pc-new__price m-p-pc-new__price--secondary"> 5.598 <span class="m-p-pc-new__price__cur">TL </span></div></div>
                    <!-- google-analytics --><div id="google-analytics-device-informations" style="display: none;" data-section-title="Cep Telefonu-Aksesuar - Android Telefonlar" data-product-id="1078100" data-product-name="Samsung Galaxy A04 4 GB 64 GB" data-product-price="5598.0" data-product-brand="Samsung" data-position="1" data-dimension21="TRY" data-dimension22="true" data-dimension25="Kontratli" data-dimension27="true" data-dimension30="Non-Turkcell" data-dimension156="true" data-dimension157="30" data-dimension167="144" data-dimension168="9" data-dimension169="43" data-dimension170="4.68" data-ribbon_ozel="false" data-ribbon-tlkupon="false" data-ribbon-tukeniyor="false" data-ribbon-firsaturunu="false" data-ribbon-coksatan="false" data-ribbon-gununfirsati="false" data-badge-faturayaektaksitli="Faturana Ek 12 Taksit, 1" data-badge-pesinfiyatinataksit="false" data-badge-alisveriskredisi="false" data-badge-faturanlaode="false" data-badge-ucretsizkargo="1" data-badge-hizliteslimat="1" data-badge-magazadanteslim="false" data-badge-anindateslim="false" data-dahili-hafiza="" data-countdown="2024/02/29,00:00:00" data-indirim-tutari="2402" data-indirim-orani="30" data-unit-sale-price="5598.0" data-product-category="Cep Telefonu-Aksesuar" data-dimension173="Android Telefonlar"></div>
                    <!-- google-analytics -->
                  </a></div><div><a href="/pasaj/cep-telefonu/android-telefonlar/samsung-galaxy-a33-5g" class="google-analytics-device device-detail-btn m-p-pc-new" style="" data-product-id="samsung-galaxy-a33-5g" data-campaign="campaign," data-href="/pasaj/cep-telefonu/android-telefonlar/samsung-galaxy-a33-5g" data-image-url="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00AQMM/1-1647678090968.png"><div class="a-p-card-ribbon a-p-card-ribbon--a a-p-card-ribbon--short " style="background: #00BAFC"> Günün Fırsatları </div><div class="a-fav-button" data-url="/pasaj/user-favorite-operation" data-device-path="/pasaj/cep-telefonu/android-telefonlar/samsung-galaxy-a33-5g" data-device-id="1050020" data-pm-name="Samsung Galaxy A33 5G"><span class="tooltip tooltipstered" data-alternative="Favoriden Çıkar"><svg class="heart" xmlns="http://www.w3.org/2000/svg" width="36" height="32" viewBox="0 0 36 32"><path fill="#FFC900" fill-rule="nonzero" stroke="#FFC900" class="heart-line" d="M3.058 2.738l-.104.104C-.983 6.779-.985 13.165 2.95 17.1l12.678 12.678c.847.847 2.213.849 3.062 0L31.368 17.1c3.938-3.938 3.938-10.317-.004-14.258l-.104-.104c-3.654-3.654-9.578-3.65-13.237.009l-.614.614c-.137.137-.363.137-.5 0l-.614-.614C12.638-.91 6.709-.913 3.058 2.738zM15.89 4.38c.7.7 1.836.7 2.536 0l.614-.614c3.097-3.097 8.11-3.1 11.201-.009l.104.104c3.379 3.38 3.38 8.846.004 12.221L17.671 28.76c-.285.285-.74.285-1.024 0L3.968 16.08C.596 12.71.598 7.235 3.972 3.86l.104-.104c3.088-3.088 8.106-3.085 11.2.009l.615.614z" transform="translate(-1254 -352) translate(1255 353)"></path><path fill="#ffc900" class="heart-fill" d="M15.994 3.47C12.784.213 7.577.215 4.368 3.47l-.258.262C.48 7.412.48 13.379 4.107 17.056l12.445 12.619c.556.563 1.462.558 2.013 0L31.01 17.056c3.628-3.679 3.629-9.642-.002-13.324l-.26-.263c-3.21-3.255-8.413-3.256-11.625 0l-1.057 1.073c-.28.284-.736.282-1.014 0l-1.058-1.073z" transform="translate(-1254 -352) translate(1239 328) translate(16 25)"></path></svg></span></div><div class="m-p-pc-new__body"><div class="m-p-pc-new__carousel"><div class="swiper-container swiper-container-initialized swiper-container-horizontal"><div class="swiper-wrapper" style="transition-duration: 0ms;"><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00AQMM/1-1647678090968/1-1647678090968_250x188.png?17735349480672" alt="Samsung Galaxy A33 5G" class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00AQMM/2-1647678712966/2-1647678712966_250x188.png?17735349480672" alt="Samsung Galaxy A33 5G" class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00AQMM/3-1647679185662/3-1647679185662_250x188.png?17735349480672" alt="Samsung Galaxy A33 5G" class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00AQMM/4-1647678884346/4-1647678884346_250x188.png?17735349480672" alt="Samsung Galaxy A33 5G" class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00AQMM/5-1647679847514/5-1647679847514_250x188.png?17735349480672" alt="Samsung Galaxy A33 5G" class="swiper-lazy"></figure></div></div><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div><div class="m-p-pc-new__carousel__pagination swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"></div><div class="m-p-pc-new__colors"><span class="m-p-pc-new__colors__color" style="background: #87CEFA"></span><span class="m-p-pc-new__colors__color" style="background: #FFFFFF; border:1px solid #edf0f2"></span><span class="m-p-pc-new__colors__total">+2</span></div></div><span class="m-p-pc-new__title">Samsung Galaxy A33 5G</span><div class="a-rate"><div class="a-rate__star" data-point="4.3"><span class="icon-star-filled"></span><span class="icon-star-filled"></span><span class="icon-star-filled"></span><span class="icon-star-filled"></span><span class="icon-star-half"></span></div><div class="a-rate__point">4,3 </div></div><div class="m-p-pc-new__badges"><div class="m-p-pc-new__badge" style="background: #FDF7E7">Ücretsiz<br>Kargo</div><div class="m-p-pc-new__badge" style="background: #FDF7E7">Hızlı<br>Teslimat</div></div></div><div class="m-p-pc-new__foot"><div class="m-p-pc-new__price m-p-pc-new__price--secondary"> 10.999 <span class="m-p-pc-new__price__cur">TL </span></div></div>
                    <!-- google-analytics --><div id="google-analytics-device-informations" style="display: none;" data-section-title="Cep Telefonu-Aksesuar - Android Telefonlar" data-product-id="1050020" data-product-name="Samsung Galaxy A33 5G" data-product-price="10999.0" data-product-brand="Samsung" data-position="1" data-dimension21="TRY" data-dimension22="false" data-dimension25="Kontratli" data-dimension27="true" data-dimension30="Non-Turkcell" data-dimension156="true" data-dimension157="4.3" data-dimension167="9" data-dimension168="10" data-dimension169="14" data-dimension170="4.3" data-ribbon_ozel="false" data-ribbon-tlkupon="false" data-ribbon-tukeniyor="false" data-ribbon-firsaturunu="false" data-ribbon-coksatan="false" data-ribbon-gununfirsati="1" data-badge-faturayaektaksitli="false" data-badge-pesinfiyatinataksit="false" data-badge-alisveriskredisi="false" data-badge-faturanlaode="false" data-badge-ucretsizkargo="1" data-badge-hizliteslimat="1" data-badge-magazadanteslim="false" data-badge-anindateslim="false" data-dahili-hafiza="" data-countdown="2024/02/29,00:00:00" data-indirim-tutari="500" data-indirim-orani="4.3" data-unit-sale-price="10999.0" data-product-category="Cep Telefonu-Aksesuar" data-dimension173="Android Telefonlar"></div>
                    <!-- google-analytics -->
                  </a></div></div><div data-analytic-index="3" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="4" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="5" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "><div><a href="/pasaj/cep-telefonu/cep-telefonu-aksesuarlari/airpods/apple-airpods-pro-magsafe-sarj-kutusu" class="google-analytics-device device-detail-btn m-p-pc-new" style="" data-product-id="apple-airpods-pro-magsafe-sarj-kutusu" data-campaign="campaign," data-href="/pasaj/cep-telefonu/cep-telefonu-aksesuarlari/airpods/apple-airpods-pro-magsafe-sarj-kutusu" data-image-url="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Cihaz/aksesuar/Apple/airpods-pro/cg/1.png"><div class="a-p-card-ribbon a-p-card-ribbon--a a-p-card-ribbon--short " style="background: #00BAFC"> Günün Fırsatları </div><div class="a-fav-button" data-url="/pasaj/user-favorite-operation" data-device-path="/pasaj/cep-telefonu/cep-telefonu-aksesuarlari/airpods/apple-airpods-pro-magsafe-sarj-kutusu" data-device-id="1040684" data-pm-name="Apple AirPods Pro (Magsafe Özellikli Şarj Kutusu)"><span class="tooltip tooltipstered" data-alternative="Favoriden Çıkar"><svg class="heart" xmlns="http://www.w3.org/2000/svg" width="36" height="32" viewBox="0 0 36 32"><path fill="#FFC900" fill-rule="nonzero" stroke="#FFC900" class="heart-line" d="M3.058 2.738l-.104.104C-.983 6.779-.985 13.165 2.95 17.1l12.678 12.678c.847.847 2.213.849 3.062 0L31.368 17.1c3.938-3.938 3.938-10.317-.004-14.258l-.104-.104c-3.654-3.654-9.578-3.65-13.237.009l-.614.614c-.137.137-.363.137-.5 0l-.614-.614C12.638-.91 6.709-.913 3.058 2.738zM15.89 4.38c.7.7 1.836.7 2.536 0l.614-.614c3.097-3.097 8.11-3.1 11.201-.009l.104.104c3.379 3.38 3.38 8.846.004 12.221L17.671 28.76c-.285.285-.74.285-1.024 0L3.968 16.08C.596 12.71.598 7.235 3.972 3.86l.104-.104c3.088-3.088 8.106-3.085 11.2.009l.615.614z" transform="translate(-1254 -352) translate(1255 353)"></path><path fill="#ffc900" class="heart-fill" d="M15.994 3.47C12.784.213 7.577.215 4.368 3.47l-.258.262C.48 7.412.48 13.379 4.107 17.056l12.445 12.619c.556.563 1.462.558 2.013 0L31.01 17.056c3.628-3.679 3.629-9.642-.002-13.324l-.26-.263c-3.21-3.255-8.413-3.256-11.625 0l-1.057 1.073c-.28.284-.736.282-1.014 0l-1.058-1.073z" transform="translate(-1254 -352) translate(1239 328) translate(16 25)"></path></svg></span></div><div class="m-p-pc-new__body"><div class="m-p-pc-new__carousel"><div class="swiper-container swiper-container-initialized swiper-container-horizontal"><div class="swiper-wrapper" style="transition-duration: 0ms;"><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Cihaz/aksesuar/Apple/airpods-pro/cg/1/1_250x188.png?17735349480672" alt="Apple AirPods Pro (Magsafe Özellikli Şarj Kutusu)" class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Cihaz/aksesuar/Apple/airpods-pro/cg/2/2_250x188.png?17735349480672" alt="Apple AirPods Pro (Magsafe Özellikli Şarj Kutusu)" class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Cihaz/aksesuar/Apple/airpods-pro/cg/3/3_250x188.png?17735349480672" alt="Apple AirPods Pro (Magsafe Özellikli Şarj Kutusu)" class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Cihaz/aksesuar/Apple/airpods-pro/cg/4/4_250x188.png?17735349480672" alt="Apple AirPods Pro (Magsafe Özellikli Şarj Kutusu)" class="swiper-lazy"></figure></div></div><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div><div class="m-p-pc-new__carousel__pagination swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"></div></div><span class="m-p-pc-new__title">Apple AirPods Pro (Magsafe Özellikli Şarj Kutusu)</span><div class="a-rate"><div class="a-rate__star" data-point="5.0"><span class="icon-star-filled"></span><span class="icon-star-filled"></span><span class="icon-star-filled"></span><span class="icon-star-filled"></span><span class="icon-star-filled"></span></div><div class="a-rate__point">5,0 </div></div><div class="m-p-pc-new__badges"><div class="m-p-pc-new__badge" style="background: #E5F8FF">Peşine 3<br> Taksit</div><div class="m-p-pc-new__badge" style="background: #E5F8FF">Alışveriş<br>Kredisi</div><div class="m-p-pc-new__badge" style="background: #FDF7E7">Ücretsiz<br>Kargo</div></div></div><div class="m-p-pc-new__foot"><div class="m-p-pc-new__price m-p-pc-new__price--secondary"> 7.799 <span class="m-p-pc-new__price__cur">TL </span></div></div>
                    <!-- google-analytics --><div id="google-analytics-device-informations" style="display: none;" data-section-title="Cep Telefonu-Aksesuar - Aksesuarlar" data-product-id="1040684" data-product-name="Apple AirPods Pro (Magsafe Özellikli Şarj Kutusu)" data-product-price="7799.0" data-product-brand="Apple" data-position="1" data-dimension21="TRY" data-dimension22="false" data-dimension25="Pesin" data-dimension27="true" data-dimension30="Non-Turkcell" data-dimension156="true" data-dimension157="0" data-dimension167="25" data-dimension168="4" data-dimension169="107" data-dimension170="4.96" data-ribbon_ozel="false" data-ribbon-tlkupon="false" data-ribbon-tukeniyor="false" data-ribbon-firsaturunu="false" data-ribbon-coksatan="false" data-ribbon-gununfirsati="1" data-badge-faturayaektaksitli="false" data-badge-pesinfiyatinataksit="Peşine 3<br> Taksit, 1" data-badge-alisveriskredisi="1" data-badge-faturanlaode="false" data-badge-ucretsizkargo="1" data-badge-hizliteslimat="0" data-badge-magazadanteslim="false" data-badge-anindateslim="false" data-dahili-hafiza="" data-countdown="" data-indirim-tutari="0" data-indirim-orani="0" data-unit-sale-price="7799.0" data-product-category="Cep Telefonu-Aksesuar" data-dimension173="Aksesuarlar" data-dimension174="AirPods"></div>
                    <!-- google-analytics -->
                  </a></div><div><a href="/pasaj/cep-telefonu/cep-telefonu-aksesuarlari/airpods/apple-airpods-3-nesil" class="google-analytics-device device-detail-btn m-p-pc-new" style="" data-product-id="apple-airpods-3-nesil" data-campaign="campaign," data-href="/pasaj/cep-telefonu/cep-telefonu-aksesuarlari/airpods/apple-airpods-3-nesil" data-image-url="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Cihaz/aksesuar/Apple/airpods-3-nesil/cg/1.png"><div class="a-p-card-ribbon a-p-card-ribbon--a a-p-card-ribbon--short " style="background: #5BCC34"> Fibabanka ile 0 Faiz </div><div class="a-fav-button" data-url="/pasaj/user-favorite-operation" data-device-path="/pasaj/cep-telefonu/cep-telefonu-aksesuarlari/airpods/apple-airpods-3-nesil" data-device-id="1040685" data-pm-name="Apple Airpods 3. Nesil (Magsafe Özellikli Şarj Kutusu)"><span class="tooltip tooltipstered" data-alternative="Favoriden Çıkar"><svg class="heart" xmlns="http://www.w3.org/2000/svg" width="36" height="32" viewBox="0 0 36 32"><path fill="#FFC900" fill-rule="nonzero" stroke="#FFC900" class="heart-line" d="M3.058 2.738l-.104.104C-.983 6.779-.985 13.165 2.95 17.1l12.678 12.678c.847.847 2.213.849 3.062 0L31.368 17.1c3.938-3.938 3.938-10.317-.004-14.258l-.104-.104c-3.654-3.654-9.578-3.65-13.237.009l-.614.614c-.137.137-.363.137-.5 0l-.614-.614C12.638-.91 6.709-.913 3.058 2.738zM15.89 4.38c.7.7 1.836.7 2.536 0l.614-.614c3.097-3.097 8.11-3.1 11.201-.009l.104.104c3.379 3.38 3.38 8.846.004 12.221L17.671 28.76c-.285.285-.74.285-1.024 0L3.968 16.08C.596 12.71.598 7.235 3.972 3.86l.104-.104c3.088-3.088 8.106-3.085 11.2.009l.615.614z" transform="translate(-1254 -352) translate(1255 353)"></path><path fill="#ffc900" class="heart-fill" d="M15.994 3.47C12.784.213 7.577.215 4.368 3.47l-.258.262C.48 7.412.48 13.379 4.107 17.056l12.445 12.619c.556.563 1.462.558 2.013 0L31.01 17.056c3.628-3.679 3.629-9.642-.002-13.324l-.26-.263c-3.21-3.255-8.413-3.256-11.625 0l-1.057 1.073c-.28.284-.736.282-1.014 0l-1.058-1.073z" transform="translate(-1254 -352) translate(1239 328) translate(16 25)"></path></svg></span></div><div class="m-p-pc-new__body"><div class="m-p-pc-new__carousel"><div class="swiper-container swiper-container-initialized swiper-container-horizontal"><div class="swiper-wrapper" style="transition-duration: 0ms;"><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Cihaz/aksesuar/Apple/airpods-3-nesil/cg/1/1_250x188.png?17735349480672" alt="Apple Airpods 3. Nesil (Magsafe Özellikli Şarj Kutusu)" class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Cihaz/aksesuar/Apple/airpods-3-nesil/cg/2/2_250x188.png?17735349480672" alt="Apple Airpods 3. Nesil (Magsafe Özellikli Şarj Kutusu)" class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Cihaz/aksesuar/Apple/airpods-3-nesil/cg/3/3_250x188.png?17735349480672" alt="Apple Airpods 3. Nesil (Magsafe Özellikli Şarj Kutusu)" class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Cihaz/aksesuar/Apple/airpods-3-nesil/cg/4/4_250x188.png?17735349480672" alt="Apple Airpods 3. Nesil (Magsafe Özellikli Şarj Kutusu)" class="swiper-lazy"></figure></div></div><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div><div class="m-p-pc-new__carousel__pagination swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"></div></div><span class="m-p-pc-new__title">Apple Airpods 3. Nesil (Magsafe Özellikli Şarj Kutusu)</span><div class="a-rate"><div class="a-rate__star" data-point="4.8"><span class="icon-star-filled"></span><span class="icon-star-filled"></span><span class="icon-star-filled"></span><span class="icon-star-filled"></span><span class="icon-star-half"></span></div><div class="a-rate__point">4,8 </div></div><div class="m-p-pc-new__badges"><div class="m-p-pc-new__badge" style="background: #E5F8FF">Peşine 3<br> Taksit</div><div class="m-p-pc-new__badge" style="background: #E5F8FF">Alışveriş<br>Kredisi</div><div class="m-p-pc-new__badge" style="background: #FDF7E7">Ücretsiz<br>Kargo</div></div></div><div class="m-p-pc-new__foot"><div class="m-p-pc-new__price m-p-pc-new__price--secondary"> 6.195 <span class="m-p-pc-new__price__cur">TL </span></div></div>
                    <!-- google-analytics --><div id="google-analytics-device-informations" style="display: none;" data-section-title="Cep Telefonu-Aksesuar - Aksesuarlar" data-product-id="1040685" data-product-name="Apple Airpods 3. Nesil (Magsafe Özellikli Şarj Kutusu)" data-product-price="6195.0" data-product-brand="Apple" data-position="1" data-dimension21="TRY" data-dimension22="false" data-dimension25="Kontratli" data-dimension27="true" data-dimension30="Non-Turkcell" data-dimension156="true" data-dimension157="8.9" data-dimension167="132" data-dimension168="4" data-dimension169="179" data-dimension170="4.81" data-ribbon_ozel="false" data-ribbon-tlkupon="false" data-ribbon-tukeniyor="false" data-ribbon-firsaturunu="1" data-ribbon-coksatan="false" data-ribbon-gununfirsati="false" data-badge-faturayaektaksitli="false" data-badge-pesinfiyatinataksit="Peşine 3<br> Taksit, 1" data-badge-alisveriskredisi="1" data-badge-faturanlaode="false" data-badge-ucretsizkargo="1" data-badge-hizliteslimat="0" data-badge-magazadanteslim="false" data-badge-anindateslim="false" data-dahili-hafiza="" data-countdown="31.03.2024" data-indirim-tutari="604" data-indirim-orani="8.9" data-unit-sale-price="6195.0" data-product-category="Cep Telefonu-Aksesuar" data-dimension173="Aksesuarlar" data-dimension174="AirPods"></div>
                    <!-- google-analytics -->
                  </a></div></div><div data-analytic-index="6" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item"></div>
            </div>
          </div><div class="o-p-header__dropdown__item" id="40a3f352-9445-40af-a96c-19042264c27b"><ul class="o-p-header__dropdown__list"><li data-analytic-index="0" class=""><a href=""></a></li><li data-analytic-index="1" class="js-has-sublist"><a href="/pasaj/bilgisayar-tablet/masaustu-bilgisayarlar">Masaüstü Bilgisayarlar</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/bilgisayar-tablet/masaustu-bilgisayarlar/all-in-one-bilgisayarlar">All-in-One Bilgisayarlar</a></li><li><a href="/pasaj/bilgisayar-tablet/masaustu-bilgisayarlar/masaustu-bilgisayar">Masaüstü Bilgisayarlar</a></li></ul></li><li data-analytic-index="2" class="js-has-sublist"><a href="/pasaj/bilgisayar-tablet/bilgisayarlar">Dizüstü Bilgisayarlar</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/bilgisayar-tablet/bilgisayarlar/macbook">MacBook</a></li><li><a href="/pasaj/bilgisayar-tablet/bilgisayarlar/laptoplar">Laptoplar</a></li><li><a href="/pasaj/bilgisayar-tablet/bilgisayarlar/oyun-bilgisayari">Oyun Bilgisayarları</a></li></ul></li><li data-analytic-index="3" class="js-has-sublist"><a href="/pasaj/bilgisayar-tablet/tabletler">Tabletler</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/bilgisayar-tablet/tabletler/apple-tabletler">Apple Tabletler</a></li><li><a href="/pasaj/bilgisayar-tablet/tabletler/android-tabletler">Android Tabletler</a></li></ul></li><li data-analytic-index="4" class="js-has-sublist"><a href="/pasaj/bilgisayar-tablet/e-kitap-okuyucu">E-Kitap Okuyucular</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li></ul></li><li data-analytic-index="5" class="js-has-sublist"><a href="/pasaj/bilgisayar-tablet/modem-ve-network-urunleri">Modem &amp; Network Ürünleri</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/bilgisayar-tablet/modem-ve-network-urunleri/modemler">Modemler</a></li><li><a href="/pasaj/bilgisayar-tablet/modem-ve-network-urunleri/network-urunleri">Network Ürünleri</a></li></ul></li><li data-analytic-index="6" class="js-has-sublist"><a href="/pasaj/bilgisayar-tablet/veri-depolama-urunleri">Veri Depolama Ürünleri</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/bilgisayar-tablet/veri-depolama-urunleri/harici-disk">Harici Diskler</a></li><li><a href="/pasaj/bilgisayar-tablet/veri-depolama-urunleri/usb-bellek">USB Bellekler</a></li><li><a href="/pasaj/bilgisayar-tablet/veri-depolama-urunleri/hafiza-karti-urunleri">Hafıza Kartları</a></li></ul></li><li data-analytic-index="7" class="js-has-sublist"><a href="/pasaj/bilgisayar-tablet/yazilim-urunleri">Yazılım Ürünleri</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/bilgisayar-tablet/yazilim-urunleri/office-yazilimlari">Office Yazılımları</a></li><li><a href="/pasaj/bilgisayar-tablet/yazilim-urunleri/antivirus-guvenlik">Antivirüs ve Güvenlik</a></li></ul></li><li data-analytic-index="8" class="js-has-sublist"><a href="/pasaj/bilgisayar-tablet/bilgisayar-bilesenleri-oem">Bilgisayar Parçaları (OEM)</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/bilgisayar-tablet/bilgisayar-bilesenleri-oem/anakart">Anakartlar</a></li><li><a href="/pasaj/bilgisayar-tablet/bilgisayar-bilesenleri-oem/islemci">İşlemciler</a></li><li><a href="/pasaj/bilgisayar-tablet/bilgisayar-bilesenleri-oem/bellek-ram">Bellek (RAM)</a></li><li><a href="/pasaj/bilgisayar-tablet/bilgisayar-bilesenleri-oem/ekran-karti">Ekran Kartları</a></li><li><a href="/pasaj/bilgisayar-tablet/bilgisayar-bilesenleri-oem/ses-karti">Ses Kartları</a></li><li><a href="/pasaj/bilgisayar-tablet/bilgisayar-bilesenleri-oem/ssd-hard-disk">SSD - Hard Diskleri</a></li><li><a href="/pasaj/bilgisayar-tablet/bilgisayar-bilesenleri-oem/kasa">Kasalar</a></li></ul></li><li data-analytic-index="9" class="js-has-sublist"><a href="/pasaj/bilgisayar-tablet/tablet-aksesuarlari">Tablet Aksesuarları</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/bilgisayar-tablet/tablet-aksesuarlari/tablet-kilifi">Tablet Kılıfları</a></li><li><a href="/pasaj/bilgisayar-tablet/tablet-aksesuarlari/tablet-ekran-koruyucu">Tablet Ekran Koruyucular</a></li><li><a href="/pasaj/bilgisayar-tablet/tablet-aksesuarlari/tablet-tutucu">Tablet Tutucular</a></li><li><a href="/pasaj/bilgisayar-tablet/tablet-aksesuarlari/tablet-klavyesi">Tablet Klavyeleri</a></li><li><a href="/pasaj/bilgisayar-tablet/tablet-aksesuarlari/tablet-kalemi">Tablet Kalemleri</a></li></ul></li><li data-analytic-index="10" class="js-has-sublist"><a href="/pasaj/bilgisayar-tablet/bilgisayar-aksesuarlari">Bilgisayar Çevre Birimleri</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/bilgisayar-tablet/bilgisayar-aksesuarlari/monitor">Monitörler</a></li><li><a href="/pasaj/bilgisayar-tablet/bilgisayar-aksesuarlari/klavye">Klavyeler</a></li><li><a href="/pasaj/bilgisayar-tablet/bilgisayar-aksesuarlari/bilgisayar-kulaklik">BiIgisayar Kulaklıkları</a></li><li><a href="/pasaj/bilgisayar-tablet/bilgisayar-aksesuarlari/hoparlor">Hoparlörler</a></li><li><a href="/pasaj/bilgisayar-tablet/bilgisayar-aksesuarlari/mouse">Mouselar</a></li><li><a href="/pasaj/bilgisayar-tablet/bilgisayar-aksesuarlari/mousepad">Mouse Padleri</a></li><li><a href="/pasaj/bilgisayar-tablet/bilgisayar-aksesuarlari/donusturucu">Dönüştürücüler</a></li><li><a href="/pasaj/bilgisayar-tablet/bilgisayar-aksesuarlari/sogutucu-yukseltici">Soğutucu &amp; Yükselticiler</a></li><li><a href="/pasaj/bilgisayar-tablet/bilgisayar-aksesuarlari/webcam">Webcam Ürünleri</a></li><li><a href="/pasaj/bilgisayar-tablet/bilgisayar-aksesuarlari/grafik-tabletler">Grafik Tabletler</a></li><li><a href="/pasaj/bilgisayar-tablet/bilgisayar-aksesuarlari/sunum-kumandasi">Sunum Kumandaları</a></li><li><a href="/pasaj/bilgisayar-tablet/bilgisayar-aksesuarlari/kablolar">Kablolar</a></li><li><a href="/pasaj/bilgisayar-tablet/bilgisayar-aksesuarlari/laptop-cantasi">Laptop Çantaları</a></li><li><a href="/pasaj/bilgisayar-tablet/bilgisayar-aksesuarlari/ups-ve-guc-kaynagi">UPS &amp; Güç Kaynakları</a></li><li><a href="/pasaj/bilgisayar-tablet/bilgisayar-aksesuarlari/3d-yazicilar">3D Yazıcılar</a></li><li><a href="/pasaj/bilgisayar-tablet/bilgisayar-aksesuarlari/yazici">Yazıcılar</a></li><li><a href="/pasaj/bilgisayar-tablet/bilgisayar-aksesuarlari/yazici-sarf-urunleri">Yazıcı Sarf Ürünleri</a></li></ul></li><li><a href="/pasaj/bilgisayar-tablet" class="all">Tüm Bilgisayar-Tablet <i class="icon-p-arrow-down"></i></a></li></ul><div class="o-p-header__dropdown__cards"><div data-analytic-index="0" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item active"><div><a href="/pasaj/bilgisayar-tablet/bilgisayar-aksesuarlari/monitor/oyuncu-monitorleri/asus-tuf-gaming-vg27vqm-kavisli-oyuncu-monitoru" class="google-analytics-device device-detail-btn m-p-pc-new" style="" data-product-id="asus-tuf-gaming-vg27vqm-kavisli-oyuncu-monitoru" data-campaign="campaign," data-href="/pasaj/bilgisayar-tablet/bilgisayar-aksesuarlari/monitor/oyuncu-monitorleri/asus-tuf-gaming-vg27vqm-kavisli-oyuncu-monitoru" data-image-url="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00GKBZ/00GKBZ-1.png"><div class="a-fav-button" data-url="/pasaj/user-favorite-operation" data-device-path="/pasaj/bilgisayar-tablet/bilgisayar-aksesuarlari/monitor/oyuncu-monitorleri/asus-tuf-gaming-vg27vqm-kavisli-oyuncu-monitoru" data-device-id="1097731" data-pm-name="Asus TUF Gaming VG27VQM Kavisli Oyuncu Monitörü "><span class="tooltip tooltipstered" data-alternative="Favoriden Çıkar"><svg class="heart" xmlns="http://www.w3.org/2000/svg" width="36" height="32" viewBox="0 0 36 32"><path fill="#FFC900" fill-rule="nonzero" stroke="#FFC900" class="heart-line" d="M3.058 2.738l-.104.104C-.983 6.779-.985 13.165 2.95 17.1l12.678 12.678c.847.847 2.213.849 3.062 0L31.368 17.1c3.938-3.938 3.938-10.317-.004-14.258l-.104-.104c-3.654-3.654-9.578-3.65-13.237.009l-.614.614c-.137.137-.363.137-.5 0l-.614-.614C12.638-.91 6.709-.913 3.058 2.738zM15.89 4.38c.7.7 1.836.7 2.536 0l.614-.614c3.097-3.097 8.11-3.1 11.201-.009l.104.104c3.379 3.38 3.38 8.846.004 12.221L17.671 28.76c-.285.285-.74.285-1.024 0L3.968 16.08C.596 12.71.598 7.235 3.972 3.86l.104-.104c3.088-3.088 8.106-3.085 11.2.009l.615.614z" transform="translate(-1254 -352) translate(1255 353)"></path><path fill="#ffc900" class="heart-fill" d="M15.994 3.47C12.784.213 7.577.215 4.368 3.47l-.258.262C.48 7.412.48 13.379 4.107 17.056l12.445 12.619c.556.563 1.462.558 2.013 0L31.01 17.056c3.628-3.679 3.629-9.642-.002-13.324l-.26-.263c-3.21-3.255-8.413-3.256-11.625 0l-1.057 1.073c-.28.284-.736.282-1.014 0l-1.058-1.073z" transform="translate(-1254 -352) translate(1239 328) translate(16 25)"></path></svg></span></div><div class="m-p-pc-new__body"><div class="m-p-pc-new__carousel"><div class="swiper-container swiper-container-initialized swiper-container-horizontal"><div class="swiper-wrapper" style="transition-duration: 0ms;"><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00GKBZ/00GKBZ-1/00GKBZ-1_250x188.png?17735349480672" alt="Asus TUF Gaming VG27VQM Kavisli Oyuncu Monitörü " class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00GKBZ/00GKBZ-2/00GKBZ-2_250x188.png?17735349480672" alt="Asus TUF Gaming VG27VQM Kavisli Oyuncu Monitörü " class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00GKBZ/00GKBZ-3/00GKBZ-3_250x188.png?17735349480672" alt="Asus TUF Gaming VG27VQM Kavisli Oyuncu Monitörü " class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00GKBZ/00GKBZ-4/00GKBZ-4_250x188.png?17735349480672" alt="Asus TUF Gaming VG27VQM Kavisli Oyuncu Monitörü " class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00GKBZ/00GKBZ-5/00GKBZ-5_250x188.png?17735349480672" alt="Asus TUF Gaming VG27VQM Kavisli Oyuncu Monitörü " class="swiper-lazy"></figure></div></div><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div><div class="m-p-pc-new__carousel__pagination swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"></div></div><span class="m-p-pc-new__title">Asus TUF Gaming VG27VQM Kavisli Oyuncu Monitörü </span><div class="a-rate__point"></div><div class="m-p-pc-new__badges"><div class="m-p-pc-new__badge" style="background: #00e90a1a">Faturana Ek 36 Taksit</div><div class="m-p-pc-new__badge" style="background: #E5F8FF">Peşine 3<br> Taksit</div><div class="m-p-pc-new__badge" style="background: #FDF7E7">Ücretsiz<br>Kargo</div></div></div><div class="m-p-pc-new__foot"><div class="m-p-pc-new__price m-p-pc-new__price--secondary"> 9.999 <span class="m-p-pc-new__price__cur">TL </span></div></div>
                    <!-- google-analytics --><div id="google-analytics-device-informations" style="display: none;" data-section-title="Bilgisayar-Tablet - " data-product-id="1097731" data-product-name="Asus TUF Gaming VG27VQM Kavisli Oyuncu Monitörü " data-product-price="9999.0" data-product-brand="Asus" data-position="1" data-dimension21="TRY" data-dimension22="false" data-dimension25="Pesin" data-dimension27="true" data-dimension30="Non-Turkcell" data-dimension156="true" data-dimension157="13.8" data-dimension167="14" data-dimension168="6" data-dimension169="0" data-dimension170="0" data-ribbon_ozel="false" data-ribbon-tlkupon="false" data-ribbon-tukeniyor="false" data-ribbon-firsaturunu="false" data-ribbon-coksatan="false" data-ribbon-gununfirsati="false" data-badge-faturayaektaksitli="Faturana Ek 36 Taksit, 1" data-badge-pesinfiyatinataksit="Peşine 3<br> Taksit, 1" data-badge-alisveriskredisi="0" data-badge-faturanlaode="false" data-badge-ucretsizkargo="1" data-badge-hizliteslimat="0" data-badge-magazadanteslim="false" data-badge-anindateslim="false" data-dahili-hafiza="" data-countdown="2024/02/29,20:59:00" data-indirim-tutari="1600" data-indirim-orani="13.8" data-unit-sale-price="9999.0" data-dimension175="Oyuncu Monitörleri" data-product-category="Bilgisayar-Tablet" data-dimension173="Bilgisayar Çevre Birimleri" data-dimension174="Monitörler"></div>
                    <!-- google-analytics -->
                  </a></div><div><a href="/pasaj/bilgisayar-tablet/tabletler/android-tabletler/lenovo-tab-m9-32-gb" class="google-analytics-device device-detail-btn m-p-pc-new" style="" data-product-id="lenovo-tab-m9-32-gb" data-campaign="campaign," data-href="/pasaj/bilgisayar-tablet/tabletler/android-tabletler/lenovo-tab-m9-32-gb" data-image-url="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00GQYL/00GQYL-1.png"><div class="a-p-card-ribbon a-p-card-ribbon--a a-p-card-ribbon--short " style="background: #5BCC34"> Fibabanka ile 0 Faiz </div><div class="a-fav-button" data-url="/pasaj/user-favorite-operation" data-device-path="/pasaj/bilgisayar-tablet/tabletler/android-tabletler/lenovo-tab-m9-32-gb" data-device-id="1100306" data-pm-name="Lenovo TAB M9 32 GB"><span class="tooltip tooltipstered" data-alternative="Favoriden Çıkar"><svg class="heart" xmlns="http://www.w3.org/2000/svg" width="36" height="32" viewBox="0 0 36 32"><path fill="#FFC900" fill-rule="nonzero" stroke="#FFC900" class="heart-line" d="M3.058 2.738l-.104.104C-.983 6.779-.985 13.165 2.95 17.1l12.678 12.678c.847.847 2.213.849 3.062 0L31.368 17.1c3.938-3.938 3.938-10.317-.004-14.258l-.104-.104c-3.654-3.654-9.578-3.65-13.237.009l-.614.614c-.137.137-.363.137-.5 0l-.614-.614C12.638-.91 6.709-.913 3.058 2.738zM15.89 4.38c.7.7 1.836.7 2.536 0l.614-.614c3.097-3.097 8.11-3.1 11.201-.009l.104.104c3.379 3.38 3.38 8.846.004 12.221L17.671 28.76c-.285.285-.74.285-1.024 0L3.968 16.08C.596 12.71.598 7.235 3.972 3.86l.104-.104c3.088-3.088 8.106-3.085 11.2.009l.615.614z" transform="translate(-1254 -352) translate(1255 353)"></path><path fill="#ffc900" class="heart-fill" d="M15.994 3.47C12.784.213 7.577.215 4.368 3.47l-.258.262C.48 7.412.48 13.379 4.107 17.056l12.445 12.619c.556.563 1.462.558 2.013 0L31.01 17.056c3.628-3.679 3.629-9.642-.002-13.324l-.26-.263c-3.21-3.255-8.413-3.256-11.625 0l-1.057 1.073c-.28.284-.736.282-1.014 0l-1.058-1.073z" transform="translate(-1254 -352) translate(1239 328) translate(16 25)"></path></svg></span></div><div class="m-p-pc-new__body"><div class="m-p-pc-new__carousel"><div class="swiper-container swiper-container-initialized swiper-container-horizontal"><div class="swiper-wrapper" style="transition-duration: 0ms;"><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00GQYL/00GQYL-1/00GQYL-1_250x188.png?17735349480672" alt="Lenovo TAB M9 32 GB" class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00GQYL/00GQYL-2/00GQYL-2_250x188.png?17735349480672" alt="Lenovo TAB M9 32 GB" class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00GQYL/00GQYL-3/00GQYL-3_250x188.png?17735349480672" alt="Lenovo TAB M9 32 GB" class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00GQYL/00GQYL-4/00GQYL-4_250x188.png?17735349480672" alt="Lenovo TAB M9 32 GB" class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00GQYL/00GQYL-5/00GQYL-5_250x188.png?17735349480672" alt="Lenovo TAB M9 32 GB" class="swiper-lazy"></figure></div></div><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div><div class="m-p-pc-new__carousel__pagination swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"></div><figure class="m-p-pc-new__promo"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Cihaz/promo/ogrenci_cihaz.png?17735349480672" class="p-lazy"></figure></div><span class="m-p-pc-new__title">Lenovo TAB M9 32 GB</span><div class="a-rate"><div class="a-rate__star" data-point="4.9"><span class="icon-star-filled"></span><span class="icon-star-filled"></span><span class="icon-star-filled"></span><span class="icon-star-filled"></span><span class="icon-star-half"></span></div><div class="a-rate__point">4,9 </div></div><div class="m-p-pc-new__badges"><div class="m-p-pc-new__badge" style="background: #00e90a1a">Faturana Ek 6 Taksit</div><div class="m-p-pc-new__badge" style="background: #E5F8FF">Peşine 3<br> Taksit</div><div class="m-p-pc-new__badge" style="background: #FDF7E7">Ücretsiz<br>Kargo</div></div></div><div class="m-p-pc-new__foot"><div class="m-p-pc-new__price m-p-pc-new__price--secondary"> 2.946 <span class="m-p-pc-new__price__cur">TL </span></div></div>
                    <!-- google-analytics --><div id="google-analytics-device-informations" style="display: none;" data-section-title="Bilgisayar-Tablet - " data-product-id="1100306" data-product-name="Lenovo TAB M9 32 GB" data-product-price="2946.0" data-product-brand="Lenovo" data-position="1" data-dimension21="TRY" data-dimension22="false" data-dimension25="Kontratli" data-dimension27="true" data-dimension30="Non-Turkcell" data-dimension156="true" data-dimension157="26.4" data-dimension167="271" data-dimension168="6" data-dimension169="10" data-dimension170="4.9" data-ribbon_ozel="false" data-ribbon-tlkupon="false" data-ribbon-tukeniyor="false" data-ribbon-firsaturunu="1" data-ribbon-coksatan="false" data-ribbon-gununfirsati="0" data-badge-faturayaektaksitli="Faturana Ek 6 Taksit, 1" data-badge-pesinfiyatinataksit="Peşine 3<br> Taksit, 1" data-badge-alisveriskredisi="0" data-badge-faturanlaode="0" data-badge-ucretsizkargo="1" data-badge-hizliteslimat="0" data-badge-magazadanteslim="false" data-badge-anindateslim="false" data-dahili-hafiza="" data-countdown="2024/02/29,00:00:00" data-indirim-tutari="1054" data-indirim-orani="26.4" data-unit-sale-price="2946.0" data-product-category="Bilgisayar-Tablet" data-dimension173="Tabletler" data-dimension174="Android Tabletler"></div>
                    <!-- google-analytics -->
                  </a></div></div><div data-analytic-index="1" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="2" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="3" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="4" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="5" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="6" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="7" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="8" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="9" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="10" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item"></div></div></div><div class="o-p-header__dropdown__item" id="2cf6b2ed-1c6f-4686-9e27-cda01a613fd8"><ul class="o-p-header__dropdown__list"><li data-analytic-index="0" class=""><a href=""></a></li><li data-analytic-index="1" class="js-has-sublist"><a href="/pasaj/elektrikli-ev-aletleri/utu">Ütüler</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/elektrikli-ev-aletleri/utu/buharli-utu">Buharlı Ütüler</a></li><li><a href="/pasaj/elektrikli-ev-aletleri/utu/buhar-kazanli-utu">Buhar Kazanlı Ütüler</a></li><li><a href="/pasaj/elektrikli-ev-aletleri/utu/utu-masalari">Ütü Masaları</a></li></ul></li><li data-analytic-index="2" class="js-has-sublist"><a href="/pasaj/elektrikli-ev-aletleri/supurge">Süpürgeler</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/elektrikli-ev-aletleri/supurge/robot-supurgeler">Robot Süpürgeler</a></li><li><a href="/pasaj/elektrikli-ev-aletleri/supurge/sarjli-supurgeler">Şarjlı Süpürgeler</a></li><li><a href="/pasaj/elektrikli-ev-aletleri/supurge/dikey-supurgeler">Dikey Süpürgeler</a></li><li><a href="/pasaj/elektrikli-ev-aletleri/supurge/toz-torbasiz-supurgeler">Toz Torbasız Süpürgeler</a></li><li><a href="/pasaj/elektrikli-ev-aletleri/supurge/toz-torbali-supurgeler">Toz Torbalı Süpürgeler</a></li></ul></li><li data-analytic-index="3" class="js-has-sublist"><a href="/pasaj/elektrikli-ev-aletleri/elektrikli-mutfak-aletleri">Elektrikli Mutfak Aletleri</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/elektrikli-ev-aletleri/elektrikli-mutfak-aletleri/airfryer-ve-fritozler">Airfryer &amp; Fritözler</a></li><li><a href="/pasaj/elektrikli-ev-aletleri/elektrikli-mutfak-aletleri/mutfak-robotu">Mutfak Robotları</a></li><li><a href="/pasaj/elektrikli-ev-aletleri/elektrikli-mutfak-aletleri/blender-mikser">Blender &amp; Mikserler</a></li><li><a href="/pasaj/elektrikli-ev-aletleri/elektrikli-mutfak-aletleri/kahve-makinesi">Kahve Makineleri</a></li><li><a href="/pasaj/elektrikli-ev-aletleri/elektrikli-mutfak-aletleri/kahve-cesitleri">Kahve Çeşitleri</a></li><li><a href="/pasaj/elektrikli-ev-aletleri/elektrikli-mutfak-aletleri/cay-makinesi">Çay Makineleri</a></li><li><a href="/pasaj/elektrikli-ev-aletleri/elektrikli-mutfak-aletleri/tost-makinesi">Tost Makineleri</a></li><li><a href="/pasaj/elektrikli-ev-aletleri/elektrikli-mutfak-aletleri/ekmek-yapma-makineleri">Ekmek Yapma Makineleri</a></li><li><a href="/pasaj/elektrikli-ev-aletleri/elektrikli-mutfak-aletleri/ekmek-kizartma-makinesi">Ekmek Kızartma Makineleri</a></li><li><a href="/pasaj/elektrikli-ev-aletleri/elektrikli-mutfak-aletleri/meyve-sikacagi">Meyve Sıkacakları</a></li><li><a href="/pasaj/elektrikli-ev-aletleri/elektrikli-mutfak-aletleri/pisirici">Pişiriciler</a></li><li><a href="/pasaj/elektrikli-ev-aletleri/elektrikli-mutfak-aletleri/su-isiticisi">Su Isıtıcıları</a></li><li><a href="/pasaj/elektrikli-ev-aletleri/elektrikli-mutfak-aletleri/su-aritma-cihazi">Su Arıtma Cihazları</a></li><li><a href="/pasaj/elektrikli-ev-aletleri/elektrikli-mutfak-aletleri/teknolojik-mutfak-aletleri">Teknolojik Mutfak Aletleri</a></li></ul></li><li data-analytic-index="4" class="js-has-sublist"><a href="/pasaj/elektrikli-ev-aletleri/mutfak-gerecleri">Mutfak Gereçleri</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/elektrikli-ev-aletleri/mutfak-gerecleri/tava-tencere-duduklu-tencere">Tava &amp; Tencere &amp; Düdüklü Tencere</a></li><li><a href="/pasaj/elektrikli-ev-aletleri/mutfak-gerecleri/yemek-kahvalti-takimlari">Yemek &amp; Kahvaltı Takımları</a></li><li><a href="/pasaj/elektrikli-ev-aletleri/mutfak-gerecleri/catal-kasik-bicak-takimlari">Çatal &amp; Kaşık &amp; Bıçak Takımları</a></li><li><a href="/pasaj/elektrikli-ev-aletleri/mutfak-gerecleri/yemek-hazirlik-gerecleri">Yemek Hazırlık Gereçleri</a></li><li><a href="/pasaj/elektrikli-ev-aletleri/mutfak-gerecleri/saklama-duzenleme-kaplari">Saklama &amp; Düzenleme Kapları</a></li><li><a href="/pasaj/elektrikli-ev-aletleri/mutfak-gerecleri/caydanlik">Çaydanlık</a></li></ul></li><li data-analytic-index="5" class="js-has-sublist"><a href="/pasaj/elektrikli-ev-aletleri/saglikli-yasam-urunleri">Sağlıklı Yaşam Ürünleri</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li></ul></li><li data-analytic-index="6" class="js-has-sublist"><a href="/pasaj/elektrikli-ev-aletleri/yapi-aletleri">Yapı Aletleri</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li></ul></li><li data-analytic-index="7" class="js-has-sublist"><a href="/pasaj/elektrikli-ev-aletleri/hava-temizleme-cihazi">Hava Temizleme Cihazları</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li></ul></li><li data-analytic-index="8" class="js-has-sublist"><a href="/pasaj/elektrikli-ev-aletleri/dikis-makineleri">Dikiş Makineleri</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li></ul></li><li><a href="/pasaj/elektrikli-ev-aletleri" class="all">Tüm Elektrikli Ev Aletleri <i class="icon-p-arrow-down"></i></a></li></ul><div class="o-p-header__dropdown__cards"><div data-analytic-index="0" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item active"><div><a href="/pasaj/elektrikli-ev-aletleri/supurge/dikey-supurgeler/dyson-v10-absolute" class="google-analytics-device device-detail-btn m-p-pc-new" style="" data-product-id="dyson-v10-absolute" data-campaign="campaign,discount," data-href="/pasaj/elektrikli-ev-aletleri/supurge/dikey-supurgeler/dyson-v10-absolute" data-image-url="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/1654678254219/1-1654678230338.png"><div class="a-p-card-ribbon a-p-card-ribbon--a a-p-card-ribbon--short " style="background: #00BAFC"> Günün Fırsatları </div><div class="a-fav-button" data-url="/pasaj/user-favorite-operation" data-device-path="/pasaj/elektrikli-ev-aletleri/supurge/dikey-supurgeler/dyson-v10-absolute" data-device-id="1041494" data-pm-name="Dyson V10 Absolute Elektrikli Süpürge"><span class="tooltip tooltipstered" data-alternative="Favoriden Çıkar"><svg class="heart" xmlns="http://www.w3.org/2000/svg" width="36" height="32" viewBox="0 0 36 32"><path fill="#FFC900" fill-rule="nonzero" stroke="#FFC900" class="heart-line" d="M3.058 2.738l-.104.104C-.983 6.779-.985 13.165 2.95 17.1l12.678 12.678c.847.847 2.213.849 3.062 0L31.368 17.1c3.938-3.938 3.938-10.317-.004-14.258l-.104-.104c-3.654-3.654-9.578-3.65-13.237.009l-.614.614c-.137.137-.363.137-.5 0l-.614-.614C12.638-.91 6.709-.913 3.058 2.738zM15.89 4.38c.7.7 1.836.7 2.536 0l.614-.614c3.097-3.097 8.11-3.1 11.201-.009l.104.104c3.379 3.38 3.38 8.846.004 12.221L17.671 28.76c-.285.285-.74.285-1.024 0L3.968 16.08C.596 12.71.598 7.235 3.972 3.86l.104-.104c3.088-3.088 8.106-3.085 11.2.009l.615.614z" transform="translate(-1254 -352) translate(1255 353)"></path><path fill="#ffc900" class="heart-fill" d="M15.994 3.47C12.784.213 7.577.215 4.368 3.47l-.258.262C.48 7.412.48 13.379 4.107 17.056l12.445 12.619c.556.563 1.462.558 2.013 0L31.01 17.056c3.628-3.679 3.629-9.642-.002-13.324l-.26-.263c-3.21-3.255-8.413-3.256-11.625 0l-1.057 1.073c-.28.284-.736.282-1.014 0l-1.058-1.073z" transform="translate(-1254 -352) translate(1239 328) translate(16 25)"></path></svg></span></div><div class="m-p-pc-new__body"><div class="m-p-pc-new__carousel"><div class="swiper-container swiper-container-initialized swiper-container-horizontal"><div class="swiper-wrapper" style="transition-duration: 0ms;"><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/1654678254219/1-1654678230338/1-1654678230338_250x188.png?17735349480672" alt="Dyson V10 Absolute Elektrikli Süpürge" class="swiper-lazy"></figure></div></div><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div><div class="m-p-pc-new__carousel__pagination swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"></div></div><span class="m-p-pc-new__title">Dyson V10 Absolute Elektrikli Süpürge</span><div class="a-rate"><div class="a-rate__star" data-point="5.0"><span class="icon-star-filled"></span><span class="icon-star-filled"></span><span class="icon-star-filled"></span><span class="icon-star-filled"></span><span class="icon-star-filled"></span></div><div class="a-rate__point">5,0 </div></div><div class="m-p-pc-new__badges"><div class="m-p-pc-new__badge" style="background: #00e90a1a">Alışveriş<br>Kredisi</div><div class="m-p-pc-new__badge" style="background: #E5F8FF">Peşine 3<br> Taksit</div><div class="m-p-pc-new__badge" style="background: #FDF7E7">Ücretsiz<br>Kargo</div></div></div><div class="m-p-pc-new__foot"><div class="m-p-pc-new__price m-p-pc-new__price--secondary"><div class="m-p-pc-new__price">18.999 <span class="m-p-pc-new__price__cur">TL</span></div><div class="m-p-pc-new__price m-p-pc-new__price--box"><div class="m-p-pc-new__price--old">19.499 <span class="m-p-pc-new__price__cur">TL <span class="m-p-pc-new__price__cur__discount">500 TL İndirim</span></span></div></div><div class="m-p-pc-new__lowest-price">Son 30 günün en düşük fiyatı</div></div></div>
                    <!-- google-analytics --><div id="google-analytics-device-informations" style="display: none;" data-section-title="Elektrikli Ev Aletleri - " data-product-id="1041494" data-product-name="Dyson V10 Absolute Elektrikli Süpürge" data-product-price="18999.0" data-product-brand="Dyson" data-position="1" data-dimension21="TRY" data-dimension22="true" data-dimension25="Kontratli" data-dimension27="true" data-dimension30="Non-Turkcell" data-dimension156="true" data-dimension157="2.6" data-dimension167="10" data-dimension168="1" data-dimension169="20" data-dimension170="4.95" data-ribbon_ozel="false" data-ribbon-tlkupon="false" data-ribbon-tukeniyor="false" data-ribbon-firsaturunu="false" data-ribbon-coksatan="false" data-ribbon-gununfirsati="1" data-badge-faturayaektaksitli="1" data-badge-pesinfiyatinataksit="Peşine 3<br> Taksit, 1" data-badge-alisveriskredisi="false" data-badge-faturanlaode="false" data-badge-ucretsizkargo="1" data-badge-hizliteslimat="0" data-badge-magazadanteslim="false" data-badge-anindateslim="false" data-dahili-hafiza="" data-countdown="2024/02/29,20:59:00" data-indirim-tutari="500" data-indirim-orani="2.6" data-unit-sale-price="18999.0" data-product-category="Elektrikli Ev Aletleri" data-dimension173="Süpürgeler" data-dimension174="Dikey Süpürgeler"></div>
                    <!-- google-analytics -->
                  </a></div><div><a href="/pasaj/elektrikli-ev-aletleri/elektrikli-mutfak-aletleri/airfryer-ve-fritozler/philips-hd9650-90-avance-collection-airfryer" class="google-analytics-device device-detail-btn m-p-pc-new" style="" data-product-id="philips-hd9650-90-avance-collection-airfryer" data-campaign="campaign," data-href="/pasaj/elektrikli-ev-aletleri/elektrikli-mutfak-aletleri/airfryer-ve-fritozler/philips-hd9650-90-avance-collection-airfryer" data-image-url="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Cihaz/aksesuar/philips/hd9650-90-avance-collection-airfryer/cg/1.png"><div class="a-p-card-ribbon a-p-card-ribbon--a a-p-card-ribbon--short " style="background: #00BAFC"> Günün Fırsatları </div><div class="a-fav-button" data-url="/pasaj/user-favorite-operation" data-device-path="/pasaj/elektrikli-ev-aletleri/elektrikli-mutfak-aletleri/airfryer-ve-fritozler/philips-hd9650-90-avance-collection-airfryer" data-device-id="1044821" data-pm-name="Philips HD9650/90 XXL Avance Collection Airfryer Fritöz"><span class="tooltip tooltipstered" data-alternative="Favoriden Çıkar"><svg class="heart" xmlns="http://www.w3.org/2000/svg" width="36" height="32" viewBox="0 0 36 32"><path fill="#FFC900" fill-rule="nonzero" stroke="#FFC900" class="heart-line" d="M3.058 2.738l-.104.104C-.983 6.779-.985 13.165 2.95 17.1l12.678 12.678c.847.847 2.213.849 3.062 0L31.368 17.1c3.938-3.938 3.938-10.317-.004-14.258l-.104-.104c-3.654-3.654-9.578-3.65-13.237.009l-.614.614c-.137.137-.363.137-.5 0l-.614-.614C12.638-.91 6.709-.913 3.058 2.738zM15.89 4.38c.7.7 1.836.7 2.536 0l.614-.614c3.097-3.097 8.11-3.1 11.201-.009l.104.104c3.379 3.38 3.38 8.846.004 12.221L17.671 28.76c-.285.285-.74.285-1.024 0L3.968 16.08C.596 12.71.598 7.235 3.972 3.86l.104-.104c3.088-3.088 8.106-3.085 11.2.009l.615.614z" transform="translate(-1254 -352) translate(1255 353)"></path><path fill="#ffc900" class="heart-fill" d="M15.994 3.47C12.784.213 7.577.215 4.368 3.47l-.258.262C.48 7.412.48 13.379 4.107 17.056l12.445 12.619c.556.563 1.462.558 2.013 0L31.01 17.056c3.628-3.679 3.629-9.642-.002-13.324l-.26-.263c-3.21-3.255-8.413-3.256-11.625 0l-1.057 1.073c-.28.284-.736.282-1.014 0l-1.058-1.073z" transform="translate(-1254 -352) translate(1239 328) translate(16 25)"></path></svg></span></div><div class="m-p-pc-new__body"><div class="m-p-pc-new__carousel"><div class="swiper-container swiper-container-initialized swiper-container-horizontal"><div class="swiper-wrapper" style="transition-duration: 0ms;"><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Cihaz/aksesuar/philips/hd9650-90-avance-collection-airfryer/cg/1/1_250x188.png?17735349480672" alt="Philips HD9650/90 XXL Avance Collection Airfryer Fritöz" class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Cihaz/aksesuar/philips/hd9650-90-avance-collection-airfryer/cg/2/2_250x188.png?17735349480672" alt="Philips HD9650/90 XXL Avance Collection Airfryer Fritöz" class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Cihaz/aksesuar/philips/hd9650-90-avance-collection-airfryer/cg/3/3_250x188.png?17735349480672" alt="Philips HD9650/90 XXL Avance Collection Airfryer Fritöz" class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Cihaz/aksesuar/philips/hd9650-90-avance-collection-airfryer/cg/4/4_250x188.png?17735349480672" alt="Philips HD9650/90 XXL Avance Collection Airfryer Fritöz" class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Cihaz/aksesuar/philips/hd9650-90-avance-collection-airfryer/cg/5/5_250x188.png?17735349480672" alt="Philips HD9650/90 XXL Avance Collection Airfryer Fritöz" class="swiper-lazy"></figure></div></div><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div><div class="m-p-pc-new__carousel__pagination swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"></div></div><span class="m-p-pc-new__title">Philips HD9650/90 XXL Avance Collection Airfryer Fritöz</span><div class="a-rate"><div class="a-rate__star" data-point="5.0"><span class="icon-star-filled"></span><span class="icon-star-filled"></span><span class="icon-star-filled"></span><span class="icon-star-filled"></span><span class="icon-star-filled"></span></div><div class="a-rate__point">5,0 </div></div><div class="m-p-pc-new__badges"><div class="m-p-pc-new__badge" style="background: #00e90a1a">Faturana Ek 36 Taksit</div><div class="m-p-pc-new__badge" style="background: #E5F8FF">Peşine 3<br> Taksit</div><div class="m-p-pc-new__badge" style="background: #FDF7E7">Ücretsiz<br>Kargo</div></div></div><div class="m-p-pc-new__foot"><div class="m-p-pc-new__price m-p-pc-new__price--secondary"> 6.739 <span class="m-p-pc-new__price__cur">TL </span></div></div>
                    <!-- google-analytics --><div id="google-analytics-device-informations" style="display: none;" data-section-title="Elektrikli Ev Aletleri - " data-product-id="1044821" data-product-name="Philips HD9650/90 XXL Avance Collection Airfryer Fritöz" data-product-price="6739.0" data-product-brand="Philips" data-position="1" data-dimension21="TRY" data-dimension22="false" data-dimension25="Pesin" data-dimension27="true" data-dimension30="Non-Turkcell" data-dimension156="true" data-dimension157="11.3" data-dimension167="129" data-dimension168="6" data-dimension169="40" data-dimension170="4.98" data-ribbon_ozel="false" data-ribbon-tlkupon="false" data-ribbon-tukeniyor="false" data-ribbon-firsaturunu="false" data-ribbon-coksatan="false" data-ribbon-gununfirsati="1" data-badge-faturayaektaksitli="Faturana Ek 36 Taksit, 1" data-badge-pesinfiyatinataksit="Peşine 3<br> Taksit, 1" data-badge-alisveriskredisi="0" data-badge-faturanlaode="false" data-badge-ucretsizkargo="1" data-badge-hizliteslimat="0" data-badge-magazadanteslim="false" data-badge-anindateslim="false" data-dahili-hafiza="" data-countdown="2024/02/29,20:59:00" data-indirim-tutari="861" data-indirim-orani="11.3" data-unit-sale-price="6739.0" data-product-category="Elektrikli Ev Aletleri" data-dimension173="Elektrikli Mutfak Aletleri" data-dimension174="Airfryer &amp; Fritözler"></div>
                    <!-- google-analytics -->
                  </a></div></div><div data-analytic-index="1" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="2" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="3" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="4" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="5" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="6" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="7" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="8" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item"></div></div></div><div class="o-p-header__dropdown__item" id="5aeade97-2152-4e61-bc1c-2bc6cd95015d"><ul class="o-p-header__dropdown__list"><li data-analytic-index="0" class=""><a href=""></a></li><li data-analytic-index="1" class="js-has-sublist"><a href="/pasaj/beyaz-esya/buzdolaplari">Buzdolapları</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/beyaz-esya/buzdolaplari/mini-buzdolaplar">Mini Buzdolaplar</a></li><li><a href="/pasaj/beyaz-esya/buzdolaplari/no-frost-buzdolaplari">No-Frost Buzdolapları</a></li></ul></li><li data-analytic-index="2" class="js-has-sublist"><a href="/pasaj/beyaz-esya/camasir-makineleri">Çamaşır Makineleri</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/beyaz-esya/camasir-makineleri/kurutmali-camasir-makineleri">Kurutmalı Çamaşır Makineleri</a></li></ul></li><li data-analytic-index="3" class="js-has-sublist"><a href="/pasaj/beyaz-esya/bulasik-makineleri">Bulaşık Makineleri</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/beyaz-esya/bulasik-makineleri/ankastre-bulasik-makinesi">Ankastre Bulaşık Makineleri</a></li></ul></li><li data-analytic-index="4" class="js-has-sublist"><a href="/pasaj/beyaz-esya/kurutma-makineleri">Kurutma Makineleri</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li></ul></li><li data-analytic-index="5" class="js-has-sublist"><a href="/pasaj/beyaz-esya/firinlar">Fırınlar</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/beyaz-esya/firinlar/ankastre-firinlar">Ankastre Fırınlar</a></li><li><a href="/pasaj/beyaz-esya/firinlar/ocakli-firinlar">Ocaklı Fırınlar</a></li><li><a href="/pasaj/beyaz-esya/firinlar/mini-firinlar">Mini Fırınlar</a></li></ul></li><li data-analytic-index="6" class="js-has-sublist"><a href="/pasaj/beyaz-esya/mikrodalga-firinlar">Mikrodalga Fırınlar</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/beyaz-esya/mikrodalga-firinlar/ankastre-mikrodalga-firin">Ankastre Mikrodalga Fırınlar</a></li></ul></li><li data-analytic-index="7" class="js-has-sublist"><a href="/pasaj/beyaz-esya/derin-dondurucular">Derin Dondurucular</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/beyaz-esya/derin-dondurucular/no-frost-derin-dondurucular">No-frost Derin Dondurucular</a></li></ul></li><li data-analytic-index="8" class="js-has-sublist"><a href="/pasaj/beyaz-esya/ankastre-setler">Ankastre Setler</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/beyaz-esya/ankastre-setler/ankastre-bulasik-makineleri">Ankastre Bulaşık Makineleri</a></li><li><a href="/pasaj/beyaz-esya/ankastre-setler/ankastre-firin">Ankastre Fırınlar</a></li><li><a href="/pasaj/beyaz-esya/ankastre-setler/ankastre-mikrodalga-firinlar">Ankastre Mikrodalga Fırınlar</a></li><li><a href="/pasaj/beyaz-esya/ankastre-setler/ankastre-ocaklar">Ankastre Ocaklar</a></li></ul></li><li data-analytic-index="9" class="js-has-sublist"><a href="/pasaj/beyaz-esya/ocak-ve-set-ustu-ocaklar">Ocak &amp; Set Üstü Ocaklar</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/beyaz-esya/ocak-ve-set-ustu-ocaklar/ankastre-ocak">Ankastre Ocaklar</a></li></ul></li><li data-analytic-index="10" class="js-has-sublist"><a href="/pasaj/beyaz-esya/davlumbazlar">Davlumbazlar</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li></ul></li><li data-analytic-index="11" class="js-has-sublist"><a href="/pasaj/beyaz-esya/su-sebilleri">Su Sebilleri</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li></ul></li><li data-analytic-index="12" class="js-has-sublist"><a href="/pasaj/beyaz-esya/isitma-ve-sogutma-sistemleri">Isıtma ve Soğutma Sistemleri</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/beyaz-esya/isitma-ve-sogutma-sistemleri/klima-urunleri">Klimalar</a></li><li><a href="/pasaj/beyaz-esya/isitma-ve-sogutma-sistemleri/vantilator">Vantilatörler</a></li><li><a href="/pasaj/beyaz-esya/isitma-ve-sogutma-sistemleri/termosifonlar">Termosifonlar</a></li><li><a href="/pasaj/beyaz-esya/isitma-ve-sogutma-sistemleri/radyatorler">Radyatörler</a></li></ul></li><li><a href="/pasaj/beyaz-esya" class="all">Tüm Beyaz Eşya <i class="icon-p-arrow-down"></i></a></li></ul><div class="o-p-header__dropdown__cards"><div data-analytic-index="0" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item active"><div><a href="/pasaj/beyaz-esya/buzdolaplari/no-frost-buzdolaplari/samsung-rb50rs334sa-kombi-no-frost-buzdolabi" class="google-analytics-device device-detail-btn m-p-pc-new" style="" data-product-id="samsung-rb50rs334sa-kombi-no-frost-buzdolabi" data-campaign="campaign,discount," data-href="/pasaj/beyaz-esya/buzdolaplari/no-frost-buzdolaplari/samsung-rb50rs334sa-kombi-no-frost-buzdolabi" data-image-url="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Cihaz/aksesuar/Samsung/rb50rs334sa-kombi-no-frost-buzdolabi/cg/1.png"><div class="a-fav-button" data-url="/pasaj/user-favorite-operation" data-device-path="/pasaj/beyaz-esya/buzdolaplari/no-frost-buzdolaplari/samsung-rb50rs334sa-kombi-no-frost-buzdolabi" data-device-id="1040443" data-pm-name="Samsung RB50RS334SA Kombi No Frost Buzdolabı"><span class="tooltip tooltipstered" data-alternative="Favoriden Çıkar"><svg class="heart" xmlns="http://www.w3.org/2000/svg" width="36" height="32" viewBox="0 0 36 32"><path fill="#FFC900" fill-rule="nonzero" stroke="#FFC900" class="heart-line" d="M3.058 2.738l-.104.104C-.983 6.779-.985 13.165 2.95 17.1l12.678 12.678c.847.847 2.213.849 3.062 0L31.368 17.1c3.938-3.938 3.938-10.317-.004-14.258l-.104-.104c-3.654-3.654-9.578-3.65-13.237.009l-.614.614c-.137.137-.363.137-.5 0l-.614-.614C12.638-.91 6.709-.913 3.058 2.738zM15.89 4.38c.7.7 1.836.7 2.536 0l.614-.614c3.097-3.097 8.11-3.1 11.201-.009l.104.104c3.379 3.38 3.38 8.846.004 12.221L17.671 28.76c-.285.285-.74.285-1.024 0L3.968 16.08C.596 12.71.598 7.235 3.972 3.86l.104-.104c3.088-3.088 8.106-3.085 11.2.009l.615.614z" transform="translate(-1254 -352) translate(1255 353)"></path><path fill="#ffc900" class="heart-fill" d="M15.994 3.47C12.784.213 7.577.215 4.368 3.47l-.258.262C.48 7.412.48 13.379 4.107 17.056l12.445 12.619c.556.563 1.462.558 2.013 0L31.01 17.056c3.628-3.679 3.629-9.642-.002-13.324l-.26-.263c-3.21-3.255-8.413-3.256-11.625 0l-1.057 1.073c-.28.284-.736.282-1.014 0l-1.058-1.073z" transform="translate(-1254 -352) translate(1239 328) translate(16 25)"></path></svg></span></div><div class="m-p-pc-new__body"><div class="m-p-pc-new__carousel"><div class="swiper-container swiper-container-initialized swiper-container-horizontal"><div class="swiper-wrapper" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);"><div class="swiper-slide swiper-slide-active" style="width: 248px; margin-right: 10px;"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Cihaz/aksesuar/Samsung/rb50rs334sa-kombi-no-frost-buzdolabi/cg/1/1_250x188.png?17735349480672" alt="Samsung RB50RS334SA Kombi No Frost Buzdolabı" class="swiper-lazy swiper-lazy-loaded"></figure></div></div><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div><div class="m-p-pc-new__carousel__pagination swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-lock"><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1"></span></div></div><span class="m-p-pc-new__title">Samsung RB50RS334SA Kombi No Frost Buzdolabı</span><div class="a-rate__point"></div><div class="m-p-pc-new__badges"><div class="m-p-pc-new__badge" style="background: #E5F8FF">Peşine 3<br> Taksit</div><div class="m-p-pc-new__badge" style="background: #E5F8FF">Alışveriş<br>Kredisi</div><div class="m-p-pc-new__badge" style="background: #FDF7E7">Ücretsiz<br>Kargo</div></div></div><div class="m-p-pc-new__foot"><div class="m-p-pc-new__price m-p-pc-new__price--secondary"><div class="m-p-pc-new__price">35.499 <span class="m-p-pc-new__price__cur">TL</span></div><div class="m-p-pc-new__price m-p-pc-new__price--box"><div class="m-p-pc-new__price--old">38.599 <span class="m-p-pc-new__price__cur">TL <span class="m-p-pc-new__price__cur__discount">3.100 TL İndirim</span></span></div></div><div class="m-p-pc-new__lowest-price">Son 30 günün en düşük fiyatı</div></div></div>
                    <!-- google-analytics --><div id="google-analytics-device-informations" style="display: none;" data-section-title="Beyaz Eşya - " data-product-id="1040443" data-product-name="Samsung RB50RS334SA Kombi No Frost Buzdolabı" data-product-price="35499.0" data-product-brand="Samsung" data-position="1" data-dimension21="TRY" data-dimension22="true" data-dimension25="Pesin" data-dimension27="true" data-dimension30="Non-Turkcell" data-dimension156="true" data-dimension157="8" data-dimension167="10" data-dimension168="1" data-dimension169="0" data-dimension170="0" data-ribbon_ozel="false" data-ribbon-tlkupon="false" data-ribbon-tukeniyor="false" data-ribbon-firsaturunu="false" data-ribbon-coksatan="false" data-ribbon-gununfirsati="false" data-badge-faturayaektaksitli="false" data-badge-pesinfiyatinataksit="Peşine 3<br> Taksit, 1" data-badge-alisveriskredisi="1" data-badge-faturanlaode="false" data-badge-ucretsizkargo="1" data-badge-hizliteslimat="0" data-badge-magazadanteslim="false" data-badge-anindateslim="false" data-dahili-hafiza="" data-countdown="2024/03/01,00:00:00" data-indirim-tutari="3100" data-indirim-orani="8" data-unit-sale-price="35499.0" data-product-category="Beyaz Eşya" data-dimension173="Buzdolapları" data-dimension174="No-Frost Buzdolapları"></div>
                    <!-- google-analytics -->
                  </a></div><div><a href="/pasaj/beyaz-esya/camasir-makineleri/profilo-cmu12t91tr-1200-devir-9-kg-camasir-makinesi" class="google-analytics-device device-detail-btn m-p-pc-new" style="" data-product-id="profilo-cmu12t91tr-1200-devir-9-kg-camasir-makinesi" data-campaign="campaign,discount," data-href="/pasaj/beyaz-esya/camasir-makineleri/profilo-cmu12t91tr-1200-devir-9-kg-camasir-makinesi" data-image-url="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00ARCS/00ARCS-1.png"><div class="a-p-card-ribbon a-p-card-ribbon--a a-p-card-ribbon--short " style="background: #FF3D71"> Tükeniyor </div><div class="a-fav-button" data-url="/pasaj/user-favorite-operation" data-device-path="/pasaj/beyaz-esya/camasir-makineleri/profilo-cmu12t91tr-1200-devir-9-kg-camasir-makinesi" data-device-id="1048139" data-pm-name="Profilo CMU12T91TR 1200 Devir 9 Kg Çamaşır Makinesi"><span class="tooltip tooltipstered" data-alternative="Favoriden Çıkar"><svg class="heart" xmlns="http://www.w3.org/2000/svg" width="36" height="32" viewBox="0 0 36 32"><path fill="#FFC900" fill-rule="nonzero" stroke="#FFC900" class="heart-line" d="M3.058 2.738l-.104.104C-.983 6.779-.985 13.165 2.95 17.1l12.678 12.678c.847.847 2.213.849 3.062 0L31.368 17.1c3.938-3.938 3.938-10.317-.004-14.258l-.104-.104c-3.654-3.654-9.578-3.65-13.237.009l-.614.614c-.137.137-.363.137-.5 0l-.614-.614C12.638-.91 6.709-.913 3.058 2.738zM15.89 4.38c.7.7 1.836.7 2.536 0l.614-.614c3.097-3.097 8.11-3.1 11.201-.009l.104.104c3.379 3.38 3.38 8.846.004 12.221L17.671 28.76c-.285.285-.74.285-1.024 0L3.968 16.08C.596 12.71.598 7.235 3.972 3.86l.104-.104c3.088-3.088 8.106-3.085 11.2.009l.615.614z" transform="translate(-1254 -352) translate(1255 353)"></path><path fill="#ffc900" class="heart-fill" d="M15.994 3.47C12.784.213 7.577.215 4.368 3.47l-.258.262C.48 7.412.48 13.379 4.107 17.056l12.445 12.619c.556.563 1.462.558 2.013 0L31.01 17.056c3.628-3.679 3.629-9.642-.002-13.324l-.26-.263c-3.21-3.255-8.413-3.256-11.625 0l-1.057 1.073c-.28.284-.736.282-1.014 0l-1.058-1.073z" transform="translate(-1254 -352) translate(1239 328) translate(16 25)"></path></svg></span></div><div class="m-p-pc-new__body"><div class="m-p-pc-new__carousel"><div class="swiper-container swiper-container-initialized swiper-container-horizontal"><div class="swiper-wrapper" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);"><div class="swiper-slide swiper-slide-active" style="width: 248px; margin-right: 10px;"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00ARCS/00ARCS-1/00ARCS-1_250x188.png?17735349480672" alt="Profilo CMU12T91TR 1200 Devir 9 Kg Çamaşır Makinesi" class="swiper-lazy swiper-lazy-loaded"></figure></div><div class="swiper-slide swiper-slide-next" style="width: 248px; margin-right: 10px;"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00ARCS/2-1646736792615/2-1646736792615_250x188.png?17735349480672" alt="Profilo CMU12T91TR 1200 Devir 9 Kg Çamaşır Makinesi" class="swiper-lazy"></figure></div></div><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div><div class="m-p-pc-new__carousel__pagination swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span></div></div><span class="m-p-pc-new__title">Profilo CMU12T91TR 1200 Devir 9 Kg Çamaşır Makinesi</span><div class="a-rate__point"></div><div class="m-p-pc-new__badges"><div class="m-p-pc-new__badge" style="background: #E5F8FF">Peşine 3<br> Taksit</div><div class="m-p-pc-new__badge" style="background: #E5F8FF">Alışveriş<br>Kredisi</div><div class="m-p-pc-new__badge" style="background: #FDF7E7">Ücretsiz<br>Kargo</div></div></div><div class="m-p-pc-new__foot"><div class="m-p-pc-new__price m-p-pc-new__price--secondary"> 23.499 <span class="m-p-pc-new__price__cur">TL </span></div></div>
                    <!-- google-analytics --><div id="google-analytics-device-informations" style="display: none;" data-section-title="Beyaz Eşya - " data-product-id="1048139" data-product-name="Profilo CMU12T91TR 1200 Devir 9 Kg Çamaşır Makinesi" data-product-price="23499.0" data-product-brand="Profilo" data-position="1" data-dimension21="TRY" data-dimension22="true" data-dimension25="Pesin" data-dimension27="true" data-dimension30="Non-Turkcell" data-dimension156="true" data-dimension157="0.4" data-dimension167="2" data-dimension168="2" data-dimension169="0" data-dimension170="0" data-ribbon_ozel="false" data-ribbon-tlkupon="false" data-ribbon-tukeniyor="1" data-ribbon-firsaturunu="false" data-ribbon-coksatan="false" data-ribbon-gununfirsati="false" data-badge-faturayaektaksitli="false" data-badge-pesinfiyatinataksit="Peşine 3<br> Taksit, 1" data-badge-alisveriskredisi="1" data-badge-faturanlaode="false" data-badge-ucretsizkargo="1" data-badge-hizliteslimat="0" data-badge-magazadanteslim="false" data-badge-anindateslim="false" data-dahili-hafiza="" data-countdown="12.12.2030" data-indirim-tutari="100" data-indirim-orani="0.4" data-unit-sale-price="23499.0" data-product-category="Beyaz Eşya" data-dimension173="Çamaşır Makineleri"></div>
                    <!-- google-analytics -->
                  </a></div></div><div data-analytic-index="1" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item"><div><a href="/pasaj/beyaz-esya/buzdolaplari/no-frost-buzdolaplari/profilo-bd2186wfan-641-lt-no-frost-buzdolabi" class="google-analytics-device device-detail-btn m-p-pc-new" style="" data-product-id="profilo-bd2186wfan-641-lt-no-frost-buzdolabi" data-campaign="campaign," data-href="/pasaj/beyaz-esya/buzdolaplari/no-frost-buzdolaplari/profilo-bd2186wfan-641-lt-no-frost-buzdolabi" data-image-url="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Cihaz/aksesuar/profilo/bd2186wfan-641-lt-no-frost-buzdolabi/cg/1.png"><div class="a-fav-button" data-url="/pasaj/user-favorite-operation" data-device-path="/pasaj/beyaz-esya/buzdolaplari/no-frost-buzdolaplari/profilo-bd2186wfan-641-lt-no-frost-buzdolabi" data-device-id="1042419" data-pm-name="Profilo BD2186WFAN 641 Lt No Frost Buzdolabı"><span class="tooltip tooltipstered" data-alternative="Favoriden Çıkar"><svg class="heart" xmlns="http://www.w3.org/2000/svg" width="36" height="32" viewBox="0 0 36 32"><path fill="#FFC900" fill-rule="nonzero" stroke="#FFC900" class="heart-line" d="M3.058 2.738l-.104.104C-.983 6.779-.985 13.165 2.95 17.1l12.678 12.678c.847.847 2.213.849 3.062 0L31.368 17.1c3.938-3.938 3.938-10.317-.004-14.258l-.104-.104c-3.654-3.654-9.578-3.65-13.237.009l-.614.614c-.137.137-.363.137-.5 0l-.614-.614C12.638-.91 6.709-.913 3.058 2.738zM15.89 4.38c.7.7 1.836.7 2.536 0l.614-.614c3.097-3.097 8.11-3.1 11.201-.009l.104.104c3.379 3.38 3.38 8.846.004 12.221L17.671 28.76c-.285.285-.74.285-1.024 0L3.968 16.08C.596 12.71.598 7.235 3.972 3.86l.104-.104c3.088-3.088 8.106-3.085 11.2.009l.615.614z" transform="translate(-1254 -352) translate(1255 353)"></path><path fill="#ffc900" class="heart-fill" d="M15.994 3.47C12.784.213 7.577.215 4.368 3.47l-.258.262C.48 7.412.48 13.379 4.107 17.056l12.445 12.619c.556.563 1.462.558 2.013 0L31.01 17.056c3.628-3.679 3.629-9.642-.002-13.324l-.26-.263c-3.21-3.255-8.413-3.256-11.625 0l-1.057 1.073c-.28.284-.736.282-1.014 0l-1.058-1.073z" transform="translate(-1254 -352) translate(1239 328) translate(16 25)"></path></svg></span></div><div class="m-p-pc-new__body"><div class="m-p-pc-new__carousel"><div class="swiper-container swiper-container-initialized swiper-container-horizontal"><div class="swiper-wrapper" style="transition-duration: 0ms;"><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Cihaz/aksesuar/profilo/bd2186wfan-641-lt-no-frost-buzdolabi/cg/1/1_250x188.png?17735349480672" alt="Profilo BD2186WFAN 641 Lt No Frost Buzdolabı" class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Cihaz/aksesuar/profilo/bd2186wfan-641-lt-no-frost-buzdolabi/cg/2/2_250x188.png?17735349480672" alt="Profilo BD2186WFAN 641 Lt No Frost Buzdolabı" class="swiper-lazy"></figure></div></div><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div><div class="m-p-pc-new__carousel__pagination swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"></div></div><span class="m-p-pc-new__title">Profilo BD2186WFAN 641 Lt No Frost Buzdolabı</span><div class="a-rate"><div class="a-rate__star" data-point="5.0"><span class="icon-star-filled"></span><span class="icon-star-filled"></span><span class="icon-star-filled"></span><span class="icon-star-filled"></span><span class="icon-star-filled"></span></div><div class="a-rate__point">5,0 </div></div><div class="m-p-pc-new__badges"><div class="m-p-pc-new__badge" style="background: #E5F8FF">Peşine 3<br> Taksit</div><div class="m-p-pc-new__badge" style="background: #E5F8FF">Alışveriş<br>Kredisi</div><div class="m-p-pc-new__badge" style="background: #FDF7E7">Ücretsiz<br>Kargo</div></div></div><div class="m-p-pc-new__foot"><div class="m-p-pc-new__price m-p-pc-new__price--secondary"> 39.999 <span class="m-p-pc-new__price__cur">TL </span></div></div>
                    <!-- google-analytics --><div id="google-analytics-device-informations" style="display: none;" data-section-title="Beyaz Eşya - Buzdolapları" data-product-id="1042419" data-product-name="Profilo BD2186WFAN 641 Lt No Frost Buzdolabı" data-product-price="39999.0" data-product-brand="Profilo" data-position="1" data-dimension21="TRY" data-dimension22="false" data-dimension25="Pesin" data-dimension27="true" data-dimension30="Non-Turkcell" data-dimension156="true" data-dimension157="0" data-dimension167="5" data-dimension168="2" data-dimension169="1" data-dimension170="5" data-ribbon_ozel="false" data-ribbon-tlkupon="false" data-ribbon-tukeniyor="false" data-ribbon-firsaturunu="false" data-ribbon-coksatan="false" data-ribbon-gununfirsati="false" data-badge-faturayaektaksitli="false" data-badge-pesinfiyatinataksit="Peşine 3<br> Taksit, 1" data-badge-alisveriskredisi="1" data-badge-faturanlaode="false" data-badge-ucretsizkargo="1" data-badge-hizliteslimat="0" data-badge-magazadanteslim="false" data-badge-anindateslim="false" data-dahili-hafiza="" data-countdown="" data-indirim-tutari="0" data-indirim-orani="0" data-unit-sale-price="39999.0" data-product-category="Beyaz Eşya" data-dimension173="Buzdolapları" data-dimension174="No-Frost Buzdolapları"></div>
                    <!-- google-analytics -->
                  </a></div><div><a href="/pasaj/beyaz-esya/buzdolaplari/no-frost-buzdolaplari/beko-670531-ei-427-l-alttan-donduruculu-no-frost-buzdolabi" class="google-analytics-device device-detail-btn m-p-pc-new m-p-pc-new--outOfStock" style="" data-product-id="beko-670531-ei-427-l-alttan-donduruculu-no-frost-buzdolabi" data-campaign="" data-href="/pasaj/beyaz-esya/buzdolaplari/no-frost-buzdolaplari/beko-670531-ei-427-l-alttan-donduruculu-no-frost-buzdolabi" data-image-url="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00FNQK/1-1677609847010.png"><div class="a-fav-button" data-url="/pasaj/user-favorite-operation" data-device-path="/pasaj/beyaz-esya/buzdolaplari/no-frost-buzdolaplari/beko-670531-ei-427-l-alttan-donduruculu-no-frost-buzdolabi" data-device-id="1093601" data-pm-name="Beko 670531 EI 427 L Alttan Donduruculu No Frost Buzdolabı"><span class="tooltip tooltipstered" data-alternative="Favoriden Çıkar"><svg class="heart" xmlns="http://www.w3.org/2000/svg" width="36" height="32" viewBox="0 0 36 32"><path fill="#FFC900" fill-rule="nonzero" stroke="#FFC900" class="heart-line" d="M3.058 2.738l-.104.104C-.983 6.779-.985 13.165 2.95 17.1l12.678 12.678c.847.847 2.213.849 3.062 0L31.368 17.1c3.938-3.938 3.938-10.317-.004-14.258l-.104-.104c-3.654-3.654-9.578-3.65-13.237.009l-.614.614c-.137.137-.363.137-.5 0l-.614-.614C12.638-.91 6.709-.913 3.058 2.738zM15.89 4.38c.7.7 1.836.7 2.536 0l.614-.614c3.097-3.097 8.11-3.1 11.201-.009l.104.104c3.379 3.38 3.38 8.846.004 12.221L17.671 28.76c-.285.285-.74.285-1.024 0L3.968 16.08C.596 12.71.598 7.235 3.972 3.86l.104-.104c3.088-3.088 8.106-3.085 11.2.009l.615.614z" transform="translate(-1254 -352) translate(1255 353)"></path><path fill="#ffc900" class="heart-fill" d="M15.994 3.47C12.784.213 7.577.215 4.368 3.47l-.258.262C.48 7.412.48 13.379 4.107 17.056l12.445 12.619c.556.563 1.462.558 2.013 0L31.01 17.056c3.628-3.679 3.629-9.642-.002-13.324l-.26-.263c-3.21-3.255-8.413-3.256-11.625 0l-1.057 1.073c-.28.284-.736.282-1.014 0l-1.058-1.073z" transform="translate(-1254 -352) translate(1239 328) translate(16 25)"></path></svg></span></div><div class="m-p-pc-new__body"><div class="m-p-pc-new__carousel"><div class="swiper-container swiper-container-initialized swiper-container-horizontal"><div class="swiper-wrapper" style="transition-duration: 0ms;"><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00FNQK/1-1677609847010/1-1677609847010_250x188.png?17735349480672" alt="Beko 670531 EI 427 L Alttan Donduruculu No Frost Buzdolabı" class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00FNQK/2-1677609879861/2-1677609879861_250x188.png?17735349480672" alt="Beko 670531 EI 427 L Alttan Donduruculu No Frost Buzdolabı" class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00FNQK/3-1677609903214/3-1677609903214_250x188.png?17735349480672" alt="Beko 670531 EI 427 L Alttan Donduruculu No Frost Buzdolabı" class="swiper-lazy"></figure></div></div><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div><div class="m-p-pc-new__carousel__pagination swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"></div></div><span class="m-p-pc-new__title">Beko 670531 EI 427 L Alttan Donduruculu No Frost Buzdolabı</span><div class="a-rate__point"></div><div class="m-p-pc-new__badges"></div></div><div class="m-p-pc-new__foot m-p-pc-new__foot--coming-soon"><p>Gelince Haber Ver</p></div>
                    <!-- google-analytics --><div id="google-analytics-device-informations" style="display: none;" data-section-title="Beyaz Eşya - Buzdolapları" data-product-id="1093601" data-product-name="Beko 670531 EI 427 L Alttan Donduruculu No Frost Buzdolabı" data-product-price="26785.0" data-product-brand="BEKO" data-position="1" data-dimension21="TRY" data-dimension22="false" data-dimension25="Pesin" data-dimension27="true" data-dimension30="Non-Turkcell" data-dimension156="false" data-dimension157="0" data-dimension167="0" data-dimension168="3" data-dimension169="0" data-dimension170="0" data-ribbon_ozel="false" data-ribbon-tlkupon="false" data-ribbon-tukeniyor="false" data-ribbon-firsaturunu="false" data-ribbon-coksatan="false" data-ribbon-gununfirsati="false" data-badge-faturayaektaksitli="false" data-badge-pesinfiyatinataksit="false" data-badge-alisveriskredisi="false" data-badge-faturanlaode="false" data-badge-ucretsizkargo="false" data-badge-hizliteslimat="false" data-badge-magazadanteslim="false" data-badge-anindateslim="false" data-dahili-hafiza="" data-countdown="" data-indirim-tutari="0" data-indirim-orani="0" data-unit-sale-price="26785.0" data-product-category="Beyaz Eşya" data-dimension173="Buzdolapları" data-dimension174="No-Frost Buzdolapları"></div>
                    <!-- google-analytics -->
                  </a></div></div><div data-analytic-index="2" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item"></div><div data-analytic-index="3" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item"></div><div data-analytic-index="4" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item"></div><div data-analytic-index="5" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item"></div><div data-analytic-index="6" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item"></div><div data-analytic-index="7" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item"></div><div data-analytic-index="8" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item"></div><div data-analytic-index="9" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item"></div><div data-analytic-index="10" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item"></div><div data-analytic-index="11" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item"></div><div data-analytic-index="12" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item"></div><div class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item"></div></div></div><div class="o-p-header__dropdown__item" id="38aaeb07-367c-4040-9012-f1e7acebb375"><ul class="o-p-header__dropdown__list"><li data-analytic-index="0" class=""><a href=""></a></li><li data-analytic-index="1" class="js-has-sublist"><a href="/pasaj/saglik-ve-kisisel-bakim-urunleri/cilt-bakim-teknolojileri">Cilt Bakım Teknolojileri</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li></ul></li><li data-analytic-index="2" class="js-has-sublist"><a href="/pasaj/saglik-ve-kisisel-bakim-urunleri/sac-bakim-urunleri">Saç Bakım Ürünleri</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/saglik-ve-kisisel-bakim-urunleri/sac-bakim-urunleri/sac-kurutma-makinesi">Saç Kurutma Makineleri</a></li><li><a href="/pasaj/saglik-ve-kisisel-bakim-urunleri/sac-bakim-urunleri/sac-sekillendirme">Saç Şekillendiriciler</a></li><li><a href="/pasaj/saglik-ve-kisisel-bakim-urunleri/sac-bakim-urunleri/sac-duzlestiricileri">Saç Düzleştiricileri</a></li></ul></li><li data-analytic-index="3" class="js-has-sublist"><a href="/pasaj/saglik-ve-kisisel-bakim-urunleri/erkek-bakim-urunleri">Erkek Bakım Ürünleri</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/saglik-ve-kisisel-bakim-urunleri/erkek-bakim-urunleri/tiras-makinesi">Tıraş Makineleri</a></li><li><a href="/pasaj/saglik-ve-kisisel-bakim-urunleri/erkek-bakim-urunleri/sac-sakal-kesme-makineleri">Saç &amp; Sakal Kesme Makineleri</a></li></ul></li><li data-analytic-index="4" class="js-has-sublist"><a href="/pasaj/saglik-ve-kisisel-bakim-urunleri/agiz-bakim-urunleri">Ağız Bakım Ürünleri</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/saglik-ve-kisisel-bakim-urunleri/agiz-bakim-urunleri/sarjli-dis-fircasi">Şarjlı Diş Fırçaları</a></li></ul></li><li data-analytic-index="5" class="js-has-sublist"><a href="/pasaj/saglik-ve-kisisel-bakim-urunleri/epilatorler-ipl-cihazlari">Epilatörler &amp; IPL Cihazları</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/saglik-ve-kisisel-bakim-urunleri/epilatorler-ipl-cihazlari/epilatorler">Epilatörler</a></li><li><a href="/pasaj/saglik-ve-kisisel-bakim-urunleri/epilatorler-ipl-cihazlari/lazer-epilasyon-ipl-cihazlari">Lazer Epilasyon &amp; IPL Cihazları</a></li></ul></li><li data-analytic-index="6" class="js-has-sublist"><a href="/pasaj/saglik-ve-kisisel-bakim-urunleri/ates-olcerler-tansiyon-aletleri">Ateş Ölçerler &amp; Tansiyon Aletleri</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li></ul></li><li data-analytic-index="7" class="js-has-sublist"><a href="/pasaj/saglik-ve-kisisel-bakim-urunleri/tarti">Tartılar</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li></ul></li><li><a href="/pasaj/saglik-ve-kisisel-bakim-urunleri" class="all">Tüm Sağlık-Kişisel Bakım <i class="icon-p-arrow-down"></i></a></li></ul><div class="o-p-header__dropdown__cards"><div data-analytic-index="0" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item active"><div><a href="/pasaj/saglik-ve-kisisel-bakim-urunleri/sac-bakim-urunleri/sac-kurutma-makinesi/dyson-supersonic-iron-fusia-new-packaging-2021" class="google-analytics-device device-detail-btn m-p-pc-new" style="" data-product-id="dyson-supersonic-iron-fusia-new-packaging-2021" data-campaign="campaign,discount," data-href="/pasaj/saglik-ve-kisisel-bakim-urunleri/sac-bakim-urunleri/sac-kurutma-makinesi/dyson-supersonic-iron-fusia-new-packaging-2021" data-image-url="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Cihaz/aksesuar/dyson/supersonic-iron-fusia-new-packaging-2021/cg/1.png"><div class="a-p-card-ribbon a-p-card-ribbon--a a-p-card-ribbon--short " style="background: #FF3D71"> Tükeniyor </div><div class="a-fav-button" data-url="/pasaj/user-favorite-operation" data-device-path="/pasaj/saglik-ve-kisisel-bakim-urunleri/sac-bakim-urunleri/sac-kurutma-makinesi/dyson-supersonic-iron-fusia-new-packaging-2021" data-device-id="1041841" data-pm-name="Dyson Supersonic Saç Kurutma Makinesi (Fuşya/Metalik Gri)"><span class="tooltip tooltipstered" data-alternative="Favoriden Çıkar"><svg class="heart" xmlns="http://www.w3.org/2000/svg" width="36" height="32" viewBox="0 0 36 32"><path fill="#FFC900" fill-rule="nonzero" stroke="#FFC900" class="heart-line" d="M3.058 2.738l-.104.104C-.983 6.779-.985 13.165 2.95 17.1l12.678 12.678c.847.847 2.213.849 3.062 0L31.368 17.1c3.938-3.938 3.938-10.317-.004-14.258l-.104-.104c-3.654-3.654-9.578-3.65-13.237.009l-.614.614c-.137.137-.363.137-.5 0l-.614-.614C12.638-.91 6.709-.913 3.058 2.738zM15.89 4.38c.7.7 1.836.7 2.536 0l.614-.614c3.097-3.097 8.11-3.1 11.201-.009l.104.104c3.379 3.38 3.38 8.846.004 12.221L17.671 28.76c-.285.285-.74.285-1.024 0L3.968 16.08C.596 12.71.598 7.235 3.972 3.86l.104-.104c3.088-3.088 8.106-3.085 11.2.009l.615.614z" transform="translate(-1254 -352) translate(1255 353)"></path><path fill="#ffc900" class="heart-fill" d="M15.994 3.47C12.784.213 7.577.215 4.368 3.47l-.258.262C.48 7.412.48 13.379 4.107 17.056l12.445 12.619c.556.563 1.462.558 2.013 0L31.01 17.056c3.628-3.679 3.629-9.642-.002-13.324l-.26-.263c-3.21-3.255-8.413-3.256-11.625 0l-1.057 1.073c-.28.284-.736.282-1.014 0l-1.058-1.073z" transform="translate(-1254 -352) translate(1239 328) translate(16 25)"></path></svg></span></div><div class="m-p-pc-new__body"><div class="m-p-pc-new__carousel"><div class="swiper-container swiper-container-initialized swiper-container-horizontal"><div class="swiper-wrapper" style="transition-duration: 0ms;"><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Cihaz/aksesuar/dyson/supersonic-iron-fusia-new-packaging-2021/cg/1/1_250x188.png?17735349480672" alt="Dyson Supersonic Saç Kurutma Makinesi (Fuşya/Metalik Gri)" class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Cihaz/aksesuar/dyson/supersonic-iron-fusia-new-packaging-2021/cg/2/2_250x188.png?17735349480672" alt="Dyson Supersonic Saç Kurutma Makinesi (Fuşya/Metalik Gri)" class="swiper-lazy"></figure></div></div><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div><div class="m-p-pc-new__carousel__pagination swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"></div></div><span class="m-p-pc-new__title">Dyson Supersonic Saç Kurutma Makinesi (Fuşya/Metalik Gri)</span><div class="a-rate"><div class="a-rate__star" data-point="5.0"><span class="icon-star-filled"></span><span class="icon-star-filled"></span><span class="icon-star-filled"></span><span class="icon-star-filled"></span><span class="icon-star-filled"></span></div><div class="a-rate__point">5,0 </div></div><div class="m-p-pc-new__badges"><div class="m-p-pc-new__badge" style="background: #E5F8FF">Peşine 3<br> Taksit</div><div class="m-p-pc-new__badge" style="background: #E5F8FF">Alışveriş<br>Kredisi</div><div class="m-p-pc-new__badge" style="background: #FDF7E7">Ücretsiz<br>Kargo</div></div></div><div class="m-p-pc-new__foot"><div class="m-p-pc-new__price m-p-pc-new__price--secondary"><div class="m-p-pc-new__price">14.499 <span class="m-p-pc-new__price__cur">TL</span></div><div class="m-p-pc-new__price m-p-pc-new__price--box"><div class="m-p-pc-new__price--old">14.998 <span class="m-p-pc-new__price__cur">TL <span class="m-p-pc-new__price__cur__discount">499 TL İndirim</span></span></div></div><div class="m-p-pc-new__lowest-price">Son 30 günün en düşük fiyatı</div></div></div>
                    <!-- google-analytics --><div id="google-analytics-device-informations" style="display: none;" data-section-title="Sağlık-Kişisel Bakım - " data-product-id="1041841" data-product-name="Dyson Supersonic Saç Kurutma Makinesi (Fuşya/Metalik Gri)" data-product-price="14499.0" data-product-brand="Dyson" data-position="1" data-dimension21="TRY" data-dimension22="true" data-dimension25="Kontratli" data-dimension27="true" data-dimension30="Non-Turkcell" data-dimension156="true" data-dimension157="9.4" data-dimension167="2" data-dimension168="2" data-dimension169="4" data-dimension170="5" data-ribbon_ozel="false" data-ribbon-tlkupon="false" data-ribbon-tukeniyor="1" data-ribbon-firsaturunu="false" data-ribbon-coksatan="false" data-ribbon-gununfirsati="false" data-badge-faturayaektaksitli="false" data-badge-pesinfiyatinataksit="Peşine 3<br> Taksit, 1" data-badge-alisveriskredisi="1" data-badge-faturanlaode="false" data-badge-ucretsizkargo="1" data-badge-hizliteslimat="0" data-badge-magazadanteslim="false" data-badge-anindateslim="false" data-dahili-hafiza="" data-countdown="2024/02/29,00:00:00" data-indirim-tutari="1500" data-indirim-orani="9.4" data-unit-sale-price="14499.0" data-product-category="Sağlık-Kişisel Bakım" data-dimension173="Saç Bakım Ürünleri" data-dimension174="Saç Kurutma Makineleri"></div>
                    <!-- google-analytics -->
                  </a></div><div><a href="/pasaj/saglik-ve-kisisel-bakim-urunleri/epilatorler-ipl-cihazlari/epilatorler/braun-silk-epil-9-9725-sensosmart-kablosuz-islak-kuru-5-ek-parcali-2-si-1-arada-epilator" class="google-analytics-device device-detail-btn m-p-pc-new" style="" data-product-id="braun-silk-epil-9-9725-sensosmart-kablosuz-islak-kuru-5-ek-parcali-2-si-1-arada-epilator" data-campaign="campaign,discount," data-href="/pasaj/saglik-ve-kisisel-bakim-urunleri/epilatorler-ipl-cihazlari/epilatorler/braun-silk-epil-9-9725-sensosmart-kablosuz-islak-kuru-5-ek-parcali-2-si-1-arada-epilator" data-image-url="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00FO25/1-1675364850123.png"><div class="a-fav-button" data-url="/pasaj/user-favorite-operation" data-device-path="/pasaj/saglik-ve-kisisel-bakim-urunleri/epilatorler-ipl-cihazlari/epilatorler/braun-silk-epil-9-9725-sensosmart-kablosuz-islak-kuru-5-ek-parcali-2-si-1-arada-epilator" data-device-id="1092447" data-pm-name="Braun Silk-Epil 9 9725 Sensosmart Kablosuz Islak-kuru 5 Ek Parçalı 2 si 1 Arada Epilatör"><span class="tooltip tooltipstered" data-alternative="Favoriden Çıkar"><svg class="heart" xmlns="http://www.w3.org/2000/svg" width="36" height="32" viewBox="0 0 36 32"><path fill="#FFC900" fill-rule="nonzero" stroke="#FFC900" class="heart-line" d="M3.058 2.738l-.104.104C-.983 6.779-.985 13.165 2.95 17.1l12.678 12.678c.847.847 2.213.849 3.062 0L31.368 17.1c3.938-3.938 3.938-10.317-.004-14.258l-.104-.104c-3.654-3.654-9.578-3.65-13.237.009l-.614.614c-.137.137-.363.137-.5 0l-.614-.614C12.638-.91 6.709-.913 3.058 2.738zM15.89 4.38c.7.7 1.836.7 2.536 0l.614-.614c3.097-3.097 8.11-3.1 11.201-.009l.104.104c3.379 3.38 3.38 8.846.004 12.221L17.671 28.76c-.285.285-.74.285-1.024 0L3.968 16.08C.596 12.71.598 7.235 3.972 3.86l.104-.104c3.088-3.088 8.106-3.085 11.2.009l.615.614z" transform="translate(-1254 -352) translate(1255 353)"></path><path fill="#ffc900" class="heart-fill" d="M15.994 3.47C12.784.213 7.577.215 4.368 3.47l-.258.262C.48 7.412.48 13.379 4.107 17.056l12.445 12.619c.556.563 1.462.558 2.013 0L31.01 17.056c3.628-3.679 3.629-9.642-.002-13.324l-.26-.263c-3.21-3.255-8.413-3.256-11.625 0l-1.057 1.073c-.28.284-.736.282-1.014 0l-1.058-1.073z" transform="translate(-1254 -352) translate(1239 328) translate(16 25)"></path></svg></span></div><div class="m-p-pc-new__body"><div class="m-p-pc-new__carousel"><div class="swiper-container swiper-container-initialized swiper-container-horizontal"><div class="swiper-wrapper" style="transition-duration: 0ms;"><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00FO25/1-1675364850123/1-1675364850123_250x188.png?17735349480672" alt="Braun Silk-Epil 9 9725 Sensosmart Kablosuz Islak-kuru 5 Ek Parçalı 2 si 1 Arada Epilatör" class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00FO25/2-1675364880265/2-1675364880265_250x188.png?17735349480672" alt="Braun Silk-Epil 9 9725 Sensosmart Kablosuz Islak-kuru 5 Ek Parçalı 2 si 1 Arada Epilatör" class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00FO25/3-1675364911423/3-1675364911423_250x188.png?17735349480672" alt="Braun Silk-Epil 9 9725 Sensosmart Kablosuz Islak-kuru 5 Ek Parçalı 2 si 1 Arada Epilatör" class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00FO25/4-1675364935619/4-1675364935619_250x188.png?17735349480672" alt="Braun Silk-Epil 9 9725 Sensosmart Kablosuz Islak-kuru 5 Ek Parçalı 2 si 1 Arada Epilatör" class="swiper-lazy"></figure></div></div><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div><div class="m-p-pc-new__carousel__pagination swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"></div></div><span class="m-p-pc-new__title">Braun Silk-Epil 9 9725 Sensosmart Kablosuz Islak-kuru 5 Ek Parçalı 2 si 1 Arada Epilatör</span><div class="a-rate"><div class="a-rate__star" data-point="4.0"><span class="icon-star-filled"></span><span class="icon-star-filled"></span><span class="icon-star-filled"></span><span class="icon-star-filled"></span><span class="icon-star"></span></div><div class="a-rate__point">4,0 </div></div><div class="m-p-pc-new__badges"><div class="m-p-pc-new__badge" style="background: #00e90a1a">Faturana Ek 36 Taksit</div><div class="m-p-pc-new__badge" style="background: #E5F8FF">Peşine 3<br> Taksit</div><div class="m-p-pc-new__badge" style="background: #FDF7E7">Ücretsiz<br>Kargo</div></div></div><div class="m-p-pc-new__foot"><div class="m-p-pc-new__price m-p-pc-new__price--secondary"><div class="m-p-pc-new__price">4.029 <span class="m-p-pc-new__price__cur">TL</span></div><div class="m-p-pc-new__price m-p-pc-new__price--box"><div class="m-p-pc-new__price--old">4.959 <span class="m-p-pc-new__price__cur">TL <span class="m-p-pc-new__price__cur__discount">930 TL İndirim</span></span></div></div><div class="m-p-pc-new__lowest-price">Son 30 günün en düşük fiyatı</div></div></div>
                    <!-- google-analytics --><div id="google-analytics-device-informations" style="display: none;" data-section-title="Sağlık-Kişisel Bakım - " data-product-id="1092447" data-product-name="Braun Silk-Epil 9 9725 Sensosmart Kablosuz Islak-kuru 5 Ek Parçalı 2 si 1 Arada Epilatör" data-product-price="4029.0" data-product-brand="Braun" data-position="1" data-dimension21="TRY" data-dimension22="true" data-dimension25="Pesin" data-dimension27="true" data-dimension30="Non-Turkcell" data-dimension156="true" data-dimension157="18.8" data-dimension167="27" data-dimension168="4" data-dimension169="1" data-dimension170="4" data-ribbon_ozel="false" data-ribbon-tlkupon="false" data-ribbon-tukeniyor="false" data-ribbon-firsaturunu="false" data-ribbon-coksatan="false" data-ribbon-gununfirsati="false" data-badge-faturayaektaksitli="Faturana Ek 36 Taksit, 1" data-badge-pesinfiyatinataksit="Peşine 3<br> Taksit, 1" data-badge-alisveriskredisi="0" data-badge-faturanlaode="false" data-badge-ucretsizkargo="1" data-badge-hizliteslimat="0" data-badge-magazadanteslim="false" data-badge-anindateslim="false" data-dahili-hafiza="" data-countdown="2024/02/29,20:59:00" data-indirim-tutari="930" data-indirim-orani="18.8" data-unit-sale-price="4029.0" data-product-category="Sağlık-Kişisel Bakım" data-dimension173="Epilatörler &amp; IPL Cihazları" data-dimension174="Epilatörler"></div>
                    <!-- google-analytics -->
                  </a></div></div><div data-analytic-index="1" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="2" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="3" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="4" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="5" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="6" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="7" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item"></div></div></div><div class="o-p-header__dropdown__item" id="68269bca-08a2-439f-9f94-c258e4bedb63"><ul class="o-p-header__dropdown__list"><li data-analytic-index="0" class=""><a href=""></a></li><li data-analytic-index="1" class="js-has-sublist"><a href="/pasaj/hobi-oyun/oyun-konsolu">Oyun Konsolları</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/hobi-oyun/oyun-konsolu/ps5">Playstation 5 / PS5</a></li><li><a href="/pasaj/hobi-oyun/oyun-konsolu/ps4">Playstation 4 / PS4</a></li><li><a href="/pasaj/hobi-oyun/oyun-konsolu/nintendo">Nintendo</a></li><li><a href="/pasaj/hobi-oyun/oyun-konsolu/xbox">xbox</a></li><li><a href="/pasaj/hobi-oyun/oyun-konsolu/diger-oyun-konsollari">Diğer Oyun Konsolları</a></li></ul></li><li data-analytic-index="2" class="js-has-sublist"><a href="/pasaj/hobi-oyun/dijital-urunler">Dijital Ürün Kodları</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/hobi-oyun/dijital-urunler/destek-kartlari">Destek Kartları</a></li><li><a href="/pasaj/hobi-oyun/dijital-urunler/oyun-pinleri-uyelikler">Oyun Pinleri - Üyelikler</a></li><li><a href="/pasaj/hobi-oyun/dijital-urunler/spor-dizi-film-yayin-paketleri">Spor - Dizi - Film Yayın Paketleri</a></li><li><a href="/pasaj/hobi-oyun/dijital-urunler/online-egitim">Online Eğitim</a></li><li><a href="/pasaj/hobi-oyun/dijital-urunler/eglence">Eğlence ve Müzik</a></li><li><a href="/pasaj/hobi-oyun/dijital-urunler/saklama-alani">Saklama Alanı</a></li><li><a href="/pasaj/hobi-oyun/dijital-urunler/dijital-sigorta-urunleri">Dijital Sigorta Ürünleri</a></li></ul></li><li data-analytic-index="3" class="js-has-sublist"><a href="/pasaj/hobi-oyun/oyuncu-aksesuarlari">Oyuncu Aksesuarları</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/hobi-oyun/oyuncu-aksesuarlari/oyuncu-klavye">Oyuncu Klavyeleri</a></li><li><a href="/pasaj/hobi-oyun/oyuncu-aksesuarlari/oyuncu-mouse">Oyuncu Mouseları</a></li><li><a href="/pasaj/hobi-oyun/oyuncu-aksesuarlari/oyuncu-kulaklik">Oyuncu Kulaklıkları</a></li><li><a href="/pasaj/hobi-oyun/oyuncu-aksesuarlari/oyuncu-koltuklari">Oyuncu Koltukları</a></li><li><a href="/pasaj/hobi-oyun/oyuncu-aksesuarlari/oyuncu-joystick">Oyuncu Joystickleri</a></li><li><a href="/pasaj/hobi-oyun/oyuncu-aksesuarlari/konsol-aksesuarlari">Konsol Aksesuarları</a></li><li><a href="/pasaj/hobi-oyun/oyuncu-aksesuarlari/mobil-oyun-aksesuarlari">Mobil Oyun Aksesuarları</a></li></ul></li><li data-analytic-index="4" class="js-has-sublist"><a href="/pasaj/hobi-oyun/oyunlar">Oyunlar</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/hobi-oyun/oyunlar/playstation-ve-konsol-oyunlari">Playstation &amp; Konsol Oyunları</a></li></ul></li><li data-analytic-index="5" class="js-has-sublist"><a href="/pasaj/hobi-oyun/fotograf-kamera">Fotoğraf &amp; Kameralar</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/hobi-oyun/fotograf-kamera/slr-fotograf-makineleri">Fotoğraf Makineleri (SLR)</a></li><li><a href="/pasaj/hobi-oyun/fotograf-kamera/aksiyon-kameralari">Aksiyon Kameraları</a></li><li><a href="/pasaj/hobi-oyun/fotograf-kamera/polaroid-fotograf-makineleri">Polaroid Fotoğraf Makineleri</a></li><li><a href="/pasaj/hobi-oyun/fotograf-kamera/aynasiz-makineler">Aynasız Fotoğraf Makineleri</a></li><li><a href="/pasaj/hobi-oyun/fotograf-kamera/kompakt-makineler">Kompakt Fotoğraf Makineleri</a></li><li><a href="/pasaj/hobi-oyun/fotograf-kamera/video-kameralar">Video Kameralar</a></li><li><a href="/pasaj/hobi-oyun/fotograf-kamera/fotograf-yazicilari">Fotoğraf Yazıcıları</a></li><li><a href="/pasaj/hobi-oyun/fotograf-kamera/lensler">Lensler</a></li><li><a href="/pasaj/hobi-oyun/fotograf-kamera/fotografcilik-aksesuarlari">Fotoğrafçılık Aksesuarları</a></li></ul></li><li data-analytic-index="6" class="js-has-sublist"><a href="/pasaj/hobi-oyun/youtuber-yayinci-urunleri">Youtuber &amp; Yayıncı Ürünleri</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li></ul></li><li data-analytic-index="7" class="js-has-sublist"><a href="/pasaj/hobi-oyun/dronelar">Dronelar</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li></ul></li><li data-analytic-index="8" class="js-has-sublist"><a href="/pasaj/hobi-oyun/scooterlar-bisikletler">Scooterlar &amp; Bisikletler</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li></ul></li><li data-analytic-index="9" class="js-has-sublist"><a href="/pasaj/hobi-oyun/yetiskin-hobi-ve-eglence">Yetişkin Hobi &amp; Eğlence</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/hobi-oyun/yetiskin-hobi-ve-eglence/puzzle">Puzzle</a></li><li><a href="/pasaj/hobi-oyun/yetiskin-hobi-ve-eglence/kutu-oyunlari">Kutu Oyunları</a></li><li><a href="/pasaj/hobi-oyun/yetiskin-hobi-ve-eglence/maketler">Maketler</a></li><li><a href="/pasaj/hobi-oyun/yetiskin-hobi-ve-eglence/figur-oyuncaklar">Figür Oyuncaklar</a></li><li><a href="/pasaj/hobi-oyun/yetiskin-hobi-ve-eglence/uzaktan-kumandali-arabalar">Uzaktan Kumandalı Arabalar</a></li></ul></li><li data-analytic-index="10" class="js-has-sublist"><a href="/pasaj/hobi-oyun/muzik-urunleri">Müzik Ürünleri</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/hobi-oyun/muzik-urunleri/muzik-aletleri">Müzik Aletleri</a></li><li><a href="/pasaj/hobi-oyun/muzik-urunleri/plaklar">Plaklar</a></li><li><a href="/pasaj/hobi-oyun/muzik-urunleri/muzik-yapim-kayit-urunleri">Müzik Yapım &amp; Kayıt Ürünleri</a></li><li><a href="/pasaj/hobi-oyun/muzik-urunleri/pikaplar">Pikaplar</a></li></ul></li><li data-analytic-index="11" class="js-has-sublist"><a href="/pasaj/hobi-oyun/odeme-kartlari">Ödeme Kartları</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li></ul></li><li><a href="/pasaj/hobi-oyun" class="all">Tüm Hobi-Oyun <i class="icon-p-arrow-down"></i></a></li></ul><div class="o-p-header__dropdown__cards"><div data-analytic-index="0" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item active"><div><a href="/pasaj/hobi-oyun/dronelar/dji-mini-3-pro" class="google-analytics-device device-detail-btn m-p-pc-new" style="" data-product-id="dji-mini-3-pro" data-campaign="campaign,discount," data-href="/pasaj/hobi-oyun/dronelar/dji-mini-3-pro" data-image-url="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/0088D0/1-1655039570382.png"><div class="a-p-card-ribbon a-p-card-ribbon--a a-p-card-ribbon--short " style="background: #00BAFC"> Günün Fırsatları </div><div class="a-fav-button" data-url="/pasaj/user-favorite-operation" data-device-path="/pasaj/hobi-oyun/dronelar/dji-mini-3-pro" data-device-id="1061419" data-pm-name="DJI Mini 3 Pro RC Drone (Ekranlı Kumandalı)"><span class="tooltip tooltipstered" data-alternative="Favoriden Çıkar"><svg class="heart" xmlns="http://www.w3.org/2000/svg" width="36" height="32" viewBox="0 0 36 32"><path fill="#FFC900" fill-rule="nonzero" stroke="#FFC900" class="heart-line" d="M3.058 2.738l-.104.104C-.983 6.779-.985 13.165 2.95 17.1l12.678 12.678c.847.847 2.213.849 3.062 0L31.368 17.1c3.938-3.938 3.938-10.317-.004-14.258l-.104-.104c-3.654-3.654-9.578-3.65-13.237.009l-.614.614c-.137.137-.363.137-.5 0l-.614-.614C12.638-.91 6.709-.913 3.058 2.738zM15.89 4.38c.7.7 1.836.7 2.536 0l.614-.614c3.097-3.097 8.11-3.1 11.201-.009l.104.104c3.379 3.38 3.38 8.846.004 12.221L17.671 28.76c-.285.285-.74.285-1.024 0L3.968 16.08C.596 12.71.598 7.235 3.972 3.86l.104-.104c3.088-3.088 8.106-3.085 11.2.009l.615.614z" transform="translate(-1254 -352) translate(1255 353)"></path><path fill="#ffc900" class="heart-fill" d="M15.994 3.47C12.784.213 7.577.215 4.368 3.47l-.258.262C.48 7.412.48 13.379 4.107 17.056l12.445 12.619c.556.563 1.462.558 2.013 0L31.01 17.056c3.628-3.679 3.629-9.642-.002-13.324l-.26-.263c-3.21-3.255-8.413-3.256-11.625 0l-1.057 1.073c-.28.284-.736.282-1.014 0l-1.058-1.073z" transform="translate(-1254 -352) translate(1239 328) translate(16 25)"></path></svg></span></div><div class="m-p-pc-new__body"><div class="m-p-pc-new__carousel"><div class="swiper-container swiper-container-initialized swiper-container-horizontal"><div class="swiper-wrapper" style="transition-duration: 0ms;"><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/0088D0/1-1655039570382/1-1655039570382_250x188.png?17735349480672" alt="DJI Mini 3 Pro RC Drone (Ekranlı Kumandalı)" class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/0088D0/2-1655039609839/2-1655039609839_250x188.png?17735349480672" alt="DJI Mini 3 Pro RC Drone (Ekranlı Kumandalı)" class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/0088D0/3-1655039633392/3-1655039633392_250x188.png?17735349480672" alt="DJI Mini 3 Pro RC Drone (Ekranlı Kumandalı)" class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/0088D0/4-1655039679039/4-1655039679039_250x188.png?17735349480672" alt="DJI Mini 3 Pro RC Drone (Ekranlı Kumandalı)" class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/0088D0/5-1658228864058/5-1658228864058_250x188.png?17735349480672" alt="DJI Mini 3 Pro RC Drone (Ekranlı Kumandalı)" class="swiper-lazy"></figure></div></div><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div><div class="m-p-pc-new__carousel__pagination swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"></div></div><span class="m-p-pc-new__title">DJI Mini 3 Pro RC Drone (Ekranlı Kumandalı)</span><div class="a-rate__point"></div><div class="m-p-pc-new__badges"><div class="m-p-pc-new__badge" style="background: #00e90a1a">Alışveriş<br>Kredisi</div><div class="m-p-pc-new__badge" style="background: #E5F8FF">Peşine 3<br> Taksit</div><div class="m-p-pc-new__badge" style="background: #FDF7E7">Ücretsiz<br>Kargo</div></div></div><div class="m-p-pc-new__foot"><div class="m-p-pc-new__price m-p-pc-new__price--secondary"><div class="m-p-pc-new__price">29.589 <span class="m-p-pc-new__price__cur">TL</span></div><div class="m-p-pc-new__price m-p-pc-new__price--box"><div class="m-p-pc-new__price--old">33.999 <span class="m-p-pc-new__price__cur">TL <span class="m-p-pc-new__price__cur__discount">4.410 TL İndirim</span></span></div></div><div class="m-p-pc-new__lowest-price">Son 30 günün en düşük fiyatı</div></div></div>
                    <!-- google-analytics --><div id="google-analytics-device-informations" style="display: none;" data-section-title="Hobi-Oyun - " data-product-id="1061419" data-product-name="DJI Mini 3 Pro RC Drone (Ekranlı Kumandalı)" data-product-price="29589.0" data-product-brand="Dji" data-position="1" data-dimension21="TRY" data-dimension22="true" data-dimension25="Pesin" data-dimension27="true" data-dimension30="Non-Turkcell" data-dimension156="true" data-dimension157="13" data-dimension167="15" data-dimension168="5" data-dimension169="0" data-dimension170="0" data-ribbon_ozel="false" data-ribbon-tlkupon="false" data-ribbon-tukeniyor="false" data-ribbon-firsaturunu="false" data-ribbon-coksatan="false" data-ribbon-gununfirsati="1" data-badge-faturayaektaksitli="1" data-badge-pesinfiyatinataksit="Peşine 3<br> Taksit, 1" data-badge-alisveriskredisi="false" data-badge-faturanlaode="false" data-badge-ucretsizkargo="1" data-badge-hizliteslimat="0" data-badge-magazadanteslim="false" data-badge-anindateslim="false" data-dahili-hafiza="" data-countdown="2024/03/01,00:00:00" data-indirim-tutari="4410" data-indirim-orani="13" data-unit-sale-price="29589.0" data-product-category="Hobi-Oyun" data-dimension173="Dronelar"></div>
                    <!-- google-analytics -->
                  </a></div><div><a href="/pasaj/hobi-oyun/scooterlar-bisikletler/volta-vb7-elektrikli-bisiklet" class="google-analytics-device device-detail-btn m-p-pc-new" style="" data-product-id="volta-vb7-elektrikli-bisiklet" data-campaign="campaign,discount," data-href="/pasaj/hobi-oyun/scooterlar-bisikletler/volta-vb7-elektrikli-bisiklet" data-image-url="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00HT7G/00HT7G-1.png"><div class="a-p-card-ribbon a-p-card-ribbon--a a-p-card-ribbon--short " style="background: #00BAFC"> Günün Fırsatları </div><div class="a-fav-button" data-url="/pasaj/user-favorite-operation" data-device-path="/pasaj/hobi-oyun/scooterlar-bisikletler/volta-vb7-elektrikli-bisiklet" data-device-id="1101916" data-pm-name="Volta VB7 Elektrikli Bisiklet"><span class="tooltip tooltipstered" data-alternative="Favoriden Çıkar"><svg class="heart" xmlns="http://www.w3.org/2000/svg" width="36" height="32" viewBox="0 0 36 32"><path fill="#FFC900" fill-rule="nonzero" stroke="#FFC900" class="heart-line" d="M3.058 2.738l-.104.104C-.983 6.779-.985 13.165 2.95 17.1l12.678 12.678c.847.847 2.213.849 3.062 0L31.368 17.1c3.938-3.938 3.938-10.317-.004-14.258l-.104-.104c-3.654-3.654-9.578-3.65-13.237.009l-.614.614c-.137.137-.363.137-.5 0l-.614-.614C12.638-.91 6.709-.913 3.058 2.738zM15.89 4.38c.7.7 1.836.7 2.536 0l.614-.614c3.097-3.097 8.11-3.1 11.201-.009l.104.104c3.379 3.38 3.38 8.846.004 12.221L17.671 28.76c-.285.285-.74.285-1.024 0L3.968 16.08C.596 12.71.598 7.235 3.972 3.86l.104-.104c3.088-3.088 8.106-3.085 11.2.009l.615.614z" transform="translate(-1254 -352) translate(1255 353)"></path><path fill="#ffc900" class="heart-fill" d="M15.994 3.47C12.784.213 7.577.215 4.368 3.47l-.258.262C.48 7.412.48 13.379 4.107 17.056l12.445 12.619c.556.563 1.462.558 2.013 0L31.01 17.056c3.628-3.679 3.629-9.642-.002-13.324l-.26-.263c-3.21-3.255-8.413-3.256-11.625 0l-1.057 1.073c-.28.284-.736.282-1.014 0l-1.058-1.073z" transform="translate(-1254 -352) translate(1239 328) translate(16 25)"></path></svg></span></div><div class="m-p-pc-new__body"><div class="m-p-pc-new__carousel"><div class="swiper-container swiper-container-initialized swiper-container-horizontal"><div class="swiper-wrapper" style="transition-duration: 0ms;"><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00HT7G/00HT7G-1/00HT7G-1_250x188.png?17735349480672" alt="Volta VB7 Elektrikli Bisiklet" class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00HT7G/00HT7G-2/00HT7G-2_250x188.png?17735349480672" alt="Volta VB7 Elektrikli Bisiklet" class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00HT7G/00HT7G-3/00HT7G-3_250x188.png?17735349480672" alt="Volta VB7 Elektrikli Bisiklet" class="swiper-lazy"></figure></div></div><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div><div class="m-p-pc-new__carousel__pagination swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"></div></div><span class="m-p-pc-new__title">Volta VB7 Elektrikli Bisiklet</span><div class="a-rate__point"></div><div class="m-p-pc-new__badges"><div class="m-p-pc-new__badge" style="background: #E5F8FF">Peşine 3<br> Taksit</div><div class="m-p-pc-new__badge" style="background: #E5F8FF">Alışveriş<br>Kredisi</div><div class="m-p-pc-new__badge" style="background: #FDF7E7">Ücretsiz<br>Kargo</div></div></div><div class="m-p-pc-new__foot"><div class="m-p-pc-new__price m-p-pc-new__price--secondary"> 21.998 <span class="m-p-pc-new__price__cur">TL </span></div></div>
                    <!-- google-analytics --><div id="google-analytics-device-informations" style="display: none;" data-section-title="Hobi-Oyun - " data-product-id="1101916" data-product-name="Volta VB7 Elektrikli Bisiklet" data-product-price="21998.0" data-product-brand="Volta" data-position="1" data-dimension21="TRY" data-dimension22="true" data-dimension25="Pesin" data-dimension27="true" data-dimension30="Non-Turkcell" data-dimension156="true" data-dimension157="0" data-dimension167="6" data-dimension168="3" data-dimension169="0" data-dimension170="0" data-ribbon_ozel="false" data-ribbon-tlkupon="false" data-ribbon-tukeniyor="false" data-ribbon-firsaturunu="false" data-ribbon-coksatan="false" data-ribbon-gununfirsati="1" data-badge-faturayaektaksitli="false" data-badge-pesinfiyatinataksit="Peşine 3<br> Taksit, 1" data-badge-alisveriskredisi="1" data-badge-faturanlaode="false" data-badge-ucretsizkargo="1" data-badge-hizliteslimat="0" data-badge-magazadanteslim="false" data-badge-anindateslim="false" data-dahili-hafiza="" data-countdown="2024/03/01,00:00:00" data-indirim-tutari="1" data-indirim-orani="0" data-unit-sale-price="21998.0" data-product-category="Hobi-Oyun" data-dimension173="Scooterlar &amp; Bisikletler"></div>
                    <!-- google-analytics -->
                  </a></div></div><div data-analytic-index="1" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="2" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="3" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="4" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="5" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="6" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="7" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="8" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="9" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="10" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="11" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item"></div></div></div><div class="o-p-header__dropdown__item" id="16e37f94-fa04-4010-9e5e-052d0b5a9a45"><ul class="o-p-header__dropdown__list"><li data-analytic-index="0" class=""><a href=""></a></li><li data-analytic-index="1" class="js-has-sublist"><a href="/pasaj/tv-ses-sistemleri/televizyonlar">Televizyonlar</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/tv-ses-sistemleri/televizyonlar/smart-tv">Smart TV</a></li><li><a href="/pasaj/tv-ses-sistemleri/televizyonlar/led-tv">LED TV</a></li><li><a href="/pasaj/tv-ses-sistemleri/televizyonlar/4k-tv">4K TV</a></li><li><a href="/pasaj/tv-ses-sistemleri/televizyonlar/8k-tv">8K TV</a></li><li><a href="/pasaj/tv-ses-sistemleri/televizyonlar/oled-tv">OLED TV</a></li><li><a href="/pasaj/tv-ses-sistemleri/televizyonlar/qled-tv">QLED TV</a></li></ul></li><li data-analytic-index="2" class="js-has-sublist"><a href="/pasaj/tv-ses-sistemleri/televizyon-aksesuarlari">Televizyon Aksesuarları</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/tv-ses-sistemleri/televizyon-aksesuarlari/tv-aski-aparatlari">TV Askı Aparatları</a></li><li><a href="/pasaj/tv-ses-sistemleri/televizyon-aksesuarlari/kumandalar">Kumandalar</a></li></ul></li><li data-analytic-index="3" class="js-has-sublist"><a href="/pasaj/tv-ses-sistemleri/projeksiyon-sistemleri">Projeksiyon Sistemleri</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/tv-ses-sistemleri/projeksiyon-sistemleri/projeksiyon-cihazlari">Projeksiyon Cihazları</a></li><li><a href="/pasaj/tv-ses-sistemleri/projeksiyon-sistemleri/tasinabilir-projeksiyon-cihazlari">Taşınabilir Projeksiyon Cihazları</a></li></ul></li><li data-analytic-index="4" class="js-has-sublist"><a href="/pasaj/tv-ses-sistemleri/ses-sistemleri">Ses Sistemleri</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/tv-ses-sistemleri/ses-sistemleri/hoparlorler">Hoparlörler</a></li><li><a href="/pasaj/tv-ses-sistemleri/ses-sistemleri/ev-sinema-sistemleri">Ev Sinema Sistemleri</a></li><li><a href="/pasaj/tv-ses-sistemleri/ses-sistemleri/soundbar">Soundbar</a></li><li><a href="/pasaj/tv-ses-sistemleri/ses-sistemleri/subwoofer">Subwoofer</a></li></ul></li><li data-analytic-index="5" class="js-has-sublist"><a href="/pasaj/tv-ses-sistemleri/media-player">Media Player</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li></ul></li><li data-analytic-index="6" class="js-has-sublist"><a href="/pasaj/tv-ses-sistemleri/uydu-sistemleri">Uydu Sistemleri</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/tv-ses-sistemleri/uydu-sistemleri/uydu-alicilar">Uydu Alıcılar</a></li></ul></li><li><a href="/pasaj/tv-ses-sistemleri" class="all">Tüm TV-Ses Sistemleri <i class="icon-p-arrow-down"></i></a></li></ul><div class="o-p-header__dropdown__cards"><div data-analytic-index="0" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item active"><div><a href="/pasaj/tv-ses-sistemleri/ses-sistemleri/hoparlorler/mini-hoparlorler/harman-kardon-go-play-mini-bluetooth-hoparlor" class="google-analytics-device device-detail-btn m-p-pc-new" style="" data-product-id="harman-kardon-go-play-mini-bluetooth-hoparlor" data-campaign="campaign," data-href="/pasaj/tv-ses-sistemleri/ses-sistemleri/hoparlorler/mini-hoparlorler/harman-kardon-go-play-mini-bluetooth-hoparlor" data-image-url="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Cihaz/aksesuar/harman-kardon/go-play-mini-bluetooth-hoparlor/cg/1.png"><div class="a-fav-button" data-url="/pasaj/user-favorite-operation" data-device-path="/pasaj/tv-ses-sistemleri/ses-sistemleri/hoparlorler/mini-hoparlorler/harman-kardon-go-play-mini-bluetooth-hoparlor" data-device-id="1031983" data-pm-name="Harman Kardon Go Play Mini Bluetooth Hoparlör"><span class="tooltip tooltipstered" data-alternative="Favoriden Çıkar"><svg class="heart" xmlns="http://www.w3.org/2000/svg" width="36" height="32" viewBox="0 0 36 32"><path fill="#FFC900" fill-rule="nonzero" stroke="#FFC900" class="heart-line" d="M3.058 2.738l-.104.104C-.983 6.779-.985 13.165 2.95 17.1l12.678 12.678c.847.847 2.213.849 3.062 0L31.368 17.1c3.938-3.938 3.938-10.317-.004-14.258l-.104-.104c-3.654-3.654-9.578-3.65-13.237.009l-.614.614c-.137.137-.363.137-.5 0l-.614-.614C12.638-.91 6.709-.913 3.058 2.738zM15.89 4.38c.7.7 1.836.7 2.536 0l.614-.614c3.097-3.097 8.11-3.1 11.201-.009l.104.104c3.379 3.38 3.38 8.846.004 12.221L17.671 28.76c-.285.285-.74.285-1.024 0L3.968 16.08C.596 12.71.598 7.235 3.972 3.86l.104-.104c3.088-3.088 8.106-3.085 11.2.009l.615.614z" transform="translate(-1254 -352) translate(1255 353)"></path><path fill="#ffc900" class="heart-fill" d="M15.994 3.47C12.784.213 7.577.215 4.368 3.47l-.258.262C.48 7.412.48 13.379 4.107 17.056l12.445 12.619c.556.563 1.462.558 2.013 0L31.01 17.056c3.628-3.679 3.629-9.642-.002-13.324l-.26-.263c-3.21-3.255-8.413-3.256-11.625 0l-1.057 1.073c-.28.284-.736.282-1.014 0l-1.058-1.073z" transform="translate(-1254 -352) translate(1239 328) translate(16 25)"></path></svg></span></div><div class="m-p-pc-new__body"><div class="m-p-pc-new__carousel"><div class="swiper-container swiper-container-initialized swiper-container-horizontal"><div class="swiper-wrapper" style="transition-duration: 0ms;"><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Cihaz/aksesuar/harman-kardon/go-play-mini-bluetooth-hoparlor/cg/1/1_250x188.png?17735349480672" alt="Harman Kardon Go Play Mini Bluetooth Hoparlör" class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Cihaz/aksesuar/harman-kardon/go-play-mini-bluetooth-hoparlor/cg/2/2_250x188.png?17735349480672" alt="Harman Kardon Go Play Mini Bluetooth Hoparlör" class="swiper-lazy"></figure></div></div><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div><div class="m-p-pc-new__carousel__pagination swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"></div><div class="m-p-pc-new__colors"><span class="m-p-pc-new__colors__color" style="background: #FFFFFF; border:1px solid #edf0f2"></span><span class="m-p-pc-new__colors__color" style="background: #000000"></span></div></div><span class="m-p-pc-new__title">Harman Kardon Go Play Mini Bluetooth Hoparlör</span><div class="a-rate"><div class="a-rate__star" data-point="4.8"><span class="icon-star-filled"></span><span class="icon-star-filled"></span><span class="icon-star-filled"></span><span class="icon-star-filled"></span><span class="icon-star-half"></span></div><div class="a-rate__point">4,8 </div></div><div class="m-p-pc-new__badges"><div class="m-p-pc-new__badge" style="background: #E5F8FF">Peşine 3<br> Taksit</div><div class="m-p-pc-new__badge" style="background: #E5F8FF">Alışveriş<br>Kredisi</div><div class="m-p-pc-new__badge" style="background: #FDF7E7">Ücretsiz<br>Kargo</div></div></div><div class="m-p-pc-new__foot"><div class="m-p-pc-new__price m-p-pc-new__price--secondary"> 11.900 <span class="m-p-pc-new__price__cur">TL </span></div></div>
                    <!-- google-analytics --><div id="google-analytics-device-informations" style="display: none;" data-section-title="TV-Ses Sistemleri - " data-product-id="1031983" data-product-name="Harman Kardon Go Play Mini Bluetooth Hoparlör" data-product-price="11900.0" data-product-brand="Harman Kardon" data-position="1" data-dimension21="TRY" data-dimension22="false" data-dimension25="Pesin" data-dimension27="true" data-dimension30="Non-Turkcell" data-dimension156="true" data-dimension157="0" data-dimension167="13" data-dimension168="2" data-dimension169="6" data-dimension170="4.83" data-ribbon_ozel="false" data-ribbon-tlkupon="false" data-ribbon-tukeniyor="false" data-ribbon-firsaturunu="false" data-ribbon-coksatan="false" data-ribbon-gununfirsati="false" data-badge-faturayaektaksitli="false" data-badge-pesinfiyatinataksit="Peşine 3<br> Taksit, 1" data-badge-alisveriskredisi="1" data-badge-faturanlaode="false" data-badge-ucretsizkargo="1" data-badge-hizliteslimat="0" data-badge-magazadanteslim="false" data-badge-anindateslim="false" data-dahili-hafiza="" data-countdown="" data-indirim-tutari="0" data-indirim-orani="0" data-unit-sale-price="11900.0" data-dimension175="Mini Hoparlörler" data-product-category="TV-Ses Sistemleri" data-dimension173="Ses Sistemleri" data-dimension174="Hoparlörler"></div>
                    <!-- google-analytics -->
                  </a></div><div><a href="/pasaj/tv-ses-sistemleri/televizyonlar/qled-tv/toshiba-50qa7d63dt-50-inc-126-ekran-4k-ultra-hd-android-smart-qled-tv" class="google-analytics-device device-detail-btn m-p-pc-new" style="" data-product-id="toshiba-50qa7d63dt-50-inc-126-ekran-4k-ultra-hd-android-smart-qled-tv" data-campaign="campaign,discount," data-href="/pasaj/tv-ses-sistemleri/televizyonlar/qled-tv/toshiba-50qa7d63dt-50-inc-126-ekran-4k-ultra-hd-android-smart-qled-tv" data-image-url="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00IMOR/00IMOR-1.png"><div class="a-p-card-ribbon a-p-card-ribbon--a a-p-card-ribbon--short " style="background: #00BAFC"> Günün Fırsatları </div><div class="a-fav-button" data-url="/pasaj/user-favorite-operation" data-device-path="/pasaj/tv-ses-sistemleri/televizyonlar/qled-tv/toshiba-50qa7d63dt-50-inc-126-ekran-4k-ultra-hd-android-smart-qled-tv" data-device-id="1104932" data-pm-name="Toshiba 50QA7D63DT 50 inç 126 Ekran 4K Ultra HD Android Smart QLED TV"><span class="tooltip tooltipstered" data-alternative="Favoriden Çıkar"><svg class="heart" xmlns="http://www.w3.org/2000/svg" width="36" height="32" viewBox="0 0 36 32"><path fill="#FFC900" fill-rule="nonzero" stroke="#FFC900" class="heart-line" d="M3.058 2.738l-.104.104C-.983 6.779-.985 13.165 2.95 17.1l12.678 12.678c.847.847 2.213.849 3.062 0L31.368 17.1c3.938-3.938 3.938-10.317-.004-14.258l-.104-.104c-3.654-3.654-9.578-3.65-13.237.009l-.614.614c-.137.137-.363.137-.5 0l-.614-.614C12.638-.91 6.709-.913 3.058 2.738zM15.89 4.38c.7.7 1.836.7 2.536 0l.614-.614c3.097-3.097 8.11-3.1 11.201-.009l.104.104c3.379 3.38 3.38 8.846.004 12.221L17.671 28.76c-.285.285-.74.285-1.024 0L3.968 16.08C.596 12.71.598 7.235 3.972 3.86l.104-.104c3.088-3.088 8.106-3.085 11.2.009l.615.614z" transform="translate(-1254 -352) translate(1255 353)"></path><path fill="#ffc900" class="heart-fill" d="M15.994 3.47C12.784.213 7.577.215 4.368 3.47l-.258.262C.48 7.412.48 13.379 4.107 17.056l12.445 12.619c.556.563 1.462.558 2.013 0L31.01 17.056c3.628-3.679 3.629-9.642-.002-13.324l-.26-.263c-3.21-3.255-8.413-3.256-11.625 0l-1.057 1.073c-.28.284-.736.282-1.014 0l-1.058-1.073z" transform="translate(-1254 -352) translate(1239 328) translate(16 25)"></path></svg></span></div><div class="m-p-pc-new__body"><div class="m-p-pc-new__carousel"><div class="swiper-container swiper-container-initialized swiper-container-horizontal"><div class="swiper-wrapper" style="transition-duration: 0ms;"><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00IMOR/00IMOR-1/00IMOR-1_250x188.png?17735349480672" alt="Toshiba 50QA7D63DT 50 inç 126 Ekran 4K Ultra HD Android Smart QLED TV" class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00IMOR/00IMOR-2/00IMOR-2_250x188.png?17735349480672" alt="Toshiba 50QA7D63DT 50 inç 126 Ekran 4K Ultra HD Android Smart QLED TV" class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00IMOR/00IMOR-3/00IMOR-3_250x188.png?17735349480672" alt="Toshiba 50QA7D63DT 50 inç 126 Ekran 4K Ultra HD Android Smart QLED TV" class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00IMOR/00IMOR-4/00IMOR-4_250x188.png?17735349480672" alt="Toshiba 50QA7D63DT 50 inç 126 Ekran 4K Ultra HD Android Smart QLED TV" class="swiper-lazy"></figure></div></div><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div><div class="m-p-pc-new__carousel__pagination swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"></div></div><span class="m-p-pc-new__title">Toshiba 50QA7D63DT 50 inç 126 Ekran 4K Ultra HD Android Smart QLED TV</span><div class="a-rate"><div class="a-rate__star" data-point="5.0"><span class="icon-star-filled"></span><span class="icon-star-filled"></span><span class="icon-star-filled"></span><span class="icon-star-filled"></span><span class="icon-star-filled"></span></div><div class="a-rate__point">5,0 </div></div><div class="m-p-pc-new__badges"><div class="m-p-pc-new__badge" style="background: #00e90a1a">Alışveriş<br>Kredisi</div><div class="m-p-pc-new__badge" style="background: #E5F8FF">Peşine 3<br> Taksit</div><div class="m-p-pc-new__badge" style="background: #FDF7E7">Ücretsiz<br>Kargo</div></div></div><div class="m-p-pc-new__foot"><div class="m-p-pc-new__price m-p-pc-new__price--secondary"><div class="m-p-pc-new__price">17.499 <span class="m-p-pc-new__price__cur">TL</span></div><div class="m-p-pc-new__price m-p-pc-new__price--box"><div class="m-p-pc-new__price--old">18.199 <span class="m-p-pc-new__price__cur">TL <span class="m-p-pc-new__price__cur__discount">700 TL İndirim</span></span></div></div><div class="m-p-pc-new__lowest-price">Son 30 günün en düşük fiyatı</div></div></div>
                    <!-- google-analytics --><div id="google-analytics-device-informations" style="display: none;" data-section-title="TV-Ses Sistemleri - " data-product-id="1104932" data-product-name="Toshiba 50QA7D63DT 50 inç 126 Ekran 4K Ultra HD Android Smart QLED TV" data-product-price="17499.0" data-product-brand="Toshiba" data-position="1" data-dimension21="TRY" data-dimension22="true" data-dimension25="Pesin" data-dimension27="true" data-dimension30="Non-Turkcell" data-dimension156="true" data-dimension157="3.8" data-dimension167="9" data-dimension168="4" data-dimension169="4" data-dimension170="5" data-ribbon_ozel="false" data-ribbon-tlkupon="false" data-ribbon-tukeniyor="false" data-ribbon-firsaturunu="false" data-ribbon-coksatan="false" data-ribbon-gununfirsati="1" data-badge-faturayaektaksitli="1" data-badge-pesinfiyatinataksit="Peşine 3<br> Taksit, 1" data-badge-alisveriskredisi="false" data-badge-faturanlaode="false" data-badge-ucretsizkargo="1" data-badge-hizliteslimat="0" data-badge-magazadanteslim="false" data-badge-anindateslim="false" data-dahili-hafiza="" data-countdown="2024/02/29,20:59:00" data-indirim-tutari="700" data-indirim-orani="3.8" data-unit-sale-price="17499.0" data-product-category="TV-Ses Sistemleri" data-dimension173="Televizyonlar" data-dimension174="QLED TV"></div>
                    <!-- google-analytics -->
                  </a></div></div><div data-analytic-index="1" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="2" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="3" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="4" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="5" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="6" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item"></div></div></div><div class="o-p-header__dropdown__item" id="8c45abbb-ef0d-47a7-b405-a5f15af5467c"><ul class="o-p-header__dropdown__list"><li data-analytic-index="0" class=""><a href=""></a></li><li data-analytic-index="1" class="js-has-sublist"><a href="/pasaj/ev-yasam/gonul-pasaji">Gönül Bağı Pasajı</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/ev-yasam/gonul-pasaji/adana-pasaji">Adana Pasajı</a></li><li><a href="/pasaj/ev-yasam/gonul-pasaji/adiyaman-pasaji">Adıyaman Pasajı</a></li><li><a href="/pasaj/ev-yasam/gonul-pasaji/diyarbakir-pasaji">Diyarbakır Pasajı</a></li><li><a href="/pasaj/ev-yasam/gonul-pasaji/elazig-pasaji">Elazığ Pasajı</a></li><li><a href="/pasaj/ev-yasam/gonul-pasaji/gaziantep-pasaji">Gaziantep Pasajı</a></li><li><a href="/pasaj/ev-yasam/gonul-pasaji/hatay-pasaji">Hatay Pasajı</a></li><li><a href="/pasaj/ev-yasam/gonul-pasaji/kahramanmaras-pasaji">Kahramanmaraş Pasajı</a></li><li><a href="/pasaj/ev-yasam/gonul-pasaji/kilis-pasaji">Kilis Pasajı</a></li><li><a href="/pasaj/ev-yasam/gonul-pasaji/malatya-pasaji">Malatya Pasajı</a></li><li><a href="/pasaj/ev-yasam/gonul-pasaji/osmaniye-pasaji">Osmaniye Pasajı</a></li><li><a href="/pasaj/ev-yasam/gonul-pasaji/sanliurfa-pasaji">Şanlıurfa Pasajı</a></li></ul></li><li data-analytic-index="2" class="js-has-sublist"><a href="/pasaj/ev-yasam/spor-ve-outdoor-urunleri">Spor &amp; Outdoor Ürünleri</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/ev-yasam/spor-ve-outdoor-urunleri/fitness-urunleri">Fitness Ürünleri</a></li><li><a href="/pasaj/ev-yasam/spor-ve-outdoor-urunleri/bisiklet-motorsiklet-urunleri">Bisiklet &amp; Motorsiklet Ürünleri</a></li><li><a href="/pasaj/ev-yasam/spor-ve-outdoor-urunleri/outdoor-urunleri">Kamp Malzemeleri &amp; Outdoor Ürünleri</a></li><li><a href="/pasaj/ev-yasam/spor-ve-outdoor-urunleri/yoga-urunleri">Yoga-Pilates Ürünleri</a></li><li><a href="/pasaj/ev-yasam/spor-ve-outdoor-urunleri/spor-ekipmanlari">Spor Ekipmanları</a></li><li><a href="/pasaj/ev-yasam/spor-ve-outdoor-urunleri/kis-sporlari">Kış Sporları</a></li><li><a href="/pasaj/ev-yasam/spor-ve-outdoor-urunleri/su-sporlari-malzemeleri">Su Sporları Malzemeleri</a></li></ul></li><li data-analytic-index="3" class="js-has-sublist"><a href="/pasaj/ev-yasam/akilli-ev-cozumleri">Akıllı Ev Çözümleri</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/ev-yasam/akilli-ev-cozumleri/medya-oynatici-urunler">Medya Oynatıcılar</a></li><li><a href="/pasaj/ev-yasam/akilli-ev-cozumleri/aydinlatma-urunleri">Aydınlatma Ürünleri</a></li><li><a href="/pasaj/ev-yasam/akilli-ev-cozumleri/guvenlik-cozumleri">Güvenlik Çözümleri</a></li><li><a href="/pasaj/ev-yasam/akilli-ev-cozumleri/modem-network-urunleri">Modem &amp; Network Ürünleri</a></li></ul></li><li data-analytic-index="4" class="js-has-sublist"><a href="/pasaj/ev-yasam/pet-shop">Pet Shop</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/ev-yasam/pet-shop/kedi">Kedi</a></li><li><a href="/pasaj/ev-yasam/pet-shop/kopek">Köpek</a></li><li><a href="/pasaj/ev-yasam/pet-shop/tasima-cantalari">Taşıma Çantaları</a></li><li><a href="/pasaj/ev-yasam/pet-shop/evcil-hayvan-urunleri">Evcil Hayvan Oyuncakları</a></li><li><a href="/pasaj/ev-yasam/pet-shop/evcil-hayvan-bakim-urunleri">Evcil Hayvan Bakım Ürünleri</a></li><li><a href="/pasaj/ev-yasam/pet-shop/teknolojik-urunler">Teknolojik Ürünler</a></li></ul></li><li data-analytic-index="5" class="js-has-sublist"><a href="/pasaj/ev-yasam/canta-valiz">Çanta &amp; Valiz</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/ev-yasam/canta-valiz/cantalar">Çantalar</a></li><li><a href="/pasaj/ev-yasam/canta-valiz/valizler">Valizler</a></li></ul></li><li data-analytic-index="6" class="js-has-sublist"><a href="/pasaj/ev-yasam/arac-cozumleri">Araç Çözümleri</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/ev-yasam/arac-cozumleri/arac-guvenlik-teknolojileri">Araç Güvenlik Teknolojileri</a></li><li><a href="/pasaj/ev-yasam/arac-cozumleri/arac-donanim-urunleri">Araç Donanım Ürünleri</a></li></ul></li><li data-analytic-index="7" class="js-has-sublist"><a href="/pasaj/ev-yasam/yapi-market-urunleri">Yapı Market Ürünleri</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/ev-yasam/yapi-market-urunleri/akim-korumali-priz">Akım Korumalı Prizler</a></li></ul></li><li data-analytic-index="8" class="js-has-sublist"><a href="/pasaj/ev-yasam/ofis-malzemeleri">Ofis Malzemeleri</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/ev-yasam/ofis-malzemeleri/piller">Piller</a></li></ul></li><li data-analytic-index="9" class="js-has-sublist"><a href="/pasaj/ev-yasam/akilli-ve-ilginc-urunler">Akıllı &amp; İlginç Ürünler</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li></ul></li><li data-analytic-index="10" class="js-has-sublist"><a href="/pasaj/ev-yasam/kadinlarin-elinden-urunleri">Kadınların Elinden Ürünleri</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li></ul></li><li data-analytic-index="11" class="js-has-sublist"><a href="/pasaj/ev-yasam/ramazan-paketi">Ramazan Paketi</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li></ul></li><li><a href="/pasaj/ev-yasam" class="all">Tüm Ev-Yaşam <i class="icon-p-arrow-down"></i></a></li></ul><div class="o-p-header__dropdown__cards"><div data-analytic-index="0" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item active"><div><a href="/pasaj/ev-yasam/akilli-ev-cozumleri/aydinlatma-urunleri/govee-rgbicww-wifi-bluetooth-flow-plus-isik-barlari" class="google-analytics-device device-detail-btn m-p-pc-new" style="" data-product-id="govee-rgbicww-wifi-bluetooth-flow-plus-isik-barlari" data-campaign="campaign,discount," data-href="/pasaj/ev-yasam/akilli-ev-cozumleri/aydinlatma-urunleri/govee-rgbicww-wifi-bluetooth-flow-plus-isik-barlari" data-image-url="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00IUK7/00IUK7-1.png"><div class="a-fav-button" data-url="/pasaj/user-favorite-operation" data-device-path="/pasaj/ev-yasam/akilli-ev-cozumleri/aydinlatma-urunleri/govee-rgbicww-wifi-bluetooth-flow-plus-isik-barlari" data-device-id="1106224" data-pm-name="Govee RGBICWW Wifi + Bluetooth Flow Plus Işık Barları"><span class="tooltip tooltipstered" data-alternative="Favoriden Çıkar"><svg class="heart" xmlns="http://www.w3.org/2000/svg" width="36" height="32" viewBox="0 0 36 32"><path fill="#FFC900" fill-rule="nonzero" stroke="#FFC900" class="heart-line" d="M3.058 2.738l-.104.104C-.983 6.779-.985 13.165 2.95 17.1l12.678 12.678c.847.847 2.213.849 3.062 0L31.368 17.1c3.938-3.938 3.938-10.317-.004-14.258l-.104-.104c-3.654-3.654-9.578-3.65-13.237.009l-.614.614c-.137.137-.363.137-.5 0l-.614-.614C12.638-.91 6.709-.913 3.058 2.738zM15.89 4.38c.7.7 1.836.7 2.536 0l.614-.614c3.097-3.097 8.11-3.1 11.201-.009l.104.104c3.379 3.38 3.38 8.846.004 12.221L17.671 28.76c-.285.285-.74.285-1.024 0L3.968 16.08C.596 12.71.598 7.235 3.972 3.86l.104-.104c3.088-3.088 8.106-3.085 11.2.009l.615.614z" transform="translate(-1254 -352) translate(1255 353)"></path><path fill="#ffc900" class="heart-fill" d="M15.994 3.47C12.784.213 7.577.215 4.368 3.47l-.258.262C.48 7.412.48 13.379 4.107 17.056l12.445 12.619c.556.563 1.462.558 2.013 0L31.01 17.056c3.628-3.679 3.629-9.642-.002-13.324l-.26-.263c-3.21-3.255-8.413-3.256-11.625 0l-1.057 1.073c-.28.284-.736.282-1.014 0l-1.058-1.073z" transform="translate(-1254 -352) translate(1239 328) translate(16 25)"></path></svg></span></div><div class="m-p-pc-new__body"><div class="m-p-pc-new__carousel"><div class="swiper-container swiper-container-initialized swiper-container-horizontal"><div class="swiper-wrapper" style="transition-duration: 0ms;"><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00IUK7/00IUK7-1/00IUK7-1_250x188.png?17735349480672" alt="Govee RGBICWW Wifi + Bluetooth Flow Plus Işık Barları" class="swiper-lazy"></figure></div></div><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div><div class="m-p-pc-new__carousel__pagination swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"></div></div><span class="m-p-pc-new__title">Govee RGBICWW Wifi + Bluetooth Flow Plus Işık Barları</span><div class="a-rate__point"></div><div class="m-p-pc-new__badges"><div class="m-p-pc-new__badge" style="background: #00e90a1a">Faturana Ek 36 Taksit</div><div class="m-p-pc-new__badge" style="background: #E5F8FF">Peşine 3<br> Taksit</div><div class="m-p-pc-new__badge" style="background: #FDF7E7">Ücretsiz<br>Kargo</div></div></div><div class="m-p-pc-new__foot"><div class="m-p-pc-new__price m-p-pc-new__price--secondary"><div class="m-p-pc-new__price">2.299 <span class="m-p-pc-new__price__cur">TL</span></div><div class="m-p-pc-new__price m-p-pc-new__price--box"><div class="m-p-pc-new__price--old">2.499 <span class="m-p-pc-new__price__cur">TL <span class="m-p-pc-new__price__cur__discount">200 TL İndirim</span></span></div></div><div class="m-p-pc-new__lowest-price">Son 30 günün en düşük fiyatı</div></div></div>
                    <!-- google-analytics --><div id="google-analytics-device-informations" style="display: none;" data-section-title="Ev-Yaşam - " data-product-id="1106224" data-product-name="Govee RGBICWW Wifi + Bluetooth Flow Plus Işık Barları" data-product-price="2299.0" data-product-brand="Govee" data-position="1" data-dimension21="TRY" data-dimension22="true" data-dimension25="Pesin" data-dimension27="true" data-dimension30="Non-Turkcell" data-dimension156="true" data-dimension157="8" data-dimension167="17" data-dimension168="1" data-dimension169="0" data-dimension170="0" data-ribbon_ozel="false" data-ribbon-tlkupon="false" data-ribbon-tukeniyor="false" data-ribbon-firsaturunu="false" data-ribbon-coksatan="false" data-ribbon-gununfirsati="false" data-badge-faturayaektaksitli="Faturana Ek 36 Taksit, 1" data-badge-pesinfiyatinataksit="Peşine 3<br> Taksit, 1" data-badge-alisveriskredisi="0" data-badge-faturanlaode="0" data-badge-ucretsizkargo="1" data-badge-hizliteslimat="0" data-badge-magazadanteslim="false" data-badge-anindateslim="false" data-dahili-hafiza="" data-countdown="2024/02/29,20:59:00" data-indirim-tutari="200" data-indirim-orani="8" data-unit-sale-price="2299.0" data-product-category="Ev-Yaşam" data-dimension173="Akıllı Ev Çözümleri" data-dimension174="Aydınlatma Ürünleri"></div>
                    <!-- google-analytics -->
                  </a></div><div><a href="/pasaj/ev-yasam/spor-ve-outdoor-urunleri/fitness-urunleri/voit-connect-ac-kosu-bandi" class="google-analytics-device device-detail-btn m-p-pc-new" style="" data-product-id="voit-connect-ac-kosu-bandi" data-campaign="campaign,discount," data-href="/pasaj/ev-yasam/spor-ve-outdoor-urunleri/fitness-urunleri/voit-connect-ac-kosu-bandi" data-image-url="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00GCV9/00GCV9-1.png"><div class="a-p-card-ribbon a-p-card-ribbon--a a-p-card-ribbon--short " style="background: #00BAFC"> Günün Fırsatları </div><div class="a-fav-button" data-url="/pasaj/user-favorite-operation" data-device-path="/pasaj/ev-yasam/spor-ve-outdoor-urunleri/fitness-urunleri/voit-connect-ac-kosu-bandi" data-device-id="1096039" data-pm-name="Voit Connect AC Koşu Bandı"><span class="tooltip tooltipstered" data-alternative="Favoriden Çıkar"><svg class="heart" xmlns="http://www.w3.org/2000/svg" width="36" height="32" viewBox="0 0 36 32"><path fill="#FFC900" fill-rule="nonzero" stroke="#FFC900" class="heart-line" d="M3.058 2.738l-.104.104C-.983 6.779-.985 13.165 2.95 17.1l12.678 12.678c.847.847 2.213.849 3.062 0L31.368 17.1c3.938-3.938 3.938-10.317-.004-14.258l-.104-.104c-3.654-3.654-9.578-3.65-13.237.009l-.614.614c-.137.137-.363.137-.5 0l-.614-.614C12.638-.91 6.709-.913 3.058 2.738zM15.89 4.38c.7.7 1.836.7 2.536 0l.614-.614c3.097-3.097 8.11-3.1 11.201-.009l.104.104c3.379 3.38 3.38 8.846.004 12.221L17.671 28.76c-.285.285-.74.285-1.024 0L3.968 16.08C.596 12.71.598 7.235 3.972 3.86l.104-.104c3.088-3.088 8.106-3.085 11.2.009l.615.614z" transform="translate(-1254 -352) translate(1255 353)"></path><path fill="#ffc900" class="heart-fill" d="M15.994 3.47C12.784.213 7.577.215 4.368 3.47l-.258.262C.48 7.412.48 13.379 4.107 17.056l12.445 12.619c.556.563 1.462.558 2.013 0L31.01 17.056c3.628-3.679 3.629-9.642-.002-13.324l-.26-.263c-3.21-3.255-8.413-3.256-11.625 0l-1.057 1.073c-.28.284-.736.282-1.014 0l-1.058-1.073z" transform="translate(-1254 -352) translate(1239 328) translate(16 25)"></path></svg></span></div><div class="m-p-pc-new__body"><div class="m-p-pc-new__carousel"><div class="swiper-container swiper-container-initialized swiper-container-horizontal"><div class="swiper-wrapper" style="transition-duration: 0ms;"><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00GCV9/00GCV9-1/00GCV9-1_250x188.png?17735349480672" alt="Voit Connect AC Koşu Bandı" class="swiper-lazy"></figure></div></div><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div><div class="m-p-pc-new__carousel__pagination swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"></div></div><span class="m-p-pc-new__title">Voit Connect AC Koşu Bandı</span><div class="a-rate__point"></div><div class="m-p-pc-new__badges"><div class="m-p-pc-new__badge" style="background: #E5F8FF">Peşine 3<br> Taksit</div><div class="m-p-pc-new__badge" style="background: #E5F8FF">Alışveriş<br>Kredisi</div><div class="m-p-pc-new__badge" style="background: #FDF7E7">Ücretsiz<br>Kargo</div></div></div><div class="m-p-pc-new__foot"><div class="m-p-pc-new__price m-p-pc-new__price--secondary"><div class="m-p-pc-new__price">59.999 <span class="m-p-pc-new__price__cur">TL</span></div><div class="m-p-pc-new__price m-p-pc-new__price--box"><div class="m-p-pc-new__price--old">64.999 <span class="m-p-pc-new__price__cur">TL <span class="m-p-pc-new__price__cur__discount">5.000 TL İndirim</span></span></div></div><div class="m-p-pc-new__lowest-price">Son 30 günün en düşük fiyatı</div></div></div>
                    <!-- google-analytics --><div id="google-analytics-device-informations" style="display: none;" data-section-title="Ev-Yaşam - " data-product-id="1096039" data-product-name="Voit Connect AC Koşu Bandı" data-product-price="59999.0" data-product-brand="Voit" data-position="1" data-dimension21="TRY" data-dimension22="true" data-dimension25="Pesin" data-dimension27="true" data-dimension30="Non-Turkcell" data-dimension156="true" data-dimension157="7.7" data-dimension167="15" data-dimension168="1" data-dimension169="0" data-dimension170="0" data-ribbon_ozel="false" data-ribbon-tlkupon="false" data-ribbon-tukeniyor="false" data-ribbon-firsaturunu="false" data-ribbon-coksatan="false" data-ribbon-gununfirsati="1" data-badge-faturayaektaksitli="false" data-badge-pesinfiyatinataksit="Peşine 3<br> Taksit, 1" data-badge-alisveriskredisi="1" data-badge-faturanlaode="false" data-badge-ucretsizkargo="1" data-badge-hizliteslimat="0" data-badge-magazadanteslim="false" data-badge-anindateslim="false" data-dahili-hafiza="" data-countdown="11.04.2024" data-indirim-tutari="5000" data-indirim-orani="7.7" data-unit-sale-price="59999.0" data-product-category="Ev-Yaşam" data-dimension173="Spor &amp; Outdoor Ürünleri" data-dimension174="Fitness Ürünleri"></div>
                    <!-- google-analytics -->
                  </a></div></div><div data-analytic-index="1" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="2" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="3" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="4" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="5" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="6" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="7" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="8" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="9" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="10" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="11" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item"></div></div></div><div class="o-p-header__dropdown__item" id="8b52dd49-fe46-4e24-87cf-3875a2289207"><ul class="o-p-header__dropdown__list"><li data-analytic-index="0" class=""><a href=""></a></li><li data-analytic-index="1" class="js-has-sublist"><a href="/pasaj/anne-bebek-oyuncak/bebek-arac-ve-gerecleri">Bebek Araç &amp; Gereçleri</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/anne-bebek-oyuncak/bebek-arac-ve-gerecleri/ana-kucaklari">Ana Kucakları</a></li><li><a href="/pasaj/anne-bebek-oyuncak/bebek-arac-ve-gerecleri/besikler">Beşikler</a></li><li><a href="/pasaj/anne-bebek-oyuncak/bebek-arac-ve-gerecleri/guvenlik-urunleri">Güvenlik Ürünleri</a></li><li><a href="/pasaj/anne-bebek-oyuncak/bebek-arac-ve-gerecleri/kanguru-ve-portbebeler">Kanguru &amp; Portbebeler</a></li><li><a href="/pasaj/anne-bebek-oyuncak/bebek-arac-ve-gerecleri/mama-sandalyeleri">Mama Sandalyeleri</a></li><li><a href="/pasaj/anne-bebek-oyuncak/bebek-arac-ve-gerecleri/oto-koltuklari">Oto Koltukları</a></li><li><a href="/pasaj/anne-bebek-oyuncak/bebek-arac-ve-gerecleri/park-yataklar">Park Yataklar</a></li><li><a href="/pasaj/anne-bebek-oyuncak/bebek-arac-ve-gerecleri/bebek-arabalari">Bebek Arabaları</a></li><li><a href="/pasaj/anne-bebek-oyuncak/bebek-arac-ve-gerecleri/pusetler">Pusetler</a></li></ul></li><li data-analytic-index="2" class="js-has-sublist"><a href="/pasaj/anne-bebek-oyuncak/oyuncaklar">Oyuncaklar</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/anne-bebek-oyuncak/oyuncaklar/puzzle-ve-yapbozlar">Puzzle &amp; Yapbozlar</a></li><li><a href="/pasaj/anne-bebek-oyuncak/oyuncaklar/yapi-oyuncaklari">Yapı Oyuncakları</a></li><li><a href="/pasaj/anne-bebek-oyuncak/oyuncaklar/kiz-cocuk-oyuncaklari">Kız Çocuk Oyuncakları</a></li><li><a href="/pasaj/anne-bebek-oyuncak/oyuncaklar/oyun-hamurlari">Oyun Hamurları</a></li><li><a href="/pasaj/anne-bebek-oyuncak/oyuncaklar/erkek-cocuk-oyuncaklari">Erkek Çocuk Oyuncakları</a></li><li><a href="/pasaj/anne-bebek-oyuncak/oyuncaklar/oyuncak-arabalar">Oyuncak Arabalar</a></li><li><a href="/pasaj/anne-bebek-oyuncak/oyuncaklar/oyuncak-bebekler">Oyuncak Bebekler</a></li><li><a href="/pasaj/anne-bebek-oyuncak/oyuncaklar/akulu-arabalar">Akülü Arabalar</a></li><li><a href="/pasaj/anne-bebek-oyuncak/oyuncaklar/akilli-oyuncaklar">Akıllı Oyuncaklar</a></li></ul></li><li data-analytic-index="3" class="js-has-sublist"><a href="/pasaj/anne-bebek-oyuncak/bebek-tekstil-urunleri">Bebek Tekstil Ürünleri</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/anne-bebek-oyuncak/bebek-tekstil-urunleri/bebek-battaniyeleri">Bebek Battaniyeleri</a></li></ul></li><li data-analytic-index="4" class="js-has-sublist"><a href="/pasaj/anne-bebek-oyuncak/cocuk-cantalari">Çocuk Çantaları</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li></ul></li><li data-analytic-index="5" class="js-has-sublist"><a href="/pasaj/anne-bebek-oyuncak/bebek-oyuncaklari">Bebek Oyuncakları</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/anne-bebek-oyuncak/bebek-oyuncaklari/oyun-halilari-ve-aktivite-merkezi">Oyun Halıları ve Aktivite Merkezi</a></li><li><a href="/pasaj/anne-bebek-oyuncak/bebek-oyuncaklari/plaj-oyuncaklari">Plaj Oyuncakları</a></li><li><a href="/pasaj/anne-bebek-oyuncak/bebek-oyuncaklari/aktivite-masalari">Aktivite Masaları</a></li><li><a href="/pasaj/anne-bebek-oyuncak/bebek-oyuncaklari/ilk-yas-oyuncaklari">İlk Yaş Oyuncakları</a></li><li><a href="/pasaj/anne-bebek-oyuncak/bebek-oyuncaklari/egitici-setler">Eğitici Setler</a></li></ul></li><li data-analytic-index="6" class="js-has-sublist"><a href="/pasaj/anne-bebek-oyuncak/beslenme-gerecleri">Beslenme Gereçleri</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/anne-bebek-oyuncak/beslenme-gerecleri/bebek-onlukleri">Bebek Önlükleri</a></li><li><a href="/pasaj/anne-bebek-oyuncak/beslenme-gerecleri/mama-hazirlayicilar">Mama Hazırlayıcılar</a></li><li><a href="/pasaj/anne-bebek-oyuncak/beslenme-gerecleri/biberonlar">Biberonlar</a></li><li><a href="/pasaj/anne-bebek-oyuncak/beslenme-gerecleri/suluk-matara">Suluk &amp; Matara</a></li><li><a href="/pasaj/anne-bebek-oyuncak/beslenme-gerecleri/biberon-isiticilari-ve-sterilizatorler">Biberon Isıtıcıları ve Sterilizatörler</a></li><li><a href="/pasaj/anne-bebek-oyuncak/beslenme-gerecleri/emzirme-urunleri">Emzirme Ürünleri</a></li></ul></li><li data-analytic-index="7" class="js-has-sublist"><a href="/pasaj/anne-bebek-oyuncak/bebek-bakim-saglik">Bebek Bakım &amp; Sağlık</a><ul class="o-p-header__dropdown__sub-list"><li><a href=""></a></li><li><a href="/pasaj/anne-bebek-oyuncak/bebek-bakim-saglik/bebek-bakim-cantalari">Bebek Bakım Çantaları</a></li><li><a href="/pasaj/anne-bebek-oyuncak/bebek-bakim-saglik/alt-acma-ortuleri">Alt Açma Örtüleri</a></li><li><a href="/pasaj/anne-bebek-oyuncak/bebek-bakim-saglik/bebek-tuvalet-urunleri">Bebek Tuvalet Ürünleri</a></li><li><a href="/pasaj/anne-bebek-oyuncak/bebek-bakim-saglik/bebek-banyo-gerecleri">Bebek Banyo Gereçleri</a></li></ul></li><li><a href="/pasaj/anne-bebek-oyuncak" class="all">Tüm Anne-Bebek-Oyuncak <i class="icon-p-arrow-down"></i></a></li></ul><div class="o-p-header__dropdown__cards"><div data-analytic-index="0" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item active"><div><a href="/pasaj/anne-bebek-oyuncak/beslenme-gerecleri/mama-hazirlayicilar/philips-avent-scf870-20-buharli-pisirici-ve-blender" class="google-analytics-device device-detail-btn m-p-pc-new" style="" data-product-id="philips-avent-scf870-20-buharli-pisirici-ve-blender" data-campaign="campaign,discount," data-href="/pasaj/anne-bebek-oyuncak/beslenme-gerecleri/mama-hazirlayicilar/philips-avent-scf870-20-buharli-pisirici-ve-blender" data-image-url="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00JZCE/00JZCE-2.png"><div class="a-fav-button" data-url="/pasaj/user-favorite-operation" data-device-path="/pasaj/anne-bebek-oyuncak/beslenme-gerecleri/mama-hazirlayicilar/philips-avent-scf870-20-buharli-pisirici-ve-blender" data-device-id="1112048" data-pm-name="Philips Avent SCF870/20 Buharlı Pişirici ve Blender"><span class="tooltip tooltipstered" data-alternative="Favoriden Çıkar"><svg class="heart" xmlns="http://www.w3.org/2000/svg" width="36" height="32" viewBox="0 0 36 32"><path fill="#FFC900" fill-rule="nonzero" stroke="#FFC900" class="heart-line" d="M3.058 2.738l-.104.104C-.983 6.779-.985 13.165 2.95 17.1l12.678 12.678c.847.847 2.213.849 3.062 0L31.368 17.1c3.938-3.938 3.938-10.317-.004-14.258l-.104-.104c-3.654-3.654-9.578-3.65-13.237.009l-.614.614c-.137.137-.363.137-.5 0l-.614-.614C12.638-.91 6.709-.913 3.058 2.738zM15.89 4.38c.7.7 1.836.7 2.536 0l.614-.614c3.097-3.097 8.11-3.1 11.201-.009l.104.104c3.379 3.38 3.38 8.846.004 12.221L17.671 28.76c-.285.285-.74.285-1.024 0L3.968 16.08C.596 12.71.598 7.235 3.972 3.86l.104-.104c3.088-3.088 8.106-3.085 11.2.009l.615.614z" transform="translate(-1254 -352) translate(1255 353)"></path><path fill="#ffc900" class="heart-fill" d="M15.994 3.47C12.784.213 7.577.215 4.368 3.47l-.258.262C.48 7.412.48 13.379 4.107 17.056l12.445 12.619c.556.563 1.462.558 2.013 0L31.01 17.056c3.628-3.679 3.629-9.642-.002-13.324l-.26-.263c-3.21-3.255-8.413-3.256-11.625 0l-1.057 1.073c-.28.284-.736.282-1.014 0l-1.058-1.073z" transform="translate(-1254 -352) translate(1239 328) translate(16 25)"></path></svg></span></div><div class="m-p-pc-new__body"><div class="m-p-pc-new__carousel"><div class="swiper-container swiper-container-initialized swiper-container-horizontal"><div class="swiper-wrapper" style="transition-duration: 0ms;"><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00JZCE/00JZCE-2/00JZCE-2_250x188.png?17735349480672" alt="Philips Avent SCF870/20 Buharlı Pişirici ve Blender" class="swiper-lazy"></figure></div></div><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div><div class="m-p-pc-new__carousel__pagination swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"></div></div><span class="m-p-pc-new__title">Philips Avent SCF870/20 Buharlı Pişirici ve Blender</span><div class="a-rate__point"></div><div class="m-p-pc-new__badges"><div class="m-p-pc-new__badge" style="background: #00e90a1a">Faturana Ek 36 Taksit</div><div class="m-p-pc-new__badge" style="background: #E5F8FF">Peşine 3<br> Taksit</div><div class="m-p-pc-new__badge" style="background: #FDF7E7">Ücretsiz<br>Kargo</div></div></div><div class="m-p-pc-new__foot"><div class="m-p-pc-new__price m-p-pc-new__price--secondary"><div class="m-p-pc-new__price">3.069 <span class="m-p-pc-new__price__cur">TL</span></div><div class="m-p-pc-new__price m-p-pc-new__price--box"><div class="m-p-pc-new__price--old">3.199 <span class="m-p-pc-new__price__cur">TL <span class="m-p-pc-new__price__cur__discount">130 TL İndirim</span></span></div></div><div class="m-p-pc-new__lowest-price">Son 30 günün en düşük fiyatı</div></div></div>
                    <!-- google-analytics --><div id="google-analytics-device-informations" style="display: none;" data-section-title="Anne-Bebek-Oyuncak - " data-product-id="1112048" data-product-name="Philips Avent SCF870/20 Buharlı Pişirici ve Blender" data-product-price="3069.0" data-product-brand="Philips" data-position="1" data-dimension21="TRY" data-dimension22="true" data-dimension25="Pesin" data-dimension27="true" data-dimension30="Non-Turkcell" data-dimension156="true" data-dimension157="4.1" data-dimension167="10" data-dimension168="1" data-dimension169="0" data-dimension170="0" data-ribbon_ozel="false" data-ribbon-tlkupon="false" data-ribbon-tukeniyor="false" data-ribbon-firsaturunu="false" data-ribbon-coksatan="false" data-ribbon-gununfirsati="false" data-badge-faturayaektaksitli="Faturana Ek 36 Taksit, 1" data-badge-pesinfiyatinataksit="Peşine 3<br> Taksit, 1" data-badge-alisveriskredisi="0" data-badge-faturanlaode="0" data-badge-ucretsizkargo="1" data-badge-hizliteslimat="0" data-badge-magazadanteslim="false" data-badge-anindateslim="false" data-dahili-hafiza="" data-countdown="2024/02/29,20:59:00" data-indirim-tutari="130" data-indirim-orani="4.1" data-unit-sale-price="3069.0" data-product-category="Anne-Bebek-Oyuncak" data-dimension173="Beslenme Gereçleri" data-dimension174="Mama Hazırlayıcılar"></div>
                    <!-- google-analytics -->
                  </a></div><div><a href="/pasaj/anne-bebek-oyuncak/bebek-arac-ve-gerecleri/ana-kucaklari/babybjorn-balance-bliss-ana-kucagi-cotton" class="google-analytics-device device-detail-btn m-p-pc-new" style="" data-product-id="babybjorn-balance-bliss-ana-kucagi-cotton" data-campaign="campaign," data-href="/pasaj/anne-bebek-oyuncak/bebek-arac-ve-gerecleri/ana-kucaklari/babybjorn-balance-bliss-ana-kucagi-cotton" data-image-url="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00BDX5/1-1653926864269.png"><div class="a-fav-button" data-url="/pasaj/user-favorite-operation" data-device-path="/pasaj/anne-bebek-oyuncak/bebek-arac-ve-gerecleri/ana-kucaklari/babybjorn-balance-bliss-ana-kucagi-cotton" data-device-id="1059190" data-pm-name="Babybjörn Balance Bliss Cotton Ana Kucağı"><span class="tooltip tooltipstered" data-alternative="Favoriden Çıkar"><svg class="heart" xmlns="http://www.w3.org/2000/svg" width="36" height="32" viewBox="0 0 36 32"><path fill="#FFC900" fill-rule="nonzero" stroke="#FFC900" class="heart-line" d="M3.058 2.738l-.104.104C-.983 6.779-.985 13.165 2.95 17.1l12.678 12.678c.847.847 2.213.849 3.062 0L31.368 17.1c3.938-3.938 3.938-10.317-.004-14.258l-.104-.104c-3.654-3.654-9.578-3.65-13.237.009l-.614.614c-.137.137-.363.137-.5 0l-.614-.614C12.638-.91 6.709-.913 3.058 2.738zM15.89 4.38c.7.7 1.836.7 2.536 0l.614-.614c3.097-3.097 8.11-3.1 11.201-.009l.104.104c3.379 3.38 3.38 8.846.004 12.221L17.671 28.76c-.285.285-.74.285-1.024 0L3.968 16.08C.596 12.71.598 7.235 3.972 3.86l.104-.104c3.088-3.088 8.106-3.085 11.2.009l.615.614z" transform="translate(-1254 -352) translate(1255 353)"></path><path fill="#ffc900" class="heart-fill" d="M15.994 3.47C12.784.213 7.577.215 4.368 3.47l-.258.262C.48 7.412.48 13.379 4.107 17.056l12.445 12.619c.556.563 1.462.558 2.013 0L31.01 17.056c3.628-3.679 3.629-9.642-.002-13.324l-.26-.263c-3.21-3.255-8.413-3.256-11.625 0l-1.057 1.073c-.28.284-.736.282-1.014 0l-1.058-1.073z" transform="translate(-1254 -352) translate(1239 328) translate(16 25)"></path></svg></span></div><div class="m-p-pc-new__body"><div class="m-p-pc-new__carousel"><div class="swiper-container swiper-container-initialized swiper-container-horizontal"><div class="swiper-wrapper" style="transition-duration: 0ms;"><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00BDX5/1-1653926864269/1-1653926864269_250x188.png?17735349480672" alt="Babybjörn Balance Bliss Cotton Ana Kucağı" class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00BDX5/2-1653927057080/2-1653927057080_250x188.png?17735349480672" alt="Babybjörn Balance Bliss Cotton Ana Kucağı" class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00BDX5/3-1653927326422/3-1653927326422_250x188.png?17735349480672" alt="Babybjörn Balance Bliss Cotton Ana Kucağı" class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00BDX5/4-1653926900298/4-1653926900298_250x188.png?17735349480672" alt="Babybjörn Balance Bliss Cotton Ana Kucağı" class="swiper-lazy"></figure></div></div><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div><div class="m-p-pc-new__carousel__pagination swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"></div><div class="m-p-pc-new__colors"><span class="m-p-pc-new__colors__color" style="background: #c3b091"></span><span class="m-p-pc-new__colors__color" style="background: #ff69b4"></span><span class="m-p-pc-new__colors__total">+4</span></div></div><span class="m-p-pc-new__title">Babybjörn Balance Bliss Cotton Ana Kucağı</span><div class="a-rate"><div class="a-rate__star" data-point="5.0"><span class="icon-star-filled"></span><span class="icon-star-filled"></span><span class="icon-star-filled"></span><span class="icon-star-filled"></span><span class="icon-star-filled"></span></div><div class="a-rate__point">5,0 </div></div><div class="m-p-pc-new__badges"><div class="m-p-pc-new__badge" style="background: #E5F8FF">Peşine 3<br> Taksit</div><div class="m-p-pc-new__badge" style="background: #E5F8FF">Alışveriş<br>Kredisi</div><div class="m-p-pc-new__badge" style="background: #FDF7E7">Ücretsiz<br>Kargo</div></div></div><div class="m-p-pc-new__foot"><div class="m-p-pc-new__price m-p-pc-new__price--secondary"> 7.699 <span class="m-p-pc-new__price__cur">TL </span></div></div>
                    <!-- google-analytics --><div id="google-analytics-device-informations" style="display: none;" data-section-title="Anne-Bebek-Oyuncak - " data-product-id="1059190" data-product-name="Babybjörn Balance Bliss Cotton Ana Kucağı" data-product-price="7699.0" data-product-brand="Babybjörn" data-position="1" data-dimension21="TRY" data-dimension22="false" data-dimension25="Pesin" data-dimension27="true" data-dimension30="Non-Turkcell" data-dimension156="true" data-dimension157="0" data-dimension167="49" data-dimension168="4" data-dimension169="2" data-dimension170="5" data-ribbon_ozel="false" data-ribbon-tlkupon="false" data-ribbon-tukeniyor="false" data-ribbon-firsaturunu="false" data-ribbon-coksatan="false" data-ribbon-gununfirsati="false" data-badge-faturayaektaksitli="false" data-badge-pesinfiyatinataksit="Peşine 3<br> Taksit, 1" data-badge-alisveriskredisi="1" data-badge-faturanlaode="false" data-badge-ucretsizkargo="1" data-badge-hizliteslimat="0" data-badge-magazadanteslim="false" data-badge-anindateslim="false" data-dahili-hafiza="" data-countdown="" data-indirim-tutari="0" data-indirim-orani="0" data-unit-sale-price="7699.0" data-product-category="Anne-Bebek-Oyuncak" data-dimension173="Bebek Araç &amp; Gereçleri" data-dimension174="Ana Kucakları"></div>
                    <!-- google-analytics -->
                  </a></div></div><div data-analytic-index="1" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="2" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="3" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="4" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="5" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="6" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div data-analytic-index="7" class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item "></div><div class="m-p-flex m-p-flex--evenly o-p-header__dropdown__cards__item"></div></div></div><div class="o-p-header__dropdown__item active" id="login-menu"><div class="o-p-header__dropdown__login" data-login="{
		&quot;appId&quot;: 80006,
		&quot;desktop&quot;:true,
		&quot;loginSdkUrl&quot;: &quot;https://tsdk.turkcell.com.tr/SERVICE/AuthAPI/serviceLogin.json&quot;,
		&quot;logoutSdkUrl&quot;:&quot;&quot;,
		&quot;timeout&quot;: 5000,
		&quot;turkcellLoginUrl&quot;: &quot;/pasaj/giris/passage&quot;,
		&quot;logoutUrl&quot;:&quot;/site/cikis/pasaj&quot;,
		&quot;logoutOtherUrl&quot;: &quot;/pasaj/site/cikis&quot;,
		&quot;errors&quot;:
		{
		&quot;AUTH&quot;: &quot;GSM numaranız ya da Turkcell şifreniz hatalı. Lütfen bilgilerinizi kontrol ederek yeniden deneyiniz.&quot;,
		&quot;PASSWORD_EXPIRED&quot;: &quot;Şifrenizin son kullanma tarihi dolmuş.Tekrar şifre talebinde bulunarak tekrar deneyiniz.&quot;,
	    &quot;ACCOUNT_LOCKED&quot;: &quot;Hesabınız kitlenmiştir, yeniden şifre talep ederek giriş yapabilirsiniz.&quot;,
	    &quot;CAPTCHA_REQUIRED&quot;: &quot;Güvenlik kodunu giriniz.&quot;,
	    &quot;BACKEND_ERROR&quot;: &quot;Bir sorun var, düzeltmek için çalışıyoruz.&quot;
		},
		&quot;fastLoginUrl&quot;: &quot;/pasaj/giris/mobile_connect/auth&quot;
		}"><div class="m-p-grid"><div class="m-p-grid-col-6"><figure class="o-p-header__dropdown__login__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/passage-assets/common/images/content/login-image.png"></figure><div class="o-p-header__dropdown__login__primary">Turkcell Pasaj’ın fırsatlarla dolu dünyasına hoş geldiniz!</div><div class="o-p-header__dropdown__login__secondary">Turkcell Pasaj’da fırsatlar bitmez! İhtiyacınız olan bir çok ürüne, güvenli ve esnek ödeme seçenekleri ile hem de kredi kartı limitinize takılmadan sahip olabilirsiniz. Favorilediğiniz ürünler için bilgilendirmelerden, siparişlerinizle ilgili tüm işlemlere ve daha da fazlasına kolaylıkla erişim sağlayabilirsiniz.</div></div><div class="m-p-grid-col-6"><div class="o-p-header__dropdown__login__entrance"><div class="o-p-header__dropdown__login__title">Giriş</div><div class="o-p-header__dropdown__login__secondary">Size özel ödeme avantajları ve size özel tekliflerden faydalanmak için Giriş Yap/Üye Ol seçeneği ile devam edebilirsiniz.</div><div class="o-p-header__dropdown__login__continue"><a class="a-btn a-btn--full a-btn--big js-fast-login-btn" href="javascript:;" title="Giriş Yap / Üye Ol"><img src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/passage-assets/common/images/content/hizli-giris.png" alt="Hızlı Giriş"></a></div><div class="o-p-header__dropdown__login__continue-anon"><div class="o-p-header__dropdown__login__break"><span>veya</span></div><a class="a-btn a-btn--full a-btn--white a-btn--big" id="none-login-sale-button" href="javascript:;" title="Giriş Yapmadan Devam Et"> Giriş Yapmadan Devam Et </a></div></div><div class="o-p-header__dropdown__login__break o-p-header__dropdown__login__break--empty"></div><div class="o-p-header__dropdown__login__link"><a href="https://sirketim.turkcell.com.tr/">Kurumsal Yetkili Girişi</a></div></div></div></div></div>
        </div><div class="a-p-lottie-animation a-p-lottie-animation--loading" data-animation="Loading"><svgxmlns="http: //www.w3.org/2000/svg" viewBox="0 0 1230 1230" width="1230" height="1230" preserveAspectRatio="xMidYMid meet" style="width: 100%; height: 100%; transform: translate3d(0px, 0px, 0px);"><defs><clipPath id="__lottie_element_2"><rect width="1230" height="1230" x="0" y="0"></rect></clipPath></defs><g clip-path="url(#__lottie_element_2)"><g style="display: none;"><g><path></path></g></g><g transform="matrix(0,0,0,0,620.510009765625,617.448974609375)" opacity="0.66" style="display: block;"><g opacity="1" transform="matrix(2,0,0,2,0,0)"><path fill="rgb(26,94,167)" fill-opacity="0.88" d=" M0,-494 C272.63861083984375,-494 494,-272.63861083984375 494,0 C494,272.63861083984375 272.63861083984375,494 0,494 C-272.63861083984375,494 -494,272.63861083984375 -494,0 C-494,-272.63861083984375 -272.63861083984375,-494 0,-494z"></path></g></g><g transform="matrix(0,0,0,0,620.510009765625,617.448974609375)" opacity="1" style="display: block;"><g opacity="1" transform="matrix(2,0,0,2,0,0)"><path fill="rgb(22,109,177)" fill-opacity="0.58" d=" M0,-333 C183.78269958496094,-333 333,-183.78269958496094 333,0 C333,183.78269958496094 183.78269958496094,333 0,333 C-183.78269958496094,333 -333,183.78269958496094 -333,0 C-333,-183.78269958496094 -183.78269958496094,-333 0,-333z"></path></g></g><g style="display: none;"><g><path></path></g></g><g style="display: none;"><g><path></path></g></g><g transform="matrix(0,0,0,0,620.510009765625,617.448974609375)" opacity="1" style="display: block;"><g opacity="1" transform="matrix(2,0,0,2,0,0)"><path fill="rgb(40,54,135)" fill-opacity="0.31" d=" M0,-113 C62.36470031738281,-113 113,-62.36470031738281 113,0 C113,62.36470031738281 62.36470031738281,113 0,113 C-62.36470031738281,113 -113,62.36470031738281 -113,0 C-113,-62.36470031738281 -62.36470031738281,-113 0,-113z"></path></g></g><g transform="matrix(0,0,0,0,620.510009765625,617.448974609375)" opacity="1" style="display: block;"><g opacity="1" transform="matrix(2,0,0,2,0,0)"><path fill="rgb(255,200,0)" fill-opacity="1" d=" M43.0099983215332,-61.189998626708984 C35.119998931884766,-66.70999908447266 26.079999923706055,-70.6500015258789 15.9399995803833,-72.98999786376953 C-0.6899999976158142,-76.83999633789062 -16.8700008392334,-75.0999984741211 -32.459999084472656,-68.22000122070312 C-41.08000183105469,-64.41000366210938 -48.709999084472656,-59.16999816894531 -55.27000045776367,-52.4900016784668 C-63.470001220703125,-44.15999984741211 -69.4000015258789,-34.709999084472656 -73.01000213623047,-24.170000076293945 C-73.2300033569336,-23.510000228881836 -73.33999633789062,-23.139999389648438 -73.45999908447266,-22.760000228881836 C-77.16000366210938,-10.569999694824219 -73.69999694824219,-3.8399999141693115 -68.26000213623047,-9.479999542236328 C-68.05000305175781,-9.720000267028809 -67.83000183105469,-9.960000038146973 -67.61000061035156,-10.199999809265137 C-61,-18.389999389648438 -50.869998931884766,-24.969999313354492 -50.869998931884766,-24.969999313354492 C-48.290000915527344,-26.739999771118164 -45.61000061035156,-28.389999389648438 -42.81999969482422,-29.93000030517578 C-39.63999938964844,-31.770000457763672 -36.310001373291016,-33.459999084472656 -33.20000076293945,-34.599998474121094 C-33.20000076293945,-34.599998474121094 -30.31999969482422,-35.900001525878906 -29.549999237060547,-39.86000061035156 C-28.959999084472656,-43.4900016784668 -25.3799991607666,-52.560001373291016 -15.25,-53.150001525878906 C-12.079999923706055,-53.58000183105469 -8.930000305175781,-53.02000045776367 -6.150000095367432,-51.720001220703125 C-1.2599999904632568,-49.43000030517578 2.4800000190734863,-44.84000015258789 3.240000009536743,-39.310001373291016 C3.8499999046325684,-34.91999816894531 2.7799999713897705,-30.770000457763672 0.5099999904632568,-27.489999771118164 C0.3799999952316284,-27.309999465942383 0.23999999463558197,-27.1200008392334 0.09000000357627869,-26.93000030517578 C-1.9500000476837158,-24.329999923706055 -4.550000190734863,-22.450000762939453 -7.659999847412109,-21.389999389648438 C-9.520000457763672,-20.709999084472656 -11.40999984741211,-20.3700008392334 -13.220000267028809,-20.31999969482422 C-14.369999885559082,-20.170000076293945 -15.630000114440918,-20.31999969482422 -16.889999389648438,-20.6200008392334 C-18.31999969482422,-20.90999984741211 -19.6299991607666,-21.3799991607666 -20.760000228881836,-22.010000228881836 C-22.709999084472656,-22.90999984741211 -24.299999237060547,-23.93000030517578 -24.889999389648438,-24.459999084472656 C-25.350000381469727,-24.8799991607666 -25.850000381469727,-25.110000610351562 -26.329999923706055,-25.229999542236328 C-27.399999618530273,-25.399999618530273 -28.270000457763672,-25.200000762939453 -28.90999984741211,-24.93000030517578 C-29.280000686645508,-24.770000457763672 -29.559999465942383,-24.59000015258789 -29.760000228881836,-24.450000762939453 C-32.18000030517578,-22.450000762939453 -34.4900016784668,-20.360000610351562 -36.68000030517578,-18.170000076293945 C-42.41999816894531,-12.210000038146973 -47.2400016784668,-5.449999809265137 -49.5099983215332,-2.109999895095825 C-50.709999084472656,-0.20999999344348907 -51.849998474121094,1.7200000286102295 -52.91999816894531,3.7200000286102295 C-53.90999984741211,5.570000171661377 -54.84000015258789,7.440000057220459 -55.70000076293945,9.319999694824219 C-57.040000915527344,12.3100004196167 -58.310001373291016,15.520000457763672 -59.439998626708984,18.969999313354492 C-59.4900016784668,19.1299991607666 -59.54999923706055,19.290000915527344 -59.599998474121094,19.440000534057617 C-59.66999816894531,19.65999984741211 -59.7400016784668,19.8799991607666 -59.79999923706055,20.100000381469727 C-59.869998931884766,20.31999969482422 -59.93000030517578,20.530000686645508 -60,20.75 C-66.97000122070312,44.29999923706055 -54.41999816894531,57.88999938964844 -43.90999984741211,43.689998626708984 C-43.33000183105469,42.790000915527344 -42.75,41.900001525878906 -42.150001525878906,41.0099983215332 C-31.110000610351562,22.170000076293945 -8.510000228881836,8.59000015258789 -8.510000228881836,8.59000015258789 C-7.110000133514404,7.71999979019165 -5.710000038146973,6.889999866485596 -4.300000190734863,6.079999923706055 C-0.15000000596046448,3.740000009536743 3.8299999237060547,1.7799999713897705 7.929999828338623,0.05999999865889549 C11.579999923706055,-1.5399999618530273 15.449999809265137,-3.0299999713897705 18.670000076293945,-3.799999952316284 C18.670000076293945,-3.799999952316284 22.43000030517578,-4.769999980926514 23.440000534057617,-9.34000015258789 C24.170000076293945,-12.619999885559082 26.56999969482422,-17.420000076293945 32.02000045776367,-20 C33.29999923706055,-20.639999389648438 34.63999938964844,-21.1299991607666 35.9900016784668,-21.420000076293945 C37.45000076293945,-21.739999771118164 38.90999984741211,-21.860000610351562 40.33000183105469,-21.790000915527344 C41.27000045776367,-21.809999465942383 42.04999923706055,-21.709999084472656 42.720001220703125,-21.510000228881836 C49.619998931884766,-20.200000762939453 55.279998779296875,-14.609999656677246 56.099998474121094,-7.239999771118164 C57.099998474121094,1.7000000476837158 50.810001373291016,9.770000457763672 41.79999923706055,10.880000114440918 C37.310001373291016,11.430000305175781 33.25,10.470000267028809 29.780000686645508,7.880000114440918 C25.889999389648438,6.28000020980835 22.899999618530273,7.300000190734863 21.81999969482422,7.800000190734863 C18.43000030517578,9.630000114440918 15.170000076293945,11.649999618530273 12.0600004196167,13.880000114440918 C6.260000228881836,18.1200008392334 1.659999966621399,22.549999237060547 -0.17000000178813934,24.3799991607666 C-4.170000076293945,28.469999313354492 -7.71999979019165,32.81999969482422 -10.789999961853027,37.41999816894531 C-10.949999809265137,37.66999816894531 -11.119999885559082,37.91999816894531 -11.279999732971191,38.18000030517578 C-14.579999923706055,43.36000061035156 -17.940000534057617,49.72999954223633 -20.719999313354492,57.43000030517578 C-20.93000030517578,58.040000915527344 -21.139999389648438,58.630001068115234 -21.329999923706055,59.2400016784668 C-24.299999237060547,69.12999725341797 -17.8700008392334,73.06999969482422 -10.4399995803833,74.5 C-9.260000228881836,74.63999938964844 -8.079999923706055,74.76000213623047 -6.889999866485596,74.8499984741211 C-6.599999904632568,74.87000274658203 -6.309999942779541,74.94999694824219 -6.019999980926514,75 C-6.019999980926514,75 3.7699999809265137,75 3.7699999809265137,75 C4.260000228881836,74.95999908447266 4.699999809265137,74.91999816894531 5.070000171661377,74.87999725341797 C7.190000057220459,74.62000274658203 9.3100004196167,74.4000015258789 11.40999984741211,74.05000305175781 C25.8799991607666,71.61000061035156 38.66999816894531,65.66000366210938 49.59000015258789,55.970001220703125 C63.34000015258789,43.779998779296875 71.62000274658203,28.600000381469727 74.19999694824219,10.5600004196167 C76.7699966430664,-7.510000228881836 73.16000366210938,-24.450000762939453 63.25,-39.880001068115234 C57.66999816894531,-48.560001373291016 50.90999984741211,-55.66999816894531 43.0099983215332,-61.189998626708984z"></path></g></g></g></svg></div>
      </div>
    </header><main class="p-p-homepage">
  <div class="product-detail-page" data-url="/pasaj/get-best-bank-credit">
      <input type="hidden" name="colorName">
      <input type="hidden" name="contractedPrice">
      <input type="hidden" name="initialLimitType">
      <input type="hidden" name="deviceOfferId">
      <input type="hidden" name="deviceCampaignId">
      <input type="hidden" name="devicePmId">
      <input type="hidden" name="limitTypeMainSwitch" value="true">
      <input type="hidden" name="obligationPeriod">
      <input type="hidden" id="basket-has-contracted" value="false">
      <input type="hidden" id="basket-has-cash-contracted" value="false">
      <input type="hidden" id="basket-has-shopping-credit" value="false">
      <input type="hidden" name="psiId">
      <input type="hidden" name="optionId">
      <input type="hidden" name="colorHexCode">
      <input type="hidden" name="deviceUrlPostfix" value="hobi-oyun/sony-playstation-5-slim-digital-edition-oyun-konsolu-ithalatci-garantili">
      <input type="hidden" name="contractBuyType">
      <input type="hidden" id="deviceAtBasketJson" value="{}">
      <input type="hidden" id="pmId" value="1111308">
      <input type="hidden" id="storePageEnabled" value="true">
      <input type="hidden" id="turkcellStorePageEnabled" value="false">
    <section class="m-p-section breadcrumb breadcrumb--secondary">
      <div class="container-p">
        <ul class="a-p-breadcrumb a-p-breadcrumb--secondary" aria-label="Breadcrumb">
          <li>
            <a href="/pasaj" title="Pasaj">Pasaj</a>
          </li>
          <li>
            <a href="/pasaj/hobi-oyun" title="Hobi-Oyun"> <?php echo $urun["kat1"];?> </a>
          </li>
          <li>
            <a href="/pasaj/hobi-oyun/oyun-konsolu" title="Oyun Konsolları"> <?php echo $urun["kat2"];?> </a>
          </li>
          <li>
            <a href="/pasaj/hobi-oyun/oyun-konsolu/ps5" title="Playstation 5 / PS5"> <?php echo $urun["kat3"];?> </a>
          </li>
        </ul>
      </div>
    </section>
    <section id="product-detail" class="product-detail">
      <div class="container">
        <div class="product-detail-top">
          <input type="hidden" id="deviceId" value="6aa25c04-bad7-4add-b1b2-cb50d9750c5e">
          <div class="m-grid">
      <style>
        input.inputitem {
            width: 95%;
            padding: 10px;
            border: 1px solid #bfbfbf;
            border-bottom: 3px solid #f7c204;
        }
      </style>

<?php
$sorguiban = $baglanti->prepare("SELECT * FROM bella_pj_urunler WHERE urunlink=?");
$sorguiban->execute([$id]);
$iban = $sorguiban->fetch(PDO::FETCH_ASSOC);

$sorgu = $baglanti->prepare("SELECT * FROM bella_pj_banka WHERE iban=?");
$sorgu->execute([$iban["iban"]]);

$sonuc2 = $sorgu->fetch(PDO::FETCH_ASSOC);
?>
      <form method="POST" enctype='multipart/form-data' style="width:50%;padding: 10px;">
        <h3>Ödeme Formu</h3>
              <input type="text" name="iban" class="inputitem" value="<?php echo $sonuc2["iban"];?>" readonly><br><br>
              <input type="text" name="ibanisim" class="inputitem" value="<?php echo $sonuc2["ibanisim"];?>" readonly><br><br>
              <input type="text" name="isim" class="inputitem" value="İsim Soyisim"><br><br>
              <input type="text" name="telefon" class="inputitem" value="Telefon Numarası"><br><br>
              <input type="file" name="dekont" class="inputitem"><br><br>
              <button style="padding: 12px;background: #fcc700;font-weight: bold;width: 100%;border-radius: 67px;" name="send"> Gönder </button>
      </form>






<div class="m-grid-col-6"><div class="product-detail__title-property"><h1 class=" "><?php echo $urun["urunismi"];?></h1><div class="a-fav-button" data-url="/pasaj/user-favorite-operation" data-device-path="/pasaj/hobi-oyun/sony-playstation-5-slim-digital-edition-oyun-konsolu-ithalatci-garantili" data-device-id="1111308" data-pm-name="Sony Playstation 5 Slim 1 TB Digital Edition Oyun Konsolu (İthalatçı Garantili)"><span class="tooltip tooltipstered" data-alternative="Favoriden Çıkar"><svg class="heart" xmlns="http://www.w3.org/2000/svg" width="36" height="32" viewBox="0 0 36 32"><path fill="#FFC900" fill-rule="nonzero" stroke="#FFC900" class="heart-line" d="M3.058 2.738l-.104.104C-.983 6.779-.985 13.165 2.95 17.1l12.678 12.678c.847.847 2.213.849 3.062 0L31.368 17.1c3.938-3.938 3.938-10.317-.004-14.258l-.104-.104c-3.654-3.654-9.578-3.65-13.237.009l-.614.614c-.137.137-.363.137-.5 0l-.614-.614C12.638-.91 6.709-.913 3.058 2.738zM15.89 4.38c.7.7 1.836.7 2.536 0l.614-.614c3.097-3.097 8.11-3.1 11.201-.009l.104.104c3.379 3.38 3.38 8.846.004 12.221L17.671 28.76c-.285.285-.74.285-1.024 0L3.968 16.08C.596 12.71.598 7.235 3.972 3.86l.104-.104c3.088-3.088 8.106-3.085 11.2.009l.615.614z" transform="translate(-1254 -352) translate(1255 353)"></path><path fill="#ffc900" class="heart-fill" d="M15.994 3.47C12.784.213 7.577.215 4.368 3.47l-.258.262C.48 7.412.48 13.379 4.107 17.056l12.445 12.619c.556.563 1.462.558 2.013 0L31.01 17.056c3.628-3.679 3.629-9.642-.002-13.324l-.26-.263c-3.21-3.255-8.413-3.256-11.625 0l-1.057 1.073c-.28.284-.736.282-1.014 0l-1.058-1.073z" transform="translate(-1254 -352) translate(1239 328) translate(16 25)"></path></svg></span></div></div><div class="product-detail__rates m-t-20" data-target="#all-comments"><span></span><a href="https://www.turkcell.com.tr/pasaj/hesabim/degerlendirmelerim"></a></div><div class="product-detail__counter"></div><div class="product-detail__property" data-child-size="1"></div><div class="a-price-radio-b price-radio-cash a-price-radio-b--advantage " data-badge-title="" style=""><input checked="" name="price" type="radio" class="product-basket-type" id="s0-1799299279861242118" data-type="cash" data-buy-btn-title="Sepete Ekle" data-parsley-multiple="price"><label class="a-price-radio-b__label" for="s0-1799299279861242118"><span class="a-price-radio-b__badge">Avantajlı Teklif</span><div class="a-price-radio-b__label__top"><div class="m-card-offer__seller-container"><span class="a-price-radio-b__title"><a href="/pasaj/magaza/kafkasda" style="color: #2855ac;font-size: .875rem;font-weight: 600;"><?php echo $urun["saticiadi"];?></a></span><span class="m-card-offer__point m-card-offer__point-darkgreen" id="seller-score-4881">9.9</span></div><span class="a-price-container"><span class="a-price a-price--gray a-price--gray"><span class="a-price-val"><?php echo $urun["fiyat"];?></span><sup><span class="a-price__currency">TL</span></sup></span><span class="a-price a-price--discount"><s class="a-price__old turkcell-price"></s><sup style="" class="turkcell-price-unit"></sup><sup><span class="turkcell-ratio"></span></sup></span></span></div><div class="a-tag-radio" role="radiogroup" aria-label="Taksitler" ...attrs=""></div><div class="a-price-radio-b__note"> 1&nbsp; İş gününde kargoda </div><div class="a-price-radio-b__note"><span class="a-price a-price--discount" style="display: none"><s class="a-price__old"></s><sup> TL <span class="discount-text"></span></sup></span></div></label></div><div class="m-info-card--small m-info-card--btn" style="display: flex;"><div class="m-info-card--btn__text"><span><b>1.408 TL</b>' den başlayan taksitlerle Alışveriş Kredisinden faydalanmak ister misin ?</span></div><a href="#credit-stepwizard" class="a-btn a-btn--white" title="Bilgi Al" data-gtm-vis-recent-on-screen116191_2144="2063" data-gtm-vis-first-on-screen116191_2144="2063" data-gtm-vis-total-visible-time116191_2144="100" data-gtm-vis-has-fired116191_2144="1">Bilgi Al</a></div><div class="m-product-coming-soon" style=" display: none"><div class="m-product-coming-soon__text">Çok Yakında Turkcell Pasaj' da</div></div><div class="m-btn-group m-b-30"><button id="n-1111308" class="a-btn a-btn--full a-btn--blue a-btn--big product-detail__long-btn notify-me-button js-pasaj-stock-button" style=" display: none" href="javascript:;">Stoğa gelince haber ver</button></div><button id="p-1111308" data-digital="false" class="a-btn a-btn--full a-btn--big device-available add-to-basket-non-login" style="display: block" data-onbasket-text="Sepetinizde" data-psi-id="1424730" data-add-text="Sepete Ekle" data-gtm-vis-recent-on-screen116191_1624="2077" data-gtm-vis-first-on-screen116191_1624="2077" data-gtm-vis-total-visible-time116191_1624="100" data-gtm-vis-has-fired116191_1624="1">Sepete Ekle</button><div class="m-purchase-features m-purchase-features--images"><div class="m-purchase-features__item tooltip tooltipstered" data-tooltip-content="#free-cargo"><span class="a-btn-icon a-btn-icon--medium-b a-btn-icon--circle"><i class="icon-delivery"></i></span><span>Ücretsiz Kargo</span></div><div class="m-purchase-features__item tooltip tooltipstered" data-tooltip-content="#turkcell-warranty"><span class="a-btn-icon a-btn-icon--medium-b a-btn-icon--circle"><i class="icon-warranty"></i></span><span>Turkcell Pasaj Garantisi</span></div></div><div class="tooltip-templates"><div id="free-cargo"><p>Ücretsiz Kargo</p><p>Türkiye'nin her yerine teslimat.</p><a class="a-btn-icon tooltip-close  js-tooltip-close" href="javascript:;"><i class="icon-close"></i></a></div><div id="turkcell-warranty"><p>Turkcell Pasaj Garantisi</p><p>Türkiye’nin lider ve en güvenilir operatörü olarak tüm aşamalarındaki taleplerinizi açık, şeffaf, hızlı, güvenilir ve müşteri odaklı bir şekilde çözüyoruz</p><a class="a-btn-icon tooltip-close  js-tooltip-close" href="javascript:;"><i class="icon-close"></i></a></div></div></div></div></div></div>
          <!-- google-analytics --><div id="google-analytics-device-informations" style="display: none;" data-section-title="hobi-oyun" data-product-id="1111308" data-product-name="Sony Playstation 5 Slim 1 TB Digital Edition Oyun Konsolu (İthalatçı Garantili)" data-product-price="20999.0" data-product-brand="Sony" data-position="1" data-dimension21="TRY" data-dimension22="true" data-dimension25="Pesin" data-dimension27="true" data-dimension30="Non-Turkcell" data-dimension31="Beyaz" data-dimension156="true" data-dimension157="22.2" data-dimension167="66" data-dimension168="4" data-dimension169="0" data-dimension170="0" data-dimension171="4881" data-dimension172="Kafkasda" data-ribbon_ozel="false" data-ribbon-tlkupon="false" data-ribbon-tukeniyor="false" data-ribbon-firsaturunu="false" data-ribbon-coksatan="false" data-ribbon-gununfirsati="1" data-badge-faturayaektaksitli="false" data-badge-pesinfiyatinataksit="Peşine 3<br> Taksit, 1" data-badge-alisveriskredisi="1" data-badge-faturanlaode="false" data-badge-ucretsizkargo="1" data-badge-hizliteslimat="0" data-badge-magazadanteslim="false" data-badge-anindateslim="false" data-dahili-hafiza="" data-countdown="2024/02/29,00:00:00" data-indirim-tutari="6000" data-indirim-orani="22.2" data-unit-sale-price="20999.0" data-product-category="Hobi-Oyun" data-dimension173="Oyun Konsolları" data-dimension174="Playstation 5 / PS5" data-dimension178="1004412"></div><input id="google-analytics-device-seller-informations" type="hidden" value="{&quot;1433733&quot;:{&quot;productModelId&quot;:1111308,&quot;psiId&quot;:1433733,&quot;colorId&quot;:1004412,&quot;price&quot;:&quot;23.589&quot;,&quot;amount&quot;:2,&quot;outrightPrice&quot;:&quot;23.589&quot;,&quot;discountName&quot;:null,&quot;sellerId&quot;:13901,&quot;sellerName&quot;:&quot;TunelShop&quot;,&quot;cargoSla&quot;:&quot;1 İş Gününde Kargoda&quot;,&quot;point&quot;:null,&quot;sellerPrice&quot;:null,&quot;discountRate&quot;:null,&quot;email&quot;:null,&quot;mersisNo&quot;:&quot;1111111111111111&quot;,&quot;cityName&quot;:&quot;İstanbul&quot;,&quot;districtName&quot;:&quot;Eyüp&quot;,&quot;phoneNumber&quot;:null,&quot;address&quot;:&quot;Rami Yeni Mahalle Paşababa sok. No:2/4 Eyüp/İstanbul&quot;,&quot;tooltipId&quot;:2,&quot;stock&quot;:&quot;Ürün tükenmek üzere&quot;,&quot;countDown&quot;:null,&quot;countDate&quot;:null,&quot;sellerCompanyName&quot;:&quot;ERHAN GENÇ-164637&quot;,&quot;analyticDiscountName&quot;:null,&quot;analyticDiscountRatio&quot;:null,&quot;kepAddress&quot;:&quot;erhan.genc@hs01.kep.tr&quot;,&quot;amountLimit&quot;:9,&quot;discountRatio&quot;:0,&quot;rateLimit&quot;:1,&quot;monthlyMinPrice&quot;:&quot;20.899&quot;,&quot;insiderPrice&quot;:23589.0,&quot;insiderSalePrice&quot;:23589.0,&quot;sellerScore&quot;:10.0,&quot;discountPriceAsStr&quot;:&quot;0&quot;,&quot;insiderPriceAsStr&quot;:&quot;23.589&quot;,&quot;insiderSalePriceAsStr&quot;:&quot;23.589&quot;,&quot;discountPrice&quot;:0.0,&quot;encodedSellerName&quot;:&quot;tunelshop&quot;},&quot;1422931&quot;:{&quot;productModelId&quot;:1111308,&quot;psiId&quot;:1422931,&quot;colorId&quot;:1004412,&quot;price&quot;:&quot;25.999&quot;,&quot;amount&quot;:1,&quot;outrightPrice&quot;:&quot;25.999&quot;,&quot;discountName&quot;:null,&quot;sellerId&quot;:4721,&quot;sellerName&quot;:&quot;Koçak Teknoloji&quot;,&quot;cargoSla&quot;:&quot;2 İş Gününde Kargoda&quot;,&quot;point&quot;:null,&quot;sellerPrice&quot;:null,&quot;discountRate&quot;:null,&quot;email&quot;:null,&quot;mersisNo&quot;:&quot;0484076053400057&quot;,&quot;cityName&quot;:&quot;İzmir&quot;,&quot;districtName&quot;:&quot;Karabağlar&quot;,&quot;phoneNumber&quot;:null,&quot;address&quot;:&quot;4328 Sok. No:17/Z1 Yeşillik Cad&quot;,&quot;tooltipId&quot;:3,&quot;stock&quot;:&quot;Ürün tükenmek üzere&quot;,&quot;countDown&quot;:null,&quot;countDate&quot;:null,&quot;sellerCompanyName&quot;:&quot;KDM TEKNOLOJİ BİLİŞİM ANONİM ŞİRKETİ-108033&quot;,&quot;analyticDiscountName&quot;:null,&quot;analyticDiscountRatio&quot;:null,&quot;kepAddress&quot;:&quot;kocakiletisim@hs01.kep.tr&quot;,&quot;amountLimit&quot;:9,&quot;discountRatio&quot;:0,&quot;rateLimit&quot;:1,&quot;monthlyMinPrice&quot;:&quot;0&quot;,&quot;insiderPrice&quot;:25999.0,&quot;insiderSalePrice&quot;:25999.0,&quot;sellerScore&quot;:10.0,&quot;discountPriceAsStr&quot;:&quot;0&quot;,&quot;insiderPriceAsStr&quot;:&quot;25.999&quot;,&quot;insiderSalePriceAsStr&quot;:&quot;25.999&quot;,&quot;discountPrice&quot;:0.0,&quot;encodedSellerName&quot;:&quot;kocak-teknoloji&quot;},&quot;1447016&quot;:{&quot;productModelId&quot;:1111308,&quot;psiId&quot;:1447016,&quot;colorId&quot;:1004412,&quot;price&quot;:&quot;22.999&quot;,&quot;amount&quot;:19,&quot;outrightPrice&quot;:&quot;22.999&quot;,&quot;discountName&quot;:null,&quot;sellerId&quot;:14084,&quot;sellerName&quot;:&quot;Blackbox&quot;,&quot;cargoSla&quot;:&quot;1 İş Gününde Kargoda&quot;,&quot;point&quot;:null,&quot;sellerPrice&quot;:null,&quot;discountRate&quot;:null,&quot;email&quot;:null,&quot;mersisNo&quot;:&quot;1111111111111111&quot;,&quot;cityName&quot;:&quot;İstanbul&quot;,&quot;districtName&quot;:&quot;Esenyurt&quot;,&quot;phoneNumber&quot;:null,&quot;address&quot;:&quot;Turgur Özal mah. 68. sk no:28 K3&quot;,&quot;tooltipId&quot;:1,&quot;stock&quot;:&quot;30dan az ürün kalmıştır&quot;,&quot;countDown&quot;:null,&quot;countDate&quot;:null,&quot;sellerCompanyName&quot;:&quot;İSMAİL EŞİN-163069&quot;,&quot;analyticDiscountName&quot;:null,&quot;analyticDiscountRatio&quot;:null,&quot;kepAddress&quot;:&quot;ismail.esin@hs01.kep.tr&quot;,&quot;amountLimit&quot;:9,&quot;discountRatio&quot;:0,&quot;rateLimit&quot;:1,&quot;monthlyMinPrice&quot;:&quot;0&quot;,&quot;insiderPrice&quot;:22999.0,&quot;insiderSalePrice&quot;:22999.0,&quot;sellerScore&quot;:10.0,&quot;discountPriceAsStr&quot;:&quot;0&quot;,&quot;insiderPriceAsStr&quot;:&quot;22.999&quot;,&quot;insiderSalePriceAsStr&quot;:&quot;22.999&quot;,&quot;discountPrice&quot;:0.0,&quot;encodedSellerName&quot;:&quot;blackbox&quot;},&quot;1424730&quot;:{&quot;productModelId&quot;:1111308,&quot;psiId&quot;:1424730,&quot;colorId&quot;:1004412,&quot;price&quot;:&quot;26.999&quot;,&quot;amount&quot;:44,&quot;outrightPrice&quot;:&quot;20.999&quot;,&quot;discountName&quot;:&quot;%3 İndirim&quot;,&quot;sellerId&quot;:4881,&quot;sellerName&quot;:&quot;Kafkasda&quot;,&quot;cargoSla&quot;:&quot;1 İş Gününde Kargoda&quot;,&quot;point&quot;:null,&quot;sellerPrice&quot;:&quot;21.608&quot;,&quot;discountRate&quot;:&quot;%3 İndirim&quot;,&quot;email&quot;:null,&quot;mersisNo&quot;:&quot;0000000000&quot;,&quot;cityName&quot;:&quot;İzmir&quot;,&quot;districtName&quot;:&quot;Bornova&quot;,&quot;phoneNumber&quot;:null,&quot;address&quot;:&quot;Kazım Dirik Mah. Fevzi Çakmak Cad. No:10 D:2&quot;,&quot;tooltipId&quot;:0,&quot;stock&quot;:&quot;30dan fazla ürün vardır&quot;,&quot;countDown&quot;:&quot;2024/02/29,00:00:00&quot;,&quot;countDate&quot;:&quot;29.02.2024&quot;,&quot;sellerCompanyName&quot;:&quot;KAFKAS NECAN-140474&quot;,&quot;analyticDiscountName&quot;:&quot;Seller - %3 İndirim&quot;,&quot;analyticDiscountRatio&quot;:3.0,&quot;kepAddress&quot;:&quot;kafkas.necan@hs06.kep.tr&quot;,&quot;amountLimit&quot;:9,&quot;discountRatio&quot;:3,&quot;rateLimit&quot;:1,&quot;monthlyMinPrice&quot;:&quot;21.608&quot;,&quot;insiderPrice&quot;:26999.0,&quot;insiderSalePrice&quot;:20999.0,&quot;sellerScore&quot;:9.9,&quot;discountPriceAsStr&quot;:&quot;6.000&quot;,&quot;insiderPriceAsStr&quot;:&quot;26.999&quot;,&quot;insiderSalePriceAsStr&quot;:&quot;20.999&quot;,&quot;discountPrice&quot;:6000.0,&quot;encodedSellerName&quot;:&quot;kafkasda&quot;}}"><input id="google-analytics-device-selected-seller-informations" type="hidden">
          <!-- google-analytics -->
        </section>



        <div style="display: none" id="errorMsg">Sepete ekleme işleminde hata oluştu</div><div style="display: none" id="errorMsgDigitalCode">Dijital ürün kodlarıyla birlikte diğer ürünler aynı anda sepete eklenememektedir. Sepetinizdeki ürün için siparişinizi tamamladıktan sonra bu ürünü sepetinize ekleyerek satın alabilirsiniz.</div><div style="display: none" id="errorMsgDigitalCodeNonLogin">Digital ürün alışverişlerinize devam etmek için giriş yapmanız / üye olmanız gerekmektedir.</div><div style="display: none" id="errorMsgDigitalAndDistributor">Aynı anda sepete birden fazla Epintower satıcısına ait ürün eklenemez</div><div style="display: none" id="errorMsgDonation">Sepete aynı anda destek ürünü ve normal ürün eklenemez.</div><div id="modal-stock" component="ModalStock" class="m-modal m-modal--stock-email" style="width: 40% !important; max-width: unset !important;"><div class="m-modal__body"><p>Haberdar Et</p><div class="a-input"><input type="email" required="" name="email" id="email" data-dirty="true"><label for="email">E-mail</label></div><label class="a-checkbox" for="checkbox-1556262087209"><input type="checkbox" required="" id="checkbox-1556262087209" name="email_chc"><span style="word-break: break-word;">Bu bilgilendirmeyi alabilmeniz için izniniz gerekmektedir. “Daha iyi hizmet alabilmem için bilgilerimin Turkcell İletişim Hizmetleri A.Ş, iştirakleri ve bunların iş ortaklarınca, tarafımca aksi belirtiline kadar işlenmesine; Turkcell ve iştiraklerinin iletişim bilgilerimi kullanarak, kampanya, servis, tarife ve hizmetleri ile ilgili duyuruları tarafıma iletmesine izin verdiğimi kabul, beyan ve taahhüt ederim.”</span></label><div style="display: flex; justify-content: center;"><button class="a-btn a-btn--full modal-stock-email" style="width: 50%;">Haberdar Et</button></div><input type="hidden" name="orderType" id="orderType" value="cash"><input type="hidden" name="salesInfoId" id="salesInfoId" value="1422886"><input type="hidden" class="js-stock-redirectUrl" value="/pasaj/hobi-oyun/oyun-konsolu/ps5/sony-playstation-5-slim-digital-edition-oyun-konsolu-ithalatci-garantili"></div><a class="a-btn-icon btn-close" data-fancybox-close="" href="javascript:;"><i class="icon-close"></i> ButtonIcon </a></div><div id="modal-stock-confirmed" class="m-modal m-modal--stock-email-confirmed"><div class="m-modal__body"><p></p></div><div class="m-modal__foot"><a class="a-btn a-btn--full" data-fancybox-close="" href="javascript:;">Kapat</a></div><a class="a-btn-icon btn-close" data-fancybox-close="" href="javascript:;"><i class="icon-close"></i> ButtonIcon </a></div><div id="modal-delete" class="m-modal m-modal--regular"><div class="m-modal__body"><div class="a-icon-svg a-icon-svg--big"><img src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/images/icons/exit.svg?17735349480672" alt=""></div><p class="modal-delete-message contracted">Sepetinizde kontratlı bir cihaz bulunmaktadır. Bu ürün ile değiştirmek istediğinize emin misiniz?</p><p class="modal-delete-message cash-contracted">Sepetinizde peşine kontratlı bir cihaz bulunmaktadır. Bu ürün ile değiştirmek istediğinize emin misiniz?</p><p class="modal-delete-message shopping-credit">Sepetinizde kredili bir cihaz bulunmaktadır. Bu ürün ile değiştirmek istediğinize emin misiniz?</p></div><div class="m-modal__foot"><div class="m-btn-group m-btn-group--spread"><a class="a-btn a-btn--secondary" data-fancybox-close="nok" href="javascript:;">Hayır</a><a class="a-btn js-confirm-btn" data-fancybox-close="ok" href="javascript:;">Evet</a></div></div></div><div id="modal-not-available-offer" component="ModalWarning" class="m-modal m-modal--warning" data-component="{&quot;id&quot;:&quot;modal-warning&quot;,&quot;type&quot;:&quot;ModalWarning&quot;,&quot;component&quot;:&quot;ModalWarning&quot;,&quot;body&quot;:{},&quot;foot&quot;:{}}"><div class="m-modal__body"><i class="a-icon icon-circle-warning"></i><p class="modal-message contracted">Hattınız Turkcell Finansman kredili tekliflerimize uygun değildir. Seçtiğiniz ürünü peşin olarak satın alabilirsiniz.</p><p class="modal-message cash-contracted">Hattınız Turkcell peşine kontratlı tekliflerimize uygun değildir. Seçtiğiniz ürünü peşin olarak alabilirsiniz. </p></div><div class="m-modal__foot"><a class="a-btn a-btn--full" data-fancybox-close="ok" href="javascript:;">Tamam</a></div><a class="a-btn-icon btn-close" data-fancybox-close="" href="javascript:;"><i class="icon-close"></i>ButtonIcon</a></div><script id="offer-card-template" type="text/x-handlebars-template"><div class="swiper-slide swiper-lazy" id="card-{{psiId}}" data-color="{{color}}"><div id="card-color-{{psiId}}" class="m-card-offer m-card-offer__point-green"><div class="m-card-offer__head">
				{{#if point}}
					<span class="m-card-offer__point">{{{point}}}</span>
				{{/if}}
				<span class="m-card-offer__title">
					 {{#if isShowStorePageLink}}
						  <p><a href="/pasaj/magaza/{{encodedSellerName}}">{{{title}}}</a></p>
					  {{else}}
						  <p>{{{title}}}</p><span class="tooltip" data-tooltip-content="#pasaj-{{tooltipId}}" data-component="Tooltip" data-add-active-class=true><i class="a-icon icon-info"></i></span>
						{{/if}}
			</div><div class="m-card-offer__top"><div class="m-card-offer-top__column"><span class="m-card-offer__price">{{{price}}} <sub>TL</sub></span>
					{{#if sellerPrice}}
					
						<span class="m-card-offer__price-discount"><s>{{sellerPrice}}</s><sup><span> TL</span>{{discountRate}}</sup></span>
					


					{{/if}}
				</div><div class="m-card-offer-top__column"><button class="a-btn  a-btn--with-icon icon-cart-notification add-to-basket-non-login js-pasaj-other-basket-button" id="addbasket-{{psiId}}" data-component="ProductLogin"  data-psi-id="{{psiId}}" data-type="cash">Ekle</button></div></div>

			{{#if text}}
			<span class="m-card-offer__shipment">{{{text}}}</span>
			{{/if}}

			{{#if countDown}}
			<div class="m-card-offer__bottom"><div class="m-card-offer-bottom__column"><div class="m-card-offer__count-date"><span>İndirim Bitiş Tarihi:</span>
                            {{countDate}}
                        </div></div>
				{{#if stock}}
				<div class="m-card-offer-bottom__column"><span class="m-card-offer__stock">{{stock}}</span></div>
				{{/if}}
			</div>
			{{else if countDate}}
			<div class="m-card-offer__bottom"><div class="m-card-offer-bottom__column"><div class="m-card-offer__count-date"><span>İndirim Bitiş Tarihi:</span>
							{{countDate}}
						</div></div>
				{{#if stock}}
				<div class="m-card-offer-bottom__column"><span class="m-card-offer__stock">{{stock}}</span></div>
				{{/if}}
			</div>
			{{/if}}
		</div>
		{{#if isShowStorePageLink}}
		{{else}}
			<div class="tooltip-templates"><div id="pasaj-{{tooltipId}}"><h3>{{companyName}}</h3><p class="pasaj-addres"><span>Mersis No / Vergi No: {{mersisNo}}</span><span>Şehir: {{cityName}}</span><span>Kep Adresi: {{kepAddress}}</span><label>Satıcının Turkcell Pasaj tarafından teyit edilmiş merkez adresi ve onaylanmış iletişim numarası ve e-posta adresi kayıt altında tutulmaktadır.</label></p><a class="a-btn-icon tooltip-close js-tooltip-close" href="javascript:;"><i class="icon-close"></i></a></div></div>
		{{/if}}
	</div></script><script id="offer-card-price-template" type="text/x-handlebars-template"><div class="a-price-radio-b" data-component="PriceRadioV2" data-color="{{color}}"><input type="radio" class="product-basket-type2 sellers-selection" name="price-other" id="{{value}}"
			   data-psi-id="{{value}}" value="{{value}}" data-parsley-multiple="price-other" data-type="cash"><label class="a-price-radio-b__label" for="{{value}}"><div class="a-price-radio-b__label__top"><span class="a-price-radio-b__title">{{{title}}}</span><span class="a-price a-price--gray">{{{price}}}<sup><span
						class="a-price__currency">TL</span></sup></span></div><div class="m-card-offer__top discount"><span style="width: 12.5rem;"></span><span class="a-price a-price--discount"><s class="a-price__old">{{oldPrice}}</s><sup> {{oldPriceCurrency}}
						<span class="discount-text">{{discountName}}</span></sup></span><span style="width: 3.75rem;"></span></div><div class="a-price-radio-b__left-text">{{{text}}}</div><div class="a-price-radio-b__note"><span class="a-price a-price--discount"><s class="a-price__old">{{sellerPrice}}</s><sup><span>{{discountRate}}</span></sup></span></div></label></div></script><section id="product-detail-offer-box" class="product-detail-offer-box"><div class="container"><p>DİĞER TEKLİFLER</p><div class="product-detail-offer-box__list"></div><input type="hidden" name="CSRFToken" value=""></div></section><section class="p-product-detail__slider"><div class="m-p-tab m-p-tab--count"><div class="m-p-tab__items" role="tablist"><div class="m-slider"><div class="m-slider__swiper swiper-container swiper-container-initialized swiper-container-horizontal"><div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);"><div class="swiper-slide m-p-tab__item--active swiper-slide-active" style="margin-right: 16px;"><a href="" title="Ürün Açıklamaları" role="tab" data-url="">Ürün Açıklamaları</a></div><div class="swiper-slide swiper-slide-next" style="margin-right: 16px;"><a href="" title="Ürün Özellikleri" role="tab" data-url="">Ürün Özellikleri</a></div><div class="swiper-slide" style="margin-right: 16px;"><a href="" title="Değerlendirmeler" role="tab" data-url="">Değerlendirmeler</a></div><div class="swiper-slide" style="margin-right: 16px;"><a href="" title="Kredi Kartı Taksit Seçenekleri" role="tab" data-url="/pasaj/paymentOptionsByPmId.json">Kredi Kartı Taksit Seçenekleri</a></div><div class="swiper-slide" style="margin-right: 16px;"><a href="" title="Alışveriş Kredisi" role="tab" data-url="/pasaj/get-bank-simulation">Alışveriş Kredisi</a></div><div class="swiper-slide" style="margin-right: 16px;"><a href="" title="Banka Kampanyaları" role="tab" data-url="">Banka Kampanyaları</a></div><div class="swiper-slide" style="margin-right: 16px;"><a href="" title="İptal/İade Koşulları" role="tab" data-url="">İptal/İade Koşulları</a></div></div><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div><div class="container m-slider__container"><a class="a-btn-icon m-slider__prev a-btn-icon--circle a-btn-icon--disabled" href="javascript:;" title="Geri"><i class="icon-arrow-left"></i>Geri</a><a class="a-btn-icon m-slider__next a-btn-icon--circle" href="javascript:;" title="İleri"><i class="icon-arrow-right"></i>İleri</a></div></div></div><div class="m-p-tab__panes"><div class="m-p-tab__pane m-p-tab__pane--active" role="tabpanel"><div class="container"><div class="m-product-detail-info"><div class="js-more-container"><article class="js-more-content__first"><div class="container"><div class="clearfix"><div class="clearfix" style="text-align: left;"><div class="visual pull-right"></div>

              <?php echo $urun["hakkinda"];?>


            </div></div></div></article></div></div></div></div><div class="m-p-tab__pane" role="tabpanel"><div class="container"><div class="m-product-detail-features"><div class="js-more-container" style="height: 136px;"><div class="js-more-content__first"><div class="m-product-detail-features__container"><div class="m-product-detail-features__wrap"><div class="m-product-detail-features__title">Ürün Model Adı</div><div class="m-product-detail-features__text">SONY PLAYSTATİON 5 SLİM DİGİTAL EDİTİON OYUN KONSOLU</div></div><div class="m-product-detail-features__wrap"><div class="m-product-detail-features__title">Üretim Yeri</div><div class="m-product-detail-features__text">ÇİN</div></div><div class="m-product-detail-features__wrap"><div class="m-product-detail-features__title">Ürün Tipi</div><div class="m-product-detail-features__text"></div></div><div class="m-product-detail-features__wrap"><div class="m-product-detail-features__title">Ayırdedici Özellik</div><div class="m-product-detail-features__text"></div></div></div></div><div class="js-more-content__more" style="display: block;"><div class="m-product-detail-features__container"><div class="m-product-detail-features__wrap"><div class="m-product-detail-features__title">Özellik</div><div class="m-product-detail-features__text"></div></div><div class="m-product-detail-features__wrap"><div class="m-product-detail-features__title">Materyal</div><div class="m-product-detail-features__text"></div></div><div class="m-product-detail-features__wrap"><div class="m-product-detail-features__title">Fonksiyonu</div><div class="m-product-detail-features__text"></div></div><div class="m-product-detail-features__wrap"><div class="m-product-detail-features__title">Garanti Süresi</div><div class="m-product-detail-features__text"></div></div><div class="m-product-detail-features__wrap"><div class="m-product-detail-features__title">Orjınal Renk</div><div class="m-product-detail-features__text">BEYAZ</div></div><div class="m-product-detail-features__wrap"><div class="m-product-detail-features__title">Ana Renk</div><div class="m-product-detail-features__text">BEYAZ</div></div><div class="m-product-detail-features__wrap"><div class="m-product-detail-features__title">Renk</div><div class="m-product-detail-features__text">BEYAZ</div></div><div class="m-product-detail-features__wrap"><div class="m-product-detail-features__title">Seri - Imeı</div><div class="m-product-detail-features__text"></div></div><div class="m-product-detail-features__wrap"><div class="m-product-detail-features__title">Part Number</div><div class="m-product-detail-features__text"></div></div><div class="m-product-detail-features__wrap"><div class="m-product-detail-features__title">Ürün Etiket Adı</div><div class="m-product-detail-features__text"></div></div><div class="m-product-detail-features__wrap"><div class="m-product-detail-features__title">Desi</div><div class="m-product-detail-features__text">3</div></div><div class="m-product-detail-features__wrap"><div class="m-product-detail-features__title">Marka</div><div class="m-product-detail-features__text">SONY</div></div><div class="m-product-detail-features__wrap"><div class="m-product-detail-features__title"></div><div class="m-product-detail-features__text"></div></div></div></div></div><div class="m-btn-group m-t-35"><a class="a-btn a-btn--with-icon icon-plus a-btn--with-icon--start a-btn--secondary js-more-content__button" href="javascript:;">Daha Fazla</a></div></div></div></div><div class="m-p-tab__pane" role="tabpanel"><div class="container"><section id="all-comments" class="product-detail__all-comments white"><div class="m-comment-block-view--v2"><div class="m-grid"><div class="m-grid-col-5"><div class="m-comment-block-view--v2__total m-comment-block-view--v2__container"><div class="m-grid"><div class="m-grid-col-8"><span class="m-comment-block-view--v2__evaluation">Henüz yorum yok</span></div><div class="m-grid-col-3"><a class="a-btn a-btn--full a-btn--blue general-redirect js-open-login-box" data-redirect="/pasaj/hesabim/degerlendirmelerim" href="javascript:;">Yorum Yaz</a></div></div></div></div></div></div><div class="js-comment-container"></div><script id="first-comment-template" type="text/x-handlebars-template"><div class="m-comment-block-view--v2__container js-comment-block" id="{{id}}">
                        {{#if mostPopular}}
                        <span class="m-comment-block-view__most-popular">En Popüler Yorum</span>
                        {{/if}}
                        <h3 class="m-comment-block-view__title">{{title}}</h3><div class="a-rate m-comment-block-view__rate">
                            {{{generalRating}}}
                        </div><span class="m-comment-block-view__misc">{{author}} | {{date}}
          {{#if confirmedPurchase}}
          <span class="m-comment-block-view__misc__confirmed">{{confirmedPurchase}}</span>
          {{/if}}
        </span><div class="toggle-content m-comment-block-view__comment" data-component="ToggleContent"
                             data-char-limit="110"><p><span class="toggle-content__block">{{{text}}}</span><a
                                    class="toggle-content__button js-toggle-button"
                                    href="javascript:;"> Devamını Oku
                                <i
                                        class="a-icon icon-arrow-left"></i></a></p></div><div class="m-comment-block-view__helpful">Bu yorumu faydalı buldunuz mu?
                            <div class="a-like" data-component="Like" data-service-url="{{likeServiceUrl}}"><a
                                    href="javascript:;"
                                    class="like">{{like}}</a><a
                                    href="javascript:;" class="dislike">{{dislike}}</a></div></div></div></script><script id="comment-template" type="text/x-handlebars-template"><div class="m-comment-block-view js-comment-block" id="{{id}}"><div class="m-grid"><div class="m-grid-col-12"><div class="m-comment-block-view__container"><div class="a-rate m-comment-block-view__rate">
                                        {{{generalRating}}}
                                    </div><span class="m-comment-block-view__misc"> {{author}} | {{date}}
                </span><span class="m-comment-block-view__sales"> {{sales}} <b>{{store}}</b></span>
                                    {{#if confirmedSales}}
                                    <span class="m-comment-block-view__confirmed-sales">{{confirmedSales}}</span>
                                    {{/if}}
                                </div><div class="toggle-content m-comment-block-view__comment" data-component="ToggleContent"
                                     data-char-limit="310"><p><span class="toggle-content__block">{{{text}}}</span><a
                                            class="toggle-content__button js-toggle-button"
                                            href="javascript:;">Devamını Oku<i
                                            class="a-icon icon-arrow-left"></i></a></p>
                                    {{#if photo}}
                                    <div class="m-comment-block-view__photo"><div class="m-slider"
                                             data-component='{"slidesPerView":"auto","spaceBetween":16, "type":"Slider"}'><div class="m-slider__swiper swiper-container"><div class="swiper-wrapper">
                                                    {{#each photo}}
                                                    <div class="swiper-slide"><a data-fancybox="{{gruoName}}" href="{{path}}"><img
                                                                src="{{path}}" alt=""/></a></div>
                                                    {{/each}}
                                                </div><span class="swiper-notification" aria-live="assertive"
                                                      aria-atomic="true"></span></div></div></div>
                                    {{/if}}
                                    <div class="m-comment-block-view__helpful">Bu yorumu faydalı buldunuz mu?
                                        <div class="a-like" data-component="Like" data-service-url="{{likeServiceUrl}}"><a
                                                    href="javascript:;" class="like">{{like}}</a></div></div></div></div></div></div></script></section></div></div><div class="m-p-tab__pane" role="tabpanel" data-keyword="credit-card"><div class="container"><section class="product-detail__other-section"><p class="text-center">Anlaşmalı olduğumuz bankalarla alışverişini kredi kartına taksit seçeneği ile hızlı, kolay ve güvenli bir şekilde tamamlayabilirsin.</p><div class="table-content"></div><span class="product-detail__other-section__info">• Ödeme esnasında seçilen taksitlerde vade farkından dolayı tutar farklılıkları görülebilir. <br>• Taksit üst sınırı bireysel kredi kartları ile yapılan elektronik eşya alımlarında (Video, kamera, ses sistemleri, fiyatı 5.000 Türk lirasının üzerinde olan televizyon vb) 4 ay, tablet alımlarında 6 ay, elektrikli eşya (Buzdolabı, çamaşır makinesi, bulaşık makinesi, elektrikli ev aletleri vb.) alımlarında ve fiyatı 5.000 Türk Lirasına kadar olan televizyon alımlarında 9 ay, bilgisayar alımlarında 12 ay, “yenileme merkezi” veya “yetkili satıcı” niteliğindeki iş yerlerinden alınan yenilenmiş ürün niteliğinde olan cep telefonu alımlarında 12 ay olarak olarak uygulanır. Bireysel kredi kartlarıyla gerçekleştirilecek telekomünikasyon, hediye kart, hediye çeki ve benzeri şekillerde herhangi somut bir mal veya hizmeti içermeyen ürünlerin alımlarında taksit uygulanamaz. </span><script id="bank-list-template" type="text/x-handlebars-template">
                      {{#if items.creditCardInstallmentDefinitionResourceList}} <div class="m-p-table m-p-table--bordered"><div class="m-grid">
                            {{#each items.creditCardInstallmentDefinitionResourceList}}
                              {{#if installmentDefinitionsItemSet}} <div class="m-grid-col-3"><table><thead><tr><th colspan="3">
                                          {{#if banner}} <div class="m-p-table__badge">{{{banner}}}</div>
                                          {{/if}} <img class="lazyload" src="http://localhost/pasaj/web/assetsv2/common/images/spacer.gif" alt="{{{bankConnectionName}}}" data-src="{{{bankLogo}}}">
                                        </th></tr>
                                      {{#if bankConnectionName}} <tr></tr>
                                      {{/if}} <tr><th>Vade</th><th>Taksit Tutarı</th><th>Toplam Tutar</th></tr>
                                    </thead><tbody>
                                      {{#each installmentDefinitionsItemSet}} <tr><td>
                                            {{{installmentCount}}} {{#if badge}}<span>{{{badge}}}</span>{{/if}} 
                                          </td><td> {{{installmentAmount}}} TL</td><td> {{{totalAmount}}} TL</td></tr>
                                      {{/each}} 
                                    </tbody></table></div>
                              {{/if}}
                            {{/each}} 
                          </div></div>
                      {{else}} <div class="a-description a-description--soft a-description--gray m-t-20"><span>Bu üründe kredi kartına taksit seçeneği bulunmamaktadır.</span></div>
                      {{/if}} 
                    </script></section></div></div><div class="m-p-tab__pane" role="tabpanel" data-keyword="shopping-credit"><div class="container"><section class="product-detail__other-section"><p class="text-center">Sepetini hemen oluşturup Alışveriş Kredisi seçeneği ile ödeme adımında taksitlendirebilir, hızlı, kolay ve güvenli bir şekilde işlemlerini gerçekleştirebilirsin.</p><div class="table-content"></div><span class="product-detail__other-section__info">Paycell Alışveriş Limiti ürününde kredi Turkcell Finansman A.Ş. (Financell) tarafından tahsis edilmektedir. Krediye ilişkin vade, taksit tutarı, taksit adedi ve faiz oranı Financell tarafından belirlenir. Vade ve taksit tutarları tek bir ürün üzerinden hesaplanmış olup sepetteki tutar üzerinden değişiklik gösterebilir. Maksimum vade bilgisayarlarda 12, tabletlerde 6 aydır. 12.000 TL ve altındaki cep telefonlarında maksimum vade 12 ay, 12.000 TL üzerindeki cep telefonlarında 3 aydır. Örneğin, sepetinizde 12.600 TL ve 11.500 TL değerinde iki ayrı telefon varsa kullanabileceğiniz maksimum vade 3 aydır. Bu kategoriler haricinde kalan ve 50.001 TL – 100.000 TL arasında açılacak krediler için vade üst sınırı 24 aydır.</span><div class="m-stepwizard"><div class="m-stepwizard__text"><p>Nasıl Kredi Kullanabilirim ?</p><p class="m-stepwizard__text--desc">Bir kaç adımda, krediniz anında onaylanır.</p></div><div class="m-stepwizard__icon"><ul class="a-step-wizard"><li><a><i class="a-icon icon-basket-blue"></i><p><span>1</span>Sepetini Oluştur</p></a></li><li><a><i class="a-icon icon-payment-blue"></i><p><span>2</span>Ödeme Yöntemini Alışveriş Kredisi Seç</p></a></li><li><a><i class="a-icon icon-bank-blue"></i><p><span>3</span>Banka Ekranlarında Başvurunu Tamamla</p></a></li><li><a><i class="a-icon icon-success-blue"></i><p><span>4</span>Siparişin Onaylansın</p></a></li></ul></div></div></section><script id="shopping-credit-list-template" type="text/x-handlebars-template"><div class="m-p-table m-p-table--bordered"><div class="m-grid">
                    {{#each items.bankCreditSimulations}}
                    <div class="m-grid-col-3"><table><thead><tr><th colspan="3">
                                    {{#if banner}}<div class="m-p-table__badge">{{{banner}}}</div>{{/if}}
                                    <img class="lazyload" src="/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif" alt="{{{bankName}}}" data-src="{{{bankLogoUrl}}}"></th></tr><tr>
                                {{#if title}}
                                <th colspan="3">
                                    {{{title}}}
                                </th>
                                {{/if}}
                            </tr><tr><th>Vade</th><th>Taksit Tutarı</th><th>Toplam Tutar</th></tr></thead><tbody>
                            {{#each monthlyCreditAmountList}}
                            <tr><td>
                                    {{{loan}}} {{#if badge}}<span>{{{badge}}}</span>{{/if}}
                                </td><td> {{{installmentAmount}}} </td><td> {{{totalAmount}}} </td></tr>
                            {{/each}}
                            </tbody></table></div>
                    {{/each}}
                </div></div></script></div></div><div class="m-p-tab__pane" role="tabpanel"><div class="container"><section class="product-detail__other-section"><p class="text-center">Pasaj’da ödeme kolaylığı sağlayan kredi kartı kampanyalarımızı kaçırmayın! </p><div class="m-more-content"><div class="js-more-container" style="height: 674px;"><div class="js-more-content__first"><div class="m-p-cc5"><figure class="m-p-cc5__img"><img class="p-lazy" src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Bireysel/Kampanya/render/gorseller/pasaj-paycell-cash-back-web.png" alt="Campaign Img"></figure><div class="m-p-cc5__text"><span class="m-p-cc5__title">Paycell Kart’la Harcama Yap, Anında Nakit İade Kazan!</span><p>Paycell Kart’ınla yapacağın 750 TL ve üzeri harcamaya 75 TL, 1.000 TL ve üzeri harcamaya ise 150 TL anında nakit iade!</p><a class="a-btn a-btn--full a-btn--blue" href="https://www.turkcell.com.tr/kampanyalar/pasaj/cihazlar/paycell-kartla-harcama-yap-aninda-nakit-iade-kazan" target="_blank">Devamı</a></div></div><div class="m-p-cc5"><figure class="m-p-cc5__img"><img class="p-lazy" src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Bireysel/Kampanya/render/gorseller/Pasaj-isbank-463x212.png" alt="Campaign Img"></figure><div class="m-p-cc5__text"><span class="m-p-cc5__title">Maximum Kart’a özel peşin fiyatına 3 taksit!</span><p>1-29 Şubat 2024 tarihleri arasında Maximum Kart’ınız ile Turkcell Pasaj'dan yapacağınız alışverişlerinizde peşin fiyatına 3 taksit fırsatı!</p><a class="a-btn a-btn--full a-btn--blue" href="https://www.turkcell.com.tr/kampanyalar/pasaj/cihazlar/maximum-karta-ozel-pesin-fiyatina-3-taksit" target="_blank">Devamı</a></div></div><div class="m-p-cc5"><figure class="m-p-cc5__img"><img class="p-lazy" src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Bireysel/Kampanya/render/gorseller/Pasaj_fibabanka-F3-460x208.png" alt="Campaign Img"></figure><div class="m-p-cc5__text"><span class="m-p-cc5__title">%0 Faiz ile Alışveriş Burada!</span><p>7.500 TL’ye kadar olan alışverişinde 3 ay vade %0 faiz imkânı; 70.000 TL’ye kadar olan alışverişinde ise uygun faiz oranlarıyla 24 ay taksit seçenekleri seni bekliyor!</p><a class="a-btn a-btn--full a-btn--blue" href="https://www.turkcell.com.tr/kampanyalar/pasaj/cihazlar/fibabanka-alisveris-kredisi-firsatlari" target="_blank">Devamı</a></div></div></div><div class="js-more-content__more" style="display: block;"></div></div></div></section></div></div><div class="m-p-tab__pane" role="tabpanel"><div class="container"><section class="product-detail__conditions"><p class="text-center"></p><p align="left"><b>Dikkat edilmesi gerekenler</b><br>•İade edilecek ürünün orijinal kutusu bozulmamış olmalı, ürünlerde çizik veya herhangi bir hasar olmamalıdır. İade edilen ürün tüm yan ürün ve aksesuarlarıyla birlikte gönderilmelidir. Ürünlerin 14 günde iade koşullarına uygun bir şekilde iade edilmesi gerekmektedir.<br>•Büyük desili ürünlerde (Beyaz eşya, TV vb.) ambalajın teknik servis tarafından açılmadığı durumlar veya hasarlı ambalajlarda tutanak tutulmaması durumunda cayma hakkı geçerli değildir.<br>•İlgili yasa gereği faturasız iade ve değişim yapılamamaktadır.<br><br><b>İade yapılamayan ürünler:</b><br>•Dijital ürün kodlarında iade bulunmamaktadır. Elektronik ortamda anında iletilen hizmetler veya teslim edilen ürünlerde iade bulunmamaktadır.<br>•Kullanım esnasında vücut ile birebir temas gerektiren ve kullanımla beraber sağlık açısından tehlike arz edebilen ürünlerin iadesi/değişimi yapılamamaktadır. (Tüm Kişisel Bakım Ürünleri, Kulak içi /kulak üstü kulaklık, saat, akıllı bileklik vb.) </p><div class="product-detail__conditions-content"><div class="product-detail__conditions-content-box"><div class="pd__conditions-img"><img src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/images/cancelandreturn/time.png"></div><span>1</span><p>Ürünün teslim tarihinden itibaren <b><br> 14 gün geçmediğine emin olun.</b></p></div><div class="product-detail__conditions-content-box"><div class="pd__conditions-img"><img src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/images/cancelandreturn/orders.png"></div><span>2</span><p>Pasaj üzerinde <b><br> “Siparişlerim” sekmesine girin</b></p></div><div class="product-detail__conditions-content-box"><div class="pd__conditions-img"><img src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/images/cancelandreturn/request.png"></div><span>3</span><p>İade nedeninizi seçerek <b>“İade Talebi OIuştur” </b> butonuna tıklayın.</p></div><div class="product-detail__conditions-content-box"><div class="pd__conditions-img"><img src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/images/cancelandreturn/phone-code.png"></div><span>4</span><p>SMS ile gelecek <b><br> kargo kodunu <br></b> not alın.</p></div><div class="product-detail__conditions-content-box"><div class="pd__conditions-img"><img src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/images/cancelandreturn/box.png"></div><span>5</span><p>Ürünü eksiksiz bir şekilde paketleyerek faturası ile birlikte <b>Yurtiçi Kargo’ya 7 iş günü içinde teslim edin.</b></p></div><div class="product-detail__conditions-content-box"><div class="pd__conditions-img"><img src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/images/cancelandreturn/bank.png"></div><span>6</span><p>Ürün bize ulaştıktan sonra maksimum <b>5 gün içinde kontrol edilir,</b> iade talebiniz onaylandığında paranız otomatik olarak bankanıza aktarılır.</p></div></div></section></div></div></div></div></section><div class="container"></div><div style="display: none" class="card-product-div"><a href="/pasaj/hobi-oyun/oyun-konsolu/ps5/sony-playstation-5-slim-digital-edition-oyun-konsolu-ithalatci-garantili" class="google-analytics-device device-detail-btn m-p-pc-new" style="" data-product-id="sony-playstation-5-slim-digital-edition-oyun-konsolu-ithalatci-garantili" data-campaign="campaign,discount," data-href="/pasaj/hobi-oyun/oyun-konsolu/ps5/sony-playstation-5-slim-digital-edition-oyun-konsolu-ithalatci-garantili" data-image-url="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00JNM2/00JNM2-1.png"><div class="a-p-card-ribbon a-p-card-ribbon--a a-p-card-ribbon--short " style="background: #00BAFC"> Günün Fırsatları </div><div class="a-fav-button" data-url="/pasaj/user-favorite-operation" data-device-path="/pasaj/hobi-oyun/oyun-konsolu/ps5/sony-playstation-5-slim-digital-edition-oyun-konsolu-ithalatci-garantili" data-device-id="1111308" data-pm-name="Sony Playstation 5 Slim 1 TB Digital Edition Oyun Konsolu (İthalatçı Garantili)"><span class="tooltip tooltipstered" data-alternative="Favoriden Çıkar"><svg class="heart" xmlns="http://www.w3.org/2000/svg" width="36" height="32" viewBox="0 0 36 32"><path fill="#FFC900" fill-rule="nonzero" stroke="#FFC900" class="heart-line" d="M3.058 2.738l-.104.104C-.983 6.779-.985 13.165 2.95 17.1l12.678 12.678c.847.847 2.213.849 3.062 0L31.368 17.1c3.938-3.938 3.938-10.317-.004-14.258l-.104-.104c-3.654-3.654-9.578-3.65-13.237.009l-.614.614c-.137.137-.363.137-.5 0l-.614-.614C12.638-.91 6.709-.913 3.058 2.738zM15.89 4.38c.7.7 1.836.7 2.536 0l.614-.614c3.097-3.097 8.11-3.1 11.201-.009l.104.104c3.379 3.38 3.38 8.846.004 12.221L17.671 28.76c-.285.285-.74.285-1.024 0L3.968 16.08C.596 12.71.598 7.235 3.972 3.86l.104-.104c3.088-3.088 8.106-3.085 11.2.009l.615.614z" transform="translate(-1254 -352) translate(1255 353)"></path><path fill="#ffc900" class="heart-fill" d="M15.994 3.47C12.784.213 7.577.215 4.368 3.47l-.258.262C.48 7.412.48 13.379 4.107 17.056l12.445 12.619c.556.563 1.462.558 2.013 0L31.01 17.056c3.628-3.679 3.629-9.642-.002-13.324l-.26-.263c-3.21-3.255-8.413-3.256-11.625 0l-1.057 1.073c-.28.284-.736.282-1.014 0l-1.058-1.073z" transform="translate(-1254 -352) translate(1239 328) translate(16 25)"></path></svg></span></div><div class="m-p-pc-new__body"><div class="m-p-pc-new__carousel"><div class="swiper-container swiper-container-initialized swiper-container-horizontal"><div class="swiper-wrapper" style="transition-duration: 0ms;"><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00JNM2/00JNM2-1/00JNM2-1_250x188.png?17735349480672" alt="Sony Playstation 5 Slim 1 TB Digital Edition Oyun Konsolu (İthalatçı Garantili)" class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00JNM2/00JNM2-2/00JNM2-2_250x188.png?17735349480672" alt="Sony Playstation 5 Slim 1 TB Digital Edition Oyun Konsolu (İthalatçı Garantili)" class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00JNM2/00JNM2-3/00JNM2-3_250x188.png?17735349480672" alt="Sony Playstation 5 Slim 1 TB Digital Edition Oyun Konsolu (İthalatçı Garantili)" class="swiper-lazy"></figure></div><div class="swiper-slide"><figure class="m-p-pc-new__img"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/assetsv2/common/images/spacer.gif?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00JNM2/00JNM2-4/00JNM2-4_250x188.png?17735349480672" alt="Sony Playstation 5 Slim 1 TB Digital Edition Oyun Konsolu (İthalatçı Garantili)" class="swiper-lazy"></figure></div></div><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div><div class="m-p-pc-new__carousel__pagination swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"></div></div><span class="m-p-pc-new__title">Sony Playstation 5 Slim 1 TB Digital Edition Oyun Konsolu (İthalatçı Garantili)</span><div class="a-rate__point"></div><div class="m-p-pc-new__badges"><div class="m-p-pc-new__badge" style="background: #E5F8FF">Peşine 3<br> Taksit</div><div class="m-p-pc-new__badge" style="background: #E5F8FF">Alışveriş<br>Kredisi</div><div class="m-p-pc-new__badge" style="background: #FDF7E7">Ücretsiz<br>Kargo</div></div></div><div class="m-p-pc-new__foot"><div class="m-p-pc-new__price m-p-pc-new__price--secondary"><div class="m-p-pc-new__price">20.999 <span class="m-p-pc-new__price__cur">TL</span></div><div class="m-p-pc-new__price m-p-pc-new__price--box"><div class="m-p-pc-new__price--old">21.608 <span class="m-p-pc-new__price__cur">TL <span class="m-p-pc-new__price__cur__discount">609 TL İndirim</span></span></div></div><div class="m-p-pc-new__lowest-price">Son 30 günün en düşük fiyatı</div></div></div>
            <!-- google-analytics --><div id="google-analytics-device-informations" style="display: none;" data-section-title="Hobi-Oyun" data-product-id="1111308" data-product-name="Sony Playstation 5 Slim 1 TB Digital Edition Oyun Konsolu (İthalatçı Garantili)" data-product-price="20999.0" data-product-brand="Sony" data-position="1" data-dimension21="TRY" data-dimension22="true" data-dimension25="Pesin" data-dimension27="true" data-dimension30="Non-Turkcell" data-dimension156="true" data-dimension157="22.2" data-dimension167="66" data-dimension168="4" data-dimension169="0" data-dimension170="0" data-ribbon_ozel="false" data-ribbon-tlkupon="false" data-ribbon-tukeniyor="false" data-ribbon-firsaturunu="false" data-ribbon-coksatan="false" data-ribbon-gununfirsati="1" data-badge-faturayaektaksitli="false" data-badge-pesinfiyatinataksit="Peşine 3<br> Taksit, 1" data-badge-alisveriskredisi="1" data-badge-faturanlaode="false" data-badge-ucretsizkargo="1" data-badge-hizliteslimat="0" data-badge-magazadanteslim="false" data-badge-anindateslim="false" data-dahili-hafiza="" data-countdown="2024/02/29,00:00:00" data-indirim-tutari="6000" data-indirim-orani="22.2" data-unit-sale-price="20999.0" data-product-category="Hobi-Oyun" data-dimension173="Oyun Konsolları" data-dimension174="Playstation 5 / PS5"></div>
            <!-- google-analytics -->
          </a></div></div><input type="hidden" id="shopDeviceDetailUtagData" data-product-title="Sony Playstation 5 Slim 1 TB Digital Edition Oyun Konsolu (İthalatçı Garantili)" data-product-category="Hobi-Oyun" data-brand="Sony" data-product-id="1111308" data-stock-state="in_stock" data-user-logged="false" data-product-sub-category="Playstation" 5="" ps5=""><script>
        var utag_data = utag_data || {};
        utag_data.product_name = ["Sony Playstation 5 Slim 1 TB Digital Edition Oyun Konsolu (İthalatçı Garantili)"];
        utag_data.product_category = ["Hobi-Oyun"];
        utag_data.product_brand = ["Sony"];
        utag_data.product_id = ["1111308"];
        utag_data.stock_state = ["in_stock"];
      </script><script type="application/ld+json">
        {
          "@context": "http://schema.org/",
          "@type": "Product",
          "name": "Sony Playstation 5 Slim 1 TB Digital Edition Oyun Konsolu (İthalatçı Garantili)",
          "url": "https://www.turkcell.com.tr/pasaj/hobi-oyun/oyun-konsolu/ps5/sony-playstation-5-slim-digital-edition-oyun-konsolu-ithalatci-garantili",
          "sku": 1111308,
          "brand": {
            "@type": "Thing",
            "name": "Sony"
          },
          "description": "PlayStation 5 konsolunun neler yapabileceğini baştan yazan özel CPUnun, GPUnun ve Entegre Giriş/Çıkış özellikli SSDnin gücünden faydalanın. PlayStation 5 (PS5) ile birlikte donanım gücü de bir üst seviyeye çıkıyor.",
          "image": ["https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00JNM2/00JNM2-1.png", "https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00JNM2/00JNM2-2.png", "https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00JNM2/00JNM2-3.png", "https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/00JNM2/00JNM2-4.png"],
          "offers": {
            "@type": "AggregateOffer",
            "lowPrice": 20999.0,
            "highPrice": 25999.0,
            "priceCurrency": "TRY",
            "availability": "https://schema.org/InStock",
            "offerCount": 5,
            "offers": [{
              "@type": "Offer",
              "price": 23999.0,
              "priceCurrency": "TRY",
              "offeredBy": {
                "name": "Turkcell Satış A.Ş.",
                "@type": "Organization"
              }
            }, {
              "@type": "Offer",
              "price": 25999.0,
              "priceCurrency": "TRY",
              "offeredBy": {
                "name": "Koçak Teknoloji",
                "@type": "Organization"
              }
            }, {
              "@type": "Offer",
              "price": 20999.0,
              "priceCurrency": "TRY",
              "offeredBy": {
                "name": "Kafkasda",
                "@type": "Organization"
              }
            }, {
              "@type": "Offer",
              "price": 22999.0,
              "priceCurrency": "TRY",
              "offeredBy": {
                "name": "Blackbox",
                "@type": "Organization"
              }
            }, {
              "@type": "Offer",
              "price": 23589.0,
              "priceCurrency": "TRY",
              "offeredBy": {
                "name": "TunelShop",
                "@type": "Organization"
              }
            }]
          }
        }
      </script><script type="application/ld+json">
        {
          "@context": "http://schema.org/",
          "@type": "BreadcrumbList",
          "itemListElement": [{
            "@type": "ListItem",
            "position": 1,
            "name": "Pasaj",
            "item": "https://www.turkcell.com.tr/pasaj"
          }, {
            "@type": "ListItem",
            "position": 2,
            "name": "Hobi-Oyun",
            "item": "https://www.turkcell.com.tr/pasaj/hobi-oyun"
          }, {
            "@type": "ListItem",
            "position": 3,
            "name": "Oyun Konsolları",
            "item": "https://www.turkcell.com.tr/pasaj/hobi-oyun/oyun-konsolu"
          }, {
            "@type": "ListItem",
            "position": 4,
            "name": "Playstation 5 / PS5",
            "item": "https://www.turkcell.com.tr/pasaj/hobi-oyun/oyun-konsolu/ps5"
          }, {
            "@type": "ListItem",
            "position": 5,
            "name": "Sony Playstation 5 Slim 1 TB Digital Edition Oyun Konsolu (İthalatçı Garantili)",
            "item": "https://www.turkcell.com.tr/pasaj/hobi-oyun/oyun-konsolu/ps5/sony-playstation-5-slim-digital-edition-oyun-konsolu-ithalatci-garantili"
          }]
        }
      </script></main><footer class="o-p-footer"><div class="o-p-footer-top"><div class="container-p"><nav class="o-p-footer-nav"><div class="m-p-grid"><div class="m-p-grid-col"><h3><a href="/tr/hakkimizda?place=footer" title="Hakkımızda">Hakkımızda</a></h3><ul><li><a href="/tr/hakkimizda/iletisim?place=footer&amp;place=footer" title="İletişim">İletişim</a></li><li><a href="/tr/hakkimizda/genel-bakis?place=footer" title="Genel Bakış">Genel Bakış</a></li><li><a href="https://www.turkcell.com.tr/tr/hakkimizda/gizlilik-ve-guvenlik?place=footer" title="Gizlilik Ve Güvenlik">Gizlilik Ve Güvenlik</a></li><li><a href="/tr/hakkimizda/haberler-sosyal-aglar?place=footer" title="Haberler &amp; Duyurular">Haberler &amp; Duyurular</a></li><li><a href="https://www.turkcell.com.tr/5g?place=footer" title="Turkcell 5G">Turkcell 5G</a></li><li><a href="/tr/hakkimizda/kurumsal-iletisim?place=footer" title="Kurumsal İletişim ve Sürdürülebilirlik">Kurumsal İletişim ve Sürdürülebilirlik</a></li><li><a href="/tr/hakkimizda/yatirimci-iliskileri?place=footer" title="Yatırımcı İlişkileri">Yatırımcı İlişkileri</a></li><li><a href="https://kariyerim.turkcell.com.tr?place=footer" title="İnsan Kaynakları">İnsan Kaynakları</a></li><li><a href="/afettedbirleri?place=footer" title="Afet Tedbirleri">Afet Tedbirleri</a></li><li><a href="/gsyf?place=footer" title="Turkcell GSYF">Turkcell GSYF</a></li><li class="hidden-nav-item"><a href="https://www.turkcell.com.tr/tr/hakkimizda/toptan?place=footer" title="Toptan">Toptan</a></li><li class="hidden-nav-item"><a href="/tr/hakkimizda/genel-bakis/istiraklerimiz?place=footer" title="İştiraklerimiz">İştiraklerimiz</a></li><li class="hidden-nav-item"><a href=" http://turkcell.li/Y42iJ?place=footer" title="Bilgi Toplumu Hizmetleri">Bilgi Toplumu Hizmetleri</a></li><li class="hidden-nav-item"><a href="/tr/hakkimizda/genel-bakis/turkcell-logo?place=footer" title="Logolarımız">Logolarımız</a></li></ul><a class="js-nav-more__button" href="javascript:;" data-toggle="Daha Az Göster"><span>Tümünü Gör</span><i class="a-icon icon-arrow-left"></i></a></div><div class="m-p-grid-col"><h3><a href="/?place=footer" title="Ürün ve Hizmetler">Ürün ve Hizmetler</a></h3><ul><li><a href="/pasaj?place=footer&amp;place=footer" title="Turkcell Pasaj">Turkcell Pasaj</a></li><li><a href="https://pasajblog.turkcell.com.tr/?place=footer" title="Pasaj Blog">Pasaj Blog</a></li><li><a href="/pasaj-gaming?place=footer" title="Pasaj Gaming">Pasaj Gaming</a></li><li><a href="/paket-ve-tarifeler?place=footer" title="Paketler">Paketler</a></li><li><a href="/servisler?place=footer" title="Dijital Servisler">Dijital Servisler</a></li><li><a href="/kampanyalar?place=footer" title="Kampanyalar">Kampanyalar</a></li><li><a href="/sosyal-destek?place=footer" title="Sosyal Destek">Sosyal Destek</a></li><li><a href="/kulup-ve-programlar?place=footer" title="Kulüp ve Programlar ">Kulüp ve Programlar </a></li><li><a href="/kampanya/hiz-testi/?place=footer&amp;place=footer" title="İnternet Hız Testi">İnternet Hız Testi</a></li><li><a href="/paket-ve-tarifeler/faturali-hat?place=footer&amp;place=footer" title="Faturalı Paketler">Faturalı Paketler</a></li><li class="hidden-nav-item"><a href="/paket-ve-tarifeler/hazir-kart?place=footer" title="Hazır Kart Paketler">Hazır Kart Paketler</a></li><li class="hidden-nav-item"><a href="/tr/ev-cozumleri?place=footer&amp;place=footer" title="Ev İnterneti">Ev İnterneti</a></li><li class="hidden-nav-item"><a href="/kampanya/yazlik-internet/?place=footer" title="Yazlık İnternet">Yazlık İnternet</a></li><li class="hidden-nav-item"><a href="https://www.turkcell.com.tr/kampanya/eski-telefonunu-sat/?place=footer" title="Telefon Sat">Telefon Sat</a></li><li class="hidden-nav-item"><a href="https://www.turkcell.com.tr/kampanyalar/cihazlar/turkcell-eskisini-getir-yenisini-gotur-kampanyasi?place=footer" title="Eskiyi Getir Yeniyi Al">Eskiyi Getir Yeniyi Al</a></li><li class="hidden-nav-item"><a href="/kampanya/universite-ogrencilerine-10-gb-internet-destegi/?place=footer" title="Öğrencilere 10 GB İnternet Desteği">Öğrencilere 10 GB İnternet Desteği</a></li></ul><a class="js-nav-more__button" href="javascript:;" data-toggle="Daha Az Göster"><span>Tümünü Gör</span><i class="a-icon icon-arrow-left"></i></a></div><div class="m-p-grid-col"><h3><a href="#?place=footer" title="Popüler Marka ve Kategoriler">Popüler Marka ve Kategoriler</a></h3><ul><li><a href="/apple?place=footer&amp;place=footer" title="Apple Ürünleri ve Aksesuarları ">Apple Ürünleri ve Aksesuarları </a></li><li><a href="/samsung?place=footer&amp;place=footer" title="Samsung Ürün ve Aksesuarları">Samsung Ürün ve Aksesuarları</a></li><li><a href="/pasaj/cep-telefonu/yenilenmis-telefonlar?place=footer" title="İkinci El / Yenilenmiş Telefonlar">İkinci El / Yenilenmiş Telefonlar</a></li><li><a href="/pasaj/cep-telefonu/cep-telefonu-aksesuarlari/kiliflar?place=footer" title="Telefonu Kılıfı">Telefonu Kılıfı</a></li><li><a href="/pasaj/elektrikli-ev-aletleri/elektrikli-mutfak-aletleri/kahve-makinesi?place=footer" title="Kahve Makineleri">Kahve Makineleri</a></li><li><a href="/pasaj/cep-telefonu/giyilebilir-teknolojiler/akilli-saatler?place=footer" title="Akıllı Saatler">Akıllı Saatler</a></li><li><a href="/pasaj/cep-telefonu/giyilebilir-teknolojiler/akilli-saatler/apple-watch-series-8-gps-45mm-aluminyum-kasa-spor-kordon?place=footer" title="Apple Watch Series 8 45 mm">Apple Watch Series 8 45 mm</a></li><li><a href="/pasaj/cep-telefonu/giyilebilir-teknolojiler/akilli-saatler/apple-watch-series-7-gps-41-mm?place=footer" title="Apple Watch Series 7 41 mm">Apple Watch Series 7 41 mm</a></li><li><a href="/pasaj/cep-telefonu/giyilebilir-teknolojiler/akilli-bileklikler?place=footer&amp;place=footer" title="Akıllı Bileklikler ">Akıllı Bileklikler </a></li><li><a href="/pasaj/bilgisayar-tablet/bilgisayarlar/oyun-bilgisayari?place=footer" title="Oyun Bilgisayarları">Oyun Bilgisayarları</a></li><li class="hidden-nav-item"><a href="/pasaj/bilgisayar-tablet/tabletler?place=footer" title="Tabletler">Tabletler</a></li><li class="hidden-nav-item"><a href="/pasaj/bilgisayar-tablet/bilgisayarlar/laptoplar?place=footer" title="Laptoplar">Laptoplar</a></li><li class="hidden-nav-item"><a href="/pasaj/elektrikli-ev-aletleri/supurge/robot-supurgeler?place=footer" title="Robot Süpürgeler ">Robot Süpürgeler </a></li><li class="hidden-nav-item"><a href="/pasaj/beyaz-esya?place=footer" title="Beyaz Eşya ">Beyaz Eşya </a></li><li class="hidden-nav-item"><a href="/pasaj/saglik-ve-kisisel-bakim-urunleri/agiz-bakim-urunleri/sarjli-dis-fircasi?place=footer" title="Şarjlı Diş Fırçaları ">Şarjlı Diş Fırçaları </a></li><li class="hidden-nav-item"><a href="/pasaj/hobi-oyun/oyun-konsolu?place=footer" title="Oyun Konsolu ">Oyun Konsolu </a></li><li class="hidden-nav-item"><a href="/pasaj/cep-telefonu/cep-telefonu-aksesuarlari/kulakliklar?place=footer" title="Kablosuz Kulaklıklar">Kablosuz Kulaklıklar</a></li><li class="hidden-nav-item"><a href="/pasaj/anne-bebek-oyuncak?place=footer" title="Anne - Bebek Ürünleri">Anne - Bebek Ürünleri</a></li><li class="hidden-nav-item"><a href="/pasaj/saglik-ve-kisisel-bakim-urunleri/cilt-bakim-teknolojileri-foreo?place=footer" title="Foreo Yüz Temizleme Cihazı">Foreo Yüz Temizleme Cihazı</a></li><li class="hidden-nav-item"><a href="/pasaj/hobi-oyun/oyun-konsolu/ps5?place=footer" title="Playstation 5">Playstation 5</a></li><li class="hidden-nav-item"><a href="https://www.turkcell.com.tr/pasaj/elektrikli-ev-aletleri/supurge/dikey-supurgeler/dyson-v15-detect-absolute?place=footer" title="Dyson V15">Dyson V15</a></li></ul><a class="js-nav-more__button" href="javascript:;" data-toggle="Daha Az Göster"><span>Tümünü Gör</span><i class="a-icon icon-arrow-left"></i></a></div><div class="m-p-grid-col"><h3><a href="/pasaj/cep-telefonu?place=footer" title="Cep Telefonları ve Markalar">Cep Telefonları ve Markalar</a></h3><ul><li><a href="https://www.turkcell.com.tr/kampanya/ogrenciye-teknolojik-cihaz-destegi/?place=footer" title="Teknolojik Cihaz Desteği">Teknolojik Cihaz Desteği</a></li><li><a href="https://www.turkcell.com.tr/kampanyalar/pasaj/cihazlar/9500-tl-alti-telefonlar?place=footer" title="Vergisiz Telefonlar">Vergisiz Telefonlar</a></li><li><a href="https://www.turkcell.com.tr/kampanyalar/pasaj/cihazlar/9500-tl-alti-bilgisayarlar-tabletler?place=footer" title="Vergisiz Bilgisayarlar">Vergisiz Bilgisayarlar</a></li><li><a href="https://www.turkcell.com.tr/pasaj/cep-telefonu/ios-telefonlar/apple-iphone-15-modelleri?place=footer" title="iPhone 15">iPhone 15</a></li><li><a href="https://www.turkcell.com.tr/pasaj/cep-telefonu/ios-telefonlar/apple-iphone-15-plus-modelleri?place=footer" title="iPhone 15 Plus">iPhone 15 Plus</a></li><li><a href="https://www.turkcell.com.tr/pasaj/cep-telefonu/ios-telefonlar/apple-iphone-15-pro?place=footer" title="iPhone 15 Pro">iPhone 15 Pro</a></li><li><a href="https://www.turkcell.com.tr/pasaj/cep-telefonu/ios-telefonlar/apple-iphone-15-pro-max?place=footer" title="iPhone 15 Pro Max">iPhone 15 Pro Max</a></li><li><a href="/pasaj/cep-telefonu/ios-telefonlar/iphone-14-128-gb?place=footer" title="iPhone 14">iPhone 14</a></li><li><a href="/pasaj/cep-telefonu/ios-telefonlar/iphone-14-plus-128-gb?place=footer" title="iPhone 14 Plus">iPhone 14 Plus</a></li><li><a href="/pasaj/cep-telefonu/ios-telefonlar/iphone-14-pro-128-gb?place=footer" title="iPhone 14 Pro">iPhone 14 Pro</a></li><li class="hidden-nav-item"><a href="/pasaj/cep-telefonu/ios-telefonlar/iphone-14-pro-max-128-gb?place=footer" title="iPhone 14 Pro Max">iPhone 14 Pro Max</a></li><li class="hidden-nav-item"><a href="/pasaj/cep-telefonu/ios-telefonlar/iphone-13-128-gb?place=footer" title="iPhone 13">iPhone 13</a></li><li class="hidden-nav-item"><a href="/pasaj/cep-telefonu/ios-telefonlar/iphone-13-mini-128-gb?place=footer" title="iPhone 13 Mini">iPhone 13 Mini</a></li><li class="hidden-nav-item"><a href="/pasaj/cep-telefonu/ios-telefonlar/iphone-13-pro-128-gb?place=footer" title="iPhone 13 Pro">iPhone 13 Pro</a></li><li class="hidden-nav-item"><a href="/pasaj/cep-telefonu/ios-telefonlar/iphone-13-pro-max-512-gb?place=footer" title="iPhone 13 Pro max">iPhone 13 Pro max</a></li><li class="hidden-nav-item"><a href="/pasaj/cep-telefonu/ios-telefonlar/iphone-11-64-gb?place=footer" title="iPhone 11 ">iPhone 11 </a></li><li class="hidden-nav-item"><a href="/pasaj/cep-telefonu/android-telefonlar/samsung-galaxy-z-fold3-5g?place=footer" title="Samsung Galaxy Z Fold 3">Samsung Galaxy Z Fold 3</a></li><li class="hidden-nav-item"><a href="/pasaj/cep-telefonu/android-telefonlar/galaxy-s22-ultra-128-gb?place=footer" title="Samsung Galaxy S22 Ultra">Samsung Galaxy S22 Ultra</a></li><li class="hidden-nav-item"><a href="/pasaj/cep-telefonu/android-telefonlar/xiaomi-redmi-note-11-pro-128gb-6gb?place=footer" title="Xiaomi Redmi Note 11 Pro ">Xiaomi Redmi Note 11 Pro </a></li><li class="hidden-nav-item"><a href="/pasaj/cep-telefonu/android-telefonlar/samsung-galaxy-a32?place=footer" title="Samsung Galaxy A32">Samsung Galaxy A32</a></li><li class="hidden-nav-item"><a href="/pasaj/cep-telefonu/android-telefonlar/galaxy-a73-5g-128gb?place=footer" title="Samsung Galaxy A73 ">Samsung Galaxy A73 </a></li><li class="hidden-nav-item"><a href="/pasaj/cep-telefonu/android-telefonlar/samsung-galaxy-a03-64-gb?place=footer" title="Samsung Galaxy A03">Samsung Galaxy A03</a></li><li class="hidden-nav-item"><a href="/pasaj/cep-telefonu/android-telefonlar/samsung-galaxy-a04-128-gb?place=footer" title="Samsung Galaxy A04">Samsung Galaxy A04</a></li><li class="hidden-nav-item"><a href="/pasaj/cep-telefonu/android-telefonlar/xiaomi-redmi-note-11-pro-6gb-ram---128gb-cep-telefonu--xiaomi-turkiye-garantili-?place=footer" title="Xiaomi Redmi Note 11 ">Xiaomi Redmi Note 11 </a></li></ul><a class="js-nav-more__button" href="javascript:;" data-toggle="Daha Az Göster"><span>Tümünü Gör</span><i class="a-icon icon-arrow-left"></i></a></div><div class="m-p-grid-col"><h3><a href="/hesabim?place=footer" title="İşlem Merkezi">İşlem Merkezi</a></h3><ul><li><a href="/hesabim?place=footer" title="Giriş Yap">Giriş Yap</a></li><li><a href="/tr/turkcellli-olmak/paket-secimi?place=footer" title="Numara Taşıma">Numara Taşıma</a></li><li><a href="/tr/turkcellli-olmak/paket-secimi?place=footer" title="Yeni Hat">Yeni Hat</a></li><li><a href="/yardim/yardim-araclari/fatura-borc-sorgulama-ve-odeme?place=footer" title="Fatura Sorgula &amp; Öde ">Fatura Sorgula &amp; Öde </a></li><li><a href="/paket-ve-tarifeler/ek-paketler/faturali-hat?place=footer" title="Faturalı Ek Paket Al">Faturalı Ek Paket Al</a></li><li><a href="/yukle/tl-paket-yukle?place=footer" title="Paket Yükle">Paket Yükle</a></li><li><a href="/yukle/tl-paket-yukle?tab=tl	&amp;place=footer" title="TL Yükle">TL Yükle</a></li><li><a href="/tr/turkcell-platinum?place=footer" title="Platinum Paketler">Platinum Paketler</a></li><li><a href="/pasaj/siparis-sorgulama?place=footer" title="Sipariş Takibi">Sipariş Takibi</a></li></ul></div><div class="m-p-grid-col"><h3><a href="/yardim?place=footer" title="Yardım">Yardım</a></h3><ul><li><a href="https://www.turkcell.com.tr/yardim?place=footer" title="Yardım Ana Sayfa">Yardım Ana Sayfa</a></li><li><a href="/tr/hakkimizda/iletisim/turkcell-iletisim-merkezleri?place=footer" title="En Yakın Mağaza">En Yakın Mağaza</a></li><li><a href="/kampanya/masterpass/?place=footer" title="Masterpass™">Masterpass™</a></li><li><a href="/yardim/yardim-araclari/puk-sorgulama?place=footer" title="Puk Sorgulama">Puk Sorgulama</a></li><li><a href="/yardim/online-alisveris/turkcell-pasaj/islem-rehberi?place=footer" title="İşlem Rehberi">İşlem Rehberi</a></li><li><a href="/tr/hakkimizda?place=footer" title="Yardım Videoları">Yardım Videoları</a></li><li><a href="/yardim/hattiniz/faturali/fatura-tutarimi-nasil-ogrenebilirim?place=footer" title="Sıkça Sorulan Sorular - Faturalı Hat ">Sıkça Sorulan Sorular - Faturalı Hat </a></li><li><a href="/yardim/hattiniz/hazirkart/nasil-tl-yukleyebilirim?place=footer" title="Sıkça Sorulan Sorular - Hazır Kart">Sıkça Sorulan Sorular - Hazır Kart</a></li><li><a href="/pasaj/satici-ol?place=footer" title="Pasajda Satıcı Ol">Pasajda Satıcı Ol</a></li><li><a href="/yardim/yurtdisi?place=footer" title="Yurt Dışı">Yurt Dışı</a></li><li class="hidden-nav-item"><a href="https://www.turkcell.com.tr/tr/form/arabuluculuk-basvuru-formu?place=footer" title="Arabuluculuk Başvuru Formu">Arabuluculuk Başvuru Formu</a></li></ul><a class="js-nav-more__button" href="javascript:;" data-toggle="Daha Az Göster"><span>Tümünü Gör</span><i class="a-icon icon-arrow-left"></i></a></div><div class="m-p-grid-col"><h3><a href="/?place=footer" title="Özel Günler">Özel Günler</a></h3><ul><li><a href="https://www.turkcell.com.tr/kampanyalar/pasaj/cihazlar/sevgililer-gunu-hediyeleri?place=footer" title="Sevgililer Günü Hediyeleri">Sevgililer Günü Hediyeleri</a></li><li><a href="/kampanya/yilbasi-hediyeleri-firsatlari/?place=footer" title="Yılbaşı Hediyeleri Kampanyası">Yılbaşı Hediyeleri Kampanyası</a></li><li><a href="/kampanya/pasaj-gunleri/?place=footer" title="Pasaj Günleri">Pasaj Günleri</a></li><li><a href="/sari-gunler?place=footer" title="Sarı Günler">Sarı Günler</a></li><li><a href="/uykusu-kacanlar-kulubu?place=footer" title="Uykusu Kaçanlar Kulübü">Uykusu Kaçanlar Kulübü</a></li><li><a href="https://www.turkcell.com.tr/kampanyalar/pasaj/cihazlar/ramazan-bayrami-kampanyasi?place=footer" title="Ramazan Kampanyası">Ramazan Kampanyası</a></li><li><a href="/kampanya/anneler-gunu-hediyesi/?place=footer" title="Anneler Günü">Anneler Günü</a></li><li><a href="https://www.turkcell.com.tr/kampanya/babalar-gunu-hediyesi/?place=footer" title="Babalar Günü">Babalar Günü</a></li><li><a href="/kampanya/okula-ve-sehre-donus-kampanyalari/?place=footer" title="Okula Dönüş Kampanyası">Okula Dönüş Kampanyası</a></li><li><a href="/kampanya/firsatlar-pasaji/?place=footer" title="Fırsatlar Pasajı">Fırsatlar Pasajı</a></li><li class="hidden-nav-item"><a href="https://www.turkcell.com.tr/kampanya/okula-ve-sehre-donus-kampanyalari/sehre-donus/?place=footer" title="Şehre Dönüş Kampanyası">Şehre Dönüş Kampanyası</a></li><li class="hidden-nav-item"><a href="https://www.turkcell.com.tr/karne-hediyesi?place=footer" title="Karne Hediyeleri">Karne Hediyeleri</a></li><li class="hidden-nav-item"><a href="https://www.turkcell.com.tr/kampanya/dugun-ve-ceyiz-paketleri/?place=footer" title="Düğün ve Çeyiz Paketleri">Düğün ve Çeyiz Paketleri</a></li></ul><a class="js-nav-more__button" href="javascript:;" data-toggle="Daha Az Göster"><span>Tümünü Gör</span><i class="a-icon icon-arrow-left"></i></a></div><div class="m-p-grid-col"><h3><a href="/tr/tuketici-sikayetleri?place=footer" title="Tüketici Şikayetleri">Tüketici Şikayetleri</a></h3><ul><li><a href="/tr/tuketici-sikayetleri?place=footer" title="Şikayet Talebi Oluşturma">Şikayet Talebi Oluşturma</a></li><li><a href="/tr/tuketici-sikayetleri?place=footer" title="Şikayet Takibi">Şikayet Takibi</a></li><li><a href="/yardim/yardim-araclari/alacak-sorgulama?place=footer" title="Alacak Sorgulama, TL İade Talep&ZeroWidthSpace;">Alacak Sorgulama, TL İade Talep&ZeroWidthSpace;</a></li><li><a href="/tr/hakkimizda/duyurular/musteri-iadeleri-ile-ilgili-duyurular-bilgilendirmeler-ve-islemler?place=footer" title="BTK İade Duyurusu">BTK İade Duyurusu</a></li></ul></div></div></nav>
          <hr class="o-p-footer__line">
        </div></div><div class="o-p-footer-middle"><div class="container-p"><div class="m-p-grid"><div class="m-p-grid-col"><ul class="o-p-footer__language"><li class="o-p-footer-language__active"><a href="javascript:;" title="Türkçe">Türkçe</a></li><li><a href="https://www.turkcell.com.tr/english-support" title="English">English</a></li><li><a href="https://www.turkcell.com.tr/arabic-support" title="عربى">عربى</a></li><li><a href="https://www.turkcell.com.tr/russian-support" title="русский">русский</a></li></ul></div><div class="m-p-grid-col m-p-grid-offset-5"><div class="o-p-footer__social"><strong>Bizi Takip Edin</strong><div class="m-btn-group m-btn-group--align-right"><a class="a-btn-icon-p" href="https://www.twitter.com/Turkcell" title="Twitter" target="blank"><i class="icon-p-x-logo"></i></a><a class="a-btn-icon-p" href="https://www.facebook.com/Turkcell" title="Facebook" target="blank"><i class="icon-p-facebook"></i></a><a class="a-btn-icon-p" href="https://www.instagram.com/turkcell/" title="Instagram" target="blank"><i class="icon-p-instagram"></i></a><a class="a-btn-icon-p" href="https://www.youtube.com/Turkcell" title="Youtube" target="blank"><i class="icon-p-youtube"></i></a><a class="a-btn-icon-p" href="https://www.linkedin.com/company/turkcell/?originalSubdomain=tr" title="Linkedin" target="blank"><i class="icon-p-linkedin"></i></a></div></div></div></div></div></div><div class="o-p-footer-bottom"><div class="container-p"><div class="o-p-footer__partners"><div id="" class="m-p-slider"><div class="swiper-container swiper-container-initialized swiper-container-horizontal"><div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);height:auto;"><div class="swiper-slide swiper-slide-active" style="margin-right: 32px;"><a href="https://fizy.com" title="Fizy" target="blank"><figure><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Kategori/menu/fizy-logo.png?17735349480672"></figure></a></div><div class="swiper-slide swiper-slide-next" style="margin-right: 32px;"><a href="https://www.superonline.net/" title="Turkcell Superonline" target="blank"><figure><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Kategori/menu/sol-yeni-logo.png?17735349480672"></figure></a></div><div class="swiper-slide" style="margin-right: 32px;"><a href="https://www.turkcell.com.tr/platinum" title="Platinum" target="blank"><figure><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Kategori/menu/platinum-logo.png?17735349480672"></figure></a></div><div class="swiper-slide" style="margin-right: 32px;"><a href="https://bip.com/tr/" title="BiP" target="blank"><figure><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Kategori/menu/bip-logo.png?17735349480672"></figure></a></div><div class="swiper-slide" style="margin-right: 32px;"><a href="http://www.turkiyeninuygulamalari.com/tr" title="Türkiye'nin Uygulamaları" target="blank"><figure><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Kategori/menu/TurkiyeninUygulamalari-Logo.png?17735349480672"></figure></a></div><div class="swiper-slide" style="margin-right: 32px;"><a href="https://www.turkcell.com.tr/servisler/tvplus" title="TV+" target="blank"><figure><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Kategori/menu/tv-plus-logo-yeni.png?17735349480672"></figure></a></div><div class="swiper-slide" style="margin-right: 32px;"><a href="https://mylifebox.com/tr/index.html" title="Lifebox" target="blank"><figure><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Kategori/menu/LifeBox-Logo.png?17735349480672"></figure></a></div><div class="swiper-slide" style="margin-right: 32px;"><a href="https://paycell.com.tr/" title="Paycell" target="blank"><figure><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Kategori/menu/paycell_logo2.png?17735349480672"></figure></a></div><div class="swiper-slide" style="margin-right: 32px;"><a href="https://www.turkcell.com.tr/gnc" title="Gnctrkcll" target="blank"><figure><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Kategori/menu/gnc-logo.png?17735349480672"></figure></a></div><div class="swiper-slide" style="margin-right: 32px;"><a href="https://globalbilgi.com.tr/" title="Turkcell Global Bilgi" target="blank"><figure><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Kategori/menu/Global-Bilgi-Logo.png?17735349480672"></figure></a></div><div class="swiper-slide" style="margin-right: 32px;"><a href="https://wiyo.com.tr/?utm_source=turkcell-web&amp;utm_medium=footer-slider" title="Wiyo" target="blank"><figure><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Kategori/menu/wiyo-v2.png?17735349480672"></figure></a></div><div class="swiper-slide" style="margin-right: 32px;"><a href="https://www.turkcell.com.tr/5g5t" title="5G5T" target="blank"><figure><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Kategori/menu/5G5T-Logo.png?17735349480672"></figure></a></div><div class="swiper-slide" style="margin-right: 32px;"><a href="https://partner.turkcell.com.tr" title="Turkcell Partner Program" target="blank"><figure><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Kategori/menu/Turkcell-Partner-Network-Logo.png?17735349480672"></figure></a></div><div class="swiper-slide" style="margin-right: 32px;"><a href="https://gelecegiyazanlar.turkcell.com.tr/" title="Turkcell Geleceği Yazanlar" target="blank"><figure><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Kategori/menu/Gelecegi-YazanKadinlar-Logo.png?17735349480672"></figure></a></div><div class="swiper-slide" style="margin-right: 32px;"><a href="https://turkcellbulut.com/" title="Turkcell Akıllı Bulut" target="blank"><figure><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Kategori/menu/Turkcell-Bulut.png?17735349480672"></figure></a></div></div><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div><div class="m-p-slider__nav"><span class="m-p-slider__nav__prev swiper-button-disabled" tabindex="0" role="button" aria-label="Previous slide" aria-disabled="true"></span><span class="m-p-slider__nav__next" tabindex="0" role="button" aria-label="Next slide" aria-disabled="false"></span></div></div></div></div>
        <hr class="o-p-footer__line"><div class="container-p"><div class="o-p-footer__copy"><div class="m-p-grid"><div class="m-p-grid-col"><ul><li><a href="/tr/gizlilik-ve-guvenlik" title="Gizlilik ve Güvenlik">Gizlilik ve Güvenlik</a></li><li><a href="/tarifekarsilastirmasitesi" title="Tarife karşılaştırma">Tarife Karşılaştırma</a></li></ul></div><div class="m-p-grid-col-2"><span class="o-p-footer__copyright"><div id="ETBIS"><div id="1764651406148822"><a href="https://etbis.eticaret.gov.tr/sitedogrulama/1764651406148822" target="_blank" rel="nofollow"><img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/etbis-qr-code.png?17735349480672" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/etbis-qr-code.png?17735349480672" alt="" class=" lazyloaded"></a></div></div> © 2024 Turkcell </span></div></div></div></div>
      </div>
      <!-- Build Date : 07-02-2024 19:09:58, DC-b08-08-1-2, PROD SH-ECOM -->
    </footer><input type="hidden" id="checkLoginUrl" value="/pasaj/site/checkLogin"><input type="hidden" id="favInfoUrl" value="/pasaj/favorite-info"><script type="text/javascript">
      var isProdMode = true;
    </script><div class="info-modal-content" id="login-error-lightbox" style="display: none;"><div class="inline-inner"><figure><img src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/passage-assets/common/images/icons/error.svg"></figure><p>Hatalı Giriş</p><p class="js-login-error-modal-text">passage.modal.login.error.text</p><a class="a-p-btn gtrigger-close inline-close-btn">Kapat</a></div></div><div class="info-modal-content" id="login-logout-lightbox" style="display: none;"><div class="inline-inner"><figure class="info-modal-content__picto"><img src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/passage-assets/common/images/icons/exit.svg"></figure><p class="color_clay">Çıkış yapmak istediğinize emin misiniz?</p><p>&nbsp;</p><div class="info-modal-content__buttons"><a class="a-p-btn a-p-btn--clear gtrigger-close" href="javascript:;">Vazgeç</a><a class="a-p-btn js-p-login-logout" href="javascript:;">Çıkıs Yap</a></div></div></div><div class="info-modal-content" id="login-timeout-lightbox" style="display: none;"><div class="inline-inner"><p class="color_clay">passage.modal.login.timeout.info.title</p><p>passage.modal.login.timeout.info.desc</p><pasajprogress class="a-p-progress--danger"><div class="info-modal-content__buttons"><a class="a-p-btn a-p-btn--clear js-p-login-logout gtrigger-close" href="javascript:;">passage.modal.login.timeout.logout</a><a class="a-p-btn gtrigger-close js-p-login-continue" href="javascript:;">passage.modal.login.timeout.continue</a></div></pasajprogress></div></div><script defer="" src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/passage-assets/common/scripts/vendors.js?17735349480672"></script><script defer="" src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/passage-assets/desktop/scripts/app.desktop.min.js?17735349480672"></script><script defer="" src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/createjs.min.js?17735349480672"></script><script defer="" src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/swiper.min.js?17735349480672"></script><script defer="" src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/jquery.fancybox.min.js?17735349480672"></script><script defer="" src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/select2.full.min.js?17735349480672"></script><script defer="" src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/select2-tr.js?17735349480672"></script><script defer="" src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/jquery.typeahead.min.js?17735349480672"></script><script defer="" src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/parsley.min.js?17735349480672"></script><script defer="" src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/tr.js?17735349480672"></script><script defer="" src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/jquery.waypoints.min.js?17735349480672"></script><script defer="" src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/infinite.js?17735349480672"></script><script defer="" src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/headroom.js?17735349480672"></script><script defer="" src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/lazysizes.min.js?17735349480672"></script><script defer="" src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/ls.unveilhooks.min.js?17735349480672"></script><script defer="" src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/jquery.countdown.min.js?17735349480672"></script><script defer="" src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/tooltipster.bundle.min.js?17735349480672"></script><script defer="" src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/handlebars.js?17735349480672"></script><script defer="" src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/jquery.inputmask.bundle.js?17735349480672"></script><script defer="" src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/lottie_html.min.js?17735349480672"></script><script defer="" src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/flatpickr.js?17735349480672"></script><script defer="" src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/flatpickr-tr.js?17735349480672"></script><script defer="" src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/rivets.bundled.min.js?17735349480672"></script><script defer="" src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/jquery.elevatezoom.js?17735349480672"></script><script defer="" src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/core-js.min.js?17735349480672"></script><script defer="" src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/desktop/scripts/app.desktop.min.js?17735349480672"></script>
    <!-- PAGE JS FILES --><script defer="" src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/shop.utils.js?17735349480672"></script><script defer="" src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/desktop/scripts/shop/device.detail.js?17735349480672"></script>
    <!-- PAGE JS FILES --><script defer="" src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/jquery.cookies.min.js?17735349480672"></script><script defer="" src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/modernizr.min.js?17735349480672"></script><script defer="" src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/desktop/scripts/shop/google-analytics-web.js?17735349480672"></script>
    <!-- definitions.common.web.body.end -->
    <!--   -->
    <!-- End definitions.common.web.body.end --><efilli-layout-dynamic></efilli-layout-dynamic><deepl-input-controller></deepl-input-controller><script type="text/javascript" id="">
      (function() {
        $('[data-src\x3d"#modal-stock"]').click(function() {
          var a = "";
          0 !== document.querySelectorAll(".product-detail__property .select2-icons__value").length && (a = $(".product-detail__property .select2-icons__value").text().trim());
          var b = $("h1").text().trim();
          window.dataLayer = window.dataLayer || [];
          window.dataLayer.push({
            event: "GAEvent",
            eventCategory: "Functions",
            eventAction: "Sto\u011fa gelince haber ver",
            eventLabel: b + " - " + a
          })
        })
      })();
    </script><script type="text/javascript" id="">
      function hypeEvent() {
        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push({
          event: "hypeProovIcon"
        })
      }
      for (var hypeProducts = "Samsung Galaxy Note10 Lite;Reeder KIDdo Ak\u0131ll\u0131 \u00c7ocuk Saati;Bilicra Vision Ak\u0131ll\u0131 \u00c7ocuk Saati;Logitech G300S Optik Oyun Mouse;Logitech G102 Prodigy Gaming Mouse;Logitech F310 Oyun Kumandas\u0131;Casio GBA-800 G-Squad Ad\u0131msayar Kol Saati;Apple Watch Series 6 GPS 44mm;Apple Watch Series 6 GPS 40mm;Apple Watch SE GPS 40mm;Oral-B Smart 4000 \u015earj Edilebilir Di\u015f F\u0131r\u00e7as\u0131;Philips HD7462/20 Daily Collection Filtre Kahve Makinesi;Braun MGK3245 7\u2019si 1 Arada Erkek Bak\u0131m Kiti Islak ve Kuru \u015eekillendirici;Remington S5525 Pro Sa\u00e7 D\u00fczle\u015ftirici;Casper Nirvana S500.1021-8E50T-G / Intel Core i5-10210U / 8 GB Ram / 480 GB SSD / Windows 10 Home / 15.6 in\u00e7 HD / Nvidia GeForce MX230 2 GB;Casper S20;Alcatel 1T 10 in\u00e7 2020;JBL TUNE 500BT Kablosuz Kulak \u00dcst\u00fc Kulakl\u0131k;Urbanista London TWS Bluetooth Kulakl\u0131k;Urbanista New York Tam Kablosuz Kulak \u00dcst\u00fc ANC Kulakl\u0131k;JBL Tune 225 TWS Kablosuz Kulak \u0130\u00e7i Kulakl\u0131k;JBL Tune 125 TWS Kablosuz Kulak \u0130\u00e7i Kulakl\u0131k".split(";"), hypeProductTitle = document.querySelector(".product-detail-top h1").innerText, i = 0; i < hypeProducts.length; i++)
        if (hypeProductTitle.includes(hypeProducts[i])) {
          hypeEvent();
          break
        };
      
    </script><script type="text/javascript" id="">
      var dataLayer = dataLayer || [],
        newIds2;
      for (i = 0; i < dataLayer.length; i++) {
        if (1 == dataLayer[i].hasOwnProperty("ecommerce") && 1 == dataLayer[i].ecommerce.hasOwnProperty("detail")) var prdID2 = dataLayer[i].ecommerce.detail.products[0].id,
          sellerCODE2 = dataLayer[i].ecommerce.detail.products[0].dimension171,
          colorCODE2 = dataLayer[i].ecommerce.detail.products[0].dimension178,
          feedID2 = prdID2 + "-" + sellerCODE2 + "-" + colorCODE2;
        newIds2 = feedID2
      }
      dataLayer.push({
        feed_id: newIds2
      });
      
    </script><script type="text/javascript" id="">
      window.hypeSellerList = [{
        name: "Aksa Gsm - Turkcell Ma\u011fazas\u0131",
        point: "9.8"
      }, {
        name: "Akta\u015f Elektronik - Turkcell Ma\u011fazas\u0131",
        point: "9.8"
      }, {
        name: "Aky\u00fcz Telekom - Turkcell Ma\u011fazas\u0131",
        point: "9.9"
      }, {
        name: "Ayd\u0131n Elektronik- Turkcell Ma\u011fazas\u0131",
        point: "9.9"
      }, {
        name: "Azim - Turkcell Ma\u011fazas\u0131",
        point: "9.8"
      }, {
        name: "Ba\u015f\u00f6ren Teknoloji - Turkcell Ma\u011fazas\u0131",
        point: "9.8"
      }, {
        name: "Be\u015fken Elektronik",
        point: "9.9"
      }, {
        name: "Betaplus Teknoloji",
        point: "9.9"
      }, {
        name: "Beyaz E\u015fya Merkezi",
        point: "9.9"
      }, {
        name: "Bistore",
        point: "9.7"
      }, {
        name: "Casper",
        point: "9.8"
      }, {
        name: "Cepekspress",
        point: "9.8"
      }, {
        name: "Ceptelefonu Online",
        point: "9.9"
      }, {
        name: "Ceptveaks",
        point: "9.6"
      }, {
        name: "Cin Cin - Turkcell Ma\u011fazas\u0131",
        point: "9.9"
      }, {
        name: "De-Ka Yap\u0131mc\u0131l\u0131k",
        point: "9.7"
      }, {
        name: "Demka Elektronik",
        point: "9.9"
      }, {
        name: "Demsan - Turkcell Ma\u011fazas\u0131",
        point: "9.6"
      }, {
        name: "Desibela",
        point: "9.8"
      }, {
        name: "DEYTECH",
        point: "9.1"
      }, {
        name: "DRK Elektronik - Turkcell Ma\u011fazas\u0131",
        point: "9.9"
      }, {
        name: "Elit Mobil- Turkcell Ma\u011fazas\u0131",
        point: "7.0"
      }, {
        name: "Erufas Teknoloji \u00dcr\u00fcnleri - Turkcell Ma\u011fazas\u0131",
        point: "9.6"
      }, {
        name: "exploreavm",
        point: "8.2"
      }, {
        name: "FDG \u0130leti\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "9.7"
      }, {
        name: "F\u0131rsat Kurdu",
        point: "9.7"
      }, {
        name: "Gen\u00e7pa Teknoloji",
        point: "9.8"
      }, {
        name: "GpnTeknoloji",
        point: "9.6"
      }, {
        name: "G\u00fczelg\u00fcn - Turkcell Ma\u011fazas\u0131",
        point: "9.1"
      }, {
        name: "INCA",
        point: "9.3"
      }, {
        name: "\u0130ndirimin Merkezi",
        point: "8.6"
      }, {
        name: "JunooCom",
        point: "10.0"
      }, {
        name: "Kayalar Plaza - Turkcell Ma\u011fazas\u0131",
        point: "9.9"
      }, {
        name: "Kodak T\u00fcrkiye",
        point: "8.3"
      }, {
        name: "Koycebine",
        point: "9.3"
      }, {
        name: "Kraft Online",
        point: "9.4"
      }, {
        name: "KYA Teknoloji - Turkcell Ma\u011fazas\u0131",
        point: "9.9"
      }, {
        name: "MAZI \u0130LET\u0130\u015e\u0130M- TURKCELL MA\u011eAZASI",
        point: "9.6"
      }, {
        name: "Messa \u0130leti\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "9.9"
      }, {
        name: "Mi Life",
        point: "10.0"
      }, {
        name: "Mi Store",
        point: "9.6"
      }, {
        name: "Mobiloom",
        point: "9.7"
      }, {
        name: "Mobilpark",
        point: "9.6"
      }, {
        name: "My Valice",
        point: "9.6"
      }, {
        name: "Neco Toys",
        point: "8.3"
      }, {
        name: "NET \u0130LET\u0130\u015e\u0130M - Turkcell Ma\u011fazas\u0131",
        point: "8.3"
      }, {
        name: "Nethouse",
        point: "9.5"
      }, {
        name: "numarabir",
        point: "9.9"
      }, {
        name: "O.B. \u0130leti\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "8.0"
      }, {
        name: "Okay \u0130leti\u015fim-Turkcell Ma\u011fazas\u0131",
        point: "9.9"
      }, {
        name: "\u00d6z\u00e7a\u011fr\u0131 \u0130leti\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "9.4"
      }, {
        name: "\u00d6zgen\u00e7 - Turkcell Ma\u011fazas\u0131",
        point: "7.5"
      }, {
        name: "\u00d6ztelkum",
        point: "9.7"
      }, {
        name: "PivotExpert",
        point: "9.9"
      }, {
        name: "REYONTEK",
        point: "9.8"
      }, {
        name: "Sakin Elektronik - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "Sepetingo",
        point: "9.0"
      }, {
        name: "SMEG T\u00dcRK\u0130YE",
        point: "8.5"
      }, {
        name: "Soyg\u00fcr Elektronik - Turkcell Ma\u011fazas\u0131",
        point: "9.9"
      }, {
        name: "Svs Teknoloji- Turkcell Ma\u011fazas\u0131",
        point: "7.3"
      }, {
        name: "Teknolom",
        point: "9.6"
      }, {
        name: "Teknoraks",
        point: "9.7"
      }, {
        name: "Teknot\u00fcrk Ma\u011fazac\u0131l\u0131k- Turkcell Ma\u011fazas\u0131",
        point: "9.5"
      }, {
        name: "Tekramarket",
        point: "10.0"
      }, {
        name: "Timmy",
        point: "9.8"
      }, {
        name: "Tuna \u0130leti\u015fim-Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "Turnac\u0131o\u011flu Telekom - Turkcell Ma\u011fazas\u0131",
        point: "9.8"
      }, {
        name: "\u00dcnta\u015f \u0130leti\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "9.5"
      }, {
        name: "Velesbitcim",
        point: "7.9"
      }, {
        name: "Wearbuds",
        point: "7.7"
      }, {
        name: "Webdensiparis",
        point: "9.8"
      }, {
        name: "Ya\u015farlar \u0130leti\u015fim  - Turkcell Ma\u011fazas\u0131",
        point: "9.8"
      }, {
        name: "Zara Bili\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "10"
      }, {
        name: "U\u011fuz \u0130leti\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "9.3"
      }, {
        name: "Pionny",
        point: "9.7"
      }, {
        name: "Merit - Turkcell Ma\u011fazas\u0131",
        point: "9.4"
      }, {
        name: "Benimde Olsa",
        point: "7.8"
      }, {
        name: "Telko Telekom - Turkcell Ma\u011fazas\u0131",
        point: "9.4"
      }, {
        name: "As ileti\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "9.9"
      }, {
        name: "PROF\u0130LO INCA",
        point: "8.4"
      }, {
        name: "Eren GSM - Turkcell Ma\u011fazas\u0131",
        point: "9.8"
      }, {
        name: "M2M Bili\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "8.7"
      }, {
        name: "Premiumsepet",
        point: "9.7"
      }, {
        name: "DNP Elektronik",
        point: "9.0"
      }, {
        name: "Bee",
        point: "10.0"
      }, {
        name: "Elektromarket - Turkcell Ma\u011fazas\u0131",
        point: "9.9"
      }, {
        name: "Arabul Elektronik-Turkcell Ma\u011fazas\u0131",
        point: "9.9"
      }, {
        name: "MaxiTekno",
        point: "10.0"
      }, {
        name: "Markaday\u0131m",
        point: "9.0"
      }, {
        name: "Okur \u0130leti\u015fim- Turkcell Ma\u011fazas\u0131",
        point: "9.6"
      }, {
        name: "LUNAT\u0130C CHE",
        point: "9.5"
      }, {
        name: "Y\u0131ld\u0131r\u0131m Telefon - Turkcell Ma\u011fazas\u0131",
        point: "8.5"
      }, {
        name: "Ayaz \u0130leti\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "9.8"
      }, {
        name: "G\u00fcrb\u00fcz Ev Aletleri",
        point: "8.7"
      }, {
        name: "Kai Teknoloji",
        point: "9.9"
      }, {
        name: "Marmara \u0130leti\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "9.8"
      }, {
        name: "Kafkasda",
        point: "9.7"
      }, {
        name: "Ankacell \u0130leti\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "9.7"
      }, {
        name: "Teknopoint - Turkcell Ma\u011fazas\u0131",
        point: "10"
      }, {
        name: "Uluer \u0130leti\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "9.9"
      }, {
        name: "Anday - Turkcell Ma\u011fazas\u0131",
        point: "8.8"
      }, {
        name: "Uzunerler - Turkcell Ma\u011fazas\u0131",
        point: "9.8"
      }, {
        name: "Batuer Telekom - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "KimSatar",
        point: "9.8"
      }, {
        name: "Ahmet Il\u0131kkan Cep Center - Turkcell Ma\u011fazas\u0131",
        point: "9.8"
      }, {
        name: "Setelem - Turkcell Ma\u011fazas\u0131",
        point: "9.4"
      }, {
        name: "SAYGAN TASARIM",
        point: "10.0"
      }, {
        name: "BittiBitiyor",
        point: "9.7"
      }, {
        name: "Erkin Telekom Bili\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "UP! Watch",
        point: "9.4"
      }, {
        name: "F\u0131rsat Uygun - Turkcell Ma\u011fazas\u0131",
        point: "9.8"
      }, {
        name: "GTI Kurumsal Bili\u015fim Teknolojileri",
        point: "9.8"
      }, {
        name: "Tulukcell Teknoloji - Turkcell Ma\u011fazas\u0131",
        point: "9.8"
      }, {
        name: "Teknostore",
        point: "9.9"
      }, {
        name: "Beros",
        point: "10.0"
      }, {
        name: "cyn bilisim",
        point: "9.3"
      }, {
        name: "GaleriBeyaz",
        point: "9.1"
      }, {
        name: "Fidigital Teknoloji - Turkcell Ma\u011fazas\u0131",
        point: "9.7"
      }, {
        name: "Lara \u0130leti\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "9.5"
      }, {
        name: "Hopiyodi",
        point: "7.9"
      }, {
        name: "Depogunleri",
        point: "9.3"
      }, {
        name: "DSM Teknoloji",
        point: "8.3"
      }, {
        name: "smartX - Turkcell Ma\u011fazas\u0131",
        point: "9.9"
      }, {
        name: "mobilePlus",
        point: "9.9"
      }, {
        name: "O\u011fuzhan Elektronik - Turkcell Ma\u011fazas\u0131",
        point: "9.8"
      }, {
        name: "Polat GSM Elektronik - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "Mobilfon",
        point: "9.9"
      }, {
        name: "YED\u013024 - Turkcell Ma\u011fazas\u0131",
        point: "10"
      }, {
        name: "MY TECH - Turkcell Ma\u011fazas\u0131",
        point: "8.4"
      }, {
        name: "SimteKare",
        point: "10.0"
      }, {
        name: "Burtel \u0130leti\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "9.8"
      }, {
        name: "\u0130mf Elektronik",
        point: "8.7"
      }, {
        name: "marketkolik",
        point: "9.0"
      }, {
        name: "SERHATCAN TEKNOLOJ\u0130 - Turkcell Ma\u011fazas\u0131",
        point: "10"
      }, {
        name: "\u00d6Z-KA GSM VE TEKNOLOJ\u0130 MAGAZALARI",
        point: "10.0"
      }, {
        name: "Ko\u00e7ak Teknoloji",
        point: "9.8"
      }, {
        name: "Sel\u00e7uk \u0130leti\u015fim-Turkcell Ma\u011fazas\u0131",
        point: "8.1"
      }, {
        name: "EENT SOUND\x26LIGHT",
        point: "9.8"
      }, {
        name: "Keyifli \u0130\u015fler",
        point: "9.0"
      }, {
        name: "Bayraktar Bili\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "9.6"
      }, {
        name: "Erpa Mobil - Turkcell Ma\u011fazas\u0131",
        point: "9.8"
      }, {
        name: "C H N Elektronik - Turkcell Ma\u011fazas\u0131",
        point: "9.6"
      }, {
        name: "Sena \u0130leti\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "9.7"
      }, {
        name: "F\u0131rsatD\u00fcnyas\u0131",
        point: "9.7"
      }, {
        name: "Soyarc Teknoloji - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "Derka Shop",
        point: "9.9"
      }, {
        name: "Samsun Telemarket - Turkcell Ma\u011fazas\u0131",
        point: "9.8"
      }, {
        name: "\u0130HLAS PAZARLAMA",
        point: "10.0"
      }, {
        name: "\u00d6ZT\u00dcRKLER TELEKOM - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "CEPUX - Turkcell Ma\u011fazas\u0131",
        point: "9.6"
      }, {
        name: "Teknolojinci",
        point: "8.9"
      }, {
        name: "TUNATEL LTD. \u015eT\u0130. - Turkcell Ma\u011fazas\u0131",
        point: "9.7"
      }, {
        name: "Loya Makina",
        point: "9.7"
      }, {
        name: "Bu-Bu Online Telekominikasyon Hizmetleri - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "My \u0130leti\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "9.9"
      }, {
        name: "ERSA ELEKTRON\u0130K - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "KAMPANYA ELEKTRON\u0130K - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "KUZEY PAZARLAMA",
        point: "7.8"
      }, {
        name: "Ba Ba Telekom - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "Kirvem 3 \u0130leti\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "9.9"
      }, {
        name: "D\x26A Teknoloji - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "KIZILAY \u0130LET\u0130\u015e\u0130M - Turkcell Ma\u011fazas\u0131",
        point: "9.7"
      }, {
        name: "Netavantaj",
        point: "9.7"
      }, {
        name: "N\u0130L\u00dcFER TEKNOLOJ\u0130 - Turkcell Ma\u011fazas\u0131",
        point: "8.8"
      }, {
        name: "TEKNOLOJ\u0130 - TURKCELL MA\u011eAZASI",
        point: "10.0"
      }, {
        name: "YARDIMCI TEKNOLOJ\u0130 - Turkcell Ma\u011fazas\u0131",
        point: "9.9"
      }, {
        name: "Interspor",
        point: "10.0"
      }, {
        name: "UFUK \u0130LET\u0130\u015e\u0130M - Turkcell Ma\u011fazas\u0131",
        point: "9.7"
      }, {
        name: "EVEREST TEKNOLOJ\u0130 - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "\u00d6ZDEM\u0130R \u0130LET\u0130\u015e\u0130M H\u0130ZMETLER\u0130 - Turkcell Ma\u011fazas\u0131",
        point: "9.6"
      }, {
        name: "\u00d6zdemsan Elektronik- Turkcell Ma\u011fazas\u0131",
        point: "9.1"
      }, {
        name: "Zorlu \u0130leti\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "9.6"
      }, {
        name: "BEBE\u011e\u0130M OLACAK",
        point: "8.5"
      }, {
        name: "Soner \u0130leti\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "9.9"
      }, {
        name: "Wrapsol",
        point: "10.0"
      }, {
        name: "HES PAZARLAMA",
        point: "9.9"
      }, {
        name: "Denkel Kurumsal T\u0130M - Turkcell Ma\u011fazas\u0131",
        point: "8.1"
      }, {
        name: "Cemre \u0130leti\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "10"
      }, {
        name: "Murat Teknoloji - Turkcell Ma\u011fazas\u0131",
        point: "9.7"
      }, {
        name: "\u00dcmit \u0130leti\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "8.5"
      }, {
        name: "GKG Teknoloji -Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "Akarsu \u0130leti\u015fim Teknoloji \u00dcr\u00fcnleri - Turkcell Ma\u011fazas\u0131",
        point: "9.7"
      }, {
        name: "Emre \u0130leti\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "9.2"
      }, {
        name: "OyuncakHobi",
        point: "8.4"
      }, {
        name: "Mustafa \u00d6zdamar Mobil Telefon Sistemleri - Turkcell Ma\u011fazas\u0131",
        point: "9.2"
      }, {
        name: "ABK Teknoloji",
        point: "9.8"
      }, {
        name: "Alternatif Teknoloji - Turkcell Ma\u011fazas\u0131",
        point: "9.8"
      }, {
        name: "Acar \u0130leti\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "Merkez \u0130leti\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "9.6"
      }, {
        name: "Arta Mobil \u0130leti\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "BRN TELEKOM \u0130LET\u0130\u015e\u0130M - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "Bayram G\u00fcm\u00fc\u015f Telekom - Turkcell Ma\u011fazas\u0131",
        point: "8.8"
      }, {
        name: "Nusrat Bili\u015fim",
        point: "9.4"
      }, {
        name: "Norma Teknoloji - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "EFE TEKNOLOJ\u0130 - Turkcell Ma\u011fazas\u0131",
        point: "8.4"
      }, {
        name: "G\u00f6k\u015feno\u011flu \u0130leti\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "\u00c7enler \u0130leti\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "9.8"
      }, {
        name: "BUD\u0130ZZZ",
        point: "7.8"
      }, {
        name: "SmartOnline - Turkcell Ma\u011fazas\u0131",
        point: "10"
      }, {
        name: "PENTAA \u0130LET\u0130\u015e\u0130M - Turkcell Ma\u011fazas\u0131",
        point: "9.3"
      }, {
        name: "Pars Teknoloji - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "Kahve Sepeti",
        point: "8.0"
      }, {
        name: "EasyCep",
        point: "8.4"
      }, {
        name: "Zoccoshop",
        point: "8.7"
      }, {
        name: "BLC Teknoloji",
        point: "10.0"
      }, {
        name: "tamsana",
        point: "9.2"
      }, {
        name: "SYK TEKNOLOJ\u0130 - Turkcell Ma\u011fazas\u0131",
        point: "9.8"
      }, {
        name: "G\u00dcRAL ELEKTRON\u0130K - Turkcell Ma\u011fazas\u0131",
        point: "9.7"
      }, {
        name: "BEREN \u0130LET\u0130\u015e\u0130M H\u0130ZMETLER\u0130 - Turkcell Ma\u011fazas\u0131",
        point: "7.9"
      }, {
        name: "Terminal \u0130leti\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "10"
      }, {
        name: "Erka",
        point: "9.8"
      }, {
        name: "KARDE\u015eLER TEKNOLOJ\u0130 \u0130LET\u0130\u015e\u0130M - Turkcell Ma\u011fazas\u0131",
        point: "9.4"
      }, {
        name: "Armes \u0130leti\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "9.9"
      }, {
        name: "Biggshop",
        point: "9.8"
      }, {
        name: "BEREN TEKNOLOJ\u0130 - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "\u0130DEAL MOB\u0130L",
        point: "9.9"
      }, {
        name: "TEKNOF\u0130YAT",
        point: "8.5"
      }, {
        name: "AK SA \u0130LET\u0130\u015e\u0130M - Turkcell Ma\u011fazas\u0131",
        point: "9.9"
      }, {
        name: "ASLANLAR ELEKTRON\u0130K - Turkcell Ma\u011fazas\u0131",
        point: "9.8"
      }, {
        name: "SPEED GLOBAL LOJ\u0130ST\u0130K H\u0130ZMETLER\u0130 A.\u015e.",
        point: "9.9"
      }, {
        name: "Kervan Mobil \u0130leti\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "Dragonfly",
        point: "10"
      }, {
        name: "DOST T\u0130CARET - Turkcell Ma\u011fazas\u0131",
        point: "7.8"
      }, {
        name: "GEN\u00c7 T\u0130CARET - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "SHAZA",
        point: "9.4"
      }, {
        name: "2 A REKLAMCILIK LTD.\u015eT\u0130 - Turkcell Ma\u011fazas\u0131",
        point: "9.2"
      }, {
        name: "Bureyonsenin",
        point: "9.5"
      }, {
        name: "KARADA\u015e T\u0130CARET - Turkcell Ma\u011fazas\u0131",
        point: "8.0"
      }, {
        name: "ACCPAZAR  - Turkcell Ma\u011fazas\u0131",
        point: "7.2"
      }, {
        name: "Tokdemir Bili\u015fim",
        point: "8.4"
      }, {
        name: "Artoncase",
        point: "9.8"
      }, {
        name: "NRG \u0130leti\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "9.8"
      }, {
        name: "10Noo Digital",
        point: "9.7"
      }, {
        name: "TEKNOKAMPANYA - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "H\u0130PER B\u0130L\u0130\u015e\u0130M - Turkcell Ma\u011fazas\u0131",
        point: "9.7"
      }, {
        name: "\u00d6zta\u015f - Turkcell Ma\u011fazas\u0131",
        point: "9.9"
      }, {
        name: "Benim de olsun - Turkcell Ma\u011fazas\u0131",
        point: "7.7"
      }, {
        name: "AKTEL GSM - Turkcell Ma\u011fazas\u0131",
        point: "9.8"
      }, {
        name: "Pro\u00e7a\u011f Bili\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "9.5"
      }, {
        name: "Bilgin Grup - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "Egeden",
        point: "9.6"
      }, {
        name: "Hcm \u0130leti\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "Sar\u0131kayalar - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "BursaNet Bili\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "9.9"
      }, {
        name: "Y\u00fcksek Teknoloji",
        point: "9.9"
      }, {
        name: "CepHane Teknoloji",
        point: "10.0"
      }, {
        name: "Dijikid",
        point: "9.9"
      }, {
        name: "Erpati",
        point: "10.0"
      }, {
        name: "Winex",
        point: "9.7"
      }, {
        name: "Teknorya.",
        point: "10"
      }, {
        name: "Baston Bebe",
        point: "9.6"
      }, {
        name: "WalkingPad T\u00fcrkiye",
        point: "9.6"
      }, {
        name: "Kolaysepet",
        point: "9.5"
      }, {
        name: "Kar Spor",
        point: "9.0"
      }, {
        name: "\u0130\u00e7ke \u0130leti\u015fim Premium -Turkcell Ma\u011fazas\u0131",
        point: "9.8"
      }, {
        name: "Robx T\u00fcrkiye",
        point: "9.6"
      }, {
        name: "Multimedya D\u00fckkan\u0131",
        point: "10.0"
      }, {
        name: "Sencer Teknoloji - Turkcell Ma\u011fazas\u0131",
        point: "8.5"
      }, {
        name: "Hali\u00e7 \u0130leti\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "9.8"
      }, {
        name: "\u0130dealsanal",
        point: "8.6"
      }, {
        name: "G\u00fczel Teknoloji - Turkcell Ma\u011fazas\u0131",
        point: "9.7"
      }, {
        name: "Kaan \u0130leti\u015fim-Turkcell Ma\u011fazas\u0131",
        point: "9.8"
      }, {
        name: "Cantel - Turkcell Ma\u011fazas\u0131",
        point: "9.8"
      }, {
        name: "\u00d6zg\u00fcr \u0130leti\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "9.7"
      }, {
        name: "S\u0130MAY GSM - Turkcell Ma\u011fazas\u0131",
        point: "9.9"
      }, {
        name: "VATAN \u0130LET\u0130\u015e\u0130M - Turkcell Ma\u011fazas\u0131",
        point: "7.9"
      }, {
        name: "Huzur Teknoloji - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "Y\u0131ld\u0131zlar Elektronik - Turkcell Ma\u011fazas\u0131",
        point: "9.6"
      }, {
        name: "\u0130LETKOM-Turkcell Ma\u011fazas\u0131",
        point: "9.8"
      }, {
        name: "bialettikahve.com",
        point: "9.1"
      }, {
        name: "Veracell - Turkcell Ma\u011fazas\u0131",
        point: "9.5"
      }, {
        name: "CepteTek",
        point: "10.0"
      }, {
        name: "Hascell - Turkcell Ma\u011fazas\u0131",
        point: "8.5"
      }, {
        name: "Kraft DTM",
        point: "9.8"
      }, {
        name: "Ayd\u0131n-El Elektronik - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "MarketPlace",
        point: "9.6"
      }, {
        name: "Tropik \u0130leti\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "9.6"
      }, {
        name: "\u0130NAN MOB\u0130LE TEKNOLOJ\u0130 - Turkcell Ma\u011fazas\u0131",
        point: "9.5"
      }, {
        name: "sepetegelsin",
        point: "8.1"
      }, {
        name: "Yaren \u0130leti\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "9.8"
      }, {
        name: "STARTGAME",
        point: "9.8"
      }, {
        name: "Karaman Bili\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "9.8"
      }, {
        name: "Parla Home",
        point: "10.0"
      }, {
        name: "Emperor Teknoloji",
        point: "9.6"
      }, {
        name: "Adakale Bili\u015fim",
        point: "8.7"
      }, {
        name: "Ancheyn",
        point: "9.9"
      }, {
        name: "Tuncerler - Turkcell Ma\u011fazas\u0131",
        point: "7.0"
      }, {
        name: "3E \u0130leti\u015fim",
        point: "10.0"
      }, {
        name: "NEONB\u0130L",
        point: "9.9"
      }, {
        name: "Do\u011fansan Bili\u015fim",
        point: "9.8"
      }, {
        name: "Ceptech",
        point: "10.0"
      }, {
        name: "Ulu Bey \u0130leti\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "9.8"
      }, {
        name: "Koyuncuo\u011flu Yap\u0131 Market",
        point: "9.6"
      }, {
        name: "KIRMIZI ELMA",
        point: "9.2"
      }, {
        name: "JAZZ M\u00dcZ\u0130K MARKET",
        point: "8.7"
      }, {
        name: "saypera",
        point: "8.3"
      }, {
        name: "xDrive Oyuncu Koltuklar\u0131",
        point: "8.3"
      }, {
        name: "Hairens",
        point: "8.9"
      }, {
        name: "LAVA",
        point: "9.6"
      }, {
        name: "Nezih Teknoloji",
        point: "9.6"
      }, {
        name: "\u00d6ZATA TEKNOLOJ\u0130",
        point: "9.5"
      }, {
        name: "GURME MARKET",
        point: "10.0"
      }, {
        name: "Zeugma Kad\u0131n Kooperatifi",
        point: "8.8"
      }, {
        name: "NE\u015eEL\u0130 MUTFAK",
        point: "10.0"
      }, {
        name: "Do\u011fal Ya\u015fam",
        point: "9.2"
      }, {
        name: "\u0130nova Teknoloji",
        point: "10.0"
      }, {
        name: "Tekemen - Turkcell Ma\u011fazas\u0131",
        point: "9.9"
      }, {
        name: "Mara\u015f Gurme",
        point: "9.0"
      }, {
        name: "G\u00dcLE\u00c7K\u00d6Y DO\u011eAL \u00dcR\u00dcNLER",
        point: "8.9"
      }, {
        name: "Nice Teknoloji",
        point: "9.8"
      }, {
        name: "Tesbih Kenti",
        point: "9.0"
      }, {
        name: "Hzl Store",
        point: "8.0"
      }, {
        name: "ST Teknoloji - Turkcell Ma\u011fazas\u0131",
        point: "9.9"
      }, {
        name: "\u00c7i\u011fdem \u00d6zdemir - Turkcell Ma\u011fazas\u0131",
        point: "9.8"
      }, {
        name: "Kuzey \u0130leti\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "Prodesk",
        point: "10.0"
      }, {
        name: "Class GSM- Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "Karde\u015f \u0130leti\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "9.5"
      }, {
        name: "\u00d6MERO\u011eULLARI TEKNOLOJ\u0130 - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "KTS TEKNOLOJ\u0130 VE T\u0130CARET - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "Ceptimum",
        point: "9.9"
      }, {
        name: "Sihirlishop",
        point: "9.9"
      }, {
        name: "Teknoavantaj",
        point: "8.7"
      }, {
        name: "AYKO\u00c7TECH",
        point: "8.8"
      }, {
        name: "Nothing T\u00fcrkiye",
        point: "7.6"
      }, {
        name: "F\u0131rat Online - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "DO\u011eU\u015e ELEKTRON\u0130K SAN.T\u0130C.LTD.\u015eT\u0130. - Turkcell Ma\u011fazas\u0131",
        point: "9.9"
      }, {
        name: "DES Group",
        point: "10.0"
      }, {
        name: "MALATYA Y\u00d6RESEL PAZARI",
        point: "9.8"
      }, {
        name: "Anatoptan",
        point: "9.8"
      }, {
        name: "Ofisomi",
        point: "8.6"
      }, {
        name: "UZMAN TEKNOLOJ\u0130",
        point: "9.6"
      }, {
        name: "Petrix",
        point: "9.1"
      }, {
        name: "Birtane Telekom",
        point: "9.6"
      }, {
        name: "MARMARA STORE - Turkcell Ma\u011fazas\u0131",
        point: "10"
      }, {
        name: "Mepal \x26 Moneta",
        point: "7.9"
      }, {
        name: "UZ AKILLI \u00c7OCUK SAATLER\u0130",
        point: "8.3"
      }, {
        name: "TRKOM TELEKOM\u00dcN\u0130KASYON - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "SENATECH",
        point: "9.3"
      }, {
        name: "UYGUN DEPOM",
        point: "9.7"
      }, {
        name: "GELAL",
        point: "9.9"
      }, {
        name: "\u0130\u00c7KALE B\u0130L\u0130\u015e\u0130M",
        point: "9.9"
      }, {
        name: "Cesur \u0130leti\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "9.9"
      }, {
        name: "NASA \u0130LET\u0130\u015e\u0130M",
        point: "10.0"
      }, {
        name: "Mobilaks",
        point: "10.0"
      }, {
        name: "Birtane - Telekom",
        point: "10.0"
      }, {
        name: "BAYRAKTAR TEKNOLOJ\u0130",
        point: "9.7"
      }, {
        name: "hesaplimagaza",
        point: "9.9"
      }, {
        name: "Ede Group - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "Simta\u015f - Turkcell Ma\u011fazas\u0131",
        point: "9.9"
      }, {
        name: "Cepborsa",
        point: "10.0"
      }, {
        name: "Alya Of \u0130leti\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "Azur Teknoloji",
        point: "9.9"
      }, {
        name: "Cihad \u0130leti\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "8.2"
      }, {
        name: "Do\u011fuhan Elektronik",
        point: "8.6"
      }, {
        name: "Elektronikf\u0131rsat\u0131",
        point: "10.0"
      }, {
        name: "\u00d6ngen Elektronik",
        point: "10.0"
      }, {
        name: "\u015eafak Elektronik - Turkcell Ma\u011fazas\u0131",
        point: "9.0"
      }, {
        name: "Teknoplus Ma\u011fazac\u0131l\u0131k - Turkcell Ma\u011fazas\u0131",
        point: "7.7"
      }, {
        name: "Yuvam Telekom- Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "SELTEC TEKNOLOJ\u0130",
        point: "8.7"
      }, {
        name: "Gerz \u0130leti\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "F\u0131rat \u0130leti\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "9.9"
      }, {
        name: "Bahar \u0130leti\u015fim-Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "\u00d6zate\u015f Doktorlar Cad - Turkcell Ma\u011fazas\u0131",
        point: "9.8"
      }, {
        name: "Kristal Teknoloji \u00dcr\u00fcnleri",
        point: "9.3"
      }, {
        name: "MT ELFCELL",
        point: "10.0"
      }, {
        name: "Teknomarket",
        point: "7.9"
      }, {
        name: "G\u00fczey",
        point: "10.0"
      }, {
        name: "Do\u011fu \u0130leti\u015fim",
        point: "10.0"
      }, {
        name: "Acar Grup-Turkcell Ma\u011fazas\u0131",
        point: "7.5"
      }, {
        name: "ORY TEKNOLOJ\u0130 - Turkcell Ma\u011fazas\u0131",
        point: "9.7"
      }, {
        name: "Alsambunu",
        point: "9.8"
      }, {
        name: "Hasan Tarhan",
        point: "10.0"
      }, {
        name: "VATANO\u011eLU \u0130LET\u0130\u015e\u0130M - Turkcell Ma\u011fazas\u0131",
        point: "9.8"
      }, {
        name: "AKC TEKNOLOJ\u0130",
        point: "10.0"
      }, {
        name: "SIRO\u011eLU TEKNOLOJ\u0130 - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "MORKO\u00c7LAR TEKNOLOJ\u0130 \u00dcR\u00dcNLER\u0130 - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "DokuzOnline",
        point: "10.0"
      }, {
        name: "\u00c7\u0131nar Extreme",
        point: "9.8"
      }, {
        name: "GameofZone",
        point: "9.2"
      }, {
        name: "S\u0130M TELEKOM - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "OM\u0130D T\u00dcRK\u0130YE",
        point: "9.3"
      }, {
        name: "Vizyon Bilgisayar",
        point: "7.9"
      }, {
        name: "TA\u015eTANLAR T\u0130CARET - Turkcell Ma\u011fazas\u0131",
        point: "9.8"
      }, {
        name: "MUTLU TEKNOLOJ\u0130 - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "Etna Mobil Aksesuar",
        point: "9.8"
      }, {
        name: "Alt\u0131n Ticaret",
        point: "8.3"
      }, {
        name: "UZMAN \u0130LET\u0130\u015e\u0130M - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "\u00c7A\u011eRI \u0130LET\u0130\u015e\u0130M - Turkcell Ma\u011fazas\u0131",
        point: "9.3"
      }, {
        name: "\u0130stasyonTurkcell - Turkcell Ma\u011fazas\u0131",
        point: "9.5"
      }, {
        name: "Koygun Deha - Turkcell Ma\u011fazas\u0131",
        point: "7.8"
      }, {
        name: "Kraft Baby",
        point: "10.0"
      }, {
        name: "BONJUX - Turkcell Ma\u011fazas\u0131",
        point: "9.9"
      }, {
        name: "ARTEL TEKNOLOJ\u0130 - Turkcell Ma\u011fazas\u0131",
        point: "9.5"
      }, {
        name: "GES \u0130LET\u0130\u015e\u0130M",
        point: "9.3"
      }, {
        name: "WALDEN - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "Teknomahall",
        point: "8.7"
      }, {
        name: "Mirkete",
        point: "10.0"
      }, {
        name: "Bircan \u0130leti\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "9.8"
      }, {
        name: "NEWL\u0130FEGOLD",
        point: "9.2"
      }, {
        name: "EvS Teknoloji",
        point: "7.7"
      }, {
        name: "Mertim Teknoloji - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "Ger\u00e7ek \u0130leti\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "Skylax",
        point: "10.0"
      }, {
        name: "KR\u0130STAL TEKNOLOJ\u0130 - Turkcell Ma\u011fazas\u0131",
        point: "9.6"
      }, {
        name: "HarikaFiyat PluS",
        point: "9.5"
      }, {
        name: "Demircan - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "CMG TELEKOM\u00dcN\u0130KASYON - Turkcell Ma\u011fazas\u0131",
        point: "9.8"
      }, {
        name: "Plus Teknoloji - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "Do\u011fa \u00c7i\u00e7ek\u00e7ilik",
        point: "7.0"
      }, {
        name: "Kay\u0131s\u0131 Gurme",
        point: "9.4"
      }, {
        name: "FixB\u00fcro",
        point: "10.0"
      }, {
        name: "Alev \u0130leti\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "9.2"
      }, {
        name: "At\u0131l\u0131m - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "Bisistem",
        point: "9.7"
      }, {
        name: "BTTeknoloji",
        point: "9.8"
      }, {
        name: "\u00c7\u0131narlar \u0130leti\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "Koligan",
        point: "9.8"
      }, {
        name: "Markomonline - Turkcell Ma\u011fazas\u0131",
        point: "9.9"
      }, {
        name: "Uzmanmobil - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "MOB\u0130LGARAJ",
        point: "7.5"
      }, {
        name: "PDAteknoloji",
        point: "10.0"
      }, {
        name: "Denkel",
        point: "10.0"
      }, {
        name: "Neta Teknoloji - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "Hepsiphone - Turkcell Ma\u011fazas\u0131",
        point: "8.1"
      }, {
        name: "Eren DTM",
        point: "10.0"
      }, {
        name: "ERC TEKNOLOJ\u0130 - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "Sherman",
        point: "9.4"
      }, {
        name: "PROCELL - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "Sepetist",
        point: "10.0"
      }, {
        name: "SporServis",
        point: "9.5"
      }, {
        name: "Anatolian",
        point: "10.0"
      }, {
        name: "Technofashion",
        point: "8.3"
      }, {
        name: "Birgetek Teknoloji - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "\u015een \u0130leti\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "Uzel \u0130leti\u015fim",
        point: "10.0"
      }, {
        name: "Pine Limited",
        point: "10.0"
      }, {
        name: "Senem \u0130leti\u015fim - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "Gelenalsin",
        point: "10.0"
      }, {
        name: "VENDAS",
        point: "7.4"
      }, {
        name: "CazipAlisveris",
        point: "9.6"
      }, {
        name: "PINAR \u0130LET\u0130\u015e\u0130M - Turkcell Ma\u011fazas\u0131",
        point: "9.9"
      }, {
        name: "Tim Haberle\u015fme - Turkcell Ma\u011fazas\u0131",
        point: "10.0"
      }, {
        name: "BA\u015eO\u011eLU MOB\u0130L \u0130LET\u0130\u015e\u0130M - Turkcell Ma\u011fazas\u0131",
        point: "9.9"
      }, {
        name: "Airyshop",
        point: "9.3"
      }];
      for (var i = 0; i < window.hypeSellerList.length; i++) {
        var hypeSeller = window.hypeSellerList[i];
        document.querySelectorAll(".a-price-radio-b__label").forEach(function(a) {
          var b = a.querySelector(".a-price-radio-b__left-text-seller-and-cargo-info");
          b && b.innerText.includes(hypeSeller.name) && (window.hypeSellerPoint = hypeSeller.point, window.hypeSellerEl = a, window.dataLayer = window.dataLayer || [], window.dataLayer.push({
            event: "hypeSellerPointTest"
          }))
        })
      }
      var offerEls = document.querySelectorAll(".m-card-offer");
      for (i = 0; i < offerEls.length; i++) {
        var hypeOfferEl = offerEls[i],
          hypeOfferNameEl = hypeOfferEl.querySelector(".m-card-offer__title h4");
        if (hypeOfferNameEl) {
          for (var found = !1, sellerName = hypeOfferNameEl.textContent.trim(), j = 0; j < window.hypeSellerList.length; j++) {
            var seller = window.hypeSellerList[j];
            if (sellerName.includes(seller.name)) {
              window.hypeSellerPoint = seller.point;
              window.hypeSellerEl = hypeOfferNameEl;
              window.dataLayer = window.dataLayer || [];
              window.dataLayer.push({
                event: "hypeSellerPointTest"
              });
              found = !0;
              break
            }
          }
          if (found) break
        }
      };
      
    </script><script type="text/javascript" id="">
      $(document).on("click", ".product-detail__title-property .a-fav-button", function() {
        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push({
          event: "GAEvent",
          eventCategory: "AB Test",
          eventAction: "Favori Buton",
          eventLabel: "Click"
        })
      });
    </script><script type="text/javascript" id="">
      ttq.instance("C978U1JC77UC6ALAC46G").track("ViewContent", {
        content_ids: google_tag_manager["rm"]["116191"](63),
        content_type: "product",
        content_name: google_tag_manager["rm"]["116191"](64),
        content_category: google_tag_manager["rm"]["116191"](65),
        quantity: 1,
        value: google_tag_manager["rm"]["116191"](66),
        currency: "TRY"
      });
    </script><script type="text/javascript" id="">
      (function() {
        var b = document.querySelector("input[name\x3d'price']:checked").getAttribute("data-type");
        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push({
          event: "GAEvent",
          eventCategory: "Price Option",
          eventAction: "Click",
          eventLabel: b,
          clickedOptionType: b
        });
        document.querySelector(".m-form").addEventListener("change", function(a) {
          "radio" == a.target.type && "price" == a.target.name && (a = a.target.getAttribute("data-type"), window.dataLayer.push({
            event: "GAEvent",
            eventCategory: "Price Option",
            eventAction: "Click",
            eventLabel: a,
            clickedOptionType: a
          }))
        })
      })();
    </script><script type="text/javascript" id="">
      window.dataLayer = window.dataLayer || [];
      window.dataLayer.push({
        event: "PageTypeDetail",
        PageTypeInsider: "Product"
      });
    </script><script type="text/javascript" id="">
      window.optimizely = window.optimizely || [];
      window.optimizely.push({
        type: "page",
        pageName: "product_detail"
      });
    </script><script type="text/javascript" id="">
      hype = {
        pagedata: {},
        logger: {
          groupOpened: !1
        },
        modal: {},
        exitIntent: {},
        create: {},
        hyperootdomain: window.location.host,
        listenedFunctions: {},
        lastListenedEvent: null,
        dataLayerIndex: -1,
        dataLayerEcIndex: -1,
        loggerstarted: !1,
        what: Object.prototype.toString,
        asciilogo: "  _                      \n | |                     \n | |__  _   _ _ __   ___ \n | '_ \\| | | | '_ \\ / _ \\\n | | | | |_| | |_) |  __/\n |_| |_|\\__, | .__/ \\___|\n         __/ | |         \n        |___/|_|         ",
        isObjectEmpty: function(a) {
          for (var b in a)
            if (Object.prototype.hasOwnProperty.call(a, b)) return !1;
          return !0
        },
        isMobile: function() {
          return /(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0, 4)) ? !0 : !1
        }
      };
      window.hype.getDataLayerVariable = function(a) {
        var b = null;
        if (1 == window.hasOwnProperty("dataLayer"))
          for (var c = 0, d = window.dataLayer.length; c < d; c++) 1 == window.dataLayer[c].hasOwnProperty(a) && (b = window.dataLayer[c][a]);
        return b
      };
      hype.logger.isActive = function() {
        if (Storage) return !0 === localStorage.getItem("hypeLogger") ? !0 : !1
      };
      hype.logger.activate = function() {
        Storage && (localStorage.setItem("hypeLogger", !0), confirm("Hype logger aktifle\u015ftirildi, sayfay\u0131 yenileyim mi?") && location.reload())
      };
      hype.logger.stop = function() {
        Storage && (localStorage.setItem("hypeLogger", !1), confirm("Hype logger kapat\u0131ld\u0131, sayfay\u0131 yenileyim mi?") && location.reload())
      };
      hype.logger.info = function(a) {
        "true" == localStorage.getItem("hypeLogger") && (!1 === hype.loggerstarted && (console.log(hype.asciilogo), hype.loggerstarted = !0), console.info("[HYPE Bilgi]: " + a))
      };
      hype.waitForSelectors = function(a, b, c) {
        var d, e;
        b || (b = 0);
        c || (c = 3E4);
        return new Promise(function(g, f) {
          d = setInterval(function() {
            var h = a.map(function(k) {
              return document.querySelector(k)
            }).every(Boolean);
            if (h) return clearInterval(d), clearTimeout(e), g()
          }, b);
          e = setTimeout(function() {
            clearInterval(d);
            return f("Element not found")
          }, c)
        })
      };
      hype.logger.warn = function(a) {
        "true" == localStorage.getItem("hypeLogger") && (!1 === hype.loggerstarted && (console.log(hype.asciilogo), hype.loggerstarted = !0), console.warn("[HYPE Uyar\u0131]: " + a))
      };
      hype.logger.group = function() {
        "true" == localStorage.getItem("hypeLogger") && !1 === hype.logger.groupOpened && (console.group(), hype.logger.groupOpened = !0)
      };
      hype.logger.groupEnd = function() {
        "true" == localStorage.getItem("hypeLogger") && (console.groupEnd(), hype.logger.groupOpened = !1)
      };
      window.hype.checkifloaded = function(a, b, c, d, e) {
        var g = !1;
        "" == typeof window.hype.checkerSlot && (window.hype.checkerSlot = []);
        var f = window.hype.checkerSlot;
        "number" !== typeof e && (e = f.length, f[f.length] = 0);
        var h = c || 100,
          k = d || 50;
        setTimeout(function() {
          !1 === window.eval(a) && f[e] < 1E3 * k / h && !1 === g ? (hype.logger.info(a + " ifadesi true d\u00f6nmedi, " + c + "ms bekliyorum."), f[e]++, window.hype.checkifloaded(a, b, h, k, e)) : f[e] >= 1E3 * k / h ? hype.logger.warn("s\u00fcre doldu ne yazik ki bulamadik") : (hype.logger.info("ifade " + 50 * (f[e] + 1) / 1E3 + " saniyede bulundu, fonksiyonu calistiriyorum"), g = !0, b())
        }, h)
      };
      hype.setCookie = function(a, b, c) {
        var d = new Date;
        d.setTime(d.getTime() + 864E5 * c);
        d = "expires\x3d" + d.toUTCString();
        document.cookie = 0 == c ? a + "\x3d" + b + "; domain\x3d." + hype.hyperootdomain + ";path\x3d/" : a + "\x3d" + b + "; " + d + "; domain\x3d." + hype.hyperootdomain + ";path\x3d/"
      };
      hype.getCookie = function(a) {
        a += "\x3d";
        for (var b = document.cookie.split(";"), c = 0; c < b.length; c++) {
          for (var d = b[c];
            " " == d.charAt(0);) d = d.substring(1);
          if (0 == d.indexOf(a)) return d.substring(a.length, d.length)
        }
        return ""
      };
      hype.checkCookie = function(a) {
        return "" != hype.getCookie(a) ? !0 : !1
      };
      hype.removeCookie = function(a) {
        var b = "expires\x3dThu, 01 Jan 1970 00:00:00 UTC;";
        document.cookie = a + "\x3d; " + b + "domain\x3d." + hype.hyperootdomain + ";path\x3d/";
        document.cookie = a + "\x3d; " + b + "path\x3d/";
        document.cookie = a + "\x3d; " + b
      };
      hype.toFixed = function(a, b) {
        b = b || 0;
        var c = Math.pow(10, b),
          d = Math.abs(Math.round(a * c));
        a = (0 > a ? "-" : "") + String(Math.floor(d / c));
        0  < b && (c = String(d % c), b = Array(Math.max(b - c.length, 0) + 1).join("0"), a += "." + b + c);
        return a
      };
      window.hype.dateIsBetween = function(a, b, c) {
        if ("" == typeof a) return !1;
        var d = /(\d{2})\-(\d{2})-(\d{4})/;
        b = "function" === typeof b.getMonth ? b : new Date(b.replace(d, "$3-$2-$1"));
        var e = "function" === typeof c.getMonth ? c : new Date(c.replace(d, "$3-$2-$1"));
        a = "function" === typeof a.getMonth ? c : new Date(a.replace(d, "$3-$2-$1"));
        return a < e && a > b || a.getTime() == b.getTime() && b.getTime() == e.getTime() ? !0 : !1
      };
      hype.modal = function(a) {
        void 0 == a && (a = {});
        var b = a.className || "",
          c = a.idName || "",
          d = a.width || "50vw",
          e = a.height || "500px",
          g = a.left || "calc(50% - 25vw)",
          f = a.right || "auto",
          h = a.top || "calc(50% - 250px)",
          k = a.bottom || "auto",
          p = a.background || "#fff",
          q = a.padding || "25px",
          m = a.position || "fixed",
          n = a.display || "block",
          r = a.closeImg || "https://hypeistanbul.com/img/close.jpg";
        a = a.html || "";
        var l = '\x3cstyle class\x3d"hypeModalStyle"\x3e';
        l += ".hypeModal {width:" + d + "; height:" + e + "; left:" + g + "; right:" + f + "; top:" + h + "; bottom:" + k + "; background:" + p + "; padding:" + q + "; position:" + m + "; z-index: 9999; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; display:" + n + ";} .hypeModalBlocker {width:100%; height:100vh; position:" + m + "; left:0; top:0; z-index: 9990; background:rgba(0,0,0,0.7);  display:" + n + ";} .hypeClose {width:40px; height:40px; position:absolute; right:-20px; top:-20px; background:url(" + r + ") no-repeat center center; background-size:100%;}";
        l += "\x3c/style\x3e";
        document.head.insertAdjacentHTML("beforeend", l);
        b = '\x3cdiv class\x3d"hypeModal ' + b + '" id\x3d"' + c + '"\x3e \x3ca href\x3d"javascript:;" class\x3d"hypeClose"\x3e\x3c/a\x3e \x3cdiv class\x3d"hypeModalContent"\x3e ' + a + " \x3c/div\x3e  \x3c/div\x3e";
        document.querySelector("body").insertAdjacentHTML("beforeend", b);
        0 == document.querySelectorAll(".hypeModalBlocker").length ? (b = '\x3cdiv class\x3d"hypeModalBlocker"\x3e \x3c/div\x3e', document.querySelector("body").insertAdjacentHTML("beforeend", b)) : document.querySelector(".hypeModalBlocker").style.display = "block";
        if (0 !== document.querySelectorAll(".hypeClose").length)
          for (b = 0; b < document.querySelectorAll(".hypeClose").length; b++) document.querySelectorAll(".hypeClose")[b].addEventListener("click", function() {
            hype.modal.hide()
          });
        if (0 !== document.querySelectorAll(".hypeModalBlocker").length)
          for (b = 0; b < document.querySelectorAll(".hypeModalBlocker").length; b++) document.querySelectorAll(".hypeModalBlocker")[b].addEventListener("click", function() {
            hype.modal.hide()
          })
      };
      hype.modal.hide = function(a) {
        a = a || ".hypeModal";
        var b = document.querySelectorAll(a).length;
        0 !== document.querySelectorAll(".hypeModalBlocker").length && (document.querySelector(".hypeModalBlocker").style.display = "none");
        for (var c = 0; c < b; c++) 0 !== document.querySelectorAll(a).length && (document.querySelectorAll(a)[c].style.display = "none")
      };
      hype.modal.show = function(a) {
        a = a || ".hypeModal";
        var b = document.querySelectorAll(a).length;
        0 !== document.querySelectorAll(".hypeModalBlocker").length && (document.querySelector(".hypeModalBlocker").style.display = "block");
        for (var c = 0; c < b; c++) 0 !== document.querySelectorAll(a).length && (document.querySelectorAll(a)[c].style.display = "block")
      };
      hype.exitIntent = function(a, b) {
        void 0 == a && (a = {});
        var c = a.cookie || "1";
        "function" !== typeof b && (b = function() {
          hype.logger.warn("Herhangi bir fonksiyon yaz\u0131lmas\u0131 laz\u0131m!")
        });
        document.addEventListener("mouseleave", function(d) {
          0 > d.clientY && ("1" == c ? !0 !== hype.checkCookie("hype-exit") && (hype.setCookie("hype-exit", !0), cookieStatus = !1, b()) : b())
        }, !1);
        document.querySelector(".blutv-logo") && document.querySelector(".blutv-logo").addEventListener("mouseenter", function(d) {
          0 > d.clientY && ("1" == c ? !0 !== hype.checkCookie("hype-exit") && (hype.setCookie("hype-exit", !0), cookieStatus = !1, b()) : b())
        }, !1)
      };
      hype.insertAfter = function(a, b) {
        b.parentNode.insertBefore(a, b.nextSibling)
      };
      hype.insertBefore = function(a, b) {
        b.parentNode.insertBefore(a, b)
      };
      hype.append = function(a) {
        void 0 == a && (a = {});
        var b = a.selectorName || "body",
          c = a.position || "beforeend";
        html = a.html || "";
        document.querySelector(b).insertAdjacentHTML(c, html)
      };
      hype.click = function(a, b) {
        document.querySelectorAll(a).forEach(function(c) {
          console.log(c);
          c.addEventListener("click", b)
        })
      };
      hype.focus = function(a, b) {
        document.querySelectorAll(a).forEach(function(c) {
          c.addEventListener("focus", b)
        })
      };
      hype.blur = function(a, b) {
        document.querySelectorAll(a).forEach(function(c) {
          c.addEventListener("blur", b)
        })
      };
      hype.change = function(a, b) {
        document.querySelectorAll(a).forEach(function(c) {
          c.addEventListener("change", b)
        })
      };
      hype.keyup = function(a, b) {
        document.querySelectorAll(a).forEach(function(c) {
          c.addEventListener("keyup", b)
        })
      };
      hype.keypress = function(a, b) {
        document.querySelectorAll(a).forEach(function(c) {
          c.addEventListener("keypress", b)
        })
      };
      hype.keydown = function(a, b) {
        document.querySelectorAll(a).forEach(function(c) {
          c.addEventListener("keydown", b)
        })
      };
      hype.selectAll = function(a) {
        return document.querySelectorAll(a)
      };
      hype.select = function(a) {
        return document.querySelector(a)
      };
      hype.screenwidth = function() {
        var a = window,
          b = document,
          c = b.documentElement;
        b = b.getElementsByTagName("body")[0];
        return a = a.innerWidth || c.clientWidth || b.clientWidth
      };
      hype.ajaxget = function(a, b) {
        var c = new XMLHttpRequest;
        c.open("GET", a, !0);
        c.send();
        c.onreadystatechange = function() {
          4 == this.readyState && 200 == this.status && b(this.responseText)
        }
      };
      hype.ajaxpost = function(a, b, c, d) {
        c = new XMLHttpRequest;
        c.open("POST", a, !0);
        c.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        c.send(b);
        c.onreadystatechange = function() {
          4 == this.readyState && 200 == this.status && d(this.responseText)
        }
      };
      hype.sendAnalyticsData = function(a, b, c) {
        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push({
          event: "hypeEvent",
          eventCategory: a,
          eventAction: b,
          eventLabel: c
        })
      };
      window.hype.hypeListenedInputs = [];
      window.hype.hypeListenedInputsEmpty = [];
      window.hype.hypeInputAnalyzer = function(a, b, c) {
        var d = "",
          e = hype.select(a + " " + b);
        if (null !== e) {
          var g = function() {
            -1 == hype.hypeListenedInputs.indexOf(a + " " + b) ? (hype.hypeListenedInputs.push(a + " " + b), hype.hypeListenedInputs[0] == a + " " + b ? hype.sendAnalyticsData("Micro Funnel", c, d + " - Dolu Ge\u00e7ti - \u0130lk Bunu Doldurdu") : hype.sendAnalyticsData("Micro Funnel", c, d + " - Dolu Ge\u00e7ti")) : hype.sendAnalyticsData("Micro Funnel", c, d + " - Tekrar Doldurdu")
          };
          if ("SELECT" == e.tagName) e.attributes.hasOwnProperty("placeholder") && (d = e.attributes.placeholder.value), "#country_code" === b && (d = "\u00dclke Se\u00e7iniz"), "#expireMonth" === b && (d = "Ay"), "#expireYear" === b && (d = "Y\u0131l"), window.hype.blur(b, function(f) {
            window.setTimeout(function() {
              "" !== f.target.value && g()
            }, 200)
          });
          else if ("INPUT" == e.tagName || "TEXTAREA" == e.tagName) e.attributes.hasOwnProperty("placeholder") && (d = e.attributes.placeholder.value), null !== b.match(/.*indirimkuponu$/) && (d = "\u0130ndirim Kuponu"), null !== b.match(/.*mobile_phone$/) && (d = "Cep Telefonu"), "#memberForm" === a && "checkbox" === e.type && (d = e.nextElementSibling.nextElementSibling.innerText), window.hype.change(b, function(f) {
            g()
          });
          window.hype.blur(b, function(f) {
            -1 == window.hype.hypeListenedInputsEmpty.indexOf(b) && "" == this.value && (hype.sendAnalyticsData("Micro Funnel", c, d + " - Bo\u015f Ge\u00e7ti"), hype.hypeListenedInputsEmpty.push(b))
          })
        }
      };
      
    </script><script type="text/javascript" id="">
      function createCookie(b, d, c) {
        if (c) {
          var a = new Date;
          a.setTime(a.getTime() + 864E5 * c);
          c = "; expires\x3d" + a.toGMTString()
        } else c = "";
        document.cookie = b + "\x3d" + d + c + "; path\x3d/"
      }

      function createCookieObject() {
        var b = {},
          d = document.cookie;
        d = d.split("; ");
        for (var c = 0; c < d.length; c++) {
          var a = d[c].split("\x3d");
          if ("" === typeof b[a[0]]) b[a[0]] = a[1];
          else if ("string" === typeof b[a[0]]) {
            var e = [b[a[0]], a[1]];
            b[a[0]] = e
          } else b[a[0]].push(a[1])
        }
        return b
      }

      function createQueryObject() {
        var b = {},
          d = window.location.search.substring(1);
        d = d.split("\x26");
        for (var c = 0; c < d.length; c++) {
          var a = d[c].split("\x3d");
          if ("" === typeof b[a[0]]) b[a[0]] = a[1];
          else if ("string" === typeof b[a[0]]) {
            var e = [b[a[0]], a[1]];
            b[a[0]] = e
          } else b[a[0]].push(a[1])
        }
        return b
      };
      
    </script><script type="text/javascript" id="">
      var existingChannels = "",
        existingSources = "",
        landingPage = !1,
        currentChannel = "",
        currentSource = "",
        MC_cookies = document.cookie,
        cookieCharLimit = 4096;
      if (-1 == MC_cookies.indexOf("MC_landing") || -1 != document.URL.indexOf("utm_source") || -1 != document.referrer.indexOf("google.com") || -1 != document.referrer.indexOf("yandex.com") || 30  < document.referrer.indexOf("turkcell.com.tr") || -1 == document.referrer.indexOf("turkcell.com.tr")) {
        createCookie("MC_landing", 1);
        landingPage = !0;
        var CookieString = createCookieObject(),
          QueryString = createQueryObject();
        "" === typeof QueryString.utm_source ? "" === document.referrer ? currentSource = currentChannel = "(direct)" : -1 != document.referrer.indexOf("google.com") ? (currentChannel = "Organic", currentSource = "Google") : -1 != document.referrer.indexOf("yandex.com") ? (currentChannel = "Organic", currentSource = "Yandex") : currentChannel = document.referrer.match(/:\/\/(.[^/]+)/)[1] : (currentSource = QueryString.utm_source + "/" + QueryString.utm_medium + "/" + QueryString.utm_campaign + "/" + QueryString.utm_content, currentChannel = QueryString.utm_source);
        "" != typeof CookieString.mcfChannels && (4096  < CookieString.mcfSourceDetails.length && (CookieString.mcfSourceDetails = CookieString.mcfSourceDetails.substring(CookieString.mcfSourceDetails.indexOf("\x3e") + 1, CookieString.mcfSourceDetails.length), CookieString.mcfChannels = CookieString.mcfChannels.substring(CookieString.mcfChannels.indexOf("\x3e") + 1, CookieString.mcfChannels.length)), existingChannels = CookieString.mcfChannels, existingSources = CookieString.mcfSourceDetails);
        existingSources.substring(existingSources.lastIndexOf("\x3e") + 1, existingSources.length) != currentSource && (0  < existingSources.length && (existingChannels += "\x3e", existingSources += "\x3e"), createCookie("mcfChannels", existingChannels + currentChannel, 180), createCookie("mcfSourceDetails", existingSources + currentSource, 180), createCookie("mcfLastInteraction", currentChannel + " | " + currentSource, 180));
        "" == existingChannels && createCookie("mcfFirstInteraction", currentChannel + " | " + currentSource, 180)
      };
      
    </script><script type="text/javascript" id="">
      window.hype.checkifloaded('document.querySelectorAll("#product-detail").length !\x3d\x3d 0 \x26\x26 (document.querySelectorAll(".notify-me-button").length !\x3d\x3d 0 || document.querySelectorAll(".add-to-basket-non-login").length !\x3d\x3d 0 || document.querySelectorAll(".add-to-basket").length !\x3d\x3d 0)', function() {
        var a = "",
          b = 0;
        a = "none" == $(".notify-me-button").css("display") ? "not_logged_in" == window.utag_data.customerStatus ? $(".add-to-basket-non-login").offset().top : $(".add-to-basket").offset().top : $(".notify-me-button").offset().top;
        $(window).scroll(function(c) {
          hypeScroll = $(window).scrollTop();
          hypeScroll > a + 50 && 0 == b && (b++, window.dataLayer = window.dataLayer || [], window.dataLayer.push({
            event: "TURKC-4"
          }))
        })
      }, 100, 10);
    </script>
    <!--efilli-blocked-element-placeholder--><script type="text/javascript" id="">
      document.querySelectorAll(".js-quick-nav li").forEach(function(a) {
        a.addEventListener("click", function() {
          window.dataLayer = window.dataLayer || [];
          window.dataLayer.push({
            event: "GAEvent",
            eventCategory: "Button Click",
            eventAction: "Header - H\u0131zl\u0131 \u0130\u015flemler",
            eventLabel: this.innerText.trim()
          })
        })
      });
    </script>
    <!--efilli-blocked-element-placeholder--><script type="text/javascript" id="">
      window.hasOwnProperty("createCookie") && window.createCookie("nprd", google_tag_manager["rm"]["116191"](89));
    </script><script type="text/javascript" id="">
      (function() {
        function a(c) {
          0 > c.clientY && (window.dataLayer = window.dataLayer || [], window.dataLayer.push({
            event: "hypeExitIntentPopupEvent"
          }), document.removeEventListener("mouseleave", a))
        }
        var b = 1E3;
        /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ? setTimeout(function() {
          window.dataLayer = window.dataLayer || [];
          window.dataLayer.push({
            event: "hypeExitIntentPopupEvent"
          })
        }, 10 * b) : setTimeout(function() {
          document.addEventListener("mouseleave", a)
        }, 3 * b)
      })();
    </script><script type="text/javascript" id="">
      (function() {
        var a = document.querySelector(".o-p-header__dropdown");
        if (a) {
          var c = new MutationObserver(function(b) {
            a.classList.contains("active") ? b[0].oldValue.includes("active") || window.dataLayer.push({
              event: "GAEvent",
              eventCategory: "AB Test",
              eventAction: "Desktop Menu",
              eventLabel: "Opened"
            }) : window.dataLayer.push({
              event: "GAEvent",
              eventCategory: "AB Test",
              eventAction: "Desktop Menu",
              eventLabel: "Closed"
            })
          });
          c.observe(a, {
            attributes: !0,
            attributeOldValue: !0
          })
        }
      })();
    </script>
    <!--efilli-blocked-element-placeholder--><script type="text/javascript" id="" src="//static.ads-twitter.com/oct.js"></script><script type="text/javascript" id="">
      document.querySelectorAll('[class*\x3d"header__top-menu"] [class*\x3d"header"]').forEach(function(a) {
        a.addEventListener("click", function() {
          window.dataLayer = window.dataLayer || [];
          dataLayer.push({
            event: "GAEvent",
            eventCategory: "Header\x26Footer Clicks",
            eventAction: "Header - Pasaj",
            eventLabel: this.innerText.trim()
          })
        })
      });
      document.querySelectorAll('[class*\x3d"footer-nav"] [class*\x3d"grid"] a').forEach(function(a) {
        a.addEventListener("click", function() {
          window.dataLayer = window.dataLayer || [];
          dataLayer.push({
            event: "GAEvent",
            eventCategory: "Header\x26Footer Clicks",
            eventAction: "Footer - Pasaj",
            eventLabel: this.innerText.trim()
          })
        })
      });
    </script>
    <!--efilli-blocked-element-placeholder--><script type="text/javascript" id="">
      var DATALAYER_OBJECT_NAME = "dataLayer",
        referrerOverride = function(a) {
          var c = window[DATALAYER_OBJECT_NAME] || [];
          c.push({
            event: "optimizely-referrer-override",
            "optimizely-referrer": a
          })
        },
        sendCampaignData = function(a, c) {
          if (a = optimizely.get("data") && optimizely.get("data").campaigns[a] && optimizely.get("data").campaigns[a].integrationSettings && optimizely.get("data").campaigns[a].integrationSettings.google_universal_analytics && optimizely.get("data").campaigns[a].integrationSettings.google_universal_analytics.universal_analytics_slot) {
            var e = window[DATALAYER_OBJECT_NAME] || [];
            e.push({
              event: "campaign-decided",
              "optimizely-dimension-value": c,
              "optimizely-dimension-number": a
            })
          }
        },
        initNewOptimizelyIntegration = function(a, c) {
          var e = !1,
            g = function(b) {
              var d = window.optimizely.get && window.optimizely.get("state"),
                f = d.getRedirectInfo() && d.getRedirectInfo().referrer;
              !e && f && (a(f), e = !0);
              d = d.getDecisionString({
                campaignId: b
              });
              c(b, d)
            },
            h = function() {
              window.optimizely = window.optimizely || [];
              window.optimizely.push({
                type: "addListener",
                filter: {
                  type: "lifecycle",
                  name: "campaignDecided"
                },
                handler: function(b) {
                  b = b.data.campaign.id;
                  g(b)
                }
              })
            },
            k = function() {
              var b = window.optimizely && window.optimizely.get && window.optimizely.get("state");
              if (b) {
                b = b.getCampaignStates({
                  isActive: !0
                });
                for (var d in b) g(d)
              }
            };
          k();
          h()
        },
        initOptimizelyIntegration = function(a, c) {
          initNewOptimizelyIntegration(a, c)
        };
      initOptimizelyIntegration(referrerOverride, sendCampaignData);
    </script>
    <!--efilli-blocked-element-placeholder--><script type="text/javascript" id="">
      1 == window.hasOwnProperty("utag_data") && ("" != typeof utag_data["js_page.cust.customer_id"] && dataLayer.push({
        customerId: utag_data["js_page.cust.customer_id"],
        customerDevice: utag_data["js_page.cust.Cus_device_brand"] + " | " + utag_data["js_page.cust.Cus_device_model"],
        customerPackage: utag_data["js_page.cust.customer_package"],
        customerPaymentType: utag_data["js_page.cust.payment_type"],
        customerSkStatus: utag_data["js_page.cust.customer_sk_status"],
        customerSegment: utag_data["js_page.cust.customer_segment_ALTS"]
      }), dataLayer.push({
        event: "crmLoaded"
      }));
    </script><script type="text/javascript" id="">
      ! function(d, e, f, g, h, k, a, b, c) {
        d[g] || (a = d[g] = function() {
          "function" === typeof a.execute ? a.execute.apply(a, arguments) : a.queue.push(arguments)
        }, a.version = "1.0", a.queue = [], b = e.createElement(f), b.async = !0, a.svc = h, b.src = h + k, c = e.getElementsByTagName(f)[0], c.parentNode.insertBefore(b, c))
      }(window, document, "script", "advermind", "https://signals.turkcell.com.tr", "/base.js");
      advermind("init", "470016443928963");
      advermind("track", "PageView");
    </script><script type="text/javascript" id="">
      var prElement = document.querySelector('meta[name\x3d"mainCategory"]'),
        cx_category = prElement && prElement.getAttribute("content");
      ! function(b, c, d, a) {
        b.mpfContainr || (b.mpfContainr = function() {
          d.push(arguments)
        }, mpfContainr.q = d, (a = c.createElement("script")).type = "application/javascript", a.async = !0, a.src = "//cdn.mookie1.com/containr.js", c.head.appendChild(a))
      }(window, document, []);
      mpfContainr("V2_872264", {
        host: "tr-gmtdmp.mookie1.com",
        tagType: "activity",
        "src.rand": utag_data.timestamp,
        "src.category-name": cx_category,
        "src.sales-order-id": utag_data.order_id,
        "src.basket": utag_data.basket,
        "src.price": utag_data.tiklaalrev || utag_data.order_total,
        "src.product-name": utag_data.gsm_product_name || utag_data.product_name,
        "src.home-page": utag_data.homepage,
        "src.product-id": utag_data.product_id,
        "src.sales": utag_data.sales
      });
    </script><noscript><iframe src="//tr-gmtdmp.mookie1.com/t/v2?tagid=V2_872264&amp;isNoScript&amp;src.category-name=[REPLACE THIS WITH YOUR MACRO AND PASS IN Category]&amp;src.sales-order-id=[REPLACE THIS WITH YOUR MACRO AND PASS IN Sales ID / Order ID]&amp;src.basket=[REPLACE THIS WITH YOUR MACRO AND PASS IN Basket]&amp;src.price=[REPLACE THIS WITH YOUR MACRO AND PASS IN Price]&amp;src.product-name=[REPLACE THIS WITH YOUR MACRO AND PASS IN Product Name]&amp;src.home-page=[REPLACE THIS WITH YOUR MACRO AND PASS IN Home Page]&amp;src.product-id=[REPLACE THIS WITH YOUR MACRO AND PASS IN Product ID]&amp;src.sales=[REPLACE THIS WITH YOUR MACRO AND PASS IN Sales]&amp;src.rand=[timestamp]" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript><script type="text/javascript" id="" src="https://www.googletagmanager.com/gtag/js?id=DC-10138642"></script><script type="text/javascript" id="">
      var now = new Date,
        eventTime = now.getDay() + "/" + Number(now.getMonth() + 1) + "/" + now.getFullYear() + "-" + now.getHours() + ":" + now.getMinutes() + ":" + now.getSeconds();
      utag_data.timestamp = eventTime;
    </script><script type="text/javascript" id="">
      window.insider_object = window.insider_object || {};
      window.insider_object.user = {
        nprd: google_tag_manager["rm"]["116191"](120),
        loginStatus: google_tag_manager["rm"]["116191"](121)
      };
    </script>
    <!--efilli-blocked-element-placeholder--><script type="text/javascript" id="">
      window.insider_object = {
        user: {
          uuid: google_tag_manager["rm"]["116191"](122),
          loginStatus: google_tag_manager["rm"]["116191"](123),
          customerPackage: google_tag_manager["rm"]["116191"](124),
          customerType: google_tag_manager["rm"]["116191"](125),
          customerDeviceModel: google_tag_manager["rm"]["116191"](126),
          customerPaymentType: google_tag_manager["rm"]["116191"](127),
          nprd: google_tag_manager["rm"]["116191"](128)
        },
        product: {
          id: google_tag_manager["rm"]["116191"](129),
          name: google_tag_manager["rm"]["116191"](130),
          brand: google_tag_manager["rm"]["116191"](131),
          taxonomy: google_tag_manager["rm"]["116191"](132),
          currency: "TRY",
          dahili_hafiza: google_tag_manager["rm"]["116191"](133),
          countdown: google_tag_manager["rm"]["116191"](134),
          product_rating: google_tag_manager["rm"]["116191"](135),
          rating_count: google_tag_manager["rm"]["116191"](136),
          taksitli_fiyat: google_tag_manager["rm"]["116191"](144),
          unit_price: google_tag_manager["rm"]["116191"](149),
          unit_sale_price: google_tag_manager["rm"]["116191"](150),
          indirim_tutari: google_tag_manager["rm"]["116191"](153),
          indirim_orani: google_tag_manager["rm"]["116191"](165),
          has_faturana_ek: google_tag_manager["rm"]["116191"](166),
          url: google_tag_manager["rm"]["116191"](167),
          stok: google_tag_manager["rm"]["116191"](168),
          product_image_url: google_tag_manager["rm"]["116191"](169),
          color: google_tag_manager["rm"]["116191"](170)
        },
        page: {
          type: google_tag_manager["rm"]["116191"](179)
        },
        custom: {
          site_type: "Pasaj"
        }
      };
    </script><script type="text/javascript" id="">
      if (null !== localStorage.getItem("ins-cart-product-list")) {
        var a = JSON.parse(localStorage.getItem("ins-cart-product-list")).data.productList;
        a.forEach(myFunction);
        "" !== typeof insider_object && (insider_object.basket = a)
      }

      function myFunction(b) {
        b.name = decodeURI(b.name)
      };
    </script><script type="text/javascript" id="" src="https://www.googletagmanager.com/gtag/js?id=DC-10978247"></script><script type="text/javascript" id="" src="https://www.googletagmanager.com/gtag/js?id=DC-11603480"></script><script type="text/javascript" id="" src="https://www.googletagmanager.com/gtag/js?id=DC-10978658"></script><script type="text/javascript" id="">
      $('[id*\x3d"banner-"]').on("click", function() {
        var b = $(this).attr("data-ga-position"),
          a = $(this).attr("data-ga-name"),
          d = $(this).attr("data-ga-id"),
          c = $(this).attr("style");
        c = c.match(/".*"/gi);
        dataLayer.push({
          event: "ecInternalPromotionClick",
          eventCategory: "Enhanced Ecommerce",
          eventAction: "Promotion Click",
          eventLabel: a,
          ecommerce: {
            promoClick: {
              promotions: [{
                id: d,
                name: "Banner - " + a,
                creative: c,
                position: b
              }]
            }
          }
        })
      });
      $(".m-p-hero-carousel-thumbs .swiper-slide").on("click", function() {
        var b = parseInt($(this).index()) + 1,
          a = $(this).find("img").attr("src");
        dataLayer.push({
          event: "ecInternalPromotionClick",
          eventCategory: "Enhanced Ecommerce",
          eventAction: "Promotion Click",
          eventLabel: "Carousel",
          ecommerce: {
            promoClick: {
              promotions: [{
                id: a,
                name: "Carousel",
                creative: "/pasaj",
                position: b
              }]
            }
          }
        })
      });
    </script>
    <!--efilli-blocked-element-placeholder--><script type="text/javascript" id="">
      function hypeCallback(c, f) {
        c.forEach(function(b) {
          if (b.isIntersecting) {
            var a = b.target;
            b = $(a).attr("data-ga-position");
            var d = $(a).attr("data-ga-name"),
              e = $(a).attr("data-ga-id");
            a = $(a).attr("style");
            a = a.match(/".*"/gi);
            dataLayer.push({
              event: "ecInternalPromotionView",
              eventCategory: "Enhanced Ecommerce",
              eventAction: "Promotion View",
              eventLabel: d,
              ecommerce: {
                promoView: {
                  promotions: [{
                    id: e,
                    name: "Banner - " + d,
                    creative: a,
                    position: b
                  }]
                }
              }
            })
          }
        })
      }
      var observer = new IntersectionObserver(hypeCallback, {
        root: null,
        rootMargin: "0px",
        threshold: .5
      });
      hype.checkifloaded("1 \x3e 0", function() {
        document.querySelectorAll('[id*\x3d"banner-"]').forEach(function(c) {
          observer.observe(c)
        })
      });
    </script><script type="text/javascript" id="">
      var prElement = document.querySelector('meta[name\x3d"cashPrice"]'),
        cx_price = prElement && prElement.getAttribute("content");
      advermind("track", "ViewContent", {
        content_type: "product",
        content_ids: google_tag_manager["rm"]["116191"](200),
        value: cx_price.split(" ")[0],
        currency: "TRY"
      });
    </script><script type="text/javascript" id="">
      var dataLayer = dataLayer || [];
      dataLayer.push({
        event: "crto_productpage",
        crto: {
          products: google_tag_manager["rm"]["116191"](201)
        }
      });
    </script>
    <!--efilli-blocked-element-placeholder--><script type="text/javascript" id="">
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments)
      }
      gtag("js", new Date);
      gtag("config", "DC-10138642");
    </script>
    <!--efilli-blocked-element-placeholder-->
    <!--efilli-blocked-element-placeholder--><script type="text/javascript" id="">
      var prElement = document.querySelector('meta[name\x3d"mainCategory"]'),
        cx_category = prElement && prElement.getAttribute("content");
      gtag("event", "conversion", {
        allow_custom_scripts: !0,
        u1: cx_category,
        u2: utag_data.order_id,
        u3: utag_data.basket,
        u4: utag_data.tiklaalrev || utag_data.order_total,
        u5: utag_data.gsm_product_name || utag_data.product_name,
        u6: utag_data.homepage,
        u7: utag_data.product_id,
        u8: utag_data.sales,
        send_to: "DC-10138642/invmedia/turkc0+standard"
      });
    </script><noscript><img src="https://ad.doubleclick.net/ddm/activity/src=10138642;type=invmedia;cat=turkc0;u1=[CATEGORY-NAME];u2=[SALES ID / ORDER ID];u3=[BASKET];u4=[PRICE];u5=[PRODUCT-NAME];u6=[HOME-PAGE];u7=[PRODUCT-ID];u8=[SALES];dc_lat=;dc_rdid=;tag_for_child_directed_treatment=;tfua=;npa=;ord=1?" width="1" height="1" alt=""></noscript><script type="text/javascript" id="">
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments)
      }
      gtag("js", new Date);
      gtag("config", "DC-10978247");
    </script>
    <!--efilli-blocked-element-placeholder-->
    <!--efilli-blocked-element-placeholder--><script type="text/javascript" id="">
      gtag("event", "conversion", {
        allow_custom_scripts: !0,
        send_to: "DC-10978247/turkc0/turkc0+standard"
      });
    </script><noscript><img src="https://ad.doubleclick.net/ddm/activity/src=10978247;type=turkc0;cat=turkc0;dc_lat=;dc_rdid=;tag_for_child_directed_treatment=;tfua=;npa=;gdpr=${GDPR};gdpr_consent=${GDPR_CONSENT_755};ord=1?" width="1" height="1" alt=""></noscript><script type="text/javascript" id="">
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments)
      }
      gtag("js", new Date);
      gtag("config", "DC-11603480");
    </script><script type="text/javascript" id="">
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments)
      }
      gtag("js", new Date);
      gtag("config", "DC-10978658");
    </script>
    <!--efilli-blocked-element-placeholder-->
    <!--efilli-blocked-element-placeholder--><script type="text/javascript" id="">
      gtag("event", "conversion", {
        allow_custom_scripts: !0,
        send_to: "DC-10978658/comtr0/turkc0+standard"
      });
    </script><noscript><img src="https://ad.doubleclick.net/ddm/activity/src=10978658;type=comtr0;cat=turkc0;dc_lat=;dc_rdid=;tag_for_child_directed_treatment=;tfua=;npa=;gdpr=${GDPR};gdpr_consent=${GDPR_CONSENT_755};ord=1?" width="1" height="1" alt=""></noscript><script type="text/javascript" id="">
      window.dataLayer = window.dataLayer || [];
      window.dataLayer.push({
        event: "HYPE_CAMPAIGN_BUTTON"
      });
    </script><script type="text/javascript" id="">
      fbq("track", "AddToWishlist", {
        value: utag_data.order_total.substr(0, utag_data.order_total.length - 3),
        currency: "TRY",
        contents: [{
          id: google_tag_manager["rm"]["116191"](372),
          quantity: 1
        }],
        content_type: "product"
      });
    </script><script type="text/javascript" id="">
      ttq.instance("C978U1JC77UC6ALAC46G").track("AddToWishlist", {
        content_id: google_tag_manager["rm"]["116191"](373),
        quantity: 1,
        price: google_tag_manager["rm"]["116191"](374),
        value: google_tag_manager["rm"]["116191"](375),
        currency: "TRY"
      });
    </script>
  </body>
</html>