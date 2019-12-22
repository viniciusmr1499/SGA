<?php 

$pages_all = function(){
    // buscar todas as paginas
};

// *** FUNCÇÕES ANÔNIMAS PARA OS USUARIOS ***

$criarUsuario = function(){
    flash('Usuário foi criado com sucesso!', 'success');
};

$editarUsuario = function($id){
    flash('Usuário foi atualizado com sucesso!', 'success');
};

$removerUsuario = function($id){
    flash('Usuário foi removido com sucesso!', 'success');
};

$verUsuario = function($id){
    
};

// *** FUNCÇÕES ANÔNIMAS PARA OS MATERIAIS ***
$criarMaterial = function(){
    flash('Material foi inserido com sucesso!', 'success');
};

$editarMaterial = function($id){
    flash('Material foi atualizado com sucesso!', 'success');
};

$removerMaterial = function($id){
    flash('Material foi excluído com sucesso!', 'success');
};

$verMaterial = function($id){
    
};