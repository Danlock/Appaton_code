<?php
			if (isset($_POST['Search'])) {
				echo "SUCCESS!!!!!!!!!!!!!!!!!!!!!";
				$model = $_POST["MODEL"];
				$class = $_POST["CLASS"];
				$eng = $_POST["ENG"];
				$trans = $_POST["TRANS"];
				$cyl = $_POST["CYLINDERS"];
				$fuel = $_POST["FUEL"];

				$q = "SELECT BRAND, MODEL, CITY(L), HWY(L), FUEL(L/YR), CO2 FROM $tableName WHERE ";
				if ($model) {
					$q .= "MODEL=$model ";
				} 
				if ($class) {
					$q .= ""
				} && $eng && $trans && $cyl && $fuel)
					//TODO: change to reflect 
					$q .= 1;
				else $q .= 1;

				$r = mysql_query($q,$dbc);
				if($r)
				{
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