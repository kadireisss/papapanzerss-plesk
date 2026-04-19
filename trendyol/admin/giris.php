

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>V i k t o r p i a | Panel Hizmetleri</title>
    <script type="text/javascript" src="sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="icon" href="resim/logo.png" type="image/png">

</head>

<style>

@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

::selection{
 color: #ffffff;
 background-color: #31285C;
 font-family: 'Poppins', sans-serif;
}

*{
 padding:0;
 margin: 0;
 font-family: 'Poppins', sans-serif;
 box-sizing: border-box;
 text-decoration: none;
}

a{
 color: #31285C;
}



body{
  font-family: 'Poppins', sans-serif;
  -webkit-user-select: none;  /* Chrome all / Safari all */
  -moz-user-select: none;     /* Firefox all */
  -ms-user-select: none;      /* IE 10+ */
  -o-user-select: none;
  user-select: none;     
 width: 100%;
 min-height: 100vh;
 display: flex;
 justify-content: center;
 align-items: center;
 flex-direction: column;
 background-color: #31285C;
 padding-top: 20px;
}

.wrapper{
 width: 300px;
 min-height:100px;
 background-color: #FFFFFF;
 border-radius: 5px;
 box-shadow: 5px 5px 15px rgba(0,0,0,0.05);
 padding: 30px;
}

.input-field{
 width: 100%;
 height: 45px;
 border: none;
 padding: 10px;
 background-color: #eeeeee;
 color: gray;
 outline: none;
 font-size: 15px;
 margin-bottom: 20px;
 transition: .5s;
 border-radius: 5px;
}

input:hover{
}





.heading{
 color: #3B3663;
 margin-bottom: 20px;
 text-align:center;
}

.heading p{ 
 color: #AAA8BB;
}

.heading i{
 font-size: 30px;
 color: #4D61FC;
} 

label{
 color: #AAA8BB;
 font-weight: 400;
}

input{
 width: 100%;
 height: 45px;
 border: none;
 color: #FFFFFF;
 background-color: #31285C;
 border-radius: 5px;
 font-size: 17px;
 font-weight: 500;
 transition: 0.3s;
}

input:hover{
 background-color: #31283B;
}

.row{
 min-width: 5px;
 min-height: 10px;
 display: flex;
 align-items: center;
 justify-content: space-between;
 margin-bottom: 10px;
 font-size: 15px;
}


footer{
 text-align: center;
 color:white;
}


    </style>

<body>



<?php

session_start();
require "baglan.php";

$message="";
if(empty($_POST["login"])){
  if(empty($_POST["username"]) && empty($_POST["password"])){
    $message = '<p>Tüm Alanlar Zorunludur</p>';
  } 
  else{
    $sorgu = "SELECT * FROM ty_login WHERE username =:username AND password =:password ";
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
        echo '<script>Swal.fire("Başarılı", "Giriş Yapılıyor...", "success"); </script>';
        header("location:index.php");
      }
      else{
        echo '<script>Swal.fire("Başarısız", "Girdiğiniz Bilgilere Ait Kullanıcı Bulunamadı", "error"); </script>';
      }
    }}
?>
   <div class="wrapper" >

<div class="heading" >
  <img src="resim/logo.png" style="color:white;" width="150">
<h2 >V İ K T O R P İ A</h2>
<p >Telegram : @viktorpia</p>
</div>

<form action="" method="POST" >



<div class="input-group">
 <input type="text" id="viktorpiapass" name="username" class="input-field" placeholder="Kullanıcı Adı" >
</div>

<div class="input-group">
 <input type="password" id="viktorpiapass" name="password" class="input-field" placeholder="Şifre">
</div>

<br>

<div class="input-group">

<input type="submit"  value="Giriş Yap">
</div>


    <br>
    <center>

    <img src="resim/logo.gif" style="color:white;" width="250">

</center>
</div>


<br>
                    </form>
<footer>
     Trendyol Panel <br>
Panel Sistemleri ❤️ BY <a href="https://t.me/viktorpia/" target="_black" style="color:white;">V İ K T O R P İ A</a>
</footer>


</body>
</html>
