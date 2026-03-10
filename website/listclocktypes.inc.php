<?php
/*
 Student Name: Hitarth Patel
 Date: March 10, 2026
 Course: IT202 Section 002
 Assignment: Phase 3 - HTML Website Layout
 Email: hp627@njit.edu
*/
require_once __DIR__ . '/clocktype.php';

$clockTypes = ClockType::getClockTypes();
?>
<h2>List Clock Types</h2>
<?php
if ($clockTypes) {
?>
  <form name="clocktypes" method="post">
    <select name="clockTypeID" size="12">
      <?php
      $first = true;
      foreach ($clockTypes as $clockType) {
          $clockTypeID = (string)$clockType->clock_type_id;
          $optionText = $clockTypeID
              . ' - '
              . $clockType->clock_type_code
              . ', '
              . $clockType->clock_type_name
              . ', Aisle: '
              . $clockType->clock_aisle_number;
          ?>
          <option value="<?php echo safeText($clockTypeID); ?>"<?php echo $first ? ' selected' : ''; ?>>
            <?php echo safeText($optionText); ?>
          </option>
          <?php
          $first = false;
      }
      ?>
    </select>
  </form>
<?php
} else {
?>
  <p>No clock types found.</p>
<?php
}
?>
