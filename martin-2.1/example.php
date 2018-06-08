<?php
	namespace Martin;

	// Example page
	class Example {
		public static function index()
		{
			$title = "Example page";

			/*$darbinieki = \Martin\system\Database::$mysql->query('
				SELECT test FROM test
			')->fetchAll();


			$postgres_users = \Martin\system\Database::$pgsql->query('
				SELECT "test" FROM test
			')->fetchAll();*/


			// Render index.php
			require_once 'layout/header.php';
			require_once 'layout/example/index.php';

		}
	}
?>
