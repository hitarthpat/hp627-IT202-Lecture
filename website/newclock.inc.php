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
  <h2>Add New Clock</h2>
  <p class="supporting-text">The item form now enforces the phase 4 HTML requirements for numeric ranges, field lengths, and decimal price entry.</p>
  <form name="newclock" class="site-form" action="index.php" method="post">
    <table>
      <tr>
        <td><label for="clock_id">clock_id</label></td>
        <td><input id="clock_id" type="number" name="clockID" min="1" max="999999" step="1" required></td>
      </tr>
      <tr>
        <td><label for="clock_code">clock_code</label></td>
        <td><input id="clock_code" type="text" name="clockCode" size="20" minlength="2" maxlength="10" required></td>
      </tr>
      <tr>
        <td><label for="clock_name">clock_name</label></td>
        <td><input id="clock_name" type="text" name="clockName" size="40" minlength="10" maxlength="100" required></td>
      </tr>
      <tr>
        <td><label for="clock_description">clock_description</label></td>
        <td><textarea id="clock_description" name="clockDescription" rows="5" cols="50" minlength="100" maxlength="255" required></textarea></td>
      </tr>
      <tr>
        <td><label for="clock_style">clock_style</label></td>
        <td><input id="clock_style" type="text" name="clockStyle" size="30" minlength="3" maxlength="80" required></td>
      </tr>
      <tr>
        <td><label for="clock_power_source">clock_power_source</label></td>
        <td><input id="clock_power_source" type="text" name="clockPowerSource" size="30" minlength="3" maxlength="80" required></td>
      </tr>
      <tr>
        <td><label for="clock_type_id">clock_type_id</label></td>
        <td><input id="clock_type_id" type="number" name="clockTypeID" min="1" max="999999" step="1" required></td>
      </tr>
      <tr>
        <td><label for="clock_buy_price">clock_buy_price</label></td>
        <td><input id="clock_buy_price" type="number" name="clockBuyPrice" min="0.01" max="999999.99" step="0.01" required></td>
      </tr>
      <tr>
        <td><label for="clock_sell_price">clock_sell_price</label></td>
        <td><input id="clock_sell_price" type="number" name="clockSellPrice" min="0.01" max="999999.99" step="0.01" required></td>
      </tr>
    </table>
    <?php
    if ($clockTypes) {
    ?>
      <p class="help-text">Available clock_type_id values:
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
    <div class="button-row">
      <input type="submit" value="Submit New Clock">
    </div>
    <input type="hidden" name="content" value="addclock">
  </form>
</section>
