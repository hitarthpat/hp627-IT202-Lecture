<?php
/*
 Student Name: Hitarth Patel
 Date: February 6, 2026
 Course: IT202 Section 002
 Assignment: Phase 1 - Login and Logout
 Email: hp627@njit.edu
*/
function getDB($echo_mode = false)
{
    $host = 'localhost';
    $port = 3306;
    $dbname = 'clock';
    $username = 'clock_app';
    $password = 'ClockP@ss2026';

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    try {
        $db = new mysqli($host, $username, $password, $dbname, $port);
        $db->set_charset('utf8mb4');
        if ($echo_mode) {
            echo 'Database connection successful to localhost';
        }
        return $db;
    } catch (mysqli_sql_exception $e) {
        error_log('Database connection failed: ' . $e->getMessage());
        if ($echo_mode) {
            echo 'Database connection failed.';
        }
        return null;
    }
}
?>


