<?php
include('database/connect.php');

$sorgu = $db->prepare("SELECT * FROM panel");
$sorgu->execute();
$sonuclar = $sorgu->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($sonuclar);
?>
