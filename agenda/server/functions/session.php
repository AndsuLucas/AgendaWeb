<?php  
function getMessage() {
	if (isset($_SESSION["mensagem"])) {
		$msg = $_SESSION["mensagem"];
		//destruindo a  variável para evitar que ela apareça na hora errada.	
		unset($_SESSION["mensagem"]);
		return "<p class='alert alert-danger' >".$msg."</p>";
	}
}

//função responsável por checar o login
function checkLogin() {
	
	if (!$_SESSION["SESSAO_USUARIO"]["LOGIN"]) {
		return false; 
	}

	return true;
}