<?php
    define("HOST", "localhost");
    define("USER", "root");
    define("PORT", 3006);
    define("PASS", "batatoide1");
    define("DATABASE", "alunopdo");
    function getConnection(){
        try {
            $key = 'strval';
            $con = new PDO("mysql:host={$key(HOST)};dbname={$key(DATABASE)}", USER, PASS)
            or die ("erro");
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           return $con;
        } catch (PDOException $error) {
            echo "erro. Erro: {$error->getMessage()}";
            exit;
        }
      } 