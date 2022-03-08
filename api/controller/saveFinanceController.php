<?php
require_once '/../../src/controller/saveFinanceController.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $strJson = file_get_contents('php://input');
    $json = json_decode($strJson);
    $finance = [
        'title' => $json->title ?? null,
        'value' => $json->value ?? null,
        'date' => $json->date ?? null
    ];
    $financeSaved = saveFinance($finance);
    if($financeSaved){
        echo 'Salvo com sucesso';
    }else{
        echo 'Erro ao salvar';
    }
}