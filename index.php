<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Portal de Acesso do Cliente - Sistema 1</title>

		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

		<!-- DataTables -->
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
	</head>

	<body>
	
	<?php
	$pdoConnection = require_once('Conexao.class.php');
		if($_GET['acao'] == 'del' && isset($_GET['id_cli']) && preg_match("/^[0-9]+$/", $_GET['id_cli'])){ 
		}
	?>

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
	            <li><a href="cadastrese.php">Cadastre-se</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>

	<!-- Alinhar componentes na tela -->
    <div class="container"><br />
	<legend> Lista de Clientes </legend>
	<!-- Coluna 3 - GRID -->
	<div class="col-md-12">
		<table id="table_id" class="display">
			<thead>
				<tr>
				  <th>Nome</th>
				  <th>Data Nascimento</th>
				  <th>CPF</th>
				  <th>Endereço</th>
				  <th>Status</th>
				  <th>Ações</th>
				</tr>
			</thead>
	<tbody>
		<?php 
		//instanciar a conexão
		$pdo = new Conexao();
			
		//mandar a query para nosso método dentro de conexao dando um return $stmt->fetchAll(PDO::FETCH_ASSOC);
		$result = $pdo->select("SELECT id_cli, nome_cli, data_nasc_cli, cpf_cli, telefone_cli, endereco_cli, email_cli, data_reg_cli, status_cli FROM clientes");
				
		foreach($result as $value){
			echo "<tr>";
			echo "<td>".$value['nome_cli']."</td>";
			echo "<td>".$value['data_nasc_cli']."</td>";
			echo "<td>".$value['cpf_cli']."</td>";
			echo "<td>".$value['endereco_cli']."</td>";     
			echo "<td>".$value['status_cli']."</td>"; ?>				
			<td><button class="btn btn-primary" type="submit">Atualizar </button> 
			<a href="desabilitar_cliente.php?id=<?php echo $value['id_cli']?>" class="btn btn-danger">Desablitar</a></td>
			<?php
			echo "</tr>"; 
		}
		?>
	
	<tr>
		<td></td>
	</tr>
					
	</tbody>
	</table>
	</div>

	<!-- Coluna 1 - GRID -->
	<div class="col-md-3">
	<br>
	<!-- Botão baixar o .csv de clientes listados -->
	<button onclick="document.location.href='imprimir.php'" class="btn btn-success form-control">Exportar clientes</button>
				
	<br /><br />
	</div>

	<script type="text/javascript">
		$(document).ready( function () {
    	$('#table_id').DataTable();
		} );
	</script>
			
	</div>

	    <div class="clearfix"></div>

	</div>
	
	<!-- Bootstrap CDN -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>