<?php 


$login = function()use($conn){
    $email = filter_input(INPUT_POST,'email');
    $senha = filter_input(INPUT_POST,'senha');

    if(empty($email) or empty($senha)){
        return false;
    }

    $sql = 'SELECT FROM usuarios WHERE email = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s',$email);

    $stmt->execute();
    $result = $stmt-get_result();

    $user = $result->fetch_assoc();

    if(!$user){
        return false;
    }

    if(password_verify($senha,$user['email'])){
        unset($user['senha']);
        $_SESSION['auth'] = $user;

        return true;
    }

    return false;
};