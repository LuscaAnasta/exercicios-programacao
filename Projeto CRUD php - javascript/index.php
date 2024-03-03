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
	</style>
</head>

<body>
	<header class="corH" >
		<h1 >Cadastro/Login</h1>
	</header>
	
	
	<div class="divf">
		<div class="divs cor1">
			
		<h1>Cadastro</h1><br>
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
			<button type="button" id="confirmarBtn">Cadastrar</button> 
		</div>
		<div class="divs cor2">
		<h1>Login</h1><br>
		<h4>E-mail</h4>
		<input type="text" id="emailL" placeholder="aaaaaa@aaaaa.com"><br>
		<h4>Senha</h4>
		<input type="password" id="senhaL" placeholder="12345678"><br>	
		<br>
			
		<button type="button" id="btnLogin">Logar</button> 
			
		</div>
		
		</div>
	
	
	</body>
		</html>

	<script src="view/js/jquery-3.6.0.min.js" type="text/javascript"></script>
	<script src="view/js/sweetalert2.all.min.js" type="text/javascript"></script>
	<script type="text/javascript" charset="utf-8">
		
		async function cadastrarDados(e){
			
		
		const cUsuario=$('#usuario').val();
		const cEmail=$('#email').val();
		const cSenha=$('#senha').val();
		const cConfSenha=$('#senhaConf').val();
		const cNasc=$('#data').val();
		const cTele=$('#tele').val();
			
			if(cSenha==cConfSenha){
			
				    const config = {
					method: "post",
					headers: {
					'Accept': 'application/json',
					'Content-Type': 'application/json'
					},
					body: JSON.stringify({
					nomeCompleto: cUsuario,
					dataNascimento: cNasc,
					email: cEmail,
					senha: cSenha,
					telefone: cTele
					})
				};
				
				
				const request = await fetch(
					'controller/usuarios/cadastrarUsuario.php',
					config);
				

				const resultado = await request.json();
				

				if (resultado.status === 1) {
					Swal.fire('Atenção!', 'dados cadastrados com sucesso', 'success')
					.then(res => window.location.href = 'view/ListaUsu.php');
				} else {
					Swal.fire('Atenção!', 'Verifique as informações no form', 'error');
				}
			}else{
				Swal.fire('Atenção!', 'Senhas Não Conferem', 'error');
			}
		}

		$(document).ready(function() {

  $('#confirmarBtn').on('click', async function(e) {
    await cadastrarDados(e);
  });

});


	$(document).ready(function(){
		$('#btnLogin').on('click', async function(e){
			e.preventDefault();
			
			const config = {
				method: "post",
				headers:{
					'Accept':'application/json',
					'Content-Type':'application/json'
				},
				body: JSON.stringify({
					login: $('#emailL').val(),
					senha: $('#senhaL').val()
				})
			};
			
		const request = await fetch('controller/login/logar.php',config);
		const resultado = await request.json();
		
		alert(`status: ${JSON.stringify(resultado)}`);
		if(resultado.status===1){
			window.location.href= 'view/Lista.php';
		}else{
			Swal.fire('Atenção!', 'Verifique as informações no form', 'error');
		}
		});
	});
		
</script>


