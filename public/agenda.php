<?php
if (!checkLogin()) {
	header("location: /?page=login");

}

?>
<link rel="stylesheet" href="public/css/agenda.css">
<div class="panel panel-primary" style="border-radius: 0px;">
	<div class="panel-heading" id="cabeçalho" style="border-radius: 0px;">
		<span class="glyphicon glyphicon-list"></span>  Lista de tarefas -  <strong><?= $_SESSION["SESSAO_USUARIO"]["NOME"]?> </strong>
		<div class="btn-group pull-right" id="opcoes_usuario">
			<form method="POST" action="/server/index.php/logout" style="display: inline;">
				<button type="submit" class="btn btn-danger btn-sm" id="logout">Sair</button>
			</form>
			<button id="deletar"><span class="glyphicon glyphicon-trash"></span>Delete</button>
			<button id=""><span class="glyphicon glyphicon-user"></span>User</button>
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
					<button id="btn-add" class="btn btn-outline-secondary" type="button"><span class="glyphicon glyphicon-plus-sign"></span></button>
				</div>
				<!--div-button-add-->
			</div>
			<!--div-add-main-->
		</div>
		
		<div class="col-md-12">
			<div class="input-group" id="div-pesquisa-main">
				<input type="text" class="form-control" placeholder="Pesquisar" aria-label="" aria-describedby="basic-addon1" id="search-item"><!--input-pesquisa-->
				<div class="input-group-prepend" id="div-button-pesquisa">
					<button id="btn-pesquisar" class="btn btn-outline-secondary" type="button"><span class="glyphicon glyphicon-search"></span></button>
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



<script src="/public/scripts/interface.js"></script>
