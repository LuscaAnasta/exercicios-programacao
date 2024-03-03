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
<title>Listas Tarefas</title>
	
	<style>
		ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Change the link color to #111 (black) on hover */
li a:hover {
  background-color: #111;
}
		.corH{
			background-color: aqua;
			text-align: center;
		}
		.flex{
				display: flex;
		}
		.divs{
			width: 1200px;
			height: 500px;
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
		.corS{
			background-color: #DC4446;
		}
		.corS a:hover {
  background-color: #F49C9D;
			}
		button{
			align-items: center;
			border-radius: 4px;
		}
		button.r{
			align-items: center;
			border-radius: 4px;
			background-color:#F96366;
		}
		button.e{
			align-items: center;
			border-radius: 4px;
			background-color: yellow;
		}
		input{
			width: 340px;
		}
		table, th, td{
			background-color: whitesmoke;
			border-collapse: collapse;
		}
		form{
			width: 70px;
		}
		td{
			padding: 5px;
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
		.tid{
			width: 40px;
		}
		.tti{width: 200px;}
		.tdes{width: 200px;}
		.tdata{width: 200px;}
		.tusu{width: 200px;}
		.tbotao{width: 100px;}
		.res{
			height: 20px;
		}
	</style>
</head>

<body>
	<header class="corH" >
		<h1>Listinhas</h1>
	</header>
	
	<div class="divs cor1">
		<div>
			<ul>
				<li><a href="ListaUsu.php">Usuarios</a></li>
				<li><a href="Lista.php">Tarefas</a></li>
				<li><a href="Tarefa.php">Cadastrar Tarefa</a></li>
				<li><a href="../index.php">Cadastrar Usuario</a></li>
				<li class="corS"><a href="https://www.youtube.com/watch?v=7gPxDh7DZNU">Logout</a></li>
			</ul>
		</div>
	  <h1>Tarefas</h1><br>
		
		
		
	  <div class="res"></div>
	  <table border="2px solid black" bordercolor="#000000" >
			<tr>
				<th class="tid">Id</th>
				<th class="tti">Titulo</th>
				<th class="tdes">Descrição</th>
				<th class="tdata">Data Inicio</th>
				<th class="tdata">Data Termino</th>
				<th class="tusu">Usuario</th>
				<th class="tbotao">Ação</th>
			</tr>
			
			<tbody height="30px" overflow-y="scroll" id="conteudo"></tbody>
			
			
		</table>
		
		
	</div>
</body>
</html>
<script src="js/jquery-3.6.0.min.js" type="text/javascript"></script>
<script src="js/sweetalert2.all.min.js" type="text/javascript"></script>


<script type="text/javascript" charset="utf-8">
	async function carregarDados(){
		const request = await fetch(
			'../controller/tarefas/listarTarefas.php',
			{method: 'get'});
		const response = await request.json();
		const conteudoUsuario = document.getElementById('conteudo');
		
		for (const item of response.dados){
			conteudoUsuario.innerHTML += `
			<tr style="border: 2px solid black">
				<td>${item.id_tarefa}</td>
				<td>${item.titulo}</td>
				<td>${item.descricao}</td>
				<td>${item.dt_inicio}</td>
				<td>${item.dt_termino}</td>
				<td>${item.id_usuario}</td>
			
				<td>
					<button class="r" type="button" onclick="deletarUsuario(${item.id_tarefa})" id="btnExcluir"><img width="24px" src="img1.png"></button>
					<button class="e" type="button" onclick="editarTarefa(${item.id_tarefa})" id="btnEditar"><img width="24px" src="img2.png"></button>
				</td>
			</tr>`;
		}
		
	}
		function editarTarefa(id) {
  window.location.href = `editarTar.php?id=${id}`;
}
	
function deletarUsuario(id) {
  Swal.fire({
    title: 'Atenção!',
    text: 'Tem certeza que deseja remover esse usuário?',
    icon: 'question',
    showConfirmButton: true,
    showCancelButton: true,
  }).then(async function(res) {
    if (res.isConfirmed) {
      const config = {
        method: 'post',
        body: JSON.stringify({
          idTarefa: id
        })
      };
      const request = await fetch(
      '../controller/tarefas/deletarTarefa.php', config);
      const response = await request.json();
      if (response.status === 1) {
        Swal.fire('Atenção!', 'Tarefa removido com sucesso', 'success');
		location.reload();
      } else {
        Swal.fire('Atenção!', 'Erro ao remover tarefa.', 'error');
      }
    }
  });
	
}
	
	 $(document).ready(function() {
	  carregarDados();
	});
</script>