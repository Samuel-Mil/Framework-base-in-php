<?php

namespace Src;

class Application
{
    private $controller;

    private function setApp()
    {
        $url = explode("/", @$_GET['url']);

        if ($url[0] !== 'painel') {
            $fileName = "Src\Controllers\\";
            if ($url[0] == '') {
                $fileName .= 'Home';
            } else {
                $fileName .= ucfirst(strtolower($url[0]));
            }
        } else {
            $fileName = "Panel\Controllers\\";
            if (!isset($_SESSION['login'])) {
                $fileName .= 'Login';
            } else {
                if ($url[1] == '') {
                    $fileName .= 'Home';
                }

                $fileName .= ucfirst(strtolower($url[1]));
            }
        }

        $fileName .= 'Controller';

        if (file_exists($fileName . '.php')) {
            $this->controller = new $fileName();
        } else {
            include 'Views/pages/error404.php';
            die();
        }
    }

    public function runApp()
    {
        $this->setApp();
        $this->controller->index();
    }
}
