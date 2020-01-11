<?php

// function material_get_data($redirecionarError){
//     $file = filter_input(INPUT_POST, 'file');
//     $un_medida = filter_input(INPUT_POST, 'un_medida');
//     $equipamento = filter_input(INPUT_POST, 'equipamento');
//     $referencia = filter_input(INPUT_POST, 'referencia');
//     $descricao = filter_input(INPUT_POST, 'descricao');
//     $endereco = filter_input(INPUT_POST, 'endereco');
//     $servico = filter_input(INPUT_POST, 'servico');
//     $quantidade = filter_input(INPUT_POST, 'quantidade');
    

//     if(is_null($un_medida) or is_null($equipamento)){
//         flash('Informe os campos obrigatórios','error');
//         header('location: ' . $redirecionarError);
//         die();
//     }
//     return compact('un_medida','equipamento','referencia','quantidade','servico','file','endereco','descricao');
// }

// function usuario_get_data_perfil(){
//     $senha = filter_input(INPUT_POST, 'senha');

//     if(is_null($senha)){
//         flash('Senha vazia','error');
//         header('location: ' . $redirecionarError);
//         die();
//     }
//     return compact('senha');
// }

// function usuario_get_data_perfil(){
//     $senha = filter_input(INPUT_POST, 'senha');

//     if(is_null($senha)){
//         flash('Senha vazia','error');
//         header('location: /painel');
//         die();
//     }
//     return compact('senha');
// }

// function usuario_get_data_avatar(){
//     $file = filter_input(INPUT_POST, 'file');
    
//     return compact('file');
// }
// // *** FUNÇÕES ANÔNIMAS PARA PERFIL DE USUÁRIO ***

// $verUsuario = function($id) use ($conn){
//     // VISUALIZAR UM USUARIO POR VEZ

//     $sql = 'SELECT * FROM usuarios WHERE id_usuario = ?';
//     $stmt = $conn->prepare($sql);
//     $stmt->bind_param('i',$id);
//     $stmt->execute();
//     $result = $stmt->get_result();

//     return $result->fetch_assoc();
// };

// $redefinirSenha = function($id) use($conn){
//     $data = usuario_get_data_perfil();
//     // var_dump($data['senha']); exit;
//     $sql = 'UPDATE usuarios SET senha=md5(?),data_de_atualizacao=NOW() WHERE id_usuario = ?';
//     $stmt = $conn->prepare($sql);
//     $stmt->bind_param('si',$data['senha'],$id);

//     flash('Dados atualizados com sucesso!', 'success');

//     return $stmt->execute();
// };
// $editarPerfil = function($id) use ($conn){
//     // EDITAR USUARIO
//     $data = usuario_get_data_avatar();
//     date_default_timezone_set('America/Sao_Paulo');

//     if(isset($_FILES['file'])){
//         $extensao = strtolower(substr($_FILES['file']['name'], -4)); // pega a extensao do arquivo
//         $result = 'User - ' . date("Y.m.d-H.i.s"). $extensao; // define o nome do arquivo
//         $diretorio = __DIR__ . "/../../public/img/"; // define o diretório para onde iremos enviar o arquivo
        
//         $data['file'] = $result;
//         // var_dump($data['file']);exit;
//         move_uploaded_file($_FILES['file']['tmp_name'], $diretorio.$result); // efetua o upload

//         $sql = 'UPDATE usuarios SET nome_img=?,data_de_atualizacao=NOW() WHERE id_usuario = ?';
//         $stmt = $conn->prepare($sql);
//         $stmt->bind_param('si',$data['file'],$id);

//         flash('Dados atualizados com sucesso!', 'success');
//     }

//     return $stmt->execute();
// };


// // *** FUNÇÕES ANÔNIMAS PARA OS MATERIAIS ***
// $listarMateriais = function() use($conn){
//     // Listagem de materiais
//     $sql = 'SELECT * FROM materiais WHERE quantidade > 0';
//     $result = $conn->query($sql);

//     return $result->fetch_all(MYSQLI_ASSOC);

// };

// $historico = function() use($conn){
//     // Listagem de materiais
//     $sql = 'SELECT * FROM materiais';
//     $result = $conn->query($sql);

//     return $result->fetch_all(MYSQLI_ASSOC);
// };

// $criarMaterial = function() use ($conn){
//     // pegar os dados do formulário
//     $data = material_get_data('/painel/pages/novo-material');
    
