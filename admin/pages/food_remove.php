<?php
    //VERIFICATION DE L'UTILISATEUR
    if(!isset($_SESSION['USER']['CONNECTED']) && !class_exists('Fonction'))
    {
        require('../class/Fonction.php');
        Fonction::identity_verification();
    }
?>

<?php
	//SUPPPESSION APRES CONFIRMATION DU PLAT SELECTIONNER
	if(isset($_GET['id']) && isset($_GET['confirm']) && $_GET['confirm'] === "OK" && !empty($_GET['id']))
	{
		if($_GET['page'] == "galery")
		{
			$bdd->prepare('DELETE FROM galery WHERE id=:id', ['id'=>htmlspecialchars($_GET['id'])]);
		}
		else
		{
			$bdd->prepare('DELETE FROM plat WHERE id=:id', ['id'=>htmlspecialchars($_GET['id'])]);	
		}

		$_SESSION['ALERT']['SUCCESS'] = 'Votre plat à bien été supprimer !';

		header('Location: index.php?p=' . $Pages->page(htmlspecialchars($_GET['page'])));
	}
?>