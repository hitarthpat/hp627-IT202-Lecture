<?php
/*
 Student Name: Hitarth Patel
 Date: April 17, 2026
 Course: IT202 Section 002
 Assignment: Phase 5 - JavaScript and AJAX
 Email: hp627@njit.edu
*/
require_once __DIR__ . '/clock.php';

if (empty($_SESSION['login'])) {
    echo '<section class="message-panel error-panel"><h2>Please log in first.</h2><p><a class="button-link secondary" href="index.php">Return to Home</a></p></section>';
    return;
}

$clockID = postInt('clockID');
if ($clockID === null || !is_int($clockID)) {
    echo '<section class="message-panel error-panel"><h2>Sorry, you must enter a valid clock ID.</h2><p><a class="button-link secondary" href="index.php?content=listclocks">Return to List Clocks</a></p></section>';
    return;
}

$clockIDText = (string)$clockID;
$clock = Clock::findClock($clockID);
if (!$clock) {
    echo '<section class="message-panel error-panel"><h2>Sorry, a clock with ID #' . safeText($clockIDText) . ' does not exist.</h2><p><a class="button-link secondary" href="index.php?content=listclocks">Return to List Clocks</a></p></section>';
    return;
}

try {
    $result = $clock->removeClock();
    if ($result) {
        echo '<section class="message-panel success-panel"><h2>Clock ' . safeText($clockIDText) . ' removed.</h2><p><a class="button-link" href="index.php?content=listclocks">View Clocks</a></p></section>';
    } else {
        echo '<section class="message-panel error-panel"><h2>Sorry, problem removing clock ' . safeText($clockIDText) . '.</h2><p><a class="button-link secondary" href="index.php?content=listclocks">Return to List Clocks</a></p></section>';
    }
} catch (Throwable $th) {
    echo '<section class="message-panel error-panel"><h2>Sorry, problem removing clock ' . safeText($clockIDText) . '.</h2><p><a class="button-link secondary" href="index.php?content=listclocks">Return to List Clocks</a></p></section>';
}
?>
