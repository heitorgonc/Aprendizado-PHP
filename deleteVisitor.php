<?php
    require_once 'guestbookRepository.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $usuario = $_POST['usuario'];
        $fileIni = "guestbook.ini";
        deleteVisitor($usuario, $fileIni);
        header('Location: /listVisitors.php?usuario=', true, 303);
        exit(0);
    }

    $usuario = $_GET['usuario'];
    $fileIni = 'guestbook.ini';
    $visitor = findVisitor($usuario, $fileIni);
    $error = "";
    if(!$visitor){
        $error = "Visitante não encontrado!";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Visitor</title>
</head>
<body>
    <?php if($error) : ?>
        <h2><?= $error ?></h2>
    <?php else : ?>
        <form method="POST">
            <label>Tem certeza que deseja remover o visitante cujo usuario é <?= $visitor['usuario']?> ?</label>
            <input type="hidden" name="usuario" value="<?= $visitor['usuario'] ?>"/>
            <input type="submit" value="Deletar"/>
            <a href="./listVisitors.php?usuario=">Voltar</a>
        </form>
    <?php endif; ?>
</body>
</html>