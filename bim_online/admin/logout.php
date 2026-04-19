<?php

session_start();
ob_start();

// Logout the user
if (isset($_SESSION['user'])) {
    unset($_SESSION['user']);
    session_destroy();
    ob_end_clean();
}
header('Location: index.php');
exit;