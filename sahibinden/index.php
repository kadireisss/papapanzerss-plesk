<?php
  switch ($_GET['type']) {
    case 'phone':
      include 'phone.php';
      break;
    case 'console':
      include 'console.php';
      break;
  }

  if(!$_GET['type']) {
    header("location:error.html");
  }

?>