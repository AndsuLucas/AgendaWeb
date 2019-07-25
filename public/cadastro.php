<link rel="stylesheet" href="./public/css/cadastro.css">
<div class="container" id="container-externo"> 
	<div id="mensagem"> 
		<?= getMessage() ?>
		<ul id="avisoErro" class="alert alert-danger" style="display: none;">
			
		</ul>
	</div>
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
			const nome      = $("#nome");
			const senha     = $("#senha");
			const rptsenha  = $("#rptsenha");
			const email     = $("#email");
			const avisoErro = $("#avisoErro");
			var validation = true;
		
			
			if ($(nome).val().trim().length === 0){
				avisoErro.append(
					$("<li />")
						.addClass("font-weight-bold")
						.text("O campo NOME deve ser inserido")
				);
				validation = false;
				

			}
			if ($(email).val().trim().length === 0){
				avisoErro.append(
					$("<li />")
						.addClass("font-weight-bold")
						.text("O campo E-MAIL deve ser inserido")
				);
				validation = false;
			}
			
			if ($(senha).val().trim().length === 0){
				avisoErro.append(
					$("<li />")
						.addClass("font-weight-bold")
						.text("O campo SENHA deve ser inserido")
				);
				validation = false;

			}
			if ($(rptsenha).val().trim().length === 0){
				avisoErro.append(
					$("<li />")
						.addClass("font-weight-bold")
						.text("O campo REPETIR SENHA deve ser inserido")
				);
				validation = false;
			}
			if ($(senha).val() !== $(rptsenha).val()){
				avisoErro.append(
					$("<li />")
						.addClass("font-weight-bold")
						.text("Senhas não conferem")
				);
				validation = false;
			
			}
			if (!validation){
				avisoErro.css("display", "block");
				return validation;
			}
			
			
		});
		
		
	});
</script>