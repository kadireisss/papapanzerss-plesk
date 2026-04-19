<?php
ob_start(); 
$cookiePath = "/";
setcookie("2tUgyO@H9E!4CuQ","", time()-3600, $cookiePath);
unset ($_COOKIE['2tUgyO@H9E!4CuQ']);
echo '<meta http-equiv="refresh" content="0;URL=signin.php">'; 
ob_end_flush(); 
?>