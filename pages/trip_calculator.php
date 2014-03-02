<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Road Trip Planner</title>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
		<script src="../js/bootstrap.js"></script>
		
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
		$GLOBALS['dbc'] = $dbc;
		?>
		
		<SCRIPT LANGUAGE="javascript">
<!--
function OnChange(dropdown)
{
    
	var myindex  = dropdown.selectedIndex
	document.getElementById('classpic').src="../images/"+dropdown.options[myindex].value+".png";
    
    return true;
}
//-->
</SCRIPT>
		
	</head>
	<body style="background-image:url('../images/retro.jpg')">
		
		<div class="container" style="background-color:white;padding:25px">
			
			<ul class="nav nav-pills nav-justified navbar-fixed-top">
	            <li><a href="../index.html">Home</a></li>
	            <li ><a href="gas_prices.php">FAQ & Stats</a></li>            
	            <li><a href="trip_calculator.php">Trip Cost Calculator</a></li>
	            <li><a href="about.php">About</a></li>
	            <li><a href="contact.php">Contact</a></li>
	        </ul>
			
			</br>
			</br>
			
			<div class="row">
				<div class="col-md-2" style="text-align:center;border-style:ridge;border-width:1px;margin-left: 20px;"> <h3> Instructions:</h3> </br> <p> Please select a vehicle class and fill in as much information from the drop down menus as needed/known.</br> When finished, click the search button and a table of results will be shown.  </p> </div>
				<div class="col-md-9 text-center"> <img src="../images/Select_A_Car.png" alt="..." class="img-rounded" id="classpic" width="500" height="250"> </div>
			
			</div>
			
			</br>
			
			</br>
			
			<form method="post" action="trip_calculator.php" class="form" role="form" style="padding:10px;border-style:ridge;border-width:3px;">
  <div class="form-group">
			
			<div class="row">
				<div class="col-md-3"> <p style="font-family:Comic Sans MS, cursive, sans-serif;"> Vehicle CLASS </p> </div>
				<div class="col-md-3">
					<?php
						$col = "CLASS";
						$q = "SELECT DISTINCT $col FROM $tableName ORDER BY $col";
						$r = mysql_query($q,$dbc);
						if($r)
						{
							echo "<select id=\"$col\" class=\"form-control\" onchange=\"OnChange(this.form.CLASS)\" name=\"$col\">\n";
							echo "<option selected value=\"\"> </option>\n";
											while ($row = mysql_fetch_array($r))
											{
												echo "<option value=\"{$row[$col]}\">{$row[$col]}</option>\n";
											}
														echo "</select>\n";
						}
					?>
				</div>
				
				<div class="col-md-3"> <p style="font-family:Comic Sans MS, cursive, sans-serif;"> Engine Size </p> </div>
				<div class="col-md-3">
					<?php
						$col = "ENG";
						$q = "SELECT DISTINCT $col FROM $tableName ORDER BY $col";
						$r = mysql_query($q,$dbc);
						if($r)
						{
							echo "<select id=\"$col\" class=\"form-control\" name=\"$col\">\n";

							echo "<option selected value=\"\"> </option>\n";
											while ($row = mysql_fetch_array($r))
											{
											echo "<option value=\"{$row[$col]}\">{$row[$col]}</option>\n";
											}
														echo "</select>";
						}
					?>
					
				</div>
			</div>
			
			</br>
			
			<div class="row">
				<div class="col-md-3"> <p style="font-family:Comic Sans MS, cursive, sans-serif;"> BRAND </p> </div>
				<div class="col-md-3">
					<?php
					$col = "BRAND";
					$q = "SELECT DISTINCT $col FROM $tableName ORDER BY $col";
					$r = mysql_query($q,$dbc);
					if($r)
					{
						echo "<select id=\"$col\" class=\"form-control\" name=\"$col\">\n";
									
							echo "<option selected value=\"\"> </option>\n";
										while ($row = mysql_fetch_array($r))
										{
											echo "<option value=\"{$row[$col]}\">{$row[$col]}</option>\n";
										}
											echo "</select>";
									}
					?>
				</div>
				</br>
				<div class="col-md-3"> <p style="font-family:Comic Sans MS, cursive, sans-serif;"> CYLINDERS </p> </div>
				<div class="col-md-3">
					<?php
					$col = "CYLINDERS";
					$q = "SELECT DISTINCT $col FROM $tableName ORDER BY $col";
					$r = mysql_query($q,$dbc);
					if($r)
					{
					echo "<select id=\"$col\" class=\"form-control\" name=\"$col\">\n";
								
							echo "<option class=\"form-control\" selected value=\"\"> </option>\n";
									while ($row = mysql_fetch_array($r))
									{
									echo "<option value=\"{$row[$col]}\">{$row[$col]}</option>\n";
									}
										echo "</select>";
								}
					?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"> <p style="font-family:Comic Sans MS, cursive, sans-serif;"> TRANSMISSION </p> </div>
				<div class="col-md-3">
					<?php
					$col = "TRANS";
					$q = "SELECT DISTINCT $col FROM $tableName ORDER BY $col";
					$r = mysql_query($q,$dbc);
					if($r)
					{
						echo "<select id=\"$col\" class=\"form-control\" name=\"$col\">\n";
									
							echo "<option selected value=\"\"> </option>\n";
										while ($row = mysql_fetch_array($r))
										{
											echo "<option value=\"{$row[$col]}\">{$row[$col]}</option>\n";
										}
									echo "</select>";
							}
					?>
				</div>
				</br>
				
				<div class="col-md-3"> <p style="font-family:Comic Sans MS, cursive, sans-serif;"> FUEL TYPE </p> </div>
				<div class="col-md-3">
					<?php
					$col = "FUEL";
					$q = "SELECT DISTINCT $col FROM $tableName ORDER BY $col";
					$r = mysql_query($q,$dbc);
					if($r)
					{
					echo "<select id=\"$col\" class=\"form-control\" name=\"$col\">\n";

							echo "<option selected value=\"\"> </option>\n";
									while ($row = mysql_fetch_array($r))
									{
									echo "<option value=\"{$row[$col]}\">{$row[$col]}</option>\n";
									}
								echo "</select>";
						}
					?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"> <p style="font-family:Comic Sans MS, cursive, sans-serif;"> MODEL </p> </div>
				<div class="col-md-3">
					<?php
					$col = "MODEL";
					$q = "SELECT DISTINCT $col FROM $tableName ORDER BY $col";
					$r = mysql_query($q,$dbc);
					if($r)
					{
						echo "<select id=\"$col\" class=\"form-control\" name=\"$col\">\n";
							echo "<option selected value=\"\"> </option>\n";
										while ($row = mysql_fetch_array($r))
										{
											echo "<option value=\"{$row[$col]}\">{$row[$col]}</option>\n";
										}
							echo "</select>";
					}
					?>
				</div>
			</div>
			</br>
			</br>

			<button type="submit" name="Search" value="Search" class="btn btn-info col-md-12" style="font-weight:bold;">Search</button>

			</br>
			</br>
			</div>
			</form>
			<?php
			if (isset($_POST['Search'])) {
				DEFINE ('DB_USER', 'cs4477216');
				DEFINE ('DB_PASSWORD', 'malQuic7');
				DEFINE ('DB_HOST', 'localhost');
				DEFINE ('DB_NAME', 'cs4477216');
				$tableName = "FUELDATA";
				$dbc = @mysql_connect(DB_HOST, DB_USER, DB_PASSWORD)
				OR die ('Could not connect to MySQL: ' . mysql_connect_error());
				$db = @mysql_select_db(DB_NAME,$dbc);
				mysql_set_charset('utf8',$dbc);

				$model = $_POST["MODEL"];
				$class = $_POST["CLASS"];
				$eng = $_POST["ENG"];
				$trans = $_POST["TRANS"];
				$cyl = $_POST["CYLINDERS"];
				$fuel = $_POST["FUEL"];
				$q = "SELECT BRAND, MODEL, CITY(L), HWY(L), FUEL(L/YR), CO2 FROM FUELDATA";
				//$q = "SELECT * FROM $tableName WHERE ";
				/*if ($model) {
					$q .= "MODEL=$model ";
				} 
				if ($class) {
					$q .= ""
				} && $eng && $trans && $cyl && $fuel)
					//TODO: change to reflect 
					$q .= 1;
				else */
					//$q .= 1;

				echo "SUCCESS!!!";
				$r = mysql_query($q,$dbc) or die("mysql_query FAILED");
				if($r)
				{
					echo  "SUCCESS!!!!!!!!!!!!!!!!!!!!!";
					echo "<select class=\"form-control\" name=\"$tableName\">\n";

					echo "<table class=\"table table-striped\" name=\"results\">\n";
					echo "<tr>\n";
					echo "<td>{BRAND}</td>\n";
					echo "<td>{MODEL}</td>\n";
					echo "<td>{CITY (L/100Km)}</td>\n";
					echo "<td>{HWY (L/100Km)}</td>\n";
					echo "<td>{FUEL L/YEAR}</td>\n";
					echo "<td>{CO2}</td>\n";
					echo "</tr>\n";		
						echo "<tr>";
						while ($row = mysql_fetch_array($r))
						{
							echo "<tr>\n";
							echo "<td>{$row['BRAND']}</td>\n";
							echo "<td>{$row['MODEL']}</td>\n";
							echo "<td>{$row['CITY(L)']}</td>\n";
							echo "<td>{$row['HWY(L)']}</td>\n";
							echo "<td>{$row['FUEL(L/YR)']}</td>\n";
							echo "<td>{$row['CO2']}</td>\n";
							echo "</tr>\n";
						}
						echo "</table>\n";
				}
			}
			?>
			</br>
			</br>
			</br>
			</br>
			
			<footer>
				<p>&copy; carribeanada 2014</p>
			</footer>
		</div>