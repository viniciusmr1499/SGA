<?php

require __DIR__ . '/db.php';

if (resolve('/auth/login')) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($login()) {
            flash('Autenticado com sucesso', 'success');
            return header('location: /admin');
        }
        flash('Dados inválidos', 'error');
        
    }
    
    render('auth/login', 'login');
}

// ROTAS
if(resolve('/auth/login')){
    render('/auth/login','login');

}else if(resolve('/auth/logout')){
    
    render('/auth/logout','login');

}else{
    http_response_code(404);
    echo "<h1>pagina nao encontrada</h1>";
}