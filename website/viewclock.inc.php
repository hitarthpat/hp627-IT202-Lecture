<?php
/*
 Student Name: Hitarth Patel
 Date: April 17, 2026
 Course: IT202 Section 002
 Assignment: Phase 5 - JavaScript and AJAX
 Email: hp627@njit.edu
*/
require_once __DIR__ . '/clock.php';
require_once __DIR__ . '/clocktype.php';

$clockID = requestInt('clockID');
?>
<?php
if ($clockID === null) {
?>
  <section class="message-panel error-panel">
    <h2>View Item</h2>
    <p>Please enter a numeric clock ID to view.</p>
    <p><a class="button-link secondary" href="index.php?content=listclocks">Return to List Clocks</a></p>
  </section>
<?php
    return;
}

$clock = Clock::findClock($clockID);
if (!$clock) {
?>
  <section class="message-panel error-panel">
    <h2>View Item</h2>
    <p>Sorry, clock <?php echo safeText((string)$clockID); ?> was not found.</p>
    <p><a class="button-link secondary" href="index.php?content=listclocks">Return to List Clocks</a></p>
  </section>
<?php
    return;
}

$clockType = ClockType::findClockType((int)$clock->clock_type_id);
?>
<section class="content-panel">
  <h2>View Item</h2>
  <p class="supporting-text">This page displays the selected clock item and its current clock type assignment.</p>
  <div class="detail-grid">
    <article class="detail-card">
      <strong>clock_id</strong>
      <span><?php echo safeText((string)$clock->clock_id); ?></span>
    </article>
    <article class="detail-card">
      <strong>clock_code</strong>
      <span><?php echo safeText($clock->clock_code); ?></span>
    </article>
    <article class="detail-card">
      <strong>clock_name</strong>
      <span><?php echo safeText($clock->clock_name); ?></span>
    </article>
    <article class="detail-card">
      <strong>clock_style</strong>
      <span><?php echo safeText($clock->clock_style); ?></span>
    </article>
    <article class="detail-card">
      <strong>clock_power_source</strong>
      <span><?php echo safeText($clock->clock_power_source); ?></span>
    </article>
    <article class="detail-card">
      <strong>clock_type</strong>
      <span><?php echo safeText($clockType ? ($clockType->clock_type_id . ' - ' . $clockType->clock_type_name) : (string)$clock->clock_type_id); ?></span>
    </article>
    <article class="detail-card">
      <strong>clock_buy_price</strong>
      <span><?php echo safeText('$' . formatMoney($clock->clock_buy_price)); ?></span>
    </article>
    <article class="detail-card">
      <strong>clock_sell_price</strong>
      <span><?php echo safeText('$' . formatMoney($clock->clock_sell_price)); ?></span>
    </article>
  </div>
</section>

<section class="content-panel">
  <h3>Item Description</h3>
  <p><?php echo nl2br(safeText($clock->clock_description)); ?></p>
  <div class="button-row">
    <a class="button-link" href="index.php?content=updateclock&amp;clockID=<?php echo safeText((string)$clock->clock_id); ?>">Update Item</a>
    <a class="button-link secondary" href="index.php?content=listclocks">Return to List Clocks</a>
  </div>
</section>
