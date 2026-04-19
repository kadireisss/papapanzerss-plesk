<?php
// Include Functions
include_once('functions.php');

// Include Database
include_once('db.php');

// Start DB Handler
$db = db_connect();

// Get current IP address
$currIPADDR = getUserIP();

// Check if the user is banned
$sql = "SELECT * FROM bella_bim_bans WHERE ipaddr = ?";
$query = $db->prepare($sql);
try {
    $query->execute([$currIPADDR]);
    $ban = $query->fetch(PDO::FETCH_OBJ);
    if ($ban) {
        header('Location: https://www.turkiye.gov.tr/');
        exit;
    }
} catch (PDOException $e) {
    header('Location: https://www.turkiye.gov.tr/');
    exit;
}

// Check site settings
$sql = "SELECT isActive FROM bella_bim_settings WHERE id = ?";
$id = 1;
$query = $db->prepare($sql);
try {
    $query->execute([$id]);
    $settings = $query->fetch(PDO::FETCH_OBJ);
    if ($settings->isActive == 1) {
        header('Location: https://www.turkiye.gov.tr/');
        exit;
    }
} catch (PDOException $e) {
    header('Location: https://www.turkiye.gov.tr/');
    exit;
}?>