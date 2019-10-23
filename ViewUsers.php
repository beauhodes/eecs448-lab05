<?php
	$mysqli = new mysqli("mysql.eecs.ku.edu", "beauhodes", "aiJae9ou", "beauhodes");
	if($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	$query="SELECT * FROM Users";
	$result=$mysqli->query($query);
	if($result->num_rows > 0) {
		echo "<table border='1'><tbody><tr><th>Usernames:</th></tr>";
		while($row = $result->fetch_assoc()) {
			echo '<tr><td>', $row['user_id'], '</td></tr>';
		}
		echo '</tbody></table>';
	}
	else {
		echo"No users in database.";
	}
	$result->free();
	$mysqli->close();
?>
