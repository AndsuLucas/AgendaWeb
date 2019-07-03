<?php 

namespace Server\Model;
use PDO;

abstract class Database 
{						
	


	public  function connect()
	{	
									 //array de configuração presente em config.php	
		$connection  = "mysql:host=". DATABASE["host"].   ";";
		$connection .= "dbname=".     DATABASE["dbname"]. ";";
		$connection .= "charset=".    DATABASE["charset"]    ;
		
		try {
			
			$db = new PDO($connection, DATABASE["user"], DATABASE["password"]);
			$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
			
		} catch (PDOException $e) {
			
			return $e->getMessage();
		
		}
		
		return $db;

	}

}