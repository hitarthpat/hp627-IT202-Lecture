<?php
/*
 Student Name: Hitarth Patel
 Date: April 17, 2026
 Course: IT202 Section 002
 Assignment: Phase 5 - JavaScript and AJAX
 Email: hp627@njit.edu
*/
require_once __DIR__ . '/database.php';

$inventoryName = 'Clock';
$emailAddress = postString('email_address');
$password = postString('password');

if ($emailAddress === '' || $password === '') {
    echo '<section class="message-panel error-panel">';
    echo '<h2>Sorry, login could not be completed.</h2>';
    echo '<p>Please enter both an email address and a password before submitting the form.</p>';
    echo '<p><a class="button-link secondary" href="index.php">Please try again</a></p>';
    echo '</section>';
    return;
}

$validatedEmailAddress = filter_var($emailAddress, FILTER_VALIDATE_EMAIL);
if ($validatedEmailAddress === false) {
    echo '<section class="message-panel error-panel">';
    echo '<h2>Sorry, login could not be completed.</h2>';
    echo '<p>The email address format is invalid. Enter a value such as name@example.com and try again.</p>';
    echo '<p><a class="button-link secondary" href="index.php">Return to Login</a></p>';
    echo '</section>';
    return;
}
$emailAddress = $validatedEmailAddress;

$query = 'SELECT email_address, pronouns, first_name, last_name, phone_number '
    . 'FROM clock_users '
    . 'WHERE email_address = ? AND password = SHA2(?,256)';

$db = getDB();
if (!$db) {
    echo '<section class="message-panel error-panel">';
    echo '<h2>Sorry, login could not be completed.</h2>';
    echo '<p>The database connection was unavailable while validating your account.</p>';
    echo '<p><a class="button-link secondary" href="index.php">Please try again</a></p>';
    echo '</section>';
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

echo '<section class="message-panel error-panel">';
echo '<h2>Sorry, login incorrect for the ' . htmlspecialchars($inventoryName, ENT_QUOTES, 'UTF-8') . ' Inventory Website</h2>';
echo '<p>The email address and password combination did not match an approved user account.</p>';
echo '<p><a class="button-link secondary" href="index.php">Please try again</a></p>';
echo '</section>';
?>

