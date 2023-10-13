<?php
$username="[ACCT_USER]";
$password="[ACCT_PASSWD]";
$database="[DB_NAME]";
//Acquire the vehicle specs from the form POST
$make=$_POST['make'];
//Establish MySQL connection
$mysqli=new mysqli('10.0.6.10',$username,$password,$database);

if ($mysqli -> connect_errno) {
	echo "failed to connect" . $mysqli -> connect_error;
	exit();
}

$query="SELECT * FROM cars WHERE make LIKE '".$make."'";
#echo $query;
$result=$mysqli->query($query) or die($mysqli->error.__LINE__);
//Interpret results
if ($result->num_rows > 0) {
	while($row= $result->fetch_assoc()) {
		echo $row['make'] . "'s in the data base are " . $row['model'] . "</br>";
	}
}
else{
echo 'NO RESULTS';
}
?>
