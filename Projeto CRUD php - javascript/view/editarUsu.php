<?php
    $id = $_GET['id'];
?>

<!doctype html>
<html lang="pt-br">
<head>
	
	 <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta charset="utf-8">
<title>Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
	
	<style>
		.corH{
			background-color: aqua;
			text-align: center;
		}
		.div1{
			height: 170px;
			background-color: pink;
		}
		.float-container {
			border: 3px solid #fff;
			padding: 20px;
		}

		.float-child {
			width: 50%;
			float: left;
			padding: 20px;
			border: 2px solid red;
		} 
		.divs{
			width: 500px;
			margin-top: 40px;
			margin-left: auto;
			margin-right: auto;
			padding-left: 80px !important;
			padding-right: 80px !important;
			padding: 30px;
			box-shadow: black 2px 2px 2px;
		}
		
		.divt{
			text-align: center;
		}
		.divf{
			display: flex;
		}
		.cor1{
			background-color: lightblue;
		}
		.cor2{
			background-color: lightgreen;
		}
		button{
			width: 340px;
			align-items: center;
			border-radius: 4px;
		}
		input{
			width: 340px;
		}
		.btns{
			display: flex
		}
	</style>
</head>

<body>
	<header class="corH" >
		<h1 >Editar Usuario</h1>
	</header>
	
	<input type="hidden" id="idTxt" value="<?php echo $id?>" />
	
	<div class="divf">
		<div class="divs cor1">
			
			
		<h1>Editar Usuario</h1><br>
		<h4>Nome de Usuario</h4>
		<input type="text" id="usuario" placeholder="João123"><br>
		<h4>E-mail</h4>
			
		<input type="text" id="email"  placeholder="aaaaaa@aaaaa.com"><br>
		<h4>Senha</h4>
			
		<input type="password" id="senha"  placeholder="Pp12345."><br>
		<h4>Confirmar Senha</h4>
			
		<input type="password" id="senhaConf"  placeholder="12345678"><br>
		<h4>Data de Nascimento</h4>
		<input type="date" id="data"><br>
		<h4>Telefone</h4>
		<input type="text" id="tele" placeholder="(99) 99999-9999"><br>
			
			<br>
			<div class="btns">
			<button type="button" id="cancelarBtn">Voltar</button> 	
			<button type="button" id="editarBtn">Atualizar</button> 
			</div>
		</div>
		
		</div>
	
	
	</body>
		

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
					body: JSON.stringify({idUsuario: id })
				};
				
				const request = await fetch('../controller/usuarios/carregarEditar.php',config);
				const response = await request.json();
				const { dados } = response;
				$('#usuario').val(dados[0].usuario);
				$('#email').val(dados[0].email);
				$('#tele').val(dados[0].telefone);
				$('#senha').val(dados[0].senha);
				$('#data').val(dados[0].data_nasc);
			}
		async function editarDados(e) {
			
			  const nomeCompletoTxt = $('#usuario').val();
			  const dataNascimentoTxt = $('#data').val();
			  const emailTxt = $('#email').val();
			  const senhaTxt = $('#senha').val();
			  const senhaConf = $('#senhaConf').val();
			  const telefoneTxt = $('#tele').val();
			  const idTxt = $('#idTxt').val();
			  const config = {
					method: "post",
					headers: {
					  'Accept': 'application/json',
					  'Content-Type': 'application/json'
					},
					body: JSON.stringify({
					  nomeCompleto: nomeCompletoTxt,
					  dataNascimento: dataNascimentoTxt,
					  email: emailTxt,
					  senha: senhaTxt,
					  telefone: telefoneTxt,
					  idUsuario: idTxt
					})
				  };
			if(senhaTxt == senhaConf){
				  const request = await fetch(
					'../controller/usuarios/atualizarUsuarios.php',
					config);console.log(idTxt, nomeCompletoTxt, dataNascimentoTxt, emailTxt, senhaTxt, telefoneTxt);
				  const response = await request.json();
				  if (response.status === 1) {
					Swal.fire('Atenção!', 'dados atualizados com sucesso', 'success')
					.then(res => window.location.href = 'ListaUsu.php');
				  } else {
					Swal.fire('Atenção!', 'Verifique as informações no form', 'error');
				  }
			}else{
				Swal.fire('Atenção!', 'Senhas Não Conferem', 'error');
			}
}

	$(document).ready(async function() {

   		await carregarDados(<?php echo $id; ?>);

	  $('#editarBtn').on('click', async function(e) {
    	await editarDados(e);
  		});
		
	  $('#cancelarBtn').on('click', function() {
		window.location.href = 'ListaUsu.php';
	  });

	});
</script>
</html>


