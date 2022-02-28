<?php

require_once 'guestbookRepository.php';

$config = parse_ini_file('guestbook.ini');
putenv('GUESTBOOK_DB=' . $config['GUESTBOOK_DB']);

// normalization
$visitor = [
    'email' => $_POST['visitorEmail'] ?? null,
    'name' => $_POST['visitorName'] ?? null,
];

// validation
try {
    if (!$visitor['email']) {
        throw new \Exception('Informe e-mail valido');
    }
    if (!$visitor['name']) {
        throw new \Exception('Informe seu nome');
    }
} catch (\Exception $exception) {
    header('Content-Type: text/html; charset=utf8', true, 400);
    echo $exception->getMessage() . '<a href="' . $_SERVER['HTTP_REFERER'] . '">Voltar</a>';
    exit(0);
}

// persist
saveVisitor($visitor);
header('Location: ' . $_SERVER['HTTP_REFERER'], true, 303);
