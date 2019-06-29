<?php 
require_once "./vendor/autoload.php";
if (!session_start()) {
	session_staart();
}
if (isset($_SESSION["SESSAO_USUARIO"]["LOGIN"])) {
	if ($_SESSION["SESSAO_USUARIO"]["LOGIN"]) {

		header("location: /");

	}
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title></title>
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<style>
			#login input{
				border-color:#00004e !important;
			}#mensagem p{
				border-color: #00004e;
				font-weight: bold;
			}#container-externo{
				padding-top: 30px;
			}#container-interno{
				max-width: 400px; 
				margin: 0 auto; 
				border: 2px solid #00000000; 
				border-radius: 5px 5px 5px 5px; 
				padding: 15px; 
				background-color: #ffffff; 
				max-height: 600px; 
				color:#00004e; 
				box-shadow: #85858c 4px 4px 20px 5px;

			}#entrar{
				margin-top: 15px;
				background-color: #00004e;
				border: none;
			}#btn-cadastrar{
				margin-top: 15px;
				background-color: #00004e;
				border: none;
			}body{
				background-color: #010129
			}
		</style>
	</head>
	<body>
		<div class="container" id="container-externo">
			<div class="container" id="container-interno">
				<div id="mensagem">
					<?=getMessage()?>
				</div> <!--mensagem-->
				<h2 class="text-center"> Login - [ Agenda ]</h2>
				<form action="http://localhost:8000/server/login" id="login" method="POST">
					<label for="">Usuário</label>
					<input type="text" class="form-control" id="usuario" name="usuario" autocomplete="off">
					<label for="">Senha</label>
					<input type="password" class="form-control" id="senha" name="senha" autocomplete="off">
					<input type="submit" name="submit" value="ENTRAR" class="btn btn-primary col-md-12 col-sm-12 col-lg-12" id="entrar">
					<a href="#" class="btn btn-primary col-md-12 col-sm-12 col-lg-12" id="btn-cadastrar">CADASTRAR-SE</a>
					<div class="text-center" style="padding-top: 2rem;">
						<small>
							<strong>	
								<a href="#" style="color:#00004e;">	Esqueci Minha Senha</a>
							</strong>
						</small>
					</div>
					
				</form><!-- login -->
			</div><!--continer interno [ estilização] [margin] -->
		</div><!--container de externo [ padding] -->
		
  			
  			<footer style="position:absolute; bottom: 0; width: 100%; min-height: 100px;" class="text-center">
  				
  					<div class="container col-md-12">
  						<p style="color:white;">Desenvolvido por <span style="border-bottom: 2px groove white;"><strong>Anderson Lucas</strong></span></p>
  					</div>
  			
  				
  			</footer>
		
		<script src="/public/jquery.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
		<script>
			$(document).ready(function(){
				$("#login").submit(function(){
					const usuario = $("#usuario").val().trim();
					const senha   = $("#senha").val().trim();

					if (usuario.length === 0) {
						$("#mensagem").empty();
						//adicionando uma mensagem de erro na div #mensagem 
						$("#mensagem").append(
								
								$("<p />").addClass("alert alert-danger")
									.text("O usuário deve ser digitado.")

							);

						setTimeout(function(){
							
							$("#mensagem").empty();

						},2000);
						$("#usuario").focus();
						return false;

					}if (senha.length === 0) {
						$("#mensagem").empty();
						//adicionando uma mensagem de erro na div #mensagem 
						$("#mensagem").append(
								
								$("<p />").addClass("alert alert-danger")
									.text("A senha deve ser digitada.")

							);

						setTimeout(function(){
							
							$("#mensagem").empty();

						},2000);
						$("#senha").focus();
						
						return false;

					} else {

						return true;

					}	

				
				});




			});
		</script>
	</body>
</html>