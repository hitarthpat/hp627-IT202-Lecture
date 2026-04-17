<?php
/*
 Student Name: Hitarth Patel
 Date: April 17, 2026
 Course: IT202 Section 002
 Assignment: Phase 5 - JavaScript and AJAX
 Email: hp627@njit.edu
*/
require_once __DIR__ . '/clocktype.php';

$clockTypeID = requestInt('clockTypeID');
?>
<?php
if ($clockTypeID === null) {
?>
  <section class="message-panel error-panel">
    <h2>Update Type</h2>
    <p>Please enter a numeric clock type ID to update.</p>
    <p><a class="button-link secondary" href="index.php?content=listclocktypes">Return to List Clock Types</a></p>
  </section>
<?php
    return;
}

$clockType = ClockType::findClockType($clockTypeID);
if (!$clockType) {
?>
  <section class="message-panel error-panel">
    <h2>Update Type</h2>
    <p>Sorry, clock type <?php echo safeText((string)$clockTypeID); ?> was not found.</p>
    <p><a class="button-link secondary" href="index.php?content=listclocktypes">Return to List Clock Types</a></p>
  </section>
<?php
    return;
}
?>
<section class="content-panel">
  <h2>Update Type</h2>
  <p class="supporting-text">This form keeps the same Phase 4 sanitization and validation rules for clock type updates.</p>
  <form name="clocktypeupdate" class="site-form" action="index.php" method="post">
    <table>
      <tr>
        <td>clock_type_id</td>
        <td><?php echo safeText((string)$clockType->clock_type_id); ?></td>
      </tr>
      <tr>
        <td><label for="update_clock_type_code">clock_type_code</label></td>
        <td><input id="update_clock_type_code" type="text" name="clockTypeCode" value="<?php echo safeText($clockType->clock_type_code); ?>" minlength="2" maxlength="10" required></td>
      </tr>
      <tr>
        <td><label for="update_clock_type_name">clock_type_name</label></td>
        <td><input id="update_clock_type_name" type="text" name="clockTypeName" value="<?php echo safeText($clockType->clock_type_name); ?>" minlength="10" maxlength="100" required></td>
      </tr>
      <tr>
        <td><label for="update_clock_aisle_number">clock_aisle_number</label></td>
        <td><input id="update_clock_aisle_number" type="text" name="clockAisleNumber" value="<?php echo safeText($clockType->clock_aisle_number); ?>" minlength="2" maxlength="20" required></td>
      </tr>
    </table>
    <div class="button-row">
      <input type="submit" name="answer" value="Update Type">
      <input type="submit" name="answer" value="Cancel" class="secondary">
    </div>
    <input type="hidden" name="clockTypeID" value="<?php echo safeText((string)$clockType->clock_type_id); ?>">
    <input type="hidden" name="content" value="changeclocktype">
  </form>
</section>
