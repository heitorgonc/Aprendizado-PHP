<?php
    require_once 'guestbookRepository.php';
    
    $fileAssert = 'guestbookAssert.db';
    unlink($fileAssert);
    putenv('GUESTBOOK_DB=' .$fileAssert);

    $visitor = [
        'email' => 'heitor@email.com', 
        'usuario' => 'Heitor',
    ];

    saveVisitor($visitor);
    assert(
        !! strstr(file_get_contents($fileAssert), $visitor['usuario']),
        new \Exception('Não foi possivel salvar o usuário')
    );