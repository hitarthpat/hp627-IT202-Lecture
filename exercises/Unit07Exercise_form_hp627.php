<?php
require_once('database.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>Unit 7 Exercise hp627</title>
</head>

<body>

<h1>My Bowling Team</h1>

<h4>Name: Hitarth Patel</h4>
<h4>UCID: hp627</h4>
<h4>Course and Section: IT-202-002 Internet Applications</h4>

<form name="games" action="Unit07Exercise_action_hp627.php" method="get">

<label>Bowler ID:</label>
<input type="number" name="bowlerid">

<br><br>

<input type="submit">

</form>

<br>

<?php
date_default_timezone_set("America/New_York");
echo "The date and time is " . date("D M j h:i:sa T Y");
?>

</body>
</html>