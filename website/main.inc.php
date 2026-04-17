<?php
/*
 Student Name: Hitarth Patel
 Date: April 17, 2026
 Course: IT202 Section 002
 Assignment: Phase 5 - JavaScript and AJAX
 Email: hp627@njit.edu
*/
if (empty($_SESSION['login'])) {
?>
  <section class="content-panel hero-grid">
    <div>
      <h2>Please Login to the <?php echo safeText($inventoryName); ?> Inventory Website</h2>
      <p>This phase 5 version adds JavaScript event handling, live AJAX inventory totals, and full view, update, and delete workflows for clock types and clocks.</p>
      <p>Sign in first to review clock types, add new clocks, test the JavaScript buttons, and verify the real-time inventory values required in the assignment.</p>
      <div class="highlight-grid">
        <article class="highlight-card">
          <h3>JavaScript</h3>
          <p>The list pages now use event-driven buttons for view, update, and delete actions.</p>
        </article>
        <article class="highlight-card">
          <h3>AJAX</h3>
          <p>The dashboard refreshes type count, item count, and price totals without reloading the page.</p>
        </article>
        <article class="highlight-card">
          <h3>Validation</h3>
          <p>Clock type and clock forms still use HTML limits and server-side filters together.</p>
        </article>
      </div>
    </div>
    <img class="hero-visual" src="images/clock-showcase.svg" alt="Illustrated display of wall, digital, and alarm clocks">
  </section>

  <section class="content-panel">
    <h2>Account Login</h2>
    <p class="help-text">Use one of the seeded user accounts from your earlier project phases to continue.</p>
    <form name="login" class="site-form" action="index.php" method="post">
      <table>
        <tr>
          <td><label for="email_address">Email Address</label></td>
          <td><input id="email_address" type="email" name="email_address" size="30" required autocomplete="username" placeholder="name@example.com"></td>
        </tr>
        <tr>
          <td><label for="password">Password</label></td>
          <td><input id="password" type="password" name="password" size="30" required autocomplete="current-password" minlength="8" maxlength="64"></td>
        </tr>
      </table>
      <div class="button-row">
        <input type="submit" value="Login">
      </div>
      <input type="hidden" name="content" value="validate">
    </form>
  </section>
<?php
} else {
    $firstName = $_SESSION['firstName'] ?? '';
    $lastName = $_SESSION['lastName'] ?? '';
    $pronouns = $_SESSION['pronouns'] ?? '';
    $emailAddress = $_SESSION['emailAddress'] ?? '';
    $phoneNumber = $_SESSION['phoneNumber'] ?? '';
?>
  <section class="content-panel hero-grid">
    <div>
      <h2>Welcome to Clock Inventory Studio</h2>
      <p>Welcome <?php echo safeText(trim($firstName . ' ' . $lastName)); ?> (<?php echo safeText($pronouns); ?>).</p>
      <p>This collection tracks Wall, Digital, and Alarm clocks. Each record stores style, power source, clock type, and pricing details for a consistent catalog workflow.</p>
      <div class="highlight-grid">
        <article class="highlight-card">
          <h3>List and View</h3>
          <p>Review the current clock types and clocks, then open the selected record with the JavaScript buttons.</p>
        </article>
        <article class="highlight-card">
          <h3>Update and Delete</h3>
          <p>Update clock types, update clocks, and remove records using the complete Phase 5 workflow.</p>
        </article>
        <article class="highlight-card">
          <h3>Real Time Info</h3>
          <p>Use the AJAX panel below to monitor type count, item count, and the buy and sell totals in real time.</p>
        </article>
      </div>
    </div>
    <img class="hero-visual" src="images/clock-showcase.svg" alt="Clock catalog illustration showing different clock styles">
  </section>

  <section class="content-panel">
    <h2>Account Summary</h2>
    <div class="dashboard-grid">
      <article class="detail-card">
        <strong>Full Name</strong>
        <span><?php echo safeText(trim($firstName . ' ' . $lastName)); ?></span>
      </article>
      <article class="detail-card">
        <strong>Email Address</strong>
        <span><?php echo safeText($emailAddress); ?></span>
      </article>
      <article class="detail-card">
        <strong>Pronouns</strong>
        <span><?php echo safeText($pronouns); ?></span>
      </article>
      <article class="detail-card">
        <strong>Phone Number</strong>
        <span><?php echo safeText($phoneNumber); ?></span>
      </article>
    </div>
  </section>

  <section class="content-panel">
    <div class="panel-header-row">
      <div>
        <h2>Real Time Inventory Info (AJAX)</h2>
        <p class="supporting-text">The values below are refreshed with JavaScript AJAX from the current database records without reloading the full page.</p>
      </div>
      <button type="button" id="refresh_inventory_button" class="secondary-action">Refresh Totals</button>
    </div>
    <div id="inventory_summary_panel" class="inventory-summary-grid" data-endpoint="inventoryinfo.php">
      <article class="stat-card">
        <span class="stat-label">Type Count</span>
        <strong id="type_count_value" class="stat-value">--</strong>
      </article>
      <article class="stat-card">
        <span class="stat-label">Item Count</span>
        <strong id="item_count_value" class="stat-value">--</strong>
      </article>
      <article class="stat-card">
        <span class="stat-label">Buy Price Total</span>
        <strong id="buy_price_total_value" class="stat-value">--</strong>
      </article>
      <article class="stat-card">
        <span class="stat-label">Sell Price Total</span>
        <strong id="sell_price_total_value" class="stat-value">--</strong>
      </article>
    </div>
    <p id="inventory_summary_status" class="help-text summary-status">Waiting for AJAX response...</p>
  </section>
<?php
}
?>

