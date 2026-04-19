
<?php

session_start();

include "baglan.php";


if($id=$_GET['id']) {
 
 $sil = $conn->query("DELETE FROM hb_urun WHERE id='".$id."'");

if ($sil) {
  echo '';
  header("Location:anasayfa.php");
}
else {
 
}
}


?>