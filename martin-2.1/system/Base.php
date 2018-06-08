<?php
	namespace Martin\system;

	class Base {
		public static function date_lv($date) {
			$eng = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
			$lat = array("Janvāris", "Februāris", "Marts", "Aprīlis", "Maijs", "Jūnijs", "Jūlijs", "Augusts", "Septembris", "Oktobris", "Novembris", "Decembris");

			return str_replace($eng, $lat, $date);
		}


		/*
		 * $parameters - kādus parametrus pievienot vai mainīt
		 * parameters = "param=value&param2=value2...";
		 * Nolasam no GET visus parametrus un tad vēl pieliekam klāt
		 * savējos vai izmainam tos un no tā izveidojam jaunu URL
		 */
		public static function createURL($parameters = null) {
			if ($parameters != null) {
				$parameters = explode("&", $parameters);
			}

			$url_parameters = array();

			// Let's add all the parameters from URL
			foreach ($_GET as $get_key => $get_value) {
				$url_parameters[$get_key]  = $get_value;
			}


			// Update or add our submitted parameters
			if ($parameters != null) {
				foreach ($parameters as $parameter) {
					$parameter_key = substr($parameter, 0, strpos($parameter, "="));
					$parameter_value = substr($parameter, strpos($parameter, "=") + 1, strlen($parameter));

					$url_parameters[$parameter_key]  = $parameter_value;

					// Delete if left empty
					if ($parameter_value == "") unset($url_parameters[$parameter_key]);
				}
			}


			// page.php?
			$url = basename($_SERVER['SCRIPT_NAME']) . "?";

			// add all our parameters to url
			foreach ($url_parameters as $p_key => $p_value) {
				$url .= $p_key . "=" . $p_value . "&";
			}

			// get rid of that annoying & at the end
			$url = rtrim($url, "&");

			return $url;
		}



		public static function isAdmin() {
			if (isset($_SESSION)) {
		        if ($_SESSION['user_role'] == "moderator" || $_SESSION['user_role'] == "administrator" || $_SESSION['user_role'] == "teamleader") {
		            return true;
		        } else {
		            return false;
		        }
		    } else {
		    	return false;
		    }
 		}
	}
?>