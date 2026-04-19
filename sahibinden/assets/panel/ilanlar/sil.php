<?php
include('../../../settings/router.php');
session_start();
if (empty($_SESSION['username'])) {
    header("location: https://www.youtube.com/watch?v=ezxYxeTDxTM");
}

$q = $_GET['list'];

if($q){
    if (!empty($_SESSION['username'])) {
        $db = new PDO($dsn, $user, $password);
        $query = $db->prepare("DELETE FROM ilan_telefon WHERE id = :id");
        $delete = $query->execute(array(
            'id' => $_GET['id']
         ));
    
        if ($delete) {
            header("Location:../index.php?page=ilanlar&action=list");
        }
    }
}else {
    if (!empty($_SESSION['username'])) {
        $db = new PDO($dsn, $user, $password);
        $query = $db->prepare("DELETE FROM info WHERE id = :id");
        $delete = $query->execute(array(
            'id' => $_GET['id']
         ));
    
        if ($delete) {
            header("Location:../index.php?page=ilanlar&action=log");
        }
    }
}




?>