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

$employee = $_POST["Employee"];
$job = array("grounds_keeper", "manager", "secretary");
$i = 0;


$query = sprintf
	("SELECT employee.emp_name, employee.pay FROM employee JOIN %s ON employee.ID = %s.ID WHERE employee.emp_name IN (SELECT employee.emp_name FROM employee WHERE employee.emp_name = '$employee')", $job[$i], $job[$i]);
	$result = mysqli_query($con, $query);

while ($result->num_rows == 0) {
	$i++;
	$query = sprintf
	("SELECT employee.emp_name, employee.pay FROM employee JOIN %s ON employee.ID = %s.ID WHERE employee.emp_name IN (SELECT employee.emp_name FROM employee WHERE employee.emp_name = '$employee')", $job[$i], $job[$i]);
	$result = mysqli_query($con, $query);
	}
printf ("%s is a %s:", $employee, $job[$i]);
echo "<br><br>";

echo "<table><tr><th>Employee Name</th><th>Pay</th></tr>";
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