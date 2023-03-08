<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Rocket Dicer</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#">Rocket Dicer</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
					<a class="nav-link" href="#">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">About</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Contact</a>
				</li>
			</ul>
		</div>
	</nav>

	<div class="container">
		<h1>Rocket Dicer</h1>
		<form method="POST" action="/register">
			@csrf

			<label for="email">Email</label>
			<input id="email" type="email" name="email" required autofocus>

			<label for="password">Password</label>
			<input id="password" type="password" name="password" required minlength="8">

			<label for="password_confirmation">Confirm Password</label>
			<input id="password_confirmation" type="password" name="password_confirmation" required>

			<button type="submit" class="btn btn-primary">Register</button>
		</form>
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
