<?php 
// DOCUMENTO ROOT - ARQUIVO CENTRAL DA APLICAÇÃO.

session_start();

// require __DIR__ . '/src/error_handler.php';  
require __DIR__ . '/src/config.php';
require __DIR__ . '/src/resolve-route.php';
require __DIR__ . '/src/render.php';
require __DIR__ . '/src/conexao.php';
require __DIR__ . '/src/flash.php';


if(resolve('/admin/?(.*)')){
    
    if(!$_SESSION['usuario']){
        header('location: auth/login');
        exit;
    }
    require __DIR__ . '/admin/routes.php';

}else if(resolve('/painel/?(.*)')){
    if(!$_SESSION['usuario']){
        header('location: auth/login');
        exit;
    }
    require_once __DIR__ . '/painel/routes.php';
}else if(resolve('/auth/?(.*)')){
    require_once __DIR__ . '/auth/routes.php';
}

