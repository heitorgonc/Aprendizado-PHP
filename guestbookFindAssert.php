<?php

require_once 'guestbookRepository.php';

$fileAssert = "guestbookAssert.db";
putenv('GUESTBOOK_DB=' . $fileAssert);

$visitor = [
    'email' => 'heitor@email.com',
    'usuario' => 'Heitor',
];

assert(
    !! findVisitor($visitor['usuario']),
    new \Exception('Usuário não encontrado')
);