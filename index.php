<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<title>GitHub Connection API</title>
        <meta name="keywords" content="GitHub Api">
		<meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/templatemo-style.css">
	</head>
	<body>
		<div class="preloader">
			<div class="sk-spinner sk-spinner-three-bounce">
				<div class="sk-bounce1"></div>
				<div class="sk-bounce2"></div>
				<div class="sk-bounce3"></div>
			</div>
		</div>

		<section id="countdown">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1 class="bounceIn">Repositórios do GitHub</h1>
						<h2 class="element">
							<span class="sub-element">
								Veja a lista contendo seus repositórios públicos do GitHub!
								Para isso, coloque o nome do seu repositório abaixo e clique em listar!
							</span>
						</h2>

						<form action="listar.php" method="post">
							<div class="col-md-2 col-sm-2"></div>
							<div class="col-md-5 col-sm-5">
								<input type="text" class="form-control" placeholder="Seu repositório">
							</div>
							<div class="col-md-3 col-sm-3">
								<input type="submit" class="form-control" value="LISTAR">
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>

		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/init.js"></script>
	</body>
</html>