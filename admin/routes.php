<?php 

if(resolve('/admin')){
    render('admin/home','admin');
}else if(resolve('/admin/pages')){
    render('admin/pages','admin');
}else{
    echo "<h1>pagina nao encontrada</h1>";
}