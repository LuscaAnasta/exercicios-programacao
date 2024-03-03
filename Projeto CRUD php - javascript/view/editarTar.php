<?php
    $id = $_GET['id'];
?>

<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Cadastrar uma Tarefa</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
	
	<style>
		.corH{
			background-color: aqua;
			text-align: center;
		}
		.flex{
				display: flex;
		}
		.divs{
			width: 930px;
			margin-top: 40px;
			margin-left: auto;
			margin-right: auto;
			padding-left: 80px !important;
			padding-right: 80px !important;
			padding: 30px;
			box-shadow: black 2px 2px 2px;
		}
		.divmeio{
			margin-left: auto;
			margin-right: auto;
			
		}
		.divmeio1{
			padding-right: 20px !important;
			
		}
		.divmeio2{
			padding-left: 20px !important;
			
		}
		.cor1{
			background-color: lightblue;
		}
		button{
			padding-left: 170px;
			padding-right: 170px;
			align-items: center;
			border-radius: 4px;
		}
		input{
			width: 340px;
		}
		.h1c{
			text-align:center;
		}
		.h1d{
			padding-left: 12px;
		}
		.desc{
			padding-bottom: 200px;
			margin-left: 12px;
			width: 746px;
			
		}
	</style>
</head>

<body>
	<header class="corH" >
		<h1>Editar uma Tarefa</h1>
	</header>
	
	<input type="hidden" id="idTxt" value="<?php echo $id?>" />
	
	
	<div class="divs cor1">
		<h1 class="h1c">Editar uma Tarefa</h1><br>
		<div class="flex">
			
			<div class="divmeio divmeio1">
			<h4>Titulo da Ação</h4>
			<input type="text" id="tacao" placeholder="Titulo"><br>
			<h4>Inicio</h4>
			<input type="date" id="datain"><br>
			</div>
			<div class="divmeio divmeio2">
			<h4>Usuario ou E-mail</h4>
			<input type="text" id="nuem" placeholder="Usuario ou E-mail"><br>
			<h4>Termino</h4>
			<input type="date" id="datate">
			</div>
			</div>
		<h4 class="h1d">Descrição da Tarefa</h4>
			<input class="desc" type="text" id="desc" placeholder="Descrição Fake"><br>
	<br><br>
		<div style="display: flex">
			<button type="button" id="editarBtn">Atualizar</button> 
			<button type="button" id="cancelarBtn">Cancelar</button> 
		</div>
	</div>
			
			
		
</body>
</html>

<script src="js/jquery-3.6.0.min.js" type="text/javascript"></script>
<script src="js/sweetalert2.all.min.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
				async function carregarDados(id) {
				const config = {
					method: "post",
					headers: {
					'Accept': 'application/json',
					'Content-Type': 'application/json'
					},
					body: JSON.stringify({idTarefa: id })
				};
				
				const request = await fetch('../controller/tarefas/carregarEditar.php',config);
				const response = await request.json();
				const { dados } = response;
				$('#tacao').val(dados[0].titulo);
				$('#desc').val(dados[0].descricao);
				$('#datain').val(dados[0].dt_inicio);
				$('#datate').val(dados[0].dt_termino);
				$('#nuem').val(dados[0].id_usuario);
			}
		async function editarDados(e) {
			
			  const titulo = $('#tacao').val();
			  const desc = $('#desc').val();
			  const dataIn = $('#datain').val();
			  const dataTe = $('#datate').val();
			  const cUsuario = $('#nuem').val();
			  const idTxt = $('#idTxt').val();
			  const config = {
					method: "post",
					headers: {
					  'Accept': 'application/json',
					  'Content-Type': 'application/json'
					},
					body: JSON.stringify({
					  tarefa: titulo,
					  descricao: desc,
					  datain: dataIn,
					  datate: dataTe,
					  usuario: cUsuario,
					  idTarefa: idTxt
					})
				  };

				  const request = await fetch(
					'../controller/tarefas/atualizarTarefa.php',
					config);
				  const response = await request.json();
				  if (response.status === 1) {
					Swal.fire('Atenção!', 'dados atualizados com sucesso', 'success')
					.then(res => window.location.href = 'Lista.php');
				  } else {
					Swal.fire('Atenção!', 'Verifique as informações no form', 'error');
				  }
}

	$(document).ready(async function() {

   		await carregarDados(<?php echo $id; ?>);

	  $('#editarBtn').on('click', async function(e) {
    	await editarDados(e);
  		});
		
	  $('#cancelarBtn').on('click', function() {
		window.location.href = 'Lista.php';
	  });

	});
		
</script>