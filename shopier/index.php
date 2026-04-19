<?php
include('database/connect.php');
$id = (int)$db->query("SELECT id FROM ilan_shopier ORDER BY id ASC LIMIT 1")->fetchColumn();
if ($id > 0) {
    header("Location: ilan.php?id=$id");
} else {
    header("Location: ilan.php");
}
exit;
?>