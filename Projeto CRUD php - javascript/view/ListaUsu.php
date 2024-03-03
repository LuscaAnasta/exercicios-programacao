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
<title>Listas Usuarios</title>
	
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
  background-color: #F49C9D !important;
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
		.tti{width: 290px;}
		.tdes{width: 225px;}
		.tdata{width: 280px;}
		.tusu{width: 205px;}
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
	  <h1>Usuarios</h1><br>
		
		
		
	  <div class="res"></div>
	  <table border="2px solid black" bordercolor="#000000" >
			<tr>
				<th class="tid">Id</th>
				<th class="tti">Nome</th>
				<th class="tdes">Data Nascimento</th>
				<th class="tdata">Email</th>
				<th class="tusu">Telefone</th>
				<th class="tbotao">Ação</th>
			</tr>
		<tbody id="conteudo-usuario"></tbody>
		  
			
		</table>
		
		
	</div>
</body>
</html>

<script src="js/jquery-3.6.0.min.js" type="text/javascript"></script>
<script src="js/sweetalert2.all.min.js" type="text/javascript"></script>


<script type="text/javascript" charset="utf-8">
	async function carregarDados(){
		const request = await fetch(
			'../controller/usuarios/listarUsuarios.php',
			{method: 'get'});
		const response = await request.json();
		const conteudoUsuario = document.getElementById('conteudo-usuario');
		
		for (const item of response.dados){
			conteudoUsuario.innerHTML += `
			<tr style="border: 2px solid black">
				<td>${item.id}</td>
				<td>${item.usuario}</td>
				<td>${item.data_nasc}</td>
				<td>${item.email}</td>
				<td>${item.telefone}</td>
			
				<td>
					<button class="r" onclick="deletarUsuario(${item.id})" id="btnExcluir"><img width="24px" src="img1.png"></button>
					<button class="e" onclick="editarUsuario(${item.id})" id="btnEditar"><img width="24px" src="img2.png"></button>
				</td>
			</tr>`;
		}
		
	}
	
	function editarUsuario(id) {
  window.location.href = `editarUsu.php?id=${id}`;
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
          idUsuario: id
        })
      };
      const request = await fetch(
      '../controller/usuarios/deletarUsuarios.php', config);
      const response = await request.json();
      if (response.status === 1) {
        Swal.fire('Atenção!', 'Usuário removido com sucesso', 'success');
		location.reload();
      } else {
        Swal.fire('Atenção!', 'Erro ao remover usuário.', 'error');
      }
    }
  });
	
}

$(document).ready(function() {
  carregarDados();
});
</script>







