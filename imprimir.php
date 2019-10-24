<?php

    // Criar a view do arquivo a ser baixado

    //variavel para monstar a tabela
    $dadosXls  = "";
    $dadosXls .= "  <table border='1' >";
    $dadosXls .= "          <tr>";
    $dadosXls .= "          <th>Id</th>";
    $dadosXls .= "          <th>Nome</th>";
    $dadosXls .= "          <th>Data Nascimento</th>";
    $dadosXls .= "          <th>CPF</th>";
    $dadosXls .= "          <th>Telefone</th>";
    $dadosXls .= "          <th>Endereco</th>";
    $dadosXls .= "          <th>Email</th>";
    $dadosXls .= "          <th>Data de Registro</th>";
    $dadosXls .= "          <th>Status</th>";
    $dadosXls .= "      </tr>";
    
    //incluir nossa conexão
    include_once('Conexao.class.php');

    //instanciar a conexão
    $pdo = new Conexao();

    //mandar a query para nosso método dentro de conexao dando um return $stmt->fetchAll(PDO::FETCH_ASSOC);
    $result = $pdo->select("SELECT id_cli, nome_cli, data_nasc_cli, cpf_cli, telefone_cli, endereco_cli, email_cli, data_reg_cli, status_cli FROM clientes");
    
    //varrer o array com o foreach para pegar os dados
    foreach($result as $res){
        $dadosXls .= "      <tr>";
        $dadosXls .= "          <td>".$res['id_cli']."</td>";
        $dadosXls .= "          <td>".$res['nome_cli']."</td>";
        $dadosXls .= "          <td>".$res['data_nasc_cli']."</td>";
        $dadosXls .= "          <td>".$res['cpf_cli']."</td>";
        $dadosXls .= "          <td>".$res['telefone_cli']."</td>";
        $dadosXls .= "          <td>".$res['endereco_cli']."</td>";
        $dadosXls .= "          <td>".$res['email_cli']."</td>";
        $dadosXls .= "          <td>".$res['data_reg_cli']."</td>";        
        $dadosXls .= "          <td>".$res['status_cli']."</td>";
        $dadosXls .= "      </tr>";
    }
    $dadosXls .= "  </table>";
 
    // Nome do arquivo que será exportado  
    $arquivo = "Clientes-lista.xls";  

    // Configurações header para forçar o download  
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="'.$arquivo.'"');
    header('Cache-Control: max-age=0');

    // Se for o IE9, isso talvez seja necessário
    header('Cache-Control: max-age=1');
       
    // Enviar o conteúdo do arquivo  
    echo $dadosXls;  
    exit;
?>