<?php
session_start();
require('../servidor.php');

//https://www.php.net/manual/pt_BR/pdo.exec.php
//PDO::exec — Executa uma instrução SQL e retornar o número de linhas afetadas
try {
    $login = $_POST['login'];
    $senha = md5($_POST['senha']);

    $sql = "select * from tb_usuario where login_us = ? and senha_us = ? ";
    $stmt = $banco->prepare($sql);
    $stmt->bindValue(1, $login);
    $stmt->bindValue(2, $senha);
    
    $stmt->execute();

    if ($campo = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $_SESSION['usuario']['id'] = $campo["cod_us"];
        $_SESSION['usuario']['nome'] = $campo["nome_us"];
        header('Location:menu.php');
    } 
    else {
        $_SESSION['erro']="<div class='erro'><p class='msg_erro'>Usuario ou senha inválido</p></div>";
        header('Location: index.php');
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