//     //Tratando o arquivo
//     if(isset($_FILES['file'])){
//         // var_dump($_FILES['file']);exit;
//         date_default_timezone_set('America/Sao_Paulo');
//         $extensao = strtolower(substr($_FILES['file']['name'], -4)); // pega a extensao do arquivo
//         $novo_nome = 'Mat - ' . date("Y.m.d"). $extensao; // define o nome do arquivo
//         $diretorio = __DIR__ . "/../../public/img/"; // define o diretório para onde iremos enviar o arquivo
//         // var_dump($_FILES['file']); exit;
//         $data['file'] = $novo_nome;
//         // var_dump($data['file']);exit;
//         move_uploaded_file($_FILES['file']['tmp_name'], $diretorio.$novo_nome); // efetua o upload
        
//         // CRIAR MATERIAL
//         $sql = 'INSERT INTO materiais (un_medida,equipamento,referencia,nome_img,descricao,endereco,servico,quantidade,data_de_cadastro,data_de_atualizacao) VALUES (?,?,?,?,?,?,?,?,NOW(),NOW())';
//         $stmt = $conn->prepare($sql);
//         $stmt->bind_param('dssssssi',$data['un_medida'],$data['equipamento'],$data['referencia'],$data['file'],$data['descricao'],$data['endereco'],$data['servico'],$data['quantidade']);
        
//         flash('Material foi inserido com sucesso!', 'success');
//     }

//     return $stmt->execute();
// };

// $editarMaterial = function($id) use ($conn){
//     //EDITAR MATERIAL
//     $data = material_get_data('/admin/pages/materiais');
//     date_default_timezone_set('America/Sao_Paulo');
//     if(isset($_FILES['file'])){
//         $extensao = strtolower(substr($_FILES['file']['name'], -4)); // pega a extensao do arquivo
//         $result = 'Mat - ' . date("Y.m.d-H.i.s"). $extensao; // define o nome do arquivo
//         $diretorio = __DIR__ . "/../../public/img/"; // define o diretório para onde iremos enviar o arquivo
        
//         $data['file'] = $result;
//         // var_dump($data['file']);exit;
//         move_uploaded_file($_FILES['file']['tmp_name'], $diretorio.$result); // efetua o upload

//         // EDITAR MATERIAL
//         $sql = 'UPDATE materiais SET un_medida=?, equipamento=?,referencia=?,descricao=?,nome_img=?,endereco=?,servico=?,quantidade=?,data_de_atualizacao=NOW() WHERE codigo = ?';
//         $stmt = $conn->prepare($sql);
//         $stmt->bind_param('dssssssii',$data['un_medida'],$data['equipamento'],$data['referencia'],$data['descricao'],$data['file'],$data['endereco'],$data['servico'],$data['quantidade'],$id);

//         flash('Material foi atualizado com sucesso!', 'success'); 
//     }
    
//     return $stmt->execute();
// };

// $removerMaterial = function($id) use ($conn){
//     // REMOVER MATERIAL
//     $sql = 'DELETE FROM materiais WHERE codigo = ?';
//     $stmt = $conn->prepare($sql);
//     $stmt->bind_param('i',$id);
//     flash('Material foi excluído com sucesso!', 'success');

//     return $stmt->execute();
// };

// $verMaterial = function($id) use ($conn){
//     //VER APENAS UM MATERIAL POR VEZ  
//     $sql = 'SELECT * FROM materiais WHERE codigo = ?';
//     $stmt = $conn->prepare($sql);
//     $stmt->bind_param('i',$id);
//     $stmt->execute();

//     $result = $stmt->get_result();
//     return $result->fetch_assoc();
// };






