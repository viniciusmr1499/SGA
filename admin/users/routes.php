<?php

include __DIR__ . '/db.php';

// ******************** USUÁRIOS ************************ // 

// LISTAGEM DE USUARIOS
if(resolve('/admin/users')){
    if($_SESSION['nivel'] == 1){
        $lista = $listarUsuario(); 
        render('admin/users/usuarios','admin',['lista' => $lista]);
    }else{
        header('location: /painel');
    }
}

// ↓↓ CRIAR  USUARIO ↓↓
else if(resolve('/admin/users/novo-usuario')){
    if($_SESSION['nivel'] == 1){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $criarUsuario();
            flash('Usuário foi criado com sucesso!', 'success');
            
            return header('location: /admin/users');
        }
        render('admin/users/novo-usuario','admin');
    }else{
        header('location: /painel');
    }
        
}
    
// PERFIL 
else if($params = resolve('/admin/users/(\d+)/perfil')){
    // EDITAR PERFIL(SENHA DO USUARIO)
    if($_SESSION['nivel'] == 1){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $editarPerfil($params[1]);                
            return header('location: /admin');
        }
        
        $page = $verUsuario($params[1]);
    
        render('admin/users/perfil','admin',['page' => $page]);
    }else{
        header('location: /painel');
    }
}
// VER PERFIL DE UM USUÁRIO
else if($params = resolve('/admin/users/(\d+)/ver-perfil')){
    if($_SESSION['nivel'] == 1){
        $page = $verUsuario($params[1]);
        render('admin/users/ver-perfil','admin',['page' => $page]); 
    }else{
        header('location: /painel');
    }
}

// ↓↓ EDITAR USUARIO ↓↓
else if($params = resolve('/admin/users/(\d+)/editar-usuario')){
    if($_SESSION['nivel'] == 1){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $editarUsuario($params[1]);
    
            return header('location: /admin/users');
        }
        $page = $verUsuario($params[1]);
    
        render('admin/users/editar-usuario','admin',['page' => $page]);
    }else{
        header('location: /painel');
    }
}
// REMOVER USUARIO
else if($params = resolve('/admin/users/(\d+)/remover-usuario')){
    if($_SESSION['nivel'] == 1){
        $removerUsuario($params[1]);

        return header('location: /admin/users');
    }else{
        header('location: /painel');
    }
}
// REDEFINIÇÃO DE SENHA
else if($params = resolve('/admin/users/(\d+)/redefinir-senha')){
    if($_SESSION['nivel'] == 1){
        $redefinirSenha($params);
        
        return header('location: /admin');
    }else{
        header('location: /painel');
    }
}