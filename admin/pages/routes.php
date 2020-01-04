<?php 

include_once __DIR__ . '/db.php';

// ************************** MATERIAIS *******************************

// ↓↓ CRIAR  MATERIAL ↓↓
if(resolve('/admin/pages/novo-material')){
    if($_SESSION['nivel'] == 1){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $criarMaterial();
            return header('location: /admin/pages/materiais');
        }
    
        render('admin/pages/material/novo-material','admin');
    }

    echo '<h1 style="color:red;">Página não encontrada</h1>';
}

// ↓↓ VER UM MATERIAL POR VEZ ↓↓
else if($params = resolve('/admin/pages/(\d+)/ver-material')){
    if($_SESSION['nivel'] == 1){
        $page = $verMaterial($params[1]);
        render('admin/pages/material/ver-material','admin',['page' => $page]);
    }else{
        header('location: /painel');
    }
    
}
// ↓↓ EDITAR MATERIAL ↓↓
else if($params = resolve('/admin/pages/(\d+)/editar-material')){
    if($_SESSION['nivel'] == 1){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $editarMaterial($params[1]);
            return header('location: /admin/pages/materiais');
        }
        
        $page = $verMaterial($params[1]);
        render('admin/pages/material/editar-material','admin',['page' => $page]);
    }else{
        header('location: /painel');
    }
}
// ↓↓ REMOVER MATERIAL ↓↓
else if($params = resolve('/admin/pages/(\d+)/remover-material')){
    if($_SESSION['nivel'] == 1){
        $removerMaterial($params[1]);
        return header('location: /admin/pages/materiais','admin');
    }else{
        header('location: /painel');
    }
}
// VISUALIZAR HISTÓRICO
else if(resolve('/admin/pages/historico')){
    if($_SESSION['nivel'] == 1){
        $itens = $historico();
        render('admin/pages/material/historico','admin',['itens' => $itens]);
    }else{
        header('location: /painel');
    }
}
// VISUALIZAR LISTAGEM DE MATERIAIS
else if(resolve('/admin/pages/materiais')){
    if($_SESSION['nivel'] == 1){
        $lista = $listarMateriais();
        render('admin/pages/material/materiais','admin',['lista' => $lista]);
    }else{
        header('location: /painel');
    }
}
else if(resolve('/admin/pages/logistica-material')){
    if($_SESSION['nivel'] == 1){
        $lista = $listarMateriais();
        render('admin/pages/material/logistica-material','admin',['lista' => $lista]);
    }else{
        header('location: /painel');
    }
}