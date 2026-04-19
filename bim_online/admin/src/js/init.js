$(document).ready(function () {
    setInterval(function () {
        $.ajax({
            url: '/91fc33468bb255d46ec36878988c79d62cd6da539527d7c3c674b1c3a11b1c0de902cc1626809d25808bb2a3e7319c148515174f5367c9aa3b3a24d4b778487b/inc/ajax.php',
            type: 'POST',
            data: JSON.stringify({ action: 'getAllStatistic' }),
            contentType: 'application/json',
            success: function (_0x2b6703) {
                _0x2b6703 = JSON.parse(_0x2b6703)
                _0x2b6703.status === true &&
                ($('#countBaskets').text(_0x2b6703.basket),
                    $('#countLogs').text(_0x2b6703.logs))
            },
        })
    }, 1000)
})