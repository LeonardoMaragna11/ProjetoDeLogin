<?php
    require("servidor.php");
    session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="adm/css/estilo.css">
    <title>Document</title>
</head>

<body id="root">
    <div class="container mt-5" id="conteudo">
        <table class="table table-bordered">
            <tr id='tbl'>
                <?php
                    $numero_lista=1;
                    $sql = "SELECT * FROM tb_livro";
                    $stm = $banco->prepare($sql);
                    $stm->execute();
                    while ($campo = $stm->fetch(PDO::FETCH_ASSOC)) {
                        echo "<td>";
                        echo "<a href='#'><img style='width: 200px; height: 300px; ' src='adm/img/" . $campo["img_liv"] . "'></a>";
                        echo "<h3>" . $campo["titulo_liv"]. "</h3>";
                        if(isset($_SESSION['usuario'])){
                            echo("<a  href='adm/altLivro.php?cod_liv=". $campo["cod_liv"]."'>Editar</a>");
                        }else{
                            echo("<a href='#'>Comprar</a>");
                        }
                        echo "</td>";
                       
                    }
                ?>
            </tr>
        </table>

    </div>
    <script src="../js/jquery-3.5.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
</body>
</html>
