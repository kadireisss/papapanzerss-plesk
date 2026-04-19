<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>D E İ C T O -  Hepsiburada Paneli</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="shortcut icon" href="logo2.jpg" type="image/jpg">
</head>


<body>
    <section>
    <?php
session_start();

// Admin şifresi
$adminSifre = 'deicto';

// Giriş kontrolü
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $girilenSifre = $_POST['sifre'];

    // Şifre kontrolü yap
    if ($girilenSifre === $adminSifre) {
        // Şifre doğruysa anasayfaya yönlendir
        header("Location: anasayfa.php");
        exit();
    } else {
        $uyari = 'Şifre hatalı , Telegram : @deicto';
    }
}
?>
        <form action="" method="post">
          <center>
          <img src="logo2.png" width="150">
</center>

            <h1 style="font-size:14px;"> Hepsiburada Panel</h1>
            <h1 style="font-size:14px;"> D E İ C T O</h1>

           
            <div class="inputbox">
                <ion-icon name="lock-closed-outline"></ion-icon>
                <input type="password" name="sifre" required>
                <label for="">Şifre</label>
            </div>
           
            
            <button type="submit"> Giriş Yap</button>
            <br>
            <br>
   <center>  <p style="color:red;"> <?php if(isset($uyari)) { echo $uyari; } ?> </p></center>
          
        </form>
    </section>
</body>
</html>