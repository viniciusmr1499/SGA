<?php 

function render($content, $template, array $data = [], array $data2 = []){
    $content = __DIR__ . '/../templates/' . $content . '.tpl.php';

    return include __DIR__ . '/../templates/' . $template . '.tpl.php';
}
