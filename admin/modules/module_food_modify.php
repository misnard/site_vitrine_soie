<?php
	session_start();

	require('../class/Pages.php');
    $Pages = new Pages();
    
    require('../class/Database.php');
    $bdd = new Database();

    if($_POST['price'] == 0)
    {
    	$_POST['price'] = 2;
    	$no_price = true;
    }

	if(isset($_POST['name']) && isset($_POST['price']) && isset($_POST['category']))
	{
		if(!empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['category']))
		{

			if($no_price)
			{
				$_POST['price'] = 0;				
			}
			
			$name = htmlspecialchars($_POST['name']);
			$price = htmlspecialchars($_POST['price']);
			$category = htmlspecialchars($_POST['category']);

			$description = "";

			if(isset($_POST['description']))
			{
				if(!empty($_POST['description']))
				{
					$description = htmlspecialchars($_POST['description']);
				}
			}

			$file = false;

			$path_register = htmlspecialchars($_POST['path_file']);

			if(isset($_FILES['file']['name']))
			{
				if(!empty($_FILES['file']['name']))
				{
					$ext = explode("/", $_FILES['file']['type']);
					$path_register = "uploads/" . md5(uniqid(rand(), true)) . "." . $ext[1];
					$path_of_move = "../" . $path_register;
					$file = true;
				}
			}

			$vars = array(
				"name"=>$name,
				"price"=>$price,
				"description"=>$description,
				"path_image"=>$path_register,
				"category"=>$category,
				"id"=>htmlspecialchars($_POST['id'])
			);

			try
			{				
				$bdd->prepare('UPDATE plat SET name=:name, price=:price, description=:description, path_image=:path_image, category=:category WHERE id=:id', $vars);
			}
			catch(Execption $e)
			{
				$_SESSION['ALERT']['DANGER'] = "L'enregistrement n'a pas pus être effectué suite à un soucis.";
				header('Location: ../index.php?p=' . $Pages->page("food_gestionnaire"));
				die();
			}

			if($file)
			{
				$resultat = move_uploaded_file($_FILES['file']['tmp_name'], $path_of_move);
			}

			if(!$resultat && $file)
			{
				$_SESSION['ALERT']['DANGER'] = "L'image ne c'est pas correctement uploadé, veulliez recommencer.";
				header("Location: ../index.php?p=" . $Pages->page("food_gestionnaire"));
				die();
			}				

			$_SESSION['ALERT']['SUCCESS'] = "Votre plat à bien été modifié.";
			header('Location: ../index.php?p=' . $Pages->page("food_gestionnaire"));
			die();
		}
	}

	$_SESSION['ALERT']['DANGER'] = "L'enregistrement n'a pas été effectuer suite à un manque d'information, veuillez réessayer.";
	header('Location: ../index.php?p=' . $Pages->page("food_gestionnaire"));
	die();
?>