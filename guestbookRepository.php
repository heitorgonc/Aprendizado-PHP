<?php

function connect(){
    return fopen(getenv('GUESTBOOK_DB'), 'a+');
}

function saveVisitor(array $visitor)
{
    $handle = connect();
    fputcsv($handle, $visitor);
    fclose($handle);
}

function findVisitor(string $usuario)
{
    $handle = connect();
    while(false === feof($handle)){
        $reg = fgetcsv($handle);
        if($reg && $reg[1] == $usuario){
            fclose($handle);
            return $reg[0];
        }
    }
    fclose($handle);
    return null;
}

function deleteVisitor(string $usuario)
{
    $handle = connect();
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
