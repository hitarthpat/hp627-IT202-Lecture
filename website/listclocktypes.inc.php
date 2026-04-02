<?php
/*
 Student Name: Hitarth Patel
 Date: April 1, 2026
 Course: IT202 Section 002
 Assignment: Phase 4 - Input Security and CSS Styling
 Email: hp627@njit.edu
*/
require_once __DIR__ . '/clocktype.php';

$clockTypes = ClockType::getClockTypes();
?>
<section class="content-panel">
  <h2>List Clock Types</h2>
  <?php
  if ($clockTypes) {
  ?>
    <p class="supporting-text">Review the available clock type IDs before submitting a new clock record. Total clock types: <?php echo safeText((string)count($clockTypes)); ?>.</p>
    <form name="clocktypes" method="post">
      <div class="list-box">
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
      </div>
    </form>
  <?php
  } else {
  ?>
    <p>No clock types found.</p>
  <?php
  }
  ?>
</section>
