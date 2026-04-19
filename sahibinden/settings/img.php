<?php
include('router.php');
header( 'Content-Type: application/json');
session_start();
$id = $_GET['id'];

if(!$id){
    header('Location: ../index.php');
}

try {
    $dbh = new PDO($dsn, $user, $password);
    $dbh->exec("SET NAMES 'utf8'; SET CHARSET 'utf8'");
} catch (PDOException $e) {
    print $e->getMessage();
}

    @$makbuz = $_FILES['fileUpload']['name'];
    if (empty($makbuz)){
        echo json_encode(['status'=>'error']);
    }else{
        $target_file = '../assets/images/'.$makbuz;
        $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
        $file_extension = strtolower($file_extension);
        $valid_extension = array("png","jpeg","jpg", "jfif");
        if(in_array($file_extension, $valid_extension)) {
            if(move_uploaded_file($_FILES['fileUpload']['tmp_name'], $target_file)) {
                try{
                    $query = $dbh->prepare("UPDATE info SET makbuz = ? WHERE id ='$id'");
                    $update = $query->execute(array($makbuz));
                    if ($update){
                        unset($_SESSION['tum']);
                        echo json_encode(['status'=>'done']);
                        exit;
                    }else {
                        echo json_encode(['status'=>'error']);
                        exit;
                    }
                }
                catch(PDOException $e){
                    die($e->getMessage());
                }
            }else{
                echo json_encode(['status'=>'error2']);
            }
                
        }


    }
?>