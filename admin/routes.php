<?php 

 if(resolve('/admin')){
    render('/admin/home','admin');

}else if(resolve('/admin/pages.*')){
    include_once  __DIR__ . '/pages/routes.php';

}else if(resolve('/admin/users.*')){
    include_once  __DIR__ . '/users/routes.php';

}else if(resolve('/admin/login')){
    render('/admin/auth/login','login');
}
else{
    http_response_code(404);
    echo "<h1>pagina nao encontrada</h1>";
}