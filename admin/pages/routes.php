<?php 

include_once __DIR__ . '/db.php';


if(resolve('/admin/pages')){
    $pages = $pages_all();
    render('admin/pages/usuarios','admin',['pages' => $pages]);

}

else if(resolve('/admin/pages/(\d)+/usuarios')){
    render('admin/pages/novo-usuario','admin');
    if($_SERVER["REQUEST_METHOD"] === 'POST'){
        $pages = $pages_create();
        header('Location: /admin/pages');
    }

}

else if(resolve('/admin/pages/(\d)+/editar-usuario')){
    if($_SERVER["REQUEST_METHOD"] === 'POST'){
        $pages = $pages_edit();
        header('Location: /admin/pages');
    }
    render('admin/pages/editar-usuario','admin',['page' => $pages]);
}

else if(resolve('/admin/pages/(\d)+/delete-usuario')){
    if($_SERVER["REQUEST_METHOD"] === 'POST'){
        $pages = $pages_delete();
        header('Location: /admin/pages');
    }
    header('Location: /admin/pages');
}

// // URL AMIGÁVEL
else if(resolve('/admin/pages/novo-usuario')){
    render('admin/pages/novo-usuario','admin');

}else if(resolve('/admin/pages/novo-material')){
    render('admin/pages/novo-material','admin');

}else if(resolve('/admin/pages/materiais')){
    render('admin/pages/materiais','admin');

}else if(resolve('/admin/pages/novo-ativo')){
    render('admin/pages/materiais','admin');

}else if(resolve('/admin/pages/historico')){
    render('admin/pages/historico','admin');

}else if(resolve('/admin/pages/perfil')){
    render('admin/pages/perfil','admin');

}