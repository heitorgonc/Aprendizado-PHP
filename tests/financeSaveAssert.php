<?php
require_once __DIR__ . '/../src/repository/financeRepository.php';

$config = parse_ini_file( __DIR__ . '\configAssert.ini');
putenv('FINANCE_DB=' . $config['FINANCE_DB']);

$finance = [
    'title' => 'Aluguel',
    'value' => '15000',
    'date' => '2022-03-07'
];
$handle = 'financeAssert.db';

unlink($handle);
saveFinanceTxt($finance);
assert(
    !! strstr(file_get_contents($handle), $finance['title']),
    new \Exception('Não foi possivel salvar a finança')
);