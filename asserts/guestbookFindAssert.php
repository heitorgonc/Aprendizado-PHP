<?php
require_once '../guestbookRepository.php';

$visitor = [
    'email' => 'heitor@email.com',
    'usuario' => 'Heitor',
];
$fileIni = 'guestbookAssert.ini';
$findedVisitor = findVisitor($visitor['usuario'], $fileIni);

assert(
    $findedVisitor['usuario'] == $visitor['usuario'],
    new \Exception('Usuário não encontrado')
);