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
	$password = addslashes($request->getParam("senha"));

	$model         = new Server\Model\Model("todolist");
	$dados_usuario = $model->login("usuario", $login, $password);

	
	if (count($dados_usuario) !== 0){
		$_SESSION["SESSAO_USUARIO"]["LOGIN"] = true;
		$_SESSION["SESSAO_USUARIO"]["NOME"]  = $dados_usuario["nome_usuario"];
		
		

		return $response->withRedirect('/?page=agenda', 302);
		
		
	}

	$_SESSION["mensagem"] = "Login ou Senha inválidos";
	
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
	
	
	if (!checkLogin()) {

		return $response->getBody()->write("PERMISSÃO NEGADA");

	}

	$model = new Server\Model\Model("todolist");
	
		
	$result = $model->selectAll();

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