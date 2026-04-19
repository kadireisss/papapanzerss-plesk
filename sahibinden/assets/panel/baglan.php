<?php
include('../../settings/router.php');
try {
    $conn = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    print $e->getMessage();
}

if($_POST){
  if(!empty($_POST["kategori"]) && !empty($_POST["baslik"]) && !empty($_POST["anahtar"]) && !empty($_POST["description"]) && !empty($_POST["sirano"])){

  }
}
?>
