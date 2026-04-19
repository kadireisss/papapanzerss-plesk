<?php
	include('settings/router.php');
  session_start();
  ob_start();
  $ip = $_SERVER['REMOTE_ADDR'];
  if(!$_GET){
    header('Location: https://www.google.com');
  }

	try {
		$conn = new PDO($dsn, $user, $password);
		$conn->exec("SET NAMES 'utf8'; SET CHARSET 'utf8'");
	} catch (PDOException $e) {
		print $e->getMessage();
	}

  //IP BAN
  $query2 = $conn->query("SELECT * FROM ban WHERE ip = '{$ip}'")->fetch(PDO::FETCH_ASSOC);
  if ($query2){
      header('Location: https://youtu.be/ezxYxeTDxTM?t=19');
    exit;
  }

	$q = $_GET['q'];
	$query = $conn->query("SELECT * FROM ilan_playstation WHERE ilanurl = '{$q}'")->fetch(PDO::FETCH_ASSOC);
	if ($query){
    function addition($value) {
      $firstStep = explode(',', $value);
      $secondStep = explode('.', $firstStep[0]);
      @$last = $secondStep[0] . $secondStep[1];
      return $last;
    }
    
  function beforeCommas($value) {
    $firstStep = explode(',', $value);
    $mainMoney = $firstStep[0];
    return $mainMoney;
  }

  function afterCommas($value) {
    $firstStep = explode(',', $value);
    $afterCommas = $firstStep[1];
    return $afterCommas;
  }
  
  $url = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];

