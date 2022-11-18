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
</head>
<body>
    <a href="inset.php">Novo Gênero</a>
    <table>
        <tr>
            <th>Id</th>
            <th>Nome</th>
        </tr>
        <?php foreach($generos as $g): ?>
            <tr>
                <td><?= $g['id'] ?></td>
                <td><?= $g['nome']?></td>
            </tr>
            <?php endforeach ?>
    </table>
</body>
</html>