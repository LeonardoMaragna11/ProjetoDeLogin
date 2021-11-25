<?php
session_start();
include_once ("../servidor.php");
$tituto   = $_POST["titulo"]; 
$desc     = $_POST["desc"];
$valor    = $_POST["valor"];
$cod_ed   = $_POST["ed"];
$imagem   =$_FILES["arq"];
$diretorio = "img/" . $imagem ["name"]; 
$sqlInsert = "insert into tb_livro(cod_ed, titulo_liv, desc_liv, img_liv, valor_liv)"; 
$sqlInsert .= " values($cod_ed, '$tituto', '$desc', '$diretorio' ,'$valor')"; 
$res =  mysqli_query($link, $sqlInsert);
if (mysqli_affected_rows($link)){
    echo "Cadastrado Livro";
    move_uploaded_file ( $imagem["tmp_name"] , $diretorio );
    $cod_liv =  mysqli_insert_id($link);
    $sqlCadlivro = "insert into tb_cad_livro values(". $_SESSION["login"]["id"]."," .$cod_liv.")";
    mysqli_query($link, $sqlCadlivro);
}
else{
    echo mysqli_error($link);
}
mysqli_close($link);
?>