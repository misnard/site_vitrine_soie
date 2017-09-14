<?php

	class Event
	{

		static function displayAlert()
		{
			$tab = ["DANGER", "WARNING", "SUCCESS", "INFO"];
			$tab_alert_name = ["ERREUR", "ATTENTION", "SUCCES", "INFORMATION"];

			for ($i=0; $i < 4; $i++)
			{ 
				if(isset($_SESSION['ALERT'][$tab[$i]]))
				{
					$alert = strtolower($tab[$i]);
					$class = "class=\"alert alert-" . $alert . "\"";
					$style = " style=\"margin-top:20px;\"";

					echo "<div class=\"col-xs-11 pop_alert\" data-notify=\"container\" style=\"cursor: pointer; z-index: 501; position: fixed;\" onclick=\"document.querySelector('.pop_alert').style.display = 'none';\"><div " . $class . $style . "> <button type=\"button\" aria-hidden=\"true\" class=\"close\" onclick=\"document.querySelector('.pop_alert').style.display = 'none';\">×</button> <span><b>" . strtoupper($tab_alert_name[$i]) . " - </b> " . $_SESSION['ALERT'][$tab[$i]]. "</span></div></div>";

					unset($_SESSION['ALERT'][$tab[$i]]);
				}
			}
		}
	}

?>