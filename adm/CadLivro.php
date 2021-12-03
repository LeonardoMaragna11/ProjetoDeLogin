<?php
session_start();
include_once ("../servidor.php");

$cod_ed   = $_POST["ed"];
$tituto   = $_POST["titulo"]; 
$desc     = $_POST["desc"];
$imagem   = $_FILES["arq"];
$valor    = $_POST["valor"];
$diretorio = "img/".$imagem ["name"]; 


$sql = "insert into tb_livro(cod_ed, titulo_liv, desc_liv, img_liv, valor_liv)"; 
$sql.= " values(?, ?, ?, ? ,?)";

$stm = $banco->prepare($sql);
$stm->bindValue(1, $_POST["ed"]);
$stm->bindValue(2, $tituto);
$stm->bindValue(3, $desc);
$stm->bindValue(4, $imagem["name"]);
$stm->bindValue(5, $valor);

if( $stm->execute()){

  echo "Cadastrado Livro";
  $diretorio = "img/".$imagem["name"];
  move_uploaded_file ( $imagem["tmp_name"] , $diretorio );
  $id_livro =  $banco->lastInsertId();
  $sql = "insert into tb_cad_livro values(?,?)";
  $stm = $banco->prepare($sql);
  $stm->bindValue(1, $_SESSION['usuario']['id']);
  $stm->bindValue(2, $id_livro);
  $stm->execute();

}

?>