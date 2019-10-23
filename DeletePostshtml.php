<?php
	error_reporting(E_ALL);
	ini_set("display_errors",1);
	$mysqli = new mysqli("mysql.eecs.ku.edu", "beauhodes", "aiJae9ou", "beauhodes");
	if($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	$allPosts = $mysqli->query('SELECT * FROM Posts');
	if ($allPosts->num_rows > 0) {
		echo "<form action='DeletePosts.php' method='post'>";
		echo "<table border='1'><tr><th>Post:</th><th>Author:</th><th>Delete?</th></tr>";
		$i = 0;
		while ($row = $allPosts->fetch_assoc()) {
			echo "<tr><td>{$row['content']}</td><td>{$row['author_id']}</td>", 
			"<td><input type='checkbox' name='delete[$i]' value='{$row['post_id']}'></td></tr>";
			$i = $i + 1;
		}
		echo "</table><br><input type='submit' value='Submit'></form>";
	}
	else {
		echo "No posts in database.";
	}
	$allPosts->free();
	$mysqli->close();
?>
