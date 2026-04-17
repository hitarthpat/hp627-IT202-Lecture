<?php
/*
 Student Name: Hitarth Patel
 Date: April 17, 2026
 Course: IT202 Section 002
 Assignment: Phase 5 - JavaScript and AJAX
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
    <p class="supporting-text">Review the available clock type IDs before submitting a new clock record. Use the JavaScript buttons below to view, update, or delete the currently selected type. Total clock types: <?php echo safeText((string)count($clockTypes)); ?>.</p>
    <form id="clock_type_action_form" name="clocktypes" method="post" data-entity="clockType">
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
      <div class="button-row action-toolbar">
        <button type="button" data-action="view">View Type</button>
        <button type="button" data-action="update">Update Type</button>
        <button type="button" data-action="delete" class="secondary">Delete Type</button>
      </div>
      <noscript>
        <p class="help-text">JavaScript is required for the Phase 5 type action buttons.</p>
      </noscript>
    </form>
  <?php
  } else {
  ?>
    <p>No clock types found.</p>
  <?php
  }
  ?>
</section>
