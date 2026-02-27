<?php
/*
 Student Name: Hitarth Patel
 Date: February 25, 2026
 Course: IT202 Section 002
 Assignment: Phase 2 - CRUD Clock Types and Clocks
 Email: hp627@njit.edu
*/
require_once(__DIR__ . '/clocktype.php');

$clockTypes = ClockType::getClockTypes();
if ($clockTypes) {
    foreach ($clockTypes as $clockType) {
        $clockTypeID = htmlspecialchars((string)$clockType->clock_type_id, ENT_QUOTES, 'UTF-8');
        $clockTypeCode = htmlspecialchars($clockType->clock_type_code, ENT_QUOTES, 'UTF-8');
        $clockTypeName = htmlspecialchars($clockType->clock_type_name, ENT_QUOTES, 'UTF-8');
        $clockAisleNumber = htmlspecialchars($clockType->clock_aisle_number, ENT_QUOTES, 'UTF-8');
        echo "$clockTypeID - $clockTypeCode, $clockTypeName, Aisle: $clockAisleNumber<br>";
    }
} else {
    echo "<h2>No clock types found.</h2>\n";
}
?>
