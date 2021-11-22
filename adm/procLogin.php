<?php

echo("<!DOCTYPE html><html lang='pt-br'>");
    session_start();
    require_once("../servidor.php");//Trazendo arquivo de conexão
    echo("<br>");
try {
    //code...

    echo $login = $_POST['login'];
    echo "<br>";
    echo $senha = md5($_POST['senha']);
    echo "<br>";
    $sql = "SELECT * FROM tb_usuario WHERE login_us = ? AND senha_us = ?";//String de Validação
    $res = $serv->prepare($sql);
    $res->bindValue(1, $login);
    $res->bindValue(2, $senha);
    $res->execute();
    if($campo = $res->fetch(PDO::FETCH_ASSOC)){
        //echo("Deu certo<br>");
        //print_r($campo);
        echo("<br>");
        $_SESSION['usuario']['id'] = $campo["cod_us"];
        $_SESSION['usuario']['nome'] = $campo["nome_us"];
        $_SESSION['usuario']['login'] = $campo['login_us'];
        
        header("Location: menu.php");
    }else{
        header("Location: index.php");
        echo("erro");
    }
    echo("<br>");
} catch (PDOException $e) {
    echo($e->get_Message);
}   
?>