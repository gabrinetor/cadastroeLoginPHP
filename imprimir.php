<?php

    // Criar a view do arquivo a ser baixado

    
    //incluir nossa conexão
    include_once('Conexao.class.php');

    //instanciar a conexão
    $pdo = new Conexao();

    //mandar a query para nosso método dentro de conexao dando um return $stmt->fetchAll(PDO::FETCH_ASSOC);
    $result = $pdo->select("SELECT id_cli as id,nome_cli as nome , cpf_cli as cpf,telefone_cli as telefone, CONCAT( logradouro, ',',numero,', ', bairro,' ', cidade,'-', estado ) as endereco ,email_cli as email, status_cli as status
        FROM clientes");

 function array_para_csv(array &$array)
{
   if (count($array) == 0) {
     return null;
   }
   ob_start();
   $df = fopen("php://output", 'w');
   fputcsv($df, array_keys(reset($array)),';');
   foreach ($array as $row) {
      fputcsv($df, $row,';');
   }
   fclose($df);
   return ob_get_clean();
}

function cabecalho_download_csv($filename) {
    // desabilitar cache
    $now = gmdate("D, d M Y H:i:s");
    header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
    header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
    header("Last-Modified: {$now} GMT");

    // forçar download  
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");

    // disposição do texto / codificação
    header("Content-Disposition: attachment;filename={$filename}");
    header("Content-Transfer-Encoding: binary");
}

cabecalho_download_csv("clientes_" . date("d-m-Y His") . ".csv");
echo array_para_csv($result);
exit;