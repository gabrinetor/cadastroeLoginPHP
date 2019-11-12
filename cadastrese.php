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
	$id = '';
	$nome = '';
	$cpf = '';
	$dt_nasc = '';
    $email = '';

    $celular = '';
    $telefone = '';


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

    $cep = $result[0]['cep'];
    $logradouro = $result[0]['logradouro'];
    $nro = $result[0]['numero'];
    $complemento = $result[0]['complemento'];
    $bairro = $result[0]['bairro'];
    $estado = $result[0]['estado'];
    $cidade = $result[0]['cidade'];
    




	} 
	?>

	<br />
	<legend><h1 align="center"> <?php echo $label;?> Clientes</h1></legend>
	<br />

	<form method="POST" action="registra_cliente.php" id="formCadastrarse">

	<!-- Coluna 1 GRID (md = escala Medium ≥768px) -->
	<div class="row">
	
	<div class="col-md-2">
	</div>
	<div class="col-md-6">
		<div class="form-group">
				<label>Nome Completo: (*) </label>
				<input type="text" class="form-control" id="nome_cli" name="nome_cli" placeholder="Nome Completo" required="required" value="<?php echo  $nome; ?>">
		</div>
	</div>
	<div class="col-md-2">
			<div class="form-group">
				<label>CPF: (*) </label>
				<input type="text" class="form-control cpf-mask" id="cpf_cli" name="cpf_cli" placeholder="000.000.000-00" required="required" value="<?php echo $cpf ; ?>">
			</div>
		</div>
	</div>
	<div class="row">
			<div class="col-md-2">
			</div>
		<div class="col-md-2">
			<div class="form-group">
				<label>Data de Nascimento: </label>
				<input type="date" class="form-control" id="data_nasc_cli" name="data_nasc_cli" placeholder="00/00/0000" value="<?php echo $dt_nasc; ?>" >
			</div>
		</div>
			<div class="col-md-2"> 
				<div class="form-group">
				<label>E-mail: (*) </label>
				<input type="text" class="form-control" id="email_cli" name="email_cli" placeholder="Email" required="required" value="<?php echo $email ; ?>">
				</div>
			</div>
		<div class="col-md-2">
		<div class="form-group">
				<label>Celular: </label>
				<input type="text" class="form-control phone-mask" id="celular_cli" name="celular_cli" placeholder="(00) 0000-0000" value="<?php echo $celular; ?>">
		</div>
		</div>
		<div class="col-md-2">
			<div class="form-group">
				<label>Telefone Principal:(*) </label>
				<input type="text" class="form-control phone-mask" id="telefone_cli" name="telefone_cli" placeholder="(00) 0000-0000" value="<?php echo $telefone ; ?>">
			</div>
		</div>

	</div> <!-- Fecha row -->
	<input name="action" type="hidden" id="action" value="<?php echo $label; ?>"/>
	<input name="id_cli" type="hidden" id="id_cli" value="<?php echo $id; ?>"/>

	<!-- Coluna 3 GRID -->
	<div class="row">
	<div class="col-md-2"> </div>
	<div class="col-md-2">
		<div class="form-group">
				<label>Cep:(*)</label>
				<input type="text" class="form-control" id="cep" name="cep" placeholder="Informe o Cep" required value="<?php echo $cep; ?>" />
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
				<label>Logradouro:(*) </label>
				<input type="text" class="form-control" id="logradouro" name="logradouro" placeholder="Informe o Logradouro" required value="<?php echo $logradouro; ?>" />
		</div>
	</div>
	<div class="col-md-1">
		<div class="form-group">
				<label>Nro:(*) </label>
				<input type="text" class="form-control" id="nro" name="nro" required placeholder="Informe o Nro" value="<?php echo $nro; ?>" />
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-group">
				<label>Complemento: </label>
				<input type="text" class="form-control" id="complemento" name="complemento" placeholder="Informe o complemento" value="<?php echo $complemento; ?>" />
		</div>
	</div>
	</div> <!-- Fecha row -->
	<div class="row">
	<div class="col-md-2"> </div>
	<div class="col-md-2">
		<div class="form-group">
				<label>Bairro: (*)</label>
				<input type="text" class="form-control" id="bairro" name="bairro" placeholder="Informe o bairro" required value="<?php echo $bairro; ?>" />
		</div>
	</div>
	
	<div class="col-md-2">
		<div class="form-group">
  	<label for="cod_estados" >Estados:(*)</label>
  	<select class="form-control"  name="uf" id="uf" required>
	  		<option value="">--</option>
	  		<option value="AC" <?= ($estado == 'AC')?'selected':''?> >Acre</option>
			<option value="AL" <?= ($estado == 'AL')?'selected':''?> >Alagoas</option>
