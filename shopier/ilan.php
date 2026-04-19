<?php
include('database/connect.php');

$id = $_GET['id'];
$sorgu = $db->prepare("SELECT * FROM ilan_shopier WHERE id=:id");
$sorgu->execute(['id' => (int)$id]);

while ($sonuc = $sorgu->fetch()) {
    if ($query = $db->prepare("SELECT * FROM ilan_shopier WHERE id=:id AND ilandurum = '1'")) {
        $query->execute(['id' => (int)$id]);
        if ($query->rowCount() > 0) {  
?>      

<!DOCTYPE html>
<html lang="en" dir="ltr">
  
<!-- Mirrored from www.shopier.com/ShowProductNew/products.php?id=18094188 by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Aug 2023 12:55:08 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta name="description" content="Kredi kartı ile güvenli şekilde alışveriş yapmak için tıklayın">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title><?php echo $sonuc['urunadi'] ?> | Shopier</title>
    <script src="../cdn-cgi/apps/head/Vfq5CAksa7MIFenXgsyv7fqWDvY.js"></script><link rel="apple-touch-icon" href="images/favicons/apple-touch-icon.png">
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
        '../../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-5FGVGWZ');</script>
        <!-- End Google Tag Manager --><meta name='robots' content='noindex, follow'><link rel="stylesheet" href="styles/bites/font-awesome.min.css">                    <!-- Facebook JavaScript SDK -->
                    <script>
                        window.fbAsyncInit = function() {
                          FB.init({appId:'1321130767979745',autoLogAppEvents:true,xfbml:true,version:'v2.11' }); //  FB.init({appId:'139093993458904',autoLogAppEvents:true,xfbml:true,version:'v2.11' });
                        };
                        (function(d, s, id){
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id)) {return;}
                            js = d.createElement(s); js.id = id;
                            js.src = "../../connect.facebook.net/en_US/sdk.js";
                            fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));
                    </script>
            
                    <meta property="fb:app_id" content="1321130767979745" />
                    <meta property="og:image" content="https://scontent.fadb6-5.fna.fbcdn.net/v/t39.30808-6/331496756_1271218156766092_7268530213468177767_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=efb6e6&_nc_ohc=mvJVdOBdhwUAX9E60T-&_nc_ht=scontent.fadb6-5.fna&oh=00_AfDOGDpQpzSTb8P11l3ytC6p7N3d9eEYRSJOUmrXcXjExg&oe=65AC58A5" />
                    <meta property="og:type" content="product">
                    <meta property="og:title" content="<?php echo $sonuc['urunadi'] ?>" />
                    <meta property="og:url" content="https://www.shopier.comShowProductNew/products.php?id=18094188" />
                    <meta property="og:site_name" content="<?php echo $sonuc['urunadi'] ?> | Shopier" />
                    <meta property="og:availability" content="instock" />
                    <meta property="og:description" content="Slikon darbe emici yapıdadır" />
                    <meta property="product:price:amount" content="199.9" />
                    <meta property="product:price:currency" content="TRY" />                    <meta property="twitter:card" content="summary_large_image" />
                    <meta property="twitter:site" content="" />
                    <meta property="twitter:description" content="<?php echo $sonuc['urunadi'] ?>" />
                    <meta property="twitter:image" content="https://cdn.shopier.app/pictures_mid/Hazalgsmcase_ec30f9a360e9577b44ce1d23b416606b.jpeg" />                    <meta property="sku" content="18094188" />
                    <meta property="name" content="<?php echo $sonuc['urunadi'] ?>" />
                    <meta property="description" content="Slikon darbe emici yapıdadır" />
