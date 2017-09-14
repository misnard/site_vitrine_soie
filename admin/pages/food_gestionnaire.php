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

    if(isset($_POST['opt_trie']))
    {
        $opt_trie = htmlspecialchars($_POST['opt_trie']);
        $params = explode("-", $opt_trie);

        $data = $function->display_dishes_order_by($params[0], $params[1]);
    }
    else
    {
        $data = $function->display_dishes_order_by('id');
    }
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Liste des Plats</h4>
                        <a href="index.php?p=food_add"><p class="category" style="margin-left: 30px; color: white; cursor: pointer; display: inline;">Ajouter un plat <i class="material-icons fa fa-1x" style="margin-bottom: 10px;">add</i></p></a>
                        <span style="float: right;"><a href="index.php?p=<?= $Pages->page("food_table"); ?>" style="margin-bottom: 10px; font-weight: 200px; font-size: 1.2em;">Retour au menu de la table</a></span>
                    </div>

                    <form method="post" action="index.php?p=<?= $Pages->page("food_gestionnaire") ?>">
                        <label for="opt_trie" style="text-align: center; width: 100%; margin-top: 5px; color: black;">Option de tri :</label>
                          <select id="opt_trie" name="opt_trie" class="selectpicker" style="width: 60%; text-align: center; margin-left: 20%; padding: 10px; box-shadow: 0 1px 2px black; border: none;">
                            <optgroup label="En ordre croissant">
                              <option value="id-ASC">Trier par id</option>
                              <option value="prix-ASC">Trier par prix</option>
                              <option value="date-ASC">Trier par date</option>
                            </optgroup>

                            <optgroup label="En ordre décroissant">
                              <option value="id-DESC">Trier par id</option>
                              <option value="prix-DESC">Trier par prix</option>
                              <option value="date-DESC">Trier par date</option>
                            </optgroup>
                          </select><br/>

                        <input type="submit" value="Trier" style="width: 40%; margin-left: 30%;" class="btn btn-primary">
                    </form>

                    <div class="card-content table-responsive">
                        <b><i><p style="font-size: 1.3em; opacity: 0.7;">Tri par <span style="color: purple; opacity: 1;"> <?= $data[0]; ?> </span> du <span style="color: purple; opacity: 1;"> <?= $data[1]; ?> </span></p></i></b>
                        <table class="table">
                            <thead class="text-secondary">
                              <th style="color: grey; font-weight: bold;">ID</th>
                              <th style="color: grey; font-weight: bold;">Nom</th>
                              <th style="color: grey; font-weight: bold;">Prix</th>
                              <th style="color: grey; font-weight: bold;">Description</th>
                              <th style="color: grey; font-weight: bold;">Date d'ajout</th>
                              <th style="color: grey; font-weight: bold;">Catégorie</th>
                              <th style="color: grey; font-weight: bold;">Sous Catégrorie</th>
                            </thead>

                            <tbody>
                              <?= $function->create_html_table($data[2], true, true, "food_gestionnaire"); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
