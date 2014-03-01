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
		$tableName = "FUELDATA";

		$dbc = @mysql_connect (DB_HOST, DB_USER, DB_PASSWORD) 
		OR die ('Could not connect to MySQL: ' . mysql_connect_error());

		$db = @mysql_select_db(DB_NAME,$dbc);

		// $query = "SELECT YR FROM FUELDATA";

		// $result = @mysql_query($query, $dbc) or die("Couldn't execute query.");
		// $row = mysql_fetch_array($result);
		// echo $row[''];
		mysql_set_charset('utf8',$dbc);

		$q = "SELECT DISTINCT CLASS FROM $tableName";
		$r = mysql_query($q,$dbc);

		if($r)
		{
			echo "<select id=\"$col\">\n";
			while ($row = mysql_fetch_array($r))
			{
				echo "<option value=\"{$row['CLASS']}\">{$row['CLASS']}</option>\n";
			}
		} else
		echo "result is false";
		?>

	</head>
	<body>
	</body>
</html>