<?php 

include_once __DIR__ . '/db.php';


// ************************** MATERIAIS *******************************

// ↓↓ CRIAR  MATERIAL ↓↓
if(resolve('/painel/pages/novo-material')){
    
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $criarMaterial();
        return header('location: /painel/pages/materiais');
    }

    render('painel/pages/material/novo-material','painel');
}

// ↓↓ VER UM MATERIAL POR VEZ ↓↓
else if($params = resolve('/painel/pages/(\d+)/ver-material')){
    $page = $verMaterial($params[1]);
    render('painel/pages/material/ver-material','painel',['page' => $page]);
    
}
// ↓↓ EDITAR MATERIAL ↓↓
else if($params = resolve('/painel/pages/(\d+)/editar-material')){
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $editarMaterial($params[1]);
        return header('location: /painel/pages/materiais');
    }
    
    $page = $verMaterial($params[1]);
    render('painel/pages/material/editar-material','painel',['page' => $page]);
}
// ↓↓ REMOVER MATERIAL ↓↓
else if($params = resolve('/painel/pages/(\d+)/remover-material')){
    $removerMaterial($params[1]);
    return header('location: /painel/pages/materiais','painel');
}
// VISUALIZAR HISTÓRICO
else if(resolve('/painel/pages/historico')){
    $itens = $historico();
    render('painel/pages/material/historico','painel',['itens' => $itens]);
}
// VISUALIZAR LISTAGEM DE MATERIAIS
else if(resolve('/painel/pages/materiais')){
    $lista = $listarMateriais();
    render('painel/pages/material/materiais','painel',['lista' => $lista]);
}