<?php

require_once 'guestbookRepository.php';

$fileIni = "guestbook.ini";
// normalization
$visitor = [
    'email' => $_POST['visitorEmail'] ?? null,
    'user' => $_POST['visitorUser'] ?? null,
];

// validation
try {
    if (!$visitor['email']) {
        throw new \Exception('Informe e-mail valido');
    }
    if (!$visitor['user']) {
        throw new \Exception('Informe seu usuário');
    }
} catch (\Exception $exception) {
    header('Content-Type: text/html; charset=utf8', true, 400);
    echo $exception->getMessage() . '<a href="' . $_SERVER['HTTP_REFERER'] . '">Voltar</a>';
    exit(0);
}

// persist
saveVisitor($visitor, $fileIni);
header('Location: ' . $_SERVER['HTTP_REFERER'], true, 303);
