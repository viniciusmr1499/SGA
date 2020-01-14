<?php 

function material_get_data($redirecionarError){
    $file = filter_input(INPUT_POST, 'file');
    $un_medida = filter_input(INPUT_POST, 'un_medida');
    $equipamento = filter_input(INPUT_POST, 'equipamento');
    $referencia = filter_input(INPUT_POST, 'referencia');
    $descricao = filter_input(INPUT_POST, 'descricao');
    $endereco = filter_input(INPUT_POST, 'endereco');
    $quantidade = filter_input(INPUT_POST, 'quantidade');
    $fotoAntiga = filter_input(INPUT_POST,'fotoAntiga');    
    // var_dump($fotoAntiga);exit;

    if(is_null($un_medida) or is_null($equipamento)){
        flash('Informe os campos obrigatórios','error');
        header('location: ' . $redirecionarError);
        exit;
    }
    return compact('un_medida','equipamento','referencia','quantidade','file','endereco','descricao','fotoAntiga');
}

function despache_get_data(){
    $codigo = filter_input(INPUT_POST,'codigo');
    $matricula = filter_input(INPUT_POST,'matricula');
    $utilizacao = filter_input(INPUT_POST,'utilizacao');
    $colaborador = filter_input(INPUT_POST,'colaborador');
    $setor = filter_input(INPUT_POST, 'setor');
    $quantidade = filter_input(INPUT_POST, 'quantidade');
    
    return compact('codigo','matricula','utilizacao','colaborador','setor','quantidade');
}

function renovar_estoque(){
    $codigo = filter_input(INPUT_POST,'codigo');
    $quantidade = filter_input(INPUT_POST,'quantidade');

    // var_dump('o codigo é ' . $codigo);exit;
    return compact('codigo','quantidade');
}

// *** FUNCÇÕES ANÔNIMAS PARA OS MATERIAIS ***
$listarMateriais = function() use($conn){
    // Listagem de materiais
    $sql = 'SELECT * FROM materiais WHERE quantidade > 0';
    $result = $conn->query($sql);

    return $result->fetch_all(MYSQLI_ASSOC);

};

$historico = function() use($conn){
    // Listagem de materiais
    $sql = 'SELECT * FROM materiais';
    $result = $conn->query($sql);

    return $result->fetch_all(MYSQLI_ASSOC);
};

$criarMaterial = function() use ($conn){
    // pegar os dados do formulário
    $data = material_get_data('/admin/pages/novo-material');
    date_default_timezone_set('America/Sao_Paulo');
    $responsavel = $_SESSION['nomeCompleto'];
    // echo $responsavel; exit;
    
    if($data['un_medida'] == 'Selecione'){
        flash('Selecione os campos obrigatórios','error');

        header('location: /admin/pages/novo-material');
        exit;
    }
    //Tratando o arquivo
    if(isset($_FILES['file'])){
        $extensao = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        $formatosPermitidos = array('jpg','png','jpeg');
        $tamanho = $_FILES['file']['size'];    
        
        if($_FILES['file']['type'] == 'image/png' || $_FILES['file']['type'] == 'image/jpeg' || $_FILES['file']['type'] == 'image/jpg'){
            // VALIDAÇÃO VIA PHP - TAMANHO DA IMAGEM => LIMITE MÁXIMO 2MB
            if($tamanho <= 2097152 && $tamanho != 0){
                $extensao = strtolower(substr($_FILES['file']['name'], -4)); // pega a extensao do arquivo
                // var_dump($_FILES['file']['type']); exit;
                $novo_nome = 'image-'.rand(5,10000).'-'. date("Y.m.d").$extensao; // define o nome do arquivo
                
                $diretorio = __DIR__ . "/../../public/img/"; // define o diretório para onde iremos enviar o arquivo
                
                move_uploaded_file($_FILES['file']['tmp_name'], $diretorio.$novo_nome); // efetua o upload
                
                $data['file'] = $novo_nome;
                $sql = 'INSERT INTO materiais (un_medida,equipamento,referencia,nome_img,materialCriadoPor,descricao,endereco,quantidade,data_de_cadastro,data_de_atualizacao) VALUES (?,?,?,?,?,?,?,?,NOW(),NOW())';
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('sssssssi',$data['un_medida'],$data['equipamento'],$data['referencia'],$data['file'],$responsavel,$data['descricao'],$data['endereco'],$data['quantidade']);
                
                flash('Material foi inserido com sucesso!', 'success');
                return $stmt->execute();
            }
        }
    }
    // var_dump($materialCriadoPor);exit;
    $sql = 'INSERT INTO materiais (un_medida,equipamento,referencia,materialCriadoPor,descricao,endereco,quantidade,data_de_cadastro,data_de_atualizacao) VALUES (?,?,?,?,?,?,?,NOW(),NOW())';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssssi',$data['un_medida'],$data['equipamento'],$data['referencia'],$responsavel,$data['descricao'],$data['endereco'],$data['quantidade']);
    
    flash('Material foi inserido com sucesso!', 'success');
    return $stmt->execute();
    

};

