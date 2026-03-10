<?php
/*
 Student Name: Hitarth Patel
 Date: March 10, 2026
 Course: IT202 Section 002
 Assignment: Phase 3 - HTML Website Layout
 Email: hp627@njit.edu
*/
if (empty($_SESSION['login'])) {
?>
  <h2>Please Login to the <?php echo safeText($inventoryName); ?> Inventory Website</h2>
  <p>This phase 3 website presents a complete clock catalog layout with search, listing, add, and update workflows.</p>
  <p>Please sign in first to access the clock type pages, the clock pages, and the search forms.</p>
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
  <p>Welcome <?php echo safeText(trim($firstName . ' ' . $lastName)); ?> (<?php echo safeText($pronouns); ?>).</p>
  <p>This collection tracks Wall, Digital, and Alarm clocks. Each record stores style, power source, clock type, and pricing information.</p>
  <p>Use the navigation links to list records, add new entries, and search for a specific clock or clock type.</p>
  <p>Email Address: <?php echo safeText($emailAddress); ?></p>
  <p>Phone Number: <?php echo safeText($phoneNumber); ?></p>
<?php
}
?>

