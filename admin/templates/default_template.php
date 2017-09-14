<?php
	$title = $function->title_page(htmlspecialchars($_GET['p']));
?>

<!DOCTYPE html>
<html lang="fr">

	<head>
		<meta charset="utf-8" />
		<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
		<link rel="icon" type="image/png" href="assets/img/favicon.ico" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />


		<title><?= $title; ?></title>

		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	    <meta name="viewport" content="width=device-width" />


	    <!-- Bootstrap core CSS     -->
	    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

	    <!--  Material Dashboard CSS    -->
	    <link href="assets/css/material-dashboard.css" rel="stylesheet"/>

	    <!--  CSS for Demo Purpose, don't include it in your project     -->
	    <link href="assets/css/demo.css" rel="stylesheet" />

	    <!--     Fonts and icons     -->
	    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
	</head>

	<body>
		<div class="wrapper">
		    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-1.jpg">
				<!--
		        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"
			    Tip 2: you can also add an image using data-image tag

				-->

				<div class="logo">
					<a href="index.php?p=food_table" class="simple-text">
						Café de la Soie
					</a>
				</div>


		    	<div class="sidebar-wrapper">
						<ul class="nav good">
		                <li class="food_table">
		                    <a href="index.php?p=<?= $Pages->page("food_table"); ?>">
		                        <i class="material-icons">content_paste</i>
		                        <p>Les Plats</p>
		                    </a>
		                </li>
		                <li class="galery">
		                    <a href="index.php?p=<?= $Pages->page("galery"); ?>">
		                        <i class="material-icons">bubble_chart</i>
		                        <p>Galerie photos</p>
		                    </a>
		                </li>
		      	</ul>
		    	</div>
			</div>

		    <div class="main-panel">
				<nav class="navbar navbar-transparent navbar-absolute" style="z-index: 400;">
					<div class="container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="collapse navbar-collapse">
							<ul class="nav navbar-nav navbar-right">
								<li class="dropdown">
									<a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
		 							   <i class="material-icons">person</i>
		 							   <p class="hidden-lg hidden-md">Profil</p>
		 						   </a>
		 						   <ul class="dropdown-menu">
		 						   		<li><a href="index.php?p=<?= $Pages->page("logout"); ?>">Déconnexion</a></li>
		 						   </ul>
								</li>
							</ul>
						</div>
					</div>
				</nav>

				<?= $content; ?>

				<footer class="footer">
		            <div class="container-fluid">
		                <nav class="pull-left">
		                    <ul>
		                        <li>
		                            <a href="index.php?p=<?= $Pages->page("food_table"); ?>">
		                                Produits & Plats
		                            </a>
		                        </li>

		                        <li><a href="https://plus.google.com/?hl=fr"><img src="assets/img/googleplus.png" alt="google+" width="30">Google plus</a></li>
		                    </ul>
		                </nav>
		                <p class="copyright pull-right">
		                    <script>document.write(new Date().getFullYear())</script>
		                </p>
		            </div>
		        </footer>
		    </div>
		</div>
	</body>

	<!--   Core JS Files   -->
	<script src="assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/material.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

	<!--  Notifications Plugin    -->
	<script src="assets/js/bootstrap-notify.js"></script>

	<!--  Google Maps Plugin    -->

	<!-- Material Dashboard javascript methods -->
	<script src="assets/js/material-dashboard.js"></script>

	<!-- Material Dashboard DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

	<!-- Recherche de la de page active -->
	<?php
		$page = htmlspecialchars($_GET['p']);
		$tab = explode("_", $page);
		if($tab[0] == "food"){
			$page = "food_table";
		}
		else{
			$page = "galery";
		}
		var_dump($page);
	?>
	<script>
		var active_element = function($page){
			document.querySelector("." + $page).classList.toggle("active");
		}

		active_element("<?php echo $page; ?>");
	</script>

	<!-- Demande de confirmation de suppresion de plat -->
	<script>
		var remove = function($id, $page)
		{
			if(confirm('Êtes-vous sur de vouloir supprimer ce plat ?'))
			{
				window.location = "index.php?p=<?= $Pages->page("food_remove"); ?>&id=" + $id + "&confirm=OK&page=" + $page;
			}
		}
	</script>

	<!-- Afficher les caractéristique et l'image des plats -->
	<script src="assets/js/preview.js"></script>

	<!-- script pour afficher les description trop longue de food_table -->
	<script src="assets/js/view_description.js"></script>

	<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script> -->

	<script type="text/javascript">
		$(document).ready(function(){

			// Javascript method's body can be found in assets/js/demos.js
	    	demo.initDashboardPageCharts();

		});
	</script>

	<script>
        $().ready(function(){
            demo.initGoogleMaps();
        });
    </script>
</html>
