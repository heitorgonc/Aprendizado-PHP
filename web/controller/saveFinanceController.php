<?php
require_once __DIR__ . '/../../src/controller/financeController.php';

$config = parse_ini_file(__DIR__ . '/../../config.ini');
putenv('FINANCE_DB=' . $config['FINANCE_DB']);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $finance = [
        'title' => $_POST['financeTitle'] ?? null,
        'value' => $_POST['financeValue'] ?? null,
        'date' => $_POST['financeDate'] ?? null
    ];
    try {
        saveFinance($finance);
        echo 'Finança guardada com sucesso';
        echo '<a href="' . $_SERVER['HTTP_REFERER'] . '">Voltar</a>';
    }catch (\Exception $exception) {
        header('Content-Type: text/html; charset=utf8', true, 400);
        echo $exception->getMessage() . '<a href="' . $_SERVER['HTTP_REFERER'] . '">Voltar</a>';
    }
}