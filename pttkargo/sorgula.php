<?php
declare(strict_types=1);

require __DIR__ . '/database/baglan.php';
session_start();

$takipno = trim((string)($_GET['takipno'] ?? ''));
if ($takipno === '' || !preg_match('/^[A-Za-z0-9\-]{4,32}$/', $takipno)) {
    http_response_code(404);
    echo 'Boyle bir kargo bulunamadi, lutfen musteri hizmetleri ile irtibata gecin.';
    exit;
}

$stmt = $conn->prepare('SELECT * FROM bella_pttkargo WHERE takipno = :t LIMIT 1');
$stmt->execute([':t' => $takipno]);
$kargo = $stmt->fetch();

if (!$kargo) {
    http_response_code(404);
    echo 'Boyle bir kargo bulunamadi, lutfen musteri hizmetleri ile irtibata gecin.';
    exit;
}

$h = static fn(?string $v): string => htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8');
$durum = (int)($kargo['durumu'] ?? 1);
if ($durum < 1 || $durum > 5) { $durum = 1; }
?><!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Arama Sonuçları - PTT Gönderi Takip</title>
    <link rel="stylesheet" href="Content/pttstyle.css">
    <link rel="stylesheet" href="Content/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="otherlayout">
<header>
    <nav class="pttlogo">
        <div class="logo text-center">
            <img src="Content/images/pttlogo2.png" alt="PTT">
        </div>
    </nav>
</header>
<main role="main" class="container">
    <div class="container">
        <div class="row margintop">
            <div class="col-2"></div>
            <div class="col-8" style="font-size:1.7em;text-align:center;color:#00a6cf">
                <b><h2 style="margin:0;"><span><?php echo $h($kargo['sonuc'] ?? ''); ?></span></h2></b>
                <br>
            </div>
            <div class="col-2" style="text-align:right">
                <a href="index.php"><i class="fa fa-home" style="font-size:32px;color:#00a6cf;" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-sm-12 col-md-10 col-lg-8">
                <img src="durum/<?php echo $durum; ?>.png" class="img-fluid" alt="">
            </div>
        </div>
        <div class="row justify-content-md-center margintop">
            <div class="col-sm-12 col-md-8" style="font-size:1.3em;text-align:center;color:#00a6cf">
                <br>
                <b><h4 style="margin:0;">TAKİP NO : <span><?php echo $h($kargo['takipno']); ?></span></h4></b>
                <br><br>
            </div>
        </div>
        <div class="row justify-content-md-center margintop">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card" style="border:solid 3px #00a6cf;border-radius:10px;font-size:0.9em;">
                    <div class="card-header" style="background-color:#00a6cf">
                        <div class="row">
                            <div class="col-sm-6 col-md-4"><b>ÇIKIŞ İL / İLÇE</b></div>
                            <div class="col-sm-8 col-md-8" style="text-align:right;"><span><?php echo $h($kargo['gonderil'] ?? ''); ?></span></div>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-inline-item"><b>GÖNDERİCİ : </b> <?php echo $h($kargo['gonderen'] ?? ''); ?></li>
                        <li class="list-inline-item"><b>GÖNDERİCİ ADRES : </b> <?php echo $h($kargo['cikisadres'] ?? ''); ?></li>
                        <li class="list-inline-item"><b>KABUL TARİHİ : </b> <?php echo $h($kargo['cikistarih'] ?? ''); ?></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card" style="border:solid 3px #ffc525;border-radius:10px;font-size:0.9em;">
                    <div class="card-header" style="background-color:#ffc525">
                        <div class="row">
                            <div class="col-sm-6 col-md-4"><b>VARIŞ İL / İLÇE</b></div>
                            <div class="col-sm-8 col-md-8" style="text-align:right;"><span><?php echo $h($kargo['alanil'] ?? ''); ?></span></div>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-inline-item"><b>ALICI : </b> <?php echo $h($kargo['teslimalan'] ?? ''); ?></li>
                        <li class="list-inline-item"><b>ALICI ADRES : </b> <?php echo $h($kargo['teslimadres'] ?? ''); ?></li>
                        <li class="list-inline-item"><b>TESLİM TARİHİ : </b> <?php echo $h($kargo['teslimtarih'] ?? ''); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>
<footer class="footer footerrenkmavi">
    <div class="container">
        <a href="https://twitter.com/PTTKurumsal" target="_blank" rel="noopener" style="padding:5px;color:white;text-decoration:none"><i class="fa fa-twitter">/</i><span>PTTKurumsal</span></a>
        <a href="https://www.facebook.com/Ptt.Kurumsal" target="_blank" rel="noopener" style="padding:5px;color:white;text-decoration:none"><i class="fa fa-facebook">/</i><span>Ptt.Kurumsal</span></a>
        <a href="https://www.instagram.com/pttkurumsal" target="_blank" rel="noopener" style="padding:5px;color:white;text-decoration:none"><i class="fa fa-instagram">/</i><span>pttkurumsal</span></a>
    </div>
</footer>
</body>
</html>
