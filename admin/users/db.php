<?php 

function usuario_get_data($redirecionarError){
    $file = filter_input(INPUT_POST, 'file');
    $matricula = filter_input(INPUT_POST, 'matricula');
    $nome = filter_input(INPUT_POST, 'nomeCompleto');
    $email = filter_input(INPUT_POST, 'email');
    $setor = filter_input(INPUT_POST, 'setor');
    $cargo = filter_input(INPUT_POST, 'cargo');
    $nivel = filter_input(INPUT_POST,'nivel');
    $fotoAntiga = filter_input(INPUT_POST,'fotoAntiga');
    // $senha = filter_input(INPUT_POST, 'senha');
    $usuario = explode(".",$email);
    // $usuario = $usuario[0] . '.' . $usuario[1];
    $usuario[1] = explode('@',$usuario[1]);
    // var_dump($usuario[1][0]);exit;
    $nomeDeUsuario = $usuario[0] . '.' . $usuario[1][0];
    // var_dump($nomeDeUsuario);exit;
    
    // var_dump($matricula);exit;
    // if(is_null($matricula) or is_null($nome) or is_null($email)){
    //     flash('Informe os campos obrigatórios','error');
    //     header('location: ' . $redirecionarError);
    //     die();
    // }
    return compact('matricula','nome','email','setor','cargo','file','fotoAntiga','nivel','nomeDeUsuario');
}

// function usuario_get_data_perfil(){
//     $senha = filter_input(INPUT_POST, 'senha');

//     if(is_null($senha)){
//         flash('Senha vazia','error');
//         header('location: /admin');
//         die();
//     }
//     return compact('senha');
// }

function usuario_get_data_avatar(){
    $file = filter_input(INPUT_POST, 'file');
    $fotoAntiga = filter_input(INPUT_POST,'fotoAntiga');
    
    return compact('file','fotoAntiga');
}

$listarUsuario = function() use($conn){
    // buscar todos os usuarios
    $sql = 'SELECT *, DATE_FORMAT(data_de_criacao,"%d-%m-%Y %H:%i:%s") AS row_data  FROM sga.usuarios';
    $result = $conn->query($sql);

    return $result->fetch_all(MYSQLI_ASSOC);
};

$criarUsuario = function() use ($conn){
    //CRIAR USUARIO
    date_default_timezone_set('America/Sao_Paulo');
    $data = usuario_get_data('/admin/users/novo-usuario');
    
    // if(is_null($data['senha'])){
    //     flash('Informe o campo email','error');
    //     header('location: /admin/users/novo-usuario');
    //     exit;
    // }  
    if($data['nivel'] == ''){
        flash('Campo PERFIL DE USUARIO é obrigatório','warning');
        header('location: /admin/users/novo-usuario');
        exit;
    }
    
    if(isset($_FILES['file'])){
        // $extensao = strtolower(substr($_FILES['file']['name'], -4)); // pega a extensao do arquivo
        $extensao = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        $formatosPermitidos = array('jpg','png','jpeg');
        $tamanho = $_FILES['file']['size']; 
        
        if($_FILES['file']['type'] == 'image/png' || $_FILES['file']['type'] == 'image/jpeg' || $_FILES['file']['type'] == 'image/jpg'){
            if($tamanho <= 2097152){
                $extensao = strtolower(substr($_FILES['file']['name'], -4)); // pega a extensao do arquivo
                $novo_nome = 'image-'.rand(5,10000).'-'. date("Y.m.d").$extensao; // define o nome do arquivo
                $diretorio = __DIR__ ."/../../public/img/"; // define o diretório para onde iremos enviar o arquivo
                move_uploaded_file($_FILES['file']['tmp_name'], $diretorio.$novo_nome); // efetua o upload

                $sql = 'INSERT INTO usuarios (matricula,nome,email,setor,cargo,nome_img,nivel,usuario,data_de_criacao,data_de_atualizacao) VALUES (?,?,?,?,?,?,?,?,NOW(),NOW())';
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('ssssssss',$data['matricula'],$data['nome'],$data['email'],$data['setor'],$data['cargo'],$novo_nome,$data['nivel'],$data['nomeDeUsuario']);
                
                return $stmt->execute();
            }
        }
    }
    
    $sql = 'INSERT INTO usuarios (matricula,nome,email,setor,cargo,nome_img,nivel,usuario,data_de_criacao,data_de_atualizacao) VALUES (?,?,?,?,?,?,?,?,NOW(),NOW())';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssssss',$data['matricula'],$data['nome'],$data['email'],$data['setor'],$data['cargo'],$novo_nome,$data['nivel'],$data['nomeDeUsuario']);
    
    return $stmt->execute();
};

