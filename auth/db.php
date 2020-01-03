<?php 

$login = function () use ($conn) {
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $senha = mysqli_real_escape_string($conn,$_POST['senha']);

    if(empty($_POST['email']) || empty($_POST['senha'])){
        header('location: /auth/login');
        exit();
    }

    $sql = "SELECT * FROM usuarios WHERE email  = '{$email}' AND senha = md5('{$senha}')";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_num_rows($result);

    
    if($row == 1){
        $_SESSION['usuario'] = $email;
        header('location: /admin');
        exit;
    }else{
        header('location: /auth/login');
        exit;
    }
};