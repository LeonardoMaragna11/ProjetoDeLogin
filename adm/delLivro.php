<!DOCTYPE html>
<?php
    require('../servidor.php');
    session_start();
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
</head>

<body>
    <div class="container">
   <?php
    $sql = "DELETE FROM tb_livro WHERE cod_liv = ?";
    $stmt = $banco->prepare($sql);
    $stmt->bindValue(1, $_GET['cod_liv']);
    if($stmt->execute()){
        echo "deletado com sucesso";
         }
   ?>
    </div>
</body>
<script src="../js/jquery-3.5.1.slim.min.js"></script>
<script src="../js/popper.min.js"></script>
</html>