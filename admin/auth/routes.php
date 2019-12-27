<?php
require __DIR__ . '/db.php';
if(resolve('/admin/auth/login')){ 
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if($login()){
            flash('Autenticado com sucesso!','success');
            return header('location: /admin');
        }
    }

    render('admin/auth/login','admin/login');
}