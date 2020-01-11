<?php 

include_once __DIR__ . '/db.php';

// ↓↓ CRIAR  MATERIAL ↓↓
if(resolve('/painel/pages/novo-material')){
    if($_SESSION['nivel'] == 0){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $criarMaterial();
        
            return header('location: /painel/pages/materiais');
        }

        render('painel/pages/novo-material','painel');
    }else{
        header('location: /admin');
    }
}

// ↓↓ VER UM MATERIAL POR VEZ ↓↓
else if($params = resolve('/painel/pages/(\d+)/ver-material')){
    if($_SESSION['nivel'] == 0){
        $page = $verMaterial($params[1]);
        render('painel/pages/ver-material','painel',['page' => $page]);
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

        render('painel/pages/editar-material','painel',['page' => $page]);
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
        render('painel/pages/historico','painel',['itens' => $itens]);
        // render('painel/pages/material/historico','painel',['itens' => $itens]);
    }else{
        header('location: /admin');
    }
}
// VISUALIZAR LISTAGEM DE MATERIAIS
else if(resolve('/painel/pages/materiais')){
    if($_SESSION['nivel'] == 0){
        $lista = $listarMateriais();
        
        render('painel/pages/materiais','painel',['lista' => $lista]);
    }else{
        header('location: /admin');
    }
}
// *** LOGISTICA DE MATERIAL ***
// LISTAR FLUXO
else if(resolve('/painel/pages/deliberar-material')){
    if($_SESSION['nivel'] == 0){
        $lista = $listarDespacho();

        render('painel/pages/deliberar-material','painel',['lista' => $lista]);
    }else{
        header('location: /admin');
    }
}
// ANEXAR REGISTRO DE OPERÁRIO QUE PEGOU MATERIAL
else if(resolve('/painel/pages/despacho')){
    if($_SESSION['nivel'] == 0){
        $inserirDadosDespacho();
        $despacho();
        
        header('location: /painel/pages/deliberar-material');
    }else{
        header('location: /admin');
    }
}
// RENOVAÇÃO DE MATERIAL NO ESTOQUE
else if(resolve('/painel/pages/renovar-estoque')){
    if($_SESSION['nivel'] == 0){
        $lista = $reporEstoque();
        
        header('location: /painel/pages/materiais');
        
    }else{
        header('location: /admin');
    }

}