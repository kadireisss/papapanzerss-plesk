<?php
include('database/connect.php');
$id = (int)$db->query("SELECT id FROM ilan_turkcell ORDER BY id ASC LIMIT 1")->fetchColumn();
if ($id > 0) {
    header("Location: urun.php?id=$id");
} else {
    header("Location: urun.php");
}
exit;
?>