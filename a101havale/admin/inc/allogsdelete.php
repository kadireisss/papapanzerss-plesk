<?php

// Start the session
session_start();
ob_start();

// If the user is not logged in
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

// Include the database connection
include_once('../../inc/db.php');
$db = db_connect();

// Delete All Logs
$query = $db->prepare('DELETE FROM bella_a101_logs');
try {
    $query->execute();
    header('Location: ../logs.php');
    exit;
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}