<?php
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


?>
<html lang="tr-TR">
  <link type="text/css" rel="stylesheet" id="dark-mode-custom-link">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link type="text/css" rel="stylesheet" id="dark-mode-general-link">
  <style lang="en" type="text/css" id="dark-mode-custom-style"></style>
  <style lang="en" type="text/css" id="dark-mode-native-style"></style>
  <style lang="en" type="text/css" id="dark-mode-native-sheet"></style>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ürün</title>
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
    <meta name="description" property="og:description" content="Yüksek B6 Vitamini içerir. B6 vitamini bağışıklık sisteminin normal fonksiyonuna katkıda bulunur.Yüksek potasyum içerir. Potasyum normal kas fonksiyonlarına katkıda bulunur.Seleny.">
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
    <script type="text/javascript" src="https://track.adform.net/Serving/TrackPoint/?pm=2443498&amp;ADFPageName=Product%20page&amp;ADFdivider=%7C&amp;ord=472794611264&amp;ADFtpmode=2&amp;ecpr=W3sicGlkIjoiMDgwODk2ODIiLCJzdGVwIjoyLCJwbm0iOiJCeSDEsHp6ZXQgQW50ZXAgRsSxc3TEscSfxLEgMjAwIEciLCJwZ3IiOiJLdXJ1eWVtacWfL0F0xLHFn3TEsXJtYWzEsWsiLCJwc2wiOiIxMjkuOTAifV0&amp;loc=https%3A%2F%2Fwww.migros.com.tr%2Fby-izzet-antep-fistigi-200-g-p-7b7052&amp;Set1=tr-TR%7Ctr-TR%7C1366x768%7C24"></script>
    <script type="text/javascript" src="https://track.adform.net/Serving/TrackPoint/?pm=2443498&amp;ADFPageName=ProductDetail_Kuruyemi%C5%9F%2FAt%C4%B1%C5%9Ft%C4%B1rmal%C4%B1k&amp;ADFdivider=_&amp;ord=959428099989&amp;ADFtpmode=2&amp;loc=https%3A%2F%2Fwww.migros.com.tr%2Fby-izzet-antep-fistigi-200-g-p-7b7052&amp;Set1=tr-TR%7Ctr-TR%7C1366x768%7C24"></script>
    <script type="text/javascript" src="https://track.adform.net/Serving/TrackPoint/?pm=2443498&amp;ADFPageName=Tum_sayfalar&amp;ADFdivider=%7C&amp;ord=141018329873&amp;ADFtpmode=2&amp;loc=https%3A%2F%2Fwww.migros.com.tr%2Fby-izzet-antep-fistigi-200-g-p-7b7052&amp;Set1=tr-TR%7Ctr-TR%7C1366x768%7C24"></script>
    <script type="text/javascript" async="" src="https://s2.adform.net/banners/scripts/st/trackpoint-async.js"></script>
    <script type="text/javascript" async="" src="https://s2.adform.net/banners/scripts/st/trackpoint-async.js"></script>
    <script type="text/javascript" async="" src="https://www.googletagmanager.com/gtag/destination?id=DC-5340910&amp;l=dataLayer&amp;cx=c"></script>
    <script type="text/javascript" async="" src="https://s2.adform.net/banners/scripts/st/trackpoint-async.js"></script>
    <script type="text/javascript" async="" src="https://www.google-analytics.com/plugins/ua/ec.js"></script>
    <script type="text/javascript" src="https://track.adform.net/Serving/TrackPoint/?pm=2443498&amp;ADFPageName=Tum_sayfalar&amp;ADFdivider=%7C&amp;ord=740870083962&amp;ADFtpmode=2&amp;loc=https%3A%2F%2Fwww.migros.com.tr%2F&amp;Set1=tr-TR%7Ctr-TR%7C1366x768%7C24"></script>
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
            return typeof use_existing_jquery !== '' ? use_existing_jquery : 
          },
          library_tolerance: function() {
            return typeof library_tolerance !== '' ? library_tolerance : 
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
    <script src="https://dev.visualwebsiteoptimizer.com/edrv/va_gq-7a983a5108a69138575feea9fb9992a5.js" crossorigin="anonymous" type="text/javascript" fetchpriority="high"></script>
    <script src="https://dev.visualwebsiteoptimizer.com/edrv/nc-5ac7ab4aa88c4c60484ce13407d745a2.js" crossorigin="anonymous" type="text/javascript" fetchpriority="high" defer=""></script>
    <style>
      .grid[_ngcontent-kan-c377] {
        box-sizing: border-box;
        margin: 0 auto;
        padding: var(--mdc-layout-grid-margin-desktop, 0);
        padding: 0;
        display: grid;
        grid-template-rows: auto auto 1fr auto auto;
        min-height: 100vh
      }

      .divider[_ngcontent-kan-c377] {
        height: .063rem;
        opacity: .12;
        background-color: var(--basicColorBlack);
        padding: 0
      }

      main[_ngcontent-kan-c377] {
        min-height: calc(100vh - 4.875rem);
        padding-bottom: var(--mobile-bottom-nav-height)
      }

      @media (min-width: 992px) {
        main[_ngcontent-kan-c377] {
          padding-bottom: unset
        }
      }

      .remove-padding-bottom[_ngcontent-kan-c377] {
        padding-bottom: unset
      }

      main-reload[_ngcontent-kan-c377] {
        color: #2a2a30
      }
    </style>
    <style>
      img[_ngcontent-kan-c157] {
        max-width: 70px;
        scrollbar-width: none;
        -ms-overflow-style: none
      }

      img[_ngcontent-kan-c157]::-webkit-scrollbar {
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
        background-image: url(https://www.migros.com.tr//assets/logos/sanalmarket/sanalmarket-transparent-logo.svg)
      }

      @media (max-width: 576px) {
        sm-header .header-wrapper .header-tab.selected.sanalmarket {
          background-image: url(https://www.migros.com.tr//assets/logos/sanalmarket/sanalmarket-transparent-logo-mobile.svg)
        }
      }

      sm-header .header-wrapper .header-tab.selected.elektronik {
        background-color: var(--brandColorInfo600);
        background-image: url(https://www.migros.com.tr//assets/logos/elektronik/ekstra-transparent-logo.svg)
      }

      @media (max-width: 576px) {
        sm-header .header-wrapper .header-tab.selected.elektronik {
          background-image: url(https://www.migros.com.tr//assets/logos/elektronik/ekstra-transparent-logo.svg)
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

      [_nghost-kan-c355] {
        --mdc-typography-button-font-size: .75rem;
        --mdc-typography-button-font-weight: 600
      }

      .additional-row[_ngcontent-kan-c355] {
        padding: .625rem 1rem;
        display: flex;
        align-items: center;
        flex-direction: column;
        background-color: var(--brandColorInfo900);
        color: #fff
      }

      @media (min-width: 1200px) {
        .additional-row[_ngcontent-kan-c355] {
          padding: .625rem 7rem
        }
      }

      @media (min-width: 1440px) {
        .additional-row[_ngcontent-kan-c355] {
          padding: .625rem 11rem
        }
      }

      @media (min-width: 1600px) {
        .additional-row[_ngcontent-kan-c355] {
          padding: .625rem 11rem
        }
      }

      @media (min-width: 1800px) {
        .additional-row[_ngcontent-kan-c355] {
          padding: .625rem 18rem
        }
      }

      @media (min-width: 992px) {
        .additional-row[_ngcontent-kan-c355] {
          flex-direction: row
        }
      }

      @media (min-width: 992px) {
        .additional-row[_ngcontent-kan-c355] {
          height: 3.5rem
        }
      }

      .additional-row[_ngcontent-kan-c355] .info-row[_ngcontent-kan-c355] {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center
      }

      .additional-row[_ngcontent-kan-c355] .icon-cart[_ngcontent-kan-c355] {
        display: inline-block;
        background-image: url(assets/icons/cart-additional.svg);
        width: 1.5rem;
        height: 1.5rem;
        margin-right: .55rem
      }

      .additional-row[_ngcontent-kan-c355] .bold[_ngcontent-kan-c355] {
        font-weight: 700;
        display: inline-block;
        margin: 0 .2rem
      }

      .additional-row[_ngcontent-kan-c355] button[_ngcontent-kan-c355] {
        margin: .75rem 0 0;
        background-color: var(--brandColorInfo700);
        color: inherit
      }

      @media (min-width: 992px) {
        .additional-row[_ngcontent-kan-c355] button[_ngcontent-kan-c355] {
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

      fe-swiper-banner .swiper-button-disabled {
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
      [_nghost-kan-c277] {
        width: 100%
      }

      input[_ngcontent-kan-c277] {
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

      input[_ngcontent-kan-c277]::placeholder {
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

      .migros[_ngcontent-kan-c277] {
        position: relative;
        margin-left: 1.5rem;
        margin-right: 1.5rem
      }

      @media (max-width: 768px) {
        .migros[_ngcontent-kan-c277] {
          margin: 0
        }
      }

      .migros[_ngcontent-kan-c277] input[_ngcontent-kan-c277] {
        min-width: 17rem !important;
        text-overflow: ellipsis;
        border: solid 1px var(--basicColor400);
        border-radius: 10px;
        outline: none;
        cursor: pointer;
        font-size: .875rem;
        font-weight: 600
      }

      .migros[_ngcontent-kan-c277] .migros-search-right-button[_ngcontent-kan-c277] {
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
        .migros[_ngcontent-kan-c277] .migros-search-right-button[_ngcontent-kan-c277] {
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

      .sanalmarket[_nghost-kan-c277] input[_ngcontent-kan-c277],
      .sanalmarket [_nghost-kan-c277] input[_ngcontent-kan-c277] {
        padding-left: 0;
        text-indent: .75rem;
        background-image: none
      }

      .mion[_nghost-kan-c277] .migros-search-right-button[_ngcontent-kan-c277],
      .mion [_nghost-kan-c277] .migros-search-right-button[_ngcontent-kan-c277] {
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

      [_nghost-kan-c354] {
        display: block
      }

      @media (max-width: 992px) {
        [_nghost-kan-c354] {
          width: 100%
        }
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-kan-c354] {
        color: var(--basicColor900);
        background-color: transparent;
        outline: none;
        border: none;
        padding: 0
      }

      @media (max-width: 992px) {
        .delivery-options-search-bucket-wrapper[_ngcontent-kan-c354] {
          margin: 0;
          width: 100%
        }
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-kan-c354] .delivery-options-wrapper[_ngcontent-kan-c354] {
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
        .delivery-options-search-bucket-wrapper[_ngcontent-kan-c354] .delivery-options-wrapper[_ngcontent-kan-c354] {
          padding: .25rem 1rem
        }
      }

      @media (max-width: 992px) {
        .delivery-options-search-bucket-wrapper[_ngcontent-kan-c354] .delivery-options-wrapper[_ngcontent-kan-c354] {
          width: auto;
          border-bottom: 1px solid rgba(0, 0, 0, .12);
          border-top: none;
          border-radius: 0
        }
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-kan-c354] .delivery-options-wrapper[_ngcontent-kan-c354] .choose-address-container[_ngcontent-kan-c354] {
        display: flex;
        justify-content: space-between;
        flex-direction: row;
        width: 100%
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-kan-c354] .delivery-options-wrapper[_ngcontent-kan-c354] .choose-address-container[_ngcontent-kan-c354] .choose-address[_ngcontent-kan-c354] {
        display: flex;
        align-items: center
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-kan-c354] .delivery-options-wrapper[_ngcontent-kan-c354] .choose-address-container[_ngcontent-kan-c354] .choose-address[_ngcontent-kan-c354] .icon-wrapper[_ngcontent-kan-c354] {
        margin-right: .5rem;
        font-size: .875rem
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-kan-c354] .delivery-options-wrapper[_ngcontent-kan-c354] .choose-address-container[_ngcontent-kan-c354] .icon-wrapper[_ngcontent-kan-c354] {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: var(--basicColor200);
        width: 1.5rem;
        height: 1.5rem;
        border-radius: 4px
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-kan-c354] .delivery-options-wrapper[_ngcontent-kan-c354] .delivery-options-inner[_ngcontent-kan-c354] {
        display: flex;
        align-items: center;
        width: 100%;
        position: relative
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-kan-c354] .delivery-options-wrapper[_ngcontent-kan-c354] .delivery-options-inner[_ngcontent-kan-c354] .fa-heart[_ngcontent-kan-c354] {
        color: var(--brandColorError600)
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-kan-c354] .delivery-options-wrapper[_ngcontent-kan-c354] .delivery-options-inner[_ngcontent-kan-c354] .foundation-text-wrapper[_ngcontent-kan-c354] {
        text-align: left;
        margin-right: auto;
        margin-left: 1rem
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-kan-c354] .delivery-options-wrapper[_ngcontent-kan-c354] .delivery-options-inner[_ngcontent-kan-c354] .two-column-wrapper[_ngcontent-kan-c354] {
        display: flex;
        width: 100%
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-kan-c354] .delivery-options-wrapper[_ngcontent-kan-c354] .delivery-options-inner[_ngcontent-kan-c354] .two-column-wrapper[_ngcontent-kan-c354] .location-row[_ngcontent-kan-c354] {
        display: flex;
        align-items: center;
        min-width: 200px
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-kan-c354] .delivery-options-wrapper[_ngcontent-kan-c354] .delivery-options-inner[_ngcontent-kan-c354] .two-column-wrapper[_ngcontent-kan-c354] .location-row[_ngcontent-kan-c354]:after {
        content: url(assets/icons/header-delivery-schedule-separator.svg);
        margin-left: .625rem
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-kan-c354] .delivery-options-wrapper[_ngcontent-kan-c354] .delivery-options-inner[_ngcontent-kan-c354] .two-column-wrapper[_ngcontent-kan-c354] .location-row[_ngcontent-kan-c354] img[_ngcontent-kan-c354] {
        width: 20px;
        height: 26px
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-kan-c354] .delivery-options-wrapper[_ngcontent-kan-c354] .delivery-options-inner[_ngcontent-kan-c354] .two-column-wrapper[_ngcontent-kan-c354] .location-row[_ngcontent-kan-c354] fa-icon[_ngcontent-kan-c354] {
        margin-left: auto
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-kan-c354] .delivery-options-wrapper[_ngcontent-kan-c354] .delivery-options-inner[_ngcontent-kan-c354] .two-column-wrapper[_ngcontent-kan-c354] .location-row[_ngcontent-kan-c354] .delivery-options-inner-text[_ngcontent-kan-c354] {
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
        .delivery-options-search-bucket-wrapper[_ngcontent-kan-c354] .delivery-options-wrapper[_ngcontent-kan-c354] .delivery-options-inner[_ngcontent-kan-c354] .two-column-wrapper[_ngcontent-kan-c354] .location-row[_ngcontent-kan-c354] .delivery-options-inner-text[_ngcontent-kan-c354] {
          margin: .6rem
        }
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-kan-c354] .delivery-options-wrapper[_ngcontent-kan-c354] .delivery-options-inner[_ngcontent-kan-c354] .two-column-wrapper[_ngcontent-kan-c354] .location-row[_ngcontent-kan-c354] .delivery-options-inner-text__hemen[_ngcontent-kan-c354] {
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
        .delivery-options-search-bucket-wrapper[_ngcontent-kan-c354] .delivery-options-wrapper[_ngcontent-kan-c354] .delivery-options-inner[_ngcontent-kan-c354] .two-column-wrapper[_ngcontent-kan-c354] .location-row[_ngcontent-kan-c354] .delivery-options-inner-text__hemen[_ngcontent-kan-c354] {
          width: 7.5rem;
          display: inline-block;
          max-width: 7.5rem;
          overflow: hidden;
          text-overflow: ellipsis;
          white-space: nowrap
        }
      }

      @media (max-width: 992px) {
        .delivery-options-search-bucket-wrapper[_ngcontent-kan-c354] .delivery-options-wrapper[_ngcontent-kan-c354] .delivery-options-inner[_ngcontent-kan-c354] .two-column-wrapper[_ngcontent-kan-c354] .location-row[_ngcontent-kan-c354] {
          min-width: unset
        }
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-kan-c354] .delivery-options-wrapper[_ngcontent-kan-c354] .delivery-options-inner[_ngcontent-kan-c354] .two-column-wrapper[_ngcontent-kan-c354] .location-row.yemek[_ngcontent-kan-c354] {
        flex-grow: 1
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-kan-c354] .delivery-options-wrapper[_ngcontent-kan-c354] .delivery-options-inner[_ngcontent-kan-c354] .two-column-wrapper[_ngcontent-kan-c354] .location-row.yemek[_ngcontent-kan-c354]:after {
        content: none
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-kan-c354] .delivery-options-wrapper[_ngcontent-kan-c354] .delivery-options-inner[_ngcontent-kan-c354] .two-column-wrapper[_ngcontent-kan-c354] .delivery-row[_ngcontent-kan-c354] {
        display: flex;
        justify-content: space-between;
        width: 100%;
        align-items: center
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-kan-c354] .delivery-options-wrapper[_ngcontent-kan-c354] .delivery-options-inner[_ngcontent-kan-c354] .two-column-wrapper[_ngcontent-kan-c354] .delivery-row[_ngcontent-kan-c354] .closest-time[_ngcontent-kan-c354] {
        display: flex;
        text-align: left;
        flex-direction: column
      }

      @media (max-width: 992px) {
        .delivery-options-search-bucket-wrapper[_ngcontent-kan-c354] .delivery-options-wrapper[_ngcontent-kan-c354] .delivery-options-inner[_ngcontent-kan-c354] .two-column-wrapper[_ngcontent-kan-c354] .delivery-row[_ngcontent-kan-c354] .closest-time[_ngcontent-kan-c354] {
          margin: 0 .5rem
        }
      }

      @media (min-width: 768px) {
        .delivery-options-search-bucket-wrapper[_ngcontent-kan-c354] .delivery-options-wrapper[_ngcontent-kan-c354] .delivery-options-inner[_ngcontent-kan-c354] .two-column-wrapper[_ngcontent-kan-c354] .delivery-row[_ngcontent-kan-c354] .closest-time[_ngcontent-kan-c354] {
          margin-left: 1rem
        }
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-kan-c354] .delivery-options-wrapper[_ngcontent-kan-c354] .delivery-options-inner[_ngcontent-kan-c354] .two-column-wrapper[_ngcontent-kan-c354] .delivery-row[_ngcontent-kan-c354] .closest-time[_ngcontent-kan-c354] .delivery-options-inner-time[_ngcontent-kan-c354] {
        white-space: nowrap;
        color: var(--systemColorSuccess600)
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-kan-c354] .delivery-options-wrapper[_ngcontent-kan-c354] .delivery-options-inner[_ngcontent-kan-c354] .two-column-wrapper[_ngcontent-kan-c354] .delivery-row[_ngcontent-kan-c354] .closest-time[_ngcontent-kan-c354] .delivery-options-inner-text[_ngcontent-kan-c354] {
        margin: 0
      }

      @media (max-width: 992px) {
        .delivery-options-search-bucket-wrapper[_ngcontent-kan-c354] .delivery-options-wrapper[_ngcontent-kan-c354] .delivery-options-inner[_ngcontent-kan-c354] .two-column-wrapper[_ngcontent-kan-c354] .delivery-row[_ngcontent-kan-c354] {
          flex-basis: auto;
          width: auto
        }
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-kan-c354] .delivery-options-wrapper[_ngcontent-kan-c354] .delivery-options-inner[_ngcontent-kan-c354] .two-column-wrapper[_ngcontent-kan-c354] .shipment[_ngcontent-kan-c354] {
        display: flex;
        margin-left: .5rem;
        color: var(--brandColorInfo600)
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-kan-c354] .delivery-options-wrapper[_ngcontent-kan-c354] .delivery-options-inner[_ngcontent-kan-c354] .two-column-wrapper[_ngcontent-kan-c354] .shipment[_ngcontent-kan-c354] .sm-extra-inner-text[_ngcontent-kan-c354] {
        margin-left: 1rem
      }

      @media (max-width: 768px) {
        .delivery-options-search-bucket-wrapper[_ngcontent-kan-c354] .delivery-options-wrapper[_ngcontent-kan-c354] .delivery-options-inner[_ngcontent-kan-c354] .two-column-wrapper[_ngcontent-kan-c354] .shipment[_ngcontent-kan-c354] .sm-extra-inner-text[_ngcontent-kan-c354] {
          text-align: left
        }
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-kan-c354] .delivery-options-wrapper[_ngcontent-kan-c354] .delivery-options-inner[_ngcontent-kan-c354] .two-column-wrapper[_ngcontent-kan-c354] .shipment[_ngcontent-kan-c354] img[_ngcontent-kan-c354] {
        object-fit: contain;
        max-width: 1.5rem;
        max-height: 100%;
        width: auto;
        height: auto
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-kan-c354] .delivery-options-wrapper[_ngcontent-kan-c354] .delivery-options-inner[_ngcontent-kan-c354] .two-column-wrapper[_ngcontent-kan-c354] .location-name[_ngcontent-kan-c354] {
        display: inline-block;
        max-width: 100%;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        display: block
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-kan-c354] .delivery-options-wrapper[_ngcontent-kan-c354] .delivery-options-inner[_ngcontent-kan-c354] .two-column-wrapper[_ngcontent-kan-c354] .eta[_ngcontent-kan-c354] {
        display: grid;
        grid-template-columns: 1.4rem 1fr;
        grid-column-gap: 1rem;
        text-align: left;
        margin-left: .5rem
      }

      @media (min-width: 992px) {
        .delivery-options-search-bucket-wrapper[_ngcontent-kan-c354] .delivery-options-wrapper[_ngcontent-kan-c354] .delivery-options-inner[_ngcontent-kan-c354] .two-column-wrapper[_ngcontent-kan-c354] .eta[_ngcontent-kan-c354] {
          margin-left: 2rem
        }
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-kan-c354] .delivery-options-wrapper[_ngcontent-kan-c354] .delivery-options-inner[_ngcontent-kan-c354] .two-column-wrapper[_ngcontent-kan-c354] .eta[_ngcontent-kan-c354] img[_ngcontent-kan-c354] {
        margin: auto 0
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-kan-c354] .delivery-options-wrapper[_ngcontent-kan-c354] .delivery-options-inner[_ngcontent-kan-c354] .two-column-wrapper[_ngcontent-kan-c354] .eta[_ngcontent-kan-c354] .minutes[_ngcontent-kan-c354] {
        display: block
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-kan-c354] .delivery-options-wrapper[_ngcontent-kan-c354] .delivery-options-inner[_ngcontent-kan-c354] .two-column-wrapper[_ngcontent-kan-c354] .unavailable-text[_ngcontent-kan-c354] {
        margin-bottom: 0;
        margin-left: 1.875rem;
        text-align: left
      }

      @media (max-width: 992px) {
        .delivery-options-search-bucket-wrapper[_ngcontent-kan-c354] .delivery-options-wrapper[_ngcontent-kan-c354] .delivery-options-inner[_ngcontent-kan-c354] .two-column-wrapper[_ngcontent-kan-c354] .unavailable-text[_ngcontent-kan-c354] {
          margin-left: 3rem
        }
      }

      @media (max-width: 992px) {
        .delivery-options-search-bucket-wrapper[_ngcontent-kan-c354] .delivery-options-wrapper[_ngcontent-kan-c354] .delivery-options-inner[_ngcontent-kan-c354] .two-column-wrapper.instant[_ngcontent-kan-c354] {
          display: grid;
          grid-template-columns: auto auto
        }
      }

      @media (max-width: 992px) {
        .delivery-options-search-bucket-wrapper[_ngcontent-kan-c354] .delivery-options-wrapper[_ngcontent-kan-c354] .delivery-options-inner[_ngcontent-kan-c354] .two-column-wrapper.instant[_ngcontent-kan-c354]>[_ngcontent-kan-c354]:nth-child(2)>[_ngcontent-kan-c354]:first-child {
          margin-right: 0
        }
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-kan-c354] .delivery-options-wrapper[_ngcontent-kan-c354] .different-location-popover[_ngcontent-kan-c354] {
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

      .delivery-options-search-bucket-wrapper[_ngcontent-kan-c354] .delivery-options-wrapper[_ngcontent-kan-c354] .different-location-popover[_ngcontent-kan-c354]:after {
        content: "";
        position: absolute;
        border: 10px solid transparent;
        border-bottom: 10px solid var(--brandColorInfo600);
        top: -20px;
        left: 50%;
        transform: translate(-50%)
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-kan-c354] .delivery-options-wrapper[_ngcontent-kan-c354] .different-location-popover[_ngcontent-kan-c354] fa-icon[_ngcontent-kan-c354] {
        position: absolute;
        right: .375rem;
        top: .125rem;
        font-size: .75rem
      }

      .spinner-wrapper[_ngcontent-kan-c354] {
        display: flex;
        height: 100%;
        justify-content: center;
        align-items: center
      }

      .spinner-wrapper[_ngcontent-kan-c354] .spinner[_ngcontent-kan-c354] {
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

      [_nghost-kan-c348] {
        position: relative
      }

      @media (max-width: 992px) {
        [_nghost-kan-c348] {
          display: none
        }
      }

      .toggle-layer[_ngcontent-kan-c348] {
        position: absolute;
        inset: 0;
        cursor: pointer;
        z-index: 1
      }

      .empty-cart[_ngcontent-kan-c348] {
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

      .dropdown-btn[_ngcontent-kan-c348] {
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

      .dropdown-btn[_ngcontent-kan-c348]:before {
        content: "";
        position: absolute;
        width: 11.25rem;
        height: 1.125rem;
        bottom: -1.125rem;
        left: 0
      }

      .dropdown-btn[_ngcontent-kan-c348] .icon-cart-quantity-wrapper[_ngcontent-kan-c348] {
        position: relative;
        margin-bottom: -3px
      }

      .dropdown-btn[_ngcontent-kan-c348] .icon-cart-quantity-wrapper[_ngcontent-kan-c348] .icon-cart[_ngcontent-kan-c348] {
        background-image: url(assets/icons/cart.svg);
        width: 20px;
        height: 20px;
        background-position: center;
        background-repeat: no-repeat;
        background-size: contain
      }

      .dropdown-btn[_ngcontent-kan-c348] .icon-cart-quantity-wrapper[_ngcontent-kan-c348] .quantity[_ngcontent-kan-c348] {
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

      .dropdown-btn[_ngcontent-kan-c348]>[_ngcontent-kan-c348]:nth-child(2) {
        display: flex;
        flex-direction: column;
        text-align: left
      }

      .dropdown-btn[_ngcontent-kan-c348]>[_ngcontent-kan-c348]:nth-child(2) .price[_ngcontent-kan-c348] {
        color: var(--brandColorPrimary700)
      }

      .mion[_nghost-kan-c348] .quantity[_ngcontent-kan-c348],
      .mion [_nghost-kan-c348] .quantity[_ngcontent-kan-c348] {
        color: var(--basicColor950) !important;
        font-weight: 500
      }

      .mion[_nghost-kan-c348] .icon-cart-quantity-wrapper[_ngcontent-kan-c348] .price[_ngcontent-kan-c348],
      .mion [_nghost-kan-c348] .icon-cart-quantity-wrapper[_ngcontent-kan-c348] .price[_ngcontent-kan-c348] {
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

      .divider[_ngcontent-kan-c301] {
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

      .logos-wrapper[_ngcontent-kan-c300] {
        padding: 0 1rem
      }

      @media (min-width: 1200px) {
        .logos-wrapper[_ngcontent-kan-c300] {
          padding: 0 7rem
        }
      }

      @media (min-width: 1440px) {
        .logos-wrapper[_ngcontent-kan-c300] {
          padding: 0 11rem
        }
      }

      @media (min-width: 1600px) {
        .logos-wrapper[_ngcontent-kan-c300] {
          padding: 0 11rem
        }
      }

      @media (min-width: 1800px) {
        .logos-wrapper[_ngcontent-kan-c300] {
          padding: 0 18rem
        }
      }

      .logos-wrapper[_ngcontent-kan-c300] .inner[_ngcontent-kan-c300] {
        display: flex;
        align-items: center;
        justify-content: space-between
      }

      .logos-wrapper[_ngcontent-kan-c300] .inner[_ngcontent-kan-c300] .logos[_ngcontent-kan-c300] .logo[_ngcontent-kan-c300] {
        height: 40px;
        margin-right: 1.75rem
      }

      .logos-wrapper[_ngcontent-kan-c300] .inner[_ngcontent-kan-c300] .logos[_ngcontent-kan-c300] a[_ngcontent-kan-c300]:last-child>img[_ngcontent-kan-c300] {
        margin-right: 0
      }

      .logos-wrapper[_ngcontent-kan-c300] .inner[_ngcontent-kan-c300] .logos[_ngcontent-kan-c300] div[_ngcontent-kan-c300] {
        display: inline-block
      }

      .logos-wrapper[_ngcontent-kan-c300] .inner[_ngcontent-kan-c300] .logos[_ngcontent-kan-c300] div[_ngcontent-kan-c300] img[_ngcontent-kan-c300] {
        height: 40px
      }

      .logos-wrapper[_ngcontent-kan-c300] .inner[_ngcontent-kan-c300] .logo-container[_ngcontent-kan-c300] {
        display: flex;
        flex-direction: column
      }

      .logos-wrapper[_ngcontent-kan-c300] .migros-logo[_ngcontent-kan-c300] {
        max-width: 135px;
        margin: 1rem 0
      }

      .logos-wrapper[_ngcontent-kan-c300] .copyright[_ngcontent-kan-c300] {
        text-align: center;
        font-size: .625rem;
        line-height: 1.6
      }

      @media (min-width: 992px) {
        .logos-wrapper[_ngcontent-kan-c300] .copyright[_ngcontent-kan-c300] {
          text-align: left;
          margin-bottom: 1rem
        }
      }

      .logos-wrapper[_ngcontent-kan-c300] .anadolu-grubu-logo[_ngcontent-kan-c300] {
        height: 35px
      }

      .logos-wrapper.lite[_ngcontent-kan-c300] {
        padding: 0 1rem
      }

      @media (min-width: 1200px) {
        .logos-wrapper.lite[_ngcontent-kan-c300] {
          padding: 0 7rem
        }
      }

      @media (min-width: 1440px) {
        .logos-wrapper.lite[_ngcontent-kan-c300] {
          padding: 0 11rem
        }
      }

      @media (min-width: 1600px) {
        .logos-wrapper.lite[_ngcontent-kan-c300] {
          padding: 0 18rem
        }
      }

      @media (min-width: 1800px) {
        .logos-wrapper.lite[_ngcontent-kan-c300] {
          padding: 0 23rem
        }
      }
    </style>
    <style>
      [_nghost-kan-c298] {
        position: fixed;
        bottom: 0;
        left: 0;
        z-index: 1000
      }

      .container[_ngcontent-kan-c298] {
        width: 100vw;
        height: var(--mobile-bottom-nav-height);
        box-shadow: 0 -2px 5px #0000000f;
        background-color: var(--basicColorWhite);
        display: flex
      }

      .container[_ngcontent-kan-c298] .nav-item[_ngcontent-kan-c298] {
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

      .container[_ngcontent-kan-c298] .nav-item.active[_ngcontent-kan-c298] {
        color: var(--brandColorPrimary700)
      }

      .container[_ngcontent-kan-c298] .nav-item[_ngcontent-kan-c298] img[_ngcontent-kan-c298] {
        width: 1.25rem;
        height: 1.25rem;
        margin-bottom: .125rem
      }

      .container[_ngcontent-kan-c298] .nav-item[_ngcontent-kan-c298] .quantity[_ngcontent-kan-c298] {
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
        .container[_ngcontent-kan-c298] .nav-item[_ngcontent-kan-c298] .text[_ngcontent-kan-c298] {
          font-size: 3.2vw
        }
      }

      .mion[_nghost-kan-c298] .quantity[_ngcontent-kan-c298],
      .mion [_nghost-kan-c298] .quantity[_ngcontent-kan-c298] {
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

      .wrapper[_ngcontent-kan-c170] {
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
        .wrapper[_ngcontent-kan-c170] {
          left: 0;
          margin: 0 1rem;
          padding: 1rem
        }
      }

      @media (min-width: 1200px) {
        .wrapper[_ngcontent-kan-c170] {
          left: 7rem
        }
      }

      @media (min-width: 1440px) {
        .wrapper[_ngcontent-kan-c170] {
          left: 11rem
        }
      }

      @media (min-width: 1800px) {
        .wrapper[_ngcontent-kan-c170] {
          left: 18rem
        }
      }

      @media (max-width: 576px) {
        .wrapper[_ngcontent-kan-c170] .subtitle-1[_ngcontent-kan-c170] {
          font-size: .875rem
        }
      }

      .wrapper[_ngcontent-kan-c170] .cookie-title[_ngcontent-kan-c170] {
        margin-bottom: 1rem
      }

      .wrapper[_ngcontent-kan-c170] .cursor-pointer[_ngcontent-kan-c170] {
        cursor: pointer
      }

      .wrapper[_ngcontent-kan-c170] .link[_ngcontent-kan-c170] {
        text-decoration: underline;
        color: var(--brandColorPrimary700)
      }

      .wrapper[_ngcontent-kan-c170] .white-link[_ngcontent-kan-c170] {
        text-decoration: underline;
        color: #fff;
        font-weight: 700
      }

      .wrapper[_ngcontent-kan-c170] .action-buttons[_ngcontent-kan-c170] {
        display: flex
      }

      @media (max-width: 576px) {
        .wrapper[_ngcontent-kan-c170] .action-buttons[_ngcontent-kan-c170] {
          flex-direction: column
        }
      }

      .wrapper[_ngcontent-kan-c170] .action-buttons[_ngcontent-kan-c170] .btn[_ngcontent-kan-c170] {
        outline: none;
        border-radius: 5px;
        padding: .813rem .758rem .688rem 1.242rem;
        margin-top: 1rem;
        cursor: pointer;
        flex-basis: 100%
      }

      @media (max-width: 576px) {
        .wrapper[_ngcontent-kan-c170] .action-buttons[_ngcontent-kan-c170] .btn[_ngcontent-kan-c170] {
          margin: 1rem 0 0
        }
      }

      .wrapper[_ngcontent-kan-c170] .action-buttons[_ngcontent-kan-c170] .settings[_ngcontent-kan-c170] {
        border: 1px solid #ffffff;
        background-color: #292a2c;
        color: #fff
      }

      .wrapper[_ngcontent-kan-c170] .action-buttons[_ngcontent-kan-c170] .accept-all[_ngcontent-kan-c170] {
        border: 1px solid #292a2c;
        background-color: #fff;
        margin-left: .75rem
      }

      @media (max-width: 576px) {
        .wrapper[_ngcontent-kan-c170] .action-buttons[_ngcontent-kan-c170] .accept-all[_ngcontent-kan-c170] {
          margin-left: unset
        }
      }

      .mion[_nghost-kan-c170] .settings[_ngcontent-kan-c170],
      .mion [_nghost-kan-c170] .settings[_ngcontent-kan-c170] {
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

      .links-wrapper[_ngcontent-kan-c299] {
        padding: 0 1rem
      }

      @media (min-width: 1200px) {
        .links-wrapper[_ngcontent-kan-c299] {
          padding: 0 7rem
        }
      }

      @media (min-width: 1440px) {
        .links-wrapper[_ngcontent-kan-c299] {
          padding: 0 11rem
        }
      }

      @media (min-width: 1600px) {
        .links-wrapper[_ngcontent-kan-c299] {
          padding: 0 11rem
        }
      }

      @media (min-width: 1800px) {
        .links-wrapper[_ngcontent-kan-c299] {
          padding: 0 18rem
        }
      }

      .links-wrapper[_ngcontent-kan-c299] .inner-grid[_ngcontent-kan-c299] {
        align-items: unset
      }

      @media (max-width: 768px) {
        .links-wrapper[_ngcontent-kan-c299] .inner-grid[_ngcontent-kan-c299] {
          grid-gap: unset
        }
      }

      .links-wrapper[_ngcontent-kan-c299] .inner-grid[_ngcontent-kan-c299]>div[_ngcontent-kan-c299] {
        width: 100%
      }

      .links-wrapper[_ngcontent-kan-c299] .inner-grid[_ngcontent-kan-c299] .logos-wrapper[_ngcontent-kan-c299] {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: -5rem
      }

      .links-wrapper[_ngcontent-kan-c299] .inner-grid[_ngcontent-kan-c299] .logos-wrapper[_ngcontent-kan-c299] .logo[_ngcontent-kan-c299] {
        height: 21px
      }

      .links-wrapper[_ngcontent-kan-c299] .inner-grid[_ngcontent-kan-c299] .logos-wrapper[_ngcontent-kan-c299] .logo.kadin-akademisi[_ngcontent-kan-c299] {
        height: 45px
      }

      .links-wrapper[_ngcontent-kan-c299] .inner-grid[_ngcontent-kan-c299] .logos-wrapper[_ngcontent-kan-c299] .logo.saglikli-yasam[_ngcontent-kan-c299] {
        height: 43px
      }

      .links-wrapper[_ngcontent-kan-c299] .right-container[_ngcontent-kan-c299] {
        display: grid
      }

      @media (max-width: 768px) {
        .links-wrapper[_ngcontent-kan-c299] .content[_ngcontent-kan-c299] {
          display: none
        }
      }

      .links-wrapper[_ngcontent-kan-c299] .content.selected[_ngcontent-kan-c299] {
        display: block
      }

      .links-wrapper[_ngcontent-kan-c299] .title[_ngcontent-kan-c299] {
        padding-top: 2rem;
        font-weight: var(--font-weight-bold)
      }

      .links-wrapper[_ngcontent-kan-c299] .title[_ngcontent-kan-c299] fa-icon[_ngcontent-kan-c299] {
        float: right
      }

      @media (min-width: 768px) {
        .links-wrapper[_ngcontent-kan-c299] .title[_ngcontent-kan-c299] fa-icon[_ngcontent-kan-c299] {
          display: none
        }
      }

      .links-wrapper[_ngcontent-kan-c299] .link[_ngcontent-kan-c299] {
        font-size: .75rem;
        font-weight: var(--font-weight-normal);
        margin-bottom: .375rem
      }

      .links-wrapper[_ngcontent-kan-c299] .link[_ngcontent-kan-c299] a[_ngcontent-kan-c299] {
        color: var(--basicColor600);
        cursor: pointer
      }

      .links-wrapper[_ngcontent-kan-c299] .link[_ngcontent-kan-c299] a[_ngcontent-kan-c299]:hover,
      .links-wrapper[_ngcontent-kan-c299] .link[_ngcontent-kan-c299] a.active[_ngcontent-kan-c299] {
        color: var(--brandColorPrimary700)
      }

      @media (min-width: 768px) {
        .links-wrapper[_ngcontent-kan-c299] .popular-pages[_ngcontent-kan-c299] .link[_ngcontent-kan-c299] {
          display: inline-block;
          width: 50%
        }
      }

      .links-wrapper[_ngcontent-kan-c299] .mobile-app-link[_ngcontent-kan-c299] {
        height: 3.125rem;
        border: 1px solid var(--basicColor300);
        border-radius: 3px;
        max-width: 8.75rem;
        text-align: center;
        padding: .25rem 0;
        margin-top: .5rem
      }

      @media (max-width: 768px) {
        .links-wrapper[_ngcontent-kan-c299] .mobile-app-link[_ngcontent-kan-c299] {
          display: inline-block;
          min-width: 8.75rem;
          margin-right: .5rem
        }
      }

      .links-wrapper[_ngcontent-kan-c299] .mobile-app-link[_ngcontent-kan-c299] img[_ngcontent-kan-c299] {
        max-width: 100%
      }

      .links-wrapper[_ngcontent-kan-c299] .socials[_ngcontent-kan-c299] {
        display: flex;
        flex-wrap: wrap
      }

      @media (min-width: 992px) {
        .links-wrapper[_ngcontent-kan-c299] .socials[_ngcontent-kan-c299] {
          justify-content: space-between
        }
      }

      @media (max-width: 992px) {
        .links-wrapper[_ngcontent-kan-c299] .socials[_ngcontent-kan-c299] a[_ngcontent-kan-c299] {
          padding-right: 1.25rem
        }
      }

      .links-wrapper[_ngcontent-kan-c299] .nearest-migros[_ngcontent-kan-c299] {
        margin-top: 3rem;
        font-size: .75rem;
        padding: .625rem 0;
        border: 1px solid var(--brandColorPrimary700);
        border-radius: 5px
      }

      .links-wrapper[_ngcontent-kan-c299] .nearest-migros[_ngcontent-kan-c299] a[_ngcontent-kan-c299] {
        display: flex;
        justify-content: center;
        align-items: center;
        font-weight: var(--font-weight-bold);
        cursor: pointer
      }

      .links-wrapper[_ngcontent-kan-c299] .nearest-migros[_ngcontent-kan-c299] fa-icon[_ngcontent-kan-c299] {
        font-size: 1.25rem;
        margin-right: .625rem
      }

      .links-wrapper[_ngcontent-kan-c299] .digital[_ngcontent-kan-c299] {
        margin-top: .625rem;
        height: 3.125rem;
        border: 1px solid var(--basicColor300);
        font-size: .75rem;
        font-weight: var(--font-weight-bold);
        border-radius: 3px
      }

      .links-wrapper[_ngcontent-kan-c299] .digital[_ngcontent-kan-c299] a[_ngcontent-kan-c299] {
        color: var(--basicColorBlack)
      }

      @media (max-width: 992px) {
        .links-wrapper[_ngcontent-kan-c299] .digital[_ngcontent-kan-c299] {
          min-width: 10rem;
          display: inline-block;
          margin-right: .5rem
        }
      }

      .links-wrapper[_ngcontent-kan-c299] .digital[_ngcontent-kan-c299] .align-helper[_ngcontent-kan-c299] {
        height: 100%;
        display: inline-block;
        vertical-align: middle
      }

      .links-wrapper[_ngcontent-kan-c299] .digital[_ngcontent-kan-c299] img[_ngcontent-kan-c299] {
        display: inline-block;
        vertical-align: middle;
        margin: 0 .625rem
      }

      .links-wrapper.lite[_ngcontent-kan-c299] {
        padding: 0 1rem
      }

      @media (min-width: 1200px) {
        .links-wrapper.lite[_ngcontent-kan-c299] {
          padding: 0 7rem
        }
      }

      @media (min-width: 1440px) {
        .links-wrapper.lite[_ngcontent-kan-c299] {
          padding: 0 11rem
        }
      }

      @media (min-width: 1600px) {
        .links-wrapper.lite[_ngcontent-kan-c299] {
          padding: 0 18rem
        }
      }

      @media (min-width: 1800px) {
        .links-wrapper.lite[_ngcontent-kan-c299] {
          padding: 0 23rem
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

      .home-page-wrapper[_ngcontent-kan-c425] {
        padding: 0 1rem
      }

      @media (min-width: 1200px) {
        .home-page-wrapper[_ngcontent-kan-c425] {
          padding: 0 7rem
        }
      }

      @media (min-width: 1440px) {
        .home-page-wrapper[_ngcontent-kan-c425] {
          padding: 0 11rem
        }
      }

      @media (min-width: 1600px) {
        .home-page-wrapper[_ngcontent-kan-c425] {
          padding: 0 11rem
        }
      }

      @media (min-width: 1800px) {
        .home-page-wrapper[_ngcontent-kan-c425] {
          padding: 0 18rem
        }
      }

      @media (max-width: 992px) {
        .home-page-wrapper[_ngcontent-kan-c425] {
          padding: 0
        }
      }

      .home-page-wrapper[_ngcontent-kan-c425] .banners[_ngcontent-kan-c425]:nth-of-type(2) {
        display: none
      }

      @media (max-width: 576px) {
        .home-page-wrapper[_ngcontent-kan-c425] .banners[_ngcontent-kan-c425] {
          padding: 0 1rem
        }
      }

      .home-page-wrapper[_ngcontent-kan-c425] .banners[_ngcontent-kan-c425] .main-slider-banner[_ngcontent-kan-c425] {
        transform-origin: 0 0
      }

      .home-page-wrapper[_ngcontent-kan-c425] .under-slider-banners[_ngcontent-kan-c425] {
        display: flex;
        justify-content: space-evenly;
        align-items: center;
        overflow-y: scroll;
        scrollbar-width: none;
        -ms-overflow-style: none
      }

      .home-page-wrapper[_ngcontent-kan-c425] .under-slider-banners[_ngcontent-kan-c425]::-webkit-scrollbar {
        width: 0;
        height: 0
      }

      @media (max-width: 576px) {
        .home-page-wrapper[_ngcontent-kan-c425] .under-slider-banners[_ngcontent-kan-c425] {
          padding: 0 1rem
        }
      }

      .home-page-wrapper[_ngcontent-kan-c425] .under-slider-banners[_ngcontent-kan-c425] .under-slider-banner[_ngcontent-kan-c425] {
        border-radius: 8px;
        margin-right: 1rem;
        cursor: pointer;
        max-width: 13rem;
        max-height: 13rem
      }

      @media (max-width: 768px) {
        .home-page-wrapper[_ngcontent-kan-c425] .under-slider-banners[_ngcontent-kan-c425] .under-slider-banner[_ngcontent-kan-c425] {
          max-width: 170px
        }
      }

      @media (max-width: 576px) {
        .home-page-wrapper[_ngcontent-kan-c425] .under-slider-banners[_ngcontent-kan-c425] .under-slider-banner[_ngcontent-kan-c425] {
          max-width: 7.25rem
        }
      }

      .home-page-wrapper[_ngcontent-kan-c425] .middle-banner-wrapper[_ngcontent-kan-c425] {
        width: 100%
      }

      .home-page-wrapper[_ngcontent-kan-c425] .middle-banner-wrapper[_ngcontent-kan-c425] .middle-banner[_ngcontent-kan-c425] {
        transform-origin: 0 0;
        width: -moz-fit-content;
        width: fit-content
      }

      .home-page-wrapper[_ngcontent-kan-c425] .free-banner-wrapper[_ngcontent-kan-c425] {
        width: 100%
      }

      .home-page-wrapper[_ngcontent-kan-c425] .free-banner-wrapper[_ngcontent-kan-c425] .free-banner[_ngcontent-kan-c425] {
        transform-origin: 0 0;
        width: -moz-fit-content;
        width: fit-content
      }

      @media (max-width: 576px) {
        .home-page-wrapper[_ngcontent-kan-c425] .cross-retention[_ngcontent-kan-c425] {
          padding: 0 1rem
        }
      }

      @media (max-width: 576px) {
        .home-page-wrapper[_ngcontent-kan-c425] .fast-cart-wrapper[_ngcontent-kan-c425] {
          padding: 0 1rem
        }
      }

      .home-page-wrapper[_ngcontent-kan-c425] .ai-section-wrapper[_ngcontent-kan-c425] {
        border: solid 1px var(--basicColor300);
        border-radius: .5rem;
        padding: 0 2rem;
        background-color: var(--brandColorYemekAi50)
      }

      .home-page-wrapper[_ngcontent-kan-c425] .categories-wrapper[_ngcontent-kan-c425] {
        display: grid;
        grid-template-columns: repeat(8, 1fr);
        gap: 1rem;
        text-align: center
      }

      @media (max-width: 1200px) {
        .home-page-wrapper[_ngcontent-kan-c425] .categories-wrapper[_ngcontent-kan-c425] {
          grid-template-columns: repeat(5, 1fr)
        }
      }

      @media (max-width: 992px) {
        .home-page-wrapper[_ngcontent-kan-c425] .categories-wrapper[_ngcontent-kan-c425] {
          grid-template-columns: repeat(3, 1fr)
        }
      }

      @media (max-width: 768px) {
        .home-page-wrapper[_ngcontent-kan-c425] .categories-wrapper[_ngcontent-kan-c425] {
          gap: .5rem;
          padding: 0 1rem
        }
      }

      .home-page-wrapper[_ngcontent-kan-c425] .categories-wrapper[_ngcontent-kan-c425] .category-card[_ngcontent-kan-c425] {
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
        .home-page-wrapper[_ngcontent-kan-c425] .categories-wrapper[_ngcontent-kan-c425] .category-card[_ngcontent-kan-c425] {
          min-width: 4.5rem;
          min-height: 4.5rem
        }
      }

      .home-page-wrapper[_ngcontent-kan-c425] .categories-wrapper[_ngcontent-kan-c425] .category-card.categories-see-all[_ngcontent-kan-c425] {
        background: var(--basicColor100);
        padding: 1.125rem .75rem 1.188rem .813rem;
        border-radius: .5rem;
        display: inline;
        height: -moz-fit-content;
        height: fit-content;
        border: none;
        line-height: 1.5
      }

      .home-page-wrapper[_ngcontent-kan-c425] .categories-wrapper[_ngcontent-kan-c425] img[_ngcontent-kan-c425] {
        max-width: 100%;
        height: auto;
        max-height: 5.5rem
      }

      @media (max-width: 768px) {
        .home-page-wrapper[_ngcontent-kan-c425] .categories-wrapper[_ngcontent-kan-c425] img[_ngcontent-kan-c425] {
          max-height: 3.5rem
        }
      }

      .home-page-wrapper[_ngcontent-kan-c425] .categories-wrapper[_ngcontent-kan-c425] .category-name[_ngcontent-kan-c425] {
        margin-top: .5rem
      }

      .home-page-wrapper[_ngcontent-kan-c425] .section[_ngcontent-kan-c425] {
        margin-top: 2rem;
        position: relative
      }

      .home-page-wrapper[_ngcontent-kan-c425] .section.hemen[_ngcontent-kan-c425] {
        margin-top: 0
      }

      .home-page-wrapper[_ngcontent-kan-c425] .section#section-shopping-list-vwo[_ngcontent-kan-c425] {
        display: none
      }

      @media (max-width: 576px) {
        .home-page-wrapper[_ngcontent-kan-c425] .section[_ngcontent-kan-c425] {
          margin-top: 1rem
        }
      }

      .home-page-wrapper[_ngcontent-kan-c425] .section[_ngcontent-kan-c425] .section-title[_ngcontent-kan-c425] {
        margin-bottom: 1.25rem
      }

      @media (max-width: 576px) {
        .home-page-wrapper[_ngcontent-kan-c425] .section[_ngcontent-kan-c425] .section-title[_ngcontent-kan-c425] {
          margin-bottom: .75rem;
          font-size: 1.1rem;
          padding: 0 1rem
        }
      }

      .home-page-wrapper[_ngcontent-kan-c425] .section[_ngcontent-kan-c425] .section-title.below-unrated-orders[_ngcontent-kan-c425] {
        margin-bottom: 1rem
      }

      .home-page-wrapper[_ngcontent-kan-c425] .section[_ngcontent-kan-c425] .fade-out[_ngcontent-kan-c425] {
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
        .home-page-wrapper[_ngcontent-kan-c425] .section[_ngcontent-kan-c425] .fade-out[_ngcontent-kan-c425] {
          display: none
        }
      }

      .home-page-wrapper[_ngcontent-kan-c425] .section[_ngcontent-kan-c425] .fade-out.categories[_ngcontent-kan-c425] {
        bottom: 0;
        top: 50px
      }

      @media (min-width: 768px) {
        .home-page-wrapper[_ngcontent-kan-c425] .section[_ngcontent-kan-c425] .fade-out.categories[_ngcontent-kan-c425] {
          display: none
        }
      }

      .home-page-wrapper[_ngcontent-kan-c425] .section[_ngcontent-kan-c425] .see-all[_ngcontent-kan-c425] {
        margin-left: auto;
        display: flex;
        cursor: pointer;
        margin-top: .4rem
      }

      @media (max-width: 576px) {
        .home-page-wrapper[_ngcontent-kan-c425] .section[_ngcontent-kan-c425] .see-all[_ngcontent-kan-c425] {
          display: none
        }
      }

      .home-page-wrapper[_ngcontent-kan-c425] .section[_ngcontent-kan-c425] .see-all[_ngcontent-kan-c425] fa-icon[_ngcontent-kan-c425] {
        font-size: .75rem;
        margin-left: .5rem;
        margin-top: .1rem
      }

      .home-page-wrapper[_ngcontent-kan-c425] .section[_ngcontent-kan-c425] .list-page-items-container[_ngcontent-kan-c425] {
        display: flex;
        overflow-y: scroll;
        scrollbar-width: none;
        -ms-overflow-style: none
      }

      .home-page-wrapper[_ngcontent-kan-c425] .section[_ngcontent-kan-c425] .list-page-items-container[_ngcontent-kan-c425]::-webkit-scrollbar {
        width: 0;
        height: 0
      }

      .home-page-wrapper[_ngcontent-kan-c425] .section[_ngcontent-kan-c425] .list-page-items-container.in-mat-tab-group[_ngcontent-kan-c425] {
        overflow-x: unset
      }

      .home-page-wrapper[_ngcontent-kan-c425] .section[_ngcontent-kan-c425] .list-page-items-container[_ngcontent-kan-c425] sm-list-page-item[_ngcontent-kan-c425] {
        margin-right: .625rem
      }

      @media (max-width: 768px) {
        .home-page-wrapper[_ngcontent-kan-c425] .section[_ngcontent-kan-c425] .list-page-items-container[_ngcontent-kan-c425] sm-list-page-item[_ngcontent-kan-c425] {
          margin-right: .5rem
        }
      }

      @media (max-width: 768px) {
        .home-page-wrapper[_ngcontent-kan-c425] .section[_ngcontent-kan-c425] .list-page-items-container[_ngcontent-kan-c425] {
          padding: 0 0 0 1rem
        }
      }

      .home-page-wrapper[_ngcontent-kan-c425] .section[_ngcontent-kan-c425] .image-items-wrapper[_ngcontent-kan-c425] {
        display: flex;
        height: 22rem
      }

      .home-page-wrapper[_ngcontent-kan-c425] .section[_ngcontent-kan-c425] .image-items-wrapper[_ngcontent-kan-c425] .container-wrapper[_ngcontent-kan-c425] {
        position: relative;
        overflow-x: hidden;
        width: 100%
      }

      .home-page-wrapper[_ngcontent-kan-c425] .section[_ngcontent-kan-c425] .image-items-wrapper[_ngcontent-kan-c425] img[_ngcontent-kan-c425] {
        border-radius: 8px;
        margin-right: 1.5rem;
        cursor: pointer;
        max-width: 360px
      }

      @media (max-width: 768px) {
        .home-page-wrapper[_ngcontent-kan-c425] .section[_ngcontent-kan-c425] .image-items-wrapper[_ngcontent-kan-c425] img[_ngcontent-kan-c425] {
          display: none
        }
      }

      .home-page-wrapper[_ngcontent-kan-c425] .section[_ngcontent-kan-c425] .see-all-button[_ngcontent-kan-c425] {
        width: calc(100% - 2rem);
        margin-top: .75rem;
        height: 3.125rem;
        padding: 0 1rem;
        margin-left: 1rem
      }

      @media (min-width: 576px) {
        .home-page-wrapper[_ngcontent-kan-c425] .section[_ngcontent-kan-c425] .see-all-button[_ngcontent-kan-c425] {
          display: none
        }
      }

      .home-page-wrapper[_ngcontent-kan-c425] .next-btn[_ngcontent-kan-c425] {
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
        .home-page-wrapper[_ngcontent-kan-c425] .next-btn[_ngcontent-kan-c425] {
          display: none
        }
      }

      .home-page-wrapper[_ngcontent-kan-c425] .next-btn[_ngcontent-kan-c425]:after {
        content: "";
        display: inline-block;
        height: .3em;
        width: .3em;
        border-style: solid;
        border-width: .05em .05em 0 0;
        transform: rotate(45deg)
      }

      .home-page-wrapper[_ngcontent-kan-c425] .next-btn[_ngcontent-kan-c425]:after {
        left: .4em;
        position: relative;
        font-size: 2rem;
        top: 1rem
      }

      .home-page-wrapper[_ngcontent-kan-c425] .prev-btn[_ngcontent-kan-c425] {
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
        .home-page-wrapper[_ngcontent-kan-c425] .prev-btn[_ngcontent-kan-c425] {
          display: none
        }
      }

      .home-page-wrapper[_ngcontent-kan-c425] .prev-btn[_ngcontent-kan-c425]:after {
        content: "";
        display: inline-block;
        height: .3em;
        width: .3em;
        border-style: solid;
        border-width: .05em .05em 0 0;
        transform: rotate(225deg)
      }

      .home-page-wrapper[_ngcontent-kan-c425] .prev-btn[_ngcontent-kan-c425]:after {
        left: 1.15em;
        position: relative;
        font-size: 2rem;
        top: 1rem
      }

      [_nghost-kan-c425] sm-list-page-item {
        min-width: 10.25rem;
        max-width: 10.25rem
      }

      [_nghost-kan-c425] sm-list-page-item .mdc-card {
        border-radius: 8px
      }

      [_nghost-kan-c425] .shopping-tabs .mat-mdc-tab-group {
        flex-direction: row !important
      }

      [_nghost-kan-c425] .shopping-tabs .mat-mdc-tab-labels {
        flex-direction: column !important
      }

      [_nghost-kan-c425] .shopping-tabs .mat-mdc-tab {
        justify-content: start;
        padding-left: 1rem;
        margin-bottom: 1rem;
        margin-right: 6rem
      }

      [_nghost-kan-c425] .shopping-tabs .mdc-tab--active .mdc-tab-indicator {
        position: absolute;
        left: 0;
        bottom: 0;
        top: 0 !important;
        width: .3rem;
        height: 100%;
        background-color: var(--brandColorPrimary700)
      }

      [_nghost-kan-c425] .shopping-tabs .mdc-tab--active .mdc-tab-indicator__content {
        opacity: 0
      }

      [_nghost-kan-c425] .shopping-tabs .mdc-tab__text-label {
        margin: 0
      }

      [_nghost-kan-c425] .shopping-tabs .mat-mdc-tab-body-content {
        display: flex;
        gap: 1.5rem;
        overflow-y: scroll;
        scrollbar-width: none;
        -ms-overflow-style: none
      }

      [_nghost-kan-c425] .shopping-tabs .mat-mdc-tab-body-content .container-wrapper .fade-out {
        top: 0 !important
      }

      [_nghost-kan-c425] .shopping-tabs .mat-mdc-tab-body-content::-webkit-scrollbar {
        width: 0;
        height: 0
      }

      [_nghost-kan-c425] .shopping-tabs .mat-mdc-tab-body-wrapper {
        width: 100%
      }

      @media (min-width: 768px) {
        [_nghost-kan-c425] .shopping-tabs .mat-mdc-tab-body-wrapper {
          margin-left: -3rem
        }
      }

      [_nghost-kan-c425] .invoice-form-button {
        position: relative !important;
        padding: 0 .5rem !important;
        height: auto !important
      }

      [_nghost-kan-c425] .invoice-form-button .invoice-form {
        display: flex
      }

      [_nghost-kan-c425] .invoice-form-button .invoice-form .icon-small-invoice-form {
        height: 1rem
      }

      [_nghost-kan-c425] .electronic-banner-shopping-list {
        margin-top: 1rem
      }

      @media (min-width: 768px) {
        [_nghost-kan-c425] .electronic-banner-shopping-list {
          display: flex;
          margin-bottom: -3rem
        }
      }

      [_nghost-kan-c425] .electronic-banner-shopping-list .electronic-banner-shopping-list-items {
        cursor: pointer;
        width: 100%;
        padding: 0 1rem;
        margin: .5rem 0;
        border-radius: .3125rem
      }

      @media (min-width: 768px) {
        [_nghost-kan-c425] .electronic-banner-shopping-list .electronic-banner-shopping-list-items {
          width: 32%;
          height: auto
        }
      }

      @media (min-width: 992px) {
        [_nghost-kan-c425] .electronic-banner-shopping-list .electronic-banner-shopping-list-items {
          padding: 0;
          margin: 0 1rem 0 0
        }
      }

      [_nghost-kan-c425] .fade-out {
        height: 100%
      }

      .elektronik[_nghost-kan-c425] .home-page-wrapper[_ngcontent-kan-c425],
      .elektronik [_nghost-kan-c425] .home-page-wrapper[_ngcontent-kan-c425] {
        margin-bottom: 5rem
      }

      .mion[_nghost-kan-c425] .categories-wrapper[_ngcontent-kan-c425] .category-card[_ngcontent-kan-c425],
      .mion [_nghost-kan-c425] .categories-wrapper[_ngcontent-kan-c425] .category-card[_ngcontent-kan-c425] {
        min-width: 7rem;
        min-height: 7rem;
        border: none;
        padding: 0
      }

      @media (max-width: 992px) {

        .mion[_nghost-kan-c425] .categories-wrapper[_ngcontent-kan-c425] .category-card[_ngcontent-kan-c425],
        .mion [_nghost-kan-c425] .categories-wrapper[_ngcontent-kan-c425] .category-card[_ngcontent-kan-c425] {
          min-width: unset;
          min-height: unset
        }
      }

      .mion[_nghost-kan-c425] .categories-wrapper[_ngcontent-kan-c425] .category-card[_ngcontent-kan-c425] img[_ngcontent-kan-c425],
      .mion [_nghost-kan-c425] .categories-wrapper[_ngcontent-kan-c425] .category-card[_ngcontent-kan-c425] img[_ngcontent-kan-c425] {
        max-height: initial
      }

      .mion[_nghost-kan-c425] .see-all-button[_ngcontent-kan-c425],
      .mion [_nghost-kan-c425] .see-all-button[_ngcontent-kan-c425] {
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
    <meta property="og:url" content="https://www.migros.com.tr/by-izzet-antep-fistigi-200-g-p-7b7052">
    <link rel="canonical" href="https://www.migros.com.tr/by-izzet-antep-fistigi-200-g-p-7b7052">
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
    <script type="text/javascript" async="" src="https://googleads.g.doubleclick.net/pagead/viewthroughconversion/715674769/?random=1709165580145&amp;cv=11&amp;fst=1709165580145&amp;bg=ffffff&amp;guid=ON&amp;async=1&amp;gtm=45be42q1v889281616z8811483837za201&amp;gcd=13n3n3l3l5&amp;dma=0&amp;u_w=1366&amp;u_h=768&amp;url=https%3A%2F%2Fwww.migros.com.tr%2F&amp;hn=www.googleadservices.com&amp;frm=0&amp;tiba=Migros%20Sanal%20Market%3A%20Online%20Market%20Al%C4%B1%C5%9Fveri%C5%9Fi&amp;npa=0&amp;pscdl=noapi&amp;auid=37027196.1709149487&amp;uaa=x86&amp;uab=64&amp;uafvl=Chromium%3B122.0.6261.69%7CNot(A%253ABrand%3B24.0.0.0%7CGoogle%2520Chrome%3B122.0.6261.69&amp;uamb=0&amp;uap=Windows&amp;uapv=10.0.0&amp;uaw=0&amp;fledge=1&amp;rfmt=3&amp;fmt=4"></script>
    <style>
      .sm-how-to-wrapper[_ngcontent-kan-c420] {
        display: flex;
        margin: 2rem 0;
        justify-content: space-between
      }

      @media (max-width: 768px) {
        .sm-how-to-wrapper[_ngcontent-kan-c420] {
          display: grid;
          grid-template-columns: 1fr;
          place-items: center;
          gap: 1rem;
          margin: 1.5rem 0 5rem;
          padding: 0 1rem
        }
      }

      .sm-how-to-wrapper[_ngcontent-kan-c420] .how-to[_ngcontent-kan-c420] {
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
        .sm-how-to-wrapper[_ngcontent-kan-c420] .how-to[_ngcontent-kan-c420] {
          width: 100%
        }
      }

      @media (min-width: 768px) {
        .sm-how-to-wrapper[_ngcontent-kan-c420] .how-to[_ngcontent-kan-c420]:first-child {
          margin-left: 0
        }

        .sm-how-to-wrapper[_ngcontent-kan-c420] .how-to[_ngcontent-kan-c420]:last-child {
          margin-right: 0
        }
      }

      @media (min-width: 768px) {
        .sm-how-to-wrapper[_ngcontent-kan-c420] .how-to[_ngcontent-kan-c420] {
          padding: 1rem
        }
      }

      @media (min-width: 1200px) {
        .sm-how-to-wrapper[_ngcontent-kan-c420] .how-to[_ngcontent-kan-c420] {
          padding: 2rem 3rem
        }
      }

      .sm-how-to-wrapper[_ngcontent-kan-c420] .how-to.hemen[_ngcontent-kan-c420] {
        padding: 3rem;
        margin: 0 2rem
      }

      @media (min-width: 768px) {
        .sm-how-to-wrapper[_ngcontent-kan-c420] .how-to.hemen[_ngcontent-kan-c420]:first-child {
          margin-left: 0
        }

        .sm-how-to-wrapper[_ngcontent-kan-c420] .how-to.hemen[_ngcontent-kan-c420]:last-child {
          margin-right: 0
        }
      }

      .sm-how-to-wrapper[_ngcontent-kan-c420] .how-to[_ngcontent-kan-c420] .image[_ngcontent-kan-c420] {
        width: 7.5rem;
        height: 7.5rem;
        background-repeat: no-repeat;
        background-size: contain
      }

      .sm-how-to-wrapper[_ngcontent-kan-c420] .how-to[_ngcontent-kan-c420] .image.card[_ngcontent-kan-c420] {
        background-image: url(assets/home-page/card.png)
      }

      .sm-how-to-wrapper[_ngcontent-kan-c420] .how-to[_ngcontent-kan-c420] .image.truck[_ngcontent-kan-c420] {
        background-image: url(assets/home-page/truck.png)
      }

      .sm-how-to-wrapper[_ngcontent-kan-c420] .how-to[_ngcontent-kan-c420] .image.box[_ngcontent-kan-c420] {
        background-image: url(assets/home-page/box.png)
      }

      .sm-how-to-wrapper[_ngcontent-kan-c420] .how-to[_ngcontent-kan-c420] .image.money[_ngcontent-kan-c420] {
        background-image: url(assets/home-page/money-logo.png)
      }

      .sm-how-to-wrapper[_ngcontent-kan-c420] .how-to[_ngcontent-kan-c420] .image.motorcycle[_ngcontent-kan-c420] {
        background-image: url(assets/home-page/motorcycle.webp)
      }

      .sm-how-to-wrapper[_ngcontent-kan-c420] .how-to[_ngcontent-kan-c420] .image.shopping-bag[_ngcontent-kan-c420] {
        background-image: url(assets/home-page/shopping-bag.webp)
      }

      .sm-how-to-wrapper[_ngcontent-kan-c420] .how-to[_ngcontent-kan-c420] .image.migros-hemen-logo[_ngcontent-kan-c420] {
        background-image: url(assets/home-page/migros-hemen-logo.webp)
      }

      .sm-how-to-wrapper[_ngcontent-kan-c420] .how-to[_ngcontent-kan-c420] .text[_ngcontent-kan-c420] {
        margin: 1rem 0 .75rem;
        max-width: 10rem
      }

      .sm-how-to-wrapper[_ngcontent-kan-c420] .how-to[_ngcontent-kan-c420] .detail[_ngcontent-kan-c420] {
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

      .fast-cart-banner[_ngcontent-kan-c383] {
        height: 8.125rem;
        padding: 1.75rem;
        border-radius: 8px;
        background-color: #fff1e3;
        display: flex;
        align-items: center
      }

      @media (max-width: 768px) {
        .fast-cart-banner[_ngcontent-kan-c383] {
          height: 15rem;
          flex-direction: column;
          text-align: center;
          padding: 1rem;
          justify-content: space-between
        }
      }

      .fast-cart-banner[_ngcontent-kan-c383] .banner-icon[_ngcontent-kan-c383] {
        width: 3.125rem
      }

      @media (max-width: 768px) {
        .fast-cart-banner[_ngcontent-kan-c383] .banner-icon[_ngcontent-kan-c383] {
          width: 2.25rem
        }
      }

      .fast-cart-banner__title[_ngcontent-kan-c383] {
        margin-left: 1rem
      }

      .fast-cart-banner__title[_ngcontent-kan-c383] [_ngcontent-kan-c383]:first-child {
        font-size: 1.5rem;
        font-weight: 600
      }

      @media (max-width: 768px) {
        .fast-cart-banner__title[_ngcontent-kan-c383] [_ngcontent-kan-c383]:first-child {
          font-size: 1.125rem
        }
      }

      @media (max-width: 768px) {
        .fast-cart-banner__title[_ngcontent-kan-c383] [_ngcontent-kan-c383]:nth-child(2) {
          font-size: .75rem
        }
      }

      .fast-cart-banner__products[_ngcontent-kan-c383] {
        display: flex;
        align-items: center;
        margin-left: auto
      }

      @media (max-width: 768px) {
        .fast-cart-banner__products[_ngcontent-kan-c383] {
          margin: 0
        }
      }

      .fast-cart-banner__products[_ngcontent-kan-c383] img[_ngcontent-kan-c383] {
        width: 4rem;
        height: 4rem;
        border-radius: 12px;
        margin-right: .5rem
      }

      @media (max-width: 768px) {
        .fast-cart-banner__products[_ngcontent-kan-c383] img[_ngcontent-kan-c383] {
          width: 2.875rem;
          height: 2.875rem
        }
      }

      .fast-cart-banner__products[_ngcontent-kan-c383] .more-products[_ngcontent-kan-c383] {
        color: var(--basicColor700)
      }

      @media (min-width: 768px) {
        .fast-cart-banner__products[_ngcontent-kan-c383] .more-products[_ngcontent-kan-c383] {
          margin-left: .5rem
        }
      }

      .fast-cart-banner__button[_ngcontent-kan-c383] {
        font-size: 14px
      }

      @media (min-width: 768px) {
        .fast-cart-banner__button[_ngcontent-kan-c383] {
          margin-left: 2rem
        }
      }

      @media (max-width: 576px) {
        .fast-cart-banner__button[_ngcontent-kan-c383] {
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
      [_nghost-kan-c162] {
        display: block
      }

      a[_ngcontent-kan-c162] {
        display: block;
        height: 100%;
        border-radius: inherit
      }

      a[_ngcontent-kan-c162] img[_ngcontent-kan-c162] {
        width: 100%;
        height: 100%;
        border-radius: inherit;
        object-fit: contain
      }
    </style>
    <style>
      [_nghost-kan-c343] {
        display: inherit
      }

      .crm-badge[_ngcontent-kan-c343] {
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

      .crm-badge[_ngcontent-kan-c343] img[_ngcontent-kan-c343] {
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

      [_nghost-kan-c275] {
        display: block;
        position: relative
      }

      [not-in-sale=true][_nghost-kan-c275] .price-new[_ngcontent-kan-c275] {
        color: var(--font-color__grey)
      }

      [not-in-sale=true][_nghost-kan-c275] .price-old[_ngcontent-kan-c275] {
        display: none
      }

      @media (min-width: 768px) {
        [not-in-sale=true][_nghost-kan-c275] .price-old[_ngcontent-kan-c275] {
          display: inline-block
        }
      }

      .amount[_ngcontent-kan-c275] {
        font-weight: var(--font-weight-bolder)
      }

      .currency[_ngcontent-kan-c275] {
        font-size: 14px
      }

      .price-old[_ngcontent-kan-c275] {
        font-size: var(--product-old-price-label-font-size);
        color: var(--font-color__grey);
        text-decoration: line-through
      }

      @media (max-width: 768px) {
        .price-old[_ngcontent-kan-c275] {
          font-size: 14px
        }
      }

      .price-old[_ngcontent-kan-c275] .currency[_ngcontent-kan-c275] {
        font-size: inherit;
        display: inline
      }

      .price-new[_ngcontent-kan-c275] {
        color: var(--product-price-label-color);
        margin-bottom: 3px
      }

      @media (max-width: 768px) {
        .price-new[_ngcontent-kan-c275] {
          font-size: 18px
        }
      }

      @media (min-width: 768px) {
        .price-new[_ngcontent-kan-c275] {
          flex-direction: unset;
          justify-content: space-between
        }
      }

      @media (max-width: 768px) {
        .price-new-only[_ngcontent-kan-c275] {
          font-size: var(--product-new-only-price-label-font-size);
          margin-top: 8px
        }
      }

      .promotion-wrapper[_ngcontent-kan-c275] {
        background: url(assets/images/yellow-discount-label.svg) no-repeat;
        background-size: 100%;
        display: inline-block;
        padding: .125rem 1rem 0 .5rem
      }

      .promotion-wrapper[_ngcontent-kan-c275] span[_ngcontent-kan-c275] {
        display: inline-block;
        max-width: 100%;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap
      }

      .promotion-wrapper[_ngcontent-kan-c275] .amount[_ngcontent-kan-c275] {
        line-height: 1
      }

      .promotion-wrapper[_ngcontent-kan-c275] .price-new[_ngcontent-kan-c275] {
        color: var(--product-price-new-label-color, var(--product-price-label-color))
      }

      .promotion-wrapper[_ngcontent-kan-c275] .price-new[_ngcontent-kan-c275] .currency[_ngcontent-kan-c275] {
        font-size: var(--product-old-price-label-font-size)
      }

      .promotion-wrapper[_ngcontent-kan-c275] .price-old[_ngcontent-kan-c275] .amount[_ngcontent-kan-c275] {
        display: block
      }

      .elektronik[_nghost-kan-c275],
      .elektronik [_nghost-kan-c275] {
        --product-price-label-color: var(--brandColorInfo700)
      }

      .hemen[_nghost-kan-c275],
      .hemen [_nghost-kan-c275] {
        --product-price-label-color: var(--basicColor900)
      }

      .yemek[_nghost-kan-c275] .promotion-wrapper[_ngcontent-kan-c275],
      .yemek [_nghost-kan-c275] .promotion-wrapper[_ngcontent-kan-c275] {
        background: none
      }

      .yemek[_nghost-kan-c275] .promotion-wrapper[_ngcontent-kan-c275] .price-old[_ngcontent-kan-c275] .amount[_ngcontent-kan-c275],
      .yemek [_nghost-kan-c275] .promotion-wrapper[_ngcontent-kan-c275] .price-old[_ngcontent-kan-c275] .amount[_ngcontent-kan-c275] {
        color: var(--basicColor500)
      }

      .yemek[_nghost-kan-c275] .price-new[_ngcontent-kan-c275] .amount[_ngcontent-kan-c275],
      .yemek [_nghost-kan-c275] .price-new[_ngcontent-kan-c275] .amount[_ngcontent-kan-c275] {
        color: var(--basicColor900);
        white-space: nowrap
      }

      @media (max-width: 992px) {

        .yemek[_nghost-kan-c275] .product-price[_ngcontent-kan-c275],
        .yemek [_nghost-kan-c275] .product-price[_ngcontent-kan-c275] {
          display: flex;
          flex-direction: row-reverse
        }
      }

      .unitPrice[_ngcontent-kan-c275] {
        color: var(--basicColor500);
        font-size: 10px;
        font-style: normal;
        font-weight: 600
      }

      .mion[_nghost-kan-c275] .price-new[_ngcontent-kan-c275] .amount[_ngcontent-kan-c275],
      .mion [_nghost-kan-c275] .price-new[_ngcontent-kan-c275] .amount[_ngcontent-kan-c275] {
        color: #141415
      }
    </style>
    <style>
      [_nghost-kan-c345] {
        display: block
      }

      .product-actions[_ngcontent-kan-c345] {
        display: inline-flex;
        align-items: center;
        border: 1px solid var(--basicColor100);
        border-radius: 5px;
        overflow: hidden;
        touch-action: manipulation
      }

      .product-actions[_ngcontent-kan-c345] button[_ngcontent-kan-c345] {
        background-color: var(--basicColor100);
        border: none;
        outline: 0;
        padding: .5rem;
        align-items: center;
        display: flex;
        cursor: pointer
      }

      .product-actions[_ngcontent-kan-c345] button[_ngcontent-kan-c345] fa-icon[_ngcontent-kan-c345] {
        font-size: .75rem
      }

      .product-actions[_ngcontent-kan-c345] .product-amount[_ngcontent-kan-c345] {
        padding: 0 .25rem;
        text-align: center;
        line-height: 1.25;
        width: 2rem
      }

      .product-actions[_ngcontent-kan-c345] .product-amount[_ngcontent-kan-c345] .amount[_ngcontent-kan-c345],
      .product-actions[_ngcontent-kan-c345] .product-amount[_ngcontent-kan-c345] .unit[_ngcontent-kan-c345] {
        display: block
      }

      .product-actions[_ngcontent-kan-c345] .product-amount[_ngcontent-kan-c345] .unit[_ngcontent-kan-c345] {
        font-size: .625rem
      }

      .add-to-cart-button[_ngcontent-kan-c345] {
        cursor: pointer;
        color: #fff;
        background-color: var(--brandColorPrimary700);
        text-align: center;
        align-self: flex-end;
        border-radius: 5px;
        box-shadow: 0 2px 10px #00000047;
        padding: .25rem .5rem
      }

      .add-to-cart-button.disabled[_ngcontent-kan-c345] {
        background-color: var(--basicColor300);
        cursor: not-allowed;
        pointer-events: none
      }

      .product-detail-add[_ngcontent-kan-c345] {
        height: 3.15rem;
        min-width: 10.8rem
      }

      .hemen[_nghost-kan-c345] .add-to-cart-button[_ngcontent-kan-c345],
      .hemen [_nghost-kan-c345] .add-to-cart-button[_ngcontent-kan-c345] {
        background-color: var(--basicColor900)
      }

      .yemek[_nghost-kan-c345] .product-actions[_ngcontent-kan-c345],
      .yemek [_nghost-kan-c345] .product-actions[_ngcontent-kan-c345] {
        background: var(--background-color__LIGHTER);
        border: 1px solid var(--brandColorYemek700);
        border-radius: .25rem
      }

      .yemek[_nghost-kan-c345] .product-decrease[_ngcontent-kan-c345],
      .yemek [_nghost-kan-c345] .product-decrease[_ngcontent-kan-c345],
      .yemek[_nghost-kan-c345] .product-increase[_ngcontent-kan-c345],
      .yemek [_nghost-kan-c345] .product-increase[_ngcontent-kan-c345] {
        background-color: var(--brandColorYemek50);
        color: var(--brandColorYemek700)
      }

      .yemek[_nghost-kan-c345] .product-amount[_ngcontent-kan-c345] span[_ngcontent-kan-c345]:last-of-type,
      .yemek [_nghost-kan-c345] .product-amount[_ngcontent-kan-c345] span[_ngcontent-kan-c345]:last-of-type {
        display: none
      }

      .mion[_nghost-kan-c345] .add-to-cart-button[_ngcontent-kan-c345],
      .mion [_nghost-kan-c345] .add-to-cart-button[_ngcontent-kan-c345] {
        background-color: var(--basicColor900);
        color: var(--basicColorYellow)
      }

      .mion[_nghost-kan-c345] .product-decrease[_ngcontent-kan-c345],
      .mion [_nghost-kan-c345] .product-decrease[_ngcontent-kan-c345],
      .mion[_nghost-kan-c345] .product-increase[_ngcontent-kan-c345],
      .mion [_nghost-kan-c345] .product-increase[_ngcontent-kan-c345] {
        background-color: var(--basicColor300) !important
      }

      .mion[_nghost-kan-c345] .product-decrease[_ngcontent-kan-c345] fa-icon[_ngcontent-kan-c345],
      .mion [_nghost-kan-c345] .product-decrease[_ngcontent-kan-c345] fa-icon[_ngcontent-kan-c345],
      .mion[_nghost-kan-c345] .product-increase[_ngcontent-kan-c345] fa-icon[_ngcontent-kan-c345],
      .mion [_nghost-kan-c345] .product-increase[_ngcontent-kan-c345] fa-icon[_ngcontent-kan-c345] {
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

      sm-product-detail-page {
        display: block
      }

      @media (max-width: 768px) {
        sm-product-detail-page {
          margin-bottom: 5rem
        }
      }

      sm-product-detail-page fe-breadcrumb {
        margin-bottom: .75rem
      }

      sm-product-detail-page fe-breadcrumb .breadcrumbs__item:last-child a {
        color: var(--basicColor900) !important
      }

      sm-product-detail-page .product-detail-page {
        padding: .75rem 1rem
      }

      @media (min-width: 1200px) {
        sm-product-detail-page .product-detail-page {
          padding: .75rem 7rem
        }
      }

      @media (min-width: 1440px) {
        sm-product-detail-page .product-detail-page {
          padding: .75rem 11rem
        }
      }

      @media (min-width: 1600px) {
        sm-product-detail-page .product-detail-page {
          padding: .75rem 11rem
        }
      }

      @media (min-width: 1800px) {
        sm-product-detail-page .product-detail-page {
          padding: .75rem 18rem
        }
      }

      sm-product-detail-page .product-detail-page .free-banner-wrapper {
        width: 100%;
        margin: 2rem 0
      }

      sm-product-detail-page .product-detail-page .free-banner-wrapper div {
        transform-origin: 0 0;
        width: -moz-fit-content;
        width: fit-content
      }

      sm-product-detail-page .product-detail-wrapper {
        margin-bottom: 1.75rem
      }

      @media (min-width: 768px) {
        sm-product-detail-page .product-detail-wrapper {
          display: flex
        }
      }

      sm-product-detail-page .product-detail-wrapper .product-details {
        flex-grow: 1;
        padding: .75rem;
        border-radius: 8px;
        border: solid 1px rgba(0, 0, 0, .12);
        height: 100%;
        margin-top: 1rem
      }

      @media (min-width: 768px) {
        sm-product-detail-page .product-detail-wrapper .product-details {
          width: 100%;
          margin-left: 1.75rem;
          margin-top: 0
        }
      }

      sm-product-detail-page .product-detail-wrapper .product-details h3 {
        margin-bottom: .75rem
      }

      sm-product-detail-page .product-detail-wrapper .product-details fe-product-discounts fe-crm-discount-badge {
        margin: .5rem 0
      }

      sm-product-detail-page .product-detail-wrapper .product-details .product-detail__badge {
        display: inline-flex;
        flex-wrap: wrap;
        grid-column-gap: .5rem;
        grid-row-gap: .5rem;
        grid-auto-flow: column;
        padding: 1rem 0
      }

      sm-product-detail-page .product-detail-wrapper .product-details .product-detail__badge .product-detail__badge-item {
        display: flex;
        padding: .813rem;
        border-radius: 5px;
        border: solid 1px var(--basicColor300);
        box-shadow: 0 -2px 15px #0000000f
      }

      sm-product-detail-page .product-detail-wrapper .product-details .product-detail__badge .product-detail__badge-item img {
        width: 32px;
        height: 32px;
        margin-bottom: 2px;
        margin-right: 5px
      }

      sm-product-detail-page .product-detail-wrapper .product-details .product-detail__badge .product-detail__badge-item .attribute-tag-label {
        align-self: center
      }

      sm-product-detail-page .product-detail-wrapper .product-details .brand-name,
      sm-product-detail-page .product-detail-wrapper .product-details fe-product-price {
        display: flex;
        margin-bottom: .75rem;
        gap: .5rem
      }

      sm-product-detail-page .product-detail-wrapper .product-details .price {
        display: block;
        margin-bottom: 1rem
      }

      @media (min-width: 768px) {
        sm-product-detail-page .product-detail-wrapper .product-details .price {
          display: flex;
          justify-content: space-between;
          margin-bottom: 0
        }
      }

      sm-product-detail-page .product-detail-wrapper .product-details .tamim-discount {
        background-color: var(--systemColorSuccess50);
        width: -moz-fit-content;
        width: fit-content;
        height: -moz-fit-content;
        height: fit-content;
        padding: .688rem 1.063rem .563rem 1.188rem;
        border-radius: 4px
      }

      @media (max-width: 768px) {
        sm-product-detail-page .product-detail-wrapper .product-details .tamim-discount {
          width: 100%;
          display: block;
          text-align: center
        }
      }

      sm-product-detail-page .product-detail-wrapper .product-details .unit-wrapper {
        margin-top: .75rem;
        display: block
      }

      sm-product-detail-page .product-detail-wrapper .product-details .unit-wrapper .unit {
        text-transform: capitalize
      }

      sm-product-detail-page .product-detail-wrapper .product-details .unit-wrapper .mat-mdc-radio-button .mdc-radio {
        padding: 0 .25rem 0 0
      }

      sm-product-detail-page .product-detail-wrapper .product-details .unit-wrapper mat-radio-button+mat-radio-button {
        margin-left: .5rem
      }

      sm-product-detail-page .product-detail-wrapper .product-details .unit-wrapper mat-radio-group {
        margin-bottom: 1rem;
        display: block
      }

      sm-product-detail-page .product-detail-wrapper .product-details .actions {
        display: inline-flex
      }

      sm-product-detail-page .product-detail-wrapper .product-details .actions .stock-out {
        padding: .813rem;
        border-radius: 5px;
        border: solid 1px var(--basicColor300)
      }

      sm-product-detail-page .product-detail-wrapper .product-details .actions .favourite {
        width: 3.125rem;
        height: 3.125rem;
        padding: .813rem;
        border-radius: 5px;
        border: solid 1px var(--basicColor300);
        font-size: 1.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        margin-left: 1rem
      }

      sm-product-detail-page .product-detail-wrapper .product-details .actions .favourite--empty {
        color: var(--basicColor400)
      }

      sm-product-detail-page .product-detail-wrapper .product-details .actions .favourite--full {
        color: var(--brandColorError600)
      }

      sm-product-detail-page .product-detail-wrapper .product-details mat-divider {
        margin: 0 -12px
      }

      sm-product-detail-page .product-detail-wrapper .product-details mat-divider.last {
        margin-top: 1rem
      }

      sm-product-detail-page .product-detail-wrapper .product-details .general-info-wrapper {
        color: var(--basicColor600);
        font-size: .75rem;
        margin-bottom: -.75rem;
        padding: .75rem;
        padding-bottom: 0
      }

      sm-product-detail-page .product-detail-wrapper .product-details .general-info-wrapper .info-line {
        padding-bottom: .75rem
      }

      sm-product-detail-page .product-detail-wrapper .product-details .general-info-wrapper .dot {
        width: .4rem;
        height: .4rem;
        border-radius: 50%;
        background: var(--brandColorPrimary700);
        display: inline-block;
        margin-right: .25rem
      }

      sm-product-detail-page .product-tabs-wrapper {
        margin-top: 2.5rem;
        border-radius: 8px;
        border: solid 1px rgba(0, 0, 0, .12)
      }

      sm-product-detail-page .product-tabs-wrapper fe-product-detail-tabs .mat-tab-label-active {
        color: var(--brandColorPrimary600) !important
      }

      sm-product-detail-page .product-tabs-wrapper fe-product-detail-tabs .mat-ink-bar {
        background-color: var(--brandColorPrimary600) !important
      }

      sm-product-detail-page .product-tabs-wrapper fe-product-detail-tabs .mat-tab-label .mat-tab-label-content {
        font-size: .875rem !important
      }

      sm-product-detail-page .product-tabs-wrapper fe-product-detail-tabs .mat-tab-list {
        width: 0
      }

      sm-product-detail-page .product-tabs-wrapper fe-product-detail-tabs .mdc-tab {
        padding-right: .5rem;
        padding-left: .5rem;
        min-width: 7rem !important
      }

      sm-product-detail-page .product-tabs-wrapper fe-product-detail-tabs iframe {
        width: 100%;
        height: 500px
      }

      @media (max-width: 768px) {
        sm-product-detail-page .product-tabs-wrapper fe-product-detail-tabs iframe {
          height: 10rem
        }
      }

      @media (min-width: 768px) {
        sm-product-detail-page .product-tabs-wrapper fe-product-detail-tabs .nutrition-wrapper {
          display: grid;
          grid-template-columns: 1fr 1fr;
          grid-column-gap: 2.25rem
        }
      }

      sm-product-detail-page .product-tabs-wrapper fe-product-detail-tabs .nutrition-wrapper table {
        border-radius: 8px;
        border: solid 1px var(--basicColor200)
      }

      @media (max-width: 768px) {
        sm-product-detail-page .product-tabs-wrapper fe-product-detail-tabs .nutrition-wrapper table {
          margin-bottom: 1rem
        }
      }

      sm-product-detail-page .product-tabs-wrapper fe-product-detail-tabs .nutrition-wrapper table th {
        background: var(--basicColor200)
      }

      sm-product-detail-page .product-tabs-wrapper fe-product-detail-tabs .nutrition-wrapper table .mat-mdc-cell {
        font-size: .875rem
      }

      sm-product-detail-page .product-tabs-wrapper fe-product-detail-tabs .nutrition-wrapper table .mdc-data-table__row,
      sm-product-detail-page .product-tabs-wrapper fe-product-detail-tabs .nutrition-wrapper table .mdc-data-table__pagination {
        border-top-color: var(--basicColor200)
      }

      sm-product-detail-page .product-tabs-wrapper fe-product-detail-tabs .nutrition-wrapper .mdc-data-table__table {
        min-width: unset
      }

      sm-product-detail-page .product-tabs-wrapper fe-product-detail-tabs .nutrition-wrapper .explanation {
        background: rgba(251, 226, 76, .12);
        height: -moz-fit-content;
        height: fit-content;
        padding: 1rem;
        border-radius: 8px
      }

      sm-product-detail-page .product-tabs-wrapper fe-product-detail-tabs .nutrition-wrapper .explanation .description {
        font-size: .875rem
      }

      sm-product-detail-page .product-tabs-wrapper fe-product-detail-tabs .read-more__toggle {
        color: var(--brandColorPrimary500) !important
      }

      sm-product-detail-page .product-feedback {
        display: block;
        margin: 1rem 0 auto;
        text-align: center
      }

      sm-product-detail-page sm-product-note-popover {
        display: block
      }

      sm-product-detail-page sm-product-note-popover .edit {
        color: var(--systemColorSuccess600)
      }

      @media (max-width: 576px) {
        sm-product-detail-page sm-product-note-popover .popover-content {
          left: 0 !important
        }
      }

      sm-product-detail-page sm-product-actions .product-actions button {
        height: 3.15rem;
        padding: .75rem !important;
        background-color: var(--basicColor300) !important
      }

      sm-product-detail-page sm-product-actions .product-actions button fa-icon {
        font-size: 1.25rem !important
      }

      sm-product-detail-page sm-product-actions .product-actions .product-amount {
        width: 4.25rem !important
      }

      sm-product-detail-page sm-product-actions .product-actions .product-amount .unit {
        display: none !important
      }

      sm-product-detail-page sm-product-actions .product-actions .product-amount .amount {
        font-size: 1rem
      }

      sm-product-detail-page #dsa-category-id {
        margin: -1px;
        padding: 0;
        width: 1px;
        height: 1px;
        overflow: hidden;
        clip: rect(0 0 0 0);
        clip: rect(0, 0, 0, 0);
        position: absolute
      }

      sm-product-detail-page .mobile-header {
        position: fixed;
        width: 100%;
        top: 0;
        margin-left: -1rem;
        height: 4.35rem;
        padding: .5rem .813rem .625rem 1.125rem;
        background-color: var(--brandColorPrimary700);
        z-index: 1000
      }

      sm-product-detail-page fe-product-price {
        width: 100%
      }

      sm-product-detail-page fe-product-price .unitPrice {
        margin-top: 0 !important;
        align-self: flex-end;
        margin-bottom: 5px
      }

      sm-product-detail-page .sticky-add-button {
        position: fixed;
        bottom: 3.5rem;
        left: 0;
        z-index: 1000;
        display: flex;
        background-color: #fff;
        padding: 1rem;
        width: 100%
      }

      sm-product-detail-page .sticky-add-button.mobile-app-popup-is-open {
        bottom: 6.25rem
      }

      .mion sm-product-detail-page .product-detail-wrapper .product-details .actions .favourite--full {
        color: var(--basicColorPink)
      }

      .mion sm-product-detail-page a {
        color: var(--basicColorBlue)
      }

      .mion sm-product-detail-page a:hover {
        color: var(--brandColorMion700)
      }
    </style>

    <script async="" src="https://tags.bluekai.com/site/83669?ret=js&amp;limit=1"></script>
    <style>
      .breadcrumb[_ngcontent-kan-c400] {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: left;
        height: 3.5rem;
        background-color: var(--brandColorPrimary700);
        position: relative
      }

      .breadcrumb[_ngcontent-kan-c400] .content[_ngcontent-kan-c400] {
        width: 67%
      }

      .breadcrumb[_ngcontent-kan-c400] .content[_ngcontent-kan-c400] h3[_ngcontent-kan-c400] {
        margin: 0;
        color: var(--font-color__light)
      }

      .breadcrumb[_ngcontent-kan-c400] a[_ngcontent-kan-c400] {
        width: 17.5px;
        height: 30px
      }

      .breadcrumb[_ngcontent-kan-c400] a[_ngcontent-kan-c400] fa-icon[_ngcontent-kan-c400] {
        position: absolute;
        left: 1.125rem;
        color: var(--font-color__light);
        font-size: 1.25rem
      }

      .breadcrumb .hemen[_nghost-kan-c400] h3[_ngcontent-kan-c400],
      .hemen [_nghost-kan-c400] h3[_ngcontent-kan-c400],
      .breadcrumb .hemen[_nghost-kan-c400] a[_ngcontent-kan-c400] fa-icon[_ngcontent-kan-c400],
      .hemen [_nghost-kan-c400] a[_ngcontent-kan-c400] fa-icon[_ngcontent-kan-c400] {
        color: var(--basicColor900)
      }

      .breadcrumb .mion[_nghost-kan-c400] .breadcrumb[_ngcontent-kan-c400] a[_ngcontent-kan-c400] fa-icon[_ngcontent-kan-c400],
      .mion [_nghost-kan-c400] .breadcrumb[_ngcontent-kan-c400] a[_ngcontent-kan-c400] fa-icon[_ngcontent-kan-c400] {
        color: var(--basicColor900)
      }

      .breadcrumb .mion[_nghost-kan-c400] .content[_ngcontent-kan-c400] h3[_ngcontent-kan-c400],
      .mion [_nghost-kan-c400] .content[_ngcontent-kan-c400] h3[_ngcontent-kan-c400] {
        color: var(--basicColor900)
      }
    </style>
    <style>
      [_nghost-kan-c398] {
        position: relative;
        display: block
      }

      @media (max-width: 767.98px) {
        [_nghost-kan-c398] {
          white-space: nowrap;
          max-width: 90vw
        }
      }

      .breadcrumbs[_ngcontent-kan-c398] {
        margin: 0 0 .5rem;
        padding: 0
      }

      .breadcrumbs__item[_ngcontent-kan-c398] {
        display: inline;
        line-height: 15px
      }

      .breadcrumbs__item[_ngcontent-kan-c398]+li[_ngcontent-kan-c398]:before {
        content: "";
        display: inline-block;
        color: var(--font-color__black);
        background: url(assets/icons/right-chevron.svg) no-repeat center;
        width: 10px;
        height: 10px;
        margin: 0 10px;
        background-size: cover;
        vertical-align: middle
      }

      @media (max-width: 767.98px) {
        .breadcrumbs__item[_ngcontent-kan-c398]+li[_ngcontent-kan-c398]:before {
          margin: 0 .4rem
        }
      }

      .breadcrumbs__item[_ngcontent-kan-c398]:last-child a[_ngcontent-kan-c398] {
        color: var(--font-color__default);
        pointer-events: none
      }

      .breadcrumbs__link[_ngcontent-kan-c398] {
        font-family: var(--secondary-font-family);
        color: var(--background-color__DARK);
        font-size: 12px
      }

      .breadcrumbs--skeleton[_ngcontent-kan-c398] {
        vertical-align: middle
      }

      .breadcrumbs--skeleton[_ngcontent-kan-c398] span[_ngcontent-kan-c398] {
        width: 45px;
        height: 10px;
        background-color: var(--background-color__GREY);
        border-radius: var(--base-border-radius);
        display: inline-block
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

      sm-product-images {
        display: block;
        position: relative
      }

      sm-product-images .product-images {
        text-align: -webkit-center
      }

      @media (min-width: 768px) {
        sm-product-images .product-images {
          border: solid 1px rgba(0, 0, 0, .12);
          border-radius: 8px
        }
      }

      sm-product-images .product-images .preview-image-wrapper {
        width: 32rem;
        height: 32rem;
        position: relative;
        cursor: zoom-in;
        text-align: center;
        align-items: center;
        display: flex
      }

      sm-product-images .product-images .preview-image-wrapper .swiper-container .swiper-pagination-bullets {
        bottom: -5px
      }

      sm-product-images .product-images .preview-image-wrapper .swiper-container .swiper-pagination-bullets .swiper-pagination-bullet-active {
        background: var(--brandColorPrimary600)
      }

      @media (max-width: 768px) {
        sm-product-images .product-images .preview-image-wrapper {
          max-width: 20.5rem;
          margin-bottom: 1rem
        }
      }

      sm-product-images .product-images .preview-image-wrapper img {
        max-width: 100%;
        max-height: 28rem
      }

      sm-product-images .product-images-carousel-cells {
        margin-top: 1rem
      }

      sm-product-images .product-images-carousel-cell {
        margin-right: 0;
        display: inline-flex;
        cursor: pointer;
        border: solid 1px rgba(0, 0, 0, .12);
        width: 3.188rem;
        height: 3.188rem;
        border-radius: 7px;
        background-color: var(--basic-color-white)
      }

      sm-product-images .product-images-carousel-cell img {
        max-height: 2.875rem;
        margin: auto;
        display: block;
        border-radius: 8px
      }

      sm-product-images .product-images-carousel-cell+.product-images-carousel-cell {
        margin-left: 1rem
      }

      sm-product-images .product-images-carousel-cell--active {
        border: 2px solid var(--brandColorPrimary700)
      }

      sm-product-images .zoom-preview {
        background-size: 48rem 48rem;
        background-repeat: no-repeat;
        background-position: 0 0;
        background-color: #fff;
        width: 32rem;
        height: 32rem;
        border-radius: 8px;
        position: absolute;
        border: solid 1px rgba(0, 0, 0, .12);
        bottom: 30%;
        left: 100%;
        z-index: 99;
        animation: presence .3s ease-in-out
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
      [_nghost-kan-c408] {
        display: block
      }

      .product-discounts[_ngcontent-kan-c408] {
        display: flex;
        align-items: center
      }

      @supports (gap: 1rem) {
        .product-discounts[_ngcontent-kan-c408] {
          gap: 1rem
        }
      }

      @supports not (gap: 1rem) {
        .product-discounts[_ngcontent-kan-c408]>*[_ngcontent-kan-c408] {
          margin-right: 1rem !important
        }
      }

      .product-discounts[_ngcontent-kan-c408] .discount[_ngcontent-kan-c408] {
        cursor: pointer;
        display: flex;
        align-items: center;
        height: 4rem
      }

      .product-discounts[_ngcontent-kan-c408] .discount[_ngcontent-kan-c408] .title[_ngcontent-kan-c408],
      .product-discounts[_ngcontent-kan-c408] .discount[_ngcontent-kan-c408] fa-icon[_ngcontent-kan-c408] {
        margin-left: .75rem
      }

      .product-discounts[_ngcontent-kan-c408] .discount[_ngcontent-kan-c408]+.discount[_ngcontent-kan-c408] {
        margin-left: .5rem
      }

      .product-discounts[_ngcontent-kan-c408] .new-badge[_ngcontent-kan-c408] {
        display: flex;
        align-content: center;
        align-items: center;
        height: 4rem
      }

      .product-discounts[_ngcontent-kan-c408] .new-badge-content[_ngcontent-kan-c408] {
        border-radius: .5rem;
        padding: 0 .5rem;
        height: 2.7rem;
        display: flex;
        align-items: center
      }

      .product-discounts[_ngcontent-kan-c408] .cross-badge[_ngcontent-kan-c408] {
        padding: .125rem .375rem;
        border-radius: 4px;
        width: -moz-fit-content;
        width: fit-content;
        background-color: var(--systemColorSuccess600)
      }

      .product-discounts[_ngcontent-kan-c408] .discount-badge[_ngcontent-kan-c408] {
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

      .product-discounts[_ngcontent-kan-c408] .discount-badge--percent[_ngcontent-kan-c408] {
        font-size: .5rem;
        margin-right: 1px
      }

      .product-discounts[_ngcontent-kan-c408] .discount-badge--unit[_ngcontent-kan-c408] {
        font-size: .75rem
      }

      .product-discounts[_ngcontent-kan-c408] .discount-badge--label[_ngcontent-kan-c408] {
        letter-spacing: -.3px
      }

      .product-discounts[_ngcontent-kan-c408] .special-badge[_ngcontent-kan-c408] {
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

      .product-discounts[_ngcontent-kan-c408] .special-badge[_ngcontent-kan-c408] span[_ngcontent-kan-c408] {
        margin-top: 18%;
        display: inline-block
      }

      .product-discounts[_ngcontent-kan-c408] .delist-badge[_ngcontent-kan-c408] {
        height: 1.5rem;
        width: 10rem;
        background: var(--brandColorError600);
        border-radius: .5rem;
        text-align: center;
        line-height: 1.375rem
      }

      .product-discounts[_ngcontent-kan-c408] .delist-badge[_ngcontent-kan-c408] span[_ngcontent-kan-c408] {
        font-weight: 500;
        font-size: .75rem
      }
    </style>
    <style>
      @charset "UTF-8";

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

      fe-product-detail-tabs {
        display: block
      }

      fe-product-detail-tabs h3 {
        font-size: 22px;
        font-weight: var(--font-weight-bold)
      }

      fe-product-detail-tabs .product-detail-tabs__img {
        width: 100%
      }

      fe-product-detail-tabs .installment-description-container {
        display: flex
      }

      fe-product-detail-tabs .installment-description-container .installment-description {
        padding-left: .5rem
      }

      fe-product-detail-tabs .installment-container {
        display: flex;
        justify-content: space-between;
        color: var(--basicColor900);
        flex-wrap: wrap
      }

      @media (min-width: 768px) {
        fe-product-detail-tabs .installment-container {
          padding: 1.4rem 0 2rem
        }
      }

      fe-product-detail-tabs .installment-container .installment-wrapper {
        flex: 0 0 100%;
        border-radius: .5rem;
        border: 1px solid rgba(0, 0, 0, .12);
        text-align: center;
        overflow-x: auto;
        margin-top: .75rem
      }

      @media (min-width: 768px) {
        fe-product-detail-tabs .installment-container .installment-wrapper {
          flex: 0 0 32%;
          margin-top: 0
        }
      }

      fe-product-detail-tabs .installment-container .installment-wrapper img.GARANTI {
        width: 4.688rem;
        margin: .5rem 0 .25rem
      }

      @media (min-width: 992px) {
        fe-product-detail-tabs .installment-container .installment-wrapper img.GARANTI {
          width: 6.563rem;
          margin: .625rem 0 .438rem
        }
      }

      fe-product-detail-tabs .installment-container .installment-wrapper img.ISBANK {
        width: 4.813rem;
        margin: .688rem 0 .375rem
      }

      @media (min-width: 992px) {
        fe-product-detail-tabs .installment-container .installment-wrapper img.ISBANK {
          width: 7.175rem;
          margin: .75rem 0 .625rem
        }
      }

      fe-product-detail-tabs .installment-container .installment-wrapper img.YAPIKREDI {
        width: 4.75rem;
        margin: .875rem 0 .688rem
      }

      @media (min-width: 992px) {
        fe-product-detail-tabs .installment-container .installment-wrapper img.YAPIKREDI {
          width: 7.908rem;
          margin: 1.125rem 0 .875rem
        }
      }

      fe-product-detail-tabs .installment-container .installment-wrapper .mat-mdc-table thead {
        background-color: var(--basicColor200)
      }

      fe-product-detail-tabs .installment-container .installment-wrapper .mat-mdc-table thead .mdc-data-table__header-cell {
        color: var(--basicColor900);
        font-size: .75rem
      }

      @media (min-width: 992px) {
        fe-product-detail-tabs .installment-container .installment-wrapper .mat-mdc-table thead .mdc-data-table__header-cell {
          font-size: 1rem;
          padding: 0 1rem
        }
      }

      fe-product-detail-tabs .installment-container .installment-wrapper .mat-mdc-table thead .mdc-data-table__header-cell:first-of-type {
        text-align: center;
        padding-left: .5rem
      }

      fe-product-detail-tabs .installment-container .installment-wrapper .mat-mdc-table thead .mdc-data-table__header-cell:not(:first-of-type) {
        padding-left: 0
      }

      fe-product-detail-tabs .installment-container .installment-wrapper .mat-mdc-table tbody .mdc-data-table__cell {
        color: var(--basicColor900);
        font-size: .75rem
      }

      @media (min-width: 992px) {
        fe-product-detail-tabs .installment-container .installment-wrapper .mat-mdc-table tbody .mdc-data-table__cell {
          font-size: 1rem;
          padding: 0 1rem
        }
      }

      fe-product-detail-tabs .installment-container .installment-wrapper .mat-mdc-table tbody .mdc-data-table__cell:first-of-type {
        text-align: center;
        padding-left: .5rem
      }

      fe-product-detail-tabs .installment-container .installment-wrapper .mat-mdc-table tbody .mdc-data-table__cell:not(:first-of-type) {
        padding-left: 0
      }

      fe-product-detail-tabs .mat-tab-body-content {
        padding: 18px;
        font-family: var(--primary-font-family);
        font-size: smaller;
        line-height: 1.5
      }

      @media (max-width: 767.98px) {
        fe-product-detail-tabs .mat-tab-label {
          min-width: max-content
        }
      }

      fe-product-detail-tabs .mat-tab-label .mat-tab-label-content {
        font-family: var(--secondary-font-family);
        font-size: 14px
      }

      @media (min-width: 768px) {
        fe-product-detail-tabs .mat-tab-label .mat-tab-label-content {
          font-size: 18px
        }
      }

      fe-product-detail-tabs .mat-tab-label-active {
        opacity: 1 !important
      }

      fe-product-detail-tabs .mat-tab-label-active .mat-tab-label-content {
        color: var(--secondary-color__500);
        font-weight: var(--font-weight-bold)
      }

      fe-product-detail-tabs fe-read-more div p {
        margin: 0
      }

      fe-product-detail-tabs fe-read-more div ul {
        margin: 0;
        padding: 0
      }

      fe-product-detail-tabs fe-read-more div ul li p {
        display: inline-block
      }

      fe-product-detail-tabs fe-read-more div ul li:before {
        content: "\2022";
        color: var(--secondary-color__500);
        font-weight: var(--font-weight-bold);
        display: inline-block;
        width: 1em
      }

      fe-product-detail-tabs .product-tab-images {
        text-align: center;
        margin-top: 1rem;
        margin-bottom: .5rem
      }

      fe-product-detail-tabs .product-tab-images img {
        max-width: 100%;
        max-height: 28rem
      }

      fe-product-detail-tabs .preview-image-wrapper {
        cursor: zoom-in
      }

      fe-product-detail-tabs .zoom-preview {
        background-size: 28rem 56rem;
        background-repeat: no-repeat;
        background-position: 0 0;
        background-color: #fff;
        width: 25rem;
        height: 25rem;
        border-radius: 8px;
        position: absolute;
        border: solid 1px rgba(0, 0, 0, .12);
        top: 5%;
        right: 10%;
        z-index: 99;
        animation: presence .3s ease-in-out
      }
    </style>
    <style>
      .mat-tab-group {
        display: flex;
        flex-direction: column;
        max-width: 100%
      }

      .mat-tab-group.mat-tab-group-inverted-header {
        flex-direction: column-reverse
      }

      .mat-tab-label {
        height: 48px;
        padding: 0 24px;
        cursor: pointer;
        box-sizing: border-box;
        opacity: .6;
        min-width: 160px;
        text-align: center;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        white-space: nowrap;
        position: relative
      }

      .mat-tab-label:focus {
        outline: none
      }

      .mat-tab-label:focus:not(.mat-tab-disabled) {
        opacity: 1
      }

      .mat-tab-label.mat-tab-disabled {
        cursor: default
      }

      .cdk-high-contrast-active .mat-tab-label.mat-tab-disabled {
        opacity: .5
      }

      .mat-tab-label .mat-tab-label-content {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        white-space: nowrap
      }

      .cdk-high-contrast-active .mat-tab-label {
        opacity: 1
      }

      @media(max-width: 599px) {
        .mat-tab-label {
          padding: 0 12px
        }
      }

      @media(max-width: 959px) {
        .mat-tab-label {
          padding: 0 12px
        }
      }

      .mat-tab-group[mat-stretch-tabs]>.mat-tab-header .mat-tab-label {
        flex-basis: 0;
        flex-grow: 1
      }

      .mat-tab-body-wrapper {
        position: relative;
        overflow: hidden;
        display: flex;
        transition: height 500ms cubic-bezier(0.35, 0, 0.25, 1)
      }

      .mat-tab-body-wrapper._mat-animation-noopable {
        transition: none !important;
        animation: none !important
      }

      .mat-tab-body {
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

      .mat-tab-body.mat-tab-body-active {
        position: relative;
        overflow-x: hidden;
        overflow-y: auto;
        z-index: 1;
        flex-grow: 1
      }

      .mat-tab-group.mat-tab-group-dynamic-height .mat-tab-body.mat-tab-body-active {
        overflow-y: hidden
      }
    </style>
    <style>
      .mat-tab-header {
        display: flex;
        overflow: hidden;
        position: relative;
        flex-shrink: 0
      }

      .mat-tab-header-pagination {
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

      .mat-tab-header-pagination::-moz-focus-inner {
        border: 0
      }

      .mat-tab-header-pagination-controls-enabled .mat-tab-header-pagination {
        display: flex
      }

      .mat-tab-header-pagination-before,
      .mat-tab-header-rtl .mat-tab-header-pagination-after {
        padding-left: 4px
      }

      .mat-tab-header-pagination-before .mat-tab-header-pagination-chevron,
      .mat-tab-header-rtl .mat-tab-header-pagination-after .mat-tab-header-pagination-chevron {
        transform: rotate(-135deg)
      }

      .mat-tab-header-rtl .mat-tab-header-pagination-before,
      .mat-tab-header-pagination-after {
        padding-right: 4px
      }

      .mat-tab-header-rtl .mat-tab-header-pagination-before .mat-tab-header-pagination-chevron,
      .mat-tab-header-pagination-after .mat-tab-header-pagination-chevron {
        transform: rotate(45deg)
      }

      .mat-tab-header-pagination-chevron {
        border-style: solid;
        border-width: 2px 2px 0 0;
        height: 8px;
        width: 8px
      }

      .mat-tab-header-pagination-disabled {
        box-shadow: none;
        cursor: default
      }

      .mat-tab-list {
        flex-grow: 1;
        position: relative;
        transition: transform 500ms cubic-bezier(0.35, 0, 0.25, 1)
      }

      .mat-ink-bar {
        position: absolute;
        bottom: 0;
        height: 2px;
        transition: 500ms cubic-bezier(0.35, 0, 0.25, 1)
      }

      .mat-ink-bar._mat-animation-noopable {
        transition: none !important;
        animation: none !important
      }

      .mat-tab-group-inverted-header .mat-ink-bar {
        bottom: auto;
        top: 0
      }

      .cdk-high-contrast-active .mat-ink-bar {
        outline: solid 2px;
        height: 0
      }

      .mat-tab-labels {
        display: flex
      }

      [mat-align-tabs=center]>.mat-tab-header .mat-tab-labels {
        justify-content: center
      }

      [mat-align-tabs=end]>.mat-tab-header .mat-tab-labels {
        justify-content: flex-end
      }

      .mat-tab-label-container {
        display: flex;
        flex-grow: 1;
        overflow: hidden;
        z-index: 1
      }

      .mat-tab-list._mat-animation-noopable {
        transition: none !important;
        animation: none !important
      }

      .mat-tab-label {
        height: 48px;
        padding: 0 24px;
        cursor: pointer;
        box-sizing: border-box;
        opacity: .6;
        min-width: 160px;
        text-align: center;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        white-space: nowrap;
        position: relative
      }

      .mat-tab-label:focus {
        outline: none
      }

      .mat-tab-label:focus:not(.mat-tab-disabled) {
        opacity: 1
      }

      .mat-tab-label.mat-tab-disabled {
        cursor: default
      }

      .cdk-high-contrast-active .mat-tab-label.mat-tab-disabled {
        opacity: .5
      }

      .mat-tab-label .mat-tab-label-content {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        white-space: nowrap
      }

      .cdk-high-contrast-active .mat-tab-label {
        opacity: 1
      }

      .mat-tab-label::before {
        margin: 5px
      }

      @media(max-width: 599px) {
        .mat-tab-label {
          min-width: 72px
        }
      }
    </style>
    <style>
      .read-more[_ngcontent-kan-c272] {
        overflow: hidden;
        display: block
      }

      .read-more__toggle[_ngcontent-kan-c272] {
        cursor: pointer;
        color: var(--primary-color__500);
        background: linear-gradient(-180deg, rgba(255, 255, 255, 0) 0%, white 43%);
        margin-top: -25px;
        position: relative;
        display: block;
        padding-top: 30px
      }
    </style>
    <style>
      .mdc-data-table {
        border-radius: var(--mdc-shape-medium, 4px);
        border-width: 1px;
        border-style: solid;
        -webkit-overflow-scrolling: touch;
        display: inline-flex;
        flex-direction: column;
        box-sizing: border-box;
        position: relative
      }

      .mdc-data-table .mdc-data-table__header-cell:first-child {
        border-top-left-radius: var(--mdc-shape-medium, 4px)
      }

      [dir=rtl] .mdc-data-table .mdc-data-table__header-cell:first-child,
      .mdc-data-table .mdc-data-table__header-cell:first-child[dir=rtl] {
        border-top-right-radius: var(--mdc-shape-medium, 4px);
        border-top-left-radius: 0
      }

      .mdc-data-table .mdc-data-table__header-cell:last-child {
        border-top-right-radius: var(--mdc-shape-medium, 4px)
      }

      [dir=rtl] .mdc-data-table .mdc-data-table__header-cell:last-child,
      .mdc-data-table .mdc-data-table__header-cell:last-child[dir=rtl] {
        border-top-left-radius: var(--mdc-shape-medium, 4px);
        border-top-right-radius: 0
      }

      .mdc-data-table.mdc-data-table--without-footer .mdc-data-table__row:last-child .mdc-data-table__cell:first-child {
        border-bottom-left-radius: var(--mdc-shape-medium, 4px)
      }

      [dir=rtl] .mdc-data-table.mdc-data-table--without-footer .mdc-data-table__row:last-child .mdc-data-table__cell:first-child,
      .mdc-data-table.mdc-data-table--without-footer .mdc-data-table__row:last-child .mdc-data-table__cell:first-child[dir=rtl] {
        border-bottom-right-radius: var(--mdc-shape-medium, 4px);
        border-bottom-left-radius: 0
      }

      .mdc-data-table.mdc-data-table--without-footer .mdc-data-table__row:last-child .mdc-data-table__cell:last-child {
        border-bottom-right-radius: var(--mdc-shape-medium, 4px)
      }

      [dir=rtl] .mdc-data-table.mdc-data-table--without-footer .mdc-data-table__row:last-child .mdc-data-table__cell:last-child,
      .mdc-data-table.mdc-data-table--without-footer .mdc-data-table__row:last-child .mdc-data-table__cell:last-child[dir=rtl] {
        border-bottom-left-radius: var(--mdc-shape-medium, 4px);
        border-bottom-right-radius: 0
      }

      .mdc-data-table__cell,
      .mdc-data-table__header-cell {
        border-bottom-width: 1px;
        border-bottom-style: solid
      }

      .mdc-data-table__pagination {
        border-top-width: 1px;
        border-top-style: solid
      }

      .mdc-data-table__row:last-child .mdc-data-table__cell {
        border-bottom: none
      }

      .mdc-data-table__row {
        height: 52px
      }

      .mdc-data-table__pagination {
        min-height: 52px
      }

      .mdc-data-table__header-row {
        height: 56px
      }

      .mdc-data-table__cell,
      .mdc-data-table__header-cell {
        padding: 0 16px 0 16px
      }

      .mdc-data-table__header-cell--checkbox,
      .mdc-data-table__cell--checkbox {
        padding-left: 4px;
        padding-right: 0
      }

      [dir=rtl] .mdc-data-table__header-cell--checkbox,
      [dir=rtl] .mdc-data-table__cell--checkbox,
      .mdc-data-table__header-cell--checkbox[dir=rtl],
      .mdc-data-table__cell--checkbox[dir=rtl] {
        padding-left: 0;
        padding-right: 4px
      }

      .mdc-data-table__table-container {
        -webkit-overflow-scrolling: touch;
        overflow-x: auto;
        width: 100%
      }

      .mdc-data-table__table {
        min-width: 100%;
        border: 0;
        white-space: nowrap;
        border-spacing: 0;
        table-layout: fixed
      }

      .mdc-data-table__cell {
        box-sizing: border-box;
        overflow: hidden;
        text-align: left;
        text-overflow: ellipsis
      }

      [dir=rtl] .mdc-data-table__cell,
      .mdc-data-table__cell[dir=rtl] {
        text-align: right
      }

      .mdc-data-table__cell--numeric {
        text-align: right
      }

      [dir=rtl] .mdc-data-table__cell--numeric,
      .mdc-data-table__cell--numeric[dir=rtl] {
        text-align: left
      }

      .mdc-data-table__cell--checkbox {
        width: 1px
      }

      .mdc-data-table__header-cell {
        box-sizing: border-box;
        text-overflow: ellipsis;
        overflow: hidden;
        outline: none;
        text-align: left
      }

      [dir=rtl] .mdc-data-table__header-cell,
      .mdc-data-table__header-cell[dir=rtl] {
        text-align: right
      }

      .mdc-data-table__header-cell--checkbox {
        width: 1px
      }

      .mdc-data-table__header-cell--numeric {
        text-align: right
      }

      [dir=rtl] .mdc-data-table__header-cell--numeric,
      .mdc-data-table__header-cell--numeric[dir=rtl] {
        text-align: left
      }

      .mdc-data-table__sort-icon-button {
        width: 28px;
        height: 28px;
        padding: 2px;
        transform: rotate(0.0001deg);
        margin-left: 4px;
        margin-right: 0;
        opacity: 0
      }

      .mdc-data-table__sort-icon-button .mdc-icon-button__focus-ring {
        display: none
      }

      .mdc-data-table__sort-icon-button.mdc-ripple-upgraded--background-focused .mdc-icon-button__focus-ring,
      .mdc-data-table__sort-icon-button:not(.mdc-ripple-upgraded):focus .mdc-icon-button__focus-ring {
        display: block;
        max-height: 28px;
        max-width: 28px
      }

      @media screen and (forced-colors: active) {

        .mdc-data-table__sort-icon-button.mdc-ripple-upgraded--background-focused .mdc-icon-button__focus-ring,
        .mdc-data-table__sort-icon-button:not(.mdc-ripple-upgraded):focus .mdc-icon-button__focus-ring {
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

        .mdc-data-table__sort-icon-button.mdc-ripple-upgraded--background-focused .mdc-icon-button__focus-ring,
        .mdc-data-table__sort-icon-button:not(.mdc-ripple-upgraded):focus .mdc-icon-button__focus-ring {
          border-color: CanvasText
        }
      }

      @media screen and (forced-colors: active) {

        .mdc-data-table__sort-icon-button.mdc-ripple-upgraded--background-focused .mdc-icon-button__focus-ring::after,
        .mdc-data-table__sort-icon-button:not(.mdc-ripple-upgraded):focus .mdc-icon-button__focus-ring::after {
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

        .mdc-data-table__sort-icon-button.mdc-ripple-upgraded--background-focused .mdc-icon-button__focus-ring::after,
        .mdc-data-table__sort-icon-button:not(.mdc-ripple-upgraded):focus .mdc-icon-button__focus-ring::after {
          border-color: CanvasText
        }
      }

      .mdc-data-table__sort-icon-button.mdc-icon-button--reduced-size .mdc-icon-button__ripple {
        width: 28px;
        height: 28px;
        margin-top: 0px;
        margin-bottom: 0px;
        margin-right: 0px;
        margin-left: 0px
      }

      .mdc-data-table__sort-icon-button.mdc-icon-button--reduced-size.mdc-ripple-upgraded--background-focused .mdc-icon-button__focus-ring,
      .mdc-data-table__sort-icon-button.mdc-icon-button--reduced-size:not(.mdc-ripple-upgraded):focus .mdc-icon-button__focus-ring {
        max-height: 28px;
        max-width: 28px
      }

      .mdc-data-table__sort-icon-button .mdc-icon-button__touch {
        position: absolute;
        top: 50%;
        height: 28px;
        left: 50%;
        width: 28px;
        transform: translate(-50%, -50%)
      }

      [dir=rtl] .mdc-data-table__sort-icon-button,
      .mdc-data-table__sort-icon-button[dir=rtl] {
        margin-left: 0;
        margin-right: 4px
      }

      .mdc-data-table__header-cell--numeric .mdc-data-table__sort-icon-button {
        margin-left: 0;
        margin-right: 4px
      }

      [dir=rtl] .mdc-data-table__header-cell--numeric .mdc-data-table__sort-icon-button,
      .mdc-data-table__header-cell--numeric .mdc-data-table__sort-icon-button[dir=rtl] {
        margin-left: 4px;
        margin-right: 0
      }

      .mdc-data-table__header-cell--sorted-descending .mdc-data-table__sort-icon-button {
        transform: rotate(-180deg)
      }

      .mdc-data-table__sort-icon-button:focus,
      .mdc-data-table__header-cell:hover .mdc-data-table__sort-icon-button,
      .mdc-data-table__header-cell--sorted .mdc-data-table__sort-icon-button {
        opacity: 1
      }

      .mdc-data-table__header-cell-wrapper {
        align-items: center;
        display: inline-flex;
        vertical-align: middle
      }

      .mdc-data-table__header-cell--with-sort {
        cursor: pointer
      }

      .mdc-data-table__sort-status-label {
        clip: rect(1px, 1px, 1px, 1px);
        height: 1px;
        overflow: hidden;
        position: absolute;
        white-space: nowrap;
        width: 1px
      }

      .mdc-data-table--sticky-header .mdc-data-table__header-cell {
        position: sticky;
        top: 0;
        z-index: 1
      }

      mat-table {
        display: block
      }

      mat-header-row {
        min-height: 56px
      }

      mat-row,
      mat-footer-row {
        min-height: 48px
      }

      mat-row,
      mat-header-row,
      mat-footer-row {
        display: flex;
        border-width: 0;
        border-bottom-width: 1px;
        border-style: solid;
        align-items: center;
        box-sizing: border-box
      }

      mat-cell:first-of-type,
      mat-header-cell:first-of-type,
      mat-footer-cell:first-of-type {
        padding-left: 24px
      }

      [dir=rtl] mat-cell:first-of-type:not(:only-of-type),
      [dir=rtl] mat-header-cell:first-of-type:not(:only-of-type),
      [dir=rtl] mat-footer-cell:first-of-type:not(:only-of-type) {
        padding-left: 0;
        padding-right: 24px
      }

      mat-cell:last-of-type,
      mat-header-cell:last-of-type,
      mat-footer-cell:last-of-type {
        padding-right: 24px
      }

      [dir=rtl] mat-cell:last-of-type:not(:only-of-type),
      [dir=rtl] mat-header-cell:last-of-type:not(:only-of-type),
      [dir=rtl] mat-footer-cell:last-of-type:not(:only-of-type) {
        padding-right: 0;
        padding-left: 24px
      }

      mat-cell,
      mat-header-cell,
      mat-footer-cell {
        flex: 1;
        display: flex;
        align-items: center;
        overflow: hidden;
        word-wrap: break-word;
        min-height: inherit
      }

      .mat-mdc-table-sticky {
        position: sticky !important
      }

      .mat-mdc-table {
        table-layout: auto;
        white-space: normal
      }

      mat-row.mat-mdc-row,
      mat-header-row.mat-mdc-header-row,
      mat-footer-row.mat-mdc-footer-row {
        border-bottom: none
      }

      .mat-mdc-table tbody,
      .mat-mdc-table tfoot,
      .mat-mdc-table thead,
      .mat-mdc-cell,
      .mat-mdc-footer-cell,
      .mat-mdc-header-row,
      .mat-mdc-row,
      .mat-mdc-footer-row,
      .mat-mdc-table .mat-mdc-header-cell {
        background: inherit
      }

      .mat-mdc-table .mat-mdc-row:hover,
      .mat-mdc-table .mat-mdc-footer-row:hover {
        background-color: inherit
      }

      .mat-mdc-table mat-header-row.mat-mdc-header-row,
      .mat-mdc-table mat-row.mat-mdc-row,
      .mat-mdc-table mat-footer-row.mat-mdc-footer-cell {
        height: unset
      }

      mat-header-cell.mat-mdc-header-cell,
      mat-cell.mat-mdc-cell,
      mat-footer-cell.mat-mdc-footer-cell {
        align-self: stretch
      }
    </style>
    <style>
      .mat-tab-body-content {
        height: 100%;
        overflow: auto
      }

      .mat-tab-group-dynamic-height .mat-tab-body-content {
        overflow: hidden
      }

      .mat-tab-body-content[style*="visibility: hidden"] {
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

      .home-page-wrapper[_ngcontent-kan-c364] .mat-tab-group[_ngcontent-kan-c364] .mat-tab-header[_ngcontent-kan-c364] {
        display: none
      }

      .home-page-wrapper[_ngcontent-kan-c364] .section[_ngcontent-kan-c364] {
        margin-top: 3rem;
        position: relative
      }

      .home-page-wrapper[_ngcontent-kan-c364] .section.no-title[_ngcontent-kan-c364] {
        margin-top: 0
      }

      @media (max-width: 576px) {
        .home-page-wrapper[_ngcontent-kan-c364] .section[_ngcontent-kan-c364] {
          margin-top: 1rem
        }
      }

      .home-page-wrapper[_ngcontent-kan-c364] .section[_ngcontent-kan-c364] .section-title[_ngcontent-kan-c364] {
        margin-bottom: 1.25rem;
        font-size: 1.1rem
      }

      @media (max-width: 576px) {
        .home-page-wrapper[_ngcontent-kan-c364] .section[_ngcontent-kan-c364] .section-title[_ngcontent-kan-c364] {
          margin-bottom: .75rem;
          font-size: 1.1rem;
          padding: 0 1rem
        }
      }

      .home-page-wrapper[_ngcontent-kan-c364] .section[_ngcontent-kan-c364] .fade-out[_ngcontent-kan-c364] {
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
        .home-page-wrapper[_ngcontent-kan-c364] .section[_ngcontent-kan-c364] .fade-out[_ngcontent-kan-c364] {
          display: none
        }
      }

      .home-page-wrapper[_ngcontent-kan-c364] .section[_ngcontent-kan-c364] .fade-out.categories[_ngcontent-kan-c364] {
        bottom: 0;
        top: 50px
      }

      @media (min-width: 768px) {
        .home-page-wrapper[_ngcontent-kan-c364] .section[_ngcontent-kan-c364] .fade-out.categories[_ngcontent-kan-c364] {
          display: none
        }
      }

      .home-page-wrapper[_ngcontent-kan-c364] .section[_ngcontent-kan-c364] .horizontal-list-page-items-container[_ngcontent-kan-c364] {
        display: flex;
        overflow-y: scroll;
        scrollbar-width: none;
        -ms-overflow-style: none
      }

      .home-page-wrapper[_ngcontent-kan-c364] .section[_ngcontent-kan-c364] .horizontal-list-page-items-container[_ngcontent-kan-c364]::-webkit-scrollbar {
        width: 0;
        height: 0
      }

      .home-page-wrapper[_ngcontent-kan-c364] .section[_ngcontent-kan-c364] .horizontal-list-page-items-container.in-mat-tab-group[_ngcontent-kan-c364] {
        overflow-x: unset
      }

      .home-page-wrapper[_ngcontent-kan-c364] .section[_ngcontent-kan-c364] .horizontal-list-page-items-container[_ngcontent-kan-c364] sm-list-page-item[_ngcontent-kan-c364] {
        margin-right: .625rem
      }

      @media (max-width: 768px) {
        .home-page-wrapper[_ngcontent-kan-c364] .section[_ngcontent-kan-c364] .horizontal-list-page-items-container[_ngcontent-kan-c364] sm-list-page-item[_ngcontent-kan-c364] {
          margin-right: .5rem
        }
      }

      @media (max-width: 768px) {
        .home-page-wrapper[_ngcontent-kan-c364] .section[_ngcontent-kan-c364] .horizontal-list-page-items-container[_ngcontent-kan-c364] {
          padding: 0 0 0 1rem
        }
      }

      .home-page-wrapper[_ngcontent-kan-c364] .section[_ngcontent-kan-c364] .vertical-list-page-items-container[_ngcontent-kan-c364] {
        display: grid;
        grid-template-rows: 1fr 1fr 1fr 1fr;
        grid-auto-flow: column;
        gap: .75rem 0;
        overflow-y: scroll;
        scrollbar-width: none;
        -ms-overflow-style: none
      }

      .home-page-wrapper[_ngcontent-kan-c364] .section[_ngcontent-kan-c364] .vertical-list-page-items-container[_ngcontent-kan-c364]::-webkit-scrollbar {
        width: 0;
        height: 0
      }

      .home-page-wrapper[_ngcontent-kan-c364] .section[_ngcontent-kan-c364] .vertical-list-page-items-container.in-mat-tab-group[_ngcontent-kan-c364] {
        overflow-x: unset
      }

      .home-page-wrapper[_ngcontent-kan-c364] .section[_ngcontent-kan-c364] .vertical-list-page-items-container[_ngcontent-kan-c364] sm-list-page-item[_ngcontent-kan-c364] {
        margin-right: .625rem
      }

      @media (max-width: 768px) {
        .home-page-wrapper[_ngcontent-kan-c364] .section[_ngcontent-kan-c364] .vertical-list-page-items-container[_ngcontent-kan-c364] sm-list-page-item[_ngcontent-kan-c364] {
          margin-right: .5rem
        }
      }

      .home-page-wrapper[_ngcontent-kan-c364] .next-btn[_ngcontent-kan-c364] {
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
        .home-page-wrapper[_ngcontent-kan-c364] .next-btn[_ngcontent-kan-c364] {
          display: none
        }
      }

      .home-page-wrapper[_ngcontent-kan-c364] .next-btn[_ngcontent-kan-c364]:after {
        content: "";
        display: inline-block;
        height: .3em;
        width: .3em;
        border-style: solid;
        border-width: .05em .05em 0 0;
        transform: rotate(45deg)
      }

      .home-page-wrapper[_ngcontent-kan-c364] .next-btn[_ngcontent-kan-c364]:after {
        left: .4em;
        position: relative;
        font-size: 2rem;
        top: 1rem
      }

      .home-page-wrapper[_ngcontent-kan-c364] .prev-btn[_ngcontent-kan-c364] {
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
        .home-page-wrapper[_ngcontent-kan-c364] .prev-btn[_ngcontent-kan-c364] {
          display: none
        }
      }

      .home-page-wrapper[_ngcontent-kan-c364] .prev-btn[_ngcontent-kan-c364]:after {
        content: "";
        display: inline-block;
        height: .3em;
        width: .3em;
        border-style: solid;
        border-width: .05em .05em 0 0;
        transform: rotate(225deg)
      }

      .home-page-wrapper[_ngcontent-kan-c364] .prev-btn[_ngcontent-kan-c364]:after {
        left: 1.15em;
        position: relative;
        font-size: 2rem;
        top: 1rem
      }

      [_nghost-kan-c364] sm-list-page-item {
        min-width: 10.25rem;
        max-width: 10.25rem
      }

      [_nghost-kan-c364] sm-list-page-item .mdc-card {
        border-radius: 8px
      }

      [_nghost-kan-c364] .mat-mdc-tab-group {
        flex-direction: row !important
      }

      [_nghost-kan-c364] .mat-mdc-tab-labels {
        flex-direction: column !important
      }

      [_nghost-kan-c364] .mat-mdc-tab {
        justify-content: start;
        padding-left: 1rem;
        margin-bottom: 1rem;
        margin-right: 6rem
      }

      [_nghost-kan-c364] .mdc-tab--active .mdc-tab-indicator {
        position: absolute;
        left: 0;
        bottom: 0;
        top: 0 !important;
        width: .3rem;
        height: 100%;
        background-color: var(--brandColorPrimary700)
      }

      [_nghost-kan-c364] .mdc-tab--active .mdc-tab-indicator__content {
        opacity: 0
      }

      [_nghost-kan-c364] .mdc-tab__text-label {
        margin: 0
      }

      [_nghost-kan-c364] .mat-mdc-tab-body-content {
        display: flex;
        gap: 1.5rem;
        overflow-y: scroll;
        scrollbar-width: none;
        -ms-overflow-style: none
      }

      [_nghost-kan-c364] .mat-mdc-tab-body-content .container-wrapper .fade-out {
        top: 0 !important
      }

      [_nghost-kan-c364] .mat-mdc-tab-body-content::-webkit-scrollbar {
        width: 0;
        height: 0
      }

      [_nghost-kan-c364] .mat-mdc-tab-body-wrapper {
        width: 100%
      }

      [_nghost-kan-c364] sm-special-discount-product-card.list-item>mat-card>fe-product-image {
        flex: unset
      }

      [_nghost-kan-c364] .vertical .mat-mdc-tab-body-wrapper {
        margin: auto;
        width: 20rem
      }

      @media (max-width: 768px) {
        [_nghost-kan-c364] .vertical .mat-mdc-tab-body-wrapper {
          width: 19rem
        }
      }

      [_nghost-kan-c364] .vertical .fade-out {
        display: none
      }

      [_nghost-kan-c364] .vertical .next-btn {
        display: block !important
      }

      [_nghost-kan-c364] .vertical .prev-btn {
        display: block !important
      }
    </style>
  </head>
  <body class="mat-typography">
    <sm-root _nghost-kan-c377="" ng-version="14.2.10">
      <div _ngcontent-kan-c377="" class="grid sanalmarket">
        <sm-header _ngcontent-kan-c377="">
          <div id="header-wrapper" class="header-wrapper sanalmarket">
            <sm-additonal-order _nghost-kan-c355="">
              <!---->
              <!---->
              <!---->
            </sm-additonal-order>
            <!---->
            <fe-swiper-banner fedeferload="" class="inline-banner">
              <!---->
            </fe-swiper-banner>
            <!---->
            <div class="header-top-wrapper">
              <div class="header-top">
                <a id="header-sanalmarket-tab" class="sanalmarket-logo-tab header-tab selected sanalmarket"></a>
                <a id="header-hemen-tab" class="hemen-logo-tab header-tab sanalmarket"></a>
                <!---->
                <a id="header-yemek-tab" class="yemek-logo-tab header-tab sanalmarket"></a>
                <!---->
                <a id="header-electronic-tab" class="elektronik-logo-tab header-tab sanalmarket"></a>
                <!---->
                <a id="header-mion-tab" class="mion-logo-tab header-tab sanalmarket"></a>
                <!---->
                <!---->
                <a id="header-tazedirekt-tab" class="tazedirekt-logo-tab header-tab sanalmarket"></a>
                <!---->
                <a id="header-macrocenter-tab" class="macrocenter-logo-tab header-tab sanalmarket"></a>
                <!---->
                <!---->
                <div class="anonymous">
                  <div class="login-signup-wrapper track-wrapper">
                    <div class="inner inner-track">
                      <div class="text mat-caption">Sipariş Takibi</div>
                      <div class="carrot">
                        <fa-icon class="ng-fa-icon">
                          <svg role="img" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" class="svg-inline--fa fa-chevron-right" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                            <path fill="currentColor" d="M342.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L274.7 256 105.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"></path>
                          </svg>
                        </fa-icon>
                      </div>
                    </div>
                  </div>
                  <!---->
                  <div class="login-signup-wrapper">
                    <div class="inner">
                      <div class="icon"></div>
                      <div class="text mat-caption">Üye Ol veya Giriş Yap</div>
                      <div class="carrot">
                        <fa-icon class="ng-fa-icon">
                          <svg role="img" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" class="svg-inline--fa fa-chevron-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor" d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"></path>
                          </svg>
                        </fa-icon>
                      </div>
                    </div>
                  </div>
                  <!---->
                </div>
                <!---->
                <!---->
                <!---->
              </div>
              <!---->
            </div>
            <div class="header-line sanalmarket"></div>
            <div class="header-middle">
              <sm-header-address-delivery-time _nghost-kan-c354="">
                <button _ngcontent-kan-c354="" id="delivery-options-search-bucket" class="delivery-options-search-bucket-wrapper">
                  <div _ngcontent-kan-c354="" class="delivery-options-wrapper">
                    <div _ngcontent-kan-c354="" class="choose-address-container">
                      <div _ngcontent-kan-c354="" class="choose-address">
                        <div _ngcontent-kan-c354="" class="icon-wrapper">
                          <fa-icon _ngcontent-kan-c354="" class="ng-fa-icon">
                            <svg role="img" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="location-dot" class="svg-inline--fa fa-location-dot" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                              <path fill="currentColor" d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 256c-35.3 0-64-28.7-64-64s28.7-64 64-64s64 28.7 64 64s-28.7 64-64 64z"></path>
                            </svg>
                          </fa-icon>
                        </div>
                        <div _ngcontent-kan-c354="" class="delivery-options-inner-text mat-caption">Teslimat Yöntemini Belirle</div>
                      </div>
                      <div _ngcontent-kan-c354="" class="icon-wrapper">
                        <fa-icon _ngcontent-kan-c354="" class="ng-fa-icon">
                          <svg role="img" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" class="svg-inline--fa fa-chevron-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor" d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"></path>
                          </svg>
                        </fa-icon>
                      </div>
                    </div>
                    <!---->
                    <!---->
                    <!---->
                  </div>
                </button>
                <!---->
                <!---->
                <!---->
                <!---->
              </sm-header-address-delivery-time>
              <!---->
              <!---->
              <div class="search-wrapper">
                <fe-product-search-combobox role="searchbox" _nghost-kan-c277="">
                  <div _ngcontent-kan-c277="" class="migros">
                    <input _ngcontent-kan-c277="" id="product-search-combobox--trigger" type="text" role="combobox" class="mat-autocomplete-trigger subtitle-2 ng-untouched ng-pristine ng-valid" placeholder="Bepanthol Krem Çeşitlerinde Money Fırsatı!" autocomplete="off" aria-autocomplete="list" aria-expanded="false" aria-haspopup="listbox">
                    <!---->
                    <div _ngcontent-kan-c277="" id="product-search-combobox-search-right-button" class="migros-search-right-button subtitle-2"> Ara </div>
                    <!---->
                    <mat-autocomplete _ngcontent-kan-c277="" id="product-search-combobox--panel" showpanel="false" class="">
                      <!---->
                    </mat-autocomplete>
                  </div>
                </fe-product-search-combobox>
                <!---->
              </div>
              <sm-cart-dropdown _nghost-kan-c348="">
                <div _ngcontent-kan-c348="">
                  <div _ngcontent-kan-c348="" id="homepage-cart-button" class="toggle-layer"></div>
                  <div _ngcontent-kan-c348="" feclickelsewhere="" class="dropdown-btn">
                    <div _ngcontent-kan-c348="" class="icon-cart-quantity-wrapper">
                      <div _ngcontent-kan-c348="" class="icon-cart"></div>
                      <div _ngcontent-kan-c348="" class="quantity">0</div>
                    </div>
                    <div _ngcontent-kan-c348="">
                      <div _ngcontent-kan-c348="" class="subtitle-2 text-color-black">Sepetim</div>
                      <div _ngcontent-kan-c348="" class="mat-caption price">0,00 TL</div>
                    </div>
                    <fa-icon _ngcontent-kan-c348="" class="ng-fa-icon text-color-black">
                      <svg role="img" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" class="svg-inline--fa fa-chevron-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor" d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"></path>
                      </svg>
                    </fa-icon>
                    <!---->
                  </div>
                </div>
              </sm-cart-dropdown>
              <!---->
            </div>
            <!---->
            <div class="header-bottom">
              <div class="tabs">
                <div class="tab mat-caption text-color-black">
                  <div class="categories-icon">
                    <div class="icon"></div>
                    <span>KATEGORİLER</span>
                  </div>
                  <!---->
                </div>
                <!---->
                <a id="header-campaign" class="tab mat-caption text-color-black campaings" href="/kampanyalar"> KAMPANYALAR
                  <!---->
                </a>
                <!---->
                <a id="header-migroskop" class="tab mat-caption text-color-black" href="/migroskop-urunleri-dt-3"> MİGROSKOP
                  <!---->
                </a>
                <!---->
                <a routerlink="/coklu-indirim-kampanyalari-ve-hediyeli-urunler-dt-1" id="header-multiple-discounts" class="tab mat-caption text-color-black" href="/coklu-indirim-kampanyalari-ve-hediyeli-urunler-dt-1"> ÇOKLU İNDİRİMLER
                  <!---->
                </a>
                <!---->
                <a hidden="" routerlink="/migros-sanal-markete-ozel-sansli-saatler-l-33d2357" id="header-lucky-hours" class="tab mat-caption text-color-black" href="/migros-sanal-markete-ozel-sansli-saatler-l-33d2357"> ŞANSLI SAATLER
                  <!---->
                </a>
                <a routerlink="/money-indirimli-market-urunleri-dt-5" id="header-money-discounts" class="tab mat-caption text-color-black" href="/money-indirimli-market-urunleri-dt-5"> MONEY İNDİRİMLİ
                  <!---->
                </a>
                <!---->
                <a routerlink="/gordugunuze-inanin-dt-2" hidden="" id="header-gor-inan" class="tab mat-caption text-color-black" href="/gordugunuze-inanin-dt-2"> GÖR İNAN
                  <!---->
                </a>
                <!---->
                <a routerlink="/hazir-sepet" id="header-fast-cart-tab" class="tab mat-caption text-color-black fast-cart-tab" hidden="" href="/hazir-sepet">
                  <div class="fast-cart-tab-wrapper">
                    <img src="assets/icons/fast-cart-icon.svg" alt="Hazır Sepet">
                    <span>HAZIR SEPET</span>
                    <!---->
                  </div>
                </a>
                <!---->
              </div>
              <!---->
            </div>
            <!---->
          </div>
          <!---->
        </sm-header>
        <!---->
        <!---->
        <!---->
        <!---->
        <!---->
        <main _ngcontent-kan-c377="" class="sanalmarket">
          <router-outlet _ngcontent-kan-c377=""></router-outlet>
          <sm-product>
            <article>
              <router-outlet></router-outlet>
              <sm-product-detail-page class="ng-star-inserted">
                <div class="product-detail-page ng-star-inserted">
                  <div id="dsa-category-id">
                    <div>20000000070651/20000000001090/20000000010253</div>
                  </div>
                  <fe-mobile-breadcrumb pagename="Ürün Detayı" class="mobile-header mobile-only" _nghost-kan-c400="">
                    <div _ngcontent-kan-c400="" class="breadcrumb mobile-only">
                      <a _ngcontent-kan-c400="">
                        <fa-icon _ngcontent-kan-c400="" class="ng-fa-icon">
                          <svg role="img" aria-hidden="true" focusable="false" data-prefix="far" data-icon="arrow-left" class="svg-inline--fa fa-arrow-left" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path fill="currentColor" d="M447.1 256c0 13.25-10.76 24.01-24.01 24.01H83.9l132.7 126.6c9.625 9.156 9.969 24.41 .8125 33.94c-9.156 9.594-24.34 9.938-33.94 .8125l-176-168C2.695 268.9 .0078 262.6 .0078 256S2.695 243.2 7.445 238.6l176-168C193 61.51 208.2 61.85 217.4 71.45c9.156 9.5 8.812 24.75-.8125 33.94l-132.7 126.6h340.1C437.2 232 447.1 242.8 447.1 256z"></path>
                          </svg>
                        </fa-icon>
                      </a>
                      <div _ngcontent-kan-c400="" class="content">
                        <h3 _ngcontent-kan-c400="">Ürün Detayı</h3>
                        <!---->
                      </div>
                    </div>
                  </fe-mobile-breadcrumb>
                  <div class="product-detail-wrapper">
                    <sm-product-images>
                      <div class="product-images">
                        <div class="preview-image-wrapper">
                          <swiper class="swiper-container swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events">
                            <!---->
                            <!---->
                            <!---->
                            <div class="swiper-wrapper" id="swiper-wrapper-1d5ad10c19695cc8b" aria-live="polite" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                              <!---->
                              <!---->
                              <div data-swiper-slide-index="0" class="swiper-slide ng-star-inserted swiper-slide-active" style="width: 448px;">
                                <!---->
                                <img src="<?php echo $urun["resim1"];?>">
                                <!---->
                                <!---->
                                <!---->
                              </div>
                              <!---->
                              <!---->
                              <!---->
                              <!---->
                            </div>
                            <!---->
                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                          </swiper>
                        </div>
                        <!---->
                      </div>
                      <!---->
                    </sm-product-images>
                    <div class="product-details">
                      <h3 class="text-color-black"><?php echo $urun["urunismi"];?></h3>
                      <a id="product-detail-brand-name" class="text-color-info subtitle-2 brand-name" ngx-ql="" href="/by-izzet-b-1115"> <?php echo $urun["urunismi"];?> </a>
                      <div class="price">
                        <fe-product-price _nghost-kan-c275="">
                          <div _ngcontent-kan-c275="">
                            <div _ngcontent-kan-c275="" id="price-old" class="price-old ng-star-inserted">
                              </span>
                            </div>
                            <!---->
                            <div _ngcontent-kan-c275="" id="price-new" class="price-new subtitle-1">
                              <span _ngcontent-kan-c275="" id="new-amount" class="amount"><?php echo $urun["fiyat"];?> <span _ngcontent-kan-c275="" class="currency">TL</span>
                              </span>
                            </div>
                          </div>
                          <!---->
                        </fe-product-price>
                        <!---->
                      </div>
                      <mat-divider role="separator" class="mat-divider mat-divider-horizontal" aria-orientation="horizontal"></mat-divider>
                      <fe-product-discounts _nghost-kan-c408="" class="ng-star-inserted">
                        <div _ngcontent-kan-c408="" class="product-discounts ng-star-inserted">
                          <fe-crm-discount-badge _ngcontent-kan-c408="" _nghost-kan-c343="">
                            <!---->
                          </fe-crm-discount-badge>
                          <div _ngcontent-kan-c408="" class="discount ng-star-inserted">
                            <div _ngcontent-kan-c408="" id="product-discounts-discount-badge" class="discount-badge">
                              <div _ngcontent-kan-c408="">
                                <span _ngcontent-kan-c408="" class="discount-badge--percent">%</span>
                                <span _ngcontent-kan-c408="" class="discount-badge--unit">13</span>
                              </div>
                              <div _ngcontent-kan-c408="" class="discount-badge--label">İNDİRİM</div>
                            </div>
                          </div>
                          <!---->
                          <!---->
                          <!---->
                          <!---->
                          <!---->
                        </div>
                        <!---->
                      </fe-product-discounts>
                      <mat-divider role="separator" class="mat-divider mat-divider-horizontal ng-star-inserted" aria-orientation="horizontal"></mat-divider>
                      <!---->
                      <!---->
                      <!---->
                      <!---->
                      <div class="unit-wrapper ng-star-inserted">
                       
                        <!---->
                        <!---->
                        <!---->
                      </div>
                      <!---->
                      <!---->
                  <div class="actions ng-star-inserted">
<sm-product-actions _nghost-kan-c345="">
    <!---->
    <!---->
    <a _ngcontent-kan-c345="" id="product-actions-add-button" href="sepet.php?id=<?php echo $urun["urunlink"];?>" class="product-detail-add mdc-button mdc-button--unelevated mat-mdc-unelevated-button mat-primary mat-mdc-button-base ng-star-inserted" style="text-decoration: none; color: white;">
        <span class="mat-mdc-button-persistent-ripple mdc-button__ripple"></span>
        <span class="mdc-button__label"> Sepete Ekle </span>
        <span class="mat-mdc-focus-indicator"></span>
        <span matripple="" class="mat-ripple mat-mdc-button-ripple"></span>
        <span class="mat-mdc-button-touch-target"></span>
    </a>
    <!---->
</sm-product-actions>


                        <fa-icon id="product-detail-favourite" class="ng-fa-icon favourite favourite--empty ng-star-inserted">
                          <svg role="img" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="heart" class="svg-inline--fa fa-heart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor" d="M255.1 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 0 232.4 0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84.02L255.1 96zM255.1 141.3L221.4 106.6C196.1 81.31 160 69.77 124.7 75.66C71.21 84.58 31.1 130.9 31.1 185.1V190.9C31.1 223.6 45.55 254.7 69.42 277L250.1 445.7C251.7 447.2 253.8 448 255.1 448C258.2 448 260.3 447.2 261.9 445.7L442.6 277C466.4 254.7 480 223.6 480 190.9V185.1C480 130.9 440.8 84.58 387.3 75.66C351.1 69.77 315.9 81.31 290.6 106.6L255.1 141.3z"></path>
                          </svg>
                        </fa-icon>
                        <!---->
                      </div>
                      <!---->
                      <!---->
                      <mat-divider role="separator" class="mat-divider last mat-divider-horizontal ng-star-inserted" aria-orientation="horizontal"></mat-divider>
                      <div class="general-info-wrapper ng-star-inserted">
                        <!---->
                        <!---->
                        <sm-product-info _nghost-kan-c409="" class="ng-star-inserted">
                          <div _ngcontent-kan-c409="" class="info-line">
                            <span _ngcontent-kan-c409="" class="dot"></span> Ürünün stok, fiyat ve kampanya bilgisi, teslimatı gerçekleştirecek mağazanın stok, fiyat ve kampanya bilgilerine göre belirlenmektedir.
                          </div>
                        </sm-product-info>
                        <!---->
                      </div>
                      <!---->
                      <!---->
                    </div>
                  </div>
                  <div class="product-detail-order-vwo">
                    <div id="product-tabs-order" class="product-tabs-wrapper ng-star-inserted">
                      <fe-product-detail-tabs>
                        <mat-tab-group dynamicheight="false" disableripple="true" animationduration="0ms" mat-align-tabs="start" class="mat-tab-group mat-primary">
                          <mat-tab-header class="mat-tab-header">
                            <button aria-hidden="true" type="button" mat-ripple="" tabindex="-1" class="mat-ripple mat-tab-header-pagination mat-tab-header-pagination-before mat-elevation-z4 mat-tab-header-pagination-disabled" disabled="">
                              <div class="mat-tab-header-pagination-chevron"></div>
                            </button>
                            <div class="mat-tab-label-container">
                              <div role="tablist" class="mat-tab-list" style="transform: translateX(0px);">
                                <div class="mat-tab-labels">
                                  <div role="tab" mattablabelwrapper="" mat-ripple="" cdkmonitorelementfocus="" class="mat-ripple mat-tab-label mat-focus-indicator mat-tab-label-active ng-star-inserted" id="mat-tab-label-2-0" tabindex="0" aria-posinset="1" aria-setsize="4" aria-controls="mat-tab-content-2-0" aria-selected="true" aria-disabled="false">
                                    <div class="mat-tab-label-content">Ürün Açıklaması
                                      <!---->
                                      <!---->
                                    </div>
                                  </div>
                                  <div role="tab" mattablabelwrapper="" mat-ripple="" cdkmonitorelementfocus="" class="mat-ripple mat-tab-label mat-focus-indicator ng-star-inserted" id="mat-tab-label-2-1" tabindex="-1" aria-posinset="2" aria-setsize="4" aria-controls="mat-tab-content-2-1" aria-selected="false" aria-disabled="false">
                                    <div class="mat-tab-label-content">
                                      <!---->
                                      <!---->
                                    </div>
                                  </div>
                                  <div role="tab" mattablabelwrapper="" mat-ripple="" cdkmonitorelementfocus="" class="mat-ripple mat-tab-label mat-focus-indicator ng-star-inserted" id="mat-tab-label-2-2" tabindex="-1" aria-posinset="3" aria-setsize="4" aria-controls="mat-tab-content-2-2" aria-selected="false" aria-disabled="false">
                                    <div class="mat-tab-label-content">
                                      <!---->
                                      <!---->
                                    </div>
                                  </div>
                                  <div role="tab" mattablabelwrapper="" mat-ripple="" cdkmonitorelementfocus="" class="mat-ripple mat-tab-label mat-focus-indicator ng-star-inserted" id="mat-tab-label-2-3" tabindex="-1" aria-posinset="4" aria-setsize="4" aria-controls="mat-tab-content-2-3" aria-selected="false" aria-disabled="false">
                                    <div class="mat-tab-label-content">
                                      <!---->
                                      <!---->
                                    </div>
                                  </div>
                                  <!---->
                                </div>
                                <mat-ink-bar class="mat-ink-bar" style="visibility: visible; left: 0px; width: 160px;"></mat-ink-bar>
                              </div>
                            </div>
                            <button aria-hidden="true" type="button" mat-ripple="" tabindex="-1" class="mat-ripple mat-tab-header-pagination mat-tab-header-pagination-after mat-elevation-z4 mat-tab-header-pagination-disabled" disabled="">
                              <div class="mat-tab-header-pagination-chevron"></div>
                            </button>
                          </mat-tab-header>
                          <div class="mat-tab-body-wrapper">
                            <mat-tab-body role="tabpanel" class="mat-tab-body ng-tns-c129-2 mat-tab-body-active ng-star-inserted" id="mat-tab-content-2-0" aria-labelledby="mat-tab-label-2-0">
                              <div cdkscrollable="" class="mat-tab-body-content ng-tns-c129-2 ng-trigger ng-trigger-translateTab" style="transform: none;">
                                <fe-read-more class="mobile-only ng-star-inserted" _nghost-kan-c272="" style="">
                                  <div _ngcontent-kan-c272="" class="read-more">
                                    <div _ngcontent-kan-c272="" style="height: auto;">
                                      <div class="product-description">
                                      <p> <?php echo $urun["hakkinda"];?> </p>
                                      </div>
                                    </div>
                                    <!---->
                                  </div>
                                </fe-read-more>
                                <!---->
                                <div class="product-description desktop-only ng-star-inserted" style="">
                                 <p> <?php echo $urun["hakkinda"];?> </p>
                                </div>
                                <!---->
                              </div>
                            </mat-tab-body>
                            <mat-tab-body role="tabpanel" class="mat-tab-body ng-tns-c129-3 ng-star-inserted" id="mat-tab-content-2-1" aria-labelledby="mat-tab-label-2-1">
                              <div cdkscrollable="" class="mat-tab-body-content ng-tns-c129-3 ng-trigger ng-trigger-translateTab" style="transform: translate3d(100%, 0px, 0px); min-height: 1px; visibility: hidden;">
                                <!---->
                              </div>
                            </mat-tab-body>
                            <mat-tab-body role="tabpanel" class="mat-tab-body ng-tns-c129-4 ng-star-inserted" id="mat-tab-content-2-2" aria-labelledby="mat-tab-label-2-2">
                              <div cdkscrollable="" class="mat-tab-body-content ng-tns-c129-4 ng-trigger ng-trigger-translateTab" style="transform: translate3d(100%, 0px, 0px); min-height: 1px; visibility: hidden;">
                                <!---->
                              </div>
                            </mat-tab-body>
                            <mat-tab-body role="tabpanel" class="mat-tab-body ng-tns-c129-5 ng-star-inserted" id="mat-tab-content-2-3" aria-labelledby="mat-tab-label-2-3">
                              <div cdkscrollable="" class="mat-tab-body-content ng-tns-c129-5 ng-trigger ng-trigger-translateTab" style="transform: translate3d(100%, 0px, 0px); min-height: 1px; visibility: hidden;">
                                <!---->
                              </div>
                            </mat-tab-body>
                            <!---->
                          </div>
                        </mat-tab-group>
                      </fe-product-detail-tabs>
                    </div>
                    <!---->
                    <sm-product-list-slider id="birlikte-alinan-urunler" title="Bu Ürünler de İlgini Çekebilir" class="recommended-products-vwo ng-star-inserted" _nghost-kan-c364="">
                      <div _ngcontent-kan-c364="" class="home-page-wrapper mdc-layout-grid__inner">
                        <div _ngcontent-kan-c364="" class="section mdc-layout-grid__cell--span-12">
                          <div _ngcontent-kan-c364="" class="d-flex ng-star-inserted">
                            <div _ngcontent-kan-c364="" class="section-title mat-headline text-color-black">Bu Ürünler de İlgini Çekebilir</div>
                          </div>
                          <!---->
                          <mat-tab-group _ngcontent-kan-c364="" class="mat-mdc-tab-group mat-primary mat-mdc-tab-group-stretch-tabs ng-star-inserted">
                            <mat-tab-header class="mat-mdc-tab-header" style="display: none;">
                              <button aria-hidden="true" type="button" mat-ripple="" tabindex="-1" class="mat-ripple mat-mdc-tab-header-pagination mat-mdc-tab-header-pagination-before mat-mdc-tab-header-pagination-disabled" disabled="">
                                <div class="mat-mdc-tab-header-pagination-chevron"></div>
                              </button>
                              <div class="mat-mdc-tab-label-container">
                                <div role="tablist" class="mat-mdc-tab-list" style="transform: translateX(0px);">
                                  <div class="mat-mdc-tab-labels">
                                    <div role="tab" mattablabelwrapper="" cdkmonitorelementfocus="" class="mdc-tab mat-mdc-tab mat-mdc-focus-indicator mdc-tab--active ng-star-inserted mdc-tab-indicator--active" id="mat-tab-label-4-0" tabindex="0" aria-posinset="1" aria-setsize="1" aria-controls="mat-tab-content-4-0" aria-selected="true" aria-disabled="false">
                                      <span class="mdc-tab__ripple"></span>
                                      <div mat-ripple="" class="mat-ripple mat-mdc-tab-ripple"></div>
                                      <span class="mdc-tab__content">
                                        <span class="mdc-tab__text-label">shoppingList.name
                                          <!---->
                                          <!---->
                                        </span>
                                      </span>
                                      <span class="mdc-tab-indicator">
                                        <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                                      </span>
                                    </div>
                                    <!---->
                                  </div>
                                </div>
                              </div>
                              <button aria-hidden="true" type="button" mat-ripple="" tabindex="-1" class="mat-ripple mat-mdc-tab-header-pagination mat-mdc-tab-header-pagination-after mat-mdc-header-pagination-disabled" disabled="">
                                <div class="mat-mdc-tab-header-pagination-chevron"></div>
                              </button>
                            </mat-tab-header>
                            <div class="mat-mdc-tab-body-wrapper">
                              <mat-tab-body role="tabpanel" class="mat-mdc-tab-body ng-tns-c229-7 mat-mdc-tab-body-active ng-star-inserted" id="mat-tab-content-4-0" aria-labelledby="mat-tab-label-4-0">
                                <div cdkscrollable="" class="mat-mdc-tab-body-content ng-tns-c229-7 ng-trigger ng-trigger-translateTab" style="transform: none;">
                                  <div _ngcontent-kan-c364="" class="container-wrapper ng-star-inserted" style="">
                                    <div _ngcontent-kan-c364="" class="prev-btn ng-star-inserted"></div>
                                    <!---->
                                    <div _ngcontent-kan-c364="" class="horizontal-list-page-items-container in-mat-tab-group ng-star-inserted">
                                      <sm-list-page-item _ngcontent-kan-c364="" class="list-item mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-2-phone ng-star-inserted" style="min-width: 166px;" data-product-id="20000027271000">
                                        <mat-card class="mat-mdc-card mdc-card">
                                          <fa-icon id="fav-add-button-20000027271000" class="ng-fa-icon favourite favourite--empty ng-star-inserted">
                                            <svg role="img" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="heart" class="svg-inline--fa fa-heart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                              <path fill="currentColor" d="M255.1 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 0 232.4 0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84.02L255.1 96zM255.1 141.3L221.4 106.6C196.1 81.31 160 69.77 124.7 75.66C71.21 84.58 31.1 130.9 31.1 185.1V190.9C31.1 223.6 45.55 254.7 69.42 277L250.1 445.7C251.7 447.2 253.8 448 255.1 448C258.2 448 260.3 447.2 261.9 445.7L442.6 277C466.4 254.7 480 223.6 480 190.9V185.1C480 130.9 440.8 84.58 387.3 75.66C351.1 69.77 315.9 81.31 290.6 106.6L255.1 141.3z"></path>
                                            </svg>
                                          </fa-icon>
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <div>
                                            <fe-product-image id="product-image" class="image" _nghost-kan-c162="">
                                              <a _ngcontent-kan-c162="" id="product-image-link" href="/muz-ithal-kg-p-1a01f58">
                                                <img _ngcontent-kan-c162="" felazyload="" alt="Muz İthal Kg" src="https://images.migrosone.com/sanalmarket/product/27271000/muz-ithal-kg-3a8f26.jpg" class="ng-star-inserted">
                                                <!---->
                                                <!---->
                                                <!---->
                                              </a>
                                            </fe-product-image>
                                            <a id="product-name" class="mat-caption text-color-black product-name" ngx-ql="" href="/muz-ithal-kg-p-1a01f58"> Muz İthal Kg </a>
                                          </div>
                                          <div class="bottom-row">
                                            <fe-crm-discount-badge _nghost-kan-c343="">
                                              <!---->
                                            </fe-crm-discount-badge>
                                            <fe-product-price id="price" class="price" _nghost-kan-c275="">
                                              <div _ngcontent-kan-c275="">
                                                <!---->
                                                <div _ngcontent-kan-c275="" id="price-new" class="price-new subtitle-1 price-new-only">
                                                  <span _ngcontent-kan-c275="" id="new-amount" class="amount"> 89,95 <span _ngcontent-kan-c275="" class="currency">TL</span>
                                                  </span>
                                                </div>
                                              </div>
                                              <!---->
                                            </fe-product-price>
                                            <!---->
                                            <sm-product-actions id="actions" class="actions" _nghost-kan-c345="">
                                              <!---->
                                              <fa-icon _ngcontent-kan-c345="" class="ng-fa-icon add-to-cart-button ng-star-inserted" id="product-actions-add-to-cart-button--muz-ithal-kg-p-1a01f58">
                                                <svg role="img" aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus" class="svg-inline--fa fa-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                  <path fill="currentColor" d="M432 256C432 269.3 421.3 280 408 280h-160v160c0 13.25-10.75 24.01-24 24.01S200 453.3 200 440v-160h-160c-13.25 0-24-10.74-24-23.99C16 242.8 26.75 232 40 232h160v-160c0-13.25 10.75-23.99 24-23.99S248 58.75 248 72v160h160C421.3 232 432 242.8 432 256z"></path>
                                                </svg>
                                              </fa-icon>
                                              <!---->
                                              <!---->
                                            </sm-product-actions>
                                          </div>
                                        </mat-card>
                                        <!---->
                                        <!---->
                                      </sm-list-page-item>
                                      <sm-list-page-item _ngcontent-kan-c364="" class="list-item mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-2-phone ng-star-inserted" style="min-width: 166px;" data-product-id="20000028130013">
                                        <mat-card class="mat-mdc-card mdc-card">
                                          <fa-icon id="fav-add-button-20000028130013" class="ng-fa-icon favourite favourite--empty ng-star-inserted">
                                            <svg role="img" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="heart" class="svg-inline--fa fa-heart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                              <path fill="currentColor" d="M255.1 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 0 232.4 0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84.02L255.1 96zM255.1 141.3L221.4 106.6C196.1 81.31 160 69.77 124.7 75.66C71.21 84.58 31.1 130.9 31.1 185.1V190.9C31.1 223.6 45.55 254.7 69.42 277L250.1 445.7C251.7 447.2 253.8 448 255.1 448C258.2 448 260.3 447.2 261.9 445.7L442.6 277C466.4 254.7 480 223.6 480 190.9V185.1C480 130.9 440.8 84.58 387.3 75.66C351.1 69.77 315.9 81.31 290.6 106.6L255.1 141.3z"></path>
                                            </svg>
                                          </fa-icon>
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <div>
                                            <fe-product-image id="product-image" class="image" _nghost-kan-c162="">
                                              <a _ngcontent-kan-c162="" id="product-image-link" href="/hiyar-badem-paket-kg-p-1ad3add">
                                                <img _ngcontent-kan-c162="" felazyload="" alt="Hıyar Badem Paket Kg" src="https://images.migrosone.com/sanalmarket/product/28130013/28130013-d4d1b2.jpg" class="ng-star-inserted">
                                                <!---->
                                                <!---->
                                                <!---->
                                              </a>
                                            </fe-product-image>
                                            <a id="product-name" class="mat-caption text-color-black product-name" ngx-ql="" href="/hiyar-badem-paket-kg-p-1ad3add"> Hıyar Badem Paket Kg </a>
                                          </div>
                                          <div class="bottom-row">
                                            <fe-crm-discount-badge _nghost-kan-c343="">
                                              <!---->
                                            </fe-crm-discount-badge>
                                            <fe-product-price id="price" class="price" _nghost-kan-c275="">
                                              <div _ngcontent-kan-c275="">
                                                <!---->
                                                <div _ngcontent-kan-c275="" id="price-new" class="price-new subtitle-1 price-new-only">
                                                  <span _ngcontent-kan-c275="" id="new-amount" class="amount"> 59,95 <span _ngcontent-kan-c275="" class="currency">TL</span>
                                                  </span>
                                                </div>
                                              </div>
                                              <!---->
                                            </fe-product-price>
                                            <!---->
                                            <sm-product-actions id="actions" class="actions" _nghost-kan-c345="">
                                              <!---->
                                              <fa-icon _ngcontent-kan-c345="" class="ng-fa-icon add-to-cart-button ng-star-inserted" id="product-actions-add-to-cart-button--hiyar-badem-paket-kg-p-1ad3add">
                                                <svg role="img" aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus" class="svg-inline--fa fa-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                  <path fill="currentColor" d="M432 256C432 269.3 421.3 280 408 280h-160v160c0 13.25-10.75 24.01-24 24.01S200 453.3 200 440v-160h-160c-13.25 0-24-10.74-24-23.99C16 242.8 26.75 232 40 232h160v-160c0-13.25 10.75-23.99 24-23.99S248 58.75 248 72v160h160C421.3 232 432 242.8 432 256z"></path>
                                                </svg>
                                              </fa-icon>
                                              <!---->
                                              <!---->
                                            </sm-product-actions>
                                          </div>
                                        </mat-card>
                                        <!---->
                                        <!---->
                                      </sm-list-page-item>
                                      <sm-list-page-item _ngcontent-kan-c364="" class="list-item mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-2-phone ng-star-inserted" style="min-width: 166px;" data-product-id="20000008040710">
                                        <mat-card class="mat-mdc-card mdc-card">
                                          <fa-icon id="fav-add-button-20000008040710" class="ng-fa-icon favourite favourite--empty ng-star-inserted">
                                            <svg role="img" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="heart" class="svg-inline--fa fa-heart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                              <path fill="currentColor" d="M255.1 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 0 232.4 0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84.02L255.1 96zM255.1 141.3L221.4 106.6C196.1 81.31 160 69.77 124.7 75.66C71.21 84.58 31.1 130.9 31.1 185.1V190.9C31.1 223.6 45.55 254.7 69.42 277L250.1 445.7C251.7 447.2 253.8 448 255.1 448C258.2 448 260.3 447.2 261.9 445.7L442.6 277C466.4 254.7 480 223.6 480 190.9V185.1C480 130.9 440.8 84.58 387.3 75.66C351.1 69.77 315.9 81.31 290.6 106.6L255.1 141.3z"></path>
                                            </svg>
                                          </fa-icon>
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <div>
                                            <fe-product-image id="product-image" class="image" _nghost-kan-c162="">
                                              <a _ngcontent-kan-c162="" id="product-image-link" href="/beypazari-maden-suyu-6x200-ml-p-7ab106">
                                                <img _ngcontent-kan-c162="" felazyload="" alt="Beypazarı Maden Suyu 6X200 Ml" src="https://images.migrosone.com/sanalmarket/product/08040710/beypazari-maden-suyu-6x200-ml-ea0f41.jpg" class="ng-star-inserted">
                                                <!---->
                                                <!---->
                                                <!---->
                                              </a>
                                            </fe-product-image>
                                            <a id="product-name" class="mat-caption text-color-black product-name" ngx-ql="" href="/beypazari-maden-suyu-6x200-ml-p-7ab106"> Beypazarı Maden Suyu 6X200 Ml </a>
                                          </div>
                                          <div class="bottom-row">
                                            <fe-crm-discount-badge _nghost-kan-c343="">
                                              <!---->
                                            </fe-crm-discount-badge>
                                            <fe-product-price id="price" class="price" _nghost-kan-c275="">
                                              <div _ngcontent-kan-c275="">
                                                <!---->
                                                <div _ngcontent-kan-c275="" id="price-new" class="price-new subtitle-1 price-new-only">
                                                  <span _ngcontent-kan-c275="" id="new-amount" class="amount"> 29,00 <span _ngcontent-kan-c275="" class="currency">TL</span>
                                                  </span>
                                                </div>
                                              </div>
                                              <div _ngcontent-kan-c275="" id="unit-price" class="unitPrice ng-star-inserted">(24,16 TL/Litre)</div>
                                              <!---->
                                            </fe-product-price>
                                            <!---->
                                            <sm-product-actions id="actions" class="actions" _nghost-kan-c345="">
                                              <!---->
                                              <fa-icon _ngcontent-kan-c345="" class="ng-fa-icon add-to-cart-button ng-star-inserted" id="product-actions-add-to-cart-button--beypazari-maden-suyu-6x200-ml-p-7ab106">
                                                <svg role="img" aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus" class="svg-inline--fa fa-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                  <path fill="currentColor" d="M432 256C432 269.3 421.3 280 408 280h-160v160c0 13.25-10.75 24.01-24 24.01S200 453.3 200 440v-160h-160c-13.25 0-24-10.74-24-23.99C16 242.8 26.75 232 40 232h160v-160c0-13.25 10.75-23.99 24-23.99S248 58.75 248 72v160h160C421.3 232 432 242.8 432 256z"></path>
                                                </svg>
                                              </fa-icon>
                                              <!---->
                                              <!---->
                                            </sm-product-actions>
                                          </div>
                                        </mat-card>
                                        <!---->
                                        <!---->
                                      </sm-list-page-item>
                                      <sm-list-page-item _ngcontent-kan-c364="" class="list-item mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-2-phone ng-star-inserted" style="min-width: 166px;" data-product-id="20000028087000">
                                        <mat-card class="mat-mdc-card mdc-card">
                                          <fa-icon id="fav-add-button-20000028087000" class="ng-fa-icon favourite favourite--empty ng-star-inserted">
                                            <svg role="img" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="heart" class="svg-inline--fa fa-heart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                              <path fill="currentColor" d="M255.1 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 0 232.4 0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84.02L255.1 96zM255.1 141.3L221.4 106.6C196.1 81.31 160 69.77 124.7 75.66C71.21 84.58 31.1 130.9 31.1 185.1V190.9C31.1 223.6 45.55 254.7 69.42 277L250.1 445.7C251.7 447.2 253.8 448 255.1 448C258.2 448 260.3 447.2 261.9 445.7L442.6 277C466.4 254.7 480 223.6 480 190.9V185.1C480 130.9 440.8 84.58 387.3 75.66C351.1 69.77 315.9 81.31 290.6 106.6L255.1 141.3z"></path>
                                            </svg>
                                          </fa-icon>
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <div>
                                            <fe-product-image id="product-image" class="image" _nghost-kan-c162="">
                                              <a _ngcontent-kan-c162="" id="product-image-link" href="/domates-salkim-kg-p-1ac92d8">
                                                <img _ngcontent-kan-c162="" felazyload="" alt="Domates Salkım Kg" src="https://images.migrosone.com/sanalmarket/product/28087000/domates-salkim-kg-6e910c.jpg" class="ng-star-inserted">
                                                <!---->
                                                <!---->
                                                <!---->
                                              </a>
                                            </fe-product-image>
                                            <a id="product-name" class="mat-caption text-color-black product-name" ngx-ql="" href="/domates-salkim-kg-p-1ac92d8"> Domates Salkım Kg </a>
                                          </div>
                                          <div class="bottom-row">
                                            <fe-crm-discount-badge _nghost-kan-c343="">
                                              <!---->
                                            </fe-crm-discount-badge>
                                            <fe-product-price id="price" class="price" _nghost-kan-c275="">
                                              <div _ngcontent-kan-c275="">
                                                <!---->
                                                <div _ngcontent-kan-c275="" id="price-new" class="price-new subtitle-1 price-new-only">
                                                  <span _ngcontent-kan-c275="" id="new-amount" class="amount"> 49,95 <span _ngcontent-kan-c275="" class="currency">TL</span>
                                                  </span>
                                                </div>
                                              </div>
                                              <!---->
                                            </fe-product-price>
                                            <!---->
                                            <sm-product-actions id="actions" class="actions" _nghost-kan-c345="">
                                              <!---->
                                              <fa-icon _ngcontent-kan-c345="" class="ng-fa-icon add-to-cart-button ng-star-inserted" id="product-actions-add-to-cart-button--domates-salkim-kg-p-1ac92d8">
                                                <svg role="img" aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus" class="svg-inline--fa fa-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                  <path fill="currentColor" d="M432 256C432 269.3 421.3 280 408 280h-160v160c0 13.25-10.75 24.01-24 24.01S200 453.3 200 440v-160h-160c-13.25 0-24-10.74-24-23.99C16 242.8 26.75 232 40 232h160v-160c0-13.25 10.75-23.99 24-23.99S248 58.75 248 72v160h160C421.3 232 432 242.8 432 256z"></path>
                                                </svg>
                                              </fa-icon>
                                              <!---->
                                              <!---->
                                            </sm-product-actions>
                                          </div>
                                        </mat-card>
                                        <!---->
                                        <!---->
                                      </sm-list-page-item>
                                      <sm-list-page-item _ngcontent-kan-c364="" class="list-item mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-2-phone ng-star-inserted" style="min-width: 166px;" data-product-id="20000028130000">
                                        <mat-card class="mat-mdc-card mdc-card">
                                          <fa-icon id="fav-add-button-20000028130000" class="ng-fa-icon favourite favourite--empty ng-star-inserted">
                                            <svg role="img" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="heart" class="svg-inline--fa fa-heart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                              <path fill="currentColor" d="M255.1 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 0 232.4 0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84.02L255.1 96zM255.1 141.3L221.4 106.6C196.1 81.31 160 69.77 124.7 75.66C71.21 84.58 31.1 130.9 31.1 185.1V190.9C31.1 223.6 45.55 254.7 69.42 277L250.1 445.7C251.7 447.2 253.8 448 255.1 448C258.2 448 260.3 447.2 261.9 445.7L442.6 277C466.4 254.7 480 223.6 480 190.9V185.1C480 130.9 440.8 84.58 387.3 75.66C351.1 69.77 315.9 81.31 290.6 106.6L255.1 141.3z"></path>
                                            </svg>
                                          </fa-icon>
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <div>
                                            <fe-product-image id="product-image" class="image" _nghost-kan-c162="">
                                              <a _ngcontent-kan-c162="" id="product-image-link" href="/hiyar-kg-p-1ad3ad0">
                                                <img _ngcontent-kan-c162="" felazyload="" alt="Hıyar Kg" src="https://images.migrosone.com/sanalmarket/product/28130000/hiyar-kg-4aa292.jpg" class="ng-star-inserted">
                                                <!---->
                                                <!---->
                                                <!---->
                                              </a>
                                            </fe-product-image>
                                            <a id="product-name" class="mat-caption text-color-black product-name" ngx-ql="" href="/hiyar-kg-p-1ad3ad0"> Hıyar Kg </a>
                                          </div>
                                          <div class="bottom-row">
                                            <fe-crm-discount-badge _nghost-kan-c343="">
                                              <!---->
                                            </fe-crm-discount-badge>
                                            <fe-product-price id="price" class="price" _nghost-kan-c275="">
                                              <div _ngcontent-kan-c275="">
                                                <!---->
                                                <div _ngcontent-kan-c275="" id="price-new" class="price-new subtitle-1 price-new-only">
                                                  <span _ngcontent-kan-c275="" id="new-amount" class="amount"> 49,95 <span _ngcontent-kan-c275="" class="currency">TL</span>
                                                  </span>
                                                </div>
                                              </div>
                                              <!---->
                                            </fe-product-price>
                                            <!---->
                                            <sm-product-actions id="actions" class="actions" _nghost-kan-c345="">
                                              <!---->
                                              <fa-icon _ngcontent-kan-c345="" class="ng-fa-icon add-to-cart-button ng-star-inserted" id="product-actions-add-to-cart-button--hiyar-kg-p-1ad3ad0">
                                                <svg role="img" aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus" class="svg-inline--fa fa-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                  <path fill="currentColor" d="M432 256C432 269.3 421.3 280 408 280h-160v160c0 13.25-10.75 24.01-24 24.01S200 453.3 200 440v-160h-160c-13.25 0-24-10.74-24-23.99C16 242.8 26.75 232 40 232h160v-160c0-13.25 10.75-23.99 24-23.99S248 58.75 248 72v160h160C421.3 232 432 242.8 432 256z"></path>
                                                </svg>
                                              </fa-icon>
                                              <!---->
                                              <!---->
                                            </sm-product-actions>
                                          </div>
                                        </mat-card>
                                        <!---->
                                        <!---->
                                      </sm-list-page-item>
                                      <sm-list-page-item _ngcontent-kan-c364="" class="list-item mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-2-phone ng-star-inserted" style="min-width: 166px;" data-product-id="20000008079827">
                                        <mat-card class="mat-mdc-card mdc-card">
                                          <fa-icon id="fav-add-button-20000008079827" class="ng-fa-icon favourite favourite--empty ng-star-inserted">
                                            <svg role="img" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="heart" class="svg-inline--fa fa-heart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                              <path fill="currentColor" d="M255.1 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 0 232.4 0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84.02L255.1 96zM255.1 141.3L221.4 106.6C196.1 81.31 160 69.77 124.7 75.66C71.21 84.58 31.1 130.9 31.1 185.1V190.9C31.1 223.6 45.55 254.7 69.42 277L250.1 445.7C251.7 447.2 253.8 448 255.1 448C258.2 448 260.3 447.2 261.9 445.7L442.6 277C466.4 254.7 480 223.6 480 190.9V185.1C480 130.9 440.8 84.58 387.3 75.66C351.1 69.77 315.9 81.31 290.6 106.6L255.1 141.3z"></path>
                                            </svg>
                                          </fa-icon>
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <div>
                                            <fe-product-image id="product-image" class="image" _nghost-kan-c162="">
                                              <a _ngcontent-kan-c162="" id="product-image-link" href="/migros-ic-ceviz-150-g-p-7b49d3">
                                                <img _ngcontent-kan-c162="" felazyload="" alt="Migros İç Ceviz 150 G" src="https://images.migrosone.com/sanalmarket/product/08079827/08079827-a4c8ee.jpg" class="ng-star-inserted">
                                                <!---->
                                                <!---->
                                                <!---->
                                              </a>
                                            </fe-product-image>
                                            <a id="product-name" class="mat-caption text-color-black product-name" ngx-ql="" href="/migros-ic-ceviz-150-g-p-7b49d3"> Migros İç Ceviz 150 G </a>
                                          </div>
                                          <div class="bottom-row">
                                            <fe-crm-discount-badge _nghost-kan-c343="">
                                              <!---->
                                            </fe-crm-discount-badge>
                                            <fe-product-price id="price" class="price" _nghost-kan-c275="">
                                              <div _ngcontent-kan-c275="">
                                                <!---->
                                                <div _ngcontent-kan-c275="" id="price-new" class="price-new subtitle-1 price-new-only">
                                                  <span _ngcontent-kan-c275="" id="new-amount" class="amount"> 55,90 <span _ngcontent-kan-c275="" class="currency">TL</span>
                                                  </span>
                                                </div>
                                              </div>
                                              <div _ngcontent-kan-c275="" id="unit-price" class="unitPrice ng-star-inserted">(372,66 TL/Kg)</div>
                                              <!---->
                                            </fe-product-price>
                                            <!---->
                                            <sm-product-actions id="actions" class="actions" _nghost-kan-c345="">
                                              <!---->
                                              <fa-icon _ngcontent-kan-c345="" class="ng-fa-icon add-to-cart-button ng-star-inserted" id="product-actions-add-to-cart-button--migros-ic-ceviz-150-g-p-7b49d3">
                                                <svg role="img" aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus" class="svg-inline--fa fa-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                  <path fill="currentColor" d="M432 256C432 269.3 421.3 280 408 280h-160v160c0 13.25-10.75 24.01-24 24.01S200 453.3 200 440v-160h-160c-13.25 0-24-10.74-24-23.99C16 242.8 26.75 232 40 232h160v-160c0-13.25 10.75-23.99 24-23.99S248 58.75 248 72v160h160C421.3 232 432 242.8 432 256z"></path>
                                                </svg>
                                              </fa-icon>
                                              <!---->
                                              <!---->
                                            </sm-product-actions>
                                          </div>
                                        </mat-card>
                                        <!---->
                                        <!---->
                                      </sm-list-page-item>
                                      <sm-list-page-item _ngcontent-kan-c364="" class="list-item mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-2-phone ng-star-inserted" style="min-width: 166px;" data-product-id="20000028420000">
                                        <mat-card class="mat-mdc-card mdc-card">
                                          <fa-icon id="fav-add-button-20000028420000" class="ng-fa-icon favourite favourite--empty ng-star-inserted">
                                            <svg role="img" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="heart" class="svg-inline--fa fa-heart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                              <path fill="currentColor" d="M255.1 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 0 232.4 0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84.02L255.1 96zM255.1 141.3L221.4 106.6C196.1 81.31 160 69.77 124.7 75.66C71.21 84.58 31.1 130.9 31.1 185.1V190.9C31.1 223.6 45.55 254.7 69.42 277L250.1 445.7C251.7 447.2 253.8 448 255.1 448C258.2 448 260.3 447.2 261.9 445.7L442.6 277C466.4 254.7 480 223.6 480 190.9V185.1C480 130.9 440.8 84.58 387.3 75.66C351.1 69.77 315.9 81.31 290.6 106.6L255.1 141.3z"></path>
                                            </svg>
                                          </fa-icon>
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <div>
                                            <fe-product-image id="product-image" class="image" _nghost-kan-c162="">
                                              <a _ngcontent-kan-c162="" id="product-image-link" href="/sogan-kuru-dokme-kg-p-1b1a7a0">
                                                <img _ngcontent-kan-c162="" felazyload="" alt="Soğan Kuru Dökme Kg" src="https://images.migrosone.com/sanalmarket/product/28420000/sogan-kuru-dokme-kg-25131e.jpg" class="ng-star-inserted">
                                                <!---->
                                                <!---->
                                                <!---->
                                              </a>
                                            </fe-product-image>
                                            <a id="product-name" class="mat-caption text-color-black product-name" ngx-ql="" href="/sogan-kuru-dokme-kg-p-1b1a7a0"> Soğan Kuru Dökme Kg </a>
                                          </div>
                                          <div class="bottom-row">
                                            <fe-crm-discount-badge _nghost-kan-c343="">
                                              <div _ngcontent-kan-c343="" class="crm-badge overline ng-star-inserted">
                                                <img _ngcontent-kan-c343="" src="assets/icons/badges/crm-badge.svg" alt="crm-badge-icon">SEPETTE 10,95 TL
                                              </div>
                                              <!---->
                                            </fe-crm-discount-badge>
                                            <fe-product-price id="price" class="price" _nghost-kan-c275="">
                                              <div _ngcontent-kan-c275="">
                                                <!---->
                                                <div _ngcontent-kan-c275="" id="price-new" class="price-new subtitle-1 price-new-only">
                                                  <span _ngcontent-kan-c275="" id="new-amount" class="amount"> 11,50 <span _ngcontent-kan-c275="" class="currency">TL</span>
                                                  </span>
                                                </div>
                                              </div>
                                              <!---->
                                            </fe-product-price>
                                            <!---->
                                            <sm-product-actions id="actions" class="actions" _nghost-kan-c345="">
                                              <!---->
                                              <fa-icon _ngcontent-kan-c345="" class="ng-fa-icon add-to-cart-button ng-star-inserted" id="product-actions-add-to-cart-button--sogan-kuru-dokme-kg-p-1b1a7a0">
                                                <svg role="img" aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus" class="svg-inline--fa fa-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                  <path fill="currentColor" d="M432 256C432 269.3 421.3 280 408 280h-160v160c0 13.25-10.75 24.01-24 24.01S200 453.3 200 440v-160h-160c-13.25 0-24-10.74-24-23.99C16 242.8 26.75 232 40 232h160v-160c0-13.25 10.75-23.99 24-23.99S248 58.75 248 72v160h160C421.3 232 432 242.8 432 256z"></path>
                                                </svg>
                                              </fa-icon>
                                              <!---->
                                              <!---->
                                            </sm-product-actions>
                                          </div>
                                        </mat-card>
                                        <!---->
                                        <!---->
                                      </sm-list-page-item>
                                      <sm-list-page-item _ngcontent-kan-c364="" class="list-item mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-2-phone ng-star-inserted" style="min-width: 166px;" data-product-id="20000008089866">
                                        <mat-card class="mat-mdc-card mdc-card">
                                          <fa-icon id="fav-add-button-20000008089866" class="ng-fa-icon favourite favourite--empty ng-star-inserted">
                                            <svg role="img" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="heart" class="svg-inline--fa fa-heart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                              <path fill="currentColor" d="M255.1 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 0 232.4 0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84.02L255.1 96zM255.1 141.3L221.4 106.6C196.1 81.31 160 69.77 124.7 75.66C71.21 84.58 31.1 130.9 31.1 185.1V190.9C31.1 223.6 45.55 254.7 69.42 277L250.1 445.7C251.7 447.2 253.8 448 255.1 448C258.2 448 260.3 447.2 261.9 445.7L442.6 277C466.4 254.7 480 223.6 480 190.9V185.1C480 130.9 440.8 84.58 387.3 75.66C351.1 69.77 315.9 81.31 290.6 106.6L255.1 141.3z"></path>
                                            </svg>
                                          </fa-icon>
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <div>
                                            <fe-product-image id="product-image" class="image" _nghost-kan-c162="">
                                              <a _ngcontent-kan-c162="" id="product-image-link" href="/by-izzet-ceviz-ici-150-g-p-7b710a">
                                                <img _ngcontent-kan-c162="" felazyload="" alt="By İzzet Ceviz İçi 150 G" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAKCAYAAABrGwT5AAAAF0lEQVR42mN89uzxfwYyAeOo5lHNhAAA7jIk17T4Y6wAAAAASUVORK5CYII=" class="ng-star-inserted">
                                                <!---->
                                                <!---->
                                                <!---->
                                              </a>
                                            </fe-product-image>
                                            <a id="product-name" class="mat-caption text-color-black product-name" ngx-ql="" href="/by-izzet-ceviz-ici-150-g-p-7b710a"> By İzzet Ceviz İçi 150 G </a>
                                          </div>
                                          <div class="bottom-row">
                                            <fe-crm-discount-badge _nghost-kan-c343="">
                                              <!---->
                                            </fe-crm-discount-badge>
                                            <fe-product-price id="price" class="price" _nghost-kan-c275="">
                                              <div _ngcontent-kan-c275="">
                                                <!---->
                                                <div _ngcontent-kan-c275="" id="price-new" class="price-new subtitle-1 price-new-only">
                                                  <span _ngcontent-kan-c275="" id="new-amount" class="amount"> 79,90 <span _ngcontent-kan-c275="" class="currency">TL</span>
                                                  </span>
                                                </div>
                                              </div>
                                              <div _ngcontent-kan-c275="" id="unit-price" class="unitPrice ng-star-inserted">(532,66 TL/Kg)</div>
                                              <!---->
                                            </fe-product-price>
                                            <!---->
                                            <sm-product-actions id="actions" class="actions" _nghost-kan-c345="">
                                              <!---->
                                              <fa-icon _ngcontent-kan-c345="" class="ng-fa-icon add-to-cart-button ng-star-inserted" id="product-actions-add-to-cart-button--by-izzet-ceviz-ici-150-g-p-7b710a">
                                                <svg role="img" aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus" class="svg-inline--fa fa-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                  <path fill="currentColor" d="M432 256C432 269.3 421.3 280 408 280h-160v160c0 13.25-10.75 24.01-24 24.01S200 453.3 200 440v-160h-160c-13.25 0-24-10.74-24-23.99C16 242.8 26.75 232 40 232h160v-160c0-13.25 10.75-23.99 24-23.99S248 58.75 248 72v160h160C421.3 232 432 242.8 432 256z"></path>
                                                </svg>
                                              </fa-icon>
                                              <!---->
                                              <!---->
                                            </sm-product-actions>
                                          </div>
                                        </mat-card>
                                        <!---->
                                        <!---->
                                      </sm-list-page-item>
                                      <sm-list-page-item _ngcontent-kan-c364="" class="list-item mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-2-phone ng-star-inserted" style="min-width: 166px;" data-product-id="20000008089858">
                                        <mat-card class="mat-mdc-card mdc-card">
                                          <fa-icon id="fav-add-button-20000008089858" class="ng-fa-icon favourite favourite--empty ng-star-inserted">
                                            <svg role="img" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="heart" class="svg-inline--fa fa-heart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                              <path fill="currentColor" d="M255.1 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 0 232.4 0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84.02L255.1 96zM255.1 141.3L221.4 106.6C196.1 81.31 160 69.77 124.7 75.66C71.21 84.58 31.1 130.9 31.1 185.1V190.9C31.1 223.6 45.55 254.7 69.42 277L250.1 445.7C251.7 447.2 253.8 448 255.1 448C258.2 448 260.3 447.2 261.9 445.7L442.6 277C466.4 254.7 480 223.6 480 190.9V185.1C480 130.9 440.8 84.58 387.3 75.66C351.1 69.77 315.9 81.31 290.6 106.6L255.1 141.3z"></path>
                                            </svg>
                                          </fa-icon>
                                          <!---->
                                          <!---->
                                          <!---->
                                          <div id="discount-badge" class="discount-badge ng-star-inserted">
                                            <div>
                                              <span id="discount-badge--percent" class="discount-badge--percent">%</span>
                                              <span id="discount-badge--unit" class="discount-badge--unit">19</span>
                                            </div>
                                            <div id="discount-badge--label" class="discount-badge--label">İNDİRİM</div>
                                          </div>
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <div>
                                            <fe-product-image id="product-image" class="image" _nghost-kan-c162="">
                                              <a _ngcontent-kan-c162="" id="product-image-link" href="/by-izzet-cig-badem-150-g-p-7b7102">
                                                <img _ngcontent-kan-c162="" felazyload="" alt="By İzzet Çiğ Badem 150 G" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAKCAYAAABrGwT5AAAAF0lEQVR42mN89uzxfwYyAeOo5lHNhAAA7jIk17T4Y6wAAAAASUVORK5CYII=" class="ng-star-inserted">
                                                <!---->
                                                <!---->
                                                <!---->
                                              </a>
                                            </fe-product-image>
                                            <a id="product-name" class="mat-caption text-color-black product-name" ngx-ql="" href="/by-izzet-cig-badem-150-g-p-7b7102"> By İzzet Çiğ Badem 150 G </a>
                                          </div>
                                          <div class="bottom-row">
                                            <fe-crm-discount-badge _nghost-kan-c343="">
                                              <!---->
                                            </fe-crm-discount-badge>
                                            <fe-product-price id="price" class="price" _nghost-kan-c275="">
                                              <div _ngcontent-kan-c275="" class="promotion-wrapper">
                                                <div _ngcontent-kan-c275="" id="price-old" class="price-old ng-star-inserted">
                                                  <span _ngcontent-kan-c275="" id="old-amount" class="amount">79,90 <span _ngcontent-kan-c275="" class="currency">TL</span>
                                                  </span>
                                                </div>
                                                <!---->
                                                <div _ngcontent-kan-c275="" id="price-new" class="price-new subtitle-1">
                                                  <span _ngcontent-kan-c275="" id="new-amount" class="amount"> 64,90 <span _ngcontent-kan-c275="" class="currency">TL</span>
                                                  </span>
                                                </div>
                                              </div>
                                              <div _ngcontent-kan-c275="" id="unit-price" class="unitPrice ng-star-inserted">(432,66 TL/Kg)</div>
                                              <!---->
                                            </fe-product-price>
                                            <!---->
                                            <sm-product-actions id="actions" class="actions" _nghost-kan-c345="">
                                              <!---->
                                              <fa-icon _ngcontent-kan-c345="" class="ng-fa-icon add-to-cart-button ng-star-inserted" id="product-actions-add-to-cart-button--by-izzet-cig-badem-150-g-p-7b7102">
                                                <svg role="img" aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus" class="svg-inline--fa fa-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                  <path fill="currentColor" d="M432 256C432 269.3 421.3 280 408 280h-160v160c0 13.25-10.75 24.01-24 24.01S200 453.3 200 440v-160h-160c-13.25 0-24-10.74-24-23.99C16 242.8 26.75 232 40 232h160v-160c0-13.25 10.75-23.99 24-23.99S248 58.75 248 72v160h160C421.3 232 432 242.8 432 256z"></path>
                                                </svg>
                                              </fa-icon>
                                              <!---->
                                              <!---->
                                            </sm-product-actions>
                                          </div>
                                        </mat-card>
                                        <!---->
                                        <!---->
                                      </sm-list-page-item>
                                      <sm-list-page-item _ngcontent-kan-c364="" class="list-item mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-2-phone ng-star-inserted" style="min-width: 166px;" data-product-id="20000027270000">
                                        <mat-card class="mat-mdc-card mdc-card">
                                          <fa-icon id="fav-add-button-20000027270000" class="ng-fa-icon favourite favourite--empty ng-star-inserted">
                                            <svg role="img" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="heart" class="svg-inline--fa fa-heart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                              <path fill="currentColor" d="M255.1 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 0 232.4 0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84.02L255.1 96zM255.1 141.3L221.4 106.6C196.1 81.31 160 69.77 124.7 75.66C71.21 84.58 31.1 130.9 31.1 185.1V190.9C31.1 223.6 45.55 254.7 69.42 277L250.1 445.7C251.7 447.2 253.8 448 255.1 448C258.2 448 260.3 447.2 261.9 445.7L442.6 277C466.4 254.7 480 223.6 480 190.9V185.1C480 130.9 440.8 84.58 387.3 75.66C351.1 69.77 315.9 81.31 290.6 106.6L255.1 141.3z"></path>
                                            </svg>
                                          </fa-icon>
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <div>
                                            <fe-product-image id="product-image" class="image" _nghost-kan-c162="">
                                              <a _ngcontent-kan-c162="" id="product-image-link" href="/muz-yerli-kg-p-1a01b70">
                                                <img _ngcontent-kan-c162="" felazyload="" alt="Muz Yerli Kg" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAKCAYAAABrGwT5AAAAF0lEQVR42mN89uzxfwYyAeOo5lHNhAAA7jIk17T4Y6wAAAAASUVORK5CYII=" class="ng-star-inserted">
                                                <!---->
                                                <!---->
                                                <!---->
                                              </a>
                                            </fe-product-image>
                                            <a id="product-name" class="mat-caption text-color-black product-name" ngx-ql="" href="/muz-yerli-kg-p-1a01b70"> Muz Yerli Kg </a>
                                          </div>
                                          <div class="bottom-row">
                                            <fe-crm-discount-badge _nghost-kan-c343="">
                                              <!---->
                                            </fe-crm-discount-badge>
                                            <fe-product-price id="price" class="price" _nghost-kan-c275="">
                                              <div _ngcontent-kan-c275="">
                                                <!---->
                                                <div _ngcontent-kan-c275="" id="price-new" class="price-new subtitle-1 price-new-only">
                                                  <span _ngcontent-kan-c275="" id="new-amount" class="amount"> 48,90 <span _ngcontent-kan-c275="" class="currency">TL</span>
                                                  </span>
                                                </div>
                                              </div>
                                              <!---->
                                            </fe-product-price>
                                            <!---->
                                            <sm-product-actions id="actions" class="actions" _nghost-kan-c345="">
                                              <!---->
                                              <fa-icon _ngcontent-kan-c345="" class="ng-fa-icon add-to-cart-button ng-star-inserted" id="product-actions-add-to-cart-button--muz-yerli-kg-p-1a01b70">
                                                <svg role="img" aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus" class="svg-inline--fa fa-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                  <path fill="currentColor" d="M432 256C432 269.3 421.3 280 408 280h-160v160c0 13.25-10.75 24.01-24 24.01S200 453.3 200 440v-160h-160c-13.25 0-24-10.74-24-23.99C16 242.8 26.75 232 40 232h160v-160c0-13.25 10.75-23.99 24-23.99S248 58.75 248 72v160h160C421.3 232 432 242.8 432 256z"></path>
                                                </svg>
                                              </fa-icon>
                                              <!---->
                                              <!---->
                                            </sm-product-actions>
                                          </div>
                                        </mat-card>
                                        <!---->
                                        <!---->
                                      </sm-list-page-item>
                                      <sm-list-page-item _ngcontent-kan-c364="" class="list-item mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-2-phone ng-star-inserted" style="min-width: 166px;" data-product-id="20000027191000">
                                        <mat-card class="mat-mdc-card mdc-card">
                                          <fa-icon id="fav-add-button-20000027191000" class="ng-fa-icon favourite favourite--empty ng-star-inserted">
                                            <svg role="img" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="heart" class="svg-inline--fa fa-heart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                              <path fill="currentColor" d="M255.1 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 0 232.4 0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84.02L255.1 96zM255.1 141.3L221.4 106.6C196.1 81.31 160 69.77 124.7 75.66C71.21 84.58 31.1 130.9 31.1 185.1V190.9C31.1 223.6 45.55 254.7 69.42 277L250.1 445.7C251.7 447.2 253.8 448 255.1 448C258.2 448 260.3 447.2 261.9 445.7L442.6 277C466.4 254.7 480 223.6 480 190.9V185.1C480 130.9 440.8 84.58 387.3 75.66C351.1 69.77 315.9 81.31 290.6 106.6L255.1 141.3z"></path>
                                            </svg>
                                          </fa-icon>
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <div>
                                            <fe-product-image id="product-image" class="image" _nghost-kan-c162="">
                                              <a _ngcontent-kan-c162="" id="product-image-link" href="/karpuz-kg-p-19ee6d8">
                                                <img _ngcontent-kan-c162="" felazyload="" alt="Karpuz Kg" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAKCAYAAABrGwT5AAAAF0lEQVR42mN89uzxfwYyAeOo5lHNhAAA7jIk17T4Y6wAAAAASUVORK5CYII=" class="ng-star-inserted">
                                                <!---->
                                                <!---->
                                                <!---->
                                              </a>
                                            </fe-product-image>
                                            <a id="product-name" class="mat-caption text-color-black product-name" ngx-ql="" href="/karpuz-kg-p-19ee6d8"> Karpuz Kg </a>
                                          </div>
                                          <div class="bottom-row">
                                            <fe-crm-discount-badge _nghost-kan-c343="">
                                              <!---->
                                            </fe-crm-discount-badge>
                                            <fe-product-price id="price" class="price" _nghost-kan-c275="">
                                              <div _ngcontent-kan-c275="">
                                                <!---->
                                                <div _ngcontent-kan-c275="" id="price-new" class="price-new subtitle-1 price-new-only">
                                                  <span _ngcontent-kan-c275="" id="new-amount" class="amount"> 39,90 <span _ngcontent-kan-c275="" class="currency">TL</span>
                                                  </span>
                                                </div>
                                              </div>
                                              <!---->
                                            </fe-product-price>
                                            <!---->
                                            <sm-product-actions id="actions" class="actions" _nghost-kan-c345="">
                                              <!---->
                                              <fa-icon _ngcontent-kan-c345="" class="ng-fa-icon add-to-cart-button ng-star-inserted" id="product-actions-add-to-cart-button--karpuz-kg-p-19ee6d8">
                                                <svg role="img" aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus" class="svg-inline--fa fa-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                  <path fill="currentColor" d="M432 256C432 269.3 421.3 280 408 280h-160v160c0 13.25-10.75 24.01-24 24.01S200 453.3 200 440v-160h-160c-13.25 0-24-10.74-24-23.99C16 242.8 26.75 232 40 232h160v-160c0-13.25 10.75-23.99 24-23.99S248 58.75 248 72v160h160C421.3 232 432 242.8 432 256z"></path>
                                                </svg>
                                              </fa-icon>
                                              <!---->
                                              <!---->
                                            </sm-product-actions>
                                          </div>
                                        </mat-card>
                                        <!---->
                                        <!---->
                                      </sm-list-page-item>
                                      <sm-list-page-item _ngcontent-kan-c364="" class="list-item mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-2-phone ng-star-inserted" style="min-width: 166px;" data-product-id="20000028010004">
                                        <mat-card class="mat-mdc-card mdc-card">
                                          <fa-icon id="fav-add-button-20000028010004" class="ng-fa-icon favourite favourite--empty ng-star-inserted">
                                            <svg role="img" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="heart" class="svg-inline--fa fa-heart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                              <path fill="currentColor" d="M255.1 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 0 232.4 0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84.02L255.1 96zM255.1 141.3L221.4 106.6C196.1 81.31 160 69.77 124.7 75.66C71.21 84.58 31.1 130.9 31.1 185.1V190.9C31.1 223.6 45.55 254.7 69.42 277L250.1 445.7C251.7 447.2 253.8 448 255.1 448C258.2 448 260.3 447.2 261.9 445.7L442.6 277C466.4 254.7 480 223.6 480 190.9V185.1C480 130.9 440.8 84.58 387.3 75.66C351.1 69.77 315.9 81.31 290.6 106.6L255.1 141.3z"></path>
                                            </svg>
                                          </fa-icon>
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <div>
                                            <fe-product-image id="product-image" class="image" _nghost-kan-c162="">
                                              <a _ngcontent-kan-c162="" id="product-image-link" href="/avokado-adet-p-1ab6614">
                                                <img _ngcontent-kan-c162="" felazyload="" alt="Avokado Adet" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAKCAYAAABrGwT5AAAAF0lEQVR42mN89uzxfwYyAeOo5lHNhAAA7jIk17T4Y6wAAAAASUVORK5CYII=" class="ng-star-inserted">
                                                <!---->
                                                <!---->
                                                <!---->
                                              </a>
                                            </fe-product-image>
                                            <a id="product-name" class="mat-caption text-color-black product-name" ngx-ql="" href="/avokado-adet-p-1ab6614"> Avokado Adet </a>
                                          </div>
                                          <div class="bottom-row">
                                            <fe-crm-discount-badge _nghost-kan-c343="">
                                              <!---->
                                            </fe-crm-discount-badge>
                                            <fe-product-price id="price" class="price" _nghost-kan-c275="">
                                              <div _ngcontent-kan-c275="">
                                                <!---->
                                                <div _ngcontent-kan-c275="" id="price-new" class="price-new subtitle-1 price-new-only">
                                                  <span _ngcontent-kan-c275="" id="new-amount" class="amount"> 39,95 <span _ngcontent-kan-c275="" class="currency">TL</span>
                                                  </span>
                                                </div>
                                              </div>
                                              <!---->
                                            </fe-product-price>
                                            <!---->
                                            <sm-product-actions id="actions" class="actions" _nghost-kan-c345="">
                                              <!---->
                                              <fa-icon _ngcontent-kan-c345="" class="ng-fa-icon add-to-cart-button ng-star-inserted" id="product-actions-add-to-cart-button--avokado-adet-p-1ab6614">
                                                <svg role="img" aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus" class="svg-inline--fa fa-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                  <path fill="currentColor" d="M432 256C432 269.3 421.3 280 408 280h-160v160c0 13.25-10.75 24.01-24 24.01S200 453.3 200 440v-160h-160c-13.25 0-24-10.74-24-23.99C16 242.8 26.75 232 40 232h160v-160c0-13.25 10.75-23.99 24-23.99S248 58.75 248 72v160h160C421.3 232 432 242.8 432 256z"></path>
                                                </svg>
                                              </fa-icon>
                                              <!---->
                                              <!---->
                                            </sm-product-actions>
                                          </div>
                                        </mat-card>
                                        <!---->
                                        <!---->
                                      </sm-list-page-item>
                                      <sm-list-page-item _ngcontent-kan-c364="" class="list-item mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-2-phone ng-star-inserted" style="min-width: 166px;" data-product-id="20000028091000">
                                        <mat-card class="mat-mdc-card mdc-card">
                                          <fa-icon id="fav-add-button-20000028091000" class="ng-fa-icon favourite favourite--empty ng-star-inserted">
                                            <svg role="img" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="heart" class="svg-inline--fa fa-heart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                              <path fill="currentColor" d="M255.1 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 0 232.4 0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84.02L255.1 96zM255.1 141.3L221.4 106.6C196.1 81.31 160 69.77 124.7 75.66C71.21 84.58 31.1 130.9 31.1 185.1V190.9C31.1 223.6 45.55 254.7 69.42 277L250.1 445.7C251.7 447.2 253.8 448 255.1 448C258.2 448 260.3 447.2 261.9 445.7L442.6 277C466.4 254.7 480 223.6 480 190.9V185.1C480 130.9 440.8 84.58 387.3 75.66C351.1 69.77 315.9 81.31 290.6 106.6L255.1 141.3z"></path>
                                            </svg>
                                          </fa-icon>
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <div>
                                            <fe-product-image id="product-image" class="image" _nghost-kan-c162="">
                                              <a _ngcontent-kan-c162="" id="product-image-link" href="/domates-kokteyl-kg-p-1aca278">
                                                <img _ngcontent-kan-c162="" felazyload="" alt="Domates Kokteyl Kg" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAKCAYAAABrGwT5AAAAF0lEQVR42mN89uzxfwYyAeOo5lHNhAAA7jIk17T4Y6wAAAAASUVORK5CYII=" class="ng-star-inserted">
                                                <!---->
                                                <!---->
                                                <!---->
                                              </a>
                                            </fe-product-image>
                                            <a id="product-name" class="mat-caption text-color-black product-name" ngx-ql="" href="/domates-kokteyl-kg-p-1aca278"> Domates Kokteyl Kg </a>
                                          </div>
                                          <div class="bottom-row">
                                            <fe-crm-discount-badge _nghost-kan-c343="">
                                              <!---->
                                            </fe-crm-discount-badge>
                                            <fe-product-price id="price" class="price" _nghost-kan-c275="">
                                              <div _ngcontent-kan-c275="">
                                                <!---->
                                                <div _ngcontent-kan-c275="" id="price-new" class="price-new subtitle-1 price-new-only">
                                                  <span _ngcontent-kan-c275="" id="new-amount" class="amount"> 72,95 <span _ngcontent-kan-c275="" class="currency">TL</span>
                                                  </span>
                                                </div>
                                              </div>
                                              <!---->
                                            </fe-product-price>
                                            <!---->
                                            <sm-product-actions id="actions" class="actions" _nghost-kan-c345="">
                                              <!---->
                                              <fa-icon _ngcontent-kan-c345="" class="ng-fa-icon add-to-cart-button ng-star-inserted" id="product-actions-add-to-cart-button--domates-kokteyl-kg-p-1aca278">
                                                <svg role="img" aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus" class="svg-inline--fa fa-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                  <path fill="currentColor" d="M432 256C432 269.3 421.3 280 408 280h-160v160c0 13.25-10.75 24.01-24 24.01S200 453.3 200 440v-160h-160c-13.25 0-24-10.74-24-23.99C16 242.8 26.75 232 40 232h160v-160c0-13.25 10.75-23.99 24-23.99S248 58.75 248 72v160h160C421.3 232 432 242.8 432 256z"></path>
                                                </svg>
                                              </fa-icon>
                                              <!---->
                                              <!---->
                                            </sm-product-actions>
                                          </div>
                                        </mat-card>
                                        <!---->
                                        <!---->
                                      </sm-list-page-item>
                                      <sm-list-page-item _ngcontent-kan-c364="" class="list-item mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-2-phone ng-star-inserted" style="min-width: 166px;" data-product-id="20000010019052">
                                        <mat-card class="mat-mdc-card mdc-card">
                                          <fa-icon id="fav-add-button-20000010019052" class="ng-fa-icon favourite favourite--empty ng-star-inserted">
                                            <svg role="img" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="heart" class="svg-inline--fa fa-heart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                              <path fill="currentColor" d="M255.1 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 0 232.4 0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84.02L255.1 96zM255.1 141.3L221.4 106.6C196.1 81.31 160 69.77 124.7 75.66C71.21 84.58 31.1 130.9 31.1 185.1V190.9C31.1 223.6 45.55 254.7 69.42 277L250.1 445.7C251.7 447.2 253.8 448 255.1 448C258.2 448 260.3 447.2 261.9 445.7L442.6 277C466.4 254.7 480 223.6 480 190.9V185.1C480 130.9 440.8 84.58 387.3 75.66C351.1 69.77 315.9 81.31 290.6 106.6L255.1 141.3z"></path>
                                            </svg>
                                          </fa-icon>
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <div>
                                            <fe-product-image id="product-image" class="image" _nghost-kan-c162="">
                                              <a _ngcontent-kan-c162="" id="product-image-link" href="/pinar-suzme-peynir-500-g-p-98e0ec">
                                                <img _ngcontent-kan-c162="" felazyload="" alt="Pınar Süzme Peynir 500 G" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAKCAYAAABrGwT5AAAAF0lEQVR42mN89uzxfwYyAeOo5lHNhAAA7jIk17T4Y6wAAAAASUVORK5CYII=" class="ng-star-inserted">
                                                <!---->
                                                <!---->
                                                <!---->
                                              </a>
                                            </fe-product-image>
                                            <a id="product-name" class="mat-caption text-color-black product-name" ngx-ql="" href="/pinar-suzme-peynir-500-g-p-98e0ec"> Pınar Süzme Peynir 500 G </a>
                                          </div>
                                          <div class="bottom-row">
                                            <fe-crm-discount-badge _nghost-kan-c343="">
                                              <!---->
                                            </fe-crm-discount-badge>
                                            <fe-product-price id="price" class="price" _nghost-kan-c275="">
                                              <div _ngcontent-kan-c275="">
                                                <!---->
                                                <div _ngcontent-kan-c275="" id="price-new" class="price-new subtitle-1 price-new-only">
                                                  <span _ngcontent-kan-c275="" id="new-amount" class="amount"> 110,00 <span _ngcontent-kan-c275="" class="currency">TL</span>
                                                  </span>
                                                </div>
                                              </div>
                                              <div _ngcontent-kan-c275="" id="unit-price" class="unitPrice ng-star-inserted">(220,00 TL/Kg)</div>
                                              <!---->
                                            </fe-product-price>
                                            <!---->
                                            <sm-product-actions id="actions" class="actions" _nghost-kan-c345="">
                                              <!---->
                                              <fa-icon _ngcontent-kan-c345="" class="ng-fa-icon add-to-cart-button ng-star-inserted" id="product-actions-add-to-cart-button--pinar-suzme-peynir-500-g-p-98e0ec">
                                                <svg role="img" aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus" class="svg-inline--fa fa-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                  <path fill="currentColor" d="M432 256C432 269.3 421.3 280 408 280h-160v160c0 13.25-10.75 24.01-24 24.01S200 453.3 200 440v-160h-160c-13.25 0-24-10.74-24-23.99C16 242.8 26.75 232 40 232h160v-160c0-13.25 10.75-23.99 24-23.99S248 58.75 248 72v160h160C421.3 232 432 242.8 432 256z"></path>
                                                </svg>
                                              </fa-icon>
                                              <!---->
                                              <!---->
                                            </sm-product-actions>
                                          </div>
                                        </mat-card>
                                        <!---->
                                        <!---->
                                      </sm-list-page-item>
                                      <sm-list-page-item _ngcontent-kan-c364="" class="list-item mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-2-phone ng-star-inserted" style="min-width: 166px;" data-product-id="20000005088278">
                                        <mat-card class="mat-mdc-card mdc-card">
                                          <fa-icon id="fav-add-button-20000005088278" class="ng-fa-icon favourite favourite--empty ng-star-inserted">
                                            <svg role="img" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="heart" class="svg-inline--fa fa-heart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                              <path fill="currentColor" d="M255.1 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 0 232.4 0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84.02L255.1 96zM255.1 141.3L221.4 106.6C196.1 81.31 160 69.77 124.7 75.66C71.21 84.58 31.1 130.9 31.1 185.1V190.9C31.1 223.6 45.55 254.7 69.42 277L250.1 445.7C251.7 447.2 253.8 448 255.1 448C258.2 448 260.3 447.2 261.9 445.7L442.6 277C466.4 254.7 480 223.6 480 190.9V185.1C480 130.9 440.8 84.58 387.3 75.66C351.1 69.77 315.9 81.31 290.6 106.6L255.1 141.3z"></path>
                                            </svg>
                                          </fa-icon>
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <div>
                                            <fe-product-image id="product-image" class="image" _nghost-kan-c162="">
                                              <a _ngcontent-kan-c162="" id="product-image-link" href="/lays-firindan-yogurt-mevsim-yesillikleri-patates-cipsi-parti-boy-134-gr-p-4da416">
                                                <img _ngcontent-kan-c162="" felazyload="" alt="Lay's Fırından Yoğurt Mevsim Yeşillikleri Patates Cipsi Parti Boy 134 gr" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAKCAYAAABrGwT5AAAAF0lEQVR42mN89uzxfwYyAeOo5lHNhAAA7jIk17T4Y6wAAAAASUVORK5CYII=" class="ng-star-inserted">
                                                <!---->
                                                <!---->
                                                <!---->
                                              </a>
                                            </fe-product-image>
                                            <a id="product-name" class="mat-caption text-color-black product-name" ngx-ql="" href="/lays-firindan-yogurt-mevsim-yesillikleri-patates-cipsi-parti-boy-134-gr-p-4da416"> Lay's Fırından Yoğurt Mevsim Yeşillikleri Patates Cipsi Parti Boy 134 gr </a>
                                          </div>
                                          <div class="bottom-row">
                                            <fe-crm-discount-badge _nghost-kan-c343="">
                                              <!---->
                                            </fe-crm-discount-badge>
                                            <fe-product-price id="price" class="price" _nghost-kan-c275="">
                                              <div _ngcontent-kan-c275="">
                                                <!---->
                                                <div _ngcontent-kan-c275="" id="price-new" class="price-new subtitle-1 price-new-only">
                                                  <span _ngcontent-kan-c275="" id="new-amount" class="amount"> 37,95 <span _ngcontent-kan-c275="" class="currency">TL</span>
                                                  </span>
                                                </div>
                                              </div>
                                              <div _ngcontent-kan-c275="" id="unit-price" class="unitPrice ng-star-inserted">(283,20 TL/Kg)</div>
                                              <!---->
                                            </fe-product-price>
                                            <!---->
                                            <sm-product-actions id="actions" class="actions" _nghost-kan-c345="">
                                              <!---->
                                              <fa-icon _ngcontent-kan-c345="" class="ng-fa-icon add-to-cart-button ng-star-inserted" id="product-actions-add-to-cart-button--lays-firindan-yogurt-mevsim-yesillikleri-patates-cipsi-parti-boy-134-gr-p-4da416">
                                                <svg role="img" aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus" class="svg-inline--fa fa-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                  <path fill="currentColor" d="M432 256C432 269.3 421.3 280 408 280h-160v160c0 13.25-10.75 24.01-24 24.01S200 453.3 200 440v-160h-160c-13.25 0-24-10.74-24-23.99C16 242.8 26.75 232 40 232h160v-160c0-13.25 10.75-23.99 24-23.99S248 58.75 248 72v160h160C421.3 232 432 242.8 432 256z"></path>
                                                </svg>
                                              </fa-icon>
                                              <!---->
                                              <!---->
                                            </sm-product-actions>
                                          </div>
                                        </mat-card>
                                        <!---->
                                        <!---->
                                      </sm-list-page-item>
                                      <!---->
                                    </div>
                                    <!---->
                                    <!---->
                                    <div _ngcontent-kan-c364="" class="next-btn ng-star-inserted"></div>
                                    <!---->
                                    <div _ngcontent-kan-c364="" class="fade-out"></div>
                                  </div>
                                  <!---->
                                </div>
                              </mat-tab-body>
                              <!---->
                            </div>
                          </mat-tab-group>
                          <!---->
                        </div>
                      </div>
                    </sm-product-list-slider>
                    <!---->
                    <sm-product-list-slider id="benzer-urunler" title="Benzer Alabileceğin Ürünler" class="similar-products-vwo ng-star-inserted" _nghost-kan-c364="">
                      <div _ngcontent-kan-c364="" class="home-page-wrapper mdc-layout-grid__inner">
                        <div _ngcontent-kan-c364="" class="section mdc-layout-grid__cell--span-12">
                          <div _ngcontent-kan-c364="" class="d-flex ng-star-inserted">
                            <div _ngcontent-kan-c364="" class="section-title mat-headline text-color-black">Benzer Alabileceğin Ürünler</div>
                          </div>
                          <!---->
                          <mat-tab-group _ngcontent-kan-c364="" class="mat-mdc-tab-group mat-primary mat-mdc-tab-group-stretch-tabs ng-star-inserted">
                            <mat-tab-header class="mat-mdc-tab-header" style="display: none;">
                              <button aria-hidden="true" type="button" mat-ripple="" tabindex="-1" class="mat-ripple mat-mdc-tab-header-pagination mat-mdc-tab-header-pagination-before mat-mdc-tab-header-pagination-disabled" disabled="">
                                <div class="mat-mdc-tab-header-pagination-chevron"></div>
                              </button>
                              <div class="mat-mdc-tab-label-container">
                                <div role="tablist" class="mat-mdc-tab-list" style="transform: translateX(0px);">
                                  <div class="mat-mdc-tab-labels">
                                    <div role="tab" mattablabelwrapper="" cdkmonitorelementfocus="" class="mdc-tab mat-mdc-tab mat-mdc-focus-indicator mdc-tab--active ng-star-inserted mdc-tab-indicator--active" id="mat-tab-label-3-0" tabindex="0" aria-posinset="1" aria-setsize="1" aria-controls="mat-tab-content-3-0" aria-selected="true" aria-disabled="false">
                                      <span class="mdc-tab__ripple"></span>
                                      <div mat-ripple="" class="mat-ripple mat-mdc-tab-ripple"></div>
                                      <span class="mdc-tab__content">
                                        <span class="mdc-tab__text-label">shoppingList.name
                                          <!---->
                                          <!---->
                                        </span>
                                      </span>
                                      <span class="mdc-tab-indicator">
                                        <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                                      </span>
                                    </div>
                                    <!---->
                                  </div>
                                </div>
                              </div>
                              <button aria-hidden="true" type="button" mat-ripple="" tabindex="-1" class="mat-ripple mat-mdc-tab-header-pagination mat-mdc-tab-header-pagination-after mat-mdc-header-pagination-disabled" disabled="">
                                <div class="mat-mdc-tab-header-pagination-chevron"></div>
                              </button>
                            </mat-tab-header>
                            <div class="mat-mdc-tab-body-wrapper">
                              <mat-tab-body role="tabpanel" class="mat-mdc-tab-body ng-tns-c229-6 mat-mdc-tab-body-active ng-star-inserted" id="mat-tab-content-3-0" aria-labelledby="mat-tab-label-3-0">
                                <div cdkscrollable="" class="mat-mdc-tab-body-content ng-tns-c229-6 ng-trigger ng-trigger-translateTab" style="transform: none;">
                                  <div _ngcontent-kan-c364="" class="container-wrapper ng-star-inserted" style="">
                                    <div _ngcontent-kan-c364="" class="prev-btn ng-star-inserted"></div>
                                    <!---->
                                    <div _ngcontent-kan-c364="" class="horizontal-list-page-items-container in-mat-tab-group ng-star-inserted">
                                      <sm-list-page-item _ngcontent-kan-c364="" class="list-item mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-2-phone ng-star-inserted" style="min-width: 166px;" data-product-id="20000008089867">
                                        <mat-card class="mat-mdc-card mdc-card">
                                          <fa-icon id="fav-add-button-20000008089867" class="ng-fa-icon favourite favourite--empty ng-star-inserted">
                                            <svg role="img" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="heart" class="svg-inline--fa fa-heart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                              <path fill="currentColor" d="M255.1 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 0 232.4 0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84.02L255.1 96zM255.1 141.3L221.4 106.6C196.1 81.31 160 69.77 124.7 75.66C71.21 84.58 31.1 130.9 31.1 185.1V190.9C31.1 223.6 45.55 254.7 69.42 277L250.1 445.7C251.7 447.2 253.8 448 255.1 448C258.2 448 260.3 447.2 261.9 445.7L442.6 277C466.4 254.7 480 223.6 480 190.9V185.1C480 130.9 440.8 84.58 387.3 75.66C351.1 69.77 315.9 81.31 290.6 106.6L255.1 141.3z"></path>
                                            </svg>
                                          </fa-icon>
                                          <!---->
                                          <!---->
                                          <!---->
                                          <div id="discount-badge" class="discount-badge ng-star-inserted">
                                            <div>
                                              <span id="discount-badge--percent" class="discount-badge--percent">%</span>
                                              <span id="discount-badge--unit" class="discount-badge--unit">19</span>
                                            </div>
                                            <div id="discount-badge--label" class="discount-badge--label">İNDİRİM</div>
                                          </div>
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <div>
                                            <fe-product-image id="product-image" class="image" _nghost-kan-c162="">
                                              <a _ngcontent-kan-c162="" id="product-image-link" href="/by-izzet-kavrulmus-badem-150-g-p-7b710b">
                                                <img _ngcontent-kan-c162="" felazyload="" alt="By İzzet Kavrulmuş Badem 150 G" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAKCAYAAABrGwT5AAAAF0lEQVR42mN89uzxfwYyAeOo5lHNhAAA7jIk17T4Y6wAAAAASUVORK5CYII=" class="ng-star-inserted">
                                                <!---->
                                                <!---->
                                                <!---->
                                              </a>
                                            </fe-product-image>
                                            <a id="product-name" class="mat-caption text-color-black product-name" ngx-ql="" href="/by-izzet-kavrulmus-badem-150-g-p-7b710b"> By İzzet Kavrulmuş Badem 150 G </a>
                                          </div>
                                          <div class="bottom-row">
                                            <fe-crm-discount-badge _nghost-kan-c343="">
                                              <!---->
                                            </fe-crm-discount-badge>
                                            <fe-product-price id="price" class="price" _nghost-kan-c275="">
                                              <div _ngcontent-kan-c275="" class="promotion-wrapper">
                                                <div _ngcontent-kan-c275="" id="price-old" class="price-old ng-star-inserted">
                                                  <span _ngcontent-kan-c275="" id="old-amount" class="amount">79,90 <span _ngcontent-kan-c275="" class="currency">TL</span>
                                                  </span>
                                                </div>
                                                <!---->
                                                <div _ngcontent-kan-c275="" id="price-new" class="price-new subtitle-1">
                                                  <span _ngcontent-kan-c275="" id="new-amount" class="amount"> 64,90 <span _ngcontent-kan-c275="" class="currency">TL</span>
                                                  </span>
                                                </div>
                                              </div>
                                              <div _ngcontent-kan-c275="" id="unit-price" class="unitPrice ng-star-inserted">(432,66 TL/Kg)</div>
                                              <!---->
                                            </fe-product-price>
                                            <!---->
                                            <sm-product-actions id="actions" class="actions" _nghost-kan-c345="">
                                              <!---->
                                              <fa-icon _ngcontent-kan-c345="" class="ng-fa-icon add-to-cart-button ng-star-inserted" id="product-actions-add-to-cart-button--by-izzet-kavrulmus-badem-150-g-p-7b710b">
                                                <svg role="img" aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus" class="svg-inline--fa fa-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                  <path fill="currentColor" d="M432 256C432 269.3 421.3 280 408 280h-160v160c0 13.25-10.75 24.01-24 24.01S200 453.3 200 440v-160h-160c-13.25 0-24-10.74-24-23.99C16 242.8 26.75 232 40 232h160v-160c0-13.25 10.75-23.99 24-23.99S248 58.75 248 72v160h160C421.3 232 432 242.8 432 256z"></path>
                                                </svg>
                                              </fa-icon>
                                              <!---->
                                              <!---->
                                            </sm-product-actions>
                                          </div>
                                        </mat-card>
                                        <!---->
                                        <!---->
                                      </sm-list-page-item>
                                      <sm-list-page-item _ngcontent-kan-c364="" class="list-item mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-2-phone ng-star-inserted" style="min-width: 166px;" data-product-id="20000008079677">
                                        <mat-card class="mat-mdc-card mdc-card">
                                          <fa-icon id="fav-add-button-20000008079677" class="ng-fa-icon favourite favourite--empty ng-star-inserted">
                                            <svg role="img" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="heart" class="svg-inline--fa fa-heart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                              <path fill="currentColor" d="M255.1 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 0 232.4 0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84.02L255.1 96zM255.1 141.3L221.4 106.6C196.1 81.31 160 69.77 124.7 75.66C71.21 84.58 31.1 130.9 31.1 185.1V190.9C31.1 223.6 45.55 254.7 69.42 277L250.1 445.7C251.7 447.2 253.8 448 255.1 448C258.2 448 260.3 447.2 261.9 445.7L442.6 277C466.4 254.7 480 223.6 480 190.9V185.1C480 130.9 440.8 84.58 387.3 75.66C351.1 69.77 315.9 81.31 290.6 106.6L255.1 141.3z"></path>
                                            </svg>
                                          </fa-icon>
                                          <!---->
                                          <!---->
                                          <!---->
                                          <div id="discount-badge" class="discount-badge ng-star-inserted">
                                            <div>
                                              <span id="discount-badge--percent" class="discount-badge--percent">%</span>
                                              <span id="discount-badge--unit" class="discount-badge--unit">22</span>
                                            </div>
                                            <div id="discount-badge--label" class="discount-badge--label">İNDİRİM</div>
                                          </div>
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <div>
                                            <fe-product-image id="product-image" class="image" _nghost-kan-c162="">
                                              <a _ngcontent-kan-c162="" id="product-image-link" href="/senocak-kavrulmus-findik-200-g-p-7b493d">
                                                <img _ngcontent-kan-c162="" felazyload="" alt="Şenocak Kavrulmuş Fındık 200 G" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAKCAYAAABrGwT5AAAAF0lEQVR42mN89uzxfwYyAeOo5lHNhAAA7jIk17T4Y6wAAAAASUVORK5CYII=" class="ng-star-inserted">
                                                <!---->
                                                <!---->
                                                <!---->
                                              </a>
                                            </fe-product-image>
                                            <a id="product-name" class="mat-caption text-color-black product-name" ngx-ql="" href="/senocak-kavrulmus-findik-200-g-p-7b493d"> Şenocak Kavrulmuş Fındık 200 G </a>
                                          </div>
                                          <div class="bottom-row">
                                            <fe-crm-discount-badge _nghost-kan-c343="">
                                              <!---->
                                            </fe-crm-discount-badge>
                                            <fe-product-price id="price" class="price" _nghost-kan-c275="">
                                              <div _ngcontent-kan-c275="" class="promotion-wrapper">
                                                <div _ngcontent-kan-c275="" id="price-old" class="price-old ng-star-inserted">
                                                  <span _ngcontent-kan-c275="" id="old-amount" class="amount">114,90 <span _ngcontent-kan-c275="" class="currency">TL</span>
                                                  </span>
                                                </div>
                                                <!---->
                                                <div _ngcontent-kan-c275="" id="price-new" class="price-new subtitle-1">
                                                  <span _ngcontent-kan-c275="" id="new-amount" class="amount"> 89,90 <span _ngcontent-kan-c275="" class="currency">TL</span>
                                                  </span>
                                                </div>
                                              </div>
                                              <div _ngcontent-kan-c275="" id="unit-price" class="unitPrice ng-star-inserted">(449,50 TL/Kg)</div>
                                              <!---->
                                            </fe-product-price>
                                            <!---->
                                            <sm-product-actions id="actions" class="actions" _nghost-kan-c345="">
                                              <!---->
                                              <fa-icon _ngcontent-kan-c345="" class="ng-fa-icon add-to-cart-button ng-star-inserted" id="product-actions-add-to-cart-button--senocak-kavrulmus-findik-200-g-p-7b493d">
                                                <svg role="img" aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus" class="svg-inline--fa fa-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                  <path fill="currentColor" d="M432 256C432 269.3 421.3 280 408 280h-160v160c0 13.25-10.75 24.01-24 24.01S200 453.3 200 440v-160h-160c-13.25 0-24-10.74-24-23.99C16 242.8 26.75 232 40 232h160v-160c0-13.25 10.75-23.99 24-23.99S248 58.75 248 72v160h160C421.3 232 432 242.8 432 256z"></path>
                                                </svg>
                                              </fa-icon>
                                              <!---->
                                              <!---->
                                            </sm-product-actions>
                                          </div>
                                        </mat-card>
                                        <!---->
                                        <!---->
                                      </sm-list-page-item>
                                      <sm-list-page-item _ngcontent-kan-c364="" class="list-item mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-2-phone ng-star-inserted" style="min-width: 166px;" data-product-id="20000008089962">
                                        <mat-card class="mat-mdc-card mdc-card">
                                          <fa-icon id="fav-add-button-20000008089962" class="ng-fa-icon favourite favourite--empty ng-star-inserted">
                                            <svg role="img" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="heart" class="svg-inline--fa fa-heart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                              <path fill="currentColor" d="M255.1 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 0 232.4 0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84.02L255.1 96zM255.1 141.3L221.4 106.6C196.1 81.31 160 69.77 124.7 75.66C71.21 84.58 31.1 130.9 31.1 185.1V190.9C31.1 223.6 45.55 254.7 69.42 277L250.1 445.7C251.7 447.2 253.8 448 255.1 448C258.2 448 260.3 447.2 261.9 445.7L442.6 277C466.4 254.7 480 223.6 480 190.9V185.1C480 130.9 440.8 84.58 387.3 75.66C351.1 69.77 315.9 81.31 290.6 106.6L255.1 141.3z"></path>
                                            </svg>
                                          </fa-icon>
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <div>
                                            <fe-product-image id="product-image" class="image" _nghost-kan-c162="">
                                              <a _ngcontent-kan-c162="" id="product-image-link" href="/tadim-bol-tuzlu-kavrulmus-siyah-aycekirdek-180-g-p-7b716a">
                                                <img _ngcontent-kan-c162="" felazyload="" alt="Tadım Bol Tuzlu Kavrulmuş Siyah Ayçekirdek 180 G" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAKCAYAAABrGwT5AAAAF0lEQVR42mN89uzxfwYyAeOo5lHNhAAA7jIk17T4Y6wAAAAASUVORK5CYII=" class="ng-star-inserted">
                                                <!---->
                                                <!---->
                                                <!---->
                                              </a>
                                            </fe-product-image>
                                            <a id="product-name" class="mat-caption text-color-black product-name" ngx-ql="" href="/tadim-bol-tuzlu-kavrulmus-siyah-aycekirdek-180-g-p-7b716a"> Tadım Bol Tuzlu Kavrulmuş Siyah Ayçekirdek 180 G </a>
                                          </div>
                                          <div class="bottom-row">
                                            <fe-crm-discount-badge _nghost-kan-c343="">
                                              <!---->
                                            </fe-crm-discount-badge>
                                            <fe-product-price id="price" class="price" _nghost-kan-c275="">
                                              <div _ngcontent-kan-c275="">
                                                <!---->
                                                <div _ngcontent-kan-c275="" id="price-new" class="price-new subtitle-1 price-new-only"><span _ngcontent-kan-c275="" id="new-amount" class="amount"> 35,00 <span _ngcontent-kan-c275="" class="currency">TL</span></span>
                                                </div>
                                              </div>
                                              <div _ngcontent-kan-c275="" id="unit-price" class="unitPrice ng-star-inserted">(194,44 TL/Kg)</div>
                                              <!---->
                                            </fe-product-price>
                                            <!---->
                                            <sm-product-actions id="actions" class="actions" _nghost-kan-c345="">
                                              <!---->
                                              <fa-icon _ngcontent-kan-c345="" class="ng-fa-icon add-to-cart-button ng-star-inserted" id="product-actions-add-to-cart-button--tadim-bol-tuzlu-kavrulmus-siyah-aycekirdek-180-g-p-7b716a">
                                                <svg role="img" aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus" class="svg-inline--fa fa-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M432 256C432 269.3 421.3 280 408 280h-160v160c0 13.25-10.75 24.01-24 24.01S200 453.3 200 440v-160h-160c-13.25 0-24-10.74-24-23.99C16 242.8 26.75 232 40 232h160v-160c0-13.25 10.75-23.99 24-23.99S248 58.75 248 72v160h160C421.3 232 432 242.8 432 256z"></path>
                                                </svg>
                                              </fa-icon>
                                              <!---->
                                              <!---->
                                            </sm-product-actions>
                                          </div>
                                        </mat-card>
                                        <!---->
                                        <!---->
                                      </sm-list-page-item>
                                      <sm-list-page-item _ngcontent-kan-c364="" class="list-item mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-2-phone ng-star-inserted" style="min-width: 166px;" data-product-id="20000008089819">
                                        <mat-card class="mat-mdc-card mdc-card">
                                          <fa-icon id="fav-add-button-20000008089819" class="ng-fa-icon favourite favourite--empty ng-star-inserted">
                                            <svg role="img" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="heart" class="svg-inline--fa fa-heart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                              <path fill="currentColor" d="M255.1 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 0 232.4 0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84.02L255.1 96zM255.1 141.3L221.4 106.6C196.1 81.31 160 69.77 124.7 75.66C71.21 84.58 31.1 130.9 31.1 185.1V190.9C31.1 223.6 45.55 254.7 69.42 277L250.1 445.7C251.7 447.2 253.8 448 255.1 448C258.2 448 260.3 447.2 261.9 445.7L442.6 277C466.4 254.7 480 223.6 480 190.9V185.1C480 130.9 440.8 84.58 387.3 75.66C351.1 69.77 315.9 81.31 290.6 106.6L255.1 141.3z"></path>
                                            </svg>
                                          </fa-icon>
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <div>
                                            <fe-product-image id="product-image" class="image" _nghost-kan-c162="">
                                              <a _ngcontent-kan-c162="" id="product-image-link" href="/tadim-kavrulmus-siyah-aycekirdegi-180-g-p-7b70db">
                                                <img _ngcontent-kan-c162="" felazyload="" alt="Tadım Kavrulmuş Siyah Ayçekirdeği 180 G" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAKCAYAAABrGwT5AAAAF0lEQVR42mN89uzxfwYyAeOo5lHNhAAA7jIk17T4Y6wAAAAASUVORK5CYII=" class="ng-star-inserted">
                                                <!---->
                                                <!---->
                                                <!---->
                                              </a>
                                            </fe-product-image>
                                            <a id="product-name" class="mat-caption text-color-black product-name" ngx-ql="" href="/tadim-kavrulmus-siyah-aycekirdegi-180-g-p-7b70db"> Tadım Kavrulmuş Siyah Ayçekirdeği 180 G </a>
                                          </div>
                                          <div class="bottom-row">
                                            <fe-crm-discount-badge _nghost-kan-c343="">
                                              <!---->
                                            </fe-crm-discount-badge>
                                            <fe-product-price id="price" class="price" _nghost-kan-c275="">
                                              <div _ngcontent-kan-c275="">
                                                <!----><div _ngcontent-kan-c275="" id="price-new" class="price-new subtitle-1 price-new-only"><span _ngcontent-kan-c275="" id="new-amount" class="amount"> 35,00 <span _ngcontent-kan-c275="" class="currency">TL</span></span></div>
                                              </div>
                                              <div _ngcontent-kan-c275="" id="unit-price" class="unitPrice ng-star-inserted">(194,44 TL/Kg)</div>
                                              <!---->
                                            </fe-product-price>
                                            <!---->
                                            <sm-product-actions id="actions" class="actions" _nghost-kan-c345="">
                                              <!---->
                                              <fa-icon _ngcontent-kan-c345="" class="ng-fa-icon add-to-cart-button ng-star-inserted" id="product-actions-add-to-cart-button--tadim-kavrulmus-siyah-aycekirdegi-180-g-p-7b70db"><svg role="img" aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus" class="svg-inline--fa fa-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M432 256C432 269.3 421.3 280 408 280h-160v160c0 13.25-10.75 24.01-24 24.01S200 453.3 200 440v-160h-160c-13.25 0-24-10.74-24-23.99C16 242.8 26.75 232 40 232h160v-160c0-13.25 10.75-23.99 24-23.99S248 58.75 248 72v160h160C421.3 232 432 242.8 432 256z"></path></svg>
                                              </fa-icon>
                                              <!---->
                                              <!---->
                                            </sm-product-actions>
                                          </div>
                                        </mat-card>
                                        <!---->
                                        <!---->
                                      </sm-list-page-item>
                                      <sm-list-page-item _ngcontent-kan-c364="" class="list-item mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-2-phone ng-star-inserted" style="min-width: 166px;" data-product-id="20000008097404">
                                        <mat-card class="mat-mdc-card mdc-card">
                                          <fa-icon id="fav-add-button-20000008097404" class="ng-fa-icon favourite favourite--empty ng-star-inserted">
                                            <svg role="img" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="heart" class="svg-inline--fa fa-heart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                              <path fill="currentColor" d="M255.1 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 0 232.4 0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84.02L255.1 96zM255.1 141.3L221.4 106.6C196.1 81.31 160 69.77 124.7 75.66C71.21 84.58 31.1 130.9 31.1 185.1V190.9C31.1 223.6 45.55 254.7 69.42 277L250.1 445.7C251.7 447.2 253.8 448 255.1 448C258.2 448 260.3 447.2 261.9 445.7L442.6 277C466.4 254.7 480 223.6 480 190.9V185.1C480 130.9 440.8 84.58 387.3 75.66C351.1 69.77 315.9 81.31 290.6 106.6L255.1 141.3z"></path>
                                            </svg>
                                          </fa-icon>
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <div>
                                            <fe-product-image id="product-image" class="image" _nghost-kan-c162="">
                                              <a _ngcontent-kan-c162="" id="product-image-link" href="/tadim-kabak-cekirdegi-180-g-p-7b8e7c"><img _ngcontent-kan-c162="" felazyload="" alt="Tadım Kabak Çekirdeği 180 G" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAKCAYAAABrGwT5AAAAF0lEQVR42mN89uzxfwYyAeOo5lHNhAAA7jIk17T4Y6wAAAAASUVORK5CYII=" class="ng-star-inserted">
                                                <!---->
                                                <!---->
                                                <!---->
                                              </a>
                                            </fe-product-image>
                                            <a id="product-name" class="mat-caption text-color-black product-name" ngx-ql="" href="/tadim-kabak-cekirdegi-180-g-p-7b8e7c"> Tadım Kabak Çekirdeği 180 G </a>
                                          </div>
                                          <div class="bottom-row">
                                            <fe-crm-discount-badge _nghost-kan-c343="">
                                              <!---->
                                            </fe-crm-discount-badge>
                                            <fe-product-price id="price" class="price" _nghost-kan-c275=""><div _ngcontent-kan-c275="">
                                                <!----><div _ngcontent-kan-c275="" id="price-new" class="price-new subtitle-1 price-new-only"><span _ngcontent-kan-c275="" id="new-amount" class="amount"> 62,90 <span _ngcontent-kan-c275="" class="currency">TL</span></span></div>
                                              </div><div _ngcontent-kan-c275="" id="unit-price" class="unitPrice ng-star-inserted">(349,44 TL/Kg)</div>
                                              <!---->
                                            </fe-product-price>
                                            <!---->
                                            <sm-product-actions id="actions" class="actions" _nghost-kan-c345="">
                                              <!----><fa-icon _ngcontent-kan-c345="" class="ng-fa-icon add-to-cart-button ng-star-inserted" id="product-actions-add-to-cart-button--tadim-kabak-cekirdegi-180-g-p-7b8e7c"><svg role="img" aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus" class="svg-inline--fa fa-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M432 256C432 269.3 421.3 280 408 280h-160v160c0 13.25-10.75 24.01-24 24.01S200 453.3 200 440v-160h-160c-13.25 0-24-10.74-24-23.99C16 242.8 26.75 232 40 232h160v-160c0-13.25 10.75-23.99 24-23.99S248 58.75 248 72v160h160C421.3 232 432 242.8 432 256z"></path></svg></fa-icon>
                                              <!---->
                                              <!---->
                                            </sm-product-actions>
                                          </div>
                                        </mat-card>
                                        <!---->
                                        <!---->
                                      </sm-list-page-item>
                                      <sm-list-page-item _ngcontent-kan-c364="" class="list-item mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-2-phone ng-star-inserted" style="min-width: 166px;" data-product-id="20000008084038">
                                        <mat-card class="mat-mdc-card mdc-card">
                                          <fa-icon id="fav-add-button-20000008084038" class="ng-fa-icon favourite favourite--empty ng-star-inserted">
                                            <svg role="img" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="heart" class="svg-inline--fa fa-heart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M255.1 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 0 232.4 0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84.02L255.1 96zM255.1 141.3L221.4 106.6C196.1 81.31 160 69.77 124.7 75.66C71.21 84.58 31.1 130.9 31.1 185.1V190.9C31.1 223.6 45.55 254.7 69.42 277L250.1 445.7C251.7 447.2 253.8 448 255.1 448C258.2 448 260.3 447.2 261.9 445.7L442.6 277C466.4 254.7 480 223.6 480 190.9V185.1C480 130.9 440.8 84.58 387.3 75.66C351.1 69.77 315.9 81.31 290.6 106.6L255.1 141.3z"></path>
                                            </svg>
                                          </fa-icon>
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <div>
                                            <fe-product-image id="product-image" class="image" _nghost-kan-c162=""><a _ngcontent-kan-c162="" id="product-image-link" href="/migros-sari-leblebi-200-g-p-7b5a46"><img _ngcontent-kan-c162="" felazyload="" alt="Migros Sarı Leblebi 200 G" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAKCAYAAABrGwT5AAAAF0lEQVR42mN89uzxfwYyAeOo5lHNhAAA7jIk17T4Y6wAAAAASUVORK5CYII=" class="ng-star-inserted">
                                                <!---->
                                                <!---->
                                                <!---->
                                              </a></fe-product-image><a id="product-name" class="mat-caption text-color-black product-name" ngx-ql="" href="/migros-sari-leblebi-200-g-p-7b5a46"> Migros Sarı Leblebi 200 G </a>
                                          </div>
                                          <div class="bottom-row"><fe-crm-discount-badge _nghost-kan-c343="">
                                              <!---->
                                            </fe-crm-discount-badge><fe-product-price id="price" class="price" _nghost-kan-c275=""><div _ngcontent-kan-c275="">
                                                <!----><div _ngcontent-kan-c275="" id="price-new" class="price-new subtitle-1 price-new-only"><span _ngcontent-kan-c275="" id="new-amount" class="amount"> 26,50 <span _ngcontent-kan-c275="" class="currency">TL</span></span></div>
                                              </div><div _ngcontent-kan-c275="" id="unit-price" class="unitPrice ng-star-inserted">(132,50 TL/Kg)</div>
                                              <!---->
                                            </fe-product-price>
                                            <!----><sm-product-actions id="actions" class="actions" _nghost-kan-c345="">
                                              <!----><fa-icon _ngcontent-kan-c345="" class="ng-fa-icon add-to-cart-button ng-star-inserted" id="product-actions-add-to-cart-button--migros-sari-leblebi-200-g-p-7b5a46"><svg role="img" aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus" class="svg-inline--fa fa-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M432 256C432 269.3 421.3 280 408 280h-160v160c0 13.25-10.75 24.01-24 24.01S200 453.3 200 440v-160h-160c-13.25 0-24-10.74-24-23.99C16 242.8 26.75 232 40 232h160v-160c0-13.25 10.75-23.99 24-23.99S248 58.75 248 72v160h160C421.3 232 432 242.8 432 256z"></path></svg></fa-icon>
                                              <!---->
                                              <!---->
                                            </sm-product-actions>
                                          </div>
                                        </mat-card>
                                        <!---->
                                        <!---->
                                      </sm-list-page-item>
                                      <sm-list-page-item _ngcontent-kan-c364="" class="list-item mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-2-phone ng-star-inserted" style="min-width: 166px;" data-product-id="20000008087855">
                                        <mat-card class="mat-mdc-card mdc-card">
                                          <fa-icon id="fav-add-button-20000008087855" class="ng-fa-icon favourite favourite--empty ng-star-inserted"><svg role="img" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="heart" class="svg-inline--fa fa-heart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M255.1 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 0 232.4 0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84.02L255.1 96zM255.1 141.3L221.4 106.6C196.1 81.31 160 69.77 124.7 75.66C71.21 84.58 31.1 130.9 31.1 185.1V190.9C31.1 223.6 45.55 254.7 69.42 277L250.1 445.7C251.7 447.2 253.8 448 255.1 448C258.2 448 260.3 447.2 261.9 445.7L442.6 277C466.4 254.7 480 223.6 480 190.9V185.1C480 130.9 440.8 84.58 387.3 75.66C351.1 69.77 315.9 81.31 290.6 106.6L255.1 141.3z"></path></svg>
                                          </fa-icon>
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <div><fe-product-image id="product-image" class="image" _nghost-kan-c162=""><a _ngcontent-kan-c162="" id="product-image-link" href="/peyman-bahceden-kavrulmus-findik-160-g-p-7b692f"><img _ngcontent-kan-c162="" felazyload="" alt="Peyman Bahçeden Kavrulmuş Fındık 160 G" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAKCAYAAABrGwT5AAAAF0lEQVR42mN89uzxfwYyAeOo5lHNhAAA7jIk17T4Y6wAAAAASUVORK5CYII=" class="ng-star-inserted">
                                                <!---->
                                                <!---->
                                                <!---->
                                              </a></fe-product-image><a id="product-name" class="mat-caption text-color-black product-name" ngx-ql="" href="/peyman-bahceden-kavrulmus-findik-160-g-p-7b692f"> Peyman Bahçeden Kavrulmuş Fındık 160 G </a></div><div class="bottom-row"><fe-crm-discount-badge _nghost-kan-c343="">
                                              <!---->
                                            </fe-crm-discount-badge><fe-product-price id="price" class="price" _nghost-kan-c275=""><div _ngcontent-kan-c275="">
                                                <!----><div _ngcontent-kan-c275="" id="price-new" class="price-new subtitle-1 price-new-only"><span _ngcontent-kan-c275="" id="new-amount" class="amount"> 107,90 <span _ngcontent-kan-c275="" class="currency">TL</span></span></div>
                                              </div><div _ngcontent-kan-c275="" id="unit-price" class="unitPrice ng-star-inserted">(674,37 TL/Kg)</div>
                                              <!---->
                                            </fe-product-price>
                                            <!----><sm-product-actions id="actions" class="actions" _nghost-kan-c345="">
                                              <!----><fa-icon _ngcontent-kan-c345="" class="ng-fa-icon add-to-cart-button ng-star-inserted" id="product-actions-add-to-cart-button--peyman-bahceden-kavrulmus-findik-160-g-p-7b692f"><svg role="img" aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus" class="svg-inline--fa fa-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M432 256C432 269.3 421.3 280 408 280h-160v160c0 13.25-10.75 24.01-24 24.01S200 453.3 200 440v-160h-160c-13.25 0-24-10.74-24-23.99C16 242.8 26.75 232 40 232h160v-160c0-13.25 10.75-23.99 24-23.99S248 58.75 248 72v160h160C421.3 232 432 242.8 432 256z"></path></svg></fa-icon>
                                              <!---->
                                              <!---->
                                            </sm-product-actions>
                                          </div>
                                        </mat-card>
                                        <!---->
                                        <!---->
                                      </sm-list-page-item>
                                      <sm-list-page-item _ngcontent-kan-c364="" class="list-item mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-2-phone ng-star-inserted" style="min-width: 166px;" data-product-id="20000008084037">
                                        <mat-card class="mat-mdc-card mdc-card"><fa-icon id="fav-add-button-20000008084037" class="ng-fa-icon favourite favourite--empty ng-star-inserted"><svg role="img" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="heart" class="svg-inline--fa fa-heart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M255.1 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 0 232.4 0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84.02L255.1 96zM255.1 141.3L221.4 106.6C196.1 81.31 160 69.77 124.7 75.66C71.21 84.58 31.1 130.9 31.1 185.1V190.9C31.1 223.6 45.55 254.7 69.42 277L250.1 445.7C251.7 447.2 253.8 448 255.1 448C258.2 448 260.3 447.2 261.9 445.7L442.6 277C466.4 254.7 480 223.6 480 190.9V185.1C480 130.9 440.8 84.58 387.3 75.66C351.1 69.77 315.9 81.31 290.6 106.6L255.1 141.3z"></path></svg></fa-icon>
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!----><div><fe-product-image id="product-image" class="image" _nghost-kan-c162=""><a _ngcontent-kan-c162="" id="product-image-link" href="/migros-karisik-kuruyemis-200-g-p-7b5a45"><img _ngcontent-kan-c162="" felazyload="" alt="Migros Karışık Kuruyemiş 200 G" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAKCAYAAABrGwT5AAAAF0lEQVR42mN89uzxfwYyAeOo5lHNhAAA7jIk17T4Y6wAAAAASUVORK5CYII=" class="ng-star-inserted">
                                                <!---->
                                                <!---->
                                                <!---->
                                              </a></fe-product-image><a id="product-name" class="mat-caption text-color-black product-name" ngx-ql="" href="/migros-karisik-kuruyemis-200-g-p-7b5a45"> Migros Karışık Kuruyemiş 200 G </a></div><div class="bottom-row"><fe-crm-discount-badge _nghost-kan-c343="">
                                              <!---->
                                            </fe-crm-discount-badge><fe-product-price id="price" class="price" _nghost-kan-c275=""><div _ngcontent-kan-c275="">
                                                <!----><div _ngcontent-kan-c275="" id="price-new" class="price-new subtitle-1 price-new-only"><span _ngcontent-kan-c275="" id="new-amount" class="amount"> 72,50 <span _ngcontent-kan-c275="" class="currency">TL</span></span></div>
                                              </div><div _ngcontent-kan-c275="" id="unit-price" class="unitPrice ng-star-inserted">(362,50 TL/Kg)</div>
                                              <!---->
                                            </fe-product-price>
                                            <!----><sm-product-actions id="actions" class="actions" _nghost-kan-c345="">
                                              <!----><fa-icon _ngcontent-kan-c345="" class="ng-fa-icon add-to-cart-button ng-star-inserted" id="product-actions-add-to-cart-button--migros-karisik-kuruyemis-200-g-p-7b5a45"><svg role="img" aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus" class="svg-inline--fa fa-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M432 256C432 269.3 421.3 280 408 280h-160v160c0 13.25-10.75 24.01-24 24.01S200 453.3 200 440v-160h-160c-13.25 0-24-10.74-24-23.99C16 242.8 26.75 232 40 232h160v-160c0-13.25 10.75-23.99 24-23.99S248 58.75 248 72v160h160C421.3 232 432 242.8 432 256z"></path></svg></fa-icon>
                                              <!---->
                                              <!---->
                                            </sm-product-actions>
                                          </div>
                                        </mat-card>
                                        <!---->
                                        <!---->
                                      </sm-list-page-item>
                                      <sm-list-page-item _ngcontent-kan-c364="" class="list-item mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-2-phone ng-star-inserted" style="min-width: 166px;" data-product-id="20000008079756"><mat-card class="mat-mdc-card mdc-card"><fa-icon id="fav-add-button-20000008079756" class="ng-fa-icon favourite favourite--empty ng-star-inserted"><svg role="img" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="heart" class="svg-inline--fa fa-heart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M255.1 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 0 232.4 0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84.02L255.1 96zM255.1 141.3L221.4 106.6C196.1 81.31 160 69.77 124.7 75.66C71.21 84.58 31.1 130.9 31.1 185.1V190.9C31.1 223.6 45.55 254.7 69.42 277L250.1 445.7C251.7 447.2 253.8 448 255.1 448C258.2 448 260.3 447.2 261.9 445.7L442.6 277C466.4 254.7 480 223.6 480 190.9V185.1C480 130.9 440.8 84.58 387.3 75.66C351.1 69.77 315.9 81.31 290.6 106.6L255.1 141.3z"></path></svg></fa-icon>
                                          <!---->
                                          <!---->
                                          <!----><div id="discount-badge" class="discount-badge ng-star-inserted"><div><span id="discount-badge--percent" class="discount-badge--percent">%</span><span id="discount-badge--unit" class="discount-badge--unit">20</span></div><div id="discount-badge--label" class="discount-badge--label">İNDİRİM</div></div>
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!----><div><fe-product-image id="product-image" class="image" _nghost-kan-c162=""><a _ngcontent-kan-c162="" id="product-image-link" href="/master-nut-kavrulmus-tuzlu-kaju-fistigi-140gr-p-7b498c"><img _ngcontent-kan-c162="" felazyload="" alt="Master Nut Kavrulmuş Tuzlu Kaju Fıstığı 140gr" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAKCAYAAABrGwT5AAAAF0lEQVR42mN89uzxfwYyAeOo5lHNhAAA7jIk17T4Y6wAAAAASUVORK5CYII=" class="ng-star-inserted">
                                                <!---->
                                                <!---->
                                                <!---->
                                              </a></fe-product-image><a id="product-name" class="mat-caption text-color-black product-name" ngx-ql="" href="/master-nut-kavrulmus-tuzlu-kaju-fistigi-140gr-p-7b498c"> Master Nut Kavrulmuş Tuzlu Kaju Fıstığı 140gr </a></div><div class="bottom-row"><fe-crm-discount-badge _nghost-kan-c343="">
                                              <!---->
                                            </fe-crm-discount-badge><fe-product-price id="price" class="price" _nghost-kan-c275=""><div _ngcontent-kan-c275="" class="promotion-wrapper"><div _ngcontent-kan-c275="" id="price-old" class="price-old ng-star-inserted"><span _ngcontent-kan-c275="" id="old-amount" class="amount">79,90 <span _ngcontent-kan-c275="" class="currency">TL</span></span></div>
                                                <!----><div _ngcontent-kan-c275="" id="price-new" class="price-new subtitle-1"><span _ngcontent-kan-c275="" id="new-amount" class="amount"> 63,90 <span _ngcontent-kan-c275="" class="currency">TL</span></span></div>
                                              </div><div _ngcontent-kan-c275="" id="unit-price" class="unitPrice ng-star-inserted">(456,42 TL/Kg)</div>
                                              <!---->
                                            </fe-product-price>
                                            <!----><sm-product-actions id="actions" class="actions" _nghost-kan-c345="">
                                              <!----><fa-icon _ngcontent-kan-c345="" class="ng-fa-icon add-to-cart-button ng-star-inserted" id="product-actions-add-to-cart-button--master-nut-kavrulmus-tuzlu-kaju-fistigi-140gr-p-7b498c"><svg role="img" aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus" class="svg-inline--fa fa-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M432 256C432 269.3 421.3 280 408 280h-160v160c0 13.25-10.75 24.01-24 24.01S200 453.3 200 440v-160h-160c-13.25 0-24-10.74-24-23.99C16 242.8 26.75 232 40 232h160v-160c0-13.25 10.75-23.99 24-23.99S248 58.75 248 72v160h160C421.3 232 432 242.8 432 256z"></path></svg></fa-icon>
                                              <!---->
                                              <!---->
                                            </sm-product-actions>
                                          </div>
                                        </mat-card>
                                        <!---->
                                        <!---->
                                      </sm-list-page-item><sm-list-page-item _ngcontent-kan-c364="" class="list-item mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-2-phone ng-star-inserted" style="min-width: 166px;" data-product-id="20000008079620"><mat-card class="mat-mdc-card mdc-card"><fa-icon id="fav-add-button-20000008079620" class="ng-fa-icon favourite favourite--empty ng-star-inserted"><svg role="img" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="heart" class="svg-inline--fa fa-heart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M255.1 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 0 232.4 0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84.02L255.1 96zM255.1 141.3L221.4 106.6C196.1 81.31 160 69.77 124.7 75.66C71.21 84.58 31.1 130.9 31.1 185.1V190.9C31.1 223.6 45.55 254.7 69.42 277L250.1 445.7C251.7 447.2 253.8 448 255.1 448C258.2 448 260.3 447.2 261.9 445.7L442.6 277C466.4 254.7 480 223.6 480 190.9V185.1C480 130.9 440.8 84.58 387.3 75.66C351.1 69.77 315.9 81.31 290.6 106.6L255.1 141.3z"></path></svg></fa-icon>
                                          <!---->
                                          <!---->
                                          <!----><div id="discount-badge" class="discount-badge ng-star-inserted"><div><span id="discount-badge--percent" class="discount-badge--percent">%</span><span id="discount-badge--unit" class="discount-badge--unit">20</span></div><div id="discount-badge--label" class="discount-badge--label">İNDİRİM</div></div>
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!----><div><fe-product-image id="product-image" class="image" _nghost-kan-c162=""><a _ngcontent-kan-c162="" id="product-image-link" href="/kara-sevda-yerli-tuzlu-siyah-aycekirdegi-135-g-p-7b4904"><img _ngcontent-kan-c162="" felazyload="" alt="Kara Sevda Yerli Tuzlu Siyah  Ayçekirdeği 135 G" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAKCAYAAABrGwT5AAAAF0lEQVR42mN89uzxfwYyAeOo5lHNhAAA7jIk17T4Y6wAAAAASUVORK5CYII=" class="ng-star-inserted">
                                                <!---->
                                                <!---->
                                                <!---->
                                              </a></fe-product-image><a id="product-name" class="mat-caption text-color-black product-name" ngx-ql="" href="/kara-sevda-yerli-tuzlu-siyah-aycekirdegi-135-g-p-7b4904"> Kara Sevda Yerli Tuzlu Siyah Ayçekirdeği 135 G </a></div><div class="bottom-row"><fe-crm-discount-badge _nghost-kan-c343="">
                                              <!---->
                                            </fe-crm-discount-badge><fe-product-price id="price" class="price" _nghost-kan-c275=""><div _ngcontent-kan-c275="" class="promotion-wrapper"><div _ngcontent-kan-c275="" id="price-old" class="price-old ng-star-inserted"><span _ngcontent-kan-c275="" id="old-amount" class="amount">21,00 <span _ngcontent-kan-c275="" class="currency">TL</span></span></div>
                                                <!----><div _ngcontent-kan-c275="" id="price-new" class="price-new subtitle-1"><span _ngcontent-kan-c275="" id="new-amount" class="amount"> 16,90 <span _ngcontent-kan-c275="" class="currency">TL</span></span></div>
                                              </div><div _ngcontent-kan-c275="" id="unit-price" class="unitPrice ng-star-inserted">(125,18 TL/Kg)</div>
                                              <!---->
                                            </fe-product-price>
                                            <!----><sm-product-actions id="actions" class="actions" _nghost-kan-c345="">
                                              <!----><fa-icon _ngcontent-kan-c345="" class="ng-fa-icon add-to-cart-button ng-star-inserted" id="product-actions-add-to-cart-button--kara-sevda-yerli-tuzlu-siyah-aycekirdegi-135-g-p-7b4904"><svg role="img" aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus" class="svg-inline--fa fa-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M432 256C432 269.3 421.3 280 408 280h-160v160c0 13.25-10.75 24.01-24 24.01S200 453.3 200 440v-160h-160c-13.25 0-24-10.74-24-23.99C16 242.8 26.75 232 40 232h160v-160c0-13.25 10.75-23.99 24-23.99S248 58.75 248 72v160h160C421.3 232 432 242.8 432 256z"></path></svg></fa-icon>
                                              <!---->
                                              <!---->
                                            </sm-product-actions>
                                          </div>
                                        </mat-card>
                                        <!---->
                                        <!---->
                                      </sm-list-page-item><sm-list-page-item _ngcontent-kan-c364="" class="list-item mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-2-phone ng-star-inserted" style="min-width: 166px;" data-product-id="20000008089129"><mat-card class="mat-mdc-card mdc-card"><fa-icon id="fav-add-button-20000008089129" class="ng-fa-icon favourite favourite--empty ng-star-inserted"><svg role="img" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="heart" class="svg-inline--fa fa-heart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M255.1 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 0 232.4 0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84.02L255.1 96zM255.1 141.3L221.4 106.6C196.1 81.31 160 69.77 124.7 75.66C71.21 84.58 31.1 130.9 31.1 185.1V190.9C31.1 223.6 45.55 254.7 69.42 277L250.1 445.7C251.7 447.2 253.8 448 255.1 448C258.2 448 260.3 447.2 261.9 445.7L442.6 277C466.4 254.7 480 223.6 480 190.9V185.1C480 130.9 440.8 84.58 387.3 75.66C351.1 69.77 315.9 81.31 290.6 106.6L255.1 141.3z"></path></svg></fa-icon>
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!----><div><fe-product-image id="product-image" class="image" _nghost-kan-c162=""><a _ngcontent-kan-c162="" id="product-image-link" href="/tadim-festival-180-g-p-7b6e29"><img _ngcontent-kan-c162="" felazyload="" alt="Tadım Festival 180 G" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAKCAYAAABrGwT5AAAAF0lEQVR42mN89uzxfwYyAeOo5lHNhAAA7jIk17T4Y6wAAAAASUVORK5CYII=" class="ng-star-inserted">
                                                <!---->
                                                <!---->
                                                <!---->
                                              </a></fe-product-image><a id="product-name" class="mat-caption text-color-black product-name" ngx-ql="" href="/tadim-festival-180-g-p-7b6e29"> Tadım Festival 180 G </a></div><div class="bottom-row"><fe-crm-discount-badge _nghost-kan-c343="">
                                              <!---->
                                            </fe-crm-discount-badge><fe-product-price id="price" class="price" _nghost-kan-c275=""><div _ngcontent-kan-c275="">
                                                <!----><div _ngcontent-kan-c275="" id="price-new" class="price-new subtitle-1 price-new-only"><span _ngcontent-kan-c275="" id="new-amount" class="amount"> 95,95 <span _ngcontent-kan-c275="" class="currency">TL</span></span></div>
                                              </div><div _ngcontent-kan-c275="" id="unit-price" class="unitPrice ng-star-inserted">(533,05 TL/Kg)</div>
                                              <!---->
                                            </fe-product-price>
                                            <!----><sm-product-actions id="actions" class="actions" _nghost-kan-c345="">
                                              <!----><fa-icon _ngcontent-kan-c345="" class="ng-fa-icon add-to-cart-button ng-star-inserted" id="product-actions-add-to-cart-button--tadim-festival-180-g-p-7b6e29"><svg role="img" aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus" class="svg-inline--fa fa-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M432 256C432 269.3 421.3 280 408 280h-160v160c0 13.25-10.75 24.01-24 24.01S200 453.3 200 440v-160h-160c-13.25 0-24-10.74-24-23.99C16 242.8 26.75 232 40 232h160v-160c0-13.25 10.75-23.99 24-23.99S248 58.75 248 72v160h160C421.3 232 432 242.8 432 256z"></path></svg></fa-icon>
                                              <!---->
                                              <!---->
                                            </sm-product-actions>
                                          </div>
                                        </mat-card>
                                        <!---->
                                        <!---->
                                      </sm-list-page-item><sm-list-page-item _ngcontent-kan-c364="" class="list-item mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-2-phone ng-star-inserted" style="min-width: 166px;" data-product-id="20000008089916"><mat-card class="mat-mdc-card mdc-card"><fa-icon id="fav-add-button-20000008089916" class="ng-fa-icon favourite favourite--empty ng-star-inserted"><svg role="img" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="heart" class="svg-inline--fa fa-heart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M255.1 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 0 232.4 0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84.02L255.1 96zM255.1 141.3L221.4 106.6C196.1 81.31 160 69.77 124.7 75.66C71.21 84.58 31.1 130.9 31.1 185.1V190.9C31.1 223.6 45.55 254.7 69.42 277L250.1 445.7C251.7 447.2 253.8 448 255.1 448C258.2 448 260.3 447.2 261.9 445.7L442.6 277C466.4 254.7 480 223.6 480 190.9V185.1C480 130.9 440.8 84.58 387.3 75.66C351.1 69.77 315.9 81.31 290.6 106.6L255.1 141.3z"></path></svg></fa-icon>
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!----><div><fe-product-image id="product-image" class="image" _nghost-kan-c162=""><a _ngcontent-kan-c162="" id="product-image-link" href="/senocak-cifte-kavrulmus-findik-200-g-p-7b713c"><img _ngcontent-kan-c162="" felazyload="" alt="Şenocak Çifte Kavrulmuş Fındık 200 G" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAKCAYAAABrGwT5AAAAF0lEQVR42mN89uzxfwYyAeOo5lHNhAAA7jIk17T4Y6wAAAAASUVORK5CYII=" class="ng-star-inserted">
                                                <!---->
                                                <!---->
                                                <!---->
                                              </a></fe-product-image><a id="product-name" class="mat-caption text-color-black product-name" ngx-ql="" href="/senocak-cifte-kavrulmus-findik-200-g-p-7b713c"> Şenocak Çifte Kavrulmuş Fındık 200 G </a></div><div class="bottom-row"><fe-crm-discount-badge _nghost-kan-c343="">
                                              <!---->
                                            </fe-crm-discount-badge><fe-product-price id="price" class="price" _nghost-kan-c275=""><div _ngcontent-kan-c275="">
                                                <!----><div _ngcontent-kan-c275="" id="price-new" class="price-new subtitle-1 price-new-only"><span _ngcontent-kan-c275="" id="new-amount" class="amount"> 120,90 <span _ngcontent-kan-c275="" class="currency">TL</span></span></div>
                                              </div><div _ngcontent-kan-c275="" id="unit-price" class="unitPrice ng-star-inserted">(604,50 TL/Kg)</div>
                                              <!---->
                                            </fe-product-price>
                                            <!----><sm-product-actions id="actions" class="actions" _nghost-kan-c345="">
                                              <!----><fa-icon _ngcontent-kan-c345="" class="ng-fa-icon add-to-cart-button ng-star-inserted" id="product-actions-add-to-cart-button--senocak-cifte-kavrulmus-findik-200-g-p-7b713c"><svg role="img" aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus" class="svg-inline--fa fa-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M432 256C432 269.3 421.3 280 408 280h-160v160c0 13.25-10.75 24.01-24 24.01S200 453.3 200 440v-160h-160c-13.25 0-24-10.74-24-23.99C16 242.8 26.75 232 40 232h160v-160c0-13.25 10.75-23.99 24-23.99S248 58.75 248 72v160h160C421.3 232 432 242.8 432 256z"></path></svg></fa-icon>
                                              <!---->
                                              <!---->
                                            </sm-product-actions>
                                          </div>
                                        </mat-card>
                                        <!---->
                                        <!---->
                                      </sm-list-page-item><sm-list-page-item _ngcontent-kan-c364="" class="list-item mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-2-phone ng-star-inserted" style="min-width: 166px;" data-product-id="20000008087832"><mat-card class="mat-mdc-card mdc-card"><fa-icon id="fav-add-button-20000008087832" class="ng-fa-icon favourite favourite--empty ng-star-inserted"><svg role="img" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="heart" class="svg-inline--fa fa-heart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M255.1 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 0 232.4 0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84.02L255.1 96zM255.1 141.3L221.4 106.6C196.1 81.31 160 69.77 124.7 75.66C71.21 84.58 31.1 130.9 31.1 185.1V190.9C31.1 223.6 45.55 254.7 69.42 277L250.1 445.7C251.7 447.2 253.8 448 255.1 448C258.2 448 260.3 447.2 261.9 445.7L442.6 277C466.4 254.7 480 223.6 480 190.9V185.1C480 130.9 440.8 84.58 387.3 75.66C351.1 69.77 315.9 81.31 290.6 106.6L255.1 141.3z"></path></svg></fa-icon>
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!----><div><fe-product-image id="product-image" class="image" _nghost-kan-c162=""><a _ngcontent-kan-c162="" id="product-image-link" href="/tadim-kavrulmus-kaju-fistigi-140-g-p-7b6918"><img _ngcontent-kan-c162="" felazyload="" alt="Tadım Kavrulmuş Kaju Fıstığı 140 G" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAKCAYAAABrGwT5AAAAF0lEQVR42mN89uzxfwYyAeOo5lHNhAAA7jIk17T4Y6wAAAAASUVORK5CYII=" class="ng-star-inserted">
                                                <!---->
                                                <!---->
                                                <!---->
                                              </a></fe-product-image><a id="product-name" class="mat-caption text-color-black product-name" ngx-ql="" href="/tadim-kavrulmus-kaju-fistigi-140-g-p-7b6918"> Tadım Kavrulmuş Kaju Fıstığı 140 G </a></div><div class="bottom-row"><fe-crm-discount-badge _nghost-kan-c343="">
                                              <!---->
                                            </fe-crm-discount-badge><fe-product-price id="price" class="price" _nghost-kan-c275=""><div _ngcontent-kan-c275="">
                                                <!----><div _ngcontent-kan-c275="" id="price-new" class="price-new subtitle-1 price-new-only"><span _ngcontent-kan-c275="" id="new-amount" class="amount"> 81,90 <span _ngcontent-kan-c275="" class="currency">TL</span></span></div>
                                              </div><div _ngcontent-kan-c275="" id="unit-price" class="unitPrice ng-star-inserted">(584,99 TL/Kg)</div>
                                              <!---->
                                            </fe-product-price>
                                            <!----><sm-product-actions id="actions" class="actions" _nghost-kan-c345="">
                                              <!----><fa-icon _ngcontent-kan-c345="" class="ng-fa-icon add-to-cart-button ng-star-inserted" id="product-actions-add-to-cart-button--tadim-kavrulmus-kaju-fistigi-140-g-p-7b6918"><svg role="img" aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus" class="svg-inline--fa fa-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M432 256C432 269.3 421.3 280 408 280h-160v160c0 13.25-10.75 24.01-24 24.01S200 453.3 200 440v-160h-160c-13.25 0-24-10.74-24-23.99C16 242.8 26.75 232 40 232h160v-160c0-13.25 10.75-23.99 24-23.99S248 58.75 248 72v160h160C421.3 232 432 242.8 432 256z"></path></svg></fa-icon>
                                              <!---->
                                              <!---->
                                            </sm-product-actions>
                                          </div>
                                        </mat-card>
                                        <!---->
                                        <!---->
                                      </sm-list-page-item><sm-list-page-item _ngcontent-kan-c364="" class="list-item mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-2-phone ng-star-inserted" style="min-width: 166px;" data-product-id="20000008079656"><mat-card class="mat-mdc-card mdc-card"><fa-icon id="fav-add-button-20000008079656" class="ng-fa-icon favourite favourite--empty ng-star-inserted"><svg role="img" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="heart" class="svg-inline--fa fa-heart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M255.1 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 0 232.4 0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84.02L255.1 96zM255.1 141.3L221.4 106.6C196.1 81.31 160 69.77 124.7 75.66C71.21 84.58 31.1 130.9 31.1 185.1V190.9C31.1 223.6 45.55 254.7 69.42 277L250.1 445.7C251.7 447.2 253.8 448 255.1 448C258.2 448 260.3 447.2 261.9 445.7L442.6 277C466.4 254.7 480 223.6 480 190.9V185.1C480 130.9 440.8 84.58 387.3 75.66C351.1 69.77 315.9 81.31 290.6 106.6L255.1 141.3z"></path></svg></fa-icon>
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!----><div><fe-product-image id="product-image" class="image" _nghost-kan-c162=""><a _ngcontent-kan-c162="" id="product-image-link" href="/emsal-osmaniye-yer-fistigi-200-g-p-7b4928"><img _ngcontent-kan-c162="" felazyload="" alt="Emsal Osmaniye Yer Fıstığı 200 G" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAKCAYAAABrGwT5AAAAF0lEQVR42mN89uzxfwYyAeOo5lHNhAAA7jIk17T4Y6wAAAAASUVORK5CYII=" class="ng-star-inserted">
                                                <!---->
                                                <!---->
                                                <!---->
                                              </a></fe-product-image><a id="product-name" class="mat-caption text-color-black product-name" ngx-ql="" href="/emsal-osmaniye-yer-fistigi-200-g-p-7b4928"> Emsal Osmaniye Yer Fıstığı 200 G </a></div><div class="bottom-row"><fe-crm-discount-badge _nghost-kan-c343="">
                                              <!---->
                                            </fe-crm-discount-badge><fe-product-price id="price" class="price" _nghost-kan-c275=""><div _ngcontent-kan-c275="">
                                                <!----><div _ngcontent-kan-c275="" id="price-new" class="price-new subtitle-1 price-new-only"><span _ngcontent-kan-c275="" id="new-amount" class="amount"> 44,90 <span _ngcontent-kan-c275="" class="currency">TL</span></span></div>
                                              </div><div _ngcontent-kan-c275="" id="unit-price" class="unitPrice ng-star-inserted">(224,50 TL/Kg)</div>
                                              <!---->
                                            </fe-product-price>
                                            <!----><sm-product-actions id="actions" class="actions" _nghost-kan-c345="">
                                              <!----><fa-icon _ngcontent-kan-c345="" class="ng-fa-icon add-to-cart-button ng-star-inserted" id="product-actions-add-to-cart-button--emsal-osmaniye-yer-fistigi-200-g-p-7b4928"><svg role="img" aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus" class="svg-inline--fa fa-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M432 256C432 269.3 421.3 280 408 280h-160v160c0 13.25-10.75 24.01-24 24.01S200 453.3 200 440v-160h-160c-13.25 0-24-10.74-24-23.99C16 242.8 26.75 232 40 232h160v-160c0-13.25 10.75-23.99 24-23.99S248 58.75 248 72v160h160C421.3 232 432 242.8 432 256z"></path></svg></fa-icon>
                                              <!---->
                                              <!---->
                                            </sm-product-actions>
                                          </div>
                                        </mat-card>
                                        <!---->
                                        <!---->
                                      </sm-list-page-item><sm-list-page-item _ngcontent-kan-c364="" class="list-item mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-2-phone ng-star-inserted" style="min-width: 166px;" data-product-id="20000008079687"><mat-card class="mat-mdc-card mdc-card"><fa-icon id="fav-add-button-20000008079687" class="ng-fa-icon favourite favourite--empty ng-star-inserted"><svg role="img" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="heart" class="svg-inline--fa fa-heart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M255.1 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 0 232.4 0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84.02L255.1 96zM255.1 141.3L221.4 106.6C196.1 81.31 160 69.77 124.7 75.66C71.21 84.58 31.1 130.9 31.1 185.1V190.9C31.1 223.6 45.55 254.7 69.42 277L250.1 445.7C251.7 447.2 253.8 448 255.1 448C258.2 448 260.3 447.2 261.9 445.7L442.6 277C466.4 254.7 480 223.6 480 190.9V185.1C480 130.9 440.8 84.58 387.3 75.66C351.1 69.77 315.9 81.31 290.6 106.6L255.1 141.3z"></path></svg></fa-icon>
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!----><div><fe-product-image id="product-image" class="image" _nghost-kan-c162=""><a _ngcontent-kan-c162="" id="product-image-link" href="/tadim-tuzlu-yer-fistigi-180-g-p-7b4947"><img _ngcontent-kan-c162="" felazyload="" alt="Tadım Tuzlu Yer Fıstığı 180 G" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAKCAYAAABrGwT5AAAAF0lEQVR42mN89uzxfwYyAeOo5lHNhAAA7jIk17T4Y6wAAAAASUVORK5CYII=" class="ng-star-inserted">
                                                <!---->
                                                <!---->
                                                <!---->
                                              </a></fe-product-image><a id="product-name" class="mat-caption text-color-black product-name" ngx-ql="" href="/tadim-tuzlu-yer-fistigi-180-g-p-7b4947"> Tadım Tuzlu Yer Fıstığı 180 G </a></div><div class="bottom-row"><fe-crm-discount-badge _nghost-kan-c343="">
                                              <!---->
                                            </fe-crm-discount-badge><fe-product-price id="price" class="price" _nghost-kan-c275=""><div _ngcontent-kan-c275="">
                                                <!----><div _ngcontent-kan-c275="" id="price-new" class="price-new subtitle-1 price-new-only"><span _ngcontent-kan-c275="" id="new-amount" class="amount"> 51,90 <span _ngcontent-kan-c275="" class="currency">TL</span></span></div>
                                              </div><div _ngcontent-kan-c275="" id="unit-price" class="unitPrice ng-star-inserted">(288,33 TL/Kg)</div>
                                              <!---->
                                            </fe-product-price>
                                            <!----><sm-product-actions id="actions" class="actions" _nghost-kan-c345="">
                                              <!----><fa-icon _ngcontent-kan-c345="" class="ng-fa-icon add-to-cart-button ng-star-inserted" id="product-actions-add-to-cart-button--tadim-tuzlu-yer-fistigi-180-g-p-7b4947"><svg role="img" aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus" class="svg-inline--fa fa-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M432 256C432 269.3 421.3 280 408 280h-160v160c0 13.25-10.75 24.01-24 24.01S200 453.3 200 440v-160h-160c-13.25 0-24-10.74-24-23.99C16 242.8 26.75 232 40 232h160v-160c0-13.25 10.75-23.99 24-23.99S248 58.75 248 72v160h160C421.3 232 432 242.8 432 256z"></path></svg></fa-icon>
                                              <!---->
                                              <!---->
                                            </sm-product-actions>
                                          </div>
                                        </mat-card>
                                        <!---->
                                        <!---->
                                      </sm-list-page-item><sm-list-page-item _ngcontent-kan-c364="" class="list-item mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-2-phone ng-star-inserted" style="min-width: 166px;" data-product-id="20000008089918"><mat-card class="mat-mdc-card mdc-card"><fa-icon id="fav-add-button-20000008089918" class="ng-fa-icon favourite favourite--empty ng-star-inserted"><svg role="img" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="heart" class="svg-inline--fa fa-heart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M255.1 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 0 232.4 0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84.02L255.1 96zM255.1 141.3L221.4 106.6C196.1 81.31 160 69.77 124.7 75.66C71.21 84.58 31.1 130.9 31.1 185.1V190.9C31.1 223.6 45.55 254.7 69.42 277L250.1 445.7C251.7 447.2 253.8 448 255.1 448C258.2 448 260.3 447.2 261.9 445.7L442.6 277C466.4 254.7 480 223.6 480 190.9V185.1C480 130.9 440.8 84.58 387.3 75.66C351.1 69.77 315.9 81.31 290.6 106.6L255.1 141.3z"></path></svg></fa-icon>
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!----><div><fe-product-image id="product-image" class="image" _nghost-kan-c162=""><a _ngcontent-kan-c162="" id="product-image-link" href="/tadim-kavrulmus-findik-ici-180g-p-7b713e"><img _ngcontent-kan-c162="" felazyload="" alt="Tadım Kavrulmuş Fındık İçi 180G" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAKCAYAAABrGwT5AAAAF0lEQVR42mN89uzxfwYyAeOo5lHNhAAA7jIk17T4Y6wAAAAASUVORK5CYII=" class="ng-star-inserted">
                                                <!---->
                                                <!---->
                                                <!---->
                                              </a></fe-product-image><a id="product-name" class="mat-caption text-color-black product-name" ngx-ql="" href="/tadim-kavrulmus-findik-ici-180g-p-7b713e"> Tadım Kavrulmuş Fındık İçi 180G </a></div><div class="bottom-row"><fe-crm-discount-badge _nghost-kan-c343="">
                                              <!---->
                                            </fe-crm-discount-badge><fe-product-price id="price" class="price" _nghost-kan-c275=""><div _ngcontent-kan-c275="">
                                                <!----><div _ngcontent-kan-c275="" id="price-new" class="price-new subtitle-1 price-new-only"><span _ngcontent-kan-c275="" id="new-amount" class="amount"> 119,90 <span _ngcontent-kan-c275="" class="currency">TL</span></span></div>
                                              </div><div _ngcontent-kan-c275="" id="unit-price" class="unitPrice ng-star-inserted">(666,11 TL/Kg)</div>
                                              <!---->
                                            </fe-product-price>
                                            <!----><sm-product-actions id="actions" class="actions" _nghost-kan-c345="">
                                              <!----><fa-icon _ngcontent-kan-c345="" class="ng-fa-icon add-to-cart-button ng-star-inserted" id="product-actions-add-to-cart-button--tadim-kavrulmus-findik-ici-180g-p-7b713e"><svg role="img" aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus" class="svg-inline--fa fa-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M432 256C432 269.3 421.3 280 408 280h-160v160c0 13.25-10.75 24.01-24 24.01S200 453.3 200 440v-160h-160c-13.25 0-24-10.74-24-23.99C16 242.8 26.75 232 40 232h160v-160c0-13.25 10.75-23.99 24-23.99S248 58.75 248 72v160h160C421.3 232 432 242.8 432 256z"></path></svg></fa-icon>
                                              <!---->
                                              <!---->
                                            </sm-product-actions>
                                          </div>
                                        </mat-card>
                                        <!---->
                                        <!---->
                                      </sm-list-page-item><sm-list-page-item _ngcontent-kan-c364="" class="list-item mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-2-phone ng-star-inserted" style="min-width: 166px;" data-product-id="20000008079716"><mat-card class="mat-mdc-card mdc-card"><fa-icon id="fav-add-button-20000008079716" class="ng-fa-icon favourite favourite--empty ng-star-inserted"><svg role="img" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="heart" class="svg-inline--fa fa-heart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M255.1 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 0 232.4 0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84.02L255.1 96zM255.1 141.3L221.4 106.6C196.1 81.31 160 69.77 124.7 75.66C71.21 84.58 31.1 130.9 31.1 185.1V190.9C31.1 223.6 45.55 254.7 69.42 277L250.1 445.7C251.7 447.2 253.8 448 255.1 448C258.2 448 260.3 447.2 261.9 445.7L442.6 277C466.4 254.7 480 223.6 480 190.9V185.1C480 130.9 440.8 84.58 387.3 75.66C351.1 69.77 315.9 81.31 290.6 106.6L255.1 141.3z"></path></svg></fa-icon>
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!---->
                                          <!----><div><fe-product-image id="product-image" class="image" _nghost-kan-c162=""><a _ngcontent-kan-c162="" id="product-image-link" href="/peyman-bahceden-tuzlu-tombul-karadeniz-findigi-130g-p-7b4964"><img _ngcontent-kan-c162="" felazyload="" alt="Peyman Bahçeden Tuzlu Tombul Karadeniz Fındığı 130G" src="<?php echo $urun["resim1"];?>" class="ng-star-inserted">
                                                <!---->
                                                <!---->
                                                <!---->
                                              </a></fe-product-image><a id="product-name" class="mat-caption text-color-black product-name" ngx-ql="" href="/peyman-bahceden-tuzlu-tombul-karadeniz-findigi-130g-p-7b4964"> Peyman Bahçeden Tuzlu Tombul Karadeniz Fındığı 130G </a></div><div class="bottom-row"><fe-crm-discount-badge _nghost-kan-c343="">
                                              <!---->
                                            </fe-crm-discount-badge><fe-product-price id="price" class="price" _nghost-kan-c275=""><div _ngcontent-kan-c275="">
                                                <!----><div _ngcontent-kan-c275="" id="price-new" class="price-new subtitle-1 price-new-only"><span _ngcontent-kan-c275="" id="new-amount" class="amount"> 79,90 <span _ngcontent-kan-c275="" class="currency">TL</span></span></div>
                                              </div><div _ngcontent-kan-c275="" id="unit-price" class="unitPrice ng-star-inserted">(614,61 TL/Kg)</div>
                                              <!---->
                                            </fe-product-price>
                                            <!----><sm-product-actions id="actions" class="actions" _nghost-kan-c345="">
                                              <!----><fa-icon _ngcontent-kan-c345="" class="ng-fa-icon add-to-cart-button ng-star-inserted" id="product-actions-add-to-cart-button--peyman-bahceden-tuzlu-tombul-karadeniz-findigi-130g-p-7b4964"><svg role="img" aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus" class="svg-inline--fa fa-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M432 256C432 269.3 421.3 280 408 280h-160v160c0 13.25-10.75 24.01-24 24.01S200 453.3 200 440v-160h-160c-13.25 0-24-10.74-24-23.99C16 242.8 26.75 232 40 232h160v-160c0-13.25 10.75-23.99 24-23.99S248 58.75 248 72v160h160C421.3 232 432 242.8 432 256z"></path></svg></fa-icon>
                                              <!---->
                                              <!---->
                                            </sm-product-actions>
                                          </div>
                                        </mat-card>
                                        <!---->
                                        <!---->
                                      </sm-list-page-item>
                                      <!---->
                                    </div>
                                    <!---->
                                    <!----><div _ngcontent-kan-c364="" class="next-btn ng-star-inserted"></div>
                                    <!----><div _ngcontent-kan-c364="" class="fade-out"></div>
                                  </div>
                                  <!---->
                                </div>
                              </mat-tab-body>
                              <!---->
                            </div>
                          </mat-tab-group>
                          <!---->
                        </div>
                      </div>
                    </sm-product-list-slider>
                    <!---->
                  </div>
                  <!---->
                  <!---->
                  <div class="free-banner-wrapper ng-star-inserted">
                    <div fedeferload="" id="div-gpt-ad-1660118068865-0" data-google-query-id="CM6i1fuhz4QDFZsMVQgdOIcIJw" style="transform: scale(1.15979); height: 289.9px;"><div id="google_ads_iframe_/21674584190/sanalmarket-urundetay-freebanner-desktop_0__container__" style="border: 0pt none; display: inline-block; width: 970px; height: 250px;"><iframe frameborder="0" src="https://c30220fd07eff07a4821458de1bffb33.safeframe.googlesyndication.com/safeframe/1-0-40/html/container.html" id="google_ads_iframe_/21674584190/sanalmarket-urundetay-freebanner-desktop_0" title="3rd party ad content" name="" scrolling="no" marginwidth="0" marginheight="0" width="970" height="250" data-is-safeframe="true" sandbox="allow-forms allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts allow-top-navigation-by-user-activation" allow="attribution-reporting" aria-label="Advertisement" tabindex="0" data-google-container-id="8" style="border: 0px; vertical-align: bottom;" data-load-complete="true"></iframe></div>
                    </div>
                  </div>
                  <!---->
                </div>
                <!---->
                <!---->
                <!---->
                <div class="sticky-add-button mobile-only">
                  <fe-product-price class="product-price ng-star-inserted" _nghost-kan-c275="">
                    <div _ngcontent-kan-c275=""><div _ngcontent-kan-c275="" id="price-old" class="price-old ng-star-inserted"><span _ngcontent-kan-c275="" id="old-amount" class="amount"><span _ngcontent-kan-c275="" class="currency"></span></span></div>
                      <!----><div _ngcontent-kan-c275="" id="price-new" class="price-new subtitle-1"><span _ngcontent-kan-c275="" id="new-amount" class="amount">  <?php echo $urun["fiyat"];?> <span _ngcontent-kan-c275="" class="currency">TL</span></span></div>
                    </div>
                    <div _ngcontent-kan-c275="" id="unit-price" class="unitPrice ng-star-inserted">(649,50 TL/Kg)</div>
                    <!---->
                  </fe-product-price>
                  <!---->
                  <sm-product-actions _nghost-kan-c345="" class="ng-star-inserted">
                    <!---->
                    <!---->
                    <button _ngcontent-kan-c345="" id="product-actions-add-button" mat-flat-button="" color="primary" class="product-detail-add mdc-button mdc-button--unelevated mat-mdc-unelevated-button mat-primary mat-mdc-button-base ng-star-inserted"><span class="mat-mdc-button-persistent-ripple mdc-button__ripple"></span><span class="mdc-button__label"> Sepete Ekle </span><span class="mat-mdc-focus-indicator"></span><span matripple="" class="mat-ripple mat-mdc-button-ripple"></span><span class="mat-mdc-button-touch-target"></span>
                    </button>
                    <!---->
                  </sm-product-actions>
                  <!---->
                </div>
              </sm-product-detail-page>
              <!---->
            </article>
          </sm-product>
          <!---->
        </main>
        <!---->
        <div _ngcontent-kan-c377="" class="divider"></div>
        <sm-footer _ngcontent-kan-c377="" _nghost-kan-c301="">
          <div _ngcontent-kan-c301="" class="desktop-only">
            <div _ngcontent-kan-c301="">
              <sm-footer-links _ngcontent-kan-c301="" _nghost-kan-c299="">
                <div _ngcontent-kan-c299="" class="links-wrapper">
                  <div _ngcontent-kan-c299="" class="inner-grid">
                    <div _ngcontent-kan-c299="" class="mdc-layout-grid__cell--span-3 mdc-layout-grid__cell--span-12-phone"><p _ngcontent-kan-c299="" class="title"> Migros Sanal Market <fa-icon _ngcontent-kan-c299="" class="ng-fa-icon"><svg role="img" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" class="svg-inline--fa fa-chevron-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"></path></svg></fa-icon></p><div _ngcontent-kan-c299="" class="content"><p _ngcontent-kan-c299="" class="link" id="page-hakkimizda"><a _ngcontent-kan-c299="" id="link-hakkimizda" href="/islem-rehberi?id=8"> Hakkımızda </a></p><p _ngcontent-kan-c299="" class="link" id="page-islem-rehberi"><a _ngcontent-kan-c299="" id="link-islem-rehberi" href="/islem-rehberi?id=1"> İşlem Rehberi </a></p><p _ngcontent-kan-c299="" class="link" id="page-sikca-sorulan-sorular"><a _ngcontent-kan-c299="" id="link-sikca-sorulan-sorular" href="/islem-rehberi?id=6"> Sıkça Sorulan Sorular </a></p><p _ngcontent-kan-c299="" class="link" id="page-musteri-hizmetleri"><a _ngcontent-kan-c299="" id="link-musteri-hizmetleri" href="/islem-rehberi?id=5"> Müşteri Hizmetleri </a></p><p _ngcontent-kan-c299="" class="link" id="page-iletisim"><a _ngcontent-kan-c299="" id="link-iletisim" href="/islem-rehberi?id=7"> İletişim </a></p><p _ngcontent-kan-c299="" class="link" id="page-kvkk-metni"><a _ngcontent-kan-c299="" id="link-kvkk-metni" href="/islem-rehberi?id=9"> Kişisel Verilerin Korunması Hakkında Aydınlatma Metni </a></p><p _ngcontent-kan-c299="" class="link" id="page-kvkk-politikasi"><a _ngcontent-kan-c299="" id="link-kvkk-politikasi" href="/islem-rehberi?id=767"> Kişisel Verilerin Korunması ve İşlenmesi Politikası </a></p><p _ngcontent-kan-c299="" class="link" id="page-kullanim-kosullari"><a _ngcontent-kan-c299="" id="link-kullanim-kosullari" href="/islem-rehberi?id=10"> Kullanım Koşulları ve Gizlilik </a></p><p _ngcontent-kan-c299="" class="link" id="page-cerez-aydinlatma-metni"><a _ngcontent-kan-c299="" id="link-cerez-aydinlatma-metni" href="/islem-rehberi?id=777"> Çerez Aydınlatma Metni </a></p><p _ngcontent-kan-c299="" class="link" id="page-e-arsiv-bildilendirme"><a _ngcontent-kan-c299="" id="link-e-arsiv-bildilendirme" href="/islem-rehberi?id=12"> E-Arşiv Bilgilendirme </a></p><p _ngcontent-kan-c299="" class="link" id="page-guvenli-alisveris"><a _ngcontent-kan-c299="" id="link-guvenli-alisveris" href="/islem-rehberi?id=11"> Güvenli Alışveriş </a></p><p _ngcontent-kan-c299="" class="link" id="page-markalar"><a _ngcontent-kan-c299="" id="link-markalar" href="/markalar"> Markalar </a></p>
                        <!---->
                      </div><p _ngcontent-kan-c299="" class="title"> Kurumsal <fa-icon _ngcontent-kan-c299="" class="ng-fa-icon"><svg role="img" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" class="svg-inline--fa fa-chevron-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"></path></svg></fa-icon></p><div _ngcontent-kan-c299="" class="content"><p _ngcontent-kan-c299="" class="link"><a _ngcontent-kan-c299="" target="_blank" rel="noopener" href="https://www.migroskurumsal.com/surdurulebilirlik"> Sürdürülebilirlik </a></p><p _ngcontent-kan-c299="" class="link"><a _ngcontent-kan-c299="" target="_blank" rel="noopener" href="https://www.migroskurumsal.com/hakkimizda/kalite"> Kalite Anlayışı </a></p><p _ngcontent-kan-c299="" class="link"><a _ngcontent-kan-c299="" target="_blank" rel="noopener" href="https://toptan.migros.com.tr/"> Migros Toptan </a></p><p _ngcontent-kan-c299="" class="link"><a _ngcontent-kan-c299="" target="_blank" rel="noopener" href="https://www.migroskurumsal.com/hakkimizda/politikalarimiz#insan-kaynaklari-politikasi"> İnsan Kaynakları Politikamız </a></p><p _ngcontent-kan-c299="" class="link"><a _ngcontent-kan-c299="" target="_blank" rel="noopener" href="https://www.migroskurumsal.com/IKBasvuru.aspx?IcerikID=36"> İş Başvurusu </a></p><p _ngcontent-kan-c299="" class="link"><a _ngcontent-kan-c299="" target="_blank" rel="noopener" href="https://www.moneypay.com.tr/moneypaypro/index.html"> Kurumsal Kart &amp; Çek Satışı </a></p>
                        <!---->
                      </div>
                    </div>
                    <div _ngcontent-kan-c299="" class="popular-pages mdc-layout-grid__cell--span-5 mdc-layout-grid__cell--span-12-phone"><p _ngcontent-kan-c299="" class="title"> Popüler Sayfalar <fa-icon _ngcontent-kan-c299="" class="ng-fa-icon"><svg role="img" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" class="svg-inline--fa fa-chevron-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"></path></svg></fa-icon></p><div _ngcontent-kan-c299="" class="content"><p _ngcontent-kan-c299="" class="link"><a _ngcontent-kan-c299="" href="/mevsim-sebzeleri-c-3f4"> Mevsim Sebzeleri </a></p><p _ngcontent-kan-c299="" class="link"><a _ngcontent-kan-c299="" href="/dondurma-c-41b"> Dondurma </a></p><p _ngcontent-kan-c299="" class="link"><a _ngcontent-kan-c299="" href="/dana-eti-c-3fa"> Dana Eti </a></p><p _ngcontent-kan-c299="" class="link"><a _ngcontent-kan-c299="" href="/maske-c-2915"> Maske </a></p><p _ngcontent-kan-c299="" class="link"><a _ngcontent-kan-c299="" href="/uzun-omurlu-sut-c-40a"> Uzun Ömürlü Süt </a></p><p _ngcontent-kan-c299="" class="link"><a _ngcontent-kan-c299="" href="/eldiven-c-2914"> Eldiven </a></p><p _ngcontent-kan-c299="" class="link"><a _ngcontent-kan-c299="" href="/egzotik-meyveler-c-3ea"> Egzotik Meyveler </a></p><p _ngcontent-kan-c299="" class="link"><a _ngcontent-kan-c299="" href="/el-dezenfektani-c-11861"> El Dezenfektanı </a></p><p _ngcontent-kan-c299="" class="link"><a _ngcontent-kan-c299="" href="/yumurta-c-70"> Yumurta </a></p><p _ngcontent-kan-c299="" class="link"><a _ngcontent-kan-c299="" href="/sac-bakim-c-8f"> Saç Bakım </a></p><p _ngcontent-kan-c299="" class="link"><a _ngcontent-kan-c299="" href="/kagit-havlu-c-49d"> Kağıt Havlu </a></p><p _ngcontent-kan-c299="" class="link"><a _ngcontent-kan-c299="" href="/tiras-malzemeleri-c-90"> Tıraş Malzemeleri </a></p><p _ngcontent-kan-c299="" class="link"><a _ngcontent-kan-c299="" href="/tuvalet-kagidi-c-49c"> Tuvalet Kağıdı </a></p><p _ngcontent-kan-c299="" class="link"><a _ngcontent-kan-c299="" href="/zeytinyagi-c-433"> Zeytinyağı </a></p><p _ngcontent-kan-c299="" class="link"><a _ngcontent-kan-c299="" href="/tiras-bicagi-c-4ab"> Tıraş Bıçağı </a></p><p _ngcontent-kan-c299="" class="link"><a _ngcontent-kan-c299="" href="/turk-kahvesi-c-28c4"> Türk Kahvesi </a></p><p _ngcontent-kan-c299="" class="link"><a _ngcontent-kan-c299="" href="/taze-kasar-c-273b"> Taze Kaşar </a></p><p _ngcontent-kan-c299="" class="link"><a _ngcontent-kan-c299="" href="/dis-macunu-c-4a1"> Diş Macunu </a></p><p _ngcontent-kan-c299="" class="link"><a _ngcontent-kan-c299="" href="/pilic-c-3fe"> Piliç </a></p><p _ngcontent-kan-c299="" class="link"><a _ngcontent-kan-c299="" href="/jel-camasir-suyu-c-28d7"> Jel Çamaşır Suyu </a></p><p _ngcontent-kan-c299="" class="link"><a _ngcontent-kan-c299="" href="/aycicek-yagi-c-42d"> Ayçiçek Yağı </a></p><p _ngcontent-kan-c299="" class="link"><a _ngcontent-kan-c299="" href="/kuzu-eti-c-3fb"> Kuzu Eti </a></p><p _ngcontent-kan-c299="" class="link"><a _ngcontent-kan-c299="" href="/atistirmalik-c-113fb"> Atıştırmalık </a></p><p _ngcontent-kan-c299="" class="link"><a _ngcontent-kan-c299="" href="/sampuan-c-4a4"> Şampuan </a></p><p _ngcontent-kan-c299="" class="link"><a _ngcontent-kan-c299="" href="/balik-deniz-urunleri-c-6a"> Balık &amp; Deniz Ürünleri </a></p><p _ngcontent-kan-c299="" class="link"><a _ngcontent-kan-c299="" href="/demlik-poset-cay-c-1121e"> Demlik Poşet Çay </a></p><p _ngcontent-kan-c299="" class="link"><a _ngcontent-kan-c299="" href="/bebek-bezi-c-ab"> Bebek Bezi </a></p><p _ngcontent-kan-c299="" class="link"><a _ngcontent-kan-c299="" href="/baldo-pirincler-c-2788"> Baldo Pirinç </a></p><p _ngcontent-kan-c299="" class="link"><a _ngcontent-kan-c299="" href="/bebek-mamasi-c-299b"> Bebek Maması </a></p><p _ngcontent-kan-c299="" class="link"><a _ngcontent-kan-c299="" href="/devam-sutu-c-1136b"> Devam Sütü </a></p><p _ngcontent-kan-c299="" class="link"><a _ngcontent-kan-c299="" href="/dis-fircasi-c-4a0"> Diş Fırçası </a></p><p _ngcontent-kan-c299="" class="link"><a _ngcontent-kan-c299="" href="/filtre-kahve-c-11223"> Filtre Kahve </a></p><p _ngcontent-kan-c299="" class="link"><a _ngcontent-kan-c299="" href="/dondurulmus-gida-c-7c"> Dondurulmuş Gıda </a></p><p _ngcontent-kan-c299="" class="link"><a _ngcontent-kan-c299="" href="/kolonya-c-4cf"> Kolonya </a></p><p _ngcontent-kan-c299="" class="link"><a _ngcontent-kan-c299="" href="/telefon-ve-aksesuarlari-c-525"> Telefon Ve Aksesuarları </a></p><p _ngcontent-kan-c299="" class="link"><a _ngcontent-kan-c299="" href="/hijyenik-ped-c-96"> Hijyenik Ped </a></p><p _ngcontent-kan-c299="" class="link"><a _ngcontent-kan-c299="" href="/kopek-mamasi-c-29dc"> Köpek Maması </a></p><p _ngcontent-kan-c299="" class="link"><a _ngcontent-kan-c299="" href="/cicek-bali-c-2769"> Çiçek Balı </a></p><p _ngcontent-kan-c299="" class="link"><a _ngcontent-kan-c299="" href="/kirtasiye-c-11420"> Kırtasiye </a></p><p _ngcontent-kan-c299="" class="link"><a _ngcontent-kan-c299="" href="/oyuncak-c-9e"> Oyuncak </a></p>
                        <!---->
                      </div>
                    </div>
                    <div _ngcontent-kan-c299="" class="mdc-layout-grid__cell--span-4 mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-12-phone right-container"><div _ngcontent-kan-c299="" class="mdc-layout-grid__cell--span-6 mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-12-phone"><p _ngcontent-kan-c299="" class="title"> Migros'ta Yenilikler <fa-icon _ngcontent-kan-c299="" class="ng-fa-icon"><svg role="img" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" class="svg-inline--fa fa-chevron-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"></path></svg></fa-icon></p><div _ngcontent-kan-c299="" class="content"><p _ngcontent-kan-c299="" class="link"><a _ngcontent-kan-c299="" routerlinkactive="active" href="/alo-migros"> Alo Migros </a>
                            <!---->
                            <!---->
                          </p><p _ngcontent-kan-c299="" class="link">
                            <!----><a _ngcontent-kan-c299="" target="_blank" rel="noopener" href="https://www.money.com.tr/mc/money-ozelliklerini-kesfet/saglikli-yasam-yolculugum/123"> Sağlıklı Yaşam Yolculuğum </a>
                            <!---->
                          </p><p _ngcontent-kan-c299="" class="link">
                            <!----><a _ngcontent-kan-c299="" target="_blank" rel="noopener" href="https://www.money.com.tr"> Money </a>
                            <!---->
                          </p><p _ngcontent-kan-c299="" class="link">
                            <!----><a _ngcontent-kan-c299="" target="_blank" rel="noopener" href="https://migrostv.migros.com.tr"> Migros TV </a>
                            <!---->
                          </p>
                          <!---->
                        </div><p _ngcontent-kan-c299="" class="title">Mobil Uygulamalar</p><div _ngcontent-kan-c299="" class="mobile-app-link"><a _ngcontent-kan-c299="" target="_blank" rel="noopener" href="https://apps.apple.com/tr/app/migros-sanal-market/id397585390?l=tr"><img _ngcontent-kan-c299="" felazyload="" alt="" src="assets/logos/mobile-app/app-store.svg"></a></div><div _ngcontent-kan-c299="" class="mobile-app-link"><a _ngcontent-kan-c299="" target="_blank" rel="noopener" href="https://play.google.com/store/apps/details?id=com.inomera.sm"><img _ngcontent-kan-c299="" felazyload="" alt="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAKCAYAAABrGwT5AAAAF0lEQVR42mN89uzxfwYyAeOo5lHNhAAA7jIk17T4Y6wAAAAASUVORK5CYII="></a></div><div _ngcontent-kan-c299="" class="mobile-app-link"><a _ngcontent-kan-c299="" target="_blank" rel="noopener" href="https://appgallery.huawei.com/#/app/C101624469"><img _ngcontent-kan-c299="" felazyload="" alt="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAKCAYAAABrGwT5AAAAF0lEQVR42mN89uzxfwYyAeOo5lHNhAAA7jIk17T4Y6wAAAAASUVORK5CYII="></a></div>
                        <!---->
                      </div><div _ngcontent-kan-c299="" class="mdc-layout-grid__cell--span-6 mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-12-phone"><p _ngcontent-kan-c299="" class="title">Bizi Takip Edin</p><div _ngcontent-kan-c299="" class="socials"><a _ngcontent-kan-c299="" target="_blank" rel="noopener" href="https://www.instagram.com/migros_tr"><img _ngcontent-kan-c299="" felazyload="" alt="" src="assets/logos/social/instagram.svg"></a><a _ngcontent-kan-c299="" target="_blank" rel="noopener" href="https://www.facebook.com/MigrosTurkiye"><img _ngcontent-kan-c299="" felazyload="" alt="" src="assets/logos/social/facebook.svg"></a><a _ngcontent-kan-c299="" target="_blank" rel="noopener" href="https://twitter.com/Migros_Turkiye"><img _ngcontent-kan-c299="" felazyload="" alt="" src="assets/logos/social/x.svg"></a><a _ngcontent-kan-c299="" target="_blank" rel="noopener" href="https://www.youtube.com/user/TVMigros"><img _ngcontent-kan-c299="" felazyload="" alt="" src="assets/logos/social/youtube.svg"></a><a _ngcontent-kan-c299="" target="_blank" rel="noopener" href="https://www.linkedin.com/company/migros-ticaret"><img _ngcontent-kan-c299="" felazyload="" alt="" src="assets/logos/social/linkedin.svg"></a>
                          <!---->
                        </div><div _ngcontent-kan-c299="" class="nearest-migros"><a _ngcontent-kan-c299="" routerlink="en-yakin-migros" href="/en-yakin-migros"><fa-icon _ngcontent-kan-c299="" class="ng-fa-icon"><svg role="img" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="location-dot" class="svg-inline--fa fa-location-dot" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 256c-35.3 0-64-28.7-64-64s28.7-64 64-64s64 28.7 64 64s-28.7 64-64 64z"></path></svg></fa-icon> En Yakın Migros </a></div><p _ngcontent-kan-c299="" class="title">Dijital Dergilerimiz</p><div _ngcontent-kan-c299="" class="digital"><a _ngcontent-kan-c299="" target="_blank" rel="noopener" href="https://www.money.com.tr/mc/kampanyalara-bak/migroskop-dijital/83"><span _ngcontent-kan-c299="" class="align-helper"></span><img _ngcontent-kan-c299="" felazyload="" alt="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAKCAYAAABrGwT5AAAAF0lEQVR42mN89uzxfwYyAeOo5lHNhAAA7jIk17T4Y6wAAAAASUVORK5CYII="> Migroskop </a></div><div _ngcontent-kan-c299="" class="digital"><a _ngcontent-kan-c299="" target="_blank" rel="noopener" href="https://www.money.com.tr/mc/kampanyalara-bak/anne-bebek-dijital/92"><span _ngcontent-kan-c299="" class="align-helper"></span><img _ngcontent-kan-c299="" felazyload="" alt="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAKCAYAAABrGwT5AAAAF0lEQVR42mN89uzxfwYyAeOo5lHNhAAA7jIk17T4Y6wAAAAASUVORK5CYII="> Anne-Bebek </a></div>
                        <!---->
                      </div><div _ngcontent-kan-c299="" class="mdc-layout-grid__cell--span-12 mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-12-phone logos-wrapper"><a _ngcontent-kan-c299="" href="https://www.money.com.tr/" target="_blank" rel="noopener"><img _ngcontent-kan-c299="" felazyload="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAKCAYAAABrGwT5AAAAF0lEQVR42mN89uzxfwYyAeOo5lHNhAAA7jIk17T4Y6wAAAAASUVORK5CYII=" alt="money-logo" class="money logo"></a><a _ngcontent-kan-c299="" href="https://migrostv.migros.com.tr/" target="_blank" rel="noopener"><img _ngcontent-kan-c299="" felazyload="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAKCAYAAABrGwT5AAAAF0lEQVR42mN89uzxfwYyAeOo5lHNhAAA7jIk17T4Y6wAAAAASUVORK5CYII=" alt="migros-tv-logo" class="migros-tv logo"></a><a _ngcontent-kan-c299="" href="https://www.money.com.tr/mc/money-ozelliklerini-kesfet/saglikli-yasam-yolculugum/123" target="_blank" rel="noopener"><img _ngcontent-kan-c299="" felazyload="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAKCAYAAABrGwT5AAAAF0lEQVR42mN89uzxfwYyAeOo5lHNhAAA7jIk17T4Y6wAAAAASUVORK5CYII=" alt="saglikli-yasam-logo" class="saglikli-yasam logo"></a><a _ngcontent-kan-c299="" href="https://migrostv.migros.com.tr/kadin-akademisi/" target="_blank" rel="noopener"><img _ngcontent-kan-c299="" src="assets/logos/migros/kadin-akademisi.png" alt="kadin-akademisi-logo" class="kadin-akademisi logo"></a></div></div>
                  </div>
                </div>
              </sm-footer-links><div _ngcontent-kan-c301="" class="divider"></div>
            </div>
            <!----><sm-footer-logos _ngcontent-kan-c301="" _nghost-kan-c300=""><div _ngcontent-kan-c300="" class="logos-wrapper"><div _ngcontent-kan-c300="" class="inner"><div _ngcontent-kan-c300="" class="mdc-layout-grid__cell--span-10 mdc-layout-grid__cell--span-4-phone mdc-layout-grid__cell--span-8-tablet"><div _ngcontent-kan-c300="" class="logo-container"><a _ngcontent-kan-c300="" href="/"><img _ngcontent-kan-c300="" felazyload="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAKCAYAAABrGwT5AAAAF0lEQVR42mN89uzxfwYyAeOo5lHNhAAA7jIk17T4Y6wAAAAASUVORK5CYII=" alt="migros-logo" class="migros-logo"></a><div _ngcontent-kan-c300="" class="copyright text-color-grey">Ürün fiyatlarına KDV bedeli dahildir. ©Migros 2024</div></div></div><div _ngcontent-kan-c300="" class="logos"><a _ngcontent-kan-c300="" id="footer-logos-eyebrand" href="https://www.blindlook.com/eyebrand-profile/migrossanalmarket" target="_blank" rel="noopener"><img _ngcontent-kan-c300="" felazyload="" id="footer-logos-eyebrand-img" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAKCAYAAABrGwT5AAAAF0lEQVR42mN89uzxfwYyAeOo5lHNhAAA7jIk17T4Y6wAAAAASUVORK5CYII=" alt="blindlook-logo" class="blindlook-logo logo"></a><a _ngcontent-kan-c300="" href="https://www.anadolugrubu.com.tr/" target="_blank" rel="noopener"><img _ngcontent-kan-c300="" felazyload="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAKCAYAAABrGwT5AAAAF0lEQVR42mN89uzxfwYyAeOo5lHNhAAA7jIk17T4Y6wAAAAASUVORK5CYII=" alt="anadolu-grubu-logo" class="anadolu-grubu-logo logo"></a><a _ngcontent-kan-c300="" href="https://gidanikoru.com/" target="_blank" rel="noopener"><img _ngcontent-kan-c300="" felazyload="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAKCAYAAABrGwT5AAAAF0lEQVR42mN89uzxfwYyAeOo5lHNhAAA7jIk17T4Y6wAAAAASUVORK5CYII=" alt="gidani-koru-logo" class="gidani-koru-logo logo"></a><a _ngcontent-kan-c300="" href="https://www.guvendamgasi.org.tr/firmadetay.php?Guid=7fb4da7e-00cd-11ea-b063-48df373f4850" target="_blank" rel="noopener"><img _ngcontent-kan-c300="" felazyload="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAKCAYAAABrGwT5AAAAF0lEQVR42mN89uzxfwYyAeOo5lHNhAAA7jIk17T4Y6wAAAAASUVORK5CYII=" alt="guven-damgasi-logo" class="logo guven-damgasi-logo"></a><div _ngcontent-kan-c300="" class="ETBIS"><div _ngcontent-kan-c300="" id="77DC0C5568104C829695C04726B02F78"><a _ngcontent-kan-c300="" href="https://etbis.eticaret.gov.tr/sitedogrulama/77DC0C5568104C829695C04726B02F78" target="_blank"><img _ngcontent-kan-c300="" src="assets/logos/etbis/etbis.jpg" alt="etbis-logo"></a></div></div></div></div></div></sm-footer-logos>
          </div><sm-mobile-bottom-nav _ngcontent-kan-c301="" _nghost-kan-c298=""><nav _ngcontent-kan-c298="" class="container mobile-only"><div _ngcontent-kan-c298="" class="nav-item" tabindex="0" id="mobile-navbar-item-0"><img _ngcontent-kan-c298="" src="assets/icons/bottom-navigation/home-passive.svg" alt="AnasayfaIcon">
                <!----><div _ngcontent-kan-c298="" class="text mat-caption-normal text-align-center"> Anasayfa </div>
              </div><div _ngcontent-kan-c298="" class="nav-item" tabindex="0" id="mobile-navbar-item-1"><img _ngcontent-kan-c298="" src="assets/icons/bottom-navigation/search-passive.svg" alt="KategorilerIcon">
                <!----><div _ngcontent-kan-c298="" class="text mat-caption-normal text-align-center"> Kategoriler </div>
              </div><div _ngcontent-kan-c298="" class="nav-item" id="mobile-navbar-item-2"><img _ngcontent-kan-c298="" src="assets/icons/bottom-navigation/cart-passive.svg" alt="SepetimIcon">
                <!----><div _ngcontent-kan-c298="" class="text mat-caption-normal text-align-center"> Sepetim </div>
              </div><div _ngcontent-kan-c298="" class="nav-item" tabindex="0" id="mobile-navbar-item-3"><img _ngcontent-kan-c298="" src="assets/icons/bottom-navigation/campaign-passive.svg" alt="KampanyalarIcon">
                <!----><div _ngcontent-kan-c298="" class="text mat-caption-normal text-align-center"> Kampanyalar </div>
              </div><div _ngcontent-kan-c298="" class="nav-item" tabindex="0" id="mobile-navbar-item-4"><img _ngcontent-kan-c298="" src="assets/icons/bottom-navigation/profile-passive.svg" alt="HesabımIcon">
                <!----><div _ngcontent-kan-c298="" class="text mat-caption-normal text-align-center"> Hesabım </div>
              </div>
              <!---->
            </nav>
            <!---->
          </sm-mobile-bottom-nav>
        </sm-footer>
        <!----><fe-product-cookie-indicator _ngcontent-kan-c377="" _nghost-kan-c170="">
          <!---->
        </fe-product-cookie-indicator>
        <!---->
        <!---->
        <!---->
      </div>
    </sm-root><script src="runtime.94da1d2ff99c20db.js" type="module"></script><script src="polyfills.67e60b6f51f5b364.js" type="module"></script><script src="scripts.5ed387f44b8881c3.js" defer=""></script><script src="main.6e300704447317f8.js" type="module"></script><script defer="" src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317" integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA==" data-cf-beacon="{&quot;rayId&quot;:&quot;85cb31b44d0a7218&quot;,&quot;version&quot;:&quot;2024.2.1&quot;,&quot;token&quot;:&quot;9341cbf513954834b406c4b23b064434&quot;}" crossorigin="anonymous"></script><div class="cdk-live-announcer-element cdk-visually-hidden" aria-atomic="true" aria-live="polite"></div><div class="cdk-overlay-container sanalmarket"></div><script type="text/javascript" id="">
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
    </script><script type="text/javascript" id="pap_x2s6df8d" src="https://affiliate.migros.com.tr/scripts/trackjs.js"></script><script type="text/javascript" id="">
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
      
    </script><script type="text/javascript" id="">
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
    </script><script type="text/javascript" id="">
      function createCookie(c, d, a) {
        if (a) {
          var b = new Date;
          b.setTime(b.getTime() + 864E5 * a);
          a = "; expires\x3d" + b.toGMTString()
        } else a = "";
        document.cookie = c + "\x3d" + d + a + "; path\x3d/"
      }
      null != google_tag_manager["rm"]["11483837"](15) ? createCookie("lastSource", "google / cpc", 30) : null != google_tag_manager["rm"]["11483837"](17) ? createCookie("lastSource", " /  / ", 30) : 1 == google_tag_manager["rm"]["11483837"](22) ? createCookie("lastSource", "organic", 30) : null == google_tag_manager["rm"]["11483837"](24) && 1 == google_tag_manager["rm"]["11483837"](26) && createCookie("lastSource", "direct", 30);
    </script><script type="text/javascript" id="">
      (function() {
        var b = document.getElementsByTagName("head")[0],
          a = document.createElement("script");
        a.async = !0;
        a.src = "https://tags.bluekai.com/site/83669?ret\x3djs\x26limit\x3d1";
        b.appendChild(a)
      })();
    </script><script type="text/javascript" id="">
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
    </script><script async="" src="https://tags.bkrtx.com/js/bk-coretag.js"></script><script type="text/javascript" id="">
      window.bk_async = function() {
        bk_addPageCtx("e_id_m", google_tag_manager["rm"]["11483837"](47));
        BKTAG.doTag(84003, 10)
      };
    </script><script type="text/javascript" id="">
      var pPath = google_tag_manager["rm"]["11483837"](48),
        sQuery = google_tag_manager["rm"]["11483837"](49),
        r = google_tag_manager["rm"]["11483837"](50) + "?q\x3d" + google_tag_manager["rm"]["11483837"](51);
      "/arama" == google_tag_manager["rm"]["11483837"](52) ? localStorage.setItem("pPath_sQuery", google_tag_manager["rm"]["11483837"](53) + "?q\x3d" + google_tag_manager["rm"]["11483837"](54)) : localStorage.setItem("pPath_sQuery", google_tag_manager["rm"]["11483837"](55));
    </script><script type="text/javascript" id="">
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
    </script><script type="text/javascript" id="">
      fbq("track", "PageView");
    </script><script type="text/javascript" id="">
      var pcode = "https://creativecdn.com/tags?id\x3d" + google_tag_manager["rm"]["11483837"](63) + "_home\x26id\x3d" + google_tag_manager["rm"]["11483837"](65) + "_uid_";
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
    </script><script type="text/javascript" id="">
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
    </script><script type="text/javascript" id="">
      if (google_tag_manager["rm"]["11483837"](66)) {
        var bkPush = document.createElement("img");
        bkPush.setAttribute("src", "https://stags.bluekai.com/site/85196?e_id_s\x3d" + google_tag_manager["rm"]["11483837"](67));
        bkPush.setAttribute("width", "1");
        bkPush.setAttribute("height", "1");
        document.body.appendChild(bkPush)
      };
    </script><script type="text/javascript" id="">
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
    </script><iframe src="https://c30220fd07eff07a4821458de1bffb33.safeframe.googlesyndication.com/safeframe/1-0-40/html/container.html" style="visibility: hidden; display: none;"></iframe><noscript><p style="margin:0;padding:0;border:0;"><img src="https://track.adform.net/Serving/TrackPoint/?pm=2443498&amp;ADFPageName=Tum_sayfalar&amp;ADFdivider=|" width="1" height="1" alt=""></p></noscript><iframe height="0" width="0" style="display: none; visibility: hidden;" src="https://10610902.fls.doubleclick.net/activityi;src=10610902;type=rem;cat=msm-r0;ord=1080327571862;npa=0;auiddc=37027196.1709149487;u20=;ps=1;pcor=1424725957;pscdl=noapi;gtm=45fe42q1z8811483837za201;gcs=G111;gcd=13n3n3l3l5;dma=0;uaa=x86;uab=64;uafvl=Chromium%3B122.0.6261.69%7CNot(A%253ABrand%3B24.0.0.0%7CGoogle%2520Chrome%3B122.0.6261.69;uamb=0;uam=;uap=Windows;uapv=10.0.0;uaw=0;epver=2;~oref=https%3A%2F%2Fwww.migros.com.tr%2F?"></iframe><iframe allow="join-ad-interest-group" data-tagging-id="DC-10610902/rem/msm-r0+standard" data-load-time="1709165580074" height="0" width="0" style="display: none; visibility: hidden;" src="https://td.doubleclick.net/td/fls/rul/activityi;fledge=1;src=10610902;type=rem;cat=msm-r0;ord=1080327571862;npa=0;auiddc=37027196.1709149487;u20=;ps=1;pcor=1424725957;pscdl=noapi;gtm=45fe42q1z8811483837za201;gcs=G111;gcd=13n3n3l3l5;dma=0;uaa=x86;uab=64;uafvl=Chromium%3B122.0.6261.69%7CNot(A%253ABrand%3B24.0.0.0%7CGoogle%2520Chrome%3B122.0.6261.69;uamb=0;uam=;uap=Windows;uapv=10.0.0;uaw=0;epver=2;~oref=https%3A%2F%2Fwww.migros.com.tr%2F?"></iframe><iframe height="0" width="0" style="display: none; visibility: hidden;" src="https://10610902.fls.doubleclick.net/activityi;src=10610902;type=home;cat=msm-h0;ord=6559746898356;npa=0;auiddc=37027196.1709149487;u14=%2F;u20=;u16=Home;ps=1;pcor=53713672;pscdl=noapi;gtm=45fe42q1z8811483837za201;gcs=G111;gcd=13n3n3l3l5;dma=0;uaa=x86;uab=64;uafvl=Chromium%3B122.0.6261.69%7CNot(A%253ABrand%3B24.0.0.0%7CGoogle%2520Chrome%3B122.0.6261.69;uamb=0;uam=;uap=Windows;uapv=10.0.0;uaw=0;epver=2;~oref=https%3A%2F%2Fwww.migros.com.tr%2F?"></iframe><iframe allow="join-ad-interest-group" data-tagging-id="DC-10610902/home/msm-h0+standard" data-load-time="1709165580101" height="0" width="0" style="display: none; visibility: hidden;" src="https://td.doubleclick.net/td/fls/rul/activityi;fledge=1;src=10610902;type=home;cat=msm-h0;ord=6559746898356;npa=0;auiddc=37027196.1709149487;u14=%2F;u20=;u16=Home;ps=1;pcor=53713672;pscdl=noapi;gtm=45fe42q1z8811483837za201;gcs=G111;gcd=13n3n3l3l5;dma=0;uaa=x86;uab=64;uafvl=Chromium%3B122.0.6261.69%7CNot(A%253ABrand%3B24.0.0.0%7CGoogle%2520Chrome%3B122.0.6261.69;uamb=0;uam=;uap=Windows;uapv=10.0.0;uaw=0;epver=2;~oref=https%3A%2F%2Fwww.migros.com.tr%2F?"></iframe><iframe allow="join-ad-interest-group" data-tagging-id="AW-715674769" data-load-time="1709165580155" height="0" width="0" style="display: none; visibility: hidden;" src="https://td.doubleclick.net/td/rul/715674769?random=1709165580145&amp;cv=11&amp;fst=1709165580145&amp;fmt=3&amp;bg=ffffff&amp;guid=ON&amp;async=1&amp;gtm=45be42q1v889281616z8811483837za201&amp;gcd=13n3n3l3l5&amp;dma=0&amp;u_w=1366&amp;u_h=768&amp;url=https%3A%2F%2Fwww.migros.com.tr%2F&amp;hn=www.googleadservices.com&amp;frm=0&amp;tiba=Migros%20Sanal%20Market%3A%20Online%20Market%20Al%C4%B1%C5%9Fveri%C5%9Fi&amp;npa=0&amp;pscdl=noapi&amp;auid=37027196.1709149487&amp;uaa=x86&amp;uab=64&amp;uafvl=Chromium%3B122.0.6261.69%7CNot(A%253ABrand%3B24.0.0.0%7CGoogle%2520Chrome%3B122.0.6261.69&amp;uamb=0&amp;uap=Windows&amp;uapv=10.0.0&amp;uaw=0&amp;fledge=1"></iframe><iframe name="__bkframe" id="__bkframe" title="bk" src="about:blank" style="border: 0px; width: 0px; height: 0px; display: none; position: absolute; clip: rect(0px, 0px, 0px, 0px);"></iframe><div id="criteo-tags-div" style="display: none;"></div><iframe name="google_ads_top_frame" id="google_ads_top_frame" style="display: none; position: fixed; left: -999px; top: -999px; width: 0px; height: 0px;"></iframe><script type="text/javascript" id="">
      (function() {
        var b = document.getElementsByTagName("head")[0],
          a = document.createElement("script");
        a.async = !0;
        a.src = "https://tags.bluekai.com/site/83669?ret\x3djs\x26limit\x3d1";
        b.appendChild(a)
      })();
    </script><script type="text/javascript" id="">
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
    </script><script async="" src="https://tags.bkrtx.com/js/bk-coretag.js"></script><script type="text/javascript" id="">
      window.bk_async = function() {
        bk_addPageCtx("e_id_m", google_tag_manager["rm"]["11483837"](189));
        BKTAG.doTag(84003, 10)
      };
    </script><script type="text/javascript" id="">
      var pPath = google_tag_manager["rm"]["11483837"](190),
        sQuery = google_tag_manager["rm"]["11483837"](191),
        r = google_tag_manager["rm"]["11483837"](192) + "?q\x3d" + google_tag_manager["rm"]["11483837"](193);
      "/arama" == google_tag_manager["rm"]["11483837"](194) ? localStorage.setItem("pPath_sQuery", google_tag_manager["rm"]["11483837"](195) + "?q\x3d" + google_tag_manager["rm"]["11483837"](196)) : localStorage.setItem("pPath_sQuery", google_tag_manager["rm"]["11483837"](197));
    </script><script type="text/javascript" id="">
      fbq("track", "PageView");
    </script><script type="text/javascript" id="">
      var pcode = "https://creativecdn.com/tags?id\x3d" + google_tag_manager["rm"]["11483837"](200) + "_offer_" + google_tag_manager["rm"]["11483837"](201);
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
    </script><iframe src="https://creativecdn.com/tags?id=pr_U1qof8QEUsd2Zj95oDXI_offer_08089682" id="creativecdnIframe" style="width: 1px; height: 1px; display: none;"></iframe><script type="text/javascript" id="">
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
    </script><script type="text/javascript" id="">
      if (google_tag_manager["rm"]["11483837"](202)) {
        var bkPush = document.createElement("img");
        bkPush.setAttribute("src", "https://stags.bluekai.com/site/85196?e_id_s\x3d" + google_tag_manager["rm"]["11483837"](203));
        bkPush.setAttribute("width", "1");
        bkPush.setAttribute("height", "1");
        document.body.appendChild(bkPush)
      };
    </script><script type="text/javascript" id="">
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
    </script><noscript><p style="margin:0;padding:0;border:0;"><img src="https://track.adform.net/Serving/TrackPoint/?pm=2443498&amp;ADFPageName=Tum_sayfalar&amp;ADFdivider=|" width="1" height="1" alt=""></p></noscript><script type="text/javascript" id="">
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
    </script><script async="" src="https://tags.bkrtx.com/js/bk-coretag.js"></script><script type="text/javascript" id="">
      window.bk_async = function() {
        bk_addPageCtx("e_id_m", "");
        var a = google_tag_manager["rm"]["11483837"](208);
        bk_addPageCtx("product_brand", a.brand.bluekaienc());
        BKTAG.doTag(84003, 10)
      };
    </script><script type="text/javascript" id="">
      window._adftrack = Array.isArray(window._adftrack) ? window._adftrack : window._adftrack ? [window._adftrack] : [];
      window._adftrack.push({
        HttpHost: "track.adform.net",
        pm: 2443498,
        divider: encodeURIComponent("_"),
        pagename: encodeURIComponent("ProductDetail_Kuruyemiş\/Atıştırmalık")
      });
      (function() {
        var a = document.createElement("script");
        a.type = "text/javascript";
        a.async = !0;
        a.src = "https://s2.adform.net/banners/scripts/st/trackpoint-async.js";
        var b = document.getElementsByTagName("script")[0];
        b.parentNode.insertBefore(a, b)
      })();
    </script><noscript><p style="margin:0;padding:0;border:0;"><img src="https://track.adform.net/Serving/TrackPoint/?pm=2443498&amp;ADFPageName=WebsiteName|SectionName|SubSection|PageName&amp;ADFdivider=_" width="1" height="1" alt=""></p></noscript><script type="text/javascript" id="">
      window._adftrack = Array.isArray(window._adftrack) ? window._adftrack : window._adftrack ? [window._adftrack] : [];
      window._adftrack.push({
        HttpHost: "track.adform.net",
        pm: 2443498,
        pagename: encodeURIComponent("Product page"),
        divider: encodeURIComponent("|"),
        products: [{
          productid: "08089682",
          categoryname: "Kuruyemiş\/Atıştırmalık",
          productname: "By İzzet Antep Fıstığı 200 G",
          productsales: "129.90",
          step: 2
        }]
      });
      (function() {
        var a = document.createElement("script");
        a.type = "text/javascript";
        a.async = !0;
        a.src = "https://s2.adform.net/banners/scripts/st/trackpoint-async.js";
        var b = document.getElementsByTagName("script")[0];
        b.parentNode.insertBefore(a, b)
      })();
    </script><noscript><p style="margin:0;padding:0;border:0;"><img src="https://track.adform.net/Serving/TrackPoint/?pm=2443498&amp;ADFPageName=Product%20page&amp;ADFdivider=|" width="1" height="1" alt=""></p></noscript><script type="text/javascript" id="">
      fbq("track", "ViewContent", {
        value: google_tag_manager["rm"]["11483837"](227),
        currency: "TRY",
        content_ids: "08089682",
        content_name: "By İzzet Antep Fıstığı 200 G",
        content_type: "product"
      });
    </script><iframe height="0" width="0" style="display: none; visibility: hidden;" src="https://10610902.fls.doubleclick.net/activityi;src=10610902;type=productd;cat=msm-p0;ord=3281954717170;npa=0;auiddc=37027196.1709149487;u1=By%20%C4%B0zzet%20Antep%20F%C4%B1st%C4%B1%C4%9F%C4%B1%20200%20G;u2=08089682;u3=Kuruyemi%C5%9F%2FAt%C4%B1%C5%9Ft%C4%B1rmal%C4%B1k;u4=Kuruyemi%C5%9F%2FAt%C4%B1%C5%9Ft%C4%B1rmal%C4%B1k;u8=129.90;u11=By%20%C4%B0zzet;u14=%2Fby-izzet-antep-fistigi-200-g-p-7b7052;u20=;u16=ProductDetail;ps=1;pcor=967347876;pscdl=noapi;gtm=45fe42q1z8811483837za201;gcs=G111;gcd=13n3n3l3l5;dma=0;uaa=x86;uab=64;uafvl=Chromium%3B122.0.6261.69%7CNot(A%253ABrand%3B24.0.0.0%7CGoogle%2520Chrome%3B122.0.6261.69;uamb=0;uam=;uap=Windows;uapv=10.0.0;uaw=0;epver=2;~oref=https%3A%2F%2Fwww.migros.com.tr%2Fby-izzet-antep-fistigi-200-g-p-7b7052?"></iframe><iframe allow="join-ad-interest-group" data-tagging-id="DC-10610902/productd/msm-p0+standard" data-load-time="1709165582952" height="0" width="0" style="display: none; visibility: hidden;" src="https://td.doubleclick.net/td/fls/rul/activityi;fledge=1;src=10610902;type=productd;cat=msm-p0;ord=3281954717170;npa=0;auiddc=37027196.1709149487;u1=By%20%C4%B0zzet%20Antep%20F%C4%B1st%C4%B1%C4%9F%C4%B1%20200%20G;u2=08089682;u3=Kuruyemi%C5%9F%2FAt%C4%B1%C5%9Ft%C4%B1rmal%C4%B1k;u4=Kuruyemi%C5%9F%2FAt%C4%B1%C5%9Ft%C4%B1rmal%C4%B1k;u8=129.90;u11=By%20%C4%B0zzet;u14=%2Fby-izzet-antep-fistigi-200-g-p-7b7052;u20=;u16=ProductDetail;ps=1;pcor=967347876;pscdl=noapi;gtm=45fe42q1z8811483837za201;gcs=G111;gcd=13n3n3l3l5;dma=0;uaa=x86;uab=64;uafvl=Chromium%3B122.0.6261.69%7CNot(A%253ABrand%3B24.0.0.0%7CGoogle%2520Chrome%3B122.0.6261.69;uamb=0;uam=;uap=Windows;uapv=10.0.0;uaw=0;epver=2;~oref=https%3A%2F%2Fwww.migros.com.tr%2Fby-izzet-antep-fistigi-200-g-p-7b7052?"></iframe><iframe height="0" width="0" style="display: none; visibility: hidden;" src="https://5340910.fls.doubleclick.net/activityi;src=5340910;type=viewpro;cat=viewp0;ord=2278545393342;npa=0;auiddc=37027196.1709149487;ps=1;pcor=560005647;pscdl=noapi;gtm=45fe42q1z8811483837za201;gcs=G111;gcd=13n3n3l3l5;dma=0;uaa=x86;uab=64;uafvl=Chromium%3B122.0.6261.69%7CNot(A%253ABrand%3B24.0.0.0%7CGoogle%2520Chrome%3B122.0.6261.69;uamb=0;uam=;uap=Windows;uapv=10.0.0;uaw=0;epver=2;~oref=https%3A%2F%2Fwww.migros.com.tr%2Fby-izzet-antep-fistigi-200-g-p-7b7052?"></iframe><iframe allow="join-ad-interest-group" data-tagging-id="DC-5340910/viewpro/viewp0+standard" data-load-time="1709165584115" height="0" width="0" style="display: none; visibility: hidden;" src="https://td.doubleclick.net/td/fls/rul/activityi;fledge=1;src=5340910;type=viewpro;cat=viewp0;ord=2278545393342;npa=0;auiddc=37027196.1709149487;ps=1;pcor=560005647;pscdl=noapi;gtm=45fe42q1z8811483837za201;gcs=G111;gcd=13n3n3l3l5;dma=0;uaa=x86;uab=64;uafvl=Chromium%3B122.0.6261.69%7CNot(A%253ABrand%3B24.0.0.0%7CGoogle%2520Chrome%3B122.0.6261.69;uamb=0;uam=;uap=Windows;uapv=10.0.0;uaw=0;epver=2;~oref=https%3A%2F%2Fwww.migros.com.tr%2Fby-izzet-antep-fistigi-200-g-p-7b7052?"></iframe><iframe height="0" width="0" title="Criteo DIS iframe" style="display: none;"></iframe><iframe height="0" width="0" title="Criteo DIS iframe" style="display: none;"></iframe>
  </body>
</html>