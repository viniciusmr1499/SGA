<?php 

$login = function () use ($conn) {
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $senha = mysqli_real_escape_string($conn,$_POST['senha']);

    if(empty($_POST['email']) || empty($_POST['senha'])){
        flash('Preencha todos os campos!', 'warning');
        
        return false;
    }

    $sql = "SELECT * FROM usuarios WHERE email  = '{$email}' AND senha = md5('{$senha}')";
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
        $_SESSION['usuario'] = $email;
        $_SESSION['nome'] = $nome;
        $_SESSION['nomeCompleto'] = $nomeCompleto;
        $_SESSION['nivel'] = $nivel;
        $_SESSION['id_usuario'] = $id;
        $_SESSION['avatar'] = $avatar;

        return true;
    }else{
        flash('Dados inválidos', 'error');
        return false;
    }
    
};