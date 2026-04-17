<?php
/*
 Student Name: Hitarth Patel
 Date: April 17, 2026
 Course: IT202 Section 002
 Assignment: Phase 5 - JavaScript and AJAX
 Email: hp627@njit.edu
*/
session_start();
$inventoryName = 'Clock';
$assignmentName = 'Phase 5 - JavaScript and AJAX';
$content = $_REQUEST['content'] ?? 'main';
$allowedContent = [
    'main',
    'validate',
    'logout',
    'listclocktypes',
    'viewclocktype',
    'newclocktype',
    'addclocktype',
    'updateclocktype',
    'changeclocktype',
    'removeclocktype',
    'listclocks',
    'viewclock',
    'newclock',
    'addclock',
    'updateclock',
    'changeclock',
    'removeclock',
    'displayclocktype'
];
if (!in_array($content, $allowedContent, true)) {
    $content = 'main';
}

if (empty($_SESSION['login']) && !in_array($content, ['main', 'validate', 'logout'], true)) {
    $content = 'main';
}

if (!function_exists('safeText')) {
    function safeText($value)
    {
        return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
    }
}

if (!function_exists('formatMoney')) {
    function formatMoney($value)
    {
        return number_format((float)$value, 2, '.', ',');
    }
}

if (!function_exists('postString')) {
    function postString($key)
    {
        $value = filter_input(INPUT_POST, $key, FILTER_UNSAFE_RAW);
        return trim(is_string($value) ? $value : '');
    }
}

if (!function_exists('requestString')) {
    function requestString($key)
    {
        $postValue = filter_input(INPUT_POST, $key, FILTER_UNSAFE_RAW);
        if (is_string($postValue)) {
            return trim($postValue);
        }

        $getValue = filter_input(INPUT_GET, $key, FILTER_UNSAFE_RAW);
        return trim(is_string($getValue) ? $getValue : '');
    }
}

if (!function_exists('stringLengthBetween')) {
    function stringLengthBetween($value, $min, $max)
    {
        $length = strlen(trim((string)$value));
        return $length >= $min && $length <= $max;
    }
}

if (!function_exists('postInt')) {
    function postInt($key, $min = 1, $max = 999999)
    {
        $value = filter_input(
            INPUT_POST,
            $key,
            FILTER_VALIDATE_INT,
            array(
                'options' => array(
                    'min_range' => $min,
                    'max_range' => $max
                )
            )
        );

        return is_int($value) ? $value : null;
    }
}

if (!function_exists('requestInt')) {
    function requestInt($key, $min = 1, $max = 999999)
    {
        $postValue = filter_input(
            INPUT_POST,
            $key,
            FILTER_VALIDATE_INT,
            array(
                'options' => array(
                    'min_range' => $min,
                    'max_range' => $max
                )
            )
        );
        if (is_int($postValue)) {
            return $postValue;
        }

        $getValue = filter_input(
            INPUT_GET,
            $key,
            FILTER_VALIDATE_INT,
            array(
                'options' => array(
                    'min_range' => $min,
                    'max_range' => $max
                )
            )
        );

        return is_int($getValue) ? $getValue : null;
    }
}

if (!function_exists('postFloat')) {
    function postFloat($key, $min = 0.01, $max = 999999.99)
    {
        $value = filter_input(INPUT_POST, $key, FILTER_VALIDATE_FLOAT);
        if ($value === false || $value === null) {
            return null;
        }

        $value = (float)$value;
        if (!is_float($value) || $value < $min || $value > $max) {
            return null;
        }

        return $value;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo safeText($inventoryName); ?> Inventory Website</title>
  <meta name="description" content="Clock Inventory Studio provides secure login, JavaScript action buttons, live AJAX inventory totals, and validated catalog workflows for the IT202 Phase 5 assignment.">
  <link rel="icon" type="image/svg+xml" href="images/favicon.svg">
  <!--
    Student Name: Hitarth Patel
    Date: April 17, 2026
    Course: IT202 Section 002
    Assignment: Phase 5 - JavaScript and AJAX
    Email: hp627@njit.edu
  -->
  <link rel="stylesheet" href="ih_styles.css">
  <script src="inventory.js" defer></script>
</head>
<body>
  <div class="page-shell<?php echo empty($_SESSION['login']) ? ' full-width' : ''; ?>">
    <header>
      <?php include __DIR__ . '/header.inc.php'; ?>
    </header>
    <nav>
      <?php include __DIR__ . '/nav.inc.php'; ?>
    </nav>
    <main>
      <?php include __DIR__ . '/' . $content . '.inc.php'; ?>
    </main>
    <footer>
      <?php include __DIR__ . '/footer.inc.php'; ?>
    </footer>
  </div>
</body>
</html>

