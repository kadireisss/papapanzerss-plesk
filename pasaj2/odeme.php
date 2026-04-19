<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<script>
    var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);

    // İstenen id'yi al
    var id = getParameterByName('id');

    if (isMobile) {
        window.location.href = "odememobil.php?id=" + id;
    } else {
        window.location.href = "odemepc.php?id=" + id;
    }

    // URL'den parametre almak için yardımcı fonksiyon
    function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, '\\$&');
        var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, ' '));
    }

    // Dosyayı yüklemek için yardımcı fonksiyon
    function loadFile(fileUrl) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.body.innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", fileUrl, true);
        xhttp.send();
    }
</script>

</body>
</html>
