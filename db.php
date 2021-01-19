<?php
	$serverhost="localhost";
	$username="admin";
	$password="admin123";
	$db_name="ethical_hacking";
	$conn=mysqli_connect($serverhost, $username, $password, $db_name);
	if (!$conn)
	{
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
?>

