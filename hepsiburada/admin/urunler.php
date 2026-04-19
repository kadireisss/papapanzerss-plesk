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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

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
        
    
    
    
    
<div class="container table-responsive py-5"> 
<table class="table table-bordered table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Ürün Resim</th>
      <th scope="col">Ürün Adı</th>
      <th scope="col">Ürün Fiyat</th>
      <th scope="col">İşlemler</th>
    </tr>
  </thead>
  <tbody>
   
   
  <?php 

include("baglan.php");

$uzlasma = $conn->query("SELECT * FROM hb_urun ");
foreach ($uzlasma as $deicto) 
 {

    $id = $deicto['id'];
    $urunadi = $deicto['urunadi'];
    $urunfiyat = $deicto['urunfiyat'];
    $urunresim = $deicto['urunresim'];
    $urunlink = $deicto['urunlink'];


   

      

  
 echo " <tr>
 
 <td>$id</td>
 <td><img src='resimler/$urunresim' width='100'></td>
 <td>$urunadi</td>
 <td>$urunfiyat</td>

<td>
<a href='../hb_goster.php?urunlink=$urunlink'><button  class='btn btn-primary'>Link</button></a>
<a href='sil.php?id=$id'><button  class='btn btn-primary'>Sil</button></a>

</td> 

</tr>  </tbody>";


    
  

}
    ?>
   
   
 
</table>
</div>

    
    
    
    </div>
        <div class="mt-8">

          
             <div class="mt-4 text-gray-500 text-sm">
                 By Developer <a href="https://t.me/deicto/" class="underline" target="_blank" rel="noopener noreferrer">@deicto</a>
            </div>
        </div>
    </div>
</body>

</html>