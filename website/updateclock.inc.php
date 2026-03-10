<?php
/*
 Student Name: Hitarth Patel
 Date: March 10, 2026
 Course: IT202 Section 002
 Assignment: Phase 3 - HTML Website Layout
 Email: hp627@njit.edu
*/
require_once __DIR__ . '/clock.php';
require_once __DIR__ . '/clocktype.php';

$clockID = trim((string)($_REQUEST['clockID'] ?? ''));
$clockTypes = ClockType::getClockTypes();
?>
<h2>Search for Clock</h2>
<?php
if ($clockID === '' || !is_numeric($clockID)) {
?>
  <p>Please enter a numeric clock ID to search.</p>
  <p><a href="index.php?content=listclocks">Return to List Clocks</a></p>
<?php
    return;
}

$clock = Clock::findClock((int)$clockID);
if (!$clock) {
?>
  <p>Sorry, clock <?php echo safeText($clockID); ?> was not found.</p>
  <p><a href="index.php?content=listclocks">Return to List Clocks</a></p>
<?php
    return;
}
?>
<form name="clockupdate" action="index.php" method="post">
  <table>
    <tr>
      <td>clock_id</td>
      <td><?php echo safeText((string)$clock->clock_id); ?></td>
    </tr>
    <tr>
      <td><label for="update_clock_code">clock_code</label></td>
      <td><input id="update_clock_code" type="text" name="clockCode" value="<?php echo safeText($clock->clock_code); ?>" size="20"></td>
    </tr>
    <tr>
      <td><label for="update_clock_name">clock_name</label></td>
      <td><input id="update_clock_name" type="text" name="clockName" value="<?php echo safeText($clock->clock_name); ?>" size="40"></td>
    </tr>
    <tr>
      <td><label for="update_clock_description">clock_description</label></td>
      <td><textarea id="update_clock_description" name="clockDescription" rows="5" cols="50"><?php echo safeText($clock->clock_description); ?></textarea></td>
    </tr>
    <tr>
      <td><label for="update_clock_style">clock_style</label></td>
      <td><input id="update_clock_style" type="text" name="clockStyle" value="<?php echo safeText($clock->clock_style); ?>" size="30"></td>
    </tr>
    <tr>
      <td><label for="update_clock_power_source">clock_power_source</label></td>
      <td><input id="update_clock_power_source" type="text" name="clockPowerSource" value="<?php echo safeText($clock->clock_power_source); ?>" size="30"></td>
    </tr>
    <tr>
      <td><label for="update_clock_type_id">clock_type_id</label></td>
      <td><input id="update_clock_type_id" type="text" name="clockTypeID" value="<?php echo safeText($clock->clock_type_id === null ? '' : (string)$clock->clock_type_id); ?>" size="10"></td>
    </tr>
    <tr>
      <td><label for="update_clock_buy_price">clock_buy_price</label></td>
      <td><input id="update_clock_buy_price" type="text" name="clockBuyPrice" value="<?php echo safeText((string)$clock->clock_buy_price); ?>" size="12"></td>
    </tr>
    <tr>
      <td><label for="update_clock_sell_price">clock_sell_price</label></td>
      <td><input id="update_clock_sell_price" type="text" name="clockSellPrice" value="<?php echo safeText((string)$clock->clock_sell_price); ?>" size="12"></td>
    </tr>
  </table>
  <?php
  if ($clockTypes) {
  ?>
    <p>Available clock_type_id values:
      <?php
      $typeLabels = array();
      foreach ($clockTypes as $clockType) {
          $typeLabels[] = $clockType->clock_type_id . ' (' . $clockType->clock_type_name . ')';
      }
      echo safeText(implode(', ', $typeLabels));
      ?>
    </p>
  <?php
  }
  ?>
  <p>
    <input type="submit" name="answer" value="Update Item">
    <input type="submit" name="answer" value="Cancel">
    <input type="hidden" name="clockID" value="<?php echo safeText((string)$clock->clock_id); ?>">
    <input type="hidden" name="content" value="changeclock">
  </p>
</form>
