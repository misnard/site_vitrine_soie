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
  $req = $bdd->query('SELECT * FROM plat ORDER BY id DESC');
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                  <div class="card-header" data-background-color="purple">
                    <h4 class="title" style="display: inline-block;">Ajouter un Plat</h4>
                    <br/><a href="index.php?p=food_gestionnaire"><p class="category" style="margin-left: 30px; color: white; cursor: pointer; display: inline;">Gestionnaire des plats <i class="material-icons fa fa-1x" style="margin-bottom: 10px; margin-left: 10px;">create</i></p></a>
                    <span style="float: right;"><a href="index.php?p=<?php echo $Pages->page("food_table"); ?>" style="margin-bottom: 10px; font-weight: 200px; font-size: 1.2em;">Retour</a></span>
                  </div>

                  <div class="card-content table-responsive">
                  	<form action="modules/<?php echo $Pages->page("mod_food_add"); ?>" method="post" enctype="multipart/form-data">
                  	  <div class="form-group">
                  		 <label for="name">Nom : *</label><input class="form-control" type="text" name="name" id="name" required style="box-shadow: 0 1px 2px purple;" autocomplete="off">
      	  						</div>

      	  						<div class="form-group">
                        <label for="price">Prix : *</label><input class="form-control" type="int" name="price" id="price" required style="box-shadow: 0 1px 2px purple;" autocomplete="off">
      	  						</div>

      	  						<div class="form-group">
      	  							<label for="description">Descriptif (Facultatif) : </label><textarea class="form-control" type="text" name="description" id="description" rows="7" style="box-shadow: 0 1px 2px purple;"></textarea>
      	  						</div>

                      <label for="category" style="opacity: 0.5;">Catégorie :</label>
                      <select id="category" name="category" class="selectpicker" style="width: 100%; padding: 10px; box-shadow: 0 1px 2px purple; border: none;">
                        <optgroup label="Entree">
                          <option value="entree-starter">Pour Commencer</option>
                          <option value="entree-salad">Nos Salades</option>
                        </optgroup>

                        <optgroup label="Menu">
                          <option value="menu-noon">Midi</option>
                          <option value="menu-evening">Soirée</option>
                        </optgroup>

                        <optgroup label="Plat">
                          <option value="plat-special">Nos Spécialités</option>
                          <option value="plat-meat">Nos Viandes</option>
                          <option value="plat-burger">Nos Burgers</option>
                        </optgroup>

                        <optgroup label="Dessert">
                          <option value="dessert-cheese">Nos Fromages</option>
                          <option value="dessert-cake">Pause Gourmande</option>
                          <option value="dessert-icecream">Nos Glaces</option>
                          <option value="dessert-alc_ice">La coupe alcolisée</option>
                          <option value="dessert-custom_ice">Composez votre coupe</option>
                        </optgroup>

                        <optgroup label="Boisson">
                          <option value="boissons-boissons">Nos boissons</option>
                        </optgroup>

                        <optgroup label="Vin">
                          <option value="vins-vins">Nos vins</option>
                        </optgroup>
                      </select>

      	  						<div class="form-group" style="text-align: center;">
      	  							<label for="file" class="upload_file" style="font-size: 1.5em;color: orange; text-decoration: underline;">Cliquer ici pour ajouter une photo (Facultatif) </label><input class="form-control" id="file" type="file" name="file" id="image">
      	  						</div>

      	  						<input type="hidden" name="MAX_FILE_SIZE" value="12345" />

      	  						<input type="hidden" value="<?php echo date("d/m/Y H:i:s"); ?>" name="cur_date">

      	  						<input type="submit" value="Ajouter" class="btn btn-primary">
                  	</form>

                    <div class="content" style="margin-top: 50px;">
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="card">
                              <div class="card-header" data-background-color="grey">
                                <h4 class="title" style="display: inline-block;">Liste des Plats</h4>
                                <span style="float: right;"><a href="index.php?p=<?php echo $Pages->page("food_gestionnaire"); ?>" style="margin-bottom: 10px; font-weight: 200px; font-size: 1.2em;">Gestionnaire</a></span>
                              </div>
                              <table class="table">
                                <thead class="text-secondary">
                                  <th style="color: grey; font-weight: bold;">ID</th>
                                  <th style="color: grey; font-weight: bold;">Nom</th>
                                  <th style="color: grey; font-weight: bold;">Prix</th>
                                  <th style="color: grey; font-weight: bold;">Description</th>
                                  <th style="color: grey; font-weight: bold;">Date d'ajout</th>
                                  <th style="color: grey; font-weight: bold;">Catégorie</th>
                                  <th style="color: grey; font-weight: bold;">Sous catégorie</th>
                                </thead>
                                <tbody>
                                  <?php echo $function->create_html_table($req, false, true, "food_add"); ?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
