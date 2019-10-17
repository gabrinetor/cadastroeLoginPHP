<?php

    require_once('db.class.php');

    $email = $_POST['email'];
    $senha = $_SENHA['senha'];

    $sql = " SELECT * FROM clientes WHERE email = '$email' AND senha = '$senha' ";

    //instancia BD
    $objDB = new db();
    $link = $objDB->conecta_mysql();    

    $resultado_id = mysqli_query($link, $sql);

    if($resultado_id){
        $dados_cliente = mysqli_fetch_array($resultado_id);

        if(isset($dados_cliente['email'])){
            echo 'cliente cadastrado';
        } else {
            header('Location: index.php?erro=1');
        }

    }else{
        echo 'Erro na execução da consulta';
    }

?>