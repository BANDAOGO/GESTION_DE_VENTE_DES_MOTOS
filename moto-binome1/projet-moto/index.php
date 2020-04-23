<?php 
require_once 'connexion.php';
require_once 'login.php';
$rep=verif();
if($rep=='ok')
{
    header("location: acceuil.php");
}
 else {
 $erreur=$rep; 
 echo $erreur;
}
?> 

<!DOCTYPE html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>login</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/index.css">
	</head>
	<body>

		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-offset-4" id="content">
					<form method="POST" action="index.php" class="fh5co-form animate-box" data-animate-effect="fadeIn">
						<h2>Se Connecter</h2>
						<div class="form-group">
							<label for="username" class="sr-only">Username</label>
							<input type="text" class="form-control" name="user" id="username" placeholder="Username" autocomplete="off" required>
						</div>
						<div class="form-group">
							<label for="password" class="sr-only">Password</label>
							<input type="password" class="form-control" name="pwd" id="password" placeholder="Password" autocomplete="off">
						</div>
						<div class="form-group">
							<label for="remember"><input type="checkbox" id="remember"> Se souvenir de moi </label>
						</div>
						<div class="form-group">
							<p><a href="#">Créer un compte</a> | <a href="#">Mot de passe oublié?</a></p>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary"> Se Connecter</button>
						</div>
					</form>

				</div>
			</div>
			<div class="row" style="padding-top: 60px; clear: both;">
				<div class="col-md-12 text-center"><p><small class="copy">&copy; Simplon.co All Rights Reserved.</small></p></div>
			</div>
		</div>
	
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>

	</body>
</html>

