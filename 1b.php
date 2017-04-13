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

$room = $_POST["Room"];

$query = sprintf
("SELECT room_code, description FROM `work_ticket` WHERE work_ticket.room_code = '$room' ORDER BY room_code ASC");

$result = mysqli_query($con, $query);
printf ("Problems for %s:", $room);
echo "<br><br>";

if ($result->num_rows == 0) {
	printf ("No problems for %s!", $room);
}
else {
	echo "<table><tr><th>Room</th><th>Description of Problem</th></tr>";
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

}
mysqli_close($con);
?>