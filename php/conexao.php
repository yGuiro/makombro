<?php
    session_start();

    $servidor = "127.0.0.1";
    $porta = "3306";
    $usuario = "root";
    $senha = "";
    $database = "makombro";

    try {
        $pdo = new PDO("mysql:host=$servidor;dbname=$database", 
        $usuario, $senha);
        // set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Conectou com sucesso!!!";
    } catch (PDOException $e) {
        echo "Conexão falhou: " . $e->getMessage();
    }


?>