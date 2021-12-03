<?php
define("servidor", "localhost");
define("db", "miniPHP");
define("us", "root");
define("senha","");


try{
    $banco = new PDO("mysql:host=".servidor.";dbname=".db, us, senha);
    
    }
    catch(PDOException $e){
    
        echo $e->getMessage();
    }
    

?>