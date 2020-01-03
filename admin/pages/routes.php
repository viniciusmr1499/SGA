<?php 

include_once __DIR__ . '/db.php';

// ************************** MATERIAIS *******************************

// ↓↓ CRIAR  MATERIAL ↓↓
if(resolve('/admin/pages/novo-material')){
    
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
    
    $page = $verMaterial($params[1]);
    render('admin/pages/material/editar-material','admin',['page' => $page]);
}
// ↓↓ REMOVER MATERIAL ↓↓
else if($params = resolve('/admin/pages/(\d+)/remover-material')){
    $removerMaterial($params[1]);
    return header('location: /admin/pages/materiais','admin');
}
// VISUALIZAR HISTÓRICO
else if(resolve('/admin/pages/historico')){
    $itens = $historico();
    render('admin/pages/material/historico','admin',['itens' => $itens]);
}
// VISUALIZAR LISTAGEM DE MATERIAIS
else if(resolve('/admin/pages/materiais')){
    $lista = $listarMateriais();
    render('admin/pages/material/materiais','admin',['lista' => $lista]);
}