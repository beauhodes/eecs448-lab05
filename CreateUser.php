<?php
	error_reporting(E_ALL);
	ini_set("display_errors",1);
	$newuser_id = $_POST['userName'];
	$mysqli = new mysqli("mysql.eecs.ku.edu", "beauhodes", "aiJae9ou", "beauhodes");
	if($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	$query="SELECT user_id FROM Users WHERE user_id='$newuser_id'";
	if($result = $mysqli->query($query)->num_rows > 0) {
		echo "{$_POST['userName']} is already being used.";
	}
	else {
		$newUser = "INSERT INTO Users (user_id) VALUES ('$newuser_id')";
		$mysqli->query($newUser);
		echo"{$_POST['userName']} was added to database.";
	}
	$mysqli->close();
?>
	
