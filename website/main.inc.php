<?php
/*
 Student Name: Hitarth Patel
 Date: April 1, 2026
 Course: IT202 Section 002
 Assignment: Phase 4 - Input Security and CSS Styling
 Email: hp627@njit.edu
*/
if (empty($_SESSION['login'])) {
?>
  <section class="content-panel hero-grid">
    <div>
      <h2>Please Login to the <?php echo safeText($inventoryName); ?> Inventory Website</h2>
      <p>This phase 4 version strengthens login filtering, safely encodes user input, and applies a complete external style sheet across the clock catalog website.</p>
      <p>Sign in first to review clock types, add new clocks, search by ID, and test the update workflow required in the assignment.</p>
      <div class="highlight-grid">
        <article class="highlight-card">
          <h3>Security</h3>
          <p>Email addresses are checked for valid format before login attempts continue.</p>
        </article>
        <article class="highlight-card">
          <h3>Styling</h3>
          <p>Every page uses a shared external CSS file, fixed layout sections, and a custom favicon.</p>
        </article>
        <article class="highlight-card">
          <h3>Validation</h3>
          <p>Clock type and clock forms now use HTML limits and server-side filters together.</p>
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
          <h3>List</h3>
          <p>Review the current clock types and clocks before inserting new records.</p>
        </article>
        <article class="highlight-card">
          <h3>Add</h3>
          <p>Use the validated forms to add a clock type or a fully described clock entry.</p>
        </article>
        <article class="highlight-card">
          <h3>Update</h3>
          <p>Search by clock ID to edit a record and confirm that encoded text still displays safely.</p>
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
<?php
}
?>

