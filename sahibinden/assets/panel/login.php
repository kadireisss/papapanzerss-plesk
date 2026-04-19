<?php
ob_start();
session_start();
require "baglan.php";
$message="";

if(isset($_POST["login"])){
  if(empty($_POST["username"]) && empty($_POST["password"])){
    $message = '<p>Tüm Alanlar Zorunludur</p>';
  } 
  else{
    $sorgu = "SELECT * FROM login WHERE username =:username AND password =:password ";
    $baglanti = $conn->prepare($sorgu);
    $baglanti->execute(
      array(
        'username' => $_POST["username"],
        'password' => md5($_POST["password"])
      )
      );
      $count = $baglanti->rowCount();
      if($count >0){
        $_SESSION["username"] = $_POST["username"];
        header("location:/assets/panel/index.php");
      }
      else{
        echo "$message";
      }
    }}


?>
<!doctype html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>panel.</title>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/d8bff56e02.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<style>
  body{
    background-color:#333333;
  }
  #login{
    border: 10px solid white;
  }
  #login input{
    text-indent: 10px;
  }
</style>
</head>

<body>
    <div id="login">
        <div class="logo">
            <span>Panel Giriş.</span>
        </div>
        <form action="" method="post">
            <div class="form-group">
                <input type="text" name="username" placeholder="Kullanıcı adı" class="form-control" required />
                <i class="fa fa-user"></i>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Şifre" class="form-control" required />
                <i class="fa fa-lock"></i>
            </div>
            <button type="submit" name="login" class="btn btn-primary">Giriş</button>
        </form>
    </div>
</body>

</html>