<?php
    // se usuario foi registrado com sucesso, devido à conexão e inserção ao BD, então vem pra cá
    // ou seja, para poder preencher o form em 'index.php', terá que ter registro no banco.

    // verifica se arquivo já foi incluido e chama 'db.class.php' para poder instancia-lo
    require_once('db.class.php');

    // estando registrado, cliente poderá fazer login com esses dados
    $email_cli = $_POST['email_cli'];
    $senha_cli = $_POST['senha_cli'];

    // mostra todos os valores registrados nas colunas exigidas - usado para comparar valores posteriormente
    $sql = " SELECT * FROM clientes WHERE email_cli = '$email_cli' AND senha_cli = '$senha_cli' ";

    //instancia BD para estabelecer conexão
    $objDB = new db();
    $link = $objDB->conecta_mysql();    

    // compara se dados preenchidos no form login, correspondem 
    $resultado_id = mysqli_query($link, $sql);

    // se '$resultado_id' foi iniciado com valor positivo
    if($resultado_id){
        //dados_cliente agora é um array que localiza o indice atual
        $dados_cliente = mysqli_fetch_array($resultado_id);

        //verifica se indice correspondente ao elemento preenchido ao logar 
        if(isset($dados_cliente['email_cli'])){
            echo "Olá, ".$email_cli.". ";
        } else {
            header('Location: index.php?erro=1');   
        }

    }else{
        echo 'Erro na execução da consulta'; //caso o 'resultado_id' tenha iniciado nulo
    }

?>