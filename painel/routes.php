<?php 

 if(resolve('/painel')){
    render('/painel/home','painel');

}else if(resolve('/painel/pages.*')){
    include_once  __DIR__ . '/pages/routes.php';

}else{
    http_response_code(404);
    echo "<h1>pagina nao encontrada</h1>";
}