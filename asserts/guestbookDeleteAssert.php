<?php
require_once '../guestbookRepository.php';

$visitor = [
    'email' => 'heitor@email.com',
    'usuario' => 'Heitor'
];
$fileIni = 'guestbookAssert.ini';
$file = "guestbookAssert.db";

deleteVisitor($visitor['usuario'], $fileIni);
assert(
    0 == filesize($file),
    new \Exception('Não foi possivel deletar o usuário')
);