function material_get_data($redirecionarError){
    $file = filter_input(INPUT_POST, 'file');
    $un_medida = filter_input(INPUT_POST, 'un_medida');
    $equipamento = filter_input(INPUT_POST, 'equipamento');
    $referencia = filter_input(INPUT_POST, 'referencia');
    $descricao = filter_input(INPUT_POST, 'descricao');
    $endereco = filter_input(INPUT_POST, 'endereco');
    $quantidade = filter_input(INPUT_POST, 'quantidade');
    

    if(is_null($un_medida) or is_null($equipamento)){
        flash('Informe os campos obrigatórios','error');
        header('location: ' . $redirecionarError);
        die();
    }
    return compact('un_medida','equipamento','referencia','quantidade','file','endereco','descricao');
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
    $data = material_get_data('/painel/pages/novo-material');
    if($data['un_medida'] == 'Selecione'){
        flash('Selecione os campos obrigatórios','error');

        header('location: /admin/pages/novo-material');
        exit;
    }
    //Tratando o arquivo
    if(isset($_FILES['file'])){
        // var_dump($_FILES['file']);exit;
        date_default_timezone_set('America/Sao_Paulo');
        $extensao = strtolower(substr($_FILES['file']['name'], -4)); // pega a extensao do arquivo
        $novo_nome = 'Mat - ' . date("Y.m.d"). $extensao; // define o nome do arquivo
        $diretorio = __DIR__ . "/../../public/img/"; // define o diretório para onde iremos enviar o arquivo
        // var_dump($_FILES['file']); exit;
        $data['file'] = $novo_nome;
        // var_dump($data['file']);exit;
        move_uploaded_file($_FILES['file']['tmp_name'], $diretorio.$novo_nome); // efetua o upload
        
        // CRIAR MATERIAL
        $sql = 'INSERT INTO materiais (un_medida,equipamento,referencia,nome_img,descricao,endereco,quantidade,data_de_cadastro,data_de_atualizacao) VALUES (?,?,?,?,?,?,?,NOW(),NOW())';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssssssi',strtoupper($data['un_medida']),$data['equipamento'],$data['referencia'],$data['file'],$data['descricao'],$data['endereco'],$data['quantidade']);
        
        flash('Material foi inserido com sucesso!', 'success');
    }

    return $stmt->execute();
};

$editarMaterial = function($id) use ($conn){
    //EDITAR MATERIAL
    $data = material_get_data('/painel/pages/materiais');
    date_default_timezone_set('America/Sao_Paulo');
    
    if(isset($_FILES['file'])){
        $extensao = strtolower(substr($_FILES['file']['name'], -4)); // pega a extensao do arquivo
        $result = 'Mat - ' . date("Y.m.d-H.i.s"). $extensao; // define o nome do arquivo
        $diretorio = __DIR__ . "/../../public/img/"; // define o diretório para onde iremos enviar o arquivo
        // var_dump($extensao);exit;
        $data['file'] = $result;
        // var_dump($data['file']);exit;
        move_uploaded_file($_FILES['file']['tmp_name'], $diretorio.$result); // efetua o upload

        // EDITAR MATERIAL
        $sql = 'UPDATE materiais SET un_medida=?, equipamento=?,referencia=?,descricao=?,nome_img=?,endereco=?,quantidade=?,data_de_atualizacao=NOW() WHERE codigo = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssssssii',strtoupper($data['un_medida']),$data['equipamento'],$data['referencia'],$data['descricao'],$data['file'],$data['endereco'],$data['quantidade'],$id);

        flash('Material foi atualizado com sucesso!', 'success'); 
    }
    
    return $stmt->execute();
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

        header('location: /painel/pages/deliberar-material');
        exit();
    }else if($data['quantidade'] > $qtd && $cod == $data['codigo']){
        flash('A quantidade informada é superior ao que tem em estoque!', 'warning');

        header('location: /painel/pages/deliberar-material');
        exit();
    }else if($data['quantidade'] == 0 && $data['codigo'] == $cod || $data['quantidade'] == 0 && $data['codigo'] =! $cod){
        flash('Quantidade não pode possuir o valor "ZERO"', 'error');

        header('location: /painel/pages/deliberar-material');
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
            $stmt->bind_param('issssi',$data['codigo'],$data['matricula'],strtoupper($data['colaborador']),strtoupper($data['setor']),$data['utilizacao'],$data['quantidade']);    
            
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
        
        return header('location: /painel/pages/materiais');
    }else if($data['quantidade'] == 0 || $data['quantidade'] < 0 ){
        flash('Não foi possível renovar o estoque, verifique se os dados foram inseridos corretamente!','error');

        return header('location: /painel/pages/materiais');
    }else{
        // var_dump($cod); exit;
        $sql = "UPDATE materiais SET quantidade=?,data_de_atualizacao=now()  WHERE codigo=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ii',$qtd,$cod);
        $stmt->execute();
        flash('Estoque atualizado com sucesso!','success');
    }
    
};

$listarMedidas = function($id) use($conn){
    $sql = 'SELECT nome FROM unidades';
    $result = $conn->query($sql);

    return $result->fetch_all(MYSQLI_ASSOC);
};