<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <title>Cadastro</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <section class="col-md-2">
            </section>
            <section class="col-md-8">
                <h3 class="mt-5">Cadastro de Livro</h2>
                    <form action="CadLivro.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="t">Titulo : </label>
                            <input type="text" class="form-control" id="t" name="titulo" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="desc">Descrição : </label>
                            <textarea name="desc" class="form-control" id="desc"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="arq">Imagem da Capa : </label>
                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" id="arq" name="arq">
                                <label class="custom-file-label" for="arq">procurar arquivo</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ed">Editora: </label>
                            <select class="form-control" name="ed" id="ed">
                            <option>Selecione ...</option>
                            <?php 
                                require_once("../servidor.php");//Conexão com o servidor
                                $sql = "SELECT * FROM tb_editora WHERE cod_ed = ?";//Consulta
                                $res = $serv->prepare($sql);
                                for ($i=1; $i <= 3; $i++) { 
                                    $res->bindValue(1,$i);
                                    $res->execute();
                                    if($campo = $res ->fetch(PDO::FETCH_ASSOC)){
                                        if(!$campo['cod_ed']=='' && !$campo['nome_ed']=='' &&
                                         !$campo['cod_ed']==NULL && !$campo['nome_ed']==NULL ){
                                           $editora['cod_ed'][$i] = $campo["cod_ed"];
                                           $editora['nome_ed'][$i] = $campo["nome_ed"];
                                        }
                                    }
                                    echo("<option>");
                                    echo ($editora['nome_ed'][$i]);
                                    echo("</option>");
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
                                <input type="text" class="form-control" id="valor" name="valor">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>
            </section>
            <section class="col-md-2"></section>
        </div>
    </div>
                            
</body>
<script src="../js/jquery-3.5.1.slim.min.js"></script>
<script src="../js/popper.min.js"></script>

</html>