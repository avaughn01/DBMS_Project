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

$min = $_POST["min_price"];	
$max = $_POST["max_price"];	

#query the database and store it in result
$query = sprintf
("SELECT room_code, size, variation, cost FROM `room` WHERE room.cost >= '$min' AND room.cost <= '$max' ORDER BY room.cost ASC");

$result = mysqli_query($con, $query);

echo "<table><tr><th>Room</th><th>Size</th><th align = left>Type</th><th>Cost</th></tr>";
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