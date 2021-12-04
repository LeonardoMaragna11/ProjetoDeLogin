<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/estilo.css" type="text/css">
    <title>Document</title>
</head>

<body id="root">
    <div class="container">
        <div class="row pt-5">
            <div class="col-md-4 "></div>
            <section class="col-md-4">

                <form action="procLogin.php" method="post">
                    <fieldset>
                        <legend>Identifique</legend>
                        <?php 
                            if(isset($_SESSION['erro'])){
                                echo($_SESSION['erro']);
                                unset($_SESSION['erro']);
                            }
                        ?>
                        <div>
                            <label for="login"> Login :</label>
                            <input type="text" class="form-control" name="login" id="login">
                        </div>
                        <div>
                            <label for="senha"> Senha :</label>
                            <input type="password" class="form-control" name="senha" id="senha">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Acesso</button>

                    </fieldset>
                </form>
                <br>
                <a href="../index.php"><button class="btn btn-danger">Voltar</button></a>
            </section>
            <section class="col-4"></section>
        </div>
    </div>


</body>
<script src="../js/jquery-3.5.1.slim.min.js"></script>
<script src="../js/popper.min.js"></script>

</html>