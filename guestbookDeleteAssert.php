<?php
require_once 'guestbookRepository.php';

$fileAssert = 'guestbookAssert.db';
putenv('GUESTBOOK_DB=' . $fileAssert);

$visitor = [
    'email' => 'heitor@email.com',
    'usuario' => 'Heitor'
];

deleteVisitor($visitor['usuario']);

assert(
    !! !strstr(file_get_contents($fileAssert), $visitor['usuario']),
    new \Exception('Não foi possivel deletar o usuário')
);