<?php 

include_once __DIR__ . '/db.php';

// //ACESSO A TODAS AS PÁGINAS
// if(resolve('/admin/pages')){
//     $pages = $pages_all();
//     render('admin/pages/usuarios','admin',['pages' => $pages]);
// }

// // CRIAR USUARIO
// else if(resolve('/admin/pages/(\d)+/usuarios')){
//     //VALIDANDO SE O FORM É POST
//     if($_SERVER["REQUEST_METHOD"] === 'POST'){
//         $create();
//         header('Location: /admin/pages');
//     }
//     render('admin/pages/novo-usuario','admin');

// }
// // CRIANDO MATERIAL
// else if(resolve('/admin/pages/(\d)+/materiais')){
//     if($_SERVER["REQUEST_METHOD"] === 'POST'){
//         $createMaterial();
//         header('Location: /admin/pages');
//     }
//     render('admin/pages/novo-material','admin');
// }

// // VISUALIZANDO UM USUARIO
// else if($params = resolve('/admin/pages/(\d)+/usuarios')){
//     var_dump($params); exit;
//     $page = $viewUser($params[1]);
//     render('admin/pages/ver-perfil','admin',['page' => $page]);
// }

// // VISUALIZANDO UM MATERIAL
// else if(resolve('/admin/pages/(\d)+/materiais')){
//     $page = $viewMaterial($params[1]);
//     render('admin/pages/one-material',['page' => $page]);
// }

// // EDITANDO UM USUARIO
// else if(resolve('/admin/pages/(\d)+/editar-usuario')){
//     if($_SERVER["REQUEST_METHOD"] === 'POST'){
//         $editUser($params[1]);
//         header('Location: /admin/pages');
//     }
//     render('admin/pages/usuarios','admin');
// }

// // EDITANDO UM MATERIAL
// else if(resolve('/admin/pages/(\d)+/editar-material')){
//     if($_SERVER["REQUEST_METHOD"] === 'POST'){
//         $editMaterial($params[1]);
//         header('Location: /admin/pages');
//     }
//     render('admin/pages/materiais','admin');
// }





// URL AMIGÁVEL
//ACESSO A TODAS AS PÁGINAS DO SISTEMA
// if(resolve('/admin/pages')){
    // $pages = $pages_all();
    // render('admin/pages','admin',['pages' => $pages]);
// }

// *** USUÁRIOS *** 
// LISTAGEM DE USUARIOS
if(resolve('/admin/pages/usuarios')){
    render('admin/pages/user/usuarios','admin');
}

// ↓↓ CRIAR  USUARIO ↓↓
else if(resolve('/admin/pages/novo-usuario')){
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $criarUsuario();
        return header('location: /admin/pages/usuarios');
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
        return header('location: /admin/pages/usuarios');
    }
    render('admin/pages/user/editar-usuario','admin');
}
// REMOVER USUARIO
else if($params = resolve('/admin/pages/(\d+)/remover-usuario')){
    $removerUsuario($params[1]);
    return header('location: /admin/pages/usuarios');
}


// *** MATERIAIS ***

// ↓↓ CRIAR  MATERIAL ↓↓
else if(resolve('/admin/pages/novo-material')){
    
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $criarMaterial();
        return header('location: /admin/pages/materiais');
    }

    render('admin/pages/material/novo-material','admin');
}
// ↓↓ VER MATERIAL ↓↓
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
    render('admin/pages/material/editar-material','admin');

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
    render('admin/pages/material/materiais','admin');

}

