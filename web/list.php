<?php
require_once __DIR__ . '/../lib/templateHandler.php';
require_once __DIR__ . '/../src/repository/financeRepository.php';

$config = parse_ini_file(__DIR__ . '/../config.ini');
putenv('FINANCE_DB=' . $config['FINANCE_DB']);

$rawList = [];
foreach(listAllFinances() as $finance){
    $rawList[] = $finance;
}

render(__DIR__ . '/template/listFinancesTemplate.php', ['finances' => $rawList]);