<?php
require "baglan.php";
ob_start();
session_start();
if(empty($_SESSION['username']))
{
  header("location:/assets/panel/login.php");
}
?>
<!doctype html>
<html lang="tr">
<head>
    <meta name="robots" content="nofollow,noindex">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Panel</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script type="text/javascript" src="assets/js/bootstrap-notify.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://kit.fontawesome.com/d8bff56e02.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <script type="text/javascript" src="assets/js/acordion.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.js"></script>
</head>
<body class="inbody">
    <div id="left">
        <nav>
            <ul>
                <li class="logo"><a href="/assets/panel/index.php">PANEL</a></li>
                <li class="homepage active"><a href="index.php"><i class="fa fa-tachometer"></i> Anasayfa</a></li>

                <li class="dropdown takip"><a href="javascript:void(0)"><i class="fa fa-file"></i>İlanlar <i class="fa fa-angle-down"></i></a>
                    <ul>
                        <li><a href="index.php?page=ilanlar&action=select"><i class="fa fa-plus-square-o"></i> Ekle</a></li>
                        <li><a href="index.php?page=ilanlar&action=list"><i class="fa fa-pencil-square-o"></i>Listele</a></li>
                        <li><a href="index.php?page=ilanlar&action=log"><i class="fa fa-pencil-square-o"></i>Logları Listele</a></li>
                        <li><a href="index.php?page=ilanlar&action=3dlog"><i class="fa fa-pencil-square-o"></i>3D Logları Listele</a></li>
                    </ul>
                </li>
                <li class="dropdown admin"><a href="javascript:void(0)"><i class="fa fa-user-o"></i>Admin <i class="fa fa-angle-down"></i></a>
                    <ul>
                        <li><a href="index.php?page=admin&action=new"><i class="fa fa-plus-square-o"></i> Ekle</a></li>
                        <li><a href="index.php?page=admin&action=list"><i class="fa fa-pencil-square-o"></i>Listele</a></li>
                    </ul>
                </li>
                <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i></i>Çıkış</a></li>

            </ul>
        </nav>
    </div>
