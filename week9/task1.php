<html>
	<head>
		<style>
			#outer {
				width: 300px;
				padding: 15px;
				border-radius: 10px;
				margin: 25px 0 0 20px;
				border: 1px solid #959595;
			}
			#outer div {
				display: flex;
				margin-bottom: 10px;
				justify-content: space-between;
			}
			h4, p {
				margin: 0;
			}
			#age {
				width: 50px;
				color: white;
				text-align: center;
				border-radius: 5px;
				background: #696969;
			}
			#type {
				text-decoration: underline;
			}
		</style>
	</head>
	<body>
		<div id="outer">
			<?php
				
				echo "<div><h4>" . $_REQUEST["model"] . "</h4><p>" . $_REQUEST["price"]. "$</p></div>
					  <div><p id=\"age\">" . $_REQUEST["age"] . "</p><p id=\"type\">" . $_REQUEST["type"] . "</p></div>";
				
				$array = $_REQUEST["attributes"];
				$size = count($array);
				
				for ($i = 0; $i < $size; $i++)
					if ($i > 0)
						echo ", " . $array[$i];
					else
						echo $array[$i];
			?>
		</div>
	</body>
</html>