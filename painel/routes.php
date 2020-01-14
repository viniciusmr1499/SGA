<?php 

if(resolve('/painel')){
    if($_SESSION['nivel'] == 0){
        render('/painel/home','painel');
    }else{
        header('location: /admin');
    }

}else if(resolve('/painel/pages.*')){
    include_once  __DIR__ . '/pages/routes.php';

}else if(resolve('/painel/user.*')){
    include_once  __DIR__ . '/user/routes.php';

}else{
    http_response_code(404);
    echo "<h1>pagina nao encontrada</h1>";
}