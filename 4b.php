<?php
$directory = "localhost";
$user = "root";
$pass = "";
$db = "myproject";

$con = mysqli_connect($directory, $user, $pass, $db);

#failed connection
if (!$con) {
echo "Connection failed<br>";
}

$building = $_POST["Buildings"];

$query = sprintf
("SELECT FIRST_LAST_NAME, room_code FROM `renter` WHERE renter.room_code LIKE '$building%%' ORDER BY room_code ASC");

$result = mysqli_query($con, $query);
printf ("People who live in %s:", $building);
echo "<br><br>";

echo "<table><tr><th align = left>Name</th><th>Room</th></tr>";
	while($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
		$arrLength = count($row);	
		echo "<tr>";		
		for ($i = 0; $i < $arrLength; $i++) {
		echo "<td>";
		printf ("%s  ", $row[$i]);
		echo "</td>";
		}
		echo "</tr>";
			
	}
	echo "</table>";

mysqli_close($con);
?>