<?php
    // Do formulario em 'cadastrese.php' vem direto pra cá
    // ou seja, essa é a etapa para inserir dados preenchidos.
    
    // verifica se arquivo já foi incluido e chama 'db.class.php' para poder instancia-lo
    require_once('db.class.php'); 
    
    // Metodo Post que é uma Array que guarda dados de cada elemento do formulario
    $nome_cli = $_POST['nome_cli'];
    $cpf_cli = $_POST['cpf_cli'];
    $data_nasc_cli = $_POST['data_nasc_cli'];
    $telefone_cli = $_POST['telefone_cli'];
    $celular_cli = $_POST['celular_cli'];
    $endereco_cli = $_POST['endereco_cli'];
    $email_cli = $_POST['email_cli'];

    // instancia para poder conectar ao bd do phpmyadmin
    $objDB = new db();
    $link = $objDB->conecta_mysql();    //conexão
    
    //valida se usuario foi registrado no bd 
    /*if(mysqli_query($link, $sql)){
        echo 'Cliente registrado com sucesso!';
        header('Location: validar_acesso.php');

    }else{
        echo 'Erro ao registrar Cliente.';
    }*/

    if(empty($endereco_cli))
        $status_cli = 0;

    else 
        $status_cli = 1;


// inserir registros diretamente para a tabela 
$sql = " INSERT INTO clientes(nome_cli, cpf_cli, data_nasc_cli, telefone_cli, celular_cli, endereco_cli, email_cli) VALUES ('$nome_cli', '$cpf_cli', '$data_nasc_cli', '$telefone_cli', '$celular_cli', '$endereco_cli', '$email_cli') ";

//executar a query
mysqli_query($link, $sql);

?>