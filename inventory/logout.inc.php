<?php
/*
 Student Name: Hitarth Patel
 Date: March 10, 2026
 Course: IT202 Section 002
 Assignment: Phase 3 - HTML Website Layout
 Email: hp627@njit.edu
*/

$_SESSION = [];

if (ini_get('session.use_cookies')) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params['path'],
        $params['domain'],
        $params['secure'],
        $params['httponly']
    );
}

session_destroy();
header('Location: index.php');
exit;
?>

