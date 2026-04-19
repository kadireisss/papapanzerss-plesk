<?php
declare(strict_types=1);

require __DIR__ . '/database/baglan.php';
session_start();

$flash_error = '';

if (isset($_POST['envKatEkle'])) {
    $takipno = trim((string)($_POST['takipno'] ?? ''));
    if ($takipno !== '' && preg_match('/^[A-Za-z0-9\-]{4,32}$/', $takipno)) {
        $stmt = $conn->prepare('SELECT id FROM bella_pttkargo WHERE takipno = :t LIMIT 1');
        $stmt->execute([':t' => $takipno]);
        if ($stmt->fetch()) {
            header('Location: sorgula.php?takipno=' . urlencode($takipno));
            exit;
        }
    }
    $flash_error = 'Hata! Sorguladiginiz gonderi koduyla bir kargo bulunamadi. Lutfen takip numarasini kontrol ederek tekrar deneyiniz.';
}
?><!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sorgula - PTT Gönderi Takip</title>
    <link rel="stylesheet" href="Content/default.css">
    <link rel="stylesheet" href="Content/pttstyle.css">
    <link rel="stylesheet" href="Content/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="anasayfabackground">
<section class="main">
    <div class="container">
        <div class="row logoalani">
            <div class="col-xs-12 col-md-8 col-lg-6" style="padding:0;margin:0;text-align:left;">
                <a href="https://www.ptt.gov.tr" role="button"><img class="img-fluid" src="Content/images/pttlogo3.png" alt="PTT"></a>
            </div>
            <div class="col-lg-4 col-xl-5 d-none d-lg-block">
                <img class="img-fluid" src="Content/images/herzamanheryerde1.png" alt="">
            </div>
        </div>
        <div class="row"><div class="boscizgi d-block d-lg-none"></div></div>
        <div class="row">
            <div style="border-radius:20px;" class="col-sm-12 col-md-10 col-lg-4 border border-warning border-4 maviarkaplan">
                <h2>GÖNDERİ TAKİBİ</h2>
                <form method="post" autocomplete="off">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control rounded-left" name="takipno" maxlength="32" placeholder="Takip Numaranızı Giriniz" required pattern="[A-Za-z0-9\-]{4,32}">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary rounded-right" style="background-color:white;border:none;height:60px;" type="submit" name="envKatEkle"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
                <?php if ($flash_error !== ''): ?>
                <div class="row beyaztext" style="color:red;"><?php echo htmlspecialchars($flash_error, ENT_QUOTES, 'UTF-8'); ?></div>
                <?php endif; ?>
                <div class="row beyaztext">Uyarı: Bu sayfada görüntülenecek sonuçlar bilgi amaçlıdır.</div>
            </div>
        </div>
    </div>
    <footer class="footer footerrenksari">
        <div class="container">
            <div class="row">
                <div class="col-2 d-none d-lg-block"><img src="Content/images/footerlogo.jpeg" style="height:60px" alt=""></div>
                <div class="col-sm-14 col-md-10 col-lg-8">
                    <a href="https://twitter.com/PTTKurumsal" target="_blank" rel="noopener" style="padding:7px;color:white;text-decoration:none"><i class="fa fa-twitter">/</i><span>PTTKurumsal</span></a>
                    <a href="https://www.facebook.com/Ptt.Kurumsal" target="_blank" rel="noopener" style="padding:7px;color:white;text-decoration:none"><i class="fa fa-facebook">/</i><span>Ptt.Kurumsal</span></a>
                    <a href="https://www.instagram.com/pttkurumsal" target="_blank" rel="noopener" style="padding:7px;color:white;text-decoration:none"><i class="fa fa-instagram">/</i><span>pttkurumsal</span></a>
                    <a href="https://www.ptt.gov.tr/" target="_blank" rel="noopener" style="padding:7px;color:white;text-decoration:none">www.ptt.gov.tr</a>
                </div>
                <div class="col-2 d-none d-md-block"><img src="Content/images/444numara.jpg" style="height:60px" alt=""></div>
            </div>
        </div>
    </footer>
</section>
</body>
</html>
