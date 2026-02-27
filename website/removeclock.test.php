<?php
/*
 Student Name: Hitarth Patel
 Date: February 25, 2026
 Course: IT202 Section 002
 Assignment: Phase 2 - CRUD Clock Types and Clocks
 Email: hp627@njit.edu
*/
require_once(__DIR__ . '/clock.php');

$clockID = $_POST['clockID'] ?? '';
if ((trim((string)$clockID) === '') || (!is_numeric($clockID))) {
    echo "<h2>Sorry, you must enter a valid clock ID</h2>\n";
} else if (!Clock::findClock((int)$clockID)) {
    echo "<h2>Sorry, a clock with ID #$clockID does not exist</h2>\n";
} else {
    $clock = Clock::findClock((int)$clockID);
    try {
        $result = $clock->removeClock();
        if ($result) {
            echo "<h2>Clock $clockID removed</h2>\n";
        } else {
            echo "<h2>Sorry, problem removing clock $clockID</h2>\n";
        }
    } catch (Throwable $th) {
        echo "<h2>Sorry, problem removing clock $clockID</h2>\n";
    }
}
?>
