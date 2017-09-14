<?php
    //VERIFICATION DE L'UTILISATEUR
    if(!isset($_SESSION['USER']['CONNECTED']) && !class_exists('Fonction'))
    {
        require('../class/Fonction.php');
        Fonction::identity_verification();
    }
?>

<?php
	Event::displayAlert();

	if(isset($_GET['id']) && !empty($_GET['id']))
	{
		$res = $bdd->prepare('SELECT * FROM galery WHERE id=:id', ["id"=>htmlspecialchars($_GET['id'])], true, PDO::FETCH_OBJ);		
	}
	else
	{
		$_SESSION['ALERT']['DANGER'] = "Aucun élément valide n'a été sélectionné pour pouvoir être modifier !";
		header('Location: index.php?p=' . $Pages->page("galery"));
		die();
	}
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                  <div class="card-header" data-background-color="purple">
                    <h4 class="title">Modification de l'image n° <?= $res[0]->id; ?></h4>
                    <a href="index.php?p=galery&add=true"><p class="category" style="display: inline-block; margin-left: 30px; color: white; cursor: pointer;">Ajouter une image <i class="material-icons fa fa-1x" style="margin-bottom: 10px;">add</i></p></a>
                    <span style="float: right;"><a href="index.php?p=<?= $Pages->page("galery"); ?>" style="margin-bottom: 10px; font-weight: 200px; font-size: 1.2em;">Retour</a></span>     
                  </div>

                  <div class="card-content table-responsive">

                    <img src="<?= $res[0]->image; ?>" alt="">

                  	<form action="modules/<?= $Pages->page("mod_galery_modify"); ?>" method="post" enctype="multipart/form-data">

                  	  <div class="form-group">
                  		 <label for="name">Description d'erreur de chargement de l'image :</label>
                       <input value="<?= $res[0]->desc_alt; ?>" class="form-control" type="text" name="desc" id="name" style="box-shadow: 0 1px 2px purple;" autocomplete="off">
      	  						</div>
                      
          						<div class="form-group" style="text-align: center;">
          							<label for="file" class="upload_file" style="font-size: 1.5em;color: orange; text-decoration: underline;">Cliquer ici pour changer ou ajouter la photo </label>
                        <input class="form-control" id="file" type="file" name="file" id="image">
          						</div>

          						<input type="hidden" name="image" value="<?= $res[0]->image; ?>">

          						<input type="hidden" name="id" value="<?= $res[0]->id; ?>">

          						<input type="hidden" name="MAX_FILE_SIZE" value="12345" />

          						<input type="submit" value="Ajouter" class="btn btn-primary">
                  	</form>
                  </div>
                </div>