<?php 

$login = function () use ($conn) {
    $user = $_SESSION['user'];
    
    $sql = "SELECT * FROM usuarios WHERE usuario  = '$user'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_num_rows($result);
    
    $r = $result->fetch_assoc();
    $nomeCompleto = $r['nome'];
    $nivel = $r['nivel'];
    $id = $r['id_usuario'];
    $avatar = $r['nome_img'];
   
    if($row == 1){
        $nome = explode(" ",$nomeCompleto);
        $nome = $nome[0] . ' ' . $nome[1];
        $_SESSION['nome'] = $nome;
        $_SESSION['userAutorizado'] = $user;
        $_SESSION['nomeCompleto'] = $nomeCompleto;
        $_SESSION['nivel'] = $nivel;
        $_SESSION['id_usuario'] = $id;
        $_SESSION['avatar'] = $avatar;
        // var_dump($_SESSION['nome']);exit;
        return true;
    }else{
        flash('Você não possui cadastrado, favor consultar o administrador do sistema', 'error');
        return false;
    }
    
};