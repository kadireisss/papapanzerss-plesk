<?php
include('../../../settings/router.php');

try {
    $conn = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    print $e->getMessage();
}
?>
