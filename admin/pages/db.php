<?php 

function usuario_get_data($redirecionarError){
    $matricula = filter_input(INPUT_POST, 'matricula');
    $nome = filter_input(INPUT_POST, 'nome');
    $email = filter_input(INPUT_POST, 'email');
    $setor = filter_input(INPUT_POST, 'setor');
    $cargo = filter_input(INPUT_POST, 'cargo');
    $senha = filter_input(INPUT_POST, 'senha');
    if(is_null($matricula) or is_null($nome) or is_null($email)){
        flash('Informe os campos obrigatórios','error');
        header('location: ' . $redirecionarError);
        die();
    }
    return compact('matricula','nome','email','setor','cargo','senha');
}

function material_get_data($redirecionarError){
    $codigo = filter_input(INPUT_POST, 'codigo');
    $equipamento = filter_input(INPUT_POST, 'equipamento');
    $referencia = filter_input(INPUT_POST, 'referencia');
    $descricao = filter_input(INPUT_POST, 'descricao');
    $endereco = filter_input(INPUT_POST, 'endereco');
    $servico = filter_input(INPUT_POST, 'servico');
    $quantidade = filter_input(INPUT_POST, 'quantidade');
   
    if(is_null($codigo) or is_null($equipamento)){
        flash('Informe os campos obrigatórios','error');
        header('location: ' . $redirecionarError);
        die();
    }
    return compact('codigo','equipamento','referencia','quantidade','servico','endereco','descricao');
}

// *** FUNÇÃO ANÔNIMAS PARA BUSCA ***
// $pesquisarAll = function() use($conn){
//     $sql = 'SELECT * FROM sga.usuarios';
//     $result = $conn->query($sql);

//     return $result->fetch_all(MYSQLI_ASSOC);
// };

// *** FUNÇÕES ANÔNIMAS PARA OS USUARIOS ***

$listarUsuario = function() use($conn){
    // buscar todos os usuarios
    $sql = 'SELECT * FROM sga.usuarios';
    $result = $conn->query($sql);

    return $result->fetch_all(MYSQLI_ASSOC);
};


$criarUsuario = function() use ($conn){
    //CRIAR USUARIO
    $data = usuario_get_data('/admin/pages/novo-usuario');

    $sql = 'INSERT INTO usuarios (matricula,nome,email,setor,cargo,senha,data_de_criacao,data_de_atualizacao) VALUES (?,?,?,?,?,?,NOW(),NOW())';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssss',$data['matricula'],$data['nome'],$data['email'],$data['setor'],$data['cargo'],$data['senha']);
    flash('Usuário foi criado com sucesso!', 'success');
    
    return $stmt->execute();
};

$editarUsuario = function($id) use ($conn){
    // EDITAR USUARIO
    $data = usuario_get_data('/admin/pages/' . $id);

    $sql = 'UPDATE usuarios SET matricula = ?, nome=?,email=?,setor=?,cargo=?,senha=md5(?),data_de_atualizacao=NOW() WHERE id_usuario = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssssi',$data['matricula'],$data['nome'],$data['email'],$data['setor'],$data['cargo'],$data['senha'],$id);

    flash('Usuário foi atualizado com sucesso!', 'success');

    return $stmt->execute();
};

$removerUsuario = function($id) use ($conn){
    //REMOVER USUARIO
    $sql = 'DELETE FROM usuarios WHERE id_usuario = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i',$id);

    flash('Usuário foi removido com sucesso!', 'success');

    return $stmt->execute();
};

$verUsuario = function($id) use ($conn){
    // VISUALIZAR UM USUARIO POR VEZ

    $sql = 'SELECT * FROM usuarios WHERE id_usuario = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i',$id);
    $stmt->execute();

    $result = $stmt->get_result();
    return $result->fetch_assoc();
};


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
    // CRIAR MATERIAL
    $data = material_get_data('/admin/pages/novo-material');

    $sql = 'INSERT INTO materiais (codigo,equipamento,referencia,descricao,endereco,servico,quantidade,data_de_cadastro,data_de_atualizacao) VALUES (?,?,?,?,?,?,?,NOW(),NOW())';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssssi',$data['codigo'],$data['equipamento'],$data['referencia'],$data['descricao'],$data['endereco'],$data['servico'],$data['quantidade']);
    
    flash('Material foi inserido com sucesso!', 'success');
    
    return $stmt->execute();
};

$editarMaterial = function($id) use ($conn){
    //EDITAR MATERIAL
    $data = material_get_data('/admin/pages/materiais');

    $sql = 'UPDATE materiais SET codigo=?, equipamento=?,referencia=?,descricao=?,endereco=?,servico=?,quantidade=?,data_de_atualizacao=NOW() WHERE id_material = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssssii',$data['codigo'],$data['equipamento'],$data['referencia'],$data['descricao'],$data['endereco'],$data['servico'],$data['quantidade'],$id);
    
    flash('Material foi atualizado com sucesso!', 'success');

    return $stmt->execute();
};

$removerMaterial = function($id) use ($conn){
    // REMOVER MATERIAL
    $sql = 'DELETE FROM materiais WHERE id_material = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i',$id);

    flash('Material foi excluído com sucesso!', 'success');

    return $stmt->execute();
};

$verMaterial = function($id) use ($conn){
    //VER APENAS UM MATERIAL POR VEZ  
    $sql = 'SELECT * FROM materiais WHERE id_material = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i',$id);
    $stmt->execute();

    $result = $stmt->get_result();
    return $result->fetch_assoc();
};