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
			.alert {
				width: 500px;
				padding: 3% 0;
				color: #565656;
				font-size: 18px;
				text-align: center;
				margin: 200px auto 0;				
				border: 1px solid #CCCCCC;
				font-family: "Comic Sans MS";
				box-shadow: 0px 0px 10px #666666;
			}
		</style>
	</head>
	<body>
		<div class="cards">
			<?php
				$cars =[["maker"=>"Toyota","model"=>"Carina","year"=>2001,"price"=>20000,"image"=>"https://a.d-cd.net/cea52es-480.jpg"],
						["maker"=>"Toyota","model"=>"Camry","year"=>2005,"price"=>30000,"image"=>"https://d1hu588lul0tna.cloudfront.net/toyotaone/ruru/002-camry-exclusive-next-steps_tcm-3020-870114.jpg"],
						["maker"=>"Audi","model"=>"A8","year"=>1986,"price"=>12000,"image"=>"http://www.theautohost.com/_contentPages/vehicleContentPages/audi/2017/A8%20L/images/2017-Audi-A8L-exterior-grille.jpg"],
						["maker"=>"Audi","model"=>"A6","year"=>2005,"price"=>30000,"image"=>"https://www.cstatic-images.com/car-pictures/xl/USC60AUC021B021001.png"],
						["maker"=>"BMW","model"=>"X5","year"=>2007,"price"=>17000,"image"=>"https://www.bmw.ru/content/dam/bmw/marketRU/bmw_ru/all-models/x-series/x5/2015/at-a-glance/x5_at-a-glance_stagepresentation.jpg/_jcr_content/renditions/cq5dam.resized.img.1680.large.time1452864075065.jpg"],
						["maker"=>"BMW","model"=>"X5","year"=>2015,"price"=>19000,"image"=>"https://www.bmw.ru/content/dam/bmw/marketRU/bmw_ru/all-models/x-series/x5/2015/at-a-glance/x5_at-a-glance_stagepresentation.jpg/_jcr_content/renditions/cq5dam.resized.img.1680.large.time1452864075065.jpg"],
						["maker"=>"BMW","model"=>"Model 7","year"=>2014,"price"=>22000,"image"=>"https://www.bmw.ru/content/dam/bmw/marketRU/bmw_ru/all-models/x-series/x5/2015/at-a-glance/x5_at-a-glance_stagepresentation.jpg/_jcr_content/renditions/cq5dam.resized.img.1680.large.time1452864075065.jpg"],
						["maker"=>"Lada","model"=>"Granta","year"=>2017,"price"=>7000,"image"=>"http://www.kolesa.ru/uploads/2017/06/Lada-Granta-restyle-front1-1600x0-c-default.jpg"]];
			
				function printCar($img, $title, $price, $year) {
					echo	"<div class=\"card\">
								<img src=\"" . $img . "\"/>
								<section class=\"description\">
									<span class=\"title\">" .$title. "</span>
									<span class=\"price\">" .$price. "$</span>
									<span class=\"year\">" .$year. " years</span>
								</section>
							</div>";
				}
				
				$count = 0;
				$min = $_REQUEST["lower"];
				$max = $_REQUEST["upper"];
				
				if ($min==0 && $max==0) {
					foreach ($cars as $car)
						printCar($car['image'], $car['maker']." ".$car['model'], $car['price'], 2017-$car['year']);
				}
				else if ($min <= $max) {
					foreach ($cars as $car)
						if ($car["price"]>=$min && $car["price"]<=$max){
							printCar($car['image'], $car['maker']." ".$car['model'], $car['price'], 2017-$car['year']);
							$count++;
						}
					
					if ($count == 0)
						echo "<div class=\"alert\"><p>Oops... Sorry, there are no car in this range</p></div>";
				}
				else
					echo "<div class=\"alert\"><p>The range is not specified correctly!</p></div>";
			?>
		</div>
	</body>
</html>