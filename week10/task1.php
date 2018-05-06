<html>
	<head>
		<style>
			.cards {
				width: 500px;
				display: flex;
				margin: 0 auto;
				flex-wrap: wrap;
			}
			.cards .card {
				width: 100%;
				display: flex;
				margin: 10px 0;
				border-radius: 5px;
				border: 1px solid black;
			}
			.card img {
				margin: 5px;
				width: 160px;
				height: 100px;
			}
			.card .description {
				padding: 5px;
				display: flex;
				flex-direction: column;
			}
			.card .title, .card .year, .card .price{
				font-size: 20px;
				font-weight: bold;
				margin-bottom: 5px;
			}
			.bold {
				margin-left: 10px;
				font-weight: normal;
			}
		</style>
	</head>
	<body>
		<div class="cards">
			<?php
				$conn = mysqli_connect("localhost", "admin", "admin");
				mysqli_select_db($conn, "table");
				$sql = "SELECT * FROM cars, makers WHERE cars.maker_id=makers.id";
				$result = mysqli_query($conn, $sql);
				$rows = mysqli_num_rows($result);
				for ($i=0; $i<$rows; $i++) {
					$row = mysqli_fetch_assoc($result);
					echo "<div class=\"card\"><img src=\"" . $row["img"] . "\"/>" .
								"<section class=\"description\">
									<span class=\"title\">" . $row["maker"]." ".$row["model"] . "</span>
									<span class=\"year\">Year:<span class=\"bold\">" . $row["year"] . "</span></span>
									<span class=\"price\">Price:<span class=\"bold\">" . $row["price"] . "$</span></span>
								</section>
							  </div>" ;
				}
			?>
		</div>
	</body>
</html>