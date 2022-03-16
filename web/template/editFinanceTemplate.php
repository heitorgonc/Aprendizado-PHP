<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição</title>
</head>
<body>
    <form method="POST" action="/controller/editFinanceController.php">
        <label>Titulo: <?= $finance['title'] ?></label><br>
        <input type="hidden" name="title" value="<?= $finance['title'] ?>"/>
        <label for="value">Valor:</label>
        <input type="text" name="value" value="<?= $finance['value']?>"></input><br>
        <label for="date">Data:</label>
        <input type="text" name="date" value="<?= $finance['date']?>"></input>
        <input type="submit" value="Alterar Finança"></input>
        <a href="/list.php">Voltar</a>
    </form>
</body>
</html>