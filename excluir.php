<?php

require 'connection.php';

$id = filter_input(INPUT_GET, 'id');

if($id){
    $sql = pdo->prepare("DELETE FROM users WHERE id = :id");
    $sql->bidenValue(':id', $id);
    $sql->execute();
}

header("Location: users.php");