<option value="AP" <?= ($estado == 'AP') ?'selected':''?> > Amapá</option> 
<option value="AM" <?= ($estado == 'AM') ?'selected':''?> >Amazonas</option>
<option value="BA" <?= ($estado == 'BA') ?'selected':''?> >Bahia</option>
<option value="CE" <?= ($estado == 'CE') ?'selected':''?> >Ceará</option>
<option value="DF" <?= ($estado == 'DF') ?'selected':''?> >Distrito Federal</option>
<option value="ES" <?= ($estado == 'ES') ?'selected':''?> >Espírito Santo</option>
<option value="GO" <?= ($estado == 'GO') ?'selected':''?> >Goiás</option>
<option value="MA" <?= ($estado == 'MA') ?'selected':''?> >Maranhão</option>
<option value="MT" <?= ($estado == 'MT') ?'selected':''?> >Mato Grosso</option>
<option value="MS" <?= ($estado == 'MS') ?'selected':''?> >Mato Grosso do Sul</option>
<option value="MG" <?= ($estado == 'MG') ?'selected':''?> >Minas Gerais</option>
<option value="PA" <?= ($estado == 'PA') ?'selected':''?> >Pará</option>
<option value="PB" <?= ($estado == 'PB') ?'selected':''?> >Paraíba</option>
<option value="PR" <?= ($estado == 'PR') ?'selected':''?> >Paraná</option>
<option value="PE" <?= ($estado == 'PE') ?'selected':''?> >Pernambuco</option>
<option value="PI" <?= ($estado == 'PI') ?'selected':''?> >Piauí</option>
<option value="RJ" <?= ($estado == 'RJ') ?'selected':''?> >Rio de Janeiro</option>
<option value="RN" <?= ($estado == 'RN') ?'selected':''?> >Rio Grande do Norte</optin>
<option value="RS" <?= ($estado == 'RS') ?'selected':''?> >Rio Grande do Sul</option>
<option value="RO" <?= ($estado == 'RO') ?'selected':''?> >Rondônia</option>
<option value="RR" <?= ($estado == 'RR') ?'selected':''?> >Roraima</option>
<option value="SC" <?= ($estado == 'SC') ?'selected':''?> >Santa Catarina</option>
<option value="SP" <?= ($estado =='SP') ?'selected':''?> >São Paulo</option>
<option value="SE" <?= ($estado =='SE')  ?'selected':''?> >Sergipe</option>
<option value="TO" <?= ($estado =='TO')  ?'selected':''?> >Tocantins</option>
  </select>
  		</div>
	</div>
  	<div class="col-md-2">
  		<div class="form-group">
  	<label for="cod_cidades">Cidade:(*)</label>
	  <input type="text" class="form-control" id="cidade" name="cidade" value="<?php echo $cidade; ?>" placeholder="Informe a cidade" />
		</div>
	</div>
	<div class="col-md-2">
	<div class="form-group">
	<label for="cod_cidades">&nbsp;</label>
	<button type="submit" class="btn btn-primary form-control" onclick="return validar_form_cadastro();">Salvar</button>
	</div>
	</div>

	</div> <!-- fecha row -->
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
			});


			$("#cep").focusout(function(){
			//Início do Comando AJAX
			$.ajax({
				//O campo URL diz o caminho de onde virá os dados
				//É importante concatenar o valor digitado no CEP
				url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/unicode/',
				//Aqui você deve preencher o tipo de dados que será lido,
				//no caso, estamos lendo JSON.
				dataType: 'json',
				//SUCESS é referente a função que será executada caso
				//ele consiga ler a fonte de dados com sucesso.
				//O parâmetro dentro da função se refere ao nome da variável
				//que você vai dar para ler esse objeto.
				success: function(resposta){
					//Agora basta definir os valores que você deseja preencher
					//automaticamente nos campos acima.
					$("#logradouro").val(resposta.logradouro);
					$("#complemento").val(resposta.complemento);
					$("#bairro").val(resposta.bairro);
					$("#cidade").val(resposta.localidade);
					$("#uf").val(resposta.uf);
					//Vamos incluir para que o Número seja focado automaticamente
					//melhorando a experiência do usuário
					$("#nro").focus();
				}
			});
		});

		});

			function validar_form_cadastro(){
				var nome_cli = formCadastrarse.nome_cli.value;
				var cpf_cli = formCadastrarse.cpf_cli.value;
				var email_cli = formCadastrarse.email_cli.value;
				var cep = formCadastrarse.cep.value;
				var logradouro = formCadastrarse.logradouro.value;
				var cidade = formCadastrarse.cidade.value;
				var bairro = formCadastrarse.bairro.value;
				var nro = formCadastrarse.nro.value;
				var telefone_cli = formCadastrarse.telefone_cli.value;


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
				if(telefone_cli == ""){
					alert("Campo Telefone é obrigatório");
					formCadastrarse.telefone_cli.focus();
					return false;
				}
				if(cep == ""){
					alert("Campo CEP é obrigatório");
					formCadastrarse.cep.focus();
					return false;
				}
				if(logradouro == ""){
					alert("Campo Logradouro é obrigatório");
					formCadastrarse.logradouro.focus();
					return false;
				}
				if(cidade == ""){
					alert("Campo Cidade é obrigatório");
					formCadastrarse.cidade.focus();
					return false;
				}
				if(nro == ""){
					alert("Campo Nro é obrigatório");
					formCadastrarse.nro.focus();
					return false;
				}

				if(bairro == ""){
					alert("Campo Bairro é obrigatório");
					formCadastrarse.bairro.focus();
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
