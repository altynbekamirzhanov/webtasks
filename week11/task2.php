<?php
	$cars = [
		["id"=>1, "maker"=>"Toyota", "model"=>"Camry 50"],
		["id"=>2, "maker"=>"Mercedes", "model"=>"C 100"],
		["id"=>3, "maker"=>"Daewoo", "model"=>"Nexia"],
		["id"=>4, "maker"=>"Mercedes", "model"=>"S 500"]
	];
	
	$basket = [];
	if (isset($_COOKIE["basket"]))
		$basket = json_decode($_COOKIE["basket"]);
	
	if (isset($_GET["id"])) {
		if (isset($_COOKIE["basket"]))
			$basket = json_decode($_COOKIE["basket"]);
		
		array_push($basket, $_GET["id"]);
		setcookie("basket",json_encode($basket));
		echo '<a href="task2.php">Back</a>';
	}
	else{
		foreach ($cars as $car) {
			echo $car["maker"]." ".$car["model"];
			if (in_array($car["id"], $basket))
				echo " Already in basket!</br>";
			else
				echo " <a href=\"?id=".$car["id"]."\">Add to basket</a></br>";
		}
		echo "<h3>In basket</h3>Items with id: ";
		$count = 0;
		sort($basket);
		foreach ($basket as $id) {
			if ($count == 0)
				echo $id;
			else
				echo ", ".$id;
			$count++;
		}
	}
?>