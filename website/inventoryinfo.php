<?php
/*
 Student Name: Hitarth Patel
 Date: April 17, 2026
 Course: IT202 Section 002
 Assignment: Phase 5 - JavaScript and AJAX
 Email: hp627@njit.edu
*/
session_start();
header('Content-Type: application/json; charset=UTF-8');

require_once __DIR__ . '/clocktype.php';
require_once __DIR__ . '/clock.php';

if (empty($_SESSION['login'])) {
    http_response_code(403);
    echo json_encode(
        array(
            'success' => false,
            'message' => 'Please log in first.'
        )
    );
    exit;
}

$totals = Clock::getPriceTotals();
echo json_encode(
    array(
        'success' => true,
        'typeCount' => ClockType::countClockTypes(),
        'itemCount' => Clock::countClocks(),
        'buyPriceTotal' => number_format($totals['buy_price_total'], 2, '.', ','),
        'sellPriceTotal' => number_format($totals['sell_price_total'], 2, '.', ','),
        'updatedAt' => date('Y-m-d H:i:s')
    )
);
?>
