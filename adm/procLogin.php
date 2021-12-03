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
       // print_r($campo);
        $_SESSION['usuario']['id'] = $campo["cod_us"];
        $_SESSION['usuario']['nome'] = $campo["nome_us"];
        //print_r($_SESSION["usuario"]);
        header('Location:menu.php');
    } 
    else {
        echo "Não encontrado!!";
    }
} catch (PDOException $e) {

    echo $e->getMessage();
    // while($campos =  $stmt->fetch(PDO::FETCH_ASSOC)){

    //     print_r( $campos['cod_us'] . $campos['nome_us'] . "<br>");

    //  }

}
