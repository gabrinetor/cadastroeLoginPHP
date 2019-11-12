<?php
    // Do formulario em 'cadastrese.php' vem direto pra cá
    // ou seja, essa é a etapa para inserir dados preenchidos.
    
    // verifica se arquivo já foi incluido e chama 'db.class.php' para poder instancia-lo
    require_once('db.class.php'); 


    // Metodo Post que é uma Array que guarda dados de cada elemento do formulario
    $nome_cli = $_POST['nome_cli'];
    $cpf_cli = $_POST['cpf_cli'];
    $email_cli = $_POST['email_cli'];
    $id_cli = $_POST['id_cli'];


    $data_nasc_cli = $_POST['data_nasc_cli'];
    $telefone_cli = $_POST['telefone_cli'];
    $celular_cli = $_POST['celular_cli'];
    //$endereco_cli = $_POST['endereco_cli'];
    $status_cli = 1;
    $cep = $_POST['cep'];
    $logradouro = $_POST['logradouro'];
    $nro = $_POST['nro'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $uf = $_POST['uf'];
    $cidade = $_POST['cidade'];




    // instancia para poder conectar ao bd do phpmyadmin
    $objDB = new db();
    $link = $objDB->conecta_mysql();    //conexão

    // inserir registros diretamente para a tabela 
    if($_POST['action'] == 'Cadastrar') {
    $sql = " INSERT INTO clientes(nome_cli, cpf_cli,data_nasc_cli, telefone_cli, celular_cli, email_cli, status_cli,cep,logradouro,numero,complemento,bairro,estado,cidade) VALUES ('$nome_cli', '$cpf_cli','$data_nasc_cli', '$telefone_cli', '$celular_cli', '$email_cli', '$status_cli','$cep','$logradouro','$nro','$complemento','$bairro','$uf','$cidade'); ";
} else  if($_POST['action'] == 'Editar') {
    $sql = " UPDATE clientes SET nome_cli = '$nome_cli' , cpf_cli = '$cpf_cli' ,data_nasc_cli =  '$data_nasc_cli' , telefone_cli = '$telefone_cli', celular_cli = '$celular_cli', email_cli = '$email_cli', status_cli = '$status_cli' , cep = '$cep',
        logradouro = '$logradouro',numero = '$nro',complemento = '$complemento',bairro = '$bairro',estado = '$uf', cidade = '$cidade'
     WHERE id_cli = '$id_cli'";
}  

    //valida se usuario foi registrado no bd 
    if(mysqli_query($link, $sql) == true){
        ?>
        <script type="text/javascript">alert('Cliente registrado com sucesso!');
        </script>
   <?php 
    }else{
        ?>
    <script type="text/javascript">alert('ERRO , cliente não registrado');</script>
    <?php
    }
         header('location: index.php');
                 exit;
