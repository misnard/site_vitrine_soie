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
    if(!isset($_GET['add']))
    {
      $req = $bdd->query('SELECT * FROM galery');
    }
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title" style="display: inline-block;">GALERIE</h4>
                        <?php if(!isset($_GET['add'])): ?>
                        <a href="index.php?p=galery&add=true"><p class="category" style="display: inline-block; margin-left: 30px; color: white; cursor: pointer;">Ajouter une image <i class="material-icons fa fa-1x" style="margin-bottom: 10px;">add</i></p></a>
                        <?php else: ?>
                        <span style="float: right;"><a href="index.php?p=<?= $Pages->page("galery"); ?>" style="margin-bottom: 10px; font-weight: 200px; font-size: 1.2em;">Retour</a></span>
                        <?php endif; ?>
                    </div>

                    <div class="card-content table-responsive">
                      <?php if(!isset($_GET['add'])): ?>
                        <table class="table">
                            <thead class="text-secondary">
                              <th style="color: grey; font-weight: bold;">ID</th>
                              <th style="color: grey; font-weight: bold;">Nom</th>
                              <th style="color: grey; font-weight: bold;">URL l'image</th>
                            </thead>

                            <tbody>
                              <?= $function->create_html_table($req, true, true, "galery", "galery_modify"); ?>
                            </tbody>
                        </table>
                      <?php else: ?>
                        <form action="modules/<?= $Pages->page("mod_galery_add"); ?>" method="post" enctype="multipart/form-data">

                          <div class="form-group" style="display: flex; align-items: center; justify-content: center;
                          flex-direction: column;">
                            <label for="alt"><b>Nom (Facultatif) :</b></label>
                            <input class="form-control" type="text" name="alt" id="alt" style="box-shadow: 0 0px 1px grey;">
                          </div>

                          <div class="form-group" style="text-align: center;">
                            <label for="file" class="upload_file" style="font-size: 1.5em;color: orange; text-decoration: underline;">Ajouter une photo</label>
                            <input class="form-control" id="file" type="file" name="file" id="image" required>
                          </div>

                          <input type="hidden" name="MAX_FILE_SIZE" value="12345" />

                          <input type="submit" value="Ajouter" class="btn btn-primary">
                        </form>
                      <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
