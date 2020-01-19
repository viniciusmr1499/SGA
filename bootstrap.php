<?php 
session_start();

$headers = apache_request_headers();
if (!isset($headers['Authorization'])){
  header('HTTP/1.1 401 Unauthorized');
  header('WWW-Authenticate: NTLM');
  exit;
}
$auth = $headers['Authorization'];
if (substr($auth,0,5) == 'NTLM ') {
  $msg = base64_decode(substr($auth, 5));
  if (substr($msg, 0, 8) != "NTLMSSP\x00")
    die('error header not recognised');
  if ($msg[8] == "\x01") {
    $msg2 = "NTLMSSP\x00\x02\x00\x00\x00".
        "\x00\x00\x00\x00". // target name len/alloc
      "\x00\x00\x00\x00". // target name offset
      "\x01\x02\x81\x00". // flags
      "\x00\x00\x00\x00\x00\x00\x00\x00". // challenge
      "\x00\x00\x00\x00\x00\x00\x00\x00". // context
      "\x00\x00\x00\x00\x00\x00\x00\x00"; // target info len/alloc/offset
      header('HTTP/1.1 401 Unauthorized');
      header('WWW-Authenticate: NTLM '.trim(base64_encode($msg2)));
      exit;
    }
    else if ($msg[8] == "\x03") {
      function get_msg_str($msg, $start, $unicode = true) {
        $len = (ord($msg[$start+1]) * 256) + ord($msg[$start]);
        $off = (ord($msg[$start+5]) * 256) + ord($msg[$start+4]);
        if ($unicode)
          return str_replace("\0", '', substr($msg, $off, $len));
        else
          return substr($msg, $off, $len);
      }

      if(!isset($_SESSION['user'])){
        $user = get_msg_str($msg, 36);
        $domain = get_msg_str($msg, 28);
        $workstation = get_msg_str($msg, 44);
        $_SESSION['user'] = strtoupper($user);
        
        $domain = strtoupper($domain);
        $workstation = strtoupper($workstation);
        
        // print "You are $user from $domain/$workstation";

        //$userHome = explode(".",$_SESSION['user']);
        //$_SESSION['userHome'] = $userHome[0] . ' ' . $userHome[1];
      }
      
    }
  }

// NÃO VAI FUNCIONAR NO INTERNET EXPLORER
$navegador = $_SERVER['HTTP_USER_AGENT'];

if (strstr($navegador, 'Chrome') === False) {

    echo "<p style='text-align: center;color: red;font-size: 150%;'>".'O navegador utilizado não é suportado, utilize o Google Chrome!'."</p>";
    exit;

}

// DOCUMENTO ROOT - ARQUIVO CENTRAL DA APLICAÇÃO.



// require __DIR__ . '/src/error_handler.php';  
require __DIR__ . '/src/config.php';
require __DIR__ . '/src/resolve-route.php';
require __DIR__ . '/src/render.php';
require __DIR__ . '/src/conexao.php';
require __DIR__ . '/src/flash.php';


if(resolve('/admin/?(.*)')){
    if(!$_SESSION['userAutorizado']){
        header('location: /auth/login');
        exit;
    }
    require __DIR__ . '/admin/routes.php';

}else if(resolve('/painel/?(.*)')){
    if(!$_SESSION['userAutorizado']){
        header('location: /auth/login');
        exit;
    }
    require_once __DIR__ . '/painel/routes.php';
}else if(resolve('/auth/?(.*)')){
    require_once __DIR__ . '/auth/routes.php';
}

