<?php
	session_start();

	require('../class/Pages.php');
    $Pages = new Pages();

    require('../class/Database.php');
    $bdd = new Database();

	if(isset($_FILES['file']['name']))
	{
		if(!empty($_FILES['file']['name']))
		{

			$ext = explode("/", $_FILES['file']['type']);
			$path_register = "galery/" . md5(uniqid(rand(), true)) . "." . $ext[1];
			$path_of_move = "../" . $path_register;

			if(isset($_POST['alt']) && !empty($_POST['alt']))
			{
				$alt = htmlspecialchars($_POST['alt']);
			}
			else
			{
				$alt = "Problème dans le chargement de l'image";
			}


			$vars = [
				"alt"=>$alt,
				"image"=>$path_register
			];

			try
			{				
				$bdd->prepare('INSERT INTO galery (desc_alt, image) VALUES (:alt, :image)', $vars);
			}
			catch(Execption $e)
			{
				$_SESSION['ALERT']['DANGER'] = "L'enregistrement n'a pas pus être effectué suite à un soucis.";
				header("Location: ../index.php?p=" . $Pages->page("galery") . "&add=true");
				die();
			}

			//REPERTOIRE DE STOCKAGE EN PARTANT DE LA RACINE:: index.php
			$repertoire_de_stockage = "galery";

			mkdir('../' . $repertoire_de_stockage . '/', 0777, true);
			$resultat = move_uploaded_file($_FILES['file']['tmp_name'], $path_of_move);

			if(!$resultat)
			{
				$bdd->query('DELETE FROM galery WHERE image=:image', ["image"=>$path_register]);

				$_SESSION['ALERT']['DANGER'] = "L'image ne c'est pas correctement uploadé, veuillez recommencer.";
				header("Location: ../index.php?p=" . $Pages->page("galery") . "&add=true");
				die();
			}

			header("Location: ../index.php?p=" . $Pages->page("galery") . "&add=true");
			$_SESSION['ALERT']['SUCCESS'] = "Votre plat à bien été ajouté à la liste.";
			die();
		}		
	}

	$_SESSION['ALERT']['DANGER'] = "L'enregistrement n'a pas été effectuer suite à un manque d'information, veuillez réessayer.";
	header("Location: ../index.php?p=" . $Pages->page("galery") . "&add=true");
	die();
?>