<?php
/*
 Student Name: Hitarth Patel
 Date: February 6, 2026
 Course: IT202 Section 002
 Assignment: Phase 1 - Login and Logout
 Email: hp627@njit.edu
*/
$inventoryName = 'Clock';

function safeText($value)
{
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

if (empty($_SESSION['login'])) {
?>
  <h2>Please Login to the <?php echo safeText($inventoryName); ?> Inventory Website</h2>
  <p>This website manages Wall, Digital, and Alarm clock inventory records.</p>
  <p>The clock inventory tracks each item's Style and Power Source.</p>
  <form name="login" action="index.php" method="post">
    <label for="email_address">Email Address:</label>
    <input id="email_address" type="text" name="email_address" size="30" required>
    <br><br>
    <label for="password">Password:</label>
    <input id="password" type="password" name="password" size="30" required>
    <br><br>
    <input type="submit" value="Login">
    <input type="hidden" name="content" value="validate">
  </form>
<?php
} else {
    $firstName = $_SESSION['firstName'] ?? '';
    $lastName = $_SESSION['lastName'] ?? '';
    $pronouns = $_SESSION['pronouns'] ?? '';
    $emailAddress = $_SESSION['emailAddress'] ?? '';
    $phoneNumber = $_SESSION['phoneNumber'] ?? '';
?>
  <h2>Welcome to Inventory Helper - <?php echo safeText($inventoryName); ?> Inventory Website</h2>
  <p>Welcome <?php echo safeText(trim($firstName . ' ' . $lastName)); ?> (<?php echo safeText($pronouns); ?>)</p>
  <p>Inventory Types: Wall, Digital, Alarm.</p>
  <p>Inventory Columns: Style, Power Source.</p>
  <p>Email Address: <?php echo safeText($emailAddress); ?></p>
  <p>Phone Number: <?php echo safeText($phoneNumber); ?></p>
  <a href="index.php?content=logout"><strong>Logout</strong></a>
<?php
}
?>

