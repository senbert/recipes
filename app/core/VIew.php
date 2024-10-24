<?php
namespace App\Core;

class View
{

    public static function render($layout, $data)
{
    $loader = new \Twig\Loader\FilesystemLoader('app/views');
    $twig = new \Twig\Environment($loader);
    $layoutPath  = 'layouts/' . $layout . '.php';
    // dd($layoutPath);
    echo $twig->render($layoutPath, $data);


}




}

