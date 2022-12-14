<?php
$array = array();

global $pdo;
$sql = $pdo->prepare('SELECT * FROM users');
$sql->execute();

if($sql->rowCount()>0){
    $array = $sql->fetchAll(PDO::FETCH_ASSOC);
}

?>


<div class="container">
    <H1>Usuários</H1>
    <h2 class="center">Listar usuários</h2>
<table class="table table-striped table-dark">
    <thead class="table-dark">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($array as $user): ?>
            <tr>
                 <td> <?= $user['id'];?> </td>
                 <td> <?= $user['name'];?> </td>
                 <td> <?= $user['email'];?> </td>
                 <td> <?= $user['phone'];?> </td>
                 <td>
                    <a href='/editar?id=<?=$user['id'];?>' class='btn btn-warning btn-sm'>Editar</a>
                    <a href='/user/delete<?=$user['id'];?>' class='btn btn-danger btn-sm'>Excluir</a>
                </td>
            </tr>
        
        <?php endforeach; ?>
    </tbody>
</table>
</div>