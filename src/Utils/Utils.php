<?php

namespace Src\Utils;


class Utils
{
	public static function alertJS($message){
		echo '<script>alert("'.$message.'")</script>';
	}

	public static function redirectJS($url){
		echo '<script>window.location.href="'.INCLUDE_PATH.$url.'"</script>';
		die();
	}

	public static function isLogged(){
		if(!isset($_SESSION['login'])){
			self::redirectJS('painel/login');
		}
	}

	public static function loggout(){
		session_destroy();
		header('Location: '. INCLUDE_PATH);
	}
}