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
		$res = $bdd->prepare('SELECT * FROM plat WHERE id=:id', ["id"=>htmlspecialchars($_GET['id'])], true, PDO::FETCH_OBJ);		
	}
	else
	{
		$_SESSION['ALERT']['DANGER'] = "Aucun élément valide n'a été sélectionné pour pouvoir être modifier !";
		header('Location: index.php?p=' . $Pages->page("food_gestionnaire"));
		die();
	}
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                  <div class="card-header" data-background-color="purple">
                    <h4 class="title">Modification du plat n° <?php echo $res[0]->id; ?></h4>
                    <a href="index.php?p=food_add"><p class="category" style="display: inline-block; margin-left: 30px; color: white; cursor: pointer;">Ajouter un plat <i class="material-icons fa fa-1x" style="margin-bottom: 10px;">add</i></p></a>
                    <a href="index.php?p=food_gestionnaire"><p class="category" style="display: inline-block; margin-left: 30px; color: white; cursor: pointer;">Gestionnaire des plats <i class="material-icons fa fa-1x" style="margin-bottom: 10px; margin-left: 10px;">create</i></p></a>
                    <span style="float: right;"><a href="index.php?p=<?php echo $Pages->page("food_gestionnaire"); ?>" style="margin-bottom: 10px; font-weight: 200px; font-size: 1.2em;">Retour</a></span>     
                  </div>

                  <div class="card-content table-responsive">
                  	<form action="modules/<?php echo $Pages->page("mod_food_modify"); ?>" method="post" enctype="multipart/form-data">
                  	  <div class="form-group">
                  		 <label for="name">Nom du plat : </label><input value="<?php echo $res[0]->name; ?>" class="form-control" type="text" name="name" id="name" required style="box-shadow: 0 1px 2px purple;" autocomplete="off">
      	  						</div>

      	  						<div class="form-group">
                        <label for="price">Prix du plat : </label><input value="<?php echo $res[0]->price; ?>" class="form-control" type="int" name="price" id="price" required style="box-shadow: 0 1px 2px purple;" autocomplete="off">
      	  						</div>

      	  						<div class="form-group">
      	  							<label for="description">Descriptif du plat : </label><textarea class="form-control" type="text" name="description" id="description" rows="7" style="box-shadow: 0 1px 2px purple;"><?php echo $res[0]->description; ?></textarea>
      	  						</div>

                      <label for="category" style="opacity: 0.5;">Catégorie du plat :</label>
                      <select id="category" name="category" class="selectpicker" style="width: 100%; padding: 10px; box-shadow: 0 1px 2px purple; border: none;">
                        <optgroup label="Entree">
                          <option value="entree-starter" <?php echo $res[0]->category == 'entree-starter' ? "selected" : "" ?> >Pour Commencer</option>
                          <option value="entree-salad" <?php echo $res[0]->category == 'entree-salad' ? "selected" : "" ?> >Nos Salades</option>
                        </optgroup>

                      <optgroup label="Menu">
                          <option value="menu-noon" <?php echo $res[0]->category == 'menu-noon' ? "selected" : "" ?> >Midi</option>
                          <option value="menu-evening" <?php echo $res[0]->category == 'menu-evening' ? "selected" : "" ?> >Soirée</option>
                      </optgroup>

                        <optgroup label="Plat">
                          <option value="plat-special" <?php echo $res[0]->category == 'plat-special' ? "selected" : "" ?> >Nos Spécialités</option>
                          <option value="plat-meat" <?php echo $res[0]->category == 'plat-meat' ? "selected" : "" ?> >Nos Viandes</option>
                          <option value="plat-burger" <?php echo $res[0]->category == 'plat-burger' ? "selected" : "" ?> >Nos Burgers</option>
                        </optgroup>

                        <optgroup label="Dessert">
                          <option value="dessert-cheese" <?php echo $res[0]->category == 'dessert-cheese' ? "selected" : "" ?> >Nos Fromages</option>
                          <option value="dessert-cake" <?php echo $res[0]->category == 'dessert-cake' ? "selected" : "" ?> >Pause Gourmande</option>
                          <option value="dessert-icecream" <?php echo $res[0]->category == 'dessert-icecream' ? "selected" : "" ?> >Nos Glaces</option>
                          <option value="dessert-custom_ice" <?php echo $res[0]->category == 'dessert-custom_ice' ? "selected" : "" ?> >Composez votre coupe</option>
                          <option value="dessert-alc_ice" <?php echo $res[0]->category == 'dessert-alc_ice' ? "selected" : "" ?> >La coupe alcolisée</option>
                        </optgroup>

                        <optgroup label="Boisson">
                            <option value="boissons-boissons" <?php echo $res[0]->category == 'boissons-boissons' ? "selected" : "" ?> >Nos Boissons</option>
                        </optgroup>

                        <optgroup label="Vin">
                            <option value="vins-vins" <?php echo $res[0]->category == 'vins-vins' ? "selected" : "" ?> >Nos Vins</option>
                        </optgroup>
                      </select>

          						<div class="form-group" style="text-align: center;">
          							<label for="file" class="upload_file" style="font-size: 1.5em;color: orange; text-decoration: underline;">Cliquer ici pour changer ou ajouter la photo </label><input class="form-control" id="file" type="file" name="file" id="image">
          						</div>

          						<input type="hidden" name="path_file" value="<?php echo $res[0]->path_image; ?>">

          						<input type="hidden" name="id" value="<?php echo $res[0]->id; ?>">

          						<input type="hidden" name="MAX_FILE_SIZE" value="12345" />

          						<input type="submit" value="Valider la modification" class="btn btn-primary">
                  	</form>
                  </div>
                </div>