<?php
	error_reporting(E_ALL);
	ini_set("display_errors",1);
	$theuser_id = $_POST['user'];
	$mysqli = new mysqli("mysql.eecs.ku.edu", "beauhodes", "aiJae9ou", "beauhodes");
	if($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	$result = $mysqli->query("SELECT * FROM Posts WHERE author_id = \"$theuser_id\"");
	if($result->num_rows > 0) {
		echo "<table border='1'><tbody><tr><th>Posts by ", $_POST['user'], "</th></tr>";
		while ($row = $result->fetch_assoc()) {
			echo '<tr><td>', $row['content'], '</td></tr>';
		}
		echo '</tbody></table>';
	}
	else {
		echo "No posts found by that user.";
	}
	$result->free();
	$mysqli->close();
?>
