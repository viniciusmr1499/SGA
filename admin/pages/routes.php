<?php 

include_once __DIR__ . '/db.php';



// ******************** USUÁRIOS ************************ // 

// LISTAGEM DE USUARIOS
if(resolve('/admin/pages')){
    $lista = $listarUsuario();
    render('admin/pages/user/usuarios','admin',['lista' => $lista]);
}

// ↓↓ CRIAR  USUARIO ↓↓
else if(resolve('/admin/pages/novo-usuario')){
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $criarUsuario();
        return header('location: /admin/pages');
    }
    render('admin/pages/user/novo-usuario','admin');
}
// VER PERFIL DE UM USUÁRIO
else if($params = resolve('/admin/pages/(\d+)/ver-perfil')){
    $page = $verUsuario($params[1]);
    render('admin/pages/user/ver-perfil','admin',['page' => $page]);
}

// ↓↓ EDITAR USUARIO ↓↓
else if($params = resolve('/admin/pages/(\d+)/editar-usuario')){
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $editarUsuario($params[1]);
        return header('location: /admin/pages');
    }
    $page = $verUsuario($params[1]);

    render('admin/pages/user/editar-usuario','admin',['page' => $page]);
}
// REMOVER USUARIO
else if($params = resolve('/admin/pages/(\d+)/remover-usuario')){
    $removerUsuario($params[1]);
    return header('location: /admin/pages');
}


// ************************** MATERIAIS *******************************

// ↓↓ CRIAR  MATERIAL ↓↓
else if(resolve('/admin/pages/novo-material')){
    
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $criarMaterial();
        return header('location: /admin/pages/materiais');
    }

    render('admin/pages/material/novo-material','admin');
}

// ↓↓ VER UM MATERIAL POR VEZ ↓↓
else if($params = resolve('/admin/pages/(\d+)/ver-material')){
    $page = $verMaterial($params[1]);
    render('admin/pages/material/ver-material','admin',['page' => $page]);
    
}
// ↓↓ EDITAR MATERIAL ↓↓
else if($params = resolve('/admin/pages/(\d+)/editar-material')){
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $editarMaterial($params[1]);
        return header('location: /admin/pages/materiais');
    }
    $page = $editarMaterial($params[1]);
    render('admin/pages/material/editar-material','admin',['page' => $page]);

}
// ↓↓ REMOVER MATERIAL ↓↓
else if($params = resolve('/admin/pages/(\d+)/remover-material')){
    $removerMaterial($params[1]);
    return header('location: /admin/pages/materiais','admin');
}
// VISUALIZAR HISTÓRICO
else if(resolve('/admin/pages/historico')){
    render('admin/pages/material/historico','admin');
}
// VISUALIZAR LISTAGEM DE MATERIAIS
else if(resolve('/admin/pages/materiais')){
    $lista = $listarMateriais();
    render('admin/pages/material/materiais','admin',['lista' => $lista]);
}

