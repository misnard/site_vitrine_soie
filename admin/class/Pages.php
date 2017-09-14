<?php

	class Pages{
		// VARIABLES PAGES
		private $_login = "log";
		private $_food_table = "food_table";
		private $_food_add = "food_add";
		private $_food_modify = "food_modify";
		private $_food_gestionnaire = "food_gestionnaire";
		private $_food_remove = "food_remove";
		private $_galery = "galery";
		private $_galery_modify = "galery_modify";
		private $_logout = "logout";

		//VARIABLES PAGE D'ERREUR
		private $_error_404 = "404_Not_Found";

		//VARIABLES MODULES
		private $_mod_food_add = "module_food_add.php";
		private $_mod_food_modify = "module_food_modify.php";
		private $_mod_log_admin = "module_log_admin.php";
		private $_mod_galery_add = "module_galery_add.php";
		private $_mod_galery_modify = "module_galery_modify.php";

		public function page($page){

			$name_page = "_" . $page;

			if(!isset($this->$name_page))
			{
				return $this->_error_404;
			}

			return $this->$name_page;
		}
	}
?>