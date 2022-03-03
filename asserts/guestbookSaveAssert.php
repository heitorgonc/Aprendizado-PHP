<?php
    require_once '../guestbookRepository.php';
    
    $fileAssert = 'guestbookAssert.db';
    $fileIni = 'guestbookAssert.ini';
    $visitor = [
        'email' => 'heitor@email.com', 
        'usuario' => 'Heitor',
    ];

    unlink($fileAssert);
    saveVisitor($visitor, $fileIni);
    assert(
        !! strstr(file_get_contents($fileAssert), $visitor['usuario']),
        new \Exception('Não foi possivel salvar o usuário')
    );