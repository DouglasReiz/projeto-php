<?php

require 'connection.php';

$id = filter_input(INPUT_POST, 'id');
$nome = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email',FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password');
$phone = filter_input(INPUT_POST, 'phone');


    
    $sql =  "UPDATE users SET name=:nome, email=:email, password=:password, phone=:phone WHERE id=id";
        $sql->bindValue(':name',$nome);
        $sql->bindValue(':email',$email);
        $sql->bindValue(':password',$password);
        $sql->bindValue(':phone',$phone);
        $sql->bindValue(':id',$id);
        $pdo->prepare();
        $sql->execute();

    header("Location: index.php");
    exit;

?>