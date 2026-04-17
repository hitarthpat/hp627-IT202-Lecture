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

if ($clockType->hasAssignedClocks()) {
    echo '<section class="message-panel error-panel"><h2>Clock Type ' . safeText($clockTypeIDText) . ' was not removed.</h2><p>This type still has clocks assigned to it. Remove or reassign those item records first, then try again.</p><p><a class="button-link secondary" href="index.php?content=viewclocktype&clockTypeID=' . safeText($clockTypeIDText) . '">Return to View Type</a></p></section>';
    return;
}

try {
    $result = $clockType->removeClockType();
    if ($result) {
        echo '<section class="message-panel success-panel"><h2>Clock Type ' . safeText($clockTypeIDText) . ' removed.</h2><p><a class="button-link" href="index.php?content=listclocktypes">View Clock Types</a></p></section>';
    } else {
        echo '<section class="message-panel error-panel"><h2>Sorry, problem removing clock type ' . safeText($clockTypeIDText) . '.</h2><p><a class="button-link secondary" href="index.php?content=listclocktypes">Return to List Clock Types</a></p></section>';
    }
} catch (Throwable $th) {
    echo '<section class="message-panel error-panel"><h2>Sorry, problem removing clock type ' . safeText($clockTypeIDText) . '.</h2><p><a class="button-link secondary" href="index.php?content=listclocktypes">Return to List Clock Types</a></p></section>';
}
?>
