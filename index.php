<?php

session_start();

include 'config.php';
include 'vendor/autoload.php';

ob_start();
$app = new Src\Application();
$app->runApp();
ob_end_flush();
