/*
*  AUTHOR: Anderson Lucas Silva de Oliveira
*	//						   //							
*		AGENDA INTELIGENTE COM 
*		API REST E AJAX	//
*  //                         //
*
*/


//intermédio back-front JQUERY
$(document).ready(function(){
	//variavel para guardar o ultimo elemento clicado
	//uso isso no evento de edição para não bugar o sistema.
	var lastClicked;
	//onde as tarefas estão sendo guardadas
	var tarefas = new Array();
	//envia dados para serem gravados no banco de dados
	function salvarTarefa(item) {
		var info = {"item":item};
		$.ajax({
			method: "post",
			data: info,
			url: "https://agendadoanderson.herokuapp.com/server/index.php/insert"
		}).done(function(){
			retornarTarefas();
		});
	}
	//função responsável por informar alterações e falhas ao usuário
	function adicionarMesagem(mensagem, success) {
		const type = success || false;
		if (type) {
			$("#mensagem").append(
				$("<p />").text(mensagem)
					.addClass("alert alert-success")
				)
					
			setTimeout(function(){
				$("#mensagem").children("p").fadeOut()
				$("#mensagem").empty();
			},2000);		
		} else {
			$("#mensagem").append(
				$("<p />").text(mensagem)
					.addClass("alert alert-danger")
				)
				
			setTimeout(function(){
				$("#mensagem").children("p").fadeOut()
				$("#mensagem").empty();
			},2000);
		}
	}


	//VALIDA O PREOCESSO DE INSERÇÃO DE DADOS [INPUT]
	function adicionarTarefa(event) {
			//AO PRESSIONAR ENTER
		if(event.which === 13){
			var item = $(this).val().trim();
			if(item.length === 0){
				adicionarMesagem("Adicione algum conteúdo");
				return false;
			} else {
				adicionarMesagem("Conteúdo adicionado com sucesso",true);
				$(this).val("");
				salvarTarefa(item);
			}
		}

	}
	

	$("#add-item").keydown(adicionarTarefa);
	function salvarEdicao(novoTexto,id_texto) {
			var parametros = {texto: novoTexto}
			
			lastClicked = undefined;

			$.ajax({
				url: "https://agendadoanderson.herokuapp.com/server/index.php/update/"+id_texto,
				data: parametros,
				method: "put"

			}).done(function(response){
				retornarTarefas();
			})
			

	}
	function editarTarefa() {
		var item = $(this).parent();
		if(!$(this).is(lastClicked)){
			
			var conteudo = $(item).children(".text-item").text();
	
						
			$(item).children("text-item").remove();
			item.append(
					$("<textarea/>")
						.addClass("form-control col-md-12")
						.val(conteudo)
						.css("margin-top","25px")
						.addClass("input-edit")
				);

			$(item).children("#edit").text("Salvar Edição");
			lastClicked = $(this);


		}else{
			var idItem = $(item).children(".checkbox-item").val();
			salvarEdicao($(".input-edit").val(), idItem);
			
		}

	}
	//fazer essa função apenas me retornar todos os valores
	function retornarTarefas() {
		$("#lista-tarefas").empty();
		tarefas = [];
		$.ajax({
			method: "get",
			url: "https://agendadoanderson.herokuapp.com/server/index.php/viewall",
			dataType: "json"
		}).done(function(response){
			$(response).each(function(posicao, elemento){
				/*
					Arrumar um jeito de fazer este select apenas uma vez.
					Armazenar em um localstorage etc para evitar ficar dando select sempre..

					
				*/
				tarefas.push(elemento);
				$("#lista-tarefas").append(
					$("<li />").addClass("list-group-item").append(
						$("<div / >").addClass("checkbox").attr("id","item")
							.append(
							$("<input />")
								.attr("type","checkbox")
								.addClass("checkbox-item")
								.attr("value",elemento.id)
							).append(
							$("<label />")
								.attr("for","checkbox")
								.addClass("text-item")
								.text(elemento.conteudo)
								
							).append(
							$("<p />")
								.attr("id","edit")
								.text("editar")
								.append($("<span />")
									.addClass("glyphicon glyphicon-pencil")
								).click(editarTarefa)
							)
					)
				);
			});
		});
	}


	retornarTarefas();
	

	$("#attLista").click(retornarTarefas);
	
	function confirmarExclusaoTarefas(){
		var confirmacao = confirm("Deseja mesmo deletar estas tarefas?")	
		if (confirmacao) {
			
			deletarTarefa();
		} else {

		}
		
	}

	function deletarTarefa() {
		
		var items   = $(".checkbox-item");
		//perguntar antes de deletar depois
		$(items).each(function(position,value){
			if ($(value).prop("checked")) {
				$.ajax({
					method: 'delete',
					url:  "https://agendadoanderson.herokuapp.com/server/index.php/delete/"+$(value).val(),
					dataType: "json"
				}).done(function(response){
					var jsonResponse = JSON.parse(response);
					console.log(jsonResponse);
				});
			}
		});
		retornarTarefas();
	}
	
	$("#deletar").click(confirmarExclusaoTarefas);
	

	function procurarTarefa(event) {
		const texto = $(this).val();
		$("#lista-tarefas").empty();
			$(tarefas).each(function(posicao,elemento){
				if (elemento.conteudo.match(texto)) {

					$("#lista-tarefas").append(
						$("<li />").addClass("list-group-item").append(
							$("<div / >").addClass("checkbox").attr("id","item")
								.append(
									$("<input />")
									.attr("type","checkbox")
									.addClass("checkbox-item")
									.attr("value",elemento.id)
								).append(
									$("<label />")
									.attr("for","checkbox")
									.addClass("text-item")
									.text(elemento.conteudo)
								).append(
									$("<p />")
									.attr("id","edit")
									.text("editar")
									.append($("<span />")
									.addClass("glyphicon glyphicon-pencil")
									).click(editarTarefa)
								)
						)
					);
				}

			});
		
	}
	$("#search-item").keyup(procurarTarefa);
});
