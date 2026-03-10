<?php
/*
 Student Name: Hitarth Patel
 Date: March 10, 2026
 Course: IT202 Section 002
 Assignment: Phase 3 - HTML Website Layout
 Email: hp627@njit.edu
*/
?>
<h2>Add New Clock Type</h2>
<form name="newclocktype" action="index.php" method="post">
  <table>
    <tr>
      <td><label for="clock_type_id">clock_type_id</label></td>
      <td><input id="clock_type_id" type="text" name="clockTypeID" size="10"></td>
    </tr>
    <tr>
      <td><label for="clock_type_code">clock_type_code</label></td>
      <td><input id="clock_type_code" type="text" name="clockTypeCode" size="30"></td>
    </tr>
    <tr>
      <td><label for="clock_type_name">clock_type_name</label></td>
      <td><input id="clock_type_name" type="text" name="clockTypeName" size="30"></td>
    </tr>
    <tr>
      <td><label for="clock_aisle_number">clock_aisle_number</label></td>
      <td><input id="clock_aisle_number" type="text" name="clockAisleNumber" size="20"></td>
    </tr>
  </table>
  <p>
    <input type="submit" value="Submit New Clock Type">
    <input type="hidden" name="content" value="addclocktype">
  </p>
</form>
