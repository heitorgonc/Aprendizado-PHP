<?php

function connect( string $fileIni){
    $config = parse_ini_file($fileIni);
    putenv('GUESTBOOK_DB=' . $config['GUESTBOOK_DB']);
    return fopen(getenv('GUESTBOOK_DB'), 'a+');
}

function saveVisitor(array $visitor, string $fileIni){
    $handle = connect($fileIni);
    fputcsv($handle, $visitor);
    fclose($handle);
}

function findVisitor(string $usuario, string $fileIni){
    $handle = connect($fileIni);
    while(false === feof($handle)){
        $reg = fgetcsv($handle);
        if($reg && $reg[1] == $usuario){
            fclose($handle);
            return [
                'email' => $reg[0],
                'usuario' => $reg[1]
            ];
        }
    }
    fclose($handle);
    return null;
}

function deleteVisitor(string $usuario, string $fileIni){
    $handle = connect($fileIni);
    $tmp = fopen('tmpDelete.db', 'w');
    while(false === feof($handle)){
        $reg = fgetcsv($handle);
        if($reg && $reg[1] != $usuario){
            fputcsv($tmp, $reg);
        }
    }
    fclose($handle);
    fclose($tmp);
    unlink(getenv('GUESTBOOK_DB'));
    $tmp.rename('tmpDelete.db', getenv('GUESTBOOK_DB'));
}

function listAllVisitors($usuario = null, string $fileIni){
    $handle = connect($fileIni);
    while(false === feof($handle)){
        $reg = fgetcsv($handle);
        if($reg[1] == $usuario || !$usuario ){
            yield [
                'email' => $reg[0],
                'usuario' => $reg[1],
            ];
        }
    }
    fclose($handle);
}

function editVisitor(array $visitor, string $fileIni){
    deleteVisitor($reg['usuario'], $fileIni);
    saveVisitor($visitor, $fileIni);
}