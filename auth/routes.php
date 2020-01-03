<?php

require __DIR__ . '/db.php';

if (resolve('/auth/login')) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if($login()){
            if ($_SESSION['nivel'] == 1) {
                flash('Autenticado com sucesso', 'success');
                
                return header('location: /admin');

            }else if($_SESSION['nivel'] == 0){
                flash('Autenticado com sucesso', 'success');

                return header('location: /painel');
            }
        }
    }
    render('auth/login', 'login');
    
}

// ROTAS
else if(resolve('/auth/logout')){
    
    render('/auth/logout','login');

}else{
    http_response_code(404);
    echo "<h1>pagina nao encontrada</h1>";
}