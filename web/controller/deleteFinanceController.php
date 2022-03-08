<?php
require_once __DIR__ . '/../../src/controller/financeController.php';

$config = parse_ini_file(__DIR__ . '/../../config.ini');
putenv('FINANCE_DB=' . $config['FINANCE_DB']);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $title = $_POST['title'];
    try{
        deleteFinance($title);
        echo 'Finança deletada com sucesso';
        echo '<a href="/template/listFinancesTemplate.php">Voltar</a>';
        exit(0);
    }catch(\Exception $exception){
        header('Content-Type: text/html; charset=utf8', true, 400);
        echo $exception->getMessage() . '<a href="/template/listFinancesTemplate.php">Voltar</a>';
    }
}