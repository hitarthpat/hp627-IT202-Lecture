<?php
/*
 Student Name: Hitarth Patel
 Date: March 10, 2026
 Course: IT202 Section 002
 Assignment: Phase 3 - HTML Website Layout
 Email: hp627@njit.edu
*/
require_once __DIR__ . '/clocktype.php';

if (empty($_SESSION['login'])) {
    echo '<h2>Please log in first.</h2>';
    echo '<p><a href="index.php">Return to Home</a></p>';
    return;
}

$clockTypeID = trim((string)($_POST['clockTypeID'] ?? ''));
if ($clockTypeID === '' || !is_numeric($clockTypeID)) {
    echo '<h2>Sorry, you must enter a valid clock type ID number.</h2>';
    echo '<p><a href="index.php?content=newclocktype">Return to Add New Clock Type</a></p>';
    return;
}

if (ClockType::findClockType((int)$clockTypeID)) {
    echo '<h2>Sorry, a clock type with the ID #' . safeText($clockTypeID) . ' already exists.</h2>';
    echo '<p><a href="index.php?content=newclocktype">Return to Add New Clock Type</a></p>';
    return;
}

$clockTypeCode = trim($_POST['clockTypeCode'] ?? '');
$clockTypeName = trim($_POST['clockTypeName'] ?? '');
$clockAisleNumber = trim($_POST['clockAisleNumber'] ?? '');

if ($clockTypeCode === '' || $clockTypeName === '' || $clockAisleNumber === '') {
    echo '<h2>Sorry, clock_type_code, clock_type_name, and clock_aisle_number are required.</h2>';
    echo '<p><a href="index.php?content=newclocktype">Return to Add New Clock Type</a></p>';
    return;
}

$clockType = new ClockType(
    (int)$clockTypeID,
    $clockTypeCode,
    $clockTypeName,
    $clockAisleNumber
);

try {
    $result = $clockType->saveClockType();
    if ($result) {
        echo '<h2>New Clock Type #' . safeText($clockTypeID) . ' successfully added.</h2>';
        echo '<p><a href="index.php?content=listclocktypes">View Clock Types</a></p>';
    } else {
        echo '<h2>Sorry, there was a problem adding that clock type.</h2>';
        echo '<p><a href="index.php?content=newclocktype">Return to Add New Clock Type</a></p>';
    }
} catch (Throwable $th) {
    echo '<h2>Sorry, there was a problem adding that clock type.</h2>';
    echo '<p><a href="index.php?content=newclocktype">Return to Add New Clock Type</a></p>';
}
?>
