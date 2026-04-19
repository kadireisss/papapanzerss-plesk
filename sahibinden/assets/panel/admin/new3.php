<?php
include('../../../settings/router.php');
header( 'Content-Type: application/json' );

try {
    $conn = new PDO($dsn, $user, $password);
    $conn->exec("SET NAMES 'utf8'; SET CHARSET 'utf8'");
} catch (PDOException $e) {
    print $e->getMessage();
}
$id = $_POST['id'];
if ($_POST) {
	$username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
	$password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
    if(empty($username) && empty($password)){
        exit;
    }else{
        $query = $conn->prepare("UPDATE login SET username=?, password=? WHERE id = {$id}");
        $insert = $query->execute(array($username, md5($password)));
        if ($insert) {
			echo json_encode(['status'=>'done']);
			exit;
		}else{
			echo json_encode(['status'=>'error']);
			exit;
		}
    }
}
?>