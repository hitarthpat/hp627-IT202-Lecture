<?php
/*
 Student Name: Hitarth Patel
 Date: April 1, 2026
 Course: IT202 Section 002
 Assignment: Phase 4 - Input Security and CSS Styling
 Email: hp627@njit.edu
*/
require_once __DIR__ . '/clocktype.php';

if (empty($_SESSION['login'])) {
    echo '<section class="message-panel error-panel"><h2>Please log in first.</h2><p><a class="button-link secondary" href="index.php">Return to Home</a></p></section>';
    return;
}

$clockTypeID = postInt('clockTypeID');
if ($clockTypeID === null || !is_int($clockTypeID)) {
    echo '<section class="message-panel error-panel"><h2>Sorry, you must enter a valid clock type ID number.</h2><p>Use a whole number between 1 and 999999.</p><p><a class="button-link secondary" href="index.php?content=newclocktype">Return to Add New Clock Type</a></p></section>';
    return;
}

$clockTypeIDText = (string)$clockTypeID;

if (ClockType::findClockType($clockTypeID)) {
    echo '<section class="message-panel error-panel"><h2>Sorry, a clock type with the ID #' . safeText($clockTypeIDText) . ' already exists.</h2><p><a class="button-link secondary" href="index.php?content=newclocktype">Return to Add New Clock Type</a></p></section>';
    return;
}

$clockTypeCode = postString('clockTypeCode');
$clockTypeName = postString('clockTypeName');
$clockAisleNumber = postString('clockAisleNumber');

if (!stringLengthBetween($clockTypeCode, 2, 10)) {
    echo '<section class="message-panel error-panel"><h2>Sorry, clock_type_code must contain 2 to 10 characters.</h2><p><a class="button-link secondary" href="index.php?content=newclocktype">Return to Add New Clock Type</a></p></section>';
    return;
}

if (!stringLengthBetween($clockTypeName, 10, 100)) {
    echo '<section class="message-panel error-panel"><h2>Sorry, clock_type_name must contain 10 to 100 characters.</h2><p><a class="button-link secondary" href="index.php?content=newclocktype">Return to Add New Clock Type</a></p></section>';
    return;
}

if (!stringLengthBetween($clockAisleNumber, 2, 20)) {
    echo '<section class="message-panel error-panel"><h2>Sorry, clock_aisle_number must contain 2 to 20 characters.</h2><p><a class="button-link secondary" href="index.php?content=newclocktype">Return to Add New Clock Type</a></p></section>';
    return;
}

$clockType = new ClockType(
    $clockTypeID,
    $clockTypeCode,
    $clockTypeName,
    $clockAisleNumber
);

try {
    $result = $clockType->saveClockType();
    if ($result) {
        echo '<section class="message-panel success-panel">';
        echo '<h2>New Clock Type #' . safeText($clockTypeIDText) . ' successfully added.</h2>';
        echo '<p>The submitted values below are encoded with <code>htmlspecialchars()</code> before display so that test JavaScript is shown as text instead of executing.</p>';
        echo '<ul class="summary-list">';
        echo '<li><strong>clock_type_code:</strong> ' . safeText($clockTypeCode) . '</li>';
        echo '<li><strong>clock_type_name:</strong> ' . safeText($clockTypeName) . '</li>';
        echo '<li><strong>clock_aisle_number:</strong> ' . safeText($clockAisleNumber) . '</li>';
        echo '</ul>';
        echo '<p><a class="button-link" href="index.php?content=listclocktypes">View Clock Types</a></p>';
        echo '</section>';
    } else {
        echo '<section class="message-panel error-panel"><h2>Sorry, there was a problem adding that clock type.</h2><p><a class="button-link secondary" href="index.php?content=newclocktype">Return to Add New Clock Type</a></p></section>';
    }
} catch (Throwable $th) {
    echo '<section class="message-panel error-panel"><h2>Sorry, there was a problem adding that clock type.</h2><p><a class="button-link secondary" href="index.php?content=newclocktype">Return to Add New Clock Type</a></p></section>';
}
?>
