<?php 

function usuario_get_data($redirecionarError){
    $file = filter_input(INPUT_POST, 'file');
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
    return compact('matricula','nome','email','setor','cargo','senha','file');
}

function usuario_get_data_perfil(){
    $senha = filter_input(INPUT_POST, 'senha');

    if(is_null($senha)){
        flash('Senha vazia','error');
        header('location: /admin');
        die();
    }
    return compact('senha');
}

function usuario_get_data_avatar(){
    $file = filter_input(INPUT_POST, 'file');
    
    return compact('file');
}


$listarUsuario = function() use($conn){
    // buscar todos os usuarios
    $sql = 'SELECT * FROM sga.usuarios';
    $result = $conn->query($sql);

    return $result->fetch_all(MYSQLI_ASSOC);
};

$criarUsuario = function() use ($conn){
    //CRIAR USUARIO
    date_default_timezone_set('America/Sao_Paulo');
    $data = usuario_get_data('/admin/pages/novo-usuario');

    
    if(isset($_FILES['file'])){
        
        // var_dump($_FILES['file']);exit;
        
        $extensao = strtolower(substr($_FILES['file']['name'], -4)); // pega a extensao do arquivo
        $novo_nome = 'user - ' . date("Y.m.d"). $extensao; // define o nome do arquivo
        $diretorio = __DIR__ . "/../../public/img/"; // define o diretório para onde iremos enviar o arquivo
        // var_dump($_FILES['file']); exit;
        $data['file'] = $novo_nome;
        // var_dump($data['file']);exit;
        move_uploaded_file($_FILES['file']['tmp_name'], $diretorio.$novo_nome); // efetua o upload

        if(is_null($data['senha'])){
            flash('Informe o campo email','error');
            header('location: /admin/users/novo-usuario');
            die();
        }

        $sql = 'INSERT INTO usuarios (matricula,nome,email,setor,cargo,nome_img,senha,data_de_criacao,data_de_atualizacao) VALUES (?,?,?,?,?,?,md5(?),NOW(),NOW())';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssssss',$data['matricula'],$data['nome'],$data['email'],$data['setor'],$data['cargo'],$data['file'],$data['senha']);
        flash('Usuário foi criado com sucesso!', 'success');
    }

    return $stmt->execute();
};

$editarUsuario = function($id) use ($conn){
    // EDITAR USUARIO
    $data = usuario_get_data('/admin');
    
    $sql = 'UPDATE usuarios SET matricula=?, nome=?,email=?,setor=?,cargo=?,senha=md5(?),data_de_atualizacao=NOW() WHERE id_usuario = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssssi',$data['matricula'],$data['nome'],$data['email'],$data['setor'],$data['cargo'],$data['senha'],$id);
    
    flash('Usuário foi atualizado com sucesso!', 'success');

    return $stmt->execute();
};

$editarPerfil = function($id) use ($conn){
    // EDITAR USUARIO
    $data = usuario_get_data_avatar();
    date_default_timezone_set('America/Sao_Paulo');

    if(isset($_FILES['file'])){
        $extensao = strtolower(substr($_FILES['file']['name'], -4)); // pega a extensao do arquivo
        $result = 'User - ' . date("Y.m.d-H.i.s"). $extensao; // define o nome do arquivo
        $diretorio = __DIR__ . "/../../public/img/"; // define o diretório para onde iremos enviar o arquivo
        
        $data['file'] = $result;
        // var_dump($data['file']);exit;
        move_uploaded_file($_FILES['file']['tmp_name'], $diretorio.$result); // efetua o upload

        $sql = 'UPDATE usuarios SET nome_img=?,data_de_atualizacao=NOW() WHERE id_usuario = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('si',$data['file'],$id);

        flash('Dados atualizados com sucesso!', 'success');
    }

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

$redefinirSenha = function($id) use($conn){
    $data = usuario_get_data_perfil();
    // var_dump($data['senha']); exit;
    $sql = 'UPDATE usuarios SET senha=md5(?),data_de_atualizacao=NOW() WHERE id_usuario = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si',$data['senha'],$id);
    
    flash('Dados atualizados com sucesso!', 'success');

    return $stmt->execute();
};