<?php 
include '../db/connect.php';
include '../db/koru.php';

$bankagetir = $baglanti->prepare("SELECT * FROM bella_ptt3_banka WHERE id=?");
$bankagetir->execute([1]);
$bankas = $bankagetir->fetch(PDO::FETCH_ASSOC);


if(isset($_POST['gonder'])){
$banka = $_POST['banka'];
$iban = $_POST['iban'];
$isim = $_POST['isim'];
$aciklama = $_POST['aciklama'];

$ekle = $baglanti->prepare("UPDATE bella_ptt3_banka SET bankaisim=?,iban=?,ibanisim=?,aciklama=? WHERE id=?");
$ekle->execute([$banka,$iban,$isim,$aciklama,1]);

header("location:banka.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogPanel with @vahsetli</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #333; /* Arka plan rengi karanlık mod için */
            color: #fff; /* Metin rengi karanlık mod için */
        }

        .navbar {
            background-color: #222; /* Navbar rengi karanlık mod için */
        }
        hr{
            background-color: white;
        }

        /* İsteğe bağlı olarak diğer öğelerin stillerini ayarlayabilirsiniz */
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">v/@vahsetli</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Anasayfa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="urunler.php">Ürünler</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="urunekle.php">Ürün Ekle</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="banka.php">Bankalar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="bankaekle.php">Banka Ekle</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- İçerik -->
    <div class="container mt-4">
      <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="input2" class="form-label">Banka İsim</label>
          <select class="form-control" name="banka">
              <?php
              $name2 = $bankas["bankaisim"];
                if($name2 == "ziraat")
                {
                    $name = "Ziraat";
                }
                if($name2 == "yapikredi")
                {
                    $name = "Yapı Kredi";
                }
                if($name2 == "vakifkatilim")
                {
                    $name = "Vakıf Katılım";
                }
                if($name2 == "vakifbank")
                {
                    $name = "Vakıf Bank";
                }
                if($name2 == "teb")
                {
                    $name = "TEB";
                }
                if($name2 == "sekerbank")
                {
                    $name = "Şeker Bank";
                }
                if($name2 == "QNB")
                {
                    $name = "QNB";
                }
                if($name2 == "halkbank")
                {
                    $name = "Halk Bankası";
                }
                if($name2 == "garanti")
                {
                    $name = "Garanti";
                }
                
                if($name2 == "enpara")
                {
                    $name = "Enpara";
                }
                
                if($name2 == "denizbank")
                {
                    $name = "Deniz Bankası";
                }
              ?>
              
              
              <option value="<?php echo $bankas["bankaisim"];?>" selected><?php echo $name;?></option>
              <option value="ziraat">Ziraat</option>
              <option value="yapikredi">Yapı Kredi</option>
              <option value="vakifkatilim">Vakıf Katılım</option>
              <option value="vakifbank">Vakıf Bank</option>
              <option value="teb">TEB</option>
              <option value="sekerbank">Şeker Bank</option>
              <option value="QNB">QNB</option>
              <option value="halkbank">Halk Bankası</option>
              <option value="garanti">Garanti</option>
              <option value="enpara">Enpara</option>
              <option value="denizbank">Deniz Bankası</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="input2" class="form-label">IBAN</label>
          <input type="text" class="form-control" id="input2" value="<?php echo $bankas["iban"];?>" name="iban">
        </div>
        <div class="mb-3">
          <label for="input2" class="form-label">IBAN İsim</label>
          <input type="text" class="form-control" id="input2" value="<?php echo $bankas["ibanisim"];?>" name="isim">
        </div>
        <div class="mb-3">
          <label for="input2" class="form-label">Açıklama</label>
          <input type="text" class="form-control" id="aciklama" value="<?php echo $bankas["aciklama"];?>" name="aciklama">
        </div>
        <button type="submit" name="gonder" class="btn btn-primary">Gönder</button>
      </form>
    </div>

    <!-- Bootstrap ve jQuery JS dosyaları -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
      function previewImage(event) {
        var image = document.getElementById('imagePreview');
        image.style.display = 'block';
        image.src = URL.createObjectURL(event.target.files[0]);
      }
    </script>

</body>
</html>
