<?php
session_start();

// Session kontrolü - eğer giriş yapılmamışsa index.php'ye yönlendir
if (!empty($_SESSION['giris'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>D E İ C T O -  Hepsiburada Paneli</title>
  <link rel="shortcut icon" href="logo2.jpg" type="image/jpg">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');

body {
  background-color: rgba(20, 20, 25, 1);
  font-family: 'poppins',sans-serif;
}

header {
            background: url('logom2.gif') repeat-x top center; /* Gifli arka plan */
            color: #fff; /* Yazı rengi */
            padding: 6px; /* Kenar boşluğu */
            border-bottom: 2px solid #fff; /* Alt kenar çizgisi */
            text-align: center;
            text-align: center;font-style: italic; font-weight: 700; background-color: #31285C; color: #fff; text-shadow: 0px 3px 2px #000000;
        }

    </style>
<body>

 
  
<header>
        <h1>D E İ C T O</h1>
        <!-- İsterseniz başlığı ve içeriği buraya ekleyebilirsiniz -->
    </header>
    

    <div class="bg-gray-900 h-screen flex flex-col items-center justify-center text-center">
        <div class="text-white">
            <h1 class="text-4xl font-bold">Dekont Oluştur</h1>
            <p class="mt-4 text-lg">Telegram : @deicto</p>
        </div>
        <div class="mt-8">

            <form action="fatura.php" method="POST" enctype="multipart/form-data" class="flex flex-col items-center">
               
            <input type="text" name="ad" placeholder="Ad Giriniz" class="py-2 px-4 bg-gray-800 text-white rounded-md focus:outline-none mb-4" required />
           
            <input type="text" name="soyad" placeholder="Soyad Giriniz" class="py-2 px-4 bg-gray-800 text-white rounded-md focus:outline-none mb-4" required />
         
            <input type="text" name="iban" placeholder="İban Giriniz" class="py-2 px-4 bg-gray-800 text-white rounded-md focus:outline-none mb-4" required />
        
           
            <input type="text" name="kesinti" placeholder="Kazaç tutarı:" class="py-2 px-4 bg-gray-800 text-white rounded-md focus:outline-none mb-4" required />
        
            <input type="text" name="yonetici" placeholder="Firma Sahibi" class="py-2 px-4 bg-gray-800 text-white rounded-md focus:outline-none mb-4" required />
          
            <input type="text" name="bankaadi" placeholder=" Banka Adı Giriniz" class="py-2 px-4 bg-gray-800 text-white rounded-md focus:outline-none mb-4" required />
            

            <select name="banka"  class="py-2 px-4 bg-gray-800 text-white rounded-md focus:outline-none mb-4">

            <option selected>Banka Seçiniz</option>
                        <option value="akbank">Akbank</option>
                        <option value="denizbank">Denizbank</option>
                        <option value="enpara">Enpara</option>
                        <option value="fastpay">FastPay</option>
                        <option value="fiba">Fibabanka</option>
                        <option value="finans">QNB Finansbank</option>
                        <option value="garanti">Garanti BBVA</option>
                        <option value="halk">Halk Bankası</option>
                        <option value="ing">İng Bank</option>
                        <option value="ininal">İninal</option>
                        <option value="isbank">İş Bankası</option>
                        <option value="kuveyt">Kuveyt Türk</option>
                        <option value="papara">Papara</option>
                        <option value="paycell">Paycell</option>
                        <option value="pep">PeP</option>
                        <option value="seker">Şekerbank</option>
                        <option value="teb">TEB</option>
                        <option value="vakif">Vakıfbank</option>
                        <option value="western">Western Union</option>
                        <option value="yapikredi">YapıKredi</option>
                        <option value="ziraat">Ziraat Bankası</option>

    </select>


    <input type="text" name="islemid" placeholder="İşlem Numarası " class="py-2 px-4 bg-gray-800 text-white rounded-md focus:outline-none mb-4" required />

    <input type="text" name="aciklama" placeholder=" Açıklama " class="py-2 px-4 bg-gray-800 text-white rounded-md focus:outline-none mb-4" required />

            <button type="submit" class="bg-blue-500 py-2 px-4 text-white rounded-md hover:bg-blue-600 focus:outline-none">Fatura Oluştur</button>
           
        </form>
             <div class="mt-4 text-gray-500 text-sm">
                 By Developer <a href="https://t.me/deicto/" class="underline" target="_blank" rel="noopener noreferrer">@deicto</a>
            </div>
        </div>
    </div>
</body>

</html>