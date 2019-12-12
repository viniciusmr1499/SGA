<?php 

if(resolve('/')){
    render('site/pages/home','site');
}else if(resolve('/contato')){
    render('site/contato','site');
}else{
    echo "<h1>pagina nao encontrada</h1>";
    http_response_code(404);
}