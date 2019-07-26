<?php  
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

if (!session_start()) {
	session_start();
}
$app = new \Slim\App;



//login

$app->post("/login", function(Request $request, Response $response){

	$login    = addslashes($request->getParam("usuario"));
	$password = addHashOnPassword($request->getParam("senha"));
	



	$user          = new Server\Model\User("tbl_user");
	$data_user = $user->login($login, $password);

	
	if ($data_user){
		$_SESSION["SESSAO_USUARIO"]["LOGIN"] = true;
		$_SESSION["SESSAO_USUARIO"]["NOME"]  = $data_user["nome"];
		
		

		return $response->withRedirect('/?page=agenda', 302);
		
		exit();
	}

	setMessage("Login ou Senha inválidos");
	
	return $response->withRedirect('/?page=login', 302);
	



	
});
//logout
$app->post("/logout", function(Request $request, Response $response){
	
	session_destroy();

	return $response->withRedirect("/?page=login",302);

});

//inserir novas notas
$app->post('/insert', function (Request $request, Response $response, array $args) {
	
	if (!checkLogin()) {

		return $response->getBody()->write("PERMISSÃO NEGADA");

	}
	$model = new Server\Model\Model("todolist");
	
	
	$contentValue["conteudo"] = addslashes(
		trim($request->getParam("item"))
	);
	

			  //retorna true ou false dependendo do INSERT
	$result = $model->insert($contentValue);
	
	$msg = '{"msg":"Item inserido!" }';
	
	if (!$result) {
		$msg = '{"msg":"O item não foi inserido!"}';
	} 
	
	return $response->getBody()->write(json_encode($msg));
	 

});
//ver TODAS as notas

$app->get("/viewall", function(Request $request, Response $response){
	$select_params=[
		"*"
	];
	
	if (!checkLogin()) {

		return $response->getBody()->write("PERMISSÃO NEGADA");

	}

	$model = new Server\Model\Model("todolist");
	
		
	$result = $model->select($select_params);

	$response->getBody()->write(json_encode($result));
	
	return $response;


});

//deletar alguma nota 
$app->delete("/delete/{id}", function(Request $request, Response $response){

	
	if (!checkLogin()) {

		return $response->getBody()->write("PERMISSÃO NEGADA");

	}

	$id = addslashes((int)$request->getAttribute("id"));
	
	$model = new Server\Model\Model("todolist");
	$result = $model->delete("id",$id);	
		
	$msg = '{"msg":"Usuário deletado com sucesso!"}';

	if (!$result) {

		$msg = '{"msg": "Lamentamos, ocorreu um erro no processamento"}';
	}

	return $response->getBody()->write(json_encode($msg));
});
//atualizando notas

$app->put("/update/{id}", function(Request $request, Response $response){
	
	
	if (!checkLogin()) {

		return $response->getBody()->write("PERMISSÃO NEGADA");

	}

	$id = addslashes((int)$request->getAttribute("id"));
	$contentValue["conteudo"] = addslashes(
		trim($request->getParam("texto"))
	);

	
	$model  = new Server\Model\Model("todolist");
	$result = $model->update($contentValue,"id",$id);
	$msg = '{"msg":"Registro atualizado com sucesso"}';

	
	if (!$result) {
		
		$msg = '{"msg":"Ocorreu um erro"}';
	
	} 	
	
	return $response->getBody()->write(json_encode($msg));
});
//pesquisa	
$app->get("/search", function(Request $request, Response $response){

	
	if (!checkLogin()) {

		return $response->getBody()->write("PERMISSÃO NEGADA");

	}

	$texto = addslashes((string)$request->getParam("conteudo"));

	$model  = new Server\Model\Model("todolist");
	$result = $model->search("conteudo",$texto);
	$num_rows = count($result);

	
	$json_result = json_encode('{"dados":'.json_encode($result).'}');
	
	return $response->getBody()->write($json_result);
});


$app->post("/cadastro", function(Request $request, Response $response){
	//declarando o tipo dos campos para utilizar na função de limpeza 'sanitize'	
	$sanitize_types = [
		
		"nome"     => "s",
		"email"    => "e",
		"senha"    => "p",
		"rptsenha" => "p"
	
	]; 
	//limpando os dados
	$user_data_register = sanitize($sanitize_types);
		//caso o email seja inválido
	if (!emailValidate($user_data_register["email"])){
		setMessage("Email inválido.");
		
		return $response->withRedirect("/?page=cadastro", 302);
		
		
	}
		//caso a senha não esteja igual a repetição
	if (!$user_data_register["senha"] ===  $user_data_register["rptsenha"]) {
		setMessage("Senhas não conferem");

		return $response->withRedirect("/?page=cadastro", 302);	

		
	}
	$user_data_register["senha"] = addHashOnPassword($user_data_register["senha"]);
	unset($user_data_register["rptsenha"]);

	$model  = new Server\Model\Model("tbl_user");
	$result = $model->insert($user_data_register);

	if ($result) {
		
		setMessage("Entre com seu login e senha", "success");
		return $response->withRedirect("/?page=login", 302);
	}

});
