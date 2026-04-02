<?php
/*
 Student Name: Hitarth Patel
 Date: April 1, 2026
 Course: IT202 Section 002
 Assignment: Phase 4 - Input Security and CSS Styling
 Email: hp627@njit.edu
*/
require_once __DIR__ . '/clocktype.php';
require_once __DIR__ . '/clock.php';

$clockTypeID = requestInt('clockTypeID');
?>
<?php
if ($clockTypeID === null) {
?>
  <section class="message-panel error-panel">
    <h2>Search for Clock Type</h2>
    <p>Please enter a numeric clock type ID to view.</p>
    <p><a class="button-link secondary" href="index.php?content=listclocktypes">Return to List Clock Types</a></p>
  </section>
<?php
    return;
}

$clockType = ClockType::findClockType($clockTypeID);
if (!$clockType) {
?>
  <section class="message-panel error-panel">
    <h2>Search for Clock Type</h2>
    <p>Sorry, clock type <?php echo safeText((string)$clockTypeID); ?> was not found.</p>
    <p><a class="button-link secondary" href="index.php?content=listclocktypes">Return to List Clock Types</a></p>
  </section>
<?php
    return;
}

$clocks = Clock::getClocksByType($clockTypeID);
?>
<section class="content-panel">
  <h2>Clock Type Details</h2>
  <div class="detail-grid">
    <article class="detail-card">
      <strong>clock_type_id</strong>
      <span><?php echo safeText((string)$clockType->clock_type_id); ?></span>
    </article>
    <article class="detail-card">
      <strong>clock_type_code</strong>
      <span><?php echo safeText($clockType->clock_type_code); ?></span>
    </article>
    <article class="detail-card">
      <strong>clock_type_name</strong>
      <span><?php echo safeText($clockType->clock_type_name); ?></span>
    </article>
    <article class="detail-card">
      <strong>clock_aisle_number</strong>
      <span><?php echo safeText($clockType->clock_aisle_number); ?></span>
    </article>
  </div>
</section>

<?php
if ($clocks) {
?>
  <section class="content-panel">
    <h3>Clocks for This Clock Type</h3>
    <table>
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
  </section>
<?php
} else {
?>
  <section class="content-panel">
    <p>There are no clocks for this clock type.</p>
  </section>
<?php
}
?>
