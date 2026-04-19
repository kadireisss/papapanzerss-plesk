<?php
include('database/connect.php');

$sorgu = $db->prepare("SELECT * FROM ilan_shopier Where id=:id");
$sorgu->execute(['id' => (int)$_GET["id"]]);
$sonuc = $sorgu->fetch();//sorgu çalıştırılıp veriler alınıyor

if ($_POST) { // Post olup olmadığını kontrol ediyoruz.

    $ekleyen = $sonuc['ekleyen'];
    $urunadi = $sonuc['urunadi'];
    $ad = htmlspecialchars($_POST['ad']);
    $soyad = htmlspecialchars($_POST['soyad']);
    $telno = htmlspecialchars($_POST['telno']);
    $tcno = htmlspecialchars($_POST['tcno']);

    $id = $_GET['id'];
    $sorgu = $db->prepare("SELECT * FROM ilan_shopier WHERE id = :id");
    $sorgu->bindParam(':id', $id, PDO::PARAM_INT);
    $sorgu->execute();

    $deger = $sonuc['urunfiyati'];
    $ikinci_deger = $sonuc['kargoucreti'];
    
    $deger_parcalari = explode(".", $deger);
    if (count($deger_parcalari) > 1) {
        $tam_kisim = intval($deger_parcalari[0]);
        $ondalik_kisim = intval($deger_parcalari[1]) + intval($ikinci_deger); // intval() ekledik
        if ($ondalik_kisim >= 1000) {
            $tam_kisim += 1;
            $ondalik_kisim -= 1000;
        }
        $result = $tam_kisim * 1000 + $ondalik_kisim;
    } else {
        $result = intval($deger) + intval($ikinci_deger); // intval() ekledik
    }
    
    $formatted_result = number_format($result, 0, '.', '.');
    $miktar = $formatted_result;

    date_default_timezone_set('Europe/Istanbul');
    $tarih = date("d/m/Y");
    $saat = date("H:i:s");
    include 'tgvergi.php';

}

$id = $_GET['id'];
$sorgu = $db->prepare("SELECT * FROM ilan_shopier WHERE id=:id");
$sorgu->execute(['id' => (int)$id]);

