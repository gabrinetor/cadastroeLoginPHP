<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Cadastrar Cliente - Sistema 1</title>

		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/jquery.mask.min.js"></script>	

		<script type="text/javascript">

		$(document).ready(function(){
			$("#cpf_cli").mask("000.000.000-00")
			$("#telefone_cli").mask("(00) 0000-0000")
			$("#data_nasc_cli").mask("00/00/0000")
			
			
			$("#celular_cli").mask("(00) 0000-00009")
			
			$("#celular_cli").blur(function(event){
				if ($(this).val().length == 15){
					$("#celular_cli").mask("(00) 00000-0009")
				}else{
					$("#celular_cli").mask("(00) 0000-00009")
				}
			})
		})

			function validar_form_cadastro(){
				var nome_cli = formCadastrarse.nome_cli.value;
				var cpf_cli = formCadastrarse.cpf_cli.value;
				var data_nasc_cli = formCadastrarse.data_nasc_cli.value;
				var telefone_cli = formCadastrarse.telefone_cli.value;
				var celular_cli = formCadastrarse.celular_cli.value;
				var endereco_cli = formCadastrarse.endereco_cli.value;
				var email_cli = formCadastrarse.email_cli.value;
				
				if(nome_cli == ""){
					alert("Campo nome é obrigatorio");
					formCadastrarse.nome_cli.focus();
					return false;
				}if(cpf_cli == ""){
					alert("Campo cpf é obrigatório");
					formCadastrarse.cpf_cli.focus();
					return false;
				}if(data_nasc_cli == ""){
					alert("Campo data de nascimento é obrigatório");
					formCadastrarse.data_nasc_cli.focus();
					return false;
				}if(telefone_cli == ""){
					alert("Campo telefone é obrigatório");
					formCadastrarse.telefone_cli.focus();
					return false;
				}if(celular_cli == ""){
					alert("Campo celular é obrigatório");
					formCadastrarse.celular_cli.focus();
					return false;
				}if(endereco_cli == ""){
					alert("Campo endereco é obrigatorio");
					formCadastrarse.endereco_cli.focus();
					return false;
				}if(email_cli == ""){
					alert("Campo e-mail é obrigatorio");
					formCadastrarse.email_cli.focus();
					return false;
				}
			}
		</script>

	</head>

	<body>

	<!-- Menu Fixo -->
	<nav class="navbar navbar-default navbar-static-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	        </div>
	        
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
	            <li><a href="index.php">Voltar para Home</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	</nav>

	<br />
	<legend><h1 align="center">Cadastro de Clientes</h1></legend>
	<br />

	<!-- Coluna 1 GRID (md = escala Medium ≥768px) -->
	<div class="col-md-2"></div>
	
	<!-- Coluna 2 GRID -->	
	<div class="col-md-4">

		<!-- Formulário -->
		<form method="POST" action="registra_cliente.php" id="formCadastrarse">
				
			<div class="form-group">
				<label>Nome Completo: </label>
				<input type="text" class="form-control" id="nome_cli" name="nome_cli" placeholder="Nome Completo" required="requiored">
			</div>
					
			<div class="form-group">
				<label>CPF: </label>
				<input type="text" class="form-control cpf-mask" id="cpf_cli" name="cpf_cli" placeholder="000.000.000-00" required="requiored">
			</div>
			
			<div class="form-group">
				<label>Data de Nascimento: </label>
				<input type="date" class="form-control" id="data_nasc_cli" name="data_nasc_cli" placeholder="Data Nascimento" required="requiored">
			</div>

			<div class="form-group">
				<label>E-mail: </label>
				<input type="email" class="form-control" id="email_cli" name="email_cli" placeholder="Email" required="requiored">
			</div>



	</div><!-- Fim da coluna 2 GRID -->

	<!-- Coluna 3 GRID -->
	<div class="col-md-1"></div>

	<!-- Coluna 4 GRID -->
	<div class="col-md-4">

			<div class="form-group">
				<label>Celular: </label>
				<input type="tel" class="form-control phone-mask" id="celular_cli" name="celular_cli" placeholder="(00) 0000-0000" required="requiored">
			</div>

			<div class="form-group">
				<label>Telefone: </label>
				<input type="tel" class="form-control phone-mask" id="telefone_cli" name="telefone_cli" placeholder="(00) 0000-0000" required="requiored">
			</div>

			<div class="form-group">
				<label>Endereço: </label>
				<input type="text" class="form-control address" id="endereco_cli" name="endereco_cli" placeholder="Endereço Completo">
			</div>

			<!--sistema reserva  vai ter bd quarto, reseva e cliente-->
			<!-- maisa campos (nome pai, mae, -->		
			<br><button type="submit" class="btn btn-primary form-control" onclick="return validar_form_contato()">Cadastre-se</button><br>
			<input type="submit" value="Enviar" onclick="return validar_form_contato()">
			<br><br>

		</form>

	</div></div>
			
			
	<!-- Coluna 5 GRID -->
	<div class="col-md-1"></div>


	<div class="clearfix"></div>
		

	<!-- Bootstrap CDN -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>

</html>
