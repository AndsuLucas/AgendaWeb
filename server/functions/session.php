<?php  
function getMessage() {
	if (isset($_SESSION["mensagem"])) {
		$msg = $_SESSION["mensagem"];
		//destruindo a  variável para evitar que ela apareça na hora errada.	
		unset($_SESSION["mensagem"]);
		
		return $msg;
	}
}
function setMessage($msg, $type = "danger") {

	if ($type === "danger") {

		$_SESSION["mensagem"] = "<p class='alert alert-danger' >".$msg."</p>";

		return;
	

	}

	$_SESSION["mensagem"] = "<p class='alert alert-success' >".$msg."</p>";

}

//função responsável por checar o login
function checkLogin() {
	
	if (isset($_SESSION["SESSAO_USUARIO"]["LOGIN"])) {
		
		if (!$_SESSION["SESSAO_USUARIO"]["LOGIN"]) {
			
			return false; 
		
		}
	
		return true;
	}
	return false;
}