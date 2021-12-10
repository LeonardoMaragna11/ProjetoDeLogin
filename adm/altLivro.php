<?php
session_start();
require_once("../servidor.php");
if(isset($_SESSION['usuario'])){
$sql = "SELECT * FROM tb_livro WHERE cod_liv= ?";


$stm = $banco->prepare($sql);
$stm -> bindValue(1, $_GET['cod_liv']);
$stm -> execute();
$campo = $stm->fetch(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <section class="col-md-2">
            </section>
            <section class="col-md-8">
                <h3 class="mt-5">Altera Livro</h2>

                    <form action="procAltLivro.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="cod_liv">ID</label>
                                <input type="text" class="form-control" disabled="" name="cod_liv" value="<?php  echo($campo['cod_liv']); ?>">
                            
                        </div>  
                        <div class="form-group">
                                <label for="t">Titulo : </label>
                                <input type="text" class="form-control" id="t" name="titulo" 
                                value="<?php  echo($campo['titulo_liv']); ?>">
                            </div>
                            <div class="form-group">
                                <label for="desc">Descrição : </label>
                                <textarea name="desc" class="form-control" id="desc">
                                    <?php echo($campo['titulo_liv']);?>
                                </textarea>
                            </div>
                            <div class="form-group">
                            <label for="ed">Editora: </label>
                            <select class="form-control" name="ed" id="ed">
                                <?php
                                    $sql = "SELECT * FROM tb_editora WHERE cod_ed = ?";
                                    $smt = $banco->prepare($sql);
                                    $smt->bindValue(1,$campo['cod_ed']);
                                    $smt->execute();
                                    while($campo = $smt->fetch(PDO::FETCH_ASSOC)){
                                        echo "<option value=".$campo["cod_ed"].">"
                                        .$campo["nome_ed"]."</option>";
                                     }  
                                ?> 
                              <?php
                                 $sql = "SELECT * FROM tb_editora";
                                 $smt = $banco->prepare($sql);
                                 $smt->execute();
                                 while($campo = $smt->fetch(PDO::FETCH_ASSOC)){
                                    echo "<option value=".$campo["cod_ed"].">"
                                    .$campo["nome_ed"]."</option>";
                                 }
                               ?> 
                            </select>
                        </div>
                            <div class="form-group " style="width:30%;">
                                <label for="valor">Valor: </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                        <input
                                            type="text" 
                                            class="form-control" 
                                            id="valor" 
                                            name="valor"
                                            value="<?php echo $campo['titulo_liv'] ?>"
                                        />
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Alterar</button>
                    </form>
            </section>
            <section class="col-md-2"></section>
        </div>
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