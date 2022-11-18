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
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <main class="container">
    <h1>Editar Gênero</h1>
    <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?= $genero['nome'] ?>"
        <div class="form-group">
            <label for="nome">Nome do Gênero</label>
            <input class="form-control" type="text" required name="nome" value="<?= $genero['nome']?>" />
    </div>
    <br/>
            <a class="btn btn-secundary" href="index.php">Voltar</a>
            <button class="btn btn-success" type="submit">Salvar</button>
    </form>
</main>
</body>
</html>