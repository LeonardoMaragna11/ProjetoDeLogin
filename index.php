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

    <title>Document</title>
</head>

<body>
    <Header>
        <div id="logo">
            <img src="" alt="">
        </div>
        <div id="login">
            <a href="adm/menu.php"><button>Login</button></a>
        </div>
    </Header>
    <div class="container mt-5">
        <table class="table table-bordered">
            <tr>
                <?php
                    $sql = "select * from tb_livro";
                    $stm = $banco->prepare($sql);
                    $stm->execute();
                    while ($campo = $stm->fetch(PDO::FETCH_ASSOC)) {
                        echo "<td>";
                        echo "<img src='adm/img/" . $campo["img_liv"] . "' width='' height=''>";
                        echo "<h3>" . $campo["titulo_liv"]. "</h3>";
                        echo "<a href='detalhe.php?cod_liv=" . $campo['cod_liv'] ."'> Detalhe</a>";
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