$editarUsuario = function($id) use ($conn){
    // EDITAR USUARIO
    $data = usuario_get_data("/admin/users/$id/editar-usuario");

    if($data['nivel'] == ''){
        flash('Campo PERFIL DE USUARIO é obrigatório','warning');
        header("location: /admin/users/$id/editar-usuario");
        exit;
    }
    // var_dump($data['nivel']);exit;

    $sql = 'UPDATE usuarios SET matricula=?, nome=?,email=?,setor=?,cargo=?,nivel=?,data_de_atualizacao=NOW() WHERE id_usuario = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssssii',$data['matricula'],$data['nome'],$data['email'],$data['setor'],$data['cargo'],$data['nivel'],$id);
    
    flash('Usuário foi atualizado com sucesso!', 'success');

    return $stmt->execute();
};

$editarPerfil = function($id) use ($conn){
    // EDITAR USUARIO
    $data = usuario_get_data_avatar();
    date_default_timezone_set('America/Sao_Paulo');
    
    if(isset($_FILES['file'])){
        $extensao = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        $formatosPermitidos = array('jpg','png','jpeg');
        $tamanho = $_FILES['file']['size'];    
        // var_dump($tamanho);exit;
        if(in_array($extensao,$formatosPermitidos)){
            if($tamanho <= 2097152){
                $extensao = strtolower(substr($_FILES['file']['name'], -4)); // pega a extensao do arquivo
         
                $novo_nome = 'image-'.rand(5,10000).'-'. date("Y.m.d").$extensao; // define o nome do arquivo
                
                $diretorio = __DIR__ ."/../../public/img/"; // define o diretório para onde iremos enviar o arquivo
             
                move_uploaded_file($_FILES['file']['tmp_name'], $diretorio.$novo_nome); // efetua o upload

                unlink($data['fotoAntiga']); // APAGA A IMAGEM ANTIGA NO SERVIDOR
                $data['file'] = $novo_nome;
                $_SESSION['avatar'] = $novo_nome;
                $sql = 'UPDATE usuarios SET nome_img=?,data_de_atualizacao=NOW() WHERE id_usuario = ?';
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('si',$data['file'],$id);
                
                flash('Dados atualizados com sucesso!', 'success');
                return $stmt->execute();
            }
           
        }else if(!in_array($extensao,$formatosPermitidos)){
            flash('O formato da imagem anexada não é permitida!','error');
            header('location: /painel');
            die();
        }else{
            // var_dump($tamanho);exit;
            flash('O Tamanho da imagem não pode ser superior a 2MB!','warning');
            header('location: /painel');
            die();
        }
    }

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

// $redefinirSenha = function($id) use($conn){
//     $data = usuario_get_data_perfil();
//     $id_usuario = (int) $_SESSION['id_usuario'];
    
//     // var_dump($id_usuario); exit;
//     $sql = 'UPDATE usuarios SET senha=md5(?),data_de_atualizacao=NOW() WHERE id_usuario = ?';
//     $stmt = $conn->prepare($sql);
//     $stmt->bind_param('si',$data['senha'],$id_usuario);
    
//     flash('Dados atualizados com sucesso!', 'success');

//     return $stmt->execute();
// };