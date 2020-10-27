<?php

include("config.php");

	class Database 
	{
		public function __construct() {
			die('Fonction Init non autorisée');
		}

		public static function connect() {
		// Autoriser une seule connexion pour toute la durée de l’accès
		if ( null == $co )
		{
		  try
		  {
		    $co = new PDO( "mysql:host=".DB_HOST.";"."dbname=".DB_NAME, DB_USERNAME, DB_USERPASSWORD);
		    echo "database REACHED".PHP_EOL;
		  }
		  catch(PDOException $e)
		  {
		    die($e->getMessage()).PHP_EOL;
		    error_log($e->getMessage(), 3, ERROR_LOG_FILE);
		  }
		} 

		return $co;
		}

		public static function disconnect()
		{
		$co = null;
		}
	}

	