<link rel="stylesheet" href="./public/css/cadastro.css">
<div class="container" id="container-externo"> 
	<div id="mensagem"> <?= getMessage() ?></div>
	<form id="frm-cadastro" method="POST" action="#">
		<h1 class="text-center">Cadastro</h1>
		<div class="form-group">
			<label for="nome" class="lbl">Nome</label>
			<input type="text" class="form-control" id="nome" name="nome" value="">
		</div>
		<div class="form-group">
			<label for="email" class="lbl">Email</label>
			<input type="email" class="form-control" id="email" name="email" value="">
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="senha" class="lbl">Senha</label>
				<input type="password" class="form-control" id="senha" name="senha" value="">
			</div>
			<div class="form-group col-md-6">
				<label for="rptsenha" class="lbl">Repetir senha</label>
				<input type="password" class="form-control" id="rptsenha" name="rptsenha" value="">
			</div>
		</div>
		<div>
			<input type="submit" class="btn btn-primary col-md-12" value="CADASTRAR" id="cadastrar" >
		</div>
	</form>
</div>
<script>
	$(document).ready(function(){
		const formulario = $("#frm-cadastro");
		
		 $(formulario).submit(function(event){
			const nome     =  $("#nome");
			const senha    = $("#senha");
			const rptsenha = $("#rptsenha");
			const email    = $("#email");
			
			var validation = true;
		
			
			if ($(nome).val().trim().length === 0){
			
				$(nome).css("background-color", "#ff000061")
				validation = false;
				

			}
			if ($(email).val().trim().length === 0){
				$(email).css("background-color", "#ff000061")
				validation = false;
			}
			
			if ($(senha).val().trim().length === 0){
				$(senha).css("background-color", "#ff000061")
				validation = false;

			}
			if ($(rptsenha).val().trim().length === 0){
				$(rptsenha).css("background-color", "#ff000061")
				validation = false;
			}
			if ($(senha).val() !== $(rptsenha).val()){
				$(senha).css("background-color", "#ff000061");
				$(rptsenha).css("background-color", "#ff000061");
				validation = false;
			
			}

			return validation;
			
			
			
		});
		
		
	});
</script>