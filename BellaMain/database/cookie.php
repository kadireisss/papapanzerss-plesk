<?php include("database/connect.php");
	  include("database/fonk.php");

if(isset($_COOKIE['2tUgyO@H9E!4CuQ'])){
		$sifrecozulmusWadanz = sifrecozWadanz($_COOKIE['2tUgyO@H9E!4CuQ']);
		$cozulmusArrayWadanz = explode('+', $sifrecozulmusWadanz);
		$girisyapanWadanz 	= $cozulmusArrayWadanz[0];
		$rutbeWadanz = $cozulmusArrayWadanz[1];
	}else{
		header('Location: signin.php');
		exit();
	}

	error_reporting(0);
?>