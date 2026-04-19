$(document).ready(function () {
  const _0x2edbc5 = $('#login-form'),
    _0xa9b6fb = $('#username'),
    _0x1455fe = $('#password')
  _0x2edbc5.submit(function (_0x48f040) {
    _0x48f040.preventDefault()
    if (_0xa9b6fb.val() === '' || _0x1455fe.val() === '') {
      return toastr.error('Lutfen kullanici adinizi ve parolanizi giriniz'), false
    } else {
      if (_0xa9b6fb.val().length < 3 || _0x1455fe.val().length < 3) {
        return (
          toastr.error(
            'Kullanici adi ve sifre en az 3 karakter uzunlugunda olmalidir.'
          ),
          false
        )
      }
    }
    $.ajax({
      url: 'inc/login.php',
      type: 'POST',
      data: JSON.stringify({
        username: _0xa9b6fb.val(),
        password: _0x1455fe.val(),
        action: 'login',
      }),
      contentType: 'application/json',
      success: function (_0x150cb8) {
        ;(_0x150cb8 = JSON.parse(_0x150cb8)),
          _0x150cb8.status === true
            ? (toastr.success(_0x150cb8.message),
              setTimeout(function () {
                window.location.href = 'dashboard.php'
              }, 2500))
            : toastr.error(_0x150cb8.message)
      },
    })
  })
})