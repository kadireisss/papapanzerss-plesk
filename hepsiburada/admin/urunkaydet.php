<?php
 
require_once ('baglan.php');
 
if (isset($_POST['Submit'])) {
 
    move_uploaded_file($_FILES["urunresim"]["tmp_name"],"resimler/" . $_FILES["urunresim"]["name"]);

    $urunresim=$_FILES["urunresim"]["name"];
    
    $urunlink=$_POST['urunlink'];
    $urunkategori=$_POST['urunkategori'];
    $urunadi=$_POST['urunadi'];
    $urunfiyat=$_POST['urunfiyat'];
    
    






$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO hb_urun (`urunlink`, `urunkategori`, `urunadi`, `urunfiyat`, `urunresim`)

VALUES ('$urunlink','$urunkategori','$urunadi','$urunfiyat','$urunresim')";
 
$conn->exec($sql);
echo "<script>alert('  Ürün Başarıyla Oluşturuldu!!!');</script>";
header("location:urunler.php");
}
?>