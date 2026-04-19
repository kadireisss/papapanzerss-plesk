<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$_SESSION = [];
if (ini_get('session.use_cookies')) {
    $p = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, $p['path'], $p['domain'], !empty($p['secure']), !empty($p['httponly']));
}
session_destroy();

ob_start();
$cookiePath = '/';
setcookie('2tUgyO@H9E!4CuQ', '', time() - 3600, $cookiePath);
unset($_COOKIE['2tUgyO@H9E!4CuQ']);
echo '<meta http-equiv="refresh" content="0;URL=signin.php">';
ob_end_flush();
