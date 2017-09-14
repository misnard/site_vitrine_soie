<?php
session_start();
function chargerClasse($classe)
{
    require 'class/class_' . $classe . '.php'; // On inclut la classe correspondante au paramètre pass&eacute;.
}
spl_autoload_register('chargerClasse');
$class_Data = new Data;
?>
<!DOCTYPE html>
<html lang="fr">
   <head>
      <!-- Metas -->
      <meta charset="utf-8">
      <title>Café de la soie</title>
      <meta name="description" content="Restaurant a tapas, bar à tapas, Croix-Rousse, 69004: specialités lyonnaise, bar à vin, bouchon lyonnais, 69001, Caluire et Cuire.">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Css -->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.css" />
      <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
      <link href="css/base.css" rel="stylesheet" type="text/css" media="all"/>
      <link href="css/main.css" rel="stylesheet" type="text/css" media="all"/>
      <link href="css/flexslider.css" rel="stylesheet" type="text/css"  media="all" />
      <link href="css/fonts.css" rel="stylesheet" type="text/css"  media="all" />
  		<link rel="icon" type="image/png" href="img/favicon.ico" />
	  <link href="https://fonts.googleapis.com/css?family=Kristi" rel="stylesheet">
	  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
	  <link href="https://fonts.googleapis.com/css?family=Lora:400,700" rel="stylesheet">
	   </head>
   <body>
      <!-- Preloader -->
      <div class="loader">
         <!-- Preloader inner -->
         <div class="loader-inner">
            <svg width="120" height="220" viewbox="0 0 100 100" class="loading-spinner" version="1.1" xmlns="http://www.w3.org/2000/svg">
               <circle class="spinner" cx="50" cy="50" r="21" fill="#ffffff" stroke-width="2"/>
            </svg>
         </div>
         <!-- End preloader inner -->
      </div>
      <!-- End preloader-->
      <!--Wrapper-->
      <div class="wrapper">
         <!--Hero section-->
         <section class="hero overlay">
            <!--Main slider-->
            <div class="main-slider slider flexslider">
               <ul class="slides">
                  <li>
                     <div class="background-img zoom">
                        <img src="img/header_1.jpg" alt="">
                     </div>
                  </li>
                  <li>
                     <div class="background-img zoom">
                        <img src="img/header_2.jpg" alt="">
                     </div>
                  </li>
               </ul>
            </div>
            <!--End main slider-->
            <!--Header-->
            <header class="header default">
               <div class=" left-part">
                  <a class="logo scroll" href="#hero">
                     <h2><img src="img/logo.png" width="30px"></h2>
                  </a>
               </div>
               <div class="right-part">
                  <nav class="main-nav">
                     <div class="toggle-mobile-but">
                        <a href="#" class="mobile-but" >
                           <div class="lines"></div>
                        </a>
                     </div>
                     <ul>
                        <li><a class="scroll" href="#wrapper">Accueil</a></li>
                        <li><a class="scroll" href="#resto">Le Café de la soie</a></li>
                        <li><a class="scroll" href="#menu">Menu</a></li>
                        <li><a class="scroll" href="#reservation">Réserver</a></li>
                        <li><a class="scroll" href="#gallery">Galerie</a></li>
                        <li><a class="scroll" href="tel:+33970350855">09 70 35 08 55</a></li>
                     </ul>
                  </nav>
               </div>
            </header>
            <!--End header-->
            <!--Inner hero-->
            <div class="inner-hero">
               <!--Container-->
               <div class="container hero-content">
                  <!--Row-->
                  <div class="row">
                     <div class="col-sm-12 text-center">
                        <h1 class="large">Café Restaurant La Soie</h1>
                        <p class="lead">Restaurant, Bar à vins, Tapas</p>

                     </div>
                  </div>
                  <!--End row-->
               </div>
               <!--End container-->
            </div>
            <!--End inner hero-->
         </section>
         <!--End hero section-->
         <!--Resto section-->
         <section id="resto" class="resto pt-120 pb-120">
            <!--Container-->
            <div class="container">
               <!--Row-->
               <div class="row">
                  <div class="col-sm-12 text-center mb-100">
                     <h1 class="title">Le café de la soie</h1>
                     <p class="beige">spécialités lyonnaises</p>
                  </div>
               </div>
               <!--End row-->
            </div>
            <!--End container-->
            <!--Container-->
            <div class="container">
               <!--Row-->
               <div class="row vertical-align">
                  <div class="col-md-5 col-sm-5 ">
                     <div class="block-img mb-10">
                        <div class="background-img">
                           <img src="img/plat_1.jpg" alt="">
                        </div>
                     </div>
                     <div class="block-img ">
                        <div class="background-img">
                           <img src="img/plat_2.jpg" alt="">
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-md-offset-1 col-sm-6 col-sm-offset-1  ">
                     <div class="block-content">
                        <h2 class="title-medium mb-10 pb-10">
                            La gastronomie lyonnaise au menu, tout en détente.
                           <span class="dots"></span>
                        </h2>
                        <p class="puch-right mb-40">Le Café de la Soie fait honneur à la gastronomie lyonnaise en vous proposant un large choix de plat le midi jusqu’à 16h et le soir.
                        <br>Vous pouvez opter le midi pour la formule express à 12 euros, ou pour le plat du jour à 9 euros.
                        <br>Le soir, deux formules différentes vous sont proposées, avec une entrée et un plat.
                        <br>Vous pourrez ainsi découvrir le fameux Gâteau de Foie, le Gratin de Quenelles, l’Andouillette sauce Moutarde et le Saint Marcellin.
                        <br>Une autre façon de découvrir la belle ville de Lyon !</p>
                     </div>
                  </div>
               </div>
               <!--End row-->
            </div>
            <!--End container-->
         </section>
         <!--End resto section-->
         <!--Short reservation section-->
         <section class="short-reservation pt-200 pb-250 overlay">
            <div class="background-img zoom" >
               <img src="img/image_4.jpg" alt="">
            </div>
            <!--Container-->
            <div class="container">
               <!--Row-->
               <div class="row">
                  <div class="col-sm-12 text-center front-p">
                     <h1 class="large">Réservation</h1>
                     <p class="lead white top">Ouvert de 7:00 à 00:00, tous les jours de la semaine </p>
                     <a href="#reservation" class="but scroll">Réserver une table</a>
                  </div>
               </div>
               <!--End row-->
            </div>
            <!--End container-->
         </section>
         <!--End short reservation section-->
         <!--Menu section-->
         <section id="menu" class="menu pt-120 pb-120 ">
            <!--Container-->
            <div class="container">
               <!--Row-->
               <div class="row">
                  <div class="col-sm-12  mb-100 text-center">
                     <h1 class="title">Menu</h1>
                     <p class="beige">Une variété de délicieux plats</p>
                  </div>
               </div>
               <!--End row-->
            </div>
            <!--End container-->
            <!--Container-->
            <div class="container">
               <!--Row-->
               <div class="row">
                  <div class="col-sm-12 ">
                     <!--Tabs-->
                     <ul class="block-tabs text-center">
                        <li class="active">Entrées</li>
                        <li class="">Menu</li>
                        <li class="">Plats</li>
                        <li class="">Desserts</li>
                        <li class="">Boissons</li>
                        <li class="">Vins</li>
                     </ul>
                  </div>
               </div>
               <!--End row-->
            </div>
            <!--End container-->
            <!--Container-->
            <div class="container">
               <!--Row-->
               <div class="row">
                  <ul class="block-tab mt-40">
                     <!--Menu list-->
                     <li class="active block-list">
                         <?php $class_Data->entre(); ?>
                     </li>
                     <!--Menu list-->
                      <li class=" block-list">
                          <?php $class_Data->menu(); ?>
                      </li>
                      <!--Menu list-->
                     <li class=" block-list">
                         <?php $class_Data->plat(); ?>
                     </li>
                     <!--Menu list-->
                     <li class=" block-list">
                         <?php $class_Data->dessert(); ?>
                     </li>
                     <!--Menu list-->
                     <li class="block-list">
                         <?php $class_Data->boissons(); ?>
                     </li>
                     <li class="block-list">
                          <?php $class_Data->vins(); ?>
                     </li>
                  </ul>
                  <!--End tabs-->
               </div>
               <!--End row-->
            </div>
            <!--End container-->
         </section>
         <!--End menu section-->
         <!--Review section-->
         <section class="review pt-120 pb-120 overlay">
            <div class="background-img zoom" >
               <img src="img/avis.jpg" alt="les avis image de fond">
            </div>
            <!--Container-->
            <div class="container">
               <!--Row-->
               <div class="row">
                  <div class="col-sm-12 text-center front-p">
                     <div class="review-slider flexslider">
                        <ul class="slides">
                           <li>
                              <div class="block-review">
                                 <h2 class="white h2-s-1 mb-5">Trip advisor : "shantimhatre"</h2>
                                 <p>La nourriture est excellente et le service est excellent. Super places à l'extérieur. </p>
                                 <ul class="block-star mt-10">
                                    <li><i class="icon-star"></i></li>
                                    <li><i class="icon-star"></i></li>
                                    <li><i class="icon-star"></i></li>
                                    <li><i class="icon-star"></i></li>
                                    <li><i class="icon-star"></i></li>
                                 </ul>
                              </div>
                           </li>
                           <li>
                              <div class="block-review">
                                 <h2 class="white h2-s-1 mb-5">Trip advisor : "Medclubber"</h2>
                                 <p>A la sortie du theatre , petit diner imprévu au top, pour bien finir la soirée ... Tapas super copieux, plats à l ardoise variés et goutûs ... Aucune fausse note ! Bravo. </p>
                                 <ul class="block-star mt-10">
                                    <li><i class="icon-star"></i></li>
                                    <li><i class="icon-star"></i></li>
                                    <li><i class="icon-star"></i></li>
                                    <li><i class="icon-star"></i></li>
                                    <li><i class="icon-star"></i></li>
                                 </ul>
                              </div>
                           </li>
                           <li>
                              <div class="block-review">
                                 <h2 class="white h2-s-1 mb-5">Yelp : "Paul S."</h2>
                                 <p>Très agréable, la terrasse est sympa, calme ! Les serveurs sont aussi sympathique ;) Petit coup de coeur pour les frites faites maison avec tous les plats (et très bonnes). </p>
                                 <ul class="block-star mt-10">
                                    <li><i class="icon-star"></i></li>
                                    <li><i class="icon-star"></i></li>
                                    <li><i class="icon-star"></i></li>
                                    <li><i class="icon-star"></i></li>
                                    <li><i class="icon-star-empty"></i></li>
                                 </ul>
                              </div>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
               <!--End row-->
            </div>
            <!--End container-->
         </section>
         <!--End reviews section-->
         <!--Reservation section-->
         <section id="reservation" class="reservation pt-140 pb-140 bg-grey">
            <!--Container-->
            <div class="container">
               <!--Row-->
               <div class="row">
                  <div class="col-sm-8 col-sm-offset-2 text-center mb-100">
                     <h1 class="title">Réserver</h1>
                  </div>
               </div>
               <!--End row-->
            </div>
            <!--End container-->
            <!--Container-->
            <div class="container">
               <!--Row-->
               <div class="row">
                  <div class="col-sm-8 col-sm-offset-2">
                     <div class="block-form">
                        <form class="reservation-form" method="post" action="send.php">
                           <div class="block-input ico-input">
                              <i class="icon-user-1"></i>
                              <label>Nom :</label>
                              <input id="name" name="name" type="text" required>
                           </div>
                           <div class="block-input ico-input">
                              <i class="icon-phone"></i>
                              <label>Téléphone :</label>
                              <input id="phone" name="phone" type="text">
                           </div>
                           <div class="block-input ico-input">
                              <i class="icon-mail-1"></i>
                              <label>Email :</label>
                              <input id="email" name="email" type="text">
                           </div>
                           <!--Input columns-->
                           <div class="input-columns block-input clearfix">
                              <div class="column-1">
                                 <div class="column-inner">
                                    <label>Nombre de personnes :  </label>
                                    <input id="person" min="1" name="person"  type="number" required>
                                 </div>
                              </div>
                           <!--End input columns-->
                           <!--Input columns-->
                           <div class="input-columns block-input clearfix">
                              <div class="column-1">
                                 <div class="column-inner ico-input">
                                    <i class="icon-calendar"></i>
                                    <label>Date : </label>
                                    <input class="date" id="date" name="date" type="date" required>
                                 </div>
                              </div>
                              <!--Column-->
                              <div class="column-1">
                                 <div class="column-inner ico-input">
                                    <i class="icon-clock"></i>
                                    <label>Heure : </label>
                                    <input placeholder="(ex: 19:00)"  id="time" name="time" type="text" required>
                                 </div>
                              </div>
                              <!--End column-->
                           </div>
                           <!--End input columns-->
                           <button  class="but submit" type="submit">Réserver</button>

							 <!--Contact form message-->
                               <div class="success-msg">
                                  <h2>Félicitations, votre réservation a bien été enregistrée !</h2>
                               </div>
                               <div class="error-msg">
                                  <h2>Votre demande n'a pu être envoyée, merci de réesayer.</h2>
                               </div>
                               <!--End contact form message-->


                        </form>
                        <?php
                        if($_SESSION['have_res'] == true)
                        {
                            echo "<script>alert('Merci votre reservation a bien été pris en compte !')</script>";
                            $_SESSION['have_res'] = false;
                        }
                            ?>
                     </div>
                  </div>
               </div>
               <!--End row-->
            </div>
            <!--End container-->
         </section>
         <!--End reservation section-->
         <!--Gallery section-->
         <section id="gallery" class="gallery overlay">
            <!-- As a general rule, include a heading (h1-h6) as a child of each section and article element for screen readers purposes-->
            <h2 class="indent">Galerie</h2>
            <!--Gallery slider-->
            <div class="gallery-slider slider flexslider">
               <ul class="slides">
                  <?php $class_Data->display_galery(); ?>
               </ul>
            </div>
            <!--End gallery slider-->
         </section>
         <!--End gallery section-->
         <!--Contact section-->
         <section id="contact" class="contact pt-250 pb-250">
            <!-- As a general rule, include a heading (h1-h6) as a child of each section and article element for screen readers purposes-->
            <h2 class="indent">Contact</h2>
            <div class="block-map ">
               <div id="map" class="map"></div>
            </div>
            <!--Container-->
            <div class="container block-contact">
               <!--Row-->
               <div class="row">
                  <div class="col-md-5 col-md-offset-7 col-sm-5 col-sm-offset-7">
                     <ul class="block-social mb-30">
                        <li><a href="https://www.facebook.com/pages/Caf%C3%A9-de-la-Soie/478225055541380"><i class="icon-facebook"></i></a></li>
                        <!--<li><a href="#"><i class="icon-twitter"></i></a></li>
                        <li><a href="#"><i class="icon-vimeo"></i></a></li>-->
                     </ul>
                     <div class="block-info mb-30">
                        <h1>Café Restaurant La Soie</h1>
                        <p><strong>Ouvert tous les jours de 07:00 à 00:00 </strong><br>
                           <br>
                            5 Place Marcel Bertone <br>
                            69004 - LYON<br><br>
                            Tél : <a href="+33970350855">09 70 35 08 55</a> <br>
                            Email : <span><a href="mailto:philgui31@orange.fr">philgui31@orange.fr</a></span>
                          </br>SIREN : 513222422
                        </p>
                     </div>
                  </div>
                  <div class="col-md-5 col-md-offset-7 col-sm-5 col-sm-offset-7">
                     <footer class="footer-short mt-40">
                        <p>	&copy; 2017 Tous droits réservés - <a href="https://mealit.me">MEAL IT!</a> - m.isnard - n.lallemand.</p>
                     </footer>
                  </div>
               </div>
               <!--End row-->
            </div>
            <!--End container-->
         </section>
         <!--End contact section-->
      </div>
      <!-- End wrapper-->
      <!--Javascript-->
      <script src="js/jquery-1.12.4.min.js" type="text/javascript"></script>
      <script src="js/jquery.flexslider-min.js" type="text/javascript"></script>
      <script src="js/smooth-scroll.js" type="text/javascript"></script>
	  <script src="js/jquery.validate.min.js" type="text/javascript"></script>
	  <script src="js/placeholders.min.js" type="text/javascript"></script>
      <script src="js/script.js" type="text/javascript"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.js"></script>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgcxoW00p2ftJQLQqngn4ZbFVYjjvicd8&callback=initializeMap"></script>
      <!-- Google analytics -->
      <!-- End google analytics -->
   </body>
</html>
