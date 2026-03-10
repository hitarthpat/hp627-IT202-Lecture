<?php
/*
 Student Name: Hitarth Patel
 Date: March 10, 2026
 Course: IT202 Section 002
 Assignment: Phase 3 - HTML Website Layout
 Email: hp627@njit.edu
*/
if (!empty($_SESSION['login'])) {
    $fullName = trim(($_SESSION['firstName'] ?? '') . ' ' . ($_SESSION['lastName'] ?? ''));
?>
  <h3>Welcome</h3>
  <p><?php echo safeText($fullName); ?></p>
  <p><a href="index.php"><strong>Home</strong></a></p>
  <p><a href="index.php?content=listclocktypes"><strong>List Clock Types</strong></a></p>
  <p><a href="index.php?content=newclocktype"><strong>Add New Clock Type</strong></a></p>
  <p><a href="index.php?content=listclocks"><strong>List Clocks</strong></a></p>
  <p><a href="index.php?content=newclock"><strong>Add New Clock</strong></a></p>
  <p><a href="index.php?content=logout"><strong>Logout</strong></a></p>

  <form action="index.php" method="post">
    <label for="nav_clock_id"><strong>Search for Clock</strong></label><br>
    <input id="nav_clock_id" type="text" name="clockID" size="14">
    <input type="hidden" name="content" value="updateclock">
    <input type="submit" value="Find">
  </form>

  <form action="index.php" method="post">
    <label for="nav_clock_type_id"><strong>Search for Clock Type</strong></label><br>
    <input id="nav_clock_type_id" type="text" name="clockTypeID" size="14">
    <input type="hidden" name="content" value="displayclocktype">
    <input type="submit" value="Find">
  </form>
<?php
}
?>