$editarMaterial = function($id) use ($conn){
    //EDITAR MATERIAL
    $data = material_get_data('/admin/pages/materiais');
    date_default_timezone_set('America/Sao_Paulo');
    
    if($data['un_medida'] == 'Selecione'){
        flash('Selecione os campos obrigatórios','error');

        header('location: /admin/pages/novo-material');
        exit;
    }
    // var_dump($data['fotoAntiga']);exit;
    if(isset($_FILES['file'])){
        $extensao = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        $formatosPermitidos = array('jpg','png','jpeg');
        $tamanho = $_FILES['file']['size']; 
        // var_dump($data['fotoAntiga']);exit;
        if($_FILES['file']['type'] == 'image/png' || $_FILES['file']['type'] == 'image/jpeg' || $_FILES['file']['type'] == 'image/jpg'){
            if($tamanho <= 2097152){
                $extensao = strtolower(substr($_FILES['file']['name'], -4)); // pega a extensao do arquivo
                $novo_nome = 'image-'.rand(5,10000).'-'. date("Y.m.d").$extensao; // define o nome do arquivo
                $diretorio = __DIR__ . "/../../public/img/"; // define o diretório para onde iremos enviar o arquivo
                $data['file'] = $novo_nome;
                move_uploaded_file($_FILES['file']['tmp_name'], $diretorio.$novo_nome); // efetua o upload
                
                if($data['fotoAntiga'] == 'img/'){
                    // var_dump($data['fotoAntiga']);exit;
                    $sql = 'UPDATE materiais SET un_medida=?, equipamento=?,referencia=?,descricao=?,nome_img=?,endereco=?,quantidade=?,data_de_atualizacao=NOW() WHERE codigo = ?';
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param('ssssssii',strtoupper($data['un_medida']),$data['equipamento'],$data['referencia'],$data['descricao'],$data['file'],$data['endereco'],$data['quantidade'],$id);

                    flash('Material foi atualizado com sucesso!', 'success'); 
                    
                    return $stmt->execute();
                }

                unlink($data['fotoAntiga']); // APAGA A IMAGEM ANTIGA NO SERVIDOR
            
                // EDITAR MATERIAL
                $sql = 'UPDATE materiais SET un_medida=?, equipamento=?,referencia=?,descricao=?,nome_img=?,endereco=?,quantidade=?,data_de_atualizacao=NOW() WHERE codigo = ?';
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('ssssssii',strtoupper($data['un_medida']),$data['equipamento'],$data['referencia'],$data['descricao'],$data['file'],$data['endereco'],$data['quantidade'],$id);

                flash('Material foi atualizado com sucesso!', 'success'); 
                
                return $stmt->execute();

            }
        }else{
            var_dump($formatosPermitidos);exit;
            flash('O formato do arquivo anexado não é permitido!','error');

            header("location: /admin/pages/{$id}/editar-material");
            exit;
        }
        
    }

    $sql = 'UPDATE materiais SET un_medida=?, equipamento=?,referencia=?,descricao=?,endereco=?,quantidade=?,data_de_atualizacao=NOW() WHERE codigo = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssssii',$data['un_medida'],$data['equipamento'],$data['referencia'],$data['descricao'],$data['endereco'],$data['quantidade'],$id);
    flash('Material foi atualizado com sucesso!', 'success');  

    return $stmt->execute();
    
};

$listarMedidas = function() use($conn){
    $sql = 'SELECT nome FROM unidade_de_medidas';
    $result = $conn->query($sql);

    return $result->fetch_all(MYSQLI_ASSOC);
};

$removerMaterial = function($id) use ($conn){
    // REMOVER MATERIAL
    $sql = 'DELETE FROM materiais WHERE codigo = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i',$id);
    flash('Material foi excluído com sucesso!', 'success');

    return $stmt->execute();
};

$verMaterial = function($id) use ($conn){
    //VER APENAS UM MATERIAL POR VEZ  
    $sql = 'SELECT * FROM materiais WHERE codigo = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i',$id);
    $stmt->execute();

    $result = $stmt->get_result();
    return $result->fetch_assoc();
};

