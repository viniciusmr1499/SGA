<?php 

include_once __DIR__ . '/db.php';

// ************************* PERFIL DE USUÁRIO ************************
if($params = resolve('/painel/pages/(\d+)/perfil')){
    // EDITAR PERFIL(SENHA DO USUARIO)
    if($_SESSION['nivel'] == 0){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $editarPerfil($params[1]);
    
            return header('location: /painel');
        }
        
        $page = $verUsuario($params[1]);
    
        render('painel/pages/perfil','painel',['page' => $page]);
    }else{
        header('location: /admin');
    }
}
// ************************** MATERIAIS *******************************

// ↓↓ CRIAR  MATERIAL ↓↓
if(resolve('/painel/pages/novo-material')){
    if($_SESSION['nivel'] == 0){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $criarMaterial();
            return header('location: /painel/pages/materiais');
        }
    
        render('painel/pages/material/novo-material','painel');
    }else{
        header('location: /admin');
    }
    
}
// ↓↓ VER UM MATERIAL POR VEZ ↓↓
else if($params = resolve('/painel/pages/(\d+)/ver-material')){
    if($_SESSION['nivel'] == 0){
        $page = $verMaterial($params[1]);
        render('painel/pages/material/ver-material','painel',['page' => $page]);
    }else{
        header('location: /admin');
    }
    
}
// ↓↓ EDITAR MATERIAL ↓↓
else if($params = resolve('/painel/pages/(\d+)/editar-material')){
    if($_SESSION['nivel'] == 0){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $editarMaterial($params[1]);
            return header('location: /painel/pages/materiais');
        }
        
        $page = $verMaterial($params[1]);
        render('painel/pages/material/editar-material','painel',['page' => $page]);
    }else{
        header('location: /admin');
    }
}
// ↓↓ REMOVER MATERIAL ↓↓
else if($params = resolve('/painel/pages/(\d+)/remover-material')){
    if($_SESSION['nivel'] == 0){
        $removerMaterial($params[1]);
        return header('location: /painel/pages/materiais','painel');
    }else{
        header('location: /admin');
    }
}
// VISUALIZAR HISTÓRICO
else if(resolve('/painel/pages/historico')){
    if($_SESSION['nivel'] == 0){
        $itens = $historico();
        render('painel/pages/material/historico','painel',['itens' => $itens]);
    }else{
        header('location: /admin');
    }
}
// VISUALIZAR LISTAGEM DE MATERIAIS
else if(resolve('/painel/pages/materiais')){
    if($_SESSION['nivel'] == 0){
        $lista = $listarMateriais();
        render('painel/pages/material/materiais','painel',['lista' => $lista]);
    }else{
        header('location: /admin');
    }
}
else if(resolve('/painel/pages/logistica-material')){
    if($_SESSION['nivel'] == 0){
        $lista = $listarMateriais();
        render('painel/pages/material/logistica-material','painel',['lista' => $lista]);
    }else{
        header('location: /admin');
    }
}