<?php 
include __DIR__ . '/db.php';
// ************************* PERFIL DE USUÁRIO ************************

// ↓↓ EDITAR USUARIO ↓↓
if($params = resolve('/painel/user/(\d+)/perfil')){
    if($_SESSION['nivel'] == 0){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $editarPerfil($params[1]);
    
            return header('location: /painel');
        }
        
        $page = $verUsuario($params[1]);
    
        render('painel/user/perfil','painel',['page' => $page]);
    }else{
        header('location: /admin');
    }
}
// REDEFINIÇÃO DE SENHA
else if($params = resolve('/painel/user/(\d+)/redefinir-senha')){
    if($_SESSION['nivel'] == 0){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $redefinirSenha($params);
        }
        
        return header('location: /painel');
    }else{
        header('location: /admin');
    }
}