$despacho = function() use ($conn){
    $data = despache_get_data();
    
    // var_dump($data['nome']);exit;
    $sql = 'SELECT * FROM materiais WHERE codigo = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i',$data['codigo']);
    $stmt->execute();
    $result = $stmt->get_result();

    $r = $result->fetch_assoc();
    // var_dump($r);exit;
    $qtd = $r['quantidade'];
    $cod = $r['codigo'];
    $data['quantidade'] = (int) $data['quantidade'];
    // var_dump($cod);exit;
    
    if($data['quantidade'] > $qtd && $cod != $data['codigo']){
        flash('Material não encontrado!','error');

        header('location: /admin/pages/deliberar-material');
        exit();
    }else if($data['quantidade'] > $qtd && $cod == $data['codigo']){
        flash('A quantidade informada é superior ao que tem em estoque!', 'warning');

        header('location: /admin/pages/deliberar-material');
        exit();
    }else if($data['quantidade'] == 0 && $data['codigo'] == $cod || $data['quantidade'] == 0 && $data['codigo'] =! $cod){
        flash('Quantidade não pode possuir o valor "ZERO"', 'error');

        header('location: /admin/pages/deliberar-material');
        exit();
    }else if($data['quantidade'] <= $qtd && $data['quantidade'] > 0){
        $qtd -= $data['quantidade'];
        $sql = 'UPDATE materiais SET quantidade=? WHERE codigo = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ii',$qtd,$data['codigo']);
        $stmt->execute();
        flash('Realizado despacho com sucesso!','success');

        return $stmt->execute();
    }else{
        return false;
    }
        
    
};

$inserirDadosDespacho = function() use($conn){
    $data = despache_get_data();

    $sql = 'SELECT codigo,quantidade FROM materiais WHERE codigo = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i',$data['codigo']);
    $stmt->execute();
    $result = $stmt->get_result();
    $r = $result->fetch_assoc();
    // tenho que validar via DOM o código do material
    $cod_material = $r['codigo'];
    $qtd = $r['quantidade'];
    // var_dump($qtd);exit;
    // var_dump($cod_material);exit;
    if($data['codigo'] == $cod_material){
        if($data['quantidade'] > 0 && $data['quantidade'] <= $qtd){
            $sql = 'INSERT INTO solicitacao (codigo,matricula,colaborador,setor,utilizacao,quantidade,data_de_despache) VALUES (?,?,?,?,?,?,now())';
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('issssi',$data['codigo'],$data['matricula'],$data['colaborador'],$data['setor'],$data['utilizacao'],$data['quantidade']);
            
            return $stmt->execute();
        }
       
    }
};

$listarDespacho = function() use ($conn){
    $data = despache_get_data();

    $sql = 'SELECT c.codigo,c.matricula,c.colaborador,c.setor,c.utilizacao,m.equipamento, c.quantidade,c.data_de_despache
    FROM materiais as m 
    INNER JOIN solicitacao as c 
    ON m.codigo = c.codigo';
    $result = $conn->query($sql);

    return $result->fetch_all(MYSQLI_ASSOC);
};

$reporEstoque = function() use($conn){
    $data = renovar_estoque();

    $sql = 'SELECT codigo,quantidade FROM MATERIAIS WHERE codigo = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i',$data['codigo']);
    $stmt->execute();
    $result = $stmt->get_result();
    $r = $result->fetch_assoc();

    $qtd = $r['quantidade'];
    $cod = $r['codigo'];
    $data['quantidade'] = (int) $data['quantidade'];
    $qtd += $data['quantidade'];
    // var_dump($qtd);exit;

    if($data['codigo'] =! $cod){
        flash('Não foi possível renovar o estoque, verifique se os dados foram inseridos corretamente!','error');
        
        return header('location: /admin/pages/materiais');
    }else if($data['quantidade'] == 0 || $data['quantidade'] < 0 ){
        flash('Não foi possível renovar o estoque, verifique se os dados foram inseridos corretamente!','error');

        return header('location: /admin/pages/materiais');
    }else{
        // var_dump($cod); exit;
        $sql = "UPDATE materiais SET quantidade=?,data_de_atualizacao=now()  WHERE codigo=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ii',$qtd,$cod);
        $stmt->execute();
        flash('Estoque atualizado com sucesso!','success');
    }
    
};

