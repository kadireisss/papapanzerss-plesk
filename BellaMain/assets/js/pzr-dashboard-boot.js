/**
 * PANZER dashboard kabugu — tek kaynak: overlay temizligi, mobil drawer, kullanici menusu.
 * Bootstrap + Swal yuklendikten HEMEN sonra baglanir.
 */
(function () {
  'use strict';

  function pzrModalLayerOpen() {
    try {
      return Array.prototype.some.call(document.querySelectorAll('.modal.show'), function (el) {
        if (!el || !el.isConnected) return false;
        var r = el.getBoundingClientRect();
        return r.width > 0 && r.height > 0;
      });
    } catch (e0) {
      return !!document.querySelector('.modal.show');
    }
  }

  function pzrSwalOpen() {
    try {
      return typeof Swal !== 'undefined' && typeof Swal.isVisible === 'function' && Swal.isVisible();
    } catch (e) {
      return false;
    }
  }

  /** Gercek modal acik degilse: backdrop / body kilidi / olusu Swal kalintisi temizle */
  function pzrForceStaleOverlayCleanup() {
    try {
      if (pzrModalLayerOpen()) return;

      document.querySelectorAll('.modal-backdrop').forEach(function (el) {
        el.remove();
      });
      document.body.classList.remove('modal-open');
      document.body.style.removeProperty('overflow');
      document.body.style.removeProperty('padding-right');
      document.documentElement.style.removeProperty('overflow');

      if (!pzrSwalOpen()) {
        document.body.classList.remove('swal2-shown', 'swal2-height-auto');
        document.querySelectorAll('.swal2-container').forEach(function (el) {
          el.remove();
        });
      }
    } catch (e2) {}
  }

  function pzrUnblockPointerOverlays() {
    pzrForceStaleOverlayCleanup();
  }

  window.pzrUnblockPointerOverlays = pzrUnblockPointerOverlays;
  window.pzrForceStaleOverlayCleanup = pzrForceStaleOverlayCleanup;

  pzrUnblockPointerOverlays();
  document.addEventListener('DOMContentLoaded', pzrUnblockPointerOverlays);
  window.addEventListener('load', pzrUnblockPointerOverlays);
  [200, 500, 1200, 2500, 5000, 9000].forEach(function (ms) {
    setTimeout(pzrUnblockPointerOverlays, ms);
  });

  /* Sayfa acilisinda 15 sn: takili tam ekran katmanlari periyodik sok */
  var sweepUntil = Date.now() + 15000;
  var sweepId = setInterval(function () {
    if (Date.now() > sweepUntil) {
      clearInterval(sweepId);
      return;
    }
    if (pzrModalLayerOpen() || pzrSwalOpen()) return;
    pzrForceStaleOverlayCleanup();
  }, 180);

  /* ====== Mobil sidebar ====== */
  (function () {
    var body = document.body;
    var btn = document.getElementById('pzrMenuBtn');
    var sidebar = document.getElementById('pzrSidebar');
    function close() {
      body.classList.remove('is-sidebar-open');
    }
    function isMobile() {
      return window.innerWidth <= 991;
    }
    if (btn) {
      btn.addEventListener('click', function (e) {
        if (!isMobile()) return;
        e.stopPropagation();
        body.classList.toggle('is-sidebar-open');
      });
    }
    document.addEventListener(
      'click',
      function (e) {
        if (!isMobile() || !body.classList.contains('is-sidebar-open')) return;
        if (!sidebar) return;
        if (sidebar.contains(e.target)) return;
        if (btn && (e.target === btn || btn.contains(e.target))) return;
        close();
      },
      true
    );
    document.querySelectorAll('#pzrSidebar .pzr-mkt').forEach(function (el) {
      el.addEventListener('click', function () {
        if (window.innerWidth <= 991) close();
      });
    });
    window.addEventListener('resize', function () {
      if (!isMobile()) close();
    });
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') close();
    });
  })();

  /* ====== Kullanici acilir menusu ====== */
  (function () {
    var t = document.getElementById('pzrUserToggle');
    var d = document.getElementById('pzrUserDropdown');
    if (!t || !d) return;
    t.addEventListener('click', function (e) {
      e.stopPropagation();
      d.classList.toggle('is-open');
    });
    document.addEventListener('click', function (e) {
      if (!d.contains(e.target) && e.target !== t) d.classList.remove('is-open');
    });
  })();

  /* ====== Bekleyen cekim uyarisi (HTML onclick) ====== */
  window.beklemedeUyari = function () {
    if (typeof Swal === 'undefined') return;
    Swal.fire({
      html:
        '<strong>Zaten beklemede olan islemin var.<br>Lutfen islem tamamlanincaya kadar bekle.</strong>',
      icon: 'warning',
      buttonsStyling: false,
      confirmButtonText: 'Anladim',
      customClass: { confirmButton: 'btn btn-primary' },
    });
  };

  /* Swal yuklendikten hemen sonra bir tur daha */
  setTimeout(pzrUnblockPointerOverlays, 80);
})();
