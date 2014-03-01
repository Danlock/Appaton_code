<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Road Trip Planner</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
		<script scr="js/bootstrap.js"></script>
		<?php

		DEFINE ('DB_USER', 'cs4477216');
		DEFINE ('DB_PASSWORD', 'malQuic7');
		DEFINE ('DB_HOST', 'localhost');
		DEFINE ('DB_NAME', 'cs4477216');
		$tableName = "FUEL CONSUMPTION DATA";

		$dbc = @mysql_connect (DB_HOST, DB_USER, DB_PASSWORD) 
		OR die ('Could not connect to MySQL: ' . mysql_connect_error());

		$db = @mysql_select_db(DB_NAME,$dbc);

		$query = "SELECT YR FROM FUELDATA";

		$result = @mysql_query($query, $connection) or die("Couldn't execute query.");
		echo $result;

		?>

	</head>
	<body>
	</body>
</html>
<!-- 		// mysql_set_charset($dbc, 'utf8');

// $q = "SELECT * FROM categories";
// $r = mysql_query($dbc,$q);

// if($r)
// {
// 	//echo "<select name=\"category\">\n"
// 	while ($row = mysql_fetch_array($r, MYSQLI_ASSOC))
// 	{
// 		echo "<option value=\"{$row['cat_id']}\">{$row['name']}</option>\n";
// 	}
// } -->