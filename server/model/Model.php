<?php  

namespace Server\Model;

use Server\Model\Database;

//na vdd preciso deixar essa classe abstrata
class Model
{
	protected $table;
	protected $database;
	
	public function __construct($choice_table)
	{

		$this->database = Database::connect();
		$this->table    = $choice_table;
	}

	public function insert(array $values)
	{	
		//INSERT INTO THIS->TABLE (ARRAY_KEYS) VALUES (:ARRAY_KEYS)
		$sql  = "INSERT INTO ";
		$sql .= $this->table;
		$sql .= " (".implode(",", array_keys($values)).") ";
		$sql .= "VALUES (:".implode(",:",array_keys($values)).")";

	  	$insert = $this->database->prepare($sql);
	  	$result = $insert->execute($values);

	  	return $result;
	}

	public function select(array $fields)
	{
		$sql  = "SELECT ";
		$sql .= implode(", ",$fields)." FROM $this->table";
		
		$select = $this->database->prepare($sql);
		$select->execute();
		$result = $select->fetchAll();
		
		return $result;
	}

	public function delete($field, $value)
	{
		$sql = "DELETE FROM $this->table WHERE $field = :$field ";

	

		$delete = $this->database->prepare($sql);
		$delete->bindValue(":".$field, $value);

		$result = $delete->execute();

		return $result;
	}

	public function update(array $fields, $where_field, $where_value)
	{	
		$sql   = "UPDATE $this->table SET";
		$where = " WHERE $where_field = $where_value";
		
		foreach ($fields as $key => $values) {

			$sql .= " $key = :".$key;
		 

		}

		$sql   .= $where;	
		$update = $this->database->prepare($sql);


		$result = $update->execute($fields);
		
		return $result;
	}

	public function search($field, $content)
	{
		
		$sql  = "SELECT * FROM $this->table WHERE $field LIKE ";
		$sql .= "'%".$content."%'";

		$select = $this->database->prepare($sql);
		$select->bindValue(":field",$field);
		$select->execute();

		$result = $select->fetchAll();

		return $result;

	}


}
