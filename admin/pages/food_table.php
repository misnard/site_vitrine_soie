<?php
    //VERIFICATION DE L'UTILISATEUR
    if(!isset($_SESSION['USER']['CONNECTED']) && !class_exists('Fonction'))
    {
        require('../class/Fonction.php');
        Fonction::identity_verification();
    }
?>

<?php
    $req = $bdd->query('SELECT * FROM plat ORDER BY id DESC');
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Liste des Plats</h4>
                        <a href="index.php?p=food_add"><p class="category" style="display: inline-block; margin-left: 30px; color: white; cursor: pointer;">Ajouter un plat <i class="material-icons fa fa-1x" style="margin-bottom: 10px;">add</i></p></a>
                        <a href="index.php?p=food_gestionnaire"><p class="category" style="display: inline-block; margin-left: 30px; color: white; cursor: pointer;">Gestionnaire des plats <i class="material-icons fa fa-1x" style="margin-bottom: 10px; margin-left: 10px;">create</i></p></a>
                    </div>
                    <div class="card-content table-responsive">
                        <table class="table">
                                <thead class="text-primary">
                                	   <th style="color: purple; font-weight: bold;">ID</th>
                                       <th style="color: purple; font-weight: bold;">Nom</th>
                                       <th style="color: purple; font-weight: bold;">Prix</th>
                                       <th style="color: purple; font-weight: bold;">Description</th>
                                       <th style="color: purple; font-weight: bold;">Date d'ajout</th>
                                       <th style="color: purple; font-weight: bold;">Catégorie</th>
                                       <th style="color: purple; font-weight: bold;">Sous-catégorie</th>
                                </thead>

                                <tbody>
                                    <?= $function->create_html_table($req); ?>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
