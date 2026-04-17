<?php
/*
 Student Name: Hitarth Patel
 Date: April 17, 2026
 Course: IT202 Section 002
 Assignment: Phase 5 - JavaScript and AJAX
 Email: hp627@njit.edu
*/
?>
<section class="content-panel">
  <h2>Add New Clock Type</h2>
  <p class="supporting-text">This Phase 5 form keeps the earlier browser-side validation and server-side filtering requirements for clock type records.</p>
  <form name="newclocktype" class="site-form" action="index.php" method="post">
    <table>
      <tr>
        <td><label for="clock_type_id">clock_type_id</label></td>
        <td><input id="clock_type_id" type="number" name="clockTypeID" min="1" max="999999" step="1" required></td>
      </tr>
      <tr>
        <td><label for="clock_type_code">clock_type_code</label></td>
        <td><input id="clock_type_code" type="text" name="clockTypeCode" size="30" minlength="2" maxlength="10" required placeholder="Example: WALL"></td>
      </tr>
      <tr>
        <td><label for="clock_type_name">clock_type_name</label></td>
        <td><input id="clock_type_name" type="text" name="clockTypeName" size="30" minlength="10" maxlength="100" required placeholder="Example: Modern Wall Clocks"></td>
      </tr>
      <tr>
        <td><label for="clock_aisle_number">clock_aisle_number</label></td>
        <td><input id="clock_aisle_number" type="text" name="clockAisleNumber" size="20" minlength="2" maxlength="20" required placeholder="Example: Aisle B3"></td>
      </tr>
    </table>
    <div class="button-row">
      <input type="submit" value="Submit New Clock Type">
    </div>
    <input type="hidden" name="content" value="addclocktype">
  </form>
</section>
