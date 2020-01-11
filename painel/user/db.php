<?php 

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

// *** FUNÇÕES ANÔNIMAS PARA PERFIL DE USUÁRIO ***

$verUsuario = function($id) use ($conn){
    // VISUALIZAR UM USUARIO POR VEZ

    $sql = 'SELECT * FROM usuarios WHERE id_usuario = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i',$id);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result->fetch_assoc();
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

$redefinirSenha = function($id) use($conn){
    $data = usuario_get_data_perfil();
    $id_usuario = (int )$_SESSION['id_usuario'];
    
    $sql = 'UPDATE usuarios SET senha=md5(?),data_de_atualizacao=NOW() WHERE id_usuario = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si',$data['senha'],$id_usuario);
    
    flash('Dados atualizados com sucesso!', 'success');

    return $stmt->execute();
};

