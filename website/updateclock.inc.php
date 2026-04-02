<?php
/*
 Student Name: Hitarth Patel
 Date: April 1, 2026
 Course: IT202 Section 002
 Assignment: Phase 4 - Input Security and CSS Styling
 Email: hp627@njit.edu
*/
require_once __DIR__ . '/clock.php';
require_once __DIR__ . '/clocktype.php';

$clockID = requestInt('clockID');
$clockTypes = ClockType::getClockTypes();
?>
<?php
if ($clockID === null) {
?>
  <section class="message-panel error-panel">
    <h2>Search for Clock</h2>
    <p>Please enter a numeric clock ID to search.</p>
    <p><a class="button-link secondary" href="index.php?content=listclocks">Return to List Clocks</a></p>
  </section>
<?php
    return;
}

$clock = Clock::findClock($clockID);
if (!$clock) {
?>
  <section class="message-panel error-panel">
    <h2>Search for Clock</h2>
    <p>Sorry, clock <?php echo safeText((string)$clockID); ?> was not found.</p>
    <p><a class="button-link secondary" href="index.php?content=listclocks">Return to List Clocks</a></p>
  </section>
<?php
    return;
}
?>
<section class="content-panel">
  <h2>Update Clock</h2>
  <p class="supporting-text">Review or change the selected clock. Any injected script text remains encoded inside the form fields and confirmation pages.</p>
  <form name="clockupdate" class="site-form" action="index.php" method="post">
    <table>
      <tr>
        <td>clock_id</td>
        <td><?php echo safeText((string)$clock->clock_id); ?></td>
      </tr>
      <tr>
        <td><label for="update_clock_code">clock_code</label></td>
        <td><input id="update_clock_code" type="text" name="clockCode" value="<?php echo safeText($clock->clock_code); ?>" size="20" minlength="2" maxlength="10" required></td>
      </tr>
      <tr>
        <td><label for="update_clock_name">clock_name</label></td>
        <td><input id="update_clock_name" type="text" name="clockName" value="<?php echo safeText($clock->clock_name); ?>" size="40" minlength="10" maxlength="100" required></td>
      </tr>
      <tr>
        <td><label for="update_clock_description">clock_description</label></td>
        <td><textarea id="update_clock_description" name="clockDescription" rows="5" cols="50" minlength="100" maxlength="255" required><?php echo safeText($clock->clock_description); ?></textarea></td>
      </tr>
      <tr>
        <td><label for="update_clock_style">clock_style</label></td>
        <td><input id="update_clock_style" type="text" name="clockStyle" value="<?php echo safeText($clock->clock_style); ?>" size="30" minlength="3" maxlength="80" required></td>
      </tr>
      <tr>
        <td><label for="update_clock_power_source">clock_power_source</label></td>
        <td><input id="update_clock_power_source" type="text" name="clockPowerSource" value="<?php echo safeText($clock->clock_power_source); ?>" size="30" minlength="3" maxlength="80" required></td>
      </tr>
      <tr>
        <td><label for="update_clock_type_id">clock_type_id</label></td>
        <td><input id="update_clock_type_id" type="number" name="clockTypeID" value="<?php echo safeText($clock->clock_type_id === null ? '' : (string)$clock->clock_type_id); ?>" min="1" max="999999" step="1" required></td>
      </tr>
      <tr>
        <td><label for="update_clock_buy_price">clock_buy_price</label></td>
        <td><input id="update_clock_buy_price" type="number" name="clockBuyPrice" value="<?php echo safeText((string)$clock->clock_buy_price); ?>" min="0.01" max="999999.99" step="0.01" required></td>
      </tr>
      <tr>
        <td><label for="update_clock_sell_price">clock_sell_price</label></td>
        <td><input id="update_clock_sell_price" type="number" name="clockSellPrice" value="<?php echo safeText((string)$clock->clock_sell_price); ?>" min="0.01" max="999999.99" step="0.01" required></td>
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
      <input type="submit" name="answer" value="Update Item">
      <input type="submit" name="answer" value="Cancel" class="secondary">
    </div>
    <input type="hidden" name="clockID" value="<?php echo safeText((string)$clock->clock_id); ?>">
    <input type="hidden" name="content" value="changeclock">
  </form>
</section>