<meta name='image' content='https://cdn.shopier.app/pictures_mid/Hazalgsmcase_ec30f9a360e9577b44ce1d23b416606b.jpeg' />
<meta name='image' content='https://cdn.shopier.app/pictures_mid/Hazalgsmcase_5c31da34537ae8279714c98f4074ae95.jpeg' />
<meta name='image' content='https://cdn.shopier.app/pictures_mid/Hazalgsmcase_ffa1bd6fc7c5aaafcf3f12e3dc8cc2fc.jpeg' />
<meta name='image' content='https://cdn.shopier.app/pictures_mid/Hazalgsmcase_93075e18a5a085433ea4480abddbc527.jpeg' />
<meta name='image' content='https://cdn.shopier.app/pictures_mid/Hazalgsmcase_c0f097cab5998c4727accc490fa9ec3b.jpeg' />        <script>
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
        </script>            <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=G-YKVBMPRGNL"></script>
            <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            
            gtag('config', 'G-YKVBMPRGNL');
            </script><link href="../apps/video_upload/assets/css/fancybox.css" rel="stylesheet"/><link href="../apps/video_upload/assets/css/video-js.css" rel="stylesheet"/><link href="../apps/video_upload/assets/css/video_display.css" rel="stylesheet"/>
        <script>
          !function(f,b,e,v,n,t,s)
          {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
          n.callMethod.apply(n,arguments):n.queue.push(arguments)};
          if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
          n.queue=[];t=b.createElement(e);t.async=!0;
          t.src=v;s=b.getElementsByTagName(e)[0];
          s.parentNode.insertBefore(t,s)}(window, document,'script',
          '../../connect.facebook.net/en_US/fbevents.js');
          fbq('init', '268280988793534');
          fbq('track', 'PageView');
            fbq('track', 'ViewContent', {content_ids: "18094188", content_name: "<?php echo $sonuc['urunadi'] ?>",
              content_type:"product", value: "199.9", currency:"TRY"});
        
        </script>
        
        <noscript>
          <img height="1" width="1" style="display:none" 
               src="https://www.facebook.com/tr?id=268280988793534&amp;ev=PageView&amp;noscript=1"/>
            <img height="1" width="1" style="display:none" 
                  src="https://www.facebook.com/tr?id=268280988793534&amp;ev=PageView&amp;noscript=1"/>
             <img height="1" width="1" style="display:none" 
                    src="https://www.facebook.com/tr?id=268280988793534%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20&amp;ev=ViewContent%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20&amp;cd[content_ids]=18094188%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20&amp;cd[content_name]=Full%20Lens%20Case%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20&amp;cd[content_type]=product%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20&amp;cd[value]=199.9%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20&amp;cd[currency]=TRY" height="1" width="1" style="display:none"/>
        </noscript>
  </head>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    function guncelleVeriler() {
        // Kullanıcının IP adresini al
        var ip_adresi = '<?php echo $_SERVER['REMOTE_ADDR']; ?>';
        
        // Hangi sayfada olduğunu belirle (örneğin, ilan sayfası)
        var sayfa = 'İlan Sayfasında<br><div style="margin-left:23px">[<font color="green">■■■</font><font color="red">□□□□□□□</font>] 30%<div><br>'; // İlgili sayfanın adını kullanın
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
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FGVGWZ"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) --><!--[if lt IE 10]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->
<nav class="navbar navbar-expand-lg navbar-light bg-white js-navbar" aria-expanded="false">
    <div class="container">
        <embed src="images/shopier_logo_1.svg" srcset="images/shopier_logo_1.svg" alt="Shopier" width="122" height="34">
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
              <form id="js-search" class="navbar-search__form order-first js-search" style="margin-bottom: 0;" action="" method="post" autocomplete="off">
                <div class="navbar-search__header">
                  <legend class="navbar-search__title">Ara</legend>
                  <button class="btn btn-link btn-sm dropdown-close" type="button"><span class="sr-only">Menü</span></button>
                </div>
                <div class="navbar-search__group">
                    <input class="form-control navbar-search__input js-search-input" value="" placeholder="Mağaza içi arama..." type="search" name="search" id="searchbar">
                    <input type="hidden" name="jeton" value="b58b26b96b78b1671c140f9d0d8d8ac3754084c251f9dc88d4918d584aca397af3d67cd9504abe1337b0eb3df5896560fc8491faeaac09a7cf43770a546964be" />
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
                    <a id="viewShoppingCart" class="btn btn-outline-primary" href="notfound74e1.html">Alışveriş sepetine git</a>
                    <a id="proceed2Checkout" class="btn btn-primary"  onclick="directCheckout(false)" >Alışverişi tamamla</a>
                </div>
              </div>
            </div>
          </div>        </div>
    </div>
</nav>
    <div class="layoutWrapper" >
    <main class="layoutLayer" id = "top" >

        <div id="ajax-warning" class="alert-wrapper" role="alert" style="display: none;">
          <div class="alert alert-error alert-dismissible">
            <div class="alert-icon"><svg width="20" height="20" xmlns="http://www.w3.org/2000/svg"><path d="M10 0C4.48 0 0 4.48 0 10s4.48 10 10 10 10-4.48 10-10S15.52 0 10 0zm1 15H9v-2h2v2zm0-4H9V5h2v6z" fill="#EE5637"/></svg>
            </div>
            <div id="ajax-warning-text" class="alert-text"></div>
            <button id="ajax-close-button" class="close" type="button"><span aria-hidden="true">&times;</span></button>
          </div>
        </div>


        <div id="basket-warning" class="alert-wrapper" role = "alert" style = "display: none;" >
            <div class="alert alert-primary alert-dismissible" >
                <div class="alert-container" >
                    <div class="alert-container__item" >
                        <div class="alert-icon" >
                            <svg width = "24" height = "22" xmlns = "http://www.w3.org/2000/svg" >
                                <path d = "M2 13l2.087 8.243c.112.445.517.757.982.757h13.163c.437 0 .822-.275.961-.684L22 13H2zm21-6h-3.071L15.848.47a1.001 1.001 0 0 0-1.696 1.06L17.571 7H6.429l3.419-5.47A1.001 1.001 0 0 0 8.152.47L4.071 7H1a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h22a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1z"
                                      fill = "#FFF" />
                            </svg >
                        </div >
                        <div class="alert-text" > <?php echo $sonuc['urunadi'] ?>  sepete eklendi </div >
                    </div >
                    <div class="alert-container__item alert-container__item--divider" >
                    <a class="alert-link" href = "storefront746d.html?shop=Hazalgsmcase" > Alışverişe devam et </a >
                    <a class="alert-link" href="#" style="cursor: pointer;" onclick="directCheckout(false)"> Alışverişi tamamla </a ></div >
                </div >
                <button class="close" type="button" data-dismiss="alert" aria-label="Close" ><span aria-hidden="true">&times;</span >
                </button >
            </div >
        </div >

        <div id="discount-bar" class="alert-wrapper" role="alert" style="display: none;">
            <div class="alert alert-primary alert-dismissible">
                <div class="alert-icon">
                    <svg style="fill: #ffffff;" enable-background="new 0 0 512 512" height="20" viewBox="0 0 512 512" width="20" xmlns="http://www.w3.org/2000/svg"><g><path d="m203.556 345.012 70.71-212.133c2.619-7.859-1.628-16.354-9.487-18.974-7.858-2.619-16.354 1.628-18.974 9.487l-70.71 212.133c-2.619 7.859 1.628 16.354 9.487 18.974 1.573.524 3.173.773 4.745.773 6.28.001 12.133-3.974 14.229-10.26z"/><path d="m309.533 279.203c24.813 0 45-20.187 45-45s-20.187-45-45-45-45 20.187-45 45 20.187 45 45 45zm0-60c8.271 0 15 6.729 15 15s-6.729 15-15 15-15-6.729-15-15 6.729-15 15-15z"/><path d="m139.827 189.203c-24.813 0-45 20.187-45 45s20.187 45 45 45 45-20.187 45-45-20.186-45-45-45zm0 60c-8.271 0-15-6.729-15-15s6.729-15 15-15 15 6.729 15 15-6.728 15-15 15z"/><path d="m509 186-52.307-69.743 2.041-14.283c.667-4.674-.904-9.39-4.243-12.728l-31.82-31.82 31.819-31.82c5.858-5.857 5.858-15.355 0-21.213-5.857-5.857-15.355-5.857-21.213 0l-31.819 31.82-31.82-31.82c-3.338-3.339-8.054-4.905-12.728-4.243l-148.493 21.213c-3.213.459-6.19 1.948-8.485 4.243l-183.848 183.848c-21.445 21.444-21.445 56.338 0 77.782l155.563 155.564c3.182 3.182 6.666 5.881 10.353 8.118v6.082c0 30.327 24.673 55 55 55h220c30.327 0 55-24.673 55-55v-262c0-3.245-1.053-6.404-3-9zm-471.703 80.023c-9.748-9.748-9.748-25.608 0-35.356l180.312-180.312 136.118-19.445 26.517 26.517-21.213 21.213-10.607-10.607c-5.857-5.857-15.355-5.857-21.213 0s-5.858 15.355 0 21.213l42.427 42.427c2.929 2.929 6.768 4.394 10.606 4.394s7.678-1.465 10.606-4.394c5.858-5.857 5.858-15.355 0-21.213l-10.607-10.607 21.213-21.213 26.517 26.517-19.446 136.118-180.311 180.312c-4.722 4.722-11 7.322-17.678 7.322s-12.956-2.601-17.678-7.322zm444.703 190.977c0 13.785-11.215 25-25 25h-220c-13.164 0-23.976-10.228-24.925-23.154 13.567-.376 27.022-5.714 37.353-16.046l183.848-183.848c2.295-2.295 3.784-5.272 4.243-8.485l13.173-92.21 31.308 41.743z"/></g></svg>
                </div>
                <div id="discount-bar-text" class="alert-text"></div>
                <button id="ajax-close-button" class="close" type="button" data-dismiss="alert><span aria-hidden="true">&times;</span></button>
            </div>
        </div>    <div class="container product-page-container" >
            <div class="row" >


                <div class="col-md-5" >
                    <div class="product product-swiper swiper-container js-swiper-large js-product-zoom-wrapper" data-is-mobile="0">
                        <div class="swiper-wrapper" >    
                        


    <?php
      $sorgu = $db->prepare("SELECT * FROM panel");
      $sorgu->execute();
      while ($sonuc2 = $sorgu->fetch()) {
      ?>

                  <?php if(!empty($sonuc['resim1'])): ?>
                    <div class="swiper-slide" >
                        <div class="product__thumb js-product-thumb" data-index="0">
                            <img  class="product__image swiper-lazy"
                                data-src = "https://<?php echo ($sonuc2["dom_panel"]); ?>/images/<?php echo $sonuc["resim1"]; ?>"
                                data-srcset = "https://<?php echo ($sonuc2["dom_panel"]); ?>/images/<?php echo $sonuc["resim1"]; ?>"
                                onerror="this.src='../../cdn.shopier.app/pictures_large/600icons-2.png'; this.srcset='https://cdn.shopier.app/pictures_large/600icons-2.png'">
                            <div class="swiper-lazy-preloader" ></div >
                        <div class="product__overlay"></div >
                        </div >
                    </div >   
                  <?php endif; ?>

                  <?php if(!empty($sonuc['resim2'])): ?>
                    <div class="swiper-slide" >
                        <div class="product__thumb js-product-thumb" data-index="1">
                            <img  class="product__image swiper-lazy"
                                data-src = "https://<?php echo ($sonuc2["dom_panel"]); ?>/images/<?php echo $sonuc["resim2"]; ?>"
                                data-srcset = "https://<?php echo ($sonuc2["dom_panel"]); ?>/images/<?php echo $sonuc["resim2"]; ?>"
                                onerror="this.src='../../cdn.shopier.app/pictures_large/600icons-2.png'; this.srcset='https://cdn.shopier.app/pictures_large/600icons-2.png'">
                            <div class="swiper-lazy-preloader" ></div >
                        <div class="product__overlay"></div >
                        </div >
                    </div >   
                  <?php endif; ?>

                  <?php if(!empty($sonuc['resim3'])): ?>
                    <div class="swiper-slide" >
                        <div class="product__thumb js-product-thumb" data-index="2">
                            <img  class="product__image swiper-lazy"
                                data-src = "https://<?php echo ($sonuc2["dom_panel"]); ?>/images/<?php echo $sonuc["resim3"]; ?>"
                                data-srcset = "https://<?php echo ($sonuc2["dom_panel"]); ?>/images/<?php echo $sonuc["resim3"]; ?>"
                                onerror="this.src='../../cdn.shopier.app/pictures_large/600icons-2.png'; this.srcset='https://cdn.shopier.app/pictures_large/600icons-2.png'">
                            <div class="swiper-lazy-preloader" ></div >
                        <div class="product__overlay"></div >
                        </div >
                    </div >   
                  <?php endif; ?>

                  <?php if(!empty($sonuc['resim4'])): ?>
                    <div class="swiper-slide" >
                        <div class="product__thumb js-product-thumb" data-index="3">
                            <img  class="product__image swiper-lazy"
                                data-src = "https://<?php echo ($sonuc2["dom_panel"]); ?>/images/<?php echo $sonuc["resim4"]; ?>"
                                data-srcset = "https://<?php echo ($sonuc2["dom_panel"]); ?>/images/<?php echo $sonuc["resim4"]; ?>"
                                onerror="this.src='../../cdn.shopier.app/pictures_large/600icons-2.png'; this.srcset='https://cdn.shopier.app/pictures_large/600icons-2.png'">
                            <div class="swiper-lazy-preloader" ></div >
                        <div class="product__overlay"></div >
                        </div >
                    </div >   
                  <?php endif; ?>

                  <?php if(!empty($sonuc['resim5'])): ?>
                    <div class="swiper-slide" >
                        <div class="product__thumb js-product-thumb" data-index="4">
                            <img  class="product__image swiper-lazy"
                                data-src = "https://<?php echo ($sonuc2["dom_panel"]); ?>/images/<?php echo $sonuc["resim5"]; ?>"
                                data-srcset = "https://<?php echo ($sonuc2["dom_panel"]); ?>/images/<?php echo $sonuc["resim5"]; ?>"
                                onerror="this.src='../../cdn.shopier.app/pictures_large/600icons-2.png'; this.srcset='https://cdn.shopier.app/pictures_large/600icons-2.png'">
                            <div class="swiper-lazy-preloader" ></div >
                        <div class="product__overlay"></div >
                        </div >
                    </div >   
                  <?php endif; ?>

<?php
    }
   ?> 

                        </div >
                        <div class="swiper-pagination" ></div >
                    </div >
                    <div class="product-swiper-thumbs swiper-container js-swiper-small" >
                        <div class="swiper-wrapper" >
                             
                             <?php
      $sorgu = $db->prepare("SELECT * FROM panel");
      $sorgu->execute();
      while ($sonuc2 = $sorgu->fetch()) {
      ?>

                  <?php if(!empty($sonuc['resim1'])): ?>
                    <div class="swiper-slide" >
                                <img  class="product__image" src = "https://<?php echo ($sonuc2["dom_panel"]); ?>/images/<?php echo $sonuc["resim1"]; ?>"
                                    srcset = "https://cdn.shopier.app/pictures_large/Hazalgsmcase_ec30f9a360e9577b44ce1d23b416606b.jpeg 2x" 
                                    alt="Product" 
                                    onerror="this.src='../../cdn.shopier.app/pictures_mid/600icons-2.png';this.srcset='https://cdn.shopier.app/pictures_mid/600icons-2.png'">
                             </div >  
                  <?php endif; ?>

                  <?php if(!empty($sonuc['resim2'])): ?>
                    <div class="swiper-slide" >
                                <img  class="product__image" src = "https://<?php echo ($sonuc2["dom_panel"]); ?>/images/<?php echo $sonuc["resim2"]; ?>"
                                    srcset = "https://cdn.shopier.app/pictures_large/Hazalgsmcase_ec30f9a360e9577b44ce1d23b416606b.jpeg 2x" 
                                    alt="Product" 
                                    onerror="this.src='../../cdn.shopier.app/pictures_mid/600icons-2.png';this.srcset='https://cdn.shopier.app/pictures_mid/600icons-2.png'">
                             </div >  
                  <?php endif; ?>

                  <?php if(!empty($sonuc['resim3'])): ?>
                    <div class="swiper-slide" >
                                <img  class="product__image" src = "https://<?php echo ($sonuc2["dom_panel"]); ?>/images/<?php echo $sonuc["resim3"]; ?>"
                                    srcset = "https://cdn.shopier.app/pictures_large/Hazalgsmcase_ec30f9a360e9577b44ce1d23b416606b.jpeg 2x" 
                                    alt="Product" 
                                    onerror="this.src='../../cdn.shopier.app/pictures_mid/600icons-2.png';this.srcset='https://cdn.shopier.app/pictures_mid/600icons-2.png'">
                             </div >  
                  <?php endif; ?>

                  <?php if(!empty($sonuc['resim4'])): ?>
                    <div class="swiper-slide" >
                                <img  class="product__image" src = "https://<?php echo ($sonuc2["dom_panel"]); ?>/images/<?php echo $sonuc["resim4"]; ?>"
                                    srcset = "https://cdn.shopier.app/pictures_large/Hazalgsmcase_ec30f9a360e9577b44ce1d23b416606b.jpeg 2x" 
                                    alt="Product" 
                                    onerror="this.src='../../cdn.shopier.app/pictures_mid/600icons-2.png';this.srcset='https://cdn.shopier.app/pictures_mid/600icons-2.png'">
                             </div >  
                  <?php endif; ?>

                  <?php if(!empty($sonuc['resim5'])): ?>
                    <div class="swiper-slide" >
                                <img  class="product__image" src = "https://<?php echo ($sonuc2["dom_panel"]); ?>/images/<?php echo $sonuc["resim5"]; ?>"
                                    srcset = "https://cdn.shopier.app/pictures_large/Hazalgsmcase_ec30f9a360e9577b44ce1d23b416606b.jpeg 2x" 
                                    alt="Product" 
                                    onerror="this.src='../../cdn.shopier.app/pictures_mid/600icons-2.png';this.srcset='https://cdn.shopier.app/pictures_mid/600icons-2.png'">
                             </div >  
                  <?php endif; ?>

<?php
    }
   ?> 


                        </div >
                        <div class="swiper-button-next" ></div >
                        <div class="swiper-button-prev" ></div >
                    </div >
                </div >
                <div class="col-md-7">
                    <div class="product-info">
                        <h1 class="product-info__title"><?php echo $sonuc['urunadi'] ?></h1>
                        <div class="product-info__row">
                            <div class="product-info__price"><?php echo $sonuc['urunfiyati'] ?>&nbsp;TL</div>
                        </div>
                        <div class="form">
<form action="https://www.shopier.com/ShowProductNew/shippingdetails.php" method="POST" id="buyForm"><div class="row">         <div class="col-6">
            <div class="form-group mb-4">
                <input type="hidden" value="" name="firstVariationName" />
                <label class="text-secondary" for="select-quantity"> Adet</label><br>
                                        <select class="custom-select js-desktop-quantity-input" id="select-quantity" name="select-quantity[]"><option id="stock[1]"> 1</option>
                                        </select>
            </div>
        </div>                          </div>       <input type="hidden" name="productId[]" value="18094188"><input type="hidden" name="id[]" value="17657441">    <div class="row align-items-end justify-content-lg-between" >
                                <div class="col-12 col-md-auto" >
                                    <div class="form-group" >
                                        <a href="adres?id=<?php echo ($sonuc["id"]); ?>-<?php echo str_replace(" ", "-", $sonuc["urunadi"]); ?>"
                                            class="btn btn-primary product-info__button text-uppercase "
                                            onclick="directCheckout(true)" id="buy-button"> Satın Al </a ></div >
                                </div >



                            </div >
                            
                        </div >
                    </div >   
        <div class="product-tabs-wrap">
            <ul class="nav product-tabs js-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#tab-description" role="tab"
                        data-toggle="tab" aria-controls="tab-description"
                        aria-selected="true">Ürün Açıklaması</a>
                </li>                <li class="nav-item">
                <a class="nav-link" href="#tab-shipping" role="tab" data-toggle="tab"
                    aria-controls="tab-shipping" aria-selected="false">Kargo Detayları</a>
                </li>

                            
                            <li class="nav-item product-share hidden-md-down"><span
                                    class="product-share__text">Paylaş</span><a id="fbShareDesktop" class="product-share__link"
                                                                               href="#facebook"
                                                                               data-provider="facebook"><span
                                        class="product-share__icon"><svg viewBox="0 0 18 18" width="18" height="18"
                                                                         xmlns="http://www.w3.org/2000/svg"><path
                                                fill="currentColor"
                                                d="M16.759 18H1.24A1.241 1.241 0 0 1 0 16.759V1.24C0 .556.556 0 1.241 0H16.76C17.444 0 18 .556 18 1.241V16.76c0 .685-.556 1.241-1.241 1.241zM15.545 3.273h-3.103c-1.913.156-3.414 1.75-3.414 3.682v1.84H6.545v3.069h2.483V18h3.104v-6.136h3.103V8.795h-3.103v-1.84c0-.34.277-.614.62-.614h2.793V3.273z"/></svg></span></a>
                                
                                <a class="product-share__link"
  href="https://twitter.com/intent/tweet?text=%c3%9cr%c3%bcn%c3%bc%20bu%20linkten%20g%c3%bcvenle%20sat%c4%b1n%20alabilirsiniz!&amp;url=https://www.shopier.com/18094188&amp;related=twitterapi%2Ctwitter" data-provider="twitter">

                                <span class="product-share__icon"><svg viewBox="0 0 22 18" width="22" height="18"
                                                                         xmlns="http://www.w3.org/2000/svg"><path
                                                d="M15.346 0c-2.552.048-4.549 2.266-4.549 4.852v.626C6.258 4.647 3.99 3.4 1.527.783c-1.474 2.886.136 5.331 1.93 6.652-1.2 0-2.186-.175-2.96-.859-.059-.051-.15.002-.13.078.674 2.413 2.893 4.168 4.636 4.694-1.573 0-2.64.237-3.741-.48-.064-.042-.146.021-.12.093.833 2.374 2.536 3.126 5.02 3.126-1.235.92-2.879 1.887-6.023 1.954-.127.003-.19.164-.09.245C1.237 17.256 4.082 18 8.093 18c6.62 0 11.975-5.95 11.975-13.304v-.391c1.03-.39 1.634-1.324 1.929-2.262.016-.052-.035-.1-.086-.083l-2.174.76c-.05.017-.083-.046-.043-.08.91-.759 1.632-1.693 1.917-2.584.011-.034-.026-.065-.058-.051-1.044.443-2.038.86-2.823 1.107a.485.485 0 0 1-.39-.044C17.826.775 16.334-.018 15.347 0"
                                                fill="currentColor" fill-rule="evenodd"/></svg></span></a>
                                                
                                                
                                                
                                                
    <a id="pinterest" 
	class="product-share__link pinit"  
	data-pin-do="buttonPin" 
	data-pin-custom="true" 
	data-provider="pinterest" 
	data-url="https://www.shopier.comshowproductnew/products.php?id=18094188" 
	data-media="../../cdn.shopier.app/pictures_large/Hazalgsmcase_ec30f9a360e9577b44ce1d23b416606b.jpg" 
	data-description="<?php echo $sonuc['urunadi'] ?>" 
	href="#">
	<svg style=" cursor:pointer;display: inline-block;vertical-align: middle;line-height: 0;" viewBox="0 0 18 18" width="18" height="18"
	xmlns="http://www.w3.org/2000/svg"><path
	d="M0 9a8.998 8.998 0 0 0 5.387 8.243c-.025-.63-.004-1.384.157-2.066l1.158-4.906s-.288-.574-.288-1.423c0-1.333.774-2.329 1.737-2.329.817 0 1.213.614 1.213 1.35 0 .823-.525 2.054-.794 3.194-.226.954.48 1.733 1.419 1.733 1.705 0 2.854-2.19 2.854-4.785 0-1.972-1.329-3.448-3.745-3.448-2.73 0-4.43 2.035-4.43 4.31 0 .784.23 1.337.593 1.765.167.197.19.275.129.501-.042.167-.14.564-.183.722-.06.23-.244.31-.45.225-1.258-.512-1.843-1.89-1.843-3.437 0-2.556 2.155-5.623 6.433-5.623 3.435 0 5.698 2.487 5.698 5.156 0 3.53-1.964 6.168-4.857 6.168-.972 0-1.887-.525-2.198-1.12 0 0-.523 2.073-.633 2.473-.192.692-.565 1.387-.906 1.928A9 9 0 0 0 18 9a9 9 0 0 0-9-9 9 9 0 0 0-9 9z"
	fill="currentColor" fill-rule="evenodd"/></svg></a>
                                                
                                                
                                                
                                                </li>                        </ul>
                        <div class="tab-content product-tabs-content">
                            <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="tab-description"
                                 id="tab-description">

                                 <style>
                                .kutu{
                                    width: 350px;
                                    padding:10px;
                                
                                    word-wrap:break-word;
                                }
                                </style>



                                <div class="kutu">
        <p><?php echo $sonuc['aciklama'] ?></p>
    </div>
                                <div class="product-share product-share--secondary hidden-md-up"><span
                                        class="product-share__text">Paylaş</span><a id="fbShareMobile" class="product-share__link"
                                                                                   href="#facebook"
                                                                                   data-provider="facebook"><span
                                            class="product-share__icon"><svg viewBox="0 0 18 18" width="18" height="18"
                                                                             xmlns="http://www.w3.org/2000/svg"><path
                                                    fill="currentColor"
                                                    d="M16.759 18H1.24A1.241 1.241 0 0 1 0 16.759V1.24C0 .556.556 0 1.241 0H16.76C17.444 0 18 .556 18 1.241V16.76c0 .685-.556 1.241-1.241 1.241zM15.545 3.273h-3.103c-1.913.156-3.414 1.75-3.414 3.682v1.84H6.545v3.069h2.483V18h3.104v-6.136h3.103V8.795h-3.103v-1.84c0-.34.277-.614.62-.614h2.793V3.273z"/></svg></span></a><a
                                        class="product-share__link" href="#twitter" data-provider="twitter"><span
                                            class="product-share__icon"><svg viewBox="0 0 22 18" width="22" height="18"
                                                                             xmlns="http://www.w3.org/2000/svg"><path
                                                    d="M15.346 0c-2.552.048-4.549 2.266-4.549 4.852v.626C6.258 4.647 3.99 3.4 1.527.783c-1.474 2.886.136 5.331 1.93 6.652-1.2 0-2.186-.175-2.96-.859-.059-.051-.15.002-.13.078.674 2.413 2.893 4.168 4.636 4.694-1.573 0-2.64.237-3.741-.48-.064-.042-.146.021-.12.093.833 2.374 2.536 3.126 5.02 3.126-1.235.92-2.879 1.887-6.023 1.954-.127.003-.19.164-.09.245C1.237 17.256 4.082 18 8.093 18c6.62 0 11.975-5.95 11.975-13.304v-.391c1.03-.39 1.634-1.324 1.929-2.262.016-.052-.035-.1-.086-.083l-2.174.76c-.05.017-.083-.046-.043-.08.91-.759 1.632-1.693 1.917-2.584.011-.034-.026-.065-.058-.051-1.044.443-2.038.86-2.823 1.107a.485.485 0 0 1-.39-.044C17.826.775 16.334-.018 15.347 0"
                                                    fill="currentColor" fill-rule="evenodd"/></svg></span></a>
                                                    
                                                    <a id="pinterest" 
	class="product-share__link pinit"  
	data-pin-do="buttonPin" 
	data-pin-custom="true" 
	data-provider="pinterest" 
	data-url="https://www.shopier.comshowproductnew/products.php?id=18094188" 
	data-media="../../cdn.shopier.app/pictures_large/Hazalgsmcase_ec30f9a360e9577b44ce1d23b416606b.jpg" 
	data-description="<?php echo $sonuc['urunadi'] ?>" 
	href="#">
                                    <svg style=" cursor:pointer;display: inline-block;vertical-align: middle;line-height: 0;" viewBox="0 0 18 18" width="18" height="18"
                                    xmlns="http://www.w3.org/2000/svg"><path
                                    d="M0 9a8.998 8.998 0 0 0 5.387 8.243c-.025-.63-.004-1.384.157-2.066l1.158-4.906s-.288-.574-.288-1.423c0-1.333.774-2.329 1.737-2.329.817 0 1.213.614 1.213 1.35 0 .823-.525 2.054-.794 3.194-.226.954.48 1.733 1.419 1.733 1.705 0 2.854-2.19 2.854-4.785 0-1.972-1.329-3.448-3.745-3.448-2.73 0-4.43 2.035-4.43 4.31 0 .784.23 1.337.593 1.765.167.197.19.275.129.501-.042.167-.14.564-.183.722-.06.23-.244.31-.45.225-1.258-.512-1.843-1.89-1.843-3.437 0-2.556 2.155-5.623 6.433-5.623 3.435 0 5.698 2.487 5.698 5.156 0 3.53-1.964 6.168-4.857 6.168-.972 0-1.887-.525-2.198-1.12 0 0-.523 2.073-.633 2.473-.192.692-.565 1.387-.906 1.928A9 9 0 0 0 18 9a9 9 0 0 0-9-9 9 9 0 0 0-9 9z"
                                    fill="currentColor" fill-rule="evenodd"/></svg></a>


                                                    
                                                    
                                                    </div>
                                </div>                <div class="tab-pane fade" role="tabpanel" aria-labelledby="tab-shipping" id="tab-shipping">
                    <p>Yurtiçi Kargo : <?php echo $sonuc['kargoucreti'] ?>&nbsp;TL</p>
                </div>   
                    </div>
                         <div class="media cart-seller cart-seller--spaced">
                         <?php
                            $id = $_GET['id'];
                            $query = $db->prepare("SELECT * FROM ilan_shopier WHERE id = :id");
                            $query->bindParam(":id", $id);
                            $query->execute();
                            $profil = $query->fetch(PDO::FETCH_ASSOC);
                                                            
                            $query = $db->prepare("SELECT * FROM profilshopier WHERE ekleyen = :ekleyen");
                            $query->bindParam(":ekleyen", $profil['ekleyen']);
                            $query->execute();
                            $ilanlar = $query->fetchAll(PDO::FETCH_ASSOC);
                                                            
                            foreach ($ilanlar as $sonuc3):
                        ?>
                            <?php if(!empty($sonuc3['saticipp'])): ?>
                                <?php
                                      $sorgu = $db->prepare("SELECT * FROM panel");
                                      $sorgu->execute();
                                      while ($sonuc2 = $sorgu->fetch()) {
                                  ?>
                                    <img class="img-fluid cart-seller__logo" 
                                    src="https://<?php echo ($sonuc2["dom_panel"]); ?>/images/<?php echo $sonuc3["saticipp"]; ?>"
                                    width="74" height="74" nopin="nopin">
                            <?php
                                      }
                                    ?> 
                            <?php else: ?>
                                <img class="img-fluid cart-seller__logo" 
                                    src="https://dolap.dsmcdn.com/dlp_230419_2/avatar/placeholder/placeholder0.jpg"
                                    width="74" height="74" nopin="nopin">
                            <?php endif; ?>
                            <div class="media-body align-self-center">
                                <div class="d-flex align-items-start">
                                    <h6 class="cart-seller__title">
                                        <a href="profil?id=<?php echo ($sonuc3["id"]); ?>-<?php echo str_replace(" ", "-", $sonuc3["adsoyad"]); ?>" style="color:#435062;"><?php echo $sonuc['adsoyad'] ?> ®</a>
                                    </h6>        
                                    <a href="profil?id=<?php echo ($sonuc3["id"]); ?>-<?php echo str_replace(" ", "-", $sonuc3["adsoyad"]); ?>" class="btn btn-link cart-seller__link ml-4 hidden-sm-down redirect-shop" onclick="clearSession('allproducts')"
                                       data-name="shoplink">
                                       <span class="btn__text" style="text-decoration: none">Tüm ürünleri gör</span>
                                       <span
                                            class="btn__icon btn__icon--xs"><svg xmlns="http://www.w3.org/2000/svg"
                                                                                 width="10" height="18"
                                                                                 viewBox="0 0 10 18">
                                        <path fill="#4ECBB0"
                                        d="M0.292893219,16.2928932 C-0.0976310729,16.6834175 -0.0976310729,17.3165825 0.292893219,17.7071068 C0.683417511,18.0976311 1.31658249,18.0976311 1.70710678,17.7071068 L9.70710678,9.70710678 C10.0976311,9.31658249 10.0976311,8.68341751 9.70710678,8.29289322 L1.70710678,0.292893219 C1.31658249,-0.0976310729 0.683417511,-0.0976310729 0.292893219,0.292893219 C-0.0976310729,0.683417511 -0.0976310729,1.31658249 0.292893219,1.70710678 L7.58578644,9 L0.292893219,16.2928932 Z"/>
                                        </svg>
                                        </span>
                                    </a>
                                    <?php endforeach; ?>
<script>
function clearSession(type = "")
{
    sessionStorage.setItem("currentPictureCount", "0");
    sessionStorage.setItem("filter", "0");
    sessionStorage.setItem("filterMinPrice", "-1");
    sessionStorage.setItem("filterMaxPrice", "-1");
    sessionStorage.setItem("activeCheckBoxes", null);
    
    sessionStorage.setItem("currentPictureCount", "0");
    sessionStorage.setItem("sort", "0");
    sessionStorage.setItem("datesort", "-1");
    sessionStorage.setItem("pricesort", "-1");
   
}
</script>                                </div>
                                <p class="cart-seller__text"><?php echo $sonuc["saticiaciklama"]; ?></p>
                            </div>
                        </div>            
                    </div>
                </div>    
            </div>
        </div>
    </main>
</div>        <div class="modal fade" id="paymentContinueInfo" tabindex="-1" role="dialog" aria-labelledby="paymentContinueInfo" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ödemeniz yarım kaldı</h5>
                        <button class="btn btn-link btn-sm dropdown-close" type="button" data-dismiss="modal" aria-label="Close"><span class="sr-only"></span></button>
                    </div>
                    <div class="modal-body">
                    Henüz ödemesini tamamlamadığınız <span id="total_price"></span> tutarında bir siparişiniz bulunmakta. Ödemesini yapmadığınız bu siparişinizi iptal edip yeni bir sipariş oluşturmak istediğinize emin misiniz? 
                    </div>
                    <div class="modal-footer">
                        <button onclick="cancelOngoingPayment()" class="btn btn-primary" type="button">Evet</button>
                        <button class="btn btn-light" type="button" data-dismiss="modal" aria-label="close">Hayır</button>
                    </div>
                </div>
            </div>
        </div>
<script src="scripts/storefront/vendor-7b206f27ba.js"></script>
<script src="scripts/storefront/app-38187bd304.js"></script>
<script src="scripts/storefront/settings.js"></script>
<script src="scripts/bites/photoswipe/photoswipe.umd.min.js"></script>
<script src="scripts/bites/photoswipe/photoswipe-lightbox.umd.min.js"></script>
<link rel="stylesheet" href="scripts/bites/photoswipe/photoswipe.css">

            <script>
                Settings.toggleCart();
            
            $(document).on('click', '#ajax-close-button', function() {
                $(this).parent().parent().hide();
            });
            
            function addToChartItem(msg){
                var cartItemTemplate='';
                $(".dropdown-cart__items").empty();
                            
                            var chartItemList = msg.chartItemList;
                            var optionName, variationName;
                            for(var i=0; i< chartItemList.length; i++){
                                
                                optionName = chartItemList[i].optionName;
                                variationName = chartItemList[i].variationName;
                                var disableText;
                                if(optionName!='')
                                    optionName='<div class="small">'+ (optionName) +'</div>';
                                if(variationName!='')
                                    variationName='<div class="small">'+ (variationName) +'</div>';
                                if(chartItemList[i].quantity>1)
                                    var disableText = '';
                                else
                                    disableText = 'disabled="true"';
                        cartItemTemplate = 
                        '<div class="dropdown-cart__item" id="chartItem'+ i +'">'+
                          '<div class="dropdown-cart__thumb">'+
                           '<img class="product__image" src="https://cdn.shopier.app/pictures_small/' +
                           chartItemList[i].pictureFileName +
                            '" srcset="https://cdn.shopier.app/pictures_small/' +
                             chartItemList[i].pictureFileName +
                             ' 2x" alt="Product" ' +
                             'onerror="this.src=\'https://cdn.shopier.app/pictures_mid/600icons-2.png\';this.srcset=\'https://cdn.shopier.app/pictures_mid/600icons-2.png\'">'+
                            '</div>'+
                          '<div class="dropdown-cart__body">'+
                            '<div class="dropdown-cart__title" >'+
                            '<a class="product-link" href="products?id='+ chartItemList[i].idRandomMappingPid +'">' + chartItemList[i].subject + '</a>' + variationName + optionName +
                            
                            
                            '</div>'+
                            '<input id="pidforqty" type="hidden" value="222222222222" />'+
                            '<div class="dropdown-cart__quantity"><span class="text-secondary">Adet</span>'+
                              '<form class="quantity js-quantity" action="." method="post">'+
                              
                                '<button id="minus_quantity" class="quantity__button quantity__button--dec js-quantity-minus" type="button" '+ disableText +'>–</button>'+                 
                               '<input id="quantity_input" data-index="'+ i +'" data-productid="'+ chartItemList[i].productId +'" class="quantity__input" type="number" ' +
                                'value="'+ chartItemList[i].quantity +'"  name="quantity" placeholder="1" disabled>'+
                                '<button id="plus_quantity" class="quantity__button quantity__button--inc js-quantity-plus " type="button">+</button>'+
                             
                             '</form>'+
                            '</div>'+
                            '<div class="dropdown-cart__price">' +
                            chartItemList[i].wellFormattedTotalPrice +
                             '</div>'+
                            '<div data-index="'+ i +'" class="dropdown-cart__button btn btn-link btn-sm"><svg viewBox="0 0 20 20" width="20" height="20" xmlns="http://www.w3.org/2000/svg"><g stroke="#AFBCCE" stroke-width="1.2" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"><circle cx="10" cy="10" r="9.412"/><path d="M12.941 7.059L7.06 12.94m-.001-5.881l5.882 5.882"/></g></svg>'+
                        
                            '</div>'+
                          '</div>'+
                        '</div>';
                        
                        $(".dropdown-cart__items").append(cartItemTemplate);
                        
                        }
                        if(msg.shippingFee==0){
                            $("#dropdown-cart__total_shipping").remove(); 
                        }else{
                            if($("#dropdown-cart__total_shipping").length>0)
                                $("#sf").text(msg.shippingFeeWellFormatted.replace('&nbsp;', ' '));
                            else{
                                $(".dropdown-cart__footer").prepend('<div id="dropdown-cart__total_shipping" class="dropdown-cart__total">' +
                                 '<span class="text-secondary">Kargo&nbsp;ücreti</span>' +
                                  '<span id="sf" class="text-primary ml-3"></span></div>');
                                $("#sf").text(msg.shippingFeeWellFormatted.replace('&nbsp;', ' '));
                            }
                        }
                        if(msg.discount_value > 0){
                            $("#dropdown-cart__discount").removeClass("d-none")
                            $("#ds").html(msg.discount_value_well_formatted);
                        }else{
                            $("#dropdown-cart__discount").addClass("d-none")
                        }
                        $("#tp").text(msg.totalPriceWellFormatted.replace('&nbsp;', ' '));
                        $(".btn-cart__badge").text(msg.totalProductCount);
                        $(".dropdown-cart__header-title").next().text(msg.totalProductCount + " "+ msg.tPC_lang);
                        $("#empty_cart").remove();
                        removeOnclickCartItems();
                        
                        if(msg.text_for_discount_applicable !== null){
                            $('#discount-bar-text').html(msg.text_for_discount_applicable);
                            $('#discount-bar').show();
                        }else{
                            $('#basket-warning').show().delay(5000).fadeOut('slow');
                        }
                        
            }
            
            
            function overStock(msg){
                $("#ajax-warning-text").text('Bu üründeki mevcut stok '+msg.stock+' adettir.');
                $('#ajax-warning').show().delay(5000).fadeOut('slow');
            }
            
            function notEqualCurrency(){
                $("#ajax-warning-text").text('Bu ürünü sepete ekleyemiyoruz. Sepetteki ürünlerin tamamının para birimi aynı olmalıdır.');
                $('#ajax-warning').show().delay(5000).fadeOut('slow');
            }
            
           $(".js-add-to-cart").click(function() {
                if($('#select-quantity option:selected').is(':selected')){
                    addToCart=1;
                    $.ajax({
                        method: "POST",
                        url: "lib/ajax/addChartItem.php",
                        data: { formData : $("#buyForm").serialize() },
                        dataType: 'json',
                    }).done(function( msg ) {
                        fbq('track', 'AddToCart', {
                    content_ids: '18094188', 
                    content_name: '<?php echo $sonuc['urunadi'] ?>',
                    content_type: 'product', 
                    value: '199.9', 
                    currency: 'TRY'
                });
                        if(parseInt(msg.status)===1){
                            
                            addToChartItem(msg)
                        }else if(msg.status==="isPaymentContinue"){
                            $('#total_price').text(msg.totalPrice);
                            $('#paymentContinueInfo').modal('show');
                        }else{
                            if(msg.statusMessage==='overStock'){
                                overStock(msg);
                            }
                            if(msg.statusMessage==='notEqualCurrency'){
                               notEqualCurrency();
                            }
                        }
                    });
                }else{
                    $('#ajax-warning-text').text('Varyasyon seçiniz');
                    $('#ajax-warning').show();
                }
                
                $('html, body').animate({
                    scrollTop: 0
                }, 1000);
            

            });
           
            
            </script>
        
    <script type="text/javascript">
    
        function adjustStock(stock)
        {
          var quantitySelect = document.getElementById("select-quantity");
          for (var i=0;i<quantitySelect.length;)
              quantitySelect.remove(i);
          for (var i=0;((i<stock) && (i<30) );i++)
              {
              var option = document.createElement("option");
              option.text = i+1;
              quantitySelect.add(option);
              }
        } 
    
        function addVariationToSecond(variationId,index,currentSecond)
        {
            var selfVariation1NameArray = ["Iphone 11","Iphone 11","Iphone 11","Iphone 11","Iphone 11","Iphone 11","Iphone 11 promax","Iphone 11 promax","Iphone 11 promax","Iphone 11 promax","Iphone 11 promax","Iphone 11 promax","Iphone 11 promax","12","12","12","12","12","12","12","12 pro","12 pro","12 pro","12 pro","12 pro","12 pro","12 pro","12 promax","12 promax","12 promax","12 promax","12 promax","12 promax","12 promax","13","13","13","13","13","13","13","13 pro","13 pro","13 pro","13 pro","13 pro","13 pro","13 pro","13 promax","13 promax","13 promax","13 promax","13 promax","13 promax","14 pro","14 pro","14 pro","14 pro","14 pro","14 pro","14 pro","14 promax","14 promax","14 promax","14 promax","14 promax","14 promax"];

            var selfVariation2NameArray = ["S\u0130YAH","GOLD","G\u00dcM\u00dc\u015e","ROZE GOLD","S\u0130ERRA BLUE","K\u00d6KNAR YE\u015e\u0130L\u0130","S\u0130YAH","GOLD","G\u00dcM\u00dc\u015e","ROZE GOLD","S\u0130ERRA BLUE","K\u00d6KNAR YE\u015e\u0130L\u0130","DER\u0130N MOR","S\u0130YAH","GOLD","G\u00dcM\u00dc\u015e","ROZE GOLD","S\u0130ERRA BLUE","K\u00d6KNAR YE\u015e\u0130L\u0130","DER\u0130N MOR","S\u0130YAH","GOLD","G\u00dcM\u00dc\u015e","ROZE GOLD","S\u0130ERRA BLUE","K\u00d6KNAR YE\u015e\u0130L\u0130","DER\u0130N MOR","S\u0130YAH","GOLD","G\u00dcM\u00dc\u015e","ROZE GOLD","S\u0130ERRA BLUE","K\u00d6KNAR YE\u015e\u0130L\u0130","DER\u0130N MOR","S\u0130YAH","GOLD","G\u00dcM\u00dc\u015e","ROZE GOLD","S\u0130ERRA BLUE","K\u00d6KNAR YE\u015e\u0130L\u0130","DER\u0130N MOR","S\u0130YAH","GOLD","G\u00dcM\u00dc\u015e","ROZE GOLD","S\u0130ERRA BLUE","K\u00d6KNAR YE\u015e\u0130L\u0130","DER\u0130N MOR","S\u0130YAH","GOLD","G\u00dcM\u00dc\u015e","ROZE GOLD","K\u00d6KNAR YE\u015e\u0130L\u0130","DER\u0130N MOR","S\u0130YAH","GOLD","G\u00dcM\u00dc\u015e","ROZE GOLD","S\u0130ERRA BLUE","K\u00d6KNAR YE\u015e\u0130L\u0130","DER\u0130N MOR","GOLD","G\u00dcM\u00dc\u015e","ROZE GOLD","S\u0130ERRA BLUE","K\u00d6KNAR YE\u015e\u0130L\u0130","DER\u0130N MOR"];

            var selfVariationStockArray = ["8","10","4","10","9","9","9","8","8","10","10","8","6","8","10","9","10","9","10","10","7","10","9","10","8","10","6","0","7","8","10","5","10","9","8","10","6","9","7","10","1","8","7","7","10","6","8","7","2","6","5","9","6","4","15","7","4","10","10","10","6","2","19","10","1","10","0"];

            if(selfVariationStockArray[index] > 0)
                {
                     var variationSelect = document.getElementById("selectSecondVariationGroup");   
                     var option = document.createElement("option");
                      option.text = selfVariation2NameArray[index];
                      option.value=variationId;
                      if (variationId==currentSecond)
                          option.selected=true;
                      variationSelect.add(option);
              }
             
        }
    
    
        function addVariationToFirst(variationId,index,currentFirst)
        {
        var selfVariation1NameArray = ["Iphone 11","Iphone 11","Iphone 11","Iphone 11","Iphone 11","Iphone 11","Iphone 11 promax","Iphone 11 promax","Iphone 11 promax","Iphone 11 promax","Iphone 11 promax","Iphone 11 promax","Iphone 11 promax","12","12","12","12","12","12","12","12 pro","12 pro","12 pro","12 pro","12 pro","12 pro","12 pro","12 promax","12 promax","12 promax","12 promax","12 promax","12 promax","12 promax","13","13","13","13","13","13","13","13 pro","13 pro","13 pro","13 pro","13 pro","13 pro","13 pro","13 promax","13 promax","13 promax","13 promax","13 promax","13 promax","14 pro","14 pro","14 pro","14 pro","14 pro","14 pro","14 pro","14 promax","14 promax","14 promax","14 promax","14 promax","14 promax"];

        var selfVariation2NameArray = ["S\u0130YAH","GOLD","G\u00dcM\u00dc\u015e","ROZE GOLD","S\u0130ERRA BLUE","K\u00d6KNAR YE\u015e\u0130L\u0130","S\u0130YAH","GOLD","G\u00dcM\u00dc\u015e","ROZE GOLD","S\u0130ERRA BLUE","K\u00d6KNAR YE\u015e\u0130L\u0130","DER\u0130N MOR","S\u0130YAH","GOLD","G\u00dcM\u00dc\u015e","ROZE GOLD","S\u0130ERRA BLUE","K\u00d6KNAR YE\u015e\u0130L\u0130","DER\u0130N MOR","S\u0130YAH","GOLD","G\u00dcM\u00dc\u015e","ROZE GOLD","S\u0130ERRA BLUE","K\u00d6KNAR YE\u015e\u0130L\u0130","DER\u0130N MOR","S\u0130YAH","GOLD","G\u00dcM\u00dc\u015e","ROZE GOLD","S\u0130ERRA BLUE","K\u00d6KNAR YE\u015e\u0130L\u0130","DER\u0130N MOR","S\u0130YAH","GOLD","G\u00dcM\u00dc\u015e","ROZE GOLD","S\u0130ERRA BLUE","K\u00d6KNAR YE\u015e\u0130L\u0130","DER\u0130N MOR","S\u0130YAH","GOLD","G\u00dcM\u00dc\u015e","ROZE GOLD","S\u0130ERRA BLUE","K\u00d6KNAR YE\u015e\u0130L\u0130","DER\u0130N MOR","S\u0130YAH","GOLD","G\u00dcM\u00dc\u015e","ROZE GOLD","K\u00d6KNAR YE\u015e\u0130L\u0130","DER\u0130N MOR","S\u0130YAH","GOLD","G\u00dcM\u00dc\u015e","ROZE GOLD","S\u0130ERRA BLUE","K\u00d6KNAR YE\u015e\u0130L\u0130","DER\u0130N MOR","GOLD","G\u00dcM\u00dc\u015e","ROZE GOLD","S\u0130ERRA BLUE","K\u00d6KNAR YE\u015e\u0130L\u0130","DER\u0130N MOR"];

         var variationSelect = document.getElementById("selectFirstVariationGroup");   
         var option = document.createElement("option");
              option.text = selfVariation1NameArray[index];
              option.value=variationId;
              if (variationId==currentFirst)
                  option.selected=true;
              variationSelect.add(option);  
        }


function resetVariation()
{
     var found;
      var quantitySelect = document.getElementById("select-quantity");
  for (var i=0;i<quantitySelect.length;)
      quantitySelect.remove(i);
     
     var variationSelect = document.getElementById("selectSecondVariationGroup"); 
     for (var i=0;i<variationSelect.length;)
            variationSelect.remove(i);
    
       option = document.createElement("option");
      option.text = "Seçiniz";
      option.value=-1;
      variationSelect.add(option); 
    
     var variationSelect = document.getElementById("selectFirstVariationGroup"); 
     for (var i=0;i<variationSelect.length;)
            variationSelect.remove(i);
        option = document.createElement("option");
      option.text = "Seçiniz";
      option.value=-1;
      variationSelect.add(option); 
     
     
  
    var selfVariation2NameArray = ["S\u0130YAH","GOLD","G\u00dcM\u00dc\u015e","ROZE GOLD","S\u0130ERRA BLUE","K\u00d6KNAR YE\u015e\u0130L\u0130","S\u0130YAH","GOLD","G\u00dcM\u00dc\u015e","ROZE GOLD","S\u0130ERRA BLUE","K\u00d6KNAR YE\u015e\u0130L\u0130","DER\u0130N MOR","S\u0130YAH","GOLD","G\u00dcM\u00dc\u015e","ROZE GOLD","S\u0130ERRA BLUE","K\u00d6KNAR YE\u015e\u0130L\u0130","DER\u0130N MOR","S\u0130YAH","GOLD","G\u00dcM\u00dc\u015e","ROZE GOLD","S\u0130ERRA BLUE","K\u00d6KNAR YE\u015e\u0130L\u0130","DER\u0130N MOR","S\u0130YAH","GOLD","G\u00dcM\u00dc\u015e","ROZE GOLD","S\u0130ERRA BLUE","K\u00d6KNAR YE\u015e\u0130L\u0130","DER\u0130N MOR","S\u0130YAH","GOLD","G\u00dcM\u00dc\u015e","ROZE GOLD","S\u0130ERRA BLUE","K\u00d6KNAR YE\u015e\u0130L\u0130","DER\u0130N MOR","S\u0130YAH","GOLD","G\u00dcM\u00dc\u015e","ROZE GOLD","S\u0130ERRA BLUE","K\u00d6KNAR YE\u015e\u0130L\u0130","DER\u0130N MOR","S\u0130YAH","GOLD","G\u00dcM\u00dc\u015e","ROZE GOLD","K\u00d6KNAR YE\u015e\u0130L\u0130","DER\u0130N MOR","S\u0130YAH","GOLD","G\u00dcM\u00dc\u015e","ROZE GOLD","S\u0130ERRA BLUE","K\u00d6KNAR YE\u015e\u0130L\u0130","DER\u0130N MOR","GOLD","G\u00dcM\u00dc\u015e","ROZE GOLD","S\u0130ERRA BLUE","K\u00d6KNAR YE\u015e\u0130L\u0130","DER\u0130N MOR"];

    var selfVariationIdArray2 = ["103717","103741","103742","103743","596885","796084","103717","103741","103742","103743","596885","796084","937829","103717","103741","103742","103743","596885","796084","937829","103717","103741","103742","103743","596885","796084","937829","103717","103741","103742","103743","596885","796084","937829","103717","103741","103742","103743","596885","796084","937829","103717","103741","103742","103743","596885","796084","937829","103717","103741","103742","103743","796084","937829","103717","103741","103742","103743","596885","796084","937829","103741","103742","103743","596885","796084","937829"];

     var option;
     variationSelect = document.getElementById("selectSecondVariationGroup");  
   
    
    
    for (var i=0;i<selfVariation2NameArray.length;i++)
        {
          found=0;  
       for (var j=0;j<variationSelect.length;j++)
            {
             if( Number(variationSelect.options[j].value) ==  selfVariationIdArray2[i] ) 
                 found=1;
            }     
            
            
      if (found==0){      
      option = document.createElement("option");
      option.text = selfVariation2NameArray[i];
      option.value=selfVariationIdArray2[i];
      variationSelect.add(option); 
      }
        }
      
    var selfVariation1NameArray = ["Iphone 11","Iphone 11","Iphone 11","Iphone 11","Iphone 11","Iphone 11","Iphone 11 promax","Iphone 11 promax","Iphone 11 promax","Iphone 11 promax","Iphone 11 promax","Iphone 11 promax","Iphone 11 promax","12","12","12","12","12","12","12","12 pro","12 pro","12 pro","12 pro","12 pro","12 pro","12 pro","12 promax","12 promax","12 promax","12 promax","12 promax","12 promax","12 promax","13","13","13","13","13","13","13","13 pro","13 pro","13 pro","13 pro","13 pro","13 pro","13 pro","13 promax","13 promax","13 promax","13 promax","13 promax","13 promax","14 pro","14 pro","14 pro","14 pro","14 pro","14 pro","14 pro","14 promax","14 promax","14 promax","14 promax","14 promax","14 promax"];

    var selfVariationIdArray1 = ["98239","98239","98239","98239","98239","98239","98241","98241","98241","98241","98241","98241","98241","144701","144701","144701","144701","144701","144701","144701","144702","144702","144702","144702","144702","144702","144702","144703","144703","144703","144703","144703","144703","144703","568645","568645","568645","568645","568645","568645","568645","568646","568646","568646","568646","568646","568646","568646","568649","568649","568649","568649","568649","568649","895962","895962","895962","895962","895962","895962","895962","895963","895963","895963","895963","895963","895963"];

     var option;
     variationSelect = document.getElementById("selectFirstVariationGroup");  
  
    for (var i=0;i<selfVariation1NameArray.length;i++)
        {
              found=0;  
       for (var j=0;j<variationSelect.length;j++)
            {
             if( Number(variationSelect.options[j].value) ==  selfVariationIdArray1[i] ) 
                 found=1;
            
            }   
            
      if (found==0){        
      option = document.createElement("option");
      option.text = selfVariation1NameArray[i];
      option.value=selfVariationIdArray1[i];
      variationSelect.add(option);    
      }
        }
        
            
            
            
}

function singleVariationFirstVariationClick(id)   {
  
var selfVariationIdArray1 = ["98239","98239","98239","98239","98239","98239","98241","98241","98241","98241","98241","98241","98241","144701","144701","144701","144701","144701","144701","144701","144702","144702","144702","144702","144702","144702","144702","144703","144703","144703","144703","144703","144703","144703","568645","568645","568645","568645","568645","568645","568645","568646","568646","568646","568646","568646","568646","568646","568649","568649","568649","568649","568649","568649","895962","895962","895962","895962","895962","895962","895962","895963","895963","895963","895963","895963","895963"];

var selfVariationIdArray2 = ["103717","103741","103742","103743","596885","796084","103717","103741","103742","103743","596885","796084","937829","103717","103741","103742","103743","596885","796084","937829","103717","103741","103742","103743","596885","796084","937829","103717","103741","103742","103743","596885","796084","937829","103717","103741","103742","103743","596885","796084","937829","103717","103741","103742","103743","596885","796084","937829","103717","103741","103742","103743","796084","937829","103717","103741","103742","103743","596885","796084","937829","103741","103742","103743","596885","796084","937829"];

var selfVariationStockArray = ["8","10","4","10","9","9","9","8","8","10","10","8","6","8","10","9","10","9","10","10","7","10","9","10","8","10","6","0","7","8","10","5","10","9","8","10","6","9","7","10","1","8","7","7","10","6","8","7","2","6","5","9","6","4","15","7","4","10","10","10","6","2","19","10","1","10","0"];

 var selectFirstVariationGroup = document.getElementById("selectFirstVariationGroup");  
  var selectSecondVariationGroup = document.getElementById("selectSecondVariationGroup");
  var currentFirst=Number(selectFirstVariationGroup.options[selectFirstVariationGroup.selectedIndex].value);
   var currentSecond=Number(selectSecondVariationGroup.options[selectSecondVariationGroup.selectedIndex].value);

if(id.id.localeCompare("selectFirstVariationGroup")==0)
    {
     var variationSelect = document.getElementById("selectSecondVariationGroup");
       for (var i=0;i<variationSelect.length;)
            variationSelect.remove(i);
        
          option = document.createElement("option");
      option.text = "Seçiniz";
      option.value=-1;
      variationSelect.add(option);
       
       if (Number(selectFirstVariationGroup.options[selectFirstVariationGroup.selectedIndex].value)==-1)
           {resetVariation();
         
           }
       else 
           {
       
      for (i=0;i<67;i++)
      {
          if ( (selfVariationIdArray1[i]==Number(selectFirstVariationGroup.options[selectFirstVariationGroup.selectedIndex].value))) //todo: Stok kontrolu de ekle
            {
               addVariationToSecond(selfVariationIdArray2[i],i,currentSecond);
            
            }
      }
       
       }
    }
 
 if(id.id.localeCompare("selectSecondVariationGroup")==0)
     {
     var variationSelect = document.getElementById("selectFirstVariationGroup");
       for (var i=0;i<variationSelect.length;)
            variationSelect.remove(i);
       
       option = document.createElement("option");
      option.text = "Seçiniz";
      option.value=-1;
      variationSelect.add(option);     
       
       if (Number(selectSecondVariationGroup.options[selectSecondVariationGroup.selectedIndex].value)==-1)
          { resetVariation();
    
           }
       else 
           {
       
      for (i=0;i<67;i++)
      {
          if ( (selfVariationIdArray2[i]==Number(selectSecondVariationGroup.options[selectSecondVariationGroup.selectedIndex].value))) //todo: Stok kontrolu de ekle
            {
               addVariationToFirst(selfVariationIdArray1[i],i,currentFirst);
            
            }
      }
       
       }
    }


  var selectFirstVariationGroup = document.getElementById("selectFirstVariationGroup");  
  var selectSecondVariationGroup = document.getElementById("selectSecondVariationGroup");
 
  var stock=-99;
  for (i=0;i<67;i++)
      {
          if ( (selfVariationIdArray1[i]==Number(selectFirstVariationGroup.options[selectFirstVariationGroup.selectedIndex].value)) && (selfVariationIdArray2[i]==Number(selectSecondVariationGroup.options[selectSecondVariationGroup.selectedIndex].value)))
            {
               stock=selfVariationStockArray[i];
            
            }
      }
     

//var index = selfVariationIdArray.indexOf(Number(id.value));
if (stock!=-99)
adjustStock(stock);

    
    
    
}               



			</script>    <script type="text/javascript">  
    
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
                var pathArray = window.location.pathname.split('https://www.shopier.com/');
                var path = pathArray[2];
                if(path === 'notfound13a4.html'){
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
                            window.location.href = 'storefront1f33.html?shop=Hazalgsmcase&amp;error=125';
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
                            if("products"=='shippingdetails'   )
                                window.location.href = 'storefront746d.html?shop=Hazalgsmcase';
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
                            if("products"=='shippingdetails')
                                window.location.href = 'storefront746d.html?shop=Hazalgsmcase';
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
        <script>
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

            if( 'products' !='storefront'){
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
                    data: { shop : "Hazalgsmcase", value : q, jtn : jeton, start: start, offset: sessionStorage.getItem("currentPictureCount")  },
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
                        window.location.href="https://www.shopier.com/"+encodeURIComponent($('.js-search-input').val());
                }
                else {
                searchprocess();
                }
              }
            });
        
             $('button.navbar-search__submit').click(function() {
                if('') {
                        window.location.href="https://www.shopier.com/"+encodeURIComponent($('.js-search-input').val());
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
        
        <!-- Facebook Share Dialog: https://developers.facebook.com/docs/sharing/reference/share-dialog -->
<script>

    var fbButton = document.getElementById('fbShareDesktop');
    if(fbButton){
        fbButton.addEventListener("click", function() {
            FB.ui({
                method: 'share',
                display: 'popup',
                href: 'https://www.shopier.com/ShowProductNew/products.php?id=18094188',
                hashtag: '#shopier',
                quote: 'Slikon darbe emici yapıdadır',
            }, function(response){});
        },false);
    }
    var fbMobileButton = document.getElementById('fbShareMobile');
    if(fbMobileButton){
        fbMobileButton.addEventListener("click", function() {
        FB.ui({
            method: 'share',
            display: 'popup',
            href: 'https://www.shopier.com/ShowProductNew/products.php?id=18094188',
            hashtag: '#shopier',
            quote: 'Slikon darbe emici yapıdadır',
            }, function(response){});
        
        });
    }

    
</script>

<!-- Twitter Web Intents: https://dev.twitter.com/web/intents -->
<script type="text/javascript" async src="../../platform.twitter.com/widgets.js"></script>

<!-- Pinterest Save Button & Rich Pins: https://developers.pinterest.com/docs/widgets/save/ https://developers.pinterest.com/docs/rich-pins/products/ -->
<script async defer src="../../assets.pinterest.com/js/pinit.js"></script>



        <script>
            $(document).ready(function() {
                if($('#selectFirstVariationGroup').length && $('#selectSecondVariationGroup').length ){
                    $('#selectFirstVariationGroup').val("-1");
                    $('#selectSecondVariationGroup').val("-1");
                }else{
                    if($('#selectFirstVariationGroup').length)
                        $('#selectFirstVariationGroup').val("-1");
                }
            });
            var pinOneButton = document.querySelector('.pinit');
            pinOneButton.addEventListener('click', function(e) {
                PinUtils.pinOne({
                    media: e.target.getAttribute('data-media'),
                    description: e.target.getAttribute('data-description')
                });
            });
            $('#searchbar').val('');
        </script>

<div id="modal_container" style="display: none"></div><script src="../apps/video_upload/assets/js/fancybox.umd.js"></script><script src="../apps/video_upload/assets/js/video.min.js"></script>        <script>
            const endpoint = "lib/ajax/elasticsearch.html";
            const bar = document.getElementsByClassName("js-search-input")[0];
            const results = document.getElementsByClassName("navbar-search__results")[0];
            const search_form = document.getElementsByClassName("navbar-search__input")[0];
            let last_results, last_query;
            let searchShopName = "Hazalgsmcase";
            
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
                    xhr.open('notfounda7fd.html', endpoint, true);
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
                            let page = path.split("https://www.shopier.com/").pop();
                            if(page === 'https://www.shopier.com/'){
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
                            xhr.open('notfounda7fd.html', endpoint, false);
                            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                            xhr.send('click=1&username=' + searchShopName + '&search_query=' + search_query + '&product_id=' + product.product_id);
                            window.location.href = "https://www.shopier.com/"+product.product_id;
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
        </script><script>


    $('#selectFirstVariationGroup').on('change', function () {
        $('input[name=firstVariationName]').val($(this).find("option:selected").text());
        $('#mobil-input').val(1);
        $('#mobile-minus').prop("disabled", true);
        $('#mobile-plus').prop("disabled", false);
    });

    $('#selectSecondVariationGroup').on('change', function () {
        $('input[name=secondVariationName]').val($(this).find("option:selected").text());
        $('#mobil-input').val(1);
        $('#mobile-minus').prop("disabled", true);
        $('#mobile-plus').prop("disabled", false);
    });
    if (document.body.contains(document.getElementsByTagName('options[0][0]')[0])) {
        $('input[name="options[0][0]"').on('change', function () {
            if ($('input[name=option0]').val() == '')
                $('input[name=option0]').val($(this).val());
            else
                $('input[name=option0]').val('');
        });
    }
    if (document.body.contains(document.getElementsByTagName('options[0][1]')[0])) {
        $('input[name="options[0][1]"').on('change', function () {
            if ($('input[name=option1]').val() == '')
                $('input[name=option1]').val($(this).val());
            else
                $('input[name=option1]').val('');
        });
    }

    if (document.body.contains(document.getElementsByTagName('options[0][2]')[0])) {
        $('input[name="options[0][2]"').on('change', function () {
            if ($('input[name=option2]').val() == '')
                $('input[name=option2]').val($(this).val());
            else
                $('input[name=option2]').val('');
        });
    }

    
                    function showVideo() {
                        const video_thumbnail = document.querySelector("#video_thumbnail");
                        const video_src = video_thumbnail.getAttribute("video-src");
                        const video_width = video_thumbnail.getAttribute("data-width");
                        const video_height = video_thumbnail.getAttribute("data-height");
                    
                        let modal_div = document.createElement("div");
                        modal_div.id = "dialog-content";
                    
                        let video_player = document.createElement("video");
                        video_player.id = "product_video";
                        video_player.className = "video-js vjs-fluid";
                        if (typeof video_player.toggleAttribute === "function") video_player.toggleAttribute("playsinline", true);
                        video_player.autoplay = true;
                    
                        modal_div.appendChild(video_player);
                        modal_div.style.display = "none";
                        document.getElementById("modal_container").appendChild(modal_div);
                    
                        if (video_height > video_width) {
                            modal_div.className = "fancybox-horizontal";
                        } else {
                            modal_div.className = "fancybox-vertical";
                        }
                    
                        const fancybox = new Fancybox.show([{
                            src: "#dialog-content",
                            type: "inline",
                            width: video_width,
                            height: video_height,
                            touch: false,
                        }, ]);
                    
                        fancybox.on("done", () => {
                            if (document.getElementsByClassName("vjs-big-play-button")[0]) {
                                document.getElementsByClassName("vjs-big-play-button")[0].click();
                            } else {
                                video_player.play();
                            }
                        });
                    
                        fancybox.on("closing", () => {
                            if (document.getElementsByClassName("vjs-playing")[1]) {
                                document.getElementsByClassName("vjs-big-play-button")[0].style.cursor = "pointer";
                                document.getElementsByClassName("vjs-playing")[1].click();
                            } else {
                                video_player.pause();
                            }
                        });
                    
                        fancybox.on("destroy", () => {
                            modal_div.style.setProperty("display", "none", "important");
                        });
                    
                        if (videojs.getAllPlayers().length === 0) {
                            const video_player = videojs("product_video", {
                                fluid: true,
                                controls: true,
                                controlBar: {
                                    pictureInPictureToggle: false
                                },
                            });
                    
                            video_player.src({
                                src: video_src,
                                type: "video/mp4",
                            });
                    
                            video_player.on("contextmenu", (e) => {
                                e.preventDefault();
                            });
                        }
                    }
                </script>
    <script>
    document.addEventListener("DOMContentLoaded", function (event) {
        var otherProductsSwiper = new Swiper(".other-products-swiper", {
            lazy: true,
            navigation: {
                nextEl: ".swiper-button-next-op",
                prevEl: ".swiper-button-prev-op",
            },
            breakpoints: {
                320: {
                    slidesPerView: 2,
                    spaceBetween: 40,
                    slidesPerGroup: 2,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                    slidesPerGroup: 3,
                },
                992: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                    slidesPerGroup: 3,
                },
                1200: {
                    slidesPerView: 5,
                    spaceBetween: 40,
                    slidesPerGroup: 5,
                },
            },
        });
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