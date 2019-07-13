<?php
require_once "./vendor/autoload.php";
if (checkLogin()) {
	header("location: /?page=agenda");
}

?>
<link rel="stylesheet" href="./public/css/login.css">
<div class="container" id="container-externo">
	<div class="container" id="container-interno">
		<div id="mensagem">
			<?=getMessage()?>
		</div> <!--mensagem-->
			<h2 class="text-center"> Login - [ Agenda ]</h2>
			<form action="/server/insex.php/login" id="login" method="POST">
				<label for="">Usuário</label>
				<input type="text" class="form-control" id="usuario" name="usuario" autocomplete="off">
				<label for="">Senha</label>
				<input type="password" class="form-control" id="senha" name="senha" autocomplete="off">
				<input type="submit" name="submit" value="ENTRAR" class="btn btn-primary col-md-12 col-sm-12 col-lg-12" id="entrar">
				<a href="./?page=cadastro" class="btn btn-primary col-md-12 col-sm-12 col-lg-12" id="btn-cadastrar">CADASTRAR-SE</a>
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
