<?php
/*
 Student Name: Hitarth Patel
 Date: March 10, 2026
 Course: IT202 Section 002
 Assignment: Phase 3 - HTML Website Layout
 Email: hp627@njit.edu
*/
session_start();
$inventoryName = 'Clock';
$content = $_REQUEST['content'] ?? 'main';
$allowedContent = [
    'main',
    'validate',
    'logout',
    'listclocktypes',
    'newclocktype',
    'addclocktype',
    'listclocks',
    'newclock',
    'addclock',
    'updateclock',
    'changeclock',
    'displayclocktype'
];
if (!in_array($content, $allowedContent, true)) {
    $content = 'main';
}

if (
    empty($_SESSION['login']) &&
    !in_array($content, ['main', 'validate', 'logout', 'addclocktype', 'addclock', 'changeclock'], true)
) {
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
        return number_format((float)$value, 2);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo safeText($inventoryName); ?> Inventory Website</title>
  <!--
    Student Name: Hitarth Patel
    Date: March 10, 2026
    Course: IT202 Section 002
    Assignment: Phase 3 - HTML Website Layout
    Email: hp627@njit.edu
  -->
  <style>
    body {
      font-family: Georgia, "Times New Roman", serif;
      margin: 0;
      background: #f6f1e8;
      color: #1e1a16;
    }
    .page-shell {
      max-width: 1200px;
      margin: 0 auto;
      min-height: 100vh;
      display: grid;
      grid-template-columns: 260px 1fr;
      grid-template-areas:
        "header header"
        "nav main"
        "footer footer";
      background: #fffaf2;
      box-shadow: 0 0 20px rgba(70, 49, 20, 0.08);
    }
    header {
      grid-area: header;
      padding: 2rem 2.25rem 1.25rem;
      background: linear-gradient(135deg, #e6c48c, #fff4db);
      border-bottom: 2px solid #d2b278;
    }
    nav {
      grid-area: nav;
      padding: 1.5rem;
      background: #efe2cb;
      border-right: 1px solid #d9bf96;
    }
    main {
      grid-area: main;
      padding: 1.75rem 2rem;
      min-height: 420px;
    }
    footer {
      grid-area: footer;
      padding: 1rem 2rem 1.5rem;
      background: #2e2219;
      color: #f8ead4;
    }
    h1, h2, h3 {
      margin-top: 0;
    }
    a {
      color: #6b3115;
    }
    form {
      margin: 1rem 0;
    }
    input, select, textarea, button {
      font: inherit;
      padding: 0.4rem 0.5rem;
      margin-top: 0.2rem;
    }
    table {
      border-collapse: collapse;
    }
    td, th {
      padding: 0.45rem 0.55rem;
      vertical-align: top;
    }
    .full-width {
      grid-template-columns: 1fr;
      grid-template-areas:
        "header"
        "main"
        "footer";
    }
    .full-width nav {
      display: none;
    }
    @media (max-width: 800px) {
      .page-shell {
        grid-template-columns: 1fr;
        grid-template-areas:
          "header"
          "nav"
          "main"
          "footer";
      }
      nav {
        border-right: 0;
        border-bottom: 1px solid #d9bf96;
      }
    }
  </style>
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

