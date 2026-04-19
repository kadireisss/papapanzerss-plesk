/**
 * PANZER dashboard kabugu — overlay temizligi, mobil drawer, kullanici menusu.
 * Bootstrap + Swal yuklendikten HEMEN sonra baglanir.
 */
(function () {
  'use strict';

  /** Bootstrap acik modal: DOM'da .show ama aria-hidden=true genelde takili kalintidir */
  function pzrStripGhostModalShow() {
    try {
      document.querySelectorAll('.modal.show[aria-hidden="true"]').forEach(function (m) {
        m.classList.remove('show');
        m.style.removeProperty('display');
        m.setAttribute('aria-hidden', 'true');
      });
    } catch (e0) {}
  }

  function pzrModalLayerOpen() {
    try {
      pzrStripGhostModalShow();
      var list = document.querySelectorAll('.modal.show');
      for (var i = 0; i < list.length; i++) {
        var el = list[i];
        if (el.getAttribute('aria-hidden') === 'true') continue;
        try {
          if (typeof bootstrap !== 'undefined' && bootstrap.Modal && bootstrap.Modal.getInstance) {
            var inst = bootstrap.Modal.getInstance(el);
            if (inst && typeof inst._isShown === 'boolean' && inst._isShown === false) continue;
          }
        } catch (e1) {}
        var r = el.getBoundingClientRect();
        if (r.width > 8 && r.height > 8) return true;
      }
    } catch (e2) {}
    return false;
  }

  function pzrSwalOpen() {
    try {
      return typeof Swal !== 'undefined' && typeof Swal.isVisible === 'function' && Swal.isVisible();
    } catch (e) {
      return false;
    }
  }

  /** Gercek modal / Swal acik degilse: backdrop, body kilidi, olusu Swal kalintisi temizle */
  function pzrForceStaleOverlayCleanup() {
    try {
      pzrStripGhostModalShow();

      if (pzrModalLayerOpen() || pzrSwalOpen()) return;

      document.querySelectorAll('.modal-backdrop').forEach(function (el) {
        el.remove();
      });
      document.body.classList.remove('modal-open');
      document.body.style.removeProperty('overflow');
      document.body.style.removeProperty('padding-right');
      document.documentElement.style.removeProperty('overflow');

      document.querySelectorAll('.modal.show').forEach(function (m) {
        if (typeof bootstrap !== 'undefined' && bootstrap.Modal && bootstrap.Modal.getInstance) {
          if (bootstrap.Modal.getInstance(m)) return;
        }
        m.classList.remove('show');
        m.setAttribute('aria-hidden', 'true');
      });

      document.body.classList.remove('swal2-shown', 'swal2-height-auto');
      document.querySelectorAll('.swal2-container').forEach(function (el) {
        el.remove();
      });
    } catch (e3) {}
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

  /* Takili tam ekran katman: modal/Swal yokken periyodik sok (hafif) */
  setInterval(function () {
    if (pzrModalLayerOpen() || pzrSwalOpen()) return;
    pzrForceStaleOverlayCleanup();
  }, 4000);

  /* Ilk dokunusta backdrop / olu Swal konteyneri — tiklamayi yutan katman */
  document.addEventListener(
    'pointerdown',
    function (e) {
      var t = e.target;
      if (!t || !t.classList) return;
      if (pzrModalLayerOpen() || pzrSwalOpen()) return;
      if (t.classList.contains('modal-backdrop')) {
        pzrForceStaleOverlayCleanup();
        return;
      }
      if (t.classList.contains('swal2-container') || (t.closest && t.closest('.swal2-container'))) {
        if (!pzrSwalOpen()) pzrForceStaleOverlayCleanup();
      }
    },
    true
  );

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

  setTimeout(pzrUnblockPointerOverlays, 80);
})();
