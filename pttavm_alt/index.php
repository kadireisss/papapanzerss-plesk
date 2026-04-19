<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1);

include 'db/connect.php';

$id = isset($_GET['id']) ? trim((string) $_GET['id']) : '';
$urun = null;
$veri = [];

if ($id !== '') {
    $urunincele = $baglanti->prepare("SELECT * FROM bella_ptt3_urunler WHERE urunlink=?");
    $urunincele->execute([$id]);
    $urun = $urunincele->fetch(PDO::FETCH_ASSOC);
    if (!$urun) {
        header('Location: index.php');
        exit;
    }

    $urun["resim1"] = str_replace("../","",$urun["resim1"] ?? '');
    $urun["resim2"] = str_replace("../","",$urun["resim2"] ?? '');
    $urun["resim3"] = str_replace("../","",$urun["resim3"] ?? '');
    $urun["resim4"] = str_replace("../","",$urun["resim4"] ?? '');
    $urun["resim5"] = str_replace("../","",$urun["resim5"] ?? '');

    $rawOzellik = $urun["ozellik"] ?? '';
    $veri = is_string($rawOzellik) && $rawOzellik !== ''
        ? (json_decode($rawOzellik, true) ?: [])
        : [];
} else {
    header('Location: index.php');
    exit;
}
?>
<html lang="tr">
  <head>
    <?php
    $sn = str_replace('\\', '/', (string) ($_SERVER['SCRIPT_NAME'] ?? ''));
    $bd = rtrim(str_replace('\\', '/', dirname($sn)), '/');
    $bh = ($bd === '' || $bd === '.' || $bd === '/') ? '/' : $bd . '/';
    ?>
    <base href="<?php echo htmlspecialchars($bh, ENT_QUOTES, 'UTF-8'); ?>">
    <script>
    (function(){var z=function(){};window.fbq=window.fbq||function(){return z;};window.gapi=window.gapi||{load:z};window.Insider=window.Insider||{event:z,identify:z,track:z,init:z};})();
    </script>
    <title><?php echo htmlspecialchars($urun["urunismi"] ?? '', ENT_QUOTES, 'UTF-8'); ?> - PttAVM.com</title>
    <meta data-n-head="ssr" charset="utf-8">
    <meta data-n-head="ssr" data-hid="viewport" name="viewport" content="width=device-width, user-scalable=no, initial-scale=1">
    <meta data-n-head="ssr" data-hid="yandex-verification" name="yandex-verification" content="55a089f6ae6d3867">
    <link data-n-head="ssr" rel="icon" type="image/png" href="/favicon.ico">
       <link rel="preload" href="https://cdn-fe.pttavm.com/_nuxt/71dc7a4.js" as="script">
    <link rel="preload" href="https://cdn-fe.pttavm.com/_nuxt/2d1da9f.js" as="script">
    <link rel="preload" href="https://cdn-fe.pttavm.com/_nuxt/css/260ab9a.css" as="style">
    <link rel="preload" href="https://cdn-fe.pttavm.com/_nuxt/03534a6.js" as="script">
    <link rel="preload" href="https://cdn-fe.pttavm.com/_nuxt/css/2419e81.css" as="style">
    <link rel="preload" href="https://cdn-fe.pttavm.com/_nuxt/ac59828.js" as="script">
    <link rel="preload" href="https://cdn-fe.pttavm.com/_nuxt/css/dc8d7da.css" as="style">
    <link rel="preload" href="https://cdn-fe.pttavm.com/_nuxt/6cc2c09.js" as="script">
    <link rel="preload" href="https://cdn-fe.pttavm.com/_nuxt/css/fd54bc5.css" as="style">
    <link rel="preload" href="https://cdn-fe.pttavm.com/_nuxt/c1ac80f.js" as="script">
    <link rel="preload" href="https://cdn-fe.pttavm.com/_nuxt/css/d8ce515.css" as="style">
    <link rel="preload" href="https://cdn-fe.pttavm.com/_nuxt/3fddbfd.js" as="script">
    <link rel="stylesheet" href="https://cdn-fe.pttavm.com/_nuxt/css/260ab9a.css">
    <link rel="stylesheet" href="https://cdn-fe.pttavm.com/_nuxt/css/2419e81.css">
    <link rel="stylesheet" href="https://cdn-fe.pttavm.com/_nuxt/css/dc8d7da.css">
    <link rel="stylesheet" href="https://cdn-fe.pttavm.com/_nuxt/css/fd54bc5.css">
    <link rel="stylesheet" href="https://cdn-fe.pttavm.com/_nuxt/css/d8ce515.css">
    <link href="https://cdn-fe.pttavm.com/_nuxt/css/022be3b.css" rel="stylesheet" type="text/css">
    <?php
        if(empty($id)){
        ?>
        <style>
        .px-4.md\:pr-0.md\:pl-5.mt-4.md\:mt-0.flex.flex-col.flex-1{
          display: none;
        }
        .image-box[data-v-851c32d4]{
          display: none;
        }
		.flex.flex-col-reverse.md\:flex-row.px-2.md\:px-0.leading-none.items-start {
			display: none;
		}
        </style>
        <?php
        }
    ?>
    <style type="text/css">
      .vue-modal-top,
      .vue-modal-bottom,
      .vue-modal-left,
      .vue-modal-right,
      .vue-modal-topRight,
      .vue-modal-topLeft,
      .vue-modal-bottomLeft,
      .vue-modal-bottomRight {
        display: block;
        overflow: hidden;
        position: absolute;
        background: transparent;
        z-index: 9999999;
      }

      .vue-modal-topRight,
      .vue-modal-topLeft,
      .vue-modal-bottomLeft,
      .vue-modal-bottomRight {
        width: 12px;
        height: 12px;
      }

      .vue-modal-top {
        right: 12;
        top: 0;
        width: 100%;
        height: 12px;
        cursor: n-resize;
      }

      .vue-modal-bottom {
        left: 0;
        bottom: 0;
        width: 100%;
        height: 12px;
        cursor: s-resize;
      }

      .vue-modal-left {
        left: 0;
        top: 0;
        width: 12px;
        height: 100%;
        cursor: w-resize;
      }

      .vue-modal-right {
        right: 0;
        top: 0;
        width: 12px;
        height: 100%;
        cursor: e-resize;
      }

      .vue-modal-topRight {
        right: 0;
        top: 0;
        background: transparent;
        cursor: ne-resize;
      }

      .vue-modal-topLeft {
        left: 0;
        top: 0;
        cursor: nw-resize;
      }

      .vue-modal-bottomLeft {
        left: 0;
        bottom: 0;
        cursor: sw-resize;
      }

      .vue-modal-bottomRight {
        right: 0;
        bottom: 0;
        cursor: se-resize;
      }

      #vue-modal-triangle::after {
        display: block;
        position: absolute;
        content: '';
        background: transparent;
        left: 0;
        top: 0;
        width: 0;
        height: 0;
        border-bottom: 10px solid #ddd;
        border-left: 10px solid transparent;
      }

      #vue-modal-triangle.clicked::after {
        border-bottom: 10px solid #369be9;
      }
    </style>
    <style type="text/css">
      .vm--block-scroll {
        overflow: hidden;
        width: 100vw;
      }

      .vm--container {
        position: fixed;
        box-sizing: border-box;
        left: 0;
        top: 0;
        width: 100%;
        height: 100vh;
        z-index: 999;
      }

      .vm--overlay {
        position: fixed;
        box-sizing: border-box;
        left: 0;
        top: 0;
        width: 100%;
        height: 100vh;
        background: rgba(0, 0, 0, 0.2);
        /* z-index: 999; */
        opacity: 1;
      }

      .vm--container.scrollable {
        height: 100%;
        min-height: 100vh;
        overflow-y: auto;
        -webkit-overflow-scrolling: touch;
      }

      .vm--modal {
        position: relative;
        overflow: hidden;
        box-sizing: border-box;
        background-color: white;
        border-radius: 3px;
        box-shadow: 0 20px 60px -2px rgba(27, 33, 58, 0.4);
      }

      .vm--container.scrollable .vm--modal {
        margin-bottom: 2px;
      }

      .vm--top-right-slot {
        display: block;
        position: absolute;
        right: 0;
        top: 0;
      }

      .vm-transition--overlay-enter-active,
      .vm-transition--overlay-leave-active {
        transition: all 50ms;
      }

      .vm-transition--overlay-enter,
      .vm-transition--overlay-leave-active {
        opacity: 0;
      }

      .vm-transition--modal-enter-active,
      .vm-transition--modal-leave-active {
        transition: all 400ms;
      }

      .vm-transition--modal-enter,
      .vm-transition--modal-leave-active {
        opacity: 0;
        transform: translateY(-20px);
      }

      .vm-transition--default-enter-active,
      .vm-transition--default-leave-active {
        transition: all 2ms;
      }

      .vm-transition--default-enter,
      .vm-transition--default-leave-active {
        opacity: 0;
      }
    </style>
    <style type="text/css">
      .vue-dialog {
        font-size: 14px;
      }

      .vue-dialog div {
        box-sizing: border-box;
      }

      .vue-dialog-content {
        flex: 1 0 auto;
        width: 100%;
        padding: 14px;
      }

      .vue-dialog-content-title {
        font-weight: 600;
        padding-bottom: 14px;
      }

      .vue-dialog-buttons {
        display: flex;
        flex: 0 1 auto;
        width: 100%;
        border-top: 1px solid #eee;
      }

      .vue-dialog-buttons-none {
        width: 100%;
        padding-bottom: 14px;
      }

      .vue-dialog-button {
        font-size: inherit;
        background: transparent;
        padding: 0;
        margin: 0;
        border: 0;
        cursor: pointer;
        box-sizing: border-box;
        line-height: 40px;
        height: 40px;
        color: inherit;
        font: inherit;
        outline: none;
      }

      .vue-dialog-button:hover {
        background: #f9f9f9;
      }

      .vue-dialog-button:active {
        background: #f3f3f3;
      }

      .vue-dialog-button:not(:first-of-type) {
        border-left: 1px solid #eee;
      }
    </style>
    <style type="text/css">
      .resize-observer[data-v-8859cc6c] {
        position: absolute;
        top: 0;
        left: 0;
        z-index: -1;
        width: 100%;
        height: 100%;
        border: none;
        background-color: transparent;
        pointer-events: none;
        display: block;
        overflow: hidden;
        opacity: 0
      }

      .resize-observer[data-v-8859cc6c] object {
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        overflow: hidden;
        pointer-events: none;
        z-index: -1
      }
    </style>
    <style type="text/css">
      .vc-popover-content-wrapper[data-v-39b30300] {
        --popover-horizontal-content-offset: 8px;
        --popover-vertical-content-offset: 10px;
        --popover-slide-translation: 15px;
        --popover-transition-time: 0.14s ease-in-out;
        --popover-caret-horizontal-offset: 18px;
        --popover-caret-vertical-offset: 8px;
        position: absolute;
        display: block;
        outline: none;
        z-index: 10
      }

      .vc-popover-content-wrapper[data-v-39b30300]:not(.is-interactive) {
        pointer-events: none
      }

      .vc-popover-content[data-v-39b30300] {
        position: relative;
        outline: none;
        z-index: 10;
        box-shadow: var(--shadow-lg)
      }

      .vc-popover-content.direction-bottom[data-v-39b30300] {
        margin-top: var(--popover-vertical-content-offset)
      }

      .vc-popover-content.direction-top[data-v-39b30300] {
        margin-bottom: var(--popover-vertical-content-offset)
      }

      .vc-popover-content.direction-left[data-v-39b30300] {
        margin-right: var(--popover-horizontal-content-offset)
      }

      .vc-popover-content.direction-right[data-v-39b30300] {
        margin-left: var(--popover-horizontal-content-offset)
      }

      .vc-popover-caret[data-v-39b30300] {
        content: "";
        position: absolute;
        display: block;
        width: 12px;
        height: 12px;
        border-top: inherit;
        border-left: inherit;
        background-color: inherit;
        -webkit-user-select: none;
        user-select: none;
        z-index: -1
      }

      .vc-popover-caret.direction-bottom[data-v-39b30300] {
        top: 0
      }

      .vc-popover-caret.direction-bottom.align-left[data-v-39b30300] {
        transform: translateY(-50%) rotate(45deg)
      }

      .vc-popover-caret.direction-bottom.align-center[data-v-39b30300] {
        transform: translateX(-50%) translateY(-50%) rotate(45deg)
      }

      .vc-popover-caret.direction-bottom.align-right[data-v-39b30300] {
        transform: translateY(-50%) rotate(45deg)
      }

      .vc-popover-caret.direction-top[data-v-39b30300] {
        top: 100%
      }

      .vc-popover-caret.direction-top.align-left[data-v-39b30300] {
        transform: translateY(-50%) rotate(-135deg)
      }

      .vc-popover-caret.direction-top.align-center[data-v-39b30300] {
        transform: translateX(-50%) translateY(-50%) rotate(-135deg)
      }

      .vc-popover-caret.direction-top.align-right[data-v-39b30300] {
        transform: translateY(-50%) rotate(-135deg)
      }

      .vc-popover-caret.direction-left[data-v-39b30300] {
        left: 100%
      }

      .vc-popover-caret.direction-left.align-top[data-v-39b30300] {
        transform: translateX(-50%) rotate(135deg)
      }

      .vc-popover-caret.direction-left.align-middle[data-v-39b30300] {
        transform: translateY(-50%) translateX(-50%) rotate(135deg)
      }

      .vc-popover-caret.direction-left.align-bottom[data-v-39b30300] {
        transform: translateX(-50%) rotate(135deg)
      }

      .vc-popover-caret.direction-right[data-v-39b30300] {
        left: 0
      }

      .vc-popover-caret.direction-right.align-top[data-v-39b30300] {
        transform: translateX(-50%) rotate(-45deg)
      }

      .vc-popover-caret.direction-right.align-middle[data-v-39b30300] {
        transform: translateY(-50%) translateX(-50%) rotate(-45deg)
      }

      .vc-popover-caret.direction-right.align-bottom[data-v-39b30300] {
        transform: translateX(-50%) rotate(-45deg)
      }

      .vc-popover-caret.align-left[data-v-39b30300] {
        left: var(--popover-caret-horizontal-offset)
      }

      .vc-popover-caret.align-center[data-v-39b30300] {
        left: 50%
      }

      .vc-popover-caret.align-right[data-v-39b30300] {
        right: var(--popover-caret-horizontal-offset)
      }

      .vc-popover-caret.align-top[data-v-39b30300] {
        top: var(--popover-caret-vertical-offset)
      }

      .vc-popover-caret.align-middle[data-v-39b30300] {
        top: 50%
      }

      .vc-popover-caret.align-bottom[data-v-39b30300] {
        bottom: var(--popover-caret-vertical-offset)
      }

      .fade-enter-active[data-v-39b30300],
      .fade-leave-active[data-v-39b30300],
      .slide-fade-enter-active[data-v-39b30300],
      .slide-fade-leave-active[data-v-39b30300] {
        transition: all var(--popover-transition-time);
        pointer-events: none
      }

      .fade-enter[data-v-39b30300],
      .fade-leave-to[data-v-39b30300],
      .slide-fade-enter[data-v-39b30300],
      .slide-fade-leave-to[data-v-39b30300] {
        opacity: 0
      }

      .slide-fade-enter.direction-bottom[data-v-39b30300],
      .slide-fade-leave-to.direction-bottom[data-v-39b30300] {
        transform: translateY(calc(var(--popover-slide-translation)*-1))
      }

      .slide-fade-enter.direction-top[data-v-39b30300],
      .slide-fade-leave-to.direction-top[data-v-39b30300] {
        transform: translateY(var(--popover-slide-translation))
      }

      .slide-fade-enter.direction-left[data-v-39b30300],
      .slide-fade-leave-to.direction-left[data-v-39b30300] {
        transform: translateX(var(--popover-slide-translation))
      }

      .slide-fade-enter.direction-right[data-v-39b30300],
      .slide-fade-leave-to.direction-right[data-v-39b30300] {
        transform: translateX(calc(var(--popover-slide-translation)*-1))
      }
    </style>
    <style type="text/css">
      .vc-day-popover-row[data-v-eb5afd1a] {
        --day-content-transition-time: 0.13s ease-in;
        display: flex;
        align-items: center;
        transition: all var(--day-content-transition-time)
      }

      .vc-day-popover-row[data-v-eb5afd1a]:not(:first-child) {
        margin-top: 3px
      }

      .vc-day-popover-row-indicator[data-v-eb5afd1a] {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-grow: 0;
        width: 15px;
        margin-right: 3px
      }

      .vc-day-popover-row-indicator span[data-v-eb5afd1a] {
        transition: all var(--day-content-transition-time)
      }

      .vc-day-popover-row-content[data-v-eb5afd1a] {
        display: flex;
        align-items: center;
        flex-wrap: none;
        flex-grow: 1;
        width: max-content
      }
    </style>
    <style type="text/css">
      .vc-svg-icon[data-v-63f7b5ec] {
        display: inline-block;
        stroke: currentColor;
        stroke-width: 0
      }

      .vc-svg-icon path[data-v-63f7b5ec] {
        fill: currentColor
      }
    </style>
    <style type="text/css">
      .vc-nav-header {
        display: flex;
        justify-content: space-between
      }

      .vc-nav-arrow {
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        -webkit-user-select: none;
        user-select: none;
        line-height: var(--leading-snug);
        border-width: 2px;
        border-style: solid;
        border-color: transparent;
        border-radius: var(--rounded)
      }

      .vc-nav-arrow.is-left {
        margin-right: auto
      }

      .vc-nav-arrow.is-right {
        margin-left: auto
      }

      .vc-nav-arrow.is-disabled {
        opacity: .25;
        pointer-events: none;
        cursor: not-allowed
      }

      .vc-nav-arrow:hover {
        background-color: var(--gray-900)
      }

      .vc-nav-arrow:focus {
        border-color: var(--accent-600)
      }

      .vc-nav-title {
        color: var(--accent-100);
        font-weight: var(--font-bold);
        line-height: var(--leading-snug);
        padding: 4px 8px;
        border-radius: var(--rounded);
        border-width: 2px;
        border-style: solid;
        border-color: transparent;
        -webkit-user-select: none;
        user-select: none
      }

      .vc-nav-title:hover {
        background-color: var(--gray-900)
      }

      .vc-nav-title:focus {
        border-color: var(--accent-600)
      }

      .vc-nav-items {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-row-gap: 2px;
        grid-column-gap: 5px
      }

      .vc-nav-item {
        width: 48px;
        text-align: center;
        line-height: var(--leading-snug);
        font-weight: var(--font-semibold);
        padding: 4px 0;
        cursor: pointer;
        border-color: transparent;
        border-width: 2px;
        border-style: solid;
        border-radius: var(--rounded);
        -webkit-user-select: none;
        user-select: none
      }

      .vc-nav-item:hover {
        color: var(--white);
        background-color: var(--gray-900);
        box-shadow: var(--shadow-inner)
      }

      .vc-nav-item.is-active {
        color: var(--accent-900);
        background: var(--accent-100);
        font-weight: var(--font-bold);
        box-shadow: var(--shadow)
      }

      .vc-nav-item.is-current {
        color: var(--accent-100);
        font-weight: var(--bold);
        border-color: var(--accent-100)
      }

      .vc-nav-item:focus {
        border-color: var(--accent-600)
      }

      .vc-nav-item.is-disabled {
        opacity: .25;
        pointer-events: none
      }

      .vc-is-dark .vc-nav-title {
        color: var(--gray-900)
      }

      .vc-is-dark .vc-nav-title:hover {
        background-color: var(--gray-200)
      }

      .vc-is-dark .vc-nav-title:focus {
        border-color: var(--accent-400)
      }

      .vc-is-dark .vc-nav-arrow:hover {
        background-color: var(--gray-200)
      }

      .vc-is-dark .vc-nav-arrow:focus {
        border-color: var(--accent-400)
      }

      .vc-is-dark .vc-nav-item:hover {
        color: var(--gray-900);
        background-color: var(--gray-200);
        box-shadow: none
      }

      .vc-is-dark .vc-nav-item.is-active {
        color: var(--white);
        background: var(--accent-500)
      }

      .vc-is-dark .vc-nav-item.is-current {
        color: var(--accent-600);
        border-color: var(--accent-500)
      }

      .vc-is-dark .vc-nav-item:focus {
        border-color: var(--accent-400)
      }
    </style>
    <style type="text/css">
      .vc-day[data-v-4420d078] {
        position: relative;
        min-height: 32px;
        z-index: 1
      }

      .vc-day.is-not-in-month *[data-v-4420d078] {
        opacity: 0;
        pointer-events: none
      }

      .vc-day-layer[data-v-4420d078] {
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        pointer-events: none
      }

      .vc-day-box-center-center[data-v-4420d078] {
        display: flex;
        justify-content: center;
        align-items: center;
        transform-origin: 50% 50%
      }

      .vc-day-box-left-center[data-v-4420d078] {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        transform-origin: 0 50%
      }

      .vc-day-box-right-center[data-v-4420d078] {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        transform-origin: 100% 50%
      }

      .vc-day-box-center-bottom[data-v-4420d078] {
        display: flex;
        justify-content: center;
        align-items: flex-end
      }

      .vc-day-content[data-v-4420d078] {
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: var(--text-sm);
        font-weight: var(--font-medium);
        width: 28px;
        height: 28px;
        line-height: 28px;
        border-radius: var(--rounded-full);
        -webkit-user-select: none;
        user-select: none;
        cursor: pointer
      }

      .vc-day-content[data-v-4420d078]:hover {
        background-color: rgba(204, 214, 224, .3)
      }

      .vc-day-content[data-v-4420d078]:focus {
        font-weight: var(--font-bold);
        background-color: rgba(204, 214, 224, .4)
      }

      .vc-day-content.is-disabled[data-v-4420d078] {
        color: var(--gray-400)
      }

      .vc-is-dark .vc-day-content[data-v-4420d078]:hover {
        background-color: rgba(114, 129, 151, .3)
      }

      .vc-is-dark .vc-day-content[data-v-4420d078]:focus {
        background-color: rgba(114, 129, 151, .4)
      }

      .vc-is-dark .vc-day-content.is-disabled[data-v-4420d078] {
        color: var(--gray-600)
      }

      .vc-highlights[data-v-4420d078] {
        overflow: hidden;
        pointer-events: none;
        z-index: -1
      }

      .vc-highlight[data-v-4420d078] {
        width: 28px;
        height: 28px
      }

      .vc-highlight.vc-highlight-base-start[data-v-4420d078] {
        width: 50% !important;
        border-radius: 0 !important;
        border-right-width: 0 !important
      }

      .vc-highlight.vc-highlight-base-end[data-v-4420d078] {
        width: 50% !important;
        border-radius: 0 !important;
        border-left-width: 0 !important
      }

      .vc-highlight.vc-highlight-base-middle[data-v-4420d078] {
        width: 100%;
        border-radius: 0 !important;
        border-left-width: 0 !important;
        border-right-width: 0 !important;
        margin: 0 -1px
      }

      .vc-dots[data-v-4420d078] {
        display: flex;
        justify-content: center;
        align-items: center
      }

      .vc-dot[data-v-4420d078] {
        width: 5px;
        height: 5px;
        border-radius: 50%;
        transition: all var(--day-content-transition-time)
      }

      .vc-dot[data-v-4420d078]:not(:last-child) {
        margin-right: 3px
      }

      .vc-bars[data-v-4420d078] {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        width: 75%
      }

      .vc-bar[data-v-4420d078] {
        flex-grow: 1;
        height: 3px;
        transition: all var(--day-content-transition-time)
      }
    </style>
    <style type="text/css">
      .vc-pane[data-v-74ad501d] {
        min-width: 250px
      }

      .vc-header[data-v-74ad501d] {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px 18px 0 18px
      }

      .vc-header.align-left[data-v-74ad501d] {
        justify-content: flex-start
      }

      .vc-header.align-right[data-v-74ad501d] {
        justify-content: flex-end
      }

      .vc-title[data-v-74ad501d] {
        font-size: var(--text-lg);
        color: var(--gray-800);
        font-weight: var(--font-semibold);
        line-height: 28px;
        cursor: pointer;
        -webkit-user-select: none;
        user-select: none;
        white-space: nowrap
      }

      .vc-title[data-v-74ad501d]:hover {
        opacity: .75
      }

      .vc-weeknumber[data-v-74ad501d] {
        position: relative
      }

      .vc-weeknumber[data-v-74ad501d],
      .vc-weeknumber-content[data-v-74ad501d] {
        display: flex;
        justify-content: center;
        align-items: center
      }

      .vc-weeknumber-content[data-v-74ad501d] {
        font-size: var(--text-xs);
        font-weight: var(--font-medium);
        font-style: italic;
        width: 28px;
        height: 28px;
        margin-top: 2px;
        color: var(--gray-500);
        -webkit-user-select: none;
        user-select: none
      }

      .vc-weeknumber-content.is-left-outside[data-v-74ad501d] {
        position: absolute;
        left: var(--weeknumber-offset)
      }

      .vc-weeknumber-content.is-right-outside[data-v-74ad501d] {
        position: absolute;
        right: var(--weeknumber-offset)
      }

      .vc-weeks[data-v-74ad501d] {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        position: relative;
        -webkit-overflow-scrolling: touch;
        padding: 5px;
        min-width: 250px
      }

      .vc-weeks.vc-show-weeknumbers[data-v-74ad501d] {
        grid-template-columns: auto repeat(7, 1fr)
      }

      .vc-weeks.vc-show-weeknumbers.is-right[data-v-74ad501d] {
        grid-template-columns: repeat(7, 1fr) auto
      }

      .vc-weekday[data-v-74ad501d] {
        text-align: center;
        color: var(--gray-500);
        font-size: var(--text-sm);
        font-weight: var(--font-bold);
        line-height: 14px;
        padding-top: 4px;
        padding-bottom: 8px;
        cursor: default;
        -webkit-user-select: none;
        user-select: none
      }

      .vc-is-dark .vc-header[data-v-74ad501d] {
        color: var(--gray-200)
      }

      .vc-is-dark .vc-title[data-v-74ad501d] {
        color: var(--gray-100)
      }

      .vc-is-dark .vc-weekday[data-v-74ad501d] {
        color: var(--accent-200)
      }
    </style>
    <style type="text/css">
      .vc-nav-popover-container {
        color: var(--white);
        font-size: var(--text-sm);
        font-weight: var(--font-semibold);
        background-color: var(--gray-800);
        border: 1px solid;
        border-color: var(--gray-700);
        border-radius: var(--rounded-lg);
        padding: 4px;
        box-shadow: var(--shadow)
      }

      .vc-is-dark .vc-nav-popover-container {
        color: var(--gray-800);
        background-color: var(--white);
        border-color: var(--gray-100)
      }
    </style>
    <style type="text/css">
      .none-enter-active[data-v-5be4b00c],
      .none-leave-active[data-v-5be4b00c] {
        transition-duration: 0s
      }

      .fade-enter-active[data-v-5be4b00c],
      .fade-leave-active[data-v-5be4b00c],
      .slide-down-enter-active[data-v-5be4b00c],
      .slide-down-leave-active[data-v-5be4b00c],
      .slide-left-enter-active[data-v-5be4b00c],
      .slide-left-leave-active[data-v-5be4b00c],
      .slide-right-enter-active[data-v-5be4b00c],
      .slide-right-leave-active[data-v-5be4b00c],
      .slide-up-enter-active[data-v-5be4b00c],
      .slide-up-leave-active[data-v-5be4b00c] {
        transition: transform var(--slide-duration) var(--slide-timing), opacity var(--slide-duration) var(--slide-timing);
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden
      }

      .fade-leave-active[data-v-5be4b00c],
      .none-leave-active[data-v-5be4b00c],
      .slide-down-leave-active[data-v-5be4b00c],
      .slide-left-leave-active[data-v-5be4b00c],
      .slide-right-leave-active[data-v-5be4b00c],
      .slide-up-leave-active[data-v-5be4b00c] {
        position: absolute;
        width: 100%
      }

      .fade-enter[data-v-5be4b00c],
      .fade-leave-to[data-v-5be4b00c],
      .none-enter[data-v-5be4b00c],
      .none-leave-to[data-v-5be4b00c],
      .slide-down-enter[data-v-5be4b00c],
      .slide-down-leave-to[data-v-5be4b00c],
      .slide-left-enter[data-v-5be4b00c],
      .slide-left-leave-to[data-v-5be4b00c],
      .slide-right-enter[data-v-5be4b00c],
      .slide-right-leave-to[data-v-5be4b00c],
      .slide-up-enter[data-v-5be4b00c],
      .slide-up-leave-to[data-v-5be4b00c] {
        opacity: 0
      }

      .slide-left-enter[data-v-5be4b00c],
      .slide-right-leave-to[data-v-5be4b00c] {
        transform: translateX(var(--slide-translate))
      }

      .slide-left-leave-to[data-v-5be4b00c],
      .slide-right-enter[data-v-5be4b00c] {
        transform: translateX(calc(var(--slide-translate)*-1))
      }

      .slide-down-leave-to[data-v-5be4b00c],
      .slide-up-enter[data-v-5be4b00c] {
        transform: translateY(var(--slide-translate))
      }

      .slide-down-enter[data-v-5be4b00c],
      .slide-up-leave-to[data-v-5be4b00c] {
        transform: translateY(calc(var(--slide-translate)*-1))
      }
    </style>
    <style type="text/css">
      .vc-container {
        --white: #fff;
        --black: #000;
        --gray-100: #f7fafc;
        --gray-200: #edf2f7;
        --gray-300: #e2e8f0;
        --gray-400: #cbd5e0;
        --gray-500: #a0aec0;
        --gray-600: #718096;
        --gray-700: #4a5568;
        --gray-800: #2d3748;
        --gray-900: #1a202c;
        --red-100: #fff5f5;
        --red-200: #fed7d7;
        --red-300: #feb2b2;
        --red-400: #fc8181;
        --red-500: #f56565;
        --red-600: #e53e3e;
        --red-700: #c53030;
        --red-800: #9b2c2c;
        --red-900: #742a2a;
        --orange-100: #fffaf0;
        --orange-200: #feebc8;
        --orange-300: #fbd38d;
        --orange-400: #f6ad55;
        --orange-500: #ed8936;
        --orange-600: #dd6b20;
        --orange-700: #c05621;
        --orange-800: #9c4221;
        --orange-900: #7b341e;
        --yellow-100: ivory;
        --yellow-200: #fefcbf;
        --yellow-300: #faf089;
        --yellow-400: #f6e05e;
        --yellow-500: #ecc94b;
        --yellow-600: #d69e2e;
        --yellow-700: #b7791f;
        --yellow-800: #975a16;
        --yellow-900: #744210;
        --green-100: #f0fff4;
        --green-200: #c6f6d5;
        --green-300: #9ae6b4;
        --green-400: #68d391;
        --green-500: #48bb78;
        --green-600: #38a169;
        --green-700: #2f855a;
        --green-800: #276749;
        --green-900: #22543d;
        --teal-100: #e6fffa;
        --teal-200: #b2f5ea;
        --teal-300: #81e6d9;
        --teal-400: #4fd1c5;
        --teal-500: #38b2ac;
        --teal-600: #319795;
        --teal-700: #2c7a7b;
        --teal-800: #285e61;
        --teal-900: #234e52;
        --blue-100: #ebf8ff;
        --blue-200: #bee3f8;
        --blue-300: #90cdf4;
        --blue-400: #63b3ed;
        --blue-500: #4299e1;
        --blue-600: #3182ce;
        --blue-700: #2b6cb0;
        --blue-800: #2c5282;
        --blue-900: #2a4365;
        --indigo-100: #ebf4ff;
        --indigo-200: #c3dafe;
        --indigo-300: #a3bffa;
        --indigo-400: #7f9cf5;
        --indigo-500: #667eea;
        --indigo-600: #5a67d8;
        --indigo-700: #4c51bf;
        --indigo-800: #434190;
        --indigo-900: #3c366b;
        --purple-100: #faf5ff;
        --purple-200: #e9d8fd;
        --purple-300: #d6bcfa;
        --purple-400: #b794f4;
        --purple-500: #9f7aea;
        --purple-600: #805ad5;
        --purple-700: #6b46c1;
        --purple-800: #553c9a;
        --purple-900: #44337a;
        --pink-100: #fff5f7;
        --pink-200: #fed7e2;
        --pink-300: #fbb6ce;
        --pink-400: #f687b3;
        --pink-500: #ed64a6;
        --pink-600: #d53f8c;
        --pink-700: #b83280;
        --pink-800: #97266d;
        --pink-900: #702459
      }

      .vc-container.vc-red {
        --accent-100: var(--red-100);
        --accent-200: var(--red-200);
        --accent-300: var(--red-300);
        --accent-400: var(--red-400);
        --accent-500: var(--red-500);
        --accent-600: var(--red-600);
        --accent-700: var(--red-700);
        --accent-800: var(--red-800);
        --accent-900: var(--red-900)
      }

      .vc-container.vc-orange {
        --accent-100: var(--orange-100);
        --accent-200: var(--orange-200);
        --accent-300: var(--orange-300);
        --accent-400: var(--orange-400);
        --accent-500: var(--orange-500);
        --accent-600: var(--orange-600);
        --accent-700: var(--orange-700);
        --accent-800: var(--orange-800);
        --accent-900: var(--orange-900)
      }

      .vc-container.vc-yellow {
        --accent-100: var(--yellow-100);
        --accent-200: var(--yellow-200);
        --accent-300: var(--yellow-300);
        --accent-400: var(--yellow-400);
        --accent-500: var(--yellow-500);
        --accent-600: var(--yellow-600);
        --accent-700: var(--yellow-700);
        --accent-800: var(--yellow-800);
        --accent-900: var(--yellow-900)
      }

      .vc-container.vc-green {
        --accent-100: var(--green-100);
        --accent-200: var(--green-200);
        --accent-300: var(--green-300);
        --accent-400: var(--green-400);
        --accent-500: var(--green-500);
        --accent-600: var(--green-600);
        --accent-700: var(--green-700);
        --accent-800: var(--green-800);
        --accent-900: var(--green-900)
      }

      .vc-container.vc-teal {
        --accent-100: var(--teal-100);
        --accent-200: var(--teal-200);
        --accent-300: var(--teal-300);
        --accent-400: var(--teal-400);
        --accent-500: var(--teal-500);
        --accent-600: var(--teal-600);
        --accent-700: var(--teal-700);
        --accent-800: var(--teal-800);
        --accent-900: var(--teal-900)
      }

      .vc-container.vc-blue {
        --accent-100: var(--blue-100);
        --accent-200: var(--blue-200);
        --accent-300: var(--blue-300);
        --accent-400: var(--blue-400);
        --accent-500: var(--blue-500);
        --accent-600: var(--blue-600);
        --accent-700: var(--blue-700);
        --accent-800: var(--blue-800);
        --accent-900: var(--blue-900)
      }

      .vc-container.vc-indigo {
        --accent-100: var(--indigo-100);
        --accent-200: var(--indigo-200);
        --accent-300: var(--indigo-300);
        --accent-400: var(--indigo-400);
        --accent-500: var(--indigo-500);
        --accent-600: var(--indigo-600);
        --accent-700: var(--indigo-700);
        --accent-800: var(--indigo-800);
        --accent-900: var(--indigo-900)
      }

      .vc-container.vc-purple {
        --accent-100: var(--purple-100);
        --accent-200: var(--purple-200);
        --accent-300: var(--purple-300);
        --accent-400: var(--purple-400);
        --accent-500: var(--purple-500);
        --accent-600: var(--purple-600);
        --accent-700: var(--purple-700);
        --accent-800: var(--purple-800);
        --accent-900: var(--purple-900)
      }

      .vc-container.vc-pink {
        --accent-100: var(--pink-100);
        --accent-200: var(--pink-200);
        --accent-300: var(--pink-300);
        --accent-400: var(--pink-400);
        --accent-500: var(--pink-500);
        --accent-600: var(--pink-600);
        --accent-700: var(--pink-700);
        --accent-800: var(--pink-800);
        --accent-900: var(--pink-900)
      }

      .vc-container {
        --font-normal: 400;
        --font-medium: 500;
        --font-semibold: 600;
        --font-bold: 700;
        --text-xs: 12px;
        --text-sm: 14px;
        --text-base: 16px;
        --text-lg: 18px;
        --leading-snug: 1.375;
        --rounded: 0.25rem;
        --rounded-lg: 0.5rem;
        --rounded-full: 9999px;
        --shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
        --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        --shadow-inner: inset 0 2px 4px 0 rgba(0, 0, 0, 0.06);
        --slide-translate: 22px;
        --slide-duration: 0.15s;
        --slide-timing: ease;
        --day-content-transition-time: 0.13s ease-in;
        --weeknumber-offset: -34px;
        position: relative;
        display: inline-flex;
        width: max-content;
        height: max-content;
        font-family: BlinkMacSystemFont, -apple-system, Segoe UI, Roboto, Oxygen, Ubuntu, Cantarell, Fira Sans, Droid Sans, Helvetica Neue, Helvetica, Arial, sans-serif;
        color: var(--gray-900);
        background-color: var(--white);
        border: 1px solid;
        border-color: var(--gray-400);
        border-radius: var(--rounded-lg);
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        -webkit-tap-highlight-color: transparent
      }

      .vc-container,
      .vc-container * {
        box-sizing: border-box
      }

      .vc-container:focus,
      .vc-container :focus {
        outline: none
      }

      .vc-container [role=button],
      .vc-container button {
        cursor: pointer
      }

      .vc-container.vc-is-expanded {
        min-width: 100%
      }

      .vc-container .vc-container {
        border: none
      }

      .vc-container.vc-is-dark {
        color: var(--gray-100);
        background-color: var(--gray-900);
        border-color: var(--gray-700)
      }
    </style>
    <style type="text/css">
      .vc-pane-container {
        width: 100%;
        position: relative
      }

      .vc-pane-container.in-transition {
        overflow: hidden
      }

      .vc-pane-layout {
        display: grid
      }

      .vc-arrow {
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        -webkit-user-select: none;
        user-select: none;
        pointer-events: auto;
        color: var(--gray-600);
        border-width: 2px;
        border-style: solid;
        border-radius: var(--rounded);
        border-color: transparent
      }

      .vc-arrow:hover {
        background: var(--gray-200)
      }

      .vc-arrow:focus {
        border-color: var(--gray-300)
      }

      .vc-arrow.is-disabled {
        opacity: .25;
        pointer-events: none;
        cursor: not-allowed
      }

      .vc-day-popover-container {
        color: var(--white);
        background-color: var(--gray-800);
        border: 1px solid;
        border-color: var(--gray-700);
        border-radius: var(--rounded);
        font-size: var(--text-xs);
        font-weight: var(--font-medium);
        padding: 4px 8px;
        box-shadow: var(--shadow)
      }

      .vc-day-popover-header {
        font-size: var(--text-xs);
        color: var(--gray-300);
        font-weight: var(--font-semibold);
        text-align: center
      }

      .vc-arrows-container {
        width: 100%;
        position: absolute;
        top: 0;
        display: flex;
        justify-content: space-between;
        padding: 8px 10px;
        pointer-events: none
      }

      .vc-arrows-container.title-left {
        justify-content: flex-end
      }

      .vc-arrows-container.title-right {
        justify-content: flex-start
      }

      .vc-is-dark .vc-arrow {
        color: var(--white)
      }

      .vc-is-dark .vc-arrow:hover {
        background: var(--gray-800)
      }

      .vc-is-dark .vc-arrow:focus {
        border-color: var(--gray-700)
      }

      .vc-is-dark .vc-day-popover-container {
        color: var(--gray-800);
        background-color: var(--white);
        border-color: var(--gray-100)
      }

      .vc-is-dark .vc-day-popover-header {
        color: var(--gray-700)
      }
    </style>
    <style type="text/css">
      .vc-select[data-v-14bdabaf] {
        position: relative
      }

      .vc-select select[data-v-14bdabaf] {
        flex-grow: 1;
        display: block;
        -webkit-appearance: none;
        appearance: none;
        width: 52px;
        height: 30px;
        font-size: var(--text-base);
        font-weight: var(--font-medium);
        text-align: left;
        background-color: var(--gray-200);
        border: 2px solid;
        border-color: var(--gray-200);
        color: var(--gray-900);
        padding: 0 20px 0 8px;
        border-radius: var(--rounded);
        line-height: var(--leading-tight);
        text-indent: 0;
        cursor: pointer;
        -moz-padding-start: 3px
      }

      .vc-select select[data-v-14bdabaf]:hover {
        color: var(--gray-600)
      }

      .vc-select select[data-v-14bdabaf]:focus {
        outline: 0;
        border-color: var(--accent-400);
        background-color: var(--white)
      }

      .vc-select-arrow[data-v-14bdabaf] {
        display: flex;
        align-items: center;
        pointer-events: none;
        position: absolute;
        top: 0;
        bottom: 0;
        right: 0;
        padding: 0 4px 0 0;
        color: var(--gray-500)
      }

      .vc-select-arrow svg[data-v-14bdabaf] {
        width: 16px;
        height: 16px;
        fill: currentColor
      }

      .vc-is-dark select[data-v-14bdabaf] {
        background: var(--gray-700);
        color: var(--gray-100);
        border-color: var(--gray-700)
      }

      .vc-is-dark select[data-v-14bdabaf]:hover {
        color: var(--gray-400)
      }

      .vc-is-dark select[data-v-14bdabaf]:focus {
        border-color: var(--accent-500);
        background-color: var(--gray-800)
      }
    </style>
    <style type="text/css">
      .vc-time-picker[data-v-021f332c] {
        display: flex;
        align-items: center;
        padding: 8px
      }

      .vc-time-picker.vc-invalid[data-v-021f332c] {
        pointer-events: none;
        opacity: .5
      }

      .vc-time-picker.vc-bordered[data-v-021f332c] {
        border-top: 1px solid var(--gray-400)
      }

      .vc-date-time[data-v-021f332c] {
        margin-left: 8px
      }

      .vc-disabled[data-v-021f332c] {
        pointer-events: none;
        opacity: .5
      }

      .vc-time-icon[data-v-021f332c] {
        width: 16px;
        height: 16px;
        color: var(--gray-600)
      }

      .vc-date[data-v-021f332c] {
        display: flex;
        align-items: center;
        font-size: var(--text-sm);
        font-weight: var(--font-semibold);
        text-transform: uppercase;
        padding: 0 0 4px 4px;
        margin-top: -4px
      }

      .vc-date .vc-weekday[data-v-021f332c] {
        color: var(--gray-700);
        letter-spacing: var(--tracking-wide)
      }

      .vc-date .vc-month[data-v-021f332c] {
        color: var(--accent-600);
        margin-left: 8px
      }

      .vc-date .vc-day[data-v-021f332c] {
        color: var(--accent-600);
        margin-left: 4px
      }

      .vc-date .vc-year[data-v-021f332c] {
        color: var(--gray-500);
        margin-left: 8px
      }

      .vc-am-pm[data-v-021f332c],
      .vc-time[data-v-021f332c] {
        display: flex;
        align-items: center
      }

      .vc-am-pm[data-v-021f332c] {
        background: var(--gray-200);
        margin-left: 8px;
        padding: 4px;
        border-radius: var(--rounded);
        height: 30px
      }

      .vc-am-pm button[data-v-021f332c] {
        color: var(--gray-900);
        font-size: var(--text-sm);
        font-weight: var(--font-medium);
        padding: 0 4px;
        background: transparent;
        border: 2px solid transparent;
        border-radius: var(--rounded);
        line-height: var(--leading-snug)
      }

      .vc-am-pm button[data-v-021f332c]:hover {
        color: var(--gray-600)
      }

      .vc-am-pm button[data-v-021f332c]:focus {
        border-color: var(--accent-400)
      }

      .vc-am-pm button.active[data-v-021f332c] {
        background: var(--accent-600);
        color: var(--white)
      }

      .vc-am-pm button.active[data-v-021f332c]:hover {
        background: var(--accent-500)
      }

      .vc-am-pm button.active[data-v-021f332c]:focus {
        border-color: var(--accent-400)
      }

      .vc-is-dark .vc-time-picker[data-v-021f332c] {
        border-color: var(--gray-700)
      }

      .vc-is-dark .vc-time-icon[data-v-021f332c],
      .vc-is-dark .vc-weekday[data-v-021f332c] {
        color: var(--gray-400)
      }

      .vc-is-dark .vc-day[data-v-021f332c],
      .vc-is-dark .vc-month[data-v-021f332c] {
        color: var(--accent-400)
      }

      .vc-is-dark .vc-year[data-v-021f332c] {
        color: var(--gray-500)
      }

      .vc-is-dark .vc-am-pm[data-v-021f332c] {
        background: var(--gray-700)
      }

      .vc-is-dark .vc-am-pm[data-v-021f332c]:focus {
        border-color: var(--accent-500)
      }

      .vc-is-dark .vc-am-pm button[data-v-021f332c] {
        color: var(--gray-100)
      }

      .vc-is-dark .vc-am-pm button[data-v-021f332c]:hover {
        color: var(--gray-400)
      }

      .vc-is-dark .vc-am-pm button[data-v-021f332c]:focus {
        border-color: var(--accent-500)
      }

      .vc-is-dark .vc-am-pm button.active[data-v-021f332c] {
        background: var(--accent-500);
        color: var(--white)
      }

      .vc-is-dark .vc-am-pm button.active[data-v-021f332c]:hover {
        background: var(--accent-600)
      }

      .vc-is-dark .vc-am-pm button.active[data-v-021f332c]:focus {
        border-color: var(--accent-500)
      }
    </style>
    <style type="text/css">
      .VueCarousel-navigation-button[data-v-453ad8cd] {
        position: absolute;
        top: 50%;
        box-sizing: border-box;
        color: #000;
        text-decoration: none;
        appearance: none;
        border: none;
        background-color: transparent;
        padding: 0;
        cursor: pointer;
        outline: none;
      }

      .VueCarousel-navigation-button[data-v-453ad8cd]:focus {
        outline: 1px solid lightblue;
      }

      .VueCarousel-navigation-next[data-v-453ad8cd] {
        right: 0;
        transform: translateY(-50%) translateX(100%);
        font-family: "system";
      }

      .VueCarousel-navigation-prev[data-v-453ad8cd] {
        left: 0;
        transform: translateY(-50%) translateX(-100%);
        font-family: "system";
      }

      .VueCarousel-navigation--disabled[data-v-453ad8cd] {
        opacity: 0.5;
        cursor: default;
      }

      /* Define the "system" font family */
      @font-face {
        font-family: system;
        font-style: normal;
        font-weight: 300;
        src: local(".SFNSText-Light"), local(".HelveticaNeueDeskInterface-Light"),
          local(".LucidaGrandeUI"), local("Ubuntu Light"), local("Segoe UI Symbol"),
          local("Roboto-Light"), local("DroidSans"), local("Tahoma");
      }
    </style>
    <style type="text/css">
      .VueCarousel-pagination[data-v-438fd353] {
        width: 100%;
        text-align: center;
      }

      .VueCarousel-pagination--top-overlay[data-v-438fd353] {
        position: absolute;
        top: 0;
      }

      .VueCarousel-pagination--bottom-overlay[data-v-438fd353] {
        position: absolute;
        bottom: 0;
      }

      .VueCarousel-dot-container[data-v-438fd353] {
        display: inline-block;
        margin: 0 auto;
        padding: 0;
      }

      .VueCarousel-dot[data-v-438fd353] {
        display: inline-block;
        cursor: pointer;
        appearance: none;
        border: none;
        background-clip: content-box;
        box-sizing: content-box;
        padding: 0;
        border-radius: 100%;
        outline: none;
      }

      .VueCarousel-dot[data-v-438fd353]:focus {
        outline: 1px solid lightblue;
      }
    </style>
    <style type="text/css">
      .VueCarousel-slide {
        flex-basis: inherit;
        flex-grow: 0;
        flex-shrink: 0;
        user-select: none;
        backface-visibility: hidden;
        -webkit-touch-callout: none;
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        outline: none;
      }

      .VueCarousel-slide-adjustableHeight {
        display: table;
        flex-basis: auto;
        width: 100%;
      }
    </style>
    <style type="text/css">
      .VueCarousel {
        display: flex;
        flex-direction: column;
        position: relative;
      }

      .VueCarousel--reverse {
        flex-direction: column-reverse;
      }

      .VueCarousel-wrapper {
        width: 100%;
        position: relative;
        overflow: hidden;
      }

      .VueCarousel-inner {
        display: flex;
        flex-direction: row;
        backface-visibility: hidden;
      }

      .VueCarousel-inner--center {
        justify-content: center;
      }
    </style>
    <script type="text/javascript" async="" src="https://analytics.tiktok.com/i18n/pixel/static/main.MWI0MWYzMDk5MQ.js" data-id="C60IT1PD6FVPRQLB3O4G"></script>
    <script async="" id="DLFNPMMP1" type="text/javascript" src="https://cdn.preciso.net/aud/clientjs/ptag.js?1529"></script>
    <script async="" src="https://tags.creativecdn.com/rrgkGaL9jmrkloU133g2.js"></script>
    <script type="text/javascript" async="" src="https://js.go2sdk.com/v2/tune.js"></script>
    <script type="text/javascript" async="" src="https://analytics.tiktok.com/i18n/pixel/events.js?sdkid=C60IT1PD6FVPRQLB3O4G&amp;lib=ttq"></script>
    <script type="text/javascript" async="" src="https://s2.adform.net/banners/scripts/st/trackpoint-async.js"></script>
    <script id="scarab-js-api" src="//cdn.scarabresearch.com/js/17DBE5C755B29B0A/scarab-v2.js"></script>
    <script type="text/javascript" async="" src="https://analytics.tiktok.com/i18n/pixel/static/main.MWI0MWYzMDk5MQ.js" data-id="C60IT1PD6FVPRQLB3O4G"></script>
    <script async="" src="https://tags.creativecdn.com/rrgkGaL9jmrkloU133g2.js"></script>
    <script type="text/javascript" async="" src="https://js.go2sdk.com/v2/tune.js"></script>
    <script type="text/javascript" async="" src="https://analytics.tiktok.com/i18n/pixel/events.js?sdkid=C60IT1PD6FVPRQLB3O4G&amp;lib=ttq"></script>
    <script async="" id="DLFNPMMP1" type="text/javascript" src="https://cdn.preciso.net/aud/clientjs/ptag.js?1529"></script>
    <script type="text/javascript" async="" src="https://analytics.tiktok.com/i18n/pixel/static/main.MWI0MWYzMDk5MQ.js" data-id="C60IT1PD6FVPRQLB3O4G"></script>
    <script async="" id="DLFNPMMP1" type="text/javascript" src="https://cdn.preciso.net/aud/clientjs/ptag.js?1529"></script>
    <script async="" src="https://tags.creativecdn.com/rrgkGaL9jmrkloU133g2.js"></script>
    <script type="text/javascript" async="" src="https://js.go2sdk.com/v2/tune.js"></script>
    <script type="text/javascript" async="" src="https://analytics.tiktok.com/i18n/pixel/events.js?sdkid=C60IT1PD6FVPRQLB3O4G&amp;lib=ttq"></script>
    <script async="" id="DLFNPM101" type="text/javascript" src="https://cdn.preciso.net/aud/clientjs/1529.js?"></script>
    <script type="text/javascript" async="" src="https://analytics.tiktok.com/i18n/pixel/static/main.MWI0MWYzMDk5MQ.js" data-id="C60IT1PD6FVPRQLB3O4G"></script>
    <script type="text/javascript" async="" src="https://www.google-analytics.com/plugins/ua/ec.js"></script>
    <script async="" src="https://tags.creativecdn.com/rrgkGaL9jmrkloU133g2.js"></script>
    <script type="text/javascript" async="" src="https://js.go2sdk.com/v2/tune.js"></script>
    <script type="text/javascript" async="" src="https://analytics.tiktok.com/i18n/pixel/events.js?sdkid=C60IT1PD6FVPRQLB3O4G&amp;lib=ttq"></script>
    <script async="" src="https://connect.facebook.net/en_US/fbevents.js"></script>
    <script async="" id="DLFNPMMP1" type="text/javascript" src="https://cdn.preciso.net/aud/clientjs/ptag.js?1529"></script>
    <script type="text/javascript" async="" src="https://cdn.taboola.com/libtrc/unip/1551427/tfa.js"></script>
    <script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script>
    <script type="text/javascript" async="" src="https://www.googletagmanager.com/gtag/js?id=AW-866667944&amp;l=dataLayer&amp;cx=c"></script>
    <script type="text/javascript" async="" src="https://www.googletagmanager.com/gtag/js?id=G-EE7NCXXNGH&amp;l=dataLayer&amp;cx=c"></script>
    <script type="text/javascript" async="" src="https://www.googletagmanager.com/gtag/js?id=G-4ML9Y7NQQS&amp;l=dataLayer&amp;cx=c"></script>
    <script type="text/javascript" async="" src="https://www.googletagmanager.com/gtag/js?id=G-EYCJEVSH2R&amp;l=dataLayer&amp;cx=c"></script>
    <script type="text/javascript" async="" src="https://www.googletagmanager.com/gtag/js?id=G-Q0XG3EX629&amp;l=dataLayer&amp;cx=c"></script>
    <script src="https://apis.google.com/_/scs/abc-static/_/js/k=gapi.lb.tr.jXo0cupDMZc.O/m=auth2/rt=j/sv=1/d=1/ed=1/rs=AHpOoo-9zqSy4JhZXkzck_B5tmG20Vl6rg/cb=gapi.loaded_0?le=scs" async=""></script>
    <script src="https://connect.facebook.net/en_US/sdk.js?hash=71239b7fc1481d434a3e4e919c26d3ec" async="" crossorigin="anonymous"></script>
    <script id="facebook-jssdk" src="https://connect.facebook.net/en_US/sdk.js"></script>
    <script async="" src="https://www.googletagmanager.com/gtm.js?id=GTM-WXMZ3JD"></script>
    <script async="" src="//epttavm.api.useinsider.com/ins.js?id=10002579"></script>
    <link rel="preload" as="style" href="https://cdn-fe.pttavm.com/_nuxt/css/5a448cc.css">
    <script charset="utf-8" src="https://cdn-fe.pttavm.com/_nuxt/d5655e9.js"></script>
    <script src="https://apis.google.com/js/platform.js?onload=onGapiLoad" async="true" defer="defer" id="auth2_script_id" gapi_processed="true"></script>
    <link rel="preload" as="style" href="https://cdn-fe.pttavm.com/_nuxt/css/826ebaf.css">
    <script charset="utf-8" src="https://cdn-fe.pttavm.com/_nuxt/2871365.js"></script>
    <link rel="preload" as="style" href="https://cdn-fe.pttavm.com/_nuxt/css/89404d3.css">
    <script charset="utf-8" src="https://cdn-fe.pttavm.com/_nuxt/9a18dd5.js"></script>
    <link rel="preload" as="style" href="https://cdn-fe.pttavm.com/_nuxt/css/07347c2.css">
    <script charset="utf-8" src="https://cdn-fe.pttavm.com/_nuxt/4e38185.js"></script>
    <link rel="preload" as="style" href="https://cdn-fe.pttavm.com/_nuxt/css/5a10128.css">
    <script charset="utf-8" src="https://cdn-fe.pttavm.com/_nuxt/20a9a69.js"></script>
    <script charset="utf-8" src="https://cdn-fe.pttavm.com/_nuxt/17a6121.js"></script>
    <link rel="preload" as="style" href="https://cdn-fe.pttavm.com/_nuxt/css/0dcbcb5.css">
    <script charset="utf-8" src="https://cdn-fe.pttavm.com/_nuxt/00b58b8.js"></script>
    <link rel="preload" as="style" href="https://cdn-fe.pttavm.com/_nuxt/css/b8c46be.css">
    <script charset="utf-8" src="https://cdn-fe.pttavm.com/_nuxt/b32f013.js"></script>
    <link rel="preload" as="style" href="https://cdn-fe.pttavm.com/_nuxt/css/3f91190.css">
    <script charset="utf-8" src="https://cdn-fe.pttavm.com/_nuxt/c2b3e3a.js"></script>
    <script charset="utf-8" src="https://cdn-fe.pttavm.com/_nuxt/63323ee.js"></script>
    <script charset="utf-8" src="https://cdn-fe.pttavm.com/_nuxt/1e8077f.js"></script>
    <link rel="preload" as="style" href="https://cdn-fe.pttavm.com/_nuxt/css/6346062.css">
    <script charset="utf-8" src="https://cdn-fe.pttavm.com/_nuxt/3b9f06c.js"></script>
    <link rel="preload" as="style" href="https://cdn-fe.pttavm.com/_nuxt/css/593b3ae.css">
    <script charset="utf-8" src="https://cdn-fe.pttavm.com/_nuxt/69e0bfa.js"></script>
    <link rel="preload" as="style" href="https://cdn-fe.pttavm.com/_nuxt/css/c4cf815.css">
    <script charset="utf-8" src="https://cdn-fe.pttavm.com/_nuxt/9efec5c.js"></script>
    <link rel="preload" as="style" href="https://cdn-fe.pttavm.com/_nuxt/css/73ddc33.css">
    <script charset="utf-8" src="https://cdn-fe.pttavm.com/_nuxt/8b21185.js"></script>
    <link rel="preload" as="style" href="https://cdn-fe.pttavm.com/_nuxt/css/e4725f1.css">
    <script charset="utf-8" src="https://cdn-fe.pttavm.com/_nuxt/cfb8e67.js"></script>
    <script charset="utf-8" src="https://cdn-fe.pttavm.com/_nuxt/cd4e832.js"></script>
    <script charset="utf-8" src="https://cdn-fe.pttavm.com/_nuxt/47f2cd5.js"></script>
    <script charset="utf-8" src="https://cdn-fe.pttavm.com/_nuxt/51964d5.js"></script>
    <link rel="preload" as="style" href="https://cdn-fe.pttavm.com/_nuxt/css/d8ce515.css">
    <script charset="utf-8" src="https://cdn-fe.pttavm.com/_nuxt/8c6a0c9.js"></script>
    <link rel="preload" as="style" href="https://cdn-fe.pttavm.com/_nuxt/css/dc8d7da.css">
    <script charset="utf-8" src="https://cdn-fe.pttavm.com/_nuxt/ea9358f.js"></script>
    <link rel="preload" as="style" href="https://cdn-fe.pttavm.com/_nuxt/css/b49702e.css">
    <script charset="utf-8" src="https://cdn-fe.pttavm.com/_nuxt/a8ca571.js"></script>
    <script type="text/javascript" async="" src="https://googleads.g.doubleclick.net/pagead/viewthroughconversion/866667944/?random=1706031152525&amp;cv=11&amp;fst=1706031152525&amp;bg=ffffff&amp;guid=ON&amp;async=1&amp;gtm=45He41h0v840982626&amp;gcd=11l1l1l1l1&amp;dma_cps=sypham&amp;dma=1&amp;tag_exp=71847096&amp;u_w=1440&amp;u_h=900&amp;url=https%3A%2F%2Fwww.pttavm.com%2F%3Fgad_source%3D1%26gclid%3DCjwKCAiA5L2tBhBTEiwAdSxJX79JDQVKSZr7LqZ02PRVdS6YPAsTKn5VjfQq-qXlRiP0h2lpb4-9DBoC6mcQAvD_BwE&amp;ref=https%3A%2F%2Fwww.google.com%2F&amp;hn=www.googleadservices.com&amp;frm=0&amp;tiba=PttAVM.com%20%E2%80%93%20G%C3%BCvenli%20Al%C4%B1%C5%9Fveri%C5%9F%20Merkezi&amp;auid=55697448.1706031153&amp;fledge=1&amp;uaa=arm&amp;uab=64&amp;uafvl=Not_A%2520Brand%3B8.0.0.0%7CChromium%3B120.0.6099.234%7CGoogle%2520Chrome%3B120.0.6099.234&amp;uamb=0&amp;uap=macOS&amp;uapv=14.2.1&amp;uaw=0&amp;data=ecomm_pagetype%3DHome%20Page&amp;rfmt=3&amp;fmt=4"></script>
    <link rel="preload" as="style" href="https://cdn-fe.pttavm.com/_nuxt/css/a188b69.css">
    <script charset="utf-8" src="https://cdn-fe.pttavm.com/_nuxt/3cde572.js"></script>
    <script charset="utf-8" src="https://analytics.tiktok.com/i18n/pixel/static/identify_0a875.js"></script>
    <script type="text/javascript" async="" src="https://googleads.g.doubleclick.net/pagead/viewthroughconversion/866667944/?random=1706031153986&amp;cv=11&amp;fst=1706031153986&amp;bg=ffffff&amp;guid=ON&amp;async=1&amp;gtm=45be41h0v893881134z8840982626&amp;gcd=11l1l1l1l1&amp;dma_cps=sypham&amp;dma=1&amp;tag_exp=71847096&amp;u_w=1440&amp;u_h=900&amp;url=https%3A%2F%2Fwww.pttavm.com%2F%3Fgad_source%3D1%26gclid%3DCjwKCAiA5L2tBhBTEiwAdSxJX79JDQVKSZr7LqZ02PRVdS6YPAsTKn5VjfQq-qXlRiP0h2lpb4-9DBoC6mcQAvD_BwE&amp;ref=https%3A%2F%2Fwww.google.com%2F&amp;hn=www.googleadservices.com&amp;frm=0&amp;tiba=PttAVM.com%20%E2%80%93%20G%C3%BCvenli%20Al%C4%B1%C5%9Fveri%C5%9F%20Merkezi&amp;auid=55697448.1706031153&amp;fledge=1&amp;uaa=arm&amp;uab=64&amp;uafvl=Not_A%2520Brand%3B8.0.0.0%7CChromium%3B120.0.6099.234%7CGoogle%2520Chrome%3B120.0.6099.234&amp;uamb=0&amp;uap=macOS&amp;uapv=14.2.1&amp;uaw=0&amp;data=event%3Dgtag.config&amp;rfmt=3&amp;fmt=4"></script>
    <link rel="preload" as="style" href="https://cdn-fe.pttavm.com/_nuxt/css/fd54bc5.css">
    <script charset="utf-8" src="https://cdn-fe.pttavm.com/_nuxt/d42809d.js"></script>
    <link rel="stylesheet" type="text/css" href="https://assets.api.useinsider.com/css/info.min.css" classname="ins-frameless-css" class="ins-frameless-css" id="ins-frameless-css">
    <script type="text/javascript" src="https://eitri.api.useinsider.com/static/info.js" id="ins-frameless-js"></script>
    <link rel="preload" as="style" href="https://cdn-fe.pttavm.com/_nuxt/css/2f7eb17.css">
    <script charset="utf-8" src="https://cdn-fe.pttavm.com/_nuxt/d997b7e.js"></script>
    <link rel="stylesheet" href="https://assets.api.useinsider.com/css/opt-in-dialog.css" id="insider-web-push-popup-css">
    <script src="https://eitri.api.useinsider.com/static/native-push-sdk.js" async="" charset=""></script>
    <meta http-equiv="origin-trial" content="AwnOWg2dzaxHPelVjqOT/Y02cSxnG2FkjXO7DlX9VZF0eyD0In8IIJ9fbDFZGXvxNvn6HaF51qFHycDGLOkj1AUAAACAeyJvcmlnaW4iOiJodHRwczovL2NyaXRlby5jb206NDQzIiwiZmVhdHVyZSI6IlByaXZhY3lTYW5kYm94QWRzQVBJcyIsImV4cGlyeSI6MTY5NTE2Nzk5OSwiaXNTdWJkb21haW4iOnRydWUsImlzVGhpcmRQYXJ0eSI6dHJ1ZX0=">
    <script src="https://eitri.api.useinsider.com/static/ins-smart-recommender.js" async="" charset="UTF-8"></script>
    <script type="text/javascript" async="" src="https://googleads.g.doubleclick.net/pagead/viewthroughconversion/866667944/?random=1706031156200&amp;cv=11&amp;fst=1706031156200&amp;bg=ffffff&amp;guid=ON&amp;async=1&amp;gtm=45be41h0v893881134z8840982626&amp;gcd=11l1l1l1l1&amp;dma_cps=sypham&amp;dma=1&amp;tag_exp=71847096&amp;u_w=1440&amp;u_h=900&amp;url=https%3A%2F%2Fwww.pttavm.com%2Fbosch-mmb6172s-cam-hazneli-blender-p-745468655&amp;ref=https%3A%2F%2Fwww.google.com%2F&amp;hn=www.googleadservices.com&amp;frm=0&amp;tiba=Bosch%20MMB6172S%20Vita%20Power%201200%20W%20Blender%20-%20PttAVM.com&amp;auid=55697448.1706031153&amp;fledge=1&amp;uaa=arm&amp;uab=64&amp;uafvl=Not_A%2520Brand%3B8.0.0.0%7CChromium%3B120.0.6099.234%7CGoogle%2520Chrome%3B120.0.6099.234&amp;uamb=0&amp;uap=macOS&amp;uapv=14.2.1&amp;uaw=0&amp;data=event%3Dgtag.config&amp;rfmt=3&amp;fmt=4"></script>
    <script type="text/javascript" async="" src="https://googleads.g.doubleclick.net/pagead/viewthroughconversion/866667944/?random=1706031156216&amp;cv=11&amp;fst=1706031156216&amp;bg=ffffff&amp;guid=ON&amp;async=1&amp;gtm=45He41h0v840982626&amp;gcd=11l1l1l1l1&amp;dma_cps=sypham&amp;dma=1&amp;tag_exp=71847096&amp;u_w=1440&amp;u_h=900&amp;url=https%3A%2F%2Fwww.pttavm.com%2Fbosch-mmb6172s-cam-hazneli-blender-p-745468655&amp;ref=https%3A%2F%2Fwww.google.com%2F&amp;hn=www.googleadservices.com&amp;frm=0&amp;tiba=Bosch%20MMB6172S%20Vita%20Power%201200%20W%20Blender%20-%20PttAVM.com&amp;userId=guest_00ba9bf3615082a4fac68cc26a&amp;auid=55697448.1706031153&amp;fledge=1&amp;uaa=arm&amp;uab=64&amp;uafvl=Not_A%2520Brand%3B8.0.0.0%7CChromium%3B120.0.6099.234%7CGoogle%2520Chrome%3B120.0.6099.234&amp;uamb=0&amp;uap=macOS&amp;uapv=14.2.1&amp;uaw=0&amp;data=ecomm_pagetype%3DDetail%20Page%3Becomm_prodid%3D745468655%3Becomm_productprice%3D2890.00%3Bpcat%3DBlender%5C%2C%20Mikser%20ve%20Mutfak%20Robotlar%C4%B1&amp;rfmt=3&amp;fmt=4"></script>
    <script src="https://eitri.api.useinsider.com/static/ins-smart-recommender.js" async="" charset="UTF-8"></script>
    <script src="https://eitri.api.useinsider.com/static/ins-countdown.js?v=1.0.3" async="" charset=""></script>
    <script src="https://eitri.api.useinsider.com/static/ins-animation.js?v=1.0.1" async="" charset=""></script>
    <script type="text/javascript" async="" src="https://googleads.g.doubleclick.net/pagead/viewthroughconversion/866667944/?random=1706031157604&amp;cv=11&amp;fst=1706031157604&amp;bg=ffffff&amp;guid=ON&amp;async=1&amp;gtm=45He41h0v840982626&amp;gcd=11l1l1l1l1&amp;dma_cps=sypham&amp;dma=1&amp;tag_exp=71847096&amp;u_w=1440&amp;u_h=900&amp;url=https%3A%2F%2Fwww.pttavm.com%2F%3Fgad_source%3D1%26gclid%3DCjwKCAiA5L2tBhBTEiwAdSxJX79JDQVKSZr7LqZ02PRVdS6YPAsTKn5VjfQq-qXlRiP0h2lpb4-9DBoC6mcQAvD_BwE&amp;ref=https%3A%2F%2Fwww.google.com%2F&amp;hn=www.googleadservices.com&amp;frm=0&amp;tiba=Bosch%20MMB6172S%20Vita%20Power%201200%20W%20Blender%20-%20PttAVM.com&amp;userId=guest_00ba9bf3615082a4fac68cc26a&amp;auid=55697448.1706031153&amp;fledge=1&amp;uaa=arm&amp;uab=64&amp;uafvl=Not_A%2520Brand%3B8.0.0.0%7CChromium%3B120.0.6099.234%7CGoogle%2520Chrome%3B120.0.6099.234&amp;uamb=0&amp;uap=macOS&amp;uapv=14.2.1&amp;uaw=0&amp;data=ecomm_pagetype%3DHome%20Page&amp;rfmt=3&amp;fmt=4"></script>
    <script type="text/javascript" async="" src="https://googleads.g.doubleclick.net/pagead/viewthroughconversion/866667944/?random=1706031157621&amp;cv=11&amp;fst=1706031157621&amp;bg=ffffff&amp;guid=ON&amp;async=1&amp;gtm=45be41h0v893881134z8840982626&amp;gcd=11l1l1l1l1&amp;dma_cps=sypham&amp;dma=1&amp;tag_exp=71847096&amp;u_w=1440&amp;u_h=900&amp;url=https%3A%2F%2Fwww.pttavm.com%2F%3Fgad_source%3D1%26gclid%3DCjwKCAiA5L2tBhBTEiwAdSxJX79JDQVKSZr7LqZ02PRVdS6YPAsTKn5VjfQq-qXlRiP0h2lpb4-9DBoC6mcQAvD_BwE&amp;ref=https%3A%2F%2Fwww.google.com%2F&amp;hn=www.googleadservices.com&amp;frm=0&amp;tiba=Bosch%20MMB6172S%20Vita%20Power%201200%20W%20Blender%20-%20PttAVM.com&amp;auid=55697448.1706031153&amp;fledge=1&amp;uaa=arm&amp;uab=64&amp;uafvl=Not_A%2520Brand%3B8.0.0.0%7CChromium%3B120.0.6099.234%7CGoogle%2520Chrome%3B120.0.6099.234&amp;uamb=0&amp;uap=macOS&amp;uapv=14.2.1&amp;uaw=0&amp;data=event%3Dgtag.config&amp;rfmt=3&amp;fmt=4"></script>
    <style type="text/css" data-fbcssmodules="css:fb.css.base css:fb.css.dialog css:fb.css.iframewidget css:fb.css.customer_chat_plugin_iframe">
      .fb_hidden {
        position: absolute;
        top: -10000px;
        z-index: 10001
      }

      .fb_reposition {
        overflow: hidden;
        position: relative
      }

      .fb_invisible {
        display: none
      }

      .fb_reset {
        background: none;
        border: 0;
        border-spacing: 0;
        color: #000;
        cursor: auto;
        direction: ltr;
        font-family: 'lucida grande', tahoma, verdana, arial, sans-serif;
        font-size: 11px;
        font-style: normal;
        font-variant: normal;
        font-weight: normal;
        letter-spacing: normal;
        line-height: 1;
        margin: 0;
        overflow: visible;
        padding: 0;
        text-align: left;
        text-decoration: none;
        text-indent: 0;
        text-shadow: none;
        text-transform: none;
        visibility: visible;
        white-space: normal;
        word-spacing: normal
      }

      .fb_reset>div {
        overflow: hidden
      }

      @keyframes fb_transform {
        from {
          opacity: 0;
          transform: scale(.95)
        }

        to {
          opacity: 1;
          transform: scale(1)
        }
      }

      .fb_animate {
        animation: fb_transform .3s forwards
      }

      .fb_hidden {
        position: absolute;
        top: -10000px;
        z-index: 10001
      }

      .fb_reposition {
        overflow: hidden;
        position: relative
      }

      .fb_invisible {
        display: none
      }

      .fb_reset {
        background: none;
        border: 0;
        border-spacing: 0;
        color: #000;
        cursor: auto;
        direction: ltr;
        font-family: 'lucida grande', tahoma, verdana, arial, sans-serif;
        font-size: 11px;
        font-style: normal;
        font-variant: normal;
        font-weight: normal;
        letter-spacing: normal;
        line-height: 1;
        margin: 0;
        overflow: visible;
        padding: 0;
        text-align: left;
        text-decoration: none;
        text-indent: 0;
        text-shadow: none;
        text-transform: none;
        visibility: visible;
        white-space: normal;
        word-spacing: normal
      }

      .fb_reset>div {
        overflow: hidden
      }

      @keyframes fb_transform {
        from {
          opacity: 0;
          transform: scale(.95)
        }

        to {
          opacity: 1;
          transform: scale(1)
        }
      }

      .fb_animate {
        animation: fb_transform .3s forwards
      }

      .fb_dialog {
        background: rgba(82, 82, 82, .7);
        position: absolute;
        top: -10000px;
        z-index: 10001
      }

      .fb_dialog_advanced {
        border-radius: 8px;
        padding: 10px
      }

      .fb_dialog_content {
        background: #fff;
        color: #373737
      }

      .fb_dialog_close_icon {
        background: url(https://connect.facebook.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 0 transparent;
        cursor: pointer;
        display: block;
        height: 15px;
        position: absolute;
        right: 18px;
        top: 17px;
        width: 15px
      }

      .fb_dialog_mobile .fb_dialog_close_icon {
        left: 5px;
        right: auto;
        top: 5px
      }

      .fb_dialog_padding {
        background-color: transparent;
        position: absolute;
        width: 1px;
        z-index: -1
      }

      .fb_dialog_close_icon:hover {
        background: url(https://connect.facebook.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 -15px transparent
      }

      .fb_dialog_close_icon:active {
        background: url(https://connect.facebook.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 -30px transparent
      }

      .fb_dialog_iframe {
        line-height: 0
      }

      .fb_dialog_content .dialog_title {
        background: #6d84b4;
        border: 1px solid #365899;
        color: #fff;
        font-size: 14px;
        font-weight: bold;
        margin: 0
      }

      .fb_dialog_content .dialog_title>span {
        background: url(https://connect.facebook.net/rsrc.php/v3/yd/r/Cou7n-nqK52.gif) no-repeat 5px 50%;
        float: left;
        padding: 5px 0 7px 26px
      }

      body.fb_hidden {
        height: 100%;
        left: 0;
        margin: 0;
        overflow: visible;
        position: absolute;
        top: -10000px;
        transform: none;
        width: 100%
      }

      .fb_dialog.fb_dialog_mobile.loading {
        background: url(https://connect.facebook.net/rsrc.php/v3/ya/r/3rhSv5V8j3o.gif) white no-repeat 50% 50%;
        min-height: 100%;
        min-width: 100%;
        overflow: hidden;
        position: absolute;
        top: 0;
        z-index: 10001
      }

      .fb_dialog.fb_dialog_mobile.loading.centered {
        background: none;
        height: auto;
        min-height: initial;
        min-width: initial;
        width: auto
      }

      .fb_dialog.fb_dialog_mobile.loading.centered #fb_dialog_loader_spinner {
        width: 100%
      }

      .fb_dialog.fb_dialog_mobile.loading.centered .fb_dialog_content {
        background: none
      }

      .loading.centered #fb_dialog_loader_close {
        clear: both;
        color: #fff;
        display: block;
        font-size: 18px;
        padding-top: 20px
      }

      #fb-root #fb_dialog_ipad_overlay {
        background: rgba(0, 0, 0, .4);
        bottom: 0;
        left: 0;
        min-height: 100%;
        position: absolute;
        right: 0;
        top: 0;
        width: 100%;
        z-index: 10000
      }

      #fb-root #fb_dialog_ipad_overlay.hidden {
        display: none
      }

      .fb_dialog.fb_dialog_mobile.loading iframe {
        visibility: hidden
      }

      .fb_dialog_mobile .fb_dialog_iframe {
        position: sticky;
        top: 0
      }

      .fb_dialog_content .dialog_header {
        background: linear-gradient(from(#738aba), to(#2c4987));
        border-bottom: 1px solid;
        border-color: #043b87;
        box-shadow: white 0 1px 1px -1px inset;
        color: #fff;
        font: bold 14px Helvetica, sans-serif;
        text-overflow: ellipsis;
        text-shadow: rgba(0, 30, 84, .296875) 0 -1px 0;
        vertical-align: middle;
        white-space: nowrap
      }

      .fb_dialog_content .dialog_header table {
        height: 43px;
        width: 100%
      }

      .fb_dialog_content .dialog_header td.header_left {
        font-size: 12px;
        padding-left: 5px;
        vertical-align: middle;
        width: 60px
      }

      .fb_dialog_content .dialog_header td.header_right {
        font-size: 12px;
        padding-right: 5px;
        vertical-align: middle;
        width: 60px
      }

      .fb_dialog_content .touchable_button {
        background: linear-gradient(from(#4267B2), to(#2a4887));
        background-clip: padding-box;
        border: 1px solid #29487d;
        border-radius: 3px;
        display: inline-block;
        line-height: 18px;
        margin-top: 3px;
        max-width: 85px;
        padding: 4px 12px;
        position: relative
      }

      .fb_dialog_content .dialog_header .touchable_button input {
        background: none;
        border: none;
        color: #fff;
        font: bold 12px Helvetica, sans-serif;
        margin: 2px -12px;
        padding: 2px 6px 3px 6px;
        text-shadow: rgba(0, 30, 84, .296875) 0 -1px 0
      }

      .fb_dialog_content .dialog_header .header_center {
        color: #fff;
        font-size: 16px;
        font-weight: bold;
        line-height: 18px;
        text-align: center;
        vertical-align: middle
      }

      .fb_dialog_content .dialog_content {
        background: url(https://connect.facebook.net/rsrc.php/v3/y9/r/jKEcVPZFk-2.gif) no-repeat 50% 50%;
        border: 1px solid #4a4a4a;
        border-bottom: 0;
        border-top: 0;
        height: 150px
      }

      .fb_dialog_content .dialog_footer {
        background: #f5f6f7;
        border: 1px solid #4a4a4a;
        border-top-color: #ccc;
        height: 40px
      }

      #fb_dialog_loader_close {
        float: left
      }

      .fb_dialog.fb_dialog_mobile .fb_dialog_close_icon {
        visibility: hidden
      }

      #fb_dialog_loader_spinner {
        animation: rotateSpinner 1.2s linear infinite;
        background-color: transparent;
        background-image: url(https://connect.facebook.net/rsrc.php/v3/yD/r/t-wz8gw1xG1.png);
        background-position: 50% 50%;
        background-repeat: no-repeat;
        height: 24px;
        width: 24px
      }

      @keyframes rotateSpinner {
        0% {
          transform: rotate(0deg)
        }

        100% {
          transform: rotate(360deg)
        }
      }

      .fb_iframe_widget {
        display: inline-block;
        position: relative
      }

      .fb_iframe_widget span {
        display: inline-block;
        position: relative;
        text-align: justify
      }

      .fb_iframe_widget iframe {
        position: absolute
      }

      .fb_iframe_widget_fluid_desktop,
      .fb_iframe_widget_fluid_desktop span,
      .fb_iframe_widget_fluid_desktop iframe {
        max-width: 100%
      }

      .fb_iframe_widget_fluid_desktop iframe {
        min-width: 220px;
        position: relative
      }

      .fb_iframe_widget_lift {
        z-index: 1
      }

      .fb_iframe_widget_fluid {
        display: inline
      }

      .fb_iframe_widget_fluid span {
        width: 100%
      }

      .fb_mpn_mobile_landing_page_slide_out {
        animation-duration: 200ms;
        animation-name: fb_mpn_landing_page_slide_out;
        transition-timing-function: ease-in
      }

      .fb_mpn_mobile_landing_page_slide_out_from_left {
        animation-duration: 200ms;
        animation-name: fb_mpn_landing_page_slide_out_from_left;
        transition-timing-function: ease-in
      }

      .fb_mpn_mobile_landing_page_slide_up {
        animation-duration: 500ms;
        animation-name: fb_mpn_landing_page_slide_up;
        transition-timing-function: ease-in
      }

      .fb_mpn_mobile_bounce_in {
        animation-duration: 300ms;
        animation-name: fb_mpn_bounce_in;
        transition-timing-function: ease-in
      }

      .fb_mpn_mobile_bounce_out {
        animation-duration: 300ms;
        animation-name: fb_mpn_bounce_out;
        transition-timing-function: ease-in
      }

      .fb_mpn_mobile_bounce_out_v2 {
        animation-duration: 300ms;
        animation-name: fb_mpn_fade_out;
        transition-timing-function: ease-in
      }

      .fb_customer_chat_bounce_in_v2 {
        animation-duration: 300ms;
        animation-name: fb_bounce_in_v2;
        transition-timing-function: ease-in
      }

      .fb_customer_chat_bounce_in_from_left {
        animation-duration: 300ms;
        animation-name: fb_bounce_in_from_left;
        transition-timing-function: ease-in
      }

      .fb_customer_chat_bounce_out_v2 {
        animation-duration: 300ms;
        animation-name: fb_bounce_out_v2;
        transition-timing-function: ease-in
      }

      .fb_customer_chat_bounce_out_from_left {
        animation-duration: 300ms;
        animation-name: fb_bounce_out_from_left;
        transition-timing-function: ease-in
      }

      .fb_invisible_flow {
        display: inherit;
        height: 0;
        overflow-x: hidden;
        width: 0
      }

      @keyframes fb_mpn_landing_page_slide_out {
        0% {
          margin: 0 12px;
          width: 100% - 24px
        }

        60% {
          border-radius: 18px
        }

        100% {
          border-radius: 50%;
          margin: 0 24px;
          width: 60px
        }
      }

      @keyframes fb_mpn_landing_page_slide_out_from_left {
        0% {
          left: 12px;
          width: 100% - 24px
        }

        60% {
          border-radius: 18px
        }

        100% {
          border-radius: 50%;
          left: 12px;
          width: 60px
        }
      }

      @keyframes fb_mpn_landing_page_slide_up {
        0% {
          bottom: 0;
          opacity: 0
        }

        100% {
          bottom: 24px;
          opacity: 1
        }
      }

      @keyframes fb_mpn_bounce_in {
        0% {
          opacity: .5;
          top: 100%
        }

        100% {
          opacity: 1;
          top: 0
        }
      }

      @keyframes fb_mpn_fade_out {
        0% {
          bottom: 30px;
          opacity: 1
        }

        100% {
          bottom: 0;
          opacity: 0
        }
      }

      @keyframes fb_mpn_bounce_out {
        0% {
          opacity: 1;
          top: 0
        }

        100% {
          opacity: .5;
          top: 100%
        }
      }

      @keyframes fb_bounce_in_v2 {
        0% {
          opacity: 0;
          transform: scale(0, 0);
          transform-origin: bottom right
        }

        50% {
          transform: scale(1.03, 1.03);
          transform-origin: bottom right
        }

        100% {
          opacity: 1;
          transform: scale(1, 1);
          transform-origin: bottom right
        }
      }

      @keyframes fb_bounce_in_from_left {
        0% {
          opacity: 0;
          transform: scale(0, 0);
          transform-origin: bottom left
        }

        50% {
          transform: scale(1.03, 1.03);
          transform-origin: bottom left
        }

        100% {
          opacity: 1;
          transform: scale(1, 1);
          transform-origin: bottom left
        }
      }

      @keyframes fb_bounce_out_v2 {
        0% {
          opacity: 1;
          transform: scale(1, 1);
          transform-origin: bottom right
        }

        100% {
          opacity: 0;
          transform: scale(0, 0);
          transform-origin: bottom right
        }
      }

      @keyframes fb_bounce_out_from_left {
        0% {
          opacity: 1;
          transform: scale(1, 1);
          transform-origin: bottom left
        }

        100% {
          opacity: 0;
          transform: scale(0, 0);
          transform-origin: bottom left
        }
      }

      @keyframes slideInFromBottom {
        0% {
          opacity: .1;
          transform: translateY(100%)
        }

        100% {
          opacity: 1;
          transform: translateY(0)
        }
      }

      @keyframes slideInFromBottomDelay {
        0% {
          opacity: 0;
          transform: translateY(100%)
        }

        97% {
          opacity: 0;
          transform: translateY(100%)
        }

        100% {
          opacity: 1;
          transform: translateY(0)
        }
      }
    </style>
    <script type="text/javascript">
      window._adftrack = Array.isArray(window._adftrack) ? window._adftrack : (window._adftrack ? [window._adftrack] : []);
      window._adftrack.push({
        HttpHost: "track.adform.net",
        pm: 2179610
      });
      (function() {
        var s = document.createElement("script");
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://s2.adform.net/banners/scripts/st/trackpoint-async.js";
        var x = document.getElementsByTagName("script")[0];
        x.parentNode.insertBefore(s, x);
      })();
    </script>
    <noscript>
      <img src="https://track.adform.net/Serving/TrackPoint/?pm=2179610" width="1" height="1" style="display: none;">
    </noscript>
    <script async="" src="https://collector.wawlabs.com/epttavm.js"></script>
    <script type="text/javascript" src="https://pttem.alo-tech.com/chat/alochat.js?widget_key=ahRzfm11c3RlcmktaGl6bWV0bGVyaXIYCxILQ2hhdFdpZGdldHMYgIDkiO2KiQoMogEScHR0ZW0uYWxvLXRlY2guY29t"></script>
    <style id="ins-outer-stylesheet-7338" type="text/css" classname="ins-outer-stylesheet-7338" class="ins-outer-stylesheet-7338">
      .ins-preview-wrapper-7338 b margin-top: 0 !important;
      margin-left: 0 !important;
      }

      .ins-web-smart-recommender-main-wrapper {
        position: relative;
        overflow: hidden;
        height: px;
        direction: ltr !important;
      }

      .ins-preview-wrapper-7338 .ins-web-smart-recommender-header {
        font-family: inherit;
        font-size: 16px;
        color: #000000;
        margin: 20px 0;
      }

      .ins-preview-wrapper-7338 .ins-web-smart-recommender-header .ins-element-text {
        font-weight: 700;
        display: block;
      }

      .ins-preview-wrapper-7338 .ins-web-smart-recommender-header .ins-element-text a {
        color: inherit !important;
      }

      .ins-preview-wrapper-7338 .ins-product-box {
        display: block;
      }

      .ins-preview-wrapper-7338 .ins-product-name-container .ins-product-box {
        color: inherit !important;
      }

      .ins-preview-wrapper-7338 .ins-web-smart-recommender-inner-box {
        display: block;
        padding: 10px;
        cursor: pointer;
      }

      .ins-preview-wrapper-7338 .ins-web-smart-recommender-body-wrapper {
        width: 100%;
        overflow: hidden;
        margin: 0 auto;
      }

      .ins-preview-wrapper-7338 .ins-web-smart-recommender-body {
        width: 3000px;
        margin-left: 0;
        overflow: hidden;
        display: inline-block !important;
        padding: 0 !important;
        transition: 600ms transform;
        transform: translateX(0);
      }

      .ins-preview-wrapper-7338 .ins-web-smart-recommender-body.multiple-row {
        display: flex !important;
        flex-wrap: wrap;
      }

      .ins-preview-wrapper-7338 .ins-web-smart-recommender-box-item {
        margin-left: 10px;
        margin-right: 10px;
        overflow: hidden;
        text-decoration: none;
        color: #000000;
        float: left;
        display: inline-block;
        list-style: none;
        transition: 0.3s all;
      }

      .ins-preview-wrapper-7338 .ins-web-smart-recommender-box-item {
        background: #ffffff;
        height: px;
        border: 1px none #000000;
        border-radius: 10px;
        margin: 10px;
      }

      .ins-preview-wrapper-7338 .ins-image-box {
        margin: auto auto 10px auto;
        overflow: hidden;
        display: flex !important;
        align-items: center;
        justify-content: center;
        width: px;
        height: 200px;
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
        position: relative;
      }

      .ins-preview-wrapper-7338 .ins-product-name {
        margin: 0 0 10px 0;
        font-size: inherit !important;
        width: 100%;
        overflow: hidden;
        color: inherit !important;
        text-decoration: inherit !important;
        font-weight: inherit !important;
        font-style: inherit !important;
        text-decoration-line: inherit !important;
        font-family: inherit !important;
      }

      .ins-preview-wrapper-7338 .ins-product-name-container {
        font-size: 14px;
        line-height: normal;
        width: px;
        color: #000000;
        overflow: hidden;
        font-weight: normal;
        font-style: inherit;
        text-decoration-line: inherit;
        height: 97px;
      }

      .ins-preview-wrapper-7338 .ins-product-price-wrapper .ins-product-price-container {
        font-size: 16px;
        font-weight: bold;
        text-align: left;
        color: #e13d3d;
        display: flex;
        justify-content: space-between;
        height: 36px;
        margin-bottom: 15px;
      }

      .ins-preview-wrapper-7338 .ins-product-price {
        color: inherit !important;
        text-decoration: inherit !important;
        font-weight: inherit !important;
        font-style: inherit !important;
        text-decoration-line: inherit !important;
        font-family: inherit !important;
        margin-right: 10px;
      }

      .ins-preview-wrapper-7338 .ins-product-discount-container {
        font-size: 14px;
        text-align: left;
        color: #bababa;
        font-weight: bold;
        float: left;
      }

      .ins-preview-wrapper-7338 .ins-product-discount-container .ins-element-content {
        text-decoration-line: line-through;
        -webkit-text-decoration-line: line-through;
      }

      .ins-preview-wrapper-7338 .ins-product-discount {
        font-weight: inherit !important;
        font-style: inherit !important;
        text-decoration-line: inherit !important;
        -webkit-text-decoration-line: inherit !important;
        font-family: inherit !important;
        display: inline-block !important;
      }

      .ins-preview-wrapper-7338 .ins-temporary-preview {
        width: 100%;
        max-width: 300px;
        height: 100%;
        max-height: 300px;
        margin-top: -35px;
      }

      .ins-preview-wrapper-7338 .ins-add-product-to-cart-button {
        display: none;
        width: 190px;
        border: 1px solid rgb(255, 212, 94) !important;
        border-radius: 6px !important;
        background: rgb(255, 212, 94);
        padding: 6px;
        font-weight: 600;
        text-align: center;
        z-index: 2;
        width: px;
        justify-content: center;
        align-items: center;
      }

      .ins-preview-wrapper-7338 .ins-display-none {
        display: none !important;
      }

      .ins-preview-wrapper-7338 .ins-display-block {
        display: block !important;
      }

      .ins-preview-wrapper-7338 .ins-add-to-cart-icon .ins-add-to-cart-icon-button .ins-add-to-cart-icon-image {
        display: block;
        margin: 0 auto;
        width: 100%;
        height: auto;
      }

      .ins-preview-wrapper-7338 .ins-product-content {
        background-color: #ffffff;
      }

      .ins-preview-wrapper-7338 .ins-add-to-cart-text-button-active .ins-add-to-cart-icon {
        display: none;
      }

      .ins-preview-wrapper-7338 .ins-add-to-cart-text-button-active .ins-add-to-cart-text-button {
        display: block;
      }

      .ins-preview-wrapper-7338 .ins-add-to-cart-text-button-active .ins-add-to-cart-wrapper {
        width: 100%;
        display: flex;
        justify-content: center;
      }

      .ins-preview-wrapper-7338 .ins-add-to-cart-icon-button-active .ins-add-to-cart-icon {
        display: block;
      }

      .ins-preview-wrapper-7338 .ins-add-to-cart-icon-button-active .ins-add-to-cart-text-button {
        display: none;
      }

      .ins-preview-wrapper-7338 .ins-add-to-cart-icon-button-active .ins-add-to-cart-wrapper {
        width: auto;
        display: inline-flex !important;
        position: absolute;
        right: 0px;
        bottom: 38px;
        bottom: calc(44px + 6px);
      }

      .ins-preview-wrapper-7338 .ins-dynamic-text-area>div:last-child {
        margin-bottom: 0px;
      }

      .ins-preview-wrapper-7338 .ins-add-to-cart-icon-button-active .ins-add-to-cart-button-with-image {
        width: 39px;
      }

      .ins-preview-wrapper-7338 .add-to-cart-text {
        color: rgb(110, 82, 5);
        font-size: 15px !important;
        font-family: inherit !important;
        margin-top: 4px !important;
      }

      .ins-preview-wrapper-7338 .ins-slider-arrow-element {
        display: block;
        background: transparent;
        cursor: pointer;
        position: absolute;
        top: 50%;
        z-index: 3;
        padding: 15px;
      }

      .ins-preview-wrapper-7338 .ins-slider-arrow-element.ins-selected-element {
        border: unset;
        box-shadow: unset;
      }

      .ins-preview-wrapper-7338 .ins-arrow-with-background {
        background-image: url('https://s3-eu-west-1.amazonaws.com/image.useinsider.com/default/action-builder/chevron-icon.png');
        background-size: 100%;
        width: 10px;
        height: 10px;
      }

      .ins-preview-wrapper-7338 .ins-arrow-with-border {
        border-top: 3px solid;
        border-right: 3px solid;
        border-color: rgb(0, 166, 206);
        transform: rotate(45deg);
        width: 10px;
        height: 10px;
      }

      .ins-preview-wrapper-7338 .ins-add-to-cart-button-with-image {
        background-image: url('https://image.useinsider.com/default/action-builder/smart-recommender-add-to-cart-button-placehoder.png') !important;
        border: none !important;
        cursor: pointer;
        background-position: center;
        background-size: auto 102% !important;
        background: center;
      }

      .ins-preview-wrapper-7338 .ins-add-to-cart-button-with-image .add-to-cart-text {
        display: none;
      }

      .ins-preview-wrapper-7338 .ins-slider-prev {
        transform: translateY(-50%) rotate(180deg);
        left: -40px;
      }

      .ins-preview-wrapper-7338 .ins-slider-next {
        transform: translateY(-50%) rotate(0deg);
        right: -40px;
      }

      .ins-preview-wrapper-7338 .wrap-product-attributes-and-add-to-cart {
        width: 100%;
        align-items: center;
      }

      .ins-preview-wrapper-7338 .ins-dynamic-wrap-area .ins-element-product-attribute {
        display: block;
      }

      .ins-preview-wrapper-7338 .ins-element-product-attribute {
        text-align: left;
        margin-bottom: 10px;
        margin-right: 10px;
        display: inline-block;
      }

      .ins-preview-wrapper-7338 .ins-product-attributes {
        height: px;
      }

      .ins-preview-wrapper-7338 .ins-responsive-mode-active .ins-product-attributes-container,
      .ins-preview-wrapper-7338 .ins-responsive-mode-active .ins-element-product-attribute,
      .ins-preview-wrapper-7338 .ins-responsive-mode-active .ins-product-name-container,
      .ins-preview-wrapper-7338 .ins-responsive-mode-active .ins-image-box {
        width: 100% !important;
      }

      .ins-preview-wrapper-7338 .ins-element-product-attribute .ins-dynamic-element-tag {
        margin: 0 !important;
        color: inherit !important;
        font-family: inherit !important;
        text-align: inherit !important;
        font-weight: inherit !important;
        text-decoration-line: inherit !important;
        font-size: inherit !important;
        word-break: break-all !important;
      }

      .ins-preview-wrapper-7338 .ins-discount-badge {
        border-radius: 5px !important;
      }

      .ins-preview-wrapper-7338 .ins-discount-badge {
        background-color: #ea001f;
        width: auto;
        padding: 2px 0 0 0;
        height: 12px;
        position: relative;
        top: 0;
        left: 0;
        color: white;
        font-weight: 700;
        flex-direction: row;
        border: 0px none #000000 !important;
        display: flex;
        justify-content: center;
        align-items: center;
      }

      .ins-preview-wrapper-7338 .ins-discount-icon {
        margin: 0 5px 0 5px;
      }

      .ins-preview-wrapper-7338 .ins-discount-badge-container {
        display: inline-block !important;
      }

      .ins-preview-wrapper-7338 .ins-discount-badge[data-discount-position="topleft"] {
        top: calc(0px - 0px);
        left: calc(0px - 0px);
      }

      .ins-preview-wrapper-7338 .ins-discount-badge[data-discount-position="topright"] {
        top: calc(0px - 0px);
        right: calc(0px - 0px);
        left: unset;
      }

      .ins-preview-wrapper-7338 .ins-discount-badge[data-discount-position="bottomleft"] {
        bottom: calc(0px - 0px);
        left: calc(0px - 0px);
        top: unset;
      }

      .ins-preview-wrapper-7338 .ins-discount-badge[data-discount-position="bottomright"] {
        bottom: calc(0px - 0px);
        right: calc(0px - 0px);
        top: unset;
        left: unset;
      }

      .ins-preview-wrapper-7338 .ins-discount-badge[data-percentage-icon-position="beforetheamount"] {
        flex-direction: row-reverse;
      }

      .ins-preview-wrapper-7338 .ins-dynamic-text-area {
        display: none;
        word-break: break-word;
      }

      .ins-preview-wrapper-7338 .ins-action-buttons-wrapper {
        text-align: right !important;
        position: relative;
        min-height: 44px;
      }

      .ins-preview-wrapper-7338 div.ins-product-price-wrapper {
        display: flex;
      }

      .ins-preview-wrapper-7338 div.ins-product-price-wrapper>div {
        width: 100%;
      }

      .ins-preview-wrapper-7338 .ins-product-price-area-multi-line .ins-product-price-wrapper {
        align-items: flex-start;
        flex-direction: column;
      }

      .ins-preview-wrapper-7338 .ins-product-price-area-single-line .ins-product-price-wrapper {
        justify-content: space-between;
        align-items: center;
        width: 100%;
      }

      .ins-preview-wrapper-7338 .ins-product-price-area-single-line .ins-product-price-wrapper.ins-product-price-centered {
        justify-content: center;
      }

      .ins-preview-wrapper-7338 .ins-product-price-area-single-line .ins-product-price-wrapper>div.ins-auto-width {
        width: auto;
      }

      .ins-preview-wrapper-7338 div.ins-hide {
        display: none;
      }

      .ins-preview-wrapper-7338 div.ins-show {
        display: inline-block;
      }

      .ins-preview-wrapper-7338 div.ins-go-to-product-button {
        width: auto;
        border: 1px solid #4F1A98 !important;
        border-radius: 4px !important;
        background: #4F1A98;
        padding: 0.1px;
        font-weight: 600;
        text-align: center;
        color: #ffffff;
        font-size: 15px;
        z-index: 2;
        cursor: pointer;
        width: px;
        height: 44px;
        justify-content: center;
        align-items: center;
        background-position: center;
        background-size: auto 102% !important;
      }

      .ins-preview-wrapper-7338 div.ins-go-to-product-button>.ins-go-to-product-text-button {
        margin-top: 6px;
      }

      .ins-preview-wrapper-7338 .ins-add-to-cart-text-button-active~.ins-action-buttons-wrapper>.ins-go-to-product-wrapper {
        margin-top: 10px;
      }

      .ins-preview-wrapper-7338 .ins-add-to-cart-icon-button-active .ins-product-attribute-wrapper {
        width: 75% !important;
      }

      .ins-preview-wrapper-7338 .ins-product-attributes-container {
        margin-bottom: 10px;
      }

      .ins-preview-wrapper-7338 .ins-add-to-cart-icon-button-active .wrap-product-attributes-and-add-to-cart {
        width: 80%;
      }

      .ins-preview-wrapper-7338 .ins-after-click-color-button {
        background-color: #383F47 !important;
      }

      .ins-preview-wrapper-7338 .ins-display-inline {
        display: inline-block !important;
      }

      .ins-preview-wrapper-7338 .clone-product-div .ins-web-smart-recommender-inner-box {
        display: flex !important;
        justify-content: center;
        position: relative;
      }

      .ins-preview-wrapper-7338 .clone-product-div [ins-data-map="button"] {
        cursor: pointer;
      }

      .ins-preview-wrapper-7338 .ins-dynamic-wrap-area {
        position: relative;
      }

      .ins-preview-wrapper-7338 .clone-product-div .ins-web-smart-recommender-body,
      .ins-preview-wrapper-7338 .clone-product-div .ins-web-smart-recommender-box-item {
        display: flex !important;
      }

      .ins-preview-wrapper-7338 .clone-product-div .ins-web-smart-recommender-box-item>div {
        width: 100%;
      }

      .ins-preview-wrapper-7338 .selectedCloneDiv-discounted_price,
      .ins-preview-wrapper-7338 .selectedCloneDiv-original_price {
        white-space: nowrap;
      }

      .ins-preview-wrapper-7338 .clone-product-div .ins-product-content {
        height: 100%;
      }

      .ins-preview-wrapper-7338 #{{CloneProductDivCss}
      }

      .ins-preview-wrapper-7338 .ins-product-discount {
        width: auto !important;
      }

      .ins-preview-wrapper-7338 .ins-element-wrap.ins-selectable-element.ins-discount-badge-container {
        border-left: 2.5px solid #45ac4c;
        padding-left: 3px;
        margin-left: 10px;
      }

      .ins-preview-wrapper-7338 .ins-action-buttons-wrapper {
        display: none !important;
      }

      .ins-preview-wrapper-7338 .ins-web-smart-recommender-box-item:hover .ins-product-name-container {
        display: none !important;
      }

      .ins-preview-wrapper-7338 .ins-web-smart-recommender-box-item:hover .ins-action-buttons-wrapper {
        display: block !important;
      }

      .ins-preview-wrapper-7338 .ins-web-smart-recommender-box-item:hover .ins-product-discount-container {
        display: none;
      }

      .ins-preview-wrapper-7338 .ins-action-buttons-wrapper {
        height: 97px !important;
        padding: 8px 0 8px 0;
      }

      .ins-preview-wrapper-7338 .ins-web-smart-recommender-box-item:hover {
        transition: 0.3s all;
        box-shadow: 0 2px 16px 0 rgba(0, 0, 0, .06);
      }

      .ins-preview-wrapper-7338 .ins-slider-arrow-element:hover {
        background-color: #00a6ce !important;
      }

      .ins-preview-wrapper-7338 .ins-slider-arrow-element:hover .ins-slider-arrow-wrapper {
        border-color: white !important;
      }

      .ins-preview-wrapper-7338 div.ins-slider-arrow-element {
        border: 2px solid #00a6ce !important;
        border-radius: 40px !important;
        background: #fff;
        width: 40px;
        height: 40px;
      }

      .ins-preview-wrapper-7338 .ins-slider-arrow-wrapper {
        position: relative;
        right: 3px;
        bottom: 2px;
      }

      .ins-preview-wrapper-7338 #wrap-arrow-1454703450633 {
        border-radius: 40px !important;
      }

      .ins-preview-wrapper-7338 #go-to-product-button-1508331698382 {
        background-color: #e5eaff;
        color: rgba(26, 115, 232, var(--text-opacity));
        border-color: #e5eaff !important;
        border-radius: 112px !important;
        font-weight: 400;
        padding-top: 3px;
        font-size: 14px;
      }

      .ins-preview-wrapper-7338 .ins-product-discount-container {
        height: 15px;
      }

      .ins-preview-wrapper-7338 .ins-free-shipping {
        color: #45ac4c;
        border: 1px solid;
        padding: 1px 6px !important;
        border-radius: 8px !important;
        height: 27.6px;
        width: 50px;
        font-size: 11px;
        height: 36px;
        background: #ffffff;
        text-align: center !important;
        position: relative;
        bottom: -27px;
        right: 4px;
      }

      .ins-preview-wrapper-7338 .ins-discounted-product-badge {
        font-size: 10px;
        position: absolute;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #e2eeda;
        color: #3b810d;
        width: 81px;
        height: 23px;
        bottom: -7px;
        border-radius: 8px !important;
      }

      .ins-preview-wrapper-7338 .ins-custom-redirect-button {
        width: 190px;
        text-align: center;
        height: 45px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 6px !important;
        background: rgb(255, 212, 94);
        font-size: 15px !important;
        font-family: 'Open Sans';
        font-weight: 600;
      }

      .ins-preview-wrapper-7338 .ins-custom-redirect-container {
        display: none;
        justify-content: center;
        color: rgb(110, 82, 5);
      }
    </style>
    <link data-n-head="ssr" rel="canonical" href="https://www.pttavm.com/apple-iphone-13-128-gb-gece-yarisi-cep-telefonu-apple-turkiye-garantili-p-230662642">
    <meta data-n-head="ssr" data-hid="description" name="description" content="<?php echo $urun["urunismi"]; ?> <?php echo $urun["urunismi"]; ?>">
    <meta data-n-head="ssr" property="og:image" content="https://img.epttavm.com/pimages/592/230/662/62f50a3769b57.jpg?v=201910111530">
    <meta data-n-head="ssr" data-hid="robots" name="robots" content="index">
    <script src="https://eitri.api.useinsider.com/static/native-push-sdk.js" async="" charset=""></script>
    <style class="ins-feedback-style-c144">
      .ins-feedback-trigger-c144 {
        position: fixed;
        top: 95%;
        left: 5.5%;
        transform: translate(-50%, -50%);
        cursor: pointer;
        user-select: none;
        z-index: 98;
      }

      .ins-feedback-overlay-c144 {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background-color: rgba(0, 0, 0, 0.4);
        user-select: none;
        z-index: 9999;
      }

      .ins-feedback-wrapper-c144 {
        position: absolute;
        top: 50%;
        left: 50%;
        font-size: 14px;
        font-weight: 600;
        transform: translate(-50%, -50%);
        height: 610px;
        width: 560px;
        background-color: #FFFFFF;
        z-index: 10000;
        border-radius: 15px;
        box-shadow: 0 10px 16px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%) !important
      }

      .ins-feedback-container-c144 {
        padding: 50px;
      }

      .ins-feedback-score-numbers-c144 {
        display: flex;
        justify-content: center;
        margin-top: 15px;
      }

      .ins-feedback-score-number-c144 {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 30px;
        height: 30px;
        color: #00A6CE;
        border: 2px solid #00A6CE;
        border-radius: 5px;
        cursor: pointer;
        margin: 5.75px;
      }

      .ins-feedback-score-number-c144:hover {
        color: #FFFFFF;
        background-color: #00A6CE;
      }

      .ins-feedback-score-scale-c144 {
        display: flex;
        justify-content: space-between;
        font-size: 12px;
        font-weight: 400;
      }

      .ins-feedback-opinion-container-c144 {
        margin-top: 40px;
      }

      .ins-feedback-opinion-input-c144 {
        border-bottom: 1px solid #C2C2C2;
        width: 100%;
        outline: none;
        margin-top: 10px;
      }

      .ins-feedback-contact-container-c144 {
        margin-top: 40px;
      }

      .ins-feedback-contact-question-c144 {
        margin-bottom: 10px;
      }

      .ins-feedback-input-title-c144 {
        font-size: 12px;
        font-weight: 400;
      }

      .ins-feedback-input-container-c144 {
        display: flex;
        background-color: #F4F9FF;
        margin-bottom: 10px;
      }

      .ins-feedback-email-image-c144,
      .ins-feedback-phone-image-c144 {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 36px;
        width: 56px;
        border-right: 1.5px solid #00A6CE;
      }

      .ins-feedback-email-image-c144 img,
      .ins-feedback-phone-image-c144 img {
        height: 15px;
        width: 18px;
      }

      .ins-feedback-input-container-c144 input {
        width: 90%;
        padding-left: 20px;
        font-size: 12px;
        background-color: #F4F9FF;
        outline: none;
      }

      .ins-feedback-button-container-c144 {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-top: 30px;
      }

      .ins-feedback-button-complete-c144 {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 188px;
        height: 46px;
        color: #FFFFFF;
        background-color: #00A6CE;
        cursor: pointer;
        border-radius: 10px;
      }

      .ins-feedback-button-complete-c144:hover {
        color: #00A6CE;
        border: 2px solid #00A6CE;
        background-color: #FFFFFF;
      }

      .ins-feedback-button-abort-c144 {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 144px;
        height: 30px;
        padding: 5px;
        cursor: pointer;
        margin-top: 40px;
        color: #00A6CE;
      }

      .ins-feedback-button-abort-c144:hover {
        background-color: #E4FAFF;
      }

      .ins-feedback-button-closeButton-c144 {
        position: absolute;
        height: 48px;
        width: auto;
        top: -20px;
        right: -16px;
        cursor: pointer;
      }

      .ins-active-c144 {
        color: #FFFFFF;
        background-color: #00A6CE;
      }

      .ins-shake-c144 {
        animation: shake 0.8s cubic-bezier(.36, .07, .19, .97) both;
      }

      .ins-warning-c144 {
        color: #CB4335;
        border: 2px solid #CB4335;
      }

      @keyframes shake {

        10%,
        90% {
          transform: translate3d(-1px, 0, 0);
        }

        20%,
        80% {
          transform: translate3d(2px, 0, 0);
        }

        30%,
        50%,
        70% {
          transform: translate3d(-4px, 0, 0);
        }

        40%,
        60% {
          transform: translate3d(4px, 0, 0);
        }
      }
    </style>
    <style id="ins-outer-stylesheet-6090" type="text/css" classname="ins-outer-stylesheet-6090" class="ins-outer-stylesheet-6090">
      .ins-preview-wrapper-6090 .ins-web-smart-recommender-main-wrapper {
        position: relative;
        overflow: hidden;
        height: px;
        direction: ltr !important;
      }

      .ins-preview-wrapper-6090 .ins-web-smart-recommender-header {
        font-family: inherit;
        font-size: 16px;
        color: #000000;
        margin: 20px 0;
      }

      .ins-preview-wrapper-6090 .ins-web-smart-recommender-header .ins-element-text {
        font-weight: 700;
        display: block;
      }

      .ins-preview-wrapper-6090 .ins-web-smart-recommender-header .ins-element-text a {
        color: inherit !important;
      }

      .ins-preview-wrapper-6090 .ins-product-box {
        display: block;
      }

      .ins-preview-wrapper-6090 .ins-product-name-container .ins-product-box {
        color: inherit !important;
      }

      .ins-preview-wrapper-6090 .ins-web-smart-recommender-inner-box {
        display: block;
        padding: 10px;
      }

      .ins-preview-wrapper-6090 .ins-web-smart-recommender-body-wrapper {
        width: 100%;
        overflow: hidden;
        margin: 0 auto;
      }

      .ins-preview-wrapper-6090 .ins-web-smart-recommender-body {
        width: 3000px;
        margin-left: 0;
        overflow: hidden;
        display: inline-block !important;
        padding: 0 !important;
        transition: 600ms transform;
        transform: translateX(0);
      }

      .ins-preview-wrapper-6090 .ins-web-smart-recommender-body.multiple-row {
        display: flex !important;
        flex-wrap: wrap;
      }

      .ins-preview-wrapper-6090 .ins-web-smart-recommender-box-item {
        margin-left: 10px;
        margin-right: 10px;
        overflow: hidden;
        text-decoration: none;
        color: #000000;
        float: left;
        display: inline-block;
        list-style: none;
      }

      .ins-preview-wrapper-6090 .ins-web-smart-recommender-box-item {
        background: #ffffff;
        height: px;
        border: 1px none #000000;
        border-radius: 10px;
        margin: 10px;
      }

      .ins-preview-wrapper-6090 .ins-image-box {
        margin: auto auto 10px auto;
        overflow: hidden;
        display: flex !important;
        align-items: center;
        justify-content: center;
        width: px;
        height: 200px;
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
        position: relative;
      }

      .ins-preview-wrapper-6090 .ins-product-name {
        margin: 0 0 10px 0;
        font-size: inherit !important;
        width: 100%;
        overflow: hidden;
        color: inherit !important;
        text-decoration: inherit !important;
        font-weight: inherit !important;
        font-style: inherit !important;
        text-decoration-line: inherit !important;
        font-family: inherit !important;
      }

      .ins-preview-wrapper-6090 .ins-product-name-container {
        font-size: 14px;
        line-height: normal;
        height: 57px;
        width: px;
        color: #000000;
        overflow: hidden;
        font-weight: normal;
        font-style: inherit;
        text-decoration-line: inherit;
      }

      .ins-preview-wrapper-6090 .ins-product-price-wrapper .ins-product-price-container {
        font-size: 16px;
        font-weight: bold;
        text-align: left;
        color: #e13d3d;
        display: inline-block;
      }

      .ins-preview-wrapper-6090 .ins-product-price {
        color: inherit !important;
        text-decoration: inherit !important;
        font-weight: inherit !important;
        font-style: inherit !important;
        text-decoration-line: inherit !important;
        font-family: inherit !important;
        margin-right: 10px;
      }

      .ins-preview-wrapper-6090 .ins-product-discount-container {
        font-size: 14px;
        text-align: left;
        color: #bababa;
        font-weight: bold;
        float: left;
      }

      .ins-preview-wrapper-6090 .ins-product-discount-container .ins-element-content {
        text-decoration-line: line-through;
        -webkit-text-decoration-line: line-through;
      }

      .ins-preview-wrapper-6090 .ins-product-discount {
        font-weight: inherit !important;
        font-style: inherit !important;
        text-decoration-line: inherit !important;
        -webkit-text-decoration-line: inherit !important;
        font-family: inherit !important;
        display: inline-block !important;
      }

      .ins-preview-wrapper-6090 .ins-temporary-preview {
        width: 100%;
        max-width: 300px;
        height: 100%;
        max-height: 300px;
        margin-top: -35px;
      }

      .ins-preview-wrapper-6090 .ins-add-product-to-cart-button {
        display: none;
        width: auto;
        border: 1px solid #ffd458 !important;
        border-radius: 8px !important;
        background: rgb(255, 212, 88);
        padding: 6px;
        font-weight: 600;
        text-align: center;
        z-index: 2;
        width: px;
        justify-content: center;
        align-items: center;
      }

      .ins-preview-wrapper-6090 .ins-display-none {
        display: none !important;
      }

      .ins-preview-wrapper-6090 .ins-display-block {
        display: block !important;
      }

      .ins-preview-wrapper-6090 .ins-add-to-cart-icon .ins-add-to-cart-icon-button .ins-add-to-cart-icon-image {
        display: block;
        margin: 0 auto;
        width: 100%;
        height: auto;
      }

      .ins-preview-wrapper-6090 .ins-product-content {
        background-color: #ffffff;
      }

      .ins-preview-wrapper-6090 .ins-add-to-cart-text-button-active .ins-add-to-cart-icon {
        display: none;
      }

      .ins-preview-wrapper-6090 .ins-add-to-cart-text-button-active .ins-add-to-cart-text-button {
        display: block;
      }

      .ins-preview-wrapper-6090 .ins-add-to-cart-text-button-active .ins-add-to-cart-wrapper {
        width: 100%;
      }

      .ins-preview-wrapper-6090 .ins-add-to-cart-icon-button-active .ins-add-to-cart-icon {
        display: block;
      }

      .ins-preview-wrapper-6090 .ins-add-to-cart-icon-button-active .ins-add-to-cart-text-button {
        display: none;
      }

      .ins-preview-wrapper-6090 .ins-add-to-cart-icon-button-active .ins-add-to-cart-wrapper {
        width: auto;
        display: inline-flex !important;
        position: absolute;
        right: 0px;
        bottom: 38px;
        bottom: calc(44px + 6px);
      }

      .ins-preview-wrapper-6090 .ins-dynamic-text-area>div:last-child {
        margin-bottom: 0px;
      }

      .ins-preview-wrapper-6090 .ins-add-to-cart-icon-button-active .ins-add-to-cart-button-with-image {
        width: 39px;
      }

      .ins-preview-wrapper-6090 .add-to-cart-text {
        color: rgb(110, 82, 5);
        font-size: 15px !important;
        font-family: inherit !important;
        margin-top: 4px;
      }

      .ins-preview-wrapper-6090 .ins-slider-arrow-element {
        display: block;
        background: transparent;
        cursor: pointer;
        position: absolute;
        top: 50%;
        z-index: 3;
        padding: 15px;
      }

      .ins-preview-wrapper-6090 .ins-slider-arrow-element.ins-selected-element {
        border: unset;
        box-shadow: unset;
      }

      .ins-preview-wrapper-6090 .ins-arrow-with-background {
        background-image: url('https://s3-eu-west-1.amazonaws.com/image.useinsider.com/default/action-builder/chevron-icon.png');
        background-size: 100%;
        width: 10px;
        height: 10px;
      }

      .ins-preview-wrapper-6090 .ins-arrow-with-border {
        border-top: 3px solid;
        border-right: 3px solid;
        border-color: #1a73e8;
        transform: rotate(45deg);
        width: 10px;
        height: 10px;
      }

      .ins-preview-wrapper-6090 .ins-add-to-cart-button-with-image {
        background-image: url('https://image.useinsider.com/default/action-builder/smart-recommender-add-to-cart-button-placehoder.png') !important;
        border: none !important;
        cursor: pointer;
        background-position: center;
        background-size: auto 102% !important;
        background: center;
      }

      .ins-preview-wrapper-6090 .ins-add-to-cart-button-with-image .add-to-cart-text {
        display: none;
      }

      .ins-preview-wrapper-6090 .ins-slider-prev {
        transform: translateY(-50%) rotate(180deg);
        left: -40px;
      }

      .ins-preview-wrapper-6090 .ins-slider-next {
        transform: translateY(-50%) rotate(0deg);
        right: -40px;
      }

      .ins-preview-wrapper-6090 .wrap-product-attributes-and-add-to-cart {
        width: 100%;
        align-items: center;
      }

      .ins-preview-wrapper-6090 .ins-dynamic-wrap-area .ins-element-product-attribute {
        display: block;
      }

      .ins-preview-wrapper-6090 .ins-element-product-attribute {
        text-align: left;
        margin-bottom: 10px;
        margin-right: 10px;
        display: inline-block;
      }

      .ins-preview-wrapper-6090 .ins-product-attributes {
        height: px;
      }

      .ins-preview-wrapper-6090 .ins-responsive-mode-active .ins-product-attributes-container,
      .ins-preview-wrapper-6090 .ins-responsive-mode-active .ins-element-product-attribute,
      .ins-preview-wrapper-6090 .ins-responsive-mode-active .ins-product-name-container,
      .ins-preview-wrapper-6090 .ins-responsive-mode-active .ins-image-box {
        width: 100% !important;
      }

      .ins-preview-wrapper-6090 .ins-element-product-attribute .ins-dynamic-element-tag {
        margin: 0 !important;
        color: inherit !important;
        font-family: inherit !important;
        text-align: inherit !important;
        font-weight: inherit !important;
        text-decoration-line: inherit !important;
        font-size: inherit !important;
        word-break: break-all !important;
      }

      .ins-preview-wrapper-6090 .ins-discount-badge {
        border-radius: 5px !important;
      }

      .ins-preview-wrapper-6090 .ins-discount-badge {
        background-color: #ea001f;
        width: auto;
        padding: 2px 0 0 0;
        height: 12px;
        position: relative;
        top: 0;
        left: 0;
        color: white;
        font-weight: 700;
        flex-direction: row;
        border: 0px none #000000 !important;
        display: flex;
        justify-content: center;
        align-items: center;
      }

      .ins-preview-wrapper-6090 .ins-discount-icon {
        margin: 0 5px 0 5px;
      }

      .ins-preview-wrapper-6090 .ins-discount-badge-container {
        display: inline-block !important;
      }

      .ins-preview-wrapper-6090 .ins-discount-badge[data-discount-position="topleft"] {
        top: calc(0px - 0px);
        left: calc(0px - 0px);
      }

      .ins-preview-wrapper-6090 .ins-discount-badge[data-discount-position="topright"] {
        top: calc(0px - 0px);
        right: calc(0px - 0px);
        left: unset;
      }

      .ins-preview-wrapper-6090 .ins-discount-badge[data-discount-position="bottomleft"] {
        bottom: calc(0px - 0px);
        left: calc(0px - 0px);
        top: unset;
      }

      .ins-preview-wrapper-6090 .ins-discount-badge[data-discount-position="bottomright"] {
        bottom: calc(0px - 0px);
        right: calc(0px - 0px);
        top: unset;
        left: unset;
      }

      .ins-preview-wrapper-6090 .ins-discount-badge[data-percentage-icon-position="beforetheamount"] {
        flex-direction: row-reverse;
      }

      .ins-preview-wrapper-6090 .ins-dynamic-text-area {
        display: none;
        word-break: break-word;
      }

      .ins-preview-wrapper-6090 .ins-action-buttons-wrapper {
        text-align: right !important;
        position: relative;
        min-height: 44px;
      }

      .ins-preview-wrapper-6090 div.ins-product-price-wrapper {
        display: flex;
      }

      .ins-preview-wrapper-6090 div.ins-product-price-wrapper>div {
        width: 100%;
      }

      .ins-preview-wrapper-6090 .ins-product-price-area-multi-line .ins-product-price-wrapper {
        align-items: flex-start;
        flex-direction: column;
      }

      .ins-preview-wrapper-6090 .ins-product-price-area-single-line .ins-product-price-wrapper {
        justify-content: space-between;
        align-items: center;
        width: 100%;
      }

      .ins-preview-wrapper-6090 .ins-product-price-area-single-line .ins-product-price-wrapper.ins-product-price-centered {
        justify-content: center;
      }

      .ins-preview-wrapper-6090 .ins-product-price-area-single-line .ins-product-price-wrapper>div.ins-auto-width {
        width: auto;
      }

      .ins-preview-wrapper-6090 div.ins-hide {
        display: none;
      }

      .ins-preview-wrapper-6090 div.ins-show {
        display: inline-block;
      }

      .ins-preview-wrapper-6090 div.ins-go-to-product-button {
        width: auto;
        border: 1px solid #4F1A98 !important;
        border-radius: 4px !important;
        background: #4F1A98;
        padding: 0.1px;
        font-weight: 600;
        text-align: center;
        color: #ffffff;
        font-size: 15px;
        z-index: 2;
        cursor: pointer;
        width: px;
        height: 44px;
        justify-content: center;
        align-items: center;
        background-position: center;
        background-size: auto 102% !important;
      }

      .ins-preview-wrapper-6090 div.ins-go-to-product-button>.ins-go-to-product-text-button {
        margin-top: 6px;
      }

      .ins-preview-wrapper-6090 .ins-add-to-cart-text-button-active~.ins-action-buttons-wrapper>.ins-go-to-product-wrapper {
        margin-top: 10px;
      }

      .ins-preview-wrapper-6090 .ins-add-to-cart-icon-button-active .ins-product-attribute-wrapper {
        width: 75% !important;
      }

      .ins-preview-wrapper-6090 .ins-product-attributes-container {
        margin-bottom: 10px;
      }

      .ins-preview-wrapper-6090 .ins-add-to-cart-icon-button-active .wrap-product-attributes-and-add-to-cart {
        width: 80%;
      }

      .ins-preview-wrapper-6090 .ins-after-click-color-button {
        background-color: #383F47 !important;
      }

      .ins-preview-wrapper-6090 .ins-display-inline {
        display: inline-block !important;
      }

      .ins-preview-wrapper-6090 .clone-product-div .ins-web-smart-recommender-inner-box {
        display: flex !important;
        justify-content: center;
        position: relative;
      }

      .ins-preview-wrapper-6090 .clone-product-div [ins-data-map="button"] {
        cursor: pointer;
      }

      .ins-preview-wrapper-6090 .ins-dynamic-wrap-area {
        position: relative;
      }

      .ins-preview-wrapper-6090 .clone-product-div .ins-web-smart-recommender-body,
      .ins-preview-wrapper-6090 .clone-product-div .ins-web-smart-recommender-box-item {
        display: flex !important;
      }

      .ins-preview-wrapper-6090 .clone-product-div .ins-web-smart-recommender-box-item>div {
        width: 100%;
      }

      .ins-preview-wrapper-6090 .selectedCloneDiv-discounted_price,
      .ins-preview-wrapper-6090 .selectedCloneDiv-original_price {
        white-space: nowrap;
      }

      .ins-preview-wrapper-6090 .clone-product-div .ins-product-content {
        height: 100%;
      }

      .ins-preview-wrapper-6090 #{{CloneProductDivCss}
      }

      .ins-preview-wrapper-6090 .ins-product-discount {
        width: auto !important;
      }

      .ins-preview-wrapper-6090 .ins-element-wrap.ins-selectable-element.ins-discount-badge-container {
        border-left: 2.5px solid #45ac4c;
        padding-left: 3px;
        margin-left: 10px;
      }

      .ins-preview-wrapper-6090 .ins-action-buttons-wrapper {
        display: none !important;
      }

      .ins-preview-wrapper-6090 .ins-web-smart-recommender-box-item:hover .ins-product-name-container {
        display: none !important;
      }

      .ins-preview-wrapper-6090 .ins-web-smart-recommender-box-item:hover .ins-action-buttons-wrapper {
        display: block !important;
      }

      .ins-preview-wrapper-6090 .ins-web-smart-recommender-box-item:hover .ins-product-discount-container {
        display: none;
      }

      .ins-preview-wrapper-6090 .ins-action-buttons-wrapper {
        height: 72px !important;
        padding: 8px 0 8px 0;
      }

      .ins-preview-wrapper-6090 .ins-web-smart-recommender-box-item:hover {
        box-shadow: 0 2px 16px 0 rgba(0, 0, 0, .06);
      }

      .ins-preview-wrapper-6090 .ins-slider-arrow-element:hover {
        background-color: #1a73e8 !important;
      }

      .ins-preview-wrapper-6090 .ins-slider-arrow-element:hover .ins-slider-arrow-wrapper {
        border-color: white !important;
      }

      .ins-preview-wrapper-6090 div.ins-slider-arrow-element {
        border: 2px solid #1a73e8 !important;
        border-radius: 40px !important;
        background: #fff;
        width: 40px;
        height: 40px;
      }

      .ins-preview-wrapper-6090 .ins-slider-arrow-wrapper {
        position: relative;
        right: 3px;
        bottom: 2px;
      }

      .ins-preview-wrapper-6090 #wrap-arrow-1454703450633 {
        border-radius: 40px !important;
      }

      .ins-preview-wrapper-6090 #go-to-product-button-1508331698382 {
        background-color: #e5eaff;
        color: rgba(26, 115, 232, var(--text-opacity));
        border-color: #e5eaff !important;
        border-radius: 112px !important;
        font-weight: 400;
        padding-top: 3px;
        font-size: 14px;
      }

      .ins-preview-wrapper-6090 .ins-product-discount-container {
        height: 15px;
      }

      .ins-preview-wrapper-6090 .free-shipping {
        color: #45ac4c;
        border: 1px solid;
        font-size: 12px;
        height: 27.6px;
        width: 116px;
        background: #ffffff;
        top: 3px;
        left: 0px;
        text-align: center !important;
        padding: 4px;
      }
    </style>
    <style id="ins-outer-stylesheet-7077" type="text/css" classname="ins-outer-stylesheet-7077" class="ins-outer-stylesheet-7077">
      @font-face {
        font-family: 'Digital-7 Mono';
        src: url('https://font.static.useinsider.com/DigitalMono/digital-7-mono.ttf');
      }

      .ins-preview-wrapper-7077 {
        display: none;
      }

      .ins-preview-wrapper-7077 .inline-resolution {
        width: 100% !important;
        height: 80px !important;
        display: block !important;
        padding: 0 !important;
        margin: 0 !important;
        max-width: 100% !important;
      }

      .ins-preview-wrapper-7077 .ins-notification-content {
        background-size: cover !important;
        background-repeat: no-repeat !important;
        background-position: center center !important;
      }

      .ins-preview-wrapper-7077 .ins-top-bar-content-wrapper {
        height: 100%;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        position: relative;
      }

      .ins-preview-wrapper-7077 .ins-top-bar-content-wrapper * {
        font-size: inherit;
      }

      .ins-preview-wrapper-7077 .text-container {
        flex: 1;
        line-height: 20px;
        display: flex !important;
        align-items: center;
        justify-content: center;
      }

      .ins-preview-wrapper-7077 .ins-element-text a {
        color: inherit !important;
      }

      .ins-preview-wrapper-7077 .ins-element-text a:hover {
        text-decoration: inherit !important;
      }

      .ins-preview-wrapper-7077 .text-container>.ins-element-text {
        width: 100%;
      }

      .ins-preview-wrapper-7077 .adaptive-title {
        left: 50%;
        top: 50%;
        position: absolute;
        width: 236px;
        height: 20px;
        transform: translate(-466px, -50%);
      }

      .ins-preview-wrapper-7077 .adaptive-title .ins-element-content {
        flex: 1;
        font-family: "Insider-Open Sans", sans-serif !important;
        font-style: normal;
        font-weight: 600;
        color: #383F47;
        font-size: 15px;
        line-height: normal;
      }

      .ins-preview-wrapper-7077 .adaptive-title .ins-element-content {
        height: auto !important;
      }

      .ins-preview-wrapper-7077 .adaptive-title .ins-element-content a,
      .ins-preview-wrapper-7077 .adaptive-title .ins-element-content div {
        font-size: inherit !important;
        width: auto !important;
        height: auto !important;
        text-align: inherit;
      }

      .ins-preview-wrapper-7077 .adaptive-description .ins-countdown-description {
        flex: 1;
        font-weight: 600;
        color: #5F24AF;
        font-size: 16px;
        padding-right: 20px;
        font-family: "Insider-Open Sans", sans-serif !important;
        cursor: pointer;
      }

      .ins-preview-wrapper-7077 .adaptive-description .ins-element-content a,
      .ins-preview-wrapper-7077 .adaptive-description .ins-element-content div {
        font-size: inherit !important;
      }

      .ins-preview-wrapper-7077 .ins-clearfix:after {
        content: ".";
        display: block;
        height: 0;
        clear: both;
        visibility: hidden
      }

      .ins-preview-wrapper-7077 .countdown-text {
        height: 100%;
        display: flex !important;
        align-items: center;
        justify-content: center;
      }

      .ins-preview-wrapper-7077 .countdown-text>.ins-element-countdown {
        margin-top: 6px;
        display: block;
      }

      .ins-preview-wrapper-7077 .countdown-text>.ins-element-text {
        padding-right: 5px;
      }

      .ins-preview-wrapper-7077 .countdown-wrapper {
        display: flex;
        text-align: center;
        width: auto !important;
        cursor: pointer;
      }

      .ins-preview-wrapper-7077 .insCountdown {
        display: inline-block !important;
        align-items: center;
        vertical-align: top;
        height: auto !important;
      }

      .ins-preview-wrapper-7077 .ins-top-bar-content-wrapper[data-separator-value]:not([data-separator-value*=":"]) .insCountdown .ins-countdown-separator {
        visibility: hidden;
      }

      .ins-preview-wrapper-7077 .ins-countdown-default .insCountdown .bloc-time:last-child {
        margin-right: 0 !important;
      }

      .ins-preview-wrapper-7077 .ins-countdown-default .insCountdown .count-title-element {
        font-weight: normal;
        font-size: 8px;
        width: 52px;
        display: block;
      }

      .ins-preview-wrapper-7077 .count-title-element span,
      .ins-preview-wrapper-7077 .count-title-element div {
        font-size: inherit;
      }

      .ins-preview-wrapper-7077 .ins-countdown-default .insCountdown .ins-figure {
        position: relative;
        float: left;
        width: 43px;
        height: 30px;
        background-color: #8119CD;
        margin-right: 3px;
        overflow: hidden;
        border-radius: 5px !important;
        -moz-box-shadow: 0 3px 4px 0 rgba(0, 0, 0, 0.2), inset 2px 4px 0 0 rgba(255, 255, 255, 0.08);
        -webkit-box-shadow: 0 3px 4px 0 rgba(0, 0, 0, 0.2), inset 2px 4px 0 0 rgba(255, 255, 255, 0.08);
        box-shadow: 0 3px 4px 0 rgba(0, 0, 0, 0.2), inset 2px 4px 0 0 rgba(255, 255, 255, 0.08);
      }

      .ins-preview-wrapper-7077 .ins-countdown-default .insCountdown .ins-figure:last-child {
        margin-right: 0;
      }

      .ins-preview-wrapper-7077 .ins-countdown-default .insCountdown .ins-figure>span {
        position: absolute;
        left: 0;
        right: 0;
        margin: auto;
        font: 700 18px "Arial";
        line-height: 32px;
        background-color: #8119CD;
        padding: 0 !important;
      }

      .ins-preview-wrapper-7077 .ins-countdown-default .insCountdown .ins-figure .top:after,
      .ins-preview-wrapper-7077 .insCountdown .ins-figure .bottom-back:after {
        content: "";
        position: absolute;
        z-index: -1;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
      }

      .ins-preview-wrapper-7077 .ins-countdown-default .insCountdown .ins-figure .top {
        z-index: 3;
        background-color: #8119CD;
        transform-origin: 50% 100%;
        -webkit-transform-origin: 50% 100%;
        -moz-border-radius-topleft: 10px;
        -webkit-border-top-left-radius: 10px;
        border-top-left-radius: 10px;
        -moz-border-radius-topright: 10px;
        -webkit-border-top-right-radius: 10px;
        border-top-right-radius: 10px;
        -moz-transform: perspective(200px);
        -ms-transform: perspective(200px);
        -webkit-transform: perspective(200px);
        transform: perspective(200px);
      }

      .ins-preview-wrapper-7077 .ins-countdown-default .insCountdown .ins-figure .bottom {
        z-index: 1;
      }

      .ins-preview-wrapper-7077 .ins-countdown-default .insCountdown .ins-figure .bottom:before {
        content: "";
        position: absolute;
        display: block;
        top: 0;
        left: 0;
        width: 100%;
        height: 50%;
        background-color: rgba(0, 0, 0, 0.02);
      }

      .ins-preview-wrapper-7077 .ins-countdown-default .insCountdown .ins-figure .bottom-back {
        z-index: 2;
        top: 0;
        height: 50%;
        overflow: hidden;
        background-color: #8119CD;
        -moz-border-radius-topleft: 10px;
        -webkit-border-top-left-radius: 10px;
        border-top-left-radius: 10px;
        -moz-border-radius-topright: 10px;
        -webkit-border-top-right-radius: 10px;
        border-top-right-radius: 10px;
      }

      .ins-preview-wrapper-7077 .ins-countdown-default .insCountdown .ins-figure .bottom-back span {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        margin: auto;
      }

      .ins-preview-wrapper-7077 .ins-countdown-default .insCountdown .ins-figure .top,
      .ins-preview-wrapper-7077 .insCountdown .ins-figure .top-back {
        height: 50%;
        overflow: hidden;
        -moz-backface-visibility: hidden;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        display: block;
      }

      .ins-preview-wrapper-7077 .ins-countdown-default .insCountdown .ins-figure .top-back {
        z-index: 4;
        bottom: 0;
        background-color: #8119CD;
        -webkit-transform-origin: 50% 0;
        transform-origin: 50% 0;
        -moz-transform: perspective(200px) rotateX(180deg);
        -ms-transform: perspective(200px) rotateX(180deg);
        -webkit-transform: perspective(200px) rotateX(180deg);
        transform: perspective(200px) rotateX(180deg);
        -moz-border-radius-bottomleft: 10px;
        -webkit-border-bottom-left-radius: 10px;
        border-bottom-left-radius: 10px;
        -moz-border-radius-bottomright: 10px;
        -webkit-border-bottom-right-radius: 10px;
        border-bottom-right-radius: 10px;
      }

      .ins-preview-wrapper-7077 .ins-countdown-default .insCountdown .ins-figure .top-back span {
        position: absolute;
        top: -100%;
        left: 0;
        right: 0;
        margin: auto;
      }

      .ins-preview-wrapper-7077 .ins-countdown-default .insCountdown .ins-countdown-separator {
        line-height: 30px;
      }

      .ins-preview-wrapper-7077 .ins-countdown-flip .insCountdown,
      .ins-preview-wrapper-7077 .ins-countdown-boxy .insCountdown,
      .ins-preview-wrapper-7077 .ins-countdown-simple-text .insCountdown {
        background-color: transparent;
      }

      .ins-preview-wrapper-7077 .ins-countdown-flip .insCountdown .bloc-time,
      .ins-preview-wrapper-7077 .ins-countdown-big-numbers .insCountdown .bloc-time {
        border-radius: 3px !important;
        padding: 1px;
      }

      .ins-preview-wrapper-7077 .ins-countdown-simple-text .insCountdown .count-title-element,
      .ins-preview-wrapper-7077 .ins-countdown-flip .insCountdown .count-title-element {
        display: block;
        margin-top: 31px;
        font-size: 7px;
        font-weight: bold;
        line-height: 9px;
        text-align: center;
        position: relative;
        top: -3px;
      }

      .ins-preview-wrapper-7077 .ins-countdown-flip .insCountdown .ins-figure,
      .ins-preview-wrapper-7077 .ins-countdown-big-numbers .insCountdown .ins-figure,
      .ins-preview-wrapper-7077 .ins-countdown-simple-text .insCountdown .ins-figure {
        position: relative;
        float: left;
        height: 26px;
        line-height: 26px;
        width: 17px;
        overflow: hidden;
      }

      .ins-preview-wrapper-7077 .ins-countdown-flip .insCountdown .ins-figure>span,
      .ins-preview-wrapper-7077 .ins-countdown-big-numbers .insCountdown .ins-figure>span,
      .ins-preview-wrapper-7077 .ins-countdown-simple-text .insCountdown .ins-figure>span {
        position: absolute;
        left: 0;
        right: 0;
        margin: auto;
        font: 500 18px "Arial";
        line-height: 26px;
        padding: 0 !important;
      }

      .ins-preview-wrapper-7077 .ins-countdown-flip .insCountdown .ins-countdown-separator,
      .ins-preview-wrapper-7077 .ins-countdown-big-numbers .insCountdown .ins-countdown-separator {
        line-height: 26px;
      }

      .ins-preview-wrapper-7077 .ins-countdown-flip .ins-figure>span {
        color: #FFFFFF !important;
        font-weight: bold !important;
      }

      .ins-preview-wrapper-7077 .ins-countdown-flip .insCountdown .count-title-element {
        color: #FFFFFF !important;
      }

      .ins-preview-wrapper-7077 .ins-countdown-flip .insCountdown .bloc-time {
        background-color: #8119CD;
      }

      .ins-preview-wrapper-7077 .ins-countdown-boxy .insCountdown .count-title-element {
        width: 100%;
        display: block;
        font-size: 8px;
        line-height: 8px;
        font-weight: normal;
        position: relative;
        background-color: #8119CD;
        margin: 30px 1px 1px 1px;
      }

      .ins-preview-wrapper-7077 .ins-countdown-boxy .insCountdown .ins-figure {
        position: relative;
        float: left;
        height: 33px;
        width: 20px;
        overflow: hidden;
      }

      .ins-preview-wrapper-7077 .ins-countdown-boxy .insCountdown .ins-figure>span {
        position: absolute;
        left: 0;
        right: 0;
        margin: auto;
        font: bold 20px "Arial";
        line-height: 32px;
        padding: 0 !important;
      }

      .ins-preview-wrapper-7077 .ins-countdown-boxy .insCountdown .ins-countdown-separator {
        line-height: 32px;
      }

      .ins-preview-wrapper-7077 .ins-countdown-boxy .insCountdown .ins-figure>span {
        color: #8119CD !important;
        font-weight: bold !important;
      }

      .ins-preview-wrapper-7077 .ins-countdown-boxy .insCountdown .count-title-element {
        padding: 3px;
        color: #FFFFFF !important;
      }

      .ins-preview-wrapper-7077 .ins-countdown-display .insCountdown {
        padding: 0 20px;
        border-radius: 3px !important;
        background-color: #2E0F71;
      }

      .ins-preview-wrapper-7077 .ins-countdown-display .insCountdown .ins-figure>span {
        color: #80E0FF !important;
        font-size: 18px !important;
      }

      .ins-preview-wrapper-7077 .ins-countdown-display .insCountdown .ins-countdown-separator {
        color: #80E0FF;
      }

      .ins-preview-wrapper-7077 .ins-countdown-display .insCountdown .count-title-element {
        display: block;
        margin-top: 31px;
        font-size: 7px;
        font-weight: bold;
        line-height: 9px;
        text-align: center;
        position: relative;
        top: -3px;
        color: #80E0FF !important;
        font-family: "Insider-Open Sans", sans-serif !important;
      }

      .ins-preview-wrapper-7077 .ins-countdown-display .insCountdown .ins-figure {
        position: relative;
        float: left;
        height: 26px;
        line-height: 26px;
        width: 17px;
        overflow: hidden;
      }

      .ins-preview-wrapper-7077 .ins-countdown-display .insCountdown .ins-figure>span {
        position: absolute;
        left: 0;
        right: 0;
        margin: auto;
        font: 500 18px "Arial";
        line-height: 26px;
        padding: 0 !important;
      }

      .ins-preview-wrapper-7077 .ins-countdown-boxy .insCountdown .ins-countdown-separator {
        line-height: 26px;
      }

      .ins-preview-wrapper-7077 .ins-countdown-digital-dark[data-separator-value]:not([data-separator-value*=":"]) .insCountdown .ins-countdown-separator {
        display: none;
      }

      .ins-preview-wrapper-7077 .ins-countdown-digital-dark .insCountdown {
        background-color: #320850;
      }

      .ins-preview-wrapper-7077 .ins-countdown-digital-dark .ins-countdown-display .insCountdown {
        background-color: #542EC1;
      }

      .ins-preview-wrapper-7077 .ins-countdown-digital-dark .insCountdown .ins-figure>span {
        color: #E9E6FF !important;
      }

      .ins-preview-wrapper-7077 .ins-countdown-digital-dark .insCountdown .bloc-time,
      .ins-preview-wrapper-7077 .ins-countdown-digital-white .insCountdown .bloc-time {
        background-color: transparent;
      }

      .ins-preview-wrapper-7077 .ins-countdown-digital-dark .insCountdown .count-title-element,
      .ins-preview-wrapper-7077 .ins-countdown-digital-white .insCountdown .count-title-element {
        display: block;
        margin-top: 31px;
        max-width: 34px;
        font: bold 7px "Arial";
        line-height: 9px;
        text-align: center;
        position: relative;
        top: -3px;
      }

      .ins-preview-wrapper-7077 .ins-countdown-digital-dark .insCountdown .ins-figure {
        position: relative;
        float: left;
        height: 26px;
        line-height: 26px;
        width: 17px;
        overflow: hidden;
        background-color: #542EC1;
      }

      .ins-preview-wrapper-7077 .ins-countdown-digital-dark .insCountdown .ins-figure>span,
      .ins-preview-wrapper-7077 .ins-countdown-digital-white .insCountdown .ins-figure>span {
        position: absolute;
        left: 0;
        right: 0;
        margin: auto;
        font-family: 'Digital-7 Mono', arial;
        font-weight: 500;
        font-size: 25px;
        line-height: 20px;
        padding: 0 !important;
      }

      .ins-preview-wrapper-7077 .ins-countdown-digital-dark .insCountdown .ins-countdown-radius-left,
      .ins-preview-wrapper-7077 .ins-countdown-digital-dark .insCountdown .ins-countdown-radius-right,
      .ins-preview-wrapper-7077 .ins-countdown-digital-dark .insCountdown .ins-countdown-separator,
      .ins-preview-wrapper-7077 .ins-countdown-digital-white .insCountdown .ins-countdown-radius-left,
      .ins-preview-wrapper-7077 .ins-countdown-digital-white .insCountdown .ins-countdown-radius-right,
      .ins-preview-wrapper-7077 .ins-countdown-digital-white .insCountdown .ins-countdown-separator {
        background-color: #542EC1;
      }

      .ins-preview-wrapper-7077 .ins-countdown-digital-dark .insCountdown .count-title-element {
        color: #FFFFFF !important;
        font-family: "Insider-Open Sans", sans-serif !important;
      }

      .ins-preview-wrapper-7077 .ins-countdown-digital-white[data-separator-value]:not([data-separator-value*=":"]) .insCountdown .ins-countdown-separator {
        display: none;
      }

      .ins-preview-wrapper-7077 .ins-countdown-digital-white .insCountdown {
        background-color: #FCF9FF;
      }

      .ins-preview-wrapper-7077 .ins-countdown-digital-white .ins-countdown-display .insCountdown {
        background-color: #E9E6FF;
      }

      .ins-preview-wrapper-7077 .ins-countdown-digital-white .insCountdown .ins-countdown-radius-left,
      .ins-preview-wrapper-7077 .ins-countdown-digital-white .insCountdown .ins-countdown-radius-right,
      .ins-preview-wrapper-7077 .ins-countdown-digital-white .insCountdown .ins-countdown-separator {
        background-color: #E9E6FF;
      }

      .ins-preview-wrapper-7077 .ins-countdown-digital-white .insCountdown .ins-figure {
        padding-top: 5px;
      }

      .ins-preview-wrapper-7077 .ins-countdown-digital-white .insCountdown .count-title-element {
        color: #320850 !important;
        font-family: "Insider-Open Sans", sans-serif !important;
      }

      .ins-preview-wrapper-7077 .ins-countdown-digital-white .insCountdown .ins-figure>span {
        color: #320850 !important;
      }

      .ins-preview-wrapper-7077 .ins-countdown-digital-white .insCountdown .ins-figure {
        position: relative;
        float: left;
        height: 26px;
        line-height: 26px;
        width: 17px;
        overflow: hidden;
        background-color: #E9E6FF;
      }

      .ins-preview-wrapper-7077 .ins-countdown-simple-text .insCountdown {
        margin-bottom: -5px;
      }

      .ins-preview-wrapper-7077 .ins-countdown-simple-text .insCountdown .bloc-time {
        background: inherit;
        border-radius: 0;
        border: inherit;
      }

      .ins-preview-wrapper-7077 .ins-countdown-simple-text .insCountdown .count-title-element {
        font-size: 10px;
        font-weight: bold;
        line-height: 10px;
        top: -5px;
        color: #320850 !important;
        font-family: "Insider-Open Sans", sans-serif !important;
      }

      .ins-preview-wrapper-7077 .ins-countdown-simple-text .insCountdown .ins-figure {
        width: 21px;
      }

      .ins-preview-wrapper-7077 .ins-countdown-simple-text .insCountdown .ins-figure>span {
        font: bold 18px "Arial";
      }

      .ins-preview-wrapper-7077 .ins-countdown-simple-text .insCountdown .ins-countdown-separator {
        line-height: 18px;
        font: bold 16px "Arial";
      }

      .ins-preview-wrapper-7077 .ins-countdown-simple-text .insCountdown .ins-figure>span {
        color: #8119CD !important;
      }

      .ins-preview-wrapper-7077 .ins-countdown-big-numbers .insCountdown {
        overflow: hidden;
        border-radius: 3px !important;
      }

      .ins-preview-wrapper-7077 .ins-countdown-big-numbers .insCountdown .bloc-time {
        border-radius: 0 !important;
        border: unset !important;
      }

      .ins-preview-wrapper-7077 .ins-countdown-big-numbers .insCountdown .ins-figure {
        height: 32px;
      }

      .ins-preview-wrapper-7077 .ins-countdown-big-numbers .insCountdown .ins-figure>span {
        font: 500 24px "Arial";
        line-height: 32px !important;
      }

      .ins-preview-wrapper-7077 .ins-countdown-big-numbers .insCountdown .bloc-time .ins-element-text {
        float: left;
        position: relative;
        height: 32px;
        line-height: 32px;
        padding: 0 3px;
      }

      .ins-preview-wrapper-7077 .ins-countdown-big-numbers .insCountdown .count-title-element {
        font-weight: bold;
        font-size: 10px;
        color: #320850 !important;
        font-family: "Insider-Open Sans", sans-serif !important;
      }

      .ins-preview-wrapper-7077 .ins-countdown-big-numbers .insCountdown .ins-countdown-separator {
        line-height: 34px;
        margin: 0 0;
        padding: 0 2px;
      }

      .ins-preview-wrapper-7077 .ins-countdown-big-numbers .insCountdown .ins-figure>span {
        color: #8119CD !important;
      }

      .ins-preview-wrapper-7077 .ins-countdown-big-numbers .insCountdown .bloc-time,
      .ins-preview-wrapper-7077 .ins-countdown-big-numbers .insCountdown {
        background-color: #E9E6FF;
      }

      .ins-preview-wrapper-7077 .ins-notification-content div.hide-element {
        display: none;
      }

      .ins-preview-wrapper-7077 .ins-element-wrap .ins-element-content.ins-adaptive-button-container a,
      .ins-preview-wrapper-7077 .ins-element-wrap .ins-element-content.ins-adaptive-button-container div {
        font-size: inherit !important;
      }

      .ins-preview-wrapper-7077 .ins-adabtive-btn-default,
      .ins-preview-wrapper-7077 .ins-adabtive-btn-primary {
        border-radius: 3px !important;
        box-sizing: border-box;
        padding: 17px 25px;
        line-height: 14px;
        display: block;
      }

      .ins-preview-wrapper-7077 .ins-adabtive-btn-default {
        background-color: #fff;
        border: 1px solid #979797;
        color: #979797 !important;
      }

      .ins-preview-wrapper-7077 .ins-adabtive-btn-primary {
        border: 1px solid #000000;
        box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.2);
      }

      .ins-preview-wrapper-7077 .ins-adaptive-button-container .ins-element-link {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
      }

      .ins-preview-wrapper-7077 .ins-adaptive-button-container .ins-adaptive-button {
        width: auto !important;
        cursor: pointer !important;
        min-height: inherit !important;
        flex-flow: column;
        word-break: break-word;
      }

      .ins-preview-wrapper-7077 .ins-adaptive-button-container a,
      .ins-preview-wrapper-7077 .ins-adaptive-button-container a:hover,
      .ins-preview-wrapper-7077 .ins-adaptive-button {
        text-decoration: inherit;
        color: inherit;
      }

      .ins-preview-wrapper-7077 div[id^="wrap-close-button"] {
        display: block;
      }

      .ins-preview-wrapper-7077 .ins-element-close-button {
        position: absolute;
        z-index: 9999999999999;
        top: 0;
      }

      .ins-preview-wrapper-7077 .ins-element-close-button .ins-element-content {
        color: #8119CD;
        text-align: center;
        cursor: pointer;
        line-height: 28px;
        width: 28px;
        font: normal 28px "Arial", sans-serif;
      }

      .ins-preview-wrapper-7077 .wrap-countdown-text {
        display: inline-block;
        width: auto;
        position: absolute;
        transform: matrix(1, 0, 0, 1, -199.5, -31.5) translate(10px, 9.5px);
        left: 50%;
        top: 50%;
      }

      .ins-preview-wrapper-7077 .ins-countdown-element-content {
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        cursor: grabbing;
      }

      .ins-preview-wrapper-7077 .insCountdown .ins-figure>span {
        color: #FFFFFF;
      }

      .ins-preview-wrapper-7077 .insCountdown .count-title-element {
        font-weight: normal !important;
        font-size: 9px !important;
        width: 100% !important;
        color: #595C63;
      }

      .ins-preview-wrapper-7077 .ins-countdown-separator {
        float: left;
        color: #AF69BA;
        font-weight: bold;
        font-size: 12px;
        white-space: nowrap;
        margin: 0 5px;
        line-height: 22px;
      }

      .ins-preview-wrapper-7077 #wrap-text-1552731740,
      .ins-preview-wrapper-7077 #wrap-text-1552731743,
      .ins-preview-wrapper-7077 #wrap-text-1552731742,
      .ins-preview-wrapper-7077 #wrap-text-1552731741 {
        display: block;
        padding-top: 0px;
      }

      .ins-preview-wrapper-7077 .ins-countdown-default #wrap-text-1552731740,
      .ins-preview-wrapper-7077 .ins-countdown-default #wrap-text-1552731741,
      .ins-preview-wrapper-7077 .ins-countdown-default #wrap-text-1552731742,
      .ins-preview-wrapper-7077 .ins-countdown-default #wrap-text-1552731743 {
        margin-top: 30px;
      }

      .ins-preview-wrapper-7077 .bloc-time-days[style*="display: none;"]+.ins-countdown-days-separator {
        display: none;
      }

      .ins-preview-wrapper-7077 .insCountdown .ins-countdown-seconds-separator {
        display: none;
      }

      .ins-preview-wrapper-7077 .insCountdown .ins-countdown-radius-left,
      .ins-preview-wrapper-7077 .insCountdown .ins-countdown-radius-right {
        display: none;
      }

      .ins-preview-wrapper-7077 .ins-countdown-digital-dark .insCountdown,
      .ins-preview-wrapper-7077 .ins-countdown-digital-white .insCountdown {
        padding: 5px 10px 0 10px;
        border-radius: 3px !important;
      }

      .ins-preview-wrapper-7077 .ins-countdown-digital-dark .insCountdown .ins-countdown-radius,
      .ins-preview-wrapper-7077 .ins-countdown-digital-white .insCountdown .ins-countdown-radius {
        display: block !important;
        float: left;
        height: 26px;
      }

      .ins-preview-wrapper-7077 .ins-countdown-digital-dark .insCountdown .ins-countdown-separator,
      .ins-preview-wrapper-7077 .ins-countdown-digital-white .insCountdown .ins-countdown-separator {
        line-height: 26px;
        margin: 0 0;
        padding: 0 5px;
        font-family: 'Digital-7 Mono', arial;
      }

      .ins-preview-wrapper-7077 .ins-countdown-digital-dark .insCountdown .ins-countdown-radius-right,
      .ins-preview-wrapper-7077 .ins-countdown-digital-white .insCountdown .ins-countdown-radius-right {
        border-bottom-right-radius: 5px !important;
        border-top-right-radius: 5px !important;
        padding-right: 10px !important;
      }

      .ins-preview-wrapper-7077 .ins-countdown-digital-dark .insCountdown .ins-countdown-radius-left,
      .ins-preview-wrapper-7077 .ins-countdown-digital-white .insCountdown .ins-countdown-radius-left {
        border-bottom-left-radius: 5px !important;
        border-top-left-radius: 5px !important;
        padding-left: 10px !important;
      }

      .ins-preview-wrapper-7077 .insCountdownWrapper[data-countdown-second="on"] .ins-countdown-seconds-separator {
        display: block;
      }

      .ins-preview-wrapper-7077 .insCountdown .bloc-time {
        float: left;
        text-align: center;
      }

      .ins-preview-wrapper-7077 #ins-top-bar-container:not(.ins-countdown-default) .insCountdown .bloc-time div.ins-figure:first-child {
        text-align: right;
      }

      .ins-preview-wrapper-7077 #ins-top-bar-container:not(.ins-countdown-default) .insCountdown .bloc-time div.ins-figure:nth-child(2) {
        text-align: left;
      }

      .ins-preview-wrapper-7077 #ins-top-bar-container:not(.ins-countdown-default) .insCountdown .ins-figure:last-child,
      .ins-preview-wrapper-7077 #ins-top-bar-container:not(.ins-countdown-default) .insCountdown .bloc-time:last-child {
        margin-right: 0 !important;
      }

      .ins-preview-wrapper-7077 #ins-top-bar-container:not(.ins-countdown-default) .insCountdown .ins-figure>span {
        display: none;
      }

      .ins-preview-wrapper-7077 #ins-top-bar-container:not(.ins-countdown-default) .insCountdown .ins-figure>span:first-child {
        display: block;
        transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1) !important;
      }

      .ins-preview-wrapper-7077 .ins-sticker-element {
        width: 100%;
        height: 100%;
        background-size: 100% 100%;
        background-repeat: no-repeat;
        background-color: rgb(205 199 243);
        background-image: url(https://image.useinsider.com/default/action-builder/sticker.png);
        cursor: grabbing;
      }

      .ins-preview-wrapper-7077 .ins-sticker-wrapper {
        width: 50px;
        height: 50px;
        position: absolute;
        transform: matrix(1, 0, 0, 1, 42, -10) translate(-63px, -10px);
        left: 50%;
        top: 50%;
      }

      .ins-preview-wrapper-7077 .ins-coupon-container {
        left: 50%;
        transform: matrix(1, 0, 0, 1, 315, 24) translate(-3px, -33px);
        top: 50%;
        position: absolute;
      }

      .ins-preview-wrapper-7077 .ins-coupon-text {
        margin-right: 12px;
        line-height: 38px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      .ins-preview-wrapper-7077 .ins-coupon-text .ins-element-content {
        border: 1.5px dashed;
        border-color: #BDBFD4;
        font-weight: bold;
        font-size: 14px;
        border-radius: 4px !important;
      }

      .ins-preview-wrapper-7077 .ins-coupon-element-content {
        width: 100%;
        height: 100%;
        display: flex !important;
        justify-content: center;
        align-items: center;
      }

      .ins-preview-wrapper-7077 .ins-coupon-element-content .ins-copy-button-container {
        height: 26px;
        width: 62px;
      }

      .ins-preview-wrapper-7077 .ins-coupon-element-content .editable-coupon {
        height: 24px;
        width: 132px;
        color: #5F24AF;
        font-size: 12px;
        font-weight: normal;
        line-height: 27px;
        text-align: center;
      }

      .ins-preview-wrapper-7077 .ins-coupon-element-content .ins-copy-to-clipboard {
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
      }

      .ins-preview-wrapper-7077 .ins-coupon-element-content .element-coupon {
        width: auto;
      }

      .ins-preview-wrapper-7077 .ins-coupon-element-content .ins-element-copy-to-clipboard-button {
        color: inherit;
        display: flex;
        justify-content: center;
        align-items: center;
        width: inherit !important;
        height: inherit !important;
      }

      .ins-preview-wrapper-7077 .ins-coupon-element-content .ins-element-copy-to-clipboard-button .ins-element-editable {
        display: flex;
        justify-content: center;
        align-items: center;
      }

      .ins-preview-wrapper-7077 .ins-coupon-element-content .ins-coupon-button {
        background: #8119CD;
        border-radius: 4px !important;
        text-align: center;
        display: flex;
        width: 100%;
        height: 100%;
        justify-content: center;
        align-items: center;
        color: #FFFFFF;
        font-size: 12px;
        font-weight: bold;
      }

      .ins-preview-wrapper-7077 .ins-countdown-element-content .adaptive-description {
        max-width: 300px;
      }

      .ins-preview-wrapper-7077 .ins-element-copy-to-clipboard-button .ins-element-editable,
      .ins-preview-wrapper-7077 .ins-adaptive-button-container .ins-element-editable {
        text-overflow: ellipsis;
        white-space: normal;
      }

      .ins-preview-wrapper-7077 .adaptive-title.ins-sample-element-wrapper {
        width: auto;
        height: auto;
        min-width: inherit !important;
        min-height: inherit !important;
      }

      .ins-preview-wrapper-7077 .ins-adaptive-button-wrapper {
        align-items: center;
        color: #ffffff;
        cursor: grabbing;
        display: flex;
        justify-content: center;
        left: 50%;
        top: 50%;
        transform: matrix(1, 0, 0, 1, 429, 17) translate(-16.7px, -35px);
        width: 98px;
      }

      .ins-preview-wrapper-7077 .ins-adaptive-button-container {
        align-items: center;
        background-color: #8119CD;
        border-radius: 64px !important;
        color: #ffffff;
        display: flex;
        font-size: 12px;
        font-weight: bold;
        justify-content: center;
        text-align: center;
        width: 100% !important;
        height: 100% !important;
        min-height: inherit !important;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        padding: 10px;
      }

      .ins-preview-wrapper-7077 .ins-element-editable {
        padding: 0 4px;
      }

      .ins-preview-wrapper-7077 div[data-bind-menu="notification|text_editing"] {
        outline: none;
      }

      .ins-preview-wrapper-7077 .insCountdownWrapper {
        width: max-content;
        width: -moz-max-content;
      }

      .ins-preview-wrapper-7077 .ins-selected-element {
        outline: 1px solid #4EB9F6;
        border: none;
        margin: 0;
      }

      .ins-preview-wrapper-7077 .ins-element-content.editable-text {
        line-height: normal !important;
      }

      .ins-preview-wrapper-7077 .ins-overflow-hidden {
        overflow: hidden;
      }
    </style>
    <script type="text/javascript" async="" src="https://googleads.g.doubleclick.net/pagead/viewthroughconversion/866667944/?random=1706031165860&amp;cv=11&amp;fst=1706031165860&amp;bg=ffffff&amp;guid=ON&amp;async=1&amp;gtm=45be41h0v893881134z8840982626&amp;gcd=11l1l1l1l1&amp;dma_cps=sypham&amp;dma=1&amp;tag_exp=71847096&amp;u_w=1440&amp;u_h=900&amp;url=https%3A%2F%2Fwww.pttavm.com%2Fapple-iphone-13-128-gb-gece-yarisi-cep-telefonu-apple-turkiye-garantili-p-230662642&amp;ref=https%3A%2F%2Fwww.google.com%2F&amp;hn=www.googleadservices.com&amp;frm=0&amp;tiba=Apple%20iPhone%2013%20128%20GB%20Gece%20Yar%C4%B1s%C4%B1%20Cep%20Telefon%20-%20PttAVM.com&amp;auid=55697448.1706031153&amp;fledge=1&amp;uaa=arm&amp;uab=64&amp;uafvl=Not_A%2520Brand%3B8.0.0.0%7CChromium%3B120.0.6099.234%7CGoogle%2520Chrome%3B120.0.6099.234&amp;uamb=0&amp;uap=macOS&amp;uapv=14.2.1&amp;uaw=0&amp;data=event%3Dgtag.config&amp;rfmt=3&amp;fmt=4"></script>
    <script type="text/javascript" async="" src="https://googleads.g.doubleclick.net/pagead/viewthroughconversion/866667944/?random=1706031165877&amp;cv=11&amp;fst=1706031165877&amp;bg=ffffff&amp;guid=ON&amp;async=1&amp;gtm=45He41h0v840982626&amp;gcd=11l1l1l1l1&amp;dma_cps=sypham&amp;dma=1&amp;tag_exp=71847096&amp;u_w=1440&amp;u_h=900&amp;url=https%3A%2F%2Fwww.pttavm.com%2Fapple-iphone-13-128-gb-gece-yarisi-cep-telefonu-apple-turkiye-garantili-p-230662642&amp;ref=https%3A%2F%2Fwww.google.com%2F&amp;hn=www.googleadservices.com&amp;frm=0&amp;tiba=Apple%20iPhone%2013%20128%20GB%20Gece%20Yar%C4%B1s%C4%B1%20Cep%20Telefon%20-%20PttAVM.com&amp;userId=guest_00ba9bf3615082a4fac68cc26a&amp;auid=55697448.1706031153&amp;fledge=1&amp;uaa=arm&amp;uab=64&amp;uafvl=Not_A%2520Brand%3B8.0.0.0%7CChromium%3B120.0.6099.234%7CGoogle%2520Chrome%3B120.0.6099.234&amp;uamb=0&amp;uap=macOS&amp;uapv=14.2.1&amp;uaw=0&amp;data=ecomm_pagetype%3DDetail%20Page%3Becomm_prodid%3D230662642%3Becomm_productprice%3D37679.21%3Bpcat%3DCep%20Telefonlar%C4%B1&amp;rfmt=3&amp;fmt=4"></script>
    <link rel="preload" as="style" href="https://cdn-fe.pttavm.com/_nuxt/css/56b9981.css">
    <script charset="utf-8" src="https://cdn-fe.pttavm.com/_nuxt/8718b3d.js"></script>
    <link rel="preload" as="style" href="https://cdn-fe.pttavm.com/_nuxt/css/1c10869.css">
    <script charset="utf-8" src="https://cdn-fe.pttavm.com/_nuxt/3984245.js"></script>
    <script charset="utf-8" src="https://cdn-fe.pttavm.com/_nuxt/d3350e4.js"></script>
    <link rel="preload" as="style" href="https://cdn-fe.pttavm.com/_nuxt/css/1b0424d.css">
    <script charset="utf-8" src="https://cdn-fe.pttavm.com/_nuxt/794d0e7.js"></script>
    <script charset="utf-8" src="https://cdn-fe.pttavm.com/_nuxt/33f76d4.js"></script>
    <script charset="utf-8" src="https://cdn-fe.pttavm.com/_nuxt/c147d31.js"></script>
    <script charset="utf-8" src="https://cdn-fe.pttavm.com/_nuxt/92a83da.js"></script>
    <script charset="utf-8" src="https://cdn-fe.pttavm.com/_nuxt/9a8c574.js"></script>
    <script charset="utf-8" src="https://cdn-fe.pttavm.com/_nuxt/31e4e5f.js"></script>
    <link rel="preload" as="style" href="https://cdn-fe.pttavm.com/_nuxt/css/3a33416.css">
    <script charset="utf-8" src="https://cdn-fe.pttavm.com/_nuxt/26fc605.js"></script>
    <link rel="preload" as="style" href="https://cdn-fe.pttavm.com/_nuxt/css/4a6a581.css">
    <script charset="utf-8" src="https://cdn-fe.pttavm.com/_nuxt/3eafc91.js"></script>
    <script charset="utf-8" src="https://cdn-fe.pttavm.com/_nuxt/39f4cf5.js"></script>
    <script charset="utf-8" src="https://cdn-fe.pttavm.com/_nuxt/e280956.js"></script>
    <link rel="preload" as="style" href="https://cdn-fe.pttavm.com/_nuxt/css/25a429b.css">
    <script charset="utf-8" src="https://cdn-fe.pttavm.com/_nuxt/5e9ef0c.js"></script>
  </head>
  <body>
    <div id="__nuxt">
      <!---->
      <div id="__layout">
        <div data-v-5ffd7b16="" id="main" class="relative text-eGrey-900">
          <!---->
          <!---->
          <!---->
          <!---->
          <!---->
          <div data-v-70e7eb2f="" data-v-5ffd7b16="" class="select-none main-category">
            <div data-v-70e7eb2f="" class="p-4 pl-6 flex flex-row justify-between items-center border-b-1 border-eGrey-200">
              <h3 data-v-70e7eb2f="" class="w-11/12 md:w-full text-2xl font-semibold flex flex-row">
                <!---->
                <span data-v-70e7eb2f="" class="truncate pr-1">Kategoriler</span>
              </h3>
              <div data-v-70e7eb2f="" class="flex flex-row">
                <button data-v-70e7eb2f="" aria-label="Kapat" class="text-xl outline-none focus:outline-none">
                  <i data-v-70e7eb2f="" class="eptticon-close"></i>
                </button>
              </div>
            </div>
            <div data-v-70e7eb2f="" class="category-items flex flex-1 flex-col overflow-y-auto">
              <div data-v-70e7eb2f="" class="category-items md:py-4 flex flex-1 flex-col overflow-y-auto">
                <div data-v-70e7eb2f="" class="flex flex-col">
                  <!---->
                  <ul data-v-70e7eb2f="" class="flex flex-col flex-none text-sm">
                    <!---->
                    <li data-v-70e7eb2f="" data-id="1" class="md:border-b-0 px-4 md:pb-2 border-eGrey-200 relative flex flex-col border-b-1">
                      <div data-v-70e7eb2f="" class="h-16 md:p-2 justify-center bg-white rounded-lg text-eGrey-900 flex flex-col hover:bg-eGrey-100">
                        <div data-v-70e7eb2f="" class="flex flex-row items-center justify-between flex-1">
                          <div data-v-70e7eb2f="" class="flex flex-row items-center">
                            <div data-v-70e7eb2f="" class="mr-2 h-12 w-12 flex items-center justify-center text-3xl rounded-full bg-ePurple-bg text-ePurple-text">
                              <i data-v-70e7eb2f="" class="evoicon-elektronik text-ePurple-text" style="margin-top: 2px; font-size: 26px;"></i>
                            </div>
                            <h4 data-v-70e7eb2f="" class="text-base md:text-sm flex flex-1"> Elektronik </h4>
                          </div>
                          <i data-v-70e7eb2f="" class="eptticon-right"></i>
                        </div>
                      </div>
                    </li>
                    <li data-v-70e7eb2f="" data-id="2" class="md:border-b-0 px-4 md:pb-2 border-eGrey-200 relative flex flex-col border-b-1">
                      <div data-v-70e7eb2f="" class="h-16 md:p-2 justify-center bg-white rounded-lg text-eGrey-900 flex flex-col hover:bg-eGrey-100">
                        <div data-v-70e7eb2f="" class="flex flex-row items-center justify-between flex-1">
                          <div data-v-70e7eb2f="" class="flex flex-row items-center">
                            <div data-v-70e7eb2f="" class="mr-2 h-12 w-12 flex items-center justify-center text-3xl rounded-full bg-eGreen-bg text-eGreen-text">
                              <i data-v-70e7eb2f="" class="evoicon-giyim-ve-aksesuar text-eGreen-text" style="font-size: 30px;"></i>
                            </div>
                            <h4 data-v-70e7eb2f="" class="text-base md:text-sm flex flex-1"> Giyim &amp; Aksesuar </h4>
                          </div>
                          <i data-v-70e7eb2f="" class="eptticon-right"></i>
                        </div>
                      </div>
                    </li>
                    <li data-v-70e7eb2f="" data-id="3" class="md:border-b-0 px-4 md:pb-2 border-eGrey-200 relative flex flex-col border-b-1">
                      <div data-v-70e7eb2f="" class="h-16 md:p-2 justify-center bg-white rounded-lg text-eGrey-900 flex flex-col hover:bg-eGrey-100">
                        <div data-v-70e7eb2f="" class="flex flex-row items-center justify-between flex-1">
                          <div data-v-70e7eb2f="" class="flex flex-row items-center">
                            <div data-v-70e7eb2f="" class="mr-2 h-12 w-12 flex items-center justify-center text-3xl rounded-full bg-eBlue-bg text-eBlue-text">
                              <i data-v-70e7eb2f="" class="evoicon-taki-gozluk-ve-saat text-eBlue-text" style="font-size: 32px;"></i>
                            </div>
                            <h4 data-v-70e7eb2f="" class="text-base md:text-sm flex flex-1"> Takı &amp; Gözlük &amp; Saat </h4>
                          </div>
                          <i data-v-70e7eb2f="" class="eptticon-right"></i>
                        </div>
                      </div>
                    </li>
                    <li data-v-70e7eb2f="" data-id="4" class="md:border-b-0 px-4 md:pb-2 border-eGrey-200 relative flex flex-col border-b-1">
                      <div data-v-70e7eb2f="" class="h-16 md:p-2 justify-center bg-white rounded-lg text-eGrey-900 flex flex-col hover:bg-eGrey-100">
                        <div data-v-70e7eb2f="" class="flex flex-row items-center justify-between flex-1">
                          <div data-v-70e7eb2f="" class="flex flex-row items-center">
                            <div data-v-70e7eb2f="" class="mr-2 h-12 w-12 flex items-center justify-center text-3xl rounded-full bg-eGold-bg text-eGold-text">
                              <i data-v-70e7eb2f="" class="evoicon-kozmetik-ve-kisisel-bakim text-eGold-text" style="font-size: 30px;"></i>
                            </div>
                            <h4 data-v-70e7eb2f="" class="text-base md:text-sm flex flex-1"> Kozmetik &amp; Kişisel Bakım </h4>
                          </div>
                          <i data-v-70e7eb2f="" class="eptticon-right"></i>
                        </div>
                      </div>
                    </li>
                    <li data-v-70e7eb2f="" data-id="5" class="md:border-b-0 px-4 md:pb-2 border-eGrey-200 relative flex flex-col border-b-1">
                      <div data-v-70e7eb2f="" class="h-16 md:p-2 justify-center bg-white rounded-lg text-eGrey-900 flex flex-col hover:bg-eGrey-100">
                        <div data-v-70e7eb2f="" class="flex flex-row items-center justify-between flex-1">
                          <div data-v-70e7eb2f="" class="flex flex-row items-center">
                            <div data-v-70e7eb2f="" class="mr-2 h-12 w-12 flex items-center justify-center text-3xl rounded-full bg-eRed-bg text-eRed-text">
                              <i data-v-70e7eb2f="" class="evoicon-anne-bebek-ve-oyuncak text-eRed-text" style="margin-top: 2px; font-size: 30px;"></i>
                            </div>
                            <h4 data-v-70e7eb2f="" class="text-base md:text-sm flex flex-1"> Anne &amp; Bebek &amp; Oyuncak </h4>
                          </div>
                          <i data-v-70e7eb2f="" class="eptticon-right"></i>
                        </div>
                      </div>
                    </li>
                    <li data-v-70e7eb2f="" data-id="6" class="md:border-b-0 px-4 md:pb-2 border-eGrey-200 relative flex flex-col border-b-1">
                      <div data-v-70e7eb2f="" class="h-16 md:p-2 justify-center bg-white rounded-lg text-eGrey-900 flex flex-col hover:bg-eGrey-100">
                        <div data-v-70e7eb2f="" class="flex flex-row items-center justify-between flex-1">
                          <div data-v-70e7eb2f="" class="flex flex-row items-center">
                            <div data-v-70e7eb2f="" class="mr-2 h-12 w-12 flex items-center justify-center text-3xl rounded-full bg-eCyan-bg text-eCyan-text">
                              <i data-v-70e7eb2f="" class="evoicon-hobi-ve-oyuncak text-eCyan-text" style="font-size: 32px;"></i>
                            </div>
                            <h4 data-v-70e7eb2f="" class="text-base md:text-sm flex flex-1"> Hobi &amp; Oyuncak </h4>
                          </div>
                          <i data-v-70e7eb2f="" class="eptticon-right"></i>
                        </div>
                      </div>
                    </li>
                    <li data-v-70e7eb2f="" data-id="7" class="md:border-b-0 px-4 md:pb-2 border-eGrey-200 relative flex flex-col border-b-1">
                      <div data-v-70e7eb2f="" class="h-16 md:p-2 justify-center bg-white rounded-lg text-eGrey-900 flex flex-col hover:bg-eGrey-100">
                        <div data-v-70e7eb2f="" class="flex flex-row items-center justify-between flex-1">
                          <div data-v-70e7eb2f="" class="flex flex-row items-center">
                            <div data-v-70e7eb2f="" class="mr-2 h-12 w-12 flex items-center justify-center text-3xl rounded-full bg-eDarkBlue-bg text-eDarkBlue-text">
                              <i data-v-70e7eb2f="" class="evoicon-fotograf-ve-kamera text-eDarkBlue-text" style="font-size: 26px;"></i>
                            </div>
                            <h4 data-v-70e7eb2f="" class="text-base md:text-sm flex flex-1"> Fotoğraf &amp; Kamera </h4>
                          </div>
                          <i data-v-70e7eb2f="" class="eptticon-right"></i>
                        </div>
                      </div>
                    </li>
                    <li data-v-70e7eb2f="" data-id="8" class="md:border-b-0 px-4 md:pb-2 border-eGrey-200 relative flex flex-col border-b-1">
                      <div data-v-70e7eb2f="" class="h-16 md:p-2 justify-center bg-white rounded-lg text-eGrey-900 flex flex-col hover:bg-eGrey-100">
                        <div data-v-70e7eb2f="" class="flex flex-row items-center justify-between flex-1">
                          <div data-v-70e7eb2f="" class="flex flex-row items-center">
                            <div data-v-70e7eb2f="" class="mr-2 h-12 w-12 flex items-center justify-center text-3xl rounded-full bg-eOrange-bg text-eOrange-text">
                              <i data-v-70e7eb2f="" class="evoicon-ev-dekorasyon text-eOrange-text" style="margin-left: 2px; font-size: 28px;"></i>
                            </div>
                            <h4 data-v-70e7eb2f="" class="text-base md:text-sm flex flex-1"> Ev Dekorasyon </h4>
                          </div>
                          <i data-v-70e7eb2f="" class="eptticon-right"></i>
                        </div>
                      </div>
                    </li>
                    <li data-v-70e7eb2f="" data-id="9" class="md:border-b-0 px-4 md:pb-2 border-eGrey-200 relative flex flex-col border-b-1">
                      <div data-v-70e7eb2f="" class="h-16 md:p-2 justify-center bg-white rounded-lg text-eGrey-900 flex flex-col hover:bg-eGrey-100">
                        <div data-v-70e7eb2f="" class="flex flex-row items-center justify-between flex-1">
                          <div data-v-70e7eb2f="" class="flex flex-row items-center">
                            <div data-v-70e7eb2f="" class="mr-2 h-12 w-12 flex items-center justify-center text-3xl rounded-full bg-ePurple-bg text-ePurple-text">
                              <i data-v-70e7eb2f="" class="evoicon-spor-ve-outdoor text-ePurple-text" style="font-size: 30px;"></i>
                            </div>
                            <h4 data-v-70e7eb2f="" class="text-base md:text-sm flex flex-1"> Spor &amp; Outdoor </h4>
                          </div>
                          <i data-v-70e7eb2f="" class="eptticon-right"></i>
                        </div>
                      </div>
                    </li>
                    <li data-v-70e7eb2f="" data-id="10" class="md:border-b-0 px-4 md:pb-2 border-eGrey-200 relative flex flex-col border-b-1">
                      <div data-v-70e7eb2f="" class="h-16 md:p-2 justify-center bg-white rounded-lg text-eGrey-900 flex flex-col hover:bg-eGrey-100">
                        <div data-v-70e7eb2f="" class="flex flex-row items-center justify-between flex-1">
                          <div data-v-70e7eb2f="" class="flex flex-row items-center">
                            <div data-v-70e7eb2f="" class="mr-2 h-12 w-12 flex items-center justify-center text-3xl rounded-full bg-eGreen-bg text-eGreen-text">
                              <i data-v-70e7eb2f="" class="evoicon-supermarket text-eGreen-text" style="margin-left: -2px; font-size: 24px;"></i>
                            </div>
                            <h4 data-v-70e7eb2f="" class="text-base md:text-sm flex flex-1"> Süpermarket </h4>
                          </div>
                          <i data-v-70e7eb2f="" class="eptticon-right"></i>
                        </div>
                      </div>
                    </li>
                    <li data-v-70e7eb2f="" data-id="11" class="md:border-b-0 px-4 md:pb-2 border-eGrey-200 relative flex flex-col border-b-1">
                      <div data-v-70e7eb2f="" class="h-16 md:p-2 justify-center bg-white rounded-lg text-eGrey-900 flex flex-col hover:bg-eGrey-100">
                        <div data-v-70e7eb2f="" class="flex flex-row items-center justify-between flex-1">
                          <div data-v-70e7eb2f="" class="flex flex-row items-center">
                            <div data-v-70e7eb2f="" class="mr-2 h-12 w-12 flex items-center justify-center text-3xl rounded-full bg-eBlue-bg text-eBlue-text">
                              <i data-v-70e7eb2f="" class="evoicon-yapi-market-ve-bahce text-eBlue-text" style="margin-left: 6px; font-size: 30px;"></i>
                            </div>
                            <h4 data-v-70e7eb2f="" class="text-base md:text-sm flex flex-1"> Yapı Market &amp; Bahçe </h4>
                          </div>
                          <i data-v-70e7eb2f="" class="eptticon-right"></i>
                        </div>
                      </div>
                    </li>
                    <li data-v-70e7eb2f="" data-id="12" class="md:border-b-0 px-4 md:pb-2 border-eGrey-200 relative flex flex-col border-b-1">
                      <div data-v-70e7eb2f="" class="h-16 md:p-2 justify-center bg-white rounded-lg text-eGrey-900 flex flex-col hover:bg-eGrey-100">
                        <div data-v-70e7eb2f="" class="flex flex-row items-center justify-between flex-1">
                          <div data-v-70e7eb2f="" class="flex flex-row items-center">
                            <div data-v-70e7eb2f="" class="mr-2 h-12 w-12 flex items-center justify-center text-3xl rounded-full bg-eGold-bg text-eGold-text">
                              <i data-v-70e7eb2f="" class="evoicon-otomobil-ve-motosiklet text-eGold-text" style="font-size: 28px;"></i>
                            </div>
                            <h4 data-v-70e7eb2f="" class="text-base md:text-sm flex flex-1"> Otomobil &amp; Motosiklet </h4>
                          </div>
                          <i data-v-70e7eb2f="" class="eptticon-right"></i>
                        </div>
                      </div>
                    </li>
                    <li data-v-70e7eb2f="" data-id="13" class="md:border-b-0 px-4 md:pb-2 border-eGrey-200 relative flex flex-col border-b-1">
                      <div data-v-70e7eb2f="" class="h-16 md:p-2 justify-center bg-white rounded-lg text-eGrey-900 flex flex-col hover:bg-eGrey-100">
                        <div data-v-70e7eb2f="" class="flex flex-row items-center justify-between flex-1">
                          <div data-v-70e7eb2f="" class="flex flex-row items-center">
                            <div data-v-70e7eb2f="" class="mr-2 h-12 w-12 flex items-center justify-center text-3xl rounded-full bg-eRed-bg text-eRed-text">
                              <i data-v-70e7eb2f="" class="evoicon-pet-shop text-eRed-text" style="margin-top: -2px; font-size: 24px;"></i>
                            </div>
                            <h4 data-v-70e7eb2f="" class="text-base md:text-sm flex flex-1"> Pet Shop </h4>
                          </div>
                          <i data-v-70e7eb2f="" class="eptticon-right"></i>
                        </div>
                      </div>
                    </li>
                    <li data-v-70e7eb2f="" data-id="14" class="md:border-b-0 px-4 md:pb-2 border-eGrey-200 relative flex flex-col border-b-1">
                      <div data-v-70e7eb2f="" class="h-16 md:p-2 justify-center bg-white rounded-lg text-eGrey-900 flex flex-col hover:bg-eGrey-100">
                        <div data-v-70e7eb2f="" class="flex flex-row items-center justify-between flex-1">
                          <div data-v-70e7eb2f="" class="flex flex-row items-center">
                            <div data-v-70e7eb2f="" class="mr-2 h-12 w-12 flex items-center justify-center text-3xl rounded-full bg-eCyan-bg text-eCyan-text">
                              <i data-v-70e7eb2f="" class="evoicon-ofis-ve-kirtasiye text-eCyan-text" style="font-size: 30px;"></i>
                            </div>
                            <h4 data-v-70e7eb2f="" class="text-base md:text-sm flex flex-1"> Ofis &amp; Kırtasiye </h4>
                          </div>
                          <i data-v-70e7eb2f="" class="eptticon-right"></i>
                        </div>
                      </div>
                    </li>
                    <li data-v-70e7eb2f="" data-id="15" class="md:border-b-0 px-4 md:pb-2 border-eGrey-200 relative flex flex-col border-b-1">
                      <div data-v-70e7eb2f="" class="h-16 md:p-2 justify-center bg-white rounded-lg text-eGrey-900 flex flex-col hover:bg-eGrey-100">
                        <div data-v-70e7eb2f="" class="flex flex-row items-center justify-between flex-1">
                          <div data-v-70e7eb2f="" class="flex flex-row items-center">
                            <div data-v-70e7eb2f="" class="mr-2 h-12 w-12 flex items-center justify-center text-3xl rounded-full bg-eDarkBlue-bg text-eDarkBlue-text">
                              <i data-v-70e7eb2f="" class="evoicon-kitap text-eDarkBlue-text" style="font-size: 30px;"></i>
                            </div>
                            <h4 data-v-70e7eb2f="" class="text-base md:text-sm flex flex-1"> Kitap </h4>
                          </div>
                          <i data-v-70e7eb2f="" class="eptticon-right"></i>
                        </div>
                      </div>
                    </li>
                    <li data-v-70e7eb2f="" data-id="16" class="md:border-b-0 px-4 md:pb-2 border-eGrey-200 relative flex flex-col border-b-1">
                      <div data-v-70e7eb2f="" class="h-16 md:p-2 justify-center bg-white rounded-lg text-eGrey-900 flex flex-col hover:bg-eGrey-100">
                        <div data-v-70e7eb2f="" class="flex flex-row items-center justify-between flex-1">
                          <div data-v-70e7eb2f="" class="flex flex-row items-center">
                            <div data-v-70e7eb2f="" class="mr-2 h-12 w-12 flex items-center justify-center text-3xl rounded-full bg-eOrange-bg text-eOrange-text">
                              <i data-v-70e7eb2f="" class="evoicon-film-muzik-ve-oyun text-eOrange-text" style="font-size: 28px;"></i>
                            </div>
                            <h4 data-v-70e7eb2f="" class="text-base md:text-sm flex flex-1"> Film &amp; Müzik &amp; Oyun </h4>
                          </div>
                          <i data-v-70e7eb2f="" class="eptticon-right"></i>
                        </div>
                      </div>
                    </li>
                    <li data-v-70e7eb2f="" data-id="6645" class="md:border-b-0 px-4 md:pb-2 border-eGrey-200 relative flex flex-col">
                      <div data-v-70e7eb2f="" class="h-16 md:p-2 justify-center bg-white rounded-lg text-eGrey-900 flex flex-col hover:bg-eGrey-100">
                        <div data-v-70e7eb2f="" class="flex flex-row items-center justify-between flex-1">
                          <div data-v-70e7eb2f="" class="flex flex-row items-center">
                            <div data-v-70e7eb2f="" class="mr-2 h-12 w-12 flex items-center justify-center text-3xl rounded-full bg-ePurple-bg text-ePurple-text">
                              <i data-v-70e7eb2f="" class="evoicon-satis-sonrasi-hizmetler-kategorisi text-ePurple-text"></i>
                            </div>
                            <h4 data-v-70e7eb2f="" class="text-base md:text-sm flex flex-1"> Satış Sonrası Hizmetler Kategorisi </h4>
                          </div>
                          <i data-v-70e7eb2f="" class="eptticon-right"></i>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
                <!---->
              </div>
            </div>
          </div>
          <div classname="ins-preview-wrapper ins-preview-wrapper-7077" class="ins-preview-wrapper ins-preview-wrapper-7077" style="display: block; visibility: visible;">
            <div classname="ins-content-wrapper ins-content-wrapper-7077" class="ins-content-wrapper ins-content-wrapper-7077">
              <div classname="ins-notification-content ins-notification-content-7077" class="ins-notification-content ins-notification-content-7077 inline-resolution" style="background-image: url(&quot;https://image.useinsider.com/epttavm/defaultImageLibrary/1400_80-1705673979.png&quot;) !important; background-color: rgb(255, 255, 255) !important; background-size: contain !important; border-width: 0px !important; border-style: none !important; border-color: rgb(56, 63, 71) !important; border-radius: 0px !important; opacity: 1 !important; box-shadow: none !important; position: relative; display: inline-block;">
                <div id="ins-top-bar-container" class="ins-top-bar-content-wrapper ins-countdown-default" data-upload-image-for-content="true" data-recommended-image-size="1080x74" data-separator-value=":">
                  <div id="top-bar-container" class="ins-top-bar-content-wrapper let-it-open-in-notification ins-moveable-container ins-add-element-area ins-overflow-hidden" data-product-name="SHOPPING_TRIGGER" data-default-text="Buy now and get a 30% discount">
                    <div id="wrap-countdown-text-1531840524000" class="ins-moveable-target ins-cursor-default-2 wrap-countdown-text ins-removable-target" data-moveable-element-type="group"></div>
                    <div id="wrap-close-button-1454703513202" class="ins-cursor-default-2 ins-selectable-element ins-element-wrap ins-element-close-button ins-display-block" style="float: right; right: 0px;">
                      <div id="close-button-1454703513202" class="ins-element-content" not-sortable="true" data-background-color-changed="true" style="color: rgb(255, 255, 255) !important;">
                        <span class="ins-close-button">×</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div data-v-10d289da="" data-v-5ffd7b16="" class="header-block z-10 md:px-4 xl:px-0">
            <!---->
            <div data-v-10d289da="" class="container">
              <div data-v-10d289da="" class="flex flex-col py-4">
                <div data-v-10d289da="" class="hidden md:flex justify-end flex-row items-center text-xsx lg:text-xs font-semibold">
                  <div data-v-10d289da="">
                    <a data-v-10d289da="" href="/my/siparis-takip" class="flex flex-row items-center justify-center px-2 mr-2 text-eGrey-700 hover:text-eGrey-900 transition-all duration-100" target="">
                      <!----> Sipariş Takip
                    </a>
                  </div>
                  <div data-v-10d289da="">
                    <a data-v-10d289da="" href="/kampanyalar" class="flex flex-row items-center justify-center px-2 mr-2 text-eGrey-700 hover:text-eGrey-900 transition-all duration-100" target="">
                      <!----> Kampanyalar
                    </a>
                  </div>
                  <div data-v-10d289da="">
                    <a data-v-10d289da="" href="/firsat/super-firsat" class="flex flex-row items-center justify-center px-2 mr-2 text-eGrey-700 hover:text-eGrey-900 transition-all duration-100" target="">
                      <!----> Günün Fırsatları
                    </a>
                  </div>
                  <div data-v-10d289da="">
                    <a data-v-10d289da="" href="/magaza-basvuru" class="flex flex-row items-center justify-center px-2 mr-2 text-eGrey-700 hover:text-eGrey-900 transition-all duration-100" target="">
                      <!----> Mağaza Aç
                    </a>
                  </div>
                  <div data-v-10d289da="">
                    <a data-v-10d289da="" href="/tarim-kredi" class="flex flex-row items-center justify-center px-2 mr-2 text-eGrey-700 hover:text-eGrey-900 transition-all duration-100" target="">
                      <div data-v-10d289da="" class="w-8 flex items-center justify-center">
                        <img data-v-10d289da="" src="https://www.pttavm.com//assets/images/tarim-kredi-kooperatifi-logo.svg" alt="Tarım Kredi" class="text-3xl mr-2">
                      </div> Tarım Kredi
                    </a>
                  </div>
                  <div data-v-10d289da="">
                    <a data-v-10d289da="" href="/static/toprak-mahsulleri-ofisi" class="flex flex-row items-center justify-center px-2 mr-2 text-eGrey-700 hover:text-eGrey-900 transition-all duration-100" target="">
                      <div data-v-10d289da="" class="w-8 flex items-center justify-center">
                        <img data-v-10d289da="" src="https://www.pttavm.com//assets/images/tmo-toprak-mahsulleri-ofisi-logo.svg" alt="Toprak Mahsülleri Ofisi" class="text-3xl mr-2">
                      </div> Toprak Mahsülleri Ofisi
                    </a>
                  </div>
                  <div data-v-10d289da="">
                    <a data-v-10d289da="" href="/static/meb-pasaj" class="flex flex-row items-center justify-center px-2 mr-2 text-eGrey-700 hover:text-eGrey-900 transition-all duration-100" target="">
                      <div data-v-10d289da="" class="w-8 flex items-center justify-center">
                        <img data-v-10d289da="" src="https://cdn-fe.pttavm.com/_nuxt/img/meb-pasaj-logo.bc3ce61.svg" alt="MEB Pasaj" class="text-3xl mr-2">
                      </div> MEB Pasaj
                    </a>
                  </div>
                  <div data-v-10d289da="" class="border-l-1 pl-3">
                    <a data-v-10d289da="" href="https://hgs.pttavm.com/sorgula" target="_blank" title="HGS Yükle" class="flex justify-center pt-1 pb-2 px-2 bg-eGold-850 rounded shadow transition-all duration-100 inline-block hgs-button">
                      <div data-v-10d289da="" class="flex items-center">
                        <img data-v-10d289da="" src="https://cdn-fe.pttavm.com/_nuxt/img/hgs-yukle-2.4f04b43.svg" alt="HGS Yükle">
                      </div>
                    </a>
                  </div>
                  <div data-v-10d289da="">
                    <a data-v-10d289da="" href="https://hgs.pttavm.com/arac-km-sorgula" target="_blank" class="px-3 text-eGrey-700 hover:text-eGrey-900 transition-all duration-100"> Araç Km Sorgula </a>
                  </div>
                  <div data-v-10d289da="">
                    <a data-v-10d289da="" href="https://hgs.pttavm.com/hasar-sorgula" target="_blank" class="px-3 text-eGrey-700 hover:text-eGrey-900 transition-all duration-100"> Hasar Sorgula </a>
                  </div>
                </div>
                <div data-v-10d289da="" class="flex relative flex-col items-center md:flex-row md:mt-6">
                  <div data-v-10d289da="" class="responsive-logo-container">
                    <a data-v-10d289da="" href="/" class="router-link-active" aria-label="Logo">
                      <img data-v-10d289da="" src="https://cdn-fe.pttavm.com/_nuxt/img/pttavm-logo.72e4a21.svg" alt="PttAvm Logo" class="h-8 md:h-10 responsive-logo">
                    </a>
                  </div>
                  <div data-v-10d289da="" class="flex mt-4 md:mt-0 w-full md:w-auto flex-row flex-1 items-center">
                    <div data-v-10d289da="" class="leading-none absolute left-4 top-1 h-10 md:h-auto md:ml-8 md:relative md:left-auto md:top-auto">
                      <button data-v-10d289da="" aria-label="Kategoriler" class="category-button py-0 md:py-2 px-0 md:px-4 md:bg-eGrey-100 md:rounded-full text-eGrey-900 flex flex-row items-center outline-none focus:outline-none">
                        <i data-v-10d289da="" class="eptticon-menu text-3xl md:text-2xl"></i>
                        <span data-v-10d289da="" class="hidden md:block ml-3 text-xs font-medium"> Kategoriler </span>
                      </button>
                    </div>
                    <div data-v-10d289da="" class="w-full flex flex-row justify-between">
                      <div data-v-10d289da="" class="w-full md:w-8/12 mx-4 md:mx-4">
                        <div data-v-5eea0b1e="" data-v-10d289da="" class="search-input">
                          <div data-v-5eea0b1e="" class="search-input-box transition-transform duration-100 relative">
                            <div data-v-5eea0b1e="" class="search-input-box-container w-full">
                              <form data-v-5eea0b1e="" class="search-main">
                                <input data-v-5eea0b1e="" type="text" name="" placeholder="Arama yap" class="search-main-input border-2 border-eGrey-600 focus:border-eBlue-500">
                                <div data-v-5eea0b1e="" class="search-main-buttons">
                                  <!---->
                                  <button data-v-5eea0b1e="" type="submit" name="button" aria-label="Ara" class="search-main-buttons-item search-main-buttons-item-search bg-eGrey-600">
                                    <i data-v-5eea0b1e="" class="eptticon-search text-white text-2xl"></i>
                                  </button>
                                </div>
                              </form>
                              <!---->
                            </div>
                          </div>
                        </div>
                      </div>
                      <div data-v-10d289da="" class="absolute top-0 md:top-1 right-4 md:relative md:top-auto md:right-auto flex flex-row items-center">
                        <span data-v-10d289da="" class="hidden md:flex user-login bg-eGrey-100 hover:bg-ePurple-500 hover:text-eBlue-900 select-none cursor-pointer text-eBlue-900 font-bold px-2 h-10 items-center justify-center rounded-full md:mr-0 md:ml-0 text-xs transition-all duration-250 hover:bg-eBlue-900 hover:text-white text-center"> Giriş Yap </span>
                        <!---->
                        <div data-v-10d289da="" class="relative">
                          <a data-v-10d289da="" href="/my/tr/sepet" class="bg-eGrey-100 cursor-pointer md:hover:bg-ePurple-500 md:hover:text-eBlue-900 user-login p-0 md:p-auto w-10 h-10 flex items-center justify-center rounded-full md:ml-6 text-2xl cursor-pointer has-tooltip" data-original-title="">
                            <i data-v-10d289da="" class="eptticon-hover"></i>
                            <!---->
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div data-v-5ffd7b16="" class="relative">
            <div data-v-5ffd7b16="" class="pt-4">
              <div data-v-851c32d4="" data-v-5ffd7b16="" class="flex flex-col pt-2 pb-6 md:px-4 xl:px-0">
                <div data-v-851c32d4="" class="container">
                  <script data-v-851c32d4="" type="application/ld+json">
                    {
                      "@context": "https://schema.org/",
                      "@type": "Product",
                      "productID": "230662642",
                      "description": "<?php echo $urun["urunismi"]; ?>",
                      "url": "https://www.pttavm.com/apple-iphone-13-128-gb-gece-yarisi-cep-telefonu-apple-turkiye-garantili-p-230662642",
                      "name": "<?php echo $urun["urunismi"]; ?>",
                      "image": "https://img.epttavm.com/pimages/592/230/662/62f50a3769b57.jpg?v=201910111530",
                      "category": "Cep Telefonları",
                      "offers": {
                        "@type": "Offer",
                        "availability": "https://schema.org/InStock",
                        "price": "37679.21",
                        "priceCurrency": "TRY"
                      },
                      "aggregateRating": {
                        "@type": "AggregateRating",
                        "ratingValue": "5",
                        "reviewCount": "2"
                      },
                      "review": [{
                        "@type": "Review",
                        "author": {
                          "@type": "Person",
                          "name": "C***** E*********"
                        },
                        "datePublished": "2023-01-12 11:41",
                        "reviewBody": "Hızlı gönderi sağlam paketleme için teşekkür ederim.mağaza güvenilir alışveriş yapmanızı tavsiye ederim.soruma biraz geç cvp vermiş olsalarda herşey yolunda gitti.",
                        "reviewRating": {
                          "@type": "Rating",
                          "bestRating": "5",
                          "ratingValue": 5,
                          "worstRating": "1"
                        }
                      }, {
                        "@type": "Review",
                        "author": {
                          "@type": "Person",
                          "name": "S******** K*****"
                        },
                        "datePublished": "2022-11-28 11:18",
                        "reviewBody": "Ürün 5 gün içinde teslim edildi. Hiç bir sıkıntı yaşamadım. PTTAVM ve Aksaray İletişim çalışanlarına çok teşekkür ederim.",
                        "reviewRating": {
                          "@type": "Rating",
                          "bestRating": "5",
                          "ratingValue": 5,
                          "worstRating": "1"
                        }
                      }]
                    }
                  </script>
                  <div data-v-7bda18c7="" data-v-851c32d4="" class="category-tree overflow-hidden mx-4 lg:mx-0">
                    <a data-v-215483ec="" data-v-7bda18c7="" href="/" class="category-tree-item whitespace-no-wrap router-link-active" target="">
                      <span data-v-7bda18c7="" class="category-tree-item-name">Ana Sayfa</span>
                      <?php if(!empty($_GET['id'])){ ?>
                      <i data-v-7bda18c7="" class="eptticon-right"></i>
                    </a>
                    <a data-v-215483ec="" data-v-7bda18c7="" href="/arama/elektronik" class="category-tree-item whitespace-no-wrap" target="">
                      <span data-v-7bda18c7="" class="category-tree-item-name truncate w-full">Elektronik</span>
                      <i data-v-7bda18c7="" class="eptticon-right"></i>
                    </a>
                    <a data-v-215483ec="" data-v-7bda18c7="" href="/arama/telefon-ve-aksesuar" class="category-tree-item whitespace-no-wrap" target="">
                      <span data-v-7bda18c7="" class="category-tree-item-name truncate w-full">Telefonlar &amp; Aksesuarları</span>
                      <i data-v-7bda18c7="" class="eptticon-right"></i>
                    </a>
                    <a data-v-215483ec="" data-v-7bda18c7="" href="/arama/cep-telefonu" class="category-tree-item whitespace-no-wrap" target="">
                      <span data-v-7bda18c7="" class="category-tree-item-name truncate w-full">Cep Telefonları</span>
                      <i data-v-7bda18c7="" class="eptticon-right"></i>
                    </a>
                    <a data-v-215483ec="" data-v-7bda18c7="" href="/apple-iphone-13-128-gb-gece-yarisi-cep-telefonu-apple-turkiye-garantili-p-230662642" aria-current="page" class="category-tree-item router-link-exact-active router-link-active truncate" target="">
                      <span data-v-7bda18c7="" class="category-tree-item-name truncate w-full"><?php echo $urun["urunismi"]; ?></span>
                      <!---->
                    </a><?php } ?>
                  </div>
                  <div data-v-b043c43a="" data-v-851c32d4="" class="line-break hidden md:block my-6"></div>
                  <div data-v-851c32d4="" class="flex flex-col">
                    <span data-v-851c32d4="">
                      <div data-v-851c32d4="" class="flex flex-col md:flex-row">
                        <div data-v-851c32d4="" class="image-box" style="<?php if(empty($id)){echo 'display:none;';} ?>">
                          <div data-v-851c32d4="" class="w-full h-90 md:h-125">
                            <div data-v-851c32d4="" class="image-slider flex-row">
                              <div class="image-slider-box">
                                <div class="image-slider-box-items transition-all duration-150 w-full flex-col">
                                  <div class="leading-none cursor-pointer slider-pagination flex z-10 justify-center items-center text-2xl text-eGrey-500">
                                    <i class="eptticon-up"></i>
                                  </div>
                                  <div class="flex flex-1 flex-col overflow-hidden relative w-full slider-thumbnails">
                                    <div class="absolute top-0 left-0 w-full transition-all duration-100" style="top: 0px;">
                                      <div class="pb-2" onclick="toggleHiddenClass('resim1')">
                                        <div class="image-slider-box-items-item transition-border duration-150 border-eBlue-500 small-image-box">
                                          <img alt="<?php echo $urun["urunismi"]; ?> - 1" class="w-12 h-12 object-contain" src="<?php echo $urun["resim1"];?>">
                                        </div>
                                      </div>
                                      <div class="pb-2" onclick="toggleHiddenClass('resim2')">
                                        <div class="image-slider-box-items-item transition-border duration-150 border-eGrey-300">
                                          <img alt="<?php echo $urun["urunismi"]; ?> - 2" class="w-12 h-12 object-contain" src="<?php echo $urun["resim2"];?>">
                                        </div>
                                      </div>
                                      <div class="pb-2" onclick="toggleHiddenClass('resim3')">
                                        <div class="image-slider-box-items-item transition-border duration-150 border-eGrey-300">
                                          <img alt="<?php echo $urun["urunismi"]; ?> - 3" class="w-12 h-12 object-contain" src="<?php echo $urun["resim3"];?>">
                                        </div>
                                      </div>
                                      <div class="pb-2" onclick="toggleHiddenClass('resim4')">
                                        <div class="image-slider-box-items-item transition-border duration-150 border-eGrey-300">
                                          <img alt="<?php echo $urun["urunismi"]; ?> - 4" class="w-12 h-12 object-contain" src="<?php echo $urun["resim4"];?>">
                                        </div>
                                      </div>
                                      <div class="pb-2" onclick="toggleHiddenClass('resim5')">
                                        <div class="image-slider-box-items-item transition-border duration-150 border-eGrey-300">
                                          <img alt="<?php echo $urun["urunismi"]; ?> - 5" class="w-12 h-12 object-contain" src="<?php echo $urun["resim5"];?>">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="leading-none cursor-pointer slider-pagination z-10 flex justify-center items-center text-2xl text-eGrey-900">
                                    <i class="eptticon-down"></i>
                                  </div>
                                </div>
                              </div>
<style>
    /* İsteğe bağlı olarak galeri stilini özelleştirebilirsiniz */
    #image-slider {
      overflow: hidden;
      width: 80%; /* Galeri genişliği */
      margin: 0 auto; /* Sayfa ortalamak için */
      white-space: nowrap;
      position: relative;
    }

    .image-slider-images-item {
      display: inline-block;
      width: 100%;
      box-sizing: border-box;
      transition: transform 0.5s ease;
    }

    .image-slider-images-item img {
      width: 100%;
      height: auto;
    }

    .prev,
    .next {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      font-size: 24px;
      cursor: pointer;
      background-color: rgba(255, 255, 255, 0.5);
      border: none;
      padding: 10px;
    }

    .prev {
      left: 10px;
    }

    .next {
      right: 10px;
    }
</style>
                              <div class="image-slider-images">
                                <div style="touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                  <div class="image-slider-images-item" id="resim1">
                                    <figure data-v-e6d72b16="" class="iiz image-slider-images-item">
                                      <div data-v-e6d72b16="">
                                        <picture data-v-e6d72b16="">
                                          <img data-v-e6d72b16="" src="<?php echo $urun["resim1"];?>" alt="<?php echo $urun["urunismi"]; ?> - 1" class="iiz__img" style="transition: opacity 0ms linear 0ms, visibility 0ms linear 0ms;">
                                        </picture>
                                      </div>
                                      <!---->
                                      <span data-v-e6d72b16="" class="iiz__btn iiz__hint"></span>
                                    </figure>
                                  </div>
                                  <div class="image-slider-images-item" id="resim2">
                                    <figure data-v-e6d72b16="" class="iiz image-slider-images-item">
                                      <div data-v-e6d72b16="">
                                        <picture data-v-e6d72b16="">
                                          <img data-v-e6d72b16="" src="<?php echo $urun["resim2"];?>" alt="<?php echo $urun["urunismi"]; ?> - 2" class="iiz__img" style="transition: opacity 0ms linear 0ms, visibility 0ms linear 0ms;">
                                        </picture>
                                      </div>
                                      <!---->
                                      <span data-v-e6d72b16="" class="iiz__btn iiz__hint"></span>
                                    </figure>
                                  </div>
                                  <div class="image-slider-images-item" id="resim3">
                                    <figure data-v-e6d72b16="" class="iiz image-slider-images-item">
                                      <div data-v-e6d72b16="">
                                        <picture data-v-e6d72b16="">
                                          <img data-v-e6d72b16="" src="<?php echo $urun["resim3"];?>" alt="<?php echo $urun["urunismi"]; ?> - 3" class="iiz__img" style="transition: opacity 0ms linear 0ms, visibility 0ms linear 0ms;">
                                        </picture>
                                      </div>
                                      <!---->
                                      <span data-v-e6d72b16="" class="iiz__btn iiz__hint"></span>
                                    </figure>
                                  </div>
                                  <div class="image-slider-images-item" id="resim4">
                                    <figure data-v-e6d72b16="" class="iiz image-slider-images-item">
                                      <div data-v-e6d72b16="">
                                        <picture data-v-e6d72b16="">
                                          <img data-v-e6d72b16="" src="<?php echo $urun["resim4"];?>" alt="<?php echo $urun["urunismi"]; ?> - 4" class="iiz__img" style="transition: opacity 0ms linear 0ms, visibility 0ms linear 0ms;">
                                        </picture>
                                      </div>
                                      <!---->
                                      <span data-v-e6d72b16="" class="iiz__btn iiz__hint"></span>
                                    </figure>
                                  </div>
                                  <div class="image-slider-images-item" id="resim5">
                                    <figure data-v-e6d72b16="" class="iiz image-slider-images-item">
                                      <div data-v-e6d72b16="">
                                        <picture data-v-e6d72b16="">
                                          <img data-v-e6d72b16="" src="<?php echo $urun["resim5"];?>" alt="<?php echo $urun["urunismi"]; ?> - 5" class="iiz__img" style="transition: opacity 0ms linear 0ms, visibility 0ms linear 0ms;">
                                        </picture>
                                      </div>
                                      <!---->
                                      <span data-v-e6d72b16="" class="iiz__btn iiz__hint"></span>
                                    </figure>
                                  </div>
                                </div>
                                <!---->
                              </div>



<style>
    #image-slider2 {
      display: none;
      overflow: hidden;
      width: 80%; /* Galeri genişliği */
      margin: 0 auto; /* Sayfa ortalamak için */
      white-space: nowrap;
      position: relative;
    }

    .image-slider-images-item2 {
      display: inline-block;
      width: 100%;
      box-sizing: border-box;
      transition: transform 0.5s ease;
    }

    .image-slider-images-item2 img {
      width: 100%;
      height: auto;
    }

    .prev,
    .next {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      font-size: 24px;
      cursor: pointer;
      background-color: rgba(255, 255, 255, 0.5);
      border: none;
      padding: 10px;
    }

    .prev {
      left: -5px;
    }

    .next {
      right: -5px;
    }

@media only screen and (max-width:960px) {
  #image-slider2 {
    display: block;
  }
  
  #image-slider {
    display: none;
  }

  .image-slider {
    display: none;
  }
}

  </style>


<div id="image-slider2">
  <!-- Galeri içeriği buraya eklenecek -->
  <div class="image-slider-images-item2" id="resim1">
    <img src="<?php echo $urun["resim1"];?>" alt="Resim 1">
  </div>
  <div class="image-slider-images-item2 hidden" id="resim2">
    <img src="<?php echo $urun["resim2"];?>" alt="Resim 2">
  </div>
  <div class="image-slider-images-item2 hidden" id="resim3">
    <img src="<?php echo $urun["resim3"];?>" alt="Resim 3">
  </div>
  <div class="image-slider-images-item2 hidden" id="resim4">
    <img src="<?php echo $urun["resim4"];?>" alt="Resim 4">
  </div>
  <div class="image-slider-images-item2 hidden" id="resim5">
    <img src="<?php echo $urun["resim5"];?>" alt="Resim 5">
  </div>
  <button class="prev">&lt;</button>
  <button class="next">&gt;</button>
</div>
<script>
  window.addEventListener('DOMContentLoaded', function() {
    var isMobile = window.innerWidth < 960;
    
    if (isMobile) {
      var imageSliderImages = document.querySelector('.image-slider-images');
      
      if (imageSliderImages) {
        imageSliderImages.style.display = 'none';
      }
    }
  });
</script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
  $(document).ready(function() {
    var imageSlider = $('#image-slider2');
    var items = $('.image-slider-images-item2');
    var itemCount = items.length;
    var itemWidth = items.width();
    var currentIndex = 0;

    function showItem(index) {
      currentIndex = index;
      var newLeft = -index * itemWidth;
      imageSlider.find('.image-slider-images-item2').css('transform', 'translateX(' + newLeft + 'px)');
    }

    function showNext() {
      if (currentIndex < itemCount - 1) {
        showItem(currentIndex + 1);
      }
    }

    function showPrev() {
      if (currentIndex > 0) {
        showItem(currentIndex - 1);
      }
    }

    $('.next').on('click', showNext);
    $('.prev').on('click', showPrev);
  });
</script>
                              <div class="image-slider-pages">
                                <span class="image-slider-pages-item transition-all duration-150 w-4 bg-white" onclick="toggleHiddenClass('resim1')"></span>
                                <span class="image-slider-pages-item transition-all duration-150  bg-white" onclick="toggleHiddenClass('resim2')"></span>
                                <span class="image-slider-pages-item transition-all duration-150  bg-white" onclick="toggleHiddenClass('resim3')"></span>
                                <span class="image-slider-pages-item transition-all duration-150  bg-white" onclick="toggleHiddenClass('resim4')"></span>
                                <span class="image-slider-pages-item transition-all duration-150  bg-white" onclick="toggleHiddenClass('resim5')"></span>
                              </div>
                            </div>
                          </div>
                          <div data-v-851c32d4="" class="flex flex-row justify-center md:mt-4 mt-6 mb-2 md:mb-0">
                            <div data-v-851c32d4="" class="flex pr-2 mr-4 border-r border-eGrey-100 ">
                              <button data-v-55a91d9d="" data-v-851c32d4="" type="button" aria-label="Ara" class="text-sm px-0 py-0 mr-2 suggest-friend outline-none focus:outline-none font-medium mt-0 transition-all duration-250 bg-transparent md:hover:bg-transparent-dark text-eGrey-900 rounded-full leading-none user-login">
                                <div data-v-55a91d9d="" class="w-full relative">
                                  <div data-v-55a91d9d="" class="absolute w-full flex justify-center h-7" style="display: none;">
                                    <img data-v-55a91d9d="" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiBzdHlsZT0ibWFyZ2luOiBhdXRvOyBiYWNrZ3JvdW5kOiBub25lOyBkaXNwbGF5OiBibG9jazsgc2hhcGUtcmVuZGVyaW5nOiBhdXRvOyIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCIgdmlld0JveD0iMCAwIDEwMCAxMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89InhNaWRZTWlkIj4KICA8Y2lyY2xlIGN4PSI1MCIgY3k9IjUwIiBmaWxsPSJub25lIiBzdHJva2U9IiMwMEE2Q0UiIHN0cm9rZS13aWR0aD0iMTIiIHI9IjMwIiBzdHJva2UtZGFzaGFycmF5PSIxNDEuMzcxNjY5NDExNTQwNjcgNDkuMTIzODg5ODAzODQ2ODkiPgogICAgPGFuaW1hdGVUcmFuc2Zvcm0gYXR0cmlidXRlTmFtZT0idHJhbnNmb3JtIiB0eXBlPSJyb3RhdGUiIHJlcGVhdENvdW50PSJpbmRlZmluaXRlIiBkdXI9IjFzIiB2YWx1ZXM9IjAgNTAgNTA7MzYwIDUwIDUwIiBrZXlUaW1lcz0iMDsxIj48L2FuaW1hdGVUcmFuc2Zvcm0+CiAgPC9jaXJjbGU+Cjwvc3ZnPgo=" alt="loading_blue">
                                  </div>
                                </div>
                                <div data-v-55a91d9d="" class="h-7 flex justify-center items-center leading-none">
                                  <div data-v-851c32d4="" data-v-55a91d9d="" class="flex flex-row items-center"><i data-v-851c32d4="" data-v-55a91d9d="" class="eptticon-paper-flight text-xl mr-2 hidden sm:block"></i><span data-v-851c32d4="" data-v-55a91d9d="" class="font-normal">Ürünü Arkadaşına Öner</span>
                                  </div>
                                </div>
                              </button>
                            </div>
                            <div data-v-851c32d4="" class="flex items-start">
                              <div data-v-851c32d4="" class="mr-2 share-network-facebook">
                                <button data-v-55a91d9d="" data-v-851c32d4="" type="button" aria-label="Facebook" class="w-8 h-8 outline-none focus:outline-none font-medium mt-0 transition-all duration-250 bg-eBlue-40 md:hover:bg-eBlue-40-dark text-white rounded-full leading-none">
                                  <div data-v-55a91d9d="" class="w-full relative"><div data-v-55a91d9d="" class="absolute w-full flex justify-center h-7" style="display: none;"><img data-v-55a91d9d="" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiBzdHlsZT0ibWFyZ2luOiBhdXRvOyBiYWNrZ3JvdW5kOiBub25lOyBkaXNwbGF5OiBibG9jazsgc2hhcGUtcmVuZGVyaW5nOiBhdXRvOyIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCIgdmlld0JveD0iMCAwIDEwMCAxMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89InhNaWRZTWlkIj4KICA8Y2lyY2xlIGN4PSI1MCIgY3k9IjUwIiBmaWxsPSJub25lIiBzdHJva2U9IiMwMEE2Q0UiIHN0cm9rZS13aWR0aD0iMTIiIHI9IjMwIiBzdHJva2UtZGFzaGFycmF5PSIxNDEuMzcxNjY5NDExNTQwNjcgNDkuMTIzODg5ODAzODQ2ODkiPgogICAgPGFuaW1hdGVUcmFuc2Zvcm0gYXR0cmlidXRlTmFtZT0idHJhbnNmb3JtIiB0eXBlPSJyb3RhdGUiIHJlcGVhdENvdW50PSJpbmRlZmluaXRlIiBkdXI9IjFzIiB2YWx1ZXM9IjAgNTAgNTA7MzYwIDUwIDUwIiBrZXlUaW1lcz0iMDsxIj48L2FuaW1hdGVUcmFuc2Zvcm0+CiAgPC9jaXJjbGU+Cjwvc3ZnPgo=" alt="loading_blue"></div></div><div data-v-55a91d9d="" class="h-7 flex justify-center items-center leading-none"><i data-v-851c32d4="" data-v-55a91d9d="" class="eptticon-facebook text-2xl flex"><span data-v-851c32d4="" data-v-55a91d9d="" class="path1"></span><span data-v-851c32d4="" data-v-55a91d9d="" class="path2"></span></i></div>
                                </button>
                              </div>
                              <div data-v-851c32d4="" class="share-network-twitter">
                                <button data-v-55a91d9d="" data-v-851c32d4="" type="button" aria-label="Twitter" class="w-8 h-8 outline-none focus:outline-none font-medium mt-0 transition-all duration-250 bg-eGrey-900 md:hover:bg-eGrey-900-dark text-white rounded-full leading-none"><div data-v-55a91d9d="" class="w-full relative"><div data-v-55a91d9d="" class="absolute w-full flex justify-center h-7" style="display: none;"><img data-v-55a91d9d="" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiBzdHlsZT0ibWFyZ2luOiBhdXRvOyBiYWNrZ3JvdW5kOiBub25lOyBkaXNwbGF5OiBibG9jazsgc2hhcGUtcmVuZGVyaW5nOiBhdXRvOyIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCIgdmlld0JveD0iMCAwIDEwMCAxMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89InhNaWRZTWlkIj4KICA8Y2lyY2xlIGN4PSI1MCIgY3k9IjUwIiBmaWxsPSJub25lIiBzdHJva2U9IiMwMEE2Q0UiIHN0cm9rZS13aWR0aD0iMTIiIHI9IjMwIiBzdHJva2UtZGFzaGFycmF5PSIxNDEuMzcxNjY5NDExNTQwNjcgNDkuMTIzODg5ODAzODQ2ODkiPgogICAgPGFuaW1hdGVUcmFuc2Zvcm0gYXR0cmlidXRlTmFtZT0idHJhbnNmb3JtIiB0eXBlPSJyb3RhdGUiIHJlcGVhdENvdW50PSJpbmRlZmluaXRlIiBkdXI9IjFzIiB2YWx1ZXM9IjAgNTAgNTA7MzYwIDUwIDUwIiBrZXlUaW1lcz0iMDsxIj48L2FuaW1hdGVUcmFuc2Zvcm0+CiAgPC9jaXJjbGU+Cjwvc3ZnPgo=" alt="loading_blue"></div></div><div data-v-55a91d9d="" class="h-7 flex justify-center items-center leading-none"><i data-v-851c32d4="" data-v-55a91d9d="" class="eptticon-helper-x text-lg flex"><span data-v-851c32d4="" data-v-55a91d9d="" class="path1"></span><span data-v-851c32d4="" data-v-55a91d9d="" class="path2"></span></i></div></button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div data-v-851c32d4="" class="px-4 md:pr-0 md:pl-5 mt-4 md:mt-0 flex flex-col flex-1">
                          <div data-v-851c32d4="" class="flex flex-col xl:flex-row justify-between flex-1">
                            <div data-v-851c32d4="" class="md:pr-6 flex flex-col flex-1 xl:w-auto md:mb-3 lg:mb-0">
                              <h1 data-v-851c32d4="" class="text-lg font-medium break-word"> <?php echo $urun["urunismi"]; ?> </h1>
                              <h2 data-v-851c32d4="" class="text-sm mt-1 break-word"> <?php echo $urun["urunismi"]; ?> </h2>
                              <div data-v-851c32d4="" class="stars py-3 md:py-6 flex flex-row items-center"><div data-v-295cc332="" data-v-851c32d4="" class="flex flex-row "><i data-v-295cc332="" class="eptticon-star text-eGold"></i><i data-v-295cc332="" class="eptticon-star text-eGold"></i><i data-v-295cc332="" class="eptticon-star text-eGold"></i><i data-v-295cc332="" class="eptticon-star text-eGold"></i><i data-v-295cc332="" class="eptticon-star text-eGold"></i></div><span data-v-851c32d4="" class="cursor-pointer pl-2 underline text-sm leading-none"><span data-v-851c32d4="" data-scrollable-menu="" data-id="comments" class=""> 2 yorum </span></span>
                              </div>
                              <!---->
                              <!---->
                              <div data-v-851c32d4="" class="flex leading-none flex-col mt-2 md:mt-6 mb-2 md:mb-0"><div data-v-851c32d4="" class="text-eGreen-700 font-semibold text-3xl">                       <?php echo number_format($urun["fiyat"], 2, ',', '.');?> TL </div>
                                <!----><div data-v-851c32d4="" class="w-64 flex-shrink-0"><span class="text-eGreen-850 font-semibold items-center justify-center bg-eGreen-250 rounded-lg px-2 py-1 mt-2 inline-block whitespace-normal" style="font-size: 13px;"> İndirimli Ürün 
                                    <!---->
                                  </span></div>
                                <!---->
                              </div>
                            </div>
                          </div>
                          <div data-v-851c32d4="" class="items-center border-eGrey-200 md:border-t-0 w-full md:w-auto md:relative flex flex-col md:flex-row md:p-0 md:pt-6 fixed bottom-0 left-0 bg-white border-t p-4 cart-buttons-container"><div data-v-2348c10d="" data-v-851c32d4="" class="number-input flex hidden md:block mr-2 h-full"></div><a href="odeme.php"><div data-v-851c32d4="" class="flex flex-row w-full md:w-auto"><button data-v-55a91d9d="" data-v-851c32d4="" type="button" aria-label="Ara" class="flex-1 md:flex-initial px-4 py-3 text-base md:px-8 md:py-4 md:text-base xl:text-xl ml-2 md:ml-0 outline-none focus:outline-none font-medium mt-0 transition-all duration-250 bg-eCustomYellow-bg md:hover:bg-eCustomYellow-bg-dark text-eCustomYellow-text rounded-lg leading-none"><div data-v-55a91d9d="" class="w-full relative"><div data-v-55a91d9d="" class="absolute w-full flex justify-center h-7" style="display: none;"><img data-v-55a91d9d="" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiBzdHlsZT0ibWFyZ2luOiBhdXRvOyBiYWNrZ3JvdW5kOiBub25lOyBkaXNwbGF5OiBibG9jazsgc2hhcGUtcmVuZGVyaW5nOiBhdXRvOyIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCIgdmlld0JveD0iMCAwIDEwMCAxMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89InhNaWRZTWlkIj4KICA8Y2lyY2xlIGN4PSI1MCIgY3k9IjUwIiBmaWxsPSJub25lIiBzdHJva2U9IiMwMEE2Q0UiIHN0cm9rZS13aWR0aD0iMTIiIHI9IjMwIiBzdHJva2UtZGFzaGFycmF5PSIxNDEuMzcxNjY5NDExNTQwNjcgNDkuMTIzODg5ODAzODQ2ODkiPgogICAgPGFuaW1hdGVUcmFuc2Zvcm0gYXR0cmlidXRlTmFtZT0idHJhbnNmb3JtIiB0eXBlPSJyb3RhdGUiIHJlcGVhdENvdW50PSJpbmRlZmluaXRlIiBkdXI9IjFzIiB2YWx1ZXM9IjAgNTAgNTA7MzYwIDUwIDUwIiBrZXlUaW1lcz0iMDsxIj48L2FuaW1hdGVUcmFuc2Zvcm0+CiAgPC9jaXJjbGU+Cjwvc3ZnPgo=" alt="loading_blue"></div></div><div data-v-55a91d9d="" class="h-7 flex justify-center items-center leading-none"> Hemen Al </div></button></div></a></div><div data-v-b3c59946="" data-v-851c32d4="" class="flex flex-col md:flex-row pt-6 pb-4"><button data-v-b3c59946="" type="button" name="button" class="user-login flex items-center text-2xl mr-4 md:mr-8 hover:text-eRed-600 focus:outline-none user-login mb-4 md:mb-0"><span data-v-b3c59946="" class="w-6 flex justify-center"><i data-v-b3c59946="" class="evoicon-fav-empty"></i></span><span data-v-b3c59946="" class="text-sm pl-2">Favorilere Ekle</span></button><div data-v-b3c59946="" class="user-login flex items-center text-2xl focus:outline-none relative"><span data-v-b3c59946="" class="flex items-center cursor-pointer hover:text-eBlue-500 "><span data-v-b3c59946="" class="w-6 flex justify-center"><i data-v-b3c59946="" class="evoicon-list-empty"></i></span><span data-v-b3c59946="" class="text-sm pl-2">Ürün Listeme Ekle</span></span>
                              <!---->
                            </div></div><div data-v-851c32d4="" class="flex flex-col pt-4 border-t border-eGrey-100 ">
                            <!---->
                            <!----><div data-v-49eef108="" data-v-851c32d4="" class="product-info py-2"><div data-v-49eef108="" class="mr-4"><i data-v-49eef108="" class="text-2xl eptticon-kargo-bedava"></i></div><div data-v-49eef108="" class="flex flex-col font-medium"><div data-v-49eef108="" class=""> Kargo Bedava </div><div data-v-49eef108="" class="text-eGrey text-xs mt-1"> Bu ürünün kargosundan ücret alınmayacak. </div></div></div>
                            <!----><div data-v-49eef108="" data-v-851c32d4="" class="product-info py-2"><div data-v-49eef108="" class="mr-4"><i data-v-49eef108="" class="text-2xl eptticon-kargomat"></i></div><div data-v-49eef108="" class="flex flex-col font-medium"><div data-v-49eef108="" class=""> Kargomata Teslimat </div><div data-v-49eef108="" class="text-eGrey text-xs mt-1"> Kargo beklemeyin paketlerinizi Kargomattan istediğiniz zaman alın. </div></div></div>
                            <!---->
                          </div>
                          <!---->
                        </div>
                      </div><div classname="ins-preview-wrapper ins-preview-wrapper-6090" class="ins-preview-wrapper ins-preview-wrapper-6090" style="display: block; visibility: visible; position: relative;">
  <div classname="ins-content-wrapper ins-content-wrapper-6090" class="ins-content-wrapper ins-content-wrapper-6090">
    <div classname="ins-notification-content ins-notification-content-6090" class="ins-notification-content ins-notification-content-6090 inline-resolution" style="background-color: rgba(255, 255, 255, 0) !important; background-image: none !important; background-size: 100% 100% !important; border-width: 0px !important; border-style: solid !important; border-color: rgb(222, 222, 222) !important; border-radius: 0px !important; opacity: 1 !important; box-shadow: none !important; position: relative; display: inline-block;">
      <div class="ins-slider-arrow-element ins-slider-next">
        <div class="ins-slider-arrow-wrapper ins-arrow-with-border"></div>
      </div>
      <div id="wrap-arrow-1454703450633" class="ins-slider-arrow-element ins-element-wrap ins-slider-prev">
        <div class="ins-slider-arrow-wrapper ins-element-content ins-arrow-with-border" id="arrow-1454703450633" data-element-name="Arrows" data-override-name="true" not-sortable="true"></div>
      </div>
      <div class="ins-web-smart-recommender-main-wrapper">
        <div>
          <div class="ins-web-smart-recommender-header">
            <div id="wrap-text-1454703450633" class="ins-selectable-element ins-element-wrap ins-element-text">
              <div id="text-1454703450633" class="ins-element-content ins-editable-text" not-sortable="true" data-background-color-changed="true" style="font-size: 20px !important;">
                <a href="javascript:void(0);" class="ins-element-link">
                  <div class="ins-editable ins-element-editable" id="editable-text-1454703450633" data-bind-menu="notification|text_editing"> Sizin İçin Öneriler</div>
                </a>
              </div>
            </div>
          </div>
          <div class="ins-web-smart-recommender-body-wrapper ins-responsive-mode-active" style="width: 1009px;">
            <ul class="ins-web-smart-recommender-body ins-product-price-area-multi-line" data-current="0" style="transform: translateX(0px); width: 100%;" data-recommended-items="[&quot;344597152&quot;,&quot;736734881&quot;,&quot;513133318&quot;,&quot;724013018&quot;,&quot;513134977&quot;,&quot;625638182&quot;,&quot;513131953&quot;,&quot;481603813&quot;,&quot;326155687&quot;,&quot;768375500&quot;,&quot;721070016&quot;,&quot;188770485_2511046&quot;,&quot;587131246&quot;,&quot;773607041&quot;,&quot;729802045&quot;]">
              


<?php 
$urunler2 = $baglanti->prepare("SELECT * FROM bella_ptt3_urunler ORDER BY id DESC LIMIT 5");
$urunler2->execute();
while($urun1 = $urunler2->fetch(PDO::FETCH_ASSOC)){ 
if(!empty($urun1["resim1"])){ $urun1["resim1"] = str_replace("../","",$urun1["resim1"]); }
if(!empty($urun1["resim2"])){ $urun1["resim2"] = str_replace("../","",$urun1["resim2"]); }
if(!empty($urun1["resim3"])){ $urun1["resim3"] = str_replace("../","",$urun1["resim3"]); }
if(!empty($urun1["resim4"])){ $urun1["resim4"] = str_replace("../","",$urun1["resim4"]); }

  ?>
              <li class="ins-web-smart-recommender-box-item" data-group-code="" data-product-categories="[&quot;Satış Sonrası Hizmetler Kategorisi&quot;,&quot;Tamir Paketleri&quot;]" data-product-id="344597152" style="width: 220px;">
                    <div id="wrap-product-1454703450643" class="ins-selectable-element ins-element-wrap ins-element-text">
                        <div id="product-1454703450643" class="ins-element-content ins-editable-text ins-product-content">
                            <div id="editable-product-1454703450643">
                                <div class="ins-web-smart-recommender-inner-box ins-add-to-cart-text-button-active" id="wrap-smart-recommender-inner-box-1454703450643">
                                    <a class="ins-product-box ins-element-link" event-collection="true" style="background-color: #ffffff;" target="_self" href="index.php?id=<?php echo $urun1["urunlink"];?>">
                                        <div class="ins-image-box" style="height: 200px; display: flex; background-image: url(<?php echo $urun1["resim1"];?>);">
                                            <div class="free-shipping" style="border-radius: 15px !important; Position: absolute"> <span>KARGO BEDAVA</span>
                                                
                                            </div>
                                            
                                        </div>
                                    </a>
                                    <div id="wrap-product-attributes-and-add-to-cart-6173750944785" class="ins-dynamic-wrap-area">
                                        <div class="sortable-element"></div>
                                        <div id="wrap-text-1454703450644" class="ins-display-block ins-description-box ins-product-name-container ins-selectable-element ins-element-wrap ins-element-text" style="">
                                            <div id="text-1454703450644" class="ins-element-content">
                                                <a class="ins-product-box ins-element-link ins-product-link" event-collection="true" target="_self" href="index.php?id=<?php echo $urun1["urunlink"];?>">
                                                    <div class="ins-product-name" id="editable-text-1454703450644" contenteditable="false"><?php echo $urun1["urunismi"];?></div>
                                                </a>
                                            </div>
                                        </div>
                                        <div id="wrap-product-attributes-6173750944785" class="wrap-product-attributes-and-add-to-cart ins-add-to-cart-text-button-active ui-sortable ins-product-attributes-container ins-selectable-element ins-element-wrap element-product-attributes">
                                            <div id="product-attributes-6173750944785" class="ins-element-content" data-override-name="true" data-element-name="Prices">
                                                <div class="ins-product-attributes">
                                                    <div class="ins-action-buttons-wrapper">
                                            <div id="wrap-button-1691676901099" ins-product-id="344597152" class="not-sortable ins-add-to-cart-wrapper ins-adaptive-button ins-selectable-element ins-element-wrap ins-element-button ins-display-#{{Add To Cart Button}} ins-selected-option">
                                                <div id="button-1508331698331" class="ins-add-product-to-cart-button ins-add-to-cart-button ins-element-content" not-sortable="true" data-ga-join-text="" data-override-name="true" data-element-name="Add to Cart" data-after-click-text="Sepete Eklendi" data-after-text-color="" data-add-to-cart-text="Sepete Ekle" ondrop="return false;" data-background-color-changed="true" style="display: block !important; height: 45px;" ondragstart="return false;">
                                                    <div id="ins-text-button-1508331698331" class="ins-add-to-cart-text-button">
                                                        <a id="link-button-1508331698331" class="ins-element-link" href="javascript:void(0)" data-redirection-url="https://www.pttavm.com/cep-telefonu-tamir-paketi-p-344597152?#ins_sr=eyJwcm9kdWN0SWQiOiIzNDQ1OTcxNTIifQ==">
                                                            <div class="add-to-cart-text ins-editable-after-click-text" id="editable-button-1508331698331" contenteditable="false">Sepete Ekle</div>
                                                        </a>
                                                    </div>
                                                    <div id="ins-add-to-cart-icon-1508331698331" class="ins-add-to-cart-icon">
                                                        <a id="ins-add-to-cart-icon-button-1508331698331" class="ins-add-to-cart-icon-button ins-element-link" href="javascript:void(0)" data-redirection-url="https://www.pttavm.com/cep-telefonu-tamir-paketi-p-344597152?#ins_sr=eyJwcm9kdWN0SWQiOiIzNDQ1OTcxNTIifQ==">
                                                            <img class="ins-add-to-cart-icon-image" src="https://image.useinsider.com/add-to-cart-icon.png" alt="Sepete Eklendi">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="wrap-go-to-product-button-1508331698382" ins-product-id="{product_id}" class="not-sortable ui-sortable ins-go-to-product-wrapper ins-adaptive-button ins-selectable-element ins-element-wrap ins-element-button ins-display-#{{Go To Product Button}}"><div id="go-to-product-button-1508331698382" class="ins-element-link ins-go-to-product-button ins-add-to-cart-button ins-element-content" not-sortable="true" data-ga-join-text="" data-override-name="true" data-element-name="Go to Product" data-go-to-product-text="Ürünü İncele" ondrop="return false;" data-recommended-image-size="180x30px" style="height: 44px; display: none !important;" data-background-color-changed="true" data-product-link="https://www.pttavm.com/cep-telefonu-tamir-paketi-p-344597152?#ins_sr=eyJwcm9kdWN0SWQiOiIzNDQ1OTcxNTIifQ==">
                                                    <div id="ins-text-button-1508331698382" class="ins-go-to-product-text-button">
                                                        <div class="go-to-product-text ins-editable-after-click-text" id="editable-button-1508331698382" contenteditable="false">Ürünü İncele</div>
                                                    </div>
                                                </div></div>
                                        </div>
                                                    <div class="ins-product-price-wrapper ins-product-price-centered">
                                                        <div id="wrap-discount-1454703450646" class="ins-product-discount-container ins-selectable-element ins-element-wrap ins-element-discount ins-hide">
                                                            <div id="discount-1454703450646" class="ins-element-content" data-background-color-changed="true" style="font-size: 14px !important; color: rgb(155, 155, 155) !important; font-weight: normal !important;">
                                                                <div class="ins-product-discount" id="editable-discount-1454703450646" contenteditable="false" style="color: rgb(255, 255, 255) !important;"><?php echo number_format($urun1["fiyat"], 2, ',', '.');?>&#x202A;TL&#x202C;</div>
                                                                <div id="wrap-discount-badge-1454703450634" class="ins-element-wrap ins-selectable-element ins-discount-badge-container">
                                                <div class="ins-discount-badge ins-element-content" id="discount-badge-1454703450634" data-element-name="Discount Badge" not-sortable="true" data-override-name="true" data-discount-position="topleft" data-percentage-icon-position="aftertheamount" data-background-color-changed="true" style="background-color: rgba(234, 0, 31, 0) !important; color: rgb(69, 172, 76) !important; text-decoration: none !important; font-size: 12px !important; display: none;">
                                                    <div class="ins-percentage-icon" style="font-size: 12px;">%</div>
                                                    <div class="ins-discount-percentage" style="font-size: 12px;">0</div>
                                                    <div class="ins-discount-text" style="font-size: 12px;">&nbsp;İNDİRİM&nbsp;</div>
                                                </div>
                                            </div>
                                                            </div>
                                                        </div><div id="wrap-price-1454703450645" class="ins-product-price-container ins-selectable-element ins-element-wrap ins-element-price ins-auto-width">
                                                            <div id="price-1454703450645" class="ins-element-content" data-background-color-changed="true" style="font-size: 20px !important; font-weight: 700 !important; color: rgb(0, 0, 0) !important;">
                                                                <div class="ins-product-price" id="editable-price-1454703450645" contenteditable="false" style="color: rgb(0, 0, 0) !important;">                      <?php echo number_format($urun1["fiyat"], 2, ',', '.');?>
 &#x202A;TL&#x202C;</div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="wrap-dynamic-attributes" class="ins-dynamic-text-area ins-display-none"></div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

<?php } ?>
            </ul>
          </div>
          <div id="wrap-arrow-1454703450633" class="ins-slider-arrow-element ins-element-wrap ins-slider-prev">
            <div class="ins-slider-arrow-wrapper ins-element-content ins-arrow-with-border" id="arrow-1454703450633" data-element-name="Arrows" data-override-name="true" not-sortable="true"></div>
          </div>
          <div class="ins-slider-arrow-element ins-slider-next">
            <div class="ins-slider-arrow-wrapper ins-arrow-with-border"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
                      <!----><div data-v-b043c43a="" data-v-851c32d4="" class="line-break hidden md:flex my-6"></div><div data-v-851c32d4="" class="flex flex-col-reverse md:flex-row px-2 md:px-0 leading-none items-start"><div data-v-851c32d4="" class="flex flex-col flex-1 md:border-y border-eGrey-100 rounded-lg w-full"><div data-v-851c32d4="" id="stickElement" class="sticky-element hidden md:flex rounded-t-lg px-6 flex-row justify-between items-center sticky bg-white border-b-1 border-eGrey-100 z-10"><ul data-v-851c32d4="" class="flex flex-row"><li data-v-851c32d4="" data-scrollable-menu="" data-id="description" class="product-tab cursor-pointer"> Ürün Açıklamaları </li><li data-v-851c32d4="" data-scrollable-menu="" data-id="attributes" class="product-tab cursor-pointer"> Ürün Özellikleri </li><li data-v-851c32d4="" data-scrollable-menu="" data-id="comments" class="product-tab cursor-pointer"> Ürün Yorumları (2) </li><li data-v-851c32d4="" class="product-tab cursor-pointer"> Taksit Seçenekleri </li></ul>
                            <!---->
                          </div><ul data-v-851c32d4="" class="flex flex-col"><li data-v-851c32d4="" data-id="description" data-scrolable="" class="py-3 px-2 md:px-4 border-b-1 border-eGrey-300 md:border-b-0"><input data-v-851c32d4="" id="tab-description" type="radio" name="tab" class="tabs absolute opacity-0 -z-10"><label data-v-851c32d4="" for="tab-description" data-scrollable-menu="" data-id="description" class="flex flex-row justify-between text-lg md:text-2xl font-semibold py-3"><span data-v-851c32d4="">Ürün Açıklamaları</span><i data-v-851c32d4="" class="open transition-all duration-150 eptticon-up"></i><i data-v-851c32d4="" class="closed transition-all duration-150 eptticon-down"></i></label><div data-v-851c32d4="" class="tab-content overflow-hidden"><div data-v-851c32d4="" class="leading-normal no-normalize"><div data-v-851c32d4="" class="mb-2"> <?php echo $urun["urunismi"]; ?> </div><iframe data-v-851c32d4="" height="180px" title="Ürün Açıklaması" class="w-full" style="height: 180px;"></iframe></div></div></li><li data-v-851c32d4="" data-id="attributes" data-scrolable="" class="py-3 px-2 md:px-4 border-b-1 border-eGrey-300 md:border-b-0"><input data-v-851c32d4="" id="tab-attributes" type="radio" name="tab" class="tabs absolute opacity-0 -z-10"><label data-v-851c32d4="" for="tab-attributes" data-scrollable-menu="" data-id="attributes" class="flex flex-row justify-between text-lg md:text-2xl font-semibold py-3"><span data-v-851c32d4=""></span><i data-v-851c32d4="" class="open transition-all duration-150 eptticon-up"></i><i data-v-851c32d4="" class="closed transition-all duration-150 eptticon-down"></i></label><div data-v-851c32d4="" class="tab-content overflow-hidden"><table data-v-851c32d4="" class="table-auto w-full"><tbody data-v-851c32d4=""><tr data-v-851c32d4=""><td data-v-851c32d4="" class="py-2 px-2"> </td><td data-v-851c32d4="" class="py-2 pl-4 pr-2"> </td></tr></tbody></table></div></li><li data-v-851c32d4="" data-id="comments" data-scrolable="" class="py-3 px-2 md:px-4 border-b-1 border-eGrey-300 md:border-b-0"><input data-v-851c32d4="" id="tab-comments" type="radio" name="tab" class="tabs absolute opacity-0 -z-10"><label data-v-851c32d4="" for="tab-comments" data-scrollable-menu="" data-id="comments" class="flex flex-row justify-between text-lg md:text-2xl font-semibold py-3"><span data-v-851c32d4="" class="flex flex-1"> Ürün Yorumları (2) </span><i data-v-851c32d4="" class="open transition-all duration-150 eptticon-up"></i><i data-v-851c32d4="" class="closed transition-all duration-150 eptticon-down"></i></label><div data-v-851c32d4="" class="tab-content overflow-hidden flex flex-col"><div class="border rounded border-eGrey-200 md:p-6"><div class="flex flex-col md:flex-row md:items-center pb-6"><div class="flex flex-col flex flex-1 p-4 pb-0 md:p-0 w-full"><div class="flex flex-row items-center comments-header"><div class="w-24 md:w-40 flex justify-center items-center comment-box-image-container"><img src="<?php echo $urun["resim1"]; ?>" alt="<?php echo $urun["urunismi"]; ?>" class="object-cover"></div><div class="flex flex-col min-w-0 ml-4 md:ml-8"><h2 class="truncate font-semibold text-lg mb-2 md:pr-12"><?php echo $urun["urunismi"]; ?></h2><div class="flex flex-row items-center"><span class="text-5xl font-semibold mr-3"> 5,0 </span><div class="flex flex-col mt-2"><div data-v-295cc332="" class="flex flex-row "><i data-v-295cc332="" class="eptticon-star text-eGold"></i><i data-v-295cc332="" class="eptticon-star text-eGold"></i><i data-v-295cc332="" class="eptticon-star text-eGold"></i><i data-v-295cc332="" class="eptticon-star text-eGold"></i><i data-v-295cc332="" class="eptticon-star text-eGold"></i></div><span class="mt-2 text-eGrey-600 text-xsi md:text-sm"><b>2</b> Kullanıcı değerlendirmesi </span></div></div><div class="flex flex-row mt-3"><button data-v-55a91d9d="" type="submit" aria-label="Ara" class="add-comment py-1 md:py-2 px-4 md:px-8 text-xsi md:text-base mr-2 md:mr-4 outline-none focus:outline-none font-medium mt-0 transition-all duration-250 bg-eBlue md:hover:bg-eBlue-dark text-white rounded-md leading-none"><div data-v-55a91d9d="" class="w-full relative"><div data-v-55a91d9d="" class="absolute w-full flex justify-center h-7" style="display: none;"><img data-v-55a91d9d="" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiBzdHlsZT0ibWFyZ2luOiBhdXRvOyBiYWNrZ3JvdW5kOiBub25lOyBkaXNwbGF5OiBibG9jazsgc2hhcGUtcmVuZGVyaW5nOiBhdXRvOyIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCIgdmlld0JveD0iMCAwIDEwMCAxMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89InhNaWRZTWlkIj4KICA8Y2lyY2xlIGN4PSI1MCIgY3k9IjUwIiBmaWxsPSJub25lIiBzdHJva2U9IiNmZmZmZmYiIHN0cm9rZS13aWR0aD0iMTIiIHI9IjMwIiBzdHJva2UtZGFzaGFycmF5PSIxNDEuMzcxNjY5NDExNTQwNjcgNDkuMTIzODg5ODAzODQ2ODkiPgogICAgPGFuaW1hdGVUcmFuc2Zvcm0gYXR0cmlidXRlTmFtZT0idHJhbnNmb3JtIiB0eXBlPSJyb3RhdGUiIHJlcGVhdENvdW50PSJpbmRlZmluaXRlIiBkdXI9IjFzIiB2YWx1ZXM9IjAgNTAgNTA7MzYwIDUwIDUwIiBrZXlUaW1lcz0iMDsxIj48L2FuaW1hdGVUcmFuc2Zvcm0+CiAgPC9jaXJjbGU+Cjwvc3ZnPgo=" alt="loading_white"></div></div><div data-v-55a91d9d="" class="h-7 flex justify-center items-center leading-none"> Ürünü Değerlendir </div></button><button data-v-55a91d9d="" type="submit" aria-label="Ara" class="py-1 md:py-2 px-4 md:px-8 text-xsi md:text-base outline-none focus:outline-none font-medium mt-0 transition-all duration-250 border-1 border-eBlue bg-white md:hover:bg-white-dark text-eBlue rounded-md leading-none"><div data-v-55a91d9d="" class="w-full relative"><div data-v-55a91d9d="" class="absolute w-full flex justify-center h-7" style="display: none;"><img data-v-55a91d9d="" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiBzdHlsZT0ibWFyZ2luOiBhdXRvOyBiYWNrZ3JvdW5kOiBub25lOyBkaXNwbGF5OiBibG9jazsgc2hhcGUtcmVuZGVyaW5nOiBhdXRvOyIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCIgdmlld0JveD0iMCAwIDEwMCAxMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89InhNaWRZTWlkIj4KICA8Y2lyY2xlIGN4PSI1MCIgY3k9IjUwIiBmaWxsPSJub25lIiBzdHJva2U9IiNmZmZmZmYiIHN0cm9rZS13aWR0aD0iMTIiIHI9IjMwIiBzdHJva2UtZGFzaGFycmF5PSIxNDEuMzcxNjY5NDExNTQwNjcgNDkuMTIzODg5ODAzODQ2ODkiPgogICAgPGFuaW1hdGVUcmFuc2Zvcm0gYXR0cmlidXRlTmFtZT0idHJhbnNmb3JtIiB0eXBlPSJyb3RhdGUiIHJlcGVhdENvdW50PSJpbmRlZmluaXRlIiBkdXI9IjFzIiB2YWx1ZXM9IjAgNTAgNTA7MzYwIDUwIDUwIiBrZXlUaW1lcz0iMDsxIj48L2FuaW1hdGVUcmFuc2Zvcm0+CiAgPC9jaXJjbGU+Cjwvc3ZnPgo=" alt="loading_white"></div></div><div data-v-55a91d9d="" class="h-7 flex justify-center items-center leading-none"> Sepete Ekle </div></button></div></div></div><div class="text-xsi mt-4 md:text-sm flex flex-row items-center md:px-0"><i class="eptticon-helper-info"></i><span class="ml-1">Değerlendirme yapabilmek için bu ürünü satın almış olmanız gerekmektedir.</span></div></div><div class="flex flex-col w-full md:pr-12 px-4"><div class="hidden md:flex flex-row justify-end mb-6">
                                        <!---->
                                      </div><div data-v-28005d87="" class="md:pl-6 pt-6 md:pt-0 flex flex-1 justify-center text-xs select-none"><ul data-v-28005d87="" class="flex flex-col w-full max-w-100"><li data-v-28005d87="" class="flex flex-row items-center mb-3"><span data-v-28005d87="" class="flex w-14 whitespace-no-wrap rounded text-eBlue-500 text-xsi ins-init-condition-tracking"> 5 yıldız </span><span data-v-28005d87="" class="bg-eGrey-200 flex flex-1 w-full h-2 rounded overflow-hidden ins-init-condition-tracking"><span data-v-28005d87="" class="bg-eGreen-500 inline-block h-full" style="width: 214px;"></span></span><span data-v-28005d87="" class="flex ml-6 w-4 text-xsi">(2)</span></li><li data-v-28005d87="" class="flex flex-row items-center mb-3"><span data-v-28005d87="" class="flex w-14 whitespace-no-wrap rounded text-eBlue-500 text-xsi ins-init-condition-tracking"> 4 yıldız </span><span data-v-28005d87="" class="bg-eGrey-200 flex flex-1 w-full h-2 rounded overflow-hidden ins-init-condition-tracking"><span data-v-28005d87="" class="bg-eGreen-500 inline-block h-full" style="width: 0px;"></span></span><span data-v-28005d87="" class="flex ml-6 w-4 text-xsi">(0)</span></li><li data-v-28005d87="" class="flex flex-row items-center mb-3"><span data-v-28005d87="" class="flex w-14 whitespace-no-wrap rounded text-eBlue-500 text-xsi ins-init-condition-tracking"> 3 yıldız </span><span data-v-28005d87="" class="bg-eGrey-200 flex flex-1 w-full h-2 rounded overflow-hidden ins-init-condition-tracking"><span data-v-28005d87="" class="bg-eGreen-500 inline-block h-full" style="width: 0px;"></span></span><span data-v-28005d87="" class="flex ml-6 w-4 text-xsi">(0)</span></li><li data-v-28005d87="" class="flex flex-row items-center mb-3"><span data-v-28005d87="" class="flex w-14 whitespace-no-wrap rounded text-eBlue-500 text-xsi ins-init-condition-tracking"> 2 yıldız </span><span data-v-28005d87="" class="bg-eGrey-200 flex flex-1 w-full h-2 rounded overflow-hidden ins-init-condition-tracking"><span data-v-28005d87="" class="bg-eGreen-500 inline-block h-full" style="width: 0px;"></span></span><span data-v-28005d87="" class="flex ml-6 w-4 text-xsi">(0)</span></li><li data-v-28005d87="" class="flex flex-row items-center mb-3"><span data-v-28005d87="" class="flex w-14 whitespace-no-wrap rounded text-eBlue-500 text-xsi ins-init-condition-tracking"> 1 yıldız </span><span data-v-28005d87="" class="bg-eGrey-200 flex flex-1 w-full h-2 rounded overflow-hidden ins-init-condition-tracking"><span data-v-28005d87="" class="bg-eGreen-500 inline-block h-full" style="width: 0px;"></span></span><span data-v-28005d87="" class="flex ml-6 w-4 text-xsi">(0)</span></li></ul></div></div></div><div class="flex flex-col pt-2 text-sm"><div class="flex flex-col"><div class="flex flex-col px-4 md:px-0"><div data-v-3e0a8d26="" class="comment user-login" id="comment_229177"><div data-v-3e0a8d26="" class="flex flex-row"><div data-v-295cc332="" data-v-3e0a8d26="" class="flex flex-row "><i data-v-295cc332="" class="eptticon-star text-eGold"></i><i data-v-295cc332="" class="eptticon-star text-eGold"></i><i data-v-295cc332="" class="eptticon-star text-eGold"></i><i data-v-295cc332="" class="eptticon-star text-eGold"></i><i data-v-295cc332="" class="eptticon-star text-eGold"></i></div><span data-v-3e0a8d26="" class="text-eGrey-600 px-3 font-light">12 Ocak 2023</span><span data-v-3e0a8d26="" class="text-eGrey-600 px-3 font-light">|</span><span data-v-3e0a8d26="" class="text-eGrey-600 px-3 font-light">C***** E*********</span></div><p data-v-3e0a8d26="" class="pt-4 text-base pb-4 leading-normal"> Hızlı gönderi sağlam paketleme için teşekkür ederim.mağaza güvenilir alışveriş yapmanızı tavsiye ederim.soruma biraz geç cvp vermiş olsalarda herşey yolunda gitti. </p><div data-v-3e0a8d26="" class="comment-buttons"><button data-v-3e0a8d26="" type="button" class="comment-buttons-button text-eGrey-600"><img data-v-3e0a8d26="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABEAAAATCAYAAAB2pebxAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAADVSURBVHgBrZPfDcIgEId/oAN0hI7QDewGxglM+9ZHR3ADN6CdwBXqBNUJZAP72CfOI6n/sLah+CUEcsDHHQSBAZRSkQSOPEy5nQ2wybJM4wdyMEh06AWWhBcpjDAogRArJxLDR8KlxFObJiV4lfFOixGWbmABrOl7XVxyim5QENXbPK+EO1EpdYVHOcaY3YeED7Mv0cCP1r2TBP5EktNv+hIAohT+1MuZpz/hOzlJ/IFwiZRluKTrgjPRWVHoIIkhutg+SCKEuIVL+O88JBrz2NvPZwd3D9E9vkMbOPwAAAAASUVORK5CYII=" alt="like_comment"><span data-v-3e0a8d26="" class="ml-2">Yorumu Beğen (0)</span></button></div></div><div data-v-3e0a8d26="" class="comment user-login" id="comment_213463"><div data-v-3e0a8d26="" class="flex flex-row"><div data-v-295cc332="" data-v-3e0a8d26="" class="flex flex-row "><i data-v-295cc332="" class="eptticon-star text-eGold"></i><i data-v-295cc332="" class="eptticon-star text-eGold"></i><i data-v-295cc332="" class="eptticon-star text-eGold"></i><i data-v-295cc332="" class="eptticon-star text-eGold"></i><i data-v-295cc332="" class="eptticon-star text-eGold"></i></div><span data-v-3e0a8d26="" class="text-eGrey-600 px-3 font-light">28 Kasım 2022</span><span data-v-3e0a8d26="" class="text-eGrey-600 px-3 font-light">|</span><span data-v-3e0a8d26="" class="text-eGrey-600 px-3 font-light">S******** K*****</span></div><p data-v-3e0a8d26="" class="pt-4 text-base pb-4 leading-normal"> Ürün 5 gün içinde teslim edildi. Hiç bir sıkıntı yaşamadım. PTTAVM ve Aksaray İletişim çalışanlarına çok teşekkür ederim. </p><div data-v-3e0a8d26="" class="comment-buttons"><button data-v-3e0a8d26="" type="button" class="comment-buttons-button text-eGrey-600"><img data-v-3e0a8d26="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABEAAAATCAYAAAB2pebxAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAADVSURBVHgBrZPfDcIgEId/oAN0hI7QDewGxglM+9ZHR3ADN6CdwBXqBNUJZAP72CfOI6n/sLah+CUEcsDHHQSBAZRSkQSOPEy5nQ2wybJM4wdyMEh06AWWhBcpjDAogRArJxLDR8KlxFObJiV4lfFOixGWbmABrOl7XVxyim5QENXbPK+EO1EpdYVHOcaY3YeED7Mv0cCP1r2TBP5EktNv+hIAohT+1MuZpz/hOzlJ/IFwiZRluKTrgjPRWVHoIIkhutg+SCKEuIVL+O88JBrz2NvPZwd3D9E9vkMbOPwAAAAASUVORK5CYII=" alt="like_comment"><span data-v-3e0a8d26="" class="ml-2">Yorumu Beğen (0)</span></button></div></div></div></div>
                                    <!---->
                                  </div></div></div></li><li data-v-851c32d4="" class="block md:hidden py-3 px-2 md:px-4"><div data-v-851c32d4="" class="flex flex-row justify-between text-lg md:text-2xl font-semibold py-3"><span data-v-851c32d4="">Taksit Seçenekleri</span><i data-v-851c32d4="" class="closed transition-all duration-150 eptticon-down"></i></div></li></ul><div data-v-851c32d4=""><div data-v-b043c43a="" class="line-break hidden md:block my-5"></div><div class="flex flex-col mb:px-0 mt-5 ins-preview-wrapper-4815"><div data-v-51dfcdbb="" class="headline pl-2 md:mb-4"><h2 data-v-51dfcdbb="" class="pl-2 md:pl-0 text-eGrey-900 text-base md:text-2xl font-bold"> </h2>
                                <!---->
                              </div>
                    </span>
                  </div>
                </div>
                <!----><div data-v-86c25570="" data-v-851c32d4="" class="all-block main-block overflow-y-auto"><div data-v-86c25570="" class="p-4 px-6 flex flex-row justify-between items-center"><h3 data-v-86c25570="" class="text-2xl font-semibold"> Toptan Fiyat İste </h3><button data-v-86c25570="" aria-label="Kapat" class="text-xl outline-none focus:outline-none"><i data-v-86c25570="" class="eptticon-close"></i></button></div><div data-v-86c25570="" class="px-6"><div data-v-86c25570="" class="flex flex-col items-center py-6 pb-20 border-t-1 border-eGrey-400"><div data-v-86c25570="" class="w-full text-eGrey-900 px-2"><span data-v-86c25570="" class="w-full md:flex justify-center"><form data-v-86c25570="" class="w-full md:px-6 flex flex-col items-center"><div data-v-7ee81ede="" data-v-86c25570="" class="flex flex-col mb-4 w-full"><span data-v-7ee81ede=""><div data-v-7ee81ede="" class="border border-solid overflow-hidden font-medium relative flex items-center rounded-lg border-eGrey-400">
                                  <!----><div data-v-7ee81ede="" class="flex flex-1 items-center relative"><label data-v-7ee81ede="" for="whole-name" class="absolute z-10 truncate w-full pr-12 left-17px transition-special-1 duration-250 string-label label-top font-normal"> Ad <span data-v-7ee81ede="" class="text-eRed-500"> * </span></label><input data-v-7ee81ede="" id="whole-name" type="text" name="" placeholder="" autocomplete="on" class="string-input leading-none relative bg-transparent px-4 outline-none text-eGrey-900 w-full mt-7 pb-3">
                                    <!---->
                                    <!---->
                                  </div>
                                </div>
                                <!---->
                              </span></div><div data-v-7ee81ede="" data-v-86c25570="" class="flex flex-col mb-4 w-full"><span data-v-7ee81ede=""><div data-v-7ee81ede="" class="border border-solid overflow-hidden font-medium relative flex items-center rounded-lg border-eGrey-400">
                                  <!----><div data-v-7ee81ede="" class="flex flex-1 items-center relative"><label data-v-7ee81ede="" for="whole-surname" class="absolute z-10 truncate w-full pr-12 left-17px transition-special-1 duration-250 string-label label-top font-normal"> Soyad <span data-v-7ee81ede="" class="text-eRed-500"> * </span></label><input data-v-7ee81ede="" id="whole-surname" type="text" name="" placeholder="" autocomplete="on" class="string-input leading-none relative bg-transparent px-4 outline-none text-eGrey-900 w-full mt-7 pb-3">
                                    <!---->
                                    <!---->
                                  </div>
                                </div>
                                <!---->
                              </span></div><div data-v-7ee81ede="" data-v-86c25570="" class="flex flex-col mb-4 w-full"><span data-v-7ee81ede=""><div data-v-7ee81ede="" class="border border-solid overflow-hidden font-medium relative flex items-center rounded-lg border-eGrey-400">
                                  <!----><div data-v-7ee81ede="" class="flex flex-1 items-center relative"><label data-v-7ee81ede="" for="whole-email" class="absolute z-10 truncate w-full pr-12 left-17px transition-special-1 duration-250 string-label label-top font-normal"> Email <span data-v-7ee81ede="" class="text-eRed-500"> * </span></label><input data-v-7ee81ede="" id="whole-email" type="text" name="" placeholder="" autocomplete="on" class="string-input leading-none relative bg-transparent px-4 outline-none text-eGrey-900 w-full mt-7 pb-3">
                                    <!---->
                                    <!---->
                                  </div>
                                </div>
                                <!---->
                              </span></div><div data-v-7ee81ede="" data-v-86c25570="" class="flex flex-col mb-4 w-full"><span data-v-7ee81ede=""><div data-v-7ee81ede="" class="border border-solid overflow-hidden font-medium relative flex items-center rounded-lg border-eGrey-400">
                                  <!----><div data-v-7ee81ede="" class="flex flex-1 items-center relative"><label data-v-7ee81ede="" for="whole-telephone" class="absolute z-10 truncate w-full pr-12 left-17px transition-special-1 duration-250 string-label label-top font-normal"> Telefon <span data-v-7ee81ede="" class="text-eRed-500"> * </span></label><input data-v-7ee81ede="" id="whole-telephone" type="text" name="" placeholder="" autocomplete="on" class="string-input leading-none relative bg-transparent px-4 outline-none text-eGrey-900 w-full mt-7 pb-3">
                                    <!---->
                                    <!---->
                                  </div>
                                </div>
                                <!---->
                              </span></div><div data-v-7ee81ede="" data-v-86c25570="" class="flex flex-col mb-4 w-full"><span data-v-7ee81ede=""><div data-v-7ee81ede="" class="border border-solid overflow-hidden font-medium relative flex items-center rounded-lg border-eGrey-400">
                                  <!----><div data-v-7ee81ede="" class="flex flex-1 items-center relative"><label data-v-7ee81ede="" for="whole-quantity" class="absolute z-10 truncate w-full pr-12 left-17px transition-special-1 duration-250 string-label label-top font-normal"> Adet Sayısı <span data-v-7ee81ede="" class="text-eRed-500"> * </span></label><input data-v-7ee81ede="" id="whole-quantity" type="text" name="" placeholder="" autocomplete="on" class="string-input leading-none relative bg-transparent px-4 outline-none text-eGrey-900 w-full mt-7 pb-3">
                                    <!---->
                                    <!---->
                                  </div>
                                </div>
                                <!---->
                              </span></div>
                            <!---->
                            <!----><button data-v-55a91d9d="" data-v-86c25570="" type="submit" aria-label="Ara" class="py-4 px-16 mt-4 text-sm outline-none focus:outline-none font-medium mt-0 transition-all duration-250 bg-eBlue md:hover:bg-eBlue-dark text-white rounded-md leading-none"><div data-v-55a91d9d="" class="w-full relative"><div data-v-55a91d9d="" class="absolute w-full flex justify-center h-7" style="display: none;"><img data-v-55a91d9d="" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiBzdHlsZT0ibWFyZ2luOiBhdXRvOyBiYWNrZ3JvdW5kOiBub25lOyBkaXNwbGF5OiBibG9jazsgc2hhcGUtcmVuZGVyaW5nOiBhdXRvOyIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCIgdmlld0JveD0iMCAwIDEwMCAxMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89InhNaWRZTWlkIj4KICA8Y2lyY2xlIGN4PSI1MCIgY3k9IjUwIiBmaWxsPSJub25lIiBzdHJva2U9IiNmZmZmZmYiIHN0cm9rZS13aWR0aD0iMTIiIHI9IjMwIiBzdHJva2UtZGFzaGFycmF5PSIxNDEuMzcxNjY5NDExNTQwNjcgNDkuMTIzODg5ODAzODQ2ODkiPgogICAgPGFuaW1hdGVUcmFuc2Zvcm0gYXR0cmlidXRlTmFtZT0idHJhbnNmb3JtIiB0eXBlPSJyb3RhdGUiIHJlcGVhdENvdW50PSJpbmRlZmluaXRlIiBkdXI9IjFzIiB2YWx1ZXM9IjAgNTAgNTA7MzYwIDUwIDUwIiBrZXlUaW1lcz0iMDsxIj48L2FuaW1hdGVUcmFuc2Zvcm0+CiAgPC9jaXJjbGU+Cjwvc3ZnPgo=" alt="loading_white"></div></div><div data-v-55a91d9d="" class="h-7 flex justify-center items-center leading-none"> Fiyat İste </div></button>
                          </form></span></div></div></div></div><div data-v-48fb0211="" data-v-851c32d4="" class="add-comment-box overflow-y-auto text-eGrey-900" style="display: none;"><div data-v-48fb0211="" class="p-4 px-6 flex flex-row justify-between items-center"><h3 data-v-48fb0211="" class="text-2xl font-semibold"> Yorum Yap </h3><button data-v-48fb0211="" aria-label="Kapat" class="text-xl outline-none focus:outline-none"><i data-v-48fb0211="" class="eptticon-close"></i></button></div><div data-v-48fb0211="" class="px-6"><div data-v-48fb0211="" class="flex flex-col items-center py-6 pb-20 border-t-1 border-eGrey-400"><div data-v-48fb0211="" class="flex flex-col items-center md:w-9/12 mx-auto"><img data-v-48fb0211="" src="https://img.epttavm.com/pimages/170/230/662/62f50a37590d4.jpg?v=201910111530" alt="<?php echo $urun["urunismi"]; ?>" class="w-28 h-28 object-contain border-1 border-eGrey-100"><span data-v-48fb0211="" class="py-4">Ürüne kaç puan verirsiniz?</span><span data-v-48fb0211="" class="w-full"><form data-v-48fb0211="" class="w-full flex flex-col items-center"><div data-v-295cc332="" data-v-48fb0211="" class="flex flex-row  text-3xl"><i data-v-295cc332="" class="eptticon-star cursor-pointer text-eGrey-300 px-1" style="font-size: 30px;"></i><i data-v-295cc332="" class="eptticon-star cursor-pointer text-eGrey-300 px-1" style="font-size: 30px;"></i><i data-v-295cc332="" class="eptticon-star cursor-pointer text-eGrey-300 px-1" style="font-size: 30px;"></i><i data-v-295cc332="" class="eptticon-star cursor-pointer text-eGrey-300 px-1" style="font-size: 30px;"></i><i data-v-295cc332="" class="eptticon-star cursor-pointer text-eGrey-300 px-1" style="font-size: 30px;"></i></div><div data-v-c5ca5d2c="" data-v-48fb0211="" class="hidden-input"><span data-v-c5ca5d2c=""><div data-v-c5ca5d2c=""><input data-v-c5ca5d2c="" id="" type="hidden" value="0"></div>
                                <!---->
                              </span></div><span data-v-48fb0211="" class="text-xs mt-8 text-left block w-full"> Ürünle ilgili görüşlerinizi alışveriş yapanlarla paylaşın </span><div data-v-7ee81ede="" data-v-48fb0211="" class="flex flex-col mt-4 w-full"><span data-v-7ee81ede=""><div data-v-7ee81ede="" class="border border-solid overflow-hidden font-medium relative flex items-center rounded-lg border-eGrey-400">
                                  <!----><div data-v-7ee81ede="" class="flex flex-1 items-center relative"><label data-v-7ee81ede="" for="add-comment" class="absolute z-10 truncate w-full pr-12 left-17px transition-special-1 duration-250 string-label label-top font-normal"> Yorumunuz <span data-v-7ee81ede="" class="text-eRed-500"> * </span></label><textarea data-v-7ee81ede="" id="add-comment" placeholder="" rows="5" name="Yorum" class="relative resize-none bg-transparent px-4 outline-none text-eGrey-900 w-full mt-7 pb-3"></textarea>
                                    <!---->
                                    <!---->
                                  </div>
                                </div>
                                <!---->
                              </span></div><button data-v-55a91d9d="" data-v-48fb0211="" type="submit" aria-label="Ara" class="py-4 px-16 mt-4 text-sm outline-none focus:outline-none font-medium mt-0 transition-all duration-250 bg-eBlue md:hover:bg-eBlue-dark text-white rounded-md leading-none"><div data-v-55a91d9d="" class="w-full relative"><div data-v-55a91d9d="" class="absolute w-full flex justify-center h-7" style="display: none;"><img data-v-55a91d9d="" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiBzdHlsZT0ibWFyZ2luOiBhdXRvOyBiYWNrZ3JvdW5kOiBub25lOyBkaXNwbGF5OiBibG9jazsgc2hhcGUtcmVuZGVyaW5nOiBhdXRvOyIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCIgdmlld0JveD0iMCAwIDEwMCAxMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89InhNaWRZTWlkIj4KICA8Y2lyY2xlIGN4PSI1MCIgY3k9IjUwIiBmaWxsPSJub25lIiBzdHJva2U9IiNmZmZmZmYiIHN0cm9rZS13aWR0aD0iMTIiIHI9IjMwIiBzdHJva2UtZGFzaGFycmF5PSIxNDEuMzcxNjY5NDExNTQwNjcgNDkuMTIzODg5ODAzODQ2ODkiPgogICAgPGFuaW1hdGVUcmFuc2Zvcm0gYXR0cmlidXRlTmFtZT0idHJhbnNmb3JtIiB0eXBlPSJyb3RhdGUiIHJlcGVhdENvdW50PSJpbmRlZmluaXRlIiBkdXI9IjFzIiB2YWx1ZXM9IjAgNTAgNTA7MzYwIDUwIDUwIiBrZXlUaW1lcz0iMDsxIj48L2FuaW1hdGVUcmFuc2Zvcm0+CiAgPC9jaXJjbGU+Cjwvc3ZnPgo=" alt="loading_white"></div></div><div data-v-55a91d9d="" class="h-7 flex justify-center items-center leading-none"> Yorum Ekle </div></button></form></span><div data-v-48fb0211="" class="text-sm text-eGrey-700 mt-3"><h3 data-v-48fb0211="" class="font-medium text-sm mb-4"> Yorum yayınlama kriterleri </h3><p data-v-48fb0211="" class="pb-4 text-xs"> Hakaret, argo veya alaycı tavır içeren, fiyat bilgisi verilen, soru sorulan, link verilen, karşılaştırma yapılan, 1-2 kelime olup yeterli bilgi içermeyen yorumlar onaylanamamaktadır. </p><p data-v-48fb0211="" class="text-xs"> Bu kriterlere göre incelenen yorumlar, kısa bir değerlendirme sürecinden geçer, uygunsa onaylanarak ilgili ürün sayfasında yer alır. Değerlendirme süresi, yorumların geliş sıralamasına göre değişkenlik gösterebilir. </p></div><div data-v-48fb0211="" class="text-sm text-eGrey-700 mt-3"><h3 data-v-48fb0211="" class="font-bold text-sm mb-4"> Siparişiniz İle İlgili Sorun Mu Yaşıyorsunuz? Bizimle İletişime Geçin! </h3><p data-v-48fb0211="" class="pb-4 text-xs">Değerli Müşterimiz,</p><p data-v-48fb0211="" class="pb-4 text-xs"> Siparişinizle ilgili bir sorun yaşıyorsanız veya herhangi bir konuda destek gerekiyorsa, size yardımcı olmaktan mutluluk duyarız. </p><p data-v-48fb0211="" class="pb-4 text-xs">Aşağıdaki butona tıklayarak doğrudan bize ulaşabilirsiniz:</p><div data-v-48fb0211="" class="flex w-full items-center justify-center"><a data-v-48fb0211="" href="/sayfa/bize-ulasin.html" class=""><button data-v-55a91d9d="" data-v-48fb0211="" type="submit" aria-label="Ara" class="py-4 px-16 mt-4 text-sm outline-none focus:outline-none font-medium mt-0 transition-all duration-250 bg-eBlue md:hover:bg-eBlue-dark text-white rounded-md leading-none"><div data-v-55a91d9d="" class="w-full relative"><div data-v-55a91d9d="" class="absolute w-full flex justify-center h-7" style="display: none;"><img data-v-55a91d9d="" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiBzdHlsZT0ibWFyZ2luOiBhdXRvOyBiYWNrZ3JvdW5kOiBub25lOyBkaXNwbGF5OiBibG9jazsgc2hhcGUtcmVuZGVyaW5nOiBhdXRvOyIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCIgdmlld0JveD0iMCAwIDEwMCAxMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89InhNaWRZTWlkIj4KICA8Y2lyY2xlIGN4PSI1MCIgY3k9IjUwIiBmaWxsPSJub25lIiBzdHJva2U9IiNmZmZmZmYiIHN0cm9rZS13aWR0aD0iMTIiIHI9IjMwIiBzdHJva2UtZGFzaGFycmF5PSIxNDEuMzcxNjY5NDExNTQwNjcgNDkuMTIzODg5ODAzODQ2ODkiPgogICAgPGFuaW1hdGVUcmFuc2Zvcm0gYXR0cmlidXRlTmFtZT0idHJhbnNmb3JtIiB0eXBlPSJyb3RhdGUiIHJlcGVhdENvdW50PSJpbmRlZmluaXRlIiBkdXI9IjFzIiB2YWx1ZXM9IjAgNTAgNTA7MzYwIDUwIDUwIiBrZXlUaW1lcz0iMDsxIj48L2FuaW1hdGVUcmFuc2Zvcm0+CiAgPC9jaXJjbGU+Cjwvc3ZnPgo=" alt="loading_white"></div></div><div data-v-55a91d9d="" class="h-7 flex justify-center items-center leading-none"> İletişime Geç </div></button></a></div></div></div></div></div></div><div data-v-52a1604c="" data-v-851c32d4="" class="add-comment-box overflow-y-auto text-eGrey-900"><div data-v-52a1604c="" class="p-4 px-6 flex flex-row justify-between items-center"><h3 data-v-52a1604c="" class="text-2xl font-semibold"> Mağazaya Soru Sor </h3><button data-v-52a1604c="" aria-label="Kapat" class="text-xl outline-none focus:outline-none"><i data-v-52a1604c="" class="eptticon-close"></i></button></div><div data-v-52a1604c="" class="px-6"><div data-v-52a1604c="" class="flex flex-col items-center py-6 pb-20 border-t-1 border-eGrey-400"><div data-v-52a1604c="" class="flex flex-col items-center md:w-9/12 mx-auto"><img data-v-52a1604c="" src="https://img.epttavm.com/pimages/170/230/662/62f50a37590d4.jpg?v=201910111530" alt="<?php echo $urun["urunismi"]; ?>" class="w-28 h-28 object-contain"><div data-v-52a1604c="" class="my-6 text-sm flex flex-col justify-start"><div data-v-52a1604c="" class="flex flex-col mb-3"><span data-v-52a1604c="" class="text-xs">Ürün Adı:</span><span data-v-52a1604c="" class="font-medium"><?php echo $urun["urunismi"]; ?></span></div><div data-v-52a1604c="" class="flex flex-col"><span data-v-52a1604c="" class="text-xs">Mağaza Adı:</span><span data-v-52a1604c="" class="font-medium">Aksaray İletişim</span></div></div><span data-v-52a1604c="" class="text-xs mt-8 text-left block w-full"> Sorunuzu aşağıdaki alana yazınız. </span><span data-v-52a1604c="" class="w-full"><form data-v-52a1604c="" class="w-full flex flex-col items-center"><div data-v-7ee81ede="" data-v-52a1604c="" class="flex flex-col mt-2 w-full"><span data-v-7ee81ede=""><div data-v-7ee81ede="" class="border border-solid overflow-hidden font-medium relative flex items-center rounded-lg border-eGrey-400">
                                  <!----><div data-v-7ee81ede="" class="flex flex-1 items-center relative"><label data-v-7ee81ede="" for="ask-to-shop-question" class="absolute z-10 truncate w-full pr-12 left-17px transition-special-1 duration-250 string-label label-top font-normal"> Sorunuz <span data-v-7ee81ede="" class="text-eRed-500"> * </span></label><textarea data-v-7ee81ede="" id="ask-to-shop-question" placeholder="" rows="5" name="Soru" class="relative resize-none bg-transparent px-4 outline-none text-eGrey-900 w-full mt-7 pb-3"></textarea>
                                    <!---->
                                    <!---->
                                  </div>
                                </div>
                                <!---->
                              </span></div><button data-v-55a91d9d="" data-v-52a1604c="" type="submit" aria-label="Ara" class="py-4 px-16 mt-4 text-sm outline-none focus:outline-none font-medium mt-0 transition-all duration-250 bg-eBlue md:hover:bg-eBlue-dark text-white rounded-md leading-none"><div data-v-55a91d9d="" class="w-full relative"><div data-v-55a91d9d="" class="absolute w-full flex justify-center h-7" style="display: none;"><img data-v-55a91d9d="" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiBzdHlsZT0ibWFyZ2luOiBhdXRvOyBiYWNrZ3JvdW5kOiBub25lOyBkaXNwbGF5OiBibG9jazsgc2hhcGUtcmVuZGVyaW5nOiBhdXRvOyIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCIgdmlld0JveD0iMCAwIDEwMCAxMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89InhNaWRZTWlkIj4KICA8Y2lyY2xlIGN4PSI1MCIgY3k9IjUwIiBmaWxsPSJub25lIiBzdHJva2U9IiNmZmZmZmYiIHN0cm9rZS13aWR0aD0iMTIiIHI9IjMwIiBzdHJva2UtZGFzaGFycmF5PSIxNDEuMzcxNjY5NDExNTQwNjcgNDkuMTIzODg5ODAzODQ2ODkiPgogICAgPGFuaW1hdGVUcmFuc2Zvcm0gYXR0cmlidXRlTmFtZT0idHJhbnNmb3JtIiB0eXBlPSJyb3RhdGUiIHJlcGVhdENvdW50PSJpbmRlZmluaXRlIiBkdXI9IjFzIiB2YWx1ZXM9IjAgNTAgNTA7MzYwIDUwIDUwIiBrZXlUaW1lcz0iMDsxIj48L2FuaW1hdGVUcmFuc2Zvcm0+CiAgPC9jaXJjbGU+Cjwvc3ZnPgo=" alt="loading_white"></div></div><div data-v-55a91d9d="" class="h-7 flex justify-center items-center leading-none"> Soruyu Gönder </div></button></form></span></div></div></div></div><div data-v-73f3ccd2="" data-v-851c32d4="" class="add-comment-box overflow-y-auto text-eGrey-900"><div data-v-73f3ccd2="" class="p-4 px-6 flex flex-row justify-between items-center"><h3 data-v-73f3ccd2="" class="text-2xl font-semibold"> Ürünü Arkadaşına Öner </h3><button data-v-73f3ccd2="" aria-label="Kapat" class="text-xl outline-none focus:outline-none"><i data-v-73f3ccd2="" class="eptticon-close"></i></button></div><div data-v-73f3ccd2="" class="px-6"><div data-v-73f3ccd2="" class="flex flex-col items-center py-6 pb-20 border-t-1 border-eGrey-400"><div data-v-73f3ccd2="" class="flex flex-col items-center md:w-9/12 mx-auto"><img data-v-73f3ccd2="" src="https://img.epttavm.com/pimages/170/230/662/62f50a37590d4.jpg?v=201910111530" alt="<?php echo $urun["urunismi"]; ?>" class="w-28 h-28 object-contain"><div data-v-73f3ccd2="" class="my-6 text-sm flex flex-col justify-start"><div data-v-73f3ccd2="" class="flex flex-col mb-3"><span data-v-73f3ccd2="">Ürün Adı:</span><span data-v-73f3ccd2="" class="font-medium"><?php echo $urun["urunismi"]; ?></span></div><div data-v-73f3ccd2="" class="flex flex-col"><span data-v-73f3ccd2="">Mağaza Adı:</span><span data-v-73f3ccd2="" class="font-medium">Aksaray İletişim</span></div></div><span data-v-73f3ccd2="" class="w-full"><form data-v-73f3ccd2="" class="w-full flex flex-col items-center"><div data-v-7ee81ede="" data-v-73f3ccd2="" class="flex flex-col mt-2 w-full"><span data-v-7ee81ede=""><div data-v-7ee81ede="" class="border border-solid overflow-hidden font-medium relative flex items-center rounded-lg border-eGrey-400">
                                  <!----><div data-v-7ee81ede="" class="flex flex-1 items-center relative"><label data-v-7ee81ede="" for="suggest-friend-email" class="absolute z-10 truncate w-full pr-12 left-17px transition-special-1 duration-250 string-label label-top font-normal"> Arkadaşınızın E-Posta Adresi <span data-v-7ee81ede="" class="text-eRed-500"> * </span></label><input data-v-7ee81ede="" id="suggest-friend-email" type="text" name="E-Posta adresi" placeholder="" autocomplete="on" class="string-input leading-none relative bg-transparent px-4 outline-none text-eGrey-900 w-full mt-7 pb-3">
                                    <!---->
                                    <!---->
                                  </div>
                                </div>
                                <!---->
                                <script>
function toggleHiddenClass(targetId) {
    var targetDiv = document.getElementById(targetId);
    targetDiv.classList.toggle('hidden');
}

                                </script>
                              </span></div><div data-v-7ee81ede="" data-v-73f3ccd2="" class="flex flex-col mt-2 w-full"><span data-v-7ee81ede=""><div data-v-7ee81ede="" class="border border-solid overflow-hidden font-medium relative flex items-center rounded-lg border-eGrey-400">
                                  <!----><div data-v-7ee81ede="" class="flex flex-1 items-center relative"><label data-v-7ee81ede="" for="suggest-friend-note" class="absolute z-10 truncate w-full pr-12 left-17px transition-special-1 duration-250 string-label label-top font-normal"> Notunuz <span data-v-7ee81ede="" class="text-eRed-500"> * </span></label><textarea data-v-7ee81ede="" id="suggest-friend-note" placeholder="" rows="5" name="" class="relative resize-none bg-transparent px-4 outline-none text-eGrey-900 w-full mt-7 pb-3"></textarea>
                                    <!---->
                                    <!---->
                                  </div>
                                </div>
                                <!---->
                              </span></div><button data-v-55a91d9d="" data-v-73f3ccd2="" type="submit" aria-label="Ara" class="py-4 px-16 mt-4 text-sm outline-none focus:outline-none font-medium mt-0 transition-all duration-250 bg-eBlue md:hover:bg-eBlue-dark text-white rounded-md leading-none"><div data-v-55a91d9d="" class="w-full relative"><div data-v-55a91d9d="" class="absolute w-full flex justify-center h-7" style="display: none;"><img data-v-55a91d9d="" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiBzdHlsZT0ibWFyZ2luOiBhdXRvOyBiYWNrZ3JvdW5kOiBub25lOyBkaXNwbGF5OiBibG9jazsgc2hhcGUtcmVuZGVyaW5nOiBhdXRvOyIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCIgdmlld0JveD0iMCAwIDEwMCAxMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89InhNaWRZTWlkIj4KICA8Y2lyY2xlIGN4PSI1MCIgY3k9IjUwIiBmaWxsPSJub25lIiBzdHJva2U9IiNmZmZmZmYiIHN0cm9rZS13aWR0aD0iMTIiIHI9IjMwIiBzdHJva2UtZGFzaGFycmF5PSIxNDEuMzcxNjY5NDExNTQwNjcgNDkuMTIzODg5ODAzODQ2ODkiPgogICAgPGFuaW1hdGVUcmFuc2Zvcm0gYXR0cmlidXRlTmFtZT0idHJhbnNmb3JtIiB0eXBlPSJyb3RhdGUiIHJlcGVhdENvdW50PSJpbmRlZmluaXRlIiBkdXI9IjFzIiB2YWx1ZXM9IjAgNTAgNTA7MzYwIDUwIDUwIiBrZXlUaW1lcz0iMDsxIj48L2FuaW1hdGVUcmFuc2Zvcm0+CiAgPC9jaXJjbGU+Cjwvc3ZnPgo=" alt="loading_white"></div></div><div data-v-55a91d9d="" class="h-7 flex justify-center items-center leading-none"> Arkadaşına Öner </div></button></form></span></div></div></div></div>
              </div>
            </div>
          </div><div data-v-2f739562="" data-v-5ffd7b16="" class="w-full">
            <!----><div data-v-2f739562="" class="md:px-0 xl:px-0"><div data-v-2f739562="" class="container pt-4 md:pt-12"><div data-v-2f739562="" class="flex flex-col px-4 md:px-0 md:flex-row text-eGrey-900 justify-between pb-12"><div data-v-2f739562="" class="flex mb-4 md:mb-0 flex-col md:px-3 text-xs text-eGrey-900"><h3 data-v-2f739562="" class="font-bold text-sm mb-4"> PttAVM.com </h3><ul data-v-2f739562="" class="flex flex-row flex-wrap md:flex-col text-xs"><li data-v-2f739562="" class="w-1/2 md:w-full py-1"><a data-v-2f739562="" href="https://blog.pttavm.com/"><span data-v-2f739562="">Blog Sayfamız</span></a></li><li data-v-2f739562="" class="w-1/2 md:w-full py-1"><a data-v-2f739562="" href="/sayfa/hakkimizda.html" class=""><span data-v-2f739562="">Hakkımızda</span></a></li><li data-v-2f739562="" class="w-1/2 md:w-full py-1"><a data-v-2f739562="" href="/sayfa/guvenli-alisveris.html" class=""><span data-v-2f739562="">Güvenli E-Ticaret</span></a></li><li data-v-2f739562="" class="w-1/2 md:w-full py-1"><a data-v-2f739562="" href="/sayfa/gizlilik-politikasi.html" class=""><span data-v-2f739562="">Gizlilik Bilgileri</span></a></li><li data-v-2f739562="" class="w-1/2 md:w-full py-1"><a data-v-2f739562="" href="/sayfa/uyelik-sozlesmesi.html" class=""><span data-v-2f739562="">Üyelik Sözleşmesi</span></a></li><li data-v-2f739562="" class="w-1/2 md:w-full py-1"><a data-v-2f739562="" href="/sayfa/arac-km-sorgulama.html" class=""><span data-v-2f739562="">Araç KM Sorgulama</span></a></li><li data-v-2f739562="" class="w-1/2 md:w-full py-1"><a data-v-2f739562="" href="/magaza-liste" class=""><span data-v-2f739562="">Mağazalar</span></a></li><li data-v-2f739562="" class="w-1/2 md:w-full py-1"><a data-v-2f739562="" href="/sayfa/mtv-odeme.html" class=""><span data-v-2f739562="">MTV Ödeme</span></a></li><li data-v-2f739562="" class="w-1/2 md:w-full py-1"><a data-v-2f739562="" href="https://hgs.pttavm.com/hasar-sorgula" target="_blank" title="Hasar Sorgula"> Hasar Sorgula </a></li><li data-v-2f739562="" class="w-1/2 md:w-full py-1"><a data-v-2f739562="" href="/sayfa/trafik-cezasi-odeme.html" class=""><span data-v-2f739562="">Trafik Cezası Ödeme</span></a></li><li data-v-2f739562="" class="w-1/2 md:w-full py-1"><a data-v-2f739562="" href="/sayfa/kargomat.html" class=""><span data-v-2f739562="">Kargomat'a Teslimat</span></a></li></ul></div><div data-v-2f739562="" class="flex mb-4 md:mb-0 flex-col md:px-3 text-xs text-eGrey-900"><h3 data-v-2f739562="" class="font-bold text-sm mb-4"> Popüler Sayfalar </h3><ul data-v-2f739562="" class="flex flex-row flex-wrap md:flex-col text-xs"><li data-v-2f739562="" class="w-1/2 md:w-full py-1"><a data-v-2f739562="" href="/kozmetik-saglik" class=""> Kozmetik &amp; Sağlık </a></li><li data-v-2f739562="" class="w-1/2 md:w-full py-1"><a data-v-2f739562="" href="/supermarket" class=""> Süpermarket </a></li><li data-v-2f739562="" class="w-1/2 md:w-full py-1"><a data-v-2f739562="" href="/kampanyalar" class=""> Kampanyalar </a></li><li data-v-2f739562="" class="w-1/2 md:w-full py-1 hidden"><a data-v-2f739562="" href="/hediye" class=""> Sevgiliye Hediye </a></li><li data-v-2f739562="" class="w-1/2 md:w-full py-1"><a data-v-2f739562="" href="/arama/cep-telefonu" class=""> Cep Telefonu </a></li><li data-v-2f739562="" class="w-1/2 md:w-full py-1"><a data-v-2f739562="" href="/arama/bebek-bezi" class=""> Bebek Bezi </a></li><li data-v-2f739562="" class="w-1/2 md:w-full py-1"><a data-v-2f739562="" href="/arama/kuruyemis" class=""> Kuruyemiş </a></li><li data-v-2f739562="" class="w-1/2 md:w-full py-1"><a data-v-2f739562="" href="/arama/televizyon" class=""> Televizyon </a></li></ul></div><div data-v-2f739562="" class="flex mb-4 md:mb-0 flex-col md:px-3 text-xs text-eGrey-900"><h3 data-v-2f739562="" class="font-bold text-sm mb-4"> Yenilenmiş Ürün Kategorileri </h3><ul data-v-2f739562="" class="flex flex-row flex-wrap md:flex-col text-xs"><li data-v-2f739562="" class="w-1/2 md:w-full py-1"><a data-v-2f739562="" href="/arama/yenilenmis-ve-ikinci-el-telefon" class=""> Yenilenmiş İkinci El Telefon </a></li><li data-v-2f739562="" class="w-1/2 md:w-full py-1"><a data-v-2f739562="" href="/arama/yenilenmis-ve-ikinci-el-bilgisayar" class=""> Yenilenmiş İkinci El Bilgisayar </a></li><li data-v-2f739562="" class="w-1/2 md:w-full py-1"><a data-v-2f739562="" href="/arama/yenilenmis-ve-ikinci-el-urunler" class=""> Yenilenmiş İkinci El Teknolojik Ürünler </a></li><li data-v-2f739562="" class="w-1/2 md:w-full py-1"><a data-v-2f739562="" href="/arama/yenilenmis-ve-ikinci-el-tablet" class=""> Yenilenmiş İkinci El Tablet </a></li></ul></div><div data-v-2f739562="" class="flex mb-4 md:mb-0 flex-col md:px-3 text-xs text-eGrey-900"><h3 data-v-2f739562="" class="font-bold text-sm mb-4"> Teknoloji </h3><ul data-v-2f739562="" class="flex flex-row flex-wrap md:flex-col text-xs"><li data-v-2f739562="" class="w-1/2 md:w-full py-1"><a data-v-2f739562="" href="/arama/cep-telefonu" class=""> Cep Telefonu </a></li><li data-v-2f739562="" class="w-1/2 md:w-full py-1"><a data-v-2f739562="" href="/arama/masaustu-bilgisayar" class=""> Masaüstü Bilgisayar </a></li><li data-v-2f739562="" class="w-1/2 md:w-full py-1"><a data-v-2f739562="" href="/arama/dizustu-bilgisayar" class=""> Laptop </a></li><li data-v-2f739562="" class="w-1/2 md:w-full py-1"><a data-v-2f739562="" href="/arama/akilli-saat" class=""> Akıllı Saat </a></li><li data-v-2f739562="" class="w-1/2 md:w-full py-1"><a data-v-2f739562="" href="/arama/tablet" class=""> Tablet </a></li></ul></div><div data-v-2f739562="" class="flex mb-4 md:mb-0 flex-col md:px-3 text-xs text-eGrey-900"><h3 data-v-2f739562="" class="font-bold text-sm mb-4"> Beyaz Eşya </h3><ul data-v-2f739562="" class="flex flex-row flex-wrap md:flex-col text-xs"><li data-v-2f739562="" class="w-1/2 md:w-full py-1"><a data-v-2f739562="" href="/arama/ankastre-set" class=""> Ankastre Set </a></li><li data-v-2f739562="" class="w-1/2 md:w-full py-1"><a data-v-2f739562="" href="/arama/ocak" class=""> Ocak </a></li><li data-v-2f739562="" class="w-1/2 md:w-full py-1"><a data-v-2f739562="" href="/arama/buzdolabi" class=""> Buzdolabı </a></li><li data-v-2f739562="" class="w-1/2 md:w-full py-1"><a data-v-2f739562="" href="/arama/firin" class=""> Fırın </a></li><li data-v-2f739562="" class="w-1/2 md:w-full py-1"><a data-v-2f739562="" href="/arama/davlumbaz" class=""> Davlumbaz </a></li><li data-v-2f739562="" class="w-1/2 md:w-full py-1"><a data-v-2f739562="" href="/arama/camasir-makinesi" class=""> Çamaşır Makinesi </a></li><li data-v-2f739562="" class="w-1/2 md:w-full py-1"><a data-v-2f739562="" href="/arama/bulasik-makinesi" class=""> Bulaşık Makinesi </a></li><li data-v-2f739562="" class="w-1/2 md:w-full py-1"><a data-v-2f739562="" href="/arama/kurutma-makineleri" class=""> Kurutma Makinesi </a></li><li data-v-2f739562="" class="w-1/2 md:w-full py-1"><a data-v-2f739562="" href="/arama/derin-dondurucu" class=""> Derin Dondurucu </a></li><li data-v-2f739562="" class="w-1/2 md:w-full py-1"><a data-v-2f739562="" href="/arama/mikrodalga-firin" class=""> Mikrodalga Fırın </a></li></ul></div><div data-v-2f739562="" class="flex mb-4 md:mb-0 flex-col md:px-3 text-xs text-eGrey-900"><h3 data-v-2f739562="" class="font-bold text-sm mb-4"> Destek Hattı </h3><ul data-v-2f739562="" class="flex flex-row flex-wrap md:flex-col text-xs"><li data-v-2f739562="" class="w-1/2 md:w-full py-1"><a data-v-2f739562="" href="/sayfa/bize-ulasin.html" class=""><span data-v-2f739562="">İletişim</span></a></li><li data-v-2f739562="" class="w-1/2 md:w-full py-1"><a data-v-2f739562="" href="/sayfa/sikca-sorulan-sorular.html" class=""><span data-v-2f739562="">Sıkça Sorulan Sorular</span></a></li><li data-v-2f739562="" class="w-1/2 md:w-full py-1"><a data-v-2f739562="" href="/sayfa/urun-iade-proseduru.html" class=""><span data-v-2f739562="">Ürün İade</span></a></li><li data-v-2f739562="" class="w-1/2 md:w-full py-1"><a data-v-2f739562="" href="/sayfa/cerez-politikasi.html" class=""><span data-v-2f739562="">Çerez Politikası</span></a></li><li data-v-2f739562="" class="w-1/2 md:w-full py-1"><a data-v-2f739562="" href="/sayfa/islem-rehberi.html" class=""><span data-v-2f739562="">İşlem Rehberi</span></a></li><li data-v-2f739562="" class="w-1/2 md:w-full py-1"><a data-v-2f739562="" href="/sayfa/hediye-ceki-kullanim-kilavuzu.html" class=""><span data-v-2f739562="">Hediye Çeki Kullanım Kılavuzu</span></a></li></ul></div></div><div data-v-2f739562="" class="flex flex-col px-4 md:px-0 md:flex-row text-eGrey-900 justify-between pb-12"><div data-v-2f739562="" class="flex mb-4 md:mb-0 flex-col md:px-3"><h3 data-v-2f739562="" class="font-bold text-sm mb-4"> PttAVM Mobil Uygulamalarımız </h3><ul data-v-2f739562="" class="flex flex-row md:flex-col"><li data-v-2f739562=""><a data-v-2f739562="" href="https://apps.apple.com/tr/app/epttavm-güvenli-alışveriş/id1435788518" target="_blank" aria-label="PttAVM App Store"><img data-v-2f739562="" src="https://www.pttavm.com/assets/images/app-store.svg" alt="App Store" loading="lazy" class="w-32 md:w-auto"></a></li><li data-v-2f739562="" class="ml-2 md:ml-0 md:mt-2"><a data-v-2f739562="" href="https://play.google.com/store/apps/details?id=com.pttem.epttavm&amp;hl=tr" target="_blank" aria-label="PttAVM Google Play"><img data-v-2f739562="" src="https://www.pttavm.com/assets/images/google-play.svg" alt="Google Play" loading="lazy" class="w-32 md:w-auto"></a></li><li data-v-2f739562="" class="ml-2 md:ml-0 md:mt-2"><a data-v-2f739562="" href="https://appgallery.huawei.com/#/app/C101888929" target="_blank" aria-label="PttAVM App Gallery"><img data-v-2f739562="" src="https://www.pttavm.com/assets/images/app-gallery.svg" alt="App Gallery" loading="lazy" class="w-32 md:w-auto"></a></li></ul></div><div data-v-2f739562="" class="flex mb-4 md:mb-0 flex-col"><h3 data-v-2f739562="" class="font-bold text-sm mb-4"> HGS Mobil Uygulamalarımız </h3><ul data-v-2f739562="" class="flex flex-row md:flex-col"><li data-v-2f739562=""><a data-v-2f739562="" href="https://itunes.apple.com/app/hgs/id709602058?mt=8" target="_blank" aria-label="HGS App Store"><img data-v-2f739562="" src="https://www.pttavm.com/assets/images/app-store.svg" alt="app-store" loading="lazy" class="w-32 md:w-auto"></a></li><li data-v-2f739562="" class="ml-2 md:ml-0 md:mt-2"><a data-v-2f739562="" href="https://play.google.com/store/apps/details?id=tr.com.ulkem.hgs" target="_blank" aria-label="HGS Google Play"><img data-v-2f739562="" src="https://www.pttavm.com/assets/images/google-play.svg" alt="google-play" loading="lazy" class="w-32 md:w-auto"></a></li><li data-v-2f739562="" class="ml-2 md:ml-0 md:mt-2"><a data-v-2f739562="" href="https://appgallery.huawei.com/#/app/C101856765" target="_blank" aria-label="HGS App Gallery"><img data-v-2f739562="" src="https://www.pttavm.com/assets/images/app-gallery.svg" alt="app-gallery" loading="lazy" class="w-32 md:w-auto"></a></li></ul></div><div data-v-2f739562="" class="flex mb-4 md:mb-0 flex-col md:px-3 text-xs text-eGrey-900"><div data-v-2f739562="" class="mt-4 md:mt-0 flex flex-row items-center"><div data-v-2f739562="" id="ETBIS" class="mr-2"><div data-v-2f739562="" id="66afe711a8e348158535255678b15006"><a data-v-2f739562="" href="https://etbis.eticaret.gov.tr/sitedogrulama/66afe711a8e348158535255678b15006" aria-label="ETBİS'e Kayıtlıdır" target="_blank" title="ETBİS"><img data-v-2f739562="" src="https://www.pttavm.com/assets/images/etbis.svg" alt="Etbis Logo" loading="lazy"></a></div></div><a data-v-2f739562="" aria-label="ETBİS'e Kayıtlıdır" href="https://www.guvendamgasi.org.tr/firmadetay.php?Guid=3138ccf2-9413-11e9-a50f-48df373f4850" target="_blank" title="ETBİS" class="ml-2"><img data-v-2f739562="" src="https://cdn-fe.pttavm.com/_nuxt/img/guven-damgasi.caec19a.svg" alt="Güven Damgası" loading="lazy"></a></div></div><div data-v-2f739562="" class="flex mb-4 md:mb-0 flex-col md:px-3"><h3 data-v-2f739562="" class="font-bold text-sm mb-4"> Bizi Takip Edin </h3><ul data-v-2f739562="" class="flex flex-row text-2xl"><li data-v-2f739562="" class="mr-2 flex items-center"><a data-v-2f739562="" href="https://www.facebook.com/pttavm" target="_blank" aria-label="Facebook"><img data-v-2f739562="" src="https://www.pttavm.com/assets/images/socials/facebook.svg" alt="facebook" loading="lazy" class="h-4"></a></li><li data-v-2f739562="" class="mr-2 flex items-center"><a data-v-2f739562="" href="https://www.twitter.com/epttavm" target="_blank" aria-label="Twitter"><img data-v-2f739562="" src="https://www.pttavm.com/assets/images/socials/twitter.svg" alt="twitter" loading="lazy" class="h-4"></a></li><li data-v-2f739562="" class="mr-2 flex items-center"><a data-v-2f739562="" href="https://www.instagram.com/pttavm" target="_blank" aria-label="Instagram"><img data-v-2f739562="" src="https://www.pttavm.com/assets/images/socials/instagram.svg" alt="instagram" loading="lazy" class="h-4"></a></li><li data-v-2f739562="" class="mr-2 flex items-center"><a data-v-2f739562="" href="https://www.linkedin.com/company/epttavm" target="_blank" aria-label="Linkedin"><img data-v-2f739562="" src="https://www.pttavm.com/assets/images/socials/linkedin.svg" alt="linkedin" loading="lazy" class="h-4"></a></li><li data-v-2f739562="" class="mr-2 flex items-center"><a data-v-2f739562="" href="https://www.youtube.com/user/epttavm" target="_blank" aria-label="YouTube"><img data-v-2f739562="" src="https://www.pttavm.com/assets/images/socials/youtube.svg" alt="youtube" loading="lazy" class="h-4"></a></li><li data-v-2f739562="" class="mr-2 flex items-center"><a data-v-2f739562="" href="https://www.vimeo.com/epttavm" target="_blank" aria-label="Vimeo"><img data-v-2f739562="" src="https://www.pttavm.com/assets/images/socials/vimeo.svg" alt="vimeo" loading="lazy" class="h-4"></a></li></ul></div></div></div><div data-v-2f739562="" class="w-full hidden md:flex flex-row items-center justify-center py-2 border-b border-t border-eGrey-200"><div data-v-2f739562="" title="HGS"><img data-v-2f739562="" src="https://www.pttavm.com/assets/images/footer/footer-hgs.png?fm=webp" alt="HGS" loading="lazy" class="h-20 px-8"></div><div data-v-2f739562="" title="PTT Filateli"><img data-v-2f739562="" src="https://www.pttavm.com/assets/images/footer/footer-ptt-filateli.png?fm=webp" alt="PTT Filateli" loading="lazy" class="h-20 px-8"></div><div data-v-2f739562="" title="PTT Kep"><img data-v-2f739562="" src="https://www.pttavm.com/assets/images/footer/footer-ptt-kep.png?fm=webp" alt="PTT Kep" loading="lazy" class="h-20 px-8"></div><div data-v-2f739562="" title="Turpex"><img data-v-2f739562="" src="https://www.pttavm.com/assets/images/footer/footer-turpex.png?fm=webp" alt="Turpex" loading="lazy" class="h-20 px-8"></div><div data-v-2f739562="" title="PTT Pul Müzesi"><img data-v-2f739562="" src="https://www.pttavm.com/assets/images/footer/footer-ptt-pul-muzesi.png?fm=webp" alt="PTT Pul Müzesi" loading="lazy" class="h-20 px-8"></div><div data-v-2f739562="" title="PTTcell"><img data-v-2f739562="" src="https://www.pttavm.com/assets/images/footer/footer-ptt-cell.png?fm=webp" alt="PTTcell" loading="lazy" class="h-20 px-8"></div><div data-v-2f739562="" title="PTT Sigorta"><img data-v-2f739562="" src="https://www.pttavm.com/assets/images/footer/footer-ptt-sigorta.png?fm=webp" alt="PTT Sigorta" loading="lazy" class="h-20 px-8"></div></div><div data-v-2f739562="" class="bg-eGrey-footer text-white flex flex-row justify-between py-4 text-xsi sm:w-full"><div data-v-2f739562="" class="container mx-auto flex flex-col md:flex-row md:justify-between px-2 md:px-0"><div data-v-2f739562="" class="flex flex-row items-center"><img data-v-2f739562="" src="https://www.pttavm.com/assets/images/footer-ptt-logo.png?fm=webp" alt="Ptt Logo" loading="lazy" class="mr-2"><span data-v-2f739562="">© 2024 Ptt A.Ş. Genel Müdürlüğü - Tüm hakları saklıdır. <a data-v-2f739562="" target="_blank" href="https://www.pttem.com/">PtteM Teknoloji ve Elektronik Hizmetleri A.Ş.</a> tarafından geliştirilmiştir.</span></div><div data-v-2f739562="" class="flex flex-row items-center mt-4 mb-2 md:mt-0"><img data-v-2f739562="" src="https://www.pttavm.com/assets/images/visa-new.jpg?fm=webp" alt="Visa" loading="lazy" class="ml-1"><img data-v-2f739562="" src="https://www.pttavm.com/assets/images/mastercard.jpg?fm=webp" alt="Mastercard" loading="lazy" class="ml-1"><img data-v-2f739562="" src="https://www.pttavm.com/assets/images/troy-logo.png?fm=webp" alt="Troy" loading="lazy" class="ml-1"><img data-v-2f739562="" src="https://www.pttavm.com/assets/images/etidlogo.png?fm=webp" alt="Etid" loading="lazy" class="ml-1"></div></div></div></div>
            <!----><div data-v-2f739562="" class="tracking-codes hidden"></div><div data-v-2f739562="" class="hidden eBlue-colors border-eBlue-50 border-eBlue-100 border-eBlue-200 border-eBlue-300 border-eBlue-400 border-eBlue-500 border-eBlue-600 border-eBlue-700 border-eBlue-800 border-eBlue-900 bg-eBlue-40 bg-eBlue-40-dark bg-eBlue-50 bg-eBlue-100 bg-eBlue-200 bg-eBlue-300 border-eBlue-400 bg-eBlue-500 bg-eBlue-600 bg-eBlue-700 bg-eBlue-800 bg-eBlue-900 text-eBlue-50 text-eBlue-100 text-eBlue-200 text-eBlue-300 text-eBlue-400 text-eBlue-500 text-eBlue-600 text-eBlue-700 text-eBlue-800 text-eBlue-900"></div><div data-v-2f739562="" class="hidden eGreen-colors border-eGreen-750 text-eGreen-750 bg-eGreen-750 bg-eDarkBlue-900 grid-cols-1 grid-cols-2 grid-cols-3 grid-cols-4 grid-cols-5 grid-cols-6 lg:grid-cols-1 lg:grid-cols-2 lg:grid-cols-3 lg:grid-cols-4 lg:grid-cols-5 lg:grid-cols-6 gap-1 gap-2 gap-3 gap-4 gap-5 gap-6 gap-7 gap-8 gap-9 gap-10 bg-eGreen-275 text-eCyan-500 bg-eCyan-75 bg-eCyan-200 border-eCyan-500"></div>
          </div><div data-v-2b55f664="" data-v-5ffd7b16="" class="main-user overflow-y-auto text-eGrey-900"><div data-v-2b55f664="" class="p-4 px-6 flex flex-row justify-between items-center"><div data-v-2b55f664=""><h3 data-v-2b55f664="" class="text-2xl font-semibold"> Giriş Yap </h3></div><button data-v-2b55f664="" aria-label="Kapat" class="text-xl outline-none focus:outline-none"><i data-v-2b55f664="" class="eptticon-close"></i></button></div><div data-v-2b55f664="" class="px-6 user-login"><div data-v-7b0cf81b="" data-v-2b55f664="" class="all-block flex-col"><span data-v-7b0cf81b=""><form data-v-7b0cf81b=""><div data-v-7b0cf81b=""><div data-v-7ee81ede="" data-v-7b0cf81b="" class="flex flex-col"><span data-v-7ee81ede=""><div data-v-7ee81ede="" class="border border-solid overflow-hidden font-medium relative flex items-center rounded-lg border-eGrey-400">
                            <!----><div data-v-7ee81ede="" class="flex flex-1 items-center relative"><label data-v-7ee81ede="" for="login-email" class="absolute z-10 truncate w-full pr-12 left-17px transition-special-1 duration-250 string-label label-top font-normal"> E-Posta <span data-v-7ee81ede="" class="text-eRed-500"> * </span></label><input data-v-7ee81ede="" id="login-email" type="text" name="email" placeholder="" autocomplete="on" class="string-input leading-none relative bg-transparent px-4 outline-none text-eGrey-900 w-full mt-7 pb-3">
                              <!---->
                              <!---->
                            </div>
                          </div>
                          <!---->
                        </span></div></div><div data-v-7b0cf81b="" class="mt-4"><div data-v-7ee81ede="" data-v-7b0cf81b="" class="flex flex-col"><span data-v-7ee81ede=""><div data-v-7ee81ede="" class="border border-solid overflow-hidden font-medium relative flex items-center rounded-lg border-eGrey-400">
                            <!----><div data-v-7ee81ede="" class="flex flex-1 items-center relative"><label data-v-7ee81ede="" for="login-password" class="absolute z-10 truncate w-full pr-12 left-17px transition-special-1 duration-250 string-label label-top font-normal"> Şifre <span data-v-7ee81ede="" class="text-eRed-500"> * </span></label><input data-v-7ee81ede="" id="login-password" type="password" name="password" placeholder="" autocomplete="on" class="string-input leading-none relative bg-transparent px-4 outline-none text-eGrey-900 w-full mt-7 pb-3"><div data-v-7ee81ede="" class="absolute cursor-pointer hover:text-eBlue right-0 mr-4"><span data-v-7ee81ede=""><span data-v-7ee81ede="" class="evoicon-eye-blocked"></span></span></div>
                              <!---->
                            </div>
                          </div>
                          <!---->
                        </span></div></div><div data-v-7b0cf81b="" class="flex justify-end mt-4"><button data-v-7b0cf81b="" type="button" class="font-medium text-xs user-login hover:underline focus:outline-none"> Şifremi Unuttum </button></div>
                    <!----><div data-v-7b0cf81b="" class="mt-4"><button data-v-55a91d9d="" data-v-7b0cf81b="" type="submit" aria-label="Ara" class="py-4 w-full px-4 text-base hover:shadow-lg transition-all duration-100 outline-none focus:outline-none font-medium mt-0 transition-all duration-250 bg-eBlue md:hover:bg-eBlue-dark text-white rounded-lg leading-none"><div data-v-55a91d9d="" class="w-full relative"><div data-v-55a91d9d="" class="absolute w-full flex justify-center h-7" style="display: none;"><img data-v-55a91d9d="" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiBzdHlsZT0ibWFyZ2luOiBhdXRvOyBiYWNrZ3JvdW5kOiBub25lOyBkaXNwbGF5OiBibG9jazsgc2hhcGUtcmVuZGVyaW5nOiBhdXRvOyIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCIgdmlld0JveD0iMCAwIDEwMCAxMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89InhNaWRZTWlkIj4KICA8Y2lyY2xlIGN4PSI1MCIgY3k9IjUwIiBmaWxsPSJub25lIiBzdHJva2U9IiNmZmZmZmYiIHN0cm9rZS13aWR0aD0iMTIiIHI9IjMwIiBzdHJva2UtZGFzaGFycmF5PSIxNDEuMzcxNjY5NDExNTQwNjcgNDkuMTIzODg5ODAzODQ2ODkiPgogICAgPGFuaW1hdGVUcmFuc2Zvcm0gYXR0cmlidXRlTmFtZT0idHJhbnNmb3JtIiB0eXBlPSJyb3RhdGUiIHJlcGVhdENvdW50PSJpbmRlZmluaXRlIiBkdXI9IjFzIiB2YWx1ZXM9IjAgNTAgNTA7MzYwIDUwIDUwIiBrZXlUaW1lcz0iMDsxIj48L2FuaW1hdGVUcmFuc2Zvcm0+CiAgPC9jaXJjbGU+Cjwvc3ZnPgo=" alt="loading_white"></div></div><div data-v-55a91d9d="" class="h-7 flex justify-center items-center leading-none"> Giriş Yap </div></button></div>
                  </form></span><div data-v-7b0cf81b="" class="flex mt-4"><a data-v-7b0cf81b="" href="/uye-ol" class="w-full"><button data-v-55a91d9d="" data-v-7b0cf81b="" type="button" aria-label="Ara" class="w-full py-4 px-4 text-base hover:shadow-lg transition-all duration-100 outline-none focus:outline-none font-medium mt-0 transition-all duration-250 border-1 border-eGrey-400 bg-white md:hover:bg-white-dark text-eGrey-900 rounded-lg leading-none"><div data-v-55a91d9d="" class="w-full relative"><div data-v-55a91d9d="" class="absolute w-full flex justify-center h-7" style="display: none;"><img data-v-55a91d9d="" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiBzdHlsZT0ibWFyZ2luOiBhdXRvOyBiYWNrZ3JvdW5kOiBub25lOyBkaXNwbGF5OiBibG9jazsgc2hhcGUtcmVuZGVyaW5nOiBhdXRvOyIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCIgdmlld0JveD0iMCAwIDEwMCAxMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89InhNaWRZTWlkIj4KICA8Y2lyY2xlIGN4PSI1MCIgY3k9IjUwIiBmaWxsPSJub25lIiBzdHJva2U9IiMwMEE2Q0UiIHN0cm9rZS13aWR0aD0iMTIiIHI9IjMwIiBzdHJva2UtZGFzaGFycmF5PSIxNDEuMzcxNjY5NDExNTQwNjcgNDkuMTIzODg5ODAzODQ2ODkiPgogICAgPGFuaW1hdGVUcmFuc2Zvcm0gYXR0cmlidXRlTmFtZT0idHJhbnNmb3JtIiB0eXBlPSJyb3RhdGUiIHJlcGVhdENvdW50PSJpbmRlZmluaXRlIiBkdXI9IjFzIiB2YWx1ZXM9IjAgNTAgNTA7MzYwIDUwIDUwIiBrZXlUaW1lcz0iMDsxIj48L2FuaW1hdGVUcmFuc2Zvcm0+CiAgPC9jaXJjbGU+Cjwvc3ZnPgo=" alt="loading_blue"></div></div><div data-v-55a91d9d="" class="h-7 flex justify-center items-center leading-none"> Üye Ol </div></button></a></div><h2 data-v-7b0cf81b="" class="text-center text-sm mt-4 font-semibold">Sosyal Hesaplarınla Giriş Yap / Üye Ol</h2><div data-v-7b0cf81b="" class="flex flex-row justify-between mt-4"><button data-v-656bb070="" data-v-7b0cf81b="" type="button" name="button" class="rounded-lg facebook-box text-white justify-center focus:outline-none flex items-center flex-row py-3 w-full px-4 text-base hover:shadow-lg transition-all duration-100 mr-1"><span data-v-656bb070="">Facebook</span></button><div data-v-83843dc0="" data-v-7b0cf81b="" class="flex w-full relative"><button data-v-83843dc0="" id="google-signin-btn-3" class="ml-1 rounded-lg google-box text-white justify-center focus:outline-none flex items-center flex-row py-3 w-full px-4 text-base hover:shadow-lg transition-all duration-100"><span data-v-83843dc0="">Google</span></button>
                    <!---->
                  </div></div></div></div></div>
        </div>
      </div>
    </div>
    <link href="https://cdn-fe.pttavm.com/_nuxt/css/a9dce2d.css" rel="stylesheet" type="text/css">
    <link href="https://cdn-fe.pttavm.com/_nuxt/css/a25dfbc.css" rel="stylesheet" type="text/css">
    <link href="https://cdn-fe.pttavm.com/_nuxt/css/b0edd70.css" rel="stylesheet" type="text/css"><div id="modals-container"></div>
    <link href="https://cdn-fe.pttavm.com/_nuxt/css/e5b3576.css" rel="stylesheet" type="text/css">
    <link href="https://cdn-fe.pttavm.com/_nuxt/css/5a448cc.css" rel="stylesheet" type="text/css">
    <link href="https://cdn-fe.pttavm.com/_nuxt/css/022be3b.css" rel="stylesheet" type="text/css">
    <link href="https://cdn-fe.pttavm.com/_nuxt/css/0dcbcb5.css" rel="stylesheet" type="text/css">
    <link href="https://cdn-fe.pttavm.com/_nuxt/css/0dcbcb5.css" rel="stylesheet" type="text/css">
    <link href="https://cdn-fe.pttavm.com/_nuxt/css/826ebaf.css" rel="stylesheet" type="text/css">
    <link href="https://cdn-fe.pttavm.com/_nuxt/css/89404d3.css" rel="stylesheet" type="text/css">
    <link href="https://cdn-fe.pttavm.com/_nuxt/css/07347c2.css" rel="stylesheet" type="text/css">
    <link href="https://cdn-fe.pttavm.com/_nuxt/css/5a10128.css" rel="stylesheet" type="text/css"><deepl-input-controller></deepl-input-controller>
    <link href="https://cdn-fe.pttavm.com/_nuxt/css/0dcbcb5.css" rel="stylesheet" type="text/css">
    <link href="https://cdn-fe.pttavm.com/_nuxt/css/b8c46be.css" rel="stylesheet" type="text/css">
    <link href="https://cdn-fe.pttavm.com/_nuxt/css/3f91190.css" rel="stylesheet" type="text/css">
    <link href="https://cdn-fe.pttavm.com/_nuxt/css/593b3ae.css" rel="stylesheet" type="text/css">
    <link href="https://cdn-fe.pttavm.com/_nuxt/css/c4cf815.css" rel="stylesheet" type="text/css">
    <link href="https://cdn-fe.pttavm.com/_nuxt/css/6346062.css" rel="stylesheet" type="text/css">
    <link href="https://cdn-fe.pttavm.com/_nuxt/css/73ddc33.css" rel="stylesheet" type="text/css">
    <link href="https://cdn-fe.pttavm.com/_nuxt/css/e4725f1.css" rel="stylesheet" type="text/css"><iframe id="insider-worker" src="https://epttavm.api.useinsider.com/worker-new.html" style="display: none;"></iframe>
    <link href="https://cdn-fe.pttavm.com/_nuxt/css/d8ce515.css" rel="stylesheet" type="text/css">
    <link href="https://cdn-fe.pttavm.com/_nuxt/css/dc8d7da.css" rel="stylesheet" type="text/css"><iframe id="ssIFrame_google" sandbox="allow-scripts allow-same-origin allow-storage-access-by-user-activation" aria-hidden="true" frame-border="0" style="position: absolute; width: 1px; height: 1px; inset: -9999px; display: none;" src="https://accounts.google.com/o/oauth2/iframe#origin=https%3A%2F%2Fwww.pttavm.com&amp;rpcToken=254378904.30981436&amp;clearCache=1"></iframe>
    <link href="https://cdn-fe.pttavm.com/_nuxt/css/b49702e.css" rel="stylesheet" type="text/css"><div style="display: none; visibility: hidden;"></div>
    <link href="https://cdn-fe.pttavm.com/_nuxt/css/a188b69.css" rel="stylesheet" type="text/css">


<script>window.__NUXT__=(function(a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z,_,$,aa,ab,ac,ad,ae,af,ag,ah,ai,aj,ak,al,am,an,ao,ap,aq,ar,as,at,au,av,aw,ax,ay,az,aA,aB,aC,aD,aE,aF,aG,aH,aI,aJ,aK,aL,aM,aN,aO,aP,aQ,aR,aS,aT,aU,aV,aW,aX,aY,aZ,a_,a$,ba,bb,bc,bd,be,bf,bg,bh,bi,bj,bk,bl,bm,bn,bo,bp,bq,br,bs,bt,bu,bv,bw,bx,by,bz,bA,bB,bC,bD,bE,bF,bG,bH,bI,bJ,bK,bL,bM,bN,bO,bP,bQ,bR,bS,bT,bU,bV,bW,bX,bY,bZ,b_,b$,ca,cb,cc,cd,ce,cf,cg,ch,ci,cj,ck,cl,cm,cn,co,cp,cq,cr,cs,ct,cu,cv,cw,cx,cy,cz,cA,cB,cC,cD,cE,cF,cG,cH,cI,cJ,cK,cL,cM,cN,cO,cP,cQ,cR,cS,cT,cU,cV,cW,cX,cY,cZ,c_,c$,da,db,dc,dd,de,df,dg,dh,di,dj,dk,dl,dm,dn,do0,dp,dq,dr,ds,dt,du,dv,dw,dx,dy,dz,dA,dB,dC,dD,dE,dF,dG,dH,dI,dJ,dK,dL,dM,dN,dO,dP,dQ,dR,dS,dT,dU,dV,dW,dX,dY,dZ,d_,d$,ea,eb,ec,ed,ee,ef,eg,eh,ei,ej,ek,el,em,en,eo,ep,eq,er,es,et,eu,ev,ew,ex,ey,ez,eA,eB,eC,eD,eE,eF,eG,eH,eI,eJ,eK,eL,eM,eN,eO,eP,eQ,eR,eS,eT,eU,eV,eW,eX,eY,eZ,e_,e$,fa,fb,fc,fd,fe,ff,fg,fh,fi,fj,fk,fl,fm,fn,fo,fp,fq,fr,fs,ft,fu,fv,fw,fx,fy,fz,fA,fB,fC,fD,fE,fF,fG,fH,fI,fJ,fK,fL,fM,fN,fO,fP,fQ,fR,fS,fT,fU,fV,fW,fX,fY,fZ,f_,f$,ga,gb,gc,gd,ge,gf,gg,gh,gi,gj,gk,gl,gm,gn,go,gp,gq,gr,gs,gt,gu,gv,gw,gx,gy,gz,gA,gB,gC,gD,gE,gF,gG,gH,gI,gJ,gK,gL,gM,gN,gO,gP,gQ,gR,gS,gT,gU,gV,gW,gX,gY,gZ,g_,g$,ha,hb,hc,hd,he,hf,hg,hh,hi,hj,hk,hl,hm,hn,ho,hp,hq,hr,hs,ht,hu,hv,hw,hx,hy,hz,hA,hB,hC,hD,hE,hF,hG,hH,hI,hJ,hK,hL,hM,hN,hO,hP,hQ,hR,hS,hT,hU,hV,hW,hX,hY,hZ,h_,h$,ia,ib,ic,id,ie,if0,ig,ih,ii,ij,ik,il,im,in0,io,ip,iq,ir,is,it,iu,iv,iw,ix,iy,iz,iA,iB,iC,iD,iE,iF,iG,iH,iI,iJ,iK,iL,iM,iN,iO,iP,iQ,iR,iS,iT,iU,iV,iW,iX,iY,iZ,i_,i$,ja,jb,jc,jd,je,jf,jg,jh,ji,jj,jk,jl,jm,jn,jo,jp,jq,jr,js,jt,ju,jv,jw,jx,jy,jz,jA,jB,jC,jD,jE,jF,jG,jH,jI,jJ,jK,jL,jM,jN,jO,jP,jQ,jR,jS,jT,jU,jV,jW,jX,jY,jZ,j_,j$,ka,kb,kc,kd,ke,kf,kg,kh,ki,kj,kk,kl,km,kn,ko,kp,kq,kr,ks,kt,ku,kv,kw,kx,ky,kz,kA,kB,kC,kD,kE,kF,kG,kH,kI,kJ,kK,kL,kM,kN,kO,kP,kQ,kR,kS,kT,kU,kV,kW,kX,kY,kZ,k_,k$,la,lb,lc,ld,le,lf,lg,lh,li,lj,lk,ll,lm,ln,lo,lp,lq,lr,ls,lt,lu,lv,lw,lx,ly,lz,lA,lB,lC,lD,lE,lF,lG,lH,lI,lJ,lK,lL,lM,lN,lO,lP,lQ,lR,lS,lT,lU,lV,lW,lX,lY,lZ,l_,l$,ma,mb,mc,md,me,mf,mg,mh,mi,mj,mk,ml,mm,mn,mo,mp,mq,mr,ms,mt,mu,mv,mw,mx,my,mz,mA,mB,mC,mD,mE,mF,mG,mH,mI,mJ,mK,mL,mM,mN,mO,mP,mQ,mR,mS,mT,mU,mV,mW,mX,mY,mZ,m_,m$,na,nb,nc,nd,ne,nf,ng,nh,ni,nj,nk,nl,nm,nn,no,np,nq,nr,ns,nt,nu,nv,nw,nx,ny,nz,nA,nB,nC,nD,nE,nF,nG,nH,nI,nJ,nK,nL,nM,nN,nO,nP,nQ,nR,nS,nT,nU,nV,nW,nX,nY,nZ,n_,n$,oa,ob,oc,od,oe,of,og,oh,oi,oj,ok,ol,om,on,oo,op,oq,or,os,ot,ou,ov,ow,ox,oy,oz,oA,oB,oC,oD,oE,oF,oG,oH,oI,oJ,oK,oL,oM,oN,oO,oP,oQ,oR,oS,oT,oU,oV,oW,oX,oY,oZ,o_,o$,pa,pb,pc,pd,pe,pf,pg,ph,pi,pj,pk,pl,pm,pn,po,pp,pq,pr,ps,pt,pu,pv,pw,px,py,pz,pA,pB,pC,pD,pE,pF,pG,pH,pI,pJ,pK,pL,pM,pN,pO,pP,pQ,pR,pS,pT,pU,pV,pW,pX,pY,pZ,p_,p$,qa,qb,qc,qd,qe,qf,qg,qh,qi,qj,qk,ql,qm,qn,qo,qp,qq,qr,qs,qt,qu,qv,qw,qx,qy,qz,qA,qB,qC,qD,qE,qF,qG,qH,qI,qJ,qK,qL,qM,qN,qO,qP,qQ,qR,qS,qT,qU,qV,qW,qX,qY,qZ,q_,q$,ra,rb,rc,rd,re,rf,rg,rh,ri,rj,rk,rl,rm,rn,ro,rp,rq,rr,rs,rt,ru,rv,rw,rx,ry,rz,rA,rB,rC,rD,rE,rF,rG,rH,rI,rJ,rK,rL,rM,rN,rO,rP,rQ,rR,rS,rT,rU,rV,rW,rX,rY,rZ,r_,r$,sa,sb,sc,sd,se,sf,sg,sh,si,sj,sk,sl,sm,sn,so,sp,sq,sr,ss,st,su,sv,sw,sx,sy,sz,sA,sB,sC,sD,sE,sF,sG,sH,sI,sJ,sK,sL,sM,sN,sO,sP,sQ,sR,sS,sT,sU,sV,sW,sX,sY,sZ,s_,s$,ta,tb,tc,td,te,tf,tg,th,ti,tj,tk,tl,tm,tn,to,tp,tq,tr,ts,tt,tu,tv,tw,tx,ty,tz,tA,tB,tC,tD,tE,tF,tG,tH,tI,tJ,tK,tL,tM,tN,tO,tP,tQ,tR,tS,tT,tU,tV,tW,tX,tY,tZ,t_,t$,ua,ub,uc,ud,ue,uf,ug,uh,ui,uj,uk,ul,um,un,uo,up,uq,ur,us,ut,uu,uv,uw,ux,uy,uz,uA,uB,uC,uD,uE,uF,uG,uH,uI,uJ,uK,uL,uM,uN,uO,uP,uQ,uR,uS,uT,uU,uV,uW,uX,uY,uZ,u_,u$,va,vb,vc,vd,ve,vf,vg,vh,vi,vj,vk,vl,vm,vn,vo,vp,vq,vr,vs,vt,vu,vv,vw,vx,vy,vz,vA,vB,vC,vD,vE,vF,vG,vH,vI,vJ,vK,vL,vM,vN,vO,vP,vQ,vR,vS,vT,vU,vV,vW,vX,vY,vZ,v_,v$,wa,wb,wc,wd,we,wf,wg,wh,wi,wj,wk,wl,wm,wn,wo,wp,wq,wr,ws,wt,wu,wv,ww,wx,wy,wz,wA,wB,wC,wD,wE,wF,wG,wH,wI,wJ,wK,wL,wM,wN,wO,wP,wQ,wR,wS,wT,wU,wV,wW,wX,wY,wZ,w_,w$,xa,xb,xc,xd,xe,xf,xg,xh,xi,xj,xk,xl,xm,xn,xo,xp,xq,xr,xs,xt,xu,xv,xw,xx,xy,xz,xA,xB,xC,xD,xE,xF,xG,xH,xI,xJ,xK,xL,xM,xN,xO,xP,xQ,xR,xS,xT,xU,xV,xW,xX,xY,xZ,x_,x$,ya,yb,yc,yd,ye,yf,yg,yh,yi,yj,yk,yl,ym,yn,yo,yp,yq,yr,ys,yt,yu,yv,yw,yx,yy,yz,yA,yB,yC,yD,yE,yF,yG,yH,yI,yJ,yK,yL,yM,yN,yO,yP,yQ,yR,yS,yT,yU,yV,yW,yX,yY,yZ,y_,y$,za,zb,zc,zd,ze,zf,zg,zh,zi,zj,zk,zl,zm,zn,zo,zp,zq,zr,zs,zt,zu,zv,zw,zx,zy,zz,zA,zB,zC,zD,zE,zF,zG,zH,zI,zJ,zK,zL,zM,zN,zO,zP,zQ,zR,zS,zT,zU,zV,zW,zX,zY,zZ,z_,z$,Aa,Ab,Ac,Ad,Ae,Af,Ag,Ah,Ai,Aj,Ak,Al,Am,An,Ao,Ap,Aq,Ar,As,At,Au,Av,Aw,Ax,Ay,Az,AA,AB,AC,AD,AE,AF,AG,AH,AI,AJ,AK,AL,AM,AN,AO,AP,AQ,AR,AS,AT,AU,AV,AW,AX,AY,AZ,A_,A$,Ba,Bb,Bc,Bd,Be,Bf,Bg,Bh,Bi,Bj,Bk,Bl,Bm,Bn,Bo,Bp,Bq,Br,Bs,Bt,Bu,Bv,Bw,Bx,By,Bz,BA,BB,BC,BD,BE,BF,BG,BH,BI,BJ,BK,BL,BM,BN,BO,BP,BQ,BR,BS,BT,BU,BV,BW,BX,BY,BZ,B_,B$,Ca,Cb,Cc,Cd,Ce,Cf,Cg,Ch,Ci,Cj,Ck,Cl,Cm,Cn,Co,Cp,Cq,Cr,Cs,Ct,Cu,Cv,Cw,Cx,Cy,Cz,CA,CB,CC,CD,CE,CF,CG,CH,CI,CJ,CK,CL,CM,CN,CO,CP,CQ,CR,CS,CT,CU,CV,CW,CX,CY,CZ,C_,C$,Da,Db,Dc,Dd,De,Df,Dg,Dh,Di,Dj,Dk,Dl,Dm,Dn,Do,Dp,Dq,Dr,Ds,Dt,Du,Dv,Dw,Dx,Dy,Dz,DA,DB,DC,DD,DE,DF,DG,DH,DI,DJ,DK,DL,DM,DN,DO,DP,DQ,DR,DS,DT,DU,DV,DW,DX,DY,DZ,D_,D$,Ea,Eb,Ec,Ed,Ee,Ef,Eg,Eh,Ei,Ej,Ek,El,Em,En,Eo,Ep,Eq,Er,Es,Et,Eu,Ev,Ew,Ex,Ey,Ez,EA,EB,EC,ED,EE,EF,EG,EH,EI,EJ,EK,EL,EM,EN,EO,EP,EQ,ER,ES,ET,EU,EV,EW,EX,EY,EZ,E_,E$,Fa,Fb,Fc,Fd,Fe,Ff,Fg,Fh,Fi,Fj,Fk,Fl,Fm,Fn,Fo,Fp,Fq,Fr,Fs,Ft,Fu,Fv,Fw,Fx,Fy,Fz,FA,FB,FC,FD,FE,FF,FG,FH,FI,FJ,FK,FL,FM,FN,FO,FP,FQ,FR,FS,FT,FU,FV,FW,FX,FY,FZ,F_,F$,Ga,Gb,Gc,Gd,Ge,Gf,Gg,Gh,Gi,Gj,Gk,Gl,Gm,Gn,Go,Gp,Gq,Gr,Gs,Gt,Gu,Gv,Gw,Gx,Gy,Gz,GA,GB,GC,GD,GE,GF,GG,GH,GI,GJ,GK,GL,GM,GN,GO,GP,GQ,GR,GS,GT,GU,GV,GW,GX,GY,GZ,G_,G$,Ha,Hb,Hc,Hd,He,Hf,Hg,Hh,Hi,Hj,Hk,Hl,Hm,Hn,Ho,Hp,Hq,Hr,Hs,Ht,Hu,Hv,Hw,Hx,Hy,Hz,HA,HB,HC,HD,HE,HF,HG,HH,HI,HJ,HK,HL,HM,HN,HO,HP,HQ,HR,HS,HT,HU,HV,HW,HX,HY,HZ,H_,H$,Ia,Ib,Ic,Id,Ie,If,Ig,Ih,Ii,Ij,Ik,Il,Im,In,Io,Ip,Iq,Ir,Is,It,Iu,Iv,Iw,Ix,Iy,Iz,IA,IB,IC,ID,IE,IF,IG,IH,II,IJ,IK,IL,IM,IN,IO,IP,IQ,IR,IS,IT,IU,IV,IW,IX,IY,IZ,I_,I$,Ja,Jb,Jc,Jd,Je,Jf,Jg,Jh,Ji,Jj,Jk,Jl,Jm,Jn,Jo,Jp,Jq,Jr,Js,Jt,Ju,Jv,Jw,Jx,Jy,Jz,JA,JB,JC,JD,JE,JF,JG,JH,JI,JJ,JK,JL,JM,JN,JO,JP,JQ,JR,JS,JT,JU,JV,JW,JX,JY,JZ,J_,J$,Ka,Kb,Kc,Kd,Ke,Kf,Kg,Kh,Ki,Kj,Kk,Kl,Km,Kn,Ko,Kp,Kq,Kr,Ks,Kt,Ku,Kv,Kw,Kx,Ky,Kz,KA,KB,KC,KD,KE,KF,KG,KH,KI,KJ,KK,KL,KM,KN,KO,KP,KQ,KR,KS,KT,KU,KV,KW,KX,KY,KZ,K_,K$,La,Lb,Lc,Ld,Le,Lf,Lg,Lh,Li,Lj,Lk,Ll,Lm,Ln,Lo,Lp,Lq,Lr,Ls,Lt,Lu,Lv,Lw,Lx,Ly,Lz,LA,LB,LC,LD,LE,LF,LG,LH,LI,LJ,LK,LL,LM,LN,LO,LP,LQ,LR,LS,LT,LU,LV,LW,LX,LY,LZ,L_,L$,Ma,Mb,Mc,Md,Me,Mf,Mg,Mh,Mi,Mj,Mk,Ml,Mm,Mn,Mo,Mp,Mq,Mr,Ms,Mt,Mu,Mv,Mw,Mx,My,Mz,MA,MB,MC,MD,ME,MF,MG,MH,MI,MJ,MK,ML,MM,MN,MO,MP,MQ,MR,MS,MT,MU,MV,MW,MX,MY,MZ,M_,M$,Na,Nb,Nc,Nd,Ne,Nf,Ng,Nh,Ni,Nj,Nk,Nl,Nm,Nn,No,Np,Nq,Nr,Ns,Nt,Nu,Nv,Nw,Nx,Ny,Nz,NA,NB,NC,ND,NE,NF,NG,NH,NI,NJ,NK,NL,NM,NN,NO,NP,NQ,NR,NS,NT,NU,NV,NW,NX,NY,NZ,N_,N$,Oa,Ob,Oc,Od,Oe,Of,Og,Oh,Oi,Oj,Ok,Ol,Om,On,Oo,Op,Oq,Or,Os,Ot,Ou,Ov,Ow,Ox,Oy,Oz,OA,OB,OC,OD,OE,OF,OG,OH,OI,OJ,OK,OL,OM,ON,OO,OP,OQ,OR,OS,OT,OU,OV,OW,OX,OY,OZ,O_,O$,Pa,Pb,Pc,Pd,Pe,Pf,Pg,Ph,Pi,Pj,Pk,Pl,Pm,Pn,Po,Pp,Pq,Pr,Ps,Pt,Pu,Pv,Pw,Px,Py,Pz,PA,PB,PC,PD,PE,PF,PG,PH,PI,PJ,PK,PL,PM,PN,PO,PP,PQ,PR,PS,PT,PU,PV,PW,PX,PY,PZ,P_,P$,Qa,Qb,Qc,Qd,Qe,Qf,Qg,Qh,Qi,Qj,Qk,Ql,Qm,Qn,Qo,Qp,Qq,Qr,Qs,Qt,Qu,Qv,Qw,Qx,Qy,Qz,QA,QB,QC,QD,QE,QF,QG,QH,QI,QJ,QK,QL,QM,QN,QO,QP,QQ,QR,QS,QT,QU,QV,QW,QX,QY,QZ,Q_,Q$,Ra,Rb,Rc,Rd,Re,Rf,Rg,Rh,Ri,Rj,Rk,Rl,Rm,Rn,Ro,Rp,Rq,Rr,Rs,Rt,Ru,Rv,Rw,Rx,Ry,Rz,RA,RB,RC,RD){qs.marginTop=kY;qs.fontSize=kZ;sh.fontSize=cd;vg.fontSize=cd;xy.marginTop=kY;xy.fontSize=cd;yo.fontSize=lG;Bm.marginLeft=kY;Bm.fontSize=hE;Fq.fontSize=cd;Jb.marginLeft=Jc;Jb.fontSize=jQ;MZ.fontSize=hE;OW.marginTop=Jc;OW.fontSize=jQ;return {layout:"product",data:[{}],fetch:{},error:c_,state:{title:"EPTT AVM",settings:{siteURL:"https:\u002F\u002Fwww.pttavm.com",siteURLShort:"pttavm.com",siteTitleShort:"PttAVM.com"},platform:T,overflowStatus:a,searchStatus:a,focusStatus:a,loading:[],menuStatus:a,categoryStatus:a,userPanelStatus:a,raffleCartPanelStatus:a,categories:{children:[{id:ab,name:nA,slug:kF,parent:j,is_landing_page:z,children:[{id:E,name:nB,slug:nC,parent:ab,is_landing_page:z,children:[{id:kG,name:"Dizüstü Bilgisayarlar",slug:nD,parent:E,is_landing_page:a,children:[]},{id:nE,name:"Masaüstü Bilgisayarlar",slug:nF,parent:E,is_landing_page:a,children:[]},{id:nG,name:nH,slug:nI,parent:E,is_landing_page:a,children:[]},{id:dI,name:nJ,slug:nK,parent:E,is_landing_page:a,children:[{id:84,name:"SSD (Solid State Drive)",slug:"ssd-solid-state-drive-bellek",parent:dI,is_landing_page:a,children:[]},{id:85,name:"Sabit Disk (HDD)",slug:"sabit-disk-hdd-bellek",parent:dI,is_landing_page:a,children:[]},{id:86,name:"USB Bellekler",slug:"usb-bellek",parent:dI,is_landing_page:a,children:[]},{id:87,name:"Harici Veri Depolama",slug:"tasinabilir-harddisk-harici-veri-depolama",parent:dI,is_landing_page:a,children:[]},{id:88,name:"NAS Depolama Sistemleri",slug:"nas-depolama",parent:dI,is_landing_page:a,children:[]},{id:89,name:nL,slug:"hafiza-karti",parent:dI,is_landing_page:a,children:[]}]},{id:ca,name:"Bilgisayar Bileşenleri",slug:nM,parent:E,is_landing_page:a,children:[{id:90,name:"İşlemciler (CPU)",slug:"bilgisayar-islemci-cpu",parent:ca,is_landing_page:a,children:[]},{id:91,name:"Anakartlar",slug:"bilgisayar-anakart",parent:ca,is_landing_page:a,children:[]},{id:92,name:"Ekran Kartları (GPU)",slug:"bilgisayar-ekran-karti-gpu",parent:ca,is_landing_page:a,children:[]},{id:93,name:"Bellek (RAM)",slug:"bilgisayar-bellek-ram",parent:ca,is_landing_page:a,children:[]},{id:94,name:"Bilgisayar Kasaları",slug:"bilgisayar-kasalari",parent:ca,is_landing_page:a,children:[]},{id:95,name:"Power Supply (PSU)",slug:"power-supply-psu",parent:ca,is_landing_page:a,children:[]},{id:96,name:"Soğutucu ve Fan",slug:"sogutucu-ve-fan",parent:ca,is_landing_page:a,children:[]},{id:97,name:"Optik Sürücüler",slug:"optik-surucu",parent:ca,is_landing_page:a,children:[]},{id:98,name:"Tv ve Ses Kartları",slug:"tv-ve-ses-karti",parent:ca,is_landing_page:a,children:[]}]},{id:cb,name:nN,slug:nO,parent:E,is_landing_page:a,children:[{id:nP,name:"Mouse",slug:"mouse",parent:cb,is_landing_page:a,children:[]},{id:100,name:nQ,slug:"klavye",parent:cb,is_landing_page:a,children:[]},{id:101,name:"Bilgisayar Kulaklıkları",slug:"bilgisayar-kulaklik",parent:cb,is_landing_page:a,children:[]},{id:102,name:"Webcam ve Mikrofonlar",slug:"webcam-ve-mikrofon",parent:cb,is_landing_page:a,children:[]},{id:103,name:"Joystick ve Gamepad",slug:"joystick-ve-gamepad",parent:cb,is_landing_page:a,children:[]},{id:104,name:"Güç Kaynakları (UPS)",slug:"guc-kaynagi-ups",parent:cb,is_landing_page:a,children:[]},{id:105,name:"Grafik Tabletler",slug:"grafik-tablet",parent:cb,is_landing_page:a,children:[]},{id:4214,name:"Bilgisayar Hoparlörleri",slug:"bilgisayar-hoparlorleri",parent:cb,is_landing_page:a,children:[]},{id:fs,name:"Oyuncu Ekipmanları ",slug:"oyuncu-ekipmanlari",parent:cb,is_landing_page:a,children:[{id:6908,name:"Oyuncu Mousepad",slug:"oyuncu-mousepad",parent:fs,is_landing_page:a,children:[]},{id:6947,name:"Oyuncu Setleri",slug:"oyuncu-setleri",parent:fs,is_landing_page:a,children:[]},{id:6968,name:"Oyuncu Kulaklıkları",slug:"oyuncu-kulakliklari",parent:fs,is_landing_page:a,children:[]},{id:6969,name:"Oyuncu Mouse",slug:"oyuncu-mouse",parent:fs,is_landing_page:a,children:[]},{id:6990,name:"Oyuncu Klavye",slug:"oyunc-klavye",parent:fs,is_landing_page:a,children:[]}]}]},{id:iA,name:kH,slug:nR,parent:E,is_landing_page:a,children:[{id:106,name:"Led Monitörler",slug:"led-monitor",parent:iA,is_landing_page:a,children:[]},{id:107,name:"IPS Monitörler",slug:"ips-monitor",parent:iA,is_landing_page:a,children:[]}]},{id:c$,name:"Yazılım Ürünleri",slug:nS,parent:E,is_landing_page:a,children:[{id:108,name:"İşletim Sistemleri",slug:"isletim-sistemi",parent:c$,is_landing_page:a,children:[]},{id:109,name:"Antivirüs Programları",slug:"antivirus-programi",parent:c$,is_landing_page:a,children:[]},{id:110,name:"Ofis Programları",slug:"ofis-programi",parent:c$,is_landing_page:a,children:[]},{id:111,name:"Grafik ve Tasarım",slug:"grafik-ve-tasarim",parent:c$,is_landing_page:a,children:[]},{id:112,name:"Eğitim Yazılımları",slug:"egitim-yazilimlari",parent:c$,is_landing_page:a,children:[]},{id:113,name:"Ticari Yazılımlar",slug:"ticari-yazilim",parent:c$,is_landing_page:a,children:[]},{id:nT,name:"Dijital İndirilebilir Lisanslar",slug:"dijital-indirilebilir-lisans",parent:c$,is_landing_page:a,children:[{id:7176,name:"Oyun Pinleri",slug:"oyun-pinleri",parent:nT,is_landing_page:a,children:[]}]}]},{id:da,name:"Ağ & Modem",slug:"ag-ve-modem",parent:E,is_landing_page:a,children:[{id:iB,name:"Modemler",slug:"modem",parent:da,is_landing_page:a,children:[{id:266,name:"ADSL Modemler",slug:"adsl-modem",parent:iB,is_landing_page:a,children:[]},{id:267,name:"VDSL Modemler",slug:"vdsl-modem",parent:iB,is_landing_page:a,children:[]},{id:268,name:"Mobil Modemler",slug:"mobil-modem",parent:iB,is_landing_page:a,children:[]}]},{id:116,name:"Access Point",slug:"access-point",parent:da,is_landing_page:a,children:[]},{id:117,name:"Router",slug:"router",parent:da,is_landing_page:a,children:[]},{id:kI,name:"Menzil Arttırıcılar",slug:"menzil-arttirici",parent:da,is_landing_page:a,children:[{id:269,name:"Range Extender",slug:"range-extender",parent:kI,is_landing_page:a,children:[]},{id:270,name:"Powerline Ürünleri",slug:"powerline-urunleri",parent:kI,is_landing_page:a,children:[]}]},{id:119,name:"Switch ve Hub",slug:"switch-ve-hub",parent:da,is_landing_page:a,children:[]},{id:120,name:"Ağ Adaptörleri",slug:"ag-adaptor",parent:da,is_landing_page:a,children:[]},{id:kJ,name:"Antenler ve Kablolar",slug:"anten-ve-kablo",parent:da,is_landing_page:a,children:[{id:271,name:"Antenler",slug:"modem-anteni",parent:kJ,is_landing_page:a,children:[]},{id:272,name:nU,slug:"ag-ve-modem-kablosu",parent:kJ,is_landing_page:a,children:[]}]},{id:4177,name:"Firewall",slug:"firewall",parent:da,is_landing_page:a,children:[]}]},{id:cu,name:"Yazıcı & Aksesuarları",slug:nV,parent:E,is_landing_page:a,children:[{id:122,name:"Lazer Yazıcılar",slug:"lazer-yazici",parent:cu,is_landing_page:a,children:[]},{id:123,name:"Mürekkepli Yazıcılar",slug:"murekkepli-yazici",parent:cu,is_landing_page:a,children:[]},{id:124,name:"Çok Fonksiyonlu Yazıcılar",slug:"cok-fonksiyonlu-yazici",parent:cu,is_landing_page:a,children:[]},{id:125,name:"Nokta Vuruşlu Yazıcılar",slug:"nokta-vuruslu-yazici",parent:cu,is_landing_page:a,children:[]},{id:126,name:"Fotoğraf Yazıcıları",slug:"fotograf-yazici",parent:cu,is_landing_page:a,children:[]},{id:127,name:"3D Yazıcılar",slug:"3d-yazici",parent:cu,is_landing_page:a,children:[]},{id:128,name:"Tarayıcılar",slug:"tarayici",parent:cu,is_landing_page:a,children:[]},{id:db,name:"Sarf Malzemeleri",slug:"yazici-sarf-malzeme",parent:cu,is_landing_page:a,children:[{id:273,name:"Tonerler",slug:"toner",parent:db,is_landing_page:a,children:[]},{id:274,name:"Kartuşlar",slug:"kartus",parent:db,is_landing_page:a,children:[]},{id:275,name:"Filamentler",slug:"filament",parent:db,is_landing_page:a,children:[]},{id:276,name:"Chipler",slug:"chip",parent:db,is_landing_page:a,children:[]},{id:277,name:"Drum Setleri",slug:"drum-set",parent:db,is_landing_page:a,children:[]},{id:278,name:"Dolum Setleri",slug:"dolum-seti",parent:db,is_landing_page:a,children:[]},{id:279,name:"Yazıcı Şeritleri",slug:"yazici-seriti",parent:db,is_landing_page:a,children:[]},{id:280,name:"Yazıcı Aksesuarları",slug:"yazici-aksesuar",parent:db,is_landing_page:a,children:[]}]}]},{id:iC,name:"Barkod Ürünleri",slug:"barkod-urunleri",parent:E,is_landing_page:a,children:[{id:130,name:"Barkod Okuyucular",slug:"barkod-okuyucu",parent:iC,is_landing_page:a,children:[]},{id:131,name:"El Terminalleri",slug:"el-terminali",parent:iC,is_landing_page:a,children:[]},{id:132,name:"Barkod ve Etiket Yazıcıları",slug:"barkod-ve-etiket-yazici",parent:iC,is_landing_page:a,children:[]}]},{id:kK,name:"Yenilenmiş & İkinci El Ürünler",slug:"yenilenmis-ve-ikinci-el-urunler",parent:E,is_landing_page:a,children:[{id:133,name:"Bilgisayarlar",slug:"yenilenmis-ve-ikinci-el-bilgisayar",parent:kK,is_landing_page:a,children:[]},{id:134,name:nH,slug:"yenilenmis-ve-ikinci-el-tablet",parent:kK,is_landing_page:a,children:[]}]},{id:cv,name:nW,slug:nX,parent:E,is_landing_page:a,children:[{id:dJ,name:"Dizüstü Bilgisayar Aksesuarları",slug:"dizustu-bilgisayar-aksesuarlari",parent:cv,is_landing_page:a,children:[{id:281,name:"Çantalar ve Kılıflar",slug:"notebook-canta-ve-kilif",parent:dJ,is_landing_page:a,children:[]},{id:282,name:"Notebook Soğutucuları",slug:"notebook-sogutucu",parent:dJ,is_landing_page:a,children:[]},{id:283,name:"Notebook Adaptörleri",slug:"notebook-adaptor",parent:dJ,is_landing_page:a,children:[]},{id:284,name:"Notebook Bataryaları",slug:"notebook-batarya",parent:dJ,is_landing_page:a,children:[]},{id:285,name:"Notebook Etiketleri",slug:"notebook-etiket",parent:dJ,is_landing_page:a,children:[]},{id:286,name:"Notebook Standları",slug:"notebook-stand",parent:dJ,is_landing_page:a,children:[]},{id:287,name:"Notebook Kilitleri",slug:"notebook-kilit",parent:dJ,is_landing_page:a,children:[]}]},{id:dK,name:"Tablet Aksesuarları",slug:"tablet-aksesuar",parent:cv,is_landing_page:a,children:[{id:288,name:"Kılıflar ve Çantalar",slug:"tablet-kilif-ve-canta",parent:dK,is_landing_page:a,children:[]},{id:289,name:iD,slug:"tablet-ekran-koruyucu",parent:dK,is_landing_page:a,children:[]},{id:290,name:nY,slug:"tablet-stand-ve-tutucu",parent:dK,is_landing_page:a,children:[]},{id:291,name:kL,slug:"tablet-sarj-cihazi",parent:dK,is_landing_page:a,children:[]},{id:292,name:"Çevirici ve Adaptörler",slug:"tablet-cevirici-ve-adaptorler",parent:dK,is_landing_page:a,children:[]},{id:293,name:"Tablet Kalemleri",slug:"tablet-kalemleri",parent:dK,is_landing_page:a,children:[]},{id:294,name:"Tablet Klavyeleri",slug:"tablet-klavyeleri",parent:dK,is_landing_page:a,children:[]}]},{id:gI,name:nU,slug:"bilgisayar-kablosu",parent:cv,is_landing_page:a,children:[{id:295,name:"Güç Kabloları",slug:"bilgisayar-guc-kablosu",parent:gI,is_landing_page:a,children:[]},{id:296,name:"Ses ve Görüntü Kabloları",slug:"bilgisayar-ses-ve-goruntu-kablosu",parent:gI,is_landing_page:a,children:[]},{id:297,name:"USB Kabloları",slug:"bilgisayar-usb-kablo",parent:gI,is_landing_page:a,children:[]},{id:298,name:"Sata Kabloları",slug:"bilgisayar-sata-kablosu",parent:gI,is_landing_page:a,children:[]}]},{id:138,name:"Adaptör ve Çeviriciler",slug:"adaptor-ve-cevirici",parent:cv,is_landing_page:a,children:[]},{id:139,name:"USB Aksesuarları",slug:"bilgisayar-usb-aksesuarlari",parent:cv,is_landing_page:a,children:[]},{id:140,name:"Taşınabilir Disk Aksesuarları",slug:"tasinabilir-disk-aksesuar",parent:cv,is_landing_page:a,children:[]},{id:141,name:"CD ve DVD Ürünleri",slug:"cd-ve-dvd",parent:cv,is_landing_page:a,children:[]},{id:gJ,name:kM,slug:"bilgisayar-yedek-parca",parent:cv,is_landing_page:a,children:[{id:299,name:nZ,slug:"bilgisayar-ekrani",parent:gJ,is_landing_page:a,children:[]},{id:300,name:"Gövde",slug:"bilgisayar-govdesi",parent:gJ,is_landing_page:a,children:[]},{id:301,name:nQ,slug:"bilgisayar-klavyesi",parent:gJ,is_landing_page:a,children:[]},{id:302,name:"Chipsetler",slug:"chipset",parent:gJ,is_landing_page:a,children:[]}]}]},{id:n_,name:"Sunucu",slug:"sunucu",parent:E,is_landing_page:a,children:[{id:4126,name:"Server & Server Aksesuarları",slug:"server-ve-server-aksesuarlari",parent:n_,is_landing_page:a,children:[]}]}]},{id:F,name:n$,slug:oa,parent:ab,is_landing_page:z,children:[{id:ob,name:oc,slug:od,parent:F,is_landing_page:a,children:[]},{id:oe,name:of,slug:og,parent:F,is_landing_page:a,children:[]},{id:oh,name:oi,slug:oj,parent:F,is_landing_page:a,children:[]},{id:ok,name:ol,slug:om,parent:F,is_landing_page:a,children:[]},{id:41,name:"Davlumbazlar",slug:"davlumbaz",parent:F,is_landing_page:a,children:[]},{id:on,name:oo,slug:op,parent:F,is_landing_page:a,children:[]},{id:43,name:"Ocaklar",slug:"ocak",parent:F,is_landing_page:a,children:[]},{id:oq,name:or,slug:os,parent:F,is_landing_page:a,children:[]},{id:45,name:"Mikrodalga Fırınlar",slug:"mikrodalga-firin",parent:F,is_landing_page:a,children:[]},{id:kN,name:ot,slug:ou,parent:F,is_landing_page:a,children:[]},{id:ov,name:ow,slug:ox,parent:F,is_landing_page:a,children:[]},{id:48,name:"Beyaz Eşya Yedek Parça",slug:"beyaz-esya-yedek-parca",parent:F,is_landing_page:a,children:[]},{id:oy,name:oz,slug:oA,parent:F,is_landing_page:a,children:[]},{id:oB,name:oC,slug:oD,parent:F,is_landing_page:a,children:[]}]},{id:dc,name:oE,slug:oF,parent:ab,is_landing_page:z,children:[{id:x,name:"Elektrikli Mutfak Aletleri",slug:"elektrikli-mutfak-aleti",parent:dc,is_landing_page:a,children:[{id:iE,name:oG,slug:oH,parent:x,is_landing_page:a,children:[{id:303,name:"Çay Makinesi",slug:"cay-makinesi",parent:iE,is_landing_page:a,children:[]},{id:304,name:oI,slug:"semaver-cay-makinesi",parent:iE,is_landing_page:a,children:[]}]},{id:eA,name:oJ,slug:oK,parent:x,is_landing_page:a,children:[{id:305,name:"Türk Kahve Makineleri",slug:"turk-kahvesi-makinesi",parent:eA,is_landing_page:a,children:[]},{id:306,name:"Filtre Kahve Makineleri",slug:"filtre-kahve-makinesi",parent:eA,is_landing_page:a,children:[]},{id:307,name:"Cappuccino ve Espresso Makineleri",slug:"cappuccino-ve-espresso-makinesi",parent:eA,is_landing_page:a,children:[]},{id:308,name:"Kahve Değirmenleri",slug:"kahve-degirmeni",parent:eA,is_landing_page:a,children:[]},{id:309,name:oL,slug:"kahve-makinesi-aksesuar-ve-yedek-parcalari",parent:eA,is_landing_page:a,children:[]}]},{id:145,name:"Su Isıtıcılar (Kettle)",slug:"su-isitici-kettle",parent:x,is_landing_page:a,children:[]},{id:ft,name:"Blender, Mikser ve Mutfak Robotları",slug:oM,parent:x,is_landing_page:a,children:[{id:310,name:"Blenderler",slug:"blender",parent:ft,is_landing_page:a,children:[]},{id:311,name:"Mikserler",slug:"mikser",parent:ft,is_landing_page:a,children:[]},{id:312,name:"Doğrayıcı ve Rondolar",slug:"dograyici-ve-rondo",parent:ft,is_landing_page:a,children:[]},{id:313,name:"Mutfak Robotu ve Şefleri",slug:"mutfak-robotu-ve-sefi",parent:ft,is_landing_page:a,children:[]}]},{id:oN,name:oO,slug:oP,parent:x,is_landing_page:a,children:[]},{id:148,name:"Elektrikli Izgaralar",slug:"elektrikli-izgara",parent:x,is_landing_page:a,children:[]},{id:149,name:"Ekmek Kızartma Makineleri",slug:"ekmek-kizartma-makinesi",parent:x,is_landing_page:a,children:[]},{id:150,name:"Ekmek Yapma Makineleri",slug:"ekmek-yapma-makinesi",parent:x,is_landing_page:a,children:[]},{id:151,name:"Fritözler",slug:"fritoz",parent:x,is_landing_page:a,children:[]},{id:152,name:"Buharlı Pişiriciler",slug:"buharli-pisirici",parent:x,is_landing_page:a,children:[]},{id:153,name:"Elektrikli Tencere ve Tavalar",slug:"elektrikli-tencere-ve-tava",parent:x,is_landing_page:a,children:[]},{id:154,name:"Kıyma Makineleri",slug:"kiyma-makinesi",parent:x,is_landing_page:a,children:[]},{id:oQ,name:oR,slug:oS,parent:x,is_landing_page:a,children:[]},{id:156,name:"Mısır Patlatma Makineleri",slug:"misir-patlatma-makinesi",parent:x,is_landing_page:a,children:[]},{id:157,name:"Yoğurt Makineleri",slug:"elektrikli-yogurt-makinesi",parent:x,is_landing_page:a,children:[]},{id:158,name:"Dondurma Makineleri",slug:"dondurma-makinesi",parent:x,is_landing_page:a,children:[]},{id:159,name:"Waffle Makineleri",slug:"waffle-makinesi",parent:x,is_landing_page:a,children:[]},{id:160,name:"Yumurta Pişirme Makineleri",slug:"yumurta-pisirme-makinesi",parent:x,is_landing_page:a,children:[]},{id:161,name:"Mutfak Tartıları",slug:"mutfak-tartisi",parent:x,is_landing_page:a,children:[]},{id:oT,name:"Su Arıtma Cihazları",slug:oU,parent:x,is_landing_page:a,children:[]},{id:163,name:"Diğer Mutfak Aletleri",slug:"diger-mutfak-aletleri",parent:x,is_landing_page:a,children:[]},{id:oV,name:oW,slug:oX,parent:x,is_landing_page:a,children:[]},{id:6551,name:"Mini\u002FMidi Fırınlar",slug:"mini-midi-firinlar",parent:x,is_landing_page:a,children:[]}]},{id:bH,name:oY,slug:oZ,parent:dc,is_landing_page:a,children:[{id:164,name:"Dikey Süpürgeler",slug:"dikey-supurge",parent:bH,is_landing_page:a,children:[]},{id:165,name:"Toz Torbalı Süpürgeler",slug:"toz-torbali-supurge",parent:bH,is_landing_page:a,children:[]},{id:166,name:"Toz Torbasız Süpürgeler",slug:"toz-torbasiz-supurge",parent:bH,is_landing_page:a,children:[]},{id:167,name:"Su Filtreli Süpürgeler",slug:"su-filtreli-supurge",parent:bH,is_landing_page:a,children:[]},{id:168,name:"Şarjlı Süpürgeler",slug:"sarjli-supurge",parent:bH,is_landing_page:a,children:[]},{id:169,name:"Robot Süpürgeler",slug:"robot-supurge",parent:bH,is_landing_page:a,children:[]},{id:170,name:"Buharlı Temizleyiciler",slug:"buharli-temizleyici",parent:bH,is_landing_page:a,children:[]},{id:171,name:"Halı Yıkama Makineleri",slug:"hali-yikama-makinesi",parent:bH,is_landing_page:a,children:[]},{id:172,name:o_,slug:"elektrikli-supurge-aksesuar-ve-yedek-parca",parent:bH,is_landing_page:a,children:[]},{id:4122,name:"Endüstriyel Süpürgeler",slug:"endustriyel-supurgeler",parent:bH,is_landing_page:a,children:[]}]},{id:iF,name:o$,slug:pa,parent:dc,is_landing_page:a,children:[{id:173,name:"Buharlı Ütüler",slug:"buharli-utu",parent:iF,is_landing_page:a,children:[]},{id:174,name:"Buhar Kazanlı Ütüler",slug:"buhar-kazanli-utu",parent:iF,is_landing_page:a,children:[]}]},{id:pb,name:pc,slug:pd,parent:dc,is_landing_page:a,children:[]}]},{id:cw,name:"Telefonlar & Aksesuarları",slug:pe,parent:ab,is_landing_page:a,children:[{id:kO,name:kP,slug:kQ,parent:cw,is_landing_page:z,children:[]},{id:aA,name:"Cep Telefonu Aksesuarları",slug:"cep-telefonu-aksesuar",parent:cw,is_landing_page:a,children:[{id:pf,name:kR,slug:pg,parent:aA,is_landing_page:a,children:[]},{id:176,name:iD,slug:"cep-telefonu-ekran-koruyucu",parent:aA,is_landing_page:a,children:[]},{id:iG,name:iH,slug:"cep-telefonu-kulakligi",parent:aA,is_landing_page:a,children:[{id:314,name:"Kulak içi Kulaklıklar",slug:"kulak-ici-kulaklik",parent:iG,is_landing_page:a,children:[]},{id:ph,name:pi,slug:pj,parent:iG,is_landing_page:a,children:[]}]},{id:dL,name:kL,slug:pk,parent:aA,is_landing_page:a,children:[{id:316,name:"Şarj Adaptörleri",slug:"sarj-adaptoru",parent:dL,is_landing_page:a,children:[]},{id:317,name:"Çoklu Şarj Adaptörleri",slug:"coklu-sarj-adaptoru",parent:dL,is_landing_page:a,children:[]},{id:318,name:"Kablosuz Şarj Cihazları",slug:"kablosuz-sarj-cihazi",parent:dL,is_landing_page:a,children:[]},{id:319,name:"Şarj Stantları (Dock)",slug:"sarj-standi-dock",parent:dL,is_landing_page:a,children:[]},{id:pl,name:pm,slug:pn,parent:dL,is_landing_page:a,children:[]}]},{id:fu,name:po,slug:pp,parent:aA,is_landing_page:a,children:[{id:321,name:"Android (Micro USB) Kablolar",slug:"android-micro-usb-kablo",parent:fu,is_landing_page:a,children:[]},{id:322,name:"Android (Type-C) Kablolar",slug:"android-type-c-kablo",parent:fu,is_landing_page:a,children:[]},{id:323,name:"iPhone Kabloları (iOS)",slug:"iphone-kablosu-ios",parent:fu,is_landing_page:a,children:[]},{id:324,name:"Çevirici ve Dönüştürücüler",slug:"cevirici-ve-donusturucu",parent:fu,is_landing_page:a,children:[]}]},{id:pq,name:pr,slug:ps,parent:aA,is_landing_page:a,children:[]},{id:181,name:nL,slug:"cep-telefonu-hafiza-karti",parent:aA,is_landing_page:a,children:[]},{id:182,name:"Oyuncu Telefon Aksesuarları",slug:"oyuncu-telefon-aksesuarlari",parent:aA,is_landing_page:a,children:[]},{id:iI,name:nY,slug:"cep-telefonu-stand-ve-tutucu",parent:aA,is_landing_page:a,children:[{id:325,name:"Stand ve Tripodlar",slug:"cep-telefonu-stand-ve-tripod",parent:iI,is_landing_page:a,children:[]},{id:pt,name:"Araç İçi Tutucular",slug:pu,parent:iI,is_landing_page:a,children:[]}]},{id:184,name:"Selfie Çubukları",slug:"selfie-cubugu",parent:aA,is_landing_page:a,children:[]},{id:185,name:"Stylus Kalemler",slug:"stylus-kalem",parent:aA,is_landing_page:a,children:[]}]},{id:dM,name:"Giyilebilir Teknoloji Ürünleri",slug:"giyilebilir-teknoloji",parent:cw,is_landing_page:a,children:[{id:pv,name:pw,slug:px,parent:dM,is_landing_page:a,children:[]},{id:py,name:pz,slug:pA,parent:dM,is_landing_page:a,children:[]},{id:fv,name:"Akıllı Saat Aksesuarları",slug:"akilli-saat-aksesuar",parent:dM,is_landing_page:a,children:[{id:327,name:"Kordonlar",slug:"akilli-saat-kordonu",parent:fv,is_landing_page:a,children:[]},{id:328,name:"Şarj İstasyonları",slug:"akilli-saat-sarj-istasyonu",parent:fv,is_landing_page:a,children:[]},{id:329,name:"Kılıf ve Kapaklar",slug:"akilli-saat-kilif-ve-kapak",parent:fv,is_landing_page:a,children:[]},{id:330,name:iD,slug:"akilli-saat-ekran-koruyucu",parent:fv,is_landing_page:a,children:[]},{id:331,name:"Akıllı Saat Kabloları",slug:"akilli-saat-kablosu",parent:fv,is_landing_page:a,children:[]}]},{id:189,name:"Akıllı Takip Cihazları",slug:"akilli-takip-cihazi",parent:dM,is_landing_page:a,children:[]},{id:190,name:"Sanal Gerçeklik Gözlükleri",slug:"sanal-gerceklik-gozlugu",parent:dM,is_landing_page:a,children:[]}]},{id:dN,name:"Cep Telefonu Yedek Parçaları",slug:"cep-telefonu-yedek-parca",parent:cw,is_landing_page:a,children:[{id:191,name:nZ,slug:"cep-telefonu-ekran",parent:dN,is_landing_page:a,children:[]},{id:192,name:"Batarya",slug:"cep-telefonu-batarya",parent:dN,is_landing_page:a,children:[]},{id:193,name:"Kasa",slug:"cep-telefonu-kasasi",parent:dN,is_landing_page:a,children:[]},{id:194,name:"Tuş Takımı",slug:"cep-telefonu-tus-takimi",parent:dN,is_landing_page:a,children:[]},{id:195,name:pB,slug:"cep-telefonu-kamerasi",parent:dN,is_landing_page:a,children:[]},{id:196,name:"Hoparlör",slug:"cep-telefonu-hoparloru",parent:dN,is_landing_page:a,children:[]},{id:197,name:"Diğer Parçalar",slug:"cep-telefonu-diger-parcalar",parent:dN,is_landing_page:a,children:[]}]},{id:fw,name:"Telsiz & Masaüstü Telefonlar",slug:"telsiz-masaustu-ve-telefon",parent:cw,is_landing_page:a,children:[{id:198,name:"Telsiz Telefonlar",slug:"telsiz-telefon",parent:fw,is_landing_page:a,children:[]},{id:199,name:"Masaüstü Telefonlar",slug:"masaustu-telefon",parent:fw,is_landing_page:a,children:[]},{id:200,name:"IP Telefonlar",slug:"ip-telefon",parent:fw,is_landing_page:a,children:[]},{id:201,name:"Telsizler",slug:"telsiz",parent:fw,is_landing_page:a,children:[]},{id:202,name:"Telefon Santralleri",slug:"telefon-santrali",parent:fw,is_landing_page:a,children:[]}]},{id:58,name:"Yenilenmiş & İkinci El Telefonlar",slug:"yenilenmis-ve-ikinci-el-telefon",parent:cw,is_landing_page:a,children:[]}]},{id:bh,name:pC,slug:pD,parent:ab,is_landing_page:z,children:[{id:pE,name:pF,slug:pG,parent:bh,is_landing_page:a,children:[]},{id:eB,name:pH,slug:pI,parent:bh,is_landing_page:a,children:[{id:203,name:"Askı Aparatları",slug:"tv-televizyon-aski-aparati",parent:eB,is_landing_page:a,children:[]},{id:204,name:kS,slug:"tv-televizyon-uzaktan-kumanda",parent:eB,is_landing_page:a,children:[]},{id:205,name:"TV Ekran Koruyucular",slug:"tv-televizyon-ekran-koruyucular",parent:eB,is_landing_page:a,children:[]},{id:206,name:"TV Kabloları",slug:"tv-televizyon-kablosu",parent:eB,is_landing_page:a,children:[]},{id:207,name:"TV Box ve Medya Oynatıcı",slug:"tv-box-ve-medya-oynatici",parent:eB,is_landing_page:a,children:[]}]},{id:gK,name:pJ,slug:pK,parent:bh,is_landing_page:a,children:[{id:208,name:"Uydu Alıcıları",slug:"uydu-alici",parent:gK,is_landing_page:a,children:[]},{id:209,name:"Çanak ve LNB",slug:"canak-ve-lnb",parent:gK,is_landing_page:a,children:[]},{id:210,name:oL,slug:"uydu-aksesuar-ve-yedek-parca",parent:gK,is_landing_page:a,children:[]}]},{id:63,name:"Bluetooth Hoparlörler",slug:"bluetooth-hoparlor",parent:bh,is_landing_page:a,children:[]},{id:iJ,name:pL,slug:pM,parent:bh,is_landing_page:a,children:[{id:gL,name:"Ev Sinema Sistemleri",slug:"ev-sinema-sistemi",parent:iJ,is_landing_page:a,children:[{id:332,name:"Soundbar",slug:"soundbar",parent:gL,is_landing_page:a,children:[]},{id:333,name:"5.1 Ses Sistemleri",slug:"5-1-ses-sistemi",parent:gL,is_landing_page:a,children:[]},{id:334,name:"2.1 Ses Sistemleri",slug:"2-1-ses-sistemi",parent:gL,is_landing_page:a,children:[]},{id:335,name:"Blu-Ray ve DVD Oynatıcılar",slug:"blu-ray-ve-dvd-oynatici",parent:gL,is_landing_page:a,children:[]}]},{id:iK,name:"HI-FI Sistemler",slug:"hi-fi-sistemler",parent:iJ,is_landing_page:a,children:[{id:336,name:"Amfi (Receiver)",slug:"hi-fi-amfi-receiver",parent:iK,is_landing_page:a,children:[]},{id:337,name:"HI-FI Hoparlörler",slug:"hi-fi-hoparlor",parent:iK,is_landing_page:a,children:[]},{id:338,name:"Subwoofer",slug:"hi-fi-subwoofer",parent:iK,is_landing_page:a,children:[]}]}]},{id:fx,name:"Müzik Sistemleri",slug:"muzik-sistemi",parent:bh,is_landing_page:a,children:[{id:217,name:"Radyolar",slug:"radyo",parent:fx,is_landing_page:a,children:[]},{id:218,name:iH,slug:"muzik-kulaklik",parent:fx,is_landing_page:a,children:[]},{id:219,name:"Pikaplar",slug:"pikap",parent:fx,is_landing_page:a,children:[]},{id:220,name:"Portatif Müzik Setleri",slug:"portatif-muzik-seti",parent:fx,is_landing_page:a,children:[]},{id:221,name:"Mp3 ve Mp4 Çalar",slug:"mp3-ve-mp4-calar",parent:fx,is_landing_page:a,children:[]}]},{id:4175,name:"Oyun Konsolları & Aksesuarlar",slug:"oyun-konsollari-ve-aksesuarlar",parent:bh,is_landing_page:a,children:[]}]},{id:ah,name:pN,slug:pO,parent:ab,is_landing_page:z,children:[{id:gM,name:pP,slug:pQ,parent:ah,is_landing_page:a,children:[{id:222,name:"Yoğuşmalı",slug:"yogusmali-kombi",parent:gM,is_landing_page:a,children:[]},{id:223,name:"Konvansiyonel",slug:"konvansiyonel-kombi",parent:gM,is_landing_page:a,children:[]},{id:224,name:pR,slug:"elektrikli-kombi",parent:gM,is_landing_page:a,children:[]}]},{id:iL,name:"Klima & Aksesuarları",slug:pS,parent:ah,is_landing_page:a,children:[{id:225,name:pT,slug:"klima",parent:iL,is_landing_page:a,children:[]},{id:226,name:"Klima Aksesuarı",slug:"klima-aksesuari",parent:iL,is_landing_page:a,children:[]}]},{id:68,name:"Termostatlar",slug:"termostat",parent:ah,is_landing_page:a,children:[]},{id:pU,name:pV,slug:pW,parent:ah,is_landing_page:a,children:[]},{id:pX,name:pY,slug:pZ,parent:ah,is_landing_page:a,children:[]},{id:cc,name:"Sobalar & Isıtıcılar",slug:p_,parent:ah,is_landing_page:a,children:[{id:227,name:"Infrared Isıtıcılar",slug:"infrared-isitici",parent:cc,is_landing_page:a,children:[]},{id:228,name:"Quartz Isıtıcılar",slug:"quartz-isitici",parent:cc,is_landing_page:a,children:[]},{id:229,name:"Karbon Isıtıcılar",slug:"karbon-isitici",parent:cc,is_landing_page:a,children:[]},{id:230,name:"Seramik Isıtıcılar",slug:"seramik-isitici",parent:cc,is_landing_page:a,children:[]},{id:231,name:"Konvektör Isıtıcı",slug:"konvektor-isitici",parent:cc,is_landing_page:a,children:[]},{id:232,name:"Fanlı Isıtıcılar",slug:"fanli-isitici",parent:cc,is_landing_page:a,children:[]},{id:233,name:"Ayak Isıtıcılar",slug:"ayak-isitici",parent:cc,is_landing_page:a,children:[]},{id:234,name:kT,slug:"radyator-isiticilar",parent:cc,is_landing_page:a,children:[]},{id:235,name:"Havlu Isıtıcı",slug:"havlu-isitici",parent:cc,is_landing_page:a,children:[]}]},{id:p$,name:qa,slug:qb,parent:ah,is_landing_page:a,children:[]},{id:qc,name:qd,slug:qe,parent:ah,is_landing_page:a,children:[]},{id:qf,name:"Hava Perdeleri",slug:qg,parent:ah,is_landing_page:a,children:[]}]},{id:aK,name:qh,slug:qi,parent:ab,is_landing_page:z,children:[{id:fy,name:kU,slug:qj,parent:aK,is_landing_page:a,children:[{id:236,name:"IP Kameralar",slug:"ip-kamera",parent:fy,is_landing_page:a,children:[]},{id:237,name:"AHD Kameralar",slug:"ahd-kamera",parent:fy,is_landing_page:a,children:[]},{id:238,name:"Araç Kameraları",slug:"arac-guvenlik-kamerasi",parent:fy,is_landing_page:a,children:[]},{id:239,name:"Kamera Aksesuarları",slug:"kamera-aksesuari",parent:fy,is_landing_page:a,children:[]}]},{id:fz,name:qk,slug:ql,parent:aK,is_landing_page:a,children:[{id:240,name:"DVR Cihazları",slug:"dvr-cihazi",parent:fz,is_landing_page:a,children:[]},{id:241,name:"NVR Cihazları",slug:"nvr-cihazi",parent:fz,is_landing_page:a,children:[]},{id:242,name:"İş İstasyonları",slug:"is-istasyonu",parent:fz,is_landing_page:a,children:[]},{id:243,name:"Video Yönetim Yazılımları",slug:"video-yonetim-yazilimi",parent:fz,is_landing_page:a,children:[]}]},{id:qm,name:"Aktif Network Ürünleri",slug:"aktif-network-urunleri",parent:aK,is_landing_page:a,children:[{id:245,name:"Switchler",slug:"switch",parent:qm,is_landing_page:a,children:[]}]},{id:kV,name:"Pasif Network Ürünleri",slug:"pasif-network-urunleri",parent:aK,is_landing_page:a,children:[{id:249,name:"Patch Paneller",slug:"patch-panel",parent:kV,is_landing_page:a,children:[]},{id:250,name:"Patch Kablolar",slug:"patch-kablo",parent:kV,is_landing_page:a,children:[]}]},{id:qn,name:"Güvenlik Sistemi Bileşenleri",slug:"guvenlik-sistemi-bilesenleri",parent:aK,is_landing_page:a,children:[{id:253,name:"Kabinetler",slug:"kabinet",parent:qn,is_landing_page:a,children:[]}]},{id:iM,name:kW,slug:qo,parent:aK,is_landing_page:a,children:[{id:dO,name:"Hırsız Alarm Sistemleri",slug:"hirsiz-alarm-sistemi",parent:iM,is_landing_page:a,children:[{id:339,name:"Dedektörler",slug:"dedektor",parent:dO,is_landing_page:a,children:[]},{id:340,name:"Manyetik Kontaklar",slug:"manyetik-kontak",parent:dO,is_landing_page:a,children:[]},{id:341,name:"Aküler",slug:"alarm-sistemi-akusu",parent:dO,is_landing_page:a,children:[]},{id:342,name:"GSM\u002FGPRS Modülleri",slug:"gsm-gprs-modulleri",parent:dO,is_landing_page:a,children:[]},{id:343,name:"Sesli Uyarıcı (Siren)",slug:"alarm-sistemi-sesli-uyarici-siren",parent:dO,is_landing_page:a,children:[]},{id:344,name:"Şifre Panelleri",slug:"alarm-sistemi-sifre-paneli",parent:dO,is_landing_page:a,children:[]},{id:345,name:kS,slug:"alarm-sistemi-uzaktan-kumandasi",parent:dO,is_landing_page:a,children:[]}]},{id:iN,name:"Yangın Alarm Sistemleri",slug:"yangin-alarm-sistemi",parent:iM,is_landing_page:a,children:[{id:346,name:"Acil Durum Butonları",slug:"yangin-alarm-acil-durum-butonu",parent:iN,is_landing_page:a,children:[]},{id:347,name:"Duman Dedektörleri",slug:"duman-dedektoru",parent:iN,is_landing_page:a,children:[]},{id:348,name:"Sesli Uyarıcılar (Siren)",slug:"yangin-alarm-sesli-uyarici-siren",parent:iN,is_landing_page:a,children:[]}]}]},{id:qp,name:qq,slug:qr,parent:aK,is_landing_page:a,children:[]},{id:kX,name:"Geçiş Kontrol Sistemleri",slug:"gecis-kontrol-sistemi",parent:aK,is_landing_page:a,children:[{id:259,name:"Kart Okuyucular",slug:"kart-okuyucu",parent:kX,is_landing_page:a,children:[]},{id:261,name:"Parmak İzi Okuyucular",slug:"parmak-izi-okuyucu",parent:kX,is_landing_page:a,children:[]}]},{id:83,name:"Akıllı Ev Sistemleri",slug:"akilli-ev-sistemi",parent:aK,is_landing_page:a,children:[]}]}],color:gN,styles:qs},{id:aW,name:"Giyim & Aksesuar",slug:qt,parent:j,is_landing_page:z,children:[{id:au,name:"Kadın",slug:qu,parent:aW,is_landing_page:a,children:[{id:Z,name:fA,slug:"kadin-giyim",parent:au,is_landing_page:a,children:[{id:dd,name:iO,slug:qv,parent:Z,is_landing_page:a,children:[{id:552,name:"Günlük Elbise",slug:"kadin-gunluk-elbise",parent:dd,is_landing_page:a,children:[]},{id:553,name:"Gece Elbisesi ",slug:"kadin-gece-elbisesi",parent:dd,is_landing_page:a,children:[]},{id:554,name:"Abiye Elbise",slug:"kadin-abiye-elbise",parent:dd,is_landing_page:a,children:[]},{id:555,name:"Mezuniyet",slug:"kadin-mezuniyet",parent:dd,is_landing_page:a,children:[]},{id:556,name:"Uzun Elbise ",slug:"kadin-uzun-elbise",parent:dd,is_landing_page:a,children:[]},{id:557,name:"Düğün Elbisesi",slug:"kadin-dugun-elbisesi",parent:dd,is_landing_page:a,children:[]},{id:558,name:"Yazlık Elbise",slug:"kadin-yazlik-elbise",parent:dd,is_landing_page:a,children:[]}]},{id:bi,name:gO,slug:"kadin-pantolon",parent:Z,is_landing_page:a,children:[{id:559,name:qw,slug:"kadin-gunluk-pantolon",parent:bi,is_landing_page:a,children:[]},{id:560,name:"Boru Paça Pantolon ",slug:"kadin-boru-paca-pantolon",parent:bi,is_landing_page:a,children:[]},{id:561,name:"Dar Paça Pantolon ",slug:"kadin-dar-paca-pantolon",parent:bi,is_landing_page:a,children:[]},{id:562,name:"Deri Pantolon",slug:"kadin-deri-pantolon",parent:bi,is_landing_page:a,children:[]},{id:563,name:"İspanyol Paça Pantolon",slug:"kadin-ispanyol-paca-pantolon",parent:bi,is_landing_page:a,children:[]},{id:564,name:qx,slug:"kadin-kargo-pantolon",parent:bi,is_landing_page:a,children:[]},{id:565,name:qy,slug:"kadin-keten-pantolon",parent:bi,is_landing_page:a,children:[]},{id:566,name:qz,slug:"kadin-kot-pantolon",parent:bi,is_landing_page:a,children:[]},{id:567,name:"Kumaş Pantolon",slug:"kadin-kumas-pantolon",parent:bi,is_landing_page:a,children:[]},{id:568,name:"Şalvar Pantolon",slug:"kadin-salvar-pantolon",parent:bi,is_landing_page:a,children:[]},{id:569,name:"Yüksek Bel Pantolon",slug:"kadin-yuksek-bel-pantolon",parent:bi,is_landing_page:a,children:[]},{id:570,name:"Tayt Pantolon",slug:"kadin-tayt-pantolon",parent:bi,is_landing_page:a,children:[]}]},{id:cx,name:qA,slug:"kadin-etek",parent:Z,is_landing_page:a,children:[{id:571,name:"Günlük Etek",slug:"gunluk-etek",parent:cx,is_landing_page:a,children:[]},{id:572,name:"Deri Etek",slug:"deri-etek",parent:cx,is_landing_page:a,children:[]},{id:573,name:"Kalem Etek",slug:"kalem-etek",parent:cx,is_landing_page:a,children:[]},{id:574,name:"Kloş Etek",slug:"klos-etek",parent:cx,is_landing_page:a,children:[]},{id:575,name:"Mini Etek",slug:"mini-etek",parent:cx,is_landing_page:a,children:[]},{id:576,name:"Pileli Etek",slug:"pileli-etek",parent:cx,is_landing_page:a,children:[]},{id:577,name:"Uzun Etek",slug:"uzun-etek",parent:cx,is_landing_page:a,children:[]},{id:578,name:"Yırtmaçlı Etek",slug:"yirtmacli-etek",parent:cx,is_landing_page:a,children:[]},{id:579,name:"Kot Etek",slug:"kot-etek",parent:cx,is_landing_page:a,children:[]}]},{id:k_,name:gP,slug:"kadin-tulum",parent:Z,is_landing_page:a,children:[{id:580,name:"Günlük Tulum",slug:"gunluk-tulum",parent:k_,is_landing_page:a,children:[]},{id:581,name:"Abiye Tulum ",slug:"abiye-tulum",parent:k_,is_landing_page:a,children:[]}]},{id:gQ,name:gR,slug:"kadin-t-shirt",parent:Z,is_landing_page:a,children:[{id:582,name:"Bisiklet Yaka ",slug:"bisiklet-yaka-kadin-t-shirt",parent:gQ,is_landing_page:a,children:[]},{id:583,name:gS,slug:"polo-yaka-kadin-t-shirt",parent:gQ,is_landing_page:a,children:[]},{id:584,name:gT,slug:"kapusonlu-kadin-t-shirt",parent:gQ,is_landing_page:a,children:[]},{id:585,name:gU,slug:"v-yaka-kadin-t-shirt",parent:gQ,is_landing_page:a,children:[]}]},{id:384,name:qB,slug:"kadin-atlet",parent:Z,is_landing_page:a,children:[]},{id:qC,name:k$,slug:qD,parent:Z,is_landing_page:a,children:[]},{id:386,name:qE,slug:"kadin-tunik",parent:Z,is_landing_page:a,children:[]},{id:387,name:fB,slug:"kadin-gomlek",parent:Z,is_landing_page:a,children:[]},{id:la,name:lb,slug:"kadin-tayt",parent:Z,is_landing_page:a,children:[{id:586,name:"Spor Tayt",slug:"spor-tayt",parent:la,is_landing_page:a,children:[]},{id:587,name:"Günlük Tayt",slug:"gunluk-tayt",parent:la,is_landing_page:a,children:[]}]},{id:fC,name:iP,slug:"kadin-sweatshirt",parent:Z,is_landing_page:a,children:[{id:588,name:lc,slug:"kadin-bisiklet-yaka-sweatshirt",parent:fC,is_landing_page:a,children:[]},{id:589,name:ld,slug:"kadin-bogazli-balikci-yaka-sweatshirt",parent:fC,is_landing_page:a,children:[]},{id:590,name:gU,slug:"kadin-v-yaka-sweatshirt",parent:fC,is_landing_page:a,children:[]},{id:591,name:gT,slug:"kadin-kapusonlu-sweatshirt",parent:fC,is_landing_page:a,children:[]},{id:592,name:gS,slug:"kadin-polo-yaka-sweatshirt",parent:fC,is_landing_page:a,children:[]}]},{id:iQ,name:gV,slug:"kadin-esofman",parent:Z,is_landing_page:a,children:[{id:593,name:qF,slug:"kadin-esofman-takimi",parent:iQ,is_landing_page:a,children:[]},{id:594,name:qG,slug:"kadin-esofman-alti",parent:iQ,is_landing_page:a,children:[]},{id:595,name:qH,slug:"kadin-esofman-ustu",parent:iQ,is_landing_page:a,children:[]}]},{id:dP,name:qI,slug:qJ,parent:Z,is_landing_page:a,children:[{id:596,name:"Kaztüyü Mont & Parka",slug:"kadin-kaztuyu-mont-ve-parka",parent:dP,is_landing_page:a,children:[]},{id:597,name:qK,slug:"kadin-kase-kaban",parent:dP,is_landing_page:a,children:[]},{id:598,name:qL,slug:"kadin-trenckot",parent:dP,is_landing_page:a,children:[]},{id:599,name:"Kapitone İnce Mont",slug:"kadin-kapitone-ince-mont",parent:dP,is_landing_page:a,children:[]},{id:600,name:"Manto",slug:"kadin-manto",parent:dP,is_landing_page:a,children:[]},{id:601,name:"Yağmurluk & Anorak",slug:"kadin-yagmurluk-ve-anorak",parent:dP,is_landing_page:a,children:[]}]},{id:gW,name:"Triko & Kazak",slug:"kadin-triko-ve-kazak",parent:Z,is_landing_page:a,children:[{id:602,name:"Hırka ",slug:"kadin-hirka",parent:gW,is_landing_page:a,children:[]},{id:603,name:le,slug:"kadin-kazak",parent:gW,is_landing_page:a,children:[]},{id:604,name:"Örme Yelek",slug:"kadin-orme-yelek",parent:gW,is_landing_page:a,children:[]},{id:605,name:"Pelerin",slug:"kadin-pelerin",parent:gW,is_landing_page:a,children:[]}]},{id:de,name:"Ceket & Yelek",slug:"kadin-ceket-ve-yelek",parent:Z,is_landing_page:a,children:[{id:606,name:"Günlük Ceket",slug:"kadin-gunluk-ceket",parent:de,is_landing_page:a,children:[]},{id:607,name:qM,slug:"kadin-kot-ceket",parent:de,is_landing_page:a,children:[]},{id:608,name:"Deri & Suni Deri Ceket",slug:"kadin-deri-ve-suni-deri-ceket",parent:de,is_landing_page:a,children:[]},{id:609,name:"Kürk & suni kürk",slug:"kadin-kurk-ve-suni-kurk",parent:de,is_landing_page:a,children:[]},{id:610,name:lf,slug:"kadin-yelek",parent:de,is_landing_page:a,children:[]},{id:611,name:"Spor Ceket",slug:"kadin-spor-ceket",parent:de,is_landing_page:a,children:[]},{id:612,name:"Blazer Ceket ",slug:"kadin-blazer-ceket",parent:de,is_landing_page:a,children:[]},{id:613,name:lg,slug:"kadin-bolero",parent:de,is_landing_page:a,children:[]}]},{id:394,name:qN,slug:"kadin-takim",parent:Z,is_landing_page:a,children:[]},{id:395,name:lh,slug:"kadin-sort",parent:Z,is_landing_page:a,children:[]},{id:396,name:qO,slug:"kadin-mezuniyet-cubbesi",parent:Z,is_landing_page:a,children:[]}]},{id:al,name:iR,slug:qP,parent:au,is_landing_page:a,children:[{id:397,name:"Atlet, Fanila, Body",slug:"kadin-atlet-fanila-body",parent:al,is_landing_page:a,children:[]},{id:398,name:qQ,slug:"kadin-ev-giyim",parent:al,is_landing_page:a,children:[]},{id:gX,name:iS,slug:"kadin-kulotlari",parent:al,is_landing_page:a,children:[{id:614,name:iS,slug:"kadin-kulot",parent:gX,is_landing_page:a,children:[]},{id:615,name:qR,slug:"kadin-boxer",parent:gX,is_landing_page:a,children:[]},{id:616,name:"Tanga,String",slug:"kadin-tanga-string",parent:gX,is_landing_page:a,children:[]},{id:617,name:"Çoklu Paket Külotlar",slug:"kadin-coklu-paket-kulotlar",parent:gX,is_landing_page:a,children:[]}]},{id:df,name:"Sütyen",slug:"sutyen",parent:al,is_landing_page:a,children:[{id:618,name:"Yapıştırmalı Slikon Sütyen",slug:"yapistirmali-slikon-sutyen",parent:df,is_landing_page:a,children:[]},{id:619,name:"Günlük Sütyen",slug:"gunluk-sutyen",parent:df,is_landing_page:a,children:[]},{id:620,name:"Desteksiz Sütyen",slug:"desteksiz-sutyen",parent:df,is_landing_page:a,children:[]},{id:621,name:"Toparlayıcı \u002F Küçültücü",slug:"toparlayici-kucultucu",parent:df,is_landing_page:a,children:[]},{id:622,name:"Spor Sütyeni",slug:"spor-sutyeni",parent:df,is_landing_page:a,children:[]},{id:623,name:"Destekli \u002F Push Up",slug:"destekli-push-up",parent:df,is_landing_page:a,children:[]},{id:624,name:"Balensiz Sütyen",slug:"balensiz-sutyen",parent:df,is_landing_page:a,children:[]},{id:625,name:"Straplez \u002F Çıkarılabilir Askılı",slug:"straplez-cikarilabilir-askili",parent:df,is_landing_page:a,children:[]}]},{id:401,name:"Sabahlık ",slug:"kadin-sabahlik",parent:al,is_landing_page:a,children:[]},{id:402,name:"Gecelik ",slug:"kadin-gecelik",parent:al,is_landing_page:a,children:[]},{id:403,name:"Kombinezon",slug:"kadin-kombinezon",parent:al,is_landing_page:a,children:[]},{id:404,name:"Babydoll",slug:"babydoll",parent:al,is_landing_page:a,children:[]},{id:405,name:"Korse ",slug:"korse",parent:al,is_landing_page:a,children:[]},{id:fD,name:gY,slug:"kadin-corap",parent:al,is_landing_page:a,children:[{id:626,name:qS,slug:"kadin-kulotlu-corap",parent:fD,is_landing_page:a,children:[]},{id:627,name:"Dizaltı",slug:"kadin-dizalti-corap",parent:fD,is_landing_page:a,children:[]},{id:628,name:"Soket Çorap",slug:"kadin-soket-corap",parent:fD,is_landing_page:a,children:[]},{id:629,name:"Çorap Tayt ",slug:"kadin-corap-tayt",parent:fD,is_landing_page:a,children:[]},{id:630,name:"Dizüstü",slug:"kadin-dizustu-corap",parent:fD,is_landing_page:a,children:[]}]},{id:407,name:"İç Çamaşır Takım",slug:"kadin-ic-camasir-takim",parent:al,is_landing_page:a,children:[]},{id:408,name:"Jartiyer",slug:"jartiyer",parent:al,is_landing_page:a,children:[]},{id:409,name:"Pijama",slug:"kadin-pijama",parent:al,is_landing_page:a,children:[]},{id:410,name:"jüpon",slug:"jupon",parent:al,is_landing_page:a,children:[]},{id:411,name:li,slug:"kadin-termal-ic-giyim",parent:al,is_landing_page:a,children:[]},{id:gZ,name:"Fantezi İç Giyim",slug:"kadin-fantezi-ic-giyim",parent:al,is_landing_page:a,children:[{id:631,name:"Fantezi Kostüm",slug:"kadin-fantezi-kostum",parent:gZ,is_landing_page:a,children:[]},{id:632,name:"Jartiyer Takım ",slug:"jartiyer-takim",parent:gZ,is_landing_page:a,children:[]},{id:633,name:"Jartiyer Çorabı ",slug:"jartiyer-corabi",parent:gZ,is_landing_page:a,children:[]},{id:634,name:"Vücut Çorabı",slug:"kadin-vucut-corabi",parent:gZ,is_landing_page:a,children:[]}]}]},{id:dQ,name:lj,slug:qT,parent:au,is_landing_page:a,children:[{id:413,name:"Bikini",slug:"bikini",parent:dQ,is_landing_page:a,children:[]},{id:414,name:iT,slug:"mayo",parent:dQ,is_landing_page:a,children:[]},{id:415,name:"Deniz Şortu",slug:"deniz-sortu",parent:dQ,is_landing_page:a,children:[]},{id:416,name:"Tankini",slug:"tankini",parent:dQ,is_landing_page:a,children:[]},{id:417,name:"Pareo",slug:"pareo",parent:dQ,is_landing_page:a,children:[]},{id:418,name:"Mayokini",slug:"mayokini",parent:dQ,is_landing_page:a,children:[]}]},{id:bI,name:qU,slug:qV,parent:au,is_landing_page:a,children:[{id:fE,name:qW,slug:"kadin-bot",parent:bI,is_landing_page:a,children:[{id:635,name:"Klasik Bot ",slug:"kadin-klasik-bot",parent:fE,is_landing_page:a,children:[]},{id:636,name:"Bootie ",slug:"kadin-bootie",parent:fE,is_landing_page:a,children:[]},{id:637,name:qX,slug:"kadin-kar-botu",parent:fE,is_landing_page:a,children:[]},{id:638,name:qY,slug:"kadin-dolgu-topuk-bot",parent:fE,is_landing_page:a,children:[]},{id:639,name:"Topuklu Bot ",slug:"kadin-topuklu-bot",parent:fE,is_landing_page:a,children:[]}]},{id:iU,name:qZ,slug:"kadin-cizme",parent:bI,is_landing_page:a,children:[{id:640,name:"Klasik Çizme",slug:"kadin-klasik-cizme",parent:iU,is_landing_page:a,children:[]},{id:641,name:"Topuklu Çizme",slug:"kadin-topuklu-cizme",parent:iU,is_landing_page:a,children:[]},{id:642,name:"Yağmur Çizmesi",slug:"kadin-yagmur-cizmesi",parent:iU,is_landing_page:a,children:[]}]},{id:g_,name:lk,slug:"gunluk-ayakkabi",parent:bI,is_landing_page:a,children:[{id:643,name:"Espadril",slug:"espadril-kadin-ayakkabi",parent:g_,is_landing_page:a,children:[]},{id:644,name:lk,slug:"gunluk-kadin-ayakkabi",parent:g_,is_landing_page:a,children:[]},{id:645,name:"Loafer",slug:"loafer-kadin-ayakkabi",parent:g_,is_landing_page:a,children:[]},{id:646,name:"Oxford Kadın Ayakkabı",slug:"oxford-kadin-ayakkabi",parent:g_,is_landing_page:a,children:[]}]},{id:g$,name:iV,slug:"kadin-spor-ayakkabi",parent:bI,is_landing_page:a,children:[{id:647,name:"Günlük ",slug:"kadin-gunluk-spor-ayakkabi",parent:g$,is_landing_page:a,children:[]},{id:648,name:"Trekking",slug:"kadin-trekking-ayakkabisi",parent:g$,is_landing_page:a,children:[]},{id:649,name:q_,slug:"kadin-yuruyus-kosu-ayakkabisi",parent:g$,is_landing_page:a,children:[]},{id:650,name:q$,slug:"kadin-sneakers-ayakkabi",parent:g$,is_landing_page:a,children:[]}]},{id:fF,name:"Topuklu Ayakkabı",slug:"topuklu-ayakkabi",parent:bI,is_landing_page:a,children:[{id:651,name:"Dolgu Topuk",slug:"kadin-dolgu-topuklu-ayakkabi",parent:fF,is_landing_page:a,children:[]},{id:652,name:"Platform Ayakkabı",slug:"platform-topuklu-ayakkabi",parent:fF,is_landing_page:a,children:[]},{id:653,name:"Stiletto",slug:"stiletto-topuklu-ayakkabi",parent:fF,is_landing_page:a,children:[]},{id:654,name:"Orta Boy Topuklu",slug:"orta-boy-topuklu-ayakkabi",parent:fF,is_landing_page:a,children:[]},{id:655,name:"Yüksek Topuklu",slug:"yuksek-topuklu-ayakkabi",parent:fF,is_landing_page:a,children:[]}]},{id:ra,name:"Ev Ayakkabısı",slug:"kadin-ev-ayakkabisi",parent:bI,is_landing_page:a,children:[{id:656,name:"Panduf",slug:"panduf",parent:ra,is_landing_page:a,children:[]}]},{id:ll,name:rb,slug:"abiye-ayakkabi",parent:bI,is_landing_page:a,children:[{id:657,name:rb,slug:"kadin-abiye-ayakkabi",parent:ll,is_landing_page:a,children:[]},{id:658,name:"Gelinlik Ayakabısı",slug:"gelinlik-ayakabisi",parent:ll,is_landing_page:a,children:[]}]},{id:426,name:rc,slug:"babet",parent:bI,is_landing_page:a,children:[]},{id:ha,name:lm,slug:"kadin-sandalet",parent:bI,is_landing_page:a,children:[{id:659,name:qY,slug:"dolgu-topuklu-sandalet",parent:ha,is_landing_page:a,children:[]},{id:660,name:"Topuksuz Sandalet ",slug:"topuksuz-sandalet",parent:ha,is_landing_page:a,children:[]},{id:661,name:"Platform Sandalet ",slug:"platform-sandalet",parent:ha,is_landing_page:a,children:[]},{id:662,name:"Topuklu",slug:"topuklu-sandalet",parent:ha,is_landing_page:a,children:[]}]},{id:fG,name:ln,slug:"kadin-terlik",parent:bI,is_landing_page:a,children:[{id:663,name:"Dolgu Topuk Terlik",slug:"dolgu-topuk-terlik",parent:fG,is_landing_page:a,children:[]},{id:664,name:"Parmak Arası Terlik",slug:"parmak-arasi-terlik",parent:fG,is_landing_page:a,children:[]},{id:665,name:"Sabo Terlik",slug:"sabo-terlik",parent:fG,is_landing_page:a,children:[]},{id:666,name:"Topuklu Terlik",slug:"topuklu-terlik",parent:fG,is_landing_page:a,children:[]},{id:667,name:rd,slug:"ev-terligi",parent:fG,is_landing_page:a,children:[]}]}]},{id:bj,name:re,slug:rf,parent:au,is_landing_page:a,children:[{id:429,name:rg,slug:"kadin-sirt-cantasi",parent:bj,is_landing_page:a,children:[]},{id:430,name:rh,slug:"omuz-cantasi",parent:bj,is_landing_page:a,children:[]},{id:431,name:"Çapraz Çanta",slug:"capraz-canta",parent:bj,is_landing_page:a,children:[]},{id:432,name:ri,slug:"seyahat-cantasi",parent:bj,is_landing_page:a,children:[]},{id:433,name:"Portföy Çanta",slug:"portfoy-canta",parent:bj,is_landing_page:a,children:[]},{id:434,name:"Clutch",slug:"clutch",parent:bj,is_landing_page:a,children:[]},{id:435,name:"Abiye Çanta",slug:"abiye-canta",parent:bj,is_landing_page:a,children:[]},{id:436,name:rj,slug:"kadin-cuzdan",parent:bj,is_landing_page:a,children:[]},{id:437,name:"Kartlık Cüzdan",slug:"kartlik-cuzdan",parent:bj,is_landing_page:a,children:[]},{id:438,name:"Makyaj Çantası",slug:"makyaj-cantasi",parent:bj,is_landing_page:a,children:[]},{id:439,name:rk,slug:"bel-cantasi",parent:bj,is_landing_page:a,children:[]}]},{id:N,name:rl,slug:rm,parent:au,is_landing_page:a,children:[{id:440,name:qE,slug:"tesettur-tunik",parent:N,is_landing_page:a,children:[]},{id:441,name:iO,slug:"tesettur-elbise",parent:N,is_landing_page:a,children:[]},{id:442,name:"Abiye",slug:"tesettur-abiye",parent:N,is_landing_page:a,children:[]},{id:443,name:qA,slug:"tesettur-etek",parent:N,is_landing_page:a,children:[]},{id:444,name:"Ferace & Abaya",slug:"ferace-ve-abaya",parent:N,is_landing_page:a,children:[]},{id:445,name:"Kap Pardesü",slug:"kap-pardesu",parent:N,is_landing_page:a,children:[]},{id:446,name:"Trençkot & Giy-çık",slug:"kadin-trenckot-ve-giy-cik-giyim-urunleri",parent:N,is_landing_page:a,children:[]},{id:447,name:"Hırka",slug:"tesettur-hirka",parent:N,is_landing_page:a,children:[]},{id:448,name:lf,slug:"tesettur-yelek",parent:N,is_landing_page:a,children:[]},{id:449,name:fB,slug:"tesettur-gomlek",parent:N,is_landing_page:a,children:[]},{id:450,name:k$,slug:"tesettur-bluz",parent:N,is_landing_page:a,children:[]},{id:451,name:"Body",slug:"tesettur-body",parent:N,is_landing_page:a,children:[]},{id:452,name:lo,slug:"tesettur-ceket",parent:N,is_landing_page:a,children:[]},{id:453,name:gO,slug:"tesettur-pantolon",parent:N,is_landing_page:a,children:[]},{id:454,name:gV,slug:"tesettur-esofman",parent:N,is_landing_page:a,children:[]},{id:455,name:gP,slug:"tesettur-tulum",parent:N,is_landing_page:a,children:[]},{id:456,name:rn,slug:"tesettur-mont",parent:N,is_landing_page:a,children:[]},{id:457,name:"Kaban",slug:"tesettur-kaban",parent:N,is_landing_page:a,children:[]},{id:458,name:"Panço",slug:"tesettur-panco",parent:N,is_landing_page:a,children:[]},{id:459,name:qN,slug:"tesettur-takim",parent:N,is_landing_page:a,children:[]},{id:460,name:le,slug:"tesettur-kazak",parent:N,is_landing_page:a,children:[]},{id:461,name:"Tessüttür Mayo",slug:"tessuttur-mayo",parent:N,is_landing_page:a,children:[]},{id:462,name:"Baş Örtüsü",slug:"bas-ortusu",parent:N,is_landing_page:a,children:[]}]},{id:ai,name:ro,slug:rp,parent:au,is_landing_page:a,children:[{id:463,name:"Büyük Beden Abiye",slug:"buyuk-beden-abiye",parent:ai,is_landing_page:a,children:[]},{id:464,name:"Büyük Beden Elbise",slug:"buyuk-beden-elbise",parent:ai,is_landing_page:a,children:[]},{id:465,name:"Büyük Beden Etek",slug:"buyuk-beden-etek",parent:ai,is_landing_page:a,children:[]},{id:466,name:"Büyük Beden Tunik",slug:"buyuk-beden-tunik",parent:ai,is_landing_page:a,children:[]},{id:467,name:"Büyük Beden Kaban",slug:"buyuk-beden-kaban",parent:ai,is_landing_page:a,children:[]},{id:468,name:"Büyük Beden Pantolon",slug:"buyuk-beden-pantolon",parent:ai,is_landing_page:a,children:[]},{id:469,name:"Büyük Beden Bluz",slug:"buyuk-beden-bluz",parent:ai,is_landing_page:a,children:[]},{id:470,name:"Büyük Beden T-Shirt",slug:"buyuk-beden-t-shirt",parent:ai,is_landing_page:a,children:[]},{id:471,name:"Büyük Beden Ceket",slug:"buyuk-beden-ceket",parent:ai,is_landing_page:a,children:[]},{id:472,name:"Büyük Beden Gömlek",slug:"buyuk-beden-gomlek",parent:ai,is_landing_page:a,children:[]},{id:473,name:"Büyük Beden Eşofman",slug:"buyuk-beden-esofman",parent:ai,is_landing_page:a,children:[]},{id:474,name:"Büyük Beden Mont",slug:"buyuk-beden-mont",parent:ai,is_landing_page:a,children:[]},{id:475,name:"Büyük Beden Tayt",slug:"buyuk-beden-tayt",parent:ai,is_landing_page:a,children:[]},{id:476,name:"Büyük Beden Şort",slug:"buyuk-beden-sort",parent:ai,is_landing_page:a,children:[]},{id:477,name:"Büyük Beden Trençkot",slug:"buyuk-beden-trenckot",parent:ai,is_landing_page:a,children:[]},{id:478,name:"Büyük Beden Yelek",slug:"buyuk-beden-yelek",parent:ai,is_landing_page:a,children:[]},{id:479,name:"Büyük Beden Tulum",slug:"buyuk-beden-tulum",parent:ai,is_landing_page:a,children:[]}]},{id:aX,name:rq,slug:rr,parent:au,is_landing_page:a,children:[{id:480,name:iW,slug:"kadin-eldiven",parent:aX,is_landing_page:a,children:[]},{id:481,name:"Şal",slug:"sal",parent:aX,is_landing_page:a,children:[]},{id:482,name:lp,slug:"kadin-semsiye",parent:aX,is_landing_page:a,children:[]},{id:483,name:lq,slug:"kadin-giyim-sac-aksesuarlari",parent:aX,is_landing_page:a,children:[]},{id:484,name:"Gelin Aksesuarları",slug:"gelin-aksesuarlari",parent:aX,is_landing_page:a,children:[]},{id:485,name:"Şapka & Bere",slug:"kadin-sapka-ve-bere",parent:aX,is_landing_page:a,children:[]},{id:486,name:rs,slug:"kadin-kemer",parent:aX,is_landing_page:a,children:[]},{id:487,name:"Peluş Kulaklık",slug:"kadin-pelus-kulaklik",parent:aX,is_landing_page:a,children:[]},{id:488,name:"Çanta Aksesuarları",slug:"kadin-canta-aksesuarlari",parent:aX,is_landing_page:a,children:[]},{id:489,name:rt,slug:"kadin-aksesuar-seti",parent:aX,is_landing_page:a,children:[]},{id:490,name:ru,slug:"kadin-anahtarlik",parent:aX,is_landing_page:a,children:[]},{id:491,name:qO,slug:"kadin-mezuniyet-cubbesi-2",parent:aX,is_landing_page:a,children:[]}]}]},{id:bk,name:"Erkek",slug:rv,parent:aW,is_landing_page:a,children:[{id:_,name:fA,slug:"erkek-giyim",parent:bk,is_landing_page:a,children:[{id:fH,name:gR,slug:rw,parent:_,is_landing_page:a,children:[{id:668,name:gS,slug:"erkek-polo-yaka-t-shirt",parent:fH,is_landing_page:a,children:[]},{id:669,name:gU,slug:"erkek-v-yaka-t-shirt",parent:fH,is_landing_page:a,children:[]},{id:670,name:"Bisiklet Yak",slug:"erkek-bisiklet-yaka-t-shirt",parent:fH,is_landing_page:a,children:[]},{id:671,name:gT,slug:"erkek-kapusonlu-t-shirt",parent:fH,is_landing_page:a,children:[]}]},{id:fI,name:fB,slug:rx,parent:_,is_landing_page:a,children:[{id:672,name:"Klasik ",slug:"erkek-klasik-gomlek",parent:fI,is_landing_page:a,children:[]},{id:673,name:ry,slug:"erkek-spor-gomlek",parent:fI,is_landing_page:a,children:[]},{id:674,name:"Kot Gömlek",slug:"erkek-kot-gomlek",parent:fI,is_landing_page:a,children:[]},{id:675,name:"Hakim Yaka",slug:"erkek-hakim-yaka-gomlek",parent:fI,is_landing_page:a,children:[]}]},{id:dg,name:gO,slug:rz,parent:_,is_landing_page:a,children:[{id:676,name:qw,slug:"erkek-gunluk-pantolon",parent:dg,is_landing_page:a,children:[]},{id:677,name:qz,slug:"erkek-kot-pantolon",parent:dg,is_landing_page:a,children:[]},{id:678,name:rA,slug:"erkek-klasik-pantolon",parent:dg,is_landing_page:a,children:[]},{id:679,name:qy,slug:"erkek-keten-pantolon",parent:dg,is_landing_page:a,children:[]},{id:680,name:qx,slug:"erkek-kargo-pantolon",parent:dg,is_landing_page:a,children:[]},{id:681,name:"Kanvas Pantolon",slug:"erkek-kanvas-pantolon",parent:dg,is_landing_page:a,children:[]},{id:682,name:"Kadife Pantolon",slug:"erkek-kadife-pantolon",parent:dg,is_landing_page:a,children:[]}]},{id:fJ,name:lo,slug:rB,parent:_,is_landing_page:a,children:[{id:683,name:qM,slug:"erkek-kot-ceket",parent:fJ,is_landing_page:a,children:[]},{id:684,name:"Deri Ceket",slug:"erkek-deri-ceket",parent:fJ,is_landing_page:a,children:[]},{id:685,name:"Blazer",slug:"erkek-blazer",parent:fJ,is_landing_page:a,children:[]},{id:686,name:"Klasik Ceket",slug:"erkek-klasik-ceket",parent:fJ,is_landing_page:a,children:[]}]},{id:496,name:rC,slug:"erkek-takim-elbise",parent:_,is_landing_page:a,children:[]},{id:fK,name:iP,slug:"erkek-sweatshirt",parent:_,is_landing_page:a,children:[{id:687,name:lc,slug:"erkek-bisiklet-yaka-sweatshirt",parent:fK,is_landing_page:a,children:[]},{id:688,name:gS,slug:"erkek-polo-yaka-sweatshirt",parent:fK,is_landing_page:a,children:[]},{id:689,name:gT,slug:"erkek-kapusonlu-sweatshirt",parent:fK,is_landing_page:a,children:[]},{id:690,name:gU,slug:"erkek-v-yaka-sweatshirt",parent:fK,is_landing_page:a,children:[]},{id:691,name:ld,slug:"erkek-bogazli-balikci-yaka-sweatshirt",parent:fK,is_landing_page:a,children:[]}]},{id:fL,name:lh,slug:"erkek-sort",parent:_,is_landing_page:a,children:[{id:692,name:"Bermuda ",slug:"erkek-bermuda-sort",parent:fL,is_landing_page:a,children:[]},{id:693,name:"Kargo Şort",slug:"erkek-kargo-sort",parent:fL,is_landing_page:a,children:[]},{id:694,name:"Kısa Şort",slug:"erkek-kisa-sort",parent:fL,is_landing_page:a,children:[]},{id:695,name:"Kot Şort",slug:"erkek-kot-sort",parent:fL,is_landing_page:a,children:[]},{id:696,name:"Günlük Şort",slug:"erkek-gunluk-sort",parent:fL,is_landing_page:a,children:[]}]},{id:lr,name:lj,slug:"erkek-plaj-giyim",parent:_,is_landing_page:a,children:[{id:697,name:iT,slug:"erkek-mayo",parent:lr,is_landing_page:a,children:[]},{id:698,name:"Mayo Şort",slug:"erkek-mayo-sort",parent:lr,is_landing_page:a,children:[]}]},{id:iX,name:gV,slug:"erkek-esofman",parent:_,is_landing_page:a,children:[{id:699,name:qF,slug:"erkek-esofman-takimi",parent:iX,is_landing_page:a,children:[]},{id:700,name:qG,slug:"erkek-esofman-alti",parent:iX,is_landing_page:a,children:[]},{id:701,name:qH,slug:"erkek-esofman-ustu",parent:iX,is_landing_page:a,children:[]}]},{id:501,name:lf,slug:"erkek-yelek",parent:_,is_landing_page:a,children:[]},{id:ls,name:"Trençkot & Yağmurluk",slug:"erkek-trenckot-ve-yagmurluk",parent:_,is_landing_page:a,children:[{id:702,name:qL,slug:"erkek-trenckot",parent:ls,is_landing_page:a,children:[]},{id:703,name:rD,slug:"erkek-yagmurluk",parent:ls,is_landing_page:a,children:[]}]},{id:lt,name:rn,slug:"erkek-mont",parent:_,is_landing_page:a,children:[{id:704,name:"Şişme Mont ",slug:"erkek-sisme-mont",parent:lt,is_landing_page:a,children:[]},{id:705,name:"Günlük Mont",slug:"erkek-gunluk-mont",parent:lt,is_landing_page:a,children:[]}]},{id:lu,name:"Hırka & Süveter",slug:"erkek-hirka-ve-suveter",parent:_,is_landing_page:a,children:[{id:706,name:"Günlük Hırka",slug:"erkek-gunluk-hirka",parent:lu,is_landing_page:a,children:[]},{id:707,name:"Süveter",slug:"erkek-suveter",parent:lu,is_landing_page:a,children:[]}]},{id:eC,name:le,slug:"erkek-kazak",parent:_,is_landing_page:a,children:[{id:708,name:ld,slug:"erkek-bogazli-balikci-yaka-kazak",parent:eC,is_landing_page:a,children:[]},{id:709,name:gU,slug:"erkek-v-yaka-kazak",parent:eC,is_landing_page:a,children:[]},{id:710,name:lc,slug:"erkek-bisiklet-yaka-kazak",parent:eC,is_landing_page:a,children:[]},{id:711,name:rE,slug:"erkek-triko-kazak",parent:eC,is_landing_page:a,children:[]},{id:712,name:gS,slug:"erkek-polo-yaka-kazak",parent:eC,is_landing_page:a,children:[]},{id:713,name:gT,slug:"erkek-kapusonlu-kazak",parent:eC,is_landing_page:a,children:[]}]},{id:dR,name:rF,slug:rG,parent:_,is_landing_page:a,children:[{id:714,name:"Spor Kaban",slug:"erkek-spor-kaban",parent:dR,is_landing_page:a,children:[]},{id:715,name:"Kaz Tüyü Kaban & Parka",slug:"erkek-kaz-tuyu-kaban-ve-parka",parent:dR,is_landing_page:a,children:[]},{id:716,name:qK,slug:"erkek-kase-kaban",parent:dR,is_landing_page:a,children:[]},{id:717,name:"Parka",slug:"erkek-parka",parent:dR,is_landing_page:a,children:[]},{id:718,name:"Trenchcoat",slug:"erkek-trenchcoat",parent:dR,is_landing_page:a,children:[]},{id:719,name:"İş Giyim",slug:"erkek-is-giyim",parent:dR,is_landing_page:a,children:[]}]},{id:507,name:"Mezuniyet Cübbesi",slug:"erkek-mezuniyet-cubbesi",parent:_,is_landing_page:a,children:[]}]},{id:cy,name:iR,slug:rH,parent:bk,is_landing_page:a,children:[{id:lv,name:"Pijama & Sabahlık",slug:"erkek-pijama-ve-sabahlik",parent:cy,is_landing_page:a,children:[{id:720,name:"Sabahlık",slug:"erkek-sabahlik",parent:lv,is_landing_page:a,children:[]},{id:721,name:rI,slug:"erkek-pijama-takimi",parent:lv,is_landing_page:a,children:[]}]},{id:509,name:qQ,slug:"erkek-ev-giyim",parent:cy,is_landing_page:a,children:[]},{id:eD,name:"Fanila \u002F Atlet",slug:"erkek-fanila-atlet",parent:cy,is_landing_page:a,children:[{id:722,name:"Sporcu Atlet",slug:"erkek-sporcu-atlet",parent:eD,is_landing_page:a,children:[]},{id:723,name:"V Yaka Atlet",slug:"erkek-v-yaka-atlet",parent:eD,is_landing_page:a,children:[]},{id:724,name:"Bisiklet Yaka Atlet",slug:"erkek-bisiklet-yaka-atlet",parent:eD,is_landing_page:a,children:[]},{id:725,name:"U Yaka Atlet",slug:"erkek-u-yaka-atlet",parent:eD,is_landing_page:a,children:[]},{id:726,name:"Fanila ",slug:"erkek-fanila",parent:eD,is_landing_page:a,children:[]},{id:727,name:qB,slug:"erkek-atlet",parent:eD,is_landing_page:a,children:[]}]},{id:iY,name:"Slip \u002F Boxer \u002F Külot",slug:"erkek-slip-boxer-kulot",parent:cy,is_landing_page:a,children:[{id:728,name:"Slip",slug:"erkek-slip",parent:iY,is_landing_page:a,children:[]},{id:729,name:qR,slug:"erkek-boxer",parent:iY,is_landing_page:a,children:[]},{id:730,name:iS,slug:"erkek-kulot",parent:iY,is_landing_page:a,children:[]}]},{id:512,name:"Termai İç giyim",slug:"erkek-termai-ic-giyim",parent:cy,is_landing_page:a,children:[]},{id:513,name:"İçlik",slug:"erkek-iclik",parent:cy,is_landing_page:a,children:[]},{id:lw,name:gY,slug:"erkek-corap",parent:cy,is_landing_page:a,children:[{id:731,name:rA,slug:"erkek-klasik-corap",parent:lw,is_landing_page:a,children:[]},{id:732,name:ry,slug:"erkek-spor-corap",parent:lw,is_landing_page:a,children:[]}]},{id:515,name:"Erkek Fantezi İçgiyim",slug:"erkek-fantezi-icgiyim",parent:cy,is_landing_page:a,children:[]}]},{id:cz,name:rJ,slug:rK,parent:bk,is_landing_page:a,children:[{id:516,name:"Mont & Kaban ",slug:"erkek-buyuk-beden-mont-ve-kaban",parent:cz,is_landing_page:a,children:[]},{id:517,name:"Tişört ",slug:"erkek-buyuk-beden-tisort",parent:cz,is_landing_page:a,children:[]},{id:518,name:"Eşofman & Sweatshirt",slug:"erkek-buyuk-beden-esofman-ve-sweatshirt",parent:cz,is_landing_page:a,children:[]},{id:519,name:fB,slug:"erkek-buyuk-beden-gomlek",parent:cz,is_landing_page:a,children:[]},{id:520,name:"Pantolon & Şort",slug:"erkek-buyuk-beden-pantolon-sort",parent:cz,is_landing_page:a,children:[]},{id:521,name:"Ceket & Deri Ceket",slug:"erkek-buyuk-beden-ceket-ve-deri-ceket",parent:cz,is_landing_page:a,children:[]},{id:522,name:rC,slug:"erkek-buyuk-beden-takim-elbise",parent:cz,is_landing_page:a,children:[]},{id:523,name:rE,slug:"erkek-buyuk-beden-triko",parent:cz,is_landing_page:a,children:[]}]},{id:dS,name:rL,slug:rM,parent:bk,is_landing_page:a,children:[{id:524,name:"Bot & Çizme",slug:"erkek-bot-ve-cizme",parent:dS,is_landing_page:a,children:[]},{id:525,name:"Klasik Ayakkabı",slug:"erkek-klasik-ayakkabi",parent:dS,is_landing_page:a,children:[]},{id:iZ,name:"Günlük Ayakkabı ",slug:"erkek-gunluk-ayakkabi",parent:dS,is_landing_page:a,children:[{id:733,name:"Casual Ayakkabı",slug:"erkek-casual-ayakkabi",parent:iZ,is_landing_page:a,children:[]},{id:734,name:"Loafer ",slug:"erkek-loafer-ayakkabi",parent:iZ,is_landing_page:a,children:[]},{id:735,name:"Oxford ",slug:"erkek-oxford-ayakkabi",parent:iZ,is_landing_page:a,children:[]}]},{id:eE,name:iV,slug:"erkek-spor-ayakkabi",parent:dS,is_landing_page:a,children:[{id:736,name:"Günlük",slug:"erkek-gunluk-spor-ayakkabi",parent:eE,is_landing_page:a,children:[]},{id:737,name:q_,slug:"erkek-yuruyus-kosu-ayakkabisi",parent:eE,is_landing_page:a,children:[]},{id:738,name:"Outdoor \u002F Trekking",slug:"erkek-outdoor-trekking",parent:eE,is_landing_page:a,children:[]},{id:739,name:lx,slug:"erkek-basketbol-ayakkabisi",parent:eE,is_landing_page:a,children:[]},{id:740,name:ly,slug:"krampon-2",parent:eE,is_landing_page:a,children:[]},{id:741,name:q$,slug:"erkek-sneakers-spor-ayakkabi",parent:eE,is_landing_page:a,children:[]}]},{id:528,name:lm,slug:"erkek-sandalet",parent:dS,is_landing_page:a,children:[]},{id:i_,name:ln,slug:"erkek-terlik",parent:dS,is_landing_page:a,children:[{id:742,name:"Parmak Arası",slug:"parmak-arasi",parent:i_,is_landing_page:a,children:[]},{id:743,name:"Günlük Terlik",slug:"gunluk-terlik",parent:i_,is_landing_page:a,children:[]},{id:744,name:rd,slug:"erkek-ev-terligi",parent:i_,is_landing_page:a,children:[]}]}]},{id:aY,name:rN,slug:rO,parent:bk,is_landing_page:a,children:[{id:530,name:rs,slug:"erkek-kemer",parent:aY,is_landing_page:a,children:[]},{id:531,name:"Kravat",slug:"erkek-kravat",parent:aY,is_landing_page:a,children:[]},{id:532,name:"Papyon",slug:"erkek-papyon",parent:aY,is_landing_page:a,children:[]},{id:533,name:rP,slug:"erkek-mendil",parent:aY,is_landing_page:a,children:[]},{id:534,name:rt,slug:"erkek-aksesuar-seti",parent:aY,is_landing_page:a,children:[]},{id:535,name:"Pantolon Askısı",slug:"erkek-pantolon-askisi",parent:aY,is_landing_page:a,children:[]},{id:536,name:rQ,slug:"erkek-sapka",parent:aY,is_landing_page:a,children:[]},{id:537,name:lp,slug:"erkek-semsiye",parent:aY,is_landing_page:a,children:[]},{id:538,name:"Atkı",slug:"erkek-atki",parent:aY,is_landing_page:a,children:[]},{id:539,name:rR,slug:"erkek-bere",parent:aY,is_landing_page:a,children:[]},{id:540,name:iW,slug:"erkek-eldiven",parent:aY,is_landing_page:a,children:[]},{id:541,name:ru,slug:"erkek-anahtarlik",parent:aY,is_landing_page:a,children:[]}]},{id:bJ,name:rS,slug:rT,parent:bk,is_landing_page:a,children:[{id:542,name:rg,slug:"erkek-sirt-cantasi",parent:bJ,is_landing_page:a,children:[]},{id:543,name:"Postacı Çantası",slug:"erkek-postaci-cantasi",parent:bJ,is_landing_page:a,children:[]},{id:544,name:rh,slug:"erkek-omuz-cantasi",parent:bJ,is_landing_page:a,children:[]},{id:545,name:"Spor Çanta",slug:"erkek-spor-canta",parent:bJ,is_landing_page:a,children:[]},{id:546,name:ri,slug:"erkek-seyahat-cantasi",parent:bJ,is_landing_page:a,children:[]},{id:547,name:"Evrak Çantası",slug:"evrak-cantasi",parent:bJ,is_landing_page:a,children:[]},{id:548,name:"El Çantası",slug:"erkek-el-cantasi",parent:bJ,is_landing_page:a,children:[]},{id:549,name:rk,slug:"erkek-bel-cantasi",parent:bJ,is_landing_page:a,children:[]},{id:550,name:rj,slug:"erkek-cuzdan",parent:bJ,is_landing_page:a,children:[]},{id:551,name:"Kartlık",slug:"erkek-kartlik",parent:bJ,is_landing_page:a,children:[]}]}]},{id:fM,name:"Ayakkabı Bakım Koruma Malzemeleri",slug:"ayakkabi-bakim-ve-koruma",parent:aW,is_landing_page:a,children:[{id:370,name:"Ayakkabı Kalıbı",slug:"ayakkabi-kalibi",parent:fM,is_landing_page:a,children:[]},{id:371,name:rU,slug:"ayakkabi-koruma-kutusu",parent:fM,is_landing_page:a,children:[]},{id:372,name:"Bakım & Koruma",slug:"ayakkabi-ve-koruma",parent:fM,is_landing_page:a,children:[]},{id:373,name:"Tabanlık",slug:"ayakkabi-tabanlik",parent:fM,is_landing_page:a,children:[]},{id:374,name:"Onarım Malzemeleri",slug:"ayakkabi-onarim-malzemeleri",parent:fM,is_landing_page:a,children:[]}]},{id:cA,name:rV,slug:rW,parent:aW,is_landing_page:a,children:[{id:rX,name:rY,slug:rZ,parent:cA,is_landing_page:a,children:[]},{id:r_,name:r$,slug:sa,parent:cA,is_landing_page:a,children:[]},{id:sb,name:sc,slug:sd,parent:cA,is_landing_page:a,children:[]},{id:se,name:sf,slug:sg,parent:cA,is_landing_page:a,children:[]}]}],color:i$,styles:sh},{id:bK,name:"Takı & Gözlük & Saat",slug:"taki-gozluk-ve-saat",parent:j,is_landing_page:z,children:[{id:hb,name:"Takı",slug:"taki",parent:bK,is_landing_page:a,children:[{id:dh,name:si,slug:sj,parent:hb,is_landing_page:a,children:[{id:782,name:fN,slug:"yuzuk",parent:dh,is_landing_page:a,children:[]},{id:783,name:hc,slug:"bileklik",parent:dh,is_landing_page:a,children:[]},{id:784,name:fO,slug:"kolye",parent:dh,is_landing_page:a,children:[]},{id:785,name:hd,slug:"kupe",parent:dh,is_landing_page:a,children:[]},{id:786,name:lz,slug:"tesbih",parent:dh,is_landing_page:a,children:[]},{id:787,name:lA,slug:"kol-dugmesi",parent:dh,is_landing_page:a,children:[]},{id:788,name:lB,slug:"kravat-ignesi",parent:dh,is_landing_page:a,children:[]}]},{id:ag,name:"Kadın Takı",slug:"kadin-taki",parent:hb,is_landing_page:a,children:[{id:sk,name:hc,slug:sl,parent:ag,is_landing_page:a,children:[]},{id:790,name:sm,slug:"bilezik",parent:ag,is_landing_page:a,children:[]},{id:sn,name:fO,slug:so,parent:ag,is_landing_page:a,children:[]},{id:792,name:hd,slug:"kadin-kupe",parent:ag,is_landing_page:a,children:[]},{id:793,name:sp,slug:"taki-setleri",parent:ag,is_landing_page:a,children:[]},{id:sq,name:fN,slug:sr,parent:ag,is_landing_page:a,children:[]},{id:795,name:ss,slug:"bros-tac-ve-tarak",parent:ag,is_landing_page:a,children:[]},{id:796,name:st,slug:"halhal",parent:ag,is_landing_page:a,children:[]},{id:797,name:su,slug:"hizma",parent:ag,is_landing_page:a,children:[]},{id:798,name:sv,slug:"piercing",parent:ag,is_landing_page:a,children:[]},{id:799,name:lq,slug:"kadin-sac-aksesuarlari",parent:ag,is_landing_page:a,children:[]},{id:800,name:lC,slug:"kadin-taki-kutusu",parent:ag,is_landing_page:a,children:[]},{id:801,name:sw,slug:"vucut-zinciri",parent:ag,is_landing_page:a,children:[]},{id:802,name:"Çelik Takılar",slug:"celik-takilar",parent:ag,is_landing_page:a,children:[]},{id:803,name:"Dövme Takı",slug:"dovme-taki",parent:ag,is_landing_page:a,children:[]},{id:804,name:sx,slug:"sahmeran",parent:ag,is_landing_page:a,children:[]}]},{id:dT,name:"Kişiye Özel Takılar",slug:"kisiye-ozel-takilar",parent:hb,is_landing_page:a,children:[{id:805,name:fN,slug:"kisiye-ozel-yuzuk",parent:dT,is_landing_page:a,children:[]},{id:806,name:fO,slug:"kisiye-ozel-kolye",parent:dT,is_landing_page:a,children:[]},{id:807,name:hd,slug:"kisiye-ozel-kupe",parent:dT,is_landing_page:a,children:[]},{id:808,name:lz,slug:"kisiye-ozel-tesbih",parent:dT,is_landing_page:a,children:[]},{id:809,name:lA,slug:"kisiye-ozel-kol-dugmesi",parent:dT,is_landing_page:a,children:[]},{id:810,name:lB,slug:"kisiye-ozel-kiravat-ignesi",parent:dT,is_landing_page:a,children:[]},{id:811,name:"Bileklik ve Künye",slug:"bileklik-ve-kunye",parent:dT,is_landing_page:a,children:[]}]}]},{id:fP,name:"Mücevher ve Değerli Taş",slug:sy,parent:bK,is_landing_page:a,children:[{id:cB,name:"Erkek Mücevher",slug:"erkek-mucevher",parent:fP,is_landing_page:a,children:[{id:812,name:lD,slug:"altin-yuzuk",parent:cB,is_landing_page:a,children:[]},{id:sz,name:ja,slug:sA,parent:cB,is_landing_page:a,children:[]},{id:sB,name:lE,slug:sC,parent:cB,is_landing_page:a,children:[]},{id:815,name:sD,slug:"altin-kupe",parent:cB,is_landing_page:a,children:[]},{id:816,name:"Altın Tesbih",slug:"altin-tesbih",parent:cB,is_landing_page:a,children:[]},{id:817,name:"Altın Kol Düğmesi",slug:"altin-kol-dugmesi",parent:cB,is_landing_page:a,children:[]},{id:818,name:"Altın Kravat İğnesi",slug:"altin-kravat-ignesi",parent:cB,is_landing_page:a,children:[]}]},{id:av,name:"Kadın Mücevher",slug:"kadin-mucevher",parent:fP,is_landing_page:a,children:[{id:sE,name:ja,slug:sF,parent:av,is_landing_page:a,children:[]},{id:820,name:"Altın Bilezik",slug:"altin-bilezik",parent:av,is_landing_page:a,children:[]},{id:821,name:"Altın Künye",slug:"altin-kunye",parent:av,is_landing_page:a,children:[]},{id:822,name:lE,slug:"kadin-altin-kolye",parent:av,is_landing_page:a,children:[]},{id:823,name:sD,slug:"kadin-altin-kupe",parent:av,is_landing_page:a,children:[]},{id:824,name:"Altın Takı Setleri",slug:"altin-taki-setleri",parent:av,is_landing_page:a,children:[]},{id:sG,name:lD,slug:sH,parent:av,is_landing_page:a,children:[]},{id:826,name:"Altın Broş, Taç ve Tarak",slug:"altin-bros-tac-ve-tarak",parent:av,is_landing_page:a,children:[]},{id:827,name:"Altın Halhal",slug:"altin-halhal",parent:av,is_landing_page:a,children:[]},{id:828,name:"Altın Hızma",slug:"altin-hizma",parent:av,is_landing_page:a,children:[]},{id:829,name:"Altın Piercing",slug:"altin-piercing",parent:av,is_landing_page:a,children:[]},{id:830,name:"Altın Saç Aksesuarları",slug:"altin-sac-aksesuarlari",parent:av,is_landing_page:a,children:[]},{id:831,name:"Altın Vücut Zinciri",slug:"altin-vucut-zinciri",parent:av,is_landing_page:a,children:[]},{id:832,name:"Altın Şahmeran",slug:"altin-sahmeran",parent:av,is_landing_page:a,children:[]}]},{id:764,name:"Değerli Taşlar",slug:"degerli-taslar",parent:fP,is_landing_page:a,children:[]},{id:he,name:"Bebek Takıları",slug:"bebek-takilari",parent:fP,is_landing_page:a,children:[{id:833,name:"Altın Emzik ve Biberon",slug:"altin-emzik-ve-biberon",parent:he,is_landing_page:a,children:[]},{id:834,name:"Altın İğneler",slug:"altin-igneler",parent:he,is_landing_page:a,children:[]},{id:835,name:"Altın Bebek Bilezik - Bileklik - Künye",slug:"altin-bebek-bilezik-bileklik-kunye",parent:he,is_landing_page:a,children:[]},{id:836,name:"Altın Nazar Boncukları",slug:"altin-nazar-boncuklari",parent:he,is_landing_page:a,children:[]}]}]},{id:eF,name:"Saat",slug:sI,parent:bK,is_landing_page:a,children:[{id:766,name:"Erkek Kol Saatleri",slug:"erkek-kol-saatleri",parent:eF,is_landing_page:a,children:[]},{id:767,name:"Kadın Kol Saatleri",slug:"kadin-kol-saatleri",parent:eF,is_landing_page:a,children:[]},{id:768,name:"Unisex Kol Saatleri",slug:"unisex-kol-saatleri",parent:eF,is_landing_page:a,children:[]},{id:769,name:"Çocuk Saatleri",slug:"cocuk-saatleri",parent:eF,is_landing_page:a,children:[]},{id:770,name:"Saat Aksesuarları",slug:"saat-aksesuarlari",parent:eF,is_landing_page:a,children:[]}]},{id:ce,name:sJ,slug:sK,parent:bK,is_landing_page:a,children:[{id:sL,name:sM,slug:sN,parent:ce,is_landing_page:a,children:[]},{id:sO,name:sP,slug:sQ,parent:ce,is_landing_page:a,children:[]},{id:sR,name:sS,slug:sT,parent:ce,is_landing_page:a,children:[]},{id:sU,name:sV,slug:sW,parent:ce,is_landing_page:a,children:[]},{id:775,name:"Gözlük Aksesuarları",slug:"gozluk-aksesuarlari",parent:ce,is_landing_page:a,children:[]}]},{id:hf,name:sX,slug:sY,parent:bK,is_landing_page:a,children:[{id:eG,name:"Ziynet Altın",slug:"ziynet-altin",parent:hf,is_landing_page:a,children:[{id:sZ,name:s_,slug:s$,parent:eG,is_landing_page:a,children:[]},{id:ta,name:tb,slug:tc,parent:eG,is_landing_page:a,children:[]},{id:td,name:te,slug:tf,parent:eG,is_landing_page:a,children:[]}]},{id:777,name:"Cumhuriyet Altını",slug:"cumhuriyet-altini",parent:hf,is_landing_page:a,children:[]},{id:eH,name:"Gram ve Külçe Altın",slug:"gram-ve-kulce-altin",parent:hf,is_landing_page:a,children:[{id:840,name:"22 Ayar Gram Altın",slug:"22-ayar-gram-altin",parent:eH,is_landing_page:a,children:[]},{id:tg,name:th,slug:ti,parent:eH,is_landing_page:a,children:[]},{id:tj,name:tk,slug:tl,parent:eH,is_landing_page:a,children:[]},{id:7218,name:"Gram ve Külçe Gümüş",slug:"gram-ve-külce-gümüs",parent:eH,is_landing_page:a,children:[]}]}]},{id:jb,name:"Gümüş",slug:"gumus",parent:bK,is_landing_page:a,children:[{id:dU,name:"Erkek Gümüş",slug:"erkek-gumus",parent:jb,is_landing_page:a,children:[{id:843,name:fN,slug:"erkek-gumus-yuzuk",parent:dU,is_landing_page:a,children:[]},{id:844,name:hc,slug:"erkek-gumus-bileklik",parent:dU,is_landing_page:a,children:[]},{id:845,name:fO,slug:"erkek-gumus-kolye",parent:dU,is_landing_page:a,children:[]},{id:846,name:hd,slug:"erkek-gumus-kupe",parent:dU,is_landing_page:a,children:[]},{id:847,name:lz,slug:"erkek-gumus-tesbih",parent:dU,is_landing_page:a,children:[]},{id:848,name:lA,slug:"erkek-gumus-kol-dugmesi",parent:dU,is_landing_page:a,children:[]},{id:849,name:lB,slug:"erkek-gumus-kiravat-ignesi",parent:dU,is_landing_page:a,children:[]}]},{id:aZ,name:"Kadın Gümüş",slug:"kadin-gumus",parent:jb,is_landing_page:a,children:[{id:850,name:hc,slug:"kadin-gumus-bileklik",parent:aZ,is_landing_page:a,children:[]},{id:851,name:sm,slug:"kadin-gumus-bilezik",parent:aZ,is_landing_page:a,children:[]},{id:852,name:fO,slug:"kadin-gumus-kolye",parent:aZ,is_landing_page:a,children:[]},{id:853,name:hd,slug:"kadin-gumus-kupe",parent:aZ,is_landing_page:a,children:[]},{id:854,name:sp,slug:"kadin-gumus-taki-set",parent:aZ,is_landing_page:a,children:[]},{id:855,name:fN,slug:"kadin-gumus-yuzuk",parent:aZ,is_landing_page:a,children:[]},{id:856,name:ss,slug:"kadin-gumus-bros-tac-tarak",parent:aZ,is_landing_page:a,children:[]},{id:857,name:st,slug:"kadin-gumus-halhal",parent:aZ,is_landing_page:a,children:[]},{id:858,name:su,slug:"kadin-gumus-hizma",parent:aZ,is_landing_page:a,children:[]},{id:859,name:sv,slug:"kadin-gumus-piercing",parent:aZ,is_landing_page:a,children:[]},{id:860,name:lq,slug:"kadin-gumus-sac-aksesuar",parent:aZ,is_landing_page:a,children:[]},{id:861,name:sw,slug:"kadin-gumus-vucut-zincir",parent:aZ,is_landing_page:a,children:[]},{id:862,name:sx,slug:"kadin-gumus-sahmeran",parent:aZ,is_landing_page:a,children:[]}]},{id:hg,name:"Çocuk Gümüş",slug:"cocuk-gumus",parent:jb,is_landing_page:a,children:[{id:864,name:"Gümüş Emzik ve Biberon",slug:"gumus-emzik-ve-biberon",parent:hg,is_landing_page:a,children:[]},{id:865,name:"Gümüş İğneler",slug:"gumus-igneler",parent:hg,is_landing_page:a,children:[]},{id:866,name:"Gümüş Bebek Bilezik - Bileklik - Künye",slug:"gumus-bebek-bilezik-bileklik-kunye",parent:hg,is_landing_page:a,children:[]},{id:867,name:"Gümüş Nazar Boncukları",slug:"gumus-nazar-boncuklari",parent:hg,is_landing_page:a,children:[]}]}]}],color:lF,styles:{fontSize:lG}},{id:fQ,name:"Kozmetik & Kişisel Bakım",slug:tm,parent:j,is_landing_page:z,children:[{id:aw,name:"Kozmetik",slug:"kozmetik",parent:fQ,is_landing_page:a,children:[{id:dV,name:jc,slug:tn,parent:aw,is_landing_page:a,children:[{id:hh,name:to,slug:tp,parent:dV,is_landing_page:a,children:[{id:871,name:jc,slug:"erkek-parfum",parent:hh,is_landing_page:a,children:[]},{id:872,name:lH,slug:"setler",parent:hh,is_landing_page:a,children:[]},{id:873,name:tq,slug:"parfum-deodorantlar",parent:hh,is_landing_page:a,children:[]}]},{id:fR,name:tr,slug:ts,parent:dV,is_landing_page:a,children:[{id:875,name:jc,slug:"kadin-parfum",parent:fR,is_landing_page:a,children:[]},{id:876,name:lH,slug:"kadin-parfum-set",parent:fR,is_landing_page:a,children:[]},{id:877,name:tq,slug:"kadin-deodorant-2",parent:fR,is_landing_page:a,children:[]},{id:878,name:"Vücut Spreyi & Parfümü",slug:"kadin-vucut-spreyi-ve-parfumu",parent:fR,is_landing_page:a,children:[]}]},{id:tt,name:tu,slug:tv,parent:dV,is_landing_page:a,children:[]}]},{id:aj,name:tw,slug:tx,parent:aw,is_landing_page:a,children:[{id:cf,name:ty,slug:tz,parent:aj,is_landing_page:a,children:[{id:882,name:tA,slug:"nemlendiriciler",parent:cf,is_landing_page:a,children:[]},{id:fS,name:"Anti-aging \u002F Kırışıklık Karşıtı",slug:"anti-aging-kirisiklik-karsiti",parent:cf,is_landing_page:a,children:[{id:884,name:"Gündüz Kremleri",slug:"gunduz-kremleri",parent:fS,is_landing_page:a,children:[]},{id:885,name:"Gece Kremleri",slug:"gece-kremleri",parent:fS,is_landing_page:a,children:[]},{id:886,name:"Serumlar",slug:"serumlar",parent:fS,is_landing_page:a,children:[]},{id:887,name:"Kırışıklık Karşıtı Ürünler",slug:"kirisiklik-karsiti-urunler",parent:fS,is_landing_page:a,children:[]},{id:888,name:lH,slug:"kirisiklik-karsiti-anti-aging-yuz-bakim-set",parent:fS,is_landing_page:a,children:[]}]},{id:fT,name:"Temizleyiciler ve Tonikler",slug:"temizleyiciler-ve-tonikler",parent:cf,is_landing_page:a,children:[{id:890,name:"Temizleyici Mendiller ve Bantlar",slug:"temizleyici-mendiller-ve-bantlar",parent:fT,is_landing_page:a,children:[]},{id:891,name:"Jel ve Sabunlar",slug:"jel-ve-sabunlar",parent:fT,is_landing_page:a,children:[]},{id:892,name:lI,slug:"kopuk-yuz-temizleyici-ve-tonik",parent:fT,is_landing_page:a,children:[]},{id:893,name:"Krem\u002FSüt",slug:"krem-sut",parent:fT,is_landing_page:a,children:[]},{id:894,name:"Tonikler",slug:"tonikler",parent:fT,is_landing_page:a,children:[]}]},{id:895,name:"Akne \u002F Gözenek Kontrolü",slug:"akne-gozenek-kontrolu",parent:cf,is_landing_page:a,children:[]},{id:896,name:lJ,slug:"maskeler",parent:cf,is_landing_page:a,children:[]},{id:897,name:tB,slug:"peeling-urunleri",parent:cf,is_landing_page:a,children:[]},{id:898,name:"Leke Gidericiler",slug:"leke-gidericiler",parent:cf,is_landing_page:a,children:[]},{id:899,name:"Boyun ve Dekolte Bakımı",slug:"boyun-ve-dekolte-bakimi",parent:cf,is_landing_page:a,children:[]},{id:900,name:"Yüz Temizleme Cihazları",slug:"yuz-temizleme-cihazlari",parent:cf,is_landing_page:a,children:[]}]},{id:eI,name:"Göz Bakımı",slug:"goz-bakimi",parent:aj,is_landing_page:a,children:[{id:902,name:"Göz Kremi",slug:"goz-kremi",parent:eI,is_landing_page:a,children:[]},{id:903,name:"Göz Anti-Aging Bakımı",slug:"goz-anti-aging-bakimi",parent:eI,is_landing_page:a,children:[]},{id:904,name:"Göz Altı Torbası & Morluk Bakımı",slug:"goz-alti-torbasi-ve-morluk-bakimi",parent:eI,is_landing_page:a,children:[]},{id:905,name:"Göz Serumu",slug:"goz-serumu",parent:eI,is_landing_page:a,children:[]},{id:906,name:"Göz Maskesi",slug:"goz-maskesi",parent:eI,is_landing_page:a,children:[]},{id:907,name:"Kaş & Kirpik Bakımı",slug:"kas-ve-kirpik-bakimi",parent:eI,is_landing_page:a,children:[]}]},{id:tC,name:tD,slug:tE,parent:aj,is_landing_page:a,children:[]},{id:eJ,name:tF,slug:tG,parent:aj,is_landing_page:a,children:[{id:910,name:tA,slug:"nemlendirici-vucut-bakim",parent:eJ,is_landing_page:a,children:[]},{id:911,name:"Temizleyiciler",slug:"temizleyiciler",parent:eJ,is_landing_page:a,children:[]},{id:912,name:"Selülit Giderici \u002F Sıkılaştırıcılar ve Çatlak Bakımı",slug:"selulit-giderici-sikilastiricilar-ve-catlak-bakimi",parent:eJ,is_landing_page:a,children:[]},{id:913,name:"Göğüs Bakım Ürünleri",slug:"gogus-bakim-urunleri",parent:eJ,is_landing_page:a,children:[]},{id:914,name:tB,slug:"vucut-bakim-peeling",parent:eJ,is_landing_page:a,children:[]}]},{id:tH,name:tI,slug:tJ,parent:aj,is_landing_page:a,children:[]},{id:jd,name:tK,slug:tL,parent:aj,is_landing_page:a,children:[{id:917,name:"El Kremi",slug:"el-kremi",parent:jd,is_landing_page:a,children:[]},{id:918,name:"Ayak Bakım Ürünleri",slug:"ayak-bakim-urunleri",parent:jd,is_landing_page:a,children:[]}]},{id:tM,name:tN,slug:tO,parent:aj,is_landing_page:a,children:[]},{id:tP,name:tQ,slug:tR,parent:aj,is_landing_page:a,children:[]},{id:tS,name:tT,slug:tU,parent:aj,is_landing_page:a,children:[]}]},{id:aL,name:tV,slug:tW,parent:aw,is_landing_page:a,children:[{id:cg,name:tX,slug:tY,parent:aL,is_landing_page:a,children:[{id:je,name:"Fondöten",slug:"fondoten",parent:cg,is_landing_page:a,children:[{id:925,name:tZ,slug:"pudra",parent:je,is_landing_page:a,children:[]},{id:926,name:hi,slug:"krem",parent:je,is_landing_page:a,children:[]},{id:927,name:"Likit",slug:"likit",parent:je,is_landing_page:a,children:[]}]},{id:928,name:tZ,slug:"pudra-yuz",parent:cg,is_landing_page:a,children:[]},{id:929,name:"Kapatıcı",slug:"kapatici",parent:cg,is_landing_page:a,children:[]},{id:930,name:"Makyaj Bazları",slug:"makyaj-bazlari",parent:cg,is_landing_page:a,children:[]},{id:931,name:"Aydınlatıcılar",slug:"aydinlaticilar",parent:cg,is_landing_page:a,children:[]},{id:932,name:"Allıklar",slug:"alliklar",parent:cg,is_landing_page:a,children:[]},{id:933,name:"BB Kremler",slug:"bb-kremler",parent:cg,is_landing_page:a,children:[]},{id:934,name:"CC Kremler",slug:"cc-kremler",parent:cg,is_landing_page:a,children:[]},{id:935,name:"DD Kremler",slug:"dd-kremler",parent:cg,is_landing_page:a,children:[]}]},{id:cC,name:t_,slug:t$,parent:aL,is_landing_page:a,children:[{id:937,name:"Maskara",slug:"maskara",parent:cC,is_landing_page:a,children:[]},{id:938,name:"Eyeliner",slug:"eyeliner",parent:cC,is_landing_page:a,children:[]},{id:939,name:"Göz Farı",slug:"goz-fari",parent:cC,is_landing_page:a,children:[]},{id:940,name:"Göz Kalemi",slug:"goz-kalemi",parent:cC,is_landing_page:a,children:[]},{id:941,name:"Göz Makyaj Temizleyicileri",slug:"goz-makyaj-temizleyicileri",parent:cC,is_landing_page:a,children:[]},{id:942,name:"Takma Kirpikler",slug:"takma-kirpikler",parent:cC,is_landing_page:a,children:[]},{id:943,name:"Kaş Makyajı",slug:"kas-makyaji",parent:cC,is_landing_page:a,children:[]},{id:944,name:"Kapatıcılar",slug:"kapaticilar",parent:cC,is_landing_page:a,children:[]}]},{id:hj,name:ua,slug:ub,parent:aL,is_landing_page:a,children:[{id:4216,name:"Rujlar",slug:"rujlar-2",parent:hj,is_landing_page:a,children:[]},{id:4221,name:"Dudak Parlatıcıları",slug:"dudak-parlaticilari-2",parent:hj,is_landing_page:a,children:[]},{id:4224,name:"Dudak Kalemleri",slug:"dudak-kalemleri-2",parent:hj,is_landing_page:a,children:[]}]},{id:fU,name:"Tırnaklar",slug:"tirnaklar",parent:aL,is_landing_page:a,children:[{id:950,name:"Oje",slug:"oje",parent:fU,is_landing_page:a,children:[]},{id:951,name:"Aseton",slug:"aseton",parent:fU,is_landing_page:a,children:[]},{id:952,name:"Oje Kurutucu",slug:"oje-kurutucu",parent:fU,is_landing_page:a,children:[]},{id:953,name:"Takma Tırnak",slug:"takma-tirnak",parent:fU,is_landing_page:a,children:[]},{id:954,name:"Tırnak Bakımı",slug:"tirnak-bakimi",parent:fU,is_landing_page:a,children:[]}]},{id:jf,name:uc,slug:ud,parent:aL,is_landing_page:a,children:[{id:956,name:"Makyaj Temizleme Ürünleri",slug:"makyaj-temizleme-urunleri",parent:jf,is_landing_page:a,children:[]},{id:957,name:"Makyaj Temizleme Mendilleri & Pamukları",slug:"makyaj-temizleme-mendilleri-ve-pamuklari",parent:jf,is_landing_page:a,children:[]}]},{id:ue,name:uf,slug:ug,parent:aL,is_landing_page:a,children:[]},{id:uh,name:ui,slug:uj,parent:aL,is_landing_page:a,children:[]}]},{id:uk,name:ul,slug:um,parent:aw,is_landing_page:a,children:[]},{id:bL,name:un,slug:uo,parent:aw,is_landing_page:a,children:[{id:966,name:hi,slug:"gunes-kremi",parent:bL,is_landing_page:a,children:[]},{id:967,name:jg,slug:"sprey",parent:bL,is_landing_page:a,children:[]},{id:968,name:hk,slug:"losyon",parent:bL,is_landing_page:a,children:[]},{id:969,name:jh,slug:"sut",parent:bL,is_landing_page:a,children:[]},{id:970,name:hl,slug:"gunes-yagi",parent:bL,is_landing_page:a,children:[]},{id:971,name:lK,slug:"jel",parent:bL,is_landing_page:a,children:[]},{id:972,name:"Bb Krem",slug:"bb-krem",parent:bL,is_landing_page:a,children:[]},{id:973,name:lI,slug:"kopuk-krem-ve-losyonlar",parent:bL,is_landing_page:a,children:[]},{id:974,name:up,slug:"stick",parent:bL,is_landing_page:a,children:[]},{id:975,name:uq,slug:"su",parent:bL,is_landing_page:a,children:[]}]},{id:di,name:ur,slug:us,parent:aw,is_landing_page:a,children:[{id:977,name:hk,slug:"gunes-sonrasi-losyon",parent:di,is_landing_page:a,children:[]},{id:978,name:hi,slug:"gunes-sonrasi-krem",parent:di,is_landing_page:a,children:[]},{id:979,name:jg,slug:"gunes-sonrasi-sprey",parent:di,is_landing_page:a,children:[]},{id:980,name:lK,slug:"gunes-sonrasi-jel",parent:di,is_landing_page:a,children:[]},{id:981,name:jh,slug:"gunes-sonrasi-sut",parent:di,is_landing_page:a,children:[]},{id:982,name:"Balsam",slug:"balsam",parent:di,is_landing_page:a,children:[]},{id:983,name:hl,slug:"gunes-sonrasi-yag",parent:di,is_landing_page:a,children:[]}]},{id:cD,name:ut,slug:uu,parent:aw,is_landing_page:a,children:[{id:985,name:hl,slug:"bronzlastirici-yag",parent:cD,is_landing_page:a,children:[]},{id:986,name:hi,slug:"bronzlastirici-krem",parent:cD,is_landing_page:a,children:[]},{id:987,name:jg,slug:"bronzlastirici-sprey",parent:cD,is_landing_page:a,children:[]},{id:988,name:jh,slug:"bronzlastirici-sut",parent:cD,is_landing_page:a,children:[]},{id:989,name:hk,slug:"bronzlastirici-losyon",parent:cD,is_landing_page:a,children:[]},{id:990,name:lK,slug:"bronzlastirici-jel",parent:cD,is_landing_page:a,children:[]},{id:991,name:rP,slug:"bronzlastirici-mendil",parent:cD,is_landing_page:a,children:[]},{id:992,name:uq,slug:"bronzlastirici-su",parent:cD,is_landing_page:a,children:[]}]},{id:dW,name:uv,slug:uw,parent:aw,is_landing_page:a,children:[{id:994,name:hi,slug:"cocuk-gunes-krem",parent:dW,is_landing_page:a,children:[]},{id:995,name:jg,slug:"cocuk-gunes-sprey",parent:dW,is_landing_page:a,children:[]},{id:996,name:hk,slug:"cocuk-gunes-losyon",parent:dW,is_landing_page:a,children:[]},{id:997,name:jh,slug:"cocuk-gunes-sut",parent:dW,is_landing_page:a,children:[]},{id:998,name:lI,slug:"cocuk-gunes-kopuk",parent:dW,is_landing_page:a,children:[]},{id:999,name:hl,slug:"cocuk-gunes-yagi",parent:dW,is_landing_page:a,children:[]}]}]},{id:lL,name:ux,slug:uy,parent:fQ,is_landing_page:a,children:[{id:p,name:"Kişisel Bakım Ürünleri",slug:"kisisel-bakim-urunleri",parent:lL,is_landing_page:a,children:[{id:bl,name:uz,slug:uA,parent:p,is_landing_page:a,children:[{id:1003,name:"Tıraş Makinesi",slug:"tiras-makinesi",parent:bl,is_landing_page:a,children:[]},{id:uB,name:uC,slug:uD,parent:bl,is_landing_page:a,children:[]},{id:uE,name:uF,slug:uG,parent:bl,is_landing_page:a,children:[]},{id:uH,name:uI,slug:uJ,parent:bl,is_landing_page:a,children:[]},{id:uK,name:uL,slug:uM,parent:bl,is_landing_page:a,children:[]},{id:1008,name:"Tıraş Fırçaları",slug:"tiras-fircalari",parent:bl,is_landing_page:a,children:[]},{id:1009,name:"Tıraş Makinesi Yedek Parçaları",slug:"tiras-makinesi-yedek-parcalari",parent:bl,is_landing_page:a,children:[]}]},{id:eK,name:uN,slug:uO,parent:p,is_landing_page:a,children:[{id:uP,name:"Diş Fırçaları",slug:"dis-fircalari",parent:eK,is_landing_page:a,children:[{id:4176,name:"Elektrikli Diş Fırçaları",slug:"elektrikli-dis-fircalari",parent:uP,is_landing_page:a,children:[]}]},{id:1012,name:"Diş Macunları Ve Macun Sıkma Makineleri",slug:"dis-macunlari-ve-macun-sikma-makineleri",parent:eK,is_landing_page:a,children:[]},{id:1013,name:"Diş Parlatıcılar Ve Beyazlatma Sistemleri",slug:"dis-parlaticilar-ve-beyazlatma-sistemleri",parent:eK,is_landing_page:a,children:[]},{id:1014,name:"Diş İpleri",slug:"dis-ipleri",parent:eK,is_landing_page:a,children:[]},{id:1015,name:"Ağız Gargaraları",slug:"agiz-gargaralari",parent:eK,is_landing_page:a,children:[]}]},{id:cE,name:uQ,slug:uR,parent:p,is_landing_page:a,children:[{id:1017,name:"Epilatörler",slug:"epilatorler",parent:cE,is_landing_page:a,children:[]},{id:1018,name:"IPL Cihazları",slug:"ipl-cihazlari",parent:cE,is_landing_page:a,children:[]},{id:1019,name:"Tüy Dökücüler",slug:"tuy-dokuculer",parent:cE,is_landing_page:a,children:[]},{id:1020,name:"Ağda Malzemeleri",slug:"agda-malzemeleri",parent:cE,is_landing_page:a,children:[]},{id:1021,name:"Sir Ağda",slug:"sir-agda",parent:cE,is_landing_page:a,children:[]},{id:1022,name:"Kadın Tıraş Ürünleri",slug:"kadin-tiras-urunleri",parent:cE,is_landing_page:a,children:[]},{id:1023,name:"Kaş-Bıyık Alma Aletleri",slug:"kas-biyik-alma-aletleri",parent:cE,is_landing_page:a,children:[]},{id:1024,name:"Epilatör Başlıkları ve Yedek Parçalar",slug:"epilator-basliklari-ve-yedek-parcalar",parent:cE,is_landing_page:a,children:[]}]},{id:aB,name:uS,slug:uT,parent:p,is_landing_page:a,children:[{id:1026,name:"Saç Şekillendirme Cihazları",slug:"sac-sekillendirme-cihazlari",parent:aB,is_landing_page:a,children:[]},{id:1027,name:"Saç Kurutma Makineleri",slug:"sac-kurutma-makineleri",parent:aB,is_landing_page:a,children:[]},{id:1028,name:uU,slug:"sampuanlar",parent:aB,is_landing_page:a,children:[]},{id:1029,name:"Saç Maskeleri,Bakım Krem,Losyon Ve Spreyleri",slug:"sac-maskeleri-bakim-krem-losyon-ve-spreyleri",parent:aB,is_landing_page:a,children:[]},{id:1030,name:"Saç Dökülmesine Karşı Ürünler",slug:"sac-dokulmesine-karsi-urunler",parent:aB,is_landing_page:a,children:[]},{id:1031,name:"Saç Boyaları Ve Beyazlık Giderici Ürünler",slug:"sac-boyalari-ve-beyazlik-giderici-urunler",parent:aB,is_landing_page:a,children:[]},{id:1032,name:"Saç Kremleri",slug:"sac-kremleri",parent:aB,is_landing_page:a,children:[]},{id:1033,name:"Saç Spreyleri",slug:"sac-spreyleri",parent:aB,is_landing_page:a,children:[]},{id:1034,name:"Saç Fırçaları Ve Aksesuarlar",slug:"sac-fircalari-ve-aksesuarlar",parent:aB,is_landing_page:a,children:[]},{id:1035,name:"Şekillendirici Kremler Ve Waxlar",slug:"sekillendirici-kremler-ve-waxlar",parent:aB,is_landing_page:a,children:[]},{id:1036,name:"Jöleler",slug:"joleler",parent:aB,is_landing_page:a,children:[]},{id:1037,name:"Saç Köpükleri",slug:"sac-kopukleri",parent:aB,is_landing_page:a,children:[]},{id:1038,name:"Saç Fototerapi Cihazları",slug:"sac-fototerapi-cihazlari",parent:aB,is_landing_page:a,children:[]},{id:1039,name:"Kuru Şampuanlar",slug:"kuru-sampuanlar",parent:aB,is_landing_page:a,children:[]}]},{id:ac,name:uV,slug:uW,parent:p,is_landing_page:a,children:[{id:1045,name:"Tansiyon Aletleri",slug:"tansiyon-aletleri",parent:ac,is_landing_page:a,children:[]},{id:1046,name:"Form Ürünleri",slug:"form-urunleri",parent:ac,is_landing_page:a,children:[]},{id:1047,name:"Baskül Ve Teraziler,Vücut Analiz Cihazları",slug:"baskul-ve-teraziler-vucut-analiz-cihazlari",parent:ac,is_landing_page:a,children:[]},{id:1048,name:"Ateş Ölçerler",slug:"ates-olcerler",parent:ac,is_landing_page:a,children:[]},{id:1049,name:"Masaj Aletleri",slug:"masaj-aletleri",parent:ac,is_landing_page:a,children:[]},{id:1050,name:"Tens Cihazı",slug:"tens-cihazi",parent:ac,is_landing_page:a,children:[]},{id:1051,name:"Alerji Ve Enfeksiyon Ürünleri",slug:"alerji-ve-enfeksiyon-urunleri",parent:ac,is_landing_page:a,children:[]},{id:1052,name:"Horlama Önleyiciler",slug:"horlama-onleyiciler",parent:ac,is_landing_page:a,children:[]},{id:1053,name:"Pedometreler (Adımsayarlar)",slug:"pedometreler-adimsayarlar",parent:ac,is_landing_page:a,children:[]},{id:1054,name:"Ayak Sağlığı Ve El Terapi Ürünleri",slug:"ayak-sagligi-ve-el-terapi-urunleri",parent:ac,is_landing_page:a,children:[]},{id:1055,name:"Termoforlar Ve Isıtma Ürünleri",slug:"termoforlar-ve-isitma-urunleri",parent:ac,is_landing_page:a,children:[]},{id:1056,name:"Kolonyalar",slug:"kolonyalar",parent:ac,is_landing_page:a,children:[]},{id:1057,name:"Kulak Temizleme Ürünleri",slug:"kulak-temizleme-urunleri",parent:ac,is_landing_page:a,children:[]},{id:1058,name:"İlk Yardım Ürünleri",slug:"ilk-yardim-urunleri",parent:ac,is_landing_page:a,children:[]},{id:1059,name:"Dezenfektanlar",slug:"dezenfektanlar",parent:ac,is_landing_page:a,children:[]},{id:1060,name:"Hasta Temizlik Ürünleri",slug:"hasta-temizlik-urunleri",parent:ac,is_landing_page:a,children:[]},{id:1061,name:"Hasta Bezleri",slug:"hasta-bezleri",parent:ac,is_landing_page:a,children:[]},{id:1062,name:"Hava Nemlendirme Cihazları,Oksimetreler",slug:"hava-nemlendirme-cihazlari-oksimetreler",parent:ac,is_landing_page:a,children:[]},{id:1063,name:"Ter Önleyici Pedler",slug:"ter-onleyici-pedler",parent:ac,is_landing_page:a,children:[]}]},{id:dj,name:uX,slug:uY,parent:p,is_landing_page:a,children:[{id:1065,name:"Sabunlar",slug:"sabunlar",parent:dj,is_landing_page:a,children:[]},{id:1066,name:"Duş Jelleri",slug:"dus-jelleri",parent:dj,is_landing_page:a,children:[]},{id:1067,name:"Banyo Tuzları, Köpükleri ve Yağları",slug:"banyo-tuzlari-kopukleri-ve-yaglari",parent:dj,is_landing_page:a,children:[]},{id:1068,name:"Aynalar ve Banyo Aksesuarları",slug:"aynalar-ve-banyo-aksesuarlari",parent:dj,is_landing_page:a,children:[]},{id:1069,name:"Banyo Fırçaları, Süngerleri ve Lifleri",slug:"banyo-fircalari-sungerleri-ve-lifleri",parent:dj,is_landing_page:a,children:[]},{id:1070,name:"Antibakteriyel Sabunlar",slug:"antibakteriyel-sabunlar",parent:dj,is_landing_page:a,children:[]},{id:1071,name:"Masaj Yağları",slug:"masaj-yaglari",parent:dj,is_landing_page:a,children:[]}]},{id:dX,name:uZ,slug:u_,parent:p,is_landing_page:a,children:[{id:1073,name:"Ayak Kokusu Önleme",slug:"ayak-kokusu-onleme",parent:dX,is_landing_page:a,children:[]},{id:1074,name:"Nasır ve Mantar Ürünleri",slug:"nasir-ve-mantar-urunleri",parent:dX,is_landing_page:a,children:[]},{id:1075,name:"Koruyucu Ürünler",slug:"koruyucu-urunler",parent:dX,is_landing_page:a,children:[]},{id:1076,name:"Bakım Cihazları",slug:"bakim-cihazlari",parent:dX,is_landing_page:a,children:[]},{id:1077,name:"Diğer Ürünler",slug:"diger-urunler",parent:dX,is_landing_page:a,children:[]},{id:1078,name:"Manikür & Pedikür",slug:"manikur-ve-pedikur",parent:dX,is_landing_page:a,children:[]}]},{id:ji,name:"Kadın Pedleri & Hijyen Ürünleri",slug:"kadin-pedleri-ve-hijyen-urunleri",parent:p,is_landing_page:a,children:[{id:1080,name:"Genital Bölge Bakımı",slug:"genital-bolge-bakimi",parent:ji,is_landing_page:a,children:[]},{id:1081,name:"Cilt Terapi Ürünleri",slug:"cilt-terapi-urunleri",parent:ji,is_landing_page:a,children:[]},{id:1082,name:"Hijyenik Pedler",slug:"hijyenik-pedler",parent:ji,is_landing_page:a,children:[]}]},{id:lM,name:"Deodorant",slug:"deodorant",parent:p,is_landing_page:a,children:[{id:1084,name:"Erkek Deodorant",slug:"erkek-deodorant",parent:lM,is_landing_page:a,children:[]},{id:1085,name:"Kadın Deodorant",slug:"kadin-deodorant",parent:lM,is_landing_page:a,children:[]}]},{id:hm,name:u$,slug:va,parent:p,is_landing_page:a,children:[{id:1087,name:"Ortopedi Ürünleri",slug:"ortopedi-urunleri",parent:hm,is_landing_page:a,children:[]},{id:1088,name:"Astım Ürünleri Ve Nebulizatörler",slug:"astim-urunleri-ve-nebulizatorler",parent:hm,is_landing_page:a,children:[]},{id:1089,name:"Hastane Ve Hasta Bakım Ürünleri",slug:"hastane-ve-hasta-bakim-urunleri",parent:hm,is_landing_page:a,children:[]}]},{id:vb,name:lN,slug:vc,parent:p,is_landing_page:a,children:[]},{id:vd,name:ve,slug:vf,parent:p,is_landing_page:a,children:[]},{id:dk,name:"Güzellik Salonu & Kuaför Ürünleri",slug:"guzellik-salonu-ve-kuafor-urunleri",parent:p,is_landing_page:a,children:[{id:1094,name:"Salon Mobilyaları",slug:"salon-mobilyalari",parent:dk,is_landing_page:a,children:[]},{id:1095,name:"Saç Peruk & Kaynakları",slug:"sac-ve-peruk-kaynaklari",parent:dk,is_landing_page:a,children:[]},{id:1096,name:"Salon, Makas ve Ekipmanları",slug:"salon-makas-ve-ekipmanlari",parent:dk,is_landing_page:a,children:[]},{id:1097,name:"El & Ayak Bakım Ürünleri",slug:"el-ve-ayak-bakim-urunleri",parent:dk,is_landing_page:a,children:[]},{id:1098,name:"Boya & Saç Açıcılar",slug:"boya-ve-sac-acicilar",parent:dk,is_landing_page:a,children:[]},{id:1099,name:"Dövme",slug:"dovme",parent:dk,is_landing_page:a,children:[]},{id:1100,name:"Kalıcı Makyaj Cihazları",slug:"kalici-makyaj-cihazlari",parent:dk,is_landing_page:a,children:[]},{id:1101,name:"Güzellik Salonu Makineleri",slug:"guzellik-salonu-makineleri",parent:dk,is_landing_page:a,children:[]}]},{id:cF,name:"Hotel, Restoran & Cafe İhtiyaçları",slug:"hotel-restoran-ve-cafe-ihtiyaclari",parent:p,is_landing_page:a,children:[{id:1103,name:"Otel Tipi Mini Bar & Kasalar",slug:"otel-tipi-mini-bar-ve-kasalar",parent:cF,is_landing_page:a,children:[]},{id:1104,name:"Otel Tipi Saç Kurutma Makineleri",slug:"otel-tipi-sac-kurutma-makineleri",parent:cF,is_landing_page:a,children:[]},{id:1105,name:"Otel Tipi Kettle Setler",slug:"otel-tipi-kettle-setler",parent:cF,is_landing_page:a,children:[]},{id:1106,name:"Otel Tipi Kişisel Bakım Ürünleri",slug:"otel-tipi-kisisel-bakim-urunleri",parent:cF,is_landing_page:a,children:[]},{id:1107,name:"Otel Banyo Aksesuarları & Ekipmanlar",slug:"otel-banyo-ekipman-ve-aksesuarlari",parent:cF,is_landing_page:a,children:[]},{id:1108,name:"Otel Temizlik Araçları",slug:"otel-temizlik-araclari",parent:cF,is_landing_page:a,children:[]},{id:1109,name:"Kat Ekipmanları",slug:"kat-ekipmanlari",parent:cF,is_landing_page:a,children:[]},{id:1110,name:"Yük Taşıma Araçları",slug:"yuk-tasima-araclari",parent:cF,is_landing_page:a,children:[]},{id:1111,name:"Otel Aydınlatma Ürünleri",slug:"otel-aydinlatma-urunleri",parent:cF,is_landing_page:a,children:[]}]},{id:1112,name:"Masaj, Spa & Wellness",slug:"masaj-spa-ve-wellness",parent:p,is_landing_page:a,children:[]},{id:1113,name:"Yetişkin Ürünler +18",slug:"yetiskin-urunler-18",parent:p,is_landing_page:a,children:[]},{id:1115,name:"Yetişkin Ürünler +19",slug:"yetiskin-urunler-19",parent:p,is_landing_page:a,children:[]},{id:1117,name:"Yetişkin Ürünler +20",slug:"yetiskin-urunler-20",parent:p,is_landing_page:a,children:[]},{id:1119,name:"Yetişkin Ürünler +21",slug:"yetiskin-urunler-21",parent:p,is_landing_page:a,children:[]},{id:1121,name:"Yetişkin Ürünler +22",slug:"yetiskin-urunler-22",parent:p,is_landing_page:a,children:[]},{id:1123,name:"Yetişkin Ürünler +23",slug:"yetiskin-urunler-23",parent:p,is_landing_page:a,children:[]},{id:1125,name:"Yetişkin Ürünler +24",slug:"yetiskin-urunler-24",parent:p,is_landing_page:a,children:[]},{id:1127,name:"Yetişkin Ürünler +25",slug:"yetiskin-urunler-25",parent:p,is_landing_page:a,children:[]},{id:4208,name:"Cerrahi Maskeler",slug:"cerrahi-maskeler",parent:p,is_landing_page:a,children:[]}]}]}],color:lO,styles:vg},{id:y,name:"Anne & Bebek & Oyuncak",slug:vh,parent:j,is_landing_page:z,children:[{id:fV,name:"Çocuk Giyim Ürünleri ve Kıyafetleri",slug:vi,parent:y,is_landing_page:a,children:[{id:cG,name:vj,slug:vk,parent:fV,is_landing_page:a,children:[{id:vl,name:vm,slug:vn,parent:cG,is_landing_page:a,children:[]},{id:vo,name:vp,slug:vq,parent:cG,is_landing_page:a,children:[]},{id:vr,name:vs,slug:vt,parent:cG,is_landing_page:a,children:[]},{id:vu,name:vv,slug:vw,parent:cG,is_landing_page:a,children:[]}]},{id:cH,name:vx,slug:vy,parent:fV,is_landing_page:a,children:[{id:vz,name:vA,slug:vB,parent:cH,is_landing_page:a,children:[]},{id:vC,name:vD,slug:vE,parent:cH,is_landing_page:a,children:[]},{id:vF,name:"Erkek Çocuk Aksesuar Ürünleri",slug:vG,parent:cH,is_landing_page:a,children:[]},{id:vH,name:vI,slug:vJ,parent:cH,is_landing_page:a,children:[]}]}]},{id:lP,name:"Hamilelik ve Annelik",slug:"hamilelik-ve-annelik",parent:y,is_landing_page:a,children:[{id:aM,name:"Hamilelilk Doğum Öncesi ve Sonrası",slug:vK,parent:lP,is_landing_page:a,children:[{id:vL,name:"Göğüs Kremi",slug:vM,parent:aM,is_landing_page:a,children:[]},{id:jj,name:vN,slug:vO,parent:aM,is_landing_page:a,children:[{id:1133,name:"Elektrikli Göğüs Pompaları",slug:"elektrikli-gogus-pompalari",parent:jj,is_landing_page:a,children:[]},{id:1134,name:"Manuel Göğüs Pompaları",slug:"manuel-gogus-pompalari",parent:jj,is_landing_page:a,children:[]}]},{id:vP,name:vQ,slug:vR,parent:aM,is_landing_page:a,children:[]},{id:1136,name:"Hamile Yastığı",slug:"hamile-yastigi",parent:aM,is_landing_page:a,children:[]},{id:1137,name:"Hamile Pedleri",slug:"hamile-pedleri",parent:aM,is_landing_page:a,children:[]},{id:1138,name:"Emzirme Yastığı",slug:"emzirme-yastigi",parent:aM,is_landing_page:a,children:[]},{id:1139,name:"Anne Sütü Saklama Kabı",slug:"anne-sutu-saklama-kabi",parent:aM,is_landing_page:a,children:[]},{id:bm,name:"Hamile Giyim",slug:"hamile-giyim",parent:aM,is_landing_page:a,children:[{id:1141,name:qS,slug:"hamile-kulotlu-corap",parent:bm,is_landing_page:a,children:[]},{id:1142,name:"Lohusa",slug:"lohusa",parent:bm,is_landing_page:a,children:[]},{id:1143,name:"Tishört Sweet Shirt Eşofman",slug:"tishort-sweet-shirt-esofman",parent:bm,is_landing_page:a,children:[]},{id:1144,name:"Ninniline",slug:"ninniline",parent:bm,is_landing_page:a,children:[]},{id:1145,name:iS,slug:"hamile-kulot",parent:bm,is_landing_page:a,children:[]},{id:1146,name:"Gömlek Bluz Tunik",slug:"gomlek-bluz-tunik",parent:bm,is_landing_page:a,children:[]},{id:1147,name:"Gecelik Pijama",slug:"gecelik-pijama",parent:bm,is_landing_page:a,children:[]},{id:1148,name:"Korse Bel Bandı",slug:"korse-bel-bandi",parent:bm,is_landing_page:a,children:[]},{id:1149,name:"Pantolon Tayt Şort",slug:"pantolon-tayt-sort",parent:bm,is_landing_page:a,children:[]},{id:1150,name:"Emzirme Südyeni",slug:"emzirme-sudyeni",parent:bm,is_landing_page:a,children:[]},{id:1151,name:"Emzirme Atleti",slug:"emzirme-atleti",parent:bm,is_landing_page:a,children:[]},{id:1152,name:"Elbise Tulum Etek",slug:"elbise-tulum-etek",parent:bm,is_landing_page:a,children:[]}]},{id:lQ,name:"Anne Kozmetik",slug:"anne-kozmetik",parent:aM,is_landing_page:a,children:[{id:1154,name:"Çatlak Kremi",slug:"catlak-kremi",parent:lQ,is_landing_page:a,children:[]},{id:1155,name:"Vücut Cilt bakım",slug:"vucut-cilt-bakim",parent:lQ,is_landing_page:a,children:[]}]},{id:1156,name:"Anne İçecekleri",slug:"anne-icecekleri",parent:aM,is_landing_page:a,children:[]}]}]},{id:fW,name:"Bebek Oyuncak",slug:"bebek-oyuncak",parent:y,is_landing_page:a,children:[{id:1158,name:"Çıngırak",slug:"cingirak",parent:fW,is_landing_page:a,children:[]},{id:1159,name:"Dişlik & Diş halkaları",slug:"dislik-ve-dis-halkalari",parent:fW,is_landing_page:a,children:[]},{id:1160,name:"Yürüteç Hoppala",slug:"yurutec-hoppala",parent:fW,is_landing_page:a,children:[]},{id:1161,name:"Banyo Oyuncak",slug:"banyo-oyuncak",parent:fW,is_landing_page:a,children:[]},{id:1162,name:"Diğer Bebek Oyuncakları",slug:"diger-bebek-oyuncaklari",parent:fW,is_landing_page:a,children:[]}]},{id:hn,name:"Oto Koltuğu & ana kucağı",slug:"oto-koltugu-ve-ana-kucagi",parent:y,is_landing_page:a,children:[{id:1164,name:"Ev Tipi Ana Kucağı",slug:"ev-tipi-ana-kucagi",parent:hn,is_landing_page:a,children:[]},{id:1165,name:"Oto Koltuğu",slug:"oto-koltugu",parent:hn,is_landing_page:a,children:[]},{id:1166,name:"Yükseltici & Aksesuar",slug:"bebek-oto-koltugu-anakucagi-yukseltici-ve-aksesuarlari",parent:hn,is_landing_page:a,children:[]},{id:1167,name:"Oto Koltuğu Aksesuarları",slug:"oto-koltugu-aksesuarlari",parent:hn,is_landing_page:a,children:[]}]},{id:jk,name:"Bebek Alt Değiştirme",slug:"bebek-alt-degistirme",parent:y,is_landing_page:a,children:[{id:jl,name:"Alt Açma",slug:"alt-acma",parent:jk,is_landing_page:a,children:[{id:vS,name:vT,slug:vU,parent:jl,is_landing_page:a,children:[]},{id:1177,name:"Minderi",slug:"minderi",parent:jl,is_landing_page:a,children:[]}]}]},{id:jm,name:vV,slug:vW,parent:y,is_landing_page:a,children:[{id:lR,name:"Kız Bebek",slug:"kiz-bebek",parent:jm,is_landing_page:a,children:[{id:C,name:fA,slug:"kiz-bebek-giyim",parent:lR,is_landing_page:a,children:[{id:1181,name:vX,slug:"zibin-takimi",parent:C,is_landing_page:a,children:[]},{id:1182,name:bn,slug:"aksesuarlar",parent:C,is_landing_page:a,children:[]},{id:1183,name:vY,slug:"gomlek-bluz",parent:C,is_landing_page:a,children:[]},{id:1184,name:vZ,slug:"kostum",parent:C,is_landing_page:a,children:[]},{id:1185,name:lS,slug:"tishort-sweat-shirt-esofman",parent:C,is_landing_page:a,children:[]},{id:1186,name:"Etek Elbise",slug:"etek-elbise",parent:C,is_landing_page:a,children:[]},{id:1187,name:"Pijama tTakımı",slug:"pijama-ttakimi",parent:C,is_landing_page:a,children:[]},{id:1188,name:gP,slug:"kiz-bebek-tulum",parent:C,is_landing_page:a,children:[]},{id:1189,name:v_,slug:"eldiven-atki",parent:C,is_landing_page:a,children:[]},{id:1190,name:v$,slug:"ic-camasiri",parent:C,is_landing_page:a,children:[]},{id:1191,name:gY,slug:"kiz-bebek-corap",parent:C,is_landing_page:a,children:[]},{id:wa,name:lT,slug:wb,parent:C,is_landing_page:a,children:[]},{id:1193,name:wc,slug:"sac-aksesuari",parent:C,is_landing_page:a,children:[]},{id:1194,name:lU,slug:"uyku-tulumu",parent:C,is_landing_page:a,children:[]},{id:1195,name:wd,slug:"ayakkabi-patik",parent:C,is_landing_page:a,children:[]},{id:1196,name:iT,slug:"kiz-bebek-mayo",parent:C,is_landing_page:a,children:[]},{id:1197,name:we,slug:"hirka-yelek-kazak",parent:C,is_landing_page:a,children:[]},{id:wf,name:lV,slug:wg,parent:C,is_landing_page:a,children:[]},{id:1199,name:lg,slug:"kiz-bebek-bolero",parent:C,is_landing_page:a,children:[]},{id:1200,name:wh,slug:"mont-kaban-yelek",parent:C,is_landing_page:a,children:[]},{id:1201,name:wi,slug:"kiz-bebek-pantolon-sort",parent:C,is_landing_page:a,children:[]},{id:1202,name:wj,slug:"kravat-papyon",parent:C,is_landing_page:a,children:[]},{id:1203,name:wk,slug:"sapka-bere-kulaklik",parent:C,is_landing_page:a,children:[]},{id:wl,name:lW,slug:wm,parent:C,is_landing_page:a,children:[]}]},{id:fX,name:wn,slug:"ayakkkabi",parent:lR,is_landing_page:a,children:[{id:1206,name:wo,slug:"patik-panduf",parent:fX,is_landing_page:a,children:[]},{id:1207,name:iV,slug:"kiz-bebek-spor-ayakkabi",parent:fX,is_landing_page:a,children:[]},{id:1208,name:wp,slug:"ilk-adim-ayakkabisi",parent:fX,is_landing_page:a,children:[]},{id:1209,name:wq,slug:"cizme-bot",parent:fX,is_landing_page:a,children:[]},{id:1210,name:rc,slug:"kiz-bebek-babet",parent:fX,is_landing_page:a,children:[]}]}]},{id:lX,name:"Erkek Bebek",slug:"erkek-bebek",parent:jm,is_landing_page:a,children:[{id:G,name:fA,slug:"erkek-bebek-giyim",parent:lX,is_landing_page:a,children:[{id:1213,name:vX,slug:"erkek-bebek-zibin-takimi",parent:G,is_landing_page:a,children:[]},{id:1214,name:bn,slug:"erkek-bebek-giyim-aksesuar",parent:G,is_landing_page:a,children:[]},{id:1215,name:vY,slug:"erkek-bebek-gomlek-bluz",parent:G,is_landing_page:a,children:[]},{id:1216,name:vZ,slug:"erkek-bebek-kostum",parent:G,is_landing_page:a,children:[]},{id:wr,name:lS,slug:ws,parent:G,is_landing_page:a,children:[]},{id:1218,name:rI,slug:"erkek-bebek-pijama-takimi",parent:G,is_landing_page:a,children:[]},{id:wt,name:gP,slug:wu,parent:G,is_landing_page:a,children:[]},{id:1220,name:v_,slug:"erkek-bebek-eldiven-atki",parent:G,is_landing_page:a,children:[]},{id:1221,name:v$,slug:"erkek-bebek-ic-camasiri",parent:G,is_landing_page:a,children:[]},{id:1222,name:gY,slug:"erkek-bebek-corap",parent:G,is_landing_page:a,children:[]},{id:1223,name:lT,slug:"erkek-bebek-alt-ust-takim",parent:G,is_landing_page:a,children:[]},{id:1224,name:wc,slug:"erkek-bebek-sac-aksesuari",parent:G,is_landing_page:a,children:[]},{id:1225,name:lU,slug:"erkek-bebek-uyku-tulumu",parent:G,is_landing_page:a,children:[]},{id:1226,name:wd,slug:"erkek-bebek-ayakkabi-patik",parent:G,is_landing_page:a,children:[]},{id:1227,name:iT,slug:"erkek-bebek-mayo",parent:G,is_landing_page:a,children:[]},{id:1228,name:we,slug:"erkek-bebek-hirka-yelek",parent:G,is_landing_page:a,children:[]},{id:1229,name:lV,slug:"erkek-bebek-hastane-cikisi-mevlit-takimi",parent:G,is_landing_page:a,children:[]},{id:1230,name:lg,slug:"erkek-bebek-bolero",parent:G,is_landing_page:a,children:[]},{id:1231,name:wh,slug:"erkek-bebek-mont-kaban-yelek",parent:G,is_landing_page:a,children:[]},{id:1232,name:wi,slug:"erkek-bebek-pantolon-sort",parent:G,is_landing_page:a,children:[]},{id:1233,name:wj,slug:"erkek-bebek-kiravat-papyon",parent:G,is_landing_page:a,children:[]},{id:1234,name:wk,slug:"erkek-bebek-sapka-bere-kulaklik",parent:G,is_landing_page:a,children:[]},{id:1235,name:lW,slug:"erkek-bebek-body-zibin",parent:G,is_landing_page:a,children:[]}]},{id:ho,name:wn,slug:"erkek-bebek-ayakkabi",parent:lX,is_landing_page:a,children:[{id:1237,name:wo,slug:"erkek-bebek-patik-panduf",parent:ho,is_landing_page:a,children:[]},{id:1238,name:iV,slug:"erkek-bebek-spor-ayakkabi",parent:ho,is_landing_page:a,children:[]},{id:1239,name:wp,slug:"erkek-bebek-ilk-adim-ayakkabisi",parent:ho,is_landing_page:a,children:[]},{id:1240,name:wq,slug:"erkek-bebek-cizme-bot",parent:ho,is_landing_page:a,children:[]}]}]}]},{id:ch,name:"Bebek Güvenliği",slug:"bebek-guvenligi",parent:y,is_landing_page:a,children:[{id:1242,name:"Bebek Telsizi",slug:"bebek-telsizi",parent:ch,is_landing_page:a,children:[]},{id:1243,name:pB,slug:"bebek-kamerasi",parent:ch,is_landing_page:a,children:[]},{id:1244,name:"Kilitli Köşe Koruyucu",slug:"kilitli-kose-koruyucu",parent:ch,is_landing_page:a,children:[]},{id:1245,name:"Oto Güvenlik Ürünleri",slug:"oto-guvenlik-urunleri",parent:ch,is_landing_page:a,children:[]},{id:1246,name:"Priz Emniyeti",slug:"priz-emniyeti",parent:ch,is_landing_page:a,children:[]},{id:1247,name:"Yatak Bariyeri ve Korkuluğu",slug:"yatak-bariyeri-ve-korkulugu",parent:ch,is_landing_page:a,children:[]},{id:1248,name:"Bebek Termometreleri",slug:"bebek-termometreleri",parent:ch,is_landing_page:a,children:[]},{id:1249,name:"Güvenlik Kapısı",slug:"guvenlik-kapisi",parent:ch,is_landing_page:a,children:[]},{id:1250,name:"Bel Koruyucu",slug:"bel-koruyucu",parent:ch,is_landing_page:a,children:[]},{id:1251,name:"Emekleme Dizliği",slug:"emekleme-dizligi",parent:ch,is_landing_page:a,children:[]}]},{id:fY,name:wv,slug:ww,parent:y,is_landing_page:a,children:[{id:1253,name:"Biberon maması",slug:"biberon-mamasi",parent:fY,is_landing_page:a,children:[]},{id:1254,name:"Kaşık maması",slug:"kasik-mamasi",parent:fY,is_landing_page:a,children:[]},{id:1255,name:"kavonoz maması",slug:"kavonoz-mamasi",parent:fY,is_landing_page:a,children:[]},{id:1256,name:lN,slug:"bebek-besin-takviyeleri",parent:fY,is_landing_page:a,children:[]}]},{id:dl,name:wx,slug:wy,parent:y,is_landing_page:a,children:[{id:1258,name:"Emzik & Aksesuarları",slug:"emzik-ve-aksesuarlari",parent:dl,is_landing_page:a,children:[]},{id:1259,name:"Sebze Meyve Filesi",slug:"sebze-meyve-filesi",parent:dl,is_landing_page:a,children:[]},{id:1260,name:"Biberon",slug:"biberon",parent:dl,is_landing_page:a,children:[]},{id:1261,name:"Biberon Mama Isıtıcı",slug:"biberon-mama-isitici",parent:dl,is_landing_page:a,children:[]},{id:1262,name:"Biberon Emziği",slug:"biberon-emzigi",parent:dl,is_landing_page:a,children:[]},{id:1263,name:"Biberon Temizleyici",slug:"biberon-temizleyici",parent:dl,is_landing_page:a,children:[]},{id:1264,name:"Biberon Aksesuarları",slug:"biberon-aksesuarlari",parent:dl,is_landing_page:a,children:[]}]},{id:eL,name:wz,slug:wA,parent:y,is_landing_page:a,children:[{id:lY,name:"Bebek Mobilyası",slug:"bebek-mobilyasi",parent:eL,is_landing_page:a,children:[{id:1267,name:"Emzirme Koltuğu",slug:"emzirme-koltugu",parent:lY,is_landing_page:a,children:[]},{id:1268,name:"Bebek Odası Takımı",slug:"bebek-odasi-takimi",parent:lY,is_landing_page:a,children:[]}]},{id:cI,name:wB,slug:wC,parent:eL,is_landing_page:a,children:[{id:1270,name:"Ahşap Beşik",slug:"ahsap-besik",parent:cI,is_landing_page:a,children:[]},{id:wD,name:wE,slug:wF,parent:cI,is_landing_page:a,children:[]},{id:1272,name:"Büyüyen Beşik",slug:"buyuyen-besik",parent:cI,is_landing_page:a,children:[]},{id:1273,name:"Sepet Beşik",slug:"sepet-besik",parent:cI,is_landing_page:a,children:[]},{id:1274,name:"Anne Yanı Beşik",slug:"anne-yani-besik",parent:cI,is_landing_page:a,children:[]},{id:1275,name:"Sallanan Beşik",slug:"sallanan-besik",parent:cI,is_landing_page:a,children:[]},{id:1276,name:"Yatak & Minder",slug:"bebek-yataklari-ve-minderleri",parent:cI,is_landing_page:a,children:[]}]},{id:dY,name:lZ,slug:wG,parent:eL,is_landing_page:a,children:[{id:1289,name:jn,slug:"bebek-odasi-aydinlatma",parent:dY,is_landing_page:a,children:[]},{id:1290,name:"Boy Ölçer",slug:"boy-olcer",parent:dY,is_landing_page:a,children:[]},{id:1291,name:jo,slug:"sticker",parent:dY,is_landing_page:a,children:[]},{id:1292,name:"Bebek Halısı",slug:"bebek-halisi",parent:dY,is_landing_page:a,children:[]},{id:1293,name:"Derkorasyon Askılar",slug:"derkorasyon-askilar",parent:dY,is_landing_page:a,children:[]},{id:1294,name:"Diğer Dekorasyon Ürünleri",slug:"diger-dekorasyon-urunleri",parent:dY,is_landing_page:a,children:[]}]}]},{id:hp,name:wH,slug:"hatira-urunleri",parent:y,is_landing_page:a,children:[{id:1296,name:"Anı Defteri",slug:"ani-defteri",parent:hp,is_landing_page:a,children:[]},{id:1297,name:wH,slug:"anna-bebek-hatira-urunleri",parent:hp,is_landing_page:a,children:[]},{id:1298,name:"Kapı Süsü",slug:"kapi-susu",parent:hp,is_landing_page:a,children:[]},{id:1299,name:"Mevlüt Şekerleri",slug:"mevlut-sekerleri",parent:hp,is_landing_page:a,children:[]}]},{id:hq,name:"Beslenme Gereçleri",slug:"beslenme-gerecleri",parent:y,is_landing_page:a,children:[{id:jp,name:wI,slug:l_,parent:hq,is_landing_page:a,children:[{id:1302,name:"Mama Sandalyesi",slug:"mama-sandalyesi",parent:jp,is_landing_page:a,children:[]}]},{id:cJ,name:"Bebek Besleme Araçları",slug:"bebek-besleme-araclari",parent:hq,is_landing_page:a,children:[{id:wJ,name:wK,slug:wL,parent:cJ,is_landing_page:a,children:[]},{id:wM,name:wN,slug:wO,parent:cJ,is_landing_page:a,children:[]},{id:1306,name:"Kaşık-Çatal",slug:"kasik-catal",parent:cJ,is_landing_page:a,children:[]},{id:1307,name:wP,slug:"termos",parent:cJ,is_landing_page:a,children:[]},{id:1308,name:wQ,slug:"peceteler",parent:cJ,is_landing_page:a,children:[]},{id:1309,name:"Cam Rende",slug:"cam-rende",parent:cJ,is_landing_page:a,children:[]},{id:1310,name:"Yastık ve Yastık Ürünleri",slug:"yastik-ve-yastik-urunleri",parent:cJ,is_landing_page:a,children:[]}]}]},{id:eM,name:"Kanguru ve Taşıma Ürünleri",slug:"kanguru-ve-tasima-urunleri",parent:y,is_landing_page:a,children:[{id:1312,name:"Kanguru",slug:"kanguru",parent:eM,is_landing_page:a,children:[]},{id:1313,name:"Sırtta ve Yan Taşıma",slug:"sirtta-ve-yan-tasima",parent:eM,is_landing_page:a,children:[]},{id:1314,name:"Potrbebe",slug:"potrbebe",parent:eM,is_landing_page:a,children:[]},{id:1315,name:"Sling",slug:"sling",parent:eM,is_landing_page:a,children:[]},{id:1316,name:"Bebek Taşıma",slug:"bebek-tasima",parent:eM,is_landing_page:a,children:[]},{id:1317,name:"Bebek Taşıma Yuvaları",slug:"bebek-tasima-yuvalari",parent:eM,is_landing_page:a,children:[]}]},{id:wR,name:jq,slug:"bebek-bakim-cantasi",parent:y,is_landing_page:a,children:[{id:1319,name:jq,slug:"bebek-bakim-cantasi-2",parent:wR,is_landing_page:a,children:[]}]},{id:bo,name:"Bebek Banyo ve Tuvalet Eğitimi",slug:"bebek-banyo-ve-tuvalet-egitimi",parent:y,is_landing_page:a,children:[{id:4128,name:"Tuvalet Alıştırma Külodu",slug:"tuvalet-alistirma-kulodu",parent:bo,is_landing_page:a,children:[]},{id:4129,name:"Tuvalet Oturak Lazımlık",slug:"tuvalet-oturak-lazimlik",parent:bo,is_landing_page:a,children:[]},{id:4130,name:"Bebek Cilt Bakım ",slug:"bebek-cilt-bakim",parent:bo,is_landing_page:a,children:[]},{id:dm,name:wS,slug:wT,parent:bo,is_landing_page:a,children:[{id:4132,name:"Çocuk Basamağı",slug:"cocuk-basamagi",parent:dm,is_landing_page:a,children:[]},{id:4133,name:"Banyo Süngeri",slug:"banyo-sungeri",parent:dm,is_landing_page:a,children:[]},{id:wU,name:wV,slug:wW,parent:dm,is_landing_page:a,children:[]},{id:4135,name:"Banyo Şapkası",slug:"banyo-sapkasi",parent:dm,is_landing_page:a,children:[]},{id:4137,name:"Banyo Termometresi",slug:"banyo-termometresi",parent:dm,is_landing_page:a,children:[]}]},{id:wX,name:wY,slug:wZ,parent:bo,is_landing_page:a,children:[]},{id:4139,name:"Tırnak Makası",slug:"tirnak-makasi",parent:bo,is_landing_page:a,children:[]},{id:4140,name:"Diğer Banyo Ürünleri",slug:"diger-banyo-urunleri",parent:bo,is_landing_page:a,children:[]},{id:4141,name:"Fırça Ve Taraklar",slug:"firca-ve-taraklar",parent:bo,is_landing_page:a,children:[]},{id:4142,name:"Bakım Setleri",slug:"bakim-setleri",parent:bo,is_landing_page:a,children:[]},{id:4143,name:"Çamaşır Filesi",slug:"camasir-filesi",parent:bo,is_landing_page:a,children:[]}]},{id:aN,name:w_,slug:w$,parent:y,is_landing_page:a,children:[{id:4145,name:"İkiz Bebek Arabaları",slug:"ikiz-bebek-arabalari",parent:aN,is_landing_page:a,children:[]},{id:xa,name:xb,slug:xc,parent:aN,is_landing_page:a,children:[]},{id:xd,name:xe,slug:xf,parent:aN,is_landing_page:a,children:[]},{id:xg,name:xh,slug:xi,parent:aN,is_landing_page:a,children:[]},{id:xj,name:xk,slug:xl,parent:aN,is_landing_page:a,children:[]},{id:4150,name:"3 Tekerli Bebek Arabası",slug:"3-tekerli-bebek-arabasi",parent:aN,is_landing_page:a,children:[]},{id:xm,name:xn,slug:xo,parent:aN,is_landing_page:a,children:[]},{id:4152,name:bn,slug:"bebek-arabasi-aksesuarlari-2",parent:aN,is_landing_page:a,children:[]}]},{id:hr,name:xp,slug:xq,parent:y,is_landing_page:a,children:[{id:hs,name:xr,slug:xs,parent:hr,is_landing_page:a,children:[{id:aO,name:"Bebek Cilt Bakım",slug:"bebek-cilt-bakim-2",parent:hs,is_landing_page:a,children:[{id:4156,name:"Buhar Makinası",slug:"buhar-makinasi",parent:aO,is_landing_page:a,children:[]},{id:4157,name:"Ateş Ölçer",slug:"ates-olcer",parent:aO,is_landing_page:a,children:[]},{id:4158,name:"Güneş Bakım Ürünleri",slug:"gunes-bakim-urunleri",parent:aO,is_landing_page:a,children:[]},{id:xt,name:jq,slug:xu,parent:aO,is_landing_page:a,children:[]},{id:4160,name:"Burun Aspretörü",slug:"burun-aspretoru",parent:aO,is_landing_page:a,children:[]},{id:4161,name:"Kolonya",slug:"kolonya",parent:aO,is_landing_page:a,children:[]},{id:xv,name:xw,slug:xx,parent:aO,is_landing_page:a,children:[]},{id:4163,name:hk,slug:"bebek-cilt-bakim-losyonu",parent:aO,is_landing_page:a,children:[]},{id:4164,name:"Pudra & Parfüm",slug:"bebek-pudra-ve-parfum",parent:aO,is_landing_page:a,children:[]},{id:4165,name:"Bebek Yağı",slug:"bebek-yagi",parent:aO,is_landing_page:a,children:[]},{id:4166,name:"Kulak Çubuğu",slug:"kulak-cubugu",parent:aO,is_landing_page:a,children:[]},{id:4167,name:"Temizleme Pamuğu",slug:"temizleme-pamugu",parent:aO,is_landing_page:a,children:[]}]},{id:l$,name:"Bebek Ağız Ve Diş Bakım",slug:"bebek-agiz-ve-dis-bakim",parent:hs,is_landing_page:a,children:[{id:4169,name:"Diş Macunu",slug:"dis-macunu",parent:l$,is_landing_page:a,children:[]},{id:4170,name:"Diş Fırçası",slug:"dis-fircasi",parent:l$,is_landing_page:a,children:[]}]},{id:4171,name:"Bebek Tartı",slug:"bebek-tarti",parent:hs,is_landing_page:a,children:[]}]},{id:4173,name:"Bebek Bakım Seti",slug:"bebek-bakim-seti",parent:hr,is_landing_page:a,children:[]}]}],color:ma,styles:xy},{id:A,name:"Hobi & Oyuncak",slug:jr,parent:j,is_landing_page:z,children:[{id:dZ,name:xz,slug:xA,parent:A,is_landing_page:a,children:[{id:1321,name:"Oyun Halıları",slug:"oyun-halilari",parent:dZ,is_landing_page:a,children:[]},{id:1322,name:"Motor Beceri Oyuncakları",slug:"motor-beceri-oyuncaklari",parent:dZ,is_landing_page:a,children:[]},{id:1323,name:"Uyku Arkadaşları & Dönence",slug:"bebek-uyku-arkadaslari-ve-donence",parent:dZ,is_landing_page:a,children:[]},{id:1324,name:"Oyuncak Setleri",slug:"oyuncak-setleri",parent:dZ,is_landing_page:a,children:[]},{id:xB,name:"Sallanan ve Yaylı Oyuncaklar",slug:"sallanan-ve-yayli-oyuncaklar",parent:dZ,is_landing_page:a,children:[{id:1326,name:"Salıncak & Hamaklar",slug:"salincak-ve-hamaklar",parent:xB,is_landing_page:a,children:[]}]},{id:1327,name:"Öğretici Oyuncaklar",slug:"ogretici-oyuncaklar",parent:dZ,is_landing_page:a,children:[]}]},{id:js,name:xC,slug:xD,parent:A,is_landing_page:a,children:[{id:fZ,name:"Bebekler",slug:"bebekler",parent:js,is_landing_page:a,children:[{id:1330,name:"Et Bebekler",slug:"et-bebekler",parent:fZ,is_landing_page:a,children:[]},{id:1331,name:"Model Bebekler",slug:"model-bebekler",parent:fZ,is_landing_page:a,children:[]},{id:1333,name:xE,slug:"mutfak-setleri",parent:fZ,is_landing_page:a,children:[]},{id:1334,name:"Doktor Seti",slug:"doktor-seti",parent:fZ,is_landing_page:a,children:[]},{id:1335,name:"Bebek Setleri",slug:"bebek-setleri",parent:fZ,is_landing_page:a,children:[]}]},{id:1332,name:xF,slug:"oyun-setleri",parent:js,is_landing_page:a,children:[]}]},{id:jt,name:xG,slug:xH,parent:A,is_landing_page:a,children:[{id:xI,name:"Oyuncak Silahlar&Tabancalar",slug:"oyuncak-silahlar-ve-tabancalar",parent:jt,is_landing_page:a,children:[{id:1338,name:"Nerfler",slug:"nerfler",parent:xI,is_landing_page:a,children:[]}]},{id:xJ,name:xF,slug:"erkek-cocuk-oyun-seti",parent:jt,is_landing_page:a,children:[{id:1340,name:"Tamir Setleri",slug:"tamir-setleri",parent:xJ,is_landing_page:a,children:[]}]}]},{id:dn,name:xK,slug:xL,parent:A,is_landing_page:a,children:[{id:1342,name:"Bilim Setleri",slug:"bilim-setleri",parent:dn,is_landing_page:a,children:[]},{id:1343,name:"Bloklar",slug:"bloklar",parent:dn,is_landing_page:a,children:[]},{id:xM,name:xN,slug:xO,parent:dn,is_landing_page:a,children:[]},{id:1345,name:"Oyun Hamurları",slug:"oyun-hamurlari",parent:dn,is_landing_page:a,children:[]},{id:1346,name:"Eğitici Kartlar",slug:"egitici-kartlar",parent:dn,is_landing_page:a,children:[]},{id:1347,name:"Özel Eğitim Oyuncakları",slug:"ozel-egitim-oyuncaklari",parent:dn,is_landing_page:a,children:[]}]},{id:d_,name:xP,slug:xQ,parent:A,is_landing_page:a,children:[{id:1349,name:"Garajlar",slug:"garajlar",parent:d_,is_landing_page:a,children:[]},{id:1350,name:"Ölçekli Modeller",slug:"olcekli-modeller",parent:d_,is_landing_page:a,children:[]},{id:1351,name:xR,slug:"uzaktan-kumandali-arabalar",parent:d_,is_landing_page:a,children:[]},{id:1352,name:"Kamyon ve Tırlar",slug:"kamyon-ve-tirlar",parent:d_,is_landing_page:a,children:[]},{id:1353,name:"İş Makinaları",slug:"is-makinalari",parent:d_,is_landing_page:a,children:[]},{id:1354,name:"Çek Bırak Arabalar",slug:"cek-birak-arabalar",parent:d_,is_landing_page:a,children:[]}]},{id:ht,name:xS,slug:xT,parent:A,is_landing_page:a,children:[{id:1356,name:"Kostüm ve Aksesuarları",slug:"kostum-ve-aksesuarlari",parent:ht,is_landing_page:a,children:[]},{id:1357,name:lJ,slug:"parti-maskesi",parent:ht,is_landing_page:a,children:[]},{id:do0,name:xU,slug:"parti-malzemeleri",parent:ht,is_landing_page:a,children:[{id:1359,name:"Süslemeler",slug:"suslemeler",parent:do0,is_landing_page:a,children:[]},{id:1360,name:xV,slug:"balonlar",parent:do0,is_landing_page:a,children:[]},{id:1361,name:"Mumlar",slug:"mumlar",parent:do0,is_landing_page:a,children:[]},{id:1362,name:"Parti Setleri",slug:"parti-setleri",parent:do0,is_landing_page:a,children:[]},{id:1363,name:"Tek Kullanımlık Parti Malzemeleri",slug:"tek-kullanimlik-parti-malzemeleri",parent:do0,is_landing_page:a,children:[]},{id:1364,name:xW,slug:"davetiye",parent:do0,is_landing_page:a,children:[]},{id:1365,name:"Parti Poşetleri",slug:"parti-posetleri",parent:do0,is_landing_page:a,children:[]},{id:1366,name:"Pasta Ve Kapkek Süslemeleri",slug:"pasta-ve-kapkek-suslemeleri",parent:do0,is_landing_page:a,children:[]}]}]},{id:d$,name:xX,slug:xY,parent:A,is_landing_page:a,children:[{id:1368,name:"3 Boyutlu Puzzlelar",slug:"3-boyutlu-puzzlelar",parent:d$,is_landing_page:a,children:[]},{id:1369,name:"Ahşap Puzzlelar",slug:"ahsap-puzzlelar",parent:d$,is_landing_page:a,children:[]},{id:1370,name:"Yetişkin Puzzle",slug:"yetiskin-puzzle",parent:d$,is_landing_page:a,children:[]},{id:1371,name:"Çocuk Puzzle",slug:"cocuk-puzzle",parent:d$,is_landing_page:a,children:[]},{id:1372,name:"Puzzle Aksesuarları",slug:"puzzle-aksesuarlari",parent:d$,is_landing_page:a,children:[]},{id:1373,name:"Puzzle Halıları",slug:"puzzle-halilari",parent:d$,is_landing_page:a,children:[]}]},{id:ju,name:xZ,slug:x_,parent:A,is_landing_page:a,children:[{id:1375,name:x$,slug:"kart-oyunlari",parent:ju,is_landing_page:a,children:[]},{id:1376,name:"Eğitsel Oyunlar",slug:"egitsel-oyunlar",parent:ju,is_landing_page:a,children:[]}]},{id:ya,name:yb,slug:yc,parent:A,is_landing_page:a,children:[]},{id:cK,name:"Yetişkin Hobi&Oyun",slug:"yetiskin-hobi-ve-oyun",parent:A,is_landing_page:a,children:[{id:1379,name:"Hobi Malzemeleri & Aksesuarları",slug:"hobi-malzemeleri-ve-aksesuarlari",parent:cK,is_landing_page:a,children:[]},{id:1380,name:"Model Araçlar",slug:"model-araclar",parent:cK,is_landing_page:a,children:[]},{id:yd,name:"Multikopter Setler",slug:"multikopter-setler",parent:cK,is_landing_page:a,children:[{id:1382,name:"Multikopter Aksesuarları",slug:"multikopter-aksesuarlari",parent:yd,is_landing_page:a,children:[]}]},{id:ye,name:xR,slug:"uzaktan-kumandali-arabalar-2",parent:cK,is_landing_page:a,children:[{id:1384,name:"RC Benzinli Araçlar",slug:"rc-benzinli-araclar",parent:ye,is_landing_page:a,children:[]}]},{id:1385,name:"Satranç",slug:"satranc",parent:cK,is_landing_page:a,children:[]},{id:1386,name:"Tavla",slug:"tavla",parent:cK,is_landing_page:a,children:[]},{id:1387,name:"Okey Takımı",slug:"okey-takimi",parent:cK,is_landing_page:a,children:[]},{id:1388,name:yf,slug:"dart",parent:cK,is_landing_page:a,children:[]},{id:1389,name:x$,slug:"kart-oyunlari-2",parent:cK,is_landing_page:a,children:[]}]},{id:ea,name:yg,slug:yh,parent:A,is_landing_page:a,children:[{id:1392,name:mb,slug:"scooterlar",parent:ea,is_landing_page:a,children:[]},{id:1393,name:mc,slug:"patenler",parent:ea,is_landing_page:a,children:[]},{id:1394,name:"Akülü Arabalar",slug:"akulu-arabalar",parent:ea,is_landing_page:a,children:[]},{id:1395,name:"Pedallı Arabalar",slug:"pedalli-arabalar",parent:ea,is_landing_page:a,children:[]},{id:1396,name:"Üç TekerLekli Bisikletler",slug:"uc-tekerlekli-bisikletler",parent:ea,is_landing_page:a,children:[]},{id:1397,name:bn,slug:"akulu-ve-pedalli-arac-aksesuarlari",parent:ea,is_landing_page:a,children:[]}]},{id:hu,name:yi,slug:yj,parent:A,is_landing_page:a,children:[{id:1399,name:"Aksiyon Figürleri",slug:"aksiyon-figurleri",parent:hu,is_landing_page:a,children:[]},{id:1400,name:"Figür Setleri",slug:"figur-setleri",parent:hu,is_landing_page:a,children:[]},{id:1401,name:bn,slug:"oyuncak-figur-aksesuar",parent:hu,is_landing_page:a,children:[]}]},{id:cL,name:yk,slug:yl,parent:A,is_landing_page:a,children:[{id:1403,name:"Oyun Çadırları",slug:"oyun-cadirlari",parent:cL,is_landing_page:a,children:[]},{id:1404,name:"Oyun Evleri",slug:"oyun-evleri",parent:cL,is_landing_page:a,children:[]},{id:1405,name:"Kaydıraklar",slug:"kaydiraklar",parent:cL,is_landing_page:a,children:[]},{id:1406,name:"Top Havuzları & Aksesuarları",slug:"oyuncak-top-havuzlari-ve-aksesuarlari",parent:cL,is_landing_page:a,children:[]},{id:1407,name:ym,slug:"langirt",parent:cL,is_landing_page:a,children:[]},{id:1408,name:"Kum Havuzları ve Kum Oyuncakları",slug:"kum-havuzlari-ve-kum-oyuncaklari",parent:cL,is_landing_page:a,children:[]},{id:md,name:"Oyun Parkı Ekipmanları",slug:"oyun-parki-ekipmanlari",parent:cL,is_landing_page:a,children:[{id:1410,name:yn,slug:"salincaklar",parent:md,is_landing_page:a,children:[]},{id:1411,name:"Jimlastik Setleri",slug:"jimlastik-setleri",parent:md,is_landing_page:a,children:[]}]},{id:f_,name:"Deniz Malzemeleri ve Oyuncakları",slug:"deniz-malzemeleri-ve-oyuncaklari",parent:cL,is_landing_page:a,children:[{id:1413,name:"Deniz Yatakları",slug:"deniz-yataklari",parent:f_,is_landing_page:a,children:[]},{id:1414,name:"Bebek Simidi",slug:"bebek-simidi",parent:f_,is_landing_page:a,children:[]},{id:1415,name:"Kolluklar",slug:"kolluklar",parent:f_,is_landing_page:a,children:[]},{id:1416,name:"Plaj Oyuncakları",slug:"plaj-oyuncaklari",parent:f_,is_landing_page:a,children:[]},{id:1417,name:"Şişme Havuzlar",slug:"sisme-havuzlar",parent:f_,is_landing_page:a,children:[]}]}]},{id:f$,name:"Oyuncak Müzik Aletleri",slug:"oyuncak-muzik-aletleri",parent:A,is_landing_page:a,children:[{id:1419,name:bn,slug:"oyuncak-muzik-aleti-aksesuarlari",parent:f$,is_landing_page:a,children:[]},{id:1420,name:"Davullar Ve Perküsyon",slug:"davullar-ve-perkusyon",parent:f$,is_landing_page:a,children:[]},{id:1421,name:"Gitarlar Ve Yaylı Çalgılar",slug:"gitarlar-ve-yayli-calgilar",parent:f$,is_landing_page:a,children:[]},{id:1422,name:"Üflemeli Çalgılar",slug:"uflemeli-calgilar",parent:f$,is_landing_page:a,children:[]},{id:1423,name:"Piyanolar ve Klavyeli Çalgılar",slug:"piyanolar-ve-klavyeli-calgilar",parent:f$,is_landing_page:a,children:[]}]}],color:me,styles:yo},{id:aC,name:"Fotoğraf & Kamera",slug:yp,parent:j,is_landing_page:z,children:[{id:yq,name:mf,slug:yr,parent:aC,is_landing_page:a,children:[]},{id:jv,name:ys,slug:yt,parent:aC,is_landing_page:a,children:[{id:ga,name:"Dijital Fotoğraf Makineleri",slug:"dijital-fotograf-makineleri",parent:jv,is_landing_page:a,children:[{id:1431,name:"DSLR Makineler",slug:"dslr-makineler",parent:ga,is_landing_page:a,children:[]},{id:1432,name:"Aynasız Fotoğraf Makineleri",slug:"aynasiz-fotograf-makineleri",parent:ga,is_landing_page:a,children:[]},{id:1433,name:"Kompakt Fotoğraf Makineleri",slug:"kompakt-fotograf-makineleri",parent:ga,is_landing_page:a,children:[]},{id:1434,name:"Outdoor Sualtı Fotoğraf Makineleri",slug:"outdoor-sualti-fotograf-makineleri",parent:ga,is_landing_page:a,children:[]},{id:1435,name:H,slug:"diger-dijital-fotograf-makineleri",parent:ga,is_landing_page:a,children:[]}]},{id:1436,name:"Analog Fotoğraf Makineleri",slug:"analog-fotograf-makineleri",parent:jv,is_landing_page:a,children:[]}]},{id:dp,name:yu,slug:yv,parent:aC,is_landing_page:a,children:[{id:1438,name:"Profesyonel Video Kameralar",slug:"profesyonel-video-kameralar",parent:dp,is_landing_page:a,children:[]},{id:1439,name:kU,slug:"video-guvenlik-kamerasi",parent:dp,is_landing_page:a,children:[]},{id:yw,name:yx,slug:yy,parent:dp,is_landing_page:a,children:[]},{id:1441,name:"Web Kameraları",slug:"web-kameralari",parent:dp,is_landing_page:a,children:[]},{id:1442,name:"Mini Kameralar",slug:"mini-kameralar",parent:dp,is_landing_page:a,children:[]},{id:1443,name:H,slug:"diger-video-guvenlik-kameralari",parent:dp,is_landing_page:a,children:[]}]},{id:t,name:"Fotoğraf & Kamera Aksesuarları",slug:yz,parent:aC,is_landing_page:a,children:[{id:1445,name:"Fotoğraf Makinesi Çantaları",slug:"fotograf-makinesi-cantalari",parent:t,is_landing_page:a,children:[]},{id:yA,name:yB,slug:yC,parent:t,is_landing_page:a,children:[]},{id:1447,name:hv,slug:"filtreler",parent:t,is_landing_page:a,children:[]},{id:1448,name:"Tripod",slug:"tripod",parent:t,is_landing_page:a,children:[]},{id:1449,name:"Monopod",slug:"monopod",parent:t,is_landing_page:a,children:[]},{id:1450,name:"Fotoğraf Kağıtları",slug:"fotograf-kagitlari",parent:t,is_landing_page:a,children:[]},{id:1451,name:"Işık Ölçüm Cihazları",slug:"isik-olcum-cihazlari",parent:t,is_landing_page:a,children:[]},{id:1452,name:"Stüdyo Ekipmanları",slug:"studyo-ekipmanlari",parent:t,is_landing_page:a,children:[]},{id:1453,name:yD,slug:"adaptorler",parent:t,is_landing_page:a,children:[]},{id:1454,name:"Flaş ve Aksesuarları",slug:"flas-ve-aksesuarlari",parent:t,is_landing_page:a,children:[]},{id:1455,name:"Drone Aksesuar & Ekipmanları",slug:"drone-aksesuar-ve-ekipmanlari",parent:t,is_landing_page:a,children:[]},{id:1456,name:"Fonlar",slug:"fonlar",parent:t,is_landing_page:a,children:[]},{id:1457,name:yE,slug:"mikrofonlar",parent:t,is_landing_page:a,children:[]},{id:1458,name:iD,slug:"fotograf-makinesi-ve-kamera-ekran-koruyuculari",parent:t,is_landing_page:a,children:[]},{id:1459,name:"Işıklar",slug:"isiklar",parent:t,is_landing_page:a,children:[]},{id:1460,name:"Parasoley",slug:"parasoley",parent:t,is_landing_page:a,children:[]},{id:1461,name:"Paraflaş",slug:"paraflas",parent:t,is_landing_page:a,children:[]},{id:1462,name:mg,slug:"pil-ve-sarj-cihazlari",parent:t,is_landing_page:a,children:[]},{id:1463,name:hw,slug:"yagmurluklar",parent:t,is_landing_page:a,children:[]},{id:1464,name:kS,slug:"fotograf-makinesi-ve-kamera-uzaktan-kumandalar",parent:t,is_landing_page:a,children:[]},{id:1465,name:"Vizör Lastiği",slug:"vizor-lastigi",parent:t,is_landing_page:a,children:[]},{id:1466,name:"Hafıza Kartı ve Kart Okuyucuları",slug:"hafiza-karti-ve-kart-okuyuculari",parent:t,is_landing_page:a,children:[]},{id:1467,name:"Yazıcı ve Tarayıcılar",slug:"yazici-ve-tarayicilar",parent:t,is_landing_page:a,children:[]},{id:1468,name:"Reflektör",slug:"reflektor",parent:t,is_landing_page:a,children:[]},{id:1469,name:"Kablolar & Bağlantılar",slug:"kablolar-ve-baglantilar",parent:t,is_landing_page:a,children:[]},{id:1470,name:kR,slug:"fotograf-makinesi-ve-kamera-kilif",parent:t,is_landing_page:a,children:[]},{id:1471,name:"Temizleme Ekipmanları",slug:"temizleme-ekipmanlari",parent:t,is_landing_page:a,children:[]},{id:1472,name:H,slug:"diger-fotograf-makinesi-ve-kamera-urunleri",parent:t,is_landing_page:a,children:[]},{id:4196,name:"Cep Telefonu Lensi",slug:"cep-telefonu-lensi",parent:t,is_landing_page:a,children:[]}]},{id:eb,name:"Karanlık Oda",slug:yF,parent:aC,is_landing_page:a,children:[{id:1474,name:"Fotoğraf Kağıdı",slug:"fotograf-kagidi",parent:eb,is_landing_page:a,children:[]},{id:1475,name:"Fotoğraf Kimyasalları",slug:"fotograf-kimyasallari",parent:eb,is_landing_page:a,children:[]},{id:1476,name:"Fotoğaf Filmi",slug:"fotogaf-filmi",parent:eb,is_landing_page:a,children:[]},{id:1477,name:"Banyo Ekipmanları",slug:"banyo-ekipmanlari",parent:eb,is_landing_page:a,children:[]},{id:1478,name:"Albümler",slug:"albumler",parent:eb,is_landing_page:a,children:[]},{id:1479,name:H,slug:"diger-karanlik-oda-urunleri",parent:eb,is_landing_page:a,children:[]}]},{id:yG,name:"Dijital Fotoğraf Çerçeveleri",slug:yH,parent:aC,is_landing_page:a,children:[]}],color:mh,styles:{fontSize:kZ}},{id:bp,name:"Ev Dekorasyon",slug:yI,parent:j,is_landing_page:z,children:[{id:U,name:yJ,slug:yK,parent:bp,is_landing_page:a,children:[{id:ec,name:yL,slug:yM,parent:U,is_landing_page:a,children:[{id:1489,name:"Ayakkabılık",slug:"ayakkabilik",parent:ec,is_landing_page:a,children:[]},{id:1490,name:"Portmanto",slug:"portmanto",parent:ec,is_landing_page:a,children:[]},{id:1491,name:yN,slug:"cok-amacli-dolaplar",parent:ec,is_landing_page:a,children:[]},{id:1492,name:"Ayaklı Askılık & Şemsiyelik",slug:"ayakli-askilik-ve-semsiyelik",parent:ec,is_landing_page:a,children:[]},{id:1493,name:"Kapı Ve Duvar Askılık",slug:"kapi-ve-duvar-askilik",parent:ec,is_landing_page:a,children:[]},{id:1494,name:"Ayna & Dresuar",slug:"ayna-ve-dresuar",parent:ec,is_landing_page:a,children:[]}]},{id:eN,name:yO,slug:yP,parent:U,is_landing_page:a,children:[{id:1496,name:"Kiler Dolabı",slug:"kiler-dolabi",parent:eN,is_landing_page:a,children:[]},{id:1497,name:"Hazır Mutfaklar",slug:"hazir-mutfaklar",parent:eN,is_landing_page:a,children:[]},{id:1498,name:"Tekli Dolaplar",slug:"tekli-dolaplar",parent:eN,is_landing_page:a,children:[]},{id:1499,name:"Sebze\u002FEkmek Dolabı",slug:"sebze-ekmek-dolabi",parent:eN,is_landing_page:a,children:[]},{id:1500,name:"Raflar",slug:"raflar",parent:eN,is_landing_page:a,children:[]}]},{id:bM,name:yQ,slug:yR,parent:U,is_landing_page:a,children:[{id:1502,name:yS,slug:"gardiroplar",parent:bM,is_landing_page:a,children:[]},{id:1503,name:"Bazalar",slug:"bazalar",parent:bM,is_landing_page:a,children:[]},{id:1504,name:yT,slug:"karyolalar",parent:bM,is_landing_page:a,children:[]},{id:1505,name:"Josephin Koltuk",slug:"josephin-koltuk",parent:bM,is_landing_page:a,children:[]},{id:1506,name:"Paravanlar",slug:"paravanlar",parent:bM,is_landing_page:a,children:[]},{id:1507,name:"Sandıklar",slug:"sandiklar",parent:bM,is_landing_page:a,children:[]},{id:1508,name:"Bez Gardırop",slug:"bez-gardirop",parent:bM,is_landing_page:a,children:[]},{id:1509,name:"Makyaj Masası\u002FDolabı",slug:"makyaj-masasi-dolabi",parent:bM,is_landing_page:a,children:[]},{id:1510,name:yU,slug:"komodin-sifonyer",parent:bM,is_landing_page:a,children:[]},{id:1511,name:"Yatak Odası Takım",slug:"yatak-odasi-takim",parent:bM,is_landing_page:a,children:[]}]},{id:ci,name:yV,slug:yW,parent:U,is_landing_page:a,children:[{id:1513,name:"Oda Takımları",slug:"oda-takimlari",parent:ci,is_landing_page:a,children:[]},{id:1514,name:yS,slug:"genc-ve-cocuk-odasi-gardirop",parent:ci,is_landing_page:a,children:[]},{id:1515,name:"Ranzalar",slug:"ranzalar",parent:ci,is_landing_page:a,children:[]},{id:1516,name:yT,slug:"genc-ve-cocuk-odasi-karyola",parent:ci,is_landing_page:a,children:[]},{id:1517,name:"Çocuk Koltukları",slug:"cocuk-koltuklari",parent:ci,is_landing_page:a,children:[]},{id:1518,name:yU,slug:"genc-ve-cocuk-odasi-komidin-sifonyer",parent:ci,is_landing_page:a,children:[]},{id:1519,name:"Çalışma Masası",slug:"calisma-masasi",parent:ci,is_landing_page:a,children:[]},{id:1520,name:yX,slug:"kitaplik",parent:ci,is_landing_page:a,children:[]},{id:1521,name:jw,slug:"genc-ve-cocuk-odasi-hali",parent:ci,is_landing_page:a,children:[]}]},{id:eO,name:yY,slug:yZ,parent:U,is_landing_page:a,children:[{id:1523,name:"Mutfak Masası\u002FTakımları",slug:"mutfak-masasi-takimlari",parent:eO,is_landing_page:a,children:[]},{id:1524,name:"Mutfak Sandalyesi",slug:"mutfak-sandalyesi",parent:eO,is_landing_page:a,children:[]},{id:1525,name:"Tabureler",slug:"tabureler",parent:eO,is_landing_page:a,children:[]},{id:1526,name:mi,slug:"dolaplar",parent:eO,is_landing_page:a,children:[]},{id:1527,name:"Sofra",slug:"sofra",parent:eO,is_landing_page:a,children:[]}]},{id:gb,name:y_,slug:y$,parent:U,is_landing_page:a,children:[{id:hx,name:"Kanepe-Koltuklar",slug:"kanepe-koltuklar",parent:gb,is_landing_page:a,children:[{id:1530,name:"Kanepeler",slug:"kanepeler",parent:hx,is_landing_page:a,children:[]},{id:1531,name:"Koltuk Takımları",slug:"koltuk-takimlari",parent:hx,is_landing_page:a,children:[]},{id:1532,name:"Köşe Koltuklar",slug:"kose-koltuklar",parent:hx,is_landing_page:a,children:[]},{id:1533,name:"Tekli Koltuk-Berjer",slug:"tekli-koltuk-berjer",parent:hx,is_landing_page:a,children:[]}]},{id:mj,name:"Tv Ünitesi Ve Sehpaları",slug:"tv-unitesi-ve-sehpalari",parent:gb,is_landing_page:a,children:[{id:1535,name:"Tv Ünitesi",slug:"tv-unitesi",parent:mj,is_landing_page:a,children:[]},{id:1536,name:"Tv Sehpası",slug:"tv-sehpasi",parent:mj,is_landing_page:a,children:[]}]},{id:mk,name:"Puf-Minder-Armut Koltuk",slug:"puf-minder-armut-koltuk",parent:gb,is_landing_page:a,children:[{id:1538,name:"Puf",slug:"puf",parent:mk,is_landing_page:a,children:[]},{id:1539,name:"Armut Koltuk",slug:"armut-koltuk",parent:mk,is_landing_page:a,children:[]}]},{id:1540,name:"Duvar Rafları",slug:"duvar-raflari",parent:gb,is_landing_page:a,children:[]}]},{id:gc,name:za,slug:zb,parent:U,is_landing_page:a,children:[{id:1543,name:"Masa Takımları",slug:"masa-takimlari",parent:gc,is_landing_page:a,children:[]},{id:1544,name:zc,slug:"sandalye",parent:gc,is_landing_page:a,children:[]},{id:1545,name:"Gümüşlük & Konsol",slug:"gumusluk-ve-konsol",parent:gc,is_landing_page:a,children:[]},{id:1546,name:"Yemek Masası",slug:"yemek-masasi",parent:gc,is_landing_page:a,children:[]}]},{id:hy,name:zd,slug:ze,parent:U,is_landing_page:a,children:[{id:1548,name:"Banyo Dolabı",slug:"banyo-dolabi",parent:hy,is_landing_page:a,children:[]},{id:1549,name:"Boy Dolabı",slug:"boy-dolabi",parent:hy,is_landing_page:a,children:[]},{id:1550,name:"Banyo Organizer",slug:"banyo-organizer",parent:hy,is_landing_page:a,children:[]}]},{id:ml,name:mi,slug:zf,parent:U,is_landing_page:a,children:[{id:1552,name:yN,slug:"cok-amacli-dolap",parent:ml,is_landing_page:a,children:[]}]},{id:eP,name:zg,slug:"ofis-mobilya",parent:U,is_landing_page:a,children:[{id:zh,name:zi,slug:zj,parent:eP,is_landing_page:a,children:[]},{id:zk,name:zl,slug:zm,parent:eP,is_landing_page:a,children:[]},{id:3912,name:"Ofis Dolapları",slug:"ofis-dolaplari",parent:eP,is_landing_page:a,children:[]},{id:3913,name:"Ofis Sehpası",slug:"ofis-sehpasi",parent:eP,is_landing_page:a,children:[]},{id:3914,name:yX,slug:"ofis-kitapligi",parent:eP,is_landing_page:a,children:[]},{id:3915,name:"Oyuncu Koltuğu",slug:"oyuncu-koltugu",parent:eP,is_landing_page:a,children:[]}]},{id:a_,name:zn,slug:"bahce-mobilya",parent:U,is_landing_page:a,children:[{id:3199,name:"Bahçe Takım Mobilyalar",slug:"bahce-takim-mobilyalar",parent:a_,is_landing_page:a,children:[]},{id:3200,name:yn,slug:"salincak",parent:a_,is_landing_page:a,children:[]},{id:3201,name:"Hamaklar",slug:"hamaklar",parent:a_,is_landing_page:a,children:[]},{id:3202,name:"Şezlong",slug:"sezlong",parent:a_,is_landing_page:a,children:[]},{id:3203,name:lp,slug:"semsiye",parent:a_,is_landing_page:a,children:[]},{id:3204,name:"Tente",slug:"tente",parent:a_,is_landing_page:a,children:[]},{id:3205,name:zc,slug:"bahce-sandalyesi",parent:a_,is_landing_page:a,children:[]},{id:3206,name:"Masa",slug:"bahce-masa",parent:a_,is_landing_page:a,children:[]},{id:3207,name:"Tabure",slug:"tabure",parent:a_,is_landing_page:a,children:[]},{id:3208,name:"Sehpa",slug:"sehpa",parent:a_,is_landing_page:a,children:[]},{id:3209,name:"Koltuk",slug:"koltuk",parent:a_,is_landing_page:a,children:[]},{id:3210,name:"Banklar",slug:"banklar",parent:a_,is_landing_page:a,children:[]},{id:3211,name:"Bahçe Minderleri ve Puflar",slug:"bahce-minderleri-ve-puflar",parent:a_,is_landing_page:a,children:[]}]},{id:7151,name:"Mobilya Montaj Hizmeti",slug:"mobilya-montaj-hizmeti",parent:U,is_landing_page:a,children:[]}]},{id:I,name:zo,slug:zp,parent:bp,is_landing_page:a,children:[{id:bN,name:jw,slug:zq,parent:I,is_landing_page:a,children:[{id:1555,name:"Halı Örtüsü",slug:"hali-ortusu",parent:bN,is_landing_page:a,children:[]},{id:1556,name:"Seccade",slug:"seccade",parent:bN,is_landing_page:a,children:[]},{id:1557,name:zr,slug:"paspas",parent:bN,is_landing_page:a,children:[]},{id:1558,name:"Kilim",slug:"kilim",parent:bN,is_landing_page:a,children:[]},{id:1559,name:"Makina Halısı",slug:"makina-halisi",parent:bN,is_landing_page:a,children:[]},{id:1560,name:"Yolluk",slug:"yolluk",parent:bN,is_landing_page:a,children:[]},{id:1561,name:"Bambu Halı",slug:"bambu-hali",parent:bN,is_landing_page:a,children:[]},{id:1562,name:"Shaggy Halı",slug:"shaggy-hali",parent:bN,is_landing_page:a,children:[]},{id:1563,name:"El Halısı",slug:"el-halisi",parent:bN,is_landing_page:a,children:[]},{id:1564,name:"Çocuk Halısı",slug:"cocuk-halisi",parent:bN,is_landing_page:a,children:[]}]},{id:ed,name:zs,slug:zt,parent:I,is_landing_page:a,children:[{id:1566,name:"Stor Perde",slug:"stor-perde",parent:ed,is_landing_page:a,children:[]},{id:1567,name:"Jaluzi Perde",slug:"jaluzi-perde",parent:ed,is_landing_page:a,children:[]},{id:1568,name:"İp Perde",slug:"ip-perde",parent:ed,is_landing_page:a,children:[]},{id:1569,name:"Tül Perde",slug:"tul-perde",parent:ed,is_landing_page:a,children:[]},{id:1570,name:"Fon Perde",slug:"fon-perde",parent:ed,is_landing_page:a,children:[]},{id:1571,name:"Perde Aksesuarları",slug:"perde-aksesuarlari",parent:ed,is_landing_page:a,children:[]}]},{id:cM,name:zu,slug:zv,parent:I,is_landing_page:a,children:[{id:1573,name:"Bornoz",slug:"bornoz",parent:cM,is_landing_page:a,children:[]},{id:1574,name:"Bornoz Takımı",slug:"bornoz-takimi",parent:cM,is_landing_page:a,children:[]},{id:1575,name:"Banyo Klozet Takımı",slug:"banyo-klozet-takimi",parent:cM,is_landing_page:a,children:[]},{id:1576,name:"Duş Perdesi",slug:"dus-perdesi",parent:cM,is_landing_page:a,children:[]},{id:1577,name:"Peştamal",slug:"pestamal",parent:cM,is_landing_page:a,children:[]},{id:1578,name:"Plaj Havlusu",slug:"plaj-havlusu",parent:cM,is_landing_page:a,children:[]},{id:hz,name:"Havlu & Havlu Seti",slug:"havlu-havlu-seti",parent:cM,is_landing_page:a,children:[{id:6567,name:"El Yüz Havluları",slug:"el-yuz-havlulari",parent:hz,is_landing_page:a,children:[]},{id:6579,name:"Ayak Havluları",slug:"ayak-havlulari",parent:hz,is_landing_page:a,children:[]},{id:6591,name:"Banyo Havluları",slug:"banyo-havlulari",parent:hz,is_landing_page:a,children:[]},{id:6603,name:"Havlu Setleri",slug:"havlu-setleri",parent:hz,is_landing_page:a,children:[]}]},{id:7101,name:"Bebek Havlu ve Bornoz",slug:"bebek-havlu-ve-bornoz",parent:cM,is_landing_page:a,children:[]}]},{id:hA,name:zw,slug:zx,parent:I,is_landing_page:a,children:[{id:1580,name:"Çift Kişilik Nevresim Takımı",slug:"cift-kisilik-nevresim-takimi",parent:hA,is_landing_page:a,children:[]},{id:1581,name:"Tek Kişilik Nevresim Takımı",slug:"tek-kisilik-nevresim-takimi",parent:hA,is_landing_page:a,children:[]},{id:1582,name:"Çocuk Ve Genç Nevresim Takımı",slug:"cocuk-ve-genc-nevresim-takimi",parent:hA,is_landing_page:a,children:[]}]},{id:aP,name:zy,slug:zz,parent:I,is_landing_page:a,children:[{id:1584,name:"Silikon Yastık",slug:"silikon-yastik",parent:aP,is_landing_page:a,children:[]},{id:1585,name:"Yün Yastık",slug:"yun-yastik",parent:aP,is_landing_page:a,children:[]},{id:1586,name:"Visco Yastık",slug:"visco-yastik",parent:aP,is_landing_page:a,children:[]},{id:1587,name:"Pamuk Yastık",slug:"pamuk-yastik",parent:aP,is_landing_page:a,children:[]},{id:1588,name:"Kaz Tüyü Yastık",slug:"kaz-tuyu-yastik",parent:aP,is_landing_page:a,children:[]},{id:1589,name:"Elyaf Yastık",slug:"elyaf-yastik",parent:aP,is_landing_page:a,children:[]},{id:1590,name:"Latesk Yastık",slug:"latesk-yastik",parent:aP,is_landing_page:a,children:[]},{id:1591,name:"Reflü Yastık",slug:"reflu-yastik",parent:aP,is_landing_page:a,children:[]},{id:1592,name:"Silikon Yorgan",slug:"silikon-yorgan",parent:aP,is_landing_page:a,children:[]},{id:1593,name:"Yün Yorgan",slug:"yun-yorgan",parent:aP,is_landing_page:a,children:[]},{id:1594,name:"Pamuk Yorgan",slug:"pamuk-yorgan",parent:aP,is_landing_page:a,children:[]},{id:1595,name:"Micro Fiber Yorgan",slug:"micro-fiber-yorgan",parent:aP,is_landing_page:a,children:[]},{id:1596,name:zA,slug:"alez-2",parent:aP,is_landing_page:a,children:[]}]},{id:gd,name:mm,slug:"yataklar",parent:I,is_landing_page:a,children:[{id:1598,name:"Visco Yatak",slug:"visco-yatak",parent:gd,is_landing_page:a,children:[]},{id:1599,name:"Yaylı Yataklar",slug:"yayli-yataklar",parent:gd,is_landing_page:a,children:[]},{id:1600,name:"Lateks Yataklar",slug:"lateks-yataklar",parent:gd,is_landing_page:a,children:[]},{id:1601,name:"Yatak Pedi\u002FŞilte",slug:"yatak-pedi-silte",parent:gd,is_landing_page:a,children:[]},{id:1602,name:"Sünger Yatak",slug:"sunger-yatak",parent:gd,is_landing_page:a,children:[]}]},{id:ge,name:lZ,slug:"ev-tekstil-dekorayon-urunleri",parent:I,is_landing_page:a,children:[{id:1604,name:"Dekoratif Kırlent-Yastık",slug:"dekoratif-kirlent-yastik",parent:ge,is_landing_page:a,children:[]},{id:1605,name:mn,slug:"minderler",parent:ge,is_landing_page:a,children:[]},{id:1606,name:"Koltuk Örtü-Şalları",slug:"koltuk-ortu-sallari",parent:ge,is_landing_page:a,children:[]},{id:1607,name:"Saklama Ürünleri",slug:"saklama-urunleri",parent:ge,is_landing_page:a,children:[]},{id:1608,name:"Kumaşlar",slug:"kumaslar",parent:ge,is_landing_page:a,children:[]}]},{id:hB,name:"Masa Örtüleri",slug:"masa-ortuleri",parent:I,is_landing_page:a,children:[{id:1610,name:"Klasik Masa Örtüleri",slug:"klasik-masa-ortuleri",parent:hB,is_landing_page:a,children:[]},{id:1611,name:"Runner",slug:"runner",parent:hB,is_landing_page:a,children:[]},{id:1612,name:"Amerikan Servis",slug:"amerikan-servis",parent:hB,is_landing_page:a,children:[]},{id:1613,name:wQ,slug:"pecete-masa-ortusu",parent:hB,is_landing_page:a,children:[]}]},{id:hC,name:"Mutfak Tekstili",slug:"mutfak-tekstili",parent:I,is_landing_page:a,children:[{id:1615,name:xE,slug:"mutfak-set",parent:hC,is_landing_page:a,children:[]},{id:1616,name:"Mutfak Önlükleri",slug:"mutfak-onlukleri",parent:hC,is_landing_page:a,children:[]},{id:1617,name:"Fırın Eldivenleri",slug:"firin-eldivenleri",parent:hC,is_landing_page:a,children:[]},{id:1618,name:"Kurulama Bezleri",slug:"kurulama-bezleri",parent:hC,is_landing_page:a,children:[]}]},{id:jx,name:"Uyku Setleri",slug:"uyku-setleri",parent:I,is_landing_page:a,children:[{id:1620,name:"Çift Kişilik Uyku Setleri",slug:"cift-kisilik-uyku-setleri",parent:jx,is_landing_page:a,children:[]},{id:1621,name:"Tek Kişilik Uyku Setleri",slug:"tek-kisilik-uyku-setleri",parent:jx,is_landing_page:a,children:[]},{id:1622,name:"Çocuk \u002FGenç Uyku Setleri",slug:"cocuk-genc-uyku-setleri",parent:jx,is_landing_page:a,children:[]}]},{id:eQ,name:mo,slug:zB,parent:I,is_landing_page:a,children:[{id:1624,name:"Akrilik Battaniye",slug:"akrilik-battaniye",parent:eQ,is_landing_page:a,children:[]},{id:1625,name:"Polyester Battaniye",slug:"polyester-battaniye",parent:eQ,is_landing_page:a,children:[]},{id:1626,name:"Yün Battaniye",slug:"yun-battaniye",parent:eQ,is_landing_page:a,children:[]},{id:1627,name:"Pamuk Battaniye",slug:"pamuk-battaniye",parent:eQ,is_landing_page:a,children:[]},{id:1628,name:"Elektrikli Battaniye",slug:"elektrikli-battaniye",parent:eQ,is_landing_page:a,children:[]}]},{id:zC,name:zD,slug:zE,parent:I,is_landing_page:a,children:[]},{id:zF,name:zG,slug:zH,parent:I,is_landing_page:a,children:[]},{id:zI,name:zJ,slug:zK,parent:I,is_landing_page:a,children:[]},{id:cN,name:"Bebek Odası Tekstil",slug:"bebek-odasi-tekstili",parent:I,is_landing_page:a,children:[{id:zL,name:zM,slug:zN,parent:cN,is_landing_page:a,children:[]},{id:1280,name:mo,slug:"bebek-battaniyesi",parent:cN,is_landing_page:a,children:[]},{id:1281,name:"Yastık",slug:"yastik",parent:cN,is_landing_page:a,children:[]},{id:1282,name:"Yorgan",slug:"yorgan",parent:cN,is_landing_page:a,children:[]},{id:1283,name:zA,slug:"alez",parent:cN,is_landing_page:a,children:[]},{id:1284,name:"Çarşaf",slug:"carsaf",parent:cN,is_landing_page:a,children:[]},{id:zO,name:zP,slug:zQ,parent:cN,is_landing_page:a,children:[]},{id:1286,name:jw,slug:"bebek-odasi-halisi",parent:cN,is_landing_page:a,children:[]},{id:1287,name:"Cibinlik Perde",slug:"cibinlik-perde",parent:cN,is_landing_page:a,children:[]}]}]},{id:r,name:zR,slug:zS,parent:bp,is_landing_page:a,children:[{id:zT,name:zU,slug:zV,parent:r,is_landing_page:a,children:[]},{id:ee,name:zW,slug:zX,parent:r,is_landing_page:a,children:[{id:1635,name:"Takımlar",slug:"takimlar",parent:ee,is_landing_page:a,children:[]},{id:1636,name:"Çatallar",slug:"catallar",parent:ee,is_landing_page:a,children:[]},{id:1637,name:"Kaşıklar",slug:"kasiklar",parent:ee,is_landing_page:a,children:[]},{id:1638,name:"Bıçaklar",slug:"bicaklar",parent:ee,is_landing_page:a,children:[]},{id:1639,name:"Çay Kaşığı",slug:"cay-kasigi",parent:ee,is_landing_page:a,children:[]},{id:1640,name:"Bıçak Ve Rendeler",slug:"bicak-ve-rendeler",parent:ee,is_landing_page:a,children:[]}]},{id:cj,name:zY,slug:zZ,parent:r,is_landing_page:a,children:[{id:1642,name:z_,slug:"titanyum-tencere",parent:cj,is_landing_page:a,children:[]},{id:1643,name:"Granit Tencere",slug:"granit-tencere",parent:cj,is_landing_page:a,children:[]},{id:1644,name:"Çelik Tencere",slug:"celik-tencere",parent:cj,is_landing_page:a,children:[]},{id:1645,name:"Seramik Tencere",slug:"seramik-tencere",parent:cj,is_landing_page:a,children:[]},{id:1646,name:"Teflon Tencere",slug:"teflon-tencere",parent:cj,is_landing_page:a,children:[]},{id:1647,name:"Döküm Tencere",slug:"dokum-tencere",parent:cj,is_landing_page:a,children:[]},{id:1648,name:"Emaye Tencere",slug:"emaye-tencere",parent:cj,is_landing_page:a,children:[]},{id:1649,name:z$,slug:"porselen-tencere",parent:cj,is_landing_page:a,children:[]},{id:1650,name:"Cam Tencere",slug:"cam-tencere",parent:cj,is_landing_page:a,children:[]}]},{id:mp,name:Aa,slug:Ab,parent:r,is_landing_page:a,children:[{id:1652,name:z_,slug:"titanyum-duduklu-tencere",parent:mp,is_landing_page:a,children:[]}]},{id:dq,name:Ac,slug:Ad,parent:r,is_landing_page:a,children:[{id:1654,name:"Granit Tava",slug:"granit-tava-2",parent:dq,is_landing_page:a,children:[]},{id:1655,name:"Teflon Tava",slug:"teflon-tava-2",parent:dq,is_landing_page:a,children:[]},{id:1656,name:"Döküm Tava",slug:"dokum-tava-2",parent:dq,is_landing_page:a,children:[]},{id:1657,name:"Çelik Tava",slug:"celik-tava-2",parent:dq,is_landing_page:a,children:[]},{id:1658,name:"Seramik Tava",slug:"seramik-tava-2",parent:dq,is_landing_page:a,children:[]},{id:1659,name:"Emaye Tava",slug:"emraye-tava",parent:dq,is_landing_page:a,children:[]},{id:1660,name:z$,slug:"porselen-tencere-2",parent:dq,is_landing_page:a,children:[]}]},{id:1661,name:"Kahvaltı Takımları",slug:"kahvalti-takimlari",parent:r,is_landing_page:a,children:[]},{id:cO,name:Ae,slug:Af,parent:r,is_landing_page:a,children:[{id:1663,name:"Çaydanlıklar",slug:"caydanliklar",parent:cO,is_landing_page:a,children:[]},{id:1664,name:"Cezveler",slug:"cezveler",parent:cO,is_landing_page:a,children:[]},{id:1665,name:"Çay Tabak Ve Kaşığı",slug:"cay-tabak-ve-kasigi",parent:cO,is_landing_page:a,children:[]},{id:1666,name:"Moka Pot",slug:"moka-pot",parent:cO,is_landing_page:a,children:[]},{id:1667,name:"French Press",slug:"french-press",parent:cO,is_landing_page:a,children:[]},{id:1668,name:"Fincan Ve Kahve Setleri",slug:"fincan-ve-kahve-setleri",parent:cO,is_landing_page:a,children:[]},{id:1669,name:"Çay Süzgeci",slug:"cay-suzgeci",parent:cO,is_landing_page:a,children:[]},{id:1670,name:"Demlikler",slug:"demlikler",parent:cO,is_landing_page:a,children:[]}]},{id:jy,name:Ag,slug:Ah,parent:r,is_landing_page:a,children:[{id:1672,name:"Sürahiler",slug:"surahiler",parent:jy,is_landing_page:a,children:[]},{id:1673,name:"Bardaklar",slug:"bardaklar",parent:jy,is_landing_page:a,children:[]}]},{id:1674,name:"Mutfak Ekipmanları",slug:"mutfak-ekipmanlari",parent:r,is_landing_page:a,children:[]},{id:Ai,name:Aj,slug:Ak,parent:r,is_landing_page:a,children:[]},{id:eR,name:"Fırın Kapları & Kek Kapları",slug:"firin-kaplari-ve-kek-kaplari",parent:r,is_landing_page:a,children:[{id:1677,name:"Kek Kalıbı",slug:"kek-kalibi",parent:eR,is_landing_page:a,children:[]},{id:1678,name:"Fırın Tepsisi",slug:"firin-tepsisi",parent:eR,is_landing_page:a,children:[]},{id:1679,name:"Cam Tepsi",slug:"cam-tepsi",parent:eR,is_landing_page:a,children:[]},{id:1680,name:"Kurabiye Kalıbı",slug:"kurabiye-kalibi",parent:eR,is_landing_page:a,children:[]},{id:1681,name:"Güveç",slug:"guvec",parent:eR,is_landing_page:a,children:[]},{id:1682,name:"Pasta Malzemeleri",slug:"pasta-malzemeleri",parent:eR,is_landing_page:a,children:[]}]},{id:jz,name:"Ekmek Kutusu ve Saklama Kapları",slug:"ekmek-kutusu-ve-saklama-kaplari",parent:r,is_landing_page:a,children:[{id:1684,name:"Saklama Kapları",slug:"saklama-kaplari",parent:jz,is_landing_page:a,children:[]},{id:1685,name:"Ekmek Kutusu",slug:"ekmek-kutusu",parent:jz,is_landing_page:a,children:[]},{id:1686,name:"Kavanoz",slug:"kavanoz",parent:jz,is_landing_page:a,children:[]}]},{id:1687,name:"Termoslar",slug:"termoslar",parent:r,is_landing_page:a,children:[]},{id:1688,name:"Baharat Takımları ve Setler",slug:"baharat-takimlari-ve-setler",parent:r,is_landing_page:a,children:[]},{id:mq,name:"Bulaşık Sepetleri & Sebzelikler",slug:"bulasik-sepetleri-ve-sebzelikler",parent:r,is_landing_page:a,children:[{id:1690,name:"Bulaşık Sepetleri",slug:"bulasik-sepetleri",parent:mq,is_landing_page:a,children:[]},{id:1691,name:"Sebzelikler",slug:"sebzelikler",parent:mq,is_landing_page:a,children:[]}]},{id:Al,name:Am,slug:An,parent:r,is_landing_page:a,children:[]},{id:mr,name:"Kase & Çerezlikler",slug:"kase-ve-cerezlikler",parent:r,is_landing_page:a,children:[{id:1694,name:"Kase",slug:"mutfak-kasesi",parent:mr,is_landing_page:a,children:[]},{id:1695,name:"Çerezlikler",slug:"cerezlikler",parent:mr,is_landing_page:a,children:[]}]},{id:1696,name:"Servis Tepsileri",slug:"servis-tepsileri",parent:r,is_landing_page:a,children:[]},{id:1697,name:"Sosluk",slug:"sosluk",parent:r,is_landing_page:a,children:[]},{id:gf,name:Ao,slug:Ap,parent:r,is_landing_page:a,children:[{id:1699,name:"Çeyiz Yemek Takımları",slug:"ceyiz-yemek-takimlari",parent:gf,is_landing_page:a,children:[]},{id:1700,name:"Çeyiz Çatal,Kaşık,Bıçak Takımları",slug:"ceyiz-catal-kasik-bicak-takimlari",parent:gf,is_landing_page:a,children:[]},{id:1701,name:"Çeyiz Tencere",slug:"ceyiz-tencere",parent:gf,is_landing_page:a,children:[]},{id:1702,name:"Çeyiz Tavaları",slug:"ceyiz-tavalari",parent:gf,is_landing_page:a,children:[]}]},{id:bO,name:"Yemek Hazırlama Gereçleri",slug:"yemek-hazirlama-gerecleri",parent:r,is_landing_page:a,children:[{id:1704,name:"Sebze Meyve Soyacağı",slug:"sebze-meyve-soyacagi",parent:bO,is_landing_page:a,children:[]},{id:1705,name:"Mutfak Maşası",slug:"mutfak-masasi",parent:bO,is_landing_page:a,children:[]},{id:1706,name:"Sarımsak Ve Patates Ezici",slug:"sarimsak-ve-patates-ezici",parent:bO,is_landing_page:a,children:[]},{id:1707,name:"Süzgeç",slug:"suzgec",parent:bO,is_landing_page:a,children:[]},{id:1708,name:"Mutfak Spatulası",slug:"mutfak-spatulasi",parent:bO,is_landing_page:a,children:[]},{id:1709,name:"Kesme Tahtası",slug:"kesme-tahtasi",parent:bO,is_landing_page:a,children:[]},{id:1710,name:"Yumurta Fırçası",slug:"yumurta-fircasi",parent:bO,is_landing_page:a,children:[]},{id:1711,name:"Mutfak Makası",slug:"mutfak-makasi",parent:bO,is_landing_page:a,children:[]},{id:1712,name:"Kevgir",slug:"kevgir",parent:bO,is_landing_page:a,children:[]},{id:1713,name:"Çırpıcı",slug:"cirpici",parent:bO,is_landing_page:a,children:[]},{id:1714,name:"Mutfak Kepçesi",slug:"mutfak-kepcesi",parent:bO,is_landing_page:a,children:[]}]},{id:1715,name:"Kahvaltılıklar",slug:"kahvaltiliklar",parent:r,is_landing_page:a,children:[]},{id:7016,name:"Endüstriyel Mutfak Gereçleri ",slug:"endüstriyel-mutfak-gerecleri ",parent:r,is_landing_page:a,children:[]}]},{id:m,name:Aq,slug:Ar,parent:bp,is_landing_page:a,children:[{id:As,name:At,slug:Au,parent:m,is_landing_page:a,children:[]},{id:1718,name:"Tasarım Ürünler",slug:"tasarim-urunler",parent:m,is_landing_page:a,children:[]},{id:jA,name:"Ev Düzenleme Ve Saklama",slug:"ev-duzenleme-ve-saklama",parent:m,is_landing_page:a,children:[{id:1720,name:lC,slug:"taki-saklama-kutusu",parent:jA,is_landing_page:a,children:[]},{id:1721,name:Av,slug:"saklama-kutusu",parent:jA,is_landing_page:a,children:[]},{id:1722,name:Aw,slug:"dekoratif-saklama-kutusu",parent:jA,is_landing_page:a,children:[]}]},{id:1723,name:"Biblo",slug:"biblo",parent:m,is_landing_page:a,children:[]},{id:Ax,name:Ay,slug:Az,parent:m,is_landing_page:a,children:[]},{id:AA,name:AB,slug:AC,parent:m,is_landing_page:a,children:[]},{id:AD,name:"Dekoratif Hediyeler",slug:"dekoratif-hediyeler",parent:m,is_landing_page:a,children:[{id:4179,name:"Hediye Çeki",slug:"hediye-ceki",parent:AD,is_landing_page:a,children:[]}]},{id:1727,name:"Duvar Saatleri",slug:"duvar-saatleri",parent:m,is_landing_page:a,children:[]},{id:1728,name:"Şamdan-Mumluk",slug:"samdan-mumluk",parent:m,is_landing_page:a,children:[]},{id:AE,name:AF,slug:AG,parent:m,is_landing_page:a,children:[]},{id:AH,name:AI,slug:AJ,parent:m,is_landing_page:a,children:[]},{id:AK,name:AL,slug:AM,parent:m,is_landing_page:a,children:[]},{id:1732,name:"Sticker Ve Folyolar",slug:"sticker-ve-folyolar",parent:m,is_landing_page:a,children:[]},{id:a$,name:AN,slug:AO,parent:m,is_landing_page:a,children:[{id:1734,name:"Kanvas Tablolar",slug:"kanvas-tablolar",parent:a$,is_landing_page:a,children:[]},{id:1735,name:"Mdf Tablolar",slug:"mdf-tablolar",parent:a$,is_landing_page:a,children:[]},{id:1736,name:"Çerçeveli Tablolar",slug:"cerceveli-tablolar",parent:a$,is_landing_page:a,children:[]},{id:1737,name:"Metal Tablolar",slug:"metal-tablolar",parent:a$,is_landing_page:a,children:[]},{id:1738,name:"Yağlı Boya Tablolar",slug:"yagli-boya-tablolar",parent:a$,is_landing_page:a,children:[]},{id:1739,name:"Cam Tablolar",slug:"cam-tablolar",parent:a$,is_landing_page:a,children:[]},{id:1740,name:"Led Işıklı Tablolar",slug:"led-isikli-tablolar",parent:a$,is_landing_page:a,children:[]},{id:1741,name:"Kabartma Tablolar",slug:"kabartma-tablolar",parent:a$,is_landing_page:a,children:[]},{id:1742,name:"Masif Tablolar",slug:"masif-tablolar",parent:a$,is_landing_page:a,children:[]},{id:1743,name:"Plexi Tablolar",slug:"plexi-tablolar",parent:a$,is_landing_page:a,children:[]},{id:1744,name:"Taş Tablolar",slug:"tas-tablolar",parent:a$,is_landing_page:a,children:[]},{id:1745,name:"Epoksi Tablolar",slug:"epoksi-tablolar",parent:a$,is_landing_page:a,children:[]}]},{id:AP,name:AQ,slug:AR,parent:m,is_landing_page:a,children:[]},{id:1747,name:"Dekoratif Sepetler",slug:"dekoratif-sepetler",parent:m,is_landing_page:a,children:[]},{id:1748,name:"Dekoratif Sabunlar",slug:"dekoratif-sabunlar",parent:m,is_landing_page:a,children:[]},{id:AS,name:ms,slug:AT,parent:m,is_landing_page:a,children:[]},{id:1750,name:"Kokulu Taşlar Ve Kalıplar",slug:"kokulu-taslar-ve-kaliplar",parent:m,is_landing_page:a,children:[]},{id:1751,name:"Boyanabilir Dekoratif Objeler",slug:"boyanabilir-dekoratif-objeler",parent:m,is_landing_page:a,children:[]},{id:AU,name:AV,slug:AW,parent:m,is_landing_page:a,children:[]},{id:aD,name:xU,slug:"parti-malzemeleri-2",parent:m,is_landing_page:a,children:[{id:1754,name:"Düğün,Kına,Nikah",slug:"dugun-kina-nikah",parent:aD,is_landing_page:a,children:[]},{id:1755,name:"Doğum Günü Süsleri",slug:"dogum-gunu-susleri",parent:aD,is_landing_page:a,children:[]},{id:1756,name:xV,slug:"parti-balon",parent:aD,is_landing_page:a,children:[]},{id:1757,name:"Afiş",slug:"afis",parent:aD,is_landing_page:a,children:[]},{id:1758,name:"Banner",slug:"banner",parent:aD,is_landing_page:a,children:[]},{id:1759,name:"Bayrak",slug:"bayrak",parent:aD,is_landing_page:a,children:[]},{id:1760,name:"Kek Standı",slug:"kek-standi",parent:aD,is_landing_page:a,children:[]},{id:1761,name:"Hatıra Çerçevesi",slug:"hatira-cercevesi",parent:aD,is_landing_page:a,children:[]},{id:1762,name:xW,slug:"parti-davetiye",parent:aD,is_landing_page:a,children:[]},{id:1763,name:"Kaynana Dili Düdük",slug:"kaynana-dili-duduk",parent:aD,is_landing_page:a,children:[]},{id:1764,name:"Dilek Balonu",slug:"dilek-balonu",parent:aD,is_landing_page:a,children:[]},{id:1765,name:"Kağıt Fener",slug:"kagit-fener",parent:aD,is_landing_page:a,children:[]},{id:1766,name:"Parti Gözlüğü",slug:"parti-gozlugu",parent:aD,is_landing_page:a,children:[]},{id:1767,name:"Hediye Paketleme Malzemeleri",slug:"hediye-paketleme-malzemeleri",parent:aD,is_landing_page:a,children:[]},{id:1768,name:"Fotoğraf Albümleri",slug:"fotograf-albumleri",parent:aD,is_landing_page:a,children:[]}]},{id:1769,name:Aw,slug:"dekoratif-kutu",parent:m,is_landing_page:a,children:[]},{id:1770,name:"Elbise Askısı",slug:"elbise-askisi",parent:m,is_landing_page:a,children:[]},{id:1771,name:rU,slug:"ayakkabi-kutusu",parent:m,is_landing_page:a,children:[]},{id:1772,name:Av,slug:"saklama-kutusu-2",parent:m,is_landing_page:a,children:[]},{id:1773,name:lC,slug:"taki-kutusu",parent:m,is_landing_page:a,children:[]},{id:1774,name:"Takı Askısı",slug:"taki-askisi",parent:m,is_landing_page:a,children:[]},{id:1775,name:"Yüzük Kutusu",slug:"yuzuk-kutusu",parent:m,is_landing_page:a,children:[]},{id:6758,name:"Yapay Çiçekler ve Süsleme",slug:"yapaycicekler-ve-susler",parent:m,is_landing_page:a,children:[]},{id:6779,name:"Çamaşır Kurutmalık",slug:"camasir-kurutmalik",parent:m,is_landing_page:a,children:[]}]},{id:AX,name:"Banyo",slug:"banyo",parent:bp,is_landing_page:a,children:[{id:cP,name:"Banyo Aksesuarları",slug:"banyo-aksesuarlari",parent:AX,is_landing_page:a,children:[{id:1778,name:"Klozet Fırçası",slug:"klozet-fircasi",parent:cP,is_landing_page:a,children:[]},{id:1779,name:"Banyo Aksesuar Seti",slug:"banyo-aksesuar-seti",parent:cP,is_landing_page:a,children:[]},{id:1780,name:"Çamaşır Sepeti",slug:"camasir-sepeti",parent:cP,is_landing_page:a,children:[]},{id:1781,name:"Tuvalet Kağıtlığı",slug:"tuvalet-kagitligi",parent:cP,is_landing_page:a,children:[]},{id:1782,name:"Banyo Çöp Kovası",slug:"banyo-cop-kovasi",parent:cP,is_landing_page:a,children:[]},{id:1783,name:"Maşrapa",slug:"masrapa",parent:cP,is_landing_page:a,children:[]},{id:1784,name:"Banyo Aynası Ve Setleri",slug:"banyo-aynasi-ve-setleri",parent:cP,is_landing_page:a,children:[]},{id:1785,name:"Kirli Çamaşır Sepeti",slug:"kirli-camasir-sepeti",parent:cP,is_landing_page:a,children:[]},{id:1786,name:"Etajer",slug:"etajer",parent:cP,is_landing_page:a,children:[]}]}]},{id:mt,name:"Ev Gereçleri",slug:"ev-gerecleri",parent:bp,is_landing_page:a,children:[{id:6627,name:"Ütü Masası",slug:"utu-masasi",parent:mt,is_landing_page:a,children:[]},{id:6639,name:"Çamaşırlık",slug:"camasirlik",parent:mt,is_landing_page:a,children:[]}]},{id:dr,name:jn,slug:"aydinlatma-2",parent:bp,is_landing_page:a,children:[{id:hD,name:AY,slug:AZ,parent:dr,is_landing_page:a,children:[{id:2918,name:"Rustik Avizeler",slug:"rustik-avizeler",parent:hD,is_landing_page:a,children:[]},{id:2919,name:"Led Avizeler",slug:"led-avizeler",parent:hD,is_landing_page:a,children:[]},{id:2920,name:"Klasik ve Modern Avizeler",slug:"klasik-ve-modern-avizeler",parent:hD,is_landing_page:a,children:[]}]},{id:A_,name:A$,slug:Ba,parent:dr,is_landing_page:a,children:[]},{id:2923,name:ms,slug:"masa-lambasi",parent:dr,is_landing_page:a,children:[]},{id:Bb,name:Bc,slug:Bd,parent:dr,is_landing_page:a,children:[]},{id:Be,name:Bf,slug:Bg,parent:dr,is_landing_page:a,children:[]},{id:Bh,name:"Lambader",slug:Bi,parent:dr,is_landing_page:a,children:[]},{id:Bj,name:Bk,slug:Bl,parent:dr,is_landing_page:a,children:[]},{id:2936,name:"Dekoratif Aydınlatma Ürünleri",slug:"dekoratif-aydinlatma-urunleri",parent:dr,is_landing_page:a,children:[]}]}],color:mu,styles:Bm},{id:eS,name:Bn,slug:Bo,parent:j,is_landing_page:z,children:[{id:eT,name:"Optik Malzemeler ve Mikroskoplar",slug:"optik-malzemeler-ve-mikroskoplar",parent:eS,is_landing_page:a,children:[{id:1481,name:"Dürbünler",slug:"durbunler",parent:eT,is_landing_page:a,children:[]},{id:1482,name:"Teleskoplar",slug:"teleskoplar",parent:eT,is_landing_page:a,children:[]},{id:1483,name:"Mikroskoplar",slug:"mikroskoplar",parent:eT,is_landing_page:a,children:[]},{id:1484,name:"Optik Malzemeler",slug:"optik-malzemeler",parent:eT,is_landing_page:a,children:[]},{id:1485,name:H,slug:"diger-durbun-teleskoplar-ve-optik-urunler",parent:eT,is_landing_page:a,children:[]}]},{id:bq,name:"Spor & Fitness",slug:"spor-ve-fitness",parent:eS,is_landing_page:a,children:[{id:o,name:Bp,slug:Bq,parent:bq,is_landing_page:a,children:[{id:1789,name:"Koşu Bantları",slug:"kosu-bantlari",parent:o,is_landing_page:a,children:[]},{id:1790,name:"Kondisyon Bisikletleri",slug:"kondisyon-bisikletleri",parent:o,is_landing_page:a,children:[]},{id:Br,name:Bs,slug:Bt,parent:o,is_landing_page:a,children:[]},{id:Bu,name:Bv,slug:Bw,parent:o,is_landing_page:a,children:[]},{id:1793,name:"Mekik Aletleri",slug:"mekik-aletleri",parent:o,is_landing_page:a,children:[]},{id:Bx,name:By,slug:Bz,parent:o,is_landing_page:a,children:[]},{id:ba,name:BA,slug:BB,parent:o,is_landing_page:a,children:[{id:1796,name:"Pilates Topu",slug:"pilates-topu",parent:ba,is_landing_page:a,children:[]},{id:1797,name:"Pilates Seti",slug:"pilates-seti",parent:ba,is_landing_page:a,children:[]},{id:1798,name:"Pilates Egzersiz Bandı",slug:"pilates-egzersiz-bandi",parent:ba,is_landing_page:a,children:[]},{id:1799,name:"Pilates Matı",slug:"pilates-mati",parent:ba,is_landing_page:a,children:[]},{id:1800,name:"Pilates Çemberi",slug:"pilates-cemberi",parent:ba,is_landing_page:a,children:[]},{id:1801,name:"Pilates Direnç Lastiği",slug:"pilates-direnc-lastigi",parent:ba,is_landing_page:a,children:[]},{id:1802,name:"Pilates Bosu Topu",slug:"pilates-bosu-topu",parent:ba,is_landing_page:a,children:[]},{id:1803,name:"Pilates Roller",slug:"pilates-roller",parent:ba,is_landing_page:a,children:[]},{id:1804,name:"Pilates İpi",slug:"pilates-ipi",parent:ba,is_landing_page:a,children:[]},{id:1805,name:"Pilates Ağırlık Topu",slug:"pilates-agirlik-topu",parent:ba,is_landing_page:a,children:[]},{id:1806,name:"Pilates Topu Pompası",slug:"pilates-topu-pompasi",parent:ba,is_landing_page:a,children:[]},{id:1807,name:"Pilates El Bilekliği ",slug:"pilates-el-bilekligi",parent:ba,is_landing_page:a,children:[]}]},{id:1808,name:"Yoga Malzemeleri",slug:"yoga-malzemeleri",parent:o,is_landing_page:a,children:[]},{id:1809,name:"Profesyonel Fitness",slug:"profesyonel-fitness",parent:o,is_landing_page:a,children:[]},{id:1810,name:"Trampolin",slug:"trampolin",parent:o,is_landing_page:a,children:[]},{id:BC,name:mn,slug:BD,parent:o,is_landing_page:a,children:[]},{id:1812,name:"Step",slug:"step",parent:o,is_landing_page:a,children:[]},{id:1813,name:"Twister",slug:"twister",parent:o,is_landing_page:a,children:[]},{id:1814,name:"Fitness Dizlik ve Bileklikler",slug:"fitness-dizlik-ve-bileklikler",parent:o,is_landing_page:a,children:[]},{id:1815,name:"Kondisyon Masaj Cihazları",slug:"kondisyon-masaj-cihazlari",parent:o,is_landing_page:a,children:[]},{id:1816,name:"Koşu Bandı Aksesuarlar",slug:"kosu-bandi-aksesuarlar",parent:o,is_landing_page:a,children:[]},{id:1817,name:"Kronometre - Adımsayar",slug:"kronometre-adimsayar",parent:o,is_landing_page:a,children:[]},{id:1818,name:"Masaj Cihazları",slug:"masaj-cihazlari",parent:o,is_landing_page:a,children:[]},{id:1819,name:"Masaj Koltuğu",slug:"masaj-koltugu",parent:o,is_landing_page:a,children:[]},{id:1820,name:"Spor Bileklik & Kol Saatleri",slug:"spor-bileklik-ve-kol-saatleri",parent:o,is_landing_page:a,children:[]},{id:1821,name:"Masaj & Sauna Kemerleri",slug:"masaj-ve-sauna-kemerleri",parent:o,is_landing_page:a,children:[]},{id:1822,name:"Termal Şortlar & Bel Korseleri",slug:"termal-sortlar-ve-bel-korseleri",parent:o,is_landing_page:a,children:[]},{id:BE,name:BF,slug:BG,parent:o,is_landing_page:a,children:[]},{id:1824,name:"Elektronik Kas Çalıştırıcılar",slug:"elektronik-kas-calistiricilar",parent:o,is_landing_page:a,children:[]},{id:1825,name:"Fitness Ayakkabıları",slug:"fitness-ayakkabilari",parent:o,is_landing_page:a,children:[]},{id:1826,name:"Portatif Sauna",slug:"portatif-sauna",parent:o,is_landing_page:a,children:[]},{id:1827,name:"Powerball",slug:"powerball",parent:o,is_landing_page:a,children:[]},{id:1828,name:"Terleme Eşofmanları",slug:"terleme-esofmanlari",parent:o,is_landing_page:a,children:[]},{id:1829,name:"Güç ve Denge Bileklikleri",slug:"guc-ve-denge-bileklikleri",parent:o,is_landing_page:a,children:[]},{id:1830,name:"İnversiyon Aletleri",slug:"inversiyon-aletleri",parent:o,is_landing_page:a,children:[]},{id:1831,name:"Tv Spor Ürünleri",slug:"tv-spor-urunleri",parent:o,is_landing_page:a,children:[]}]},{id:$,name:BH,slug:BI,parent:bq,is_landing_page:a,children:[{id:BJ,name:BK,slug:BL,parent:$,is_landing_page:a,children:[]},{id:BM,name:BN,slug:BO,parent:$,is_landing_page:a,children:[]},{id:BP,name:BQ,slug:BR,parent:$,is_landing_page:a,children:[]},{id:BS,name:BT,slug:BU,parent:$,is_landing_page:a,children:[]},{id:BV,name:BW,slug:BX,parent:$,is_landing_page:a,children:[]},{id:BY,name:BZ,slug:B_,parent:$,is_landing_page:a,children:[]},{id:B$,name:Ca,slug:Cb,parent:$,is_landing_page:a,children:[]},{id:bb,name:Cc,slug:Cd,parent:$,is_landing_page:a,children:[{id:jB,name:"Amortisör & Maşa Grubu",slug:"bisiklet-amortisor-ve-masa-grubu",parent:bb,is_landing_page:a,children:[{id:1842,name:"Ön Amortisör",slug:"on-amortisor",parent:jB,is_landing_page:a,children:[]},{id:1843,name:"Maşa",slug:"bisiklet-masasi",parent:jB,is_landing_page:a,children:[]},{id:1844,name:"Amortisör Aksesuarları",slug:"amortisor-aksesuarlari",parent:jB,is_landing_page:a,children:[]}]},{id:cQ,name:"Fren Grubu",slug:"fren-grubu",parent:bb,is_landing_page:a,children:[{id:1846,name:"Fren Kolu",slug:"fren-kolu",parent:cQ,is_landing_page:a,children:[]},{id:1847,name:"Fren Teli",slug:"fren-teli",parent:cQ,is_landing_page:a,children:[]},{id:1848,name:"Fren Boruları",slug:"fren-borulari",parent:cQ,is_landing_page:a,children:[]},{id:1849,name:"Fren Pabucu",slug:"fren-pabucu",parent:cQ,is_landing_page:a,children:[]},{id:1850,name:Ce,slug:"bisiklet-fren-balatasi",parent:cQ,is_landing_page:a,children:[]},{id:1851,name:"Fren Rotoru",slug:"fren-rotoru",parent:cQ,is_landing_page:a,children:[]},{id:1852,name:"Fren Takımı",slug:"fren-takimi",parent:cQ,is_landing_page:a,children:[]},{id:1853,name:"Fren Ayakları",slug:"fren-ayaklari",parent:cQ,is_landing_page:a,children:[]},{id:1854,name:"Kaliper",slug:"kaliper",parent:cQ,is_landing_page:a,children:[]}]},{id:jC,name:"Göbek Grubu",slug:"gobek-grubu",parent:bb,is_landing_page:a,children:[{id:1856,name:"Ön Göbek",slug:"on-gobek",parent:jC,is_landing_page:a,children:[]},{id:1857,name:"Orta Göbek",slug:"orta-gobek",parent:jC,is_landing_page:a,children:[]},{id:1858,name:"Arka Göbek",slug:"arka-gobek",parent:jC,is_landing_page:a,children:[]}]},{id:hF,name:"Gidon Grubu",slug:"gidon-grubu",parent:bb,is_landing_page:a,children:[{id:1860,name:"Gidon",slug:"gidon",parent:hF,is_landing_page:a,children:[]},{id:1861,name:"Gidon Boynu",slug:"gidon-boynu",parent:hF,is_landing_page:a,children:[]},{id:1862,name:"Furş Yatağı",slug:"furs-yatagi",parent:hF,is_landing_page:a,children:[]},{id:1863,name:"Gidon Bandı",slug:"gidon-bandi",parent:hF,is_landing_page:a,children:[]}]},{id:jD,name:"Jant Grubu",slug:"jant-grubu",parent:bb,is_landing_page:a,children:[{id:1865,name:"Jant Takımı",slug:"jant-takimi",parent:jD,is_landing_page:a,children:[]},{id:1866,name:"Jant Teli",slug:"jant-teli",parent:jD,is_landing_page:a,children:[]},{id:1867,name:"Çember",slug:"cember",parent:jD,is_landing_page:a,children:[]}]},{id:mv,name:"Kadro Grubu",slug:"kadro-grubu",parent:bb,is_landing_page:a,children:[{id:1869,name:"Kadro",slug:"kadro",parent:mv,is_landing_page:a,children:[]},{id:jE,name:"Kulak",slug:"kulak",parent:mv,is_landing_page:a,children:[{id:1872,name:"İç Lastik",slug:"ic-lastik",parent:jE,is_landing_page:a,children:[]},{id:1873,name:"Dış Lastik",slug:"dis-lastik",parent:jE,is_landing_page:a,children:[]},{id:1874,name:"Yama & Tamir Malzemeleri",slug:"bisiklet-yama-ve-tamir-malzemeleri",parent:jE,is_landing_page:a,children:[]}]}]},{id:1871,name:"Lastik Grubu",slug:"lastik-grubu",parent:bb,is_landing_page:a,children:[]},{id:1875,name:"Pedal Grubu",slug:"pedal-grubu",parent:bb,is_landing_page:a,children:[]},{id:hG,name:"Sele Grubu",slug:"sele-grubu",parent:bb,is_landing_page:a,children:[{id:1877,name:"Sele",slug:"sele",parent:hG,is_landing_page:a,children:[]},{id:1878,name:"Sele Borusu",slug:"sele-borusu",parent:hG,is_landing_page:a,children:[]},{id:1879,name:"Sele Kelepçesi",slug:"sele-kelepcesi",parent:hG,is_landing_page:a,children:[]},{id:1880,name:"Sele Borusu Adaptörü",slug:"sele-borusu-adaptoru",parent:hG,is_landing_page:a,children:[]}]},{id:ef,name:"Vites Grubu",slug:"vites-grubu",parent:bb,is_landing_page:a,children:[{id:1882,name:"Ön Aktarıcı",slug:"on-aktarici",parent:ef,is_landing_page:a,children:[]},{id:1883,name:"Arka Aktarıcı",slug:"arka-aktarici",parent:ef,is_landing_page:a,children:[]},{id:1884,name:"Ayna Kol",slug:"ayna-kol",parent:ef,is_landing_page:a,children:[]},{id:1885,name:"Ruble",slug:"ruble",parent:ef,is_landing_page:a,children:[]},{id:1886,name:"Vites Kolu",slug:"vites-kolu",parent:ef,is_landing_page:a,children:[]},{id:1887,name:"Vites Teli",slug:"vites-teli",parent:ef,is_landing_page:a,children:[]},{id:1888,name:"Vites Boruları",slug:"vites-borulari",parent:ef,is_landing_page:a,children:[]}]},{id:1889,name:"Zincir Grubu",slug:"zincir-grubu",parent:bb,is_landing_page:a,children:[]},{id:1890,name:"Bakım Aletleri",slug:"bakim-aletleri",parent:bb,is_landing_page:a,children:[]}]},{id:bP,name:Cf,slug:Cg,parent:$,is_landing_page:a,children:[{id:1892,name:"Bisiklet & Motosiklet Kilitleri",slug:"bisiklet-motosiklet-kilitleri",parent:bP,is_landing_page:a,children:[]},{id:1893,name:"Bisiklet Aydınlatma İkaz",slug:"bisiklet-aydinlatma-ikaz",parent:bP,is_landing_page:a,children:[]},{id:1894,name:"Kasklar ve Korumalıklar",slug:"kasklar-ve-korumaliklar",parent:bP,is_landing_page:a,children:[]},{id:1895,name:"Bisiklet Yol Bilgisayarları",slug:"bisiklet-yol-bilgisayarlari",parent:bP,is_landing_page:a,children:[]},{id:1896,name:"Bisiklet Suluğu",slug:"bisiklet-sulugu",parent:bP,is_landing_page:a,children:[]},{id:1897,name:"Bisiklet Pompası",slug:"bisiklet-pompasi",parent:bP,is_landing_page:a,children:[]},{id:1898,name:"Bisiklet Çantası",slug:"bisiklet-cantasi",parent:bP,is_landing_page:a,children:[]},{id:1899,name:"Bisiklet Taşıyıcı",slug:"bisiklet-tasiyici",parent:bP,is_landing_page:a,children:[]},{id:1900,name:"Çamurluk",slug:"camurluk",parent:bP,is_landing_page:a,children:[]},{id:1901,name:"Motor Kiti",slug:"motor-kiti",parent:bP,is_landing_page:a,children:[]}]},{id:Ch,name:Ci,slug:Cj,parent:$,is_landing_page:a,children:[]}]},{id:ck,name:"Vücut Geliştirme Aletleri",slug:"vucut-gelistirme-aletleri",parent:bq,is_landing_page:a,children:[{id:1904,name:"Çalışma İstasyonları",slug:"calisma-istasyonlari",parent:ck,is_landing_page:a,children:[]},{id:eg,name:Ck,slug:Cl,parent:ck,is_landing_page:a,children:[{id:1906,name:"Barlar ve Plakalar",slug:"barlar-ve-plakalar",parent:eg,is_landing_page:a,children:[]},{id:1907,name:"Dambıl Setler",slug:"dambil-setler",parent:eg,is_landing_page:a,children:[]},{id:1908,name:"Demir Dambıl Setler",slug:"demir-dambil-setler",parent:eg,is_landing_page:a,children:[]},{id:Cm,name:Cn,slug:Co,parent:eg,is_landing_page:a,children:[]},{id:1910,name:"Kettlebell",slug:"kettlebell",parent:eg,is_landing_page:a,children:[]}]},{id:Cp,name:Cq,slug:Cr,parent:ck,is_landing_page:a,children:[]},{id:Cs,name:Ct,slug:Cu,parent:ck,is_landing_page:a,children:[]},{id:1913,name:"Kürek",slug:"kurek-bolgesi-vucut-gelistirme-urunleri",parent:ck,is_landing_page:a,children:[]},{id:1914,name:"Ağırlık Eldivenleri & Kemerler",slug:"agirlik-eldivenleri-ve-kemerler",parent:ck,is_landing_page:a,children:[]},{id:1915,name:fA,slug:"vucut-gelistirme-giyim",parent:ck,is_landing_page:a,children:[]}]},{id:am,name:Cv,slug:Cw,parent:bq,is_landing_page:a,children:[{id:Cx,name:Cy,slug:Cz,parent:am,is_landing_page:a,children:[]},{id:CA,name:CB,slug:CC,parent:am,is_landing_page:a,children:[]},{id:CD,name:"Amino Asit",slug:CE,parent:am,is_landing_page:a,children:[]},{id:CF,name:CG,slug:CH,parent:am,is_landing_page:a,children:[]},{id:CI,name:CJ,slug:CK,parent:am,is_landing_page:a,children:[]},{id:CL,name:"Performans ve Güç",slug:CM,parent:am,is_landing_page:a,children:[]},{id:CN,name:CO,slug:CP,parent:am,is_landing_page:a,children:[]},{id:CQ,name:CR,slug:CS,parent:am,is_landing_page:a,children:[]}]},{id:q,name:CT,slug:CU,parent:bq,is_landing_page:a,children:[{id:bQ,name:CV,slug:CW,parent:q,is_landing_page:a,children:[{id:1927,name:"Futbol Aksesuarları",slug:"futbol-aksesuarlari",parent:bQ,is_landing_page:a,children:[]},{id:1928,name:"Futbol Ayakkabıları",slug:"futbol-ayakkabilari",parent:bQ,is_landing_page:a,children:[]},{id:1929,name:"Futbol Topları",slug:"futbol-toplari",parent:bQ,is_landing_page:a,children:[]},{id:1930,name:"Futbol Formaları",slug:"futbol-formalari",parent:bQ,is_landing_page:a,children:[]},{id:1931,name:"Futbol Şortları",slug:"futbol-sortlari",parent:bQ,is_landing_page:a,children:[]},{id:1932,name:"Hakem Malzemeleri",slug:"hakem-malzemeleri",parent:bQ,is_landing_page:a,children:[]},{id:1933,name:"Kaleci Malzemeleri",slug:"kaleci-malzemeleri",parent:bQ,is_landing_page:a,children:[]},{id:1934,name:"Koruyucu Malzemeler",slug:"koruyucu-malzemeler",parent:bQ,is_landing_page:a,children:[]},{id:1935,name:"Top Pompaları",slug:"top-pompalari",parent:bQ,is_landing_page:a,children:[]},{id:1936,name:"Amerikan Futbol Topları",slug:"amerikan-futbol-toplari",parent:bQ,is_landing_page:a,children:[]}]},{id:gg,name:lx,slug:CX,parent:q,is_landing_page:a,children:[{id:1938,name:"Basketbol Aksesuarları",slug:"basketbol-aksesuarlari",parent:gg,is_landing_page:a,children:[]},{id:1939,name:"Basketbol Ayakkabıları",slug:"basketbol-ayakkabilari",parent:gg,is_landing_page:a,children:[]},{id:1940,name:"Basketbol Giyim",slug:"basketbol-giyim",parent:gg,is_landing_page:a,children:[]},{id:1941,name:"Basketbol Topları",slug:"basketbol-toplari",parent:gg,is_landing_page:a,children:[]}]},{id:hH,name:CY,slug:CZ,parent:q,is_landing_page:a,children:[{id:1943,name:"Dizlikler",slug:"dizlikler",parent:hH,is_landing_page:a,children:[]},{id:1944,name:"Voleybol Aksesuarları",slug:"voleybol-aksesuarlari",parent:hH,is_landing_page:a,children:[]},{id:1945,name:"Voleybol Topları",slug:"voleybol-toplari",parent:hH,is_landing_page:a,children:[]}]},{id:eU,name:C_,slug:C$,parent:q,is_landing_page:a,children:[{id:1947,name:"Tenis Raketleri",slug:"tenis-raketleri",parent:eU,is_landing_page:a,children:[]},{id:1948,name:"Tenis Topları",slug:"tenis-toplari",parent:eU,is_landing_page:a,children:[]},{id:1949,name:"Tenis Giyim",slug:"tenis-giyim",parent:eU,is_landing_page:a,children:[]},{id:1950,name:"Tenis Ayakkabıları",slug:"tenis-ayakkabilari",parent:eU,is_landing_page:a,children:[]},{id:1951,name:"Tenis Aksesuarları",slug:"tenis-aksesuarlari",parent:eU,is_landing_page:a,children:[]}]},{id:hI,name:"Badminton",slug:"badminton",parent:q,is_landing_page:a,children:[{id:1953,name:"Badminton Raketleri",slug:"badminton-raketleri",parent:hI,is_landing_page:a,children:[]},{id:1954,name:"Badminton Topları",slug:"badminton-toplari",parent:hI,is_landing_page:a,children:[]},{id:1955,name:"Badminton Ağları",slug:"badminton-aglari",parent:hI,is_landing_page:a,children:[]},{id:1956,name:"Badminton Gripleri",slug:"badminton-gripleri",parent:hI,is_landing_page:a,children:[]}]},{id:eV,name:Da,slug:Db,parent:q,is_landing_page:a,children:[{id:1958,name:"Masa Tenisi Masaları",slug:"masa-tenisi-masalari",parent:eV,is_landing_page:a,children:[]},{id:1959,name:"Masa Tenisi Raketleri",slug:"masa-tenisi-raketleri",parent:eV,is_landing_page:a,children:[]},{id:1960,name:"Masa Tenisi Topları",slug:"masa-tenisi-toplari",parent:eV,is_landing_page:a,children:[]},{id:1961,name:"Masa Tenisi Ağları ve Demirleri",slug:"masa-tenisi-aglari-ve-demirleri",parent:eV,is_landing_page:a,children:[]},{id:1962,name:"Masa Tenisi Aksesuarları",slug:"masa-tenisi-aksesuarlari",parent:eV,is_landing_page:a,children:[]}]},{id:cl,name:Dc,slug:Dd,parent:q,is_landing_page:a,children:[{id:1964,name:"Boks Eldivenleri",slug:"boks-eldivenleri",parent:cl,is_landing_page:a,children:[]},{id:1965,name:"Boks Standları",slug:"boks-standlari",parent:cl,is_landing_page:a,children:[]},{id:1966,name:"Boks Giyim",slug:"boks-giyim",parent:cl,is_landing_page:a,children:[]},{id:1967,name:"Boks Topu",slug:"boks-topu",parent:cl,is_landing_page:a,children:[]},{id:1968,name:"Boks Aksesuarları",slug:"boks-aksesuarlari",parent:cl,is_landing_page:a,children:[]},{id:1969,name:"Boks Topu Eldivenleri",slug:"boks-topu-eldivenleri",parent:cl,is_landing_page:a,children:[]},{id:1970,name:"Koruyucu & Bandaj",slug:"koruyucu-ve-bandaj",parent:cl,is_landing_page:a,children:[]},{id:1971,name:"Boks Torbaları",slug:"boks-torbalari",parent:cl,is_landing_page:a,children:[]},{id:1972,name:mw,slug:"antrenman-ekipmanlari",parent:cl,is_landing_page:a,children:[]}]},{id:eh,name:De,slug:Df,parent:q,is_landing_page:a,children:[{id:1974,name:mc,slug:"paten",parent:eh,is_landing_page:a,children:[]},{id:1975,name:Dg,slug:"kaykaylar",parent:eh,is_landing_page:a,children:[]},{id:1976,name:mb,slug:"scooter-spor-aleti",parent:eh,is_landing_page:a,children:[]},{id:1977,name:Dh,slug:"elektrikli-scooterlar",parent:eh,is_landing_page:a,children:[]},{id:1978,name:Di,slug:"buz-patenleri",parent:eh,is_landing_page:a,children:[]},{id:1979,name:Dj,slug:"kask-ve-korumaliklar",parent:eh,is_landing_page:a,children:[]}]},{id:ei,name:Dk,slug:Dl,parent:q,is_landing_page:a,children:[{id:1981,name:Dg,slug:"kaykay",parent:ei,is_landing_page:a,children:[]},{id:1982,name:Dj,slug:"kayak-kask-ve-korumalik",parent:ei,is_landing_page:a,children:[]},{id:1983,name:mc,slug:"kayak-paten",parent:ei,is_landing_page:a,children:[]},{id:1984,name:mb,slug:"kayak-scooter",parent:ei,is_landing_page:a,children:[]},{id:1985,name:Dh,slug:"elektrikli-scooter",parent:ei,is_landing_page:a,children:[]},{id:1986,name:Di,slug:"buz-pateni",parent:ei,is_landing_page:a,children:[]}]},{id:eW,name:yf,slug:"dart-2",parent:q,is_landing_page:a,children:[{id:1988,name:"Boardlar",slug:"boardlar",parent:eW,is_landing_page:a,children:[]},{id:1989,name:"Board Arkalıkları",slug:"board-arkaliklari",parent:eW,is_landing_page:a,children:[]},{id:1990,name:"Dartlar",slug:"dartlar",parent:eW,is_landing_page:a,children:[]},{id:1991,name:"Dart Aksesuarlar",slug:"dart-aksesuarlar",parent:eW,is_landing_page:a,children:[]},{id:1992,name:"Flightlar",slug:"flightlar",parent:eW,is_landing_page:a,children:[]},{id:1993,name:"Shaftlar",slug:"shaftlar",parent:eW,is_landing_page:a,children:[]}]},{id:br,name:Dm,slug:Dn,parent:q,is_landing_page:a,children:[{id:1995,name:"Boneler",slug:"boneler",parent:br,is_landing_page:a,children:[]},{id:1996,name:"Yüzücü Gözlükleri",slug:"yuzucu-gozlukleri",parent:br,is_landing_page:a,children:[]},{id:1997,name:"Şnorkel",slug:"snorkel",parent:br,is_landing_page:a,children:[]},{id:1998,name:"Kulak ve Burun Tıkacları",slug:"kulak-ve-burun-tikaclari",parent:br,is_landing_page:a,children:[]},{id:1999,name:"Paletler",slug:"paletler",parent:br,is_landing_page:a,children:[]},{id:2000,name:"Su Topu",slug:"su-topu",parent:br,is_landing_page:a,children:[]},{id:2001,name:"Yüzme Tahtaları",slug:"yuzme-tahtalari",parent:br,is_landing_page:a,children:[]},{id:2002,name:"Yüzücü Antrenman Malzemeleri",slug:"yuzucu-antrenman-malzemeleri",parent:br,is_landing_page:a,children:[]},{id:2003,name:"Yüzücü Kronometreleri",slug:"yuzucu-kronometreleri",parent:br,is_landing_page:a,children:[]},{id:2004,name:"Yüzücü Mayosu",slug:"yuzucu-mayosu",parent:br,is_landing_page:a,children:[]},{id:2005,name:"Deniz Ayakkabısı",slug:"deniz-ayakkabisi",parent:br,is_landing_page:a,children:[]}]},{id:bc,name:Do,slug:Dp,parent:q,is_landing_page:a,children:[{id:2007,name:"Darbe Yastıkları",slug:"darbe-yastiklari",parent:bc,is_landing_page:a,children:[]},{id:2008,name:"Ellikler ve Eldivenler",slug:"ellikler-ve-eldivenler",parent:bc,is_landing_page:a,children:[]},{id:2009,name:"Koruyucular",slug:"koruyucular",parent:bc,is_landing_page:a,children:[]},{id:2010,name:"Judo ve Aikido",slug:"judo-ve-aikido",parent:bc,is_landing_page:a,children:[]},{id:2011,name:"Karate Do ve Kempo",slug:"karate-do-ve-kempo",parent:bc,is_landing_page:a,children:[]},{id:2012,name:"Kick Boxing",slug:"kick-boxing",parent:bc,is_landing_page:a,children:[]},{id:2013,name:"Minderler ve Çantalar",slug:"minderler-ve-cantalar",parent:bc,is_landing_page:a,children:[]},{id:2014,name:"Muay Thai",slug:"muay-thai",parent:bc,is_landing_page:a,children:[]},{id:2015,name:"Taekwondo",slug:"taekwondo",parent:bc,is_landing_page:a,children:[]},{id:2016,name:"Wu Shu ve Sanda",slug:"wu-shu-ve-sanda",parent:bc,is_landing_page:a,children:[]},{id:2017,name:"Salon Ayakkabıları",slug:"salon-ayakkabilari",parent:bc,is_landing_page:a,children:[]},{id:2018,name:bn,slug:"uzakdogu-spor-aksesuarlari",parent:bc,is_landing_page:a,children:[]}]},{id:mx,name:"Sporcu Sağlığı",slug:"sporcu-sagligi",parent:q,is_landing_page:a,children:[{id:2020,name:"Dizlik ve Bileklikler",slug:"dizlik-ve-bileklikler",parent:mx,is_landing_page:a,children:[]},{id:2021,name:hJ,slug:"aksesuar",parent:mx,is_landing_page:a,children:[]}]},{id:hK,name:"Bilardo",slug:"bilardo",parent:q,is_landing_page:a,children:[{id:2023,name:"Istakalar",slug:"istakalar",parent:hK,is_landing_page:a,children:[]},{id:2024,name:"Bilardo Eldivenleri",slug:"bilardo-eldivenleri",parent:hK,is_landing_page:a,children:[]},{id:2025,name:"Bilardo Topları",slug:"bilardo-toplari",parent:hK,is_landing_page:a,children:[]},{id:2026,name:"Bilardo Masası Parça & Aksesuar",slug:"bilardo-masasi-parca-ve-aksesuar",parent:hK,is_landing_page:a,children:[]}]},{id:2027,name:"Kupalar ve Madalyalar",slug:"kupalar-ve-madalyalar",parent:q,is_landing_page:a,children:[]},{id:2028,name:"Atletizm Ürünleri",slug:"atletizm-urunleri",parent:q,is_landing_page:a,children:[]},{id:2029,name:"Hentbol",slug:"hentbol",parent:q,is_landing_page:a,children:[]},{id:hL,name:"Beyzbol",slug:"beyzbol",parent:q,is_landing_page:a,children:[{id:2031,name:"Beyzbol Sopası",slug:"beyzbol-sopasi",parent:hL,is_landing_page:a,children:[]},{id:2032,name:"Beyzbol Topu",slug:"beyzbol-topu",parent:hL,is_landing_page:a,children:[]},{id:2033,name:mw,slug:"beyzbol-antreman-ekipmani",parent:hL,is_landing_page:a,children:[]},{id:2034,name:hJ,slug:"beyzbol-aksesuarlari",parent:hL,is_landing_page:a,children:[]}]},{id:jF,name:"Jimnastik",slug:"jimnastik",parent:q,is_landing_page:a,children:[{id:2036,name:"Matlar",slug:"matlar",parent:jF,is_landing_page:a,children:[]},{id:2037,name:"Jimnastik Ekipmanları",slug:"jimnastik-ekipmanlari",parent:jF,is_landing_page:a,children:[]},{id:2038,name:"Jimnastik Halkaları",slug:"jimnastik-halkalari",parent:jF,is_landing_page:a,children:[]}]},{id:2039,name:ym,slug:"langirt-sporu",parent:q,is_landing_page:a,children:[]},{id:jG,name:"Binicilik",slug:"binicilik",parent:q,is_landing_page:a,children:[{id:2041,name:"Binicilik Giyim",slug:"binicilik-giyim",parent:jG,is_landing_page:a,children:[]},{id:2042,name:"At Bakımı",slug:"at-bakimi",parent:jG,is_landing_page:a,children:[]},{id:2043,name:"Binicilik Kamçı",slug:"binicilik-kamci",parent:jG,is_landing_page:a,children:[]}]},{id:hM,name:"Buz Hokeyi",slug:"buz-hokeyi",parent:q,is_landing_page:a,children:[{id:2045,name:"Buz Hokeyi Giyim",slug:"buz-hokeyi-giyim",parent:hM,is_landing_page:a,children:[]},{id:2046,name:hJ,slug:"buz-hokeyi-aksesuarlari",parent:hM,is_landing_page:a,children:[]},{id:2047,name:"Buz Hokeyi Paten Aksesuarı",slug:"buz-hokeyi-paten-aksesuari",parent:hM,is_landing_page:a,children:[]},{id:2048,name:mw,slug:"buz-hokeyi-antreman-ekipmanlari",parent:hM,is_landing_page:a,children:[]}]},{id:my,name:"Squash",slug:"squash",parent:q,is_landing_page:a,children:[{id:2050,name:"Squash Topları",slug:"squash-toplari",parent:my,is_landing_page:a,children:[]},{id:2051,name:"Squash Raketleri",slug:"squash-raketleri",parent:my,is_landing_page:a,children:[]}]},{id:hN,name:"Golf",slug:"golf",parent:q,is_landing_page:a,children:[{id:2053,name:"Golf Giyim",slug:"golf-giyim",parent:hN,is_landing_page:a,children:[]},{id:2054,name:"Golf Demir Setleri",slug:"golf-demir-setleri",parent:hN,is_landing_page:a,children:[]},{id:2055,name:"Golf Çanta & Aksesuar",slug:"golf-cantasi-ve-aksesuarlari",parent:hN,is_landing_page:a,children:[]},{id:2056,name:"Golf Ekipmanları",slug:"golf-ekipmanlari",parent:hN,is_landing_page:a,children:[]}]}]},{id:gh,name:Dq,slug:Dr,parent:bq,is_landing_page:a,children:[{id:cm,name:"Ayakkabı",slug:Ds,parent:gh,is_landing_page:a,children:[{id:2059,name:"Günlük Spor Ayakkabı",slug:"gunluk-spor-ayakkabi",parent:cm,is_landing_page:a,children:[]},{id:2060,name:"Yürüyüş & Koşu Ayakkabısı",slug:"yuruyus-ve-kosu-ayakkabilari",parent:cm,is_landing_page:a,children:[]},{id:2061,name:ly,slug:"krampon",parent:cm,is_landing_page:a,children:[]},{id:2062,name:"Halı Saha Ayakkabısı",slug:"hali-saha-ayakkabisi",parent:cm,is_landing_page:a,children:[]},{id:2063,name:"Basketbol Ayakkabısı",slug:"basketbol-ayakkabisi",parent:cm,is_landing_page:a,children:[]},{id:2064,name:"Tenis Ayakkabısı",slug:"tenis-ayakkabisi",parent:cm,is_landing_page:a,children:[]},{id:Dt,name:"Spor Terlik",slug:Du,parent:cm,is_landing_page:a,children:[]},{id:2066,name:"Voleybol Ayakkabısı",slug:"voleybol-ayakkabisi",parent:cm,is_landing_page:a,children:[]}]},{id:aE,name:fA,slug:"spor-giyim",parent:gh,is_landing_page:a,children:[{id:Dv,name:gR,slug:Dw,parent:aE,is_landing_page:a,children:[]},{id:Dx,name:gV,slug:Dy,parent:aE,is_landing_page:a,children:[]},{id:Dz,name:iP,slug:DA,parent:aE,is_landing_page:a,children:[]},{id:DB,name:lb,slug:DC,parent:aE,is_landing_page:a,children:[]},{id:2072,name:lh,slug:"spor-giyim-sort",parent:aE,is_landing_page:a,children:[]},{id:2073,name:rD,slug:"spor-giyim-yagmurluk",parent:aE,is_landing_page:a,children:[]},{id:2074,name:"Sporcu Sütyeni",slug:"sporcu-sutyeni",parent:aE,is_landing_page:a,children:[]},{id:DD,name:DE,slug:DF,parent:aE,is_landing_page:a,children:[]},{id:2076,name:"Şort & Kapri",slug:"spor-sort-ve-kapri",parent:aE,is_landing_page:a,children:[]},{id:2077,name:"Mayo & Deniz Şortu",slug:"mayo-ve-deniz-sortu",parent:aE,is_landing_page:a,children:[]}]},{id:ej,name:hJ,slug:"spor-giyim-aksesuar",parent:gh,is_landing_page:a,children:[{id:DG,name:"Çanta",slug:DH,parent:ej,is_landing_page:a,children:[]},{id:DI,name:iW,slug:DJ,parent:ej,is_landing_page:a,children:[]},{id:2081,name:rQ,slug:"spor-giyim-sapka",parent:ej,is_landing_page:a,children:[]},{id:DK,name:gY,slug:DL,parent:ej,is_landing_page:a,children:[]}]}]},{id:gi,name:"Taraftar Ürünleri",slug:"taraftar-urunleri",parent:bq,is_landing_page:a,children:[{id:2084,name:"Beşiktaş",slug:"besiktas",parent:gi,is_landing_page:a,children:[]},{id:2085,name:"Fenerbahçe",slug:"fenerbahce",parent:gi,is_landing_page:a,children:[]},{id:2086,name:"Galatasaray",slug:"galatasaray",parent:gi,is_landing_page:a,children:[]},{id:2087,name:"Trabzonspor",slug:"trabzonspor",parent:gi,is_landing_page:a,children:[]},{id:2088,name:"Taraftar Aksesuarları",slug:"taraftar-aksesuarlari",parent:gi,is_landing_page:a,children:[]}]}]},{id:bs,name:DM,slug:DN,parent:eS,is_landing_page:a,children:[{id:an,name:DO,slug:DP,parent:bs,is_landing_page:a,children:[{id:DQ,name:DR,slug:DS,parent:an,is_landing_page:a,children:[]},{id:gj,name:"Oturma & Dinlenme",slug:"oturma-ve-dinlenme",parent:an,is_landing_page:a,children:[{id:2093,name:"Kamp Sandalyesi",slug:"kamp-sandalyesi",parent:gj,is_landing_page:a,children:[]},{id:2094,name:"Kamp Taburesi",slug:"kamp-taburesi",parent:gj,is_landing_page:a,children:[]},{id:2095,name:"Kamp Masası",slug:"kamp-masasi",parent:gj,is_landing_page:a,children:[]},{id:2096,name:"Hamak",slug:"hamak",parent:gj,is_landing_page:a,children:[]},{id:2097,name:"Kampet",slug:"kampet",parent:gj,is_landing_page:a,children:[]}]},{id:DT,name:DU,slug:DV,parent:an,is_landing_page:a,children:[]},{id:DW,name:lU,slug:DX,parent:an,is_landing_page:a,children:[]},{id:2100,name:"Kamp Matı",slug:"kamp-mati",parent:an,is_landing_page:a,children:[]},{id:gk,name:"Outdoor Çantalar",slug:"outdoor-cantalar",parent:an,is_landing_page:a,children:[{id:2102,name:"Dağcılık ve Kamp Çantaları",slug:"dagcilik-ve-kamp-cantalari",parent:gk,is_landing_page:a,children:[]},{id:2103,name:"Günlük Sırt Çantası",slug:"gunluk-sirt-cantasi",parent:gk,is_landing_page:a,children:[]},{id:2104,name:"Trekking Çantaları",slug:"trekking-cantalari",parent:gk,is_landing_page:a,children:[]},{id:2105,name:"Cüzdan & Bel ve Omuz Çantaları",slug:"cuzdan-bel-ve-omuz-cantalari",parent:gk,is_landing_page:a,children:[]},{id:2106,name:"Çanta Aksesuarları ve Kılıfları",slug:"canta-aksesuarlari-ve-kiliflari",parent:gk,is_landing_page:a,children:[]}]},{id:cR,name:"Kamp Mutfağı",slug:"kamp-mutfagi",parent:an,is_landing_page:a,children:[{id:2108,name:wP,slug:"kamp-termosu",parent:cR,is_landing_page:a,children:[]},{id:2109,name:"Matara",slug:"matara",parent:cR,is_landing_page:a,children:[]},{id:2110,name:"Mug",slug:"mug",parent:cR,is_landing_page:a,children:[]},{id:2111,name:"Buzluk & Soğutucu",slug:"buzluk-ve-sogutucu",parent:cR,is_landing_page:a,children:[]},{id:2112,name:"Kamp Ocağı",slug:"kamp-ocagi",parent:cR,is_landing_page:a,children:[]},{id:2113,name:"Çakmaklar & Ateş Başlatıcılar",slug:"cakmaklar-ve-ates-baslaticilar",parent:cR,is_landing_page:a,children:[]},{id:2114,name:"Yemek Pişirme Setleri",slug:"yemek-pisirme-setleri",parent:cR,is_landing_page:a,children:[]},{id:2115,name:"Mutfak Aksesuarları",slug:"mutfak-aksesuarlari",parent:cR,is_landing_page:a,children:[]},{id:2116,name:DY,slug:"kurekler",parent:cR,is_landing_page:a,children:[]}]},{id:ek,name:"Çakılar & Bıçaklar",slug:"cakilar-ve-bicaklar",parent:an,is_landing_page:a,children:[{id:2118,name:"Outdoor Bıçak",slug:"outdoor-bicak",parent:ek,is_landing_page:a,children:[]},{id:2119,name:"Katlanabilir Çakı",slug:"katlanabilir-caki",parent:ek,is_landing_page:a,children:[]},{id:2120,name:"Çok Amaçlı Çakı",slug:"cok-amacli-caki",parent:ek,is_landing_page:a,children:[]},{id:2121,name:"Pense Çakı",slug:"pense-caki",parent:ek,is_landing_page:a,children:[]},{id:2122,name:"Çakı & Bıçak Aksesuarları",slug:"caki-bicak-ve-aksesuarlari",parent:ek,is_landing_page:a,children:[]},{id:2123,name:"Balta",slug:"balta",parent:ek,is_landing_page:a,children:[]},{id:2124,name:"Kamp Testeresi",slug:"kamp-testeresi",parent:ek,is_landing_page:a,children:[]}]},{id:2125,name:"İlk Yardım & Sağlık Malzemeleri",slug:"ilk-yardim-ve-saglik-malzemeleri",parent:an,is_landing_page:a,children:[]},{id:2126,name:"Outdoor Aksesuar",slug:"outdoor-aksesuar",parent:an,is_landing_page:a,children:[]},{id:2127,name:"Kamp Aksesuarları",slug:"kamp-aksesuarlari",parent:an,is_landing_page:a,children:[]},{id:6993,name:"El Fenerleri",slug:"el-fenerleri",parent:an,is_landing_page:a,children:[]},{id:7224,name:"Fener",slug:"fener",parent:an,is_landing_page:a,children:[]}]},{id:hO,name:DZ,slug:D_,parent:bs,is_landing_page:a,children:[{id:ao,name:D$,slug:Ea,parent:hO,is_landing_page:a,children:[{id:2130,name:qW,slug:"outdoor-bot",parent:ao,is_landing_page:a,children:[]},{id:2131,name:"Trekking Ayakkabısı",slug:"trekking-ayakkabisi",parent:ao,is_landing_page:a,children:[]},{id:2132,name:"Tırmanış Ayakkabısı",slug:"tirmanis-ayakkabisi",parent:ao,is_landing_page:a,children:[]},{id:2133,name:qZ,slug:"outdoor-cizme",parent:ao,is_landing_page:a,children:[]},{id:2134,name:lk,slug:"outdoor-gunluk-ayakkabi",parent:ao,is_landing_page:a,children:[]},{id:2135,name:"Yürüyüş Ayakkabısı",slug:"yuruyus-ayakkabisi",parent:ao,is_landing_page:a,children:[]},{id:2136,name:ln,slug:"outdoor-terlik",parent:ao,is_landing_page:a,children:[]},{id:2137,name:lm,slug:"outdoor-sandalet",parent:ao,is_landing_page:a,children:[]},{id:2138,name:"Koşu Ayakkabısı",slug:"kosu-ayakkabisi",parent:ao,is_landing_page:a,children:[]},{id:2139,name:qX,slug:"outdoor-kar-botu",parent:ao,is_landing_page:a,children:[]},{id:2140,name:"Hiking Ayakkabısı",slug:"hiking-ayakkabisi",parent:ao,is_landing_page:a,children:[]},{id:2141,name:"Dağcılık Ayakkabısı",slug:"dagcilik-ayakkabisi",parent:ao,is_landing_page:a,children:[]},{id:2142,name:"Kayak Ayakabısı",slug:"kayak-ayakabisi",parent:ao,is_landing_page:a,children:[]},{id:2144,name:"Fitness Ayakkabısı",slug:"fitness-ayakkabisi",parent:ao,is_landing_page:a,children:[]},{id:2145,name:"Nubuk Ayakkabı",slug:"nubuk-ayakkabi",parent:ao,is_landing_page:a,children:[]},{id:2146,name:"Snowboard Botu",slug:"snowboard-botu",parent:ao,is_landing_page:a,children:[]}]},{id:O,name:"Outdoor Giyim",slug:"outdoor-giyim",parent:hO,is_landing_page:a,children:[{id:Eb,name:Ec,slug:Ed,parent:O,is_landing_page:a,children:[]},{id:Ee,name:Ef,slug:Eg,parent:O,is_landing_page:a,children:[]},{id:Eh,name:hw,slug:Ei,parent:O,is_landing_page:a,children:[]},{id:2150,name:"Yelekler",slug:"yelekler",parent:O,is_landing_page:a,children:[]},{id:Ej,name:Ek,slug:El,parent:O,is_landing_page:a,children:[]},{id:2152,name:"Gömlekler",slug:"gomlekler",parent:O,is_landing_page:a,children:[]},{id:Em,name:En,slug:Eo,parent:O,is_landing_page:a,children:[]},{id:2154,name:mz,slug:"eldivenler",parent:O,is_landing_page:a,children:[]},{id:2155,name:rR,slug:"outdoor-bere",parent:O,is_landing_page:a,children:[]},{id:Ep,name:Eq,slug:Er,parent:O,is_landing_page:a,children:[]},{id:2157,name:"Kemerler",slug:"kemerler",parent:O,is_landing_page:a,children:[]},{id:Es,name:li,slug:Et,parent:O,is_landing_page:a,children:[]},{id:2159,name:"Çorap ve Tozluklar",slug:"corap-ve-tozluklar",parent:O,is_landing_page:a,children:[]},{id:2160,name:"Yelken Giyim & Aksesuar",slug:"yelken-giyim-ve-aksesuar",parent:O,is_landing_page:a,children:[]},{id:2161,name:"Bandana",slug:"bandana",parent:O,is_landing_page:a,children:[]},{id:Eu,name:Ev,slug:Ew,parent:O,is_landing_page:a,children:[]}]}]},{id:ds,name:"Şişme Su Aktivite Ürünleri",slug:"sisme-su-aktivite-urunleri",parent:bs,is_landing_page:a,children:[{id:2164,name:"Şişme Bot",slug:"sisme-bot",parent:ds,is_landing_page:a,children:[]},{id:2165,name:"Şişme Havuz",slug:"sisme-havuz",parent:ds,is_landing_page:a,children:[]},{id:2166,name:"Deniz Yatağı",slug:"deniz-yatagi",parent:ds,is_landing_page:a,children:[]},{id:2167,name:"Şişme Can Yeleği",slug:"sisme-can-yelegi",parent:ds,is_landing_page:a,children:[]},{id:2168,name:"Deniz Kolluğu",slug:"deniz-kollugu",parent:ds,is_landing_page:a,children:[]},{id:2169,name:"Deniz Simidi",slug:"deniz-simidi",parent:ds,is_landing_page:a,children:[]},{id:2170,name:"Deniz Topu",slug:"deniz-topu",parent:ds,is_landing_page:a,children:[]},{id:2171,name:"Pompa & Aksesuarlar",slug:"sisme-su-aktivite-urunleri-pompa-ve-aksesuarlar",parent:ds,is_landing_page:a,children:[]}]},{id:jH,name:Ex,slug:Ey,parent:bs,is_landing_page:a,children:[{id:aQ,name:"Kara Av Malzemeleri",slug:"kara-av-malzemeleri",parent:jH,is_landing_page:a,children:[{id:Ez,name:EA,slug:EB,parent:aQ,is_landing_page:a,children:[]},{id:2175,name:"Avcı Pantolonları",slug:"avci-pantolonlari",parent:aQ,is_landing_page:a,children:[]},{id:2176,name:"Avcı Bot ve Çizmeleri",slug:"avci-bot-ve-cizmeleri",parent:aQ,is_landing_page:a,children:[]},{id:EC,name:ED,slug:EE,parent:aQ,is_landing_page:a,children:[]},{id:2178,name:"Avcı Tulumları",slug:"avci-tulumlari",parent:aQ,is_landing_page:a,children:[]},{id:2179,name:"Avcı Kemerleri",slug:"avci-kemerleri",parent:aQ,is_landing_page:a,children:[]},{id:2180,name:"Avcı Kazakları",slug:"avci-kazaklari",parent:aQ,is_landing_page:a,children:[]},{id:2181,name:"Avcı Gömlekleri",slug:"avci-gomlekleri",parent:aQ,is_landing_page:a,children:[]},{id:2182,name:"Mühre & Düdükler",slug:"muhre-ve-dudukler",parent:aQ,is_landing_page:a,children:[]},{id:2183,name:"Atış Sistemleri ve Hedefler",slug:"atis-sistemleri-ve-hedefler",parent:aQ,is_landing_page:a,children:[]},{id:2184,name:"Tüfek ve Tabanca Harbileri",slug:"tufek-ve-tabanca-harbileri",parent:aQ,is_landing_page:a,children:[]},{id:2185,name:"Tüfek Tabanca Kılıf & Aksesuarları",slug:"av-tufek-tabanca-kilif-ve-aksesuarlari",parent:aQ,is_landing_page:a,children:[]}]},{id:P,name:"Balık Av Malzemeleri",slug:"balik-av-malzemeleri",parent:jH,is_landing_page:a,children:[{id:EF,name:EG,slug:EH,parent:P,is_landing_page:a,children:[]},{id:EI,name:EJ,slug:EK,parent:P,is_landing_page:a,children:[]},{id:EL,name:EM,slug:EN,parent:P,is_landing_page:a,children:[]},{id:EO,name:EP,slug:EQ,parent:P,is_landing_page:a,children:[]},{id:ER,name:ES,slug:ET,parent:P,is_landing_page:a,children:[]},{id:EU,name:EV,slug:EW,parent:P,is_landing_page:a,children:[]},{id:EX,name:EY,slug:EZ,parent:P,is_landing_page:a,children:[]},{id:2194,name:E_,slug:"samandiralar",parent:P,is_landing_page:a,children:[]},{id:2195,name:"Fırdöndüler",slug:"firdonduler",parent:P,is_landing_page:a,children:[]},{id:E$,name:Fa,slug:Fb,parent:P,is_landing_page:a,children:[]},{id:2197,name:"Kaşık",slug:"kasik",parent:P,is_landing_page:a,children:[]},{id:2198,name:"Kurşunlar",slug:"kursunlar",parent:P,is_landing_page:a,children:[]},{id:2199,name:Fc,slug:"takim-cantalari",parent:P,is_landing_page:a,children:[]},{id:2200,name:"Diğer Yardımcı Malzemeler",slug:"diger-yardimci-malzemeler",parent:P,is_landing_page:a,children:[]},{id:2201,name:"Kamış Kılıfı & Makine Çantaları",slug:"kamis-kilifi-ve-makine-cantalari",parent:P,is_landing_page:a,children:[]},{id:2202,name:"Balık Bulucular",slug:"balik-bulucular",parent:P,is_landing_page:a,children:[]}]}]},{id:bt,name:"Tekne & Tekne Malzemeleri",slug:"tekne-ve-tekne-malzemeleri",parent:bs,is_landing_page:a,children:[{id:2204,name:"Tekne",slug:"tekne",parent:bt,is_landing_page:a,children:[]},{id:2205,name:"Tekne Motoru",slug:"tekne-motoru",parent:bt,is_landing_page:a,children:[]},{id:2206,name:"Teknik Ekipman & Parçalar",slug:"tekne-teknik-ekipman-ve-parcalari",parent:bt,is_landing_page:a,children:[]},{id:2207,name:"Tekne Bakımı",slug:"tekne-bakimi",parent:bt,is_landing_page:a,children:[]},{id:2208,name:"Tekne Aydınlatma",slug:"tekne-aydinlatma",parent:bt,is_landing_page:a,children:[]},{id:2209,name:"Tekne Aksesuarları",slug:"tekne-aksesuarlari",parent:bt,is_landing_page:a,children:[]},{id:2210,name:"Zodyak Bot",slug:"zodyak-bot",parent:bt,is_landing_page:a,children:[]},{id:2211,name:"Can Simitleri ve Aksesuarları",slug:"can-simitleri-ve-aksesuarlari",parent:bt,is_landing_page:a,children:[]},{id:2212,name:"Tuvalet ve Mutfak",slug:"tuvalet-ve-mutfak",parent:bt,is_landing_page:a,children:[]},{id:2213,name:"Yakıt Katkıları",slug:"yakit-katkilari",parent:bt,is_landing_page:a,children:[]},{id:2214,name:"Su Sporu",slug:"su-sporu",parent:bt,is_landing_page:a,children:[]},{id:2215,name:"Marin Giyim",slug:"marin-giyim",parent:bt,is_landing_page:a,children:[]}]},{id:el,name:"Doğa Sporları",slug:"doga-sporlari",parent:bs,is_landing_page:a,children:[{id:aF,name:Fd,slug:Fe,parent:el,is_landing_page:a,children:[{id:2218,name:"Dalgıç Yelekleri",slug:"dalgic-yelekleri",parent:aF,is_landing_page:a,children:[]},{id:2219,name:"Dalış Bıçakları",slug:"dalis-bicaklari",parent:aF,is_landing_page:a,children:[]},{id:2220,name:"Dalış Başlıkları",slug:"dalis-basliklari",parent:aF,is_landing_page:a,children:[]},{id:2221,name:"Dalış Elbiseleri",slug:"dalis-elbiseleri",parent:aF,is_landing_page:a,children:[]},{id:2222,name:"Dalış Eldivenleri",slug:"dalis-eldivenleri",parent:aF,is_landing_page:a,children:[]},{id:2223,name:"Dalış Fenerleri",slug:"dalis-fenerleri",parent:aF,is_landing_page:a,children:[]},{id:2224,name:"Dalış Paletleri",slug:"dalis-paletleri",parent:aF,is_landing_page:a,children:[]},{id:2225,name:"Dalış Patikleri",slug:"dalis-patikleri",parent:aF,is_landing_page:a,children:[]},{id:2226,name:"Regülatörler",slug:"regulatorler",parent:aF,is_landing_page:a,children:[]},{id:2227,name:E_,slug:"dalis-samandirasi",parent:aF,is_landing_page:a,children:[]},{id:2228,name:"Maske ve Şnorkeller",slug:"maske-ve-snorkeller",parent:aF,is_landing_page:a,children:[]},{id:2229,name:"Zıpkınlar ve Zıpkın Uçları",slug:"zipkinlar-ve-zipkin-uclari",parent:aF,is_landing_page:a,children:[]},{id:2230,name:o_,slug:"dalis-urunleri-aksesuar-ve-yedek-parcalari",parent:aF,is_landing_page:a,children:[]},{id:2231,name:"Dalış Setleri",slug:"dalis-setleri",parent:aF,is_landing_page:a,children:[]}]},{id:bR,name:Ff,slug:Fg,parent:el,is_landing_page:a,children:[{id:2233,name:"İpler",slug:"ipler",parent:bR,is_landing_page:a,children:[]},{id:2234,name:Fh,slug:"kazmalar",parent:bR,is_landing_page:a,children:[]},{id:2235,name:"Baton",slug:"baton",parent:bR,is_landing_page:a,children:[]},{id:2236,name:"Emniyet Kemerleri",slug:"emniyet-kemerleri",parent:bR,is_landing_page:a,children:[]},{id:2237,name:Fi,slug:"kask",parent:bR,is_landing_page:a,children:[]},{id:2238,name:"İniş ve Emniyet Malzemeleri",slug:"inis-ve-emniyet-malzemeleri",parent:bR,is_landing_page:a,children:[]},{id:2239,name:"Tırmanış Malzemeleri",slug:"tirmanis-malzemeleri",parent:bR,is_landing_page:a,children:[]},{id:2240,name:ly,slug:"tirmanma-kramponu",parent:bR,is_landing_page:a,children:[]},{id:2241,name:"Buz Vidaları",slug:"buz-vidalari",parent:bR,is_landing_page:a,children:[]},{id:2242,name:"Ekspres Setler",slug:"ekspres-setler",parent:bR,is_landing_page:a,children:[]}]},{id:2243,name:"Paintball",slug:"paintball",parent:el,is_landing_page:a,children:[]},{id:Fj,name:Fk,slug:Fl,parent:el,is_landing_page:a,children:[]}]},{id:hP,name:Fm,slug:Fn,parent:bs,is_landing_page:a,children:[{id:jI,name:Fo,slug:"kis-sporu-kayak-urunleri",parent:hP,is_landing_page:a,children:[{id:gl,name:"Kayak Giyim",slug:"kayak-giyim",parent:jI,is_landing_page:a,children:[{id:2248,name:"Kayak Montu",slug:"kayak-montu",parent:gl,is_landing_page:a,children:[]},{id:2249,name:"Kayak Eldiveni",slug:"kayak-eldiveni",parent:gl,is_landing_page:a,children:[]},{id:2250,name:"Kayak Pantolonu",slug:"kayak-pantolonu",parent:gl,is_landing_page:a,children:[]},{id:2251,name:"Kayak Ayakkabısı",slug:"kayak-ayakkabisi",parent:gl,is_landing_page:a,children:[]},{id:2252,name:"Kayak Çorabı",slug:"kayak-corabi",parent:gl,is_landing_page:a,children:[]}]},{id:hQ,name:"Kayak Aksesuarları",slug:"kayak-aksesuarlari",parent:jI,is_landing_page:a,children:[{id:2254,name:"Kayak Kaskı",slug:"kayak-kaski",parent:hQ,is_landing_page:a,children:[]},{id:2255,name:"Kayak Gözlüğü",slug:"kayak-gozlugu",parent:hQ,is_landing_page:a,children:[]},{id:2256,name:"Kayak Maskesi",slug:"kayak-maskesi",parent:hQ,is_landing_page:a,children:[]},{id:2257,name:"Kayak Çantası",slug:"kayak-cantasi",parent:hQ,is_landing_page:a,children:[]}]},{id:jJ,name:"Kayak Ekipmanları",slug:"kayak-ekipmanlari",parent:jI,is_landing_page:a,children:[{id:2259,name:Fo,slug:"kayak",parent:jJ,is_landing_page:a,children:[]},{id:2260,name:"Kayak Bağlama",slug:"kayak-baglama",parent:jJ,is_landing_page:a,children:[]},{id:2261,name:"Kayak Batonu",slug:"kayak-batonu",parent:jJ,is_landing_page:a,children:[]}]}]},{id:jK,name:Fp,slug:"snowboard",parent:hP,is_landing_page:a,children:[{id:mA,name:"Snowboard Ekipmanları",slug:"snowboard-ekipmanlari",parent:jK,is_landing_page:a,children:[{id:2264,name:Fp,slug:"snowboard-2",parent:mA,is_landing_page:a,children:[]},{id:2265,name:"Snowboard Bağlama",slug:"snowboard-baglama",parent:mA,is_landing_page:a,children:[]}]},{id:jL,name:"Snowboard Giyim",slug:"snowboard-giyim",parent:jK,is_landing_page:a,children:[{id:2267,name:"Snowboard Montu",slug:"snowboard-montu",parent:jL,is_landing_page:a,children:[]},{id:2268,name:"Snowboard Pantolonu",slug:"snowboard-pantolonu",parent:jL,is_landing_page:a,children:[]},{id:2269,name:"Snowboard Ayakkabısı",slug:"snowboard-ayakkabisi",parent:jL,is_landing_page:a,children:[]}]},{id:mB,name:"Snowboard Aksesuarları",slug:"snowboard-aksesuarlari",parent:jK,is_landing_page:a,children:[{id:2271,name:"Snowboard Kaskı",slug:"snowboard-kaski",parent:mB,is_landing_page:a,children:[]},{id:2272,name:"Snowboard Çantası",slug:"snowboard-cantasi",parent:mB,is_landing_page:a,children:[]}]}]},{id:2273,name:bn,slug:"kis-sporlari-aksesuarlari",parent:hP,is_landing_page:a,children:[]}]}]},{id:hR,name:mf,slug:"aksiyon-kameralari",parent:eS,is_landing_page:a,children:[{id:1425,name:mC,slug:"kameralar",parent:hR,is_landing_page:a,children:[]},{id:1426,name:bn,slug:"aksiyon-kamera-aksesuarlari",parent:hR,is_landing_page:a,children:[]},{id:1427,name:"Gimbal",slug:"gimbal",parent:hR,is_landing_page:a,children:[]},{id:1428,name:H,slug:"diger",parent:hR,is_landing_page:a,children:[]}]}],color:gN,styles:Fq},{id:aG,name:Fr,slug:mD,parent:j,is_landing_page:z,children:[{id:cn,name:"Bebek Bezi & Islak Mendil & Havlu",slug:"bebek-bezi-islak-mendil-havlu",parent:aG,is_landing_page:a,children:[{id:Fs,name:Ft,slug:Fu,parent:cn,is_landing_page:a,children:[]},{id:Fv,name:Fw,slug:Fx,parent:cn,is_landing_page:a,children:[]},{id:Fy,name:Fz,slug:FA,parent:cn,is_landing_page:a,children:[]},{id:FB,name:FC,slug:FD,parent:cn,is_landing_page:a,children:[]},{id:6992,name:FE,slug:"islak-mendil-havlu",parent:cn,is_landing_page:a,children:[]}]},{id:dt,name:"Deterjan Temizlik Ürünleri",slug:FF,parent:aG,is_landing_page:a,children:[{id:aR,name:"Çamaşır Deterjanları",slug:"camasir-deterjanlari",parent:dt,is_landing_page:a,children:[{id:FG,name:jM,slug:FH,parent:aR,is_landing_page:a,children:[]},{id:FI,name:FJ,slug:FK,parent:aR,is_landing_page:a,children:[]},{id:FL,name:FM,slug:FN,parent:aR,is_landing_page:a,children:[]},{id:FO,name:FP,slug:FQ,parent:aR,is_landing_page:a,children:[]},{id:FR,name:FS,slug:FT,parent:aR,is_landing_page:a,children:[]},{id:FU,name:FV,slug:FW,parent:aR,is_landing_page:a,children:[]},{id:FX,name:FY,slug:FZ,parent:aR,is_landing_page:a,children:[]}]},{id:bd,name:"Bulaşık Deterjanları",slug:F_,parent:dt,is_landing_page:a,children:[{id:F$,name:Ga,slug:Gb,parent:bd,is_landing_page:a,children:[]},{id:Gc,name:jM,slug:Gd,parent:bd,is_landing_page:a,children:[]},{id:Ge,name:Gf,slug:Gg,parent:bd,is_landing_page:a,children:[]},{id:Gh,name:Gi,slug:Gj,parent:bd,is_landing_page:a,children:[]},{id:Gk,name:Gl,slug:Gm,parent:bd,is_landing_page:a,children:[]},{id:Gn,name:Go,slug:Gp,parent:bd,is_landing_page:a,children:[]}]},{id:bu,name:"Temizlik Gereçleri",slug:mE,parent:dt,is_landing_page:a,children:[{id:Gq,name:Gr,slug:Gs,parent:bu,is_landing_page:a,children:[]},{id:2292,name:"Temizlik Süngeri",slug:"temizlik-sungeri",parent:bu,is_landing_page:a,children:[]},{id:2293,name:"Temizlik Fırçası ve Yedek Aparatı",slug:"temizlik-fircasi-ve-yedek-aparati",parent:bu,is_landing_page:a,children:[]},{id:2294,name:"Temizlik Teli",slug:"temizlik-teli",parent:bu,is_landing_page:a,children:[]},{id:Gt,name:Gu,slug:Gv,parent:bu,is_landing_page:a,children:[]},{id:Gw,name:Gx,slug:Gy,parent:bu,is_landing_page:a,children:[]},{id:2297,name:"Temizlik Eldiveni",slug:"temizlik-eldiveni",parent:bu,is_landing_page:a,children:[]}]},{id:R,name:"Genel Temizlik",slug:"genel-temizlik",parent:dt,is_landing_page:a,children:[{id:Gz,name:GA,slug:GB,parent:R,is_landing_page:a,children:[]},{id:GC,name:"Mutfak, Banyo Temizleme",slug:GD,parent:R,is_landing_page:a,children:[]},{id:2301,name:"Yüzey Temizliği",slug:"yuzey-temizligi",parent:R,is_landing_page:a,children:[]},{id:GE,name:GF,slug:GG,parent:R,is_landing_page:a,children:[]},{id:GH,name:GI,slug:GJ,parent:R,is_landing_page:a,children:[]},{id:GK,name:GL,slug:GM,parent:R,is_landing_page:a,children:[]},{id:2305,name:"Ahşap Temizleyici",slug:"ahsap-temizleyici",parent:R,is_landing_page:a,children:[]},{id:GN,name:GO,slug:GP,parent:R,is_landing_page:a,children:[]},{id:mF,name:mG,slug:mH,parent:R,is_landing_page:a,children:[]},{id:GQ,name:GR,slug:GS,parent:R,is_landing_page:a,children:[]},{id:GT,name:GU,slug:GV,parent:R,is_landing_page:a,children:[]},{id:GW,name:GX,slug:GY,parent:R,is_landing_page:a,children:[]}]}]},{id:bv,name:mI,slug:GZ,parent:aG,is_landing_page:a,children:[{id:hS,name:G_,slug:G$,parent:bv,is_landing_page:a,children:[{id:2313,name:mJ,slug:"rulo",parent:hS,is_landing_page:a,children:[]},{id:2314,name:hT,slug:"duz-katsiz",parent:hS,is_landing_page:a,children:[]},{id:2315,name:jN,slug:"z-katlama",parent:hS,is_landing_page:a,children:[]}]},{id:hU,name:Ha,slug:Hb,parent:bv,is_landing_page:a,children:[{id:2317,name:mJ,slug:"rulo-kagit-havlu",parent:hU,is_landing_page:a,children:[]},{id:2318,name:jN,slug:"z-katlama-kagit-havlu",parent:hU,is_landing_page:a,children:[]},{id:2319,name:hT,slug:"duz-katsiz-kagit-havlu",parent:hU,is_landing_page:a,children:[]}]},{id:hV,name:Hc,slug:Hd,parent:bv,is_landing_page:a,children:[{id:2321,name:mJ,slug:"rulo-pecete",parent:hV,is_landing_page:a,children:[]},{id:2322,name:jN,slug:"z-katlama-pecete",parent:hV,is_landing_page:a,children:[]},{id:2323,name:hT,slug:"duz-katsiz-pecete",parent:hV,is_landing_page:a,children:[]}]},{id:jO,name:He,slug:Hf,parent:bv,is_landing_page:a,children:[{id:2325,name:jN,slug:"z-katlama-kagit-mendil",parent:jO,is_landing_page:a,children:[]},{id:2326,name:hT,slug:"duz-katsiz-kagit-mendil",parent:jO,is_landing_page:a,children:[]}]},{id:Hg,name:"Klozet Örtüsü",slug:"klozet-ortusu",parent:bv,is_landing_page:a,children:[{id:2328,name:hT,slug:"duz-katsiz-klozet-ortusu",parent:Hg,is_landing_page:a,children:[]}]},{id:Hh,name:mK,slug:Hi,parent:bv,is_landing_page:a,children:[]}]},{id:be,name:"Mutfak Sarf Malzemeleri",slug:"mutfak-sarf-malzemeleri",parent:aG,is_landing_page:a,children:[{id:Hj,name:Hk,slug:Hl,parent:be,is_landing_page:a,children:[]},{id:Hm,name:Hn,slug:Ho,parent:be,is_landing_page:a,children:[]},{id:Hp,name:Hq,slug:Hr,parent:be,is_landing_page:a,children:[]},{id:Hs,name:Ht,slug:Hu,parent:be,is_landing_page:a,children:[]},{id:Hv,name:Hw,slug:Hx,parent:be,is_landing_page:a,children:[]},{id:2336,name:"Kullan At Ürünler",slug:"kullan-at-urunler",parent:be,is_landing_page:a,children:[]},{id:2337,name:"Alışveriş Torbası",slug:"alisveris-torbasi",parent:be,is_landing_page:a,children:[]},{id:2338,name:"Kuruyemiş Torbası",slug:"kuruyemis-torbasi",parent:be,is_landing_page:a,children:[]}]},{id:bw,name:"İçecek",slug:Hy,parent:aG,is_landing_page:a,children:[{id:eX,name:Hz,slug:HA,parent:bw,is_landing_page:a,children:[{id:2341,name:"Bardak Poşet Çay",slug:"bardak-poset-cay",parent:eX,is_landing_page:a,children:[]},{id:HB,name:HC,slug:HD,parent:eX,is_landing_page:a,children:[]},{id:2343,name:"Dökme Çay",slug:"dokme-cay",parent:eX,is_landing_page:a,children:[]},{id:2344,name:"Demlik Poşet Çay",slug:"demlik-poset-cay",parent:eX,is_landing_page:a,children:[]}]},{id:bS,name:HE,slug:HF,parent:bw,is_landing_page:a,children:[{id:2346,name:"Filtre & Çekirdek Kahveler",slug:"filtre-ve-cekirdek-kahveler",parent:bS,is_landing_page:a,children:[]},{id:2347,name:"Hazır Kahve",slug:"hazir-kahve",parent:bS,is_landing_page:a,children:[]},{id:2348,name:"Türk Kahvesi",slug:"turk-kahvesi",parent:bS,is_landing_page:a,children:[]},{id:2349,name:"Kahve Kapsülleri",slug:"kahve-kapsulleri",parent:bS,is_landing_page:a,children:[]},{id:2350,name:"Espresso, Cappucino Kahve",slug:"espresso-cappucino-kahve",parent:bS,is_landing_page:a,children:[]},{id:2351,name:"Sıcak Çikolata, Salep",slug:"sicak-cikolata-salep",parent:bS,is_landing_page:a,children:[]},{id:2352,name:"Süt Tozu",slug:"sut-tozu",parent:bS,is_landing_page:a,children:[]},{id:2353,name:"Kahve Şurubu",slug:"kahve-surubu",parent:bS,is_landing_page:a,children:[]},{id:2354,name:"Kahve Aksesuarları",slug:"kahve-aksesuarlari",parent:bS,is_landing_page:a,children:[]},{id:2355,name:"Çekirdek Kahve",slug:"cekirdek-kahve",parent:bS,is_landing_page:a,children:[]}]},{id:em,name:HG,slug:HH,parent:bw,is_landing_page:a,children:[{id:HI,name:HJ,slug:HK,parent:em,is_landing_page:a,children:[]},{id:2358,name:"Toz İçecek",slug:"toz-icecek",parent:em,is_landing_page:a,children:[]},{id:2359,name:"Soğuk Çay",slug:"soguk-cay",parent:em,is_landing_page:a,children:[]},{id:2360,name:"Şalgam Suyu",slug:"salgam-suyu",parent:em,is_landing_page:a,children:[]},{id:2361,name:"UHT Süt",slug:"uht-sut",parent:em,is_landing_page:a,children:[]}]},{id:HL,name:HM,slug:HN,parent:bw,is_landing_page:a,children:[]},{id:HO,name:HP,slug:HQ,parent:bw,is_landing_page:a,children:[]},{id:2364,name:"İçecek Şurubu",slug:"icecek-surubu",parent:bw,is_landing_page:a,children:[]}]},{id:s,name:"Gıda",slug:HR,parent:aG,is_landing_page:a,children:[{id:HS,name:"Gıda Paketleri",slug:"gida-paketleri",parent:s,is_landing_page:a,children:[{id:6739,name:"Ramazan Paketi",slug:"ramazan-paketi",parent:HS,is_landing_page:a,children:[]}]},{id:gm,name:mL,slug:HT,parent:s,is_landing_page:a,children:[{id:2368,name:"Zeytinyağı",slug:"zeytinyagi",parent:gm,is_landing_page:a,children:[]},{id:2369,name:"Bitkisel Yağlar",slug:"bitkisel-yaglar",parent:gm,is_landing_page:a,children:[]},{id:2370,name:"Ayçiçek Yağı",slug:"aycicek-yagi",parent:gm,is_landing_page:a,children:[]},{id:2371,name:"Mısırözü Yağı",slug:"misirozu-yagi",parent:gm,is_landing_page:a,children:[]}]},{id:bx,name:HU,slug:HV,parent:s,is_landing_page:a,children:[{id:2373,name:"Reçel",slug:"recel",parent:bx,is_landing_page:a,children:[]},{id:2374,name:"Helva, Tahin ve Pekmez",slug:"helva-tahin-ve-pekmez",parent:bx,is_landing_page:a,children:[]},{id:2375,name:"Peynir",slug:"peynir",parent:bx,is_landing_page:a,children:[]},{id:2376,name:"Zeytin, Zeytin Ezmesi",slug:"zeytin-zeytin-ezmesi",parent:bx,is_landing_page:a,children:[]},{id:2377,name:"Bal",slug:"bal",parent:bx,is_landing_page:a,children:[]},{id:2378,name:"Çikolata Krema, Ezme",slug:"cikolata-krema-ezme",parent:bx,is_landing_page:a,children:[]},{id:2379,name:"Kahvaltılık Gevrek",slug:"kahvaltilik-gevrek",parent:bx,is_landing_page:a,children:[]},{id:2380,name:"Tereyağ",slug:"tereyag",parent:bx,is_landing_page:a,children:[]},{id:2381,name:"Yumurta",slug:"yumurta",parent:bx,is_landing_page:a,children:[]},{id:2382,name:"Kahvaltılık Sos",slug:"kahvaltilik-sos",parent:bx,is_landing_page:a,children:[]},{id:2383,name:"Kaymak",slug:"kaymak",parent:bx,is_landing_page:a,children:[]}]},{id:en,name:"Organik Gıda",slug:"organik-gida",parent:s,is_landing_page:a,children:[{id:2385,name:HW,slug:"organik-bal-2",parent:en,is_landing_page:a,children:[]},{id:2386,name:"Organik Süt",slug:"organik-sut",parent:en,is_landing_page:a,children:[]},{id:2387,name:"Organik Zeytin",slug:"organik-zeytin",parent:en,is_landing_page:a,children:[]},{id:2388,name:"Organik Zeytinyağı",slug:"organik-zeytinyagi",parent:en,is_landing_page:a,children:[]},{id:2389,name:"Organik Sos",slug:"organik-sos",parent:en,is_landing_page:a,children:[]},{id:2390,name:"Organik Tahıl ve Müsli",slug:"organik-tahil-ve-musli",parent:en,is_landing_page:a,children:[]},{id:2391,name:"Organik Peynir",slug:"organik-peynir",parent:en,is_landing_page:a,children:[]}]},{id:2392,name:"Gurme Ürünler",slug:"gurme-urunler",parent:s,is_landing_page:a,children:[]},{id:cS,name:"Aktar Ürünleri",slug:"aktar-urunleri",parent:s,is_landing_page:a,children:[{id:2394,name:"Macun",slug:"macun",parent:cS,is_landing_page:a,children:[]},{id:2395,name:"Şurup",slug:"surup",parent:cS,is_landing_page:a,children:[]},{id:2396,name:hl,slug:"yag",parent:cS,is_landing_page:a,children:[]},{id:2397,name:"Kuru Bitkiler",slug:"kuru-bitkiler",parent:cS,is_landing_page:a,children:[]},{id:2398,name:"Polen",slug:"polen",parent:cS,is_landing_page:a,children:[]},{id:2399,name:"Arı Sütü",slug:"ari-sutu",parent:cS,is_landing_page:a,children:[]},{id:2400,name:"Kuru Bitki ve Otlar",slug:"kuru-bitki-ve-otlar",parent:cS,is_landing_page:a,children:[]},{id:2401,name:HX,slug:"aromalar",parent:cS,is_landing_page:a,children:[]},{id:2402,name:"Gıda Aroması",slug:"gida-aromasi",parent:cS,is_landing_page:a,children:[]}]},{id:by,name:HY,slug:HZ,parent:s,is_landing_page:a,children:[{id:2404,name:"Fındık",slug:"findik",parent:by,is_landing_page:a,children:[]},{id:2405,name:"Badem",slug:"badem",parent:by,is_landing_page:a,children:[]},{id:2406,name:"Antep Fıstığı",slug:"antep-fistigi",parent:by,is_landing_page:a,children:[]},{id:2407,name:"Yer Fıstığı",slug:"yer-fistigi",parent:by,is_landing_page:a,children:[]},{id:2408,name:"Kaju",slug:"kaju",parent:by,is_landing_page:a,children:[]},{id:2409,name:"Ceviz",slug:"ceviz",parent:by,is_landing_page:a,children:[]},{id:2410,name:"Leblebi",slug:"leblebi",parent:by,is_landing_page:a,children:[]},{id:2411,name:H_,slug:"karisik",parent:by,is_landing_page:a,children:[]},{id:2412,name:H$,slug:"misir-kuruyemisleri",parent:by,is_landing_page:a,children:[]},{id:2413,name:"Kabak Çekirdeği",slug:"kabak-cekirdegi",parent:by,is_landing_page:a,children:[]},{id:2414,name:"Ay Çekirdeği",slug:"ay-cekirdegi",parent:by,is_landing_page:a,children:[]}]},{id:bz,name:Ia,slug:Ib,parent:s,is_landing_page:a,children:[{id:2416,name:"Hazır Yiyecekler",slug:"hazir-yiyecekler",parent:bz,is_landing_page:a,children:[]},{id:2417,name:"Cips",slug:"cips",parent:bz,is_landing_page:a,children:[]},{id:2418,name:Ic,slug:"sakiz",parent:bz,is_landing_page:a,children:[]},{id:2419,name:"Kek",slug:"kek",parent:bz,is_landing_page:a,children:[]},{id:2420,name:"Bisküvi",slug:"biskuvi",parent:bz,is_landing_page:a,children:[]},{id:2421,name:Id,slug:"unlu-mamuller",parent:bz,is_landing_page:a,children:[]},{id:2422,name:"Şekerleme",slug:"sekerleme",parent:bz,is_landing_page:a,children:[]},{id:Ie,name:If,slug:Ig,parent:bz,is_landing_page:a,children:[]},{id:Ih,name:Ii,slug:Ij,parent:bz,is_landing_page:a,children:[]}]},{id:co,name:"Şarküteri",slug:"sarkuteri",parent:s,is_landing_page:a,children:[{id:2426,name:"Sucuk",slug:"sucuk",parent:co,is_landing_page:a,children:[]},{id:2427,name:"Pastırma",slug:"pastirma",parent:co,is_landing_page:a,children:[]},{id:2428,name:"Kavurma",slug:"kavurma",parent:co,is_landing_page:a,children:[]},{id:2429,name:"Salam",slug:"salam",parent:co,is_landing_page:a,children:[]},{id:2430,name:"Füme",slug:"fume",parent:co,is_landing_page:a,children:[]},{id:2431,name:"Kuru Et",slug:"kuru-et",parent:co,is_landing_page:a,children:[]},{id:2432,name:"Jambon",slug:"jambon",parent:co,is_landing_page:a,children:[]},{id:2433,name:"Sosis",slug:"sosis",parent:co,is_landing_page:a,children:[]},{id:2434,name:"Füme Et",slug:"fume-et",parent:co,is_landing_page:a,children:[]},{id:2435,name:"Vegan",slug:"vegan",parent:co,is_landing_page:a,children:[]}]},{id:du,name:"Soslar",slug:"soslar",parent:s,is_landing_page:a,children:[{id:2437,name:"Sirke",slug:"sirke",parent:du,is_landing_page:a,children:[]},{id:2438,name:"Ketçap",slug:"ketcap",parent:du,is_landing_page:a,children:[]},{id:2439,name:"Mayonez",slug:"mayonez",parent:du,is_landing_page:a,children:[]},{id:2440,name:Ik,slug:"hardal",parent:du,is_landing_page:a,children:[]},{id:2441,name:"Acı Sos",slug:"aci-sos",parent:du,is_landing_page:a,children:[]},{id:2442,name:Il,slug:"barbeku-sosu",parent:du,is_landing_page:a,children:[]},{id:2443,name:Im,slug:"nar-eksisi",parent:du,is_landing_page:a,children:[]},{id:2444,name:In,slug:"ozel-sos-ve-pureler",parent:du,is_landing_page:a,children:[]}]},{id:eY,name:"Hazır Yemek ve Konserveler",slug:"hazir-yemek-ve-konserveler",parent:s,is_landing_page:a,children:[{id:Io,name:Ip,slug:Iq,parent:eY,is_landing_page:a,children:[]},{id:2447,name:"Konserve",slug:"konserve",parent:eY,is_landing_page:a,children:[]},{id:2448,name:"Ton Balığı",slug:"ton-baligi",parent:eY,is_landing_page:a,children:[]},{id:2449,name:"Turşu",slug:"tursu",parent:eY,is_landing_page:a,children:[]},{id:2450,name:"Hazır Yemek",slug:"hazir-yemek",parent:eY,is_landing_page:a,children:[]}]},{id:eo,name:"Hediyelik Çikolata",slug:"hediyelik-cikolata",parent:s,is_landing_page:a,children:[{id:2452,name:"Bebek ve Doğum",slug:"bebek-ve-dogum",parent:eo,is_landing_page:a,children:[]},{id:2453,name:"Sevgiliye Özel",slug:"sevgiliye-ozel",parent:eo,is_landing_page:a,children:[]},{id:2454,name:"Bayramlık Çikolata",slug:"bayramlik-cikolata",parent:eo,is_landing_page:a,children:[]},{id:2455,name:"Söz ve Nişan",slug:"soz-ve-nisan",parent:eo,is_landing_page:a,children:[]},{id:2456,name:"Tebrik",slug:"tebrik",parent:eo,is_landing_page:a,children:[]},{id:2457,name:"Yılbaşı",slug:"yilbasi",parent:eo,is_landing_page:a,children:[]},{id:2458,name:"Doğum Günü",slug:"dogum-gunu",parent:eo,is_landing_page:a,children:[]}]},{id:ak,name:Ir,slug:mM,parent:s,is_landing_page:a,children:[{id:2460,name:"Pudra Şekeri",slug:"pudra-sekeri",parent:ak,is_landing_page:a,children:[]},{id:2461,name:"Krem Şanti",slug:"krem-santi",parent:ak,is_landing_page:a,children:[]},{id:Is,name:It,slug:Iu,parent:ak,is_landing_page:a,children:[]},{id:2463,name:Iv,slug:"un",parent:ak,is_landing_page:a,children:[]},{id:2464,name:"Krema ve Sos",slug:"krema-ve-sos",parent:ak,is_landing_page:a,children:[]},{id:2465,name:"Nişasta",slug:"nisasta",parent:ak,is_landing_page:a,children:[]},{id:2466,name:"Galeta, Grissini",slug:"galeta-grissini",parent:ak,is_landing_page:a,children:[]},{id:2467,name:"Ekmek",slug:"ekmek",parent:ak,is_landing_page:a,children:[]},{id:2468,name:Iw,slug:"kakao",parent:ak,is_landing_page:a,children:[]},{id:2469,name:"Maya",slug:"maya",parent:ak,is_landing_page:a,children:[]},{id:2470,name:"Kek ve Pasta Karışımı",slug:"kek-ve-pasta-karisimi",parent:ak,is_landing_page:a,children:[]},{id:2471,name:"Kabartma Tozu, Vanilin",slug:"kabartma-tozu-vanilin",parent:ak,is_landing_page:a,children:[]},{id:2472,name:"Toz Tatlılar",slug:"toz-tatlilar",parent:ak,is_landing_page:a,children:[]},{id:2473,name:"Pastacılık Malzemeleri",slug:"pastacilik-malzemeleri",parent:ak,is_landing_page:a,children:[]},{id:2474,name:"Kuvertür",slug:"kuvertur",parent:ak,is_landing_page:a,children:[]}]},{id:2475,name:Ix,slug:"katki-maddeleri",parent:s,is_landing_page:a,children:[]},{id:i,name:"Manav",slug:"manav",parent:s,is_landing_page:a,children:[{id:2477,name:"Biber",slug:"biber",parent:i,is_landing_page:a,children:[]},{id:2478,name:"Domates",slug:"domates",parent:i,is_landing_page:a,children:[]},{id:2479,name:"Sarımsak",slug:"sarimsak",parent:i,is_landing_page:a,children:[]},{id:2480,name:"Patlıcan",slug:"patlican",parent:i,is_landing_page:a,children:[]},{id:2481,name:"Limon",slug:"limon",parent:i,is_landing_page:a,children:[]},{id:2482,name:"Avokado",slug:"avokado",parent:i,is_landing_page:a,children:[]},{id:2483,name:"Soğan",slug:"sogan",parent:i,is_landing_page:a,children:[]},{id:2484,name:"Kabak",slug:"kabak",parent:i,is_landing_page:a,children:[]},{id:2485,name:"Portakal",slug:"portakal",parent:i,is_landing_page:a,children:[]},{id:2486,name:"Fasulye",slug:"fasulye",parent:i,is_landing_page:a,children:[]},{id:2487,name:"Mantar",slug:"mantar",parent:i,is_landing_page:a,children:[]},{id:2488,name:Iy,slug:"maydanoz",parent:i,is_landing_page:a,children:[]},{id:2489,name:"Armut",slug:"armut",parent:i,is_landing_page:a,children:[]},{id:2490,name:"Elma",slug:"elma",parent:i,is_landing_page:a,children:[]},{id:2491,name:"Ispanak",slug:"ispanak",parent:i,is_landing_page:a,children:[]},{id:2492,name:"Lahana",slug:"lahana",parent:i,is_landing_page:a,children:[]},{id:2493,name:"Mandalina",slug:"mandalina",parent:i,is_landing_page:a,children:[]},{id:2494,name:"Marul",slug:"marul",parent:i,is_landing_page:a,children:[]},{id:2495,name:"Muz",slug:"muz",parent:i,is_landing_page:a,children:[]},{id:2496,name:"Ananas",slug:"ananas",parent:i,is_landing_page:a,children:[]},{id:2497,name:"Brokoli",slug:"brokoli",parent:i,is_landing_page:a,children:[]},{id:2498,name:Iz,slug:"dereotu",parent:i,is_landing_page:a,children:[]},{id:2499,name:H_,slug:"karisik-manav-urunleri",parent:i,is_landing_page:a,children:[]},{id:2500,name:"Kavun",slug:"kavun",parent:i,is_landing_page:a,children:[]},{id:2501,name:"Patates",slug:"patates",parent:i,is_landing_page:a,children:[]},{id:2502,name:"Pırasa",slug:"pirasa",parent:i,is_landing_page:a,children:[]},{id:2503,name:"Salatalık",slug:"salatalik",parent:i,is_landing_page:a,children:[]},{id:2504,name:IA,slug:"feslegen",parent:i,is_landing_page:a,children:[]},{id:2505,name:"Girabolu",slug:"girabolu",parent:i,is_landing_page:a,children:[]},{id:2506,name:"Greyfurt",slug:"greyfurt",parent:i,is_landing_page:a,children:[]},{id:2507,name:"Havuç",slug:"havuc",parent:i,is_landing_page:a,children:[]},{id:2508,name:"Hünnap",slug:"hunnap",parent:i,is_landing_page:a,children:[]},{id:2509,name:"Karnabahar",slug:"karnabahar",parent:i,is_landing_page:a,children:[]},{id:2510,name:"Kereviz",slug:"kereviz",parent:i,is_landing_page:a,children:[]},{id:2511,name:"Kivi",slug:"kivi",parent:i,is_landing_page:a,children:[]},{id:2512,name:IB,slug:"nane",parent:i,is_landing_page:a,children:[]},{id:2513,name:"Pazı",slug:"pazi",parent:i,is_landing_page:a,children:[]},{id:2514,name:"Pitahaya",slug:"pitahaya",parent:i,is_landing_page:a,children:[]},{id:2515,name:"Roka",slug:"roka",parent:i,is_landing_page:a,children:[]},{id:2516,name:"Turp",slug:"turp",parent:i,is_landing_page:a,children:[]},{id:2517,name:"Ayva",slug:"ayva",parent:i,is_landing_page:a,children:[]},{id:2518,name:"Bamya",slug:"bamya",parent:i,is_landing_page:a,children:[]},{id:2519,name:"Erik",slug:"erik",parent:i,is_landing_page:a,children:[]},{id:2520,name:"Karpuz",slug:"karpuz",parent:i,is_landing_page:a,children:[]},{id:2521,name:"Mango",slug:"mango",parent:i,is_landing_page:a,children:[]},{id:2522,name:IC,slug:"mercankosk",parent:i,is_landing_page:a,children:[]},{id:2523,name:"Nar",slug:"nar",parent:i,is_landing_page:a,children:[]},{id:2524,name:"Nektarin",slug:"nektarin",parent:i,is_landing_page:a,children:[]},{id:2525,name:"Pancar",slug:"pancar",parent:i,is_landing_page:a,children:[]},{id:2526,name:"Pepino",slug:"pepino",parent:i,is_landing_page:a,children:[]},{id:2527,name:ID,slug:"rezene",parent:i,is_landing_page:a,children:[]},{id:2528,name:"Semizotu",slug:"semizotu",parent:i,is_landing_page:a,children:[]},{id:2529,name:IE,slug:"tarhun",parent:i,is_landing_page:a,children:[]},{id:2530,name:"Yaban Mersini",slug:"yaban-mersini",parent:i,is_landing_page:a,children:[]},{id:2531,name:"Yaş Hurma",slug:"yas-hurma",parent:i,is_landing_page:a,children:[]},{id:2532,name:"Yedikule",slug:"yedikule",parent:i,is_landing_page:a,children:[]},{id:2533,name:"Yonca Filizi",slug:"yonca-filizi",parent:i,is_landing_page:a,children:[]},{id:2534,name:"Yosun",slug:"yosun",parent:i,is_landing_page:a,children:[]},{id:2535,name:"Şalgam Filizi",slug:"salgam-filizi",parent:i,is_landing_page:a,children:[]},{id:2536,name:"Şeftali",slug:"seftali",parent:i,is_landing_page:a,children:[]}]},{id:2537,name:"Dondurulmuş Gıda",slug:"dondurulmus-gida",parent:s,is_landing_page:a,children:[]},{id:2538,name:"Yoğurt",slug:"yogurt",parent:s,is_landing_page:a,children:[]},{id:ep,name:"Sos ve Sirke",slug:"sos-ve-sirke",parent:s,is_landing_page:a,children:[{id:2540,name:Il,slug:"barbeku-sosu-2",parent:ep,is_landing_page:a,children:[]},{id:2541,name:Im,slug:"nar-eksisi-2",parent:ep,is_landing_page:a,children:[]},{id:2542,name:In,slug:"ozel-sos-ve-pure",parent:ep,is_landing_page:a,children:[]},{id:2543,name:"Limon Suyu",slug:"limon-suyu",parent:ep,is_landing_page:a,children:[]},{id:2544,name:"Makarna Sosu",slug:"makarna-sosu",parent:ep,is_landing_page:a,children:[]},{id:2545,name:"Soya Sosu",slug:"soya-sosu",parent:ep,is_landing_page:a,children:[]},{id:2546,name:"Diğer Soslar",slug:"diger-soslar",parent:ep,is_landing_page:a,children:[]}]},{id:jP,name:"Katkı Maddeleri & Aromalar",slug:"katki-maddeleri-ve-aromalar",parent:s,is_landing_page:a,children:[{id:2548,name:HX,slug:"gida-aroma",parent:jP,is_landing_page:a,children:[]},{id:2549,name:"Gıda Boyaları",slug:"gida-boyalari",parent:jP,is_landing_page:a,children:[]},{id:2550,name:Ix,slug:"gida-katki-maddeleri",parent:jP,is_landing_page:a,children:[]}]},{id:bA,name:IF,slug:IG,parent:s,is_landing_page:a,children:[{id:2552,name:"Peynirler",slug:"peynirler",parent:bA,is_landing_page:a,children:[]},{id:2553,name:"Kahvaltılık Ürünler",slug:"kahvaltilik-urunler",parent:bA,is_landing_page:a,children:[]},{id:2554,name:"Et Ürünleri",slug:"et-urunleri",parent:bA,is_landing_page:a,children:[]},{id:2555,name:mL,slug:"yoresel-gurme-sivi-yag",parent:bA,is_landing_page:a,children:[]},{id:2556,name:"Bakliyatlar & Kuru Gıdalar",slug:"bakliyatlar-ve-kuru-gidalar",parent:bA,is_landing_page:a,children:[]},{id:2557,name:"Tatlılar & Şekerlemeler",slug:"yoresel-gurme-tatlilar-ve-sekerlemeler",parent:bA,is_landing_page:a,children:[]},{id:2558,name:"Turşular",slug:"tursular",parent:bA,is_landing_page:a,children:[]},{id:2559,name:"Soslar & Ezmeler",slug:"yoresel-gurme-soslar-ezmeler",parent:bA,is_landing_page:a,children:[]},{id:2560,name:"Salçalar",slug:"salcalar",parent:bA,is_landing_page:a,children:[]},{id:2561,name:mN,slug:"yoresel-ve-gurme-icecekler",parent:bA,is_landing_page:a,children:[]},{id:2562,name:Id,slug:"yoresel-gurme-unlu-mamuller",parent:bA,is_landing_page:a,children:[]}]},{id:bf,name:IH,slug:II,parent:s,is_landing_page:a,children:[{id:2564,name:"Organik Bakliyat",slug:"organik-bakliyat",parent:bf,is_landing_page:a,children:[]},{id:2565,name:HW,slug:"organik-bal-xxxx",parent:bf,is_landing_page:a,children:[]},{id:2566,name:"Organik Makarna",slug:"organik-makarna",parent:bf,is_landing_page:a,children:[]},{id:2567,name:"Organik Un",slug:"organik-un",parent:bf,is_landing_page:a,children:[]},{id:2568,name:"Organik Zeytin & Zeytinyağı",slug:"organik-zeytin-ve-zeytinyagi",parent:bf,is_landing_page:a,children:[]},{id:2569,name:"Organik Sirke & Salça & Sos",slug:"organik-sirke-salca-sos",parent:bf,is_landing_page:a,children:[]},{id:2570,name:"Organik Reçel & Pekmez",slug:"organik-recel-ve-pekmez",parent:bf,is_landing_page:a,children:[]},{id:2571,name:"Organik Baharat",slug:"organik-baharat",parent:bf,is_landing_page:a,children:[]},{id:2572,name:"Organik Yemiş & Kurabiye",slug:"organik-yemis-ve-kurabiye",parent:bf,is_landing_page:a,children:[]},{id:2573,name:"Organik Çaylar & İçecekler",slug:"organik-ve-caylar-icecekler",parent:bf,is_landing_page:a,children:[]},{id:2574,name:"Organik Çorba",slug:"organik-corba",parent:bf,is_landing_page:a,children:[]},{id:2575,name:"Organik Yumurta",slug:"organik-yumurta",parent:bf,is_landing_page:a,children:[]}]},{id:ap,name:IJ,slug:IK,parent:s,is_landing_page:a,children:[{id:2577,name:"Glutensiz Ekmek",slug:"glutensiz-ekmek",parent:ap,is_landing_page:a,children:[]},{id:2578,name:"Glutensiz Un",slug:"glutensiz-un",parent:ap,is_landing_page:a,children:[]},{id:2579,name:"Glutensiz Makarna",slug:"glutensiz-makarna",parent:ap,is_landing_page:a,children:[]},{id:2580,name:"Glutensiz Çorba",slug:"glutensiz-corba",parent:ap,is_landing_page:a,children:[]},{id:2581,name:"Glutensiz Bisküvi",slug:"glutensiz-biskuvi",parent:ap,is_landing_page:a,children:[]},{id:2582,name:"Glutensiz Kurabiye",slug:"glutensiz-kurabiye",parent:ap,is_landing_page:a,children:[]},{id:2583,name:"Glutensiz Çikolata ve Gofret",slug:"glutensiz-cikolata-ve-gofret",parent:ap,is_landing_page:a,children:[]},{id:2584,name:"Glutensiz Yemeklikler",slug:"glutensiz-yemeklikler",parent:ap,is_landing_page:a,children:[]},{id:2585,name:"Glutensiz Baharatlar",slug:"glutensiz-baharatlar",parent:ap,is_landing_page:a,children:[]},{id:2586,name:"Glutensiz Kahvaltılıklar",slug:"glutensiz-kahvaltiliklar",parent:ap,is_landing_page:a,children:[]},{id:2587,name:"Glutensiz Kraker ve Cips",slug:"glutensiz-kraker-ve-cips",parent:ap,is_landing_page:a,children:[]},{id:2588,name:"Glutensiz Atıştırmalıklar",slug:"glutensiz-atistirmaliklar",parent:ap,is_landing_page:a,children:[]},{id:2589,name:"Glutensiz Kuruyemiş",slug:"glutensiz-kuruyemis",parent:ap,is_landing_page:a,children:[]},{id:2590,name:"Glutensiz Pasta Malzemeleri",slug:"glutensiz-pasta-malzemeleri",parent:ap,is_landing_page:a,children:[]},{id:2591,name:"Glutensiz Bakım Ürünleri",slug:"glutensiz-bakim-urunleri",parent:ap,is_landing_page:a,children:[]},{id:2592,name:"Diğer Glutensiz Ürünler",slug:"diger-glutensiz-urunler",parent:ap,is_landing_page:a,children:[]}]},{id:2593,name:mN,slug:"icecekler",parent:s,is_landing_page:a,children:[]}]},{id:aq,name:"Kuru Gıdalar",slug:IL,parent:aG,is_landing_page:a,children:[{id:d,name:IM,slug:IN,parent:aq,is_landing_page:a,children:[{id:2596,name:"Acı Toz Biber",slug:"aci-toz-biber",parent:d,is_landing_page:a,children:[]},{id:2597,name:"Acı Yavşan Otu",slug:"aci-yavsan-otu",parent:d,is_landing_page:a,children:[]},{id:2598,name:"Açlık Otu",slug:"aclik-otu",parent:d,is_landing_page:a,children:[]},{id:2599,name:"Adaçayı",slug:"adacayi",parent:d,is_landing_page:a,children:[]},{id:2600,name:"Alıç Çiçeği",slug:"alic-cicegi",parent:d,is_landing_page:a,children:[]},{id:2601,name:"Altın Otu",slug:"altin-otu",parent:d,is_landing_page:a,children:[]},{id:2602,name:"Anason",slug:"anason",parent:d,is_landing_page:a,children:[]},{id:2603,name:"Ardıç",slug:"ardic",parent:d,is_landing_page:a,children:[]},{id:2604,name:"Aslan Pençesi",slug:"aslan-pencesi",parent:d,is_landing_page:a,children:[]},{id:2605,name:"Aspir",slug:"aspir",parent:d,is_landing_page:a,children:[]},{id:2606,name:"Aspir Çiçeği",slug:"aspir-cicegi",parent:d,is_landing_page:a,children:[]},{id:2607,name:"Atom Biber",slug:"atom-biber",parent:d,is_landing_page:a,children:[]},{id:2608,name:"Avakado Yaprağı",slug:"avakado-yapragi",parent:d,is_landing_page:a,children:[]},{id:2609,name:"Aynısefa Çiçeği",slug:"aynisefa-cicegi",parent:d,is_landing_page:a,children:[]},{id:2610,name:"Ayrık Kökü",slug:"ayrik-koku",parent:d,is_landing_page:a,children:[]},{id:2611,name:"Ayva Yaprağı",slug:"ayva-yapragi",parent:d,is_landing_page:a,children:[]},{id:2612,name:"Baharat Karışımı",slug:"baharat-karisimi",parent:d,is_landing_page:a,children:[]},{id:2613,name:"Balık Baharatı",slug:"balik-baharati",parent:d,is_landing_page:a,children:[]},{id:2614,name:"Balık Harcı",slug:"balik-harci",parent:d,is_landing_page:a,children:[]},{id:2615,name:"Bamya Tohumu",slug:"bamya-tohumu",parent:d,is_landing_page:a,children:[]},{id:2616,name:"Barbekü Harcı",slug:"barbeku-harci",parent:d,is_landing_page:a,children:[]},{id:2617,name:"Beyaz Biber",slug:"beyaz-biber",parent:d,is_landing_page:a,children:[]},{id:2618,name:"Biberiye",slug:"biberiye",parent:d,is_landing_page:a,children:[]},{id:2619,name:"Biryanı Baharatı",slug:"biryani-baharati",parent:d,is_landing_page:a,children:[]},{id:2620,name:"Bodur Mahmut",slug:"bodur-mahmut",parent:d,is_landing_page:a,children:[]},{id:2621,name:"Böğürtlen Kökü",slug:"bogurtlen-koku",parent:d,is_landing_page:a,children:[]},{id:2622,name:"Böğürtlen Yaprağı",slug:"bogurtlen-yapragi",parent:d,is_landing_page:a,children:[]},{id:2623,name:"Buhur",slug:"buhur",parent:d,is_landing_page:a,children:[]},{id:2624,name:"Cajun",slug:"cajun",parent:d,is_landing_page:a,children:[]},{id:2625,name:"Ceviz Yaprağı",slug:"ceviz-yapragi",parent:d,is_landing_page:a,children:[]},{id:2626,name:"Chia Tohumu",slug:"chia-tohumu",parent:d,is_landing_page:a,children:[]},{id:2627,name:"Civanperçemi",slug:"civanpercemi",parent:d,is_landing_page:a,children:[]},{id:2628,name:"Çakşır Otu",slug:"caksir-otu",parent:d,is_landing_page:a,children:[]},{id:2629,name:"Çam Fıstığı",slug:"cam-fistigi",parent:d,is_landing_page:a,children:[]},{id:2630,name:"Çam Sakızı",slug:"cam-sakizi",parent:d,is_landing_page:a,children:[]},{id:2631,name:"Çemen",slug:"cemen",parent:d,is_landing_page:a,children:[]},{id:2632,name:"Çemen Otu",slug:"cemen-otu",parent:d,is_landing_page:a,children:[]},{id:2633,name:"Çemen Tozu",slug:"cemen-tozu",parent:d,is_landing_page:a,children:[]},{id:2634,name:IO,slug:"cesni-baharat",parent:d,is_landing_page:a,children:[]},{id:2635,name:"Çınar Yaprağı",slug:"cinar-yapragi",parent:d,is_landing_page:a,children:[]},{id:2636,name:"Çiğköfte Baharatı",slug:"cigkofte-baharati",parent:d,is_landing_page:a,children:[]},{id:2637,name:"Çoban Çantası",slug:"coban-cantasi",parent:d,is_landing_page:a,children:[]},{id:2638,name:"Çoban Çökerten",slug:"coban-cokerten",parent:d,is_landing_page:a,children:[]},{id:2639,name:"Çörek Otu",slug:"corek-otu",parent:d,is_landing_page:a,children:[]},{id:2640,name:"Çörekotu",slug:"corekotu",parent:d,is_landing_page:a,children:[]},{id:2641,name:"Damla Sakızı",slug:"damla-sakizi",parent:d,is_landing_page:a,children:[]},{id:2642,name:"Defne",slug:"defne",parent:d,is_landing_page:a,children:[]},{id:2643,name:"Demirhindi",slug:"demirhindi",parent:d,is_landing_page:a,children:[]},{id:2644,name:Iz,slug:"dereotu-baharatlari",parent:d,is_landing_page:a,children:[]},{id:2645,name:"Deve Dikeni",slug:"deve-dikeni",parent:d,is_landing_page:a,children:[]},{id:2646,name:"Dolma Harcı",slug:"dolma-harci",parent:d,is_landing_page:a,children:[]},{id:2647,name:"Dolmalık Fıstık",slug:"dolmalik-fistik",parent:d,is_landing_page:a,children:[]},{id:2648,name:"Ebe Gümeci",slug:"ebe-gumeci",parent:d,is_landing_page:a,children:[]},{id:2649,name:"Ekinezya",slug:"ekinezya",parent:d,is_landing_page:a,children:[]},{id:2650,name:"Ekinezya Çiçeği",slug:"ekinezya-cicegi",parent:d,is_landing_page:a,children:[]},{id:2651,name:"Et Baharatı",slug:"et-baharati",parent:d,is_landing_page:a,children:[]},{id:2652,name:IA,slug:"feslegen-baharatlari",parent:d,is_landing_page:a,children:[]},{id:2653,name:"Funda Yaprağı",slug:"funda-yapragi",parent:d,is_landing_page:a,children:[]},{id:2654,name:"Ginseng",slug:"ginseng",parent:d,is_landing_page:a,children:[]},{id:2655,name:"Gül Gonca",slug:"gul-gonca",parent:d,is_landing_page:a,children:[]},{id:2656,name:"Gül Kurusu",slug:"gul-kurusu",parent:d,is_landing_page:a,children:[]},{id:2657,name:"Gül Tomurcuk",slug:"gul-tomurcuk",parent:d,is_landing_page:a,children:[]},{id:2658,name:"Harç",slug:"harc",parent:d,is_landing_page:a,children:[]},{id:2659,name:Ik,slug:"hardal-baharatlari",parent:d,is_landing_page:a,children:[]},{id:2660,name:"Haşhaş",slug:"hashas",parent:d,is_landing_page:a,children:[]},{id:2661,name:"Hatmi Çiçeği",slug:"hatmi-cicegi",parent:d,is_landing_page:a,children:[]},{id:2662,name:"Havlıcan",slug:"havlican",parent:d,is_landing_page:a,children:[]},{id:2663,name:"Hayit Tohumu",slug:"hayit-tohumu",parent:d,is_landing_page:a,children:[]},{id:2664,name:"Hibüsküs",slug:"hibuskus",parent:d,is_landing_page:a,children:[]},{id:2665,name:"Himalaya Tuzu",slug:"himalaya-tuzu",parent:d,is_landing_page:a,children:[]},{id:2666,name:"Hindistan Cevizi",slug:"hindistan-cevizi",parent:d,is_landing_page:a,children:[]},{id:2667,name:"Ihlamur",slug:"ihlamur",parent:d,is_landing_page:a,children:[]},{id:2668,name:"Isırgan",slug:"isirgan",parent:d,is_landing_page:a,children:[]},{id:2669,name:"İsot",slug:"isot",parent:d,is_landing_page:a,children:[]},{id:2670,name:"Kabartma Tozu",slug:"kabartma-tozu",parent:d,is_landing_page:a,children:[]},{id:2671,name:"Kahvaltılık Baharat",slug:"kahvaltilik-baharat",parent:d,is_landing_page:a,children:[]},{id:2672,name:"Kajun Baharatı",slug:"kajun-baharati",parent:d,is_landing_page:a,children:[]},{id:2673,name:Iw,slug:"kakao-baharat",parent:d,is_landing_page:a,children:[]},{id:2674,name:"Kakule",slug:"kakule",parent:d,is_landing_page:a,children:[]},{id:2675,name:"Karabaş Otu",slug:"karabas-otu",parent:d,is_landing_page:a,children:[]},{id:2676,name:"Karabiber",slug:"karabiber",parent:d,is_landing_page:a,children:[]},{id:2677,name:"Karahindibağ",slug:"karahindibag",parent:d,is_landing_page:a,children:[]},{id:2678,name:"Karanfil",slug:"karanfil",parent:d,is_landing_page:a,children:[]},{id:2679,name:"Karbonat",slug:"karbonat",parent:d,is_landing_page:a,children:[]},{id:2680,name:"Karışık Çeşni",slug:"karisik-cesni",parent:d,is_landing_page:a,children:[]},{id:2681,name:"Kaya Tuzu",slug:"kaya-tuzu",parent:d,is_landing_page:a,children:[]},{id:2682,name:"Kebabiye",slug:"kebabiye",parent:d,is_landing_page:a,children:[]},{id:2683,name:"Kebap Baharatı",slug:"kebap-baharati",parent:d,is_landing_page:a,children:[]},{id:2684,name:"Keçiboynuzu",slug:"keciboynuzu",parent:d,is_landing_page:a,children:[]},{id:2685,name:"Kedi Otu Kökü",slug:"kedi-otu-koku",parent:d,is_landing_page:a,children:[]},{id:2686,name:"Kekik",slug:"kekik",parent:d,is_landing_page:a,children:[]},{id:2687,name:"Kendir Tohumu",slug:"kendir-tohumu",parent:d,is_landing_page:a,children:[]},{id:2688,name:"Kepse Baharat",slug:"kepse-baharat",parent:d,is_landing_page:a,children:[]},{id:2689,name:"Kereviz Tohumu",slug:"kereviz-tohumu",parent:d,is_landing_page:a,children:[]},{id:2690,name:"Keten Tohumu",slug:"keten-tohumu",parent:d,is_landing_page:a,children:[]},{id:2691,name:"Kına",slug:"kina",parent:d,is_landing_page:a,children:[]},{id:2692,name:"Kırmızı Biber",slug:"kirmizi-biber",parent:d,is_landing_page:a,children:[]},{id:2693,name:"Kimyon",slug:"kimyon",parent:d,is_landing_page:a,children:[]},{id:2694,name:"Kinoa Tohumu",slug:"kinoa-tohumu",parent:d,is_landing_page:a,children:[]},{id:2695,name:"Kiraz Sapı",slug:"kiraz-sapi",parent:d,is_landing_page:a,children:[]},{id:2696,name:"Kişniş",slug:"kisnis",parent:d,is_landing_page:a,children:[]},{id:2697,name:"Kitre",slug:"kitre",parent:d,is_landing_page:a,children:[]},{id:2698,name:"Köfte Baharatı",slug:"kofte-baharati",parent:d,is_landing_page:a,children:[]},{id:2699,name:"Köfte Harcı",slug:"kofte-harci",parent:d,is_landing_page:a,children:[]},{id:2700,name:"Köri",slug:"kori",parent:d,is_landing_page:a,children:[]},{id:2701,name:"Kuş Üzümü",slug:"kus-uzumu",parent:d,is_landing_page:a,children:[]},{id:2702,name:"Kuşburnu",slug:"kusburnu",parent:d,is_landing_page:a,children:[]},{id:2703,name:"Lavanta",slug:"lavanta",parent:d,is_landing_page:a,children:[]},{id:2704,name:"Limon Tuzu",slug:"limon-tuzu",parent:d,is_landing_page:a,children:[]},{id:2705,name:"Mahlep",slug:"mahlep",parent:d,is_landing_page:a,children:[]},{id:2706,name:"Makarna & Pizza Baharatı",slug:"makarna-ve-pizza-baharati",parent:d,is_landing_page:a,children:[]},{id:2707,name:Iy,slug:"maydanoz-baharatlari",parent:d,is_landing_page:a,children:[]},{id:2708,name:"Melek Otu Kökü",slug:"melek-otu-koku",parent:d,is_landing_page:a,children:[]},{id:2709,name:"Melisa",slug:"melisa",parent:d,is_landing_page:a,children:[]},{id:2710,name:"Mentol",slug:"mentol",parent:d,is_landing_page:a,children:[]},{id:2711,name:IC,slug:"mercankosk-baharatlari",parent:d,is_landing_page:a,children:[]},{id:2712,name:"Mersin Yaprağı",slug:"mersin-yapragi",parent:d,is_landing_page:a,children:[]},{id:2713,name:"Meyan",slug:"meyan",parent:d,is_landing_page:a,children:[]},{id:2714,name:"Mısır Püskülü",slug:"misir-puskulu",parent:d,is_landing_page:a,children:[]},{id:2715,name:"Misk",slug:"misk",parent:d,is_landing_page:a,children:[]},{id:2716,name:"Muskat",slug:"muskat",parent:d,is_landing_page:a,children:[]},{id:2717,name:"Mürver Çiçeği",slug:"murver-cicegi",parent:d,is_landing_page:a,children:[]},{id:2718,name:IB,slug:"nane-baharatlari",parent:d,is_landing_page:a,children:[]},{id:2719,name:"Nar Çiçeği",slug:"nar-cicegi",parent:d,is_landing_page:a,children:[]},{id:2720,name:"Oğul Otu",slug:"ogul-otu",parent:d,is_landing_page:a,children:[]},{id:2721,name:"Okaliptus Yaprağı",slug:"okaliptus-yapragi",parent:d,is_landing_page:a,children:[]},{id:2722,name:"Ökse Otu",slug:"okse-otu",parent:d,is_landing_page:a,children:[]},{id:2723,name:"Özel Baharatlar",slug:"ozel-baharatlar",parent:d,is_landing_page:a,children:[]},{id:2724,name:"Pane Harcı",slug:"pane-harci",parent:d,is_landing_page:a,children:[]},{id:2725,name:"Panko",slug:"panko",parent:d,is_landing_page:a,children:[]},{id:2726,name:"Papatya Çiçeği",slug:"papatya-cicegi",parent:d,is_landing_page:a,children:[]},{id:2727,name:"Pasta Süsü",slug:"pasta-susu",parent:d,is_landing_page:a,children:[]},{id:2728,name:"Pelin Otu",slug:"pelin-otu",parent:d,is_landing_page:a,children:[]},{id:2729,name:"Peygamber Çiçeği",slug:"peygamber-cicegi",parent:d,is_landing_page:a,children:[]},{id:2730,name:"Portakal Kabuğu Tozu",slug:"portakal-kabugu-tozu",parent:d,is_landing_page:a,children:[]},{id:2731,name:"Pul Biber",slug:"pul-biber",parent:d,is_landing_page:a,children:[]},{id:2732,name:"Reyhan",slug:"reyhan",parent:d,is_landing_page:a,children:[]},{id:2733,name:ID,slug:"rezene-baharatlari",parent:d,is_landing_page:a,children:[]},{id:2734,name:"Safran",slug:"safran",parent:d,is_landing_page:a,children:[]},{id:2735,name:Ic,slug:"sakiz-baharatlari",parent:d,is_landing_page:a,children:[]},{id:2736,name:"Salata Baharatı",slug:"salata-baharati",parent:d,is_landing_page:a,children:[]},{id:2737,name:"Sandaloz Sakızı",slug:"sandaloz-sakizi",parent:d,is_landing_page:a,children:[]},{id:2738,name:"Sarı Kantaron",slug:"sari-kantaron",parent:d,is_landing_page:a,children:[]},{id:2739,name:"Sarımsak Tozu",slug:"sarimsak-tozu",parent:d,is_landing_page:a,children:[]},{id:2740,name:"Sebzeli Çeşni",slug:"sebzeli-cesni",parent:d,is_landing_page:a,children:[]},{id:2741,name:"Set",slug:"set",parent:d,is_landing_page:a,children:[]},{id:2742,name:"Sinameki",slug:"sinameki",parent:d,is_landing_page:a,children:[]},{id:2743,name:"Soda",slug:"soda",parent:d,is_landing_page:a,children:[]},{id:2744,name:"Soğan Tozu",slug:"sogan-tozu",parent:d,is_landing_page:a,children:[]},{id:2745,name:"Sucuk Baharatı",slug:"sucuk-baharati",parent:d,is_landing_page:a,children:[]},{id:2746,name:"Sumak",slug:"sumak",parent:d,is_landing_page:a,children:[]},{id:2747,name:"Susam",slug:"susam",parent:d,is_landing_page:a,children:[]},{id:2748,name:"Şahtere",slug:"sahtere",parent:d,is_landing_page:a,children:[]},{id:2749,name:"Şerbetci Otu",slug:"serbetci-otu",parent:d,is_landing_page:a,children:[]},{id:2750,name:"Tarçın",slug:"tarcin",parent:d,is_landing_page:a,children:[]},{id:2751,name:IE,slug:"tarhun-baharatlari",parent:d,is_landing_page:a,children:[]},{id:2752,name:"Tavuk Baharatı",slug:"tavuk-baharati",parent:d,is_landing_page:a,children:[]},{id:2753,name:"Tavuk Harcı",slug:"tavuk-harci",parent:d,is_landing_page:a,children:[]},{id:2754,name:"Tere",slug:"tere",parent:d,is_landing_page:a,children:[]},{id:2755,name:"Termiye",slug:"termiye",parent:d,is_landing_page:a,children:[]},{id:2756,name:"Toz Biber",slug:"toz-biber",parent:d,is_landing_page:a,children:[]},{id:2757,name:"Tuzot",slug:"tuzot",parent:d,is_landing_page:a,children:[]},{id:2758,name:"Üzerlik Tohumu",slug:"uzerlik-tohumu",parent:d,is_landing_page:a,children:[]},{id:2759,name:"Üzüm Çekirdeği",slug:"uzum-cekirdegi",parent:d,is_landing_page:a,children:[]},{id:2760,name:"Vanilya",slug:"vanilya",parent:d,is_landing_page:a,children:[]},{id:2761,name:"Yakı Otu",slug:"yaki-otu",parent:d,is_landing_page:a,children:[]},{id:2762,name:"Yasemin Çiçeği",slug:"yasemin-cicegi",parent:d,is_landing_page:a,children:[]},{id:2763,name:"Yenibahar",slug:"yenibahar",parent:d,is_landing_page:a,children:[]},{id:2764,name:"Yosun Tozu",slug:"yosun-tozu",parent:d,is_landing_page:a,children:[]},{id:2765,name:"Zahter",slug:"zahter",parent:d,is_landing_page:a,children:[]},{id:2766,name:"Zencefil",slug:"zencefil",parent:d,is_landing_page:a,children:[]},{id:2767,name:"Zerdeçal",slug:"zerdecal",parent:d,is_landing_page:a,children:[]},{id:2768,name:"Zeytin Yaprağı",slug:"zeytin-yapragi",parent:d,is_landing_page:a,children:[]}]},{id:bT,name:IP,slug:IQ,parent:aq,is_landing_page:a,children:[{id:2770,name:"Bulgur",slug:"bulgur",parent:bT,is_landing_page:a,children:[]},{id:2771,name:"Pirinç",slug:"pirinc",parent:bT,is_landing_page:a,children:[]},{id:2772,name:"Mercimek",slug:"mercimek",parent:bT,is_landing_page:a,children:[]},{id:2773,name:"Nohut",slug:"nohut",parent:bT,is_landing_page:a,children:[]},{id:2774,name:"Kuru Fasulye",slug:"kuru-fasulye",parent:bT,is_landing_page:a,children:[]},{id:2775,name:"Buğday",slug:"bugday",parent:bT,is_landing_page:a,children:[]},{id:2776,name:"Kinoa",slug:"kinoa",parent:bT,is_landing_page:a,children:[]},{id:2777,name:"Chia",slug:"chia",parent:bT,is_landing_page:a,children:[]},{id:2778,name:H$,slug:"misir",parent:bT,is_landing_page:a,children:[]},{id:2779,name:"Barbunya",slug:"barbunya",parent:bT,is_landing_page:a,children:[]}]},{id:IR,name:IS,slug:IT,parent:aq,is_landing_page:a,children:[]},{id:IU,name:IV,slug:IW,parent:aq,is_landing_page:a,children:[]},{id:IX,name:IY,slug:IZ,parent:aq,is_landing_page:a,children:[]},{id:I_,name:I$,slug:Ja,parent:aq,is_landing_page:a,children:[]},{id:2784,name:IO,slug:"cesni",parent:aq,is_landing_page:a,children:[]},{id:2785,name:"Tatlı",slug:"tatli",parent:aq,is_landing_page:a,children:[]},{id:2786,name:"Margarin",slug:"margarin",parent:aq,is_landing_page:a,children:[]},{id:2787,name:"Bulyon",slug:"bulyon",parent:aq,is_landing_page:a,children:[]}]}],color:i$,styles:Jb},{id:k,name:"Yapı Market & Bahçe",slug:"yapi-market-ve-bahce",parent:j,is_landing_page:z,children:[{id:u,name:Jd,slug:Je,parent:k,is_landing_page:a,children:[{id:2789,name:"Akülü Vidalamalar",slug:"akulu-vidalamalar",parent:u,is_landing_page:a,children:[]},{id:2790,name:"Matkaplar",slug:"matkaplar",parent:u,is_landing_page:a,children:[]},{id:2791,name:"Kırıcı ve Deliciler",slug:"kirici-ve-deliciler",parent:u,is_landing_page:a,children:[]},{id:cp,name:"Uçlar ve Aparatlar",slug:"uclar-ve-aparatlar",parent:u,is_landing_page:a,children:[{id:2793,name:"Matkap Uçları",slug:"matkap-uclari",parent:cp,is_landing_page:a,children:[]},{id:2794,name:"Dekupaj Uçları",slug:"dekupaj-uclari",parent:cp,is_landing_page:a,children:[]},{id:2795,name:"Elmas Testereler",slug:"elmas-testereler",parent:cp,is_landing_page:a,children:[]},{id:2796,name:"Kesici - Taşlayıcı Diskler",slug:"kesici-taslayici-diskler",parent:cp,is_landing_page:a,children:[]},{id:2797,name:"Vidalama Aksesuarları",slug:"vidalama-aksesuarlari",parent:cp,is_landing_page:a,children:[]},{id:2798,name:"Daire Testere Bıçakları",slug:"daire-testere-bicaklari",parent:cp,is_landing_page:a,children:[]},{id:2799,name:"Yedek Akü ve Şarj Cihazları",slug:"yedek-aku-ve-sarj-cihazlari",parent:cp,is_landing_page:a,children:[]},{id:2800,name:"Mandrenler",slug:"mandrenler",parent:cp,is_landing_page:a,children:[]},{id:2801,name:"Zımparalar",slug:"zimparalar",parent:cp,is_landing_page:a,children:[]},{id:2802,name:"Aksesuar Setleri",slug:"aksesuar-setleri",parent:cp,is_landing_page:a,children:[]}]},{id:jR,name:"Taşlama",slug:"taslama",parent:u,is_landing_page:a,children:[{id:2804,name:"Avuç Taşlama",slug:"avuc-taslama",parent:jR,is_landing_page:a,children:[]},{id:2805,name:"Kalıpçı taşlama",slug:"kalipci-taslama",parent:jR,is_landing_page:a,children:[]},{id:2806,name:"Genel Taşlama",slug:"genel-taslama",parent:jR,is_landing_page:a,children:[]}]},{id:jS,name:"Ahşap ve Metal Kesme",slug:"ahsap-ve-metal-kesme",parent:u,is_landing_page:a,children:[{id:2808,name:"Gönye Kesme",slug:"gonye-kesme",parent:jS,is_landing_page:a,children:[]},{id:2809,name:"Tezgah Tipi Testereler",slug:"tezgah-tipi-testereler",parent:jS,is_landing_page:a,children:[]},{id:2810,name:"Metal Kesme Aletleri",slug:"metal-kesme-aletleri",parent:jS,is_landing_page:a,children:[]}]},{id:2811,name:"Dekupaj Testere",slug:"dekupaj-testere",parent:u,is_landing_page:a,children:[]},{id:2812,name:"Polisaj Makinesi",slug:"polisaj-makinesi",parent:u,is_landing_page:a,children:[]},{id:2813,name:"Daire Testere",slug:"daire-testere",parent:u,is_landing_page:a,children:[]},{id:jT,name:"Çivi çakma ve Zımba Aletleri",slug:"civi-cakma-ve-zimba-aletleri",parent:u,is_landing_page:a,children:[{id:2815,name:pR,slug:"elektrikli-civi-cakma-ve-zimba-aletleri",parent:jT,is_landing_page:a,children:[]},{id:2816,name:"Havalı",slug:"havali",parent:jT,is_landing_page:a,children:[]},{id:2817,name:"Mekanik",slug:"mekanik",parent:jT,is_landing_page:a,children:[]}]},{id:2818,name:"Freze",slug:"freze",parent:u,is_landing_page:a,children:[]},{id:2819,name:"Tilki Kuyruğu",slug:"tilki-kuyrugu",parent:u,is_landing_page:a,children:[]},{id:2820,name:"Sıcak Hava Tabancaları",slug:"sicak-hava-tabancalari",parent:u,is_landing_page:a,children:[]},{id:2821,name:"Planya",slug:"planya",parent:u,is_landing_page:a,children:[]},{id:2822,name:"Somun Sıkma Tabancaları",slug:"somun-sikma-tabancalari",parent:u,is_landing_page:a,children:[]},{id:2823,name:"Taş Motoru",slug:"tas-motoru",parent:u,is_landing_page:a,children:[]},{id:mO,name:"Hobi Aletleri",slug:"hobi-aletleri",parent:u,is_landing_page:a,children:[{id:2825,name:"Hobi Aksesuarları",slug:"hobi-aksesuarlari",parent:mO,is_landing_page:a,children:[]},{id:2826,name:"Hobi Makineleri",slug:"hobi-makineleri",parent:mO,is_landing_page:a,children:[]}]},{id:2827,name:"Elektrikli Tornavida",slug:"elektrikli-tornavida",parent:u,is_landing_page:a,children:[]},{id:2828,name:"Kanal Açma Makinesi",slug:"kanal-acma-makinesi",parent:u,is_landing_page:a,children:[]},{id:2829,name:"Karıştırıcılar",slug:"karistiricilar",parent:u,is_landing_page:a,children:[]},{id:2830,name:"Zımpara Aletleri",slug:"zimpara-aletleri",parent:u,is_landing_page:a,children:[]},{id:eZ,name:"Kaynak Makinesi",slug:"kaynak-makinesi",parent:u,is_landing_page:a,children:[{id:2832,name:"İnverter Kaynak Makineleri",slug:"inverter-kaynak-makineleri",parent:eZ,is_landing_page:a,children:[]},{id:2833,name:"Gazaltı Kaynak Makineleri",slug:"gazalti-kaynak-makineleri",parent:eZ,is_landing_page:a,children:[]},{id:2834,name:"Argon Kaynak Makineleri",slug:"argon-kaynak-makineleri",parent:eZ,is_landing_page:a,children:[]},{id:2835,name:"Plazma Kaynak Makineleri",slug:"plazma-kaynak-makineleri",parent:eZ,is_landing_page:a,children:[]},{id:2836,name:"Pvc Kaynak Makineleri",slug:"pvc-kaynak-makineleri",parent:eZ,is_landing_page:a,children:[]},{id:2837,name:"Kaynak Aksesuarları",slug:"kaynak-aksesuarlari",parent:eZ,is_landing_page:a,children:[]}]},{id:mP,name:"Hava Kompresörü",slug:"hava-kompresoru",parent:u,is_landing_page:a,children:[{id:2839,name:"Trifaze Hava Kompresörü",slug:"trifaze-hava-kompresoru",parent:mP,is_landing_page:a,children:[]},{id:2840,name:"Monofaze Hava Kompresörü",slug:"monofaze-hava-kompresoru",parent:mP,is_landing_page:a,children:[]}]},{id:2841,name:"Seramik Kesme Makineleri",slug:"seramik-kesme-makineleri",parent:u,is_landing_page:a,children:[]},{id:2842,name:"Raspalama",slug:"raspalama",parent:u,is_landing_page:a,children:[]},{id:2843,name:"Havalı Aletler",slug:"havali-aletler",parent:u,is_landing_page:a,children:[]},{id:2844,name:"Karot Makineleri",slug:"karot-makineleri",parent:u,is_landing_page:a,children:[]},{id:e_,name:"Kaldırma Ekipmanları",slug:"kaldirma-ekipmanlari",parent:u,is_landing_page:a,children:[{id:2846,name:"Vinçler",slug:"vincler",parent:e_,is_landing_page:a,children:[]},{id:2847,name:"Transpaletler",slug:"transpaletler",parent:e_,is_landing_page:a,children:[]},{id:2848,name:"Kaldıraçlar",slug:"kaldiraclar",parent:e_,is_landing_page:a,children:[]},{id:2849,name:"Sapanlar",slug:"sapanlar",parent:e_,is_landing_page:a,children:[]},{id:2850,name:Jf,slug:"krikolar",parent:e_,is_landing_page:a,children:[]},{id:2851,name:"Taşıma Arabaları",slug:"tasima-arabalari",parent:e_,is_landing_page:a,children:[]}]},{id:jU,name:"Pafta Makinesi",slug:"pafta-makinesi",parent:u,is_landing_page:a,children:[{id:2853,name:"Mekanik Pafta Makineleri",slug:"mekanik-pafta-makineleri",parent:jU,is_landing_page:a,children:[]},{id:2854,name:"Elektrikli Pafta Makineleri",slug:"elektrikli-pafta-makineleri",parent:jU,is_landing_page:a,children:[]},{id:2855,name:"Pafta Aksesuarları",slug:"pafta-aksesuarlari",parent:jU,is_landing_page:a,children:[]}]},{id:2856,name:"Torna Makineleri",slug:"torna-makineleri",parent:u,is_landing_page:a,children:[]}]},{id:D,name:Jg,slug:Jh,parent:k,is_landing_page:a,children:[{id:2858,name:"Maket Bıçakları",slug:"maket-bicaklari",parent:D,is_landing_page:a,children:[]},{id:2859,name:"Yan Keskiler",slug:"yan-keskiler",parent:D,is_landing_page:a,children:[]},{id:2860,name:"Yassı Keskiler",slug:"yassi-keskiler",parent:D,is_landing_page:a,children:[]},{id:2861,name:"Penseler",slug:"penseler",parent:D,is_landing_page:a,children:[]},{id:jV,name:"Çekiç ve Tokmaklar",slug:"cekic-ve-tokmaklar",parent:D,is_landing_page:a,children:[{id:2863,name:"Çekiçler",slug:"cekicler",parent:jV,is_landing_page:a,children:[]},{id:2864,name:"Tokmaklar",slug:"tokmaklar",parent:jV,is_landing_page:a,children:[]},{id:2865,name:"Keserler",slug:"keserler",parent:jV,is_landing_page:a,children:[]}]},{id:2866,name:"Kargaburun",slug:"kargaburun",parent:D,is_landing_page:a,children:[]},{id:2867,name:"Kerpetenler",slug:"kerpetenler",parent:D,is_landing_page:a,children:[]},{id:hW,name:"Testereler",slug:"testereler",parent:D,is_landing_page:a,children:[{id:2869,name:"Demir Testereleri",slug:"demir-testereleri",parent:hW,is_landing_page:a,children:[]},{id:2870,name:"Ahşap Testereleri",slug:"ahsap-testereleri",parent:hW,is_landing_page:a,children:[]},{id:2871,name:"Kıl Testereler",slug:"kil-testereler",parent:hW,is_landing_page:a,children:[]},{id:2872,name:"Kıl Testere Aksesuarları",slug:"kil-testere-aksesuarlari",parent:hW,is_landing_page:a,children:[]}]},{id:2873,name:"Su Terazileri",slug:"su-terazileri",parent:D,is_landing_page:a,children:[]},{id:gn,name:"Tornavidalar",slug:"tornavidalar",parent:D,is_landing_page:a,children:[{id:2875,name:"Yıldız Tornavidalar",slug:"yildiz-tornavidalar",parent:gn,is_landing_page:a,children:[]},{id:2876,name:"Düz Tornavidalar",slug:"duz-tornavidalar",parent:gn,is_landing_page:a,children:[]},{id:2877,name:"Torx Tornavidalar",slug:"torx-tornavidalar",parent:gn,is_landing_page:a,children:[]},{id:2878,name:"Lokma Uçlu Tornavidalar",slug:"lokma-uclu-tornavidalar",parent:gn,is_landing_page:a,children:[]},{id:2879,name:"Tornavida Setleri",slug:"tornavida-setleri",parent:gn,is_landing_page:a,children:[]}]},{id:2880,name:"İskarpela",slug:"iskarpela",parent:D,is_landing_page:a,children:[]},{id:2881,name:"Eğe Setleri",slug:"ege-setleri",parent:D,is_landing_page:a,children:[]},{id:mQ,name:"Lehim ve Havya",slug:"lehim-ve-havya",parent:D,is_landing_page:a,children:[{id:2883,name:"Lehim ve Havya Aletleri",slug:"lehim-ve-havya-aletleri",parent:mQ,is_landing_page:a,children:[]},{id:2884,name:"Lehim ve Havya Aksesuarları",slug:"lehim-ve-havya-aksesuarlari",parent:mQ,is_landing_page:a,children:[]}]},{id:e$,name:"Anahtarlar",slug:"anahtarlar",parent:D,is_landing_page:a,children:[{id:2886,name:"İngiliz Anahtarları",slug:"ingiliz-anahtarlari",parent:e$,is_landing_page:a,children:[]},{id:2887,name:"Yıldız Anahtarlar",slug:"yildiz-anahtarlar",parent:e$,is_landing_page:a,children:[]},{id:2888,name:"Allen Anahtarları",slug:"allen-anahtarlari",parent:e$,is_landing_page:a,children:[]},{id:2889,name:"Multi Anahtarlar",slug:"multi-anahtarlar",parent:e$,is_landing_page:a,children:[]},{id:2890,name:"Boru Anahtarları",slug:"boru-anahtarlari",parent:e$,is_landing_page:a,children:[]},{id:2891,name:"Tork anahtarları",slug:"tork-anahtarlari",parent:e$,is_landing_page:a,children:[]}]},{id:mR,name:"Lokma Takımları",slug:"lokma-takimlari",parent:D,is_landing_page:a,children:[{id:2893,name:"Lokma Anahtarları",slug:"lokma-anahtarlari",parent:mR,is_landing_page:a,children:[]},{id:2894,name:"Lokma Uçları",slug:"lokma-uclari",parent:mR,is_landing_page:a,children:[]}]},{id:jW,name:"Silikon Tabancaları",slug:"silikon-tabancalari",parent:D,is_landing_page:a,children:[{id:2896,name:"Mekanik Tabancalar",slug:"mekanik-tabancalar",parent:jW,is_landing_page:a,children:[]},{id:2897,name:"Elektrikli Tabancalar",slug:"elektrikli-tabancalar",parent:jW,is_landing_page:a,children:[]},{id:2898,name:"Silikon Aksesuarları",slug:"silikon-aksesuarlari",parent:jW,is_landing_page:a,children:[]}]},{id:2899,name:"Gönyeler",slug:"gonyeler",parent:D,is_landing_page:a,children:[]},{id:2900,name:"İşkenceler",slug:"iskenceler",parent:D,is_landing_page:a,children:[]},{id:2901,name:"Perçinler",slug:"percinler",parent:D,is_landing_page:a,children:[]},{id:2902,name:"Rendeler",slug:"rendeler",parent:D,is_landing_page:a,children:[]},{id:2903,name:"Baltalar",slug:"baltalar",parent:D,is_landing_page:a,children:[]},{id:2904,name:"El Zımparaları",slug:"el-zimparalari",parent:D,is_landing_page:a,children:[]},{id:2905,name:"Mengeneler",slug:"mengeneler",parent:D,is_landing_page:a,children:[]},{id:2906,name:"Basınç Düşürücüler",slug:"basinc-dusuruculer",parent:D,is_landing_page:a,children:[]},{id:mS,name:"Kesici Makaslar",slug:"kesici-makaslar",parent:D,is_landing_page:a,children:[{id:2908,name:"Sac ve Metal Kesme Makasları",slug:"sac-ve-metal-kesme-makaslari",parent:mS,is_landing_page:a,children:[]},{id:2909,name:"Boru Kesme Makasları",slug:"boru-kesme-makaslari",parent:mS,is_landing_page:a,children:[]}]}]},{id:V,name:jn,slug:Ji,parent:k,is_landing_page:a,children:[{id:fa,name:Jj,slug:Jk,parent:V,is_landing_page:a,children:[{id:2912,name:"Led Ampuller",slug:"led-ampuller",parent:fa,is_landing_page:a,children:[]},{id:2913,name:"Halojen Ampuller",slug:"halojen-ampuller",parent:fa,is_landing_page:a,children:[]},{id:2914,name:"Floresan Ampuller",slug:"floresan-ampuller",parent:fa,is_landing_page:a,children:[]},{id:2915,name:"Rustik Ampuller",slug:"rustik-ampuller",parent:fa,is_landing_page:a,children:[]},{id:2916,name:"Akıllı Ampuller",slug:"akilli-ampuller",parent:fa,is_landing_page:a,children:[]}]},{id:Jl,name:Jm,slug:Jn,parent:V,is_landing_page:a,children:[]},{id:Jo,name:Jp,slug:Jq,parent:V,is_landing_page:a,children:[]},{id:2928,name:"Spotlar",slug:"spotlar",parent:V,is_landing_page:a,children:[]},{id:2930,name:"Fenerler",slug:"fenerler",parent:V,is_landing_page:a,children:[]},{id:2931,name:"Işıldaklar",slug:"isildaklar",parent:V,is_landing_page:a,children:[]},{id:hX,name:Jr,slug:Js,parent:V,is_landing_page:a,children:[{id:2933,name:"Şerit Led",slug:"serit-led",parent:hX,is_landing_page:a,children:[]},{id:2934,name:"Şerit Led Trafosu",slug:"serit-led-trafosu",parent:hX,is_landing_page:a,children:[]},{id:2935,name:"Modül Led",slug:"modul-led",parent:hX,is_landing_page:a,children:[]}]},{id:2937,name:"Dış Mekan Aydınlatma Ürünleri",slug:"dis-mekan-aydinlatma-urunleri",parent:V,is_landing_page:a,children:[]},{id:Jt,name:Ju,slug:Jv,parent:V,is_landing_page:a,children:[]},{id:4195,name:"Sokak Aydınlatmaları",slug:"sokak-aydinlatmalari",parent:V,is_landing_page:a,children:[]}]},{id:B,name:Jw,slug:Jx,parent:k,is_landing_page:a,children:[{id:go,name:Jy,slug:Jz,parent:B,is_landing_page:a,children:[{id:2941,name:"Güneş Panelleri",slug:"gunes-panelleri",parent:go,is_landing_page:a,children:[]},{id:2942,name:"Güneş Paneli Yedek Parça",slug:"gunes-paneli-yedek-parca",parent:go,is_landing_page:a,children:[]},{id:7122,name:"Solar İnverter",slug:"solar-inverter",parent:go,is_landing_page:a,children:[]},{id:7126,name:"Solar Akü",slug:"solar-aku",parent:go,is_landing_page:a,children:[]}]},{id:JA,name:JB,slug:JC,parent:B,is_landing_page:a,children:[]},{id:2944,name:"Elektrik Aksesuarları",slug:"elektrik-aksesuarlari",parent:B,is_landing_page:a,children:[]},{id:2945,name:"Prizler",slug:"prizler",parent:B,is_landing_page:a,children:[]},{id:2946,name:"Fişler",slug:"fisler",parent:B,is_landing_page:a,children:[]},{id:jX,name:mg,slug:JD,parent:B,is_landing_page:a,children:[{id:2948,name:"Piller",slug:"piller",parent:jX,is_landing_page:a,children:[]},{id:2949,name:"Pil Şarj Cihazları",slug:"pil-sarj-cihazlari",parent:jX,is_landing_page:a,children:[]}]},{id:JE,name:"Sigorta Kutusu",slug:JF,parent:B,is_landing_page:a,children:[]},{id:JG,name:JH,slug:JI,parent:B,is_landing_page:a,children:[]},{id:JJ,name:JK,slug:JL,parent:B,is_landing_page:a,children:[]},{id:2953,name:"Kablo Makaraları",slug:"kablo-makaralari",parent:B,is_landing_page:a,children:[]},{id:JM,name:JN,slug:JO,parent:B,is_landing_page:a,children:[]},{id:2955,name:"Duylar",slug:"duylar",parent:B,is_landing_page:a,children:[]},{id:2956,name:"Klemensler",slug:"klemensler",parent:B,is_landing_page:a,children:[]},{id:JP,name:JQ,slug:JR,parent:B,is_landing_page:a,children:[]},{id:2958,name:"Sensörler ve Dedektörler",slug:"sensorler-ve-dedektorler",parent:B,is_landing_page:a,children:[]},{id:2959,name:"Nem ve Isı Ölçerler",slug:"nem-ve-isi-olcerler",parent:B,is_landing_page:a,children:[]},{id:2960,name:yD,slug:"elektrikve-tesisat-malzemeleri-adaptorleri",parent:B,is_landing_page:a,children:[]},{id:JS,name:JT,slug:JU,parent:B,is_landing_page:a,children:[]},{id:4202,name:"Sigortalar",slug:"sigortalar",parent:B,is_landing_page:a,children:[]}]},{id:bB,name:JV,slug:JW,parent:k,is_landing_page:a,children:[{id:gp,name:"Batarya ve Musluk",slug:"batarya-ve-musluk",parent:bB,is_landing_page:a,children:[{id:2964,name:"Banyo Bataryası",slug:"banyo-bataryasi",parent:gp,is_landing_page:a,children:[]},{id:2965,name:"Mutfak Bataryası",slug:"mutfak-bataryasi",parent:gp,is_landing_page:a,children:[]},{id:2966,name:"Ara Musluk",slug:"ara-musluk",parent:gp,is_landing_page:a,children:[]},{id:2967,name:"Fotoselli Bataryalar",slug:"fotoselli-bataryalar",parent:gp,is_landing_page:a,children:[]},{id:2968,name:"Pisuvar Musluğu",slug:"pisuvar-muslugu",parent:gp,is_landing_page:a,children:[]}]},{id:mT,name:"Duş Seti ve Duş Başlıkları",slug:"dus-seti-ve-dus-basliklari",parent:bB,is_landing_page:a,children:[{id:2970,name:"Duş Seti",slug:"dus-seti",parent:mT,is_landing_page:a,children:[]},{id:2971,name:"Duş Başlığı",slug:"dus-basligi",parent:mT,is_landing_page:a,children:[]}]},{id:gq,name:"Duş Sistemleri",slug:"dus-sistemleri",parent:bB,is_landing_page:a,children:[{id:2973,name:"Duşakabin",slug:"dusakabin",parent:gq,is_landing_page:a,children:[]},{id:2974,name:"Jakuzi",slug:"jakuzi",parent:gq,is_landing_page:a,children:[]},{id:2975,name:"Küvet",slug:"kuvet",parent:gq,is_landing_page:a,children:[]},{id:2976,name:"Duş Teknesi",slug:"dus-teknesi",parent:gq,is_landing_page:a,children:[]},{id:2977,name:"Duşakabin Yedek Parçaları",slug:"dusakabin-yedek-parcalari",parent:gq,is_landing_page:a,children:[]}]},{id:hY,name:"Tesisat Malzemeleri",slug:"tesisat-malzemeleri",parent:bB,is_landing_page:a,children:[{id:2979,name:"Lavabo Sifonu",slug:"lavabo-sifonu",parent:hY,is_landing_page:a,children:[]},{id:2980,name:"Duş Kanalı",slug:"dus-kanali",parent:hY,is_landing_page:a,children:[]},{id:2981,name:"Körüklü Kada",slug:"koruklu-kada",parent:hY,is_landing_page:a,children:[]},{id:2982,name:"Muhtelif Ürünler",slug:"muhtelif-urunler",parent:hY,is_landing_page:a,children:[]}]},{id:2983,name:"Lavabo",slug:"lavabo",parent:bB,is_landing_page:a,children:[]},{id:2984,name:"Eviye",slug:"eviye",parent:bB,is_landing_page:a,children:[]},{id:2985,name:"Klozet",slug:"klozet",parent:bB,is_landing_page:a,children:[]},{id:2986,name:"Klozet Kapağı",slug:"klozet-kapagi",parent:bB,is_landing_page:a,children:[]},{id:2987,name:"Pisuar",slug:"pisuar",parent:bB,is_landing_page:a,children:[]},{id:2988,name:"El Kurutma Makinesi",slug:"el-kurutma-makinesi",parent:bB,is_landing_page:a,children:[]},{id:2989,name:"Banyo Aspiratörü",slug:"banyo-aspiratoru",parent:bB,is_landing_page:a,children:[]}]},{id:mU,name:"Banyo Ürünleri",slug:"banyo-urunleri",parent:k,is_landing_page:a,children:[{id:mV,name:"Rezervuar Sistemleri",slug:"rezervuar-sistemleri",parent:mU,is_landing_page:a,children:[{id:2992,name:"Rezervuar",slug:"rezervuar",parent:mV,is_landing_page:a,children:[]},{id:2993,name:"Rezervuar İç Takımlar",slug:"rezervuar-ic-takimlar",parent:mV,is_landing_page:a,children:[]}]},{id:2994,name:"Çöp Kovaları",slug:"cop-kovalari",parent:mU,is_landing_page:a,children:[]}]},{id:v,name:"Hırdavat Ürünleri",slug:JX,parent:k,is_landing_page:a,children:[{id:hZ,name:JY,slug:JZ,parent:v,is_landing_page:a,children:[{id:2997,name:"Pvc Kapı",slug:"pvc-kapi",parent:hZ,is_landing_page:a,children:[]},{id:2998,name:"Pvc Pencere",slug:"pvc-pencere",parent:hZ,is_landing_page:a,children:[]},{id:2999,name:"Pvc Aksesuarları",slug:"pvc-aksesuarlari",parent:hZ,is_landing_page:a,children:[]}]},{id:mW,name:"Çelik ve Demir Kapılar",slug:"celik-ve-demir-kapilar",parent:v,is_landing_page:a,children:[{id:3001,name:"Çelik Kapılar",slug:"celik-kapilar",parent:mW,is_landing_page:a,children:[]},{id:3002,name:"Demir ve Ferforje Kapılar",slug:"demir-ve-ferforje-kapilar",parent:mW,is_landing_page:a,children:[]}]},{id:gr,name:kT,slug:J_,parent:v,is_landing_page:a,children:[{id:3004,name:"Panel Radyatörler",slug:"panel-radyatorler",parent:gr,is_landing_page:a,children:[]},{id:3005,name:"Alüminyum Radyatörler",slug:"aluminyum-radyatorler",parent:gr,is_landing_page:a,children:[]},{id:3006,name:"Havlupan Radyatörler",slug:"havlupan-radyatorler",parent:gr,is_landing_page:a,children:[]},{id:3007,name:"Radyatör Sarf Malzemeleri",slug:"radyator-sarf-malzemeleri",parent:gr,is_landing_page:a,children:[]}]},{id:3008,name:"Menfez ve Havalandırmalar",slug:"menfez-ve-havalandirmalar",parent:v,is_landing_page:a,children:[]},{id:3009,name:"Bağlantı Elemanları",slug:"baglanti-elemanlari",parent:v,is_landing_page:a,children:[]},{id:3010,name:"Yağdanlık",slug:"yagdanlik",parent:v,is_landing_page:a,children:[]},{id:mX,name:"Takım Arabaları ve dolapları",slug:"takim-arabalari-ve-dolaplari",parent:v,is_landing_page:a,children:[{id:3012,name:"Takım Arabaları",slug:"takim-arabalari",parent:mX,is_landing_page:a,children:[]},{id:3013,name:"Takım Dolapları",slug:"takim-dolaplari",parent:mX,is_landing_page:a,children:[]}]},{id:3014,name:"Genel Bakım Spreyleri",slug:"genel-bakim-spreyleri",parent:v,is_landing_page:a,children:[]},{id:3015,name:"Posta Kutuları",slug:"posta-kutulari",parent:v,is_landing_page:a,children:[]},{id:dv,name:"Mobilya Hırdavatları",slug:"mobilya-hirdavatlari",parent:v,is_landing_page:a,children:[{id:3017,name:"Tekerlekler",slug:"tekerlekler",parent:dv,is_landing_page:a,children:[]},{id:3018,name:"Mobilya Kulpları",slug:"mobilya-kulplari",parent:dv,is_landing_page:a,children:[]},{id:3019,name:"Çekmece Rayları",slug:"cekmece-raylari",parent:dv,is_landing_page:a,children:[]},{id:3020,name:"Mobilya Kilitleri",slug:"mobilya-kilitleri",parent:dv,is_landing_page:a,children:[]},{id:3021,name:"Ayaklar",slug:"ayaklar",parent:dv,is_landing_page:a,children:[]},{id:3022,name:"Mobilya Menteşeleri",slug:"mobilya-menteseleri",parent:dv,is_landing_page:a,children:[]},{id:3023,name:"Mobilya Bağlantı Elemanları",slug:"mobilya-baglanti-elemanlari",parent:dv,is_landing_page:a,children:[]},{id:3024,name:"Keçe ve Tapalar",slug:"kece-ve-tapalar",parent:dv,is_landing_page:a,children:[]}]},{id:3025,name:"Tesisat Hırdavat Ürünleri",slug:"tesisat-hirdavat-urunleri",parent:v,is_landing_page:a,children:[]},{id:3026,name:"Silikonlar",slug:"silikonlar",parent:v,is_landing_page:a,children:[]},{id:3027,name:"Ambalaj ve Paketleme Malzemeleri",slug:"ambalaj-ve-paketleme-malzemeleri",parent:v,is_landing_page:a,children:[]},{id:jY,name:J$,slug:Ka,parent:v,is_landing_page:a,children:[{id:3029,name:"Avadanlıklar",slug:"avadanliklar",parent:jY,is_landing_page:a,children:[]},{id:3030,name:Fc,slug:"takim-cantasi",parent:jY,is_landing_page:a,children:[]}]},{id:Kb,name:Kc,slug:Kd,parent:v,is_landing_page:a,children:[]},{id:jZ,name:"Vida, Çivi ve Dübeller",slug:"vida-civi-ve-dubeller",parent:v,is_landing_page:a,children:[{id:3033,name:"Vidalar",slug:"vidalar",parent:jZ,is_landing_page:a,children:[]},{id:3034,name:"Çiviler",slug:"civiler",parent:jZ,is_landing_page:a,children:[]},{id:3035,name:"Dübeller",slug:"dubeller",parent:jZ,is_landing_page:a,children:[]}]},{id:j_,name:"Kapı ve Kapı Hırdavatları",slug:"kapi-ve-kapi-hirdavatlari",parent:v,is_landing_page:a,children:[{id:3037,name:"Kapı Hidrolikleri",slug:"kapi-hidrolikleri",parent:j_,is_landing_page:a,children:[]},{id:3038,name:"Kapı Stoperleri",slug:"kapi-stoperleri",parent:j_,is_landing_page:a,children:[]},{id:3039,name:"Kapı Hırdavatı",slug:"kapi-hirdavati",parent:j_,is_landing_page:a,children:[]}]},{id:mY,name:"Yapıştırıcı ve Bantlar",slug:"yapistirici-ve-bantlar",parent:v,is_landing_page:a,children:[{id:3041,name:"Yapıştırıcılar",slug:"yapistiricilar",parent:mY,is_landing_page:a,children:[]},{id:3042,name:"Bantlar",slug:"bantlar",parent:mY,is_landing_page:a,children:[]}]},{id:3043,name:"Derz Ürünleri",slug:"derz-urunleri",parent:v,is_landing_page:a,children:[]},{id:3044,name:"Rötuş ve İşaretleme Kalemleri",slug:"rotus-ve-isaretleme-kalemleri",parent:v,is_landing_page:a,children:[]},{id:4182,name:"Sanayi Tipi Fanlar",slug:"sanayi-tipi-fanlar",parent:v,is_landing_page:a,children:[]},{id:4184,name:"Sanayi Tipi Pompalar",slug:"sanayi-tipi-pompalar",parent:v,is_landing_page:a,children:[]},{id:4193,name:"Spanzet ve Halatlar",slug:"spanzet-ve-halatlar",parent:v,is_landing_page:a,children:[]},{id:4199,name:"Pvc Borular",slug:"pvc-borular",parent:v,is_landing_page:a,children:[]},{id:4206,name:"Nem Alıcılar",slug:"nem-alicilar",parent:v,is_landing_page:a,children:[]},{id:6538,name:"Mıknatıslar",slug:"miknatislar",parent:v,is_landing_page:a,children:[]}]},{id:cT,name:"Güvenlik Ürünleri",slug:"guvenlik-urunleri",parent:k,is_landing_page:a,children:[{id:cU,name:"İş Güvenliği Ürünleri",slug:"is-guvenligi-urunleri",parent:cT,is_landing_page:a,children:[{id:3047,name:"İş ayakkabısı ve Çizmeler",slug:"is-ayakkabisi-ve-cizmeler",parent:cU,is_landing_page:a,children:[]},{id:3048,name:"Baretler",slug:"baretler",parent:cU,is_landing_page:a,children:[]},{id:3049,name:mz,slug:"is-gunvenlik-eldiveni",parent:cU,is_landing_page:a,children:[]},{id:3050,name:"Gözlükler",slug:"gozlukler",parent:cU,is_landing_page:a,children:[]},{id:3051,name:iH,slug:"is-gunvenlik-kulakligi",parent:cU,is_landing_page:a,children:[]},{id:3052,name:lJ,slug:"is-gunvenlik-maskesi",parent:cU,is_landing_page:a,children:[]},{id:3053,name:"İş Elbiseleri",slug:"is-elbiseleri",parent:cU,is_landing_page:a,children:[]},{id:3054,name:"Uyarı ve Yönlendirme Ürünleri",slug:"uyari-ve-yonlendirme-urunleri",parent:cU,is_landing_page:a,children:[]},{id:3055,name:"İş Güvenlik Setleri",slug:"is-guvenlik-setleri",parent:cU,is_landing_page:a,children:[]}]},{id:3056,name:"Tıppi Atık Kovaları",slug:"tippi-atik-kovalari",parent:cT,is_landing_page:a,children:[]},{id:3057,name:"Geri Dönüşüm Kovaları",slug:"geri-donusum-kovalari",parent:cT,is_landing_page:a,children:[]},{id:gs,name:"Kilitler",slug:"kilitler",parent:cT,is_landing_page:a,children:[{id:3059,name:"Asma Kilitler",slug:"asma-kilitler",parent:gs,is_landing_page:a,children:[]},{id:3060,name:"Barel Kilitler",slug:"barel-kilitler",parent:gs,is_landing_page:a,children:[]},{id:3061,name:"Tirajlı Kilitler",slug:"tirajli-kilitler",parent:gs,is_landing_page:a,children:[]},{id:3062,name:"Bisiklet ve Motosiklet Kilitleri",slug:"bisiklet-ve-motosiklet-kilitleri",parent:gs,is_landing_page:a,children:[]},{id:3063,name:"Gömme Kilitler",slug:"gomme-kilitler",parent:gs,is_landing_page:a,children:[]}]},{id:mZ,name:"Güvenlik Sistemleri",slug:"guvenlik-sistemleri",parent:cT,is_landing_page:a,children:[{id:3065,name:kW,slug:"alarm-sistemi",parent:mZ,is_landing_page:a,children:[]},{id:3066,name:"Kapı Geçiş Sistemleri",slug:"kapi-gecis-sistemleri",parent:mZ,is_landing_page:a,children:[]}]},{id:3067,name:"Diafon Sistemleri",slug:"diafon-sistemleri",parent:cT,is_landing_page:a,children:[]},{id:3068,name:"Çelik Para Kasaları",slug:"celik-para-kasalari",parent:cT,is_landing_page:a,children:[]},{id:3069,name:"Yangın Söndürme Ürünleri",slug:"yangin-sondurme-urunleri",parent:cT,is_landing_page:a,children:[]},{id:3070,name:"Yangın Dolapları",slug:"yangin-dolaplari",parent:cT,is_landing_page:a,children:[]}]},{id:gt,name:"Reklam ve Tanıtım Ürünleri",slug:"reklam-ve-tanitim-urunleri",parent:k,is_landing_page:a,children:[{id:3072,name:"Tabelalar",slug:"tabelalar",parent:gt,is_landing_page:a,children:[]},{id:3073,name:"Dubalar",slug:"dubalar",parent:gt,is_landing_page:a,children:[]},{id:3074,name:"Bayraklar",slug:"bayraklar",parent:gt,is_landing_page:a,children:[]},{id:3075,name:"Standlar",slug:"standlar",parent:gt,is_landing_page:a,children:[]},{id:3076,name:"Roll Up",slug:"roll-up",parent:gt,is_landing_page:a,children:[]}]},{id:eq,name:Ke,slug:Kf,parent:k,is_landing_page:a,children:[{id:j$,name:"Seramik ve Yer Döşemeleri",slug:"seramik-ve-yer-dosemeleri",parent:eq,is_landing_page:a,children:[{id:3079,name:"Seramikler",slug:"seramikler",parent:j$,is_landing_page:a,children:[]},{id:3080,name:"Karolar",slug:"karolar",parent:j$,is_landing_page:a,children:[]},{id:3081,name:"Parke ve Ahşaplar",slug:"parke-ve-ahsaplar",parent:j$,is_landing_page:a,children:[]}]},{id:ka,name:"Yalıtım Malzemeleri",slug:"yalitim-malzemeleri",parent:eq,is_landing_page:a,children:[{id:3083,name:"Isı Yalıtımı",slug:"isi-yalitimi",parent:ka,is_landing_page:a,children:[]},{id:3084,name:"Ses Yalıtımı",slug:"ses-yalitimi",parent:ka,is_landing_page:a,children:[]},{id:3085,name:"Su Yalıtımı",slug:"su-yalitimi",parent:ka,is_landing_page:a,children:[]}]},{id:3086,name:"Duvar ve Cephe Kaplama Ürünleri",slug:"duvar-ve-cephe-kaplama-urunleri",parent:eq,is_landing_page:a,children:[]},{id:3087,name:"Usta Malzemeleri",slug:"usta-malzemeleri",parent:eq,is_landing_page:a,children:[]},{id:3088,name:"Tavan Kaplama Ürünleri",slug:"tavan-kaplama-urunleri",parent:eq,is_landing_page:a,children:[]},{id:3089,name:"İnşaat Makineleri",slug:"insaat-makineleri",parent:eq,is_landing_page:a,children:[]}]},{id:kb,name:"Endüstriyel Ekipmanlar",slug:"endustriyel-ekipmanlar",parent:k,is_landing_page:a,children:[{id:3091,name:"Temizlik Kimyasalları",slug:"temizlik-kimyasallari",parent:kb,is_landing_page:a,children:[]},{id:3092,name:"Temizlik Aksesuarları",slug:"temizlik-aksesuarlari",parent:kb,is_landing_page:a,children:[]},{id:3093,name:"Endüstriyel Makineler",slug:"endustriyel-makineler",parent:kb,is_landing_page:a,children:[]}]},{id:kc,name:Kg,slug:Kh,parent:k,is_landing_page:a,children:[{id:3095,name:"Benzinli Jeneratörler",slug:"benzinli-jeneratorler",parent:kc,is_landing_page:a,children:[]},{id:3096,name:"Dizel Jeneratörler",slug:"dizel-jeneratorler",parent:kc,is_landing_page:a,children:[]}]},{id:er,name:Ki,slug:Kj,parent:k,is_landing_page:a,children:[{id:fb,name:"Duvar Boyaları",slug:"duvar-boyalari",parent:er,is_landing_page:a,children:[{id:3099,name:"İç cephe Boyaları",slug:"ic-cephe-boyalari",parent:fb,is_landing_page:a,children:[]},{id:3100,name:"Dış Cephe Boyaları",slug:"dis-cephe-boyalari",parent:fb,is_landing_page:a,children:[]},{id:3101,name:"Tavan Boyaları",slug:"tavan-boyalari",parent:fb,is_landing_page:a,children:[]},{id:3102,name:"Yalıtım Boyaları",slug:"yalitim-boyalari",parent:fb,is_landing_page:a,children:[]},{id:3103,name:"Astarlar",slug:"astarlar",parent:fb,is_landing_page:a,children:[]},{id:3104,name:"Boya Renklendiriciler",slug:"boya-renklendiriciler",parent:fb,is_landing_page:a,children:[]}]},{id:3105,name:"Sprey Boyalar",slug:"sprey-boyalar",parent:er,is_landing_page:a,children:[]},{id:kd,name:"Fırça, Rulo ve Aksesuarlar",slug:"firca-rulo-ve-aksesuarlar",parent:er,is_landing_page:a,children:[{id:3107,name:"Fırçalar",slug:"fircalar",parent:kd,is_landing_page:a,children:[]},{id:3108,name:"Rulolar",slug:"rulolar",parent:kd,is_landing_page:a,children:[]},{id:3109,name:"Yardımcı Malzemeler",slug:"yardimci-malzemeler",parent:kd,is_landing_page:a,children:[]}]},{id:3110,name:"Boya İncelticiler",slug:"boya-incelticiler",parent:er,is_landing_page:a,children:[]},{id:4187,name:"Vernikler",slug:"vernikler",parent:er,is_landing_page:a,children:[]},{id:4204,name:"Boya Tabancaları",slug:"boya-tabancalari",parent:er,is_landing_page:a,children:[]}]},{id:ar,name:Kk,slug:Kl,parent:k,is_landing_page:a,children:[{id:3112,name:"Metal Dedektörleri",slug:"metal-dedektorleri",parent:ar,is_landing_page:a,children:[]},{id:3113,name:"Kumpas",slug:"kumpas",parent:ar,is_landing_page:a,children:[]},{id:3114,name:"Lazermetre",slug:"lazermetre",parent:ar,is_landing_page:a,children:[]},{id:3115,name:"Metre",slug:"metre",parent:ar,is_landing_page:a,children:[]},{id:3116,name:"Mikrometre",slug:"mikrometre",parent:ar,is_landing_page:a,children:[]},{id:3117,name:"Termometreler",slug:"termometreler",parent:ar,is_landing_page:a,children:[]},{id:3118,name:"Açı Ölçerler",slug:"aci-olcerler",parent:ar,is_landing_page:a,children:[]},{id:3119,name:"Gaz Ölçer",slug:"gaz-olcer",parent:ar,is_landing_page:a,children:[]},{id:3120,name:"Hassas Terazi",slug:"hassas-terazi",parent:ar,is_landing_page:a,children:[]},{id:3121,name:"Higrometre",slug:"higrometre",parent:ar,is_landing_page:a,children:[]},{id:3122,name:"Multimetre",slug:"multimetre",parent:ar,is_landing_page:a,children:[]},{id:3123,name:"Kontrol Kalemi",slug:"kontrol-kalemi",parent:ar,is_landing_page:a,children:[]},{id:3124,name:"Pensampermetre",slug:"pensampermetre",parent:ar,is_landing_page:a,children:[]},{id:3125,name:"Test Cihazları",slug:"test-cihazlari",parent:ar,is_landing_page:a,children:[]},{id:3126,name:"Voltmetre",slug:"voltmetre",parent:ar,is_landing_page:a,children:[]},{id:4191,name:"Manometre",slug:"manometre",parent:ar,is_landing_page:a,children:[]}]},{id:ad,name:m_,slug:m$,parent:k,is_landing_page:a,children:[{id:ke,name:"Çim Biçme Makineleri",slug:"cim-bicme-makineleri",parent:ad,is_landing_page:a,children:[{id:3129,name:"Elektrikli Çim Biçme Makineleri",slug:"elektrikli-cim-bicme-makineleri",parent:ke,is_landing_page:a,children:[]},{id:3130,name:"Benzinli Çim Biçme Makineleri",slug:"benzinli-cim-bicme-makineleri",parent:ke,is_landing_page:a,children:[]},{id:3131,name:"Akülü Çim Biçme Makineleri",slug:"akulu-cim-bicme-makineleri",parent:ke,is_landing_page:a,children:[]}]},{id:na,name:"Çapa Makineleri",slug:"capa-makineleri",parent:ad,is_landing_page:a,children:[{id:3133,name:"Benzinli Çapa Makineleri",slug:"benzinli-capa-makineleri",parent:na,is_landing_page:a,children:[]},{id:3134,name:"Dizel Çapa Makineleri",slug:"dizel-capa-makineleri",parent:na,is_landing_page:a,children:[]}]},{id:kf,name:"Zincirli Ağaç Kesme Makineleri",slug:"zincirli-agac-kesme-makineleri",parent:ad,is_landing_page:a,children:[{id:3136,name:"Zincirli Ağaç Kesmeler",slug:"zincirli-agac-kesmeler",parent:kf,is_landing_page:a,children:[]},{id:3137,name:"Elektrikli Ağaç Kesmeler",slug:"elektrikli-agac-kesmeler",parent:kf,is_landing_page:a,children:[]},{id:3138,name:"Akülü Ağaç Kesmeler",slug:"akulu-agac-kesmeler",parent:kf,is_landing_page:a,children:[]}]},{id:nb,name:"Tırpanlar",slug:"tirpanlar",parent:ad,is_landing_page:a,children:[{id:3140,name:"Elektrikli Tırpanlar",slug:"elektrikli-tirpanlar",parent:nb,is_landing_page:a,children:[]},{id:3141,name:"Benzinli Tırpanlar",slug:"benzinli-tirpanlar",parent:nb,is_landing_page:a,children:[]}]},{id:fc,name:"Su Motorları ve Pompalar",slug:"su-motorlari-ve-pompalar",parent:ad,is_landing_page:a,children:[{id:3143,name:"Dalgıç Pompalar",slug:"dalgic-pompalar",parent:fc,is_landing_page:a,children:[]},{id:3144,name:"Santrifüj Pompalar",slug:"santrifuj-pompalar",parent:fc,is_landing_page:a,children:[]},{id:3145,name:"Su Motorları",slug:"su-motorlari",parent:fc,is_landing_page:a,children:[]},{id:3146,name:"Hidroforlar",slug:"hidroforlar",parent:fc,is_landing_page:a,children:[]},{id:3147,name:"Bahçe Pompaları",slug:"bahce-pompalari",parent:fc,is_landing_page:a,children:[]},{id:3148,name:kM,slug:"su-motoru-ve-su-pompasi-yedek-parcalari",parent:fc,is_landing_page:a,children:[]}]},{id:kg,name:"Çit Kesme Makineleri",slug:"cit-kesme-makineleri",parent:ad,is_landing_page:a,children:[{id:3150,name:"Elektrikli Çit Kesme Makineleri",slug:"elektrikli-cit-kesme-makineleri",parent:kg,is_landing_page:a,children:[]},{id:3151,name:"Benzinli Çit Kesme Makineleri",slug:"benzinli-cit-kesme-makineleri",parent:kg,is_landing_page:a,children:[]},{id:3152,name:"Akülü Çit Kesme Makineleri",slug:"akulu-cit-kesme-makineleri",parent:kg,is_landing_page:a,children:[]}]},{id:kh,name:"Dal Budama Makineleri",slug:"dal-budama-makineleri",parent:ad,is_landing_page:a,children:[{id:3154,name:"Elektrikli Dal Budama Makineleri",slug:"elektrikli-dal-budama-makineleri",parent:kh,is_landing_page:a,children:[]},{id:3155,name:"Benzinli Dal Budama Makineleri",slug:"benzinli-dal-budama-makineleri",parent:kh,is_landing_page:a,children:[]},{id:3156,name:"Akülü Dal Budama Makineleri",slug:"akulu-dal-budama-makineleri",parent:kh,is_landing_page:a,children:[]}]},{id:3157,name:"Yaprak ve Dal Öğütme Makineleri",slug:"yaprak-ve-dal-ogutme-makineleri",parent:ad,is_landing_page:a,children:[]},{id:3158,name:"Hasat Makineleri",slug:"hasat-makineleri",parent:ad,is_landing_page:a,children:[]},{id:3159,name:"Toprak Burgu Makineleri",slug:"toprak-burgu-makineleri",parent:ad,is_landing_page:a,children:[]},{id:3160,name:"Yaprak Toplama ve Üfleme Makineleri",slug:"yaprak-toplama-ve-ufleme-makineleri",parent:ad,is_landing_page:a,children:[]},{id:3161,name:"Çim Havalandırma Makineleri",slug:"cim-havalandirma-makineleri",parent:ad,is_landing_page:a,children:[]},{id:3162,name:"Çim Biçme Makasları",slug:"cim-bicme-makaslari",parent:ad,is_landing_page:a,children:[]},{id:3163,name:"Makine Yağları ve Aksesuarları",slug:"makine-yaglari-ve-aksesuarlari",parent:ad,is_landing_page:a,children:[]},{id:h_,name:"İlaçlama ve Sisleme Makineleri",slug:"ilaclama-ve-sisleme-makineleri",parent:ad,is_landing_page:a,children:[{id:3165,name:"Benzinli İlaçlama Makineleri",slug:"benzinli-ilaclama-makineleri",parent:h_,is_landing_page:a,children:[]},{id:3166,name:"Akülü İlaçlama Makineleri",slug:"akulu-ilaclama-makineleri",parent:h_,is_landing_page:a,children:[]},{id:3167,name:"Mekanik İlaçlama Makineleri",slug:"mekanik-ilaclama-makineleri",parent:h_,is_landing_page:a,children:[]},{id:3168,name:"Sisleme Makineleri",slug:"sisleme-makineleri",parent:h_,is_landing_page:a,children:[]}]},{id:3169,name:"Zincir Bileme Makineleri",slug:"zincir-bileme-makineleri",parent:ad,is_landing_page:a,children:[]},{id:nc,name:"Makine Yedek Parçaları",slug:"makine-yedek-parcalari",parent:ad,is_landing_page:a,children:[{id:3171,name:"Motorlar",slug:"motorlar",parent:nc,is_landing_page:a,children:[]},{id:3172,name:"Yedek Parça ve Aksesuarlar",slug:"yedek-parca-ve-aksesuarlar",parent:nc,is_landing_page:a,children:[]}]},{id:nd,name:"Basınçlı Yıkama Makineleri",slug:"basincli-yikama-makineleri",parent:ad,is_landing_page:a,children:[{id:3174,name:"Yıkama Makineleri",slug:"yikama-makineleri",parent:nd,is_landing_page:a,children:[]},{id:3175,name:"Yıkama Makinesi Aksesuarları",slug:"yikama-makinesi-aksesuarlari",parent:nd,is_landing_page:a,children:[]}]}]},{id:bU,name:Km,slug:Kn,parent:k,is_landing_page:a,children:[{id:3177,name:"Bahçe Setleri",slug:"bahce-setleri",parent:bU,is_landing_page:a,children:[]},{id:3178,name:"Budama Makasları",slug:"budama-makaslari",parent:bU,is_landing_page:a,children:[]},{id:3179,name:"Budama Testereleri",slug:"budama-testereleri",parent:bU,is_landing_page:a,children:[]},{id:ne,name:"Kazma ve Kürekler",slug:"kazma-ve-kurekler",parent:bU,is_landing_page:a,children:[{id:3181,name:Fh,slug:"kazma",parent:ne,is_landing_page:a,children:[]},{id:3182,name:DY,slug:"kurek",parent:ne,is_landing_page:a,children:[]}]},{id:3183,name:"Tırmık",slug:"tirmik",parent:bU,is_landing_page:a,children:[]},{id:3184,name:"El Çapaları",slug:"el-capalari",parent:bU,is_landing_page:a,children:[]},{id:3185,name:"Fide Dikici ve Sökücüler",slug:"fide-dikici-ve-sokuculer",parent:bU,is_landing_page:a,children:[]},{id:3186,name:"Alet Sapları",slug:"alet-saplari",parent:bU,is_landing_page:a,children:[]},{id:3187,name:"Bahçe Orakları",slug:"bahce-oraklari",parent:bU,is_landing_page:a,children:[]},{id:ki,name:"Aşı Ekipmanları",slug:"asi-ekipmanlari",parent:bU,is_landing_page:a,children:[{id:3189,name:"Aşı Makası",slug:"asi-makasi",parent:ki,is_landing_page:a,children:[]},{id:3190,name:"Aşı Bantları",slug:"asi-bantlari",parent:ki,is_landing_page:a,children:[]},{id:3191,name:"Aşı Macunları",slug:"asi-macunlari",parent:ki,is_landing_page:a,children:[]}]}]},{id:fd,name:"Bahçe Sulama Ekipmanları",slug:Ko,parent:k,is_landing_page:a,children:[{id:3193,name:"Hortum ve Toplama Ürünleri",slug:"hortum-ve-toplama-urunleri",parent:fd,is_landing_page:a,children:[]},{id:3194,name:"Sulama Başlıkları",slug:"sulama-basliklari",parent:fd,is_landing_page:a,children:[]},{id:3195,name:"Hortum Bağlantıları",slug:"hortum-baglantilari",parent:fd,is_landing_page:a,children:[]},{id:3196,name:"Fıskiyeler",slug:"fiskiyeler",parent:fd,is_landing_page:a,children:[]},{id:3197,name:"Su Zamanlayıcıları",slug:"su-zamanlayicilari",parent:fd,is_landing_page:a,children:[]}]},{id:bC,name:Kp,slug:Kq,parent:k,is_landing_page:a,children:[{id:3213,name:"Saksılar",slug:"saksilar",parent:bC,is_landing_page:a,children:[]},{id:gu,name:"Tohumlar",slug:"tohumlar",parent:bC,is_landing_page:a,children:[{id:3215,name:"Çiçek Tohumları",slug:"cicek-tohumlari",parent:gu,is_landing_page:a,children:[]},{id:3216,name:"Meyve Tohumları",slug:"meyve-tohumlari",parent:gu,is_landing_page:a,children:[]},{id:3217,name:"Sebze Tohumları",slug:"sebze-tohumlari",parent:gu,is_landing_page:a,children:[]},{id:3218,name:"Bitki Tohumları",slug:"bitki-tohumlari",parent:gu,is_landing_page:a,children:[]},{id:3219,name:"Çim Tohumları",slug:"cim-tohumlari",parent:gu,is_landing_page:a,children:[]}]},{id:nf,name:"Torf ve Topraklar",slug:"torf-ve-topraklar",parent:bC,is_landing_page:a,children:[{id:3221,name:"Torflar",slug:"torflar",parent:nf,is_landing_page:a,children:[]},{id:3222,name:"Topraklar",slug:"topraklar",parent:nf,is_landing_page:a,children:[]}]},{id:3223,name:"Canlı Çiçekler",slug:"canli-cicekler",parent:bC,is_landing_page:a,children:[]},{id:kj,name:"Fideler",slug:"fideler",parent:bC,is_landing_page:a,children:[{id:3225,name:"Meyve Fideleri",slug:"meyve-fideleri",parent:kj,is_landing_page:a,children:[]},{id:3226,name:"Sebze Fideleri",slug:"sebze-fideleri",parent:kj,is_landing_page:a,children:[]},{id:3227,name:"Çiçek Fideleri",slug:"cicek-fideleri",parent:kj,is_landing_page:a,children:[]}]},{id:h$,name:"Bitki Besinleri ve Gübreler",slug:"bitki-besinleri-ve-gubreler",parent:bC,is_landing_page:a,children:[{id:3229,name:"Katı Gübreler",slug:"kati-gubreler",parent:h$,is_landing_page:a,children:[]},{id:3230,name:"Sıvı Gübreler",slug:"sivi-gubreler",parent:h$,is_landing_page:a,children:[]},{id:3231,name:"Toprak Katkı Ürünleri",slug:"toprak-katki-urunleri",parent:h$,is_landing_page:a,children:[]},{id:3232,name:"Zararlı Ot Kimyasalları",slug:"zararli-ot-kimyasallari",parent:h$,is_landing_page:a,children:[]}]},{id:3233,name:"Bonsai ve Hobi Bitkileri",slug:"bonsai-ve-hobi-bitkileri",parent:bC,is_landing_page:a,children:[]},{id:3234,name:"Dış Mekan ve Sarmaşık Bitkiler",slug:"dis-mekan-ve-sarmasik-bitkiler",parent:bC,is_landing_page:a,children:[]},{id:3235,name:"Sera ve Sera Ekipmanları",slug:"sera-ve-sera-ekipmanlari",parent:bC,is_landing_page:a,children:[]},{id:3236,name:"Teraryum ve Sukulentler",slug:"teraryum-ve-sukulentler",parent:bC,is_landing_page:a,children:[]},{id:3237,name:"Solmayan Güller",slug:"solmayan-guller",parent:bC,is_landing_page:a,children:[]}]},{id:fe,name:Kr,slug:Ks,parent:k,is_landing_page:a,children:[{id:3240,name:"Çiftlik Hayvan Yemleri",slug:"ciftlik-hayvan-yemleri",parent:fe,is_landing_page:a,children:[]},{id:3241,name:"Hayvan Bakım Ürünleri",slug:"hayvan-bakim-urunleri",parent:fe,is_landing_page:a,children:[]},{id:3242,name:"Kümes Hayvanları Ekipmanları",slug:"kumes-hayvanlari-ekipmanlari",parent:fe,is_landing_page:a,children:[]},{id:3243,name:"Arıcılık Ekipmanları",slug:"aricilik-ekipmanlari",parent:fe,is_landing_page:a,children:[]},{id:3244,name:"Hayvancılık Ekipmanları",slug:"hayvancilik-ekipmanlari",parent:fe,is_landing_page:a,children:[]}]},{id:ia,name:Kt,slug:Ku,parent:k,is_landing_page:a,children:[{id:3246,name:"Haşere ve Fare Kovucular",slug:"hasere-ve-fare-kovucular",parent:ia,is_landing_page:a,children:[]},{id:3247,name:"Sinek ve Sivrisinek Kovucular",slug:"sinek-ve-sivrisinek-kovucular",parent:ia,is_landing_page:a,children:[]},{id:3248,name:"Büyük Hayvan Kovucular",slug:"buyuk-hayvan-kovucular",parent:ia,is_landing_page:a,children:[]}]},{id:es,name:Kv,slug:Kw,parent:k,is_landing_page:a,children:[{id:3250,name:"Mangallar",slug:"mangallar",parent:es,is_landing_page:a,children:[]},{id:3251,name:"Mangal Aksesuarları",slug:"mangal-aksesuarlari",parent:es,is_landing_page:a,children:[]},{id:3252,name:"Piknik Setleri",slug:"piknik-setleri",parent:es,is_landing_page:a,children:[]},{id:3253,name:oI,slug:"semaver",parent:es,is_landing_page:a,children:[]},{id:3254,name:"Nargile ve Aksesuarları",slug:"nargile-ve-aksesuarlari",parent:es,is_landing_page:a,children:[]},{id:4190,name:"Mangal Kömürü",slug:"mangal-komuru",parent:es,is_landing_page:a,children:[]}]},{id:gv,name:Kx,slug:Ky,parent:k,is_landing_page:a,children:[{id:3256,name:"Dekoratif Ürünler",slug:"dekoratif-urunler",parent:gv,is_landing_page:a,children:[]},{id:3257,name:"Yapay Çim ve Halılar",slug:"yapay-cim-ve-halilar",parent:gv,is_landing_page:a,children:[]},{id:3258,name:"Çitler",slug:"citler",parent:gv,is_landing_page:a,children:[]},{id:3259,name:"Çöp Kovaları ve Konteyner",slug:"cop-kovalari-ve-konteyner",parent:gv,is_landing_page:a,children:[]}]},{id:ff,name:"Havuz Ürünleri",slug:"havuz-urunleri",parent:k,is_landing_page:a,children:[{id:3261,name:"Havuz Temizlik Malzemeleri ve Kimyasalları",slug:"havuz-temizlik-malzemeleri-ve-kimyasallari",parent:ff,is_landing_page:a,children:[]},{id:3262,name:"Havuz Dekorasyonu",slug:"havuz-dekorasyonu",parent:ff,is_landing_page:a,children:[]},{id:3263,name:"Havuz Temizlik Makineleri",slug:"havuz-temizlik-makineleri",parent:ff,is_landing_page:a,children:[]},{id:3264,name:"Havuz Isıtma Ekipmanları",slug:"havuz-isitma-ekipmanlari",parent:ff,is_landing_page:a,children:[]},{id:3265,name:"Havuz Pompaları",slug:"havuz-pompalari",parent:ff,is_landing_page:a,children:[]},{id:3266,name:"Havuz Aydınlatma",slug:"havuz-aydinlatma",parent:ff,is_landing_page:a,children:[]}]},{id:ng,name:"Ahşap Ürünleri",slug:"ahsap-urunleri",parent:k,is_landing_page:a,children:[{id:3268,name:"Hazır Ahşap Yapılar",slug:"hazir-ahsap-yapilar",parent:ng,is_landing_page:a,children:[]},{id:3269,name:"Hobi Ahşap Ürünleri",slug:"hobi-ahsap-urunleri",parent:ng,is_landing_page:a,children:[]}]},{id:kk,name:"Soba ve Şömineler",slug:"soba-ve-somineler",parent:k,is_landing_page:a,children:[{id:3271,name:"Sobalar",slug:"sobalar",parent:kk,is_landing_page:a,children:[]},{id:3272,name:"Şömineler",slug:"somineler",parent:kk,is_landing_page:a,children:[]},{id:4180,name:"Soba ve Şömine Yakıtları",slug:"soba-ve-somine-yakitlari",parent:kk,is_landing_page:a,children:[]}]}],color:lF,styles:{marginLeft:"6px",fontSize:cd}},{id:aH,name:Kz,slug:KA,parent:j,is_landing_page:z,children:[{id:aS,name:KB,slug:KC,parent:aH,is_landing_page:a,children:[{id:ax,name:KD,slug:KE,parent:aS,is_landing_page:a,children:[{id:nh,name:zr,slug:"oto-paspas",parent:ax,is_landing_page:a,children:[{id:3276,name:"Halı Paspas",slug:"hali-paspas",parent:nh,is_landing_page:a,children:[]},{id:3277,name:"Kavçuk Paspas",slug:"kavcuk-paspas",parent:nh,is_landing_page:a,children:[]}]},{id:ni,name:"Bagaj Havuzları",slug:"bagaj-havuzlari",parent:ax,is_landing_page:a,children:[{id:3279,name:"Halı Bagaj Havuzları",slug:"hali-bagaj-havuzlari",parent:ni,is_landing_page:a,children:[]},{id:3280,name:"Kavcuk Bagaj Havuzları",slug:"kavcuk-bagaj-havuzlari",parent:ni,is_landing_page:a,children:[]}]},{id:ib,name:"Koltuk Kılıfları",slug:"koltuk-kiliflari",parent:ax,is_landing_page:a,children:[{id:3282,name:"Araca Özel Koltuk Kılıfları",slug:"araca-ozel-koltuk-kiliflari",parent:ib,is_landing_page:a,children:[]},{id:3283,name:"Atlet Koltuk Kılıfları",slug:"atlet-koltuk-kiliflari",parent:ib,is_landing_page:a,children:[]},{id:3284,name:"Deri Koltuk Kılıfları",slug:"deri-koltuk-kiliflari",parent:ib,is_landing_page:a,children:[]},{id:3285,name:"Kumaş Koltuk Kılıfları",slug:"kumas-koltuk-kiliflari",parent:ib,is_landing_page:a,children:[]}]},{id:dw,name:"Seyahat Ürünleri",slug:"seyahat-urunleri",parent:ax,is_landing_page:a,children:[{id:3287,name:"Koltuk Aksesuarları",slug:"koltuk-aksesuarlari",parent:dw,is_landing_page:a,children:[]},{id:3288,name:"Bagaj Ürünleri",slug:"bagaj-urunleri",parent:dw,is_landing_page:a,children:[]},{id:3289,name:"Boyun Yastıkları",slug:"boyun-yastiklari",parent:dw,is_landing_page:a,children:[]},{id:3290,name:mn,slug:"oto-minderi",parent:dw,is_landing_page:a,children:[]},{id:3291,name:"Elbise Askıları",slug:"elbise-askilari",parent:dw,is_landing_page:a,children:[]},{id:3292,name:"Piknik\u002FKamp Ürünleri",slug:"piknik-kamp-urunleri",parent:dw,is_landing_page:a,children:[]},{id:3293,name:"Su Isıtıcılar",slug:"su-isiticilar",parent:dw,is_landing_page:a,children:[]},{id:7249,name:"Oto Buzdolabı",slug:"oto-buzdolabi",parent:dw,is_landing_page:a,children:[]}]},{id:3294,name:"Güneşlikler",slug:"guneslikler",parent:ax,is_landing_page:a,children:[]},{id:3295,name:"Direksiyon Kılıfı",slug:"direksiyon-kilifi",parent:ax,is_landing_page:a,children:[]},{id:3296,name:"Kolçaklar",slug:"kolcaklar",parent:ax,is_landing_page:a,children:[]},{id:ic,name:"Telefon Ve Tablet Aksesuarları",slug:"telefon-ve-tablet-aksesuarlari",parent:ax,is_landing_page:a,children:[{id:3298,name:"Telefon Tutucular",slug:"telefon-tutucular",parent:ic,is_landing_page:a,children:[]},{id:3299,name:"Tablet Tutucular",slug:"tablet-tutucular",parent:ic,is_landing_page:a,children:[]},{id:3300,name:"Araç Şarj Cihazları",slug:"telefon-ve-tablet-arac-sarj-cihazlari",parent:ic,is_landing_page:a,children:[]},{id:3301,name:"Bluetooth Araç Kiti",slug:"bluetooth-arac-kiti",parent:ic,is_landing_page:a,children:[]}]},{id:3302,name:"Bardak Ve İçecek Tutucu",slug:"bardak-ve-icecek-tutucu",parent:ax,is_landing_page:a,children:[]},{id:3303,name:"Organizer",slug:"organizer",parent:ax,is_landing_page:a,children:[]},{id:3304,name:"Araç Kokuları",slug:"arac-kokulari",parent:ax,is_landing_page:a,children:[]},{id:3305,name:"Krom İç Aksesuarlar",slug:"krom-ic-aksesuarlar",parent:ax,is_landing_page:a,children:[]},{id:3306,name:"Torpido Kaplama",slug:"torpido-kaplama",parent:ax,is_landing_page:a,children:[]},{id:nj,name:"Pedal Setleri",slug:"pedal-setleri",parent:ax,is_landing_page:a,children:[{id:3308,name:"Otomatik Vites",slug:"otomatik-vites",parent:nj,is_landing_page:a,children:[]},{id:3309,name:"Manuel Vites",slug:"manuel-vites",parent:nj,is_landing_page:a,children:[]}]},{id:3310,name:H,slug:"diger-oto-ic-aksesuar-urunleri",parent:ax,is_landing_page:a,children:[]}]},{id:aT,name:KF,slug:KG,parent:aS,is_landing_page:a,children:[{id:kl,name:KH,slug:KI,parent:aT,is_landing_page:a,children:[{id:3313,name:"Arma",slug:"arma",parent:kl,is_landing_page:a,children:[]},{id:3314,name:jo,slug:"oto-sticker",parent:kl,is_landing_page:a,children:[]}]},{id:3315,name:"Krom Dış Aksesuarlar",slug:"krom-dis-aksesuarlar",parent:aT,is_landing_page:a,children:[]},{id:km,name:KJ,slug:KK,parent:aT,is_landing_page:a,children:[{id:3317,name:"Cam Rüzgarlıkları",slug:"cam-ruzgarliklari",parent:km,is_landing_page:a,children:[]},{id:3318,name:"Cam Çıtaları",slug:"cam-citalari",parent:km,is_landing_page:a,children:[]}]},{id:nk,name:"Folyo Kaplama",slug:"folyo-kaplama",parent:aT,is_landing_page:a,children:[{id:3320,name:"Cam Filmleri",slug:"cam-filmleri",parent:nk,is_landing_page:a,children:[]},{id:3321,name:"Kaplama Folyoları",slug:"kaplama-folyolari",parent:nk,is_landing_page:a,children:[]}]},{id:3322,name:"Sibop Kapakları",slug:"sibop-kapaklari",parent:aT,is_landing_page:a,children:[]},{id:KL,name:KM,slug:KN,parent:aT,is_landing_page:a,children:[]},{id:3324,name:"Geri Görüş Kameraları",slug:"geri-gorus-kameralari",parent:aT,is_landing_page:a,children:[]},{id:3325,name:"Plakalıklar",slug:"plakaliklar",parent:aT,is_landing_page:a,children:[]},{id:KO,name:KP,slug:KQ,parent:aT,is_landing_page:a,children:[]}]},{id:KR,name:nl,slug:KS,parent:aS,is_landing_page:a,children:[]},{id:KT,name:KU,slug:KV,parent:aS,is_landing_page:a,children:[]},{id:dx,name:"Lastik Aksesuarları",slug:"lastik-aksesuarlari",parent:aS,is_landing_page:a,children:[{id:3330,name:"Buz Çözücüler",slug:"buz-cozuculer",parent:dx,is_landing_page:a,children:[]},{id:3331,name:"Oto Kar Zincirleri",slug:"oto-kar-zincirleri",parent:dx,is_landing_page:a,children:[]},{id:3332,name:"Oto Kar Çorapları",slug:"oto-kar-coraplari",parent:dx,is_landing_page:a,children:[]},{id:3333,name:Jf,slug:"kriko",parent:dx,is_landing_page:a,children:[]},{id:3334,name:"Lastik Tamir Kitleri",slug:"lastik-tamir-kitleri",parent:dx,is_landing_page:a,children:[]},{id:3335,name:"Jant Kapakları",slug:"jant-kapaklari",parent:dx,is_landing_page:a,children:[]},{id:3336,name:"Bijonlar",slug:"bijonlar",parent:dx,is_landing_page:a,children:[]},{id:3337,name:H,slug:"diger-lastik-aksesuarlari",parent:dx,is_landing_page:a,children:[]}]},{id:dy,name:KW,slug:KX,parent:aS,is_landing_page:a,children:[{id:3339,name:"Led Şerit",slug:"led-serit",parent:dy,is_landing_page:a,children:[]},{id:3340,name:"Oto Ampülleri",slug:"oto-ampulleri",parent:dy,is_landing_page:a,children:[]},{id:3341,name:"Gündüz Ledi",slug:"gunduz-ledi",parent:dy,is_landing_page:a,children:[]},{id:3342,name:"Xenon Yedek Ampülleri",slug:"xenon-yedek-ampulleri",parent:dy,is_landing_page:a,children:[]},{id:3343,name:"Sis Lambaları",slug:"sis-lambalari",parent:dy,is_landing_page:a,children:[]},{id:3344,name:"Far Sensörleri",slug:"far-sensorleri",parent:dy,is_landing_page:a,children:[]},{id:3345,name:H,slug:"diger-oto-aydinlatma-urunleri",parent:dy,is_landing_page:a,children:[]}]},{id:kn,name:KY,slug:KZ,parent:aS,is_landing_page:a,children:[{id:3347,name:K_,slug:"kornalar",parent:kn,is_landing_page:a,children:[]},{id:3348,name:"Sirenler",slug:"sirenler",parent:kn,is_landing_page:a,children:[]}]}]},{id:id,name:K$,slug:La,parent:aH,is_landing_page:a,children:[{id:dz,name:"Oto Ses Sistemleri",slug:"oto-ses-sistemleri",parent:id,is_landing_page:a,children:[{id:Lb,name:Lc,slug:Ld,parent:dz,is_landing_page:a,children:[]},{id:Le,name:Lf,slug:Lg,parent:dz,is_landing_page:a,children:[]},{id:Lh,name:Li,slug:Lj,parent:dz,is_landing_page:a,children:[]},{id:Lk,name:Ll,slug:Lm,parent:dz,is_landing_page:a,children:[]}]},{id:et,name:"Oto Görüntü Sistemleri",slug:"oto-goruntu-sistemleri",parent:id,is_landing_page:a,children:[{id:Ln,name:kH,slug:Lo,parent:et,is_landing_page:a,children:[]},{id:Lp,name:Lq,slug:Lr,parent:et,is_landing_page:a,children:[]},{id:Ls,name:mC,slug:Lt,parent:et,is_landing_page:a,children:[]},{id:3359,name:"Kablo Ve Aksesuarlar",slug:"kablo-ve-aksesuarlar",parent:et,is_landing_page:a,children:[]}]},{id:3360,name:"Navigasyon",slug:"navigasyon",parent:id,is_landing_page:a,children:[]}]},{id:ie,name:Lu,slug:Lv,parent:aH,is_landing_page:a,children:[{id:dA,name:"Oto Lastik",slug:"oto-lastik",parent:ie,is_landing_page:a,children:[{id:Lw,name:Lx,slug:Ly,parent:dA,is_landing_page:a,children:[]},{id:Lz,name:LA,slug:LB,parent:dA,is_landing_page:a,children:[]},{id:LC,name:LD,slug:LE,parent:dA,is_landing_page:a,children:[]},{id:LF,name:LG,slug:LH,parent:dA,is_landing_page:a,children:[]}]},{id:LI,name:LJ,slug:LK,parent:ie,is_landing_page:a,children:[]}]},{id:gw,name:kM,slug:"otomobil-ve-motosiklet-yedek-parcalari",parent:aH,is_landing_page:a,children:[{id:cV,name:LL,slug:LM,parent:gw,is_landing_page:a,children:[{id:c,name:LN,slug:LO,parent:cV,is_landing_page:a,children:[{id:5508,name:"Debriyaj Alt Merkezi",slug:"debriyaj-alt-merkezi",parent:c,is_landing_page:a,children:[]},{id:5511,name:"Debriyaj Balatası",slug:"debriyaj-balatasi",parent:c,is_landing_page:a,children:[]},{id:5514,name:"Debriyaj Baskısı",slug:"debriyaj-baskisi",parent:c,is_landing_page:a,children:[]},{id:5517,name:"Debriyaj Bilyası-Rulmanı",slug:"debriyaj-bilyasi-rulmani",parent:c,is_landing_page:a,children:[]},{id:5520,name:"Debriyaj Çatal Fiberi",slug:"debriyaj-catal-fiberi",parent:c,is_landing_page:a,children:[]},{id:5523,name:"Debriyaj Çatalı",slug:"debriyaj-catali",parent:c,is_landing_page:a,children:[]},{id:5526,name:"Debriyaj Hortumu",slug:"debriyaj-hortumu",parent:c,is_landing_page:a,children:[]},{id:5532,name:"Debriyaj Pedal Sensörü",slug:"debriyaj-pedal-sensoru",parent:c,is_landing_page:a,children:[]},{id:5535,name:"Debriyaj Pedalı",slug:"debriyaj-pedali",parent:c,is_landing_page:a,children:[]},{id:5538,name:"Debriyaj Seti",slug:"debriyaj-seti",parent:c,is_landing_page:a,children:[]},{id:5541,name:"Debriyaj Teli",slug:"debriyaj-teli",parent:c,is_landing_page:a,children:[]},{id:5544,name:"Debriyaj Üst Merkezi",slug:"debriyaj-ust-merkezi",parent:c,is_landing_page:a,children:[]},{id:5547,name:"Volan",slug:"volan",parent:c,is_landing_page:a,children:[]},{id:5550,name:"Debriyaj Merkezi",slug:"debriyaj-merkezi",parent:c,is_landing_page:a,children:[]},{id:5553,name:"Debriyaj Merkez Burcu",slug:"debriyaj-merkez-burcu",parent:c,is_landing_page:a,children:[]},{id:5556,name:"Ayna Mahruti",slug:"ayna-mahruti",parent:c,is_landing_page:a,children:[]},{id:5559,name:"Defransiyel",slug:"defransiyel",parent:c,is_landing_page:a,children:[]},{id:5562,name:"Defransiyel Kapağı",slug:"defransiyel-kapagi",parent:c,is_landing_page:a,children:[]},{id:5565,name:"Defransiyel Kapak Contası",slug:"defransiyel-kapak-contasi",parent:c,is_landing_page:a,children:[]},{id:5568,name:"Defransiyel Keçesi",slug:"defransiyel-kecesi",parent:c,is_landing_page:a,children:[]},{id:5571,name:"Defransiyel Rulmanı",slug:"defransiyel-rulmani",parent:c,is_landing_page:a,children:[]},{id:5574,name:"İstavroz Dişlisi",slug:"istavroz-dislisi",parent:c,is_landing_page:a,children:[]},{id:5577,name:"İstavroz Mili",slug:"istavroz-mili",parent:c,is_landing_page:a,children:[]},{id:5580,name:"Şaft",slug:"saft",parent:c,is_landing_page:a,children:[]},{id:5583,name:"Defransiyel Takozu",slug:"defransiyel-takozu",parent:c,is_landing_page:a,children:[]},{id:5586,name:"Geri Vites Dişlisi",slug:"geri-vites-dislisi",parent:c,is_landing_page:a,children:[]},{id:5589,name:"Geri Vites Müşürü",slug:"geri-vites-musuru",parent:c,is_landing_page:a,children:[]},{id:5592,name:"Kilometre Dişlisi",slug:"kilometre-dislisi",parent:c,is_landing_page:a,children:[]},{id:5598,name:"Kilometre Teli",slug:"kilometre-teli",parent:c,is_landing_page:a,children:[]},{id:5601,name:"Prizdirek Kapağı",slug:"prizdirek-kapagi",parent:c,is_landing_page:a,children:[]},{id:5604,name:"Prizdirek Keçesi",slug:"prizdirek-kecesi",parent:c,is_landing_page:a,children:[]},{id:5607,name:"Prizdirek Mili",slug:"prizdirek-mili",parent:c,is_landing_page:a,children:[]},{id:5610,name:"Prizdirek Rulmanı",slug:"prizdirek-rulmani",parent:c,is_landing_page:a,children:[]},{id:5613,name:"Senkromenç",slug:"senkromenc",parent:c,is_landing_page:a,children:[]},{id:5616,name:"Şanzıman Arka Kapak",slug:"sanziman-arka-kapak",parent:c,is_landing_page:a,children:[]},{id:5619,name:"Şanzıman Bilyası",slug:"sanziman-bilyasi",parent:c,is_landing_page:a,children:[]},{id:5622,name:"Şanzıman Keçesi",slug:"sanziman-kecesi",parent:c,is_landing_page:a,children:[]},{id:5625,name:"Şanzıman Takım Conta",slug:"sanziman-takim-conta",parent:c,is_landing_page:a,children:[]},{id:5628,name:"Şanzıman Takozu",slug:"sanziman-takozu",parent:c,is_landing_page:a,children:[]},{id:5631,name:"Vites Çatalı",slug:"vites-catali",parent:c,is_landing_page:a,children:[]},{id:5634,name:"Vites Çubukları",slug:"vites-cubuklari",parent:c,is_landing_page:a,children:[]},{id:5637,name:"Vites Dişlileri",slug:"vites-dislileri",parent:c,is_landing_page:a,children:[]},{id:5643,name:"Vites Körüğü",slug:"vites-korugu",parent:c,is_landing_page:a,children:[]},{id:5652,name:"Volan Bilyası",slug:"volan-bilyasi",parent:c,is_landing_page:a,children:[]},{id:5655,name:"Kamalı Mil Rulmanı",slug:"kamali-mil-rulmani",parent:c,is_landing_page:a,children:[]},{id:5656,name:"Grup Mili",slug:"grup-mili",parent:c,is_landing_page:a,children:[]},{id:5659,name:"Vites Burcu",slug:"vites-burcu",parent:c,is_landing_page:a,children:[]},{id:5662,name:"Vites Müşürü",slug:"vites-musuru",parent:c,is_landing_page:a,children:[]},{id:5665,name:"Ek Depo Hortumu",slug:"ek-depo-hortumu",parent:c,is_landing_page:a,children:[]},{id:5668,name:"Hortum",slug:"hortum",parent:c,is_landing_page:a,children:[]},{id:5671,name:"İntercool-Turbo Hortumu",slug:"intercool-turbo-hortumu",parent:c,is_landing_page:a,children:[]},{id:5674,name:"Kalorifer Hortumu",slug:"kalorifer-hortumu",parent:c,is_landing_page:a,children:[]},{id:5677,name:"Klima Borusu",slug:"klima-borusu",parent:c,is_landing_page:a,children:[]},{id:5680,name:"Radyatör Alt Hortumu",slug:"radyator-alt-hortumu",parent:c,is_landing_page:a,children:[]},{id:5683,name:"Radyatör Üst Hortumu",slug:"radyator-ust-hortumu",parent:c,is_landing_page:a,children:[]},{id:5686,name:"Su Pompa Hortumu",slug:"su-pompa-hortumu",parent:c,is_landing_page:a,children:[]},{id:5689,name:"Termostat Hortumu",slug:"termostat-hortumu",parent:c,is_landing_page:a,children:[]},{id:5692,name:"Kalorifer",slug:"kalorifer",parent:c,is_landing_page:a,children:[]},{id:5695,name:"Kalorifer Anahtarı",slug:"kalorifer-anahtari",parent:c,is_landing_page:a,children:[]},{id:5698,name:"Kalorifer Motoru",slug:"kalorifer-motoru",parent:c,is_landing_page:a,children:[]},{id:5701,name:"Kalorifer Musluğu",slug:"kalorifer-muslugu",parent:c,is_landing_page:a,children:[]},{id:5704,name:"Kalorifer Radyatör Contası",slug:"kalorifer-radyator-contasi",parent:c,is_landing_page:a,children:[]},{id:5707,name:"Kalorifer Radyatörü",slug:"kalorifer-radyatoru",parent:c,is_landing_page:a,children:[]},{id:5710,name:"Kalorifer Rezistansı",slug:"kalorifer-rezistansi",parent:c,is_landing_page:a,children:[]},{id:5713,name:"Kalorifer Tamir Takımı",slug:"kalorifer-tamir-takimi",parent:c,is_landing_page:a,children:[]},{id:5716,name:"Devirdaim",slug:"devirdaim",parent:c,is_landing_page:a,children:[]},{id:5719,name:"Fan Davlumbazı",slug:"fan-davlumbazi",parent:c,is_landing_page:a,children:[]},{id:5722,name:"Fan Motoru",slug:"fan-motoru",parent:c,is_landing_page:a,children:[]},{id:5725,name:"Fan Müşürü",slug:"fan-musuru",parent:c,is_landing_page:a,children:[]},{id:5728,name:"Fan Rezistansı",slug:"fan-rezistansi",parent:c,is_landing_page:a,children:[]},{id:5731,name:"Genleşme Kabı",slug:"genlesme-kabi",parent:c,is_landing_page:a,children:[]},{id:5737,name:"İntercool-Turbo Radyatörü",slug:"intercool-turbo-radyatoru",parent:c,is_landing_page:a,children:[]},{id:5740,name:"Klima Kompresörü",slug:"klima-kompresoru",parent:c,is_landing_page:a,children:[]},{id:5743,name:"Klima Müşürü",slug:"klima-musuru",parent:c,is_landing_page:a,children:[]},{id:5746,name:"Klima Radyatörü",slug:"klima-radyatoru",parent:c,is_landing_page:a,children:[]},{id:5749,name:"Kurutucu",slug:"kurutucu",parent:c,is_landing_page:a,children:[]},{id:5752,name:"Pervane",slug:"pervane",parent:c,is_landing_page:a,children:[]},{id:5755,name:"Radyatör Bağlantı Ayağı",slug:"radyator-baglanti-ayagi",parent:c,is_landing_page:a,children:[]},{id:5758,name:"Radyatör Çerçevesi",slug:"radyator-cercevesi",parent:c,is_landing_page:a,children:[]},{id:5761,name:"Radyatör Ek Depo",slug:"radyator-ek-depo",parent:c,is_landing_page:a,children:[]},{id:5764,name:"Radyatör Ek Depo Kapağı",slug:"radyator-ek-depo-kapagi",parent:c,is_landing_page:a,children:[]},{id:5767,name:"Radyatör Kapağı",slug:"radyator-kapagi",parent:c,is_landing_page:a,children:[]},{id:5770,name:"Su Pompası",slug:"su-pompasi",parent:c,is_landing_page:a,children:[]},{id:5773,name:"Su Radyatörü",slug:"su-radyatoru",parent:c,is_landing_page:a,children:[]},{id:5779,name:"Termostat Gövdesi",slug:"termostat-govdesi",parent:c,is_landing_page:a,children:[]},{id:5782,name:"Devirdaim Borusu",slug:"devirdaim-borusu",parent:c,is_landing_page:a,children:[]},{id:5785,name:"Motor Havalandırma Hortumu",slug:"motor-havalandirma-hortumu",parent:c,is_landing_page:a,children:[]},{id:5788,name:"Bobin",slug:"bobin",parent:c,is_landing_page:a,children:[]},{id:5794,name:"Buji Kablosu",slug:"buji-kablosu",parent:c,is_landing_page:a,children:[]},{id:5797,name:"Distribütör",slug:"distributor",parent:c,is_landing_page:a,children:[]},{id:5800,name:"Distribütör Kapağı",slug:"distributor-kapagi",parent:c,is_landing_page:a,children:[]},{id:5803,name:"Isıtma Bujisi",slug:"isitma-bujisi",parent:c,is_landing_page:a,children:[]},{id:5809,name:"Bobin Kablosu",slug:"bobin-kablosu",parent:c,is_landing_page:a,children:[]},{id:5812,name:"Elektrovalf",slug:"elektrovalf",parent:c,is_landing_page:a,children:[]},{id:5815,name:"Elektronik Modül",slug:"elektronik-modul",parent:c,is_landing_page:a,children:[]},{id:5818,name:"Alt Takım Conta",slug:"alt-takim-conta",parent:c,is_landing_page:a,children:[]},{id:5821,name:"Egr Contası",slug:"egr-contasi",parent:c,is_landing_page:a,children:[]},{id:5824,name:"Egzoz Manifold Contası",slug:"egzoz-manifold-contasi",parent:c,is_landing_page:a,children:[]},{id:5827,name:"Emme Manifold Contası",slug:"emme-manifold-contasi",parent:c,is_landing_page:a,children:[]},{id:5830,name:"Karbüratör Contası",slug:"karburator-contasi",parent:c,is_landing_page:a,children:[]},{id:5833,name:"Karter Contası",slug:"karter-contasi",parent:c,is_landing_page:a,children:[]},{id:5836,name:"Manifold Contası",slug:"manifold-contasi",parent:c,is_landing_page:a,children:[]},{id:5839,name:"Silindir Kapak Contası",slug:"silindir-kapak-contasi",parent:c,is_landing_page:a,children:[]},{id:5842,name:"Takım Conta",slug:"takim-conta",parent:c,is_landing_page:a,children:[]},{id:5845,name:"Turbo Contası",slug:"turbo-contasi",parent:c,is_landing_page:a,children:[]},{id:5848,name:"Üst Kapak Contası",slug:"ust-kapak-contasi",parent:c,is_landing_page:a,children:[]},{id:5851,name:"Üst Takım Conta",slug:"ust-takim-conta",parent:c,is_landing_page:a,children:[]},{id:5854,name:"Yağ Pompa Contası",slug:"yag-pompa-contasi",parent:c,is_landing_page:a,children:[]},{id:5857,name:"Devirdaim Contası",slug:"devirdaim-contasi",parent:c,is_landing_page:a,children:[]},{id:5860,name:"Eksantrik Conta",slug:"eksantrik-conta",parent:c,is_landing_page:a,children:[]},{id:5863,name:"Yağ Soğutucu Contası",slug:"yag-sogutucu-contasi",parent:c,is_landing_page:a,children:[]},{id:5866,name:"Conta",slug:"conta",parent:c,is_landing_page:a,children:[]},{id:5869,name:"Keçe",slug:"kece",parent:c,is_landing_page:a,children:[]},{id:5872,name:"Alternatör Bilyası",slug:"alternator-bilyasi",parent:c,is_landing_page:a,children:[]},{id:5875,name:"Alternatör Kayış Seti",slug:"alternator-kayis-seti",parent:c,is_landing_page:a,children:[]},{id:5881,name:"Direksiyon Kayışı",slug:"direksiyon-kayisi",parent:c,is_landing_page:a,children:[]},{id:5884,name:"Gergi Bilyası",slug:"gergi-bilyasi",parent:c,is_landing_page:a,children:[]},{id:5887,name:"Klima Kayışı",slug:"klima-kayisi",parent:c,is_landing_page:a,children:[]},{id:5890,name:"Triger Bilyaları",slug:"triger-bilyalari",parent:c,is_landing_page:a,children:[]},{id:5896,name:"Triger Parçaları",slug:"triger-parcalari",parent:c,is_landing_page:a,children:[]},{id:5899,name:"Triger Seti",slug:"triger-seti",parent:c,is_landing_page:a,children:[]},{id:5905,name:"Zincir Seti",slug:"zincir-seti",parent:c,is_landing_page:a,children:[]},{id:5908,name:"Triger Gergi Bilyaları",slug:"triger-gergi-bilyalari",parent:c,is_landing_page:a,children:[]},{id:5911,name:"Gergi Rulmanı",slug:"gergi-rulmani",parent:c,is_landing_page:a,children:[]},{id:5914,name:"Triger Dişlisi",slug:"triger-dislisi",parent:c,is_landing_page:a,children:[]},{id:5917,name:"Ana Yatak",slug:"ana-yatak",parent:c,is_landing_page:a,children:[]},{id:5920,name:"Arka Krank Keçesi",slug:"arka-krank-kecesi",parent:c,is_landing_page:a,children:[]},{id:5923,name:"Blok Tapası",slug:"blok-tapasi",parent:c,is_landing_page:a,children:[]},{id:5926,name:"Eksantrik Dişlisi",slug:"eksantrik-dislisi",parent:c,is_landing_page:a,children:[]},{id:5929,name:"Eksantrik Mili",slug:"eksantrik-mili",parent:c,is_landing_page:a,children:[]},{id:5932,name:fB,slug:"gomlek",parent:c,is_landing_page:a,children:[]},{id:5935,name:"Hava Akışmetre",slug:"hava-akismetre",parent:c,is_landing_page:a,children:[]},{id:5938,name:LP,slug:LP,parent:c,is_landing_page:a,children:[]},{id:5941,name:"Karter Tapası",slug:"karter-tapasi",parent:c,is_landing_page:a,children:[]},{id:5944,name:"Kenar Yatak",slug:"kenar-yatak",parent:c,is_landing_page:a,children:[]},{id:5947,name:"Kol Burcu",slug:"kol-burcu",parent:c,is_landing_page:a,children:[]},{id:5950,name:"Kol Yatak",slug:"kol-yatak",parent:c,is_landing_page:a,children:[]},{id:5953,name:"Krank",slug:"krank",parent:c,is_landing_page:a,children:[]},{id:5956,name:"Krank Dişlisi",slug:"krank-dislisi",parent:c,is_landing_page:a,children:[]},{id:5959,name:"Krank Kapak Contası",slug:"krank-kapak-contasi",parent:c,is_landing_page:a,children:[]},{id:5962,name:"Krank Keçesi",slug:"krank-kecesi",parent:c,is_landing_page:a,children:[]},{id:5965,name:"Motor Takozu",slug:"motor-takozu",parent:c,is_landing_page:a,children:[]},{id:5968,name:"Ön Krank Keçesi",slug:"on-krank-kecesi",parent:c,is_landing_page:a,children:[]},{id:5971,name:"Krank Kasnağı",slug:"krank-kasnagi",parent:c,is_landing_page:a,children:[]},{id:5974,name:"Piston Kolu",slug:"piston-kolu",parent:c,is_landing_page:a,children:[]},{id:5977,name:"Piston Segman",slug:"piston-segman",parent:c,is_landing_page:a,children:[]},{id:5980,name:"Segman",slug:"segman",parent:c,is_landing_page:a,children:[]},{id:5983,name:"Silindir Kapağı",slug:"silindir-kapagi",parent:c,is_landing_page:a,children:[]},{id:5986,name:"Subap",slug:"subap",parent:c,is_landing_page:a,children:[]},{id:5989,name:"Subap Gaydı",slug:"subap-gaydi",parent:c,is_landing_page:a,children:[]},{id:5992,name:"Subap Lastiği",slug:"subap-lastigi",parent:c,is_landing_page:a,children:[]},{id:5995,name:"Turbo",slug:"turbo",parent:c,is_landing_page:a,children:[]},{id:5998,name:"Üst Kapak",slug:"ust-kapak",parent:c,is_landing_page:a,children:[]},{id:6004,name:"Yağ Çubuğu",slug:"yag-cubugu",parent:c,is_landing_page:a,children:[]},{id:6007,name:"Yağ Kapağı",slug:"yag-kapagi",parent:c,is_landing_page:a,children:[]},{id:6010,name:"Yağ Karteri",slug:"yag-karteri",parent:c,is_landing_page:a,children:[]},{id:6013,name:"Yağ Pompa Süzgeci",slug:"yag-pompa-suzgeci",parent:c,is_landing_page:a,children:[]},{id:6016,name:"Yağ Pompası",slug:"yag-pompasi",parent:c,is_landing_page:a,children:[]},{id:6019,name:"Yağ Soğutucu",slug:"yag-sogutucu",parent:c,is_landing_page:a,children:[]},{id:6022,name:"Yağlama Fıskiyesi",slug:"yaglama-fiskiyesi",parent:c,is_landing_page:a,children:[]},{id:6025,name:"Yakıt Pompası",slug:"yakit-pompasi",parent:c,is_landing_page:a,children:[]},{id:6028,name:"Eksantrik Gergi Yatağı",slug:"eksantrik-gergi-yatagi",parent:c,is_landing_page:a,children:[]},{id:6031,name:"Ay Yatak",slug:"ay-yatak",parent:c,is_landing_page:a,children:[]},{id:6034,name:"Eksantrik Yatak",slug:"eksantrik-yatak",parent:c,is_landing_page:a,children:[]},{id:6037,name:"Eksantrik Keçesi",slug:"eksantrik-kecesi",parent:c,is_landing_page:a,children:[]},{id:6040,name:"Fincan",slug:"fincan",parent:c,is_landing_page:a,children:[]},{id:6043,name:"Silindir Kapak Tapası",slug:"silindir-kapak-tapasi",parent:c,is_landing_page:a,children:[]},{id:6046,name:"Zincir",slug:"zincir",parent:c,is_landing_page:a,children:[]},{id:6049,name:"Triger Kapağı",slug:"triger-kapagi",parent:c,is_landing_page:a,children:[]},{id:6052,name:"Eksantrik Kapağı",slug:"eksantrik-kapagi",parent:c,is_landing_page:a,children:[]},{id:6055,name:"Eksantrik Aparatı",slug:"eksantrik-aparati",parent:c,is_landing_page:a,children:[]},{id:6058,name:"Silindir Kapak Saplaması",slug:"silindir-kapak-saplamasi",parent:c,is_landing_page:a,children:[]},{id:6061,name:"Külbütör Kapağı",slug:"kulbutor-kapagi",parent:c,is_landing_page:a,children:[]},{id:6064,name:"Basınç Regülatörü",slug:"basinc-regulatoru",parent:c,is_landing_page:a,children:[]},{id:6067,name:"Benzin Otomatiği",slug:"benzin-otomatigi",parent:c,is_landing_page:a,children:[]},{id:6070,name:"Benzin Pompası",slug:"benzin-pompasi",parent:c,is_landing_page:a,children:[]},{id:6073,name:"Debimetre",slug:"debimetre",parent:c,is_landing_page:a,children:[]},{id:6076,name:"Depo Şamandırası",slug:"depo-samandirasi",parent:c,is_landing_page:a,children:[]},{id:6079,name:"Egr Kapağı",slug:"egr-kapagi",parent:c,is_landing_page:a,children:[]},{id:6082,name:"Egr Komple",slug:"egr-komple",parent:c,is_landing_page:a,children:[]},{id:6085,name:"Egr Valfi",slug:"egr-valfi",parent:c,is_landing_page:a,children:[]},{id:6088,name:"Egzoz Manifoldu",slug:"egzoz-manifoldu",parent:c,is_landing_page:a,children:[]},{id:6091,name:"Emme Manifoldu",slug:"emme-manifoldu",parent:c,is_landing_page:a,children:[]},{id:6094,name:"Enjektör",slug:"enjektor",parent:c,is_landing_page:a,children:[]},{id:6097,name:"Enjektör Keçesi",slug:"enjektor-kecesi",parent:c,is_landing_page:a,children:[]},{id:6100,name:"Gaz Kelebeği",slug:"gaz-kelebegi",parent:c,is_landing_page:a,children:[]},{id:6103,name:"Gaz Teli",slug:"gaz-teli",parent:c,is_landing_page:a,children:[]},{id:6109,name:"Hava Filtre Bağlantı Lastiği",slug:"hava-filtre-baglanti-lastigi",parent:c,is_landing_page:a,children:[]},{id:6112,name:"Hava Filtre Kutusu",slug:"hava-filtre-kutusu",parent:c,is_landing_page:a,children:[]},{id:6115,name:"Isı Değiştirici",slug:"isi-degistirici",parent:c,is_landing_page:a,children:[]},{id:6118,name:"Isı Sacı",slug:"isi-saci",parent:c,is_landing_page:a,children:[]},{id:6121,name:"İntercool Radyatörü",slug:"intercool-radyatoru",parent:c,is_landing_page:a,children:[]},{id:6124,name:"Jikle Teli",slug:"jikle-teli",parent:c,is_landing_page:a,children:[]},{id:6127,name:"Karbüratör",slug:"karburator",parent:c,is_landing_page:a,children:[]},{id:6130,name:"Katalizör",slug:"katalizor",parent:c,is_landing_page:a,children:[]},{id:6133,name:"Manifold Rekoru",slug:"manifold-rekoru",parent:c,is_landing_page:a,children:[]},{id:6142,name:"Mazot Pompa Müşürü",slug:"mazot-pompa-musuru",parent:c,is_landing_page:a,children:[]},{id:6145,name:"Mazot Pompası",slug:"mazot-pompasi",parent:c,is_landing_page:a,children:[]},{id:6148,name:"Mazot Pompası Komple",slug:"mazot-pompasi-komple",parent:c,is_landing_page:a,children:[]},{id:6151,name:"Potansiyometre",slug:"potansiyometre",parent:c,is_landing_page:a,children:[]},{id:6154,name:"Reil Borusu",slug:"reil-borusu",parent:c,is_landing_page:a,children:[]},{id:6157,name:"Turbo Radyatörü",slug:"turbo-radyatoru",parent:c,is_landing_page:a,children:[]},{id:6160,name:"Turbo Valfi",slug:"turbo-valfi",parent:c,is_landing_page:a,children:[]},{id:6163,name:"Yakıt Deposu",slug:"yakit-deposu",parent:c,is_landing_page:a,children:[]},{id:6169,name:"Enjektör Muhafazası",slug:"enjektor-muhafazasi",parent:c,is_landing_page:a,children:[]},{id:6172,name:"Egzoz Lastiği",slug:"egzoz-lastigi",parent:c,is_landing_page:a,children:[]},{id:6175,name:"Enjeksiyon Pompa Dişlisi",slug:"enjeksiyon-pompa-dislisi",parent:c,is_landing_page:a,children:[]},{id:6178,name:"Diyafram",slug:"diyafram",parent:c,is_landing_page:a,children:[]},{id:6181,name:"Gaz Pedalı ",slug:"gaz-pedali",parent:c,is_landing_page:a,children:[]},{id:6184,name:"Depo Şamandıra Contası",slug:"depo-samandira-contasi",parent:c,is_landing_page:a,children:[]},{id:6187,name:"Depo Şamandıra Somunu",slug:"depo-samandira-somunu",parent:c,is_landing_page:a,children:[]},{id:6190,name:"Benzin Deposu",slug:"benzin-deposu",parent:c,is_landing_page:a,children:[]},{id:6193,name:"Benzin Hortumu",slug:"benzin-hortumu",parent:c,is_landing_page:a,children:[]},{id:6196,name:"Depo Hortumları",slug:"depo-hortumlari",parent:c,is_landing_page:a,children:[]},{id:6199,name:"Emme Hortumu",slug:"emme-hortumu",parent:c,is_landing_page:a,children:[]},{id:6202,name:"Enjektör Borusu",slug:"enjektor-borusu",parent:c,is_landing_page:a,children:[]},{id:6205,name:"Enjektör Hortumu",slug:"enjektor-hortumu",parent:c,is_landing_page:a,children:[]},{id:6208,name:"Hava Filtre Hortumu",slug:"hava-filtre-hortumu",parent:c,is_landing_page:a,children:[]},{id:6211,name:"İntercool Hortumu",slug:"intercool-hortumu",parent:c,is_landing_page:a,children:[]},{id:6214,name:"Mazot Filtre Hortumu",slug:"mazot-filtre-hortumu",parent:c,is_landing_page:a,children:[]},{id:6217,name:"Turbo Hortumu ",slug:"turbo-hortumu",parent:c,is_landing_page:a,children:[]},{id:6220,name:"Yakıt Hortumu",slug:"yakit-hortumu",parent:c,is_landing_page:a,children:[]},{id:6223,name:"Hava Hortumu",slug:"hava-hortumu",parent:c,is_landing_page:a,children:[]},{id:6226,name:"Emme Manifold Hortumu",slug:"emme-manifold-hortumu",parent:c,is_landing_page:a,children:[]},{id:6229,name:"Isı Hortumu",slug:"isi-hortumu",parent:c,is_landing_page:a,children:[]}]},{id:h,name:"Kaporta Parçaları",slug:"kaporta-parcalari",parent:cV,is_landing_page:a,children:[{id:5224,name:"Far Rolesi",slug:"far-rolesi",parent:h,is_landing_page:a,children:[]},{id:5227,name:"Far",slug:"far",parent:h,is_landing_page:a,children:[]},{id:5230,name:"Far Alt Çıtası",slug:"far-alt-citasi",parent:h,is_landing_page:a,children:[]},{id:5233,name:"Far Ampulu",slug:"far-ampulu",parent:h,is_landing_page:a,children:[]},{id:5236,name:"Far Bağlantı Braketi",slug:"far-baglanti-braketi",parent:h,is_landing_page:a,children:[]},{id:5239,name:"Far Camı",slug:"far-cami",parent:h,is_landing_page:a,children:[]},{id:5242,name:"Far Motoru",slug:"far-motoru",parent:h,is_landing_page:a,children:[]},{id:5245,name:"Sağ Far",slug:"sag-far",parent:h,is_landing_page:a,children:[]},{id:5248,name:"Sol Far",slug:"sol-far",parent:h,is_landing_page:a,children:[]},{id:5251,name:"Araç İçi Ampuller",slug:"arac-ici-ampuller",parent:h,is_landing_page:a,children:[]},{id:5254,name:"Arka Tavan Lambası",slug:"arka-tavan-lambasi",parent:h,is_landing_page:a,children:[]},{id:5257,name:"Bagaj İç Lambası",slug:"bagaj-ic-lambasi",parent:h,is_landing_page:a,children:[]},{id:5260,name:"Kapı İç Lambası",slug:"kapi-ic-lambasi",parent:h,is_landing_page:a,children:[]},{id:5263,name:"Ön Tavan Lambası",slug:"on-tavan-lambasi",parent:h,is_landing_page:a,children:[]},{id:5266,name:"Tavan Lambası",slug:"tavan-lambasi",parent:h,is_landing_page:a,children:[]},{id:5269,name:"Torpido İç Lambası",slug:"torpido-ic-lambasi",parent:h,is_landing_page:a,children:[]},{id:5272,name:"Çamurluk Sinyali",slug:"camurluk-sinyali",parent:h,is_landing_page:a,children:[]},{id:5275,name:"Kaplama Sinyali",slug:"kaplama-sinyali",parent:h,is_landing_page:a,children:[]},{id:5278,name:"Park Lambası",slug:"park-lambasi",parent:h,is_landing_page:a,children:[]},{id:5281,name:"Sağ Sinyal",slug:"sag-sinyal",parent:h,is_landing_page:a,children:[]},{id:5284,name:"Sinyal",slug:"sinyal",parent:h,is_landing_page:a,children:[]},{id:5287,name:"Sinyal Ampulleri",slug:"sinyal-ampulleri",parent:h,is_landing_page:a,children:[]},{id:5290,name:"Sol Sinyal",slug:"sol-sinyal",parent:h,is_landing_page:a,children:[]},{id:5293,name:"Ayna Sinyali",slug:"ayna-sinyali",parent:h,is_landing_page:a,children:[]},{id:5296,name:"Arka Sis Lambası",slug:"arka-sis-lambasi",parent:h,is_landing_page:a,children:[]},{id:5299,name:"Geri Vites Lambası",slug:"geri-vites-lambasi",parent:h,is_landing_page:a,children:[]},{id:5305,name:"Sağ Sis",slug:"sag-sis",parent:h,is_landing_page:a,children:[]},{id:5308,name:"Sis Ampulleri",slug:"sis-ampulleri",parent:h,is_landing_page:a,children:[]},{id:5314,name:"Sis Farı",slug:"sis-fari",parent:h,is_landing_page:a,children:[]},{id:5317,name:"Sol Sis",slug:"sol-sis",parent:h,is_landing_page:a,children:[]},{id:5320,name:"Bagaj Stop",slug:"bagaj-stop",parent:h,is_landing_page:a,children:[]},{id:5323,name:"Dış Stop Sağ",slug:"dis-stop-sag",parent:h,is_landing_page:a,children:[]},{id:5326,name:"Dış Stop Sol",slug:"dis-stop-sol",parent:h,is_landing_page:a,children:[]},{id:5329,name:"İç Stop Sağ",slug:"ic-stop-sag",parent:h,is_landing_page:a,children:[]},{id:5332,name:"İç Stop Sol",slug:"ic-stop-sol",parent:h,is_landing_page:a,children:[]},{id:5335,name:"Sağ Stop",slug:"sag-stop",parent:h,is_landing_page:a,children:[]},{id:5338,name:"Sol Stop",slug:"sol-stop",parent:h,is_landing_page:a,children:[]},{id:5341,name:"Stop",slug:"stop",parent:h,is_landing_page:a,children:[]},{id:5344,name:"Stop Ampulu",slug:"stop-ampulu",parent:h,is_landing_page:a,children:[]},{id:5347,name:"Stop Camı",slug:"stop-cami",parent:h,is_landing_page:a,children:[]},{id:5350,name:"Plaka Lambası",slug:"plaka-lambasi",parent:h,is_landing_page:a,children:[]},{id:5353,name:"Arka Tampon",slug:"arka-tampon",parent:h,is_landing_page:a,children:[]},{id:5356,name:"Arka Tampon Bandı",slug:"arka-tampon-bandi",parent:h,is_landing_page:a,children:[]},{id:5359,name:"Arka Tampon Braketi",slug:"arka-tampon-braketi",parent:h,is_landing_page:a,children:[]},{id:5362,name:"Arka Tampon Çeki Demir Kapağı",slug:"arka-tampon-ceki-demir-kapagi",parent:h,is_landing_page:a,children:[]},{id:5365,name:"Arka Tampon Demiri",slug:"arka-tampon-demiri",parent:h,is_landing_page:a,children:[]},{id:5368,name:"Arka Tampon Köpüğü",slug:"arka-tampon-kopugu",parent:h,is_landing_page:a,children:[]},{id:5371,name:"Arka Tampon Köşesi",slug:"arka-tampon-kosesi",parent:h,is_landing_page:a,children:[]},{id:5374,name:"Arka Tampon Nikelajı",slug:"arka-tampon-nikelaji",parent:h,is_landing_page:a,children:[]},{id:5377,name:"Arka Çamurluk",slug:"arka-camurluk",parent:h,is_landing_page:a,children:[]},{id:5380,name:"Arka Kapı",slug:"arka-kapi",parent:h,is_landing_page:a,children:[]},{id:5383,name:"Bagaj Kapağı",slug:"bagaj-kapagi",parent:h,is_landing_page:a,children:[]},{id:5386,name:"Bagaj Menteşesi",slug:"bagaj-mentesesi",parent:h,is_landing_page:a,children:[]},{id:5389,name:"Bagaj Yayı",slug:"bagaj-yayi",parent:h,is_landing_page:a,children:[]},{id:5392,name:"Çamurluk Bağlantı Sacları",slug:"camurluk-baglanti-saclari",parent:h,is_landing_page:a,children:[]},{id:5398,name:"Kapı Menteşeleri",slug:"kapi-menteseleri",parent:h,is_landing_page:a,children:[]},{id:5401,name:"Motor Kaput Menteşeleri",slug:"motor-kaput-menteseleri",parent:h,is_landing_page:a,children:[]},{id:5404,name:"Motor Kaputu",slug:"motor-kaputu",parent:h,is_landing_page:a,children:[]},{id:5407,name:"Ön Çamurluk",slug:"on-camurluk",parent:h,is_landing_page:a,children:[]},{id:5410,name:"Ön Kapı",slug:"on-kapi",parent:h,is_landing_page:a,children:[]},{id:5413,name:"Ön Sağ Çamurluk",slug:"on-sag-camurluk",parent:h,is_landing_page:a,children:[]},{id:5416,name:"Ön Sol Çamurluk",slug:"on-sol-camurluk",parent:h,is_landing_page:a,children:[]},{id:5419,name:"Sağ Arka Çamurluk",slug:"sag-arka-camurluk",parent:h,is_landing_page:a,children:[]},{id:5422,name:"Sol Arka Çamurluk",slug:"sol-arka-camurluk",parent:h,is_landing_page:a,children:[]},{id:5425,name:"Sürgülü Kapı",slug:"surgulu-kapi",parent:h,is_landing_page:a,children:[]},{id:5428,name:"Motor Kaput Amortisörü",slug:"motor-kaput-amortisoru",parent:h,is_landing_page:a,children:[]},{id:5431,name:"Çamurluk Somunu",slug:"camurluk-somunu",parent:h,is_landing_page:a,children:[]},{id:5434,name:"Motor Kaput Açma Teli",slug:"motor-kaput-acma-teli",parent:h,is_landing_page:a,children:[]},{id:5437,name:"Kapı Ayar Lastiği",slug:"kapi-ayar-lastigi",parent:h,is_landing_page:a,children:[]},{id:5440,name:"Arka Panel",slug:"arka-panel",parent:h,is_landing_page:a,children:[]},{id:5443,name:"Arka Panel Ara Sacı",slug:"arka-panel-ara-saci",parent:h,is_landing_page:a,children:[]},{id:5446,name:"Arka Panel Traversi",slug:"arka-panel-traversi",parent:h,is_landing_page:a,children:[]},{id:5449,name:"Marşbiyel",slug:"marsbiyel",parent:h,is_landing_page:a,children:[]},{id:5452,name:"Marşbiyel Sacı",slug:"marsbiyel-saci",parent:h,is_landing_page:a,children:[]},{id:5455,name:"Ön Panel",slug:"on-panel",parent:h,is_landing_page:a,children:[]},{id:5458,name:"Ön Panel Traversi",slug:"on-panel-traversi",parent:h,is_landing_page:a,children:[]},{id:5461,name:"Radyatör Alt Sacı",slug:"radyator-alt-saci",parent:h,is_landing_page:a,children:[]},{id:5464,name:"Şase",slug:"sase",parent:h,is_landing_page:a,children:[]},{id:5467,name:"Şase Kolu",slug:"sase-kolu",parent:h,is_landing_page:a,children:[]},{id:5470,name:"Şase Traversi",slug:"sase-traversi",parent:h,is_landing_page:a,children:[]},{id:5473,name:"Ön Tampon",slug:"on-tampon",parent:h,is_landing_page:a,children:[]},{id:5476,name:"Ön Tampon Bandı",slug:"on-tampon-bandi",parent:h,is_landing_page:a,children:[]},{id:5479,name:"Ön Tampon Braketi",slug:"on-tampon-braketi",parent:h,is_landing_page:a,children:[]},{id:5488,name:"Ön Tampon Demiri",slug:"on-tampon-demiri",parent:h,is_landing_page:a,children:[]},{id:5491,name:"Ön Tampon Izgarası",slug:"on-tampon-izgarasi",parent:h,is_landing_page:a,children:[]},{id:5494,name:"Ön Tampon Köpüğü",slug:"on-tampon-kopugu",parent:h,is_landing_page:a,children:[]},{id:5497,name:"Ön Tampon Nikelajı",slug:"on-tampon-nikelaji",parent:h,is_landing_page:a,children:[]},{id:5500,name:"Ön Tampon Panjuru",slug:"on-tampon-panjuru",parent:h,is_landing_page:a,children:[]},{id:5503,name:"Ön Tampon Sis Çerçevesi",slug:"on-tampon-sis-cercevesi",parent:h,is_landing_page:a,children:[]},{id:5506,name:"Ön Tampon Sis Kapağı",slug:"on-tampon-sis-kapagi",parent:h,is_landing_page:a,children:[]}]},{id:e,name:"Elektrik Ve Elektronik Parçalar",slug:"elektrik-ve-elektronik-parcalar",parent:cV,is_landing_page:a,children:[{id:if0,name:"Aydınlatma Parçaları",slug:"aydinlatma-parcalari",parent:e,is_landing_page:a,children:[{id:3374,name:"Far Lambası",slug:"far-lambasi",parent:if0,is_landing_page:a,children:[]},{id:3375,name:"Stop Lambası",slug:"stop-lambasi",parent:if0,is_landing_page:a,children:[]},{id:3376,name:"Sinyal Lambası",slug:"sinyal-lambasi",parent:if0,is_landing_page:a,children:[]},{id:3377,name:"Sis Lambası",slug:"sis-lambasi",parent:if0,is_landing_page:a,children:[]}]},{id:3378,name:"Elektronik Parçalar",slug:"elektronik-parcalar",parent:e,is_landing_page:a,children:[]},{id:3379,name:"Röle",slug:"role",parent:e,is_landing_page:a,children:[]},{id:3380,name:"Sigorta",slug:"sigorta",parent:e,is_landing_page:a,children:[]},{id:3381,name:H,slug:"diger-otomobil-ve-motosiklet-elektronik-elektrikli-parcalar",parent:e,is_landing_page:a,children:[]},{id:4468,name:"Alternatör",slug:"alternator",parent:e,is_landing_page:a,children:[]},{id:4471,name:"Alternatör Kapağı",slug:"alternator-kapagi",parent:e,is_landing_page:a,children:[]},{id:4474,name:"Alternatör Kasnağı",slug:"alternator-kasnagi",parent:e,is_landing_page:a,children:[]},{id:4477,name:"Alternatör Kayışı",slug:"alternator-kayisi",parent:e,is_landing_page:a,children:[]},{id:4480,name:"Konjektör",slug:"konjektor",parent:e,is_landing_page:a,children:[]},{id:4483,name:"Stator",slug:"stator",parent:e,is_landing_page:a,children:[]},{id:4486,name:"Fırça Tutucu",slug:"firca-tutucu",parent:e,is_landing_page:a,children:[]},{id:4489,name:"Anten",slug:"anten",parent:e,is_landing_page:a,children:[]},{id:4492,name:"Anten Çubuğu",slug:"anten-cubugu",parent:e,is_landing_page:a,children:[]},{id:4495,name:"Anten Kablosu",slug:"anten-kablosu",parent:e,is_landing_page:a,children:[]},{id:4498,name:"Anten Tabanı",slug:"anten-tabani",parent:e,is_landing_page:a,children:[]},{id:4501,name:"Çakmak",slug:"cakmak",parent:e,is_landing_page:a,children:[]},{id:4504,name:"Çakmaklık",slug:"cakmaklik",parent:e,is_landing_page:a,children:[]},{id:4507,name:"Korna",slug:"korna",parent:e,is_landing_page:a,children:[]},{id:4510,name:"Korna Rölesi",slug:"korna-rolesi",parent:e,is_landing_page:a,children:[]},{id:4513,name:"Abs Beyni",slug:"abs-beyni",parent:e,is_landing_page:a,children:[]},{id:4516,name:"Airbag Beyni",slug:"airbag-beyni",parent:e,is_landing_page:a,children:[]},{id:4519,name:"Body Computer",slug:"body-computer",parent:e,is_landing_page:a,children:[]},{id:4522,name:"Direksiyon Airbag",slug:"direksiyon-airbag",parent:e,is_landing_page:a,children:[]},{id:4525,name:"Direksiyon Hava Yastığı",slug:"direksiyon-hava-yastigi",parent:e,is_landing_page:a,children:[]},{id:4528,name:"Hava Yastığı Beyni",slug:"hava-yastigi-beyni",parent:e,is_landing_page:a,children:[]},{id:4531,name:"Koltuk Airbag",slug:"koltuk-airbag",parent:e,is_landing_page:a,children:[]},{id:4534,name:"Koltuk Hava Yastığı",slug:"koltuk-hava-yastigi",parent:e,is_landing_page:a,children:[]},{id:4537,name:"Park Sensör Beyni",slug:"park-sensor-beyni",parent:e,is_landing_page:a,children:[]},{id:4543,name:"Tavan Airbag",slug:"tavan-airbag",parent:e,is_landing_page:a,children:[]},{id:4546,name:"Tavan Hava Yastığı",slug:"tavan-hava-yastigi",parent:e,is_landing_page:a,children:[]},{id:4549,name:"Tesisatlar",slug:"tesisatlar",parent:e,is_landing_page:a,children:[]},{id:4552,name:"Yolcu Airbag",slug:"yolcu-airbag",parent:e,is_landing_page:a,children:[]},{id:4555,name:"Yolcu Hava Yastığpı",slug:"yolcu-hava-yastigpi",parent:e,is_landing_page:a,children:[]},{id:4558,name:"Anahtarı Buton Grubu",slug:"anahtari-buton-grubu",parent:e,is_landing_page:a,children:[]},{id:4561,name:"Arka Cam Anahtarı",slug:"arka-cam-anahtari",parent:e,is_landing_page:a,children:[]},{id:4564,name:"Arka Silecek Anahtarı",slug:"arka-silecek-anahtari",parent:e,is_landing_page:a,children:[]},{id:4567,name:"Asr-Esp Anahtarı",slug:"asr-esp-anahtari",parent:e,is_landing_page:a,children:[]},{id:4570,name:"Ayna Ayar Anahtarı",slug:"ayna-ayar-anahtari",parent:e,is_landing_page:a,children:[]},{id:4573,name:"Ayna Kumanda Anahtarı",slug:"ayna-kumanda-anahtari",parent:e,is_landing_page:a,children:[]},{id:4576,name:"Far Anahtarı",slug:"far-anahtari",parent:e,is_landing_page:a,children:[]},{id:4579,name:"Far Ayar Anahtarı",slug:"far-ayar-anahtari",parent:e,is_landing_page:a,children:[]},{id:4582,name:"Far Kolu",slug:"far-kolu",parent:e,is_landing_page:a,children:[]},{id:4585,name:"Far-Sinyal Kolu",slug:"far-sinyal-kolu",parent:e,is_landing_page:a,children:[]},{id:4588,name:"Flaşör Anahtarı",slug:"flasor-anahtari",parent:e,is_landing_page:a,children:[]},{id:4591,name:"Merkezi Kilit Anahtarı",slug:"merkezi-kilit-anahtari",parent:e,is_landing_page:a,children:[]},{id:4594,name:"Ön Cam Anahtarı",slug:"on-cam-anahtari",parent:e,is_landing_page:a,children:[]},{id:4597,name:"Rezistans Anahtarı",slug:"rezistans-anahtari",parent:e,is_landing_page:a,children:[]},{id:4600,name:"Sinyal Kolu",slug:"sinyal-kolu",parent:e,is_landing_page:a,children:[]},{id:4603,name:"Sis Anahtarı",slug:"sis-anahtari",parent:e,is_landing_page:a,children:[]},{id:4609,name:"Kontak",slug:"kontak",parent:e,is_landing_page:a,children:[]},{id:4612,name:"Kontak Termiği",slug:"kontak-termigi",parent:e,is_landing_page:a,children:[]},{id:4615,name:"Marş Burcu",slug:"mars-burcu",parent:e,is_landing_page:a,children:[]},{id:4618,name:"Marş Çatalı",slug:"mars-catali",parent:e,is_landing_page:a,children:[]},{id:4621,name:"Marş Dişlisi",slug:"mars-dislisi",parent:e,is_landing_page:a,children:[]},{id:4624,name:"Marş Kollektörü",slug:"mars-kollektoru",parent:e,is_landing_page:a,children:[]},{id:4627,name:"Marş Kömürü",slug:"mars-komuru",parent:e,is_landing_page:a,children:[]},{id:4630,name:"Marş Motoru",slug:"mars-motoru",parent:e,is_landing_page:a,children:[]},{id:4633,name:"Marş Otomatiği",slug:"mars-otomatigi",parent:e,is_landing_page:a,children:[]},{id:4636,name:"Marş Ön Kapağı",slug:"mars-on-kapagi",parent:e,is_landing_page:a,children:[]},{id:4639,name:"Pinyon Kapağı",slug:"pinyon-kapagi",parent:e,is_landing_page:a,children:[]},{id:4642,name:"Airbag Darbe Sensörü",slug:"airbag-darbe-sensoru",parent:e,is_landing_page:a,children:[]},{id:4645,name:"Arka Abs Hız Sensörü",slug:"arka-abs-hiz-sensoru",parent:e,is_landing_page:a,children:[]},{id:4648,name:"Buharlaşma Sensörü",slug:"buharlasma-sensoru",parent:e,is_landing_page:a,children:[]},{id:4651,name:"Debriyaj Sensörü",slug:"debriyaj-sensoru",parent:e,is_landing_page:a,children:[]},{id:4654,name:"Eksantrik Sensörü",slug:"eksantrik-sensoru",parent:e,is_landing_page:a,children:[]},{id:4657,name:"Emme Manifold Sensörü",slug:"emme-manifold-sensoru",parent:e,is_landing_page:a,children:[]},{id:4660,name:"Far Sensörü",slug:"far-sensoru",parent:e,is_landing_page:a,children:[]},{id:4663,name:"Fren Sensörü",slug:"fren-sensoru",parent:e,is_landing_page:a,children:[]},{id:4666,name:"Gaz Pedal Sensörü",slug:"gaz-pedal-sensoru",parent:e,is_landing_page:a,children:[]},{id:4669,name:"Hararet Müşürü",slug:"hararet-musuru",parent:e,is_landing_page:a,children:[]},{id:4672,name:"Isı Sensörü",slug:"isi-sensoru",parent:e,is_landing_page:a,children:[]},{id:4675,name:"Kilometre Sensörü",slug:"kilometre-sensoru",parent:e,is_landing_page:a,children:[]},{id:4678,name:"Krank Sensörü",slug:"krank-sensoru",parent:e,is_landing_page:a,children:[]},{id:4681,name:"Lastik Basınç Sensörü",slug:"lastik-basinc-sensoru",parent:e,is_landing_page:a,children:[]},{id:4684,name:"Map Sensörü",slug:"map-sensoru",parent:e,is_landing_page:a,children:[]},{id:4687,name:"Oksijen-Lambda Sensörü",slug:"oksijen-lambda-sensoru",parent:e,is_landing_page:a,children:[]},{id:4690,name:"Ön Abs Hız Sensörü",slug:"on-abs-hiz-sensoru",parent:e,is_landing_page:a,children:[]},{id:4693,name:"Park Sensörü",slug:"park-sensoru",parent:e,is_landing_page:a,children:[]},{id:4696,name:"Vuruntu Sensörü",slug:"vuruntu-sensoru",parent:e,is_landing_page:a,children:[]},{id:4699,name:"Yağ Müşürü",slug:"yag-musuru",parent:e,is_landing_page:a,children:[]},{id:4702,name:"Yağmur Sensörü",slug:"yagmur-sensoru",parent:e,is_landing_page:a,children:[]},{id:4705,name:"Basınç Sensörü",slug:"basinc-sensoru",parent:e,is_landing_page:a,children:[]},{id:4708,name:"Oksijen Sensörü",slug:"oksijen-sensoru",parent:e,is_landing_page:a,children:[]},{id:4711,name:"Faz Sensörü",slug:"faz-sensoru",parent:e,is_landing_page:a,children:[]},{id:4714,name:"Ön Abs Sensörü",slug:"on-abs-sensoru",parent:e,is_landing_page:a,children:[]},{id:4717,name:"Abs Sensörü",slug:"abs-sensoru",parent:e,is_landing_page:a,children:[]},{id:4720,name:"Fren Müşürü",slug:"fren-musuru",parent:e,is_landing_page:a,children:[]},{id:4723,name:"Sıcaklık Sensörü",slug:"sicaklik-sensoru",parent:e,is_landing_page:a,children:[]},{id:4726,name:"Pozisyon Sensörü",slug:"pozisyon-sensoru",parent:e,is_landing_page:a,children:[]},{id:4729,name:"Arka Abs Sensörü",slug:"arka-abs-sensoru",parent:e,is_landing_page:a,children:[]},{id:4732,name:"Kızdırma Rolesi",slug:"kizdirma-rolesi",parent:e,is_landing_page:a,children:[]},{id:4735,name:"Gaz Kelebek Sensörü",slug:"gaz-kelebek-sensoru",parent:e,is_landing_page:a,children:[]},{id:4738,name:"Abs Sensörü Ön",slug:"abs-sensoru-on",parent:e,is_landing_page:a,children:[]},{id:4741,name:"Abs Sensörü Arka",slug:"abs-sensoru-arka",parent:e,is_landing_page:a,children:[]},{id:4744,name:"Gaz Kelebek Potansiyometresi",slug:"gaz-kelebek-potansiyometresi",parent:e,is_landing_page:a,children:[]},{id:4747,name:"Hararet Sensörü",slug:"hararet-sensoru",parent:e,is_landing_page:a,children:[]},{id:4750,name:"Devir Sensörü",slug:"devir-sensoru",parent:e,is_landing_page:a,children:[]},{id:4753,name:"Ateşleme Sensörü",slug:"atesleme-sensoru",parent:e,is_landing_page:a,children:[]},{id:4756,name:"Rolanti Sensörü",slug:"rolanti-sensoru",parent:e,is_landing_page:a,children:[]},{id:4759,name:"Darbe Sensörü",slug:"darbe-sensoru",parent:e,is_landing_page:a,children:[]},{id:4762,name:"Fan Rolesi",slug:"fan-rolesi",parent:e,is_landing_page:a,children:[]},{id:4765,name:"Mazot Filtre Sensörü",slug:"mazot-filtre-sensoru",parent:e,is_landing_page:a,children:[]},{id:4768,name:"Mazot Filtre Müşürü",slug:"mazot-filtre-musuru",parent:e,is_landing_page:a,children:[]},{id:4771,name:"Volan Sensörü",slug:"volan-sensoru",parent:e,is_landing_page:a,children:[]},{id:4774,name:"Sensör",slug:"sensor",parent:e,is_landing_page:a,children:[]},{id:4777,name:"Flaşör",slug:"flasor",parent:e,is_landing_page:a,children:[]},{id:4783,name:"Arka Silecek Kolu",slug:"arka-silecek-kolu",parent:e,is_landing_page:a,children:[]},{id:4789,name:"Arka Silecek Motoru",slug:"arka-silecek-motoru",parent:e,is_landing_page:a,children:[]},{id:4792,name:"Far Silecek Motoru",slug:"far-silecek-motoru",parent:e,is_landing_page:a,children:[]},{id:4795,name:"Kapı Işık Butonu",slug:"kapi-isik-butonu",parent:e,is_landing_page:a,children:[]},{id:4798,name:"Kutupbaşı",slug:"kutupbasi",parent:e,is_landing_page:a,children:[]},{id:4801,name:"Ön Silecek Kolu",slug:"on-silecek-kolu",parent:e,is_landing_page:a,children:[]},{id:4804,name:"Ön Silecek Mekanizması",slug:"on-silecek-mekanizmasi",parent:e,is_landing_page:a,children:[]},{id:4807,name:"Ön Silecek Motoru",slug:"on-silecek-motoru",parent:e,is_landing_page:a,children:[]},{id:4813,name:"Silecek Frezeleri",slug:"silecek-frezeleri",parent:e,is_landing_page:a,children:[]},{id:4816,name:"Silecek Kolu",slug:"silecek-kolu",parent:e,is_landing_page:a,children:[]},{id:4819,name:"Silecek Rölesi",slug:"silecek-rolesi",parent:e,is_landing_page:a,children:[]},{id:4822,name:"Silecek Su Depo Kapağı",slug:"silecek-su-depo-kapagi",parent:e,is_landing_page:a,children:[]},{id:4825,name:"Silecek Su Depo Motoru",slug:"silecek-su-depo-motoru",parent:e,is_landing_page:a,children:[]},{id:4828,name:"Silecek Su Deposu",slug:"silecek-su-deposu",parent:e,is_landing_page:a,children:[]},{id:4831,name:"Silecek Su Fıskiyeleri",slug:"silecek-su-fiskiyeleri",parent:e,is_landing_page:a,children:[]},{id:4834,name:"Silecek Süpürgesi",slug:"silecek-supurgesi",parent:e,is_landing_page:a,children:[]},{id:4837,name:"Arka Silecek",slug:"arka-silecek",parent:e,is_landing_page:a,children:[]},{id:4840,name:"Cam Su Fıskiyesi",slug:"cam-su-fiskiyesi",parent:e,is_landing_page:a,children:[]},{id:4846,name:"Far Fıskiye Kapağı",slug:"far-fiskiye-kapagi",parent:e,is_landing_page:a,children:[]},{id:4849,name:"Arka Silecek Süpürgesi",slug:"arka-silecek-supurgesi",parent:e,is_landing_page:a,children:[]},{id:4852,name:"Cam Su Bidonu Kapağı",slug:"cam-su-bidonu-kapagi",parent:e,is_landing_page:a,children:[]},{id:4855,name:"Silecek Su Fıskiye Motoru",slug:"silecek-su-fiskiye-motoru",parent:e,is_landing_page:a,children:[]},{id:4858,name:"Silecek Zamanlama Rolesi",slug:"silecek-zamanlama-rolesi",parent:e,is_landing_page:a,children:[]},{id:4861,name:"Far Yıkama Rolesi",slug:"far-yikama-rolesi",parent:e,is_landing_page:a,children:[]},{id:4864,name:"Silecek Süpürgesi Kolu",slug:"silecek-supurgesi-kolu",parent:e,is_landing_page:a,children:[]}]},{id:f,name:LQ,slug:LR,parent:cV,is_landing_page:a,children:[{id:4867,name:"Arka Küllük",slug:"arka-kulluk",parent:f,is_landing_page:a,children:[]},{id:4870,name:"Arka Şapkalık",slug:"arka-sapkalik",parent:f,is_landing_page:a,children:[]},{id:4873,name:"Arka Tavan Tutamağı",slug:"arka-tavan-tutamagi",parent:f,is_landing_page:a,children:[]},{id:4876,name:"Bagaj Açma Kolu",slug:"bagaj-acma-kolu",parent:f,is_landing_page:a,children:[]},{id:4879,name:"Bagaj Fitili",slug:"bagaj-fitili",parent:f,is_landing_page:a,children:[]},{id:4882,name:"Bagaj Halısı",slug:"bagaj-halisi",parent:f,is_landing_page:a,children:[]},{id:4885,name:"Bagaj Rafı",slug:"bagaj-rafi",parent:f,is_landing_page:a,children:[]},{id:4888,name:"Cam Bakaliti",slug:"cam-bakaliti",parent:f,is_landing_page:a,children:[]},{id:4891,name:"Difüzör Havalandırma",slug:"difuzor-havalandirma",parent:f,is_landing_page:a,children:[]},{id:4894,name:"Döşeme Üst Plastiği",slug:"doseme-ust-plastigi",parent:f,is_landing_page:a,children:[]},{id:4897,name:"Eşik Bakaliti",slug:"esik-bakaliti",parent:f,is_landing_page:a,children:[]},{id:4900,name:"Eşya Gözü",slug:"esya-gozu",parent:f,is_landing_page:a,children:[]},{id:4903,name:"Fitiller",slug:"fitiller",parent:f,is_landing_page:a,children:[]},{id:4906,name:"Güneşlik",slug:"guneslik",parent:f,is_landing_page:a,children:[]},{id:4912,name:"Hoparlör Kapağı",slug:"hoparlor-kapagi",parent:f,is_landing_page:a,children:[]},{id:4915,name:"İç Dikiz Aynası",slug:"ic-dikiz-aynasi",parent:f,is_landing_page:a,children:[]},{id:4918,name:"İçten Açma Kolu",slug:"icten-acma-kolu",parent:f,is_landing_page:a,children:[]},{id:4921,name:"Kapı Cebi",slug:"kapi-cebi",parent:f,is_landing_page:a,children:[]},{id:4924,name:"Kapı Döşemesi",slug:"kapi-dosemesi",parent:f,is_landing_page:a,children:[]},{id:4927,name:"Kapı Kolçağı",slug:"kapi-kolcagi",parent:f,is_landing_page:a,children:[]},{id:4930,name:"Klipsler",slug:"klipsler",parent:f,is_landing_page:a,children:[]},{id:4933,name:"Kolçak",slug:"kolcak",parent:f,is_landing_page:a,children:[]},{id:4936,name:"Koltuk Ayar Kolu",slug:"koltuk-ayar-kolu",parent:f,is_landing_page:a,children:[]},{id:4939,name:"Koltuk Kaplaması",slug:"koltuk-kaplamasi",parent:f,is_landing_page:a,children:[]},{id:4942,name:"Konsol",slug:"konsol",parent:f,is_landing_page:a,children:[]},{id:4945,name:"Küllük",slug:"kulluk",parent:f,is_landing_page:a,children:[]},{id:4948,name:"Motor Kaput Açma Kolu",slug:"motor-kaput-acma-kolu",parent:f,is_landing_page:a,children:[]},{id:4951,name:"Orta Difüzör",slug:"orta-difuzor",parent:f,is_landing_page:a,children:[]},{id:4954,name:"Orta Direk Bakaliti",slug:"orta-direk-bakaliti",parent:f,is_landing_page:a,children:[]},{id:4957,name:"Ön Cam Fitili",slug:"on-cam-fitili",parent:f,is_landing_page:a,children:[]},{id:4960,name:"Ön Direk Bakaliti",slug:"on-direk-bakaliti",parent:f,is_landing_page:a,children:[]},{id:4963,name:"Ön Kapı Fitili",slug:"on-kapi-fitili",parent:f,is_landing_page:a,children:[]},{id:4966,name:"Ön Küllük",slug:"on-kulluk",parent:f,is_landing_page:a,children:[]},{id:4969,name:"Ön Tavan Tutamağı",slug:"on-tavan-tutamagi",parent:f,is_landing_page:a,children:[]},{id:4972,name:"Sağ Difüzör",slug:"sag-difuzor",parent:f,is_landing_page:a,children:[]},{id:4975,name:"Sol Difüzör",slug:"sol-difuzor",parent:f,is_landing_page:a,children:[]},{id:4978,name:"Sürgülü Kapı Fitili",slug:"surgulu-kapi-fitili",parent:f,is_landing_page:a,children:[]},{id:4981,name:"Taban Döşemesi",slug:"taban-dosemesi",parent:f,is_landing_page:a,children:[]},{id:4984,name:"Tavan Döşemesi",slug:"tavan-dosemesi",parent:f,is_landing_page:a,children:[]},{id:4987,name:"Tavan El Tutamağı",slug:"tavan-el-tutamagi",parent:f,is_landing_page:a,children:[]},{id:4990,name:"Torpido",slug:"torpido",parent:f,is_landing_page:a,children:[]},{id:4993,name:"Torpido Alt Rafı",slug:"torpido-alt-rafi",parent:f,is_landing_page:a,children:[]},{id:4996,name:"Torpido Kapağı",slug:"torpido-kapagi",parent:f,is_landing_page:a,children:[]},{id:4999,name:"Torpido Kilidi",slug:"torpido-kilidi",parent:f,is_landing_page:a,children:[]},{id:5002,name:"Klips",slug:"klips",parent:f,is_landing_page:a,children:[]},{id:5005,name:"Pedal Lastiği",slug:"pedal-lastigi",parent:f,is_landing_page:a,children:[]},{id:5008,name:"Tapa",slug:"tapa",parent:f,is_landing_page:a,children:[]},{id:5011,name:"Güneşlik Ayağı",slug:"guneslik-ayagi",parent:f,is_landing_page:a,children:[]},{id:5014,name:"Gaz Pedal Lastiği",slug:"gaz-pedal-lastigi",parent:f,is_landing_page:a,children:[]},{id:5017,name:"Difüzör",slug:"difuzor",parent:f,is_landing_page:a,children:[]},{id:5020,name:"Fren Pedal Lastiği",slug:"fren-pedal-lastigi",parent:f,is_landing_page:a,children:[]},{id:5023,name:"Debriyaj Pedal Lastiği",slug:"debriyaj-pedal-lastigi",parent:f,is_landing_page:a,children:[]},{id:5026,name:"Radyo Çerçevesi",slug:"radyo-cercevesi",parent:f,is_landing_page:a,children:[]},{id:5029,name:"Torpido Açma Kolu",slug:"torpido-acma-kolu",parent:f,is_landing_page:a,children:[]},{id:5035,name:"Gösterge Çerçevesi",slug:"gosterge-cercevesi",parent:f,is_landing_page:a,children:[]},{id:5038,name:"Arka Cam Açma Anahtarı",slug:"arka-cam-acma-anahtari",parent:f,is_landing_page:a,children:[]},{id:5041,name:"Arka Cam Açma Halatı",slug:"arka-cam-acma-halati",parent:f,is_landing_page:a,children:[]},{id:5044,name:"Arka Cam Açma Kolu",slug:"arka-cam-acma-kolu",parent:f,is_landing_page:a,children:[]},{id:5047,name:"Arka Cam Kriko Tamir Takımı",slug:"arka-cam-kriko-tamir-takimi",parent:f,is_landing_page:a,children:[]},{id:5050,name:"Arka Kapı Cam Motoru Elektrikli",slug:"arka-kapi-cam-motoru-elektrikli",parent:f,is_landing_page:a,children:[]},{id:5053,name:"Arka Cam Krikosu",slug:"arka-cam-krikosu",parent:f,is_landing_page:a,children:[]},{id:5056,name:"Cam Denge Plastiği",slug:"cam-denge-plastigi",parent:f,is_landing_page:a,children:[]},{id:5059,name:"Ön Cam Açma Anahtarı",slug:"on-cam-acma-anahtari",parent:f,is_landing_page:a,children:[]},{id:5062,name:"Ön Cam Açma Halatı",slug:"on-cam-acma-halati",parent:f,is_landing_page:a,children:[]},{id:5065,name:"Ön Cam Kolu",slug:"on-cam-kolu",parent:f,is_landing_page:a,children:[]},{id:5068,name:"Ön Cam Kriko Tamir Takımı",slug:"on-cam-kriko-tamir-takimi",parent:f,is_landing_page:a,children:[]},{id:5071,name:"Ön Cam Krikosu",slug:"on-cam-krikosu",parent:f,is_landing_page:a,children:[]},{id:5074,name:"Ön Cam Motoru Elektrikli",slug:"on-cam-motoru-elektrikli",parent:f,is_landing_page:a,children:[]},{id:5077,name:"Sürgülü Kapı Cam Krikosu",slug:"surgulu-kapi-cam-krikosu",parent:f,is_landing_page:a,children:[]},{id:5080,name:"Sürgülü Kapı Cam Motoru Elektrikli",slug:"surgulu-kapi-cam-motoru-elektrikli",parent:f,is_landing_page:a,children:[]},{id:5083,name:"Arka Bagaj Kilidi",slug:"arka-bagaj-kilidi",parent:f,is_landing_page:a,children:[]},{id:5086,name:"Arka Kapı Açma Teli",slug:"arka-kapi-acma-teli",parent:f,is_landing_page:a,children:[]},{id:5089,name:"Arka Kapı Gergisi",slug:"arka-kapi-gergisi",parent:f,is_landing_page:a,children:[]},{id:5092,name:"Arka Kapı İçten Açma Mekanizması",slug:"arka-kapi-icten-acma-mekanizmasi",parent:f,is_landing_page:a,children:[]},{id:5095,name:"Arka Kapı Kilidi",slug:"arka-kapi-kilidi",parent:f,is_landing_page:a,children:[]},{id:5098,name:"Arka Kapı Kilit Karşılığı",slug:"arka-kapi-kilit-karsiligi",parent:f,is_landing_page:a,children:[]},{id:5101,name:"Arka Kapı Kolu",slug:"arka-kapi-kolu",parent:f,is_landing_page:a,children:[]},{id:5107,name:"Bagaj Açma Teli",slug:"bagaj-acma-teli",parent:f,is_landing_page:a,children:[]},{id:5110,name:"Bagaj Amortisörü",slug:"bagaj-amortisoru",parent:f,is_landing_page:a,children:[]},{id:5113,name:"Bagaj İçten Açma Mekanizması",slug:"bagaj-icten-acma-mekanizmasi",parent:f,is_landing_page:a,children:[]},{id:5116,name:"Bagaj Kapağı Gergisi",slug:"bagaj-kapagi-gergisi",parent:f,is_landing_page:a,children:[]},{id:5119,name:"Bagaj Kapağı Kilit Karşılığı",slug:"bagaj-kapagi-kilit-karsiligi",parent:f,is_landing_page:a,children:[]},{id:5122,name:"Bagaj Kilidi",slug:"bagaj-kilidi",parent:f,is_landing_page:a,children:[]},{id:5125,name:"İç Açma Kolu Bagaj",slug:"ic-acma-kolu-bagaj",parent:f,is_landing_page:a,children:[]},{id:5128,name:"İç Açma Kolu Orta",slug:"ic-acma-kolu-orta",parent:f,is_landing_page:a,children:[]},{id:5131,name:"İç Açma Kolu Ön",slug:"ic-acma-kolu-on",parent:f,is_landing_page:a,children:[]},{id:5134,name:"Kapı Pimi",slug:"kapi-pimi",parent:f,is_landing_page:a,children:[]},{id:5137,name:"Kilit Seti",slug:"kilit-seti",parent:f,is_landing_page:a,children:[]},{id:5140,name:"Ön Kapı Gergisi",slug:"on-kapi-gergisi",parent:f,is_landing_page:a,children:[]},{id:5143,name:"Ön Kapı İçten Açma Mekanizması",slug:"on-kapi-icten-acma-mekanizmasi",parent:f,is_landing_page:a,children:[]},{id:5146,name:"Ön Kapı Kilidi",slug:"on-kapi-kilidi",parent:f,is_landing_page:a,children:[]},{id:5149,name:"Ön Kapı Kilit Karşılığı",slug:"on-kapi-kilit-karsiligi",parent:f,is_landing_page:a,children:[]},{id:5152,name:"Ön Kapı Kolu",slug:"on-kapi-kolu",parent:f,is_landing_page:a,children:[]},{id:5155,name:"Ön Kaput Açma Teli",slug:"on-kaput-acma-teli",parent:f,is_landing_page:a,children:[]},{id:5158,name:"Ön Kaput Dayama Demiri",slug:"on-kaput-dayama-demiri",parent:f,is_landing_page:a,children:[]},{id:5161,name:"Ön Kaput Kilidi",slug:"on-kaput-kilidi",parent:f,is_landing_page:a,children:[]},{id:5163,name:"Sürgülü Cam Mandalı",slug:"surgulu-cam-mandali",parent:f,is_landing_page:a,children:[]},{id:5166,name:"Sürgülü Kapı Açma Teli",slug:"surgulu-kapi-acma-teli",parent:f,is_landing_page:a,children:[]},{id:5169,name:"Sürgülü Kapı Alt Mekanizma",slug:"surgulu-kapi-alt-mekanizma",parent:f,is_landing_page:a,children:[]},{id:5172,name:"Sürgülü Kapı Kilidi",slug:"surgulu-kapi-kilidi",parent:f,is_landing_page:a,children:[]},{id:5175,name:"Sürgülü Kapı Kilit Karşılığı",slug:"surgulu-kapi-kilit-karsiligi",parent:f,is_landing_page:a,children:[]},{id:5178,name:"Sürgülü Kapı Kolu",slug:"surgulu-kapi-kolu",parent:f,is_landing_page:a,children:[]},{id:5181,name:"Sürgülü Kapı Kontağı",slug:"surgulu-kapi-kontagi",parent:f,is_landing_page:a,children:[]},{id:5184,name:"Sürgülü Kapı Orta Mekanizma",slug:"surgulu-kapi-orta-mekanizma",parent:f,is_landing_page:a,children:[]},{id:5187,name:"Sürgülü Kapı Üst Mekanizma",slug:"surgulu-kapi-ust-mekanizma",parent:f,is_landing_page:a,children:[]},{id:5190,name:"Şifre",slug:"sifre",parent:f,is_landing_page:a,children:[]},{id:5193,name:"Şifre Seti",slug:"sifre-seti",parent:f,is_landing_page:a,children:[]},{id:5196,name:"Bagaj Kapı Kolu",slug:"bagaj-kapi-kolu",parent:f,is_landing_page:a,children:[]},{id:5199,name:"Bagaj Kilit Karşılığı",slug:"bagaj-kilit-karsiligi",parent:f,is_landing_page:a,children:[]},{id:5202,name:"Sürgülü Kapı Mekanizması Alt",slug:"surgulu-kapi-mekanizmasi-alt",parent:f,is_landing_page:a,children:[]},{id:5205,name:"Sürgülü Kapı Mekanizması Üst",slug:"surgulu-kapi-mekanizmasi-ust",parent:f,is_landing_page:a,children:[]},{id:5208,name:"Sürgülü Kapı Mekanizması",slug:"surgulu-kapi-mekanizmasi",parent:f,is_landing_page:a,children:[]},{id:5211,name:"İçten Açma Kolu Bagaj",slug:"icten-acma-kolu-bagaj",parent:f,is_landing_page:a,children:[]},{id:5214,name:"Motor Kaput Kilidi",slug:"motor-kaput-kilidi",parent:f,is_landing_page:a,children:[]},{id:5217,name:"Ön İçten Açma Kolu",slug:"on-icten-acma-kolu",parent:f,is_landing_page:a,children:[]},{id:5220,name:"İç Açma Kolu",slug:"ic-acma-kolu",parent:f,is_landing_page:a,children:[]},{id:5223,name:"İç Açma Kolu Arka",slug:"ic-acma-kolu-arka",parent:f,is_landing_page:a,children:[]}]},{id:l,name:"Dış Trim Parçaları",slug:"dis-trim-parcalari",parent:cV,is_landing_page:a,children:[{id:4336,name:"Akü Alt Muhafaza",slug:"aku-alt-muhafaza",parent:l,is_landing_page:a,children:[]},{id:4339,name:"Arka Tampon Çeki Kapağı",slug:"arka-tampon-ceki-kapagi",parent:l,is_landing_page:a,children:[]},{id:4342,name:"Armalar",slug:"armalar",parent:l,is_landing_page:a,children:[]},{id:4345,name:"Bijon Anahtarı",slug:"bijon-anahtari",parent:l,is_landing_page:a,children:[]},{id:4348,name:"Çamurluk Bantları",slug:"camurluk-bantlari",parent:l,is_landing_page:a,children:[]},{id:4351,name:"Çamurluk Davlumbazı",slug:"camurluk-davlumbazi",parent:l,is_landing_page:a,children:[]},{id:4354,name:"Dış Ayna Camı",slug:"dis-ayna-cami",parent:l,is_landing_page:a,children:[]},{id:4357,name:"Dış Depo Kapağı",slug:"dis-depo-kapagi",parent:l,is_landing_page:a,children:[]},{id:4360,name:"Dış Dikiz Aynası",slug:"dis-dikiz-aynasi",parent:l,is_landing_page:a,children:[]},{id:4363,name:"Dış Kapı Kolu",slug:"dis-kapi-kolu",parent:l,is_landing_page:a,children:[]},{id:4366,name:"Kapı Bantları",slug:"kapi-bantlari",parent:l,is_landing_page:a,children:[]},{id:4369,name:"Kapı Direk Bantları",slug:"kapi-direk-bantlari",parent:l,is_landing_page:a,children:[]},{id:4372,name:"Karter Muhafazası",slug:"karter-muhafazasi",parent:l,is_landing_page:a,children:[]},{id:4375,name:"Kayış Muhafazaları",slug:"kayis-muhafazalari",parent:l,is_landing_page:a,children:[]},{id:4381,name:"Logolar",slug:"logolar",parent:l,is_landing_page:a,children:[]},{id:4384,name:"Marşbiyel Bakaliti",slug:"marsbiyel-bakaliti",parent:l,is_landing_page:a,children:[]},{id:4387,name:"Motor Kaput İzalatörü",slug:"motor-kaput-izalatoru",parent:l,is_landing_page:a,children:[]},{id:4390,name:"Ön Cam Havalandırma Izgarası",slug:"on-cam-havalandirma-izgarasi",parent:l,is_landing_page:a,children:[]},{id:4393,name:"Ön Tampon Çeki Demiri",slug:"on-tampon-ceki-demiri",parent:l,is_landing_page:a,children:[]},{id:4396,name:"Ön Tampon Çeki Kapağı",slug:"on-tampon-ceki-kapagi",parent:l,is_landing_page:a,children:[]},{id:4399,name:"Radyatör Panjuru",slug:"radyator-panjuru",parent:l,is_landing_page:a,children:[]},{id:4402,name:"Sis Çerçevesi",slug:"sis-cercevesi",parent:l,is_landing_page:a,children:[]},{id:4405,name:"Sis Kapağı",slug:"sis-kapagi",parent:l,is_landing_page:a,children:[]},{id:4408,name:"Stepne",slug:"stepne",parent:l,is_landing_page:a,children:[]},{id:4411,name:"Stepne Civatası",slug:"stepne-civatasi",parent:l,is_landing_page:a,children:[]},{id:4414,name:"Stepne Mekanizması",slug:"stepne-mekanizmasi",parent:l,is_landing_page:a,children:[]},{id:4417,name:"Tampon Fıskiye Kapağı",slug:"tampon-fiskiye-kapagi",parent:l,is_landing_page:a,children:[]},{id:4420,name:"Tampon Kaplamaları",slug:"tampon-kaplamalari",parent:l,is_landing_page:a,children:[]},{id:4423,name:"Tampon Panjuru",slug:"tampon-panjuru",parent:l,is_landing_page:a,children:[]},{id:4426,name:"Tavan Lastikleri",slug:"tavan-lastikleri",parent:l,is_landing_page:a,children:[]},{id:4429,name:"Yazılar",slug:"yazilar",parent:l,is_landing_page:a,children:[]},{id:4432,name:"Arka Tampon Çeki Demiri Kapağı",slug:"arka-tampon-ceki-demiri-kapagi",parent:l,is_landing_page:a,children:[]},{id:4435,name:"Paçalık",slug:"pacalik",parent:l,is_landing_page:a,children:[]},{id:4438,name:"Kapı Fitili",slug:"kapi-fitili",parent:l,is_landing_page:a,children:[]},{id:4441,name:"Depo Kapağı",slug:"depo-kapagi",parent:l,is_landing_page:a,children:[]},{id:4444,name:"Plakalık",slug:"plakalik",parent:l,is_landing_page:a,children:[]},{id:4447,name:"Dış Ayna",slug:"dis-ayna",parent:l,is_landing_page:a,children:[]},{id:4450,name:"Rüzgarlık",slug:"ruzgarlik",parent:l,is_landing_page:a,children:[]},{id:4453,name:"Çeki Demiri",slug:"ceki-demiri",parent:l,is_landing_page:a,children:[]},{id:4456,name:"Bagaj Eşik Bakaliti",slug:"bagaj-esik-bakaliti",parent:l,is_landing_page:a,children:[]},{id:4459,name:"Depo Kapak Açma Kolu",slug:"depo-kapak-acma-kolu",parent:l,is_landing_page:a,children:[]},{id:4462,name:"Arka Cam Fitili",slug:"arka-cam-fitili",parent:l,is_landing_page:a,children:[]},{id:4465,name:"Arka Kapı Fitili",slug:"arka-kapi-fitili",parent:l,is_landing_page:a,children:[]}]},{id:g,name:"Süspansiyon-Tekerlekler",slug:"suspansiyon-tekerlekler",parent:cV,is_landing_page:a,children:[{id:6232,name:"Aks Askısı",slug:"aks-askisi",parent:g,is_landing_page:a,children:[]},{id:6235,name:"Aks Kafası Dış",slug:"aks-kafasi-dis",parent:g,is_landing_page:a,children:[]},{id:6238,name:"Aks Kafası İç",slug:"aks-kafasi-ic",parent:g,is_landing_page:a,children:[]},{id:6241,name:"Aks Keçesi",slug:"aks-kecesi",parent:g,is_landing_page:a,children:[]},{id:6244,name:"Aks Körüğü Dış",slug:"aks-korugu-dis",parent:g,is_landing_page:a,children:[]},{id:6247,name:"Aks Körüğü İç",slug:"aks-korugu-ic",parent:g,is_landing_page:a,children:[]},{id:6250,name:"Aks Körük Kelepçesi",slug:"aks-koruk-kelepcesi",parent:g,is_landing_page:a,children:[]},{id:6253,name:"Aks Mafsalı",slug:"aks-mafsali",parent:g,is_landing_page:a,children:[]},{id:6256,name:"Aks Rulmanı",slug:"aks-rulmani",parent:g,is_landing_page:a,children:[]},{id:6259,name:"Aks Somunu",slug:"aks-somunu",parent:g,is_landing_page:a,children:[]},{id:6262,name:"Aks Sportu",slug:"aks-sportu",parent:g,is_landing_page:a,children:[]},{id:6265,name:"Aks Taşıyıcı",slug:"aks-tasiyici",parent:g,is_landing_page:a,children:[]},{id:6268,name:"Aks Taşıyıcı Sağ",slug:"aks-tasiyici-sag",parent:g,is_landing_page:a,children:[]},{id:6271,name:"Aks Taşıyıcı Sol",slug:"aks-tasiyici-sol",parent:g,is_landing_page:a,children:[]},{id:6274,name:"Aks Yüzüğü",slug:"aks-yuzugu",parent:g,is_landing_page:a,children:[]},{id:6277,name:"Arka Aks",slug:"arka-aks",parent:g,is_landing_page:a,children:[]},{id:6280,name:"Arka Aks Rulmanı",slug:"arka-aks-rulmani",parent:g,is_landing_page:a,children:[]},{id:6283,name:"Arka Porya",slug:"arka-porya",parent:g,is_landing_page:a,children:[]},{id:6286,name:"Arka Teker Rulmanı",slug:"arka-teker-rulmani",parent:g,is_landing_page:a,children:[]},{id:6289,name:"Makas Burcu",slug:"makas-burcu",parent:g,is_landing_page:a,children:[]},{id:6292,name:"Motor Traversi",slug:"motor-traversi",parent:g,is_landing_page:a,children:[]},{id:6295,name:"Ön Aks Komple",slug:"on-aks-komple",parent:g,is_landing_page:a,children:[]},{id:6298,name:"Ön Porya",slug:"on-porya",parent:g,is_landing_page:a,children:[]},{id:6301,name:"Ön Teker Rulmanı",slug:"on-teker-rulmani",parent:g,is_landing_page:a,children:[]},{id:6304,name:"Ön Aks Sağ",slug:"on-aks-sag",parent:g,is_landing_page:a,children:[]},{id:6307,name:"Ön Aks Sol",slug:"on-aks-sol",parent:g,is_landing_page:a,children:[]},{id:6310,name:"Torsiyon",slug:"torsiyon",parent:g,is_landing_page:a,children:[]},{id:6313,name:"Torsiyon Burcu",slug:"torsiyon-burcu",parent:g,is_landing_page:a,children:[]},{id:6316,name:"Torsiyon Tamir Takımı",slug:"torsiyon-tamir-takimi",parent:g,is_landing_page:a,children:[]},{id:6319,name:"Aks Askı Rulmanı",slug:"aks-aski-rulmani",parent:g,is_landing_page:a,children:[]},{id:6322,name:"Porya Kapağı",slug:"porya-kapagi",parent:g,is_landing_page:a,children:[]},{id:6325,name:"Jant Merkezleme Civatası",slug:"jant-merkezleme-civatasi",parent:g,is_landing_page:a,children:[]},{id:6331,name:"Amortisör Burcu",slug:"amortisor-burcu",parent:g,is_landing_page:a,children:[]},{id:6334,name:"Ara Yatak Takozu",slug:"ara-yatak-takozu",parent:g,is_landing_page:a,children:[]},{id:6337,name:"Arka Amortisör",slug:"arka-amortisor",parent:g,is_landing_page:a,children:[]},{id:6340,name:"Arka Amortisör Bilyası",slug:"arka-amortisor-bilyasi",parent:g,is_landing_page:a,children:[]},{id:6343,name:"Arka Amortisör Takozu",slug:"arka-amortisor-takozu",parent:g,is_landing_page:a,children:[]},{id:6346,name:"Arka Amortisör Toz Körüğü",slug:"arka-amortisor-toz-korugu",parent:g,is_landing_page:a,children:[]},{id:6349,name:"Arka Helezon",slug:"arka-helezon",parent:g,is_landing_page:a,children:[]},{id:6352,name:"Helezon Lastiği",slug:"helezon-lastigi",parent:g,is_landing_page:a,children:[]},{id:6358,name:"Ön Amortisör Bilyası",slug:"on-amortisor-bilyasi",parent:g,is_landing_page:a,children:[]},{id:6361,name:"Ön Amortisör Takozu",slug:"on-amortisor-takozu",parent:g,is_landing_page:a,children:[]},{id:6364,name:"Ön Amortisör Toz Körüğü",slug:"on-amortisor-toz-korugu",parent:g,is_landing_page:a,children:[]},{id:6367,name:"Ön Helezon",slug:"on-helezon",parent:g,is_landing_page:a,children:[]},{id:6370,name:"Ön Süspansiyon Takozu",slug:"on-suspansiyon-takozu",parent:g,is_landing_page:a,children:[]},{id:6373,name:"Direksiyon Körüğü",slug:"direksiyon-korugu",parent:g,is_landing_page:a,children:[]},{id:6376,name:"Direksiyon Kutusu",slug:"direksiyon-kutusu",parent:g,is_landing_page:a,children:[]},{id:6379,name:"Direksiyon Mafsalı",slug:"direksiyon-mafsali",parent:g,is_landing_page:a,children:[]},{id:6382,name:"Direksiyon Pompası",slug:"direksiyon-pompasi",parent:g,is_landing_page:a,children:[]},{id:6385,name:"Direksiyon Power",slug:"direksiyon-power",parent:g,is_landing_page:a,children:[]},{id:6388,name:"Direksiyon Simidi",slug:"direksiyon-simidi",parent:g,is_landing_page:a,children:[]},{id:6391,name:"Direksiyon Tamir Takımı",slug:"direksiyon-tamir-takimi",parent:g,is_landing_page:a,children:[]},{id:6394,name:"Direksiyon Yağ Depo Kapağı",slug:"direksiyon-yag-depo-kapagi",parent:g,is_landing_page:a,children:[]},{id:6397,name:"Direksiyon Yağ Deposu",slug:"direksiyon-yag-deposu",parent:g,is_landing_page:a,children:[]},{id:6400,name:"Direksiyon Muhafaza Bakaliti",slug:"direksiyon-muhafaza-bakaliti",parent:g,is_landing_page:a,children:[]},{id:6403,name:"Direksiyon Bağlantı Lastiği",slug:"direksiyon-baglanti-lastigi",parent:g,is_landing_page:a,children:[]},{id:6406,name:"Direksiyon Ayar Kolu",slug:"direksiyon-ayar-kolu",parent:g,is_landing_page:a,children:[]},{id:6408,name:"Direksiyon Tıkırtı Burcu",slug:"direksiyon-tikirti-burcu",parent:g,is_landing_page:a,children:[]},{id:6411,name:"Direksiyon Pompa Kütüğü",slug:"direksiyon-pompa-kutugu",parent:g,is_landing_page:a,children:[]},{id:6414,name:"Direksiyon Pompa Kasnağı",slug:"direksiyon-pompa-kasnagi",parent:g,is_landing_page:a,children:[]},{id:6417,name:"Rotbaşı",slug:"rotbasi",parent:g,is_landing_page:a,children:[]},{id:6420,name:"Rotil",slug:"rotil",parent:g,is_landing_page:a,children:[]},{id:6423,name:"Rotilli Kol",slug:"rotilli-kol",parent:g,is_landing_page:a,children:[]},{id:6426,name:"Rotkolu",slug:"rotkolu",parent:g,is_landing_page:a,children:[]},{id:6429,name:"Direksiyon Hortumu",slug:"direksiyon-hortumu",parent:g,is_landing_page:a,children:[]},{id:6432,name:"Bijon",slug:"bijon",parent:g,is_landing_page:a,children:[]},{id:6435,name:"Çelik Jant",slug:"celik-jant",parent:g,is_landing_page:a,children:[]},{id:6441,name:"Sac Jant",slug:"sac-jant",parent:g,is_landing_page:a,children:[]},{id:6444,name:"Arka Salıncak",slug:"arka-salincak",parent:g,is_landing_page:a,children:[]},{id:6447,name:"Arka Salıncak Burcu",slug:"arka-salincak-burcu",parent:g,is_landing_page:a,children:[]},{id:6450,name:"Denge Kolu",slug:"denge-kolu",parent:g,is_landing_page:a,children:[]},{id:6453,name:"Ön Salıncak",slug:"on-salincak",parent:g,is_landing_page:a,children:[]},{id:6456,name:"Ön Salıncak Burcu",slug:"on-salincak-burcu",parent:g,is_landing_page:a,children:[]},{id:6459,name:"Ön Z Rot",slug:"on-z-rot",parent:g,is_landing_page:a,children:[]},{id:6471,name:"Sağ Ön Salıncak",slug:"sag-on-salincak",parent:g,is_landing_page:a,children:[]},{id:6474,name:"Sol Ön Salıncak",slug:"sol-on-salincak",parent:g,is_landing_page:a,children:[]},{id:6477,name:"Viraj Demiri",slug:"viraj-demiri",parent:g,is_landing_page:a,children:[]},{id:6480,name:"Viraj Demiri Çivisi",slug:"viraj-demiri-civisi",parent:g,is_landing_page:a,children:[]},{id:6483,name:"Viraj Demiri Kelepçesi",slug:"viraj-demiri-kelepcesi",parent:g,is_landing_page:a,children:[]},{id:6486,name:"Viraj Demiri Uç Lastiği",slug:"viraj-demiri-uc-lastigi",parent:g,is_landing_page:a,children:[]},{id:6489,name:"Rotmili",slug:"rotmili",parent:g,is_landing_page:a,children:[]},{id:6492,name:"Viraj Uç Demiri",slug:"viraj-uc-demiri",parent:g,is_landing_page:a,children:[]},{id:6495,name:"Z Rot",slug:"z-rot",parent:g,is_landing_page:a,children:[]},{id:6498,name:"Barakol Lastiği",slug:"barakol-lastigi",parent:g,is_landing_page:a,children:[]},{id:6501,name:"Ön Salıncak Sağ",slug:"on-salincak-sag",parent:g,is_landing_page:a,children:[]},{id:6504,name:"Ön Salıncak Sol",slug:"on-salincak-sol",parent:g,is_landing_page:a,children:[]},{id:6507,name:"Alt Tabla",slug:"alt-tabla",parent:g,is_landing_page:a,children:[]},{id:6510,name:"Denge Kol Lastiği",slug:"denge-kol-lastigi",parent:g,is_landing_page:a,children:[]},{id:6513,name:"Viraj Demir Lastiği",slug:"viraj-demir-lastigi",parent:g,is_landing_page:a,children:[]},{id:6516,name:"Salıncak Burcu",slug:"salincak-burcu",parent:g,is_landing_page:a,children:[]},{id:6519,name:"Viraj Demiri Lastiği",slug:"viraj-demiri-lastigi",parent:g,is_landing_page:a,children:[]},{id:6522,name:"Alt Rotil",slug:"alt-rotil",parent:g,is_landing_page:a,children:[]},{id:6525,name:"Amortisör Takozu",slug:"amortisor-takozu",parent:g,is_landing_page:a,children:[]},{id:6528,name:"Arka Süspansiyon Takozu",slug:"arka-suspansiyon-takozu",parent:g,is_landing_page:a,children:[]},{id:6537,name:"Torsiyon Takozu",slug:"torsiyon-takozu",parent:g,is_landing_page:a,children:[]}]}]},{id:n,name:LS,slug:LT,parent:gw,is_landing_page:a,children:[{id:ig,name:nm,slug:LU,parent:n,is_landing_page:a,children:[{id:3386,name:nm,slug:"motor-yag-xxxx",parent:ig,is_landing_page:a,children:[]},{id:3387,name:"Şanzıman Yağ",slug:"sanziman-yag",parent:ig,is_landing_page:a,children:[]},{id:3388,name:"Hidrolik Yağ",slug:"hidrolik-yag",parent:ig,is_landing_page:a,children:[]}]},{id:ih,name:LV,slug:LW,parent:n,is_landing_page:a,children:[{id:3390,name:"Motor Yağ Katkısı",slug:"motor-yag-katkisi",parent:ih,is_landing_page:a,children:[]},{id:3391,name:"Şanzıman Yağ Katkısı",slug:"sanziman-yag-katkisi",parent:ih,is_landing_page:a,children:[]},{id:3392,name:"Diğer Katkılar",slug:"diger-katkilar",parent:ih,is_landing_page:a,children:[]}]},{id:bD,name:LX,slug:LY,parent:n,is_landing_page:a,children:[{id:3394,name:"Pasta",slug:"pasta",parent:bD,is_landing_page:a,children:[]},{id:3395,name:"Cila",slug:"cila",parent:bD,is_landing_page:a,children:[]},{id:3396,name:"Boya Koruma",slug:"boya-koruma",parent:bD,is_landing_page:a,children:[]},{id:3397,name:"Şampuan",slug:"sampuan",parent:bD,is_landing_page:a,children:[]},{id:3398,name:"Seramik Kaplama",slug:"seramik-kaplama",parent:bD,is_landing_page:a,children:[]},{id:3399,name:"Cam Temizleyiciler",slug:"cam-temizleyiciler",parent:bD,is_landing_page:a,children:[]},{id:3400,name:"Jant Temizleyiciler",slug:"jant-temizleyiciler",parent:bD,is_landing_page:a,children:[]},{id:3401,name:"Temizlik Setleri",slug:"temizlik-setleri",parent:bD,is_landing_page:a,children:[]},{id:3402,name:"Far Temizleyiciler",slug:"far-temizleyiciler",parent:bD,is_landing_page:a,children:[]},{id:3403,name:"Sünger Ve Bezler",slug:"sunger-ve-bezler",parent:bD,is_landing_page:a,children:[]},{id:3404,name:H,slug:"diger-oto-temizlik-urunleri",parent:bD,is_landing_page:a,children:[]}]},{id:eu,name:LZ,slug:L_,parent:n,is_landing_page:a,children:[{id:fg,name:hv,slug:"oto-motor-filtreleri",parent:eu,is_landing_page:a,children:[{id:3407,name:"Polen Filtresi",slug:"polen-filtresi",parent:fg,is_landing_page:a,children:[]},{id:3408,name:"Benzin Filtresi",slug:"benzin-filtresi",parent:fg,is_landing_page:a,children:[]},{id:3409,name:"Mazot Filtresi",slug:"mazot-filtresi",parent:fg,is_landing_page:a,children:[]},{id:3410,name:"Yağ Filtresi",slug:"yag-filtresi",parent:fg,is_landing_page:a,children:[]},{id:3411,name:"Hava Filtresi",slug:"hava-filtresi",parent:fg,is_landing_page:a,children:[]},{id:3412,name:"Filtre Setleri",slug:"filtre-setleri",parent:fg,is_landing_page:a,children:[]}]},{id:ko,name:"Kayışlar",slug:"kayislar",parent:eu,is_landing_page:a,children:[{id:3414,name:"Triger Kayışı",slug:"triger-kayisi",parent:ko,is_landing_page:a,children:[]},{id:3415,name:"V Kayışı",slug:"v-kayisi",parent:ko,is_landing_page:a,children:[]},{id:3416,name:"Kayış Setleri",slug:"kayis-setleri",parent:ko,is_landing_page:a,children:[]}]},{id:nn,name:"Buji Ve Kabloları",slug:"buji-ve-kablolari",parent:eu,is_landing_page:a,children:[{id:3418,name:"Bujiler",slug:"bujiler",parent:nn,is_landing_page:a,children:[]},{id:3421,name:"Buji Kabloları",slug:"buji-kablolari",parent:nn,is_landing_page:a,children:[]}]},{id:no,name:"Fren Parçaları",slug:"fren-parcalari",parent:eu,is_landing_page:a,children:[{id:3423,name:"Fren Diski",slug:"fren-diski",parent:no,is_landing_page:a,children:[]},{id:3424,name:Ce,slug:"oto-fren-balatasi",parent:no,is_landing_page:a,children:[]}]},{id:3425,name:"Antifiriz",slug:"antifiriz",parent:eu,is_landing_page:a,children:[]},{id:3426,name:"Cam Suyu",slug:"cam-suyu",parent:eu,is_landing_page:a,children:[]}]},{id:L$,name:Ma,slug:Mb,parent:n,is_landing_page:a,children:[]},{id:4227,name:"Kauçuk Ve Fitil Bakım Spreyi",slug:"kaucuk-ve-fitil-bakim-spreyi",parent:n,is_landing_page:a,children:[]},{id:4228,name:"Lastik Tamir Köpüğü",slug:"lastik-tamir-kopugu",parent:n,is_landing_page:a,children:[]},{id:4231,name:"Mumlu Cila",slug:"mumlu-cila",parent:n,is_landing_page:a,children:[]},{id:4234,name:"Radyatör Delik Tıkayıcı",slug:"radyator-delik-tikayici",parent:n,is_landing_page:a,children:[]},{id:4237,name:"Sıvı Conta",slug:"sivi-conta",parent:n,is_landing_page:a,children:[]},{id:4240,name:"Sıvı Gres",slug:"sivi-gres",parent:n,is_landing_page:a,children:[]},{id:4243,name:"Silikon",slug:"silikon",parent:n,is_landing_page:a,children:[]},{id:4246,name:"Silikon Sprey",slug:"silikon-sprey",parent:n,is_landing_page:a,children:[]},{id:4249,name:"Ampul",slug:"ampul",parent:n,is_landing_page:a,children:[]},{id:4261,name:"Mazot Filtre Kutusu",slug:"mazot-filtre-kutusu",parent:n,is_landing_page:a,children:[]},{id:4273,name:"Araç İçi Tazeleme Spreyi",slug:"arac-ici-tazeleme-spreyi",parent:n,is_landing_page:a,children:[]},{id:4276,name:"Balata Spreyi",slug:"balata-spreyi",parent:n,is_landing_page:a,children:[]},{id:4279,name:"Bezler",slug:"bezler",parent:n,is_landing_page:a,children:[]},{id:4282,name:"Cam Temizleme Sabunu",slug:"cam-temizleme-sabunu",parent:n,is_landing_page:a,children:[]},{id:4285,name:"Koku Çeşitleri",slug:"koku-cesitleri",parent:n,is_landing_page:a,children:[]},{id:4288,name:"Motor İç Temizleme",slug:"motor-ic-temizleme",parent:n,is_landing_page:a,children:[]},{id:4291,name:"Motor Temizleme Spreyi",slug:"motor-temizleme-spreyi",parent:n,is_landing_page:a,children:[]},{id:4294,name:"Pas Sökücü",slug:"pas-sokucu",parent:n,is_landing_page:a,children:[]},{id:4297,name:"Radyatör Temizleyici",slug:"radyator-temizleyici",parent:n,is_landing_page:a,children:[]},{id:4303,name:"Gres",slug:"gres",parent:n,is_landing_page:a,children:[]},{id:4306,name:"Hidrolik Yağı",slug:"hidrolik-yagi",parent:n,is_landing_page:a,children:[]},{id:4309,name:"Motor Yağı",slug:"motor-yagi",parent:n,is_landing_page:a,children:[]},{id:4312,name:"Otomatik Şanzıman Yağı",slug:"otomatik-sanziman-yagi",parent:n,is_landing_page:a,children:[]},{id:4315,name:"Şanzıman Yağı",slug:"sanziman-yagi",parent:n,is_landing_page:a,children:[]},{id:4318,name:"Benzinli Enjektör Temizleme",slug:"benzinli-enjektor-temizleme",parent:n,is_landing_page:a,children:[]},{id:4321,name:"Dizel Enjektör Temizleme",slug:"dizel-enjektor-temizleme",parent:n,is_landing_page:a,children:[]},{id:4324,name:"Egr Temizleme",slug:"egr-temizleme",parent:n,is_landing_page:a,children:[]},{id:4327,name:"Lpg Enjektör Temizleme",slug:"lpg-enjektor-temizleme",parent:n,is_landing_page:a,children:[]},{id:4333,name:"Partikül Temizleme",slug:"partikul-temizleme",parent:n,is_landing_page:a,children:[]}]},{id:gx,name:"Akü Ve Aksesuarları",slug:"aku-ve-aksesuarlari",parent:gw,is_landing_page:a,children:[{id:Mc,name:np,slug:Md,parent:gx,is_landing_page:a,children:[]},{id:Me,name:Mf,slug:Mg,parent:gx,is_landing_page:a,children:[]},{id:7193,name:"Şarj İstasyonları",slug:"sarj-istasyonlari",parent:gx,is_landing_page:a,children:[]}]}]},{id:aa,name:Mh,slug:Mi,parent:aH,is_landing_page:a,children:[{id:Mj,name:Mk,slug:Ml,parent:aa,is_landing_page:a,children:[]},{id:ii,name:Mm,slug:Mn,parent:aa,is_landing_page:a,children:[{id:3434,name:"Spor Yay",slug:"spor-yay",parent:ii,is_landing_page:a,children:[]},{id:3435,name:"Amortisör",slug:"amortisor",parent:ii,is_landing_page:a,children:[]},{id:3436,name:"Coilover",slug:"coilover",parent:ii,is_landing_page:a,children:[]}]},{id:3437,name:"Eksoz",slug:"eksoz",parent:aa,is_landing_page:a,children:[]},{id:3438,name:"Pedal Seti",slug:"pedal-seti",parent:aa,is_landing_page:a,children:[]},{id:kp,name:Mo,slug:Mp,parent:aa,is_landing_page:a,children:[{id:3440,name:"Vites Topuzu",slug:"vites-topuzu",parent:kp,is_landing_page:a,children:[]},{id:3441,name:"Spor Direksiyon",slug:"spor-direksiyon",parent:kp,is_landing_page:a,children:[]}]},{id:3442,name:"Göstergeler",slug:"gostergeler",parent:aa,is_landing_page:a,children:[]},{id:3443,name:"Ayak Dayama",slug:"ayak-dayama",parent:aa,is_landing_page:a,children:[]},{id:3444,name:"Spor Koltuk",slug:"spor-koltuk",parent:aa,is_landing_page:a,children:[]},{id:3445,name:"Kule Gergileri",slug:"kule-gergileri",parent:aa,is_landing_page:a,children:[]},{id:nq,name:"Silikon Hortumlar",slug:"silikon-hortumlar",parent:aa,is_landing_page:a,children:[{id:3447,name:"Turbo Hortumları",slug:"turbo-hortumlari",parent:nq,is_landing_page:a,children:[]},{id:3448,name:"Su Hortumları",slug:"su-hortumları",parent:nq,is_landing_page:a,children:[]}]},{id:3449,name:"Spacerlar",slug:"spacerlar",parent:aa,is_landing_page:a,children:[]},{id:ij,name:Mq,slug:Mr,parent:aa,is_landing_page:a,children:[{id:3451,name:"Pedal Chip",slug:"pedal-chip",parent:ij,is_landing_page:a,children:[]},{id:3452,name:"Performans Modülleri",slug:"performans-modulleri",parent:ij,is_landing_page:a,children:[]},{id:3453,name:H,slug:"diger-oto-chip-tuning-urunleri",parent:ij,is_landing_page:a,children:[]}]},{id:3454,name:"Spoiler",slug:"spoiler",parent:aa,is_landing_page:a,children:[]},{id:Ms,name:Mt,slug:Mu,parent:aa,is_landing_page:a,children:[]},{id:3456,name:H,slug:"diger-modifiyeve-tuning-urunleri",parent:aa,is_landing_page:a,children:[]}]},{id:cW,name:Mv,slug:Mw,parent:aH,is_landing_page:a,children:[{id:ev,name:Mx,slug:My,parent:cW,is_landing_page:a,children:[{id:3460,name:"Commuter",slug:"commuter",parent:ev,is_landing_page:a,children:[]},{id:3461,name:"Cross",slug:"cross",parent:ev,is_landing_page:a,children:[]},{id:3462,name:"Elektrikli Motosiklet",slug:"elektrikli-motosiklet",parent:ev,is_landing_page:a,children:[]},{id:3463,name:"Naked",slug:"naked",parent:ev,is_landing_page:a,children:[]},{id:3464,name:"Scooter",slug:"scooter",parent:ev,is_landing_page:a,children:[]},{id:3465,name:"Touring",slug:"touring",parent:ev,is_landing_page:a,children:[]}]},{id:3466,name:"Utv",slug:"utv",parent:cW,is_landing_page:a,children:[]},{id:3467,name:"Atv",slug:"atv",parent:cW,is_landing_page:a,children:[]},{id:dB,name:Mz,slug:MA,parent:cW,is_landing_page:a,children:[{id:gy,name:MB,slug:MC,parent:dB,is_landing_page:a,children:[{id:3470,name:Fi,slug:"motosiklet-kaski",parent:gy,is_landing_page:a,children:[]},{id:ew,name:"Kıyafet",slug:"kiyafet",parent:gy,is_landing_page:a,children:[{id:3472,name:"Bandanalar",slug:"bandanalar",parent:ew,is_landing_page:a,children:[]},{id:3473,name:"Giyim Ürünleri",slug:"giyim-urunleri",parent:ew,is_landing_page:a,children:[]},{id:3474,name:"Mont Ve Ceket",slug:"mont-ve-ceket",parent:ew,is_landing_page:a,children:[]},{id:3475,name:gO,slug:"motosiklet-pantolonu",parent:ew,is_landing_page:a,children:[]},{id:3476,name:"Bot Ve Ayakkabı",slug:"bot-ve-ayakkabi",parent:ew,is_landing_page:a,children:[]},{id:3477,name:hw,slug:"motosiklet-yagmurlugu",parent:ew,is_landing_page:a,children:[]},{id:3478,name:"Termal Giyim",slug:"termal-giyim",parent:ew,is_landing_page:a,children:[]}]},{id:3479,name:iW,slug:"motosiklet-eldiveni",parent:gy,is_landing_page:a,children:[]},{id:3480,name:"Dizlik Ve Dirseklik",slug:"dizlik-ve-dirseklik",parent:gy,is_landing_page:a,children:[]}]},{id:ae,name:bn,slug:"motosiklet-aksesuar",parent:dB,is_landing_page:a,children:[{id:3482,name:"Aksesuarlar ",slug:"motosiklet-aksesuarlari-2",parent:ae,is_landing_page:a,children:[]},{id:3483,name:"Anahtarlıklar",slug:"anahtarliklar",parent:ae,is_landing_page:a,children:[]},{id:3484,name:"Tankpad ",slug:"tankpad",parent:ae,is_landing_page:a,children:[]},{id:3485,name:"Branda Ve Sele Örtüsü ",slug:"branda-ve-sele-ortusu",parent:ae,is_landing_page:a,children:[]},{id:3486,name:"Aydınlatma Ürünleri ",slug:"aydinlatma-urunleri",parent:ae,is_landing_page:a,children:[]},{id:3487,name:"Motosiklet Ayak Destek Kitleri ",slug:"motosiklet-ayak-destek-kitleri",parent:ae,is_landing_page:a,children:[]},{id:3488,name:"Motosiklet Bağlama Ve Taşıma Ürünleri ",slug:"motosiklet-baglama-ve-tasima-urunleri",parent:ae,is_landing_page:a,children:[]},{id:3489,name:"Motosiklet Jant Şeritleri ",slug:"motosiklet-jant-seritleri",parent:ae,is_landing_page:a,children:[]},{id:3490,name:"Motosiklet Lüzumlu Ürünler ",slug:"motosiklet-luzumlu-urunler",parent:ae,is_landing_page:a,children:[]},{id:3491,name:"Motosiklet Reflektif Ürünler ",slug:"motosiklet-reflektif-urunler",parent:ae,is_landing_page:a,children:[]},{id:3492,name:"Motosiklet Saatleri ",slug:"motosiklet-saatleri",parent:ae,is_landing_page:a,children:[]},{id:3493,name:"Motosiklet Sehpaları ",slug:"motosiklet-sehpalari",parent:ae,is_landing_page:a,children:[]},{id:3494,name:"Motosiklet Sele Pedi",slug:"motosiklet-sele-pedi",parent:ae,is_landing_page:a,children:[]},{id:3495,name:"Motosiklet Smart Barlar ",slug:"motosiklet-smart-barlar",parent:ae,is_landing_page:a,children:[]},{id:3496,name:"Motosiklet Telefon Ve Navigasyon Tutucular ",slug:"motosiklet-telefon-ve-navigasyon-tutucular",parent:ae,is_landing_page:a,children:[]},{id:3497,name:"GPS Ve Navigasyon ",slug:"gps-ve-navigasyon",parent:ae,is_landing_page:a,children:[]},{id:3498,name:"Intercom ",slug:"intercom",parent:ae,is_landing_page:a,children:[]},{id:3499,name:"Alarm ",slug:"alarm",parent:ae,is_landing_page:a,children:[]},{id:3500,name:"Kilit ",slug:"kilit",parent:ae,is_landing_page:a,children:[]},{id:3501,name:"İlk Yardım Çantaları ",slug:"ilk-yardim-cantalari",parent:ae,is_landing_page:a,children:[]}]},{id:ay,name:MD,slug:ME,parent:dB,is_landing_page:a,children:[{id:3503,name:"Buji",slug:"buji",parent:ay,is_landing_page:a,children:[]},{id:3504,name:np,slug:"motosiklet-akusu",parent:ay,is_landing_page:a,children:[]},{id:3505,name:hv,slug:"motosiklet-filtreleri",parent:ay,is_landing_page:a,children:[]},{id:3506,name:"Ayna",slug:"ayna",parent:ay,is_landing_page:a,children:[]},{id:3507,name:"Debriyaj",slug:"debriyaj",parent:ay,is_landing_page:a,children:[]},{id:3508,name:"Far Ve Ampul",slug:"far-ve-ampul",parent:ay,is_landing_page:a,children:[]},{id:3509,name:"Fren Ve Fren ekipmanları",slug:"fren-ve-fren-ekipmanlari",parent:ay,is_landing_page:a,children:[]},{id:3510,name:"Koruma Demiri Ve Takoz",slug:"koruma-demiri-ve-takoz",parent:ay,is_landing_page:a,children:[]},{id:3511,name:"Elcik",slug:"elcik",parent:ay,is_landing_page:a,children:[]},{id:3512,name:"Egzozlar",slug:"egzozlar",parent:ay,is_landing_page:a,children:[]},{id:3513,name:"Gösterge",slug:"gosterge",parent:ay,is_landing_page:a,children:[]},{id:3514,name:"Ön Cam Siperlik",slug:"on-cam-siperlik",parent:ay,is_landing_page:a,children:[]},{id:3515,name:"Grenaj",slug:"grenaj",parent:ay,is_landing_page:a,children:[]},{id:3516,name:"Moto Siklet Karter Korumaları",slug:"moto-siklet-karter-korumalari",parent:ay,is_landing_page:a,children:[]},{id:3517,name:K_,slug:"motosiklet-kornasi",parent:ay,is_landing_page:a,children:[]}]},{id:ik,name:MF,slug:MG,parent:dB,is_landing_page:a,children:[{id:3519,name:"Motosiklet Yağları ",slug:"motosiklet-yaglari",parent:ik,is_landing_page:a,children:[]},{id:3520,name:"Temizlik Ürünleri ",slug:"temizlik-urunleri",parent:ik,is_landing_page:a,children:[]},{id:3521,name:"Motosiklet Lastik Tamir Ürünleri ",slug:"motosiklet-lastik-tamir-urunleri",parent:ik,is_landing_page:a,children:[]}]}]},{id:kq,name:MH,slug:MI,parent:cW,is_landing_page:a,children:[{id:3523,name:"Yaz Lastikleri",slug:"yaz-lastikleri",parent:kq,is_landing_page:a,children:[]},{id:3524,name:"Kış Lastikleri",slug:"kis-lastikleri",parent:kq,is_landing_page:a,children:[]}]}]},{id:aU,name:MJ,slug:MK,parent:aH,is_landing_page:a,children:[{id:ML,name:MM,slug:MN,parent:aU,is_landing_page:a,children:[]},{id:MO,name:MP,slug:MQ,parent:aU,is_landing_page:a,children:[]},{id:3528,name:"Kabin",slug:"kabin",parent:aU,is_landing_page:a,children:[]},{id:MR,name:MS,slug:MT,parent:aU,is_landing_page:a,children:[]},{id:MU,name:MV,slug:MW,parent:aU,is_landing_page:a,children:[]},{id:MX,name:jo,slug:MY,parent:aU,is_landing_page:a,children:[]},{id:3532,name:bn,slug:"4-4-off-road-aksesuarlari",parent:aU,is_landing_page:a,children:[]},{id:3533,name:"Vinç",slug:"vinc",parent:aU,is_landing_page:a,children:[]}]},{id:6926,name:"Lastik Montaj Hizmetleri",slug:"lastik-montaj-hizmetleri",parent:aH,is_landing_page:a,children:[]}],color:lO,styles:MZ},{id:bE,name:M_,slug:nr,parent:j,is_landing_page:z,children:[{id:J,name:M$,slug:Na,parent:bE,is_landing_page:a,children:[{id:kr,name:Nb,slug:Nc,parent:J,is_landing_page:a,children:[{id:fh,name:"Kuru Köpek Mamaları",slug:"kuru-kopek-mamalari",parent:kr,is_landing_page:a,children:[{id:3537,name:"Yavru Kuru Köpek Maması",slug:"yavru-kuru-kopek-mamasi",parent:fh,is_landing_page:a,children:[]},{id:3538,name:"Yetişkin Kuru Köpek Maması",slug:"yetiskin-kuru-kopek-mamasi",parent:fh,is_landing_page:a,children:[]},{id:3539,name:"Yaşlı Kuru Köpek Maması",slug:"yasli-kuru-kopek-mamasi",parent:fh,is_landing_page:a,children:[]},{id:3540,name:"Diyet Kuru Köpek Maması",slug:"diyet-kuru-kopek-mamasi",parent:fh,is_landing_page:a,children:[]},{id:3541,name:"Özel Irk Köpek Maması",slug:"ozel-irk-kopek-mamasi",parent:fh,is_landing_page:a,children:[]},{id:3542,name:"Tahılsız Kuru Köpek Maması",slug:"tahilsiz-kuru-kopek-mamasi",parent:fh,is_landing_page:a,children:[]}]},{id:ns,name:"Konserve & Yaş Köpek Mamaları",slug:"konserve-ve-yas-kopek-mamalari",parent:kr,is_landing_page:a,children:[{id:3544,name:"Yavru Köpek Konserveleri",slug:"yavru-kopek-konserveleri",parent:ns,is_landing_page:a,children:[]},{id:3545,name:"Yaşlı Köpek Konserveleri",slug:"yasli-kopek-konserveleri",parent:ns,is_landing_page:a,children:[]}]}]},{id:bV,name:Nd,slug:Ne,parent:J,is_landing_page:a,children:[{id:3547,name:"Paslanmaz Çelik Mama & Su Kapları",slug:"paslanmaz-celik-kopek-mama-ve-su-kaplari",parent:bV,is_landing_page:a,children:[]},{id:3548,name:"Plastik, Melamin Mama & Su Kapları",slug:"kopek-plastik-melamin-mama-ve-su-kaplari",parent:bV,is_landing_page:a,children:[]},{id:3549,name:"Otomatik, Özel Mama & Su Kapları",slug:"otomatik-ozel-mama-ve-su-kaplari",parent:bV,is_landing_page:a,children:[]},{id:3550,name:"Seramik Mama & Su Kapları",slug:"kopek-seramik-mama-ve-su-kaplari",parent:bV,is_landing_page:a,children:[]},{id:3551,name:"Su Pınarları",slug:"su-pinarlari",parent:bV,is_landing_page:a,children:[]},{id:3552,name:"Suluklar",slug:"suluklar",parent:bV,is_landing_page:a,children:[]},{id:3553,name:Nf,slug:"mama-saklama-kaplari",parent:bV,is_landing_page:a,children:[]},{id:3554,name:"Mama Servisleri",slug:"mama-servisleri",parent:bV,is_landing_page:a,children:[]},{id:3555,name:"Yavru Köpek Malzemeleri",slug:"yavru-kopek-malzemeleri",parent:bV,is_landing_page:a,children:[]},{id:3556,name:"Köpek Ödülleri",slug:"kopek-odulleri",parent:bV,is_landing_page:a,children:[]}]},{id:il,name:Ng,slug:Nh,parent:J,is_landing_page:a,children:[{id:3558,name:"Burgu & Çubuk Kemikler",slug:"burgu-ve-cubuk-kemikler",parent:il,is_landing_page:a,children:[]},{id:3559,name:"Yenebilir Pres Kemikler",slug:"yenebilir-pres-kemikler",parent:il,is_landing_page:a,children:[]},{id:3560,name:"Oyun & Çiğneme Kemikleri",slug:"kopek-oyun-ve-cigneme-kemikleri",parent:il,is_landing_page:a,children:[]}]},{id:bW,name:Ni,slug:Nj,parent:J,is_landing_page:a,children:[{id:3562,name:"Uzayan Tasmalar",slug:"uzayan-tasmalar",parent:bW,is_landing_page:a,children:[]},{id:3563,name:"Tasma Çantaları",slug:"tasma-cantalari",parent:bW,is_landing_page:a,children:[]},{id:3564,name:Nk,slug:"gogus-tasmasi",parent:bW,is_landing_page:a,children:[]},{id:3565,name:Nl,slug:"boyun-tasmasi",parent:bW,is_landing_page:a,children:[]},{id:3566,name:"Eğitim Tasması",slug:"egitim-tasmasi",parent:bW,is_landing_page:a,children:[]},{id:3567,name:"Kayış",slug:"kayis",parent:bW,is_landing_page:a,children:[]},{id:3568,name:"İsimlik \u002F Güvenlik Aksesuarları",slug:"isimlik-guvenlik-aksesuarlari",parent:bW,is_landing_page:a,children:[]},{id:3569,name:"Gezdirme Kayışları",slug:"gezdirme-kayislari",parent:bW,is_landing_page:a,children:[]},{id:3570,name:"Zincir Tasma & Aksesuarlar",slug:"kopek-zincir-tasma-ve-aksesuarlari",parent:bW,is_landing_page:a,children:[]},{id:3571,name:"Bahçe Bağlama & Güvenlik Ürünleri",slug:"bahce-baglama-ve-guvenlik-urunleri",parent:bW,is_landing_page:a,children:[]}]},{id:gz,name:"Köpek Taşıma & Seyahat Ürünleri",slug:Nm,parent:J,is_landing_page:a,children:[{id:3573,name:"Köpek Taşıma Kafesleri",slug:"kopek-tasima-kafesleri",parent:gz,is_landing_page:a,children:[]},{id:3574,name:"Köpek Taşıma Çantaları",slug:"kopek-tasima-cantalari",parent:gz,is_landing_page:a,children:[]},{id:3575,name:"Köpek Oto Aksesuarları",slug:"kopek-oto-aksesuarlari",parent:gz,is_landing_page:a,children:[]},{id:3576,name:"Köpek Seyahat Aksesuarları",slug:"kopek-seyahat-aksesuarlari",parent:gz,is_landing_page:a,children:[]}]},{id:dC,name:Nn,slug:No,parent:J,is_landing_page:a,children:[{id:3578,name:"Köpek Diş İpleri",slug:"kopek-dis-ipleri",parent:dC,is_landing_page:a,children:[]},{id:3579,name:"Oyun Topları & Frizbiler",slug:"kopek-oyun-toplari-ve-frizbiler",parent:dC,is_landing_page:a,children:[]},{id:3580,name:"Kumaş & Peluş Oyuncaklar",slug:"kumas-ve-pelus-oyuncaklar",parent:dC,is_landing_page:a,children:[]},{id:3581,name:"Kemik",slug:"kemik",parent:dC,is_landing_page:a,children:[]},{id:3582,name:"Eğitim Oyuncakları",slug:"egitim-oyuncaklari",parent:dC,is_landing_page:a,children:[]},{id:3583,name:"Rampa & Merdiven",slug:"kopek-rampa-ve-merdiven-oyuncaklari",parent:dC,is_landing_page:a,children:[]},{id:3584,name:H,slug:"diger-kopek-oyuncaklari",parent:dC,is_landing_page:a,children:[]}]},{id:dD,name:Np,slug:Nq,parent:J,is_landing_page:a,children:[{id:3586,name:iO,slug:"kopek-elbisesi",parent:dD,is_landing_page:a,children:[]},{id:3587,name:"Yazlık T-Shirtler",slug:"yazlik-t-shirtler",parent:dD,is_landing_page:a,children:[]},{id:3588,name:"Kışlık Mont ve Kazaklar",slug:"kislik-mont-ve-kazaklar",parent:dD,is_landing_page:a,children:[]},{id:3589,name:hw,slug:"kopek-yagmurlugu",parent:dD,is_landing_page:a,children:[]},{id:3590,name:"Patikler & Çoraplar",slug:"kopek-patikleri-ve-coraplari",parent:dD,is_landing_page:a,children:[]},{id:3591,name:"Tulum & Takımlar",slug:"kopek-tulum-ve-takimlar",parent:dD,is_landing_page:a,children:[]},{id:3592,name:"Hırka & Ceketler",slug:"kopek-hirka-ve-ceket",parent:dD,is_landing_page:a,children:[]}]},{id:im,name:Nr,slug:Ns,parent:J,is_landing_page:a,children:[{id:3594,name:mm,slug:"kopek-yatagi",parent:im,is_landing_page:a,children:[]},{id:3595,name:"Örtüler",slug:"ortuler",parent:im,is_landing_page:a,children:[]},{id:3596,name:"Battaniyeleri",slug:"battaniyeleri",parent:im,is_landing_page:a,children:[]}]},{id:3597,name:"Köpek Kulübeleri",slug:"kopek-kulubeleri",parent:J,is_landing_page:a,children:[]},{id:3598,name:"Köpek Kapıları & Güvenlik Aksesuarları",slug:"kopek-kapilari-ve-guvenlik-aksesuarlari",parent:J,is_landing_page:a,children:[]},{id:3599,name:"Köpek Kafesi ve Aksesuarları",slug:"kopek-kafesi-ve-aksesuarlari",parent:J,is_landing_page:a,children:[]},{id:Nt,name:Nu,slug:Nv,parent:J,is_landing_page:a,children:[]},{id:aV,name:Nw,slug:Nx,parent:J,is_landing_page:a,children:[{id:3602,name:Ny,slug:"vitaminler",parent:aV,is_landing_page:a,children:[]},{id:3603,name:"Kene, Pire & Parazit Ürünleri",slug:"kene-pire-ve-parazit-urunleri",parent:aV,is_landing_page:a,children:[]},{id:3604,name:"Şampuanlar & Banyo Malzemeleri",slug:"kopek-sampuani-ve-banyo-malzemeleri",parent:aV,is_landing_page:a,children:[]},{id:3605,name:"Tarak & Fırça",slug:"kopek-tarak-ve-firca",parent:aV,is_landing_page:a,children:[]},{id:3606,name:"Köpek Tıraş Makinesi",slug:"kopek-tiras-makinesi",parent:aV,is_landing_page:a,children:[]},{id:3607,name:"Köpek Tuvaleti & Eğitim Ürünleri",slug:"kopek-tuvaleti-ve-egitim-urunleri",parent:aV,is_landing_page:a,children:[]},{id:3608,name:"Cilt ve Tüy Bakım",slug:"cilt-ve-tuy-bakim",parent:aV,is_landing_page:a,children:[]},{id:3609,name:"Pedler ve Külotlar",slug:"pedler-ve-kulotlar",parent:aV,is_landing_page:a,children:[]},{id:3610,name:Nz,slug:"koku-giderici",parent:aV,is_landing_page:a,children:[]},{id:3611,name:"Makas",slug:"makas",parent:aV,is_landing_page:a,children:[]},{id:3612,name:NA,slug:"kulak-bakim",parent:aV,is_landing_page:a,children:[]},{id:3613,name:NB,slug:"goz-bakim",parent:aV,is_landing_page:a,children:[]},{id:3614,name:NC,slug:"agiz-bakim",parent:aV,is_landing_page:a,children:[]}]},{id:3615,name:"Deniz ve Havuz Ürünleri",slug:"deniz-ve-havuz-urunleri",parent:J,is_landing_page:a,children:[]}]},{id:K,name:ND,slug:NE,parent:bE,is_landing_page:a,children:[{id:ks,name:NF,slug:NG,parent:K,is_landing_page:a,children:[{id:fi,name:"Kuru Kedi Maması",slug:"kuru-kedi-mamasi",parent:ks,is_landing_page:a,children:[{id:3619,name:"Kuru Kedi Mamaları",slug:"kuru-kedi-mamalari",parent:fi,is_landing_page:a,children:[]},{id:3620,name:"Yavru Kuru Kedi Maması",slug:"yavru-kuru-kedi-mamasi",parent:fi,is_landing_page:a,children:[]},{id:3621,name:"Yetişkin Kuru Kedi Maması",slug:"yetiskin-kuru-kedi-mamasi",parent:fi,is_landing_page:a,children:[]},{id:3622,name:"Yaşlı Kuru Kedi Maması",slug:"yasli-kuru-kedi-mamasi",parent:fi,is_landing_page:a,children:[]},{id:3623,name:"Kısırlaştırılmış & Diyet Kuru Kedi Mamaları",slug:"kisirlastirilmis-ve-diyet-kuru-kedi-mamalari",parent:fi,is_landing_page:a,children:[]},{id:3624,name:"Tahılsız Kuru Kedi Mamaları",slug:"tahilsiz-kuru-kedi-mamalari",parent:fi,is_landing_page:a,children:[]}]},{id:nt,name:"Konserve & Yaş Kedi Mamaları",slug:"konserve-ve-yas-kedi-mamalari",parent:ks,is_landing_page:a,children:[{id:3626,name:"Yavru Kedi Konserveleri",slug:"yavru-kedi-konserveleri",parent:nt,is_landing_page:a,children:[]},{id:3627,name:"Yetişkin Kedi Konserveleri",slug:"yetiskin-kedi-konserveleri",parent:nt,is_landing_page:a,children:[]}]}]},{id:ex,name:NH,slug:NI,parent:K,is_landing_page:a,children:[{id:3629,name:"Mama & Su Kapları",slug:"kadi-mama-ve-su-kaplari",parent:ex,is_landing_page:a,children:[]},{id:3630,name:"Kedi Sulukları & Su Pınarları",slug:"kedi-suluklari-su-pinarlari",parent:ex,is_landing_page:a,children:[]},{id:3631,name:Nf,slug:"kedi-mama-saklami-kabi",parent:ex,is_landing_page:a,children:[]},{id:3632,name:"Otomatik Besleyiciler",slug:"otomatik-besleyiciler",parent:ex,is_landing_page:a,children:[]},{id:3633,name:"Besleme Paspasları",slug:"besleme-paspaslari",parent:ex,is_landing_page:a,children:[]},{id:3634,name:"Kedi Ödülleri",slug:"kedi-odulleri",parent:ex,is_landing_page:a,children:[]}]},{id:kt,name:"Kedi Kumları",slug:NJ,parent:K,is_landing_page:a,children:[{id:3636,name:"Slika Kristal Kedi Kumu",slug:"slika-kristal-kedi-kumu",parent:kt,is_landing_page:a,children:[]},{id:3637,name:"Doğal Kedi Kumu",slug:"dogal-kedi-kumu",parent:kt,is_landing_page:a,children:[]}]},{id:dE,name:NK,slug:NL,parent:K,is_landing_page:a,children:[{id:3639,name:"Tuvalet Aksesuarları",slug:"tuvalet-aksesuarlari",parent:dE,is_landing_page:a,children:[]},{id:3640,name:"Açık Kedi Tuvaletleri",slug:"acik-kedi-tuvaletleri",parent:dE,is_landing_page:a,children:[]},{id:3641,name:"Kapalı Kedi Tuvaletleri",slug:"kapali-kedi-tuvaletleri",parent:dE,is_landing_page:a,children:[]},{id:3642,name:"Otomatik Kedi Tuvaletleri",slug:"otomatik-kedi-tuvaletleri",parent:dE,is_landing_page:a,children:[]},{id:3643,name:"Kedi Kumu Küreği",slug:"kedi-kumu-kuregi",parent:dE,is_landing_page:a,children:[]},{id:3644,name:"Kedi Tuvalet Paspası",slug:"kedi-tuvalet-paspasi",parent:dE,is_landing_page:a,children:[]},{id:3645,name:"Kedi Kumu Poşeti",slug:"kedi-kumu-poseti",parent:dE,is_landing_page:a,children:[]}]},{id:in0,name:NM,slug:NN,parent:K,is_landing_page:a,children:[{id:3647,name:Nl,slug:"kedi-boyun-tasmasi",parent:in0,is_landing_page:a,children:[]},{id:3648,name:Nk,slug:"kedi-gogus-tasmasi",parent:in0,is_landing_page:a,children:[]},{id:3649,name:"Kedi İsimlikleri",slug:"kedi-isimlikleri",parent:in0,is_landing_page:a,children:[]}]},{id:io,name:NO,slug:NP,parent:K,is_landing_page:a,children:[{id:3651,name:"Kedi Taşıma Kafesleri",slug:"kedi-tasima-kafesleri",parent:io,is_landing_page:a,children:[]},{id:3652,name:"Kedi Taşıma Çantaları",slug:"kedi-tasima-cantalari",parent:io,is_landing_page:a,children:[]},{id:3653,name:"Kedi Seyahat Aksesuarları",slug:"kedi-seyahat-aksesuarlari",parent:io,is_landing_page:a,children:[]}]},{id:gA,name:NQ,slug:NR,parent:K,is_landing_page:a,children:[{id:3655,name:"Kedi Otlu Oyuncaklar",slug:"kedi-otlu-oyuncaklar",parent:gA,is_landing_page:a,children:[]},{id:3656,name:"Olta Oyuncaklar",slug:"olta-oyuncaklar",parent:gA,is_landing_page:a,children:[]},{id:3657,name:"Toplar & Fareler",slug:"kedi-top-ve-fare-oyuncaklari",parent:gA,is_landing_page:a,children:[]},{id:3658,name:"Aktivite & Zeka Oyuncakları",slug:"aktivite-ve-zeka-oyuncaklari",parent:gA,is_landing_page:a,children:[]}]},{id:NS,name:NT,slug:NU,parent:K,is_landing_page:a,children:[]},{id:fj,name:NV,slug:NW,parent:K,is_landing_page:a,children:[{id:3661,name:mm,slug:"kedi-yatagi",parent:fj,is_landing_page:a,children:[]},{id:3662,name:"Paspaslar",slug:"paspaslar",parent:fj,is_landing_page:a,children:[]},{id:3663,name:"Battaniyeler",slug:"battaniyeler",parent:fj,is_landing_page:a,children:[]},{id:3664,name:"Radyatör Yatakları & Askıları",slug:"kedi-radyator-yataklari-ve-askilari",parent:fj,is_landing_page:a,children:[]},{id:3665,name:"Cama Asılan Kedi Yatakları",slug:"cama-asilan-kedi-yataklari",parent:fj,is_landing_page:a,children:[]}]},{id:3666,name:"Kedi Kapıları",slug:"kedi-kapilari",parent:K,is_landing_page:a,children:[]},{id:3667,name:"Kedi Evleri",slug:"kedi-evleri",parent:K,is_landing_page:a,children:[]},{id:3668,name:"Kedi Güvenlik Ürünleri",slug:"kedi-guvenlik-urunleri",parent:K,is_landing_page:a,children:[]},{id:3669,name:"Kedi Giysileri",slug:"kedi-giysileri",parent:K,is_landing_page:a,children:[]},{id:bF,name:NX,slug:NY,parent:K,is_landing_page:a,children:[{id:3671,name:uU,slug:"kedi-sampuani",parent:bF,is_landing_page:a,children:[]},{id:3672,name:"Tarak, Fırçalar & Makaslar",slug:"kedi-tarak-fircalar-ve-makaslar",parent:bF,is_landing_page:a,children:[]},{id:3673,name:"Kedi Çimleri",slug:"kedi-cimleri",parent:bF,is_landing_page:a,children:[]},{id:3674,name:"Parazit Karşıtı Ürünler",slug:"parazit-karsiti-urunler",parent:bF,is_landing_page:a,children:[]},{id:3675,name:"Kedi Tuvalet Eğitimi",slug:"kedi-tuvalet-egitimi",parent:bF,is_landing_page:a,children:[]},{id:3676,name:Nz,slug:"kedi-koku-giderici",parent:bF,is_landing_page:a,children:[]},{id:3677,name:"Göz ve Ağız Bakım Ürünleri",slug:"goz-ve-agiz-bakim-urunleri",parent:bF,is_landing_page:a,children:[]},{id:3678,name:Ny,slug:"kedi-vitamini",parent:bF,is_landing_page:a,children:[]},{id:3679,name:NB,slug:"kedi-goz-bakim",parent:bF,is_landing_page:a,children:[]},{id:3680,name:NC,slug:"kedi-agiz-bakim",parent:bF,is_landing_page:a,children:[]},{id:3681,name:NA,slug:"kedi-kulak-bakim",parent:bF,is_landing_page:a,children:[]}]}]},{id:bg,name:NZ,slug:N_,parent:bE,is_landing_page:a,children:[{id:fk,name:N$,slug:Oa,parent:bg,is_landing_page:a,children:[{id:3684,name:"Kanarya Kafesleri",slug:"kanarya-kafesleri",parent:fk,is_landing_page:a,children:[]},{id:3685,name:"Papağan Kafesleri & Standları",slug:"papagan-kafesleri-ve-standlari",parent:fk,is_landing_page:a,children:[]},{id:3686,name:"Muhabbet Kuşu Kafesleri",slug:"muhabbet-kusu-kafesleri",parent:fk,is_landing_page:a,children:[]},{id:3687,name:"Kuş Yuvası & Kuluçka Makineleri",slug:"kus-yuvasi-ve-kulucka-makinesi",parent:fk,is_landing_page:a,children:[]},{id:3688,name:"Kafes Aksesuarları",slug:"kafes-aksesuarlari",parent:fk,is_landing_page:a,children:[]}]},{id:fl,name:Ob,slug:Oc,parent:bg,is_landing_page:a,children:[{id:3690,name:"Kanarya Yemleri",slug:"kanarya-yemleri",parent:fl,is_landing_page:a,children:[]},{id:3691,name:"Papağan Yemleri",slug:"papagan-yemleri",parent:fl,is_landing_page:a,children:[]},{id:3692,name:"Muhabbet Yemleri",slug:"muhabbet-yemleri",parent:fl,is_landing_page:a,children:[]},{id:3693,name:"Güvercin Yemi",slug:"guvercin-yemi",parent:fl,is_landing_page:a,children:[]},{id:3694,name:"Tavuk Yemleri",slug:"tavuk-yemleri",parent:fl,is_landing_page:a,children:[]}]},{id:Od,name:Oe,slug:Of,parent:bg,is_landing_page:a,children:[]},{id:Og,name:Oh,slug:Oi,parent:bg,is_landing_page:a,children:[]},{id:ip,name:Oj,slug:Ok,parent:bg,is_landing_page:a,children:[{id:3698,name:"Vitamin & Mineraller",slug:"kus-vitamin-ve-mineraller",parent:ip,is_landing_page:a,children:[]},{id:3699,name:"Parazit Spreyleri & Dezenfektanlar",slug:"kus-parazit-spreyleri-ve-dezenfektanlar",parent:ip,is_landing_page:a,children:[]},{id:3700,name:"Kuş Banyoları & Küvetler",slug:"kus-banyolari-ve-kuvetler",parent:ip,is_landing_page:a,children:[]}]},{id:Ol,name:Om,slug:On,parent:bg,is_landing_page:a,children:[]}]},{id:S,name:Oo,slug:Op,parent:bE,is_landing_page:a,children:[{id:ku,name:Oq,slug:Or,parent:S,is_landing_page:a,children:[{id:fm,name:"Tatlı Su Yemleri",slug:"tatli-su-yemleri",parent:ku,is_landing_page:a,children:[{id:3705,name:"Granül \u002F Stick Yemler",slug:"granul-stick-yemler",parent:fm,is_landing_page:a,children:[]},{id:3706,name:"Pul Yemler",slug:"pul-yemler",parent:fm,is_landing_page:a,children:[]},{id:3707,name:"Tablet \u002F FD Kurutulmuş Yemler",slug:"tablet-fd-kurutulmus-yemler",parent:fm,is_landing_page:a,children:[]},{id:3708,name:"Kova Yemler",slug:"kova-yemler",parent:fm,is_landing_page:a,children:[]},{id:3709,name:"Yavru Yemleri",slug:"yavru-yemleri",parent:fm,is_landing_page:a,children:[]},{id:3710,name:"Tatil Yemleri",slug:"tatil-yemleri",parent:fm,is_landing_page:a,children:[]}]},{id:Os,name:"Tuzlu Su Yemleri",slug:"tuzlu-su-yemleri",parent:ku,is_landing_page:a,children:[{id:3712,name:"Granül \u002F Pul Yemler",slug:"granul-pul-yemler",parent:Os,is_landing_page:a,children:[]}]}]},{id:kv,name:Ot,slug:Ou,parent:S,is_landing_page:a,children:[{id:3714,name:"Betta Kitleri",slug:"betta-kitleri",parent:kv,is_landing_page:a,children:[]},{id:3715,name:"Cam Akvaryumlar",slug:"cam-akvaryumlar",parent:kv,is_landing_page:a,children:[]}]},{id:bX,name:Ov,slug:Ow,parent:S,is_landing_page:a,children:[{id:3717,name:"Hava Taşları",slug:"hava-taslari",parent:bX,is_landing_page:a,children:[]},{id:3718,name:"Dereceler",slug:"dereceler",parent:bX,is_landing_page:a,children:[]},{id:3719,name:"Kepçeler",slug:"kepceler",parent:bX,is_landing_page:a,children:[]},{id:3720,name:"Hortum \u002F Vantuz \u002F Bağlantı Parçaları",slug:"hortum-vantuz-baglanti-parcalari",parent:bX,is_landing_page:a,children:[]},{id:3721,name:"Sifonlar \u002F Kum Temizleyiciler",slug:"sifonlar-kum-temizleyiciler",parent:bX,is_landing_page:a,children:[]},{id:3722,name:nl,slug:"akvaryum-silecek",parent:bX,is_landing_page:a,children:[]},{id:3723,name:"Maşalar",slug:"masalar",parent:bX,is_landing_page:a,children:[]},{id:3724,name:"Yavruluklar \u002F Beta Bölmeleri",slug:"yavruluklar-beta-bolmeleri",parent:bX,is_landing_page:a,children:[]},{id:3725,name:"Yemleme Makineleri",slug:"yemleme-makineleri",parent:bX,is_landing_page:a,children:[]},{id:3726,name:"Aydınlatma Ürünleri",slug:"akvaryum-aydinlatma-urunleri",parent:bX,is_landing_page:a,children:[]}]},{id:fn,name:Ox,slug:Oy,parent:S,is_landing_page:a,children:[{id:3728,name:"Kumlar",slug:"kumlar",parent:fn,is_landing_page:a,children:[]},{id:3729,name:"Renkli Çakıllar",slug:"renkli-cakillar",parent:fn,is_landing_page:a,children:[]},{id:3730,name:"Yapay Bitkiler",slug:"yapay-bitkiler",parent:fn,is_landing_page:a,children:[]},{id:3731,name:"Dekorlar ve Süsler",slug:"dekorlar-ve-susler",parent:fn,is_landing_page:a,children:[]},{id:3732,name:"Plastik Posterler",slug:"plastik-posterler",parent:fn,is_landing_page:a,children:[]}]},{id:fo,name:hv,slug:Oz,parent:S,is_landing_page:a,children:[{id:3734,name:"İç Filtreler",slug:"ic-filtreler",parent:fo,is_landing_page:a,children:[]},{id:3735,name:"Dış Filtreler",slug:"dis-filtreler",parent:fo,is_landing_page:a,children:[]},{id:3736,name:"UV Filtreler",slug:"uv-filtreler",parent:fo,is_landing_page:a,children:[]},{id:3737,name:"Askı Filtreler",slug:"aski-filtreler",parent:fo,is_landing_page:a,children:[]},{id:3738,name:"Sünger Filtreler",slug:"sunger-filtreler",parent:fo,is_landing_page:a,children:[]}]},{id:iq,name:OA,slug:OB,parent:S,is_landing_page:a,children:[{id:3740,name:"Biyolojik \u002F Kimyasal Malzemeler",slug:"biyolojik-kimyasal-malzemeler",parent:iq,is_landing_page:a,children:[]},{id:3741,name:"Sünger \u002F Elyaf \u002F Bioball",slug:"sunger-elyaf-bioball",parent:iq,is_landing_page:a,children:[]},{id:3742,name:"Filtre Aksesuarları \u002F Yedek Parçaları",slug:"filtre-aksesuarlari-yedek-parcalari",parent:iq,is_landing_page:a,children:[]}]},{id:kw,name:OC,slug:OD,parent:S,is_landing_page:a,children:[{id:3744,name:"Hava Motorları",slug:"hava-motorlari",parent:kw,is_landing_page:a,children:[]},{id:3745,name:"Sirkülasyon Motorları",slug:"sirkulasyon-motorlari",parent:kw,is_landing_page:a,children:[]}]},{id:3746,name:"Isıtıcılar",slug:"isiticilar",parent:S,is_landing_page:a,children:[]},{id:OE,name:OF,slug:OG,parent:S,is_landing_page:a,children:[]},{id:fp,name:OH,slug:OI,parent:S,is_landing_page:a,children:[{id:3749,name:"Su Düzenleyiciler",slug:"su-duzenleyiciler",parent:fp,is_landing_page:a,children:[]},{id:3750,name:"Biyolojik Start \u002F Bakteri Kültürleri",slug:"biyolojik-start-bakteri-kulturleri",parent:fp,is_landing_page:a,children:[]},{id:3751,name:"PH \u002F GH \u002F KH Düzenleyiciler",slug:"ph-gh-kh-duzenleyiciler",parent:fp,is_landing_page:a,children:[]},{id:3752,name:"Yosun Giderici \u002F Kimyasal Temizleyiciler",slug:"yosun-giderici-kimyasal-temizleyiciler",parent:fp,is_landing_page:a,children:[]},{id:3753,name:"Testler",slug:"testler",parent:fp,is_landing_page:a,children:[]}]},{id:ir,name:OJ,slug:OK,parent:S,is_landing_page:a,children:[{id:3755,name:"CO2 Sistemleri \u002F Aksesuarları",slug:"co2-sistemleri-aksesuarlari",parent:ir,is_landing_page:a,children:[]},{id:3756,name:"Kumlar \u002F Taban Malzemeleri",slug:"kumlar-taban-malzemeleri",parent:ir,is_landing_page:a,children:[]},{id:3757,name:hJ,slug:"akvaryum-bitki-bakim-aksesuarlari",parent:ir,is_landing_page:a,children:[]}]},{id:is,name:"Tuzlu Su",slug:"tuzlu-su",parent:S,is_landing_page:a,children:[{id:3759,name:"Protein Skimmer ve Reaktörler",slug:"protein-skimmer-ve-reaktorler",parent:is,is_landing_page:a,children:[]},{id:3760,name:"Soğutucular \u002F Fanlar",slug:"sogutucular-fanlar",parent:is,is_landing_page:a,children:[]},{id:3761,name:"Tuzlar",slug:"tuzlar",parent:is,is_landing_page:a,children:[]},{id:3762,name:OH,slug:"tuzlu-su-akvaryum-su-kimyasi-ve-bakimi",parent:is,is_landing_page:a,children:[]}]}]},{id:dF,name:"Hamster & Tavşan",slug:"hamster-ve-tavsan",parent:bE,is_landing_page:a,children:[{id:3764,name:OL,slug:"yemler-ek-besinler",parent:dF,is_landing_page:a,children:[]},{id:3765,name:"Kafesler",slug:"kafesler",parent:dF,is_landing_page:a,children:[]},{id:3766,name:"Oyuncaklar",slug:"oyuncaklar",parent:dF,is_landing_page:a,children:[]},{id:nu,name:"Bakım \u002F Temizlik Malzemeleri",slug:"bakim-temizlik-malzemeleri",parent:dF,is_landing_page:a,children:[{id:3768,name:"Tuvalet \u002F Hijyen Malzemeleri",slug:"tuvalet-hijyen-malzemeleri",parent:nu,is_landing_page:a,children:[]},{id:3769,name:"Taraklar \u002F Makaslar",slug:"taraklar-makaslar",parent:nu,is_landing_page:a,children:[]}]},{id:3770,name:"Yataklar \u002F Evler",slug:"yataklar-evler",parent:dF,is_landing_page:a,children:[]},{id:3771,name:"Kafesler \u002F Oyun Parkı",slug:"kafesler-oyun-parki",parent:dF,is_landing_page:a,children:[]},{id:3772,name:"Mama Kapları Suluk \u002F Besleme Aparatları",slug:"mama-kaplari-suluk-besleme-aparatlari",parent:dF,is_landing_page:a,children:[]},{id:3773,name:"Derece \u002F Nem Ölçerler",slug:"derece-nem-olcerler",parent:dF,is_landing_page:a,children:[]}]},{id:cX,name:OM,slug:ON,parent:bE,is_landing_page:a,children:[{id:OO,name:OL,slug:OP,parent:cX,is_landing_page:a,children:[]},{id:kx,name:"Terraryumlar \u002F Malzemeler",slug:OQ,parent:cX,is_landing_page:a,children:[{id:3777,name:"Terraryumlar",slug:"terraryumlar",parent:kx,is_landing_page:a,children:[]},{id:3778,name:"Terraryum Aksesuarları",slug:"terraryum-aksesuarlari",parent:kx,is_landing_page:a,children:[]}]},{id:OR,name:"Aydınlatma\u002F Uv \u002F Ay Işığı \u002F Isıtma Malzemeleri",slug:OS,parent:cX,is_landing_page:a,children:[]},{id:OT,name:OU,slug:OV,parent:cX,is_landing_page:a,children:[]}]}],color:ma,styles:OW},{id:as,name:"Ofis & Kırtasiye",slug:nv,parent:j,is_landing_page:z,children:[{id:211,name:"Projeksiyon Cihazları",slug:"projeksiyon-cihazlari",parent:as,is_landing_page:a,children:[]},{id:212,name:"Projeksiyon Perdesi",slug:"projeksiyon-perdesi",parent:as,is_landing_page:a,children:[]},{id:213,name:"Sunum Kumandaları",slug:"sunum-kumandasi",parent:as,is_landing_page:a,children:[]},{id:214,name:"Projeksiyon Aksesuarları",slug:"projeksiyon-aksesuar",parent:as,is_landing_page:a,children:[]},{id:cq,name:"Bantlar ve Yapıştırıcılar",slug:"bantlar-ve-yapistiricilar",parent:as,is_landing_page:a,children:[{id:OX,name:OY,slug:OZ,parent:cq,is_landing_page:a,children:[]},{id:3783,name:"Çift Taraflı Bant",slug:"cift-tarafli-bant",parent:cq,is_landing_page:a,children:[]},{id:3784,name:"Selefon Bant",slug:"selefon-bant",parent:cq,is_landing_page:a,children:[]},{id:3785,name:"Tutkal",slug:"tutkal",parent:cq,is_landing_page:a,children:[]},{id:3786,name:"Sprey Yapıştırıcı",slug:"sprey-yapistirici",parent:cq,is_landing_page:a,children:[]},{id:3787,name:"Zamk",slug:"zamk",parent:cq,is_landing_page:a,children:[]},{id:3788,name:up,slug:"stick-yapistirici-bant",parent:cq,is_landing_page:a,children:[]},{id:3789,name:"Uhu",slug:"uhu",parent:cq,is_landing_page:a,children:[]},{id:3790,name:H,slug:"diger-bant-ve-yapistirici-urunleri",parent:cq,is_landing_page:a,children:[]}]},{id:bG,name:"Dosyalama ve Organizasyon",slug:"dosyalama-ve-organizasyon",parent:as,is_landing_page:a,children:[{id:3792,name:"Arşiv Kutusu ve Dosyası",slug:"arsiv-kutusu-ve-dosyasi",parent:bG,is_landing_page:a,children:[]},{id:3793,name:"Sekreterlik",slug:"sekreterlik",parent:bG,is_landing_page:a,children:[]},{id:bY,name:O_,slug:O$,parent:bG,is_landing_page:a,children:[{id:3795,name:"Çıtçıtlı Dosya",slug:"citcitli-dosya",parent:bY,is_landing_page:a,children:[]},{id:3796,name:"Sunum Dosyası",slug:"sunum-dosyasi",parent:bY,is_landing_page:a,children:[]},{id:3797,name:"Poşet Dosya",slug:"poset-dosya",parent:bY,is_landing_page:a,children:[]},{id:3798,name:"Telli Dosya",slug:"telli-dosya",parent:bY,is_landing_page:a,children:[]},{id:3799,name:"Karton Dosya",slug:"karton-dosya",parent:bY,is_landing_page:a,children:[]},{id:3800,name:"Askılı Dosya",slug:"askili-dosya",parent:bY,is_landing_page:a,children:[]},{id:3801,name:"Sıkıştırmalı Dosya",slug:"sikistirmali-dosya",parent:bY,is_landing_page:a,children:[]},{id:3802,name:"Lastikli Dosya",slug:"lastikli-dosya",parent:bY,is_landing_page:a,children:[]},{id:3803,name:"Körüklü Dosya",slug:"koruklu-dosya",parent:bY,is_landing_page:a,children:[]},{id:3804,name:H,slug:"diger-ofis-dosyalari",parent:bY,is_landing_page:a,children:[]}]},{id:gB,name:Pa,slug:Pb,parent:bG,is_landing_page:a,children:[{id:3806,name:"Plastik Klasör",slug:"plastik-klasor",parent:gB,is_landing_page:a,children:[]},{id:3807,name:"Karton Klasör",slug:"karton-klasor",parent:gB,is_landing_page:a,children:[]},{id:3808,name:"Halkalı Klasör",slug:"halkali-klasor",parent:gB,is_landing_page:a,children:[]},{id:3809,name:H,slug:"diger-ofis-klasorleri",parent:gB,is_landing_page:a,children:[]}]},{id:3810,name:"Ayraç ve Seperatör",slug:"ayrac-ve-seperator",parent:bG,is_landing_page:a,children:[]},{id:3811,name:"Evrak Rafı",slug:"evrak-rafi",parent:bG,is_landing_page:a,children:[]},{id:3812,name:"Belge Çantası",slug:"belge-cantasi",parent:bG,is_landing_page:a,children:[]},{id:3813,name:"Masaüstü Düzenleyicileri",slug:"masaustu-duzenleyicileri",parent:bG,is_landing_page:a,children:[]},{id:3814,name:"Magazinlik",slug:"magazinlik",parent:bG,is_landing_page:a,children:[]},{id:3815,name:"Takvimler, Organizerler ve Planlayıcılar",slug:"takvimler-organizerler-ve-planlayicilar",parent:bG,is_landing_page:a,children:[]}]},{id:bZ,name:"Ofis ve Kırtasiye Ürünleri",slug:"ofis-ve-kirtasiye-urunleri",parent:as,is_landing_page:a,children:[{id:W,name:Pc,slug:Pd,parent:bZ,is_landing_page:a,children:[{id:3818,name:"Dolma Kalem",slug:"dolma-kalem",parent:W,is_landing_page:a,children:[]},{id:Pe,name:Pf,slug:Pg,parent:W,is_landing_page:a,children:[]},{id:3820,name:"Kurşun Kalem",slug:"kursun-kalem",parent:W,is_landing_page:a,children:[]},{id:3821,name:"Roller Kalem",slug:"roller-kalem",parent:W,is_landing_page:a,children:[]},{id:3822,name:"Tükenmez Kalem",slug:"tukenmez-kalem",parent:W,is_landing_page:a,children:[]},{id:3823,name:"Tahta Kalemi",slug:"tahta-kalemi",parent:W,is_landing_page:a,children:[]},{id:3824,name:"Pilot Kalem",slug:"pilot-kalem",parent:W,is_landing_page:a,children:[]},{id:3825,name:"Jel Kalem",slug:"jel-kalem",parent:W,is_landing_page:a,children:[]},{id:3826,name:"Koli Kalemi",slug:"koli-kalemi",parent:W,is_landing_page:a,children:[]},{id:3827,name:"Asetat Kalemi",slug:"asetat-kalemi",parent:W,is_landing_page:a,children:[]},{id:3828,name:"Versatil Kalem",slug:"versatil-kalem",parent:W,is_landing_page:a,children:[]},{id:3829,name:"Kaligrafi Kalemi",slug:"kaligrafi-kalemi",parent:W,is_landing_page:a,children:[]},{id:3830,name:"Kalem Setleri",slug:"kalem-setleri",parent:W,is_landing_page:a,children:[]},{id:3831,name:"Mürekkep",slug:"murekkep",parent:W,is_landing_page:a,children:[]},{id:3832,name:"Kalem Kartuşları",slug:"kalem-kartuslari",parent:W,is_landing_page:a,children:[]},{id:3833,name:"Tebeşirler",slug:"tebesirler",parent:W,is_landing_page:a,children:[]},{id:3834,name:"Uçlar",slug:"uclar",parent:W,is_landing_page:a,children:[]},{id:3835,name:Ph,slug:"kalemtras",parent:W,is_landing_page:a,children:[]},{id:3836,name:"Daksil ve Silgi",slug:"daksil-ve-silgi",parent:W,is_landing_page:a,children:[]},{id:3837,name:H,slug:"diger-ofis-kalem-yazi-urunleri",parent:W,is_landing_page:a,children:[]}]},{id:w,name:Pi,slug:Pj,parent:bZ,is_landing_page:a,children:[{id:3839,name:"El İşi Malzemeleri",slug:"el-isi-malzemeleri",parent:w,is_landing_page:a,children:[]},{id:3840,name:"Harita & Küre & Bayrak",slug:"harita-kure-ve-bayrak",parent:w,is_landing_page:a,children:[]},{id:3841,name:"Eğitim Levhaları",slug:"egitim-levhalari",parent:w,is_landing_page:a,children:[]},{id:3842,name:"Kapı Giydirme",slug:"kapi-giydirme",parent:w,is_landing_page:a,children:[]},{id:3843,name:"Çubuk, Fasülye, Sayı Boncuğu",slug:"cubuk-fasulye-sayi-boncugu",parent:w,is_landing_page:a,children:[]},{id:3844,name:"Ataşlar ve Kıskaçlar",slug:"ataslar-ve-kiskaclar",parent:w,is_landing_page:a,children:[]},{id:3845,name:"Raptiyeler",slug:"raptiyeler",parent:w,is_landing_page:a,children:[]},{id:3846,name:"Etiket, Fiş ve Ders Programı",slug:"etiket-fis-ve-ders-programi",parent:w,is_landing_page:a,children:[]},{id:Pk,name:Pl,slug:Pm,parent:w,is_landing_page:a,children:[]},{id:3848,name:Ph,slug:"kalemtras-2",parent:w,is_landing_page:a,children:[]},{id:3849,name:"Büyüteç",slug:"buyutec",parent:w,is_landing_page:a,children:[]},{id:Pn,name:Po,slug:Pp,parent:w,is_landing_page:a,children:[]},{id:3851,name:"Oyunlar",slug:"oyunlar",parent:w,is_landing_page:a,children:[]},{id:3852,name:"Oyun Hamuru",slug:"oyun-hamuru",parent:w,is_landing_page:a,children:[]},{id:3853,name:Pq,slug:"boyalar",parent:w,is_landing_page:a,children:[]},{id:3854,name:"Mikroskop",slug:"mikroskop",parent:w,is_landing_page:a,children:[]},{id:3855,name:"Beslenme Çantası",slug:"beslenme-cantasi",parent:w,is_landing_page:a,children:[]},{id:Pr,name:Ps,slug:Pt,parent:w,is_landing_page:a,children:[]},{id:3857,name:"Resim Çantası",slug:"resim-cantasi",parent:w,is_landing_page:a,children:[]},{id:3858,name:"Çizim Gereçleri",slug:"cizim-gerecleri",parent:w,is_landing_page:a,children:[]},{id:3859,name:Pu,slug:"okul-defteri",parent:w,is_landing_page:a,children:[]},{id:3860,name:"Yazı Tahtası & Pano",slug:"yazi-tahtasi-ve-pano",parent:w,is_landing_page:a,children:[]},{id:3861,name:"Silgi & Tahta Silgisi",slug:"okul-silgi-ve-tahta-silgisi",parent:w,is_landing_page:a,children:[]},{id:3862,name:"Okul Müzik Aletleri",slug:"okul-muzik-aletleri",parent:w,is_landing_page:a,children:[]},{id:3863,name:"Sıra Örtüsü",slug:"sira-ortusu",parent:w,is_landing_page:a,children:[]},{id:3864,name:"Deney Malzemesi",slug:"deney-malzemesi",parent:w,is_landing_page:a,children:[]},{id:3865,name:H,slug:"diger-okul-urunleri",parent:w,is_landing_page:a,children:[]}]},{id:at,name:Pv,slug:Pw,parent:bZ,is_landing_page:a,children:[{id:3867,name:"Ajanda",slug:"ajanda",parent:at,is_landing_page:a,children:[]},{id:3868,name:"Ciltli Defter",slug:"ciltli-defter",parent:at,is_landing_page:a,children:[]},{id:3869,name:"Fihrist",slug:"fihrist",parent:at,is_landing_page:a,children:[]},{id:3870,name:"Ticari Defter",slug:"ticari-defter",parent:at,is_landing_page:a,children:[]},{id:3871,name:"Spiralli Defter",slug:"spiralli-defter",parent:at,is_landing_page:a,children:[]},{id:3872,name:"Bloknot",slug:"bloknot",parent:at,is_landing_page:a,children:[]},{id:3873,name:"Not Defterleri",slug:"not-defterleri",parent:at,is_landing_page:a,children:[]},{id:3874,name:"Yapışkanlı Not Kağıdı",slug:"yapiskanli-not-kagidi",parent:at,is_landing_page:a,children:[]},{id:3875,name:"Güzel Yazı Defteri",slug:"guzel-yazi-defteri",parent:at,is_landing_page:a,children:[]},{id:3876,name:"Resim Defteri",slug:"resim-defteri",parent:at,is_landing_page:a,children:[]},{id:3877,name:"Müzik Defteri",slug:"muzik-defteri",parent:at,is_landing_page:a,children:[]},{id:3878,name:"Teknik Çizim & Eskiz",slug:"teknik-cizim-eskiz",parent:at,is_landing_page:a,children:[]},{id:3879,name:Pu,slug:"okul-defteri-2",parent:at,is_landing_page:a,children:[]},{id:3880,name:"Organizer Defter",slug:"organizer-defter",parent:at,is_landing_page:a,children:[]},{id:3881,name:"Günlükler",slug:"gunlukler",parent:at,is_landing_page:a,children:[]},{id:3882,name:H,slug:"diger-defter-ve-ajandalar",parent:at,is_landing_page:a,children:[]}]},{id:3883,name:"Yaka Kartı & Aksesuaları",slug:"yaka-karti-ve-aksesualari",parent:bZ,is_landing_page:a,children:[]},{id:3884,name:"Ambalaj Malzemeleri",slug:"ambalaj-malzemeleri",parent:bZ,is_landing_page:a,children:[]},{id:3885,name:"Koli Bantları",slug:"koli-bantlari",parent:bZ,is_landing_page:a,children:[]},{id:Px,name:Py,slug:Pz,parent:bZ,is_landing_page:a,children:[]}]},{id:Q,name:PA,slug:PB,parent:as,is_landing_page:a,children:[{id:3888,name:"Hesap Makinesi",slug:"hesap-makinesi",parent:Q,is_landing_page:a,children:[]},{id:3889,name:"Etiket Makinesi",slug:"etiket-makinesi",parent:Q,is_landing_page:a,children:[]},{id:3890,name:"Laminasyon Makinesi",slug:"laminasyon-makinesi",parent:Q,is_landing_page:a,children:[]},{id:3891,name:"Para Sayma Makinesi",slug:"para-sayma-makinesi",parent:Q,is_landing_page:a,children:[]},{id:PC,name:PD,slug:PE,parent:Q,is_landing_page:a,children:[]},{id:3893,name:"Evrak İmha Makinesi",slug:"evrak-imha-makinesi",parent:Q,is_landing_page:a,children:[]},{id:3894,name:"Kart Baskı Makinesi",slug:"kart-baski-makinesi",parent:Q,is_landing_page:a,children:[]},{id:3895,name:"Giyotin & Kağıt Kesme Makinesi",slug:"giyotin-kagit-ve-kesme-makinesi",parent:Q,is_landing_page:a,children:[]},{id:3896,name:"Ofis Makinesi Aksesuarları",slug:"ofis-makinesi-aksesuarlari",parent:Q,is_landing_page:a,children:[]},{id:3897,name:"Spiral & Ciltleme Makinesi",slug:"spiral-ve-ciltleme-makinesi",parent:Q,is_landing_page:a,children:[]},{id:3898,name:"Terazi",slug:"terazi",parent:Q,is_landing_page:a,children:[]},{id:PF,name:PG,slug:PH,parent:Q,is_landing_page:a,children:[]},{id:3900,name:"Para Kasası",slug:"para-kasasi",parent:Q,is_landing_page:a,children:[]},{id:3901,name:"Para Kontrol Makinesi",slug:"para-kontrol-makinesi",parent:Q,is_landing_page:a,children:[]},{id:3902,name:"Para Çekmecesi",slug:"para-cekmecesi",parent:Q,is_landing_page:a,children:[]},{id:3903,name:"Kartuş, Toner&Drum",slug:"kartus-toner-ve-drum",parent:Q,is_landing_page:a,children:[]},{id:3904,name:"Faks Makinesi",slug:"faks-makinesi",parent:Q,is_landing_page:a,children:[]},{id:3905,name:"Fotokopi Makineleri",slug:"fotokopi-makineleri",parent:Q,is_landing_page:a,children:[]},{id:3906,name:"Yazıcılar",slug:"yazicilar",parent:Q,is_landing_page:a,children:[]},{id:3907,name:"Sunum Ekipmanları & Projektörler",slug:"sunum-ekipmanlari-ve-projektorler",parent:Q,is_landing_page:a,children:[]},{id:3908,name:H,slug:"diger-ofis-makineleri",parent:Q,is_landing_page:a,children:[]}]},{id:gC,name:zg,slug:"ofis-mobilyasi",parent:as,is_landing_page:a,children:[{id:3916,name:"Pano & Mantar Pano",slug:"pano-ve-mantar-pano",parent:gC,is_landing_page:a,children:[]},{id:3917,name:"Çöp Kovası",slug:"cop-kovasi",parent:gC,is_landing_page:a,children:[]},{id:3918,name:H,slug:"diger-ofis-mobilyalari",parent:gC,is_landing_page:a,children:[]}]},{id:az,name:PI,slug:PJ,parent:as,is_landing_page:a,children:[{id:3920,name:"Bant Kesme Makinesi",slug:"bant-kesme-makinesi",parent:az,is_landing_page:a,children:[]},{id:3921,name:"Delgeç",slug:"delgec",parent:az,is_landing_page:a,children:[]},{id:3922,name:"Kıskaç",slug:"kiskac",parent:az,is_landing_page:a,children:[]},{id:3923,name:"Kalemlik",slug:"kalemlik",parent:az,is_landing_page:a,children:[]},{id:3924,name:"Kartvizitlik",slug:"kartvizitlik",parent:az,is_landing_page:a,children:[]},{id:3925,name:"Kaşe",slug:"kase",parent:az,is_landing_page:a,children:[]},{id:3926,name:"Zarf Açacağı",slug:"zarf-acacagi",parent:az,is_landing_page:a,children:[]},{id:3927,name:"Maket Bıçağı & Makas",slug:"maket-bicagi-ve-makas",parent:az,is_landing_page:a,children:[]},{id:3928,name:"Sümen Takımı",slug:"sumen-takimi",parent:az,is_landing_page:a,children:[]},{id:3929,name:"Zımba Teli",slug:"zimba-teli",parent:az,is_landing_page:a,children:[]},{id:3930,name:"Zımba Makinesi",slug:"zimba-makinesi",parent:az,is_landing_page:a,children:[]},{id:3931,name:"Zımba Teli Sökücü",slug:"zimba-teli-sokucu",parent:az,is_landing_page:a,children:[]},{id:3932,name:"Masaüstü Setler",slug:"masaustu-setler",parent:az,is_landing_page:a,children:[]},{id:3933,name:"İsimlik & Dekor",slug:"isimlik-ve-dekor",parent:az,is_landing_page:a,children:[]},{id:3934,name:H,slug:"diger-masa-araclari",parent:az,is_landing_page:a,children:[]}]},{id:cr,name:mI,slug:"ofis-ve-kirtasiye-kagit-urunleri",parent:as,is_landing_page:a,children:[{id:3936,name:"Kartpostallar",slug:"kartpostallar",parent:cr,is_landing_page:a,children:[]},{id:3937,name:"Kartvizitler",slug:"kartvizitler",parent:cr,is_landing_page:a,children:[]},{id:PK,name:PL,slug:PM,parent:cr,is_landing_page:a,children:[]},{id:3939,name:"Yazarkasa Ruloları",slug:"yazarkasa-rulolari",parent:cr,is_landing_page:a,children:[]},{id:PN,name:PO,slug:PP,parent:cr,is_landing_page:a,children:[]},{id:3941,name:"Zarflar",slug:"zarflar",parent:cr,is_landing_page:a,children:[]},{id:3942,name:"Çizgili Kağıt",slug:"cizgili-kagit",parent:cr,is_landing_page:a,children:[]},{id:3943,name:H,slug:"diger-kagit-urunleri",parent:cr,is_landing_page:a,children:[]}]},{id:L,name:nw,slug:"sanatsal-malzemeler",parent:as,is_landing_page:a,children:[{id:PQ,name:"Boya",slug:PR,parent:L,is_landing_page:a,children:[]},{id:3946,name:"Fırça",slug:"firca",parent:L,is_landing_page:a,children:[]},{id:PS,name:"Tuval",slug:PT,parent:L,is_landing_page:a,children:[]},{id:3948,name:"Şövale",slug:"sovale",parent:L,is_landing_page:a,children:[]},{id:PU,name:"Sanatsal Kağıt & Defter",slug:PV,parent:L,is_landing_page:a,children:[]},{id:PW,name:PX,slug:PY,parent:L,is_landing_page:a,children:[]},{id:3951,name:"Vernik",slug:"vernik",parent:L,is_landing_page:a,children:[]},{id:3952,name:"Palet",slug:"palet",parent:L,is_landing_page:a,children:[]},{id:3953,name:"Boyanabilir Obje",slug:"boyanabilir-obje",parent:L,is_landing_page:a,children:[]},{id:3954,name:"Hobi Ürünleri",slug:"hobi-urunleri",parent:L,is_landing_page:a,children:[]},{id:PZ,name:nw,slug:P_,parent:L,is_landing_page:a,children:[]},{id:P$,name:Qa,slug:Qb,parent:L,is_landing_page:a,children:[]},{id:Qc,name:Qd,slug:Qe,parent:L,is_landing_page:a,children:[]},{id:Qf,name:Qg,slug:Qh,parent:L,is_landing_page:a,children:[]},{id:Qi,name:"Seramik & Heykel Ürünleri",slug:Qj,parent:L,is_landing_page:a,children:[]},{id:ky,name:H,slug:"diger-sanatsal-ofis-kirtasiye-urunleri",parent:L,is_landing_page:a,children:[{id:3961,name:"Aile Hayatı",slug:"aile-hayati",parent:ky,is_landing_page:a,children:[]},{id:3962,name:"Çocuk Bakımı ve Gelişimi",slug:"cocuk-bakimi-ve-gelisimi",parent:ky,is_landing_page:a,children:[]},{id:3963,name:"Hamilelik",slug:"hamilelik",parent:ky,is_landing_page:a,children:[]}]}]},{id:7035,name:"Projeksiyon Sistemleri",slug:"projeksiyon-sistemler",parent:as,is_landing_page:a,children:[]}],color:me,styles:{fontSize:cd}},{id:X,name:Qk,slug:Ql,parent:j,is_landing_page:z,children:[{id:aI,name:Qm,slug:Qn,parent:X,is_landing_page:a,children:[{id:Qo,name:Qp,slug:Qq,parent:aI,is_landing_page:a,children:[]},{id:3966,name:"Türk Edebiyatı",slug:"turk-edebiyati-kitaplari",parent:aI,is_landing_page:a,children:[]},{id:3967,name:"Dünya Edebiyatı",slug:"dunya-edebiyati-kitaplari",parent:aI,is_landing_page:a,children:[]},{id:3968,name:"Aksiyon ve Macera",slug:"aksiyon-ve-macera-kitaplari",parent:aI,is_landing_page:a,children:[]},{id:3969,name:"Antik ve Orta Çağ Edebiyatı",slug:"antik-ve-orta-cag-edebiyati-kitaplari",parent:aI,is_landing_page:a,children:[]},{id:3970,name:"Deneme, Araştırma ve İncelemeler",slug:"deneme-arastirma-ve-inceleme-kitaplari",parent:aI,is_landing_page:a,children:[]},{id:3971,name:"Dramalar ve Oyunlar",slug:"drama-ve-oyun-kitaplari",parent:aI,is_landing_page:a,children:[]},{id:3972,name:"Öyküler ve Antolojiler",slug:"oyku-ve-antoloji-kitaplari",parent:aI,is_landing_page:a,children:[]},{id:3973,name:Qr,slug:"cizgi-roman-ve-mizah-kitaplari",parent:aI,is_landing_page:a,children:[]},{id:3974,name:"Tarih ve Eleştiri",slug:"tarih-ve-elestiri-kitaplari",parent:aI,is_landing_page:a,children:[]},{id:3975,name:"Dergi",slug:"dergiler",parent:aI,is_landing_page:a,children:[]},{id:3976,name:"Şiir",slug:"siir-kitaplari",parent:aI,is_landing_page:a,children:[]},{id:3977,name:H,slug:"diger-edebiyat-ve-kurgu-kitaplari",parent:aI,is_landing_page:a,children:[]}]},{id:nx,name:Qs,slug:Qt,parent:X,is_landing_page:a,children:[{id:gD,name:"Ders Kitapları",slug:"ders-kitaplari",parent:nx,is_landing_page:a,children:[{id:3980,name:Qu,slug:"okul-oncesi",parent:gD,is_landing_page:a,children:[]},{id:it,name:"İlköğretim",slug:"ilkogretim",parent:gD,is_landing_page:a,children:[{id:3982,name:"1.Sınıf",slug:"1-sinif",parent:it,is_landing_page:a,children:[]},{id:3983,name:"2.Sınıf",slug:"2-sinif",parent:it,is_landing_page:a,children:[]},{id:3984,name:"3.Sınıf",slug:"3-sinif",parent:it,is_landing_page:a,children:[]},{id:3985,name:"4.Sınıf",slug:"4-sinif",parent:it,is_landing_page:a,children:[]}]},{id:iu,name:"Ortaöğretim",slug:"ortaogretim",parent:gD,is_landing_page:a,children:[{id:3987,name:"5.Sınıf",slug:"5-sinif",parent:iu,is_landing_page:a,children:[]},{id:3988,name:"6.Sınıf",slug:"6-sinif",parent:iu,is_landing_page:a,children:[]},{id:3989,name:"7.Sınıf",slug:"7-sinif",parent:iu,is_landing_page:a,children:[]},{id:3990,name:"8.Sınıf",slug:"8-sinif",parent:iu,is_landing_page:a,children:[]}]},{id:iv,name:"Lise",slug:"lise",parent:gD,is_landing_page:a,children:[{id:3992,name:"9.Sınıf",slug:"9-sinif",parent:iv,is_landing_page:a,children:[]},{id:3993,name:"10.Sınıf",slug:"10-sinif",parent:iv,is_landing_page:a,children:[]},{id:3994,name:"11.Sınıf",slug:"11-sinif",parent:iv,is_landing_page:a,children:[]},{id:3995,name:"12.Sınıf",slug:"12-sinif",parent:iv,is_landing_page:a,children:[]}]},{id:Qv,name:"Üniversiteye Hazırlık",slug:"universiteye-hazirlik",parent:gD,is_landing_page:a,children:[{id:3997,name:"Üniversiteye Hazırlık Konu ve Soru",slug:"universiteye-hazirlik-konu-ve-soru",parent:Qv,is_landing_page:a,children:[]}]}]}]},{id:Y,name:Qw,slug:Qx,parent:X,is_landing_page:a,children:[{id:kz,name:Qy,slug:Qz,parent:Y,is_landing_page:a,children:[{id:4000,name:"LGS Konu ve Soru",slug:"lgs-konu-ve-soru",parent:kz,is_landing_page:a,children:[]},{id:4001,name:"LGS Deneme ve Çıkmış Sorular",slug:"lgs-deneme-ve-cikmis-sorular",parent:kz,is_landing_page:a,children:[]}]},{id:iw,name:"YKS, TYT ve AYT",slug:QA,parent:Y,is_landing_page:a,children:[{id:4003,name:"TYT Temel Yeterlilik Sınavı",slug:"tyt-temel-yeterlilik-sinavi",parent:iw,is_landing_page:a,children:[]},{id:4004,name:"AYT Alan Yeterlilik Sınavı",slug:"ayt-alan-yeterlilik-sinavi",parent:iw,is_landing_page:a,children:[]},{id:4005,name:"TYT ve AYT Sınavları",slug:"tyt-ve-ayt-sinavlari",parent:iw,is_landing_page:a,children:[]}]},{id:fq,name:QB,slug:QC,parent:Y,is_landing_page:a,children:[{id:4007,name:"KPSS GK-GY",slug:"kpss-gk-gy",parent:fq,is_landing_page:a,children:[]},{id:4008,name:"KPSS ÖABT",slug:"kpss-oabt",parent:fq,is_landing_page:a,children:[]},{id:4009,name:"KPSS Lise Önlisans",slug:"kpss-lise-onlisans",parent:fq,is_landing_page:a,children:[]},{id:4010,name:"KPSS Eğitim Bilimleri",slug:"kpss-egitim-bilimleri",parent:fq,is_landing_page:a,children:[]},{id:4011,name:"KPSS A Grubu",slug:"kpss-a-grubu",parent:fq,is_landing_page:a,children:[]}]},{id:kA,name:QD,slug:QE,parent:Y,is_landing_page:a,children:[{id:4013,name:"ALES Konu ve Soru",slug:"ales-konu-ve-soru",parent:kA,is_landing_page:a,children:[]},{id:4014,name:"ALES Deneme ve Çıkmış Sorular",slug:"ales-deneme-ve-cikmis-sorular",parent:kA,is_landing_page:a,children:[]}]},{id:QF,name:QG,slug:QH,parent:Y,is_landing_page:a,children:[]},{id:kB,name:QI,slug:QJ,parent:Y,is_landing_page:a,children:[{id:4017,name:"DGS Konu ve Soru",slug:"dgs-konu-ve-soru",parent:kB,is_landing_page:a,children:[]},{id:4018,name:"DGS Deneme ve Çıkmış Sorular",slug:"dgs-deneme-ve-cikmis-sorular",parent:kB,is_landing_page:a,children:[]}]},{id:4019,name:"SPK",slug:"spk-kitaplari",parent:Y,is_landing_page:a,children:[]},{id:ix,name:"YDS-TOEFL-COPE-YÖK DİL-LYS",slug:QK,parent:Y,is_landing_page:a,children:[{id:4021,name:"YDS-TOEFL-COPE-YÖK DİL-LYS Konu ve Soru",slug:"yds-toefl-cope-yok-dil-lys-konu-ve-soru",parent:ix,is_landing_page:a,children:[]},{id:4022,name:"YDS-TOEFL-COPE-YÖK DİL-LYS Deneme",slug:"yds-toefl-cope-yok-dil-lys-deneme",parent:ix,is_landing_page:a,children:[]},{id:4023,name:"YDS-TOEFL-COPE-YÖK DİL-LYS Çıkmış Sorular",slug:"yds-toefl-cope-yok-dil-lys-cikmis-sorular",parent:ix,is_landing_page:a,children:[]}]},{id:4024,name:"PMYO ve Askeri Sınavlar",slug:"pmyo-ve-askeri-sinavlar-kitaplari",parent:Y,is_landing_page:a,children:[]},{id:4025,name:"PTT Sınavları Hazırlık",slug:"ptt-sinavlari-hazirlik-kitaplari",parent:Y,is_landing_page:a,children:[]},{id:4026,name:"Açık Öğretim Sınavları Hazırlık",slug:"acik-ogretim-sinavlari-hazirlik-kitaplari",parent:Y,is_landing_page:a,children:[]},{id:4027,name:"Adli ve İdari Hakimlik",slug:"adli-ve-idari-hakimlik-kitaplari",parent:Y,is_landing_page:a,children:[]},{id:QL,name:QM,slug:QN,parent:Y,is_landing_page:a,children:[]}]},{id:dG,name:"Çocuk ve Gençlik Kitapları",slug:QO,parent:X,is_landing_page:a,children:[{id:4030,name:"Çocuk ve Gençlik Romanları",slug:"cocuk-ve-genclik-romanlari-kitaplari",parent:dG,is_landing_page:a,children:[]},{id:4031,name:Qu,slug:"okul-oncesi-kitaplari",parent:dG,is_landing_page:a,children:[]},{id:4032,name:"Masal,Hikaye ve Öykü",slug:"masal-hikaye-ve-oyku-kitaplari",parent:dG,is_landing_page:a,children:[]},{id:4033,name:Qr,slug:"cocuk-ve-genclik-cizgi-roman-ve-mizah-kitaplari",parent:dG,is_landing_page:a,children:[]},{id:4034,name:"Aktivite ve Eğitici Kitaplar",slug:"aktivite-ve-egitici-kitaplar",parent:dG,is_landing_page:a,children:[]},{id:4035,name:"Macera ve Fantastik",slug:"macera-ve-fantastik-kitaplar",parent:dG,is_landing_page:a,children:[]},{id:4036,name:"Boyama Kitapları",slug:"boyama-kitaplari",parent:dG,is_landing_page:a,children:[]}]},{id:iy,name:QP,slug:QQ,parent:X,is_landing_page:a,children:[{id:4038,name:QR,slug:"felsefe",parent:iy,is_landing_page:a,children:[]},{id:4039,name:"Siyaset",slug:"siyaset-kitaplari",parent:iy,is_landing_page:a,children:[]},{id:4040,name:"Sosyal Bilimler",slug:"sosyal-bilimler-kitaplari",parent:iy,is_landing_page:a,children:[]}]},{id:QS,name:QT,slug:QU,parent:X,is_landing_page:a,children:[]},{id:cY,name:QV,slug:QW,parent:X,is_landing_page:a,children:[{id:4043,name:"Diyetler ve Özel Beslenme",slug:"diyetler-ve-ozel-beslenme-kitaplari",parent:cY,is_landing_page:a,children:[]},{id:4044,name:"Çocuk Sağlığı",slug:"cocuk-sagligi-kitaplari",parent:cY,is_landing_page:a,children:[]},{id:4045,name:"Kadın Sağlığı",slug:"kadin-sagligi-kitaplari",parent:cY,is_landing_page:a,children:[]},{id:4046,name:"Alternatif Tıp",slug:"alternatif-tip-kitaplari",parent:cY,is_landing_page:a,children:[]},{id:4047,name:"Psikoloji ve Tavsiye",slug:"psikoloji-ve-tavsiye-kitaplari",parent:cY,is_landing_page:a,children:[]},{id:4048,name:"Cinsellik",slug:"cinsellik-kitaplari",parent:cY,is_landing_page:a,children:[]},{id:4049,name:"Yemek Kitapları",slug:"yemek-kitaplari",parent:cY,is_landing_page:a,children:[]},{id:4050,name:"Gelişim Psiklojisi",slug:"gelisim-psiklojisi-kitaplari",parent:cY,is_landing_page:a,children:[]}]},{id:ey,name:QX,slug:"ekonomi-ve-finans",parent:X,is_landing_page:a,children:[{id:4052,name:QX,slug:"ekonomi-ve-finans-kitaplari",parent:ey,is_landing_page:a,children:[]},{id:4053,name:"Kariyer, Yönetim ve Liderlik",slug:"kariyer-yonetim-ve-liderlik-kitaplari",parent:ey,is_landing_page:a,children:[]},{id:4054,name:"Muhasebe",slug:"muhasebe-kitaplari",parent:ey,is_landing_page:a,children:[]},{id:4055,name:"Pazarlama ve Satış",slug:"pazarlama-ve-satis-kitaplari",parent:ey,is_landing_page:a,children:[]},{id:4056,name:"Dış Ticaret",slug:"dis-ticaret-kitaplari",parent:ey,is_landing_page:a,children:[]},{id:4057,name:"Vergilendirme",slug:"vergilendirme-kitaplari",parent:ey,is_landing_page:a,children:[]},{id:4058,name:"İnsan Kaynakları ve Halkla İlişkiler",slug:"insan-kaynaklari-ve-halkla-iliskiler-kitaplari",parent:ey,is_landing_page:a,children:[]}]},{id:gE,name:"Güzel Sanatlar ve Fotoğraf",slug:"guzel-sanatlar-ve-fotograf-kitaplari",parent:X,is_landing_page:a,children:[{id:4060,name:"Tiyatro ve Sinema",slug:"tiyatro-ve-sinema-kitaplari",parent:gE,is_landing_page:a,children:[]},{id:4061,name:QY,slug:"muzik-kitaplari",parent:gE,is_landing_page:a,children:[]},{id:4062,name:"Grafik ve Animasyon",slug:"grafik-ve-animasyon-kitaplari",parent:gE,is_landing_page:a,children:[]},{id:4063,name:"Müzik Kitapları",slug:"muzik-egitim-kitaplari",parent:gE,is_landing_page:a,children:[]},{id:4064,name:"Fotoğrafçılık",slug:"fotografcilik-kitaplari",parent:gE,is_landing_page:a,children:[]}]},{id:dH,name:"Bilgisayarlar ve İnternet",slug:"bilgisayarlar-ve-internet-kitaplari",parent:X,is_landing_page:a,children:[{id:4066,name:"Bilgisayara Giriş",slug:"bilgisayara-giris-kitaplari",parent:dH,is_landing_page:a,children:[]},{id:4067,name:"Donanım",slug:"donanim-kitaplari",parent:dH,is_landing_page:a,children:[]},{id:4068,name:"İşletim Sistemleri",slug:"isletim-sistemleri-kitaplari",parent:dH,is_landing_page:a,children:[]},{id:4069,name:"Veritabanı",slug:"veritabani-kitaplari",parent:dH,is_landing_page:a,children:[]},{id:4070,name:"Programlama",slug:"programlama-kitaplari",parent:dH,is_landing_page:a,children:[]},{id:4071,name:"İnternet ve E-Ticaret",slug:"internet-ve-e-ticaret-kitaplari",parent:dH,is_landing_page:a,children:[]},{id:4072,name:"Klavye Teknikleri",slug:"klavye-teknikleri-kitaplari",parent:dH,is_landing_page:a,children:[]},{id:4073,name:"Tasarım",slug:"tasarim-kitaplari",parent:dH,is_landing_page:a,children:[]}]},{id:b_,name:"Akademik Bilimler",slug:"akademik-bilimler-kitaplari",parent:X,is_landing_page:a,children:[{id:4075,name:"Tarih",slug:"tarih-kitaplari",parent:b_,is_landing_page:a,children:[]},{id:4076,name:"Hukuk",slug:"hukuk-kitaplari",parent:b_,is_landing_page:a,children:[]},{id:4077,name:"Edebiyat",slug:"edebiyat-kitaplari",parent:b_,is_landing_page:a,children:[]},{id:4078,name:"Tıp",slug:"tip-kitaplari",parent:b_,is_landing_page:a,children:[]},{id:4079,name:"Mühendislik",slug:"muhendislik-kitaplari",parent:b_,is_landing_page:a,children:[]},{id:4080,name:"Fizik",slug:"fizik-kitaplari",parent:b_,is_landing_page:a,children:[]},{id:4081,name:"Kimya",slug:"kimya-kitaplari",parent:b_,is_landing_page:a,children:[]},{id:4082,name:"Biyoloji",slug:"biyoloji-kitaplari",parent:b_,is_landing_page:a,children:[]},{id:4083,name:"Matematik",slug:"matematik-kitaplari",parent:b_,is_landing_page:a,children:[]},{id:4084,name:QR,slug:"felsefe-kitabi",parent:b_,is_landing_page:a,children:[]},{id:4085,name:"Sosyoloji",slug:"sosyoloji-kitaplari",parent:b_,is_landing_page:a,children:[]}]},{id:kC,name:QZ,slug:Q_,parent:X,is_landing_page:a,children:[{id:4087,name:"Atlaslar ve Haritalar",slug:"atlaslar-ve-haritalar-kitaplari",parent:kC,is_landing_page:a,children:[]},{id:4088,name:"Sözlükler",slug:"sozlukler-kitaplari",parent:kC,is_landing_page:a,children:[]}]},{id:iz,name:"Yabancı Kaynaklar",slug:"yabanci-kaynaklar-kitaplari",parent:X,is_landing_page:a,children:[{id:4090,name:"Roman ve Hikaye",slug:"roman-ve-hikaye-kitaplari",parent:iz,is_landing_page:a,children:[]},{id:4091,name:"Test ve Alıştırma",slug:"test-ve-alistirma-kitaplari",parent:iz,is_landing_page:a,children:[]},{id:4092,name:"Bilim ve Araştırma",slug:"bilim-ve-arastirma-kitaplari",parent:iz,is_landing_page:a,children:[]},{id:4093,name:"Diğer Yabancı Dil Kaynakları",slug:"diger-yabanci-dil-kaynak-kitaplar",parent:iz,is_landing_page:a,children:[]}]}],color:mh,styles:{fontSize:cd}},{id:gF,name:Q$,slug:Ra,parent:j,is_landing_page:z,children:[{id:fr,name:"Film",slug:"film",parent:gF,is_landing_page:a,children:[{id:Rb,name:Rc,slug:Rd,parent:fr,is_landing_page:a,children:[]},{id:Re,name:Rf,slug:Rg,parent:fr,is_landing_page:a,children:[]},{id:4097,name:"Animasyon ve Çizgi Film",slug:"animasyon-ve-cizgi-film",parent:fr,is_landing_page:a,children:[]},{id:4098,name:"Belgesel",slug:"belgesel",parent:fr,is_landing_page:a,children:[]}]},{id:gG,name:QY,slug:"muzik",parent:gF,is_landing_page:a,children:[{id:b$,name:Rh,slug:Ri,parent:gG,is_landing_page:a,children:[{id:aJ,name:"Nefesli Çalgılar",slug:"nefesli-calgilar",parent:b$,is_landing_page:a,children:[{id:7949,name:"Klarnet",slug:"klarnet",parent:aJ,is_landing_page:a,children:[]},{id:7974,name:"Yan Flüt",slug:"yan-flut",parent:aJ,is_landing_page:a,children:[]},{id:7999,name:"Ney",slug:"ney",parent:aJ,is_landing_page:a,children:[]},{id:8024,name:"Melodika",slug:"melodika",parent:aJ,is_landing_page:a,children:[]},{id:8049,name:"Flüt",slug:"flut",parent:aJ,is_landing_page:a,children:[]},{id:8074,name:"Mızıka",slug:"mizika",parent:aJ,is_landing_page:a,children:[]},{id:8099,name:"Mey",slug:"mey",parent:aJ,is_landing_page:a,children:[]},{id:8124,name:"Kaval",slug:"kaval",parent:aJ,is_landing_page:a,children:[]},{id:8149,name:"Saksafon",slug:"saksafon",parent:aJ,is_landing_page:a,children:[]},{id:8174,name:"Zurna",slug:"zurna",parent:aJ,is_landing_page:a,children:[]},{id:8199,name:"Trompet",slug:"trompet",parent:aJ,is_landing_page:a,children:[]},{id:8224,name:"Trombon",slug:"trombon",parent:aJ,is_landing_page:a,children:[]},{id:8249,name:"Korno",slug:"korno",parent:aJ,is_landing_page:a,children:[]},{id:8274,name:"Bariton",slug:"bariton",parent:aJ,is_landing_page:a,children:[]},{id:8299,name:"Fagot",slug:"fagot",parent:aJ,is_landing_page:a,children:[]}]},{id:cs,name:Rj,slug:Rk,parent:b$,is_landing_page:a,children:[{id:gH,name:"Gitarlar",slug:"gitarlar",parent:cs,is_landing_page:a,children:[{id:7307,name:"Klasik Gitarlar",slug:"klasik-gitarlar",parent:gH,is_landing_page:a,children:[]},{id:7314,name:"Akustik Gitarlar",slug:"akustik-gitarlar",parent:gH,is_landing_page:a,children:[]},{id:7339,name:"Elektro Gitarlar",slug:"elektro-gitarlar",parent:gH,is_landing_page:a,children:[]},{id:7364,name:"Bass Gitarlar",slug:"bass-gitarlar",parent:gH,is_landing_page:a,children:[]},{id:7389,name:"Gitar Amfisi",slug:"gitar-amfisi",parent:gH,is_landing_page:a,children:[]}]},{id:7399,name:"Bağlama",slug:"baglama",parent:cs,is_landing_page:a,children:[]},{id:7424,name:"Ukulele",slug:"ukulele",parent:cs,is_landing_page:a,children:[]},{id:7449,name:"Ud",slug:"ud",parent:cs,is_landing_page:a,children:[]},{id:7474,name:"Cümbüş",slug:"cumbus",parent:cs,is_landing_page:a,children:[]},{id:7499,name:"Mandolin",slug:"mandolin",parent:cs,is_landing_page:a,children:[]},{id:7524,name:"Santur",slug:"santur",parent:cs,is_landing_page:a,children:[]},{id:7549,name:"Kanun",slug:"kanun",parent:cs,is_landing_page:a,children:[]},{id:7574,name:"Saz",slug:"saz",parent:cs,is_landing_page:a,children:[]}]},{id:ct,name:"Vurmalı Çalgılar",slug:"vurmalı-calgilar",parent:b$,is_landing_page:a,children:[{id:7714,name:"Bateri",slug:"bateri",parent:ct,is_landing_page:a,children:[]},{id:7739,name:"Akustik Davullar",slug:"akustik-davullar",parent:ct,is_landing_page:a,children:[]},{id:7764,name:"Dijital Davullar",slug:"dijital-davullar",parent:ct,is_landing_page:a,children:[]},{id:7789,name:"Davul",slug:"davul",parent:ct,is_landing_page:a,children:[]},{id:7814,name:"Darbuka",slug:"darbuka",parent:ct,is_landing_page:a,children:[]},{id:7839,name:"Perküsyon",slug:"perkusyon",parent:ct,is_landing_page:a,children:[]},{id:7864,name:"Trampet",slug:"trampet",parent:ct,is_landing_page:a,children:[]},{id:7889,name:"Defler",slug:"defler",parent:ct,is_landing_page:a,children:[]},{id:7914,name:"Zil",slug:"zil",parent:ct,is_landing_page:a,children:[]},{id:7939,name:"Tef",slug:"tef",parent:ct,is_landing_page:a,children:[]}]},{id:cZ,name:"Yaylı Çalgılar",slug:"yayli-calgilar",parent:b$,is_landing_page:a,children:[{id:8309,name:"Keman",slug:"keman",parent:cZ,is_landing_page:a,children:[]},{id:8334,name:"Kemençe",slug:"kemence",parent:cZ,is_landing_page:a,children:[]},{id:8359,name:"Kemane",slug:"kemane",parent:cZ,is_landing_page:a,children:[]},{id:8384,name:"Çello",slug:"cello",parent:cZ,is_landing_page:a,children:[]},{id:8409,name:"Tambur",slug:"tambur",parent:cZ,is_landing_page:a,children:[]},{id:8434,name:"Viyola",slug:"viyola",parent:cZ,is_landing_page:a,children:[]},{id:8459,name:"Viyolonsel",slug:"viyolonsel",parent:cZ,is_landing_page:a,children:[]},{id:8484,name:"Elektro Keman",slug:"elektro-keman",parent:cZ,is_landing_page:a,children:[]},{id:8509,name:"Kontrbas",slug:"kontrbas",parent:cZ,is_landing_page:a,children:[]}]},{id:M,name:"Stüdyo & DJ Ekipmanları",slug:"studyo-dj-ekipmanlari",parent:b$,is_landing_page:a,children:[{id:9199,name:"Kayıt Teknolojileri",slug:"kayit-teknolojileri",parent:M,is_landing_page:a,children:[]},{id:9224,name:"Stüdyo Donanımları ve Teknolojileri",slug:"studyo-donanimlari-ve-teknolojileri",parent:M,is_landing_page:a,children:[]},{id:9249,name:"Usb\u002FPcı\u002FFırewıre Interfaces",slug:"usb-Pci-firewire-interfaces",parent:M,is_landing_page:a,children:[]},{id:9274,name:"DJ Setup",slug:"dj-setup",parent:M,is_landing_page:a,children:[]},{id:9299,name:"Mixerler",slug:"mixerler",parent:M,is_landing_page:a,children:[]},{id:9324,name:"Synthesizer",slug:"synthesizer",parent:M,is_landing_page:a,children:[]},{id:9349,name:"Stüdyo & Sahne Aksesuarları",slug:"studyo-sahne-aksesuarlari",parent:M,is_landing_page:a,children:[]},{id:9374,name:"Direct Box",slug:"direct-box",parent:M,is_landing_page:a,children:[]},{id:9399,name:"Hoparlör Aksesuarları",slug:"hoparlor-aksesuarlari",parent:M,is_landing_page:a,children:[]},{id:9424,name:"Stagebox",slug:"stagebox",parent:M,is_landing_page:a,children:[]},{id:9449,name:"Stüdyo Kabloları",slug:"studyo-kablolari",parent:M,is_landing_page:a,children:[]},{id:9474,name:yE,slug:"mikrofonlar-s",parent:M,is_landing_page:a,children:[]},{id:9499,name:iH,slug:"kulakliklar-s",parent:M,is_landing_page:a,children:[]},{id:9524,name:"Plak",slug:"plak",parent:M,is_landing_page:a,children:[]},{id:9549,name:"Pikap",slug:"pikap-s",parent:M,is_landing_page:a,children:[]},{id:9574,name:"Ses Kartları",slug:"ses-kartlari",parent:M,is_landing_page:a,children:[]},{id:9599,name:"Kayıt Mikrofonları",slug:"kayit-mikrofonlari",parent:M,is_landing_page:a,children:[]},{id:9624,name:"Midi Klavye",slug:"midi-klavye",parent:M,is_landing_page:a,children:[]},{id:9649,name:"Stüdyo Monitör",slug:"studyo-monitor",parent:M,is_landing_page:a,children:[]},{id:9674,name:"Klavyeler",slug:"klavyeler-s",parent:M,is_landing_page:a,children:[]},{id:9699,name:"Dj Controller",slug:"dj-controller",parent:M,is_landing_page:a,children:[]},{id:9724,name:bn,slug:"aksesuarlar-s",parent:M,is_landing_page:a,children:[]},{id:9749,name:"Amfi Efect",slug:"amfi-efect",parent:M,is_landing_page:a,children:[]},{id:9774,name:"Pedallar",slug:"pedallar",parent:M,is_landing_page:a,children:[]},{id:9799,name:"Prosesörler",slug:"prosesorler",parent:M,is_landing_page:a,children:[]}]},{id:kD,name:"Tuşlu Çalgılar",slug:"tuslu-calgilar",parent:b$,is_landing_page:a,children:[{id:ny,name:"Piyano",slug:"piyano",parent:kD,is_landing_page:a,children:[{id:7624,name:"Akustik Piyanolar",slug:"akustik-piyanolar",parent:ny,is_landing_page:a,children:[]},{id:7689,name:"Dijital Piyanolar",slug:"dijital-piyanolar",parent:ny,is_landing_page:a,children:[]}]},{id:7649,name:"Org",slug:"org",parent:kD,is_landing_page:a,children:[]},{id:7664,name:"Akordiyon",slug:"akordiyon",parent:kD,is_landing_page:a,children:[]}]},{id:4107,name:"Orrf Enstrümanları",slug:"orrf-enstrumanlari",parent:b$,is_landing_page:a,children:[]},{id:Rl,name:Rm,slug:Rn,parent:b$,is_landing_page:a,children:[]}]},{id:4109,name:"Müzik Aletleri Aksesuarları",slug:"muzik-aletleri-aksesuarlari",parent:gG,is_landing_page:a,children:[]},{id:kE,name:Ro,slug:Rp,parent:gG,is_landing_page:a,children:[{id:4111,name:"Türk Sanatçılar",slug:"turk-sanatcilar",parent:kE,is_landing_page:a,children:[]},{id:4112,name:"Yabancı Sanatçılar",slug:"yabanci-sanatcilar",parent:kE,is_landing_page:a,children:[]}]}]},{id:ez,name:Rq,slug:Rr,parent:gF,is_landing_page:a,children:[{id:4114,name:"PlayStation 3",slug:"playstation-3",parent:ez,is_landing_page:a,children:[]},{id:Rs,name:Rt,slug:Ru,parent:ez,is_landing_page:a,children:[]},{id:4116,name:"Xbox One",slug:"xbox-one",parent:ez,is_landing_page:a,children:[]},{id:4117,name:"Xbox 360",slug:"xbox-360",parent:ez,is_landing_page:a,children:[]},{id:4118,name:"PC Oyunları",slug:"pc-oyunlari",parent:ez,is_landing_page:a,children:[]}]}],color:mu,styles:{fontSize:hE}},{id:nz,name:"Satış Sonrası Hizmetler Kategorisi",slug:"satis-sonrasi-hizmetler-kategorisi",parent:j,is_landing_page:z,children:[{id:6683,name:"Tamir Paketleri",slug:"tamir-paketleri",parent:nz,is_landing_page:a,children:[]},{id:6702,name:"Bakım Paketleri",slug:"bakim-paketleri",parent:nz,is_landing_page:a,children:[]}],color:gN,styles:void 0}]},top_categories:{children:[{id:ab,name:nA,slug:kF,url:kF,fontSize:kZ,url_type:af,parent:j,children:[{id:cw,name:"Cep Telefonu & Aksesuarlar",slug:pe,url_type:b,parent:ab,children:[{id:kO,name:kP,slug:kQ,url_type:b,parent:cw,children:[]},{id:pv,name:pw,slug:px,url_type:b,parent:dM,children:[]},{id:py,name:pz,slug:pA,url_type:b,parent:dM,children:[]},{id:ph,name:pi,slug:pj,url_type:b,parent:iG,children:[]},{id:pq,name:pr,slug:ps,url_type:b,parent:aA,children:[]},{id:dL,name:kL,slug:pk,url_type:b,parent:aA,children:[]},{id:fu,name:po,slug:pp,url_type:b,parent:aA,children:[]},{id:pf,name:kR,slug:pg,url_type:b,parent:aA,children:[]},{id:pt,name:"Araç Tutucular",slug:pu,url_type:b,parent:iI,children:[]},{id:pl,name:pm,slug:pn,url_type:b,parent:dL,children:[]}]},{id:E,name:nB,slug:nC,url_type:af,parent:ab,children:[{id:ca,name:"Bileşenler",slug:nM,url_type:b,parent:E,children:[]},{id:kG,name:"Dizüstü Bilgisayar",slug:nD,url_type:b,parent:E,children:[]},{id:nE,name:"Masaüstü Bilgisayar",slug:nF,url_type:b,parent:E,children:[]},{id:nG,name:"Tablet",slug:nI,url_type:b,parent:E,children:[]},{id:cu,name:"Yazıcı",slug:nV,url_type:b,parent:E,children:[]},{id:cb,name:nN,slug:nO,url_type:b,parent:E,children:[]},{id:iA,name:"Monitör",slug:nR,url_type:b,parent:E,children:[]},{id:dI,name:nJ,slug:nK,url_type:b,parent:E,children:[]},{id:cv,name:nW,slug:nX,url_type:b,parent:E,children:[]},{id:c$,name:"Yazılım",slug:nS,url_type:b,parent:E,children:[]}]},{id:bh,name:pC,slug:pD,url_type:af,parent:ab,children:[{id:pE,name:pF,slug:pG,url_type:b,parent:bh,children:[]},{id:eB,name:pH,slug:pI,url_type:b,parent:bh,children:[]},{id:gK,name:pJ,slug:pK,url_type:b,parent:bh,children:[]},{id:iJ,name:pL,slug:pM,url_type:b,parent:bh,children:[]}]},{id:aK,name:qh,slug:qi,url_type:af,parent:ab,children:[{id:fy,name:kU,slug:qj,url_type:b,parent:aK,children:[]},{id:fz,name:qk,slug:ql,url_type:b,parent:aK,children:[]},{id:iM,name:kW,slug:qo,url_type:b,parent:aK,children:[]},{id:qp,name:qq,slug:qr,url_type:b,parent:aK,children:[]}]},{id:F,name:n$,slug:oa,url_type:af,parent:ab,children:[{id:ob,name:oc,slug:od,url_type:b,parent:F,children:[]},{id:oh,name:oi,slug:oj,url_type:b,parent:F,children:[]},{id:oe,name:of,slug:og,url_type:b,parent:F,children:[]},{id:oB,name:oC,slug:oD,url_type:b,parent:F,children:[]},{id:ok,name:ol,slug:om,url_type:b,parent:F,children:[]},{id:oq,name:or,slug:os,url_type:b,parent:F,children:[]},{id:ov,name:ow,slug:ox,url_type:b,parent:F,children:[]},{id:kN,name:ot,slug:ou,url_type:b,parent:F,children:[]},{id:on,name:oo,slug:op,url_type:b,parent:F,children:[]},{id:oy,name:oz,slug:oA,url_type:b,parent:F,children:[]}]},{id:dc,name:oE,slug:oF,url_type:af,parent:ab,children:[{id:iE,name:oG,slug:oH,url_type:b,parent:x,children:[]},{id:eA,name:oJ,slug:oK,url_type:b,parent:x,children:[]},{id:ft,name:"Blender, Mikser ve Mutfak Robotu",slug:oM,url_type:b,parent:x,children:[]},{id:oN,name:oO,slug:oP,url_type:b,parent:x,children:[]},{id:oQ,name:oR,slug:oS,url_type:b,parent:x,children:[]},{id:oT,name:"Su Arıtma Cihazı",slug:oU,url_type:b,parent:x,children:[]},{id:oV,name:oW,slug:oX,url_type:b,parent:x,children:[]},{id:bH,name:oY,slug:oZ,url_type:b,parent:dc,children:[]},{id:iF,name:o$,slug:pa,url_type:b,parent:dc,children:[]},{id:pb,name:pc,slug:pd,url_type:b,parent:dc,children:[]}]},{id:ah,name:pN,slug:pO,url_type:af,parent:ab,children:[{id:gM,name:pP,slug:pQ,url_type:b,parent:ah,children:[]},{id:iL,name:pT,slug:pS,url_type:b,parent:ah,children:[]},{id:pU,name:pV,slug:pW,url_type:b,parent:ah,children:[]},{id:pX,name:pY,slug:pZ,url_type:b,parent:ah,children:[]},{id:cc,name:"Sobalar ve Isıtıcılar",slug:p_,url_type:b,parent:ah,children:[]},{id:p$,name:qa,slug:qb,url_type:b,parent:ah,children:[]},{id:qf,name:"Hava Perdesi",slug:qg,url_type:b,parent:ah,children:[]},{id:qc,name:qd,slug:qe,url_type:b,parent:ah,children:[]}]},{id:aC,name:"Fotoğraf & Video Kameralar",slug:yp,url_type:af,parent:j,children:[{id:yq,name:mf,slug:yr,url_type:b,parent:aC,children:[]},{id:jv,name:ys,slug:yt,url_type:b,parent:aC,children:[]},{id:dp,name:yu,slug:yv,url_type:b,parent:aC,children:[]},{id:eT,name:"Dürbün Teleskop",slug:"durbunler-teleskoplar-ve-optikler",url_type:b,parent:aC,children:[]},{id:yw,name:yx,slug:yy,url_type:b,parent:dp,children:[]},{id:yA,name:yB,slug:yC,url_type:b,parent:t,children:[]},{id:yG,name:"Dijital Çerçeveler",slug:yH,url_type:b,parent:aC,children:[]},{id:eb,name:"Karanlık Oda Ekipman",slug:yF,url_type:b,parent:aC,children:[]},{id:t,name:bn,slug:yz,url_type:b,parent:aC,children:[]}]}],color:gN,styles:qs},{id:aW,name:"Moda",slug:qt,url:"giyim-aksesuar",fontSize:cd,url_type:af,parent:j,children:[{id:au,name:"Kadın Giyim & Aksesuar",slug:qu,url_type:b,parent:aW,children:[{id:dd,name:iO,slug:qv,url_type:b,parent:Z,children:[]},{id:qC,name:k$,slug:qD,url_type:b,parent:Z,children:[]},{id:dP,name:qI,slug:qJ,url_type:b,parent:Z,children:[]},{id:bI,name:qU,slug:qV,url_type:b,parent:au,children:[]},{id:ai,name:ro,slug:rp,url_type:b,parent:au,children:[]},{id:bj,name:re,slug:rf,url_type:b,parent:au,children:[]},{id:aX,name:rq,slug:rr,url_type:b,parent:au,children:[]},{id:al,name:iR,slug:qP,url_type:b,parent:au,children:[]},{id:dQ,name:lj,slug:qT,url_type:b,parent:au,children:[]},{id:N,name:rl,slug:rm,url_type:b,parent:au,children:[]}]},{id:bk,name:"Erkek Giyim ve Aksesuar",slug:rv,url_type:b,parent:aW,children:[{id:fI,name:fB,slug:rx,url_type:b,parent:_,children:[]},{id:dg,name:gO,slug:rz,url_type:b,parent:_,children:[]},{id:fJ,name:lo,slug:rB,url_type:b,parent:_,children:[]},{id:fH,name:gR,slug:rw,url_type:b,parent:_,children:[]},{id:dR,name:rF,slug:rG,url_type:b,parent:_,children:[]},{id:aY,name:rN,slug:rO,url_type:b,parent:bk,children:[]},{id:dS,name:rL,slug:rM,url_type:b,parent:bk,children:[]},{id:cz,name:rJ,slug:rK,url_type:b,parent:bk,children:[]},{id:bJ,name:rS,slug:rT,url_type:b,parent:bk,children:[]},{id:cy,name:iR,slug:rH,url_type:b,parent:bk,children:[]}]},{id:cA,name:rV,slug:rW,url_type:b,parent:aW,children:[{id:rX,name:rY,slug:rZ,url_type:b,parent:cA,children:[]},{id:r_,name:r$,slug:sa,url_type:b,parent:cA,children:[]},{id:sb,name:sc,slug:sd,url_type:b,parent:cA,children:[]},{id:se,name:sf,slug:sg,url_type:b,parent:cA,children:[]}]},{id:fP,name:"Takı & Mücevher",slug:sy,url_type:b,parent:bK,children:[{id:sz,name:ja,slug:sA,url_type:b,parent:cB,children:[]},{id:sB,name:lE,slug:sC,url_type:b,parent:cB,children:[]},{id:sE,name:ja,slug:sF,url_type:b,parent:av,children:[]},{id:sG,name:lD,slug:sH,url_type:b,parent:av,children:[]},{id:sn,name:fO,slug:so,url_type:b,parent:ag,children:[]},{id:sk,name:hc,slug:sl,url_type:b,parent:ag,children:[]},{id:sq,name:fN,slug:sr,url_type:b,parent:ag,children:[]},{id:dh,name:si,slug:sj,url_type:b,parent:hb,children:[]}]},{id:hf,name:sX,slug:sY,url_type:b,parent:bK,children:[{id:sZ,name:s_,slug:s$,url_type:b,parent:eG,children:[]},{id:ta,name:tb,slug:tc,url_type:b,parent:eG,children:[]},{id:td,name:te,slug:tf,url_type:b,parent:eG,children:[]},{id:tj,name:tk,slug:tl,url_type:b,parent:eH,children:[]},{id:tg,name:th,slug:ti,url_type:b,parent:eH,children:[]}]},{id:ce,name:sJ,slug:sK,url_type:b,parent:bK,children:[{id:sL,name:sM,slug:sN,url_type:b,parent:ce,children:[]},{id:sO,name:sP,slug:sQ,url_type:b,parent:ce,children:[]},{id:sR,name:sS,slug:sT,url_type:b,parent:ce,children:[]},{id:sU,name:sV,slug:sW,url_type:b,parent:ce,children:[]}]},{id:eF,name:"Kol Saatleri",slug:sI,url_type:b,parent:bK,children:[]}],color:i$,styles:sh},{id:fQ,name:"Kozmetik & Sağlık",slug:tm,url:"kozmetik-saglik",fontSize:cd,url_type:af,parent:j,children:[{id:lL,name:ux,slug:uy,url_type:b,parent:fQ,children:[{id:eK,name:uN,slug:uO,url_type:b,parent:p,children:[]},{id:1040,name:"Aile Planlaması Ürünleri",slug:"aile-planlamasi-urunleri",url_type:b,parent:p,children:[]},{id:dX,name:uZ,slug:u_,url_type:b,parent:p,children:[]},{id:vb,name:lN,slug:vc,url_type:b,parent:p,children:[]},{id:dj,name:uX,slug:uY,url_type:b,parent:p,children:[]},{id:cE,name:uQ,slug:uR,url_type:b,parent:p,children:[]},{id:vd,name:ve,slug:vf,url_type:b,parent:p,children:[]},{id:aB,name:uS,slug:uT,url_type:b,parent:p,children:[]},{id:ac,name:uV,slug:uW,url_type:b,parent:p,children:[]},{id:hm,name:u$,slug:va,url_type:b,parent:p,children:[]}]},{id:bl,name:uz,slug:uA,url_type:b,parent:p,children:[{id:uB,name:uC,slug:uD,url_type:b,parent:bl,children:[]},{id:uE,name:uF,slug:uG,url_type:b,parent:bl,children:[]},{id:uH,name:uI,slug:uJ,url_type:b,parent:bl,children:[]},{id:uK,name:uL,slug:uM,url_type:b,parent:bl,children:[]}]},{id:dV,name:jc,slug:tn,url_type:b,parent:aw,children:[{id:fR,name:tr,slug:ts,url_type:b,parent:dV,children:[]},{id:hh,name:to,slug:tp,url_type:b,parent:dV,children:[]},{id:tt,name:tu,slug:tv,url_type:b,parent:dV,children:[]}]},{id:aj,name:tw,slug:tx,url_type:b,parent:aw,children:[{id:tP,name:tQ,slug:tR,url_type:b,parent:aj,children:[]},{id:tS,name:tT,slug:tU,url_type:b,parent:aj,children:[]},{id:tH,name:tI,slug:tJ,url_type:b,parent:aj,children:[]},{id:eJ,name:tF,slug:tG,url_type:b,parent:aj,children:[]},{id:cf,name:ty,slug:tz,url_type:b,parent:aj,children:[]},{id:tM,name:tN,slug:tO,url_type:b,parent:aj,children:[]},{id:tC,name:tD,slug:tE,url_type:b,parent:aj,children:[]},{id:jd,name:tK,slug:tL,url_type:b,parent:aj,children:[]}]},{id:aL,name:tV,slug:tW,url_type:b,parent:aw,children:[{id:cg,name:tX,slug:tY,url_type:b,parent:aL,children:[]},{id:hj,name:ua,slug:ub,url_type:b,parent:aL,children:[]},{id:cC,name:t_,slug:t$,url_type:b,parent:aL,children:[]},{id:ue,name:uf,slug:ug,url_type:b,parent:aL,children:[]},{id:jf,name:uc,slug:ud,url_type:b,parent:aL,children:[]},{id:uh,name:ui,slug:uj,url_type:b,parent:aL,children:[]}]},{id:uk,name:ul,slug:um,url_type:b,parent:aw,children:[{id:bL,name:un,slug:uo,url_type:b,parent:aw,children:[]},{id:di,name:ur,slug:us,url_type:b,parent:aw,children:[]},{id:cD,name:ut,slug:uu,url_type:b,parent:aw,children:[]},{id:dW,name:uv,slug:uw,url_type:b,parent:aw,children:[]}]}],color:lF,styles:vg},{id:y,name:"Anne & Bebek",slug:vh,url:"anne-bebek",fontSize:cd,url_type:af,parent:j,children:[{id:fV,name:"Çocuk Giyim ve Aksesuar",slug:vi,url_type:b,parent:aW,children:[{id:cG,name:vj,slug:vk,url_type:b,parent:fV,children:[]},{id:vl,name:vm,slug:vn,url_type:b,parent:cG,children:[]},{id:vo,name:vp,slug:vq,url_type:b,parent:cG,children:[]},{id:vr,name:vs,slug:vt,url_type:b,parent:cG,children:[]},{id:vu,name:vv,slug:vw,url_type:b,parent:cG,children:[]},{id:cH,name:vx,slug:vy,url_type:b,parent:fV,children:[]},{id:vz,name:vA,slug:vB,url_type:b,parent:cH,children:[]},{id:vC,name:vD,slug:vE,url_type:b,parent:cH,children:[]},{id:vF,name:"Erkek Çocuk Aksesuar",slug:vG,url_type:b,parent:cH,children:[]},{id:vH,name:vI,slug:vJ,url_type:b,parent:cH,children:[]}]},{id:jp,name:"Bebek Beslenme ve Mama Sandalyeleri",slug:l_,url_type:b,parent:hq,children:[{id:fY,name:wv,slug:ww,url_type:b,parent:y,children:[]},{id:jp,name:wI,slug:l_,url_type:b,parent:hq,children:[]},{id:dl,name:wx,slug:wy,url_type:b,parent:y,children:[]},{id:wJ,name:wK,slug:wL,url_type:b,parent:cJ,children:[]},{id:wM,name:wN,slug:wO,url_type:b,parent:cJ,children:[]}]},{id:jk,name:mK,slug:"bebek-bezi-islak-mendil-ve-alt-acma",url_type:b,parent:y,children:[{id:1174,name:FE,slug:"islak-mendil-ve-havlu",url_type:b,parent:jk,children:[]},{id:vS,name:vT,slug:vU,url_type:b,parent:jl,children:[]}]},{id:dm,name:wS,slug:wT,url_type:b,parent:bo,children:[{id:wX,name:wY,slug:wZ,url_type:b,parent:bo,children:[]},{id:wU,name:wV,slug:wW,url_type:b,parent:dm,children:[]},{id:4136,name:"Havlular Ve Keseler Ve Bornoz",slug:"havlular-ve-keseler-ve-bornoz",url_type:b,parent:dm,children:[]}]},{id:jm,name:vV,slug:vW,url_type:b,parent:y,children:[{id:wf,name:lV,slug:wg,url_type:b,parent:C,children:[]},{id:wa,name:lT,slug:wb,url_type:b,parent:C,children:[]},{id:wl,name:lW,slug:wm,url_type:b,parent:C,children:[]},{id:wt,name:gP,slug:wu,url_type:b,parent:G,children:[]},{id:wr,name:lS,slug:ws,url_type:b,parent:G,children:[]}]},{id:aN,name:w_,slug:w$,url_type:b,parent:y,children:[{id:xa,name:xb,slug:xc,url_type:b,parent:aN,children:[]},{id:xm,name:xn,slug:xo,url_type:b,parent:aN,children:[]},{id:xg,name:xh,slug:xi,url_type:b,parent:aN,children:[]},{id:xd,name:xe,slug:xf,url_type:b,parent:aN,children:[]},{id:xj,name:xk,slug:xl,url_type:b,parent:aN,children:[]}]},{id:eL,name:wz,slug:wA,url_type:b,parent:y,children:[{id:wD,name:wE,slug:wF,url_type:b,parent:cI,children:[]},{id:zO,name:zP,slug:zQ,url_type:b,parent:Rv,children:[]},{id:zL,name:zM,slug:zN,url_type:b,parent:Rv,children:[]},{id:cI,name:wB,slug:wC,url_type:b,parent:eL,children:[]},{id:dY,name:lZ,slug:wG,url_type:b,parent:eL,children:[]}]},{id:hr,name:xp,slug:xq,url_type:b,parent:y,children:[{id:xt,name:jq,slug:xu,url_type:b,parent:aO,children:[]},{id:xv,name:xw,slug:xx,url_type:b,parent:aO,children:[]},{id:hs,name:xr,slug:xs,url_type:b,parent:hr,children:[]}]},{id:aM,name:"Emzirme Ürünleri",slug:vK,url_type:b,parent:lP,children:[{id:vP,name:vQ,slug:vR,url_type:b,parent:aM,children:[]},{id:vL,name:"Göğüs Ucu Kremi",slug:vM,url_type:b,parent:aM,children:[]},{id:jj,name:vN,slug:vO,url_type:b,parent:aM,children:[]}]}],color:lO,styles:xy},{id:bp,name:"Ev & Yaşam",slug:yI,url:"ev-yasam",fontSize:hE,url_type:af,parent:j,children:[{id:V,name:jn,slug:Ji,url_type:b,parent:k,children:[{id:fa,name:Jj,slug:Jk,url_type:b,parent:V,children:[]},{id:Bb,name:Bc,slug:Bd,url_type:b,parent:V,children:[]},{id:Jl,name:Jm,slug:Jn,url_type:b,parent:V,children:[]},{id:hD,name:AY,slug:AZ,url_type:b,parent:V,children:[]},{id:Be,name:Bf,slug:Bg,url_type:b,parent:V,children:[]},{id:Bh,name:"Lambaderler",slug:Bi,url_type:b,parent:V,children:[]},{id:Jo,name:Jp,slug:Jq,url_type:b,parent:V,children:[]},{id:hX,name:Jr,slug:Js,url_type:b,parent:V,children:[]},{id:A_,name:A$,slug:Ba,url_type:b,parent:V,children:[]},{id:Bj,name:Bk,slug:Bl,url_type:b,parent:V,children:[]}]},{id:B,name:Jw,slug:Jx,url_type:b,parent:k,children:[{id:kc,name:Kg,slug:Kh,url_type:b,parent:k,children:[]},{id:JM,name:JN,slug:JO,url_type:b,parent:B,children:[]},{id:JP,name:JQ,slug:JR,url_type:b,parent:B,children:[]},{id:jX,name:mg,slug:JD,url_type:b,parent:B,children:[]},{id:JA,name:JB,slug:JC,url_type:b,parent:B,children:[]},{id:go,name:Jy,slug:Jz,url_type:b,parent:B,children:[]},{id:JG,name:JH,slug:JI,url_type:b,parent:B,children:[]},{id:JJ,name:JK,slug:JL,url_type:b,parent:B,children:[]},{id:JE,name:"Sigorta Kutuları",slug:JF,url_type:b,parent:B,children:[]},{id:JS,name:JT,slug:JU,url_type:b,parent:B,children:[]}]},{id:v,name:"Hırdavat ve Yapı Market",slug:JX,url_type:b,parent:k,children:[{id:u,name:Jd,slug:Je,url_type:b,parent:k,children:[]},{id:D,name:Jg,slug:Jh,url_type:b,parent:k,children:[]},{id:jY,name:J$,slug:Ka,url_type:b,parent:v,children:[]},{id:ar,name:Kk,slug:Kl,url_type:b,parent:k,children:[]},{id:er,name:Ki,slug:Kj,url_type:b,parent:k,children:[]},{id:gr,name:kT,slug:J_,url_type:b,parent:v,children:[]},{id:Kb,name:Kc,slug:Kd,url_type:b,parent:v,children:[]},{id:eq,name:Ke,slug:Kf,url_type:b,parent:k,children:[]},{id:hZ,name:JY,slug:JZ,url_type:b,parent:v,children:[]},{id:bB,name:JV,slug:JW,url_type:b,parent:k,children:[]}]},{id:ad,name:m_,slug:m$,url_type:b,parent:k,children:[{id:ad,name:m_,slug:m$,url_type:b,parent:k,children:[]},{id:bU,name:Km,slug:Kn,url_type:b,parent:k,children:[]},{id:fd,name:"Sulama Ekipmanları",slug:Ko,url_type:b,parent:k,children:[]},{id:3198,name:zn,slug:"bahce-mobilyasi",url_type:b,parent:k,children:[]},{id:bC,name:Kp,slug:Kq,url_type:b,parent:k,children:[]},{id:fe,name:Kr,slug:Ks,url_type:b,parent:k,children:[]},{id:ia,name:Kt,slug:Ku,url_type:b,parent:k,children:[]},{id:es,name:Kv,slug:Kw,url_type:b,parent:k,children:[]},{id:gv,name:Kx,slug:Ky,url_type:b,parent:k,children:[]},{id:Jt,name:Ju,slug:Jv,url_type:b,parent:V,children:[]}]},{id:U,name:yJ,slug:yK,url_type:b,parent:bp,children:[{id:ec,name:yL,slug:yM,url_type:b,parent:U,children:[]},{id:hy,name:zd,slug:ze,url_type:b,parent:U,children:[]},{id:ml,name:mi,slug:zf,url_type:b,parent:U,children:[]},{id:ci,name:yV,slug:yW,url_type:b,parent:U,children:[]},{id:eN,name:yO,slug:yP,url_type:b,parent:U,children:[]},{id:eO,name:yY,slug:yZ,url_type:b,parent:U,children:[]},{id:gb,name:y_,slug:y$,url_type:b,parent:U,children:[]},{id:bM,name:yQ,slug:yR,url_type:b,parent:U,children:[]},{id:gc,name:za,slug:zb,url_type:b,parent:U,children:[]}]},{id:I,name:zo,slug:zp,url_type:b,parent:bp,children:[{id:bN,name:jw,slug:zq,url_type:b,parent:I,children:[]},{id:ed,name:zs,slug:zt,url_type:b,parent:I,children:[]},{id:hA,name:zw,slug:zx,url_type:b,parent:I,children:[]},{id:aP,name:zy,slug:zz,url_type:b,parent:I,children:[]},{id:cM,name:zu,slug:zv,url_type:b,parent:I,children:[]},{id:zC,name:zD,slug:zE,url_type:b,parent:I,children:[]},{id:zF,name:zG,slug:zH,url_type:b,parent:I,children:[]},{id:eQ,name:mo,slug:zB,url_type:b,parent:I,children:[]},{id:zI,name:zJ,slug:zK,url_type:b,parent:I,children:[]}]},{id:r,name:zR,slug:zS,url_type:b,parent:bp,children:[{id:zT,name:zU,slug:zV,url_type:b,parent:r,children:[]},{id:ee,name:zW,slug:zX,url_type:b,parent:r,children:[]},{id:cj,name:zY,slug:zZ,url_type:b,parent:r,children:[]},{id:mp,name:Aa,slug:Ab,url_type:b,parent:r,children:[]},{id:dq,name:Ac,slug:Ad,url_type:b,parent:r,children:[]},{id:cO,name:Ae,slug:Af,url_type:b,parent:r,children:[]},{id:jy,name:Ag,slug:Ah,url_type:b,parent:r,children:[]},{id:Al,name:Am,slug:An,url_type:b,parent:r,children:[]},{id:Ai,name:Aj,slug:Ak,url_type:b,parent:r,children:[]},{id:gf,name:Ao,slug:Ap,url_type:b,parent:r,children:[]}]},{id:m,name:Aq,slug:Ar,url_type:b,parent:bp,children:[{id:AP,name:AQ,slug:AR,url_type:b,parent:m,children:[]},{id:Ax,name:Ay,slug:Az,url_type:b,parent:m,children:[]},{id:AA,name:AB,slug:AC,url_type:b,parent:m,children:[]},{id:AE,name:AF,slug:AG,url_type:b,parent:m,children:[]},{id:As,name:At,slug:Au,url_type:b,parent:m,children:[]},{id:AS,name:ms,slug:AT,url_type:b,parent:m,children:[]},{id:AK,name:AL,slug:AM,url_type:b,parent:m,children:[]},{id:a$,name:AN,slug:AO,url_type:b,parent:m,children:[]},{id:AU,name:AV,slug:AW,url_type:b,parent:m,children:[]},{id:AH,name:AI,slug:AJ,url_type:b,parent:m,children:[]}]}],color:ma,styles:Bm},{id:A,name:"Hobi Dünyası",slug:jr,url:"hobi-dunyasi",fontSize:lG,url_type:af,parent:j,children:[{id:X,name:Qk,slug:Ql,url_type:af,parent:j,children:[{id:nx,name:Qs,slug:Qt,url_type:b,parent:X,children:[]},{id:aI,name:Qm,slug:Qn,url_type:b,parent:X,children:[]},{id:Qo,name:Qp,slug:Qq,url_type:b,parent:aI,children:[]},{id:dG,name:"Çocuk ve Gençlik",slug:QO,url_type:b,parent:X,children:[]},{id:QS,name:QT,slug:QU,url_type:b,parent:X,children:[]},{id:cY,name:QV,slug:QW,url_type:b,parent:X,children:[]},{id:kC,name:QZ,slug:Q_,url_type:b,parent:X,children:[]},{id:iy,name:QP,slug:QQ,url_type:b,parent:X,children:[]}]},{id:Y,name:Qw,slug:Qx,url_type:b,parent:X,children:[{id:fq,name:QB,slug:QC,url_type:b,parent:Y,children:[]},{id:iw,name:"YKS",slug:QA,url_type:b,parent:Y,children:[]},{id:kA,name:QD,slug:QE,url_type:b,parent:Y,children:[]},{id:ix,name:"YDS",slug:QK,url_type:b,parent:Y,children:[]},{id:kB,name:QI,slug:QJ,url_type:b,parent:Y,children:[]},{id:kz,name:Qy,slug:Qz,url_type:b,parent:Y,children:[]},{id:QF,name:QG,slug:QH,url_type:b,parent:Y,children:[]},{id:QL,name:QM,slug:QN,url_type:b,parent:Y,children:[]}]},{id:gF,name:Q$,slug:Ra,url_type:af,parent:j,children:[{id:Re,name:Rf,slug:Rg,url_type:b,parent:fr,children:[]},{id:Rb,name:Rc,slug:Rd,url_type:b,parent:fr,children:[]},{id:b$,name:Rh,slug:Ri,url_type:b,parent:gG,children:[]},{id:cs,name:Rj,slug:Rk,url_type:b,parent:b$,children:[]},{id:Rl,name:Rm,slug:Rn,url_type:b,parent:b$,children:[]},{id:kE,name:Ro,slug:Rp,url_type:b,parent:gG,children:[]},{id:ez,name:Rq,slug:Rr,url_type:b,parent:gF,children:[]},{id:Rs,name:Rt,slug:Ru,url_type:b,parent:ez,children:[]}]},{id:PZ,name:nw,slug:P_,url_type:b,parent:L,children:[{id:Qf,name:Qg,slug:Qh,url_type:b,parent:L,children:[]},{id:Qc,name:Qd,slug:Qe,url_type:b,parent:L,children:[]},{id:PU,name:"Sanatsal Kağıt ve Defter",slug:PV,url_type:b,parent:L,children:[]},{id:PQ,name:Pq,slug:PR,url_type:b,parent:L,children:[]},{id:P$,name:Qa,slug:Qb,url_type:b,parent:L,children:[]},{id:PW,name:PX,slug:PY,url_type:b,parent:L,children:[]},{id:Qi,name:"Seramik & Heykel",slug:Qj,url_type:b,parent:L,children:[]},{id:PS,name:"Tuvaller",slug:PT,url_type:b,parent:L,children:[]}]},{id:as,name:"Ofis",slug:nv,url_type:af,parent:j,children:[{id:zk,name:zl,slug:zm,url_type:b,parent:gC,children:[]},{id:zh,name:zi,slug:zj,url_type:b,parent:gC,children:[]},{id:Q,name:PA,slug:PB,url_type:b,parent:as,children:[]},{id:az,name:PI,slug:PJ,url_type:b,parent:as,children:[]},{id:PK,name:PL,slug:PM,url_type:b,parent:cr,children:[]},{id:PN,name:PO,slug:PP,url_type:b,parent:cr,children:[]},{id:PC,name:PD,slug:PE,url_type:b,parent:Q,children:[]},{id:bY,name:O_,slug:O$,url_type:b,parent:bG,children:[]},{id:gB,name:Pa,slug:Pb,url_type:b,parent:bG,children:[]},{id:OX,name:OY,slug:OZ,url_type:b,parent:cq,children:[]}]},{id:as,name:"Kırtasiye",slug:nv,url_type:af,parent:j,children:[{id:w,name:Pi,slug:Pj,url_type:b,parent:bZ,children:[]},{id:W,name:Pc,slug:Pd,url_type:b,parent:bZ,children:[]},{id:at,name:Pv,slug:Pw,url_type:b,parent:bZ,children:[]},{id:Pe,name:Pf,slug:Pg,url_type:b,parent:W,children:[]},{id:Pr,name:Ps,slug:Pt,url_type:b,parent:w,children:[]},{id:Pn,name:Po,slug:Pp,url_type:b,parent:w,children:[]},{id:Pk,name:Pl,slug:Pm,url_type:b,parent:w,children:[]},{id:PF,name:PG,slug:PH,url_type:b,parent:Q,children:[]},{id:Px,name:Py,slug:Pz,url_type:b,parent:bZ,children:[]}]},{id:A,name:"Oyuncak",slug:jr,url_type:b,parent:j,children:[{id:ya,name:yb,slug:yc,url_type:b,parent:A,children:[]},{id:cL,name:yk,slug:yl,url_type:b,parent:A,children:[]},{id:d_,name:xP,slug:xQ,url_type:b,parent:A,children:[]},{id:dn,name:xK,slug:xL,url_type:b,parent:A,children:[]},{id:hu,name:yi,slug:yj,url_type:b,parent:A,children:[]},{id:ea,name:yg,slug:yh,url_type:b,parent:A,children:[]},{id:dZ,name:xz,slug:xA,url_type:b,parent:A,children:[]},{id:jt,name:xG,slug:xH,url_type:b,parent:A,children:[]},{id:js,name:xC,slug:xD,url_type:b,parent:A,children:[]}]},{id:A,name:"Hobi",slug:jr,url_type:b,parent:j,children:[{id:ju,name:xZ,slug:x_,url_type:b,parent:A,children:[]},{id:d$,name:xX,slug:xY,url_type:b,parent:A,children:[]},{id:xM,name:xN,slug:xO,url_type:b,parent:dn,children:[]},{id:ht,name:xS,slug:xT,url_type:b,parent:A,children:[]}]}],color:me,styles:yo},{id:eS,name:Bn,slug:Bo,url:"outdoor-spor",fontSize:cd,url_type:af,parent:j,children:[{id:gh,name:Dq,slug:Dr,url_type:b,parent:bq,children:[{id:Dx,name:gV,slug:Dy,url_type:b,parent:aE,children:[]},{id:Dv,name:gR,slug:Dw,url_type:b,parent:aE,children:[]},{id:Dz,name:iP,slug:DA,url_type:b,parent:aE,children:[]},{id:DD,name:DE,slug:DF,url_type:b,parent:aE,children:[]},{id:DB,name:lb,slug:DC,url_type:b,parent:aE,children:[]},{id:DG,name:"Spor Çantalar",slug:DH,url_type:b,parent:ej,children:[]},{id:DK,name:"Spor Çoraplar",slug:DL,url_type:b,parent:ej,children:[]},{id:DI,name:mz,slug:DJ,url_type:b,parent:ej,children:[]},{id:Dt,name:"Spor Terlikler",slug:Du,url_type:b,parent:cm,children:[]},{id:cm,name:"Ayakkabılar",slug:Ds,url_type:b,parent:gh,children:[]}]},{id:o,name:Bp,slug:Bq,url_type:b,parent:bq,children:[{id:BE,name:BF,slug:BG,url_type:b,parent:o,children:[]},{id:Bu,name:Bv,slug:Bw,url_type:b,parent:o,children:[]},{id:ba,name:BA,slug:BB,url_type:b,parent:o,children:[]},{id:Cp,name:Cq,slug:Cr,url_type:b,parent:ck,children:[]},{id:eg,name:Ck,slug:Cl,url_type:b,parent:ck,children:[]},{id:Cs,name:Ct,slug:Cu,url_type:b,parent:ck,children:[]},{id:Cm,name:Cn,slug:Co,url_type:b,parent:eg,children:[]},{id:BC,name:"Fitness Minderleri",slug:BD,url_type:b,parent:o,children:[]},{id:Br,name:Bs,slug:Bt,url_type:b,parent:o,children:[]},{id:Bx,name:By,slug:Bz,url_type:b,parent:o,children:[]}]},{id:$,name:BH,slug:BI,url_type:b,parent:bq,children:[{id:BJ,name:BK,slug:BL,url_type:b,parent:$,children:[]},{id:BS,name:BT,slug:BU,url_type:b,parent:$,children:[]},{id:BY,name:BZ,slug:B_,url_type:b,parent:$,children:[]},{id:BV,name:BW,slug:BX,url_type:b,parent:$,children:[]},{id:B$,name:Ca,slug:Cb,url_type:b,parent:$,children:[]},{id:BM,name:BN,slug:BO,url_type:b,parent:$,children:[]},{id:BP,name:BQ,slug:BR,url_type:b,parent:$,children:[]},{id:bb,name:Cc,slug:Cd,url_type:b,parent:$,children:[]},{id:bP,name:Cf,slug:Cg,url_type:b,parent:$,children:[]},{id:Ch,name:Ci,slug:Cj,url_type:b,parent:$,children:[]}]},{id:am,name:Cv,slug:Cw,url_type:b,parent:bq,children:[{id:CD,name:"Amino Asitler",slug:CE,url_type:b,parent:am,children:[]},{id:CA,name:CB,slug:CC,url_type:b,parent:am,children:[]},{id:CI,name:CJ,slug:CK,url_type:b,parent:am,children:[]},{id:CF,name:CG,slug:CH,url_type:b,parent:am,children:[]},{id:CQ,name:CR,slug:CS,url_type:b,parent:am,children:[]},{id:CL,name:"Performans Arttırıcılar",slug:CM,url_type:b,parent:am,children:[]},{id:Cx,name:Cy,slug:Cz,url_type:b,parent:am,children:[]},{id:CN,name:CO,slug:CP,url_type:b,parent:am,children:[]}]},{id:q,name:CT,slug:CU,url_type:b,parent:bq,children:[{id:bQ,name:CV,slug:CW,url_type:b,parent:q,children:[]},{id:gg,name:lx,slug:CX,url_type:b,parent:q,children:[]},{id:hH,name:CY,slug:CZ,url_type:b,parent:q,children:[]},{id:eU,name:C_,slug:C$,url_type:b,parent:q,children:[]},{id:eh,name:De,slug:Df,url_type:b,parent:q,children:[]},{id:eV,name:Da,slug:Db,url_type:b,parent:q,children:[]},{id:br,name:Dm,slug:Dn,url_type:b,parent:q,children:[]},{id:cl,name:Dc,slug:Dd,url_type:b,parent:q,children:[]},{id:bc,name:Do,slug:Dp,url_type:b,parent:q,children:[]},{id:ei,name:Dk,slug:Dl,url_type:b,parent:q,children:[]}]},{id:bs,name:DM,slug:DN,url_type:b,parent:eS,children:[{id:an,name:DO,slug:DP,url_type:b,parent:bs,children:[]},{id:DQ,name:DR,slug:DS,url_type:b,parent:an,children:[]},{id:DW,name:"Uyku Tulumları",slug:DX,url_type:b,parent:an,children:[]},{id:DT,name:DU,slug:DV,url_type:b,parent:an,children:[]},{id:aF,name:Fd,slug:Fe,url_type:b,parent:el,children:[]},{id:Fj,name:Fk,slug:Fl,url_type:b,parent:el,children:[]},{id:bR,name:Ff,slug:Fg,url_type:b,parent:el,children:[]},{id:hP,name:Fm,slug:Fn,url_type:b,parent:bs,children:[]}]},{id:hO,name:DZ,slug:D_,url_type:b,parent:bs,children:[{id:Ee,name:Ef,slug:Eg,url_type:b,parent:O,children:[]},{id:ao,name:D$,slug:Ea,url_type:b,parent:hO,children:[]},{id:Ej,name:Ek,slug:El,url_type:b,parent:O,children:[]},{id:Es,name:li,slug:Et,url_type:b,parent:O,children:[]},{id:Em,name:En,slug:Eo,url_type:b,parent:O,children:[]},{id:Eb,name:Ec,slug:Ed,url_type:b,parent:O,children:[]},{id:Eh,name:hw,slug:Ei,url_type:b,parent:O,children:[]},{id:Ep,name:Eq,slug:Er,url_type:b,parent:O,children:[]},{id:Eu,name:Ev,slug:Ew,url_type:b,parent:O,children:[]}]},{id:jH,name:Ex,slug:Ey,url_type:b,parent:bs,children:[{id:EF,name:EG,slug:EH,url_type:b,parent:P,children:[]},{id:EL,name:EM,slug:EN,url_type:b,parent:P,children:[]},{id:EI,name:EJ,slug:EK,url_type:b,parent:P,children:[]},{id:EO,name:EP,slug:EQ,url_type:b,parent:P,children:[]},{id:ER,name:ES,slug:ET,url_type:b,parent:P,children:[]},{id:E$,name:Fa,slug:Fb,url_type:b,parent:P,children:[]},{id:EU,name:EV,slug:EW,url_type:b,parent:P,children:[]},{id:EX,name:EY,slug:EZ,url_type:b,parent:P,children:[]},{id:Ez,name:EA,slug:EB,url_type:b,parent:aQ,children:[]},{id:EC,name:ED,slug:EE,url_type:b,parent:aQ,children:[]}]}],color:mh,styles:Fq},{id:aG,name:Fr,slug:mD,url:mD,fontSize:jQ,url_type:af,parent:j,children:[{id:cn,name:"Bebek Bezi",slug:"bebek-bezi",url_type:b,parent:aG,children:[{id:Fs,name:Ft,slug:Fu,url_type:b,parent:cn,children:[]},{id:Fv,name:Fw,slug:Fx,url_type:b,parent:cn,children:[]},{id:Fy,name:Fz,slug:FA,url_type:b,parent:cn,children:[]},{id:FB,name:FC,slug:FD,url_type:b,parent:cn,children:[]}]},{id:aq,name:"Kuru Gıda Ürünleri",slug:IL,url_type:b,parent:aG,children:[{id:bT,name:IP,slug:IQ,url_type:b,parent:aq,children:[]},{id:d,name:IM,slug:IN,url_type:b,parent:aq,children:[]},{id:gm,name:mL,slug:HT,url_type:b,parent:s,children:[]},{id:ak,name:Iv,slug:mM,url_type:b,parent:s,children:[]},{id:Io,name:Ip,slug:Iq,url_type:b,parent:eY,children:[]},{id:IR,name:IS,slug:IT,url_type:b,parent:aq,children:[]},{id:IU,name:IV,slug:IW,url_type:b,parent:aq,children:[]},{id:IX,name:IY,slug:IZ,url_type:b,parent:aq,children:[]},{id:I_,name:I$,slug:Ja,url_type:b,parent:aq,children:[]},{id:Is,name:It,slug:Iu,url_type:b,parent:ak,children:[]}]},{id:s,name:"Gıda Ürünleri",slug:HR,url_type:b,parent:aG,children:[{id:bx,name:HU,slug:HV,url_type:b,parent:s,children:[]},{id:by,name:HY,slug:HZ,url_type:b,parent:s,children:[]},{id:ap,name:IJ,slug:IK,url_type:b,parent:s,children:[]},{id:bz,name:Ia,slug:Ib,url_type:b,parent:s,children:[]},{id:Ih,name:Ii,slug:Ij,url_type:b,parent:bz,children:[]},{id:Ie,name:If,slug:Ig,url_type:b,parent:bz,children:[]},{id:bf,name:IH,slug:II,url_type:b,parent:s,children:[]},{id:bA,name:IF,slug:IG,url_type:b,parent:s,children:[]},{id:ak,name:Ir,slug:mM,url_type:b,parent:s,children:[]}]},{id:bu,name:"Ev Temizlik Gereçleri",slug:mE,url_type:b,parent:dt,children:[{id:Gw,name:Gx,slug:Gy,url_type:b,parent:bu,children:[]},{id:Gt,name:Gu,slug:Gv,url_type:b,parent:bu,children:[]},{id:mF,name:mG,slug:mH,url_type:b,parent:R,children:[]},{id:Gq,name:Gr,slug:Gs,url_type:b,parent:bu,children:[]}]},{id:bv,name:mI,slug:GZ,url_type:b,parent:aG,children:[{id:Hh,name:mK,slug:Hi,url_type:b,parent:bv,children:[]},{id:jO,name:He,slug:Hf,url_type:b,parent:bv,children:[]},{id:hU,name:Ha,slug:Hb,url_type:b,parent:bv,children:[]},{id:hV,name:Hc,slug:Hd,url_type:b,parent:bv,children:[]},{id:hS,name:G_,slug:G$,url_type:b,parent:bv,children:[]},{id:Hm,name:Hn,slug:Ho,url_type:b,parent:be,children:[]},{id:Hp,name:Hq,slug:Hr,url_type:b,parent:be,children:[]},{id:Hs,name:Ht,slug:Hu,url_type:b,parent:be,children:[]},{id:Hv,name:Hw,slug:Hx,url_type:b,parent:be,children:[]},{id:Hj,name:Hk,slug:Hl,url_type:b,parent:be,children:[]}]},{id:bw,name:mN,slug:Hy,url_type:b,parent:aG,children:[{id:eX,name:Hz,slug:HA,url_type:b,parent:bw,children:[]},{id:HB,name:HC,slug:HD,url_type:b,parent:eX,children:[]},{id:bS,name:HE,slug:HF,url_type:b,parent:bw,children:[]},{id:HL,name:HM,slug:HN,url_type:b,parent:bw,children:[]},{id:em,name:HG,slug:HH,url_type:b,parent:bw,children:[]},{id:HI,name:HJ,slug:HK,url_type:b,parent:em,children:[]},{id:HO,name:HP,slug:HQ,url_type:b,parent:bw,children:[]}]},{id:bd,name:"Bulaşık Yıkama Ürünleri",slug:F_,url_type:b,parent:dt,children:[{id:Gc,name:jM,slug:Gd,url_type:b,parent:bd,children:[]},{id:F$,name:Ga,slug:Gb,url_type:b,parent:bd,children:[]},{id:Gn,name:Go,slug:Gp,url_type:b,parent:bd,children:[]},{id:Ge,name:Gf,slug:Gg,url_type:b,parent:bd,children:[]},{id:Gk,name:Gl,slug:Gm,url_type:b,parent:bd,children:[]},{id:Gh,name:Gi,slug:Gj,url_type:b,parent:bd,children:[]}]},{id:dt,name:"Çamaşır Yıkama Ürünleri",slug:FF,url_type:b,parent:aG,children:[{id:FG,name:jM,slug:FH,url_type:b,parent:aR,children:[]},{id:FI,name:FJ,slug:FK,url_type:b,parent:aR,children:[]},{id:FR,name:FS,slug:FT,url_type:b,parent:aR,children:[]},{id:FO,name:FP,slug:FQ,url_type:b,parent:aR,children:[]},{id:FL,name:FM,slug:FN,url_type:b,parent:aR,children:[]},{id:FU,name:FV,slug:FW,url_type:b,parent:aR,children:[]},{id:FX,name:FY,slug:FZ,url_type:b,parent:aR,children:[]}]},{id:bu,name:"Temizlik Ürünleri",slug:mE,url_type:b,parent:dt,children:[{id:GC,name:"Mutfak & Banyo Temizleme",slug:GD,url_type:b,parent:R,children:[]},{id:mF,name:mG,slug:mH,url_type:b,parent:R,children:[]},{id:GN,name:GO,slug:GP,url_type:b,parent:R,children:[]},{id:GK,name:GL,slug:GM,url_type:b,parent:R,children:[]},{id:Gz,name:GA,slug:GB,url_type:b,parent:R,children:[]},{id:GT,name:GU,slug:GV,url_type:b,parent:R,children:[]},{id:GE,name:GF,slug:GG,url_type:b,parent:R,children:[]},{id:GQ,name:GR,slug:GS,url_type:b,parent:R,children:[]},{id:GH,name:GI,slug:GJ,url_type:b,parent:R,children:[]},{id:GW,name:GX,slug:GY,url_type:b,parent:R,children:[]}]}],color:mu,styles:Jb},{id:aH,name:Kz,slug:KA,url:"otomobil-motosiklet",fontSize:hE,url_type:af,parent:j,children:[{id:ie,name:Lu,slug:Lv,url_type:b,parent:aH,children:[{id:Lw,name:Lx,slug:Ly,url_type:b,parent:dA,children:[]},{id:Lz,name:LA,slug:LB,url_type:b,parent:dA,children:[]},{id:LC,name:LD,slug:LE,url_type:b,parent:dA,children:[]},{id:LF,name:LG,slug:LH,url_type:b,parent:dA,children:[]},{id:LI,name:LJ,slug:LK,url_type:b,parent:ie,children:[]}]},{id:n,name:LS,slug:LT,url_type:b,parent:gw,children:[{id:ig,name:nm,slug:LU,url_type:b,parent:n,children:[]},{id:ih,name:LV,slug:LW,url_type:b,parent:n,children:[]},{id:eu,name:LZ,slug:L_,url_type:b,parent:n,children:[]},{id:L$,name:Ma,slug:Mb,url_type:b,parent:n,children:[]},{id:bD,name:LX,slug:LY,url_type:b,parent:n,children:[]},{id:Mc,name:np,slug:Md,url_type:b,parent:gx,children:[]},{id:Me,name:Mf,slug:Mg,url_type:b,parent:gx,children:[]},{id:cV,name:LL,slug:LM,url_type:b,parent:gw,children:[]},{id:c,name:LN,slug:LO,url_type:b,parent:cV,children:[]},{id:f,name:LQ,slug:LR,url_type:b,parent:cV,children:[]}]},{id:id,name:K$,slug:La,url_type:b,parent:aH,children:[{id:Le,name:Lf,slug:Lg,url_type:b,parent:dz,children:[]},{id:Lh,name:Li,slug:Lj,url_type:b,parent:dz,children:[]},{id:Lb,name:Lc,slug:Ld,url_type:b,parent:dz,children:[]},{id:Lk,name:Ll,slug:Lm,url_type:b,parent:dz,children:[]},{id:Ln,name:kH,slug:Lo,url_type:b,parent:et,children:[]},{id:Lp,name:Lq,slug:Lr,url_type:b,parent:et,children:[]},{id:Ls,name:mC,slug:Lt,url_type:b,parent:et,children:[]}]},{id:aa,name:Mh,slug:Mi,url_type:b,parent:aH,children:[{id:ij,name:Mq,slug:Mr,url_type:b,parent:aa,children:[]},{id:Mj,name:Mk,slug:Ml,url_type:b,parent:aa,children:[]},{id:ii,name:Mm,slug:Mn,url_type:b,parent:aa,children:[]},{id:kp,name:Mo,slug:Mp,url_type:b,parent:aa,children:[]},{id:Ms,name:Mt,slug:Mu,url_type:b,parent:aa,children:[]}]},{id:aS,name:KB,slug:KC,url_type:b,parent:aH,children:[{id:KT,name:KU,slug:KV,url_type:b,parent:aS,children:[]},{id:ax,name:KD,slug:KE,url_type:b,parent:aS,children:[]},{id:aT,name:KF,slug:KG,url_type:b,parent:aS,children:[]},{id:KR,name:nl,slug:KS,url_type:b,parent:aS,children:[]},{id:dy,name:KW,slug:KX,url_type:b,parent:aS,children:[]},{id:kn,name:KY,slug:KZ,url_type:b,parent:aS,children:[]},{id:kl,name:KH,slug:KI,url_type:b,parent:aT,children:[]},{id:KL,name:KM,slug:KN,url_type:b,parent:aT,children:[]},{id:km,name:KJ,slug:KK,url_type:b,parent:aT,children:[]},{id:KO,name:KP,slug:KQ,url_type:b,parent:aT,children:[]}]},{id:aU,name:MJ,slug:MK,url_type:b,parent:aH,children:[{id:MU,name:MV,slug:MW,url_type:b,parent:aU,children:[]},{id:ML,name:MM,slug:MN,url_type:b,parent:aU,children:[]},{id:MO,name:MP,slug:MQ,url_type:b,parent:aU,children:[]},{id:MR,name:MS,slug:MT,url_type:b,parent:aU,children:[]},{id:MX,name:jo,slug:MY,url_type:b,parent:aU,children:[]}]},{id:cW,name:Mv,slug:Mw,url_type:b,parent:aH,children:[{id:ev,name:Mx,slug:My,url_type:b,parent:cW,children:[]},{id:dB,name:Mz,slug:MA,url_type:b,parent:cW,children:[]},{id:ik,name:MF,slug:MG,url_type:b,parent:dB,children:[]},{id:gy,name:MB,slug:MC,url_type:b,parent:dB,children:[]},{id:ay,name:MD,slug:ME,url_type:b,parent:dB,children:[]},{id:kq,name:MH,slug:MI,url_type:b,parent:cW,children:[]}]}],color:gN,styles:MZ},{id:bE,name:M_,slug:nr,url:nr,fontSize:jQ,url_type:af,parent:j,children:[{id:J,name:M$,slug:Na,url_type:b,parent:bE,children:[{id:kr,name:Nb,slug:Nc,url_type:b,parent:J,children:[]},{id:bV,name:Nd,slug:Ne,url_type:b,parent:J,children:[]},{id:il,name:Ng,slug:Nh,url_type:b,parent:J,children:[]},{id:bW,name:Ni,slug:Nj,url_type:b,parent:J,children:[]},{id:gz,name:"Taşıma & Seyahat Ürünleri",slug:Nm,url_type:b,parent:J,children:[]},{id:dC,name:Nn,slug:No,url_type:b,parent:J,children:[]},{id:dD,name:Np,slug:Nq,url_type:b,parent:J,children:[]},{id:im,name:Nr,slug:Ns,url_type:b,parent:J,children:[]},{id:Nt,name:Nu,slug:Nv,url_type:b,parent:J,children:[]},{id:aV,name:Nw,slug:Nx,url_type:b,parent:J,children:[]}]},{id:bg,name:NZ,slug:N_,url_type:b,parent:bE,children:[{id:fl,name:Ob,slug:Oc,url_type:b,parent:bg,children:[]},{id:fk,name:N$,slug:Oa,url_type:b,parent:bg,children:[]},{id:Od,name:Oe,slug:Of,url_type:b,parent:bg,children:[]},{id:Og,name:Oh,slug:Oi,url_type:b,parent:bg,children:[]},{id:ip,name:Oj,slug:Ok,url_type:b,parent:bg,children:[]},{id:Ol,name:Om,slug:On,url_type:b,parent:bg,children:[]}]},{id:K,name:ND,slug:NE,url_type:b,parent:bE,children:[{id:ks,name:NF,slug:NG,url_type:b,parent:K,children:[]},{id:kt,name:"Kedi Kumu",slug:NJ,url_type:b,parent:K,children:[]},{id:ex,name:NH,slug:NI,url_type:b,parent:K,children:[]},{id:dE,name:NK,slug:NL,url_type:b,parent:K,children:[]},{id:in0,name:NM,slug:NN,url_type:b,parent:K,children:[]},{id:io,name:NO,slug:NP,url_type:b,parent:K,children:[]},{id:gA,name:NQ,slug:NR,url_type:b,parent:K,children:[]},{id:NS,name:NT,slug:NU,url_type:b,parent:K,children:[]},{id:fj,name:NV,slug:NW,url_type:b,parent:K,children:[]},{id:bF,name:NX,slug:NY,url_type:b,parent:K,children:[]}]},{id:S,name:Oo,slug:Op,url_type:b,parent:bE,children:[{id:ku,name:Oq,slug:Or,url_type:b,parent:S,children:[]},{id:kv,name:Ot,slug:Ou,url_type:b,parent:S,children:[]},{id:bX,name:Ov,slug:Ow,url_type:b,parent:S,children:[]},{id:fn,name:Ox,slug:Oy,url_type:b,parent:S,children:[]},{id:fo,name:hv,slug:Oz,url_type:b,parent:S,children:[]},{id:iq,name:OA,slug:OB,url_type:b,parent:S,children:[]},{id:kw,name:OC,slug:OD,url_type:b,parent:S,children:[]},{id:OE,name:OF,slug:OG,url_type:b,parent:S,children:[]},{id:fp,name:"Su Kimyası Bakımı",slug:OI,url_type:b,parent:S,children:[]},{id:ir,name:OJ,slug:OK,url_type:b,parent:S,children:[]}]},{id:cX,name:OM,slug:ON,url_type:b,parent:bE,children:[{id:OO,name:"Yemler & Ek Besinler",slug:OP,url_type:b,parent:cX,children:[]},{id:kx,name:"Terraryumlar ve Malzemeler",slug:OQ,url_type:b,parent:cX,children:[]},{id:OR,name:"Aydınlatma ve Isıtma Malzemeleri",slug:OS,url_type:b,parent:cX,children:[]},{id:OT,name:OU,slug:OV,url_type:b,parent:cX,children:[]}]}],color:i$,styles:OW}]},isResponsive:a,responsiveCheck:a,windowWidth:j,banners:[],suggestions:{keyword:T,browse:[],keywords:{results:[]},categories:{results:[]},products:{results:[]}},numberOfRequest:j,xtoken:T,home_sliders:[],home_superDeals:[],home_mostSolds:[],home_bestCategories:[],home_mostSoldPhones:[],home_banners:[],lastDate:c_,mapStatus:a,adultPermission:a,insider_smart_recommender:{},buyback_title:T,device_type:T,device_title:T,model_title:T,raffle_products:{},cart:{cart_items:{shops:[],messages:[],count:j,total_price:j,total_price_with_shipping:j,has_gold:a,tc_required:a,total_billing_price:j},cart_list:[],order:{}},list:{list:[],product_list:[],selected_list:c_,selected_category_name:T},order:{card_number:T,card_name:T,card_month:T,card_year:T,card_cvc:T,pttem_card_limit_request:a,contract_is_checked:a,interest:j,kk_installment:ab,pay_with_url_data:c_,cancel_reasons:[]},product:{product:{id:Rw,name:Rx,original_price:37679.208,url:"apple-iphone-13-128-gb-gece-yarisi-cep-telefonu-apple-turkiye-garantili-p-230662642",price:37679.21,ship_price:j,images:[{thumbnail:"https:\u002F\u002Fimg-pttavm.mncdn.com\u002Fpimages\u002F170\u002F230\u002F662\u002F62f50a37590d4.jpg?v=201910111530",original:"https:\u002F\u002Fimg-pttavm.mncdn.com\u002Fpimages\u002F592\u002F230\u002F662\u002F62f50a3769b57.jpg?v=201910111530"},{thumbnail:"https:\u002F\u002Fimg-pttavm.mncdn.com\u002Fpimages\u002F170\u002F230\u002F662\u002F62f50a38043bd.jpg?v=201910111530",original:"https:\u002F\u002Fimg-pttavm.mncdn.com\u002Fpimages\u002F592\u002F230\u002F662\u002F62f50a3813b16.jpg?v=201910111530"},{thumbnail:"https:\u002F\u002Fimg-pttavm.mncdn.com\u002Fpimages\u002F170\u002F230\u002F662\u002F62f50a389d256.jpg?v=201910111530",original:"https:\u002F\u002Fimg-pttavm.mncdn.com\u002Fpimages\u002F592\u002F230\u002F662\u002F62f50a38b1eb0.jpg?v=201910111530"},{thumbnail:"https:\u002F\u002Fimg-pttavm.mncdn.com\u002Fpimages\u002F170\u002F230\u002F662\u002F62f50a397b688.jpg?v=201910111530",original:"https:\u002F\u002Fimg-pttavm.mncdn.com\u002Fpimages\u002F592\u002F230\u002F662\u002F62f50a3994a3a.jpg?v=201910111530"},{thumbnail:"https:\u002F\u002Fimg-pttavm.mncdn.com\u002Fpimages\u002F170\u002F230\u002F662\u002F62f50a39f3745.jpg?v=201910111530",original:"https:\u002F\u002Fimg-pttavm.mncdn.com\u002Fpimages\u002F592\u002F230\u002F662\u002F62f50a3a0edb3.jpg?v=201910111530"},{thumbnail:"https:\u002F\u002Fimg-pttavm.mncdn.com\u002Fpimages\u002F170\u002F230\u002F662\u002F62f50a3a793dd.jpg?v=201910111530",original:"https:\u002F\u002Fimg-pttavm.mncdn.com\u002Fpimages\u002F592\u002F230\u002F662\u002F62f50a3a89023.jpg?v=201910111530"},{thumbnail:"https:\u002F\u002Fimg-pttavm.mncdn.com\u002Fpimages\u002F170\u002F230\u002F662\u002F62f50a3b3c742.jpg?v=201910111530",original:"https:\u002F\u002Fimg-pttavm.mncdn.com\u002Fpimages\u002F592\u002F230\u002F662\u002F62f50a3b4aedb.jpg?v=201910111530"},{thumbnail:"https:\u002F\u002Fimg-pttavm.mncdn.com\u002Fpimages\u002F170\u002F230\u002F662\u002F62f50a3bb8df3.jpg?v=201910111530",original:"https:\u002F\u002Fimg-pttavm.mncdn.com\u002Fpimages\u002F592\u002F230\u002F662\u002F62f50a3bc90a0.jpg?v=201910111530"}],stock:aC,categories:{id:kO,name:kP,url:kQ,breadcrumb:Ry,breadcrumb_text:Ry,breadcrumb_url:Rz,breadcrumb_url_text:Rz,breadcrumb_url_key:"elektronik,telefonveaksesuar,ceptelefonu",parent_id:cw,max_installment:j,basket_max_limit:aG},comments:[],upper_limit:ab,short_description:Rx,shop_active:z,active:z,description:T,attributes:[{attribute_type:"property",id:6564,category_id:-1,name:RA,name_text:RA,name_key:"marka",key_value:"property;;6564;;Marka;;-1",values:{id:97600,name:RB,name_text:RB,name_key:"apple",key_value:"property;;6564;;97600;;Apple;;1"}}],stock_counts:[],thumbnail:"https:\u002F\u002Fimg.epttavm.com\u002Fpimages\u002F170\u002F230\u002F662\u002F62f50a37590d4.jpg?v=201910111530",big_thumbnail:"https:\u002F\u002Fimg.epttavm.com\u002Fpimages\u002F592\u002F230\u002F662\u002F62f50a3769b57.jpg?v=201910111530",inf_msg:T,pttem_card:a,is_adult:a,interest_free_installments:[],discount:{max_quantity:ab},shop:{id:21006,logo:"https:\u002F\u002Fimg.pttavm.com\u002Fshop\u002Flogo_html\u002F21006.jpg?v=1694784059",name:"Aksaray İletişim",url:"aksarayiletisim",rating:nP,rating_count:kN,max_product:50000,shop_active:z,estimated_courier_delivery:T},comment_count:aW,average:y,ratings:[{id:ab,point:j},{id:aW,point:j},{id:bK,point:j},{id:fQ,point:j},{id:y,point:aW}],fast_shipping:{status:a},disaster:a,warranty_duration:kG},badges:{pttemCard:a,disaster:a,kargomat:z,cashOnDelivery:a,wholeSale:a,badges:[]},comments:{result:[{id:"229177",user_id:21997171,rate:y,comment:"Hızlı gönderi sağlam paketleme için teşekkür ederim.mağaza güvenilir alışveriş yapmanızı tavsiye ederim.soruma biraz geç cvp vermiş olsalarda herşey yolunda gitti.",comment_date:"2023-01-12 11:41",first_name:"Ceisem",username:"C***** E*********",like:j,dislike:j},{id:"213463",user_id:29752171,rate:y,comment:"Ürün 5 gün içinde teslim edildi. Hiç bir sıkıntı yaşamadım. PTTAVM ve Aksaray İletişim çalışanlarına çok teşekkür ederim.",comment_date:"2022-11-28 11:18",first_name:"SEYFULLAH",username:"S******** K*****",like:j,dislike:j}],result_count:aW},insurances:[],comment_data:{productId:Rw,limit:y,offset:j,order:"date_desc"},commentPanelStatus:a,askToShopPanelStatus:a,suggestFriendPanelStatus:a,toptanPanelStatus:a,priceStatus:"COMPLETED",selectedVariants:[],selectedCount:ab,shop_tag:{name:T,city:T,mersis:T,kep:T,taxnumber:T},selectedFastShipping:{},activeStar:j,commentedProducts:[]},user:{access_token:T,user:{is_active:a},addresses:[],use_as_invoice:z,selected_address:RC,selected_invoice:RC,edited_address:c_,address_form_status:a,address_form_type:c_,shipping_option:"address",comments:[],temporaryAddress:{},temporaryBranchInfo:{},temporaryKargomatInfo:{},selected_branch:c_,selected_kargomat:c_,locked_places:c_,guest_email:T}},serverRendered:z,routePath:"\u002Fapple-iphone-13-128-gb-gece-yarisi-cep-telefonu-apple-turkiye-garantili-p-230662642",config:{_app:{basePath:RD,assetsPath:RD,cdnURL:"https:\u002F\u002Ffront-pttavm.mncdn.com\u002F_nuxt\u002F"}}}}(false,"arama",3370,2595,3372,3382,4225,3371,2476,0,11,3383,1716,3384,1788,1001,1925,1632,2365,1444,2788,2995,3838,49,5,true,6,2939,1180,2857,17,18,1212,"Diğer",1553,3534,3616,3944,4105,359,4119,2186,3887,2298,3702,"",1487,2910,3817,15,3998,354,362,1832,3431,1,1044,3127,3481,"category",760,22,360,880,2459,355,1916,2090,2129,2576,2594,3111,14,3866,349,763,868,3274,3502,3919,54,1025,7,1753,2067,2217,10,12,3964,4101,23,922,1130,4144,4155,1583,2173,2275,3273,3311,3525,3601,2,361,366,780,6843,1733,1795,1840,2006,2283,2330,2563,3682,21,380,358,350,1002,1140,"Aksesuarlar",4127,8,1787,1994,2089,2203,2290,2311,2339,2372,2403,2415,2551,2962,3212,3393,13,3670,3791,50,357,367,3,965,1501,1554,1703,1891,1926,2232,2345,2769,3176,3546,3561,3716,3794,3816,4074,4100,28,29,71,"30px",756,881,923,1241,1512,1641,1903,1963,2058,1169,2425,2792,3781,3935,4102,4103,33,36,20,381,363,364,353,762,936,984,1016,1102,368,369,1269,1303,1378,1402,1572,6863,1662,1777,1845,2107,2393,3045,3046,3369,3458,3774,4042,4104,null,31,32,129,19,379,393,400,494,759,976,1064,1093,1257,4131,1341,1358,1437,1653,6884,2163,2274,2436,3016,3286,3329,3338,3350,3362,3468,3577,3585,3638,3763,4029,4065,27,135,136,178,55,56,256,391,356,506,365,761,779,869,993,1072,1288,1320,1348,1367,1390,1473,1488,1565,1634,1881,1905,1973,1980,2078,2117,2216,2356,2384,2451,2539,3077,3097,3249,3355,3405,3459,3471,3628,4051,4113,144,60,505,510,527,755,776,778,901,909,1010,1265,1311,1495,1522,6822,1623,1676,9,1480,1946,1957,1987,2340,2445,2831,2845,2885,2911,3098,3142,3192,3239,3260,3406,3536,3618,3660,3683,3689,3704,3727,3733,3748,4006,4094,6887,146,179,188,57,65,75,76,"Giyim","Gömlek",389,406,419,423,428,492,493,495,497,498,352,"Yüzük","Kolye",754,4,874,883,889,949,351,1157,1205,1252,1329,1412,1418,1430,1528,1542,1597,1603,1698,1937,2057,2083,2092,2101,2247,2367,2874,2940,2963,2972,3003,3058,3071,3214,3255,3368,3428,3469,3572,3654,3805,3909,3979,4059,16,4099,7264,137,142,61,215,66,"ePurple","Pantolon","Tulum",383,"T-Shirt","Polo Yaka","Kapüşonlu","V Yaka","Eşofman",392,399,"Çorap",412,421,422,427,753,"Bileklik","Küpe",765,757,781,870,"Krem",945,"Losyon","Yağ",1086,1163,1236,1295,1300,4153,4154,1355,1398,"Filtreler","Yağmurluklar",1529,1547,6555,1579,1609,1614,2917,"28px",1859,1876,1942,1952,"Aksesuar",2022,2030,2044,2052,2128,2245,2253,7064,2312,"Düz \u002F Katsız",2316,2320,2868,2932,2978,2996,3164,3228,3245,3281,3297,3349,3361,3373,3385,3389,3433,3450,3518,3557,3593,3646,3650,3697,3739,3754,3758,3981,3986,3991,4002,4020,4037,4089,30,115,34,"Ekran Koruyucular",143,51,177,"Kulaklıklar",183,64,216,67,80,257,"Elbise","Sweatshirt",390,"İç Giyim","Külot","Mayo",420,"Spor Ayakkabı","Eldiven",500,511,526,529,"eGreen","Altın Bileklik",758,"Parfüm",916,924,955,"Sprey","Süt",1079,1132,1168,1175,1178,"Aydınlatma","Sticker",1301,"Bebek Bakım Çantası","hobi-ve-oyuncak",1328,1336,1374,1429,"Halı",1619,1671,1683,1719,1841,1855,1864,1870,2035,2040,2172,2246,2258,2262,2266,"Makine Deterjanı","Z Katlama",2324,2547,"24px",2803,2807,2814,2852,2862,2895,2947,3028,3032,3036,3078,3082,3090,3094,3106,3128,3135,3149,3153,3188,3224,3270,3312,3316,3346,3413,3439,3522,3535,3617,3635,3703,3713,3743,3776,3960,3999,4012,4016,4086,4106,4110,"elektronik",24,"Monitörler",118,121,35,"Şarj Cihazları","Yedek Parçalar",46,53,"Cep Telefonları","cep-telefonu","Kılıflar","Uzaktan Kumandalar","Radyatörler","Güvenlik Kameraları",78,"Alarm Sistemleri",82,"2px","26px",382,"Bluz",388,"Tayt","Bisiklet Yaka","Boğazlı (Balıkçı) Yaka","Kazak","Yelek","Bolero","Şort","Termal İç Giyim","Plaj Giyim","Günlük Ayakkabı",425,"Sandalet","Terlik","Ceket","Şemsiye","Saç Aksesuarları",499,502,503,504,508,514,"Basketbol","Krampon","Tesbih","Kol Düğmesi","Kravat İğnesi","Takı Kutusu","Altın Yüzük","Altın Kolye","eBlue","32px","Setler","Köpük","Maskeler","Jel",1000,1083,"Besin Takviyeleri","eGold",1129,1153,1179,"Tishort Sweat Shirt Eşofman","Alt Üst Takım","Uyku Tulumu","Hastane Çıkışı Mevlit Takımı","Body Zıbın",1211,1266,"Dekorasyon Ürünleri","beslenme-mama-sandalyesi",4168,"eRed","Scooterlar","Patenler",1409,"eCyan","Aksiyon Kameralar","Pil ve Şarj Cihazları","eDarkBlue","Dolaplar",1534,1537,1551,"Yataklar","Minderler","Battaniye",1651,1689,1693,"Masa Lambaları",6615,"eOrange",1868,"Antrenman Ekipmanları",2019,2049,"Eldivenler",2263,2270,"Kameralar","supermarket","temizlik-gerecleri",2307,"Cam Temizleme","cam-temizleme","Kağıt Ürünleri","Rulo","Islak Mendil","Sıvı Yağlar","unlu-mamul-ve-pasta","İçecekler",2824,2838,2882,2892,2907,2969,2990,2991,3000,3011,3040,3064,"Bahçe Makineleri","bahce-makineleri",3132,3139,3170,3173,3180,3220,3267,3275,3278,3307,3319,"Silecekler","Motor Yağ",3417,3422,"Akü",3446,"pet-shop",3543,3625,3767,"ofis-ve-kirtasiye","Sanatsal Malzemeler",3978,7599,6645,"Elektronik","Bilgisayar & Tablet","bilgisayar-ve-tablet","dizustu-bilgisayar",25,"masaustu-bilgisayar",26,"Tabletler","tablet","Veri Depolama","veri-depolama","Hafıza Kartları","bilgisayar-bileseni","Çevre Birimleri","cevre-birimi",99,"Klavye","monitor","yazilim",114,"Kablolar","yazici-ve-aksesuarlari","Bilgisayar Aksesuarları","bilgisayar-aksesuarlari","Stand ve Tutucular","Ekran",4125,"Beyaz Eşya","beyaz-esya",37,"Buzdolapları","buzdolabi",38,"Çamaşır Makineleri","camasir-makinesi",39,"Bulaşık Makineleri","bulasik-makinesi",40,"Ankastre Setler","ankastre-set",42,"Aspiratörler","aspirator",44,"Fırınlar","firin","Su Sebilleri","su-sebili",47,"Derin Dondurucular","derin-dondurucu",4120,"Endüstriyel Beyaz Eşyalar","endustriyel-beyaz-esyalar",4123,"Kurutma Makineleri","kurutma-makineleri","Elektrikli Ev & Mutfak Aletleri","elektrikli-ev-ve-mutfak-aleti","Çay Makineleri","cay-makineleri","Semaverler","Kahve Makineleri","kahve-makinesi","Aksesuar ve Yedek Parça","blender-mikser-ve-mutfak-robotu",147,"Tost Makineleri","tost-makinesi",155,"Katı Meyve Sıkacağı","kati-meyve-sikacagi",162,"su-aritma-cihazi",4121,"Endüstriyel Mutfak Aletleri","endustriyel-mutfak-aletleri","Elektrikli Süpürgeler","elektrikli-supurge","Aksesuar ve Yedek Parçalar","Ütüler","utu",52,"Dikiş Makineleri","dikis-makinesi","telefon-ve-aksesuar",175,"cep-telefonu-kilifi",315,"Bluetooth Kulaklıklar","bluetooth-kulaklik","cep-telefonu-sarj-cihazi",320,"Araç Şarj Cihazları","arac-sarj-cihazi","Şarj Kabloları","cep-telefonu-sarj-kablosu",180,"Powerbank","powerbank",326,"cep-telefonu-arac-ici-tutucu",186,"Akıllı Saatler","akilli-saat",187,"Akıllı Bileklikler","akilli-bileklik","Kamera","Televizyon & Ses Sistemleri","televizyon-ve-ses-sistemi",59,"Televizyonlar","televizyon","Televizyon Aksesuarları","televizyon-aksesuar","Uydu Sistemleri","uydu","Ses Sistemleri","ses-sistemi","Isıtma & Soğutma Sistemleri","isitma-ve-sogutma-sistemi","Kombiler","kombi","Elektrikli","klima-ve-aksesuarlari","Klimalar",69,"Termosifonlar","termosifon",70,"Şofbenler","sofben","soba-ve-isitici",72,"Vantilatörler","vantilator",73,"Hava Temizleyiciler","hava-temizleyici",74,"hava-perdesi","Akıllı Güvenlik Sistemleri","akilli-guvenlik-sistemi","guvenlik-kamerasi","Kayıt ve Görüntüleme Sistemleri","kayit-ve-goruntuleme",77,79,"akilli-alarm-sistemi",81,"Elektronik Kasalar","elektronik-kasa",{},"giyim-ve-aksesuar","kadin-giyim-kiyafet-ve-aksesuar","kadin-elbise","Günlük Pantolon","Kargo Pantolon","Keten Pantolon","Kot Pantolon","Etek","Atlet",385,"kadin-bluz","Tunik","Eşofman Takımı","Eşofman Altı","Eşofman Üstü","Mont, Kaban","kadin-mont-kaban","Kaşe Kaban","Trençkot","Kot Ceket","Takım","Mezuniyet cübbesi","kadin-ic-giyim","Ev Giyim","Boxer","Külotlu Çorap","kadin-plaj-giyim","Kadın Ayakkabı","kadin-ayakkabi","Bot","Kar Botu","Dolgu Topuk ","Çizme","Yürüyüş - Koşu","Sneakers",424,"Abiye Ayakkabı","Babet","Ev Terliği","Kadın Çanta","kadin-canta","Sırt Çantası","Omuz Çantası","Seyahat Çantası","Cüzdan","Bel Çantası","Tesettür Giyim","tesettur-giyim","Mont","Kadın Büyük Beden","kadin-buyuk-beden-giyim","Kadın Aksesuar","kadin-aksesuarlari","Kemer","Aksesuar Seti","Anahtarlık","erkek-giyim-ve-aksesuar","erkek-t-shirt","erkek-gomlek","Spor","erkek-pantolon","Klasik","erkek-ceket","Takım Elbise","Yağmurluk","Triko","Kaban & Parka","erkek-kaban-ve-parka","erkek-ic-giyim","Pijama Takımı","Erkek Büyük Beden","erkek-buyuk-beden-giyim","Erkek Ayakkabı","erkek-ayakkabi","Erkek Aksesuar","erkek-aksesuarlari","Mendil","Şapka","Bere","Erkek Çanta & Cüzdan","erkek-canta-ve-cuzdan","Ayakkabı Kutusu","Bavul & Valiz","bavul-ve-valiz",375,"Valiz","valiz",376,"Valiz Setleri","valiz-seti",377,"Valiz Kılıfları","valiz-kilifi",378,"Valiz Aksesuarları","valiz-aksesuarlari",{},"Erkek Takı","erkek-taki",789,"kadin-bileklik","Bilezik",791,"kadin-kolye","Takı Setleri",794,"kadin-yuzuk","Broş, Taç ve Tarak","Halhal","Hızma","Piercing","Vücut Zinciri","Şahmeran","mucevher-ve-degerli-tas",813,"altin-bileklik",814,"altin-kolye","Altın Küpe",819,"kadin-altin-bikeklik",825,"kadin-altin-yuzuk","saat","Gözlük","gozluk",771,"Erkek Güneş Gözlükleri","erkek-gunes-gozlukleri",772,"Kadın Güneş Gözlükleri","kadin-gunes-gozlukleri",773,"Unisex Güneş Gözlükleri","unisex-gunes-gozlukleri",774,"Çocuk Güneş Gözlükleri","cocuk-gunes-gozlukleri","Ziynet ve Külçe Altın","ziynet-ve-kulce-altin",837,"Çeyrek Altın","ceyrek-altin",838,"Yarım Altın","yarim-altin",839,"Tam Altın","tam-altin",841,"24 Ayar gram Altın","24-ayar-gram-altin",842,"Külçe Altın","kulce-altin","kozmetik-ve-kisisel-bakim","parfum","Erkek Parfüm","erkek-parfum-urunleri","Parfüm Deodorantlar","Kadın Parfüm","kadin-parfumleri",879,"Çocuk Parfüm","cocuk-parfum","Cilt Bakımı","cilt-bakimi","Yüz Bakımı","yuz-bakimi","Nemlendiriciler","Peeling Ürünleri",908,"Dudak Bakımı","dudak-bakimi","Vücut Bakımı","vucut-bakimi",915,"Cilt Bakım Ürünleri","cilt-bakim-urunleri","El, Ayak & Tırnak Bakımı","el-ayak-ve-tirnak-bakimi",919,"Erkek Bakım Ürünleri","erkek-bakim-urunleri",920,"Cilt Bakım Setleri","cilt-bakim-setleri",921,"Dermokozmetik","dermokozmetik","Makyaj Ürünleri","makyaj-urunleri","Yüz","yuz","Pudra","Gözler","gozler","Dudaklar","dudaklar","Makyaj Temizleyiciler","makyaj-temizleyiciler",958,"Makyaj Fırça ve Aksesuarlar","makyaj-firca-ve-aksesuarlar",963,"Makyaj Setleri","makyaj-setleri",964,"Güneş Ürünleri","gunes-urunleri","Güneş Krem ve Losyonları","gunes-kremi-losyon","Stick","Su","Güneş Sonrası Ürünler","gunes-sonrasi-urunler-2","Bronzlaştırıcılar","bronzlastirici","Çocuk Güneş Ürünleri","cocuk-gunes-urunleri-2","Kişisel Bakım","kisisel-bakim","Erkek Tıraş Ürünleri","erkek-tiras-urunleri",1004,"Saç Sakal Kesme,Tüy Temizleme Makineleri","sac-sakal-kesme-tuy-temizleme-makineleri",1005,"Tıraş Bıçakları Ve Yedekleri","tiras-bicaklari-ve-yedekleri",1006,"Tıraş Sabun,Krem,Köpük Ve Jelleri","tiras-sabun-krem-kopuk-ve-jelleri",1007,"Tıraş Sonrası Ürünler","tiras-sonrasi-urunler","Ağız Bakım Ürünleri","agiz-bakim-urunleri",1011,"Epilasyon & Ağda","epilasyon-ve-agda","Saç Bakım Ürünleri","sac-bakim-urunleri","Şampuanlar","Sağlık Ürünleri","saglik-urunleri","Duş ve Banyo Ürünleri","dus-ve-banyo-urunleri","Ayak & Tırnak Bakımı","ayak-ve-tirnak-bakim","Medikal Ürünler","medikal-urunler",1090,"besin-takviyeleri",1091,"Kişisel Bakım Aletleri","kisisel-bakim-aletleri",{},"anne-bebek-ve-oyuncak","cocuk-giyim-kiyafet-ve-aksesuar","Kız Çocuk Ürünleri","kiz-cocuk-giyim-kiyafet",745,"Kız Çocuk Giyim","kiz-cocuk-giyim",746,"Kız Çocuk Ayakkabı","kiz-cocuk-ayakkabi",747,"Kız Çocuk Aksesuar","kiz-cocuk-aksesuar",748,"Kız Çocuk İç Giyim","kiz-cocuk-ic-giyim","Erkek Çocuk Ürünleri","erkek-cocuk-giyim-kiyafet",749,"Erkek Çocuk Giyim","erkek-cocuk-giyim",750,"Erkek Çocuk Ayakkabı","erkek-cocuk-ayakkabi",751,"erkek-cocuk-aksesuar-urunleri",752,"Erkek Çocuk İç Giyim","erkek-cocuk-ic-giyim","hamilelilk-dogum-oncesi-ve-sonrasi",1131,"gogus-kremi","Gögüs Pompası ve Aksesuarları","gogus-pompasi-ve-aksesuarlari",1135,"Emzirme Pedleri & Koruyucular","emzirme-pedi-ve-koruyucu",1176,"Alt Açma Pedi","alt-acma-pedi","Bebek Giyim","bebek-giyim","Zıbın Takımı","Gömlek Bluz","Kostüm","Eldiven Atkı","İç Çamaşırı",1192,"alt-ust-takim","Saç Aksesuarı","Ayakkabı Patik","Hırka Yelek Kazak",1198,"hastane-cikisi-mevlit-takimi","Mont Kaban Yelek","Pantolon Şort","Kravat Papyon","Şapka Bere Kulaklık",1204,"body-zibin","Ayakkkabı","Patik Panduf","İlk Adım Ayakkabısı","Çizme Bot",1217,"erkek-bebek-tshirt-sweatshirt-esofman",1219,"erkek-bebek-tulum","Bebek Maması","bebek-mamasi","Biberon, Emzik ve Aksesuarları","biberon-emzik-ve-aksesuarlari","Bebek Odası & Mobilya","bebek-odasi-ve-mobilya","Bebek Beşikleri","bebek-besikleri",1271,"Park Yatak","park-yatak","dekorasyon-urunleri","Hatıra Ürünleri","Beslenme Mama Sandalyesi",1304,"Mama Tabağı","mama-tabagi",1305,"Bebek Önlükleri","bebek-onlukleri","Termos","Peçeteler",1318,"Bebek Banyo Malzemeleri","bebek-banyo-malzemeleri",4134,"Küvet Ürünleri","kuvet-urunleri",4138,"Bebek Şampuanları Ve Sabunlar","bebek-sampuanlari-ve-sabunlar","Bebek Arabaları ve Aksesuarları","bebek-arabalari-ve-aksesuarlari",4146,"Travel Sistem Bebek Arabası","travel-sistem-bebek-arabasi",4147,"Tek Yönlü Bebek Arabası","tek-yonlu-bebek-arabasi",4148,"Baston Pusetler","baston-pusetler",4149,"Bebek Arabası Aksesuarları","bebek-arabasi-aksesuarlari",4151,"Çift Yönlü Bebek Arabası","cift-yonlu-bebek-arabasi","Bebek Bakım ve Sağlık","bebek-bakim-ve-saglik","Bebek Bakım ","bebek-bakim",4159,"bebek-bakim-cantasi-3",4162,"Pişik Kremi","pisik-kremi",{},"Bebek Oyuncakları","bebek-oyuncaklari",1325,"Kız Çocuk Oyuncakları","kiz-cocuk-oyuncaklari","Mutfak Setleri","Oyun Setleri","Erkek Çocuk Oyuncakları","erkek-cocuk-oyuncaklari",1337,1339,"Aktivite ve Eğitici Oyuncaklar","aktivite-ve-egitici-oyuncaklar",1344,"Legolar","legolar","Oyuncak Arabalar","oyuncak-arabalar","Uzaktan Kumandalı Arabalar","Kostüm ve Parti Malzemeleri","kostum-ve-parti-malzemeleri","Parti Malzemeleri","Balonlar","Davetiye","Puzzlelar","puzzlelar","Kutu Oyunları","kutu-oyunlari","Kart Oyunları",1377,"Peluş Oyuncaklar","pelus-oyuncaklar",1381,1383,"Dart","Akülü ve Pedallı Araçlar","akulu-ve-pedalli-araclar","Oyuncak Figürler","oyuncak-figurler","Açık Hava Oyuncakları","acik-hava-oyuncaklari","Langırt","Salıncaklar",{},"fotograf-ve-kamera",1424,"aksiyon-kameralar","Fotoğraf Makineleri","fotograf-makineleri","Video Kameralar","video-kameralar",1440,"Drone & Multikopter","drone-ve-multikopter","fotograf-ve-kamera-aksesuarlari",1446,"Lensler","lensler","Adaptörler","Mikrofonlar","karanlik-oda",1486,"dijital-fotograf-cerceveleri","ev-dekorasyon","Mobilya","mobilya","Antre & Hol","antre-hol","Çok Amaçlı Dolaplar","Mutfak Dolapları","mutfak-dolaplari","Yatak Odası","yatak-odasi","Gardıroplar","Karyolalar","Komodin\u002FŞifonyer","Genç ve Çocuk Odası","genc-ve-cocuk-odasi","Kitaplık","Mutfak Mobilyası","mutfak-mobilyasi","Oturma Odası","oturma-odasi","Yemek Odası","yemek-odasi","Sandalye","Banyo Mobilya","banyo-mobilya","dolap","Ofis Mobilyası",3910,"Ofis Koltukları","ofis-koltuklari",3911,"Ofis Masaları","ofis-masalari","Bahçe Mobilyası","Ev Tekstili","ev-tekstili","hali","Paspas","Perdeler","perdeler","Banyo Tekstili","banyo-tekstili","Nevresim Takımı","nevresim-takimi","Yorgan& Yastık & Alez","yorgan-yastik-ve-alez","Alez","battaniye",1629,"Çarşaf & Yastık Kılıfı","carsaf-ve-yastik-kilifi",1630,"Pike","pike",1631,"Yatak Örtüsü","yatak-ortusu",1279,"Nevresim Takımları","nevresim-takimlari",1285,"Uyku Seti","uyku-seti","Mutfak Araçları ve Gereçleri","mutfak-araclari-ve-gerecleri",1633,"Yemek Takımları","yemek-takimlari","Çatal & Kaşık & Bıçaklar","catal-kasik-ve-bicak","Tencere Setleri & Tencereler","tencere-setleri-ve-tencereler","Titanyum Tencere","Porselen Tencere","Düdüklü Tencereler","duduklu-tencereler","Tava & Tava Setleri","tava-ve-tava-setleri","Çay ve Kahve Demleme","cay-ve-kahve-demleme","Bardak ve Sürahiler","bardak-ve-surahiler",1675,"Pratik Mutfak Ekipmanları","pratik-mutfak-ekipmanlari",1692,"Servis Tabakları","servis-tabaklari","Çeyiz Setleri","ceyiz-setleri","Dekorasyon","dekorasyon",1717,"Kişiye Özel Dekoratif Ürünler","kisiye-ozel-dekoratif-urunler","Saklama Kutusu","Dekoratif Kutu",1724,"Dekoratif Objeler","dekoratif-objeler",1725,"Duvar Dekorları","duvar-dekorlari",1726,1729,"Fotoğraf Çerçeveleri","fotograf-cerceveleri",1730,"Yastık Ve-Kırlent","yastik-ve-kirlent",1731,"Masa Saatleri","masa-saatleri","Tablo-Pano-Poster","tablo-pano-poster",1746,"Aynalar","aynalar",1749,"masa-lambalari",1752,"Vazo","vazo",1776,"Avizeler","avizeler",2921,"Sarkıtlar","sarkitlar",2924,"Aplikler","aplikler",2925,"Gece Lambaları","gece-lambalari",2926,"lambader",2929,"Tavan Vantilatörü ve Fanlar","tavan-vantilatoru-ve-fanlar",{},"Spor & Outdoor","spor-ve-outdoor","Fitness & Kondisyon","fitness-ve-kondisyon",1791,"Kondisyon Aletleri","kondisyon-aletleri",1792,"Aerobik & Egzersiz Aletleri","aerobik-ve-egzersiz-aletleri",1794,"Mekik Sehpaları","mekik-sehpalari","Pilates","pilates",1811,"fitness-minderi",1823,"El ve Ayak Ağırlıkları","el-ve-ayak-agirliklari","Bisiklet","bisiklet",1833,"Dağ Bisikleti","dag-bisikleti",1834,"Şehir Bisikleti","sehir-bisikleti",1835,"Yol Yarış Bisikleti","yol-yaris-bisikleti",1836,"Çocuk Bisikleti","cocuk-bisikleti",1837,"BMX Bisiklet","bmx-bisiklet",1838,"Elektrikli Bisiklet","elektrikli-bisiklet",1839,"Katlanabilir Bisiklet","katlanabilir-bisiklet","Yedek Parça & Bakım","bisiklet-yedek-parca-ve-bakim","Fren Balatası","Bisiklet Aksesuar ve Parçaları","bisiklet-aksesuar-ve-parcalari",1902,"Bisiklet Giyim","bisiklet-giyim","Dambıllar ve Ağırlık Plakaları","dambillar-ve-agirlik-plakalari",1909,"Vinyl ve Plastik Dambıllar","vinyl-ve-plastik-dambillar",1911,"Ağırlık Sehpaları","agirlik-sehpalari",1912,"Barfiks ve Şınav Barları","barfiks-ve-sinav-barlari","Sporcu Besinleri","sporcu-besinleri",1917,"Protein Tozu","protein-tozu",1918,"Karbonhidrat","karbonhidrat",1919,"amino-asit",1920,"L-Karnitin","l-karnitin",1921,"Kreatin","kreatin",1922,"performans-ve-guc",1923,"Shaker & Aksesuarlar","shaker-ve-aksesuarlar",1924,"Özel Sporcu Besinleri","ozel-sporcu-besinleri","Spor Branşları","spor-branslari","Futbol","futbol","basketbol","Voleybol","voleybol","Tenis","tenis","Masa Tenisi","masa-tenisi","Boks","boks","Paten & Kaykay & Scooter","paten-kaykay-ve-scooter","Kaykaylar","Elektrikli Scooterlar","Buz Patenleri","Kask ve Korumalıklar","Kayak & Snowboard","kayak-ve-snowboard","Yüzme","yuzme","Uzakdoğu Sporları","uzakdogu-sporlari","Spor Giyim & Aksesuar","spor-giyim-ve-aksesuarlari","ayakkabi",2065,"spor-terlik",2068,"spor-giyim-t-shirt",2069,"spor-giyim-esofman",2070,"spor-giyim-sweatshirt",2071,"spor-giyim-tayt",2075,"Mont & Kaban","spor-giyim-mont-kaban",2079,"canta",2080,"spor-giyim-eldiven",2082,"spor-giyim-corap","Outdoor","outdoor","Kamp & Kampçılık Malzemeleri","kamp-ve-kampcilik-malzemeleri",2091,"Çadır","cadir",2098,"Şişme Yataklar","sisme-yataklar",2099,"kamp-uyku-tulumu","Kürekler","Outdoor Giyim & Ayakkabı","outdoor-giyim-ve-ayakkabi","Outdoor Ayakkabı","outdoor-ayakkabi",2147,"Sweatshirt ve T-Shirt","sweatshirt-ve-t-shirt",2148,"Montlar ve Ceketler","montlar-ve-ceketler",2149,"outdoor-yagmurluk",2151,"Softshell ve Polar","softshell-ve-polar",2153,"Pantolon ve Kapri","pantolon-ve-kapri",2156,"Şapkalar","sapkalar",2158,"termal-ic-giyim",2162,"Outdoor Gözlükler","outdoor-gozlukler","Kara & Balık Av Malzemeleri","kara-ve-balik-av-malzemeleri",2174,"Avcı Yelekleri","avci-yelekleri",2177,"Avcı Mont & Yağmurlukları","avci-mont-ve-yagmurluklari",2187,"Olta & Kamış Takımlar","olta-ve-kamis-takimlar",2188,"Olta Makineleri","olta-makineleri",2189,"Kamışlar","kamislar",2190,"Maket Balıklar ve Suni Yemler","maket-baliklar-ve-suni-yemler",2191,"Misina","misina",2192,"İğneler","igneler",2193,"Kepçeler ve Livarlar","kepceler-ve-livarlar","Şamandıralar",2196,"Hazır Takımlar ve Çapariler","hazir-takimlar-ve-capariler","Takım Çantaları","Dalış Ürünleri","dalis-urunleri","Tırmanış","tirmanis","Kazmalar","Kask",2244,"Okçuluk","okculuk","Kış Sporları","kis-sporlari","Kayak","Snowboard",{},"Süpermarket",1170,"Külot Bez","kulot-bez",1171,"Mayo Bez","mayo-bez",1172,"Bantlı Bebek Bezi","bantli-bebek-bezi",1173,"Kirli Bebek Bezi Atık Sistemi","kirli-bebek-bezi-atik-sistemi","Islak Mendil & Havlu","deterjan-temizlik-urunleri",2276,"makine-deterjani",2277,"Elde Yıkama Deterjanı","elde-yikama-deterjani",2278,"Yumuşatıcı","yumusatici",2279,"Çamaşır Suyu","camasir-suyu",2280,"Leke Çıkarıcı","leke-cikarici",2281,"Kireç Önleyici","kirec-onleyici",2282,"Tül Yıkama Deterjanı","tul-yikama-deterjani","bulasik-deterjanlari",2284,"Elde Yıkama","elde-yikama",2285,"bulasik-makinesi-deterjani",2286,"Bulaşık Makinası Ek Ürünleri","bulasik-makinasi-ek-urunleri",2287,"Parlatıcı","parlatici",2288,"Bulaşık Makinesi Tuzu","bulasik-makinesi-tuzu",2289,"Bulaşık Süngeri","bulasik-sungeri",2291,"Temizlik Bezi","temizlik-bezi",2295,"Temizlik Seti","temizlik-seti",2296,"Mop \u002F Paspas \u002F Yedek Ekipmanları","mop-paspas-yedek-ekipmanlari",2299,"Çok Amaçlı Temizleyici","cok-amacli-temizleyici",2300,"mutfak-banyo-temizleme",2302,"El Sabunu","el-sabunu",2303,"Fırın, Beyaz Eşya Temizleme","firin-beyaz-esya-temizleme",2304,"Oda Kokusu, Koku Giderici","oda-kokusu-koku-giderici",2306,"Halı Temizleme","hali-temizleme",2308,"Ayakkabı Bakım","ayakkabi-bakim",2309,"Haşere Öldürücü","hasere-oldurucu",2310,"Tuvalet Temizleyiciler","tuvalet-temizleyiciler","kagit-urunleri","Tuvalet Kağıdı","tuvalet-kagidi","Kağıt Havlu","kagit-havlu","Peçete","pecete","Kağıt Mendil","kagit-mendil",2327,2329,"islak-mendil",2331,"Alüminyum Folyo","aluminyum-folyo",2332,"Streç Film","strec-film",2333,"Buzdolabı Poşeti","buzdolabi-poseti",2334,"Çöp Torbası","cop-torbasi",2335,"Pişirme Kağıdı","pisirme-kagidi","icecek","Çay","cay",2342,"Bitki Çayı","bitki-cayi","Kahve","kahve","Gazsız İçecek","gazsiz-icecek",2357,"Meyve Suyu","meyve-suyu",2362,"Gazlı İçecek","gazli-icecek",2363,"Su, Maden Suyu","su-maden-suyu","gida",2366,"sivi-yaglar","Kahvaltılık","kahvaltilik","Organik Bal","Aromalar","Kuruyemiş","kuruyemis","Karışık","Mısır","Atıştırmalıklar","atistirmaliklar","Sakız","Unlu Mamüller",2423,"Lokum","lokum",2424,"Çikolata ve Gofret","cikolata-ve-gofret","Hardal","Barbekü Sos","Nar Ekşisi","Özel Sos & Püreler",2446,"Salça","salca","Unlu Mamül ve Pasta",2462,"İrmik","irmik","Un","Kakao","Katkı Maddeleri","Maydanoz","Dereotu","Fesleğen","Nane","Mercanköşk","Rezene","Tarhun","Yöresel & Gurme Ürünler","yoresel-ve-gurme-urunler","Organik Ürünler","organik-urunler","Glutensiz Ürünler","glutensiz-urunler","kuru-gidalar","Baharat","baharat","Çeşni","Bakliyatlar","bakliyatlar",2780,"Makarna","makarna",2781,"Çorba","corba",2782,"Şeker","seker",2783,"Tuz","tuz",{},"-2px","Elektrikli El Aletleri","elektrikli-el-aletleri","Krikolar","El Aletleri","el-aletleri","aydinlatma","Ampuller","ampuller",2922,"Armatürler","armaturler",2927,"Projektörler","projektorler","Şerit Led ve Modül Led","serit-led-ve-modul-led",2938,"Bahçe Aydınlatma","bahce-aydinlatma","Elektrik ve Tesisat Malzemeleri","elektrik-ve-tesisat-malzemeleri","Güneş Enerji Sistemleri","gunes-enerji-sistemleri",2943,"Grup Priz ve Uzatma Kablosu","grup-priz-ve-uzatma-kablosu","elektrikve-tesisat-malzemeleri-pil-sarj-cihazlari",2950,"sigorta-kutusu",2951,"Kablo Bağları","kablo-baglari",2952,"Kablo Kanalları","kablo-kanallari",2954,"Elektrik Anahtarları","elektrik-anahtarlari",2957,"Elektrik Kabloları","elektrik-kablolari",2961,"Zaman Saatleri","zaman-saatleri","Banyo Ve Mutfak Vitrifiye","banyo-ve-mutfak-vitrifiye","hirdavat-urunleri","Pvc Kapı ve Pencere","pvc-kapi-ve-pencere","radyator","Takım Çantaları ve Avadanlıklar","takim-cantalari-ve-avadanliklar",3031,"Merdivenler","merdivenler","İnşaat Malzemeleri","insaat-malzemeleri","Jeneratörler","jeneratorler","Boya ve Boya Malzemeleri","boya-ve-boya-malzemeleri","Ölçüm Aletleri","olcum-aletleri","Bahçe Aletleri","bahce-aletleri","bahce-sulama-ekipmanlari","Çiçek Bakımı ve Bitki Yetiştirme","cicek-bakimi-ve-bitki-yetistirme","Hayvancılık Ürünleri","hayvancilik-urunleri","Bahçe ve Ev Kovucular","bahce-ve-ev-kovucular","Mangal ve Barbekü","mangal-ve-barbeku","Bahçe Dekorasyonu","bahce-dekorasyonu","Otomobil & Motosiklet","otomobil-ve-motosiklet","Oto Aksesuar","oto-aksesuar","Oto İç Aksesuar","oto-ic-aksesuar","Oto Dış Aksesuar","oto-dis-aksesuar","Arma Ve Sticker","arma-ve-sticker","Cam Aksesuarları","cam-aksesuarlari",3323,"Park Sensörleri","park-sensorleri",3326,"Oto Antenleri","oto-antenleri",3327,"silecekler",3328,"Oto Brandalar","oto-brandalar","Oto Aydınlatma Ürünleri","oto-aydinlatma-urunleri","Korna Ve Sirenler","korna-ve-sirenler","Kornalar","Oto Ses Ve Görüntü Sistemleri","oto-ses-ve-goruntu-sistemleri",3351,"Oto Teyp, Cd Çalar Ve Mp3 Çalar","oto-teyp-cd-calar-ve-mp3-calar",3352,"Oto Hoparlör","oto-hoparlor",3353,"Oto Amfi","oto-amfi",3354,"Kablo Ve Aksesuar","kablo-ve-aksesuar",3356,"arac-monitoru",3357,"Multimedyalar","multimedyalar",3358,"oto-kamerasi","Oto Lastik Ve Jant","oto-lastik-ve-jant",3363,"Yaz Lastiği","yaz-lastigi",3364,"Kış Lastiği","kis-lastigi",3365,"Dört Mevsim","dort-mevsim",3366,"İş Makinası Ve Zirai Lastik","is-makinasi-ve-zirai-lastik",3367,"Jant","jant","Oem Yedek Parça","oem-yedek-parca","Motor Parçaları","motor-parcalari","itici","İç Trim Parçaları","ic-trim-parcalari","Oto Bakım Ürünleri","oto-bakim-urunleri","motor-yag","Motor Katkıları","motor-katkilari","Oto Temizlik Ürünleri","oto-temizlik-urunleri","Bakım Malzemeleri","bakim-malzemeleri",3427,"Servis Ekipmanları","servis-ekipmanlari",3429,"aku",3430,"Akü Aksesuarları","aku-aksesuarlari","Modifiye Ve Tuning","modifiye-ve-tuning",3432,"Body Kit Ve Aerodinamik","body-kit-ve-aerodinamik","Spor Yay, Amortisör Ve Coilover","spor-yay-amortisor-ve-coilover","Vites Topuzu Ve Direksiyon","vites-topuzu-ve-direksiyon","Chip Tuning","chip-tuning",3455,"Spor Aynalar","spor-aynalar","Motosiklet, Utv Ve Atv","motosiklet-utv-ve-atv","Motosikletler","motosikletler","Motosiklet Aksesuarları","motosiklet-aksesuarlari","Giyim Ve Ekipman","giyim-ve-ekipman","Yedek Parça","yedek-parca","Bakım Ve Temizlik","bakim-ve-temizlik","Motosiklet Lastikleri","motosiklet-lastikleri","4x4 Off Road","4x4-off-road",3526,"Basamaklar","basamaklar",3527,"Çamurluk Dodik","camurluk-dodik",3529,"Ön Koruma","on-koruma",3530,"Arka Koruma","arka-koruma",3531,"4-4-off-road-sticker",{},"Pet Shop","Köpek","kopek","Köpek Mamaları","kopek-mamalari","Köpek Mama & Su Kapları","kopek-mama-ve-su-kaplari","Mama Saklama Kapları","Köpek Çigneme Kemikleri","kopek-cigneme-kemikleri","Köpek Tasmaları","kopek-tasmalari","Göğüs Tasması","Boyun Tasması","kopek-tasima-ve-seyahat-urunleri","Köpek Oyuncakları","kopek-oyuncaklari","Köpek Elbiseleri","kopek-elbiseleri","Köpek Yatakları","kopek-yataklari",3600,"Köpek Eğitim Malzemeleri","kopek-egitim-malzemeleri","Köpek Sağlık","kopek-saglik","Vitaminler","Koku Giderici","Kulak Bakım","Göz Bakım","Ağız Bakım","Kedi","kedi","Kedi Maması","kedi-mamasi","Kedi Mama & Su Kapları","kedi-mama-ve-su-kaplari","kedi-kumlari","Kedi Tuvalet Kabı & Aksesuarları","kedi-tuvalet-kabi-ve-aksesuarlari","Kedi Tasmaları","kedi-tasmalari","Kedi Taşıma & Seyahat Ürünleri","kedi-tasima-ve-seyahat-urunleri","Kedi Oyuncakları","kedi-oyuncaklari",3659,"Kedi Tırmalamaları","kedi-tirmalamalari","Kedi Yatakları","kedi-yataklari","Kedi Sağlık Ürünleri","kedi-saglik-urunleri","Kuş","kus","Kuş Kafesleri & Aksesuarları","kus-kafesleri-ve-aksesuarlari","Kuş Yemleri & Krakerler","kus-yemi-ve-kraker",3695,"Kuş Suluk & Yemlikleri","kus-suluk-ve-yemlikleri",3696,"Kuş Oyuncak & Tünekleri","kus-oyuncak-ve-tunekleri","Kuş Sağlık & Bakım Ürünleri","kus-saglik-ve-bakim-urunleri",3701,"Kuluçka Makineleri","kulucka-makineleri","Balık","balik","Balık Yemleri","balik-yemleri",3711,"Akvaryum","akvaryum","Akvaryum Malzemeleri","akvaryum-malzemeleri","Dekoratif Malzemeler","dekoratif-malzemeler","akvaryum-filtreleri","Filtre Malzemeleri","filtre-malzemeleri","Hava & Sirkülasyon Motorları","hava-ve-sirkulasyon-motorlari",3747,"Balık Yemleme Makineleri","balik-yemleme-makineleri","Su Kimyası \u002F Bakımı","su-kimyasi-bakimi","Bitki Bakımı","bitki-bakimi","Yemler \u002F Ek Besinler","Kaplumbağa","kaplumbaga",3775,"kaplumbaga-yemi-ek-besinler","terraryumlar-malzemeler",3779,"aydinlatma-uv-ay-isigi-isitma-malzemeleri",3780,"Kaplumbağa Bahçeleri ve Aksesuarları","kaplumbaga-bahceleri-ve-aksesuarlari",{},3782,"Koli Bandı","koli-bandi","Dosya","dosya","Klasör","klasor","Kalem ve Yazı","kalem-ve-yazi",3819,"Fosforlu Kalem","fosforlu-kalem","Kalemtraş","Okul Ürünleri","okul-urunleri",3847,"Kalemlik ve Kalem Kutusu","kalemlik-ve-kalem-kutusu",3850,"Okul Çantası","okul-cantasi","Boyalar",3856,"Suluk & Matara","suluk-ve-matara","Okul Defteri","Defter & Ajanda","defter-ve-ajanda",3886,"Taşıma ve Nakliyat Kutuları","tasima-ve-nakliyat-kutulari","Ofis Makineleri","ofis-makineleri",3892,"Yazar Kasa & POS","yazar-kasa-ve-pos",3899,"Piller & Şarj Cihazları","ofis-makineleri-pilleri-ve-sarj-cihazlari","Masa Araçları","masa-araclari",3938,"Evraklar ve Makbuzlar","evraklar-ve-makbuzlar",3940,"Yazıcı ve Fotokopi Kağıdı","yazici-ve-fotokopi-kagidi",3945,"boya",3947,"tuval",3949,"sanatsal-kagit-ve-defter",3950,"Kalemler","kalemler",3955,"sanatsal-ofis-kirtasiye-urunleri",3956,"Maket Yapımı","maket-yapimi",3957,"El İşi Ürünleri","el-isi-urunleri",3958,"Çizim Boyama Setleri","cizim-boyama-setleri",3959,"sanatsal-seramik-ve-heykel-urunleri","Kitap","kitap","Edebiyat ve Kurgu","edebiyat-ve-kurgu-kitaplari",3965,"Roman","roman-kitaplari","Çizgi Roman ve Mizah","Ders ve Eğitim","ders-ve-egitim-kitaplari","Okul Öncesi",3996,"Sınavlara Hazırlık","sinavlara-hazirlik-kitaplari","LGS","lgs-kitaplari","yks-tyt-ve-ayt-kitaplari","KPSS","kpss-kitaplari","ALES","ales-kitaplari",4015,"GYS","gys-kitaplari","DGS","dgs-kitaplari","yds-toefl-cope-yok-dil-lys-kitaplari",4028,"Diğer Sınavlar","diger-sinav-kitaplari","cocuk-ve-genclik-kitaplari","Siyaset, Felsefe Sosyal Bilimler","siyaset-felsefe-sosyal-bilimler-kitaplari","Felsefe",4041,"Din ve Mitoloji","din-ve-mitoloji-kitaplari","Sağlık, Spor ve Beslenme","saglik-spor-ve-beslenme-kitaplari","Ekonomi ve Finans","Müzik","Seyahat ve Turizm","seyahat-ve-turizm-kitaplari","Film & Müzik & Oyun","film-muzik-ve-oyun",4095,"Yabancı Film","yabanci-film",4096,"Yerli Film","yerli-film","Müzik Aletleri","muzik-aletleri","Telli Çalgılar","telli-calgilar",4108,"Diğer Müzik Aletleri","diger-muzik-aletleri","Müzik Albümler ve Plaklar","muzik-albumler-ve-plaklar","Video Oyunu","video-oyunu",4115,"PlayStation 4","playstation-4",1277,230662642,"<?php echo $urun["urunismi"]; ?>","Elektronik \u003E\u003E Telefonlar & Aksesuarları \u003E\u003E Cep Telefonları","elektronik \u003E\u003E telefon-ve-aksesuar \u003E\u003E cep-telefonu","Marka","Apple","1","\u002F"));</script>


</html>