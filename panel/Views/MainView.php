<?php

namespace Panel\Views;

class MainView
{
    public static function renderOnly($file, $data = [])
    {
        include 'pages/' . $file . '.php';
    }

    public static function render($file, $data = [])
    {
        include 'includes/aside/header.php';
        include 'includes/header.php';
        include 'pages/' . $file . '.php';
        include 'includes/footer.php';
    }
}
