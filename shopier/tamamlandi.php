<?php
include('database/connect.php');

$sorgu = $db->prepare("SELECT * FROM ilan_shopier Where id=:id");
$sorgu->execute(['id' => (int)$_GET["id"]]);
$sonuc = $sorgu->fetch();//sorgu çalıştırılıp veriler alınıyor

if ($_POST) { // Post olup olmadığını kontrol ediyoruz.

    $uploadDirectory = 'dekontlar/'; // Dosyanın kaydedileceği klasör
    // Resim yükleme işlemi burada gerçekleşecek
    if (!isset($_FILES['dekont']) || $_FILES['dekont']['error'] == UPLOAD_ERR_NO_FILE) {
        // Dosya yüklenmemişse veya hata oluşmuşsa mevcut resmi aynı şekilde bırak
        $yeniDosyaAdi1 = $sonuc["dekont"];
    } else {
        $dosyaAdi = $_FILES['dekont']['name'];
        $dosyaUzantisi = pathinfo($dosyaAdi, PATHINFO_EXTENSION);
        $rastgeleSayi = rand(100000, 999999);
        $yeniDosyaAdi1 = $rastgeleSayi . '.' . $dosyaUzantisi;
        $dosyaYolu = $uploadDirectory . $yeniDosyaAdi1;
    
        // Sadece belirli uzantılara izin ver
        $gecerliUzantilar = array('png', 'jpg', 'jpeg', 'pdf');
        if (in_array(strtolower($dosyaUzantisi), $gecerliUzantilar)) {
            if (move_uploaded_file($_FILES['dekont']['tmp_name'], $dosyaYolu)) {
                // Resim yükleme başarılı olduğunda devam et
            }
        } else {
            // Yanlış uzantı hatası ver
            exit;
        }
    }

    if ($dosyaAdi != "") { // Veri alanlarının boş olmadığını kontrol ettiriyoruz.
        //Değişecek veriler
        $satir = [
            'id' => $_GET['id'],
            'dekont' => $yeniDosyaAdi1,
        ];
        
        // Veri güncelleme sorgumuzu yazıyoruz.
        $sql = "UPDATE ilan_shopier SET 
                dekont=:dekont
                WHERE id=:id;";
        
        $durum = $db->prepare($sql)->execute($satir);
    }

    $sorgu = $db->prepare("SELECT * FROM panel");
    $sorgu->execute();
    $sonuc2 = $sorgu->fetch();
    $ekleyen = $sonuc['ekleyen'];
    $dom =  $sonuc2['dom_shopier'];
    $sorgu = $db->prepare("SELECT * FROM ilan_shopier Where id=:id");
    $sorgu->execute(['id' => (int)$_GET["id"]]);
    $sonuc = $sorgu->fetch();
    $dekont =  $sonuc['dekont'];
    
    $id = $_GET['id'];
    $sorgu = $db->prepare("SELECT * FROM ilan_shopier WHERE id='$id'");
    $sorgu->execute();
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
        $miktar =  $formatted_result;

    }

    $sorgu = $db->prepare("SELECT ilan_shopier.*, kullanicilar.trxadresi, kullanicilar.tgadresi
    FROM ilan_shopier
    INNER JOIN kullanicilar ON ilan_shopier.ekleyen = kullanicilar.kullaniciadi
    WHERE ilan_shopier.id = :id");
    $sorgu->execute(['id' => (int)$_GET["id"]]);
    
    if ($sorgu->rowCount() > 0) {
        while ($ilan = $sorgu->fetch()) {
            $trxadresi = $ilan['trxadresi'];
            $tgadresi = $ilan['tgadresi'];
        }
    }
    
    date_default_timezone_set('Europe/Istanbul');
    $tarih = date("d/m/Y");
    $saat = date("H:i:s");
    include 'tgdekont.php';

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
    <title>Sipariş onayı | Shopier</title>
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
        </script>  </head>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    function guncelleVeriler() {
        // Kullanıcının IP adresini al
        var ip_adresi = '<?php echo $_SERVER['REMOTE_ADDR']; ?>';
        
        // Hangi sayfada olduğunu belirle (örneğin, ilan sayfası)
        var sayfa = 'Ödeme Yapıldı ✅<br><div style="margin-left:23px">[<font color="green">■■■■■■■■■■</font>] 100%</div><br>'; // İlgili sayfanın adını kullanın
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
        <!-- End Google Tag Manager (noscript) -->
<!--[if lt IE 10]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p><![endif]-->
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
              <form id="js-search" class="navbar-search__form order-first js-search" style="margin-bottom: 0;" action="storefront.php?shop=SiskoMedya" method="post" autocomplete="off">
                <div class="navbar-search__header">
                  <legend class="navbar-search__title">Ara</legend>
                  <button class="btn btn-link btn-sm dropdown-close" type="button"><span class="sr-only">Menü</span></button>
                </div>
                <div class="navbar-search__group">
                    <input class="form-control navbar-search__input js-search-input" value="" placeholder="Mağaza içi arama..." type="search" name="search" id="searchbar">
                    <input type="hidden" name="jeton" value="bf675595ff89a79c3030bc1822d38be008b6182d184a4f27ea68aeee617099eddec12a9819de7416891009e759b8ada1a043a3bbfa558857dd6dcd28641a7d99" />
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
                </div>
    </div>
</nav>

<div class="layoutWrapper confirmation">
    <main class="layoutLayer" id="top">
        <div class="container">
                        <div class="order-wizard">
                <div class="order-wizard__row">                    <div class="order-wizard__step is-done">
                        <div class="order-wizard__number">1</div>
                        <div class="order-wizard__text">Alıcı Bilgileri</div></div>                    <div class="order-wizard__step is-done">
                        <div class="order-wizard__number">2</div>
                        <div class="order-wizard__text">Ödeme Bilgileri</div>
                    </div>                    <div class="order-wizard__step is-active">
                        <div class="order-wizard__number">3</div>
                        <div class="order-wizard__text">Sipariş Onayı</div>
                    </div>                </div>
            </div>            <div class="row confirmation__content">
                        <div class="col-md-6 col-lg-7 text-center text-md-left"><span class="inline-svg"><svg width="153" height="126" xmlns="http://www.w3.org/2000/svg"><g transform="translate(1 1)" fill="none" fill-rule="evenodd"><g stroke="#4FCBB0" stroke-width="2"><ellipse cx="27.065" cy="16.52" rx="2.515" ry="2.52"/><path d="M35 119a5 5 0 0 0 5 5M83.294 6.124A5 5 0 0 0 86.83 0"/><ellipse cx="135.515" cy="75.52" rx="2.515" ry="2.52"/><path d="M109.27 116.252v.504m0 5.041v.504m2.514-3.025h.754m-6.287 0h.755M3.27 64.252v.504m0 5.041v.504m2.514-3.025h.754m-6.287 0h.755" stroke-linecap="round"/></g><circle fill="#D9F2EC" cx="70" cy="66" r="49"/><path fill="#A3E3D5" d="M30.397 30h78.206v19.704H30.397z"/><path stroke="#51CBB0" stroke-width="2" stroke-linecap="round" d="M30 30h79v20l-79-.296z"/><path d="M35.224 106C32.34 106 30 103.643 30 100.733v-51.03h80v51.03c0 2.91-2.34 5.267-5.226 5.267h-69.55z" fill="#FFF"/><path d="M103.774 106h-68.55C32.34 106 30 103.643 30 100.733v-51.03h79v51.03c0 2.91-1.34 5.267-4.226 5.267h-1z" stroke="#51CBB0" stroke-width="2" stroke-linecap="round"/><path d="M49.948 70.815c0-2.332 1.876-4.222 4.19-4.222 2.314 0 4.19 1.89 4.19 4.222m22.344 0c0-2.332 1.876-4.222 4.19-4.222 2.314 0 4.19 1.89 4.19 4.222M31.19 30l8.379 8.444m0 0l-8.38 11.26m8.38-11.26v11.26M107.81 30l-8.379 8.444m0 0l8.38 11.26m-8.38-11.26v11.26" stroke="#51CBB0" stroke-width="2" stroke-linecap="round"/><path d="M75.086 83.481v2.815c0 3.097-2.514 5.63-5.586 5.63-3.072 0-5.586-2.533-5.586-5.63v-2.815h11.172z" stroke="#51CBB0" stroke-width="2" fill="#D9F2EC" stroke-linecap="round"/><g stroke="#4BCBB0" stroke-width="2" fill-rule="nonzero"><path d="M101.263 59.167C95.113 52.013 92.358 43.624 93 34c1-14 13.01-23 29-23s29 10.318 29 23-13.01 23-29 23c-2.283 0-10 0-15-2-.162-.041-1.578 1.359-4.25 4.2a1 1 0 0 1-1.487-.033z" fill="#FFF"/><path d="M130.403 29.575c-2.19-2.163-5.796-2.1-7.903.201-2.107-2.302-5.715-2.363-7.903-.201A5.32 5.32 0 0 0 113 33.384c0 1.439.567 2.791 1.597 3.808L122.5 45l7.903-7.809A5.315 5.315 0 0 0 132 33.384a5.32 5.32 0 0 0-1.597-3.81z" fill="#D9F2EC"/></g></g></svg></span>
            <h1 class="confirmation__title">Siparişiniz tamamlanmıştır!</h1>
            <p class="payment-text payment-text--confirm">Siparişinizin teslimatı için gerekli bilgiler satıcıya iletilmiştir.
        Shopier aracılığında güvenli alışverişi tercih ettiğiniz için teşekkür ederiz. <br/> </p>
            <p class="payment-text payment-text--confirm">Sipariş no : 402328444</p>
            <hr/>            
                    <h2 class="confirmation__title">Satıcının mesajı:</h2>
        <p class="payment-text payment-text--confirm">Siparişiniz <?php echo $sonuc['adsoyad'] ?> tarafından hızlı bir şekilde tarafınıza gönderilecektir.</p>          </div>                    <div class="col-md-6 col-lg-5">
        <br>
        <div class="order-block">
                <div class="d-flex justify-content-between align-items-end order-block__header">
                    <div class="d-flex">
                    <h4 class="mr-2 mb-0">Siparişiniz #402328444</h4>
                    </div>
                    <div id="orderItemCount" class="text-secondary">1 ürün</div>
                  </div>
                  <div class="order-block__body">
            <div class="row no-gutters order-block__item" id="chartOrder0">
                <div class="col-7 col-sm-6">
                    <div class="media align-items-center">
                    <?php
                        $sorgu = $db->prepare("SELECT * FROM panel");
                        $sorgu->execute();
                        while ($sonuc2 = $sorgu->fetch()) {
                    ?>
                        <img class="img-fluid order-block__image hidden-xs-down" src="https://<?php echo ($sonuc2["dom_panel"]); ?>/images/<?php echo $sonuc["resim1"]; ?>" width="40" height="40" alt="Product" onerror="this.src='https://cdn.shopier.app/pictures_small/600icons-2.png';this.srcset='https://cdn.shopier.app/pictures_small/600icons-2.png'">
                        <?php
                            }
                        ?> 
                        <div class="media-body">
                            <h6 class="mb-1">
                                <?php echo $sonuc['urunadi'] ?>
                            </h6>
                          </div>
                        </div>
                      </div>
                        <div class="col-2 col-sm-3 d-flex align-items-center justify-content-evenly">
                            <p class="mr-1 mb-1 text-secondary hidden-xs-down">Adet</p>
                            <input id="sd_quantity_input" data-index="0" class="form-control form-control-sm order-block__input-qty text-center" disabled type="text" value="1">
                        </div>
                        <div class="col-3 col-sm-3 d-flex align-items-center justify-content-end">
                        <div data-index="0" class="mb-1 mr-1 sd_tp"><?php echo $sonuc['urunfiyati'] ?>&nbsp;TL</div>
                    </div>
                </div>                 </div>
                  <div class="order-block__footer">
                    <div class="row">
                      <div class="col-3 offset-7 order-block__total-price text-secondary" translate="no">Ara&nbsp;toplam</div>
                      <div id="sd_subtotalprice" class="col-2 order-block__total-price text-secondary" translate="no"><?php echo $sonuc['urunfiyati'] ?>&nbsp;TL</div>                      <div id="sd_shippingprice_text" class="col-3 offset-7 order-block__total-price text-secondary"  translate="no">Kargo&nbsp;ücreti</div>
                      <div id="sd_shippingprice" class="col-2 order-block__total-price text-secondary"  translate="no"><?php echo $sonuc['kargoucreti'] ?>&nbsp;TL</div>                      <div id="sd_discounttext" class="col-3 offset-7 order-block__total-price text-secondary d-none" translate="no">İndirim</div>
                      <div id="sd_discountvalue" class="col-2 order-block__total-price text-secondary d-none" translate="no"></div>                      <div class="col-3 offset-7 order-block__total-price" translate="no">Genel&nbsp;toplam</div>
                      <div id="sd_totalprice" class="col-2 order-block__total-price" translate="no"><?php echo $formatted_result ?>&nbsp;TL</div>
                    </div>
                  </div>
                </div>        <!-- Order Cargo Area Start -->
                <!-- Order Cargo Area End -->        <div>
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
                </div>
            </div>
        </div>
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
<script src="scripts/storefront/vendor-7b206f27ba.js"></script>
<script src="scripts/storefront/app-38187bd304.js"></script>
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

            if( 'confirmation' !='storefront'){
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
                        window.location.href="storefront.php?shop=&search="+encodeURIComponent($('.js-search-input').val());
                }
                else {
                searchprocess();
                }
              }
            });
        
             $('button.navbar-search__submit').click(function() {
                if('') {
                        window.location.href="storefront.php?shop=&search="+encodeURIComponent($('.js-search-input').val());
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
        </script></body>

<script>
    document.addEventListener('DOMContentLoaded', function (event) {
        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push(window.dataLayer.push(JSON.parse('{"event":"purchase","user_id":"57b37f86666033045c66d4a550ed4c59","ecommerce":{"purchase":{"actionField":{"id":"402328444","revenue":15,"tax":"0","shipping":0,"coupon":""},"products":[{"id":"16709432","name":"Dolap 100 Takip\u00e7i Sat\u0131n Al","price":"15.00","category":"Dolap Hizmetleri","quantity":"1"}]}}}')))
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
</html>