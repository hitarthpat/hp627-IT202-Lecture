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
    echo '<h2>Sorry, you must enter a valid clock ID.</h2>';
    echo '<p><a href="index.php?content=listclocks">Return to List Clocks</a></p>';
    return;
}

$clock = Clock::findClock((int)$clockID);
if (!$clock) {
    echo '<h2>Sorry, a clock with ID #' . safeText($clockID) . ' does not exist.</h2>';
    echo '<p><a href="index.php?content=listclocks">Return to List Clocks</a></p>';
    return;
}

$answer = $_POST['answer'] ?? '';
if ($answer === 'Cancel') {
    echo '<h2>Update canceled for clock ' . safeText($clockID) . '.</h2>';
    echo '<p><a href="index.php?content=listclocks">Return to List Clocks</a></p>';
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
    echo '<p><a href="index.php?content=updateclock&clockID=' . safeText($clockID) . '">Return to Update Clock</a></p>';
    return;
}

if (!is_numeric($clockBuyPrice) || !is_numeric($clockSellPrice)) {
    echo '<h2>Sorry, clock_buy_price and clock_sell_price must be numeric values.</h2>';
    echo '<p><a href="index.php?content=updateclock&clockID=' . safeText($clockID) . '">Return to Update Clock</a></p>';
    return;
}

$clockTypeID = null;
if ($clockTypeIDInput !== '') {
    if (!is_numeric($clockTypeIDInput)) {
        echo '<h2>Sorry, clock_type_id must be numeric.</h2>';
        echo '<p><a href="index.php?content=updateclock&clockID=' . safeText($clockID) . '">Return to Update Clock</a></p>';
        return;
    }

    $clockTypeID = (int)$clockTypeIDInput;
    if (!ClockType::findClockType($clockTypeID)) {
        echo '<h2>Sorry, clock type ID #' . safeText($clockTypeIDInput) . ' does not exist.</h2>';
        echo '<p><a href="index.php?content=updateclock&clockID=' . safeText($clockID) . '">Return to Update Clock</a></p>';
        return;
    }
}

$clock->clock_code = $clockCode;
$clock->clock_name = $clockName;
$clock->clock_description = $clockDescription;
$clock->clock_style = $clockStyle;
$clock->clock_power_source = $clockPowerSource;
$clock->clock_type_id = $clockTypeID;
$clock->clock_buy_price = (float)$clockBuyPrice;
$clock->clock_sell_price = (float)$clockSellPrice;

try {
    $result = $clock->updateClock();
    if ($result) {
        echo '<h2>Clock ' . safeText($clockID) . ' updated.</h2>';
        echo '<p><a href="index.php?content=listclocks">View Clocks</a></p>';
    } else {
        echo '<h2>Problem updating clock ' . safeText($clockID) . '.</h2>';
        echo '<p><a href="index.php?content=updateclock&clockID=' . safeText($clockID) . '">Return to Update Clock</a></p>';
    }
} catch (Throwable $th) {
    echo '<h2>Problem updating clock ' . safeText($clockID) . '.</h2>';
    echo '<p><a href="index.php?content=updateclock&clockID=' . safeText($clockID) . '">Return to Update Clock</a></p>';
}
?>
