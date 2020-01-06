<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="utf-8">

    <title>Base</title>

<head>

<body>

<?php
    // Definimos o nome do arquivo que será exportado
    date_default_timezone_set('America/Sao_Paulo');
    $arquivo = 'Mat -' . date("Y.m.d-H.i.s");

    // Criamos uma tabela HTML com o formato da planilha

    $html = '';

    $html .= '<table border="1">';

    $html .= '<td><b>CÓDIGO</b></td>';

    $html .= '<td><b></b>UN.MEDIDA</td>';

    $html .= '<td><b></b>Equipamento</td>';

    $html .= '<td><b></b>Referencia</td>';

    $html .= '<td><b></b>Descricao</td>';

    $html .= '<td><b></b>Endereco</td>';

    $html .= '<td><b></b>Servico</td>';

    $html .= '<td><b></b>Data de cadastro</td>';

    $html .= '</tr>';

    //Selecionar todos os itens da tabela

    $result = "SELECT * FROM materiais";

    $result = mysqli_query($conn , $result);
    
    while($row = mysqli_fetch_assoc($result)){

            $html .= '<tr>';

            $html .= '<td style="vertical-align: top;">'.$row["codigo"].'</td>';

            $html .= '<td style="vertical-align: top;">'.$row["un_medida"].'</td>';

            $html .= '<td style="vertical-align: top;">'.$row["equipamento"].'</td>';
            
            $html .= '<td style="vertical-align: top;">'.$row["referencia"].'</td>';
            
            $html .= '<td style="vertical-align: top;">'.$row["descricao"].'</td>';
            
            $html .= '<td style="vertical-align: top;">'.$row["endereco"].'</td>';

            $html .= '<td style="vertical-align: top;">'.$row["servico"].'</td>';

            $html .= '<td style="vertical-align: top;">'.$row["data_de_cadastro"].'</td>';

            $html .= '</tr>';

    }
    
    // Configurações header para forçar o download

    header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

    header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");

    header ("Cache-Control: no-cache, must-revalidate");

    header ("Pragma: no-cache");

    header ("Content-type: application/x-msexcel");
    
    header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );

    header ("Content-Description: PHP Generated Data" );

    // Envia o conteúdo do arquivo

    echo $html;
    
    header('location: /admin'); 
    
    ?>



</body>

</html>