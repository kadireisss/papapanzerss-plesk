<?php 
session_start();
include '../db/connect.php';
$msg = "";
if(isset($_POST["loginpost"]))
{
    $username = $_POST["username"];
    $password = sha1($_POST["password"]);
    $login = $baglanti->prepare("SELECT * FROM bella_ptt3_admin WHERE admin=? AND password=?");
    $login->execute([$username, $password]);

    $log = $login->rowCount();

    if($log >= 1)
    {
        $_SESSION["udeqseo0*2"] = $username."29014123re23".$password;
        header("location:index.php");
    }
    else{
        $msg = '<div class="alert alert-danger" role="alert">Kullanıcı adı veya şifreniz yanlış.</div>';
    }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karanlık Mod Girişi</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Kendi CSS stil dosyanızı burada ekleyebilirsiniz -->
    <style>
        body {
            background-color: #333; /* Arka plan rengi karanlık mod için */
            color: #fff; /* Metin rengi karanlık mod için */
        }

        .container {
            margin-top: 100px;
        }

        .dark-mode-button {
            position: absolute;
            top: 20px;
            right: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="text-center">Login with @vahsetli</h1>
    <?php echo $msg; ?>
    <form method="POST">
        <div class="mb-3">
            <label for="username" class="form-label">Kullanıcı Adı</label>
            <input type="text" name="username" class="form-control" placeholder="Kullanıcı Adını Girin">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Şifre</label>
            <input type="password" name="password" class="form-control" placeholder="Şifrenizi girin">
        </div>
        <button type="submit" name="loginpost" class="btn btn-primary">Giriş Yap</button>
    </form>
</div>


<!-- Bootstrap ve jQuery kütüphaneleri -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>
</html>
