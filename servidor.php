<?php


// $serv = "localhost";
// $banco = "miniphp";
define("servidor","localhost");
define("banco", "miniphp");
define("us", "root");
define("senha", "");
define("porta", "3306");

try{
    $serv = new PDO("mysql:host=".servidor.";dbname=".banco,us,senha);
    //echo "conectou";
}catch(PDOException $e){
    echo $e ->getMessage();
}

?>