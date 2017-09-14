<?php
    //VERIFICATION DE L'UTILISATEUR
    if(!isset($_SESSION['USER']['CONNECTED']) && !class_exists('Fonction'))
    {
        require('../class/Fonction.php');
        Fonction::identity_verification();
    }
?>

<?php	
	if(isset($_SESSION['USER']['CONNECTED']))
    {
    	header('Location: index.php?p=' . $Pages->page("food_table"));
    	die();
    }
?>

<!DOCTYPE html>
<html lang="fr">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login</title>
		<link rel="stylesheet" href="assets/css/log_style.css">
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	</head>

	<body>
		<div class="alert">
			<?php Event::displayAlert(); ?>
		</div>
		<div id="container">
			<section>
				<h2>Espace Administration</h2>

				<form action="modules/<?= $Pages->page("mod_log_admin"); ?>" method="post">
					<label for="uname">Login : </label><input type="text" name="uname" id="uname" autocomplete="off" required>
					<label for="pass">Mot de passe : </label><input type="password" name="pass" id="pass" required>
					<input type="submit" value="Connexion">
				</form>
			</section>

			<script>
				var body = document.querySelector('body');

				<?php $num = mt_rand(1, 2);	?>

				var index = <?= $num; ?>

				body.style.background = "url('assets/img/fonds/fond_log" + <?= $num; ?> + ".jpg') no-repeat top left / 100% 100%";

				window.addEventListener('resize', function(){
					if(innerWidth <= 500)
					{
						body.style.background = "url('assets/img/fonds/fond_log2.jpg') no-repeat top left / 100% 100%";
					}
					else
					{
						body.style.background = "url('assets/img/fonds/fond_log" + <?= $num; ?> + ".jpg') no-repeat top left / 100% 100%";
					}
				});
			</script>
		</div>
	</body>
</html>