<?php
	error_reporting(E_ALL);
	ini_set("display_errors",1);
	$mysqli = new mysqli("mysql.eecs.ku.edu", "beauhodes", "aiJae9ou", "beauhodes");
	if($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	$deletedPosts = $_POST['delete'];
	if(empty($_POST)) {
		echo "No posts deleted.";
	}
	else {
		echo "Posts deleted:";
		echo "$deletedPosts";
		foreach ($_POST['delete'] as $id) {
			echo "<p>{$id}</p>";
			echo "Deleted: ", $mysqli->query("SELECT content FROM Posts WHERE post_id = \"{$id}\"")->fetch_assoc()['content'], ".";
		$mysqli->query("DELETE FROM Posts WHERE post_id = \"{$id}\"");
	}
	$mysqli->close();
?>
