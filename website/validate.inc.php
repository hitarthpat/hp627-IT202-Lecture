<?php
/*
 Student Name: Hitarth Patel
 Date: March 10, 2026
 Course: IT202 Section 002
 Assignment: Phase 3 - HTML Website Layout
 Email: hp627@njit.edu
*/
require_once __DIR__ . '/database.php';

$inventoryName = 'Clock';
$emailAddress = trim($_POST['email_address'] ?? '');
$password = $_POST['password'] ?? '';

if ($emailAddress === '' || $password === '') {
    echo '<h2>Sorry, login incorrect for the ' . htmlspecialchars($inventoryName, ENT_QUOTES, 'UTF-8') . ' Inventory Website</h2>';
    echo '<a href="index.php">Please try again</a>';
    return;
}

$query = 'SELECT email_address, pronouns, first_name, last_name, phone_number '
    . 'FROM clock_users '
    . 'WHERE email_address = ? AND password = SHA2(?,256)';

$db = getDB();
if (!$db) {
    echo '<h2>Sorry, login incorrect for the ' . htmlspecialchars($inventoryName, ENT_QUOTES, 'UTF-8') . ' Inventory Website</h2>';
    echo '<a href="index.php">Please try again</a>';
    return;
}

$stmt = $db->prepare($query);
$stmt->bind_param('ss', $emailAddress, $password);
$stmt->execute();
$stmt->bind_result($dbEmailAddress, $pronouns, $firstName, $lastName, $phoneNumber);
$fetched = $stmt->fetch();
$stmt->close();
$db->close();

if ($fetched) {
    $_SESSION['login'] = true;
    $_SESSION['emailAddress'] = $dbEmailAddress;
    $_SESSION['pronouns'] = $pronouns;
    $_SESSION['firstName'] = $firstName;
    $_SESSION['lastName'] = $lastName;
    $_SESSION['phoneNumber'] = $phoneNumber;
    header('Location: index.php');
    exit;
}

echo '<h2>Sorry, login incorrect for the ' . htmlspecialchars($inventoryName, ENT_QUOTES, 'UTF-8') . ' Inventory Website</h2>';
echo '<a href="index.php">Please try again</a>';
?>

