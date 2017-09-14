<?php

	class Fonction
	{
		//VARIABLES TRADUITE POUR LES SOUS CATEGORIES
		private $_starter = "Pour Commencer";
      	private $_salad = "Salade";
      	private $_special = "Spécialité";
      	private $_meat = "Viande";
      	private $_burger = "Burger";
      	private $_cheese = "Fromage";
      	private $_cake = "Pause Gourmande";
      	private $_icecream = "Glace";
      	private $_custom_ice = "Composez votre coupe";
      	private $_alc_ice = "La coupe alcolisée";
      	private $_noon = "Midi";
      	private $_evening = "Soirée";
      	private $_boissons = "Boisson";
      	private $_vins = "Vin";

      	//VARIABLES POUR LA PARTIE HEAD::TITLE DU TEMPLATE
      	private $_table = "Gestion des tables";
      	private $_galery = "Galerie";
      	private $_gestionnaire = "Gestionnaire";
      	private $_modify = "Modification des plats";
      	private $_add = "Ajout de plat";
      	private $_Not_Found = "Page non trouvé";

      	public function title_page($title)
      	{
      		if(stristr($title, '_'))
			{
				$cache = explode("_", $title);
				if(count($cache) <= 2)
				{
					$title = $cache[1];					
				}
				else
				{
					$title = $cache[1] . "_" . $cache[2];
				}
			}
			
			$title = "_" . $title;
			return $this->$title;
      	}

      	public function name_cat($cat)
      	{
      		$tab = [];
		    $cache = explode("-", $cat);
		    $mainCat = $cache[0];
		    $sub_cat = $cache[1];

		    $mainCat = ucfirst($mainCat);

		    $chaine = "_" . $sub_cat;
		    $sub_cat = $this->$chaine;

		    $tab[] = $mainCat;
		    $tab[] = $sub_cat;

		    return $tab;
		}

		public static function identity_verification()
		{
			Require('../class/Pages.php');
		    $Pages = new Pages();
		    header('Location: ../index.php?p=' . $Pages->page("login"));
		    die();
		}

		public function create_html_table($req, $button_gestion_modifier = false, $button_gestion_supprimer = false, $page = "acceuil", $page_mod_gal = "")
		{
			$html = "";
			while($res = $req->fetch(PDO::FETCH_ASSOC))
			{
				$html .= '<tr>';

				foreach ($res as $data => $value)
				{
					$html .= '<td>';
					if($data != "description")
		            {
		              if($data == "category" || $data == 'path_image')
		              {
	                  	$cat_tab = $this->name_cat($res['category']);
		                if($data != 'category')
		                {
		                  $html .= $cat_tab[0];
		                }
		                else
		                {
		                  $html .= $cat_tab[1];
		                }
		              }
		              else
		              {
		                  if($data == 'price')
		                  {
		                      $html .= $value . "&euro;";
		                  }
		                  else
		                  {
		                      $html .= $value;
		                  }
		              }
		            }
		            elseif(strlen($value) <= 50)
		            {
		            	
		                $html .= $value;
		            }
		            else
		            {
		                $html .= "<p style=\"color: purple; text-decoration: underline; cursor: pointer;\" onclick=\"view_description('" . addcslashes($value, "\000\n\r\\'\"\032") . "')\">voir la description</p>";
		            }
		            $html .= '</td>';
				}

				//RECUPERATION DES CATEGORIES ET SOUS CATEGORIES -- EN FRANCAIS ET SEPARER
				if(isset($res['category']))
				{
					$cat = $this->name_cat($res['category']);

					//PARAMETRE FONCTION PREVIEW DU BOUTON VOIR
					$param_preview = "'" . addslashes($res['path_image']) . "','" . addslashes($res['name']) . "','" . addslashes($res['price']) . "','" . addcslashes($res['description'], "\000\n\r\\'\"\032") . "','" . addslashes($res['cur_date']) . "','" . addslashes($cat[0]) . "','" . addslashes($cat[1]) . "'";
				}
				else
				{
					$param_preview = "'" . addslashes($res['image']) . "', null, null, null, null, null , null,'" . addslashes($res['desc_alt']) . "'";
				}

				//die($param_preview);

				//STYLE BUTTON VOIR, MODIFIER, SUPPRIMER
				$td_style = "style=\"width: calc(20% / 3);\"";

				//CONSTRUCTION DE LA FONCTION JS PREVIEW
				$js_preview_button = "onclick=\"preview(" . $param_preview . ");\"";

				$button = "<button class=\"btn btn-secondary\" style=\"padding: 10px;\" " . $js_preview_button . ">";

				//CONSTRUCTION FINALE DU BOUTON VOIR
	            $html .= "<td " . $td_style . ">". $button . "Voir</button></td>";

	            if($button_gestion_modifier)
	            {
	            	$Pages = new Pages();
	            	//CONSTRUCTION DU BOUTON MODIFIER
	            	if($page_mod_gal == "")
	            	{
		            	$html .= "<td " . $td_style . "><a href=\"index.php?p=" . $Pages->page('food_modify') . "&amp;id=" . $res['id'] . "\"><button class=\"btn btn-secondary\" style=\"padding: 10px;\">Modifier</button></a></td>";
	            	}
	            	else
	            	{
	            		$html .= "<td " . $td_style . "><a href=\"index.php?p=" . $Pages->page($page_mod_gal) . "&amp;id=" . $res['id'] . "\"><button class=\"btn btn-secondary\" style=\"padding: 10px;\">Modifier</button></a></td>";
	            	}
	            }
	            if($button_gestion_supprimer)
	            {
		            //CONSTRUCTION DU BOUTON SUPPRIMER
		            $html .= "<td " . $td_style . "><button class=\"btn btn-secondary\" style=\"padding: 10px;\" onclick=\"remove(" . $res['id'] . ",'" . $page . "');\">Supprimer</button></td>";	
	            }


	            $html .= "</tr>";
			}

			return $html;
		}

		public function display_dishes_order_by($trie_par, $order = 'DESC')
		{
			$bdd = new Database();

			$data = [];

			$data[] = $trie_par;

			$data[] = "plus grand au plus petit";

			if($trie_par == 'date')
			{
				$data[1] = "plus récent au plus ancien";
			}
			if($trie_par == 'prix')
			{
				$data[1] = "plus chère au moins chère";
			}

			if($order == 'ASC')
			{	
				$data[1] = "plus petit au plus grand";

				if($trie_par == 'date')
				{
					$data[1] = "plus ancien au plus récent";
				}
				else if($trie_par == 'prix')
				{
					$data[1] = "moins chère au plus chère";
				}
			}

			if($order == 'ASC')
			{
				switch ($trie_par)
				{
					case 'id':
						$req = $bdd->prepare('SELECT * FROM plat ORDER BY id ASC', [], false);
						break;

					case 'date':
						$req = $bdd->prepare('SELECT * FROM plat ORDER BY cur_date ASC', [], false);
						break;

					case 'prix':
						$req = $bdd->prepare('SELECT * FROM plat ORDER BY price ASC', [], false);
						break;
				}
			}
			if($order == 'DESC')
			{
				switch ($trie_par)
				{
					case 'id':
						$req = $bdd->prepare('SELECT * FROM plat ORDER BY id DESC', [], false);
						break;

					case 'date':
						$req = $bdd->prepare('SELECT * FROM plat ORDER BY cur_date DESC', [], false);
						break;

					case 'prix':
						$req = $bdd->prepare('SELECT * FROM plat ORDER BY price DESC', [], false);
						break;
				}
			}

			$data[] = $req;

			return $data;
		}
	}