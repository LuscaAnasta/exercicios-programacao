<?php
	session_start();
	if(!$_SESSION['logado']){
		header('location:../index.php');
	}
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
			padding-left: 352px;
			padding-right: 354px;
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
		<h1>Cadastrar uma Tarefa</h1>
	</header>
	<div class="divs cor1">
		<h1 class="h1c">Cadastrar uma Tarefa</h1><br>
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
	<button type="button" id="btnTarefa">Tarefar</button> 
	</div>
			
			
		
</body>
</html>

<script src="js/jquery-3.6.0.min.js" type="text/javascript"></script>
<script src="js/sweetalert2.all.min.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
		
		async function cadastrarDados(e){
		
		const cTarefa=$('#tacao').val();
		const cDatain=$('#datain').val();
		const cNuem=$('#nuem').val();
		const cDatate=$('#datate').val();
		const cDesc=$('#desc').val();
		
		  const config = {
        method: "post",
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({
          tacao: cTarefa,
          datain: cDatain,
          nuem: cNuem,
          datate: cDatate,
          desc: cDesc
        })
      };
      const request = await fetch(
        '../controller/tarefas/cadastrarTarefa.php',
        config);

      const resultado = await request.json();

      if (resultado.status === 1) {
        Swal.fire('Atenção!', 'dados cadastrados com sucesso', 'success')
        .then(res => window.location.href = 'Lista.php');
      } else {
        Swal.fire('Atenção!', 'Verifique as informações no form', 'error');
      }
		}

		$(document).ready(function() {

  $('#btnTarefa').on('click', async function(e) {
    await cadastrarDados(e);
  });

});
</script>