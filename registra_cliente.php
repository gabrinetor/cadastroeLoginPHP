<?php

    require_once('db.class.php');

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $objDB = new db();
    $link = $objDB->conecta_mysql();    //conexão

    $sql = " INSERT INTO clientes(nome, email, senha) VALUES ('$nome', '$email', '$senha') ";

    //executar a query
    mysqli_query($link, $sql);

    //executar a query 
    if(mysqli_query($link, $sql)){
        echo 'Cliente registrado com sucesso!';
    }else{
        echo 'Erro ao registrar Cliente.';
    }

?>