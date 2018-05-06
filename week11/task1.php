<?php
	
	if (isset($_COOKIE["name"]))
		echo 'Hello '.$_COOKIE["name"];
	else if (isset($_REQUEST['name']))
		setcookie("name", $_REQUEST['name']);
	else
		echo '<form>Enter your name: <input name="name"/><input type="submit" value="Submit"/></form>';
	
?>