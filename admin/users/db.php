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