<?php 
    session_start(); 
    require('../servidor.php');
    if(isset($_SESSION['usuario'])){

    
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
        <section class="col-md-2">

        </section>
        <section class="col-md-8">
            <h3 class="mt-5">Lista de Livros</h3>

            <table class="table table-bordered" id="tabela_lista_livro">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Valor</th>
                        <th scope="col">id</th>
                        <th scope="col">Editar / DELETAR</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $numero_lista = 1;  
                        $sql = "SELECT cod_liv, titulo_liv, valor_liv FROM tb_livro";
                        $stmt = $banco->prepare($sql);
                        $stmt->execute();
                        while($campo = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $valor = number_format($campo["valor_liv"],2,',','.');
                            echo "<tr>";
                            echo "<td>";
                            echo $numero_lista; 
                            echo "</td>";
                            echo "<td>" . $campo["titulo_liv"]. "</td>";
                            echo "<td>" . $valor . "</td>";
                            echo "<td>" . $campo["cod_liv"]. "</td>";
                            echo "<td>
                                    <a  href='altLivro.php?cod_liv=". $campo["cod_liv"]."'>Editar</a> /
                                    <a style='color: red' href='delLivro.php?cod_liv=". $campo["cod_liv"]."'>Deletar</a> 
                                </td>";
                            echo "</tr>";
                            $numero_lista = $numero_lista + 1;
                        }
                    ?>
                </tbody>
            </table>
        </section>
        <section class="col-md-2"></section>
    </div>
</body>
<script src="../js/jquery-3.5.1.slim.min.js"></script>
<script src="../js/popper.min.js"></script>

</html>
<?php
    }else{
        header("Location: index.php");
    }

?>