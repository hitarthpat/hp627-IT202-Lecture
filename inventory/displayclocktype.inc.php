<?php
/*
 Student Name: Hitarth Patel
 Date: March 10, 2026
 Course: IT202 Section 002
 Assignment: Phase 3 - HTML Website Layout
 Email: hp627@njit.edu
*/
require_once __DIR__ . '/clocktype.php';
require_once __DIR__ . '/clock.php';

$clockTypeID = trim((string)($_REQUEST['clockTypeID'] ?? ''));
?>
<h2>Search for Clock Type</h2>
<?php
if ($clockTypeID === '' || !is_numeric($clockTypeID)) {
?>
  <p>Please enter a numeric clock type ID to view.</p>
  <p><a href="index.php?content=listclocktypes">Return to List Clock Types</a></p>
<?php
    return;
}

$clockType = ClockType::findClockType((int)$clockTypeID);
if (!$clockType) {
?>
  <p>Sorry, clock type <?php echo safeText($clockTypeID); ?> was not found.</p>
  <p><a href="index.php?content=listclocktypes">Return to List Clock Types</a></p>
<?php
    return;
}

$clocks = Clock::getClocksByType((int)$clockTypeID);
?>
<section>
  <p><strong>clock_type_id:</strong> <?php echo safeText((string)$clockType->clock_type_id); ?></p>
  <p><strong>clock_type_code:</strong> <?php echo safeText($clockType->clock_type_code); ?></p>
  <p><strong>clock_type_name:</strong> <?php echo safeText($clockType->clock_type_name); ?></p>
  <p><strong>clock_aisle_number:</strong> <?php echo safeText($clockType->clock_aisle_number); ?></p>
</section>

<?php
if ($clocks) {
?>
  <h3>Clocks for This Clock Type</h3>
  <table border="1">
    <tr>
      <th>clock_id</th>
      <th>clock_code</th>
      <th>clock_name</th>
      <th>clock_style</th>
      <th>clock_power_source</th>
      <th>clock_buy_price</th>
      <th>clock_sell_price</th>
    </tr>
    <?php
    foreach ($clocks as $clock) {
    ?>
      <tr>
        <td><?php echo safeText((string)$clock->clock_id); ?></td>
        <td><?php echo safeText($clock->clock_code); ?></td>
        <td><?php echo safeText($clock->clock_name); ?></td>
        <td><?php echo safeText($clock->clock_style); ?></td>
        <td><?php echo safeText($clock->clock_power_source); ?></td>
        <td><?php echo safeText('$' . formatMoney($clock->clock_buy_price)); ?></td>
        <td><?php echo safeText('$' . formatMoney($clock->clock_sell_price)); ?></td>
      </tr>
    <?php
    }
    ?>
  </table>
<?php
} else {
?>
  <p>There are no clocks for this clock type.</p>
<?php
}
?>
