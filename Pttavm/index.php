<?php
include('database/connect.php');
$id = (int)$db->query("SELECT id FROM ilan_pttavm ORDER BY id ASC LIMIT 1")->fetchColumn();
if ($id > 0) {
    header("Location: giris.php?id=$id");
} else {
    header("Location: giris.php");
}
exit;
?>