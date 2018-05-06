<form>
	<?php
		if (isset($_REQUEST["username"]) && isset($_REQUEST["password"])) {
			$conn = mysqli_connect("localhost", "admin", "admin", "task11");
			$result = mysqli_query($conn, "SELECT * FROM email");
			$rows = mysqli_num_rows($result);
			
			$first = $_GET["username"];
			$second = $_GET["password"];
			$db = false;
			for ($i=0; $i<$rows; $i++) {
				$row = mysqli_fetch_assoc($result);
				if ($row["login"]==$first && $row["password"]==$second)
					$db = true;
			}
			if ($db == true)
				echo "You are already in db";
			else
				echo "You are not in db";
		}
		else
			echo '<input style="display:block; margin: 0 0 10px" type="email" name="username" placeholder="Enter your email"/>
			<input style="display:block; margin: 0 0 10px" type="password" name="password" placeholder="Enter your password"/>
			<input type="submit" value="Submit"/>';
	?>
</form>