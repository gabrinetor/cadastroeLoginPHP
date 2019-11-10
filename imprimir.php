<?php

    // Criar a view do arquivo a ser baixado

    //variavel para monstar a tabela
    $dadosCsv  = "";
    $dadosCsv1 .= "  <table border='1' >";
    $dadosCsv2 .= "          <tr>";
    $dadosCsv3 .= "          <th>Nome</th>";
    $dadosCsv .= "          <th>Data Nascimento</th>";
    $dadosCsv .= "          <th>CPF</th>";
    $dadosCsv .= "          <th>Endereco</th>";
    $dadosCsv .= "          <th>Status</th>";
    $dadosCsv .= "      </tr>";
    
    //incluir nossa conexão
    include_once('Conexao.class.php');

    //instanciar a conexão
    $pdo = new Conexao();

    //mandar a query para nosso método dentro de conexao dando um return $stmt->fetchAll(PDO::FETCH_ASSOC);
    $result = $pdo->select("SELECT nome_cli, data_nasc_cli, cpf_cli, endereco_cli, status_cli FROM clientes");
    
    //varrer o array com o foreach para pegar os dados
    foreach($result as $res){
        $dadosCsv .= "      <tr>";
        $dadosCsv .= "          <td>".$res['nome_cli']."</td>";
        $dadosCsv .= "          <td>".$res['data_nasc_cli']."</td>";
        $dadosCsv .= "          <td>".$res['cpf_cli']."</td>";
        $dadosCsv .= "          <td>".$res['endereco_cli']."</td>";     
        $dadosCsv .= "          <td>".$res['status_cli']."</td>";
        $dadosCsv .= "      </tr>";
    }
    $dadosCsv .= "  </table>";
 
    // Nome do arquivo que será exportado  
    $arquivo = 'Clientes'.date('YmdHis').'.csv';  

    // Configurações header para forçar o download  
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="'.$arquivo.'"');
    header('Cache-Control: max-age=0');

    // Se for o IE9, isso talvez seja necessário
    header('Cache-Control: max-age=1');
       
    // Enviar o conteúdo do arquivo  
    echo $dadosCsv;  
    exit;
?>