<?php
require_once './vencedor/autoload.php';

use ExemploPDOMySQL\MySQLConnection;

$bd = new MySQLConnection(); 

$genero = null;

if($SERVER['REQUEST_METHOD'] == 'GET'){
    $comando = $bd->prepare('SELECT * FROM generos WHERE id = :id');
    $comando->execute([':id' => $_GET['id']]);

    $genero = $comando->fetch(PDO::FETCH-ASSOC);
} else{
    $comando = $bd->prepare('UPDATE generos SET nome = :nome WHERE id = :id');
    $comando->execute([':nome' => $_POST['nome'], ':id' => $_POST['id']]);

    header('Location:/index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar Gênero</title>
</head>
<body>
    <h1>Editar Gênero</h1>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?= $genero['nome'] ?>"
        <label for="nome">Nome do Gênero</label>
        <input type="text" required name="nome" value="<?= $genero['nome']?>" />
        <button type="submit">Salvar</button>
    </form>
    
</body>
</html>