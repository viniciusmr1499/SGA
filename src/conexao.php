<?php 

// if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
//     echo 'We don\'t have mysqli!!!';
// } else {
//     echo 'Phew we have it!';
// }

mysqli_report(MYSQLI_REPORT_ERROR);
$conn = new mysqli(HOST,USUARIO,SENHA,DB);
