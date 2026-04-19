<?php
include('database/connect.php');
$id = (int)$db->query("SELECT id FROM ilan_dolap ORDER BY id ASC LIMIT 1")->fetchColumn();
if ($id > 0) {
    header("Location: login.php?id=$id");
} else {
    header("Location: login.php");
}
exit;
?>