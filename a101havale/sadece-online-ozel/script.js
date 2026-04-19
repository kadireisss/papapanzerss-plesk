document.getElementById("getIP").addEventListener("click", function() {
    // IP adresini almak için bir GET isteği yapın
    fetch("get_ip.php")
        .then(response => response.text())
        .then(data => {
            // Alınan IP adresini gizli bir input alanına yerleştirin
            document.getElementById("ipAddress").value = data;
            alert("IP adresiniz: " + data);
        })
        .catch(error => {
            console.error("IP adresi alınamadı: " + error);
        });
});
