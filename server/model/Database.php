<?php 

namespace Server\Model;
use PDO;

abstract class Database 
{						
	


	public  function connect()
	{	
									 //array de configuração presente em config.php	
		$connection  = "pgsql:host=". DATABASE["host"].";port=".DATABASE["port"].   ";";
		$connection .= "dbname=".     DATABASE["dbname"];
		
		
		try {
			
			$db = new PDO($connection, DATABASE["user"], DATABASE["password"]);
			$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);

			
		} catch (PDOException $e) {
			
			return $e->getMessage();
		
		}
		
		return $db;

	}

}

Database::connect();