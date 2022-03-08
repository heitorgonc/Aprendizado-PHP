<!-- CONTROLLER -->
<?php
    require_once __DIR__ . '/../../src/repository/financeRepository.php';

    $config = parse_ini_file(__DIR__ . '/../../config.ini');
    putenv('FINANCE_DB=' . $config['FINANCE_DB']);

    $title = $_GET['title'];
    $error = "";
    $finance = findFinance($title);
    if(!$finance){
        $error = "Finança não encontrada!";
    }
?>
<!-- END CONTROLLER -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar</title>
</head>
<body>
    <?php if($error) : ?>
        <h2><?= $error ?></h2>
    <?php else : ?>
        <form method="POST" action="/controller/deleteFinanceController.php">
            <label>Tem certeza que deseja remover todas as finanças cujo título é <?= $finance['title']?> ?</label>
            <input type="hidden" name="title" value="<?= $finance['title'] ?>"/>
            <input type="submit" value="Deletar"/>
            <a href="/template/listFinancesTemplate.php">Voltar</a>
        </form>
    <?php endif; ?>
</body>
</html>