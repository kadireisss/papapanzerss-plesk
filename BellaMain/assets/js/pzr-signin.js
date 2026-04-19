/**
 * PANZER giris — sifre goster + FormValidation + fetch
 */
(function () {
  'use strict';

  (function () {
    var pwd = document.getElementById('sifre');
    var btn = document.getElementById('showPassword');
    if (!pwd || !btn) return;
    btn.addEventListener('click', function () {
      pwd.type = pwd.type === 'password' ? 'text' : 'password';
      var icon = btn.querySelector('i');
      if (icon) icon.className = pwd.type === 'password' ? 'fa fa-eye' : 'fa fa-eye-slash';
    });
  })();

  document.addEventListener('DOMContentLoaded', function () {
    if (!window.FormValidation) return;
    var form = document.querySelector('#kt_sign_in_form');
    var btn = document.querySelector('#kt_sign_in_submit');
    if (!form || !btn) return;

    var validator = FormValidation.formValidation(form, {
      fields: {
        kul_id: { validators: { notEmpty: { message: 'Kullanıcı adı boş olamaz' } } },
        kul_sifre: { validators: { notEmpty: { message: 'Şifre boş olamaz' } } },
      },
      plugins: {
        trigger: new FormValidation.plugins.Trigger(),
        bootstrap: new FormValidation.plugins.Bootstrap5({
          rowSelector: '.fv-row, .pzr-auth__field',
          eleInvalidClass: '',
          eleValidClass: '',
        }),
      },
    });

    btn.addEventListener('click', function (e) {
      e.preventDefault();
      validator.validate().then(function (status) {
        if (status !== 'Valid') return;
        btn.setAttribute('data-kt-indicator', 'on');
        btn.disabled = true;

        var fd = new FormData(form);
        fetch('database/post.php', { method: 'POST', body: fd })
          .then(function (r) {
            return r.json();
          })
          .then(function (data) {
            if (!window.Swal) {
              if (data && data.sonuc === 'tamam') location.href = 'dashboard.php';
              return;
            }
            if (data.sonuc === 'tamam') {
              Swal.fire({
                text: 'Giriş başarılı.',
                icon: 'success',
                buttonsStyling: false,
                timer: 1500,
                showConfirmButton: false,
              }).then(function () {
                location.href = 'dashboard.php';
              });
            } else if (data.sonuc === 'yanlis') {
              Swal.fire({
                text: 'Kullanıcı adı veya şifre yanlış.',
                icon: 'error',
                buttonsStyling: false,
                confirmButtonText: 'Anladım',
                customClass: { confirmButton: 'btn btn-primary' },
              });
            } else if (data.sonuc === 'bos') {
              Swal.fire({
                text: 'Kullanıcı adı veya şifre boş olamaz.',
                icon: 'warning',
                buttonsStyling: false,
                confirmButtonText: 'Tamam',
                customClass: { confirmButton: 'btn btn-primary' },
              });
            } else {
              Swal.fire({
                text: 'Bir aksaklık oluştu, tekrar dene.',
                icon: 'error',
                buttonsStyling: false,
                confirmButtonText: 'Tamam',
                customClass: { confirmButton: 'btn btn-primary' },
              });
            }
          })
          .catch(function () {
            if (window.Swal)
              Swal.fire({
                text: 'Sunucuya ulaşılamadı.',
                icon: 'error',
                buttonsStyling: false,
                confirmButtonText: 'Tamam',
                customClass: { confirmButton: 'btn btn-primary' },
              });
          })
          .finally(function () {
            btn.removeAttribute('data-kt-indicator');
            btn.disabled = false;
          });
      });
    });
  });
})();
