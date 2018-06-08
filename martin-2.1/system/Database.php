<?php
	namespace Martin\system;
   
	class Database {
		public static $mysql = null;
		public static $pgsql = null;
		
		public static function connect() { /*
			if (is_null(self::$mysql)) {
				$dsn = "mysql:host=localhost;dbname=DB_NAME;charset=utf8mb4";
				
				$opt = [
							\PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
							\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
							\PDO::ATTR_EMULATE_PREPARES   => false,
					   ];
					   
				self::$mysql = new \PDO($dsn, 'DB_USER', 'DB_PASSWORD', $opt);
			}
			
			
			if (is_null(self::$pgsql)) {
				$dsn = "pgsql:host=127.0.0.1;port=5432;dbname=DB_NAME;client_encoding=utf8";
				
				$opt = [
							\PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
							\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
							\PDO::ATTR_EMULATE_PREPARES   => false,
					   ];
					   
				self::$pgsql = new \PDO($dsn, 'DB_USER', 'DB_PASSWORD', $opt);
			} */
		}
	}
?>