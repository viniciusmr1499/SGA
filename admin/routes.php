<?php 

 if(resolve('/admin')){
    render('/admin/home','admin');

}else if(resolve('/admin/usuarios')){
    render('admin/pages/usuarios','admin');

}else if(resolve('/admin/novo-usuario')){
    render('admin/pages/novo-usuario','admin');

}else if(resolve('/admin/novo-material')){
    render('admin/pages/novo-material','admin');

}else if(resolve('/admin/materiais')){
    render('admin/pages/materiais','admin');

}else if(resolve('/admin/novo-ativo')){
    render('admin/pages/materiais','admin');

}else{
    http_response_code(404);
    echo "<h1>pagina nao encontrada</h1>";
}