$gerarRelatorioHistorico = function() use($conn){
    $date = date('d-m-Y');

        $nome = "Base-materiais.xls";

        // Definimos o nome do arquivo que será exportado

        $arquivo = $date." - ".$nome;

        

        // Criamos uma tabela HTML com o formato da planilha

        $html = '';

        $html .= '<table border="1">';

        
        $html .= '<td><b>CODIGO</b></td>';

        $html .= '<td><b>UN.MEDIDA</b></td>';
        
        $html .= '<td><b>EQUIPAMENTO</b></td>';

        $html .= '<td><b>REFERENCIA</b></td>';

        $html .= '<td><b>DESCRICAO</b></td>';

        $html .= '<td><b>ENDERECO</b></td>';

        $html .= '<td><b>DATA DE CADASTRO</b></td>';
        

        $html .= '</tr>';

        

        //Selecionar todos os itens da tabela

        $result_msg_contatos = "SELECT * FROM materiais";

        $resultado_msg_contatos = mysqli_query($conn , $result_msg_contatos);

        

        while($row_msg_contatos = mysqli_fetch_assoc($resultado_msg_contatos)){

                $html .= '<tr>';

                $html .= '<td style="vertical-align: top;">'.$row_msg_contatos["codigo"].'</td>';

                $html .= '<td style="vertical-align: top;">'.$row_msg_contatos["un_medida"].'</td>';

                $html .= '<td style="vertical-align: top;">'.$row_msg_contatos["equipamento"].'</td>';

                $html .= '<td style="vertical-align: top;">'.$row_msg_contatos["referencia"].'</td>';

                $html .= '<td style="vertical-align: top;">'.$row_msg_contatos["descricao"].'</td>';

                $html .= '<td style="vertical-align: top;">'.$row_msg_contatos["endereco"].'</td>';

                $html .= '<td style="vertical-align: top;">'.$row_msg_contatos["data_de_cadastro"].'</td>';

                $html .= '</tr>';

        }

        // Configurações header para forçar o download

        header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

        header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");

        header ("Cache-Control: no-cache, must-revalidate");

        header ("Pragma: no-cache");

        // header ("Content-type: application/x-msexcel");
        header ('Content-type: application/vnd.ms-excel');
        
        header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );

        header ("Content-Description: PHP Generated Data" );

        // Envia o conteúdo do arquivo

        echo $html;
        exit; 
};

$gerarRelatorioDespacho = function() use($conn){
    $date = date('d-m-Y');

        $nome = "Despache-materiais.xls";

        // Definimos o nome do arquivo que será exportado

        $arquivo = $date." - ".$nome;

        

        // Criamos uma tabela HTML com o formato da planilha

        $html = '';

        $html .= '<table border="1">';

        
        $html .= '<td><b>CODIGO</b></td>';

        $html .= '<td><b>MATRICULA</b></td>';
        
        $html .= '<td><b>COLABORADOR</b></td>';

        $html .= '<td><b>SETOR</b></td>';

        $html .= '<td><b>UTILIZACAO</b></td>';

        $html .= '<td><b>EQUIPAMENTO</b></td>';

        $html .= '<td><b>QUANTIDADE</b></td>';

        $html .= '<td><b>DATA DE ENVIO</b></td>';
        

        $html .= '</tr>';

        

        //Selecionar todos os itens da tabela

        $result_msg_contatos = 'SELECT c.codigo,c.matricula,c.colaborador,c.setor,c.utilizacao,m.equipamento, c.quantidade,c.data_de_despache
        FROM materiais as m 
        INNER JOIN solicitacao as c 
        ON m.codigo = c.codigo';
        

        $resultado_msg_contatos = mysqli_query($conn , $result_msg_contatos);

        

        while($row_msg_contatos = mysqli_fetch_assoc($resultado_msg_contatos)){

                $html .= '<tr>';

                $html .= '<td style="vertical-align: top;">'.$row_msg_contatos["codigo"].'</td>';

                $html .= '<td style="vertical-align: top;">'.$row_msg_contatos["matricula"].'</td>';

                $html .= '<td style="vertical-align: top;">'.$row_msg_contatos["colaborador"].'</td>';

                $html .= '<td style="vertical-align: top;">'.$row_msg_contatos["setor"].'</td>';

                $html .= '<td style="vertical-align: top;">'.$row_msg_contatos["utilizacao"].'</td>';

                $html .= '<td style="vertical-align: top;">'.$row_msg_contatos["equipamento"].'</td>';

                $html .= '<td style="vertical-align: top;">'.$row_msg_contatos["quantidade"].'</td>';

                $html .= '<td style="vertical-align: top;">'.$row_msg_contatos["data_de_despache"].'</td>';

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
        exit; 
};

$pesquisarEquipamento = function($id) use($conn){
    $sql = 'SELECT equipamento FROM materiais WHERE codigo = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i',$id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    echo json_encode($result->fetch_assoc());

};