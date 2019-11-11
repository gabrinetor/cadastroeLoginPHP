<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Cadastrar Cliente - Sistema 1</title>

		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
		<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	
		<!--<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		-->
		<script type="text/javascript" src="js/jquery.mask.min.js"></script>	

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


	<?php
	$label =  'Cadastrar';
	$id = '0';
	$nome = '';
	$cpf = '';
	$dt_nasc = '';
    $email = '';

    $celular = '';
    $telefone = '';
    $endereco_cli = '';


	if(isset($_GET['id']) && $_GET['id'] > 0 ){
		
	$id = $_GET['id'];

	$label =  'Editar';


	include_once('Conexao.class.php');

    //instanciar a conexão
    $pdo = new Conexao();

    //mandar a query para nosso método dentro de conexao dando um return $stmt->fetchAll(PDO::FETCH_ASSOC);
    $sql = "SELECT * 
        FROM clientes where id_cli = " . $id;
    $result = $pdo->select($sql);

    $nome = $result[0]['nome_cli'];
    $cpf = $result[0]['cpf_cli'];
    $dt_nasc = $result[0]['data_nasc_cli'];
    $email = $result[0]['email_cli'];

    $celular = $result[0]['celular_cli'];
    $telefone = $result[0]['telefone_cli'];
    $endereco_cli = $result[0]['endereco_cli'];




	} 
	?>

	<br />
	<legend><h1 align="center"> <?php echo $label;?> Clientes</h1></legend>
	<br />

	<!-- Coluna 1 GRID (md = escala Medium ≥768px) -->
	<div class="col-md-2"></div>
	
	<!-- Coluna 2 GRID -->	
	<div class="col-md-4">

		<!-- Formulário -->
		<form method="POST" action="registra_cliente.php" id="formCadastrarse">
				
			<div class="form-group">
				<label>Nome Completo: (*) </label>
				<input type="text" class="form-control" id="nome_cli" name="nome_cli" placeholder="Nome Completo" required="required" value="<?php echo  $nome; ?>">
			</div>
					
			<div class="form-group">
				<label>CPF: (*) </label>
				<input type="text" class="form-control cpf-mask" id="cpf_cli" name="cpf_cli" placeholder="000.000.000-00" required="required" value="<?php echo $cpf ; ?>">
			</div>
			
			<div class="form-group">
				<label>Data de Nascimento: </label>
				<input type="date" class="form-control" id="data_nasc_cli" name="data_nasc_cli" placeholder="00/00/0000" value="<?php echo $dt_nasc; ?>" >
			</div> 

			<div class="form-group">
				<label>E-mail: (*) </label>
				<input type="email" class="form-control" id="email_cli" name="email_cli" placeholder="Email" required="required" value="<?php echo $email ; ?>">
			</div>
			<input name="action" type="hidden" id="action" value="<?php echo $label; ?>"/>
			<input name="id_cli" type="hidden" id="id_cli" value="<?php echo $id; ?>"/>



	</div><!-- Fim da coluna 2 GRID -->

	<!-- Coluna 3 GRID -->
	<div class="col-md-1"></div>

	<!-- Coluna 4 GRID -->
	<div class="col-md-4">

			<div class="form-group">
				<label>Celular: </label>
				<input type="tel" class="form-control phone-mask" id="celular_cli" name="celular_cli" placeholder="(00) 0000-0000" value="<?php echo $celular; ?>">
			</div>

			<div class="form-group">
				<label>Telefone: </label>
				<input type="tel" class="form-control phone-mask" id="telefone_cli" name="telefone_cli" placeholder="(00) 0000-0000" value="<?php echo $telefone ; ?>">
			</div>

			<div class="form-group">
				<label>Endereço: </label>
				<input type="text" class="form-control address" id="endereco_cli" name="endereco_cli" placeholder="Endereço Completo" value="<?php echo $endereco_cli ; ?>">
			</div>

			<!--sistema reserva  vai ter bd quarto, reseva e cliente-->
			<!-- maisa campos (nome pai, mae, -->		
			<br><button type="submit" class="btn btn-primary form-control" onclick="return validar_form_cadastro();">Salvar</button><br>
			<br>

		</form>

	</div>
</div>
<script type="text/javascript">

		$(document).ready(function(){
			$("#cpf_cli").mask("000.000.000-00");
			$("#telefone_cli").mask("(00) 0000-0000");
			 //$('#data_nasc_cli').datepicker();
			
			
			$("#celular_cli").mask("(00) 0000-0000");
			
			$("#celular_cli").blur(function(event){
				if ($(this).val().length == 15){
					$("#celular_cli").mask("(00) 0000-0009");
				}else{
					$("#celular_cli").mask("(00) 0000-00009");
				}
			})
		})

			function validar_form_cadastro(){
				var nome_cli = formCadastrarse.nome_cli.value;
				var cpf_cli = formCadastrarse.cpf_cli.value;
				var email_cli = formCadastrarse.email_cli.value;
				
				if(nome_cli == ""){
					alert("Campo nome é obrigatorio");
					formCadastrarse.nome_cli.focus();
					return false;
				}
				if(cpf_cli == ""){
					alert("Campo cpf é obrigatório");
					formCadastrarse.cpf_cli.focus();
					return false;
				}

			if(email_cli == ""){
					alert("Campo e-mail é obrigatorio");
					formCadastrarse.email_cli.focus();
					return false;
				}
			}
		</script>
		

	<!-- Bootstrap CDN -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>

</html>
