<?php
	session_start();

	require('../class/Pages.php');
    $Pages = new Pages();
    
	require('../class/Database.php');
	$bdd = new Database();

	if(isset($_POST['uname']) && isset($_POST['pass']))
	{
		if(!empty($_POST['uname']) && !empty($_POST['pass']))
		{
			try
			{
				$uname = htmlspecialchars($_POST['uname']);
				$pass = htmlspecialchars($_POST['pass']);
				$pass = sha1($pass);

				$res = $bdd->prepare('SELECT login, password FROM login_admin WHERE login=:uname and password=:pass', ["uname"=>$uname, "pass"=>$pass], true, PDO::FETCH_OBJ);

				if($res != false)
				{
					$_SESSION['USER']['CONNECTED'] = true;
					header('Location: ../index.php?p=' . $Pages->page("food_table"));
					die();
				}
				else
				{
					$_SESSION['ALERT']['DANGER'] = 'Connexion impossible, Vous n\'avez pas été identifié !';
					header('Location: ../index.php?p=' . $Pages->page("login"));
					die();
				}

			}
			catch(Exception $e)
			{
				$_SESSION['ALERT']['WARNING'] = 'Une Erreur c\'est produite, réessayez ou <a href="index.php?p=bug_tracker" style="text-decoration: underline; color: black;">contactez nous</a> si cela persiste.';
				header('Location: ../index.php?p=' . $Pages->page("login"));
				die();
			}			
		}
	}

	$_SESSION['ALERT']['DANGER'] = 'Connexion impossible, Vous n\'avez pas complété tous les champs !';
	header('Location: ../index.php?p=' . $Pages->page("login"));
?>