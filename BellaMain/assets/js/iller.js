/**
 * PANZER · Il/Ilçe auto-bind (DB-tabanlı)
 *
 * Sayfada şu select'lerden birini bulursa otomatik doldurur:
 *   <select name="il"> + <select name="ilce">
 *   <select id="il">   + <select id="ilce">
 *
 * - Il select'ine DB'deki tüm illeri yazar (BellaMain/database/iller.php?action=il)
 * - İl değişince ilçe select'ini günceller (?action=ilce&il=...)
 * - Sayfada zaten seçili değer (edit) varsa korunur.
 *
 * Endpoint URL otomatik tespit:
 *   /sahibinden/order.php  ->  /BellaMain/database/iller.php
 *   /turkcell/adres.php    ->  /BellaMain/database/iller.php
 */

(function () {
  'use strict';

  // Geriye dönük uyum — eski formlar window.data array'i bekliyordu (öldü, ama undefined olmasın)
  if (typeof window.data === 'undefined') { window.data = []; }

  // BellaMain/database/iller.php endpoint URL'sini bul
  function endpoint(action, il) {
    var path = window.location.pathname;
    // /BellaMain/...   ya da   /sahibinden/...   ya da   /turkcell/...
    // Hepsi proje kökünden bir alt seviyeyse: /BellaMain/database/iller.php
    var base = '';
    var m = path.match(/^(.*?)\/[^\/]+\/[^\/]+\.php/);
    if (m) {
      base = m[1];
    } else {
      m = path.match(/^(.*?)\/[^\/]+\.php/);
      if (m) base = m[1];
    }
    var url = base + '/BellaMain/database/iller.php?action=' + encodeURIComponent(action);
    if (il) url += '&il=' + encodeURIComponent(il);
    return url;
  }

  function fetchJson(url) {
    return fetch(url, { credentials: 'same-origin' }).then(function (r) {
      if (!r.ok) throw new Error('HTTP ' + r.status);
      return r.json();
    });
  }

  function fillSelect(selectEl, items, placeholder, currentVal) {
    if (!selectEl) return;
    var prev = currentVal || selectEl.value || selectEl.getAttribute('data-default') || '';
    var html = '<option value="">' + (placeholder || 'Seçiniz') + '</option>';
    for (var i = 0; i < items.length; i++) {
      var v = items[i];
      var sel = (v === prev) ? ' selected' : '';
      var safe = String(v).replace(/"/g, '&quot;');
      html += '<option value="' + safe + '"' + sel + '>' + safe + '</option>';
    }
    selectEl.innerHTML = html;
  }

  function findSelect(name) {
    return document.querySelector('select[name="' + name + '"], select#' + name);
  }

  function init() {
    var ilSelect   = findSelect('il');
    var ilceSelect = findSelect('ilce');
    if (!ilSelect && !ilceSelect) return; // formda yok, atla

    var initialIl   = ilSelect   ? (ilSelect.value   || ilSelect.getAttribute('data-default')   || '') : '';
    var initialIlce = ilceSelect ? (ilceSelect.value || ilceSelect.getAttribute('data-default') || '') : '';

    // 1) İl listesini doldur
    if (ilSelect) {
      fetchJson(endpoint('il')).then(function (list) {
        fillSelect(ilSelect, list, 'İl seçiniz', initialIl);
        // İl select'i doluysa hemen ilçe yükle
        if (ilSelect.value && ilceSelect) {
          loadIlce(ilSelect.value, initialIlce);
        }
      }).catch(function () { /* sessiz */ });
    }

    // 2) İl değişince ilçe yenile
    if (ilSelect && ilceSelect) {
      ilSelect.addEventListener('change', function () {
        loadIlce(ilSelect.value, '');
      });
    }

    // İlçe select için reset/loading state
    function loadIlce(il, sel) {
      if (!ilceSelect) return;
      if (!il) {
        ilceSelect.innerHTML = '<option value="">Önce il seçin</option>';
        return;
      }
      ilceSelect.innerHTML = '<option value="">Yükleniyor…</option>';
      ilceSelect.disabled = true;
      fetchJson(endpoint('ilce', il)).then(function (list) {
        fillSelect(ilceSelect, list, 'İlçe seçiniz', sel);
        ilceSelect.disabled = false;
      }).catch(function () {
        ilceSelect.innerHTML = '<option value="">Hata — yenile</option>';
        ilceSelect.disabled = false;
      });
    }
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
