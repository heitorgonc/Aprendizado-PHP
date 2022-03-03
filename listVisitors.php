<?php
    require_once 'guestbookRepository.php';
    
    $usuario = $_GET['usuario'];
    $fileIni = 'guestbook.ini';
    $visitors = listAllVisitors($usuario, $fileIni);
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Visitors</title>
</head>
<body>
    <form method="GET">
        <input type="text" name="usuario" value="<?= $usuario ?>" placeholder="Pesquisar visitantes">
        <input type="submit" value="pesquisar">
        <a href="./index.html">Voltar</a>
    </form>
    <hr>
    <table>
        <thead>
            <tr>
                <td>Email</td>
                <td>Usuário</td>
                <td>Ações</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($visitors as $visitor) : ?>
                <?php if($visitor['usuario'] != null) :?>
                    <tr>
                        <td> <?= $visitor['email']?> </td>
                        <td> <?= $visitor['usuario']?> </td>
                        <td> <a href="editVisitor.php?usuario=<?= $visitor['usuario'] ?>">Editar</a> </td>
                        <td> <a href="deleteVisitor.php?usuario=<?= $visitor['usuario'] ?>">Deletar</a> </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>