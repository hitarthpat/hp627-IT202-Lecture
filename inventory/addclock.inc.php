<?php
/*
 Student Name: Hitarth Patel
 Date: March 10, 2026
 Course: IT202 Section 002
 Assignment: Phase 3 - HTML Website Layout
 Email: hp627@njit.edu
*/
require_once __DIR__ . '/clock.php';
require_once __DIR__ . '/clocktype.php';

if (empty($_SESSION['login'])) {
    echo '<h2>Please log in first.</h2>';
    echo '<p><a href="index.php">Return to Home</a></p>';
    return;
}

$clockID = trim((string)($_POST['clockID'] ?? ''));
if ($clockID === '' || !is_numeric($clockID)) {
    echo '<h2>Sorry, you must enter a valid clock ID number.</h2>';
    echo '<p><a href="index.php?content=newclock">Return to Add New Clock</a></p>';
    return;
}

if (Clock::findClock((int)$clockID)) {
    echo '<h2>Sorry, a clock with the ID #' . safeText($clockID) . ' already exists.</h2>';
    echo '<p><a href="index.php?content=newclock">Return to Add New Clock</a></p>';
    return;
}

$clockCode = trim($_POST['clockCode'] ?? '');
$clockName = trim($_POST['clockName'] ?? '');
$clockDescription = trim($_POST['clockDescription'] ?? '');
$clockStyle = trim($_POST['clockStyle'] ?? '');
$clockPowerSource = trim($_POST['clockPowerSource'] ?? '');
$clockTypeIDInput = trim((string)($_POST['clockTypeID'] ?? ''));
$clockBuyPrice = trim((string)($_POST['clockBuyPrice'] ?? ''));
$clockSellPrice = trim((string)($_POST['clockSellPrice'] ?? ''));

if (
    $clockCode === '' ||
    $clockName === '' ||
    $clockDescription === '' ||
    $clockStyle === '' ||
    $clockPowerSource === ''
) {
    echo '<h2>Sorry, all clock text fields are required.</h2>';
    echo '<p><a href="index.php?content=newclock">Return to Add New Clock</a></p>';
    return;
}

if (!is_numeric($clockBuyPrice) || !is_numeric($clockSellPrice)) {
    echo '<h2>Sorry, clock_buy_price and clock_sell_price must be numeric values.</h2>';
    echo '<p><a href="index.php?content=newclock">Return to Add New Clock</a></p>';
    return;
}

$clockTypeID = null;
if ($clockTypeIDInput !== '') {
    if (!is_numeric($clockTypeIDInput)) {
        echo '<h2>Sorry, clock_type_id must be numeric.</h2>';
        echo '<p><a href="index.php?content=newclock">Return to Add New Clock</a></p>';
        return;
    }

    $clockTypeID = (int)$clockTypeIDInput;
    if (!ClockType::findClockType($clockTypeID)) {
        echo '<h2>Sorry, clock type ID #' . safeText($clockTypeIDInput) . ' does not exist.</h2>';
        echo '<p><a href="index.php?content=newclock">Return to Add New Clock</a></p>';
        return;
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
        echo '<h2>New Clock #' . safeText($clockID) . ' successfully added.</h2>';
        echo '<p><a href="index.php?content=listclocks">View Clocks</a></p>';
    } else {
        echo '<h2>Sorry, there was a problem adding that clock.</h2>';
        echo '<p><a href="index.php?content=newclock">Return to Add New Clock</a></p>';
    }
} catch (Throwable $th) {
    echo '<h2>Sorry, there was a problem adding that clock.</h2>';
    echo '<p><a href="index.php?content=newclock">Return to Add New Clock</a></p>';
}
?>