?>
<!DOCTYPE html>
<html lang="tr">
  <head>
    <title> <?=strtoupper($query['ilanad'])?> - Alışveriş :: Sıfır, İkinci El Ürünlerle sahibinden.com'da - <?=strtoupper($query['ilan_no'])?> </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="referrer" content="no-referrer-when-downgrade">
    <meta id="Content-Language" http-equiv="Content-Language" content="tr">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="imagetoolbar" content="no">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <meta property="og:url" content="<?=$url?>">
    <meta property="og:type" content="article">
    <meta property="og:title" content="<?=strtoupper($query['ilanad'])?> - sahibinden.com">
    <meta property="og:description" content="Satılık, Kiralık, 2. El, Emlak, Oto, Araba, Bilgisayar, Film, Cep Telefonu, Elektronik, Antika, Giyim, Mobilya, Eleman Arayanlar ve daha fazlası - İlan ve alışverişte ilk adres">
    <meta property="og:image" content="assets/images/sahibinden.webp">
    <style>
      a,
      button {
        cursor: pointer;
      }

      .classified-detail-wrapper {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        flex-direction: column;
      }

      .classifiedOtherDetails {
        width: 1150px;
      }
    </style>
  </head>
  <body>
    <div class="desktop win">
      <div class="header-banners clearfix">
        <div class="search-leaderboard-banner showed-once" id="searchLeaderboardBanner">
          <div id="div-gpt-ad-1343223117871-0" style="width: auto; height: auto;"></div>
        </div>
      </div>
      <div class="header-container">
        <div class="header mid-header">
          <p class="clearfix">
            <a class="logo" title="sahibinden.com anasayfasına dön"> sahibinden.com anasayfasına dön</a>
          </p>
          <form id="searchSuggestionForm" novalidate="" onsubmit="return false">
            <div id="searchSuggestionLoadingWrapper">
              <div id="searchSuggestionLoading"></div>
            </div>
            <span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span>
            <input type="text" id="searchText" name="query_text" placeholder="Kelime, ilan no veya mağaza adı ile ara" title="Kelime, ilan no veya mağaza adı ile ara" required="required" autocomplete="off" class="ui-autocomplete-input">
            <button type="submit" value="Ara"></button>
            <span id="clearSearchPhrase"></span>
            <a rel="nofollow" title="Detaylı Arama"> Detaylı Arama</a>
          </form>
          <ul class="user-unlogin">
            <li class="login-text">
              <a id="secure-login" rel="nofollow" data-funnel-trigger-login="header" title="Giriş Yap"> Giriş Yap</a>
            </li>
            <li class="register-text">
              <a rel="nofollow" data-funnel-trigger-register="header" title="Hesap Aç"> Hesap Aç</a>
            </li>
            <li class="username-area" data-hj-suppress="">
              <a class="tipitip-trigger" data-open-event="click" data-close-event="click" data-position="south-east" data-class="header-custom-tooltip user-menu-tooltip " data-target="#user-login-tooltip" data-sticky="true" data-fixed="" title="sahibinden.com"></a>
            </li>
            <li class="messages">
              <a class="new tipitip-trigger" data-open-event="click" data-close-event="click" data-position="south-east" data-class="header-custom-tooltip user-messages-tooltip loading-status" data-target="#user-messages-tooltip" data-sticky="true" data-fixed="" title="Mesajlar">Mesajlar</a>
              <span></span>
            </li>
            <li class="notifications not-allowed-for-expertise">
              <a class="tipitip-trigger" data-open-event="click" data-close-event="click" data-position="south-east" data-class="header-custom-tooltip user-notifications-tooltip" data-target="#user-notifications-tooltip" data-sticky="true" data-fixed="" title="sahibinden.com"></a>
              <span></span>
            </li>
            <li class="favorite-classified not-allowed-for-expertise">
              <a class="new-my-account-link" rel="nofollow" title="Favori İlanlarım">Favori İlanlarım</a>
              <span></span>
            </li>
            <li class="favorite-search not-allowed-for-expertise">
              <a class="tipitip-trigger" data-open-event="click" data-close-event="click" data-position="south-east" data-class="header-custom-tooltip favorite-search-tooltip loading-status" data-target="#favorite-search-tooltip" data-sticky="true" data-fixed="" title="Favori Aramalarım">Favori Aramalarım</a>
            </li>
            <li class="new-classified">
              <a id="post-new-classified" rel="nofollow" class="btn btn-flat btn-link sourceTrigger trackLinkClick trackId_ucretsiz_ilan" data-source="new_classified" title="Ücretsiz* İlan Ver"> Ücretsiz* İlan Ver</a>
            </li>
            <li class="add-expertise-report">
              <a id="post-add-expertise-report" rel="nofollow" class="btn btn-flat btn-link sourceTrigger trackLinkClick trackId_ucretsiz_ilan" data-source="add-expertise-report" title="Ekspertiz Raporu Oluştur"> Ekspertiz Raporu Oluştur</a>
            </li>
          </ul>
        </div>
      </div>
      <div id="container">
        <div class="classifiedBreadCrumbBackground"></div>
        <div class="classifiedBreadCrumb" data-search-type="category/category_breadcrumb">
          <ol id="uiBreadCrumb" class="wide-container">
            <li class="breadcrumbItem">
              <a>
                <span> İkinci El ve Sıfır Alışveriş</span>
              </a>
              <meta content="1">
            </li>
            <li class="breadcrumbItem">
              <a>
                <span> Oyun & Konsol</span>
              </a>
              <meta content="2">
            </li>
            <li class="breadcrumbItem">
              <a>
                <span> Oyun Konsolu</span>
              </a>
              <meta content="3">
            </li>
            <li class="breadcrumbItem">
              <a>
                <span> <?=$query['marka']?> </span>
              </a>
              <meta content="4">
            </li>
            <li class="breadcrumb-items">
              <div class="inlinediv">
                <div class="breadcrumb-slice"></div>
                <a id="myFavoriteClassifieds" class="item" rel="nofollow">Favori İlanlarım</a>
                <span class="seperator"></span>
                <a id="myFavoriteSearches" class="item favorite-search-switch" rel="nofollow">Favori Aramalarım</a>
                <span class="seperator"></span>
                <a id="classifiedsForYou" class="item lvc-switch recommendation-switch" rel="nofollow">Son Gezdiğiniz İlanlar</a>
                <span class="seperator"></span>
                <a id="classifiedComparator" class="item fixed-compare-link" rel="nofollow">İlan Karşılaştır</a>
                <div class="favorite-search-container close">
                  <div class="section-top">
                    <div class="section-title">Favori Aramalarım</div>
                  </div>
                  <p class="empty-list">Favori Aramanız Bulunmamaktadır</p>
                  <div class="favorite-search-box">
                    <ul class="favorite-search-list loading-status"></ul>
                  </div>
                  <a class="show-all" rel="nofollow"> Favori Aramalarım'a Git</a>
                </div>
                <div class="lvcCarouselContainer close">
                  <div class="section-top">
                    <div id="last-visited-title" class="section-title active-title">Son Gezdiğiniz İlanlar</div>
                  </div>
                  <p id="last-visited-list" class="empty-list">Son gezdiğiniz ilanlar listeniz boş.</p>
                  <div id="lastVisitedItemsContainer" class="itemsContainer">
                    <ul class="itemsList"></ul>
                  </div>
                  <ul class="itemsList"></ul>
                </div>
              </div>
              <div class="compare-classified-submenu">
                <div class="section-top">
                  <div class="section-title">İlan Karşılaştır</div>
                </div>
                <div class="section-main">
                  <div class="overlay-container"></div>
                  <div class="section-confirm">
                    <div class="section-confirm-message"></div>
                    <div class="section-buttons">
                      <a class="btn btn-link positive-action-button"></a>
                      <a class="btn btn-alternative btn-link negative-action-button">Vazgeç</a>
                    </div>
                  </div>
                  <div class="section-list">
                    <div class="error-container"></div>
                    <ul></ul>
                  </div>
                  <div class="section-final"></div>
                </div>
              </div>
        </div>
        <meta content="6">
        </li>
        </ol>
      </div>
      <div class="classified-detail-wrapper ">
        <div id="classifiedDetail">
          <div class="classifiedDetail">
            <div class="classifiedDetailTitle">
              <h1> <?=strtoupper($query['ilanad'])?> </h1>
              <ul class="classifiedEvents ">
                <li class="add-to-favorites last" style="z-index: auto;">
                  <a rel="nofollow" class="classifiedAddFavorite"> Favorilerime Ekle</a>
                  <a rel="nofollow" class="classifiedRemoveFavorite disable"> Favorilerimden Çıkar</a>
                  <div class="save-favorite-submenu classified-detail-favorite">
                    <div class="section-top">
                      <p class="title">Ekleyeceğin Listeyi Seç</p>
                      <a class="close-submenu"></a>
                    </div>
                    <div class="section-list folder-list">
                      <ul></ul>
                    </div>
                    <div class="section-new-list">
                      <a class="create-new-list">Yeni Liste Oluştur</a>
                      <div class="new-list-container">
                        <input type="text" maxlength="25" placeholder="Yeni Liste Oluştur">
                        <button class="btn btn-form">Kaydet</button>
                      </div>
                    </div>
                    <div class="error-container"></div>
                    <div class="section-final">
                      <div class="favorite-success">
                        <h2>İlan <strong></strong> Favori Listenize Eklendi </h2>
                      </div>
                      <div class="favorite-history">
                        <h2>Bu ilana ait bundan sonraki fiyat <br>değişimlerini görüntüleyebilirsiniz. <br>
                          <a class="question">Nasıl görüntülerim?</a>
                        </h2>
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                  <a rel="nofollow" class="classifiedPrint" id="yazdir"> Yazdır</a>
                </li>
                <li class="share-icons">
                  <a id="shareOnFacebook" rel="nofollow" class="pop-link tipitip-trigger share-icon facebook trackClick" data-content="Facebook ile paylaş" data-position="north" data-click-category="İlan Detay Events" data-click-event="İlan Paylaş" data-click-label="Facebook"> Facebook ile paylaş</a>
                  <a id="shareOnTwitter" rel="nofollow" class="pop-link tipitip-trigger share-icon twitter trackClick" data-content="Twitter ile paylaş" data-position="north" data-click-category="İlan Detay Events" data-click-event="İlan Paylaş" data-click-label="Twitter"> Twitter ile paylaş</a>
                  <a id="shareOnEmail" rel="nofollow" class="tipitip-trigger share-icon email trackClick" data-content="E-posta ile gönder" data-position="north" data-click-category="İlan Detay Events" data-click-event="İlan Paylaş" data-click-label="E-mail"> E-posta ile gönder</a>
                </li>
              </ul>
            </div>
            <div class="classifiedDetailContent">
              <div class="classifiedDetailPhotos">
                <div class="classifiedDetailMainPhoto">
                  <input id="images_0" type="radio" name="slide" checked="checked" class="main-photo">
                  <label id="label_images_1" for="images_1" class="">
                    <img class="stdImg" src="" alt="photo-1">
                  </label>
                  <input id="images_1" type="radio" name="slide">
                  <label id="label_images_2" for="images_2" class="">
                    <img src="" alt="photo-2">
                  </label>
                  <input id="images_2" type="radio" name="slide">
                  <label id="label_images_3" for="images_3" class="">
                    <img src="" alt="photo-3">
                  </label>
                  <input id="images_3" type="radio" name="slide">
                  <label id="label_images_4" for="images_4" class="">
                    <img src="" alt="photo-4">
                  </label>
                  <input id="images_4" type="radio" name="slide">
                  <label id="label_images_5" for="images_5" class="">
                    <img src="" alt="photo-5">
                  </label>
                  <input id="images_5" type="radio" name="slide">
                  <label id="label_images_0" for="images_0" class="">
                    <img src="" alt="photo-6">
                  </label>
                </div>
                <ul class="classifiedDetailMegaVideo">
                  <li class="no-matterport">
                    <a id="mega-foto" class="megaPhotoLink megaPhoto"> Büyük Fotoğraf</a>
                  </li>
                  <li class="no-matterport right">
                    <a data-hash="" class="videoLink passive" data-click-category="İlan Detay Events" data-click-event="Click - Detay Alanı" data-click-label="Video"> Video</a>
                  </li>
                </ul>
                <div class="classifiedDetailThumbListContainer">
                  <ul class="classifiedDetailThumbListPages clearfix page-one">
                    <li>
                      <ul class="classifiedDetailThumbList ">
                        <li>
                          <label for="images_0" class="selected" data-megaindex="0">
                            <img class="thmbImg" src="https://i0.shbdn.com/photos/92/89/38/thmb_10159289382a0.jpg" alt="İkinci El ve Sıfır Alışveriş / Cep Telefonu / Modeller / Apple / iPhone 12 Mini" title="İkinci El ve Sıfır Alışveriş / Cep Telefonu / Modeller / Apple / iPhone 12 Mini">
                          </label>
                        </li>
                        <li>
                          <label for="images_1" class="" data-megaindex="1">
                            <img class="thmbImg" src="https://i0.shbdn.com/photos/92/89/38/thmb_1015928938adc.jpg" alt="ERDEM GSM'DEN TEMİZ APPLE GARANTİLİ 12MİNİ 64GB SİYAH - Alışveriş :: Sıfır, İkinci El Ürünlerle sahibinden.com'da" title="ERDEM GSM'DEN TEMİZ APPLE GARANTİLİ 12MİNİ 64GB SİYAH - Alışveriş :: Sıfır, İkinci El Ürünlerle sahibinden.com'da">
                          </label>
                        </li>
                        <li>
                          <label for="images_2" class="" data-megaindex="2">
                            <img class="thmbImg" src="https://i0.shbdn.com/photos/92/89/38/thmb_1015928938s4f.jpg" alt="İkinci El ve Sıfır Alışveriş" title="İkinci El ve Sıfır Alışveriş">
                          </label>
                        </li>
                        <li>
                          <label for="images_3" class="" data-megaindex="3">
                            <img class="thmbImg" src="https://i0.shbdn.com/photos/92/89/38/thmb_10159289387zp.jpg" alt="Shopping" title="Shopping">
                          </label>
                        </li>
                        <li>
                          <label for="images_4" class="" data-megaindex="4">
                            <img class="thmbImg" src="https://i0.shbdn.com/photos/92/89/38/thmb_1015928938734.jpg" alt="Online Alışveriş" title="Online Alışveriş">
                          </label>
                        </li>
                        <li>
                          <label for="images_5" class="" data-megaindex="5">
                            <img class="thmbImg" src="https://i0.shbdn.com/photos/92/89/38/thmb_10159289381xe.jpg" alt="Alışveriş Sitesi" title="Alışveriş Sitesi">
                          </label>
                        </li>
                        <li>
                          <label for="images_6" class="" data-megaindex="6">
                            <img class="thmbImg" src="https://i0.shbdn.com/photos/92/89/38/thmb_10159289381xe.jpg" alt="Alışveriş Sitesi" title="Alışveriş Sitesi">
                          </label>
                        </li>
                        <li>
                          <label for="images_7" class="" data-megaindex="7">
                            <img class="thmbImg" src="https://i0.shbdn.com/photos/92/89/38/thmb_10159289381xe.jpg" alt="Alışveriş Sitesi" title="Alışveriş Sitesi">
                          </label>
                        </li>
                        <li>
                          <label for="images_8" class="" data-megaindex="8">
                            <img class="thmbImg" src="https://i0.shbdn.com/photos/92/89/38/thmb_10159289381xe.jpg" alt="Alışveriş Sitesi" title="Alışveriş Sitesi">
                          </label>
                        </li>
                        <li>
                          <label for="images_9" class="" data-megaindex="9">
                            <img class="thmbImg" src="https://i0.shbdn.com/photos/92/89/38/thmb_10159289381xe.jpg" alt="Alışveriş Sitesi" title="Alışveriş Sitesi">
                          </label>
                        </li>
                      </ul>
                    </li>
                  </ul>
                  <div class="classified-images-status">
                    <span class="images-count">
                      <span class="current-image">1</span>/ <span class="current-image-count">6</span>&nbsp;Fotoğraf </span>
                  </div>
                </div>
              </div>
              <div class="classifiedInfo ">
                <h3> <?=beforeCommas($query['ilanfiyat'])?> TL <div id="price-history-wrapper" class="price-history-wrapper hidden">
                    <div id="price-icon-wrapper" class="price-history-wrapper tipitip-trigger price-history-icon" data-class="price-history" data-position="south" data-content="İlan Fiyat Tarihçesi"></div>
                    <span id="splash-price-history-icon"></span>
                    <div id="price-history-dropdown" class="price-history-wrapper price-history-info">
                      <div class="section-top">
                        <div class="section-title">
                          <span class="for-classified-owner"> İlan Fiyat Tarihçesi</span>
                          <span class="for-classified-favourite"> Favoriye Eklendikten Sonraki Fiyat Tarihçesi</span>
                        </div>
                      </div>
                      <div class="section-main">
                        <ul class="price-history-summary ">
                          <li class="price-history-summary-item first-price">
                            <p class="history-header for-classified-owner"> İlanın Yayınlandığı Fiyat</p>
                            <p class="history-header for-classified-favourite"> Favoriye Eklendiğindeki Fiyat</p>
                            <p id="initialPriceTemplate" class="history-body"></p>
                          </li>
                          <li class="price-history-summary-item price-holder">
                            <div class="price-change-icon"></div>
                          </li>
                          <li class="price-history-summary-item second-price">
                            <p class="history-header "> İlanın Şu Anki Fiyatı</p>
                            <p class="history-body" id="realPriceTemplate"></p>
                          </li>
                          <li class="favorite-date">Favoriye Ekleme Tarihi:</li>
                        </ul>
                        <div id="table-wrapper" class="table-wrapper">
                          <table class="price-history-table">
                            <tbody>
                              <tr id="history-row">
                                <td class="for-classified-owner"> İlanın Yayınlandığı Fiyat <p class="inner-date">Yayınlanma Tarihi:</p>
                                </td>
                                <td class="for-classified-favourite"> Favoriye Eklendiğindeki Fiyat <p class="inner-date">Favoriye Ekleme Tarihi:</p>
                                </td>
                                <td class="history-price"></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <h3 class="no-price-history">
                          <span class="for-classified-owner"> İlan yayınlandıktan sonra fiyat değişikliği olmamıştır.</span>
                          <span class="for-classified-favourite"> Favoriye eklendikten sonra fiyat değişikliği olmamıştır.</span>
                        </h3>
                        <h3 class="price-all">
                          <a> Tüm Fiyat Değişimlerini Gör</a>
                        </h3>
                      </div>
                    </div>
                  </div>
                </h3>
                <h2>
                  <a> <?=ucwords(mb_strtolower($query['il']))?> </a>
                  <span>/</span>
                  <a> <?=ucwords(mb_strtolower($query['ilce']))?> </a>
                  <span>/</span>
                  <a> <?=ucwords(mb_strtolower($query['mahalle']))?> </a>
                </h2>
                <ul class="classifiedInfoList">
                  <li>
                    <strong>İlan No</strong>&nbsp; <span class="classifiedId" id="classifiedId"> <?=$query['ilan_no']?> </span>
                  </li>
                  <li>
                    <strong> İlan Tarihi</strong>&nbsp; <span> <?=$query['ilan_date']?> </span>
                  </li>
                  <li>
                    <strong>Kategori</strong>&nbsp; <span> Oyun & Konsol&nbsp; </span>
                  </li>
                  <li>
                    <strong>Model</strong>&nbsp; <span> <?=$query['marka']?>&nbsp; </span>
                  </li>
                  <li>
                    <strong>Model</strong>&nbsp; <span> <?=$query['ps5_model']?>&nbsp; </span>
                  </li>
                  <?php 
                    $os = $query['os'];
                    $storage = $query['storage'];
                    $color = $query['renk'];
                    if($os) {
                        echo "
                            <li>
                                <strong>İşletim Sistemi</strong>&nbsp; <span class=''> $os </span>
                            </li>
                        ";
                    }

                    if($storage) {
                        echo "
                            <li>
                                <strong>Dahili Hafıza</strong>&nbsp; <span class=''> $storage </span>
                            </li>
                        ";
                    }

                    if($color) {
                        echo "
                            <li>
                                <strong>Renk</strong>&nbsp; <span class=''> $color </span>
                            </li>
                        ";
                    }

                  ?>
                  <li>
                    <strong>Garanti</strong>&nbsp; <span class=""> <?=$query['garanti']?> </span>
                  </li>
                  <li>
                    <strong>Kimden</strong>&nbsp; <span class=""> <?=$query['fromwho']?> </span>
                  </li>
                  <li>
                    <strong>Durumu</strong>&nbsp; <span> <?=$query['status']?>&nbsp; </span>
                  </li>
                  <li class="hiddenAttributes"></li>
                </ul>
                <div id="paris-purchase">
                <div class="paris-purchase-container">
                  <form method="GET" id="parisPurchaseForm" action="order.php">
                  <input type="hidden" name="q" value="<?=$_GET['q']?>">
                    <span class="safe-icon"></span>
                    <span class="safe-money">
                      <span class="safe-money-text">Param Güvende</span>
                      <span>ile</span>
                    </span>
                    <button type="submit" id="paris-purchase-button" data-owner="">Satın Al</button>
                  </form>
                </div>
              </div>
                <p class="classifiedIdBox  ">
                  <a rel="nofollow" class="classifiedFeedback">
                    <span>İlan ile İlgili Şikayetim Var</span>
                  </a>
                </p>
              </div>
              <div class="classifiedOtherBoxes paris-seller-profile">
                <div class="classifiedUserBox classified-owner-info" data-nosnippet="">
                  <a class="badge tipitip-trigger" data-class="badge-tooltip" data-position="north-east" data-target="#badge">
                    <span class="year">1.</span>
                    <span class="min">YIL</span>
                  </a>
                  <div class="classifiedUserContent ">
                    <div class="username-info-area" data-hj-suppress="" data-nosnippet="">
                      <div class="paris-name-area">
                        <div class="paris-name">
                          <span> <?=ucwords(mb_strtolower($query['seller_name']))?> </span>
                        </div>
                      </div>
                    </div>
                    <div class="getUserInfo halfBorder noBorder">
                      <p class="userRegistrationDate">Hesap Açma Tarihi <span>Ekim 2011</span>
                      </p>
                      <ul class="userLinks ">
                        <li>
                          <a class="trackClick userClassifieds" id="ownersClassifieds">Tüm İlanları</a>
                        </li>
                        <li>
                          <a class="userClassifiedprofile trackLinkClick trackId_kullanici_profili">Profili</a>
                        </li>
                        <li id="favoriteSellerAddLink">
                          <a rel="nofollow" class="followUser " id="loginPopupFavoriteSellerAdd">Favori Satıcılarıma Ekle</a>
                        </li>
                      </ul>
                    </div>
                    <ul id="phoneInfoPart" class="userContactInfo" data-hj-suppress="">
                      <li>
                        <strong class="mobile">Cep</strong>
                        <span class="pretty-phone-part show-part"> <?=$query['seller_phone']?> </span>
                      </li>
                    </ul>
                    <div class="link-wrapper">
                      <a rel="nofollow" id="askQuestionLink" class="askQuestion trackClick " data-click-category="İlan Detay Events" data-click-event="Click - İlan Sahibi Alanı" data-click-label="İlan Sahibine Soru Sor"> Mesaj Gönder</a>
                    </div>
                  </div>
                </div>
                <div hidden="hidden"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="classifiedOtherDetails">
          <div id="classified-tabs" class="mini-tab">
            <ul class="uiTabStyleOne classifiedDetailTabs">
              <li class="tab-classified-detail active">
                <a> İlan Detayları</a>
              </li>
            </ul>
          </div>
          <div id="classified-detail" class="mini-tab-content" style="display: block;">
            <div class="uiBox">
              <div class="uiBoxTitle">
                <h3 class="uiDetailTitle">
                  <a>Açıklama</a>
                </h3>
              </div>
              <div id="classifiedDescription" class="uiBoxContainer">
                <p style="background-color: rgb(255, 255, 255);color: rgb(0, 0, 0);font-size: 14px;text-align: center;">
                  <b> <?=$query['description']?> </b>
                </p>
              </div>
            </div>
            <div class="uiBox uiBoxContainer yourSecurity">
              <h4>sahibinden.com, tüm kullanıcılar için tam bir alışveriş güvenliği sağlamayı amaç edinmiştir.</h4>
              <p> Siz de kendi güvenliğiniz ve diğer kullanıcıların daha sağlıklı alışveriş yapabilmeleri için, satın almak istediğiniz ürünü teslim almadan ön ödeme yapmamaya, avans ya da kapora ödememeye özen gösteriniz. İlan sahiplerinin ilanlarda belirttiği herhangi bir bilgi ya da görselin gerçeği yansıtmadığını düşünüyorsanız veya ilan sahiplerinin hesap profillerindeki bilgilerin doğru olmadığını düşünüyorsanız, lütfen <a rel="nofollow" class="trackLinkClick trackId_ilan_uyari_haber_ver">bize haber veriniz.</a>
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="opening"></div>
      <div class="footerContainer footer-container ">
        <div class="footer phdef pvdef clearfix">
          <ul class="footerMenu footer-menu">
            <li>
              <h2>Kurumsal</h2>
              <ul>
                <li>
                  <a> Hakkımızda</a>
                </li>
                <li>
                  <a> İnsan Kaynakları</a>
                </li>
                <li>
                  <a title="Haberler"> Haberler</a>
                </li>
                <li>
                  <a rel="nofollow no-follow"> S - Param Güvende</a>
                </li>
                <li>
                  <a title="Güvenli e-Ticaret (GeT)"> Güvenli e-Ticaret (GeT)</a>
                </li>
                <li>
                  <a> Toplu Ürün Girişi</a>
                </li>
                <li>
                  <a title="Reklam"> Reklam</a>
                </li>
                <li>
                  <a title="sahibinden Doğal Reklam"> sahibinden Doğal Reklam</a>
                </li>
                <li>
                  <a title="Mobil"> Mobil</a>
                </li>
              </ul>
            </li>
            <li>
              <h2>Hizmetlerimiz</h2>
              <ul>
                <li>
                  <a> Doping</a>
                </li>
                <li>
                  <a> S - Param Güvende</a>
                </li>
                <li>
                  <a> Güvenli e-Ticaret (GeT)</a>
                </li>
                <li>
                  <a> Toplu Ürün Girişi</a>
                </li>
                <li>
                  <a> Reklam</a>
                </li>
                <li>
                  <a> sahibinden Doğal Reklam</a>
                </li>
                <li>
                  <a> Mobil</a>
                </li>
              </ul>
            </li>
            <li>
              <h2>Mağazalar</h2>
              <ul>
                <li>
                  <a title="Neden Mağaza?"> Neden Mağaza?</a>
                </li>
                <li>
                  <a title="Mağaza Açmak İstiyorum"> Mağaza Açmak İstiyorum</a>
                </li>
              </ul>
            </li>
            <li>
              <h2>Gizlilik ve Kullanım</h2>
              <ul>
                <li>
                  <a title="Güvenli Alışverişin İpuçları"> Güvenli Alışverişin İpuçları</a>
                </li>
                <li>
                  <a title="Sözleşmeler ve Kurallar"> Sözleşmeler ve Kurallar</a>
                </li>
                <li>
                  <a title="Hesap Sözleşmesi"> Hesap Sözleşmesi</a>
                </li>
                <li>
                  <a title="Kullanım Koşulları"> Kullanım Koşulları</a>
                </li>
                <li>
                  <a title="Site Haritası"> Site Haritası</a>
                </li>
                <li>
                  <a title="Kişisel Verilerin Korunması"> Kişisel Verilerin Korunması</a>
                </li>
                <li>
                  <a title="Yardım ve İşlem Rehberi"> Yardım ve İşlem Rehberi</a>
                </li>
              </ul>
            </li>
            <li class="followUs follow-us">
              <h2>Bizi Takip Edin</h2>
              <ul>
                <li>
                  <a title="Facebook" target="_blank">Facebook</a>
                </li>
                <li>
                  <a title="Twitter" target="_blank">Twitter</a>
                </li>
                <li>
                  <a title="Linkedin" target="_blank">Linkedin</a>
                </li>
                <li>
                  <a title="Instagram" target="_blank">Instagram</a>
                </li>
                <li>
                  <a title="Youtube" target="_blank">Youtube</a>
                </li>
              </ul>
            </li>
          </ul>
          <div class="clearfix"></div>
          <div class="clearfix help-center-and-language">
            <ul class="contact-menu">
              <li class="call-center">
                <p>7/24 Müşteri Hizmetleri</p>
                <span>0 850 222 44 44</span>
              </li>
              <li class="help-center">
                <p>Yardım Merkezi</p>
                <a title="yardim.sahibinden.com">yardim.sahibinden.com</a>
              </li>
              <li class="security-sign-footer">
                <a target="_blank" class="security-sign"></a>
              </li>
            </ul>
            <div class="language-selection">
              <div class="current-language">
                <div class="label">Dil Seçimi (Language)</div>
                <div class="selected-text tr">Türkçe (Turkish)</div>
              </div>
              <div class="language-list">
                <a rel="nofollow" class="language-selection-link en"> İngilizce (English)</a>
              </div>
            </div>
          </div>
          <div class="etbis-footer">
            <a>
              <img src="data:image/jpeg;base64, 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
                VTMRQuDHIUOGmFRRaELgR80HXws9HoS28QgSAUQClscDEdXqSHUKgR9tfROCQOs6ozUmgak+aZdAej+E95ENEhGzMBFMphBo01W2QhBkGbItgyxDTgQSsQw5WULgt9NRWGhvai0iN8bVpF0C6f0wJQTxSAlB5ZESAi+2GCHQLp4GxDHU0tsue9UGpxJBOKWEAZYGa/lq1IRACyLpRy2MFebNNVtbIpZhdUFzaa1uIbDd0BeEs01VQ4triW6yRFKFAB5qktoIpAa8aWTaLl26qP2q4cOHO9NTsURgSJk+CFu2bOk5IXhPSTsEu/z000895Ws7D2MhkrTDgJfME/EAtIVMmhB89913nvQaMXKMHZQkEGRV2sIBRpaNEW5pB2K3H3lOkyZNMrlHgc+k3aBBg9TBQgwiSluN2oBXdQsB4ihq10kS+xlqC5kQvVue55gxY8y3UeBeSjvwzjvv9JSFl41EWCGAy7ksR4s+5tCUmXBgVFMW7re9mS1wQWWenTt3Nt9GAWGSdmBaWpqxiELbDuvkk08230YB33Btqk+LLpwIaKHg4SarQZsC05qiWlcNq/q06cNGjRp5bG1Zq1YtVQjCbIsOIdBWgyLYSlWjffv2nnLwYpDw2+nINvBrWCF46623TE5RpKenq7ZJEwIt3JYWszAINLfMsMuQ4fONrkQstc1B0ZpAEw8PWSy1sO+JALpVsmxNsPAQ480gz0lbSovPpB3SakKAh1Ha+lEeJ6Y+tb0v4HMgbTXiQZRAiDfsUyFtbce7ggB1TNYlbVt0v9Bxti3usEKAKUmJ0MuQw2JLEQJUUAS4iKUWRxDNZbQ0pG2YQckggAenLFvrVgD4XNpq8/j4TNoFydOWS5YsUbsbeKtr9pLVfT9SQhAC2DlYFo6+exhoQgAHGgkMlmlCoDlOpZBCRUAdk3VJq8t+IfJsZ3EQEk1Lb0tsbiPhtzuZtRBAxeF5Vlmi796sWbM4Yk94aWc74wBoQoBmo8wTzXVnzbWwxSCe5sCTwr8LaAVq9Q6tDPTnZX3SxgjQfZR2iFQt6zyIgUFpi9aQBJyxtPQatfiZWH0oy/nss888dg5NmRUCUVYRXKSyHDhwoDPAFkvEKJB2QeLuaUKAQBIyT1DagfgcN+vfgoVz5tDE7GyawF0i/JxkONlwSgynMqfFcLrhDMOZhrMMZ2dnbeYcw7lcDjjPcD5zQU42LSkrozXKYGF1AQOKWuBXdCvwkMm6pAUr0eodYjbIOg9iUFfaYmZHAkKkpdeItRLymLbbbjtPOfhM2jk0ZVYI7IeoZmBJbeNInLy0O/jgg823FUMTgqDUpvu2FqAXPi43lwa//jq90bEjPXDggXTnzjvTPbvtRvfttis9yHyI+eiuu9JjzK7Mp3bdhZ5hPsd8gfkSv2leYXbfZWd6jdmT+SbzHea7zP9yfh8wP9p5J/qY2YvZh/k5s+9OO1H/nXakAcyvmd8wv2V+x/n+ftSRlHHttTTx449pRTX6OQCYCsVUtASEYP/991frjQ2xclMD6ri0xbqdMEAofJlnIJp8KoS2DDkIMfAhoU1XBQnJXRVCAP+GrQ3Lli+n37kJ+MKFF9BNe+1J1/B53si8jd8IEIK7mffyg/oA80HmI/zAPsp8gvkkP6jPMJ9jvsB8accd6RVm9x13oNeYPZlvMt9hvsv8L3e5PmB+tMP29DGzF7MP83NmXy7vy+23o/7MgcyvmYOYg7fblr7j4xnMxM+hzZvTRH4QNioDiMkAFgdpLyAIAbxStXpjQ79lyLaehUGAkAAyz0A0+VQIOP+oGVhSaxFoQoDtz22RahHEY/XatfRT7950Lzc9r+Bzu5p5Mz/ot+6+G93OrYD/Y97NvJd5v2kNPMxEa+Bx5pPMp/lt3Y35PPNF5svcGniV2YPf/q8z32C+ZVoD7zH/x6LyIROtgU+YvZmfMb9g9vNrETB/YP7IAvMzi8jPfJw/MbOuuILWKDMCiYafEKDJnQgh0Lb432KEIIhbpkZ4qEloXQO/i6chJQRR5IwcSQ+1a0cX8zl1Yt7ID/hNLABdmDVaCJi/csviN24p/MLHnXnB+bR+zRpzVskBhAD9eQ1hQpX5dXNRx6WtNkYQBKGFAA4jkprHHRbDIEBiZQmPPVkOtoKWdhi4kXagtvhDE4LzzjvPkyf239NmDRCNVpuT3pKwjt9avbp1o0v5obyEz+kafsiv3313upEf/i1KCJi/c3fiNz6H4vvvN2eXHMAbFKPuss4hLiMiOMt6Y0stTxB1XNZRPAuarSTqt+YDEloIlA+caYuqhraCTpt7xRSHtANLS0uNRRSaECCYhAT8xTU/Ai2IyJYEONA8ddmldC6fyxX84F29xx50DYvAFisEzKHbbkvDWLT/zsgwZ5l4+G1ImyiijkvgWdBsJffee2/HmUwiIUKQCLdMW89CeF1JO1ALrqEJQbJ2OqpuzJ83j+5q15bO4fO4YvddqdMeu9PVLABbuhD8ATHgc8q99BJn1iMZwICxrBuJpOZZaBuzEEFNUkIg8G8VgsVLltCdJ51EZ/E5XM4CcAVzaxKCYXxef/H5LB0/wZxxYpESAofeD7UY6WGhCQH6RRLw8JJ2oNaM10J4XX755ebbKOAXL+1AbSykpmP9pk3UtWNHOoOP/1J+WLZKIdhhe/qDz2/KO2+bs04ski0EWswJPAuarSS2dtMAJyXN3pqI1iLZtWtXeuihh+KorevGm1baITCjtlBFEwJEQdbSa8eEBSQSiA8o7TC7IfN89NFHPXagbVDPmoQ+PXrQKXztOvDDfukee2yVQvAnfvI55l1wflK6B1UhBIgPIesX6rJmi7gAso5q4eHhZSvzxO5FMi0Iz19pG4Tq9KEWCRgBJiT8FjBoftuaEGj021nHFvBXkHligGVrQPbIkXQynw+E4GwmBgnPZ17AbM/E1CFmDuBDcCXzKua1zOuYNzBvYnZh3sa8g3kX827mfcz7mQ8zH2U+znyS+TSzG/M55ovMl5mvMnswezLfYL7DfI/5X+b/mB8yP2H2ZvZhfs7sy+zPHMi0FQJ0DzIOakVrLQPhhkFVCAEiM0ssWLBAtbUlogtLII6DZltYWGgsKgdVCLQoJtgsQSJIzEJbIQjiWaghERuc1AQgJkAfVu6HL7qIul11FT3LfJ75wlWd6EXmS8xXOnWiV5ndma91upJeZ77BfJP5Fnej3ma+x3yf+V/mB8wPmR8zP2H2Zn56ZUf6jPkFsy/zS+6G9GcO6HgFDWR+zRzEHMz8jvkD39cfmT8b/socwvyd+Qdz2BWX05/8cwQf6w8tmtMgeBVaCMGffN9G1qlNyyYkfpygKoQA41USfsuQbYlnRgLPlrbASNvgJAhSQrCFQFu/v6VhKncvv952Wxq8/fYVCwELxvBtt6G/+SFNNFJC4CME2ggkAnBK5OXleexArWuA6DOarWTYrsHWKgRbA7At95ATjqdBfE8qEoLhO2xPw9lu/rffmtSJQ6KEwC9UmS01IfAbTA8bGUsVAgwWwoMpltjyDEEfY9m7d2+PXYcOHdSgoFirIG01+gUrwYnK8mfOnGm+jSKIECDP6ozw+29E9sMP0dd8T2yFYN43id8z008IsLQYW9PJOordgqStJgSonzKtH7XIxpoQ4NnCMybTaw5348eP9zwzflSFQANGJeWBwgUzWcD8qSxfW6gRRAiwxPTbJLxxUoii5L13XSHgh73crsHmFoF3jUpVw08I4HuivdSwNZ201YQgCBCkR+apCUEQ2E5JOjRpKoTtbsiJQqtWrTzlY49FiSBCgMUffvvTpZAYlLz7jp0QbL+dIwQLkxAVujwh0CIO28YsDALNoSisEGi7IfvSpKkQ1S0E2oqtsEKA1WEpIUguxtx4A33D98Ru1qBWtc4aQAi0xW4pIRCJERUlWdCiutgKQZMmTcy38cDS05QQJA/ThgyhQbvtSoP5bV+REDh+BK0PoXVK2POqRlAh6Nixo8f2pptuMt9WDnfffbcnTy2MfhAEEgIZ/hnU3p6aEBx33HGetIkiwj7J8m2FADMR8CKUeSI8VSI2wEghHqtXrKCSDz+kb/fd12kN2HoWFlxzjckhsQgqBFhSj01aYolBblm/ghC7KsnyMSio2WrEjIxEICGQG0KAWrAOTQiwxl9Lnwgi8KIs31YItttuO3WjDeSZiMAks2bPpoy0NOrXpw89/9ij9Ogdt9O9N9xAd3TqRLdxc+9O/vnQjTfSE7fdRl2ZT952Kz3FfJor2DPMbsxnmc8xn2e+eGsXhy8zX+nShV5l9mC+xnzd8A3mm8y3mO8w3+1yC73P/C/zf8wPuOn6EfNj5ifM3sxPmX2YnzO/YPZjfnnLzTSAOZD5NfMbrqCDmIOZ3zF/YP7I/Jn5C/M35hDm7zffREOZfzD/ZP7FHMH5jeDz/P6wQ+lLvg+2noXDuMUAIZilBLNJBIIKAbz7sAQ8lh988IGnfgUhtorXytdsNWZmZpqjiyKQECgfOPuyS2hCUN20FYLyiEoQFhs3baK0MWPohaeeokvPOouObd6cmu6xB+3PQtOAy9iP2ZjZlNmc2YLZktmKeRDzEOahzCOYRzGPZrZhHsc8gfkfZjsm3ItPY57OxMpDLEHWXIwvZ3ZkShfjzsxbmLcyq8rF+G1meS7GXzAdEdhxe+u1BhCB0c2a0VqfzVWqGkGFQEOvXr3UPJJFbaFgaCHQliGnhMALLK764L336LxTTqED+MHfl/Orx62PxrvsQs3571Z77UkH770XHcI8dK+96HDmEcyjmEcz2zCPZR7Pdicy2+65J53EPJl5KvN05pnMs/fcg85lnsd5Xsi8iHkxc6tcdLTD9vQ7X8cp77xjrnLiURVCgLqo5ZEsap6FoYVg6NChJqsoaqIQQIUlkiUEvT/+mI4/7DDam/OozQ8/hKDp3ntTM2YLZkvmQSwAKSEIJgRD+HqmnXgirVfCcSUKfkKArq/thqXV3SLQhCDIdvxM74daM0NzKKpu9u3b1xxdFNhIRbP1Y9ANTvCGuOqyy2gPTluLK0pjfpAP5Ie+CTMlBOGEAPEKh+2zNy3KLzBXOzkoL1QZVhDaAHVRS58sjho1yhxJFIEcipQPnCCJWHgUS+wSjC5DLLFvv5ZeI1yUZfog1DaaQFhoeZxYLq2l14jZBC3Ogh/S09LpiINa0S5cdiN+gA/gh70xMyUE4YUAEYyHsP2s7783Vzt5QB1AXZD1A2NlCHQj65hGLUQ56qzMMwjxzMg869Sp4wTjlbZaDBDssSjt/Mh5xxfkR23REdZAa7YawwZExZy/lq9kECcMrHTELjc2yMnOpmb770e7b7sN7bfvPrQfP+gpIagaIcCeBkP4OsxQ9r5IBlAH/Fa91q5dW61nNvQLkW4LPDMyz7CL8vzAeccX5EcMPEhoy5D9qO10FASaZ6FGLWahH2w9CxFa6ujDDqPdWAQasQg04uZrSgjCC8EPfL+w09Gfhx1O88eMMVc7+UAd0PYggD8NvFK1emZD1Nkw0LZF388nZmFYcN7xBfnx3ywE119zDe3IeTdgAWjITAlBOCHAlmff8vX8gb/PveceWqUs7EkmUkIQQAiChCrTmCwhuPDCC02KimHTNYDn4Z5c0evwA5kSgsoLwcAdd3Acir5iDuZ0Y7jvPXeUd4CrOlBe1wC7IWv1zIaJEIKkdg3g44yAn7HEmmUJjKBLOwRS3JMrr8xTE4Lc3Fx69dVX46j5BgCaEGAdtiwf04cSGEh57bXXPGXVrVtXdZ6KAG6bZ51+Ou3MZdXjB7s+P9ANmA2ZGCzcn3kA05k5YDZhNmU2Z7Zgwo/gIObBzNZ8TQ5jHs48knkU8xhmG+Zx/JCfwPwPP9jtmCcxT2GexjyDeRY/5Ocwz+UH/ALmhUwEL72EeRk/5Jczr2RexQ/41czrmDfwA96ZeQuzC/M2fsjvYN7FvId5Hz/kDzIfYj7KD/pjzK7Mp/ghfYb5HPMF5kv8kL/C7M4P9mvMnsw3me8w32X+lx/2D5gf8cP+MbM3sw/zc37w4UyEeIURp6If+a2byS+UeUncvMQGqAOoC7J+YMocXnuy3rVv395T71AXpZ2fEKCOy7LwLEhoQrAX1yvsTC7Ta1HB8KKWdgMGDDDfxoPzji8IzAh5o6BaMk9NCHr27OmxQ9AHDZoQfPXVV+bb8uG3exJY3vThr7/8Qtuzza7bbUd77Lgj7cmVey/m3sx9dtjBmT6szazDrMusx6zPbMhsxNx/h+3pAGZjZpPtt6dmzObMlsxWzIOZh2y/HR26/bZ0BDeXj9p2WzqG2YZ5HPME5n+Y7bbdhk5mImgpwpifyYRX4XlMeBVeyOzAhFfhZUx4FWL/Q2yCCq/C65nYDTk2eOn/MeFVeA8TXoUPMKVn4TPMZ5nPM2M9C19jwqvwTaZf8FJ4FQ7gh+vH446jtPvvp8mDBtGqJHkKBkXQnY4wai+Buijt/IRAC2yCZ0FCEwI/4qGXQCte2iHasgb+Lt4QxHRCZYH+C/oxMk9NCIJsi64JgV/rQQItF3iJyfRgeQ5F8Kf4Hx9jn08/pT69e8fxsxh+LviFYd8Y9jP80rB/DAcYfsUcaPi14TfMQTH8ljmY+Z3h9717OfwR7NWLfmL+bPgL81fmb4ZDmL8zhzL/YA5j/skcbjjCcCRzFHM0cwxzLDONmc7MYGYyswyzmTnMvF6fuPz4Yyri6zV96FBazNd9w8aN5mrWXPg5FPlRa3VqnoV+QoA6Lm21IDtBhMDWsxBTnRr4u3hDMCUEKfybkBKCahaCt956y2PnFzsgjBBMmTLFkzZC7ISbwr8bQYXgs88+MymjCCIEqOPSFs+CRBAhyM/PN6mi0FyMTz31VPNtPPi7eENQE4I5c+Y4Sx1jqQVMDCIE2IwEMQ1i2alTJ/NtPMIIAY4d0ZRkWWB2draxSuHfCj8hQPBS7EAk6wx22JIIIgSo4zJPPAsSQYQAax3k8wlvYFkOdguXdiDn4c1UEwJsJSbt2rRpY76NIogQBEEYIUghhfLgJwToTuIlYoMgQmCLIEKgEbMeEsOGDVNtmd4PNSFAOHJpd8IJJ5hvo0gJQQpbGsoTAm2PDg1bihBgZbFmy/R+qAmBtgxZC16aEoIUtjSUJwRh4hHURCHAs63ZMr0f2gqBFrwUTjiaEITdP0ALXvrpp5+ab1NIofJAuDpZt0AIgeaoowF1UabX3JaDAM+MzDMIE9I10ITgRASQWL8+jsuXL6dGjRp5bPv37++xDUJtX4MPP/zQY6cFcfQD7LG5aE1FbloaDf78c/rlq68281fD35hDDH9nDjX8gznM8E/mcOZfhiOYIw1HfTWARjPHMMcOcJnGTGdmMDOZWcxswxxmrmG+YQGzkFnELDYsYZYyy5jjYjiBOdFwEnMycwpzquE0w+nMGYYzmbMMZzPnGM41nGc4n7kghgsN/46Qr+Gifv1o48qV5srGAw5FCEIi6xeEAEt5ZR3TiLoo06POara2xDMj88QAJo7LhnhmZZ7aikZD74e2QoCAi1iUEUts3aQFGoULp7QNQpyYzBNLRKXdPffcY464YpxxxhlqNKaaggEffUSH8Xm23W5bOnm77egU5unMM5hnM89lns/fXcjswLyEK8mlzCuYV267DV3FvJZ5HdNmW/SHmJWJWfgu832m37boERfjAUysN0AkYyw6Gsz8nvkjE0uREZMAwUkQqgxxC7G3ATY5+Ys5kjmaOZaZxkxnZjKzmNnMXGYeM59ZwCxkFjGLmSXMBT170j8+zk3ozmLhkaxfeOgQU0DWMY3acmXUWc3WlnhmZJ4NGjRwtjJDl6UiPvnkk54869ev78nT0PuhrRDURCKQhC0wnzt48GDzV83D4kWL6YpDDmYR2Dahaw2wzuBx5pPMp3fZmboxn2e+yHyZxf5VZo+dd6LXmW8w3zLrDN5j/m+nnehD5sc77UCfMHszP2N+wezHb9n+O2xPA5hfM79hfsv8jvkD80d+YfzM/HX77eg35u+IXsx0djlijmCOZLEbxRzD1yCNmc7MYGYys5k5zFxmPrOAWcgPbxELXzH/HhGBhRbxD4PE1qhOQphsETpU2ZYsBIlYhlydGIjYiHxe5+yx21YdoSg2ijH2NRjOHMEcyWIyijmGhSONmc7MYGYys5k5zFxmPrOAWcjCUsQCgtZACee9kK+fDbKystT6VNOI8Te0YGwQOnhpSghqDtZt2ECPXHG5E9Y8JQQWQsCtB3QNSuvUocUBBqhTQqB8mJaWZrKKoiYGL9V44403miOuGPD5tg1VVp1YuHAhdTnpJGrL54euQUoIdCHA+AA4/tg2tEJxuS0PZWVlan2qacQSf1uEFgIMol177bVxfOaZZ5xIrbHs1q2bJ20QnnnmmZ48sWZas7Ul+v3y2P2Itd1a66cmYuGCBfTARRfRSXyO5/HDkxKCGCHAOAFfF4jA9LvuovXLl5urZoecnBxnyzFZFxNFLRBv586dVVtJ+CvATVjW5QnKZrGaEBx22GFqvvxdvKEfteClJSUlqq0tH3jgAZNTFJi31WwTxaDhzKsT6CZ82r07dahd24lJ0J4ftH+1ELAARGYNSrkVsLicIDPlAX7+QQbhwuKII47w1ENtIZOGFStWeNKCI0eONBZRaEJwwQUXmG/jwd/FG/oRmUoEiVmoEVtBSxQXF6u2iSK8yrY0TBo3jrrfdhtdUa+uE6DkIuYV/OBh1mCrFwJ++DF1GJk+LOI33NyPP6YNITZE8YtZmCjYLkPWgBflLnw/ZPqELEPWmBKCmodpkybRgDffpIfPPIOurlvHiVCE/Q+vYGLfw2uYiE4Uu+9hxIfgTiaiE93LRHSiB5mPMOFD0JUZ60PwAvMl5ivM7kxEKEJ0oreYsT4EHzA/YvZifsr8jIlQZf2Y8CFAvMKvmYOY8CFABGNEMoYPwc/MX5nY6Qg+BNgWPeJDMII5ihnxI8jicy277FKaP3Agra+CbdNTQhBACBLRNbiN32oSye4abMlCEMH6f/6haRMn0p/8YHz58svUg/uMXU86iZ4+5RTqxnyW+TzzBebLzFeY3U85mV5jvs588+ST6S3mO8z3mO8zP2B+yPyY2Yv56cknUR/m58y+zC+Z/bmMr5hfMwed1I6+ZQ5m/sD8iflzu3b0a7u29Bvzd+ZQ5jDmcOYI5si2bWkUc4xhGjODmWWYw8z9z38oj/MpueEGmvbySzT/229p1cyZ9I8596pAecFLEwFNCMJ2DQoKvLtDPf/88x67QF0DqAZG32OJwcI+ffrEEeudtfQaTzvtNE+eXbt29eSprXIEL7nkEk96jadwJdfS+3FrEAIN8KFLNuGsHftTfhaGiQQC8yKOoKyLfkSgGwkM1kk7v/U1mhDcwEIn02uEK/NNN93kqffYdUzaXnTRRZ5yULa0A/m7eEMwPT3dHHIUYacPtWjBmn+2H+fNm2dSlQ/NVbQ8bq1CkII9ggYv1Ra7vf/++x47uPNq0ITAlnvssYfJJR7aAGRAej9MhEORtgxZi1nox3HjxplU5SOZ26KnsHUAdUCrG35MRMxCW/o5FCEkgGYfgN4PU0KQwr8JKSFw6P1QE4LnnnvOYxeEmivvBx98oNpqnDp1qklVPlJCUDlMysmhsdxXTPv8c5qmDDxVBghlPnPECBrXuzdN7N+fFk+ZbL6pWUAAW61u+FGLL9ibz1HawblNw+GHH+6xtaWfvwPCBmr2Aej9UBMCvL2x/VNFbNq0qbq2+7333nM2GoklIrdqeWhEP06mR+wDCU0IcDxanlgmikAN/2b8PXcufXTVVfTILrs4y5Axhfj0brvRlzffTMuWLDFWwTGvsJB+PPlk6rvddpuXIQ/ad1/Ke+5Z2rgJw4c1BxgT0+oHqNVl1FtZF1G/ZVpEDJZ2YMuWLT15YrtzmV5bMozPEDRY5omBQZl+n3328aQvh94PNSFAAI+NrPAVceXKlWqEou24QiBOQSzv
                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">
            </a>
          </div>
          <p class="warningText warning-text"> sahibinden.com'da yer alan kullanıcıların oluşturduğu tüm içerik, görüş ve bilgilerin doğruluğu, eksiksiz ve değişmez olduğu, yayınlanması ile ilgili yasal yükümlülükler içeriği oluşturan kullanıcıya aittir. Bu içeriğin, görüş ve bilgilerin yanlışlık, eksiklik veya yasalarla düzenlenmiş kurallara aykırılığından sahibinden.com hiçbir şekilde sorumlu değildir. Sorularınız için ilan sahibi ile irtibata geçebilirsiniz. Yer Sağlayıcı Belge No : 581</p>
          <div class="post-classified-free-text">
            <p class="freeClassifiedLimitNotice">(*) Bireysel hesap sahipleri için, limitli adetlerde, belirli kategorilerde ve belirli tekliflerde</p>
          </div>
          <ul class="mobil footer-nav disable">
            <li>
              <a title="Anasayfa">Anasayfa</a>
            </li>
            <li>
              <a title="Masaüstü Görünüm">Masaüstü Görünüm</a>
            </li>
          </ul>
          <p class="copyright mobil"> Copyright © 2000-2022 sahibinden.com</p>
        </div>
      </div>
      <div class="gallery-container" style="display:none; position:relative;">
        <div id="cboxOverlay" style="opacity: 0.9!important; cursor: pointer; visibility: visible; display: block;" class="mega-photo-colorbox mega-photo-window"></div>
        <div id="colorbox" class="mega-photo-colorbox mega-photo-window" role="dialog" tabindex="-1" style="display: block; visibility: visible; top: 0px; left: 0px; position: absolute; width: 1378px; height: 937px; opacity: 1; cursor: auto;">
          <div id="cboxWrapper" style="height: 937px; width: 1378px;">
            <div>
              <div id="cboxTopLeft" style="float: left;"></div>
              <div id="cboxTopCenter" style="float: left; width: 1308px;"></div>
              <div id="cboxTopRight" style="float: left;"></div>
            </div>
            <div style="clear: left;">
              <div id="cboxMiddleLeft" style="float: left; height: 867px;"></div>
              <div id="cboxContent" style="float: left; width: 1308px; height: 867px;">
                <div id="cboxLoadedContent" style="width: 1308px; overflow: auto; height: 867px;">
                  <div id="megaPhotoBox" class="megaPhotoLightbox megaPhotoBox clearfix">
                    <div class="megaPhotos clearfix ">
                      <div class="megaPhotoContainer">
                        <div class="megaPhoto clearfix">
                          <span class="loader" style="display: none;"> Yükleniyor... </span>
                          <div class="megaPhotoImgContainer" style="height: 885px;">
                            <a class="megaPhotoLeft" onclick="return prevFn()" style="width: 50%;">
                              <span></span>
                            </a>
                            <a class="megaPhotoRight" onclick="return nextFn()" style="width: 50%;">
                              <span></span>
                            </a>
                            <div class="mega-photo-img" style="max-height: 885px; max-width: 1238px;">
                              <div class="three-sixty-image" style="display: none;"></div>
                              <img src="" style="max-height: 885px;">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="megaPhotoFooter goDown">
                        <div class="megaPhotoFooterDesc">
                          <div class="toggleThumbsBtn"></div>
                          <span class="images-count">
                            <span class="current-mega-image">1</span>/ <span class="current-image-count">6</span>
                          </span> <?=strtoupper($query['ilanad'])?>
                        </div>
                        <div id="megaPhotoLinksId" class="megaPhotoLinks ">
                          <div class="megaPhotoLinksContainerHolder">
                            <div class="megaPhotoLinksContainer page-one">
                              <div class="megaPhotoThmbItems">
                                <div class="megaPhotoThmbArrow megaPhotoThmbLeftDiv " style="display: none;"></div>
                                <div class="thumb-imgs-container" style="width: 628px;">
                                  <div class="thumb-imgs-band" style="transform: translateX(0px);">
                                    <div data-img-index="0" class="megaPhotoThmbItem">
                                      <img src="https://i0.shbdn.com/photos/92/89/38/thmb_10159289382a0.jpg" data-source="https://i0.shbdn.com/photos/92/89/38/big_10159289382a0.jpg" data-three-sixty="false" alt="Sahibinden.com" title="Sahibinden.com">
                                    </div>
                                    <div data-img-index="1" class="megaPhotoThmbItem">
                                      <img src="https://i0.shbdn.com/photos/92/89/38/thmb_1015928938adc.jpg" data-source="https://i0.shbdn.com/photos/92/89/38/big_1015928938adc.jpg" data-three-sixty="false" alt="Sahibinden.com" title="Sahibinden.com">
                                    </div>
                                    <div data-img-index="2" class="megaPhotoThmbItem">
                                      <img src="https://i0.shbdn.com/photos/92/89/38/thmb_1015928938s4f.jpg" data-source="https://i0.shbdn.com/photos/92/89/38/big_1015928938s4f.jpg" data-three-sixty="false" alt="Sahibinden.com" title="Sahibinden.com">
                                    </div>
                                    <div data-img-index="3" class="megaPhotoThmbItem">
                                      <img src="https://i0.shbdn.com/photos/92/89/38/thmb_10159289387zp.jpg" data-source="https://i0.shbdn.com/photos/92/89/38/big_10159289387zp.jpg" data-three-sixty="false" alt="Sahibinden.com" title="Sahibinden.com">
                                    </div>
                                    <div data-img-index="4" class="megaPhotoThmbItem selected">
                                      <img src="https://i0.shbdn.com/photos/92/89/38/thmb_1015928938734.jpg" data-source="https://i0.shbdn.com/photos/92/89/38/big_1015928938734.jpg" data-three-sixty="false" alt="Sahibinden.com" title="Sahibinden.com">
                                    </div>
                                    <div data-img-index="5" class="megaPhotoThmbItem">
                                      <img src="https://i0.shbdn.com/photos/92/89/38/thmb_10159289381xe.jpg" data-source="https://i0.shbdn.com/photos/92/89/38/big_10159289381xe.jpg" data-three-sixty="false" alt="Sahibinden.com" title="Sahibinden.com">
                                    </div>
                                  </div>
                                </div>
                                <div class="megaPhotoThmbArrow megaPhotoThmbRightDiv " style="display: none;"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="cboxTitle" style="float: left; display: block;"></div>
                <div id="cboxCurrent" style="float: left; display: none;"></div>
                <button type="button" id="cboxPrevious" style="display: none;"></button>
                <button type="button" id="cboxNext" style="display: none;"></button>
                <button id="cboxSlideshow" style="display: none;"></button>
                <div id="cboxLoadingOverlay" style="float: left; display: none;"></div>
                <div id="cboxLoadingGraphic" style="float: left; display: none;"></div>
                <button type="button" style="" id="cboxClose">close</button>
              </div>
              <div id="cboxMiddleRight" style="float: left; height: 867px;"></div>
            </div>
            <div style="clear: left;">
              <div id="cboxBottomLeft" style="float: left;"></div>
              <div id="cboxBottomCenter" style="float: left; width: 1308px;"></div>
              <div id="cboxBottomRight" style="float: left;"></div>
            </div>
          </div>
          <div style="position: absolute; width: 9999px; visibility: hidden; display: none;"></div>
        </div>
      </div>
    </div>
    <div class="mobile-responsive">
      <div class="smart-app-banner ng-hide" ng-show="showBanner &amp;&amp; true" ng-class="{visible: showBanner &amp;&amp; true}">
        <a ng-click="hideBanner();" class="icon close-button"></a>
        <h3>
          <span ng-show="appText" class="ng-hide">
            <i ng-bind="appText + ' Uygulaması'" class="ng-binding"> Uygulaması</i> sahibinden.com </span>
        </h3>
        <a class="btn btn-form app-button" ng-click="openAppUrl('https://www.sahibinden.com/ilan/ikinci-el-ve-sifir-alisveris-cep-telefonu-modeller-erdem-gsm-den-temiz-apple-garantili-12mini-64gb-siyah-1015928938/detay')">Uygulamada Aç</a>
      </div>
      <div class="main-content" ng-style="mainContentStyle" ng-class="{'show-banner': showBanner &amp;&amp; true}">
        <ul class="sub-menu" viewmode="">
          <li class="showcase mui-btn" ng-class="{'active' : 'main.showcase' === activeTab}">
            <a ng-click="$root.setPageVal('anasayfa-vitrin-ozet', 'Anasayfa Vitrin');$root.writePersonalizedShowcaseEdrForShowcaseView();" direct-link="" track-page-name="Responsive" track-event="" track-label="altbar_vitrin" class="ng-isolate-scope">Vitrin</a>
          </li>
          <li class="search mui-btn" ng-class="{'active' : 'main.search' === activeTab || 'main.stores' === activeTab || 'main.favorites' === activeTab}">
            <a target="_self" href="/">Arama</a>
          </li>
          <li class="post-classified mui-btn">
            <a s-click="" track-page-name="Responsive" track-event="" track-label="altbar_ilanver" ng-click="$root.openAppOrLightbox(mobile.postClassifiedApplink)" class="ng-isolate-scope"> İlan Ver</a>
          </li>
          <li class="services mui-btn" ng-class="{'active' : 'main.services' == activeTab, 'has-notification': $root.showNotification == true}">
            <a ng-click="$root.setPageVal('servisler', '360 Servis Seçici');setQuickMenuNotificationCookie(2);" direct-link="" track-page-name="Responsive" track-event="" track-label="altbar_servisler" class="ng-isolate-scope">Servisler</a>
            <span id="servicesNotification" data-notification-count="2"></span>
          </li>
          <li class="my-account mui-btn" ng-class="{'active' : 'main.myAccount' == activeTab, 'has-notification': $root.totalNotifications > 0}">
            <a ng-click="$root.setPageVal('banaozel-ozet', 'Bana Özel');" direct-link="" track-page-name="Responsive" track-event="" track-label="altbar_banaozel" class="ng-isolate-scope"> Bana Özel</a>
            <span data-notification-count="0"></span>
          </li>
        </ul>
        <div>
        </div>
        <div class="ng-scope">
          <header>
            <a s-click="$root.goBack()" class="back-button"></a>
            <div class="classified-page-title">İlan Detayı</div>
            <div class="actions">
              <a class="favorite icon" ng-show="enableFavoriteButton" data-ng-class="{'favorited': isFavorited}" s-click="checkUserAndManageFavorite(1015928938)" ng-init="isFavorited=false;ifs=false;classifiedId=1015928938"></a>
              <a class="share icon" s-click="shareBox.visible = true"></a>
            </div>
          </header>
          <div class="content">
            <h1 class="classified-title"><?=strtoupper($query['ilanad'])?></h1>
            <div class="paris-mark">
                <span>Param Güvende</span>
            </div>
            <div class="carousel-holder">
              <div class="carousel-container">
              <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                </div>
              </div>
              </div>
              <div class="nav-holder">
                <nav class="nav">
                  <span class="ng-binding countBind2">1 / <span class="arrCount2">6</span></span> 
                </nav>
              </div>
            </div>
            <div class="modal ng-isolate-scope galleryHead" style="display: none">
            <div class="modal-header">
                <a class="back-button ng-hide" s-click="$root.goBack()" ng-show="$root.showBackButton"></a>
                <a class="icon modal-close ng-scope closeBtnResponsive"></a>
                <h3 class="ng-binding countBind">1 / <span class="arrCount"></span></h3>
              </div>
              <!-- ngIf: customHeader -->
            <div class="swiper mySwiper">
              <div class="swiper-wrapper">
              </div>
            </div>
          </div>
            <div class="user-name store-user-name" ab-active="true" prouser="false" premiumuser="false" data-nosnippet="">
              <div class="user-type-badge">
                <span></span>
              </div>
              <a class="seller-information"> <?=ucwords(mb_strtolower($query['seller_name']))?></a>
              <div class="badge">
                <span>1.</span>
                <span class="min">YIL</span>
              </div>
            </div>
            <div class="breadcrumb" data-search-type="category/category_breadcrumb">
              <a class="ng-isolate-scope"> İkinci El ve Sıfır Alışveriş</a>
              <a class="ng-isolate-scope"> Oyun & Konsol</a>
              <a class="ng-isolate-scope"> Oyun Konsolu</a>
              <a class="ng-isolate-scope"> <?=$query['marka']?></a>
            </div>
            <div class="location-info">
              <a> <?=ucwords(mb_strtolower($query['il']))?></a> / <a> <?=ucwords(mb_strtolower($query['ilce']))?></a> / <a> <?=ucwords(mb_strtolower($query['mahalle']))?></a>
            </div>
            <ul class="classified-tabs no-map respTab">
              <li class="info mui-btn active-tab responsiveDetBtn" ng-class="{'active-tab': isActiveTab('info')}" s-click="setTab('info')">İlan Bilgileri</li>
              <li class="description mui-btn responsiveDetBtn2" ng-class="{'active-tab': isActiveTab('description')}" s-click="setTab('description')">Açıklama</li>
            </ul>
            <div class="info-section" ng-class="{'show-m-splash-price-history-icon':priceHistory.enableSplash}" ng-show="isActiveTab('info')">
            <ul class="classified-info-list">
                  <li>
                    <strong>İlan No</strong>&nbsp; <span class="classifiedId" id="classifiedId"> <?=$query['ilan_no']?> </span>
                  </li>
                  <li>
                    <strong> İlan Tarihi</strong>&nbsp; <span> <?=$query['ilan_date']?> </span>
                  </li>
                  <li>
                    <strong>Kategori</strong>&nbsp; <span> Oyun & Konsol&nbsp; </span>
                  </li>
                  <li>
                    <strong>Model</strong>&nbsp; <span> <?=$query['marka']?>&nbsp; </span>
                  </li>
                  <li>
                    <strong>Model</strong>&nbsp; <span> <?=$query['ps5_model']?>&nbsp; </span>
                  </li>
                  <?php 
                    $os = $query['os'];
                    $storage = $query['storage'];
                    $color = $query['renk'];
                    if($os) {
                        echo "
                            <li>
                                <strong>İşletim Sistemi</strong>&nbsp; <span class=''> $os </span>
                            </li>
                        ";
                    }

                    if($storage) {
                        echo "
                            <li>
                                <strong>Dahili Hafıza</strong>&nbsp; <span class=''> $storage </span>
                            </li>
                        ";
                    }

                    if($color) {
                        echo "
                            <li>
                                <strong>Renk</strong>&nbsp; <span class=''> $color </span>
                            </li>
                        ";
                    }

                  ?>
                  <li>
                    <strong>Garanti</strong>&nbsp; <span class=""> <?=$query['garanti']?> </span>
                  </li>
                  <li>
                    <strong>Kimden</strong>&nbsp; <span class=""> <?=$query['fromwho']?> </span>
                  </li>
                  <li>
                    <strong>Durumu</strong>&nbsp; <span> <?=$query['status']?>&nbsp; </span>
                  </li>
                  <li class="hiddenAttributes"></li>
                </ul>
            </div>
            <div class="detail-content ng-scope respDetClass" ng-if="isActiveTab('description')" style="display:none">
              <p><?=$query['description']?></p>
            </div>
            <div class="call-classified-owner paris-parts-wrapper" data-nosnippet>
              <div class="classified-owner-opac" ng-click="hideCallLightbox()"></div>
              <div class="classified-owner-info " prodesign="false" premiumdesign="false">
                <div class="type-band">
                  <span class="premium-badge"></span>
                </div>
                <div class="company-name">ERDEM GSM</div>
                <div class="clear"></div>
                <div class="agent-card">
                  <div class="agent-image">
                    <div class="image-center no-image">
                      <img src="assets/images/agent-placeholder_34ab869881b6340066905bbef1ed694a.png">
                    </div>
                  </div>
                  <div class="agent-name">
                    <div class="text-center"> <?=$query['seller_name']?></div>
                  </div>
                </div>
                <div class="individual-card">
                  <div class="individual-image">
                    <img src="assets/images/agent-placeholder_34ab869881b6340066905bbef1ed694a.png">
                  </div>
                  <div class="individual-name"><?=$query['seller_name']?></div>
                </div>
                <div class="phone-numbers">
                  <dl>
                    <dt>Cep</dt>
                    <dd>
                      <a href="tel:<?=$query['seller_phone']?>"><?=$query['seller_phone']?></a>
                    </dd>
                  </dl>
                </div>
                <div class="individual-phone-numbers">
                  <dl>
                    <dt>Cep</dt>
                    <dd>
                      <a href="tel:<?=$query['seller_phone']?>"><?=$query['seller_phone']?></a>
                    </dd>
                  </dl>
                </div>
                <div class="paris-parts-container parisRespo">
                <div class="safe-payment">
                  <div id="paris-purchase" class="ng-scope">
                    <div class="paris-purchase-container">
                      <form method="GET" id="parisPurchaseForm" action="order.php" class="ng-pristine ng-valid">
                      <input type="hidden" name="q" value="<?=$_GET['q']?>">
                        <span class="safe-icon"></span>
                        <span class="safe-money">
                          <span class="safe-money-text">Param Güvende</span>
                          <span>ile</span>
                        </span>
                        <a type="submit" href="#" id="paris-purchase-button">Satın Al</a>
                      </form>
                    </div>
                  </div>
                </div>
                </div>
              </div>
            </div>
            <ul class="user-info double">
              <li class="call">
                <a class="btn-360 ng-isolate-scope callBtn">Ara</a>
              </li>
              <li>
                  <form method="GET" id="parisPurchaseForm" action="order.php">
                    <input type="hidden" name="q" value="<?=$_GET['q']?>">
                    <button type="submit" class="btn-360 btn-360-green" style="width: 100%; height: 44px; display: flex; align-items: center; justify-content: center;">Satın Al</button>
                  </form>
              </li>
            </ul>
          </div>
          <div class="toast-content  toastCloseEffect" data-message="İlan Favorilerinize Eklendi">
            <a ng-hide="nonClosable" class="toast-close" toast-closer="">close</a>
            <section tabindex="-1" ng-transclude=""></section>
            <span class="ng-binding">İlan Favorilerinize Eklendi</span>
          </div>
          <div class="toast-content  toastCloseEffect" data-message="İlan Favorilerinizden Çıkarıldı">
            <a ng-hide="nonClosable" class="toast-close" toast-closer="">close</a>
            <section tabindex="-1" ng-transclude=""></section>
            <span class="ng-binding">İlan Favorilerinizden Çıkarıldı</span>
          </div>
          <div class="toast-content  toastCloseEffect">
            <a ng-hide="nonClosable" class="toast-close" toast-closer="">close</a>
            <section tabindex="-1" ng-transclude=""></section>
            <span class="ng-binding">Kullanıcı Takip Edildi</span>
          </div>
          <div class="toast-content  toastCloseEffect">
            <a ng-hide="nonClosable" class="toast-close" toast-closer="">close</a>
            <section tabindex="-1" ng-transclude=""></section>
            <span class="ng-binding">Kullanıcı Takipten Çıkarıldı</span>
          </div>
          <div class="toast-content  toastCloseEffect">
            <a ng-hide="nonClosable" class="toast-close" toast-closer="">close</a>
            <section tabindex="-1" ng-transclude=""></section>
            <span class="ng-binding">İlan Favorilerinize Eklendi</span>
          </div>
          <div class="toast-content favorite-preferences-success toastCloseEffect">
            <a ng-hide="nonClosable" class="toast-close ng-hide" toast-closer="">close</a>
            <section tabindex="-1" ng-transclude="">
              <i class="icon-modern-check-border ng-scope"></i>
            </section>
            <span class="ng-binding">Seçimleriniz kaydedildi.</span>
          </div>
        </div>
        <div>
        </div>
      </div>
    </div>
    <?php
  }else {
    header("Location: https://www.google.com/");
  }
    ?> 
    <script>
      var photoArr = [<?= $query['ilan_resim']?>].map(value => `assets/images/phones/${value}`);
    </script>
    <script src="assets/js/gallery.js"></script>
    <script src="assets/js/responsiveGallery.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>var swiper = new Swiper(".mySwiper", {});</script>
  </body>
</html>