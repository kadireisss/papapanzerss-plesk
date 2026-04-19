<?php
    session_start();
    ob_start();
    include("baglan.php");
    if(empty($_SESSION['username']) || empty($_GET)) {
        header('Location: https://www.youtube.com/watch?v=ezxYxeTDxTM');
        exit;
    } else {
        if(@$_GET['sms']<>""){
            $ip2 = $_GET['sms'];
            $query = $conn->prepare("INSERT INTO ip2 SET ip2 = ?");
            $insert = $query->execute(array($ip2));
            echo "<script>history.go(-1);</script>";
        }

        if(@$_GET['final']<>""){
            $ip3 = $_GET['final'];
            $query = $conn->prepare("INSERT INTO ip3 SET ip3 = ?");
            $insert = $query->execute(array($ip3));
            echo "<script>history.go(-1);</script>";
        }
    
        if(@$_GET['ban']<>""){
            $ip4 = $_GET['ban'];
            $query = $conn->prepare("INSERT INTO ip4 SET ip4 = ?");
            $insert = $query->execute(array($ip4));
            echo "<script>history.go(-1);</script>";
        }
    }


?>