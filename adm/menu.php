<?php  session_start();?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
</head>
<?php   
    if(isset($_SESSION['usuario']) && $_SESSION['usuario']['id']=='1'){
        echo("<h1 style=' text-align: center'>Welcome Back <strong>".$_SESSION['usuario']['nome']."</strong></h1>");
        //print_r($_SESSION);   
?>
<body>
    <div class="container">
        <nav class="nav nav-pills flex-column flex-sm-row">
            <a class="flex-sm-fill text-sm-center nav-link" href="cadastro.php" target="link">Cadastro de livros</a>
            <a class="flex-sm-fill text-sm-center nav-link" href="lista_livro.php" target="link">Lista de Livros</a>
            <a class="flex-sm-fill text-sm-center nav-link" href="#" target="link">
            <a class="flex-sm-fill text-sm-center nav-link" href="#">Usuários</a>
            <a class="flex-sm-fill text-sm-center nav-link " href="sair.php" tabindex="-1" >sair</a>
        </nav>
        <iframe  name="link" width="100%" height="1000px" frameborder="0" style="border: 0;">
    </div>
    </iframe>
</body>
<?php 
    }else{
        echo("Não tem permição");
        //print_r($_SESSION);
        echo("<br><a href='index.php'>Voltar</a>");
    }
?>
<script src="../js/jquery-3.5.1.slim.min.js"></script>
<script src="../js/popper.min.js"></script>
</html>