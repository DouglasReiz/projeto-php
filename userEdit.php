<?php
    $user = [];
    $id = filter_input(INPUT_GET, 'id');
    if($id){
        global $pdo;

        $sql = "SELECT * FROM users WHERE id =:id";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0 ) {
            
            $user = $sql->fetch(PDO::FETCH_ASSOC);

        }else{
            header("Location: index.php");
            exit;
        }
    }else{
        header("Location: index.php");
    }
?>


<h1>Editar</h1>

<div class="container">

    <form action="editarAction.php" method="POST">
        <input type="" class="form-control" name="id" id="id" value="<?=$user['id'];?>">

        <label for="name">Nome</label>
        <input value="<?=$user['name'];?>" id="name" name="name" type="text" class="form-control">
        
        <label for="email">Email</label>
        <input value="<?=$user['email'];?>" id="email" name="email" type="email" class="form-control">
        
        <label for="password">Senha</label>
        <input value="<?=$user['password'];?>" id="password" name="password" type="text" class="form-control">
        
        <label for="phone">Celular</label>
        <input value="<?=$user['phone'];?>" id="phone" name="phone" type="phone" class="form-control">
        
        <button class="btn btn-primary" value="Atualizar" type="submit">Atualizar</button>
    </form>
</div>