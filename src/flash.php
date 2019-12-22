<?php

function flash($message = null, $type = null){
    if($message){
        // guardo a mensagem
        // MÉTODO COMPACT GERA UM ARRAY SEM  PRECISAR DECLARAR(ESPECIFICAR)
        // EX DE UM ARRAY -> array[
        //    'msg' => $msg,
        //    'type' => $type
        // ];
        // COM O 'COMPACT' NÃO PRECISA FAZER ESSA DECLARAÇÃO
        $_SESSION['flash'][] = compact('message','type');
    }else{
        //exibir a mensagem (renderizar)
        $flash = $_SESSION['flash'] ?? [];
        if(!count($flash)){
            return;
        }

        foreach($flash as $key => $message){
            render('flash','ajax',$message);
            unset($_SESSION['flash'][$key]);
        }
    }
}   

