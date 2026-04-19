<?php
include('database/connect.php');
$id = $db->query("SELECT id FROM yurtici ORDER BY id ASC LIMIT 1")->fetchColumn();
if (!empty($id)) {
    header("Location: gonderi-Sorgula.php?id=$id");
} else {
    header("Location: gonderi-Sorgula.php");
}
exit;
?>