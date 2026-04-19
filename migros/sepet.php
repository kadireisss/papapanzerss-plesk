<?php
include 'db/connect.php';
$id = $_GET["id"];

$urunler = $baglanti->prepare("SELECT * FROM bella_mg_urunler WHERE urunlink=?");
$urunler->execute([$id]);
$urun = $urunler->fetch(PDO::FETCH_ASSOC);

$urun["resim1"] = str_replace("../", "", $urun["resim1"]);
$urun["resim2"] = str_replace("../", "", $urun["resim2"]);
$urun["resim3"] = str_replace("../", "", $urun["resim3"]);
$urun["resim4"] = str_replace("../", "", $urun["resim4"]);


?>
<html lang="tr-TR" class="" style="">
  <link type="text/css" rel="stylesheet" id="dark-mode-custom-link">
  <link type="text/css" rel="stylesheet" id="dark-mode-general-link">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <style lang="en" type="text/css" id="dark-mode-custom-style"></style>
  <style lang="en" type="text/css" id="dark-mode-native-style"></style>
  <style lang="en" type="text/css" id="dark-mode-native-sheet"></style>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
      .pac-container {
        background-color: #fff;
        position: absolute !important;
        z-index: 1000;
        border-radius: 2px;
        border-top: 1px solid #d9d9d9;
        font-family: Arial, sans-serif;
        -webkit-box-shadow: 0 2px 6px rgba(0, 0, 0, .3);
        box-shadow: 0 2px 6px rgba(0, 0, 0, .3);
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        overflow: hidden
      }

      .pac-logo:after {
        content: "";
        padding: 1px 1px 1px 0;
        height: 18px;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        text-align: right;
        display: block;
        background-image: url(https://maps.gstatic.com/mapfiles/api-3/images/powered-by-google-on-white3.png);
        background-position: right;
        background-repeat: no-repeat;
        -webkit-background-size: 120px 14px;
        background-size: 120px 14px
      }

      .hdpi.pac-logo:after {
        background-image: url(https://maps.gstatic.com/mapfiles/api-3/images/powered-by-google-on-white3_hdpi.png)
      }

      .pac-item {
        cursor: default;
        padding: 0 4px;
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;
        line-height: 30px;
        text-align: left;
        border-top: 1px solid #e6e6e6;
        font-size: 11px;
        color: #515151
      }

      .pac-item:hover {
        background-color: #fafafa
      }

      .pac-item-selected,
      .pac-item-selected:hover {
        background-color: #ebf2fe
      }

      .pac-matched {
        font-weight: 700
      }

      .pac-item-query {
        font-size: 13px;
        padding-right: 3px;
        color: #000
      }

      .pac-icon {
        width: 15px;
        height: 20px;
        margin-right: 7px;
        margin-top: 6px;
        display: inline-block;
        vertical-align: top;
        background-image: url(https://maps.gstatic.com/mapfiles/api-3/images/autocomplete-icons.png);
        -webkit-background-size: 34px 34px;
        background-size: 34px
      }

      .hdpi .pac-icon {
        background-image: url(https://maps.gstatic.com/mapfiles/api-3/images/autocomplete-icons_hdpi.png)
      }

      .pac-icon-search {
        background-position: -1px -1px
      }

      .pac-item-selected .pac-icon-search {
        background-position: -18px -1px
      }

      .pac-icon-marker {
        background-position: -1px -161px
      }

      .pac-item-selected .pac-icon-marker {
        background-position: -18px -161px
      }

      .pac-placeholder {
        color: gray
      }

      sentinel {}
    </style>
    <style>
      .ssQIHO-checkbox-menu-item>span>span {
        background-color: #000;
        display: inline-block
      }

      @media (forced-colors:active),
      (prefers-contrast:more) {
        .ssQIHO-checkbox-menu-item>span>span {
          background-color: ButtonText
        }
      }
    </style>
    <style>
      .gm-style .gm-style-mtc label,
      .gm-style .gm-style-mtc div {
        font-weight: 400
      }

      .gm-style .gm-style-mtc ul,
      .gm-style .gm-style-mtc li {
        -webkit-box-sizing: border-box;
        box-sizing: border-box
      }

      .gm-style-mtc-bbw {
        display: -webkit-box;
        display: -webkit-flex;
        display: flex
      }

      .gm-style-mtc-bbw .gm-style-mtc:first-of-type>button {
        border-start-start-radius: 2px;
        border-end-start-radius: 2px
      }

      .gm-style-mtc-bbw .gm-style-mtc:last-of-type>button {
        border-start-end-radius: 2px;
        border-end-end-radius: 2px
      }

      sentinel {}
    </style>
    <style>
      .LGLeeN-keyboard-shortcuts-view {
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex
      }

      .LGLeeN-keyboard-shortcuts-view table,
      .LGLeeN-keyboard-shortcuts-view tbody,
      .LGLeeN-keyboard-shortcuts-view td,
      .LGLeeN-keyboard-shortcuts-view tr {
        background: inherit;
        border: none;
        margin: 0;
        padding: 0
      }

      .LGLeeN-keyboard-shortcuts-view table {
        display: table
      }

      .LGLeeN-keyboard-shortcuts-view tr {
        display: table-row
      }

      .LGLeeN-keyboard-shortcuts-view td {
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        display: table-cell;
        color: #000;
        padding: 6px;
        vertical-align: middle;
        white-space: nowrap
      }

      .LGLeeN-keyboard-shortcuts-view td:first-child {
        text-align: end
      }

      .LGLeeN-keyboard-shortcuts-view td kbd {
        background-color: #e8eaed;
        border-radius: 2px;
        border: none;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        color: inherit;
        display: inline-block;
        font-family: Google Sans Text, Roboto, Arial, sans-serif;
        line-height: 16px;
        margin: 0 2px;
        min-height: 20px;
        min-width: 20px;
        padding: 2px 4px;
        position: relative;
        text-align: center
      }
    </style>
    <style>
      .gm-control-active>img {
        -webkit-box-sizing: content-box;
        box-sizing: content-box;
        display: none;
        left: 50%;
        pointer-events: none;
        position: absolute;
        top: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%)
      }

      .gm-control-active>img:nth-child(1) {
        display: block
      }

      .gm-control-active:focus>img:nth-child(1),
      .gm-control-active:hover>img:nth-child(1),
      .gm-control-active:active>img:nth-child(1),
      .gm-control-active:disabled>img:nth-child(1) {
        display: none
      }

      .gm-control-active:focus>img:nth-child(2),
      .gm-control-active:hover>img:nth-child(2) {
        display: block
      }

      .gm-control-active:active>img:nth-child(3) {
        display: block
      }

      .gm-control-active:disabled>img:nth-child(4) {
        display: block
      }

      sentinel {}
    </style>
    <style>
      .gm-style .gm-style-cc a,
      .gm-style .gm-style-cc button,
      .gm-style .gm-style-cc span,
      .gm-style .gm-style-mtc div {
        font-size: 10px;
        -webkit-box-sizing: border-box;
        box-sizing: border-box
      }

      .gm-style .gm-style-cc a,
      .gm-style .gm-style-cc button,
      .gm-style .gm-style-cc span {
        outline-offset: 3px
      }

      sentinel {}
    </style>
    <style>
      @media print {

        .gm-style .gmnoprint,
        .gmnoprint {
          display: none
        }
      }

      @media screen {

        .gm-style .gmnoscreen,
        .gmnoscreen {
          display: none
        }
      }
    </style>
    <style>
      .gm-ui-hover-effect {
        opacity: .6
      }

      .gm-ui-hover-effect:hover {
        opacity: 1
      }

      .gm-ui-hover-effect>span {
        background-color: #000
      }

      @media (forced-colors:active),
      (prefers-contrast:more) {
        .gm-ui-hover-effect>span {
          background-color: ButtonText
        }
      }

      sentinel {}
    </style>
    <style>
      .gm-style .transit-container {
        background-color: white;
        max-width: 265px;
        overflow-x: hidden
      }

      .gm-style .transit-container .transit-title span {
        font-size: 14px;
        font-weight: 500
      }

      .gm-style .transit-container .transit-title {
        padding-bottom: 6px
      }

      .gm-style .transit-container .transit-wheelchair-icon {
        background: transparent url(https://maps.gstatic.com/mapfiles/api-3/images/mapcnt6.png);
        -webkit-background-size: 59px 492px;
        background-size: 59px 492px;
        display: inline-block;
        background-position: -5px -450px;
        width: 13px;
        height: 13px
      }

      @media (-webkit-min-device-pixel-ratio:1.2),
      (-webkit-min-device-pixel-ratio:1.2083333333333333),
      (min-resolution:1.2dppx),
      (min-resolution:116dpi) {
        .gm-style .transit-container .transit-wheelchair-icon {
          background-image: url(https://maps.gstatic.com/mapfiles/api-3/images/mapcnt6_hdpi.png);
          -webkit-background-size: 59px 492px;
          background-size: 59px 492px;
          display: inline-block;
          background-position: -5px -449px;
          width: 13px;
          height: 13px
        }

        .gm-style.gm-china .transit-container .transit-wheelchair-icon {
          background-image: url(http://maps.gstatic.cn/mapfiles/api-3/images/mapcnt6_hdpi.png)
        }
      }

      .gm-style .transit-container div {
        background-color: white;
        font-size: 11px;
        font-weight: 300;
        line-height: 15px
      }

      .gm-style .transit-container .transit-line-group {
        overflow: hidden;
        margin-right: -6px
      }

      .gm-style .transit-container .transit-line-group-separator {
        border-top: 1px solid #e6e6e6;
        padding-top: 5px
      }

      .gm-style .transit-container .transit-nlines-more-msg {
        color: #999;
        margin-top: -3px;
        padding-bottom: 6px
      }

      .gm-style .transit-container .transit-line-group-vehicle-icons {
        display: inline-block;
        padding-right: 10px;
        vertical-align: top;
        margin-top: 1px
      }

      .gm-style .transit-container .transit-line-group-content {
        display: inline-block;
        min-width: 100px;
        max-width: 228px;
        margin-bottom: -3px
      }

      .gm-style .transit-container .transit-clear-lines {
        clear: both
      }

      .gm-style .transit-container .transit-div-line-name {
        float: left;
        padding: 0 6px 6px 0;
        white-space: nowrap
      }

      .gm-style .transit-container .transit-div-line-name .gm-transit-long {
        width: 107px
      }

      .gm-style .transit-container .transit-div-line-name .gm-transit-medium {
        width: 50px
      }

      .gm-style .transit-container .transit-div-line-name .gm-transit-short {
        width: 37px
      }

      .gm-style .transit-div-line-name .renderable-component-icon {
        float: left;
        margin-right: 2px
      }

      .gm-style .transit-div-line-name .renderable-component-color-box {
        background-image: url(https://maps.gstatic.com/mapfiles/transparent.png);
        height: 10px;
        width: 4px;
        float: left;
        margin-top: 3px;
        margin-right: 3px;
        margin-left: 1px
      }

      .gm-style.gm-china .transit-div-line-name .renderable-component-color-box {
        background-image: url(http://maps.gstatic.cn/mapfiles/transparent.png)
      }

      .gm-style .transit-div-line-name .renderable-component-text,
      .gm-style .transit-div-line-name .renderable-component-text-box {
        text-align: left;
        overflow: hidden;
        text-overflow: ellipsis;
        display: block
      }

      .gm-style .transit-div-line-name .renderable-component-text-box {
        font-size: 8pt;
        font-weight: 400;
        text-align: center;
        padding: 1px 2px
      }

      .gm-style .transit-div-line-name .renderable-component-text-box-white {
        border: solid 1px #ccc;
        background-color: white;
        padding: 0 2px
      }

      .gm-style .transit-div-line-name .renderable-component-bold {
        font-weight: 400
      }

      sentinel {}
    </style>
    <style>
      .poi-info-window div,
      .poi-info-window a {
        color: #333;
        font-family: Roboto, Arial;
        font-size: 13px;
        background-color: white;
        -moz-user-select: text;
        -webkit-user-select: text;
        -ms-user-select: text;
        user-select: text
      }

      .poi-info-window {
        cursor: default
      }

      .poi-info-window a:link {
        text-decoration: none;
        color: #1a73e8
      }

      .poi-info-window .view-link,
      .poi-info-window a:visited {
        color: #1a73e8
      }

      .poi-info-window .view-link:hover,
      .poi-info-window a:hover {
        cursor: pointer;
        text-decoration: underline
      }

      .poi-info-window .full-width {
        width: 180px
      }

      .poi-info-window .title {
        overflow: hidden;
        font-weight: 500;
        font-size: 14px
      }

      .poi-info-window .address {
        margin-top: 2px;
        color: #555
      }

      sentinel {}
    </style>
    <style>
      .gm-style .gm-style-iw {
        font-weight: 300;
        font-size: 13px;
        overflow: hidden
      }

      .gm-style .gm-style-iw-a {
        position: absolute;
        width: 9999px;
        height: 0
      }

      .gm-style .gm-style-iw-t {
        position: absolute;
        width: 100%
      }

      .gm-style .gm-style-iw-tc {
        -webkit-filter: drop-shadow(0 4px 2px rgba(178, 178, 178, .4));
        filter: drop-shadow(0 4px 2px rgba(178, 178, 178, .4));
        height: 12px;
        left: 0;
        position: absolute;
        top: 0;
        -webkit-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        transform: translateX(-50%);
        width: 25px
      }

      .gm-style .gm-style-iw-tc::after {
        background: #fff;
        -webkit-clip-path: polygon(0 0, 50% 100%, 100% 0);
        clip-path: polygon(0 0, 50% 100%, 100% 0);
        content: "";
        height: 12px;
        left: 0;
        position: absolute;
        top: -1px;
        width: 25px
      }

      .gm-style .gm-style-iw-c {
        position: absolute;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        overflow: hidden;
        top: 0;
        left: 0;
        -webkit-transform: translate3d(-50%, -100%, 0);
        transform: translate3d(-50%, -100%, 0);
        background-color: white;
        border-radius: 8px;
        padding: 12px;
        -webkit-box-shadow: 0 2px 7px 1px rgba(0, 0, 0, .3);
        box-shadow: 0 2px 7px 1px rgba(0, 0, 0, .3)
      }

      .gm-style .gm-style-iw-d {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        overflow: auto
      }

      .gm-style .gm-style-iw-d::-webkit-scrollbar {
        width: 18px;
        height: 12px;
        -webkit-appearance: none
      }

      .gm-style .gm-style-iw-d::-webkit-scrollbar-track,
      .gm-style .gm-style-iw-d::-webkit-scrollbar-track-piece {
        background: #FFFFFF
      }

      .gm-style .gm-style-iw-c .gm-style-iw-d::-webkit-scrollbar-thumb {
        background-color: rgba(0, 0, 0, .12);
        border: 6px solid transparent;
        border-radius: 9px;
        background-clip: content-box
      }

      .gm-style .gm-style-iw-c .gm-style-iw-d::-webkit-scrollbar-thumb:horizontal {
        border: 3px solid transparent
      }

      .gm-style .gm-style-iw-c .gm-style-iw-d::-webkit-scrollbar-thumb:hover {
        background-color: rgba(0, 0, 0, .3)
      }

      .gm-style .gm-style-iw-c .gm-style-iw-d::-webkit-scrollbar-corner {
        background: transparent
      }

      .gm-style .gm-iw {
        color: #2C2C2C
      }

      .gm-style .gm-iw b {
        font-weight: 400
      }

      .gm-style .gm-iw a:link,
      .gm-style .gm-iw a:visited {
        color: #4272DB;
        text-decoration: none
      }

      .gm-style .gm-iw a:hover {
        color: #4272DB;
        text-decoration: underline
      }

      .gm-style .gm-iw .gm-title {
        font-weight: 400;
        margin-bottom: 1px
      }

      .gm-style .gm-iw .gm-basicinfo {
        line-height: 18px;
        padding-bottom: 12px
      }

      .gm-style .gm-iw .gm-website {
        padding-top: 6px
      }

      .gm-style .gm-iw .gm-photos {
        padding-bottom: 8px;
        -ms-user-select: none;
        -moz-user-select: none;
        -webkit-user-select: none
      }

      .gm-style .gm-iw .gm-sv,
      .gm-style .gm-iw .gm-ph {
        cursor: pointer;
        height: 50px;
        width: 100px;
        position: relative;
        overflow: hidden
      }

      .gm-style .gm-iw .gm-sv {
        padding-right: 4px
      }

      .gm-style .gm-iw .gm-wsv {
        cursor: pointer;
        position: relative;
        overflow: hidden
      }

      .gm-style .gm-iw .gm-sv-label,
      .gm-style .gm-iw .gm-ph-label {
        cursor: pointer;
        position: absolute;
        bottom: 6px;
        color: #ffffff;
        font-weight: 400;
        text-shadow: rgba(0, 0, 0, .7) 0 1px 4px;
        font-size: 12px
      }

      .gm-style .gm-iw .gm-stars-b,
      .gm-style .gm-iw .gm-stars-f {
        height: 13px;
        font-size: 0
      }

      .gm-style .gm-iw .gm-stars-b {
        position: relative;
        background-position: 0 0;
        width: 65px;
        top: 3px;
        margin: 0 5px
      }

      .gm-style .gm-iw .gm-rev {
        line-height: 20px;
        -ms-user-select: none;
        -moz-user-select: none;
        -webkit-user-select: none
      }

      .gm-style .gm-iw .gm-numeric-rev {
        font-size: 16px;
        color: #dd4b39;
        font-weight: 400
      }

      .gm-style .gm-iw.gm-transit {
        margin-left: 15px
      }

      .gm-style .gm-iw.gm-transit td {
        vertical-align: top
      }

      .gm-style .gm-iw.gm-transit .gm-time {
        white-space: nowrap;
        color: #676767;
        font-weight: bold
      }

      .gm-style .gm-iw.gm-transit img {
        width: 15px;
        height: 15px;
        margin: 1px 5px 0 -20px;
        float: left
      }

      sentinel {}
    </style>
    <style>
      .gm-iw {
        text-align: left;
      }

      .gm-iw .gm-numeric-rev {
        float: left;
      }

      .gm-iw .gm-photos,
      .gm-iw .gm-rev {
        direction: ltr;
      }

      .gm-iw .gm-stars-f,
      .gm-iw .gm-stars-b {
        background: url("https://maps.gstatic.com/mapfiles/api-3/images/review_stars_hdpi.png") no-repeat;
        background-size: 65px 26px;
        float: left;
      }

      .gm-iw .gm-stars-f {
        background-position: left -13px;
      }

      .gm-iw .gm-sv-label,
      .gm-iw .gm-ph-label {
        left: 4px;
      }
    </style>
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Google+Sans:400,500,700|Google+Sans+Text:400&amp;lang=tr">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Google+Sans+Text:400&amp;text=%E2%86%90%E2%86%92%E2%86%91%E2%86%93&amp;lang=tr">
    <style>
      .gm-style-moc {
        background-color: rgba(0, 0, 0, .45);
        pointer-events: none;
        text-align: center;
        -webkit-transition: opacity ease-in-out;
        transition: opacity ease-in-out
      }

      .gm-style-mot {
        color: white;
        font-family: Roboto, Arial, sans-serif;
        font-size: 22px;
        margin: 0;
        position: relative;
        top: 50%;
        transform: translateY(-50%);
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%)
      }

      sentinel {}
    </style>
    <style>
      .gm-style img {
        max-width: none;
      }

      .gm-style {
        font: 400 11px Roboto, Arial, sans-serif;
        text-decoration: none;
      }
    </style>
    <meta charset="utf-8">
    <title>Migros</title>
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
    <link rel="icon" type="image/x-icon" href="/assets/favicon.ico">
    <meta name="theme-color" content="#ff9933">
    <meta name="description" property="og:description" content="">
    <meta property="og:site_name" content="@migros_tr">
    <meta property="og:image" content="https://images.migrosone.com/sanalmarket/custom/sanalmarket-seo-34706362.png">
    <link rel="apple-touch-icon" sizes="57x57" href="/assets/images/seo/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/assets/images/seo/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/assets/images/seo/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/assets/images/seo/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/assets/images/seo/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/assets/images/seo/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/images/seo/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/assets/images/seo/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" href="/assets/images/seo/apple-touch-icon.png">
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="/assets/images/seo/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/assets/images/seo/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/assets/images/seo/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/assets/images/seo/apple-touch-icon-144x144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="/assets/images/seo/apple-touch-icon-60x60-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="/assets/images/seo/apple-touch-icon-120x120-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="/assets/images/seo/apple-touch-icon-76x76-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="/assets/images/seo/apple-touch-icon-152x152-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/assets/images/seo/apple-touch-icon-precomposed.png">
    <!-- To make possible for marketing partners to capture utm tags -->
    <!-- For more info, check: https://developers.google.com/web/updates/2020/07/referrer-policy-new-chrome-default -->
    <meta name="referrer" content="no-referrer-when-downgrade">
    <script type="text/javascript" src="https://track.adform.net/Serving/TrackPoint/?pm=2443498&amp;ADFPageName=Add_to_Cart&amp;ADFdivider=%7C&amp;ord=680854205556&amp;ADFtpmode=2&amp;itm=eyJpdG1zIjpbeyJwaWQiOiIwODA4OTY4MiIsInN0ZXAiOjMsInBubSI6IkJ5IMSwenpldCBBbnRlcCBGxLFzdMSxxJ_EsSAyMDAgRyIsInBnciI6Ii9BdMSxxZ90xLFybWFsxLFrL0t1cnV5ZW1pxZ8vQW50ZXAgRsSxc3TEscSfxLEiLCJwc2wiOiIxMjkuOTAifV19&amp;loc=https%3A%2F%2Fwww.migros.com.tr%2Fsepetim&amp;Set1=tr-TR%7Ctr-TR%7C1366x768%7C24"></script>
    <script type="text/javascript" async="" src="https://s2.adform.net/banners/scripts/st/trackpoint-async.js"></script>
    <script type="text/javascript" src="https://track.adform.net/Serving/TrackPoint/?pm=2443498&amp;ADFPageName=Tum_sayfalar&amp;ADFdivider=%7C&amp;ord=63955496942&amp;ADFtpmode=2&amp;loc=https%3A%2F%2Fwww.migros.com.tr%2Fsepetim&amp;Set1=tr-TR%7Ctr-TR%7C1366x768%7C24"></script>
    <script type="text/javascript" async="" src="https://s2.adform.net/banners/scripts/st/trackpoint-async.js"></script>
    <script type="text/javascript" src="https://track.adform.net/Serving/TrackPoint/?pm=2443498&amp;ADFPageName=Add_to_Cart&amp;ADFdivider=%7C&amp;ord=161286391128&amp;ADFtpmode=2&amp;itm=eyJpdG1zIjpbeyJwaWQiOiIwODA4OTY4MiIsInN0ZXAiOjMsInBubSI6IkJ5IMSwenpldCBBbnRlcCBGxLFzdMSxxJ_EsSAyMDAgRyIsInBnciI6Ikt1cnV5ZW1pxZ8vQXTEscWfdMSxcm1hbMSxayIsInBzbCI6IjEyOS45MCJ9XX0&amp;loc=https%3A%2F%2Fwww.migros.com.tr%2Fby-izzet-antep-fistigi-200-g-p-7b7052&amp;Set1=tr-TR%7Ctr-TR%7C1366x768%7C24"></script>
    <script type="text/javascript" async="" src="https://s2.adform.net/banners/scripts/st/trackpoint-async.js"></script>
    <script type="text/javascript" async="" src="https://www.googletagmanager.com/gtag/destination?id=AW-998405030&amp;l=dataLayer&amp;cx=c"></script>
    <script type="text/javascript" src="https://track.adform.net/Serving/TrackPoint/?pm=2443498&amp;ADFPageName=Product%20page&amp;ADFdivider=%7C&amp;ord=332623196977&amp;ADFtpmode=2&amp;ecpr=W3sicGlkIjoiMDgwODk2ODIiLCJzdGVwIjoyLCJwbm0iOiJCeSDEsHp6ZXQgQW50ZXAgRsSxc3TEscSfxLEgMjAwIEciLCJwZ3IiOiJLdXJ1eWVtacWfL0F0xLHFn3TEsXJtYWzEsWsiLCJwc2wiOiIxMjkuOTAifV0&amp;loc=https%3A%2F%2Fwww.migros.com.tr%2Fby-izzet-antep-fistigi-200-g-p-7b7052&amp;Set1=tr-TR%7Ctr-TR%7C1366x768%7C24"></script>
    <script type="text/javascript" src="https://track.adform.net/Serving/TrackPoint/?pm=2443498&amp;ADFPageName=ProductDetail_Kuruyemi%C5%9F%2FAt%C4%B1%C5%9Ft%C4%B1rmal%C4%B1k&amp;ADFdivider=_&amp;ord=895073599555&amp;ADFtpmode=2&amp;loc=https%3A%2F%2Fwww.migros.com.tr%2Fby-izzet-antep-fistigi-200-g-p-7b7052&amp;Set1=tr-TR%7Ctr-TR%7C1366x768%7C24"></script>
    <script type="text/javascript" src="https://track.adform.net/Serving/TrackPoint/?pm=2443498&amp;ADFPageName=Tum_sayfalar&amp;ADFdivider=%7C&amp;ord=173606440262&amp;ADFtpmode=2&amp;loc=https%3A%2F%2Fwww.migros.com.tr%2Fby-izzet-antep-fistigi-200-g-p-7b7052&amp;Set1=tr-TR%7Ctr-TR%7C1366x768%7C24"></script>
    <script type="text/javascript" async="" src="https://s2.adform.net/banners/scripts/st/trackpoint-async.js"></script>
    <script type="text/javascript" async="" src="https://s2.adform.net/banners/scripts/st/trackpoint-async.js"></script>
    <script type="text/javascript" async="" src="https://www.googletagmanager.com/gtag/destination?id=DC-5340910&amp;l=dataLayer&amp;cx=c"></script>
    <script type="text/javascript" async="" src="https://s2.adform.net/banners/scripts/st/trackpoint-async.js"></script>
    <script type="text/javascript" async="" src="https://www.google-analytics.com/plugins/ua/ec.js"></script>
    <script type="text/javascript" src="https://track.adform.net/Serving/TrackPoint/?pm=2443498&amp;ADFPageName=Tum_sayfalar&amp;ADFdivider=%7C&amp;ord=426934121407&amp;ADFtpmode=2&amp;loc=https%3A%2F%2Fwww.migros.com.tr%2F&amp;Set1=tr-TR%7Ctr-TR%7C1366x768%7C24"></script>
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
      .grid[_ngcontent-xfe-c377] {
        box-sizing: border-box;
        margin: 0 auto;
        padding: var(--mdc-layout-grid-margin-desktop, 0);
        padding: 0;
        display: grid;
        grid-template-rows: auto auto 1fr auto auto;
        min-height: 100vh
      }

      .divider[_ngcontent-xfe-c377] {
        height: .063rem;
        opacity: .12;
        background-color: var(--basicColorBlack);
        padding: 0
      }

      main[_ngcontent-xfe-c377] {
        min-height: calc(100vh - 4.875rem);
        padding-bottom: var(--mobile-bottom-nav-height)
      }

      @media (min-width: 992px) {
        main[_ngcontent-xfe-c377] {
          padding-bottom: unset
        }
      }

      .remove-padding-bottom[_ngcontent-xfe-c377] {
        padding-bottom: unset
      }

      main-reload[_ngcontent-xfe-c377] {
        color: #2a2a30
      }
    </style>
    <style>
      img[_ngcontent-xfe-c157] {
        max-width: 70px;
        scrollbar-width: none;
        -ms-overflow-style: none
      }

      img[_ngcontent-xfe-c157]::-webkit-scrollbar {
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
        background-image: url(/assets/logos/sanalmarket/sanalmarket-transparent-logo.svg)
      }

      @media (max-width: 576px) {
        sm-header .header-wrapper .header-tab.selected.sanalmarket {
          background-image: url(/assets/logos/sanalmarket/sanalmarket-transparent-logo-mobile.svg)
        }
      }

      sm-header .header-wrapper .header-tab.selected.elektronik {
        background-color: var(--brandColorInfo600);
        background-image: url(/assets/logos/elektronik/ekstra-transparent-logo.svg)
      }

      @media (max-width: 576px) {
        sm-header .header-wrapper .header-tab.selected.elektronik {
          background-image: url(/assets/logos/elektronik/ekstra-transparent-logo.svg)
        }
      }

      sm-header .header-wrapper .header-tab.selected.kurban {
        background-color: var(--brandColorKurbanPrimary700);
        background-image: url(/assets/logos/kurban/kurban-transparent-logo.svg)
      }

      @media (max-width: 576px) {
        sm-header .header-wrapper .header-tab.selected.kurban {
          background-image: url(/assets/logos/kurban/kurban-transparent-logo.svg)
        }
      }

      sm-header .header-wrapper .header-tab.selected.hemen {
        background-color: var(--brandColorHemen700);
        background-image: url(/assets/logos/hemen/hemen-transparent-logo.svg)
      }

      @media (max-width: 576px) {
        sm-header .header-wrapper .header-tab.selected.hemen {
          background-image: url(/assets/logos/hemen/hemen-transparent-logo.svg)
        }
      }

      sm-header .header-wrapper .header-tab.selected.yemek {
        background-color: var(--brandColorYemek700);
        background-image: url(/assets/logos/yemek/yemek-transparent-logo.svg)
      }

      @media (max-width: 576px) {
        sm-header .header-wrapper .header-tab.selected.yemek {
          background-image: url(/assets/logos/yemek/yemek-transparent-logo.svg)
        }
      }

      sm-header .header-wrapper .header-tab.selected.tazedirekt {
        background-color: var(--brandColorTazedirekt);
        background-image: url(/assets/logos/tazedirekt/td-transparent-logo.svg)
      }

      @media (max-width: 576px) {
        sm-header .header-wrapper .header-tab.selected.tazedirekt {
          background-image: url(/assets/logos/tazedirekt/td-transparent-logo.svg)
        }
      }

      sm-header .header-wrapper .header-tab.selected.mion {
        background-color: var(--brandColorMion700);
        background-image: url(/assets/logos/mion/mion-logo.svg)
      }

      @media (max-width: 576px) {
        sm-header .header-wrapper .header-tab.selected.mion {
          background-image: url(/assets/logos/mion/mion-logo.svg)
        }
      }

      sm-header .header-wrapper .header-tab.selected.macrocenter {
        background-color: var(--brandColorMacrocenter);
        background-image: url(/assets/logos/macrocenter/mc-transparent-logo.svg)
      }

      @media (max-width: 576px) {
        sm-header .header-wrapper .header-tab.selected.macrocenter {
          background-image: url(/assets/logos/macrocenter/mc-mobile-transparent-logo.svg)
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
        background-image: url(/assets/logos/sanalmarket/sanalmarket-logo.svg);
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
          background-image: url(/assets/logos/sanalmarket/sanalmarket-logo-mobile.svg);
          background-size: unset;
          width: 5rem
        }
      }

      sm-header .header-wrapper .elektronik-logo-tab {
        background-image: url(/assets/logos/elektronik/ekstra-logo.svg);
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
        background-image: url(/assets/logos/kurban/kurban-logo.svg);
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
        background-image: url(/assets/logos/hemen/hemen-logo.svg);
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
        background-image: url(/assets/logos/money-pay/money-pay.png);
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
        background-image: url(/assets/logos/yemek/yemek-logo.svg);
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
        background-image: url(/assets/logos/tazedirekt/td-logo.svg);
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
        background-image: url(/assets/logos/macrocenter/mc-logo.svg);
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
          background-image: url(/assets/logos/macrocenter/mc-mobile-logo.svg);
          width: 5rem
        }
      }

      sm-header .header-wrapper .mion-logo-tab {
        background-image: url(/assets/logos/mion/mion-logo.svg);
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
        background-image: url(/assets/icons/black-user.svg);
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
        background-image: url(/assets/icons/categories.svg)
      }

      sm-header .header-wrapper .header-bottom .tabs .tab .categories-icon.mion .icon {
        background-size: contain;
        width: 17px;
        height: 14px;
        margin-right: 1rem;
        margin-left: -.75rem;
        background-image: url(/assets/icons/mion-categories.svg)
      }

      sm-header .header-wrapper .header-bottom .tabs .tab .categories-icon.electronic .icon {
        background-size: contain;
        width: 17px;
        height: 14px;
        margin-right: 1rem;
        margin-left: -.75rem;
        background-image: url(/assets/icons/categories-electronic.png)
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

      [_nghost-xfe-c355] {
        --mdc-typography-button-font-size: .75rem;
        --mdc-typography-button-font-weight: 600
      }

      .additional-row[_ngcontent-xfe-c355] {
        padding: .625rem 1rem;
        display: flex;
        align-items: center;
        flex-direction: column;
        background-color: var(--brandColorInfo900);
        color: #fff
      }

      @media (min-width: 1200px) {
        .additional-row[_ngcontent-xfe-c355] {
          padding: .625rem 7rem
        }
      }

      @media (min-width: 1440px) {
        .additional-row[_ngcontent-xfe-c355] {
          padding: .625rem 11rem
        }
      }

      @media (min-width: 1600px) {
        .additional-row[_ngcontent-xfe-c355] {
          padding: .625rem 11rem
        }
      }

      @media (min-width: 1800px) {
        .additional-row[_ngcontent-xfe-c355] {
          padding: .625rem 18rem
        }
      }

      @media (min-width: 992px) {
        .additional-row[_ngcontent-xfe-c355] {
          flex-direction: row
        }
      }

      @media (min-width: 992px) {
        .additional-row[_ngcontent-xfe-c355] {
          height: 3.5rem
        }
      }

      .additional-row[_ngcontent-xfe-c355] .info-row[_ngcontent-xfe-c355] {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center
      }

      .additional-row[_ngcontent-xfe-c355] .icon-cart[_ngcontent-xfe-c355] {
        display: inline-block;
        background-image: url(/assets/icons/cart-additional.svg);
        width: 1.5rem;
        height: 1.5rem;
        margin-right: .55rem
      }

      .additional-row[_ngcontent-xfe-c355] .bold[_ngcontent-xfe-c355] {
        font-weight: 700;
        display: inline-block;
        margin: 0 .2rem
      }

      .additional-row[_ngcontent-xfe-c355] button[_ngcontent-xfe-c355] {
        margin: .75rem 0 0;
        background-color: var(--brandColorInfo700);
        color: inherit
      }

      @media (min-width: 992px) {
        .additional-row[_ngcontent-xfe-c355] button[_ngcontent-xfe-c355] {
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
      [_nghost-xfe-c277] {
        width: 100%
      }

      input[_ngcontent-xfe-c277] {
        width: 100%;
        height: 2.75rem;
        border-radius: var(--base-border-radius);
        background-color: var(--background-color__LIGHT);
        border: 1px solid var(--background-color__GREY);
        padding-left: 40px;
        background: url(/assets/icons/search--grey.svg) no-repeat 10px 11px;
        background-size: 16px;
        color: var(--background-color__DARK);
        font-size: 16px
      }

      input[_ngcontent-xfe-c277]::placeholder {
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

      .migros[_ngcontent-xfe-c277] {
        position: relative;
        margin-left: 1.5rem;
        margin-right: 1.5rem
      }

      @media (max-width: 768px) {
        .migros[_ngcontent-xfe-c277] {
          margin: 0
        }
      }

      .migros[_ngcontent-xfe-c277] input[_ngcontent-xfe-c277] {
        min-width: 17rem !important;
        text-overflow: ellipsis;
        border: solid 1px var(--basicColor400);
        border-radius: 10px;
        outline: none;
        cursor: pointer;
        font-size: .875rem;
        font-weight: 600
      }

      .migros[_ngcontent-xfe-c277] .migros-search-right-button[_ngcontent-xfe-c277] {
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
        .migros[_ngcontent-xfe-c277] .migros-search-right-button[_ngcontent-xfe-c277] {
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
        background-image: url(/assets/icons/search-not-found-grey.svg);
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
        background: url(/assets/icons/search.svg) no-repeat 10px 10px
      }

      .sanalmarket[_nghost-xfe-c277] input[_ngcontent-xfe-c277],
      .sanalmarket [_nghost-xfe-c277] input[_ngcontent-xfe-c277] {
        padding-left: 0;
        text-indent: .75rem;
        background-image: none
      }

      .mion[_nghost-xfe-c277] .migros-search-right-button[_ngcontent-xfe-c277],
      .mion [_nghost-xfe-c277] .migros-search-right-button[_ngcontent-xfe-c277] {
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

      [_nghost-xfe-c354] {
        display: block
      }

      @media (max-width: 992px) {
        [_nghost-xfe-c354] {
          width: 100%
        }
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-xfe-c354] {
        color: var(--basicColor900);
        background-color: transparent;
        outline: none;
        border: none;
        padding: 0
      }

      @media (max-width: 992px) {
        .delivery-options-search-bucket-wrapper[_ngcontent-xfe-c354] {
          margin: 0;
          width: 100%
        }
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-xfe-c354] .delivery-options-wrapper[_ngcontent-xfe-c354] {
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
        .delivery-options-search-bucket-wrapper[_ngcontent-xfe-c354] .delivery-options-wrapper[_ngcontent-xfe-c354] {
          padding: .25rem 1rem
        }
      }

      @media (max-width: 992px) {
        .delivery-options-search-bucket-wrapper[_ngcontent-xfe-c354] .delivery-options-wrapper[_ngcontent-xfe-c354] {
          width: auto;
          border-bottom: 1px solid rgba(0, 0, 0, .12);
          border-top: none;
          border-radius: 0
        }
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-xfe-c354] .delivery-options-wrapper[_ngcontent-xfe-c354] .choose-address-container[_ngcontent-xfe-c354] {
        display: flex;
        justify-content: space-between;
        flex-direction: row;
        width: 100%
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-xfe-c354] .delivery-options-wrapper[_ngcontent-xfe-c354] .choose-address-container[_ngcontent-xfe-c354] .choose-address[_ngcontent-xfe-c354] {
        display: flex;
        align-items: center
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-xfe-c354] .delivery-options-wrapper[_ngcontent-xfe-c354] .choose-address-container[_ngcontent-xfe-c354] .choose-address[_ngcontent-xfe-c354] .icon-wrapper[_ngcontent-xfe-c354] {
        margin-right: .5rem;
        font-size: .875rem
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-xfe-c354] .delivery-options-wrapper[_ngcontent-xfe-c354] .choose-address-container[_ngcontent-xfe-c354] .icon-wrapper[_ngcontent-xfe-c354] {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: var(--basicColor200);
        width: 1.5rem;
        height: 1.5rem;
        border-radius: 4px
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-xfe-c354] .delivery-options-wrapper[_ngcontent-xfe-c354] .delivery-options-inner[_ngcontent-xfe-c354] {
        display: flex;
        align-items: center;
        width: 100%;
        position: relative
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-xfe-c354] .delivery-options-wrapper[_ngcontent-xfe-c354] .delivery-options-inner[_ngcontent-xfe-c354] .fa-heart[_ngcontent-xfe-c354] {
        color: var(--brandColorError600)
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-xfe-c354] .delivery-options-wrapper[_ngcontent-xfe-c354] .delivery-options-inner[_ngcontent-xfe-c354] .foundation-text-wrapper[_ngcontent-xfe-c354] {
        text-align: left;
        margin-right: auto;
        margin-left: 1rem
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-xfe-c354] .delivery-options-wrapper[_ngcontent-xfe-c354] .delivery-options-inner[_ngcontent-xfe-c354] .two-column-wrapper[_ngcontent-xfe-c354] {
        display: flex;
        width: 100%
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-xfe-c354] .delivery-options-wrapper[_ngcontent-xfe-c354] .delivery-options-inner[_ngcontent-xfe-c354] .two-column-wrapper[_ngcontent-xfe-c354] .location-row[_ngcontent-xfe-c354] {
        display: flex;
        align-items: center;
        min-width: 200px
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-xfe-c354] .delivery-options-wrapper[_ngcontent-xfe-c354] .delivery-options-inner[_ngcontent-xfe-c354] .two-column-wrapper[_ngcontent-xfe-c354] .location-row[_ngcontent-xfe-c354]:after {
        content: url(/assets/icons/header-delivery-schedule-separator.svg);
        margin-left: .625rem
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-xfe-c354] .delivery-options-wrapper[_ngcontent-xfe-c354] .delivery-options-inner[_ngcontent-xfe-c354] .two-column-wrapper[_ngcontent-xfe-c354] .location-row[_ngcontent-xfe-c354] img[_ngcontent-xfe-c354] {
        width: 20px;
        height: 26px
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-xfe-c354] .delivery-options-wrapper[_ngcontent-xfe-c354] .delivery-options-inner[_ngcontent-xfe-c354] .two-column-wrapper[_ngcontent-xfe-c354] .location-row[_ngcontent-xfe-c354] fa-icon[_ngcontent-xfe-c354] {
        margin-left: auto
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-xfe-c354] .delivery-options-wrapper[_ngcontent-xfe-c354] .delivery-options-inner[_ngcontent-xfe-c354] .two-column-wrapper[_ngcontent-xfe-c354] .location-row[_ngcontent-xfe-c354] .delivery-options-inner-text[_ngcontent-xfe-c354] {
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
        .delivery-options-search-bucket-wrapper[_ngcontent-xfe-c354] .delivery-options-wrapper[_ngcontent-xfe-c354] .delivery-options-inner[_ngcontent-xfe-c354] .two-column-wrapper[_ngcontent-xfe-c354] .location-row[_ngcontent-xfe-c354] .delivery-options-inner-text[_ngcontent-xfe-c354] {
          margin: .6rem
        }
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-xfe-c354] .delivery-options-wrapper[_ngcontent-xfe-c354] .delivery-options-inner[_ngcontent-xfe-c354] .two-column-wrapper[_ngcontent-xfe-c354] .location-row[_ngcontent-xfe-c354] .delivery-options-inner-text__hemen[_ngcontent-xfe-c354] {
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
        .delivery-options-search-bucket-wrapper[_ngcontent-xfe-c354] .delivery-options-wrapper[_ngcontent-xfe-c354] .delivery-options-inner[_ngcontent-xfe-c354] .two-column-wrapper[_ngcontent-xfe-c354] .location-row[_ngcontent-xfe-c354] .delivery-options-inner-text__hemen[_ngcontent-xfe-c354] {
          width: 7.5rem;
          display: inline-block;
          max-width: 7.5rem;
          overflow: hidden;
          text-overflow: ellipsis;
          white-space: nowrap
        }
      }

      @media (max-width: 992px) {
        .delivery-options-search-bucket-wrapper[_ngcontent-xfe-c354] .delivery-options-wrapper[_ngcontent-xfe-c354] .delivery-options-inner[_ngcontent-xfe-c354] .two-column-wrapper[_ngcontent-xfe-c354] .location-row[_ngcontent-xfe-c354] {
          min-width: unset
        }
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-xfe-c354] .delivery-options-wrapper[_ngcontent-xfe-c354] .delivery-options-inner[_ngcontent-xfe-c354] .two-column-wrapper[_ngcontent-xfe-c354] .location-row.yemek[_ngcontent-xfe-c354] {
        flex-grow: 1
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-xfe-c354] .delivery-options-wrapper[_ngcontent-xfe-c354] .delivery-options-inner[_ngcontent-xfe-c354] .two-column-wrapper[_ngcontent-xfe-c354] .location-row.yemek[_ngcontent-xfe-c354]:after {
        content: none
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-xfe-c354] .delivery-options-wrapper[_ngcontent-xfe-c354] .delivery-options-inner[_ngcontent-xfe-c354] .two-column-wrapper[_ngcontent-xfe-c354] .delivery-row[_ngcontent-xfe-c354] {
        display: flex;
        justify-content: space-between;
        width: 100%;
        align-items: center
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-xfe-c354] .delivery-options-wrapper[_ngcontent-xfe-c354] .delivery-options-inner[_ngcontent-xfe-c354] .two-column-wrapper[_ngcontent-xfe-c354] .delivery-row[_ngcontent-xfe-c354] .closest-time[_ngcontent-xfe-c354] {
        display: flex;
        text-align: left;
        flex-direction: column
      }

      @media (max-width: 992px) {
        .delivery-options-search-bucket-wrapper[_ngcontent-xfe-c354] .delivery-options-wrapper[_ngcontent-xfe-c354] .delivery-options-inner[_ngcontent-xfe-c354] .two-column-wrapper[_ngcontent-xfe-c354] .delivery-row[_ngcontent-xfe-c354] .closest-time[_ngcontent-xfe-c354] {
          margin: 0 .5rem
        }
      }

      @media (min-width: 768px) {
        .delivery-options-search-bucket-wrapper[_ngcontent-xfe-c354] .delivery-options-wrapper[_ngcontent-xfe-c354] .delivery-options-inner[_ngcontent-xfe-c354] .two-column-wrapper[_ngcontent-xfe-c354] .delivery-row[_ngcontent-xfe-c354] .closest-time[_ngcontent-xfe-c354] {
          margin-left: 1rem
        }
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-xfe-c354] .delivery-options-wrapper[_ngcontent-xfe-c354] .delivery-options-inner[_ngcontent-xfe-c354] .two-column-wrapper[_ngcontent-xfe-c354] .delivery-row[_ngcontent-xfe-c354] .closest-time[_ngcontent-xfe-c354] .delivery-options-inner-time[_ngcontent-xfe-c354] {
        white-space: nowrap;
        color: var(--systemColorSuccess600)
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-xfe-c354] .delivery-options-wrapper[_ngcontent-xfe-c354] .delivery-options-inner[_ngcontent-xfe-c354] .two-column-wrapper[_ngcontent-xfe-c354] .delivery-row[_ngcontent-xfe-c354] .closest-time[_ngcontent-xfe-c354] .delivery-options-inner-text[_ngcontent-xfe-c354] {
        margin: 0
      }

      @media (max-width: 992px) {
        .delivery-options-search-bucket-wrapper[_ngcontent-xfe-c354] .delivery-options-wrapper[_ngcontent-xfe-c354] .delivery-options-inner[_ngcontent-xfe-c354] .two-column-wrapper[_ngcontent-xfe-c354] .delivery-row[_ngcontent-xfe-c354] {
          flex-basis: auto;
          width: auto
        }
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-xfe-c354] .delivery-options-wrapper[_ngcontent-xfe-c354] .delivery-options-inner[_ngcontent-xfe-c354] .two-column-wrapper[_ngcontent-xfe-c354] .shipment[_ngcontent-xfe-c354] {
        display: flex;
        margin-left: .5rem;
        color: var(--brandColorInfo600)
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-xfe-c354] .delivery-options-wrapper[_ngcontent-xfe-c354] .delivery-options-inner[_ngcontent-xfe-c354] .two-column-wrapper[_ngcontent-xfe-c354] .shipment[_ngcontent-xfe-c354] .sm-extra-inner-text[_ngcontent-xfe-c354] {
        margin-left: 1rem
      }

      @media (max-width: 768px) {
        .delivery-options-search-bucket-wrapper[_ngcontent-xfe-c354] .delivery-options-wrapper[_ngcontent-xfe-c354] .delivery-options-inner[_ngcontent-xfe-c354] .two-column-wrapper[_ngcontent-xfe-c354] .shipment[_ngcontent-xfe-c354] .sm-extra-inner-text[_ngcontent-xfe-c354] {
          text-align: left
        }
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-xfe-c354] .delivery-options-wrapper[_ngcontent-xfe-c354] .delivery-options-inner[_ngcontent-xfe-c354] .two-column-wrapper[_ngcontent-xfe-c354] .shipment[_ngcontent-xfe-c354] img[_ngcontent-xfe-c354] {
        object-fit: contain;
        max-width: 1.5rem;
        max-height: 100%;
        width: auto;
        height: auto
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-xfe-c354] .delivery-options-wrapper[_ngcontent-xfe-c354] .delivery-options-inner[_ngcontent-xfe-c354] .two-column-wrapper[_ngcontent-xfe-c354] .location-name[_ngcontent-xfe-c354] {
        display: inline-block;
        max-width: 100%;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        display: block
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-xfe-c354] .delivery-options-wrapper[_ngcontent-xfe-c354] .delivery-options-inner[_ngcontent-xfe-c354] .two-column-wrapper[_ngcontent-xfe-c354] .eta[_ngcontent-xfe-c354] {
        display: grid;
        grid-template-columns: 1.4rem 1fr;
        grid-column-gap: 1rem;
        text-align: left;
        margin-left: .5rem
      }

      @media (min-width: 992px) {
        .delivery-options-search-bucket-wrapper[_ngcontent-xfe-c354] .delivery-options-wrapper[_ngcontent-xfe-c354] .delivery-options-inner[_ngcontent-xfe-c354] .two-column-wrapper[_ngcontent-xfe-c354] .eta[_ngcontent-xfe-c354] {
          margin-left: 2rem
        }
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-xfe-c354] .delivery-options-wrapper[_ngcontent-xfe-c354] .delivery-options-inner[_ngcontent-xfe-c354] .two-column-wrapper[_ngcontent-xfe-c354] .eta[_ngcontent-xfe-c354] img[_ngcontent-xfe-c354] {
        margin: auto 0
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-xfe-c354] .delivery-options-wrapper[_ngcontent-xfe-c354] .delivery-options-inner[_ngcontent-xfe-c354] .two-column-wrapper[_ngcontent-xfe-c354] .eta[_ngcontent-xfe-c354] .minutes[_ngcontent-xfe-c354] {
        display: block
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-xfe-c354] .delivery-options-wrapper[_ngcontent-xfe-c354] .delivery-options-inner[_ngcontent-xfe-c354] .two-column-wrapper[_ngcontent-xfe-c354] .unavailable-text[_ngcontent-xfe-c354] {
        margin-bottom: 0;
        margin-left: 1.875rem;
        text-align: left
      }

      @media (max-width: 992px) {
        .delivery-options-search-bucket-wrapper[_ngcontent-xfe-c354] .delivery-options-wrapper[_ngcontent-xfe-c354] .delivery-options-inner[_ngcontent-xfe-c354] .two-column-wrapper[_ngcontent-xfe-c354] .unavailable-text[_ngcontent-xfe-c354] {
          margin-left: 3rem
        }
      }

      @media (max-width: 992px) {
        .delivery-options-search-bucket-wrapper[_ngcontent-xfe-c354] .delivery-options-wrapper[_ngcontent-xfe-c354] .delivery-options-inner[_ngcontent-xfe-c354] .two-column-wrapper.instant[_ngcontent-xfe-c354] {
          display: grid;
          grid-template-columns: auto auto
        }
      }

      @media (max-width: 992px) {
        .delivery-options-search-bucket-wrapper[_ngcontent-xfe-c354] .delivery-options-wrapper[_ngcontent-xfe-c354] .delivery-options-inner[_ngcontent-xfe-c354] .two-column-wrapper.instant[_ngcontent-xfe-c354]>[_ngcontent-xfe-c354]:nth-child(2)>[_ngcontent-xfe-c354]:first-child {
          margin-right: 0
        }
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-xfe-c354] .delivery-options-wrapper[_ngcontent-xfe-c354] .different-location-popover[_ngcontent-xfe-c354] {
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

      .delivery-options-search-bucket-wrapper[_ngcontent-xfe-c354] .delivery-options-wrapper[_ngcontent-xfe-c354] .different-location-popover[_ngcontent-xfe-c354]:after {
        content: "";
        position: absolute;
        border: 10px solid transparent;
        border-bottom: 10px solid var(--brandColorInfo600);
        top: -20px;
        left: 50%;
        transform: translate(-50%)
      }

      .delivery-options-search-bucket-wrapper[_ngcontent-xfe-c354] .delivery-options-wrapper[_ngcontent-xfe-c354] .different-location-popover[_ngcontent-xfe-c354] fa-icon[_ngcontent-xfe-c354] {
        position: absolute;
        right: .375rem;
        top: .125rem;
        font-size: .75rem
      }

      .spinner-wrapper[_ngcontent-xfe-c354] {
        display: flex;
        height: 100%;
        justify-content: center;
        align-items: center
      }

      .spinner-wrapper[_ngcontent-xfe-c354] .spinner[_ngcontent-xfe-c354] {
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

      [_nghost-xfe-c348] {
        position: relative
      }

      @media (max-width: 992px) {
        [_nghost-xfe-c348] {
          display: none
        }
      }

      .toggle-layer[_ngcontent-xfe-c348] {
        position: absolute;
        inset: 0;
        cursor: pointer;
        z-index: 1
      }

      .empty-cart[_ngcontent-xfe-c348] {
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

      .dropdown-btn[_ngcontent-xfe-c348] {
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

      .dropdown-btn[_ngcontent-xfe-c348]:before {
        content: "";
        position: absolute;
        width: 11.25rem;
        height: 1.125rem;
        bottom: -1.125rem;
        left: 0
      }

      .dropdown-btn[_ngcontent-xfe-c348] .icon-cart-quantity-wrapper[_ngcontent-xfe-c348] {
        position: relative;
        margin-bottom: -3px
      }

      .dropdown-btn[_ngcontent-xfe-c348] .icon-cart-quantity-wrapper[_ngcontent-xfe-c348] .icon-cart[_ngcontent-xfe-c348] {
        background-image: url(/assets/icons/cart.svg);
        width: 20px;
        height: 20px;
        background-position: center;
        background-repeat: no-repeat;
        background-size: contain
      }

      .dropdown-btn[_ngcontent-xfe-c348] .icon-cart-quantity-wrapper[_ngcontent-xfe-c348] .quantity[_ngcontent-xfe-c348] {
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

      .dropdown-btn[_ngcontent-xfe-c348]>[_ngcontent-xfe-c348]:nth-child(2) {
        display: flex;
        flex-direction: column;
        text-align: left
      }

      .dropdown-btn[_ngcontent-xfe-c348]>[_ngcontent-xfe-c348]:nth-child(2) .price[_ngcontent-xfe-c348] {
        color: var(--brandColorPrimary700)
      }

      .mion[_nghost-xfe-c348] .quantity[_ngcontent-xfe-c348],
      .mion [_nghost-xfe-c348] .quantity[_ngcontent-xfe-c348] {
        color: var(--basicColor950) !important;
        font-weight: 500
      }

      .mion[_nghost-xfe-c348] .icon-cart-quantity-wrapper[_ngcontent-xfe-c348] .price[_ngcontent-xfe-c348],
      .mion [_nghost-xfe-c348] .icon-cart-quantity-wrapper[_ngcontent-xfe-c348] .price[_ngcontent-xfe-c348] {
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

      .divider[_ngcontent-xfe-c301] {
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

      .logos-wrapper[_ngcontent-xfe-c300] {
        padding: 0 1rem
      }

      @media (min-width: 1200px) {
        .logos-wrapper[_ngcontent-xfe-c300] {
          padding: 0 7rem
        }
      }

      @media (min-width: 1440px) {
        .logos-wrapper[_ngcontent-xfe-c300] {
          padding: 0 11rem
        }
      }

      @media (min-width: 1600px) {
        .logos-wrapper[_ngcontent-xfe-c300] {
          padding: 0 11rem
        }
      }

      @media (min-width: 1800px) {
        .logos-wrapper[_ngcontent-xfe-c300] {
          padding: 0 18rem
        }
      }

      .logos-wrapper[_ngcontent-xfe-c300] .inner[_ngcontent-xfe-c300] {
        display: flex;
        align-items: center;
        justify-content: space-between
      }

      .logos-wrapper[_ngcontent-xfe-c300] .inner[_ngcontent-xfe-c300] .logos[_ngcontent-xfe-c300] .logo[_ngcontent-xfe-c300] {
        height: 40px;
        margin-right: 1.75rem
      }

      .logos-wrapper[_ngcontent-xfe-c300] .inner[_ngcontent-xfe-c300] .logos[_ngcontent-xfe-c300] a[_ngcontent-xfe-c300]:last-child>img[_ngcontent-xfe-c300] {
        margin-right: 0
      }

      .logos-wrapper[_ngcontent-xfe-c300] .inner[_ngcontent-xfe-c300] .logos[_ngcontent-xfe-c300] div[_ngcontent-xfe-c300] {
        display: inline-block
      }

      .logos-wrapper[_ngcontent-xfe-c300] .inner[_ngcontent-xfe-c300] .logos[_ngcontent-xfe-c300] div[_ngcontent-xfe-c300] img[_ngcontent-xfe-c300] {
        height: 40px
      }

      .logos-wrapper[_ngcontent-xfe-c300] .inner[_ngcontent-xfe-c300] .logo-container[_ngcontent-xfe-c300] {
        display: flex;
        flex-direction: column
      }

      .logos-wrapper[_ngcontent-xfe-c300] .migros-logo[_ngcontent-xfe-c300] {
        max-width: 135px;
        margin: 1rem 0
      }

      .logos-wrapper[_ngcontent-xfe-c300] .copyright[_ngcontent-xfe-c300] {
        text-align: center;
        font-size: .625rem;
        line-height: 1.6
      }

      @media (min-width: 992px) {
        .logos-wrapper[_ngcontent-xfe-c300] .copyright[_ngcontent-xfe-c300] {
          text-align: left;
          margin-bottom: 1rem
        }
      }

      .logos-wrapper[_ngcontent-xfe-c300] .anadolu-grubu-logo[_ngcontent-xfe-c300] {
        height: 35px
      }

      .logos-wrapper.lite[_ngcontent-xfe-c300] {
        padding: 0 1rem
      }

      @media (min-width: 1200px) {
        .logos-wrapper.lite[_ngcontent-xfe-c300] {
          padding: 0 7rem
        }
      }

      @media (min-width: 1440px) {
        .logos-wrapper.lite[_ngcontent-xfe-c300] {
          padding: 0 11rem
        }
      }

      @media (min-width: 1600px) {
        .logos-wrapper.lite[_ngcontent-xfe-c300] {
          padding: 0 18rem
        }
      }

      @media (min-width: 1800px) {
        .logos-wrapper.lite[_ngcontent-xfe-c300] {
          padding: 0 23rem
        }
      }
    </style>
    <style>
      [_nghost-xfe-c298] {
        position: fixed;
        bottom: 0;
        left: 0;
        z-index: 1000
      }

      .container[_ngcontent-xfe-c298] {
        width: 100vw;
        height: var(--mobile-bottom-nav-height);
        box-shadow: 0 -2px 5px #0000000f;
        background-color: var(--basicColorWhite);
        display: flex
      }

      .container[_ngcontent-xfe-c298] .nav-item[_ngcontent-xfe-c298] {
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

      .container[_ngcontent-xfe-c298] .nav-item.active[_ngcontent-xfe-c298] {
        color: var(--brandColorPrimary700)
      }

      .container[_ngcontent-xfe-c298] .nav-item[_ngcontent-xfe-c298] img[_ngcontent-xfe-c298] {
        width: 1.25rem;
        height: 1.25rem;
        margin-bottom: .125rem
      }

      .container[_ngcontent-xfe-c298] .nav-item[_ngcontent-xfe-c298] .quantity[_ngcontent-xfe-c298] {
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
        .container[_ngcontent-xfe-c298] .nav-item[_ngcontent-xfe-c298] .text[_ngcontent-xfe-c298] {
          font-size: 3.2vw
        }
      }

      .mion[_nghost-xfe-c298] .quantity[_ngcontent-xfe-c298],
      .mion [_nghost-xfe-c298] .quantity[_ngcontent-xfe-c298] {
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

      .wrapper[_ngcontent-xfe-c170] {
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
        .wrapper[_ngcontent-xfe-c170] {
          left: 0;
          margin: 0 1rem;
          padding: 1rem
        }
      }

      @media (min-width: 1200px) {
        .wrapper[_ngcontent-xfe-c170] {
          left: 7rem
        }
      }

      @media (min-width: 1440px) {
        .wrapper[_ngcontent-xfe-c170] {
          left: 11rem
        }
      }

      @media (min-width: 1800px) {
        .wrapper[_ngcontent-xfe-c170] {
          left: 18rem
        }
      }

      @media (max-width: 576px) {
        .wrapper[_ngcontent-xfe-c170] .subtitle-1[_ngcontent-xfe-c170] {
          font-size: .875rem
        }
      }

      .wrapper[_ngcontent-xfe-c170] .cookie-title[_ngcontent-xfe-c170] {
        margin-bottom: 1rem
      }

      .wrapper[_ngcontent-xfe-c170] .cursor-pointer[_ngcontent-xfe-c170] {
        cursor: pointer
      }

      .wrapper[_ngcontent-xfe-c170] .link[_ngcontent-xfe-c170] {
        text-decoration: underline;
        color: var(--brandColorPrimary700)
      }

      .wrapper[_ngcontent-xfe-c170] .white-link[_ngcontent-xfe-c170] {
        text-decoration: underline;
        color: #fff;
        font-weight: 700
      }

      .wrapper[_ngcontent-xfe-c170] .action-buttons[_ngcontent-xfe-c170] {
        display: flex
      }

      @media (max-width: 576px) {
        .wrapper[_ngcontent-xfe-c170] .action-buttons[_ngcontent-xfe-c170] {
          flex-direction: column
        }
      }

      .wrapper[_ngcontent-xfe-c170] .action-buttons[_ngcontent-xfe-c170] .btn[_ngcontent-xfe-c170] {
        outline: none;
        border-radius: 5px;
        padding: .813rem .758rem .688rem 1.242rem;
        margin-top: 1rem;
        cursor: pointer;
        flex-basis: 100%
      }

      @media (max-width: 576px) {
        .wrapper[_ngcontent-xfe-c170] .action-buttons[_ngcontent-xfe-c170] .btn[_ngcontent-xfe-c170] {
          margin: 1rem 0 0
        }
      }

      .wrapper[_ngcontent-xfe-c170] .action-buttons[_ngcontent-xfe-c170] .settings[_ngcontent-xfe-c170] {
        border: 1px solid #ffffff;
        background-color: #292a2c;
        color: #fff
      }

      .wrapper[_ngcontent-xfe-c170] .action-buttons[_ngcontent-xfe-c170] .accept-all[_ngcontent-xfe-c170] {
        border: 1px solid #292a2c;
        background-color: #fff;
        margin-left: .75rem
      }

      @media (max-width: 576px) {
        .wrapper[_ngcontent-xfe-c170] .action-buttons[_ngcontent-xfe-c170] .accept-all[_ngcontent-xfe-c170] {
          margin-left: unset
        }
      }

      .mion[_nghost-xfe-c170] .settings[_ngcontent-xfe-c170],
      .mion [_nghost-xfe-c170] .settings[_ngcontent-xfe-c170] {
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

      .links-wrapper[_ngcontent-xfe-c299] {
        padding: 0 1rem
      }

      @media (min-width: 1200px) {
        .links-wrapper[_ngcontent-xfe-c299] {
          padding: 0 7rem
        }
      }

      @media (min-width: 1440px) {
        .links-wrapper[_ngcontent-xfe-c299] {
          padding: 0 11rem
        }
      }

      @media (min-width: 1600px) {
        .links-wrapper[_ngcontent-xfe-c299] {
          padding: 0 11rem
        }
      }

      @media (min-width: 1800px) {
        .links-wrapper[_ngcontent-xfe-c299] {
          padding: 0 18rem
        }
      }

      .links-wrapper[_ngcontent-xfe-c299] .inner-grid[_ngcontent-xfe-c299] {
        align-items: unset
      }

      @media (max-width: 768px) {
        .links-wrapper[_ngcontent-xfe-c299] .inner-grid[_ngcontent-xfe-c299] {
          grid-gap: unset
        }
      }

      .links-wrapper[_ngcontent-xfe-c299] .inner-grid[_ngcontent-xfe-c299]>div[_ngcontent-xfe-c299] {
        width: 100%
      }

      .links-wrapper[_ngcontent-xfe-c299] .inner-grid[_ngcontent-xfe-c299] .logos-wrapper[_ngcontent-xfe-c299] {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: -5rem
      }

      .links-wrapper[_ngcontent-xfe-c299] .inner-grid[_ngcontent-xfe-c299] .logos-wrapper[_ngcontent-xfe-c299] .logo[_ngcontent-xfe-c299] {
        height: 21px
      }

      .links-wrapper[_ngcontent-xfe-c299] .inner-grid[_ngcontent-xfe-c299] .logos-wrapper[_ngcontent-xfe-c299] .logo.kadin-akademisi[_ngcontent-xfe-c299] {
        height: 45px
      }

      .links-wrapper[_ngcontent-xfe-c299] .inner-grid[_ngcontent-xfe-c299] .logos-wrapper[_ngcontent-xfe-c299] .logo.saglikli-yasam[_ngcontent-xfe-c299] {
        height: 43px
      }

      .links-wrapper[_ngcontent-xfe-c299] .right-container[_ngcontent-xfe-c299] {
        display: grid
      }

      @media (max-width: 768px) {
        .links-wrapper[_ngcontent-xfe-c299] .content[_ngcontent-xfe-c299] {
          display: none
        }
      }

      .links-wrapper[_ngcontent-xfe-c299] .content.selected[_ngcontent-xfe-c299] {
        display: block
      }

      .links-wrapper[_ngcontent-xfe-c299] .title[_ngcontent-xfe-c299] {
        padding-top: 2rem;
        font-weight: var(--font-weight-bold)
      }

      .links-wrapper[_ngcontent-xfe-c299] .title[_ngcontent-xfe-c299] fa-icon[_ngcontent-xfe-c299] {
        float: right
      }

      @media (min-width: 768px) {
        .links-wrapper[_ngcontent-xfe-c299] .title[_ngcontent-xfe-c299] fa-icon[_ngcontent-xfe-c299] {
          display: none
        }
      }

      .links-wrapper[_ngcontent-xfe-c299] .link[_ngcontent-xfe-c299] {
        font-size: .75rem;
        font-weight: var(--font-weight-normal);
        margin-bottom: .375rem
      }

      .links-wrapper[_ngcontent-xfe-c299] .link[_ngcontent-xfe-c299] a[_ngcontent-xfe-c299] {
        color: var(--basicColor600);
        cursor: pointer
      }

      .links-wrapper[_ngcontent-xfe-c299] .link[_ngcontent-xfe-c299] a[_ngcontent-xfe-c299]:hover,
      .links-wrapper[_ngcontent-xfe-c299] .link[_ngcontent-xfe-c299] a.active[_ngcontent-xfe-c299] {
        color: var(--brandColorPrimary700)
      }

      @media (min-width: 768px) {
        .links-wrapper[_ngcontent-xfe-c299] .popular-pages[_ngcontent-xfe-c299] .link[_ngcontent-xfe-c299] {
          display: inline-block;
          width: 50%
        }
      }

      .links-wrapper[_ngcontent-xfe-c299] .mobile-app-link[_ngcontent-xfe-c299] {
        height: 3.125rem;
        border: 1px solid var(--basicColor300);
        border-radius: 3px;
        max-width: 8.75rem;
        text-align: center;
        padding: .25rem 0;
        margin-top: .5rem
      }

      @media (max-width: 768px) {
        .links-wrapper[_ngcontent-xfe-c299] .mobile-app-link[_ngcontent-xfe-c299] {
          display: inline-block;
          min-width: 8.75rem;
          margin-right: .5rem
        }
      }

      .links-wrapper[_ngcontent-xfe-c299] .mobile-app-link[_ngcontent-xfe-c299] img[_ngcontent-xfe-c299] {
        max-width: 100%
      }

      .links-wrapper[_ngcontent-xfe-c299] .socials[_ngcontent-xfe-c299] {
        display: flex;
        flex-wrap: wrap
      }

      @media (min-width: 992px) {
        .links-wrapper[_ngcontent-xfe-c299] .socials[_ngcontent-xfe-c299] {
          justify-content: space-between
        }
      }

      @media (max-width: 992px) {
        .links-wrapper[_ngcontent-xfe-c299] .socials[_ngcontent-xfe-c299] a[_ngcontent-xfe-c299] {
          padding-right: 1.25rem
        }
      }

      .links-wrapper[_ngcontent-xfe-c299] .nearest-migros[_ngcontent-xfe-c299] {
        margin-top: 3rem;
        font-size: .75rem;
        padding: .625rem 0;
        border: 1px solid var(--brandColorPrimary700);
        border-radius: 5px
      }

      .links-wrapper[_ngcontent-xfe-c299] .nearest-migros[_ngcontent-xfe-c299] a[_ngcontent-xfe-c299] {
        display: flex;
        justify-content: center;
        align-items: center;
        font-weight: var(--font-weight-bold);
        cursor: pointer
      }

      .links-wrapper[_ngcontent-xfe-c299] .nearest-migros[_ngcontent-xfe-c299] fa-icon[_ngcontent-xfe-c299] {
        font-size: 1.25rem;
        margin-right: .625rem
      }

      .links-wrapper[_ngcontent-xfe-c299] .digital[_ngcontent-xfe-c299] {
        margin-top: .625rem;
        height: 3.125rem;
        border: 1px solid var(--basicColor300);
        font-size: .75rem;
        font-weight: var(--font-weight-bold);
        border-radius: 3px
      }

      .links-wrapper[_ngcontent-xfe-c299] .digital[_ngcontent-xfe-c299] a[_ngcontent-xfe-c299] {
        color: var(--basicColorBlack)
      }

      @media (max-width: 992px) {
        .links-wrapper[_ngcontent-xfe-c299] .digital[_ngcontent-xfe-c299] {
          min-width: 10rem;
          display: inline-block;
          margin-right: .5rem
        }
      }

      .links-wrapper[_ngcontent-xfe-c299] .digital[_ngcontent-xfe-c299] .align-helper[_ngcontent-xfe-c299] {
        height: 100%;
        display: inline-block;
        vertical-align: middle
      }

      .links-wrapper[_ngcontent-xfe-c299] .digital[_ngcontent-xfe-c299] img[_ngcontent-xfe-c299] {
        display: inline-block;
        vertical-align: middle;
        margin: 0 .625rem
      }

      .links-wrapper.lite[_ngcontent-xfe-c299] {
        padding: 0 1rem
      }

      @media (min-width: 1200px) {
        .links-wrapper.lite[_ngcontent-xfe-c299] {
          padding: 0 7rem
        }
      }

      @media (min-width: 1440px) {
        .links-wrapper.lite[_ngcontent-xfe-c299] {
          padding: 0 11rem
        }
      }

      @media (min-width: 1600px) {
        .links-wrapper.lite[_ngcontent-xfe-c299] {
          padding: 0 18rem
        }
      }

      @media (min-width: 1800px) {
        .links-wrapper.lite[_ngcontent-xfe-c299] {
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

      .home-page-wrapper[_ngcontent-xfe-c425] {
        padding: 0 1rem
      }

      @media (min-width: 1200px) {
        .home-page-wrapper[_ngcontent-xfe-c425] {
          padding: 0 7rem
        }
      }

      @media (min-width: 1440px) {
        .home-page-wrapper[_ngcontent-xfe-c425] {
          padding: 0 11rem
        }
      }

      @media (min-width: 1600px) {
        .home-page-wrapper[_ngcontent-xfe-c425] {
          padding: 0 11rem
        }
      }

      @media (min-width: 1800px) {
        .home-page-wrapper[_ngcontent-xfe-c425] {
          padding: 0 18rem
        }
      }

      @media (max-width: 992px) {
        .home-page-wrapper[_ngcontent-xfe-c425] {
          padding: 0
        }
      }

      .home-page-wrapper[_ngcontent-xfe-c425] .banners[_ngcontent-xfe-c425]:nth-of-type(2) {
        display: none
      }

      @media (max-width: 576px) {
        .home-page-wrapper[_ngcontent-xfe-c425] .banners[_ngcontent-xfe-c425] {
          padding: 0 1rem
        }
      }

      .home-page-wrapper[_ngcontent-xfe-c425] .banners[_ngcontent-xfe-c425] .main-slider-banner[_ngcontent-xfe-c425] {
        transform-origin: 0 0
      }

      .home-page-wrapper[_ngcontent-xfe-c425] .under-slider-banners[_ngcontent-xfe-c425] {
        display: flex;
        justify-content: space-evenly;
        align-items: center;
        overflow-y: scroll;
        scrollbar-width: none;
        -ms-overflow-style: none
      }

      .home-page-wrapper[_ngcontent-xfe-c425] .under-slider-banners[_ngcontent-xfe-c425]::-webkit-scrollbar {
        width: 0;
        height: 0
      }

      @media (max-width: 576px) {
        .home-page-wrapper[_ngcontent-xfe-c425] .under-slider-banners[_ngcontent-xfe-c425] {
          padding: 0 1rem
        }
      }

      .home-page-wrapper[_ngcontent-xfe-c425] .under-slider-banners[_ngcontent-xfe-c425] .under-slider-banner[_ngcontent-xfe-c425] {
        border-radius: 8px;
        margin-right: 1rem;
        cursor: pointer;
        max-width: 13rem;
        max-height: 13rem
      }

      @media (max-width: 768px) {
        .home-page-wrapper[_ngcontent-xfe-c425] .under-slider-banners[_ngcontent-xfe-c425] .under-slider-banner[_ngcontent-xfe-c425] {
          max-width: 170px
        }
      }

      @media (max-width: 576px) {
        .home-page-wrapper[_ngcontent-xfe-c425] .under-slider-banners[_ngcontent-xfe-c425] .under-slider-banner[_ngcontent-xfe-c425] {
          max-width: 7.25rem
        }
      }

      .home-page-wrapper[_ngcontent-xfe-c425] .middle-banner-wrapper[_ngcontent-xfe-c425] {
        width: 100%
      }

      .home-page-wrapper[_ngcontent-xfe-c425] .middle-banner-wrapper[_ngcontent-xfe-c425] .middle-banner[_ngcontent-xfe-c425] {
        transform-origin: 0 0;
        width: -moz-fit-content;
        width: fit-content
      }

      .home-page-wrapper[_ngcontent-xfe-c425] .free-banner-wrapper[_ngcontent-xfe-c425] {
        width: 100%
      }

      .home-page-wrapper[_ngcontent-xfe-c425] .free-banner-wrapper[_ngcontent-xfe-c425] .free-banner[_ngcontent-xfe-c425] {
        transform-origin: 0 0;
        width: -moz-fit-content;
        width: fit-content
      }

      @media (max-width: 576px) {
        .home-page-wrapper[_ngcontent-xfe-c425] .cross-retention[_ngcontent-xfe-c425] {
          padding: 0 1rem
        }
      }

      @media (max-width: 576px) {
        .home-page-wrapper[_ngcontent-xfe-c425] .fast-cart-wrapper[_ngcontent-xfe-c425] {
          padding: 0 1rem
        }
      }

      .home-page-wrapper[_ngcontent-xfe-c425] .ai-section-wrapper[_ngcontent-xfe-c425] {
        border: solid 1px var(--basicColor300);
        border-radius: .5rem;
        padding: 0 2rem;
        background-color: var(--brandColorYemekAi50)
      }

      .home-page-wrapper[_ngcontent-xfe-c425] .categories-wrapper[_ngcontent-xfe-c425] {
        display: grid;
        grid-template-columns: repeat(8, 1fr);
        gap: 1rem;
        text-align: center
      }

      @media (max-width: 1200px) {
        .home-page-wrapper[_ngcontent-xfe-c425] .categories-wrapper[_ngcontent-xfe-c425] {
          grid-template-columns: repeat(5, 1fr)
        }
      }

      @media (max-width: 992px) {
        .home-page-wrapper[_ngcontent-xfe-c425] .categories-wrapper[_ngcontent-xfe-c425] {
          grid-template-columns: repeat(3, 1fr)
        }
      }

      @media (max-width: 768px) {
        .home-page-wrapper[_ngcontent-xfe-c425] .categories-wrapper[_ngcontent-xfe-c425] {
          gap: .5rem;
          padding: 0 1rem
        }
      }

      .home-page-wrapper[_ngcontent-xfe-c425] .categories-wrapper[_ngcontent-xfe-c425] .category-card[_ngcontent-xfe-c425] {
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
        .home-page-wrapper[_ngcontent-xfe-c425] .categories-wrapper[_ngcontent-xfe-c425] .category-card[_ngcontent-xfe-c425] {
          min-width: 4.5rem;
          min-height: 4.5rem
        }
      }

      .home-page-wrapper[_ngcontent-xfe-c425] .categories-wrapper[_ngcontent-xfe-c425] .category-card.categories-see-all[_ngcontent-xfe-c425] {
        background: var(--basicColor100);
        padding: 1.125rem .75rem 1.188rem .813rem;
        border-radius: .5rem;
        display: inline;
        height: -moz-fit-content;
        height: fit-content;
        border: none;
        line-height: 1.5
      }

      .home-page-wrapper[_ngcontent-xfe-c425] .categories-wrapper[_ngcontent-xfe-c425] img[_ngcontent-xfe-c425] {
        max-width: 100%;
        height: auto;
        max-height: 5.5rem
      }

      @media (max-width: 768px) {
        .home-page-wrapper[_ngcontent-xfe-c425] .categories-wrapper[_ngcontent-xfe-c425] img[_ngcontent-xfe-c425] {
          max-height: 3.5rem
        }
      }

      .home-page-wrapper[_ngcontent-xfe-c425] .categories-wrapper[_ngcontent-xfe-c425] .category-name[_ngcontent-xfe-c425] {
        margin-top: .5rem
      }

      .home-page-wrapper[_ngcontent-xfe-c425] .section[_ngcontent-xfe-c425] {
        margin-top: 2rem;
        position: relative
      }

      .home-page-wrapper[_ngcontent-xfe-c425] .section.hemen[_ngcontent-xfe-c425] {
        margin-top: 0
      }

      .home-page-wrapper[_ngcontent-xfe-c425] .section#section-shopping-list-vwo[_ngcontent-xfe-c425] {
        display: none
      }

      @media (max-width: 576px) {
        .home-page-wrapper[_ngcontent-xfe-c425] .section[_ngcontent-xfe-c425] {
          margin-top: 1rem
        }
      }

      .home-page-wrapper[_ngcontent-xfe-c425] .section[_ngcontent-xfe-c425] .section-title[_ngcontent-xfe-c425] {
        margin-bottom: 1.25rem
      }

      @media (max-width: 576px) {
        .home-page-wrapper[_ngcontent-xfe-c425] .section[_ngcontent-xfe-c425] .section-title[_ngcontent-xfe-c425] {
          margin-bottom: .75rem;
          font-size: 1.1rem;
          padding: 0 1rem
        }
      }

      .home-page-wrapper[_ngcontent-xfe-c425] .section[_ngcontent-xfe-c425] .section-title.below-unrated-orders[_ngcontent-xfe-c425] {
        margin-bottom: 1rem
      }

      .home-page-wrapper[_ngcontent-xfe-c425] .section[_ngcontent-xfe-c425] .fade-out[_ngcontent-xfe-c425] {
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
        .home-page-wrapper[_ngcontent-xfe-c425] .section[_ngcontent-xfe-c425] .fade-out[_ngcontent-xfe-c425] {
          display: none
        }
      }

      .home-page-wrapper[_ngcontent-xfe-c425] .section[_ngcontent-xfe-c425] .fade-out.categories[_ngcontent-xfe-c425] {
        bottom: 0;
        top: 50px
      }

      @media (min-width: 768px) {
        .home-page-wrapper[_ngcontent-xfe-c425] .section[_ngcontent-xfe-c425] .fade-out.categories[_ngcontent-xfe-c425] {
          display: none
        }
      }

      .home-page-wrapper[_ngcontent-xfe-c425] .section[_ngcontent-xfe-c425] .see-all[_ngcontent-xfe-c425] {
        margin-left: auto;
        display: flex;
        cursor: pointer;
        margin-top: .4rem
      }

      @media (max-width: 576px) {
        .home-page-wrapper[_ngcontent-xfe-c425] .section[_ngcontent-xfe-c425] .see-all[_ngcontent-xfe-c425] {
          display: none
        }
      }

      .home-page-wrapper[_ngcontent-xfe-c425] .section[_ngcontent-xfe-c425] .see-all[_ngcontent-xfe-c425] fa-icon[_ngcontent-xfe-c425] {
        font-size: .75rem;
        margin-left: .5rem;
        margin-top: .1rem
      }

      .home-page-wrapper[_ngcontent-xfe-c425] .section[_ngcontent-xfe-c425] .list-page-items-container[_ngcontent-xfe-c425] {
        display: flex;
        overflow-y: scroll;
        scrollbar-width: none;
        -ms-overflow-style: none
      }

      .home-page-wrapper[_ngcontent-xfe-c425] .section[_ngcontent-xfe-c425] .list-page-items-container[_ngcontent-xfe-c425]::-webkit-scrollbar {
        width: 0;
        height: 0
      }

      .home-page-wrapper[_ngcontent-xfe-c425] .section[_ngcontent-xfe-c425] .list-page-items-container.in-mat-tab-group[_ngcontent-xfe-c425] {
        overflow-x: unset
      }

      .home-page-wrapper[_ngcontent-xfe-c425] .section[_ngcontent-xfe-c425] .list-page-items-container[_ngcontent-xfe-c425] sm-list-page-item[_ngcontent-xfe-c425] {
        margin-right: .625rem
      }

      @media (max-width: 768px) {
        .home-page-wrapper[_ngcontent-xfe-c425] .section[_ngcontent-xfe-c425] .list-page-items-container[_ngcontent-xfe-c425] sm-list-page-item[_ngcontent-xfe-c425] {
          margin-right: .5rem
        }
      }

      @media (max-width: 768px) {
        .home-page-wrapper[_ngcontent-xfe-c425] .section[_ngcontent-xfe-c425] .list-page-items-container[_ngcontent-xfe-c425] {
          padding: 0 0 0 1rem
        }
      }

      .home-page-wrapper[_ngcontent-xfe-c425] .section[_ngcontent-xfe-c425] .image-items-wrapper[_ngcontent-xfe-c425] {
        display: flex;
        height: 22rem
      }

      .home-page-wrapper[_ngcontent-xfe-c425] .section[_ngcontent-xfe-c425] .image-items-wrapper[_ngcontent-xfe-c425] .container-wrapper[_ngcontent-xfe-c425] {
        position: relative;
        overflow-x: hidden;
        width: 100%
      }

      .home-page-wrapper[_ngcontent-xfe-c425] .section[_ngcontent-xfe-c425] .image-items-wrapper[_ngcontent-xfe-c425] img[_ngcontent-xfe-c425] {
        border-radius: 8px;
        margin-right: 1.5rem;
        cursor: pointer;
        max-width: 360px
      }

      @media (max-width: 768px) {
        .home-page-wrapper[_ngcontent-xfe-c425] .section[_ngcontent-xfe-c425] .image-items-wrapper[_ngcontent-xfe-c425] img[_ngcontent-xfe-c425] {
          display: none
        }
      }

      .home-page-wrapper[_ngcontent-xfe-c425] .section[_ngcontent-xfe-c425] .see-all-button[_ngcontent-xfe-c425] {
        width: calc(100% - 2rem);
        margin-top: .75rem;
        height: 3.125rem;
        padding: 0 1rem;
        margin-left: 1rem
      }

      @media (min-width: 576px) {
        .home-page-wrapper[_ngcontent-xfe-c425] .section[_ngcontent-xfe-c425] .see-all-button[_ngcontent-xfe-c425] {
          display: none
        }
      }

      .home-page-wrapper[_ngcontent-xfe-c425] .next-btn[_ngcontent-xfe-c425] {
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
        .home-page-wrapper[_ngcontent-xfe-c425] .next-btn[_ngcontent-xfe-c425] {
          display: none
        }
      }

      .home-page-wrapper[_ngcontent-xfe-c425] .next-btn[_ngcontent-xfe-c425]:after {
        content: "";
        display: inline-block;
        height: .3em;
        width: .3em;
        border-style: solid;
        border-width: .05em .05em 0 0;
        transform: rotate(45deg)
      }

      .home-page-wrapper[_ngcontent-xfe-c425] .next-btn[_ngcontent-xfe-c425]:after {
        left: .4em;
        position: relative;
        font-size: 2rem;
        top: 1rem
      }

      .home-page-wrapper[_ngcontent-xfe-c425] .prev-btn[_ngcontent-xfe-c425] {
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
        .home-page-wrapper[_ngcontent-xfe-c425] .prev-btn[_ngcontent-xfe-c425] {
          display: none
        }
      }

      .home-page-wrapper[_ngcontent-xfe-c425] .prev-btn[_ngcontent-xfe-c425]:after {
        content: "";
        display: inline-block;
        height: .3em;
        width: .3em;
        border-style: solid;
        border-width: .05em .05em 0 0;
        transform: rotate(225deg)
      }

      .home-page-wrapper[_ngcontent-xfe-c425] .prev-btn[_ngcontent-xfe-c425]:after {
        left: 1.15em;
        position: relative;
        font-size: 2rem;
        top: 1rem
      }

      [_nghost-xfe-c425] sm-list-page-item {
        min-width: 10.25rem;
        max-width: 10.25rem
      }

      [_nghost-xfe-c425] sm-list-page-item .mdc-card {
        border-radius: 8px
      }

      [_nghost-xfe-c425] .shopping-tabs .mat-mdc-tab-group {
        flex-direction: row !important
      }

      [_nghost-xfe-c425] .shopping-tabs .mat-mdc-tab-labels {
        flex-direction: column !important
      }

      [_nghost-xfe-c425] .shopping-tabs .mat-mdc-tab {
        justify-content: start;
        padding-left: 1rem;
        margin-bottom: 1rem;
        margin-right: 6rem
      }

      [_nghost-xfe-c425] .shopping-tabs .mdc-tab--active .mdc-tab-indicator {
        position: absolute;
        left: 0;
        bottom: 0;
        top: 0 !important;
        width: .3rem;
        height: 100%;
        background-color: var(--brandColorPrimary700)
      }

      [_nghost-xfe-c425] .shopping-tabs .mdc-tab--active .mdc-tab-indicator__content {
        opacity: 0
      }

      [_nghost-xfe-c425] .shopping-tabs .mdc-tab__text-label {
        margin: 0
      }

      [_nghost-xfe-c425] .shopping-tabs .mat-mdc-tab-body-content {
        display: flex;
        gap: 1.5rem;
        overflow-y: scroll;
        scrollbar-width: none;
        -ms-overflow-style: none
      }

      [_nghost-xfe-c425] .shopping-tabs .mat-mdc-tab-body-content .container-wrapper .fade-out {
        top: 0 !important
      }

      [_nghost-xfe-c425] .shopping-tabs .mat-mdc-tab-body-content::-webkit-scrollbar {
        width: 0;
        height: 0
      }

      [_nghost-xfe-c425] .shopping-tabs .mat-mdc-tab-body-wrapper {
        width: 100%
      }

      @media (min-width: 768px) {
        [_nghost-xfe-c425] .shopping-tabs .mat-mdc-tab-body-wrapper {
          margin-left: -3rem
        }
      }

      [_nghost-xfe-c425] .invoice-form-button {
        position: relative !important;
        padding: 0 .5rem !important;
        height: auto !important
      }

      [_nghost-xfe-c425] .invoice-form-button .invoice-form {
        display: flex
      }

      [_nghost-xfe-c425] .invoice-form-button .invoice-form .icon-small-invoice-form {
        height: 1rem
      }

      [_nghost-xfe-c425] .electronic-banner-shopping-list {
        margin-top: 1rem
      }

      @media (min-width: 768px) {
        [_nghost-xfe-c425] .electronic-banner-shopping-list {
          display: flex;
          margin-bottom: -3rem
        }
      }

      [_nghost-xfe-c425] .electronic-banner-shopping-list .electronic-banner-shopping-list-items {
        cursor: pointer;
        width: 100%;
        padding: 0 1rem;
        margin: .5rem 0;
        border-radius: .3125rem
      }

      @media (min-width: 768px) {
        [_nghost-xfe-c425] .electronic-banner-shopping-list .electronic-banner-shopping-list-items {
          width: 32%;
          height: auto
        }
      }

      @media (min-width: 992px) {
        [_nghost-xfe-c425] .electronic-banner-shopping-list .electronic-banner-shopping-list-items {
          padding: 0;
          margin: 0 1rem 0 0
        }
      }

      [_nghost-xfe-c425] .fade-out {
        height: 100%
      }

      .elektronik[_nghost-xfe-c425] .home-page-wrapper[_ngcontent-xfe-c425],
      .elektronik [_nghost-xfe-c425] .home-page-wrapper[_ngcontent-xfe-c425] {
        margin-bottom: 5rem
      }

      .mion[_nghost-xfe-c425] .categories-wrapper[_ngcontent-xfe-c425] .category-card[_ngcontent-xfe-c425],
      .mion [_nghost-xfe-c425] .categories-wrapper[_ngcontent-xfe-c425] .category-card[_ngcontent-xfe-c425] {
        min-width: 7rem;
        min-height: 7rem;
        border: none;
        padding: 0
      }

      @media (max-width: 992px) {

        .mion[_nghost-xfe-c425] .categories-wrapper[_ngcontent-xfe-c425] .category-card[_ngcontent-xfe-c425],
        .mion [_nghost-xfe-c425] .categories-wrapper[_ngcontent-xfe-c425] .category-card[_ngcontent-xfe-c425] {
          min-width: unset;
          min-height: unset
        }
      }

      .mion[_nghost-xfe-c425] .categories-wrapper[_ngcontent-xfe-c425] .category-card[_ngcontent-xfe-c425] img[_ngcontent-xfe-c425],
      .mion [_nghost-xfe-c425] .categories-wrapper[_ngcontent-xfe-c425] .category-card[_ngcontent-xfe-c425] img[_ngcontent-xfe-c425] {
        max-height: initial
      }

      .mion[_nghost-xfe-c425] .see-all-button[_ngcontent-xfe-c425],
      .mion [_nghost-xfe-c425] .see-all-button[_ngcontent-xfe-c425] {
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
    <meta property="og:url" content="https://www.migros.com.tr/sepetim">
    <link rel="canonical" href="https://www.migros.com.tr/sepetim">
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
    <style>
      .sm-how-to-wrapper[_ngcontent-xfe-c420] {
        display: flex;
        margin: 2rem 0;
        justify-content: space-between
      }

      @media (max-width: 768px) {
        .sm-how-to-wrapper[_ngcontent-xfe-c420] {
          display: grid;
          grid-template-columns: 1fr;
          place-items: center;
          gap: 1rem;
          margin: 1.5rem 0 5rem;
          padding: 0 1rem
        }
      }

      .sm-how-to-wrapper[_ngcontent-xfe-c420] .how-to[_ngcontent-xfe-c420] {
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
        .sm-how-to-wrapper[_ngcontent-xfe-c420] .how-to[_ngcontent-xfe-c420] {
          width: 100%
        }
      }

      @media (min-width: 768px) {
        .sm-how-to-wrapper[_ngcontent-xfe-c420] .how-to[_ngcontent-xfe-c420]:first-child {
          margin-left: 0
        }

        .sm-how-to-wrapper[_ngcontent-xfe-c420] .how-to[_ngcontent-xfe-c420]:last-child {
          margin-right: 0
        }
      }

      @media (min-width: 768px) {
        .sm-how-to-wrapper[_ngcontent-xfe-c420] .how-to[_ngcontent-xfe-c420] {
          padding: 1rem
        }
      }

      @media (min-width: 1200px) {
        .sm-how-to-wrapper[_ngcontent-xfe-c420] .how-to[_ngcontent-xfe-c420] {
          padding: 2rem 3rem
        }
      }

      .sm-how-to-wrapper[_ngcontent-xfe-c420] .how-to.hemen[_ngcontent-xfe-c420] {
        padding: 3rem;
        margin: 0 2rem
      }

      @media (min-width: 768px) {
        .sm-how-to-wrapper[_ngcontent-xfe-c420] .how-to.hemen[_ngcontent-xfe-c420]:first-child {
          margin-left: 0
        }

        .sm-how-to-wrapper[_ngcontent-xfe-c420] .how-to.hemen[_ngcontent-xfe-c420]:last-child {
          margin-right: 0
        }
      }

      .sm-how-to-wrapper[_ngcontent-xfe-c420] .how-to[_ngcontent-xfe-c420] .image[_ngcontent-xfe-c420] {
        width: 7.5rem;
        height: 7.5rem;
        background-repeat: no-repeat;
        background-size: contain
      }

      .sm-how-to-wrapper[_ngcontent-xfe-c420] .how-to[_ngcontent-xfe-c420] .image.card[_ngcontent-xfe-c420] {
        background-image: url(/assets/home-page/card.png)
      }

      .sm-how-to-wrapper[_ngcontent-xfe-c420] .how-to[_ngcontent-xfe-c420] .image.truck[_ngcontent-xfe-c420] {
        background-image: url(/assets/home-page/truck.png)
      }

      .sm-how-to-wrapper[_ngcontent-xfe-c420] .how-to[_ngcontent-xfe-c420] .image.box[_ngcontent-xfe-c420] {
        background-image: url(/assets/home-page/box.png)
      }

      .sm-how-to-wrapper[_ngcontent-xfe-c420] .how-to[_ngcontent-xfe-c420] .image.money[_ngcontent-xfe-c420] {
        background-image: url(/assets/home-page/money-logo.png)
      }

      .sm-how-to-wrapper[_ngcontent-xfe-c420] .how-to[_ngcontent-xfe-c420] .image.motorcycle[_ngcontent-xfe-c420] {
        background-image: url(/assets/home-page/motorcycle.webp)
      }

      .sm-how-to-wrapper[_ngcontent-xfe-c420] .how-to[_ngcontent-xfe-c420] .image.shopping-bag[_ngcontent-xfe-c420] {
        background-image: url(/assets/home-page/shopping-bag.webp)
      }

      .sm-how-to-wrapper[_ngcontent-xfe-c420] .how-to[_ngcontent-xfe-c420] .image.migros-hemen-logo[_ngcontent-xfe-c420] {
        background-image: url(/assets/home-page/migros-hemen-logo.webp)
      }

      .sm-how-to-wrapper[_ngcontent-xfe-c420] .how-to[_ngcontent-xfe-c420] .text[_ngcontent-xfe-c420] {
        margin: 1rem 0 .75rem;
        max-width: 10rem
      }

      .sm-how-to-wrapper[_ngcontent-xfe-c420] .how-to[_ngcontent-xfe-c420] .detail[_ngcontent-xfe-c420] {
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

      .fast-cart-banner[_ngcontent-xfe-c383] {
        height: 8.125rem;
        padding: 1.75rem;
        border-radius: 8px;
        background-color: #fff1e3;
        display: flex;
        align-items: center
      }

      @media (max-width: 768px) {
        .fast-cart-banner[_ngcontent-xfe-c383] {
          height: 15rem;
          flex-direction: column;
          text-align: center;
          padding: 1rem;
          justify-content: space-between
        }
      }

      .fast-cart-banner[_ngcontent-xfe-c383] .banner-icon[_ngcontent-xfe-c383] {
        width: 3.125rem
      }

      @media (max-width: 768px) {
        .fast-cart-banner[_ngcontent-xfe-c383] .banner-icon[_ngcontent-xfe-c383] {
          width: 2.25rem
        }
      }

      .fast-cart-banner__title[_ngcontent-xfe-c383] {
        margin-left: 1rem
      }

      .fast-cart-banner__title[_ngcontent-xfe-c383] [_ngcontent-xfe-c383]:first-child {
        font-size: 1.5rem;
        font-weight: 600
      }

      @media (max-width: 768px) {
        .fast-cart-banner__title[_ngcontent-xfe-c383] [_ngcontent-xfe-c383]:first-child {
          font-size: 1.125rem
        }
      }

      @media (max-width: 768px) {
        .fast-cart-banner__title[_ngcontent-xfe-c383] [_ngcontent-xfe-c383]:nth-child(2) {
          font-size: .75rem
        }
      }

      .fast-cart-banner__products[_ngcontent-xfe-c383] {
        display: flex;
        align-items: center;
        margin-left: auto
      }

      @media (max-width: 768px) {
        .fast-cart-banner__products[_ngcontent-xfe-c383] {
          margin: 0
        }
      }

      .fast-cart-banner__products[_ngcontent-xfe-c383] img[_ngcontent-xfe-c383] {
        width: 4rem;
        height: 4rem;
        border-radius: 12px;
        margin-right: .5rem
      }

      @media (max-width: 768px) {
        .fast-cart-banner__products[_ngcontent-xfe-c383] img[_ngcontent-xfe-c383] {
          width: 2.875rem;
          height: 2.875rem
        }
      }

      .fast-cart-banner__products[_ngcontent-xfe-c383] .more-products[_ngcontent-xfe-c383] {
        color: var(--basicColor700)
      }

      @media (min-width: 768px) {
        .fast-cart-banner__products[_ngcontent-xfe-c383] .more-products[_ngcontent-xfe-c383] {
          margin-left: .5rem
        }
      }

      .fast-cart-banner__button[_ngcontent-xfe-c383] {
        font-size: 14px
      }

      @media (min-width: 768px) {
        .fast-cart-banner__button[_ngcontent-xfe-c383] {
          margin-left: 2rem
        }
      }

      @media (max-width: 576px) {
        .fast-cart-banner__button[_ngcontent-xfe-c383] {
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
      [_nghost-xfe-c162] {
        display: block
      }

      a[_ngcontent-xfe-c162] {
        display: block;
        height: 100%;
        border-radius: inherit
      }

      a[_ngcontent-xfe-c162] img[_ngcontent-xfe-c162] {
        width: 100%;
        height: 100%;
        border-radius: inherit;
        object-fit: contain
      }
    </style>
    <style>
      [_nghost-xfe-c343] {
        display: inherit
      }

      .crm-badge[_ngcontent-xfe-c343] {
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

      .crm-badge[_ngcontent-xfe-c343] img[_ngcontent-xfe-c343] {
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

      [_nghost-xfe-c275] {
        display: block;
        position: relative
      }

      [not-in-sale=true][_nghost-xfe-c275] .price-new[_ngcontent-xfe-c275] {
        color: var(--font-color__grey)
      }

      [not-in-sale=true][_nghost-xfe-c275] .price-old[_ngcontent-xfe-c275] {
        display: none
      }

      @media (min-width: 768px) {
        [not-in-sale=true][_nghost-xfe-c275] .price-old[_ngcontent-xfe-c275] {
          display: inline-block
        }
      }

      .amount[_ngcontent-xfe-c275] {
        font-weight: var(--font-weight-bolder)
      }

      .currency[_ngcontent-xfe-c275] {
        font-size: 14px
      }

      .price-old[_ngcontent-xfe-c275] {
        font-size: var(--product-old-price-label-font-size);
        color: var(--font-color__grey);
        text-decoration: line-through
      }

      @media (max-width: 768px) {
        .price-old[_ngcontent-xfe-c275] {
          font-size: 14px
        }
      }

      .price-old[_ngcontent-xfe-c275] .currency[_ngcontent-xfe-c275] {
        font-size: inherit;
        display: inline
      }

      .price-new[_ngcontent-xfe-c275] {
        color: var(--product-price-label-color);
        margin-bottom: 3px
      }

      @media (max-width: 768px) {
        .price-new[_ngcontent-xfe-c275] {
          font-size: 18px
        }
      }

      @media (min-width: 768px) {
        .price-new[_ngcontent-xfe-c275] {
          flex-direction: unset;
          justify-content: space-between
        }
      }

      @media (max-width: 768px) {
        .price-new-only[_ngcontent-xfe-c275] {
          font-size: var(--product-new-only-price-label-font-size);
          margin-top: 8px
        }
      }

      .promotion-wrapper[_ngcontent-xfe-c275] {
        background: url(/assets/images/yellow-discount-label.svg) no-repeat;
        background-size: 100%;
        display: inline-block;
        padding: .125rem 1rem 0 .5rem
      }

      .promotion-wrapper[_ngcontent-xfe-c275] span[_ngcontent-xfe-c275] {
        display: inline-block;
        max-width: 100%;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap
      }

      .promotion-wrapper[_ngcontent-xfe-c275] .amount[_ngcontent-xfe-c275] {
        line-height: 1
      }

      .promotion-wrapper[_ngcontent-xfe-c275] .price-new[_ngcontent-xfe-c275] {
        color: var(--product-price-new-label-color, var(--product-price-label-color))
      }

      .promotion-wrapper[_ngcontent-xfe-c275] .price-new[_ngcontent-xfe-c275] .currency[_ngcontent-xfe-c275] {
        font-size: var(--product-old-price-label-font-size)
      }

      .promotion-wrapper[_ngcontent-xfe-c275] .price-old[_ngcontent-xfe-c275] .amount[_ngcontent-xfe-c275] {
        display: block
      }

      .elektronik[_nghost-xfe-c275],
      .elektronik [_nghost-xfe-c275] {
        --product-price-label-color: var(--brandColorInfo700)
      }

      .hemen[_nghost-xfe-c275],
      .hemen [_nghost-xfe-c275] {
        --product-price-label-color: var(--basicColor900)
      }

      .yemek[_nghost-xfe-c275] .promotion-wrapper[_ngcontent-xfe-c275],
      .yemek [_nghost-xfe-c275] .promotion-wrapper[_ngcontent-xfe-c275] {
        background: none
      }

      .yemek[_nghost-xfe-c275] .promotion-wrapper[_ngcontent-xfe-c275] .price-old[_ngcontent-xfe-c275] .amount[_ngcontent-xfe-c275],
      .yemek [_nghost-xfe-c275] .promotion-wrapper[_ngcontent-xfe-c275] .price-old[_ngcontent-xfe-c275] .amount[_ngcontent-xfe-c275] {
        color: var(--basicColor500)
      }

      .yemek[_nghost-xfe-c275] .price-new[_ngcontent-xfe-c275] .amount[_ngcontent-xfe-c275],
      .yemek [_nghost-xfe-c275] .price-new[_ngcontent-xfe-c275] .amount[_ngcontent-xfe-c275] {
        color: var(--basicColor900);
        white-space: nowrap
      }

      @media (max-width: 992px) {

        .yemek[_nghost-xfe-c275] .product-price[_ngcontent-xfe-c275],
        .yemek [_nghost-xfe-c275] .product-price[_ngcontent-xfe-c275] {
          display: flex;
          flex-direction: row-reverse
        }
      }

      .unitPrice[_ngcontent-xfe-c275] {
        color: var(--basicColor500);
        font-size: 10px;
        font-style: normal;
        font-weight: 600
      }

      .mion[_nghost-xfe-c275] .price-new[_ngcontent-xfe-c275] .amount[_ngcontent-xfe-c275],
      .mion [_nghost-xfe-c275] .price-new[_ngcontent-xfe-c275] .amount[_ngcontent-xfe-c275] {
        color: #141415
      }
    </style>
    <style>
      [_nghost-xfe-c345] {
        display: block
      }

      .product-actions[_ngcontent-xfe-c345] {
        display: inline-flex;
        align-items: center;
        border: 1px solid var(--basicColor100);
        border-radius: 5px;
        overflow: hidden;
        touch-action: manipulation
      }

      .product-actions[_ngcontent-xfe-c345] button[_ngcontent-xfe-c345] {
        background-color: var(--basicColor100);
        border: none;
        outline: 0;
        padding: .5rem;
        align-items: center;
        display: flex;
        cursor: pointer
      }

      .product-actions[_ngcontent-xfe-c345] button[_ngcontent-xfe-c345] fa-icon[_ngcontent-xfe-c345] {
        font-size: .75rem
      }

      .product-actions[_ngcontent-xfe-c345] .product-amount[_ngcontent-xfe-c345] {
        padding: 0 .25rem;
        text-align: center;
        line-height: 1.25;
        width: 2rem
      }

      .product-actions[_ngcontent-xfe-c345] .product-amount[_ngcontent-xfe-c345] .amount[_ngcontent-xfe-c345],
      .product-actions[_ngcontent-xfe-c345] .product-amount[_ngcontent-xfe-c345] .unit[_ngcontent-xfe-c345] {
        display: block
      }

      .product-actions[_ngcontent-xfe-c345] .product-amount[_ngcontent-xfe-c345] .unit[_ngcontent-xfe-c345] {
        font-size: .625rem
      }

      .add-to-cart-button[_ngcontent-xfe-c345] {
        cursor: pointer;
        color: #fff;
        background-color: var(--brandColorPrimary700);
        text-align: center;
        align-self: flex-end;
        border-radius: 5px;
        box-shadow: 0 2px 10px #00000047;
        padding: .25rem .5rem
      }

      .add-to-cart-button.disabled[_ngcontent-xfe-c345] {
        background-color: var(--basicColor300);
        cursor: not-allowed;
        pointer-events: none
      }

      .product-detail-add[_ngcontent-xfe-c345] {
        height: 3.15rem;
        min-width: 10.8rem
      }

      .hemen[_nghost-xfe-c345] .add-to-cart-button[_ngcontent-xfe-c345],
      .hemen [_nghost-xfe-c345] .add-to-cart-button[_ngcontent-xfe-c345] {
        background-color: var(--basicColor900)
      }

      .yemek[_nghost-xfe-c345] .product-actions[_ngcontent-xfe-c345],
      .yemek [_nghost-xfe-c345] .product-actions[_ngcontent-xfe-c345] {
        background: var(--background-color__LIGHTER);
        border: 1px solid var(--brandColorYemek700);
        border-radius: .25rem
      }

      .yemek[_nghost-xfe-c345] .product-decrease[_ngcontent-xfe-c345],
      .yemek [_nghost-xfe-c345] .product-decrease[_ngcontent-xfe-c345],
      .yemek[_nghost-xfe-c345] .product-increase[_ngcontent-xfe-c345],
      .yemek [_nghost-xfe-c345] .product-increase[_ngcontent-xfe-c345] {
        background-color: var(--brandColorYemek50);
        color: var(--brandColorYemek700)
      }

      .yemek[_nghost-xfe-c345] .product-amount[_ngcontent-xfe-c345] span[_ngcontent-xfe-c345]:last-of-type,
      .yemek [_nghost-xfe-c345] .product-amount[_ngcontent-xfe-c345] span[_ngcontent-xfe-c345]:last-of-type {
        display: none
      }

      .mion[_nghost-xfe-c345] .add-to-cart-button[_ngcontent-xfe-c345],
      .mion [_nghost-xfe-c345] .add-to-cart-button[_ngcontent-xfe-c345] {
        background-color: var(--basicColor900);
        color: var(--basicColorYellow)
      }

      .mion[_nghost-xfe-c345] .product-decrease[_ngcontent-xfe-c345],
      .mion [_nghost-xfe-c345] .product-decrease[_ngcontent-xfe-c345],
      .mion[_nghost-xfe-c345] .product-increase[_ngcontent-xfe-c345],
      .mion [_nghost-xfe-c345] .product-increase[_ngcontent-xfe-c345] {
        background-color: var(--basicColor300) !important
      }

      .mion[_nghost-xfe-c345] .product-decrease[_ngcontent-xfe-c345] fa-icon[_ngcontent-xfe-c345],
      .mion [_nghost-xfe-c345] .product-decrease[_ngcontent-xfe-c345] fa-icon[_ngcontent-xfe-c345],
      .mion[_nghost-xfe-c345] .product-increase[_ngcontent-xfe-c345] fa-icon[_ngcontent-xfe-c345],
      .mion [_nghost-xfe-c345] .product-increase[_ngcontent-xfe-c345] fa-icon[_ngcontent-xfe-c345] {
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
    <script type="text/javascript" async="" src="https://googleads.g.doubleclick.net/pagead/viewthroughconversion/715674769/?random=1709166804267&amp;cv=11&amp;fst=1709166804267&amp;bg=ffffff&amp;guid=ON&amp;async=1&amp;gtm=45be42q1v889281616z8811483837za201&amp;gcd=13n3n3l3l5&amp;dma=0&amp;u_w=1366&amp;u_h=768&amp;url=https%3A%2F%2Fwww.migros.com.tr%2F&amp;hn=www.googleadservices.com&amp;frm=0&amp;tiba=Migros%20Sanal%20Market%3A%20Online%20Market%20Al%C4%B1%C5%9Fveri%C5%9Fi&amp;npa=0&amp;pscdl=noapi&amp;auid=37027196.1709149487&amp;uaa=x86&amp;uab=64&amp;uafvl=Chromium%3B122.0.6261.69%7CNot(A%253ABrand%3B24.0.0.0%7CGoogle%2520Chrome%3B122.0.6261.69&amp;uamb=0&amp;uap=Windows&amp;uapv=10.0.0&amp;uaw=0&amp;fledge=1&amp;rfmt=3&amp;fmt=4"></script>
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
      sm-delivery-options-modal .mdc-dialog__title {
        margin: 0;
        padding: 0
      }

      sm-delivery-options-modal .sub-title {
        margin-top: .5rem
      }

      sm-delivery-options-modal .delivery-options {
        display: flex;
        flex-direction: column;
        justify-content: center
      }

      sm-delivery-options-modal .delivery-options .delivery-option--home-not-auth .mat-mdc-card-content,
      sm-delivery-options-modal .delivery-options .delivery-option--store .mat-mdc-card-content,
      sm-delivery-options-modal .delivery-options .delivery-option--donation .mat-mdc-card-content {
        height: 4.5rem
      }

      sm-delivery-options-modal .delivery-options .delivery-option--home {
        border-radius: 8px;
        box-shadow: 0 0 9px #00000014;
        border: solid 1px rgba(0, 0, 0, .12);
        display: flex;
        align-items: center;
        padding: 0 1.125rem;
        margin-bottom: 1rem;
        min-height: 4.5rem
      }

      sm-delivery-options-modal .delivery-options .delivery-option:not(:last-of-type) {
        margin-bottom: 1rem
      }

      sm-delivery-options-modal .delivery-options .delivery-option .mdc-card {
        border-radius: 8px;
        box-shadow: 0 0 9px #00000014;
        border: solid 1px rgba(0, 0, 0, .12)
      }

      sm-delivery-options-modal .delivery-options .delivery-option .mat-mdc-card-content {
        display: flex;
        align-items: center;
        padding: 0 2rem
      }

      sm-delivery-options-modal .delivery-options .delivery-option .mat-mdc-card-content .icon {
        width: 2.25rem;
        height: auto;
        margin-right: 1rem
      }

      sm-delivery-options-modal .delivery-options .delivery-option .mat-mdc-card-content .free-delivery--label {
        margin-top: .375rem
      }

      sm-delivery-options-modal .location-list {
        display: flex;
        flex-direction: column;
        overflow-x: auto !important;
        max-width: 42rem
      }

      @media (min-width: 768px) {
        sm-delivery-options-modal .location-list {
          padding: 0 3rem
        }
      }

      sm-delivery-options-modal .add-new-address-button-wrapper {
        background-color: var(--basicColor100);
        padding: 1.25rem 1rem 1.25rem .75rem;
        border-radius: 8px;
        border: solid 1px var(--basicColor300);
        cursor: pointer;
        margin-bottom: 1.5rem
      }

      @media (max-width: 576px) {
        sm-delivery-options-modal .add-new-address-button-wrapper {
          margin-top: 1rem
        }
      }

      sm-delivery-options-modal .add-new-address-button-wrapper .add-new-address-button {
        display: flex;
        flex-direction: row;
        height: 100%;
        justify-content: center
      }

      sm-delivery-options-modal .add-new-address-button-wrapper .add-new-address-button .add-new-address-button-title {
        place-self: center
      }

      sm-delivery-options-modal .address-wrapper {
        border-radius: 8px;
        border: solid 1px var(--basicColor300);
        padding: .75rem 1rem .75rem .75rem;
        width: 8.5rem;
        height: 100%;
        position: relative;
        cursor: pointer;
        margin-bottom: 1.5rem
      }

      sm-delivery-options-modal .address-wrapper:not(:first-child) {
        margin-left: 1rem
      }

      sm-delivery-options-modal .address-wrapper-location {
        width: auto;
        padding: .75rem 1rem .75rem .75rem
      }

      sm-delivery-options-modal .address-wrapper-location:not(:first-child) {
        margin-left: 0
      }

      sm-delivery-options-modal .address-wrapper-location .address-info-detail {
        height: auto
      }

      sm-delivery-options-modal .address-wrapper-location .address-options {
        justify-content: end
      }

      sm-delivery-options-modal .address-wrapper-location .address-options .address-option {
        width: auto !important
      }

      sm-delivery-options-modal .address-wrapper .check-icon- {
        display: none
      }

      sm-delivery-options-modal .address-wrapper-active {
        border: 2px solid var(--brandColorPrimary700);
        border-radius: 7px;
        padding: 2.25rem 1rem .75rem .75rem
      }

      sm-delivery-options-modal .address-wrapper-active .check-icon-active {
        background-color: var(--brandColorPrimary700);
        border-radius: 0 4px;
        top: 0;
        position: absolute;
        right: 0;
        font-size: .75rem;
        padding: 0 .125rem
      }

      sm-delivery-options-modal .address-wrapper-location-active {
        padding: .75rem 1rem .75rem .75rem
      }

      sm-delivery-options-modal fa-icon {
        align-self: center
      }

      sm-delivery-options-modal .edit-button,
      sm-delivery-options-modal .delete-button {
        width: 50%
      }

      sm-delivery-options-modal .edit-button button,
      sm-delivery-options-modal .delete-button button {
        background-color: #fff !important;
        height: 50%;
        color: var(--basicColorBlack) !important
      }

      sm-delivery-options-modal .edit-button .mdc-button__label,
      sm-delivery-options-modal .delete-button .mdc-button__label {
        display: flex;
        font-size: 12px;
        font-weight: 600
      }

      sm-delivery-options-modal .edit-button .mdc-button__label fa-icon,
      sm-delivery-options-modal .delete-button .mdc-button__label fa-icon {
        margin-right: .125rem
      }

      sm-delivery-options-modal.scroll-gradient:after {
        content: "";
        position: absolute;
        right: 0;
        width: 11rem;
        height: 11rem;
        background-image: linear-gradient(to right, transparent, var(--basicColorWhite) 60%);
        opacity: 1;
        z-index: 100
      }

      @media (max-width: 576px) {
        sm-delivery-options-modal.scroll-gradient:after {
          width: 4rem
        }
      }

      @media (min-width: 576px) {
        .delivery-options-modal__container {
          min-width: 43rem;
          max-height: 90vh
        }
      }

      .delivery-options-modal__container .mat-mdc-dialog-content {
        max-height: none
      }

      .delivery-options-modal__container .mat-mdc-dialog-content.mdc-dialog__content {
        overflow: hidden;
        padding: 2rem 2rem .5rem
      }

      .delivery-options-modal__container .mat-mdc-dialog-content.mdc-dialog__content .location-list-container {
        display: flex;
        justify-content: center
      }

      @media (min-width: 576px) {
        .delivery-options-modal__container .mat-mdc-dialog-content.mdc-dialog__content .location-list-container {
          min-height: 18.5rem;
          max-height: 26.5rem;
          overflow-y: auto
        }
      }

      .delivery-options-modal__container .delivery-address-card {
        width: 100%
      }

      .delivery-options-modal__container .delivery-address-card .address-card-title {
        display: flex;
        padding: 1rem 0;
        align-items: center;
        justify-content: space-between
      }

      .delivery-options-modal__container .delivery-address-card .address-card-title-text {
        margin-right: auto
      }

      .delivery-options-modal__container .delivery-address-card .delivery-address-card-new-address {
        display: flex
      }

      .delivery-options-modal__container .delivery-address-card .delivery-address-card-new-address-text {
        font-size: .875rem;
        align-self: center;
        cursor: pointer
      }

      .delivery-options-modal__container .delivery-address-card .delivery-address-card-new-address-icon {
        margin-right: .25rem;
        align-self: center
      }

      .delivery-options-modal__container .address-list {
        padding: 16px 45px 16px 14px;
        border-radius: 8px;
        border: solid 1px var(--basicColor300)
      }

      .delivery-options-modal__container .address-list-wrapper {
        display: flex;
        overflow-y: auto
      }

      @media (min-width: 768px) {
        .delivery-options-modal__container .address-list-wrapper {
          width: 30rem
        }
      }

      @media (min-width: 768px) {
        .delivery-options-signed--false {
          min-width: 33rem !important
        }
      }
    </style>
    <style>
      .button-icon[_ngcontent-xfe-c246] {
        display: flex
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
      fe-selectable-card {
        display: block
      }

      fe-selectable-card .mdc-card {
        cursor: pointer;
        -webkit-user-select: none;
        user-select: none;
        box-shadow: 0 0 9px #00000014;
        border-radius: 4px
      }

      fe-selectable-card .mdc-card--outlined {
        border-radius: 8px;
        border: solid 1px rgba(0, 0, 0, .12)
      }

      fe-selectable-card .mdc-card--selected {
        border: solid 1px #e27204;
        background-color: #e47d1714
      }

      fe-selectable-card .mdc-card--disabled {
        opacity: .72;
        pointer-events: none
      }

      fe-selectable-card .mdc-card .check-logo {
        width: 1.25rem;
        height: 1.25rem;
        position: absolute;
        top: .5rem;
        right: .5rem
      }

      fe-selectable-card .mdc-card .mat-card__primary-action {
        padding: 1.5rem 2.5rem
      }

      fe-selectable-card .mdc-card .mat-card-actions {
        padding: 0 2.5rem 1.5rem
      }
    </style>
    <style>
      :root {
        --primary-font-family: "Inter", sans-serif;
        --basicColorWhite: #ffffff;
        --basicColorBlack: #000000;
        --basicColorPink: #ff6be9;
        --basicColorYellow: #dde307;
        --basicColorBlue: #185dac;
        --basicColor50: #fafcfe;
        --basicColor100: #f6f7fa;
        --basicColor200: #f1f2f5;
        --basicColor300: #e9eaed;
        --basicColor400: #c7c8cb;
        --basicColor500: #a9aaad;
        --basicColor600: #7f8083;
        --basicColor700: #6a6c6e;
        --basicColor800: #4b4c4e;
        --basicColor900: #292a2c;
        --basicColor950: #141415;
        --basicColorTransparent8: rgba(41, 42, 44, .08);
        --basicColorTransparent16: rgba(41, 42, 44, .16);
        --basicColorTransparent24: rgba(41, 42, 44, .24);
        --basicColorTransparent32: rgba(41, 42, 44, .32);
        --basicColorTransparent40: rgba(41, 42, 44, .4);
        --basicColorTransparent48: rgba(41, 42, 44, .48);
        --brandColorPrimary10: rgba(255, 127, 0, .08);
        --brandColorPrimary50: #ffd8b2;
        --brandColorPrimary100: #ffcc99;
        --brandColorPrimary200: #ffbf7f;
        --brandColorPrimary300: #ffb266;
        --brandColorPrimary400: #ffa54c;
        --brandColorPrimary500: #ff9933;
        --brandColorPrimary600: #ff8b19;
        --brandColorPrimary700: #ff7f00;
        --brandColorPrimary800: #df7001;
        --brandColorPrimary900: #bf5f00;
        --brandColorTransparentPrimary8: rgba(255, 127, 0, .08);
        --brandColorTransparentPrimary16: rgba(255, 127, 0, .16);
        --brandColorTransparentPrimary24: rgba(255, 127, 0, .24);
        --brandColorTransparentPrimary32: rgba(255, 127, 0, .32);
        --brandColorTransparentPrimary40: rgba(255, 127, 0, .4);
        --brandColorTransparentPrimary48: rgba(255, 127, 0, .48);
        --brandColorError50: #ffe5ed;
        --brandColorError100: #febdd3;
        --brandColorError200: #fe92b5;
        --brandColorError300: #fe6597;
        --brandColorError400: #fd427f;
        --brandColorError500: #fc1e68;
        --brandColorError600: #ea1a65;
        --brandColorError700: #d41661;
        --brandColorError800: #bf105d;
        --brandColorError900: #9a0557;
        --brandColorTransparentError50: #ffe5ed1a;
        --brandColorTransparentError100: #febdd31a;
        --brandColorTransparentError200: #fe92b51a;
        --brandColorTransparentError300: #fe65971a;
        --brandColorTransparentError400: #fd427f1a;
        --brandColorTransparentError500: #fc1e681a;
        --brandColorTransparentError600: #ea1a651a;
        --brandColorTransparentError700: #d416611a;
        --brandColorTransparentError800: #bf105d1a;
        --brandColorTransparentError900: #9a05571a;
        --brandColorInfo10: #eff4ff;
        --brandColorInfo50: #d5e0fc;
        --brandColorInfo100: #c0cff9;
        --brandColorInfo200: #abc0f8;
        --brandColorInfo300: #96b0f6;
        --brandColorInfo400: #82a1f5;
        --brandColorInfo500: #6c91f3;
        --brandColorInfo600: #2e62ee;
        --brandColorInfo700: #214dc5;
        --brandColorInfo800: #193fa5;
        --brandColorInfo900: #113289;
        --brandColorMigroskop50: #fef9db;
        --brandColorMigroskop100: #fdf6c9;
        --brandColorMigroskop200: #fdf3b7;
        --brandColorMigroskop300: #fdf0a5;
        --brandColorMigroskop400: #fdee94;
        --brandColorMigroskop500: #fcea81;
        --brandColorMigroskop600: #fce870;
        --brandColorMigroskop700: #fbe24c;
        --brandColorMigroskop800: #dcc53e;
        --brandColorMigroskop900: #c0ad35;
        --brandColorTransparentMigroskop8: rgba(251, 226, 76, .08);
        --brandColorTransparentMigroskop16: rgba(251, 226, 76, .16);
        --brandColorTransparentMigroskop24: rgba(251, 226, 76, .24);
        --brandColorTransparentMigroskop32: rgba(251, 226, 76, .32);
        --brandColorTransparentMigroskop40: rgba(251, 226, 76, .4);
        --brandColorTransparentMigroskop48: rgba(251, 226, 76, .48);
        --brandColorKurbanPrimary50: #f3f8f3;
        --brandColorKurbanPrimary100: #f2f5f2;
        --brandColorKurbanPrimary200: #e9efe9;
        --brandColorKurbanPrimary300: #d2ded3;
        --brandColorKurbanPrimary400: #bccebd;
        --brandColorKurbanPrimary500: #a6bda7;
        --brandColorKurbanPrimary600: #8fac91;
        --brandColorKurbanPrimary700: #799c7b;
        --brandColorKurbanPrimary800: #658267;
        --brandColorYemek50: #ffe8e1;
        --brandColorYemek100: #ffcfc0;
        --brandColorYemek200: #ffc1af;
        --brandColorYemek300: #ffa488;
        --brandColorYemek400: #ff8661;
        --brandColorYemek500: #ff683a;
        --brandColorYemek600: #ff4a13;
        --brandColorYemek700: #ff3c00;
        --brandColorYemek800: #c42e00;
        --brandColorYemek900: #932600;
        --brandColorYemekAi50: #fff1e3;
        --brandColorMion50: #eaf3f4;
        --brandColorMion100: #e3eff1;
        --brandColorMion200: #ddebed;
        --brandColorMion300: #d6e8ea;
        --brandColorMion400: #cfe4e6;
        --brandColorMion500: #c9e0e2;
        --brandColorMion600: #c3dcdf;
        --brandColorMion700: #bdd9dc;
        --brandColorMion800: #99b2b7;
        --brandColorMion900: #99b2b7;
        --brandColorMoney50: #e9d3ef;
        --brandColorMoney100: #ddbde7;
        --brandColorMoney200: #d3a7df;
        --brandColorMoney300: #c791d7;
        --brandColorMoney400: #bc7cd0;
        --brandColorMoney500: #b165c7;
        --brandColorMoney600: #a650c0;
        --brandColorMoney700: #9024b0;
        --brandColorMoney800: #771c92;
        --brandColorMoney900: #56136a;
        --brandColorTazedirekt: #63a70a;
        --brandColorMacrocenter: #0f0f0f;
        --brandColorTransparentMoney8: rgba(144, 36, 176, .08);
        --brandColorTransparentMoney16: rgba(144, 36, 176, .16);
        --brandColorTransparentMoney24: rgba(144, 36, 176, .24);
        --brandColorTransparentMoney32: rgba(144, 36, 176, .32);
        --brandColorTransparentMoney40: rgba(144, 36, 176, .4);
        --brandColorTransparentMoney48: rgba(144, 36, 176, .48);
        --systemColorSuccess50: #ccf0d2;
        --systemColorSuccess100: #9ae2a5;
        --systemColorSuccess200: #80da8e;
        --systemColorSuccess300: #67d377;
        --systemColorSuccess400: #4dcb60;
        --systemColorSuccess500: #35c54a;
        --systemColorSuccess600: #02b61d;
        --systemColorSuccess700: #029d19;
        --systemColorSuccess800: #067d17;
        --systemColorSuccess900: #056212;
        --systemColorTransparentSuccess8: rgba(2, 182, 29, .08);
        --systemColorTransparentSuccess16: rgba(2, 182, 29, .16);
        --systemColorTransparentSuccess24: rgba(2, 182, 29, .24);
        --systemColorTransparentSuccess32: rgba(2, 182, 29, .32);
        --systemColorTransparentSuccess40: rgba(2, 182, 29, .4);
        --systemColorTransparentSuccess48: rgba(2, 182, 29, .48);
        --systemColorTransparentInfo8: rgba(46, 98, 238, .08);
        --systemColorTransparentInfo16: rgba(46, 98, 238, .16);
        --systemColorTransparentInfo24: rgba(46, 98, 238, .24);
        --systemColorTransparentInfo32: rgba(46, 98, 238, .32);
        --systemColorTransparentInfo40: rgba(46, 98, 238, .4);
        --systemColorTransparentInfo48: rgba(46, 98, 238, .48);
        --systemColorTransparentError8: rgba(252, 30, 104, .08);
        --systemColorTransparentError16: rgba(252, 30, 104, .16);
        --systemColorTransparentError24: rgba(252, 30, 104, .24);
        --systemColorTransparentError32: rgba(252, 30, 104, .32);
        --systemColorTransparentError40: rgba(252, 30, 104, .4);
        --systemColorTransparentError48: rgba(252, 30, 104, .48);
        --brandColorHemen50: #fff8e5;
        --brandColorHemen100: #fff3cc;
        --brandColorHemen200: #ffecb2;
        --brandColorHemen300: #ffe799;
        --brandColorHemen400: #ffe07f;
        --brandColorHemen500: #ffda66;
        --brandColorHemen600: #ffce33;
        --brandColorHemen700: #ffc200;
        --brandColorHemen800: #e4ae03;
        --brandColorHemen900: #b98d00;
        --brandColorTransparentHemen8: rgba(255, 194, 0, .08);
        --brandColorTransparentHemen24: rgba(255, 194, 0, .24);
        --brandColorTransparentHemen32: rgba(255, 194, 0, .32);
        --brandColorTransparentHemen40: rgba(255, 194, 0, .4);
        --brandColorTransparentHemen48: rgba(255, 194, 0, .48);
        --brandColorMigrosCuzdan: #3b2ed0;
        --brandColorCuzdanInfo: #185dac;
        --brandColorMigrosCuzdanTransparent: rgba(59, 46, 208, .08);
        --mdc-checkbox-ink-color: white;
        --mobile-bottom-nav-height: 3.5rem;
        --product-price-new-label-color: var(--basicColor900);
        --not-found-page-color: var(--brandColorPrimary700);
        --not-found-page-color__hover: var(--brandColorPrimary400);
        --selector-border-color: var(--brandColorPrimary700);
        --crm-badge-color: var(--brandColorError600);
        --crm-badge-bg-color: rgba(254, 232, 239, .8)
      }

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

      sm-delivery-store [mat-dialog-title] {
        text-align: center
      }

      sm-delivery-store mat-dialog-content {
        flex-grow: 0 !important;
        overflow: visible !important
      }

      @media (min-width: 768px) {
        sm-delivery-store mat-dialog-content {
          justify-content: center;
          flex-direction: column;
          border: 1px solid var(--border-color--white);
          border-radius: var(--base-border-radius);
          padding: 0 3.95rem 3.95rem !important;
          max-height: 23rem
        }
      }

      sm-delivery-store mdc-card {
        margin-top: .625rem
      }

      sm-delivery-store mdc-card-primary-action {
        align-items: center;
        text-align: center;
        border-radius: .5rem
      }

      sm-delivery-store mdc-card-primary-action {
        display: flex;
        flex-direction: row
      }

      sm-delivery-store .scrollable {
        max-height: 17rem;
        overflow-y: auto;
        margin: 0 0 0 -.625rem
      }

      sm-delivery-store ::-webkit-scrollbar {
        width: .5rem;
        border-radius: 4px;
        background-color: var(--basicColor200)
      }

      sm-delivery-store ::-webkit-scrollbar-thumb {
        border-radius: 4px;
        background-color: var(--basicColor900);
        border: .125rem solid var(--basicColor200)
      }

      sm-delivery-store .description {
        text-align: center
      }

      @media (min-width: 768px) {
        sm-delivery-store .description {
          padding: 0 5rem
        }
      }
    </style>
    <style>
      fe-dropdown {
        width: 100%;
        display: block
      }

      fe-dropdown .mat-mdc-select-arrow-wrapper {
        background: url(/assets/icons/down-chevron.svg) no-repeat;
        padding-right: 1rem
      }

      fe-dropdown .mat-mdc-select-arrow {
        opacity: 0
      }

      fe-dropdown .mat-mdc-form-field {
        width: 100%;
        margin-top: .5rem
      }

      fe-dropdown.disabled .mat-mdc-select-arrow-wrapper {
        display: none
      }

      fe-dropdown.disabled mat-label {
        color: #0000001f
      }

      .mat-mdc-form-field .mat-mdc-text-field-wrapper.mdc-text-field .mdc-notched-outline__notch {
        padding: 0
      }

      .icon-prefix {
        margin-right: .75rem;
        margin-left: 1rem
      }

      .mat-mdc-select-value {
        font-size: .875rem;
        font-weight: 600;
        font-stretch: normal;
        font-style: normal;
        line-height: 1.71
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
      .mdc-menu-surface {
        display: none;
        position: absolute;
        box-sizing: border-box;
        max-width: calc(100vw - 32px);
        max-width: var(--mdc-menu-max-width, calc(100vw - 32px));
        max-height: calc(100vh - 32px);
        max-height: var(--mdc-menu-max-height, calc(100vh - 32px));
        margin: 0;
        padding: 0;
        transform: scale(1);
        transform-origin: top left;
        opacity: 0;
        overflow: auto;
        will-change: transform, opacity;
        z-index: 8;
        border-radius: 4px;
        border-radius: var(--mdc-shape-medium, 4px);
        transform-origin-left: top left;
        transform-origin-right: top right
      }

      .mdc-menu-surface:focus {
        outline: none
      }

      .mdc-menu-surface--animating-open {
        display: inline-block;
        transform: scale(0.8);
        opacity: 0
      }

      .mdc-menu-surface--open {
        display: inline-block;
        transform: scale(1);
        opacity: 1
      }

      .mdc-menu-surface--animating-closed {
        display: inline-block;
        opacity: 0
      }

      [dir=rtl] .mdc-menu-surface,
      .mdc-menu-surface[dir=rtl] {
        transform-origin-left: top right;
        transform-origin-right: top left
      }

      .mdc-menu-surface--anchor {
        position: relative;
        overflow: visible
      }

      .mdc-menu-surface--fixed {
        position: fixed
      }

      .mdc-menu-surface--fullwidth {
        width: 100%
      }

      .mat-mdc-select {
        display: inline-block;
        width: 100%;
        outline: none
      }

      .mat-mdc-select-trigger {
        display: inline-flex;
        align-items: center;
        cursor: pointer;
        position: relative;
        box-sizing: border-box;
        width: 100%
      }

      .mat-mdc-select-disabled .mat-mdc-select-trigger {
        -webkit-user-select: none;
        user-select: none;
        cursor: default
      }

      .mat-mdc-select-value {
        width: 100%;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap
      }

      .mat-mdc-select-value-text {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis
      }

      .mat-mdc-select-arrow-wrapper {
        height: 24px;
        flex-shrink: 0;
        display: inline-flex;
        align-items: center
      }

      .mat-form-field-appearance-fill .mat-mdc-select-arrow-wrapper {
        transform: translateY(-40%)
      }

      .mat-mdc-select-arrow {
        width: 10px;
        height: 5px;
        position: relative
      }

      .mat-mdc-select-arrow svg {
        fill: currentColor;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%)
      }

      .cdk-high-contrast-active .mat-mdc-select-arrow svg {
        fill: CanvasText
      }

      .mat-mdc-select-disabled .cdk-high-contrast-active .mat-mdc-select-arrow svg {
        fill: GrayText
      }

      .mdc-menu-surface.mat-mdc-select-panel {
        width: 100%;
        max-height: 275px;
        position: static;
        outline: 0;
        margin: 0;
        padding: 8px 0;
        list-style-type: none
      }

      .mdc-menu-surface.mat-mdc-select-panel:focus {
        outline: none
      }

      .cdk-high-contrast-active .mdc-menu-surface.mat-mdc-select-panel {
        outline: solid 1px
      }

      .cdk-overlay-pane:not(.mat-mdc-select-panel-above) .mdc-menu-surface.mat-mdc-select-panel {
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        transform-origin: top center
      }

      .mat-mdc-select-panel-above .mdc-menu-surface.mat-mdc-select-panel {
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
        transform-origin: bottom center
      }

      .mat-mdc-select-placeholder {
        transition: color 400ms 133.3333333333ms cubic-bezier(0.25, 0.8, 0.25, 1)
      }

      ._mat-animation-noopable .mat-mdc-select-placeholder {
        transition: none
      }

      .mat-form-field-hide-placeholder .mat-mdc-select-placeholder {
        color: rgba(0, 0, 0, 0);
        -webkit-text-fill-color: rgba(0, 0, 0, 0);
        transition: none;
        display: block
      }

      .mat-mdc-form-field-type-mat-select.mat-form-field-appearance-fill .mat-mdc-floating-label {
        max-width: calc(100% - 18px)
      }

      .mat-mdc-form-field-type-mat-select.mat-form-field-appearance-fill .mdc-floating-label--float-above {
        max-width: calc(100% / 0.75 - 24px)
      }

      .mat-mdc-form-field-type-mat-select.mat-form-field-appearance-outline .mdc-notched-outline__notch {
        max-width: calc(100% - 60px)
      }

      .mat-mdc-form-field-type-mat-select.mat-form-field-appearance-outline .mdc-text-field--label-floating .mdc-notched-outline__notch {
        max-width: calc(100% - 24px)
      }

      .mat-mdc-select-min-line:empty::before {
        content: " ";
        white-space: pre;
        width: 1px;
        display: inline-block;
        visibility: hidden
      }
    </style>
    <style>
      .mat-mdc-option {
        display: flex;
        position: relative;
        align-items: center;
        justify-content: flex-start;
        overflow: hidden;
        padding: 0;
        padding-left: 16px;
        padding-right: 16px;
        -webkit-user-select: none;
        user-select: none;
        cursor: pointer;
        min-height: 48px
      }

      .mat-mdc-option:focus {
        outline: none
      }

      [dir=rtl] .mat-mdc-option,
      .mat-mdc-option[dir=rtl] {
        padding-left: 16px;
        padding-right: 16px
      }

      .mat-mdc-option.mdc-list-item {
        align-items: center
      }

      .mat-mdc-option.mdc-list-item--disabled {
        opacity: .38;
        cursor: default
      }

      .mat-mdc-optgroup .mat-mdc-option:not(.mat-mdc-option-multiple) {
        padding-left: 32px
      }

      [dir=rtl] .mat-mdc-optgroup .mat-mdc-option:not(.mat-mdc-option-multiple) {
        padding-left: 16px;
        padding-right: 32px
      }

      .mat-mdc-option .mat-pseudo-checkbox {
        margin-right: 16px
      }

      [dir=rtl] .mat-mdc-option .mat-pseudo-checkbox {
        margin-right: 0;
        margin-left: 16px
      }

      .mat-mdc-option .mat-mdc-option-ripple {
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        position: absolute;
        pointer-events: none
      }

      .mat-mdc-option .mdc-list-item__primary-text {
        white-space: normal;
        font-size: inherit;
        font-weight: inherit;
        letter-spacing: inherit;
        line-height: inherit;
        font-family: inherit;
        text-decoration: inherit;
        text-transform: inherit
      }

      .cdk-high-contrast-active .mat-mdc-option.mdc-list-item--selected:not(.mat-mdc-option-multiple)::after {
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

      [dir=rtl] .cdk-high-contrast-active .mat-mdc-option.mdc-list-item--selected:not(.mat-mdc-option-multiple)::after {
        right: auto;
        left: 16px
      }

      .mat-mdc-option-active::before {
        content: ""
      }
    </style>
    <style>
      sm-location-map-modal .add-location-button {
        display: block;
        margin: 1rem auto 0;
        width: 356px;
        height: 50px;
        border-radius: 5px
      }

      @media (max-width: 767.98px) {
        sm-location-map-modal .add-location-button {
          width: 100%
        }
      }

      sm-location-map-modal form {
        margin-top: 1rem
      }

      sm-location-map-modal form mat-form-field {
        width: 100%;
        margin-bottom: .25rem
      }

      @media (min-width: 768px) {
        sm-location-map-modal .address-row {
          display: grid;
          grid-column-gap: 1rem;
          grid-template-columns: 1fr 1fr
        }
      }

      sm-location-map-modal .icon {
        display: block;
        margin-left: auto;
        margin-right: auto
      }

      sm-location-map-modal .buttons-wrapper {
        display: flex;
        margin-top: 1.5rem
      }

      @media (max-width: 767.98px) {
        sm-location-map-modal .buttons-wrapper {
          flex-direction: column
        }
      }

      sm-location-map-modal .buttons-wrapper .button {
        height: 3rem
      }

      sm-location-map-modal .buttons-wrapper .change-location-button .mdc-button__label {
        color: var(--brandColorPrimary700)
      }

      sm-location-map-modal .buttons-wrapper .change-location-button .mat-mdc-button-touch-target {
        background-color: #fff
      }

      sm-location-map-modal .formatted-address {
        display: flex;
        border-radius: 8px;
        background-color: var(--basicColor100);
        padding: .5rem
      }

      sm-location-map-modal .formatted-address .icon {
        height: 1rem;
        align-self: center
      }

      sm-location-map-modal .location-verify {
        padding: 1rem 1rem 0;
        justify-content: space-between;
        display: flex;
        align-items: center;
        flex-direction: column
      }

      sm-location-map-modal .location-verify fa-icon {
        font-size: 2rem;
        margin-bottom: 1rem
      }

      sm-location-map-modal .location-verify .address-info {
        margin-top: .75rem;
        text-align: center
      }

      @media (min-width: 768px) {
        sm-location-map-modal .location-verify {
          align-content: center;
          margin: auto
        }
      }

      :host-context(.mion) .change-location-button .mdc-button__label {
        color: var(--basicColor900) !important
      }
    </style>
    <style>
      @media (min-width: 768px) {
        .pac-container {
          position: absolute !important;
          left: 50px !important;
          top: 90px !important
        }
      }

      .mat-mdc-dialog-surface {
        position: relative !important
      }

      fe-location-selection-map {
        display: block;
        position: relative
      }

      fe-location-selection-map .search-prefix {
        position: absolute;
        left: .5rem;
        top: .5rem;
        font-size: 1.125rem
      }

      fe-location-selection-map .places-autocomplete {
        position: relative;
        width: 100%;
        padding: .5rem;
        outline: none;
        border-radius: 8px;
        border: solid 1px var(--basicColor300);
        margin-bottom: .625rem;
        text-indent: 1.5rem
      }

      fe-location-selection-map .location-map {
        width: 100%;
        height: 100%;
        position: relative;
        display: block;
        border-radius: 8px
      }

      fe-location-selection-map .location-map .map-container {
        max-height: 291px;
        width: 100% !important;
        display: block
      }

      @media (max-width: 767.98px) {
        fe-location-selection-map .location-map .map-container {
          max-width: 100%;
          max-height: 60vh
        }
      }

      fe-location-selection-map .location-map .location-formatted-address {
        width: calc(100% - 2.5rem);
        height: -moz-fit-content;
        height: fit-content;
        padding: .75rem;
        border-radius: 8px;
        box-shadow: 0 0 9px #00000014;
        background-color: var(--basicColorWhite);
        position: absolute;
        top: 1rem;
        left: 1.25rem;
        display: flex;
        align-items: center
      }

      fe-location-selection-map .location-map .location-formatted-address fa-icon {
        font-size: 1.5rem;
        margin-right: .75rem
      }

      fe-location-selection-map .location-map .info-window {
        max-width: 300px
      }

      fe-location-selection-map .location-map .info-window__title {
        font-weight: 700;
        font-size: 16px;
        margin-bottom: 5px
      }

      fe-location-selection-map .location-map .info-window__content {
        margin-bottom: 0
      }

      fe-location-selection-map .location-map .gm-style-mtc,
      fe-location-selection-map .location-map .gm-fullscreen-control,
      fe-location-selection-map .location-map .gm-svpc {
        display: none
      }

      fe-location-selection-map .location-map .gm-bundled-control {
        position: absolute;
        left: 0
      }

      fe-location-selection-map .location-map .gm-style-iw-d {
        overflow: hidden !important
      }

      fe-location-selection-map .location-map .gm-style-iw-c {
        background-color: var(--basicColor900);
        color: var(--basicColorWhite);
        padding: .5rem !important
      }

      fe-location-selection-map .location-map .gm-style-iw-t:after {
        background: linear-gradient(45deg, var(--basicColor900) 50%, rgba(255, 255, 255, 0) 51%, rgba(255, 255, 255, 0) 100%)
      }

      fe-location-selection-map .current-location-button-wrapper {
        position: absolute;
        bottom: 1rem;
        right: 1rem
      }

      fe-location-selection-map .current-location-button-wrapper .current-location-button {
        width: 175px;
        padding: 8px 10px;
        border-radius: 6.7px;
        box-shadow: 0 0 8px #00000014;
        background-color: var(--basicColorWhite);
        color: var(--basicColor900);
        font-size: 12px;
        font-weight: 600;
        border: none
      }

      fe-location-selection-map .map-info {
        max-width: 38rem
      }

      fe-location-selection-map .map-info .map-info-text {
        margin: 0 .25rem .5rem;
        font-size: .875rem;
        font-style: normal;
        line-height: 1.43;
        letter-spacing: normal
      }

      fe-location-selection-map .map-info .map-info-text-bold {
        font-weight: 700
      }
    </style>
    <script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/56/1/intl/tr_ALL/common.js"></script>
    <script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/56/1/intl/tr_ALL/util.js"></script>
    <script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/56/1/intl/tr_ALL/map.js"></script>
    <script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/56/1/intl/tr_ALL/marker.js"></script>
    <script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/56/1/intl/tr_ALL/infowindow.js"></script>
    <script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/56/1/intl/tr_ALL/onion.js"></script>
    <script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/56/1/intl/tr_ALL/controls.js"></script>
    <script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/56/1/intl/tr_ALL/places_impl.js"></script>
    <script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/56/1/intl/tr_ALL/geocoder.js"></script>
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
      .breadcrumb[_ngcontent-xfe-c400] {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: left;
        height: 3.5rem;
        background-color: var(--brandColorPrimary700);
        position: relative
      }

      .breadcrumb[_ngcontent-xfe-c400] .content[_ngcontent-xfe-c400] {
        width: 67%
      }

      .breadcrumb[_ngcontent-xfe-c400] .content[_ngcontent-xfe-c400] h3[_ngcontent-xfe-c400] {
        margin: 0;
        color: var(--font-color__light)
      }

      .breadcrumb[_ngcontent-xfe-c400] a[_ngcontent-xfe-c400] {
        width: 17.5px;
        height: 30px
      }

      .breadcrumb[_ngcontent-xfe-c400] a[_ngcontent-xfe-c400] fa-icon[_ngcontent-xfe-c400] {
        position: absolute;
        left: 1.125rem;
        color: var(--font-color__light);
        font-size: 1.25rem
      }

      .breadcrumb .hemen[_nghost-xfe-c400] h3[_ngcontent-xfe-c400],
      .hemen [_nghost-xfe-c400] h3[_ngcontent-xfe-c400],
      .breadcrumb .hemen[_nghost-xfe-c400] a[_ngcontent-xfe-c400] fa-icon[_ngcontent-xfe-c400],
      .hemen [_nghost-xfe-c400] a[_ngcontent-xfe-c400] fa-icon[_ngcontent-xfe-c400] {
        color: var(--basicColor900)
      }

      .breadcrumb .mion[_nghost-xfe-c400] .breadcrumb[_ngcontent-xfe-c400] a[_ngcontent-xfe-c400] fa-icon[_ngcontent-xfe-c400],
      .mion [_nghost-xfe-c400] .breadcrumb[_ngcontent-xfe-c400] a[_ngcontent-xfe-c400] fa-icon[_ngcontent-xfe-c400] {
        color: var(--basicColor900)
      }

      .breadcrumb .mion[_nghost-xfe-c400] .content[_ngcontent-xfe-c400] h3[_ngcontent-xfe-c400],
      .mion [_nghost-xfe-c400] .content[_ngcontent-xfe-c400] h3[_ngcontent-xfe-c400] {
        color: var(--basicColor900)
      }
    </style>
    <style>
      [_nghost-xfe-c398] {
        position: relative;
        display: block
      }

      @media (max-width: 767.98px) {
        [_nghost-xfe-c398] {
          white-space: nowrap;
          max-width: 90vw
        }
      }

      .breadcrumbs[_ngcontent-xfe-c398] {
        margin: 0 0 .5rem;
        padding: 0
      }

      .breadcrumbs__item[_ngcontent-xfe-c398] {
        display: inline;
        line-height: 15px
      }

      .breadcrumbs__item[_ngcontent-xfe-c398]+li[_ngcontent-xfe-c398]:before {
        content: "";
        display: inline-block;
        color: var(--font-color__black);
        background: url(/assets/icons/right-chevron.svg) no-repeat center;
        width: 10px;
        height: 10px;
        margin: 0 10px;
        background-size: cover;
        vertical-align: middle
      }

      @media (max-width: 767.98px) {
        .breadcrumbs__item[_ngcontent-xfe-c398]+li[_ngcontent-xfe-c398]:before {
          margin: 0 .4rem
        }
      }

      .breadcrumbs__item[_ngcontent-xfe-c398]:last-child a[_ngcontent-xfe-c398] {
        color: var(--font-color__default);
        pointer-events: none
      }

      .breadcrumbs__link[_ngcontent-xfe-c398] {
        font-family: var(--secondary-font-family);
        color: var(--background-color__DARK);
        font-size: 12px
      }

      .breadcrumbs--skeleton[_ngcontent-xfe-c398] {
        vertical-align: middle
      }

      .breadcrumbs--skeleton[_ngcontent-xfe-c398] span[_ngcontent-xfe-c398] {
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
      [_nghost-xfe-c408] {
        display: block
      }

      .product-discounts[_ngcontent-xfe-c408] {
        display: flex;
        align-items: center
      }

      @supports (gap: 1rem) {
        .product-discounts[_ngcontent-xfe-c408] {
          gap: 1rem
        }
      }

      @supports not (gap: 1rem) {
        .product-discounts[_ngcontent-xfe-c408]>*[_ngcontent-xfe-c408] {
          margin-right: 1rem !important
        }
      }

      .product-discounts[_ngcontent-xfe-c408] .discount[_ngcontent-xfe-c408] {
        cursor: pointer;
        display: flex;
        align-items: center;
        height: 4rem
      }

      .product-discounts[_ngcontent-xfe-c408] .discount[_ngcontent-xfe-c408] .title[_ngcontent-xfe-c408],
      .product-discounts[_ngcontent-xfe-c408] .discount[_ngcontent-xfe-c408] fa-icon[_ngcontent-xfe-c408] {
        margin-left: .75rem
      }

      .product-discounts[_ngcontent-xfe-c408] .discount[_ngcontent-xfe-c408]+.discount[_ngcontent-xfe-c408] {
        margin-left: .5rem
      }

      .product-discounts[_ngcontent-xfe-c408] .new-badge[_ngcontent-xfe-c408] {
        display: flex;
        align-content: center;
        align-items: center;
        height: 4rem
      }

      .product-discounts[_ngcontent-xfe-c408] .new-badge-content[_ngcontent-xfe-c408] {
        border-radius: .5rem;
        padding: 0 .5rem;
        height: 2.7rem;
        display: flex;
        align-items: center
      }

      .product-discounts[_ngcontent-xfe-c408] .cross-badge[_ngcontent-xfe-c408] {
        padding: .125rem .375rem;
        border-radius: 4px;
        width: -moz-fit-content;
        width: fit-content;
        background-color: var(--systemColorSuccess600)
      }

      .product-discounts[_ngcontent-xfe-c408] .discount-badge[_ngcontent-xfe-c408] {
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

      .product-discounts[_ngcontent-xfe-c408] .discount-badge--percent[_ngcontent-xfe-c408] {
        font-size: .5rem;
        margin-right: 1px
      }

      .product-discounts[_ngcontent-xfe-c408] .discount-badge--unit[_ngcontent-xfe-c408] {
        font-size: .75rem
      }

      .product-discounts[_ngcontent-xfe-c408] .discount-badge--label[_ngcontent-xfe-c408] {
        letter-spacing: -.3px
      }

      .product-discounts[_ngcontent-xfe-c408] .special-badge[_ngcontent-xfe-c408] {
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

      .product-discounts[_ngcontent-xfe-c408] .special-badge[_ngcontent-xfe-c408] span[_ngcontent-xfe-c408] {
        margin-top: 18%;
        display: inline-block
      }

      .product-discounts[_ngcontent-xfe-c408] .delist-badge[_ngcontent-xfe-c408] {
        height: 1.5rem;
        width: 10rem;
        background: var(--brandColorError600);
        border-radius: .5rem;
        text-align: center;
        line-height: 1.375rem
      }

      .product-discounts[_ngcontent-xfe-c408] .delist-badge[_ngcontent-xfe-c408] span[_ngcontent-xfe-c408] {
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
      .read-more[_ngcontent-xfe-c272] {
        overflow: hidden;
        display: block
      }

      .read-more__toggle[_ngcontent-xfe-c272] {
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

      .home-page-wrapper[_ngcontent-xfe-c364] .mat-tab-group[_ngcontent-xfe-c364] .mat-tab-header[_ngcontent-xfe-c364] {
        display: none
      }

      .home-page-wrapper[_ngcontent-xfe-c364] .section[_ngcontent-xfe-c364] {
        margin-top: 3rem;
        position: relative
      }

      .home-page-wrapper[_ngcontent-xfe-c364] .section.no-title[_ngcontent-xfe-c364] {
        margin-top: 0
      }

      @media (max-width: 576px) {
        .home-page-wrapper[_ngcontent-xfe-c364] .section[_ngcontent-xfe-c364] {
          margin-top: 1rem
        }
      }

      .home-page-wrapper[_ngcontent-xfe-c364] .section[_ngcontent-xfe-c364] .section-title[_ngcontent-xfe-c364] {
        margin-bottom: 1.25rem;
        font-size: 1.1rem
      }

      @media (max-width: 576px) {
        .home-page-wrapper[_ngcontent-xfe-c364] .section[_ngcontent-xfe-c364] .section-title[_ngcontent-xfe-c364] {
          margin-bottom: .75rem;
          font-size: 1.1rem;
          padding: 0 1rem
        }
      }

      .home-page-wrapper[_ngcontent-xfe-c364] .section[_ngcontent-xfe-c364] .fade-out[_ngcontent-xfe-c364] {
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
        .home-page-wrapper[_ngcontent-xfe-c364] .section[_ngcontent-xfe-c364] .fade-out[_ngcontent-xfe-c364] {
          display: none
        }
      }

      .home-page-wrapper[_ngcontent-xfe-c364] .section[_ngcontent-xfe-c364] .fade-out.categories[_ngcontent-xfe-c364] {
        bottom: 0;
        top: 50px
      }

      @media (min-width: 768px) {
        .home-page-wrapper[_ngcontent-xfe-c364] .section[_ngcontent-xfe-c364] .fade-out.categories[_ngcontent-xfe-c364] {
          display: none
        }
      }

      .home-page-wrapper[_ngcontent-xfe-c364] .section[_ngcontent-xfe-c364] .horizontal-list-page-items-container[_ngcontent-xfe-c364] {
        display: flex;
        overflow-y: scroll;
        scrollbar-width: none;
        -ms-overflow-style: none
      }

      .home-page-wrapper[_ngcontent-xfe-c364] .section[_ngcontent-xfe-c364] .horizontal-list-page-items-container[_ngcontent-xfe-c364]::-webkit-scrollbar {
        width: 0;
        height: 0
      }

      .home-page-wrapper[_ngcontent-xfe-c364] .section[_ngcontent-xfe-c364] .horizontal-list-page-items-container.in-mat-tab-group[_ngcontent-xfe-c364] {
        overflow-x: unset
      }

      .home-page-wrapper[_ngcontent-xfe-c364] .section[_ngcontent-xfe-c364] .horizontal-list-page-items-container[_ngcontent-xfe-c364] sm-list-page-item[_ngcontent-xfe-c364] {
        margin-right: .625rem
      }

      @media (max-width: 768px) {
        .home-page-wrapper[_ngcontent-xfe-c364] .section[_ngcontent-xfe-c364] .horizontal-list-page-items-container[_ngcontent-xfe-c364] sm-list-page-item[_ngcontent-xfe-c364] {
          margin-right: .5rem
        }
      }

      @media (max-width: 768px) {
        .home-page-wrapper[_ngcontent-xfe-c364] .section[_ngcontent-xfe-c364] .horizontal-list-page-items-container[_ngcontent-xfe-c364] {
          padding: 0 0 0 1rem
        }
      }

      .home-page-wrapper[_ngcontent-xfe-c364] .section[_ngcontent-xfe-c364] .vertical-list-page-items-container[_ngcontent-xfe-c364] {
        display: grid;
        grid-template-rows: 1fr 1fr 1fr 1fr;
        grid-auto-flow: column;
        gap: .75rem 0;
        overflow-y: scroll;
        scrollbar-width: none;
        -ms-overflow-style: none
      }

      .home-page-wrapper[_ngcontent-xfe-c364] .section[_ngcontent-xfe-c364] .vertical-list-page-items-container[_ngcontent-xfe-c364]::-webkit-scrollbar {
        width: 0;
        height: 0
      }

      .home-page-wrapper[_ngcontent-xfe-c364] .section[_ngcontent-xfe-c364] .vertical-list-page-items-container.in-mat-tab-group[_ngcontent-xfe-c364] {
        overflow-x: unset
      }

      .home-page-wrapper[_ngcontent-xfe-c364] .section[_ngcontent-xfe-c364] .vertical-list-page-items-container[_ngcontent-xfe-c364] sm-list-page-item[_ngcontent-xfe-c364] {
        margin-right: .625rem
      }

      @media (max-width: 768px) {
        .home-page-wrapper[_ngcontent-xfe-c364] .section[_ngcontent-xfe-c364] .vertical-list-page-items-container[_ngcontent-xfe-c364] sm-list-page-item[_ngcontent-xfe-c364] {
          margin-right: .5rem
        }
      }

      .home-page-wrapper[_ngcontent-xfe-c364] .next-btn[_ngcontent-xfe-c364] {
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
        .home-page-wrapper[_ngcontent-xfe-c364] .next-btn[_ngcontent-xfe-c364] {
          display: none
        }
      }

      .home-page-wrapper[_ngcontent-xfe-c364] .next-btn[_ngcontent-xfe-c364]:after {
        content: "";
        display: inline-block;
        height: .3em;
        width: .3em;
        border-style: solid;
        border-width: .05em .05em 0 0;
        transform: rotate(45deg)
      }

      .home-page-wrapper[_ngcontent-xfe-c364] .next-btn[_ngcontent-xfe-c364]:after {
        left: .4em;
        position: relative;
        font-size: 2rem;
        top: 1rem
      }

      .home-page-wrapper[_ngcontent-xfe-c364] .prev-btn[_ngcontent-xfe-c364] {
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
        .home-page-wrapper[_ngcontent-xfe-c364] .prev-btn[_ngcontent-xfe-c364] {
          display: none
        }
      }

      .home-page-wrapper[_ngcontent-xfe-c364] .prev-btn[_ngcontent-xfe-c364]:after {
        content: "";
        display: inline-block;
        height: .3em;
        width: .3em;
        border-style: solid;
        border-width: .05em .05em 0 0;
        transform: rotate(225deg)
      }

      .home-page-wrapper[_ngcontent-xfe-c364] .prev-btn[_ngcontent-xfe-c364]:after {
        left: 1.15em;
        position: relative;
        font-size: 2rem;
        top: 1rem
      }

      [_nghost-xfe-c364] sm-list-page-item {
        min-width: 10.25rem;
        max-width: 10.25rem
      }

      [_nghost-xfe-c364] sm-list-page-item .mdc-card {
        border-radius: 8px
      }

      [_nghost-xfe-c364] .mat-mdc-tab-group {
        flex-direction: row !important
      }

      [_nghost-xfe-c364] .mat-mdc-tab-labels {
        flex-direction: column !important
      }

      [_nghost-xfe-c364] .mat-mdc-tab {
        justify-content: start;
        padding-left: 1rem;
        margin-bottom: 1rem;
        margin-right: 6rem
      }

      [_nghost-xfe-c364] .mdc-tab--active .mdc-tab-indicator {
        position: absolute;
        left: 0;
        bottom: 0;
        top: 0 !important;
        width: .3rem;
        height: 100%;
        background-color: var(--brandColorPrimary700)
      }

      [_nghost-xfe-c364] .mdc-tab--active .mdc-tab-indicator__content {
        opacity: 0
      }

      [_nghost-xfe-c364] .mdc-tab__text-label {
        margin: 0
      }

      [_nghost-xfe-c364] .mat-mdc-tab-body-content {
        display: flex;
        gap: 1.5rem;
        overflow-y: scroll;
        scrollbar-width: none;
        -ms-overflow-style: none
      }

      [_nghost-xfe-c364] .mat-mdc-tab-body-content .container-wrapper .fade-out {
        top: 0 !important
      }

      [_nghost-xfe-c364] .mat-mdc-tab-body-content::-webkit-scrollbar {
        width: 0;
        height: 0
      }

      [_nghost-xfe-c364] .mat-mdc-tab-body-wrapper {
        width: 100%
      }

      [_nghost-xfe-c364] sm-special-discount-product-card.list-item>mat-card>fe-product-image {
        flex: unset
      }

      [_nghost-xfe-c364] .vertical .mat-mdc-tab-body-wrapper {
        margin: auto;
        width: 20rem
      }

      @media (max-width: 768px) {
        [_nghost-xfe-c364] .vertical .mat-mdc-tab-body-wrapper {
          width: 19rem
        }
      }

      [_nghost-xfe-c364] .vertical .fade-out {
        display: none
      }

      [_nghost-xfe-c364] .vertical .next-btn {
        display: block !important
      }

      [_nghost-xfe-c364] .vertical .prev-btn {
        display: block !important
      }
    </style>
    <meta http-equiv="origin-trial" content="A4oIpR6f5aUXFRMbL6t6qaMk4lrHWxcV3DcrzORsA9sEsIk1FBRMFzzhfMNLuUpokZH40FV8s7iiXtt/729v8A4AAACFeyJvcmlnaW4iOiJodHRwczovL3d3dy5nb29nbGV0YWdtYW5hZ2VyLmNvbTo0NDMiLCJmZWF0dXJlIjoiQXR0cmlidXRpb25SZXBvcnRpbmdDcm9zc0FwcFdlYiIsImV4cGlyeSI6MTcxNDUyMTU5OSwiaXNUaGlyZFBhcnR5Ijp0cnVlfQ==">
    <script attributionsrc="" type="text/javascript" async="" src="https://www.googleadservices.com/pagead/conversion/715674769/?random=1709166833090&amp;cv=11&amp;fst=1709166833090&amp;bg=ffffff&amp;guid=ON&amp;async=1&amp;gtm=45be42q1v889281616z8811483837za201&amp;gcs=G111&amp;gcd=13n3n3l3l5&amp;dma=0&amp;u_w=1366&amp;u_h=768&amp;url=https%3A%2F%2Fwww.migros.com.tr%2Fby-izzet-antep-fistigi-200-g-p-7b7052&amp;label=-1&amp;hn=www.googleadservices.com&amp;frm=0&amp;tiba=By%20%C4%B0zzet%20Antep%20F%C4%B1st%C4%B1%C4%9F%C4%B1%20200%20G%20-%20Migros&amp;value=129.90&amp;bttype=purchase&amp;npa=0&amp;pscdl=noapi&amp;auid=37027196.1709149487&amp;uaa=x86&amp;uab=64&amp;uafvl=Chromium%3B122.0.6261.69%7CNot(A%253ABrand%3B24.0.0.0%7CGoogle%2520Chrome%3B122.0.6261.69&amp;uamb=0&amp;uap=Windows&amp;uapv=10.0.0&amp;uaw=0&amp;fledge=1&amp;capi=1&amp;rfmt=3&amp;fmt=4"></script>
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

      .popover-wrapper[_ngcontent-xfe-c381] {
        position: relative;
        margin-top: 1.5rem;
        display: inline-block;
        z-index: 3
      }

      .popover-content[_ngcontent-xfe-c381] {
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
        .popover-content[_ngcontent-xfe-c381] {
          left: -5rem
        }
      }

      .popover-content[_ngcontent-xfe-c381] form[_ngcontent-xfe-c381] {
        width: 100%
      }

      .popover-content[_ngcontent-xfe-c381] form[_ngcontent-xfe-c381] textarea[_ngcontent-xfe-c381] {
        font-size: .75rem;
        width: 100%;
        border: none;
        outline: none;
        resize: none
      }

      .popover-actions[_ngcontent-xfe-c381] {
        float: right;
        display: block
      }

      .popover-actions[_ngcontent-xfe-c381] button[_ngcontent-xfe-c381] {
        height: -moz-fit-content;
        height: fit-content
      }

      .popover-actions[_ngcontent-xfe-c381] button[disabled][_ngcontent-xfe-c381] {
        color: #00000029
      }
    </style>
    <meta http-equiv="origin-trial" content="A4oIpR6f5aUXFRMbL6t6qaMk4lrHWxcV3DcrzORsA9sEsIk1FBRMFzzhfMNLuUpokZH40FV8s7iiXtt/729v8A4AAACFeyJvcmlnaW4iOiJodHRwczovL3d3dy5nb29nbGV0YWdtYW5hZ2VyLmNvbTo0NDMiLCJmZWF0dXJlIjoiQXR0cmlidXRpb25SZXBvcnRpbmdDcm9zc0FwcFdlYiIsImV4cGlyeSI6MTcxNDUyMTU5OSwiaXNUaGlyZFBhcnR5Ijp0cnVlfQ==">
    <script attributionsrc="" type="text/javascript" async="" src="https://www.googleadservices.com/pagead/conversion/998405030/?random=1709166833273&amp;cv=11&amp;fst=1709166833273&amp;bg=ffffff&amp;guid=ON&amp;async=1&amp;gtm=45be42q1v9138091728z8811483837za201&amp;gcs=G111&amp;gcd=13n3n3l3l5&amp;dma=0&amp;u_w=1366&amp;u_h=768&amp;url=https%3A%2F%2Fwww.migros.com.tr%2Fby-izzet-antep-fistigi-200-g-p-7b7052&amp;label=5cnGCM2yxfMCEKbnidwD&amp;hn=www.googleadservices.com&amp;frm=0&amp;tiba=By%20%C4%B0zzet%20Antep%20F%C4%B1st%C4%B1%C4%9F%C4%B1%20200%20G%20-%20Migros&amp;value=129.90&amp;bttype=purchase&amp;npa=0&amp;pscdl=noapi&amp;auid=37027196.1709149487&amp;uaa=x86&amp;uab=64&amp;uafvl=Chromium%3B122.0.6261.69%7CNot(A%253ABrand%3B24.0.0.0%7CGoogle%2520Chrome%3B122.0.6261.69&amp;uamb=0&amp;uap=Windows&amp;uapv=10.0.0&amp;uaw=0&amp;fledge=1&amp;capi=1&amp;rfmt=3&amp;fmt=4"></script>
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

      [_nghost-xfe-c347] {
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

      [_nghost-xfe-c347] .cart-dropdown-wrapper[_ngcontent-xfe-c347] {
        max-height: 310px;
        overflow-y: scroll;
        margin-bottom: 4rem
      }

      [_nghost-xfe-c347] .cart-dropdown-wrapper[_ngcontent-xfe-c347] .minimum-amount-basket-wrapper[_ngcontent-xfe-c347] {
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

      [_nghost-xfe-c347] .cart-dropdown-wrapper[_ngcontent-xfe-c347] .minimum-amount-basket-wrapper[_ngcontent-xfe-c347] .minimum-amount-wrapper[_ngcontent-xfe-c347] {
        margin-right: 1rem;
        min-width: 200px
      }

      [_nghost-xfe-c347] .cart-dropdown-wrapper[_ngcontent-xfe-c347] .minimum-amount-basket-wrapper[_ngcontent-xfe-c347] .minimum-amount-wrapper[_ngcontent-xfe-c347] .icon-text-wrapper[_ngcontent-xfe-c347] {
        display: flex;
        align-items: center;
        text-align: left
      }

      [_nghost-xfe-c347] .cart-dropdown-wrapper[_ngcontent-xfe-c347] .minimum-amount-basket-wrapper[_ngcontent-xfe-c347] .minimum-amount-wrapper[_ngcontent-xfe-c347] fa-icon[_ngcontent-xfe-c347] {
        font-size: 1.3rem
      }

      [_nghost-xfe-c347] .cart-dropdown-wrapper[_ngcontent-xfe-c347] .minimum-amount-basket-wrapper[_ngcontent-xfe-c347] .minimum-amount-wrapper[_ngcontent-xfe-c347] span[_ngcontent-xfe-c347] {
        margin-left: .5rem
      }

      [_nghost-xfe-c347] .cart-dropdown-wrapper[_ngcontent-xfe-c347] .minimum-amount-basket-wrapper[_ngcontent-xfe-c347] .minimum-amount-wrapper[_ngcontent-xfe-c347] .amount-bar-wrapper[_ngcontent-xfe-c347] {
        width: 100%;
        height: .625rem;
        margin: .5rem .875rem 0 0;
        border-radius: 8.5px;
        background-color: var(--basicColor300)
      }

      [_nghost-xfe-c347] .cart-dropdown-wrapper[_ngcontent-xfe-c347] .minimum-amount-basket-wrapper[_ngcontent-xfe-c347] .minimum-amount-wrapper[_ngcontent-xfe-c347] .amount-bar-wrapper[_ngcontent-xfe-c347] .amount-bar[_ngcontent-xfe-c347] {
        width: 0;
        transition: width .2s ease-in-out 0s;
        height: 100%;
        border-radius: 8.5px;
        background-color: var(--systemColorSuccess600)
      }

      [_nghost-xfe-c347] .cart-dropdown-wrapper[_ngcontent-xfe-c347] .minimum-amount-basket-wrapper[_ngcontent-xfe-c347] button[_ngcontent-xfe-c347] {
        border-radius: 5px;
        background-color: var(--brandColorPrimary700);
        height: 3rem;
        width: 100%;
        color: #fff;
        border: none;
        cursor: pointer;
        outline: none
      }

      .mion[_nghost-xfe-c347] .minimum-amount-basket-wrapper[_ngcontent-xfe-c347] button[_ngcontent-xfe-c347],
      .mion [_nghost-xfe-c347] .minimum-amount-basket-wrapper[_ngcontent-xfe-c347] button[_ngcontent-xfe-c347] {
        color: var(--basicColor950) !important
      }
    </style>
    <style>
      .cart-dropdown-item[_ngcontent-xfe-c346] {
        display: flex;
        margin: 0 0 1rem;
        padding-right: .75rem
      }

      .cart-dropdown-item[_ngcontent-xfe-c346] fe-product-image[_ngcontent-xfe-c346] {
        border-radius: 8px;
        border: solid 1px rgba(0, 0, 0, .12);
        min-width: 4.875rem;
        min-height: 4.875rem;
        padding: .25rem;
        margin-right: 1rem
      }

      .cart-dropdown-item[_ngcontent-xfe-c346] .detail-wrapper[_ngcontent-xfe-c346] {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        width: 100%
      }

      .cart-dropdown-item[_ngcontent-xfe-c346] .detail-wrapper[_ngcontent-xfe-c346] .name-delete-wrapper[_ngcontent-xfe-c346] {
        display: flex;
        align-items: center;
        justify-content: space-between;
        color: var(--basicColor900)
      }

      .cart-dropdown-item[_ngcontent-xfe-c346] .detail-wrapper[_ngcontent-xfe-c346] .name-delete-wrapper[_ngcontent-xfe-c346] .delete-button[_ngcontent-xfe-c346] {
        cursor: pointer;
        color: var(--basicColor400);
        margin-bottom: .35rem
      }

      .cart-dropdown-item[_ngcontent-xfe-c346] .detail-wrapper[_ngcontent-xfe-c346] .actions-price-wrapper[_ngcontent-xfe-c346] {
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

      [_nghost-xfe-c163] {
        display: block
      }

      h1[_ngcontent-xfe-c163] {
        font: inherit;
        color: inherit
      }

      .migros[_ngcontent-xfe-c163] {
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

      .text-decoration-ellipsis[_ngcontent-xfe-c163] {
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        text-overflow: ellipsis
      }

      .yemek[_nghost-xfe-c163] h1[_ngcontent-xfe-c163],
      .yemek [_nghost-xfe-c163] h1[_ngcontent-xfe-c163] {
        pointer-events: none
      }
    </style>
    <style>
      .product-labels[_ngcontent-xfe-c344] {
        display: flex;
        grid-gap: .5rem;
        padding: .5rem 0
      }

      .product-labels[_ngcontent-xfe-c344] .product-label[_ngcontent-xfe-c344] {
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

      .product-labels[_ngcontent-xfe-c344] .product-label.cross[_ngcontent-xfe-c344] {
        color: var(--systemColorSuccess600);
        background-color: var(--systemColorSuccess50)
      }

      .product-labels[_ngcontent-xfe-c344] .product-label.special[_ngcontent-xfe-c344] {
        color: var(--basicColorWhite);
        background-color: #c93d5a
      }

      .product-labels[_ngcontent-xfe-c344] .product-label.price[_ngcontent-xfe-c344] {
        color: var(--basicColor900);
        background-color: #fdf2b7
      }

      .product-labels[_ngcontent-xfe-c344] .product-label.new[_ngcontent-xfe-c344] {
        color: var(--systemColorSuccess600);
        background-color: #f0fadc
      }

      .product-labels[_ngcontent-xfe-c344] .product-label.tamim[_ngcontent-xfe-c344] {
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
    <meta name="robots" content="noindex">
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

      .header-wrapper[_ngcontent-xfe-c375] {
        border-bottom: 1px solid rgba(0, 0, 0, .12)
      }

      .header-wrapper[_ngcontent-xfe-c375] .logo-container[_ngcontent-xfe-c375] {
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
        .header-wrapper[_ngcontent-xfe-c375] .logo-container[_ngcontent-xfe-c375] {
          padding: 0 7rem
        }
      }

      @media (min-width: 1440px) {
        .header-wrapper[_ngcontent-xfe-c375] .logo-container[_ngcontent-xfe-c375] {
          padding: 0 11rem
        }
      }

      @media (min-width: 1600px) {
        .header-wrapper[_ngcontent-xfe-c375] .logo-container[_ngcontent-xfe-c375] {
          padding: 0 18rem
        }
      }

      @media (min-width: 1800px) {
        .header-wrapper[_ngcontent-xfe-c375] .logo-container[_ngcontent-xfe-c375] {
          padding: 0 23rem
        }
      }

      .header-wrapper[_ngcontent-xfe-c375] .logo-container.invisible[_ngcontent-xfe-c375] {
        visibility: hidden
      }

      .header-wrapper[_ngcontent-xfe-c375] .logo-container.sanalmarket[_ngcontent-xfe-c375] {
        background-image: url(/assets/logos/sanalmarket/sanalmarket-logo.svg)
      }

      @media (max-width: 576px) {
        .header-wrapper[_ngcontent-xfe-c375] .logo-container.sanalmarket[_ngcontent-xfe-c375] {
          background-image: url(/assets/logos/sanalmarket/sanalmarket-logo-mobile.svg);
          background-size: unset;
          width: 5rem
        }
      }

      .header-wrapper[_ngcontent-xfe-c375] .logo-container.elektronik[_ngcontent-xfe-c375] {
        background-image: url(/assets/logos/elektronik/ekstra-logo.svg);
        width: 7rem
      }

      @media (max-width: 576px) {
        .header-wrapper[_ngcontent-xfe-c375] .logo-container.elektronik[_ngcontent-xfe-c375] {
          background-image: url(/assets/logos/elektronik/ekstra-logo-mobile.png);
          background-size: unset;
          width: 5rem
        }
      }

      .header-wrapper[_ngcontent-xfe-c375] .logo-container.kurban[_ngcontent-xfe-c375] {
        background-image: url(/assets/logos/kurban/kurban-logo.svg);
        width: 7rem
      }

      @media (max-width: 576px) {
        .header-wrapper[_ngcontent-xfe-c375] .logo-container.kurban[_ngcontent-xfe-c375] {
          background-image: url(/assets/logos/kurban/kurban-logo-mobile.svg);
          background-size: unset
        }
      }

      .header-wrapper[_ngcontent-xfe-c375] .logo-container.yemek[_ngcontent-xfe-c375] {
        background-image: url(/assets/logos/yemek/yemek-logo.svg);
        background-size: 10rem
      }

      @media (max-width: 576px) {
        .header-wrapper[_ngcontent-xfe-c375] .logo-container.yemek[_ngcontent-xfe-c375] {
          background-size: 6rem
        }
      }

      .header-wrapper[_ngcontent-xfe-c375] .logo-container.hemen[_ngcontent-xfe-c375] {
        background-image: url(/assets/logos/hemen/hemen-logo.svg);
        width: 7rem
      }

      @media (max-width: 576px) {
        .header-wrapper[_ngcontent-xfe-c375] .logo-container.hemen[_ngcontent-xfe-c375] {
          background-size: unset;
          width: 5rem
        }
      }

      .header-wrapper[_ngcontent-xfe-c375] .logo-container.mion[_ngcontent-xfe-c375] {
        background-image: url(/assets/logos/mion/mion-logo.svg);
        background-size: 5rem
      }

      @media (max-width: 576px) {
        .header-wrapper[_ngcontent-xfe-c375] .logo-container.mion[_ngcontent-xfe-c375] {
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
      .card[_ngcontent-xfe-c396] {
        border-radius: .5rem;
        box-shadow: none;
        margin-bottom: 1rem;
        background-color: #ffc2003d
      }

      .card[_ngcontent-xfe-c396] .container[_ngcontent-xfe-c396] {
        align-items: center;
        display: flex;
        padding: .75rem
      }

      .card[_ngcontent-xfe-c396] .container[_ngcontent-xfe-c396] .image[_ngcontent-xfe-c396] {
        height: 32px;
        margin-right: .75rem;
        width: 36px
      }

      .card[_ngcontent-xfe-c396] .container[_ngcontent-xfe-c396] .description[_ngcontent-xfe-c396] {
        font-size: .75rem;
        width: -moz-fit-content;
        width: fit-content
      }

      .card[_ngcontent-xfe-c396] .sm-free-delivery[_ngcontent-xfe-c396] {
        border-radius: .5rem;
        border: 1px solid #c1edc7;
        background: #e3fde6;
        color: var(--systemColorSuccess600)
      }
    </style>
    <style>
      [_nghost-xfe-c259] {
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
      .confirm-button[_ngcontent-xfe-c257] {
        margin-top: 1rem;
        width: 100%;
        height: auto;
        padding: 1rem
      }
    </style>
    <style>
      [_nghost-xfe-c256] {
        display: block
      }

      .container[_ngcontent-xfe-c256] {
        box-shadow: none;
        border: solid 1px rgba(0, 0, 0, .12);
        border-radius: .5rem
      }

      .summary[_ngcontent-xfe-c256] {
        display: grid;
        grid-template-columns: repeat(2, max-content);
        row-gap: 1rem;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem
      }

      .summary-content[_ngcontent-xfe-c256],
      .discounts[_ngcontent-xfe-c256] {
        grid-column: 1/3;
        display: grid;
        grid-template-columns: repeat(2, max-content);
        row-gap: .75rem;
        justify-content: space-between
      }

      .summary-content[_ngcontent-xfe-c256] p[_ngcontent-xfe-c256],
      .discounts[_ngcontent-xfe-c256] p[_ngcontent-xfe-c256] {
        margin: 0
      }

      .summary-content[_ngcontent-xfe-c256] p[_ngcontent-xfe-c256]:nth-child(even),
      .discounts[_ngcontent-xfe-c256] p[_ngcontent-xfe-c256]:nth-child(even) {
        text-align: right
      }

      .discounts[_ngcontent-xfe-c256] {
        color: var(--systemColorSuccess600)
      }

      .discounts[_ngcontent-xfe-c256] p[_ngcontent-xfe-c256]:first-child {
        max-width: 200px
      }

      .delivery-price[_ngcontent-xfe-c256] {
        flex-direction: row;
        justify-content: space-between;
        display: grid;
        grid-column: 1/3;
        grid-template-areas: 1/3;
        grid-auto-flow: column
      }

      .free[_ngcontent-xfe-c256] {
        margin-left: .25rem
      }

      .side-payment[_ngcontent-xfe-c256] {
        display: flex;
        align-items: center
      }

      .side-payment[_ngcontent-xfe-c256] button[_ngcontent-xfe-c256] {
        text-decoration: underline;
        height: auto
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
      .alternative-product-choice-container[_ngcontent-xfe-c380] {
        position: relative;
        border: solid 1px rgba(0, 0, 0, .12);
        border-radius: .5rem;
        padding: 1rem;
        margin-top: 1rem
      }

      .content[_ngcontent-xfe-c380] {
        display: inline-flex
      }

      .content[_ngcontent-xfe-c380] fa-icon[_ngcontent-xfe-c380] {
        font-size: 1.5rem
      }

      .content[_ngcontent-xfe-c380] .description[_ngcontent-xfe-c380] {
        margin-left: .65rem
      }

      .content[_ngcontent-xfe-c380] .description[_ngcontent-xfe-c380] button[_ngcontent-xfe-c380] {
        height: -moz-fit-content;
        height: fit-content;
        padding: .125rem;
        font-size: .75rem
      }

      .content[_ngcontent-xfe-c380] .sub-caption[_ngcontent-xfe-c380] {
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
      [_nghost-xfe-c143] {
        display: block;
        overflow: hidden;
        width: 100%;
        height: 100%
      }

      .flickity-enabled[_ngcontent-xfe-c143] {
        position: relative
      }

      .flickity-enabled[_ngcontent-xfe-c143]:focus {
        outline: none
      }

      .carousel[_ngcontent-xfe-c143] {
        display: flex;
        justify-content: center;
        width: 100%;
        margin-right: .675rem
      }

      .carousel[_ngcontent-xfe-c143] figure[_ngcontent-xfe-c143] {
        min-height: 320px;
        display: flex;
        justify-content: center;
        flex-direction: column;
        margin: auto
      }

      .carousel[_ngcontent-xfe-c143] img[_ngcontent-xfe-c143] {
        cursor: zoom-in;
        max-width: 100%;
        max-height: 35vh
      }

      .any-carousel[_ngcontent-xfe-c143] .carousel[_ngcontent-xfe-c143] {
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

      [_nghost-xfe-c363] {
        display: block
      }

      [_nghost-xfe-c363] fe-product-labels .product-labels {
        padding: .25rem;
        gap: .125rem;
        flex-wrap: wrap
      }

      mat-card[_ngcontent-xfe-c363] {
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
        mat-card[_ngcontent-xfe-c363] {
          width: 20rem
        }
      }

      mat-card[_ngcontent-xfe-c363] fe-product-image[_ngcontent-xfe-c363] {
        max-width: 5.5rem;
        max-height: 5.5rem;
        min-width: 5.5rem;
        min-height: 5.5rem
      }

      mat-card[_ngcontent-xfe-c363] .info[_ngcontent-xfe-c363] {
        flex: 2 2 auto;
        margin-left: .5rem
      }

      mat-card[_ngcontent-xfe-c363] .info[_ngcontent-xfe-c363] p[_ngcontent-xfe-c363] {
        cursor: pointer;
        margin-bottom: 0;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        text-overflow: ellipsis
      }

      mat-card[_ngcontent-xfe-c363] .info[_ngcontent-xfe-c363] .price[_ngcontent-xfe-c363] {
        bottom: .6rem;
        left: 6.5rem;
        position: absolute
      }

      mat-card[_ngcontent-xfe-c363] .info.small-text[_ngcontent-xfe-c363] p[_ngcontent-xfe-c363] {
        font-size: .725rem
      }

      mat-card[_ngcontent-xfe-c363] sm-product-actions[_ngcontent-xfe-c363] {
        flex-grow: 1;
        align-self: flex-end;
        position: absolute;
        bottom: .75rem;
        right: .75rem
      }
    </style>
    <style>
      [_nghost-xfe-c394] {
        display: block
      }

      .side-banner-card[_ngcontent-xfe-c394] {
        padding: 1rem 0;
        border-radius: 8px;
        border: solid 1px rgba(0, 0, 0, .12);
        box-shadow: none
      }

      .side-banner-card[_ngcontent-xfe-c394] .title[_ngcontent-xfe-c394] {
        margin-bottom: 1rem;
        display: block
      }

      .side-banner-card[_ngcontent-xfe-c394] .header[_ngcontent-xfe-c394],
      .side-banner-card[_ngcontent-xfe-c394] .action[_ngcontent-xfe-c394] {
        padding: 0 1rem
      }

      .side-banner-card[_ngcontent-xfe-c394] img[_ngcontent-xfe-c394] {
        max-height: 12.5rem;
        width: 100%;
        cursor: pointer
      }

      .side-banner-card[_ngcontent-xfe-c394] button[_ngcontent-xfe-c394] {
        margin-top: 1rem;
        width: 100%;
        height: auto;
        padding: 1rem
      }
    </style>
    <script attributionsrc="" type="text/javascript" async="" src="https://www.googleadservices.com/pagead/conversion/715674769/?random=1709166845134&amp;cv=11&amp;fst=1709166845134&amp;bg=ffffff&amp;guid=ON&amp;async=1&amp;gtm=45be42q1v889281616z8811483837za201&amp;gcs=G111&amp;gcd=13n3n3l3l5&amp;dma=0&amp;u_w=1366&amp;u_h=768&amp;url=https%3A%2F%2Fwww.migros.com.tr%2Fsepetim&amp;label=-1&amp;hn=www.googleadservices.com&amp;frm=0&amp;tiba=Migros&amp;value=129.90&amp;bttype=purchase&amp;npa=0&amp;pscdl=noapi&amp;auid=37027196.1709149487&amp;uaa=x86&amp;uab=64&amp;uafvl=Chromium%3B122.0.6261.69%7CNot(A%253ABrand%3B24.0.0.0%7CGoogle%2520Chrome%3B122.0.6261.69&amp;uamb=0&amp;uap=Windows&amp;uapv=10.0.0&amp;uaw=0&amp;fledge=1&amp;capi=1&amp;rfmt=3&amp;fmt=4"></script>
    <script attributionsrc="" type="text/javascript" async="" src="https://www.googleadservices.com/pagead/conversion/998405030/?random=1709166845175&amp;cv=11&amp;fst=1709166845175&amp;bg=ffffff&amp;guid=ON&amp;async=1&amp;gtm=45be42q1v9138091728z8811483837za201&amp;gcs=G111&amp;gcd=13n3n3l3l5&amp;dma=0&amp;u_w=1366&amp;u_h=768&amp;url=https%3A%2F%2Fwww.migros.com.tr%2Fsepetim&amp;label=5cnGCM2yxfMCEKbnidwD&amp;hn=www.googleadservices.com&amp;frm=0&amp;tiba=Migros&amp;value=129.90&amp;bttype=purchase&amp;npa=0&amp;pscdl=noapi&amp;auid=37027196.1709149487&amp;uaa=x86&amp;uab=64&amp;uafvl=Chromium%3B122.0.6261.69%7CNot(A%253ABrand%3B24.0.0.0%7CGoogle%2520Chrome%3B122.0.6261.69&amp;uamb=0&amp;uap=Windows&amp;uapv=10.0.0&amp;uaw=0&amp;fledge=1&amp;capi=1&amp;rfmt=3&amp;fmt=4"></script>
    <style>
      fa-icon[_ngcontent-xfe-c306] {
        float: right;
        padding: 1.5rem .5rem;
        font-size: 1.25rem
      }

      .mdc-dialog__content[_ngcontent-xfe-c306] {
        text-align: center
      }

      .mdc-dialog__content[_ngcontent-xfe-c306] .info[_ngcontent-xfe-c306] {
        margin: 1.5rem 0
      }

      .mdc-dialog__content[_ngcontent-xfe-c306] .anonymous-option-divider[_ngcontent-xfe-c306] {
        margin: 1rem 0
      }

      .mdc-dialog__content[_ngcontent-xfe-c306] .continue-without-register[_ngcontent-xfe-c306] {
        margin-bottom: -2.5rem;
        color: var(--basicColor600) !important
      }

      .mdc-dialog__content[_ngcontent-xfe-c306] button[_ngcontent-xfe-c306] {
        width: 100%;
        height: 3.15rem;
        margin-bottom: 1rem
      }
    </style>
  </head>
  <body class="mat-typography" style="">
    <sm-root _nghost-xfe-c377="" ng-version="14.2.10">
      <div _ngcontent-xfe-c377="" class="grid sanalmarket">
        <sm-header-lite _ngcontent-xfe-c377="" _nghost-xfe-c375="" class="ng-star-inserted">
          <div _ngcontent-xfe-c375="" class="header-wrapper">
            <div _ngcontent-xfe-c375="" class="desktop-only">
              <sm-additonal-order _ngcontent-xfe-c375="" _nghost-xfe-c355="" class="ng-star-inserted">
                <!---->
                <!---->
                <!---->
              </sm-additonal-order>
              <!---->
              <!---->
            </div>
            <div _ngcontent-xfe-c375="" class="logo-container sanalmarket"></div>
            <div _ngcontent-xfe-c375="" class="mobile-only">
              <sm-additonal-order _ngcontent-xfe-c375="" _nghost-xfe-c355="" class="ng-star-inserted">
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
        <main _ngcontent-xfe-c377="" class="sanalmarket">
          <router-outlet _ngcontent-xfe-c377=""></router-outlet>
          <sm-product>
            <article>
              <router-outlet></router-outlet>
              <sm-cart-page class="ng-star-inserted">
                <div class="cart-page ng-star-inserted">
                  <sm-special-discount id="sepetinize-ozel-firsatlar">
                    <div class="special-discounts ng-star-inserted">
                      <mat-expansion-panel class="mat-expansion-panel ng-tns-c97-18 mat-expanded ng-star-inserted">
                        <mat-expansion-panel-header role="button" id="mat-expansion-panel-header-1" class="mat-expansion-panel-header mat-focus-indicator ng-tns-c98-19 ng-tns-c97-18 mat-expanded ng-star-inserted" tabindex="0" aria-controls="cdk-accordion-child-1" aria-expanded="true" aria-disabled="false">
                          <span class="mat-content ng-tns-c98-19">
                            <span class="text-color-success subtitle-2 special-discounts-header ng-tns-c98-19">
                              <span class="special-discounts-header-classic">Sepetine Özel Fırsatlar </span>
                              <span class="special-discounts-header-vwo">Bugüne Özel Fırsatlar </span>
                              <span class="ng-star-inserted">(65 ürün)</span>
                              <!---->
                            </span>
                          </span>
                          <span class="mat-expansion-indicator ng-tns-c98-19 ng-trigger ng-trigger-indicatorRotate ng-star-inserted" style="transform: rotate(180deg);"></span>
                          <!---->
                        </mat-expansion-panel-header>
                        <div role="region" class="mat-expansion-panel-content ng-tns-c97-18 ng-trigger ng-trigger-bodyExpansion" id="cdk-accordion-child-1" aria-labelledby="mat-expansion-panel-header-1" style="visibility: visible;">
                          <div class="mat-expansion-panel-body ng-tns-c97-18">
                            <mat-tab-group animationduration="0" class="mat-mdc-tab-group mat-primary ng-tns-c97-18 mat-mdc-tab-group-stretch-tabs">
                              <mat-tab-header class="mat-mdc-tab-header mat-mdc-tab-header-pagination-controls-enabled">
                                <button aria-hidden="true" type="button" mat-ripple="" tabindex="-1" class="mat-ripple mat-mdc-tab-header-pagination mat-mdc-tab-header-pagination-before mat-mdc-tab-header-pagination-disabled" disabled="">
                                  <div class="mat-mdc-tab-header-pagination-chevron"></div>
                                </button>
                                <div class="mat-mdc-tab-label-container">
                                  <div role="tablist" class="mat-mdc-tab-list" style="transform: translateX(0px);">
                                    <div class="mat-mdc-tab-labels">
                                      <div role="tab" mattablabelwrapper="" cdkmonitorelementfocus="" class="mdc-tab mat-mdc-tab mat-mdc-focus-indicator mdc-tab--active ng-star-inserted mdc-tab-indicator--active" id="mat-tab-label-7-0" tabindex="0" aria-posinset="1" aria-setsize="9" aria-controls="mat-tab-content-7-0" aria-selected="true" aria-disabled="false" style="">
                                        <span class="mdc-tab__ripple"></span>
                                        <div mat-ripple="" class="mat-ripple mat-mdc-tab-ripple"></div>
                                        <span class="mdc-tab__content">
                                          <span class="mdc-tab__text-label">Seç - Al Ürünleri!
                                            <!---->
                                            <!---->
                                            <!---->
                                          </span>
                                        </span>
                                        <span class="mdc-tab-indicator">
                                          <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline" style=""></span>
                                        </span>
                                      </div>
                                      <div role="tab" mattablabelwrapper="" cdkmonitorelementfocus="" class="mdc-tab mat-mdc-tab mat-mdc-focus-indicator ng-star-inserted" id="mat-tab-label-7-1" tabindex="-1" aria-posinset="2" aria-setsize="9" aria-controls="mat-tab-content-7-1" aria-selected="false" aria-disabled="false" style="">
                                        <span class="mdc-tab__ripple"></span>
                                        <div mat-ripple="" class="mat-ripple mat-mdc-tab-ripple"></div>
                                        <span class="mdc-tab__content">
                                          <span class="mdc-tab__text-label">Migros Sanal Market'e Özel Fırsatlar!
                                            <!---->
                                            <!---->
                                            <!---->
                                          </span>
                                        </span>
                                        <span class="mdc-tab-indicator">
                                          <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                                        </span>
                                      </div>
                                      <div role="tab" mattablabelwrapper="" cdkmonitorelementfocus="" class="mdc-tab mat-mdc-tab mat-mdc-focus-indicator ng-star-inserted" id="mat-tab-label-7-2" tabindex="-1" aria-posinset="3" aria-setsize="9" aria-controls="mat-tab-content-7-2" aria-selected="false" aria-disabled="false" style="">
                                        <span class="mdc-tab__ripple"></span>
                                        <div mat-ripple="" class="mat-ripple mat-mdc-tab-ripple"></div>
                                        <span class="mdc-tab__content">
                                          <span class="mdc-tab__text-label">Bakmadan Geçme!
                                            <!---->
                                            <!---->
                                            <!---->
                                          </span>
                                        </span>
                                        <span class="mdc-tab-indicator">
                                          <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                                        </span>
                                      </div>
                                      <div role="tab" mattablabelwrapper="" cdkmonitorelementfocus="" class="mdc-tab mat-mdc-tab mat-mdc-focus-indicator ng-star-inserted" id="mat-tab-label-7-3" tabindex="-1" aria-posinset="4" aria-setsize="9" aria-controls="mat-tab-content-7-3" aria-selected="false" aria-disabled="false" style="">
                                        <span class="mdc-tab__ripple"></span>
                                        <div mat-ripple="" class="mat-ripple mat-mdc-tab-ripple"></div>
                                        <span class="mdc-tab__content">
                                          <span class="mdc-tab__text-label">Uni Baby Fırsatları!
                                            <!---->
                                            <!---->
                                            <!---->
                                          </span>
                                        </span>
                                        <span class="mdc-tab-indicator">
                                          <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                                        </span>
                                      </div>
                                      <div role="tab" mattablabelwrapper="" cdkmonitorelementfocus="" class="mdc-tab mat-mdc-tab mat-mdc-focus-indicator ng-star-inserted" id="mat-tab-label-7-4" tabindex="-1" aria-posinset="5" aria-setsize="9" aria-controls="mat-tab-content-7-4" aria-selected="false" aria-disabled="false" style="">
                                        <span class="mdc-tab__ripple"></span>
                                        <div mat-ripple="" class="mat-ripple mat-mdc-tab-ripple"></div>
                                        <span class="mdc-tab__content">
                                          <span class="mdc-tab__text-label">L'Oreal Ürünlerinde Fırsatlar!
                                            <!---->
                                            <!---->
                                            <!---->
                                          </span>
                                        </span>
                                        <span class="mdc-tab-indicator">
                                          <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                                        </span>
                                      </div>
                                      <div role="tab" mattablabelwrapper="" cdkmonitorelementfocus="" class="mdc-tab mat-mdc-tab mat-mdc-focus-indicator ng-star-inserted" id="mat-tab-label-7-5" tabindex="-1" aria-posinset="6" aria-setsize="9" aria-controls="mat-tab-content-7-5" aria-selected="false" aria-disabled="false" style="">
                                        <span class="mdc-tab__ripple"></span>
                                        <div mat-ripple="" class="mat-ripple mat-mdc-tab-ripple"></div>
                                        <span class="mdc-tab__content">
                                          <span class="mdc-tab__text-label">Sütaş Ürünlerinde Fırsatlar!
                                            <!---->
                                            <!---->
                                            <!---->
                                          </span>
                                        </span>
                                        <span class="mdc-tab-indicator">
                                          <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                                        </span>
                                      </div>
                                      <div role="tab" mattablabelwrapper="" cdkmonitorelementfocus="" class="mdc-tab mat-mdc-tab mat-mdc-focus-indicator ng-star-inserted" id="mat-tab-label-7-6" tabindex="-1" aria-posinset="7" aria-setsize="9" aria-controls="mat-tab-content-7-6" aria-selected="false" aria-disabled="false" style="">
                                        <span class="mdc-tab__ripple"></span>
                                        <div mat-ripple="" class="mat-ripple mat-mdc-tab-ripple"></div>
                                        <span class="mdc-tab__content">
                                          <span class="mdc-tab__text-label">Knorr Ürünlerinde Fırsatlar!
                                            <!---->
                                            <!---->
                                            <!---->
                                          </span>
                                        </span>
                                        <span class="mdc-tab-indicator">
                                          <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                                        </span>
                                      </div>
                                      <div role="tab" mattablabelwrapper="" cdkmonitorelementfocus="" class="mdc-tab mat-mdc-tab mat-mdc-focus-indicator ng-star-inserted" id="mat-tab-label-7-7" tabindex="-1" aria-posinset="8" aria-setsize="9" aria-controls="mat-tab-content-7-7" aria-selected="false" aria-disabled="false" style="">
                                        <span class="mdc-tab__ripple"></span>
                                        <div mat-ripple="" class="mat-ripple mat-mdc-tab-ripple"></div>
                                        <span class="mdc-tab__content">
                                          <span class="mdc-tab__text-label">Barilla Makarnalarda Fırsat!
                                            <!---->
                                            <!---->
                                            <!---->
                                          </span>
                                        </span>
                                        <span class="mdc-tab-indicator">
                                          <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                                        </span>
                                      </div>
                                      <div role="tab" mattablabelwrapper="" cdkmonitorelementfocus="" class="mdc-tab mat-mdc-tab mat-mdc-focus-indicator ng-star-inserted" id="mat-tab-label-7-8" tabindex="-1" aria-posinset="9" aria-setsize="9" aria-controls="mat-tab-content-7-8" aria-selected="false" aria-disabled="false" style="">
                                        <span class="mdc-tab__ripple"></span>
                                        <div mat-ripple="" class="mat-ripple mat-mdc-tab-ripple"></div>
                                        <span class="mdc-tab__content">
                                          <span class="mdc-tab__text-label">Starbucks Ürünlerinde Fırsat!
                                            <!---->
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
                                <button aria-hidden="true" type="button" mat-ripple="" tabindex="-1" class="mat-ripple mat-mdc-tab-header-pagination mat-mdc-tab-header-pagination-after">
                                  <div class="mat-mdc-tab-header-pagination-chevron"></div>
                                </button>
                              </mat-tab-header>
                              <div class="mat-mdc-tab-body-wrapper">
                                <mat-tab-body role="tabpanel" class="mat-mdc-tab-body ng-tns-c229-20 mat-mdc-tab-body-active ng-star-inserted" id="mat-tab-content-7-0" aria-labelledby="mat-tab-label-7-0" style="">
                                  <div cdkscrollable="" class="mat-mdc-tab-body-content ng-tns-c229-20 ng-trigger ng-trigger-translateTab" style="transform: none;">
                                    <div class="special-discounts-info ng-star-inserted" style="">
                                      <span class="subtitle-2 text-color-black">Seç - Al Ürünleri!</span>
                                      <p class="mat-caption-normal text-color-grey">23 Şubat - 3 Mart tarihleri arasında mağaza stoklarıyla sınırlıdır. İndirimli fiyatlar ve tüm kampanyalar Money Kart veya Money Bonus ile yapılan alışverişlerde geçerlidir.</p>
                                    </div>
                                    <fe-carousel type="any" padding="0 1rem" _nghost-xfe-c143="" class="ng-star-inserted" style="">
                                      <div _ngcontent-xfe-c143="" class="carousel-container any-carousel flickity-enabled is-draggable" tabindex="0" style="padding: 0px 1rem;">
                                        <!---->
                                        <div class="flickity-viewport" style="height: 140.795px; touch-action: pan-y;">
                                          <div class="flickity-slider" style="left: 0px; transform: translateX(0%);">
                                            <div _ngcontent-xfe-c143="" class="carousel ng-star-inserted is-selected" style="position: absolute; left: 0px; transform: translateX(0%);">
                                              <!---->
                                              <div _ngcontent-xfe-c143="" class="ng-star-inserted">
                                                <sm-special-discount-product-card fegtm="" class="carousel-item ng-star-inserted" _nghost-xfe-c363="" data-product-id="20000016290723">
                                                  <mat-card _ngcontent-xfe-c363="" class="mat-mdc-card mdc-card">
                                                    <fe-product-image _ngcontent-xfe-c363="" _nghost-xfe-c162="">
                                                      <a _ngcontent-xfe-c162="" id="product-image-link" href="/heinz-ketcap-700-g-p-f893a3">
                                                        <img _ngcontent-xfe-c162="" felazyload="" alt="Heinz Ketçap 700 G" src="https://images.migrosone.com/sanalmarket/product/16290723/16290723-0ac563-105x105.jpg" class="ng-star-inserted">
                                                        <!---->
                                                        <!---->
                                                      </a>
                                                    </fe-product-image>
                                                    <div _ngcontent-xfe-c363="" class="info">
                                                      <p _ngcontent-xfe-c363="" class="mat-caption" tabindex="0" ngx-ql=""> Heinz Ketçap 700 G </p>
                                                      <fe-product-labels _ngcontent-xfe-c363="" _nghost-xfe-c344="">
                                                        <div _ngcontent-xfe-c344="" class="product-labels ng-star-inserted">
                                                          <!---->
                                                          <!---->
                                                          <fe-crm-discount-badge _ngcontent-xfe-c344="" _nghost-xfe-c343="">
                                                            <div _ngcontent-xfe-c343="" class="crm-badge overline ng-star-inserted">
                                                              <img _ngcontent-xfe-c343="" src="https://www.migros.com.tr/assets/icons/badges/crm-badge.svg" alt="crm-badge-icon">25 TL'LİK SEPETTE 44,9 TL
                                                            </div>
                                                            <!---->
                                                          </fe-crm-discount-badge>
                                                        </div>
                                                        <!---->
                                                      </fe-product-labels>
                                                      <div _ngcontent-xfe-c363="" class="price">
                                                        <fe-product-price _ngcontent-xfe-c363="" _nghost-xfe-c275="">
                                                          <div _ngcontent-xfe-c275="">
                                                            <!---->
                                                            <div _ngcontent-xfe-c275="" id="price-new" class="price-new subtitle-1 price-new-only">
                                                              <span _ngcontent-xfe-c275="" id="new-amount" class="amount"> 73,90 <span _ngcontent-xfe-c275="" class="currency">TL</span>
                                                              </span>
                                                            </div>
                                                          </div>
                                                          <!---->
                                                        </fe-product-price>
                                                      </div>
                                                    </div>
                                                    <sm-product-actions _ngcontent-xfe-c363="" _nghost-xfe-c345="">
                                                      <!---->
                                                      <fa-icon _ngcontent-xfe-c345="" class="ng-fa-icon add-to-cart-button ng-star-inserted" id="product-actions-add-to-cart-button--">
                                                        <svg role="img" aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus" class="svg-inline--fa fa-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                          <path fill="currentColor" d="M432 256C432 269.3 421.3 280 408 280h-160v160c0 13.25-10.75 24.01-24 24.01S200 453.3 200 440v-160h-160c-13.25 0-24-10.74-24-23.99C16 242.8 26.75 232 40 232h160v-160c0-13.25 10.75-23.99 24-23.99S248 58.75 248 72v160h160C421.3 232 432 242.8 432 256z"></path>
                                                        </svg>
                                                      </fa-icon>
                                                      <!---->
                                                      <!---->
                                                    </sm-product-actions>
                                                  </mat-card>
                                                </sm-special-discount-product-card>
                                                <!---->
                                              </div>
                                              <!---->
                                            </div>
                                            <div _ngcontent-xfe-c143="" class="carousel ng-star-inserted is-selected" style="position: absolute; left: 0px; transform: translateX(103.38%);">
                                              <!---->
                                              <div _ngcontent-xfe-c143="" class="ng-star-inserted">
                                                <sm-special-discount-product-card fegtm="" class="carousel-item ng-star-inserted" _nghost-xfe-c363="" data-product-id="20000016011999">
                                                  <mat-card _ngcontent-xfe-c363="" class="mat-mdc-card mdc-card">
                                                    <fe-product-image _ngcontent-xfe-c363="" _nghost-xfe-c162="">
                                                      <a _ngcontent-xfe-c162="" id="product-image-link" href="/cem-dogal-yagli-siyah-sele-zeytin-291-350-800-g-p-f452df">
                                                        <img _ngcontent-xfe-c162="" felazyload="" alt="Cem Doğal Yağlı Siyah Sele Zeytin 291-350 800 G" src="https://images.migrosone.com/sanalmarket/product/16011999/16011999-c6a266-105x105.jpg" class="ng-star-inserted">
                                                        <!---->
                                                        <!---->
                                                      </a>
                                                    </fe-product-image>
                                                    <div _ngcontent-xfe-c363="" class="info">
                                                      <p _ngcontent-xfe-c363="" class="mat-caption" tabindex="0" ngx-ql=""> Cem Doğal Yağlı Siyah Sele Zeytin 291-350 800 G </p>
                                                      <fe-product-labels _ngcontent-xfe-c363="" _nghost-xfe-c344="">
                                                        <div _ngcontent-xfe-c344="" class="product-labels ng-star-inserted">
                                                          <!---->
                                                          <!---->
                                                          <fe-crm-discount-badge _ngcontent-xfe-c344="" _nghost-xfe-c343="">
                                                            <div _ngcontent-xfe-c343="" class="crm-badge overline ng-star-inserted">
                                                              <img _ngcontent-xfe-c343="" src="https://www.migros.com.tr/assets/icons/badges/crm-badge.svg" alt="crm-badge-icon">25 TL'LİK SEPETTE 119 TL
                                                            </div>
                                                            <!---->
                                                          </fe-crm-discount-badge>
                                                        </div>
                                                        <!---->
                                                      </fe-product-labels>
                                                      <div _ngcontent-xfe-c363="" class="price">
                                                        <fe-product-price _ngcontent-xfe-c363="" _nghost-xfe-c275="">
                                                          <div _ngcontent-xfe-c275="">
                                                            <!---->
                                                            <div _ngcontent-xfe-c275="" id="price-new" class="price-new subtitle-1 price-new-only">
                                                              <span _ngcontent-xfe-c275="" id="new-amount" class="amount"> 165,00 <span _ngcontent-xfe-c275="" class="currency">TL</span>
                                                              </span>
                                                            </div>
                                                          </div>
                                                          <!---->
                                                        </fe-product-price>
                                                      </div>
                                                    </div>
                                                    <sm-product-actions _ngcontent-xfe-c363="" _nghost-xfe-c345="">
                                                      <!---->
                                                      <fa-icon _ngcontent-xfe-c345="" class="ng-fa-icon add-to-cart-button ng-star-inserted" id="product-actions-add-to-cart-button--">
                                                        <svg role="img" aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus" class="svg-inline--fa fa-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                          <path fill="currentColor" d="M432 256C432 269.3 421.3 280 408 280h-160v160c0 13.25-10.75 24.01-24 24.01S200 453.3 200 440v-160h-160c-13.25 0-24-10.74-24-23.99C16 242.8 26.75 232 40 232h160v-160c0-13.25 10.75-23.99 24-23.99S248 58.75 248 72v160h160C421.3 232 432 242.8 432 256z"></path>
                                                        </svg>
                                                      </fa-icon>
                                                      <!---->
                                                      <!---->
                                                    </sm-product-actions>
                                                  </mat-card>
                                                </sm-special-discount-product-card>
                                                <!---->
                                              </div>
                                              <!---->
                                            </div>
                                            <div _ngcontent-xfe-c143="" class="carousel ng-star-inserted" aria-hidden="true" style="position: absolute; left: 0px; transform: translateX(206.75%);">
                                              <!---->
                                              <div _ngcontent-xfe-c143="" class="ng-star-inserted">
                                                <sm-special-discount-product-card fegtm="" class="carousel-item ng-star-inserted" _nghost-xfe-c363="" data-product-id="20000007011050">
                                                  <mat-card _ngcontent-xfe-c363="" class="mat-mdc-card mdc-card">
                                                    <fe-product-image _ngcontent-xfe-c363="" _nghost-xfe-c162="">
                                                      <a _ngcontent-xfe-c162="" id="product-image-link" href="/ulker-potibor-biskuvi-450-g-p-6afaea">
                                                        <img _ngcontent-xfe-c162="" felazyload="" alt="Ülker Pötibör Bisküvi 450 G" src="https://images.migrosone.com/sanalmarket/product/07011050/07011050-52b3b2-105x105.jpg" class="ng-star-inserted">
                                                        <!---->
                                                        <!---->
                                                      </a>
                                                    </fe-product-image>
                                                    <div _ngcontent-xfe-c363="" class="info">
                                                      <p _ngcontent-xfe-c363="" class="mat-caption" tabindex="0" ngx-ql=""> Ülker Pötibör Bisküvi 450 G </p>
                                                      <fe-product-labels _ngcontent-xfe-c363="" _nghost-xfe-c344="">
                                                        <div _ngcontent-xfe-c344="" class="product-labels ng-star-inserted">
                                                          <!---->
                                                          <!---->
                                                          <fe-crm-discount-badge _ngcontent-xfe-c344="" _nghost-xfe-c343="">
                                                            <div _ngcontent-xfe-c343="" class="crm-badge overline ng-star-inserted">
                                                              <img _ngcontent-xfe-c343="" src="https://www.migros.com.tr/assets/icons/badges/crm-badge.svg" alt="crm-badge-icon">25 TL'LİK SEPETTE 25,90 TL
                                                            </div>
                                                            <!---->
                                                          </fe-crm-discount-badge>
                                                        </div>
                                                        <!---->
                                                      </fe-product-labels>
                                                      <div _ngcontent-xfe-c363="" class="price">
                                                        <fe-product-price _ngcontent-xfe-c363="" _nghost-xfe-c275="">
                                                          <div _ngcontent-xfe-c275="">
                                                            <!---->
                                                            <div _ngcontent-xfe-c275="" id="price-new" class="price-new subtitle-1 price-new-only">
                                                              <span _ngcontent-xfe-c275="" id="new-amount" class="amount"> 42,50 <span _ngcontent-xfe-c275="" class="currency">TL</span>
                                                              </span>
                                                            </div>
                                                          </div>
                                                          <!---->
                                                        </fe-product-price>
                                                      </div>
                                                    </div>
                                                    <sm-product-actions _ngcontent-xfe-c363="" _nghost-xfe-c345="">
                                                      <!---->
                                                      <fa-icon _ngcontent-xfe-c345="" class="ng-fa-icon add-to-cart-button ng-star-inserted" id="product-actions-add-to-cart-button--">
                                                        <svg role="img" aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus" class="svg-inline--fa fa-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                          <path fill="currentColor" d="M432 256C432 269.3 421.3 280 408 280h-160v160c0 13.25-10.75 24.01-24 24.01S200 453.3 200 440v-160h-160c-13.25 0-24-10.74-24-23.99C16 242.8 26.75 232 40 232h160v-160c0-13.25 10.75-23.99 24-23.99S248 58.75 248 72v160h160C421.3 232 432 242.8 432 256z"></path>
                                                        </svg>
                                                      </fa-icon>
                                                      <!---->
                                                      <!---->
                                                    </sm-product-actions>
                                                  </mat-card>
                                                </sm-special-discount-product-card>
                                                <!---->
                                              </div>
                                              <!---->
                                            </div>
                                            <div _ngcontent-xfe-c143="" class="carousel ng-star-inserted" aria-hidden="true" style="position: absolute; left: 0px; transform: translateX(310.13%);">
                                              <!---->
                                              <div _ngcontent-xfe-c143="" class="ng-star-inserted">
                                                <sm-special-discount-product-card fegtm="" class="carousel-item ng-star-inserted" _nghost-xfe-c363="" data-product-id="20000031020070">
                                                  <mat-card _ngcontent-xfe-c363="" class="mat-mdc-card mdc-card">
                                                    <fe-product-image _ngcontent-xfe-c363="" _nghost-xfe-c162="">
                                                      <a _ngcontent-xfe-c162="" id="product-image-link" href="/selpak-yag-emici-havlu-8li-p-1d95426">
                                                        <img _ngcontent-xfe-c162="" felazyload="" alt="Selpak Yağ Emici Havlu 8'li" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAKCAYAAABrGwT5AAAAF0lEQVR42mN89uzxfwYyAeOo5lHNhAAA7jIk17T4Y6wAAAAASUVORK5CYII=" class="ng-star-inserted">
                                                        <!---->
                                                        <!---->
                                                      </a>
                                                    </fe-product-image>
                                                    <div _ngcontent-xfe-c363="" class="info">
                                                      <p _ngcontent-xfe-c363="" class="mat-caption" tabindex="0" ngx-ql=""> Selpak Yağ Emici Havlu 8'li </p>
                                                      <fe-product-labels _ngcontent-xfe-c363="" _nghost-xfe-c344="">
                                                        <div _ngcontent-xfe-c344="" class="product-labels ng-star-inserted">
                                                          <!---->
                                                          <!---->
                                                          <fe-crm-discount-badge _ngcontent-xfe-c344="" _nghost-xfe-c343="">
                                                            <div _ngcontent-xfe-c343="" class="crm-badge overline ng-star-inserted">
                                                              <img _ngcontent-xfe-c343="" src="https://www.migros.com.tr/assets/icons/badges/crm-badge.svg" alt="crm-badge-icon">25 TL'LİK SEPETTE 74,9 TL
                                                            </div>
                                                            <!---->
                                                          </fe-crm-discount-badge>
                                                        </div>
                                                        <!---->
                                                      </fe-product-labels>
                                                      <div _ngcontent-xfe-c363="" class="price">
                                                        <fe-product-price _ngcontent-xfe-c363="" _nghost-xfe-c275="">
                                                          <div _ngcontent-xfe-c275="">
                                                            <!---->
                                                            <div _ngcontent-xfe-c275="" id="price-new" class="price-new subtitle-1 price-new-only">
                                                              <span _ngcontent-xfe-c275="" id="new-amount" class="amount"> 159,90 <span _ngcontent-xfe-c275="" class="currency">TL</span>
                                                              </span>
                                                            </div>
                                                          </div>
                                                          <!---->
                                                        </fe-product-price>
                                                      </div>
                                                    </div>
                                                    <sm-product-actions _ngcontent-xfe-c363="" _nghost-xfe-c345="">
                                                      <!---->
                                                      <fa-icon _ngcontent-xfe-c345="" class="ng-fa-icon add-to-cart-button ng-star-inserted" id="product-actions-add-to-cart-button--">
                                                        <svg role="img" aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus" class="svg-inline--fa fa-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                          <path fill="currentColor" d="M432 256C432 269.3 421.3 280 408 280h-160v160c0 13.25-10.75 24.01-24 24.01S200 453.3 200 440v-160h-160c-13.25 0-24-10.74-24-23.99C16 242.8 26.75 232 40 232h160v-160c0-13.25 10.75-23.99 24-23.99S248 58.75 248 72v160h160C421.3 232 432 242.8 432 256z"></path>
                                                        </svg>
                                                      </fa-icon>
                                                      <!---->
                                                      <!---->
                                                    </sm-product-actions>
                                                  </mat-card>
                                                </sm-special-discount-product-card>
                                                <!---->
                                              </div>
                                              <!---->
                                            </div>
                                            <div _ngcontent-xfe-c143="" class="carousel ng-star-inserted" aria-hidden="true" style="position: absolute; left: 0px; transform: translateX(413.5%);">
                                              <!---->
                                              <div _ngcontent-xfe-c143="" class="ng-star-inserted">
                                                <sm-special-discount-product-card fegtm="" class="carousel-item ng-star-inserted" _nghost-xfe-c363="" data-product-id="20000008059442">
                                                  <mat-card _ngcontent-xfe-c363="" class="mat-mdc-card mdc-card">
                                                    <fe-product-image _ngcontent-xfe-c363="" _nghost-xfe-c162="">
                                                      <a _ngcontent-xfe-c162="" id="product-image-link" href="/lipton-ice-tea-seftali-light-sekersiz-kutu-6x330-ml-p-7afa32">
                                                        <img _ngcontent-xfe-c162="" felazyload="" alt="Lipton Ice Tea Şeftali Light Şekersiz Kutu 6x330 Ml" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAKCAYAAABrGwT5AAAAF0lEQVR42mN89uzxfwYyAeOo5lHNhAAA7jIk17T4Y6wAAAAASUVORK5CYII=" class="ng-star-inserted">
                                                        <!---->
                                                        <!---->
                                                      </a>
                                                    </fe-product-image>
                                                    <div _ngcontent-xfe-c363="" class="info">
                                                      <p _ngcontent-xfe-c363="" class="mat-caption" tabindex="0" ngx-ql=""> Lipton Ice Tea Şeftali Light Şekersiz Kutu 6x330 Ml </p>
                                                      <fe-product-labels _ngcontent-xfe-c363="" _nghost-xfe-c344="">
                                                        <div _ngcontent-xfe-c344="" class="product-labels ng-star-inserted">
                                                          <!---->
                                                          <!---->
                                                          <fe-crm-discount-badge _ngcontent-xfe-c344="" _nghost-xfe-c343="">
                                                            <div _ngcontent-xfe-c343="" class="crm-badge overline ng-star-inserted">
                                                              <img _ngcontent-xfe-c343="" src="https://www.migros.com.tr/assets/icons/badges/crm-badge.svg" alt="crm-badge-icon">25 TL'LİK SEPETTE 65 TL
                                                            </div>
                                                            <!---->
                                                          </fe-crm-discount-badge>
                                                        </div>
                                                        <!---->
                                                      </fe-product-labels>
                                                      <div _ngcontent-xfe-c363="" class="price">
                                                        <fe-product-price _ngcontent-xfe-c363="" _nghost-xfe-c275="">
                                                          <div _ngcontent-xfe-c275="">
                                                            <!---->
                                                            <div _ngcontent-xfe-c275="" id="price-new" class="price-new subtitle-1 price-new-only">
                                                              <span _ngcontent-xfe-c275="" id="new-amount" class="amount"> 108,50 <span _ngcontent-xfe-c275="" class="currency">TL</span>
                                                              </span>
                                                            </div>
                                                          </div>
                                                          <!---->
                                                        </fe-product-price>
                                                      </div>
                                                    </div>
                                                    <sm-product-actions _ngcontent-xfe-c363="" _nghost-xfe-c345="">
                                                      <!---->
                                                      <fa-icon _ngcontent-xfe-c345="" class="ng-fa-icon add-to-cart-button ng-star-inserted" id="product-actions-add-to-cart-button--">
                                                        <svg role="img" aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus" class="svg-inline--fa fa-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                          <path fill="currentColor" d="M432 256C432 269.3 421.3 280 408 280h-160v160c0 13.25-10.75 24.01-24 24.01S200 453.3 200 440v-160h-160c-13.25 0-24-10.74-24-23.99C16 242.8 26.75 232 40 232h160v-160c0-13.25 10.75-23.99 24-23.99S248 58.75 248 72v160h160C421.3 232 432 242.8 432 256z"></path>
                                                        </svg>
                                                      </fa-icon>
                                                      <!---->
                                                      <!---->
                                                    </sm-product-actions>
                                                  </mat-card>
                                                </sm-special-discount-product-card>
                                                <!---->
                                              </div>
                                              <!---->
                                            </div>
                                            <div _ngcontent-xfe-c143="" class="carousel ng-star-inserted" aria-hidden="true" style="position: absolute; left: 0px; transform: translateX(516.87%);">
                                              <!---->
                                              <div _ngcontent-xfe-c143="" class="ng-star-inserted">
                                                <sm-special-discount-product-card fegtm="" class="carousel-item ng-star-inserted" _nghost-xfe-c363="" data-product-id="20000011019904">
                                                  <mat-card _ngcontent-xfe-c363="" class="mat-mdc-card mdc-card">
                                                    <fe-product-image _ngcontent-xfe-c363="" _nghost-xfe-c162="">
                                                      <a _ngcontent-xfe-c162="" id="product-image-link" href="/torku-uht-sut-1-l-p-a82680">
                                                        <img _ngcontent-xfe-c162="" felazyload="" alt="Torku Uht Süt 1 L" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAKCAYAAABrGwT5AAAAF0lEQVR42mN89uzxfwYyAeOo5lHNhAAA7jIk17T4Y6wAAAAASUVORK5CYII=" class="ng-star-inserted">
                                                        <!---->
                                                        <!---->
                                                      </a>
                                                    </fe-product-image>
                                                    <div _ngcontent-xfe-c363="" class="info">
                                                      <p _ngcontent-xfe-c363="" class="mat-caption" tabindex="0" ngx-ql=""> Torku Uht Süt 1 L </p>
                                                      <fe-product-labels _ngcontent-xfe-c363="" _nghost-xfe-c344="">
                                                        <div _ngcontent-xfe-c344="" class="product-labels ng-star-inserted">
                                                          <!---->
                                                          <!---->
                                                          <fe-crm-discount-badge _ngcontent-xfe-c344="" _nghost-xfe-c343="">
                                                            <div _ngcontent-xfe-c343="" class="crm-badge overline ng-star-inserted">
                                                              <img _ngcontent-xfe-c343="" src="https://www.migros.com.tr/assets/icons/badges/crm-badge.svg" alt="crm-badge-icon">25 TL'LİK SEPETTE 26,9 TL
                                                            </div>
                                                            <!---->
                                                          </fe-crm-discount-badge>
                                                        </div>
                                                        <!---->
                                                      </fe-product-labels>
                                                      <div _ngcontent-xfe-c363="" class="price">
                                                        <fe-product-price _ngcontent-xfe-c363="" _nghost-xfe-c275="">
                                                          <div _ngcontent-xfe-c275="">
                                                            <!---->
                                                            <div _ngcontent-xfe-c275="" id="price-new" class="price-new subtitle-1 price-new-only">
                                                              <span _ngcontent-xfe-c275="" id="new-amount" class="amount"> 48,95 <span _ngcontent-xfe-c275="" class="currency">TL</span>
                                                              </span>
                                                            </div>
                                                          </div>
                                                          <!---->
                                                        </fe-product-price>
                                                      </div>
                                                    </div>
                                                    <sm-product-actions _ngcontent-xfe-c363="" _nghost-xfe-c345="">
                                                      <!---->
                                                      <fa-icon _ngcontent-xfe-c345="" class="ng-fa-icon add-to-cart-button ng-star-inserted" id="product-actions-add-to-cart-button--">
                                                        <svg role="img" aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus" class="svg-inline--fa fa-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                          <path fill="currentColor" d="M432 256C432 269.3 421.3 280 408 280h-160v160c0 13.25-10.75 24.01-24 24.01S200 453.3 200 440v-160h-160c-13.25 0-24-10.74-24-23.99C16 242.8 26.75 232 40 232h160v-160c0-13.25 10.75-23.99 24-23.99S248 58.75 248 72v160h160C421.3 232 432 242.8 432 256z"></path>
                                                        </svg>
                                                      </fa-icon>
                                                      <!---->
                                                      <!---->
                                                    </sm-product-actions>
                                                  </mat-card>
                                                </sm-special-discount-product-card>
                                                <!---->
                                              </div>
                                              <!---->
                                            </div>
                                            <div _ngcontent-xfe-c143="" class="carousel ng-star-inserted" aria-hidden="true" style="position: absolute; left: 0px; transform: translateX(620.25%);">
                                              <!---->
                                              <div _ngcontent-xfe-c143="" class="ng-star-inserted">
                                                <sm-special-discount-product-card fegtm="" class="carousel-item ng-star-inserted" _nghost-xfe-c363="" data-product-id="20000029789919">
                                                  <mat-card _ngcontent-xfe-c363="" class="mat-mdc-card mdc-card">
                                                    <fe-product-image _ngcontent-xfe-c363="" _nghost-xfe-c162="">
                                                      <a _ngcontent-xfe-c162="" id="product-image-link" href="/dove-nemlendirici-sivi-sabun-caring-14-nemlendirici-krem-etkili-450-ml-p-1c68edf">
                                                        <img _ngcontent-xfe-c162="" felazyload="" alt="Dove Nemlendirici Sıvı Sabun Caring 1/4 Nemlendirici Krem Etkili 450 ml" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAKCAYAAABrGwT5AAAAF0lEQVR42mN89uzxfwYyAeOo5lHNhAAA7jIk17T4Y6wAAAAASUVORK5CYII=" class="ng-star-inserted">
                                                        <!---->
                                                        <!---->
                                                      </a>
                                                    </fe-product-image>
                                                    <div _ngcontent-xfe-c363="" class="info">
                                                      <p _ngcontent-xfe-c363="" class="mat-caption" tabindex="0" ngx-ql=""> Dove Nemlendirici Sıvı Sabun Caring 1/4 Nemlendirici Krem Etkili 450 ml </p>
                                                      <fe-product-labels _ngcontent-xfe-c363="" _nghost-xfe-c344="">
                                                        <div _ngcontent-xfe-c344="" class="product-labels ng-star-inserted">
                                                          <div _ngcontent-xfe-c344="" class="price product-label ng-star-inserted">
                                                            <span _ngcontent-xfe-c344="">İndirimli Ürün</span>
                                                          </div>
                                                          <!---->
                                                          <!---->
                                                          <fe-crm-discount-badge _ngcontent-xfe-c344="" _nghost-xfe-c343="">
                                                            <div _ngcontent-xfe-c343="" class="crm-badge overline ng-star-inserted">
                                                              <img _ngcontent-xfe-c343="" src="https://www.migros.com.tr/assets/icons/badges/crm-badge.svg" alt="crm-badge-icon">25 TL'LİK SEPETTE 49,9 TL
                                                            </div>
                                                            <!---->
                                                          </fe-crm-discount-badge>
                                                        </div>
                                                        <!---->
                                                      </fe-product-labels>
                                                      <div _ngcontent-xfe-c363="" class="price">
                                                        <fe-product-price _ngcontent-xfe-c363="" _nghost-xfe-c275="">
                                                          <div _ngcontent-xfe-c275="" class="promotion-wrapper">
                                                            <div _ngcontent-xfe-c275="" id="price-old" class="price-old ng-star-inserted">
                                                              <span _ngcontent-xfe-c275="" id="old-amount" class="amount">119,90 <span _ngcontent-xfe-c275="" class="currency">TL</span>
                                                              </span>
                                                            </div>
                                                            <!---->
                                                            <div _ngcontent-xfe-c275="" id="price-new" class="price-new subtitle-1">
                                                              <span _ngcontent-xfe-c275="" id="new-amount" class="amount"> 109,90 <span _ngcontent-xfe-c275="" class="currency">TL</span>
                                                              </span>
                                                            </div>
                                                          </div>
                                                          <!---->
                                                        </fe-product-price>
                                                      </div>
                                                    </div>
                                                    <sm-product-actions _ngcontent-xfe-c363="" _nghost-xfe-c345="">
                                                      <!---->
                                                      <fa-icon _ngcontent-xfe-c345="" class="ng-fa-icon add-to-cart-button ng-star-inserted" id="product-actions-add-to-cart-button--">
                                                        <svg role="img" aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus" class="svg-inline--fa fa-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                          <path fill="currentColor" d="M432 256C432 269.3 421.3 280 408 280h-160v160c0 13.25-10.75 24.01-24 24.01S200 453.3 200 440v-160h-160c-13.25 0-24-10.74-24-23.99C16 242.8 26.75 232 40 232h160v-160c0-13.25 10.75-23.99 24-23.99S248 58.75 248 72v160h160C421.3 232 432 242.8 432 256z"></path>
                                                        </svg>
                                                      </fa-icon>
                                                      <!---->
                                                      <!---->
                                                    </sm-product-actions>
                                                  </mat-card>
                                                </sm-special-discount-product-card>
                                                <!---->
                                              </div>
                                              <!---->
                                            </div>
                                            <div _ngcontent-xfe-c143="" class="carousel ng-star-inserted" aria-hidden="true" style="position: absolute; left: 0px; transform: translateX(723.63%);">
                                              <!---->
                                              <div _ngcontent-xfe-c143="" class="ng-star-inserted">
                                                <sm-special-discount-product-card fegtm="" class="carousel-item ng-star-inserted" _nghost-xfe-c363="" data-product-id="20000029780014">
                                                  <mat-card _ngcontent-xfe-c363="" class="mat-mdc-card mdc-card">
                                                    <fe-product-image _ngcontent-xfe-c363="" _nghost-xfe-c162="">
                                                      <a _ngcontent-xfe-c162="" id="product-image-link" href="/dove-care-rituals-limited-edition-sivi-sabun-450-ml-p-1c6682e">
                                                        <img _ngcontent-xfe-c162="" felazyload="" alt="Dove Care Rituals Limited Edition Sıvı Sabun 450 Ml" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAKCAYAAABrGwT5AAAAF0lEQVR42mN89uzxfwYyAeOo5lHNhAAA7jIk17T4Y6wAAAAASUVORK5CYII=" class="ng-star-inserted">
                                                        <!---->
                                                        <!---->
                                                      </a>
                                                    </fe-product-image>
                                                    <div _ngcontent-xfe-c363="" class="info">
                                                      <p _ngcontent-xfe-c363="" class="mat-caption" tabindex="0" ngx-ql=""> Dove Care Rituals Limited Edition Sıvı Sabun 450 Ml </p>
                                                      <fe-product-labels _ngcontent-xfe-c363="" _nghost-xfe-c344="">
                                                        <div _ngcontent-xfe-c344="" class="product-labels ng-star-inserted">
                                                          <div _ngcontent-xfe-c344="" class="price product-label ng-star-inserted">
                                                            <span _ngcontent-xfe-c344="">İndirimli Ürün</span>
                                                          </div>
                                                          <!---->
                                                          <!---->
                                                          <fe-crm-discount-badge _ngcontent-xfe-c344="" _nghost-xfe-c343="">
                                                            <div _ngcontent-xfe-c343="" class="crm-badge overline ng-star-inserted">
                                                              <img _ngcontent-xfe-c343="" src="assets/icons/badges/crm-badge.svg" alt="crm-badge-icon">25 TL'LİK SEPETTE 49,9 TL
                                                            </div>
                                                            <!---->
                                                          </fe-crm-discount-badge>
                                                        </div>
                                                        <!---->
                                                      </fe-product-labels>
                                                      <div _ngcontent-xfe-c363="" class="price">
                                                        <fe-product-price _ngcontent-xfe-c363="" _nghost-xfe-c275="">
                                                          <div _ngcontent-xfe-c275="" class="promotion-wrapper">
                                                            <div _ngcontent-xfe-c275="" id="price-old" class="price-old ng-star-inserted">
                                                              <span _ngcontent-xfe-c275="" id="old-amount" class="amount">119,90 <span _ngcontent-xfe-c275="" class="currency">TL</span>
                                                              </span>
                                                            </div>
                                                            <!---->
                                                            <div _ngcontent-xfe-c275="" id="price-new" class="price-new subtitle-1">
                                                              <span _ngcontent-xfe-c275="" id="new-amount" class="amount"> 109,90 <span _ngcontent-xfe-c275="" class="currency">TL</span>
                                                              </span>
                                                            </div>
                                                          </div>
                                                          <!---->
                                                        </fe-product-price>
                                                      </div>
                                                    </div>
                                                    <sm-product-actions _ngcontent-xfe-c363="" _nghost-xfe-c345="">
                                                      <!---->
                                                      <fa-icon _ngcontent-xfe-c345="" class="ng-fa-icon add-to-cart-button ng-star-inserted" id="product-actions-add-to-cart-button--">
                                                        <svg role="img" aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus" class="svg-inline--fa fa-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                          <path fill="currentColor" d="M432 256C432 269.3 421.3 280 408 280h-160v160c0 13.25-10.75 24.01-24 24.01S200 453.3 200 440v-160h-160c-13.25 0-24-10.74-24-23.99C16 242.8 26.75 232 40 232h160v-160c0-13.25 10.75-23.99 24-23.99S248 58.75 248 72v160h160C421.3 232 432 242.8 432 256z"></path>
                                                        </svg>
                                                      </fa-icon>
                                                      <!---->
                                                      <!---->
                                                    </sm-product-actions>
                                                  </mat-card>
                                                </sm-special-discount-product-card>
                                                <!---->
                                              </div>
                                              <!---->
                                            </div>
                                          </div>
                                        </div>
                                        <button class="flickity-button flickity-prev-next-button previous" type="button" disabled="" aria-label="Previous">
                                          <svg class="flickity-button-icon" viewBox="0 0 100 100">
                                            <path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" class="arrow"></path>
                                          </svg>
                                        </button>
                                        <button class="flickity-button flickity-prev-next-button next" type="button" aria-label="Next">
                                          <svg class="flickity-button-icon" viewBox="0 0 100 100">
                                            <path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" class="arrow" transform="translate(100, 100) rotate(180) "></path>
                                          </svg>
                                        </button>
                                      </div>
                                    </fe-carousel>
                                    <!---->
                                  </div>
                                </mat-tab-body>
                                <mat-tab-body role="tabpanel" class="mat-mdc-tab-body ng-tns-c229-21 ng-star-inserted" id="mat-tab-content-7-1" aria-labelledby="mat-tab-label-7-1" style="">
                                  <div cdkscrollable="" class="mat-mdc-tab-body-content ng-tns-c229-21 ng-trigger ng-trigger-translateTab" style="transform: translate3d(100%, 0px, 0px); min-height: 1px; visibility: hidden;">
                                    <!---->
                                  </div>
                                </mat-tab-body>
                                <mat-tab-body role="tabpanel" class="mat-mdc-tab-body ng-tns-c229-22 ng-star-inserted" id="mat-tab-content-7-2" aria-labelledby="mat-tab-label-7-2" style="">
                                  <div cdkscrollable="" class="mat-mdc-tab-body-content ng-tns-c229-22 ng-trigger ng-trigger-translateTab" style="transform: translate3d(100%, 0px, 0px); min-height: 1px; visibility: hidden;">
                                    <!---->
                                  </div>
                                </mat-tab-body>
                                <mat-tab-body role="tabpanel" class="mat-mdc-tab-body ng-tns-c229-23 ng-star-inserted" id="mat-tab-content-7-3" aria-labelledby="mat-tab-label-7-3" style="">
                                  <div cdkscrollable="" class="mat-mdc-tab-body-content ng-tns-c229-23 ng-trigger ng-trigger-translateTab" style="transform: translate3d(100%, 0px, 0px); min-height: 1px; visibility: hidden;">
                                    <!---->
                                  </div>
                                </mat-tab-body>
                                <mat-tab-body role="tabpanel" class="mat-mdc-tab-body ng-tns-c229-24 ng-star-inserted" id="mat-tab-content-7-4" aria-labelledby="mat-tab-label-7-4" style="">
                                  <div cdkscrollable="" class="mat-mdc-tab-body-content ng-tns-c229-24 ng-trigger ng-trigger-translateTab" style="transform: translate3d(100%, 0px, 0px); min-height: 1px; visibility: hidden;">
                                    <!---->
                                  </div>
                                </mat-tab-body>
                                <mat-tab-body role="tabpanel" class="mat-mdc-tab-body ng-tns-c229-25 ng-star-inserted" id="mat-tab-content-7-5" aria-labelledby="mat-tab-label-7-5" style="">
                                  <div cdkscrollable="" class="mat-mdc-tab-body-content ng-tns-c229-25 ng-trigger ng-trigger-translateTab" style="transform: translate3d(100%, 0px, 0px); min-height: 1px; visibility: hidden;">
                                    <!---->
                                  </div>
                                </mat-tab-body>
                                <mat-tab-body role="tabpanel" class="mat-mdc-tab-body ng-tns-c229-26 ng-star-inserted" id="mat-tab-content-7-6" aria-labelledby="mat-tab-label-7-6" style="">
                                  <div cdkscrollable="" class="mat-mdc-tab-body-content ng-tns-c229-26 ng-trigger ng-trigger-translateTab" style="transform: translate3d(100%, 0px, 0px); min-height: 1px; visibility: hidden;">
                                    <!---->
                                  </div>
                                </mat-tab-body>
                                <mat-tab-body role="tabpanel" class="mat-mdc-tab-body ng-tns-c229-27 ng-star-inserted" id="mat-tab-content-7-7" aria-labelledby="mat-tab-label-7-7" style="">
                                  <div cdkscrollable="" class="mat-mdc-tab-body-content ng-tns-c229-27 ng-trigger ng-trigger-translateTab" style="transform: translate3d(100%, 0px, 0px); min-height: 1px; visibility: hidden;">
                                    <!---->
                                  </div>
                                </mat-tab-body>
                                <mat-tab-body role="tabpanel" class="mat-mdc-tab-body ng-tns-c229-28 ng-star-inserted" id="mat-tab-content-7-8" aria-labelledby="mat-tab-label-7-8" style="">
                                  <div cdkscrollable="" class="mat-mdc-tab-body-content ng-tns-c229-28 ng-trigger ng-trigger-translateTab" style="transform: translate3d(100%, 0px, 0px); min-height: 1px; visibility: hidden;">
                                    <!---->
                                  </div>
                                </mat-tab-body>
                                <!---->
                              </div>
                            </mat-tab-group>
                            <!---->
                          </div>
                        </div>
                      </mat-expansion-panel>
                      <!---->
                    </div>
                    <!---->
                  </sm-special-discount>
                  <div class="cart-container">
                    <div class="mdc-layout-grid__inner ng-star-inserted">
                      <div class="selector mdc-layout-grid__cell--span-8 mdc-layout-grid__cell--span-5-tablet mdc-layout-grid__cell--span-4-phone">
                        <!---->
                        <div class="cart-list-recommandations-container-vwo">
                          <div class="cart-container__header">
                            <h2 id="cart-header" class="text-color-black mat-headline"> Sepetim <span class="mat-body-2 text-color-grey">1 Ürün</span>
                            </h2>
                            <span id="update-cart" class="subtitle-2 update-cart text-color-orange ng-star-inserted"> Sepeti Düzenle </span>
                            <!---->
                          </div>
                          <!---->
                          <div class="product-list list ng-star-inserted">
                            <sm-cart-page-item class="ng-star-inserted">
                              <div class="cart-page-item" id="20000008089682">
                                <fe-product-image _nghost-xfe-c162="" class="ng-star-inserted">
                                  <a _ngcontent-xfe-c162="" id="product-image-link" href="/by-izzet-antep-fistigi-200-g-p-7b7052">
                                    <img _ngcontent-xfe-c162="" felazyload="" alt="By İzzet Antep Fıstığı 200 G" src="<?php echo $urun["resim1"];?>" class="ng-star-inserted">
                                    <!---->
                                    <!---->
                                  </a>
                                </fe-product-image>
                                <!---->
                                <div class="product-name">
                                  <fe-product-name customclass="subtitle-2 text-color-black" _nghost-xfe-c163="">
                                    <h1 _ngcontent-xfe-c163="">
                                      <a _ngcontent-xfe-c163="" class="subtitle-2 text-color-black text-decoration-ellipsis ng-star-inserted"> <?php echo $urun["urunismi"];?> </a>
                                      <!---->
                                      <!---->
                                    </h1>
                                  </fe-product-name>
                                  <fe-product-labels _nghost-xfe-c344="" class="ng-star-inserted">
                                    <div _ngcontent-xfe-c344="" class="product-labels ng-star-inserted">
                                      <div _ngcontent-xfe-c344="" class="price product-label ng-star-inserted">
                                        <span _ngcontent-xfe-c344="">İndirimli Ürün</span>
                                      </div>
                                      <!---->
                                      <!---->
                                      <fe-crm-discount-badge _ngcontent-xfe-c344="" _nghost-xfe-c343="">
                                        <!---->
                                      </fe-crm-discount-badge>
                                    </div>
                                    <!---->
                                  </fe-product-labels>
                                  <!---->
                                  <!---->
                                  <div class="product-price mobile-only">
                                    <sm-product-actions _nghost-xfe-c345="" class="ng-star-inserted">
                                      <div _ngcontent-xfe-c345="" class="product-actions ng-star-inserted">
                                        <button _ngcontent-xfe-c345="" class="product-decrease" id="product-actions-product-decrease--by-izzet-antep-fistigi-200-g-p-7b7052" no-pointer-event="false">
                                          <!---->
                                          <fa-icon _ngcontent-xfe-c345="" class="ng-fa-icon ng-star-inserted">
                                            <svg role="img" aria-hidden="true" focusable="false" data-prefix="far" data-icon="minus" class="svg-inline--fa fa-minus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                              <path fill="currentColor" d="M432 256C432 269.3 421.3 280 408 280H40c-13.25 0-24-10.74-24-23.99C16 242.8 26.75 232 40 232h368C421.3 232 432 242.8 432 256z"></path>
                                            </svg>
                                          </fa-icon>
                                          <!---->
                                        </button>
                                        <div _ngcontent-xfe-c345="" id="product-amount" class="product-amount">
                                          <span _ngcontent-xfe-c345="" class="amount mat-caption">1</span>
                                          <span _ngcontent-xfe-c345="" class="unit text-color-grey">adet</span>
                                        </div>
                                        <button _ngcontent-xfe-c345="" aria-label="Sepetteki ürün sayısını arttır" class="product-increase" id="product-actions-product-increase--by-izzet-antep-fistigi-200-g-p-7b7052">
                                          <fa-icon _ngcontent-xfe-c345="" class="ng-fa-icon">
                                            <svg role="img" aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus" class="svg-inline--fa fa-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                              <path fill="currentColor" d="M432 256C432 269.3 421.3 280 408 280h-160v160c0 13.25-10.75 24.01-24 24.01S200 453.3 200 440v-160h-160c-13.25 0-24-10.74-24-23.99C16 242.8 26.75 232 40 232h160v-160c0-13.25 10.75-23.99 24-23.99S248 58.75 248 72v160h160C421.3 232 432 242.8 432 256z"></path>
                                            </svg>
                                          </fa-icon>
                                        </button>
                                      </div>
                                      <!---->
                                      <!---->
                                      <!---->
                                    </sm-product-actions>
                                    <!---->
                                    <fe-product-price _nghost-xfe-c275="" class="ng-star-inserted">
                                      <div _ngcontent-xfe-c275="" class="promotion-wrapper">
                                        <!---->
                                        <div _ngcontent-xfe-c275="" id="price-new" class="price-new subtitle-1">
                                          <span _ngcontent-xfe-c275="" id="new-amount" class="amount">  <?php echo $urun["fiyat"];?> <span _ngcontent-xfe-c275="" class="currency">TL</span>
                                          </span>
                                        </div>
                                      </div>
                                      <!---->
                                    </fe-product-price>
                                    <!---->
                                  </div>
                                  <div class="actions">
                                    <sm-product-note-popover _nghost-xfe-c381="">
                                      <div _ngcontent-xfe-c381="" id="product-note-popover-add-note" class="popover-wrapper">
                                        <div _ngcontent-xfe-c381="" class="note text-color-grey mat-caption-normal popover-trigger">
                                          <span>
                                            <fa-icon class="ng-fa-icon">
                                              <svg role="img" aria-hidden="true" focusable="false" data-prefix="far" data-icon="pen-to-square" class="svg-inline--fa fa-pen-to-square" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <path fill="currentColor" d="M373.1 24.97C401.2-3.147 446.8-3.147 474.9 24.97L487 37.09C515.1 65.21 515.1 110.8 487 138.9L289.8 336.2C281.1 344.8 270.4 351.1 258.6 354.5L158.6 383.1C150.2 385.5 141.2 383.1 135 376.1C128.9 370.8 126.5 361.8 128.9 353.4L157.5 253.4C160.9 241.6 167.2 230.9 175.8 222.2L373.1 24.97zM440.1 58.91C431.6 49.54 416.4 49.54 407 58.91L377.9 88L424 134.1L453.1 104.1C462.5 95.6 462.5 80.4 453.1 71.03L440.1 58.91zM203.7 266.6L186.9 325.1L245.4 308.3C249.4 307.2 252.9 305.1 255.8 302.2L390.1 168L344 121.9L209.8 256.2C206.9 259.1 204.8 262.6 203.7 266.6zM200 64C213.3 64 224 74.75 224 88C224 101.3 213.3 112 200 112H88C65.91 112 48 129.9 48 152V424C48 446.1 65.91 464 88 464H360C382.1 464 400 446.1 400 424V312C400 298.7 410.7 288 424 288C437.3 288 448 298.7 448 312V424C448 472.6 408.6 512 360 512H88C39.4 512 0 472.6 0 424V152C0 103.4 39.4 64 88 64H200z"></path>
                                              </svg>
                                            </fa-icon> Ürün Notu Ekle
                                          </span>
                                          <!---->
                                        </div>
                                        <!---->
                                      </div>
                                    </sm-product-note-popover>
                                    <div id="cart-page-item-remove" class="remove text-color-grey mat-caption-normal">
                                      <fa-icon class="ng-fa-icon">
                                        <svg role="img" aria-hidden="true" focusable="false" data-prefix="far" data-icon="trash-can" class="svg-inline--fa fa-trash-can" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                          <path fill="currentColor" d="M160 400C160 408.8 152.8 416 144 416C135.2 416 128 408.8 128 400V192C128 183.2 135.2 176 144 176C152.8 176 160 183.2 160 192V400zM240 400C240 408.8 232.8 416 224 416C215.2 416 208 408.8 208 400V192C208 183.2 215.2 176 224 176C232.8 176 240 183.2 240 192V400zM320 400C320 408.8 312.8 416 304 416C295.2 416 288 408.8 288 400V192C288 183.2 295.2 176 304 176C312.8 176 320 183.2 320 192V400zM317.5 24.94L354.2 80H424C437.3 80 448 90.75 448 104C448 117.3 437.3 128 424 128H416V432C416 476.2 380.2 512 336 512H112C67.82 512 32 476.2 32 432V128H24C10.75 128 0 117.3 0 104C0 90.75 10.75 80 24 80H93.82L130.5 24.94C140.9 9.357 158.4 0 177.1 0H270.9C289.6 0 307.1 9.358 317.5 24.94H317.5zM151.5 80H296.5L277.5 51.56C276 49.34 273.5 48 270.9 48H177.1C174.5 48 171.1 49.34 170.5 51.56L151.5 80zM80 432C80 449.7 94.33 464 112 464H336C353.7 464 368 449.7 368 432V128H80V432z"></path>
                                        </svg>
                                      </fa-icon> Sil
                                    </div>
                                  </div>
                                  <!---->
                                </div>
                                <div class="product-price desktop-only">
                                  <fe-product-price _nghost-xfe-c275="" class="ng-star-inserted">
                                    <div _ngcontent-xfe-c275="" class="promotion-wrapper">
                                      <div _ngcontent-xfe-c275="" id="price-old" class="price-old ng-star-inserted">

                                        </span>
                                      </div>
                                      <!---->
                                      <div _ngcontent-xfe-c275="" id="price-new" class="price-new subtitle-1">
                                        <span _ngcontent-xfe-c275="" id="new-amount" class="amount">  <?php echo $urun["fiyat"];?> <span _ngcontent-xfe-c275="" class="currency">TL</span>
                                        </span>
                                      </div>
                                    </div>
                                    <!---->
                                  </fe-product-price>
                                  <!---->
                                  <sm-product-actions _nghost-xfe-c345="" class="ng-star-inserted">
                                    <div _ngcontent-xfe-c345="" class="product-actions ng-star-inserted">
                                      <button _ngcontent-xfe-c345="" class="product-decrease" id="product-actions-product-decrease--by-izzet-antep-fistigi-200-g-p-7b7052" no-pointer-event="false">
                                        <!---->
                                        <fa-icon _ngcontent-xfe-c345="" class="ng-fa-icon ng-star-inserted">
                                          <svg role="img" aria-hidden="true" focusable="false" data-prefix="far" data-icon="minus" class="svg-inline--fa fa-minus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                            <path fill="currentColor" d="M432 256C432 269.3 421.3 280 408 280H40c-13.25 0-24-10.74-24-23.99C16 242.8 26.75 232 40 232h368C421.3 232 432 242.8 432 256z"></path>
                                          </svg>
                                        </fa-icon>
                                        <!---->
                                      </button>
                                      <div _ngcontent-xfe-c345="" id="product-amount" class="product-amount">
                                        <span _ngcontent-xfe-c345="" class="amount mat-caption">1</span>
                                        <span _ngcontent-xfe-c345="" class="unit text-color-grey">adet</span>
                                      </div>
                                      <button _ngcontent-xfe-c345="" aria-label="Sepetteki ürün sayısını arttır" class="product-increase" id="product-actions-product-increase--by-izzet-antep-fistigi-200-g-p-7b7052">
                                        <fa-icon _ngcontent-xfe-c345="" class="ng-fa-icon">
                                          <svg role="img" aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus" class="svg-inline--fa fa-plus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                            <path fill="currentColor" d="M432 256C432 269.3 421.3 280 408 280h-160v160c0 13.25-10.75 24.01-24 24.01S200 453.3 200 440v-160h-160c-13.25 0-24-10.74-24-23.99C16 242.8 26.75 232 40 232h160v-160c0-13.25 10.75-23.99 24-23.99S248 58.75 248 72v160h160C421.3 232 432 242.8 432 256z"></path>
                                          </svg>
                                        </fa-icon>
                                      </button>
                                    </div>
                                    <!---->
                                    <!---->
                                    <!---->
                                  </sm-product-actions>
                                  <!---->
                                </div>
                              </div>
                              <!---->
                              <!---->
                            </sm-cart-page-item>
                            <!---->
                            <!---->
                            <!---->
                          </div>
                          <!---->
                          <sm-alternative-product-choice class="mobile-only ng-star-inserted">
                            <div class="cart-choice-box desktop-only">
                              <div class="header">
                                <span class="subtitle-1 text-color-black title"> Sepetine eklediğin ürünlerden biri bitmişse ne yapalım? </span>
                              </div>
                              <mat-radio-group role="radiogroup" class="mat-mdc-radio-group">
                                <mat-radio-button color="primary" class="mat-mdc-radio-button mat-primary mat-mdc-radio-checked ng-star-inserted" id="up-to-customer">
                                  <div class="mdc-form-field">
                                    <div class="mdc-radio">
                                      <div class="mat-mdc-radio-touch-target"></div>
                                      <input type="radio" class="mdc-radio__native-control" id="up-to-customer-input" name="mat-radio-group-0" value="UP_TO_CUSTOMER" tabindex="0">
                                      <div class="mdc-radio__background">
                                        <div class="mdc-radio__outer-circle"></div>
                                        <div class="mdc-radio__inner-circle"></div>
                                      </div>
                                      <div mat-ripple="" class="mat-ripple mat-radio-ripple mat-mdc-focus-indicator">
                                        <div class="mat-ripple-element mat-radio-persistent-ripple"></div>
                                      </div>
                                    </div>
                                    <label for="up-to-customer-input">
                                      <span class="subtitle-2 text-color-black">Beni arayın</span>
                                      <span class="mat-caption-normal text-color-grey description">Ürünlerden biri bitmişse seni 0850 ile başlayan bir numaradan arayacağız</span>
                                    </label>
                                  </div>
                                </mat-radio-button>
                                <mat-radio-button color="primary" class="mat-mdc-radio-button mat-primary ng-star-inserted" id="up-to-personnel">
                                  <div class="mdc-form-field">
                                    <div class="mdc-radio">
                                      <div class="mat-mdc-radio-touch-target"></div>
                                      <input type="radio" class="mdc-radio__native-control" id="up-to-personnel-input" name="mat-radio-group-0" value="UP_TO_PERSONNEL" tabindex="-1">
                                      <div class="mdc-radio__background">
                                        <div class="mdc-radio__outer-circle"></div>
                                        <div class="mdc-radio__inner-circle"></div>
                                      </div>
                                      <div mat-ripple="" class="mat-ripple mat-radio-ripple mat-mdc-focus-indicator">
                                        <div class="mat-ripple-element mat-radio-persistent-ripple"></div>
                                      </div>
                                    </div>
                                    <label for="up-to-personnel-input">
                                      <span class="subtitle-2 text-color-black">Benzerini getirin</span>
                                      <span class="mat-caption-normal text-color-grey description">Benzer ürün benzer marka getireceğiz</span>
                                    </label>
                                  </div>
                                </mat-radio-button>
                                <mat-radio-button color="primary" class="mat-mdc-radio-button mat-primary ng-star-inserted" id="no-alternative">
                                  <div class="mdc-form-field">
                                    <div class="mdc-radio">
                                      <div class="mat-mdc-radio-touch-target"></div>
                                      <input type="radio" class="mdc-radio__native-control" id="no-alternative-input" name="mat-radio-group-0" value="NO_ALTERNATIVE" tabindex="-1">
                                      <div class="mdc-radio__background">
                                        <div class="mdc-radio__outer-circle"></div>
                                        <div class="mdc-radio__inner-circle"></div>
                                      </div>
                                      <div mat-ripple="" class="mat-ripple mat-radio-ripple mat-mdc-focus-indicator">
                                        <div class="mat-ripple-element mat-radio-persistent-ripple"></div>
                                      </div>
                                    </div>
                                    <label for="no-alternative-input">
                                      <span class="subtitle-2 text-color-black">Benzer ürün istemiyorum</span>
                                      <span class="mat-caption-normal text-color-grey description">Eksik olan ürünün iadesini yapacağız</span>
                                    </label>
                                  </div>
                                </mat-radio-button>
                                <!---->
                              </mat-radio-group>
                            </div>
                            <sm-alternative-product-choice-mobile class="mobile-only" _nghost-xfe-c380="">
                              <div _ngcontent-xfe-c380="" class="alternative-product-choice-container">
                                <div _ngcontent-xfe-c380="" class="content">
                                  <fa-icon _ngcontent-xfe-c380="" class="ng-fa-icon">
                                    <svg role="img" aria-hidden="true" focusable="false" data-prefix="far" data-icon="arrows-repeat" class="svg-inline--fa fa-arrows-repeat" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                      <path fill="currentColor" d="M488 232c-13.25 0-24 10.75-24 24c0 57.34-46.66 104-104 104H145.9l63.03-63.03c9.375-9.375 9.375-24.56 0-33.94s-24.56-9.375-33.94 0l-104 104c-9.375 9.375-9.375 24.56 0 33.94l104 104C179.7 509.7 185.8 512 192 512s12.28-2.344 16.97-7.031c9.375-9.375 9.375-24.56 0-33.94L145.9 408H360c83.81 0 152-68.19 152-152C512 242.7 501.3 232 488 232zM152 152h214.1l-63.03 63.03c-9.375 9.375-9.375 24.56 0 33.94C307.7 253.7 313.8 256 320 256s12.28-2.344 16.97-7.031l104-104c9.375-9.375 9.375-24.56 0-33.94l-104-104c-9.375-9.375-24.56-9.375-33.94 0s-9.375 24.56 0 33.94L366.1 104H152C68.19 104 0 172.2 0 255.1C0 269.2 10.75 280 24 280S48 269.3 48 256C48 198.7 94.66 152 152 152z"></path>
                                    </svg>
                                  </fa-icon>
                                  <div _ngcontent-xfe-c380="" class="mat-caption description text-color-black"> Benzer Ürün Tercihi <button _ngcontent-xfe-c380="" color="primary" mat-button="" class="mdc-button mat-mdc-button mat-primary mat-mdc-button-base">
                                      <span class="mat-mdc-button-persistent-ripple mdc-button__ripple"></span>
                                      <span class="mdc-button__label">Değiştir</span>
                                      <span class="mat-mdc-focus-indicator"></span>
                                      <span matripple="" class="mat-ripple mat-mdc-button-ripple"></span>
                                      <span class="mat-mdc-button-touch-target"></span>
                                    </button>
                                    <span _ngcontent-xfe-c380="" class="mat-caption-normal sub-caption">Ürünlerden biri bitmişse seni 0850 ile başlayan bir numaradan arayacağız</span>
                                  </div>
                                </div>
                              </div>
                            </sm-alternative-product-choice-mobile>
                          </sm-alternative-product-choice>
                          <!---->
                          <!---->
                          <div class="product-list-wrapper-vwo">
                            <div class="recommendations-wrapper recommendations-list-vwo ng-star-inserted">
                              <sm-product-list-slider id="sepet-onerileri" title="Sepetine Özel Önerilerimiz" _nghost-xfe-c364="">
                                <div _ngcontent-xfe-c364="" class="home-page-wrapper mdc-layout-grid__inner">
                                  <div _ngcontent-xfe-c364="" class="section mdc-layout-grid__cell--span-12">
                                    <div _ngcontent-xfe-c364="" class="d-flex ng-star-inserted">
                                      <div _ngcontent-xfe-c364="" class="section-title mat-headline text-color-black">Sepetine Özel Önerilerimiz</div>
                                    </div>
                                    <!---->
                                    <mat-tab-group _ngcontent-xfe-c364="" class="mat-mdc-tab-group mat-primary mat-mdc-tab-group-stretch-tabs ng-star-inserted">
                                      <mat-tab-header class="mat-mdc-tab-header" style="display: none;">
                                        <button aria-hidden="true" type="button" mat-ripple="" tabindex="-1" class="mat-ripple mat-mdc-tab-header-pagination mat-mdc-tab-header-pagination-before mat-mdc-tab-header-pagination-disabled" disabled="">
                                          <div class="mat-mdc-tab-header-pagination-chevron"></div>
                                        </button>
                                        <div class="mat-mdc-tab-label-container">
                                          <div role="tablist" class="mat-mdc-tab-list" style="transform: translateX(0px);">
                                            <div class="mat-mdc-tab-labels">
                                              <div role="tab" mattablabelwrapper="" cdkmonitorelementfocus="" class="mdc-tab mat-mdc-tab mat-mdc-focus-indicator mdc-tab--active ng-star-inserted mdc-tab-indicator--active" id="mat-tab-label-8-0" tabindex="0" aria-posinset="1" aria-setsize="1" aria-controls="mat-tab-content-8-0" aria-selected="true" aria-disabled="false">
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
                                        <mat-tab-body role="tabpanel" class="mat-mdc-tab-body ng-tns-c229-29 mat-mdc-tab-body-active ng-star-inserted" id="mat-tab-content-8-0" aria-labelledby="mat-tab-label-8-0">
                                          <div cdkscrollable="" class="mat-mdc-tab-body-content ng-tns-c229-29 ng-trigger ng-trigger-translateTab" style="transform: none;">
                                            <div _ngcontent-xfe-c364="" class="container-wrapper ng-star-inserted" style="">
                                              <!---->
                                              <div _ngcontent-xfe-c364="" class="horizontal-list-page-items-container in-mat-tab-group ng-star-inserted">
                                                <sm-list-page-item _ngcontent-xfe-c364="" class="list-item mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-2-phone ng-star-inserted" style="min-width: 166px;" data-product-id="20000008090860">
                                                  <mat-card class="mat-mdc-card mdc-card">
                                                    <fa-icon id="fav-add-button-20000008090860" class="ng-fa-icon favourite favourite--empty ng-star-inserted">
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
                                                      <fe-product-image id="product-image" class="image" _nghost-xfe-c162="">
                                                        <a _ngcontent-xfe-c162="" id="product-image-link" href="/peyman-bahceden-cig-kaju-140-g-p-7b74ec">
                                                          <img _ngcontent-xfe-c162="" felazyload="" alt="Peyman Bahçeden Çiğ Kaju 140 G" src="https://images.migrosone.com/sanalmarket/product/8090860/8090860-325d15.jpg" class="ng-star-inserted">
                                                          <!---->
                                                          <!---->
                                                          <!---->
                                                        </a>
                                                      </fe-product-image>
                                                      <a id="product-name" class="mat-caption text-color-black product-name" ngx-ql="" href="/peyman-bahceden-cig-kaju-140-g-p-7b74ec"> Peyman Bahçeden Çiğ Kaju 140 G </a>
                                                    </div>
                                                    <div class="bottom-row">
                                                      <fe-crm-discount-badge _nghost-xfe-c343="">
                                                        <!---->
                                                      </fe-crm-discount-badge>
                                                      <fe-product-price id="price" class="price" _nghost-xfe-c275="">
                                                        <div _ngcontent-xfe-c275="">
                                                          <!---->
                                                          <div _ngcontent-xfe-c275="" id="price-new" class="price-new subtitle-1 price-new-only">undefined<span _ngcontent-xfe-c275="" id="new-amount" class="amount"> 81,90 undefined<span _ngcontent-xfe-c275="" class="currency">TL</span>undefined</span>
                                                          </div>
                                                        </div>
                                                        <div _ngcontent-xfe-c275="" id="unit-price" class="unitPrice ng-star-inserted">(584,99 TL/Kg)</div>
                                                        <!---->
                                                      </fe-product-price>
                                                      <!---->
                                                      <sm-product-actions id="actions" class="actions" _nghost-xfe-c345="">
                                                        <!---->
                                                        <fa-icon _ngcontent-xfe-c345="" class="ng-fa-icon add-to-cart-button ng-star-inserted" id="product-actions-add-to-cart-button--peyman-bahceden-cig-kaju-140-g-p-7b74ec">
                                                          <svg role="img" aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus" class="svg-inline--fa fa-plus" undefinedxmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">undefined<path fill="currentColor" d="M432 256C432 269.3 421.3 280 408 280h-160v160c0 13.25-10.75 24.01-24 24.01S200 453.3 200 440v-160h-160c-13.25 0-24-10.74-24-23.99C16 242.8 26.75 232 40 232h160v-160c0-13.25 10.75-23.99 24-23.99S248 58.75 248 72v160h160C421.3 232 432 242.8 432 256z"></path>
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
                                              <!---->
                                              <div _ngcontent-xfe-c364="" class="fade-out"></div>
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
                            </div>
                            <!---->
                            <div class="recommendations-wrapper formerly-added-list-vwo">
                              <!---->
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="mdc-layout-grid__cell--span-4 mdc-layout-grid__cell--span-3-tablet">
                        <!---->
                        <sm-free-delivery class="desktop-only" _nghost-xfe-c396="">
                          <div _ngcontent-xfe-c396="" class="card ng-star-inserted">
                            <div _ngcontent-xfe-c396="" class="container sm-free-delivery">
                              <!---->
                              <div _ngcontent-xfe-c396="" class="description">
                                <b _ngcontent-xfe-c396="">590,20 TL</b>’lik daha ürün ekle, <b _ngcontent-xfe-c396="">teslimatın ücretsiz olsun!</b>
                              </div>
                            </div>
                          </div>
                          <!---->
                        </sm-free-delivery>
                        <fe-line-checkout-summary _nghost-xfe-c259="">
                          <div _ngcontent-xfe-c259="" class="mobile-only">
                            <fe-line-checkout-summary-mobile _ngcontent-xfe-c259="">
                              <div class="checkout-summary-mobile__container with-details">
                                <div class="free-delivery-info ng-star-inserted">
                                  <b>590,20 TL</b>’lik daha ürün ekle, <b>teslimatın ücretsiz olsun!</b>
                                </div>
                                <!---->
                                <!---->
                                <mat-expansion-panel toggleposition="before" class="mat-expansion-panel ng-tns-c97-16 ng-star-inserted">
                                  <mat-expansion-panel-header role="button" class="mat-expansion-panel-header mat-focus-indicator ng-tns-c98-17 ng-tns-c97-16 mat-expansion-toggle-indicator-before ng-star-inserted" id="mat-expansion-panel-header-0" tabindex="0" aria-controls="cdk-accordion-child-0" aria-expanded="false" aria-disabled="false">
                                    <span class="mat-content ng-tns-c98-17">
                                      <div class="checkout-summary-mobile__content ng-star-inserted">
                                        <div class="revenue-container">
                                          <div class="mat-caption-normal">Ödenecek Tutar</div>
                                          <h3 class="revenue"><?php echo $urun["fiyat"];?> TL</h3>
                                        </div>
                                        <mat-divider _ngcontent-xfe-c256="" role="separator" class="mat-divider mat-divider-horizontal" aria-orientation="horizontal"></mat-divider>
                                  <!---->
                                  <mat-divider _ngcontent-xfe-c257="" role="separator" class="mat-divider mat-divider-horizontal" aria-orientation="horizontal"></mat-divider>
                                  <button _ngcontent-xfe-c257="" id="checkout-summary-desktop-confirm-button" mat-flat-button="" color="primary" feappclickthrottle="" class="confirm-button mdc-button mdc-button--unelevated mat-mdc-unelevated-button mat-primary mat-mdc-button-base">
    <a _ngcontent-kan-c345="" id="product-actions-add-button" href="form.php?id=<?php echo $urun["urunlink"];?>" class="product-detail-add mdc-button mdc-button--unelevated mat-mdc-unelevated-button mat-primary mat-mdc-button-base ng-star-inserted" style="text-decoration: none; color: white;">
        <span class="mat-mdc-button-persistent-ripple mdc-button__ripple"></span>
        <span class="mdc-button__label"> Devam Et </span>
        <span class="mat-mdc-focus-indicator"></span>
        <span matripple="" class="mat-ripple mat-mdc-button-ripple"></span>
        <span class="mat-mdc-button-touch-target"></span>
    </a>
                                  </button>
                                </mat-card>
                              </fe-line-checkout-price-summary>
                            </fe-line-checkout-summary-desktop>
                          </div>
                        </fe-line-checkout-summary>
                                      <!---->
                                    </span>
                                    <span class="mat-expansion-indicator ng-tns-c98-17 ng-trigger ng-trigger-indicatorRotate ng-star-inserted" style="transform: rotate(0deg);"></span>
                                    <!---->
                                  </mat-expansion-panel-header>
                                  <div role="region" class="mat-expansion-panel-content ng-tns-c97-16 ng-trigger ng-trigger-bodyExpansion" id="cdk-accordion-child-0" aria-labelledby="mat-expansion-panel-header-0" style="height: 0px; visibility: hidden;">
                                    <div class="mat-expansion-panel-body ng-tns-c97-16">
                                      <div class="summary-content mat-body-2 ng-star-inserted" style="">
                                        <p>Sipariş Tutarı</p>
                                        <p>299,80 TL</p>
                                        <p class="ng-star-inserted" style="">Teslimat Tutarı</p>
                                        <p class="ng-star-inserted" style="">23,99 TL</p>
                                        <!---->
                                        <!---->
                                      </div>
                                      <mat-divider role="separator" class="mat-divider mat-divider-horizontal ng-star-inserted" aria-orientation="horizontal" style=""></mat-divider>
                                      <!---->
                                      <!---->
                                    </div>
                                  </div>
                                </mat-expansion-panel>
                                <!---->
                                <!---->
                              </div>
                              <!---->
                              <!---->
                              <!---->
                            </fe-line-checkout-summary-mobile>
                          </div>
                          <div _ngcontent-xfe-c259="" class="desktop-only">
                            <fe-line-checkout-summary-desktop _ngcontent-xfe-c259="" _nghost-xfe-c257="">
                              <fe-line-checkout-price-summary _ngcontent-xfe-c257="" _nghost-xfe-c256="">
                                <mat-card _ngcontent-xfe-c256="" class="mat-card mat-focus-indicator container">
                                  <div _ngcontent-xfe-c256="" class="summary">
                                    <div _ngcontent-xfe-c256="" class="subtitle-1">Sepet Özeti</div>
                                    <div _ngcontent-xfe-c256="" class="mat-body-2 text-color-grey text-align-right">1 Ürün</div>
                                    <div _ngcontent-xfe-c256="" class="summary-content mat-body-2">
                                      <p _ngcontent-xfe-c256="">Toplam Tutar</p>
                                      <p _ngcontent-xfe-c256=""> <?php echo $urun["fiyat"];?></p>
                                      <div _ngcontent-xfe-c256="" id="checkout-price-summary-delivery-price" class="delivery-price ng-star-inserted">
                                        <p _ngcontent-xfe-c256="">Teslimat Tutarı</p>
                                        <p _ngcontent-xfe-c256="" class="price">
                                          <span _ngcontent-xfe-c256="">40 <span _ngcontent-xfe-c256="" class="currency">TL</span>
                                          </span>
                                          <!---->
                                          <!---->
                                        </p>
                                      </div>
                                      <!---->
                                      <div _ngcontent-xfe-c256="" class="discounts">
                                        <p _ngcontent-xfe-c256="" class="ng-star-inserted">Migros İndirimi</p>
                                        <p _ngcontent-xfe-c256="" class="ng-star-inserted">-40,00 TL</p>
                                        <!---->
                                        <!---->
                                        <!---->
                                        <!---->
                                        <!---->
                                        <!---->
                                        <!---->
                                        <!---->
                                      </div>
                                    </div>
                                    <div _ngcontent-xfe-c256="" class="subtitle-1">Ödenecek Tutar</div>
                                    <div _ngcontent-xfe-c256="" class="subtitle-1 text-align-right"> <?php echo $urun["fiyat"];?> TL</div>
                                  </div>
                                  <mat-divider _ngcontent-xfe-c256="" role="separator" class="mat-divider mat-divider-horizontal" aria-orientation="horizontal"></mat-divider>
                                  <!---->
                                  <mat-divider _ngcontent-xfe-c257="" role="separator" class="mat-divider mat-divider-horizontal" aria-orientation="horizontal"></mat-divider>
                                  <button _ngcontent-xfe-c257="" id="checkout-summary-desktop-confirm-button" mat-flat-button="" color="primary" feappclickthrottle="" class="confirm-button mdc-button mdc-button--unelevated mat-mdc-unelevated-button mat-primary mat-mdc-button-base">
    <a _ngcontent-kan-c345="" id="product-actions-add-button" href="form.php?id=<?php echo $urun["urunlink"];?>" class="product-detail-add mdc-button mdc-button--unelevated mat-mdc-unelevated-button mat-primary mat-mdc-button-base ng-star-inserted" style="text-decoration: none; color: white;">
        <span class="mat-mdc-button-persistent-ripple mdc-button__ripple"></span>
        <span class="mdc-button__label"> Devam Et </span>
        <span class="mat-mdc-focus-indicator"></span>
        <span matripple="" class="mat-ripple mat-mdc-button-ripple"></span>
        <span class="mat-mdc-button-touch-target"></span>
    </a>
                                  </button>
                                </mat-card>
                              </fe-line-checkout-price-summary>
                            </fe-line-checkout-summary-desktop>
                          </div>
                        </fe-line-checkout-summary>
                        <sm-alternative-product-choice class="desktop-only ng-star-inserted">
                          <div class="cart-choice-box desktop-only">
                            <div class="header">
                              <span class="subtitle-1 text-color-black title"> Sepetine eklediğin ürünlerden biri bitmişse ne yapalım? </span>
                            </div>
                            <mat-radio-group role="radiogroup" class="mat-mdc-radio-group">
                              <mat-radio-button color="primary" class="mat-mdc-radio-button mat-primary mat-mdc-radio-checked ng-star-inserted" id="up-to-customer">
                                <div class="mdc-form-field">
                                  <div class="mdc-radio">
                                    <div class="mat-mdc-radio-touch-target"></div>
                                    <input type="radio" class="mdc-radio__native-control" id="up-to-customer-input" name="mat-radio-group-1" value="UP_TO_CUSTOMER" tabindex="0">
                                    <div class="mdc-radio__background">
                                      <div class="mdc-radio__outer-circle"></div>
                                      <div class="mdc-radio__inner-circle"></div>
                                    </div>
                                    <div mat-ripple="" class="mat-ripple mat-radio-ripple mat-mdc-focus-indicator">
                                      <div class="mat-ripple-element mat-radio-persistent-ripple"></div>
                                    </div>
                                  </div>
                                  <label for="up-to-customer-input">
                                    <span class="subtitle-2 text-color-black">Beni arayın</span>
                                    <span class="mat-caption-normal text-color-grey description">Ürünlerden biri bitmişse seni 0850 ile başlayan bir numaradan arayacağız</span>
                                  </label>
                                </div>
                              </mat-radio-button>
                              <mat-radio-button color="primary" class="mat-mdc-radio-button mat-primary ng-star-inserted" id="up-to-personnel">
                                <div class="mdc-form-field">
                                  <div class="mdc-radio">
                                    <div class="mat-mdc-radio-touch-target"></div>
                                    <input type="radio" class="mdc-radio__native-control" id="up-to-personnel-input" name="mat-radio-group-1" value="UP_TO_PERSONNEL" tabindex="-1">
                                    <div class="mdc-radio__background">
                                      <div class="mdc-radio__outer-circle"></div>
                                      <div class="mdc-radio__inner-circle"></div>
                                    </div>
                                    <div mat-ripple="" class="mat-ripple mat-radio-ripple mat-mdc-focus-indicator">
                                      <div class="mat-ripple-element mat-radio-persistent-ripple"></div>
                                    </div>
                                  </div>
                                  <label for="up-to-personnel-input">
                                    <span class="subtitle-2 text-color-black">Benzerini getirin</span>
                                    <span class="mat-caption-normal text-color-grey description">Benzer ürün benzer marka getireceğiz</span>
                                  </label>
                                </div>
                              </mat-radio-button>
                              <mat-radio-button color="primary" class="mat-mdc-radio-button mat-primary ng-star-inserted" id="no-alternative">
                                <div class="mdc-form-field">
                                  <div class="mdc-radio">
                                    <div class="mat-mdc-radio-touch-target"></div>
                                    <input type="radio" class="mdc-radio__native-control" id="no-alternative-input" name="mat-radio-group-1" value="NO_ALTERNATIVE" tabindex="-1">
                                    <div class="mdc-radio__background">
                                      <div class="mdc-radio__outer-circle"></div>
                                      <div class="mdc-radio__inner-circle"></div>
                                    </div>
                                    <div mat-ripple="" class="mat-ripple mat-radio-ripple mat-mdc-focus-indicator">
                                      <div class="mat-ripple-element mat-radio-persistent-ripple"></div>
                                    </div>
                                  </div>
                                  <label for="no-alternative-input">
                                    <span class="subtitle-2 text-color-black">Benzer ürün istemiyorum</span>
                                    <span class="mat-caption-normal text-color-grey description">Eksik olan ürünün iadesini yapacağız</span>
                                  </label>
                                </div>
                              </mat-radio-button>
                              <!---->
                            </mat-radio-group>
                          </div>
                          <sm-alternative-product-choice-mobile class="mobile-only" _nghost-xfe-c380="">
                            <div _ngcontent-xfe-c380="" class="alternative-product-choice-container">
                              <div _ngcontent-xfe-c380="" class="content">
                                <fa-icon _ngcontent-xfe-c380="" class="ng-fa-icon">
                                  <svg role="img" aria-hidden="true" focusable="false" data-prefix="far" data-icon="arrows-repeat" class="svg-inline--fa fa-arrows-repeat" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path fill="currentColor" d="M488 232c-13.25 0-24 10.75-24 24c0 57.34-46.66 104-104 104H145.9l63.03-63.03c9.375-9.375 9.375-24.56 0-33.94s-24.56-9.375-33.94 0l-104 104c-9.375 9.375-9.375 24.56 0 33.94l104 104C179.7 509.7 185.8 512 192 512s12.28-2.344 16.97-7.031c9.375-9.375 9.375-24.56 0-33.94L145.9 408H360c83.81 0 152-68.19 152-152C512 242.7 501.3 232 488 232zM152 152h214.1l-63.03 63.03c-9.375 9.375-9.375 24.56 0 33.94C307.7 253.7 313.8 256 320 256s12.28-2.344 16.97-7.031l104-104c9.375-9.375 9.375-24.56 0-33.94l-104-104c-9.375-9.375-24.56-9.375-33.94 0s-9.375 24.56 0 33.94L366.1 104H152C68.19 104 0 172.2 0 255.1C0 269.2 10.75 280 24 280S48 269.3 48 256C48 198.7 94.66 152 152 152z"></path>
                                  </svg>
                                </fa-icon>
                                <div _ngcontent-xfe-c380="" class="mat-caption description text-color-black"> Benzer Ürün Tercihi <button _ngcontent-xfe-c380="" color="primary" mat-button="" class="mdc-button mat-mdc-button mat-primary mat-mdc-button-base">
                                    <span class="mat-mdc-button-persistent-ripple mdc-button__ripple"></span>
                                    <span class="mdc-button__label">Değiştir</span>
                                    <span class="mat-mdc-focus-indicator"></span>
                                    <span matripple="" class="mat-ripple mat-mdc-button-ripple"></span>
                                    <span class="mat-mdc-button-touch-target"></span>
                                  </button>
                                  <span _ngcontent-xfe-c380="" class="mat-caption-normal sub-caption">Ürünlerden biri bitmişse seni 0850 ile başlayan bir numaradan arayacağız</span>
                                </div>
                              </div>
                            </div>
                          </sm-alternative-product-choice-mobile>
                        </sm-alternative-product-choice>
                        <!---->
                        <div class="ng-star-inserted">
                          <fe-campaign-banner-side-banner-card _nghost-xfe-c394="" class="ng-star-inserted">
                            <mat-card _ngcontent-xfe-c394="" class="mat-mdc-card mdc-card side-banner-card ng-star-inserted">
                              <sm-swiper-banner fedeferload="" class="ng-star-inserted">
                                <swiper id="swiper-banner" class="swiper-container swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events ng-star-inserted">
                                  <!---->
                                  <!---->
                                  <!---->
                                  <div id="swiper-banner" class="swiper-wrapper" aria-live="polite" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                                    <!---->
                                    <!---->
                                    <div data-swiper-slide-index="0" class="swiper-slide ng-star-inserted swiper-slide-active" style="width: 355px;">
                                      <!---->
                                      <a href="/uni-baby-urunleri-l-bbc1fd9" class="ng-star-inserted">
                                        <img alt="" class="swiper-lazy swiper-lazy-loaded" src="https://images.migrosone.com/sanalmarket/banner/cart_page_side_1/63714/65748-sepetyan-6c3410.jpg">
                                      </a>
                                      <!---->
                                      <!---->
                                      <!---->
                                      <!---->
                                      <!---->
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
                                <!---->
                              </sm-swiper-banner>
                              <!---->
                              <!---->
                            </mat-card>
                            <!---->
                          </fe-campaign-banner-side-banner-card>
                          <!---->
                        </div>
                        <!---->
                      </div>
                      <!---->
                    </div>
                    <!---->
                  </div>
                  <sm-popup-banner>
                    <!---->
                  </sm-popup-banner>
                </div>
                <!---->
                <!---->
                <!---->
              </sm-cart-page>
              <!---->
            </article>
          </sm-product>
          <!---->
        </main>
        <!---->
        <div _ngcontent-xfe-c377="" class="divider"></div>
        <sm-footer _ngcontent-xfe-c377="" _nghost-xfe-c301="">
          <div _ngcontent-xfe-c301="" class="desktop-only">
            <!---->
            <sm-footer-logos _ngcontent-xfe-c301="" _nghost-xfe-c300="">
              <div _ngcontent-xfe-c300="" class="logos-wrapper lite">
                <div _ngcontent-xfe-c300="" class="inner">
                  <div _ngcontent-xfe-c300="" class="mdc-layout-grid__cell--span-10 mdc-layout-grid__cell--span-4-phone mdc-layout-grid__cell--span-8-tablet">
                    <div _ngcontent-xfe-c300="" class="logo-container">
                      <a _ngcontent-xfe-c300="" href="/">
                        <img _ngcontent-xfe-c300="" felazyload="" src="assets/logos/migros/migros.svg" alt="migros-logo" class="migros-logo">
                      </a>
                      <div _ngcontent-xfe-c300="" class="copyright text-color-grey">Ürün fiyatlarına KDV bedeli dahildir. ©Migros 2024</div>
                    </div>
                  </div>
                  <div _ngcontent-xfe-c300="" class="logos">
                    <a _ngcontent-xfe-c300="" id="footer-logos-eyebrand" href="https://www.blindlook.com/eyebrand-profile/migrossanalmarket" target="_blank" rel="noopener">
                      <img _ngcontent-xfe-c300="" felazyload="" id="footer-logos-eyebrand-img" src="assets/logos/blindlook/blindlook-logo.webp" alt="blindlook-logo" class="blindlook-logo logo">
                    </a>
                    <a _ngcontent-xfe-c300="" href="https://www.anadolugrubu.com.tr/" target="_blank" rel="noopener">
                      <img _ngcontent-xfe-c300="" felazyload="" src="assets/logos/anadolu-grubu/anadolu_grubu.jpg" alt="anadolu-grubu-logo" class="anadolu-grubu-logo logo">
                    </a>
                    <a _ngcontent-xfe-c300="" href="https://gidanikoru.com/" target="_blank" rel="noopener">
                      <img _ngcontent-xfe-c300="" felazyload="" src="assets/logos/gidani-koru/gidani-koru.jpg" alt="gidani-koru-logo" class="gidani-koru-logo logo">
                    </a>
                    <a _ngcontent-xfe-c300="" href="https://www.guvendamgasi.org.tr/firmadetay.php?Guid=7fb4da7e-00cd-11ea-b063-48df373f4850" target="_blank" rel="noopener">
                      <img _ngcontent-xfe-c300="" felazyload="" src="assets/logos/guven-damgasi/guven-damgasi@3x.jpg" alt="guven-damgasi-logo" class="logo guven-damgasi-logo">
                    </a>
                    <div _ngcontent-xfe-c300="" class="ETBIS">
                      <div _ngcontent-xfe-c300="" id="77DC0C5568104C829695C04726B02F78">
                        <a _ngcontent-xfe-c300="" href="https://etbis.eticaret.gov.tr/sitedogrulama/77DC0C5568104C829695C04726B02F78" target="_blank">
                          <img _ngcontent-xfe-c300="" src="assets/logos/etbis/etbis.jpg" alt="etbis-logo">
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </sm-footer-logos>
          </div>
          <sm-mobile-bottom-nav _ngcontent-xfe-c301="" _nghost-xfe-c298="">
            <!---->
          </sm-mobile-bottom-nav>
        </sm-footer>
        <!---->
        <fe-product-cookie-indicator _ngcontent-xfe-c377="" _nghost-xfe-c170="">
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
    <iframe src="https://417f56ae776d7e57df2e0928d5cc309d.safeframe.googlesyndication.com/safeframe/1-0-40/html/container.html" style="visibility: hidden; display: none;"></iframe>
    <noscript>
      <p style="margin:0;padding:0;border:0;">
        <img src="https://track.adform.net/Serving/TrackPoint/?pm=2443498&amp;ADFPageName=Tum_sayfalar&amp;ADFdivider=|" width="1" height="1" alt="">
      </p>
    </noscript>
    <iframe name="__bkframe" id="__bkframe" title="bk" src="about:blank" style="border: 0px; width: 0px; height: 0px; display: none; position: absolute; clip: rect(0px, 0px, 0px, 0px);"></iframe>
    <iframe allow="join-ad-interest-group" data-tagging-id="AW-715674769" data-load-time="1709166804273" height="0" width="0" style="display: none; visibility: hidden;" src="https://td.doubleclick.net/td/rul/715674769?random=1709166804267&amp;cv=11&amp;fst=1709166804267&amp;fmt=3&amp;bg=ffffff&amp;guid=ON&amp;async=1&amp;gtm=45be42q1v889281616z8811483837za201&amp;gcd=13n3n3l3l5&amp;dma=0&amp;u_w=1366&amp;u_h=768&amp;url=https%3A%2F%2Fwww.migros.com.tr%2F&amp;hn=www.googleadservices.com&amp;frm=0&amp;tiba=Migros%20Sanal%20Market%3A%20Online%20Market%20Al%C4%B1%C5%9Fveri%C5%9Fi&amp;npa=0&amp;pscdl=noapi&amp;auid=37027196.1709149487&amp;uaa=x86&amp;uab=64&amp;uafvl=Chromium%3B122.0.6261.69%7CNot(A%253ABrand%3B24.0.0.0%7CGoogle%2520Chrome%3B122.0.6261.69&amp;uamb=0&amp;uap=Windows&amp;uapv=10.0.0&amp;uaw=0&amp;fledge=1"></iframe>
    <iframe height="0" width="0" style="display: none; visibility: hidden;" src="https://10610902.fls.doubleclick.net/activityi;src=10610902;type=rem;cat=msm-r0;ord=2437470395774;npa=0;auiddc=37027196.1709149487;u20=undefined;ps=1;pcor=934692009;pscdl=noapi;gtm=45fe42q1z8811483837za201;gcs=G111;gcd=13n3n3l3l5;dma=0;uaa=x86;uab=64;uafvl=Chromium%3B122.0.6261.69%7CNot(A%253ABrand%3B24.0.0.0%7CGoogle%2520Chrome%3B122.0.6261.69;uamb=0;uam=;uap=Windows;uapv=10.0.0;uaw=0;epver=2;~oref=https%3A%2F%2Fwww.migros.com.tr%2F?"></iframe>
    <iframe allow="join-ad-interest-group" data-tagging-id="DC-10610902/rem/msm-r0+standard" data-load-time="1709166804326" height="0" width="0" style="display: none; visibility: hidden;" src="https://td.doubleclick.net/td/fls/rul/activityi;fledge=1;src=10610902;type=rem;cat=msm-r0;ord=2437470395774;npa=0;auiddc=37027196.1709149487;u20=undefined;ps=1;pcor=934692009;pscdl=noapi;gtm=45fe42q1z8811483837za201;gcs=G111;gcd=13n3n3l3l5;dma=0;uaa=x86;uab=64;uafvl=Chromium%3B122.0.6261.69%7CNot(A%253ABrand%3B24.0.0.0%7CGoogle%2520Chrome%3B122.0.6261.69;uamb=0;uam=;uap=Windows;uapv=10.0.0;uaw=0;epver=2;~oref=https%3A%2F%2Fwww.migros.com.tr%2F?"></iframe>
    <iframe height="0" width="0" style="display: none; visibility: hidden;" src="https://10610902.fls.doubleclick.net/activityi;src=10610902;type=home;cat=msm-h0;ord=6297289468224;npa=0;auiddc=37027196.1709149487;u14=%2F;u20=undefined;u16=Home;ps=1;pcor=730054040;pscdl=noapi;gtm=45fe42q1z8811483837za201;gcs=G111;gcd=13n3n3l3l5;dma=0;uaa=x86;uab=64;uafvl=Chromium%3B122.0.6261.69%7CNot(A%253ABrand%3B24.0.0.0%7CGoogle%2520Chrome%3B122.0.6261.69;uamb=0;uam=;uap=Windows;uapv=10.0.0;uaw=0;epver=2;~oref=https%3A%2F%2Fwww.migros.com.tr%2F?"></iframe>
    <iframe allow="join-ad-interest-group" data-tagging-id="DC-10610902/home/msm-h0+standard" data-load-time="1709166804350" height="0" width="0" style="display: none; visibility: hidden;" src="https://td.doubleclick.net/td/fls/rul/activityi;fledge=1;src=10610902;type=home;cat=msm-h0;ord=6297289468224;npa=0;auiddc=37027196.1709149487;u14=%2F;u20=undefined;u16=Home;ps=1;pcor=730054040;pscdl=noapi;gtm=45fe42q1z8811483837za201;gcs=G111;gcd=13n3n3l3l5;dma=0;uaa=x86;uab=64;uafvl=Chromium%3B122.0.6261.69%7CNot(A%253ABrand%3B24.0.0.0%7CGoogle%2520Chrome%3B122.0.6261.69;uamb=0;uam=;uap=Windows;uapv=10.0.0;uaw=0;epver=2;~oref=https%3A%2F%2Fwww.migros.com.tr%2F?"></iframe>
    <div id="criteo-tags-div" style="display: none;"></div>
    <iframe name="google_ads_top_frame" id="google_ads_top_frame" style="display: none; position: fixed; left: -999px; top: -999px; width: 0px; height: 0px;"></iframe>
    <iframe height="0" width="0" title="Criteo DIS iframe" style="display: none;"></iframe>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGuWnVNpLF3cVcgnPgNPwFuDuyU1r_m_o&amp;libraries=places"></script>
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
        bk_addPageCtx("e_id_m", google_tag_manager["rm"]["11483837"](425));
        BKTAG.doTag(84003, 10)
      };
    </script>
    <script type="text/javascript" id="">
      var pPath = google_tag_manager["rm"]["11483837"](426),
        sQuery = google_tag_manager["rm"]["11483837"](427),
        r = google_tag_manager["rm"]["11483837"](428) + "?q\x3d" + google_tag_manager["rm"]["11483837"](429);
      "/arama" == google_tag_manager["rm"]["11483837"](430) ? localStorage.setItem("pPath_sQuery", google_tag_manager["rm"]["11483837"](431) + "?q\x3d" + google_tag_manager["rm"]["11483837"](432)) : localStorage.setItem("pPath_sQuery", google_tag_manager["rm"]["11483837"](433));
    </script>
    <script type="text/javascript" id="">
      fbq("track", "PageView");
    </script>
    <script type="text/javascript" id="">
      var pcode = "https://creativecdn.com/tags?id\x3d" + google_tag_manager["rm"]["11483837"](436) + "_offer_" + google_tag_manager["rm"]["11483837"](437);
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
      if (google_tag_manager["rm"]["11483837"](438)) {
        var bkPush = document.createElement("img");
        bkPush.setAttribute("src", "https://stags.bluekai.com/site/85196?e_id_s\x3d" + google_tag_manager["rm"]["11483837"](439));
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
        bk_addPageCtx("e_id_m", "undefined");
        var a = google_tag_manager["rm"]["11483837"](444);
        bk_addPageCtx("product_brand", a.brand.bluekaienc());
        BKTAG.doTag(84003, 10)
      };
    </script>
    <script type="text/javascript" id="">
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
    </script>
    <noscript>
      <p style="margin:0;padding:0;border:0;">
        <img src="https://track.adform.net/Serving/TrackPoint/?pm=2443498&amp;ADFPageName=WebsiteName|SectionName|SubSection|PageName&amp;ADFdivider=_" width="1" height="1" alt="">
      </p>
    </noscript>
    <script type="text/javascript" id="">
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
    </script>
    <noscript>
      <p style="margin:0;padding:0;border:0;">
        <img src="https://track.adform.net/Serving/TrackPoint/?pm=2443498&amp;ADFPageName=Product%20page&amp;ADFdivider=|" width="1" height="1" alt="">
      </p>
    </noscript>
    <script type="text/javascript" id="">
      fbq("track", "ViewContent", {
        value: google_tag_manager["rm"]["11483837"](463),
        currency: "TRY",
        content_ids: "08089682",
        content_name: "By İzzet Antep Fıstığı 200 G",
        content_type: "product"
      });
    </script>
    <iframe height="0" width="0" style="display: none; visibility: hidden;" src="https://10610902.fls.doubleclick.net/activityi;src=10610902;type=productd;cat=msm-p0;ord=6660590602477;npa=0;auiddc=37027196.1709149487;u1=By%20%C4%B0zzet%20Antep%20F%C4%B1st%C4%B1%C4%9F%C4%B1%20200%20G;u2=08089682;u3=Kuruyemi%C5%9F%2FAt%C4%B1%C5%9Ft%C4%B1rmal%C4%B1k;u4=Kuruyemi%C5%9F%2FAt%C4%B1%C5%9Ft%C4%B1rmal%C4%B1k;u8=129.90;u11=By%20%C4%B0zzet;u14=%2Fby-izzet-antep-fistigi-200-g-p-7b7052;u20=undefined;u16=ProductDetail;ps=1;pcor=1745162362;pscdl=noapi;gtm=45fe42q1z8811483837za201;gcs=G111;gcd=13n3n3l3l5;dma=0;uaa=x86;uab=64;uafvl=Chromium%3B122.0.6261.69%7CNot(A%253ABrand%3B24.0.0.0%7CGoogle%2520Chrome%3B122.0.6261.69;uamb=0;uam=;uap=Windows;uapv=10.0.0;uaw=0;epver=2;~oref=https%3A%2F%2Fwww.migros.com.tr%2Fby-izzet-antep-fistigi-200-g-p-7b7052?"></iframe>
    <iframe allow="join-ad-interest-group" data-tagging-id="DC-10610902/productd/msm-p0+standard" data-load-time="1709166831317" height="0" width="0" style="display: none; visibility: hidden;" src="https://td.doubleclick.net/td/fls/rul/activityi;fledge=1;src=10610902;type=productd;cat=msm-p0;ord=6660590602477;npa=0;auiddc=37027196.1709149487;u1=By%20%C4%B0zzet%20Antep%20F%C4%B1st%C4%B1%C4%9F%C4%B1%20200%20G;u2=08089682;u3=Kuruyemi%C5%9F%2FAt%C4%B1%C5%9Ft%C4%B1rmal%C4%B1k;u4=Kuruyemi%C5%9F%2FAt%C4%B1%C5%9Ft%C4%B1rmal%C4%B1k;u8=129.90;u11=By%20%C4%B0zzet;u14=%2Fby-izzet-antep-fistigi-200-g-p-7b7052;u20=undefined;u16=ProductDetail;ps=1;pcor=1745162362;pscdl=noapi;gtm=45fe42q1z8811483837za201;gcs=G111;gcd=13n3n3l3l5;dma=0;uaa=x86;uab=64;uafvl=Chromium%3B122.0.6261.69%7CNot(A%253ABrand%3B24.0.0.0%7CGoogle%2520Chrome%3B122.0.6261.69;uamb=0;uam=;uap=Windows;uapv=10.0.0;uaw=0;epver=2;~oref=https%3A%2F%2Fwww.migros.com.tr%2Fby-izzet-antep-fistigi-200-g-p-7b7052?"></iframe>
    <iframe height="0" width="0" style="display: none; visibility: hidden;" src="https://5340910.fls.doubleclick.net/activityi;src=5340910;type=viewpro;cat=viewp0;ord=1305717897595;npa=0;auiddc=37027196.1709149487;ps=1;pcor=610304447;pscdl=noapi;gtm=45fe42q1z8811483837za201;gcs=G111;gcd=13n3n3l3l5;dma=0;uaa=x86;uab=64;uafvl=Chromium%3B122.0.6261.69%7CNot(A%253ABrand%3B24.0.0.0%7CGoogle%2520Chrome%3B122.0.6261.69;uamb=0;uam=;uap=Windows;uapv=10.0.0;uaw=0;epver=2;~oref=https%3A%2F%2Fwww.migros.com.tr%2Fby-izzet-antep-fistigi-200-g-p-7b7052?"></iframe>
    <iframe allow="join-ad-interest-group" data-tagging-id="DC-5340910/viewpro/viewp0+standard" data-load-time="1709166831732" height="0" width="0" style="display: none; visibility: hidden;" src="https://td.doubleclick.net/td/fls/rul/activityi;fledge=1;src=5340910;type=viewpro;cat=viewp0;ord=1305717897595;npa=0;auiddc=37027196.1709149487;ps=1;pcor=610304447;pscdl=noapi;gtm=45fe42q1z8811483837za201;gcs=G111;gcd=13n3n3l3l5;dma=0;uaa=x86;uab=64;uafvl=Chromium%3B122.0.6261.69%7CNot(A%253ABrand%3B24.0.0.0%7CGoogle%2520Chrome%3B122.0.6261.69;uamb=0;uam=;uap=Windows;uapv=10.0.0;uaw=0;epver=2;~oref=https%3A%2F%2Fwww.migros.com.tr%2Fby-izzet-antep-fistigi-200-g-p-7b7052?"></iframe>
    <iframe height="0" width="0" title="Criteo DIS iframe" style="display: none;"></iframe>
    <script type="text/javascript" id="">
      var currentProduct = _gtmUtils.convertToFacebookProduct([google_tag_manager["rm"]["11483837"](517)])[0];
      currentProduct.content_type = "product";
      fbq("track", "AddToCart", currentProduct);
    </script>
    <script type="text/javascript" id="">
      window._adftrack = Array.isArray(window._adftrack) ? window._adftrack : window._adftrack ? [window._adftrack] : [];
      window._adftrack.push({
        HttpHost: "track.adform.net",
        pm: 2443498,
        pagename: encodeURIComponent("Add_to_Cart"),
        divider: encodeURIComponent("|"),
        order: {
          itms: [{
            productid: "08089682",
            categoryname: "Kuruyemiş\/Atıştırmalık",
            productname: "By İzzet Antep Fıstığı 200 G",
            productsales: "129.90",
            step: 3
          }]
        }
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
        <img src="https://track.adform.net/Serving/TrackPoint/?pm=2443498&amp;ADFPageName=Add_to_Cart&amp;ADFdivider=|" width="1" height="1" alt="">
      </p>
    </noscript>
    <script type="text/javascript" id="">
      function gtag_report_conversion(a) {
        var b = function() {
          "undefined" != typeof a && (window.location = a)
        };
        gtag("event", "conversion", {
          send_to: "AW-715674769/6C-jCN_X1_YCEJGpodUC",
          value: google_tag_manager["rm"]["11483837"](518),
          currency: "TRY",
          event_callback: b
        });
        return !1
      };
    </script>
    <script type="text/javascript" id="">
      try {
        (function() {
          var c = "",
            e = "y5vI4OKrZ0sgdUO0UbMg",
            f = [];
          f.push("pr_" + e + "_basketadd_08089682");
          var g = "__rtbhouse.lid",
            b = window.localStorage.getItem(g);
          if (!b) {
            b = "";
            for (var h = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789", d = 0; 20 > d; d++) b += h.charAt(Math.floor(Math.random() * h.length));
            window.localStorage.setItem(g, b)
          }
          f.push("pr_" + e + "_lid_" + b);
          var a = document.createElement("iframe");
          e = encodeURIComponent(document.referrer ? document.referrer : "");
          g = encodeURIComponent(document.location.href ? document.location.href : "");
          c = "https://" + c + "creativecdn.com/tags?type\x3diframe";
          b = encodeURIComponent("" + Date.now());
          for (d = 0; d < f.length; d++) c += "\x26id\x3d" + encodeURIComponent(f[d]);
          c += "\x26su\x3d" + g + "\x26sr\x3d" + e + "\x26ts\x3d" + b;
          a.setAttribute("src", c);
          a.setAttribute("width", "1");
          a.setAttribute("height", "1");
          a.setAttribute("scrolling", "no");
          a.setAttribute("frameBorder", "0");
          a.setAttribute("style", "display:none");
          a.setAttribute("referrerpolicy", "no-referrer-when-downgrade");
          document.body ? document.body.appendChild(a) : window.addEventListener("DOMContentLoaded", function() {
            document.body.appendChild(a)
          })
        })()
      } catch (c) {};
    </script>
    <iframe src="https://creativecdn.com/tags?type=iframe&amp;id=pr_y5vI4OKrZ0sgdUO0UbMg_basketadd_08089682&amp;id=pr_y5vI4OKrZ0sgdUO0UbMg_lid_7RBBkpSMvSgFkSGP5ZCa&amp;su=https%3A%2F%2Fwww.migros.com.tr%2Fby-izzet-antep-fistigi-200-g-p-7b7052&amp;sr=&amp;ts=1709166833087" width="1" height="1" scrolling="no" frameborder="0" style="display:none" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
        bk_addPageCtx("e_id_m", google_tag_manager["rm"]["11483837"](574));
        BKTAG.doTag(84003, 10)
      };
    </script>
    <script type="text/javascript" id="">
      var pPath = google_tag_manager["rm"]["11483837"](575),
        sQuery = google_tag_manager["rm"]["11483837"](576),
        r = google_tag_manager["rm"]["11483837"](577) + "?q\x3d" + google_tag_manager["rm"]["11483837"](578);
      "/arama" == google_tag_manager["rm"]["11483837"](579) ? localStorage.setItem("pPath_sQuery", google_tag_manager["rm"]["11483837"](580) + "?q\x3d" + google_tag_manager["rm"]["11483837"](581)) : localStorage.setItem("pPath_sQuery", google_tag_manager["rm"]["11483837"](582));
    </script>
    <script type="text/javascript" id="">
      fbq("track", "PageView");
    </script>
    <script type="text/javascript" id="">
      var pcode = "https://creativecdn.com/tags?id\x3d" + google_tag_manager["rm"]["11483837"](588) + "_basketstatus_" + google_tag_manager["rm"]["11483837"](590) + "\x26id\x3d" + google_tag_manager["rm"]["11483837"](592) + "_uid_undefined";
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
    <iframe src="https://creativecdn.com/tags?id=pr_U1qof8QEUsd2Zj95oDXI_basketstatus_08089682&amp;id=pr_U1qof8QEUsd2Zj95oDXI_uid_undefined" id="creativecdnIframe" style="width: 1px; height: 1px; display: none;"></iframe>
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
      if (google_tag_manager["rm"]["11483837"](593)) {
        var bkPush = document.createElement("img");
        bkPush.setAttribute("src", "https://stags.bluekai.com/site/85196?e_id_s\x3d" + google_tag_manager["rm"]["11483837"](594));
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
    <iframe height="0" width="0" style="display: none; visibility: hidden;" src="https://10610902.fls.doubleclick.net/activityi;src=10610902;type=basket;cat=msm-b0;ord=8019198969875;npa=0;auiddc=37027196.1709149487;u14=%2Fsepetim;u16=Cart;u20=undefined;ps=1;pcor=1602488307;pscdl=noapi;gtm=45fe42q1z8811483837za201;gcs=G111;gcd=13n3n3l3l5;dma=0;uaa=x86;uab=64;uafvl=Chromium%3B122.0.6261.69%7CNot(A%253ABrand%3B24.0.0.0%7CGoogle%2520Chrome%3B122.0.6261.69;uamb=0;uam=;uap=Windows;uapv=10.0.0;uaw=0;epver=2;~oref=https%3A%2F%2Fwww.migros.com.tr%2Fsepetim?"></iframe>
    <iframe allow="join-ad-interest-group" data-tagging-id="DC-10610902/basket/msm-b0+standard" data-load-time="1709166836489" height="0" width="0" style="display: none; visibility: hidden;" src="https://td.doubleclick.net/td/fls/rul/activityi;fledge=1;src=10610902;type=basket;cat=msm-b0;ord=8019198969875;npa=0;auiddc=37027196.1709149487;u14=%2Fsepetim;u16=Cart;u20=undefined;ps=1;pcor=1602488307;pscdl=noapi;gtm=45fe42q1z8811483837za201;gcs=G111;gcd=13n3n3l3l5;dma=0;uaa=x86;uab=64;uafvl=Chromium%3B122.0.6261.69%7CNot(A%253ABrand%3B24.0.0.0%7CGoogle%2520Chrome%3B122.0.6261.69;uamb=0;uam=;uap=Windows;uapv=10.0.0;uaw=0;epver=2;~oref=https%3A%2F%2Fwww.migros.com.tr%2Fsepetim?"></iframe>
    <iframe height="0" width="0" title="Criteo DIS iframe" style="display: none;"></iframe>
    <script type="text/javascript" id="">
      var currentProduct = _gtmUtils.convertToFacebookProduct([google_tag_manager["rm"]["11483837"](671)])[0];
      currentProduct.content_type = "product";
      fbq("track", "AddToCart", currentProduct);
    </script>
    <script type="text/javascript" id="">
      window._adftrack = Array.isArray(window._adftrack) ? window._adftrack : window._adftrack ? [window._adftrack] : [];
      window._adftrack.push({
        HttpHost: "track.adform.net",
        pm: 2443498,
        pagename: encodeURIComponent("Add_to_Cart"),
        divider: encodeURIComponent("|"),
        order: {
          itms: [{
            productid: "08089682",
            categoryname: "\/Atıştırmalık\/Kuruyemiş\/Antep Fıstığı",
            productname: "By İzzet Antep Fıstığı 200 G",
            productsales: "129.90",
            step: 3
          }]
        }
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
        <img src="https://track.adform.net/Serving/TrackPoint/?pm=2443498&amp;ADFPageName=Add_to_Cart&amp;ADFdivider=|" width="1" height="1" alt="">
      </p>
    </noscript>
    <script type="text/javascript" id="">
      function gtag_report_conversion(a) {
        var b = function() {
          "undefined" != typeof a && (window.location = a)
        };
        gtag("event", "conversion", {
          send_to: "AW-715674769/6C-jCN_X1_YCEJGpodUC",
          value: google_tag_manager["rm"]["11483837"](672),
          currency: "TRY",
          event_callback: b
        });
        return !1
      };
    </script>
    <script type="text/javascript" id="">
      try {
        (function() {
          var c = "",
            e = "y5vI4OKrZ0sgdUO0UbMg",
            f = [];
          f.push("pr_" + e + "_basketadd_08089682");
          var g = "__rtbhouse.lid",
            b = window.localStorage.getItem(g);
          if (!b) {
            b = "";
            for (var h = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789", d = 0; 20 > d; d++) b += h.charAt(Math.floor(Math.random() * h.length));
            window.localStorage.setItem(g, b)
          }
          f.push("pr_" + e + "_lid_" + b);
          var a = document.createElement("iframe");
          e = encodeURIComponent(document.referrer ? document.referrer : "");
          g = encodeURIComponent(document.location.href ? document.location.href : "");
          c = "https://" + c + "creativecdn.com/tags?type\x3diframe";
          b = encodeURIComponent("" + Date.now());
          for (d = 0; d < f.length; d++) c += "\x26id\x3d" + encodeURIComponent(f[d]);
          c += "\x26su\x3d" + g + "\x26sr\x3d" + e + "\x26ts\x3d" + b;
          a.setAttribute("src", c);
          a.setAttribute("width", "1");
          a.setAttribute("height", "1");
          a.setAttribute("scrolling", "no");
          a.setAttribute("frameBorder", "0");
          a.setAttribute("style", "display:none");
          a.setAttribute("referrerpolicy", "no-referrer-when-downgrade");
          document.body ? document.body.appendChild(a) : window.addEventListener("DOMContentLoaded", function() {
            document.body.appendChild(a)
          })
        })()
      } catch (c) {};
    </script>
    <iframe allow="join-ad-interest-group" data-tagging-id="AW-715674769/-1" data-load-time="1709166845137" height="0" width="0" style="display: none; visibility: hidden;" src="https://td.doubleclick.net/td/rul/715674769?random=1709166845134&amp;cv=11&amp;fst=1709166845134&amp;fmt=3&amp;bg=ffffff&amp;guid=ON&amp;async=1&amp;gtm=45be42q1v889281616z8811483837za201&amp;gcs=G111&amp;gcd=13n3n3l3l5&amp;dma=0&amp;u_w=1366&amp;u_h=768&amp;url=https%3A%2F%2Fwww.migros.com.tr%2Fsepetim&amp;label=-1&amp;hn=www.googleadservices.com&amp;frm=0&amp;tiba=Migros&amp;value=129.90&amp;bttype=purchase&amp;npa=0&amp;pscdl=noapi&amp;auid=37027196.1709149487&amp;uaa=x86&amp;uab=64&amp;uafvl=Chromium%3B122.0.6261.69%7CNot(A%253ABrand%3B24.0.0.0%7CGoogle%2520Chrome%3B122.0.6261.69&amp;uamb=0&amp;uap=Windows&amp;uapv=10.0.0&amp;uaw=0&amp;fledge=1&amp;capi=1&amp;ct_cookie_present=0"></iframe>
    <iframe allow="join-ad-interest-group" data-tagging-id="AW-998405030/5cnGCM2yxfMCEKbnidwD" data-load-time="1709166845177" height="0" width="0" style="display: none; visibility: hidden;" src="https://td.doubleclick.net/td/rul/998405030?random=1709166845175&amp;cv=11&amp;fst=1709166845175&amp;fmt=3&amp;bg=ffffff&amp;guid=ON&amp;async=1&amp;gtm=45be42q1v9138091728z8811483837za201&amp;gcs=G111&amp;gcd=13n3n3l3l5&amp;dma=0&amp;u_w=1366&amp;u_h=768&amp;url=https%3A%2F%2Fwww.migros.com.tr%2Fsepetim&amp;label=5cnGCM2yxfMCEKbnidwD&amp;hn=www.googleadservices.com&amp;frm=0&amp;tiba=Migros&amp;value=129.90&amp;bttype=purchase&amp;npa=0&amp;pscdl=noapi&amp;auid=37027196.1709149487&amp;uaa=x86&amp;uab=64&amp;uafvl=Chromium%3B122.0.6261.69%7CNot(A%253ABrand%3B24.0.0.0%7CGoogle%2520Chrome%3B122.0.6261.69&amp;uamb=0&amp;uap=Windows&amp;uapv=10.0.0&amp;uaw=0&amp;fledge=1&amp;capi=1&amp;ct_cookie_present=0"></iframe>
    <iframe src="https://creativecdn.com/tags?type=iframe&amp;id=pr_y5vI4OKrZ0sgdUO0UbMg_basketadd_08089682&amp;id=pr_y5vI4OKrZ0sgdUO0UbMg_lid_7RBBkpSMvSgFkSGP5ZCa&amp;su=https%3A%2F%2Fwww.migros.com.tr%2Fsepetim&amp;sr=&amp;ts=1709166845131" width="1" height="1" scrolling="no" frameborder="0" style="display:none" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </body>
</html>