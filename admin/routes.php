<?php 

if(resolve('/admin')){
    if($_SESSION['nivel'] == 1){
        // pendente para fazer.
        render('/admin/home','admin');
    }else{
        header('location: /painel');
    }
    

}else if(resolve('/admin/pages.*')){
    include_once  __DIR__ . '/pages/routes.php';

}else if(resolve('/admin/users.*')){
    include_once  __DIR__ . '/users/routes.php';

}
else if(resolve('/login')){
    render('/auth/login','login');
}
else{
    http_response_code(404);
    echo "<h1>pagina nao encontrada</h1>";
}