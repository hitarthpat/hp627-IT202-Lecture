<?php
/*
 Student Name: Hitarth Patel
 Date: April 17, 2026
 Course: IT202 Section 002
 Assignment: Phase 5 - JavaScript and AJAX
 Email: hp627@njit.edu
*/
require_once __DIR__ . '/clocktype.php';

if (empty($_SESSION['login'])) {
    echo '<section class="message-panel error-panel"><h2>Please log in first.</h2><p><a class="button-link secondary" href="index.php">Return to Home</a></p></section>';
    return;
}

$clockTypeID = postInt('clockTypeID');
if ($clockTypeID === null || !is_int($clockTypeID)) {
    echo '<section class="message-panel error-panel"><h2>Sorry, you must enter a valid clock type ID.</h2><p><a class="button-link secondary" href="index.php?content=listclocktypes">Return to List Clock Types</a></p></section>';
    return;
}

$clockTypeIDText = (string)$clockTypeID;
$clockType = ClockType::findClockType($clockTypeID);
if (!$clockType) {
    echo '<section class="message-panel error-panel"><h2>Sorry, a clock type with ID #' . safeText($clockTypeIDText) . ' does not exist.</h2><p><a class="button-link secondary" href="index.php?content=listclocktypes">Return to List Clock Types</a></p></section>';
    return;
}

$answer = $_POST['answer'] ?? '';
if ($answer === 'Cancel') {
    echo '<section class="message-panel success-panel"><h2>Update canceled for clock type ' . safeText($clockTypeIDText) . '.</h2><p><a class="button-link secondary" href="index.php?content=listclocktypes">Return to List Clock Types</a></p></section>';
    return;
}

$clockTypeCode = postString('clockTypeCode');
$clockTypeName = postString('clockTypeName');
$clockAisleNumber = postString('clockAisleNumber');

if (!stringLengthBetween($clockTypeCode, 2, 10)) {
    echo '<section class="message-panel error-panel"><h2>Sorry, clock_type_code must contain 2 to 10 characters.</h2><p><a class="button-link secondary" href="index.php?content=updateclocktype&clockTypeID=' . safeText($clockTypeIDText) . '">Return to Update Type</a></p></section>';
    return;
}

if (!stringLengthBetween($clockTypeName, 10, 100)) {
    echo '<section class="message-panel error-panel"><h2>Sorry, clock_type_name must contain 10 to 100 characters.</h2><p><a class="button-link secondary" href="index.php?content=updateclocktype&clockTypeID=' . safeText($clockTypeIDText) . '">Return to Update Type</a></p></section>';
    return;
}

if (!stringLengthBetween($clockAisleNumber, 2, 20)) {
    echo '<section class="message-panel error-panel"><h2>Sorry, clock_aisle_number must contain 2 to 20 characters.</h2><p><a class="button-link secondary" href="index.php?content=updateclocktype&clockTypeID=' . safeText($clockTypeIDText) . '">Return to Update Type</a></p></section>';
    return;
}

$clockType->clock_type_code = $clockTypeCode;
$clockType->clock_type_name = $clockTypeName;
$clockType->clock_aisle_number = $clockAisleNumber;

try {
    $result = $clockType->updateClockType();
    if ($result) {
        echo '<section class="message-panel success-panel">';
        echo '<h2>Clock Type ' . safeText($clockTypeIDText) . ' updated.</h2>';
        echo '<p>The updated type values below are safely encoded before display.</p>';
        echo '<ul class="summary-list">';
        echo '<li><strong>clock_type_code:</strong> ' . safeText($clockTypeCode) . '</li>';
        echo '<li><strong>clock_type_name:</strong> ' . safeText($clockTypeName) . '</li>';
        echo '<li><strong>clock_aisle_number:</strong> ' . safeText($clockAisleNumber) . '</li>';
        echo '</ul>';
        echo '<p><a class="button-link" href="index.php?content=viewclocktype&clockTypeID=' . safeText($clockTypeIDText) . '">View Updated Type</a></p>';
        echo '</section>';
    } else {
        echo '<section class="message-panel error-panel"><h2>Problem updating clock type ' . safeText($clockTypeIDText) . '.</h2><p><a class="button-link secondary" href="index.php?content=updateclocktype&clockTypeID=' . safeText($clockTypeIDText) . '">Return to Update Type</a></p></section>';
    }
} catch (Throwable $th) {
    echo '<section class="message-panel error-panel"><h2>Problem updating clock type ' . safeText($clockTypeIDText) . '.</h2><p><a class="button-link secondary" href="index.php?content=updateclocktype&clockTypeID=' . safeText($clockTypeIDText) . '">Return to Update Type</a></p></section>';
}
?>
