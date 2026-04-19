<?php 
include '../db/connect.php';
include '../db/koru.php';

if(isset($_POST["ekle"])){
    $kategori = $_POST['kategori'];
    $link = seo($kategori);
    $ekle = $baglanti->prepare("INSERT INTO bella_ptt3_kategori (isim,link) VALUES (?,?)");
    $ekle->execute([$kategori,$link]);
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
    <!-- Kendi CSS stil dosyanızı burada ekleyebilirsiniz -->
    <style>
        body {
            background-color: #333; /* Arka plan rengi karanlık mod için */
            color: #fff; /* Metin rengi karanlık mod için */
        }

        .navbar {
            background-color: #222; /* Navbar rengi karanlık mod için */
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

        <form method="POST">
        <input type="text" name="kategori" placeholder="Kategori İsmi" class="form-control"><br>
        <button type="submit" name="ekle" class="btn btn-success" style="width:100%;">Ekle</button><br><br>
        </form>
        <table id="veriTablosu" class="table table-dark">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kategori</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
            <tr>
              <?php 
              $bankalar = $baglanti->prepare("SELECT * FROM bella_ptt3_kategori ORDER BY id DESC"); 
              $bankalar->execute(); 
              while($banka = $bankalar->fetch(PDO::FETCH_ASSOC)){ ?>
                <td><?php echo $banka["id"];?></td>
                <td><?php echo $banka["isim"];?></td>
                <td>
                <a href="islem.php?islem=sil&tur=cat&id=<?php echo $banka["id"];?>"><button class="btn btn-danger">Sil</button>
                </td>
            </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap ve jQuery JS dosyaları -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
