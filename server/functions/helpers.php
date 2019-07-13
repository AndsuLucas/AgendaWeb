<?php  
function debug($dump)   {
    echo "<pre>";

    var_dump($dump);

    echo "</pre>";

    die("finish_code");

}

function sanitize(array $values) {
	$sanitized_values = [];
	
	foreach ($values  as $key => $type){
		
		switch ($type) {
				 	
			case "e": //emails
				
				$sanitized_values[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_EMAIL);
				$sanitized_values[$key] = filter_var($sanitized_values[$key], FILTER_SANITIZE_MAGIC_QUOTES);

				break;
				 
			case "s": //strings
				
				$sanitized_values[$key] = trim(preg_replace('/[^a-zA-z]/', trim(" "), $_POST[$key]));
				
				break;
				 
			case "p": //passwords
				$sanitized_values[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_MAGIC_QUOTES);
				break;
			/*
				decidir um default dps
				default:
				
				break;
			*/
		
		}

	}
	
	return $sanitized_values;
}

function emailValidate($email){

	if (filter_var($email, FILTER_VALIDATE_EMAIL)){
		return true;
	}
	return false;
}

function addHashOnPassword($psswd) {

	return sha1($psswd.SECRETKEY);

}