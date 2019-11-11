<?php
    // Do formulario em 'cadastrese.php' vem direto pra cá
    // ou seja, essa é a etapa para inserir dados preenchidos.
    
    // verifica se arquivo já foi incluido e chama 'db.class.php' para poder instancia-lo
    require_once('db.class.php'); 
    // Metodo Post que é uma Array que guarda dados de cada elemento do formulario
    $id_cli = $_GET['id'];
    //inverte status
    $status_cli =  ($_GET['status_cli'] == 0) ? 1 :0;


    // instancia para poder conectar ao bd do phpmyadmin
    $objDB = new db();
    $link = $objDB->conecta_mysql();    //conexão
  

    $sql = " UPDATE clientes SET status_cli =  '$status_cli'  WHERE id_cli = '$id_cli'";  

    //valida se usuario foi registrado no bd 
    if(mysqli_query($link, $sql) == true){
        ?>
        <script type="text/javascript">alert('Cliente desativado com sucesso!');
        </script>
   <?php 
    }else{
        ?>
    <script type="text/javascript">alert('ERRO , cliente não desativado');</script>
    <?php
    }
    header('location: index.php');
    exit;
