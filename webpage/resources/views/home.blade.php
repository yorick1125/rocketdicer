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
                <h2>Economic Forex Trading Data(US and Canada)</h2>
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
							<td id="usd_interest_rates"></td>
							<td id="cad_interest_rates"></td>
						</tr>
						<tr>
							<td>Inflation</td>
							<td id="usd_inflation"></td>
							<td id="cad_inflation"></td>
						</tr>
						<tr>
							<td>Unemployment</td>
							<td id="usd_unemployment"></td>
							<td id="cad_unemployment"></td>
						</tr>
						<tr>
							<td>GDP Growth</td>
							<td id="usd_gdp_growth"></td>
							<td id="cad_gdp_growth"></td>
						</tr>
						<tr>
							<td>Retail Sentiment</td>
							<td></td>
							<td></td>
						</tr>
						</tbody>
					</table>
				</div>
            </div>
        </div>
    </div>

	<h2>Technical Forex Trading Data(US and Canada)</h2>

    <div id="chartContainer"></div>


	<footer>
		<div class="container d-flex justify-content-between align-items-center">
			<span style="color:gold">Yorick-Ntwari Niyonkuru | Software Developer</span>
			<span id="live-date" style="color:#f0d124"></span>
		</div>
	</footer>

	<script>

	const API_KEY = "SIPxlSNq6uddlJkN1Es47g==g8kZb3UrfqhB0ht4";

	async function fetchData() {
		return {
			canada: {
				int_rate: await fetchIntRate("canada"),
				inflation: await fetchInflation("canada"),
				unemployment: await fetchUnemployment("canada"),
				gdp_growth: await fetchGdpGrowth("canada")
			},
			us: {
				int_rate: await fetchIntRate("united states"),
				inflation: await fetchInflation("united states"),
				unemployment: await fetchUnemployment("united states"),
				gdp_growth: await fetchGdpGrowth("united states")
			}
		};
	}

	async function fetchIntRate(country) {
		const response = await fetch(
			"https://api.api-ninjas.com/v1/interestrate?country=" + country,
			{
			method: "GET",
			headers: {
				"Content-Type": "application/json",
				"X-Api-Key": API_KEY
			}
			}
		);
		const json = await response.json();

		return json.central_bank_rates[0].rate_pct;
	}

	async function fetchInflation(country) {
		const response = await fetch(
			"https://api.api-ninjas.com/v1/inflation?country=" + country,
			{
			method: "GET",
			headers: {
				"Content-Type": "application/json",
				"X-Api-Key": API_KEY
			}
			}
		);
		const json = await response.json();

		return json[0].yearly_rate_pct;
	}

	async function fetchUnemployment(country) {
		const response = await fetch(
			"https://api.api-ninjas.com/v1/country?name=" + country,
			{
			method: "GET",
			headers: {
				"Content-Type": "application/json",
				"X-Api-Key": API_KEY
			}
			}
		);
		const json = await response.json();

		return json[0].unemployment;
	}

	async function fetchGdpGrowth(country) {
		const response = await fetch(
			"https://api.api-ninjas.com/v1/country?name=" + country,
			{
			method: "GET",
			headers: {
				"Content-Type": "application/json",
				"X-Api-Key": API_KEY
			}
			}
		);
		const json = await response.json();

		return json[0].gdp_growth;
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

		document.getElementById('cad_interest_rates').innerText = econ_data.canada.int_rate + "%";
		document.getElementById('cad_interest_rates').style.color = "#1ae565";
		document.getElementById('cad_inflation').innerHTML = econ_data.canada.inflation + "%";
		document.getElementById('cad_inflation').style.color = "#1ae565";
		document.getElementById('cad_unemployment').innerHTML = econ_data.canada.unemployment + "%";
		document.getElementById('cad_unemployment').style.color = "#1ae565";
		document.getElementById('cad_gdp_growth').innerHTML = econ_data.canada.gdp_growth + "%";
		document.getElementById('cad_gdp_growth').style.color = "#1ae565";

		document.getElementById('usd_interest_rates').innerText = econ_data.us.int_rate + "%";
		document.getElementById('usd_interest_rates').style.color = "#1ae565";
		document.getElementById('usd_inflation').innerHTML = econ_data.us.inflation + "%";
		document.getElementById('usd_inflation').style.color = "#1ae565";
		document.getElementById('usd_unemployment').innerHTML = econ_data.us.unemployment + "%";
		document.getElementById('usd_unemployment').style.color = "#1ae565";
		document.getElementById('usd_gdp_growth').innerHTML = econ_data.us.gdp_growth + "%";
		document.getElementById('usd_gdp_growth').style.color = "#1ae565";

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
