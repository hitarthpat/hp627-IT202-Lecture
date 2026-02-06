<?php
/*
 Student Name: Hitarth Patel
 Date: February 6, 2026
 Course: IT202 Section 002
 Assignment: Phase 1 - Login and Logout
 Email: hp627@njit.edu
*/
session_start();
$inventoryName = 'Clock';
$content = $_REQUEST['content'] ?? 'main';
$allowedContent = ['main', 'validate', 'logout'];
if (!in_array($content, $allowedContent, true)) {
    $content = 'main';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo htmlspecialchars($inventoryName, ENT_QUOTES, 'UTF-8'); ?> Inventory Website</title>
  <!--
    Student Name: Hitarth Patel
    Date: February 6, 2026
    Course: IT202 Section 002
    Assignment: Phase 1 - Login and Logout
    Email: hp627@njit.edu
  -->
</head>
<body>
  <?php include __DIR__ . '/' . $content . '.inc.php'; ?>
</body>
</html>

