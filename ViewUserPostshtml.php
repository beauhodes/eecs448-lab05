<?php
	$mysqli = new mysqli("mysql.eecs.ku.edu", "beauhodes", "aiJae9ou", "beauhodes");
	if($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	if(empty($mysqli->query('SELECT* FROM Posts')->num_rows)) {
		echo 'No posts in database';
	}
	else {
		$userList = $mysqli->query('SELECT user_id FROM Users');
		if($userList->num_rows > 0) {
			echo "<form action='ViewUserPosts.php' method='post'><select name='user'>";
			while($row = $userList->fetch_assoc()) {
				echo "<option value='{$row['user_id']}'>{$row['user_id']}</option>";
			}
			echo "</select><br><input type='submit' value='Submit'></form>";
		}
		else {
			echo "No users in database.";
		}
		$userList->free();
	}
	$mysqli->close();
?>
