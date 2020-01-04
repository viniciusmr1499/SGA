<?php

include __DIR__ . '/db.php';

// ******************** USUÁRIOS ************************ // 

// LISTAGEM DE USUARIOS
if(resolve('/admin/users')){
    $lista = $listarUsuario(); 

    render('admin/users/usuarios','admin',['lista' => $lista]);
}

// ↓↓ CRIAR  USUARIO ↓↓
else if(resolve('/admin/users/novo-usuario')){

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $criarUsuario();

        return header('location: /admin/users');
    }
    render('admin/users/novo-usuario','admin');
}
// PERFIL 
else if($params = resolve('/admin/users/(\d+)/perfil')){
    // EDITAR PERFIL(SENHA DO USUARIO)
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $editarPerfil($params[1]);                
       
        return header('location: /admin');

    }
    
    $page = $verUsuario($params[1]);

    render('admin/users/perfil','admin',['page' => $page]);
}
// VER PERFIL DE UM USUÁRIO
else if($params = resolve('/admin/users/(\d+)/ver-perfil')){
    $page = $verUsuario($params[1]);

    render('admin/users/ver-perfil','admin',['page' => $page]);
}

// ↓↓ EDITAR USUARIO ↓↓
else if($params = resolve('/admin/users/(\d+)/editar-usuario')){
    // render('admin/users/editar-usuario','admin');
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $editarUsuario($params[1]);

        return header('location: /admin/users');
    }
    $page = $verUsuario($params[1]);

    render('admin/users/editar-usuario','admin',['page' => $page]);

}
// REMOVER USUARIO
else if($params = resolve('/admin/users/(\d+)/remover-usuario')){
    $removerUsuario($params[1]);

    return header('location: /admin/users');
}