<?php

function connect(){
    return fopen(getenv('FINANCE_DB'), 'a+');
}

function saveFinanceTxt(array $finance){
    $handle = connect();
    fputcsv($handle, $finance);
    fclose($handle);
}

function listAllFinances(string $title = null){
    $handle = connect();
    while(feof($handle) === false){
        $reg = fgetcsv($handle);
        if(($reg[0] == $title || !$title) && $reg){
            yield [
                'title' => $reg[0],
                'value' => $reg[1],
                'date' => $reg[2]
            ];
        }
    }
    fclose($handle);
}

function findFinance(array $finance){
    $handle = connect();
    while(false === feof($handle)){
        $reg = fgetcsv($handle);
        if($reg && $reg[0] == $finance['title'] && $reg[1] == $finance['value'] &&
        $reg[2] == $finance['date']){
            fclose($handle);
            return [
                'title' => $reg[0],
                'value' => $reg[1],
                'date' => $reg[2]
            ];
        }
    }
    fclose($handle);
    return null;
}

function deleteFinanceTxt(array $finance){
    $handle = connect();
    $tmp = fopen('tmpDelete.db', 'w');
    while(false === feof($handle)){
        $reg = fgetcsv($handle);
        if($reg && ($reg[0] != $finance['title'] || $reg[1] != $finance['value']
        || $reg[2] != $finance['date'])){
            fputcsv($tmp, $reg);
        }
    }
    fclose($handle);
    fclose($tmp);
    unlink(getenv('FINANCE_DB'));
    $tmp.rename('tmpDelete.db', getenv('FINANCE_DB'));
}

function findFinanceByTitle(string $title){
    $handle = connect();
    while(feof($handle) === false){
        $reg = fgetcsv($handle);
        if($reg[0] == $title && $reg){
            fclose($handle);
            return [
                'title' => $reg[0],
                'value' => $reg[1],
                'date' => $reg[2]
            ];
        }
    }
    fclose($handle);
    return null;
}

function deleteFinanceByTitle(string $title){
    $handle = connect();
    $tmp = fopen('tmpDelete.db', 'w');
    while(false === feof($handle)){
        $reg = fgetcsv($handle);
        if($reg && $reg[0] != $title){
            fputcsv($tmp, $reg);
        }
    }
    fclose($handle);
    fclose($tmp);
    unlink(getenv('FINANCE_DB'));
    $tmp.rename('tmpDelete.db', getenv('FINANCE_DB'));
}

function editFinanceTxt(array $finance){
    $handle = connect();
    $tmpFile = __DIR__ . "/tmpFinances.db";
    $tmpHandle = fopen($tmpFile, 'w');
    while(false == feof($handle)){
        $reg = fgetcsv($handle);
        if($reg && $reg[0] == $finance['title']){
            $reg[1] = $finance['value'];
            $reg[2] = $finance['date'];
        }
        fputcsv($tmpHandle, $reg);
    }
    fclose($handle);
    fclose($tmpHandle);
    unlink(getenv('FINANCE_DB'));
    rename($tmpFile, getenv('FINANCE_DB'));
}