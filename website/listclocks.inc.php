<?php
/*
 Student Name: Hitarth Patel
 Date: April 17, 2026
 Course: IT202 Section 002
 Assignment: Phase 5 - JavaScript and AJAX
 Email: hp627@njit.edu
*/
require_once __DIR__ . '/clock.php';

$clocks = Clock::getClocks();
?>
<section class="content-panel">
  <h2>List Clocks</h2>
  <?php
  if ($clocks) {
  ?>
    <p class="supporting-text">All visible values are formatted and safely encoded. Use the JavaScript buttons below to view, update, or delete the selected clock record. Total clocks: <?php echo safeText((string)count($clocks)); ?>.</p>
    <form id="clock_action_form" name="clocks" method="post" data-entity="clock">
      <div class="list-box">
        <select name="clockID" size="12">
          <?php
          $first = true;
          foreach ($clocks as $clock) {
              $clockID = (string)$clock->clock_id;
              $clockTypeID = $clock->clock_type_id === null ? 'None' : (string)$clock->clock_type_id;
              $optionText = $clockID
                  . ' - '
                  . $clock->clock_code
                  . ', '
                  . $clock->clock_name
                  . ', Type: '
                  . $clockTypeID
                  . ', Buy: $'
                  . formatMoney($clock->clock_buy_price)
                  . ', Sell: $'
                  . formatMoney($clock->clock_sell_price);
              ?>
              <option value="<?php echo safeText($clockID); ?>"<?php echo $first ? ' selected' : ''; ?>>
                <?php echo safeText($optionText); ?>
              </option>
              <?php
              $first = false;
          }
          ?>
        </select>
      </div>
      <div class="button-row action-toolbar">
        <button type="button" data-action="view">View Item</button>
        <button type="button" data-action="update">Update Item</button>
        <button type="button" data-action="delete" class="secondary">Delete Item</button>
      </div>
      <noscript>
        <p class="help-text">JavaScript is required for the Phase 5 item action buttons.</p>
      </noscript>
    </form>
  <?php
  } else {
  ?>
    <p>No clocks found.</p>
  <?php
  }
  ?>
</section>
