<?php
	namespace Martin\system;

	class init {
		public static function init() {
			ini_set('display_errors', 1);
			ini_set('display_startup_errors', 1);
			error_reporting(E_ALL);

			defined("LAYOUT_PATH") or define("LAYOUT_PATH", realpath(__DIR__ . DIRECTORY_SEPARATOR . '..') . '/layout/');

		    require_once 'Database.php';
		    require_once 'Base.php';
		    require_once 'Debugger.php';
		    require_once 'example.php';

			\Martin\system\Database::connect();
			\Martin\system\init::routes();
		}

		public static function routes() {
			// $page = class
			// $do 	 = function
			if (isset($_GET['page']) && isset($_GET['action'])) {
				$page = $_GET['page'];
				$action   = $_GET['action'];
			} else {
				$page = 'example';
				$action   = 'index';
				$_GET['page'] = 'example';
				$_GET['action'] = 'index';
			}

			$page = ucfirst($page); //capitalize $page

			// We need \\ because it escapes ' otherwise
			$class = '\Martin\\' . $page;


			$class::$action();
		}
	}
?>