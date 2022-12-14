<?php

require 'connection.php';

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');
$phone = filter_input(INPUT_POST, 'phone');



$sql = $pdo->prepare("INSERT INTO users(name,email,password,phone)VALUES(:name, :email, :password, :phone)");
$sql->binValue(':nome', $name);
$sql->binValue(':email', $email);
$sql->bindValue(':password', $password);
$sql->bindValue(':phone', $phone);
$sql->execute();


?>