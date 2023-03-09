<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Rocket Dicer</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-2bhF5St5+PbZZzb6xj8fYc0MsCjgLpPOHzNRBm9K/a+Z8GJmFp5LlE5U6e5Y8dq2W6kei87M1Q9HxhPsHXrdw==" crossorigin="anonymous" />

	<style>
		form {
			display: flex;
			flex-direction: column;
			align-items: center;
		}
		
		label {
			display: inline-block;
			margin-bottom: 0.5em;
			text-align: left;
			width: 100%;
			max-width: 300px;
		}

		input {
			padding: 0.5em;
			margin-bottom: 1em;
			border-radius: 4px;
			border: 1px solid #ccc;
			width: 100%;
			max-width: 300px;
		}

		button[type="submit"] {
			background-color: #4CAF50;
			border: none;
			color: white;
			padding: 0.5em 1em;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			border-radius: 4px;
			cursor: pointer;
		}

		nav {
			color: yellow;
			background-image: url('https://wallpapercave.com/wp/KNNq86a.jpg');
		}

		nav a {
			color: yellow; 
		}

		body{
			color: yellow;
			text-align: center;
			background-image: url('http://4.bp.blogspot.com/_5xJ_jlTUVG4/S_PHdyb_jyI/AAAAAAAABEg/FKj-Z8K-4WM/s1600/bigstockphoto_Blue_Brushed_4167376.jpg');
		}

		body {
			margin: 0;
			padding-bottom: 70px; /* make room for the sticky footer */
		}

        #chartContainer {
            width: 100%;
            height: 100%;
        }

		.calendar{
			margin: auto;
			padding: auto;
		}




		footer {
			position: fixed;
			bottom: 0;
			width: 100%;
			height: 70px; /* same height as the padding-bottom of the body */
			background-image: url('http://wonderfulengineering.com/wp-content/uploads/2014/09/Purple-wallpaper-8.jpg');
			display: flex;
			justify-content: space-between;
			align-items: center;
			padding: 0 20px;
		}


		h1 {
  			text-align: center;
		}

		.finance-table {
 			 display: flex;
			justify-content: center;
			align-items: center;
		}

		table {
			border-collapse: collapse;
			width: 100%;
			max-width: 800px; /* Optional - set the maximum width of the table */
		}

		th, td {
			text-align: center;
			padding: 10px;
			border: 1px solid black;
		}

		th {
			background-color: #ff0000;
		}


	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#" style="color: yellow">
			 Rocket Dicer
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
					<a class="nav-link" style="color:red;" href="/home">
						<img ></img> Homepage
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" style="color:orange;"  href="https://yorick1125.github.io/BomboFighterz">
						<img class="nav2"></img> Multiplayer Fighting Game
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" style="color:#e6d72d;"  href="/register">
						<img class="nav3"></img> Register
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" style="color:green;"  href="https://www.hackerrank.com/yorick1125?hr_r=1">
						<img class="nav4"></img> Hackerrank
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" style="color:blue;"  href="/blog">
						<img class="nav5"></img> Blog
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" style="color:#c02de6;"  href="https://play.picoctf.org/users/yorick1125">
						<img class="nav6"></img> PicoCTF
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" style="color:magenta;"  href="/music">
						<img class="nav7"></img> Music
					</a>
				</li>
			</ul>
		</div>
	</nav>




	<div class="calendar">
        <div class="row">
            <div class="col-md-12" style="padding: 20px;">
                <h2>Economic Forex Calendar (US and Canada)</h2>
				<div class="finance-table">
					<table>
						<thead>
						<tr>
							<th>Fundamental Data</th>
							<th>USD</th>
							<th>CAD</th>
						</tr>
						</thead>
						<tbody>
						<tr>
							<td>Int Rates</td>
							<td>{{ rand(0, 100) }}%</td>
							<td id="cad_interest_rates">20</td>
						</tr>
						<tr>
							<td>Inflation</td>
							<td>{{ rand(0, 100) }}%</td>
							<td id="cad_inflation"></td>
						</tr>
						<tr>
							<td>Unemployment</td>
							<td>{{ rand(0, 100) }}%</td>
							<td id="cad_unemployment"></td>
						</tr>
						<tr>
							<td>GDP Growth</td>
							<td>{{ rand(0, 100) }}%</td>
							<td id="cad_gdp_growth"></td>
						</tr>
						<tr>
							<td>Retail Sentiment</td>
							<td>{{ rand(0, 100) }}%</td>
							<td></td>
						</tr>
						</tbody>
					</table>
				</div>
            </div>
        </div>
    </div>

    <div id="chartContainer"></div>


	<footer>
		<div class="container d-flex justify-content-between align-items-center">
			<span style="color:gold">Yorick-Ntwari Niyonkuru | Software Developer</span>
			<span id="live-date" style="color:#f0d124"></span>
		</div>
	</footer>

	<script>

		async function fetchData() {
			// Fetch latest inflation rate
			const inflationUrl = 'https://www.bankofcanada.ca/valet/observations/group/CPI-All-items/json';

			const inflationResponse = await fetch(inflationUrl);
			const inflationData = await inflationResponse.json();
			const latestInflationRate = inflationData.observations.find(observation => observation.attributes['class'] == 'CPI-common' && observation.attributes['frequency'] == 'Monthly' && observation.attributes['adjustment'] == 'Seasonally adjusted' && observation.attributes['unit'] == 'Percent' && observation.attributes['excluded'] == false).value;

			// Return latest inflation rate as a string
			return { inflation_rate: latestInflationRate.toString() + '%' };
		}





		setInterval(async () => {
			// Show date at the bottom right of the footer
			const dateElement = document.getElementById('live-date');
			const currentDate = new Date();
			const formattedDate = currentDate.toLocaleString('en-US', {
			month: 'long',
			day: 'numeric',
			year: 'numeric',
			hour: 'numeric',
			minute: 'numeric',
			second: 'numeric',
			hour12: true,
			});

			dateElement.textContent = formattedDate;


			// Update Economic Data
			const econ_data = await fetchData();

			document.getElementById('cad_interest_rates').innerText = 20;
			document.getElementById('cad_inflation').innerHTML = econ_data.inflation_rate
			document.getElementById('cad_unemployment').innerHTML = econ_data.unemployment_rate
			document.getElementById('cad_gdp_growth').innerHTML = econ_data.gdp_growth_rate

		}, 1000);



	</script>
    
    <script src="https://s3.tradingview.com/tv.js"></script>
    <script type="text/javascript">
    new TradingView.widget(
    {
        "width": 800,
        "height": 500,
        "symbol": "FX:USDCAD",
        "interval": "D",
        "timezone": "Etc/UTC",
        "theme": "dark",
        "style": "1",
        "locale": "en",
        "toolbar_bg": "#f1f3f6",
        "enable_publishing": false,
        "allow_symbol_change": true,
        "hideideas": true
    });
    </script>




	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
