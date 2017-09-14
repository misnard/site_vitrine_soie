<?php
	session_start();

	require 'class/Autoload.php';
	new Autoload();

	$bdd = new Database();
	$Pages = new Pages();
	$function = new Fonction();
	
	if(!isset($_SESSION['USER']['CONNECTED']) && isset($_GET['p']))
	{
		$p = $Pages->page("login");
		$_GET['p'] = $Pages->page("login");
	}
	else
	{

		if(isset($_GET['p']))
		{
			if(!empty($_GET['p']))
			{
				$p = htmlspecialchars($_GET['p']);
			}
		}

		if(!isset($p))
		{
			header('Location: index.php?p=' . $Pages->page("login"));
			die();
		}
	}
	
	ob_start();
		if(!file_exists('pages/' . $p . '.php'))
		{
			header('Location: index.php?p=404_Not_Found');
			die();
		}

		require('pages/' . $p . '.php');
	$content = ob_get_clean();

	if($p != $Pages->page("login") && isset($_SESSION['USER']['CONNECTED']))
	{
		require('templates/default_template.php');
	}
	else
	{
		echo $content;
	}
?>