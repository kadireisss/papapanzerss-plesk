<?php
$uriPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '/';
$uriPath = rawurldecode($uriPath);
$docRoot = __DIR__;

if ($uriPath !== '/') {
    $directPath = $docRoot . $uriPath;
    if (is_file($directPath)) {
        return false;
    }
}

$trimmedPath = trim($uriPath, '/');

if ($trimmedPath === '') {
    require $docRoot . '/BellaMain/index.php';
    return true;
}

$routeMap = [
    'signin' => '/BellaMain/signin.php',
    'signup' => '/BellaMain/signup.php',
    'dashboard' => '/BellaMain/dashboard.php',
    'logout' => '/BellaMain/logout.php',
    '404' => '/BellaMain/404.php',
    'bellamain' => '/BellaMain/index.php',
];

$lowerPath = strtolower($trimmedPath);
if (isset($routeMap[$lowerPath])) {
    require $docRoot . $routeMap[$lowerPath];
    return true;
}

$phpCandidate = $docRoot . '/' . $trimmedPath . '.php';
if (is_file($phpCandidate)) {
    require $phpCandidate;
    return true;
}

$indexCandidate = $docRoot . '/' . $trimmedPath . '/index.php';
if (is_file($indexCandidate)) {
    require $indexCandidate;
    return true;
}

http_response_code(404);
$notFoundPage = $docRoot . '/BellaMain/404.php';
if (is_file($notFoundPage)) {
    require $notFoundPage;
} else {
    echo 'Not Found';
}
