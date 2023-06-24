<?php

require_once("./conexao.php");

date_default_timezone_set('America/Sao_Paulo');




$data = date("Y/m/d");
$nome = $_POST['nome'];
$email = $_POST['email'];
$assunto = $_POST['assunto'];
$msg = $_POST['msg'];


if($nome ==""){
    echo'Preencha o nome...';
    exit();
}

if($email ==""){
    echo'Preencha o Email...';
    exit();
}
if($assunto ==""){
    echo'Preencha o assunto...';
    exit();

}
if($msg ==""){
    echo'Preencha o mgs...';
    exit();
}

else{

$res = $pdo->prepare("INSERT INTO tab_contatos
(nome, email,assunto, msg, data)
VALUES (:nome, :email, :assusnto, :msg, :data)");
$res->bindValue(":nome",$nome);
$res->bindValue(":email",$email);
$res->bindValue(":assusto",$assunto);
$res->bindValue(":msg",$msg);
$res->bindValue(":data",$data);
$res->execute();


echo"Cadastro com sucesso";
}

?>