<?php
	session_start();

	require('../class/Pages.php');
    $Pages = new Pages();
    
    require('../class/Database.php');
    $bdd = new Database();

    if(isset($_FILES['file']['name']) || isset($_POST['desc']))
	{
		if(!empty($_FILES['file']['name']) || !empty($_POST['desc']))
		{
		    $desc = "Problème dans le chargement de l'image";

			if(isset($_POST['desc']))
			{
				if(!empty($_POST['desc']))
				{
					$desc = htmlspecialchars($_POST['desc']);
				}
			}

			if(isset($_POST['desc']) && isset($_FILES['file']['name']))
			{
				if(!empty($_POST['desc']) && empty($_FILES['file']['name']))
				{
					$vars = array(
						"desc_alt"=>$desc,
						"id"=>htmlspecialchars($_POST['id'])
					);
					$bdd->prepare('UPDATE galery SET desc_alt=:desc_alt WHERE id=:id', $vars);
					$_SESSION['ALERT']['SUCCESS'] = "L'enregistrement du texte d'erreur à bien été effectué.";
					header('Location: ../index.php?p=' . $Pages->page("galery"));
					die();
				}
			}

			$path_register = htmlspecialchars($_POST['image']);

			$file = false;

			$ext = explode("/", $_FILES['file']['type']);
			$path_register = "galery/" . md5(uniqid(rand(), true)) . "." . $ext[1];
			$path_of_move = "../" . $path_register;
			$file = true;

			$vars = array(
				"desc_alt"=>$desc,
				"image"=>$path_register,
				"id"=>htmlspecialchars($_POST['id'])
			);

			try
			{				
				$bdd->prepare('UPDATE galery SET desc_alt=:desc_alt, image=:image WHERE id=:id', $vars);
			}
			catch(Execption $e)
			{
				$_SESSION['ALERT']['DANGER'] = "L'enregistrement n'a pas pus être effectué suite à un soucis.";
				header('Location: ../index.php?p=' . $Pages->page("galery"));
				die();
			}

			if($file)
			{
				$resultat = move_uploaded_file($_FILES['file']['tmp_name'], $path_of_move);

			}

			if(!$resultat && $file)
			{
				$_SESSION['ALERT']['DANGER'] = "L'image ne c'est pas correctement uploadé, veulliez recommencer.";
				header("Location: ../index.php?p=" . $Pages->page("galery"));
				die();
			}				

			$_SESSION['ALERT']['SUCCESS'] = "Votre plat à bien été modifié à la liste.";
			header('Location: ../index.php?p=' . $Pages->page("galery"));
			die();
		}
	}

	$vars = array(
		"desc_alt"=>$desc,
		"id"=>htmlspecialchars($_POST['id'])
	);
	$bdd->prepare('UPDATE galery SET desc_alt=:desc_alt WHERE id=:id', $vars);
	$_SESSION['ALERT']['SUCCESS'] = "L'enregistrement du texte d'erreur à bien été effectué.";
	header('Location: ../index.php?p=' . $Pages->page("galery"));
	die();
?>