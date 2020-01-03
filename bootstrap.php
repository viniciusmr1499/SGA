<?php 
// NÃO VAI FUNCIONAR NO INTERNET EXPLORER
$navegador = $_SERVER['HTTP_USER_AGENT'];

if (strstr($navegador, 'Chrome') === False) {

    echo "<p style='text-align: center;color: red;font-size: 150%;'>".'O navegador utilizado não é suportado, utilize o Google Chrome!'."</p>";
    exit;

}

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
        header('location: /auth/login');
        exit;
    }
    require __DIR__ . '/admin/routes.php';

}else if(resolve('/painel/?(.*)')){
    if(!$_SESSION['usuario']){
        header('location: /auth/login');
        exit;
    }
    require_once __DIR__ . '/painel/routes.php';
}else if(resolve('/auth/?(.*)')){
    require_once __DIR__ . '/auth/routes.php';
}

