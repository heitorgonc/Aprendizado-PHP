<!-- CONTROLLER -->
<?php 
require_once __DIR__ . '/../../src/repository/financeRepository.php';

$config = parse_ini_file(__DIR__ . '/../../config.ini');
putenv('FINANCE_DB=' . $config['FINANCE_DB']);

$title = $_GET['title'] ?? null;
$error = '';
$finances = listAllFinances($title);
if(!$finances){
    $error = 'Falha na pesquisa';
}
?>
<!-- END CONTROLLER -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista</title>
</head>
<body>
    <form method="GET">
        <input type="text" name="title" value="<?= $title ?>" placeholder="Pesquisar finanças">
        <input type="submit" value="pesquisar">
        <a href="/template/saveFinanceTemplate.php">Voltar</a>
        <?= $error?>
    </form>
    <hr>
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
                <?php if($finance['title'] != null) :?>
                    <tr>
                        <td> <?= $finance['title']?> </td>
                        <td> <?= $finance['value']?> </td>
                        <td> <?= $finance['date']?> </td>
                        <td> <a href="/template/editFinanceTemplate.php?title=<?= $finance['title'] ?>">Editar</a> </td>
                        <td> <a href="/template/deleteFinanceTemplate.php?title=<?= $finance['title'] ?>">Deletar</a> </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>