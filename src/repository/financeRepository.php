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
        if($reg[0] == $title || !$title){
            yield [
                'title' => $reg[0],
                'value' => $reg[1],
                'date' => $reg[2]
            ];
        }
    }
    fclose($handle);
}

function findFinance(string $title){
    $handle = connect();
    while(false === feof($handle)){
        $reg = fgetcsv($handle);
        if($reg && $reg[0] == $title){
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

function deleteFinanceTxt(string $title){
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