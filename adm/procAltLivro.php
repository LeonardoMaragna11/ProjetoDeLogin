<?php

session_start();
require_once('../servidor.php');


if(isset($_SESSION['usuario'])){
    $cod_livro = $_POST['cod_liv'];
    $titulo = $_POST['titulo'];
    $desc = $_POST['desc'];
    $ed = $_POST['ed'];
    $valor = $_POST['valor'];

    $sql = "UPDATE tb_livro SET titulo_liv = ?,desc_liv = ?, cod_ed = ?,valor_liv = ? WHERE cod_liv = ?";

    $stm = $banco->prepare($sql);
    $stm->bindValue(1, $titulo);
    $stm->bindValue(2, $desc);
    $stm->bindValue(3, $ed);
    $stm->bindValue(4, $valor);
    $stm->bindValue(5, $cod_livro);

    if( $stm->execute()){
        header('Location: lista_livro.php');
    }
}
else{
    header("Location: index.php");
}
?>