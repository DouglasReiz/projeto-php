<?php

session_start();

$localhost = "localhost";
$user = "root";
$password = "123456";
$table = "test_ok";

global $pdo;

try {
    $pdo = new PDO("mysql:dbname=".$table."; host=".$localhost, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (\Throwable $th) {
    echo "ERRO: " . $e->getMessage();
    exit;
}





?>