<?php 
session_start();
 
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/estilo.css" type="text/css">
</head>
<body>
    <div class="container">
<?php   
   if (isset($_SESSION['usuario'])) {
        echo "<center><h1>Olá, " . $_SESSION["usuario"]["nome"] ."</h1></center>"; //session_id();
?>

        <nav class="nav nav-pills flex-column flex-sm-row">
            <a href="../index.php" class="flex-sm-fill text-sm-center nav-link" style="color: green;" target="link">Menu</a>
            <a class="flex-sm-fill text-sm-center nav-link" href="cadastro.php" target="link">Cadastro de livros</a>
            <a class="flex-sm-fill text-sm-center nav-link" href="lista_livro.php" target="link">Lista de Livros</a>
            <a class="flex-sm-fill text-sm-center nav-link" href="#" target="link">
            <a class="flex-sm-fill text-sm-center nav-link" href="#">Usuários</a>
            <a class="flex-sm-fill text-sm-center nav-link " href="sair.php" tabindex="-1" style="color: red ;">
               sair
            </a>
            
        </nav>

        <iframe  name="link" width="100%" height="1000px" frameborder="0" style="border: 0;">


    </div>


    </iframe>
<?php
   }else{
         header("Location: index.php");
   }
?>

</body>

<script src="../js/jquery-3.5.1.slim.min.js"></script>
<script src="../js/popper.min.js"></script>

</html>