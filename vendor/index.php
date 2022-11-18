<?php
require_once './vencedor/autoload.php';

use ExemploPDOMySQL\MySQLConnection; //PDO

$bd = new MySQLConnection(); //PDO('mysql:host=localhost;dbname=biblioteca', 'root', '');

$comando - $bd->prepare('SELECT * FROM generos');
$comando->execute();

$generos = $comando->fetchALL(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Biblioteca</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <main class="container">
    <a class="btn btn-primary" href="inset.php">Novo Gênero</a>
    <table class="table">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach($generos as $g): ?>
            <tr>
                <td><?= $g['id'] ?></td>
                <td><?= $g['nome']?></td>
                <td>
                    <a class="btn btn-secundary" href="update.php?id=<?= $g['id'] ?>">Editar</a>
                    <a class="btn btn-danger" href="update.php?id=<?= $g['id'] ?>">Excluir</a>
                </td>
            </tr>
            <?php endforeach ?>
    </table>
        </main>
</body>
</html>