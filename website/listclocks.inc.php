<?php
/*
 Student Name: Hitarth Patel
 Date: March 10, 2026
 Course: IT202 Section 002
 Assignment: Phase 3 - HTML Website Layout
 Email: hp627@njit.edu
*/
require_once __DIR__ . '/clock.php';

$clocks = Clock::getClocks();
?>
<h2>List Clocks</h2>
<?php
if ($clocks) {
?>
  <form name="clocks" method="post">
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
  </form>
<?php
} else {
?>
  <p>No clocks found.</p>
<?php
}
?>
