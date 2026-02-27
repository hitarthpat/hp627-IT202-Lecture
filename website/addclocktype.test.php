<?php
/*
 Student Name: Hitarth Patel
 Date: February 25, 2026
 Course: IT202 Section 002
 Assignment: Phase 2 - CRUD Clock Types and Clocks
 Email: hp627@njit.edu
*/
require_once(__DIR__ . '/clocktype.php');

$clockTypeID = $_POST['clockTypeID'] ?? '';
if ((trim((string)$clockTypeID) === '') || (!is_numeric($clockTypeID))) {
    echo "<h2>Sorry, you must enter a valid clock type ID number</h2>\n";
} else if (ClockType::findClockType((int)$clockTypeID)) {
    echo "<h2>Sorry, a clock type with the ID #$clockTypeID already exists</h2>\n";
} else {
    $clockTypeCode = trim($_POST['clockTypeCode'] ?? '');
    $clockTypeName = trim($_POST['clockTypeName'] ?? '');
    $clockAisleNumber = trim($_POST['clockAisleNumber'] ?? '');

    if (($clockTypeCode === '') || ($clockTypeName === '') || ($clockAisleNumber === '')) {
        echo "<h2>Sorry, clock type code, name, and aisle number are required</h2>\n";
    } else {
        $clockType = new ClockType(
            (int)$clockTypeID,
            $clockTypeCode,
            $clockTypeName,
            $clockAisleNumber
        );

        try {
            $result = $clockType->saveClockType();
            if ($result) {
                echo "<h2>New Clock Type #$clockTypeID successfully added</h2>\n";
            } else {
                echo "<h2>Sorry, there was a problem adding that clock type</h2>\n";
            }
        } catch (Throwable $th) {
            echo "<h2>Sorry, there was a problem adding that clock type</h2>\n";
        }
    }
}
?>
