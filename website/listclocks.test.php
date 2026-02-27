<?php
/*
 Student Name: Hitarth Patel
 Date: February 25, 2026
 Course: IT202 Section 002
 Assignment: Phase 2 - CRUD Clock Types and Clocks
 Email: hp627@njit.edu
*/
require_once(__DIR__ . '/clock.php');

$clocks = Clock::getClocks();
if ($clocks) {
    foreach ($clocks as $clock) {
        $clockID = htmlspecialchars((string)$clock->clock_id, ENT_QUOTES, 'UTF-8');
        $clockCode = htmlspecialchars($clock->clock_code, ENT_QUOTES, 'UTF-8');
        $clockName = htmlspecialchars($clock->clock_name, ENT_QUOTES, 'UTF-8');
        $clockStyle = htmlspecialchars($clock->clock_style, ENT_QUOTES, 'UTF-8');
        $clockPowerSource = htmlspecialchars($clock->clock_power_source, ENT_QUOTES, 'UTF-8');
        $clockTypeID = ($clock->clock_type_id === null) ? 'NULL' : htmlspecialchars((string)$clock->clock_type_id, ENT_QUOTES, 'UTF-8');
        $clockBuyPrice = htmlspecialchars((string)$clock->clock_buy_price, ENT_QUOTES, 'UTF-8');
        $clockSellPrice = htmlspecialchars((string)$clock->clock_sell_price, ENT_QUOTES, 'UTF-8');
        echo "$clockID - $clockCode, $clockName, Style: $clockStyle, Power: $clockPowerSource, Type: $clockTypeID, Buy: $clockBuyPrice, Sell: $clockSellPrice<br>";
    }
} else {
    echo "<h2>No clocks found.</h2>\n";
}
?>
