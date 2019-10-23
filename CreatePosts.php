<?php
	error_reporting(E_ALL);
	ini_set("display_errors",1);
	$thepost = $_POST['newpost'];
	$theuserid = $_POST['username'];
	$mysqli = new mysqli("mysql.eecs.ku.edu", "beauhodes", "aiJae9ou", "beauhodes");
	if($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	$query="SELECT user_id FROM Users WHERE user_id='$theuserid'";
	if($result = $mysqli->query($query)->num_rows > 0) {
		$mysqli->query("INSERT INTO Posts (content, author_id) VALUES ('$thepost', '$theuserid')");
		echo "Post added to database.";
	}
	else {
		echo "{$_POST['username']} was not in database.";
	}
	$mysqli->close();
?>