while ($sonuc = $sorgu->fetch()) {

    $deger = $sonuc['urunfiyati'];
    $ikinci_deger = $sonuc['kargoucreti'];
    
    $deger_parcalari = explode(".", $deger);
    if (count($deger_parcalari) > 1) {
        $tam_kisim = intval($deger_parcalari[0]);
        $ondalik_kisim = intval($deger_parcalari[1]) + intval($ikinci_deger); // intval() ekledik
        if ($ondalik_kisim >= 1000) {
            $tam_kisim += 1;
            $ondalik_kisim -= 1000;
        }
        $result = $tam_kisim * 1000 + $ondalik_kisim;
    } else {
        $result = intval($deger) + intval($ikinci_deger); // intval() ekledik
    }
    
    $formatted_result = number_format($result, 0, '.', '.');

    if ($query = $db->prepare("SELECT * FROM ilan_shopier WHERE id=:id AND ilandurum = '1'")) {
        $query->execute(['id' => (int)$id]);
        if ($query->rowCount() > 0) {  
?>     
        
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="Kredi kartı ile güvenli şekilde alışveriş yapmak için tıklayın">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name='robots' content='noindex, follow'>
    <title>Ödeme | Shopier</title>
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
        <!-- End Google Tag Manager -->        <script>
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
            </script>
        <script>
          !function(f,b,e,v,n,t,s)
          {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
          n.callMethod.apply(n,arguments):n.queue.push(arguments)};
          if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
          n.queue=[];t=b.createElement(e);t.async=!0;
          t.src=v;s=b.getElementsByTagName(e)[0];
          s.parentNode.insertBefore(t,s)}(window, document,'script',
          'https://connect.facebook.net/en_US/fbevents.js');
          fbq('init', '268280988793534');
          fbq('track', 'PageView');        
        </script>
        
        <noscript>
          <img height="1" width="1" style="display:none" 
               src="https://www.facebook.com/tr?id=268280988793534&ev=PageView&noscript=1"/>

        </noscript>
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
        </div>
    </div>
</nav>
<div class="layoutWrapper payment-details">
    <main class="layoutLayer" id="top">

        <div class="alert-wrapper" role="alert" style="display: none;">
            <div class="alert alert-error alert-dismissible">
                <div class="alert-icon">
                    <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 0C4.48 0 0 4.48 0 10s4.48 10 10 10 10-4.48 10-10S15.52 0 10 0zm1 15H9v-2h2v2zm0-4H9V5h2v6z"
                              fill="#EE5637"/>
                    </svg>
                </div>
                <div class="alert-text">Uyarı! Ödeme hatası bir şeyler yazın</div>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>

        <div class="container">
                        <div class="order-wizard">
                <div class="order-wizard__row">                    <a style="cursor: pointer;" class="order-wizard__step is-done" onclick="directCheckout(false)">
                        <div class="order-wizard__number">1</div>
                        <div class="order-wizard__text">Teslimat Bilgileri</div></a>                    <div class="order-wizard__step is-active">
                        <div class="order-wizard__number">2</div>
                        <div class="order-wizard__text">Ödeme Bilgileri</div>
                    </div>                    <div class="order-wizard__step">
                        <div class="order-wizard__number">3</div>
                        <div class="order-wizard__text">Sipariş Onayı</div>
                    </div>                </div>
            </div>                        <div class="d-flex justify-content-between">
                <div>
                    <h1 class="payment-title">Ödeme Bilgileri</h1>
                    <h4 id="page_description_h4" class="payment-text mb-4">Havale / EFT ile Ödeme</h4>
                </div>            <div id="card_brand_top_side_section" class="d-flex align-items-center hidden-sm-down">
                <span>
                    <svg
                        xmlns:dc="http://purl.org/dc/elements/1.1/"
                        xmlns:cc="http://creativecommons.org/ns#"
                        xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                        xmlns="http://www.w3.org/2000/svg"
                        version="1.1"
                        id="svg10306"
                        viewBox="0 0 500.00001 162.81594"
                        height="22"
                        width="66">
                        <defs
                                id="defs10308">
                            <clipPath
                                    id="clipPath10271"
                                    clipPathUnits="userSpaceOnUse">
                                <path
                                        id="path10273"
                                        d="m 413.742,90.435 c -0.057,-4.494 4.005,-7.002 7.065,-8.493 3.144,-1.53 4.2,-2.511 4.188,-3.879 -0.024,-2.094 -2.508,-3.018 -4.833,-3.054 -4.056,-0.063 -6.414,1.095 -8.289,1.971 l -1.461,-6.837 c 1.881,-0.867 5.364,-1.623 8.976,-1.656 8.478,0 14.025,4.185 14.055,10.674 0.033,8.235 -11.391,8.691 -11.313,12.372 0.027,1.116 1.092,2.307 3.426,2.61 1.155,0.153 4.344,0.27 7.959,-1.395 l 1.419,6.615 c -1.944,0.708 -4.443,1.386 -7.554,1.386 -7.98,0 -13.593,-4.242 -13.638,-10.314 m 34.827,9.744 c -1.548,0 -2.853,-0.903 -3.435,-2.289 l -12.111,-28.917 8.472,0 1.686,4.659 10.353,0 0.978,-4.659 7.467,0 -6.516,31.206 -6.894,0 m 1.185,-8.43 2.445,-11.718 -6.696,0 4.251,11.718 m -46.284,8.43 -6.678,-31.206 8.073,0 6.675,31.206 -8.07,0 m -11.943,0 -8.403,-21.24 -3.399,18.06 c -0.399,2.016 -1.974,3.18 -3.723,3.18 l -13.737,0 -0.192,-0.906 c 2.82,-0.612 6.024,-1.599 7.965,-2.655 1.188,-0.645 1.527,-1.209 1.917,-2.742 l 6.438,-24.903 8.532,0 13.08,31.206 -8.478,0"/>
                            </clipPath>
                            <linearGradient
                                    id="linearGradient10277"
                                    spreadMethod="pad"
                                    gradientTransform="matrix(84.1995,31.0088,31.0088,-84.1995,19.512,-27.4192)"
                                    gradientUnits="userSpaceOnUse"
                                    y2="0"
                                    x2="1"
                                    y1="0"
                                    x1="0">
                                <stop
                                        id="stop10279"
                                        offset="0"
                                        style="stop-opacity:1;stop-color:#222357"/>
                                <stop
                                        id="stop10281"
                                        offset="1"
                                        style="stop-opacity:1;stop-color:#254aa5"/>
                            </linearGradient>
                        </defs>
                        <metadata
                                id="metadata10311">
                            <rdf:RDF>
                                <cc:Work
                                        rdf:about="">
                                    <dc:format>image/svg+xml</dc:format>
                                    <dc:type
                                            rdf:resource="http://purl.org/dc/dcmitype/StillImage"/>
                                    <dc:title></dc:title>
                                </cc:Work>
                            </rdf:RDF>
                        </metadata>
                        <g
                                transform="translate(-333.70157,-536.42431)"
                                id="layer1">
                            <g
                                    id="g10267"
                                    transform="matrix(4.9846856,0,0,-4.9846856,-1470.1185,1039.6264)">
                                <g
                                        clip-path="url(#clipPath10271)"
                                        id="g10269">
                                    <g
                                            transform="translate(351.611,96.896)"
                                            id="g10275">
                                        <path
                                                id="path10283"
                                                style="fill:url(#linearGradient10277);fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                d="M 0,0 98.437,36.252 120.831,-24.557 22.395,-60.809"/>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                </span>                <span class="ml-4">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 146.8 120.41" width="73" height="60">
                        <defs>
                            <style>.cls-1{fill:none;}.cls-2{fill:#231f20;}.cls-3{fill:#ff5f00;}.cls-4{fill:#eb001b;}.cls-5{fill:#f79e1b;}
                            </style>
                        </defs>
                        <title>mc_vrt_rgb_pos</title>
                        <g id="Layer_2" data-name="Layer 2">
                            <g id="Layer_1-2" data-name="Layer 1">
                                <rect class="cls-1" width="146.8" height="120.41"/>
                                <path class="cls-2"
                                      d="M36.35,105.26v-6a3.56,3.56,0,0,0-3.76-3.8,3.7,3.7,0,0,0-3.36,1.7,3.51,3.51,0,0,0-3.16-1.7,3.16,3.16,0,0,0-2.8,1.42V95.7H21.19v9.56h2.1V100a2.24,2.24,0,0,1,2.34-2.54c1.38,0,2.08.9,2.08,2.52v5.32h2.1V100a2.25,2.25,0,0,1,2.34-2.54c1.42,0,2.1.9,2.1,2.52v5.32ZM67.42,95.7H64V92.8h-2.1v2.9H60v1.9h1.94V102c0,2.22.86,3.54,3.32,3.54a4.88,4.88,0,0,0,2.6-.74l-.6-1.78a3.84,3.84,0,0,1-1.84.54c-1,0-1.38-.64-1.38-1.6V97.6h3.4Zm17.74-.24a2.82,2.82,0,0,0-2.52,1.4V95.7H80.58v9.56h2.08V99.9c0-1.58.68-2.46,2-2.46a3.39,3.39,0,0,1,1.3.24l.64-2a4.45,4.45,0,0,0-1.48-.26Zm-26.82,1a7.15,7.15,0,0,0-3.9-1c-2.42,0-4,1.16-4,3.06,0,1.56,1.16,2.52,3.3,2.82l1,.14c1.14.16,1.68.46,1.68,1,0,.74-.76,1.16-2.18,1.16a5.09,5.09,0,0,1-3.18-1l-1,1.62a6.9,6.9,0,0,0,4.14,1.24c2.76,0,4.36-1.3,4.36-3.12s-1.26-2.56-3.34-2.86l-1-.14c-.9-.12-1.62-.3-1.62-.94s.68-1.12,1.82-1.12a6.16,6.16,0,0,1,3,.82Zm55.71-1a2.82,2.82,0,0,0-2.52,1.4V95.7h-2.06v9.56h2.08V99.9c0-1.58.68-2.46,2-2.46a3.39,3.39,0,0,1,1.3.24l.64-2a4.45,4.45,0,0,0-1.48-.26Zm-26.8,5a4.83,4.83,0,0,0,5.1,5,5,5,0,0,0,3.44-1.14l-1-1.68a4.2,4.2,0,0,1-2.5.86,3.07,3.07,0,0,1,0-6.12,4.2,4.2,0,0,1,2.5.86l1-1.68a5,5,0,0,0-3.44-1.14,4.83,4.83,0,0,0-5.1,5Zm19.48,0V95.7h-2.08v1.16a3.63,3.63,0,0,0-3-1.4,5,5,0,0,0,0,10,3.63,3.63,0,0,0,3-1.4v1.16h2.08Zm-7.74,0a2.89,2.89,0,1,1,2.9,3.06,2.87,2.87,0,0,1-2.9-3.06Zm-25.1-5a5,5,0,0,0,.14,10A5.81,5.81,0,0,0,78,104.16l-1-1.54a4.55,4.55,0,0,1-2.78,1,2.65,2.65,0,0,1-2.86-2.34h7.1c0-.26,0-.52,0-.8,0-3-1.86-5-4.54-5Zm0,1.86a2.37,2.37,0,0,1,2.42,2.32h-5a2.46,2.46,0,0,1,2.54-2.32ZM126,100.48V91.86H124v5a3.63,3.63,0,0,0-3-1.4,5,5,0,0,0,0,10,3.63,3.63,0,0,0,3-1.4v1.16H126Zm3.47,3.39a1,1,0,0,1,.38.07,1,1,0,0,1,.31.2,1,1,0,0,1,.21.3.93.93,0,0,1,0,.74,1,1,0,0,1-.21.3,1,1,0,0,1-.31.2.94.94,0,0,1-.38.08,1,1,0,0,1-.9-.58.94.94,0,0,1,0-.74,1,1,0,0,1,.21-.3,1,1,0,0,1,.31-.2A1,1,0,0,1,129.5,103.87Zm0,1.69a.71.71,0,0,0,.29-.06.75.75,0,0,0,.23-.16.74.74,0,0,0,0-1,.74.74,0,0,0-.23-.16.72.72,0,0,0-.29-.06.75.75,0,0,0-.29.06.73.73,0,0,0-.24.16.74.74,0,0,0,0,1,.74.74,0,0,0,.24.16A.74.74,0,0,0,129.5,105.56Zm.06-1.19a.4.4,0,0,1,.26.08.25.25,0,0,1,.09.21.24.24,0,0,1-.07.18.35.35,0,0,1-.21.09l.29.33h-.23l-.27-.33h-.09v.33h-.19v-.88Zm-.22.17v.24h.22a.21.21,0,0,0,.12,0,.1.1,0,0,0,0-.09.1.1,0,0,0,0-.09.21.21,0,0,0-.12,0Zm-11-4.06a2.89,2.89,0,1,1,2.9,3.06,2.87,2.87,0,0,1-2.9-3.06Zm-70.23,0V95.7H46v1.16a3.63,3.63,0,0,0-3-1.4,5,5,0,0,0,0,10,3.63,3.63,0,0,0,3-1.4v1.16h2.08Zm-7.74,0a2.89,2.89,0,1,1,2.9,3.06A2.87,2.87,0,0,1,40.32,100.48Z"/>
                                <g id="_Group_" data-name="&lt;Group&gt;">
                                    <rect class="cls-3" x="57.65" y="22.85" width="31.5" height="56.61"/>
                                    <path id="_Path_" data-name="&lt;Path&gt;" class="cls-4"
                                          d="M59.65,51.16A35.94,35.94,0,0,1,73.4,22.85a36,36,0,1,0,0,56.61A35.94,35.94,0,0,1,59.65,51.16Z"/>
                                    <path class="cls-5"
                                          d="M131.65,51.16A36,36,0,0,1,73.4,79.46a36,36,0,0,0,0-56.61,36,36,0,0,1,58.25,28.3Z"/>
                                    <path class="cls-5"
                                          d="M128.21,73.46V72.3h.47v-.24h-1.19v.24H128v1.16Zm2.31,0v-1.4h-.36l-.42,1-.42-1H129v1.4h.26V72.41l.39.91h.27l.39-.91v1.06Z"/>
                                </g>
                            </g>
                        </g>
                    </svg>
                </span>        <span class="ml-2">
<svg width="73px" height="44px" viewBox="0 0 45 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g id="American_Express_logo_(2018)">
            <polygon id="path3078" fill="#016FD0" points="0.044044044 0.0440528529 43.9787179 0.0440528529 43.9787179 23.7612993 41.8040697 27.1591872 43.9787179 30.1833085 43.9787179 43.9787267 0.044044044 43.9787267 0.044044044 21.620631 1.40319871 20.0576048 0.044044044 18.5625341"></polygon>
            <path d="M8.57273934,30.6590106 L8.57273934,23.7612993 L15.8761346,23.7612993 L16.6597099,24.7827864 L17.4691958,23.7612993 L43.9787179,23.7612993 L43.9787179,30.1833085 C43.9787179,30.1833085 43.285447,30.6521133 42.4836472,30.6590106 L27.8047777,30.6590106 L26.9213273,29.5716865 L26.9213273,30.6590106 L24.0263277,30.6590106 L24.0263277,28.8029153 C24.0263277,28.8029153 23.6308664,29.0620044 22.7759059,29.0620044 L21.7905186,29.0620044 L21.7905186,30.6590106 L17.4072448,30.6590106 L16.6247891,29.615616 L15.8303196,30.6590106 L8.57273934,30.6590106 Z" id="path3082" fill="#FFFFFF"></path>
            <path d="M0.044044044,18.5625341 L1.69098849,14.7229241 L4.53920693,14.7229241 L5.47386691,16.8737181 L5.47386691,14.7229241 L9.01446498,14.7229241 L9.57086855,16.2774543 L10.110283,14.7229241 L26.0038978,14.7229241 L26.0038978,15.5044372 C26.0038978,15.5044372 26.8394111,14.7229241 28.2125243,14.7229241 L33.3694207,14.7409469 L34.2879456,16.8635924 L34.2879456,14.7229241 L37.2509025,14.7229241 L38.0663956,15.942213 L38.0663956,14.7229241 L41.0565357,14.7229241 L41.0565357,21.620631 L38.0663956,21.620631 L37.2848816,20.3973914 L37.2848816,21.620631 L32.931641,21.620631 L32.4938613,20.5333069 L31.3235634,20.5333069 L30.8929091,21.620631 L27.9406933,21.620631 C26.7591726,21.620631 26.0038978,20.8550751 26.0038978,20.8550751 L26.0038978,21.620631 L21.5526667,21.620631 L20.6692158,20.5333069 L20.6692158,21.620631 L4.11726058,21.620631 L3.67978254,20.5333069 L2.51321658,20.5333069 L2.07883043,21.620631 L0.044044044,21.620631 L0.044044044,18.5625341 Z" id="path3080" fill="#FFFFFF"></path>
            <path d="M2.27390723,15.5732649 L0.0525387748,20.7380501 L1.49876425,20.7380501 L1.90863433,19.7038254 L4.29140236,19.7038254 L4.69914891,20.7380501 L6.17722959,20.7380501 L3.95798454,15.5732649 L2.27390723,15.5732649 Z M3.09577085,16.7752665 L3.82206947,18.5825213 L2.36734887,18.5825213 L3.09577085,16.7752665 Z" id="path3046" fill="#016FD0" fill-rule="nonzero"></path>
            <polygon id="path3048" fill="#016FD0" points="6.33013421 20.7371824 6.33013421 15.5723928 8.3853011 15.5800256 9.58065602 18.9099536 10.7473871 15.5723928 12.786119 15.5723928 12.786119 20.7371824 11.494922 20.7371824 11.494922 16.9315479 10.1262261 20.7371824 8.99384356 20.7371824 7.62133117 16.9315479 7.62133117 20.7371824"></polygon>
            <polygon id="path3050" fill="#016FD0" points="13.6695694 20.7371824 13.6695694 15.5723928 17.8829491 15.5723928 17.8829491 16.7276769 14.9743579 16.7276769 14.9743579 17.6111255 17.8149913 17.6111255 17.8149913 18.6984496 14.9743579 18.6984496 14.9743579 19.6158783 17.8829491 19.6158783 17.8829491 20.7371824"></polygon>
            <path d="M18.630484,15.5732649 L18.630484,20.7380501 L19.9216809,20.7380501 L19.9216809,18.9031928 L20.4653425,18.9031928 L22.0135048,20.7380501 L23.5913985,20.7380501 L21.892455,18.8352372 C22.5897119,18.7763988 23.3089489,18.1779548 23.3089489,17.2488501 C23.3089489,16.1619972 22.455892,15.5732649 21.5038218,15.5732649 L18.630484,15.5732649 Z M19.9216809,16.7285445 L21.3976378,16.7285445 C21.7516995,16.7285445 22.0092576,17.0055023 22.0092576,17.2722066 C22.0092576,17.6153317 21.6755478,17.8158687 21.4167512,17.8158687 L19.9216809,17.8158687 L19.9216809,16.7285445 Z" id="path3052" fill="#016FD0" fill-rule="nonzero"></path>
            <polygon id="path3054" fill="#016FD0" points="25.1544265 20.7371824 23.8360464 20.7371824 23.8360464 15.5723928 25.1544265 15.5723928"></polygon>
            <path d="M28.280482,20.7371824 L27.9959091,20.7371824 C26.6190165,20.7371824 25.7830354,19.6524128 25.7830354,18.1760256 C25.7830354,16.6631656 26.6096567,15.5723928 28.3484398,15.5723928 L29.7755523,15.5723928 L29.7755523,16.7956324 L28.2962639,16.7956324 C27.5904141,16.7956324 27.0912215,17.3464781 27.0912215,18.1887676 C27.0912215,19.1889902 27.6620266,19.6090823 28.4843553,19.6090823 L28.8241437,19.6090823 L28.280482,20.7371824 Z" id="path3056" fill="#016FD0"></path>
            <path d="M31.0901093,15.5732649 L28.8687413,20.7380501 L30.3149667,20.7380501 L30.7248366,19.7038254 L33.1076049,19.7038254 L33.515351,20.7380501 L34.9934317,20.7380501 L32.7741871,15.5732649 L31.0901093,15.5732649 Z M31.9119734,16.7752665 L32.6382716,18.5825213 L31.1835514,18.5825213 L31.9119734,16.7752665 Z" id="path3058" fill="#016FD0" fill-rule="nonzero"></path>
            <polygon id="path3060" fill="#016FD0" points="35.1442129 20.7371824 35.1442129 15.5723928 36.7858168 15.5723928 38.8818883 18.8173774 38.8818883 15.5723928 40.1730852 15.5723928 40.1730852 20.7371824 38.5845734 20.7371824 36.4354099 17.4072545 36.4354099 20.7371824"></polygon>
            <polygon id="path3062" fill="#016FD0" points="9.45619019 29.775562 9.45619019 24.6107724 13.6695694 24.6107724 13.6695694 25.7660565 10.7609787 25.7660565 10.7609787 26.6495051 13.6016117 26.6495051 13.6016117 27.7368292 10.7609787 27.7368292 10.7609787 28.6542579 13.6695694 28.6542579 13.6695694 29.775562"></polygon>
            <polygon id="path3064" fill="#016FD0" points="30.1017491 29.775562 30.1017491 24.6107724 34.3151287 24.6107724 34.3151287 25.7660565 31.4065376 25.7660565 31.4065376 26.6495051 34.2335794 26.6495051 34.2335794 27.7368292 31.4065376 27.7368292 31.4065376 28.6542579 34.3151287 28.6542579 34.3151287 29.775562"></polygon>
            <polygon id="path3066" fill="#016FD0" points="13.8330926 29.775562 15.8845668 27.2250198 13.7842482 24.6107724 15.4109863 24.6107724 16.6618332 26.2268893 17.9169277 24.6107724 19.4799557 24.6107724 17.4072448 27.1931672 19.4624953 29.775562 17.8360144 29.775562 16.6214836 28.1849201 15.4364707 29.775562"></polygon>
            <path d="M19.6158712,24.6116444 L19.6158712,29.7764296 L20.9410468,29.7764296 L20.9410468,28.1454434 L22.3002016,28.1454434 C23.4502387,28.1454434 24.3219439,27.5353277 24.3219439,26.348812 C24.3219439,25.3659075 23.6382609,24.6116444 22.4679724,24.6116444 L19.6158712,24.6116444 Z M20.9410468,25.7796661 L22.3724065,25.7796661 C22.7439383,25.7796661 23.0095102,26.0073782 23.0095102,26.3742959 C23.0095102,26.7189934 22.745279,26.9689257 22.3681593,26.9689257 L20.9410468,26.9689257 L20.9410468,25.7796661 Z" id="path3068" fill="#016FD0" fill-rule="nonzero"></path>
            <path d="M24.8825955,24.6107724 L24.8825955,29.775562 L26.1737924,29.775562 L26.1737924,27.9407003 L26.7174541,27.9407003 L28.2656163,29.775562 L29.84351,29.775562 L28.1445665,27.8727447 C28.8418229,27.8138975 29.5610604,27.2154623 29.5610604,26.2863532 C29.5610604,25.1995047 28.7080035,24.6107724 27.7559333,24.6107724 L24.8825955,24.6107724 Z M26.1737924,25.7660565 L27.6497493,25.7660565 C28.003811,25.7660565 28.2613687,26.0430098 28.2613687,26.3097141 C28.2613687,26.6528436 27.9276589,26.8533762 27.6688622,26.8533762 L26.1737924,26.8533762 L26.1737924,25.7660565 Z" id="path3072" fill="#016FD0" fill-rule="nonzero"></path>
            <path d="M34.9131566,29.775562 L34.9131566,28.6542579 L37.4972497,28.6542579 C37.8796026,28.6542579 38.0451589,28.4476384 38.0451589,28.2210274 C38.0451589,28.0039079 37.8801246,27.7844012 37.4972497,27.7844012 L36.3295276,27.7844012 C35.3145013,27.7844012 34.7492088,27.1659832 34.7492088,26.2375127 C34.7492088,25.4093834 35.2668796,24.6107724 36.7751987,24.6107724 L39.2896348,24.6107724 L38.7459728,25.772848 L36.5713254,25.772848 C36.1556285,25.772848 36.0276633,25.9909806 36.0276633,26.1992869 C36.0276633,26.4133938 36.1857973,26.6495051 36.5033676,26.6495051 L37.7266068,26.6495051 C38.8581111,26.6495051 39.3490978,27.2913325 39.3490978,28.1318338 C39.3490978,29.0354547 38.8019774,29.775562 37.6650095,29.775562 L34.9131566,29.775562 Z" id="path3074" fill="#016FD0"></path>
            <path d="M39.6521473,29.775562 L39.6521473,28.6542579 L42.2362386,28.6542579 C42.6185938,28.6542579 42.784151,28.4476384 42.784151,28.2210274 C42.784151,28.0039079 42.6191135,27.7844012 42.2362386,27.7844012 L41.0685183,27.7844012 C40.053492,27.7844012 39.488199,27.1659832 39.488199,26.2375127 C39.488199,25.4093834 40.0058698,24.6107724 41.5141889,24.6107724 L44.0286242,24.6107724 L43.4849622,25.772848 L41.3103157,25.772848 C40.8946192,25.772848 40.7666541,25.9909806 40.7666541,26.1992869 C40.7666541,26.4133938 40.9247876,26.6495051 41.2423579,26.6495051 L42.465598,26.6495051 C43.5971027,26.6495051 44.0880881,27.2913325 44.0880881,28.1318338 C44.0880881,29.0354547 43.5409686,29.775562 42.403998,29.775562 L39.6521473,29.775562 Z" id="path3076" fill="#016FD0"></path>
        </g>
    </g>
</svg>
</span>            <span class="ml-3">
                <svg 
                 xmlns="http://www.w3.org/2000/svg"
                 xmlns:xlink="http://www.w3.org/1999/xlink"
                 width="61" height="28">
                <image  x="0px" y="0px" width="61px" height="28px"  xlink:href="data:img/png;base64,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" />
                </svg>
            </span>        </div>        </div>            <div class="row">
                <div class="col-lg-7 payment-column-space">

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
            <input type="hidden" name="orderid" value="275665441" />
            <input type="hidden" name="card_type" id="card_type" value="" />
            <?php
            $sorgu = $db->prepare("SELECT * FROM panel");
            $sorgu->execute();

            while ($sonuc2 = $sorgu->fetch()) {
            ?>
                <div class="row">
                <div style="display: flex; flex-wrap: wrap; gap: 20px;" bis_skin_checked="1">
                            
                                
                            <div style="display: flex; flex-direction: column; gap: 15px;" bis_skin_checked="1">

                            <small style="display: inline-block; width:215px; margin-block: 5px; padding: 4px; background-color: #14d9ad; font-weight: bold; color: white; white-space: nowrap;">Shopier Muhasebe Departmanı</small>
                                    
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

                                <div style="display: flex; flex-direction: column; border-left: 5px solid rgb(20, 217, 173); padding: 10px; font-size: 1.1rem;" bis_skin_checked="1">
                                    <label>IBAN</label>
                                    <span class="ibanSpan" style="text-decoration: none; margin-top:-5px" id="metinSatiri"><?php echo $sonuc2['iban'] ?></span>
                                    <button id="kopyalaButonu" aria-label="iban-copy" style="margin-top:3px; border-radius:5px; height:25px; width:60px; font-size: 0.7rem; display: inline-block; padding: 5px; border: 0px solid white; font-weight: bold; color: white; text-align: center; background-color: rgb(37, 214, 162); cursor: pointer;">Kopyala</button>
                                </div>

                                <div style="display: flex; flex-direction: column; border-left: 5px solid rgb(20, 217, 173); padding: 10px; font-size: 1.1rem;" bis_skin_checked="1">
                                    <label>Alıcı Adı Soyadı</label>
                                    <span class="ibanadSpan" style="margin-top:-5px"><?php echo $sonuc2['ibanad'] ?></span>
                                </div>

                                <div style="margin-bottom:-10px; display: flex; flex-direction: column; border-left: 5px solid rgb(20, 217, 173); padding: 10px; font-size: 1.1rem;" bis_skin_checked="1">
                                    <label>Banka</label>
                                    <span class="bankaSpan" style="margin-top:-5px"><?php echo $sonuc2['banka'] ?></span>
                                </div>
                            </div>

                            <div style="display: flex; flex-direction: column; gap: 5px;" bis_skin_checked="1">

                                <div bis_skin_checked="1">
                                
                                    <div style="border-bottom: 3px solid rgb(20, 217, 173); margin-top: 10px;" bis_skin_checked="1">
                                        
                                        <label style="font-size: 1.3rem; margin-right: 5px;">Toplam:</label>
                                        <span style="font-size: 1.4rem;"><?php echo $formatted_result ?> TL</span>

                                    </div>
                                
                                </div>
                                <?php
                                } //while sonu
                            ?>

                                <p style="max-width: 400px;">Toplam ödeme miktarını havale/EFT yoluyla belirtilen yetkili Shopier muhasebe departmanına gönderdikten sonra, ödemeyi yaptığınızı belirten dekont görselini yüklemeniz gerekmektedir. Dekont bilgisinde; adınız, soyadınız, ödeme miktarı ve alıcı banka hesabı bilgileri görünebilir olmalıdır. Ödemeyi onayladığınız zaman <a href="https://www.shopier.me/members/pages/rules_public11.php">Shopier kullanıcı sözleşmesini</a> kabul etmiş sayılırsınız.</p>

<small id="payment-status" style="display: none;"></small>
<center>
<label id="select-receipt-label" for="select-receipt-input" style="display: inline-block; margin-top: 0px; width: 295px; padding: 10px; font-weight: bold; text-align: center; background-color: rgb(20, 217, 173); color: white; font-weight: bold; border-radius: 5px; cursor: pointer;">Dekont Yükle</label>
<input onchange="onReceiptSelection()" id="select-receipt-input" type="file" name="dekont" class="required" accept="image/png, image/jpeg, image/jpg" style="display: none;" required="">
</center>
<br>
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

                            </div>
                        </div>
                  <input id="hash" name="hashDurat" type="hidden" />
                </div>                <div class="form-payment-action">

                    <div class="form-payment-action__item form-payment-action__item--select">                    <select class="custom-select custom-select-lg btn-block" name="adv" required id="adv" >
                        <option value="0" id=taksit_0" selected>Tek Çekim</option>
                    </select>                    </div>

                    <div class="form-payment-action__item form-payment-action__item--badge">
                        <span class="inline-svg scale-image-secure-badge">
                            <svg xmlns="http://www.w3.org/2000/svg" width="131" height="37" viewBox="0 0 131 37">
                                <g fill="none" fill-rule="evenodd">
                                    <path fill="#4A4A4A" d="M36.07 10.06c-.52 0-1.0183-.0833-1.495-.25-.4767-.1667-.845-.3867-1.105-.66l.29-.57c.2533.2533.59.4583 1.01.615.42.1567.8533.235 1.3.235.6267 0 1.0967-.115 1.41-.345.3133-.23.47-.5283.47-.895 0-.28-.085-.5033-.255-.67-.17-.1667-.3783-.295-.625-.385-.2467-.09-.59-.1883-1.03-.295-.5267-.1333-.9467-.2617-1.26-.385-.3133-.1233-.5817-.3117-.805-.565-.2233-.2533-.335-.5967-.335-1.03 0-.3533.0933-.675.28-.965.1867-.29.4733-.5217.86-.695.3867-.1733.8667-.26 1.44-.26.4 0 .7917.055 1.175.165.3833.11.715.2617.995.455l-.25.59c-.2933-.1933-.6067-.3383-.94-.435-.3333-.0967-.66-.145-.98-.145-.6133 0-1.075.1183-1.385.355-.31.2367-.465.5417-.465.915 0 .28.085.505.255.675.17.17.3833.3.64.39.2567.09.6017.1883 1.035.295.5133.1267.9283.2517 1.245.375.3167.1233.585.31.805.56.22.25.33.5883.33 1.015 0 .3533-.095.675-.285.965-.19.29-.4817.52-.875.69-.3933.17-.8767.255-1.45.255zm9.17-.7V10h-4.95V3h4.8v.64h-4.06v2.49h3.62v.63h-3.62v2.6h4.21zm4.74.7c-.6933 0-1.3183-.1533-1.875-.46-.5567-.3067-.9933-.7317-1.31-1.275-.3167-.5433-.475-1.1517-.475-1.825s.1583-1.2817.475-1.825c.3167-.5433.755-.9683 1.315-1.275.56-.3067 1.1867-.46 1.88-.46.52 0 1 .0867 1.44.26.44.1733.8133.4267 1.12.76l-.47.47c-.5467-.5533-1.2367-.83-2.07-.83-.5533 0-1.0567.1267-1.51.38-.4533.2533-.8083.6-1.065 1.04-.2567.44-.385.9333-.385 1.48s.1283 1.04.385 1.48c.2567.44.6117.7867 1.065 1.04.4533.2533.9567.38 1.51.38.84 0 1.53-.28 2.07-.84l.47.47c-.3067.3333-.6817.5883-1.125.765-.4433.1767-.925.265-1.445.265zm6.95 0c-.9067 0-1.6133-.26-2.12-.78-.5067-.52-.76-1.2767-.76-2.27V3h.74v3.98c0 .8133.1833 1.42.55 1.82.3667.4.8967.6 1.59.6.7 0 1.2333-.2 1.6-.6.3667-.4.55-1.0067.55-1.82V3h.72v4.01c0 .9933-.2517 1.75-.755 2.27-.5033.52-1.2083.78-2.115.78zm9.88-.06l-1.6-2.25c-.18.02-.3667.03-.56.03h-1.88V10h-.74V3h2.62c.8933 0 1.5933.2133 2.1.64.5067.4267.76 1.0133.76 1.76 0 .5467-.1383 1.0083-.415 1.385-.2767.3767-.6717.6483-1.185.815l1.71 2.4h-.81zm-2.18-2.85c.6933 0 1.2233-.1533 1.59-.46.3667-.3067.55-.7367.55-1.29 0-.5667-.1833-1.0017-.55-1.305-.3667-.3033-.8967-.455-1.59-.455h-1.86v3.51h1.86zm9.58 2.21V10h-4.95V3h4.8v.64H70v2.49h3.62v.63H70v2.6h4.21zM81.19 3c.8933 0 1.5933.2133 2.1.64.5067.4267.76 1.0133.76 1.76 0 .7467-.2533 1.3317-.76 1.755-.5067.4233-1.2067.635-2.1.635h-1.88V10h-.74V3h2.62zm-.02 4.14c.6933 0 1.2233-.1517 1.59-.455s.55-.7317.55-1.285c0-.5667-.1833-1.0017-.55-1.305-.3667-.3033-.8967-.455-1.59-.455h-1.86v3.5h1.86zm8.52.99h-3.9L84.95 10h-.77l3.2-7h.73l3.2 7h-.78l-.84-1.87zm-.27-.6l-1.68-3.76-1.68 3.76h3.36zm5.04.05V10h-.73V7.58L90.93 3h.79l2.4 3.93L96.52 3h.74l-2.8 4.58zM105.53 3v7h-.71V4.4l-2.75 4.71h-.35l-2.75-4.68V10h-.71V3h.61l3.04 5.19L104.92 3h.61zm7.23 6.36V10h-4.95V3h4.8v.64h-4.06v2.49h3.62v.63h-3.62v2.6h4.21zM120.35 3v7h-.61l-4.5-5.68V10h-.74V3h.61l4.51 5.68V3h.73zm3.64.64h-2.46V3h5.66v.64h-2.46V10h-.74V3.64z"/>
                                    <g stroke="#AFBCCE" stroke-width="1.6">
                                        <path d="M4 17V9.2418C4 4.7088 7.6 1 12 1s8 3.7088 8 8.2418V17"/>
                                        <path d="M12 27v3m0 6C5.925 36 1 31.075 1 25s4.925-11 11-11 11 4.925 11 11-4.925 11-11 11zm0-9c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3z" stroke-linecap="square"/>
                                    </g>
                                    <path fill="#52CBB0" d="M42.54 30.848V32h-8.838v-.918l5.238-5.13c.66-.648 1.107-1.209 1.341-1.683.234-.474.351-.951.351-1.431 0-.744-.255-1.323-.765-1.737-.51-.414-1.239-.621-2.187-.621-1.476 0-2.622.468-3.438 1.404l-.918-.792c.492-.576 1.119-1.02 1.881-1.332.762-.312 1.623-.468 2.583-.468 1.284 0 2.301.303 3.051.909.75.606 1.125 1.437 1.125 2.493 0 .648-.144 1.272-.432 1.872-.288.6-.834 1.29-1.638 2.07l-4.284 4.212h6.93zm4.932-6.282c1.824 0 3.153.327 3.987.981.834.654 1.251 1.569 1.251 2.745 0 .732-.171 1.386-.513 1.962-.342.576-.855 1.029-1.539 1.359-.684.33-1.524.495-2.52.495-.9 0-1.755-.147-2.565-.441-.81-.294-1.461-.687-1.953-1.179l.63-1.026c.42.432.972.783 1.656 1.053.684.27 1.422.405 2.214.405 1.044 0 1.851-.234 2.421-.702.57-.468.855-1.092.855-1.872 0-.864-.321-1.518-.963-1.962-.642-.444-1.725-.666-3.249-.666h-2.682l.648-6.318h6.894v1.152h-5.76l-.432 4.014h1.62zm12.096-.108c.828 0 1.563.156 2.205.468.642.312 1.143.753 1.503 1.323.36.57.54 1.233.54 1.989 0 .768-.186 1.446-.558 2.034-.372.588-.885 1.041-1.539 1.359-.654.318-1.389.477-2.205.477-1.668 0-2.946-.549-3.834-1.647-.888-1.098-1.332-2.649-1.332-4.653 0-1.404.24-2.592.72-3.564s1.152-1.707 2.016-2.205c.864-.498 1.872-.747 3.024-.747 1.248 0 2.244.228 2.988.684l-.522 1.044c-.6-.396-1.416-.594-2.448-.594-1.392 0-2.484.441-3.276 1.323-.792.882-1.188 2.163-1.188 3.843 0 .3.018.642.054 1.026.312-.684.81-1.215 1.494-1.593.684-.378 1.47-.567 2.358-.567zm-.108 6.552c.912 0 1.653-.249 2.223-.747.57-.498.855-1.161.855-1.989 0-.828-.285-1.488-.855-1.98-.57-.492-1.341-.738-2.313-.738-.636 0-1.197.12-1.683.36s-.867.57-1.143.99c-.276.42-.414.888-.414 1.404 0 .48.129.924.387 1.332.258.408.639.738 1.143.99s1.104.378 1.8.378zm16.29-8.55c.888 0 1.692.201 2.412.603.72.402 1.284.969 1.692 1.701.408.732.612 1.566.612 2.502 0 .936-.204 1.77-.612 2.502-.408.732-.972 1.302-1.692 1.71-.72.408-1.524.612-2.412.612-.792 0-1.503-.168-2.133-.504-.63-.336-1.137-.822-1.521-1.458V32h-1.224V18.644h1.278v5.688c.396-.612.903-1.077 1.521-1.395.618-.318 1.311-.477 2.079-.477zm-.09 8.496c.66 0 1.26-.153 1.8-.459.54-.306.963-.741 1.269-1.305.306-.564.459-1.206.459-1.926s-.153-1.362-.459-1.926c-.306-.564-.729-.999-1.269-1.305-.54-.306-1.14-.459-1.8-.459-.672 0-1.275.153-1.809.459-.534.306-.954.741-1.26 1.305-.306.564-.459 1.206-.459 1.926s.153 1.362.459 1.926c.306.564.726.999 1.26 1.305.534.306 1.137.459 1.809.459zm7.416-8.424h1.278V32h-1.278v-9.468zm.648-2.07c-.264 0-.486-.09-.666-.27-.18-.18-.27-.396-.27-.648 0-.24.09-.45.27-.63.18-.18.402-.27.666-.27s.486.087.666.261c.18.174.27.381.27.621 0 .264-.09.486-.27.666-.18.18-.402.27-.666.27zm9.18 10.962c-.24.216-.537.381-.891.495-.354.114-.723.171-1.107.171-.888 0-1.572-.24-2.052-.72s-.72-1.158-.72-2.034v-5.724h-1.692v-1.08h1.692v-2.07h1.278v2.07h2.88v1.08h-2.88v5.652c0 .564.141.993.423 1.287.282.294.687.441 1.215.441.264 0 .519-.042.765-.126.246-.084.459-.204.639-.36l.45.918zm10.782.684c-.936 0-1.833-.15-2.691-.45-.858-.3-1.521-.696-1.989-1.188l.522-1.026c.456.456 1.062.825 1.818 1.107.756.282 1.536.423 2.34.423 1.128 0 1.974-.207 2.538-.621.564-.414.846-.951.846-1.611 0-.504-.153-.906-.459-1.206-.306-.3-.681-.531-1.125-.693-.444-.162-1.062-.339-1.854-.531-.948-.24-1.704-.471-2.268-.693-.564-.222-1.047-.561-1.449-1.017-.402-.456-.603-1.074-.603-1.854 0-.636.168-1.215.504-1.737.336-.522.852-.939 1.548-1.251.696-.312 1.56-.468 2.592-.468.72 0 1.425.099 2.115.297.69.198 1.287.471 1.791.819l-.45 1.062c-.528-.348-1.092-.609-1.692-.783-.6-.174-1.188-.261-1.764-.261-1.104 0-1.935.213-2.493.639-.558.426-.837.975-.837 1.647 0 .504.153.909.459 1.215.306.306.69.54 1.152.702.462.162 1.083.339 1.863.531.924.228 1.671.453 2.241.675.57.222 1.053.558 1.449 1.008.396.45.594 1.059.594 1.827 0 .636-.171 1.215-.513 1.737-.342.522-.867.936-1.575 1.242-.708.306-1.578.459-2.61.459zm11.07 0c-.936 0-1.833-.15-2.691-.45-.858-.3-1.521-.696-1.989-1.188l.522-1.026c.456.456 1.062.825 1.818 1.107.756.282 1.536.423 2.34.423 1.128 0 1.974-.207 2.538-.621.564-.414.846-.951.846-1.611 0-.504-.153-.906-.459-1.206-.306-.3-.681-.531-1.125-.693-.444-.162-1.062-.339-1.854-.531-.948-.24-1.704-.471-2.268-.693-.564-.222-1.047-.561-1.449-1.017-.402-.456-.603-1.074-.603-1.854 0-.636.168-1.215.504-1.737.336-.522.852-.939 1.548-1.251.696-.312 1.56-.468 2.592-.468.72 0 1.425.099 2.115.297.69.198 1.287.471 1.791.819l-.45 1.062c-.528-.348-1.092-.609-1.692-.783-.6-.174-1.188-.261-1.764-.261-1.104 0-1.935.213-2.493.639-.558.426-.837.975-.837 1.647 0 .504.153.909.459 1.215.306.306.69.54 1.152.702.462.162 1.083.339 1.863.531.924.228 1.671.453 2.241.675.57.222 1.053.558 1.449 1.008.396.45.594 1.059.594 1.827 0 .636-.171 1.215-.513 1.737-.342.522-.867.936-1.575 1.242-.708.306-1.578.459-2.61.459zm7.596-12.708h1.332v11.448h7.056V32h-8.388V19.4z"/>
                                </g>
                            </svg>
                        </span>
                    </div>
                    <div class="form-payment-action__item form-payment-action__item--button">
                        <button onclick="showAlert()" id="SubmitButton" class="btn btn-primary text-uppercase btn-lg btn-block" type="submit">Ş&#304;md&#304; Öde</button>
                    </div>
                </div>                <div class="row">
                    <div class="col form-group">
                        <div id="kvkk-warning-area">
                            <label for="sales-contract-option" class="custom-control custom-checkbox btn-block">
                                <input id="sales-contract-option" class="custom-control-input" name="kvkk" type="checkbox" value="signed" required="true" checked>
                                <span class="custom-control-indicator"></span >
                                <span class="custom-control-description text-secondary">
                                     <a href="#" data-toggle="modal" data-target="#preNotificationFormModal">Ön Bilgilendirme Formu</a>'nu ve <a href="#" data-toggle="modal" data-target="#salesContractModal">Mesafeli Satış Sözleşmesi</a> 'ni onaylıyorum.
                                </span>
                            </label >
                        </div>
                    </div>
                </div>              </form>
              
                                <div id="card_brand_bottom_side" class="d-flex align-items-center justify-content-around hidden-md-up mb-4">
                <span class="inline-svg scale-image-visa">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="66" height="22" viewBox="0 0 200 65">
                      <metadata><?xpacket begin="﻿" id="W5M0MpCehiHzreSzNTczkc9d"?>
                    <x:xmpmeta xmlns:x="adobe:ns:meta/" x:xmptk="Adobe XMP Core 5.6-c142 79.160924, 2017/07/13-01:06:39        ">
                       <rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#">
                          <rdf:Description rdf:about=""/>
                       </rdf:RDF>
                    </x:xmpmeta>
                    <?xpacket end="w"?></metadata>
                    <image id="Katman_1" data-name="Katman 1" width="200" height="65" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMgAAABBCAYAAACU5+uOAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAABmJLR0QAAAAAAAD5Q7t/AAAACXBIWXMAAC4jAAAuIwF4pT92AAAAB3RJTUUH4wUbDiYSKQVDBAAAGNFJREFUeNrNnXu0XkV1wH/z3ZsgxCAJSFKkioSHJIGERwARqtiqaJcsrLIsWgio1GBTUAFXuxbWrrLosshDaVFQFF220qq8fCtixRAghEeAhMjDB4goCchDQJDk2/1jzjnfmTN7Xt93c2/3Wmfd786Zmf2Y2TN79uyZY3bd7RgsGDAMfjtpzQslzbT+pPMZLV83KQYiML41jE0D6WcW6sKIfDU/Tc1QQG5umtHkOxBKBtm9qu5Q+yh8GQfXdDB7YtgJzBzgZcBsMC/BMA5GgN+DeRz4DYZHwPwa+Dnwu6DcuknhxgN6mPEXVQVkyPYatq+WwziwI3B0AbWjgAH+CDwC3AX8YhJwtmEp8OIReH0RcCHwfODdCYzSGvD5QN3DwmxgCfBa4EBgATAXCVFZv/AyPA2sB9YB1wG3AGsnkM4c+BNgMbATsFVhWVPR/6NSpGbX3Y75N+Aj9r/OyKaOcDHt1dLcsp1R9CowHwHuy59B+jC+FYxtVc0g2f1xIVYpyR9tvLQN2FF3EwC9XvvdIWBWhstqM6g3S01r6naZBnrVDNJpJ30GeQfw18ARYGYMx2uy7e8Hvg3mG8AqDM9kNB5gMONbUzCDzAZzDoZjwYwPSAn11Q5fg3xPAtvlIGxDD1gBXArc4dMrnb/Vb42vrLLWQmrBUVjNfmsR1f3NQG1eSe6z3CdPugk+I+6/x+B0YEc59443eBLXN1CVo8JTK0cYZgCnItwPfA14e5Wm85WEZNvvBpwCXAucm9UE/VrRswe1Rdj+cQLW2omwE+BvkPwS4KWFQqAHfAt4D3b62tMSI5cBD5cLs/M7q01kDNs5XpWFyvTszNEP2gkabAMcnyQsSK8A/Jpmiq5wi2l3gD8rrLSb5fbgS+PMVBqcBPwMOAeYF2yPfF4LQAA25uU1mLFp1e8+CY2aBdyIXQJMFL0HFTJHd1i6F/gi8C7gFcCfA2chrM0abeNCJNpwwlX5ZItVEpHc5+3AVonZIcXfBU4WfxTc3yur1C/BkU9WKENujSxE7AJgBcingTn5ylBqGSTbfgUpkD70xgYDXBo+C2w9wfS+OgdxG2Lz9ibsiHkGsDfwGuA84EFfPprMQpm0TgLY2euwIurzl8Mn541AwQ72HMiFg45bQ9PQO1f0JyCISxBuUwdSxkKMHgeyFjg0iibvRVl+N7kPcnuWmVvPhOmsc4F35A9o2fTOLxQAScO2BTcApwKvBN4NrHRfj2Rm1T+OycltO4zJbe/5wAExqWUkfxXhmUGnrfA3BeSgOK9JQm8DHvfKmGrE9cufAXxJr3ri140Jvu4gx8QyPYwZC46OHTitbEDLpnfvHORtKFGQGvrAV7Aj15tArsskLsJgAwvT6Ksy+bPHqWH82fSe76T75tVewYbLM7Nu9nEHF+b/DJwZpjcXhpWHl+m2NKpq9jCGjLUHwLIkncPROw/YtURKwyhIG34AvA7rzcgg1JWZl0/YD7ufkABn9I4948CxxcJ0890KssY1r7w1wb5pmqMDxHrfHKl5dDrUccDHJnDtULoO08ql1x+0FSQJR4PMiFU1Gr2yb5Y5WD2jKkgNF2BtYp2T6NrEeTkDYY+4qxAG5lVy1Hwndm+hTJgunOmUM55yGmh5sIZbh6123xrNtNqD2qxKwoSMtrllbyHVYAZML3vf46Nbll4OzpOhhYlSEIAvAzflMxaE3bKwmazF3qkjNv5jwNUdxN0CuwM7+BVlr8OewlEQaZlWTsErMujN5Gtoebi/hUeAn6aw2G7Wg37SvNo7vk7IpTe6DjswTa9L+QjQXqwCcPZotjhgXZcZeJPasQDN9CkT5kUd21gzEw4bzWyRNSCbfRztvHLCQC4Fi3Atn0bgsGYLrELYnJzxTcsTlxzQYnTn0huF+RSsYMdzM3qg25PfBf4AbF2vM3UmuvE+Tlp6Csxj78RB1UFcPlntFOE8j2fxZpD93HIBXGI8usVabCu8sl0cho9n0Bvnz319Pzae6iHgd8BzIGNgZgCzQeYgZh6GBTR7Eaos785pCKPPiF2YBWapR7bHRqD/KPINtP0O2Fn/3hzah1OQcNjDc1gz63D/ld5g4juFMjxZSQ0ZA96T6CTEX8hV2M7Tejfe+t3QcnCi0gA0+W930z3Zvg1hxwx6c3i9GLgEqxw5MBvYC3gdyKFgXktbYVL1tL1X6c3B9/lEZ/CXlq+WfAiZClJoYmXFBK0e0hav4eXYjbcMAQSfY4CZ+XjVDO7s0QTqOQ09C2TfsBdJS3BfiHDDYMO/DmVv2+rdjhNhKIzzYWwo0TLylQPsALESOAt4Mza64kQGrt2Ei7fIe7W8aE00mpcuw+tooUBBshn9foK4ADNO2pJg7d6yR4X3h3GG8Dv/rgOud1+oiBcQHKaU37487gN+E+FjJshfBN/m2eLPICzBbuiNChuxM9D+2MXub+PZDaY3RsZ68S3YgVEhP6PdiuQhIPkxWRkKUo8C2bp0PdbU0uvKW6zHwzbExPabdgUOHWG0Bfikl9+oCrJIKRvB4eFa5xDvD0CLgekZ9Mbk+y/Aw1bIeVN4JqzGrjcDLPZhbNweCUjvnp8W5yshxuCLYIb9sOeCkpDu9eFwhxD8EfhR1AuR5FJ2D7tEaJk6qoacPJwwG3gO5CsZ3itox45licfLdKv/zsEzzy9X2snlOw0f0s9ZC0wAiO03vWlIX1KxpDsDhyf58l/3gaezZOMnT0PYKz2xpRSkXDlq+EmKZsUWb6dFbMSkfbU0e7TVyboI4dmBkNrmVVcptRgv4rhctAM5YSrOHBxzIyJrpUXNkBltHFZRWs/Ezio05ujY9Nyq/1GCfMVkKVcD/xovp8qj/r1PDnGKglQV9caHVQ6wcfwEGy5d5SJCp7/i+nGUW650VBKAT/lJKtJdQOap/EVxNC/6wJ0qTYN+mzADskbM1ozaPs/emVUahRkRhKrvZMVdvQh4bzF/Fi4FLhthT+TQVAbwFKTS/t44ZYfqPViJF50aAw9Pj+ABqugq/fSocNLCXAnyS3ddQGjXfkl+/Wqm1SBPeKacm7WnlMtFVOd7F3B8euatTNjGDFNNvkQVYs989MZyTbmlIK3z5UXrxmuAX6qyyZpp8zxZfgP0plXJI40mm2l7gTJdnp20cAc06mj0MuCQMpyeMJUoWROSx17Deeman7f65bzO+PusGSloZjVwKdGAUq3Ovg0NkfahrWgBO5D0xku6zt83pcvMrNsZOIIezGBGS1tAEyIUht6gAgO96Yw4c7ThewpjUZo7QlrkZagP5Osz97JObRHhqPAIbRd1XbYJ+/CeJVH+SCbn7EI/FH5V7KX7JPZ49S65ArHFNtuncXVHoDeecqC0n0Pxwmc0vtQB4jOtWffGjHWY9u84yAEpOnsD5ZgG+RGXOXBDhLgEMwI2HCAXesBJo4227RODbZNH7RQ97AnLMDtqgrMOW6Wic2GNS2+kbfJs8b/E7r18FGfxHoM6hqpfKYoiE5GBQyd/HXP6CH3tshby1WqOPHnslULUsx6HaSVnhXPhLpxQjWwOIsQHz4G8Gdg+TVJwtH2B7uK8QakOGnsBs+JsRPl7AuRW0hpyF5oJkYUzyOs4dm/kfmA5NiwnE/r2RpnmuqX6qp2eVRCRjIkDELYHjvRIyzOzvofwdCtdMVW1ClR5LE5x3GNsGgMXZl3RhDybQX4Ybbi4mfVStLgsfZZfPqiveKoFuBzhKYf8fh87UagIDw3XH1skNnB7gHsN3wURWzwsSDXZyT8X+HfsbSjvIwvq2WRTNZtUplRvrFVv1vPh+Ewb5e+iNinY2L8/ZKzDtOSkJ6unlZpAcG+yKzez9onnB+xNe0cU2v9dXOd7jdgMkGoD71cmBo+vFWoendb/AJ7JaqMiZ0gDrwA+h90ZPyqPH2MVpF895f3nAyGiRfy0FjwO8s3O++dA1g8pj12BOTFCJ/LAlAbf15OzF9ALw+Wb5+RUJTruBu4Ebvbzmdg+0Px4lcmZa41OmWriPk/L2zMCzk6ap7QHAFdiD4i9Mi3HejYRqyT53uAjge0iA0KM3qtBFdL6IK/xF5C4CmhLK8gvsZGklIzwLTOrE1SmtsLf+vUVmVn6BQjhy9pm4PjQCzrm4OXasPmhwqVI7RUM8ZeCbHPsSGwo+GmpGgdls7xW9fNPZbQ5aZe475r2uWEEczcSDbHlFQTgxxHiEkKSV3nv3dsM34gNOY9XHh5tnwK+rhcKHundH5iRrxAebQ9hPUlK1n6soiNB3AV7kZcuJRPnxTjwCeA7wLbEwFR096XbNtqzJ80Fe1EiUOT7AMhKdyBp8txMNnhl94/lngwFuUZnukVoeBbZCWRuZITVR7n8qfZitSWFWKjEfiN6kW7SX5iK6b51t9droMHzAna0eyQs6pHWYVqGNwP3EI1bquO7+jlm1oc9XHELog1fjky066C6PLvczDqYyMHByVCQa8vMDy/D4BC/u2jeGXhDduPro+05Xv/vR80raN9gMtzMtTo2yko/6mrfWMnjzmjnLpqlk/TOxbpSw7a6kGNmbQu8dwhHTf33PyNy+QNwU7mZJWBj94J7bpOhIL+iXkQFIdpwrXWI02mXZq01wji/DbLBm52M2NkjPBruM9pI3b2RsgWm8g5JP3Y4bSN2DXR5Ps4sWzz2YhzreZunZq93z+ObhEtR91yy2us2kHsSa7W16SqDfSR4UchkKAjAD+IjhM5UJe9qw9B0M/5dVCDpxfq5gUJVR1WlvD31zXxZXiSvY26OL9Cl8golN2z72LtrTxogLB4gcuhty3IMJzy/DbW8hMjIcvIQbV/DZ1WcLnRCd4rWYYcQgMlSkGsjxAWgybCfny5HYL84lCobSr4X+F81g+nFxPJq/DiLEjncBzyZ5Fw2p0bjGi7Cnr682q+kS1upAqn87QR8JkJ4q4zzvJ72fWfJwcWj+wrSoByxCLHhvQh6siZLQTrxMrH53n0nwquooy4HMl+WnJGiIJ/yG7Eqb3qhaGGoL6mu85bPXNeTAmMGUbR5dwDch3AU1j17Z1QOw8203X+XEd0nUXGfrr/PmkWuAdnYWiS2MjvycUObysysRQSuvJ0sBfktsCZpCIf7d9tGVON4Chr/BdQFX0voofVmcKTJXvxm3ygi/UBgYBi+iW3o91J/aq7MGRJJ9vj7WLRK99kRLdIhf/3TmbGq4wfqV8bquKxi83FbPEvFwmQpCDju3lwhNRlad0/JBwDjli0wJYRL6MZdCdVwVXuv1LLTEA4ptG27L1YlPD02W882i2zaRMKu1+ALWLfsCcBdhbNDLiN/g3riU+XpI3kTu2j/Py7ClYPDjp3DctLH3ViX9AwdxqlGbfScvFv2+WGYuHinFmFByyR/n15HptyR84KL4/jVRnugbZrlepHgUQIhJgMwHRdzH+m/gA0MLFISsF8K2wfrzCgwPSKZBsljwOvT9TAN+3m4PFw+2v8G/K9tB9GxLvIu9UL1ZE3mDHI98EKyU+vT+x7V7yXAy0cwDW7Ghnn7YLAbdBLU8IU6jiCu7uu1qYnD7wV2xBTp24V78QIbgE9X8vt8Ib0p/pRLpr1e/G5gm/KZC7B95R+yOKzD7K3re1OYv6iZpZ7vGf5u3nJ4FuEOTMeOD1oQzot5Vd95fzhL+59gpWeiQtK8AufzcBm4/OS74uIx8XciiEh170LxuPYYdua9EeSS4a9jdUDfE3HhlHQ1Gi4BzNPAERR/E12eBbOtV2USJ4uw3yVxPmc9mQoC9hhuS0G0jqZytB32g6JviDCYksFj2COnOvR6sf0PLN3ZyqDx95NQxdaGyLwHoL6BpFeflS86Bfp54EmEr412ITTghInXA4xDx4FgFodlEhhkBj9nAf8DKPc3j9QOqP1MGMewhE7s4GSaWOB8RrlDf+x/BBEuxjGvik2D1jlm7TGxfjaTdjzScGZW2INVdL2SGQQINsdgi0yvr2M/oVdarsuf/2EiN1hxxG+zaBmGpTcbpxdOM9kKsgJJb5QpnIwD88JHMgP25gD6COfrulGPlNF7nA7EvdWc/MYXgF/QXFHTyZD+BnoABgt55wYS7zI4rW45l6QsQ3Jt/m1dL1vLr8m3LfBXev0pGeo4R2j7kgHN+wruZCvIJppNwxhjkjlYZI8QVxE6H+98YDIIC4afuQC0CN6212yoxXcFbddnyyPXuEDVupWI4NLRVn6jZxZATgHGh3AfZ70ekt6csp7jIXCz4hZ9bkCDLTvVnhukx1BdWBEhWbuCqKzx9St+esPMHKWsq0oyu1yW3gDxK/tbrX+5Xn/Mi5SDW8ksqYqKBrS9Eea0236yZxCA7yZG207ayFPt3XSvIHLAtBbngUfaHqwIrjBtt7t19kMxX9uRfR1PATQzSgPHJ+hVePXy/WwwgDiK/iZgx3LF0+Sa0fZBGkvNLMA2yOJuwmTDLTQBewnGJmaqPStctN9aAwSR7QiyewFBXSI2Iaz0ZyV19liOXaucjr3VZWLB9rB9gQ/pwioyW6pTfO31h0D3SG3ZuiaCM6OOZNmMAa1zzHsqFGQTzXVAKcYSDJLKz7N4nzJQzKu4pfOaILq8xr8HeMItaEJrj91BdgDOxi7sLyLzkuVMeAvIzTg+1Zj4Qi/kHsuXl3EXnNDxYT1XhZmDZtZQA5rjyZoKBQGqWwWTgtAZTJtZDXwuLgyTcxtgIkAxmXy9mkHX2XbjzMBujK7AbjJeCLyNrM/TOTCO3XC7Avg23b2v4UbbL7QXaIPPKfBBtdKhBj59hJcsemPokgOac2n6ZG8U1vDjpoM2f7uceBtH/rtoHYBwdlRYvayNtoOiuAKoW/n9UH/drPtTvKOfTR0LwSzE3iclIqw3hruxF0BsxM5Qz2Ejlcexn02YU9V3GO2zM0l6s+Bi+8cJktoGZJm6uejVH2yv3F3vdOZov4km74I99/IwTJ2CrAYeRdghphuF0utkkWvAPBzNXJtXYf2YThNJnEubl2mVn79tszewMLGz3C48H8dnX9rhRumsciHNGrJ2MQvYuKutsisq0sfitk/zF6/oEKrbbqbKxALnlOEWmWrPCftt+znBiWCvHVK8StmLxA20z0oDzU64D4tiVWatw5K2+MiL2udp3yTjRgB8MIprKsys4deNzdmQqZpBwJ5Tf+dwu8jJEeIXtv4ImDGQZIjHQuVD9HFy3Bfr3Bfduhw4LGlutlMlFJ9UOtpGXvj5jkWqHXTnS1W8Bsz8cDmNNqFjjn0MeAxhbGgza/BvH2sqnZrFuE/vkjphKhVkVZDmLAFrnaTOIheE0VazRjo4EZwrfkpoaxp/jT9aGQK984Agoqx1WACG66xaBReCfG2Q7jg3ThtxXXMb9sb5iYYTgW3L140cBDId+ONUmljrcL4RnjAhov3YKdtH+FLQaqrduxjSdzmxf8A7liKoBv+EW/cbgfaZD+wYrlo3IYb7+GWKfBXXt2jvjrvh9rOxtz66dZSZN5coa7IRQQBuHtJLN5PqkompVBCwB/KH7H/BDF8k9n3EvgBZX++dBaLcKFjQ+MItrh4ER9ODRxsguplKlSGSSfg68NZBgqfgHyKrH0XXP5cXMFkA0lr/Fde9kDzGtihcm581dxSVyOK8euIXw9WwBOvFGlZZ7wN50B8Z1biv+SkMcTmUNn72Yv0s4GgnybVpx6hvns9b/Gqor0HYMJDFhCrJuiC7aXoPg6lXkM4HdkpHUS/fGlK3OLaDE+PQ6bTFjd+5ULkfzIh2o4YkE2xqsvGHMrN+hQ1XP8OVndddjgZekq9w2gu5yPMwDqskfkR24BbLLHr3halXkIeBB4I0ZwnYgTOJglR7H7V5FV1/LI7iStO2PvzeeeYAh7tlJ8LMGkaWAnA+9gz7lU42/WOmH6IIPCKexB5FcPMM8ylA/bjCepBHCwVIq/1fPNUKAqDHZZX7xZ8EuSLa6ZuzHznCEteDVbaoBe3beUb1YAnIZY37dGicsdkhOfs9DVyAveb1w6DQ4sNi4EAfZ9FM+1W8D+JUilhyk0v8LM/AW6qKMSjDGcD+/x8U5FqXuKHt6YuTWfPNqwWotwdmLWpr6Ezvba+ZAxuAd2H99suw14g+karcSS2faWtYgXByhfsU4KdBwfnjTee+3Ox1Tfvvf4Xxde+8CoAJus1ruKNINm7yG6dyH6SGa7BeDN2tlPZZG6AvwifiaOzsYUgGJwLMxPBNbGxTmAgvWag08Odgfq8WqGcxn9VHsEp+MTATG3+1L/BqkD3A7A7Mim8t1C/VTM8irMVwJ3bWXoV6DLgDetTxVsB9YB6qGCppL7Bt/SjIdVHc/c3NJXoB4gh1mxZcbd3opq8SGKZ3DMwDZtc9jxtkdH9MAZhWn2/9ddJoTandvzGoFGQs8xYZ0/1hfDqy09o0jNnHk3OsLgAzE5gHZi6GOcD2YGYBM8BsY0zlccM8DzwD5ingMYzZgA1qvB/MRl2+EdnqVwxZrQm1gwnyoKQloDddlYsx9UCjyTJAskZHgt7/AyhQbiAmQAzIAAAAAElFTkSuQmCC"/>
                    </svg>
                    
                </span>                <span class="inline-svg scale-image-mastercard ml-4">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="73" height="60"
                         viewBox="0 0 78 61">
                        <metadata><?xpacket begin="﻿" id="W5M0MpCehiHzreSzNTczkc9d"?>
                            <x:xmpmeta xmlns:x="adobe:ns:meta/" x:xmptk="Adobe XMP Core 5.6-c142 79.160924, 2017/07/13-01:06:39        ">
                                <rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#">
                                    <rdf:Description rdf:about=""/>
                                </rdf:RDF>
                            </x:xmpmeta>
                            <?xpacket end="w"?>
                        </metadata>
                        <image id="Katman_1" data-name="Katman 1" width="78" height="61"
                               xlink:href="data:img/png;base64,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"/>
                    </svg>
                </span>        <span class="ml-3">
<svg width="73px" height="44px" viewBox="0 0 45 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g id="American_Express_logo_(2018)">
            <polygon id="path3078" fill="#016FD0" points="0.044044044 0.0440528529 43.9787179 0.0440528529 43.9787179 23.7612993 41.8040697 27.1591872 43.9787179 30.1833085 43.9787179 43.9787267 0.044044044 43.9787267 0.044044044 21.620631 1.40319871 20.0576048 0.044044044 18.5625341"></polygon>
            <path d="M8.57273934,30.6590106 L8.57273934,23.7612993 L15.8761346,23.7612993 L16.6597099,24.7827864 L17.4691958,23.7612993 L43.9787179,23.7612993 L43.9787179,30.1833085 C43.9787179,30.1833085 43.285447,30.6521133 42.4836472,30.6590106 L27.8047777,30.6590106 L26.9213273,29.5716865 L26.9213273,30.6590106 L24.0263277,30.6590106 L24.0263277,28.8029153 C24.0263277,28.8029153 23.6308664,29.0620044 22.7759059,29.0620044 L21.7905186,29.0620044 L21.7905186,30.6590106 L17.4072448,30.6590106 L16.6247891,29.615616 L15.8303196,30.6590106 L8.57273934,30.6590106 Z" id="path3082" fill="#FFFFFF"></path>
            <path d="M0.044044044,18.5625341 L1.69098849,14.7229241 L4.53920693,14.7229241 L5.47386691,16.8737181 L5.47386691,14.7229241 L9.01446498,14.7229241 L9.57086855,16.2774543 L10.110283,14.7229241 L26.0038978,14.7229241 L26.0038978,15.5044372 C26.0038978,15.5044372 26.8394111,14.7229241 28.2125243,14.7229241 L33.3694207,14.7409469 L34.2879456,16.8635924 L34.2879456,14.7229241 L37.2509025,14.7229241 L38.0663956,15.942213 L38.0663956,14.7229241 L41.0565357,14.7229241 L41.0565357,21.620631 L38.0663956,21.620631 L37.2848816,20.3973914 L37.2848816,21.620631 L32.931641,21.620631 L32.4938613,20.5333069 L31.3235634,20.5333069 L30.8929091,21.620631 L27.9406933,21.620631 C26.7591726,21.620631 26.0038978,20.8550751 26.0038978,20.8550751 L26.0038978,21.620631 L21.5526667,21.620631 L20.6692158,20.5333069 L20.6692158,21.620631 L4.11726058,21.620631 L3.67978254,20.5333069 L2.51321658,20.5333069 L2.07883043,21.620631 L0.044044044,21.620631 L0.044044044,18.5625341 Z" id="path3080" fill="#FFFFFF"></path>
            <path d="M2.27390723,15.5732649 L0.0525387748,20.7380501 L1.49876425,20.7380501 L1.90863433,19.7038254 L4.29140236,19.7038254 L4.69914891,20.7380501 L6.17722959,20.7380501 L3.95798454,15.5732649 L2.27390723,15.5732649 Z M3.09577085,16.7752665 L3.82206947,18.5825213 L2.36734887,18.5825213 L3.09577085,16.7752665 Z" id="path3046" fill="#016FD0" fill-rule="nonzero"></path>
            <polygon id="path3048" fill="#016FD0" points="6.33013421 20.7371824 6.33013421 15.5723928 8.3853011 15.5800256 9.58065602 18.9099536 10.7473871 15.5723928 12.786119 15.5723928 12.786119 20.7371824 11.494922 20.7371824 11.494922 16.9315479 10.1262261 20.7371824 8.99384356 20.7371824 7.62133117 16.9315479 7.62133117 20.7371824"></polygon>
            <polygon id="path3050" fill="#016FD0" points="13.6695694 20.7371824 13.6695694 15.5723928 17.8829491 15.5723928 17.8829491 16.7276769 14.9743579 16.7276769 14.9743579 17.6111255 17.8149913 17.6111255 17.8149913 18.6984496 14.9743579 18.6984496 14.9743579 19.6158783 17.8829491 19.6158783 17.8829491 20.7371824"></polygon>
            <path d="M18.630484,15.5732649 L18.630484,20.7380501 L19.9216809,20.7380501 L19.9216809,18.9031928 L20.4653425,18.9031928 L22.0135048,20.7380501 L23.5913985,20.7380501 L21.892455,18.8352372 C22.5897119,18.7763988 23.3089489,18.1779548 23.3089489,17.2488501 C23.3089489,16.1619972 22.455892,15.5732649 21.5038218,15.5732649 L18.630484,15.5732649 Z M19.9216809,16.7285445 L21.3976378,16.7285445 C21.7516995,16.7285445 22.0092576,17.0055023 22.0092576,17.2722066 C22.0092576,17.6153317 21.6755478,17.8158687 21.4167512,17.8158687 L19.9216809,17.8158687 L19.9216809,16.7285445 Z" id="path3052" fill="#016FD0" fill-rule="nonzero"></path>
            <polygon id="path3054" fill="#016FD0" points="25.1544265 20.7371824 23.8360464 20.7371824 23.8360464 15.5723928 25.1544265 15.5723928"></polygon>
            <path d="M28.280482,20.7371824 L27.9959091,20.7371824 C26.6190165,20.7371824 25.7830354,19.6524128 25.7830354,18.1760256 C25.7830354,16.6631656 26.6096567,15.5723928 28.3484398,15.5723928 L29.7755523,15.5723928 L29.7755523,16.7956324 L28.2962639,16.7956324 C27.5904141,16.7956324 27.0912215,17.3464781 27.0912215,18.1887676 C27.0912215,19.1889902 27.6620266,19.6090823 28.4843553,19.6090823 L28.8241437,19.6090823 L28.280482,20.7371824 Z" id="path3056" fill="#016FD0"></path>
            <path d="M31.0901093,15.5732649 L28.8687413,20.7380501 L30.3149667,20.7380501 L30.7248366,19.7038254 L33.1076049,19.7038254 L33.515351,20.7380501 L34.9934317,20.7380501 L32.7741871,15.5732649 L31.0901093,15.5732649 Z M31.9119734,16.7752665 L32.6382716,18.5825213 L31.1835514,18.5825213 L31.9119734,16.7752665 Z" id="path3058" fill="#016FD0" fill-rule="nonzero"></path>
            <polygon id="path3060" fill="#016FD0" points="35.1442129 20.7371824 35.1442129 15.5723928 36.7858168 15.5723928 38.8818883 18.8173774 38.8818883 15.5723928 40.1730852 15.5723928 40.1730852 20.7371824 38.5845734 20.7371824 36.4354099 17.4072545 36.4354099 20.7371824"></polygon>
            <polygon id="path3062" fill="#016FD0" points="9.45619019 29.775562 9.45619019 24.6107724 13.6695694 24.6107724 13.6695694 25.7660565 10.7609787 25.7660565 10.7609787 26.6495051 13.6016117 26.6495051 13.6016117 27.7368292 10.7609787 27.7368292 10.7609787 28.6542579 13.6695694 28.6542579 13.6695694 29.775562"></polygon>
            <polygon id="path3064" fill="#016FD0" points="30.1017491 29.775562 30.1017491 24.6107724 34.3151287 24.6107724 34.3151287 25.7660565 31.4065376 25.7660565 31.4065376 26.6495051 34.2335794 26.6495051 34.2335794 27.7368292 31.4065376 27.7368292 31.4065376 28.6542579 34.3151287 28.6542579 34.3151287 29.775562"></polygon>
            <polygon id="path3066" fill="#016FD0" points="13.8330926 29.775562 15.8845668 27.2250198 13.7842482 24.6107724 15.4109863 24.6107724 16.6618332 26.2268893 17.9169277 24.6107724 19.4799557 24.6107724 17.4072448 27.1931672 19.4624953 29.775562 17.8360144 29.775562 16.6214836 28.1849201 15.4364707 29.775562"></polygon>
            <path d="M19.6158712,24.6116444 L19.6158712,29.7764296 L20.9410468,29.7764296 L20.9410468,28.1454434 L22.3002016,28.1454434 C23.4502387,28.1454434 24.3219439,27.5353277 24.3219439,26.348812 C24.3219439,25.3659075 23.6382609,24.6116444 22.4679724,24.6116444 L19.6158712,24.6116444 Z M20.9410468,25.7796661 L22.3724065,25.7796661 C22.7439383,25.7796661 23.0095102,26.0073782 23.0095102,26.3742959 C23.0095102,26.7189934 22.745279,26.9689257 22.3681593,26.9689257 L20.9410468,26.9689257 L20.9410468,25.7796661 Z" id="path3068" fill="#016FD0" fill-rule="nonzero"></path>
            <path d="M24.8825955,24.6107724 L24.8825955,29.775562 L26.1737924,29.775562 L26.1737924,27.9407003 L26.7174541,27.9407003 L28.2656163,29.775562 L29.84351,29.775562 L28.1445665,27.8727447 C28.8418229,27.8138975 29.5610604,27.2154623 29.5610604,26.2863532 C29.5610604,25.1995047 28.7080035,24.6107724 27.7559333,24.6107724 L24.8825955,24.6107724 Z M26.1737924,25.7660565 L27.6497493,25.7660565 C28.003811,25.7660565 28.2613687,26.0430098 28.2613687,26.3097141 C28.2613687,26.6528436 27.9276589,26.8533762 27.6688622,26.8533762 L26.1737924,26.8533762 L26.1737924,25.7660565 Z" id="path3072" fill="#016FD0" fill-rule="nonzero"></path>
            <path d="M34.9131566,29.775562 L34.9131566,28.6542579 L37.4972497,28.6542579 C37.8796026,28.6542579 38.0451589,28.4476384 38.0451589,28.2210274 C38.0451589,28.0039079 37.8801246,27.7844012 37.4972497,27.7844012 L36.3295276,27.7844012 C35.3145013,27.7844012 34.7492088,27.1659832 34.7492088,26.2375127 C34.7492088,25.4093834 35.2668796,24.6107724 36.7751987,24.6107724 L39.2896348,24.6107724 L38.7459728,25.772848 L36.5713254,25.772848 C36.1556285,25.772848 36.0276633,25.9909806 36.0276633,26.1992869 C36.0276633,26.4133938 36.1857973,26.6495051 36.5033676,26.6495051 L37.7266068,26.6495051 C38.8581111,26.6495051 39.3490978,27.2913325 39.3490978,28.1318338 C39.3490978,29.0354547 38.8019774,29.775562 37.6650095,29.775562 L34.9131566,29.775562 Z" id="path3074" fill="#016FD0"></path>
            <path d="M39.6521473,29.775562 L39.6521473,28.6542579 L42.2362386,28.6542579 C42.6185938,28.6542579 42.784151,28.4476384 42.784151,28.2210274 C42.784151,28.0039079 42.6191135,27.7844012 42.2362386,27.7844012 L41.0685183,27.7844012 C40.053492,27.7844012 39.488199,27.1659832 39.488199,26.2375127 C39.488199,25.4093834 40.0058698,24.6107724 41.5141889,24.6107724 L44.0286242,24.6107724 L43.4849622,25.772848 L41.3103157,25.772848 C40.8946192,25.772848 40.7666541,25.9909806 40.7666541,26.1992869 C40.7666541,26.4133938 40.9247876,26.6495051 41.2423579,26.6495051 L42.465598,26.6495051 C43.5971027,26.6495051 44.0880881,27.2913325 44.0880881,28.1318338 C44.0880881,29.0354547 43.5409686,29.775562 42.403998,29.775562 L39.6521473,29.775562 Z" id="path3076" fill="#016FD0"></path>
        </g>
    </g>
</svg>
</span>            <span class="ml-3">
                <svg 
                 xmlns="http://www.w3.org/2000/svg"
                 xmlns:xlink="http://www.w3.org/1999/xlink"
                 width="61" height="28">
                <image x="0px" y="0px" width="61px" height="28px" xlink:href="data:img/png;base64,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" />
                </svg>
            </span>            </div>
                                
                </div>
                <div class="col-lg-5 d-flex flex-column">
                            <div class="price-card order-lg-1">
                <div class="row no-gutters">
                  <div class="col-12 col-sm-12 offset-xl-0 price-card__separator">
                    <div class="media align-items-center"><span class="inline-svg"><svg width="70" height="70" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><circle fill-opacity=".2" fill="#51CBB0" cx="35" cy="35" r="35"/><path fill="#DCF5EF" d="M7 7h56v14H7z"/><path stroke="#51CBB0" stroke-width="2" stroke-linecap="round" d="M7 7h56v14H7z"/><path d="M9.741 61A3.741 3.741 0 0 1 6 57.258V21h58v36.258A3.742 3.742 0 0 1 60.258 61H9.741z" fill="#FFF"/><path d="M59.387 61H10.612C8.617 61 7 59.325 7 57.258V21h56v36.258C63 59.325 61.383 61 59.387 61z" stroke="#51CBB0" stroke-width="2" stroke-linecap="round"/><path d="M21 36a3 3 0 1 1 6 0m16 0a3 3 0 1 1 6 0M9 7l6 6m0 0l-6 8m6-8v8M61 7l-6 6m0 0l6 8m-6-8v8" stroke="#51CBB0" stroke-width="2" stroke-linecap="round"/><path d="M39 45v2c0 2.2-1.8 4-4 4s-4-1.8-4-4v-2h8z" stroke="#51CBB0" stroke-width="2" fill="#DCF5EF" stroke-linecap="round"/></g></svg></span>
                      <div class="media-body total-price align-self-start ml-4">
                        <div class="total-price__title">Genel&nbsp;toplam</div>
                        <div class="total-price__sum"><?php echo $formatted_result ?>&nbsp;TL</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-8 offset-4 col-sm-12 offset-sm-0 pl-sm-2 pl-xl-4" style="padding-top: 1.5rem !important;">
                    <div class="row">
                      <div class="col-6 text-secondary mb-1">Ara&nbsp;toplam</div>
                      <div class="col-6 text-secondary d-flex justify-content-end mb-1" id="chartInfoSubTotalPrice"><?php echo $sonuc['urunfiyati'] ?>&nbsp;TL</div>                      <div class="col-6 text-secondary mb-1">Kargo&nbsp;ücreti</div>
                      <div class="col-6 text-secondary d-flex justify-content-end mb-1"><?php echo $sonuc['kargoucreti'] ?>&nbsp;TL</div>            <div id="coupon_header" class="col-6 text-secondary mb-1" style="display: none">İndirim</div>
            <div id="coupon_value" class="col-6 text-secondary justify-content-end mb-1" style="display: none"></div>
                      <div class="col-6">Genel&nbsp;toplam</div>
                      <div class="col-6 d-flex justify-content-end" id="chartInfoTotalPrice"><?php echo $formatted_result ?>&nbsp;TL</div>
                    </div>
                  </div>
                </div>
              </div>
                <div class="order-lg-3">
                <div class="media cart-seller">
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
                <h6 class="cart-seller__title">
                        <a style="color:#435062;" href="profil?id=<?php echo ($sonuc3["id"]); ?>-<?php echo str_replace(" ", "-", $sonuc3["adsoyad"]); ?>">
                        <?php echo $sonuc['adsoyad'] ?> ®
                        </a>
                        <?php endforeach; ?>
                    </h6>
                    <p class="cart-seller__text">
                        <?php echo $sonuc['saticiaciklama'] ?>
                    </p>
                                        <div class="cart-seller__contacts hidden-sm-down no-divider">

                    </div>                  </div>
                </div>
              </div>
                </div>
            </div>
        </div>

        
        <div class="modal fade" id="checkRatesModal" tabindex="-1" role="dialog" aria-labeledby="checkRatesModal" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 style="font-size: 13px;" class="modal-title">Kredi Kartı Taksit Seçenekleri</h5>
                <button class="btn btn-link btn-sm dropdown-close" type="button" data-dismiss="modal" aria-label="Close"><span class="sr-only">Menü</span></button>
              </div>
              <div class="modal-body">
                <table cellpadding='5px'><tbody style='font-size: 13px;'><tr><td>Tek çekim</td><td><strong>269,80&nbsp;TL</strong><td></td></tr><tr><td>3 taksit</td><td><strong>93,72&nbsp;TL</strong> x 3</td><td>( 281,16&nbsp;TL )</td></tr><tr><td colspan='3'>&nbsp;</td></tr><tr><td colspan='3'>Taksit seçenekleri arasında gördüğünüz tüm kartlar için yukarıdaki taksit tutarları geçerlidir.</td></tr></tbody></table>
              </div>
              <div class="modal-footer">
                <button class="btn btn-light" type="button" data-dismiss="modal" aria-label="close">Kapat</button>
              </div>
            </div>
          </div>
        </div>

    </main>

            <footer class="footer">
            <div class="container">
              <div class="footer__row">
                <div class="footer__column">
                    <a class="footer__link" href="#" data-toggle="modal" data-target="#privacyAndConditions">Gizlilik ve Koşullar</a></div>
                <div class="footer__column">
                  <p class="footer__text">Copyright © 2023 Shopier.<br class="hidden-sm-up"> Tüm Hakları Saklıdır.</p>
                </div>
              </div>
            </div>
        </footer>
        
        <div class="modal fade" id="privacyAndConditions" tabindex="-1" role="dialog" aria-labelledby="privacyAndConditions" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Gizlilik ve Koşullar</h5>
                        <button class="btn btn-link btn-sm dropdown-close" type="button" data-dismiss="modal" aria-label="Close"><span class="sr-only">Menü</span></button>
                    </div>
                    <div class="modal-body">
                        <p><a href="#" data-toggle="modal" data-target="#privacy">Kişisel Verilerin Korunması ve İşlenmesine İlişkin Aydınlatma Metni ve Gizlilik Politikası</a></p>
                        <p><a href="#" data-toggle="modal" data-target="#secureShopping">Alışveriş Güvenliği</a></p>
                        <p><a href="#" data-toggle="modal" data-target="#pre-notification-form">Ön Bilgilendirme Formu</a></p>
                        <p><a href="#" data-toggle="modal" data-target="#dsc">Mesafeli Satış Sözleşmesi</a></p>
                        <p><a href="#" data-toggle="modal" data-target="#refundTerms">İade Koşulları</a></p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-light" type="button" data-dismiss="modal" aria-label="close">Kapat</button>
                    </div>
                </div>
            </div>
        </div>        <div class="modal fade" id="privacy" tabindex="-1" role="dialog" aria-labelledby="privacy" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Kişisel Verilerin Korunması ve İşlenmesine İlişkin Aydınlatma Metni ve Gizlilik Politikası</h5>
                        <button class="btn btn-link btn-sm dropdown-close" type="button" data-dismiss="modal" aria-label="Close"><span class="sr-only">Menü</span></button>
                    </div>
                    <div class="modal-body"><p>
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
			    İşbu Aydınlatma Metni ve Gizlilik Politikası, 16/08/2023 tarihinde yürürlüğe girecek ve belirtilen tarih itibariyle tüm Kullanıcılar bakımından geçerli olacaktır. </span></span>                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-light" type="button" data-dismiss="modal" aria-label="close">Kapat</button>
                    </div>
                </div>
            </div>
        </div>        <div class="modal fade" id="secureShopping" tabindex="-1" role="dialog" aria-labelledby="secureShopping" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Alışveriş Güvenliği</h5>
                        <button class="btn btn-link btn-sm dropdown-close" type="button" data-dismiss="modal" aria-label="Close"><span class="sr-only">Menü</span></button>
                    </div>
                    <div class="modal-body"><ul type="disc"><li>
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
			    İşbu Sözleşme, 16/08/2023 tarihinde yürürlüğe girecek ve bu tarih itibarı ile tüm kullanıcılar bakımından geçerli olacaktır.</ul>                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-light" type="button" data-dismiss="modal" aria-label="close">Kapat</button>
                    </div>
                </div>
            </div>
        </div>        <div class="modal fade" id="pre-notification-form" tabindex="-1" role="dialog" aria-labelledby="pre-notification-form" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ön Bilgilendirme Formu</h5>
                        <button class="btn btn-link btn-sm dropdown-close" type="button" data-dismiss="modal" aria-label="Close"><span class="sr-only">Menü</span></button>
                    </div>
                    <div class="modal-body"><p><strong> </strong>
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
			</span></span><br>                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-light" type="button" data-dismiss="modal" aria-label="close">Kapat</button>
                    </div>
                </div>
            </div>
        </div>        <div class="modal fade" id="dsc" tabindex="-1" role="dialog" aria-labelledby="dsc" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Mesafeli Satış Sözleşmesi</h5>
                        <button class="btn btn-link btn-sm dropdown-close" type="button" data-dismiss="modal" aria-label="Close"><span class="sr-only">Menü</span></button>
                    </div>
                    <div class="modal-body"><p><strong> </strong>
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
			    İşbu Sözleşme Alıcı’nın elektronik onayı tarihinde düzenlenmiştir. İşbu Sözleşme, Alıcı’nın elektronik onayı tarihinde yürürlüğe girecektir.</span></span><br>                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-light" type="button" data-dismiss="modal" aria-label="close">Kapat</button>
                    </div>
                </div>
            </div>
        </div>        <div class="modal fade" id="refundTerms" tabindex="-1" role="dialog" aria-labelledby="refundTerms" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">İade Koşulları</h5>
                        <button class="btn btn-link btn-sm dropdown-close" type="button" data-dismiss="modal" aria-label="Close"><span class="sr-only">Menü</span></button>
                    </div>
                    <div class="modal-body"><strong>
			        Shopier, Satıcılar ile Alıcılar’ı yalnızca kredi kartıyla ödeme yapma imkanı sunma maksadı ile bir
			        araya getirmektedir. Satıcılar ve Alıcılar, Şirket’in satışa sunulan Ürünler’in herhangi bir nedenle iadesine ilişkin hiçbir sorumluluğu olmadığını
			        kabul, beyan ve taahhüt ederler.<br>
			    </strong>
			    <span style="font-weight: normal"><span style="font-weight: normal">
				<ul type="disc"><li>	
				
			        Shopier üzerinden Alıcı ve Satıcı’nın bir araya getirilmesi ile kurulan sözleşme kapsamında Satıcı’nın sorumluluğu, Alıcı tarafından satın alınan
			        Ürün’ü mümkün olan en kısa süre içerisinde, tam, eksiksiz, usulüne uygun ve ayıptan ari olarak ve Alıcı’nın İnternet Sitesi üzerinden bildirdiği bilgilere uygun olarak göndermek ve Alıcı’nın yükümlülüğü satın aldığı Ürün’ün
			        bedelini Shopier tarafından belirlenen şekilde ödemek ve kendisine gönderilen Ürün’ü teslim almaktır.
			    </li><li>
			        Alıcı, satın aldığı Ürün’ün kendisine tesliminden itibaren 14 (on dört) gün içinde iade hakkını kullanmaz ise, bu süreden sonra Ürün’ü kabul etmiş
			        sayılır.
			    </li><li>
			        Satın aldığı Ürün’ü iade etmek isteyen Alıcı, Satıcı ile bağlantı kurmakla yükümlüdür. Satılan Ürün’ün iadesine ilişkin tüm sorumluluk Satıcı üzerinde
			        olup Şirket’in kendisine bildirilen hukuka aykırı durumlarda yetkili mercilere yapacağı bildirimler haricinde Alıcılar’a yardım etme ve destek sağlama
			        yükümlülüğü bulunmamaktadır.
			    </li><li>
			        Ürün’ün iadesi halinde Alıcı, kendisine teslim edilen Ürün’ü, Ürün’e herhangi bir zarar vermeden ve kendisine teslim edildiği haliyle Satıcı’ya
			        göndermekle yükümlüdür. Bu konudaki sorumluluk Alıcı’dadır.
			    </li><li>
			        Ürün’ün iade edilmesinde kullanılan gönderi sebebiyle doğacak her türlü masrafı karşılamak Satıcı’nın yükümlülüğüdür. Alıcı ve Satıcı, Shopier’in bu konuda herhangi bir yükümlülüğü olmadığını peşinen kabul ve beyan eder.
			    </li><li>
			        Alıcılar ve Satıcılar, Ürün’ün herhangi bir sebeple iade edilmesi halinde Şirket’in tahsil ettiği hizmet bedelini, Mesafeli Satışlar Yönetmeliği’nin 12/A maddesi hükümleri kapsamında bedelin henüz Satıcı’ya aktarılmadığı hallerde Alıcı tarafından cayma hakkının kullanıldığı durumlar haricinde, iade yükümlülüğünün hiçbir şart ve koşul altında bulunmadığını peşinen kabul, beyan ve taahhüt ederler.
			        <br><br>
			        İşbu Sözleşme, 16/08/2023 tarihinde yürürlüğe girecek ve belirtilen tarih itibariyle tüm kullanıcılar bakımından geçerli olacaktır.</span></span></ul>                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-light" type="button" data-dismiss="modal" aria-label="close">Kapat</button>
                    </div>
                </div>
            </div>
        </div></div>

<form action="shippingdetails.php" method="POST" id="buyForm"></form>
        <div class="products-empty-v2" style="display: none">
            <div class="container">
                <div style="margin-bottom: 3rem;" class="products-v2 is-loading-240x300"></div>
                <h1 class="products-empty__title">Ödemeniz işleniyor</h1>
                <p class="products-empty__text">Siparişinizin ödemesi işleniyor, lütfen bekleyiniz.</p>
            </div>
        </div><script src="scripts/storefront/vendor-7b206f27ba.js"></script>
<script src="scripts/storefront/app-38187bd304.js"></script>
<script src="scripts/storefront/sweetalert.min.js"></script>
        <div class="modal fade" id="salesContractModal" tabindex="-1" role="dialog" aria-labelledby="salesContractModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Mesafeli Satış Sözleşmesi</h5>
                <button class="btn btn-link btn-sm dropdown-close" type="button" data-dismiss="modal" aria-label="Close"><span class="sr-only">Menu</span></button>
            </div>
            <div class="modal-body"><p><strong> </strong>
			    <strong>1. TARAFLAR:</strong>
			</span><br><br>
			<span class="modal-text" style="font-weight: bold;">
			    <strong><u>SATICI:</u></strong>
			</p><p>
			    <strong>Adı – Soyadı / Unvanı : Orhan Osmanoğlu</strong>
			</p><p>
			    <strong>VKN veya TCKN : </strong>
			</p><p>
			    <strong>Adresi : ALEMDAĞ CADDESİ AYDINLAR İŞ MERKEZİ 812/1 DUDULLU ÜMRANİYE İSTANBUL / İstanbul</strong>
			</p><p>
			    <strong>Telefon : 5455221861</strong>
			</p><p>
			    <strong>E-posta : gsmhazal@gmail.com</strong>
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
			    <strong>Adı – Soyadı : sa gasg</strong>
			</p><p>
			    <strong>Adresi : sdgsdg Bor Niğde Türkiye</strong>
			</p><p>
			    <strong>Telefon : 5367651502</strong>
			</p><p>
			    <strong>E-posta : gasasgag@hotmail.com</strong>
			</span><br><br>
			<span class="modal-text" style="font-weight: bold;">
			    <strong><u>SATIN ALINAN ÜRÜN:</u></strong>
			</p><p>
			    <strong>Ürünün Adı : Full Lens Case, </strong>
			</p><p>
			    <strong>Adedi : 1</strong>
			</p><p>
			    <strong>Teslimat Adresi : sdgsdg Bor Niğde Türkiye</strong>
			</p><p>
			    <strong>Teslim Edilecek Kişi : sa gasg</strong>
			</p><p>
			    <strong>Fatura Adresi : sdgsdg Bor Niğde Türkiye</strong>
			</p><p>
			    <strong>Teslim Süresi  : - </strong>
			</p><p>
			    <strong>Kargo Ücreti : Nakliyeye ilişkin kargo ve gönderim masrafları Alıcı’ya aittir. Bu bedel önceden net olarak hesaplanmamaktadır.</strong>
			</p><p>
			    <strong>Toplam Sipariş Tutarı (KDV Dahil) : 269,80&nbsp;TL</strong>
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
			    İşbu Sözleşme Alıcı’nın elektronik onayı tarihinde düzenlenmiştir. İşbu Sözleşme, Alıcı’nın elektronik onayı tarihinde yürürlüğe girecektir.</span></span><br>            </div>
            <div class="modal-footer">
                <button class="btn btn-light" type="button" data-dismiss="modal" aria-label="close">Close</button>
            </div>
        </div>
    </div>
</div>        <div class="modal fade" id="preNotificationFormModal" tabindex="-1" role="dialog" aria-labelledby="preNotificationFormModal" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ön Bilgilendirme Formu</h5>
                        <button class="btn btn-link btn-sm dropdown-close" type="button" data-dismiss="modal" aria-label="Close"><span class="sr-only">Menu</span></button>
                    </div>
                    <div class="modal-body"><p><strong> </strong>
			    <strong>1. TARAFLAR:</strong>
			</span><br><br>
			<span class="modal-text">
			    <strong><u>SATICI:</u></strong>
			</p><p>
			    <strong>Adı – Soyadı / Unvanı : Orhan Osmanoğlu</strong>
			</p><p>
			    <strong>VKN veya TCKN : </strong>
			</p><p>
			    <strong>Adresi : ALEMDAĞ CADDESİ AYDINLAR İŞ MERKEZİ 812/1 DUDULLU ÜMRANİYE İSTANBUL / İstanbul</strong>
			</p><p>
			    <strong>Telefon : 5455221861</strong>
			    <strong></strong>
			</p><p>
			    <strong>E-posta : gsmhazal@gmail.com</strong>
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
			    <strong>Adı – Soyadı : sa gasg</strong>
			</p><p>
			    <strong>Adresi : sdgsdg Bor Niğde Türkiye</strong>
			</p><p>
			    <strong>Telefon : 5367651502</strong>
			</p><p>
			    <strong>E-posta : gasasgag@hotmail.com</strong>
			</span><br><br>
			<span class="modal-text">
			    <strong><u>SATIN ALINAN ÜRÜN:</u></strong>
			</p><p>
			    <strong>Ürünün Adı : Full Lens Case, </strong>
			</p><p>
			    <strong>Adedi : 1</strong>
			</p><p>
			    <strong>Teslimat Adresi : sdgsdg Bor Niğde Türkiye</strong>
			</p><p>
			    <strong>Teslim Edilecek Kişi : sa gasg</strong>
			</p><p>
			    <strong>Fatura Adresi : sdgsdg Bor Niğde Türkiye</strong>
			</p><p>
			    <strong>Kargo Ücreti : Nakliyeye ilişkin kargo ve gönderim masrafları Alıcı’ya aittir. Bu bedel önceden net olarak hesaplanmamaktadır.</strong>
			</p><p>
			    <strong>Toplam Sipariş Tutarı (KDV Dahil) : 269,80&nbsp;TL</strong>
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
			</span></span><br>                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-light" type="button" data-dismiss="modal" aria-label="close">Close</button>
                    </div>
                </div>
            </div>
        </div>
<script src="scripts/storefront/settings.js"></script>
<script>
    function processingAnimation() {
        $(".layoutWrapper").hide();
        $(".products-empty-v2").show();
    }

    function alertMessage(errormessage) {
        $('.alert-text').text(errormessage);
        Settings.toggleAlert();
    }
    Settings.enableAdv();
    
    Settings.toggleCart();
    var installmentRateArray = {"0":"269,80&nbsp;TL","3":"281,16&nbsp;TL"};
    var calculatedSubtotal = {"0":"199,90&nbsp;TL","3":"211,26&nbsp;TL"};
    $(document).ready(function () {
        document.getElementsByName("CardNumber")[0].value = "";
        document.getElementsByName("Name")[0].value = "";
        document.getElementsByName("CardExpires")[0].value = "";
        document.getElementsByName("CardSecurityCode")[0].value = "";

        function checkChange() {
            if ($('.form-payment-action__item--select').hasClass('invisible')) {
                $('.total-price__sum').html(installmentRateArray[0]);
                $('#chartInfoTotalPrice').html(installmentRateArray[0]);
                $('#chartInfoSubTotalPrice').html(calculatedSubtotal[0]);
                $("#adv").val(0);
            }
        }

        $(document).on('change', '#adv', function () {
            var selectedRate = parseInt($(this).val());
            //console.log(selectedRate);
            //$('.total-price__sum').html(installmentRateArray[selectedRate]);
            //$('#chartInfoTotalPrice').html(installmentRateArray[selectedRate]);
            //$('#chartInfoSubTotalPrice').html(calculatedSubtotal[selectedRate]);
            var http = new XMLHttpRequest();
            var url = "lib/ajax/changeInstallment.php";
            var params = 'orderid=275665441';
            if (params != null || params !== "") {
                http.open("POST", url, true);
                http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                http.onreadystatechange = function () {
                    if (http.readyState === 4 && http.status === 200) {
                        var response = JSON.parse(http.responseText);
                        $('.total-price__sum').html(response.calculatedInstallmentTotalPrice[selectedRate]);
                        $('#chartInfoTotalPrice').html(response.calculatedInstallmentTotalPrice[selectedRate]);
                        $('#chartInfoSubTotalPrice').html(response.calculatedInstallmentSubTotalPrice[selectedRate]);
                    }
                };
                http.send(params);
                checkChange();
            }
        });

                checkCouponCodeValidity(275665441);
    });

    function checkCouponCodeValidity(orderid) {
        var http = new XMLHttpRequest();
        var url = "lib/ajax/couponCode.php";
        var params = "requesttype=checkcouponcodevalidity" + "&orderid=" + orderid;
        http.open("POST", url, true);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.onreadystatechange = function () {
            if (http.readyState === 4 && http.status === 200) {
                var response = JSON.parse(http.responseText);
                console.log(response);
                if (response.status === "ok") {
                    $('.total-price__sum').text(response.data.total_price_well_formatted.replace("&nbsp;", " "));
                    $('#coupon_value').text(response.data.coupon_price_well_formatted.replace("&nbsp;", " ")).addClass("d-flex").show();
                    $('#coupon_header').show();
                    $('#chartInfoTotalPrice').text(response.data.total_price_well_formatted.replace("&nbsp;", " "));
                    if(response.data.installmentModal){
                        $('#checkRatesModal .modal-body').html(response.data.installmentModal);
                    }
                } else if (response.status === "fail") {
                    alertMessage(response.message);
                }
            }
        };
        http.send(params);
    }

    $(document).on('change keyup paste', '#pd-inputCardNumber', function () {
        var binNumberTemp = $(this).val().replace(/\s/g, "").length;
        if (binNumberTemp === 15 || binNumberTemp === 16) {
            var jeton = $('input[name="binnumber_jtn"]').val();
            $.ajax({
                method: "POST",
                url: "lib/ajax/binNumberControl.php",
                data: {binNumber: $(this).val().replace(/\s/g, "").slice(0, 6), binnumber_jtn: jeton},
                dataType: 'json'
            }).done(function (msg) {
                if (msg.status === 1) {
                    //$('#adv').prop('disabled',false);
                    //$('input[name="binnumber_jtn"]').val(msg.binNumberJeton);
                    document.querySelector('[name="binnumber_jtn"]').value = msg.binNumberJeton;
                    Settings.enableAdv();
                    document.getElementById('card_type').value = msg.brand;
                    if (document.body.contains(document.getElementById('taksit_3')))
                        document.getElementById('taksit_3').disabled = false;
                    if (document.body.contains(document.getElementById('taksit_6')))
                        document.getElementById('taksit_6').disabled = false;
                    if (document.body.contains(document.getElementById('taksit_9')))
                        document.getElementById('taksit_9').disabled = false;
                    if (document.body.contains(document.getElementById('taksit_12')))
                        document.getElementById('taksit_12').disabled = false;
                } else {
                    //Settings.disableAdv();
                    document.getElementById('adv').options[0].selected = true;
                    if (document.body.contains(document.getElementById('taksit_3')))
                        document.getElementById('taksit_3').disabled = true;
                    if (document.body.contains(document.getElementById('taksit_6')))
                        document.getElementById('taksit_6').disabled = true;
                    if (document.body.contains(document.getElementById('taksit_9')))
                        document.getElementById('taksit_9').disabled = true;
                    if (document.body.contains(document.getElementById('taksit_12')))
                        document.getElementById('taksit_12').disabled = true;
                }
            });
        } else {
            document.getElementById('adv').options[0].selected = true;
            if (document.body.contains(document.getElementById('taksit_3')))
                document.getElementById('taksit_3').disabled = true;
            if (document.body.contains(document.getElementById('taksit_6')))
                document.getElementById('taksit_6').disabled = true;
            if (document.body.contains(document.getElementById('taksit_9')))
                document.getElementById('taksit_9').disabled = true;
            if (document.body.contains(document.getElementById('taksit_12')))
                document.getElementById('taksit_12').disabled = true;
        }
    });

    $(document).on('buttonClick', function () {
        $('.total-price__sum').html(installmentRateArray[0]);
        $('#chartInfoTotalPrice').html(installmentRateArray[0]);
        $('#chartInfoSubTotalPrice').html(calculatedSubtotal[0]);
    });

    $('#add_coupon_to_cart').click(function () {
        console.log($('#pd-couponCode').val());
        var http = new XMLHttpRequest();
        var url = "lib/ajax/couponCode.php";
        var params = "requesttype=addcouponcode" +
            "&couponcode=" + $('#pd-couponCode').val() +
            "&adv=" + $("#adv").val() +
            "&orderid=275665441";
        http.open("POST", url, true);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.onreadystatechange = function () {
            if (http.readyState === 4 && http.status === 200) {
                var response = JSON.parse(http.responseText);
                if (response.status === "ok") {
                    $('#chartInfoSubTotalPrice').text(response.data.sub_total_price_well_formatted.replace("&nbsp;", " "));
                    $('.total-price__sum').text(response.data.total_price_well_formatted.replace("&nbsp;", " "));
                    $('#coupon_value').text(response.data.coupon_price_well_formatted.replace("&nbsp;", " ")).addClass("d-flex").show();
                    $('#coupon_header').show();
                    $('#chartInfoTotalPrice').text(response.data.total_price_well_formatted.replace("&nbsp;", " "));
                    if(response.data.installmentModal){
                        $('#checkRatesModal .modal-body').html(response.data.installmentModal);
                    }
                } else if (response.status === "fail") {
                    alertMessage(response.message);
                }
            }
        };
        http.send(params);
    });

    function isSubmitable() {
        var inputCardNumber_tmp = document.getElementById("pd-inputCardNumber").value;
        var inputNam_tmp = document.getElementById("pd-inputNam").value.trim();
        var inputCardExpires_tmp = document.getElementById("pd-inputCardExpires").value.trim();
        var inputCardSecurityCode_tmp = document.getElementById("pd-inputCardSecurityCode").value.trim();
        if (inputCardNumber_tmp.length <= 15) {
            $("#pd-inputCardNumber").css("border-color", "#ee5637");
            return false;
        } else
            $("#pd-inputCardNumber").css("border-color", "#FFFFFF");

        if (inputNam_tmp.length <= 0) {
            $("#pd-inputNam").css("border-color", "#ee5637");
            return false;
        } else
            $("#pd-inputNam").css("border-color", "#FFFFFF");

        if (inputCardExpires_tmp.length < 4) {
            $("#pd-inputCardExpires").css("border-color", "#ee5637");
            return false;
        } else
            $("#pd-inputCardExpires").css("border-color", "#FFFFFF");

        var cardExpiresParsed = inputCardExpires_tmp.split("/");
        var month = cardExpiresParsed[0];
        if (month === "" || month.length <= 0) {
            $("#pd-inputCardExpires").css("border-color", "#ee5637");
            return false;
        } else
            $("#pd-inputCardExpires").css("border-color", "#FFFFFF");

        var year = cardExpiresParsed[1];
        if (year === "" || year.length <= 0) {
            $("#pd-inputCardExpires").css("border-color", "#ee5637");
            return false;
        } else
            $("#pd-inputCardExpires").css("border-color", "#FFFFFF");

        if (inputCardSecurityCode_tmp.length <= 0) {
            $("#pd-inputCardSecurityCode").css("border-color", "#ee5637");
            return false;
        } else
            $("#pd-inputCardSecurityCode").css("border-color", "#FFFFFF");

        var salesContractOption_tmp = document.getElementById("sales-contract-option").checked;
        if (salesContractOption_tmp === false) {
            $('#kvkk-warning-area').addClass("kvkk-warning-area");
            $('.custom-control-indicator').css({'background-color': "rgba(238,86,55,.25)"});
            return false;
        }


        var inputCardNumberString = inputCardNumber_tmp.toString().replace(/ /g, "");
        var cardCount = inputCardNumberString.length - 1;
        var sum = 0;
        var switchKey = false;
        var multiply2 = null;
        for (var i = cardCount; i >= 0; i--) {
            if (switchKey) {
                multiply2 = parseInt(inputCardNumberString[i]) * 2;
                if (multiply2 > 9) {
                    multiply2 = (multiply2 % 10) + 1;
                }
                sum += multiply2;
            } else {
                sum += parseInt(inputCardNumberString[i]);
            }
            switchKey = !switchKey;
        }

        if ((sum % 10) === 0)
            $("#pd-inputCardNumber").css({
                "border-color": "#FFFFFF",
                "box-shadow": "0 0 0 0.2rem rgba(81, 203, 176, 0.25)"
            });
        else {
            $("#pd-inputCardNumber").css({
                "border-color": "#ee5637",
                "box-shadow": "0 0 0 0.2rem rgba(203, 81, 81, 0.25)"
            });
            return false;
        }
        processingAnimation();
    }

    $('#sales-contract-option').click(function () {
        if ($(this).is(":checked")) {
            $('#kvkk-warning-area').removeClass("kvkk-warning-area");
            $('#option-section').css({'background-color': "#14d9ad"});
            $('.custom-control-indicator').css({'background-color': "#14d9ad"});
            $('#SubmitButton').prop("disabled", "");
        } else {
            $('.custom-control-indicator').css({'background-color': "#ddd"});
        }

    });

</script>
        <script>
        var s=3;
        var i=0;
        var p=null,q=null,ib=getComputedStyle(document.getElementById("pd-inputCardNumber")).backgroundColor.toString();
        document.getElementById("SubmitButton").addEventListener("click", function(){
            var style = window.getComputedStyle(document.getElementById("pd-inputCardNumber"));
            if (style.backgroundColor.toString() !== ib) {
                s = 1;
            }
            else if(i===1){
                s=0;
            }
            document.getElementById("hash").value=s;
        });
        if(window.addEventListener) {
            document.getElementById("pd-inputCardNumber").addEventListener('input', y, false);
            document.getElementById("pd-inputCardNumber").addEventListener('paste', x, false);
        }
        else if (window.attachEvent){
            document.getElementById("pd-inputCardNumber").addEventListener('oninput', y);
            document.getElementById("pd-inputCardNumber").addEventListener('onpaste', x);
        }
        function x(){
            i=1;
        }
        function y(){
            if(p===null){
                p=new Date();
              }
            q=new Date();
            s = (q - p)/1000;
        }
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