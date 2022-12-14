<?php 

class Usuario{
    public function login($email,$password)
    {
        global $pdo;

        $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("email", $email);
        $sql->bindValue("password", $password);
        $sql->execute();

        if ($sql->rowCount() > 0 ) {
            $dado = $sql->fetch();

            $_SESSION['idUser'] = $dado['id'];

            return true;
        }else{
            return false;
        }
    }

    public function logged($id){
        global $pdo;

        $array = array();

        $sql = "SELECT name FROM users WHERE id = :id";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("id", $id);
        $sql->execute();

        if($sql->rowCount()>0){
            $array = $sql->fetch();
        }

        return $array;

    }

    public function listAction()
    {
        $array = array();

        global $pdo;
        $sql = $pdo->prepare('SELECT * FROM users');
        $sql->execute();

        if($sql->rowCount()>0){
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        return $array;
        
    }

    public function createAction():void
    {
        global $pdo;

        if($_POST){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $phone = $_POST['phone'];
            $is_admin = 0;

            $sql = "INSERT INTO users(name,email,password,phone,is_admin) VALUES ('{$name}','{$email}','{$password}','{$phone}','{$is_admin}')";
            $sql = $pdo->prepare($sql);
            $sql->execute();

            
        }

        
    }

    public function updateAction(): void
    {
        global $pdo;

        $id = $_GET['id'];

        

        if($_POST){
            $newName = $_POST['name'];
            $newEmail = $_POST['email'];
            $newPassword = $_POST['password'];
            $newPhone = $_POST['phone'];

            $queryUpdate = "UPDATE users SET name='{$newName}', email='{$newEmail}', password='{$newPassword}', phone='{$newPhone}' WHERE id='{$id}'";

            $sql = $pdo->prepare($queryUpdate);
            $sql->execute();

            echo 'Pronto Atualizado';

    }

        $sql = "SELECT * FROM users WHERE id='{$id}'";

        $sql = $pdo->prepare($sql);
        $sql->execute();

        $data = $sql->fetch(\PDO::FETCH_ASSOC);

    }

    public function deleteAction(): void
    {
        global $pdo;

        $id = $_GET['id'];

        $sql = "DELETE FROM users WHERE id='{$id}'";
        
        $sql = $pdo->prepare($sql);
        $sql->execute();

        echo 'pronto excluido';
    }
}