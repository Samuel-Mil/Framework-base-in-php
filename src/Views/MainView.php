<?php

namespace Src\Views;

class MainView
{
    public static function render($file, $data = [])
    {
        include 'includes/header.php';
        include 'pages/' . $file . '.php';
        include 'includes/footer.php';
    }
}
