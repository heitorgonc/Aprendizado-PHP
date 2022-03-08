<!-- CONTROLLER -->
<?php
require_once __DIR__ . '/../../src/repository/financeRepository.php';

$config = parse_ini_file(__DIR__ . '/../../config.ini');
putenv('FINANCE_DB=' . $config['FINANCE_DB']);

$title = $_GET['title'];
$error = '';
$finance = findFinance($title);
if(!$finance){
    $error = "Finança inexistente";
}
?>
<!-- END CONTROLLER -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição</title>
</head>
<body>
    <?php if ($error) : ?>
        <div class="alertError"><?= $error ?></div>
    <?php else :?>
        <form method="POST" action="/controller/editFinanceController.php">
            <label>Titulo: <?= $finance['title'] ?></label><br>
            <input type="hidden" name="title" value="<?= $finance['title'] ?>"/>
            <label for="value">Valor:</label>
            <input type="text" name="value" value="<?= $finance['value']?>"></input><br>
            <label for="date">Data:</label>
            <input type="text" name="date" value="<?= $finance['date']?>"></input>
            <input type="submit" value="Alterar Finança"></input>
            <a href="/template/listFinancesTemplate.php">Voltar</a>
        </form>
    <?php endif; ?>
</body>
</html>