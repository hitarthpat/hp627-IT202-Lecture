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
<h2>Add New Clock</h2>
<form name="newclock" action="index.php" method="post">
  <table>
    <tr>
      <td><label for="clock_id">clock_id</label></td>
      <td><input id="clock_id" type="text" name="clockID" size="10"></td>
    </tr>
    <tr>
      <td><label for="clock_code">clock_code</label></td>
      <td><input id="clock_code" type="text" name="clockCode" size="20"></td>
    </tr>
    <tr>
      <td><label for="clock_name">clock_name</label></td>
      <td><input id="clock_name" type="text" name="clockName" size="40"></td>
    </tr>
    <tr>
      <td><label for="clock_description">clock_description</label></td>
      <td><textarea id="clock_description" name="clockDescription" rows="5" cols="50"></textarea></td>
    </tr>
    <tr>
      <td><label for="clock_style">clock_style</label></td>
      <td><input id="clock_style" type="text" name="clockStyle" size="30"></td>
    </tr>
    <tr>
      <td><label for="clock_power_source">clock_power_source</label></td>
      <td><input id="clock_power_source" type="text" name="clockPowerSource" size="30"></td>
    </tr>
    <tr>
      <td><label for="clock_type_id">clock_type_id</label></td>
      <td><input id="clock_type_id" type="text" name="clockTypeID" size="10"></td>
    </tr>
    <tr>
      <td><label for="clock_buy_price">clock_buy_price</label></td>
      <td><input id="clock_buy_price" type="text" name="clockBuyPrice" size="12"></td>
    </tr>
    <tr>
      <td><label for="clock_sell_price">clock_sell_price</label></td>
      <td><input id="clock_sell_price" type="text" name="clockSellPrice" size="12"></td>
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
    <input type="submit" value="Submit New Clock">
    <input type="hidden" name="content" value="addclock">
  </p>
</form>
