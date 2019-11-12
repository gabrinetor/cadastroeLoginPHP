
<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Cadastro Cliente - Sistema 1</title>

		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

		<!-- DataTables -->
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

		<script>
		.icon {
    		background: url('img/icon.jpg');
    	}
		</script>
	</head>

	<body>
	
	<style type="text/css">
		
		button {
  border: 1px solid #0066cc;
  background-color: #0099cc;
  color: #ffffff;
  padding: 5px 10px;
}

button:hover {
  border: 1px solid #0099cc;
  background-color: #00aacc;
  color: #ffffff;
  padding: 5px 10px;
}

button:disabled,
button[disabled]{
  border: 1px solid #999999;
  background-color: #cccccc;
  color: #666666;
}
	</style>
	

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
	            <li><a href="cadastrese.php">Novo Cliente</a></li>
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
		require_once('conexao.class.php');

		//instanciar a conexão
		$pdo = new Conexao();
			
		//mandar a query para nosso método dentro de conexao dando um return $stmt->fetchAll(PDO::FETCH_ASSOC);
		$result = $pdo->select("SELECT id_cli, nome_cli, data_nasc_cli, cpf_cli, CONCAT( logradouro, ',',numero,', ', bairro,' ', cidade,'-', estado ) as endereco_cli, status_cli FROM clientes");

		if(empty($result) || count($result) == 0) {
			echo "<tr>";
			echo "<td> Nenhum registro encontrado </td>";
			echo "</tr>";
			$btn_imprimir = 'disabled'; 
		} else {
		$btn_imprimir = true; 
		foreach($result as $value){
			$status = ($value['status_cli'] == 1) ? 'Ativado' : 'Inativo'; 
			$data = $value['data_nasc_cli'];
			$label_desativa_ativa = ($value['status_cli'] == 1) ? 'Desativar' : 'Ativar'; 
			$label_btn = ($value['status_cli'] == 1) ? 'btn-danger' : 'btn-success';

			echo "<tr>";
			echo "<td>".$value['nome_cli']."</td>";
			echo "<td>".date('d/m/Y',strtotime($data)) ."</td>";
			echo "<td>".$value['cpf_cli']."</td>";
			echo "<td>".$value['endereco_cli']."</td>";     
			echo "<td>".  $status ."</td>"; 

			?>				
		<td><a href="cadastrese.php?id=<?php echo $value['id_cli'];?>" class="btn btn-primary">Atualizar</a>
			<a href="desativa_cliente.php?id=<?php echo $value['id_cli'];?>&status_cli=<?php echo $value['status_cli'];?>" class="btn <?php echo $label_btn;?>"><?php echo $label_desativa_ativa; ?> </a></td>
			
			<?php
			echo "</tr>"; 
			}
		}
		?>
					
	</tbody>
	</table>
	</div>

	<!-- Coluna 1 - GRID -->
	<div class="col-md-3">
	<br>
	<!-- Botão baixar o .csv de clientes listados -->
	<button onclick="document.location.href='imprimir.php'" class="btn btn-success form-control" 
	<?php echo $btn_imprimir; ?>
	>Exportar clientes</button>			
	<br /><br />
	</div>

	<script type="text/javascript">
		$(document).ready( function () {
    	//$('#table_id').DataTable();

    	 $("#table_id").dataTable({
                "bJQueryUI": true,
                "oLanguage": {
                    "sProcessing":   "Processando...",
                    "sLengthMenu":   "Mostrar _MENU_ registros",
                    "sZeroRecords":  "Não foram encontrados resultados",
                    "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registros",
                    "sInfoFiltered": "",
                    "sInfoPostFix":  "",
                    "sSearch":       "Buscar:",
                    "sUrl":          "",
                    "oPaginate": {
                        "sFirst":    "Primeiro",
                        "sPrevious": "Anterior",
                        "sNext":     "Seguinte",
                        "sLast":     "Último"
                    }
                }
            }) 

		} );
	</script>
			
	</div>

	    <div class="clearfix"></div>

	</div>
	
	<!-- Bootstrap CDN -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>