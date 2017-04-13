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

$renter = $_POST["Renter"];

$query = sprintf
("SELECT renter.FIRST_LAST_NAME, SUM(rent.amount) AS Total_Paid FROM renter JOIN rent ON renter.SSN = rent.SSN WHERE renter.FIRST_LAST_NAME IN (SELECT FIRST_LAST_NAME FROM renter WHERE renter.FIRST_LAST_NAME = '$renter') GROUP BY renter.FIRST_LAST_NAME");

$result = mysqli_query($con, $query);
printf ("Rent paid by %s:", $renter);
echo "<br><br>";

if ($result->num_rows == 0) {
	printf ("No rent paid by %s!", $renter);
}
else {
	echo "<table><tr><th>Name</th><th>Rent Paid</th></tr>";
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