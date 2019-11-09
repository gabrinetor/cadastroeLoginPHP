<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Cadastrar Cliente - Sistema 1</title>

		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	
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
			<br><button type="submit" class="btn btn-primary form-control">Cadastre-se</button>
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
