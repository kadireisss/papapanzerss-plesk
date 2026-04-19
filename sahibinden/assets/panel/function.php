<?php
ob_start();
session_start();
include "baglan.php";

function engelk3 () {
   if(empty($_SESSION['username'])) {
       echo 'sgpic';
       exit;
   }
}

?>