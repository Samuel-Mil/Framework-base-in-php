<?php

namespace Src\Utils;

use Src\MySql;

class MySqlUtils
{
	public static function selectAll($tableName,$parm,$value){
		$pdo = Mysql::connect();
		
		if($parm){
			$sql = $pdo->prepare("SELECT * FROM `$tableName` WHERE `$parm` = ?");
			$sql = $pdo->execute(array($value));
		}else{
			$sql = $pdo->prepare("SELECT * FROM `$tableName` WHERE `$parm` = ?");
			$sql = $pdo->execute(array($value));
		}

		return $sql;
	}

	public static function select($colunm,$tableName,$parm,$value){
		$pdo = Mysql::connect();
		
		if($parm){
			$sql = $pdo->prepare("SELECT `$colunm` FROM `$tableName` WHERE `$parm` = ?");
			$sql = $pdo->execute(array($value));
		}else{
			$sql = $pdo->prepare("SELECT `$colunm` FROM `$tableName` WHERE `$parm` = ?");
			$sql = $pdo->execute(array($value));
		}

		return $sql;
	}

	public static function update($arr,$single = false){
        $pdo = Mysql::connect();

		$ok = true;
        $first = false;
        $tableName = $arr['tableName'];
        $query = "UPDATE `$tableName` SET ";
        foreach($arr as $key => $value){
            $nome = $key;
            $valor = $value;
            if($nome === 'acao' || $nome === 'tableName' || $nome === 'id')
                continue;
            if($value === ''){
                $ok == false;
                break;
            }
            if($first == false){
                $first = true;
                $query.="$nome=?";
            }else{
                $query.=",$nome=?";
            }

            $parametros[] = $value;
        }

        if($ok == true){
            if($single == false){
                $parametros[] = $arr['id'];
                $sql = $pdo->prepare($query.' WHERE id=?');
                $sql->execute($parametros);
            }else{
                $sql = $pdo->prepare($query);
                $sql->execute($parametros);
            }
        }
        return $ok;
	}
}