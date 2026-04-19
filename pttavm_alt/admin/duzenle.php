<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../db/connect.php';
include '../db/koru.php';


$id = $_GET["id"];

$urungetir = $baglanti->prepare("SELECT * FROM bella_ptt3_urunler WHERE id=?");
$urungetir->execute([$id]);
$urun = $urungetir->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['gonder'])) {

    $uploadsDirectory = '../uploads/'; // Resimlerin yükleneceği klasör
    $uploadedImages = []; // Yüklenen resimlerin dosya adlarını tutmak için dizi

    for ($i = 1; $i <= 4; $i++) {
        $imageFieldName = 'image' . $i; // Resim alanlarının isimleri

        if ($_FILES[$imageFieldName]['error'] == UPLOAD_ERR_OK) {
            $tempName = $_FILES[$imageFieldName]['tmp_name'];
            $originalName = $_FILES[$imageFieldName]['name'];
            $uploadedName = $uploadsDirectory . $originalName;

            if (move_uploaded_file($tempName, $uploadedName)) {
                ${'resim' . $i} = $uploadedName; // Dinamik değişken adı ile resim ismini sakla
                $uploadedImages[] = $uploadedName; // Yüklenen resmin adını diziye ekle
            }
        }
    }

    $data = [];
    for ($i = 1; $i <= 50; $i++) {
        $titleFieldName = "baslik" . $i; // Başlık alanlarının isimleri
        $propertyFieldName = "ozellik" . $i; // Özellik alanlarının isimleri

        if (!empty($_POST[$titleFieldName]) && !empty($_POST[$propertyFieldName])) {
            $data[$_POST[$titleFieldName]] = $_POST[$propertyFieldName];
        }
    }

    $isim = $_POST['urunisim'];
    $link = seo($isim);
    $kategori = $_POST['kategori'];
    $fiyat = $_POST['urunfiyat'];
    $hakkinda = $_POST['hakkinda'];
    $banka = $_POST['banka'];

    $jsonData = json_encode($data, JSON_PRETTY_PRINT);
    $ekle = $baglanti->prepare("UPDATE bella_ptt3_urunler SET urunismi=?,urunlink=?,urunkat=?,resim1=?,resim2=?,resim3=?,resim4=?,fiyat=?,hakkinda=?,ozellik=?,iban=? WHERE id=?");
    $ekle->execute([$isim,$link,$kategori,$resim1,$resim2,$resim3,$resim4,$fiyat,$hakkinda,$jsonData,$banka,$id]);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogPanel with @scriptagi</title>
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
        <a class="navbar-brand" href="#">v/@scriptagi</a>
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
      <form method="POST" id="myForm" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="imageUpload" class="form-label">Ürün Resim</label>
          <input type="file" class="form-control" id="imageUpload" accept="image/*" name="image1" onchange="previewImage(event)">
          <img id="imagePreview" src="#" alt="Önizleme" style="max-width: 20%; display: none;" class="mt-2">
        </div>
        <div class="mb-3">
          <label for="imageUpload" class="form-label">Ürün Resim 2</label>
          <input type="file" class="form-control" id="imageUpload" accept="image/*" name="image2" onchange="previewImage(event)">
          <img id="imagePreview" src="#" alt="Önizleme" style="max-width: 20%; display: none;" class="mt-2">
        </div>
        <div class="mb-3">
          <label for="imageUpload" class="form-label">Ürün Resim 3</label>
          <input type="file" class="form-control" id="imageUpload" accept="image/*" name="image3" onchange="previewImage(event)">
          <img id="imagePreview" src="#" alt="Önizleme" style="max-width: 20%; display: none;" class="mt-2">
        </div>
        <div class="mb-3">
          <label for="imageUpload" class="form-label">Ürün Resim 4</label>
          <input type="file" class="form-control" id="imageUpload" accept="image/*" name="image4" onchange="previewImage(event)">
          <img id="imagePreview" src="#" alt="Önizleme" style="max-width: 20%; display: none;" class="mt-2">
        </div>
        <div class="mb-3">
          <label for="input1" class="form-label">Ürün İsim</label>
          <input type="text" class="form-control" id="input1" name="urunisim" value="<?php echo $urun["urunismi"];?>">
        </div>
        <div class="mb-3">
          <label for="input2" class="form-label">Ürün Kategori</label>
          <select name="kategori" class="form-control">
              <option selected>Kategori Seç</option>
              <?php 
              $bankalar = $baglanti->prepare("SELECT * FROM bella_ptt3_kategori ORDER BY id DESC"); 
              $bankalar->execute(); 
              while($banka = $bankalar->fetch(PDO::FETCH_ASSOC)){ ?>
              <option value="<?php echo $banka["link"];?>"><?php echo $banka["isim"];?></option>
              <?php } ?>
          </select>
        </div>
        <div class="mb-3">
          <label for="input2" class="form-label">Ürün Fiyat</label>
          <input type="text" class="form-control" id="input2" name="urunfiyat" value="<?php echo $urun["fiyat"];?>">
        </div>
        <hr>
        <div class="mb-3">
          <label for="input2" class="form-label">Hakkında</label>
          <textarea style="height: 50px;" type="text" class="form-control" id="input2" name="hakkinda"><?php echo $urun["hakkinda"];?></textarea>
        </div>
        <div class="mb-3">
          <select name="banka" class="form-control">
              <option selected>Banka Seç</option>
              <?php 
              $bankalar = $baglanti->prepare("SELECT * FROM bella_ptt3_banka ORDER BY id DESC"); 
              $bankalar->execute(); 
              while($banka = $bankalar->fetch(PDO::FETCH_ASSOC)){ ?>
              <option value="<?php echo $banka["iban"];?>"><?php echo $banka["bankaisim"]." / ". $banka["ibanisim"];?></option>
              <?php } ?>
          </select><br>
          <div id="inputsContainer">

          </div>
          <button type="button" class="btn btn-success" id="addFieldsBtn">Yeni Alan Ekle</button>

        </div>
        <button type="submit" name="gonder" class="btn btn-primary">Gönder</button>
      </form>
    </div>

    <!-- Bootstrap ve jQuery JS dosyaları -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    // Yeni alan ekleme butonuna tıklama olayı
    $('#addFieldsBtn').on('click', function() {
        var inputCount = $('#inputsContainer input').length / 2 + 1; // Mevcut input sayısını al
        var newInputs = `
            <div class="mb-3">
                <label for="baslik${inputCount}">Başlık ${inputCount}</label>
                <input type="text" class="form-control" id="baslik${inputCount}" name="baslik${inputCount}">
            </div>
            <div class="mb-3">
                <label for="ozellik${inputCount}">Özellik ${inputCount}</label>
                <input type="text" class="form-control" id="ozellik${inputCount}" name="ozellik${inputCount}">
            </div>
        `;
        $('#inputsContainer').append(newInputs); // Yeni inputları forma ekle
    });
});
</script>
    <script>
      function previewImage(event) {
        var image = document.getElementById('imagePreview');
        image.style.display = 'block';
        image.src = URL.createObjectURL(event.target.files[0]);
      }
    </script>

</body>
</html>
