<?php

require 'connection.php';

if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])){
    require_once 'Usuario.class.php';
    $u = new Usuario();

    $listLogged = $u->logged($_SESSION['idUser']);

    $username =  $listLogged['name'];

}else{
    header("location: login.php");
}

?>