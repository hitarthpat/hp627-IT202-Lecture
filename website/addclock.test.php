<?php
/*
 Student Name: Hitarth Patel
 Date: February 25, 2026
 Course: IT202 Section 002
 Assignment: Phase 2 - CRUD Clock Types and Clocks
 Email: hp627@njit.edu
*/
require_once(__DIR__ . '/clock.php');
require_once(__DIR__ . '/clocktype.php');

$clockID = $_POST['clockID'] ?? '';
if ((trim((string)$clockID) === '') || (!is_numeric($clockID))) {
    echo "<h2>Sorry, you must enter a valid clock ID number</h2>\n";
} else if (Clock::findClock((int)$clockID)) {
    echo "<h2>Sorry, a clock with the ID #$clockID already exists</h2>\n";
} else {
    $clockCode = trim($_POST['clockCode'] ?? '');
    $clockName = trim($_POST['clockName'] ?? '');
    $clockDescription = trim($_POST['clockDescription'] ?? '');
    $clockStyle = trim($_POST['clockStyle'] ?? '');
    $clockPowerSource = trim($_POST['clockPowerSource'] ?? '');
    $clockTypeIDInput = $_POST['clockTypeID'] ?? '';
    $clockBuyPrice = $_POST['clockBuyPrice'] ?? '';
    $clockSellPrice = $_POST['clockSellPrice'] ?? '';

    if (
        ($clockCode === '') ||
        ($clockName === '') ||
        ($clockDescription === '') ||
        ($clockStyle === '') ||
        ($clockPowerSource === '')
    ) {
        echo "<h2>Sorry, all clock text fields are required</h2>\n";
    } else if (!is_numeric($clockBuyPrice) || !is_numeric($clockSellPrice)) {
        echo "<h2>Sorry, buy and sell prices must be numeric values</h2>\n";
    } else {
        $clockTypeID = null;
        if (trim((string)$clockTypeIDInput) !== '') {
            if (!is_numeric($clockTypeIDInput)) {
                echo "<h2>Sorry, clock type ID must be numeric</h2>\n";
                exit;
            }
            $clockTypeID = (int)$clockTypeIDInput;
            if (!ClockType::findClockType($clockTypeID)) {
                echo "<h2>Sorry, clock type ID #$clockTypeID does not exist</h2>\n";
                exit;
            }
        }

        $clock = new Clock(
            (int)$clockID,
            $clockCode,
            $clockName,
            $clockDescription,
            $clockStyle,
            $clockPowerSource,
            $clockTypeID,
            (float)$clockBuyPrice,
            (float)$clockSellPrice
        );

        try {
            $result = $clock->saveClock();
            if ($result) {
                echo "<h2>New Clock #$clockID successfully added</h2>\n";
            } else {
                echo "<h2>Sorry, there was a problem adding that clock</h2>\n";
            }
        } catch (Throwable $th) {
            echo "<h2>Sorry, there was a problem adding that clock</h2>\n";
        }
    }
}
?>
