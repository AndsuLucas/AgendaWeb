<?php
if (!session_start()) {
	session_start();
}
if (!$_SESSION["SESSAO_USUARIO"]["LOGIN"]) {
	header("location: /public/login.php");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Agenda</title>
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="https://unpkg.com/feather-icons"></script>
		<style>
			.list-group-item{
				position: relative;
			}#edit{
				position: absolute;
				right: 5px;
				bottom: 0;
				cursor: pointer;
				margin: 0px;
			}#opcoes_usuario button{
				margin-right: 5px;
				margin-top: -5px;
				border-radius: 0px;
			}#div-pesquisa-main, #div-add-main{
				width: 100%;
				margin-top: 15px;
					
			}#search-item, #add-item{
				width: 94%;
			}#div-button-pesquisa, #div-button-add{
				display: inline;
				margin-left: -5px;
				
			}#btn-pesquisar, #btn-add{
				padding: 2px 12px;
			}

		</style>
	</head>
	<body style="padding: 0;">
		<div class="modal" tabindex="-1" role="dialog" id="delete-modal">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="delete-modal-title">Confirmar exclusão de notas</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<p>Deseja mesmo excluir estas anotações ?</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal" id="cancelar">Cancelar</button>
						<button type="button" class="btn btn-success" id="confirmar">Confirmar</button>
					</div>
				</div>
			</div>
		</div>
		<div class="panel panel-primary" style="border-radius: 0px;">
			<div class="panel-heading" id="cabeçalho" style="border-radius: 0px;">
				<span class="glyphicon glyphicon-list"></span>  Lista de tarefas -  <strong><?= $_SESSION["SESSAO_USUARIO"]["NOME"]?> </strong>
				<div class="btn-group pull-right" id="opcoes_usuario">
					<form method="POST" action="/server/index.php/logout" style="display: inline;">
						<button type="submit" class="btn btn-danger btn-sm" id="logout">Sair</button>
					</form>
					<button id="deletar"><span class="glyphicon glyphicon-trash"></span>Delete</button>
					<button id=""><span class="glyphicon glyphicon-flag"></span>Flag</button>
				</div>
				</div><!--cabeçalho-->
				</div><!--panel-primary-->
				
				
				<div class="panel-body">
					<div id="mensagem">
					</div>
					<div class="list-group">
						
						<div class="col-md-12">
							<div class="input-group" id="div-add-main">
								<input type="text" id="add-item" class="form-control" placeholder="Adiciona nova Tarefa">
								<div class="input-group-prepend" id="div-button-add">
									<button id="btn-add" class="btn btn-outline-secondary" type="button"><span data-feather="check"></span></button>
								</div>
								<!--div-button-add-->
							</div>
							<!--div-add-main-->
						</div>
						
						<div class="col-md-12">
							<div class="input-group" id="div-pesquisa-main">
								<input type="text" class="form-control" placeholder="Pesquisar" aria-label="" aria-describedby="basic-addon1" id="search-item"><!--input-pesquisa-->
								<div class="input-group-prepend" id="div-button-pesquisa">
									<button id="btn-pesquisar" class="btn btn-outline-secondary" type="button"><span data-feather="search"></span></button>
								</div>
								<!--div-button-pesquisa-->
							</div>
							<!--div-pesquisa-main-->
						</div>
					</div>
					<!--inputs [pesquisa] / [nova-tarefa] -->
					<ul class="list-group" id="lista-tarefas">
						<li class="list-group-item">
							<div class="checkbox" id="item">
								<input type="checkbox" class="checkbox-item">
								<label for="checkbox" class="text-item">
									List group item heading
								</label>
								<button><span class="glyphicon glyphicon-pencil"></span>Edit</button>
							</div>
							<!--item-->
						</li>
					</ul>
					<!--lista-tarefas-->
				</div>
				<!--pane-body-->
				<div class="panel-footer" id="rodape">
					<div class="row">
						<div class="col-md-6">
							<h6>Total Count <span class="label label-info">25</span></h6>
						</div>
						<div class="col-md-6">
							<ul class="pagination pagination-sm pull-right">
								<li class="disabled"><a href="javascript:void(0)">«</a></li>
								<li class="active"><a href="javascript:void(0)">1 <span class="sr-only">(current)</span></a></li>
								<li><a href="http://www.jquery2dotnet.com">2</a></li>
								<li><a href="http://www.jquery2dotnet.com">3</a></li>
								<li><a href="http://www.jquery2dotnet.com">4</a></li>
								<li><a href="http://www.jquery2dotnet.com">5</a></li>
								<li><a href="javascript:void(0)">»</a></li>
							</ul>
						</div>
					</div>
				</div>
				<!--rodape-->
				
				<script src="/public/jquery.js"></script>
				<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
				<script src="/public/scripts/interface.js"></script>
				<script>
					feather.replace();
				</script>
		