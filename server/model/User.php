<?php  
namespace Server\Model;

use Server\Model\Model;

class User extends Model
{

	public function login($login, $password)
	{

		$sql 	= "SELECT * FROM $this->table WHERE email = ? AND senha = ?";
		$select = $this->database->prepare($sql);
		
		$select->bindValue(1,$login);
		$select->bindValue(2,$password);

		$select->execute();

		$result = $select->fetch();
		
		//debug($result);
		return $result;
	}
}