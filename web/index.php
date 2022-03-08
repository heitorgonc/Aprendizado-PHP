<?php

require_once __DIR__ . '/../lib/templateHandler.php';
require_once __DIR__ . '/controller/listFinancesController.php';

$config = parse_ini_file(__DIR__ . '/../config.ini');
putenv('FINANCE_DB=' . $config['FINANCE_DB']);

render(__DIR__ . '/template/saveFinanceTemplate.php');