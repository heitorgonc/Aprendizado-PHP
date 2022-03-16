<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <td>Titulo</td>
                <td>Valor</td>
                <td>Data</td>
                <td>Ações</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($finances as $finance) : ?>
                <tr>
                    <td> <?= $finance['title']?> </td>
                    <td> <?= $finance['value']?> </td>
                    <td> <?= $finance['date']?> </td>
                    <td> <a href="/edit.php?title=<?= $finance['title'] ?>">Editar</a> </td>
                    <td> <a href="">Deletar</a> </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="/index.php">Voltar</a>
</body>
</html>