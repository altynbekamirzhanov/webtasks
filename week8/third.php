<html>
	<head>
		<style>
			.cards {
				width: 700px;
				display: flex;
				margin: 0 auto;
				flex-wrap: wrap;
			}
			.cards .card {
				width: 500px;
				margin: 10px;
				display: flex;
				border-radius: 5px;
				border: 1px solid red;
			}
			.menu {
				width: 700px;
				margin: 0 auto;
				display: block;
			}
			.menu a {
				margin: 0 5px;
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
			.card .title {
				font-size: 20px;
				font-weight: bold;
			}
			.card .price {
				color:green;
				flex-grow: 1;
			}
			.card .year {
				font-size: 18px;
				font-weight: bold;
			}
		</style>
	</head>
	<body>
		<div class="cards">
			<?php
				$cars = [["maker"=>"Toyota","model"=>"Carina","year"=>2001,"price"=>20000,"image"=>"https://a.d-cd.net/cea52es-480.jpg"],
						["maker"=>"Toyota","model"=>"Camry","year"=>2005,"price"=>30000,"image"=>"https://t1-cms-3.images.toyota-europe.com/toyotaone/kzru/%D0%A1amry-70-2_tcm-3051-1330802.jpg"],
						["maker"=>"Audi","model"=>"A8","year"=>1986,"price"=>12000,"image"=>"http://www.theautohost.com/_contentPages/vehicleContentPages/audi/2017/A8%20L/images/2017-Audi-A8L-exterior-grille.jpg"],
						["maker"=>"Audi","model"=>"A6","year"=>2005,"price"=>30000,"image"=>"https://www.cstatic-images.com/car-pictures/xl/USC60AUC021B021001.png"],
						["maker"=>"BMW","model"=>"X5","year"=>2007,"price"=>17000,"image"=>"https://www.bmw.ru/content/dam/bmw/marketRU/bmw_ru/all-models/x-series/x5/2015/at-a-glance/x5_at-a-glance_stagepresentation.jpg/_jcr_content/renditions/cq5dam.resized.img.1680.large.time1452864075065.jpg"],
						["maker"=>"BMW","model"=>"X5","year"=>2015,"price"=>19000,"image"=>"https://www.bmw.ru/content/dam/bmw/marketRU/bmw_ru/all-models/x-series/x5/2015/at-a-glance/x5_at-a-glance_stagepresentation.jpg/_jcr_content/renditions/cq5dam.resized.img.1680.large.time1452864075065.jpg"],
						["maker"=>"BMW","model"=>"Model 7","year"=>2014,"price"=>22000,"image"=>"https://www.bmw.ru/content/dam/bmw/marketRU/bmw_ru/all-models/x-series/x5/2015/at-a-glance/x5_at-a-glance_stagepresentation.jpg/_jcr_content/renditions/cq5dam.resized.img.1680.large.time1452864075065.jpg"],
						["maker"=>"Lada","model"=>"Granta","year"=>2017,"price"=>7000,"image"=>"http://www.kolesa.ru/uploads/2017/06/Lada-Granta-restyle-front1-1600x0-c-default.jpg"]];
				
				function printAll($img, $title, $price, $year) {
					echo "<div class=\"card\"><img src=\"" . $img . "\"/>" .
								"<section class=\"description\"><span class=\"title\">" . $title .
								"</span><span class=\"price\">" . $price . "$" .
								"</span><span class=\"year\">" . $year . " years" . "</span></section></div>" ;
				}
				
				$year = null;
				$maker = null;
				$price = null;
				
				if (isset($_GET['maker']) || isset($_GET['year']) || isset($_GET['price'])) {
					foreach ($cars as $car) {
						if (isset($_GET['maker'])) {
							$maker = $_GET['maker'];
							if ($car['maker'] == $maker)
								printAll($car['image'], $car['maker']." ".$car['model'], $car['price'], 2017-$car['year']);
						}
						else if (isset($_GET['year'])) {
							if (2018 - $car['year'] > 7)
								printAll($car['image'], $car['maker']." ".$car['model'], $car['price'], 2017-$car['year']);
						}
						else if (isset($_GET['price'])) {
							if ($car['price'] > 20000)
								printAll($car['image'], $car['maker']." ".$car['model'], $car['price'], 2017-$car['year']);
						}
					}
				}
			?>
		</div>
		<div class="menu">
			<a href="third.php">Home</a>|<a href="?maker=Toyota">Toyota</a>|<a href="?maker=BMW">BMW</a>|<a href="?maker=Audi">Audi</a>|<a href="?maker=Lada">Lada</a>
		</div>
		<div class="menu">
			<a href="?year=old">Old cars (More than 7 years)</a>|<a href="?price=expensive">Expensive cars (more than 20.000$)</a>
		</div>
	</body>
</html>
