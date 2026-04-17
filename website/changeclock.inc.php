<?php
/*
 Student Name: Hitarth Patel
 Date: April 17, 2026
 Course: IT202 Section 002
 Assignment: Phase 5 - JavaScript and AJAX
 Email: hp627@njit.edu
*/
require_once __DIR__ . '/clock.php';
require_once __DIR__ . '/clocktype.php';

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

$answer = $_POST['answer'] ?? '';
if ($answer === 'Cancel') {
    echo '<section class="message-panel success-panel"><h2>Update canceled for clock ' . safeText($clockIDText) . '.</h2><p><a class="button-link secondary" href="index.php?content=listclocks">Return to List Clocks</a></p></section>';
    return;
}

$clockCode = postString('clockCode');
$clockName = postString('clockName');
$clockDescription = postString('clockDescription');
$clockStyle = postString('clockStyle');
$clockPowerSource = postString('clockPowerSource');
$clockTypeID = postInt('clockTypeID');
$clockBuyPrice = postFloat('clockBuyPrice');
$clockSellPrice = postFloat('clockSellPrice');

if (!stringLengthBetween($clockCode, 2, 10)) {
    echo '<section class="message-panel error-panel"><h2>Sorry, clock_code must contain 2 to 10 characters.</h2><p><a class="button-link secondary" href="index.php?content=updateclock&clockID=' . safeText($clockIDText) . '">Return to Update Clock</a></p></section>';
    return;
}

if (!stringLengthBetween($clockName, 10, 100)) {
    echo '<section class="message-panel error-panel"><h2>Sorry, clock_name must contain 10 to 100 characters.</h2><p><a class="button-link secondary" href="index.php?content=updateclock&clockID=' . safeText($clockIDText) . '">Return to Update Clock</a></p></section>';
    return;
}

if (!stringLengthBetween($clockDescription, 100, 255)) {
    echo '<section class="message-panel error-panel"><h2>Sorry, clock_description must contain 100 to 255 characters.</h2><p><a class="button-link secondary" href="index.php?content=updateclock&clockID=' . safeText($clockIDText) . '">Return to Update Clock</a></p></section>';
    return;
}

if (!stringLengthBetween($clockStyle, 3, 80)) {
    echo '<section class="message-panel error-panel"><h2>Sorry, clock_style must contain 3 to 80 characters.</h2><p><a class="button-link secondary" href="index.php?content=updateclock&clockID=' . safeText($clockIDText) . '">Return to Update Clock</a></p></section>';
    return;
}

if (!stringLengthBetween($clockPowerSource, 3, 80)) {
    echo '<section class="message-panel error-panel"><h2>Sorry, clock_power_source must contain 3 to 80 characters.</h2><p><a class="button-link secondary" href="index.php?content=updateclock&clockID=' . safeText($clockIDText) . '">Return to Update Clock</a></p></section>';
    return;
}

if ($clockTypeID === null || !is_int($clockTypeID)) {
    echo '<section class="message-panel error-panel"><h2>Sorry, clock_type_id must be numeric.</h2><p><a class="button-link secondary" href="index.php?content=updateclock&clockID=' . safeText($clockIDText) . '">Return to Update Clock</a></p></section>';
    return;
}

if (!ClockType::findClockType($clockTypeID)) {
    echo '<section class="message-panel error-panel"><h2>Sorry, clock type ID #' . safeText((string)$clockTypeID) . ' does not exist.</h2><p><a class="button-link secondary" href="index.php?content=updateclock&clockID=' . safeText($clockIDText) . '">Return to Update Clock</a></p></section>';
    return;
}

if ($clockBuyPrice === null || $clockSellPrice === null || !is_float($clockBuyPrice) || !is_float($clockSellPrice)) {
    echo '<section class="message-panel error-panel"><h2>Sorry, clock_buy_price and clock_sell_price must be numeric values.</h2><p><a class="button-link secondary" href="index.php?content=updateclock&clockID=' . safeText($clockIDText) . '">Return to Update Clock</a></p></section>';
    return;
}

if ($clockBuyPrice === $clockSellPrice) {
    echo '<section class="message-panel error-panel"><h2>Sorry, the buy price and sell price must be different values.</h2><p><a class="button-link secondary" href="index.php?content=updateclock&clockID=' . safeText($clockIDText) . '">Return to Update Clock</a></p></section>';
    return;
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
        echo '<section class="message-panel success-panel">';
        echo '<h2>Clock ' . safeText($clockIDText) . ' updated.</h2>';
        echo '<p>The updated values below are safely encoded before display.</p>';
        echo '<ul class="summary-list">';
        echo '<li><strong>clock_code:</strong> ' . safeText($clockCode) . '</li>';
        echo '<li><strong>clock_name:</strong> ' . safeText($clockName) . '</li>';
        echo '<li><strong>clock_description:</strong> ' . safeText($clockDescription) . '</li>';
        echo '<li><strong>clock_style:</strong> ' . safeText($clockStyle) . '</li>';
        echo '<li><strong>clock_power_source:</strong> ' . safeText($clockPowerSource) . '</li>';
        echo '<li><strong>clock_type_id:</strong> ' . safeText((string)$clockTypeID) . '</li>';
        echo '<li><strong>clock_buy_price:</strong> $' . safeText(formatMoney($clockBuyPrice)) . '</li>';
        echo '<li><strong>clock_sell_price:</strong> $' . safeText(formatMoney($clockSellPrice)) . '</li>';
        echo '</ul>';
        echo '<p><a class="button-link" href="index.php?content=listclocks">View Clocks</a></p>';
        echo '</section>';
    } else {
        echo '<section class="message-panel error-panel"><h2>Problem updating clock ' . safeText($clockIDText) . '.</h2><p><a class="button-link secondary" href="index.php?content=updateclock&clockID=' . safeText($clockIDText) . '">Return to Update Clock</a></p></section>';
    }
} catch (Throwable $th) {
    echo '<section class="message-panel error-panel"><h2>Problem updating clock ' . safeText($clockIDText) . '.</h2><p><a class="button-link secondary" href="index.php?content=updateclock&clockID=' . safeText($clockIDText) . '">Return to Update Clock</a></p></section>';
}
?>
