<?php 
// DOCUMENTO ROOT - ARQUIVO CENTRAL DA APLICAÇÃO.

session_start();

require __DIR__ . '/src/error_handler.php';  
require __DIR__ . '/src/config.php';
require __DIR__ . '/src/resolve-route.php';
require __DIR__ . '/src/render.php';
require __DIR__ . '/src/conexao.php';
require __DIR__ . '/src/flash.php';


if(resolve('/admin/?(.*)')){
    require __DIR__ . '/admin/routes.php';

}else if(resolve('/(.*)')){

    require_once __DIR__ . '/site/routes.php';

}
