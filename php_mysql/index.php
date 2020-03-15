<?php
	$conn = mysqli_connect(
		'172.17.0.2',
		'test',
		'password',
		'TEST',
		'3306'
	);
	if(mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: ".mysqli_connect_error();
	}
	$sql = "SELECT VERSION()";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	echo "MySQL v";
	print_r($row["VERSION()"]);
?>
