<?php
require_once __DIR__ . '/../repository/financeRepository.php';

function saveFinance(array $finance){
    if (!$finance['title']) {
        throw new \Exception('Informe o título da finança');
    }
    if (!$finance['value']) {
        throw new \Exception('Informe o valor de sua finança');
    }
    if(!$finance['date']){
        throw new \Exception('Informe a data de sua finança');
    }
    saveFinanceTxt($finance);
}

function deleteFinance(string $title){
    $financeFinded = findFinance($title);
    if($title != $financeFinded['title']){
        throw new \Exception('Finança inexistente');
    }
    deleteFinanceTxt($title);
}