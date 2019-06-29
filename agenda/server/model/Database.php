<?php 

namespace Server\Model;
use PDO;

abstract class Database 
{

	public function connect()
	{
		
		$db = new PDO("mysql:host=localhost;dbname=agenda;charset=utf8",'root','password');
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
		return $db;

	}

}