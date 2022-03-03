<?php
    require_once 'guestbookRepository.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $usuario = $_POST['usuario'];
        $email = $_POST['email'];
        $visitor['email'] = $email;
        $visitor['usuario'] = $usuario;
        $fileIni = "guestbook.ini";
        $reg = findVisitor($usuario, $fileIni);
        deleteVisitor($reg['usuario'], $fileIni);
        saveVisitor($visitor, $fileIni);
        header('Location: /listVisitors.php?usuario=', true, 303);
        exit(0);
    }

    $usuario = $_GET['usuario'];
    $fileIni = 'guestbook.ini';
    $visitor = findVisitor($usuario, $fileIni);
    $error = '';
    if(!$visitor){
        $error = 'Visitante não encontrado!';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Visitor</title>
</head>
<body>
    <?php if ($error) : ?>
        <div class="alertError"><?= $error ?></div>
    <?php else :?>
        <form method="POST">
            <label>Usuario: <?= $visitor['usuario'] ?></label><br>
            <input type="hidden" name="usuario" value="<?= $visitor['usuario'] ?>"/>
            <label for="email">Email:</label>
            <input type="email" name="email" value="<?= $visitor['email']?>"></input><br>
            <input type="submit" value="Alterar visitante"></input>
            <a href="./listVisitors.php?usuario=">Voltar</a>
        </form>
    <?php endif; ?>
</body>
</html>