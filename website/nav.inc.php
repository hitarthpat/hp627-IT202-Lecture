<?php
/*
 Student Name: Hitarth Patel
 Date: April 1, 2026
 Course: IT202 Section 002
 Assignment: Phase 4 - Input Security and CSS Styling
 Email: hp627@njit.edu
*/
if (!empty($_SESSION['login'])) {
    $fullName = trim(($_SESSION['firstName'] ?? '') . ' ' . ($_SESSION['lastName'] ?? ''));
?>
  <h2 class="nav-title">Navigation</h2>
  <p class="nav-greeting">Signed in as <?php echo safeText($fullName); ?></p>

  <ul class="nav-list">
    <li><a href="index.php">Home Dashboard</a></li>
    <li><a href="index.php?content=listclocktypes">List Clock Types</a></li>
    <li><a href="index.php?content=newclocktype">Add New Clock Type</a></li>
    <li><a href="index.php?content=listclocks">List Clocks</a></li>
    <li><a href="index.php?content=newclock">Add New Clock</a></li>
    <li><a href="index.php?content=logout">Logout</a></li>
  </ul>

  <section class="nav-card-block">
    <h3>Search for Clock</h3>
    <p>Use a numeric clock ID to open the update page.</p>
    <form action="index.php" method="post">
      <label for="nav_clock_id">Clock ID</label>
      <input id="nav_clock_id" type="number" name="clockID" min="1" max="999999" step="1" required>
      <input type="hidden" name="content" value="updateclock">
      <div class="button-row">
        <input type="submit" value="Find Clock">
      </div>
    </form>
  </section>

  <section class="nav-card-block">
    <h3>Search for Clock Type</h3>
    <p>Use a numeric clock type ID to view matching clocks.</p>
    <form action="index.php" method="post">
      <label for="nav_clock_type_id">Clock Type ID</label>
      <input id="nav_clock_type_id" type="number" name="clockTypeID" min="1" max="999999" step="1" required>
      <input type="hidden" name="content" value="displayclocktype">
      <div class="button-row">
        <input type="submit" value="Find Clock Type">
      </div>
    </form>
  </section>
<?php
}
?>
