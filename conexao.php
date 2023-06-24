<?php
require_once("config.php");
date_default_timezone_set('America/Sao_Paulo');

try{
    $pdo = new PDO("mysql:dbname=$db; host=$servidor; charset=utf8",
    "root","1234");

    //conexao mysql para bacap

    $conn = mysqli_connect($servidor,$usuario,$senha,$bd);
}catch(Exception $e){
    echo "Erro ao conectar com o banco de dados...". $e;

}



?>