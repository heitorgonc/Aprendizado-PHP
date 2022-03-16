<?php
require_once __DIR__ . '/../src/repository/financeRepository.php';

$config = parse_ini_file( __DIR__ . '\configAssert.ini');
putenv('FINANCE_DB=' . $config['FINANCE_DB']);

$finance = [
    'title' => 'Aluguel',
    'value' => '15000',
    'date' => '2022-03-07'
];
$handler = 'financeAssert.db';

deleteFinanceTxt($finance);
assert(
    0 == filesize($handler),
    new \Exception('Não foi possivel deletar a finança ')
);