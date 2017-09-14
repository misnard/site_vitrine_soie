<?php
	session_start();

	require('../class/Pages.php');
    $Pages = new Pages();

    require('../class/Database.php');
    $bdd = new Database();

	if(isset($_POST['name']) && isset($_POST['price']) && isset($_POST['cur_date']) && isset($_POST['category']))
	{
		if(!empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['cur_date']) && !empty($_POST['category']))
		{

			$name = htmlspecialchars($_POST['name']);
			$price = htmlspecialchars($_POST['price']);
			$cur_date = htmlspecialchars($_POST['cur_date']);
			$category = htmlspecialchars($_POST['category']);

			$description = "";

			if(isset($_POST['description']))
			{
				if(!empty($_POST['description']))
				{
					$description = htmlentities($_POST['description']);
				}
			}

			$file = false;
			$path_register = "assets/img/no_picture1.png";


			if(isset($_FILES['file']['name']))
			{
				if(!empty($_FILES['file']['name']))
				{
					//REPERTOIRE DE STOCKAGE EN PARTANT DE LA RACINE:: index.php
					$repertoire_de_stockage = "uploads";

					$ext = explode("/", $_FILES['file']['type']);
					$path_register = $repertoire_de_stockage . "/" . md5(uniqid(rand(), true)) . "." . $ext[1];
					$path_of_move = "../" . $path_register;
					$file = true;
				}
			}

			$vars = [
				"name"=>$name,
				"price"=>$price,
				"description"=>$description,
				"cur_date"=>$cur_date,
				"path_image"=>$path_register,
				"category"=>$category
			];

			try
			{				
				$bdd->prepare('INSERT INTO plat (name, price, description, cur_date, path_image, category) VALUES (:name, :price, :description, :cur_date, :path_image, :category)', $vars);
			}
			catch(Execption $e)
			{
				$_SESSION['ALERT']['DANGER'] = "L'enregistrement n'a pas pus être effectué suite à un soucis.";
				header('Location: ../index.php?p=' . $Pages->page("food_add"));
				die();
			}

			if($file)
			{
				mkdir('../uploads/', 0777, true);
				$resultat = move_uploaded_file($_FILES['file']['tmp_name'], $path_of_move);
			}


			if(!$resultat && $file)
			{
				$bdd->prepare('INSERT INTO plat (path_image) VALUES (:path_image)', ["path_image"=>$path_register]);

				$_SESSION['ALERT']['DANGER'] = "L'image ne c'est pas correctement uploadé, veulliez recommencer.";
				header("Location: ../index.php?p=" . $Pages->page("food_add"));
				die();
			}

			$_SESSION['ALERT']['SUCCESS'] = "Votre plat à bien été ajouté à la liste.";
			header('Location: ../index.php?p=' . $Pages->page("food_add"));
			die();
		}
	}

	$_SESSION['ALERT']['DANGER'] = "L'enregistrement n'a pas été effectuer suite à un manque d'information, veuillez réessayer.";
	header('Location: ../index.php?p=' . $Pages->page("food_add"));
	die();
?>