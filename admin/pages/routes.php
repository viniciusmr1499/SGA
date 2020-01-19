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
        $lista = $listarMedidas();
        render('admin/pages/material/novo-material','admin',['lista' => $lista]);
    }else{
        header('location: /painel');
    }

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
        $lista = $listarMedidas();
        render('admin/pages/material/editar-material','admin',['page' => $page],['lista' => $lista]);
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
// LOGISTICA DE MATERIAL
else if(resolve('/admin/pages/deliberar-material')){
    if($_SESSION['nivel'] == 1){
        $lista = $listarDespacho();
        render('admin/pages/material/deliberar-material','admin',['lista' => $lista]);
    }else{
        header('location: /painel');
    }
}else if(resolve('/admin/pages/despacho')){
    if($_SESSION['nivel'] == 1){
        $inserirDadosDespacho();
        $despacho();
        
        header('location: /admin/pages/deliberar-material');
    }else{
        header('location: /painel');
    }
}else if(resolve('/admin/pages/renovar-estoque')){
    if($_SESSION['nivel'] == 1){
        $lista = $reporEstoque();
        header('location: /admin/pages/materiais');
    }else{
        header('location: /painel');
    }

}
// GERAR RELATÓRIO DO HISTÓRICO
else if(resolve('/admin/pages/gerar-relatorio')){
    if($_SESSION['nivel'] == 1){
        $gerarRelatorioHistorico();
    }else{
        header('location: /painel');
    }
}
// GERAR RELATÓRIO DO FLUXO DE DESPACHO
else if(resolve('/admin/pages/gerar-relatorio-deliberacao')){
    if($_SESSION['nivel'] == 1){
        $gerarRelatorioDespacho();
    }else{
        header('location: /painel');
    }
}
// BUSCAR O EQUIPAMENTO AUTOMATICO COM APENAS O CODIGO DO MATERIAL
else if($params = resolve('/admin/pages/(\d+)/buscar-descricao')){
    if($_SESSION['nivel'] == 1){
        $pesquisarDescricao($params[1]);
    }else{
        header('location: /painel');
    }
}